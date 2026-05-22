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

    $add_field( 'aoibase_security_risks', 'security_header_lead', 'ヘッダーリード文', '「うちは小さい会社だから大丈夫」——その油断が最大のリスクです。サイバー攻撃の標的は大企業だけではありません。', 'textarea' );
    $add_field( 'aoibase_security_risks', 'security_intro', 'イントロ文', 'セキュリティ被害の損害額は中小企業でも数百万円規模。「知らなかった」では済まないリスクが、あなたのWebサイトやシステムにも潜んでいます。', 'textarea' );

    $security_risk_defaults = array(
        1 => array( '顧客データの一括流出',         'お客様の個人情報・決済情報がまとめて盗まれる攻撃。謝罪対応・損害賠償・信用失墜につながり、事業存続を脅かします。' ),
        2 => array( 'サイト訪問者への二次被害',     'あなたのサイトを訪れたお客様が、知らないうちに偽サイトに誘導されたり個人情報を抜き取られる被害。サイトの信頼が一瞬で崩れます。' ),
        3 => array( '管理画面の乗っ取り',           '管理画面への不正ログインにより、サイト改ざんや顧客データの持ち出しが発生。パスワードが簡単だっただけで全データが流出する事例も。' ),
        4 => array( 'なりすまし操作',               'ログイン中のユーザーが、意図せず送金や設定変更を実行させられる攻撃。ECサイトや会員制サービスで特に深刻な被害が報告されています。' ),
        5 => array( 'システム内部の露出',           'サーバー情報やデータベース構造が外部から丸見えになり、攻撃者に侵入の手がかりを与えてしまう状態。多くの情報漏洩事故の入り口です。' ),
        6 => array( '放置された開発ツールの欠陥',   '開発に使われた外部ツールの欠陥が、そのままシステムの弱点に。「作って終わり」の開発会社に任せると、放置されたまま攻撃対象になります。' ),
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
        1 => array( '「作ってから直す」ではなく「最初から守る」', 'プロジェクト開始時にセキュリティリスクを洗い出し、設計に組み込みます。後から対策を追加するよりコストが低く、確実です。' ),
        2 => array( 'お客様のデータを守る仕組みを標準装備',     '個人情報の暗号化、不正アクセスの防止、安全なログイン機能を最初から実装。「追加料金でセキュリティ対策」ではなく、すべての開発に標準で組み込みます。' ),
        3 => array( '納品前チェックと継続的な安全管理',         '納品前にセキュリティチェックを実施し、問題がないことを確認してからリリース。使用ツールの脆弱性も定期的に監視し、必要に応じてアップデートを提案します。' ),
    );

    foreach ( $security_approach_defaults as $n => $d ) {
        $add_field( 'aoibase_security_approach', "security_approach_{$n}_title", "アプローチ{$n} タイトル", $d[0] );
        $add_field( 'aoibase_security_approach', "security_approach_{$n}_desc",  "アプローチ{$n} 説明",     $d[1], 'textarea' );
    }

    $add_field( 'aoibase_security_approach', 'security_cta_text', 'CTAテキスト', '今のサイト、本当に安全ですか？' );

    // --- Section: セキュリティ対策 ---
    $wp_customize->add_section( 'aoibase_security_measures', array(
        'title' => 'セキュリティ対策',
        'panel' => 'aoibase_security',
    ) );

    $add_field( 'aoibase_security_measures', 'security_measures_intro', 'イントロ文', 'リスクに対して、AOi Baseでは以下の具体的な技術を標準で導入しています。追加料金なし、すべてのプロジェクトに適用します。', 'textarea' );

    $security_measure_defaults = array(
        1 => array( 'パスキー認証の導入',         'パスワードを使わず、指紋や顔認証でログインできる最新の認証方式。フィッシング詐欺に強く、パスワード流出のリスクをゼロにします。ユーザーの利便性も大幅に向上します。' ),
        2 => array( 'SSL/HTTPS通信の暗号化',     'サイトとユーザー間のすべての通信を暗号化し、データの盗聴や改ざんを防止。Google検索での評価向上にもつながります。' ),
        3 => array( 'WAF（不正アクセス防御）',     'Webアプリケーションへの攻撃をリアルタイムで検知・遮断する防御システム。SQLインジェクションやXSSなどの攻撃を自動でブロックします。' ),
        4 => array( '自動バックアップと復旧体制',   '定期的な自動バックアップにより、万が一の障害やサイバー攻撃でもデータを復元可能。復旧手順も事前に整備し、ダウンタイムを最小限に抑えます。' ),
    );

    foreach ( $security_measure_defaults as $n => $d ) {
        $add_field( 'aoibase_security_measures', "security_measure_{$n}_title", "対策{$n} タイトル", $d[0] );
        $add_field( 'aoibase_security_measures', "security_measure_{$n}_desc",  "対策{$n} 説明",     $d[1], 'textarea' );
    }

    // --- Section: インシデント対応 ---
    $wp_customize->add_section( 'aoibase_security_response', array(
        'title' => 'インシデント対応',
        'panel' => 'aoibase_security',
    ) );

    $add_field( 'aoibase_security_response', 'security_response_intro', 'イントロ文', 'どれだけ対策を講じても、リスクをゼロにすることはできません。AOi Baseでは万が一に備えた対応体制を整備しています。', 'textarea' );

    $security_response_defaults = array(
        1 => array( '異常検知', 'サイトの挙動や不正アクセスの兆候を監視' ),
        2 => array( '影響調査', '被害範囲の特定と原因の究明' ),
        3 => array( '緊急対策', '被害拡大の防止と応急処置' ),
        4 => array( '復旧・報告', 'システム復旧と再発防止策の実施・報告' ),
    );

    foreach ( $security_response_defaults as $n => $d ) {
        $add_field( 'aoibase_security_response', "security_response_{$n}_title", "ステップ{$n} タイトル", $d[0] );
        $add_field( 'aoibase_security_response', "security_response_{$n}_desc",  "ステップ{$n} 説明",     $d[1] );
    }

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

    $add_field( 'aoibase_operability_features', 'operability_header_lead', 'ヘッダーリード文', '「作ってもらったシステム、ちょっとした修正にも時間とお金がかかる」——そんな経験はありませんか？', 'textarea' );
    $add_field( 'aoibase_operability_features', 'operability_intro', 'イントロ文', 'システムは「作って終わり」ではありません。多くの中小企業が、リリース後の運用で想定外のコストや手間に悩まされています。', 'textarea' );

    $operability_feature_defaults = array(
        1 => array( '小さな修正なのに高額な見積もり', '「ここの文言を変えたいだけなのに、なぜこんなに費用がかかるの？」——作り方が悪いと、簡単な修正でもシステム全体に影響が出て、大がかりな作業になってしまいます。' ),
        2 => array( '新しい機能を追加できない', '「予約機能をつけたい」「会員ページを追加したい」と思っても、今のシステム構造では対応できないと言われる。ビジネスの成長にシステムが追いつけない状態です。' ),
        3 => array( '担当者が手作業で回している', 'データの集計、バックアップ、お知らせの更新……すべて手作業。担当者が休むと業務が止まり、ミスも増える。本来の仕事に集中できていません。' ),
        4 => array( '開発会社しかわからない', 'システムの仕組みを知っているのは開発会社だけ。説明書もなく、担当者が退職したら誰も対応できない。完全に「人質」状態になっていませんか？' ),
        5 => array( '更新するたびに不具合が出る', '「一箇所直したら別の画面が壊れた」「更新のたびにヒヤヒヤする」——変更の影響を事前に確認する仕組みがないと、改修のたびにリスクを抱えます。' ),
        6 => array( 'トラブルが起きても原因がわからない', '「サイトが遅い」「エラーが出る」と言われても、いつから・なぜ・どこで起きているのかわからない。原因究明に時間がかかり、お客様への影響が長引きます。' ),
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
        1 => array( '「作って終わり」にしない設計', '開発の最初から「リリース後にどう使うか」を一緒に考えます。将来の機能追加や担当者の交代まで想定した設計で、長く使えるシステムを作ります。' ),
        2 => array( '設計から運用まで、同じチームが担当', '開発したチームがそのまま運用もサポート。システムの中身を知り尽くした人間が対応するので、問い合わせへの回答も素早く、的確です。引き継ぎミスもありません。' ),
        3 => array( '問題を未然に防ぐ仕組みづくり', 'トラブルが起きてから慌てるのではなく、異常を早期に検知して対処する仕組みを最初から組み込みます。「気づいたら直っていた」という安心感を提供します。' ),
    );

    foreach ( $operability_approach_defaults as $n => $d ) {
        $add_field( 'aoibase_operability_approach', "operability_approach_{$n}_title", "アプローチ{$n} タイトル", $d[0] );
        $add_field( 'aoibase_operability_approach', "operability_approach_{$n}_desc",  "アプローチ{$n} 説明",     $d[1], 'textarea' );
    }

    $add_field( 'aoibase_operability_approach', 'operability_cta_text', 'CTAテキスト', '今のシステム、運用に困っていませんか？' );

    // --- Section: 運用の解決策 ---
    $wp_customize->add_section( 'aoibase_operability_solutions', array(
        'title'    => '運用の解決策',
        'panel'    => 'aoibase_operability',
        'priority' => 30,
    ) );

    $add_field( 'aoibase_operability_solutions', 'operability_solutions_intro', 'イントロ文', 'これらの悩みが起きないよう、AOi Baseでは最初から「運用しやすさ」を設計に組み込みます。追加料金なし、すべてのプロジェクトに標準適用します。', 'textarea' );

    $operability_solution_defaults = array(
        1 => array( '修正・追加がしやすい設計', '機能をブロックのように独立させた設計で、一箇所を変えても他に影響しません。「ちょっとした修正」がちゃんと「ちょっとした費用」で済むシステムを作ります。' ),
        2 => array( '自動化で手間を最小限に', 'データの集計、バックアップ、更新通知など、定型作業を自動化。担当者の負担を減らし、ミスも防ぎます。人に依存しない運用体制を構築します。' ),
        3 => array( 'わかりやすい操作マニュアル', '「開発会社にしかわからない」をなくします。操作手順・トラブル時の対処法を、専門知識がなくても読めるマニュアルとしてお渡しします。' ),
        4 => array( 'システムの健康状態を見える化', 'サイトの表示速度、エラーの発生状況、アクセス数の変化を自動で記録・通知。問題が大きくなる前に気づける仕組みを標準で導入します。' ),
    );

    foreach ( $operability_solution_defaults as $n => $d ) {
        $add_field( 'aoibase_operability_solutions', "operability_solution_{$n}_title", "解決策{$n} タイトル", $d[0] );
        $add_field( 'aoibase_operability_solutions', "operability_solution_{$n}_desc",  "解決策{$n} 説明",     $d[1], 'textarea' );
    }

    // --- Section: 継続サポート ---
    $wp_customize->add_section( 'aoibase_operability_support', array(
        'title'    => '継続サポート',
        'panel'    => 'aoibase_operability',
        'priority' => 40,
    ) );

    $add_field( 'aoibase_operability_support', 'operability_support_intro', 'イントロ文', 'システムは完成してからが本番。AOi Baseではリリース後も継続的にサポートし、お客様のビジネス成長を支え続けます。', 'textarea' );

    $operability_support_defaults = array(
        1 => array( '定期点検', '月次でシステムの状態を確認・報告' ),
        2 => array( '改善提案', '利用状況に基づいた機能改善のご提案' ),
        3 => array( '迅速対応', '不具合やご要望に素早く対応' ),
        4 => array( '成長支援', 'ビジネス拡大に合わせたシステム拡張' ),
    );

    foreach ( $operability_support_defaults as $n => $d ) {
        $add_field( 'aoibase_operability_support', "operability_support_{$n}_title", "ステップ{$n} タイトル", $d[0] );
        $add_field( 'aoibase_operability_support', "operability_support_{$n}_desc",  "ステップ{$n} 説明",     $d[1] );
    }

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
