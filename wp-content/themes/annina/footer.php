<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package annina
 */
?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info content-annina-title annDouble smallPart">
			<div class="text-copy">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'annina' ) ); ?>">
			<?php
			/* translators: %s: WordPress name */
			printf( esc_html__( 'Proudly powered by %s', 'annina' ), 'WordPress' );
			?>
			</a>
			<span class="sep"> | </span>			
			<?php
			/* translators: 1: theme name, 2: theme developer */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'annina' ), '<a target="_blank" href="https://crestaproject.com/downloads/annina/" rel="nofollow" title="Annina Theme">Annina Free</a>', 'CrestaProject WordPress Themes' );
			?>
			</div>
			<div id="toTop"><i class="fa fa-angle-up fa-lg"></i></div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
</div><!-- #content -->
<?php wp_footer(); ?>

</body>
</html>
