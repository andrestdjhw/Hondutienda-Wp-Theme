<?php

function boilerplate_load_assets() {
  wp_enqueue_script('ourmainjs', get_theme_file_uri('/build/index.js'), array('wp-element', 'react-jsx-runtime'), '1.0', true);
  wp_enqueue_style('ourmaincss', get_theme_file_uri('/build/index.css'));

  if(class_exists('WooCommerce')){
    wp_enqueue_script('wc-add-to-cart');
    wp_enqueue_script('wc-cart-fragments');
  }
}

add_action('wp_enqueue_scripts', 'boilerplate_load_assets');

function boilerplate_add_support() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'boilerplate_add_support');

add_action('after_setup_theme', function() {
    add_theme_support('woocommerce');
});

function cargar_font_awesome() {
  wp_enqueue_style(
      'font-awesome',
      get_template_directory_uri() . '/node_modules/@fortawesome/fontawesome-free/css/all.min.css'
  );
}
add_action('wp_enqueue_scripts', 'cargar_font_awesome');

function hondutienda_customize_register($wp_customize) {
  // Nosotros Section
  $wp_customize->add_section('nosotros_section', array(
      'title'    => __('Página Nosotros', 'hondutienda'),
      'priority' => 130,
  ));

  // Historia texto
  $wp_customize->add_setting('nosotros_history', array(
      'default'   => 'Nuestra tienda nació en el verano del 2020, en medio de una situación mundial desafiante. Desde entonces, hemos trabajado incansablemente para que los productos hondureños estén al alcance de todos.',
      'transport' => 'refresh',
  ));

  $wp_customize->add_control('nosotros_history', array(
      'label'    => __('Historia (Primer párrafo)', 'hondutienda'),
      'section'  => 'nosotros_section',
      'type'     => 'textarea',
  ));

  // Historia continuación
  $wp_customize->add_setting('nosotros_history_continued', array(
      'default'   => 'Lo que comenzó como un pequeño emprendimiento ha crecido hasta convertirse en una plataforma confiable donde la innovación se encuentra con la tradición hondureña.',
      'transport' => 'refresh',
  ));

  $wp_customize->add_control('nosotros_history_continued', array(
      'label'    => __('Historia (Segundo párrafo)', 'hondutienda'),
      'section'  => 'nosotros_section',
      'type'     => 'textarea',
  ));

  // Imagen principal
  $wp_customize->add_setting('nosotros_image_url', array(
      'default'   => '',
      'transport' => 'refresh',
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'nosotros_image_url', array(
      'label'    => __('Imagen Principal', 'hondutienda'),
      'section'  => 'nosotros_section',
      'settings' => 'nosotros_image_url',
  )));
}
add_action('customize_register', 'hondutienda_customize_register');

// Process Contact Form
function process_contact_form() {
  // Verify nonce
  if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
      wp_send_json_error('Invalid security token');
      return;
  }
  
  // Sanitize data
  $first_name = sanitize_text_field($_POST['first_name']);
  $last_name = sanitize_text_field($_POST['last_name']);
  $email = sanitize_email($_POST['email']);
  $phone = sanitize_text_field($_POST['phone']);
  $subject = sanitize_text_field($_POST['subject']);
  $message = sanitize_textarea_field($_POST['message']);
  
  // Validation
  if (empty($first_name) || empty($last_name) || empty($email) || empty($subject) || empty($message)) {
      wp_send_json_error('Please fill in all required fields');
      return;
  }
  
  if (!is_email($email)) {
      wp_send_json_error('Please provide a valid email address');
      return;
  }
  
  // Prepare email
  $to = get_option('admin_email');
  $email_subject = '[Hondutienda Contact Form] ' . $subject;
  $email_body = "First Name: $first_name\n";
  $email_body .= "Last Name: $last_name\n";
  $email_body .= "Email: $email\n";
  $email_body .= "Phone: $phone\n";
  $email_body .= "Subject: $subject\n\n";
  $email_body .= "Message:\n$message";
  
  $headers = array(
      'Content-Type: text/plain; charset=UTF-8',
      'From: ' . $first_name . ' ' . $last_name . ' <' . $email . '>',
      'Reply-To: ' . $email
  );
  
  // Send email
  $sent = wp_mail($to, $email_subject, $email_body, $headers);
  
  if ($sent) {
      wp_send_json_success('Message sent successfully');
  } else {
      wp_send_json_error('Failed to send message');
  }
}
add_action('wp_ajax_process_contact_form', 'process_contact_form');
add_action('wp_ajax_nopriv_process_contact_form', 'process_contact_form');

