<?php

/***** Declare WooCommerce Compatibility *****/

add_theme_support('woocommerce');
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');

/***** Custom WooCommerce Markup *****/

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

function mh_magazine_lite_wrapper_start() {
	echo '<div class="mh-wrapper mh-clearfix">' . "\n";
		echo '<div id="main-content" class="mh-content entry-content" role="main" itemprop="mainContentOfPage">' . "\n";
}
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'mh_magazine_lite_wrapper_start', 10);

function mh_magazine_lite_wrapper_end() {
		echo '</div>' . "\n";
		get_sidebar();
  	echo '</div>' . "\n";
}
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_after_main_content', 'mh_magazine_lite_wrapper_end', 10);

/***** Load Custom WooCommerce CSS *****/

function mh_magazine_lite_woocommerce_css() {
    wp_register_style('mh-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.css');
    wp_enqueue_style('mh-woocommerce');
}
add_action('wp_enqueue_scripts', 'mh_magazine_lite_woocommerce_css');

?>