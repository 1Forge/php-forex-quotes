<?php

    /*
    * This library is provided without warranty under the MIT license
    * Created by Jacob Davis <jacob@1forge.com>
    */

    namespace OneForge\ForexQuotes;

    use GuzzleHttp\Client;
    use ElephantIO\Client as SocketClient;
    use ElephantIO\Engine\SocketIO\Version2X;

    class ForexDataClient
    {
        private $api_key;

        public function __construct($api_key)
        {
            $this->api_key = $api_key;

            $this->client = new Client([// Base URI is used with relative requests
                                        'base_uri' => 'http://forex.1forge.com/1.0.3/',
                                        'timeout'  => 5.0,
                                        'headers'  => ['Content-Type' => 'application/json']]);

            $this->last_heartbeat = time();
            $this->heartbeat_interval = 15;
        }

        public function sendHeartbeat()
        {
            $this->socket_client->emit('heartbeat', ['ok']);
            $this->last_heartbeat = time();
        }

        public function login()
        {
            $this->socket_client->emit('login', [$this->api_key]);
        }

        public function shouldSendHeartbeat()
        {
            return time() - $this->last_heartbeat > $this->heartbeat_interval;
        }

        public function handleIncomingMessage($message)
        {
            if ($this->shouldSendHeartbeat())
            {
                $this->sendHeartbeat();
            }
            switch ($message["event"])
            {
                case "update":
                    if (property_exists($this, 'update_function'))
                    {
                        $update_function = $this->update_function;

                        $data = $message["data"];
                        $update_function($data["symbol"], $data);
                    }
                    break;
                case "message":
                    if (property_exists($this, 'message_function'))
                    {
                        $message_function = $this->message_function;

                        $data = $message["data"];
                        $message_function($data);
                    }
                    break;
                case "login":
                    $this->login();
                    break;
                case "post_login_success":
                    $this->handlePostLoginSuccess();
                    break;
            }
        }

        public function onUpdate($update_function)
        {
            $this->update_function = $update_function;
        }

        public function onMessage($message_function)
        {
            $this->message_function = $message_function;
        }

        public function subscribeTo($symbols)
        {
            foreach ((array) $symbols AS $symbol)
            {
                $this->socket_client->emit('subscribe_to', [$symbol]);
            }
        }

        public function subscribeToAll()
        {
            $this->socket_client->emit('subscribe_to_all', []);
        }

        public function unsubscribeFrom($symbols)
        {
            foreach ((array) $symbols AS $symbol)
            {
                $this->socket_client->emit('unsubscribe_from', [$symbol]);
            }
        }

        public function unsubscribeFromAll()
        {
            $this->socket_client->emit('unsubscribe_from_all', []);
        }

        private function handlePostLoginSuccess()
        {
            if (!$this->post_login)
            {
                return;
            }

            $post_login = $this->post_login;

            $post_login($this);
        }

        public function connect($callback)
        {
            $this->post_login = $callback;

            $this->socket_client = new SocketClient(
                new Version2X('https://socket.forex.1forge.com:3000')
            );

            $this->socket_client->initialize();
            $this->login();

            while (true)
            {
                $message = $this->socket_client->read();

                $message = $this->decodeSocketMessage($message);

                $this->handleIncomingMessage($message);
            }
        }

        public function fetch($uri)
        {
            return $this->client->get($uri . '&api_key=' . $this->api_key)->getBody();
        }

        public function quota()
        {
            $body = $this->fetch('quota?cache=false');

            return json_decode($body, true);
        }

        public function getSymbols()
        {
            $body = $this->fetch('symbols?cache=false');

            return json_decode($body, true);
        }

        public function getQuotes(array $symbols = null)
        {
            if ($symbols === null)
            {
                $body  = $this->fetch('quotes?cache=false');
            }
            else{
                $pairs = implode(",", $symbols);
                $body  = $this->fetch('quotes?pairs=' . $pairs);
            }

            $quotes = json_decode($body);

            $quotes_array = [];

            foreach ($quotes as $quote)
            {
                $quotes_array[] = ['symbol'    => $quote->symbol,
                                   'bid'       => $quote->bid,
                                   'ask'       => $quote->ask,
                                   'price'     => $quote->price,
                                   'timestamp' => $quote->timestamp];
            }

            return $quotes_array;
        }

        public function marketIsOpen()
        {
            $body = $this->fetch('market_status?cache=false');

            $body = json_decode($body);

            if (property_exists($body, 'market_is_open'))
            {
                return (bool)$body->market_is_open;
            }

            return false;
        }

        public function convert($from, $to, $quantity)
        {
            $body = $this->fetch('convert?from=' . $from . '&to=' . $to . '&quantity=' . $quantity);

            return json_decode($body, true);
        }

        private function decodeSocketMessage($message)
        {
            $cleaned = str_replace("42[", "", $message);
            $cleaned = str_replace("]", "", $cleaned);

            $event = explode(",", $cleaned)[0];
            $data = str_replace($event.",", "", $cleaned);
            $event = str_replace('"', "", $event);

            if ($data)
            {
                $data = json_decode($data, true);
            }

            return [
                "event" => $event,
                "data" => $data
            ];
        }
    }


