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
    @media (max-width: 767px) { .risk-grid { grid-template-columns: 1fr !important; } }
  </style>
  <?php wp_head(); ?>
</head>
<body class="bg-white">

<a href="#main-content" style="position:absolute;top:-40px;left:0;background:#0369A1;color:#fff;padding:8px 16px;z-index:100;text-decoration:none;font-size:14px;font-weight:600;">本文へスキップ</a>

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
<section style="background:#0F172A;padding:0;overflow:hidden;position:relative;padding-top:80px;min-height:340px;display:flex;align-items:center;">
  <!-- 背景デコレーション -->
  <div style="position:absolute;top:-60px;right:-60px;width:480px;height:480px;background:radial-gradient(circle,rgba(3,105,161,0.18) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;bottom:-40px;left:10%;width:300px;height:300px;background:radial-gradient(circle,rgba(202,138,4,0.08) 0%,transparent 70%);pointer-events:none;"></div>
  <!-- 大型背景テキスト -->
  <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none;user-select:none;overflow:hidden;">
    <span style="font-family:'Poppins',sans-serif;font-size:clamp(80px,14vw,160px);font-weight:800;color:transparent;-webkit-text-stroke:1px rgba(255,255,255,0.05);letter-spacing:-4px;white-space:nowrap;">SECURITY</span>
  </div>
  <div style="position:relative;z-index:1;max-width:1280px;margin:0 auto;padding:80px 40px 80px;">
    <!-- パンくず -->
    <nav aria-label="パンくずリスト" style="margin-bottom:24px;">
      <ol style="display:inline-flex;align-items:center;gap:8px;list-style:none;padding:0;margin:0;">
        <li><a href="<?php echo esc_url(home_url('/')); ?>" style="font-family:'Poppins',sans-serif;font-size:11px;color:rgba(255,255,255,0.4);text-decoration:none;letter-spacing:0.1em;" onmouseover="this.style.color='rgba(255,255,255,0.8)'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">TOP</a></li>
        <li style="font-size:11px;color:rgba(255,255,255,0.2);">›</li>
        <li><span aria-current="page" style="font-family:'Poppins',sans-serif;font-size:11px;color:rgba(255,255,255,0.5);letter-spacing:0.1em;">SECURITY</span></li>
      </ol>
    </nav>
    <!-- ラベル -->
    <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(3,105,161,0.2);border:1px solid rgba(3,105,161,0.4);border-radius:100px;padding:5px 16px;margin-bottom:24px;">
      <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:600;color:#3B82F6;letter-spacing:0.15em;">SECURITY RISKS & SOLUTIONS</span>
    </div>
    <h1 style="font-family:'Noto Sans JP',sans-serif;font-size:clamp(26px,4vw,48px);font-weight:700;color:#fff;line-height:1.4;margin:0 0 20px;">セキュリティリスクとは？</h1>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:rgba(255,255,255,0.6);line-height:1.9;margin:0;max-width:600px;">Web・アプリ・システム開発で見落とされがちなセキュリティリスク。<br>その本質と、AOi Baseが実践する対策アプローチを解説します。</p>
  </div>
</section>

<!-- ===== DIVIDER ===== -->
<div style="height:1px;background:linear-gradient(90deg,transparent,#0369A1,#CA8A04,#0369A1,transparent);"></div>

