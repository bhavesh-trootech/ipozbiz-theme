<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit;


?>
<div class="container py-4 py-lg-5 my-4">
	<div class="mx-md-auto">
		<?php wc_print_notice( esc_html__( 'Password reset email has been sent.', 'bookworm' ) ); ?>
		<div class="pt-5 mt-md-2 pb-5">
			<p><?php echo esc_html( apply_filters( 'woocommerce_lost_password_confirmation_message', esc_html__( 'A password reset email has been sent to the email address. Please wait at least 10 minutes before attempting another reset.', 'bookworm' ) ) ); ?></p>
		</div>
	</div>
</div>



