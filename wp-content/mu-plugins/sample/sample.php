<?php
/**
 * Plugin Name: The IT Mogul Sample Plugin
 * Description: An example MU plugin demonstrating how to structure business/application logic for The IT Mogul.
 *
 * @package ItMogul
 */

declare( strict_types=1 );

use ItMogul\Mu\Plugins\Sample\SampleClass;

add_action(
	'init',
	static function () {
		$sample = new SampleClass();
		$sample->register();
	}
);
