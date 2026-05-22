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
  @media (max-width: 767px) {
    .problem-grid { grid-template-columns: 1fr !important; }
    .solutions-grid { grid-template-columns: 1fr !important; }
    .support-flow { flex-direction: column !important; align-items: center !important; }
    .support-arrow-h { display: none !important; }
    .support-arrow-v { display: flex !important; }
    .support-step-card { width: 100% !important; max-width: 400px !important; min-height: 180px !important; display: flex !important; flex-direction: column !important; justify-content: center !important; }
  }
</style>

<!-- ===== PAGE HEADER ===== -->
<section style="background:#0F172A;padding:0;overflow:hidden;position:relative;padding-top:80px;min-height:340px;display:flex;align-items:center;">
  <div style="position:absolute;top:-60px;right:-60px;width:480px;height:480px;background:radial-gradient(circle,rgba(202,138,4,0.12) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;bottom:-40px;left:10%;width:300px;height:300px;background:radial-gradient(circle,rgba(3,105,161,0.1) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none;user-select:none;overflow:hidden;">
    <span style="font-family:'Poppins',sans-serif;font-size:clamp(60px,11vw,140px);font-weight:800;color:transparent;-webkit-text-stroke:1px rgba(255,255,255,0.05);letter-spacing:-4px;white-space:nowrap;">OPERABILITY</span>
  </div>
  <div style="position:relative;z-index:1;max-width:1280px;margin:0 auto;padding:80px 40px 80px;">
    <nav aria-label="パンくずリスト" style="margin-bottom:24px;">
      <ol style="display:inline-flex;align-items:center;gap:8px;list-style:none;padding:0;margin:0;">
        <li><a href="<?php echo esc_url(home_url('/')); ?>" style="font-family:'Poppins',sans-serif;font-size:11px;color:rgba(255,255,255,0.4);text-decoration:none;letter-spacing:0.1em;" onmouseover="this.style.color='rgba(255,255,255,0.8)'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">TOP</a></li>
        <li style="font-size:11px;color:rgba(255,255,255,0.2);">&#8250;</li>
        <li><span aria-current="page" style="font-family:'Poppins',sans-serif;font-size:11px;color:rgba(255,255,255,0.5);letter-spacing:0.1em;">OPERABILITY</span></li>
      </ol>
    </nav>
    <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(202,138,4,0.15);border:1px solid rgba(202,138,4,0.35);border-radius:100px;padding:5px 16px;margin-bottom:24px;">
      <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#CA8A04" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
      <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:600;color:#CA8A04;letter-spacing:0.15em;">OPERABILITY & MAINTAINABILITY</span>
    </div>
    <h1 style="font-family:'Noto Sans JP',sans-serif;font-size:clamp(26px,4vw,48px);font-weight:700;color:#fff;line-height:1.4;margin:0 0 20px;">運用のしやすさとは？</h1>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:rgba(255,255,255,0.6);line-height:1.9;margin:0;max-width:600px;"><?php echo esc_html( get_theme_mod( 'operability_header_lead', '「作ってもらったシステム、ちょっとした修正にも時間とお金がかかる」——そんな経験はありませんか？' ) ); ?></p>
  </div>
</section>

<!-- ===== DIVIDER ===== -->
<div style="height:1px;background:linear-gradient(90deg,transparent,#CA8A04,#0369A1,#CA8A04,transparent);"></div>

