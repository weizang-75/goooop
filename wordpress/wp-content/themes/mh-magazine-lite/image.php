<?php /* The template for displaying image attachments. */ ?>
<?php get_header(); ?>
<div class="mh-wrapper mh-clearfix">
	<div id="main-content" class="mh-content" role="main"><?php
		while (have_posts()) : the_post();
			mh_before_post_content(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
				</header>
				<figure class="entry-thumbnail">
					<?php $att_image = wp_get_attachment_image_src($post->id, 'full'); ?>
					<a href="<?php echo esc_url(wp_get_attachment_url($post->id)); ?>" title="<?php the_title_attribute(); ?>" rel="attachment" target="_blank">
						<img src="<?php echo esc_url($att_image[0]); ?>" width="<?php echo absint($att_image[1]); ?>" height="<?php echo absint($att_image[2]); ?>" class="attachment-medium" alt="<?php the_title_attribute(); ?>" />
					</a>
					<?php if (has_excerpt()) { ?>
						<figcaption class="mh-attachment-excerpt wp-caption-text">
							<?php the_excerpt(); ?>
						</figcaption>
					<?php } ?>
				</figure>
				<?php if ($post->post_content != '') { ?>
					<div class="mh-attachment-content entry-content mh-clearfix">
						<?php the_content(); ?>
					</div>
				<?php } ?>
			</article><?php
			mh_after_post_content();
			comments_template();
		endwhile; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>