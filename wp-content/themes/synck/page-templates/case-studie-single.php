<?php
/*
 * Template Name: Case-Studie-Single-Page
 */
get_header('v27'); ?>

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post();       
  the_content(); // displays whatever you wrote in the wordpress editor
  endwhile; endif; //ends the loop
 ?>

<?php get_footer('v1'); ?>