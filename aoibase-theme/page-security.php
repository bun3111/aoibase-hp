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
  @media (max-width: 767px) {
    .risk-grid { grid-template-columns: 1fr !important; }
    .measures-grid { grid-template-columns: 1fr !important; }
    .response-flow { flex-direction: column !important; align-items: center !important; }
    .response-arrow-h { display: none !important; }
    .response-arrow-v { display: flex !important; }
    .response-step-card { width: 100% !important; max-width: 400px !important; min-height: 180px !important; display: flex !important; flex-direction: column !important; justify-content: center !important; }
  }
</style>

<!-- ===== PAGE HEADER ===== -->
<section style="background:#0F172A;padding:0;overflow:hidden;position:relative;padding-top:80px;min-height:340px;display:flex;align-items:center;">
  <div style="position:absolute;top:-60px;right:-60px;width:480px;height:480px;background:radial-gradient(circle,rgba(3,105,161,0.18) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;bottom:-40px;left:10%;width:300px;height:300px;background:radial-gradient(circle,rgba(202,138,4,0.08) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none;user-select:none;overflow:hidden;">
    <span style="font-family:'Poppins',sans-serif;font-size:clamp(80px,14vw,160px);font-weight:800;color:transparent;-webkit-text-stroke:1px rgba(255,255,255,0.05);letter-spacing:-4px;white-space:nowrap;">SECURITY</span>
  </div>
  <div style="position:relative;z-index:1;max-width:1280px;margin:0 auto;padding:80px 40px 80px;">
    <nav aria-label="パンくずリスト" style="margin-bottom:24px;">
      <ol style="display:inline-flex;align-items:center;gap:8px;list-style:none;padding:0;margin:0;">
        <li><a href="<?php echo esc_url(home_url('/')); ?>" style="font-family:'Poppins',sans-serif;font-size:11px;color:rgba(255,255,255,0.4);text-decoration:none;letter-spacing:0.1em;" onmouseover="this.style.color='rgba(255,255,255,0.8)'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">TOP</a></li>
        <li style="font-size:11px;color:rgba(255,255,255,0.2);">&#8250;</li>
        <li><span aria-current="page" style="font-family:'Poppins',sans-serif;font-size:11px;color:rgba(255,255,255,0.5);letter-spacing:0.1em;">SECURITY</span></li>
      </ol>
    </nav>
    <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(3,105,161,0.2);border:1px solid rgba(3,105,161,0.4);border-radius:100px;padding:5px 16px;margin-bottom:24px;">
      <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:600;color:#3B82F6;letter-spacing:0.15em;">SECURITY RISKS & SOLUTIONS</span>
    </div>
    <h1 style="font-family:'Noto Sans JP',sans-serif;font-size:clamp(26px,4vw,48px);font-weight:700;color:#fff;line-height:1.4;margin:0 0 20px;">セキュリティリスクとは？</h1>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:rgba(255,255,255,0.6);line-height:1.9;margin:0;max-width:600px;"><?php echo esc_html( get_theme_mod( 'security_header_lead', '「うちは小さい会社だから大丈夫」——その油断が最大のリスクです。サイバー攻撃の標的は大企業だけではありません。' ) ); ?></p>
  </div>
</section>

<!-- ===== DIVIDER ===== -->
<div style="height:1px;background:linear-gradient(90deg,transparent,#0369A1,#CA8A04,#0369A1,transparent);"></div>

