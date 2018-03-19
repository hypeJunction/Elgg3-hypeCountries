<?php

/**
 * Countries
 *
 * @author    Ismayil Khayredinov <info@hypejunction.com>
 * @copyright Copyright (c) 2015, Ismayil Khayredinov
 */

require_once __DIR__ . '/autoloader.php';

return function () {
	elgg_register_event_handler('init', 'system', function () {
		elgg_extend_view('theme_sandbox/forms', 'theme_sandbox/forms/countries');
	});
};
