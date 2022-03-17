<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo('title'); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png" rel="shortcut icon">	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="black-gradient"></div>
	<header>
		<?php get_template_part( 'template-parts/common/common', 'disclaimer' ) ?>

		<div class="logo-wrap">
			<div class="container">
				<h1 class="logo">
					<a class="text-hide" href="<?php echo home_url(); ?>"> <?php echo home_url(); ?> </a>
				</h1>
				
				<div class="search-menu-wrap">
					<?php get_template_part( 'template-parts/common/common', 'search-form' ) ?>

				    <span class="mob-search-btn"></span>

				    <nav class="nav-menu">
			    		<?php wp_nav_menu( array( 'theme_location'=>'category-menu' ) ); ?>
				    </nav>
				</div>

			    <a href="javascript:void(0)" class="mobilemenu-icon">
		            <span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>
		        </a>
			</div>
		</div>
		
		<!-- breadcrumb	 -->
		<?php
			global $breadcrumbs_temp;
			if( is_single() || is_category() || in_array( get_page_template_slug() , $breadcrumbs_temp ) ){
				get_breadcrumb();
			}
		?>
	</header>