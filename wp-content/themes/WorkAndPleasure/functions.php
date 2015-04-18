<?php
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'main-navigation' ),
    )
  );
}

function baw_theme_setup() {
  add_image_size( 'my-thumbnail', 346, 238, true );
  add_image_size( 'img-in-story', 645 );
}



function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'img-in-story' => __( 'Image In Story' ),
    ) );
}


function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

add_action( 'init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' );
add_action( 'after_setup_theme', 'baw_theme_setup' );
add_filter( 'image_size_names_choose', 'my_custom_sizes' );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );


?>