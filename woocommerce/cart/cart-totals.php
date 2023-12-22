<?php
//СУММА ЗАКАЗОВ НА СТРАНИЦЕ КОРЗИНЫ

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals cart-bottom <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	

	<div class="shop_table shop_table_responsive cart-bottom__box">
		<h2 class="cart__subtotal-title"><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h2>


		<div class="cart-bottom__box-item">
			<div class="cart-bottom__box-name">В корзине: </div>
			<span><?php echo WC()->cart->get_cart_contents_count();?> товара</span>
		</div>


		<div class="cart-subtotal cart-bottom__box-item">
			<div class="cart-bottom__box-name"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div>
			<div class="cart-bottom__box-name" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></div>
		</div>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<div class="cart-discount cart-bottom__box-item coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<div class="cart-bottom__box-name"><?php wc_cart_totals_coupon_label( $coupon ); ?></div>
				<div class="cart-bottom__box-name" data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
			</div>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

			<div class="shipping cart-bottom__box-item">
				<div class="cart-bottom__box-name"><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></div>
				<div class="cart-bottom__box-name" data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></div>
			</div>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<div class="fee cart-bottom__box-item">
				<div class="cart-bottom__box-name"><?php echo esc_html( $fee->name ); ?></div>
				<div class="cart-bottom__box-name" data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></div>
			</div>
		<?php endforeach; ?>

		<?php
		if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = '';

			if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
				/* translators: %s location. */
				$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
			}

			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
				foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					?>
					<div class="tax-rate cart-bottom__box-item tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<div class="cart-bottom__box-name"><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
						<div class="cart-bottom__box-name" data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
					</div>
					<?php
				}
			} else {
				?>
				<div class="tax-total cart-bottom__box-item">
					<div class="cart-bottom__box-name"><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<div class="cart-bottom__box-name" data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></div>
				</div>
				<?php
			}
		}
		?>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<div class="order-total cart-bottom__box-item">
			<div class="cart-bottom__box-name"><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>
			<div class="cart-bottom__box-name" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></div>
		</div>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
		<div class="cart-bottom__box-sum">Минимальная сумма заказа 1 500 Р</div>
	</div>

	<div class="wc-proceed-to-checkout cart-bottom__decor">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
