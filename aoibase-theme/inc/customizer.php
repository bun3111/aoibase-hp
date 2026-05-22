<?php
/**
 * AOi Base Theme Customizer
 *
 * Registers all theme_mod settings used across templates.
 * Panels > Sections > Settings/Controls hierarchy.
 *
 * @package aoibase-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Customizer panels, sections, settings, and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
 */
function aoibase_customize_register( $wp_customize ) {

    // =========================================================================
    // Helper: register a text setting + control
    // =========================================================================
    $add_field = function ( $section, $id, $label, $default, $type = 'text' ) use ( $wp_customize ) {
        switch ( $type ) {
            case 'textarea':
                $sanitize     = 'sanitize_textarea_field';
                $control_type = 'textarea';
                break;
            case 'html':
                $sanitize     = 'wp_kses_post';
                $control_type = 'text';
                break;
            default:
                $sanitize     = 'sanitize_text_field';
                $control_type = 'text';
                break;
        }

        $wp_customize->add_setting( $id, array(
            'default'           => $default,
            'sanitize_callback' => $sanitize,
            'transport'         => 'postMessage',
        ) );

        $wp_customize->add_control( $id, array(
            'label'   => $label,
            'section' => $section,
            'type'    => $control_type,
        ) );
    };

    // =========================================================================
    // PANEL: aoibase_common (共通設定)
    // =========================================================================
    $wp_customize->add_panel( 'aoibase_common', array(
        'title'    => '共通設定',
        'priority' => 30,
    ) );

    // --- Section: 企業情報 ---
    $wp_customize->add_section( 'aoibase_company_info', array(
        'title' => '企業情報',
        'panel' => 'aoibase_common',
    ) );

    $company_fields = array(
        array( 'company_name',           '会社名',     '株式会社AOi Base' ),
        array( 'company_zip',            '郵便番号',   '〒761-8046' ),
        array( 'company_address',        '住所',       '香川県高松市川部町240番地4' ),
        array( 'company_building',       '建物名',     'アースA203' ),
        array( 'company_founded',        '設立日',     '2026年4月15日' ),
        array( 'company_capital',        '資本金',     '100万円' ),
        array( 'company_corp_number',    '法人番号',   '9470001021213' ),
        array( 'company_representative', '代表者',     '寒川 拓斗' ),
        array( 'company_business',       '事業内容',   'Web開発・アプリ開発・システム開発・広告代理' ),
        array( 'company_email',          'メール',     'info@aoibase.jp' ),
    );

    foreach ( $company_fields as $f ) {
        $add_field( 'aoibase_company_info', $f[0], $f[1], $f[2] );
    }

    // --- Section: フッター ---
    $wp_customize->add_section( 'aoibase_footer', array(
        'title' => 'フッター',
        'panel' => 'aoibase_common',
    ) );

    $footer_fields = array(
        array( 'footer_company_name', '会社名',         '株式会社AOi Base' ),
        array( 'footer_zip',          '郵便番号',       '〒761-8046' ),
        array( 'footer_address',      '住所',           '香川県高松市川部町240番地4' ),
        array( 'footer_building',     '建物名',         'アースA203' ),
        array( 'footer_email',        'メール',         'info@aoibase.jp' ),
        array( 'footer_tagline',      'タグライン',     '構想をカタチに' ),
        array( 'footer_copyright',    'コピーライト',   '&copy; 2026 AOi Base Inc. All rights reserved.', 'html' ),
    );

    foreach ( $footer_fields as $f ) {
        $type = isset( $f[3] ) ? $f[3] : 'text';
        $add_field( 'aoibase_footer', $f[0], $f[1], $f[2], $type );
    }

    // =========================================================================
    // PANEL: aoibase_front (トップページ)
    // =========================================================================
    $wp_customize->add_panel( 'aoibase_front', array(
        'title'    => 'トップページ',
        'priority' => 31,
    ) );

    // --- Section: FEATUREセクション ---
    $wp_customize->add_section( 'aoibase_front_feature', array(
        'title' => 'FEATUREセクション',
        'panel' => 'aoibase_front',
    ) );

    $add_field( 'aoibase_front_feature', 'front_feature_body1', 'FEATURE本文1', 'AOi Baseは、Web・アプリ・システム開発において、設計段階からセキュリティを組み込んだ開発を行うIT企業です。脆弱性対策や認証・権限設計、データ保護を前提とした構成により、リスクを抑えたシステム構築を実現しています。', 'textarea' );
    $add_field( 'aoibase_front_feature', 'front_feature_body2', 'FEATURE本文2', 'また、運用負荷を抑えるための設計を重視し、保守性・拡張性を考慮した構成で開発を行っています。運用後の改修や機能追加にも対応しやすい仕組みを前提に、一貫した体制で開発に取り組んでいます。', 'textarea' );

    // --- Section: サービスカード ---
    $wp_customize->add_section( 'aoibase_front_service', array(
        'title' => 'サービスカード',
        'panel' => 'aoibase_front',
    ) );

    $add_field( 'aoibase_front_service', 'front_service_heading', 'サービス見出し', 'お客様の課題に、複数のサービスを<br>組み合わせながら、トータルで解決します', 'html' );

    $service_defaults = array(
        1 => array( 'WEB PRODUCTION',  'Webサイト制作',         'コーポレートサイト・LP・採用サイトなど、高品質なWebサイトを設計・制作します。' ),
        2 => array( 'WEB APP',         'Webアプリ開発',         'SaaS・社内ポータル・予約管理など高機能Webアプリを構築します。' ),
        3 => array( 'MOBILE APP',      'モバイルアプリ開発',    'iOS / Androidネイティブ・クロスプラットフォーム対応。ストア申請まで一貫サポート。' ),
        4 => array( 'BUSINESS SYSTEM', '業務システム開発',      '勤怠・在庫・受発注など業務フローに最適化したシステムを構築します。' ),
        5 => array( 'API DEVELOPMENT', 'API設計・開発',         'RESTful / GraphQL API設計。外部連携・マイクロサービス分割にも対応。' ),
        6 => array( 'CLOUD MIGRATION', 'クラウド移行・構築',    'AWS・GCPを活用したクラウドインフラの設計・移行・運用を支援します。' ),
    );

    foreach ( $service_defaults as $n => $d ) {
        $add_field( 'aoibase_front_service', "front_service_{$n}_en",    "サービス{$n} 英語名",  $d[0] );
        $add_field( 'aoibase_front_service', "front_service_{$n}_title", "サービス{$n} タイトル", $d[1] );
        $add_field( 'aoibase_front_service', "front_service_{$n}_desc",  "サービス{$n} 説明",     $d[2], 'textarea' );
    }

    // --- Section: プロセス ---
    $wp_customize->add_section( 'aoibase_front_process', array(
        'title' => 'プロセス',
        'panel' => 'aoibase_front',
    ) );

    $process_defaults = array(
        1 => array( 'ヒアリング',     '課題・要望を<br>丁寧にお伺い' ),
        2 => array( '要件定義・設計', '仕様・スケジュール<br>を明確化' ),
        3 => array( '開発・実装',     'アジャイルで<br>高品質に構築' ),
        4 => array( 'テスト・納品',   '品質確認・検収<br>・リリース対応' ),
        5 => array( '運用・保守',     '継続サポートで<br>長期的に伴走' ),
    );

    foreach ( $process_defaults as $n => $d ) {
        $add_field( 'aoibase_front_process', "front_process_{$n}_title", "プロセス{$n} タイトル", $d[0] );
        $add_field( 'aoibase_front_process', "front_process_{$n}_desc",  "プロセス{$n} 説明",     $d[1], 'html' );
    }

    // =========================================================================
    // PANEL: aoibase_company_page (会社概要ページ)
    // =========================================================================
    $wp_customize->add_panel( 'aoibase_company_page', array(
        'title'    => '会社概要ページ',
        'priority' => 32,
    ) );

    $wp_customize->add_section( 'aoibase_company_page_content', array(
        'title' => '会社概要ページ内容',
        'panel' => 'aoibase_company_page',
    ) );

    $add_field( 'aoibase_company_page_content', 'company_intro', 'ページ紹介文', '株式会社AOi Baseは、Web開発・アプリ開発・システム開発などを手がける香川県高松市のシステム開発会社です。' );

    // =========================================================================
    // PANEL: aoibase_flow (開発の流れ)
    // =========================================================================
    $wp_customize->add_panel( 'aoibase_flow', array(
        'title'    => '開発の流れ',
        'priority' => 33,
    ) );

    $wp_customize->add_section( 'aoibase_flow_content', array(
        'title' => '開発の流れ内容',
        'panel' => 'aoibase_flow',
    ) );

    $add_field( 'aoibase_flow_content', 'flow_intro', 'ページ紹介文', "ヒアリングから運用・保守まで、一貫した開発プロセスで\nプロジェクトの成功をサポートします。", 'textarea' );

    $flow_defaults = array(
        1 => array(
            'ヒアリング',
            '課題や目的を明確化するため、現状の業務フローやボトルネック、数値目標、ユーザー属性など、丁寧にお伺いいたします。既存システムについては運用状況について、使用ツール構成やデータの流れ、分断箇所、権限管理などの課題を整理いたします。ヒヤリングはもちろんオンラインにも対応し、画面共有などを通じて実運用ベースで把握いたします。',
            "現状の課題や理想の姿を共有\n既存資料・参考サイトの提供",
            "要望の深掘り・実現に向けての整理\n概算スケジュール・予算感のご提示",
        ),
        2 => array(
            '要件定義・設計',
            'ヒアリング内容をもとに、画面設計・システム構成・技術選定を行います。ワイヤーフレームや要件定義書をご提示し、認識のズレがないよう確認します。',
            "設計内容のレビュー・フィードバック\n優先順位の確定",
            "ワイヤーフレーム・要件定義書作成\n技術選定・スケジュール策定",
        ),
        3 => array(
            '開発・実装',
            '開発開始後、定期的に進捗を共有し、方向性のズレを早期に解消します。品質を担保するコードレビュー・テストを徹底。',
            "定期ミーティングでの進捗確認\n中間成果物へのフィードバック",
            "設計に基づく実装・コードレビュー\n自動テスト・品質管理",
        ),
        4 => array(
            'テスト・デプロイ',
            '機能テスト・パフォーマンステスト・セキュリティチェックを実施。お客様による受入テストを経て、本番環境へデプロイします。',
            "受入テスト・最終確認\n公開タイミングの決定",
            "品質検証・セキュリティチェック\nデバッグ・デプロイ",
        ),
        5 => array(
            '運用・保守',
            'リリース後も継続的にサポート。障害対応・機能追加・パフォーマンス改善など、長期的な伴走体制を構築します。',
            "運用中の課題・改善要望のフィードバック\n新機能のリクエスト",
            "監視・障害対応・定期メンテナンス\n機能改善・パフォーマンスチューニング",
        ),
    );

    foreach ( $flow_defaults as $n => $d ) {
        $add_field( 'aoibase_flow_content', "flow_step_{$n}_title",    "ステップ{$n} タイトル",   $d[0] );
        $add_field( 'aoibase_flow_content', "flow_step_{$n}_desc",     "ステップ{$n} 説明",       $d[1], 'textarea' );
        $add_field( 'aoibase_flow_content', "flow_step_{$n}_customer", "ステップ{$n} お客様",     $d[2], 'textarea' );
        $add_field( 'aoibase_flow_content', "flow_step_{$n}_aoibase",  "ステップ{$n} AOi Base",   $d[3], 'textarea' );
    }

    // =========================================================================
    // PANEL: aoibase_security (セキュリティ)
    // =========================================================================
    $wp_customize->add_panel( 'aoibase_security', array(
        'title'    => 'セキュリティ',
        'priority' => 34,
    ) );

    // --- Section: セキュリティリスク ---
    $wp_customize->add_section( 'aoibase_security_risks', array(
        'title' => 'セキュリティリスク',
        'panel' => 'aoibase_security',
    ) );

    $add_field( 'aoibase_security_risks', 'security_intro', 'イントロ文', 'Webアプリケーションやシステムには、設計・実装の段階で混入する脆弱性が存在します。これらは外部からの攻撃や情報漏洩の原因となり、事業継続に深刻な影響を与えます。開発段階からセキュリティを意識することで、リスクを最小化できます。', 'textarea' );

    $security_risk_defaults = array(
        1 => array( 'SQLインジェクション',         '不正なSQL文を注入し、データベースの情報を窃取・改ざんする攻撃。入力値の検証不備が原因で発生します。' ),
        2 => array( 'クロスサイトスクリプティング', '悪意あるスクリプトをWebページに埋め込み、ユーザーのセッション情報や個人データを盗み取る攻撃手法です。' ),
        3 => array( '認証・認可の不備',             'パスワード管理の甘さやセッション管理の不備により、不正アクセスやアカウント乗っ取りが発生するリスクです。' ),
        4 => array( 'CSRF（リクエスト強要）',       'ユーザーの意図しないリクエストを送信させ、設定変更や送金などの操作を不正に実行させる攻撃です。' ),
        5 => array( '機密情報の漏洩',               'エラーメッセージやログに含まれるシステム情報、不適切なアクセス制御により内部情報が外部に露出するリスクです。' ),
        6 => array( '依存パッケージの脆弱性',       '利用しているライブラリやフレームワークに含まれる既知の脆弱性が、システム全体のリスクとなります。' ),
    );

    foreach ( $security_risk_defaults as $n => $d ) {
        $add_field( 'aoibase_security_risks', "security_risk_{$n}_title", "リスク{$n} タイトル", $d[0] );
        $add_field( 'aoibase_security_risks', "security_risk_{$n}_desc",  "リスク{$n} 説明",     $d[1], 'textarea' );
    }

    // --- Section: セキュリティアプローチ ---
    $wp_customize->add_section( 'aoibase_security_approach', array(
        'title' => 'セキュリティアプローチ',
        'panel' => 'aoibase_security',
    ) );

    $security_approach_defaults = array(
        1 => array( '設計段階からのセキュリティ組み込み', '要件定義・設計フェーズでセキュリティ要件を定義し、脅威モデリングを実施。開発後に対処するのではなく、アーキテクチャレベルでリスクを排除します。' ),
        2 => array( '脆弱性対策・認証設計・データ保護',   '入力検証・出力エスケープ・パラメータバインディングなどの基本対策を徹底。認証・認可設計ではセッション管理やアクセス制御を厳密に実装し、データは暗号化と適切なアクセス制御で保護します。' ),
        3 => array( 'コードレビュー・テストによる品質担保', '全てのコードはセキュリティ観点を含むレビューを通過。自動テストによる脆弱性検知、依存パッケージの定期監査を実施し、リリース前の品質を担保します。' ),
    );

    foreach ( $security_approach_defaults as $n => $d ) {
        $add_field( 'aoibase_security_approach', "security_approach_{$n}_title", "アプローチ{$n} タイトル", $d[0] );
        $add_field( 'aoibase_security_approach', "security_approach_{$n}_desc",  "アプローチ{$n} 説明",     $d[1], 'textarea' );
    }

    $add_field( 'aoibase_security_approach', 'security_cta_text', 'CTAテキスト', 'セキュリティに不安はありませんか？' );

    // =========================================================================
    // PANEL: aoibase_operability (運用のしやすさ)
    // =========================================================================
    $wp_customize->add_panel( 'aoibase_operability', array(
        'title'    => '運用のしやすさ',
        'priority' => 35,
    ) );

    // --- Section: 運用しやすいシステムの特徴 ---
    $wp_customize->add_section( 'aoibase_operability_features', array(
        'title' => '運用しやすいシステムの特徴',
        'panel' => 'aoibase_operability',
    ) );

    $add_field( 'aoibase_operability_features', 'operability_intro', 'イントロ文', 'システムは「作って終わり」ではありません。リリース後の改修・機能追加・障害対応を見据え、保守性と拡張性を最初から設計に組み込むことが重要です。運用負荷の低いシステムは、ビジネス環境の変化にも柔軟に対応できます。', 'textarea' );

    $operability_feature_defaults = array(
        1 => array( '高い保守性',               'コードの可読性・モジュール分割・命名規則の統一により、担当者が変わっても迅速に理解・修正できる設計を目指します。' ),
        2 => array( '柔軟な拡張性',             '新機能の追加や外部サービスとの連携を、既存機能に影響を与えず実現できるアーキテクチャを採用します。' ),
        3 => array( '運用負荷の最小化',         '自動化・標準化された運用プロセスにより、日常的な運用タスクの負荷を軽減し、本来の業務に集中できる環境を構築します。' ),
        4 => array( '充実したドキュメント',     '設計意図・運用手順・トラブルシューティングを整備し、属人化を防止。チーム全体でシステムを運用できる体制を支援します。' ),
        5 => array( 'テスト容易性',             '自動テストが実行しやすい構造設計により、変更時の影響範囲を素早く検証し、安心してリリースできる仕組みを実現します。' ),
        6 => array( '可観測性（モニタリング）', 'システムの状態をリアルタイムで把握できる仕組みを設計段階から組み込み、障害の予兆検知と迅速な対応を可能にします。' ),
    );

    foreach ( $operability_feature_defaults as $n => $d ) {
        $add_field( 'aoibase_operability_features', "operability_feature_{$n}_title", "特徴{$n} タイトル", $d[0] );
        $add_field( 'aoibase_operability_features', "operability_feature_{$n}_desc",  "特徴{$n} 説明",     $d[1], 'textarea' );
    }

    // --- Section: 運用設計アプローチ ---
    $wp_customize->add_section( 'aoibase_operability_approach', array(
        'title' => '運用設計アプローチ',
        'panel' => 'aoibase_operability',
    ) );

    $operability_approach_defaults = array(
        1 => array( '改修・機能追加に対応しやすい仕組み', '疎結合なアーキテクチャ設計により、ある機能を変更しても他の機能に影響が波及しにくい構造を実現。ビジネス要件の変化に素早く追従できます。' ),
        2 => array( '一貫した体制でのサポート',           '設計・開発・運用を一貫して担当することで、システムの全体像を把握したうえでの素早い問題対応・改善提案が可能です。開発チームがそのまま運用フェーズに入るため、引き継ぎロスが発生しません。' ),
        3 => array( 'モニタリング・ログ設計',             'アプリケーションログ・パフォーマンスメトリクス・エラー通知を設計段階で組み込み、障害の予兆検知と迅速なインシデント対応を実現。運用チームが「状況を把握できる」仕組みを構築します。' ),
    );

    foreach ( $operability_approach_defaults as $n => $d ) {
        $add_field( 'aoibase_operability_approach', "operability_approach_{$n}_title", "アプローチ{$n} タイトル", $d[0] );
        $add_field( 'aoibase_operability_approach', "operability_approach_{$n}_desc",  "アプローチ{$n} 説明",     $d[1], 'textarea' );
    }

    $add_field( 'aoibase_operability_approach', 'operability_cta_text', 'CTAテキスト', '運用しやすいシステムを一緒に作りませんか？' );

    // =========================================================================
    // PANEL: aoibase_contact (お問い合わせ)
    // =========================================================================
    $wp_customize->add_panel( 'aoibase_contact', array(
        'title'    => 'お問い合わせ',
        'priority' => 36,
    ) );

    $wp_customize->add_section( 'aoibase_contact_content', array(
        'title' => 'お問い合わせ内容',
        'panel' => 'aoibase_contact',
    ) );

    $add_field( 'aoibase_contact_content', 'contact_intro', 'ページ紹介文', '課題・要件が固まっていなくても大丈夫です。<br>どんな小さなご質問も、専門チームが誠実にお答えします。', 'html' );
    $add_field( 'aoibase_contact_content', 'contact_form_heading', 'フォーム見出し', 'お問合せフォーム' );
    $add_field( 'aoibase_contact_content', 'contact_form_desc', 'フォーム説明', '<span class="text-[#DC2626]">*</span> は必須項目です。通常1〜2営業日以内にご返信いたします。', 'html' );

    // =========================================================================
    // PANEL: aoibase_news (NEWS)
    // =========================================================================
    $wp_customize->add_panel( 'aoibase_news', array(
        'title'    => 'NEWS',
        'priority' => 37,
    ) );

    $wp_customize->add_section( 'aoibase_news_content', array(
        'title' => 'NEWSページ内容',
        'panel' => 'aoibase_news',
    ) );

    $add_field( 'aoibase_news_content', 'news_intro', 'ページ紹介文', 'AOi Baseの最新情報・お知らせをお届けします。' );

    // =========================================================================
    // PANEL: aoibase_seo (SEO設定)
    // =========================================================================
    $wp_customize->add_panel( 'aoibase_seo', array(
        'title'    => 'SEO設定',
        'priority' => 38,
    ) );

    $wp_customize->add_section( 'aoibase_seo_general', array(
        'title' => 'SEO一般',
        'panel' => 'aoibase_seo',
    ) );

    $add_field( 'aoibase_seo_general', 'seo_gsc_verification', 'Google Search Console 認証コード', '' );
    $add_field( 'aoibase_seo_general', 'seo_og_default_description', 'OGP デフォルト説明文', 'AOi Baseは、Web開発・アプリ開発・システム開発で企業のDXを支援する信頼のITパートナーです。', 'textarea' );
}
add_action( 'customize_register', 'aoibase_customize_register' );
