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

// Process Contact Form
function process_contact_form() {
  // Verify nonce
  if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
      wp_send_json_error('Invalid security token');
      return;
  }
  
  // Sanitize data
  $first_name = sanitize_text_field($_POST['first_name']);
  $last_name = sanitize_text_field($_POST['last_name']);
  $email = sanitize_email($_POST['email']);
  $phone = sanitize_text_field($_POST['phone']);
  $subject = sanitize_text_field($_POST['subject']);
  $message = sanitize_textarea_field($_POST['message']);
  
  // Validation
  if (empty($first_name) || empty($last_name) || empty($email) || empty($subject) || empty($message)) {
      wp_send_json_error('Please fill in all required fields');
      return;
  }
  
  if (!is_email($email)) {
      wp_send_json_error('Please provide a valid email address');
      return;
  }
  
  // Prepare email
  $to = get_option('admin_email');
  $email_subject = '[Hondutienda Contact Form] ' . $subject;
  $email_body = "First Name: $first_name\n";
  $email_body .= "Last Name: $last_name\n";
  $email_body .= "Email: $email\n";
  $email_body .= "Phone: $phone\n";
  $email_body .= "Subject: $subject\n\n";
  $email_body .= "Message:\n$message";
  
  $headers = array(
      'Content-Type: text/plain; charset=UTF-8',
      'From: ' . $first_name . ' ' . $last_name . ' <' . $email . '>',
      'Reply-To: ' . $email
  );
  
  // Send email
  $sent = wp_mail($to, $email_subject, $email_body, $headers);
  
  if ($sent) {
      wp_send_json_success('Message sent successfully');
  } else {
      wp_send_json_error('Failed to send message');
  }
}
add_action('wp_ajax_process_contact_form', 'process_contact_form');
add_action('wp_ajax_nopriv_process_contact_form', 'process_contact_form');

// Add Customizer settings for contact information
function hondutienda_customize_contact_info($wp_customize) {
  // Contact Section
  $wp_customize->add_section('contact_info_section', array(
      'title'    => __('Contact Information', 'hondutienda'),
      'priority' => 140,
  ));
  
  // Email
  $wp_customize->add_setting('contact_email', array(
      'default'   => 'contacto@hondutienda.com',
      'transport' => 'refresh',
  ));
  
  $wp_customize->add_control('contact_email', array(
      'label'    => __('Email Address', 'hondutienda'),
      'section'  => 'contact_info_section',
      'type'     => 'email',
  ));
  
  // Phone
  $wp_customize->add_setting('contact_phone', array(
      'default'   => '+504 9999-9999',
      'transport' => 'refresh',
  ));
  
  $wp_customize->add_control('contact_phone', array(
      'label'    => __('Phone Number', 'hondutienda'),
      'section'  => 'contact_info_section',
      'type'     => 'text',
  ));
  
  // Location
  $wp_customize->add_setting('contact_location', array(
      'default'   => 'Tegucigalpa, Honduras',
      'transport' => 'refresh',
  ));
  
  $wp_customize->add_control('contact_location', array(
      'label'    => __('Location', 'hondutienda'),
      'section'  => 'contact_info_section',
      'type'     => 'text',
  ));
  
  // Hours
  $wp_customize->add_setting('contact_hours', array(
      'default'   => 'Lun - Sáb: 9:00 AM - 6:00 PM',
      'transport' => 'refresh',
  ));
  
  $wp_customize->add_control('contact_hours', array(
      'label'    => __('Business Hours', 'hondutienda'),
      'section'  => 'contact_info_section',
      'type'     => 'textarea',
  ));
}
add_action('customize_register', 'hondutienda_customize_contact_info');