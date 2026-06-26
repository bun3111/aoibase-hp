<?php
/**
 * AOIbase Theme functions and definitions
 *
 * @package AOIbase
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -----------------------------------------------------------------------
// Theme Setup
// -----------------------------------------------------------------------

function aoibase_theme_setup() {
	// Enable <title> tag management by WordPress
	add_theme_support( 'title-tag' );

	// Enable featured images
	add_theme_support( 'post-thumbnails' );

	// Enable HTML5 markup for core features
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Register navigation menus
	register_nav_menus(
		array(
			'primary' => __( 'メインナビゲーション', 'aoibase' ),
		)
	);
}
add_action( 'after_setup_theme', 'aoibase_theme_setup' );

// -----------------------------------------------------------------------
// Enqueue Scripts and Styles
// -----------------------------------------------------------------------

function aoibase_enqueue_assets() {
	// Tailwind CSS CDN
	wp_enqueue_script(
		'tailwindcss',
		'https://cdn.tailwindcss.com',
		array(),
		null,
		false // load in <head>
	);

	// Google Fonts: Poppins + Noto Sans JP
	wp_enqueue_style(
		'aoibase-google-fonts',
		'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Noto+Sans+JP:wght@400;500;700&display=swap',
		array(),
		null
	);

	// Custom JS (defer, in footer)
	wp_enqueue_script(
		'aoibase-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'aoibase_enqueue_assets' );

// -----------------------------------------------------------------------
// Restrict Contact Form 7 assets to contact page only
// -----------------------------------------------------------------------

function aoibase_dequeue_cf7_assets() {
	if ( ! is_page( 'contact' ) ) {
		wp_dequeue_style( 'contact-form-7' );
		wp_dequeue_script( 'contact-form-7' );
	}
}
add_action( 'wp_enqueue_scripts', 'aoibase_dequeue_cf7_assets', 20 );

// -----------------------------------------------------------------------
// Disable WordPress Emoji Scripts
// -----------------------------------------------------------------------

function aoibase_disable_emojis() {
	remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles',     'print_emoji_styles' );
	remove_action( 'admin_print_styles',  'print_emoji_styles' );
	remove_filter( 'the_content_feed',    'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss',    'wp_staticize_emoji' );
	remove_filter( 'wp_mail',             'wp_staticize_emoji_for_email' );

	// Remove emoji from TinyMCE
	add_filter( 'tiny_mce_plugins', 'aoibase_disable_emojis_tinymce' );

	// Remove emoji DNS prefetch
	add_filter( 'wp_resource_hints', 'aoibase_disable_emojis_dns_prefetch', 10, 2 );
}
add_action( 'init', 'aoibase_disable_emojis' );

function aoibase_disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	}
	return array();
}

function aoibase_disable_emojis_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
		$urls          = array_diff( $urls, array( $emoji_svg_url ) );
	}
	return $urls;
}

// -----------------------------------------------------------------------
// Remove Unnecessary wp_head Items
// -----------------------------------------------------------------------

function aoibase_clean_wp_head() {
	// Remove WordPress version meta tag
	remove_action( 'wp_head', 'wp_generator' );

	// Remove Really Simple Discovery link
	remove_action( 'wp_head', 'rsd_link' );

	// Remove Windows Live Writer manifest link
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Remove post/comment feed links
	remove_action( 'wp_head', 'feed_links',       2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
}
add_action( 'init', 'aoibase_clean_wp_head' );

// -----------------------------------------------------------------------
// Site Icon (Favicon)
// -----------------------------------------------------------------------

function aoibase_site_icon() {
	$theme_uri = get_template_directory_uri();
	$png_url   = $theme_uri . '/assets/images/favicon.png';
	$ico_url   = $theme_uri . '/assets/images/favicon.ico';

	echo '<link rel="icon" type="image/x-icon" href="' . esc_url( $ico_url ) . '" />' . "\n";
	echo '<link rel="icon" type="image/png" href="' . esc_url( $png_url ) . '" sizes="any" />' . "\n";
	echo '<link rel="apple-touch-icon" href="' . esc_url( $png_url ) . '" />' . "\n";
}
add_action( 'wp_head', 'aoibase_site_icon', 5 );

// -----------------------------------------------------------------------
// Custom Post Types
// -----------------------------------------------------------------------

require_once get_template_directory() . '/inc/cpt-achievement.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/seo.php';

// -----------------------------------------------------------------------
// Achievement Archive Query Modification
// -----------------------------------------------------------------------

function aoibase_modify_achievement_archive( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	if ( $query->is_post_type_archive( 'achievement' ) ) {
		$query->set( 'posts_per_page', 12 );
	}
}
add_action( 'pre_get_posts', 'aoibase_modify_achievement_archive' );
