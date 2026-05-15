<?php
/**
 * Template: 開発の流れ
 * 固定ページスラッグ "flow" に自動適用
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
  <title>開発の流れ｜株式会社AOi Base</title>
  <meta name="description" content="AOi Baseの開発プロセスをご紹介。ヒアリングから要件定義・設計、開発・実装、テスト・納品、運用・保守まで一貫してサポートします。">
  <style>
    html { scroll-behavior: smooth; }
    body { font-family: 'Noto Sans JP', 'Poppins', sans-serif; color: #0F172A; margin: 0; }
    #site-nav.scrolled { box-shadow: 0 2px 20px rgba(15,23,42,0.08); }
    .flow-step-line {
      position: absolute;
      left: 50%;
      top: 0;
      bottom: 0;
      width: 2px;
      background: linear-gradient(to bottom, #BFDBFE, #0369A1, #CA8A04);
      transform: translateX(-50%);
    }
    @media (max-width: 768px) {
      .flow-step-line { left: 24px; }
    }
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
    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center cursor-pointer group" aria-label="AOi Base トップページ">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-aoi.png" alt="AOi Base" class="h-5 md:h-12 w-auto" loading="eager" decoding="async">
    </a>
    <nav class="hidden lg:flex items-center gap-6 xl:gap-8">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">TOP</a>
      <a href="<?php echo esc_url(home_url('/news/')); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0F172A] hover:text-[#0369A1] transition-colors duration-200 uppercase cursor-pointer" style="font-weight:600;">NEWS</a>
      <a href="<?php echo esc_url(home_url('/flow/')); ?>" class="font-['Poppins'] text-xs tracking-widest text-[#0369A1] cursor-pointer" style="font-weight:600;" aria-current="page">開発の流れ</a>
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
<section class="relative pt-32 pb-16 bg-white border-b border-[#E2E8F0] overflow-hidden">
  <div class="absolute inset-x-0 top-20 pointer-events-none select-none text-center">
    <h2 class="text-[clamp(4rem,12vw,9rem)] font-extrabold leading-none tracking-tight text-[#1B2A4A] opacity-[0.04] font-['Poppins']">FLOW</h2>
  </div>
  <div class="relative max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">FLOW</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4">開発の流れ</h1>
    <p class="text-sm md:text-base text-[#64748B] leading-relaxed max-w-2xl">ヒアリングから運用・保守まで、一貫した開発プロセスで<br class="hidden md:block">プロジェクトの成功をサポートします。</p>
    <nav aria-label="パンくずリスト" class="mt-6 text-xs text-[#94A3B8]">
      <ol class="inline-flex items-center gap-2 list-none p-0 m-0">
        <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a></li>
        <li aria-hidden="true">›</li>
        <li><span aria-current="page" class="text-[#475569]">開発の流れ</span></li>
      </ol>
    </nav>
  </div>
</section>

<!-- ===== FLOW STEPS ===== -->
<section class="py-20 md:py-28 bg-white">
  <div class="max-w-4xl mx-auto px-6">

    <!-- Step 01 -->
    <div class="relative grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-6 md:gap-12 mb-20">
      <div class="md:text-right">
        <span class="inline-block font-['Poppins'] text-5xl md:text-6xl font-extrabold text-[#BFDBFE] leading-none select-none mb-2">01</span>
        <h3 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-4">ヒアリング</h3>
        <p class="text-sm text-[#475569] leading-loose">課題や目的を明確化するため、現状の業務フローやボトルネック、数値目標、ユーザー属性など、丁寧にお伺いいたします。既存システムについては運用状況について、使用ツール構成やデータの流れ、分断箇所、権限管理などの課題を整理いたします。ヒヤリングはもちろんオンラインにも対応し、画面共有などを通じて実運用ベースで把握いたします。</p>
      </div>
      <div class="hidden md:flex flex-col items-center">
        <div class="w-14 h-14 rounded-full bg-[#0369A1] flex items-center justify-center shrink-0 shadow-lg">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.953 9.953 0 01-4.814-1.229L3 20l1.229-4.186A8.955 8.955 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        </div>
        <div class="w-0.5 flex-1 bg-gradient-to-b from-[#0369A1] to-[#BFDBFE] mt-3"></div>
      </div>
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0]">
        <div class="mb-4">
          <p class="text-xs font-bold text-[#0369A1] tracking-wider font-['Poppins'] mb-2">お客様</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <li>現状の課題や理想の姿を共有</li>
            <li>既存資料・参考サイトの提供</li>
          </ul>
        </div>
        <div>
          <p class="text-xs font-bold text-[#CA8A04] tracking-wider font-['Poppins'] mb-2">AOi Base</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <li>要望の深掘り・実現に向けての整理</li>
            <li>概算スケジュール・予算感のご提示</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Step 02 -->
    <div class="relative grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-6 md:gap-12 mb-20">
      <div class="md:text-right md:order-3">
        <span class="inline-block font-['Poppins'] text-5xl md:text-6xl font-extrabold text-[#BFDBFE] leading-none select-none mb-2">02</span>
        <h3 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-4">要件定義・設計</h3>
        <p class="text-sm text-[#475569] leading-loose">ヒアリング内容をもとに、画面設計・システム構成・技術選定を行います。ワイヤーフレームや要件定義書をご提示し、認識のズレがないよう確認します。</p>
      </div>
      <div class="hidden md:flex flex-col items-center md:order-2">
        <div class="w-14 h-14 rounded-full bg-[#0369A1] flex items-center justify-center shrink-0 shadow-lg">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        </div>
        <div class="w-0.5 flex-1 bg-gradient-to-b from-[#BFDBFE] to-[#0369A1] mt-3"></div>
      </div>
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] md:order-1">
        <div class="mb-4">
          <p class="text-xs font-bold text-[#0369A1] tracking-wider font-['Poppins'] mb-2">お客様</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <li>設計内容のレビュー・フィードバック</li>
            <li>優先順位の確定</li>
          </ul>
        </div>
        <div>
          <p class="text-xs font-bold text-[#CA8A04] tracking-wider font-['Poppins'] mb-2">AOi Base</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <li>ワイヤーフレーム・要件定義書作成</li>
            <li>技術選定・スケジュール策定</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Step 03 -->
    <div class="relative grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-6 md:gap-12 mb-20">
      <div class="md:text-right">
        <span class="inline-block font-['Poppins'] text-5xl md:text-6xl font-extrabold text-[#BFDBFE] leading-none select-none mb-2">03</span>
        <h3 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-4">開発・実装</h3>
        <p class="text-sm text-[#475569] leading-loose">開発開始後、定期的に進捗を共有し、方向性のズレを早期に解消します。品質を担保するコードレビュー・テストを徹底。</p>
      </div>
      <div class="hidden md:flex flex-col items-center">
        <div class="w-14 h-14 rounded-full bg-[#0369A1] flex items-center justify-center shrink-0 shadow-lg">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
        </div>
        <div class="w-0.5 flex-1 bg-gradient-to-b from-[#0369A1] to-[#BFDBFE] mt-3"></div>
      </div>
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0]">
        <div class="mb-4">
          <p class="text-xs font-bold text-[#0369A1] tracking-wider font-['Poppins'] mb-2">お客様</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <li>定期ミーティングでの進捗確認</li>
            <li>中間成果物へのフィードバック</li>
          </ul>
        </div>
        <div>
          <p class="text-xs font-bold text-[#CA8A04] tracking-wider font-['Poppins'] mb-2">AOi Base</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <li>設計に基づく実装・コードレビュー</li>
            <li>自動テスト・品質管理</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Step 04 -->
    <div class="relative grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-6 md:gap-12 mb-20">
      <div class="md:text-right md:order-3">
        <span class="inline-block font-['Poppins'] text-5xl md:text-6xl font-extrabold text-[#BFDBFE] leading-none select-none mb-2">04</span>
        <h3 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-4">テスト・デプロイ</h3>
        <p class="text-sm text-[#475569] leading-loose">機能テスト・パフォーマンステスト・セキュリティチェックを実施。お客様による受入テストを経て、本番環境へデプロイします。</p>
      </div>
      <div class="hidden md:flex flex-col items-center md:order-2">
        <div class="w-14 h-14 rounded-full bg-[#0369A1] flex items-center justify-center shrink-0 shadow-lg">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div class="w-0.5 flex-1 bg-gradient-to-b from-[#BFDBFE] to-[#CA8A04] mt-3"></div>
      </div>
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] md:order-1">
        <div class="mb-4">
          <p class="text-xs font-bold text-[#0369A1] tracking-wider font-['Poppins'] mb-2">お客様</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <li>受入テスト・最終確認</li>
            <li>公開タイミングの決定</li>
          </ul>
        </div>
        <div>
          <p class="text-xs font-bold text-[#CA8A04] tracking-wider font-['Poppins'] mb-2">AOi Base</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <li>品質検証・セキュリティチェック</li>
            <li>デバッグ・デプロイ</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Step 05 -->
    <div class="relative grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-6 md:gap-12">
      <div class="md:text-right">
        <span class="inline-block font-['Poppins'] text-5xl md:text-6xl font-extrabold text-[#FEF9C3] leading-none select-none mb-2">05</span>
        <h3 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-4">運用・保守</h3>
        <p class="text-sm text-[#475569] leading-loose">リリース後も継続的にサポート。障害対応・機能追加・パフォーマンス改善など、長期的な伴走体制を構築します。</p>
      </div>
      <div class="hidden md:flex flex-col items-center">
        <div class="w-14 h-14 rounded-full bg-[#CA8A04] flex items-center justify-center shrink-0 shadow-lg">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        </div>
      </div>
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0]">
        <div class="mb-4">
          <p class="text-xs font-bold text-[#0369A1] tracking-wider font-['Poppins'] mb-2">お客様</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <li>運用中の課題・改善要望のフィードバック</li>
            <li>新機能のリクエスト</li>
          </ul>
        </div>
        <div>
          <p class="text-xs font-bold text-[#CA8A04] tracking-wider font-['Poppins'] mb-2">AOi Base</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <li>監視・障害対応・定期メンテナンス</li>
            <li>機能改善・パフォーマンスチューニング</li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</section>

</main>

<!-- ===== BOTTOM CTA BAR ===== -->
<div class="flex flex-wrap">
  <a href="<?php echo esc_url(home_url('/company/')); ?>" class="group flex flex-1 min-w-0 items-center justify-between px-4 sm:px-8 py-5 sm:py-7 bg-[#0F172A] hover:bg-[#0369A1] transition-all duration-200 cursor-pointer border-r border-white/10">
    <div><p class="text-[9px] sm:text-xs font-bold tracking-[0.25em] text-white/50 group-hover:text-white/70 font-['Poppins']">COMPANY</p><p class="text-xs sm:text-lg font-bold text-white">会社概要</p></div>
    <svg class="w-5 h-5 sm:w-7 sm:h-7 text-white/30 group-hover:text-white group-hover:translate-x-1 transition-all duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
  <a href="<?php echo esc_url(home_url('/achievements/')); ?>" class="group flex flex-1 min-w-0 items-center justify-between px-4 sm:px-8 py-5 sm:py-7 bg-[#111D35] hover:bg-[#0369A1] transition-all duration-200 cursor-pointer border-r border-white/10">
    <div><p class="text-[9px] sm:text-xs font-bold tracking-[0.25em] text-white/50 group-hover:text-white/70 font-['Poppins']">WORKS</p><p class="text-xs sm:text-lg font-bold text-white">事例</p></div>
    <svg class="w-5 h-5 sm:w-7 sm:h-7 text-white/30 group-hover:text-white group-hover:translate-x-1 transition-all duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
  </a>
  <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="group flex flex-1 min-w-0 items-center justify-between px-4 sm:px-8 py-5 sm:py-7 bg-[#B45309] hover:bg-[#D97706] transition-all duration-200 cursor-pointer">
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
    <div class="flex flex-row items-center justify-center gap-4 py-5">
      <p class="text-xs text-white/20 font-['Poppins']">&copy; 2026 AOi Base Inc. All rights reserved.</p>
    </div>
  </div>
</footer>

<!-- ===== SIDE CTA ===== -->
<div class="fixed right-0 top-1/2 -translate-y-1/2 z-40 hidden md:flex flex-col gap-0.5" id="side-cta">
  <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="flex flex-col items-center gap-3 bg-[#0369A1] hover:bg-[#B45309] text-white px-3 py-6 transition-all duration-200 cursor-pointer shadow-xl hover:-translate-x-1 rounded-l-xl" aria-label="無料相談">
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
