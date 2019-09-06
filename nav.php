
<header class="headFix">
  <div class="flex maxWid mbPad">
    <div class="flex2"> <!-- custom header -->
      <div id="header_img">
        <a href="<?php echo home_url(); ?>">
          <h1>
            <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/common/img/headlogo.jpg" alt="<?php bloginfo('name'); ?>"  alt="<?php bloginfo('name'); ?>"/>
          </h1>
        </a>
      </div>
    </div>

    <div class="flex2"> 
      <div id="nav_toggle">
        <div>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

      <div class="flexPrice">
        <div class="flexPrice2">

          <?php 
          global $woocommerce;
          $price = $woocommerce->cart->total; 
          echo '<a href="'.wc_get_cart_url().'" class="cart">';
          echo 'カートの商品　¥'.number_format($price);
          echo '【'.$woocommerce->cart->cart_contents_count.'件】'; 
          echo '</a>';
          ?>
        </div>
        <div class="flexPrice2">
          <nav>
            <?php wp_nav_menu( array( 
              'container'          => 'ul',
              'menu'          => 'li',
              'menu_class'      => 'navFlex',

            ) ); ?>
          </nav>

        </div>
      </div>
    </div>
  </div>
</header>


