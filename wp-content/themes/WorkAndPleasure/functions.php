<?php
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'main-navigation' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' );
add_image_size( 'my-thumbnail', 346, 238, true );
?>