<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<div class="tienda-page">
    <!-- Hero Section -->
    <section class="relative py-12 sm:py-16 md:py-20 lg:py-24 overflow-hidden bg-gradient-to-br from-primary via-[#57D0E1] to-[#0090D9] min-h-[60vh] sm:min-h-[50vh] md:min-h-[40vh]">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 -left-4 w-48 h-48 sm:w-72 sm:h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-48 h-48 sm:w-72 sm:h-72 bg-yellow-600 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute -bottom-8 left-20 w-48 h-48 sm:w-72 sm:h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>
        
        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
            <div class="text-center w-full">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 animate-fadeIn leading-tight">
                    Nuestra <span class="bg-clip-text text-transparent bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 block sm:inline">Tienda</span>
                </h1>
                <p class="text-lg sm:text-xl text-white opacity-90 max-w-3xl mx-auto animate-fadeIn delay-100 leading-relaxed px-4">
                    Descubre los mejores productos hondureños con la comodidad de comprar desde tu hogar.
                </p>
            </div>
        </div>
        
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-8 sm:h-12 md:h-20">
                <path d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 43.3C1200 47 1320 53 1380 56.7L1440 60V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z" fill="white"/>
            </svg>
        </div>
    </section>

    <?php
    /**
     * Hook: woocommerce_before_main_content.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     * @hooked WC_Structured_Data::generate_website_data() - 30
     */
    do_action( 'woocommerce_before_main_content' );
    ?>

    <!-- Custom Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-200 py-3 sm:py-4 mb-6 sm:mb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <navigation class="flex items-center space-x-1 sm:space-x-2 text-xs sm:text-sm overflow-x-auto pb-2 sm:pb-0" aria-label="Breadcrumb">
            <!-- Home Icon -->
            <a href="<?php echo esc_url(home_url('/')); ?>" 
               class="group flex items-center text-gray-500 hover:text-[#0090D9] transition-colors duration-300 flex-shrink-0">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1 group-hover:scale-110 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
                <span class="font-medium">Inicio</span>
            </a>

            <!-- Separator -->
            <svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>

            <?php
            // Si estamos en una categoría de producto
            if (is_product_category()) {
                $current_cat = get_queried_object();
                
                // Mostrar categorías padre si existen
                if ($current_cat->parent) {
                    $parent_cats = get_ancestors($current_cat->term_id, 'product_cat');
                    $parent_cats = array_reverse($parent_cats);
                    
                    foreach ($parent_cats as $parent_id) {
                        $parent_cat = get_term($parent_id, 'product_cat');
                        echo '<a href="' . esc_url(get_term_link($parent_cat)) . '" class="text-gray-500 hover:text-[#0090D9] transition-colors duration-300 font-medium hover:bg-gray-100 px-1 sm:px-2 py-1 rounded flex-shrink-0">' . esc_html($parent_cat->name) . '</a>';
                        echo '<svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>';
                    }
                }
                
                // Categoría actual
                echo '<span class="bg-gradient-to-r from-[#57D0E1] to-[#0090D9] text-white px-2 sm:px-3 py-1 rounded-full font-semibold text-xs sm:text-sm shadow-md flex-shrink-0">' . esc_html($current_cat->name) . '</span>';
                
            } elseif (is_product_tag()) {
                // Si estamos en una etiqueta de producto
                $current_tag = get_queried_object();
                echo '<a href="' . esc_url(wc_get_page_permalink('shop')) . '" class="text-gray-500 hover:text-[#0090D9] transition-colors duration-300 font-medium hover:bg-gray-100 px-1 sm:px-2 py-1 rounded flex-shrink-0">Tienda</a>';
                echo '<svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>';
                echo '<span class="bg-gradient-to-r from-[#57D0E1] to-[#0090D9] text-white px-2 sm:px-3 py-1 rounded-full font-semibold text-xs sm:text-sm shadow-md flex items-center flex-shrink-0">';
                echo '<svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>';
                echo esc_html($current_tag->name) . '</span>';
                
            } else {
                // Página principal de tienda
                echo '<span class="bg-gradient-to-r from-[#57D0E1] to-[#0090D9] text-white px-2 sm:px-3 py-1 rounded-full font-semibold text-xs sm:text-sm shadow-md flex items-center flex-shrink-0">';
                echo '<svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2L3 7v11a2 2 0 002 2h10a2 2 0 002-2V7l-7-5zM10 18V8.414L4 4.414V16h12V4.414L10 8.414V18z" clip-rule="evenodd"></path></svg>';
                echo 'Tienda</span>';
            }
            ?>
        </navigation>
        
        <!-- Información adicional -->
        <div class="mt-2 sm:mt-3 flex flex-wrap items-center gap-2 sm:gap-4">
            <?php if (is_product_category()) : 
                $current_cat = get_queried_object();
                if ($current_cat->description) : ?>
                    <p class="text-gray-600 text-xs sm:text-sm bg-white px-2 sm:px-3 py-1 rounded-lg border border-gray-200 shadow-sm">
                        <?php echo wp_kses_post($current_cat->description); ?>
                    </p>
                <?php endif; ?>
                
                <!-- Contador de productos en la categoría -->
                <span class="inline-flex items-center text-xs text-gray-500 bg-white px-2 py-1 rounded-md border border-gray-200">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <?php echo $current_cat->count; ?> producto<?php echo $current_cat->count != 1 ? 's' : ''; ?>
                </span>
            <?php endif; ?>
            
            <?php if (is_shop()) : ?>
                <!-- Total de productos en la tienda -->
                <?php 
                $total_products = wp_count_posts('product');
                $published_products = $total_products->publish;
                ?>
                <span class="inline-flex items-center text-xs text-gray-500 bg-white px-2 py-1 rounded-md border border-gray-200">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <?php echo $published_products; ?> producto<?php echo $published_products != 1 ? 's' : ''; ?> disponibles
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        
        <?php
        /**
         * Hook: woocommerce_shop_loop_header.
         *
         * @since 8.6.0
         *
         * @hooked woocommerce_product_taxonomy_archive_header - 10
         */
        do_action( 'woocommerce_shop_loop_header' );
        ?>

        <!-- Custom Filters and Sorting -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 sm:mb-8 gap-4 animate-fadeIn">
            <div class="flex items-center w-full md:w-auto">
                <button class="md:hidden mr-4 text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                </button>
                <h2 class="text-lg sm:text-xl font-bold text-gray-800">
                    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                        <?php woocommerce_page_title(); ?>
                    <?php else : ?>
                        Todos los Productos
                    <?php endif; ?>
                </h2>
            </div>
            
            <!-- WooCommerce sorting and result count -->
            <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 w-full md:w-auto items-start sm:items-center">
                <?php
                /**
                 * Hook: woocommerce_before_shop_loop.
                 *
                 * @hooked woocommerce_output_all_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action( 'woocommerce_before_shop_loop' );
                ?>
            </div>
        </div>

        <?php if ( woocommerce_product_loop() ) : ?>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
        
        <?php
        if ( wc_get_loop_prop( 'total' ) ) {
            $index = 0;
            while ( have_posts() ) {
                the_post();

                /**
                 * Hook: woocommerce_shop_loop.
                 */
                do_action( 'woocommerce_shop_loop' );

                // Custom product display
                global $product;
                
                // Obtener datos del producto
                $product_id = get_the_ID();
                $product_name = get_the_title();
                $product_price = $product->get_price_html();
                $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'medium');
                $product_link = get_permalink($product_id);
                $product_rating = $product->get_average_rating();
                $product_sale = $product->is_on_sale();
                $regular_price = $product->get_regular_price();
                $sale_price = $product->get_sale_price();
                
                // Tags personalizados
                $featured_tag = '';
                if ($product->is_featured()) {
                    $featured_tag = 'Popular';
                } elseif ($product_sale) {
                    $featured_tag = 'Oferta';
                }
                ?>
                
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1 sm:hover:-translate-y-2 animate-fadeIn delay-<?php echo ($index % 4) * 100; ?> relative">
                    <?php if($featured_tag) : ?>
                        <div class="absolute top-2 sm:top-4 right-2 sm:right-4 bg-secondary text-dark text-xs font-bold px-2 sm:px-3 py-1 rounded-full z-10">
                            <?php echo $featured_tag; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="h-40 sm:h-48 overflow-hidden relative">
                        <?php if($product_image) : ?>
                            <img 
                                src="<?php echo $product_image[0]; ?>" 
                                alt="<?php echo esc_attr($product_name); ?>" 
                                class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                            />
                        <?php else : ?>
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500 text-sm">Sin imagen</span>
                            </div>
                        <?php endif; ?>
                        
                        <button class="absolute top-2 sm:top-3 left-2 sm:left-3 bg-white/80 backdrop-blur-sm rounded-full p-1.5 sm:p-2 hover:bg-white transition-colors duration-300 wishlist-btn" data-product-id="<?php echo $product_id; ?>">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="p-4 sm:p-6">
                        <!-- Rating -->
                        <div class="flex mb-1">
                            <?php for($i = 1; $i <= 5; $i++) : ?>
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 <?php echo $i <= round($product_rating) ? 'text-yellow-400' : 'text-gray-300'; ?>" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            <?php endfor; ?>
                        </div>
                        
                        <!-- Product Name -->
                        <h3 class="font-bold text-gray-800 mb-2 line-clamp-2 text-sm sm:text-base">
                            <a href="<?php echo esc_url($product_link); ?>" class="hover:text-[#0090D9] transition-colors duration-300">
                                <?php echo esc_html($product_name); ?>
                            </a>
                        </h3>
                        
                        <!-- Price -->
                        <div class="flex items-center mb-3 sm:mb-4 text-sm sm:text-base">
                            <?php echo $product_price; ?>
                        </div>
                        
                        <!-- Add to Cart Button -->
                        
                        <?php if($product->is_purchasable() && $product->is_in_stock()) : ?>
                        <?php
                        // Obtener la URL correcta del producto para agregar al carrito
                        $add_to_cart_url = $product->add_to_cart_url();
                        $add_to_cart_text = $product->add_to_cart_text();
                        $product_type = $product->get_type();
                        
                        // Para productos simples, usar AJAX
                        if ($product_type === 'simple') :
                            ?>
                            <button 
                                type="button"
                                class="w-full bg-[#57D0E1] text-white py-2 px-3 sm:px-4 rounded-lg hover:bg-[#0090D9] transition-colors duration-300 flex items-center justify-center add-to-cart-btn ajax_add_to_cart text-sm sm:text-base"
                                data-product_id="<?php echo esc_attr($product_id); ?>"
                                data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
                                data-quantity="1"
                                aria-label="<?php echo esc_html($add_to_cart_text); ?>"
                            >
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1 sm:mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span class="truncate"><?php echo esc_html($add_to_cart_text); ?></span>
                            </button>
                        <?php else : 
                            // Para productos variables u otros tipos, ir a la página del producto
                            ?>
                            <a 
                                href="<?php echo esc_url($product_link); ?>" 
                                class="w-full bg-[#57D0E1] text-white py-2 px-3 sm:px-4 rounded-lg hover:bg-[#0090D9] transition-colors duration-300 flex items-center justify-center text-sm sm:text-base"
                            >
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1 sm:mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="truncate"><?php echo esc_html($add_to_cart_text); ?></span>
                            </a>
                        <?php endif; ?>
                        
                    <?php else : ?>
                        <button class="w-full bg-gray-400 text-white py-2 px-3 sm:px-4 rounded-lg cursor-not-allowed text-sm sm:text-base" disabled>
                            <?php if (!$product->is_in_stock()) : ?>
                                Agotado
                            <?php else : ?>
                                No disponible
                            <?php endif; ?>
                        </button>
                    <?php endif; ?>
                    </div>
                </div>
                
                <?php
                $index++;
            }
        }
        ?>
        
    </div>

    <?php
    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action( 'woocommerce_after_shop_loop' );
    ?>

