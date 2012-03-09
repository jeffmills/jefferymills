<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Jeffery Mills
 * @since Jeffery Mills 1.0
 */
?>

	<footer>

		<div id="footer_content">

			<div class="footer_section">

				<h2>Navigation</h2>

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

			</div>

			<div class="footer_section">

				<h2>Powered By</h2>

				<ul>
					<li><a href="http://wordpress.org/">Wordpress</a></li>
					<li><a href="http://jquery.com/">jQuery</a></li>
					<li><a href="http://www.photoshop.com/">Photoshop</a></li>
					<li><a href="http://www.sublimetext.com/2">Sublime Text 2</a></li>
					<li><a href="http://en.wikipedia.org/wiki/Liahona_%28Book_of_Mormon%29">Liahona</a></li>
				</ul>

			</div>

			<div class="footer_section">

				<h2>I'm Social</h2>

				<ul class="social_footer">
					<li><a href="https://twitter.com/jefferymills" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/footer_twitter.png" alt="Twitter"></a></li>
		    		<li><a href="https://plus.google.com/u/0/113601699249103075618/posts" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/footer_google.png" alt="Google Plus"></a></li>
		    		<li><a href="http://www.facebook.com/breathmills" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/footer_facebook.png" alt="Facebook"></a></li>
		    		<li><a href="http://www.linkedin.com/profile/view?id=27457856&trk=tab_pro" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/footer_linkedin.png" alt=""></a></li>
		    		<li><a href="http://jefferymills.com/category/blog-posts/feed/"><img src="<?php bloginfo('template_url'); ?>/images/footer_rss.png" alt=""></a></li>
					</ul>

			</div>

			<div class="footer_section">
				
				<!-- <h2>Receive Email Updates</h2>

				<p>Stay up to date with the latest work and articles from JefferyMills.com by signing up for Email updates. Your address will never be resold or repurposed.</p> -->
				<?php dynamic_sidebar( 'sidebar-3' ); ?>

			</div>

			<span class="clear"></span>

			<p id="footer_bottom">
				
				Copyright 2011 - <?php echo date('Y'); ?> William Jeffery Mills. All Rights Reserved. Phone 801.319.4510  Email Jeff@JefferyMills.com

			</p>

		</div>
			
	</footer>

<?php wp_footer(); ?>

</body>
</html>