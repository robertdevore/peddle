<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Peddle
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function peddle_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	
	if ( is_page_template( 'edd-store-front.php' ) ) :		
		$classes[] = 'edd-store-front';		
	elseif ( is_page_template( 'edd-page-template.php' ) ) :		
		$classes[] = 'edd-page-template';				
	endif;

	return $classes;
}
add_filter( 'body_class', 'peddle_body_classes' );
