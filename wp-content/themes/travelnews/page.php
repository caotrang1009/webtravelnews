<?php
get_header();
?>
<section class="position-relative">
	<div class="container">
		<div class="row">
			<?
					if (have_posts(  )) {
                        while(have_posts(  )) {
                            the_post();
                            the_content();
                        }
                    }
                ?>
		</div> 
	</div>
</section>

<?
get_footer();
?>