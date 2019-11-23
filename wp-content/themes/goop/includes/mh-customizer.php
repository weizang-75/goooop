<?php

function mh_magazine_lite_customize_register($wp_customize) {

	/***** Register Custom Controls *****/

	class MH_Magazine_Lite_Upgrade extends WP_Customize_Control {
        public function render_content() {  ?>
        	<p class="mh-upgrade-thumb">
        		<img src="<?php echo get_template_directory_uri(); ?>/images/mh_magazine.png" />
        	</p>
        	<p class="customize-control-title mh-upgrade-title">
        		<?php esc_html_e('MH Magazine Pro', 'mh-magazine-lite'); ?>
        	</p>
        	<p class="textfield mh-upgrade-text">
        		<?php esc_html_e('If you like the free version of this theme, you will LOVE the full version of MH Magazine which includes unique custom widgets, additional features and more useful options to customize your website.', 'mh-magazine-lite'); ?>
			</p>
			<p class="customize-control-title mh-upgrade-title">
        		<?php esc_html_e('Additional Features:', 'mh-magazine-lite'); ?>
        	</p>
        	<ul class="mh-upgrade-features">
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Options to modify color scheme', 'mh-magazine-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Typography options', 'mh-magazine-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Several additional widget areas', 'mh-magazine-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Additional custom widgets', 'mh-magazine-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Extended layout options', 'mh-magazine-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Additional custom menu slots', 'mh-magazine-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Advanced advertising options', 'mh-magazine-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Social buttons, related articles, ...', 'mh-magazine-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('News ticker and many more...', 'mh-magazine-lite'); ?>
	        	</li>
        	</ul>
			<p class="mh-button mh-upgrade-button">
				<a href="https://www.mhthemes.com/themes/mh/magazine/" target="_blank" class="button button-secondary">
					<?php esc_html_e('Upgrade to MH Magazine Pro', 'mh-magazine-lite'); ?>
				</a>
			</p>
			<p class="mh-button">
				<a href="https://www.mhthemes.com/themes/mh/magazine/#demos" target="_blank" class="button button-secondary">
					<?php esc_html_e('Theme Demos', 'mh-magazine-lite'); ?>
				</a>
			</p>
			<p class="mh-button">
				<a href="https://www.mhthemes.com/themes/showcase/" target="_blank" class="button button-secondary">
					<?php esc_html_e('MH Themes Showcase', 'mh-magazine-lite'); ?>
				</a>
			</p>
			<p class="mh-button">
				<a href="https://www.mhthemes.com/support/documentation-mh-magazine/" target="_blank" class="button button-secondary">
					<?php esc_html_e('Theme Documentation', 'mh-magazine-lite'); ?>
				</a>
			</p>
			<p class="mh-button">
				<a href="https://wordpress.org/support/theme/mh-magazine-lite" target="_blank" class="button button-secondary">
					<?php esc_html_e('Support Forum', 'mh-magazine-lite'); ?>
				</a>
			</p><?php
        }
    }

    /***** Add Panels *****/

	$wp_customize->add_panel('mh_theme_options', array('title' => esc_html__('Theme Options', 'mh-magazine-lite'), 'description' => '', 'capability' => 'edit_theme_options', 'theme_supports' => '', 'priority' => 1));

	/***** Add Sections *****/

	$wp_customize->add_section('mh_magazine_lite_general', array('title' => esc_html__('General', 'mh-magazine-lite'), 'priority' => 1, 'panel' => 'mh_theme_options'));
	$wp_customize->add_section('mh_magazine_lite_layout', array('title' => esc_html__('Layout', 'mh-magazine-lite'), 'priority' => 2, 'panel' => 'mh_theme_options'));
	if (mh_magazine_lite_official_theme()) {
		$wp_customize->add_section('mh_magazine_lite_upgrade', array('title' => esc_html__('More Features &amp; Options', 'mh-magazine-lite'), 'priority' => 3, 'panel' => 'mh_theme_options'));
	}

    /***** Add Settings *****/

    $wp_customize->add_setting('mh_magazine_lite_options[excerpt_length]', array('default' => 25, 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_integer'));
    $wp_customize->add_setting('mh_magazine_lite_options[excerpt_more]', array('default' => '[...]', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_text'));
    $wp_customize->add_setting('mh_magazine_lite_options[sb_position]', array('default' => 'right', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_select'));
    $wp_customize->add_setting('mh_magazine_lite_options[author_box]', array('default' => 'enable', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_select'));
    $wp_customize->add_setting('mh_magazine_lite_options[post_nav]', array('default' => 'enable', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_select'));
	$wp_customize->add_setting('mh_magazine_lite_options[premium_version_upgrade]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));

    /***** Add Controls *****/

    $wp_customize->add_control('excerpt_length', array('label' => esc_html__('Custom excerpt length in words', 'mh-magazine-lite'), 'section' => 'mh_magazine_lite_general', 'settings' => 'mh_magazine_lite_options[excerpt_length]', 'priority' => 1, 'type' => 'text'));
    $wp_customize->add_control('excerpt_more', array('label' => esc_html__('Custom excerpt more text', 'mh-magazine-lite'), 'section' => 'mh_magazine_lite_general', 'settings' => 'mh_magazine_lite_options[excerpt_more]', 'priority' => 2, 'type' => 'text'));
    $wp_customize->add_control('sb_position', array('label' => esc_html__('Position of default sidebar', 'mh-magazine-lite'), 'section' => 'mh_magazine_lite_layout', 'settings' => 'mh_magazine_lite_options[sb_position]', 'priority' => 1, 'type' => 'select', 'choices' => array('left' => esc_html__('Left', 'mh-magazine-lite'), 'right' => esc_html__('Right', 'mh-magazine-lite'))));
    $wp_customize->add_control('author_box', array('label' => esc_html__('Author Box', 'mh-magazine-lite'), 'section' => 'mh_magazine_lite_layout', 'settings' => 'mh_magazine_lite_options[author_box]', 'priority' => 2, 'type' => 'select', 'choices' => array('enable' => esc_html__('Enable', 'mh-magazine-lite'), 'disable' => esc_html__('Disable', 'mh-magazine-lite'))));
    $wp_customize->add_control('post_nav', array('label' => esc_html__('Post/Attachment Navigation', 'mh-magazine-lite'), 'section' => 'mh_magazine_lite_layout', 'settings' => 'mh_magazine_lite_options[post_nav]', 'priority' => 4, 'type' => 'select', 'choices' => array('enable' => esc_html__('Enable', 'mh-magazine-lite'), 'disable' => esc_html__('Disable', 'mh-magazine-lite'))));
	$wp_customize->add_control(new MH_Magazine_Lite_Upgrade($wp_customize, 'premium_version_upgrade', array('section' => 'mh_magazine_lite_upgrade', 'settings' => 'mh_magazine_lite_options[premium_version_upgrade]', 'priority' => 1)));
}
add_action('customize_register', 'mh_magazine_lite_customize_register');

/***** Data Sanitization *****/

function mh_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}
function mh_sanitize_integer($input) {
    return strip_tags($input);
}
function mh_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}
function mh_sanitize_select($input) {
    $valid = array(
        'left' => esc_html__('Left', 'mh-magazine-lite'),
        'right' => esc_html__('Right', 'mh-magazine-lite'),
        'enable' => esc_html__('Enable', 'mh-magazine-lite'),
        'disable' => esc_html__('Disable', 'mh-magazine-lite'),
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

/***** Return Theme Options / Set Default Options *****/

if (!function_exists('mh_magazine_lite_theme_options')) {
	function mh_magazine_lite_theme_options() {
		$theme_options = wp_parse_args(
			get_option('mh_magazine_lite_options', array()),
			mh_magazine_lite_default_options()
		);
		return $theme_options;
	}
}

if (!function_exists('mh_magazine_lite_default_options')) {
	function mh_magazine_lite_default_options() {
		$default_options = array(
			'excerpt_length' => 25,
			'excerpt_more' => '[...]',
			'sb_position' => 'right',
			'author_box' => 'enable',
			'post_nav' => 'enable',
			'premium_version_label' => '',
			'premium_version_text' => '',
			'premium_version_button' => ''
		);
		return $default_options;
	}
}

/***** Enqueue Customizer CSS *****/

function mh_magazine_lite_customizer_css() {
	wp_enqueue_style('mh-customizer', get_template_directory_uri() . '/admin/customizer.css', array());
}
add_action('customize_controls_print_styles', 'mh_magazine_lite_customizer_css');

?>