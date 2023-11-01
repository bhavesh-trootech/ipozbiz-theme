<?php
/**
 * Bookworm Child
 *
 * @package bookworm-child
 */

/**
 * Include all your custom code here
 */

function custom_enqueue(){
   wp_enqueue_style('animate-min-css', get_stylesheet_directory_uri() . '/css/animate.min.css', array(), '1.0.0', 'all' );
   wp_enqueue_style('custom-css', get_stylesheet_directory_uri() . '/css/custom.css', array(), (string) time(), 'all' );
   wp_enqueue_style('customdev-css', get_stylesheet_directory_uri() . '/css/customdev.css', array(), (string) time(), 'all' );
   wp_enqueue_style('fixing-css', get_stylesheet_directory_uri() . '/css/customfix.css', array(), (string) time(), 'all' );
   wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array(), (string) time(), true );

   wp_enqueue_script('custom-ajax-login', get_stylesheet_directory_uri() . '/js/custom-ajax-login.js', array('jquery'), (string) time(), true);
   wp_localize_script('custom-ajax-login', 'custom_ajax_login_params', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'security' => wp_create_nonce('custom_ajax_login_nonce'),
  ));
   
}
add_action('wp_enqueue_scripts', 'custom_enqueue');

//include custom file
include get_stylesheet_directory() . '/inc/custom-functions.php';

