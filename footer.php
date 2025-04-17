<footer class="bg-gray-900 text-gray-300 mt-10 pt-10 pb-6">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      
      <!-- Logo y descripción - Añadido mb-8 para móviles -->
      <div class="mb-8 md:mb-0">
        <h2 class="text-xl font-bold text-white mb-2">
          <?php bloginfo('name'); ?>
        </h2>
        <p class="text-sm text-gray-400">
          Tu sitio de confianza para contenido increíble. Síguenos en redes para más novedades y flow digital.
        </p>
      </div> 

      <!-- Navegación del footer con responsive-->
      <div class="text-center md:text-left mb-8 md:mb-0">
        <h3 class="text-sm font-semibold text-white mb-4">Enlaces útiles</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="<?php echo get_home_url(); ?>" class="hover:text-yellow-400 transition duration-300">Inicio</a></li>
          <li><a href="/tienda" class="hover:text-yellow-400 transition duration-300">Tienda</a></li>
          <li><a href="/nosotros" class="hover:text-yellow-400 transition duration-300">Nosotros</a></li>
          <li><a href="/carrito" class="hover:text-yellow-400 transition duration-300">Carrito</a></li>
          <li><a href="/pagos" class="hover:text-yellow-400 transition duration-300">Pagos</a></li>
        </ul>
      </div>

      <!-- Redes sociales con responsive  -->
      <div class="text-center md:text-left">
        <h3 class="text-sm font-semibold text-white mb-4">Síguenos</h3>
        <div class="flex justify-center md:justify-start space-x-4 text-xl">
          <a href="#" class="hover:text-yellow-400 transition duration-300" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="hover:text-yellow-400 transition duration-300" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" class="hover:text-yellow-400 transition duration-300" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" class="hover:text-yellow-400 transition duration-300" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>

    </div>

    <!-- Copyright y adaptado para cel -->
    <div class="border-t border-gray-700 mt-8 pt-4 text-center text-xs sm:text-sm text-gray-500">
      © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.
    </div>
  </div>
</footer>


<?php wp_footer(); ?>
</body>
</html>
