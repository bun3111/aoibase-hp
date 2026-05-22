<?php
/**
 * Single achievement — redirects to portfolio page.
 */
$portfolio_parent = get_page_by_path( 'portfolio' );
$redirect_url     = home_url( '/portfolio/' );

if ( $portfolio_parent ) {
	$children = get_pages( array( 'child_of' => $portfolio_parent->ID, 'post_status' => 'publish' ) );
	foreach ( $children as $child ) {
		if ( $child->post_title === get_the_title() ) {
			$redirect_url = get_permalink( $child->ID );
			break;
		}
	}
}

wp_safe_redirect( $redirect_url, 301 );
exit;
