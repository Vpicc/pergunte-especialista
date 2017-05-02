<?php
/**
 * The sidebar containing the footer page widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package Motif
 */

if ( ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) && ! is_active_sidebar( 'sidebar-4' ) )
	return;
?>

<div id="tertiary" class="widget-area footer-widget-area" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<div class="first footer-widgets">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- .first -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div class="second footer-widgets">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div><!-- .second -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div class="third footer-widgets">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div><!-- .third -->
	<?php endif; ?>
</div><!-- #tertiary -->
