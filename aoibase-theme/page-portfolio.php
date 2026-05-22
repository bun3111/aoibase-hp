<?php
/**
 * Template: 開発事例（ジャンル別表示）
 * 固定ページスラッグ "portfolio" に自動適用
 */

get_header();

$genres = get_terms( array(
    'taxonomy'   => 'achievement_category',
    'hide_empty' => true,
    'orderby'    => 'count',
    'order'      => 'DESC',
) );

$has_genres = ! is_wp_error( $genres ) && ! empty( $genres );
?>

<style>
  .pf-card {
    background: #fff;
    border: 1.5px solid #93C5FD;
    border-radius: 16px;
    padding: 24px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    width: 100%;
    transition: transform 200ms ease, box-shadow 200ms ease;
  }
  @media (min-width: 640px) {
    .pf-card { width: 480px; }
  }
  .pf-card {
    box-shadow: 0 4px 16px rgba(15,23,42,0.08);
  }
  .pf-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 40px rgba(3,105,161,0.14);
    border-color: #BFDBFE;
  }
  .pf-thumb {
    width: 100%;
    max-width: 180px;
    border-radius: 12px;
    overflow: hidden;
    border: 2px solid #E2E8F0;
    background: #F8FAFC;
    align-self: center;
  }
  .pf-thumb img {
    width: 100%;
    height: auto;
    display: block;
  }
  .pf-thumb-placeholder {
    aspect-ratio: 4/3;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #0369A1, #1B2A4A);
  }
  .pf-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 10px 24px;
    background: #0369A1;
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    border-radius: 9999px;
    text-decoration: none;
    transition: all 200ms ease;
    cursor: pointer;
    align-self: center;
  }
  .pf-btn:hover {
    background: #1B2A4A;
    transform: translateY(-1px);
    box-shadow: 0 4px 16px rgba(3,105,161,0.25);
  }
  @media (min-width: 640px) {
    .pf-thumb { max-width: 280px; }
    .pf-btn { font-size: 14px; padding: 12px 28px; }
  }
</style>

<script type="application/ld+json">
<?php echo wp_json_encode( array(
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => array(
        array( '@type' => 'ListItem', 'position' => 1, 'name' => 'TOP', 'item' => home_url( '/' ) ),
        array( '@type' => 'ListItem', 'position' => 2, 'name' => '開発事例', 'item' => home_url( '/portfolio/' ) ),
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
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4">開発事例</h1>
    <p class="text-sm md:text-base text-[#64748B] leading-relaxed max-w-2xl">AOi Baseが手がけたプロジェクトをジャンル別にご紹介します。</p>
    <nav aria-label="パンくずリスト" class="mt-6 text-xs text-[#94A3B8]">
      <ol class="inline-flex items-center gap-2 list-none p-0 m-0">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a></li>
        <li aria-hidden="true">›</li>
        <li><span aria-current="page" class="text-[#475569]">開発事例</span></li>
      </ol>
    </nav>
  </div>
</section>

<?php
$portfolio_page_id = get_queried_object_id();
$detail_children   = get_pages( array( 'child_of' => $portfolio_page_id, 'post_status' => 'publish' ) );
$detail_map        = array();
foreach ( $detail_children as $child ) {
    $detail_map[ $child->post_title ] = $child->ID;
}
?>

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

    $bg_class = ( $index % 2 === 0 ) ? 'bg-white' : 'bg-[#F8FAFC]';
  ?>

  <section class="py-14 md:py-20 <?php echo $bg_class; ?> aoibase-fade-in" id="genre-<?php echo esc_attr( $genre->slug ); ?>">
    <div class="max-w-7xl mx-auto px-6">

      <div class="mb-8 md:mb-10">
        <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']"><?php echo esc_html( strtoupper( urldecode( $genre->slug ) ) ); ?></p>
        <h2 class="text-2xl md:text-3xl font-bold text-[#1B2A4A] mb-3"><?php echo esc_html( $genre->name ); ?></h2>
        <?php if ( $genre->description ) : ?>
          <p class="text-sm text-[#64748B] leading-relaxed max-w-2xl"><?php echo esc_html( $genre->description ); ?></p>
        <?php endif; ?>
        <div class="w-12 h-0.5 bg-[#0369A1] mt-5"></div>
      </div>

      <div class="flex flex-wrap justify-center gap-5">
        <?php while ( $genre_posts->have_posts() ) : $genre_posts->the_post();
          $p_id      = get_the_ID();
          $p_summary = get_post_meta( $p_id, '_aoibase_summary', true );
        ?>
        <div class="pf-card">
          <span class="inline-block px-3 py-1 text-xs font-semibold text-[#0369A1] bg-[#EFF6FF] rounded-full font-['Poppins'] mb-3"><?php echo esc_html( $genre->name ); ?></span>
          <h3 class="text-lg font-bold text-[#1B2A4A] mb-2 leading-snug"><?php the_title(); ?></h3>
          <?php if ( $p_summary ) : ?>
            <p class="text-sm text-[#475569] leading-relaxed mb-4 line-clamp-2"><?php echo esc_html( $p_summary ); ?></p>
          <?php else : ?>
            <div class="mb-4"></div>
          <?php endif; ?>

          <div class="pf-thumb mb-4">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'full', array( 'loading' => 'lazy' ) ); ?>
            <?php else : ?>
              <div class="pf-thumb-placeholder">
                <svg aria-hidden="true" class="w-10 h-10 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
              </div>
            <?php endif; ?>
          </div>

          <?php
            $p_title    = get_the_title();
            $detail_url = isset( $detail_map[ $p_title ] ) ? get_permalink( $detail_map[ $p_title ] ) : get_permalink();
          ?>
          <a href="<?php echo esc_url( $detail_url ); ?>" class="pf-btn">
            詳細を見る
          </a>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>

    </div>
  </section>

  <?php endforeach; ?>

<?php else : ?>

<section class="py-20 bg-[#F8FAFC]">
  <div class="max-w-7xl mx-auto px-6">
    <div class="bg-white rounded-2xl shadow-sm border border-[#E2E8F0] p-12 md:p-16 text-center max-w-2xl mx-auto">
      <h2 class="text-xl font-bold text-[#1B2A4A] mb-3">現在実績情報を準備中です</h2>
      <p class="text-sm text-[#64748B] leading-relaxed mb-8">公開まで今しばらくお待ちください。</p>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#B45309] hover:bg-[#D97706] text-white text-sm font-bold rounded-full transition-all duration-200 cursor-pointer shadow-lg hover:shadow-xl hover:-translate-y-0.5">
        お問い合わせはこちら
      </a>
    </div>
  </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>
