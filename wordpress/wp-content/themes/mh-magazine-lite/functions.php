<?php

/***** Fetch Theme Data & Options *****/

$mh_magazine_lite_data = wp_get_theme('mh-magazine-lite');
$mh_magazine_lite_version = $mh_magazine_lite_data['Version'];
$mh_magazine_lite_options = get_option('mh_magazine_lite_options');

/***** Check if Active Theme is Official Theme / Child Theme by MH Themes *****/

function mh_magazine_lite_official_theme() {
	$active_theme = wp_get_theme();
	$active_theme_author = $active_theme['Author'];
	if ($active_theme_author === '<a href="https://www.mhthemes.com/">MH Themes</a>') {
		$official_theme = true;
	} else {
		$official_theme = false;
	}
	return $official_theme;
}

/***** Custom Hooks *****/

function mh_before_header() {
    do_action('mh_before_header');
}
function mh_after_header() {
    do_action('mh_after_header');
}
function mh_before_page_content() {
    do_action('mh_before_page_content');
}
function mh_before_post_content() {
    do_action('mh_before_post_content');
}
function mh_after_post_content() {
    do_action('mh_after_post_content');
}
function mh_post_header() {
    do_action('mh_post_header');
}
function mh_before_footer() {
    do_action('mh_before_footer');
}
function mh_after_footer() {
    do_action('mh_after_footer');
}
function mh_before_container_close() {
    do_action('mh_before_container_close');
}

/***** Theme Setup *****/

if (!function_exists('mh_magazine_lite_setup')) {
	function mh_magazine_lite_setup() {
		load_theme_textdomain('mh-magazine-lite', get_template_directory() . '/languages');
		add_filter('use_default_gallery_style', '__return_false');
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
		add_theme_support('post-thumbnails');
		add_theme_support('custom-background', array('default-color' => 'f7f7f7'));
		add_theme_support('custom-header', array('default-image' => '', 'default-text-color' => '000', 'width' => 1080, 'height' => 250, 'flex-width' => true, 'flex-height' => true));
		add_theme_support('custom-logo', array('width' => 300, 'height' => 100, 'flex-width' => true, 'flex-height' => true));
		add_theme_support('customize-selective-refresh-widgets');
		register_nav_menu('main_nav', esc_html__('Main Navigation', 'mh-magazine-lite'));
		add_editor_style();
	}
}
add_action('after_setup_theme', 'mh_magazine_lite_setup');

/***** Add Custom Image Sizes *****/

if (!function_exists('mh_magazine_lite_image_sizes')) {
	function mh_magazine_lite_image_sizes() {
		add_image_size('mh-magazine-lite-slider', 1030, 438, true);
		add_image_size('mh-magazine-lite-content', 678, 381, true);
		add_image_size('mh-magazine-lite-large', 678, 509, true);
		add_image_size('mh-magazine-lite-medium', 326, 245, true);
		add_image_size('mh-magazine-lite-small', 80, 60, true);
	}
}
add_action('after_setup_theme', 'mh_magazine_lite_image_sizes');

/***** Set Content Width *****/

if (!function_exists('mh_magazine_lite_content_width')) {
	function mh_magazine_lite_content_width() {
		global $content_width;
		if (!isset($content_width)) {
			$content_width = 678;
		}
	}
}
add_action('template_redirect', 'mh_magazine_lite_content_width');

/***** Load CSS & JavaScript *****/

if (!function_exists('mh_magazine_lite_scripts')) {
	function mh_magazine_lite_scripts() {
		global $mh_magazine_lite_version;
		wp_enqueue_style('mh-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,600', array(), null);
		wp_enqueue_style('mh-magazine-lite', get_stylesheet_uri(), false, $mh_magazine_lite_version);
		wp_enqueue_style('mh-font-awesome', get_template_directory_uri() . '/includes/font-awesome.min.css', array(), null);
		wp_enqueue_script('mh-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), $mh_magazine_lite_version);
		if (is_singular() && comments_open() && get_option('thread_comments') == 1) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'mh_magazine_lite_scripts');

if (!function_exists('mh_magazine_lite_admin_scripts')) {
	function mh_magazine_lite_admin_scripts($hook) {
		if ('appearance_page_magazine' === $hook || 'widgets.php' === $hook) {
			wp_enqueue_style('mh-admin', get_template_directory_uri() . '/admin/admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'mh_magazine_lite_admin_scripts');

/***** Register Widget Areas / Sidebars	*****/

if (!function_exists('mh_magazine_lite_widgets_init')) {
	function mh_magazine_lite_widgets_init() {
		register_sidebar(array('name' => esc_html__('Sidebar', 'mh-magazine-lite'), 'id' => 'sidebar', 'description' => esc_html__('Widget area (sidebar left/right) on single posts, pages and archives.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - Full Width', 'widget area name', 'mh-magazine-lite'), 1), 'id' => 'home-1', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-1 mh-home-wide %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 2/3 Width', 'widget area name', 'mh-magazine-lite'), 2), 'id' => 'home-2', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-2 mh-widget-col-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 3), 'id' => 'home-3', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-3 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 4), 'id' => 'home-4', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-4 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 2/3 Width', 'widget area name', 'mh-magazine-lite'), 5), 'id' => 'home-5', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-5 mh-widget-col-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 6), 'id' => 'home-6', 'description' => esc_html__('Widget area on homepage.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-home-6 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Posts %d - Advertisement', 'widget area name', 'mh-magazine-lite'), 1), 'id' => 'posts-1', 'description' => esc_html__('Widget area above single post content.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-posts-1 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Posts %d - Advertisement', 'widget area name', 'mh-magazine-lite'), 2), 'id' => 'posts-2', 'description' => esc_html__('Widget area below single post content.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-widget mh-posts-2 %2$s">', 'after_widget' => '</div>', 'before_title' => '<h4 class="mh-widget-title"><span class="mh-widget-title-inner">', 'after_title' => '</span></h4>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/4 Width', 'widget area name', 'mh-magazine-lite'), 1), 'id' => 'footer-1', 'description' => esc_html__('Widget area in footer.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/4 Width', 'widget area name', 'mh-magazine-lite'), 2), 'id' => 'footer-2', 'description' => esc_html__('Widget area in footer.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/4 Width', 'widget area name', 'mh-magazine-lite'), 3), 'id' => 'footer-3', 'description' => esc_html__('Widget area in footer.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
		register_sidebar(array('name' => sprintf(esc_html_x('Footer %d - 1/4 Width', 'widget area name', 'mh-magazine-lite'), 4), 'id' => 'footer-4', 'description' => esc_html__('Widget area in footer.', 'mh-magazine-lite'), 'before_widget' => '<div id="%1$s" class="mh-footer-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="mh-widget-title mh-footer-widget-title"><span class="mh-widget-title-inner mh-footer-widget-title-inner">', 'after_title' => '</span></h6>'));
	}
}
add_action('widgets_init', 'mh_magazine_lite_widgets_init');

/***** Include Several Functions *****/

if (is_admin()) {
	require_once('admin/admin.php');
}

require_once('includes/mh-customizer.php');
require_once('includes/mh-widgets.php');
require_once('includes/mh-custom-functions.php');
require_once('includes/mh-compatibility.php');

/***** Add Support for WooCommerce *****/

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

if (is_plugin_active('woocommerce/woocommerce.php')) {
	require_once('woocommerce/mh-custom-woocommerce.php');
}

?>