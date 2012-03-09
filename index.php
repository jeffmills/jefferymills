<?php

/*
* @package WordPress
* @subpackage Jeffery Mills
*/

get_header(); ?>

<div id="banner_container">
	
	<div id="banner">
		
		<div id="banner_copy">
			
			<dl>

				<dt>Design</dt>
				<dd>websites, logos, ux</dd>

			</dl>
			<dl>

				<dt>Develop</dt>
				<dd>php, html/css, javascript</dd>

			</dl>
			<dl>

				<?php
				query_posts(array('category_name' => 'banner text', 'orderby' => 'rand', 'posts_per_page' => '1'));
				if (have_posts()) :
				   while (have_posts()) :
				       the_post(); ?> 
				      <dt><?php the_title(); ?></dt>
				      <dd><?php the_content(); ?></dd>
				<?php   endwhile;
				endif;
				// Reset Post Data
				wp_reset_postdata();
				?>

			</dl>

			<div class="clear"></div>

			<div id="intro">

				I'm Jeffery Mills and I'm a web designer and developer okay?

			</div>
				
		</div> <!-- End #banner_copy -->
		<!-- <div id="faces">
			<img src="<?php bloginfo('template_url'); ?>/images/faces/faces_original.jpg" alt="Jeffery Mills" />
		</div> -->

	</div> <!-- End #banner -->

</div> <!-- End #banner_container -->

<div id="content_container">
	<div id="content">
		
		<h2>Latest Posts</h2>

		<div id="latest_posts">

			<?php
				query_posts(array('category_name' => 'blog posts', 'orderby' => 'date', 'posts_per_page' => '2'));
				if (have_posts()) :
				   while (have_posts()) :
				       the_post(); ?>
				       <div class="blog_post">
				       <div class="latest_thumb"> 
				       	<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumb', array('class' => 'alignleft')); ?></a>
				       </div>
				       <div class="post_summary">
					       <time>
						       	<span class="day"><?php the_time('j'); ?></span>
						       	<span class="month"><?php the_time('M'); ?></span>
					       </time>
					       <section>
						       <h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
						       <div class="post-meta">Posted in <?php the_category(); ?> -- <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> </div>
					       </section>
					       <div class="clear"></div>
					       <?php the_excerpt(); ?>
				       </div>
				       </div>
				<?php   endwhile;
				endif;
				// Reset Post Data
				wp_reset_postdata();
			?>

		</div>

		<div class="clear"></div>

		<div id="recent_work">

			<h2>Recent Work</h2>

			<?php
				query_posts(array('category_name' => 'work posts', 'orderby' => 'date', 'posts_per_page' => '4'));
				if (have_posts()) :
				   while (have_posts()) :
				       the_post(); ?>
				       <div class="work_post">
				       <div class="recent_thumb"> 
				       	<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('work-thumb', array('class' => 'alignleft')); ?></a>
				       </div>
				       <div class="work_summary">
					       <section>
						       <h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
						       <div class="work_tags"><?php the_tags('', ', ', ''); ?> </div>
					       </section>
					       <div class="clear"></div>
				       </div>
				       </div>
				<?php   endwhile;
				endif;
				// Reset Post Data
				wp_reset_postdata();
			?>

		</div>

		<div class="clear"></div>

	</div>
</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>