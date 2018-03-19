<?php

namespace hypeJunction;

/**
 * @property string $name
 * @property string $iso
 * @property string $iso3
 * @property string $iso_numeric
 * @property string $fips
 * @property string $capital
 * @property string $area
 * @property string $population
 * @property string $continent
 * @property string $tld
 * @property string $currency_code
 * @property string $currency_name
 * @property string $phone_code
 * @property string $postal_code_format
 * @property string $postal_code_regex
 * @property string $languages
 * @property string $geoname_id
 * @property string $neighbours
 */
class Country extends \ArrayObject {

	/**
	 * {@inheritdoc}
	 */
	public function __construct($input = [], int $flags = self::ARRAY_AS_PROPS, string $iterator_class = "ArrayIterator") {
		parent::__construct($input, $flags, $iterator_class);
	}

	/**
	 * Returns flag URL
	 * @return string
	 */
	public function getFlagURL() {
		$code = strtolower($this->iso);
		return elgg_get_simplecache_url("countries/{$code}.svg");
	}
}