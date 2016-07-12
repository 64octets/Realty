<?php
/**
 * Realty functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Realty
 */

if ( ! function_exists( 'realty_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function realty_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Realty, use a find and replace
	 * to change 'realty' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'realty', get_template_directory() . '/languages' );

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
	set_post_thumbnail_size('realty-post-thumb', 400, 9999, array( 'center', 'center')  );
	
	/*
	 * Enable support for site logo.
	 */
	add_image_size( 'realty-logo', 270, 60 );
	add_theme_support( 'custom-logo', array( 'size' => 'realty-logo', 'flex-height' => true, 'flex-width'  => true, 'header-text' => array( 'site-title', 'site-description' ) ) );

	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'realty' ),
		
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
	add_theme_support( 'custom-background', apply_filters( 'realty_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'realty_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function realty_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'realty_content_width', 640 );
}
add_action( 'after_setup_theme', 'realty_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function realty_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'realty' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'realty_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function realty_scripts() {
	wp_enqueue_style( 'realty-style', get_stylesheet_uri() );


	wp_enqueue_style( 'realty-gumby-style', get_template_directory_uri() . '/css/gumby.css', array(), '20151215', false );

	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'realty-modernizr', get_template_directory_uri() . '/js/libs/modernizr-2.6.2.min.js', array('jquery' ), '20151215', false );

	wp_enqueue_script( 'realty-gumby', get_template_directory_uri() . '/js/libs/gumby.js', array(), '20151215', true );
	
	wp_enqueue_script( 'realty-retina', get_template_directory_uri() . '/js/libs/ui/gumby.retina.js', array(), '20151215', true );
	wp_enqueue_script( 'realty-fixed', get_template_directory_uri() . '/js/libs/ui/gumby.fixed.js', array(), '20151215', true );
	wp_enqueue_script( 'realty-skiplink', get_template_directory_uri() . '/js/libs/ui/gumby.skiplink.js', array(), '20151215', true );
	wp_enqueue_script( 'realty-toggleswitch', get_template_directory_uri() . '/js/libs/ui/gumby.toggleswitch.js', array(), '20151215', true );
	wp_enqueue_script( 'realty-checkbox', get_template_directory_uri() . '/js/libs/ui/gumby.checkbox.js', array(), '20151215', true );
	wp_enqueue_script( 'realty-radiobtn', get_template_directory_uri() . '/js/libs/ui/gumby.radiobtn.js', array(), '20151215', true );
	wp_enqueue_script( 'realty-tabs', get_template_directory_uri() . '/js/libs/ui/gumby.tabs.js', array(), '20151215', true );
	wp_enqueue_script( 'realty-navbar', get_template_directory_uri() . '/js/libs/ui/gumby.navbar.js', array(), '20151215', true );
	wp_enqueue_script( 'realty-validation', get_template_directory_uri() . '/js/libs/ui/jquery.validation.js', array(), '20151215', true );
	wp_enqueue_script( 'realty-init', get_template_directory_uri() . '/js/libs/gumby.init.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'realty-masonry', get_template_directory_uri() . '/js/masonry.pkgd.js', array(), '20151215', true );
	wp_enqueue_script( 'realty-imageloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd', array(), '20151215', true );


	wp_enqueue_script( 'realty-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'realty-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'realty_scripts' );

/**
 * Implement the Custom Walker.
 */
require get_template_directory() . '/inc/custom-menu-walker.php';

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
