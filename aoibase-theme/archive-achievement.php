<?php
/**
 * Template: 事例一覧（achievement カスタム投稿アーカイブ）
 * ジャンル（achievement_category）別セクション表示
 */

get_header();

$genres = get_terms( array(
    'taxonomy'   => 'achievement_category',
    'hide_empty' => true,
    'orderby'    => 'term_order',
    'order'      => 'ASC',
) );

$has_genres = ! is_wp_error( $genres ) && ! empty( $genres );
?>

<style>
  .pickup-card-shadow { box-shadow: 0 4px 24px rgba(15, 23, 42, 0.06); }
  .pickup-card-shadow:hover { box-shadow: 0 12px 40px rgba(3, 105, 161, 0.12); }
  .works-card { position: relative; }
  .works-card .stretched-link::after { content: ''; position: absolute; inset: 0; z-index: 1; }
  .works-card .stretched-link { position: static; }
  @media (max-width: 640px) {
    .genre-hero-grid { grid-template-columns: 1fr !important; }
    .genre-hero-thumb { height: 12rem !important; }
  }
</style>

<script type="application/ld+json">
<?php echo wp_json_encode( array(
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => array(
        array( '@type' => 'ListItem', 'position' => 1, 'name' => 'TOP', 'item' => home_url( '/' ) ),
        array( '@type' => 'ListItem', 'position' => 2, 'name' => '事例', 'item' => get_post_type_archive_link( 'achievement' ) ),
    ),
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>
</script>

<!-- ===== PAGE HEADER ===== -->
<section class="relative pt-20 pb-16 bg-white border-b border-[#E2E8F0] overflow-hidden">
  <div class="absolute inset-x-0 top-8 pointer-events-none select-none text-center">
    <span class="text-[clamp(4rem,12vw,9rem)] font-extrabold leading-none tracking-tight text-[#1B2A4A] opacity-[0.04] font-['Poppins']">WORKS</span>
  </div>
  <div class="relative max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">WORKS</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4">事例</h1>
    <p class="text-sm md:text-base text-[#64748B] leading-relaxed max-w-2xl">AOi Baseが手がけたプロジェクトをジャンル別にご紹介します。</p>
    <nav aria-label="パンくずリスト" class="mt-6 text-xs text-[#94A3B8]">
      <ol class="inline-flex items-center gap-2 list-none p-0 m-0">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a></li>
        <li aria-hidden="true">›</li>
        <li><span aria-current="page" class="text-[#475569]">事例</span></li>
      </ol>
    </nav>
  </div>
</section>

<?php if ( $has_genres ) : ?>

  <?php foreach ( $genres as $index => $genre ) :
    $genre_posts = new WP_Query( array(
        'post_type'      => 'achievement',
        'posts_per_page' => -1,
        'tax_query'      => array( array(
            'taxonomy' => 'achievement_category',
            'field'    => 'term_id',
            'terms'    => $genre->term_id,
        ) ),
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );

    if ( ! $genre_posts->have_posts() ) {
        wp_reset_postdata();
        continue;
    }

    $featured_post = null;
    $other_posts   = array();

    while ( $genre_posts->have_posts() ) {
        $genre_posts->the_post();
        $is_featured = get_post_meta( get_the_ID(), '_aoibase_is_featured', true );
        if ( $is_featured && ! $featured_post ) {
            $featured_post = get_post();
        } else {
            $other_posts[] = get_post();
        }
    }

    if ( ! $featured_post ) {
        $featured_post = $other_posts[0] ?? $genre_posts->posts[0];
        $other_posts   = array_slice( $other_posts, $featured_post === ( $other_posts[0] ?? null ) ? 1 : 0 );
    }

    wp_reset_postdata();

    $bg_class = ( $index % 2 === 0 ) ? 'bg-white' : 'bg-[#F8FAFC]';
  ?>

  <!-- ===== GENRE: <?php echo esc_html( $genre->name ); ?> ===== -->
  <section class="py-16 md:py-20 <?php echo $bg_class; ?>" id="genre-<?php echo esc_attr( $genre->slug ); ?>">
    <div class="max-w-7xl mx-auto px-6">

      <!-- Genre Header -->
      <div class="mb-10">
        <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']"><?php echo esc_html( strtoupper( $genre->slug ) ); ?></p>
        <h2 class="text-2xl md:text-3xl font-bold text-[#1B2A4A] mb-3"><?php echo esc_html( $genre->name ); ?></h2>
        <?php if ( $genre->description ) : ?>
          <p class="text-sm text-[#64748B] leading-relaxed max-w-2xl"><?php echo esc_html( $genre->description ); ?></p>
        <?php endif; ?>
        <div class="w-12 h-0.5 bg-[#0369A1] mt-5"></div>
      </div>

      <!-- Featured Project -->
      <?php
      $fp_id        = $featured_post->ID;
      $fp_summary   = get_post_meta( $fp_id, '_aoibase_summary', true );
      $fp_challenge = get_post_meta( $fp_id, '_aoibase_challenge', true );
      $fp_solution  = get_post_meta( $fp_id, '_aoibase_solution', true );
      $fp_outcome   = get_post_meta( $fp_id, '_aoibase_outcome', true );
      $fp_techs     = get_the_terms( $fp_id, 'tech_stack' );
      ?>
      <div class="bg-white rounded-2xl shadow-lg border border-[#E2E8F0]/60 overflow-hidden pickup-card-shadow transition-shadow duration-300 mb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 genre-hero-grid">
          <!-- Thumbnail -->
          <div class="genre-hero-thumb relative h-64 md:h-auto overflow-hidden <?php echo has_post_thumbnail( $fp_id ) ? '' : 'bg-gradient-to-br from-[#0369A1] to-[#1B2A4A] flex items-center justify-center'; ?>">
            <?php if ( has_post_thumbnail( $fp_id ) ) : ?>
              <?php echo get_the_post_thumbnail( $fp_id, 'large', array( 'class' => 'w-full h-full object-cover', 'loading' => 'lazy' ) ); ?>
            <?php else : ?>
              <svg aria-hidden="true" class="w-20 h-20 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7"/></svg>
            <?php endif; ?>
          </div>

          <!-- Details -->
          <div class="p-6 md:p-10 flex flex-col justify-center">
            <span class="inline-block self-start px-3 py-1 text-xs font-semibold text-[#0369A1] bg-[#EFF6FF] rounded-full font-['Poppins'] mb-4"><?php echo esc_html( $genre->name ); ?></span>
            <h3 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-3"><?php echo esc_html( $featured_post->post_title ); ?></h3>

            <?php if ( $fp_summary ) : ?>
              <p class="text-sm text-[#475569] leading-relaxed mb-5"><?php echo esc_html( $fp_summary ); ?></p>
            <?php endif; ?>

            <?php if ( $fp_challenge || $fp_solution || $fp_outcome ) : ?>
              <div class="space-y-4 mb-6">
                <?php if ( $fp_challenge ) : ?>
                  <div class="flex items-start gap-3">
                    <span class="shrink-0 w-6 h-6 rounded-full bg-[#FEF3C7] flex items-center justify-center mt-0.5">
                      <svg class="w-3.5 h-3.5 text-[#B45309]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </span>
                    <div>
                      <p class="text-xs font-bold text-[#B45309] mb-1">課題</p>
                      <p class="text-sm text-[#475569] leading-relaxed"><?php echo wp_kses_post( $fp_challenge ); ?></p>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if ( $fp_solution ) : ?>
                  <div class="flex items-start gap-3">
                    <span class="shrink-0 w-6 h-6 rounded-full bg-[#DBEAFE] flex items-center justify-center mt-0.5">
                      <svg class="w-3.5 h-3.5 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    </span>
                    <div>
                      <p class="text-xs font-bold text-[#0369A1] mb-1">解決策</p>
                      <p class="text-sm text-[#475569] leading-relaxed"><?php echo wp_kses_post( $fp_solution ); ?></p>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if ( $fp_outcome ) : ?>
                  <div class="flex items-start gap-3">
                    <span class="shrink-0 w-6 h-6 rounded-full bg-[#D1FAE5] flex items-center justify-center mt-0.5">
                      <svg class="w-3.5 h-3.5 text-[#059669]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </span>
                    <div>
                      <p class="text-xs font-bold text-[#059669] mb-1">成果</p>
                      <p class="text-sm text-[#475569] leading-relaxed"><?php echo wp_kses_post( $fp_outcome ); ?></p>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <?php if ( ! is_wp_error( $fp_techs ) && ! empty( $fp_techs ) ) : ?>
              <div class="flex flex-wrap gap-1.5 mb-5">
                <?php foreach ( $fp_techs as $tech ) : ?>
                  <span class="px-2 py-0.5 text-[10px] font-medium text-[#475569] bg-[#F1F5F9] rounded"><?php echo esc_html( $tech->name ); ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <a href="<?php echo esc_url( get_permalink( $fp_id ) ); ?>" class="inline-flex items-center gap-2 text-sm font-bold text-[#0369A1] hover:text-[#1B2A4A] transition-colors group">
              詳細を見る
              <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Other Projects in this Genre -->
      <?php if ( ! empty( $other_posts ) ) : ?>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-6">
          <?php foreach ( $other_posts as $op ) :
            $op_id      = $op->ID;
            $op_summary = get_post_meta( $op_id, '_aoibase_summary', true );
            $op_metric  = get_post_meta( $op_id, '_aoibase_outcome_metric', true );
          ?>
            <article class="works-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-[#E2E8F0] transition-all duration-200 cursor-pointer flex flex-col hover:-translate-y-1">
              <div class="relative h-40 sm:h-52 overflow-hidden <?php echo has_post_thumbnail( $op_id ) ? '' : 'bg-gradient-to-br from-[#0369A1] to-[#1B2A4A] flex items-center justify-center'; ?>">
                <?php if ( has_post_thumbnail( $op_id ) ) : ?>
                  <?php echo get_the_post_thumbnail( $op_id, 'medium_large', array( 'class' => 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-105', 'loading' => 'lazy' ) ); ?>
                <?php else : ?>
                  <svg aria-hidden="true" class="w-12 h-12 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7"/></svg>
                <?php endif; ?>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-[#CA8A04] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-200 origin-left"></div>
              </div>
              <div class="p-4 sm:p-6 flex-1 flex flex-col">
                <h3 class="text-sm sm:text-base font-bold text-[#1B2A4A] mb-2 group-hover:text-[#0369A1] transition-colors leading-snug">
                  <a href="<?php echo esc_url( get_permalink( $op_id ) ); ?>" class="stretched-link"><?php echo esc_html( $op->post_title ); ?></a>
                </h3>
                <?php if ( $op_summary ) : ?>
                  <p class="text-xs sm:text-sm text-[#475569] leading-relaxed line-clamp-2"><?php echo esc_html( $op_summary ); ?></p>
                <?php endif; ?>
                <?php if ( $op_metric ) : ?>
                  <div class="mt-auto pt-3 border-t border-[#F1F5F9] flex items-center gap-1 text-[#CA8A04]">
                    <svg aria-hidden="true" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    <span class="text-xs font-bold font-['Poppins']"><?php echo esc_html( $op_metric ); ?></span>
                  </div>
                <?php endif; ?>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>
  </section>

  <?php endforeach; ?>

<?php else : ?>

<!-- ===== EMPTY STATE ===== -->
<section class="py-20 bg-[#F8FAFC]">
  <div class="max-w-7xl mx-auto px-6">
    <div class="bg-white rounded-2xl shadow-sm border border-[#E2E8F0] p-12 md:p-16 text-center max-w-2xl mx-auto">
      <div class="w-16 h-16 mx-auto mb-6 rounded-full bg-[#EFF6FF] flex items-center justify-center">
        <svg aria-hidden="true" class="w-8 h-8 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
      </div>
      <h2 class="text-xl font-bold text-[#1B2A4A] mb-3">現在実績情報を準備中です</h2>
      <p class="text-sm text-[#64748B] leading-relaxed mb-8">公開まで今しばらくお待ちください。<br>開発のご相談・お見積りは随時受け付けています。</p>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#B45309] hover:bg-[#D97706] text-white text-sm font-bold rounded-full transition-all duration-200 cursor-pointer shadow-lg hover:shadow-xl hover:-translate-y-0.5">
        <svg aria-hidden="true" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.953 9.953 0 01-4.814-1.229L3 20l1.229-4.186A8.955 8.955 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        お問い合わせはこちら
      </a>
    </div>
  </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>