function addskypelinkFooter() {
?>   
<style>.archive.woocommerce-shop.woocommerce form.woocommerce-ordering{
    display: none;
}</style>
     <script type="text/javascript">         
          jQuery(document).ready(function(){
               jQuery('input[type="tel"]').keypress
               (
               function(event)
               {
                    if (event.keyCode == 46 || event.keyCode == 8)
                    {
                    //do nothing
                    }
                    else 
                    {
                         if (event.keyCode < 48 || event.keyCode > 57 ) 
                         {
                              event.preventDefault();
                         }
                    }
               }
               );
               // wishlist update and remove text 
               var txttt = jQuery(".yith-wcwl-add-button a.delete_item").html('<i class="yith-wcwl-icon fa fa-heart"></i>');
               jQuery( document ).on( "ajaxComplete", function() {
                    var txttticonq = jQuery(".yith-wcwl-add-button a.delete_item").html('<i class="yith-wcwl-icon fa fa-heart"></i>');                                       
               } ); 

               jQuery('#menu-social-menu #menu-item-10976 .link-black-100').attr('href','skype:reiterdr');     
               jQuery('.faq-accordion .card:nth-child(1) .card-header button').trigger('click');
               jQuery('.recent-post-carousel').slick({
                    autoplay: true,
                    autoplaySpeed: 5000,
                    slidesToShow: 3,
                    dots:false,
                    arrows: true,
                    infinite: true,
                    prevArrow: '<div class="js-prev u-slick__arrow u-slick__arrow-centered--y d-none d-xl-block fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10 slick-arrow"></div>',
                    nextArrow: '<div class="js-next u-slick__arrow u-slick__arrow-centered--y d-none d-xl-block fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10 slick-arrow"></div>',
                    responsive: [
                         {
                              breakpoint: 1024,
                              settings: {
                                   slidesToShow: 2,
                                   slidesToScroll: 2,
                              }
                         },
                         {
                              breakpoint: 600,
                              settings: {
                                   slidesToShow: 2,
                                   slidesToScroll: 2,                                  
                              }
                         },
                         {
                              breakpoint: 480,
                              settings: {
                                   slidesToShow: 1,
                                   slidesToScroll: 1,                                   
                              }
                         }

                    ]
               });

               jQuery('.author-services-carousel').slick({
                    //autoplay: true,
                    //autoplaySpeed: 1000,
                    slidesToShow: 4,
                    dots:false,
                    arrows: true,
                    infinite: true,
                    prevArrow: '<div class="js-prev u-slick__arrow u-slick__arrow-centered--y d-none d-xl-block fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10 slick-arrow"></div>',
                    nextArrow: '<div class="js-next u-slick__arrow u-slick__arrow-centered--y d-none d-xl-block fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10 slick-arrow"></div>',
                    responsive: [
                         {
                              breakpoint: 1024,
                              settings: {
                                   slidesToShow: 2,
                                   slidesToScroll: 2,
                              }
                         },
                         {
                              breakpoint: 600,
                              settings: {
                                   slidesToShow: 2,
                                   slidesToScroll: 2,                                  
                              }
                         },
                         {
                              breakpoint: 480,
                              settings: {
                                   slidesToShow: 1,
                                   slidesToScroll: 1,                                   
                              }
                         }

                    ]
               });         

               /****/
               //product carosel
               jQuery('.productLoopSliderNew').slick({
                    autoplay: true,
                    autoplaySpeed: 2000,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    centerMode: true,
                    centerPadding: '3px',
                    dots:false,
                    arrows: true,
                    infinite: true,
                    prevArrow: '<div class="js-prev u-slick__arrow u-slick__arrow-centered--y d-none d-xl-block fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10 slick-arrow"></div>',
                    nextArrow: '<div class="js-next u-slick__arrow u-slick__arrow-centered--y d-none d-xl-block fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10 slick-arrow"></div>',
                    responsive: [
                         {
                              breakpoint: 1480,
                              settings: {
                                   slidesToShow: 4,
                                   slidesToScroll: 1,
                              }
                         },
                         {
                              breakpoint: 1200,
                              settings: {
                                   slidesToShow: 3,
                                   slidesToScroll: 3,
                              }
                         },
                         {
                              breakpoint: 600,
                              settings: {
                                   slidesToShow: 2,
                                   slidesToScroll: 2, 
                                   centerPadding: '1px',                                 
                              }
                         },
                         {
                              breakpoint: 480,
                              settings: {
                                   slidesToShow: 1,
                                   slidesToScroll: 1,
                                   centerPadding: '1px',                                  
                              }
                         }

                    ]
               });


               //product carosel
               jQuery('.imprintSliderNew').slick({
                    autoplay: true,
                    autoplaySpeed: 2000,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                    centerPadding: '3px',
                    dots:false,
                    arrows: true,
                    infinite: true,
                    prevArrow: '<div class="js-prev u-slick__arrow u-slick__arrow-centered--y d-none d-xl-block fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10 slick-arrow"></div>',
                    nextArrow: '<div class="js-next u-slick__arrow u-slick__arrow-centered--y d-none d-xl-block fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10 slick-arrow"></div>',
               });
               /****/      
                  jQuery('.customRelated ul').slick({
                 autoplay: true,
                 autoplaySpeed: 2000,
                  slidesToShow: 4,
                  slidesToScroll: 1,
                   infinite: true,
                  arrows: true,
                  dots: false,
                 prevArrow: '<div class="js-prev u-slick__arrow u-slick__arrow-centered--y d-none d-xl-block fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10 slick-arrow"></div>',
                 nextArrow: '<div class="js-next u-slick__arrow u-slick__arrow-centered--y d-none d-xl-block fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10 slick-arrow"></div>',
                  responsive: [{
                         breakpoint: 1281,
                         settings: {
                           slidesToShow: 3,
                           slidesToScroll: 1
                         }
                       },
                       {
                          breakpoint: 801,
                          settings: {
                             slidesToShow: 2,
                             slidesToScroll: 1
                          }
                       },
                       {
                          breakpoint: 601,
                          settings: {
                             slidesToShow: 1,
                             slidesToScroll: 1
                          }
                       }]

                });

               /****/
               jQuery('header#site-header #searchform').submit(function() {
                var searchInput = jQuery(this).find('input[type="text"]');
                searchInput.val(searchInput.val().trim()); // Trim leading and trailing spaces
               });
             /****/

          });                
     </script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
     <!-- <script async defer src="//assets.pinterest.com/js/pinit.js"></script> -->
     <?php if(is_page('quaker-publications')){?>          
          
          <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
          <script>
          jQuery('.backhouse-gallery-slider').slick({
               dots: true,
               arrows: false,
               slidesToShow: 1,
               slidesToScroll: 1,
               autoplay: true,
               infinite: true,

          });          

          jQuery('.modal').on('shown.bs.modal', function (e) {
               jQuery('.backhouse-gallery-slider').slick('setPosition');
               jQuery('.wrap-modal-slider').addClass('open');
          });
          
          </script>
    <?php } ?>
    <?php if(is_product()){?>
          <script>
               jQuery(document).ready(function(){
                    jQuery('.single-product .variations tr:nth-child(2)').css('display','none');
                    //jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-pb").click();
                    setTimeout(function(){ 
                         jQuery('.single-product .variations ul li').removeClass('disabled');
                    }, 2000);
                    if( jQuery(".single-product .variations ul[data-attribute_name='attribute_pa_editions'] li.button-variable-item-ebook").hasClass("selected")){
                         jQuery('.single-product .variations tr:nth-child(2)').css('display','block');
                         jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-pb").css('display','none');
                         jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-hb").css('display','none'); 
                         jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-audiobk").css('display','none');  
                    }

                    jQuery(".single-product .variations ul[data-attribute_name='attribute_pa_editions'] li").click(function(){                        
                         jQuery(".single-product .variations a.reset_variations").trigger('click');
                         if(jQuery(this).hasClass("button-variable-item-pb")){ 
                              //b dev
                              jQuery(".woocommerce-variation-add-to-cart").removeClass("quantityHide");
                              jQuery(".woocommerce-variation-add-to-cart .quantity-wrap.js-quantity").show();
                               //End b dev
                              jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-pb").css('display','block');                             
                              setTimeout(function(){                                
                              jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-pb").addClass('selected');                            
                              jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-pb").click();
                             }, 1000);                             
                             jQuery('.single-product .variations tr:nth-child(2)').css('display','none');
                              
                         }else if(jQuery(this).hasClass("button-variable-item-ebook")){ 
                              //b dev
                              jQuery(".woocommerce-variation-add-to-cart").addClass("quantityHide");
                              jQuery(".woocommerce-variation-add-to-cart .quantity-wrap.js-quantity").hide();
                              //End b dev
                              jQuery('.single-product .variations tr:nth-child(2)').css('display','block');
                              if (jQuery("body").hasClass("postid-14597")) {
                              jQuery("table.variations tr:nth-child(2) li:nth-child(2)").click();
                              }                             
                              jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-pb").css('display','none');
                              jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-hb").css('display','none'); 
                              jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-audiobk").css('display','none');                              
                              
                         }else if(jQuery(this).hasClass("button-variable-item-hb")){ 
                              //b dev
                              jQuery(".woocommerce-variation-add-to-cart").removeClass("quantityHide");
                              jQuery(".woocommerce-variation-add-to-cart .quantity-wrap.js-quantity").show();
                               //End b dev
                              jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-hb").css('display','block');                             
                              setTimeout(function(){                                
                              jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-hb").addClass('selected');                            
                              jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-hb").click();
                             }, 1000);                             
                             jQuery('.single-product .variations tr:nth-child(2)').css('display','none');

                         }else if(jQuery(this).hasClass("button-variable-item-audiobk")){ 
                              //b dev
                              jQuery(".woocommerce-variation-add-to-cart").addClass("quantityHide");
                              jQuery(".woocommerce-variation-add-to-cart .quantity-wrap.js-quantity").hide();
                               //End b dev
                              jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-audiobk").css('display','block');                             
                              setTimeout(function(){                                
                              jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-audiobk").addClass('selected');                            
                              jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li.button-variable-item-audiobk").click();
                             }, 1000);                            
                             jQuery('.single-product .variations tr:nth-child(2)').css('display','none');

                         }

                    });
                    jQuery(".single-product .variations tr:nth-child(2) ul[data-attribute_name='attribute_pa_options'] li").click(function(){
                         setTimeout(function(){ 
                              jQuery('.single-product .variations ul li').removeClass('disabled');
                         }, 300);
                    });
               });

          </script>
   <?php } 
   
   if(is_checkout()){ ?>

     <script>          
          jQuery( window ).on( "load", function() {
               var textoftaxes = jQuery(".woocommerce-checkout .wp-block-woocommerce-checkout-order-summary-block .wp-block-woocommerce-checkout-order-summary-taxes-block span.wc-block-components-totals-item__label").text();
               var taxlabel = "Tax (10% GST)";
               //jQuery(".woocommerce-checkout .wp-block-woocommerce-checkout-order-summary-block .wp-block-woocommerce-checkout-order-summary-taxes-block span.wc-block-components-totals-item__label").before('<span class="wc-block-components-totals-item__label customlabel2">Tax (10% GST)</span>');
               if(textoftaxes == '' || textoftaxes == 'Taxes'){                    
                    jQuery(".woocommerce-checkout .wp-block-woocommerce-checkout-order-summary-block .wp-block-woocommerce-checkout-order-summary-taxes-block span.wc-block-components-totals-item__label").text(taxlabel);
               }               
          });                          
     </script>

  <?php  }   
   ?>
<?php
}
add_action( 'wp_footer', 'addskypelinkFooter' );

