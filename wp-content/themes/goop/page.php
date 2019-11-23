<?php get_header(); ?>
<div class="mh-wrapper mh-clearfix">
    <div id="main-content" class="mh-content" role="main" itemprop="mainContentOfPage"><?php
    	while (have_posts()) : the_post();
			mh_before_page_content();
			get_template_part('content', 'page');
			comments_template();
		endwhile; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>