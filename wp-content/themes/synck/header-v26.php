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

<body>

<!-- Main -->
<main class="main-page blog-details-page">


