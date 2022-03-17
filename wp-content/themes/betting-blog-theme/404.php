<?php get_header(); ?>
	
<div class="container text-center page-404">
	<h1>Oops!</h1>
	<h2>We can't find the page you're looking for <span class="sad-smile"></span> </h2>
	<img class="mb-30" src="<?php echo get_template_directory_uri().'/assets/img/404-error.png' ?>" alt="404-error"> 
	<p><a href="<?php echo home_url(); ?>">Click here to go to the home page</a></p>
</div>

<?php get_footer(); ?>