<?php

/***** MH Posts Focus [lite] *****/

class mh_magazine_lite_posts_focus extends WP_Widget {
	function __construct() {
		parent::__construct(
			'mh_magazine_lite_posts_focus', esc_html_x('MH Posts Focus [lite]', 'widget name', 'mh-magazine-lite'),
			array(
				'classname' => 'mh_magazine_lite_posts_focus',
				'description' => esc_html__('MH Posts Focus widget to display 5 posts with focus on large post in the middle (if placed in full-width widget area).', 'mh-magazine-lite'),
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
				if ($max_posts > 3) {
					$alignment = ' mh-posts-focus-inner';
				} else {
					$alignment = ' mh-posts-focus-full';
				}
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
				echo '<div class="mh-row mh-posts-focus-widget mh-clearfix">' . "\n";
					while ($widget_posts->have_posts()) : $widget_posts->the_post();
						if ($counter === 1) { ?>
							<div class="mh-col-3-4 mh-posts-focus-wrap<?php echo esc_attr($alignment); ?> mh-clearfix">
								<div class="mh-col-3-4 mh-posts-focus-wrap mh-posts-focus-large mh-clearfix">
									<article class="post-<?php the_ID(); ?> mh-posts-focus-item mh-posts-focus-item-large mh-clearfix">
										<figure class="mh-posts-focus-thumb mh-posts-focus-thumb-large">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
												if (has_post_thumbnail()) {
													the_post_thumbnail('mh-magazine-lite-large');
												} else {
													echo '<img class="mh-image-placeholder" src="' . get_template_directory_uri() . '/images/placeholder-large.png' . '" alt="' . esc_html__('No Image', 'mh-magazine-lite') . '" />';
												} ?>
											</a>
										</figure>
										<h3 class="mh-posts-focus-title mh-posts-focus-title-large">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
												<?php the_title(); ?>
											</a>
										</h3>
										<div class="mh-meta mh-posts-focus-meta mh-posts-focus-meta-large">
											<?php mh_magazine_lite_loop_meta(); ?>
										</div>
										<div class="mh-posts-focus-excerpt mh-posts-focus-excerpt-large mh-clearfix">
											<?php the_excerpt(); ?>
										</div>
									</article>
								</div><?php
						}
						if ($counter === 2) {
							echo '<div class="mh-col-1-4 mh-posts-focus-wrap mh-posts-focus-small mh-posts-focus-small-inner mh-clearfix">' . "\n";
						}
						if ($counter >= 2) { ?>
							<article class="post-<?php the_ID(); ?> mh-posts-focus-item mh-posts-focus-item-small mh-clearfix">
								<figure class="mh-posts-focus-thumb mh-posts-focus-thumb-small">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
										if (has_post_thumbnail()) {
											the_post_thumbnail('mh-magazine-lite-medium');
										} else {
											echo '<img class="mh-image-placeholder" src="' . get_template_directory_uri() . '/images/placeholder-medium.png' . '" alt="' . esc_html__('No Image', 'mh-magazine-lite') . '" />';
										} ?>
									</a>
								</figure>
								<h3 class="mh-posts-focus-title mh-posts-focus-title-small">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
										<?php the_title(); ?>
									</a>
								</h3>
								<div class="mh-meta mh-posts-focus-meta mh-posts-focus-meta-small">
									<?php mh_magazine_lite_loop_meta(); ?>
								</div>
								<div class="mh-posts-focus-excerpt mh-posts-focus-excerpt-small mh-clearfix">
									<?php the_excerpt(); ?>
								</div>
							</article><?php
						}
						if ($counter === 2 && $counter === $max_posts || $counter === 3) {
							echo '</div>' . "\n";
						}
						if ($counter === 3) {
							echo '</div>' . "\n";
							echo '<div class="mh-col-1-4 mh-posts-focus-wrap mh-posts-focus-small mh-posts-focus-outer mh-clearfix">' . "\n";
						}
						if ($counter === $max_posts) {
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
        $defaults = array('title' => '', 'category' => 0, 'tags' => '', 'offset' => 0);
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