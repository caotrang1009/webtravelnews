<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Blog Site Template">
	<meta name="author" content="https://youtube.com/FollowAndrew">    
	<link rel="shortcut icon" href="images/logo.png"> 
	
	<?php wp_head(); ?>

</head> 

<body>
	
	<header class="position-relative">
		<div class="main-nav">
			<nav class="navbar navbar-expand-lg navbar-mega navbar-light pt-4">
				<div class="container position-relative">					
					<button class="navbar-toggler px-0 ms-3 collapsed d-md-none d-inline" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="d-flex align-items-center">
						<button class="navbar-toggler ps-0 collapsed d-lg-none d-md-inline d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="m-auto me-2 link-logo" title="" href="<? echo get_site_url(); ?>">
							<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
								if ( has_custom_logo() ) {
									echo '<img class="logo rounded" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
								} else {
									echo '<h1>' . get_bloginfo('name') . '</h1>';
								}
							?>
						</a>
						<span class="text-nowrap border-start ps-3 py-1 d-lg-inline d-none"><? echo date_i18n('l, d/m/Y') ?></span>
					</div>
					<a class="nav-link d-md-none d-inline" href="#"><i class="fal fa-user fs-4"></i></a>
					<div class="d-md-flex d-none align-items-center gap-3">
						<a class="nav-link border-end pe-3" href="<? echo site_url('breaking-news'); ?>"><i class="fal fa-clock me-2"></i>Breaking News</a>
						<div class="search rounded-5">							
							<form id="frm-search" class="d-flex align-items-center" name="frm-search" action="<? echo site_url(); ?>" method="GET">
								<button type="button" title="Search" class="btn mx-3 px-0" id="btn-search"><i class="fal fa-search"></i></button>
								<input class="border-0 me-3 input-search" type="text" name="s" placeholder="Search" autocomplete="off" style="display:none">
							</form>
						</div>
						<a class="nav-link" href="#"><i class="fal fa-user me-2"></i>Sign in</a>
					</div>
				</div>
			</nav>
			<nav class="navbar navbar-expand-lg navbar-mega navbar-light main-menu bg-primary py-0 mt-3">
				<div class="container position-relative">
					<div class="collapse navbar-collapse text-white" id="navbar-content">
						<?php
							wp_nav_menu(array(
								'menu' => 'primary',
								'menu_class' => 'navbar-nav navbar-nav-scroll me-auto',
								'container' => '',
								'li_class' => 'nav-item',
								'a_class' => 'nav-link',
								'active_class' => 'active'
							));
						?>
					</div>
				</div>
			</nav>
		</div>
	</header>
	
	<script>
		jQuery(document).ready(function() {
			jQuery("#btn-search").click(function() {
				if (jQuery(".input-search").val() == '') {
					jQuery(".input-search").toggle();
					if (jQuery(".input-search").is(":visible")) {
						jQuery(".search").addClass("border");
					} else {
						jQuery(".search").removeClass("border");
					}
					
				} else {
					jQuery('#frm-search').submit();
					jQuery(".input-search").val('');
				}
			});
		});
	</script>