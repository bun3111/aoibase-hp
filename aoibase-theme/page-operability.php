<?php
/**
 * Template: 運用のしやすさとは？
 * 固定ページスラッグ "operability" に自動適用
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<style>
  .service-card {
    background: #fff; border: 1px solid #F1F5F9; border-radius: 16px;
    padding: 28px; box-shadow: 0 1px 3px rgba(0,0,0,0.06);
    display: flex; flex-direction: column;
    transition: transform 200ms ease, box-shadow 200ms ease;
  }
  .service-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(3,105,161,0.12); border-color: #BFDBFE; }
  @media (max-width: 767px) { .feature-grid-3 { grid-template-columns: 1fr !important; } }
</style>

<!-- ===== PAGE HEADER ===== -->
<section style="background:#0F172A;padding:0;overflow:hidden;position:relative;padding-top:80px;min-height:340px;display:flex;align-items:center;">
  <!-- 背景デコレーション -->
  <div style="position:absolute;top:-60px;right:-60px;width:480px;height:480px;background:radial-gradient(circle,rgba(202,138,4,0.12) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;bottom:-40px;left:10%;width:300px;height:300px;background:radial-gradient(circle,rgba(3,105,161,0.1) 0%,transparent 70%);pointer-events:none;"></div>
  <!-- 大型背景テキスト -->
  <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none;user-select:none;overflow:hidden;">
    <span style="font-family:'Poppins',sans-serif;font-size:clamp(60px,11vw,140px);font-weight:800;color:transparent;-webkit-text-stroke:1px rgba(255,255,255,0.05);letter-spacing:-4px;white-space:nowrap;">OPERABILITY</span>
  </div>
  <div style="position:relative;z-index:1;max-width:1280px;margin:0 auto;padding:80px 40px 80px;">
    <!-- パンくず -->
    <nav aria-label="パンくずリスト" style="margin-bottom:24px;">
      <ol style="display:inline-flex;align-items:center;gap:8px;list-style:none;padding:0;margin:0;">
        <li><a href="<?php echo esc_url(home_url('/')); ?>" style="font-family:'Poppins',sans-serif;font-size:11px;color:rgba(255,255,255,0.4);text-decoration:none;letter-spacing:0.1em;" onmouseover="this.style.color='rgba(255,255,255,0.8)'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">TOP</a></li>
        <li style="font-size:11px;color:rgba(255,255,255,0.2);">&#8250;</li>
        <li><span aria-current="page" style="font-family:'Poppins',sans-serif;font-size:11px;color:rgba(255,255,255,0.5);letter-spacing:0.1em;">OPERABILITY</span></li>
      </ol>
    </nav>
    <!-- ラベル -->
    <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(202,138,4,0.15);border:1px solid rgba(202,138,4,0.35);border-radius:100px;padding:5px 16px;margin-bottom:24px;">
      <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#CA8A04" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
      <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:600;color:#CA8A04;letter-spacing:0.15em;">OPERABILITY & MAINTAINABILITY</span>
    </div>
    <h1 style="font-family:'Noto Sans JP',sans-serif;font-size:clamp(26px,4vw,48px);font-weight:700;color:#fff;line-height:1.4;margin:0 0 20px;">運用のしやすさとは？</h1>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:rgba(255,255,255,0.6);line-height:1.9;margin:0;max-width:600px;">システムの価値はリリース後にこそ問われます。<br>運用しやすい設計が、長期的なビジネス成長を支えます。</p>
  </div>
</section>

<!-- ===== DIVIDER ===== -->
<div style="height:1px;background:linear-gradient(90deg,transparent,#CA8A04,#0369A1,#CA8A04,transparent);"></div>

<!-- ===== SECTION 1: 運用しやすいシステムとは ===== -->
<section style="background:#fff;padding:120px 0 100px;overflow:hidden;">
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <!-- セクションヘッダー -->
    <div style="margin-bottom:64px;">
      <div style="margin-bottom:12px;">
        <span style="font-family:'Poppins',sans-serif;font-size:clamp(56px,8vw,100px);font-weight:800;color:#F1F5F9;line-height:1;letter-spacing:-2px;user-select:none;">FEATURES</span>
      </div>
      <div style="display:flex;align-items:center;gap:20px;margin-top:-16px;position:relative;z-index:1;">
        <div style="width:40px;height:3px;background:#0369A1;"></div>
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">運用しやすいシステムの特徴</span>
      </div>
    </div>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;"><?php echo esc_html( get_theme_mod( 'operability_intro', 'システムは「作って終わり」ではありません。リリース後の改修・機能追加・障害対応を見据え、保守性と拡張性を最初から設計に組み込むことが重要です。運用負荷の低いシステムは、ビジネス環境の変化にも柔軟に対応できます。' ) ); ?></p>

    <!-- 特徴カード -->
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;" class="feature-grid-3">

      <!-- Card: 保守性 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#EFF6FF;border:1px solid #BFDBFE;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">MAINTAINABILITY</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_1_title', '高い保守性' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_1_desc', 'コードの可読性・モジュール分割・命名規則の統一により、担当者が変わっても迅速に理解・修正できる設計を目指します。' ) ); ?></p>
      </div>

      <!-- Card: 拡張性 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F5F3FF;border:1px solid #DDD6FE;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6D28D9" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">SCALABILITY</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_2_title', '柔軟な拡張性' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_2_desc', '新機能の追加や外部サービスとの連携を、既存機能に影響を与えず実現できるアーキテクチャを採用します。' ) ); ?></p>
      </div>

      <!-- Card: 運用負荷 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#FEFCE8;border:1px solid #FDE68A;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#B45309" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">LOW OVERHEAD</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_3_title', '運用負荷の最小化' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_3_desc', '自動化・標準化された運用プロセスにより、日常的な運用タスクの負荷を軽減し、本来の業務に集中できる環境を構築します。' ) ); ?></p>
      </div>

      <!-- Card: ドキュメント -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#FFF1F2;border:1px solid #FECDD3;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#BE123C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">DOCUMENTATION</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_4_title', '充実したドキュメント' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_4_desc', '設計意図・運用手順・トラブルシューティングを整備し、属人化を防止。チーム全体でシステムを運用できる体制を支援します。' ) ); ?></p>
      </div>

      <!-- Card: テスト -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F0FDF4;border:1px solid #BBF7D0;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#15803D" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">TESTABILITY</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_5_title', 'テスト容易性' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_5_desc', '自動テストが実行しやすい構造設計により、変更時の影響範囲を素早く検証し、安心してリリースできる仕組みを実現します。' ) ); ?></p>
      </div>

      <!-- Card: 可観測性 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F0F9FF;border:1px solid #BAE6FD;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">OBSERVABILITY</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_6_title', '可観測性（モニタリング）' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_6_desc', 'システムの状態をリアルタイムで把握できる仕組みを設計段階から組み込み、障害の予兆検知と迅速な対応を可能にします。' ) ); ?></p>
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
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">AOi Baseの運用設計アプローチ</span>
      </div>
    </div>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;">AOi Baseでは「作って終わり」ではなく、長期運用を前提とした設計・開発・サポート体制を整えています。</p>

    <!-- アプローチステップ -->
    <div style="display:grid;grid-template-columns:1fr;gap:24px;max-width:900px;">

      <!-- Step 1 -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:36px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:28px;">
        <div style="flex-shrink:0;display:flex;flex-direction:column;align-items:center;gap:12px;">
          <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;">01</span>
          <div style="width:56px;height:56px;border-radius:50%;background:#0369A1;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(3,105,161,0.25);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
          </div>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;"><?php echo esc_html( get_theme_mod( 'operability_approach_1_title', '改修・機能追加に対応しやすい仕組み' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_approach_1_desc', '疎結合なアーキテクチャ設計により、ある機能を変更しても他の機能に影響が波及しにくい構造を実現。ビジネス要件の変化に素早く追従できます。' ) ); ?></p>
        </div>
      </div>

      <!-- Step 2 -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:36px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:28px;">
        <div style="flex-shrink:0;display:flex;flex-direction:column;align-items:center;gap:12px;">
          <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;">02</span>
          <div style="width:56px;height:56px;border-radius:50%;background:#0369A1;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(3,105,161,0.25);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
          </div>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;"><?php echo esc_html( get_theme_mod( 'operability_approach_2_title', '一貫した体制でのサポート' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_approach_2_desc', '設計・開発・運用を一貫して担当することで、システムの全体像を把握したうえでの素早い問題対応・改善提案が可能です。開発チームがそのまま運用フェーズに入るため、引き継ぎロスが発生しません。' ) ); ?></p>
        </div>
      </div>

      <!-- Step 3 -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:36px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:28px;">
        <div style="flex-shrink:0;display:flex;flex-direction:column;align-items:center;gap:12px;">
          <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#CA8A04;letter-spacing:0.2em;">03</span>
          <div style="width:56px;height:56px;border-radius:50%;background:#CA8A04;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(202,138,4,0.25);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
          </div>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;"><?php echo esc_html( get_theme_mod( 'operability_approach_3_title', 'モニタリング・ログ設計' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_approach_3_desc', 'アプリケーションログ・パフォーマンスメトリクス・エラー通知を設計段階で組み込み、障害の予兆検知と迅速なインシデント対応を実現。運用チームが「状況を把握できる」仕組みを構築します。' ) ); ?></p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== CTA SECTION ===== -->
<section style="background:#0F172A;padding:100px 0;overflow:hidden;position:relative;">
  <!-- 背景デコレーション -->
  <div style="position:absolute;top:-80px;right:-80px;width:400px;height:400px;background:radial-gradient(circle,rgba(202,138,4,0.1) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;bottom:-60px;left:5%;width:320px;height:320px;background:radial-gradient(circle,rgba(3,105,161,0.1) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:relative;z-index:1;max-width:800px;margin:0 auto;padding:0 40px;text-align:center;">
    <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(202,138,4,0.12);border:1px solid rgba(202,138,4,0.3);border-radius:100px;padding:5px 16px;margin-bottom:28px;">
      <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:600;color:#CA8A04;letter-spacing:0.15em;">CONTACT US</span>
    </div>
    <h2 style="font-family:'Noto Sans JP',sans-serif;font-size:clamp(22px,3.5vw,36px);font-weight:700;color:#fff;line-height:1.6;margin:0 0 20px;"><?php echo esc_html( get_theme_mod( 'operability_cta_text', '運用しやすいシステムを一緒に作りませんか？' ) ); ?></h2>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:rgba(255,255,255,0.6);line-height:1.9;margin:0 0 44px;">既存システムの運用改善から新規開発まで、お気軽にご相談ください。<br>最適なアーキテクチャと運用体制をご提案します。</p>
    <div style="display:flex;flex-wrap:wrap;gap:16px;justify-content:center;">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" style="display:inline-flex;align-items:center;gap:10px;background:#B45309;color:#fff;font-family:'Noto Sans JP',sans-serif;font-size:15px;font-weight:700;padding:16px 40px;border-radius:100px;text-decoration:none;transition:all 200ms;box-shadow:0 8px 24px rgba(180,83,9,0.35);" onmouseover="this.style.background='#D97706';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#B45309';this.style.transform='translateY(0)'">
        お問い合わせはこちら
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
