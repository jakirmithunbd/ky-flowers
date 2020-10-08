<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	?>
	<div class="quantity">
		
		<label for="<?php echo esc_attr( $input_id ); ?>"><?php esc_html_e( 'QUANTITY', 'woocommerce' ); ?></label>
		<span class="btn-qty qty-minus"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17px" height="3px"><path fill-rule="evenodd"  fill="currentColor" d="M16.979,1.681 C16.979,1.093 16.459,0.617 15.816,0.617 L2.143,0.617 C1.822,0.617 1.531,0.736 1.321,0.929 C1.111,1.121 0.980,1.387 0.980,1.681 C0.980,2.255 1.478,2.715 2.098,2.738 L15.861,2.738 C16.481,2.715 16.979,2.255 16.979,1.681 Z"/></svg></span>
		
		<input type="number" id="<?php echo esc_attr( $input_id ); ?>" class="input-text <?php echo is_cart() ? '': 'btn-qty'; ?> qty text" step="<?php echo esc_attr( $step ); ?>" min="<?php echo esc_attr( $min_value ); ?>" max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" size="4" pattern="<?php echo esc_attr( $pattern ); ?>" inputmode="<?php echo esc_attr( $inputmode ); ?>" aria-labelledby="<?php echo ! empty( $args['product_name'] ) ? sprintf( esc_attr__( '%s quantity', 'woocommerce' ), $args['product_name'] ) : ''; ?>" />
		
		<span class="btn-qty qty-plus"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="17px"><path fill-rule="evenodd"  fill="currentColor" d="M9.171,9.193 L14.845,9.193 C15.487,9.193 16.008,8.672 16.008,8.030 C16.008,7.388 15.487,6.867 14.845,6.867 L9.171,6.867 L9.171,1.193 C9.171,0.551 8.650,0.031 8.008,0.030 C7.366,0.030 6.845,0.551 6.845,1.193 L6.845,6.867 L1.171,6.867 C0.529,6.867 0.009,7.388 0.009,8.030 C0.009,8.351 0.139,8.642 0.349,8.852 C0.560,9.062 0.850,9.192 1.171,9.192 L6.845,9.192 L6.845,14.866 C6.845,15.187 6.976,15.478 7.186,15.689 C7.397,15.899 7.687,16.029 8.008,16.029 C8.650,16.029 9.171,15.509 9.171,14.867 L9.171,9.193 Z"/></svg></span>
		
	</div>
	<?php
}
