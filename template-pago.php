<?php
/**
 * Template Name: Payment Template
 * Template Post Type: page
 */

get_header(); ?>

<div class="payment-page">
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
                    Finalizar Compra
                </h1>
                <p class="text-xl md:text-2xl text-white max-w-3xl mx-auto leading-relaxed opacity-90">
                    Completa tu pedido de forma segura con nuestro sistema de pago.
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
            <!-- Payment Information -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-custom p-8">
                    <h2 class="text-2xl font-bold mb-6">Resumen de Compra</h2>
                    
                    <!-- Order Summary -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-3">Tu Pedido</h3>
                        <div class="border-t border-b border-gray-200 py-4 space-y-4">
                            <?php
                            // This would be replaced with actual order items
                            $sample_items = [
                                ['name' => 'Producto de ejemplo 1', 'price' => 125.00, 'quantity' => 1],
                                ['name' => 'Producto de ejemplo 2', 'price' => 75.50, 'quantity' => 2],
                            ];
                            
                            foreach ($sample_items as $item) :
                            ?>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="font-medium"><?php echo $item['name']; ?></p>
                                    <p class="text-sm text-gray-500">Cantidad: <?php echo $item['quantity']; ?></p>
                                </div>
                                <p class="font-semibold">L. <?php echo number_format($item['price'] * $item['quantity'], 2); ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!-- Order Totals -->
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <p class="text-gray-600">Subtotal</p>
                            <p class="font-medium">L. 276.00</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-gray-600">Envío</p>
                            <p class="font-medium">L. 50.00</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-gray-600">Impuestos</p>
                            <p class="font-medium">L. 41.40</p>
                        </div>
                        <div class="flex justify-between border-t border-gray-200 pt-3 mt-3">
                            <p class="font-bold text-lg">Total</p>
                            <p class="font-bold text-lg text-primary">L. 367.40</p>
                        </div>
                    </div>
                </div>
                
                <!-- Shipping Info -->
                <div class="bg-white rounded-lg shadow-custom p-8 mt-8">
                    <h2 class="text-2xl font-bold mb-6">Dirección de Envío</h2>
                    <div class="flex items-start mb-6">
                        <div class="flex-shrink-0 bg-secondary rounded-full p-3">
                            <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold mb-1">Dirección de Entrega</h3>
                            <p class="text-gray-600" id="shipping-address-display">
                                Por favor, completa tus datos de envío en el formulario.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Estimated Delivery -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 bg-secondary rounded-full p-3">
                            <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold mb-1">Entrega Estimada</h3>
                            <p class="text-gray-600">3-5 días hábiles</p>
                        </div>
                    </div>
                </div>
                
                <!-- Need Help? -->
                <div class="bg-white rounded-lg shadow-custom p-8 mt-8">
                    <h2 class="text-2xl font-bold mb-6">¿Necesitas ayuda?</h2>
                    <p class="text-gray-600 mb-4">Si tienes alguna pregunta sobre tu pedido, contáctanos:</p>
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 text-secondary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>contacto@hondutienda.com</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-secondary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>+504 9999-9999</span>
                    </div>
                </div>
            </div>
            
            <!-- Payment Form -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow-custom p-8">
                    <h2 class="text-2xl font-bold mb-6">Información de Pago</h2>
                    <form id="payment-form" class="space-y-6">
                        <?php wp_nonce_field('payment_form_nonce', 'payment_nonce'); ?>
                        
                        <!-- Personal Information Section -->
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Información Personal</h3>
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
                            <div class="mt-6">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo electrónico</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                            </div>
                            
                            <!-- Phone -->
                            <div class="mt-6">
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
                                <input type="tel" id="phone" name="phone" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                            </div>
                        </div>
                        
                        <!-- Shipping Address Section -->
                        <div class="pt-6 border-t border-gray-200">
                            <h3 class="text-xl font-semibold mb-4">Dirección de Envío</h3>
                            <!-- Street Address -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Dirección</label>
                                <input type="text" id="address" name="address" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                            </div>
                            
                            <!-- Apartment/Suite -->
                            <div class="mt-6">
                                <label for="address2" class="block text-sm font-medium text-gray-700 mb-2">Apartamento, suite, etc. (opcional)</label>
                                <input type="text" id="address2" name="address2"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                                <!-- City -->
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700 mb-2">Ciudad</label>
                                    <input type="text" id="city" name="city" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                                </div>
                                
                                <!-- State -->
                                <div>
                                    <label for="state" class="block text-sm font-medium text-gray-700 mb-2">Departamento</label>
                                    <select id="state" name="state" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                                        <option value="">Seleccionar...</option>
                                        <option value="FM">Francisco Morazán</option>
                                        <option value="CT">Cortés</option>
                                        <option value="AT">Atlántida</option>
                                        <option value="CP">Copán</option>
                                        <option value="CM">Comayagua</option>
                                        <!-- Add more departments as needed -->
                                    </select>
                                </div>
                                
                                <!-- Zip Code -->
                                <div>
                                    <label for="zip" class="block text-sm font-medium text-gray-700 mb-2">Código Postal</label>
                                    <input type="text" id="zip" name="zip" required
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Payment Method Section -->
                        <div class="pt-6 border-t border-gray-200">
                            <h3 class="text-xl font-semibold mb-4">Método de Pago</h3>
                            
                            <!-- Payment Type Selection -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Selecciona un método de pago</label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="relative">
                                        <input type="radio" id="credit_card" name="payment_method" value="credit_card" class="sr-only" checked>
                                        <label for="credit_card" class="cursor-pointer block p-4 border rounded-lg text-center hover:bg-gray-50 peer-checked:border-secondary peer-checked:bg-secondary/10 transition-all duration-300">
                                            <i class="far fa-credit-card text-2xl mb-2"></i>
                                            <span class="block">Tarjeta de Crédito</span>
                                        </label>
                                    </div>
                                    <div class="relative">
                                        <input type="radio" id="paypal" name="payment_method" value="paypal" class="sr-only">
                                        <label for="paypal" class="cursor-pointer block p-4 border rounded-lg text-center hover:bg-gray-50 peer-checked:border-secondary peer-checked:bg-secondary/10 transition-all duration-300">
                                            <i class="fab fa-paypal text-2xl mb-2"></i>
                                            <span class="block">PayPal</span>
                                        </label>
                                    </div>
                                    <div class="relative">
                                        <input type="radio" id="bank_transfer" name="payment_method" value="bank_transfer" class="sr-only">
                                        <label for="bank_transfer" class="cursor-pointer block p-4 border rounded-lg text-center hover:bg-gray-50 peer-checked:border-secondary peer-checked:bg-secondary/10 transition-all duration-300">
                                            <i class="fas fa-university text-2xl mb-2"></i>
                                            <span class="block">Transferencia</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Credit Card Form -->
                            <div id="credit-card-form">
                                <!-- Card Number -->
                                <div class="mb-6">
                                    <label for="card_number" class="block text-sm font-medium text-gray-700 mb-2">Número de Tarjeta</label>
                                    <div class="relative">
                                        <input type="text" id="card_number" name="card_number" placeholder="1234 5678 9012 3456" required
                                            class="w-full px-4 py-3 pl-12 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <i class="far fa-credit-card text-gray-400"></i>
                                        </div>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <div class="flex space-x-1">
                                                <i class="fab fa-cc-visa text-blue-600"></i>
                                                <i class="fab fa-cc-mastercard text-red-500"></i>
                                                <i class="fab fa-cc-amex text-blue-400"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <!-- Cardholder Name -->
                                    <div class="md:col-span-1">
                                        <label for="card_name" class="block text-sm font-medium text-gray-700 mb-2">Nombre en la Tarjeta</label>
                                        <input type="text" id="card_name" name="card_name" required
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                                    </div>
                                    
                                    <!-- Expiration Date -->
                                    <div class="md:col-span-1">
                                        <label for="expiry_date" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Expiración</label>
                                        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/AA" required
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                                    </div>
                                    
                                    <!-- CVC -->
                                    <div class="md:col-span-1">
                                        <label for="cvc" class="block text-sm font-medium text-gray-700 mb-2">CVC</label>
                                        <div class="relative">
                                            <input type="text" id="cvc" name="cvc" placeholder="123" required
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <i class="fas fa-question-circle text-gray-400" title="El código de seguridad de 3 o 4 dígitos al reverso de tu tarjeta"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- PayPal Form (Hidden by default) -->
                            <div id="paypal-form" class="hidden mt-6">
                                <p class="text-gray-600 mb-4">Serás redirigido a PayPal para completar tu pago de forma segura.</p>
                                <div class="flex justify-center">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/paypal-badge.png" alt="PayPal" class="h-12">
                                </div>
                            </div>
                            
                            <!-- Bank Transfer Form (Hidden by default) -->
                            <div id="bank-transfer-form" class="hidden mt-6">
                                <p class="text-gray-600 mb-4">Utiliza los siguientes datos para realizar tu transferencia bancaria:</p>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p><strong>Banco:</strong> Banco Nacional de Honduras</p>
                                    <p><strong>Cuenta:</strong> 123456789</p>
                                    <p><strong>Titular:</strong> HonduTienda, S.A.</p>
                                    <p><strong>Referencia:</strong> Tu número de pedido se generará al finalizar</p>
                                </div>
                                <p class="text-sm text-gray-500 mt-4">Una vez realizada la transferencia, envía el comprobante a pagos@hondutienda.com para procesar tu pedido.</p>
                            </div>
                        </div>
                        
                        <!-- Terms and Privacy -->
                        <div class="pt-6">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="terms" name="terms" type="checkbox" required
                                        class="h-4 w-4 text-secondary focus:ring-secondary border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="terms" class="font-medium text-gray-700">
                                        Acepto los <a href="#" class="text-secondary hover:underline">Términos y Condiciones</a> y la <a href="#" class="text-secondary hover:underline">Política de Privacidad</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="pt-6">
                            <button type="submit" 
                                class="w-full md:w-auto px-8 py-3 bg-secondary text-dark font-bold rounded-full hover:bg-yellow-400 transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary">
                                Realizar Pago Seguro
                            </button>
                        </div>
                    </form>
                    
                    <!-- Success/Error Messages -->
                    <div id="form-messages" class="hidden mt-6">
                        <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative hidden" role="alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">Tu pago ha sido procesado correctamente.</span>
                        </div>
                        <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative hidden" role="alert">
                            <strong class="font-bold">¡Error!</strong>
                            <span class="block sm:inline">Hubo un problema al procesar tu pago. Por favor, verifica los datos e intenta de nuevo.</span>
                        </div>
                    </div>
                </div>
                
                <!-- Security Badges -->
                <div class="mt-8 bg-white rounded-lg shadow-custom p-8">
                    <div class="flex flex-col items-center">
                        <h3 class="text-lg font-semibold mb-4 text-center">Pago Seguro Garantizado</h3>
                        <div class="flex flex-wrap justify-center gap-4">
                            <div class="flex items-center bg-gray-100 px-4 py-2 rounded">
                                <i class="fas fa-lock text-primary mr-2"></i>
                                <span class="text-sm">SSL Secure</span>
                            </div>
                            <div class="flex items-center bg-gray-100 px-4 py-2 rounded">
                                <i class="fas fa-shield-alt text-primary mr-2"></i>
                                <span class="text-sm">Protección al Comprador</span>
                            </div>
                            <div class="flex items-center bg-gray-100 px-4 py-2 rounded">
                                <i class="fas fa-credit-card text-primary mr-2"></i>
                                <span class="text-sm">Encriptación PCI DSS</span>
                            </div>
                        </div>
                    </div>
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
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('payment-form');
    const formMessages = document.getElementById('form-messages');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');
    const creditCardForm = document.getElementById('credit-card-form');
    const paypalForm = document.getElementById('paypal-form');
    const bankTransferForm = document.getElementById('bank-transfer-form');
    const shippingAddressDisplay = document.getElementById('shipping-address-display');
    
    // Payment method selection
    const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
    paymentMethods.forEach(method => {
        method.addEventListener('change', function() {
            // Hide all payment forms first
            creditCardForm.classList.add('hidden');
            paypalForm.classList.add('hidden');
            bankTransferForm.classList.add('hidden');
            
            // Show the selected payment form
            if (this.value === 'credit_card') {
                creditCardForm.classList.remove('hidden');
            } else if (this.value === 'paypal') {
                paypalForm.classList.remove('hidden');
            } else if (this.value === 'bank_transfer') {
                bankTransferForm.classList.remove('hidden');
            }
        });
    });
    
    // Update shipping address display when user inputs address
    const addressInputs = [
        document.getElementById('address'),
        document.getElementById('address2'),
        document.getElementById('city'),
        document.getElementById('state'),
        document.getElementById('zip')
    ];
    
    addressInputs.forEach(input => {
        if (input) {
            input.addEventListener('blur', updateShippingAddressDisplay);
        }
    });
    
    function updateShippingAddressDisplay() {
        const address = document.getElementById('address').value;
        const address2 = document.getElementById('address2').value;
        const city = document.getElementById('city').value;
        const state = document.getElementById('state');
        const stateValue = state.value;
        const stateText = state.options[state.selectedIndex]?.text || '';
        const zip = document.getElementById('zip').value;
        
        if (address && city && stateValue && zip) {
            let formattedAddress = address;
            if (address2) formattedAddress += ', ' + address2;
            formattedAddress += '<br>' + city + ', ' + stateText + '<br>' + zip;
            
            shippingAddressDisplay.innerHTML = formattedAddress;
        }
    }
    
    // Credit card input formatting
    const cardNumberInput = document.getElementById('card_number');
    if (cardNumberInput) {
        cardNumberInput.addEventListener('input', function(e) {
            // Remove non-digits
            let value = this.value.replace(/\D/g, '');
            
            // Add spaces after every 4 digits
            if (value.length > 0) {
                value = value.match(/.{1,4}/g).join(' ');
            }
            
            // Max length 19 (16 digits + 3 spaces)
            if (value.length > 19) {
                value = value.substring(0, 19);
            }
            
            this.value = value;
        });
    }
    
    // Expiry date formatting (MM/YY)
    const expiryDateInput = document.getElementById('expiry_date');
    if (expiryDateInput) {
        expiryDateInput.addEventListener('input', function(e) {
            // Remove non-digits
            let value = this.value.replace(/\D/g, '');
            
            // Add slash after month
            if (value.length > 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            
            // Max length 5 (MM/YY)
            if (value.length > 5) {
                value = value.substring(0, 5);
            }
            
            this.value = value;
        });
    }
    
    // CVC formatting (3-4 digits)
    const cvcInput = document.getElementById('cvc');
    if (cvcInput) {
        cvcInput.addEventListener('input', function(e) {
            // Remove non-digits
            let value = this.value.replace(/\D/g, '');
            
            // Max length 4 digits
            if (value.length > 4) {
                value = value.substring(0, 4);
            }
            
            this.value = value;
        });
    }
    
    // Form submission
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset messages
            formMessages.classList.add('hidden');
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');
            
            // Get form data
            const formData = new FormData(form);
            formData.append('action', 'process_payment_form');
            
            // Show loading state
            const submitButton = form.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.innerHTML;
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Procesando...';
            
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
                    
                    // Redirect to thank you page after 2 seconds
                    setTimeout(function() {
                        window.location.href = data.redirect || '<?php echo home_url('/gracias'); ?>';
                    }, 2000);
                } else {
                    errorMessage.classList.remove('hidden');
                    errorMessage.querySelector('span').textContent = data.message || 'Hubo un problema al procesar tu pago. Por favor, verifica los datos e intenta de nuevo.';
                }
            })
            .catch(error => {
                formMessages.classList.remove('hidden');
                errorMessage.classList.remove('hidden');
                console.error('Error:', error);
            })
            .finally(() => {
                // Reset button state
                submitButton.disabled = false;
                submitButton.innerHTML = originalButtonText;
            });
        });
    }
});  //Please continue this code
</script>

<?php get_footer(); ?>