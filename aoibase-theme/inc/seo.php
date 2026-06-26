<?php
/**
 * AOi Base SEO Module
 *
 * Adds SEO meta tags, Open Graph, Twitter Cards, canonical URLs,
 * JSON-LD structured data, and preconnect hints via wp_head hooks.
 *
 * @package AOIbase
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -----------------------------------------------------------------------
// Helper: Check if Yoast SEO is active
// -----------------------------------------------------------------------

/**
 * Returns true when Yoast SEO is active to avoid duplicate meta output.
 *
 * @return bool
 */
function aoibase_is_yoast_active() {
	return class_exists( 'WPSEO_Options' ) || defined( 'WPSEO_VERSION' );
}

// -----------------------------------------------------------------------
// 1. Google Search Console Verification (priority 1)
// -----------------------------------------------------------------------

function aoibase_gsc_verification() {
	$code = get_theme_mod( 'seo_gsc_verification', '' );
	if ( $code ) {
		echo '<meta name="google-site-verification" content="' . esc_attr( $code ) . '" />' . "\n";
	}
}
add_action( 'wp_head', 'aoibase_gsc_verification', 1 );

// -----------------------------------------------------------------------
// 2. Preconnect Hints (priority 1)
// -----------------------------------------------------------------------

function aoibase_preconnect_hints() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com" />' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />' . "\n";
}
add_action( 'wp_head', 'aoibase_preconnect_hints', 1 );

// -----------------------------------------------------------------------
// 2b. Preload Hero Image (priority 1, front page only)
// -----------------------------------------------------------------------

function aoibase_preload_hero_image() {
	if ( ! is_front_page() ) {
		return;
	}

	$theme_uri = get_template_directory_uri();
	$pc_img    = $theme_uri . '/assets/images/hero-main-pc.webp';
	$sp_img    = $theme_uri . '/assets/images/hero-main-sp.webp';

	echo '<link rel="preload" as="image" type="image/webp" href="' . esc_url( $pc_img ) . '" media="(min-width: 1024px)" />' . "\n";
	echo '<link rel="preload" as="image" type="image/webp" href="' . esc_url( $sp_img ) . '" media="(max-width: 1023px)" />' . "\n";
}
add_action( 'wp_head', 'aoibase_preload_hero_image', 1 );

// -----------------------------------------------------------------------
// Helper: Build OGP / Twitter data array for current page
// -----------------------------------------------------------------------

/**
 * Returns an associative array of OGP values for the current page context.
 *
 * @return array{type:string,title:string,description:string,url:string,image:string}
 */
function aoibase_get_ogp_data() {
	$theme_uri   = get_template_directory_uri();
	$site_name   = '株式会社AOi Base';
	$default_img = $theme_uri . '/assets/images/hero-main.png';

	// Defaults.
	$data = array(
		'type'        => 'website',
		'title'       => get_bloginfo( 'name' ),
		'description' => get_bloginfo( 'description' ),
		'url'         => home_url( '/' ),
		'image'       => $default_img,
	);

	if ( is_front_page() ) {
		$data['type']        = 'website';
		$data['title']       = 'AOi Base｜Web・アプリ・システム開発';
		$data['description'] = get_theme_mod(
			'seo_og_default_description',
			'AOi Baseは香川県高松市を拠点に、Web・アプリ・システム開発を手がける会社です。'
		);
		$data['url']   = home_url( '/' );
		$data['image'] = $default_img;

	} elseif ( is_singular( 'achievement' ) ) {
		$data['type']  = 'article';
		$data['title'] = get_the_title() . '｜事例｜' . $site_name;

		$excerpt = get_the_excerpt();
		if ( ! $excerpt ) {
			$excerpt = get_post_meta( get_the_ID(), '_achievement_summary', true );
		}
		$data['description'] = $excerpt ? $excerpt : $data['description'];
		$data['url']         = get_permalink();

		if ( has_post_thumbnail() ) {
			$data['image'] = get_the_post_thumbnail_url( get_the_ID(), 'large' );
		}

	} elseif ( is_singular() ) {
		$data['type']  = 'website';
		$data['title'] = get_the_title() . '｜' . $site_name;

		$meta_desc = get_post_meta( get_the_ID(), '_meta_description', true );
		$excerpt   = get_the_excerpt();
		if ( $meta_desc ) {
			$data['description'] = $meta_desc;
		} elseif ( $excerpt ) {
			$data['description'] = $excerpt;
		}
		$data['url'] = get_permalink();

		if ( has_post_thumbnail() ) {
			$data['image'] = get_the_post_thumbnail_url( get_the_ID(), 'large' );
		}

	} elseif ( is_post_type_archive( 'achievement' ) ) {
		$data['type']        = 'website';
		$data['title']       = '事例｜' . $site_name;
		$data['description'] = 'AOi Baseが手がけたプロジェクト';
		$data['url']         = get_post_type_archive_link( 'achievement' );
	}

	return $data;
}

