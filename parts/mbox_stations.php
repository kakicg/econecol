<style type="text/css">
    .location {
  display: flex;
  flex-wrap: wrap;
  margin: 20px -10px -5px 0;
}
.location li {
  margin: 5px 10px 5px 0;
  flex: 1 1 auto;
}
.location li a {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 10px;
  border: 2px #b3b3b3 solid;
  background: #fff;
  height: 37px;
  font-weight: 700;
  color: #3c3c3c;
  -webkit-border-radius: 30px;
  -moz-border-radius: 30px;
  -ms-border-radius: 30px;
  -o-border-radius: 30px;
  border-radius: 30px;
}
img.attachment-medium {
    width: auto; /* 幅を自動調整 */
    height: auto; /* 高さも自動調整 */
    max-width: 100%; /* コンテナ内でのレスポンシブ対応 */
}
</style>
<?php
$domain = $_SERVER['HTTP_HOST'];
require_once( dirname(dirname( __FILE__ )) . '/wp2025/wp-load.php' );
// echo dirname(dirname( __FILE__ )) . '/wp2022/wp-load.php';
?>
<?php
$args = array(
    'post_type'      => 'mstation', // カスタム投稿タイプ
    'posts_per_page' => -1,         // 全ての投稿を取得
    'orderby'        => 'meta_value_num',
    'meta_key'       => 'order',
    'order'          => 'ASC',
);

$query = new WP_Query($args);

// データを格納するための配列
$mstation_data = array();

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();

        // 各投稿のデータを配列に格納
        $mstation_data[] = array(
            'id'          => get_the_ID(), // 投稿ID
            'name'      => get_post_meta(get_the_ID(), 's_name', true), // station_name カスタムフィールド    
            'title'       => get_the_title(), // 投稿タイトル
            'address'     => get_post_meta(get_the_ID(), 'station_address', true), // station_address カスタムフィールド
            'duration'     => get_post_meta(get_the_ID(), 'station_duration', true), // station_address カスタムフィールド
            'paper'        => get_post_meta(get_the_ID(), 'ukeire_paper', true), // paper カスタムフィールド
            'magazine'        => get_post_meta(get_the_ID(), 'ukeire_magazine', true), // paper カスタムフィールド
            'cardboad'        => get_post_meta(get_the_ID(), 'ukeire_cardboard', true), // paper カスタムフィールド
            'hurugi'        => get_post_meta(get_the_ID(), 'ukeire_hurugi', true), // paper カスタムフィールド
            'almi'        => get_post_meta(get_the_ID(), 'ukeire_almi', true), // paper カスタムフィールド
            'metal'        => get_post_meta(get_the_ID(), 'ukeire_metal', true), // paper カスタムフィールド
            'googlemap'        => get_post_meta(get_the_ID(), 'googlemap', true), // paper カスタムフィールド
            'image_id'   => get_post_meta(get_the_ID(), 'gazou', true), // image カスタムフィールド
            'order'       => get_post_meta(get_the_ID(), 'order', true), // order カスタムフィールド
        );
    }

    // グローバル変数をリセット
    wp_reset_postdata();
} else {
    echo 'No posts found.';
}

// 配列を確認する
// echo '<pre>';
// print_r($mstation_data);
// echo '</pre>';
?>

<div id="tab02" class="tabbox">
    <div class="locationin">

    <?php
        if (!empty($mstation_data)) {
            foreach ($mstation_data as $station) {
                ?>
                <div id="<?php echo esc_attr($station['id']); ?>" class="locationbox">

                    <div class="locamap">
                        <?php echo $station['googlemap']; ?>

                        <?php // echo esc_url($station['googlemap']); ?>
                    </div>
                    <div class="locaflex">
                        <p class="fleximg">
                            <?php
                            echo wp_get_attachment_image($station['image_id'], 'medium');
                            // echo wp_get_attachment_image($station['image_id'], 'full');
                            if (strpos($station['duration'], '24時間') !== false) {
                                ?>
                                <span class="flextime"><span class="timelar">24</span>時間営業</span>
                                <?php
                            }
                            ?>
                            
                        </p>
                        <div class="flexin">
                            <p class="hdl"><?php echo esc_html($station['title']); ?></p>
                            <ul class="flexat">
                                <li><span class="atcap">所在地</span><?php echo esc_html($station['address']); ?></li>
                                <li><span class="atcap">利用時間</span><?php echo esc_html($station['duration']); ?></li>
                            </ul>
                            <div class="flexitem">
                                <p class="flexitemtit">受入品目</p>
                                <ul class="flexlist">
                                    <?php if (!empty($station['paper'])) : ?>
                                        <li>
                                            <p class="itemimg hlg02"><img src="img/hikitori/free_news.png" alt="新聞"></p>
                                            <p class="itemtxt">新聞</p>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($station['magazine'])) : ?>
                                        <li>
                                            <p class="itemimg hlg02"><img src="img/hikitori/free_paper.png" alt="雑誌"></p>
                                            <p class="itemtxt">雑誌</p>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($station['cardboad'])) : ?>
                                        <li>
                                            <p class="itemimg hlg02"><img src="img/hikitori/free_cardboard.png" alt="段ボール"></p>
                                            <p class="itemtxt">段ボール</p>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($station['hurugi'])) : ?>
                                        <li>
                                            <p class="itemimg hlg02"><img src="img/hikitori/free_oldclothes.png" alt="古着"></p>
                                            <p class="itemtxt">古着</p>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($station['almi'])) : ?>
                                        <li>
                                            <p class="itemimg hlg02"><img src="img/hikitori/free_aluminum.png" alt="アルミ缶"></p>
                                            <p class="itemtxt">アルミ缶</p>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($station['metal'])) : ?>
                                        <li>
                                            <p class="othercircle">金属類</p>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<p>No stations found.</p>';
        }
    ?>
    </div>
    <ul class="location">
<?php
    if (!empty($mstation_data)) {
        foreach ($mstation_data as $station) {
?>
        <li><a href="#<?php echo esc_attr($station['id']); ?>"><?php
            if (!empty($station['name'])) {
                echo esc_html($station['name']);
            } else {
                echo esc_html($station['title']);
            }
        ?><img src="img/toriatukai/arrow_location.png" alt=""></a></li>
        
    <?php
        }
    }
    ?></ul>
    <br>
    <?php include("./parts/contact.php"); ?>

</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/common.js"></script>
	<script type="text/javascript" src="js/jquery.matchHeight-min.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {
        // 全ての locationbox を非表示
        $(".locationbox").hide();

        // 一番目の locationbox を表示
        $(".locationbox").first().show();
        $('.location li a').first().addClass('on');
    });
	$(function(){
		$('.tabnavi li a').click(function(){
			var _id = $(this).attr('href');
			$('.tabnavi li a').removeClass('on');
			$(this).addClass('on');
			$('.tabbox').hide();
			$(_id).show();
			muchHeight();
			return false;
		});
	})
	$(function(){
		$('.location li a').click(function(){
			var _id = $(this).attr('href');
			$('.location li a').removeClass('on');
			$(this).addClass('on');
			$('.locationbox').hide();
			$(_id).show();
			muchHeight();
			return false;
		});
	})
</script>