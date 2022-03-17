<?php get_header(); ?>

<section class="home-top-slider-outer-wrap">
	<div class="bg">
		<span class="red-bg"></span>
		<span class="spade-bg"></span>
	</div>
	<div class="container">
		<div class="heading">
			<h2>The Art of Sharper Betting</h2>			
		</div>
		<h3 class="sub-heading">Your complete guide to online gambling strategy, probability, and odds</h3>
		<div class="home-slider-padding">
			<div class="home-top-slider-wrap">
				<?php
				    $args = array(
				        'post_type' => 'post', 
				        'post_status' => 'publish', 
				        'posts_per_page' => 5, 
				        'orderby' => 'modified',
				        'tag' => 'home-top-slider'
				    );
				    $my_query = null;
				    $my_query = new WP_Query($args);
				    if ( $my_query->have_posts() ) : while ($my_query->have_posts()) : $my_query->the_post(); 
				?>
				<div class="home-top-slider-post">
					<a class="disp-b tran" href="<?php the_permalink() ?>">
						<div class="img-wrap">
							<?php the_post_thumbnail('thumbnail-400x317', array('class' => 'img-responsive tran exclude-lazyload', 'alt' => get_the_title(), 'title' => get_the_title() ));?>
						</div>

						<div class="home-top-slider-content-wrap">
							<div class="home-top-slider-overlay tran"></div>
							<div class="home-top-slider-content text-center">
								<div class="home-top-slider-title"> <?php the_title(); ?> </div>
								<div class="dotted-line"></div>
								<p class="home-top-slider-desc"> <?php echo custom_excerpt_length(75); ?> </p>
								<span class="read-more">read more</span>
							</div>			
						</div>
					</a>
				</div>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>			
		</div>
	</div>
</section>

<section class="casino-wrap mb-30">
	<div class="casino-bg"></div>
	<div class="container">
		<div class="section-heading">
			<span class="heading-icon"></span>
			<h3>trending articles</h3>
		</div>

		<?php
		    $args = array(
		        'post_type' => 'post', 
		        'post_status' => 'publish', 
		        'posts_per_page' => 2, 
		        'orderby' => 'modified',
		        'tag' => 'trending-articles'
		    );
		    $my_query = null;
		    $my_query = new WP_Query($args);
		    if ( $my_query->have_posts() ) : while ($my_query->have_posts()) : $my_query->the_post(); 
		?>
			<a href="<?php the_permalink(); ?>" class="home-trending-post-wrap">
				<div class="img-wrap">
					<?php the_post_thumbnail('thumbnail-350x227', array('class' => 'img-responsive tran desk-img', 'alt' => get_the_title(), 'title' => get_the_title() ));?>
					<?php the_post_thumbnail('thumbnail-150x150', array('class' => 'img-responsive tran mob-img', 'alt' => get_the_title(), 'title' => get_the_title() ));?>
				</div>	
				<div class="home-trending-post-content">
					<p class="home-trending-post-title tran"> <?php the_title(); ?> </p>
					<p class="home-trending-post-desc"><?php echo custom_excerpt_length(200); ?></p>
					<span class="read-more">read more</span>
				</div>
			</a>						
		<?php endwhile; endif; wp_reset_query(); ?>
	</div>
</section>

<section class="latest-blog-wrap">
	<div class="container">
		<div class="section-heading">
			<span class="heading-icon"></span>
			<h3>latest blog</h3>
		</div>

		<div class="row">
			<?php
			    $args = array(
			        'post_type' => 'post', 
			        'post_status' => 'publish', 
			        'posts_per_page' => 6, 
			        'orderby' => 'modified',
			        'tag' => 'latest-blog'
			    );
			    $my_query = null;
			    $my_query = new WP_Query($args);
			    if ( $my_query->have_posts() ) : while ($my_query->have_posts()) : $my_query->the_post(); 
			?> 
				<div class="col-md-6">
					<a href="<?php the_permalink(); ?>" class="disp-b latest-blog-post-wrap-a">
					<div class="latest-blog-post-content-overlay tran"></div>
						<?php $catArr =  get_the_category ();?>
						<span class="cat-tag"> <?php echo $catArr[0] -> name; ?> </span>
						<div class="latest-blog-post-wrap">
							<div class="img-wrap">
								<?php the_post_thumbnail('thumbnail-400x270', array('class' => 'img-responsive tran desk-img-latest-blog', 'alt' => get_the_title(), 'title' => get_the_title() ));?>
								<?php the_post_thumbnail('thumbnail-150x150', array('class' => 'img-responsive tran mob-img-latest-blog', 'alt' => get_the_title(), 'title' => get_the_title() ));?>
							</div>
							<div class="latest-blog-post-content-wrap">
								<div class="latest-blog-post-content">
									<p class="latest-blog-post-title"><?php the_title(); ?></p>
									<p class="latest-blog-post-desc"><?php echo custom_excerpt_length(60); ?></p>
									<span class="read-more">read more</span>
								</div>
							</div>	
						</div>
					</a>
				</div>
			<?php endwhile; endif; wp_reset_query(); ?>
		</div>
	</div>
</section>

<section class="cat-blocks-wrap">
	<div class="container">
		<div class="cat-block-heading text-center">
			<h2>You don’t have to be in Vegas to..</h2>
			<p>Experience the Casino Night</p>
		</div>

		<?php get_template_part( 'template-parts/home/home', 'cat-blocks' ) ?>
	</div>	
</section>

<?php get_footer(); ?>