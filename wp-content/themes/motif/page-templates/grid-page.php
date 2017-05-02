<?php
/**
 * Template Name: Grid Page
 *
 * @package Motif
 */

get_header(); ?>

	<div id="primary" class="content-area grid-page-content-area full-width">
		<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

			<div class="child-pages grid">
				<div class="grid-row">
				<?php
					$child_pages = new WP_Query( array(
						'post_type'      => 'page',
						'orderby'        => 'menu_order',
						'order'          => 'ASC',
						'post_parent'    => $post->ID,
						'posts_per_page' => 999,
						'no_found_rows'  => true,
					) );

					$nr = 0;
					while ( $child_pages->have_posts() ) : $child_pages->the_post();
						echo ( 0 == $nr % 3 ) ? '</div><!-- .grid-row --><div class="grid-row">' : '';
						$nr++;
						get_template_part( 'content', 'grid' );
					endwhile;
					wp_reset_postdata();
				?>
				</div><!-- .grid-row -->
			</div><!-- .child-pages .grid -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
