<?php

$value = elgg_extract('value', $vars);
if (!$value) {
	return;
}

$countries = elgg()->countries->getCountries();

if (array_key_exists($value, $countries)) {
	echo $countries[$value]->name;
} else {
	echo $value;
}
