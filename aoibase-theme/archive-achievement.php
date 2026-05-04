<?php
/**
 * Template: 事例一覧（achievement カスタム投稿アーカイブ）
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    html { scroll-behavior: smooth; }
    body { font-family: 'Noto Sans JP', 'Poppins', sans-serif; color: #0F172A; margin: 0; }
    #site-nav.scrolled { box-shadow: 0 2px 20px rgba(15,23,42,0.08); }
    .pagination-link {
      display: inline-flex; align-items: center; justify-content: center;
      min-width: 40px; height: 40px; padding: 0 12px;
      border: 1px solid #CBD5E1; border-radius: 9999px;
      font-size: 13px; font-weight: 600; color: #475569;
      background: #fff; transition: all 0.2s; cursor: pointer;
      font-family: 'Poppins', sans-serif;
    }
    .pagination-link:hover { border-color: #0369A1; color: #0369A1; }
    .pagination-link.current { background: #0369A1; border-color: #0369A1; color: #fff; }
    .pagination-link.dots { border: none; background: transparent; cursor: default; }
    .aoibase-pagination .page-numbers {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 2.5rem;
      height: 2.5rem;
      padding: 0 0.875rem;
      border-radius: 9999px;
      background: #fff;
      color: #475569;
      border: 1px solid #CBD5E1;
      font-size: 0.875rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 200ms;
    }
    .aoibase-pagination .page-numbers:hover { border-color: #0369A1; color: #0369A1; }
    .aoibase-pagination .page-numbers.current { background: #0369A1; color: #fff; border-color: #0369A1; }
    .aoibase-pagination .page-numbers.dots { border: none; background: transparent; }
    .filter-pill {
      display: inline-flex; align-items: center; gap: 0.375rem;
      padding: 0.4rem 0.875rem; border-radius: 9999px;
      background: #fff; color: #475569;
      border: 1px solid #E2E8F0;
      font-size: 0.75rem; font-weight: 600;
      transition: all 200ms; text-decoration: none;
      font-family: 'Poppins', 'Noto Sans JP', sans-serif;
    }
    .filter-pill:hover { border-color: #0369A1; color: #0369A1; background: #F0F9FF; }
    .filter-pill .pill-count {
      font-size: 0.65rem; color: #94A3B8; font-weight: 500;
    }
    .filter-pill:hover .pill-count { color: #0369A1; }
    .pickup-card-shadow { box-shadow: 0 4px 24px rgba(15, 23, 42, 0.06); }
    .pickup-card-shadow:hover { box-shadow: 0 12px 40px rgba(3, 105, 161, 0.12); }
    .works-card { position: relative; }
    .works-card .stretched-link::after {
      content: '';
      position: absolute;
      inset: 0;
      z-index: 1;
    }
    .works-card .stretched-link { position: static; }

    /* === Mobile card adjustments === */
    @media (max-width: 640px) {
      /* Main works cards — match PC layout, just smaller */
      #works-grid .works-card .relative.h-52 { height: 8rem; }
      #works-grid .works-card .p-6 { padding: 0.75rem; }
      #works-grid .works-card .p-6 > span { font-size: 0.625rem; padding: 2px 0.5rem; margin-bottom: 0.375rem; }
      #works-grid .works-card .p-6 h3 { font-size: 0.8rem; margin-bottom: 0.25rem; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
      #works-grid .works-card .p-6 > p { font-size: 0.7rem; line-height: 1.5; margin-bottom: 0.375rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
      #works-grid .works-card .p-6 .mt-4 { margin-top: 0.375rem; padding-top: 0.375rem; }
      #works-grid .works-card .p-6 .mt-4 span { font-size: 0.65rem; }
    }
    .aoibase-fade-in { opacity: 0; transform: translateY(16px); transition: opacity 600ms cubic-bezier(0.22, 1, 0.36, 1), transform 600ms cubic-bezier(0.22, 1, 0.36, 1); }
    .aoibase-fade-in-visible { opacity: 1; transform: translateY(0); }
    @media (prefers-reduced-motion: reduce) { .aoibase-fade-in { opacity: 1; transform: none; transition: none; } }
  </style>
  <script type="application/ld+json">
