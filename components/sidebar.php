<aside class="msRight">
	<div class="aside">
		<h3>Search</h3>
		
		<?php get_search_form(); ?>
	</div>
	<div class="aside">
		<h3>Catgory</h3>

		<?php
		$args = array(
			'orderby' => 'name',
			'taxonomy' => 'product_cat',
			'hide_empty' => 1,
		);
		$categories = get_categories( $args );
		echo '<ul>';
		foreach ( $categories as $category ) {
			$cat_link = get_category_link($category->cat_ID);
			$post_ID = 'product_cat_'.$category->cat_ID;

		// if(get_field('initial', $post_ID) == $list ){
			echo '<li><a href="' . $cat_link . '">' . $category->name . '</a></li>';
		// }
		}
		echo '</ul>';

		?>
	</div>
	<div class="aside">
		<h3>Account</h3>
		<ul>
			<li><a href="<?php echo wc_get_cart_url(); ?>">ショッピングカート</a></li>
			<li><a href="">aaa</a></li>
			<li><a href="">aaa</a></li>
			<li><a href="">aaa</a></li>
		</ul>
	</div>

</aside>