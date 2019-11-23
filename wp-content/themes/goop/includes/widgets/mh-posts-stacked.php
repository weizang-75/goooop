<?php

/***** MH Posts Stacked [lite] *****/

class mh_magazine_lite_posts_stacked extends WP_Widget {
	function __construct() {
		parent::__construct(
			'mh_magazine_lite_posts_stacked', esc_html_x('MH Posts Stacked [lite]', 'widget name', 'mh-magazine-lite'),
			array(
				'classname' => 'mh_magazine_lite_posts_stacked',
				'description' => esc_html__('MH Posts Stacked widget to display 5 stacked posts nicely including thumbnail, title and meta data.', 'mh-magazine-lite'),
				'customize_selective_refresh' => true
			)
		);
	}
	function widget($args, $instance) {
		$defaults = array('title' => '', 'category' => 0, 'tags' => '', 'postcount' => 5, 'offset' => 0, 'sticky' => 1);
        $instance = wp_parse_args($instance, $defaults);
		$query_args = array();
		$query_args['posts_per_page'] = $instance['postcount'];
		$query_args['ignore_sticky_posts'] = $instance['sticky'];
		if (0 !== $instance['category']) {
			$query_args['cat'] = $instance['category'];
		}
		if (!empty($instance['tags'])) {
			$tag_slugs = explode(',', $instance['tags']);
			$tag_slugs = array_map('trim', $tag_slugs);
			$query_args['tag_slug__in'] = $tag_slugs;
		}
		if (0 !== $instance['offset']) {
			$query_args['offset'] = $instance['offset'];
		}
		$widget_posts = new WP_Query($query_args);
		$max_posts = $widget_posts->post_count;
        echo $args['before_widget'];
			if ($widget_posts->have_posts()) :
				$counter = 1;
				$stacked_border = '';
				if (!empty($instance['title'])) {
					echo $args['before_title'];
						if ($instance['category'] != 0) {
							echo '<a href="' . esc_url(get_category_link($instance['category'])) . '" class="mh-widget-title-link">';
						}
						echo esc_html(apply_filters('widget_title', $instance['title']));
						if ($instance['category'] != 0) {
							echo '</a>';
						}
					echo $args['after_title'];
				}
				echo '<div class="mh-posts-stacked-widget mh-clearfix">' . "\n";
					while ($widget_posts->have_posts()) : $widget_posts->the_post();
						if ($counter === 1) { ?>
							<div class="mh-posts-stacked-wrap mh-posts-stacked-large">
								<div class="post-<?php the_ID(); ?> mh-posts-stacked-content">
									<div class="mh-posts-stacked-thumb mh-posts-stacked-thumb-large">
										<a class="mh-posts-stacked-overlay mh-posts-stacked-overlay-large" href="<?php the_permalink(); ?>"></a><?php
										if (has_post_thumbnail()) {
											the_post_thumbnail('mh-magazine-lite-large');
										} else {
											echo '<img class="mh-image-placeholder" src="' . get_template_directory_uri() . '/images/placeholder-large.png' . '" alt="' . esc_html__('No Image', 'mh-magazine-lite') . '" />';
										} ?>
										<article class="mh-posts-stacked-item">
											<h3 class="mh-posts-stacked-title mh-posts-stacked-title-large">
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
													<?php the_title(); ?>
												</a>
											</h3>
											<div class="mh-posts-stacked-meta mh-posts-stacked-meta-large">
												<?php mh_magazine_lite_loop_meta(); ?>
											</div>
										</article>
									</div>
								</div>
							</div><?php
						}
						if ($counter === 2) {
							echo '<div class="mh-posts-stacked-wrap mh-posts-stacked-columns mh-clearfix">' . "\n";
						}
						if ($counter === 4 || $counter === 5) {
							$stacked_border = ' mh-posts-stacked-overlay-last';
						}
						if ($counter >= 2) { ?>
							<div class="mh-posts-stacked-wrap mh-posts-stacked-small">
								<div class="post-<?php the_ID(); ?> mh-posts-stacked-content">
									<div class="mh-posts-stacked-thumb mh-posts-stacked-thumb-small">
										<a class="mh-posts-stacked-overlay mh-posts-stacked-overlay-small<?php echo esc_attr($stacked_border); ?>" href="<?php the_permalink(); ?>"></a><?php
										if (has_post_thumbnail()) {
											the_post_thumbnail('mh-magazine-lite-medium');
										} else {
											echo '<img class="mh-image-placeholder" src="' . get_template_directory_uri() . '/images/placeholder-medium.png' . '" alt="' . esc_html__('No Image', 'mh-magazine-lite') . '" />';
										} ?>
										<article class="mh-posts-stacked-item">
											<h3 class="mh-posts-stacked-title mh-posts-stacked-title-small">
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
													<?php the_title(); ?>
												</a>
											</h3>
											<div class="mh-posts-stacked-meta mh-posts-stacked-meta-small">
												<?php mh_magazine_lite_loop_meta(); ?>
											</div>
										</article>
									</div>
								</div>
							</div><?php
						}
						if ($counter > 1 && $counter === $max_posts) {
							echo '</div>' . "\n";
						}
					$counter++;
					endwhile;
					wp_reset_postdata();
				echo '</div>' . "\n";
			endif;
		echo $args['after_widget'];
    }
	function update($new_instance, $old_instance) {
        $instance = array();
        if (!empty($new_instance['title'])) {
			$instance['title'] = sanitize_text_field($new_instance['title']);
		}
        if (0 !== absint($new_instance['category'])) {
			$instance['category'] = absint($new_instance['category']);
		}
		if (!empty($new_instance['tags'])) {
			$tag_slugs = explode(',', $new_instance['tags']);
			$tag_slugs = array_map('sanitize_title', $tag_slugs);
			$instance['tags'] = implode(', ', $tag_slugs);
		}
		if (0 !== absint($new_instance['offset'])) {
			if (absint($new_instance['offset']) > 50) {
				$instance['offset'] = 50;
			} else {
				$instance['offset'] = absint($new_instance['offset']);
			}
		}
        return $instance;
    }
    function form($instance) {
        $defaults = array('title' => '', 'category' => 0, 'tags' => '', 'offset' => 0, 'sticky' => 1);
        $instance = wp_parse_args($instance, $defaults); ?>
        <p>
        	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'mh-magazine-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php esc_html_e('Select a Category:', 'mh-magazine-lite'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('category')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('category')); ?>">
            	<option value="0" <?php selected(0, $instance['category']); ?>><?php esc_html_e('All', 'mh-magazine-lite'); ?></option><?php
            		$categories = get_categories();
            		foreach ($categories as $cat) { ?>
            			<option value="<?php echo absint($cat->cat_ID); ?>" <?php selected($cat->cat_ID, $instance['category']); ?>><?php echo esc_html($cat->cat_name) . ' (' . absint($cat->category_count) . ')'; ?></option><?php
            		} ?>
            </select>
            <small><?php esc_html_e('Select a category to display posts from.', 'mh-magazine-lite'); ?></small>
		</p>
		<p>
        	<label for="<?php echo esc_attr($this->get_field_id('tags')); ?>"><?php esc_html_e('Filter Posts by Tags (e.g. lifestyle):', 'mh-magazine-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['tags']); ?>" name="<?php echo esc_attr($this->get_field_name('tags')); ?>" id="<?php echo esc_attr($this->get_field_id('tags')); ?>" />
	    </p>
	    <p>
        	<label for="<?php echo esc_attr($this->get_field_id('offset')); ?>"><?php esc_html_e('Skip Posts (max. 50):', 'mh-magazine-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo absint($instance['offset']); ?>" name="<?php echo esc_attr($this->get_field_name('offset')); ?>" id="<?php echo esc_attr($this->get_field_id('offset')); ?>" />
	    </p>
		<p>
    		<strong><?php esc_html_e('Info:', 'mh-magazine-lite'); ?></strong> <?php esc_html_e('This is the lite version of this widget with basic features. More features and options are available in the premium version of MH Magazine.', 'mh-magazine-lite'); ?>
    	</p><?php
    }
}

?>