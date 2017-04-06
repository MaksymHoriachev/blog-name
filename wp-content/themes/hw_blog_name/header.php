<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hw_blog_name
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

    <header id="masthead" class="site-header" role="banner">
        <div class="container">
            <div class="row">
                <div class="col-12 header-box">

                    <div class="header-search">
                        <?php get_search_form(); ?>
                    </div><!-- header search -->

                    <div class="site-branding">
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><span><?php echo get_theme_mod( 'header_name_head_name' ); ?></span></a></h1>
                        <!-- <p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); ?></p> -->
                    </div><!-- .site-branding -->

                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'hw_blog_name' ); ?></button>
                        <?php wp_nav_menu( array(
                            'theme_location' => 'menu-1',
                            'container' => 'false',
                            'menu_id' => 'primary-menu',
                            'menu_class' => 'header-menu'
                        ) ); ?>
                    </nav><!-- #site-navigation -->

                </div>
            </div>
        </div>
    </header><!-- #masthead -->

	<div id="content" class="site-content">
        <div class="container">
            <div class="row">
