<?php
/**
 * Template Name: フロントページ
 * The main template file.
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/top/page.css">
</head>
<body>
	<?php include( STYLESHEETPATH . '/nav.php' ); ?>


	<main>

		<section id="mainImg">
			<div class="miSrc">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/top/img/mainimg.jpg" alt="格安商品を期間限定で販売中">
			</div>
			<div class="maxWid mbPad">
				<div class="miTitle">
					<h2><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/top/img/title.png" alt="BEST ITEM SELECTION"></h2>
					<p>格安商品を期間限定で販売中！</p>
				</div>
			</div>
		</section>
		<!-- mainImg -->
		<section id="about" class="maxWid mbPad">
			<h2>About</h2>
			<p>輸入した商品や中古品などの商品をメインに販売しております。<br>
				コピーはダミーですコピーはダミーですコピーはダミーですコピーはダミーです<br>
			コピーはダミーですコピーはダミーですコピーはダミーですコピーはダミーです</p>


		</section>
		<!-- about -->
		<div class="maxWid mbPad mainSection">
			<article class="msLeft">
<?php require( STYLESHEETPATH .'/components/item-list.php') ?>
					<!-- items -->

					<section id="news">
						<h2>News</h2>

						<?php

						$args = array(
							'post_type' => 'news',
									    'posts_per_page' => 5 // 表示件数の指定
									);
						$posts = get_posts( $args );
									  foreach ( $posts as $post ): // ループの開始
									  setup_postdata( $post ); // 記事データの取得

									  $cat = get_the_category();
									$catname = $cat[0]->cat_name; //カテゴリー名
									$catslug = $cat[0]->slug; //スラッグ名
									?>
									<div class="flex">
										<div class="flex2">
											<ul>	



												<li><?php the_time( 'Y/m/d' ); ?></li><!--日付-->
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li><!--タイトル-->

											</ul>
										</div>
									</div>

									<?php
									  endforeach; // ループの終了
									  wp_reset_postdata(); // 直前のクエリを復元する
									  ?>
									</section>
									<!-- news -->
								</article>
								<?php require( STYLESHEETPATH .'/components/sidebar.php') ?>
							</div>

						</main>


						<?php
		// do_action( 'storefront_sidebar' );
						get_footer();
