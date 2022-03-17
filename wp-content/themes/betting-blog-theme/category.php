<?php get_header(); ?>

<div class="container clearfix pt-10">
	<div class="left-section">
		<?php $post_count =1; if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php if( $post_count == 1){ ?>
			<div class="category-main-post mb-20"> 
				<a class="disp-b category-main-post-a" href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
					<div class="img-wrap">
						<?php if ( has_post_thumbnail($post->ID)) {
						    the_post_thumbnail('thumbnail-900x630', array('class' => 'img-responsive desk-img tran', 'title' => get_the_title() ));
						    the_post_thumbnail('thumbnail-600x640', array('class' => 'img-responsive mob-img tran', 'title' => get_the_title() ));
						} ?>
					</div>
					<div class="cat-content tran">
						<h3 class="cat-title"><?php the_title(); ?></h3>
						<p class="cat-desc"><?php custom_excerpt_length(200) ?></p>
						<span class="read-more">read more</span>
					</div>
				</a>
			</div>
		<?php }else if( $post_count >= 2 && $post_count <= 7 ){
			if( $post_count == 2 ){
				echo '<div class="search-cat-post-wrap"></div>';
			}
			get_template_part( 'template-parts/search-cat/search-cat', 'block' );
		}else{
			if( $post_count == 8 ){
				echo '<div class="search-cat-bottom-wrap row"></div>';
			}
			get_template_part( 'template-parts/single-cat/single-cat', 'block' );
		}?>

		<?php $post_count++; endwhile; endif; ?>
	</div>	

	<div class="right-section">
		<?php get_sidebar(); ?>		
	</div>
</div>

<?php get_footer(); ?>

<script type="text/javascript">
	(function($){
		$(document).ready(function(argument) {
			$( ".search-cat-post-wrap" ).append( $( ".search-cat-post" ) );
			$( ".search-cat-bottom-wrap" ).append( $( ".single-cat-col" ) );
		});
	})(jQuery);
</script>