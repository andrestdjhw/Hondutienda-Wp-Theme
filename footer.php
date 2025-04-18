<footer class="bg-gray-900 text-gray-300 pt-16 pb-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
      
      <!-- Logo, Description, and Tagline -->
      <div class="col-span-1 md:col-span-2 text-center md:text-left">
        <?php 
          $uploads = wp_upload_dir();
          $logo_url = esc_url( $uploads['baseurl'] . '/2025/04/Recurso-29-150x150.png' );
        ?>
        <img src="<?php echo $logo_url; ?>" alt="Logo del sitio" class="w-16 h-16 object-contain mb-4 mx-auto md:mx-0">
        <h2 class="text-2xl font-bold text-white mb-2"><?php bloginfo('name'); ?></h2>
        <p class="text-sm text-gray-400 max-w-md mb-4">
          Tu sitio de confianza para contenido increíble. Conéctate con nosotros y descubre el flow digital que transforma experiencias.
        </p>
        <p class="text-xs text-yellow-400 font-semibold italic">¡Hondutienda: Donde la confianza se encuentra con la innovación!</p>
      </div>

      <!-- Navigation Links -->
      <div class="text-center md:text-left">
        <h3 class="text-lg font-semibold text-white mb-4">Explora</h3>
        <ul class="space-y-3 text-sm">
          <li><a href="<?php echo get_home_url(); ?>" class="hover:text-yellow-400 transition duration-300 ease-in-out">Inicio</a></li>
          <li><a href="/tienda" class="hover:text-yellow-400 transition duration-300 ease-in-out">Tienda</a></li>
          <li><a href="/nosotros" class="hover:text-yellow-400 transition duration-300 ease-in-out">Nosotros</a></li>
          <li><a href="/carrito" class="hover:text-yellow-400 transition duration-300 ease-in-out">Carrito</a></li>
          <li><a href="/pagos" class="hover:text-yellow-400 transition duration-300 ease-in-out">Pagos</a></li>
        </ul>
      </div>

      <!-- Policies and Support -->
      <div class="text-center md:text-left">
        <h3 class="text-lg font-semibold text-white mb-4">Soporte</h3>
        <ul class="space-y-3 text-sm">
          <li><a href="/contacto" class="hover:text-yellow-400 transition duration-300 ease-in-out">Contacto</a></li>
          <li><a href="/politica-privacidad" class="hover:text-yellow-400 transition duration-300 ease-in-out">Política de Privacidad</a></li>
          <li><a href="/terminos-condiciones" class="hover:text-yellow-400 transition duration-300 ease-in-out">Términos y Condiciones</a></li>

        </ul>
      </div>

    </div>

    <!-- Social Media -->
    <div class="border-t border-gray-800 mt-12 pt-8">
      <div class="flex justify-center space-x-6 text-xl">
        <a href="#" class="hover:text-yellow-400 transform hover:scale-110 transition duration-300 ease-in-out" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="hover:text-yellow-400 transform hover:scale-110 transition duration-300 ease-in-out" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="hover:text-yellow-400 transform hover:scale-110 transition duration-300 ease-in-out" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" class="hover:text-yellow-400 transform hover:scale-110 transition duration-300 ease-in-out" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>

    <!-- Copyright -->
    <div class="mt-8 text-center text-sm text-gray-500">
      © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>