// short codes for quaker publication page
function display_page_content_shortcode($atts) {     
     $atts = shortcode_atts(array(
         'page_id' => '', 
         'section_type' => '',
     ), $atts);
     $content = "";
     $page_id = $atts['page_id'];
     $section_type = $atts['section_type'];
     if($section_type == 'publication'){
          $qukerpb_heading = get_field('quaker_publications_title',$page_id,false);
          $content.= "
          <h3 class='wp-block-heading'>".$qukerpb_heading."</h3>
          <div class='wp-block-columns is-layout-flex wp-container-14 wp-block-columns-is-layout-flex quackersPubs'>";
               
          if( have_rows('quaker_publications_data',$page_id) ):
               $i = 1;
               while( have_rows('quaker_publications_data',$page_id) ) : the_row();
               
                    $image = get_sub_field('quaker_publications_image');
                    $question = get_sub_field('quaker_publications_question');
                    $answer = get_sub_field('quaker_publications_answer');
                    $answer_without_br = preg_replace('/<br\s?\/?>/i', '', $answer);
                    $answer1 = (strlen($answer_without_br) > 150)?substr($answer_without_br,0,110)."... <a class='readlnk' data-toggle='modal' data-target='.qpbd-example-modal-lg".$i."' href='onclick='return false;'>Read More</a>" : $answer_without_br;

                    $content.= "<div class='wp-block-column is-layout-flow wp-block-column-is-layout-flow customcls1'>
                         <div class='wp-block-columns is-layout-flex wp-container-12 wp-block-columns-is-layout-flex newSection3'>
                              <div class='wp-block-column is-layout-flow wp-block-column-is-layout-flow customcls2'>
                              <img src='".$image."'>
                              </div>
                              <div class='wp-block-column is-layout-flow wp-block-column-is-layout-flow customcls3'>
                                   <h3>".$question."</h3>
                                   <p>".$answer1."</p>                                                            
                              </div>                              

                              <div class='modal fade qpbd-example-modal-lg".$i."' tabindex='-".$i."' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
                                   <div class='modal-dialog modal-lg'>
                                        <div class='modal-content'>
                                             <div class='modal-header'>        
                                              <button type='button' class='btn-close' data-dismiss='modal' aria-label='Close'>X</button>
                                             </div>
                                             <div class='wp-block-columns is-layout-flex wp-container-12 wp-block-columns-is-layout-flex newSection4'>
                                                  <div class='wp-block-column is-layout-flow wp-block-column-is-layout-flow customcls4'>
                                                       <h3>".$question."</h3>
                                                       <img src='".$image."'>
                                                       <p>".$answer."</p>                                                                           
                                                  </div> 
                                             </div>                                          
                                        </div>
                                   </div>
                              </div>
                         </div>     
                    </div>";
                    if ($i % 2 == 0) {                              
                         $content .= "</div><div class='wp-block-columns is-layout-flex wp-container-14 wp-block-columns-is-layout-flex'>";
                    }

                    $i++;
               
               endwhile;   
          endif;                    

          if ($i % 2 != 1) {
          $content .= "</div>";
          }
     }

     if($section_type == 'backhouse'){
          $backhouse_heading = get_field('james_backhouse_lectures_title',$page_id,false);
          $backhouse_subheading = get_field('james_backhouse_lectures_sub_title',$page_id,false);
          $content.= "
                    <h3 class='wp-block-heading'>".$backhouse_heading."</h3>
                    <p>".$backhouse_subheading."</p>
               
               <div class='wp-block-columns is-layout-flex wp-container-14 wp-block-columns-is-layout-flex backhouse-section'>";
               
                    if( have_rows('james_backhouse_lectures_data',$page_id) ):
                         $j = 1;
                         while( have_rows('james_backhouse_lectures_data',$page_id) ) : the_row();
                                                
                              $question = get_sub_field('james_backhouse_lectures_question');
                              $answer = get_sub_field('james_backhouse_lectures_answer');
                              $answer_without_br = preg_replace('/<br\s?\/?>/i', '', $answer);
                              $answer1 = (strlen($answer_without_br) > 150)?substr($answer_without_br,0,110)."... <a class='readlnk' data-toggle='modal' data-target='.bhbd-example-modal-lg".$j."' href='onclick='return false;'>Read More</a>" : $answer_without_br;
                              
                              $content.= "<div class='wp-block-column is-layout-flow wp-block-column-is-layout-flow customcls4'>
                                   <div class='wp-block-columns is-layout-flex wp-container-12 wp-block-columns-is-layout-flex newSection1'>   
                                        <div class='wp-block-column is-layout-flow wp-block-column-is-layout-flow customcls5'> 
                                             <ul class='backhouse-gallery-slider'>";
                                             if( have_rows('james_backhouse_lectures_images') ):                                            
                                                  while( have_rows('james_backhouse_lectures_images') ) : the_row();
                                                       $image = get_sub_field('james_backhouse_lectures_image');    
                                                       $content.= "<li><img src='".$image."'></li>";                                        
                              
                                                  endwhile;   
                                             endif;       
                                        $content.= "
                                             </ul>
                                        </div>
                                        <div class='wp-block-column is-layout-flow wp-block-column-is-layout-flow customcls6'>
                                             <h3>".$question."</h3>
                                             <p>".$answer1."</p>                                                            
                                        </div>                              

                                        <div class='modal fade bhbd-example-modal-lg".$j."' tabindex='-".$j."' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
                                             <div class='modal-dialog modal-lg'>
                                                  <div class='modal-content'>                                                  
                                                       <div class='modal-header'>        
                                                            <button type='button' class='btn-close' data-dismiss='modal' aria-label='Close'>X</button>
                                                       </div>
                                                       <div class='wp-block-columns is-layout-flex wp-container-12 wp-block-columns-is-layout-flex newSection2'>
                                                            <div class='wp-block-column is-layout-flow wp-block-column-is-layout-flow customcls7'>
                                                                 <h3>".$question."</h3>
                                                                 <div class='wrap-modal-slider'>
                                                                 <ul class='backhouse-gallery-slider'>";
                                                                           if( have_rows('james_backhouse_lectures_images') ):                                            
                                                                                while( have_rows('james_backhouse_lectures_images') ) : the_row();
                                                                                     $image = get_sub_field('james_backhouse_lectures_image');    
                                                                                     $content.= "<li><img src='".$image."'></li>";                                        
                                                            
                                                                                endwhile;   
                                                                           endif;  
                                                                 $content.= "
                                                                      </ul>
                                                                 </div>
                                                                 <p>".$answer."</p>                                                                           
                                                            </div> 
                                                       </div>                                                                                              
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              ";
                              if ($j % 2 == 0) {                              
                                   $content .= "</div><div class='wp-block-columns is-layout-flex wp-container-14 wp-block-columns-is-layout-flex sectionNew6'>";
                              }
                              $j++;
                         
                         endwhile;   
                    endif;                    

          if ($j % 2 != 1) {
           $content .= "</div>";
          }
     }
     
     return $content; 
 }
 add_shortcode('display_page_content', 'display_page_content_shortcode');
 //[display_page_content page_id="123" section_type="publication/backhouse"]
 // blog post slider
