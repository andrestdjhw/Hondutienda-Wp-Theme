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
    <section class="relative py-16 md:py-24 overflow-hidden bg-gradient-to-br from-primary via-[#57D0E1] to-[#0090D9]">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 -left-4 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 bg-yellow-600 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>
        
        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fadeIn">
                    Nuestra <span class="bg-clip-text text-transparent bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200">Tienda</span>
                </h1>
                <p class="text-xl text-white opacity-90 max-w-3xl mx-auto animate-fadeIn delay-100">
                    Descubre los mejores productos hondureños con la comodidad de comprar desde tu hogar.
                </p>
            </div>
        </div>
        
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-12 md:h-20">
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

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
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
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 animate-fadeIn">
            <div class="flex items-center">
                <button class="md:hidden mr-4 text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                </button>
                <h2 class="text-xl font-bold text-gray-800">
                    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                        <?php woocommerce_page_title(); ?>
                    <?php else : ?>
                        Todos los Productos
                    <?php endif; ?>
                </h2>
            </div>
            
            <!-- WooCommerce sorting and result count -->
            <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto items-center">
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
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        
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
                
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-2 animate-fadeIn delay-<?php echo ($index % 4) * 100; ?> relative">
                    <?php if($featured_tag) : ?>
                        <div class="absolute top-4 right-4 bg-secondary text-dark text-xs font-bold px-3 py-1 rounded-full z-10">
                            <?php echo $featured_tag; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="h-48 overflow-hidden relative">
                        <?php if($product_image) : ?>
                            <img 
                                src="<?php echo $product_image[0]; ?>" 
                                alt="<?php echo esc_attr($product_name); ?>" 
                                class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                            />
                        <?php else : ?>
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">Sin imagen</span>
                            </div>
                        <?php endif; ?>
                        
                        <button class="absolute top-3 left-3 bg-white/80 backdrop-blur-sm rounded-full p-2 hover:bg-white transition-colors duration-300 wishlist-btn" data-product-id="<?php echo $product_id; ?>">
                            <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="p-6">
                        <!-- Rating -->
                        <div class="flex mb-1">
                            <?php for($i = 1; $i <= 5; $i++) : ?>
                                <svg class="w-4 h-4 <?php echo $i <= round($product_rating) ? 'text-yellow-400' : 'text-gray-300'; ?>" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            <?php endfor; ?>
                        </div>
                        
                        <!-- Product Name -->
                        <h3 class="font-bold text-gray-800 mb-2 line-clamp-2">
                            <a href="<?php echo esc_url($product_link); ?>" class="hover:text-[#0090D9] transition-colors duration-300">
                                <?php echo esc_html($product_name); ?>
                            </a>
                        </h3>
                        
                        <!-- Price -->
                        <div class="flex items-center mb-4">
                            <?php echo $product_price; ?>
                        </div>
                        
                        <!-- Add to Cart Button -->
                        <?php if($product->is_purchasable() && $product->is_in_stock()) : ?>
                            <?php
                            echo apply_filters(
                                'woocommerce_loop_add_to_cart_link',
                                sprintf(
                                    '<a href="%s" data-quantity="%s" class="%s" %s><svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>%s</a>',
                                    esc_url( $product->add_to_cart_url() ),
                                    esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                                    esc_attr( 'w-full bg-[#57D0E1] text-white py-2 px-4 rounded-lg hover:bg-[#0090D9] transition-colors duration-300 flex items-center justify-center add-to-cart-btn' ),
                                    isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                                    esc_html( $product->add_to_cart_text() )
                                ),
                                $product,
                                $args ?? []
                            );
                            ?>
                        <?php else : ?>
                            <button class="w-full bg-gray-400 text-white py-2 px-4 rounded-lg cursor-not-allowed" disabled>
                                Agotado
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
    
    <div class="col-span-full text-center py-12">
        <p class="text-gray-500 text-lg">No se encontraron productos.</p>
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
    <section class="bg-gradient-to-r from-[#EA2626] to-red-500 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="bg-white/20 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white">¡Conoce más sobre nosotros!</h3>
                </div>
                <button class="bg-white text-yellow-600 font-bold py-2 px-6 rounded-full hover:bg-gray-100 transition-colors duration-300">
                    Conoce más
                </button>
            </div>
        </div>
    </section>
</div>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );
?>

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
    
    .delay-300 {
        animation-delay: 0.3s;
    }
    
    .delay-400 {
        animation-delay: 0.4s;
    }
    
    /* Hide default WooCommerce elements that we're customizing */
    .woocommerce-result-count,
    .woocommerce-ordering {
        display: none;
    }
    
    /* Style WooCommerce notices */
    .woocommerce-notices-wrapper {
        margin-bottom: 1rem;
    }
    
    .woocommerce-info,
    .woocommerce-message,
    .woocommerce-error {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 0.5rem;
    }
    
    .woocommerce-info {
        background-color: #dbeafe;
        border-left: 4px solid #3b82f6;
        color: #1e40af;
    }
    
    .woocommerce-message {
        background-color: #dcfce7;
        border-left: 4px solid #16a34a;
        color: #15803d;
    }
    
    .woocommerce-error {
        background-color: #fef2f2;
        border-left: 4px solid #dc2626;
        color: #dc2626;
    }
</style>

<?php get_footer( 'shop' ); ?>