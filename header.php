<?php
/**
 *
 *
 * @package WordPress
 * @subpackage Jeffery Mills
 * @since Jeffery Mills 0.1
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged, $first_query;

	$first_query = $GLOBALS['wp_query']->query_vars;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- <link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/style.less">
 <script src="<?php bloginfo('template_url'); ?>/js/less-1.1.5.min.js" type="text/javascript"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27902408-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body <?php body_class(); ?>>

<header>

<?php include('/includes/banner_img_grab.php'); ?>

	<div id="header_content">
	
		<div id="top_bar">
			
	    	<ul>
	    		<li><a href="https://twitter.com/jefferymills" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/top_twitter.png" alt="Twitter"></a></li>
	    		<li><a href="https://plus.google.com/u/0/113601699249103075618/posts" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/top_google.png" alt="Google Plus"></a></li>
	    		<li><a href="http://www.facebook.com/breathmills" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/top_facebook.png" alt="Facebook"></a></li>
	    		<li><a href="http://www.linkedin.com/profile/view?id=27457856&trk=tab_pro" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/top_linkedin.png" alt=""></a></li>
	    		<li><a href="http://jefferymills.com/category/blog-posts/feed/"><img src="<?php bloginfo('template_url'); ?>/images/top_rss.png" alt=""></a></li>
	    	</ul>

		</div>

		<div class="clear"></div>

		<div id="logo_box">

			<a href="/"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Jeffery Mills.com"></a>

		</div>

		<div id="tagline">
			<?php
				query_posts(array('category_name' => 'tagline', 'orderby' => 'rand', 'posts_per_page' => '1'));
				if (have_posts()) :
				   while (have_posts()) :
				       the_post();
				       the_title();
				   endwhile;
				endif;
				// Reset Post Data
				wp_reset_query();
				?>
		</div>

		<nav>

		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

		</nav>

	</div>

</header>

<div class="clear"></div>