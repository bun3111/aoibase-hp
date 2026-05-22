<?php
/**
 * Template: NEWS (お知らせ一覧)
 * 固定ページスラッグ "news" に自動適用
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$news_intro = get_theme_mod( 'news_intro', 'AOi Baseの最新情報・お知らせをお届けします。' );
?>

<style>
  .news-card {
    background: #fff;
    border: 1px solid #E2E8F0;
    border-radius: 16px;
    overflow: hidden;
    transition: transform 200ms ease, box-shadow 200ms ease;
    display: flex;
    flex-direction: column;
  }
  .news-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 40px rgba(3,105,161,0.10);
  }
  .news-card:hover h3 { color: #0369A1; }
  .aoibase-pagination .page-numbers {
    display: inline-flex; align-items: center; justify-content: center;
    min-width: 2.5rem; height: 2.5rem; padding: 0 0.875rem;
    border-radius: 9999px; background: #fff; color: #475569;
    border: 1px solid #CBD5E1; font-size: 0.875rem; font-weight: 600;
    text-decoration: none; transition: all 200ms;
  }
  .aoibase-pagination .page-numbers:hover { border-color: #0369A1; color: #0369A1; }
  .aoibase-pagination .page-numbers.current { background: #0369A1; color: #fff; border-color: #0369A1; }
  .aoibase-pagination .page-numbers.dots { border: none; background: transparent; }
</style>

<!-- ===== PAGE HEADER ===== -->
<section class="relative pt-32 pb-16 bg-white border-b border-[#E2E8F0] overflow-hidden">
  <div class="absolute inset-x-0 top-20 pointer-events-none select-none text-center">
    <h2 class="text-[clamp(4rem,12vw,9rem)] font-extrabold leading-none tracking-tight text-[#1B2A4A] opacity-[0.04] font-['Poppins']">NEWS</h2>
  </div>
  <div class="relative max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">NEWS</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4">お知らせ</h1>
    <p class="text-sm md:text-base text-[#64748B] leading-relaxed max-w-2xl"><?php echo esc_html( $news_intro ); ?></p>
    <nav aria-label="パンくずリスト" class="mt-6 text-xs text-[#94A3B8]">
      <ol class="inline-flex items-center gap-2 list-none p-0 m-0">
        <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a></li>
        <li aria-hidden="true">›</li>
        <li><span aria-current="page" class="text-[#475569]">お知らせ</span></li>
      </ol>
    </nav>
  </div>
</section>

<?php
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$news_query = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => 12,
    'paged'          => $paged,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
) );
?>

<?php if ( $news_query->have_posts() ) : ?>
<!-- ===== NEWS GRID ===== -->
<section class="py-16 md:py-20 bg-[#F8FAFC]">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
      <a href="<?php the_permalink(); ?>" class="news-card group cursor-pointer">
        <div class="relative h-48 overflow-hidden <?php echo has_post_thumbnail() ? '' : 'bg-gradient-to-br from-[#0369A1] to-[#1B2A4A] flex items-center justify-center'; ?>">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-105', 'loading' => 'lazy' ) ); ?>
          <?php else : ?>
            <svg class="w-12 h-12 text-white/20" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
          <?php endif; ?>
        </div>
        <div class="p-6 flex-1 flex flex-col">
          <div class="flex items-center gap-3 mb-3">
            <time class="font-['Poppins'] text-xs text-[#0369A1] tracking-wider" style="font-weight:500;" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
            <?php
            $cats = get_the_category();
            if ( ! empty( $cats ) ) :
            ?>
              <span class="px-2 py-0.5 text-[10px] font-semibold text-[#0369A1] bg-[#EFF6FF] rounded-full font-['Poppins']"><?php echo esc_html( $cats[0]->name ); ?></span>
            <?php endif; ?>
          </div>
          <h3 class="text-base font-bold text-[#1B2A4A] mb-2 leading-snug transition-colors duration-200 line-clamp-2"><?php the_title(); ?></h3>
          <p class="text-sm text-[#475569] leading-relaxed line-clamp-2 flex-1"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 50, '...' ) ); ?></p>
        </div>
      </a>
      <?php endwhile; ?>
    </div>

    <?php
    $pagination_html = paginate_links( array(
        'total'     => $news_query->max_num_pages,
        'current'   => $paged,
        'mid_size'  => 1,
        'end_size'  => 1,
        'prev_text' => '&larr; 前へ',
        'next_text' => '次へ &rarr;',
        'type'      => 'plain',
    ) );
    ?>
    <?php if ( $news_query->max_num_pages > 1 && $pagination_html ) : ?>
      <nav class="aoibase-pagination flex flex-wrap justify-center items-center gap-2 mt-12" aria-label="ページネーション">
        <?php echo wp_kses_post( $pagination_html ); ?>
      </nav>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>

<?php else : ?>
<!-- ===== EMPTY STATE ===== -->
<section class="py-20 bg-[#F8FAFC]">
  <div class="max-w-7xl mx-auto px-6">
    <div class="bg-white rounded-2xl shadow-sm border border-[#E2E8F0] p-12 md:p-16 text-center max-w-2xl mx-auto">
      <div class="w-16 h-16 mx-auto mb-6 rounded-full bg-[#EFF6FF] flex items-center justify-center">
        <svg aria-hidden="true" class="w-8 h-8 text-[#0369A1]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
      </div>
      <h2 class="text-xl font-bold text-[#1B2A4A] mb-3">お知らせはまだありません</h2>
      <p class="text-sm text-[#64748B] leading-relaxed">最新情報が公開され次第、こちらに掲載されます。</p>
    </div>
  </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
