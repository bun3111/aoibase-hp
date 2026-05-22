<?php get_header(); ?>

<!-- ===== PAGE HEADER ===== -->
<section class="pt-32 pb-16 bg-gradient-to-b from-[#F0F7FF] to-white">
  <div class="max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">COMPANY</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4">会社概要</h1>
    <p class="text-sm text-[#64748B] leading-relaxed max-w-2xl"><?php echo esc_html( get_theme_mod( 'company_intro', '株式会社AOi Baseは、Web開発・アプリ開発・システム開発などを手がける香川県高松市のシステム開発会社です。' ) ); ?></p>
    <nav aria-label="パンくずリスト" class="mt-6 text-xs text-[#94A3B8]">
      <ol class="flex items-center flex-wrap gap-x-2">
        <li><a href="<?php echo home_url('/'); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a></li>
        <li aria-hidden="true"><span class="mx-2">›</span></li>
        <li aria-current="page"><span class="text-[#475569]">会社概要</span></li>
      </ol>
    </nav>
  </div>
</section>

<!-- ===== COMPANY INFO SECTION ===== -->
<section class="py-20 bg-white">
  <div class="max-w-2xl mx-auto px-6">
    <div class="bg-white rounded-2xl shadow-xl border border-[#E2E8F0]/60 p-8 md:p-12">
      <div class="mb-8">
        <p class="text-xs font-semibold tracking-[0.3em] text-[#0369A1] uppercase mb-2 font-['Poppins']">COMPANY INFORMATION</p>
        <h2 class="text-xl md:text-2xl font-bold text-[#1B2A4A] mb-1">企業情報</h2>
        <div class="w-10 h-0.5 bg-[#0369A1] mt-4"></div>
      </div>
      <dl class="text-sm space-y-3">
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">会社名</dt>
          <dd class="text-[#475569]"><?php echo esc_html( get_theme_mod( 'company_name', '株式会社AOi Base' ) ); ?></dd>
        </div>
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">所在地</dt>
          <dd class="text-[#475569]"><?php echo esc_html( get_theme_mod( 'company_zip', '〒761-8046' ) ); ?><br><?php echo esc_html( get_theme_mod( 'company_address', '香川県高松市川部町240番地4' ) ); ?><br><?php echo esc_html( get_theme_mod( 'company_building', 'アースA203' ) ); ?></dd>
        </div>
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">設立</dt>
          <dd class="text-[#475569]"><?php echo esc_html( get_theme_mod( 'company_founded', '2026年4月15日' ) ); ?></dd>
        </div>
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">資本金</dt>
          <dd class="text-[#475569]"><?php echo esc_html( get_theme_mod( 'company_capital', '100万円' ) ); ?></dd>
        </div>
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">法人番号</dt>
          <dd class="font-['Poppins']"><a href="https://www.houjin-bangou.nta.go.jp/henkorireki-johoto.html?selHouzinNo=<?php echo esc_attr( get_theme_mod( 'company_corp_number', '9470001021213' ) ); ?>" target="_blank" rel="noopener noreferrer" class="text-[#0369A1] hover:underline"><?php echo esc_html( get_theme_mod( 'company_corp_number', '9470001021213' ) ); ?></a></dd>
        </div>
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">代表者</dt>
          <dd class="text-[#475569]"><?php echo esc_html( get_theme_mod( 'company_representative', '寒川 拓斗' ) ); ?></dd>
        </div>
        <div class="flex border-b border-[#E2E8F0] pb-3">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">事業内容</dt>
          <dd class="text-[#475569]"><?php echo esc_html( get_theme_mod( 'company_business', 'Web開発・アプリ開発・システム開発・広告代理' ) ); ?></dd>
        </div>
        <div class="flex pb-1">
          <dt class="w-24 shrink-0 text-xs font-semibold text-[#1B2A4A] pt-0.5">メール</dt>
          <dd class="text-[#475569] font-['Poppins']"><?php echo esc_html( get_theme_mod( 'company_email', 'info@aoibase.jp' ) ); ?></dd>
        </div>
      </dl>
    </div>
  </div>
</section>

<?php get_footer(); ?>
