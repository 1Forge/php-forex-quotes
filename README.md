# PHPForexQuotes

PHPForexQuotes is a PHP Library for fetching realtime forex quotes

# Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
    - [List of Symbols available](#get-the-list-of-available-symbols)
    - [Get quotes for specific symbols](#get-quotes-for-specified-symbols)
- [Other implementations](#other-implementations)
    - [API Call: Get all quotes](#get-all-quotes)
    - [API Call: Get specific quotes](#get-specific-quotes)
    - [API Call: Get the symbol list](#get-the-symbol-list)
- [Support / Contact](#support-and-contact)
- [License / Terms](#license-and-terms)

## Requirements
* PHP >= 5.6.4


## Installation
```
composer require oneforge/forexquotes
```
Or in your composer.json
```javascript
"require": {
    "oneforge/forexquotes": "dev-master"
},
```
## Usage

### Get the list of available symbols:

```php
<?php

use OneForge\ForexQuotes\QuoteRequest;

//Returns an array of symbols, eg: ['EURUSD', 'GBPJPY']
QuoteRequest::getSymbols(); 
```
### Get quotes for specified symbols:
```php
<?php

use OneForge\ForexQuotes\QuoteRequest;

/* 
Returns an array of quotes, eg: 
 [
     [
       "symbol" => "EURUSD",
       "bid" => 1.11725,
       "ask" => 1.11746,
       "timestamp" => 1496190844,
     ],
     [
       "symbol" => "GBPJPY",
       "bid" => 142.037,
       "ask" => 142.09,
       "timestamp" => 1496190844,
     ],
   ]
*/   
QuoteRequest::getQuotes([
    'AUDUSD',
    'GBPJPY'
]);
```

## Other implementations
You can also implement the api directly in any other way you wish. Full documentation is maintained here: <a href="https://1forge.com/forex-data-api">https://1forge.com/forex-data-api</a>


### Get all quotes
#### Request
```
GET https://1forge.com/forex-quotes/quotes
```

#### Response
```javascript
[
   {
      symbol: "AUDJPY",
      timestamp: 1496096332,
      bid: 82.726,
      ask: 82.757
   },
   {
      symbol: "AUDUSD",
      timestamp: 1496096332,
      bid: 0.74396,
      ask: 0.74418
   },
   {
      etc: "........"
   }
]
```

### Get specific quotes
#### Request
```
GET https://1forge.com/forex-quotes/quotes?pairs=EURUSD,GBPJPY,AUDUSD
```

#### Response
```javascript
[
   {
      symbol: "AUDUSD",
      timestamp: 1496096387,
      bid: 0.74392,
      ask: 0.74416
   },
   {
      symbol: "EURUSD",
      timestamp: 1496096387,
      bid: 1.11383,
      ask: 1.11404
   },
   {
      symbol: "GBPJPY",
      timestamp: 1496096387,
      bid: 142.657,
      ask: 142.715
   }
]
```


### Get the symbol list
#### Request
```
GET https://1forge.com/forex-quotes/symbols
```

#### Response
```javascript
[
   "AUDJPY",
   "AUDUSD",
   "CHFJPY",
   "EURAUD",
   "EURCAD",
   "EURCHF",
   "EURGBP",
   "EURJPY",
   "etc..." 
]
```

## Support and Contact
Please contact me at contact@1forge.com if you have any questions or requests.

## License and Terms 
This library is provided without warranty under the MIT license.
