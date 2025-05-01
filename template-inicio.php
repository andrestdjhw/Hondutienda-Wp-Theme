<?php
/**
 * Template Name: Home Template
 * Template Post Type: page
 */

get_header(); ?>

<div class="home-page">
    <!-- Hero Section with Product Showcase -->
    <section class="relative py-16 md:py-24 overflow-hidden bg-gradient-to-br from-primary via-blue-800 to-blue-900">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 -left-4 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 bg-yellow-600 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>
        
        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-center md:text-left">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fadeIn">
                        Bienvenido a <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 via-yellow-400 to-yellow-500">Hondutienda</span>
                    </h1>
                    <p class="text-xl text-white opacity-90 mb-8 animate-fadeIn delay-100">
                        Tu minimarket en línea con los mejores productos hondureños a un clic de distancia.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start animate-fadeIn delay-200">
                        <a href="/tienda" class="inline-block bg-secondary text-dark font-bold py-3 px-8 rounded-full hover:bg-yellow-400 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Comprar Ahora
                        </a>
                        <a href="#featured" class="inline-block bg-transparent border-2 border-white text-white font-bold py-3 px-8 rounded-full hover:bg-white hover:text-dark transition-all duration-300 transform hover:scale-105">
                            Ver Ofertas
                        </a>
                    </div>
                </div>
                
                <!-- Hero Image with Floating Animation -->
                <div class="relative hidden md:block animate-float">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-products.png" alt="Productos Hondutienda" class="w-full max-w-md mx-auto">
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-yellow-400 rounded-full opacity-20 animate-ping"></div>
                    <div class="absolute -bottom-6 -right-6 w-20 h-20 bg-blue-300 rounded-full opacity-20 animate-ping" style="animation-delay: 1s;"></div>
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

   <!-- Featured Categories -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12 animate-fadeIn">Explora Nuestras Categorías</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php
                $categories = array(
                    array('name' => 'Alimentos', 'icon' => '🍔', 'color' => 'bg-red-100', 'hover' => 'bg-red-200'),
                    array('name' => 'Bebidas', 'icon' => '🥤', 'color' => 'bg-blue-100', 'hover' => 'bg-blue-200'),
                    array('name' => 'Limpieza', 'icon' => '🧼', 'color' => 'bg-green-100', 'hover' => 'bg-green-200'),
                    array('name' => 'Cuidado Personal', 'icon' => '🧴', 'color' => 'bg-purple-100', 'hover' => 'bg-purple-200'),
                    array('name' => 'Snacks', 'icon' => '🍫', 'color' => 'bg-yellow-100', 'hover' => 'bg-yellow-200'),
                    array('name' => 'Hogar', 'icon' => '🏠', 'color' => 'bg-indigo-100', 'hover' => 'bg-indigo-200'),
                    array('name' => 'Electrónica', 'icon' => '📱', 'color' => 'bg-gray-100', 'hover' => 'bg-gray-200'),
                    array('name' => 'Otros', 'icon' => '📦', 'color' => 'bg-pink-100', 'hover' => 'bg-pink-200')
                );
                
                foreach($categories as $index => $category) : ?>
                <a 
                    href="/tienda?category=<?php echo strtolower(str_replace(' ', '-', $category['name'])); ?>" 
                    class="block p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 text-center transform hover:-translate-y-1 animate-fadeIn delay-<?php echo ($index % 4) * 100; ?> <?php echo $category['color']; ?> hover:<?php echo $category['hover']; ?>"
                >
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full <?php echo $category['color']; ?> hover:<?php echo $category['hover']; ?> flex items-center justify-center text-3xl transition-colors duration-300">
                        <?php echo $category['icon']; ?>
                    </div>
                    <h3 class="font-bold text-gray-800"><?php echo $category['name']; ?></h3>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
    <!-- Featured Products -->
    <section id="featured" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 animate-fadeIn">Productos Destacados</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fadeIn delay-100">Los productos más populares de nuestra tienda</p>
            </div>
            
            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                    $featured_products = array(
                        array(
                            'name' => 'Café Hondureño Premium',
                            'price' => 'L 120',
                            'old_price' => 'L 150',
                            'image' => get_template_directory_uri() . '/assets/images/products/coffee.jpg',
                            'tag' => 'Oferta'
                        ),
                        array(
                            'name' => 'Jabón de Tocador',
                            'price' => 'L 25',
                            'image' => get_template_directory_uri() . '/assets/images/products/soap.jpg'
                        ),
                        array(
                            'name' => 'Galletas María',
                            'price' => 'L 45',
                            'image' => get_template_directory_uri() . '/assets/images/products/cookies.jpg'
                        ),
                        array(
                            'name' => 'Refresco en Lata',
                            'price' => 'L 30',
                            'old_price' => 'L 35',
                            'image' => get_template_directory_uri() . '/assets/images/products/soda.jpg',
                            'tag' => 'Popular'
                        )
                    );
                    
                    foreach($featured_products as $index => $product) : ?>
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-2 animate-fadeIn delay-<?php echo ($index % 4) * 100; ?>">
                        <?php if(isset($product['tag'])) : ?>
                            <div class="absolute top-4 right-4 bg-secondary text-dark text-xs font-bold px-3 py-1 rounded-full z-10">
                                <?php echo $product['tag']; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="h-48 overflow-hidden">
                            <img 
                                src="<?php echo $product['image']; ?>" 
                                alt="<?php echo $product['name']; ?>" 
                                class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                            />
                        </div>
                        
                        <div class="p-6">
                            <h3 class="font-bold text-gray-800 mb-2"><?php echo $product['name']; ?></h3>
                            <div class="flex items-center">
                                <span class="text-lg font-bold text-dark"><?php echo $product['price']; ?></span>
                                <?php if(isset($product['old_price'])) : ?>
                                    <span class="ml-2 text-sm text-gray-500 line-through"><?php echo $product['old_price']; ?></span>
                                <?php endif; ?>
                            </div>
                            <button class="mt-4 w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                                Añadir al Carrito
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center mt-12 animate-fadeIn delay-400">
                <a href="/tienda" class="inline-block border-2 border-primary text-primary font-bold py-3 px-8 rounded-full hover:bg-primary hover:text-white transition-colors duration-300">
                    Ver Todos los Productos
                </a>
            </div>
        </div>
    </section>

    <!--  Banner -->
    <section class="py-12 bg-gradient-to-r from-primary to-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                <div class="text-center md:text-left animate-fadeIn">
                    <h3 class="text-2xl font-bold mb-2">¡Envío Gratis!</h3>
                    <p class="opacity-90">En compras mayores a L 500 en Tegucigalpa</p>
                </div>
                
                <div class="relative h-16 md:h-24 animate-bounce">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/delivery-truck.png" alt="Envío Gratis" class="h-full mx-auto">
                </div>
                
                <div class="text-center md:text-right animate-fadeIn delay-100">
                    <a href="/tienda?promo=envio-gratis" class="inline-block bg-white text-primary font-bold py-3 px-8 rounded-full hover:bg-gray-100 transition-colors duration-300">
                        Aprovechar Oferta
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 animate-fadeIn">¿Por qué elegir Hondutienda?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fadeIn delay-100">Las razones que nos hacen diferentes</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-8 rounded-xl text-center animate-fadeIn">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Productos 100% Hondureños</h3>
                    <p class="text-gray-600">Apoyamos a productores locales con la mejor calidad</p>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-xl text-center animate-fadeIn delay-100">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Entrega Rápida</h3>
                    <p class="text-gray-600">Recibe tus productos en menos de 24 horas</p>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-xl text-center animate-fadeIn delay-200">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Pago Seguro</h3>
                    <p class="text-gray-600">Múltiples métodos de pago con seguridad garantizada</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 animate-fadeIn">Lo que dicen nuestros clientes</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fadeIn delay-100">Experiencias reales de la comunidad Hondutienda</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                    $testimonials = array(
                        array(
                            'name' => 'María Fernández',
                            'location' => 'Tegucigalpa',
                            'comment' => 'Excelente servicio y productos frescos. Siempre llegan a tiempo y en perfecto estado.',
                            'rating' => 5
                        ),
                        array(
                            'name' => 'Carlos Martínez',
                            'location' => 'San Pedro Sula',
                            'comment' => 'Me encanta poder encontrar productos hondureños de calidad desde mi casa. ¡Muy recomendado!',
                            'rating' => 4
                        ),
                        array(
                            'name' => 'Ana López',
                            'location' => 'La Ceiba',
                            'comment' => 'La mejor tienda en línea para hacer el mercado semanal. Rápido, económico y confiable.',
                            'rating' => 5
                        )
                    );
                    
                    foreach($testimonials as $index => $testimonial) : ?>
                    <div class="bg-white p-8 rounded-xl shadow-sm animate-fadeIn delay-<?php echo $index * 100; ?>">
                        <div class="flex mb-4">
                            <?php for($i = 0; $i < 5; $i++) : ?>
                                <svg class="w-5 h-5 <?php echo $i < $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300'; ?>" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            <?php endfor; ?>
                        </div>
                        <p class="text-gray-600 mb-6 italic">"<?php echo $testimonial['comment']; ?>"</p>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 font-bold mr-4">
                                <?php echo substr($testimonial['name'], 0, 1); ?>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800"><?php echo $testimonial['name']; ?></h4>
                                <p class="text-sm text-gray-600"><?php echo $testimonial['location']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-16 bg-primary text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-4 animate-fadeIn">¡No te pierdas nuestras ofertas!</h2>
            <p class="text-xl opacity-90 mb-8 animate-fadeIn delay-100">Suscríbete a nuestro newsletter y recibe descuentos exclusivos</p>
            
            <form class="max-w-md mx-auto animate-fadeIn delay-200">
                <div class="flex flex-col sm:flex-row gap-4">
                    <input 
                        type="email" 
                        placeholder="Tu correo electrónico" 
                        class="flex-grow px-4 py-3 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-secondary"
                        required
                    >
                    <button 
                        type="submit" 
                        class="bg-secondary text-dark font-bold py-3 px-6 rounded-full hover:bg-yellow-400 transition-colors duration-300"
                    >
                        Suscribirse
                    </button>
                </div>
                <p class="text-sm opacity-70 mt-3">Nosotros también odiamos el spam. Prometemos no enviarte correos no deseados.</p>
            </form>
        </div>
    </section>
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
    
    .delay-300 {
        animation-delay: 0.3s;
    }
    
    .delay-400 {
        animation-delay: 0.4s;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    .animate-bounce {
        animation: bounce 2s ease infinite;
    }
    
    .shadow-custom {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    
    .shadow-hover {
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }
</style>

<?php get_footer(); ?>