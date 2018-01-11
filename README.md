# php-forex-quotes

php-forex-quotes is a PHP Library for fetching realtime forex quotes. See the examples for REST and WebSocket implementation in the [/examples](https://github.com/1Forge/php-forex-quotes/tree/master/examples) folder.

# Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
    - [List of Symbols available](#get-the-list-of-available-symbols)
    - [Get quotes for specific symbols](#get-quotes-for-specified-symbols)
    - [Convert from one currency to another](#convert-from-one-currency-to-another)
    - [Check if the market is open](#check-if-the-market-is-open)
    - [Stream quote updates via WebSocket](#stream-quote-updates)
- [Support / Contact](#support-and-contact)
- [License / Terms](#license-and-terms)

## Requirements
* PHP >= 5.6.4
* An API key which you can obtain for free at http://1forge.com/forex-data-api

## Installation
```
composer require oneforge/forexquotes
```
Or in your composer.json
```javascript
"require": {
    "oneforge/forexquotes": "2.0.5"
},
```
## Usage

### Instantiate the client
```php
<?php

use OneForge\ForexQuotes\ForexDataClient;

//You can get an API key for free at 1forge.com
$client = new ForexDataClient('YOUR_API_KEY');
```

### Get the list of available symbols:

```php
$client->getSymbols(); 
```
### Get quotes for specified symbols:
```php
$client->getQuotes([
    'AUDUSD',
    'GBPJPY'
]);
```
### Convert from one currency to another:
```php
$client->convert('USD', 'EUR', 100);
```

### Check if the market is open:
```php
if ($client->marketIsOpen())
{
    echo "Market is open";    
}
```

### Check your usage / quota limit:
```php
$client->quota();
```

### Stream quote updates:
WebSocket quote streaming is only available on paid plans.

```php
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
```


## Support and Contact
Please contact me at contact@1forge.com if you have any questions or requests.

## License and Terms 
This library is provided without warranty under the MIT license.
