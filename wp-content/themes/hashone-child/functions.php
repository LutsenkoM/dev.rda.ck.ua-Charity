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


//////////////////////////////////////////
// Code for customizer.php
/////////////////////////////////////////

//Featured section
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

//Featured section

//Service section
for( $i = 1; $i < 7; $i++ ) {
    $wp_customize->add_setting(
        'hashone_service_header'.$i.'_en',
        array(
            'default'			=> '',
            'sanitize_callback' => 'hashone_sanitize_text'
        )
    );

    $wp_customize->add_control(
        new Hashone_Customize_Heading(
            $wp_customize,
            'hashone_service_header'.$i.'_en',
            array(
                'settings'		=> 'hashone_service_header'.$i.'_en',
                'section'		=> 'hashone_service_sec',
                'label'			=> __( 'Service Page ', 'hashone' ).$i.'_en'
            )
        )
    );

    $wp_customize->add_setting(
        'hashone_service_page'.$i.'_en',
        array(
            'default'			=> '',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'hashone_service_page'.$i.'_en',
        array(
            'settings'		=> 'hashone_service_page'.$i.'_en',
            'section'		=> 'hashone_service_sec',
            'type'			=> 'dropdown-pages',
            'label'			=> __( 'Select a Page', 'hashone' )
        )
    );

    $wp_customize->add_setting(
        'hashone_service_page_icon'.$i.'_en',
        array(
            'default'			=> 'fa fa-globe',
            'sanitize_callback' => 'hashone_sanitize_text',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        new Hashone_Fontawesome_Icon_Chooser(
            $wp_customize,
            'hashone_service_page_icon'.$i.'_en',
            array(
                'settings'		=> 'hashone_service_page_icon'.$i.'_en',
                'section'		=> 'hashone_service_sec',
                'label'			=> __( 'FontAwesome Icon', 'hashone' )
            )
        )
    );
}


for( $i = 1; $i < 7; $i++ ){
    $wp_customize->add_setting(
        'hashone_service_header'.$i.'_de',
        array(
            'default'			=> '',
            'sanitize_callback' => 'hashone_sanitize_text'
        )
    );

    $wp_customize->add_control(
        new Hashone_Customize_Heading(
            $wp_customize,
            'hashone_service_header'.$i.'_de',
            array(
                'settings'		=> 'hashone_service_header'.$i.'_de',
                'section'		=> 'hashone_service_sec',
                'label'			=> __( 'Service Page ', 'hashone' ).$i.'_de'
            )
        )
    );

    $wp_customize->add_setting(
        'hashone_service_page'.$i.'_de',
        array(
            'default'			=> '',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'hashone_service_page'.$i.'_de',
        array(
            'settings'		=> 'hashone_service_page'.$i.'_de',
            'section'		=> 'hashone_service_sec',
            'type'			=> 'dropdown-pages',
            'label'			=> __( 'Select a Page', 'hashone' )
        )
    );

    $wp_customize->add_setting(
        'hashone_service_page_icon'.$i.'_de',
        array(
            'default'			=> 'fa fa-globe',
            'sanitize_callback' => 'hashone_sanitize_text',
            'transport'         => 'postMessage'
        )
    );

    $wp_customize->add_control(
        new Hashone_Fontawesome_Icon_Chooser(
            $wp_customize,
            'hashone_service_page_icon'.$i.'_de',
            array(
                'settings'		=> 'hashone_service_page_icon'.$i.'_de',
                'section'		=> 'hashone_service_sec',
                'label'			=> __( 'FontAwesome Icon', 'hashone' )
            )
        )
    );
}
//Service section end

//Team section
    for( $i = 1; $i < 5; $i++ ){
        $wp_customize->add_setting(
            'hashone_team_page_heading'.$i.'_en',
            array(
                'sanitize_callback' => 'hashone_sanitize_text'
            )
        );

        $wp_customize->add_control(
            new Hashone_Customize_Heading(
                $wp_customize,
                'hashone_team_page_heading'.$i.'_en',
                array(
                    'settings'		=> 'hashone_team_page_heading'.$i.'_en',
                    'section'		=> 'hashone_team_sec',
                    'label'			=> __( 'Team ', 'hashone' ).$i.'_en',
                )
            )
        );

        $wp_customize->add_setting(
            'hashone_team_page'.$i.'_en',
            array(
                'default'			=> '',
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control(
            'hashone_team_page'.$i.'_en',
            array(
                'settings'		=> 'hashone_team_page'.$i.'_en',
                'section'		=> 'hashone_team_sec',
                'type'			=> 'dropdown-pages',
                'label'			=> __( 'Select a Page', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_team_designation'.$i.'_en',
            array(
                'default'			=> __( 'CEO', 'hashone' ),
                'sanitize_callback' => 'hashone_sanitize_text'
            )
        );

        $wp_customize->add_control(
            'hashone_team_designation'.$i.'_en',
            array(
                'settings'		=> 'hashone_team_designation'.$i.'_en',
                'section'		=> 'hashone_team_sec',
                'type'			=> 'text',
                'label'			=> __( 'Team Member Designation', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_team_facebook'.$i.'_en',
            array(
                'default'			=> 'https://facebook.com',
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control(
            'hashone_team_facebook'.$i.'_en',
            array(
                'settings'		=> 'hashone_team_facebook'.$i.'_en',
                'section'		=> 'hashone_team_sec',
                'type'			=> 'url',
                'label'	        => __( 'Facebook Url', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_team_twitter'.$i.'_en',
            array(
                'default'			=> 'https://twitter.com',
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control(
            'hashone_team_twitter'.$i.'_en',
            array(
                'settings'		=> 'hashone_team_twitter'.$i.'_en',
                'section'		=> 'hashone_team_sec',
                'type'			=> 'url',
                'label'	        => __( 'Twitter Url', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_team_google_plus'.$i.'_en',
            array(
                'default'			=> 'https://plus.google.com',
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control(
            'hashone_team_google_plus'.$i.'_en',
            array(
                'settings'		=> 'hashone_team_google_plus'.$i.'_en',
                'section'		=> 'hashone_team_sec',
                'type'			=> 'url',
                'label'	        => __( 'Google Plus Url', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_team_linkedin'.$i.'_en',
            array(
                'default'			=> 'https://linkedin.com',
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control(
            'hashone_team_linkedin'.$i.'_en',
            array(
                'settings'		=> 'hashone_team_linkedin'.$i.'_en',
                'section'		=> 'hashone_team_sec',
                'type'			=> 'url',
                'label'	        => __( 'Linkedin Url', 'hashone' )
            )
        );
    }


    for( $i = 1; $i < 5; $i++ ){
        $wp_customize->add_setting(
            'hashone_team_page_heading'.$i.'_de',
            array(
                'sanitize_callback' => 'hashone_sanitize_text'
            )
        );

        $wp_customize->add_control(
            new Hashone_Customize_Heading(
                $wp_customize,
                'hashone_team_page_heading'.$i.'_de',
                array(
                    'settings'		=> 'hashone_team_page_heading'.$i.'_de',
                    'section'		=> 'hashone_team_sec',
                    'label'			=> __( 'Team ', 'hashone' ).$i.'_de',
                )
            )
        );

        $wp_customize->add_setting(
            'hashone_team_page'.$i.'_de',
            array(
                'default'			=> '',
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control(
            'hashone_team_page'.$i.'_de',
            array(
                'settings'		=> 'hashone_team_page'.$i.'_de',
                'section'		=> 'hashone_team_sec',
                'type'			=> 'dropdown-pages',
                'label'			=> __( 'Select a Page', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_team_designation'.$i.'_de',
            array(
                'default'			=> __( 'CEO', 'hashone' ),
                'sanitize_callback' => 'hashone_sanitize_text'
            )
        );

        $wp_customize->add_control(
            'hashone_team_designation'.$i.'_de',
            array(
                'settings'		=> 'hashone_team_designation'.$i.'_de',
                'section'		=> 'hashone_team_sec',
                'type'			=> 'text',
                'label'			=> __( 'Team Member Designation', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_team_facebook'.$i.'_de',
            array(
                'default'			=> 'https://facebook.com',
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control(
            'hashone_team_facebook'.$i.'_de',
            array(
                'settings'		=> 'hashone_team_facebook'.$i.'_de',
                'section'		=> 'hashone_team_sec',
                'type'			=> 'url',
                'label'	        => __( 'Facebook Url', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_team_twitter'.$i.'_de',
            array(
                'default'			=> 'https://twitter.com',
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control(
            'hashone_team_twitter'.$i.'_de',
            array(
                'settings'		=> 'hashone_team_twitter'.$i.'_de',
                'section'		=> 'hashone_team_sec',
                'type'			=> 'url',
                'label'	        => __( 'Twitter Url', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_team_google_plus'.$i.'_de',
            array(
                'default'			=> 'https://plus.google.com',
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control(
            'hashone_team_google_plus'.$i.'_de',
            array(
                'settings'		=> 'hashone_team_google_plus'.$i.'_de',
                'section'		=> 'hashone_team_sec',
                'type'			=> 'url',
                'label'	        => __( 'Google Plus Url', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_team_linkedin'.$i.'_de',
            array(
                'default'			=> 'https://linkedin.com',
                'sanitize_callback' => 'esc_url_raw'
            )
        );

        $wp_customize->add_control(
            'hashone_team_linkedin'.$i.'_de',
            array(
                'settings'		=> 'hashone_team_linkedin'.$i.'_de',
                'section'		=> 'hashone_team_sec',
                'type'			=> 'url',
                'label'	        => __( 'Linkedin Url', 'hashone' )
            )
        );
    }


//Team section end

//Counter section
//EN
    for( $i = 1; $i < 5; $i++ ){
        $wp_customize->add_setting(
            'hashone_counters_heading'.$i.'_en',
            array(
                'sanitize_callback' => 'hashone_sanitize_text'
            )
        );

        $wp_customize->add_control(
            new Hashone_Customize_Heading(
                $wp_customize,
                'hashone_counters_heading'.$i.'_en',
                array(
                    'settings'		=> 'hashone_counters_heading'.$i.'_en',
                    'section'		=> 'hashone_counter_sec',
                    'label'			=> __( 'Counter ', 'hashone' ).$i.'_en',
                )
            )
        );

        $wp_customize->add_setting(
            'hashone_counter_title'.$i.'_en',
            array(
                'default'			=> __( 'Cups of Coffee', 'hashone' ),
                'sanitize_callback' => 'hashone_sanitize_text',
                'transport'         => 'postMessage'

            )
        );

        $wp_customize->add_control(
            'hashone_counter_title'.$i.'_en',
            array(
                'settings'		=> 'hashone_counter_title'.$i.'_en',
                'section'		=> 'hashone_counter_sec',
                'type'			=> 'text',
                'label'			=> __( 'Title', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_counter_count'.$i.'_en',
            array(
                'default'			=> rand(600, 2000),
                'sanitize_callback' => 'absint',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control(
            'hashone_counter_count'.$i.'_en',
            array(
                'settings'		=> 'hashone_counter_count'.$i.'_en',
                'section'		=> 'hashone_counter_sec',
                'type'			=> 'number',
                'label'			=> __( 'Counter Value', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_counter_icon'.$i.'_en',
            array(
                'default'			=> 'fa fa-coffee',
                'sanitize_callback' => 'hashone_sanitize_text',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control(
            new Hashone_Fontawesome_Icon_Chooser(
                $wp_customize,
                'hashone_counter_icon'.$i.'_en',
                array(
                    'settings'		=> 'hashone_counter_icon'.$i.'_en',
                    'section'		=> 'hashone_counter_sec',
                    'label'			=> __( 'Counter Icon', 'hashone' )
                )
            )
        );
    }
//DE

    for( $i = 1; $i < 5; $i++ ){
        $wp_customize->add_setting(
            'hashone_counters_heading'.$i.'_de',
            array(
                'sanitize_callback' => 'hashone_sanitize_text'
            )
        );

        $wp_customize->add_control(
            new Hashone_Customize_Heading(
                $wp_customize,
                'hashone_counters_heading'.$i.'_de',
                array(
                    'settings'		=> 'hashone_counters_heading'.$i.'_de',
                    'section'		=> 'hashone_counter_sec',
                    'label'			=> __( 'Counter ', 'hashone' ).$i.'_de',
                )
            )
        );

        $wp_customize->add_setting(
            'hashone_counter_title'.$i.'_de',
            array(
                'default'			=> __( 'Cups of Coffee', 'hashone' ),
                'sanitize_callback' => 'hashone_sanitize_text',
                'transport'         => 'postMessage'

            )
        );

        $wp_customize->add_control(
            'hashone_counter_title'.$i.'_de',
            array(
                'settings'		=> 'hashone_counter_title'.$i.'_de',
                'section'		=> 'hashone_counter_sec',
                'type'			=> 'text',
                'label'			=> __( 'Title', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_counter_count'.$i.'_de',
            array(
                'default'			=> rand(600, 2000),
                'sanitize_callback' => 'absint',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control(
            'hashone_counter_count'.$i.'_de',
            array(
                'settings'		=> 'hashone_counter_count'.$i.'_de',
                'section'		=> 'hashone_counter_sec',
                'type'			=> 'number',
                'label'			=> __( 'Counter Value', 'hashone' )
            )
        );

        $wp_customize->add_setting(
            'hashone_counter_icon'.$i.'_de',
            array(
                'default'			=> 'fa fa-coffee',
                'sanitize_callback' => 'hashone_sanitize_text',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control(
            new Hashone_Fontawesome_Icon_Chooser(
                $wp_customize,
                'hashone_counter_icon'.$i.'_de',
                array(
                    'settings'		=> 'hashone_counter_icon'.$i.'_de',
                    'section'		=> 'hashone_counter_sec',
                    'label'			=> __( 'Counter Icon', 'hashone' )
                )
            )
        );
    }

//Counter section end
}
add_action( 'customize_register', 'hashone_child_customize_register' );
//////////////////////////////////////////
// Code for customizer.php end
/////////////////////////////////////////


//?>