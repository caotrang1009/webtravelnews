<div class="card mb-5 border-0">
    <div class="row">
        <div class="col-md-7 mt-3 mt-md-0">
            <h3 class="fw-bold"><a href="<? echo get_permalink(); ?>"><? echo get_the_title(); ?></a></h3>
            <div class="crop-text-5 mb-3"><? echo get_the_excerpt(); ?></div>
            <!-- Card info -->
            <ul class="nav nav-divider align-items-center">
                <li class="nav-item">
                    <div class="d-flex align-items-center position-relative">
                        <? 
                            $avatar = get_avatar_url(get_the_author_meta('ID'), ['size' => '40']);
                            if ($avatar) {
                        ?>
                            <img class="avatar-img rounded-circle fit-cover" src="<? echo $avatar ?>" alt="avatar">
                        <? } else { ?>
                            <img class="avatar-img rounded-circle fit-cover" avatar="<? echo get_the_author(); ?>" alt="avatar">
                        <? } ?>
                        <span class="ms-3">by <? echo get_the_author(); ?></span>
                    </div>
                </li>
                <li class="nav-item"><? echo get_the_date('M j, Y'); ?></li>
            </ul>
        </div>
        <div class="col-md-5">
            <a class="ratio ratio-4x3" href="<? echo get_permalink(); ?>">
                <img class="rounded-2 fit-cover bg-secondary bg-opacity-50" src="<? echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="thumbnail">
            </a>
        </div>
    </div>
</div>