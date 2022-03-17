<div class="section-heading">
	<span class="heading-icon"></span>
	<h3>latest blog</h3>
</div>

<div class="article-latest-blog-wrap-main">
<?php
    $args = array(
        'post_type' => 'post', 
        'post_status' => 'publish', 
        'posts_per_page' => 5, 
        'orderby' => 'modified',
        'tag' => 'latest-blog'
    );
    $my_query = null;
    $my_query = new WP_Query($args);
    if ( $my_query->have_posts() ) : while ($my_query->have_posts()) : $my_query->the_post(); 
?> 
	<a href="<?php the_permalink(); ?>" class="disp-b article-latest-blog-post-wrap-a">
		<div class="article-latest-blog-post-wrap">
			<div class="img-wrap">
				<?php the_post_thumbnail('thumbnail-100x100', array('class' => 'img-responsive tran', 'alt' => get_the_title(), 'title' => get_the_title() ));?>
			</div>
			<div class="article-latest-blog-post-content">
				<p class="article-latest-blog-post-title"> <?php the_title(); ?> </p>
				<p class="article-latest-blog-post-desc"> <?php echo custom_excerpt_length(60); ?> </p>
				<span class="latest-blog-read-more">read more..</span>
			</div>	
		</div>
	</a>
<?php endwhile; endif; wp_reset_query(); ?>
</div>