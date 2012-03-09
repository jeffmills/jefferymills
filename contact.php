<?php 

/*
Template Name: Contact
*/

get_header();
 ?>

<div id="content_container">
	<div id="content">

		<div id="single_post">

		<?php
			query_posts(array('page_id' => '11'));
			if (have_posts()) :
			   while (have_posts()) :
			       the_post(); ?>
			       
			       <h1>Say it to my face, or to this form.</h1>

			       <p><?php the_content(); ?></p>

			<?php   endwhile;
			endif;
			// Reset Post Data
			wp_reset_postdata();
		?>

		<div id="contact_methods">
			
			<h2>Here are other ways in which you can contact me</h2>

			<ul>
				<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/google_icon.png" alt="google plus"></a></li>
				<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/facebook_icon.png" alt="facebook"></a></li>
				<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/twitter_icon.png" alt="twitter"></a></li>
				<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/linkedin_icon.png" alt="linked in"></a></li>
			</ul>

			<div class="clear"></div>

			<h2>E-mail: <span>jeff(at)jefferymills(dot)com</span></h2>

		</div>

		</div>

	<?php get_sidebar(); ?>
	</div>
</div>

<div class="clear"></div>


 <?php get_footer(); ?>