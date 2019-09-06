<article class="msLeft">
	<section id="product">
		<div class="productFlex">

			<div class="flex4">
				<h3><?php the_title(); ?></h3>
			</div>
			<div class="flex4">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php 
						global $product;
						$attachment_ids = $product->get_gallery_attachment_ids();
						$productName = $product->get_name();
						$productImg = get_the_post_thumbnail_url( $product->get_id(), 'full' );

						?>

						<div class="swiper-slide"><img src="<?php echo $productImg ?>" alt="<?php echo $productName ?>"></div>
						<?php foreach( $attachment_ids as $attachment_id ) 
						{
							$full_url = wp_get_attachment_image_src( $attachment_id, 'full' )[0];
							?>

							<div class="swiper-slide"><img src="<?php echo $full_url ?>" alt="<?php echo $productName ?>"></div>
						<?php } ?>


					</div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>

				</div>
			</div>

			<div class="flex4">
				<div class="catch">商品紹介 - Details</div>
				<div class="detail">
					<span class="price">販売価格　<?php echo $product->get_price_html(); ?></span><br>
					<span class="etc">※3,000円以上のお買い上げで送料無料</span>
					<p>
						<?php 
						global $post;
						$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
						if ( ! $short_description ) {
							return;
						}

						?>
						<?php echo $short_description; // WPCS: XSS ok. ?>


					</p>
				</div>

				<div class="flex">
					<div class="flex2">
						<?php 
						$stock = $product->get_stock_quantity();
						if ($stock  = 'NULL') {?>
							在庫状態：在庫無し
						<?php }else{ ?>
							在庫状態：在庫有り（<?php echo $product->get_stock_quantity(); ?>）
						<?php }//if ?>
					</div>
					<div class="flex2"></div>
				</div>
		<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
			sprintf( '<div class="addCart"><a href="%s" data-quantity="%s" class="%s" %s>カートに入れる</a></div>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
				esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
				isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
				esc_html( $product->add_to_cart_text() )
			),
			$product, $args );
		

			?>

		</div>
		<div class="flex4">
			<h4><?php echo post_custom('hedding'); ?></h4>
			<p><?php the_content() ?></p>

		</div>


	</div>
	<!-- productFlex -->
</section>
</article>