function recent_blog_posts_slider_shortcode($atts) {
     //ob_start(); // Start output buffering
 
     // Query recent blog posts
     $query_args = array(
         'posts_per_page' => 10, // Adjust the number of posts to display
         'post_type' => 'post',
         'orderby' => 'date',
         'order' => 'DESC',
         'category__not_in' => array( 3330 )
     );
     $recent_posts = new WP_Query($query_args);
 
     if ($recent_posts->have_posts()) {
         // Output the slider HTML
         $output = '<div class="recent-blog-posts-slider">';
         $output .= '<div class="wp-block-bwgb-products-carousel bwgb-products-carousel space-bottom-3 bwgb-products-carousel__style-v2">
         <div class="wp-block-bwgb-products-carousel__inner container">
           <header class="mb-5 justify-content-between align-items-center bwgb-products-carousel__block-header d-md-flex ">
             <h2 class="bwgb-products-carousel__block-title font-size-7 mb-3 mb-md-0">'.get_field( "ip_blogs_title", 9758 ).'</h2>
             <a href="'.home_url().'/blog" class="h-primary d-block bwgb-products-carousel__block-action-text">
               <span>'.get_field( "view_all_text", 9758 ).'</span>
               <i class="flaticon flaticon-next ml-1"></i>
             </a>
           </header>
           <div class="wp-block-bwgb-products-carousel__content">
               <div class="recent-post-carousel">';
               
                    while ($recent_posts->have_posts()) {
                         $recent_posts->the_post();
                         $content = wp_strip_all_tags(get_the_content());
                         //$excerpt = substr($content, 0, 150);
                         $wordlength = wp_trim_words($content, 25);
                         $contentN = str_replace('&nbsp;', '', $wordlength);

                         $output.=' <div class="post-slide">
                              <div class="post-image"><a href="'.get_permalink().'"> <img src="'.get_the_post_thumbnail_url().'"></a></div>
                              <div class="post-title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>
                              <p class="post-content">'.$contentN.'</p>
                    </div>';
               }              
                    
              $output.='</div>        
         </div>
       </div>';
       $output.= '</div>'; 
     }
 
     wp_reset_postdata(); // Reset post data
 
    // $output = ob_get_clean(); // Get the buffered output
     return $output;
}
 add_shortcode('recent_posts_slider', 'recent_blog_posts_slider_shortcode');
/****/
 // Event post slider
function recent_event_posts_slider_shortcode($atts) {
     //ob_start(); // Start output buffering
 
     // Query recent blog posts
     $event_query_args = array(
         'post_type' => 'events',
         'post_status' => 'publish',
         'posts_per_page' => 10, // Adjust the number of posts to display
         'order' => 'DESC',

     );
     $recent_event_posts = new WP_Query($event_query_args);
 
     if ($recent_event_posts->have_posts()) {
         // Output the slider HTML
         $output = '<div class="recent-blog-posts-slider">';
         $output .= '<div class="wp-block-bwgb-products-carousel bwgb-products-carousel space-bottom-3 bwgb-products-carousel__style-v2">
         <div class="wp-block-bwgb-products-carousel__inner container">
           <header class="mb-5 justify-content-between align-items-center bwgb-products-carousel__block-header d-md-flex ">
             <h2 class="bwgb-products-carousel__block-title font-size-7 mb-3 mb-md-0">'.get_field( "ip_events_title", 9758 ).'</h2>
             <a href="'.home_url().'/blog" class="h-primary d-block bwgb-products-carousel__block-action-text">
               <span>'.get_field( "view_all_text", 9758 ).'</span>
               <i class="flaticon flaticon-next ml-1"></i>
             </a>
           </header>
           <div class="wp-block-bwgb-products-carousel__content">
               <div class="recent-post-carousel">';
               
                    while ($recent_event_posts->have_posts()) {
                         $recent_event_posts->the_post();
                         $content = wp_strip_all_tags(get_the_content());

                         $excerpt = substr($content, 0, 150);
                         $wordlength = wp_trim_words($excerpt, 25);
                         $contentN = str_replace('&nbsp;', '', $wordlength);

                         $output.=' <div class="post-slide">
                              <div class="post-image"><a href="'.get_permalink().'"> <img src="'.get_the_post_thumbnail_url().'"></a></div>
                              <div class="post-title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>
                              <p class="post-content">'.$contentN.'</p>
                    </div>';
               }              
                    
              $output.='</div>        
         </div>
       </div>';
       $output.= '</div>'; 
     }
 
     wp_reset_postdata(); // Reset post data
 
    // $output = ob_get_clean(); // Get the buffered output
     return $output;
}
 add_shortcode('recent_event_slider', 'recent_event_posts_slider_shortcode');
/***End Event shortcode homepage***/

  // Author services section for home
function hmauthor_services_shortcode($atts) {
     //ob_start(); // Start output buffering
     $atts = shortcode_atts(array(
          'page_id' => ''
      ), $atts);
      
      $page_id = $atts['page_id'];
      if( have_rows('auther_service_faq_data',$page_id) ){
          $author_heading = get_field('author_heading',$page_id,false);
          $author_sub_heading = get_field('author_sub_heading',$page_id,false);
         // Output the slider HTML
         $output = '<div class="author-services-section">';
         $output .= '<div class="wp-block-bwgb-products-carousel bwgb-products-carousel space-bottom-3 bwgb-products-carousel__style-v2">
         <div class="wp-block-bwgb-products-carousel__inner container">
           <header class="mb-5 justify-content-between align-items-center bwgb-products-carousel__block-header d-md-flex ">
          <span class="heading-link">
             <h2 class="bwgb-products-carousel__block-title font-size-7 mb-3 mb-md-0">
             '.$author_heading.'
             </h2>
             <a href="'.home_url().'/author-services" class="h-primary d-block bwgb-products-carousel__block-action-text">
               <span>'.get_field( "view_all_text", 9758 ).'</span>
               <i class="flaticon flaticon-next ml-1"></i>
             </a>
          </span>
             <span>'.$author_sub_heading.'</span>             
           </header>
           <div class="wp-block-bwgb-products-carousel__content">
               <div class="author-services-carousel">';
               
               while( have_rows('auther_service_faq_data',$page_id) ) { the_row();
                         $question = get_sub_field('auther_service_faq_question');
                         $answer = get_sub_field('auther_service_faq_answer'); 
                         $image = get_sub_field('auther_service_image');
                         $answer_without_br = preg_replace('/<br\s?\/?>/i', '', $answer);
                         $answer1 = (strlen($answer_without_br) > 150)?substr($answer_without_br,0,110)."... <a class='readlnk' href='".home_url()."/author-services'>Read More</a>" : $answer_without_br;
                         $output.=' <div class="post-slide">
                              <div class="post-image"><a href="'.home_url().'/author-services"> <img src="'.$image.'"></a></div>
                              <div class="post-title"><a href="'.home_url().'/author-services">'.$question.'</a></div>
                              <p class="post-content">'.$answer1.'</p>
                    </div>';
               }              
                    
              $output.='</div>        
         </div>
       </div>';
       $output.= '</div>'; 
     }
      return $output;
}
 add_shortcode('author_services_hm', 'hmauthor_services_shortcode');

