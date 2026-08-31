<?php
/**
 * Sample plugin tests.
 *
 * @package ItMogul
 */

declare( strict_types=1 );

namespace ItMogul\Mu\Plugins\Tests\Sample;

use ItMogul\Mu\Plugins\Sample\SampleClass;
use WP_Mock;
use WP_Mock\Tools\TestCase;

/**
 * Tests for the SampleClass.
 */
class SampleTest extends TestCase {

	/**
	 * Test that register adds the expected hook.
	 *
	 * @return void
	 */
	public function test_register_adds_enqueue_hook(): void {
		WP_Mock::expectActionAdded( 'wp_enqueue_scripts', [ new SampleClass(), 'enqueue_assets' ] );

		$sample = new SampleClass();
		$sample->register();

		$this->assertConditionsMet();
	}
}
