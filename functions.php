<?php

function boilerplate_load_assets() {
  wp_enqueue_script('ourmainjs', get_theme_file_uri('/build/index.js'), array('wp-element', 'react-jsx-runtime'), '1.0', true);
  wp_enqueue_style('ourmaincss', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'boilerplate_load_assets');

function boilerplate_add_support() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'boilerplate_add_support');

function cargar_font_awesome() {
  wp_enqueue_style(
      'font-awesome',
      get_template_directory_uri() . '/node_modules/@fortawesome/fontawesome-free/css/all.min.css'
  );
}
add_action('wp_enqueue_scripts', 'cargar_font_awesome');

function hondutienda_customize_register($wp_customize) {
  // Nosotros Section
  $wp_customize->add_section('nosotros_section', array(
      'title'    => __('Página Nosotros', 'hondutienda'),
      'priority' => 130,
  ));

  // Historia texto
  $wp_customize->add_setting('nosotros_history', array(
      'default'   => 'Nuestra tienda nació en el verano del 2020, en medio de una situación mundial desafiante. Desde entonces, hemos trabajado incansablemente para que los productos hondureños estén al alcance de todos.',
      'transport' => 'refresh',
  ));

  $wp_customize->add_control('nosotros_history', array(
      'label'    => __('Historia (Primer párrafo)', 'hondutienda'),
      'section'  => 'nosotros_section',
      'type'     => 'textarea',
  ));

  // Historia continuación
  $wp_customize->add_setting('nosotros_history_continued', array(
      'default'   => 'Lo que comenzó como un pequeño emprendimiento ha crecido hasta convertirse en una plataforma confiable donde la innovación se encuentra con la tradición hondureña.',
      'transport' => 'refresh',
  ));

  $wp_customize->add_control('nosotros_history_continued', array(
      'label'    => __('Historia (Segundo párrafo)', 'hondutienda'),
      'section'  => 'nosotros_section',
      'type'     => 'textarea',
  ));

  // Imagen principal
  $wp_customize->add_setting('nosotros_image_url', array(
      'default'   => '',
      'transport' => 'refresh',
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'nosotros_image_url', array(
      'label'    => __('Imagen Principal', 'hondutienda'),
      'section'  => 'nosotros_section',
      'settings' => 'nosotros_image_url',
  )));
}
add_action('customize_register', 'hondutienda_customize_register');