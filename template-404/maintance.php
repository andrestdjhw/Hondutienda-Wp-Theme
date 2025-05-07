<?php
/**
 * Template Name: 404/Maintenance Template
 * Template Post Type: page
 */

get_header(); ?>

<div class="maintenance-page">
    <!-- Hero Section with Gradient Background -->
    <section class="relative py-16 overflow-hidden">
        <!-- Gradient Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary via-[#57D0E1] to-[#0090D9]"></div>
        
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
                    Página en Mantenimiento
                </h1>
                <div class="mt-4">
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
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-white rounded-lg shadow-custom p-8 text-center">
            <!-- Mascot Image Container -->
            <div class="flex justify-center mb-8">
                <!-- Replace this path with the actual path to your parrot mascot image -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Loro-carpintero-con-camiseta-de-futbol-768x768.png" alt="Hondutienda Mascot" class="w-64 h-auto">
            </div>
            
            <h2 class="text-3xl font-bold mb-4">¡Estamos trabajando para mejorar tu experiencia!</h2>
            
            <p class="text-xl text-gray-600 mb-8">
                Estamos realizando mejoras en nuestro sitio. Por favor, regresa pronto para disfrutar de una mejor experiencia de compra.
            </p>
            
            <div class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-6">
                <!-- Return Home Button -->
                <a href="<?php echo home_url(); ?>" class="px-8 py-3 bg-secondary text-dark font-bold rounded-full hover:bg-yellow-400 transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary">
                    Volver al Inicio
                </a>
                
                <!-- Contact Button -->
                <a href="<?php echo home_url('/contacto'); ?>" class="px-8 py-3 bg-[#0090D9] text-white font-bold rounded-full hover:bg-[#57D0E1] transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Contáctanos
                </a>
            </div>
            
            <!-- Countdown Timer (Optional) -->
            <!-- <div class="mt-12">
                <h3 class="text-xl font-semibold mb-4">Volveremos en:</h3>
                <div class="flex justify-center space-x-6">
                    <div class="flex flex-col items-center">
                        <div class="bg-gray-100 w-16 h-16 rounded-lg flex items-center justify-center text-2xl font-bold" id="days">00</div>
                        <span class="mt-2 text-gray-600">Días</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-gray-100 w-16 h-16 rounded-lg flex items-center justify-center text-2xl font-bold" id="hours">00</div>
                        <span class="mt-2 text-gray-600">Horas</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-gray-100 w-16 h-16 rounded-lg flex items-center justify-center text-2xl font-bold" id="minutes">00</div>
                        <span class="mt-2 text-gray-600">Minutos</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-gray-100 w-16 h-16 rounded-lg flex items-center justify-center text-2xl font-bold" id="seconds">00</div>
                        <span class="mt-2 text-gray-600">Segundos</span>
                    </div>
                </div>
            </div> -->
            
            <!-- Social Media Links -->
            <div class="mt-12">
                <h3 class="text-xl font-semibold mb-4">Síguenos en redes sociales</h3>
                <div class="flex justify-center space-x-4">
                    <a href="https://www.facebook.com/share/1AHeE5h9t9/?mibextid=wwXIfr" class="bg-gray-100 hover:bg-secondary text-dark hover:text-white p-3 rounded-full transition-colors duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.tiktok.com/@hondutienda?_t=ZM-8w6lOo4sSb1&_r=1" class="bg-gray-100 hover:bg-secondary text-dark hover:text-white p-3 rounded-full transition-colors duration-300">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://www.instagram.com/hondutienda?igsh=YWhiZ3hkMmV0aTFl" class="bg-gray-100 hover:bg-secondary text-dark hover:text-white p-3 rounded-full transition-colors duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Contact Information -->
        <div class="mt-12 bg-white rounded-lg shadow-custom p-8">
            <h3 class="text-2xl font-bold mb-6 text-center">Mientras tanto, puedes contactarnos en:</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Email -->
                <div class="flex items-center justify-center">
                    <div class="flex-shrink-0 bg-secondary rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-gray-600">info@hondutienda.com</span>
                </div>
                
                <!-- Phone -->
                <div class="flex items-center justify-center">
                    <div class="flex-shrink-0 bg-secondary rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <span class="text-gray-600">+1 823-596-3738</span>
                </div>
                
                <!-- Location -->
                <div class="flex items-center justify-center">
                    <div class="flex-shrink-0 bg-secondary rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <span class="text-gray-600">1018 W Greens RD, Houston, TX 77067</span>
                </div>
            </div>
        </div>
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
    
    .shadow-custom {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set the date we're counting down to (change this to your maintenance end date)
    // Format: Year, Month (0-11), Day, Hour, Minute, Second
    const countDownDate = new Date().getTime() + (2 * 24 * 60 * 60 * 1000); // 2 days from now
    
    // Update the countdown every 1 second
    const x = setInterval(function() {
        // Get today's date and time
        const now = new Date().getTime();
        
        // Find the distance between now and the countdown date
        const distance = countDownDate - now;
        
        // Time calculations for days, hours, minutes and seconds
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        // Display the result
        document.getElementById("days").innerHTML = days < 10 ? "0" + days : days;
        document.getElementById("hours").innerHTML = hours < 10 ? "0" + hours : hours;
        document.getElementById("minutes").innerHTML = minutes < 10 ? "0" + minutes : minutes;
        document.getElementById("seconds").innerHTML = seconds < 10 ? "0" + seconds : seconds;
        
        // If the countdown is finished, display message
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("days").innerHTML = "00";
            document.getElementById("hours").innerHTML = "00";
            document.getElementById("minutes").innerHTML = "00";
            document.getElementById("seconds").innerHTML = "00";
        }
    }, 1000);
});
</script>

<?php get_footer(); ?>