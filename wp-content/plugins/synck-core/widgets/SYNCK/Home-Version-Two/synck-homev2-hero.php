<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev2hero Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev2hero_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'synckhomev2hero';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Home V2 Hero Section', 'synck-core' );
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'synck' ];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'section1',
            [
                'label' => esc_html__( 'Hero Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs1'
        );

        $this->start_controls_tab(
            'style_normal_tab1',
            [
               'label' => esc_html__( 'Content Section', 'synck-core' ),
            ]
        );

        // TEXT 
        $this->add_control(
            'header_title_heading', [
                'label'         => esc_html__( 'Heading & Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hero_header_content', [
                'label'         => esc_html__( 'Header Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hero_btn_text', [
                'label'         => esc_html__( 'Header Button Text', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hero_btn_icon_class',
            [
                'label'         => esc_html__( 'Header Button Icon Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'hero_btn_link',
            [
                'label'         => esc_html__( 'Button Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Image Section', 'synck-core' ),
            ]
        );

        // IMAGE
        $this->add_control(
            'hero_img_left',
            [
                'label'     => esc_html__( 'Hero Background Image Left', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'fadeclass_left',
            [
                'label'         => esc_html__( 'Background Image Animation Class Left','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hero_img_right',
            [
                'label'     => esc_html__( 'Hero Background Image Right', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'fadeclass_right',
            [
                'label'         => esc_html__( 'Background Image Animation Class Right','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        //END
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Hero Contact Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs2'
        );

        $this->start_controls_tab(
            'style_normal_tab3',
            [
               'label' => esc_html__( 'Left Section', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_contact_header_mail_content', [
                'label'         => esc_html__( 'Mail Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hero_contact_header_mail_id', [
                'label'         => esc_html__( 'Mail ID', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hero_contact_header_mail_link',
            [
                'label'         => esc_html__( 'Mail Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => 'mailto:bluebase@mail.com',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );

        $this->add_control(
            'contact_shortcode',
            [
                'label'         => esc_html__( 'Contact Form Shortcode', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'rows'          => 2,
                'placeholder'   => esc_html__( 'Put your shortcode Here', 'synck-core' ),
            ]

        );

        $this->add_control(
            'contactform_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Form Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab4',
            [
               'label' => esc_html__( ' Right Section', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_contact_header_expert_title', [
                'label'         => esc_html__( 'Expert Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hero_contact_header_expert_link',
            [
                'label'         => esc_html__( 'Expert Box Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'hero_contact_header_expert_img',
            [
                'label'     => esc_html__( 'Expert Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
 
        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Image List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ hero_contact_header_expert_img }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'contactlist_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'List Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'contactright_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Form Content Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------Home V2 Hero Content Sectionstyling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2herocontentsection_design_option',
            [
                'label'         => esc_html__( 'Hero Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
        );

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Header Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_header_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .hero-section-wrap .hero-section-content-wrap .hero-section-content p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_header_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .hero-section-wrap .hero-section-content-wrap .hero-section-content p',
            ]
        );

        $this->add_responsive_control(
            'hero_header_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .hero-section-wrap .hero-section-content-wrap .hero-section-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'hero_header_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .hero-section-wrap .hero-section-content-wrap .hero-section-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Header Button text', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_header_button_color',
            [
                'label'         => esc_html__( 'Button Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn2'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'hero_header_buttonbg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn2'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_header_button_typography',
                'label'         => esc_html__( 'Button Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .theme-btn2',
            ]
        );

        $this->add_responsive_control(
            'hero_header_button_margin',
            [
                'label'         => __( 'Button Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .theme-btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'hero_header_button_padding',
            [
                'label'         => __( 'Button Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .theme-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        //END
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------Home V2 Hero Contact section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2herocontactsection_design_option',
            [
                'label'         => esc_html__( 'Hero Contact Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Mail', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_mail_content_color',
            [
                'label'         => esc_html__( 'Mail Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_mail_content_typography',
                'label'         => esc_html__( 'Mail Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header p',
            ]
        );

        $this->add_responsive_control(
            'hero_mail_content_margin',
            [
                'label'         => __( 'Mail Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'hero_mail_content_padding',
            [
                'label'         => __( 'Mail Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Mail ID', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_mail_id_color',
            [
                'label'         => esc_html__( 'Mail ID Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header p a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_mail_id_typography',
                'label'         => esc_html__( 'Mail ID Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header p a',
            ]
        );

        $this->add_responsive_control(
            'hero_mail_id_margin',
            [
                'label'         => __( 'Mail ID Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header p a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'hero_mail_id_padding',
            [
                'label'         => __( 'Mail ID Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header p a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_5',
            [
               'label' => esc_html__( 'Expert Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_expert_title_color',
            [
                'label'         => esc_html__( 'Expert Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header .our-expert-team-box p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_expert_title_typography',
                'label'         => esc_html__( 'Expert Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header .our-expert-team-box p',
            ]
        );

        $this->add_responsive_control(
            'hero_expert_title_margin',
            [
                'label'         => __( 'Expert Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header .our-expert-team-box p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'hero_expert_title_padding',
            [
                'label'         => __( 'Expert Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header .our-expert-team-box p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_6',
            [
               'label' => esc_html__( 'Span', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_expert_span_color',
            [
                'label'         => esc_html__( 'Span Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header .our-expert-team-box p span'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_expert_span_typography',
                'label'         => esc_html__( 'Span Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .hero-section-wrap .hero-contact-form-wrap .hero-contact-form-inner-wrap .hero-contact-form-header .our-expert-team-box p span',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2herobg_design_option',
            [
                'label'         => esc_html__( 'Hero Background Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_0_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_04',
            [
               'label' => esc_html__( 'Background', 'synck-core' ),
            ]
        );      

        $this->add_control(
            'section_bg_color',
            [
                'label'         => esc_html__( 'Section Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-section-wrap'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-section-wrap .hero-contact-form-wrap'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab(); 

        $this->end_controls_tabs();

        $this->end_controls_section();
            
}

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $synckhomev2hero_output = $this->get_settings_for_display(); ?>


<!-- Home V2 Hero Section -->

<section class="hero-section-wrap hero-home2">

<div class="hero-section-content-wrap">
<img class="bg-shape <?php echo esc_attr($synckhomev2hero_output['fadeclass_left']);?>" src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2hero_output['hero_img_left']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2hero_output['hero_img_left']['id'], '_wp_attachment_image_alt', true); ?>" />

<img class="bg-shape2 <?php echo esc_attr($synckhomev2hero_output['fadeclass_right']);?>" src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2hero_output['hero_img_right']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2hero_output['hero_img_right']['id'], '_wp_attachment_image_alt', true); ?>" />

<div class="custom-container">
<div class="hero-section-content text-center">
<?php echo ($synckhomev2hero_output['header_title_heading']); ?>
<p><?php echo esc_html($synckhomev2hero_output['hero_header_content']); ?></p>

<?php if(!empty($synckhomev2hero_output['hero_btn_text'] )): ?>
<a <?php if($synckhomev2hero_output['hero_btn_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2hero_output['hero_btn_link']['url']); ?>" class="theme-btn2">
    <?php echo esc_html($synckhomev2hero_output['hero_btn_text']); ?>
    <i class="<?php echo esc_attr($synckhomev2hero_output['hero_btn_icon_class']); ?>"></i>  
</a>
<?php endif;?>

</div>
</div>
</div>

<?php if(!empty($synckhomev2hero_output['contactright_switcher_options'])||
($synckhomev2hero_output['contactform_switcher_options']) ): ?>
<div class="custom-container">

<div class="hero-contact-form-wrap">
<div class="hero-contact-form-inner-wrap">
<div class="mac-btns-wrap d-flex align-items-center justify-content-between">
    <div class="mac-buttons d-flex align-items-center">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="action-btn d-flex align-items-center">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<?php if ( $synckhomev2hero_output['contactright_switcher_options'] === 'yes' ) : ?>
<div class="hero-contact-form-header d-flex align-items-center justify-content-between">
    <p><?php echo esc_html($synckhomev2hero_output['hero_contact_header_mail_content']); ?> <a href="<?php echo esc_url($synckhomev2hero_output['hero_contact_header_mail_link']['url']); ?>"><?php echo esc_html($synckhomev2hero_output['hero_contact_header_mail_id']); ?></a></p>

    <?php if ( $synckhomev2hero_output['contactlist_switcher_options'] === 'yes' ) : ?>
    <a href="<?php echo esc_url($synckhomev2hero_output['hero_contact_header_expert_link']['url']); ?>" class="our-expert-team-box d-flex align-items-center">
        <div class="our-expert-team-box-inner d-flex align-items-center">
            <div class="imgs d-flex align-items-center">
                <?php if(!empty($synckhomev2hero_output['list1'])):
                    foreach ($synckhomev2hero_output['list1'] as $synckhomev2hero_loop):?>
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2hero_loop['hero_contact_header_expert_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2hero_loop['hero_contact_header_expert_img']['id'], '_wp_attachment_image_alt', true); ?>" />
                <?php endforeach; endif;?>
            </div>
            <p>
                <?php echo ($synckhomev2hero_output['hero_contact_header_expert_title']); ?>
            </p>
        </div>
    </a>
    <?php endif; ?>
</div>
<?php endif; ?>
<?php if ( $synckhomev2hero_output['contactform_switcher_options'] === 'yes' ) : ?>
<div class="hero-contact-form">
    <!-- <div class="contact-form d-flex"> -->
    <?php echo do_shortcode($synckhomev2hero_output['contact_shortcode']);?>
    <!-- </div> -->
</div> 
<?php endif; ?>
</div>
</div>
</div>
<?php endif;?>

</section>


<!-- <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>  -->

    <?php }
}

