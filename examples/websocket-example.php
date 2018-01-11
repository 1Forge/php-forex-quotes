<?php

    /*
    * This library is provided without warranty under the MIT license
    * Created by Jacob Davis <jacob@1forge.com>
    */

    require_once __DIR__ . '/../vendor/autoload.php';

    use OneForge\ForexQuotes\ForexDataClient;

    $client = new ForexDataClient('YOUR_API_KEY');

    //Handle incoming price updates from the server
    $client->onUpdate(function($symbol, $data)
    {
        echo $symbol . ": " . $data["bid"] . " " .$data["ask"] . " " . $data["price"]."\n";
    });

    //Connect to the server
    $client->connect(function($client)
    {
        //Subscribe to a single currency pair
        $client->subscribeTo('EURUSD');

        //Subscribe to an array of currency pairs
        $client->subscribeTo([
            'GBPJPY',
            'AUDCAD',
            'EURCHF'
        ]);

        //Subscribe to all currency pairs
        $client->subscribeToAll();

        //Unsubscribe from a single currency pair
        $client->unsubscribeFrom('EURUSD');

        //Unsubscribe from an array of currency pairs
        $client->unsubscribeFrom([
            'GBPJPY',
            'AUDCAD',
            'EURCHF'
        ]);

        //Unsubscribe from all currency pairs
        $client->unsubscribeFromAll();

    });