<?php else : ?>
    
    <div class="col-span-full text-center py-8 sm:py-12">
        <p class="text-gray-500 text-base sm:text-lg">No se encontraron productos.</p>
    </div>
    
    <?php
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
    do_action( 'woocommerce_no_products_found' );
    ?>

<?php endif; ?>

</div>
    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-[#EA2626] to-red-500 py-6 sm:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="bg-white/20 rounded-full p-2 sm:p-3 mr-3 sm:mr-4">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 6h10l4 8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="text-white">
                        <h3 class="font-bold text-lg sm:text-xl">¿Necesitas ayuda con tu pedido?</h3>
                        <p class="text-white/90 text-sm sm:text-base">Contáctanos y te ayudaremos con gusto</p>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-4">
                    <a href="tel:+50400000000" class="bg-white text-[#EA2626] px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-300 flex items-center justify-center text-sm sm:text-base">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Llamar
                    </a>
                    <a href="https://wa.me/50400000000" target="_blank" class="bg-green-500 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors duration-300 flex items-center justify-center text-sm sm:text-base">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1 sm:mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106"/>
                        </svg>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php
    /**
     * Hook: woocommerce_after_main_content.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action( 'woocommerce_after_main_content' );
    ?>

    <?php
    /**
     * Hook: woocommerce_sidebar.
     *
     * @hooked woocommerce_get_sidebar - 10
     */
    /*do_action( 'woocommerce_sidebar' );*/
    ?>

</div>

<style>
/* Animaciones personalizadas */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeIn {
    animation: fadeIn 0.6s ease-out forwards;
}

.delay-100 { animation-delay: 0.1s; }
.delay-200 { animation-delay: 0.2s; }
.delay-300 { animation-delay: 0.3s; }

/* Clamp para limitar líneas de texto */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Mejorar el hover de los botones */
.add-to-cart-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 144, 217, 0.3);
}