// -----------------------------------------------------------------------
// 3. Open Graph Meta Tags (priority 2)
// -----------------------------------------------------------------------

function aoibase_ogp_meta_tags() {
	if ( aoibase_is_yoast_active() ) {
		return;
	}

	$data = aoibase_get_ogp_data();

	echo '<meta property="og:site_name" content="' . esc_attr( '株式会社AOi Base' ) . '" />' . "\n";
	echo '<meta property="og:locale" content="ja_JP" />' . "\n";
	echo '<meta property="og:type" content="' . esc_attr( $data['type'] ) . '" />' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $data['title'] ) . '" />' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $data['description'] ) . '" />' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $data['url'] ) . '" />' . "\n";
	echo '<meta property="og:image" content="' . esc_url( $data['image'] ) . '" />' . "\n";
}
add_action( 'wp_head', 'aoibase_ogp_meta_tags', 2 );

// -----------------------------------------------------------------------
// 4. Twitter Card Meta Tags (priority 3)
// -----------------------------------------------------------------------

function aoibase_twitter_card_meta_tags() {
	if ( aoibase_is_yoast_active() ) {
		return;
	}

	$data = aoibase_get_ogp_data();

	echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
	echo '<meta name="twitter:title" content="' . esc_attr( $data['title'] ) . '" />' . "\n";
	echo '<meta name="twitter:description" content="' . esc_attr( $data['description'] ) . '" />' . "\n";
	echo '<meta name="twitter:image" content="' . esc_url( $data['image'] ) . '" />' . "\n";
}
add_action( 'wp_head', 'aoibase_twitter_card_meta_tags', 3 );

// -----------------------------------------------------------------------
// 5. Canonical URL (priority 4)
// -----------------------------------------------------------------------

function aoibase_canonical_url() {
	if ( aoibase_is_yoast_active() ) {
		return;
	}

	$canonical = '';

	if ( is_front_page() ) {
		$canonical = home_url( '/' );
	} elseif ( is_singular() ) {
		$canonical = get_permalink();
	} elseif ( is_post_type_archive( 'achievement' ) ) {
		$canonical = get_post_type_archive_link( 'achievement' );
	} elseif ( is_home() ) {
		$blog_page_id = get_option( 'page_for_posts' );
		$canonical    = $blog_page_id ? get_permalink( $blog_page_id ) : home_url( '/' );
	}

	if ( $canonical ) {
		echo '<link rel="canonical" href="' . esc_url( $canonical ) . '" />' . "\n";
	}
}
add_action( 'wp_head', 'aoibase_canonical_url', 4 );

// -----------------------------------------------------------------------
// 6. Organization JSON-LD (priority 5, front page only)
// -----------------------------------------------------------------------

