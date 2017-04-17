<?php
///**
// * Created by PhpStorm.
// * User: Max
// * Date: 08.02.2017
// * Time: 9:49
// */
//
function get_child_stylesheet_uri() {
    return dirname( get_bloginfo('stylesheet_url') );
}

//Add styles and scripts
function load_style_scripts() {
    wp_enqueue_style ('skin', get_child_stylesheet_uri() . '/css/skins/darkRed.css');
}

add_action('wp_enqueue_scripts', 'load_style_scripts');
//Add styles and scripts end

//Custom post type
function post_types_init() {
    //Partners slider
    $partners = array(
        'label' => 'Partners',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'partners'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'partners', $partners );
    //Partners slider end
}
add_action( 'init', 'post_types_init' );
//Custom post type end

add_filter('wp_nav_menu_items','add_search_box', 10, 2);
function add_search_box($items, $args) {
    ob_start();
    get_search_form();
    $searchform = ob_get_contents();
    ob_end_clean();
    $items .= '<li>' . $searchform . '</li>';
    return $items;
}



////Include child customizer
require_once( trailingslashit( get_stylesheet_directory() ) . '/inc/customizer.php' );
//?>
