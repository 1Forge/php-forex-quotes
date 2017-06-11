<?php

    /*
     * This library is provided without warranty under the MIT license.
     * Created by 1Forge - http://1forge.com
     */

    namespace OneForge\ForexQuotes;

    require_once __DIR__ . '/vendor/autoload.php';

    $quotes         = ForexRequest::getQuotes(['AUDUSD',
                                               'GBPJPY']);
    $symbols        = ForexRequest::getSymbols();
    $conversion     = ForexRequest::convert('EUR', 'USD', 100);
    $market_is_open = ForexRequest::marketIsOpen();

    print_r($quotes);
    print_r($symbols);
    print_r($conversion);

    if ($market_is_open)
    {
        echo 'Market is open!';
    }
