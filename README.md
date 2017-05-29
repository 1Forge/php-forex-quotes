# PHPForexQuotes

Use <a href="http://getcomposer.org">Composer</a> to download the required packages using <code>composer update</code>

Get the list of available symbols like:
<code>QuoteRequest::getSymbols();</code>

Get quotes for specified symbols like:
<code>
QuoteRequest::getQuotes([
    'AUDUSD',
    'GBPJPY'
]);
</code>

You can also implement in other way you wish using the API documented here: <a href="https://1forge.com/forex-data-api">https://1forge.com/forex-data-api</a>

Please contact me at contact@1forge.com if you have any questions or requests.

This library is provided without warranty under the MIT license.
