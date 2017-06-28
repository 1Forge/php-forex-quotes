# ForexQuotes

ForexQuotes is a PHP Library for fetching realtime forex quotes

# Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
    - [List of Symbols available](#get-the-list-of-available-symbols)
    - [Get quotes for specific symbols](#get-quotes-for-specified-symbols)
    - [Convert from one currency to another](#convert-from-one-currency-to-another)
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
    "oneforge/forexquotes": "2.0.0"
},
```
## Usage

### Instantiate the client
```php
//You can get an API key for free at 1forge.com
$client = new ForexDataClient('YOUR_API_KEY');
```

### Get the list of available symbols:

```php
<?php

use OneForge\ForexQuotes\ForexRequest;

$client = new ForexDataClient('YOUR_API_KEY');

/*
    Returns an array of symbols, eg: ['EURUSD', 'GBPJPY']
*/
$client->getSymbols(); 
```
### Get quotes for specified symbols:
```php
<?php

use OneForge\ForexQuotes\ForexRequest;

$client = new ForexDataClient('YOUR_API_KEY');

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
$client->getQuotes([
    'AUDUSD',
    'GBPJPY'
]);
```




### Convert from one currency to another:
```php
<?php

use OneForge\ForexQuotes\ForexRequest;

$client = new ForexDataClient('YOUR_API_KEY');

/* 
 
     [value] => 111.961
     [text] => 100 EUR is worth 111.961 USD
     [timestamp] => 1497187505
 
*/   
$client->convert('USD', 'EUR', 100);
```



### Check if the market is open:
```php
<?php

use OneForge\ForexQuotes\ForexRequest;

$client = new ForexDataClient('YOUR_API_KEY');

/* 
    Returns an boolean
*/   

if ($client->marketIsOpen())
{
    echo "Market is open";    
}
```

### Check your usage / quota limit:
```php
<?php

use OneForge\ForexQuotes\ForexRequest;

$client = new ForexDataClient('YOUR_API_KEY');

/* 
    [quota_used]        => 53232,
    [quota_limit]       => 100000,
    [quota_remaining]   => 46768,
    [hours_until_reset] => 11
    
*/   

$client->quota();
```



## Support and Contact
Please contact me at contact@1forge.com if you have any questions or requests.

## License and Terms 
This library is provided without warranty under the MIT license.
