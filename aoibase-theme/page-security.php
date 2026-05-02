<?php
/**
 * Template: セキュリティリスクとは？
 * 固定ページスラッグ "security" に自動適用
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
  <title>セキュリティリスクとは？｜株式会社AOi Base</title>
  <meta name="description" content="Web・アプリ・システム開発におけるセキュリティリスクとは何か。AOi Baseのセキュリティ対策アプローチを解説します。">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    html { scroll-behavior: smooth; }
    body { font-family: 'Noto Sans JP', 'Poppins', sans-serif; color: #0F172A; margin: 0; }
    #site-nav.scrolled { box-shadow: 0 2px 20px rgba(15,23,42,0.08); }
    .aoibase-fade-in { opacity: 0; transform: translateY(16px); transition: opacity 600ms cubic-bezier(0.22, 1, 0.36, 1), transform 600ms cubic-bezier(0.22, 1, 0.36, 1); }
    .aoibase-fade-in-visible { opacity: 1; transform: translateY(0); }
    @media (prefers-reduced-motion: reduce) { .aoibase-fade-in { opacity: 1; transform: none; transition: none; } }
  </style>
  <?php wp_head(); ?>
</head>
<body class="bg-white">

<a href="#main-content" class="skip-link" style="position:absolute;top:-40px;left:0;background:#0369A1;color:#fff;padding:8px 16px;z-index:100;text-decoration:none;font-size:14px;font-weight:600;">本文へスキップ</a>

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

<main id="main-content">

<!-- ===== PAGE HEADER ===== -->
<section class="relative pt-32 pb-16 bg-gradient-to-b from-[#F0F7FF] to-white overflow-hidden">
  <div class="absolute inset-x-0 top-20 pointer-events-none select-none text-center">
    <h2 class="text-[clamp(4rem,12vw,9rem)] font-extrabold leading-none tracking-tight text-[#1B2A4A] opacity-[0.04] font-['Poppins']">SECURITY</h2>
  </div>
  <div class="relative max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">SECURITY</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4">セキュリティリスクとは？</h1>
    <p class="text-sm md:text-base text-[#64748B] leading-relaxed max-w-2xl">Web・アプリ・システム開発で見落とされがちなセキュリティリスク。<br class="hidden md:block">その本質と、AOi Baseが実践する対策アプローチを解説します。</p>
    <nav aria-label="パンくずリスト" class="mt-6 text-xs text-[#94A3B8]">
      <ol class="inline-flex items-center gap-2 list-none p-0 m-0">
        <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a></li>
        <li aria-hidden="true">›</li>
        <li><span aria-current="page" class="text-[#475569]">セキュリティリスクとは？</span></li>
      </ol>
    </nav>
  </div>
</section>

<!-- ===== SECTION 1: セキュリティリスクとは ===== -->
<section class="py-20 md:py-28 bg-white">
  <div class="max-w-4xl mx-auto px-6">
    <div class="mb-8">
      <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']">WHAT IS SECURITY RISK</p>
      <h2 class="text-2xl md:text-3xl font-bold text-[#1B2A4A] mb-2">セキュリティリスクとは何か</h2>
      <div class="w-10 h-0.5 bg-[#0369A1] mt-4 mb-8"></div>
    </div>
    <p class="text-sm md:text-base text-[#475569] leading-loose mb-10">Webアプリケーションやシステムには、設計・実装の段階で混入する脆弱性が存在します。これらは外部からの攻撃や情報漏洩の原因となり、事業継続に深刻な影響を与えます。開発段階からセキュリティを意識することで、リスクを最小化できます。</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Card: SQLインジェクション -->
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] hover:shadow-lg transition-shadow duration-200">
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
        </div>
        <h3 class="text-base font-bold text-[#1B2A4A] mb-2">SQLインジェクション</h3>
        <p class="text-sm text-[#475569] leading-relaxed">不正なSQL文を注入し、データベースの情報を窃取・改ざんする攻撃。入力値の検証不備が原因で発生します。</p>
      </div>

      <!-- Card: XSS -->
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] hover:shadow-lg transition-shadow duration-200">
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
        </div>
        <h3 class="text-base font-bold text-[#1B2A4A] mb-2">クロスサイトスクリプティング（XSS）</h3>
        <p class="text-sm text-[#475569] leading-relaxed">悪意あるスクリプトをWebページに埋め込み、ユーザーのセッション情報や個人データを盗み取る攻撃手法です。</p>
      </div>

      <!-- Card: 認証不備 -->
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] hover:shadow-lg transition-shadow duration-200">
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
        </div>
        <h3 class="text-base font-bold text-[#1B2A4A] mb-2">認証・認可の不備</h3>
        <p class="text-sm text-[#475569] leading-relaxed">パスワード管理の甘さやセッション管理の不備により、不正アクセスやアカウント乗っ取りが発生するリスクです。</p>
      </div>

      <!-- Card: CSRF -->
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] hover:shadow-lg transition-shadow duration-200">
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
        </div>
        <h3 class="text-base font-bold text-[#1B2A4A] mb-2">CSRF（リクエスト強要）</h3>
        <p class="text-sm text-[#475569] leading-relaxed">ユーザーの意図しないリクエストを送信させ、設定変更や送金などの操作を不正に実行させる攻撃です。</p>
      </div>

      <!-- Card: 情報漏洩 -->
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] hover:shadow-lg transition-shadow duration-200">
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <h3 class="text-base font-bold text-[#1B2A4A] mb-2">機密情報の漏洩</h3>
        <p class="text-sm text-[#475569] leading-relaxed">エラーメッセージやログに含まれるシステム情報、不適切なアクセス制御により内部情報が外部に露出するリスクです。</p>
      </div>

      <!-- Card: 依存パッケージ -->
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] hover:shadow-lg transition-shadow duration-200">
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
        </div>
        <h3 class="text-base font-bold text-[#1B2A4A] mb-2">依存パッケージの脆弱性</h3>
        <p class="text-sm text-[#475569] leading-relaxed">利用しているライブラリやフレームワークに含まれる既知の脆弱性が、システム全体のリスクとなります。</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== SECTION 2: AOi Baseのアプローチ ===== -->
<section class="py-20 md:py-28 bg-[#F8FAFC]">
  <div class="max-w-4xl mx-auto px-6">
    <div class="mb-8">
      <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']">OUR APPROACH</p>
      <h2 class="text-2xl md:text-3xl font-bold text-[#1B2A4A] mb-2">AOi Baseのセキュリティ対策アプローチ</h2>
      <div class="w-10 h-0.5 bg-[#0369A1] mt-4 mb-8"></div>
    </div>
    <p class="text-sm md:text-base text-[#475569] leading-loose mb-12">AOi Baseでは「後付けのセキュリティ」ではなく、設計段階からセキュリティを組み込む開発プロセスを徹底しています。</p>

    <div class="space-y-8">
      <!-- Approach 1 -->
      <div class="bg-white rounded-2xl p-8 border border-[#E2E8F0] shadow-sm">
        <div class="flex items-start gap-5">
          <div class="w-14 h-14 rounded-full bg-[#0369A1] flex items-center justify-center shrink-0 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
          </div>
          <div>
            <h3 class="text-lg font-bold text-[#1B2A4A] mb-3">設計段階からのセキュリティ組み込み</h3>
            <p class="text-sm text-[#475569] leading-loose">要件定義・設計フェーズでセキュリティ要件を定義し、脅威モデリングを実施。開発後に対処するのではなく、アーキテクチャレベルでリスクを排除します。</p>
          </div>
        </div>
      </div>

      <!-- Approach 2 -->
      <div class="bg-white rounded-2xl p-8 border border-[#E2E8F0] shadow-sm">
        <div class="flex items-start gap-5">
          <div class="w-14 h-14 rounded-full bg-[#0369A1] flex items-center justify-center shrink-0 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
          </div>
          <div>
            <h3 class="text-lg font-bold text-[#1B2A4A] mb-3">脆弱性対策・認証設計・データ保護</h3>
            <p class="text-sm text-[#475569] leading-loose">入力検証・出力エスケープ・パラメータバインディングなどの基本対策を徹底。認証・認可設計ではセッション管理やアクセス制御を厳密に実装し、データは暗号化と適切なアクセス制御で保護します。</p>
          </div>
        </div>
      </div>

      <!-- Approach 3 -->
      <div class="bg-white rounded-2xl p-8 border border-[#E2E8F0] shadow-sm">
        <div class="flex items-start gap-5">
          <div class="w-14 h-14 rounded-full bg-[#0369A1] flex items-center justify-center shrink-0 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
          </div>
          <div>
            <h3 class="text-lg font-bold text-[#1B2A4A] mb-3">コードレビュー・テストによる品質担保</h3>
            <p class="text-sm text-[#475569] leading-loose">全てのコードはセキュリティ観点を含むレビューを通過。自動テストによる脆弱性検知、依存パッケージの定期監査を実施し、リリース前の品質を担保します。</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== CTA SECTION ===== -->
<section class="py-20 bg-white">
  <div class="max-w-3xl mx-auto px-6 text-center">
    <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-3 font-['Poppins']">CONTACT US</p>
    <h2 class="text-2xl md:text-3xl font-bold text-[#1B2A4A] mb-4">セキュリティに不安はありませんか？</h2>
    <p class="text-sm md:text-base text-[#64748B] leading-loose mb-10">セキュリティ対策についてのご相談はお気軽にどうぞ。<br class="hidden md:block">現状の課題整理から、具体的な対策提案まで対応します。</p>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="inline-flex items-center gap-2 bg-[#B45309] hover:bg-[#D97706] text-white text-sm font-bold px-10 py-4 rounded-full transition-all duration-200 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
      お問い合わせはこちら
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
    </a>
  </div>
</section>

</main>

<!-- ===== BOTTOM CTA BAR ===== -->
<div class="grid grid-cols-1 md:grid-cols-3">
  <a href="<?php echo esc_url(home_url('/company/')); ?>" class="group flex items-center justify-between px-8 py-7 bg-[#0F172A] hover:bg-[#0369A1] transition-all duration-200 cursor-pointer border-b md:border-b-0 md:border-r border-white/10">
    <div><p class="text-xs font-bold tracking-[0.25em] text-white/50 group-hover:text-white/70 font-['Poppins']">COMPANY</p><p class="text-lg font-bold text-white">会社概要</p></div>
    <svg class="w-7 h-7 text-white/30 group-hover:text-white group-hover:translate-x-1 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
  <a href="<?php echo esc_url(home_url('/achievements/')); ?>" class="group flex items-center justify-between px-8 py-7 bg-[#111D35] hover:bg-[#0369A1] transition-all duration-200 cursor-pointer border-b md:border-b-0 md:border-r border-white/10">
    <div><p class="text-xs font-bold tracking-[0.25em] text-white/50 group-hover:text-white/70 font-['Poppins']">WORKS</p><p class="text-lg font-bold text-white">事例</p></div>
    <svg class="w-7 h-7 text-white/30 group-hover:text-white group-hover:translate-x-1 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
  <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="group flex items-center justify-between px-8 py-7 bg-[#B45309] hover:bg-[#D97706] transition-all duration-200 cursor-pointer">
    <div><p class="text-xs font-bold tracking-[0.25em] text-white/70 group-hover:text-white font-['Poppins']">CONTACT</p><p class="text-lg font-bold text-white">お問い合わせ</p></div>
    <svg class="w-7 h-7 text-white/60 group-hover:text-white group-hover:translate-x-1 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
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
<div class="fixed right-0 top-1/2 -translate-y-1/2 z-40 hidden lg:flex flex-col gap-2" id="side-cta">
  <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="flex flex-col items-center gap-3 bg-[#0369A1] hover:bg-[#B45309] text-white px-3 py-6 transition-all duration-200 cursor-pointer shadow-xl hover:-translate-x-1 rounded-l-xl" aria-label="無料相談">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
    <span class="text-[10px] tracking-[0.2em] font-bold font-['Poppins']" style="writing-mode:vertical-rl;">CONTACT</span>
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
