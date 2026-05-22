<?php
/**
 * Template: 開発の流れ
 * 固定ページスラッグ "flow" に自動適用
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// --- Editable content via Customizer ---
$flow_intro = get_theme_mod( 'flow_intro', 'ヒアリングから運用・保守まで、一貫した開発プロセスで' . "\n" . 'プロジェクトの成功をサポートします。' );

$flow_step_1_title    = get_theme_mod( 'flow_step_1_title', 'ヒアリング' );
$flow_step_1_desc     = get_theme_mod( 'flow_step_1_desc', '課題や目的を明確化するため、現状の業務フローやボトルネック、数値目標、ユーザー属性など、丁寧にお伺いいたします。既存システムについては運用状況について、使用ツール構成やデータの流れ、分断箇所、権限管理などの課題を整理いたします。ヒヤリングはもちろんオンラインにも対応し、画面共有などを通じて実運用ベースで把握いたします。' );
$flow_step_1_customer = get_theme_mod( 'flow_step_1_customer', "現状の課題や理想の姿を共有\n既存資料・参考サイトの提供" );
$flow_step_1_aoibase  = get_theme_mod( 'flow_step_1_aoibase', "要望の深掘り・実現に向けての整理\n概算スケジュール・予算感のご提示" );

$flow_step_2_title    = get_theme_mod( 'flow_step_2_title', '要件定義・設計' );
$flow_step_2_desc     = get_theme_mod( 'flow_step_2_desc', 'ヒアリング内容をもとに、画面設計・システム構成・技術選定を行います。ワイヤーフレームや要件定義書をご提示し、認識のズレがないよう確認します。' );
$flow_step_2_customer = get_theme_mod( 'flow_step_2_customer', "設計内容のレビュー・フィードバック\n優先順位の確定" );
$flow_step_2_aoibase  = get_theme_mod( 'flow_step_2_aoibase', "ワイヤーフレーム・要件定義書作成\n技術選定・スケジュール策定" );

$flow_step_3_title    = get_theme_mod( 'flow_step_3_title', '開発・実装' );
$flow_step_3_desc     = get_theme_mod( 'flow_step_3_desc', '開発開始後、定期的に進捗を共有し、方向性のズレを早期に解消します。品質を担保するコードレビュー・テストを徹底。' );
$flow_step_3_customer = get_theme_mod( 'flow_step_3_customer', "定期ミーティングでの進捗確認\n中間成果物へのフィードバック" );
$flow_step_3_aoibase  = get_theme_mod( 'flow_step_3_aoibase', "設計に基づく実装・コードレビュー\n自動テスト・品質管理" );

$flow_step_4_title    = get_theme_mod( 'flow_step_4_title', 'テスト・デプロイ' );
$flow_step_4_desc     = get_theme_mod( 'flow_step_4_desc', '機能テスト・パフォーマンステスト・セキュリティチェックを実施。お客様による受入テストを経て、本番環境へデプロイします。' );
$flow_step_4_customer = get_theme_mod( 'flow_step_4_customer', "受入テスト・最終確認\n公開タイミングの決定" );
$flow_step_4_aoibase  = get_theme_mod( 'flow_step_4_aoibase', "品質検証・セキュリティチェック\nデバッグ・デプロイ" );

$flow_step_5_title    = get_theme_mod( 'flow_step_5_title', '運用・保守' );
$flow_step_5_desc     = get_theme_mod( 'flow_step_5_desc', 'リリース後も継続的にサポート。障害対応・機能追加・パフォーマンス改善など、長期的な伴走体制を構築します。' );
$flow_step_5_customer = get_theme_mod( 'flow_step_5_customer', "運用中の課題・改善要望のフィードバック\n新機能のリクエスト" );
$flow_step_5_aoibase  = get_theme_mod( 'flow_step_5_aoibase', "監視・障害対応・定期メンテナンス\n機能改善・パフォーマンスチューニング" );
?>

<style>
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
</style>

<!-- ===== PAGE HEADER ===== -->
<section class="relative pt-32 pb-16 bg-white border-b border-[#E2E8F0] overflow-hidden">
  <div class="absolute inset-x-0 top-20 pointer-events-none select-none text-center">
    <h2 class="text-[clamp(4rem,12vw,9rem)] font-extrabold leading-none tracking-tight text-[#1B2A4A] opacity-[0.04] font-['Poppins']">FLOW</h2>
  </div>
  <div class="relative max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">FLOW</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4">開発の流れ</h1>
    <p class="text-sm md:text-base text-[#64748B] leading-relaxed max-w-2xl"><?php echo nl2br( esc_html( $flow_intro ) ); ?></p>
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
        <h3 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-4"><?php echo esc_html( $flow_step_1_title ); ?></h3>
        <p class="text-sm text-[#475569] leading-loose"><?php echo esc_html( $flow_step_1_desc ); ?></p>
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
            <?php foreach ( explode( "\n", $flow_step_1_customer ) as $task ) : ?>
              <?php $task = trim( $task ); if ( $task ) : ?>
                <li><?php echo esc_html( $task ); ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
        <div>
          <p class="text-xs font-bold text-[#CA8A04] tracking-wider font-['Poppins'] mb-2">AOi Base</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <?php foreach ( explode( "\n", $flow_step_1_aoibase ) as $task ) : ?>
              <?php $task = trim( $task ); if ( $task ) : ?>
                <li><?php echo esc_html( $task ); ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>

    <!-- Step 02 -->
    <div class="relative grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-6 md:gap-12 mb-20">
      <div class="md:text-right md:order-3">
        <span class="inline-block font-['Poppins'] text-5xl md:text-6xl font-extrabold text-[#BFDBFE] leading-none select-none mb-2">02</span>
        <h3 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-4"><?php echo esc_html( $flow_step_2_title ); ?></h3>
        <p class="text-sm text-[#475569] leading-loose"><?php echo esc_html( $flow_step_2_desc ); ?></p>
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
            <?php foreach ( explode( "\n", $flow_step_2_customer ) as $task ) : ?>
              <?php $task = trim( $task ); if ( $task ) : ?>
                <li><?php echo esc_html( $task ); ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
        <div>
          <p class="text-xs font-bold text-[#CA8A04] tracking-wider font-['Poppins'] mb-2">AOi Base</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <?php foreach ( explode( "\n", $flow_step_2_aoibase ) as $task ) : ?>
              <?php $task = trim( $task ); if ( $task ) : ?>
                <li><?php echo esc_html( $task ); ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>

    <!-- Step 03 -->
    <div class="relative grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-6 md:gap-12 mb-20">
      <div class="md:text-right">
        <span class="inline-block font-['Poppins'] text-5xl md:text-6xl font-extrabold text-[#BFDBFE] leading-none select-none mb-2">03</span>
        <h3 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-4"><?php echo esc_html( $flow_step_3_title ); ?></h3>
        <p class="text-sm text-[#475569] leading-loose"><?php echo esc_html( $flow_step_3_desc ); ?></p>
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
            <?php foreach ( explode( "\n", $flow_step_3_customer ) as $task ) : ?>
              <?php $task = trim( $task ); if ( $task ) : ?>
                <li><?php echo esc_html( $task ); ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
        <div>
          <p class="text-xs font-bold text-[#CA8A04] tracking-wider font-['Poppins'] mb-2">AOi Base</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <?php foreach ( explode( "\n", $flow_step_3_aoibase ) as $task ) : ?>
              <?php $task = trim( $task ); if ( $task ) : ?>
                <li><?php echo esc_html( $task ); ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>

    <!-- Step 04 -->
    <div class="relative grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-6 md:gap-12 mb-20">
      <div class="md:text-right md:order-3">
        <span class="inline-block font-['Poppins'] text-5xl md:text-6xl font-extrabold text-[#BFDBFE] leading-none select-none mb-2">04</span>
        <h3 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-4"><?php echo esc_html( $flow_step_4_title ); ?></h3>
        <p class="text-sm text-[#475569] leading-loose"><?php echo esc_html( $flow_step_4_desc ); ?></p>
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
            <?php foreach ( explode( "\n", $flow_step_4_customer ) as $task ) : ?>
              <?php $task = trim( $task ); if ( $task ) : ?>
                <li><?php echo esc_html( $task ); ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
        <div>
          <p class="text-xs font-bold text-[#CA8A04] tracking-wider font-['Poppins'] mb-2">AOi Base</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <?php foreach ( explode( "\n", $flow_step_4_aoibase ) as $task ) : ?>
              <?php $task = trim( $task ); if ( $task ) : ?>
                <li><?php echo esc_html( $task ); ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>

    <!-- Step 05 -->
    <div class="relative grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-6 md:gap-12">
      <div class="md:text-right">
        <span class="inline-block font-['Poppins'] text-5xl md:text-6xl font-extrabold text-[#FEF9C3] leading-none select-none mb-2">05</span>
        <h3 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-4"><?php echo esc_html( $flow_step_5_title ); ?></h3>
        <p class="text-sm text-[#475569] leading-loose"><?php echo esc_html( $flow_step_5_desc ); ?></p>
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
            <?php foreach ( explode( "\n", $flow_step_5_customer ) as $task ) : ?>
              <?php $task = trim( $task ); if ( $task ) : ?>
                <li><?php echo esc_html( $task ); ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
        <div>
          <p class="text-xs font-bold text-[#CA8A04] tracking-wider font-['Poppins'] mb-2">AOi Base</p>
          <ul class="text-sm text-[#475569] leading-loose list-disc list-inside">
            <?php foreach ( explode( "\n", $flow_step_5_aoibase ) as $task ) : ?>
              <?php $task = trim( $task ); if ( $task ) : ?>
                <li><?php echo esc_html( $task ); ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>
