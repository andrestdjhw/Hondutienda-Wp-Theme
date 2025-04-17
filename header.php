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
    <!-- Add custom Tailwind configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#57D0E1',
                        secondary: '#FCC404',
                        accent: '#0090D9',
                        dark: '#333333',
                        light: '#F9FAFB'
                    },
                    boxShadow: {
                        'nav': '0 4px 6px -1px rgba(0, 0, 0, 0.05)',
                        'glow': '0 0 15px rgba(87, 208, 225, 0.4)'
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom animations and styles */
        .link-hover {
            position: relative;
        }
        .link-hover::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #FCC404;
            transition: width 0.3s ease;
        }
        .link-hover:hover::after {
            width: 100%;
        }
        
        /* Add depth with subtle shadow to navigation */
        .nav-shadow {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        
        /* Smooth transitions */
        .transition-all {
            transition: all 0.3s ease;
        }
        
        /* Mobile menu animation */
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .slide-down {
            animation: slideDown 0.3s ease forwards;
        }
        
        /* Active state styling */
        .active-nav-item {
            font-weight: 600;
            color: #FCC404;
            position: relative;
        }
        .active-nav-item::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #FCC404;
        }
        
        /* Cart badge */
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 18px;
            height: 18px;
            background-color: #FCC404;
            border-radius: 50%;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            font-weight: bold;
        }
        
        /* Logo hover effect */
        .logo-hover:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site bg-light min-h-screen font-sans">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'your-theme-name'); ?></a>

    <header id="masthead" class="site-header sticky top-0 z-50">
        <nav class="bg-gradient-to-r from-primary to-accent nav-shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Logo and desktop navigation -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center logo-hover">
                            <?php
                            if (has_custom_logo()) :
                                the_custom_logo();
                            else :
                            ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-black font-bold text-xl transition-all hover:text-secondary">
                                    <?php bloginfo('name'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="hidden md:ml-8 md:flex md:space-x-8">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center <?php echo is_front_page() ? 'active-nav-item' : 'link-hover text-black hover:text-black'; ?> px-1 pt-1 text-sm font-medium transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Inicio
                            </a>
                            <a href="<?php echo esc_url(home_url('/tienda')); ?>" class="flex items-center <?php echo is_page('tienda') ? 'active-nav-item' : 'link-hover text-black hover:text-black'; ?> px-1 pt-1 text-sm font-medium transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 3h18v18H3zM3 9h18M9 21V9"></path>
                                </svg>
                                Tienda
                            </a>
                            <a href="<?php echo esc_url(home_url('/nosotros')); ?>" class="flex items-center <?php echo is_page('nosotros') ? 'active-nav-item' : 'link-hover text-black hover:text-black'; ?> px-1 pt-1 text-sm font-medium transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                Nosotros
                            </a>
                            <a href="<?php echo esc_url(home_url('/carrito')); ?>" class="flex items-center <?php echo is_page('carrito') ? 'active-nav-item' : 'link-hover text-black hover:text-black'; ?> px-1 pt-1 text-sm font-medium transition-all">
                                <span class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="9" cy="21" r="1"></circle>
                                        <circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg>
                                    <?php if (function_exists('WC') && !is_null(WC()->cart)) : ?>
                                        <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
                                        <?php if ($cart_count > 0) : ?>
                                            <span class="cart-badge"><?php echo esc_html($cart_count); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </span>
                                Carrito
                            </a>
                            <a href="<?php echo esc_url(home_url('/pago')); ?>" class="flex items-center <?php echo is_page('pago') ? 'active-nav-item' : 'link-hover text-black hover:text-black'; ?> px-1 pt-1 text-sm font-medium transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                                Pago
                            </a>
                        </div>
                    </div>
                    
                    <!-- Shopping cart icon for quick access -->
                    <div class="flex items-center">
                        <a href="<?php echo esc_url(home_url('/carrito')); ?>" class="p-2 text-black hover:text-secondary transition-all relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <?php if (function_exists('WC') && !is_null(WC()->cart)) : ?>
                                <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
                                <?php if ($cart_count > 0) : ?>
                                    <span class="cart-badge"><?php echo esc_html($cart_count); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </a>
                        
                        <!-- Mobile menu button -->
                        <div class="md:hidden">
                            <button id="mobile-menu-toggle" class="p-2 rounded-md text-black hover:text-secondary focus:outline-none transition-all ml-2 hover:shadow-glow" aria-expanded="false" aria-controls="mobile-menu">
                                <svg xmlns="http://www.w3.org/2000/svg" id="menu-open-icon" class="block h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="3" y1="12" x2="21" y2="12"></line>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <line x1="3" y1="18" x2="21" y2="18"></line>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" id="menu-close-icon" class="hidden h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div id="mobile-menu" class="hidden md:hidden slide-down">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white rounded-b-lg shadow-lg">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo is_front_page() ? 'bg-accent text-black' : 'text-dark hover:bg-gray-100'; ?> block px-3 py-3 rounded-md text-base font-medium transition-all">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            Inicio
                        </div>
                    </a>
                    <a href="<?php echo esc_url(home_url('/tienda')); ?>" class="<?php echo is_page('tienda') ? 'bg-accent text-black' : 'text-dark hover:bg-gray-100'; ?> block px-3 py-3 rounded-md text-base font-medium transition-all">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 3h18v18H3zM3 9h18M9 21V9"></path>
                            </svg>
                            Tienda
                        </div>
                    </a>
                    <a href="<?php echo esc_url(home_url('/nosotros')); ?>" class="<?php echo is_page('nosotros') ? 'bg-accent text-black' : 'text-dark hover:bg-gray-100'; ?> block px-3 py-3 rounded-md text-base font-medium transition-all">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            Nosotros
                        </div>
                    </a>
                    <a href="<?php echo esc_url(home_url('/carrito')); ?>" class="<?php echo is_page('carrito') ? 'bg-accent text-black' : 'text-dark hover:bg-gray-100'; ?> block px-3 py-3 rounded-md text-base font-medium transition-all">
                        <div class="flex items-center">
                            <span class="relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <?php if (function_exists('WC') && !is_null(WC()->cart)) : ?>
                                    <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
                                    <?php if ($cart_count > 0) : ?>
                                        <span class="cart-badge"><?php echo esc_html($cart_count); ?></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </span>
                            Carrito
                        </div>
                    </a>
                    <a href="<?php echo esc_url(home_url('/pago')); ?>" class="<?php echo is_page('pago') ? 'bg-accent text-black' : 'text-dark hover:bg-gray-100'; ?> block px-3 py-3 rounded-md text-base font-medium transition-all">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            Pago
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <!-- Main content starts here -->

<script>
    // Mobile menu toggle functionality with enhanced animations
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOpenIcon = document.getElementById('menu-open-icon');
        const menuCloseIcon = document.getElementById('menu-close-icon');

        if (mobileMenuToggle && mobileMenu && menuOpenIcon && menuCloseIcon) {
            mobileMenuToggle.addEventListener('click', function() {
                const isExpanded = mobileMenuToggle.getAttribute('aria-expanded') === 'true';
                
                mobileMenuToggle.setAttribute('aria-expanded', !isExpanded);
                
                if (isExpanded) {
                    // Animate closing
                    mobileMenu.style.opacity = '0';
                    mobileMenu.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 200);
                } else {
                    // Animate opening
                    mobileMenu.classList.remove('hidden');
                    setTimeout(() => {
                        mobileMenu.style.opacity = '1';
                        mobileMenu.style.transform = 'translateY(0)';
                    }, 10);
                }
                
                // Toggle icons
                menuOpenIcon.classList.toggle('hidden');
                menuOpenIcon.classList.toggle('block');
                menuCloseIcon.classList.toggle('hidden');
                menuCloseIcon.classList.toggle('block');
            });
        }
        
        // Optional: Add scroll behavior to make navbar change on scroll
        window.addEventListener('scroll', function() {
            const header = document.getElementById('masthead');
            if (header) {
                if (window.scrollY > 20) {
                    header.classList.add('shadow-md');
                } else {
                    header.classList.remove('shadow-md');
                }
            }
        });
    });
</script>