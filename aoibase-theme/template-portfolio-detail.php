<?php
/**
 * Template Name: 開発事例詳細
 * Description: ポートフォリオ詳細ページ — 構造化プロセスフロー + ブロックエディタ
 */

get_header();

$portfolio_url = home_url( '/portfolio/' );

// Set up the page post
if ( have_posts() ) {
	the_post();
}

// Look up the corresponding achievement post by title match
global $wpdb;
$current_title  = get_the_title();
$achievement_id = $wpdb->get_var( $wpdb->prepare(
	"SELECT ID FROM {$wpdb->posts} WHERE post_title = %s AND post_type = 'achievement' AND post_status = 'publish' LIMIT 1",
	$current_title
) );

$has_achievement = ! empty( $achievement_id );

if ( $has_achievement ) {
	$a_period         = get_post_meta( $achievement_id, '_aoibase_period', true );
	$a_client         = get_post_meta( $achievement_id, '_aoibase_client_name', true );
	$a_url            = get_post_meta( $achievement_id, '_aoibase_project_url', true );
	$a_summary        = get_post_meta( $achievement_id, '_aoibase_summary', true );
	$a_background     = get_post_meta( $achievement_id, '_aoibase_background', true );
	$a_challenge      = get_post_meta( $achievement_id, '_aoibase_challenge', true );
	$a_solution       = get_post_meta( $achievement_id, '_aoibase_solution', true );
	$a_approach       = get_post_meta( $achievement_id, '_aoibase_approach', true );
	$a_outcome        = get_post_meta( $achievement_id, '_aoibase_outcome', true );
	$a_outcome_metric = get_post_meta( $achievement_id, '_aoibase_outcome_metric', true );
	$a_key_points     = get_post_meta( $achievement_id, '_aoibase_key_points', true );

	if ( empty( $a_approach ) && ! empty( $a_solution ) ) {
		$a_approach = $a_solution;
	}

	$tech_terms = wp_get_post_terms( $achievement_id, 'tech_stack' );
	if ( is_wp_error( $tech_terms ) ) {
		$tech_terms = array();
	}
	$cat_terms = wp_get_post_terms( $achievement_id, 'achievement_category' );
	if ( is_wp_error( $cat_terms ) ) {
		$cat_terms = array();
	}

	$has_process = ! empty( $a_challenge ) || ! empty( $a_approach ) || ! empty( $a_outcome );
}

$has_block_content = ! empty( trim( $post->post_content ) );
?>

