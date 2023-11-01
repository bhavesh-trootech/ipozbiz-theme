<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
// Get the prices
$price_excl_tax = wc_get_price_excluding_tax( $product ); // price without VAT
//$price_incl_tax = wc_get_price_including_tax( $product );  // price with VAT
//$tax_amount     = $price_incl_tax - $price_excl_tax; // VAT amount

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

?>
<!-- <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p> -->
<?php if( $product->is_type( 'simple' ) ){?>
  
  <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> price-incl"><?php echo $gstprice; ?></p>
  
<?php } elseif( $product->is_type( 'variable' ) ){
    
}

