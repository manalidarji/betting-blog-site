<div class="col-md-4 col-xs-6 single-cat-col">
    <a href="<?php the_permalink(); ?>" class="disp-b single-cat-wrap-a">
        <?php $catArr =  get_the_category ();?>
        <span class="cat-tag"> <?php echo $catArr[0] -> name; ?> </span>
    	<div class="single-cat-wrap">
    		<div class="img-wrap">
    			<?php the_post_thumbnail('thumbnail-500x400', array('class' => 'img-responsive tran', 'alt' => get_the_title(), 'title' => get_the_title() ));?>
    		</div>
    		<div class="single-cat-content-wrap">
    			<div class="single-cat-content-overlay tran"></div>
    			<div class="single-cat-content">
    				<p class="single-cat-title tran"> <?php the_title(); ?> </p>
    				<p class="single-cat-desc"> <?php echo custom_excerpt_length(70); ?> </p>
    				<span class="read-more">read more</span>
    			</div>
    		</div>	
    	</div>
    </a>                        
</div>