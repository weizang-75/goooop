<?php
get_header(); ?>
	<main id="primary" class="site-main">
	<?php
	if ( have_posts() ) :
		if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
		<?php
		endif;
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'archive' );
		endwhile;
		the_posts_navigation( array(
			'prev_text'          => business_theme_get_icon_svg( is_rtl() ? 'chevron_right' : 'chevron_left' ) . __( 'Older posts', 'business_theme' ),
			'next_text'          => __( 'Newer posts', 'business_theme' ) . business_theme_get_icon_svg( is_rtl() ? 'chevron_left' : 'chevron_right' ),
		) ) ;
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif; ?>
	</main>
<?php
get_footer();
