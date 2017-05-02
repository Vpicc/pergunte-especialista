<?php
/**
 * The template used for displaying testimonials.
 *
 * @package Motif
 */
?>
<?php
	$additional_class = 'without-featured-image';
	if ( '' != get_the_post_thumbnail() )
		$additional_class = 'with-featured-image';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $additional_class ); ?>>
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="testimonial-thumbnail">
			<?php the_post_thumbnail( 'motif-testimonial-thumbnail' ); ?>
		</div>
		<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<header class="entry-header">

		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<?php edit_post_link( __( 'Edit', 'motif' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
