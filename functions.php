<?php
/**
 * Peddle functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Peddle
 */

if ( ! function_exists( 'peddle_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function peddle_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Peddle, use a find and replace
	 * to change 'peddle' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'peddle', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-image', 340, 200, true );
	add_image_size( 'large-image', 848, 400, true );
	add_image_size( 'product-image', 390, 195, true );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'peddle' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'peddle_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // peddle_setup
add_action( 'after_setup_theme', 'peddle_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function peddle_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'peddle_content_width', 640 );
}
add_action( 'after_setup_theme', 'peddle_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function peddle_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'peddle' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'EDD Sidebar', 'peddle' ),
		'id'            => 'sidebar-edd',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer row #1', 'peddle' ),
		'id'            => 'footer-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer row #2', 'peddle' ),
		'id'            => 'footer-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer row #3', 'peddle' ),
		'id'            => 'footer-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer row #4', 'peddle' ),
		'id'            => 'footer-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'peddle_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function peddle_scripts() {
	wp_enqueue_style( 'peddle-style', get_stylesheet_uri() );
	wp_enqueue_style( 'peddle-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'peddle-theme', get_template_directory_uri() . '/css/peddle.css' );
	wp_enqueue_style( 'peddle-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'peddle-googlefonts', 'https://fonts.googleapis.com/css?family=Raleway:400,300,700|Open+Sans:300,400,600,700,700italic,400italic' );

	wp_enqueue_script( 'peddle-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20150831', true );
	wp_enqueue_script( 'peddle-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20150831', true );
	wp_enqueue_script( 'peddle-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20150831', true );
	wp_enqueue_script( 'peddle-smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array(), '20150831', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'peddle_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Remove container DIV from navigation menu in header.
 */
function my_wp_nav_menu_args( $args = '' ) {
	$args['container'] = false;
	return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

/**
 * Customizing the excerpt
 */

// Customize the excerpt length
function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Add a Read More link to the end of the excerpt
function custom_excerpt_more( $more ) {
	return ' ... <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'peddle' ) . '</a>';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

// Add a class to the <p> wrap around the excerpt
function add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="excerpt"', $excerpt);
}
add_filter( "the_excerpt", "add_class_to_excerpt" );

// If EDD is active, add a shopping cart icon to the navigation
function my_nav_wrap() {
  if( function_exists( 'EDD' ) ) {
    $wrap  = '<ul id="%1$s" class="%2$s">';
    $wrap .= '%3$s';
    $wrap .= '<li class="cart">';
    $wrap .= '<a href="'. edd_get_checkout_uri() .'" class="cart_totals"><i class="fa fa-shopping-cart fa-lg"></i> (';
    $wrap .= edd_get_cart_quantity();
    $wrap .= ')</a>';
    $wrap .= '</li>';
    $wrap .= '</ul>';
  } else {
    $wrap = '<ul id="%1$s" class="%2$s">%3$s</ul>';
  }
  return $wrap;
}

// Custom excerpt limit for the shop
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).' ... ';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

/**
 * Using logo upload from customizer to change login page logo
 */

if ( get_theme_mod( 'peddle_logo' ) )  {

// Change login page logo image to the logo uploaded in the customizer	
function peddle_login_logo() {
	
	list($width,$height) = getimagesize(get_theme_mod( "peddle_logo" ));

	echo '<style type="text/css">
		#login {
			width: '. $width .'px !important;
		}
		h1 a {
			background-image:url('. get_theme_mod( "peddle_logo" ) .') !important;
			background-size: '. $width .'px !important;
			width: '. $width .'px !important;
			height: '. $height .'px !important;
		}
	</style>';
}

add_action('login_head', 'peddle_login_logo');

// Change login page logo link to the website home page
function peddle_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'peddle_login_logo_url' );

// Change login page logo title to the website name
function peddle_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'peddle_login_logo_url_title' );

} // if get_theme_mod('peddle_logo')