// Faq section for inner pages
function inpfaq_services_shortcode($atts) { 
      $atts = shortcode_atts(array(
          'page_id' => ''
      ), $atts);
      $page_id = $atts['page_id'];
    ob_start();
    ?> 
      <!-- Accordion -->
      <?php if( have_rows('faq',$page_id) ): ?>
      <div id="accordionExample" class="accordion">
      <?php $x = 1;  $y = 1; while( have_rows('faq',$page_id) ): the_row();
       $faq_label = get_sub_field('faq_label');
       $faq_detail = get_sub_field('faq_detail');
       $resultExp = ($x == 1) ? "true" : " false";
       ?>
        <!-- Accordion item 1 -->
        <div class="card">
          <div id="heading<?php echo $x; ?>" class="card-header bg-white  border-0">
            <h2 class="mb-0">
              <button type="button" data-toggle="collapse" data-target="#collapse<?php echo $y; ?>" aria-expanded="<?php $resultExp; ?>"
                aria-controls="collapse<?php echo $y; ?>"
                class="btn btn-link text-dark font-weight-bold text-uppercase collapsible-link"><?php echo $faq_label; ?></button>
            </h2>
          </div>
          <div id="collapse<?php echo $y; ?>" aria-labelledby="heading<?php echo $x; ?>" data-parent="#accordionExample" class="collapse <?php if($x==1){ echo "show"; } ?>">
            <div class="card-body p-5">
              <?php echo $faq_detail; ?>
            </div>
          </div>
        </div><!-- End -->
     <?php $x++;  $y++; endwhile; ?>
      </div><!-- End -->
<?php endif; ?> 

    <?php
    return ob_get_clean();
}
add_shortcode('faq_services_inp', 'inpfaq_services_shortcode');

   // selected category list section for home
function hmcat_list_shortcode($atts) {     
     $atts = shortcode_atts(array(
          'page_id' => ''
      ), $atts);
      
      $page_id = $atts['page_id'];
      
      $output = '<div class="wp-block-bwgb-product-categories bwgb-product-categories space-bottom-3 bwgb-14713b5 bwgb-product-categories__style-v1 custom_category_listhm">
               <div class="wp-block-bwgb-product-categories__inner container">
               <header class="bwgb-products-category__block-header d-md-flex justify-content-between align-items-center mb-5">
                    <h2 class="bwgb-products-carousel__block-title font-size-7 mb-3 mb-md-0">'.get_field( "genres_heading", $page_id ).'</h2>
                    <a href="'.home_url().'/category-list" class="h-primary d-block bwgb-products-category__block-action-text bwgb-product-category__block-title">
                    <span>'.get_field( "all_categories_text", $page_id ).'</span>
                    <i class="flaticon flaticon-next font-size-3 ml-2"></i>
                    </a>
               </header>
               <div class="wp-block-bwgb-product-categories__content">                  
                    <ul class="list-unstyled my-0 row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-6 row-cols-wd-6">';
                        $genres_listarg = get_field('genres_list',$page_id,false);
                        $class_names = array('bg-tangerine-light', 'bg-chili-light', 'bg-tangerine-light', 'bg-punch-light','bg-carolina-light');
                        $counter = 0;
                        
                        foreach($genres_listarg as $genres_listiteam){
                              $term_id = $genres_listiteam;
                              $term_link = get_term_link($term_id);
                              $term = get_term_by('term_id', $term_id, 'product_cat'); 
                              $cat_icon = get_term_meta($term_id, 'icon', true); 
                              if($cat_icon){
                                   $cat_icon = get_term_meta($term_id, 'icon', true); 

                              }else{
                                   $cat_icon = 'flaticon-baby-boy';
                              } 
                              
                              $class_name = $class_names[$counter % count($class_names)]; 

                              $output.= ' <li class="product-category col mb-6">
                              <div class="bwgb-cat__item product-category__inner bwgb-products-category__bg-2 '.$class_name.' px-6 py-5">
                                   <div class="product-category__icon font-size-12  text-tangerine">
                                        <i class="'.$cat_icon.' bwgb-products-category__icon-2"></i>
                                   </div>
                                   <div class="product-category__body">
                                        <h3 class="bwgb-products-category__category-title text-truncate font-size-3">
                                        <a href="'.$term_link.'" class="bwgb-products-category__category-title stretched-link text-dark">'.$term->name.'</a>
                                        </h3>
                                        <a href="'.$term_link.'" class="stretched-link bwgb-products-category__shop-now-text text-dark">Shop Now</a>
                                   </div>
                                   </div>
                              </li>';

                              $counter++;
                         }

          $output .= ' </ul>                    
                    </div>
               </div>
          </div>';
      return $output;
}
 add_shortcode('selected_category_list', 'hmcat_list_shortcode');
 
add_filter( 'single_product_archive_thumbnail_size', function( $size ) {
     return 'full';
} );
/****/
//home banner slider 
function home_banner_slider_shortcode() {
     ob_start();
    ?> 
   <?php if( have_rows('banner_data') ): ?>
   <div class="sliderHome commonBannner bwgb-4a3169a">
<?php while( have_rows('banner_data') ): the_row(); 
        $banner_image = get_sub_field('banner_image');
        $banner_title = get_sub_field('banner_title');
        $banner_content = get_sub_field('banner_content');
        $banner_content_2 = get_sub_field('banner_content_2');
        $banner_button_link = get_sub_field('banner_button_link');
        ?>
         <div class="home-slide">
          <div class="overlay-slide"></div>
          <div class="banner-img">
               <img src="<?php echo $banner_image; ?>">
          </div>

          <div class="wp-block-bwgb-hero-carousel-1__inner space-2 space-lg-0 container slideContainer bwgb-4352db1">
          <div class="media-body mr-wd-4 align-self-center mb-4 mb-md-0">
          <!-- <?php //if(!empty($banner_title)): ?>
            <p class="bwgb-hero-carousel-1__pre-title hero__pretitle text-uppercase font-weight-bold text-gray-400 mb-2" data-scs-animation-in="fadeInUp" data-scs-animation-delay="200" data-scs-animation-duration="1000" style="opacity: 1; animation-delay: 200ms; animation-duration: 1000ms;"><?php //echo $banner_title; ?></p>
          <?php //endif; ?> -->

            <h1 class="hero__title font-size-14 mb-4" data-scs-animation-in="fadeInUp" data-scs-animation-delay="200" data-scs-animation-duration="1000" style="opacity: 1; animation-delay: 200ms; animation-duration: 1000ms;"><?php if(!empty($banner_content)): ?>
              <span class="bwgb-hero-carousel-1__title hero__title-line-1 font-weight-regular d-block"><?php echo $banner_content; ?></span>
              <?php endif; ?>
              <?php if(!empty($banner_content_2)): ?>
              <span class="bwgb-hero-carousel-1__title-2 hero__title-line-2 font-weight-bold d-block"><?php echo $banner_content_2; ?></span>
              <?php endif; ?>
            </h1>
           <?php if(!empty($banner_button_link['url'])): ?>
            <a target="<?php echo $banner_button_link['target']; ?>" class="bwgb-hero-carousel-1__button hero__btn4 bwgb-button btn btn-primary-home-v3" href="<?php echo $banner_button_link['url']; ?>" rel="" tabindex="-1" style="opacity: 1;">
              <span><?php echo $banner_button_link['title']; ?></span>
            </a>
            <?php endif; ?>
          </div>
          </div>

         </div>
          <?php endwhile; ?>  
  </div>
  <?php endif; ?>

  <script type="text/javascript">         
     jQuery(document).ready(function(){
          jQuery('.sliderHome').slick({
               dots: true,
               arrows: true,
               slidesToShow: 1,
               slidesToScroll: 1,
               autoplay: false,
               infinite: true,
               prevArrow: '<div class="js-prev u-slick__arrow u-slick__arrow-centered--y d-none d-xl-block fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10 slick-arrow"></div>',
               nextArrow: '<div class="js-next u-slick__arrow u-slick__arrow-centered--y d-none d-xl-block fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10 slick-arrow"></div>'
          });
     });
  </script>

    <?php
    return ob_get_clean();
}
 add_shortcode('home_banner_slider', 'home_banner_slider_shortcode');
/***End home banner***/

add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {
     if ( is_front_page() ) {
        $classes[] = 'peloaderHome';
    }
     return $classes;
}
/****/

function custom_product_tabs_new( $tabs ) {
    // Add a new tab
    $tabs['more_info'] = array(
        'title'    => __( 'More Info', 'bookworm-childn' ),
        'priority' => 10,
        'callback' => 'custom_tab_content_new',
    );

    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'custom_product_tabs_new' );

function custom_tab_content_new() {     
     $product_id = get_the_ID(); 
     $product = wc_get_product($product_id);
     $attributes = $product->get_attributes();
     if (!empty($attributes)) {
          foreach ($attributes as $attribute) {          
               $attribute_name = $attribute->get_name();
               $attribute_values = $attribute->get_options();
               if($attribute_name == 'pa_book-author'){                    
                    foreach ($attribute_values as $value_id) {                   
                         $term = get_term_by('id', $value_id, 'pa_book-author');
                         echo '<div class="img-box">';                     
                         if ($term) {                        
                              $term_id =  $term->term_id;
                              $sample = get_field('sample', 'pa_book-author_' . $term_id);
                              $thumbnail_url = get_field('thumbnail', 'pa_book-author_' . $term_id);
                              echo '<div class="text">'; 
                              echo '<div class="heading"><h2>' .$term->name. '</h2></div>';
                              if($thumbnail_url){
                                   echo '<div class="author-img"><img src="'.$thumbnail_url.'"></div>';
                              } 
                                                         
                              echo '<p>'.$term->description.'</p>';
                              echo'</div>';
                              
                              if( have_rows('social_list','pa_book-author_' . $term_id) ):
                                   echo '<div class="link-box">
                                        <div class="heading">';
                                        echo '<h2>Links</h2></div>';
                                        echo'<ul>';
                                        while ( have_rows('social_list','pa_book-author_' . $term_id) ) : the_row();
                                             $social_name = get_sub_field('social_name'); 
                                             $social_link = get_sub_field('social_link'); 
                                             echo '<li><a href = "'.$social_link.'">'.$social_name.'</a></li>';                              
                                        endwhile;  
                                        echo'</ul>';   
                                   echo'</div>';                         
                              else :
                              
                              endif;
                              if($sample){
                                   echo '<div class="content-box">
                                        <div class="heading">';
                                             echo '<h2>Sample</h2></div>';
                                             echo '<p>'.$sample.'</p>';
                                        echo'</div>';
                              }
                         } 
                         echo'</div>';
                    }
               }
               /****/
               if($attribute_name == 'pa_illustrator'){                    
                    foreach ($attribute_values as $value_id) {                   
                         $term = get_term_by('id', $value_id, 'pa_illustrator');
                         echo '<div class="img-box">';                     
                         if ($term) {                        
                              $term_id =  $term->term_id;
                              $sample = get_field('sample', 'pa_illustrator_' . $term_id);
                              $thumbnail_url = get_field('thumbnail', 'pa_illustrator_' . $term_id);
                              echo '<div class="text">'; 
                              echo '<div class="heading"><h2>' .$term->name. '</h2></div>';
                              if($thumbnail_url){
                                   echo '<div class="author-img"><img src="'.$thumbnail_url.'"></div>';
                              } 
                                                         
                              echo '<p>'.$term->description.'</p>';
                              echo'</div>';
                              
                              if( have_rows('social_list','pa_illustrator_' . $term_id) ):
                                   echo '<div class="link-box">
                                        <div class="heading">';
                                        echo '<h2>Links</h2></div>';
                                        echo'<ul>';
                                        while ( have_rows('social_list','pa_illustrator_' . $term_id) ) : the_row();
                                             $social_name = get_sub_field('social_name'); 
                                             $social_link = get_sub_field('social_link'); 
                                             echo '<li><a href = "'.$social_link.'">'.$social_name.'</a></li>';                              
                                        endwhile;  
                                        echo'</ul>';   
                                   echo'</div>';                         
                              else :
                              
                              endif;
                              if($sample){
                                   echo '<div class="content-box">
                                        <div class="heading">';
                                             echo '<h2>Sample</h2></div>';
                                             echo '<p>'.$sample.'</p>';
                                        echo'</div>';
                              }
                         } 
                         echo'</div>';
                    }
               }
               /****/
          }
     } else {
     // No attributes found
     echo 'No author attributes found for this product.';
     }

}
function remove_woo_elements(){
     remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
}
add_action('wp_head', 'remove_woo_elements');

add_action( 'woocommerce_archive_description', 'wc_category_description' );
function wc_category_description() {
     
     global $wp_query;         
     $archivedata = $wp_query->get_queried_object();
     if($archivedata->taxonomy == 'pa_book-author'){               
          $term = get_term_by('id', $archivedata->term_id, 'pa_book-author'); 
          $term_id =  $term->term_id;
          $sample = get_field('sample', 'pa_book-author_' . $term_id);
          $thumbnail_url = get_field('thumbnail', 'pa_book-author_' . $term_id);
          echo '<h2>' .$term->name. '</h2>';
          if($thumbnail_url){
               echo '<p><img src="'.$thumbnail_url.'"></p>';
          }                             
          echo '<p>'.$term->description.'</p>';
          
          if( have_rows('social_list','pa_book-author_' . $term_id) ):
               echo '<div class="linkheadings">Links</div>';
               while ( have_rows('social_list','pa_book-author_' . $term_id) ) : the_row();
                    $social_name = get_sub_field('social_name'); 
                    $social_link = get_sub_field('social_link'); 
                    echo '<p><a href = "'.$social_link.'">'.$social_name.'</a></p>';                              
               endwhile;                              
          else :
          
          endif;
          if($sample){
               echo '<div class="sampleheading">Sample</div>';
               echo '<p>'.$sample.'</p>';
          }
     }
     //book illustrator code
     if($archivedata->taxonomy == 'pa_illustrator'){               
          $term = get_term_by('id', $archivedata->term_id, 'pa_illustrator'); 
          $term_id =  $term->term_id;
          $sample = get_field('sample', 'pa_illustrator_' . $term_id);
          $thumbnail_url = get_field('thumbnail', 'pa_illustrator_' . $term_id);
          echo '<h2>' .$term->name. '</h2>';
          if($thumbnail_url){
               echo '<p><img src="'.$thumbnail_url.'"></p>';
          }                             
          echo '<p>'.$term->description.'</p>';
          
          if( have_rows('social_list','pa_illustrator_' . $term_id) ):
               echo '<div class="linkheadings">Links</div>';
               while ( have_rows('social_list','pa_illustrator_' . $term_id) ) : the_row();
                    $social_name = get_sub_field('social_name'); 
                    $social_link = get_sub_field('social_link'); 
                    echo '<p><a href = "'.$social_link.'">'.$social_name.'</a></p>';                              
               endwhile;                              
          else :
          
          endif;
          if($sample){
               echo '<div class="sampleheading">Sample</div>';
               echo '<p>'.$sample.'</p>';
          }
     }
     /****/           
     
}
// Variation price with tax or without tax base on currency 
add_filter( 'woocommerce_available_variation', 'my_variation', 10, 3);
function my_variation( $data, $product, $variation ) {
     $price_excl_tax = wc_get_price_excluding_tax($variation); 
     $price_incl_tax = wc_get_price_including_tax($variation); 
     $tax_amount     = $price_incl_tax - $price_excl_tax; 

     $location = array(          
          'country'   => 'AU',        
     );
      
     $output = ''; 
      
     foreach ( wc_get_product_tax_class_options() as $tax_class => $tax_class_label ) {      
          
          $tax_rates = WC_Tax::find_rates( array_merge( $location, array('tax_class' => $tax_class) ) );     
          
          if( ! empty($tax_rates) ) {
              $rate_id      = array_keys($tax_rates);
              $rate_data    = reset($tax_rates);      
              $rate_id      = reset($rate_id);        
              $rate         = $rate_data['rate']; 
              $output = $rate;
          }
     }          
     $multiCurrencySettings = WOOMULTI_CURRENCY_Data::get_ins();
     $currentCurrency = $multiCurrencySettings->get_current_currency(); 
     if ($currentCurrency == 'AUD' && !empty($output)){        
               $defualtprice = ($output*$price_excl_tax)/100;
               $gstprice = wc_price($price_excl_tax+$defualtprice)." (GST-inc)"; 
     }else{             
          $gstprice = wc_price($price_excl_tax);
     }
     
     
    $data['price_html'] .= "<span class='price inc-tax-price'>" . $gstprice . "</span>";
    return $data;
}


// Auto Add handle Fee On Cart Data
add_action( 'woocommerce_cart_calculate_fees','auto_add_tax_for_room', 10, 1 );
function auto_add_tax_for_room( $cart ) {
    if ( is_admin() && ! defined('DOING_AJAX') ) return;

    $multiCurrencySettings = WOOMULTI_CURRENCY_Data::get_ins();
    $wmcCurrencies = $multiCurrencySettings->get_list_currencies();
    $currentCurrency = $multiCurrencySettings->get_current_currency();
    $currentCurrencyRate = floatval($wmcCurrencies[$currentCurrency]['rate']);  
    $amount = '3.50';
    $handlefee = $currentCurrencyRate * $amount;          
    $cart->add_fee( __( 'Handle Fee', 'woocommerce'), $handlefee, false );
    
}

/****/
//add_filter('woocommerce_product_categories', 'custom_product_categories', 10, 3);
function custom_product_categories($categories, $args){
    $categories = array(1383, 1460, 1382);
    return $categories; 
}
//add_action('woocommerce_add_to_cart' , 'set_country_befor_cart_page'); 
function set_country_befor_cart_page(){  
    WC()->customer->set_billing_country('AU');
    WC()->customer->set_shipping_country('AU');
}

/* Function which remove Plugin Update Notices wishlist*/
// function disable_plugin_updates( $value ) {
//      unset( $value->response['yith-woocommerce-wishlist/init.php'] );
//      return $value;
// }
//add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );

function custom_missing_username_error_message($translated_text, $text, $domain) {
    if ($text == 'Username is required.') {
        $translated_text = 'Email is required.';
    }
    if ($text == 'Unknown email address. Check again or try your username.') {
        $translated_text = 'Unknown email address. Please try correct email.';
    }
    if ($text == 'Invalid username or email.') {
        $translated_text = 'Invalid email.';
    }
    if ($text == 'Not enough data to create this user.') {
        $translated_text = 'Invalid email.';
    }
    return $translated_text;
}
add_filter('gettext', 'custom_missing_username_error_message', 100, 3);

/** 
 * cart item title modify
 * Callback function to modify the item title 
**/
function custom_modify_cart_item_title($title, $cart_item, $cart_item_key) {   
     
     $keywords = array(', PB', ', HB', ', audiobk', ', audio');
     foreach ($keywords as $keyword) {
         if (strpos($title, $keyword) !== false) {             
             $parts = explode($keyword, $title);             
             if (count($parts) >= 1) {                
                 return $parts[0];
             }
         }
     }  
     return $title;
}
 
add_filter('woocommerce_cart_item_name', 'custom_modify_cart_item_title', 10, 3);
 /****/

 add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<a class="js-plus text-dark" href="javascript:;">
   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="10px">
       <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M10.000,5.000 L6.000,5.000 L6.000,10.000 L5.000,10.000 L5.000,5.000 L-0.000,5.000 L-0.000,4.000 L5.000,4.000 L5.000,-0.000 L6.000,-0.000 L6.000,4.000 L10.000,4.000 L10.000,5.000 Z"></path>
   </svg>
</a>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<a class="js-minus text-dark">
   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="1px">
       <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M-0.000,-0.000 L10.000,-0.000 L10.000,1.000 L-0.000,1.000 L-0.000,-0.000 Z"></path>
   </svg>
</a>';
}
  
// -------------
// 2. Trigger update quantity script
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
 
   if (! is_cart() ) return;
    
   wc_enqueue_js( "   
           
      $(document).on( 'click', 'a.js-plus, a.js-minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.js-plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   " );
}
/****/
add_filter( 'woocommerce_redirect_single_search_result', '__return_false' );
/*****/
add_filter('woocommerce_order_item_name', 'custom_modify_order_item_name', 10, 3);
function custom_modify_order_item_name($name, $item, $is_visible) {
    // You can modify the order item name here

    $namePB = ', PB';
    if(strpos($name, $namePB) !== false){
    $name = str_replace(", PB","","$name");
    }

    $nameHb = ', HB';
    if(strpos($name, $nameHb) !== false){
    $name = str_replace(", HB","","$name");
    }

    $nameaudiobk = ', audiobk';
    if(strpos($name, $nameaudiobk) !== false){
    $name = str_replace(", audiobk","","$name");
    }

    $nameaudiobk = ', audio';
    if(strpos($name, $nameaudiobk) !== false){
    $name = str_replace(", audio","","$name");
    }
    
    return $name;
}
/****/
function display_attribute_terms_by_letter($taxonomy, $letter) {
    // Get all terms for the specified attribute taxonomy.
    $terms = get_terms($taxonomy, array('hide_empty' => false));

    // Check if there are terms.
    if (!empty($terms)) {
        echo '<ul>';
        foreach ($terms as $term) {
            // Check if the term name starts with the specified letter.
            if (strtoupper(substr($term->name, 0, 1)) === strtoupper($letter)) {
                echo '<li><a href="'.get_term_link($term->slug, 'pa_book-author').'">' . esc_html($term->name) . '</a></li>';
            }
        }
        echo '</ul>';
    } else {
        echo 'No terms found.';
    }
}
/****/

function authors_by_alphabet() {
    ob_start();
    ?> 
    <div class="albhabetList">
          <ul>
              <?php foreach (range('A', 'Z') as $charAplha) { ?>
              <li><a href="<?php echo home_url("/authors"); ?>#<?php echo $charAplha; ?>"><?php echo $charAplha; ?></a></li>
             <?php } ?>
          </ul>
      </div>
    <?php
    return ob_get_clean();
}
add_shortcode('authors_by_alphabet', 'authors_by_alphabet');

/****/
function ip_attribute_where( $where = '' ) {
          global $wpdb;

          $attribute = 'pa_book-author';

                    $where .= " OR $wpdb->posts.ID IN (SELECT $wpdb->posts.ID 
                    FROM $wpdb->posts
                    LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
                    LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
                    LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
                    WHERE $wpdb->posts.post_type = 'product' 
                    AND $wpdb->posts.post_status = 'publish'
                    AND $wpdb->term_taxonomy.taxonomy = '" . esc_sql( $attribute ) . "'
                    AND $wpdb->terms.name LIKE '%" . get_search_query() . "%')";

          return $where;
     }
/****/

function ipattribute_search_filter( $query ) {
          if ( is_admin() ) {
               return $query;
          }

          if ( $query->is_search() && get_search_query() ) {
               add_filter( 'posts_where', 'ip_attribute_where' );
          }

          return $query;
     }
//add_filter( 'pre_get_posts', 'ipattribute_search_filter' );
/****/

/****/
function modify_order_item_name_ip($item_id, $item, $order_id) {
    // Check if this is the order item you want to modify (e.g., based on product ID).
    // Replace 14243 with the actual product ID you want to target.

     $order = wc_get_order($order_id);

if (!$order) {
    echo "Order not found.";
} else {
    // Loop through order items
    foreach ($order->get_items() as $item_id => $item_data) {
        // Get the product name (item title)
        $product_name = $item_data->get_name();

       $namePB = ', PB';
         if(strpos($product_name, $namePB) !== false){
         $product_name = str_replace(", PB","","$product_name");
         }

         $nameHb = ', HB';
         if(strpos($product_name, $nameHb) !== false){
         $product_name = str_replace(", HB","","$product_name");
         }

         $nameaudiobk = ', audiobk';
         if(strpos($product_name, $nameaudiobk) !== false){
         $product_name = str_replace(", audiobk","","$product_name");
         }

         $nameaudiobk = ', audio';
         if(strpos($product_name, $nameaudiobk) !== false){
         $product_name = str_replace(", audio","","$product_name");
         }

         $item->set_name($product_name);
        $item->save();
    }
}

}
add_action('woocommerce_new_order_item', 'modify_order_item_name_ip', 10, 3);
/****/
//disabled specific plugin update
function disable_plugin_updates_ipsite( $value ) {
   unset( $value->response['search-attributes-for-woocommerce/search-attributes-for-woocommerce.php'] );
   return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates_ipsite' );
/****/
function ip_custom_product_general_fields() {
    woocommerce_wp_text_input(
        array(
            'id' => 'page_length',
            'label' => __('Page Length', 'bookworm-child'),
            'description' => __('', 'bookworm-child'),
        )
    );
}
add_action('woocommerce_product_options_general_product_data', 'ip_custom_product_general_fields');
/****/
// Save custom field data
function save_custom_product_general_fields_ip($post_id) {
    $page_length_value = isset($_POST['page_length']) ? sanitize_text_field($_POST['page_length']) : '';
    update_post_meta($post_id, 'page_length', $page_length_value);
}
add_action('woocommerce_process_product_meta', 'save_custom_product_general_fields_ip');
/****/