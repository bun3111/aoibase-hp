<?php get_header(); ?>

<style>
  @keyframes scrollDown {
    0%   { transform: translateY(-100%); opacity: 1; }
    80%  { transform: translateY(200%);  opacity: 1; }
    81%  { opacity: 0; }
    100% { transform: translateY(-100%); opacity: 0; }
  }
  @keyframes tickerScroll {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }
  @keyframes marqueeLeft {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }
  @keyframes marqueeRight {
    0%   { transform: translateX(-50%); }
    100% { transform: translateX(0); }
  }

  @media (prefers-reduced-motion: reduce) {
    #news-ticker, .marquee-track, .marquee-track-left, .marquee-track-right { animation: none !important; }
    .hero-slide { transition: none !important; }
    .scroll-line { animation: none !important; }
    * { transition-duration: 0ms !important; }
  }

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

  }

  .service-card {
    background: #fff; border: 1px solid #F1F5F9; border-radius: 16px;
    padding: 28px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);
    display: flex; flex-direction: column;
    transition: transform 200ms ease, box-shadow 200ms ease;
  }
  .service-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(3,105,161,0.12); border-color: #BFDBFE; }
</style>

<!-- ===== HERO ===== -->
<section id="hero" class="relative w-full overflow-hidden">
  <h1 class="sr-only">AOi Base - Web・アプリ・システム開発</h1>
  <picture>
    <source media="(min-width: 1024px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero-main-pc.png">
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero-main-sp.png" alt="AOi Base" class="w-full h-auto block" loading="eager">
  </picture>
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
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 24px;"><?php echo esc_html( get_theme_mod( 'front_feature_body1', 'AOi Baseは、Web・アプリ・システム開発において、設計段階からセキュリティを組み込んだ開発を行うIT企業です。脆弱性対策や認証・権限設計、データ保護を前提とした構成により、リスクを抑えたシステム構築を実現しています。' ) ); ?></p>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 32px;"><?php echo esc_html( get_theme_mod( 'front_feature_body2', 'また、運用負荷を抑えるための設計を重視し、保守性・拡張性を考慮した構成で開発を行っています。運用後の改修や機能追加にも対応しやすい仕組みを前提に、一貫した体制で開発に取り組んでいます。' ) ); ?></p>
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
      <h2 style="font-family:'Noto Sans JP',sans-serif;font-size:clamp(18px,2.5vw,26px);font-weight:700;color:#0F172A;line-height:1.6;margin:0;"><?php echo wp_kses_post( get_theme_mod( 'front_service_heading', 'お客様の課題に、複数のサービスを<br>組み合わせながら、トータルで解決します' ) ); ?></h2>
    </div>
  </div>
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;" class="service-grid">
      <?php
      $services = array(
        array(
          'en'    => get_theme_mod( 'front_service_1_en', 'WEB PRODUCTION' ),
          'title' => get_theme_mod( 'front_service_1_title', 'Webサイト制作' ),
          'desc'  => get_theme_mod( 'front_service_1_desc', 'コーポレートサイト・LP・採用サイトなど、高品質なWebサイトを設計・制作します。' ),
          'icon_bg' => '#EFF6FF', 'icon_border' => '#BFDBFE', 'icon_color' => '#0369A1',
          'icon'  => '<rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>',
        ),
        array(
          'en'    => get_theme_mod( 'front_service_2_en', 'WEB APP' ),
          'title' => get_theme_mod( 'front_service_2_title', 'Webアプリ開発' ),
          'desc'  => get_theme_mod( 'front_service_2_desc', 'SaaS・社内ポータル・予約管理など高機能Webアプリを構築します。' ),
          'icon_bg' => '#F0FDF4', 'icon_border' => '#BBF7D0', 'icon_color' => '#15803D',
          'icon'  => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>',
        ),
        array(
          'en'    => get_theme_mod( 'front_service_3_en', 'MOBILE APP' ),
          'title' => get_theme_mod( 'front_service_3_title', 'モバイルアプリ開発' ),
          'desc'  => get_theme_mod( 'front_service_3_desc', 'iOS / Androidネイティブ・クロスプラットフォーム対応。ストア申請まで一貫サポート。' ),
          'icon_bg' => '#F5F3FF', 'icon_border' => '#DDD6FE', 'icon_color' => '#6D28D9',
          'icon'  => '<rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/>',
        ),
        array(
          'en'    => get_theme_mod( 'front_service_4_en', 'BUSINESS SYSTEM' ),
          'title' => get_theme_mod( 'front_service_4_title', '業務システム開発' ),
          'desc'  => get_theme_mod( 'front_service_4_desc', '勤怠・在庫・受発注など業務フローに最適化したシステムを構築します。' ),
          'icon_bg' => '#FFF1F2', 'icon_border' => '#FECDD3', 'icon_color' => '#BE123C',
          'icon'  => '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>',
        ),
        array(
          'en'    => get_theme_mod( 'front_service_5_en', 'API DEVELOPMENT' ),
          'title' => get_theme_mod( 'front_service_5_title', 'API設計・開発' ),
          'desc'  => get_theme_mod( 'front_service_5_desc', 'RESTful / GraphQL API設計。外部連携・マイクロサービス分割にも対応。' ),
          'icon_bg' => '#FEFCE8', 'icon_border' => '#FDE68A', 'icon_color' => '#B45309',
          'icon'  => '<path d="M18 20V10"/><path d="M12 20V4"/><path d="M6 20v-6"/>',
        ),
        array(
          'en'    => get_theme_mod( 'front_service_6_en', 'CLOUD MIGRATION' ),
          'title' => get_theme_mod( 'front_service_6_title', 'クラウド移行・構築' ),
          'desc'  => get_theme_mod( 'front_service_6_desc', 'AWS・GCPを活用したクラウドインフラの設計・移行・運用を支援します。' ),
          'icon_bg' => '#F0F9FF', 'icon_border' => '#BAE6FD', 'icon_color' => '#0369A1',
          'icon'  => '<path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/>',
        ),
      );
      foreach ( $services as $svc ) : ?>
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:<?php echo esc_attr( $svc['icon_bg'] ); ?>;border:1px solid <?php echo esc_attr( $svc['icon_border'] ); ?>;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr( $svc['icon_color'] ); ?>" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?php echo $svc['icon']; ?></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;"><?php echo esc_html( $svc['en'] ); ?></div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( $svc['title'] ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( $svc['desc'] ); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== PROCESS ===== -->
<?php
$process_steps = array(
  array(
    'num'  => '01',
    'title' => get_theme_mod( 'front_process_1_title', 'ヒアリング' ),
    'desc'  => get_theme_mod( 'front_process_1_desc', '課題・要望を<br>丁寧にお伺い' ),
    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.953 9.953 0 01-4.814-1.229L3 20l1.229-4.186A8.955 8.955 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>',
    'accent' => false,
  ),
  array(
    'num'  => '02',
    'title' => get_theme_mod( 'front_process_2_title', '要件定義・設計' ),
    'desc'  => get_theme_mod( 'front_process_2_desc', '仕様・スケジュール<br>を明確化' ),
    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>',
    'accent' => false,
  ),
  array(
    'num'  => '03',
    'title' => get_theme_mod( 'front_process_3_title', '開発・実装' ),
    'desc'  => get_theme_mod( 'front_process_3_desc', 'アジャイルで<br>高品質に構築' ),
    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>',
    'accent' => false,
  ),
  array(
    'num'  => '04',
    'title' => get_theme_mod( 'front_process_4_title', 'テスト・納品' ),
    'desc'  => get_theme_mod( 'front_process_4_desc', '品質確認・検収<br>・リリース対応' ),
    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
    'accent' => false,
  ),
  array(
    'num'  => '05',
    'title' => get_theme_mod( 'front_process_5_title', '運用・保守' ),
    'desc'  => get_theme_mod( 'front_process_5_desc', '継続サポートで<br>長期的に伴走' ),
    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>',
    'accent' => true,
  ),
);
?>
<section id="process" class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    <div class="mb-16">
      <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']">PROCESS</p>
      <h2 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] font-['Noto_Sans_JP']">開発の流れ</h2>
      <div class="mt-4 w-12 h-0.5 bg-[#0369A1]"></div>
    </div>
    <!-- Mobile: animated horizontal scroll -->
    <div class="md:hidden" style="overflow:hidden;padding-bottom:16px;margin:0 -24px;">
      <div class="flow-track">
        <?php foreach ( $process_steps as $step ) :
          $circle_bg     = $step['accent'] ? 'bg-[#CA8A04] border-[#CA8A04]' : 'bg-[#EFF6FF] border-[#0369A1]';
          $icon_class    = $step['accent'] ? 'text-white' : 'text-[#0369A1]';
          $num_color     = $step['accent'] ? 'text-[#CA8A04]' : 'text-[#0369A1]';
        ?>
        <div class="flow-item flex flex-col items-center text-center">
          <div class="w-20 h-20 rounded-full <?php echo $circle_bg; ?> border-2 flex items-center justify-center mb-4"><svg class="w-8 h-8 <?php echo $icon_class; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><?php echo $step['icon']; ?></svg></div>
          <span class="text-xs font-bold tracking-[0.2em] <?php echo $num_color; ?> font-['Poppins'] mb-1"><?php echo esc_html( $step['num'] ); ?></span>
          <h3 class="text-sm font-bold text-[#1B2A4A] mb-2"><?php echo esc_html( $step['title'] ); ?></h3>
          <p class="text-xs text-[#475569] leading-relaxed"><?php echo wp_kses_post( $step['desc'] ); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- Desktop: 5-column grid -->
    <div class="relative hidden md:block">
      <div class="absolute top-10 left-[10%] right-[10%] h-px bg-[#CBD5E1] z-0"></div>
      <div class="grid grid-cols-5 gap-4 relative z-10">
        <?php foreach ( $process_steps as $step ) :
          $circle_bg     = $step['accent'] ? 'bg-[#CA8A04] border-[#CA8A04]' : 'bg-[#EFF6FF] border-[#0369A1]';
          $hover_bg      = $step['accent'] ? 'group-hover:bg-[#B45309]' : 'group-hover:bg-[#0369A1]';
          $icon_class    = $step['accent'] ? 'text-white' : 'text-[#0369A1] group-hover:text-white transition-colors duration-200';
          $num_color     = $step['accent'] ? 'text-[#CA8A04]' : 'text-[#0369A1]';
        ?>
        <div class="flex flex-col items-center text-center group">
          <div class="w-20 h-20 rounded-full <?php echo $circle_bg; ?> border-2 flex items-center justify-center mb-4 transition-all duration-200 <?php echo $hover_bg; ?> group-hover:shadow-lg cursor-pointer"><svg class="w-8 h-8 <?php echo $icon_class; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><?php echo $step['icon']; ?></svg></div>
          <span class="text-xs font-bold tracking-[0.2em] <?php echo $num_color; ?> font-['Poppins'] mb-1"><?php echo esc_html( $step['num'] ); ?></span>
          <h3 class="text-sm font-bold text-[#1B2A4A] mb-2"><?php echo esc_html( $step['title'] ); ?></h3>
          <p class="text-xs text-[#475569] leading-relaxed"><?php echo wp_kses_post( $step['desc'] ); ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ===== WORKS ===== -->
