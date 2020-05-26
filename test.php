<?php
require("./vendor/autoload.php");
// $msg = "Hello";
// echo $msg;
// require_once('./lib/ForexDataClient.php');
// include ("ForexDataClient.php");
    // use OneForge\ForexQuotes\ForexDataClient;
    require_once './lib/ForexDataClient.php';

    use OneForge\ForexQuotes\ForexDataClient;

    $client = new ForexDataClient('0JHZqgJf7V3tvd7BA3MGThQB3NqVX7F9');
    // $quotes = $client->getQuotes(['AUD/USD','EUR/USD']);
    // $quotes         = $client->getQuotes($client->getSymbols());
    // $quotes         = $client->getQuotes(["EUR/USD", "HUF/CHF", "TWD/SEK", "GNF/USD", "DKK/EUR", "GBP/SGD", "NPR/USD", "USD/CLY",
    //                                             "USD/GTQ", "PEN/COP", "AUD/PHP", "CHF/ISK", "USD/CLF", "GBP/SOS", "ARS/CHF", "GTQ/GBP", "CNH/USD",
    //                                             "EUR/HKD", "CZK/MXN", "ILS/NOK", "TWD/DKK", "EUR/AOA", "AUD/SEK", "DKK/USD", "SBD/USD", "ISK/EUR",
    //                                             "ZAR/PGK", "EUR/KHR", "TWD/MYR", "EUR/HTG", "VES/GBP", "COP/DKK", "ZAR/CDF", "GBP/BWP", "VND/JPY",
    //                                             "GBP/EUR", "BWP/GBP", "EUR/CLP", "NZD/ZAR", "ANG/USD", "USD/TRY", "EUR/SAR", "SEK/NZD", "AUD/DKK",
    //                                             "EUR/IQD", "ISK/USD", "CAD/BMD", "CLP/ZAR", "ZAR/FJD", "TRY/CAD", "AUD/MYR", "USD/HNL", "JPY/TRY",
    //                                             "GBP/RUB", "ZAR/CAD", "GBP/BTN", "INR/PKR", "XAU/CAD", "GBP/USD", "DKK/COP", "MYR/CNY", "CAD/HRK",
    //                                             "GBP/MMK", "NZD/NOK", "KRW/SGD", "EUR/PAB", "CZK/SEK", "EUR/YER", "CHF/ILS", "SEK/AUD", "USD/BZD",
    //                                             "MYR/KRW", "EUR/NAD", "GBP/KWD", "PHP/JPY", "HKD/TRY", "EUR/ARS", "ARE/CHF", "USD/NGN", "USD/SDG",
    //                                             "DOE/CHF", "CNY/SRD", "CAD/CHF", "SGD/EUR", "TWD/HKD", "CZK/DKK", "THB/TWD", "GBP/COP", "EUR/AFN",
    //                                             "INR/SEK", "ZAR/LAK", "KRW/EUR", "PEN/GBP", "EUR/LSL", "ETB/GBP", "EUR/CNH", "ZMW/ZAR", "UAH/EUR",
    //                                             "THB/JPY", "COP/CLP", "CAD/VND", "SGD/USD", "TOP/USD", "AUD/HKD", "USD/MXN", "RUB/EUR", "GHS/GBP",
    //                                             "QAR/USD", "USD/KYD", "KRW/RUB", "GNF/GBP", "KRW/USD", "USD/PKR", "NOK/SGD", "XAG/CAD", "PHP/ZAR",
    //                                             "EUR/BBD", "INR/MYR", "JPY/MXN", "EUR/CUP", "AUD/CLP", "TRY/NZD", "NPR/GBP", "EUR/GHS", "CHF/TRY",
    //                                             "KRU/USD", "CNY/DKK", "ZAR/NZD", "UAH/USD", "JPY/PKR", "TZS/USD", "USD/SRD", "CNY/MYR", "DKK/CZK",
    //                                             "AED/CAD", "RUB/USD", "GBP/QAR", "IDR/INR", "MXN/TRY", "DKK/GBP", "USD/PHP", "HKD/MXN", "TRY/AUD",
    //                                             "DKK/CNY", "GBP/BSD", "ZAR/AUD", "COP/ARS", "XAU/AUD", "EUR/INR", "OMR/PKR", "NOK/EUR", "CNH/KRW",
    //                                             "HKD/PKR", "CZK/HKD", "THB/ZAR", "USD/SEK", "ANG/GBP", "SLL/USD", "GBP/VES", "SEK/CHF", "AUD/ARS",
    //                                             "JPY/SEK", "MGA/USD", "CAD/THB", "GBP/CZK", "GBP/UYU", "ISK/GBP", "USD/PEN", "MAL/USD", "ZAR/LKR",
    //                                             "NOK/RUB", "NOK/USD", "ILS/EUR", "USD/DKK", "GBP/CNY", "INR/HKD", "PLN/CAD", "GYD/SRD", "GBP/RON",
    //                                             "EUR/TND", "DKK/PLN", "EUR/AED", "USD/MYR", "KES/CHF", "NZD/SGD", "HKD/SEK", "BDT/USD", "BMD/CAD",
    //                                             "AMD/USD", "NSO/CHF", "JPY/DKK", "GBP/KRW", "USD/KES", "AUD/CNH", "CNY/HKD", "JPY/MYR", "GBP/PYG",
    //                                             "CHF/MXN", "HRK/CAD", "ILS/USD", "CHF/PKR", "MAD/USD", "CNY/CLP", "EUR/ALL", "AED/NZD", "EUR/BAM",
    //                                             "CAD/ISK", "USD/LBP", "HKD/DKK", "XAG/AUD", "GBP/PLN", "HKD/MYR", "TWD/INR", "NZD/EUR", "SGD/CZK",
    //                                             "JOD/ILS", "SAR/PKR", "DOP/USD", "AED/AUD", "SGD/GBP", "TOP/GBP", "SGD/CNY", "DKK/HUF", "QAR/GBP",
    //                                             "CLP/EUR", "NGN/JPY", "EUR/BRL", "BRL/CAD", "TRY/CHF", "KRW/CNY", "ZAR/EGP", "CHF/SEK", "EUR/BGN",
    //                                             "AUD/INR", "NZD/USD", "USD/HKD", "SGD/KRW", "ZAR/CHF", "USD/AOA", "EUR/MTL", "USD/KHR", "DKK/UAH",
    //                                             "TTD/USD", "USD/HTG", "TZS/GBP", "ZAR/MAD", "PLN/NZD", "MXN/SEK", "JPY/HKD", "M5P/USD", "RUB/GBP",
    //                                             "USD/CLP", "CLP/USD", "VND/EUR", "CHF/DKK", "CAD/ILS", "CRC/USD", "ZAR/SZL", "GBP/HUF", "USD/SAR",
    //                                             "JPY/CLP", "MXN/PEN", "ZAR/VND", "RUB/KRW", "CHF/MYR", "SGD/PLN", "GBP/BND", "USD/IQD", "EUR/TWD",
    //                                             "VRN/CHF", "PLN/AUD", "AUD/AED", "GBP/MGA", "MXN/DKK", "JPY/SAR", "MUR/ZAR", "NGN/ZAR", "SLL/GBP",
    //                                             "GBP/UAH", "EUR/RWF", "VRL/CHF", "EGP/PKR", "USD/PAB", "NOK/CZK", "MGA/GBP", "USD/YER", "VND/USD",
    //                                             "GBP/MOP", "SEK/ISK", "GBP/ETB", "EUR/JPY", "CLP/COP", "EUR/OMR", "HRK/AUD", "USD/NAD", "RUB/PLN",
    //                                             "NOK/GBP", "USD/ARS", "DJF/GBP", "THB/SGD", "EUR/MWK", "BDT/GBP", "HUF/MXN", "JPY/ARS", "EUR/BIF",
    //                                             "COP/BRL", "BRL/NZD", "ZMW/USD", "USD/AFN", "CZK/AED", "GBP/GEL", "ZAR/JOD", "SGD/HUF", "USD/LSL",
    //                                             "EUR/ZMW", "EUR/JMD", "USD/CNH", "AED/CHF", "CNY/INR", "MAD/GBP", "CAD/TRY", "AUD/BRL", "ARS/MXN",
    //                                             "ZAR/THB", "GBP/DZD", "XAU/THB", "CHF/HKD", "PHP/USD", "BZD/USD", "HKD/ARS", "ZAR/BHD", "ZAR/XOF",
    //                                             "MYR/CAD", "AUD/BGN", "BRL/AUD", "AFN/USD", "NOK/PLN", "BIF/USD", "EUR/ZAR", "THB/EUR", "CHF/CLP",
    //                                             "MXN/HKD", "LFX/JPY", "SEK/ILS", "USD/BBD", "DOP/GBP", "USD/CUP", "USD/GHS", "HUF/SEK", "NZD/CZK",
    //                                             "MXN/CLP", "EUR/NPR", "XCD/GBP", "TWD/JPY", "NZD/GBP", "ILS/PLN", "THB/USD", "NZD/CNY", "AUD/TWD",
    //                                             "EUR/NOK", "SZL/CHF", "TMT/USD", "PLN/CHF", "TTD/GBP", "PEN/CAD", "USD/INR", "NZD/KRW", "HUF/DKK",
    //                                             "EUR/LYD", "MKD/USD", "RSD/EUR", "CLP/GBP", "CLP/CNY", "AUD/JPY", "CHF/ARS", "MZN/ZAR", "ARS/PEN",
    //                                             "CRC/GBP", "JPY/INR", "NOK/HUF", "FRN/CHF", "EUR/UGX", "GBP/XPF", "LYD/USD", "EUR/IDR", "CAD/MXN",
    //                                             "MXN/ARS", "CAD/KYD", "NZD/PLN", "CAD/PKR", "TWD/ZAR", "SEK/TRY", "MYR/NZD", "GBP/MKD", "USD/TND",
    //                                             "USD/AED", "HKD/INR", "VND/GBP", "CHF/CNH", "EUR/TZS", "AED/BHD", "COP/ZAR", "NBL/USD", "CNY/BGN",
    //                                             "USD/ANG", "ZAR/MUR", "KWD/PKR", "JPY/AED", "DKK/CAD", "GBP/PGK", "CZK/JPY", "EUR/BYN", "ZAR/ILS",
    //                                             "MYR/AUD", "PKR/JPY", "GBP/CDF", "BRL/CHF", "AUD/ZAR", "USD/ALL", "USD/BAM", "BND/USD", "INR/TWD",
    //                                             "GBP/SCR", "OMR/AED", "CAD/SEK", "HKD/AED", "HUF/HKD", "ISK/CAD", "CNY/TWD", "GBP/FJD", "PHP/GBP",
    //                                             "NZD/HUF", "INR/JPY", "GBP/CAD", "CAD/PEN", "AFN/GBP", "GBP/DJF", "USD/KMF", "AUD/NOK", "USD/BRL",
    //                                             "ARS/HKD", "CHF/INR", "GBP/MDL", "CAD/DKK", "CNY/JPY", "MUR/EUR", "USD/BGN", "CAD/MYR", "CZK/ZAR",
    //                                             "JPY/BRL", "ARS/CLP", "PKR/ZAR", "SEK/MXN", "GBP/MVR", "GBP/CRC", "THB/CNY", "ZAR/TRY", "AUD/IDR",
    //                                             "XAU/TRY", "AWG/SRD", "MUR/USD", "GBP/LAK", "PGK/USD", "EUR/SGD", "NGN/USD", "HKD/BRL", "DKK/NZD",
    //                                             "CHF/AED", "THB/KRW", "BWP/CHF", "USD/TWD", "CZK/NOK", "MKD/GBP", "INR/ZAR", "TOP/FJD", "LKR/ZAR",
    //                                             "EUR/SOS", "SGD/CAD", "USD/AWG", "USD/RWF", "MXN/AED", "MDL/EUR", "GBP/BOB", "JPY/TWD", "CNY/ZAR",
    //                                             "BBD/EUR", "DKK/AUD", "KRW/CAD", "USD/JPY", "LYD/GBP", "USD/OMR", "BSD/USD", "MYR/CHF", "EUR/BWP",
    //                                             "ZAR/NGN", "GBP/NZD", "GBP/LFX", "CAD/HKD", "USD/MWK", "HKD/TWD", "RUB/CAD", "MDL/USD", "USD/BIF",
    //                                             "BBD/USD", "CAD/CLP", "SEK/DKK", "USD/ZMW", "USD/JMD", "CHF/BRL", "XPTK/CHF", "EUR/RUB", "EUR/BTN",
    //                                             "GBP/AUD", "HKD/JPY", "XAG/TRY", "PLN/ILS", "EUR/MMK", "TRY/MXN", "CAD/SAR", "BND/GBP", "ZAR/MXN",
    //                                             "TWD/SGD", "XAU/MXN", "MXN/BRL", "USD/ZAR", "EUR/KWD", "ZAR/PKR", "AED/TRY", "GBP/GYD", "GBP/LKR",
    //                                             "NOK/CAD", "JPY/ZAR", "GBP/GNF", "UGX/ZAR", "GBP/DOP", "BGN/USD", "SGD/NZD", "TOP/NZD", "USD/NPR",
    //                                             "EUR/COP", "PAB/USD", "AUD/SGD", "GBP/TOP", "CAD/ARS", "CHF/TWD", "LRD/USD", "CYP/ZAR", "KRW/NZD",
    //                                             "USD/IRR", "ZAR/PHP", "USD/NOK", "TWD/EUR", "GBP/BDT", "OMR/ZAR", "HKD/ZAR", "MZN/USD", "AUN/USD",
    //                                             "TRY/SEK", "ILS/CAD", "ZAR/SEK", "SGD/AUD", "TOP/AUD", "JPY/NOK", "SCR/USD", "CHF/JPY", "USD/LYD",
    //                                             "MYR/THB", "HUF/AED", "SEK/HKD", "GBP/BMD", "DKK/CHF", "KRW/AUD", "CAD/CNH", "BRL/ILS", "MUR/GBP",
    //                                             "PGK/GBP", "BHD/PKR", "EUR/AMD", "NGN/GBP", "PLN/TRY", "TWD/USD", "AUD/EUR", "MXN/JPY", "USD/UGX",
    //                                             "GBP/HRK", "USD/IDR", "UYU/EUR", "TRY/DKK", "XAG/MXN", "SAR/JPY", "HKD/NOK", "COP/USD", "CZK/SGD",
    //                                             "ZAR/DKK", "RUB/AUD", "EUR/QAR", "ZAR/MYR", "ISK/CHF", "USD/TZS", "BAM/USD", "BRI/USD", "AED/MXN",
    //                                             "ZAR/KES", "GBP/EGP", "AUD/RUB", "NZD/CAD", "AUD/USD", "BSD/GBP", "EUR/BSD", "USD/GMD", "GBP/CHF",
    //                                             "AED/PKR", "UYU/USD", "EUR/RSD", "NOK/NZD", "CHF/ZAR", "USD/BYN", "GBP/MAD", "JOD/AED", "INR/SGD",
    //                                             "MDL/GBP", "CZK/EUR", "CLP/CAD", "BBD/GBP", "ZAR/LBP", "EUR/CZK", "EUR/UYU", "CAD/INR", "PKR/EUR",
    //                                             "MXN/ZAR", "GBP/SZL", "GBP/XCD", "CNY/SGD", "GBP/VND", "NOK/AUD", "EUR/GBP", "IDR/KRW", "EUR/CNY",
    //                                             "EUR/MRU", "EUR/RON", "ARS/BRL", "CHF/NOK", "XPT/EUR", "AED/SEK", "CZK/USD", "EGP/JPY", "EUR/KRW",
    //                                             "PLN/MXN", "GBP/LRD", "PKR/USD", "TRY/HKD", "VND/CAD", "INR/EUR", "CNH/THB", "EUR/PYG", "SEK/CNH",
    //                                             "ZAR/HKD", "XAU/HKD", "MXN/NOK", "DKK/THB", "CAD/AED", "ILS/AUD", "BMD/KYD", "ZAR/KHR", "GBP/SLL",
    //                                             "SGD/CHF", "MAD/AUD", "CNY/EUR", "SHP/USD", "GBP/SVC", "BGN/CNY", "GBP/KZT", "ZAR/CLP", "RON/ZAR",
    //                                             "AED/DKK", "KRW/CHF", "XPT/USD", "KWD/AED", "LRD/GBP", "EUR/PLN", "INR/USD", "KRU/CHF", "ZAR/SAR",
    //                                             "LKR/USD", "HUF/JPY", "XAU/SAR", "NZD/LFX", "USD/SGD", "GBP/JOD", "RUB/CHF", "CNY/USD", "SCR/GBP",
    //                                             "GBP/THB", "PLN/SEK", "JPY/SGD", "EGP/ZAR", "USD/SOS", "GBP/BHD", "ARS/JPY", "NZD/AUD", "DKK/ISK",
    //                                             "TWD/CNY", "SEK/INR", "ZAR/NAD", "BRL/MXN", "GBP/NIO", "ZAR/ARS", "CAD/BRL", "XAU/ARS", "USD/BWP",
    //                                             "KHR/USD", "USD/EUR", "HKD/SGD", "TWD/KRW", "PLN/DKK", "CLP/AUD", "AUD/CZK", "XPD/EUR", "CAD/BGN",
    //                                             "XAG/HKD", "BAM/GBP", "MAL/CHF", "EUR/HUF", "JPY/EUR", "HUF/ZAR", "AUD/GBP", "THB/CAD", "AUD/CNY",
    //                                             "NOK/CHF", "EUR/BND", "BRL/SRD", "LTL/AUD", "UYU/GBP", "AUD/RON", "OSO/USD", "EUR/MGA", "ZAR/LSL",
    //                                             "XPF/USD", "KYD/EUR", "AED/HKD", "NZD/TOP", "GBP/ISK", "ZAR/CNH", "USD/RUB", "USD/BTN", "SEK/AED",
    //                                             "AUD/KRW", "EUR/MZN", "EUR/UAH", "USD/MMK", "XPD/USD", "XAG/SAR", "ARS/ZAR", "SGD/THB", "EUR/MOP",
    //                                             "HKD/EUR", "EUR/ETB", "JPY/RUB", "JPY/USD", "CAD/TWD", "BRL/SEK", "UGX/USD", "KRW/THB", "USD/KWD",
    //                                             "ILS/CHF", "TJS/USD", "GBP/TTD", "AED/SAR", "KYD/USD", "ZAR/GHS", "BRL/PEN", "PHP/NZD", "AUD/PLN",
    //                                             "CZK/GBP", "CHF/SGD", "CAD/JPY", "OMR/USD", "PKR/GBP", "HKD/USD", "USD/COP", "XAG/ARS", "EUR/GEL",
    //                                             "MWK/ZAR", "GBP/MUR", "PLN/HKD", "MXN/SGD", "EUR/DZD", "PHP/AUD", "ZAR/INR", "USD/TMT", "XAU/INR",
    //                                             "GYD/USD", "GBP/ILS", "XPT/GBP", "NZD/CHF", "INR/GBP", "INR/CNY", "CHF/BWP", "THB/NZD", "LKR/GBP",
    //                                             "CHF/XAGK", "USD/CVE", "USD/AMD", "USD/SBD", "M5P/CHF", "CZK/PLN", "CNY/GBP", "MYR/PKR", "INR/KRW",
    //                                             "XAGK/CHF", "CAD/ZAR", "MXN/EUR", "AUD/HUF", "MMK/USD", "USD/QAR", "DKK/TRY", "GBP/GTQ", "ZAR/TND",
    //                                             "ZAR/AED", "THB/AUD", "SAR/EUR", "CNY/KRW", "CHF/RUB", "CHF/USD", "ILS/JOD", "USD/BSD", "KHR/GBP",
    //                                             "USD/RSD", "MXN/RUB", "TND/ZAR", "MXN/USD", "PEN/MXN", "BRL/HKD", "CAD/NOK", "USD/VES", "SAR/USD",
    //                                             "SEK/JPY", "USD/CZK", "USD/UYU", "XAG/INR", "GBP/TRY", "BRL/CLP", "XPF/GBP", "KMF/USD", "NOK/ISK",
    //                                             "CZK/HUF", "USD/GBP", "USD/CNY", "JPY/CZK", "SAR/KWD", "XPD/GBP", "USD/MRU", "GBP/HNL", "EUR/MKD",
    //                                             "EUR/UZS", "USD/RON", "AED/INR", "TRY/BRL", "MYR/DKK", "JPY/GBP", "USD/KRW", "ZAR/BRL", "JPY/CNY",
    //                                             "XAUK/CHF", "UGX/GBP", "MXN/COP", "XAU/BRL", "JPY/RON", "USD/PYG", "NZD/THB", "GBP/BZD", "HUF/SGD",
    //                                             "KYD/GBP", "EGP/EUR", "RON/USD", "EUR/PGK", "HKD/CZK", "JPY/KRW", "XPDK/CHF", "CAD/ZAR", "MXN/EUR",
    //                                             "AUD/HUF", "MMK/USD", "USD/QAR", "DKK/TRY", "GBP/GTQ", "ZAR/TND", "ZAR/AED", "THB/AUD", "SAR/EUR",
    //                                             "CNY/KRW", "CHF/XPDK", "CHF/XAUK", "ILS/JOD", "USD/BSD", "KHR/GBP", "USD/RSD", "MXN/RUB", "TND/ZAR",
    //                                             "MXN/USD", "PEN/MXN", "BRL/HKD", "CAD/NOK", "USD/VES", "SAR/USD", "SEK/JPY", "USD/CZK", "USD/UYU",
    //                                             "XAG/INR", "GBP/TRY", "BRL/CLP", "XPF/GBP", "KMF/USD", "NOK/ISK", "CZK/HUF", "USD/GBP", "USD/CNY",
    //                                             "JPY/CZK", "SAR/KWD", "XPD/GBP", "USD/MRU", "GBP/HNL", "EUR/MKD", "EUR/UZS", "USD/RON", "AED/INR",
    //                                             "TRY/BRL", "MYR/DKK", "JPY/GBP", "USD/KRW", "ZAR/BRL", "JPY/CNY", "USD/CHF", "UGX/GBP", "JPY/USD",
    //                                             "CAD/TWD", "BRL/SEK", "UGX/USD", "KRW/THB", "USD/KWD", "CHF/XPTK", "TJS/USD", "GBP/TTD", "AED/SAR",
    //                                             "CAD/JPY", "OMR/USD", "PLN/HKD", "MXN/SGD", "XPTK/CHF", 
    //                                             "USD/AMD", "BTC/USD",
    //                                             "USD/SBD", "M5P/CHF",
    //                                             //  "CZK/PLN",
    //                                             "AUD/HUF","MMK/USD", "USD/QAR","DKK/TRY" 
    //                                             ]);
    // print_r($quotes);
 
    //  //Connect to the server
    print_r("Triggered");
    $client->connect(function($client)
     {print_r("Triggered111");
         //Subscribe to a single currency pair
         $client->subscribeTo('BTC/USD');
         print_r("Triggered222");
     });
    // //Handle incoming price updates from the server
    //  $client->onUpdate(function($symbol, $data)
    //  {
    //      print_r($data);
    //      echo $symbol . ": " . $data["bid"] . " " .$data["ask"] . " " . $data["price"]."\n";
    //  });
 
    //  //Handle non-price update messages
    print_r("Triggered333");
     $message1 = $client->onMessage(function($message)
     {print_r("Triggered4444");
         echo $message;
     });
     print_r($message1);