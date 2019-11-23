<?php

if (!defined('ABSPATH')) {
	exit;
}

/***** Welcome Notice in WordPress Dashboard *****/

if (!function_exists('mh_magazine_lite_admin_notice')) {
	function mh_magazine_lite_admin_notice() {
		global $pagenow, $mh_magazine_lite_version;
		if (current_user_can('edit_theme_options') && 'index.php' === $pagenow && !get_option('mh_magazine_lite_notice_welcome') || current_user_can('edit_theme_options') && 'themes.php' === $pagenow && isset($_GET['activated']) && !get_option('mh_magazine_lite_notice_welcome')) {
			wp_enqueue_style('mh-magazine-lite-admin-notice', get_template_directory_uri() . '/admin/admin-notice.css', array(), $mh_magazine_lite_version);
			mh_magazine_lite_welcome_notice();
		}
	}
}

/***** Hide Welcome Notice in WordPress Dashboard *****/

if (!function_exists('mh_magazine_lite_hide_notice')) {
	function mh_magazine_lite_hide_notice() {
		if (isset($_GET['mh-magazine-lite-hide-notice']) && isset($_GET['_mh_magazine_lite_notice_nonce'])) {
			if (!wp_verify_nonce($_GET['_mh_magazine_lite_notice_nonce'], 'mh_magazine_lite_hide_notices_nonce')) {
				wp_die(esc_html__('Action failed. Please refresh the page and retry.', 'mh-magazine-lite'));
			}
			if (!current_user_can('edit_theme_options')) {
				wp_die(esc_html__('You do not have the necessary permission to perform this action.', 'mh-magazine-lite'));
			}
			$hide_notice = sanitize_text_field($_GET['mh-magazine-lite-hide-notice']);
			update_option('mh_magazine_lite_notice_' . $hide_notice, 1);
		}
	}
}

/***** Content of Welcome Notice in WordPress Dashboard *****/

if (!function_exists('mh_magazine_lite_welcome_notice')) {
	function mh_magazine_lite_welcome_notice() {
		global $mh_magazine_lite_data; ?>
		<div class="notice notice-success mh-welcome-notice">
			<a class="notice-dismiss mh-welcome-notice-hide" href="<?php echo esc_url(wp_nonce_url(remove_query_arg(array('activated'), add_query_arg('mh-magazine-lite-hide-notice', 'welcome')), 'mh_magazine_lite_hide_notices_nonce', '_mh_magazine_lite_notice_nonce')); ?>">
				<span class="screen-reader-text">
					<?php echo esc_html__('Dismiss this notice.', 'mh-magazine-lite'); ?>
				</span>
			</a>
			<p><?php printf(esc_html__('Thanks for using %1$s! To get started please make sure you visit our %2$swelcome page%3$s.', 'mh-magazine-lite'), $mh_magazine_lite_data['Name'], '<a href="' . esc_url(admin_url('themes.php?page=magazine')) . '">', '</a>'); ?></p>
			<p class="mh-welcome-notice-button">
				<a class="button-secondary" href="<?php echo esc_url(admin_url('themes.php?page=magazine')); ?>">
					<?php printf(esc_html__('Get Started with %s', 'mh-magazine-lite'), $mh_magazine_lite_data['Name']); ?>
				</a>
				<a class="button-primary" href="<?php echo esc_url('https://www.mhthemes.com/themes/mh/magazine/'); ?>" target="_blank">
					<?php esc_html_e('Upgrade to MH Magazine Pro', 'mh-magazine-lite'); ?>
				</a>
			</p>
		</div><?php
	}
}

/***** Theme Info Page *****/

if (!function_exists('mh_magazine_lite_theme_info_page')) {
	function mh_magazine_lite_theme_info_page() {
		add_theme_page(esc_html__('Welcome to MH Magazine lite', 'mh-magazine-lite'), esc_html__('Theme Info', 'mh-magazine-lite'), 'edit_theme_options', 'magazine', 'mh_magazine_lite_display_theme_page');
	}
}

