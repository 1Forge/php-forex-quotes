<?php

    /*
     * This library is provided without warranty under the MIT license.
     * Created by 1Forge - http://1forge.com
     */

    namespace OneForge\ForexQuotes;

    use GuzzleHttp\Client;

    class ForexDataClient
    {
        private $api_key;

        public function __construct($api_key)
        {
            $this->api_key = $api_key;

            $this->client = new Client([// Base URI is used with relative requests
                                        'base_uri' => 'http://forex.1forge.com/1.0.2/',
                                        // You can set any number of default request options.
                                        'timeout'  => 5.0,
                                        'headers'  => ['Content-Type' => 'application/json']]);
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

    }


