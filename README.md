hypeCountries
=============
![Elgg 3.0](https://img.shields.io/badge/Elgg-3.0-orange.svg?style=flat-square)

Country utilities

## Features

* Country info, including name, ISO, ISO-3, ISO numeric, FIPS, TLD, currency code, postal code format and other
* Country input view


## Usage

### Country select

```php
echo elgg_view('input/country', array(
	'name' => 'country',
	'value' => 'CZ',
));
```


### List countries

```php
$countries = elgg()->countries->getCountries();
foreach ($countries as $country) {
	/* @var $country \hypeJunction\Country */
	echo "$country->name ($country->iso)";
}
```


### Country info

Get a list of countries with extended details

```php
$fields = array(
	'name',
	'iso',
	'iso3',
	//'iso_numeric',
	//'fips',
	'capital',
	//'area',
	//'population',
	//'continent',
	'tld',
	'currency_code',
	'currency_name',
	'phone_code',
	'postal_code_format',
	'postal_code_regex',
	'languages',
	//'geoname_id',
	'neighbours'
);

// Get a list of countries ordered by currency_code
$countries = elgg_get_country_info($fields, 'currency_code');
```
