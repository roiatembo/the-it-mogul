<?php
/**
 * Callout block render callback.
 *
 * @package ItMogul
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block default content.
 * @var WP_Block $block      Block instance.
 */

declare( strict_types=1 );

$wrapper_attributes = get_block_wrapper_attributes(
	[
		'class' => 'it-mogul-callout',
	]
);
?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php if ( ! empty( $attributes['title'] ) ) : ?>
		<h3 class="it-mogul-callout__title"><?php echo esc_html( $attributes['title'] ); ?></h3>
	<?php endif; ?>
	<div class="it-mogul-callout__content">
		<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>
</div>
