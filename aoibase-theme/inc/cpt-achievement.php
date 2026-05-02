<?php
/**
 * Custom Post Type: Achievement (開発実績)
 *
 * Registers the `achievement` CPT, its taxonomies, post meta, and the
 * admin meta box used to edit project details from the WP admin screen.
 *
 * @package AOIbase
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -----------------------------------------------------------------------
// Custom sanitize callbacks
// -----------------------------------------------------------------------

/**
 * Sanitize a CSV string of attachment IDs.
 * Keeps only positive integers, deduplicates, and rejoins as CSV.
 *
 * @param string $value Raw input.
 * @return string Comma separated list of integer IDs (no spaces).
 */
function aoibase_sanitize_csv_ids( $value ) {
	if ( ! is_string( $value ) || '' === $value ) {
		return '';
	}

	$parts = explode( ',', $value );
	$ids   = array();

	foreach ( $parts as $part ) {
		$id = absint( trim( $part ) );
		if ( $id > 0 ) {
			$ids[] = $id;
		}
	}

	$ids = array_values( array_unique( $ids ) );

	return implode( ',', $ids );
}

/**
 * Common auth callback for protected post meta.
 *
 * Uses variadic args because WordPress core has historically passed
 * different argument counts to meta auth callbacks across versions.
 *
 * @param mixed ...$args WordPress-supplied auth callback args.
 *                       Index 2 is expected to be the object (post) ID.
 * @return bool
 */
function aoibase_meta_auth( ...$args ) {
	$object_id = isset( $args[2] ) ? (int) $args[2] : 0;
	return current_user_can( 'edit_post', $object_id );
}

// -----------------------------------------------------------------------
// Register Post Type
// -----------------------------------------------------------------------

/**
 * Register the achievement post type.
 */
function aoibase_register_achievement_cpt() {
	$labels = array(
		'name'               => '事例',
		'singular_name'      => '事例',
		'menu_name'          => '事例',
		'all_items'          => '実績一覧',
		'add_new'            => '新規追加',
		'add_new_item'       => '新しい実績を追加',
		'edit_item'          => '実績を編集',
		'new_item'           => '新しい実績',
		'view_item'          => '実績を表示',
		'search_items'       => '実績を検索',
		'not_found'          => '実績が見つかりません',
		'not_found_in_trash' => 'ゴミ箱に実績はありません',
	);

	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'has_archive'   => 'achievements',
		'show_in_rest'  => true,
		'rest_base'     => 'achievements',
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-portfolio',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
		'rewrite'       => array(
			'slug'       => 'achievements',
			'with_front' => false,
		),
	);

	register_post_type( 'achievement', $args );
}
add_action( 'init', 'aoibase_register_achievement_cpt' );

// -----------------------------------------------------------------------
// Register Taxonomies
// -----------------------------------------------------------------------

/**
 * Register the achievement_category and tech_stack taxonomies.
 */
