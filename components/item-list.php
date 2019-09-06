
<section id="items">
	<h2>Items</h2>
	<div class="flex itemSort">
		<div class="flex2">人気の商品</div>
		<div class="flex2">
			<select name="" id="">
				<option value="">商品の並び替え</option>

			</select></div>
		</div>
		<div class="itemFlex">
			<?php for ($i=0; $i < 6; $i++) { ?>
				<div class="itemFlex2">
					<div class="flex">
						<div class="itm"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/top/img/img.jpg" alt=""></div>
						<div class="itm"><h3>カジュアルジャケット</h3></div>
						<div class="itm"><p>1,980円</p></div>
					</div>
				</div>
			<?php } ?>

		<div class="itemFlex">

<?php 
global $product;
	do_action( 'storefront_sorting_wrapper' );
wc_get_template( 'archive-product.php' );

 ?>
 <ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">

</div>



		</div>

	</section>



<!-- 


<section id="items">
<h2>Items</h2>
<div class="flex itemSort">
<div class="flex2">人気の商品</div>
<div class="flex2">
<select name="" id="">
<option value="">商品の並び替え</option>

</select></div>
</div>
<div class="itemFlex">
<?php for ($i=0; $i < 6; $i++) { ?>
<div class="itemFlex2">
	<div class="flex">
		<div class="itm"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/top/img/img.jpg" alt=""></div>
		<div class="itm"><h3>カジュアルジャケット</h3></div>
		<div class="itm"><p>1,980円</p></div>
	</div>
</div>
<?php } ?>








</div>

</section>
-->