// Add Customizer settings for contact information
function hondutienda_customize_contact_info($wp_customize) {
  // Contact Section
  $wp_customize->add_section('contact_info_section', array(
      'title'    => __('Contact Information', 'hondutienda'),
      'priority' => 140,
  ));
  
  // Email
  $wp_customize->add_setting('contact_email', array(
      'default'   => 'contacto@hondutienda.com',
      'transport' => 'refresh',
  ));
  
  $wp_customize->add_control('contact_email', array(
      'label'    => __('Email Address', 'hondutienda'),
      'section'  => 'contact_info_section',
      'type'     => 'email',
  ));
  
  // Phone
  $wp_customize->add_setting('contact_phone', array(
      'default'   => '+504 9999-9999',
      'transport' => 'refresh',
  ));
  
  $wp_customize->add_control('contact_phone', array(
      'label'    => __('Phone Number', 'hondutienda'),
      'section'  => 'contact_info_section',
      'type'     => 'text',
  ));
  
  // Location
  $wp_customize->add_setting('contact_location', array(
      'default'   => 'Tegucigalpa, Honduras',
      'transport' => 'refresh',
  ));
  
  $wp_customize->add_control('contact_location', array(
      'label'    => __('Location', 'hondutienda'),
      'section'  => 'contact_info_section',
      'type'     => 'text',
  ));
  
  // Hours
  $wp_customize->add_setting('contact_hours', array(
      'default'   => 'Lun - Sáb: 9:00 AM - 6:00 PM',
      'transport' => 'refresh',
  ));
  
  $wp_customize->add_control('contact_hours', array(
      'label'    => __('Business Hours', 'hondutienda'),
      'section'  => 'contact_info_section',
      'type'     => 'textarea',
  ));
}
add_action('customize_register', 'hondutienda_customize_contact_info');

function mytheme_add_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Handle cart fragments
function mytheme_woocommerce_header_add_to_cart_fragment($fragments) {
    $fragments['span.cart-count'] = '<span class="cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'mytheme_woocommerce_header_add_to_cart_fragment');

// Add product class to items
function mytheme_woocommerce_post_class($classes) {
    $classes[] = 'bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300';
    return $classes;
}
add_filter('product_cat_class', 'mytheme_woocommerce_post_class');

// Enqueue scripts para WooCommerce
function hondutienda_enqueue_woocommerce_scripts() {
    if (is_woocommerce() || is_cart() || is_page_template('template-tienda.php')) {
        wp_enqueue_script('wc-add-to-cart');
        wp_enqueue_script('wc-add-to-cart-variation');
        
        // Pasar variables necesarias al JavaScript
        wp_localize_script('wc-add-to-cart', 'wc_add_to_cart_params', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'wc_ajax_url' => WC_AJAX::get_endpoint('%%endpoint%%'),
            'i18n_view_cart' => esc_attr__('Ver carrito', 'woocommerce'),
            'cart_url' => apply_filters('woocommerce_add_to_cart_redirect', wc_get_cart_url(), null),
            'is_cart' => is_cart(),
            'cart_redirect_after_add' => get_option('woocommerce_cart_redirect_after_add')
        ));
    }
}
add_action('wp_enqueue_scripts', 'hondutienda_enqueue_woocommerce_scripts');

