<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ｜株式会社AOi Base</title>
  <meta name="description" content="株式会社AOi Baseへのお問い合わせページです。Web開発・アプリ開発・システム開発に関するご相談はお気軽にどうぞ。">
  <style>
    html { scroll-behavior: smooth; }
    body { font-family: 'Noto Sans JP', 'Poppins', sans-serif; color: #0F172A; margin: 0; }
    /* CF7 form styles */
    .wpcf7 input[type="text"],
    .wpcf7 input[type="email"],
    .wpcf7 input[type="tel"],
    .wpcf7 textarea {
      width: 100%;
      padding: 14px 18px;
      border: 1px solid #CBD5E1;
      border-radius: 10px;
      font-size: 15px;
      font-family: 'Noto Sans JP', sans-serif;
      background: #F8FAFC;
      transition: border-color 0.2s, box-shadow 0.2s;
      outline: none;
      box-sizing: border-box;
    }
    .wpcf7 input[type="text"]:focus,
    .wpcf7 input[type="email"]:focus,
    .wpcf7 input[type="tel"]:focus,
    .wpcf7 textarea:focus {
      border-color: #0369A1;
      box-shadow: 0 0 0 3px rgba(3,105,161,0.1);
      background: #fff;
    }
    .wpcf7 textarea { min-height: 200px; resize: vertical; }
    .wpcf7 input[type="submit"] {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%;
      max-width: 320px;
      padding: 16px 32px;
      background: #B45309;
      color: #fff;
      font-size: 16px;
      font-weight: 700;
      font-family: 'Noto Sans JP', sans-serif;
      border: none;
      border-radius: 9999px;
      cursor: pointer;
      transition: all 0.2s;
      box-shadow: 0 4px 14px rgba(180,83,9,0.3);
    }
    .wpcf7 input[type="submit"]:hover {
      background: #D97706;
      box-shadow: 0 6px 20px rgba(180,83,9,0.4);
      transform: translateY(-2px);
    }
    .cf7-field { margin-bottom: 24px; }
    .cf7-field label {
      display: block;
      font-size: 14px;
      font-weight: 600;
      color: #1B2A4A;
      margin-bottom: 8px;
    }
    .cf7-field .required { color: #DC2626; font-size: 12px; }
    .wpcf7-response-output {
      margin-top: 24px !important;
      padding: 16px 20px !important;
      border-radius: 10px !important;
      font-size: 14px !important;
    }
    .wpcf7-not-valid-tip {
      color: #DC2626;
      font-size: 13px;
      margin-top: 6px;
    }
    .aoibase-fade-in { opacity: 0; transform: translateY(16px); transition: opacity 600ms cubic-bezier(0.22, 1, 0.36, 1), transform 600ms cubic-bezier(0.22, 1, 0.36, 1); }
    .aoibase-fade-in-visible { opacity: 1; transform: translateY(0); }
    @media (prefers-reduced-motion: reduce) { .aoibase-fade-in { opacity: 1; transform: none; transition: none; } }
  </style>
  <?php wp_head(); ?>
</head>
<body>

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
      <a href="<?php echo esc_url(home_url('/company/')); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">企業情報</a>
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

<!-- ===== PAGE HEADER ===== -->
<section class="pt-32 pb-16 bg-gradient-to-b from-[#F0F7FF] to-white">
  <div class="max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">CONTACT</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4">お問い合わせ</h1>
    <p class="text-sm text-[#64748B] leading-relaxed max-w-2xl">課題・要件が固まっていなくても大丈夫です。<br>どんな小さなご質問も、専門チームが誠実にお答えします。</p>
    <nav class="mt-6 text-xs text-[#94A3B8]">
      <a href="<?php echo home_url('/'); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a>
      <span class="mx-2">›</span>
      <span class="text-[#475569]">お問い合わせ</span>
    </nav>
  </div>
</section>

<!-- ===== FORM SECTION ===== -->
<section class="py-20 bg-white">
  <div class="max-w-2xl mx-auto px-6">
    <div class="bg-white rounded-2xl shadow-xl border border-[#E2E8F0]/60 p-8 md:p-12">
      <div class="mb-10">
        <h2 class="text-xl font-bold text-[#1B2A4A] mb-3 text-center">お問合せフォーム</h2>
        <p class="text-sm text-[#64748B] leading-relaxed text-center"><span class="text-[#DC2626]">*</span> は必須項目です。通常1〜2営業日以内にご返信いたします。</p>
      </div>
      <?php echo do_shortcode('[contact-form-7 id="67ac0b8" title="コンタクトフォーム 1"]'); ?>
    </div>
  </div>
</section>

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
    <div class="flex flex-row flex-wrap items-center justify-center gap-4 py-5">
      <p class="text-xs text-white/20 font-['Poppins']">&copy; 2026 AOi Base Inc. All rights reserved.</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
