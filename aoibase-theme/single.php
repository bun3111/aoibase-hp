<?php
/**
 * Single Post Template (NEWS記事)
 */

get_header();

$news_url = home_url( '/news/' );
?>

<style>
  .news-single h2 { font-size: 1.5rem; font-weight: 700; color: #1B2A4A; margin: 2rem 0 0.75rem; }
  .news-single h3 { font-size: 1.25rem; font-weight: 700; color: #1B2A4A; margin: 1.5rem 0 0.5rem; }
  .news-single p  { font-size: 0.95rem; line-height: 1.85; color: #475569; margin: 0 0 1.25rem; }
  .news-single ul, .news-single ol { margin: 0 0 1.25rem 1.5rem; color: #475569; font-size: 0.95rem; line-height: 1.85; }
  .news-single li { margin-bottom: 0.4rem; }
  .news-single img { max-width: 100%; height: auto; border-radius: 12px; margin: 1.5rem 0; }
  .news-single figure { margin: 1.5rem 0; }
  .news-single figcaption { font-size: 0.8rem; color: #94A3B8; text-align: center; margin-top: 0.5rem; }
  .news-single blockquote { border-left: 4px solid #0369A1; padding: 1rem 1.5rem; margin: 1.5rem 0; background: #F8FAFC; border-radius: 0 8px 8px 0; }
  .news-single blockquote p { margin: 0; color: #1B2A4A; }
  .news-single a { color: #0369A1; text-decoration: underline; }
  .news-single a:hover { color: #1B2A4A; }
  .news-single .wp-block-columns { display: flex; gap: 1.5rem; margin: 1.5rem 0; }
  .news-single .wp-block-column { flex: 1; }
  @media (max-width: 640px) {
    .news-single .wp-block-columns { flex-direction: column; }
    .news-single h2 { font-size: 1.3rem; }
  }
</style>

<script type="application/ld+json">
<?php echo wp_json_encode( array(
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => array(
        array( '@type' => 'ListItem', 'position' => 1, 'name' => 'TOP', 'item' => home_url( '/' ) ),
        array( '@type' => 'ListItem', 'position' => 2, 'name' => 'NEWS', 'item' => $news_url ),
        array( '@type' => 'ListItem', 'position' => 3, 'name' => get_the_title(), 'item' => get_permalink() ),
    ),
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>
</script>

<!-- ===== PAGE HEADER ===== -->
<section class="relative pt-32 pb-16 bg-white border-b border-[#E2E8F0] overflow-hidden">
  <div class="relative max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">NEWS</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4"><?php the_title(); ?></h1>
    <div class="flex items-center gap-4 mt-4">
      <time class="font-['Poppins'] text-sm text-[#64748B]" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
      <?php
      $cats = get_the_category();
      if ( ! empty( $cats ) ) :
      ?>
        <span class="px-3 py-1 text-xs font-semibold text-[#0369A1] bg-[#EFF6FF] rounded-full font-['Poppins']"><?php echo esc_html( $cats[0]->name ); ?></span>
      <?php endif; ?>
    </div>
    <nav aria-label="パンくずリスト" class="mt-6 text-xs text-[#94A3B8]">
      <ol class="inline-flex items-center gap-2 list-none p-0 m-0">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a></li>
        <li aria-hidden="true">›</li>
        <li><a href="<?php echo esc_url( $news_url ); ?>" class="hover:text-[#0369A1] transition-colors">NEWS</a></li>
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

<!-- ===== CONTENT ===== -->
<section class="py-12 md:py-16 bg-white">
  <div class="news-single max-w-4xl mx-auto px-6">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
  </div>
</section>

<!-- ===== BACK LINK ===== -->
<section class="pb-16 bg-white">
  <div class="max-w-4xl mx-auto px-6 text-center">
    <a href="<?php echo esc_url( $news_url ); ?>" class="inline-flex items-center gap-2 px-8 py-3 border-2 border-[#0369A1] text-[#0369A1] text-sm font-bold rounded-full hover:bg-[#0369A1] hover:text-white transition-all duration-200">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
      NEWS一覧に戻る
    </a>
  </div>
</section>

<?php get_footer(); ?>
