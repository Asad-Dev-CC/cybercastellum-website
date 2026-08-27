<?php
/*
Plugin Name: Cyber Castellum
Description: Professional cybersecurity lead capture form with secure AJAX submission and guide delivery.
Version: 1.1.0
Author: Your Name
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Configure these values after installing the plugin.
 */
if ( ! defined( 'LEADGEN_CLIENT_EMAIL' ) ) {
    define( 'LEADGEN_CLIENT_EMAIL', 'client@example.com' );
}
if ( ! defined( 'LEADGEN_GUIDE_URL' ) ) {
    define( 'LEADGEN_GUIDE_URL', plugin_dir_url( __FILE__ ) . 'assets/The-CIA-Triad.pdf' );
}
if ( ! defined( 'LEADGEN_SEND_TO_SUBMITTER' ) ) {
    define( 'LEADGEN_SEND_TO_SUBMITTER', true );
}

function leadgen_get_attachment_path() {
    $candidate_paths = [
        plugin_dir_path( __FILE__ ) . 'assets/The-CIA-Triad.pdf',
        plugin_dir_path( __FILE__ ) . 'leadgen-guide.pdf',
    ];

    foreach ( $candidate_paths as $attachment_path ) {
        if ( file_exists( $attachment_path ) ) {
            return $attachment_path;
        }
    }

    return '';
}

function leadgen_rate_limit_request() {
    $ip_address = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
    $cache_key  = 'leadgen_form_' . md5( $ip_address );
    $attempts   = (int) get_transient( $cache_key );

    if ( $attempts >= 5 ) {
        wp_send_json_error( [ 'message' => 'Too many submissions. Please try again shortly.' ], 429 );
    }

    set_transient( $cache_key, $attempts + 1, MINUTE_IN_SECONDS );
}

function leadgen_is_business_email( $email ) {
    $email = strtolower( trim( $email ) );
    if ( empty( $email ) || ! is_email( $email ) ) {
        return false;
    }

    $blocked_domains = [
        'gmail.com',
        'yahoo.com',
        'yahoo.co.uk',
        'hotmail.com',
        'outlook.com',
        'live.com',
        'icloud.com',
        'mail.com',
        'aol.com',
        'protonmail.com',
        'zoho.com',
    ];

    $domain = substr( strrchr( $email, '@' ), 1 );
    if ( empty( $domain ) ) {
        return false;
    }

    return ! in_array( $domain, $blocked_domains, true );
}

function leadgen_register_settings() {
    add_option( 'leadgen_send_to_submitter', 1 );
    register_setting( 'leadgen_settings_group', 'leadgen_send_to_submitter', 'absint' );
}
add_action( 'admin_init', 'leadgen_register_settings' );

function leadgen_add_admin_menu() {
    add_options_page(
        'Cyber Castellum Settings',
        'Cyber Castellum Settings',
        'manage_options',
        'leadgen-settings',
        'leadgen_settings_page'
    );
}
add_action( 'admin_menu', 'leadgen_add_admin_menu' );

function leadgen_settings_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1>Cyber Castellum Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'leadgen_settings_group' ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="leadgen_send_to_submitter">Send guide to the submitter</label></th>
                    <td>
                        <input type="checkbox" id="leadgen_send_to_submitter" name="leadgen_send_to_submitter" value="1" <?php checked( 1, get_option( 'leadgen_send_to_submitter', 1 ), true ); ?> />
                        <p class="description">Enable this to automatically email the guide to the same email address entered by the user.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

add_action( 'wp_enqueue_scripts', function () {
    $script_handle = 'leadgen-form-js';
    $script_url = plugin_dir_url( __FILE__ ) . 'leadgen-form.js';
    wp_enqueue_script( $script_handle, $script_url, [], '0.1', true );

    wp_localize_script(
        $script_handle,
        'leadgen_vars',
        [
            'ajax_url'  => admin_url( 'admin-ajax.php' ),
            'guide_url' => esc_url( LEADGEN_GUIDE_URL ),
            'nonce'     => wp_create_nonce( 'leadgen_form_submit' ),
        ]
    );

    wp_enqueue_style( 'leadgen-form-css', plugin_dir_url( __FILE__ ) . 'leadgen-form.css', [], '0.1' );
} );

add_action( 'wp_ajax_nopriv_leadgen_submit', 'leadgen_form_submit' );
add_action( 'wp_ajax_leadgen_submit', 'leadgen_form_submit' );
add_action( 'wp_ajax_nopriv_leadgen_form_submit', 'leadgen_form_submit' );
add_action( 'wp_ajax_leadgen_form_submit', 'leadgen_form_submit' );