// Handler AJAX para añadir productos al carrito
function hondutienda_ajax_add_to_cart() {
    if (!wp_verify_nonce($_POST['nonce'], 'add_to_cart_nonce')) {
        wp_die('Security check failed');
    }
    
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    
    if ($product_id > 0) {
        $result = WC()->cart->add_to_cart($product_id, $quantity);
        
        if ($result) {
            $cart_count = WC()->cart->get_cart_contents_count();
            $cart_total = WC()->cart->get_cart_total();
            
            wp_send_json_success(array(
                'message' => 'Producto añadido al carrito',
                'cart_count' => $cart_count,
                'cart_total' => $cart_total,
                'fragments' => apply_filters('woocommerce_add_to_cart_fragments', array())
            ));
        } else {
            wp_send_json_error(array('message' => 'Error al añadir el producto'));
        }
    } else {
        wp_send_json_error(array('message' => 'ID de producto inválido'));
    }
    
    wp_die();
}
add_action('wp_ajax_hondutienda_add_to_cart', 'hondutienda_ajax_add_to_cart');
add_action('wp_ajax_nopriv_hondutienda_add_to_cart', 'hondutienda_ajax_add_to_cart');

// Añadir soporte para WooCommerce si no está ya
function hondutienda_add_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'hondutienda_add_woocommerce_support');

// Personalizar la cantidad de productos por página en la tienda
function hondutienda_products_per_page($cols) {
    return 16; // Cambia este número según necesites
}
add_filter('loop_shop_per_page', 'hondutienda_products_per_page', 20);

// Función helper para obtener el rating de un producto
function hondutienda_get_product_rating($product_id) {
    $product = wc_get_product($product_id);
    if ($product) {
        return $product->get_average_rating();
    }
    return 0;
}

// Función helper para verificar si un producto está en oferta
function hondutienda_is_product_on_sale($product_id) {
    $product = wc_get_product($product_id);
    if ($product) {
        return $product->is_on_sale();
    }
    return false;
}

// Personalizar los hooks de WooCommerce para mantener tu diseño
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Filtro para personalizar el HTML de la paginación
function hondutienda_custom_pagination($links) {
    if (is_array($links)) {
        $pagination_html = '';
        foreach ($links as $link) {
            if (strpos($link, 'current') !== false) {
                $pagination_html .= '<button class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0090D9] text-white font-medium">' . strip_tags($link) . '</button>';
            } elseif (strpos($link, 'prev') !== false || strpos($link, 'next') !== false) {
                $pagination_html .= str_replace('page-numbers', 'w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-[#0090D9] hover:text-white transition-colors duration-300', $link);
            } else {
                $pagination_html .= str_replace('page-numbers', 'w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors duration-300 font-medium', $link);
            }
        }
        return $pagination_html;
    }
    return $links;
}

