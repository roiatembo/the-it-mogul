<?php
/**
 * Title: Homepage Final CTA
 * Slug: it-mogul/home-final-cta
 * Categories: it-mogul
 * Keywords: call to action, contact, start a project
 * Block Types: core/post-content
 * Post Types: page
 *
 * @package it-mogul/patterns
 */

declare( strict_types=1 );
?>
<!-- wp:group {"tagName":"section","className":"it-mogul-section it-mogul-section--accent it-mogul-final-cta","layout":{"type":"constrained"}} -->
<section class="wp-block-group it-mogul-section it-mogul-section--accent it-mogul-final-cta" id="contact">
    <!-- wp:group {"className":"it-mogul-section__inner it-mogul-final-cta__inner","layout":{"type":"constrained"}} -->
    <div class="wp-block-group it-mogul-section__inner it-mogul-final-cta__inner">
        <!-- wp:heading {"level":2,"className":"it-mogul-final-cta__title"} -->
        <h2 class="wp-block-heading it-mogul-final-cta__title">Have a project in mind?</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":"it-mogul-final-cta__lede","fontSize":"body-large"} -->
        <p class="it-mogul-final-cta__lede has-body-large-font-size">Tell us what you're trying to build, fix or improve. We'll get back to you with a clear, practical next step.</p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"className":"it-mogul-final-cta__actions"} -->
        <div class="wp-block-buttons it-mogul-final-cta__actions">
            <!-- wp:button {"className":"is-style-fill"} -->
            <div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="#contact">Start a project</a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-outline"} -->
            <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#contact">Contact us</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->
