<?

/* Frontend scripts and styles - not /admin */
 if (!is_admin()) {
	add_action('wp_enqueue_scripts', 'load_js_and_css');
 }
function get_current_site() {
	global $current_site;
	return $current_site;
}
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'snippet',
    array(
      'labels' => array(
        'name' => __( 'Snippets' ),
        'singular_name' => __( 'Snippet' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

function load_js_and_css() {

	$baseurl_childtheme = get_bloginfo('stylesheet_directory'); 
	$baseurl_resettheme = get_template_directory_uri(); 
	
	// main style
	wp_register_style( 'screen',  $baseurl_childtheme.'/style.css?v=6');
    wp_enqueue_style( 'screen' );
	
	wp_deregister_script('jquery');
	wp_register_script('jquery', $baseurl_childtheme."/js/jquery-1.11.3.min.js",false, '1.11.3' );
	wp_enqueue_script('jquery');
    wp_register_script('tweenmax', $baseurl_childtheme.'/js/tweenmax.min.js', false,'1.0');
    wp_enqueue_script( 'tweenmax' );
	wp_register_script( 'site', $baseurl_childtheme.'/js/scripts.min.js', false, '1.2');
    wp_enqueue_script( 'site' );
	
}

add_filter('show_admin_bar', '__return_false');
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );