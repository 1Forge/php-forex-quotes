# php-forex-quotes

php-forex-quotes is a PHP Library for fetching realtime forex quotes. See the examples for REST and WebSocket implementation in the [/examples](https://github.com/1Forge/php-forex-quotes/tree/master/examples) folder.

<a href="#">![1Forge Data](https://1forge.com/images/1forge.gif)</a>

# Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
    - [List of Symbols available](#get-the-list-of-available-symbols)
    - [Get quotes for specific symbols](#get-quotes-for-specified-symbols)
    - [Convert from one currency to another](#convert-from-one-currency-to-another)
    - [Check if the market is open](#check-if-the-market-is-open)
    - [Stream quote updates via WebSocket](#stream-quote-updates)
- [Contributing](#contributing)
- [Support / Contact](#support-and-contact)
- [License / Terms](#license-and-terms)

## Requirements
* PHP >= 6.0.1
* An API key which you can obtain for free at http://1forge.com/forex-data-api

## Installation
```
composer require oneforge/forexquotes
```
Or in your composer.json
```javascript
"require": {
    "oneforge/forexquotes": "~6.0"
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
    'AUD/USD',
    'GBP/JPY'
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
    echo $symbol . ": " . $data["b"] . " " .$data["a"] . " " . $data["p"]."\n";
});

//Handle non-price update messages
$client->onMessage(function($message)
{
    echo $message;
});

//Connect to the server
$client->connect(function($client)
{
    //Subscribe to a single currency pair
    $client->subscribeTo('EUR/USD');

    //Subscribe to an array of currency pairs
    $client->subscribeTo([
        'GBP/JPY',
        'AUD/CAD',
        'EUR/CHF'
    ]);

    //Subscribe to all currency pairs
    $client->subscribeToAll();

    //Unsubscribe from a single currency pair
    $client->unsubscribeFrom('EUR/USD');

    //Unsubscribe from an array of currency pairs
    $client->unsubscribeFrom([
        'GBP/JPY',
        'AUD/CAD',
        'EUR/CHF'
    ]);

    //Unsubscribe from all currency pairs
    $client->unsubscribeFromAll();

});
```

## Contributing
Thank you for considering contributing! Any issues, bug fixes, suggestions, improvements or help in any other way is always appreciated.  Please feel free to open an issue or create a pull request.

## Support and Contact
Please contact me at contact@1forge.com if you have any questions or requests.

## License and Terms 
This library is provided without warranty under the MIT license.