/* Estilos para el wishlist */
.wishlist-btn:hover {
    transform: scale(1.1);
}

/* Responsive adjustments */
@media (max-width: 640px) {
    .grid-cols-1 {
        gap: 1rem;
    }
    
    .text-3xl {
        font-size: 1.875rem;
        line-height: 2.25rem;
    }
    
    .py-12 {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }
}

/* Loading states para AJAX */
.add-to-cart-btn.loading {
    opacity: 0.7;
    cursor: not-allowed;
}

.add-to-cart-btn.loading::after {
    content: '';
    display: inline-block;
    width: 16px;
    height: 16px;
    border: 2px solid #ffffff;
    border-radius: 50%;
    border-top-color: transparent;
    animation: spin 1s ease-in-out infinite;
    margin-left: 0.5rem;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Mejoras para accesibilidad */
.add-to-cart-btn:focus,
.wishlist-btn:focus {
    outline: 2px solid #0090D9;
    outline-offset: 2px;
}

/* Animación de pulso para elementos destacados */
@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.7;
    }
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

/* ESTILOS PARA PAGINACIÓN */
/* Agregar en la sección <style> de tu archivo archive-product.php */

/* Contenedor principal de paginación */
.woocommerce nav.woocommerce-pagination {
    margin: 2rem 0;
    text-align: center;
}

