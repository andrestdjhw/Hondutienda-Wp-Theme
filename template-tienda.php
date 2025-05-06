<?php
/**
 * Template Name: Tienda Template
 * Template Post Type: page
 */
get_header(); ?>

<div class="tienda-page">
  
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

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Filters and Sorting -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 animate-fadeIn">
            <div class="flex items-center">
                <button class="md:hidden mr-4 text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                </button>
                <h2 class="text-xl font-bold text-gray-800">Todos los Productos</h2>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                <div class="relative">
                    <select class="appearance-none bg-white border border-gray-300 rounded-full pl-4 pr-10 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <option>Ordenar por</option>
                        <option>Menor precio</option>
                        <option>Mayor precio</option>
                        <option>Más populares</option>
                        <option>Novedades</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                
                <div class="relative">
                    <select class="appearance-none bg-white border border-gray-300 rounded-full pl-4 pr-10 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <option>Categorías</option>
                        <option>Alimentos</option>
                        <option>Bebidas</option>
                        <option>Limpieza</option>
                        <option>Cuidado Personal</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php
                $products = array(
                    array(
                        'name' => 'ALKA',
                        'price' => '$ 7',
                        'old_price' => '$ 10',
                        'image' => get_template_directory_uri() . '/assets/images/products/ALKA-ICE-300x300.webp',
                        'tag' => 'Oferta',
                        'rating' => 4
                    ),
                    array(
                        'name' => 'BON o BON',
                        'price' => '$ 14.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/Bon-O-Bon-768x768.png',
                        'rating' => 5
                    ),
                    array(
                        'name' => 'Bubbaloo Chicle',
                        'price' => '$ 7.49',
                        'image' => get_template_directory_uri() . '/assets/images/products/Bobbaloo-Tuti-Fruti-768x768.png',
                        'rating' => 4
                    ),
                    array(
                        'name' => 'Camisa de Manta Hondureño',
                        'price' => '$ 35.99',
                        'old_price' => '$ 44.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/Camisa_Hondurena-768x1024.jpeg',
                        'tag' => 'Popular',
                        'rating' => 5
                    ),
                    array(
                        'name' => 'Chiclin',
                        'price' => '$ 9.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/Chiclin-Cereza-768x768.png',
                        'rating' => 3
                    ),
                    array(
                        'name' => 'Cornflakes FANS',
                        'price' => '$ 13.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/Corn-Flakes-Fans-768x768.png',
                        'rating' => 4
                    ),
                    array(
                        'name' => 'Futbolito',
                        'price' => '$ 3.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/Futbolitos-Rica-Sula-768x768.png',
                        'rating' => 5
                    ),
                    array(
                        'name' => 'Manita de la Suerte',
                        'price' => '$ 11.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/Manita-Vero-768x768.png',
                        'rating' => 4
                    ),
                    array(
                        'name' => 'Mantequilla Pozuelo',
                        'price' => '$ 7.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/Galleta-Mantequilla-768x768.png',
                        'rating' => 4
                    ),
                    array(
                        'name' => 'Pachicleta',
                        'price' => '$ 11.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/Pachicleta-768x768.png',
                        'rating' => 4
                    ),
                    array(
                        'name' => 'Ranchitas Nacho Extremo',
                        'price' => '$ 4.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/Ranchitas-Picantes-768x768.png',
                        'rating' => 4
                    ),
                    array(
                        'name' => 'Taqueritos',
                        'price' => '$ 4.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/Taueritos-Chile-Toreado-768x768.png',
                        'rating' => 4
                    ),
                    array(
                        'name' => 'Tipitin',
                        'price' => '$ 9.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/TipiTin-Pintaboca-768x768.png',
                        'rating' => 4
                    ),
                    array(
                        'name' => 'Tortrix',
                        'price' => '$ 3.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/Tortix-Picante-768x768.png',
                        'rating' => 4
                    ),
                    array(
                        'name' => 'Zambos',
                        'price' => '$ 3.99',
                        'image' => get_template_directory_uri() . '/assets/images/products/Zambos-Picantes-768x768.png',
                        'rating' => 4
                    )
                );
                
                foreach($products as $index => $product) : ?>
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-2 animate-fadeIn delay-<?php echo ($index % 4) * 100; ?>">
                    <?php if(isset($product['tag'])) : ?>
                        <div class="absolute top-4 right-4 bg-secondary text-dark text-xs font-bold px-3 py-1 rounded-full z-10">
                            <?php echo $product['tag']; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="h-48 overflow-hidden relative">
                        <img 
                            src="<?php echo $product['image']; ?>" 
                            alt="<?php echo $product['name']; ?>" 
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                        />
                        <button class="absolute top-3 left-3 bg-white/80 backdrop-blur-sm rounded-full p-2 hover:bg-white transition-colors duration-300">
                            <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex mb-1">
                            <?php for($i = 0; $i < 5; $i++) : ?>
                                <svg class="w-4 h-4 <?php echo $i < $product['rating'] ? 'text-yellow-400' : 'text-gray-300'; ?>" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            <?php endfor; ?>
                        </div>
                        
                        <h3 class="font-bold text-gray-800 mb-2"><?php echo $product['name']; ?></h3>
                        
                        <div class="flex items-center mb-4">
                            <span class="text-lg font-bold text-dark"><?php echo $product['price']; ?></span>
                            <?php if(isset($product['old_price'])) : ?>
                                <span class="ml-2 text-sm text-gray-500 line-through"><?php echo $product['old_price']; ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <button class="w-full bg-[#0090D9] text-white py-2 px-4 rounded-lg hover:bg-[#57D0E1] transition-colors duration-300 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Añadir al Carrito
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12 animate-fadeIn delay-400">
            <nav class="flex items-center space-x-2">
                <button class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-[#0090D9] hover:text-white transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                
                <button class="w-10 h-10 flex items-center justify-center rounded-full bg-[#0090D9] text-white font-medium">1</button>
                <button class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors duration-300 font-medium">2</button>
                <button class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors duration-300 font-medium">3</button>
                
                <span class="px-2 text-gray-600">...</span>
                
                <button class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors duration-300 font-medium">8</button>
                
                <button class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-[#0090D9] hover:text-white transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </nav>
        </div>
    </div>

    <section class="bg-gradient-to-r from-yellow-400 to-yellow-500 py-8">
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
    
    .shadow-custom {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    
    .shadow-hover {
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }
</style>

<?php get_footer(); ?>