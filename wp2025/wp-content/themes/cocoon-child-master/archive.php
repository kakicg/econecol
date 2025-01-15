<?php
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit; ?>
<?php get_header(); ?>
<?php //一覧

//get_template_part('tmp/list-title');

////////////////////////////
//インデックスリストトップウィジェット
////////////////////////////
if ( is_active_sidebar( 'index-top' ) ){
  dynamic_sidebar( 'index-top' );
};
?>

<div id="list" class="<?php echo get_index_list_classes(); ?>">
<div>
  <img src="http://syneco.co.jp/wp2022/wp-content/uploads/2022/11/blog-banner.jpg" />
  <p>しんえこの担当者ブログ</p>
</div>
<?php
////////////////////////////
//一覧の繰り返し処理
////////////////////////////
$count = 0;
if (have_posts()) : // WordPress ループ
  while (have_posts()) : the_post(); // 繰り返し処理開始
    $count++;
    set_query_var( 'count', $count );
    get_template_part('tmp/entry-card');

    //インデックスミドルに広告を表示してよいかの判別
    if (is_ad_pos_index_middle_visible() && is_index_middle_ad_visible($count) && is_all_adsenses_visible()) {
      get_template_part_with_ad_format(get_ad_pos_index_middle_format(), 'ad-index-middle', is_ad_pos_index_middle_label_visible());
    }

    ////////////////////////////
    //インデックスリストミドルウィジェット
    ////////////////////////////
    if ( is_active_sidebar( 'index-middle' ) && is_index_middle_widget_visible($count) ){
      dynamic_sidebar( 'index-middle' );
    };

  endwhile; // 繰り返し処理終了
  $count = 0; ?>
<?php else : // ここから記事が見つからなかった場合の処理
  get_template_part('tmp/list-not-found-posts');
endif;
wp_pagenavi();
?>

</div><!-- .list -->

<?php get_footer(); ?>