<?php
/**
 * Template Name: News (no Planet)
 *
 * This template is used to display posts that aren't in
 * the `planet` category.
 *
 * @package 2viLUG
 * @since 1.0.4
 */

get_header(); ?>

<section id="primary" class="content-area col-md-9">

<?php if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>
	<?php $query = new WP_Query( array( 'category__not_in' => array( 'planet' ) ) ); ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php
			/* Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );
		?>

	<?php endwhile; ?>

	<?php melany_content_nav( 'nav-below' ); ?>

<?php else : ?>

	<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif; ?>

</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
