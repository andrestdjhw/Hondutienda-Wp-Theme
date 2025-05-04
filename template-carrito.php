<?php
/**
 * Template Name: Carrito Template
 * Template Post Type: page
 */
get_header(); ?>

<div class="cart-page">

    <section class="relative py-16 md:py-24 overflow-hidden bg-gradient-to-br from-primary via-blue-800 to-blue-900">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 -left-4 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 bg-yellow-600 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>
        

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fadeIn">
                    Tu <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 via-yellow-400 to-yellow-500">Carrito</span>
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

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <?php if(true) : // Cambiar a true cuando hay productos ?>
        <!-- Cart with Items -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 animate-fadeIn">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <!-- Cart Header -->
                    <div class="border-b border-gray-200 p-6 bg-gray-50">
                        <h2 class="text-xl font-bold text-gray-800">Tus Productos (3)</h2>
                    </div>
                    
                    <!-- Cart Items List -->
                    <div class="divide-y divide-gray-200">
                        <!-- Product 1 -->
                        <div class="p-6 flex flex-col sm:flex-row gap-6 hover:bg-gray-50 transition-colors duration-200">
                            <div class="w-24 h-24 flex-shrink-0 overflow-hidden rounded-lg">
                                <img 
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/products/coffee.jpg" 
                                    alt="Café Hondureño Premium" 
                                    class="w-full h-full object-cover"
                                >
                            </div>
                            
                            <div class="flex-grow">
                                <div class="flex justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-800">Café Hondureño Premium 250g</h3>
                                        <p class="text-gray-600 mt-1">Categoría: Alimentos</p>
                                    </div>
                                    <button class="text-gray-400 hover:text-red-500 transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="mt-4 flex items-center justify-between">
                                    <div class="flex items-center border border-gray-300 rounded-full">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100 rounded-l-full transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                            </svg>
                                        </button>
                                        <span class="w-10 text-center">2</span>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100 rounded-r-full transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <div class="text-right">
                                        <p class="text-lg font-bold text-dark">L 240</p>
                                        <p class="text-sm text-gray-500 line-through">L 300</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 2 -->
                        <div class="p-6 flex flex-col sm:flex-row gap-6 hover:bg-gray-50 transition-colors duration-200">
                            <div class="w-24 h-24 flex-shrink-0 overflow-hidden rounded-lg">
                                <img 
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/products/soap.jpg" 
                                    alt="Jabón de Tocador" 
                                    class="w-full h-full object-cover"
                                >
                            </div>
                            
                            <div class="flex-grow">
                                <div class="flex justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-800">Jabón de Tocador x3 unidades</h3>
                                        <p class="text-gray-600 mt-1">Categoría: Cuidado Personal</p>
                                    </div>
                                    <button class="text-gray-400 hover:text-red-500 transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="mt-4 flex items-center justify-between">
                                    <div class="flex items-center border border-gray-300 rounded-full">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100 rounded-l-full transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                            </svg>
                                        </button>
                                        <span class="w-10 text-center">1</span>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100 rounded-r-full transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <div class="text-right">
                                        <p class="text-lg font-bold text-dark">L 65</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 3 -->
                        <div class="p-6 flex flex-col sm:flex-row gap-6 hover:bg-gray-50 transition-colors duration-200">
                            <div class="w-24 h-24 flex-shrink-0 overflow-hidden rounded-lg">
                                <img 
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/products/cookies.jpg" 
                                    alt="Galletas María" 
                                    class="w-full h-full object-cover"
                                >
                            </div>
                            
                            <div class="flex-grow">
                                <div class="flex justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-800">Galletas María paquete familiar</h3>
                                        <p class="text-gray-600 mt-1">Categoría: Alimentos</p>
                                    </div>
                                    <button class="text-gray-400 hover:text-red-500 transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="mt-4 flex items-center justify-between">
                                    <div class="flex items-center border border-gray-300 rounded-full">
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100 rounded-l-full transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                            </svg>
                                        </button>
                                        <span class="w-10 text-center">3</span>
                                        <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100 rounded-r-full transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <div class="text-right">
                                        <p class="text-lg font-bold text-dark">L 135</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Cart Footer -->
                    <div class="p-6 bg-gray-50 border-t border-gray-200">
                        <button class="text-primary font-medium hover:text-blue-700 transition-colors duration-200 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                            </svg>
                            Seguir comprando
                        </button>
                    </div>
                </div>
                
                <!-- Coupon Code -->
                <div class="mt-6 bg-white rounded-xl shadow-sm p-6 animate-fadeIn delay-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">¿Tienes un código de descuento?</h3>
                    <div class="flex">
                        <input 
                            type="text" 
                            placeholder="Ingresa tu código" 
                            class="flex-grow px-4 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                        >
                        <button class="bg-primary text-white px-6 py-3 rounded-r-lg hover:bg-blue-700 transition-colors duration-200">
                            Aplicar
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="animate-fadeIn delay-200">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden sticky top-6">
                    <div class="border-b border-gray-200 p-6 bg-gray-50">
                        <h2 class="text-xl font-bold text-gray-800">Resumen de Pedido</h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium">L 440</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Descuento</span>
                                <span class="font-medium text-green-600">-L 60</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Envío</span>
                                <span class="font-medium">L 50</span>
                            </div>
                            <div class="border-t border-gray-200 pt-4 flex justify-between">
                                <span class="text-lg font-bold text-gray-800">Total</span>
                                <span class="text-lg font-bold text-dark">L 430</span>
                            </div>
                        </div>
                        
                        <button class="mt-6 w-full bg-secondary text-dark font-bold py-3 px-6 rounded-lg hover:bg-yellow-400 transition-colors duration-200">
                            Proceder al Pago
                        </button>
                        
                        <div class="mt-6 flex items-center justify-center space-x-4">
    <i class="fab fa-cc-visa text-blue-600 text-2xl"></i>
    <i class="fab fa-cc-mastercard text-red-500 text-2xl"></i>
    <i class="fab fa-cc-amex text-blue-400 text-2xl"></i>
</div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php else : ?>
        <!-- Empty Cart -->
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
                href="/tienda" 
                class="inline-block bg-primary text-white font-bold py-3 px-8 rounded-full hover:bg-blue-700 transition-colors duration-300"
            >
                Ir a la Tienda
            </a>
        </div>
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
</style>

<?php get_footer(); ?>