<!-- ===== SECTION 1: よくある運用の悩み ===== -->
<section style="background:#fff;padding:120px 0 100px;overflow:hidden;">
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <div style="margin-bottom:64px;">
      <div style="margin-bottom:12px;">
        <span style="font-family:'Poppins',sans-serif;font-size:clamp(56px,8vw,100px);font-weight:800;color:#F1F5F9;line-height:1;letter-spacing:-2px;user-select:none;">PROBLEMS</span>
      </div>
      <div style="display:flex;align-items:center;gap:20px;margin-top:-16px;position:relative;z-index:1;">
        <div style="width:40px;height:3px;background:#0369A1;"></div>
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">こんな運用の悩み、ありませんか？</span>
      </div>
    </div>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;"><?php echo esc_html( get_theme_mod( 'operability_intro', 'システムは「作って終わり」ではありません。多くの中小企業が、リリース後の運用で想定外のコストや手間に悩まされています。' ) ); ?></p>

    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;" class="problem-grid">

      <!-- Card 1 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#EFF6FF;border:1px solid #BFDBFE;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">MAINTAINABILITY</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_1_title', '小さな修正なのに高額な見積もり' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_1_desc', '「ここの文言を変えたいだけなのに、なぜこんなに費用がかかるの？」——作り方が悪いと、簡単な修正でもシステム全体に影響が出て、大がかりな作業になってしまいます。' ) ); ?></p>
      </div>

      <!-- Card 2 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F5F3FF;border:1px solid #DDD6FE;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6D28D9" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">SCALABILITY</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_2_title', '新しい機能を追加できない' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_2_desc', '「予約機能をつけたい」「会員ページを追加したい」と思っても、今のシステム構造では対応できないと言われる。ビジネスの成長にシステムが追いつけない状態です。' ) ); ?></p>
      </div>

      <!-- Card 3 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#FEFCE8;border:1px solid #FDE68A;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#B45309" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">LOW OVERHEAD</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_3_title', '担当者が手作業で回している' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_3_desc', 'データの集計、バックアップ、お知らせの更新……すべて手作業。担当者が休むと業務が止まり、ミスも増える。本来の仕事に集中できていません。' ) ); ?></p>
      </div>

      <!-- Card 4 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#FFF1F2;border:1px solid #FECDD3;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#BE123C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">DOCUMENTATION</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_4_title', '開発会社しかわからない' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_4_desc', 'システムの仕組みを知っているのは開発会社だけ。説明書もなく、担当者が退職したら誰も対応できない。完全に「人質」状態になっていませんか？' ) ); ?></p>
      </div>

      <!-- Card 5 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F0FDF4;border:1px solid #BBF7D0;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#15803D" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">TESTABILITY</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_5_title', '更新するたびに不具合が出る' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_5_desc', '「一箇所直したら別の画面が壊れた」「更新のたびにヒヤヒヤする」——変更の影響を事前に確認する仕組みがないと、改修のたびにリスクを抱えます。' ) ); ?></p>
      </div>

      <!-- Card 6 -->
      <div class="service-card">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:16px;">
          <div style="width:44px;height:44px;border-radius:12px;background:#F0F9FF;border:1px solid #BAE6FD;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
          </div>
          <div>
            <div style="font-family:'Poppins',sans-serif;font-size:10px;font-weight:600;color:#94A3B8;letter-spacing:0.15em;">OBSERVABILITY</div>
            <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:16px;font-weight:700;color:#0F172A;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_6_title', 'トラブルが起きても原因がわからない' ) ); ?></h3>
          </div>
        </div>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.8;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_feature_6_desc', '「サイトが遅い」「エラーが出る」と言われても、いつから・なぜ・どこで起きているのかわからない。原因究明に時間がかかり、お客様への影響が長引きます。' ) ); ?></p>
      </div>

    </div>
  </div>
</section>

