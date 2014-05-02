<?php
	/**
	 * Reflex functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Reflex
 	 * @since 		Reflex 1.0.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/reflex-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'reflex_script_enqueuer' );

	add_filter( 'body_class', array( 'Reflex_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function reflex_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}

	add_action( 'wp_footer', 'responsiveNav' );
	
	function responsiveNav(){ ?>
	 <script>
	      var navigation = responsiveNav("#primary-navigation", {
	        insert: "before"
	      });
	      
	    </script>
	<?php } 


	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function reflex_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}

// WIDGETS
/**
 * Register our sidebars and widgetized areas.
 *
 */
function reflex_widgets_init() {

	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'blog_sidebar',
		'before_widget' => '<section>',
		'after_widget' => '</section>',
		'before_title' => '<h4 class="sidebar-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'reflex_widgets_init' );


// excerpt

function new_excerpt_more( $more ) {
	return '<br><a class="button" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

function new_excerpt_elipses( $more ) {
	return '...';
}
add_filter('elipses', 'new_excerpt_more');

// font awesome

add_action( 'wp_enqueue_scripts', 'webendev_load_font_awesome', 99 );
/**
* Enqueue Font Awesome Stylesheet from MaxCDN
*
*/
function webendev_load_font_awesome() {
	if ( ! is_admin() ) {
 
		wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', null, '4.0.1' );
 
	}
 
}