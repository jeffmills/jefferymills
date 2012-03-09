<?php
/**
 * @package WordPress
 * @subpackage Jeffery Mills
 * @since Jeffery Mills 1.0
 */

// This theme uses wp_nav_menu() in one location.
function register_menus(){
	register_nav_menu( 'primary', __( 'Primary Menu', 'jefferymills' ) );
}

add_action( 'init', 'register_menus' );

if(function_exists('add_theme_support')){
	add_theme_support('post-thumbnails');
	add_image_size( 'post-thumb', 145, 9999 );
	add_image_size( 'work-thumb', 200, 143, true );
}

function jefferymills_theme($comment, $args, $depth){
	$GLOBALS['comment'] = $comment; ?>
	<li  id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>

			<?php echo get_avatar($comment->comment_author_email, 62); ?>

			<div class="comment_copy">

			<div class="comment-author vcard">

				<?php printf(__('<cite class="fn">%s</cite> <span class="says">was all like:</span>'), get_comment_author_link()) ?>

			</div>

				<?php if($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.') ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata"><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

				<div class="clear"></div>

				<div class="comment_text">

					<?php comment_text(); ?>

				</div>

				<div class="reply">
					
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>


				</div>

			</div>

			<div class="clear"></div>

		</div>
<?php }

function new_excerpt_length($length) {
	return 28;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($more) {
       global $post;
	return '...<a href="'. get_permalink($post->ID) . '">Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function jeff_excerpt($length_callback='', $more_callback='') {
	global $post;

	if(function_exists($length_callback)){
		add_filter('excerpt_length', $length_callback);
	}

	if(function_exists($more_callback)){
		add_filter('excerpt_more', $more_callback);
	}

	$output = get_the_excerpt();
	$output = apply_filters('wptexturize', $output);
	$output = apply_filters('convert_chars', $output);
	$output = '<p>'.$output.'</p>';
	echo $output;
}

function jeff_excerptlength_archive($length){
	return 55;
}

function archive_excerpt_more($length){
	global $post;
	return '...<a href="'. get_permalink($post->ID) . '">Read more</a>';
}

function jeffery_mills_init() {

	//register_widget( 'jeffery_mills_widget' );

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'jefferymills' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One', 'jefferymills' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'jeffery_mills_init' );