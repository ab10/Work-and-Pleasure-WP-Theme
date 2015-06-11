<?php
function add_scripts() {

	wp_deregister_script('jQuery');
	wp_register_script( 'jQuery', get_stylesheet_directory_uri() . '/js/jquery-1.11.2.min.js', false, '1.11.2' );
	wp_register_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', false, '1.0' );
	wp_register_script( 'jquery-ui', get_stylesheet_directory_uri() . '/js/jquery-ui.min.js', false, '1.0' );
	wp_register_script( 'main', get_stylesheet_directory_uri() . '/js/functions.js', false, '1.0' );

	wp_enqueue_script('jQuery');
	wp_enqueue_script('bootstrap', array('jQuery'));
	wp_enqueue_script('jquery-ui');
	wp_enqueue_script('main', array('bootstrap'));
}
add_action('wp_enqueue_scripts', 'add_scripts');

function load_styles() {
	wp_deregister_style( 'fa' );
	wp_register_style( 'fa', get_stylesheet_directory_uri() . '/fonts/font-awesome.min.css', false, '1.0' );
	wp_enqueue_style('fa');

	wp_deregister_style( 'bootstrap' );
	wp_register_style( 'bootstrap', get_stylesheet_directory_uri() . '/risk-scss/bootstrap.min.css', false, '1.0' );
	wp_enqueue_style('bootstrap');

	wp_deregister_style( 'style' );
	wp_register_style( 'style', get_stylesheet_directory_uri() . '/style.css', false, '1.0' );
	wp_enqueue_style('style');



}
add_action('wp_print_styles', 'load_styles');
?>

