<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="product_meta">
    
    <?php do_action( 'woocommerce_product_meta_start' ); ?>
    
    <?php if ( bookworm_enable_product_meta_display() ) : ?>
        <div class="table-responsive">
            <table class="table table-hover table-borderless mb-0">
            <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

                <tr class="sku_wrapper">
                    <th class="px-4 px-xl-5">
                        <?php esc_html_e( 'SKU:', 'bookworm' ); ?> 
                    </th>
                    <td>
                        <span class="sku"><?php echo wp_kses_post( ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'bookworm' ) ); ?></span>
                    </td>
                </tr>

            <?php endif; ?>
            
            <?php 
            $isbnNumGen[] = get_post_meta($product->get_id(), '_alg_ean',true); 

            if ($product->is_type('variable')) {
                $variations = $product->get_available_variations();
                foreach ($variations as $variation) {
                    $variation_id = $variation['variation_id'];
                    $isbnNumVariation[] = get_post_meta($variation_id, '_alg_ean',true);
                }
            }

           if( !empty($isbnNumGen[0]) && !empty($isbnNumVariation[0]) ){
           $isbnNumbersMerg = array_merge($isbnNumGen, $isbnNumVariation);
           } elseif( !empty($isbnNumGen[0]) && empty($isbnNumVariation[0]) ){   //checked
            $isbnNumbersMerg = $isbnNumGen;
           }elseif( empty($isbnNumGen[0]) && !empty($isbnNumVariation[0]) ){
            $isbnNumbersMerg = $isbnNumVariation;
           }else{
            $isbnNumbersMerg = [];
           }

           $isbnNumbersUniq = array_unique($isbnNumbersMerg);
           $isbnNumbers = implode(", ", $isbnNumbersUniq);
            ?>

            <?php if(!empty($isbnNumbers)): ?>
            <tr class="tagged_as custom-isbn">
                <th class="px-4 px-xl-5">ISBN:</th>
                <td><?php echo $isbnNumbers; ?></td>
            </tr>
           <?php endif; ?>

            <?php echo wc_get_product_category_list( $product->get_id(), ', ', '<tr class="posted_in"><th class="px-4 px-xl-5">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'bookworm' ) . '</th><td>', '</td></tr>' ); ?>

            <?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<tr class="tagged_as"><th class="px-4 px-xl-5">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'bookworm' ) . '</th><td>', '</td></tr>' ); ?>
            <?php $page_length = get_post_meta($product->get_id(), 'page_length', true); ?>
            <?php if(!empty($page_length)): ?>
            <tr class="tagged_as pageLength">
                <th class="px-4 px-xl-5">Page Length:</th>
                <td><?php echo $page_length; ?></td>
            </tr>
           <?php endif; ?>
            </table>
        </div>

    <?php else: ?>

    	

    	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

    		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'bookworm' ); ?> <span class="sku"><?php echo wp_kses_post(( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'bookworm' )); ?></span></span>

    	<?php endif; ?>

    	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'bookworm' ) . ' ', '</span>' ); ?>

    	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'bookworm' ) . ' ', '</span>' ); ?>

    	

    <?php endif; ?>

    <?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
