<?php
/**
 * Template Name: Contact Template
 * Template Post Type: page
 */

get_header(); ?>

<div class="contacto-page">
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
                    Contáctanos
                </h1>
                <p class="text-xl md:text-2xl text-white max-w-3xl mx-auto leading-relaxed opacity-90">
                    ¿Tienes alguna pregunta o comentario? Estamos aquí para ayudarte.
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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Contact Information -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-custom p-8">
                    <h2 class="text-2xl font-bold mb-6">Información de Contacto</h2>
                    
                    <!-- Email -->
                    <div class="flex items-start mb-6">
                        <div class="flex-shrink-0 bg-secondary rounded-full p-3">
                            <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold mb-1">Email</h3>
                            <p class="text-gray-600">info@hondutienda.com</p>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="flex items-start mb-6">
                        <div class="flex-shrink-0 bg-secondary rounded-full p-3">
                            <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold mb-1">Teléfono</h3>
                            <p class="text-gray-600">+1 823-596-3738</p>
                        </div>
                    </div>
                    
                    <!-- Location -->
                    <div class="flex items-start mb-6">
                        <div class="flex-shrink-0 bg-secondary rounded-full p-3">
                            <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold mb-1">Ubicación</h3>
                            <p class="text-gray-600">1018 W Greens RD, Houston, TX 77067, US</p>
                        </div>
                    </div>
                    
                    <!-- Hours -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 bg-secondary rounded-full p-3">
                            <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold mb-1">Horario</h3>
                            <p class="text-gray-600">Lun - Jue: 10:00 AM - 10:00 PM</p>
                            <p class="text-gray-600">Vie - Dom: 10:00 AM - 11:00 PM</p>
                        </div>
                    </div>
                </div>
                
                <!-- Social Media Links -->
                <div class="bg-white rounded-lg shadow-custom p-8 mt-8">
                    <h2 class="text-2xl font-bold mb-6">Síguenos</h2>
                    <div class="flex space-x-4">
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
            
            <!-- Contact Form -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow-custom p-8">
                    <h2 class="text-2xl font-bold mb-6">Envíanos un mensaje</h2>
                    <form id="contact-form" class="space-y-6">
                        <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                                <input type="text" id="first_name" name="first_name" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                            </div>
                            
                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Apellido</label>
                                <input type="text" id="last_name" name="last_name" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo electrónico</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                        </div>
                        
                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Teléfono (opcional)</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                        </div>
                        
                        <!-- Subject -->
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Asunto</label>
                            <select id="subject" name="subject" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                                <option value="">Selecciona un asunto</option>
                                <option value="general">Consulta general</option>
                                <option value="pedido">Problema con un pedido</option>
                                <option value="devolucion">Devolución o cambio</option>
                                <option value="facturacion">Facturación</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        
                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Mensaje</label>
                            <textarea id="message" name="message" rows="6" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300"></textarea>
                        </div>
                        
                        <!-- Submit Button -->
                        <div>
                            <button type="submit" 
                                class="w-full md:w-auto px-8 py-3 bg-secondary text-dark font-bold rounded-full hover:bg-yellow-400 transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary">
                                Enviar mensaje
                            </button>
                        </div>
                    </form>
                    
                    <!-- Success/Error Messages -->
                    <div id="form-messages" class="hidden mt-6">
                        <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative hidden" role="alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">Tu mensaje ha sido enviado correctamente.</span>
                        </div>
                        <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative hidden" role="alert">
                            <strong class="font-bold">¡Error!</strong>
                            <span class="block sm:inline">Hubo un problema al enviar tu mensaje. Por favor, intenta de nuevo.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Map Section (Optional) -->
        <section class="mt-24">
            <h2 class="text-3xl font-bold text-center mb-12">Encuéntranos aquí</h2>
            <div class="bg-white rounded-lg shadow-custom overflow-hidden">
                <div class="aspect-w-16 aspect-h-9">
                    <!-- Placeholder for Google Maps iframe -->
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3458.1720470664974!2d-95.4454618!3d29.9393398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640cfc1fd69ee6f%3A0x57f8c9f2ea5acac2!2s1018%20W%20Greens%20Rd%2C%20Houston%2C%20TX%2077067%2C%20EE.%20UU.!5e0!3m2!1ses!2sus!4v1714943852615!5m2!1ses!2sus" 
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <!-- <div class="bg-gray-200 flex items-center justify-center" style="height: 400px;">
                        <p class="text-gray-600">Mapa de ubicación</p>
                    </div> -->
                </div>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const formMessages = document.getElementById('form-messages');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset messages
            formMessages.classList.add('hidden');
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');
            
            // Get form data
            const formData = new FormData(form);
            formData.append('action', 'process_contact_form');
            
            // Send AJAX request
            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                formMessages.classList.remove('hidden');
                
                if (data.success) {
                    successMessage.classList.remove('hidden');
                    form.reset();
                } else {
                    errorMessage.classList.remove('hidden');
                }
            })
            .catch(error => {
                formMessages.classList.remove('hidden');
                errorMessage.classList.remove('hidden');
                console.error('Error:', error);
            });
        });
    }
});
</script>

<?php get_footer(); ?>