<?php
/**
 * hw_blog_name Theme Customizer
 *
 * @package hw_blog_name
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hw_blog_name_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// header name
    $wp_customize->add_section( 'header_name_section', array(
        'title' => 'Header name',
        'priority' => 30,
    ) );
    $wp_customize->add_setting( 'header_name_head_name', array(
        'default' => 'Name ...'
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_name_control', array(
        'label' => 'Head name',
        'section' => 'header_name_section',
        'settings' => 'header_name_head_name',
    ) ) );

    // blog title
    $wp_customize->add_section( 'blog_title_section', array(
        'title' => 'Blog title',
        'priority' => 40,
    ) );
    $wp_customize->add_setting( 'blog_title_head_name', array(
        'default' => 'blog ...'
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blog_title_control', array(
        'label' => 'Blog title',
        'section' => 'blog_title_section',
        'settings' => 'blog_title_head_name',
    ) ) );

    // Front img
    $wp_customize->add_section( 'logo_section', array(
        'title' => 'logo',
        'priority' => 50,
    ) );
    $wp_customize->add_setting( 'logo_img', array() );

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'logo_img_control', array(
        'label' => 'Image',
        'section' => 'logo_section',
        'settings' => 'logo_img',
        'width' => 750,
        'height' => 500,
    ) ) );

}
add_action( 'customize_register', 'hw_blog_name_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hw_blog_name_customize_preview_js() {
	wp_enqueue_script( 'hw_blog_name_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hw_blog_name_customize_preview_js' );
