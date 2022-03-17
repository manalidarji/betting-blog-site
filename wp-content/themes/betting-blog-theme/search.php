<?php get_header(); ?>

<div class="container">
	<!-- search loop -->
    <?php if ( have_posts() ) { ?> 
	<div class="search-title">Search Results found for: "<?php echo $s ?>"</div>
	<div class="search-cat-post-wrap mb-15">
    	<?php while ( have_posts() ) { the_post(); ?>
    	<?php get_template_part( 'template-parts/search-cat/search-cat', 'block' ); ?>
    <?php } ?>
    </div>
    <?php }else{ ?> 
    	<div class="no-result-wrap">
    		<div class="search-title">No Results found for "<?php echo $s; ?>". Please try another search.<br>Here are some articles you would like.</div>
    		<?php get_template_part( 'template-parts/single/single', 'trending-articles' ) ?>
    	</div>	
    <?php } ?>

	<?php global $wp_query; if (function_exists('wp_pagination') && $wp_query->found_posts > 10) { ?>
		<div class="pagination mb-35">
			<?php wp_pagination(); ?>
		</div>
	<?php } ?>
</div>

<?php get_footer(); ?>