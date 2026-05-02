<?php
/**
 * Template: 運用のしやすさとは？
 * 固定ページスラッグ "operability" に自動適用
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
  <title>運用のしやすさとは？｜株式会社AOi Base</title>
  <meta name="description" content="運用しやすいシステムとは何か。保守性・拡張性の高い設計とAOi Baseの運用設計アプローチを解説します。">
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
    <h2 class="text-[clamp(4rem,12vw,9rem)] font-extrabold leading-none tracking-tight text-[#1B2A4A] opacity-[0.04] font-['Poppins']">OPERABILITY</h2>
  </div>
  <div class="relative max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">OPERABILITY</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4">運用のしやすさとは？</h1>
    <p class="text-sm md:text-base text-[#64748B] leading-relaxed max-w-2xl">システムの価値はリリース後にこそ問われます。<br class="hidden md:block">運用しやすい設計が、長期的なビジネス成長を支えます。</p>
    <nav aria-label="パンくずリスト" class="mt-6 text-xs text-[#94A3B8]">
      <ol class="inline-flex items-center gap-2 list-none p-0 m-0">
        <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a></li>
        <li aria-hidden="true">›</li>
        <li><span aria-current="page" class="text-[#475569]">運用のしやすさとは？</span></li>
      </ol>
    </nav>
  </div>
</section>

<!-- ===== SECTION 1: 運用しやすいシステムとは ===== -->
<section class="py-20 md:py-28 bg-white">
  <div class="max-w-4xl mx-auto px-6">
    <div class="mb-8">
      <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']">WHAT IS OPERABILITY</p>
      <h2 class="text-2xl md:text-3xl font-bold text-[#1B2A4A] mb-2">運用しやすいシステムとは</h2>
      <div class="w-10 h-0.5 bg-[#0369A1] mt-4 mb-8"></div>
    </div>
    <p class="text-sm md:text-base text-[#475569] leading-loose mb-10">システムは「作って終わり」ではありません。リリース後の改修・機能追加・障害対応を見据え、保守性と拡張性を最初から設計に組み込むことが重要です。運用負荷の低いシステムは、ビジネス環境の変化にも柔軟に対応できます。</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Card: 保守性 -->
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] hover:shadow-lg transition-shadow duration-200">
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <h3 class="text-base font-bold text-[#1B2A4A] mb-2">高い保守性</h3>
        <p class="text-sm text-[#475569] leading-relaxed">コードの可読性・モジュール分割・命名規則の統一により、担当者が変わっても迅速に理解・修正できる設計を目指します。</p>
      </div>

      <!-- Card: 拡張性 -->
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] hover:shadow-lg transition-shadow duration-200">
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
        </div>
        <h3 class="text-base font-bold text-[#1B2A4A] mb-2">柔軟な拡張性</h3>
        <p class="text-sm text-[#475569] leading-relaxed">新機能の追加や外部サービスとの連携を、既存機能に影響を与えず実現できるアーキテクチャを採用します。</p>
      </div>

      <!-- Card: 運用負荷 -->
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] hover:shadow-lg transition-shadow duration-200">
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3 class="text-base font-bold text-[#1B2A4A] mb-2">運用負荷の最小化</h3>
        <p class="text-sm text-[#475569] leading-relaxed">自動化・標準化された運用プロセスにより、日常的な運用タスクの負荷を軽減し、本来の業務に集中できる環境を構築します。</p>
      </div>

      <!-- Card: ドキュメント -->
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] hover:shadow-lg transition-shadow duration-200">
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        </div>
        <h3 class="text-base font-bold text-[#1B2A4A] mb-2">充実したドキュメント</h3>
        <p class="text-sm text-[#475569] leading-relaxed">設計意図・運用手順・トラブルシューティングを整備し、属人化を防止。チーム全体でシステムを運用できる体制を支援します。</p>
      </div>

      <!-- Card: テスト -->
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] hover:shadow-lg transition-shadow duration-200">
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h3 class="text-base font-bold text-[#1B2A4A] mb-2">テスト容易性</h3>
        <p class="text-sm text-[#475569] leading-relaxed">自動テストが実行しやすい構造設計により、変更時の影響範囲を素早く検証し、安心してリリースできる仕組みを実現します。</p>
      </div>

      <!-- Card: 可観測性 -->
      <div class="bg-[#F8FAFC] rounded-2xl p-6 border border-[#E2E8F0] hover:shadow-lg transition-shadow duration-200">
        <div class="w-12 h-12 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
          <svg class="w-6 h-6 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        </div>
        <h3 class="text-base font-bold text-[#1B2A4A] mb-2">可観測性（モニタリング）</h3>
        <p class="text-sm text-[#475569] leading-relaxed">システムの状態をリアルタイムで把握できる仕組みを設計段階から組み込み、障害の予兆検知と迅速な対応を可能にします。</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== SECTION 2: AOi Baseのアプローチ ===== -->
<section class="py-20 md:py-28 bg-[#F8FAFC]">
  <div class="max-w-4xl mx-auto px-6">
    <div class="mb-8">
      <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']">OUR APPROACH</p>
      <h2 class="text-2xl md:text-3xl font-bold text-[#1B2A4A] mb-2">AOi Baseの運用設計アプローチ</h2>
      <div class="w-10 h-0.5 bg-[#0369A1] mt-4 mb-8"></div>
    </div>
    <p class="text-sm md:text-base text-[#475569] leading-loose mb-12">AOi Baseでは「作って終わり」ではなく、長期運用を前提とした設計・開発・サポート体制を整えています。</p>

    <div class="space-y-8">
      <!-- Approach 1 -->
      <div class="bg-white rounded-2xl p-8 border border-[#E2E8F0] shadow-sm">
        <div class="flex items-start gap-5">
          <div class="w-14 h-14 rounded-full bg-[#0369A1] flex items-center justify-center shrink-0 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
          </div>
          <div>
            <h3 class="text-lg font-bold text-[#1B2A4A] mb-3">改修・機能追加に対応しやすい仕組み</h3>
            <p class="text-sm text-[#475569] leading-loose">疎結合なアーキテクチャ設計により、ある機能を変更しても他の機能に影響が波及しにくい構造を実現。ビジネス要件の変化に素早く追従できます。</p>
          </div>
        </div>
      </div>

      <!-- Approach 2 -->
      <div class="bg-white rounded-2xl p-8 border border-[#E2E8F0] shadow-sm">
        <div class="flex items-start gap-5">
          <div class="w-14 h-14 rounded-full bg-[#0369A1] flex items-center justify-center shrink-0 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
          </div>
          <div>
            <h3 class="text-lg font-bold text-[#1B2A4A] mb-3">一貫した体制でのサポート</h3>
            <p class="text-sm text-[#475569] leading-loose">設計・開発・運用を一貫して担当することで、システムの全体像を把握したうえでの素早い問題対応・改善提案が可能です。開発チームがそのまま運用フェーズに入るため、引き継ぎロスが発生しません。</p>
          </div>
        </div>
      </div>

      <!-- Approach 3 -->
      <div class="bg-white rounded-2xl p-8 border border-[#E2E8F0] shadow-sm">
        <div class="flex items-start gap-5">
          <div class="w-14 h-14 rounded-full bg-[#0369A1] flex items-center justify-center shrink-0 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
          </div>
          <div>
            <h3 class="text-lg font-bold text-[#1B2A4A] mb-3">モニタリング・ログ設計</h3>
            <p class="text-sm text-[#475569] leading-loose">アプリケーションログ・パフォーマンスメトリクス・エラー通知を設計段階で組み込み、障害の予兆検知と迅速なインシデント対応を実現。運用チームが「状況を把握できる」仕組みを構築します。</p>
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
    <h2 class="text-2xl md:text-3xl font-bold text-[#1B2A4A] mb-4">運用しやすいシステムを一緒に作りませんか？</h2>
    <p class="text-sm md:text-base text-[#64748B] leading-loose mb-10">既存システムの運用改善から新規開発まで、お気軽にご相談ください。<br class="hidden md:block">最適なアーキテクチャと運用体制をご提案します。</p>
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
