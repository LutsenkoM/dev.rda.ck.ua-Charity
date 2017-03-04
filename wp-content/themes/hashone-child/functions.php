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

function load_style_script() {
//  wp_enqueue_style('skin', get_stylesheet_directory() . '/css/skins/' . get_option('sample_theme_options') . '.css');
    wp_enqueue_style('skin', get_child_template_directory_uri() . '/css/skins/darkRed.css');
}
//
add_action('wp_enqueue_scripts', 'load_style_script');
//
//require_once ( get_stylesheet_directory() . '/theme-options.php' );
//?>