function aoibase_jsonld_organization() {
	if ( ! is_front_page() || aoibase_is_yoast_active() ) {
		return;
	}

	$theme_uri = get_template_directory_uri();

	$address  = get_theme_mod( 'company_address', '香川県高松市川部町240番地4' );
	$building = get_theme_mod( 'company_building', 'アースA203' );
	$zip_raw  = get_theme_mod( 'company_zip', '〒761-8046' );
	$postal   = ltrim( $zip_raw, '〒' );

	$schema = array(
		'@context'      => 'https://schema.org',
		'@type'         => 'Organization',
		'name'          => get_theme_mod( 'company_name', '株式会社AOi Base' ),
		'alternateName' => 'AOi Base',
		'url'           => home_url( '/' ),
		'logo'          => $theme_uri . '/assets/images/logo-aoi.png',
		'address'       => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => $address . ' ' . $building,
			'addressLocality' => '高松市',
			'addressRegion'   => '香川県',
			'postalCode'      => $postal,
			'addressCountry'  => 'JP',
		),
		'email'         => get_theme_mod( 'company_email', 'info@aoibase.jp' ),
		'sameAs'        => array(),
	);

	$json = wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

	echo '<script type="application/ld+json">' . "\n";
	echo $json . "\n";
	echo '</script>' . "\n";
}
add_action( 'wp_head', 'aoibase_jsonld_organization', 5 );

// -----------------------------------------------------------------------
// 7. Service JSON-LD (priority 6, front page only)
// -----------------------------------------------------------------------

function aoibase_jsonld_service() {
	if ( ! is_front_page() ) {
		return;
	}

	$schema = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'ProfessionalService',
		'name'        => get_theme_mod( 'company_name', '株式会社AOi Base' ),
		'url'         => home_url( '/' ),
		'description' => 'AOi Baseは香川県高松市を拠点に、Webサイト・業務アプリ・システム開発を手がける会社です。',
		'areaServed'  => array(
			'@type' => 'Country',
			'name'  => 'JP',
		),
		'hasOfferCatalog' => array(
			'@type'           => 'OfferCatalog',
			'name'            => '開発サービス',
			'itemListElement' => array(
				array(
					'@type' => 'Offer',
					'itemOffered' => array(
						'@type'       => 'Service',
						'name'        => 'Webサイト制作',
						'description' => 'コーポレートサイト・LP・ECサイトの企画・デザイン・開発',
					),
				),
				array(
					'@type' => 'Offer',
					'itemOffered' => array(
						'@type'       => 'Service',
						'name'        => '業務アプリ開発',
						'description' => 'LINE Bot・業務自動化・社内ツールなどのアプリケーション開発',
					),
				),
				array(
					'@type' => 'Offer',
					'itemOffered' => array(
						'@type'       => 'Service',
						'name'        => 'システム開発',
						'description' => 'API連携・データベース設計・クラウドインフラ構築',
					),
				),
			),
		),
	);

	$json = wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

	echo '<script type="application/ld+json">' . "\n";
	echo $json . "\n";
	echo '</script>' . "\n";
}
add_action( 'wp_head', 'aoibase_jsonld_service', 6 );

// -----------------------------------------------------------------------
// 8. Document Title Filter (priority 10)
// -----------------------------------------------------------------------

/**
 * Customize document_title_parts for specific pages.
 *
 * @param array $title_parts The document title parts.
 * @return array
 */
function aoibase_document_title_parts( $title_parts ) {
	if ( aoibase_is_yoast_active() ) {
		return $title_parts;
	}

	if ( is_front_page() ) {
		$title_parts['title'] = 'AOi Base｜Web・アプリ・システム開発';
		// Remove site name separator for front page.
		unset( $title_parts['site'] );
		unset( $title_parts['tagline'] );
	} elseif ( is_post_type_archive( 'achievement' ) ) {
		$title_parts['title'] = '事例';
		$title_parts['site']  = '株式会社AOi Base';
	}

	return $title_parts;
}
add_filter( 'document_title_parts', 'aoibase_document_title_parts', 10 );
