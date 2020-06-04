<?php

    /*
    * This library is provided without warranty under the MIT license
    * Created by 1Forge <contact@1forge.com>
    */

    require_once __DIR__ . '/../vendor/autoload.php';

    use OneForge\ForexQuotes\ForexDataClient;

    $client = new ForexDataClient('0JHZqgJf7V3tvd7BA3MGThQB3NqVX7F9');

    //Handle incoming price updates from the server
    $client->onUpdate(function($s, $data)
    {
        echo $s . ": " . $data["b"] . " " .$data["a"] . " " . $data["p"]."\n";
    });

    //Handle non-price update messages
    $client->onMessage(function($message)
    {
        echo $message;
    });

    //Connect to the server
    $client->connect(function($client)
    {
        //Subscribe to a single currency pair
        $client->subscribeTo('EUR/USD');

        //Subscribe to an array of currency pairs
        $client->subscribeTo([
            'GBP/JPY',
            'AUD/CAD',
            'EUR/CHF'
        ]);

        //Subscribe to all currency pairs
        $client->subscribeToAll();

        //Unsubscribe from a single currency pair
        $client->unsubscribeFrom('EUR/USD');

        //Unsubscribe from an array of currency pairs
        $client->unsubscribeFrom([
            'GBP/JPY',
            'AUD/CAD',
            'EUR/CHF'
        ]);

        //Unsubscribe from all currency pairs
        $client->unsubscribeFromAll();
    });