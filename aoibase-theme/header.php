<?php
/**
 * AOi Base Theme Header
 */

$nav_links = array(
    array( 'url' => '/',              'label' => 'TOP',        'active' => is_front_page() ),
    array( 'url' => '/news/',         'label' => 'NEWS',       'active' => is_page( 'news' ) || ( is_home() && ! is_front_page() ) ),
    array( 'url' => '/flow/',         'label' => '開発の流れ',  'active' => is_page( 'flow' ) ),
    array( 'url' => '/achievements/', 'label' => '事例',        'active' => is_post_type_archive( 'achievement' ) || is_singular( 'achievement' ) ),
    array( 'url' => '/company/',      'label' => '企業情報',    'active' => is_page( 'company' ) ),
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    html { scroll-behavior: smooth; }
    body { font-family: 'Noto Sans JP', 'Poppins', sans-serif; color: #0F172A; margin: 0; }
    #site-nav.scrolled { box-shadow: 0 2px 20px rgba(15,23,42,0.08); }
    .aoibase-fade-in { opacity: 0; transform: translateY(16px); transition: opacity 600ms cubic-bezier(0.22, 1, 0.36, 1), transform 600ms cubic-bezier(0.22, 1, 0.36, 1); }
    .aoibase-fade-in-visible { opacity: 1; transform: translateY(0); }
    @media (prefers-reduced-motion: reduce) { .aoibase-fade-in { opacity: 1; transform: none; transition: none; } }
    .skip-link { position: absolute; top: -40px; left: 0; background: #0369A1; color: #fff; padding: 8px 16px; z-index: 100; text-decoration: none; font-size: 14px; font-weight: 600; }
    .skip-link:focus { top: 0; }
  </style>
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-white' ); ?>>

<a href="#main-content" class="skip-link">本文へスキップ</a>

<!-- ===== NAV ===== -->
<header id="site-nav" class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-200" style="transition: box-shadow 200ms ease;">
  <div class="max-w-screen-xl mx-auto px-6 flex items-center justify-between h-12 md:h-20">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center cursor-pointer group" aria-label="AOi Base トップページ">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aoi.png" alt="AOi Base" class="h-5 md:h-12 w-auto" loading="eager" decoding="async">
    </a>
    <nav class="hidden lg:flex items-center gap-6 xl:gap-8">
      <?php foreach ( $nav_links as $link ) : ?>
        <?php if ( $link['active'] ) : ?>
          <a href="<?php echo esc_url( home_url( $link['url'] ) ); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0369A1] cursor-pointer" style="font-weight:600;" aria-current="page"><?php echo esc_html( $link['label'] ); ?></a>
        <?php else : ?>
          <a href="<?php echo esc_url( home_url( $link['url'] ) ); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;"><?php echo esc_html( $link['label'] ); ?></a>
        <?php endif; ?>
      <?php endforeach; ?>
    </nav>
    <div class="flex items-center gap-3">
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="hidden md:inline-flex items-center gap-2 bg-[#0369A1] hover:bg-[#1B2A4A] text-white text-xs font-['Poppins'] px-5 py-2.5 cursor-pointer transition-colors duration-200" style="font-weight:600; letter-spacing:0.1em;">お問い合わせ</a>
      <button id="nav-toggle" aria-label="メニューを開く" class="lg:hidden flex flex-col justify-center items-center w-10 h-10 gap-1.5 cursor-pointer">
        <span class="block w-6 h-0.5 bg-[#1B2A4A]"></span>
        <span class="block w-6 h-0.5 bg-[#1B2A4A]"></span>
        <span class="block w-6 h-0.5 bg-[#1B2A4A]"></span>
      </button>
    </div>
  </div>
  <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-100">
    <nav class="flex flex-col px-6 py-4 gap-0">
      <?php foreach ( $nav_links as $link ) : ?>
        <a href="<?php echo esc_url( home_url( $link['url'] ) ); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;"><?php echo esc_html( $link['label'] ); ?></a>
      <?php endforeach; ?>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="mt-4 inline-flex items-center justify-center gap-2 bg-[#0369A1] text-white text-xs font-['Poppins'] px-5 py-3 cursor-pointer" style="font-weight:600;">お問い合わせ</a>
    </nav>
  </div>
</header>

<div class="h-12 md:h-20"></div>

<main id="main-content">
