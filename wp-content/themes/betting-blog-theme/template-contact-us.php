<?php
	global $is_eu_request;
	if($is_eu_request){
		header('Location:/');
	}
?>

<?php
    /* Template Name: Contact Us Page */
    get_header(); 
?>

<div class="static-page-wrap contact-us-wrap">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="staic-page-bg contact-us-bg"></div>

	    <div class="container">
	    	<div class="static-page-title">
	    		<span class="icon"></span>
	    		<h3> <?php the_title(); ?> </h3>
	    	</div>
	    	<div class="contact-us-form">
	    		<?php echo do_shortcode( '[contact-form-7 id="313" title="Contact Us"]' ); ?>
	    	</div>       
	    </div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>