<?php
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit;

if ( is_active_sidebar( 'sidebar' ) || is_active_sidebar( 'sidebar-scroll' ) ) : ?>
<!-- ブログサイドバー -->
<div id="sidebar" class="sidebar nwa cf" role="complementary">

	<?php dynamic_sidebar( 'sidebar' ); ?>

  
  <!-- <aside class="widget_recent_entries">
<h3>最近のお知らせ</h3>
<ul>
  <?php $args = array(
	'numberposts' => 5, //表示する記事の数
	'post_type' => 'info' //投稿タイプ名
	);
	$customPosts = get_posts($args);
	if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post );
?>
	<li><a href="<?php the_permalink(); ?>" target="_blank"><span class="newsdate"><?php the_time('Y-m-d'); ?></span> <span class="newscont"><?php the_title(); ?></span></a></li>
<?php endforeach; ?>
<?php else : //記事が無い場合 ?>
	</ul>
<?php endif;
	wp_reset_postdata(); //クエリのリセット
?>
</aside> -->


  <?php
  ////////////////////////////
  //サイドバー追従領域
  ////////////////////////////
  if ( is_active_sidebar( 'sidebar-scroll' ) ) : ?>
  <div id="sidebar-scroll" class="sidebar-scroll">
    <?php dynamic_sidebar( 'sidebar-scroll' ); ?>
  </div>
  <?php endif; ?>

</div>
<?php endif; ?>
