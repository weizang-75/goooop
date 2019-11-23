<?php /* Template for displaying content of MH Posts Large widget */ ?>
<article class="post-<?php the_ID(); ?> mh-posts-large-item">
	<figure class="mh-posts-large-thumb">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
			if (has_post_thumbnail()) {
				the_post_thumbnail('mh-magazine-lite-content');
			} else {
				echo '<img class="mh-image-placeholder" src="' . get_template_directory_uri() . '/images/placeholder-content.png' . '" alt="' . esc_html__('No Image', 'mh-magazine-lite') . '" />';
			} ?>
		</a>
	</figure>
	<div class="mh-posts-large-content">
		<header class="mh-posts-large-header">
			<h3 class="mh-posts-large-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
					<?php the_title(); ?>
				</a>
			</h3>
			<div class="mh-meta mh-posts-large-meta">
				<?php mh_magazine_lite_loop_meta(); ?>
			</div>
		</header>
		<div class="mh-posts-large-excerpt mh-clearfix">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>