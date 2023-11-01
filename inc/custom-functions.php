<?php
//dropdown of authors sidebar
function author_shortcode() {
    ob_start();
    $prod_id = get_the_ID();
    $book_author_values = get_the_terms( $prod_id, 'pa_book-author');
    ?> 
    <select id="selectbox" name="" onchange="javascript:location.href = this.value;">
	    <option value="">Select Author</option>
	    <?php
	    foreach ( $book_author_values as $book_author ) {
	     ?>
	     <option value="<?php echo get_term_link($book_author->slug, 'pa_book-author'); ?>"><?php echo $book_author->name; ?></option>
		<?php } ?>
	</select>
    <?php
    return ob_get_clean();
}
//add_shortcode('product_author_lists', 'author_shortcode');
/****/

$terms = get_terms( array(
    'taxonomy'   => 'pa_book-author',
    'hide_empty' => true,
) );

//dropdown of all authors
function authorlist_shortcode() {
    ob_start();
    $prod_id = get_the_ID();
    $termsAuthors = get_terms( array(
    'taxonomy'   => 'pa_book-author',
    'hide_empty' => true,
    ) );
    ?> 
    <select id="selectbox" name="" onchange="javascript:location.href = this.value;">
	    <option value="">Select Author</option>
	    <?php
	    foreach ( $termsAuthors as $term_authors ) {
	     ?>
	     <option value="<?php echo get_term_link($term_authors->slug, 'pa_book-author'); ?>"><?php echo $term_authors->name; ?></option>
		<?php } ?>
	</select>
    <?php
    return ob_get_clean();
}
add_shortcode('all_author_lists', 'authorlist_shortcode');
/****/
function event_custom_post_type() {
  
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Events', 'Events', 'bookworm-child' ),
        'singular_name'       => _x( 'Events', 'Events', 'bookworm-child' ),
        'menu_name'           => __( 'Events', 'bookworm-child' ),
        'parent_item_colon'   => __( 'Parent Event', 'bookworm-child' ),
        'all_items'           => __( 'All Events', 'bookworm-child' ),
        'view_item'           => __( 'View Event', 'bookworm-child' ),
        'add_new_item'        => __( 'Add New Event', 'bookworm-child' ),
        'add_new'             => __( 'Add New', 'bookworm-child' ),
        'edit_item'           => __( 'Edit Event', 'bookworm-child' ),
        'update_item'         => __( 'Update Event', 'bookworm-child' ),
        'search_items'        => __( 'Search Event', 'bookworm-child' ),
        'not_found'           => __( 'Not Found', 'bookworm-child' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'bookworm-child' ),
    );
      
