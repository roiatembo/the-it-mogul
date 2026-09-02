<?php
/**
 * Title: Homepage Founder / About
 * Slug: it-mogul/home-founder
 * Categories: it-mogul
 * Keywords: founder, about, roia
 * Block Types: core/post-content
 * Post Types: page
 *
 * @package it-mogul/patterns
 */

declare( strict_types=1 );
?>
<!-- wp:group {"tagName":"section","className":"it-mogul-section it-mogul-founder","layout":{"type":"constrained"}} -->
<section class="wp-block-group it-mogul-section it-mogul-founder">
    <!-- wp:group {"className":"it-mogul-section__inner it-mogul-founder__inner","layout":{"type":"constrained"}} -->
    <div class="wp-block-group it-mogul-section__inner it-mogul-founder__inner">
        <!-- wp:columns {"className":"it-mogul-founder__grid"} -->
        <div class="wp-block-columns it-mogul-founder__grid">
            <!-- wp:column {"className":"it-mogul-founder__portrait"} -->
            <div class="wp-block-column it-mogul-founder__portrait">
                <!-- wp:group {"className":"it-mogul-founder__photo","layout":{"type":"constrained"}} -->
                <div class="wp-block-group it-mogul-founder__photo">
                    <!-- wp:paragraph {"className":"it-mogul-founder__placeholder"} -->
                    <p class="it-mogul-founder__placeholder">CONTENT REQUIRED — founder photograph</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":"it-mogul-founder__bio"} -->
            <div class="wp-block-column it-mogul-founder__bio">
                <!-- wp:paragraph {"className":"it-mogul-eyebrow"} -->
                <p class="it-mogul-eyebrow">About The IT Mogul</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":2} -->
                <h2 class="wp-block-heading">A real person behind the company.</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>The IT Mogul is run by Roia — a developer who learned by building, solving real problems and developing engineering skills through practical work.</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph -->
                <p>CONTENT REQUIRED — founder biography</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"className":"it-mogul-founder__actions"} -->
                <div class="wp-block-buttons it-mogul-founder__actions">
                    <!-- wp:button {"className":"is-style-outline"} -->
                    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#about">About The IT Mogul</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->
