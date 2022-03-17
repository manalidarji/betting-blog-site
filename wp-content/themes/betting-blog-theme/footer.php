<footer>
	<div class="footer-content">
		<div class="container">
			<div class="footer-logo-wrap">
				<div class="logo footer-logo">
					<a class="text-hide" href="<?php echo home_url(); ?>"> <?php echo home_url(); ?> </a>
				</div>
				<p class="footer-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<a href="<?php echo home_url(); ?>/about-us" class="about-us-link">Read More..</a>
			</div>

			<div class="footer-text-wrap clearfix">
				<div class="footer-col">
					<p class="footer-heading">quick links</p>
					<div class="footer-cat-links clearfix">
						<?php wp_nav_menu( array( 'theme_location'=>'category-menu' ) ); ?>
					</div>
				</div>
				<div class="footer-col">
					<p class="footer-heading">search our site</p>
					<p class="footer-text">Search our site for more tips, tricks and betting resources.</p>
					<?php get_template_part( 'template-parts/common/common', 'search-form' ) ?>
				</div>
				<div class="footer-col">
					<p class="footer-heading">contact us</p>
					<p class="footer-text">
						Phone: +447712345678<br>
						Fax: +440000110011<br>
						<span class="yellow-txt">info@betting-blog.com</span>
					</p>
				</div>
			</div>
		</div>		
	</div>

	<div class="copyright">
		<div class="container">
			<span>Copyright &copy; <?php echo date('Y') ?> <?php echo bloginfo('title').' ' ?></span>
			<div class="static-pages-links">
				<a href="<?php echo home_url(); ?>/about-us">About Us</a> | <a href="<?php echo home_url(); ?>/contact-us/">Contact Us</a> | <a href="<?php echo home_url(); ?>/privacy-policy/">Privacy Policy</a> | <a href="<?php echo home_url(); ?>/terms-of-service/">Terms Of Service</a>
			</div>		
		</div>
	</div>

	<?php get_template_part( 'template-parts/common/common', 'disclaimer' ) ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>
