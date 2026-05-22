<?php
/**
 * Template: セキュリティリスクとは？
 * 固定ページスラッグ "security" に自動適用
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
  @media (max-width: 767px) { .risk-grid { grid-template-columns: 1fr !important; } }
</style>

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
        <li style="font-size:11px;color:rgba(255,255,255,0.2);">&#8250;</li>
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
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;"><?php echo esc_html( get_theme_mod( 'security_intro', 'Webアプリケーションやシステムには、設計・実装の段階で混入する脆弱性が存在します。これらは外部からの攻撃や情報漏洩の原因となり、事業継続に深刻な影響を与えます。開発段階からセキュリティを意識することで、リスクを最小化できます。' ) ); ?></p>

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
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_1_title', 'SQLインジェクション' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_1_desc', '不正なSQL文を注入し、データベースの情報を窃取・改ざんする攻撃。入力値の検証不備が原因で発生します。' ) ); ?></p>
      </div>

      <!-- Card: XSS -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#FEFCE8;border:1px solid #FDE68A;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#B45309" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">XSS</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_2_title', 'クロスサイトスクリプティング' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_2_desc', '悪意あるスクリプトをWebページに埋め込み、ユーザーのセッション情報や個人データを盗み取る攻撃手法です。' ) ); ?></p>
      </div>

      <!-- Card: 認証不備 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#EFF6FF;border:1px solid #BFDBFE;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">AUTH FAILURE</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_3_title', '認証・認可の不備' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_3_desc', 'パスワード管理の甘さやセッション管理の不備により、不正アクセスやアカウント乗っ取りが発生するリスクです。' ) ); ?></p>
      </div>

      <!-- Card: CSRF -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F5F3FF;border:1px solid #DDD6FE;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6D28D9" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">CSRF</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_4_title', 'CSRF（リクエスト強要）' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_4_desc', 'ユーザーの意図しないリクエストを送信させ、設定変更や送金などの操作を不正に実行させる攻撃です。' ) ); ?></p>
      </div>

      <!-- Card: 情報漏洩 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F0FDF4;border:1px solid #BBF7D0;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#15803D" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">DATA LEAK</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_5_title', '機密情報の漏洩' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_5_desc', 'エラーメッセージやログに含まれるシステム情報、不適切なアクセス制御により内部情報が外部に露出するリスクです。' ) ); ?></p>
      </div>

      <!-- Card: 依存パッケージ -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F0F9FF;border:1px solid #BAE6FD;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">DEPENDENCY</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_6_title', '依存パッケージの脆弱性' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_6_desc', '利用しているライブラリやフレームワークに含まれる既知の脆弱性が、システム全体のリスクとなります。' ) ); ?></p>
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
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;"><?php echo esc_html( get_theme_mod( 'security_approach_1_title', '設計段階からのセキュリティ組み込み' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;"><?php echo esc_html( get_theme_mod( 'security_approach_1_desc', '要件定義・設計フェーズでセキュリティ要件を定義し、脅威モデリングを実施。開発後に対処するのではなく、アーキテクチャレベルでリスクを排除します。' ) ); ?></p>
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
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;"><?php echo esc_html( get_theme_mod( 'security_approach_2_title', '脆弱性対策・認証設計・データ保護' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;"><?php echo esc_html( get_theme_mod( 'security_approach_2_desc', '入力検証・出力エスケープ・パラメータバインディングなどの基本対策を徹底。認証・認可設計ではセッション管理やアクセス制御を厳密に実装し、データは暗号化と適切なアクセス制御で保護します。' ) ); ?></p>
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
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;"><?php echo esc_html( get_theme_mod( 'security_approach_3_title', 'コードレビュー・テストによる品質担保' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;"><?php echo esc_html( get_theme_mod( 'security_approach_3_desc', '全てのコードはセキュリティ観点を含むレビューを通過。自動テストによる脆弱性検知、依存パッケージの定期監査を実施し、リリース前の品質を担保します。' ) ); ?></p>
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
    <h2 style="font-family:'Noto Sans JP',sans-serif;font-size:clamp(22px,3.5vw,36px);font-weight:700;color:#fff;line-height:1.6;margin:0 0 20px;"><?php echo esc_html( get_theme_mod( 'security_cta_text', 'セキュリティに不安はありませんか？' ) ); ?></h2>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:rgba(255,255,255,0.6);line-height:1.9;margin:0 0 44px;">セキュリティ対策についてのご相談はお気軽にどうぞ。<br>現状の課題整理から、具体的な対策提案まで対応します。</p>
    <div style="display:flex;flex-wrap:wrap;gap:16px;justify-content:center;">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" style="display:inline-flex;align-items:center;gap:10px;background:#B45309;color:#fff;font-family:'Noto Sans JP',sans-serif;font-size:15px;font-weight:700;padding:16px 40px;border-radius:100px;text-decoration:none;transition:all 200ms;box-shadow:0 8px 24px rgba(180,83,9,0.35);" onmouseover="this.style.background='#D97706';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#B45309';this.style.transform='translateY(0)'">
        お問い合わせはこちら
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