if (!function_exists('mh_magazine_lite_display_theme_page')) {
	function mh_magazine_lite_display_theme_page() {
		global $mh_magazine_lite_data; ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Welcome to %1$1s %2$2s', 'mh-magazine-lite'), $mh_magazine_lite_data['Name'], $mh_magazine_lite_data['Version']); ?>
			</h1>
			<div class="mh-row theme-intro mh-clearfix">
				<div class="mh-col-1-4">
					<img class="theme-screenshot" src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php esc_html_e('Theme Screenshot', 'mh-magazine-lite'); ?>" />
				</div>
				<div class="mh-col-3-4 theme-description">
					<?php echo esc_html($mh_magazine_lite_data['Description']); ?>
				</div>
			</div>
			<hr>
			<div class="theme-links mh-clearfix">
				<p>
					<strong><?php esc_html_e('Important Links:', 'mh-magazine-lite'); ?></strong>
					<a href="<?php echo esc_url('https://www.mhthemes.com/themes/mh/magazine-lite/'); ?>" target="_blank">
						<?php esc_html_e('Theme Info Page', 'mh-magazine-lite'); ?>
					</a>
					<a href="<?php echo esc_url('https://www.mhthemes.com/support/'); ?>" target="_blank">
						<?php esc_html_e('Support Center', 'mh-magazine-lite'); ?>
					</a>
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/mh-magazine-lite'); ?>" target="_blank">
						<?php esc_html_e('Support Forum', 'mh-magazine-lite'); ?>
					</a>
					<a href="<?php echo esc_url('https://www.mhthemes.com/themes/showcase/'); ?>" target="_blank">
						<?php esc_html_e('MH Themes Showcase', 'mh-magazine-lite'); ?>
					</a>
				</p>
			</div>
			<hr>
			<div id="getting-started">
				<h3>
					<?php printf(esc_html__('Get Started with %s', 'mh-magazine-lite'), $mh_magazine_lite_data['Name']); ?>
				</h3>
				<div class="mh-row mh-clearfix">
					<div class="mh-col-1-2">
						<div class="section">
							<h4>
								<span class="dashicons dashicons-welcome-learn-more"></span>
								<?php esc_html_e('Theme Documentation', 'mh-magazine-lite'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Need any help with configuring %s? The documentation for this theme includes all theme related information that is needed to get your site up and running in no time. In case you have any additional questions, feel free to reach out in the theme support forums on WordPress.org.', 'mh-magazine-lite'), $mh_magazine_lite_data['Name']); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('https://www.mhthemes.com/support/documentation-mh-magazine/'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('Theme Documentation', 'mh-magazine-lite'); ?>
								</a>
								<a href="<?php echo esc_url('https://wordpress.org/support/theme/mh-magazine-lite'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('Support Forum', 'mh-magazine-lite'); ?>
								</a>
							</p>
						</div>
						<div class="section">
							<h4>
								<span class="dashicons dashicons-admin-appearance"></span>
								<?php esc_html_e('Theme Options', 'mh-magazine-lite'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize Theme" to open the Customizer now.',  'mh-magazine-lite'), $mh_magazine_lite_data['Name']); ?>
							</p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-secondary">
									<?php esc_html_e('Customize Theme', 'mh-magazine-lite'); ?>
								</a>
							</p>
						</div>
					</div>
					<div class="mh-col-1-2">
						<div class="section">
							<h4>
								<span class="dashicons dashicons-cart"></span>
								<?php esc_html_e('MH Magazine Pro', 'mh-magazine-lite'); ?>
							</h4>
							<p class="about">
								<?php esc_html_e('If you like the free version of this theme, you will LOVE the full version of MH Magazine which includes unique custom widgets, additional features and more useful options to customize your website.', 'mh-magazine-lite'); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('https://www.mhthemes.com/themes/mh/magazine/'); ?>" target="_blank" class="button button-primary">
									<?php esc_html_e('Upgrade to MH Magazine Pro', 'mh-magazine-lite'); ?>
								</a>
							</p>
						</div>
						<div class="section">
							<h4>
								<span class="dashicons dashicons-images-alt"></span>
								<?php esc_html_e('MH Magazine Theme Demos', 'mh-magazine-lite'); ?>
							</h4>
							<p class="about">
								<?php esc_html_e('The premium version of MH Magazine includes lots of additional features and options to customize your website. We have created several theme demos as examples in order to show what is possible with this flexible magazine theme.', 'mh-magazine-lite'); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('https://www.mhthemes.com/themes/mh/magazine/#demos'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('Theme Demos', 'mh-magazine-lite'); ?>
								</a>
								<a href="<?php echo esc_url('https://www.mhthemes.com/themes/showcase/'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('MH Themes Showcase', 'mh-magazine-lite'); ?>
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="theme-comparison">
				<h3 class="theme-comparison-intro">
					<?php esc_html_e('Upgrade to MH Magazine for more awesome features:', 'mh-magazine-lite'); ?>
				</h3>
				<table>
					<thead class="theme-comparison-header">
						<tr>
							<th class="table-feature-title"><h3><?php esc_html_e('Features', 'mh-magazine-lite'); ?></h3></th>
							<th><h3><?php esc_html_e('MH Magazine lite', 'mh-magazine-lite'); ?></h3></th>
							<th><h3><?php esc_html_e('MH Magazine', 'mh-magazine-lite'); ?></h3></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><h3><?php esc_html_e('Theme Price', 'mh-magazine-lite'); ?></h3></td>
							<td><?php esc_html_e('Free', 'mh-magazine-lite'); ?></td>
							<td>
								<a href="<?php echo esc_url('https://www.mhthemes.com/pricing/#join'); ?>" target="_blank">
									<?php esc_html_e('View Pricing', 'mh-magazine-lite'); ?>
								</a>
							</td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Site Width', 'mh-magazine-lite'); ?></h3></td>
							<td><?php esc_html_e('max. 1080px', 'mh-magazine-lite'); ?></td>
							<td><?php esc_html_e('max. 1080px / 1431px', 'mh-magazine-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Responsive Layout', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Extended Layout Options', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Second Sidebar', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Homepage Template', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Total Widget Areas', 'mh-magazine-lite'); ?></h3></td>
							<td><?php esc_html_e('12', 'mh-magazine-lite'); ?></td>
							<td><?php esc_html_e('26', 'mh-magazine-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Custom Widgets', 'mh-magazine-lite'); ?></h3></td>
							<td><?php esc_html_e('6 (Basic Features)', 'mh-magazine-lite'); ?></td>
							<td><?php esc_html_e('23 (Full Features)', 'mh-magazine-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Custom Menus', 'mh-magazine-lite'); ?></h3></td>
							<td><?php esc_html_e('1', 'mh-magazine-lite'); ?></td>
							<td><?php esc_html_e('5', 'mh-magazine-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Transparent Header', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('jQuery News Ticker', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('FlexSlider 2 with Touch Support', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Built-in Breadcrumb Navigation', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Built-in Social Buttons', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Related Posts Feature', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Advertising Options', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Theme Options', 'mh-magazine-lite'); ?></h3></td>
							<td><?php esc_html_e('Basic Options', 'mh-magazine-lite'); ?></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Color Options', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Google Webfonts Collection', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Typography Options', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Extended Features', 'mh-magazine-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Support', 'mh-magazine-lite'); ?></h3></td>
							<td><?php esc_html_e('Support Forum', 'mh-magazine-lite'); ?></td>
							<td><?php esc_html_e('Personal E-Mail Support', 'mh-magazine-lite'); ?></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<a href="<?php echo esc_url('https://www.mhthemes.com/themes/mh/magazine/'); ?>" target="_blank" class="upgrade-button">
									<?php esc_html_e('Upgrade to MH Magazine Pro', 'mh-magazine-lite'); ?>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<hr>
			<div id="theme-author">
				<p>
					<?php printf(esc_html__('%1$1s is proudly brought to you by %2$2s. If you like %3$3s: %4$4s.', 'mh-magazine-lite'), $mh_magazine_lite_data['Name'], '<a target="_blank" href="https://www.mhthemes.com/" title="MH Themes">MH Themes</a>', $mh_magazine_lite_data['Name'], '<a target="_blank" href="https://wordpress.org/support/view/theme-reviews/mh-magazine-lite?filter=5" title="MH Magazine lite Review">' . esc_html__('Rate this theme', 'mh-magazine-lite') . '</a>'); ?>
				</p>
			</div>
		</div><?php
	}
}

/***** Add Welcome Notice and Admin Menu for Parent Theme and Official Child Themes *****/

if (mh_magazine_lite_official_theme()) {
	add_action('admin_notices', 'mh_magazine_lite_admin_notice');
	add_action('wp_loaded', 'mh_magazine_lite_hide_notice');
	add_action('admin_menu', 'mh_magazine_lite_theme_info_page');
}

?>