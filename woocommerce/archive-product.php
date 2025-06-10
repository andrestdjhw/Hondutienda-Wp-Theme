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

    <!-- Custom Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-200 py-4 mb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <navigation class="flex items-center space-x-2 text-sm" aria-label="Breadcrumb">
            <!-- Home Icon -->
            <a href="<?php echo esc_url(home_url('/')); ?>" 
               class="group flex items-center text-gray-500 hover:text-[#0090D9] transition-colors duration-300">
                <svg class="w-5 h-5 mr-1 group-hover:scale-110 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
                <span class="font-medium">Inicio</span>
            </a>

            <!-- Separator -->
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
                        echo '<a href="' . esc_url(get_term_link($parent_cat)) . '" class="text-gray-500 hover:text-[#0090D9] transition-colors duration-300 font-medium hover:bg-gray-100 px-2 py-1 rounded">' . esc_html($parent_cat->name) . '</a>';
                        echo '<svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>';
                    }
                }
                
                // Categoría actual
                echo '<span class="bg-gradient-to-r from-[#57D0E1] to-[#0090D9] text-white px-3 py-1 rounded-full font-semibold text-sm shadow-md">' . esc_html($current_cat->name) . '</span>';
                
            } elseif (is_product_tag()) {
                // Si estamos en una etiqueta de producto
                $current_tag = get_queried_object();
                echo '<a href="' . esc_url(wc_get_page_permalink('shop')) . '" class="text-gray-500 hover:text-[#0090D9] transition-colors duration-300 font-medium hover:bg-gray-100 px-2 py-1 rounded">Tienda</a>';
                echo '<svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>';
                echo '<span class="bg-gradient-to-r from-[#57D0E1] to-[#0090D9] text-white px-3 py-1 rounded-full font-semibold text-sm shadow-md flex items-center">';
                echo '<svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>';
                echo esc_html($current_tag->name) . '</span>';
                
            } else {
                // Página principal de tienda
                echo '<span class="bg-gradient-to-r from-[#57D0E1] to-[#0090D9] text-white px-3 py-1 rounded-full font-semibold text-sm shadow-md flex items-center">';
                echo '<svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2L3 7v11a2 2 0 002 2h10a2 2 0 002-2V7l-7-5zM10 18V8.414L4 4.414V16h12V4.414L10 8.414V18z" clip-rule="evenodd"></path></svg>';
                echo 'Tienda</span>';
            }
            ?>
        </navigation>
        
        <!-- Información adicional -->
        <div class="mt-3 flex flex-wrap items-center gap-4">
            <?php if (is_product_category()) : 
                $current_cat = get_queried_object();
                if ($current_cat->description) : ?>
                    <p class="text-gray-600 text-sm bg-white px-3 py-1 rounded-lg border border-gray-200 shadow-sm">
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
                        // Obtener la URL correcta del producto para agregar al carrito
                        $add_to_cart_url = $product->add_to_cart_url();
                        $add_to_cart_text = $product->add_to_cart_text();
                        $product_type = $product->get_type();
                        
                        // Para productos simples, usar AJAX
                        if ($product_type === 'simple') :
                            ?>
                            <button 
                                type="button"
                                class="w-full bg-[#57D0E1] text-white py-2 px-4 rounded-lg hover:bg-[#0090D9] transition-colors duration-300 flex items-center justify-center add-to-cart-btn ajax_add_to_cart"
                                data-product_id="<?php echo esc_attr($product_id); ?>"
                                data-product_sku="<?php echo esc_attr($product->get_sku()); ?>"
                                data-quantity="1"
                                aria-label="<?php echo esc_html($add_to_cart_text); ?>"
                            >
                                <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <?php echo esc_html($add_to_cart_text); ?>
                            </button>
                        <?php else : 
                            // Para productos variables u otros tipos, ir a la página del producto
                            ?>
                            <a 
                                href="<?php echo esc_url($product_link); ?>" 
                                class="w-full bg-[#57D0E1] text-white py-2 px-4 rounded-lg hover:bg-[#0090D9] transition-colors duration-300 flex items-center justify-center"
                            >
                                <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <?php echo esc_html($add_to_cart_text); ?>
                            </a>
                        <?php endif; ?>
                        
                    <?php else : ?>
                        <button class="w-full bg-gray-400 text-white py-2 px-4 rounded-lg cursor-not-allowed" disabled>
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
/*do_action( 'woocommerce_sidebar' );*/
?>


<!-- Custom Pagination -->
<?php 
// Obtener información de paginación
global $wp_query;
$total_pages = $wp_query->max_num_pages;
$current_page = max(1, get_query_var('paged'));

