<?php
/**
 * Sample class.
 *
 * This is an example of how to structure a class within an MU plugin.
 * Business/application logic belongs in MU plugins, not in the theme.
 *
 * @package ItMogul
 */

declare( strict_types=1 );

namespace ItMogul\Mu\Plugins\Sample;

/**
 * Sample class.
 */
class SampleClass {

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function register(): void {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
	}

	/**
	 * Enqueue sample assets.
	 *
	 * @return void
	 */
	public function enqueue_assets(): void {
		wp_enqueue_style(
			'it-mogul-sample',
			plugin_dir_url( __DIR__ ) . 'assets/sample.css',
			[],
			'1.0.0'
		);
	}
}
