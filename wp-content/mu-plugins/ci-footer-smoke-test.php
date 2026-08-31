<?php
/**
 * Plugin Name: CI Footer Smoke Test
 * Description: Adds a clear footer marker for deployment verification.
 */

add_action('wp_footer', function () {
    echo '<div style="background:#0f766e;color:#fff;text-align:center;padding:12px 16px;font-size:13px;font-weight:700;letter-spacing:0.06em;text-transform:uppercase;line-height:1.4;">CI Smoke Test - Local Verification Only</div>';
}, 9999);
