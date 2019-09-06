<?php
/**
 * Template Name: ブログ一覧ページ
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
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/bloglist/page.css">

</head>
<body>
	<?php include( STYLESHEETPATH . '/nav.php' ); ?>


	<main>

		<section id="primary">
			<div class="container">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/bloglist/img/headimg.jpg" alt="商品一覧">
				<div class="heading"><p>Blog List</p>
					<h2>ブログ一覧</h2></div>

				</div>

			</section>

			<!-- about -->
			<div class="maxWid mbPad mainSection">
<?php require( STYLESHEETPATH .'/components/blog-list.php') ?>

						<!-- items -->



<?php require( STYLESHEETPATH .'/components/sidebar.php') ?>
				</div>

			</main>


			<?php
		// do_action( 'storefront_sidebar' );
			get_footer();
