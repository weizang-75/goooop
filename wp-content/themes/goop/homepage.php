<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>
<div class="mh-wrapper mh-home mh-clearfix">
	<?php dynamic_sidebar('home-1'); ?>
	<?php if (is_active_sidebar('home-2') || is_active_sidebar('home-3') || is_active_sidebar('home-4') || is_active_sidebar('home-5')) : ?>
		<div id="main-content" class="mh-content mh-home-content">
			<?php dynamic_sidebar('home-2'); ?>
			<?php if (is_active_sidebar('home-3') || is_active_sidebar('home-4')) : ?>
				<div class="mh-home-columns mh-clearfix">
					<?php if (is_active_sidebar('home-3')) { ?>
		    			<div class="mh-widget-col-1 mh-sidebar mh-home-sidebar mh-home-area-3">
			    			<?php dynamic_sidebar('home-3'); ?>
						</div>
					<?php } elseif (is_active_sidebar('home-4')) { ?>
						<div class="mh-widget-col-1 mh-sidebar mh-home-sidebar mh-home-area-3">
							<div class="mh-widget mh-home-3 mh-sidebar-empty">
								<h4 class="mh-widget-title">
									<span class="mh-widget-title-inner">
										<?php printf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 3); ?>
									</span>
								</h4>
								<div class="textwidget">
									<?php printf(esc_html__('Please navigate to %1$1s in your WordPress dashboard and add some widgets into the %2$2s widget area.', 'mh-magazine-lite'), '<strong>' . esc_html__('Appearance &#8594; Widgets', 'mh-magazine-lite') . '</strong>', '<em>' . sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 3) . '</em>'); ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if (is_active_sidebar('home-4')) { ?>
		    			<div class="mh-widget-col-1 mh-sidebar mh-home-sidebar mh-margin-left mh-home-area-4">
			    			<?php dynamic_sidebar('home-4'); ?>
						</div>
					<?php } elseif (is_active_sidebar('home-3')) { ?>
						<div class="mh-widget-col-1 mh-sidebar mh-home-sidebar mh-margin-left mh-home-area-4">
							<div class="mh-widget mh-home-4 mh-sidebar-empty">
								<h4 class="mh-widget-title">
									<span class="mh-widget-title-inner">
										<?php printf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 4); ?>
									</span>
								</h4>
								<div class="textwidget">
									<?php printf(esc_html__('Please navigate to %1$1s in your WordPress dashboard and add some widgets into the %2$2s widget area.', 'mh-magazine-lite'), '<strong>' . esc_html__('Appearance &#8594; Widgets', 'mh-magazine-lite') . '</strong>', '<em>' . sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 4) . '</em>'); ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php endif; ?>
			<?php dynamic_sidebar('home-5'); ?>
		</div>
	<?php endif; ?>
	<?php if (is_active_sidebar('home-6')) { ?>
		<div class="mh-widget-col-1 mh-sidebar mh-home-sidebar mh-home-area-6">
        	<?php dynamic_sidebar('home-6'); ?>
		</div>
	<?php } elseif (is_active_sidebar('home-2') || is_active_sidebar('home-3') || is_active_sidebar('home-4') || is_active_sidebar('home-5')) { ?>
		<div class="mh-widget-col-1 mh-sidebar mh-home-sidebar mh-home-area-6">
			<div class="mh-widget mh-home-6 mh-sidebar-empty">
				<h4 class="mh-widget-title">
					<span class="mh-widget-title-inner">
						<?php printf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 6); ?>
					</span>
				</h4>
				<div class="textwidget">
					<?php printf(esc_html__('Please navigate to %1$1s in your WordPress dashboard and add some widgets into the %2$2s widget area.', 'mh-magazine-lite'), '<strong>' . esc_html__('Appearance &#8594; Widgets', 'mh-magazine-lite') . '</strong>', '<em>' . sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'mh-magazine-lite'), 6) . '</em>'); ?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<?php get_footer(); ?>