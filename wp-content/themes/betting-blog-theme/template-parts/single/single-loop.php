<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h2 class="article-title mb-10"><?php the_title(); ?></h2>

    <!-- social share icons -->
    <?php get_template_part( 'template-parts/single/single', 'social-share' ) ?>


    <?php if ( has_post_thumbnail($post->ID)) { ?>                      
        <div class="article-thumbnail mb-20 ml-20">
            <?php the_post_thumbnail('thumbnail-725x446', array('class' => 'img-responsive', 'alt' => get_the_title(), 'title' => get_the_title() ));?>             
        </div>                      
    <?php } ?>

    <div class="article-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; endif; ?>