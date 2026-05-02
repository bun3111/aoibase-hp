<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>会社概要｜株式会社AOi Base</title>
  <meta name="description" content="株式会社AOi Baseの会社概要ページです。所在地・設立・資本金・事業内容などの企業情報をご覧いただけます。">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    html { scroll-behavior: smooth; }
    body { font-family: 'Noto Sans JP', 'Poppins', sans-serif; color: #0F172A; margin: 0; }
    .skip-link {
      position: absolute;
      top: -40px;
      left: 0;
      background: #0369A1;
      color: #fff;
      padding: 8px 16px;
      z-index: 100;
      text-decoration: none;
      font-size: 14px;
      font-weight: 600;
    }
    .skip-link:focus { top: 0; }
    .aoibase-fade-in { opacity: 0; transform: translateY(16px); transition: opacity 600ms cubic-bezier(0.22, 1, 0.36, 1), transform 600ms cubic-bezier(0.22, 1, 0.36, 1); }
    .aoibase-fade-in-visible { opacity: 1; transform: translateY(0); }
    @media (prefers-reduced-motion: reduce) { .aoibase-fade-in { opacity: 1; transform: none; transition: none; } }
  </style>
  <?php wp_head(); ?>
</head>
<body>

<a href="#main-content" class="skip-link">本文へスキップ</a>

<!-- ===== NAVIGATION ===== -->
<header id="site-nav" class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-200" style="transition: box-shadow 200ms ease;">
  <div class="max-w-screen-xl mx-auto px-6 flex items-center justify-between h-16 md:h-20">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center cursor-pointer group" aria-label="AOi Base トップページ">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-aoi.png" alt="AOi Base" class="h-8 md:h-12 w-auto" loading="eager" decoding="async">
    </a>
    <nav class="hidden lg:flex items-center gap-6 xl:gap-8">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">TOP</a>
      <a href="<?php echo esc_url(home_url('/news/')); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">NEWS</a>
      <a href="<?php echo esc_url(home_url('/flow/')); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">開発の流れ</a>
      <a href="<?php echo esc_url(home_url('/achievements/')); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">事例</a>
      <a href="<?php echo esc_url(home_url('/company/')); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0369A1] cursor-pointer" style="font-weight:600;" aria-current="page">企業情報</a>
    </nav>
    <div class="flex items-center gap-3">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hidden md:inline-flex items-center gap-2 bg-[#0369A1] hover:bg-[#1B2A4A] text-white text-xs font-['Poppins'] px-5 py-2.5 cursor-pointer transition-colors duration-200" style="font-weight:600; letter-spacing:0.1em;">お問い合わせ</a>
      <button id="nav-toggle" aria-label="メニューを開く" class="lg:hidden flex flex-col justify-center items-center w-10 h-10 gap-1.5 cursor-pointer">
        <span class="block w-6 h-0.5 bg-[#1B2A4A]"></span>
        <span class="block w-6 h-0.5 bg-[#1B2A4A]"></span>
        <span class="block w-6 h-0.5 bg-[#1B2A4A]"></span>
      </button>
    </div>
  </div>
  <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-100">
    <nav class="flex flex-col px-6 py-4 gap-0">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">TOP</a>
      <a href="<?php echo esc_url(home_url('/news/')); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">NEWS</a>
      <a href="<?php echo esc_url(home_url('/flow/')); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">開発の流れ</a>
      <a href="<?php echo esc_url(home_url('/achievements/')); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">事例</a>
      <a href="<?php echo esc_url(home_url('/company/')); ?>" class="mobile-nav-link font-['Poppins'] text-xs tracking-widest uppercase text-[#0F172A] hover:text-[#0369A1] py-3 border-b border-slate-100 transition-colors duration-200" style="font-weight:600;">企業情報</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="mt-4 inline-flex items-center justify-center gap-2 bg-[#0369A1] text-white text-xs font-['Poppins'] px-5 py-3 cursor-pointer" style="font-weight:600;">お問い合わせ</a>
    </nav>
  </div>
</header>

<main id="main-content">

<!-- ===== PAGE HEADER ===== -->
<section class="pt-32 pb-16 bg-gradient-to-b from-[#F0F7FF] to-white">
  <div class="max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">COMPANY</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4">会社概要</h1>
    <p class="text-sm text-[#64748B] leading-relaxed max-w-2xl">株式会社AOi Baseは、Web開発・アプリ開発・システム開発などを手がける香川県高松市のシステム開発会社です。</p>
    <nav aria-label="パンくずリスト" class="mt-6 text-xs text-[#94A3B8]">
      <ol class="flex items-center flex-wrap gap-x-2">
        <li><a href="<?php echo home_url('/'); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a></li>
        <li aria-hidden="true"><span class="mx-2">›</span></li>
        <li aria-current="page"><span class="text-[#475569]">会社概要</span></li>
      </ol>
    </nav>
  </div>
</section>

<!-- ===== COMPANY INFO SECTION ===== -->
<section class="py-20 bg-white">
  <div class="max-w-2xl mx-auto px-6">
    <div class="bg-white rounded-2xl shadow-xl border border-[#E2E8F0]/60 p-8 md:p-12">
      <div class="mb-8">
        <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']">COMPANY INFORMATION</p>
        <h2 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-1">企業情報</h2>
        <div class="w-10 h-0.5 bg-[#0369A1] mt-4"></div>
      </div>
      <dl class="text-sm space-y-3">
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">会社名</dt>
          <dd class="text-[#475569]">株式会社AOi Base</dd>
        </div>
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">所在地</dt>
          <dd class="text-[#475569]">〒761-8046<br>香川県高松市川部町240番地4<br>アースA203</dd>
        </div>
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">設立</dt>
          <dd class="text-[#475569]">2026年4月15日</dd>
        </div>
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">資本金</dt>
          <dd class="text-[#475569]">100万円</dd>
        </div>
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">法人番号</dt>
          <dd class="text-[#475569] font-['Poppins']">9470001021213</dd>
        </div>
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">代表者</dt>
          <dd class="text-[#475569]">寒川 拓斗</dd>
        </div>
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">事業内容</dt>
          <dd class="text-[#475569]">Web開発・アプリ開発・システム開発・広告代理</dd>
        </div>
        <div class="flex pb-1">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">メール</dt>
          <dd class="text-[#475569] font-['Poppins']">info@aoibase.jp</dd>
        </div>
      </dl>
    </div>
  </div>
</section>


</main>

<!-- ===== BOTTOM CTA BAR ===== -->
<div class="flex">
  <a href="<?php echo home_url('/company/'); ?>" class="group flex-1 flex items-center justify-between px-4 md:px-8 py-5 md:py-7 bg-[#0F172A] hover:bg-[#0369A1] transition-all duration-200 cursor-pointer border-r border-white/10">
    <div><p class="text-[10px] md:text-xs font-bold tracking-[0.25em] text-white/50 group-hover:text-white/70 font-['Poppins']">COMPANY</p><p class="text-sm md:text-lg font-bold text-white">会社概要</p></div>
    <svg class="w-5 h-5 md:w-7 md:h-7 text-white/30 group-hover:text-white group-hover:translate-x-1 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
  <a href="<?php echo esc_url( home_url( '/achievements/' ) ); ?>" class="group flex-1 flex items-center justify-between px-4 md:px-8 py-5 md:py-7 bg-[#111D35] hover:bg-[#0369A1] transition-all duration-200 cursor-pointer border-r border-white/10">
    <div><p class="text-[10px] md:text-xs font-bold tracking-[0.25em] text-white/50 group-hover:text-white/70 font-['Poppins']">WORKS</p><p class="text-sm md:text-lg font-bold text-white">事例</p></div>
    <svg class="w-5 h-5 md:w-7 md:h-7 text-white/30 group-hover:text-white group-hover:translate-x-1 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
  <a href="<?php echo home_url('/contact/'); ?>" class="group flex-1 flex items-center justify-between px-4 md:px-8 py-5 md:py-7 bg-[#B45309] hover:bg-[#D97706] transition-all duration-200 cursor-pointer">
    <div><p class="text-[10px] md:text-xs font-bold tracking-[0.25em] text-white/70 group-hover:text-white font-['Poppins']">CONTACT</p><p class="text-sm md:text-lg font-bold text-white">お問い合わせ</p></div>
    <svg class="w-5 h-5 md:w-7 md:h-7 text-white/60 group-hover:text-white group-hover:translate-x-1 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
</div>

<!-- ===== FOOTER ===== -->
<footer class="bg-[#111D35] pt-16 pb-0">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 pb-12 border-b border-white/10">
      <div>
        <span class="text-2xl font-extrabold tracking-tight font-['Poppins']"><span class="text-white">AOi </span><span class="text-[#0369A1]">Base</span></span>
        <p class="text-sm text-white/50 leading-loose mt-5 mb-6">構想を実現へ</p>
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
    <div class="flex items-center justify-center py-5">
      <p class="text-xs text-white/20 font-['Poppins']">&copy; 2026 AOi Base Inc. All rights reserved.</p>
    </div>
  </div>
</footer>

<!-- ===== SIDE CTA ===== -->
<div class="fixed right-0 top-1/2 -translate-y-1/2 z-40 hidden lg:flex flex-col gap-2">
  <a href="<?php echo home_url('/contact/'); ?>" class="flex flex-col items-center gap-3 bg-[#0369A1] hover:bg-[#B45309] text-white px-3 py-6 transition-all duration-200 cursor-pointer shadow-xl hover:-translate-x-1 rounded-l-xl" aria-label="無料相談">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
    <span class="text-[10px] tracking-[0.2em] font-bold font-['Poppins']" style="writing-mode:vertical-rl;">CONTACT</span>
  </a>
</div>

<!-- ===== PAGE TOP ===== -->
<a href="#" id="page-top" class="fixed bottom-6 right-6 z-40 w-12 h-12 bg-[#1B2A4A] hover:bg-[#0369A1] text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-200 cursor-pointer" aria-label="ページトップへ戻る">
  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
</a>

<?php wp_footer(); ?>
</body>
</html>