<!-- ===== SECTION 1: セキュリティリスク ===== -->
<section style="background:#fff;padding:120px 0 100px;overflow:hidden;">
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <div style="margin-bottom:64px;">
      <div style="margin-bottom:12px;">
        <span style="font-family:'Poppins',sans-serif;font-size:clamp(56px,8vw,100px);font-weight:800;color:#F1F5F9;line-height:1;letter-spacing:-2px;user-select:none;">RISKS</span>
      </div>
      <div style="display:flex;align-items:center;gap:20px;margin-top:-16px;position:relative;z-index:1;">
        <div style="width:40px;height:3px;background:#0369A1;"></div>
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">中小企業が直面するセキュリティリスク</span>
      </div>
    </div>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;"><?php echo esc_html( get_theme_mod( 'security_intro', 'セキュリティ被害の損害額は中小企業でも数百万円規模。「知らなかった」では済まないリスクが、あなたのWebサイトやシステムにも潜んでいます。' ) ); ?></p>

    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;" class="risk-grid">

      <!-- Card 1 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#FFF1F2;border:1px solid #FECDD3;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#BE123C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">SQL INJECTION</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_1_title', '顧客データの一括流出' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_1_desc', 'お客様の個人情報・決済情報がまとめて盗まれる攻撃。謝罪対応・損害賠償・信用失墜につながり、事業存続を脅かします。' ) ); ?></p>
      </div>

      <!-- Card 2 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#FEFCE8;border:1px solid #FDE68A;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#B45309" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">XSS</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_2_title', 'サイト訪問者への二次被害' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_2_desc', 'あなたのサイトを訪れたお客様が、知らないうちに偽サイトに誘導されたり個人情報を抜き取られる被害。サイトの信頼が一瞬で崩れます。' ) ); ?></p>
      </div>

      <!-- Card 3 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#EFF6FF;border:1px solid #BFDBFE;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">AUTH FAILURE</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_3_title', '管理画面の乗っ取り' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_3_desc', '管理画面への不正ログインにより、サイト改ざんや顧客データの持ち出しが発生。パスワードが簡単だっただけで全データが流出する事例も。' ) ); ?></p>
      </div>

      <!-- Card 4 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F5F3FF;border:1px solid #DDD6FE;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6D28D9" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">CSRF</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_4_title', 'なりすまし操作' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_4_desc', 'ログイン中のユーザーが、意図せず送金や設定変更を実行させられる攻撃。ECサイトや会員制サービスで特に深刻な被害が報告されています。' ) ); ?></p>
      </div>

      <!-- Card 5 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F0FDF4;border:1px solid #BBF7D0;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#15803D" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">DATA LEAK</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_5_title', 'システム内部の露出' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_5_desc', 'サーバー情報やデータベース構造が外部から丸見えになり、攻撃者に侵入の手がかりを与えてしまう状態。多くの情報漏洩事故の入り口です。' ) ); ?></p>
      </div>

      <!-- Card 6 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F0F9FF;border:1px solid #BAE6FD;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">DEPENDENCY</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_6_title', '放置された開発ツールの欠陥' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'security_risk_6_desc', '開発に使われた外部ツールの欠陥が、そのままシステムの弱点に。「作って終わり」の開発会社に任せると、放置されたまま攻撃対象になります。' ) ); ?></p>
      </div>

    </div>
  </div>
</section>

