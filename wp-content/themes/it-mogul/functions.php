<?php
/**
 * Theme functions.
 *
 * This theme is intentionally minimal. It provides the engineering
 * foundation for The IT Mogul rather than a finished visual design.
 *
 * @package ItMogul
 */

declare( strict_types=1 );

/**
 * Enqueue block editor assets.
 */
function it_mogul_enqueue_block_editor_assets(): void {
	$asset_file_path = get_theme_file_path( 'build/editor.asset.php' );

	if ( is_readable( $asset_file_path ) ) {
		// phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable
		$asset_file = include $asset_file_path;
	} else {
		$asset_file = [
			'dependencies' => [],
			'version'      => false,
		];
	}

	wp_enqueue_script(
		'it-mogul-editor',
		get_theme_file_uri( 'build/editor.js' ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);

	wp_enqueue_style(
		'it-mogul-editor',
		get_theme_file_uri( 'build/editor.css' ),
		[],
		$asset_file['version']
	);
}
add_action( 'enqueue_block_editor_assets', 'it_mogul_enqueue_block_editor_assets' );

/**
 * Enqueue block assets for both editor and frontend.
 */
function it_mogul_enqueue_block_assets(): void {
	$asset_file_path = get_theme_file_path( 'build/frontend.asset.php' );

	if ( is_readable( $asset_file_path ) ) {
		// phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable
		$asset_file = include $asset_file_path;
	} else {
		$asset_file = [
			'dependencies' => [],
			'version'      => false,
		];
	}

	wp_enqueue_style(
		'it-mogul-frontend',
		get_theme_file_uri( 'build/frontend.css' ),
		[],
		$asset_file['version']
	);
}
add_action( 'enqueue_block_assets', 'it_mogul_enqueue_block_assets' );

/**
 * Register navigation menus.
 */
function it_mogul_register_menus(): void {
	register_nav_menus(
		[
			'primary' => __( 'Primary Menu', 'it-mogul' ),
			'footer'  => __( 'Footer Menu', 'it-mogul' ),
		]
	);
}
add_action( 'after_setup_theme', 'it_mogul_register_menus' );
