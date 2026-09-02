<?php
/**
 * Title: Homepage Hero
 * Slug: it-mogul/home-hero
 * Categories: it-mogul
 * Keywords: hero, homepage, headline
 * Block Types: core/post-content
 * Post Types: page
 *
 * @package it-mogul/patterns
 */

declare( strict_types=1 );
?>
<!-- wp:group {"tagName":"section","className":"it-mogul-hero","layout":{"type":"constrained"}} -->
<section class="wp-block-group it-mogul-hero">
    <!-- wp:group {"className":"it-mogul-hero__inner","layout":{"type":"constrained"}} -->
    <div class="wp-block-group it-mogul-hero__inner">
        <!-- wp:paragraph {"className":"it-mogul-eyebrow"} -->
        <p class="it-mogul-eyebrow">The IT Mogul — Web & Software Engineering</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"level":1,"className":"it-mogul-hero__title"} -->
        <h1 class="wp-block-heading it-mogul-hero__title">Websites. Software.<br>Systems that work.</h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":"it-mogul-hero__lede","fontSize":"body-large"} -->
        <p class="it-mogul-hero__lede has-body-large-font-size">We build, fix, improve and automate the digital systems behind your business — websites, online stores, WordPress, custom software and the processes that connect them.</p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"className":"it-mogul-hero__actions"} -->
        <div class="wp-block-buttons it-mogul-hero__actions">
            <!-- wp:button {"className":"is-style-fill"} -->
            <div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="#contact">Start a project</a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-outline"} -->
            <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#work">See our work</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->
