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

////Include Customizer
//require get_child_template_directory_uri( . '/inc/customizer.php';

// Code for customizer.php
function hashone_child_customize_register( $wp_customize )
{
    for( $i = 1; $i < 7; $i++ ){

        $wp_customize->add_setting(
            'hashone_featured_page_header'.$i.'_en',
            array(
                'default'   => '',
                'sanitize_callback' => 'hashone_sanitize_text'
            )
        );

        $wp_customize->add_control(
            new Hashone_Customize_Heading(
                $wp_customize,
                'hashone_featured_page_header'.$i.'_en',
                array(
                    'settings'  => 'hashone_featured_page_header'.$i.'_en',
                    'section'  => 'hashone_featured_sec',
                    'label'   => __( 'Featured Page ', 'hashone' ).$i.'_en'
                )
            )
        );

        $wp_customize->add_setting(
            'hashone_featured_page'.$i.'_en',
            array(
                'default'   => '',
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control(
            'hashone_featured_page'.$i.'_en',
            array(
                'settings'  => 'hashone_featured_page'.$i.'_en',
                'section'  => 'hashone_featured_sec',
                'type'   => 'dropdown-pages',
                'label'   => __( 'Select a Page', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_featured_page_icon'.$i.'_en',
            array(
                'default'   => 'fa fa-bell',
                'sanitize_callback' => 'hashone_sanitize_text',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control(
            new Hashone_Fontawesome_Icon_Chooser(
                $wp_customize,
                'hashone_featured_page_icon'.$i.'_en',
                array(
                    'settings'  => 'hashone_featured_page_icon'.$i.'_en',
                    'section'  => 'hashone_featured_sec',
                    'label'   => __( 'FontAwesome Icon', 'hashone' ),
                )
            )
        );
    }

    for( $i = 1; $i < 7; $i++ ){

        $wp_customize->add_setting(
            'hashone_featured_page_header'.$i.'_de',
            array(
                'default'   => '',
                'sanitize_callback' => 'hashone_sanitize_text'
            )
        );

        $wp_customize->add_control(
            new Hashone_Customize_Heading(
                $wp_customize,
                'hashone_featured_page_header'.$i.'_de',
                array(
                    'settings'  => 'hashone_featured_page_header'.$i.'_de',
                    'section'  => 'hashone_featured_sec',
                    'label'   => __( 'Featured Page ', 'hashone' ).$i.'_de'
                )
            )
        );

        $wp_customize->add_setting(
            'hashone_featured_page'.$i.'_de',
            array(
                'default'   => '',
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control(
            'hashone_featured_page'.$i.'_de',
            array(
                'settings'  => 'hashone_featured_page'.$i.'_de',
                'section'  => 'hashone_featured_sec',
                'type'   => 'dropdown-pages',
                'label'   => __( 'Select a Page', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_featured_page_icon'.$i.'_de',
            array(
                'default'   => 'fa fa-bell',
                'sanitize_callback' => 'hashone_sanitize_text',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control(
            new Hashone_Fontawesome_Icon_Chooser(
                $wp_customize,
                'hashone_featured_page_icon'.$i.'_de',
                array(
                    'settings'  => 'hashone_featured_page_icon'.$i.'_de',
                    'section'  => 'hashone_featured_sec',
                    'label'   => __( 'FontAwesome Icon', 'hashone' ),
                )
            )
        );
    }
}

add_action( 'customize_register', 'hashone_child_customize_register' );
// Code for customizer.php end


//?>