.woocommerce nav.woocommerce-pagination ul {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    list-style: none;
    margin: 0;
    padding: 0;
    background: white;
    border-radius: 0.75rem;
    padding: 0.5rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.woocommerce nav.woocommerce-pagination ul li {
    margin: 0;
}

.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 0.5rem;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
}

/* Enlaces de paginación */
.woocommerce nav.woocommerce-pagination ul li a {
    color: #374151;
    background: #f9fafb;
}

.woocommerce nav.woocommerce-pagination ul li a:hover {
    background: #57D0E1;
    color: white;
    border-color: #57D0E1;
    transform: translateY(-1px);
}

/* Página actual */
.woocommerce nav.woocommerce-pagination ul li span.current {
    background: linear-gradient(135deg, #57D0E1 0%, #0090D9 100%);
    color: white;
    border-color: #0090D9;
    box-shadow: 0 2px 4px rgba(87, 208, 225, 0.3);
}

/* Botones Anterior/Siguiente */
.woocommerce nav.woocommerce-pagination ul li a.prev,
.woocommerce nav.woocommerce-pagination ul li a.next {
    padding: 0 1rem;
    width: auto;
    font-size: 0.875rem;
}

/* Responsive para paginación */
@media (max-width: 640px) {
    .woocommerce nav.woocommerce-pagination ul {
        flex-wrap: wrap;
        gap: 0.25rem;
    }
    
    .woocommerce nav.woocommerce-pagination ul li a,
    .woocommerce nav.woocommerce-pagination ul li span {
        width: 2rem;
        height: 2rem;
        font-size: 0.75rem;
    }
}

/* ESTILOS PARA FILTROS Y ORDENAMIENTO */

/* Contenedor de resultados y ordenamiento */
.woocommerce .woocommerce-result-count {
    color: #6b7280;
    font-size: 0.875rem;
    margin: 0;
}

.woocommerce .woocommerce-ordering {
    margin: 0;
}

.woocommerce .woocommerce-ordering select {
    background: white;
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    padding: 0.5rem 2rem 0.5rem 0.75rem;
    font-size: 0.875rem;
    color: #374151;
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    min-width: 200px;
}

.woocommerce .woocommerce-ordering select:focus {
    outline: none;
    border-color: #57D0E1;
    box-shadow: 0 0 0 3px rgba(87, 208, 225, 0.1);
}

/* ESTILOS PARA BREADCRUMBS WOOCOMMERCE POR DEFECTO */
/* Solo si necesitas sobrescribir los breadcrumbs por defecto */

.woocommerce .woocommerce-breadcrumb {
    margin-bottom: 1.5rem;
    font-size: 0.875rem;
    color: #6b7280;
}

.woocommerce .woocommerce-breadcrumb a {
    color: #6b7280;
    text-decoration: none;
    transition: color 0.3s ease;
}

.woocommerce .woocommerce-breadcrumb a:hover {
    color: #0090D9;
}

/* ESTILOS PARA CATEGORÍAS/FILTROS EN SIDEBAR */
/* Si tienes widget de categorías */

.widget_product_categories ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.widget_product_categories ul li {
    margin-bottom: 0.5rem;
}

.widget_product_categories ul li a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.5rem 0.75rem;
    color: #374151;
    text-decoration: none;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
}