<section id="works" class="py-20 bg-[#F8FAFC]">
  <div class="max-w-7xl mx-auto px-6">
    <div class="mb-4"><span class="block text-[clamp(4rem,12vw,9rem)] font-extrabold leading-none tracking-tight text-[#1B2A4A] opacity-5 font-['Poppins'] select-none" aria-hidden="true">WORKS</span></div>
    <div class="-mt-8 md:-mt-16 mb-12 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
      <div>
        <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-1 font-['Poppins']">WORKS</p>
        <h2 class="text-3xl md:text-4xl font-bold text-[#1B2A4A]">開発事例</h2>
        <div class="mt-3 w-12 h-0.5 bg-[#0369A1]"></div>
      </div>
    </div>
    <?php
    $portfolio_parent = get_page_by_path( 'portfolio' );
    $portfolio_children = $portfolio_parent ? get_pages( array( 'child_of' => $portfolio_parent->ID, 'post_status' => 'publish', 'sort_column' => 'menu_order,post_date', 'sort_order' => 'ASC' ) ) : array();

    $works_query = new WP_Query( array(
      'post_type'      => 'achievement',
      'posts_per_page' => -1,
      'post_status'    => 'publish',
      'no_found_rows'  => true,
    ) );
    $achievement_map = array();
    while ( $works_query->have_posts() ) : $works_query->the_post();
      $achievement_map[ get_the_title() ] = array(
        'id'    => get_the_ID(),
        'thumb' => get_the_post_thumbnail_url( get_the_ID(), 'large' ),
      );
    endwhile;
    wp_reset_postdata();
    ?>
    <div class="grid grid-cols-2 gap-3 md:gap-5 max-w-3xl mx-auto" id="works-grid">
      <?php foreach ( $portfolio_children as $child ) :
        $child_title = $child->post_title;
        $thumb_url   = isset( $achievement_map[ $child_title ] ) ? $achievement_map[ $child_title ]['thumb'] : '';
      ?>
      <div class="rounded-2xl overflow-hidden shadow-sm border border-[#E2E8F0]">
        <div class="aspect-[4/3] overflow-hidden bg-[#F8FAFC]">
          <?php if ( $thumb_url ) : ?>
            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( $child_title ); ?>" class="w-full h-full object-cover" loading="lazy">
          <?php else : ?>
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#0369A1] to-[#1B2A4A]">
              <svg class="w-10 h-10 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="mt-10 text-center">
      <a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>" class="inline-flex items-center px-8 py-4 bg-[#0369A1] hover:bg-[#1B2A4A] text-white text-sm font-bold rounded-full transition-all duration-200 cursor-pointer shadow-lg hover:shadow-xl hover:-translate-y-0.5 font-['Poppins']" style="letter-spacing:0.1em;">
        詳細を見る
      </a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
