
<footer>

	<div class="flex maxWid mbPad">
		<div class="flex2">
			<a href="<?php echo home_url(); ?>">
				<h2>
					<img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/common/img/headlogo.jpg" alt="<?php bloginfo('name'); ?>"  alt="<?php bloginfo('name'); ?>"/>
				</h2>
			</a>
		</div>
		<div class="flex2">
			<div class="flexChild">
				<div class="flexChild2">Privacy Policy | Terms </div>
				<div class="flexChild2">            <?php wp_nav_menu( array( 
					'container'          => 'ul',
					'menu_class'      => 'footFlex',

					) ); ?></div>
				</div>

			</div>
		</div>


	</footer>
	<div id="footGoto">
	<a href="">TOP</a>
	</div>
	<!--object-fit（IE対策）-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/object-fit-images/3.2.3/ofi.js"></script>
	<script>objectFitImages();</script>
	<?php wp_footer(); ?>
</body>

</html>
