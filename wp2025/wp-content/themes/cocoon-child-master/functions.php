<?php //子テーマ用関数
if ( !defined( 'ABSPATH' ) ) exit;

//子テーマ用のビジュアルエディタースタイルを適用
add_editor_style();

// 投稿のアーカイブページを作成する
// function post_has_archive($args, $post_type)
// {
//     if ('post' == $post_type) {
//         $args['rewrite'] = true; // リライトを有効にする
//         $args['has_archive'] = 'posts'; // 任意のスラッグ名
//     }
//     return $args;
// }
// add_filter('register_post_type_args', 'post_has_archive', 10, 2);

function add_bootstrap_to_header() {
    // Bootstrap CSSを追加
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', [], null);
}
add_action('wp_enqueue_scripts', 'add_bootstrap_to_header');

// カスタム投稿タイプにリビジョン追加
function add_posttype_revisions() {
    add_post_type_support( 'info', 'revisions' );
}
add_action('init', 'add_posttype_revisions');

// お知らせの投稿タイプ一覧を表示するショートコード
function custom_news_shortcode($atts) {
    $args = shortcode_atts(array(
        'posts_per_page' => 10, // 表示する投稿数
    ), $atts);

    $query = new WP_Query(array(
        'post_type' => 'info', // CPT UIで作成した投稿タイプ
        'posts_per_page' => $args['posts_per_page'],
    ));

    $output = '<div class="news-list">';
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<div class="news-item">';
            $output .= '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
            $output .= '<div class="news-content">' . apply_filters('the_content', get_the_content()) . '</div>';
            $output .= '</div>';
        }
        wp_reset_postdata();
    } else {
        $output .= '<p>現在お知らせはありません。</p>';
    }
    $output .= '</div>';

    return $output;
}
add_shortcode('custom_news', 'custom_news_shortcode');

apply_filters('the_content', get_the_content());



// カラムを追加
function add_mstation_columns($columns) {
    $columns['station_address'] = '設置場所';
    $columns['gazou'] = '画像';
    $columns['order'] = '表示順';
    return $columns;
}
add_filter('manage_mstation_posts_columns', 'add_mstation_columns');

// カラムの内容を表示
function display_mstation_columns($column, $post_id) {
    switch ($column) {
        case 'station_address':
            // station_address の表示
            $station_address = get_post_meta($post_id, 'station_address', true);
            echo esc_html($station_address);
            break;
        case 'order':
            // station_name の表示
            $order = get_post_meta($post_id, 'order', true);
            echo esc_html($order);
            break;
        case 'gazou':
            // gazou の画像を表示
            $image_id = get_post_meta($post_id, 'gazou', true);
            if ($image_id) {
                $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                if ($image_url) {
                    echo '<img src="' . esc_url($image_url) . '" alt="" style="max-width:100px; height:auto;">';
                } else {
                    echo 'No image';
                }
            } else {
                echo 'No image';
            }
            break;
    }
}
add_action('manage_mstation_posts_custom_column', 'display_mstation_columns', 10, 2);

// 投稿リストの並び順をカスタマイズ
function set_mstation_order_sortable($columns) {
    $columns['order'] = 'order';
    return $columns;
}
add_filter('manage_edit-mstation_sortable_columns', 'set_mstation_order_sortable');

/// 投稿リストの並び順をカスタマイズ
function sort_mstation_by_order($query) {
    global $pagenow;
    if (is_admin() && $pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'mstation') {
        $orderby = $query->get('orderby');
        if ($orderby === 'order') {
            $query->set('meta_key', 'order');       // 'order' フィールドを対象
            $query->set('orderby', 'meta_value_num'); // 数値順に並び替え
            $query->set('order', 'ASC');            // 昇順 (DESC にすると降順)
        }
    }
}
add_action('pre_get_posts', 'sort_mstation_by_order');