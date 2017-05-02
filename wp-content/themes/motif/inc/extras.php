<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * @package Motif
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function motif_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'motif_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function motif_body_classes( $classes ) {
	if ( ! is_multi_author() ) {
		$classes[] = 'not-multi-author';
	}

	if ( display_header_text() ) {
		$classes[] = 'display-header-text';
	}

	return $classes;
}
add_filter( 'body_class', 'motif_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function motif_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'motif_enhanced_image_navigation', 10, 2 );

/**
 * Disables the sharing buttons on cases where it's not needed.
 */
function motif_sharing_show( $show ) {
	if ( ! is_singular( 'jetpack-testimonial' ) && 'jetpack-testimonial' === get_post_type() ) {
		$show = false;
	}
	return $show;
}
add_filter( 'sharing_show', 'motif_sharing_show', 99 );