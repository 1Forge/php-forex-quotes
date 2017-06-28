<?php

    /*
     * This library is provided without warranty under the MIT license.
     * Created by 1Forge - http://1forge.com
     */

    namespace OneForge\ForexQuotes;

    require_once __DIR__ . '/vendor/autoload.php';

    $client         = new ForexDataClient('YOUR_API_KEY');
    $quotes         = $client->getQuotes(['AUDUSD',
                                          'GBPJPY']);
    $symbols        = $client->getSymbols();
    $conversion     = $client->convert('EUR', 'USD', 100);
    $market_is_open = $client->marketIsOpen();

    print_r($quotes);
    print_r($symbols);
    print_r($conversion);

    if ($market_is_open)
    {
        echo 'Market is open!';
    }
