<?php 

//these are my theme  functions


//theme title
add_theme_support( 'title-tag' );


//theme css and jquery file calling
function eb_css_js_file_calling(){
  wp_enqueue_style( 'eb-style', get_stylesheet_uri());

  wp_register_style( 'bootsrtap', get_template_directory_uri(  ).'/css/bootstrap.css', array(), 'v5.3.3', 'all');
  wp_register_style( 'custom', get_template_directory_uri(  ).'/css/custom.css', array(), 'v1.0.0', 'all');
  
  wp_enqueue_style( 'bootsrtap' );
  wp_enqueue_style( 'custom' );

  // //jquery
  wp_enqueue_script( 'jquery', get_template_directory_uri(  ).'/js/bootstrap.js', array(), 'v5.3.3', true );
  wp_enqueue_script( 'main', get_template_directory_uri(  ).'/js/min.js', array(), 'v1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'eb_css_js_file_calling' );



//Theme Function
function eb_customizar_register($wp_customize){
  $wp_customize->add_section('eb_header_area', array(
    'title' =>__('Header Area', 'EventBridge'),
    'description' => 'If you interested to update your header area, you can do it here.'
  ));

  $wp_customize->add_setting('eb_logo', array(
    'default' => get_bloginfo('template_directory') . '/img/logo.png',
  ));

  $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'eb_logo', array(
    'label' => 'Logo Upload',
    'description' => 'If you interested to change or update your logo you can do it.',
    'setting' => 'eb_logo',
    'section' => 'eb_header_area',
  ) ));

}

add_action('customize_register', 'eb_customizar_register');