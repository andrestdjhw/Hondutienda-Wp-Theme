<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until the main content
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Tailwind configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1E40AF', // Deep blue for a modern feel
                        secondary: '#FCC404', // Vibrant yellow for highlights
                        accent: '#FCC404', // Golden yellow to match secondary
                        dark: '#111827', // Near-black for footer bg
                        light: '#F9FAFB' // Light gray for backgrounds
                    },
                    boxShadow: {
                        'custom': '0 4px 12px rgba(0, 0, 0, 0.1)',
                        'hover': '0 6px 16px rgba(0, 0, 0, 0.15)'
                    },
                    animation: {
                        'fadeIn': 'fadeIn 0.3s ease-in-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(-10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        }
                    }
                }
            }
        }
    </script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site bg-light min-h-screen font-sans">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'your-theme-name'); ?></a>

    <header id="masthead" class="site-header sticky top-0 z-50 bg-white">
        <nav class="border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-24">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center transform transition-transform hover:scale-105">
                            <?php 
                                $uploads = wp_upload_dir();
                                $logo_url = esc_url($uploads['baseurl'] . '/2025/04/Recurso-27-300x169.png');
                            ?>
                            <img src="<?php echo $logo_url; ?>" alt="Hondutienda Logo" class="h-16 w-auto object-contain">
                        </a>
                    </div>

 <!-- Desktop Navigation -->
