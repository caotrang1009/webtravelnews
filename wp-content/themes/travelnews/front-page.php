<?php get_header(); ?>

<section>
	<div class="container">
		<? get_template_part('template-parts/post/recent-posts') ?>
		<div class="row pt-3">
			<div class="col-sm-9">
				<?
					$categories = get_categories( array(
						'orderby' => 'name',
						'order'   => 'ASC'
					) );
				
					foreach ($categories as $i => $category) {
						$posts = get_posts( array(
							'numberposts' => 4,
							'category' => $category->cat_ID
						) );
						$content = preg_replace('/<(figure|ul|ol|h[1-6])(.*?)>(.*?)<\/\1>/i', '', $posts[0]->post_content);
						$post_content = preg_replace('/<p>(.*?)<\/p>/i', '<div>$1</div>', $content);
				?>
					<div class="py-4 border-top border-2" id="category-<? $category->cat_ID ?>">
						<h3 class="fw-bold text-capitalize mb-3"><a href="<? echo get_category_link( $category->term_id ) ?>"><? echo $category->name ?></a></h3>
						<div class="row g-4 justify-content-between">
							<div class="col-lg-6">
								<div class="card border-0">
									<div class="position-relative">
										<a class="ratio ratio-4x3" title="title" href="<? echo get_permalink( $posts[0]->ID ) ?>">
											<img class="card-img fit-cover rounded bg-secondary bg-opacity-50" src="<? echo get_the_post_thumbnail_url( $posts[0]->ID ) ?>" alt="Card image">
										</a>
									</div>
									<div class="card-body px-0 pt-3">
										<h4><a href="<? echo get_permalink( $posts[0]->ID ) ?>" class="fw-bold"><? echo $posts[0]->post_title ?></a></h4>
										<div class="card-text crop-text-3"><? echo (has_excerpt( $posts[0]->ID )) ? $posts[0]->post_excerpt : $post_content ?></div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
							<?
								foreach ($posts as $k => $post) {
									if ($k != 0) {
							?>
								<div class="card border-0 mb-4">
									<div class="row g-3">
										<div class="col-4 col-sm-3">
											<a class="ratio ratio-1x1" title="title" href="">
												<img class="card-img fit-cover rounded bg-secondary bg-opacity-50" src="<? echo get_the_post_thumbnail_url( $post->ID ) ?>" alt="Card image">
											</a>
										</div>
										<div class="col-8">
											<h5><a href="<? echo get_permalink( $post->ID ) ?>" class="stretched-link fw-bold"><? echo $post->post_title ?></a></h5>
											<ul class="nav nav-divider align-items-center">
												<li class="nav-item">
													<div class="nav-link p-0">
														<span>by <? echo get_the_author_meta('display_name', $post->post_author); ?></span>
													</div>
												</li>
												<li class="nav-item"><span><? echo get_the_date('M d, Y', $post->ID); ?></span></li>
											</ul>
										</div>
									</div>
								</div>
								<? } } ?>
							</div>
						</div>
					</div>
				<? } ?>
			</div>
			<div class="col-sm-3 sidebar">
			<?php get_sidebar(); ?>
			<?php 
				if (is_active_sidebar('ads-sidebar')) : 
					dynamic_sidebar('ads-sidebar');
				endif;
			?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>