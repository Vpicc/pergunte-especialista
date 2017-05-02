<?php
/**
 * The template for displaying the Testimonials archive page.
 *
 * @package Motif
 */

get_header(); ?>

	<?php $jetpack_options = get_theme_mod( 'jetpack_testimonials' ); ?>

	<div id="primary" class="content-area testimonials-content-area full-width">
		<main id="main" class="site-main" role="main">

			<article class="hentry">
				<header class="entry-header">
					<h1 class="entry-title">
						<?php
						if ( isset( $jetpack_options['page-title'] ) && '' != $jetpack_options['page-title'] )
							echo esc_html( $jetpack_options['page-title'] );
						else
							_e( 'Testimonials', 'motif' );
						?>
					</h1>
				</header><!-- .entry-header -->

				<?php if ( isset( $jetpack_options['featured-image'] ) && '' != $jetpack_options['featured-image'] ) : ?>
				<div class="entry-thumbnail">
					<?php echo wp_get_attachment_image( (int)$jetpack_options['featured-image'], 'motif-page-thumbnail' ); ?>
				</div><!-- .entry-thumbnail -->
				<?php endif; ?>

				<?php if ( isset( $jetpack_options['page-content'] ) && '' != $jetpack_options['page-content'] ) : ?>
				<div class="entry-content">
					<?php echo convert_chars( convert_smilies( wptexturize( stripslashes( wp_filter_post_kses( addslashes( $jetpack_options['page-content'] ) ) ) ) ) ); ?>
				</div><!-- .entry-content -->
				<?php endif; ?>
			</article><!-- .hentry -->

			<div id="testimonials" class="testimonials grid">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'testimonial' ); ?>
					<?php endwhile; ?>

					<?php motif_content_nav( 'nav-below' ); ?>
				<?php else : ?>
					<?php get_template_part( 'no-results', 'testimonial' ); ?>
				<?php endif; ?>
			</div><!-- .testimonials .grid -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