<!-- ===== SECTION 2: 具体的な対策 ===== -->
<section style="background:#F8FAFC;padding:120px 0 100px;overflow:hidden;">
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <div style="margin-bottom:64px;">
      <div style="margin-bottom:12px;">
        <span style="font-family:'Poppins',sans-serif;font-size:clamp(56px,8vw,100px);font-weight:800;color:#E2E8F0;line-height:1;letter-spacing:-2px;user-select:none;">SOLUTIONS</span>
      </div>
      <div style="display:flex;align-items:center;gap:20px;margin-top:-16px;position:relative;z-index:1;">
        <div style="width:40px;height:3px;background:#0369A1;"></div>
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">AOi Baseが実現する運用しやすいシステム</span>
      </div>
    </div>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;"><?php echo esc_html( get_theme_mod( 'operability_solutions_intro', 'これらの悩みが起きないよう、AOi Baseでは最初から「運用しやすさ」を設計に組み込みます。追加料金なし、すべてのプロジェクトに標準適用します。' ) ); ?></p>

    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:24px;" class="solutions-grid">

      <!-- Solution 1 -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:32px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:24px;transition:transform 200ms ease,box-shadow 200ms ease;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(3,105,161,0.12)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 1px 3px rgba(0,0,0,0.06)'">
        <div style="flex-shrink:0;width:52px;height:52px;border-radius:14px;background:linear-gradient(135deg,#0369A1,#1E40AF);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 20px rgba(3,105,161,0.25);">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0 0 10px;"><?php echo esc_html( get_theme_mod( 'operability_solution_1_title', '修正・追加がしやすい設計' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.85;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_solution_1_desc', '機能をブロックのように独立させた設計で、一箇所を変えても他に影響しません。「ちょっとした修正」がちゃんと「ちょっとした費用」で済むシステムを作ります。' ) ); ?></p>
        </div>
      </div>

      <!-- Solution 2 -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:32px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:24px;transition:transform 200ms ease,box-shadow 200ms ease;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(3,105,161,0.12)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 1px 3px rgba(0,0,0,0.06)'">
        <div style="flex-shrink:0;width:52px;height:52px;border-radius:14px;background:linear-gradient(135deg,#B45309,#D97706);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 20px rgba(180,83,9,0.25);">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0 0 10px;"><?php echo esc_html( get_theme_mod( 'operability_solution_2_title', '自動化で手間を最小限に' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.85;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_solution_2_desc', 'データの集計、バックアップ、更新通知など、定型作業を自動化。担当者の負担を減らし、ミスも防ぎます。人に依存しない運用体制を構築します。' ) ); ?></p>
        </div>
      </div>

      <!-- Solution 3 -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:32px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:24px;transition:transform 200ms ease,box-shadow 200ms ease;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(3,105,161,0.12)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 1px 3px rgba(0,0,0,0.06)'">
        <div style="flex-shrink:0;width:52px;height:52px;border-radius:14px;background:linear-gradient(135deg,#6D28D9,#7C3AED);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 20px rgba(109,40,217,0.25);">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0 0 10px;"><?php echo esc_html( get_theme_mod( 'operability_solution_3_title', 'わかりやすい操作マニュアル' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.85;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_solution_3_desc', '「開発会社にしかわからない」をなくします。操作手順・トラブル時の対処法を、専門知識がなくても読めるマニュアルとしてお渡しします。' ) ); ?></p>
        </div>
      </div>

      <!-- Solution 4 -->
      <div style="background:#fff;border:1px solid #F1F5F9;border-radius:16px;padding:32px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:24px;transition:transform 200ms ease,box-shadow 200ms ease;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(3,105,161,0.12)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 1px 3px rgba(0,0,0,0.06)'">
        <div style="flex-shrink:0;width:52px;height:52px;border-radius:14px;background:linear-gradient(135deg,#15803D,#166534);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 20px rgba(21,128,61,0.25);">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:17px;font-weight:700;color:#0F172A;margin:0 0 10px;"><?php echo esc_html( get_theme_mod( 'operability_solution_4_title', 'システムの健康状態を見える化' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:13px;color:#475569;line-height:1.85;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_solution_4_desc', 'サイトの表示速度、エラーの発生状況、アクセス数の変化を自動で記録・通知。問題が大きくなる前に気づける仕組みを標準で導入します。' ) ); ?></p>
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
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">AOi Baseの開発・運用スタイル</span>
      </div>
    </div>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;">AOi Baseでは「作って終わり」ではなく、長期運用を前提とした設計・開発・サポート体制を整えています。</p>

    <div style="display:grid;grid-template-columns:1fr;gap:24px;max-width:900px;">

      <!-- Step 1 -->
      <div style="background:#F8FAFC;border:1px solid #E2E8F0;border-radius:16px;padding:36px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:28px;">
        <div style="flex-shrink:0;display:flex;flex-direction:column;align-items:center;gap:12px;">
          <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;">01</span>
          <div style="width:56px;height:56px;border-radius:50%;background:#0369A1;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(3,105,161,0.25);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
          </div>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;"><?php echo esc_html( get_theme_mod( 'operability_approach_1_title', '「作って終わり」にしない設計' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_approach_1_desc', '開発の最初から「リリース後にどう使うか」を一緒に考えます。将来の機能追加や担当者の交代まで想定した設計で、長く使えるシステムを作ります。' ) ); ?></p>
        </div>
      </div>

      <!-- Step 2 -->
      <div style="background:#F8FAFC;border:1px solid #E2E8F0;border-radius:16px;padding:36px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:28px;">
        <div style="flex-shrink:0;display:flex;flex-direction:column;align-items:center;gap:12px;">
          <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;">02</span>
          <div style="width:56px;height:56px;border-radius:50%;background:#0369A1;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(3,105,161,0.25);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
          </div>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;"><?php echo esc_html( get_theme_mod( 'operability_approach_2_title', '設計から運用まで、同じチームが担当' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_approach_2_desc', '開発したチームがそのまま運用もサポート。システムの中身を知り尽くした人間が対応するので、問い合わせへの回答も素早く、的確です。引き継ぎミスもありません。' ) ); ?></p>
        </div>
      </div>

      <!-- Step 3 -->
      <div style="background:#F8FAFC;border:1px solid #E2E8F0;border-radius:16px;padding:36px;box-shadow:0 1px 3px rgba(0,0,0,0.06);display:flex;align-items:flex-start;gap:28px;">
        <div style="flex-shrink:0;display:flex;flex-direction:column;align-items:center;gap:12px;">
          <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#CA8A04;letter-spacing:0.2em;">03</span>
          <div style="width:56px;height:56px;border-radius:50%;background:#CA8A04;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(202,138,4,0.25);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
          </div>
        </div>
        <div>
          <h3 style="font-family:'Noto Sans JP',sans-serif;font-size:18px;font-weight:700;color:#0F172A;margin:0 0 12px;"><?php echo esc_html( get_theme_mod( 'operability_approach_3_title', '問題を未然に防ぐ仕組みづくり' ) ); ?></h3>
          <p style="font-family:'Noto Sans JP',sans-serif;font-size:14px;color:#475569;line-height:1.9;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_approach_3_desc', 'トラブルが起きてから慌てるのではなく、異常を早期に検知して対処する仕組みを最初から組み込みます。「気づいたら直っていた」という安心感を提供します。' ) ); ?></p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== SECTION 4: 継続サポート体制 ===== -->
