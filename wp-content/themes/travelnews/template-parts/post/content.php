<?php
/**
 * Template for display blog
 */
?>

<section class="pb-3 pb-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
        		<span class="badge text-bg-danger mb-2"><i class="fas fa-circle me-2 small fw-bold"></i><? echo get_the_category(get_the_ID())[0]->name; ?></span>
				<?php
					if (is_singular()) :
						the_title('<h1 class="entry-title">', '</h1>');
					else :
						the_title('<h2 class="entry-title"><a class="entry-link" href="'.esc_url( get_permalink() ).'">', '</a></h2>');
					endif;
				?>
			</div>
			 <p class="lead"><?php the_excerpt(); ?></p>
		</div>
	</div>
</section>
<section class="pt-0">
	<div class="container position-relative" data-sticky-container="">
		<div class="row">
			<div class="col-lg-2">
				<div class="text-start text-lg-center mb-5" data-sticky="" data-margin-top="80" data-sticky-for="991" style="">
					<div class="position-relative">
                        <? 
                            $avatar = get_avatar_url(get_the_author_meta('ID'), ['size' => '80']);
                            if ($avatar) {
                        ?>
                            <img class="avatar-img rounded-circle fit-cover" src="<? echo $avatar ?>" alt="avatar">
                        <? } else { ?>
                            <img class="avatar-img rounded-circle fit-cover" avatar="<? echo get_the_author(); ?>" alt="avatar">
                        <? } ?>
						<span class="h5 stretched-link mt-2 mb-0 d-block"><? echo get_the_author(); ?></span>
					</div>
					<hr class="d-none d-lg-block">
					<ul class="list-inline list-unstyled">
						<li class="list-inline-item d-lg-block my-lg-2"><? echo get_the_date('M j, Y'); ?></li>
						<li class="list-inline-item d-lg-block my-lg-2"><i class="far fa-eye me-1"></i> <? echo get_post_meta(get_the_ID(), 'post_view', true); ?> Views</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-7 mb-5">
      	        <div class="content">
				  <? the_content(); ?>
				</div>
				<? comments_template(); ?>
			</div>
            <div class="col-lg-3 sidebar">
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