<!-- ===== SECTION 1: セキュリティリスクとは ===== -->
<section style="background:#fff;padding:120px 0 100px;overflow:hidden;">
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <!-- セクションヘッダー -->
    <div style="margin-bottom:64px;">
      <div style="margin-bottom:12px;">
        <span style="font-family:'Poppins',sans-serif;font-size:clamp(56px,8vw,100px);font-weight:800;color:#F1F5F9;line-height:1;letter-spacing:-2px;user-select:none;">RISKS</span>
      </div>
      <div style="display:flex;align-items:center;gap:20px;margin-top:-16px;position:relative;z-index:1;">
        <div style="width:40px;height:3px;background:#0369A1;"></div>
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">中小企業が直面するセキュリティリスク</span>
      </div>
    </div>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;">Webアプリケーションやシステムには、設計・実装の段階で混入する脆弱性が存在します。これらは外部からの攻撃や情報漏洩の原因となり、事業継続に深刻な影響を与えます。開発段階からセキュリティを意識することで、リスクを最小化できます。</p>

    <!-- リスクカード -->
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;" class="risk-grid">

      <!-- Card: SQLインジェクション -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#FFF1F2;border:1px solid #FECDD3;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#BE123C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">SQL INJECTION</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;">SQLインジェクション</h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;">不正なSQL文を注入し、データベースの情報を窃取・改ざんする攻撃。入力値の検証不備が原因で発生します。</p>
      </div>

      <!-- Card: XSS -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#FEFCE8;border:1px solid #FDE68A;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#B45309" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">XSS</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;">クロスサイトスクリプティング</h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;">悪意あるスクリプトをWebページに埋め込み、ユーザーのセッション情報や個人データを盗み取る攻撃手法です。</p>
      </div>

      <!-- Card: 認証不備 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#EFF6FF;border:1px solid #BFDBFE;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">AUTH FAILURE</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;">認証・認可の不備</h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;">パスワード管理の甘さやセッション管理の不備により、不正アクセスやアカウント乗っ取りが発生するリスクです。</p>
      </div>

      <!-- Card: CSRF -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F5F3FF;border:1px solid #DDD6FE;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6D28D9" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">CSRF</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;">CSRF（リクエスト強要）</h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;">ユーザーの意図しないリクエストを送信させ、設定変更や送金などの操作を不正に実行させる攻撃です。</p>
      </div>

      <!-- Card: 情報漏洩 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F0FDF4;border:1px solid #BBF7D0;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#15803D" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">DATA LEAK</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;">機密情報の漏洩</h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;">エラーメッセージやログに含まれるシステム情報、不適切なアクセス制御により内部情報が外部に露出するリスクです。</p>
      </div>

      <!-- Card: 依存パッケージ -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F0F9FF;border:1px solid #BAE6FD;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">DEPENDENCY</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;">依存パッケージの脆弱性</h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;">利用しているライブラリやフレームワークに含まれる既知の脆弱性が、システム全体のリスクとなります。</p>
      </div>

    </div>
  </div>
</section>

<!-- ===== SECTION 2: AOi Baseのアプローチ ===== -->
<section style="background:#F8FAFC;padding:120px 0 100px;overflow:hidden;">
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <!-- セクションヘッダー -->
    <div style="margin-bottom:64px;">
      <div style="margin-bottom:12px;">
        <span style="font-family:'Poppins',sans-serif;font-size:clamp(56px,8vw,100px);font-weight:800;color:#EEF2FF;line-height:1;letter-spacing:-2px;user-select:none;">APPROACH</span>
      </div>
      <div style="display:flex;align-items:center;gap:20px;margin-top:-16px;position:relative;z-index:1;">
        <div style="width:40px;height:3px;background:#0369A1;"></div>
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">AOi Baseのセキュリティ対策アプローチ</span>
      </div>
    </div>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;">AOi Baseでは「後付けのセキュリティ」ではなく、設計段階からセキュリティを組み込む開発プロセスを徹底しています。</p>

    <!-- アプローチステップ -->
    <div style="display:grid;grid-template-columns:1fr;gap:24px;max-width:900px;">

      <!-- Step 1 -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:36px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:28px;">
        <div style="flex-shrink:0;display:flex;flex-direction:column;align-items:center;gap:12px;">
          <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;">01</span>
          <div style="width:56px;height:56px;border-radius:50%;background:#0369A1;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(3,105,161,0.25);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;">設計段階からのセキュリティ組み込み</h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;">要件定義・設計フェーズでセキュリティ要件を定義し、脅威モデリングを実施。開発後に対処するのではなく、アーキテクチャレベルでリスクを排除します。</p>
        </div>
      </div>

      <!-- Step 2 -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:36px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:28px;">
        <div style="flex-shrink:0;display:flex;flex-direction:column;align-items:center;gap:12px;">
          <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;">02</span>
          <div style="width:56px;height:56px;border-radius:50%;background:#0369A1;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(3,105,161,0.25);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
          </div>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;">脆弱性対策・認証設計・データ保護</h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;">入力検証・出力エスケープ・パラメータバインディングなどの基本対策を徹底。認証・認可設計ではセッション管理やアクセス制御を厳密に実装し、データは暗号化と適切なアクセス制御で保護します。</p>
        </div>
      </div>

      <!-- Step 3 -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:36px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:28px;">
        <div style="flex-shrink:0;display:flex;flex-direction:column;align-items:center;gap:12px;">
          <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;">03</span>
          <div style="width:56px;height:56px;border-radius:50%;background:#0369A1;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(3,105,161,0.25);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;">コードレビュー・テストによる品質担保</h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;">全てのコードはセキュリティ観点を含むレビューを通過。自動テストによる脆弱性検知、依存パッケージの定期監査を実施し、リリース前の品質を担保します。</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== CTA SECTION ===== -->
