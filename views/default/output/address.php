<?php

$value = elgg_extract('value', $vars);

if (is_array($value)) {
	$address = new \hypeJunction\Countries\Address();
	foreach ($value as $key => $part) {
		$address->$key = $part;
	}
} else {
	$address = $value;
}

echo $address->format();