<?php
/**
 * 2viLUG functions and definitions
 *
 * @package 2viLUG
 */

/**
 * Exclude `planet` category from blog posts index page.
 *
 * @since 1.0.5
 */
function melany_exclude_category($wp_query) {
	// If this is not the blog posts index page, don't do anything.
	if ( ! is_home() )
		return;

	// Get `planet` category
	$planet = get_category_by_slug( 'planet' );
	// Get ID
	$planet_id = $planet->term_id;

	// Add the category to an array of excluded categories
	$excluded = array( '-' . $planet_id );

	// Cleaner way to write `$wp_query->set('category__not_in', $excluded);
	set_query_var( 'category__not_in', $excluded );
}
add_action( 'pre_get_posts', 'melany_exclude_category' );