<?php echo wp_json_encode( array(
  '@context' => 'https://schema.org',
  '@type'    => 'BreadcrumbList',
  'itemListElement' => array(
    array( '@type' => 'ListItem', 'position' => 1, 'name' => 'TOP', 'item' => home_url('/') ),
    array( '@type' => 'ListItem', 'position' => 2, 'name' => '事例', 'item' => get_post_type_archive_link('achievement') ),
  ),
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>
</script>
  <?php wp_head(); ?>
</head>
<body class="bg-white">
<a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 focus:z-[100] focus:px-4 focus:py-2 focus:bg-[#0369A1] focus:text-white focus:rounded">本文へスキップ</a>

<!-- ===== NAV ===== -->
<header id="site-nav" class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-200" style="transition: box-shadow 200ms ease;">
  <div class="max-w-screen-xl mx-auto px-6 flex items-center justify-between h-16 md:h-20">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="flex items-center cursor-pointer group" aria-label="AOi Base トップページ">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-aoi.png" alt="AOi Base" class="h-10 md:h-12 w-auto" loading="eager" decoding="async">
    </a>
    <nav class="hidden lg:flex items-center gap-6 xl:gap-8">
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">TOP</a>
      <a href="<?php echo esc_url( home_url('/news/') ); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">NEWS</a>
      <a href="<?php echo esc_url( home_url('/flow/') ); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">開発の流れ</a>
      <a href="<?php echo esc_url( home_url('/achievements/') ); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">事例</a>
      <a href="<?php echo esc_url( home_url('/company/') ); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">企業情報</a>
    </nav>
    <div class="flex items-center gap-3">
      <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="hidden md:inline-flex items-center gap-2 bg-[#0369A1] hover:bg-[#1B2A4A] text-white text-xs font-['Poppins'] px-5 py-2.5 cursor-pointer transition-colors duration-200" style="font-weight:600; letter-spacing:0.1em;">お問い合わせ</a>
      <button id="nav-toggle" aria-label="メニューを開く" class="lg:hidden flex flex-col justify-center items-center w-10 h-10 gap-1.5 cursor-pointer">
        <span class="block w-6 h-0.5 bg-[#1B2A4A]"></span>
        <span class="block w-6 h-0.5 bg-[#1B2A4A]"></span>
        <span class="block w-6 h-0.5 bg-[#1B2A4A]"></span>
      </button>
    </div>
  </div>
  <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-100">
    <nav class="flex flex-col px-6 py-4 gap-0">
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">TOP</a>
      <a href="<?php echo esc_url( home_url('/news/') ); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">NEWS</a>
      <a href="<?php echo esc_url( home_url('/flow/') ); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">開発の流れ</a>
      <a href="<?php echo esc_url( home_url('/achievements/') ); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">事例</a>
      <a href="<?php echo esc_url( home_url('/company/') ); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">企業情報</a>
      <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="mt-4 inline-flex items-center justify-center gap-2 bg-[#0369A1] text-white text-xs font-['Poppins'] px-5 py-3 cursor-pointer" style="font-weight:600;">お問い合わせ</a>
    </nav>
  </div>
</header>

<main id="main-content">

<!-- ===== PAGE HEADER ===== -->
<section class="relative pt-32 pb-16 bg-white border-b border-[#E2E8F0] overflow-hidden">
  <div class="absolute inset-x-0 top-20 pointer-events-none select-none text-center">
    <h2 class="text-[clamp(4rem,12vw,9rem)] font-extrabold leading-none tracking-tight text-[#1B2A4A] opacity-[0.04] font-['Poppins']">WORKS</h2>
  </div>
  <div class="relative max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">WORKS</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4">事例</h1>
    <p class="text-sm md:text-base text-[#64748B] leading-relaxed max-w-2xl">AOi Baseが手がけたプロジェクト</p>
    <nav aria-label="パンくずリスト" class="mt-6 text-xs text-[#94A3B8]">
      <ol class="inline-flex items-center gap-2 list-none p-0 m-0">
        <li><a href="<?php echo esc_url( home_url('/') ); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a></li>
        <li aria-hidden="true">›</li>
        <li><span aria-current="page" class="text-[#475569]">事例</span></li>
      </ol>
    </nav>
  </div>
</section>

<?php
$has_main_posts = have_posts();
?>

<?php if ( $has_main_posts ) : ?>
<!-- ===== MAIN GRID ===== -->
<section class="py-16 md:py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6">

    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-6" id="works-grid">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $pid             = get_the_ID();
        $post_terms      = get_the_terms( $pid, 'achievement_category' );
        $primary_term    = ( ! is_wp_error( $post_terms ) && ! empty( $post_terms ) ) ? $post_terms[0] : null;
        $category_slug   = $primary_term ? $primary_term->slug : 'uncategorized';
        $category_name   = $primary_term ? $primary_term->name : 'Achievement';

        $industry_terms  = get_the_terms( $pid, 'achievement_industry' );
        $primary_ind     = ( ! is_wp_error( $industry_terms ) && ! empty( $industry_terms ) ) ? $industry_terms[0] : null;
        $industry_slug   = $primary_ind ? $primary_ind->slug : '';
        $industry_name   = $primary_ind ? $primary_ind->name : '';

        $summary_meta    = get_post_meta( $pid, '_aoibase_summary', true );
        $outcome_metric  = get_post_meta( $pid, '_aoibase_outcome_metric', true );
        ?>
        <article
          data-category="<?php echo esc_attr( $category_slug ); ?>"
          data-industry="<?php echo esc_attr( $industry_slug ); ?>"
          class="works-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-[#E2E8F0] transition-all duration-200 cursor-pointer flex flex-col">
          <div class="block">
            <div class="relative h-52 overflow-hidden <?php echo has_post_thumbnail() ? '' : 'bg-gradient-to-br from-[#0369A1] to-[#1B2A4A] flex items-center justify-center'; ?>">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-105', 'loading' => 'lazy' ) ); ?>
              <?php else : ?>
                <svg aria-hidden="true" focusable="false" class="w-16 h-16 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7"/></svg>
              <?php endif; ?>
              <div class="absolute bottom-0 left-0 right-0 h-1 bg-[#CA8A04] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200 origin-left"></div>
            </div>
          </div>
          <div class="p-6 flex-1 flex flex-col">
            <span class="inline-block self-start px-3 py-1 text-xs font-semibold text-[#0369A1] bg-[#EFF6FF] rounded-full font-['Poppins'] mb-3"><?php echo esc_html( $category_name ); ?></span>
            <h3 class="text-base font-bold text-[#1B2A4A] mb-2 group-hover:text-[#0369A1] transition-colors duration-200 leading-snug">
              <a href="<?php the_permalink(); ?>" class="stretched-link hover:text-[#0369A1] transition-colors duration-200"><?php the_title(); ?></a>
            </h3>
            <p class="text-sm text-[#475569] leading-relaxed mb-4 line-clamp-2">
              <?php
              if ( ! empty( $summary_meta ) ) {
                  echo esc_html( $summary_meta );
              } else {
                  echo esc_html( get_the_excerpt() );
              }
              ?>
            </p>

            <?php if ( ! empty( $outcome_metric ) ) : ?>
              <div class="mt-4 pt-3 border-t border-[#F1F5F9] flex items-center gap-1 text-[#CA8A04]">
                <svg aria-hidden="true" focusable="false" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                <span class="text-xs font-bold font-['Poppins']">&#10022; <?php echo esc_html( $outcome_metric ); ?></span>
              </div>
            <?php endif; ?>
          </div>
        </article>
      <?php endwhile; ?>
    </div>

    <!-- ===== PAGINATION ===== -->
    <?php
    global $wp_query;
    $pagination_html = paginate_links( array(
      'total'     => $wp_query->max_num_pages,
      'mid_size'  => 1,
      'end_size'  => 1,
      'prev_text' => '&larr; 前へ',
      'next_text' => '次へ &rarr;',
      'type'      => 'plain',
    ) );
    ?>
    <?php if ( $wp_query->max_num_pages > 1 && $pagination_html ) : ?>
      <nav class="aoibase-pagination flex flex-wrap justify-center items-center gap-2 mt-12" aria-label="ページネーション">
        <?php echo wp_kses_post( $pagination_html ); ?>
      </nav>
    <?php endif; ?>

  </div>
</section>

<?php else : ?>
<!-- ===== EMPTY STATE ===== -->
<section class="py-20 bg-[#F8FAFC]">
  <div class="max-w-7xl mx-auto px-6">
    <div class="bg-white rounded-2xl shadow-sm border border-[#E2E8F0] p-12 md:p-16 text-center max-w-2xl mx-auto">
      <div class="w-16 h-16 mx-auto mb-6 rounded-full bg-[#EFF6FF] flex items-center justify-center">
        <svg aria-hidden="true" focusable="false" class="w-8 h-8 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
      </div>
      <h2 class="text-xl font-bold text-[#1B2A4A] mb-3">現在実績情報を準備中です</h2>
      <p class="text-sm text-[#64748B] leading-relaxed mb-8">公開まで今しばらくお待ちください。<br>開発のご相談・お見積りは随時受け付けています。</p>
      <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#B45309] hover:bg-[#D97706] text-white text-sm font-bold rounded-full transition-all duration-200 cursor-pointer shadow-lg hover:shadow-xl hover:-translate-y-0.5">
        <svg aria-hidden="true" focusable="false" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.953 9.953 0 01-4.814-1.229L3 20l1.229-4.186A8.955 8.955 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        お問い合わせはこちら
      </a>
    </div>
  </div>
</section>
<?php endif; ?>


</main>

<!-- ===== BOTTOM CTA BAR ===== -->
<div class="flex flex-wrap">
  <a href="<?php echo esc_url( home_url('/company/') ); ?>" class="group flex flex-1 min-w-0 items-center justify-between px-4 sm:px-8 py-5 sm:py-7 bg-[#0F172A] hover:bg-[#0369A1] transition-all duration-200 cursor-pointer border-r border-white/10">
    <div><p class="text-[9px] sm:text-xs font-bold tracking-[0.25em] text-white/50 group-hover:text-white/70 font-['Poppins']">COMPANY</p><p class="text-xs sm:text-lg font-bold text-white">会社概要</p></div>
    <svg class="w-5 h-5 sm:w-7 sm:h-7 text-white/30 group-hover:text-white group-hover:translate-x-1 transition-all duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
  <a href="<?php echo esc_url( home_url('/#works') ); ?>" class="group flex flex-1 min-w-0 items-center justify-between px-4 sm:px-8 py-5 sm:py-7 bg-[#111D35] hover:bg-[#0369A1] transition-all duration-200 cursor-pointer border-r border-white/10">
    <div><p class="text-[9px] sm:text-xs font-bold tracking-[0.25em] text-white/50 group-hover:text-white/70 font-['Poppins']">WORKS</p><p class="text-xs sm:text-lg font-bold text-white">事例</p></div>
    <svg class="w-5 h-5 sm:w-7 sm:h-7 text-white/30 group-hover:text-white group-hover:translate-x-1 transition-all duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
  <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="group flex flex-1 min-w-0 items-center justify-between px-4 sm:px-8 py-5 sm:py-7 bg-[#B45309] hover:bg-[#D97706] transition-all duration-200 cursor-pointer">
    <div><p class="text-[9px] sm:text-xs font-bold tracking-[0.25em] text-white/70 group-hover:text-white font-['Poppins']">CONTACT</p><p class="text-xs sm:text-lg font-bold text-white">お問い合わせ</p></div>
    <svg class="w-5 h-5 sm:w-7 sm:h-7 text-white/60 group-hover:text-white group-hover:translate-x-1 transition-all duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
</div>

<!-- ===== FOOTER ===== -->
<footer class="bg-[#111D35] pt-16 pb-0">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 pb-12 border-b border-white/10">
      <div>
        <span class="text-2xl font-extrabold tracking-tight font-['Poppins']"><span class="text-white">AOi </span><span class="text-[#0369A1]">Base</span></span>
        <p class="text-sm text-white/50 leading-loose mt-5 mb-6">構想をカタチに</p>
      </div>
      <div>
        <h3 class="text-xs font-bold tracking-[0.3em] text-white/40 font-['Poppins'] uppercase mb-6">CONTACT INFO</h3>
        <div class="space-y-4">
          <p class="text-xs text-white/70">株式会社AOi Base</p>
          <p class="text-xs text-white/50">〒761-8046 香川県高松市川部町240番地4</p>
          <p class="text-xs text-white/50">アースA203</p>
          <p class="text-xs text-white/50 font-['Poppins']">info@aoibase.jp</p>
        </div>
      </div>
    </div>
    <div class="flex flex-row flex-wrap items-center justify-center gap-4 py-5">
      <p class="text-xs text-white/20 font-['Poppins']">&copy; 2026 AOi Base Inc. All rights reserved.</p>
    </div>
  </div>
</footer>

<!-- ===== SIDE CTA ===== -->
<div class="fixed right-0 top-1/2 -translate-y-1/2 z-40 hidden md:flex flex-col gap-0.5" id="side-cta">
  <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="flex flex-col items-center gap-3 bg-[#0369A1] hover:bg-[#B45309] text-white px-3 py-6 transition-all duration-200 cursor-pointer shadow-xl hover:-translate-x-1 rounded-l-xl" aria-label="無料相談">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.953 9.953 0 01-4.814-1.229L3 20l1.229-4.186A8.955 8.955 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
    <span class="text-xs font-bold [writing-mode:vertical-rl] tracking-widest">無料相談</span>
  </a>
</div>

<!-- ===== PAGE TOP ===== -->
<button id="page-top-btn" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="ページトップへ" class="fixed bottom-8 right-16 z-50 flex flex-col items-center justify-center w-14 h-14 bg-[#1B2A4A] hover:bg-[#0369A1] text-white rounded-full shadow-xl transition-all duration-200 cursor-pointer opacity-0 translate-y-4 pointer-events-none">
  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
  <span class="text-[9px] font-bold tracking-wider font-['Poppins'] mt-0.5">TOP</span>
</button>

<?php wp_footer(); ?>
</body>
</html>
