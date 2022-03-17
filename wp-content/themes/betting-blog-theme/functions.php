<?php

	//Root Path For Theme
	if( !defined('THEME_ROOT') ){ define('THEME_ROOT', get_template_directory_uri()); }

	//Includes
	include_once 'includes/remove-junk.php';
	include_once 'includes/meta-tags.php';

	//Theme Support
	if( function_exists('add_theme_support') ){
		// Add Menu Support
	    add_theme_support('menus');

	    // Add Thumbnail Theme Support
	    add_theme_support('post-thumbnails');

	    //Add Image Sizes
	    add_image_size( 'thumbnail-400x317', '400', '317', true );  //home- top -slider
	    add_image_size( 'thumbnail-350x227', '350', '227', true );  //search - desk
	    add_image_size( 'thumbnail-150x150', '150', '150', true );  //multiple pages - mob
	    add_image_size( 'thumbnail-1000x750', '1000', '750', true );  //article
	    add_image_size( 'thumbnail-500x400', '500', '400', true );  //article thumbnail - desk
	    add_image_size( 'thumbnail-575x615', '575', '615', true );  //article thumbnail - mob
	    add_image_size( 'thumbnail-100x100', '100', '100', true );  //article-category latest blog
	    add_image_size( 'thumbnail-900x630', '900', '630', true ); //category main thumbnail - desk
	    add_image_size( 'thumbnail-600x640', '600', '640', true ); //category main thumbnail - mob
	    add_image_size( 'thumbnail-400x270', '400', '270', true ); //home page - latest blog

	    //Allow Shortcode In Widget Area
	    add_filter('widget_text','do_shortcode');
	}

	//Register Navigation Location
	function register_theme_menus(){
		register_nav_menus( array(
			'category-menu'	=>	__('Category Menu'),
		) );
	}
	add_action( 'after_setup_theme', 'register_theme_menus' );

	//Load Theme assets
	function theme_assets(){

		wp_enqueue_style( 'thm-bootstrap', THEME_ROOT.'/assets/css/bootstrap.css', $deps = array(), filemtime( get_template_directory().'/assets/css/bootstrap.css' ), $media = '' );
		wp_enqueue_style( 'thm-fonts', THEME_ROOT.'/assets/css/fonts.css', $deps = array(), filemtime( get_template_directory().'/assets/css/fonts.css' ), $media = '' );
		wp_enqueue_style( 'thm-slick', THEME_ROOT.'/assets/css/slick-style.css', $deps = array(), filemtime( get_template_directory().'/assets/css/slick-style.css' ), $media = '' );
		wp_enqueue_style( 'thm-stylesheet', THEME_ROOT.'/style.css', $deps = array('thm-bootstrap', 'thm-fonts', 'thm-slick',), filemtime( get_template_directory().'/style.css' ), $media = '' );

		wp_enqueue_script( 'thm-slick-min', THEME_ROOT.'/assets/js/slick.min.js', $deps = array('jquery'), filemtime( get_template_directory().'/assets/js/slick.min.js' ), $in_footer = '' );
		wp_enqueue_script( 'thm-main', THEME_ROOT.'/assets/js/main.js', $deps = array('jquery'), filemtime( get_template_directory().'/assets/js/main.js' ), $in_footer = true );

	}
	add_action( 'wp_enqueue_scripts', 'theme_assets' );

	$breadcrumbs_temp  = array(
		'template-about-us.php',
		'template-privacy-policy.php',
		'template-contact-us.php'
	);

	function get_breadcrumb() {	
		$before_html = '<div class="breadcrumb"><div class="container">';
		$after_html = '</div></div>';
		$home =  '<a href="'.home_url().'" class="home" rel="nofollow">Home</a>'; 
		$arrow = '<span class="arrow">
					<svg enable-background="new 0 0 32 32" id="svg2" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"><g id="background"><rect fill="none" height="32" width="32"/></g><g id="arrow_x5F_right"><polygon points="10,2.001 24,16 10,30  "/></g>
					</svg>
				</span>';

		global $breadcrumbs_temp;
		
	    echo $before_html;
	    echo $home;
	    echo $arrow;

	    if( is_single() ){    		
			echo 'Article';
	    }elseif ( is_category() ) {
	    	echo 'Blog List';
	    }elseif( in_array( get_page_template_slug() , $breadcrumbs_temp) ){
	    	echo the_title();
	    }
	    echo $after_html;
	}

	function custom_excerpt_length($num) {
	    $excerpt = get_the_content();
	    $excerpt = strip_shortcodes($excerpt);
	    $excerpt = strip_tags($excerpt);
	    $the_string = substr($excerpt,0,$num);
	    echo $the_string . '...';
	}

	function custom_excerpt_length_title($num){
	    $excerpt = get_the_title();
	    $excerpt = substr($excerpt, 0, $num);
	    if(strlen($excerpt) < $num ){ echo $excerpt; }
	    else{ echo $excerpt ."..."; }
	}

	function wp_pagination() {
	    global $wp_query;
	    $big = 12345678;
	    $page  = max( 1, get_query_var( 'paged' ) );
	    $ppp   = get_query_var('posts_per_page');
	    $start = $ppp * ( $page - 1 ) + 1;
	    $end   = $start + $wp_query->post_count - 1;
	    $total = $wp_query->found_posts;

	    $page_format = paginate_links( array(
	        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	        'format' => '?paged=%#%',
	        'current' => max( 1, get_query_var('paged') ),
	        'total' => $wp_query->max_num_pages,
	        'type'  => 'array',
	        'prev_text' => 'Previous<span><svg enable-background="new 0 0 256 256" id="Layer_1" version="1.1" viewBox="0 0 256 256" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M179.199,38.399c0,1.637-0.625,3.274-1.875,4.524l-85.076,85.075l85.076,85.075c2.5,2.5,2.5,6.55,0,9.05s-6.55,2.5-9.05,0  l-89.601-89.6c-2.5-2.5-2.5-6.551,0-9.051l89.601-89.6c2.5-2.5,6.55-2.5,9.05,0C178.574,35.124,179.199,36.762,179.199,38.399z"/></svg></span>',
	        'next_text' => 'Next<span><svg enable-background="new 0 0 256 256" id="Layer_1" version="1.1" viewBox="0 0 256 256" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M76.8,217.6c0-1.637,0.625-3.274,1.875-4.524L163.75,128L78.675,42.925c-2.5-2.5-2.5-6.55,0-9.05s6.55-2.5,9.05,0  l89.601,89.6c2.5,2.5,2.5,6.551,0,9.051l-89.601,89.6c-2.5,2.5-6.55,2.5-9.05,0C77.425,220.875,76.8,219.237,76.8,217.6z"/></svg></span>'
	    ) );
	    if( is_array($page_format) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<div class="clearfix"><div class="total-result">';
            echo 'Showing '.$start.' - '.$end. ' of ' .$total.' Results';
            echo "</div><ul>";
            foreach ( $page_format as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul></div>';
	    }
	}