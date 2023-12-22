<?php
//МЕТОДЫ ОПЛАТЫ ОБЩИЙ БЛОК КАЖДЫЙ СПОСОБ
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="order-payment__block-item">
			<div class="wc_payment_method payment_method_<?php echo esc_attr( $gateway->id ); ?>">
			<input id="payment_method_<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />

			<label for="payment_method_<?php echo esc_attr( $gateway->id ); ?>">
				<?php echo $gateway->get_title(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?> <?php echo $gateway->get_icon(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?>
			</label>
			
		</div>
</div>