// Set other options for Custom Post Type
      
    $argsEvents = array(
        'label'               => __( 'events', 'bookworm-child' ),
        'description'         => __( 'Events news and reviews', 'bookworm-child' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( 'events', $argsEvents );
  
}
add_action( 'init', 'event_custom_post_type', 0 );

//list event sidebar
function list_event_sidebar() {
    ob_start(); ?>
    <?php 
     $args = array(  
        'post_type' => 'events',
        'post_status' => 'publish',
        'posts_per_page' => 5, 
        'order' => 'DESC', 
    );

    $loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post();
   $event_date = get_field("event_date");
     ?>
     <div class="displayImages d-flex mb-5 bookworm-recent-post post-13459 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized tag-1800s tag-1900s tag-australia tag-book tag-britain tag-cornwall tag-dianne-griffin tag-family-history tag-history tag-history-of-agery tag-migration tag-moonta tag-re-immigration tag-resettlement">
      <a href="<?php the_permalink(); ?>" class="widget-post-thumb d-block mr-3">
        <?php 
        if ( has_post_thumbnail() ) {
                the_post_thumbnail('thumbnail', ['class' => 'img-fluid rounded height-80 max-width-80 mb-0 wp-post-image', 'title' => 'Feature image']);
            }
            ?>
      </a>
      <div class="body-content">
        <h6 class="blog-entry-title text-lh-md crop-text-2 mb-1">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h6>
        <span class="post-date font-size-2 text-secondary-gray-700"><?php echo $event_date; ?></span>
      </div>
    </div>
        
    <?php endwhile;
    wp_reset_postdata(); ?>
    <?php
    return ob_get_clean();
}
add_shortcode('list_event_sidebar', 'list_event_sidebar');
/****/

function custom_related_products_args($args, $product_id) {
    // Add your custom argument
    $book_author_values = get_the_terms( $product_id, 'pa_book-author');
                 foreach ( $book_author_values as $book_author ) {
                    $termsIds[] = $book_author->term_id;
                 }
    $args = new WP_Query( array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'order' =>'DESC',
                    'posts_per_page' => 2,
                    'tax_query' => array(
                        array (
                            'taxonomy' => 'pa_book-author',
                            'field' => 'term_id',
                            'terms' => $termsIds
                        )
                    ),
                ) );


    return $args;
}
//add_filter('woocommerce_get_related_products_args', 'custom_related_products_args', 10, 2);
/****/
function ipoze_dev_frontend_output_success(  $form_data, $fields, $entry_id ) {
       
        // Reset the fields to blank
        unset(
            $_GET[ 'wpforms_return' ],
            $_POST[ 'wpforms' ][ 'id' ]
        );
 
        // Uncomment this line out if you want to clear the form field values after submission
        unset( $_POST[ 'wpforms' ][ 'fields' ] );
 
        // Actually render the form.
        wpforms()->frontend->output( $form_data[ 'id' ] );
  
}
 
add_action( 'wpforms_frontend_output_success', 'ipoze_dev_frontend_output_success', 10, 3 );
/*****/

//products by tags shortcode slick carosel
function product_custom_slider_by_tag( $atts) {

    $atts = shortcode_atts(array(
        'tag' => '',
        'tgnme' => '',
        'rgurl' =>'',
     ), $atts);
     $tagSlug = $atts['tag'];
     $tagName = $atts['tgnme'];
     $tagUrl = $atts['rgurl'];

    ob_start();  
    ?>

    <?php 
     $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_tag',
                'field' => 'slug',
                'terms' => $tagSlug,
            ),
        ),
    );
    
    // Create the WP_Query object
    $products_query = new WP_Query( $args ); 
    ?>

  <?php if ( $products_query->have_posts() ) : ?>
    <div class="wp-block-bwgb-products-carousel bwgb-products-carousel space-bottom-3 custom-pro-image bwgb-25c0d12 bwgb-products-carousel__style-v2 <?php if(!is_front_page()){ echo "imprintCarosel"; } ?>">
  <div class="wp-block-bwgb-products-carousel__inner container">
    <?php if(is_front_page()): ?>
    <header class="mb-5 justify-content-between align-items-center bwgb-products-carousel__block-header d-md-flex ">
      <h2 class="bwgb-products-carousel__block-title font-size-7 mb-3 mb-md-0"><?php echo $tagName; ?></h2>
      <a href="<?php echo $tagUrl; ?>" class="h-primary d-block bwgb-products-carousel__block-action-text">
        <span><?php echo get_field( "view_all_text", 9758 ); ?></span>
        <i class="flaticon flaticon-next ml-1"></i>
      </a>
    </header>
   <?php endif; ?>
    <div class="wp-block-bwgb-products-carousel__content">
      <div>
        <div class="woocommerce columns-3 ">
    <?php if(is_front_page()){
        $sliderCls = "productLoopSliderNew";
    }else{
      $sliderCls = "imprintSliderNew";
    } ?>
   <div class="<?php echo $sliderCls; ?> u-slick u-slick--equal-height u-slick products no-gutters border-left border-top border-right">
