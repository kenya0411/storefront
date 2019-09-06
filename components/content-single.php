<?php 
    $cat = get_the_category();
    $cat = $cat[0];
  $category = get_the_category();
  $cat_id   = $category[0]->cat_ID;
  $cat_name = $category[0]->cat_name;
  $cat_slug = $category[0]->category_nicename;
?>



<article class="msLeft">
	<section id="single">
<div class="singleFlex">
	<div class="flex2 cat"><div><a href="<?php echo './category/'.$cat_slug; ?>"><?php echo $cat_name; ?></a></div></div>
	<div class="flex2 catch"><h1><?php echo the_title() ?></h1></div>
	<div class="flex2 time"><?php the_date("Y.n.j"); ?></div>
	<div class="flex2 thumb"><?php echo the_post_thumbnail() ?></div>
	<div class="flex2 contents"><?php echo the_content() ?></div>
</div>
<div class="related">
<!-- 関連記事 -->
<?php if( has_category() ) {
	$cats = get_the_category();
	$catkwds = array();
	foreach($cats as $cat) {
		$catkwds[] = $cat->term_id;
	}
} ?>
<?php
$myposts = get_posts( array(
	'post_type' => 'post',
	'posts_per_page' => '6',
	'post__not_in' => array( $post->ID ),
	'category__in' => $catkwds,
	'orderby' => 'rand'
) ); 
if( $myposts ): ?>

<div class="related">
<h3>RELATED POST</h3>
<ul>
<?php foreach($myposts as $post):
setup_postdata($post); ?>

<li><a href="<?php the_permalink(); ?>">
	<div class="related-thumb">
	<?php if( has_post_thumbnail() ): ?>
	<?php echo get_the_post_thumbnail($post->ID, 'thumb100'); ?>
        <?php else: ?>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/common/img/noimg.png" alt="NO IMAGE" title="NO IMAGE" />
        <?php endif; ?>
	</div>

	<div class="related-title">
	<div><h4><?php the_title(); ?></h4></div>
	<div class="days"><?php the_date("Y.n.j"); ?></div>
	</div>
</a></li>

<?php endforeach; ?>
</ul>
</div>
<?php wp_reset_postdata();
endif; ?>
<!-- 関連記事ここまで -->
</div>
<div class="pageFlex">
<?php
$prevpost = get_adjacent_post(true, '', true); //前の記事
$nextpost = get_adjacent_post(true, '', false); //次の記事
if( $prevpost or $nextpost ){ //前の記事、次の記事いずれか存在しているとき
?>
<ul>
<?php
if ( $prevpost ) { //前の記事が存在しているとき
echo '<li><a href="' . get_permalink($prevpost->ID) . '"><div class="reThumb">' . get_the_post_thumbnail($prevpost->ID, 'thumbnail') . '<span class="move prev">PREV</span></div><div class="reContent">' . get_the_title($prevpost->ID) . '</div></a></li>';
} else { //前の記事が存在しないとき
echo '';
}
if ( $nextpost ) { //次の記事が存在しているとき
echo '<li><a href="' . get_permalink($nextpost->ID) . '"><div class="reContent">' . get_the_title($nextpost->ID) . '</div><div class="reThumb">' . get_the_post_thumbnail($nextpost->ID, 'thumbnail') . '<span class="move next">NEXT</span></div></a></li>';
} else { //次の記事が存在しないとき
echo '';
}
?>
</ul>
<?php } ?>
</div>
	</section>
</article>
