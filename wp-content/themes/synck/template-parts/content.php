<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package synck
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
<div class="blog-2-item-box">
    <?php the_post_thumbnail('synck-Blog'); ?>
    <p class="meta"><?php the_time(get_option('date_format')) ?> - <?php synck_category();?></p>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p><?php the_excerpt(); ?></p>
    <a href="<?php the_permalink(); ?>" class="theme-btn"><?php esc_html_e ('Read More','synck' ); ?></a>
</div>
</div>
