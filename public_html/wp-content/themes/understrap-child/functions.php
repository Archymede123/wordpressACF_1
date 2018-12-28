<?php

/** Remove jQuery scripts from begining */
add_action('wp_enqueue_scripts', 'wbxp_script_remove_header');
function wbxp_script_remove_header() {
      wp_deregister_script( 'jquery' );
}
 
/** Load jQuery script at the end */
add_action('genesis_after_footer', 'wbxp_script_add_body');
function wbxp_script_add_body() {
      wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null);
      wp_enqueue_script( 'jquery');
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js' );
	  wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
}





function theme_js(){

wp_enqueue_script( 'top', get_stylesheet_directory_uri() . '/js/top.js', array() );
wp_enqueue_script( 'analytics', get_stylesheet_directory_uri() . '/js/analytics.js', array() );


}

add_action( 'wp_footer', 'theme_js' );



register_sidebar(array(
  'name' => 'Footer Widget 1',
  'id'        => 'footer-1',
  'description' => 'First footer widget area',
  'before_widget' => '<div id="footer-1">',
  'after_widget' => '</div>',
  'before_title' => '<h5>',
  'after_title' => '</h5>',
));

register_sidebar(array(
  'name' => 'Footer Widget 2',
  'id'        => 'footer-2',
  'description' => 'Second footer widget area',
  'before_widget' => '<div id="footer-2">',
  'after_widget' => '</div>',
  'before_title' => '<h5>',
  'after_title' => '</h5>',
));

register_sidebar(array(
  'name' => 'Footer Widget 3',
  'id'        => 'footer-3',
  'description' => 'Third footer widget area',
  'before_widget' => '<div id="footer-3">',
  'after_widget' => '</div>',
  'before_title' => '<h5>',
  'after_title' => '</h5>',
));


function vc_remove_shortcodes_from_vc_grid_element( $shortcodes ) {
  unset( $shortcodes['vc_gitem_acf'] );
  return $shortcodes;
}
// using wp filter hook to remove shortcodes from the list;
add_filter( 'vc_grid_item_shortcodes', 'vc_remove_shortcodes_from_vc_grid_element', 100 );

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Ajouter une news';
    $submenu['edit.php'][16][0] = 'News tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Ajouter une news';
    $labels->add_new_item = 'Ajouter une news';
    $labels->edit_item = 'Modifier news';
    $labels->new_item = 'News';
    $labels->view_item = 'Voir la news';
    $labels->search_items = 'Chercher des news';
    $labels->not_found = 'Aucunes news trouvées';
    $labels->not_found_in_trash = 'Aucunes news trouvées dans la corbeille';
    $labels->all_items = 'Toutes les news';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

function create_my_custom_feed() {
    load_template( TEMPLATEPATH . ‘/feed-rss2.php’);
}
add_feed(‘rss2′, ‘create_my_custom_feed’);

remove_action('wp_head', 'wp_generator');

add_filter('login_errors',create_function('$a', "return null;"));

function register_my_menus() {
  register_nav_menus(
    array(
      'landing' => __( 'Landing' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );
