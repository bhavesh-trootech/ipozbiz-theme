<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package bookworm
 */
?>

<footer class="site-footer_v3">
    <div class="bg-gray-200">
        <div class="space-top-3">
            <div class="pb-5 space-bottom-lg-1">
                <div class="container">
                    <div class="row footer-top-row">
                        <div class="col-lg-4 mb-4 mb-lg-0 column-1-footer">
                            <div class="pb-md-2 pb-lg-6">
                               <?php //bookworm_contact_info(); ?>
                               <?php echo bookworm_footer_logo(); ?>
                               <?php  
                               $address_1 = apply_filters('bookworm_site_address_1', get_theme_mod( 'bookworm_address_1', '1418 River Drive, Suite 35 Cottonhall, CA 9622' ));
                               $address_2 = apply_filters('bookworm_site_address_2', get_theme_mod( 'bookworm_address_2', 'United States' ) ); 

                             if ( ! empty( $address_1 ) || ! empty( $address_2 ) ) :
                            ?><address class="font-size-2 mb-5">
                                <span class="mb-2 font-weight-normal text-dark">
                                <?php echo get_bloginfo( 'name' ); ?><br>
                                <?php
                                    echo esc_html( $address_1 );
                                    if ( ! empty( $address_2 ) ) {
                                        printf( '<br>' . esc_html( $address_2 ) );
                                    }
                                ?>
                                </span>
                            </address><?php
                            endif;
                               ?>
                               <?php echo bookworm_contact_links(); ?>
                               <?php echo bookworm_social_media_links(); ?>
                            </div>
                        </div>
                        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                            <div class="col-lg-3 mb-4 mb-lg-0 column-2-footer">
                                <?php dynamic_sidebar( 'footer-1' ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                            <div class="col-lg-5 mb-0 mb-lg-0 column-3-footer">
                                <?php dynamic_sidebar( 'footer-2' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php $copyright_text = apply_filters( 'bookworm_copyright', get_theme_mod( 'bookworm_copyright_text', sprintf( esc_html__( '%s %s. All Rights Reserved', 'bookworm' ), date( 'Y' ), get_bloginfo( 'name' ) ) ) ); ?>
            <div class="space-1 border-top border-gray-210">
                <div class="container subFooter">
                    <div class="d-lg-flex text-center text-lg-left justify-content-between align-items-center leftTxtFoo">
                    <!-- Copyright -->
                    <p class="mb-3 mb-lg-0 font-size-2"><?php echo esc_html( $copyright_text ); ?></p>
                    <!-- End Copyright -->
                   </div>
                    
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    jQuery(document).ready(function($) {
        function updateWishlistCount() {
            $.ajax({
            url: pld_js_object.admin_ajax_url, // WordPress AJAX URL
            type: 'POST',
            data: {
                action: 'update_wishlist_count', // Custom AJAX action name
            },
            success: function(response) {
                console.log(response);
                $('span.wishlist-count').text(response);
            },
            });
        }

        $('i.flaticon-heart').on('click', function() {
            if(!$(this).closest(".yith-wcwl-add-to-wishlist").hasClass("exists")){
                console.log('not exit');
                updateWishlistCount();
            }
        });
        
        $('.topbar__nav--right a#sidebarNavToggler-my_cart').on('click', function() {
            $('body').addClass('activeminiCart');
        });
        $('aside#offcanvasCart .close').on('click', function() {
            $('body').removeClass('activeminiCart');
        });
    });
</script>

<?php wp_footer(); ?>

</body>
</html>