<?php
function travelnews_theme_support() {	
	// Add dynamic title tag
	load_theme_textdomain( 'travelnews', get_template_directory().'/languages' );

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
	add_theme_support( 'post-thumbnails' );

	$defaults = array(
		'height'               => 100,
		'width'                => 'auto',
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'travelnews_theme_support', 0 );

/*-------------------------------------------------
Menu
-------------------------------------------*/

function travelnews_menus() {	
	$locations = array(
		'primary' => "Header Menu Items",
		"footer" => "Footer Menu Items"
	);
	register_nav_menus($locations);
}
add_action( 'init', 'travelnews_menus' );

function add_class_li($classes, $item, $args) {	
	if (isset($args->li_class)) {
		$classes[] = $args->li_class;
	}
	if (isset($args->active_class) && in_array('current-menu-item', $classes)) {
		$classes[] = $args->active_class;
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'add_class_li', 10, 4 );

function add_anchor_class($attr, $item, $args) {
	if (isset($args->a_class)) {
		$attr['class'] = $args->a_class;
	}
	return $attr;
}
add_filter( 'nav_menu_link_attributes', 'add_anchor_class', 10, 4 );

/*-------------------------------------------------
Enqueue styles
-------------------------------------------*/

if ( ! function_exists( 'travelnews_styles' ) ) :

	function travelnews_styles() {
		wp_enqueue_style('travelnews-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), '5.3.2', 'all');
		wp_enqueue_style('travelnews-fontawesome-css', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css', array(), '5.10.0', 'all');
		wp_enqueue_style('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css', array(), '2.9.4', 'all');
		wp_enqueue_style('travelnews-style', get_stylesheet_uri(), array('travelnews-bootstrap', 'tiny-slider'), wp_get_theme()->get('Version'), 'all');
	}

endif;
add_action( 'wp_enqueue_scripts', 'travelnews_styles' );

/*-------------------------------------------------
Enqueue scripts
-------------------------------------------*/


if ( ! function_exists( 'travelnews_scripts' ) ) :

	function travelnews_scripts() {
		wp_enqueue_script('jquery', 'https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js', array(), '3.6.1', true);
		wp_enqueue_script('travelnews-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array(), '5.3.2', true);
		wp_enqueue_script('travelnews-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', array(), '2.11.8', true);
		wp_enqueue_script('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js', array(), '2.9.4', true);
		wp_enqueue_script('adsbygoogle', 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5007254918732877', array(), '2.9.4', true);
		wp_enqueue_script('travelnews-script', get_template_directory_uri().'/assets/js/main.js', array('jquery', 'travelnews-bootstrap', 'travelnews-popper', 'tiny-slider'), wp_get_theme()->get('Version'), true);
	}	

endif;
add_action( 'wp_enqueue_scripts', 'travelnews_scripts' );


function custom_comment_output( $comment, $args, $depth ) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( 'comment' ); ?>>
    <div class="my-2 d-flex comment-body" id="div-comment-<?php comment_ID(); ?>">
            <?
                $avatar = get_avatar_url( $comment, 18 );
                if ($avatar) {
            ?>
                <img class="avatar avatar-md rounded-circle float-start me-3" src="<? echo get_avatar_url( $comment, 18 ) ?>" alt="avatar">
            <? } else { ?>
                <img class="avatar avatar-md rounded-circle float-start me-3" avatar="<? echo get_comment_author(); ?>" alt="avatar">
            <? } ?>
            <div>
                <div class="mb-2">
					<h5 class="m-0"><? echo get_comment_author(); ?></h5>
					<span class="me-3 small">
                        <?php printf( '%1$s at %2$s', get_comment_date(), get_comment_time() ); ?>
                        <?php
                            if ( current_user_can( 'edit_comment', $comment->comment_ID ) ) {
                                echo ' | ';
                                edit_comment_link( 'Edit', '', '' );
                            }
                        ?>
                    </span>
					<span href="#" class="text-body fw-normal">
                    <?php
                        comment_reply_link(
                            array_merge(
                                $args,
                                array(
                                    'depth'     => $depth,
                                    'max_depth' => $args['max_depth'],
                                )
                            )
                        );
                        ?>
                    </span>
				</div>
				<?php comment_text(); ?>
			</div>
		</div>
    </<?php echo $tag; ?>>
<?php
}


function custom_pagination() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer

    $paginate_links = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array',
        'prev_text' => __('&laquo; Previous', 'textdomain'),
        'next_text' => __('Next &raquo;', 'textdomain'),
    ));

    if ($paginate_links) {
        echo '<ul class="pagination justify-content-end">';
        foreach ($paginate_links as $link) {
            echo '<li>' . $link . '</li>';
        }
        echo '</ul>';
    }
}

function register_custom_widgets() {
    register_sidebar(array(
        'name'          => __('Ads Sidebar', 'your-theme-textdomain'),
        'id'            => 'ads-sidebar',
        'description'   => __('Add custom content here.', 'your-theme-textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}

add_action('widgets_init', 'register_custom_widgets');


/*-------------------------------------------------
add plugin
-------------------------------------------*/
require 'travelnews-posts-view-counter.php';
