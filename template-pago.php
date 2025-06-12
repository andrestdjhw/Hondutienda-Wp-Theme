<?php
/**
 * Template Name: Payment Template
 * Template Post Type: page
 */

get_header(); ?>

<div class="payment-page">
    <!-- Hero Section with Gradient Background -->
    <section class="relative py-24 overflow-hidden">
        <!-- Gradient Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary via-[#57D0E1] to-[#0090D9]"></div>
        
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 -left-4 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 bg-yellow-600 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>
        
        <!-- Subtle Pattern Overlay -->
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
        
        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 bg-clip-text bg-gradient-to-r from-white via-gray-200 to-white animate-gradient">
                    Finalizar Compra
                </h1>
                <p class="text-xl md:text-2xl text-white max-w-3xl mx-auto leading-relaxed opacity-90">
                    Completa tu pedido de forma segura con nuestro sistema de pago.
                </p>
                <div class="mt-8">
                    <div class="inline-flex items-center justify-center w-16 h-1 bg-yellow-400 rounded-full"></div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Wave -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-12 md:h-20">
                <path d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 43.3C1200 47 1320 53 1380 56.7L1440 60V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <?php
        // Verificar si WooCommerce está activo y hay productos en el carrito
        if (class_exists('WooCommerce') && !WC()->cart->is_empty()) {
            // Obtener el checkout object
            $checkout = WC()->checkout();
        ?>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Left Column (Order Review) -->
            <div class="lg:col-span-1 lg:order-2">
                <div class="bg-white rounded-lg shadow-custom p-8 sticky top-8">
                    <h2 class="text-2xl font-bold mb-6">Resumen de Compra</h2>
                    
                    <!-- WooCommerce Order Review -->
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php woocommerce_order_review(); ?>
                    </div>
                    
                    <!-- Security Badges -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex flex-col items-center">
                            <h3 class="text-lg font-semibold mb-4 text-center">Pago Seguro Garantizado</h3>
                            <div class="flex flex-wrap justify-center gap-2">
                                <div class="flex items-center bg-gray-100 px-3 py-2 rounded text-xs">
                                    <i class="fas fa-lock text-primary mr-2"></i>
                                    <span>SSL Secure</span>
                                </div>
                                <div class="flex items-center bg-gray-100 px-3 py-2 rounded text-xs">
                                    <i class="fas fa-shield-alt text-primary mr-2"></i>
                                    <span>Protección</span>
                                </div>
                                <div class="flex items-center bg-gray-100 px-3 py-2 rounded text-xs">
                                    <i class="fas fa-credit-card text-primary mr-2"></i>
                                    <span>PCI DSS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Help Section -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold mb-4">¿Necesitas ayuda?</h3>
                        <p class="text-gray-600 text-sm mb-4">Si tienes alguna pregunta sobre tu pedido, contáctanos:</p>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-secondary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span>info@hondutienda.com</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-secondary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span>+1 823-596-3738</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column (Checkout Form) -->
            <div class="lg:col-span-2 lg:order-1">
                <div class="bg-white rounded-lg shadow-custom p-8">
                    <h2 class="text-2xl font-bold mb-6">Información de Pago</h2>
                    
                    <?php
                    // Verificar si el usuario debe estar logueado
                    if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
                        echo '<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6">';
                        echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('Debes iniciar sesión para completar la compra.', 'woocommerce')));
                        echo '</div>';
                        echo '<div class="text-center"><a href="' . esc_url(wp_login_url(get_permalink())) . '" class="btn btn-primary">Iniciar Sesión</a></div>';
                    } else {
                        // Acciones antes del formulario de checkout
                        do_action('woocommerce_before_checkout_form', $checkout);
                    ?>
                    
                    <!-- Formulario de Checkout de WooCommerce -->
                    <form name="checkout" method="post" class="checkout woocommerce-checkout custom-checkout-form" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data" aria-label="<?php echo esc_attr__('Checkout', 'woocommerce'); ?>">
                        
                        <?php if ($checkout->get_checkout_fields()) : ?>
                            <?php do_action('woocommerce_checkout_before_customer_details'); ?>
                            
                            <div id="customer_details" class="space-y-8">
                                <!-- Información de Facturación -->
                                <div class="billing-fields">
                                    <h3 class="text-xl font-semibold mb-4">Información Personal</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <?php do_action('woocommerce_checkout_billing'); ?>
                                    </div>
                                </div>
                                
                                <!-- Información de Envío -->
                                <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                                <div class="shipping-fields pt-6 border-t border-gray-200">
                                    <h3 class="text-xl font-semibold mb-4">Dirección de Envío</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <?php do_action('woocommerce_checkout_shipping'); ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <?php do_action('woocommerce_checkout_after_customer_details'); ?>
                        <?php endif; ?>
                        
                        <!-- Métodos de Pago -->
                        <div class="payment-methods pt-6 border-t border-gray-200">
                            <h3 class="text-xl font-semibold mb-4">Método de Pago</h3>
                            
                            <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>
                            <?php do_action('woocommerce_checkout_before_order_review'); ?>
                            
                            <div id="payment" class="woocommerce-checkout-payment">
                                <?php woocommerce_checkout_payment(); ?>
                            </div>
                            
                            <?php do_action('woocommerce_checkout_after_order_review'); ?>
                        </div>
                    </form>
                    
                    <?php
                        // Acciones después del formulario de checkout
                        do_action('woocommerce_after_checkout_form', $checkout);
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <?php
        } else {
            // Si no hay productos en el carrito o WooCommerce no está activo
            echo '<div class="text-center py-16">';
            echo '<h2 class="text-2xl font-bold mb-4">Tu carrito está vacío</h2>';
            echo '<p class="text-gray-600 mb-8">Agrega algunos productos antes de proceder al checkout.</p>';
            echo '<a href="' . esc_url(wc_get_page_permalink('shop')) . '" class="inline-block px-8 py-3 bg-secondary text-dark font-bold rounded-full hover:bg-yellow-400 transform hover:-translate-y-0.5 transition-all duration-300">Ir a la Tienda</a>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<style>
    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient 5s ease infinite;
    }
    
    .shadow-custom {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
    }
    
    /* Estilos personalizados para campos de WooCommerce */
    .custom-checkout-form .form-row {
        margin-bottom: 1.5rem;
    }
    
    .custom-checkout-form .form-row label {
        display: block;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }
    
    .custom-checkout-form .form-row label .required {
        color: #ef4444;
    }
    
    .custom-checkout-form .input-text,
    .custom-checkout-form select,
    .custom-checkout-form textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: white;
    }
    
    .custom-checkout-form .input-text:focus,
    .custom-checkout-form select:focus,
    .custom-checkout-form textarea:focus {
        outline: none;
        border-color: transparent;
        ring: 2px;
        ring-color: var(--secondary-color, #fbbf24);
        box-shadow: 0 0 0 2px rgba(251, 191, 36, 0.5);
    }
    
    .custom-checkout-form .form-row-wide {
        width: 100%;
    }
    
    .custom-checkout-form .form-row-first,
    .custom-checkout-form .form-row-last {
        width: 100%;
    }
    
    /* Estilos para métodos de pago */
    .woocommerce-checkout-payment .payment_methods {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .woocommerce-checkout-payment .payment_method {
        margin-bottom: 1rem;
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        overflow: hidden;
    }
    
    .woocommerce-checkout-payment .payment_method label {
        display: block;
        padding: 1rem;
        cursor: pointer;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }
    
    .woocommerce-checkout-payment .payment_method label:hover {
        background-color: #f9fafb;
    }
    
    .woocommerce-checkout-payment .payment_method input[type="radio"] {
        margin-right: 0.5rem;
    }
    
    .woocommerce-checkout-payment .payment_method input[type="radio"]:checked + label {
        background-color: rgba(251, 191, 36, 0.1);
        border-color: var(--secondary-color, #fbbf24);
    }
    
    .woocommerce-checkout-payment .payment_box {
        padding: 1rem;
        background-color: #f9fafb;
        border-top: 1px solid #e5e7eb;
    }
    
    /* Estilos para el botón de envío */
    .woocommerce-checkout-payment #place_order {
        width: 100%;
        padding: 1rem 2rem;
        background-color: var(--secondary-color, #fbbf24);
        color: var(--dark-color, #1f2937);
        font-weight: bold;
        border: none;
        border-radius: 9999px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.1rem;
        margin-top: 1rem;
    }
    
    .woocommerce-checkout-payment #place_order:hover {
        background-color: #f59e0b;
        transform: translateY(-1px);
    }
    
    .woocommerce-checkout-payment #place_order:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }
    
    /* Estilos para mensajes de error */
    .woocommerce-error,
    .woocommerce-message,
    .woocommerce-info {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 0.5rem;
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
    
    /* Estilos para el resumen del pedido */
    .woocommerce-checkout-review-order-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .woocommerce-checkout-review-order-table th,
    .woocommerce-checkout-review-order-table td {
        padding: 0.75rem 0;
        border-bottom: 1px solid #e5e7eb;
        text-align: left;
    }
    
    .woocommerce-checkout-review-order-table .order-total {
        font-weight: bold;
        font-size: 1.1rem;
        border-bottom: none;
    }
    
    .woocommerce-checkout-review-order-table .order-total .amount {
        color: var(--primary-color, #0ea5e9);
    }
    
    /* Responsive design */
    @media (max-width: 768px) {
        .custom-checkout-form .form-row-first,
        .custom-checkout-form .form-row-last {
            width: 100%;
            margin-right: 0;
        }
        
        .payment-page .grid {
            grid-template-columns: 1fr;
        }
        
        .lg\\:order-1 {
            order: 2;
        }
        
        .lg\\:order-2 {
            order: 1;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Función para actualizar la revisión del pedido
    function updateOrderReview() {
        const orderReview = document.getElementById('order_review');
        if (orderReview) {
            const formData = new FormData();
            formData.append('action', 'woocommerce_update_order_review');
            
            // Obtener datos del formulario de checkout
            const checkoutForm = document.querySelector('.woocommerce-checkout');
            if (checkoutForm) {
                const formInputs = checkoutForm.querySelectorAll('input, select, textarea');
                formInputs.forEach(input => {
                    if (input.name && input.value) {
                        formData.append(input.name, input.value);
                    }
                });
            }
            
            fetch(wc_checkout_params.ajax_url, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newOrderReview = doc.getElementById('order_review');
                if (newOrderReview) {
                    orderReview.innerHTML = newOrderReview.innerHTML;
                }
            })
            .catch(error => {
                console.error('Error updating order review:', error);
            });
        }
    }
    
    // Actualizar revisión del pedido cuando cambien los campos relevantes
    const fieldsToWatch = [
        'input[name^="billing_"]',
        'input[name^="shipping_"]',
        'select[name^="billing_"]',
        'select[name^="shipping_"]',
        'input[name="payment_method"]'
    ];
    
    fieldsToWatch.forEach(selector => {
        const fields = document.querySelectorAll(selector);
        fields.forEach(field => {
            field.addEventListener('change', updateOrderReview);
            field.addEventListener('blur', updateOrderReview);
        });
    });
    
    // Mejorar la experiencia de usuario con los campos de pago
    const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
    paymentMethods.forEach(method => {
        method.addEventListener('change', function() {
            // Remover clases activas de todos los métodos
            paymentMethods.forEach(pm => {
                const label = pm.closest('.payment_method').querySelector('label');
                if (label) {
                    label.style.backgroundColor = '';
                    label.style.borderColor = '';
                }
            });
            
            // Agregar clase activa al método seleccionado
            const selectedLabel = this.closest('.payment_method').querySelector('label');
            if (selectedLabel) {
                selectedLabel.style.backgroundColor = 'rgba(251, 191, 36, 0.1)';
                selectedLabel.style.borderColor = 'var(--secondary-color, #fbbf24)';
            }
        });
    });
    
    // Validación de campos en tiempo real
    const requiredFields = document.querySelectorAll('.custom-checkout-form .validate-required input, .custom-checkout-form .validate-required select');
    requiredFields.forEach(field => {
        field.addEventListener('blur', function() {
            const formRow = this.closest('.form-row');
            if (formRow) {
                if (this.value.trim() === '') {
                    formRow.classList.add('woocommerce-invalid');
                    this.style.borderColor = '#ef4444';
                } else {
                    formRow.classList.remove('woocommerce-invalid');
                    this.style.borderColor = '#d1d5db';
                }
            }
        });
        
        field.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                const formRow = this.closest('.form-row');
                if (formRow) {
                    formRow.classList.remove('woocommerce-invalid');
                    this.style.borderColor = '#d1d5db';
                }
            }
        });
    });
    
    // Scroll suave al error si existe
    const errorMessages = document.querySelectorAll('.woocommerce-error');
    if (errorMessages.length > 0) {
        errorMessages[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
});

// Integrar con eventos de WooCommerce si están disponibles
if (typeof jQuery !== 'undefined') {
    jQuery(document).ready(function($) {
        // Actualizar cuando WooCommerce actualice el checkout
        $(document.body).on('updated_checkout', function() {
            console.log('Checkout updated');
            // Reinicializar funcionalidades personalizadas si es necesario
        });
        
        // Manejar errores de validación
        $(document.body).on('checkout_error', function() {
            const firstError = $('.woocommerce-error, .woocommerce-invalid').first();
            if (firstError.length) {
                $('html, body').animate({
                    scrollTop: firstError.offset().top - 100
                }, 500);
            }
        });
    });
}
</script>

<?php get_footer(); ?>