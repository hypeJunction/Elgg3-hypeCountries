<?php

/**
 * Displays a dropdown of countries
 */

$countries = elgg()->countries->getCountries();

$vars['options_values'] = ['' => ''];

foreach ($countries as $country) {
	$vars['options_values'][] = [
		'text' => $country->name,
		'value' => $country->iso,
		'title' => $country->name,
		'data-icon-url' => $country->getFlagURL(),
	];
}

if (isset($vars['class'])) {
	$vars['class'] = "{$vars['class']} elgg-input-country";
} else {
	$vars['class'] = 'elgg-input-country';
}

if (!isset($vars['name'])) {
	$vars['name'] = 'country';
}

$vars['placeholder'] = elgg_echo('countries:placeholder');

echo elgg_view('input/select', $vars);