<section style="background:#0F172A;padding:100px 0;overflow:hidden;position:relative;">
  <!-- 背景デコレーション -->
  <div style="position:absolute;top:-80px;right:-80px;width:400px;height:400px;background:radial-gradient(circle,rgba(3,105,161,0.15) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;bottom:-60px;left:5%;width:320px;height:320px;background:radial-gradient(circle,rgba(202,138,4,0.08) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:relative;z-index:1;max-width:800px;margin:0 auto;padding:0 40px;text-align:center;">
    <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(3,105,161,0.15);border:1px solid rgba(3,105,161,0.3);border-radius:100px;padding:5px 16px;margin-bottom:28px;">
      <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:600;color:#3B82F6;letter-spacing:0.15em;">CONTACT US</span>
    </div>
    <h2 style="font-family:'Noto Sans JP',sans-serif;font-size:clamp(22px,3.5vw,36px);font-weight:700;color:#fff;line-height:1.6;margin:0 0 20px;">セキュリティに不安はありませんか？</h2>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:rgba(255,255,255,0.6);line-height:1.9;margin:0 0 44px;">セキュリティ対策についてのご相談はお気軽にどうぞ。<br>現状の課題整理から、具体的な対策提案まで対応します。</p>
    <div style="display:flex;flex-wrap:wrap;gap:16px;justify-content:center;">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" style="display:inline-flex;align-items:center;gap:10px;background:#B45309;color:#fff;font-family:'Noto Sans JP',sans-serif;font-size:15px;font-weight:700;padding:16px 40px;border-radius:100px;text-decoration:none;transition:all 200ms;box-shadow:0 8px 24px rgba(180,83,9,0.35);" onmouseover="this.style.background='#D97706';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#B45309';this.style.transform='translateY(0)'">
        お問い合わせはこちら
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
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
    <div class="flex flex-col md:flex-row items-center justify-between gap-4 py-5">
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

<script>
// NAV scroll shadow
const nav = document.getElementById('site-nav');
window.addEventListener('scroll', () => {
  nav.classList.toggle('scrolled', window.scrollY > 10);
});
// Mobile menu toggle
document.getElementById('nav-toggle').addEventListener('click', () => {
  document.getElementById('mobile-menu').classList.toggle('hidden');
});
// Mobile nav link close
document.querySelectorAll('.mobile-nav-link').forEach(link => {
  link.addEventListener('click', () => document.getElementById('mobile-menu').classList.add('hidden'));
});
// Page top button
const pageTopBtn = document.getElementById('page-top-btn');
window.addEventListener('scroll', () => {
  if (window.scrollY > 300) {
    pageTopBtn.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
    pageTopBtn.classList.add('opacity-100', 'translate-y-0');
  } else {
    pageTopBtn.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
    pageTopBtn.classList.remove('opacity-100', 'translate-y-0');
  }
});
// Fade-in observer
if (typeof IntersectionObserver !== 'undefined') {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('aoibase-fade-in-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('.aoibase-fade-in').forEach(el => observer.observe(el));
}
</script>

<?php wp_footer(); ?>
</body>
</html>
