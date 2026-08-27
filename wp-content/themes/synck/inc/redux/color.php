<?php 
if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
// Output Customize CSS
function synck_customize_css() { 
    global $synck_options; if ($synck_options['main_color_synck'] == 1) {
?>

<style>

        :root {
  --default-color: <?php echo esc_html($synck_options['colorcode']); ?>;
}

:root {
    --primary_color: var(--default-color) !important;
}

.section-header h5,
.section-subtitle {
    color: var(--default-color) !important;
}
.how-we-do-area .how-we-do-left-content .top .section-subtitle{
    color: var(--default-color) !important;
}

.project-area .project-left-details ul li i, 
.about-service3-area ul li i{
     background: var(--default-color);
}

.feature-area .feature-content ul li i, .sticky-news .news-content ul li i{
    background: var(--default-color);
} 
.header-area .navbar-wrapper ul li a:hover {
    color: var(--default-color) !important;
}
.case-studio-area .case-studio .case-studio-tab-content #woo_commerce .case-studio-body .left .case-studio-img-card:first-child .case-studio-cat {
     background: var(--primary_light2);
}
.meta a,
.wp-block-latest-comments__comment-meta a {
    color: var(--default-color) !important;
}

</style>

<?php }
}

  
add_action('wp_head', 'synck_customize_css');
}
?>