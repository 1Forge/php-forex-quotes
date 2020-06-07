<?php

/*
* This library is provided without warranty under the MIT license
* Created by Jacob Davis <jacob@1forge.com>
*/

namespace OneForge\ForexQuotes;

use GuzzleHttp\Client;
use Wrench\Client as WebSocket;

class ForexDataClient
{
    private $api_key;

    public function __construct($api_key)
    {
        $this->api_key = $api_key;

        $this->client = new Client([// Base URI is used with relative requests
                                    'base_uri' => 'https://api.1forge.com/',
                                    'timeout'  => 5.0,
                                    'headers'  => ['Content-Type' => 'application/json']]);
    }

    public function beat()
    {
        $this->socket_client->sendData('beat');
    }

    public function login()
    {
        $this->socket_client->sendData('login|'.$this->api_key);
    }

    public function handleIncomingMessage($message)
    {   
        switch ($message["event"])
        {
            case "update":
                if(property_exists($this, 'update_function'))
                {
                    $update_function = $this->update_function;

                    $data = $message["data"];
                    $update_function($data["s"], $data);
                }
                break;
            case "message":
                $this->handleMessage($message["data"]);
                break;
            case "login":
                $this->login();
                break;
            case "post_login_success":
                $this->handlePostLoginSuccess();
                break;
            case "heart":
                $this->beat();
                break;
            case "force_close":
                $this->handleMessage("The connection was forced closed by the server");
                die();
            default:
                $this->onServerError();
        }
    }

    public function onServerError()
    {
        try
        {
            $this->handleMessage("The connection to the server was lost, trying to reconnect in 5 seconds");
            sleep(5);
            $this->connect($this->post_login);
        }
        catch (\Exception $e)
        {
            $this->onServerError();
        }
    }

    public function handleMessage($message)
    {
        if(property_exists($this, 'message_function'))
        {
            $message_function = $this->message_function;
            $message_function($message);
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
        foreach ((array)$symbols AS $symbol)
        {
            $this->socket_client->sendData("subscribe_to|$symbol");
        }
    }

    public function subscribeToAll()
    {
        $this->socket_client->sendData('subscribe_to_all');
    }

    public function unsubscribeFrom($symbols)
    {
        foreach ((array)$symbols AS $symbol)
        {
            $this->socket_client->sendData("unsubscribe_from|$symbol");
        }
    }

    public function unsubscribeFromAll()
    {
        $this->socket_client->sendData('unsubscribe_from_all');
    }

    private function handlePostLoginSuccess()
    {
        if(!$this->post_login)
        {
            return;
        }

        $post_login = $this->post_login;

        $post_login($this);
    }

    public function connect($callback)
    {
        $this->post_login = $callback;

        $this->socket_client = new WebSocket('wss://sockets.1forge.com/socket','http://localhost');
        $this->socket_client->connect();

        $this->login();

        // $this->socket_client->send("Hello WebSocket.org!");

        while(true){
            $receive = $this->socket_client->receive();
            if(isset($receive) && !empty($receive)){
                foreach($receive as $id => $body){
                    $message = $this->decodeSocketMessage($body);
                    $this->handleIncomingMessage($message);
                }

            }
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
        if($symbols === null)
        {
            $body = $this->fetch('quotes?cache=false');
        }
        else
        {
            $pairs = implode(",", $symbols);
            print("Here pairs". strlen($pairs));
            try{
                if(strlen($pairs) > 7664)
                {
                   throw new \Exception('No more than 957 pairs');
                }
                else
                {
                    $body = $this->fetch('quotes?pairs=' . $pairs);
                }
            } catch(\Exception $e){
                echo $e->getMessage();
                exit();
            }
          
        }
       
        $quotes = json_decode($body);

        $quotes_array = [];

        foreach ($quotes as $quote)
        {
            $quotes_array[] = ['s'    => $quote->s,
                               'b'       => $quote->b,
                               'a'       => $quote->a,
                               'p'     => $quote->p,
                               't' => $quote->t];
        }

        return $quotes_array;
    }

    public function marketIsOpen()
    {
        $body = $this->fetch('market_status?cache=false');

        $body = json_decode($body);

        if(property_exists($body, 'market_is_open'))
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
        // $cleaned = str_replace("42[", "", $message);
        // $cleaned = str_replace("]", "", $cleaned);
        $event = explode("|", $message)[0];
        $data = str_replace($event . "|", "", $message);
        $event = str_replace('"', "", $event);

        if($data)
        {
            $data = json_decode($data, true);
        }

        return ["event" => $event,
                "data"  => $data];
    }
}