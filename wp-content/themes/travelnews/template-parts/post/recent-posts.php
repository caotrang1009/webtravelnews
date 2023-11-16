<?
	$recent_posts = wp_get_recent_posts(['numberposts' => '10']);
	$array1 = array_slice($recent_posts, 0, 5);
	$array2 = array_slice($recent_posts, 5, 4);
?>
	<div class="row pb-3">
		<div class="col-md-7">
			<div class="tiny-slider arrow-hover arrow-blur arrow-round rounded-2 news-slider">
				<div class="tiny-slider-inner" data-gutter="20" data-items="1" data-autoplay="false">
					<? foreach ($array1 as $i => $post) { ?>
					<div class="item" id="rewind-item<? echo $i ?>">
						<div class="card card-overlay-bottom card-bg-scale rounded-0 border-0" style="background-image: url(<? echo get_the_post_thumbnail_url( $post['ID'] ) ?>);background-position: center left;background-size: cover; height:550px;">
							<div class="card-img-overlay d-flex flex-column p-3 p-sm-5 z-2"> 
								<div class="w-100 mt-auto">
									<div class="col">
										<span class="badge bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i><? echo get_the_category($post['ID'])[0]->name ?></span>
										<h2 class="text-white fs-1 fw-bold"><a href="<? echo get_permalink( $post['ID'] ) ?>"><? echo $post['post_title'] ?></a></h2>
										<p class="text-white crop-text-2"><? echo $post['post_excerpt'] ?></p>
										<ul class="nav nav-divider align-items-center text-white">
											<li class="nav-item">
												<div class="d-flex align-items-center position-relative">
													<?
														$avatar_url = get_avatar_url($post['post_author'], array('size' => 40));
														if ($avatar_url) {
													?>
														<img class="avatar-img rounded-circle" src="<? echo $avatar_url ?>" alt="avatar">
													<? } else { ?>
														<img class="avatar-img rounded-circle" avatar="<? echo get_the_author_meta('display_name', $post['post_author']); ?>">
													<? } ?>
													<span class="ms-3 text-white">by <? echo get_the_author_meta('display_name', $post['post_author']); ?></span>
												</div>
											</li>
											<li class="nav-item"><? echo get_the_date('M d, Y', $post['ID']); ?></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<? } ?>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<? foreach ($array2 as $i => $post) { ?>
			<div class="card mb-4 border-0">
				<div class="row g-3">
					<div class="col-4">
						<a class="ratio ratio-4x3" href="<? echo get_permalink( $post['ID'] ) ?>">
							<img class="rounded-2 fit-cover" src="<? echo get_the_post_thumbnail_url( $post['ID'] ) ?>" alt="">
						</a>
					</div>
					<div class="col-8">
						<span class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i><? echo get_the_category($post['ID'])[0]->name ?></span>
						<h5><a href="<? echo get_permalink( $post['ID'] ) ?>" class="fw-bold"><? echo $post['post_title'] ?></a></h5>
						<ul class="nav nav-divider align-items-center">
							<li class="nav-item">
								<div class="d-flex align-items-center position-relative">
									<?
										$avatar_url = get_avatar_url($post['post_author'], array('size' => 32));
										if ($avatar_url) {
									?>
										<img class="avatar-img rounded-circle" src="<? echo $avatar_url ?>" alt="avatar">
									<? } else { ?>
										<img class="avatar-img rounded-circle" avatar="<? echo get_the_author_meta('display_name', $post['post_author']); ?>">
									<? } ?>
									<span class="ms-3">by <? echo get_the_author_meta('display_name', $post['post_author']); ?></span>
								</div>
							</li>
							<li class="nav-item"><span><? echo get_the_date('M d, Y', $post['ID']); ?></span></li>
						</ul>
					</div>
				</div>
			</div>
			<? } ?>
		</div>
	</div>