.widget_product_categories ul li a:hover {
    background: #57D0E1;
    color: white;
    border-color: #57D0E1;
    transform: translateX(4px);
}

.widget_product_categories ul li .count {
    background: #e5e7eb;
    color: #6b7280;
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 9999px;
    font-weight: 500;
}

.widget_product_categories ul li a:hover .count {
    background: rgba(255, 255, 255, 0.2);
    color: white;
}
</style>

<script>
// AJAX para agregar productos al carrito
jQuery(document).ready(function($) {
    // Manejar clicks en botones de agregar al carrito
    $(document).on('click', '.ajax_add_to_cart', function(e) {
        e.preventDefault();
        
        var $button = $(this);
        var product_id = $button.data('product_id');
        var quantity = $button.data('quantity') || 1;
        
        // Evitar múltiples clicks
        if ($button.hasClass('loading')) {
            return false;
        }
        
        // Agregar estado de carga
        $button.addClass('loading');
        var original_text = $button.find('span').text();
        $button.find('span').text('Agregando...');
        
        // Realizar petición AJAX
        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'woocommerce_add_to_cart',
                product_id: product_id,
                quantity: quantity
            },
            success: function(response) {
                if (response.error && response.product_url) {
                    window.location = response.product_url;
                    return;
                }
                
                // Actualizar fragmentos del carrito
                if (response.fragments) {
                    $.each(response.fragments, function(key, value) {
                        $(key).replaceWith(value);
                    });
                }
                
                // Mostrar notificación de éxito
                showNotification('Producto agregado al carrito', 'success');
                
                // Trigger evento personalizado
                $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $button]);
            },
            error: function() {
                showNotification('Error al agregar el producto', 'error');
            },
            complete: function() {
                // Remover estado de carga
                $button.removeClass('loading');
                $button.find('span').text(original_text);
            }
        });
    });
    
    // Manejar wishlist (ejemplo básico)
    $(document).on('click', '.wishlist-btn', function(e) {
        e.preventDefault();
        var $button = $(this);
        var product_id = $button.data('product-id');
        
        // Cambiar visual del botón
        $button.toggleClass('active');
        if ($button.hasClass('active')) {
            $button.find('svg').attr('fill', 'currentColor');
            showNotification('Agregado a favoritos', 'success');
        } else {
            $button.find('svg').attr('fill', 'none');
            showNotification('Removido de favoritos', 'info');
        }
    });
    
    // Función para mostrar notificaciones
    function showNotification(message, type) {
        var bgColor = type === 'success' ? 'bg-green-500' : 
                     type === 'error' ? 'bg-red-500' : 
                     'bg-blue-500';
        
        var notification = $('<div class="fixed top-4 right-4 ' + bgColor + ' text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300">' + 
                           '<div class="flex items-center">' +
                           '<span>' + message + '</span>' +
                           '<button class="ml-4 text-white hover:text-gray-200" onclick="$(this).parent().parent().remove()">&times;</button>' +
                           '</div></div>');
        
        $('body').append(notification);
        
        // Mostrar notificación
        setTimeout(function() {
            notification.removeClass('translate-x-full');
        }, 100);
        
        // Ocultar automáticamente después de 3 segundos
        setTimeout(function() {
            notification.addClass('translate-x-full');
            setTimeout(function() {
                notification.remove();
            }, 300);
        }, 3000);
    }
});
</script>


<?php
// Personalizar paginación si necesitas más control
function custom_woocommerce_pagination() {
    global $wp_query;
    
    if ($wp_query->max_num_pages <= 1) return;
    
    echo '<nav class="woocommerce-pagination">';
    echo paginate_links(array(
        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '← Anterior',
        'next_text' => 'Siguiente →',
        'type' => 'list',
        'end_size' => 2,
        'mid_size' => 1
    ));
    echo '</nav>';
}
?>

<?php
get_footer( 'shop' );
?>