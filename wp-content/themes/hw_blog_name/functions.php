<?php
/**
 * hw_blog_name functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hw_blog_name
 */

if ( ! function_exists( 'hw_blog_name_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hw_blog_name_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on hw_blog_name, use a find and replace
	 * to change 'hw_blog_name' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hw_blog_name', get_template_directory() . '/languages' );

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
    add_image_size( 'small-thumbnail', 600, 400, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'hw_blog_name' ),
        'menu-2' => esc_html__( 'Secondary', 'hw_blog_name' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'hw_blog_name_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'hw_blog_name_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hw_blog_name_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hw_blog_name_content_width', 640 );
}
add_action( 'after_setup_theme', 'hw_blog_name_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hw_blog_name_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hw_blog_name' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hw_blog_name' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hw_blog_name_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hw_blog_name_scripts() {
	wp_enqueue_style( 'hw_blog_name-style', get_stylesheet_uri() );

    wp_enqueue_style( 'hw_blog_name-bootstrap', get_template_directory_uri() . '/bower_components/bootstrap/dist/css/bootstrap.min.css' );

    wp_enqueue_style( 'hw_blog_name-main', get_template_directory_uri() . '/css/main.css' );

    wp_enqueue_style( 'hw_blog_name-media', get_template_directory_uri() . '/css/media.css' );

    wp_enqueue_script( 'hw_blog_name-jquery.slim-js', get_template_directory_uri() . '/libs/jquery/dist/jquery.slim.min.js', array(), '', true );

    wp_enqueue_script( 'hw_blog_name-tether-js', get_template_directory_uri() . '/libs/tether/dist/js/tether.min.js', array(), '', true );

	wp_enqueue_script( 'hw_blog_name-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'hw_blog_name-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'hw_blog_name-bootstraps-js', get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array(), '', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'hw_blog_name_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * -------------------------------- Excerpt count length -------------------------------
 */
function blog_home_excerpt_length() {
    return 10;
};
add_filter( 'excerpt_length', 'blog_home_excerpt_length' );

function blog_home_excerpt_more(){
    return ' ...';
};
add_filter( 'excerpt_more', 'blog_home_excerpt_more' );
