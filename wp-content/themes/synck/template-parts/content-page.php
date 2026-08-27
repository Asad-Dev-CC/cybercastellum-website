<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package synck
 */
?>
<div class="blog-2-item-box">
    <?php the_post_thumbnail('synck-blog-details'); ?>
    <p class="meta"><?php the_time(get_option('date_format')) ?> - <?php synck_category();?></p>
    <p><?php the_content(); ?></p>

    <div class="blog-post-tags">
        <?php the_tags('','',''); ?>
    </div>
    <div class="blog-comment-box">
    <?php
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    else: 
    endif; ?>
    </div>
</div>