<?php
    while ( $products_query->have_posts() ) : $products_query->the_post();
        $productId = get_the_ID();
        $product = wc_get_product($productId);
        $product_type = $product->get_type();
    ?>
     <div class="js-slide product type-product post-14891 status-publish first instock product_cat-interactive-press product_cat-poetry product_cat-trending product_tag-australian-authors product_tag-interactive product_tag-interactive-press-new product_tag-poetry product_tag-trading-now has-post-thumbnail taxable shipping-taxable purchasable product-type-variable add-to-wishlist-after_add_to_cart slick-slide">
       <div class="product__inner overflow-hidden p-3 p-md-4d875 w-100">
         <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
           <div class="woocommerce-loop-product__thumbnail">
             <a href="<?php echo get_the_permalink($productId); ?>" class="d-block bwgb-products-carousel__product-image mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" tabindex="-1">
               <?php the_post_thumbnail( 'full' ); ?>
             </a>
           </div>
           <div class="woocommerce-loop-product__body product__body pt-3  bg-white"></div>
           <?php if(!is_front_page()): ?>
           <div class="author-shows">
           <?php bookworm_wc_template_loop_product_author(); ?>
           </div>
           <?php endif; ?>
           <div class="product__hover d-flex align-items-center">
           <?php if( $product_type === 'simple' ){ ?>
            <a href="/cart/?add-to-cart=<?php echo $productId; ?>&quantity=1" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart text-uppercase text-dark h-dark font-weight-medium mr-auto" title="Add to cart">
                <span class="product__add-to-cart">Add to cart</span>
            </a>  
        <?php } elseif( $product_type === 'variable' ){ ?>
             <a href="<?php echo get_the_permalink($productId); ?>" class="button product_type_variable add_to_cart_button text-uppercase text-dark h-dark font-weight-medium mr-auto">
               <span class="product__add-to-cart">Select options</span>
             </a>
         <?php } ?>                                              

           </div>
         </div>
       </div>
     </div>
 <?php endwhile; ?>
 <?php wp_reset_postdata(); ?>
   </div>
   </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

    <?php
   $output = ob_get_clean();
    return $output;
}
add_shortcode('product-custom-slider-by-tag', 'product_custom_slider_by_tag');
/***/
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}
/****/
//dropdown of all authors
function shop_authorlist_shortcode() {
    ob_start();
    $termsAuthors = get_terms( array(
    'taxonomy'   => 'pa_book-author',
    'hide_empty' => true,
    ) );
    ?> 
    
    <?php if(!empty($termsAuthors)): ?>
    <ul class="woocommerce-widget-layered-nav-list">
        <?php foreach ( $termsAuthors as $term_authors ) {
    
    $productCountArgs = array(
      'post_type' => 'product',
      'tax_query'  => array(
        array(
          'taxonomy' => 'pa_book-author',
          'field'    => 'slug',
          'terms'    => $term_authors->slug
        ),
      )
    );
    $queryNew = new WP_Query( $productCountArgs );
    $count = $queryNew->found_posts;
         ?>
        <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
            <a rel="nofollow" href="<?php echo get_term_link($term_authors->slug, 'pa_book-author'); ?>"><?php echo $term_authors->name; ?></a> <span class="count">(<?php echo $count; ?>)</span>
        </li>
    <?php } ?>
    </ul>
   <?php endif; ?>

    <?php
    return ob_get_clean();
}
add_shortcode('shop_authorlist_shortcode', 'shop_authorlist_shortcode');
/****/

add_action('wp_ajax_update_wishlist_count', 'update_wishlist_count_callback');
add_action('wp_ajax_nopriv_update_wishlist_count', 'update_wishlist_count_callback');

function update_wishlist_count_callback() {
  if (function_exists('YITH_WCWL')) {
    $wishlist_count = YITH_WCWL()->count_products();
    }
  echo $wishlist_count+1;
  wp_die();
}
/****/
add_filter('password_hint', 'change_password_hint');
function change_password_hint($hint) {
  return "The password should be at least 6 characters long. To make it stronger, use upper and lower case letters, numbers, and special characters.";
}

