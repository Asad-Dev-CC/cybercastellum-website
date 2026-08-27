<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev2services Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev2services_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev2services';
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
        return esc_html__( 'Home V2 Service Section', 'synck-core' );
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
                'label' => esc_html__( 'Service Header Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
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
            'header_description', [
                'label'         => esc_html__( 'Description', 'synck-core' ),
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
            'header_btn', [
                'label'         => esc_html__( 'Button Text', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

          // LINK
        $this->add_control(
            'header_btn_link',
            [
                'label'         => esc_html__( 'Button Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste the link here', 'synck-core' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );

        $this->add_control(
            'header_btn_icon',
            [
                'label'         => esc_html__( 'Button Icon Class','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'service_bg_img',
            [
                'label'     => esc_html__( 'Section Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'animationclass_left',
            [
                'label'         => esc_html__( 'Background Image Animation Class Left','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Service Cards Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

          // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_card_img',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'service_card_title', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'service_card_content', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // TEXT 
        $repeater->add_control( //this line only for repeater 
            'service_card_icon',
            [
                'label'         => esc_html__( 'Card Icon Class','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'service_icon_link',
            [
                'label'         => esc_html__( 'Card Icon Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste the link here', 'synck-core' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Service Cards List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ service_card_title }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Service Bottom Cards Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs1'
        );

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Bottom Card 1', 'synck-core' ),
            ]
        );

        $this->add_control(
            'service_bottom_card_img1',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'service_bottom_card_title1', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'service_bottom_card_content1', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_bottom_card_list_title1', [
                'label'         => esc_html__( 'Lists Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // TEXT 
        $repeater->add_control( //this line only for repeater 
            'service_bottom_card_list_icon1',
            [
                'label'         => esc_html__( 'List Icon Class','synck-core' ),
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
                'label'     => esc_html__( 'Service Cards List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ service_bottom_card_list_title1 }}}', 
            ]
        );

        // TEXT 
        $this->add_control( //this line only for repeater 
            'service_bottom_card_icon1',
            [
                'label'         => esc_html__( 'Card Icon Class','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'service_bottom_card_icon_link1',
            [
                'label'         => esc_html__( 'Card Icon Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste the link here', 'synck-core' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Bottom Card 2', 'synck-core' ),
            ]
        );

        $this->add_control(
            'service_bottom_card_img2',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'service_bottom_card_title2', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'service_bottom_card_content2', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_bottom_card_list_title2', [
                'label'         => esc_html__( 'Lists Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // TEXT 
        $repeater->add_control( //this line only for repeater 
            'service_bottom_card_list_icon2',
            [
                'label'         => esc_html__( 'List Icon Class','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Line Awesome-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://icons8.com/line-awesome/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list3', //repeater name
            [
                'label'     => esc_html__( 'Service Cards List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ service_bottom_card_list_title2 }}}', // Reapeter Title 
            ]
        );

        // TEXT 
        $this->add_control( 
            'service_bottom_card_icon2',
            [
                'label'         => esc_html__( 'Card Icon Class','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'service_bottom_card_icon_link2',
            [
                'label'         => esc_html__( 'Card Icon Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste the link here', 'synck-core' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => true,
                    'nofollow'      => true,
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*-----------------------------------------Hero Service Header section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2serviceheader_design_option',
            [
                'label'         => esc_html__( 'Service Header Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_11'
        );

        $this->start_controls_tab(
            'style_normal_tab_11',
            [
               'label' => esc_html__( 'Description', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_service_header_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .service2-area .service2-header p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_service_header_typography',
                'label'         => esc_html__( 'Description Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .service2-area .service2-header p',
            ]
        );

        $this->add_responsive_control(
            'hero_service_header_margin',
            [
                'label'         => __( 'Description Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service2-area .service2-header p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'hero_service_header_padding',
            [
                'label'         => __( 'Description Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service2-area .service2-header p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_22',
            [
               'label' => esc_html__( 'Button text', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_header_button_color',
            [
                'label'         => esc_html__( 'Button Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'hero_header_button_typography',
                'label'         => esc_html__( 'Button Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .theme-btn',
            ]
        );

        $this->add_responsive_control(
            'hero_header_button_margin',
            [
                'label'         => __( 'Button Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .theme-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_23',
            [
               'label' => esc_html__( 'Hover Button', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hero_header_hoverbutton_color',
            [
                'label'         => esc_html__( 'Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .service2-area .service2-header .theme-btn:hover'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'section_hovbtnbg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .service2-area .service2-header .theme-btn::before, .service2-area .service2-header .theme-btn::after'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab(); 

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------Home V2 Service Cards section styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2servicecards_design_option',
            [
                'label'         => esc_html__( 'Service Cards Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_service_cards_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .service3-card h3, .service2-card h3'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_service_cards_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .service3-card h3, .service2-card h3',
            ]
        );

        $this->add_responsive_control(
            'homev2_service_cards_title_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service3-card h3, .service2-card h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_service_cards_title_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service3-card h3, .service2-card h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Description text', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_service_cards_description_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .service3-card h3, .service2-card p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_service_cards_description_typography',
                'label'         => esc_html__( 'Description Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .service3-card h3, .service2-card p',
            ]
        );

        $this->add_responsive_control(
            'homev2_service_cards_description_margin',
            [
                'label'         => __( 'Description Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service3-card h3, .service2-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_service_cards_description_padding',
            [
                'label'         => __( 'Description Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service3-card h3, .service2-card p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        //END
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------Home V2 Service Cards section styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2servicebottomcards_design_option',
            [
                'label'         => esc_html__( 'Service Bottom Cards Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_3'
        );

        $this->start_controls_tab(
            'style_normal_tab_5',
            [
               'label' => esc_html__( 'Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_service_bottom_cards_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .service3-card .service3-body .service3-content h4'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_service_bottom_cards_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .service3-card .service3-body .service3-content h4',
            ]
        );

        $this->add_responsive_control(
            'homev2_service_bottom_cards_title_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service3-card .service3-body .service3-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_service_bottom_cards_title_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service3-card .service3-body .service3-content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_6',
            [
               'label' => esc_html__( 'Content text', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_service_bottom_cards_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .service3-card p, .service2-card p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_service_bottom_cards_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .service3-card p, .service2-card p',
            ]
        );

        $this->add_responsive_control(
            'homev2_service_bottom_cards_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service3-card p, .service2-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_service_bottom_cards_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service3-card p, .service2-card p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_7',
            [
               'label' => esc_html__( 'List Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_service_bottom_cards_listtitle_color',
            [
                'label'         => esc_html__( 'List Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .service3-card .service3-body .service3-content ul li'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_service_bottom_cards_listtitle_typography',
                'label'         => esc_html__( 'List Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .service3-card .service3-body .service3-content ul li',
            ]
        );

        $this->add_responsive_control(
            'homev2_service_bottom_cards_listtitle_margin',
            [
                'label'         => __( 'List Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service3-card .service3-body .service3-content ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_service_bottom_cards_listtitle_padding',
            [
                'label'         => __( 'List Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service3-card .service3-body .service3-content ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'section_icon_color',
            [
                'label'         => esc_html__( 'Icon Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .service3-card .service3-body .service3-content ul li i'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'section_iconbg_color',
            [
                'label'         => esc_html__( 'Icon BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .service3-card .service3-body .service3-content ul li i'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );
        
        //END
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

         /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2servicebg_design_option',
            [
                'label'         => esc_html__( 'Service Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .service2-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .service2-card,
                        .service3-card'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev2services_output = $this->get_settings_for_display(); ?>


<!-- Home V2 Services Section -->

<section class="service2-area">
<img class="bg-shape <?php echo esc_attr($synckhomev2services_output['animationclass_left']);?>" src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2services_output['service_bg_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2services_output['service_bg_img']['id'], '_wp_attachment_image_alt', true); ?>" />
<div class="custom-container">
<div class="custom-row">
<div class="service2-header d-flex align-items-center justify-content-between w-full">
    <div class="left">
        <?php echo ($synckhomev2services_output['header_title_heading']); ?>
        <p><?php echo esc_html($synckhomev2services_output['header_description']); ?></p>
    </div>

<?php if(!empty($synckhomev2services_output['header_btn'] )): ?>
    <a <?php if($synckhomev2services_output['header_btn_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($synckhomev2services_output['header_btn_link']['url']); ?>
" class="theme-btn">
        <?php echo esc_html($synckhomev2services_output['header_btn']); ?>
        <i class="<?php echo esc_attr($synckhomev2services_output['header_btn_icon']);?>"></i> 
    </a>
<?php endif;?>

</div>
</div>

<div class="service2-items d-flex w-full">

<?php if(!empty($synckhomev2services_output['list1'])):
foreach ($synckhomev2services_output['list1'] as $synckhomev2services_loop):?>
<div class="service2-card card-h">
    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2services_loop['service_card_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2services_loop['service_card_img']['id'], '_wp_attachment_image_alt', true); ?>" />
    <h3><?php echo esc_html($synckhomev2services_loop['service_card_title']); ?></h3>
    <p><?php echo ($synckhomev2services_loop['service_card_content']); ?></p>

<?php if(!empty($synckhomev2services_loop['service_card_icon'] )): ?>
    <a <?php if($synckhomev2services_loop['service_icon_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($synckhomev2services_loop['service_icon_link']['url']); ?>" class="theme-btn">
        <i class="<?php echo esc_attr($synckhomev2services_loop['service_card_icon']);?>"></i> 
    </a>
<?php endif;?>

</div>
<?php endforeach; endif;?>

</div>

<div class="d-flex gap-24 service2-bottom-2-col">

<?php if(!empty($synckhomev2services_output['service_bottom_card_title1'])
    || ($synckhomev2services_output['service_bottom_card_content1'])
    || ($synckhomev2services_output['service_bottom_card_icon1'])): ?>
<div class="service3-card d-flex flex-1 card-h">
    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2services_output['service_bottom_card_img1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2services_output['service_bottom_card_img1']['id'], '_wp_attachment_image_alt', true); ?>" />
    <div class="service3-body">
        <div class="service3-content">
            <h4><?php echo esc_html($synckhomev2services_output['service_bottom_card_title1']); ?></h4>
            <p><?php echo ($synckhomev2services_output['service_bottom_card_content1']); ?></p>
            <ul>
                <?php if(!empty($synckhomev2services_output['list2'])):
                foreach ($synckhomev2services_output['list2'] as $synckhomev2services_loop):?>
                <li><i class="<?php echo esc_attr($synckhomev2services_loop['service_bottom_card_list_icon1']);?>"></i> <?php echo esc_html($synckhomev2services_loop['service_bottom_card_list_title1']); ?></li>
                <?php endforeach; endif;?>
            </ul>

            <?php if(!empty($synckhomev2services_output['service_bottom_card_icon1'] )): ?>
            <a <?php if($synckhomev2services_output['service_bottom_card_icon_link1']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckhomev2services_output['service_bottom_card_icon_link1']['url']); ?>" class="theme-btn">
                <i class="<?php echo esc_attr($synckhomev2services_output['service_bottom_card_icon1']);?>"></i>  
            </a>
            <?php endif;?>

        </div>
    </div>
</div>
<?php endif;?>

<?php if(!empty($synckhomev2services_output['service_bottom_card_title2'])
    || ($synckhomev2services_output['service_bottom_card_content2'])
    || ($synckhomev2services_output['service_bottom_card_icon2'])): ?>
<div class="service3-card d-flex flex-1 card-h">
    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2services_output['service_bottom_card_img2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2services_output['service_bottom_card_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
    <div class="service3-body">
        <div class="service3-content">
            <h4><?php echo esc_html($synckhomev2services_output['service_bottom_card_title2']); ?></h4>
            <p><?php echo ($synckhomev2services_output['service_bottom_card_content2']); ?></p>
            <ul>
            <?php if(!empty($synckhomev2services_output['list3'])):
                foreach ($synckhomev2services_output['list3'] as $synckhomev2services_loop):?>
                <li><i class="<?php echo esc_attr($synckhomev2services_loop['service_bottom_card_list_icon2']);?>"></i> <?php echo esc_html($synckhomev2services_loop['service_bottom_card_list_title2']); ?></li>
                <?php endforeach; endif;?>
            </ul>

            <?php if(!empty($synckhomev2services_output['service_bottom_card_icon2'] )): ?>
            <a <?php if($synckhomev2services_output['service_bottom_card_icon_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckhomev2services_output['service_bottom_card_icon_link2']['url']); ?>" class="theme-btn">
                <i class="<?php echo esc_attr($synckhomev2services_output['service_bottom_card_icon2']);?>"></i>  
            </a>
            <?php endif;?>

        </div>
    </div>
</div>
<?php endif;?>


</div>

</div>
</section>

    <?php }
}

