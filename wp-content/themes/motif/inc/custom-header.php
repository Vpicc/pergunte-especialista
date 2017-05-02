<?php
/**
 * Custom Header
 *
 * @package Motif
 */

/**
 * Set up the WordPress core custom header settings.
 */
function motif_custom_header_setup() {
	add_theme_support( 'custom-header', array(
		'default-text-color'     => '333',
		'width'                  => 320,
		'height'                 => 110,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'motif_header_style',
		'admin-head-callback'    => 'motif_admin_header_style',
		'admin-preview-callback' => 'motif_admin_header_image',
	) );
}
add_action( 'after_setup_theme', 'motif_custom_header_setup' );

if ( ! function_exists( 'motif_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 */
function motif_header_style() {
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();

	// Bail if the text is hidden or if no custom color is set
	if ( display_header_text() && $text_color === get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// Output the CSS for our custom styles
	?>
	<style type="text/css" id="motif-header-css">
		<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
		?>
			.site-title,
			.site-description {
				clip: rect(1px, 1px, 1px, 1px);
				position: absolute;
			}
		<?php
			// If the user has set a custom color for the text, use that.
			elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $text_color ); ?>;
			}
		<?php endif; ?>
	</style>
	<?php
}
endif; // motif_header_style


if ( ! function_exists( 'motif_admin_header_style' ) ) :
/**
 * Style the header image displayed on the Appearance > Header screen.
 */
function motif_admin_header_style() {
?>
	<style type="text/css" id="motif-admin-header-css">
		.appearance_page_custom-header #headimg {
			border: none;
			max-width: 1140px;
		}
		#headimg h1 {
			font-family: "Droid Serif", Georgia, serif;
			font-size: 34px;
			font-weight: bold;
			line-height: 1;
			margin-bottom: 10px;
		}
		#headimg h1 a {
			color: #333;
			text-decoration: none;
		}
		#headimg img {
			vertical-align: middle;
		}
	</style>
<?php
}
endif; // motif_admin_header_style

if ( ! function_exists( 'motif_admin_header_image' ) ) :
/**
 * Create the custom header image markup displayed on the Appearance > Header screen.
 *
 */
function motif_admin_header_image() {
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
		<h1 class="displaying-header-text"><a id="name"<?php echo sprintf( ' style="color:#%s;"', get_header_textcolor() ); ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	</div>
<?php
}
endif; // motif_admin_header_image
