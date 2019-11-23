<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php business_theme_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>


		<div class="featured-image">
			<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
				<?php 
					// print_r ('<pre>');
					// var_dump($page);
					// print_r ('</pre>');
					// if ($page !== 0 && $page != NULL){
						echo get_the_post_thumbnail( $page->ID, 'medium' ); 
					// }
				?>
			</a>
		</div>

	</header>

	


	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php business_theme_entry_footer(); ?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
