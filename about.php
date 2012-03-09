<?php 

/*
Template Name: About
*/

get_header();
 ?>

<div id="content_container">
	<div id="content">

		<div id="about_content">

		<div id="left_column">
			
			<img src="<?php bloginfo('template_url'); ?>/images/silly_smiley_jeff.jpg" alt="Is this Jeff? You tell me.">

		</div>

			<div id="about_copy">

			<?php
				query_posts(array('page_id' => '6'));
				if (have_posts()) :
				   while (have_posts()) :
				       the_post(); ?>
				       

				       <?php the_content(); ?>

				<?php   endwhile;
				endif;
				// Reset Post Data
				wp_reset_postdata();
			?>

			</div>

		</div>

	<?php get_sidebar(); ?>
	</div>
</div>

<div class="clear"></div>


 <?php get_footer(); ?>