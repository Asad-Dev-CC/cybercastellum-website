<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev1hero Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev1hero_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev1hero';
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
        return esc_html__( 'Home V1 Hero Section', 'synck-core' );
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

        $this->add_control(
            'title_heading', [
                'label'         => esc_html__( 'Title & Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'content', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Button Section', 'synck-core' ),
            ]
        );

        $this->add_control(
            'button_text1', [
                'label'         => esc_html__( 'Button Text 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        // LINK
        $this->add_control(
            'button_link1',
            [
                'label'         => esc_html__( 'Button Link 1', 'synck-core' ),
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

        $this->add_control(
            'button_text2', [
                'label'         => esc_html__( 'Button Text 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'button_link2',
            [
                'label'         => esc_html__( 'Button Link 2', 'synck-core' ),
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

        $this->add_control( 
            'buttonicon',
            [
                'label'         => esc_html__( 'Button 2 Icon Class Name','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // <a href="#">esc_url( 'Paste Iconoir-Icon Class')</a>

         $this->end_controls_tab();

         $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Hero Cards Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs2'
        );

        $this->start_controls_tab(
            'style_normal_tab3',
            [
               'label' => esc_html__( 'Exp Card', 'synck-core' ),
            ]
        );

        // IMAGE
        $this->add_control(
            'exp_icon',
            [
                'label'     => esc_html__( 'Experience Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'exp_number', [
                'label'         => esc_html__( 'Experience Number', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'exp_info', [
                'label'         => esc_html__( 'Experience Info', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'bounceclass',
            [
                'label'         => esc_html__( 'Card Bounce Animation Class','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'expcard_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Card Info', 'synck-core' ),
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
               'label' => esc_html__( 'Team Card', 'synck-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // IMAGE
        $repeater->add_control(
            'testimonial_img',
            [
                'label'     => esc_html__( 'Team Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Team Image List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ testimonial_img }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'testimonial_info', [
                'label'         => esc_html__( 'Team Info', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'boxlink',
            [
                'label'         => esc_html__( 'Team Card Link', 'synck-core' ),
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

        $this->add_control(
            'bounceclass_1',
            [
                'label'         => esc_html__( 'Card Bounce Animation Class','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'teamcard_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Card Info', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab5',
            [
               'label' => esc_html__( 'Review Card', 'synck-core' ),
            ]
        );

        $this->add_control(
            'review_img',
            [
                'label'     => esc_html__( 'Review Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'review_title', [
                'label'         => esc_html__( 'Review Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'review_content', [
                'label'         => esc_html__( 'Review Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // IMAGE
        $repeater->add_control( 
            'review_icon',
            [
                'label'         => esc_html__( 'Review Icon Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Line Awesome-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://icons8.com/line-awesome/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Review Icon List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ review_icon }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'bounceclass_2',
            [
                'label'         => esc_html__( 'Card Bounce Animation Class','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'reviewcard_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Card Info', 'synck-core' ),
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

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Hero Image Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'hero_img',
            [
                'label'     => esc_html__( 'Hero Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'fadeclass_1',
            [
                'label'         => esc_html__( 'Image Fade Animation Class','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Hero section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1hero_design_option',
            [
                'label'         => esc_html__( 'Hero Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
               'label' => esc_html__( 'Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-empowerment-area .hero-empowerment-left-content p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .hero-empowerment-area .hero-empowerment-left-content p',
            ]
        );

        $this->add_responsive_control(
            'hero_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .hero-empowerment-area .hero-empowerment-left-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'hero_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .hero-empowerment-area .hero-empowerment-left-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Button 1', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_button1_color',
            [
                'label'         => esc_html__( 'Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'hero_button1bg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_button1_typography',
                'label'         => esc_html__( 'Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .theme-btn',
            ]
        );

        $this->add_control(
            'hero_button1hover_color',
            [
                'label'         => esc_html__( 'Hover Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn:hover'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'hero_button1bghover_color',
            [
                'label'         => esc_html__( 'Hover BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn:before,.theme-btn:after'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_12',
            [
               'label' => esc_html__( 'Button 2', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_button2_color',
            [
                'label'         => esc_html__( 'Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn2'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'hero_button2bg_color',
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
                'name'          => 'hero_button2_typography',
                'label'         => esc_html__( 'Button2 Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .theme-btn2',
            ]
        );

        $this->add_control(
            'hero_button2hover_color',
            [
                'label'         => esc_html__( 'Hover Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn2:hover'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'hero_button2bghover_color',
            [
                'label'         => esc_html__( 'Hover BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn2::after, .theme-btn2::before'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------Hero Cards section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1herocards_design_option',
            [
                'label'         => esc_html__( 'Hero Cards Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
        );

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Exp Card', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_exp_number_color',
            [
                'label'         => esc_html__( 'Number Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .hero-empowerment-area .hero-empowerment-right-content .top-content .experience-box .experience-content h1'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_exp_number_typography',
                'label'         => esc_html__( 'Number Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .hero-empowerment-area .hero-empowerment-right-content .top-content .experience-box .experience-content h1',
            ]
        );

        $this->add_control(
            'hero_exp_info_color',
            [
                'label'         => esc_html__( 'Info Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-empowerment-area .hero-empowerment-right-content .top-content .experience-box .experience-content p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_exp_info_typography',
                'label'         => esc_html__( 'Info Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .hero-empowerment-area .hero-empowerment-right-content .top-content .experience-box .experience-content p',
            ]
        );

        $this->add_control(
            'hero_exp_span_color',
            [
                'label'         => esc_html__( 'Span Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-empowerment-area .hero-empowerment-right-content .top-content .experience-box .experience-content p span'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_exp_span_typography',
                'label'         => esc_html__( 'Span Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .hero-empowerment-area .hero-empowerment-right-content .top-content .experience-box .experience-content p span',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Team Card', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_testimonial_number_color',
            [
                'label'         => esc_html__( 'Info Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .our-expert-team-box .our-expert-team-box-inner p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_testimonial_number_typography',
                'label'         => esc_html__( 'Info Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .our-expert-team-box .our-expert-team-box-inner p',
            ]
        );

        $this->add_control(
            'hero_testimonial_span_color',
            [
                'label'         => esc_html__( 'Span Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .our-expert-team-box .our-expert-team-box-inner p span'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_testimonial_span_typography',
                'label'         => esc_html__( 'Span Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .our-expert-team-box .our-expert-team-box-inner p span',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Review card', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_review_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .hero-empowerment-area .hero-empowerment-right-content .bottom-content .google-reviews-box .left'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_review_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .hero-empowerment-area .hero-empowerment-right-content .bottom-content .google-reviews-box .left',
            ]
        );

        $this->add_control(
            'hero_review_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-empowerment-area .hero-empowerment-right-content .bottom-content .google-reviews-box .right p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_review_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .hero-empowerment-area .hero-empowerment-right-content .bottom-content .google-reviews-box .right p',
            ]
        );

        $this->add_control(
            'hero_review_span_color',
            [
                'label'         => esc_html__( 'Span Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-empowerment-area .hero-empowerment-right-content .bottom-content .google-reviews-box .right p span'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_review_span_typography',
                'label'         => esc_html__( 'Span Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .hero-empowerment-area .hero-empowerment-right-content .bottom-content .google-reviews-box .right p span',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section(); 

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1herobg_design_option',
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
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-empowerment-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectionexp_bg_color',
            [
                'label'         => esc_html__( 'Exp Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-empowerment-area .hero-empowerment-right-content .top-content .experience-box'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectionteam_bg_color',
            [
                'label'         => esc_html__( 'Team Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-empowerment-area .hero-empowerment-right-content .bottom-content .our-expert-team-box'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectionreview_bg_color',
            [
                'label'         => esc_html__( 'Review Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .hero-empowerment-area .hero-empowerment-right-content .bottom-content .google-reviews-box'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev1hero_output = $this->get_settings_for_display(); ?>


<!-- Home V1 Hero Section -->
<section class="hero-empowerment-area">
<div class="custom-container">
<div class="custom-row align-items-center">
    <div class="hero-empowerment-left-content">
        <?php echo($synckhomev1hero_output['title_heading']); ?>
        <p><?php echo esc_html($synckhomev1hero_output['content']); ?></p>
        <div class="btns-group d-flex">

    <?php if(!empty($synckhomev1hero_output['button_text1'] )): ?>
            <a <?php if($synckhomev1hero_output['button_link1']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckhomev1hero_output['button_link1']['url']); ?>" class="theme-btn"><?php echo esc_html($synckhomev1hero_output['button_text1']); ?></a>
    <?php endif;?>

<?php if(!empty($synckhomev1hero_output['button_text2'] )): ?>
            <a <?php if($synckhomev1hero_output['button_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckhomev1hero_output['button_link2']['url']); ?>" class="theme-btn2"><?php echo esc_html($synckhomev1hero_output['button_text2']); ?>
                <i class="<?php echo esc_attr($synckhomev1hero_output['buttonicon']);?>"></i>
            </a>
    <?php endif;?>

        </div>
    </div>

    <div class="hero-empowerment-right-content">
        <div class="top-content">
            <img class="desktop <?php echo esc_attr($synckhomev1hero_output['fadeclass_1']);?>" src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1hero_output['hero_img']['id'], 'full' ));?>"  alt="<?php echo get_post_meta($synckhomev1hero_output['hero_img']['id'], '_wp_attachment_image_alt', true); ?>" />

            <?php if ( $synckhomev1hero_output['expcard_switcher_options'] === 'yes' ) : ?>
            <div class="experience-box simple-shadow <?php echo esc_attr($synckhomev1hero_output['bounceclass']);?>">
                <div class="experience-body d-flex align-items-center">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1hero_output['exp_icon']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1hero_output['exp_icon']['id'], '_wp_attachment_image_alt', true); ?>" />

                    <div class="experience-content d-flex align-items-center">
                        <h1><?php echo esc_html($synckhomev1hero_output['exp_number']); ?></h1>
                        <p>
                            <?php echo($synckhomev1hero_output['exp_info']); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="bottom-content d-flex">
            <?php if ( $synckhomev1hero_output['teamcard_switcher_options'] === 'yes' ) : ?>
            <div class="our-expert-team-box simple-shadow <?php echo esc_attr($synckhomev1hero_output['bounceclass_1']);?> delay-2">
            <a <?php if($synckhomev1hero_output['boxlink']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckhomev1hero_output['boxlink']['url']); ?>">
                <div class="our-expert-team-box-inner d-flex align-items-center">
                    <div class="imgs imgs1 d-flex align-items-center">
                        <?php if(!empty($synckhomev1hero_output['list1'])):
                            foreach ($synckhomev1hero_output['list1'] as $synckhomev1hero_loop):?>
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1hero_loop['testimonial_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1hero_loop['testimonial_img']['id'], '_wp_attachment_image_alt', true); ?>" />
                        <?php endforeach; endif;?>
                    </div>
                    <p>
                        <?php echo($synckhomev1hero_output['testimonial_info']); ?>
                    </p>
                </div>
            </a>
            </div>
            <?php endif; ?>

            <?php if ( $synckhomev1hero_output['reviewcard_switcher_options'] === 'yes' ) : ?>
            <div class="google-reviews-box simple-shadow <?php echo esc_attr($synckhomev1hero_output['bounceclass_2']);?> delay-3">
                <div class="left">
                    <span><?php echo($synckhomev1hero_output['review_title']); ?></span>
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1hero_output['review_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1hero_output['review_img']['id'], '_wp_attachment_image_alt', true); ?>" />
                </div>
                <div class="right">
                    <div class="stars d-flex align-items-center">
                        <?php if(!empty($synckhomev1hero_output['list2'])):
                            foreach ($synckhomev1hero_output['list2'] as $synckhomev1hero_loop):?>
                        <i class="<?php echo esc_attr($synckhomev1hero_loop['review_icon']);?>"></i>
                        <?php endforeach; endif;?>
                    </div>
                    <p>
                        <?php echo($synckhomev1hero_output['review_content']); ?>
                    </p>
                </div>
            </div>
            <?php endif; ?>
        </div>

    </div>

</div>
</div>
</section>


<!-- <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>  -->

    <?php }
}

