<?php

/*
 * This library is provided without warranty under the MIT license.
 * Created by 1Forge - http://1forge.com
 */

namespace OneForge\ForexQuotes;
require_once __DIR__ . '/vendor/autoload.php';

$quotes = QuoteRequest::getQuotes([
    'AUDUSD',
    'GBPJPY'
]);

$symbols = QuoteRequest::getSymbols();

print_r($quotes);
print_r($symbols);