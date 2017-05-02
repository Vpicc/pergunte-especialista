<?php
/**
 * annina functions and definitions
 *
 * @package annina
 */

if ( ! function_exists( 'annina_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function annina_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on annina, use a find and replace
	 * to change 'annina' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'annina', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'annina-normal-post' , 950, 9999);
	add_image_size( 'annina-masonry-post' , 450, 9999);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'annina' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		 'video', 'audio', 'quote', 'link'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'annina_custom_background_args', array(
		'default-color' => 'f0f0f0',
		'default-image' => '',
	) ) );
}
endif; // annina_setup
add_action( 'after_setup_theme', 'annina_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function annina_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'annina_content_width', 900 );
}
add_action( 'after_setup_theme', 'annina_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function annina_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'annina' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="content-annina widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'annina_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function annina_scripts() {
	wp_enqueue_style( 'annina-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css');
	$query_args = array(
		'family' => 'Lato:300,400,700'
	);
	wp_register_style( 'annina-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'annina-googlefonts' );

	wp_enqueue_script( 'annina-custom', get_template_directory_uri() . '/js/jquery.annina.js', array('jquery', 'jquery-masonry'), '1.0', true );
	wp_enqueue_script( 'annina-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'annina-smoothScroll', get_template_directory_uri() . '/js/SmoothScroll.min.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'annina-html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.3', false );
	wp_script_add_data( 'annina-html5shiv', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'annina_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Annina Dynamic.
 */
require get_template_directory() . '/inc/annina-dynamic.php';

/* Calling in the admin area for the Welcome Page */
if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/annina-admin-page.php';
}

/**
 * Load PRO Button in the customizer
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/pro-button/class-customize.php' );