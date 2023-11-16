<?
//----------------------------------------recent posts
$args = array(
	'post_type'      => 'post',
    'posts_per_page' => 5,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$recent_posts = get_posts($args);

if (count($recent_posts) && !is_page('home')) {
?>
<div class="item">
	<h5 class="divider-title fw-bold text-capitalize">Recent Post</h5>
	<?
		foreach ($recent_posts as $l => $post) {
	?>
		<div class="card border-0 mb-3">
			<div class="row g-3">
				<div class="col-4">
					<a class="ratio ratio-4x3" title="title" href="">
						<img class="card-img fit-cover rounded bg-secondary bg-opacity-50" src="<? echo get_the_post_thumbnail_url( $post->ID ) ?>" alt="Card image">
					</a>
				</div>
				<div class="col-8">
					<h6 class="crop-text-2"><a href="<? echo get_permalink( $post->ID ) ?>" class="stretched-link fw-bold"><? echo $post->post_title ?></a></h6>
					<span class="small"><? echo get_the_date('M d, Y', $post->ID); ?></span>
				</div>
			</div>
		</div>
	<? } ?>
</div>
<? } ?>


<?
//----------------------------------------popular posts
$args = array(
	'post_type'			=> 'post',
	'posts_per_page'	=> 10,
	'meta_key'			=> 'post_view',
	'orderby'			=> 'meta_value_num',
	'order'				=> 'DESC',
);

$popular = new WP_Query( $args );

if (count($popular->posts)) {
?>
<div class="item">
	<h5 class="divider-title fw-bold text-capitalize">Most Read</h5>
	<ol class="most-read">
	<?
		foreach ($popular->posts as $l => $post) {
	?>
		<li><h6 class="mb-0"><a href="#" class="fw-bold"><? echo $post->post_title ?></a></h6></li>
	<? } ?>
	</ol>
</div>
<? } ?>