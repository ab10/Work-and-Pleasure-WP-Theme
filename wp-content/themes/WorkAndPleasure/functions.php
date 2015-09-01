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
  add_image_size( 'person', 154, 154, true );
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


add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
		return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
	return $the_template;' )
);



function banner_posts() {
	register_post_type(
		'Banner',
		array(
			'labels' => array(
				'name' => 'banners',
				'singular_name' => 'Banner',
				'menu_name' => 'Banners',
				'name_admin_bar'  => 'Banner',
				'all_items' =>  'All Banner',
				'add_new' => 'Add Banner',
				'add_new_item' => 'Add Banner',
				'edit_item'  => 'Edit Banner',
				'new_item' => 'Add Banner',
			),
			'public' => true,
			'capability_type' => 'post',
			'taxonomies' => array('category'),
			'rewrite' => array('slug' => 'banner'),
			'supports' => array('title', 'excerpt', 'thumbnail')
		)
	);
}
add_action( 'init', 'banner_posts' );

function creative_ppl_posts() {
	register_post_type(
		'creative_ppl',
		array(
			'labels' => array(
				'name' => 'Creative Pepole',
				'singular_name' => 'Creative Person',
				'menu_name' => 'Creative People',
				'name_admin_bar'  => 'Banner',
				'all_items' =>  'All People',
				'add_new' => 'Add Person',
				'add_new_item' => 'Add Person',
				'edit_item'  => 'Edit Person',
				'new_item' => 'Add Person',
			),
			'public' => true,
			'capability_type' => 'post',
			'taxonomies' => array('category'),
			'rewrite' => array('slug' => 'creative-pepole'),
			'supports' => array('title', 'excerpt', 'thumbnail')
		)
	);
}
add_action( 'init', 'creative_ppl_posts' );

include_once(get_template_directory().'/inc/load_scripts.php');
require_once(get_template_directory().'/inc/excerpt_designer.php');
?>