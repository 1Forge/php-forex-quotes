<?php

/*
 * This library is provided without warranty under the MIT license.
 * Created by 1Forge - http://1forge.com
 */

namespace OneForge\ForexQuotes;

use GuzzleHttp\Client;

class QuoteRequest
{
    public static function client()
    {
        return new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://1forge.com/forex-quotes/',
            // You can set any number of default request options.
            'timeout' => 2.0,
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    public static function getSymbols(): array
    {

        $body = self::client()->get('symbols')->getBody();

        return json_decode($body, true);
    }

    public static function getQuotes(array $symbols): array
    {
        $pairs = implode(",", $symbols);
        $body = self::client()->get('quotes?pairs=' . $pairs)->getBody();

        $quotes = json_decode($body);

        $quotes_array = [];

        foreach ($quotes as $quote)
        {
            $quotes_array[] = [
                'symbol' => $quote->symbol,
                'bid' => $quote->bid,
                'ask' => $quote->ask,
                'timestamp' => $quote->timestamp
            ];
        }

        return $quotes_array;
    }
}