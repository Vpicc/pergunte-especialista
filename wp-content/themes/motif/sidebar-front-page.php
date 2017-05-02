<?php
/**
 * The sidebar containing the front page widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package Motif
 */

if ( ! is_active_sidebar( 'sidebar-5' ) && ! is_active_sidebar( 'sidebar-6' ) )
	return;
?>

<div id="secondary" class="widget-area front-widget-area" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
	<div class="first front-widgets">
		<?php dynamic_sidebar( 'sidebar-5' ); ?>
	</div><!-- .first -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
	<div class="second front-widgets">
		<?php dynamic_sidebar( 'sidebar-6' ); ?>
	</div><!-- .second -->
	<?php endif; ?>
</div><!-- #secondary -->
