<?php /* Default template for displaying page content */ ?>
<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title page-title">', '</h1>'); ?>
	</header>
	<div class="entry-content mh-clearfix">
		<?php the_content(); ?>
	</div>
</article>