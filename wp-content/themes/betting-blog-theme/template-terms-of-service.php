<?php
    /* Template Name: Terms Of Service Page */
    get_header(); 
?>

<div class="static-page-wrap terms-of-service-wrap">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <div class="container">
	    	<div class="static-page-title">
	    		<h3> <?php the_title(); ?> </h3>
	    	</div>
	    	<div class="static-page-content"> <?php the_content(); ?> </div>        
	    </div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>