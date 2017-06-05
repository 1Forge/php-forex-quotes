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
    $market_is_open = ForexRequest::marketIsOpen();

    if ($market_is_open)
    {
        echo 'yes';
    }

    print_r($quotes);
    print_r($symbols);