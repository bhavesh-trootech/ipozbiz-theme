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
	$event_date = get_field("event_date");
	$event_start_time = get_field("event_start_time");
	$event_end_time = get_field("event_end_time");
     $event_location = get_field("event_location");
	$day = date('D', strtotime($event_date));
	/**
	 * Fires before the single post content
	 */
	do_action( 'bookworm_single_post_before' );?>
	<div class="col-lg-8 col-xl-9">
		<?php 
		if ( has_post_thumbnail() ) {
				the_post_thumbnail('full', ['class' => 'img-fluid d-block mx-auto wp-post-image', 'title' => 'Feature image']);
			}
			?>       

			<div class="article-post max-width-940 mx-auto bg-white position-relative">
				<div class="article-post__inner mt-n10 mt-md-n13 pt-5 pt-lg-7 px-0 px-md-5 pl-xl-10 pr-xl-8 mb-8">
					<div class="ml-xl-4">        
						<div class="mb-5 mb-lg-7">
            <h6 class="font-size-10 mb-3 crop-text-2 font-weight-medium text-lh-1dot4"><?php the_title(); ?></h6>        
            <div class="single-post-meta text-secondary-gray-700">
            <p><a href="<?php the_permalink(); ?>" class="post-date text-secondary-gray-700"><?php echo $day.", ".$event_date; ?> <?php echo $event_start_time; ?> - <?php echo $event_end_time; ?></a></p>
            <p><strong>Location</strong>: <?php echo $event_location; ?></p>
            </div>       
            </div>
            <div class="evenbtContent">
            	<?php the_content(); ?>
            </div>
        </div></div></div>
<!-- #post-## -->
		
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