function aoibase_register_achievement_taxonomies() {
	register_taxonomy(
		'achievement_category',
		array( 'achievement' ),
		array(
			'labels'            => array(
				'name'          => 'カテゴリ',
				'singular_name' => 'カテゴリ',
				'add_new_item'  => 'カテゴリを追加',
				'edit_item'     => 'カテゴリを編集',
			),
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'achievement-category',
				'with_front' => false,
			),
		)
	);

	register_taxonomy(
		'tech_stack',
		array( 'achievement' ),
		array(
			'labels'            => array(
				'name'          => '使用技術',
				'singular_name' => '使用技術',
				'add_new_item'  => '使用技術を追加',
				'edit_item'     => '使用技術を編集',
			),
			'hierarchical'      => false,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'achievement-tech',
				'with_front' => false,
			),
		)
	);

	register_taxonomy(
		'achievement_industry',
		array( 'achievement' ),
		array(
			'labels'            => array(
				'name'          => '業種',
				'singular_name' => '業種',
				'add_new_item'  => '業種を追加',
				'edit_item'     => '業種を編集',
			),
			'hierarchical'      => false,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'achievement-industry',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'aoibase_register_achievement_taxonomies' );

// -----------------------------------------------------------------------
// Register Post Meta
// -----------------------------------------------------------------------

/**
 * Register all achievement post meta with REST and auth callbacks.
 */
function aoibase_register_achievement_meta() {
	$meta_fields = array(
		'_aoibase_period'         => 'sanitize_text_field',
		'_aoibase_client_name'    => 'sanitize_text_field',
		'_aoibase_project_url'    => 'esc_url_raw',
		'_aoibase_challenge'      => 'wp_kses_post',
		'_aoibase_solution'       => 'wp_kses_post',
		'_aoibase_outcome'        => 'wp_kses_post',
		'_aoibase_summary'        => 'sanitize_textarea_field',
		'_aoibase_outcome_metric' => 'sanitize_text_field',
		'_aoibase_gallery_ids'    => 'aoibase_sanitize_csv_ids',
	);

	foreach ( $meta_fields as $key => $sanitize_cb ) {
		register_post_meta(
			'achievement',
			$key,
			array(
				'type'              => 'string',
				'single'            => true,
				'show_in_rest'      => array(
					'schema' => array(
						'type'    => 'string',
						'context' => array( 'view', 'edit' ),
					),
				),
				'sanitize_callback' => $sanitize_cb,
				'auth_callback'     => function ( ...$args ) {
					return aoibase_meta_auth( ...$args );
				},
			)
		);
	}

	register_post_meta(
		'achievement',
		'_aoibase_is_featured',
		array(
			'type'              => 'boolean',
			'single'            => true,
			'show_in_rest'      => array(
				'schema' => array(
					'type'    => 'boolean',
					'context' => array( 'view', 'edit' ),
				),
			),
			'sanitize_callback' => 'rest_sanitize_boolean',
			'auth_callback'     => function ( ...$args ) {
				return aoibase_meta_auth( ...$args );
			},
		)
	);
}
add_action( 'init', 'aoibase_register_achievement_meta' );

// -----------------------------------------------------------------------
// Admin: enqueue media for gallery picker
// -----------------------------------------------------------------------

/**
 * Load WP Media Modal on the achievement edit screen.
 *
 * @param string $hook Current admin page hook.
 */
function aoibase_achievement_admin_assets( $hook ) {
	if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( ! $screen || 'achievement' !== $screen->post_type ) {
		return;
	}

	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'aoibase_achievement_admin_assets' );

// -----------------------------------------------------------------------
// Admin: Meta Box
// -----------------------------------------------------------------------

/**
 * Register the achievement details meta box.
 */
function aoibase_add_achievement_meta_box() {
	add_meta_box(
		'aoibase_achievement_details',
		'実績詳細',
		'aoibase_render_achievement_meta_box',
		'achievement',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'aoibase_add_achievement_meta_box' );

/**
 * Render the achievement details meta box.
 *
 * @param WP_Post $post Current post object.
 */
function aoibase_render_achievement_meta_box( $post ) {
	wp_nonce_field( 'aoibase_save_achievement', 'aoibase_achievement_nonce' );

	$period         = get_post_meta( $post->ID, '_aoibase_period', true );
	$client_name    = get_post_meta( $post->ID, '_aoibase_client_name', true );
	$project_url    = get_post_meta( $post->ID, '_aoibase_project_url', true );
	$challenge      = get_post_meta( $post->ID, '_aoibase_challenge', true );
	$solution       = get_post_meta( $post->ID, '_aoibase_solution', true );
	$outcome        = get_post_meta( $post->ID, '_aoibase_outcome', true );
	$summary        = get_post_meta( $post->ID, '_aoibase_summary', true );
	$outcome_metric = get_post_meta( $post->ID, '_aoibase_outcome_metric', true );
	$gallery_ids    = get_post_meta( $post->ID, '_aoibase_gallery_ids', true );
	$is_featured    = get_post_meta( $post->ID, '_aoibase_is_featured', true );
	?>
	<style>
		.aoibase-meta-grid { display: grid; grid-template-columns: 1fr; gap: 14px; }
		.aoibase-meta-grid label { display: block; font-weight: 600; margin-bottom: 4px; }
		.aoibase-meta-grid input[type="text"],
		.aoibase-meta-grid input[type="url"],
		.aoibase-meta-grid textarea { width: 100%; }
		.aoibase-gallery-preview { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 8px; }
		.aoibase-gallery-preview img { width: 80px; height: 80px; object-fit: cover; border: 1px solid #ddd; }
	</style>
	<div class="aoibase-meta-grid">
		<div>
			<label for="aoibase_period"><?php echo esc_html( '期間' ); ?></label>
			<input type="text" id="aoibase_period" name="aoibase_period" value="<?php echo esc_attr( $period ); ?>" placeholder="例: 2024-04 〜 2024-09" />
		</div>
		<div>
			<label for="aoibase_client_name"><?php echo esc_html( 'クライアント名' ); ?></label>
			<input type="text" id="aoibase_client_name" name="aoibase_client_name" value="<?php echo esc_attr( $client_name ); ?>" />
		</div>
		<div>
			<label for="aoibase_project_url"><?php echo esc_html( 'プロジェクトURL' ); ?></label>
			<input type="url" id="aoibase_project_url" name="aoibase_project_url" value="<?php echo esc_attr( $project_url ); ?>" placeholder="https://example.com" />
		</div>
		<div>
			<label for="aoibase_summary"><?php echo esc_html( '概要' ); ?></label>
			<textarea id="aoibase_summary" name="aoibase_summary" rows="3"><?php echo esc_textarea( $summary ); ?></textarea>
		</div>
		<div>
			<label for="aoibase_challenge"><?php echo esc_html( '課題' ); ?></label>
			<textarea id="aoibase_challenge" name="aoibase_challenge" rows="4"><?php echo esc_textarea( $challenge ); ?></textarea>
		</div>
		<div>
			<label for="aoibase_solution"><?php echo esc_html( '解決策' ); ?></label>
			<textarea id="aoibase_solution" name="aoibase_solution" rows="4"><?php echo esc_textarea( $solution ); ?></textarea>
		</div>
		<div>
			<label for="aoibase_outcome"><?php echo esc_html( '成果' ); ?></label>
			<textarea id="aoibase_outcome" name="aoibase_outcome" rows="4"><?php echo esc_textarea( $outcome ); ?></textarea>
		</div>
		<div>
			<label for="aoibase_outcome_metric"><?php echo esc_html( '成果指標' ); ?></label>
			<input type="text" id="aoibase_outcome_metric" name="aoibase_outcome_metric" value="<?php echo esc_attr( $outcome_metric ); ?>" placeholder="例: CVR +35%" />
		</div>
		<div>
			<label><?php echo esc_html( 'ギャラリー画像' ); ?></label>
			<input type="hidden" id="aoibase_gallery_ids" name="aoibase_gallery_ids" value="<?php echo esc_attr( $gallery_ids ); ?>" />
			<button type="button" class="button" id="aoibase_gallery_select"><?php echo esc_html( '画像を選択' ); ?></button>
			<button type="button" class="button" id="aoibase_gallery_clear"><?php echo esc_html( 'クリア' ); ?></button>
			<div class="aoibase-gallery-preview" id="aoibase_gallery_preview">
				<?php
				if ( ! empty( $gallery_ids ) ) {
					$ids = array_filter( array_map( 'absint', explode( ',', $gallery_ids ) ) );
					foreach ( $ids as $aid ) {
						$thumb = wp_get_attachment_image( $aid, 'thumbnail' );
						if ( $thumb ) {
							echo wp_kses_post( $thumb );
						}
					}
				}
				?>
			</div>
		</div>
		<div>
			<label for="aoibase_is_featured">
				<input type="checkbox" id="aoibase_is_featured" name="aoibase_is_featured" value="1" <?php checked( '1', $is_featured ); ?> />
				トップ「PICK UP」セクションに表示する
			</label>
		</div>
	</div>
	<script>
	(function($){
		$(function(){
			var frame;
			$('#aoibase_gallery_select').on('click', function(e){
				e.preventDefault();
				if (frame) { frame.open(); return; }
				frame = wp.media({
					title: '<?php echo esc_js( 'ギャラリー画像を選択' ); ?>',
					button: { text: '<?php echo esc_js( '選択' ); ?>' },
					multiple: true,
					library: { type: 'image' }
				});
				frame.on('select', function(){
					var sel = frame.state().get('selection');
					var ids = [];
					var $preview = $('#aoibase_gallery_preview').empty();
					sel.each(function(att){
						var a = att.toJSON();
						ids.push(a.id);
						var url = (a.sizes && a.sizes.thumbnail) ? a.sizes.thumbnail.url : a.url;
						$preview.append($('<img>').attr('src', url));
					});
					$('#aoibase_gallery_ids').val(ids.join(','));
				});
				frame.open();
			});
			$('#aoibase_gallery_clear').on('click', function(e){
				e.preventDefault();
				$('#aoibase_gallery_ids').val('');
				$('#aoibase_gallery_preview').empty();
			});
		});
	})(jQuery);
	</script>
	<?php
}

// -----------------------------------------------------------------------
// Save Handler
// -----------------------------------------------------------------------

/**
 * Persist achievement meta on save_post.
 *
 * @param int $post_id Post ID.
 */
function aoibase_save_achievement_meta( $post_id ) {
	if ( ! isset( $_POST['aoibase_achievement_nonce'] ) ) {
		return;
	}

	$nonce = sanitize_text_field( wp_unslash( $_POST['aoibase_achievement_nonce'] ) );
	if ( ! wp_verify_nonce( $nonce, 'aoibase_save_achievement' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( wp_is_post_autosave( $post_id ) ) {
		return;
	}

	if ( wp_is_post_revision( $post_id ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'_aoibase_period'         => array( 'aoibase_period', 'sanitize_text_field' ),
		'_aoibase_client_name'    => array( 'aoibase_client_name', 'sanitize_text_field' ),
		'_aoibase_project_url'    => array( 'aoibase_project_url', 'esc_url_raw' ),
		'_aoibase_challenge'      => array( 'aoibase_challenge', 'wp_kses_post' ),
		'_aoibase_solution'       => array( 'aoibase_solution', 'wp_kses_post' ),
		'_aoibase_outcome'        => array( 'aoibase_outcome', 'wp_kses_post' ),
		'_aoibase_summary'        => array( 'aoibase_summary', 'sanitize_textarea_field' ),
		'_aoibase_outcome_metric' => array( 'aoibase_outcome_metric', 'sanitize_text_field' ),
		'_aoibase_gallery_ids'    => array( 'aoibase_gallery_ids', 'aoibase_sanitize_csv_ids' ),
	);

	foreach ( $fields as $meta_key => $config ) {
		list( $post_key, $sanitize_cb ) = $config;

		if ( ! isset( $_POST[ $post_key ] ) ) {
			continue;
		}

		$raw   = wp_unslash( $_POST[ $post_key ] );
		$value = call_user_func( $sanitize_cb, $raw );

		update_post_meta( $post_id, $meta_key, $value );
	}

	$is_featured_val = isset( $_POST['aoibase_is_featured'] ) ? '1' : '';
	update_post_meta( $post_id, '_aoibase_is_featured', $is_featured_val );
}
add_action( 'save_post_achievement', 'aoibase_save_achievement_meta' );

// -----------------------------------------------------------------------
// Flush rewrite rules on theme switch
// -----------------------------------------------------------------------

/**
 * Flush rewrite rules when the theme is activated, so the achievement
 * CPT/taxonomy permalinks resolve without an extra manual save in
 * Settings > Permalinks.
 *
 * Runs only on theme switch (not on every request) to avoid the
 * performance cost of an option lookup on `init`.
 */
function aoibase_flush_on_theme_switch() {
	aoibase_register_achievement_cpt();
	aoibase_register_achievement_taxonomies();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'aoibase_flush_on_theme_switch' );
