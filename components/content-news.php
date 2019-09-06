

<article class="msLeft">
	<section id="newsPage">
<div class="newsPageFlex">

	<div class="flex2 catch"><h1><?php echo the_title() ?></h1></div>
	<div class="flex2 time"><?php the_date("Y.n.j"); ?></div>
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
	'post_type' => 'news',
	'posts_per_page' => '6',
	'post__not_in' => array( $post->ID ),
	'category__in' => $catkwds,
	'orderby' => 'date'
) ); 
if( $myposts ): ?>

<div class="related">
<h3>RECENT NEWS</h3>
<ul>
<?php foreach($myposts as $post):
setup_postdata($post); ?>

<li><a href="<?php the_permalink(); ?>">


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

	</section>
</article>
