<?php
/*
 * Template Name: Blog-With-Sidebar
 */
get_header('pages'); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();       
  the_content(); // displays whatever you wrote in the wordpress editor
  endwhile; endif; //ends the loop
?>

<!-- Breadcrumb -->
<section class="blog-breadcrumb-area">
    <div class="custom-container custom-container-blog">
        <ul class="breadcrumb-list">
            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e( 'Home', 'synck' )?></a></li>
            <li><?php esc_html_e('Blog','synck' ); ?></li>
        </ul>
        <h1>Blog</h1>
		
    </div>
</section>
<!-- End Breadcrumb -->

<!-- Blog 2 Details -->
<?php if ( is_active_sidebar( 'main-sidebar' ) ) : { ?>
<section class="blog-2-area">
    <div class="custom-container custom-container-blog">
        <div class="custom-row">

            <?php } else : ?>
            <?php endif; ?>
            <div class="blog-2-items">

                <?php 
                    if ( have_posts() ) : 
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', 'single' );

                    endwhile; 
                    endif; 
                ?> 
                <!-- Pagination -->
                <div class="pagi-area">
                <?php echo synck_pagination(); ?>
                </div>
            </div>

            <!-- Start Sidebar -->
            <?php if ( is_active_sidebar( 'main-sidebar' ) ) : { ?>
            <aside class="blog-2-sidebar-wrap">
               <?php get_sidebar(); ?>  
            </aside>
            <?php } else : ?>
            <?php endif; ?>
            <!-- End Sidebar -->
        
        </div>
    </div>
</section>
<!-- Blog 2 End Details -->

<?php if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    get_footer('v1');
}
else {
    get_footer();
} 
