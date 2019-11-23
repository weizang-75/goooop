<aside class="mh-widget-col-1 mh-sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar"><?php
	if (is_active_sidebar('sidebar')) {
		dynamic_sidebar('sidebar');
	} else { ?>
		<div class="mh-widget mh-sidebar-empty">
			<h4 class="mh-widget-title">
				<span class="mh-widget-title-inner">
					<?php esc_html_e('Sidebar', 'mh-magazine-lite') ?>
				</span>
			</h4>
			<div class="textwidget">
				<?php printf(esc_html__('Please navigate to %1$1s in your WordPress dashboard and add some widgets into the %2$2s widget area.', 'mh-magazine-lite'), '<strong>' . esc_html__('Appearance &#8594; Widgets', 'mh-magazine-lite') . '</strong>', '<em>' . esc_html__('Sidebar', 'mh-magazine-lite') . '</em>'); ?>
			</div>
		</div><?php
	} ?>
</aside>