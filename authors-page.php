<?php /* Template Name: Authors List */ ?>
<?php
get_header(); ?>

    <main id="main" class="site-main<?php if ( bookworm_is_woocommerce_activated() && ( is_cart() || is_checkout() ) ):?> bg-punch-light space-bottom-3<?php endif; ?>" role="main">

        <?php
            while ( have_posts() ) :

                the_post();

                //do_action( 'bookworm_page_before' );

                //get_template_part( 'templates/contents/content', 'page' );

                /**
                 * Functions hooked in to bookworm_page_after action
                 *
                 * @hooked bookworm_display_comments - 10
                 */
                //do_action( 'bookworm_page_after' );

            endwhile; // End of the loop.
        ?>

        <div id="post-<?php the_ID(); ?>">
        	<?php 
        	$banner_image_inner = get_field("banner_image_inner");
        	?>
        	<?php if(!empty($banner_image_inner)){ ?>
        	<div class="commonBannner  bwgb-4a3169a innerPgBanner">
             <div class="home-slide slick-active">
                 
              <div class="overlay-slide"></div>
              <div class="banner-img">
               <img src="<?php echo esc_url($banner_image_inner['url']); ?>">
              </div>
               
              <div class="wp-block-bwgb-hero-carousel-1__inner space-2 space-lg-0 container slideContainer bwgb-4352db1 test4 ">
              <div class="media-body mr-wd-4 align-self-center  mb-md-0">

                <h1 class="hero__title font-size-14 mb-4" data-scs-animation-in="fadeInUp" data-scs-animation-delay="200" data-scs-animation-duration="1000">
                  <span class="bwgb-hero-carousel-1__title hero__title-line-1 font-weight-regular d-block"><p><?php echo the_title(); ?></p></span>
                </h1>
              </div>
              </div>

             </div> 
         </div>
     <?php } ?>

     <div class="article__content article__content--page container">
            <div class="page__content">
                <div class="albhabetList">
                    <ul>
                        <?php foreach (range('A', 'Z') as $charAplha) { ?>
                        <li><a href="#<?php echo $charAplha; ?>"><?php echo $charAplha; ?></a></li>
                       <?php } ?>
                    </ul>
                </div>


		        <div class="authorLists">
		        	<?php
		        	$taxonomy = 'pa_book-author';

			        foreach (range('A', 'Z') as $char) { ?>
			        	<div class="authorlistsCol">
                            <div class="idAnchordiv" id="<?php echo $char; ?>"><?php echo $char; ?></div>
			            <h3 class="<?php echo $char; ?>"><?php echo $char; ?></h3>
			            <div class="listAuthors">
			            <?php display_attribute_terms_by_letter($taxonomy, $char); ?>
			            </div>
			           </div>
			           <?php } ?>
		        </div>
            </div>
    </div>

    </main><!-- #main -->

    <script>
jQuery(document).ready(function() {
  jQuery('.albhabetList a[href^="#"]').on('click', function(event) {
    event.preventDefault();
    console.log("helop");
    
    var target = jQuery(jQuery(this).attr('href'));
    var offset = 200; // Adjust this value to your desired offset
    
    if (target.length) {
      jQuery('html, body').animate({
        scrollTop: target.offset().top-offset
      }, 1000); // Adjust the animation duration as needed
    }
  });
});
</script>

<script>

        // Handle redirection with an offset when loading the page with a hash link
        jQuery(document).ready(function () {
            var hash = window.location.hash;
            if (hash) {
                var target = jQuery(hash);
                console.log(target);
                if (target.length) {
                    jQuery('html, body').animate({
                        scrollTop: target.offset().top-200 // Change the offset as needed
                    }, 1000); // Adjust the scrolling duration as needed
                }
            }
        });
    </script>

<?php

get_footer();