if ($total_pages > 1) : 
?>
<div class="flex justify-center mt-16 mb-8 animate-fadeIn delay-400">
    <navigation class="flex items-center space-x-1" aria-label="Paginación">
        <?php
        // Botón anterior
        if ($current_page > 1) :
            $prev_link = get_pagenum_link($current_page - 1);
        ?>
            <a href="<?php echo esc_url($prev_link); ?>" 
               class="group flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg hover:bg-[#57D0E1] hover:border-[#57D0E1] hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
        <?php else : ?>
            <span class="flex items-center justify-center w-10 h-10 bg-gray-100 border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </span>
        <?php endif; ?>

        <?php
        // Lógica para mostrar números de página
        $start_page = max(1, $current_page - 2);
        $end_page = min($total_pages, $current_page + 2);
        
        // Mostrar primera página si no está en el rango
        if ($start_page > 1) : ?>
            <a href="<?php echo esc_url(get_pagenum_link(1)); ?>" 
               class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg hover:bg-[#57D0E1] hover:border-[#57D0E1] hover:text-white transition-all duration-300 text-gray-700 font-medium shadow-sm hover:shadow-md">
                1
            </a>
            <?php if ($start_page > 2) : ?>
                <span class="flex items-center justify-center w-10 h-10 text-gray-500">...</span>
            <?php endif; ?>
        <?php endif; ?>

        <?php
        // Mostrar páginas en el rango
        for ($i = $start_page; $i <= $end_page; $i++) :
            if ($i == $current_page) : ?>
                <span class="flex items-center justify-center w-10 h-10 bg-gradient-to-r from-[#57D0E1] to-[#0090D9] text-white rounded-lg font-bold shadow-md transform scale-110">
                    <?php echo $i; ?>
                </span>
            <?php else : ?>
                <a href="<?php echo esc_url(get_pagenum_link($i)); ?>" 
                   class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg hover:bg-[#57D0E1] hover:border-[#57D0E1] hover:text-white transition-all duration-300 text-gray-700 font-medium shadow-sm hover:shadow-md hover:scale-105">
                    <?php echo $i; ?>
                </a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php
        // Mostrar última página si no está en el rango
        if ($end_page < $total_pages) : ?>
            <?php if ($end_page < $total_pages - 1) : ?>
                <span class="flex items-center justify-center w-10 h-10 text-gray-500">...</span>
            <?php endif; ?>
            <a href="<?php echo esc_url(get_pagenum_link($total_pages)); ?>" 
               class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg hover:bg-[#57D0E1] hover:border-[#57D0E1] hover:text-white transition-all duration-300 text-gray-700 font-medium shadow-sm hover:shadow-md">
                <?php echo $total_pages; ?>
            </a>
        <?php endif; ?>

        <?php
        // Botón siguiente
        if ($current_page < $total_pages) :
            $next_link = get_pagenum_link($current_page + 1);
        ?>
            <a href="<?php echo esc_url($next_link); ?>" 
               class="group flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg hover:bg-[#57D0E1] hover:border-[#57D0E1] hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        <?php else : ?>
            <span class="flex items-center justify-center w-10 h-10 bg-gray-100 border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </span>
        <?php endif; ?>
    </navigation>
    
    <!-- Información de página actual -->
    <div class="ml-8 flex items-center text-sm text-gray-600">
        <span class="bg-gray-100 px-3 py-2 rounded-lg">
            Página <?php echo $current_page; ?> de <?php echo $total_pages; ?>
        </span>
    </div>
</div>

<!-- Información adicional de resultados -->
<div class="text-center text-gray-600 mb-8">
    <?php
    $posts_per_page = get_option('posts_per_page');
    $total_products = $wp_query->found_posts;
    $start_product = (($current_page - 1) * $posts_per_page) + 1;
    $end_product = min($current_page * $posts_per_page, $total_products);
    ?>
    <p class="text-sm">
        Mostrando <span class="font-semibold text-[#0090D9]"><?php echo $start_product; ?>-<?php echo $end_product; ?></span> 
        de <span class="font-semibold text-[#0090D9]"><?php echo $total_products; ?></span> productos
    </p>
</div>
<?php endif; ?>

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

    /* Estilos adicionales para paginación personalizada */
.pagination-container {
    perspective: 1000px;
}

/* Efecto hover mejorado para botones de paginación */
.navigation a:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(87, 208, 225, 0.3);
}

/* Animación para página activa */
.navigation span.active-page {
    animation: pulseGlow 2s infinite;
}

@keyframes pulseGlow {
    0%, 100% {
        box-shadow: 0 4px 15px rgba(87, 208, 225, 0.4);
    }
    50% {
        box-shadow: 0 6px 20px rgba(87, 208, 225, 0.6);
    }
}

/* Efecto de ripple al hacer click */
.navigation a {
    position: relative;
    overflow: hidden;
}

.navigation a::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transition: width 0.6s, height 0.6s;
    transform: translate(-50%, -50%);
}

.navigation a:active::before {
    width: 300px;
    height: 300px;
}

/* Responsive para móviles */
@media (max-width: 640px) {
    .navigation {
        flex-wrap: wrap;
        gap: 0.25rem;
    }
    
    .navigation a, navigation span {
        width: 2.25rem;
        height: 2.25rem;
        font-size: 0.875rem;
    }
    
    .pagination-info {
        margin-top: 1rem;
        margin-left: 0;
    }
}

/* Ocultar paginación por defecto de WooCommerce */
    .woocommerce-pagination {
        display: none !important;
    }

/* Ocultar breadcrumb por defecto de WooCommerce */
.woocommerce-breadcrumb {
    display: none !important;
}

/* Estilos para breadcrumb personalizado */
.breadcrumb-container {
    backdrop-filter: blur(10px);
}

/* Animación suave para los enlaces del breadcrumb */
.navigation a {
    position: relative;
    overflow: hidden;
}

.navigation a::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(87, 208, 225, 0.2), transparent);
    transition: left 0.5s;
}

