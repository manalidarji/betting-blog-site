<div class="trend-articles-wrap mb-25">
    <div class="section-heading">
    	<span class="heading-icon"></span>
    	<h3>trending articles</h3>
    </div>

    <div class="row">
    <?php
        $args = array(
            'post_type' => 'post', 
            'post_status' => 'publish', 
            'posts_per_page' => 3, 
            'orderby' => 'modified',
            'tag' => 'trending-articles'
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if ( $my_query->have_posts() ) : while ($my_query->have_posts()) : $my_query->the_post();

        // getting html
        get_template_part( 'template-parts/single-cat/single-cat', 'block' );

        endwhile; endif; wp_reset_query(); ?>
    </div>    
</div>