<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AOi Base｜Web・アプリ・システム開発</title>
  <meta name="description" content="AOi Baseは、Web開発・アプリ開発・システム開発で企業のDXを支援する信頼のITパートナーです。">
  <style>
    html { scroll-behavior: smooth; }
    body { font-family: 'Noto Sans JP', 'Poppins', sans-serif; color: #0F172A; margin: 0; }

    /* Hero slider scroll animation */
    @keyframes scrollDown {
      0%   { transform: translateY(-100%); opacity: 1; }
      80%  { transform: translateY(200%);  opacity: 1; }
      81%  { opacity: 0; }
      100% { transform: translateY(-100%); opacity: 0; }
    }
    /* News ticker */
    @keyframes tickerScroll {
      0%   { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    /* Marquee */
    @keyframes marqueeLeft {
      0%   { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    @keyframes marqueeRight {
      0%   { transform: translateX(-50%); }
      100% { transform: translateX(0); }
    }
    @keyframes marquee {
      from { transform: translateX(0); }
      to   { transform: translateX(-50%); }
    }

    @media (prefers-reduced-motion: reduce) {
      #news-ticker, .marquee-track, .marquee-track-left, .marquee-track-right { animation: none !important; }
      .hero-slide { transition: none !important; }
      .scroll-line { animation: none !important; }
      * { transition-duration: 0ms !important; }
    }

    #site-nav.scrolled { box-shadow: 0 2px 20px rgba(15,23,42,0.08); }
    .hero-dot.active { width: 20px; opacity: 1; }

    .marquee-track-left { display: flex; white-space: nowrap; animation: marqueeLeft 28s linear infinite; }
    .marquee-track-right { display: flex; white-space: nowrap; animation: marqueeRight 24s linear infinite; }
    .marquee-item {
      font-family: 'Poppins', sans-serif; font-size: clamp(56px, 8vw, 100px); font-weight: 800;
      letter-spacing: -1px; padding: 0 48px; white-space: nowrap;
      -webkit-text-stroke: 1.5px rgba(255,255,255,0.18); color: transparent; user-select: none;
    }
    .marquee-item.accent { -webkit-text-stroke: 1.5px rgba(202,138,4,0.45); }
    .marquee-dot { display: inline-block; width: 10px; height: 10px; border-radius: 50%; background: rgba(3,105,161,0.6); margin: 0 12px; vertical-align: middle; flex-shrink: 0; }

    .service-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    @media (prefers-reduced-motion: reduce) { .flow-track { animation: none !important; } }
    @keyframes flowScroll {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    .flow-track {
      display: flex;
      gap: 24px;
      animation: flowScroll 17s linear infinite;
      width: max-content;
    }
    .flow-track:hover { animation-play-state: paused; }
    .flow-track .flow-item { flex: 0 0 160px; max-width: 160px; }
    @media (max-width: 1024px) { .feature-grid { grid-template-columns: 1fr !important; } }
    @media (max-width: 767px) { .service-grid { grid-template-columns: 1fr !important; } }
    @media (max-width: 640px) {
      .feature-grid img { max-height: 240px !important; }
      .feature-grid > div:first-child > div:first-child { width: 200px !important; height: 200px !important; top: -15px !important; left: -15px !important; }
      .feature-grid > div:first-child > div:nth-child(2) { width: 100px !important; height: 100px !important; }
      #company { min-height: auto !important; }
      #company .py-24 { padding-top: 48px !important; padding-bottom: 48px !important; }
      #company .p-10 { padding: 24px !important; }
      #company dl.space-y-3 > div { padding-bottom: 8px !important; }
      #company dl > div > dt { width: 5rem !important; font-size: 11px !important; }
      #company dl > div > dd { font-size: 12px !important; }
      #company h2 { font-size: 22px !important; }

      /* === Top WORKS card aspect 3:4 + simplified (mobile) === */
      #works-grid .works-card { aspect-ratio: 3 / 4; display: flex; flex-direction: column; }
      #works-grid .works-card .relative.h-52 { height: 60% !important; flex-shrink: 0; }
      #works-grid .works-card .p-6 { padding: 10px 12px !important; flex: 1; display: flex; flex-direction: column; justify-content: center; }
      #works-grid .works-card .p-6 > span { display: none !important; }
      #works-grid .works-card .p-6 > p { display: none !important; }
      #works-grid .works-card .p-6 > div.flex.items-center { display: none !important; }
      #works-grid .works-card .p-6 > h3 { font-size: 12px !important; line-height: 1.4 !important; margin: 0 !important; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    }

    .service-card {
      background: #fff; border: 1px solid #F1F5F9; border-radius: 16px;
      padding: 28px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);
      display: flex; flex-direction: column;
      transition: transform 200ms ease, box-shadow 200ms ease;
    }
    .service-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(3,105,161,0.12); border-color: #BFDBFE; }
    .aoibase-fade-in { opacity: 0; transform: translateY(16px); transition: opacity 600ms cubic-bezier(0.22, 1, 0.36, 1), transform 600ms cubic-bezier(0.22, 1, 0.36, 1); }
    .aoibase-fade-in-visible { opacity: 1; transform: translateY(0); }
    @media (prefers-reduced-motion: reduce) { .aoibase-fade-in { opacity: 1; transform: none; transition: none; } }
  </style>
  <?php wp_head(); ?>
</head>
<body class="bg-white">

<!-- ===== NAV ===== -->
<header id="site-nav" class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-200" style="transition: box-shadow 200ms ease;">
  <div class="max-w-screen-xl mx-auto px-6 flex items-center justify-between h-12 md:h-20">
    <a href="#" class="flex items-center cursor-pointer group" aria-label="AOi Base トップページ">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-aoi.png" alt="AOi Base" class="h-5 md:h-12 w-auto" loading="eager" decoding="async">
    </a>
    <nav class="hidden lg:flex items-center gap-6 xl:gap-8">
      <a href="<?php echo home_url('/'); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">TOP</a>
      <a href="<?php echo home_url('/news/'); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">NEWS</a>
      <a href="<?php echo home_url('/flow/'); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">開発の流れ</a>
      <a href="<?php echo home_url('/achievements/'); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">事例</a>
      <a href="<?php echo home_url('/company/'); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">企業情報</a>
    </nav>
    <div class="flex items-center gap-3">
      <a href="<?php echo home_url('/contact/'); ?>" class="hidden md:inline-flex items-center gap-2 bg-[#0369A1] hover:bg-[#1B2A4A] text-white text-xs font-['Poppins'] px-5 py-2.5 cursor-pointer transition-colors duration-200" style="font-weight:600; letter-spacing:0.1em;">お問い合わせ</a>
      <button id="nav-toggle" aria-label="メニューを開く" class="lg:hidden flex flex-col justify-center items-center w-10 h-10 gap-1.5 cursor-pointer">
        <span class="block w-6 h-0.5 bg-[#1B2A4A]"></span>
        <span class="block w-6 h-0.5 bg-[#1B2A4A]"></span>
        <span class="block w-6 h-0.5 bg-[#1B2A4A]"></span>
      </button>
    </div>
  </div>
  <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-100">
    <nav class="flex flex-col px-6 py-4 gap-0">
      <a href="<?php echo home_url('/'); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">TOP</a>
      <a href="<?php echo home_url('/news/'); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">NEWS</a>
      <a href="<?php echo home_url('/flow/'); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">開発の流れ</a>
      <a href="<?php echo home_url('/achievements/'); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">事例</a>
      <a href="<?php echo home_url('/company/'); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">企業情報</a>
      <a href="<?php echo home_url('/contact/'); ?>" class="mt-4 inline-flex items-center justify-center gap-2 bg-[#0369A1] text-white text-xs font-['Poppins'] px-5 py-3 cursor-pointer" style="font-weight:600;">お問い合わせ</a>
    </nav>
  </div>
</header>

<!-- ===== HERO ===== -->
<div class="h-12 md:h-20 lg:h-0"></div>
<section id="hero" class="relative w-full overflow-hidden">
  <picture>
    <source media="(min-width: 1024px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero-main-pc.png">
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero-main-sp.png" alt="AOi Base" class="w-full h-auto block" loading="eager">
  </picture>
  <!-- Scroll indicator -->
  <div class="absolute right-6 md:right-10 top-1/2 -translate-y-1/2 z-10 flex flex-col items-center gap-2">
    <span class="font-['Poppins'] text-[9px] tracking-[0.3em] text-[#1B2A4A] uppercase opacity-60" style="writing-mode:vertical-rl;font-weight:500;">Scroll</span>
    <div class="w-px bg-[#1B2A4A] opacity-30 overflow-hidden relative" style="height:64px;">
      <div class="absolute top-0 left-0 w-full bg-[#1B2A4A]" style="height:50%;animation:scrollDown 1.8s ease-in-out infinite;"></div>
    </div>
  </div>
</section>
<!-- Bottom band -->
<div class="bg-[#1B2A4A] h-10 lg:h-[3.75rem]">
  <div class="max-w-screen-xl mx-auto h-full px-6 md:px-16 flex items-center">
    <div class="flex flex-col shrink-0">
      <span class="font-['Poppins'] text-sm lg:text-xl text-white" style="font-weight:800;">AOi <span class="text-[#0369A1]">Base</span></span>
      <span class="font-['Poppins'] text-[6px] lg:text-[10px] tracking-[0.2em] text-white/50 uppercase" style="margin-top:1px;">Total Development Solutions</span>
    </div>
  </div>
</div>

<!-- ===== NEWS TICKER ===== -->
<section id="news" class="bg-white border-b border-slate-200">
  <div class="max-w-screen-xl mx-auto flex items-stretch" style="min-height:52px;">
    <div class="shrink-0 flex items-center px-5 md:px-8 bg-[#0369A1]">
      <span class="font-['Poppins'] text-[10px] md:text-xs tracking-[0.25em] text-white uppercase" style="font-weight:600;">News</span>
    </div>
    <div class="flex-1 overflow-hidden flex items-center relative">
      <div class="pointer-events-none absolute left-0 top-0 bottom-0 w-6 z-10" style="background:linear-gradient(to right,white,transparent);"></div>
      <div class="pointer-events-none absolute right-0 top-0 bottom-0 w-6 z-10" style="background:linear-gradient(to left,white,transparent);"></div>
      <?php
      $news_query = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'no_found_rows'  => true,
      ) );
      ?>
      <ul id="news-ticker" class="flex gap-10 md:gap-16 whitespace-nowrap pl-6" style="animation:tickerScroll 28s linear infinite;">
        <?php if ( $news_query->have_posts() ) : ?>
          <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
          <li class="flex items-center gap-3 shrink-0"><time class="font-['Poppins'] text-[10px] md:text-xs text-[#0369A1] tracking-wider" style="font-weight:500;"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time><span class="block w-px h-3 bg-slate-300"></span><a href="<?php the_permalink(); ?>" class="text-xs md:text-sm text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 cursor-pointer"><?php the_title(); ?></a></li>
          <?php endwhile; ?>
          <?php /* Duplicate for seamless ticker loop */ ?>
          <?php $news_query->rewind_posts(); ?>
          <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
          <li class="flex items-center gap-3 shrink-0" aria-hidden="true"><time class="font-['Poppins'] text-[10px] md:text-xs text-[#0369A1] tracking-wider" style="font-weight:500;"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time><span class="block w-px h-3 bg-slate-300"></span><a href="<?php the_permalink(); ?>" class="text-xs md:text-sm text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 cursor-pointer"><?php the_title(); ?></a></li>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php else : ?>
          <li class="flex items-center gap-3 shrink-0"><time class="font-['Poppins'] text-[10px] md:text-xs text-[#0369A1] tracking-wider" style="font-weight:500;">2026.03.10</time><span class="block w-px h-3 bg-slate-300"></span><span class="text-xs md:text-sm text-[#0F172A]">お知らせはまだありません</span></li>
          <li class="flex items-center gap-3 shrink-0" aria-hidden="true"><time class="font-['Poppins'] text-[10px] md:text-xs text-[#0369A1] tracking-wider" style="font-weight:500;">2026.03.10</time><span class="block w-px h-3 bg-slate-300"></span><span class="text-xs md:text-sm text-[#0F172A]">お知らせはまだありません</span></li>
        <?php endif; ?>
      </ul>
    </div>
    <a href="<?php echo esc_url(home_url('/news/')); ?>" class="shrink-0 flex items-center gap-2 px-5 md:px-8 border-l border-slate-200 hover:bg-[#F8FAFC] transition-colors duration-200 cursor-pointer group">
      <span class="font-['Poppins'] text-[10px] md:text-xs tracking-[0.2em] text-[#0369A1] uppercase" style="font-weight:600;">More</span>
      <svg class="w-3 h-3 text-[#0369A1] group-hover:translate-x-0.5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12" stroke-width="2.5"/><polyline points="12 5 19 12 12 19" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
</section>

<!-- ===== FEATURE ===== -->
<section id="feature" style="background:#fff;padding:120px 0 100px;overflow:hidden;">
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <div style="margin-bottom:64px;">
      <div style="margin-bottom:12px;">
        <span style="font-family:'Poppins',sans-serif;font-size:clamp(72px,10vw,120px);font-weight:800;color:#F1F5F9;line-height:1;letter-spacing:-2px;user-select:none;">FEATURE</span>
      </div>
      <div style="display:flex;align-items:center;gap:20px;">
        <div style="width:40px;height:3px;background:#0369A1;"></div>
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">わたしたちにできること</span>
      </div>
    </div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;" class="feature-grid">
      <div style="position:relative;">
        <div style="position:absolute;top:-30px;left:-30px;width:320px;height:320px;background:linear-gradient(135deg,#EFF6FF,#DBEAFE);border-radius:40% 60% 60% 40%/40% 40% 60% 60%;z-index:0;"></div>
        <div style="position:absolute;bottom:-20px;right:20px;width:160px;height:160px;background:linear-gradient(135deg,#FEF9C3,#FEF08A);border-radius:50%;opacity:0.5;z-index:0;"></div>
        <div style="position:relative;z-index:1;text-align:center;">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/illustration-4.png" alt="チームミーティングのイラスト" style="max-width:100%;height:auto;max-height:480px;object-fit:contain;filter:drop-shadow(0 20px 40px rgba(3,105,161,0.12));" loading="lazy">
        </div>
      </div>
      <div>
        <div style="display:inline-flex;align-items:center;gap:8px;background:#EFF6FF;border:1px solid #BFDBFE;border-radius:100px;padding:6px 16px;margin-bottom:28px;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          <span style="font-family:'Poppins',sans-serif;font-size:12px;font-weight:600;color:#0369A1;letter-spacing:0.05em;">Total Development Power</span>
        </div>
        <h2 style="font-family:'Noto Sans JP',sans-serif;font-size:clamp(24px,3.5vw,38px);font-weight:700;color:#0F172A;line-height:1.6;margin:0 0 12px;">Web開発<br>アプリ開発<br>システム開発</h2>
        <p style="font-family:'Poppins',sans-serif;font-size:13px;font-weight:500;color:#94A3B8;letter-spacing:0.05em;margin:0 0 32px;">Web / App / System Development</p>
        <div style="width:48px;height:3px;background:linear-gradient(90deg,#0369A1,#CA8A04);border-radius:2px;margin-bottom:32px;"></div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 24px;">AOi Baseは、Web・アプリ・システム開発において、設計段階からセキュリティを組み込んだ開発を行うIT企業です。脆弱性対策や認証・権限設計、データ保護を前提とした構成により、リスクを抑えたシステム構築を実現しています。</p>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 32px;">また、運用負荷を抑えるための設計を重視し、保守性・拡張性を考慮した構成で開発を行っています。運用後の改修や機能追加にも対応しやすい仕組みを前提に、一貫した体制で開発に取り組んでいます。</p>
        <div style="display:flex;gap:16px;flex-wrap:wrap;">
          <a href="<?php echo esc_url( home_url( '/security/' ) ); ?>" style="display:inline-flex;align-items:center;justify-content:center;padding:12px 24px;background:#fff;border:2px solid #0369A1;color:#0369A1;font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;border-radius:8px;text-decoration:none;transition:all 200ms;cursor:pointer;" onmouseover="this.style.background='#0369A1';this.style.color='#fff';" onmouseout="this.style.background='#fff';this.style.color='#0369A1';">セキュリティリスクとは？</a>
          <a href="<?php echo esc_url( home_url( '/operability/' ) ); ?>" style="display:inline-flex;align-items:center;justify-content:center;padding:12px 24px;background:#fff;border:2px solid #0369A1;color:#0369A1;font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;border-radius:8px;text-decoration:none;transition:all 200ms;cursor:pointer;" onmouseover="this.style.background='#0369A1';this.style.color='#fff';" onmouseout="this.style.background='#fff';this.style.color='#0369A1';">運用のしやすさとは？</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== MARQUEE ===== -->
<section style="background:#0F172A;padding:0;overflow:hidden;position:relative;">
  <div style="height:1px;background:linear-gradient(90deg,transparent,#0369A1,#CA8A04,#0369A1,transparent);"></div>
  <div style="overflow:hidden;padding:40px 0 20px;">
    <div class="marquee-track-left">
      <span class="marquee-item">TOTAL DEVELOPMENT SOLUTIONS</span><span class="marquee-dot" style="align-self:center;"></span>
      <span class="marquee-item accent">AOi Base</span><span class="marquee-dot" style="align-self:center;"></span>
      <span class="marquee-item">TOTAL DEVELOPMENT SOLUTIONS</span><span class="marquee-dot" style="align-self:center;"></span>
      <span class="marquee-item accent">AOi Base</span><span class="marquee-dot" style="align-self:center;"></span>
    </div>
  </div>
  <div style="overflow:hidden;padding:20px 0 40px;">
    <div class="marquee-track-right">
      <span class="marquee-item accent">WEB × APP × SYSTEM</span><span class="marquee-dot" style="align-self:center;background:rgba(202,138,4,0.5);"></span>
      <span class="marquee-item">YOUR VISION, OUR CODE</span><span class="marquee-dot" style="align-self:center;background:rgba(202,138,4,0.5);"></span>
      <span class="marquee-item accent">WEB × APP × SYSTEM</span><span class="marquee-dot" style="align-self:center;background:rgba(202,138,4,0.5);"></span>
      <span class="marquee-item">YOUR VISION, OUR CODE</span><span class="marquee-dot" style="align-self:center;background:rgba(202,138,4,0.5);"></span>
    </div>
  </div>
  <div style="height:1px;background:linear-gradient(90deg,transparent,#CA8A04,#0369A1,#CA8A04,transparent);"></div>
</section>

<!-- ===== SERVICE ===== -->
<section id="service" style="background:#F8FAFC;padding:120px 0 100px;overflow:hidden;">
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <div style="margin-bottom:20px;">
      <span style="font-family:'Poppins',sans-serif;font-size:clamp(72px,10vw,120px);font-weight:800;color:#EEF2FF;line-height:1;letter-spacing:-2px;user-select:none;display:block;">SERVICE</span>
      <div style="display:flex;align-items:center;gap:20px;margin-top:-24px;position:relative;z-index:1;">
        <div style="width:40px;height:3px;background:#0369A1;"></div>
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">サービス案内</span>
      </div>
    </div>
    <div style="margin-bottom:64px;max-width:720px;">
      <h2 style="font-family:'Noto Sans JP',sans-serif;font-size:clamp(18px,2.5vw,26px);font-weight:700;color:#0F172A;line-height:1.6;margin:0;">お客様の課題に、複数のサービスを<br>組み合わせながら、トータルで解決します</h2>
    </div>
  </div>
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;" class="service-grid">
      <!-- Card 1 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#EFF6FF;border:1px solid #BFDBFE;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">WEB PRODUCTION</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0;">Webサイト制作</h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;">コーポレートサイト・LP・採用サイトなど、高品質なWebサイトを設計・制作します。</p>
      </div>
      <!-- Card 2 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F0FDF4;border:1px solid #BBF7D0;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#15803D" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">WEB APP</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0;">Webアプリ開発</h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;">SaaS・社内ポータル・予約管理など高機能Webアプリを構築します。</p>
      </div>
      <!-- Card 3 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F5F3FF;border:1px solid #DDD6FE;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6D28D9" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">MOBILE APP</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0;">モバイルアプリ開発</h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;">iOS / Androidネイティブ・クロスプラットフォーム対応。ストア申請まで一貫サポート。</p>
      </div>
      <!-- Card 4 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#FFF1F2;border:1px solid #FECDD3;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#BE123C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">BUSINESS SYSTEM</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0;">業務システム開発</h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;">勤怠・在庫・受発注など業務フローに最適化したシステムを構築します。</p>
      </div>
      <!-- Card 5 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#FEFCE8;border:1px solid #FDE68A;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#B45309" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 20V10"/><path d="M12 20V4"/><path d="M6 20v-6"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">API DEVELOPMENT</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0;">API設計・開発</h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;">RESTful / GraphQL API設計。外部連携・マイクロサービス分割にも対応。</p>
      </div>
      <!-- Card 6 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F0F9FF;border:1px solid #BAE6FD;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">CLOUD MIGRATION</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0;">クラウド移行・構築</h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;">AWS・GCPを活用したクラウドインフラの設計・移行・運用を支援します。</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== PROCESS ===== -->
<section id="process" class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    <div class="mb-16">
      <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']">PROCESS</p>
      <h2 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] font-['Noto_Sans_JP']">開発の流れ</h2>
      <div class="mt-4 w-12 h-0.5 bg-[#0369A1]"></div>
    </div>
    <!-- Mobile: animated horizontal scroll -->
    <div class="md:hidden" style="overflow:hidden;width:100%;padding-bottom:16px;">
      <div class="flow-track">
        <div class="flow-item flex flex-col items-center text-center">
          <div class="w-20 h-20 rounded-full bg-[#EFF6FF] border-2 border-[#0369A1] flex items-center justify-center mb-4"><svg class="w-8 h-8 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.953 9.953 0 01-4.814-1.229L3 20l1.229-4.186A8.955 8.955 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg></div>
          <span class="text-xs font-bold tracking-[0.2em] text-[#0369A1] font-['Poppins'] mb-1">01</span>
          <h3 class="text-sm font-bold text-[#1B2A4A] mb-2">ヒアリング</h3>
          <p class="text-xs text-[#475569] leading-relaxed">課題・要望を<br>丁寧にお伺い</p>
        </div>
        <div class="flow-item flex flex-col items-center text-center">
          <div class="w-20 h-20 rounded-full bg-[#EFF6FF] border-2 border-[#0369A1] flex items-center justify-center mb-4"><svg class="w-8 h-8 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></div>
          <span class="text-xs font-bold tracking-[0.2em] text-[#0369A1] font-['Poppins'] mb-1">02</span>
          <h3 class="text-sm font-bold text-[#1B2A4A] mb-2">要件定義・設計</h3>
          <p class="text-xs text-[#475569] leading-relaxed">仕様・スケジュール<br>を明確化</p>
        </div>
        <div class="flow-item flex flex-col items-center text-center">
          <div class="w-20 h-20 rounded-full bg-[#EFF6FF] border-2 border-[#0369A1] flex items-center justify-center mb-4"><svg class="w-8 h-8 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg></div>
          <span class="text-xs font-bold tracking-[0.2em] text-[#0369A1] font-['Poppins'] mb-1">03</span>
          <h3 class="text-sm font-bold text-[#1B2A4A] mb-2">開発・実装</h3>
          <p class="text-xs text-[#475569] leading-relaxed">アジャイルで<br>高品質に構築</p>
        </div>
        <div class="flow-item flex flex-col items-center text-center">
          <div class="w-20 h-20 rounded-full bg-[#EFF6FF] border-2 border-[#0369A1] flex items-center justify-center mb-4"><svg class="w-8 h-8 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
          <span class="text-xs font-bold tracking-[0.2em] text-[#0369A1] font-['Poppins'] mb-1">04</span>
          <h3 class="text-sm font-bold text-[#1B2A4A] mb-2">テスト・納品</h3>
          <p class="text-xs text-[#475569] leading-relaxed">品質確認・検収<br>・リリース対応</p>
        </div>
        <div class="flow-item flex flex-col items-center text-center">
          <div class="w-20 h-20 rounded-full bg-[#CA8A04] border-2 border-[#CA8A04] flex items-center justify-center mb-4"><svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg></div>
          <span class="text-xs font-bold tracking-[0.2em] text-[#CA8A04] font-['Poppins'] mb-1">05</span>
          <h3 class="text-sm font-bold text-[#1B2A4A] mb-2">運用・保守</h3>
          <p class="text-xs text-[#475569] leading-relaxed">継続サポートで<br>長期的に伴走</p>
        </div>
      </div>
    </div>
    <!-- Desktop: 5-column grid -->
    <div class="relative hidden md:block">
      <div class="absolute top-10 left-[10%] right-[10%] h-px bg-[#CBD5E1] z-0"></div>
      <div class="grid grid-cols-5 gap-4 relative z-10">
        <div class="flex flex-col items-center text-center group">
          <div class="w-20 h-20 rounded-full bg-[#EFF6FF] border-2 border-[#0369A1] flex items-center justify-center mb-4 transition-all duration-200 group-hover:bg-[#0369A1] group-hover:shadow-lg cursor-pointer"><svg class="w-8 h-8 text-[#0369A1] group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.953 9.953 0 01-4.814-1.229L3 20l1.229-4.186A8.955 8.955 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg></div>
          <span class="text-xs font-bold tracking-[0.2em] text-[#0369A1] font-['Poppins'] mb-1">01</span>
          <h3 class="text-sm font-bold text-[#1B2A4A] mb-2">ヒアリング</h3>
          <p class="text-xs text-[#475569] leading-relaxed">課題・要望を<br>丁寧にお伺い</p>
        </div>
        <div class="flex flex-col items-center text-center group">
          <div class="w-20 h-20 rounded-full bg-[#EFF6FF] border-2 border-[#0369A1] flex items-center justify-center mb-4 transition-all duration-200 group-hover:bg-[#0369A1] group-hover:shadow-lg cursor-pointer"><svg class="w-8 h-8 text-[#0369A1] group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></div>
          <span class="text-xs font-bold tracking-[0.2em] text-[#0369A1] font-['Poppins'] mb-1">02</span>
          <h3 class="text-sm font-bold text-[#1B2A4A] mb-2">要件定義・設計</h3>
          <p class="text-xs text-[#475569] leading-relaxed">仕様・スケジュール<br>を明確化</p>
        </div>
        <div class="flex flex-col items-center text-center group">
          <div class="w-20 h-20 rounded-full bg-[#EFF6FF] border-2 border-[#0369A1] flex items-center justify-center mb-4 transition-all duration-200 group-hover:bg-[#0369A1] group-hover:shadow-lg cursor-pointer"><svg class="w-8 h-8 text-[#0369A1] group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg></div>
          <span class="text-xs font-bold tracking-[0.2em] text-[#0369A1] font-['Poppins'] mb-1">03</span>
          <h3 class="text-sm font-bold text-[#1B2A4A] mb-2">開発・実装</h3>
          <p class="text-xs text-[#475569] leading-relaxed">アジャイルで<br>高品質に構築</p>
        </div>
        <div class="flex flex-col items-center text-center group">
          <div class="w-20 h-20 rounded-full bg-[#EFF6FF] border-2 border-[#0369A1] flex items-center justify-center mb-4 transition-all duration-200 group-hover:bg-[#0369A1] group-hover:shadow-lg cursor-pointer"><svg class="w-8 h-8 text-[#0369A1] group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
          <span class="text-xs font-bold tracking-[0.2em] text-[#0369A1] font-['Poppins'] mb-1">04</span>
          <h3 class="text-sm font-bold text-[#1B2A4A] mb-2">テスト・納品</h3>
          <p class="text-xs text-[#475569] leading-relaxed">品質確認・検収<br>・リリース対応</p>
        </div>
        <div class="flex flex-col items-center text-center group">
          <div class="w-20 h-20 rounded-full bg-[#CA8A04] border-2 border-[#CA8A04] flex items-center justify-center mb-4 transition-all duration-200 group-hover:bg-[#B45309] group-hover:shadow-lg cursor-pointer"><svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg></div>
          <span class="text-xs font-bold tracking-[0.2em] text-[#CA8A04] font-['Poppins'] mb-1">05</span>
          <h3 class="text-sm font-bold text-[#1B2A4A] mb-2">運用・保守</h3>
          <p class="text-xs text-[#475569] leading-relaxed">継続サポートで<br>長期的に伴走</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== WORKS ===== -->
<section id="works" class="py-20 bg-[#F8FAFC]">
  <div class="max-w-7xl mx-auto px-6">
    <div class="mb-4"><h2 class="text-[clamp(4rem,12vw,9rem)] font-extrabold leading-none tracking-tight text-[#1B2A4A] opacity-5 font-['Poppins'] select-none">WORKS</h2></div>
    <div class="-mt-8 md:-mt-16 mb-12 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
      <div>
        <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-1 font-['Poppins']">WORKS</p>
        <h2 class="text-3xl md:text-4xl font-bold text-[#1B2A4A]">事例</h2>
        <div class="mt-3 w-12 h-0.5 bg-[#0369A1]"></div>
      </div>
    </div>
    <div class="grid grid-cols-2 gap-3 md:gap-6" id="works-grid">
      <!-- Card 1: AIらくらくオーダーメイド -->
      <article class="works-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-200">
        <div class="relative h-52 overflow-hidden">
          <img src="<?php echo esc_url( get_the_post_thumbnail_url( 41, 'large' ) ); ?>" alt="AIらくらくオーダーメイド" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
          <div class="absolute bottom-0 left-0 right-0 h-1 bg-[#CA8A04] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200 origin-left z-10"></div>
        </div>
        <div class="p-6">
          <span class="inline-block px-3 py-1 text-xs font-semibold text-[#0369A1] bg-[#EFF6FF] rounded-full font-['Poppins'] mb-3">Web App</span>
          <h3 class="text-base font-bold text-[#1B2A4A] mb-2 group-hover:text-[#0369A1] transition-colors duration-200">AIらくらくオーダーメイド</h3>
        </div>
      </article>
      <!-- Card 2: earthlife HP -->
      <article class="works-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-200">
        <div class="relative h-52 overflow-hidden">
          <img src="<?php echo esc_url( get_the_post_thumbnail_url( 73, 'large' ) ); ?>" alt="株式会社アースライフ様HP" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
          <div class="absolute bottom-0 left-0 right-0 h-1 bg-[#CA8A04] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200 origin-left z-10"></div>
        </div>
        <div class="p-6">
          <span class="inline-block px-3 py-1 text-xs font-semibold text-[#0369A1] bg-[#EFF6FF] rounded-full font-['Poppins'] mb-3">Web Site</span>
          <h3 class="text-base font-bold text-[#1B2A4A] mb-2 group-hover:text-[#0369A1] transition-colors duration-200">株式会社アースライフ様HP</h3>
        </div>
      </article>
    </div>
    <div class="mt-10 text-center">
      <a href="<?php echo esc_url( home_url( '/achievements/' ) ); ?>" class="inline-flex items-center gap-2 px-8 py-4 bg-[#0369A1] hover:bg-[#1B2A4A] text-white text-sm font-bold rounded-full transition-all duration-200 cursor-pointer shadow-lg hover:shadow-xl hover:-translate-y-0.5 font-['Poppins']" style="letter-spacing:0.1em;">
        詳しく見る
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- ===== BOTTOM CTA BAR ===== -->
<div class="flex flex-wrap">
  <a href="<?php echo home_url('/company/'); ?>" class="group flex flex-1 min-w-0 items-center justify-between px-4 sm:px-8 py-5 sm:py-7 bg-[#0F172A] hover:bg-[#0369A1] transition-all duration-200 cursor-pointer border-r border-white/10">
    <div><p class="text-[9px] sm:text-xs font-bold tracking-[0.25em] text-white/50 group-hover:text-white/70 font-['Poppins']">COMPANY</p><p class="text-xs sm:text-lg font-bold text-white">会社概要</p></div>
    <svg class="w-5 h-5 sm:w-7 sm:h-7 text-white/30 group-hover:text-white group-hover:translate-x-1 transition-all duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
  <a href="<?php echo esc_url( home_url( '/achievements/' ) ); ?>" class="group flex flex-1 min-w-0 items-center justify-between px-4 sm:px-8 py-5 sm:py-7 bg-[#111D35] hover:bg-[#0369A1] transition-all duration-200 cursor-pointer border-r border-white/10">
    <div><p class="text-[9px] sm:text-xs font-bold tracking-[0.25em] text-white/50 group-hover:text-white/70 font-['Poppins']">WORKS</p><p class="text-xs sm:text-lg font-bold text-white">事例</p></div>
    <svg class="w-5 h-5 sm:w-7 sm:h-7 text-white/30 group-hover:text-white group-hover:translate-x-1 transition-all duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
  <a href="<?php echo home_url('/contact/'); ?>" class="group flex flex-1 min-w-0 items-center justify-between px-4 sm:px-8 py-5 sm:py-7 bg-[#B45309] hover:bg-[#D97706] transition-all duration-200 cursor-pointer">
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
    <div class="flex flex-col md:flex-row items-center justify-between gap-4 py-5">
      <p class="text-xs text-white/20 font-['Poppins']">&copy; 2026 AOi Base Inc. All rights reserved.</p>
    </div>
  </div>
</footer>

<!-- ===== SIDE CTA ===== -->
<div class="fixed right-0 top-1/2 -translate-y-1/2 z-40 hidden md:flex flex-col gap-0.5" id="side-cta">
  <a href="<?php echo home_url('/contact/'); ?>" class="flex flex-col items-center gap-3 bg-[#0369A1] hover:bg-[#B45309] text-white px-3 py-6 transition-all duration-200 cursor-pointer shadow-xl hover:-translate-x-1 rounded-l-xl" aria-label="無料相談">
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
