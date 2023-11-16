<?php
get_header();
?>
<section>
    <div class="container">
        <?
        if (have_posts(  )) {
            while(have_posts(  )) {
                the_post();
                get_template_part('template-parts/post/content');
            }
        }
        ?>
    </div>
</section>

<?
get_footer();
?>
