<?php
    /* Template Name: Privacy Policy Page */
    get_header(); 
?>

<div class="static-page-wrap privacy-policy-wrap">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="staic-page-bg privacy-policy-bg"></div>

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