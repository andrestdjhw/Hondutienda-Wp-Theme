<?php
/**
 * Template Name: Carrito Template
 * Template Post Type: page
 */
get_header(); ?>

<div class="cart-page">

    <section class="relative py-16 md:py-24 overflow-hidden bg-gradient-to-br from-primary via-[#57D0E1] to-[#0090D9]">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 -left-4 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 bg-yellow-600 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fadeIn">
                    Tu <span class="bg-clip-text text-transparent bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200">Carrito</span>
                </h1>
                <p class="text-xl text-white opacity-90 max-w-3xl mx-auto animate-fadeIn delay-100">
                    Revisa y gestiona los productos que has seleccionado
                </p>
            </div>
        </div>
        
        <!-- Bottom Wave -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-12 md:h-20">
                <path d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 43.3C1200 47 1320 53 1380 56.7L1440 60V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- Contenido Principal -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <?php if (WC()->cart->is_empty()) : ?>
            <!-- Carrito Vacio -->
            <div class="max-w-2xl mx-auto text-center py-16 animate-fadeIn">
                <div class="w-40 h-40 mx-auto mb-8 text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Tu carrito está vacío</h2>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">
                    Parece que no has agregado ningún producto a tu carrito todavía. Explora nuestra tienda y encuentra productos increíbles.
                </p>
                
                <a 
                    href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" 
                    class="inline-block bg-[#0090D9] text-white font-bold py-3 px-8 rounded-full hover:bg-[#57D0E1] transition-colors duration-300"
                >
                    Ir a la Tienda
                </a>
            </div>       
        <?php else : ?>
            <?php do_action('woocommerce_before_cart'); ?>
            
            <!-- Carrito con Articulos -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 animate-fadeIn">
                <!-- Articulos del Carrito -->
                <div class="lg:col-span-2">
                    <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
                        <?php do_action('woocommerce_before_cart_table'); ?>
                        
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                            <!-- Encabezado del Carrito -->
                            <div class="border-b border-gray-200 p-6 bg-gray-50">
                                <h2 class="text-xl font-bold text-gray-800">
                                    Tus Productos (<?php echo WC()->cart->get_cart_contents_count(); ?>)
                                </h2>
                            </div>
                            
                            <!-- Lista de articulos del carrito -->
                            <div class="divide-y divide-gray-200">
                                <?php do_action('woocommerce_before_cart_contents'); ?>
                                
                                <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
                                    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                                    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                                    $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
                                    
                                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) :
                                        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                                ?>
                                
                                <!-- Item del Producto-->
                                <div class="p-6 flex flex-col sm:flex-row gap-6 hover:bg-gray-50 transition-colors duration-200 woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
                                    <!-- Imagen del Producto -->
                                    <div class="w-24 h-24 flex-shrink-0 overflow-hidden rounded-lg">
                                        <?php
                                        $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                                        if (!$product_permalink) {
                                            echo $thumbnail;
                                        } else {
                                            printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                                        }
                                        ?>
                                    </div>
                                    
                                    <!--  Detalles del producto-->
                                    <div class="flex-grow">
                                        <div class="flex justify-between">
                                            <div>
                                                <h3 class="text-lg font-medium text-gray-800 product-name">
                                                    <?php
                                                    if (!$product_permalink) {
                                                        echo wp_kses_post($product_name . '&nbsp;');
                                                    } else {
                                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                                    }
                                                    
                                                    do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);
                                                    echo wc_get_formatted_cart_item_data($cart_item);
                                                    
                                                    if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                                                    }
                                                    ?>
                                                </h3>
                                                <p class="text-gray-600 mt-1 product-price">
                                                    Precio: <?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?>
                                                </p>
                                            </div>
                                            <!-- Boton de remover producto -->
                                            <div class="product-remove">
                                                <?php
                                                echo apply_filters(
                                                    'woocommerce_cart_item_remove_link',
                                                    sprintf(
                                                        '<a href="%s" class="text-gray-400 hover:text-red-500 transition-colors duration-200 remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </a>',
                                                        esc_url(wc_get_cart_remove_url($cart_item_key)),
                                                        esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
                                                        esc_attr($product_id),
                                                        esc_attr($_product->get_sku())
                                                    ),
                                                    $cart_item_key
                                                );
                                                ?>
                                            </div>
                                        </div>
                                        
                                        <!-- Quantity and Subtotal -->
                                        <div class="mt-4 flex items-center justify-between">
                                            <!-- Quantity Controls -->
                                            <div class="product-quantity flex items-center border border-gray-300 rounded-full">
                                                <?php
                                                if ($_product->is_sold_individually()) {
                                                    $min_quantity = 1;
                                                    $max_quantity = 1;
                                                } else {
                                                    $min_quantity = 0;
                                                    $max_quantity = $_product->get_max_purchase_quantity();
                                                }

                                                $product_quantity = woocommerce_quantity_input(
                                                    array(
                                                        'input_name'   => "cart[{$cart_item_key}][qty]",
                                                        'input_value'  => $cart_item['quantity'],
                                                        'max_value'    => $max_quantity,
                                                        'min_value'    => $min_quantity,
                                                        'product_name' => $product_name,
                                                        'classes'      => array('input-text', 'qty', 'text', 'w-16', 'text-center', 'border-0', 'focus:outline-none'),
                                                    ),
                                                    $_product,
                                                    false
                                                );

                                                echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                                                ?>
                                            </div>
                                            
                                            <!-- Subtotal -->
                                            <div class="text-right product-subtotal">
                                                <p class="text-lg font-bold text-dark">
                                                    <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php endif; ?>
                                <?php endforeach; ?>
                                
                                <?php do_action('woocommerce_cart_contents'); ?>
                            </div>
                            
                            <!-- Cart Footer with Actions -->
                            <div class="p-6 bg-gray-50 border-t border-gray-200">
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                    <a 
                                        href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" 
                                        class="text-primary font-medium hover:text-blue-700 transition-colors duration-200 flex items-center"
                                    >
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                        </svg>
                                        Seguir comprando
                                    </a>
                                    
                                    <div class="flex gap-3">
                                        <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>">
                                            <?php esc_html_e('Actualizar carrito', 'woocommerce'); ?>
                                        </button>
                                    </div>
                                </div>
                                
                                <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
                            </div>
                        </div>
                        
                        <?php do_action('woocommerce_after_cart_table'); ?>
                    </form>
                    
                    <!-- Coupon Code -->
                    <?php if (wc_coupons_enabled()) : ?>
                    <div class="mt-6 bg-white rounded-xl shadow-sm p-6 animate-fadeIn delay-100">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">¿Tienes un código de descuento?</h3>
                        <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
                            <div class="flex">
                                <input 
                                    type="text" 
                                    name="coupon_code"
                                    id="coupon_code"
                                    placeholder="Ingresa tu código" 
                                    class="flex-grow px-4 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    value=""
                                >
                                <button 
                                    type="submit"
                                    name="apply_coupon"
                                    value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"
                                    class="bg-primary text-white px-6 py-3 rounded-r-lg hover:bg-blue-700 transition-colors duration-200"
                                >
                                    Aplicar
                                </button>
                            </div>
                            <?php do_action('woocommerce_cart_coupon'); ?>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Order Summary -->
                <div class="animate-fadeIn delay-200">
                    <?php do_action('woocommerce_before_cart_collaterals'); ?>
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden sticky top-6 cart-collaterals">
                        <div class="border-b border-gray-200 p-6 bg-gray-50">
                            <h2 class="text-xl font-bold text-gray-800">Resumen de Pedido</h2>
                        </div>
                        
                        <div class="p-6">
                            <?php
                            /**
                             * Cart collaterals hook.
                             *
                             * @hooked woocommerce_cross_sell_display
                             * @hooked woocommerce_cart_totals - 10
                             */
                            do_action('woocommerce_cart_collaterals');
                            ?>
                            
                            <div class="mt-6 flex items-center justify-center space-x-4">
                                <i class="fab fa-cc-visa text-blue-600 text-2xl"></i>
                                <i class="fab fa-cc-mastercard text-red-500 text-2xl"></i>
                                <i class="fab fa-cc-amex text-blue-400 text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php do_action('woocommerce_after_cart'); ?>
        <?php endif; ?>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fadeIn {
        animation: fadeIn 0.6s ease forwards;
    }
    
    .delay-100 {
        animation-delay: 0.1s;
    }
    
    .delay-200 {
        animation-delay: 0.2s;
    }
    
    .shadow-custom {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    
    /* Casilla de cantidad con estilo personalizado */
    .quantity .qty {
        width: 60px !important;
        text-align: center;
        border: none !important;
        background: transparent;
        font-weight: 500;
    }
    
    .quantity {
        display: flex !important;
        align-items: center;
        border: 1px solid #d1d5db;
        border-radius: 9999px;
        overflow: hidden;
    }
    
    /* Esconde estilos de cantidades por default y crea nuevos estilizados */
    .quantity .qty::-webkit-outer-spin-button,
    .quantity .qty::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    .quantity .qty[type=number] {
        -moz-appearance: textfield;
    }
    
    /* Carrito de woocommerce estilos de los totales */
    .cart_totals .shop_table {
        border: none !important;
    }
    
    .cart_totals .shop_table td,
    .cart_totals .shop_table th {
        border: none !important;
        padding: 0.75rem 0 !important;
    }
    
    .cart_totals .shop_table tr.order-total td {
        font-weight: bold !important;
        font-size: 1.125rem !important;
        border-top: 1px solid #e5e7eb !important;
        padding-top: 1rem !important;
    }
    
    .wc-proceed-to-checkout .checkout-button {
        width: 100% !important;
        background-color: #fbbf24 !important; /* color secundario */
        color: #1f2937 !important; /* color oscuro*/
        font-weight: bold !important;
        padding: 0.75rem 1.5rem !important;
        border-radius: 0.5rem !important;
        border: none !important;
        transition: all 0.2s !important;
        text-decoration: none !important;
        display: block !important;
        text-align: center !important;
    }
    
    .wc-proceed-to-checkout .checkout-button:hover {
        background-color: #f59e0b !important;
        transform: translateY(-1px);
    }
    
    /*  Quitar del carrito estilos */
    .product-remove .remove {
        text-decoration: none !important;
        color: #9ca3af !important;
        font-size: 1.5rem !important;
        line-height: 1 !important;
    }
    
    .product-remove .remove:hover {
        color: #ef4444 !important;
    }
</style>

<?php get_footer(); ?>