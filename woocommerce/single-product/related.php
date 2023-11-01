<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products space-bottom-3">
		<div class="container">

			<?php
			$termsauthorIds = array();
			$book_author_values = get_the_terms(get_the_ID(), 'pa_book-author');
	        	foreach ( $book_author_values as $book_author ) {
	            $termsauthorIds[] = $book_author->term_id;
	        	}
			$termscatIds = array();
		  	$book_cat = get_the_terms(get_the_ID(), 'product_cat');
	       	foreach ( $book_cat as $book_catdata ) {
	            	$termscatIds[] = $book_catdata->term_id;
	       	}

			$arg_qry1 = array(
					'post_type' => 'product',
					'post_status' => 'publish',
					'order' =>'DESC',
					'posts_per_page' => 10,
					'post__not_in' => array(get_the_ID()),
					'tax_query' => array(					
						array (
							'taxonomy' => 'pa_book-author',
							'field' => 'term_id',
							'terms' => $termsauthorIds
						)
					)
				) ;

		    $related_products1 = get_posts($arg_qry1);
		    $arg_qry2 = array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'order' =>'DESC',
				'posts_per_page' => 10,
				'post__not_in' => array(get_the_ID()),
				'tax_query' => array(					
					array (
						'taxonomy' => 'product_cat',
						'field' => 'term_id',
						'terms' => $termscatIds
					)
				)
			) ;
			$related_products2 = get_posts($arg_qry2);			
			if (empty($related_products1)) {
				$related_products = $related_products2;
			 } elseif (count($related_products1) != 4) {
				$related_products = array_merge($related_products1, $related_products2);
			 } else {
				$related_products = $related_products1;
			 }	
			 
			$heading = apply_filters( 'woocommerce_product_related_products_heading', esc_html__( 'Related products', 'bookworm' ) );

			if ( !empty($related_products) ) : ?>
				<header class="mb-5 d-md-flex justify-content-between align-items-center">
					<h2 class="font-size-5 mb-3 mb-md-0"><?php echo esc_html( $heading ); ?></h2>
				</header>
			<?php endif; ?>

          	<div class="customRelated">
				<?php woocommerce_product_loop_start(); ?>
				
					<?php foreach ($related_products as $related_product ) : 
						   
							$post_object = get_post( $related_product->ID);

							setup_postdata( $GLOBALS['post'] =& $post_object );

							wc_get_template_part( 'content', 'product' );
							?>

					<?php endforeach; 
						wp_reset_postdata();
					
					?>
				
				<?php woocommerce_product_loop_end(); ?>
			</div>
		</div>
	</section>
	<?php
endif;

wp_reset_postdata();
