<div class="search-cat-post">
    <a class="search-cat-post-a" href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
        <div class="img-wrap">
            <?php $catArr =  get_the_category ();?>
            <span class="cat-tag"> <?php echo $catArr[0] -> name; ?> </span>
            <?php if ( has_post_thumbnail($post->ID)) {
                the_post_thumbnail('thumbnail-350x227', array('class' => 'img-responsive desk-img tran', 'title' => get_the_title() ));
                the_post_thumbnail('thumbnail-150x150', array('class' => 'img-responsive mob-img tran', 'title' => get_the_title() ));
            } ?>
        </div>
        <div class="search-content">
            <h3 class="search-cat-post-title tran"><?php the_title(); ?></h3>
            <p class="search-cat-post-desc tran"><?php custom_excerpt_length(200) ?></p>
            <span class="read-more">read more</span>
        </div>
    </a>
</div>