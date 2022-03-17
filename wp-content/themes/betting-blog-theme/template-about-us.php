<?php
    /* Template Name: About Us Page */
    get_header(); 
?>

<div class="static-page-wrap about-us-wrap">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="staic-page-bg about-us-bg"></div>

	    <div class="container">
	    	<div class="static-page-title">
	    		<span class="icon"></span>
	    		<h3> <?php the_title(); ?> </h3>
	    	</div>
	    	<div class="static-page-content"> <?php the_content(); ?> </div>        
	    </div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>