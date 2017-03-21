<?php
///**
// * Created by PhpStorm.
// * User: Max
// * Date: 08.02.2017
// * Time: 9:49
// */
//
function get_child_template_directory_uri() {
    return dirname( get_bloginfo('stylesheet_url') );
}

//Add styles and scripts
function load_style_scripts() {
    wp_enqueue_style ('skin', get_child_template_directory_uri() . '/css/skins/darkRed.css');
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

////Include child customizer
require_once( trailingslashit( get_stylesheet_directory() ) . '/inc/customizer.php' );
//?>