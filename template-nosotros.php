<?php
/**
 * Template Name: Nosotros Template
 * Template Post Type: page
 */

get_header(); ?>

<div class="nosotros-page">
    <!-- Hero Section with Gradient Background -->
    <section class="relative py-24 overflow-hidden">
        <!-- Gradient Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary via-blue-800 to-blue-900"></div>
        
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 -left-4 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 bg-yellow-600 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>
        
        <!-- Subtle Pattern Overlay -->
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
        
        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 bg-clip-text text-transparent bg-gradient-to-r from-white via-yellow-200 to-white animate-gradient">
                    Sobre Nosotros
                </h1>
                <p class="text-xl md:text-2xl text-white max-w-3xl mx-auto leading-relaxed opacity-90">
                    Conoce la historia detrás de Hondutienda y nuestro compromiso con la innovación y la confianza.
                </p>
                <div class="mt-8">
                    <div class="inline-flex items-center justify-center w-16 h-1 bg-yellow-400 rounded-full"></div>
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

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Story Section -->
            <div>
                <h2 class="text-3xl font-bold mb-6">Nuestra Historia</h2>
                <p class="text-gray-600 mb-4">
                    <?php echo get_theme_mod('nosotros_history', 'Nuestra tienda nació en el verano del 2020, en medio de una situación mundial desafiante. Desde entonces, hemos trabajado incansablemente para que los productos hondureños estén al alcance de todos.'); ?>
                </p>
                <p class="text-gray-600 mb-4">
                    <?php echo get_theme_mod('nosotros_history_continued', 'Lo que comenzó como un pequeño emprendimiento ha crecido hasta convertirse en una plataforma confiable donde la innovación se encuentra con la tradición hondureña.'); ?>
                </p>
                <div class="mt-8">
                    <p class="text-yellow-600 font-semibold italic"><?php echo get_bloginfo('description'); ?></p>
                </div>
            </div>

            <!-- Image Section -->
            <div class="relative">                 
            <?php                      
                $nosotros_image = get_theme_mod('nosotros_image_url', '/wp-content/uploads/2025/04/Recurso-26-768x431.png');                     
                $default_image = get_template_directory_uri() . '/assets/images/nosotros-placeholder.jpg';                     
                $image_to_display = $nosotros_image ?: $default_image;                 
            ?>                 
            <img                      
                src="<?php echo esc_url($image_to_display); ?>"                      
                alt="Sobre Hondutienda"                      
                class="bg-center rounded-lg shadow-custom w-full object-cover p-6"                 
            />                 
            <div class="absolute -bottom-6 right-0 sm:-right-10 md:-right-6 lg:-right-12 bg-secondary p-4 sm:p-6 rounded-lg shadow-lg text-dark">                     
                <p class="text-2xl sm:text-3xl font-bold"><?php echo date('Y') - 2020; ?>+</p>                     
                <p class="text-xs sm:text-sm font-medium">Años de experiencia</p>                 
            </div>             
        </div>


        </div>

        <!-- Values Section -->
        <section class="mt-24">
            <h2 class="text-3xl font-bold text-center mb-12">Nuestros Valores</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                    $values = array(
                        array(
                            'title' => 'Confianza',
                            'description' => 'Construimos relaciones duraderas basadas en la transparencia y la honestidad.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />'
                        ),
                        array(
                            'title' => 'Innovación',
                            'description' => 'Adoptamos las últimas tecnologías para mejorar tu experiencia de compra.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />'
                        ),
                        array(
                            'title' => 'Calidad',
                            'description' => 'Seleccionamos cuidadosamente cada producto para garantizar tu satisfacción.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />'
                        )
                    );

                    foreach($values as $value) : ?>
                    <div class="bg-white p-8 rounded-lg shadow-custom hover:shadow-hover transition-shadow duration-300 text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <?php echo $value['icon']; ?>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3"><?php echo esc_html($value['title']); ?></h3>
                        <p class="text-gray-600"><?php echo esc_html($value['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Team Section (Optional) -->
        <section class="mt-24">
            <h2 class="text-3xl font-bold text-center mb-12">Nuestro Equipo</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                    $team_members = array(
                        array(
                            'name' => 'Ana González',
                            'position' => 'Fundadora & CEO',
                            'image' => get_template_directory_uri() . '/assets/images/team/ana.jpg'
                        ),
                        array(
                            'name' => 'Carlos Martínez',
                            'position' => 'Director de Operaciones',
                            'image' => get_template_directory_uri() . '/assets/images/team/carlos.jpg'
                        ),
                        array(
                            'name' => 'María Rodríguez',
                            'position' => 'Gerente de Atención al Cliente',
                            'image' => get_template_directory_uri() . '/assets/images/team/maria.jpg'
                        )
                    );

                    foreach($team_members as $member) : ?>
                    <div class="text-center">
                        <div class="w-48 h-48 mx-auto mb-6 rounded-full overflow-hidden">
                            <img 
                                src="<?php echo esc_url($member['image']); ?>" 
                                alt="<?php echo esc_attr($member['name']); ?>" 
                                class="w-full h-full object-cover"
                                onerror="this.src='https://ui-avatars.com/api/?name=<?php echo urlencode($member['name']); ?>&background=FBBF24&color=111827&size=192'"
                            />
                        </div>
                        <h3 class="text-xl font-bold mb-1"><?php echo esc_html($member['name']); ?></h3>
                        <p class="text-gray-600"><?php echo esc_html($member['position']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="mt-24 bg-dark text-white rounded-lg p-8 md:p-12 text-center">
            <h2 class="text-3xl font-bold mb-4">¿Quieres ser parte de nuestra historia?</h2>
            <p class="text-lg mb-8 text-gray-300">
                Únete a nuestra comunidad de compradores y vendedores que confían en Hondutienda.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/tienda" class="inline-block bg-secondary text-dark font-bold py-3 px-8 rounded-full hover:bg-yellow-400 transition-colors duration-300">
                    Explorar Tienda
                </a>
                <a href="/contacto" class="inline-block bg-transparent border-2 border-white text-white font-bold py-3 px-8 rounded-full hover:bg-white hover:text-dark transition-colors duration-300">
                    Contáctanos
                </a>
            </div>
        </section>
    </div>
</div>

<style>
    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }
    
    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient 5s ease infinite;
    }
</style>

<?php get_footer(); ?>