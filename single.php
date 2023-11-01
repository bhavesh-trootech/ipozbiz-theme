<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bookworm
 */

get_header();

while ( have_posts() ) :
	the_post();

	/**
	 * Fires before the single post content
	 */
	do_action( 'bookworm_single_post_before' );?>
	<div class="col-lg-8 col-xl-9">
		<?php get_template_part( 'templates/blog/content', 'single' );?>
	</div>
	<div class="col-lg-4 col-xl-3 sidebar widget-area blog-sidebar">	
		<div id="widgetAccordion">
			<?php dynamic_sidebar( 'sidebar-single' ); ?>
		</div>
	</div>
	<?php 	
	/**
	 * Fires after the single post content
	 */
	do_action( 'bookworm_single_post_after' );

endwhile;
get_footer();
