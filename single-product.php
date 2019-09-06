<?php
/**
 * Template Name: 商品ページ
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
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/common/set/swiper.min.css">

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/common/subpage.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/product/page.css">
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/swiper.min.js"></script>
</head>
<body>
	<?php include( STYLESHEETPATH . '/nav.php' ); ?>


	<main>
<?php require( STYLESHEETPATH .'/components/breadcrumbs.php') ?>



			<div class="maxWid mbPad mainSection">
 <?php require( STYLESHEETPATH .'/components/content-product.php') ?>
				



						<!-- items -->



<?php require( STYLESHEETPATH .'/components/sidebar.php') ?>
				</div>

			</main>
<script>
  var swiper = new Swiper('.swiper-container', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',

    },
	loop: true,

	slidesPerView: 'auto',
	spaceBetween: 100,
	centeredSlides : true,
	pagination: {
		el: '.swiper-pagination',
		type: 'bullets',
		clickable: true,
	}

  });
</script>

			<?php
		// do_action( 'storefront_sidebar' );
			get_footer();