<section style="background:#F8FAFC;padding:120px 0 100px;overflow:hidden;">
  <div style="max-width:1280px;margin:0 auto;padding:0 40px;">
    <div style="margin-bottom:64px;">
      <div style="margin-bottom:12px;">
        <span style="font-family:'Poppins',sans-serif;font-size:clamp(56px,8vw,100px);font-weight:800;color:#E2E8F0;line-height:1;letter-spacing:-2px;user-select:none;">SUPPORT</span>
      </div>
      <div style="display:flex;align-items:center;gap:20px;margin-top:-16px;position:relative;z-index:1;">
        <div style="width:40px;height:3px;background:#0369A1;"></div>
        <span style="font-family:'Noto Sans JP',sans-serif;font-size:14px;font-weight:600;color:#0369A1;letter-spacing:0.15em;">リリース後も続く安心サポート</span>
      </div>
    </div>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:#475569;line-height:1.9;margin:0 0 56px;max-width:720px;"><?php echo esc_html( get_theme_mod( 'operability_support_intro', 'システムは完成してからが本番。AOi Baseではリリース後も継続的にサポートし、お客様のビジネス成長を支え続けます。' ) ); ?></p>

    <!-- フローステップ -->
    <div style="display:flex;align-items:flex-start;gap:16px;max-width:1000px;" class="support-flow">

      <!-- Step 1 -->
      <div class="support-step-card" style="flex:1;background:#fff;border:1px solid #E2E8F0;border-radius:16px;padding:28px 24px;text-align:center;">
        <div style="width:48px;height:48px;border-radius:50%;background:#EFF6FF;border:2px solid #BFDBFE;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0369A1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        </div>
        <div style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;margin-bottom:8px;">STEP 1</div>
        <h4 style="font-family:'Noto Sans JP',sans-serif;font-size:15px;font-weight:700;color:#0F172A;margin:0 0 8px;"><?php echo esc_html( get_theme_mod( 'operability_support_1_title', '定期点検' ) ); ?></h4>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:12px;color:#64748B;line-height:1.7;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_support_1_desc', '月次でシステムの状態を確認・報告' ) ); ?></p>
      </div>

      <!-- Arrow H -->
      <div class="support-arrow-h" style="flex-shrink:0;display:flex;align-items:center;padding-top:56px;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14m-4-4l4 4-4 4"/></svg>
      </div>
      <!-- Arrow V -->
      <div class="support-arrow-v" style="display:none;justify-content:center;padding:4px 0;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14m-4-4l4 4 4-4"/></svg>
      </div>

      <!-- Step 2 -->
      <div class="support-step-card" style="flex:1;background:#fff;border:1px solid #E2E8F0;border-radius:16px;padding:28px 24px;text-align:center;">
        <div style="width:48px;height:48px;border-radius:50%;background:#FEFCE8;border:2px solid #FDE68A;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#B45309" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
        </div>
        <div style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;margin-bottom:8px;">STEP 2</div>
        <h4 style="font-family:'Noto Sans JP',sans-serif;font-size:15px;font-weight:700;color:#0F172A;margin:0 0 8px;"><?php echo esc_html( get_theme_mod( 'operability_support_2_title', '改善提案' ) ); ?></h4>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:12px;color:#64748B;line-height:1.7;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_support_2_desc', '利用状況に基づいた機能改善のご提案' ) ); ?></p>
      </div>

      <!-- Arrow H -->
      <div class="support-arrow-h" style="flex-shrink:0;display:flex;align-items:center;padding-top:56px;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14m-4-4l4 4-4 4"/></svg>
      </div>
      <!-- Arrow V -->
      <div class="support-arrow-v" style="display:none;justify-content:center;padding:4px 0;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14m-4-4l4 4 4-4"/></svg>
      </div>

      <!-- Step 3 -->
      <div class="support-step-card" style="flex:1;background:#fff;border:1px solid #E2E8F0;border-radius:16px;padding:28px 24px;text-align:center;">
        <div style="width:48px;height:48px;border-radius:50%;background:#FFF1F2;border:2px solid #FECDD3;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#BE123C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
        </div>
        <div style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;margin-bottom:8px;">STEP 3</div>
        <h4 style="font-family:'Noto Sans JP',sans-serif;font-size:15px;font-weight:700;color:#0F172A;margin:0 0 8px;"><?php echo esc_html( get_theme_mod( 'operability_support_3_title', '迅速対応' ) ); ?></h4>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:12px;color:#64748B;line-height:1.7;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_support_3_desc', '不具合やご要望に素早く対応' ) ); ?></p>
      </div>

      <!-- Arrow H -->
      <div class="support-arrow-h" style="flex-shrink:0;display:flex;align-items:center;padding-top:56px;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14m-4-4l4 4-4 4"/></svg>
      </div>
      <!-- Arrow V -->
      <div class="support-arrow-v" style="display:none;justify-content:center;padding:4px 0;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14m-4-4l4 4 4-4"/></svg>
      </div>

      <!-- Step 4 -->
      <div class="support-step-card" style="flex:1;background:#fff;border:1px solid #E2E8F0;border-radius:16px;padding:28px 24px;text-align:center;">
        <div style="width:48px;height:48px;border-radius:50%;background:#F0FDF4;border:2px solid #BBF7D0;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#15803D" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
        </div>
        <div style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:700;color:#0369A1;letter-spacing:0.2em;margin-bottom:8px;">STEP 4</div>
        <h4 style="font-family:'Noto Sans JP',sans-serif;font-size:15px;font-weight:700;color:#0F172A;margin:0 0 8px;"><?php echo esc_html( get_theme_mod( 'operability_support_4_title', '成長支援' ) ); ?></h4>
        <p style="font-family:'Noto Sans JP',sans-serif;font-size:12px;color:#64748B;line-height:1.7;margin:0;"><?php echo esc_html( get_theme_mod( 'operability_support_4_desc', 'ビジネス拡大に合わせたシステム拡張' ) ); ?></p>
      </div>

    </div>
  </div>
