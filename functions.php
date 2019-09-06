<?php 


/*
Theme Name:  storefront - Child Theme
Template:    storefront
*/

////////////////////////////////////////////////////////////////////////////////////////////
///ここからfunction.phpの中身

/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */


$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 980; /* pixels */
}

$storefront = (object) array(
    'version'    => $storefront_version,

    /**
     * Initialize all the things.
     */
    'main'       => require 'inc/class-storefront.php',
    'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
    $storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
    $storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
    $storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

    require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

    require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
    require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
    require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if ( is_admin() ) {
    $storefront->admin = require 'inc/admin/class-storefront-admin.php';

    require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
    require 'inc/nux/class-storefront-nux-admin.php';
    require 'inc/nux/class-storefront-nux-guided-tour.php';

    if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
        require 'inc/nux/class-storefront-nux-starter-content.php';
    }
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */

////////////////////////////////////////////////////////////////////////////////////////////



//wp_headで出力されるtitleタグを削除
remove_action('wp_head', '_wp_render_title_tag', 1);





remove_action('wp_head', 'wp_generator'); //WPバージョン表記停止
remove_action('wp_head', 'feed_links', 2); //記事フィードリンク停止
remove_action('wp_head', 'feed_links_extra', 3); //カテゴリ・コメントフィードリンク停止
remove_action('wp_head', 'rsd_link'); //ブログ編集ツール連携停止
remove_action('wp_head', 'wlwmanifest_link'); //Windows Live Write連携停止
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); //prev/nextリンク停止
remove_action('wp_head', 'wp_shortlink_wp_head'); //短縮URL表記停止




/**
*wp_head  remove_action
*/
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');

remove_action('wp_print_styles', 'print_emoji_styles' );
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
//nextpage,prevpage
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
//canonicalのmetaタグ
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
/*jquerydelete*/
function delete_wphead_jquery() {
    wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'delete_wphead_jquery' );
/*title delete*/
remove_action( 'wp_head', '_wp_render_title_tag', 1 );
/*css delete*/
remove_action( 'wp_head', 'wp_print_styles',8);
remove_action( 'wp_head', 'wp_print_head_scripts',9);

function dequeue_plugins_style() {
    //プラグインIDを指定し解除する
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wc-block-style');
    wp_dequeue_style('storefront-style');


}
add_action( 'wp_enqueue_scripts', 'dequeue_plugins_style', 9999);
 


/* -------------------------------------------------- */
/* カスタム投稿(news)
/*--------------------------------------------------- */

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'news', [ // 投稿タイプ名の定義
        'labels' => [
            'name'          => 'ニュース', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'news',    // カスタム投稿の識別名
        ],
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => true, // アーカイブ機能ON/OFF
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
    ]);
}


/* -------------------------------------------------- */
/* パンくずリスト
/*--------------------------------------------------- */
 function get_categories_tree() {

    $post_categories = get_the_category();
    $cat_trees = array();
    $cat_counts = array();
    $cat_depth_max = 10;

    foreach ( $post_categories as $post_category ) {
        $depth = 0;
        $cat_IDs = array($post_category->cat_ID);
        $cat_obj = $post_category;

        while ( $depth < $cat_depth_max ) {
            if ( $cat_obj->category_parent == 0 ) {
                break;
            }
            $cat_obj = get_category($cat_obj->category_parent);
            array_unshift($cat_IDs, $cat_obj->cat_ID);
            $depth++;
        }
        array_push($cat_trees, $cat_IDs);
        array_push($cat_counts, count($cat_IDs));
    }

    $depth_max = max($cat_counts);
    $cat_key = array_search($depth_max, $cat_counts);
    $cat_tree = $cat_trees[$cat_key];
    return $cat_tree;
}


 ?>