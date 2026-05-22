<?php get_header(); ?>

<style>
  /* CF7 form styles */
  .wpcf7 input[type="text"],
  .wpcf7 input[type="email"],
  .wpcf7 input[type="tel"],
  .wpcf7 textarea {
    width: 100%;
    padding: 14px 18px;
    border: 1px solid #CBD5E1;
    border-radius: 10px;
    font-size: 15px;
    font-family: 'Noto Sans JP', sans-serif;
    background: #F8FAFC;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
    box-sizing: border-box;
  }
  .wpcf7 input[type="text"]:focus,
  .wpcf7 input[type="email"]:focus,
  .wpcf7 input[type="tel"]:focus,
  .wpcf7 textarea:focus {
    border-color: #0369A1;
    box-shadow: 0 0 0 3px rgba(3,105,161,0.1);
    background: #fff;
  }
  .wpcf7 textarea { min-height: 200px; resize: vertical; }
  .wpcf7 input[type="submit"] {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    max-width: 320px;
    padding: 16px 32px;
    background: #B45309;
    color: #fff;
    font-size: 16px;
    font-weight: 700;
    font-family: 'Noto Sans JP', sans-serif;
    border: none;
    border-radius: 9999px;
    cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 4px 14px rgba(180,83,9,0.3);
  }
  .wpcf7 input[type="submit"]:hover {
    background: #D97706;
    box-shadow: 0 6px 20px rgba(180,83,9,0.4);
    transform: translateY(-2px);
  }
  .cf7-field { margin-bottom: 24px; }
  .cf7-field label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #1B2A4A;
    margin-bottom: 8px;
  }
  .cf7-field .required { color: #DC2626; font-size: 12px; }
  .wpcf7-response-output {
    margin-top: 24px !important;
    padding: 16px 20px !important;
    border-radius: 10px !important;
    font-size: 14px !important;
  }
  .wpcf7-not-valid-tip {
    color: #DC2626;
    font-size: 13px;
    margin-top: 6px;
  }
</style>

<!-- ===== PAGE HEADER ===== -->
<section class="pt-32 pb-16 bg-gradient-to-b from-[#F0F7FF] to-white">
  <div class="max-w-7xl mx-auto px-6">
    <p class="text-xs font-bold tracking-[0.3em] text-[#0369A1] font-['Poppins'] mb-3">CONTACT</p>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B2A4A] mb-4">お問い合わせ</h1>
    <p class="text-sm text-[#64748B] leading-relaxed max-w-2xl"><?php echo wp_kses_post( get_theme_mod( 'contact_intro', '課題・要件が固まっていなくても大丈夫です。<br>どんな小さなご質問も、専門チームが誠実にお答えします。' ) ); ?></p>
    <nav class="mt-6 text-xs text-[#94A3B8]">
      <a href="<?php echo home_url('/'); ?>" class="hover:text-[#0369A1] transition-colors">TOP</a>
      <span class="mx-2">›</span>
      <span class="text-[#475569]">お問い合わせ</span>
    </nav>
  </div>
</section>

<!-- ===== FORM SECTION ===== -->
<section class="py-20 bg-white">
  <div class="max-w-2xl mx-auto px-6">
    <div class="bg-white rounded-2xl shadow-xl border border-[#E2E8F0]/60 p-8 md:p-12">
      <div class="mb-10">
        <h2 class="text-xl font-bold text-[#1B2A4A] mb-3 text-center"><?php echo esc_html( get_theme_mod( 'contact_form_heading', 'お問合せフォーム' ) ); ?></h2>
        <p class="text-sm text-[#64748B] leading-relaxed text-center"><?php echo wp_kses_post( get_theme_mod( 'contact_form_desc', '<span class="text-[#DC2626]">*</span> は必須項目です。通常1〜2営業日以内にご返信いたします。' ) ); ?></p>
      </div>
      <?php echo do_shortcode('[contact-form-7 id="67ac0b8" title="コンタクトフォーム 1"]'); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
