# Whise WebServices

PHP client for the [Whise](https://www.whise.eu) webservices.

## Installation

`composer require fw4/whise-webservices`

## Usage

```php
$client = new \Whise\WebServices('12345');
$estates = $client->getEstateList([
    'CountryID' => 1
]);
foreach ($estates as $estate) var_dump($estate->id);
```

It's also possible to construct requests through objects:

```php
$request = new \Whise\Request\GetEstateListRequest();
$request->countryID = 1;
$request->zipList = [1000];

$client = new \Whise\WebServices('12345');
$estates = $client->getEstates($request);
foreach ($estates as $estate) var_dump($estate->id);
```

Properties on both requests and responses are implemented case insensitively.

## Pagination

When iterating over a response containing multiple objects, sequential pagination requests will automatically be sent in the background.

Due to unresolved bugs in the webservices, counting some responses might return an incorrect amount.
