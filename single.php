<?php 

/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Jeffery Mills
 * @since Jeffery Mills 1.0
 */

 get_header();

 ?>

 <div id="content_container">
 	<div id="content">
 		

 		<div id="single_post">
	 		<?php
	 		query_posts('name=' . $first_query['name']);
	 		 while ( have_posts() ) : the_post(); ?>

	 		<div class="single_date">
	 			
	 			<time>
			       	<span class="day"><?php the_time('j'); ?></span>
			       	<span class="month"><?php the_time('M'); ?></span>
				</time>

	 		</div>

	 		<div id="single_post_info">
	 			
	 			<h1><?php the_title(); ?></h1>
	 			<div class="post_meta">
	 				
	 				By <?php the_author(); ?> | <?php the_date(); ?> | <?php if (the_tags('', ', ', '')) { echo "| " . the_tags('', ', ', '');} ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>

	 			</div>

	 		</div>

	 		<div class="clear"></div>

	 		<div class="single_content">

	 			<?php the_content(); ?>

	 		</div>
	 		<div class="clear"></div>
	 		<div class="comments">

	 		<h3 id="comment_count"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></h3>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

			</div>

			<?php 
			comment_form(array(
				'title_reply' => 'You make a comment?',
				'comment_notes_after' => ''
				)); 
			?>

		</div>

		<?php  get_sidebar(); ?>

 	</div>
 </div>

 <div class="clear"></div>

 <?php 
 get_footer(); 
 ?>