<article class="msLeft">
	<section id="blog">
		<div class="blogFlex">

			<?php

			$args = array(
				'post_type' => 'post',
 		   'posts_per_page' => 5 // 表示件数の指定
 		);
			$posts = get_posts( $args );
  foreach ( $posts as $post ): // ループの開始
  setup_postdata( $post ); // 記事データの取得

  $cat = get_the_category();
$catname = $cat[0]->cat_name; //カテゴリー名
$catslug = $cat[0]->slug; //スラッグ名
?>
<div class="blogFlex2">


	<div class="flex"><div class="flex2">
		<a href="<?php the_permalink(); ?>" class="alink">
<?php if ( has_post_thumbnail() ) { // 投稿にアイキャッチ画像が割り当てられているかチェックします。
	the_post_thumbnail();
} else{ ?>
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/common/img/noimg.png" alt="">
<?php } ?>
<div class="blogCat <?php echo $catslug ?>"><a href="<?php echo esc_url( home_url( '/' ) ).'/category/'.$catslug; ?>"><?php echo $catname; ?></a></div>
</a>
</div>
<div class="flex2">
	<a href="<?php the_permalink(); ?>" class="alink">

		<h3><?php the_title(); ?></h3>
		<p><?php the_excerpt() ?></p>
		<div><?php the_time( 'Y.m.d' ); ?></div>
	</a>
</div>
</div>

</div>

<?php
endforeach; // ループの終了
wp_reset_postdata(); // 直前のクエリを復元する
?>
</a>
</div>
<!-- blogFlex -->
</section>
</article>
