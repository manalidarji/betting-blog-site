<?php get_header(); ?>

<div class="container clearfix article-container pt-15">
	<div class="left-section">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2 class="article-title mb-15"><?php the_title(); ?></h2>

			<?php if ( has_post_thumbnail($post->ID)) { ?>					    
				<div class="article-thumbnail mb-15">
					<?php the_post_thumbnail('thumbnail-1000x750', array('class' => 'img-responsive desk-img', 'alt' => get_the_title(), 'title' => get_the_title() ));?>				
					<?php the_post_thumbnail('thumbnail-575x615', array('class' => 'img-responsive mob-img', 'alt' => get_the_title(), 'title' => get_the_title() ));?>				
				</div>					    
			<?php } ?>

			<div class="article-content"> <?php the_content(); ?> </div>
		<?php endwhile; endif; ?>

		<!-- single-trending-articles section -->
		<?php get_template_part( 'template-parts/single/single', 'trending-articles' ) ?>
	</div>	

	<div class="right-section">
		<?php get_sidebar(); ?>		
	</div>
</div>

<?php get_footer(); ?>