<div class="hidden lg:flex items-center space-x-10">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center space-x-2 text-dark hover:text-[#EA2626] font-medium py-2 transition-colors <?php echo is_front_page() ? 'border-b-2 border-[#EA2626]' : 'hover:border-b-2 hover:border-[#EA2626]'; ?>">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
        </svg>
        <span>Inicio</span>
    </a>
    <a href="<?php echo esc_url(home_url('/tienda')); ?>" class="flex items-center space-x-2 text-dark hover:text-[#EA2626] font-medium py-2 transition-colors <?php echo is_page('tienda') ? 'border-b-2 border-[#EA2626]' : 'hover:border-b-2 hover:border-[#EA2626]'; ?>">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
        </svg>
        <span>Tienda</span>
    </a>
    <a href="<?php echo esc_url(home_url('/nosotros')); ?>" class="flex items-center space-x-2 text-dark hover:text-[#EA2626] font-medium py-2 transition-colors <?php echo is_page('nosotros') ? 'border-b-2 border-[#EA2626]' : 'hover:border-b-2 hover:border-[#EA2626]'; ?>">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 22" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
        </svg>
        <span>Nosotros</span>
    </a>
    <a href="<?php echo esc_url(home_url('/carrito')); ?>" class="flex items-center space-x-2 text-dark hover:text-[#EA2626] font-medium py-2 transition-colors relative <?php echo is_page('carrito') ? 'border-b-2 border-[#EA2626]' : 'hover:border-b-2 hover:border-[#EA2626]'; ?>">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
        </svg>
        <span>Carrito</span>
        <?php if (function_exists('WC') && !is_null(WC()->cart)) : ?>
            <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
            <?php if ($cart_count > 0) : ?>
                <span class="absolute -top-2 -right-2 bg-[#EA2626] text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center"><?php echo esc_html($cart_count); ?></span>
            <?php endif; ?>
        <?php endif; ?>
    </a>
    <a href="<?php echo esc_url(home_url('/pagos')); ?>" class="flex items-center space-x-2 text-dark hover:text-[#EA2626] font-medium py-2 transition-colors <?php echo is_page('pagos') ? 'border-b-2 border-[#EA2626]' : 'hover:border-b-2 hover:border-[#EA2626]'; ?>">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
        </svg>
        <span>Pagos</span>
    </a>
</div>
                    <!-- Right Side: Search, Cart, and Mobile Menu Toggle -->
                    <div class="flex items-center space-x-4">
                        <!-- Search Icon -->
                        <button id="search-toggle" class="p-2 text-dark hover:text-[#EA2626] transition-colors" aria-label="Toggle search">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0-5.65a7 7 0 10-14 0 7 7 0 0014 0z"></path>
                            </svg>
                        </button>

                        <!-- Cart Icon -->
                        <a href="<?php echo esc_url(home_url('/carrito')); ?>" class="p-2 text-dark hover:text-[#EA2626] transition-colors relative" aria-label="Cart">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <?php if (function_exists('WC') && !is_null(WC()->cart)) : ?>
                                <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
                                <?php if ($cart_count > 0) : ?>
                                    <span class="absolute -top-2 -right-2 bg-[#EA2626] text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center"><?php echo esc_html($cart_count); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </a>

                        <!-- Mobile Menu Toggle -->
                        <div class="lg:hidden">
                            <button id="mobile-menu-toggle" class="p-2 text-dark hover:text-[#EA2626] transition-colors" aria-expanded="false" aria-controls="mobile-menu">
                                <svg id="menu-open-icon" class="w-6 h-6 block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                </svg>
                                <svg id="menu-close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Search Bar Mejorado con botón de mejor contraste -->
                <div id="search-bar" class="hidden bg-white p-6 shadow-lg rounded-b-lg border-t border-gray-100 animate-fadeIn">
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex items-center max-w-2xl mx-auto">
                        <div class="relative flex-grow">
                            <input type="search" name="s" placeholder="¿Qué estás buscando hoy?" 
                                class="w-full p-3 pl-12 rounded-l-full border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#EA2626] focus:border-transparent transition-all duration-300"
                                autocomplete="off">
                            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0-5.65a7 7 0 10-14 0 7 7 0 0014 0z"></path>
                            </svg>
                        </div>
                        <button type="submit" class="bg-[#EA2626] py-3 px-6 rounded-r-full text-dark font-bold hover:bg-[#EA2626] hover:bg-opacity-80 hover:shadow-md transform transition-all duration-300 hover:-translate-y-0.5">
                            Buscar
                        </button>
                    </form>
                </div>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden lg:hidden bg-white shadow-custom">
    <div class="px-4 py-6 space-y-4">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center space-x-3 text-dark hover:text-[#EA2626] font-medium py-2 transition-colors <?php echo is_front_page() ? 'bg-[#EA2626] text-white' : 'hover:bg-gray-100'; ?> rounded-md px-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
            </svg>
            <span>Inicio</span>
        </a>
        <a href="<?php echo esc_url(home_url('/tienda')); ?>" class="flex items-center space-x-3 text-dark hover:text-[#EA2626] font-medium py-2 transition-colors <?php echo is_page('tienda') ? 'bg-[#EA2626] text-white' : 'hover:bg-gray-100'; ?> rounded-md px-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
            <span>Tienda</span>
        </a>
        <a href="<?php echo esc_url(home_url('/nosotros')); ?>" class="flex items-center space-x-3 text-dark hover:text-[#EA2626] font-medium py-2 transition-colors <?php echo is_page('nosotros') ? 'bg-[#EA2626] text-white' : 'hover:bg-gray-100'; ?> rounded-md px-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <span>Nosotros</span>
        </a>
        <a href="<?php echo esc_url(home_url('/carrito')); ?>" class="flex items-center space-x-3 text-dark hover:text-[#EA2626] font-medium py-2 transition-colors relative <?php echo is_page('carrito') ? 'bg-[#EA2626] text-white' : 'hover:bg-gray-100'; ?> rounded-md px-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span>Carrito</span>
            <?php if (function_exists('WC') && !is_null(WC()->cart)) : ?>
                <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
                <?php if ($cart_count > 0) : ?>
                    <span class="absolute top-1 right-3 bg-[#EA2626] text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center"><?php echo esc_html($cart_count); ?></span>
                <?php endif; ?>
            <?php endif; ?>
        </a>
        <a href="<?php echo esc_url(home_url('/pagos')); ?>" class="flex items-center space-x-3 text-dark hover:text-[#EA2626] font-medium py-2 transition-colors <?php echo is_page('pagos') ? 'bg-[#EA2626] text-white' : 'hover:bg-gray-100'; ?> rounded-md px-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
            </svg>
            <span>Pagos</span>
        </a>
    </div>
</div>
            </div>
        </nav>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <!-- Main content starts here -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuOpenIcon = document.getElementById('menu-open-icon');
    const menuCloseIcon = document.getElementById('menu-close-icon');

    if (mobileMenuToggle && mobileMenu && menuOpenIcon && menuCloseIcon) {
        mobileMenuToggle.addEventListener('click', function() {
            const isExpanded = mobileMenuToggle.getAttribute('aria-expanded') === 'true';
            mobileMenuToggle.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('hidden');
            menuOpenIcon.classList.toggle('hidden');
            menuOpenIcon.classList.toggle('block');
            menuCloseIcon.classList.toggle('hidden');
            menuCloseIcon.classList.toggle('block');
        });
    }

    // Search bar toggle mejorado
    const searchToggle = document.getElementById('search-toggle');
    const searchBar = document.getElementById('search-bar');
    const searchInput = searchBar ? searchBar.querySelector('input[type="search"]') : null;

    if (searchToggle && searchBar && searchInput) {
        searchToggle.addEventListener('click', function() {
            searchBar.classList.toggle('hidden');
            if (!searchBar.classList.contains('hidden')) {
                // Focus en el input cuando se abre la barra de búsqueda
                setTimeout(() => {
                    searchInput.focus();
                }, 100);
            }
        });
        
        // Cerrar con ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !searchBar.classList.contains('hidden')) {
                searchBar.classList.add('hidden');
            }
        });
        
        // Click fuera para cerrar
        document.addEventListener('click', function(e) {
            if (!searchBar.contains(e.target) && !searchToggle.contains(e.target) && !searchBar.classList.contains('hidden')) {
                searchBar.classList.add('hidden');
            }
        });
    }

    // Add shadow on scroll
    window.addEventListener('scroll', function() {
        const header = document.getElementById('masthead');
        if (header) {
            header.classList.toggle('shadow-custom', window.scrollY > 20);
        }
    });
});
</script>