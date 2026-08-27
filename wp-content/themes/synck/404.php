<?php
global $synck_options; 
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
            <li>
                <?php
                    if ($synck_options['titletextlink_newtab'] == 1) {
                        ?>
            <a target="_blank" href="<?php echo esc_html($synck_options['titletext_link']); ?>"><?php echo esc_html($synck_options['title_text']); ?></a>
            <?php
                } else {
                    ?>
            <a href="<?php echo esc_html($synck_options['titletext_link']); ?>"><?php echo esc_html($synck_options['title_text']); ?></a>
             <?php
                }
                ?>
            </li>
            <li><?php echo esc_html($synck_options['breadcrumb_text']); ?></li>
        </ul>
        <h2><?php echo esc_html($synck_options['heading']); ?></h2>
    </div>
</section>
<!-- End Breadcrumb -->


<!-- Start 404 
============================================= -->

<div class="error-page-area relative text-center">
<div class="container">
<div class="error-box default-padding">
<div class="row">
<div class="col-lg-8 offset-lg-2">  
    <h2><?php echo esc_html($synck_options['banner_title']); ?></h2>
    <h3><?php echo esc_html($synck_options['banner_heading']); ?></h3>

<div class="blog-2-sidebar-widget search-widget">
    <form class="search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="input-group">
        <input type='text' name="s" placeholder="<?php esc_attr_e($synck_options['placeholder_text']); ?>"  value="<?php the_search_query(); ?>">                   
        <button class="theme-btn" type="submit"><?php echo esc_html($synck_options['button_text']); ?></button>
        </div>
    </form>
</div>
          
</div>
</div>
</div>
</div>
</div>
<!-- End 404 -->


<?php if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
    get_footer('v1');
}
else {
    get_footer();
} 
