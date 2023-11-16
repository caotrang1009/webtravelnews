<?php
get_header();
?>
<section class="position-relative">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
                <?
                    if (have_posts(  )) {
                        while(have_posts(  )) {
                            the_post();
                            get_template_part('template-parts/content', 'archive');
                        }
                        custom_pagination();
                    }
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