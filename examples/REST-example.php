<?php

    /*
    * This library is provided without warranty under the MIT license
    * Created by 1Forge <contact@1forge.com>
    */

    require_once __DIR__ . './vendor/autoload.php';

    use OneForge\ForexQuotes\ForexDataClient;

    $client         = new ForexDataClient('YOUR_API_KEY');
    $quotes         = $client->getQuotes(['AUD/USD',
                                          'GBP/JPY']);
    $symbols        = $client->getSymbols();
    $conversion     = $client->convert('EUR', 'USD', 100);
    $quota          = $client->quota();
    $market_is_open = $client->marketIsOpen();

    print_r($quotes);
    print_r($symbols);
    print_r($conversion);
    print_r($quota);

    if ($market_is_open)
    {
        echo 'Market is open!';
    }
