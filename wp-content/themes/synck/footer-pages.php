<?php
global $synck_options; 
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package synck
 */
?>

<!-- Footer -->
<footer class="footer-area blog2-footer">
    <div class="copyright-area">
        <div class="custom-container">
            <div class="custom-row d-flex align-items-center justify-content-between">
                <div class="left-content">
                    <a href="<?php echo esc_html($synck_options['footer-logo-link']); ?>" class="logo">
                        <img src="<?php echo esc_url( $synck_options['footer-logo']['url'] );?>"  />
                    </a>
                </div>
                <p><?php echo esc_html($synck_options['copyright_content']); ?> <a href="<?php echo esc_html($synck_options['copyright_text_link']); ?>"><?php echo esc_html($synck_options['copyright_text']); ?></a></p>

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