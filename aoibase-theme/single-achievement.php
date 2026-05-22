<?php
/**
 * Template: Single Achievement
 *
 * 事例（CPT: achievement）の詳細ページテンプレート。
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( have_posts() ) :
    while ( have_posts() ) : the_post();

        // Meta 値の取得
        $aoibase_summary        = get_post_meta( get_the_ID(), '_aoibase_summary', true );
        $aoibase_period         = get_post_meta( get_the_ID(), '_aoibase_period', true );
        $aoibase_client_name    = get_post_meta( get_the_ID(), '_aoibase_client_name', true );
        $aoibase_project_url    = get_post_meta( get_the_ID(), '_aoibase_project_url', true );
        $aoibase_challenge      = get_post_meta( get_the_ID(), '_aoibase_challenge', true );
        $aoibase_solution       = get_post_meta( get_the_ID(), '_aoibase_solution', true );
        $aoibase_outcome        = get_post_meta( get_the_ID(), '_aoibase_outcome', true );
        $aoibase_outcome_metric = get_post_meta( get_the_ID(), '_aoibase_outcome_metric', true );
        $aoibase_gallery_ids    = get_post_meta( get_the_ID(), '_aoibase_gallery_ids', true );

        // タクソノミー
        $achievement_categories = get_the_terms( get_the_ID(), 'achievement_category' );

        $primary_category = ( is_array( $achievement_categories ) && ! empty( $achievement_categories ) )
            ? $achievement_categories[0]
            : null;

        $page_title       = get_the_title();
        $excerpt_fallback = $aoibase_summary ? $aoibase_summary : get_the_excerpt();

get_header();
?>

<style>
  .achievement-content { color: #0F172A; line-height: 1.9; font-size: 16px; }
  .achievement-content h2 { font-size: 24px; font-weight: 700; color: #1B2A4A; margin: 48px 0 16px; padding-left: 16px; border-left: 4px solid #0369A1; }
  .achievement-content h3 { font-size: 20px; font-weight: 700; color: #1B2A4A; margin: 36px 0 12px; }
  .achievement-content p { margin: 0 0 20px; }
  .achievement-content ul, .achievement-content ol { margin: 0 0 20px; padding-left: 1.5em; }
  .achievement-content li { margin-bottom: 8px; }
  .achievement-content a { color: #0369A1; text-decoration: underline; }
  .achievement-content a:hover { color: #B45309; }
  .achievement-content img { max-width: 100%; height: auto; border-radius: 8px; margin: 24px 0; }
  .achievement-content blockquote { border-left: 4px solid #CA8A04; background: #F8FAFC; padding: 16px 24px; margin: 24px 0; color: #475569; font-style: italic; }

  /* === Mobile aspect 3:4 for RELATED works cards === */
  @media (max-width: 640px) {
    .related-card { aspect-ratio: 3 / 4; display: flex; flex-direction: column; }
    .related-card .relative.h-52 { height: 50% !important; flex-shrink: 0; }
    .related-card .p-6 { padding: 10px 12px !important; flex: 1; display: flex; flex-direction: column; overflow: hidden; }
    .related-card .p-6 > span { font-size: 9px !important; padding: 2px 8px !important; margin-bottom: 6px !important; }
    .related-card .p-6 h3 { font-size: 12px !important; margin-bottom: 4px !important; line-height: 1.3 !important; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .related-card .p-6 > p { font-size: 10px !important; line-height: 1.5 !important; margin-bottom: 6px !important; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .related-card .p-6 .flex.items-center span { font-size: 10px !important; }
    .related-card .p-6 .flex.items-center svg { width: 12px !important; height: 12px !important; }
  }
</style>

<script type="application/ld+json">
<?php echo wp_json_encode( array(
  '@context' => 'https://schema.org',
  '@type'    => 'BreadcrumbList',
  'itemListElement' => array(
    array( '@type' => 'ListItem', 'position' => 1, 'name' => 'TOP', 'item' => home_url( '/' ) ),
    array( '@type' => 'ListItem', 'position' => 2, 'name' => '事例', 'item' => get_post_type_archive_link( 'achievement' ) ),
    array( '@type' => 'ListItem', 'position' => 3, 'name' => $page_title, 'item' => get_permalink() ),
  ),
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>
</script>

<!-- ===== HERO + 概要 ===== -->
<section class="relative pt-20">
  <?php if ( has_post_thumbnail() ) : ?>
    <div class="relative w-full overflow-hidden" style="height:40svh;min-height:280px;">
      <?php the_post_thumbnail( 'full', array( 'class' => 'absolute inset-0 w-full h-full object-cover', 'loading' => 'eager' ) ); ?>
      <div class="absolute inset-0" style="background:linear-gradient(120deg,rgba(27,42,74,0.72) 0%,rgba(15,23,42,0.55) 60%,rgba(3,105,161,0.35) 100%);"></div>
    </div>
  <?php else : ?>
    <div class="relative w-full" style="height:40svh;min-height:280px;background:linear-gradient(135deg,#1B2A4A 0%,#0369A1 60%,#0F172A 100%);">
      <div class="absolute inset-0" style="background:linear-gradient(120deg,rgba(27,42,74,0.55) 0%,transparent 100%);"></div>
    </div>
  <?php endif; ?>

  <div class="max-w-7xl mx-auto px-6 relative">
    <div class="bg-white rounded-2xl shadow-xl border border-[#E2E8F0]/60 p-8 md:p-12 -mt-20 md:-mt-24 relative z-10">
      <nav aria-label="パンくずリスト" class="text-xs text-[#94A3B8] mb-5">
        <ol class="inline-flex items-center gap-2 list-none p-0 m-0">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a></li>
          <li aria-hidden="true">&#8250;</li>
          <li><a href="<?php echo esc_url( get_post_type_archive_link( 'achievement' ) ); ?>" class="hover:text-[#0369A1] transition-colors">事例</a></li>
          <li aria-hidden="true">&#8250;</li>
          <li><span aria-current="page" class="text-[#475569]"><?php echo esc_html( $page_title ); ?></span></li>
        </ol>
      </nav>
      <p class="text-[#0369A1] tracking-[0.3em] uppercase text-xs font-bold font-['Poppins'] mb-3">WORKS</p>
      <?php if ( $primary_category ) : ?>
        <span class="inline-block px-3 py-1 text-xs font-semibold text-[#0369A1] bg-[#EFF6FF] rounded-full font-['Poppins'] mb-4"><?php echo esc_html( $primary_category->name ); ?></span>
      <?php endif; ?>
      <h1 class="text-3xl md:text-5xl font-bold text-[#1B2A4A] leading-tight mb-6"><?php echo esc_html( $page_title ); ?></h1>
      <?php if ( ! empty( $excerpt_fallback ) ) : ?>
        <p class="text-base md:text-lg text-[#475569] leading-relaxed max-w-3xl"><?php echo esc_html( $excerpt_fallback ); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ===== PROJECT META BAR ===== -->
<section class="bg-[#F8FAFC] py-10 md:py-12 mt-12">
  <div class="max-w-7xl mx-auto px-6">
    <dl class="grid grid-cols-3 gap-8 md:gap-6">
      <div>
        <dt class="text-[10px] font-bold tracking-[0.25em] text-[#94A3B8] uppercase font-['Poppins'] mb-2">CLIENT</dt>
        <dd class="text-sm md:text-base font-semibold text-[#1B2A4A]"><?php echo $aoibase_client_name ? esc_html( $aoibase_client_name ) : '&mdash;'; ?></dd>
      </div>
      <div>
        <dt class="text-[10px] font-bold tracking-[0.25em] text-[#94A3B8] uppercase font-['Poppins'] mb-2">CATEGORY</dt>
        <dd class="text-sm md:text-base font-semibold text-[#1B2A4A]"><?php echo $primary_category ? esc_html( $primary_category->name ) : '&mdash;'; ?></dd>
      </div>
      <div>
        <dt class="text-[10px] font-bold tracking-[0.25em] text-[#94A3B8] uppercase font-['Poppins'] mb-2">PROJECT URL</dt>
        <dd>
          <?php if ( ! empty( $aoibase_project_url ) ) : ?>
            <a href="<?php echo esc_url( $aoibase_project_url ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#0369A1] hover:text-[#B45309] transition-colors duration-200 font-['Poppins']">
              VISIT
              <svg class="w-3.5 h-3.5" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
          <?php else : ?>
            <span class="text-sm font-semibold text-[#94A3B8]">&mdash;</span>
          <?php endif; ?>
        </dd>
      </div>
    </dl>
  </div>
</section>

<?php
$content_raw = get_the_content();
if ( ! empty( trim( wp_strip_all_tags( $content_raw ) ) ) ) :
?>
<!-- ===== CONTENT BODY ===== -->
<section class="py-16 md:py-20 bg-white">
  <div class="max-w-3xl mx-auto px-6">
    <div class="achievement-content text-[#0F172A] leading-relaxed">
      <?php the_content(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
// CHALLENGE / SOLUTION / OUTCOME カードの表示判定
$has_challenge = ! empty( trim( wp_strip_all_tags( $aoibase_challenge ) ) );
$has_solution  = ! empty( trim( wp_strip_all_tags( $aoibase_solution ) ) );
$has_outcome   = ! empty( trim( wp_strip_all_tags( $aoibase_outcome ) ) );
$cso_show      = $has_challenge || $has_solution || $has_outcome;
if ( $cso_show ) :
?>
<!-- ===== CHALLENGE / SOLUTION / OUTCOME ===== -->
<section class="py-20 bg-[#F8FAFC]">
  <div class="max-w-7xl mx-auto px-6">
    <div class="mb-12 text-center">
      <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']">PROJECT BREAKDOWN</p>
      <h2 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] font-['Noto_Sans_JP']">課題・解決・成果</h2>
      <div class="mt-4 mx-auto w-12 h-0.5 bg-[#0369A1]"></div>
    </div>
    <!-- Hidden data for modal -->
    <div id="detail-data-challenge" class="hidden"><?php echo wp_kses_post( $aoibase_challenge ); ?></div>
    <div id="detail-data-solution" class="hidden"><?php echo wp_kses_post( $aoibase_solution ); ?></div>
    <div id="detail-data-outcome" class="hidden"><?php echo wp_kses_post( $aoibase_outcome ); ?></div>

    <!-- Mobile: compact cards with modal trigger -->
    <div class="md:hidden space-y-3">
      <?php if ( $has_challenge ) : ?>
      <button onclick="openDetailModal('challenge')" class="w-full flex items-center gap-4 bg-white rounded-xl p-4 shadow-sm border border-[#F1F5F9] text-left">
        <div class="w-10 h-10 rounded-lg bg-[#FEF2F2] flex items-center justify-center flex-shrink-0">
          <svg class="w-5 h-5 text-[#DC2626]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div class="flex-1 min-w-0">
          <p class="text-xs font-bold tracking-widest text-[#DC2626] font-['Poppins'] uppercase">Challenge</p>
          <p class="text-sm font-bold text-[#1B2A4A]">課題</p>
        </div>
        <span class="text-xs text-[#94A3B8] flex-shrink-0">詳しくみる →</span>
      </button>
      <?php endif; ?>
      <?php if ( $has_solution ) : ?>
      <button onclick="openDetailModal('solution')" class="w-full flex items-center gap-4 bg-white rounded-xl p-4 shadow-sm border border-[#F1F5F9] text-left">
        <div class="w-10 h-10 rounded-lg bg-[#EFF6FF] flex items-center justify-center flex-shrink-0">
          <svg class="w-5 h-5 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
        </div>
        <div class="flex-1 min-w-0">
          <p class="text-xs font-bold tracking-widest text-[#0369A1] font-['Poppins'] uppercase">Solution</p>
          <p class="text-sm font-bold text-[#1B2A4A]">解決策</p>
        </div>
        <span class="text-xs text-[#94A3B8] flex-shrink-0">詳しくみる →</span>
      </button>
      <?php endif; ?>
      <?php if ( $has_outcome ) : ?>
      <button onclick="openDetailModal('outcome')" class="w-full flex items-center gap-4 bg-white rounded-xl p-4 shadow-sm border border-[#F1F5F9] text-left">
        <div class="w-10 h-10 rounded-lg bg-[#F0FDF4] flex items-center justify-center flex-shrink-0">
          <svg class="w-5 h-5 text-[#15803D]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
        </div>
        <div class="flex-1 min-w-0">
          <p class="text-xs font-bold tracking-widest text-[#15803D] font-['Poppins'] uppercase">Outcome</p>
          <p class="text-sm font-bold text-[#1B2A4A]">成果</p>
        </div>
        <span class="text-xs text-[#94A3B8] flex-shrink-0">詳しくみる →</span>
      </button>
      <?php endif; ?>
    </div>

    <!-- PC: original 3-column layout (hidden on mobile) -->
    <div class="hidden md:grid md:grid-cols-3 gap-4 md:gap-8 pb-4 md:pb-0">
      <?php if ( $has_challenge ) : ?>
        <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-200 p-6 md:p-8 border border-[#E2E8F0]/60 flex-shrink-0 basis-[280px] md:basis-auto snap-start">
          <div class="w-12 h-12 rounded-full bg-[#0369A1] text-white flex items-center justify-center mb-5 font-['Poppins'] font-bold text-sm">01</div>
          <h3 class="text-xl font-bold text-[#1B2A4A] mb-4">課題</h3>
          <div class="text-sm text-[#475569] leading-loose"><?php echo wp_kses_post( $aoibase_challenge ); ?></div>
        </div>
      <?php endif; ?>
      <?php if ( $has_solution ) : ?>
        <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-200 p-6 md:p-8 border border-[#E2E8F0]/60 flex-shrink-0 basis-[280px] md:basis-auto snap-start">
          <div class="w-12 h-12 rounded-full bg-[#0369A1] text-white flex items-center justify-center mb-5 font-['Poppins'] font-bold text-sm">02</div>
          <h3 class="text-xl font-bold text-[#1B2A4A] mb-4">解決</h3>
          <div class="text-sm text-[#475569] leading-loose"><?php echo wp_kses_post( $aoibase_solution ); ?></div>
        </div>
      <?php endif; ?>
      <?php if ( $has_outcome ) : ?>
        <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-200 p-6 md:p-8 border border-[#E2E8F0]/60 flex-shrink-0 basis-[280px] md:basis-auto snap-start">
          <div class="w-12 h-12 rounded-full bg-[#0369A1] text-white flex items-center justify-center mb-5 font-['Poppins'] font-bold text-sm">03</div>
          <h3 class="text-xl font-bold text-[#1B2A4A] mb-4">成果</h3>
          <div class="text-sm text-[#475569] leading-loose mb-4"><?php echo wp_kses_post( $aoibase_outcome ); ?></div>
          <?php if ( ! empty( $aoibase_outcome_metric ) ) : ?>
            <div class="flex items-center gap-1.5 text-[#CA8A04] mt-4 pt-4 border-t border-[#F1F5F9]">
              <svg class="w-4 h-4" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
              <span class="text-xs font-bold font-['Poppins']"><?php echo esc_html( $aoibase_outcome_metric ); ?></span>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
// Gallery
$gallery_image_ids = array();
if ( ! empty( $aoibase_gallery_ids ) ) {
    $raw_ids = array_filter( array_map( 'trim', explode( ',', $aoibase_gallery_ids ) ) );
    foreach ( $raw_ids as $maybe_id ) {
        $id = absint( $maybe_id );
        if ( $id > 0 ) {
            $gallery_image_ids[] = $id;
        }
    }
}
if ( ! empty( $gallery_image_ids ) ) :
?>
<!-- ===== GALLERY ===== -->
<section class="py-16 md:py-20 bg-[#F8FAFC]">
  <div class="max-w-7xl mx-auto px-6">
    <div class="mb-10">
      <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']">GALLERY</p>
      <h2 class="text-2xl md:text-3xl font-bold text-[#1B2A4A] font-['Noto_Sans_JP']">プロジェクトギャラリー</h2>
      <div class="mt-3 w-12 h-0.5 bg-[#0369A1]"></div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
      <?php foreach ( $gallery_image_ids as $img_id ) :
          $full_url  = wp_get_attachment_image_url( $img_id, 'full' );
          $thumb_img = wp_get_attachment_image( $img_id, 'large', false, array(
              'class'   => 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-105',
              'loading' => 'lazy',
          ) );
          if ( ! $thumb_img || ! $full_url ) {
              continue;
          }
      ?>
        <a href="<?php echo esc_url( $full_url ); ?>" target="_blank" rel="noopener noreferrer" class="group block relative overflow-hidden rounded-xl bg-white aspect-[4/3] shadow-sm hover:shadow-xl transition-all duration-200">
          <?php echo wp_kses_post( $thumb_img ); ?>
          <div class="absolute inset-0 bg-[#1B2A4A]/0 group-hover:bg-[#1B2A4A]/30 transition-all duration-200 flex items-center justify-center">
            <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ! empty( $aoibase_client_name ) || ! empty( $aoibase_project_url ) ) : ?>
<!-- ===== CLIENT INFO ===== -->
<section class="py-16 md:py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    <div class="bg-white rounded-2xl shadow-lg border border-[#E2E8F0]/60 p-8 md:p-12">
      <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']">CLIENT</p>
      <h2 class="text-2xl md:text-3xl font-bold text-[#1B2A4A] mb-2">クライアント情報</h2>
      <div class="w-10 h-0.5 bg-[#0369A1] mb-6"></div>
      <dl class="text-sm space-y-3">
        <?php if ( ! empty( $aoibase_client_name ) ) : ?>
          <div class="flex flex-col md:flex-row md:items-center border-b border-[#E2E8F0] pb-3">
            <dt class="md:w-32 shrink-0 text-xs font-semibold text-[#1B2A4A] mb-1 md:mb-0">クライアント</dt>
            <dd class="text-[#475569]"><?php echo esc_html( $aoibase_client_name ); ?></dd>
          </div>
        <?php endif; ?>
        <?php if ( ! empty( $aoibase_project_url ) ) : ?>
          <div class="flex flex-col md:flex-row md:items-center pb-1">
            <dt class="md:w-32 shrink-0 text-xs font-semibold text-[#1B2A4A] mb-1 md:mb-0">プロジェクトURL</dt>
            <dd>
              <a href="<?php echo esc_url( $aoibase_project_url ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-[#0369A1] hover:text-[#B45309] transition-colors duration-200 font-['Poppins'] font-semibold break-all">
                <?php echo esc_html( $aoibase_project_url ); ?>
                <svg class="w-3.5 h-3.5 shrink-0" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
              </a>
            </dd>
          </div>
        <?php endif; ?>
      </dl>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
$prev_post = get_previous_post( true, '', 'achievement_category' );
$next_post = get_next_post( true, '', 'achievement_category' );
if ( $prev_post || $next_post ) :
?>
<!-- ===== PREV / NEXT NAV ===== -->
<section class="py-12 md:py-16 bg-white border-t border-[#E2E8F0]">
  <div class="max-w-7xl mx-auto px-6">
    <nav class="grid grid-cols-1 md:grid-cols-2 gap-6" aria-label="実績の前後ナビゲーション">
      <?php if ( $prev_post ) : ?>
        <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" class="group flex items-center gap-4 p-6 bg-[#F8FAFC] rounded-2xl hover:bg-white hover:shadow-lg transition-all duration-200">
          <svg class="w-6 h-6 text-[#0369A1] shrink-0 group-hover:-translate-x-1 transition-transform" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
          <div class="flex-1 min-w-0">
            <p class="text-xs font-bold tracking-[0.25em] text-[#94A3B8] uppercase font-['Poppins'] mb-1">PREVIOUS</p>
            <p class="text-sm md:text-base font-bold text-[#1B2A4A] group-hover:text-[#0369A1] transition-colors truncate"><?php echo esc_html( get_the_title( $prev_post ) ); ?></p>
          </div>
        </a>
      <?php else : ?>
        <div></div>
      <?php endif; ?>
      <?php if ( $next_post ) : ?>
        <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" class="group flex items-center justify-end gap-4 p-6 bg-[#F8FAFC] rounded-2xl hover:bg-white hover:shadow-lg transition-all duration-200 text-right">
          <div class="flex-1 min-w-0">
            <p class="text-xs font-bold tracking-[0.25em] text-[#94A3B8] uppercase font-['Poppins'] mb-1">NEXT</p>
            <p class="text-sm md:text-base font-bold text-[#1B2A4A] group-hover:text-[#0369A1] transition-colors truncate"><?php echo esc_html( get_the_title( $next_post ) ); ?></p>
          </div>
          <svg class="w-6 h-6 text-[#0369A1] shrink-0 group-hover:translate-x-1 transition-transform" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
      <?php endif; ?>
    </nav>
  </div>
</section>
<?php endif; ?>

<?php
// 関連実績クエリ
$related_query = null;
if ( $primary_category ) {
    $related_query = new WP_Query( array(
        'post_type'           => 'achievement',
        'posts_per_page'      => 3,
        'post__not_in'        => array( get_the_ID() ),
        'no_found_rows'       => true,
        'ignore_sticky_posts' => true,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'tax_query'           => array(
            array(
                'taxonomy' => 'achievement_category',
                'field'    => 'term_id',
                'terms'    => array( $primary_category->term_id ),
            ),
        ),
    ) );
}
if ( $related_query && $related_query->have_posts() ) :
?>
<!-- ===== RELATED WORKS ===== -->
<section class="py-20 bg-[#F8FAFC]">
  <div class="max-w-7xl mx-auto px-6">
    <div class="mb-12">
      <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']">RELATED WORKS</p>
      <h2 class="text-3xl md:text-4xl font-bold text-[#1B2A4A]">同カテゴリの実績</h2>
      <div class="mt-3 w-12 h-0.5 bg-[#0369A1]"></div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-6">
      <?php while ( $related_query->have_posts() ) : $related_query->the_post();
          $r_summary  = get_post_meta( get_the_ID(), '_aoibase_summary', true );
          $r_metric   = get_post_meta( get_the_ID(), '_aoibase_outcome_metric', true );
          $r_cats     = get_the_terms( get_the_ID(), 'achievement_category' );
          $r_cat_name = ( is_array( $r_cats ) && ! empty( $r_cats ) ) ? $r_cats[0]->name : '';
      ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="related-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-200 cursor-pointer block">
          <div class="relative h-52 overflow-hidden bg-gradient-to-br from-[#0369A1] to-[#1B2A4A] flex items-center justify-center">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'medium_large', array( 'class' => 'absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105', 'loading' => 'lazy' ) ); ?>
              <div class="absolute inset-0 bg-[#1B2A4A]/20 group-hover:bg-[#1B2A4A]/40 transition-all duration-200"></div>
            <?php else : ?>
              <svg class="w-16 h-16 text-white/20" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7"/></svg>
            <?php endif; ?>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-[#CA8A04] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200 origin-left z-10"></div>
          </div>
          <div class="p-6">
            <?php if ( $r_cat_name ) : ?>
              <span class="inline-block px-3 py-1 text-xs font-semibold text-[#0369A1] bg-[#EFF6FF] rounded-full font-['Poppins'] mb-3"><?php echo esc_html( $r_cat_name ); ?></span>
            <?php endif; ?>
            <h3 class="text-base font-bold text-[#1B2A4A] mb-2 group-hover:text-[#0369A1] transition-colors duration-200"><?php the_title(); ?></h3>
            <?php if ( ! empty( $r_summary ) ) : ?>
              <p class="text-sm text-[#475569] leading-relaxed mb-4"><?php echo esc_html( wp_trim_words( wp_strip_all_tags( $r_summary ), 40, '...' ) ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $r_metric ) ) : ?>
              <div class="flex items-center gap-1 text-[#CA8A04]">
                <svg class="w-4 h-4" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                <span class="text-xs font-bold font-['Poppins']"><?php echo esc_html( $r_metric ); ?></span>
              </div>
            <?php endif; ?>
          </div>
        </a>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Detail Modal -->
<div id="detail-modal" class="fixed inset-0 z-50 hidden" onclick="if(event.target===this)closeDetailModal()">
  <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
  <div class="relative flex items-center justify-center min-h-full p-4">
    <div class="bg-white rounded-2xl w-full max-w-lg max-h-[80vh] overflow-y-auto shadow-2xl -mt-[10vh] md:mt-0">
      <div class="sticky top-0 bg-white border-b border-[#F1F5F9] px-6 py-4 flex items-center justify-between rounded-t-2xl">
        <h3 id="modal-title" class="text-lg font-bold text-[#1B2A4A]"></h3>
        <button onclick="closeDetailModal()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-[#F1F5F9] transition-colors">
          <svg class="w-5 h-5 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      <div id="modal-content" class="px-6 py-5 text-sm text-[#475569] leading-relaxed achievement-content"></div>
    </div>
  </div>
</div>

<script>
// Detail Modal (page-specific)
function openDetailModal(type) {
  var titles = { challenge: '課題', solution: '解決策', outcome: '成果' };
  var el = document.getElementById('detail-data-' + type);
  if (!el) return;
  document.getElementById('modal-title').textContent = titles[type] || '';
  document.getElementById('modal-content').innerHTML = el.innerHTML;
  document.getElementById('detail-modal').classList.remove('hidden');
  document.body.style.overflow = 'hidden';
}
function closeDetailModal() {
  document.getElementById('detail-modal').classList.add('hidden');
  document.body.style.overflow = '';
}
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') closeDetailModal();
});
</script>

<?php
get_footer();

    endwhile;
endif;
