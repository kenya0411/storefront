<?php
/**
 * Template Name: ショッピングカート
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

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/cart/page.css">

</head>
<body>
	<?php include( STYLESHEETPATH . '/nav.php' ); ?>


	<main>
		<section id="primary">
			<div class="container">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/cart/img/headimg.jpg" alt="ショッピングカート">
				<div class="heading"><p>Shopping Cart</p>
					<h2>ショッピングカート</h2></div>

				</div>

			</section>

			<!-- about -->

			<div class="maxWid mbPad mainSection">
<?php require( STYLESHEETPATH .'/components/content-cart.php') ?>

						<!-- items -->



<?php require( STYLESHEETPATH .'/components/sidebar.php') ?>
				</div>

			</main>


			<?php
		// do_action( 'storefront_sidebar' );
			get_footer();
