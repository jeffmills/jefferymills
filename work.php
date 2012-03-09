<?php
/**
 * 
 Template Name: work
 * 
 */

get_header(); ?>

		<div id="content_container">
 	<div id="content">
 		

			<div id="archive">
	 		<?php
	 		query_posts(array('posts_per_page'=>'10', 'category_name'=>'work posts','paged' => $first_query['paged']));
	 		 while ( have_posts() ) : the_post(); ?>

	 		 <div class="archive_entry">

		 		<div class="single_date">
		 			
		 			<time>
				       	<span class="day"><?php the_time('j'); ?></span>
				       	<span class="month"><?php the_time('M'); ?></span>
					</time>

		 		</div>

		 		<div id="single_post_info">
		 			
		 			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		 			<div class="post_meta">
		 				
		 				By <?php the_author(); ?> | <?php the_date(); ?> | <?php if (the_tags('', ', ', '')) { echo "| " . the_tags('', ', ', '');} ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>

		 			</div>

		 		</div>

		 		<div class="clear"></div>

		 		<?php if (has_post_thumbnail()) { ?>

		 		<div class="latest_thumb"> 
				       	<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumb', array('class' => 'alignleft')); ?></a>
				</div>

		 		<?php } ?>

		 		<div class="single_content">

		 			<?php jeff_excerpt('jeff_excerptlength_archive', 'archive_excerpt_more'); ?>

		 		</div>

		 		<div class="clear"></div>

	 		</div>

			<?php endwhile; // end of the loop. ?>

			<?php echo paginate_links( array(
				'base' => str_replace(999999, '%#%', get_pagenum_link(999999)),
				'format' => '?paged=%#%',
				'current' => max(1, get_query_var('paged')),
				'total' => $wp_query->max_num_pages,
				'prev_text' => __('Previous'),
				'next_text' => __('Next')	
			));

			?>

		</div>

		<?php  get_sidebar(); ?>

 	</div>
 </div>

 <div class="clear"></div>
<?php get_footer(); ?>