function leadgen_form_submit() {
    if ( ! wp_doing_ajax() ) {
        wp_send_json_error( [ 'message' => 'Invalid request.' ], 403 );
    }

    $request_method = isset( $_SERVER['REQUEST_METHOD'] ) ? strtoupper( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_METHOD'] ) ) ) : 'GET';
    if ( 'POST' !== $request_method ) {
        wp_send_json_error( [ 'message' => 'Invalid request method.' ], 405 );
    }

    if ( ! isset( $_POST['leadgen_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['leadgen_nonce'] ) ), 'leadgen_form_submit' ) ) {
        wp_send_json_error( [ 'message' => 'Security check failed.' ], 403 );
    }

    leadgen_rate_limit_request();

    $email       = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $first_name  = isset( $_POST['firstName'] ) ? sanitize_text_field( wp_unslash( $_POST['firstName'] ) ) : '';
    $last_name   = isset( $_POST['lastName'] ) ? sanitize_text_field( wp_unslash( $_POST['lastName'] ) ) : '';
    $phone       = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
    $job_function = isset( $_POST['jobFunction'] ) ? sanitize_text_field( wp_unslash( $_POST['jobFunction'] ) ) : '';
    $job_role    = isset( $_POST['jobRole'] ) ? sanitize_text_field( wp_unslash( $_POST['jobRole'] ) ) : '';
    $job_title   = isset( $_POST['jobTitle'] ) ? sanitize_text_field( wp_unslash( $_POST['jobTitle'] ) ) : '';
    $company     = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
    $country     = isset( $_POST['country'] ) ? sanitize_text_field( wp_unslash( $_POST['country'] ) ) : '';
    $state       = isset( $_POST['state'] ) ? sanitize_text_field( wp_unslash( $_POST['state'] ) ) : '';

    if ( empty( $email ) || ! is_email( $email ) || ! leadgen_is_business_email( $email ) ) {
        wp_send_json_error( [ 'message' => 'Please enter a business email address.' ], 400 );
    }

    $client_email = sanitize_email( LEADGEN_CLIENT_EMAIL );
    if ( empty( $client_email ) || ! is_email( $client_email ) || strpos( $client_email, "\n" ) !== false || strpos( $client_email, "\r" ) !== false ) {
        wp_send_json_error( [ 'message' => 'Client email is not configured correctly.' ], 500 );
    }

    $guide_url = LEADGEN_GUIDE_URL;
    $site_name = get_bloginfo( 'name' );

    $visitor_subject = 'Your Free Guide from ' . $site_name;
    $visitor_message = sprintf(
        '<p>Hello,</p><p>Thank you for requesting our guide.</p><p><strong>Your download:</strong> <a href="%s">%s</a></p><p>The guide has also been attached to this email for your convenience.</p><p>We hope it helps you strengthen your go-to-market execution.</p><p>Best regards,<br>%s</p>',
        esc_url( $guide_url ),
        esc_html( $guide_url ),
        esc_html( $site_name )
    );

    $client_subject = 'New Guide Request from ' . $email;
    $client_message = sprintf(
        '<p>Hello Team,</p><p>A visitor submitted the lead form.</p><ul><li><strong>Email:</strong> %s</li><li><strong>Name:</strong> %s</li><li><strong>Phone:</strong> %s</li><li><strong>Job Function:</strong> %s</li><li><strong>Job Role:</strong> %s</li><li><strong>Job Title:</strong> %s</li><li><strong>Company:</strong> %s</li><li><strong>Country:</strong> %s</li><li><strong>State:</strong> %s</li></ul><p>Kind regards,<br>Your Website Lead Form</p>',
        esc_html( $email ),
        esc_html( $first_name . ' ' . $last_name ),
        esc_html( $phone ),
        esc_html( $job_function ),
        esc_html( $job_role ),
        esc_html( $job_title ),
        esc_html( $company ),
        esc_html( $country ),
        esc_html( $state )
    );

    $headers = [ 'Content-Type: text/html; charset=UTF-8' ];
    $attachments = [];
    $attachment_path = leadgen_get_attachment_path();

    if ( ! empty( $attachment_path ) ) {
        $attachments[] = $attachment_path;
    }

    $send_to_submitter = (bool) LEADGEN_SEND_TO_SUBMITTER && (bool) get_option( 'leadgen_send_to_submitter', 1 );

    $visitor_sent = true;
    if ( $send_to_submitter ) {
        $visitor_sent = wp_mail( $email, $visitor_subject, $visitor_message, $headers, $attachments );
    }

    $client_sent = wp_mail( $client_email, $client_subject, $client_message, $headers, $attachments );

    if ( ! $visitor_sent || ! $client_sent ) {
        wp_send_json_error( [ 'message' => 'The request was received, but the email delivery failed.' ], 500 );
    }

    wp_send_json_success();
}

function leadgen_form_shortcode() {
    ob_start();
    ?>
    <section class="leadgen-page">
        <div class="leadgen-hero">
            <div class="leadgen-copy">
                <span class="leadgen-badge">Cybersecurity readiness playbook</span>
                <h1>Build cyber resilience with a practical guide your team can use immediately.</h1>
                <p>Equip your leadership, IT, and security teams with a clear framework for protecting critical assets, improving resilience, and aligning cybersecurity priorities with business goals.</p>
                <ul class="leadgen-highlights">
                    <li>Actionable guidance for security leadership, IT operations, and risk teams.</li>
                    <li>Practical frameworks for governance, incident readiness, and operational resilience.</li>
                    <li>Built for organizations that want measurable improvement in cybersecurity maturity.</li>
                </ul>
                <div class="leadgen-trust-row">
                    <span>Trusted by security and IT leaders</span>
                    <strong>Free download</strong>
                </div>
            </div>

            <div class="leadgen-card">
                <div class="leadgen-progress">
                    <div class="leadgen-progress-bar">
                        <span class="leadgen-progress-fill"></span>
                    </div>
                </div>

                <form id="leadgen-form" class="leadgen-form" novalidate>
                    <?php wp_nonce_field( 'leadgen_form_submit', 'leadgen_nonce', true, false ); ?>
                    <div class="leadgen-step" data-step="1">
                        <div class="leadgen-step-header">
                            <div class="leadgen-step-label">Step 1 of 3</div>
                            <h2>Get Your Cybersecurity Guide</h2>
                            <p>Join security leaders who are strengthening resilience with practical, executive-ready guidance.</p>
                        </div>
                        <div class="leadgen-field">
                            <label>Business Email <span>*</span></label>
                            <input type="email" name="email" placeholder="name@company.com" required />
                            <small class="leadgen-help">Please use your work email address, not a personal inbox.</small>
                        </div>
                        <div class="leadgen-actions">
                            <button type="submit" class="leadgen-button">Next</button>
                        </div>
                        <p class="leadgen-note">We respect your privacy. Unsubscribe at any time.</p>
                    </div>

                    <div class="leadgen-step hidden" data-step="2">
                        <div class="leadgen-step-header">
                            <div class="leadgen-step-label">Back</div>
                            <div class="leadgen-step-progress">Step 2 of 3</div>
                            <h2>Contact Information</h2>
                            <p>Tell us a bit about your role and organization.</p>
                        </div>
                        <div class="leadgen-grid">
                            <div class="leadgen-field">
                                <label>First Name <span>*</span></label>
                                <input type="text" name="firstName" required />
                            </div>
                            <div class="leadgen-field">
                                <label>Last Name <span>*</span></label>
                                <input type="text" name="lastName" required />
                            </div>
                        </div>
                        <div class="leadgen-field">
                            <label>Phone Number</label>
                            <input type="text" name="phone" />
                        </div>
                        <div class="leadgen-field">
                            <label>Job Function <span>*</span></label>
                            <select name="jobFunction" required>
                                <option value="">Select a function...</option>
                                <option>Executive Leadership</option>
                                <option>Information Technology</option>
                                <option>Cybersecurity / Information Security</option>
                                <option>Risk &amp; Compliance</option>
                                <option>Legal &amp; Privacy</option>
                                <option>Finance &amp; Accounting</option>
                                <option>Operations</option>
                                <option>Human Resources</option>
                                <option>Sales &amp; Marketing</option>
                                <option>Procurement</option>
                                <option>Consulting / Advisory</option>
                                <option>Government / Public Sector</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="leadgen-field">
                            <label>Job Role <span>*</span></label>
                            <select name="jobRole" required>
                                <option value="">Select a role...</option>
                                <option>C-Suite / Executive (CEO, CTO, CISO, CFO)</option>
                                <option>Vice President</option>
                                <option>Director</option>
                                <option>Manager</option>
                                <option>Senior Individual Contributor</option>
                                <option>Individual Contributor</option>
                                <option>Analyst / Associate</option>
                                <option>Consultant / Advisor</option>
                                <option>Government Official</option>
                                <option>Military / Defense Personnel</option>
                                <option>Student / Intern</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="leadgen-field">
                            <label>Job Title <span>*</span></label>
                            <input type="text" name="jobTitle" required />
                        </div>
                        <div class="leadgen-actions split">
                            <button type="button" class="leadgen-button leadgen-back">Back</button>
                            <button type="button" class="leadgen-button leadgen-next">Continue</button>
                        </div>
                    </div>

                    <div class="leadgen-step hidden" data-step="3">
                        <div class="leadgen-step-header">
                            <div class="leadgen-step-label">Back</div>
                            <div class="leadgen-step-progress">Step 3 of 3</div>
                            <h2>Organization Details</h2>
                            <p>Complete the final step to receive your cybersecurity guide.</p>
                        </div>
                        <div class="leadgen-field">
                            <label>Company / Organization <span>*</span></label>
                            <input type="text" name="company" required />
                        </div>
                        <div class="leadgen-field">
                            <label>Country / Region / Territory <span>*</span></label>
                            <select name="country" required>
                                <option value="">Select a country...</option>
                                <option>United States</option>
                                <option>Canada</option>
                                <option>United Kingdom</option>
                                <option>Australia</option>
                                <option>Germany</option>
                                <option>France</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Andorra</option>
                                <option>Angola</option>
                                <option>Argentina</option>
                                <option>Austria</option>
                                <option>Bahamas</option>
                                <option>Bahrain</option>
                                <option>Bangladesh</option>
                                <option>Barbados</option>
                                <option>Belarus</option>
                                <option>Belgium</option>
                                <option>Belize</option>
                                <option>Brazil</option>
                                <option>Bulgaria</option>
                                <option>Chile</option>
                                <option>China</option>
                                <option>Colombia</option>
                                <option>Costa Rica</option>
                                <option>Croatia</option>
                                <option>Cuba</option>
                                <option>Cyprus</option>
                                <option>Czech Republic</option>
                                <option>Denmark</option>
                                <option>Dominican Republic</option>
                                <option>Ecuador</option>
                                <option>Egypt</option>
                                <option>El Salvador</option>
                                <option>Estonia</option>
                                <option>Fiji</option>
                                <option>Finland</option>
                                <option>Greece</option>
                                <option>Guatemala</option>
                                <option>Haiti</option>
                                <option>Honduras</option>
                                <option>Hungary</option>
                                <option>Iceland</option>
                                <option>India</option>
                                <option>Indonesia</option>
                                <option>Iran</option>
                                <option>Iraq</option>
                                <option>Ireland</option>
                                <option>Israel</option>
                                <option>Italy</option>
                                <option>Jamaica</option>
                                <option>Japan</option>
                                <option>Jordan</option>
                                <option>Kazakhstan</option>
                                <option>Kenya</option>
                                <option>Kuwait</option>
                                <option>Lebanon</option>
                                <option>Luxembourg</option>
                                <option>Malaysia</option>
                                <option>Mexico</option>
                                <option>Monaco</option>
                                <option>Morocco</option>
                                <option>Netherlands</option>
                                <option>New Zealand</option>
                                <option>Nigeria</option>
                                <option>Norway</option>
                                <option>Oman</option>
                                <option>Pakistan</option>
                                <option>Panama</option>
                                <option>Paraguay</option>
                                <option>Peru</option>
                                <option>Philippines</option>
                                <option>Poland</option>
                                <option>Portugal</option>
                                <option>Qatar</option>
                                <option>Romania</option>
                                <option>Russia</option>
                                <option>Saudi Arabia</option>
                                <option>Senegal</option>
                                <option>Serbia</option>
                                <option>Singapore</option>
                                <option>Slovakia</option>
                                <option>Slovenia</option>
                                <option>South Africa</option>
                                <option>South Korea</option>
                                <option>Spain</option>
                                <option>Sri Lanka</option>
                                <option>Sweden</option>
                                <option>Switzerland</option>
                                <option>Syria</option>
                                <option>Taiwan</option>
                                <option>Thailand</option>
                                <option>Tunisia</option>
                                <option>Turkey</option>
                                <option>Ukraine</option>
                                <option>United Arab Emirates</option>
                                <option>Uruguay</option>
                                <option>Venezuela</option>
                                <option>Vietnam</option>
                                <option>Yemen</option>
                                <option>Zimbabwe</option>
                            </select>
                        </div>
                        <div class="leadgen-field hidden" data-state-field>
                            <label>State / Province / Region <span>*</span></label>
                            <input type="text" name="state" />
                        </div>
                        <div class="leadgen-actions split">
                            <button type="button" class="leadgen-button leadgen-back">Back</button>
                            <button type="button" class="leadgen-button leadgen-submit">Submit & Download</button>
                        </div>
                    </div>

                    <div class="leadgen-step hidden" data-step="4">
                        <div class="leadgen-thankyou">
                            <div class="leadgen-thanks-icon">✓</div>
                            <h2>Thank You!</h2>
                            <p>Your guide is ready to download and has also been sent to your email.</p>
                            <a class="leadgen-download-btn" href="<?php echo esc_url( LEADGEN_GUIDE_URL ); ?>" download>Download CIA Triad Guide</a>
                        </div>
                    </div>

                    <div class="leadgen-error" aria-live="polite"></div>
                </form>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode( 'leadgen_form', 'leadgen_form_shortcode' );