<style>
  /* Block editor content */
  .pfd-content h2 { font-size: 1.5rem; font-weight: 700; color: #1B2A4A; margin: 2rem 0 0.75rem; }
  .pfd-content h3 { font-size: 1.25rem; font-weight: 700; color: #1B2A4A; margin: 1.5rem 0 0.5rem; }
  .pfd-content p  { font-size: 0.95rem; line-height: 1.85; color: #475569; margin: 0 0 1.25rem; }
  .pfd-content ul, .pfd-content ol { margin: 0 0 1.25rem 1.5rem; color: #475569; font-size: 0.95rem; line-height: 1.85; }
  .pfd-content li { margin-bottom: 0.4rem; }
  .pfd-content img { max-width: 100%; height: auto; border-radius: 12px; margin: 1.5rem 0; }
  .pfd-content figure { margin: 1.5rem 0; }
  .pfd-content figcaption { font-size: 0.8rem; color: #94A3B8; text-align: center; margin-top: 0.5rem; }
  .pfd-content blockquote { border-left: 4px solid #0369A1; padding: 1rem 1.5rem; margin: 1.5rem 0; background: #F8FAFC; border-radius: 0 8px 8px 0; }
  .pfd-content blockquote p { margin: 0; color: #1B2A4A; }
  .pfd-content a { color: #0369A1; text-decoration: underline; }
  .pfd-content a:hover { color: #1B2A4A; }
  .pfd-content .wp-block-columns { display: flex; gap: 1.5rem; margin: 1.5rem 0; }
  .pfd-content .wp-block-column { flex: 1; }

  /* Project Meta Bar */
  .pfd-meta-bar {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1px;
    background: #E2E8F0;
    border: 1px solid #E2E8F0;
    border-radius: 16px;
    overflow: hidden;
  }
  .pfd-meta-item {
    background: #fff;
    padding: 20px 24px;
  }
  .pfd-meta-label {
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.15em;
    color: #0369A1;
    text-transform: uppercase;
    font-family: 'Poppins', sans-serif;
    margin-bottom: 6px;
  }
  .pfd-meta-value {
    font-size: 0.9rem;
    font-weight: 600;
    color: #1B2A4A;
    line-height: 1.5;
  }

  /* Tech Stack badges */
  .pfd-tech-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
  }
  .pfd-tech-badge {
    display: inline-flex;
    align-items: center;
    padding: 4px 14px;
    font-size: 0.75rem;
    font-weight: 600;
    color: #0369A1;
    background: #EFF6FF;
    border-radius: 9999px;
    font-family: 'Poppins', sans-serif;
  }

  /* Section heading pattern */
  .pfd-section-heading { position: relative; margin-bottom: 2rem; }
  .pfd-section-bg-text {
    font-size: clamp(3rem, 8vw, 5rem);
    font-weight: 800;
    color: #1B2A4A;
    opacity: 0.04;
    font-family: 'Poppins', sans-serif;
    line-height: 1;
    pointer-events: none;
    user-select: none;
  }
  .pfd-section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1B2A4A;
    margin-top: -1.5rem;
    position: relative;
  }
  .pfd-section-bar {
    width: 48px;
    height: 2px;
    background: #0369A1;
    margin-top: 12px;
  }

  /* Process Timeline */
  .pfd-timeline {
    position: relative;
    padding-left: 48px;
  }
  .pfd-timeline::before {
    content: '';
    position: absolute;
    left: 19px;
    top: 24px;
    bottom: 24px;
    width: 2px;
    background: linear-gradient(180deg, #DC2626 0%, #0369A1 50%, #15803D 100%);
  }
  .pfd-step {
    position: relative;
    padding-bottom: 40px;
  }
  .pfd-step:last-child { padding-bottom: 0; }
  .pfd-step-badge {
    position: absolute;
    left: -48px;
    top: 0;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 800;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    z-index: 1;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
  }
  .pfd-step-badge--challenge { background: #DC2626; }
  .pfd-step-badge--approach  { background: #0369A1; }
  .pfd-step-badge--outcome   { background: #15803D; }
  .pfd-step-header {
    display: flex;
    align-items: baseline;
    gap: 10px;
    margin-bottom: 12px;
  }
  .pfd-step-title-ja {
    font-size: 1.15rem;
    font-weight: 700;
    color: #1B2A4A;
  }
  .pfd-step-title-en {
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    font-family: 'Poppins', sans-serif;
  }
  .pfd-step-title-en--challenge { color: #DC2626; }
  .pfd-step-title-en--approach  { color: #0369A1; }
  .pfd-step-title-en--outcome   { color: #15803D; }
  .pfd-step-body {
    font-size: 0.95rem;
    line-height: 1.85;
    color: #475569;
    padding: 20px 24px;
    background: #F8FAFC;
    border-radius: 12px;
    border: 1px solid #E2E8F0;
  }

  /* Key Points card */
  .pfd-keypoints {
    border-left: 4px solid #B45309;
    background: #FFFBEB;
    border-radius: 0 16px 16px 0;
    padding: 28px 32px;
  }
  .pfd-keypoints ul { margin: 0; padding-left: 1.25rem; }
  .pfd-keypoints li {
    font-size: 0.95rem;
    line-height: 1.85;
    color: #475569;
    margin-bottom: 8px;
  }
  .pfd-keypoints p {
    font-size: 0.95rem;
    line-height: 1.85;
    color: #475569;
    margin: 0 0 0.75rem;
  }

  @media (max-width: 640px) {
    .pfd-content .wp-block-columns { flex-direction: column; }
    .pfd-content h2 { font-size: 1.3rem; }
    .pfd-meta-bar { grid-template-columns: 1fr; }
    .pfd-timeline { padding-left: 40px; }
    .pfd-timeline::before { left: 15px; }
    .pfd-step-badge { left: -40px; width: 32px; height: 32px; font-size: 0.65rem; }
    .pfd-step-body { padding: 16px 18px; }
    .pfd-keypoints { padding: 20px 20px; }
    .pfd-section-title { font-size: 1.3rem; }
  }
</style>

<script type="application/ld+json">
<?php echo wp_json_encode( array(
	'@context'        => 'https://schema.org',
	'@type'           => 'BreadcrumbList',
	'itemListElement' => array(
		array( '@type' => 'ListItem', 'position' => 1, 'name' => 'TOP', 'item' => home_url( '/' ) ),
		array( '@type' => 'ListItem', 'position' => 2, 'name' => '開発事例', 'item' => $portfolio_url ),
		array( '@type' => 'ListItem', 'position' => 3, 'name' => get_the_title(), 'item' => get_permalink() ),
	),
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>
</script>

<!-- ===== PAGE HEADER ===== -->
<section class="relative pt-32 pb-16 bg-white border-b border-[#E2E8F0] overflow-hidden">
  <div class="absolute inset-x-0 top-20 pointer-events-none select-none text-center">
    <span class="text-[clamp(4rem,12vw,9rem)] font-extrabold leading-none tracking-tight text-[#1B2A4A] opacity-[0.04] font-['Poppins']" aria-hidden="true">PORTFOLIO</span>
  </div>
  <div class="relative max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">PORTFOLIO</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4"><?php the_title(); ?></h1>
    <?php if ( $has_achievement && ! empty( $a_summary ) ) : ?>
      <p class="text-sm md:text-base text-[#64748B] leading-relaxed max-w-2xl"><?php echo esc_html( $a_summary ); ?></p>
    <?php endif; ?>
    <nav aria-label="パンくずリスト" class="mt-6 text-xs text-[#94A3B8]">
      <ol class="inline-flex items-center gap-2 list-none p-0 m-0">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a></li>
        <li aria-hidden="true">›</li>
        <li><a href="<?php echo esc_url( $portfolio_url ); ?>" class="hover:text-[#0369A1] transition-colors">開発事例</a></li>
        <li aria-hidden="true">›</li>
        <li><span aria-current="page" class="text-[#475569]"><?php the_title(); ?></span></li>
      </ol>
    </nav>
  </div>
</section>

<?php if ( has_post_thumbnail() ) : ?>
<section class="py-8 md:py-12 bg-[#F8FAFC]">
  <div class="max-w-4xl mx-auto px-6">
    <?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-auto rounded-2xl shadow-sm' ) ); ?>
  </div>
</section>
<?php endif; ?>

<?php if ( $has_achievement ) : ?>

  <!-- ===== PROJECT META BAR ===== -->
  <?php
  $meta_items = array();
  if ( ! empty( $a_client ) ) {
      $meta_items[] = array( 'label' => 'CLIENT', 'value' => esc_html( $a_client ) );
  }
  if ( ! empty( $cat_terms ) ) {
      $cat_names = wp_list_pluck( $cat_terms, 'name' );
      $meta_items[] = array( 'label' => 'CATEGORY', 'value' => esc_html( implode( ' / ', $cat_names ) ) );
  }
  if ( ! empty( $a_period ) ) {
      $meta_items[] = array( 'label' => 'PERIOD', 'value' => esc_html( $a_period ) );
  }
  if ( ! empty( $a_url ) ) {
      $meta_items[] = array(
          'label' => 'PROJECT URL',
          'value' => '<a href="' . esc_url( $a_url ) . '" target="_blank" rel="noopener noreferrer" class="text-[#0369A1] hover:underline break-all">' . esc_html( preg_replace( '#^https?://#', '', $a_url ) ) . '</a>',
      );
  }
  ?>
  <?php if ( ! empty( $meta_items ) || ! empty( $tech_terms ) ) : ?>
  <section class="py-8 md:py-10 bg-white">
    <div class="max-w-4xl mx-auto px-6">
      <?php if ( ! empty( $meta_items ) ) : ?>
      <div class="pfd-meta-bar mb-6">
        <?php foreach ( $meta_items as $item ) : ?>
        <div class="pfd-meta-item">
          <div class="pfd-meta-label"><?php echo $item['label']; ?></div>
          <div class="pfd-meta-value"><?php echo $item['value']; ?></div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
      <?php if ( ! empty( $tech_terms ) ) : ?>
      <div>
        <div class="pfd-meta-label mb-2">TECH STACK</div>
        <div class="pfd-tech-badges">
          <?php foreach ( $tech_terms as $term ) : ?>
            <span class="pfd-tech-badge"><?php echo esc_html( $term->name ); ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>

  <!-- ===== BACKGROUND ===== -->
  <?php if ( ! empty( $a_background ) ) : ?>
  <section class="py-12 md:py-16 bg-[#F8FAFC]">
    <div class="max-w-4xl mx-auto px-6">
      <div class="pfd-section-heading">
        <div class="pfd-section-bg-text" aria-hidden="true">BACKGROUND</div>
        <h2 class="pfd-section-title">プロジェクトの背景</h2>
        <div class="pfd-section-bar"></div>
      </div>
      <div class="text-sm md:text-base text-[#475569] leading-relaxed">
        <?php echo wp_kses_post( $a_background ); ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ===== PROCESS ===== -->
  <?php if ( $has_process ) : ?>
  <section class="py-12 md:py-16 bg-white">
    <div class="max-w-4xl mx-auto px-6">
      <div class="pfd-section-heading">
        <div class="pfd-section-bg-text" aria-hidden="true">PROCESS</div>
        <h2 class="pfd-section-title">課題解決プロセス</h2>
        <div class="pfd-section-bar"></div>
      </div>

      <div class="pfd-timeline">
        <?php if ( ! empty( $a_challenge ) ) : ?>
        <div class="pfd-step">
          <div class="pfd-step-badge pfd-step-badge--challenge">01</div>
          <div class="pfd-step-header">
            <span class="pfd-step-title-ja">課題</span>
            <span class="pfd-step-title-en pfd-step-title-en--challenge">CHALLENGE</span>
          </div>
          <div class="pfd-step-body"><?php echo wp_kses_post( $a_challenge ); ?></div>
        </div>
        <?php endif; ?>

        <?php if ( ! empty( $a_approach ) ) : ?>
        <div class="pfd-step">
          <div class="pfd-step-badge pfd-step-badge--approach">02</div>
          <div class="pfd-step-header">
            <span class="pfd-step-title-ja">アプローチ</span>
            <span class="pfd-step-title-en pfd-step-title-en--approach">APPROACH</span>
          </div>
          <div class="pfd-step-body"><?php echo wp_kses_post( $a_approach ); ?></div>
        </div>
        <?php endif; ?>

        <?php if ( ! empty( $a_outcome ) ) : ?>
        <div class="pfd-step">
          <div class="pfd-step-badge pfd-step-badge--outcome">03</div>
          <div class="pfd-step-header">
            <span class="pfd-step-title-ja">成果</span>
            <span class="pfd-step-title-en pfd-step-title-en--outcome">OUTCOME</span>
          </div>
          <div class="pfd-step-body">
            <?php echo wp_kses_post( $a_outcome ); ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- ===== KEY POINTS ===== -->
  <?php if ( ! empty( $a_key_points ) ) : ?>
  <section class="py-12 md:py-16 bg-[#F8FAFC]">
    <div class="max-w-4xl mx-auto px-6">
      <div class="pfd-section-heading">
        <div class="pfd-section-bg-text" aria-hidden="true">KEY POINTS</div>
        <h2 class="pfd-section-title">ポイント</h2>
        <div class="pfd-section-bar"></div>
      </div>
      <div class="pfd-keypoints">
        <?php echo wp_kses_post( $a_key_points ); ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

<?php endif; ?>

<!-- ===== CONTENT (Block Editor) ===== -->
<?php if ( $has_block_content ) : ?>
<section class="py-12 md:py-16 bg-white">
  <div class="pfd-content max-w-4xl mx-auto px-6">
    <?php the_content(); ?>
  </div>
</section>
<?php endif; ?>

<!-- ===== BACK LINK ===== -->
<section class="pb-16 bg-white">
  <div class="max-w-4xl mx-auto px-6 text-center">
    <a href="<?php echo esc_url( $portfolio_url ); ?>" class="inline-flex items-center gap-2 px-8 py-3 border-2 border-[#0369A1] text-[#0369A1] text-sm font-bold rounded-full hover:bg-[#0369A1] hover:text-white transition-all duration-200">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
      開発事例一覧に戻る
    </a>
  </div>
</section>

<?php get_footer(); ?>
