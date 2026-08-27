<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package synck
 */

if( !class_exists( 'ReduxFrameworkPlugin' ) ) { 
    get_header('pages');
}
else {
    get_header();
}
?>

<!-- Breadcrumb -->
<section class="blog-breadcrumb-area">
    <div class="custom-container custom-container-blog">
        <ul class="breadcrumb-list">
            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e( 'Home', 'synck' )?></a></li>
            <li><?php esc_html_e( 'Author Archives', 'synck' )?></li>
        </ul>
        <h2><?php esc_html_e(' All Posts By ' , 'synck' ); echo get_the_author(); ?></h2>
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