.navigation a:hover::before {
    left: 100%;
}

/* Efecto de elevación para el breadcrumb activo */
.breadcrumb-active {
    animation: breadcrumbGlow 3s ease-in-out infinite;
}

@keyframes breadcrumbGlow {
    0%, 100% {
        box-shadow: 0 2px 8px rgba(87, 208, 225, 0.3);
    }
    50% {
        box-shadow: 0 4px 12px rgba(87, 208, 225, 0.5);
    }
}

/* Responsive para breadcrumb */
@media (max-width: 640px) {
    .breadcrumb-container navigation {
        flex-wrap: wrap;
        gap: 0.25rem;
    }
    
    .breadcrumb-container navigation span,
    .breadcrumb-container navigation a {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
    }
    
    .breadcrumb-container .mt-3 {
        margin-top: 0.75rem;
    }
    
    .breadcrumb-container .mt-3 > * {
        font-size: 0.75rem;
    }
}    
</style>

<script>
// JavaScript para manejar AJAX add to cart
jQuery(document).ready(function($) {
    // Manejar click en botón agregar al carrito
    $(document).on('click', '.ajax_add_to_cart', function(e) {
        e.preventDefault();
        
        var $button = $(this);
        var product_id = $button.data('product_id');
        var quantity = $button.data('quantity') || 1;
        
        // Validar que tenemos un product_id válido
        if (!product_id || product_id === '' || product_id === '0') {
            console.error('ID de producto inválido:', product_id);
            alert('Error: ID de producto inválido');
            return;
        }
        
        // Deshabilitar botón y mostrar loading
        $button.prop('disabled', true);
        var originalText = $button.html();
        $button.html('<svg class="animate-spin w-5 h-5 mr-2 inline" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Agregando...');
        
        // Realizar petición AJAX
        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'woocommerce_add_to_cart',
                product_id: product_id,
                quantity: quantity,
                product_sku: $button.data('product_sku') || '',
            },
            success: function(response) {
                if (response.error && response.product_url) {
                    window.location = response.product_url;
                    return;
                }
                
                // Actualizar fragmentos (carrito, etc.)
                if (response.fragments) {
                    $.each(response.fragments, function(key, value) {
                        $(key).replaceWith(value);
                    });
                }
                
                // Mostrar mensaje de éxito
                $button.html('<svg class="w-5 h-5 mr-2 inline" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>¡Agregado!');
                
                // Trigger events
                $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $button]);
                
                // Restaurar botón después de 2 segundos
                setTimeout(function() {
                    $button.html(originalText);
                    $button.prop('disabled', false);
                }, 2000);
            },
            error: function(xhr, status, error) {
                console.error('Error AJAX:', error);
                console.error('Response:', xhr.responseText);
                
                // Mostrar error
                $button.html('<svg class="w-5 h-5 mr-2 inline" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>Error');
                
                // Restaurar botón después de 3 segundos
                setTimeout(function() {
                    $button.html(originalText);
                    $button.prop('disabled', false);
                }, 3000);
            }
        });
    });
});
</script>

<?php get_footer( 'shop' ); ?>