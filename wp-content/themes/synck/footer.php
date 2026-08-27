<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package synck
 */
$synck_footerlink = "https://themeforest.net/user/wordpressriver/portfolio";
?>

<!-- Footer -->
<footer class="footer-area blog2-footer">
    <div class="copyright-area">
        <div class="custom-container">
            <div class="custom-row d-flex align-items-center justify-content-between">
                <div class="left-content">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/imgs/logo-white.svg'); ?>" alt="Logo" />
                    </a>
                </div>
                <p><?php esc_html_e('&copy; 2023 All rights reserved by ' , 'synck'); ?><a href="<?php echo esc_url($synck_footerlink); ?>"><?php esc_html_e('WordPressRiver' , 'synck'); ?></a></p>
				
            </div>
        </div>
    </div>
</footer>

</main>

    <!-- jQuery Frameworks
    ============================================= -->
    <?php wp_footer(); ?>
</body>

</html>