<!-- ===== SECTION 2: 具体的なセキュリティ対策 ===== -->
<section style="background:#F8FAFC;padding:120px 0 100px;overflow:hidden;">
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <div style="margin-bottom:64px;">
      <div style="margin-bottom:12px;">
        <span style="font-family:'Poppins',sans-serif;font-size:clamp(56px,8vw,100px);font-weight:800;color:#E2E8F0;line-height:1;letter-spacing:-2px;user-select:none;">MEASURES</span>
      </div>
      <div style="display:flex;align-items:center;gap:20px;margin-top:-16px;position:relative;z-index:1;">
        <div style="width:40px;height:3px;background:#0369A1;"></div>
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">AOi Baseが導入する具体的な対策</span>
      </div>
    </div>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;"><?php echo esc_html( get_theme_mod( 'security_measures_intro', 'リスクに対して、AOi Baseでは以下の具体的な技術を標準で導入しています。追加料金なし、すべてのプロジェクトに適用します。' ) ); ?></p>

    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:24px;" class="measures-grid">

      <!-- Measure 1: パスキー -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:32px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:24px;transition:transform 200ms ease,box-shadow 200ms ease;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(3,105,161,0.12)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 1px 3px rgba(0,0,0,0.06)'">
        <div style="flex-shrink:0;width:52px;height:52px;border-radius:14px;background:linear-gradient(135deg,#0369A1,#1E40AF);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 20px rgba(3,105,161,0.25);">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M15 7a4 4 0 11-8 0 4 4 0 018 0z"/><path d="M12 14c-4 0-7 2-7 4v2h14v-2c0-2-3-4-7-4z"/><path d="M16 3l2 2-5 5-2-2 5-5z"/></svg>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0 0 10px;"><?php echo esc_html( get_theme_mod( 'security_measure_1_title', 'パスキー認証の導入' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.85;margin:0;"><?php echo esc_html( get_theme_mod( 'security_measure_1_desc', 'パスワードを使わず、指紋や顔認証でログインできる最新の認証方式。フィッシング詐欺に強く、パスワード流出のリスクをゼロにします。ユーザーの利便性も大幅に向上します。' ) ); ?></p>
        </div>
      </div>

      <!-- Measure 2: SSL -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:32px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:24px;transition:transform 200ms ease,box-shadow 200ms ease;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(3,105,161,0.12)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 1px 3px rgba(0,0,0,0.06)'">
        <div style="flex-shrink:0;width:52px;height:52px;border-radius:14px;background:linear-gradient(135deg,#15803D,#166534);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 20px rgba(21,128,61,0.25);">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0 0 10px;"><?php echo esc_html( get_theme_mod( 'security_measure_2_title', 'SSL/HTTPS通信の暗号化' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.85;margin:0;"><?php echo esc_html( get_theme_mod( 'security_measure_2_desc', 'サイトとユーザー間のすべての通信を暗号化し、データの盗聴や改ざんを防止。Google検索での評価向上にもつながります。' ) ); ?></p>
        </div>
      </div>

      <!-- Measure 3: WAF -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:32px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:24px;transition:transform 200ms ease,box-shadow 200ms ease;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(3,105,161,0.12)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 1px 3px rgba(0,0,0,0.06)'">
        <div style="flex-shrink:0;width:52px;height:52px;border-radius:14px;background:linear-gradient(135deg,#B45309,#D97706);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 20px rgba(180,83,9,0.25);">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0 0 10px;"><?php echo esc_html( get_theme_mod( 'security_measure_3_title', 'WAF（不正アクセス防御）' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.85;margin:0;"><?php echo esc_html( get_theme_mod( 'security_measure_3_desc', 'Webアプリケーションへの攻撃をリアルタイムで検知・遮断する防御システム。SQLインジェクションやXSSなどの攻撃を自動でブロックします。' ) ); ?></p>
        </div>
      </div>

      <!-- Measure 4: バックアップ -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:32px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:24px;transition:transform 200ms ease,box-shadow 200ms ease;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(3,105,161,0.12)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 1px 3px rgba(0,0,0,0.06)'">
        <div style="flex-shrink:0;width:52px;height:52px;border-radius:14px;background:linear-gradient(135deg,#6D28D9,#7C3AED);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 20px rgba(109,40,217,0.25);">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0 0 10px;"><?php echo esc_html( get_theme_mod( 'security_measure_4_title', '自動バックアップと復旧体制' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.85;margin:0;"><?php echo esc_html( get_theme_mod( 'security_measure_4_desc', '定期的な自動バックアップにより、万が一の障害やサイバー攻撃でもデータを復元可能。復旧手順も事前に整備し、ダウンタイムを最小限に抑えます。' ) ); ?></p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== SECTION 3: AOi Baseのアプローチ ===== -->
<section style="background:#fff;padding:120px 0 100px;overflow:hidden;">
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <div style="margin-bottom:64px;">
      <div style="margin-bottom:12px;">
        <span style="font-family:'Poppins',sans-serif;font-size:clamp(56px,8vw,100px);font-weight:800;color:#F1F5F9;line-height:1;letter-spacing:-2px;user-select:none;">APPROACH</span>
      </div>
      <div style="display:flex;align-items:center;gap:20px;margin-top:-16px;position:relative;z-index:1;">
        <div style="width:40px;height:3px;background:#0369A1;"></div>
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">AOi Baseのセキュリティ対策アプローチ</span>
      </div>
    </div>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;">AOi Baseでは「後付けのセキュリティ」ではなく、設計段階からセキュリティを組み込む開発プロセスを徹底しています。</p>

    <div style="display:grid;grid-template-columns:1fr;gap:24px;max-width:900px;">

      <!-- Step 1 -->
      <div style="background:#F8FAFC;border:1px solid #E2E8F0;border-radius:16px;padding:36px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:28px;">
        <div style="flex-shrink:0;display:flex;flex-direction:column;align-items:center;gap:12px;">
          <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;">01</span>
          <div style="width:56px;height:56px;border-radius:50%;background:#0369A1;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(3,105,161,0.25);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;"><?php echo esc_html( get_theme_mod( 'security_approach_1_title', '「作ってから直す」ではなく「最初から守る」' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;"><?php echo esc_html( get_theme_mod( 'security_approach_1_desc', 'プロジェクト開始時にセキュリティリスクを洗い出し、設計に組み込みます。後から対策を追加するよりコストが低く、確実です。' ) ); ?></p>
        </div>
      </div>

      <!-- Step 2 -->
      <div style="background:#F8FAFC;border:1px solid #E2E8F0;border-radius:16px;padding:36px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:28px;">
        <div style="flex-shrink:0;display:flex;flex-direction:column;align-items:center;gap:12px;">
          <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;">02</span>
          <div style="width:56px;height:56px;border-radius:50%;background:#0369A1;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(3,105,161,0.25);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
          </div>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;"><?php echo esc_html( get_theme_mod( 'security_approach_2_title', 'お客様のデータを守る仕組みを標準装備' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;"><?php echo esc_html( get_theme_mod( 'security_approach_2_desc', '個人情報の暗号化、不正アクセスの防止、安全なログイン機能を最初から実装。「追加料金でセキュリティ対策」ではなく、すべての開発に標準で組み込みます。' ) ); ?></p>
        </div>
      </div>

      <!-- Step 3 -->
      <div style="background:#F8FAFC;border:1px solid #E2E8F0;border-radius:16px;padding:36px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:28px;">
        <div style="flex-shrink:0;display:flex;flex-direction:column;align-items:center;gap:12px;">
          <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;">03</span>
          <div style="width:56px;height:56px;border-radius:50%;background:#0369A1;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(3,105,161,0.25);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;"><?php echo esc_html( get_theme_mod( 'security_approach_3_title', '納品前チェックと継続的な安全管理' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;"><?php echo esc_html( get_theme_mod( 'security_approach_3_desc', '納品前にセキュリティチェックを実施し、問題がないことを確認してからリリース。使用ツールの脆弱性も定期的に監視し、必要に応じてアップデートを提案します。' ) ); ?></p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== SECTION 4: インシデント対応体制 ===== -->
<section style="background:#F8FAFC;padding:120px 0 100px;overflow:hidden;">
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <div style="margin-bottom:64px;">
      <div style="margin-bottom:12px;">
        <span style="font-family:'Poppins',sans-serif;font-size:clamp(56px,8vw,100px);font-weight:800;color:#E2E8F0;line-height:1;letter-spacing:-2px;user-select:none;">RESPONSE</span>
      </div>
      <div style="display:flex;align-items:center;gap:20px;margin-top:-16px;position:relative;z-index:1;">
        <div style="width:40px;height:3px;background:#0369A1;"></div>
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">万が一の対応体制</span>
      </div>
    </div>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;"><?php echo esc_html( get_theme_mod( 'security_response_intro', 'どれだけ対策を講じても、リスクをゼロにすることはできません。AOi Baseでは万が一に備えた対応体制を整備しています。' ) ); ?></p>

    <!-- フローステップ -->
    <div style="display:flex;align-items:flex-start;gap:16px;max-width:1000px;" class="response-flow">

      <!-- Step 1 -->
      <div class="response-step-card" style="flex:1;background:#fff;border:1px solid #E2E8F0;border-radius:16px;padding:28px 24px;text-align:center;">
        <div style="width:48px;height:48px;border-radius:50%;background:#FFF1F2;border:2px solid #FECDD3;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#BE123C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
        </div>
        <div style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;margin-bottom:8px;">STEP 1</div>
        <h4 style="font-family:'Noto Sans JP',sans-serif;font-size:15px;font-weight:700;color:#0F172A;margin:0 0 8px;"><?php echo esc_html( get_theme_mod( 'security_response_1_title', '異常検知' ) ); ?></h4>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:12px;color:#64748B;line-height:1.7;margin:0;"><?php echo esc_html( get_theme_mod( 'security_response_1_desc', 'サイトの挙動や不正アクセスの兆候を監視' ) ); ?></p>
      </div>

      <!-- Arrow H -->
      <div class="response-arrow-h" style="flex-shrink:0;display:flex;align-items:center;padding-top:56px;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14m-4-4l4 4-4 4"/></svg>
      </div>
      <!-- Arrow V -->
      <div class="response-arrow-v" style="display:none;justify-content:center;padding:4px 0;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14m-4-4l4 4 4-4"/></svg>
      </div>

      <!-- Step 2 -->
      <div class="response-step-card" style="flex:1;background:#fff;border:1px solid #E2E8F0;border-radius:16px;padding:28px 24px;text-align:center;">
        <div style="width:48px;height:48px;border-radius:50%;background:#EFF6FF;border:2px solid #BFDBFE;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        </div>
        <div style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;margin-bottom:8px;">STEP 2</div>
        <h4 style="font-family:'Noto Sans JP',sans-serif;font-size:15px;font-weight:700;color:#0F172A;margin:0 0 8px;"><?php echo esc_html( get_theme_mod( 'security_response_2_title', '影響調査' ) ); ?></h4>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:12px;color:#64748B;line-height:1.7;margin:0;"><?php echo esc_html( get_theme_mod( 'security_response_2_desc', '被害範囲の特定と原因の究明' ) ); ?></p>
      </div>

      <!-- Arrow H -->
      <div class="response-arrow-h" style="flex-shrink:0;display:flex;align-items:center;padding-top:56px;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14m-4-4l4 4-4 4"/></svg>
      </div>
      <!-- Arrow V -->
      <div class="response-arrow-v" style="display:none;justify-content:center;padding:4px 0;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14m-4-4l4 4 4-4"/></svg>
      </div>

      <!-- Step 3 -->
      <div class="response-step-card" style="flex:1;background:#fff;border:1px solid #E2E8F0;border-radius:16px;padding:28px 24px;text-align:center;">
        <div style="width:48px;height:48px;border-radius:50%;background:#FEFCE8;border:2px solid #FDE68A;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#B45309" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
        </div>
        <div style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;margin-bottom:8px;">STEP 3</div>
        <h4 style="font-family:'Noto Sans JP',sans-serif;font-size:15px;font-weight:700;color:#0F172A;margin:0 0 8px;"><?php echo esc_html( get_theme_mod( 'security_response_3_title', '緊急対策' ) ); ?></h4>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:12px;color:#64748B;line-height:1.7;margin:0;"><?php echo esc_html( get_theme_mod( 'security_response_3_desc', '被害拡大の防止と応急処置' ) ); ?></p>
      </div>

      <!-- Arrow H -->
      <div class="response-arrow-h" style="flex-shrink:0;display:flex;align-items:center;padding-top:56px;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14m-4-4l4 4-4 4"/></svg>
      </div>
      <!-- Arrow V -->
      <div class="response-arrow-v" style="display:none;justify-content:center;padding:4px 0;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14m-4-4l4 4 4-4"/></svg>
      </div>

      <!-- Step 4 -->
      <div class="response-step-card" style="flex:1;background:#fff;border:1px solid #E2E8F0;border-radius:16px;padding:28px 24px;text-align:center;">
        <div style="width:48px;height:48px;border-radius:50%;background:#F0FDF4;border:2px solid #BBF7D0;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#15803D" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;margin-bottom:8px;">STEP 4</div>
        <h4 style="font-family:'Noto Sans JP',sans-serif;font-size:15px;font-weight:700;color:#0F172A;margin:0 0 8px;"><?php echo esc_html( get_theme_mod( 'security_response_4_title', '復旧・報告' ) ); ?></h4>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:12px;color:#64748B;line-height:1.7;margin:0;"><?php echo esc_html( get_theme_mod( 'security_response_4_desc', 'システム復旧と再発防止策の実施・報告' ) ); ?></p>
      </div>

    </div>
  </div>
</section>

<!-- ===== CTA SECTION ===== -->
<section style="background:#0F172A;padding:100px 0;overflow:hidden;position:relative;">
  <div style="position:absolute;top:-80px;right:-80px;width:400px;height:400px;background:radial-gradient(circle,rgba(3,105,161,0.15) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;bottom:-60px;left:5%;width:320px;height:320px;background:radial-gradient(circle,rgba(202,138,4,0.08) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:relative;z-index:1;max-width:800px;margin:0 auto;padding:0 40px;text-align:center;">
    <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(3,105,161,0.15);border:1px solid rgba(3,105,161,0.3);border-radius:100px;padding:5px 16px;margin-bottom:28px;">
      <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:600;color:#3B82F6;letter-spacing:0.15em;">CONTACT US</span>
    </div>
    <h2 style="font-family:'Noto Sans JP',sans-serif;font-size:clamp(22px,3.5vw,36px);font-weight:700;color:#fff;line-height:1.6;margin:0 0 20px;"><?php echo esc_html( get_theme_mod( 'security_cta_text', '今のサイト、本当に安全ですか？' ) ); ?></h2>
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
