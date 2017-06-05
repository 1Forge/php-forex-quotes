<?php

    /*
     * This library is provided without warranty under the MIT license.
     * Created by 1Forge - http://1forge.com
     */

    namespace OneForge\ForexQuotes;

    use GuzzleHttp\Client;


    class ForexRequest
    {
        public static function client()
        {
            return new Client([// Base URI is used with relative requests
                               'base_uri' => 'http://1forge.com/forex-data-api/1.0.1/',
                               // You can set any number of default request options.
                               'timeout'  => 2.0,
                               'headers'  => ['Content-Type' => 'application/json']]);
        }

        public static function getSymbols()
        {
            $body = self::client()->get('symbols')->getBody();

            return json_decode($body, true);
        }

        public static function getQuotes(array $symbols)
        {
            $pairs = implode(",", $symbols);
            $body  = self::client()->get('quotes?pairs=' . $pairs)->getBody();

            $quotes = json_decode($body);

            $quotes_array = [];

            foreach ($quotes as $quote)
            {
                $quotes_array[] = ['symbol'    => $quote->symbol,
                                   'price'     => $quote->price,
                                   'timestamp' => $quote->timestamp];
            }

            return $quotes_array;
        }

        public static function marketIsOpen()
        {
            $body = self::client()->get('market_status')->getBody();

            $body = json_decode($body);

            if (property_exists($body, market_is_open))
            {
                return (bool)$body->market_is_open;
            }

            return false;
        }
    }