add_filter( 'woocommerce_min_password_strength', 'reduce_min_strength_password_requirement' );
function reduce_min_strength_password_requirement( $strength ) {
    // 3 => Strong (default) | 2 => Medium | 1 => Weak | 0 => Very Weak (anything).
    return 2; 
}

add_action('woocommerce_save_account_details_errors', 'validateProfileUpdate', 10, 2 );
function validateProfileUpdate( $errors, $user ) {

    // change value here to set minimum required password chars
    if(strlen($_POST['password_2']) < 6 && $_POST['password_2'] != '' ) {
        $errors->add( 'woocommerce_password_error', __( 'The password should be at least 6 characters long. To make it stronger, use upper and lower case letters, numbers, and special characters.' ) );
    }
    return $errors;
    }

add_action('woocommerce_password_reset', 'validatePasswordReset', 10, 2 );

function validatePasswordReset( $errors, $user ) {
    // change value here to set minimum required password chars -- uncomment the following two (2) lines to enable that
    if(strlen($_POST['password_3']) < 6  ) {
        $errors->add( 'woocommerce_password_error', __( 'The password should be at least 6 characters long. To make it stronger, use upper and lower case letters, numbers, and special characters.' ) );
    }
    return $errors;
    }

/****/
function ipoz_change_lost_your_password ($text) {
if ($text == 'Lost your password?'){
    $text = 'Forgot password?';
 }
    return $text;
 }
add_filter( 'gettext', 'ipoz_change_lost_your_password' );
/***/
// Register AJAX handler for user registration
add_action('wp_ajax_nopriv_custom_user_registration', 'custom_user_registration');
add_action('wp_ajax_custom_user_registration', 'custom_user_registration');

function custom_user_registration() {
    // Get the submitted data via AJAX
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $emailarr = explode("@",$email);
    $username = $emailarr[0];

    // Perform validation checks
    $errors = array();

    // Check if username is empty
    // if (empty($username)) {
    //     $errors['errormsg'] = 'Please enter a username.';
    // }

    // Check if email is valid and not already registered
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['errormsg'] = 'Please enter a valid email address.';
    } elseif (email_exists($email)) {
        $errors['errormsg'] = 'This email address is already registered.';
    }

    // Check if password is empty or less than 6 characters
    if (empty($password) || strlen($password) < 6) {
        $errors['errormsg'] = 'Password must be at least 6 characters long.';
    }

    // If there are errors, return them as JSON response
    if (!empty($errors)) {
        wp_send_json_error($errors);
    }

    // If no errors, proceed with user registration
    $user_id = wp_create_user($username, $password, $email);

    if (is_wp_error($user_id)) {
       $errors['errormsg'] = 'Error creating user.';
        wp_send_json_error($errors);
    } else {
        // Log the user in after registration
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);

        $successMsg['successmsg'] = 'loginRedirect';
        wp_send_json_success($successMsg);
    }
}
/****/
function custom_ajax_login() {
  // Verify nonce for security
  check_ajax_referer('custom_ajax_login_nonce', 'security');

  // Get login credentials from AJAX request
  $username_email = sanitize_user($_POST['username_email']);
  $password = $_POST['password'];
  $rememberme = isset($_POST['rememberme']) ? true : false;

  // Check if the username/email exists
  $user = get_user_by('login', $username_email);
  if (!$user) {
    $user = get_user_by('email', $username_email);
  }

  if (!$user || !wp_check_password($password, $user->user_pass, $user->ID)) {
    // Invalid credentials
    wp_send_json_error(array('message' => 'Invalid username/email or password.'));
  }

  // Perform the login
  wp_set_auth_cookie($user->ID, $rememberme);
  wp_send_json_success(array('redirect_url' => home_url('/my-account/'))); // Redirect after successful login
}
add_action('wp_ajax_custom_ajax_login', 'custom_ajax_login');
add_action('wp_ajax_nopriv_custom_ajax_login', 'custom_ajax_login');
/****/
function wishlist_plugin_updates( $value ) {
    unset( $value->response['yith-woocommerce-wishlist/init.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'wishlist_plugin_updates' );
/***/