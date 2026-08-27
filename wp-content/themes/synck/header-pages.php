<?php
global $synck_options; 
/**
 * Header file for the synck WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package synck
 */

?><!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="icon" type="image/x-icon" href="<?php echo esc_url($synck_options['favicon-logo']['url']); ?>">

    <?php  wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

<!-- Main -->
<main class="main-page blog-2-page">

<!-- Header -->
<header class="header-area blog2-header">

<div class="custom-container">
    <div class="custom-row align-items-center justify-content-between">
        <div class="header-left d-flex align-items-center">
            <a href="<?php echo esc_html($synck_options['header-logo-link']); ?>" class="logo">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/imgs/logo.svg'); ?>" alt="Logo" />
            </a>

            <div class="header-left-right">
                <span class="menu-bar">
                    <i class="las la-bars"></i>
                </span>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
                <nav class="navbar-wrapper">
                    <span class="close-menu-bar">
                        <i class="las la-times"></i>
                    </span>
                    <?php 
                    wp_nav_menu( array(
                    'theme_location'  => 'main-menu',
                    'depth'           => 4, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => 'ul',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'items_wrap'      => '<ul data-in="#" data-out="#" class="%2$s" id="%1$s">%3$s</ul>',
                    'walker'          => new synck_Bootstrap_Navwalker(),
                    ) );
                    ?>
                </nav>
            <!-- /.navbar-collapse -->
        </div>

    </div>
</div>

</header>