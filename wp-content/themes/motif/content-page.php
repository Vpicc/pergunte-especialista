<?php
/**
 * The template used for displaying page content.
 *
 * @package Motif
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<?php if ( '' != get_the_post_thumbnail() ) : ?>
	<div class="entry-thumbnail">
		<?php
			if ( is_page_template( 'page-templates/full-width-page.php' ) || is_page_template( 'page-templates/grid-page.php' ) ) :
				the_post_thumbnail( 'motif-page-thumbnail' );
			else :
				the_post_thumbnail();
			endif;
		?>
	</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'motif' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'motif' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
