<?php

/**
 * A standard postal address form
 *
 * @uses $vars['prefix'] A string to prefix input names with, defaults to 'address'
 * @uses $vars['value'] An array of values to prepopulate the form with
 * @uses $vars['required'] Make required
 */

$prefix = elgg_extract('name', $vars, 'address');
$required = elgg_extract('required', $vars, false);
$value = elgg_extract('value', $vars, []);
if ($value instanceof \hypeJunction\Countries\Address) {
	$value = $value->toArray();
}

$fields = [
	[
		'name' => "{$prefix}[street_address]",
		'value' => elgg_extract('street_address', $value),
        '#type' => 'text',
		'#class' => ['input-street-address', 'elgg-col-1of3', 'elgg-col'],
		'placeholder' => elgg_echo('address:street_address'),
		'required' => $required,
	],
	[
		'name' => "{$prefix}[extended_address]",
		'value' => elgg_extract('extended_address', $value),
		'#type' => 'text',
		'#class' => ['input-extended-address', 'elgg-col-1of3', 'elgg-col'],
		'placeholder' => elgg_echo('address:extended_address'),
	],
	[
		'name' => "{$prefix}[locality]",
		'value' => elgg_extract('locality', $value),
		'#type' => 'text',
		'#class' => ['input-locality', 'elgg-col-1of3', 'elgg-col'],
		'placeholder' => elgg_echo('address:locality'),
		'required' => $required
	],
	[
		'name' => "{$prefix}[region]",
		'value' => elgg_extract('region', $value),
		'#type' => 'select',
		'#class' => ['input-region', 'elgg-col-1of4', 'elgg-col'],
		'class' => 'geo-input-region',
		'placeholder' => elgg_echo('address:region'),
		'required' => $required,
		'options_values' => [
			'' => '',
			'AL' => 'Alabama',
			'AK' => 'Alaska',
			'AZ' => 'Arizona',
			'AR' => 'Arkansas',
			'CA' => 'California',
			'CO' => 'Colorado',
			'CT' => 'Connecticut',
			'DE' => 'Delaware',
			'DC' => 'District Of Columbia',
			'FL' => 'Florida',
			'GA' => 'Georgia',
			'HI' => 'Hawaii',
			'ID' => 'Idaho',
			'IL' => 'Illinois',
			'IN' => 'Indiana',
			'IA' => 'Iowa',
			'KS' => 'Kansas',
			'KY' => 'Kentucky',
			'LA' => 'Louisiana',
			'ME' => 'Maine',
			'MD' => 'Maryland',
			'MA' => 'Massachusetts',
			'MI' => 'Michigan',
			'MN' => 'Minnesota',
			'MS' => 'Mississippi',
			'MO' => 'Missouri',
			'MT' => 'Montana',
			'NE' => 'Nebraska',
			'NV' => 'Nevada',
			'NH' => 'New Hampshire',
			'NJ' => 'New Jersey',
			'NM' => 'New Mexico',
			'NY' => 'New York',
			'NC' => 'North Carolina',
			'ND' => 'North Dakota',
			'OH' => 'Ohio',
			'OK' => 'Oklahoma',
			'OR' => 'Oregon',
			'PA' => 'Pennsylvania',
			'RI' => 'Rhode Island',
			'SC' => 'South Carolina',
			'SD' => 'South Dakota',
			'TN' => 'Tennessee',
			'TX' => 'Texas',
			'UT' => 'Utah',
			'VT' => 'Vermont',
			'VA' => 'Virginia',
			'WA' => 'Washington',
			'WV' => 'West Virginia',
			'WI' => 'Wisconsin',
			'WY' => 'Wyoming',
		],
	],
	[
		'name' => "{$prefix}[postal_code]",
		'value' => elgg_extract('postal_code', $value),
		'#type' => 'text',
		'#class' => ['input-postal-code', 'elgg-col-1of4', 'elgg-col'],
		'placeholder' => elgg_echo('address:postal_code'),
		'required' => $required
	],
	[
		'name' => "{$prefix}[country_code]",
		'value' => 'US',
		'disabled' => true,
		'#type' => 'country',
		'#class' => ['input-country-code', 'elgg-col-1of2', 'elgg-col'],
		'placeholder' => elgg_echo('address:country'),
		'required' => $required,
        'config' => [
            'allowClear' => true,
            'width' => '100%',
        ],
	],
];

echo elgg_view_field([
    '#type' => 'fieldset',
    '#class' => ['elgg-input-address'],
    'class' => 'elgg-grid',
    'fields' => $fields,
]);