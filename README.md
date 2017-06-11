# ForexQuotes

ForexQuotes is a PHP Library for fetching realtime forex quotes

# Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
    - [List of Symbols available](#get-the-list-of-available-symbols)
    - [Get quotes for specific symbols](#get-quotes-for-specified-symbols)
    - [Convert from one currency to another](#convert-from-one-currency-to-another)
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
    "oneforge/forexquotes": "1.0.5"
},
```
## Usage

### Get the list of available symbols:

```php
<?php

use OneForge\ForexQuotes\ForexRequest;

/*
    Returns an array of symbols, eg: ['EURUSD', 'GBPJPY']
*/
ForexRequest::getSymbols(); 
```
### Get quotes for specified symbols:
```php
<?php

use OneForge\ForexQuotes\ForexRequest;

/* 
Returns an array of quotes, eg: 
 [
     [
       "symbol" => "EURUSD",
       "price" => 1.11725,
       "timestamp" => 1496190844,
     ],
     [
       "symbol" => "GBPJPY",
       "price" => 142.037,
       "timestamp" => 1496190844,
     ],
   ]
*/   
ForexRequest::getQuotes([
    'AUDUSD',
    'GBPJPY'
]);
```




### Convert from one currency to another:
```php
<?php

use OneForge\ForexQuotes\ForexRequest;

/* 
 
     [value] => 111.961
     [text] => 100 EUR is worth 111.961 USD
     [timestamp] => 1497187505
 
*/   
ForexRequest::convert('USD', 'EUR', 100);
```



### Check if the market is open:
```php
<?php

use OneForge\ForexQuotes\ForexRequest;

/* 
    Returns an boolean
*/   

if (ForexRequest::marketIsOpen())
{
    echo "Market is open";    
}
```


## Other implementations
You can also implement the api directly in any other way you wish. Full documentation is maintained here: <a href="https://1forge.com/forex-data-api">https://1forge.com/forex-data-api</a>

### Get specific quotes
#### Request
```
GET https://forex.1forge.com/1.0.1/quotes?pairs=EURUSD,GBPJPY,AUDUSD
```

#### Response
```javascript
[
   {
      symbol: "AUDUSD",
      timestamp: 1496096387,
      price: 0.74392,
   },
   {
      symbol: "EURUSD",
      timestamp: 1496096387,
      price: 1.11383,
   },
   {
      symbol: "GBPJPY",
      timestamp: 1496096387,
      price: 142.657,
   }
]
```


### Get the symbol list
#### Request
```
GET https://forex.1forge.com/1.0.1/symbols
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


### Convert from one currency to another
#### Request
```
GET https://forex.1forge.com/1.0.1/convert?from=USD&to=EUR&quantity=100
```

#### Response
```javascript

{
     value: 89.3164183,
     text: "100 USD is worth 89.3164183 EUR",
     timestamp: 1497186516
}

```

### Get the market status
#### Request
```
GET https://forex.1forge.com/1.0.1/market_status
```

#### Response
```javascript

{
     market_is_open: true
}

```

## Support and Contact
Please contact me at contact@1forge.com if you have any questions or requests.

## License and Terms 
This library is provided without warranty under the MIT license.