</section>

<!-- ===== CTA SECTION ===== -->
<section style="background:#0F172A;padding:100px 0;overflow:hidden;position:relative;">
  <div style="position:absolute;top:-80px;right:-80px;width:400px;height:400px;background:radial-gradient(circle,rgba(202,138,4,0.1) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;bottom:-60px;left:5%;width:320px;height:320px;background:radial-gradient(circle,rgba(3,105,161,0.1) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:relative;z-index:1;max-width:800px;margin:0 auto;padding:0 40px;text-align:center;">
    <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(202,138,4,0.12);border:1px solid rgba(202,138,4,0.3);border-radius:100px;padding:5px 16px;margin-bottom:28px;">
      <span style="font-family:'Poppins',sans-serif;font-size:11px;font-weight:600;color:#CA8A04;letter-spacing:0.15em;">CONTACT US</span>
    </div>
    <h2 style="font-family:'Noto Sans JP',sans-serif;font-size:clamp(22px,3.5vw,36px);font-weight:700;color:#fff;line-height:1.6;margin:0 0 20px;"><?php echo esc_html( get_theme_mod( 'operability_cta_text', '今のシステム、運用に困っていませんか？' ) ); ?></h2>
    <p style="font-family:'Noto Sans JP',sans-serif;font-size:16px;color:rgba(255,255,255,0.6);line-height:1.9;margin:0 0 44px;">既存システムの運用改善から新規開発まで、お気軽にご相談ください。<br>まずは現状の課題整理から、一緒に最適な解決策を探しましょう。</p>
    <div style="display:flex;flex-wrap:wrap;gap:16px;justify-content:center;">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" style="display:inline-flex;align-items:center;gap:10px;background:#B45309;color:#fff;font-family:'Noto Sans JP',sans-serif;font-size:15px;font-weight:700;padding:16px 40px;border-radius:100px;text-decoration:none;transition:all 200ms;box-shadow:0 8px 24px rgba(180,83,9,0.35);" onmouseover="this.style.background='#D97706';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#B45309';this.style.transform='translateY(0)'">
        お問い合わせはこちら
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
