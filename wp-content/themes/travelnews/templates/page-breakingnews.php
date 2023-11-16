<?php
/**
 * Template Name: Template Breaking News
 */
get_header();
?>
<section class="position-relative">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
                <?
					$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 10,
						'paged' => $paged
					);
					
					$wp_query = new WP_Query($args);
					
                    if ($wp_query->have_posts()) {
                        while($wp_query->have_posts()) {
                            the_post();
                            get_template_part('template-parts/page/content', 'page');
                        }
                        custom_pagination();
                    }
					wp_reset_postdata();
                ?>
			</div>
			<div class="col-lg-3 mt-5 mt-lg-0">
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

<?
get_footer();
?>