// Script mejorado para el AJAX del carrito
function hondutienda_add_cart_scripts() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // Manejar click en botones de añadir al carrito
        $(document).on('click', '.add-to-cart-btn', function(e) {
            e.preventDefault();
            
            var $button = $(this);
            var product_id = $button.data('product-id');
            var product_name = $button.data('product-name');
            var quantity = 1;
            
            // Cambiar estado del botón
            var original_text = $button.html();
            $button.html('<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Añadiendo...');
            $button.prop('disabled', true);
            
            // AJAX request
            $.ajax({
                type: 'POST',
                url: wc_add_to_cart_params.ajax_url,
                data: {
                    action: 'hondutienda_add_to_cart',
                    product_id: product_id,
                    quantity: quantity,
                    nonce: '<?php echo wp_create_nonce("add_to_cart_nonce"); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        // Éxito
                        $button.html('✓ Añadido');
                        $button.removeClass('bg-[#57D0E1] hover:bg-[#0090D9]').addClass('bg-green-500');
                        
                        // Actualizar contador del carrito si existe
                        if ($('.cart-count').length) {
                            $('.cart-count').text(response.data.cart_count);
                        }
                        
                        // Mostrar notificación
                        showNotification('Producto añadido al carrito', 'success');
                        
                        // Restaurar botón después de 2 segundos
                        setTimeout(function() {
                            $button.html(original_text);
                            $button.removeClass('bg-green-500').addClass('bg-[#57D0E1] hover:bg-[#0090D9]');
                            $button.prop('disabled', false);
                        }, 2000);
                        
                    } else {
                        // Error
                        $button.html('Error');
                        showNotification(response.data.message || 'Error al añadir producto', 'error');
                        setTimeout(function() {
                            $button.html(original_text);
                            $button.prop('disabled', false);
                        }, 2000);
                    }
                },
                error: function() {
                    $button.html('Error');
                    showNotification('Error de conexión', 'error');
                    setTimeout(function() {
                        $button.html(original_text);
                        $button.prop('disabled', false);
                    }, 2000);
                }
            });
        });
        
        // Función para mostrar notificaciones
        function showNotification(message, type) {
            var bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
            var notification = $('<div class="fixed top-4 right-4 ' + bgColor + ' text-white px-6 py-3 rounded-lg shadow-lg z-50 notification">' + message + '</div>');
            
            $('body').append(notification);
            
            // Animar entrada
            notification.animate({opacity: 1}, 300);
            
            // Remover después de 3 segundos
            setTimeout(function() {
                notification.animate({opacity: 0}, 300, function() {
                    $(this).remove();
                });
            }, 3000);
        }
        
        // Manejar filtros de categoría
        $('.category-filter').on('change', function() {
            var category = $(this).val();
            if (category && category !== 'Categorías') {
                window.location.href = '<?php echo get_permalink(); ?>?product_cat=' + category;
            }
        });
        
        // Manejar ordenamiento
        $('.sort-filter').on('change', function() {
            var orderby = $(this).val();
            var url = new URL(window.location);
            if (orderby && orderby !== 'Ordenar por') {
                url.searchParams.set('orderby', orderby);
                window.location.href = url.toString();
            }
        });
    });
    </script>
    
    <style>
    .notification {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    </style>
    <?php
}
add_action('wp_footer', 'hondutienda_add_cart_scripts');

// Función para manejar filtros y ordenamiento en la tienda
function hondutienda_handle_shop_filters($query) {
    if (!is_admin() && $query->is_main_query() && is_page_template('template-tienda.php')) {
        
        // Filtro por categoría
        if (isset($_GET['product_cat']) && !empty($_GET['product_cat'])) {
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => sanitize_text_field($_GET['product_cat']),
                ),
            ));
        }
        
        // Ordenamiento
        if (isset($_GET['orderby']) && !empty($_GET['orderby'])) {
            switch ($_GET['orderby']) {
                case 'price':
                    $query->set('meta_key', '_price');
                    $query->set('orderby', 'meta_value_num');
                    $query->set('order', 'ASC');
                    break;
                case 'price-desc':
                    $query->set('meta_key', '_price');
                    $query->set('orderby', 'meta_value_num');
                    $query->set('order', 'DESC');
                    break;
                case 'popularity':
                    $query->set('meta_key', 'total_sales');
                    $query->set('orderby', 'meta_value_num');
                    $query->set('order', 'DESC');
                    break;
                case 'date':
                    $query->set('orderby', 'date');
                    $query->set('order', 'DESC');
                    break;
            }
        }
    }
}
add_action('pre_get_posts', 'hondutienda_handle_shop_filters');

// Personalizar el archivo content-product.php si es necesario
function hondutienda_custom_product_content() {
    // Esta función se puede usar para personalizar aún más el contenido del producto
    // si necesitas override adicionales de WooCommerce
}

// Añadir clases CSS personalizadas a los elementos de WooCommerce
function hondutienda_add_custom_woocommerce_classes($classes) {
    if (is_shop() || is_product_category() || is_page_template('template-tienda.php')) {
        $classes[] = 'hondutienda-shop';
    }
    return $classes;
}
add_filter('body_class', 'hondutienda_add_custom_woocommerce_classes');