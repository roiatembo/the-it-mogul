<?php
/**
 * Title: Homepage Selected Work
 * Slug: it-mogul/home-work
 * Categories: it-mogul
 * Keywords: work, portfolio, projects
 * Block Types: core/post-content
 * Post Types: page
 *
 * @package it-mogul/patterns
 */

declare( strict_types=1 );
?>
<!-- wp:group {"tagName":"section","className":"it-mogul-section it-mogul-work","layout":{"type":"constrained"}} -->
<section class="wp-block-group it-mogul-section it-mogul-work" id="work">
    <!-- wp:group {"className":"it-mogul-section__inner it-mogul-work__inner","layout":{"type":"constrained"}} -->
    <div class="wp-block-group it-mogul-section__inner it-mogul-work__inner">
        <!-- wp:group {"className":"it-mogul-work__head","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap","verticalAlignment":"bottom"}} -->
        <div class="wp-block-group it-mogul-work__head">
            <!-- wp:group {"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"className":"it-mogul-eyebrow"} -->
                <p class="it-mogul-eyebrow">Selected work</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":2} -->
                <h2 class="wp-block-heading">Work that solves real problems.</h2>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->

            <!-- wp:paragraph {"className":"it-mogul-work__note"} -->
            <p class="it-mogul-work__note">Real projects, real outcomes — coming soon.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns {"className":"it-mogul-work__grid"} -->
        <div class="wp-block-columns it-mogul-work__grid">
            <!-- wp:column {"className":"it-mogul-work__item"} -->
            <div class="wp-block-column it-mogul-work__item">
                <!-- wp:group {"className":"it-mogul-work__preview","layout":{"type":"constrained"}} -->
                <div class="wp-block-group it-mogul-work__preview">
                    <!-- wp:paragraph {"className":"it-mogul-work__placeholder"} -->
                    <p class="it-mogul-work__placeholder">CONTENT REQUIRED — project preview</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"level":3,"fontSize":"h4"} -->
                <h3 class="wp-block-heading has-h4-font-size">CONTENT REQUIRED — project name</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>CONTENT REQUIRED — the problem, what was built, and the outcome.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"className":"it-mogul-work__item"} -->
            <div class="wp-block-column it-mogul-work__item">
                <!-- wp:group {"className":"it-mogul-work__preview","layout":{"type":"constrained"}} -->
                <div class="wp-block-group it-mogul-work__preview">
                    <!-- wp:paragraph {"className":"it-mogul-work__placeholder"} -->
                    <p class="it-mogul-work__placeholder">CONTENT REQUIRED — project preview</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:heading {"level":3,"fontSize":"h4"} -->
                <h3 class="wp-block-heading has-h4-font-size">CONTENT REQUIRED — project name</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>CONTENT REQUIRED — the problem, what was built, and the outcome.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

        <!-- wp:buttons {"className":"it-mogul-work__actions"} -->
        <div class="wp-block-buttons it-mogul-work__actions">
            <!-- wp:button {"className":"is-style-outline"} -->
            <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#work">See our work</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->
