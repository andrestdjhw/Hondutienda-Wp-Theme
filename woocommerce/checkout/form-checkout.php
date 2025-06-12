<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 * Ubicación: tu-tema/woocommerce/checkout/form-checkout.php
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo '<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6">';
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'Debes iniciar sesión para completar la compra.', 'woocommerce' ) ) );
	echo '</div>';
	return;
}
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout custom-checkout-form" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data" aria-label="<?php echo esc_attr__( 'Checkout', 'woocommerce' ); ?>">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div id="customer_details" class="space-y-8">
			
			<!-- Información de Facturación -->
			<div class="billing-fields">
				<h3 class="text-xl font-semibold mb-4 flex items-center">
					<svg class="w-5 h-5 mr-2 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
					</svg>
					Información Personal
				</h3>
				<div class="custom-fields-grid">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
				</div>
			</div>

			<!-- Información de Envío -->
			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
			<div class="shipping-fields pt-6 border-t border-gray-200">
				<h3 class="text-xl font-semibold mb-4 flex items-center">
					<svg class="w-5 h-5 mr-2 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
					</svg>
					Información de Envío
				</h3>
				
				<!-- Checkbox para usar la misma dirección -->
				<div class="ship-to-different-address-checkbox mb-4">
					<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox inline-flex items-center">
						<input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox mr-2" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" />
						<span class="text-sm"><?php esc_html_e( 'Enviar a una dirección diferente?', 'woocommerce' ); ?></span>
					</label>
				</div>
				
				<div class="shipping-address-fields custom-fields-grid" style="<?php echo ! apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ) ? 'display: none;' : ''; ?>">
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>
			</div>
			<?php endif; ?>

			<!-- Notas adicionales -->
			<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_checkout_notes_field' ) ) ) : ?>
			<div class="additional-fields pt-6 border-t border-gray-200">
				<h3 class="text-xl font-semibold mb-4 flex items-center">
					<svg class="w-5 h-5 mr-2 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
					</svg>
					Información Adicional
				</h3>
				<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

	<!-- Resumen del Pedido -->
	<h3 id="order_review_heading" class="text-xl font-semibold mb-4 mt-8 flex items-center">
		<svg class="w-5 h-5 mr-2 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
		</svg>
		<?php esc_html_e( 'Tu pedido', 'woocommerce' ); ?>
	</h3>

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

<style>
/* Estilos personalizados para el checkout */
.custom-checkout-form {
	max-width: 800px;
	margin: 0 auto;
	padding: 2rem;
	background: #fff;
	border-radius: 8px;
	box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.custom-fields-grid {
	display: grid;
	grid-template-columns: 1fr;
	gap: 1rem;
}

@media (min-width: 768px) {
	.custom-fields-grid {
		grid-template-columns: repeat(2, 1fr);
	}
	
	.custom-fields-grid .form-row-wide {
		grid-column: 1 / -1;
	}
}

.woocommerce-form-row {
	margin-bottom: 1rem;
}

.woocommerce-form-row label {
	display: block;
	margin-bottom: 0.5rem;
	font-weight: 500;
	color: #374151;
}

.woocommerce-form-row input[type="text"],
.woocommerce-form-row input[type="email"],
.woocommerce-form-row input[type="tel"],
.woocommerce-form-row select,
.woocommerce-form-row textarea {
	width: 100%;
	padding: 0.75rem;
	border: 1px solid #d1d5db;
	border-radius: 6px;
	font-size: 1rem;
	transition: border-color 0.2s, box-shadow 0.2s;
}

.woocommerce-form-row input:focus,
.woocommerce-form-row select:focus,
.woocommerce-form-row textarea:focus {
	outline: none;
	border-color: #3b82f6;
	box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.woocommerce-checkout-review-order {
	background: #f9fafb;
	padding: 1.5rem;
	border-radius: 8px;
	margin-top: 2rem;
}

.text-secondary {
	color: #6b7280;
}

/* Responsive adjustments */
@media (max-width: 767px) {
	.custom-checkout-form {
		padding: 1rem;
		margin: 1rem;
	}
	
	.text-xl {
		font-size: 1.125rem;
	}
}

/* Loading states */
.processing .custom-checkout-form {
	opacity: 0.6;
	pointer-events: none;
}

/* Error states */
.woocommerce-error,
.woocommerce-message,
.woocommerce-info {
	padding: 1rem;
	margin-bottom: 1rem;
	border-radius: 6px;
	border-left: 4px solid;
}

.woocommerce-error {
	background-color: #fef2f2;
	border-left-color: #ef4444;
	color: #991b1b;
}

.woocommerce-message {
	background-color: #f0fdf4;
	border-left-color: #22c55e;
	color: #166534;
}

.woocommerce-info {
	background-color: #eff6ff;
	border-left-color: #3b82f6;
	color: #1e40af;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
	// Toggle shipping address fields
	const shippingCheckbox = document.getElementById('ship-to-different-address-checkbox');
	const shippingFields = document.querySelector('.shipping-address-fields');
	
	if (shippingCheckbox && shippingFields) {
		shippingCheckbox.addEventListener('change', function() {
			if (this.checked) {
				shippingFields.style.display = 'block';
				shippingFields.style.animation = 'fadeIn 0.3s ease-in-out';
			} else {
				shippingFields.style.display = 'none';
			}
		});
	}
	
	// Add loading state during form submission
	const checkoutForm = document.querySelector('form.checkout');
	if (checkoutForm) {
		checkoutForm.addEventListener('submit', function() {
			document.body.classList.add('processing');
		});
	}
});

// Add fadeIn animation
const style = document.createElement('style');
style.textContent = `
	@keyframes fadeIn {
		from { opacity: 0; transform: translateY(-10px); }
		to { opacity: 1; transform: translateY(0); }
	}
`;
document.head.appendChild(style);
</script>