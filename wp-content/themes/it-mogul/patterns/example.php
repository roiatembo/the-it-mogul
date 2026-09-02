<?php
/**
 * This is an example block pattern.
 *
 * Using the `Block Types` keyword, you can specify which blocks can accept
 * this pattern. For example, this example has a `core/post-content` block
 * type, which means it is presented as a pattern when adding a new post or
 * page.
 *
 * Title: Example
 * Slug: it-mogul/example
 * Categories: it-mogul
 * Keywords: example
 * Block Types: core/post-content
 * Post Types: post, page
 *
 * @package it-mogul/patterns
 */

declare( strict_types=1 );

?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Example Pattern</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This is an example block pattern. Replace this content with reusable patterns for The IT Mogul.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
