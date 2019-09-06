<?php
/**
 * Template Name: 商品一覧ページ
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

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/common/subpage.css">

</head>
<body>
	<?php include( STYLESHEETPATH . '/nav.php' ); ?>


	<main>

		<section id="primary">
			<div class="container">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/itemlist/img/headimg.jpg" alt="商品一覧">
				<div class="heading"><p>Item List</p>
					<h2>商品一覧</h2></div>

				</div>
				<p class="headingText">コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。コピーはダミーです。</p>
			</section>

			<!-- about -->
			<div class="maxWid mbPad mainSection">
				<?php require( STYLESHEETPATH .'/components/item-list.php') ?>
					<aside class="msRight">
						<div class="aside">
							<h3>Search</h3>
							
							<?php get_search_form(); ?>
						</div>
						<div class="aside">
							<h3>Catgory</h3>
							<ul>
								<li><a href="">メンズファッション</a></li>
								<li><a href="">レディースファッション</a></li>
								<li><a href="">書籍</a></li>
							</ul>
						</div>
						<div class="aside">
							<h3>Account</h3>
							<ul>
								<li><a href="">aaa</a></li>
								<li><a href="">aaa</a></li>
								<li><a href="">aaa</a></li>
							</ul>
						</div>

					</aside>
				</div>

			</main>


			<?php
		// do_action( 'storefront_sidebar' );
			get_footer();
