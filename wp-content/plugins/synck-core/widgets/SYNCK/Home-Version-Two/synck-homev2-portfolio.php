<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev2portfolio Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev2portfolio_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev2portfolio';
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
        return esc_html__( 'Home V2 Portfolio Section', 'synck-core' );
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
                'label' => esc_html__( 'Porfolio Header Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs1'
        );

        $this->start_controls_tab(
            'style_normal_tab1',
            [
               'label' => esc_html__( 'Text Areas', 'synck-core' ),
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
            'header_content', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();


        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Image Areas', 'synck-core' ),
            ]
        );

        $this->add_control(
            'portfolio_bg_img',
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

        //Portfolio Column--1

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Porfolio Column Section 1', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs2'
        );

        $this->start_controls_tab(
            'style_card_tab1',
            [
               'label' => esc_html__( 'Portfolio Card 1', 'synck-core' ),
            ]
        );

        $this->add_control(
            'portfolio_card_col1_img1',
            [
                'label'     => esc_html__( 'Portfolio Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'portfolio_card_col1_title1', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_card_col1_content1', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'portfolio_card_col1_btn_icon1',
            [
                'label'         => esc_html__( 'Portfolio Card Icon Button Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_card_col1_link1',
            [
                'label'         => esc_html__( 'Portfolio Title & Icon Link', 'synck-core' ),
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_card_tab2',
            [
               'label' => esc_html__( 'Portfolio Card 2', 'synck-core' ),
            ]
        );

        $this->add_control(
            'portfolio_card_col1_img2',
            [
                'label'     => esc_html__( 'Portfolio Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'portfolio_card_col1_title2', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_card_col1_content2', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'portfolio_card_col1_btn_icon2',
            [
                'label'         => esc_html__( 'Portfolio Card Icon Button Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_card_col1_link2',
            [
                'label'         => esc_html__( 'Portfolio Title & Icon Link', 'synck-core' ),
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

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Portfolio Column--2

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Porfolio Column Section 2', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs3'
        );

        $this->start_controls_tab(
            'style_card_tab4',
            [
               'label' => esc_html__( 'Portfolio Card 1', 'synck-core' ),
            ]
        );

        $this->add_control(
            'portfolio_card_col2_img2',
            [
                'label'     => esc_html__( 'Portfolio Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'portfolio_card_col2_title2', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_card_col2_content2', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'portfolio_card_col2_btn_icon2',
            [
                'label'         => esc_html__( 'Portfolio Card Icon Button Class Name','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_card_col2_link2',
            [
                'label'         => esc_html__( 'Portfolio Title & Icon Link', 'synck-core' ),
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_card_tab3',
            [
               'label' => esc_html__( 'Portfolio Card 2', 'synck-core' ),
            ]
        );

        $this->add_control(
            'portfolio_card_col2_img1',
            [
                'label'     => esc_html__( 'Portfolio Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'portfolio_card_col2_title1', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_card_col2_content1', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'portfolio_card_col2_btn_icon1',
            [
                'label'         => esc_html__( 'Portfolio Card Icon Button Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_card_col2_link1',
            [
                'label'         => esc_html__( 'Portfolio Title & Icon Link', 'synck-core' ),
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

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Portfolio Column--3

        $this->start_controls_section(
            'section4',
            [
                'label' => esc_html__( 'Porfolio Column Section 3', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs4'
        );

        $this->start_controls_tab(
            'style_card_tab5',
            [
               'label' => esc_html__( 'Portfolio Card 1', 'synck-core' ),
            ]
        );

        $this->add_control(
            'portfolio_card_col3_img1',
            [
                'label'     => esc_html__( 'Portfolio Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'portfolio_card_col3_title1', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_card_col3_content1', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'portfolio_card_col3_btn_icon1',
            [
                'label'         => esc_html__( 'Portfolio Card Icon Button Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_card_col3_link1',
            [
                'label'         => esc_html__( 'Portfolio Title & Icon Link', 'synck-core' ),
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_card_tab6',
            [
               'label' => esc_html__( 'Portfolio Card 2', 'synck-core' ),
            ]
        );

        $this->add_control(
            'portfolio_card_col3_img2',
            [
                'label'     => esc_html__( 'Portfolio Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'portfolio_card_col3_title2', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_card_col3_content2', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'portfolio_card_col3_btn_icon2',
            [
                'label'         => esc_html__( 'Portfolio Card Icon Button Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_card_col3_link2',
            [
                'label'         => esc_html__( 'Portfolio Title & Icon Link', 'synck-core' ),
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

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Portfolio Footer

        $this->start_controls_section(
            'section5',
            [
                'label' => esc_html__( 'Porfolio Footer Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs5'
        );

        $this->start_controls_tab(
            'style_card_tab7',
            [
               'label' => esc_html__( 'Icons Section', 'synck-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'portfolio_card_icon_class', [
                'label'         => esc_html__( 'Icon Class Name', 'synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

         $repeater->add_control(
            'portfolio_card_icon_link',
            [
                'label'         => esc_html__( 'Icon Link', 'synck-core' ),
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
                'label'     => esc_html__( 'Icons List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ portfolio_card_icon_class }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_card_tab8',
            [
               'label' => esc_html__( 'Teams Section', 'synck-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'portfolio_footer_team_img',
            [
                'label'     => esc_html__( 'Team Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Teams List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ portfolio_footer_team_img }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'portfolio_footer_team_content', [
                'label'         => esc_html__( 'Team Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_footer_sldeball_title', [
                'label'         => esc_html__( 'Slide Button Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'portfolio_footer_sldeball_link',
            [
                'label'         => esc_html__( 'Slide Button Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste the link here', 'synck-core' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*-----------------------------------------Portfolio Header section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2portfolioheader_design_option',
            [
                'label'         => esc_html__( 'Portfolio Header & Column Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
        );

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Header', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_portfolio_header_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .section-header p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_portfolio_header_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .section-header p',
            ]
        );

        $this->add_responsive_control(
            'homev2_portfolio_header_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .section-header p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_portfolio_header_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .section-header p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Title Text', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_portfolio_column_title_color',
            [
                'label'         => esc_html__( 'Button Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .portfolio-card .portfolio-body h3 a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_portfolio_column_title_typography',
                'label'         => esc_html__( 'Button Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .portfolio-card .portfolio-body h3 a',
            ]
        );

        $this->add_responsive_control(
            'homev2_portfolio_column_title_margin',
            [
                'label'         => __( 'Button Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-card .portfolio-body h3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_portfolio_column_title_padding',
            [
                'label'         => __( 'Button Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-card .portfolio-body h3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Card Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_portfolio_card_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .portfolio-card .portfolio-body p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_portfolio_card_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .portfolio-card .portfolio-body p',
            ]
        );

        $this->add_responsive_control(
            'homev2_portfolio_card_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-card .portfolio-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_portfolio_card_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-card .portfolio-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------Portfolio Footer section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2portfoliofooter_design_option',
            [
                'label'         => esc_html__( 'Portfolio Footer Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Team Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_portfolio_footer_color',
            [
                'label'         => esc_html__( 'Content Text', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-footer .our-expert-team-box .our-expert-team-box-inner p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_portfolio_footer_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .portfolio-footer .our-expert-team-box .our-expert-team-box-inner p',
            ]
        );

        $this->add_responsive_control(
            'homev2_portfolio_footer_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-footer .our-expert-team-box .our-expert-team-box-inner p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_portfolio_footer_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-footer .our-expert-team-box .our-expert-team-box-inner p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_5',
            [
               'label' => esc_html__( 'Button', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_portfolio_footer_slidebtn_color',
            [
                'label'         => esc_html__( 'Button Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .slide-btn h5'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_portfolio_footer_slidebtn_typography',
                'label'         => esc_html__( 'Button Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .slide-btn h5',
            ]
        );

        $this->add_responsive_control(
            'homev2_portfolio_footer_slidebtn_margin',
            [
                'label'         => __( 'Button Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .slide-btn h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_portfolio_footer_slidebtn_padding',
            [
                'label'         => __( 'Button Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .slide-btn h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2portfoliobg_design_option',
            [
                'label'         => esc_html__( 'Portfolio Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .portoflio-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .portfolio-card,
                        .portfolio-footer,.portfolio-social-card ul li a'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev2portfolio_output = $this->get_settings_for_display(); ?>


<!-- Home V2 Porfolios Section -->

<section class="portoflio-area">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2portfolio_output['portfolio_bg_img']['id'], 'full' ));?>" class="bg-shape <?php echo esc_attr($synckhomev2portfolio_output['animationclass_left']);?>"  alt="<?php echo get_post_meta($synckhomev2portfolio_output['portfolio_bg_img']['id'], '_wp_attachment_image_alt', true); ?>" />
<div class="custom-container">
<div class="section-header d-flex align-items-end justify-content-between">
<div class="left">
<?php echo ($synckhomev2portfolio_output['header_title_heading']); ?>
</div>

<p><?php echo esc_html($synckhomev2portfolio_output['header_content']); ?></p>
</div>

<div class="portfolio-lists d-flex w-full gap-24">

<div class="portfolio-col">

<?php if(!empty($synckhomev2portfolio_output['portfolio_card_col1_title1'])
    || ($synckhomev2portfolio_output['portfolio_card_col1_content1'])
    || ($synckhomev2portfolio_output['portfolio_card_col1_btn_icon1'])): ?>
<div class="portfolio-card portfolio-card-1 card-h">
<div class="portfolio-img">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2portfolio_output['portfolio_card_col1_img1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2portfolio_output['portfolio_card_col1_img1']['id'], '_wp_attachment_image_alt', true); ?>" />
</div>
<div class="portfolio-body">
<h3><a <?php if($synckhomev2portfolio_output['portfolio_card_col1_link1']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2portfolio_output['portfolio_card_col1_link1']['url']); ?>"><?php echo ($synckhomev2portfolio_output['portfolio_card_col1_title1']); ?></a></h3>
<p><?php echo ($synckhomev2portfolio_output['portfolio_card_col1_content1']); ?></p>

<?php if(!empty($synckhomev2portfolio_output['portfolio_card_col1_btn_icon1'] )): ?>
<a <?php if($synckhomev2portfolio_output['portfolio_card_col1_link1']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2portfolio_output['portfolio_card_col1_link1']['url']); ?>" class="theme-btn">
    <i class="<?php echo esc_attr($synckhomev2portfolio_output['portfolio_card_col1_btn_icon1']);?>"></i>
</a>
<?php endif;?>

</div>
</div>
<?php endif;?>

<?php if(!empty($synckhomev2portfolio_output['portfolio_card_col1_title2'])
    || ($synckhomev2portfolio_output['portfolio_card_col1_content2'])
    || ($synckhomev2portfolio_output['portfolio_card_col1_btn_icon2'])): ?>
<div class="portfolio-card portfolio-card-2 card-h">
<div class="portfolio-body">
<h3><a <?php if($synckhomev2portfolio_output['portfolio_card_col1_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2portfolio_output['portfolio_card_col1_link2']['url']); ?>"><?php echo ($synckhomev2portfolio_output['portfolio_card_col1_title2']); ?></a></h3>
<p><?php echo ($synckhomev2portfolio_output['portfolio_card_col1_content2']); ?></p>

<?php if(!empty($synckhomev2portfolio_output['portfolio_card_col1_btn_icon1'] )): ?>
<a <?php if($synckhomev2portfolio_output['portfolio_card_col1_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2portfolio_output['portfolio_card_col1_link2']['url']); ?>" class="theme-btn">
    <i class="<?php echo esc_attr($synckhomev2portfolio_output['portfolio_card_col1_btn_icon2']);?>"></i>
</a>
<?php endif;?>
</div>
<div class="portfolio-img">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2portfolio_output['portfolio_card_col1_img2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2portfolio_output['portfolio_card_col1_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
</div>
</div>
<?php endif;?>

</div>

<div class="portfolio-col">


<?php if(!empty($synckhomev2portfolio_output['portfolio_card_col2_title2'])
    || ($synckhomev2portfolio_output['portfolio_card_col2_content2'])
    || ($synckhomev2portfolio_output['portfolio_card_col2_btn_icon2'])): ?>
<div class="portfolio-card portfolio-card-2 card-h">
<div class="portfolio-body">
<h3><a <?php if($synckhomev2portfolio_output['portfolio_card_col2_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2portfolio_output['portfolio_card_col2_link2']['url']); ?>"><?php echo ($synckhomev2portfolio_output['portfolio_card_col2_title2']); ?></a></h3>
<p><?php echo ($synckhomev2portfolio_output['portfolio_card_col2_content2']); ?></p>

<?php if(!empty($synckhomev2portfolio_output['portfolio_card_col2_btn_icon2'] )): ?>
<a <?php if($synckhomev2portfolio_output['portfolio_card_col2_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2portfolio_output['portfolio_card_col2_link2']['url']); ?>" class="theme-btn">
    <i class="<?php echo esc_attr($synckhomev2portfolio_output['portfolio_card_col2_btn_icon2']);?>"></i>
</a>
<?php endif;?>

</div>
<div class="portfolio-img">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2portfolio_output['portfolio_card_col2_img2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2portfolio_output['portfolio_card_col2_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
</div>
</div>
<?php endif;?>

<?php if(!empty($synckhomev2portfolio_output['portfolio_card_col2_title1'])
    || ($synckhomev2portfolio_output['portfolio_card_col2_content1'])
    || ($synckhomev2portfolio_output['portfolio_card_col2_btn_icon1'])): ?>
<div class="portfolio-card portfolio-card-1 card-h">
<div class="portfolio-img">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2portfolio_output['portfolio_card_col2_img1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2portfolio_output['portfolio_card_col2_img1']['id'], '_wp_attachment_image_alt', true); ?>" />
</div>
<div class="portfolio-body">
<h3><a <?php if($synckhomev2portfolio_output['portfolio_card_col2_link1']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2portfolio_output['portfolio_card_col2_link1']['url']); ?>"><?php echo ($synckhomev2portfolio_output['portfolio_card_col2_title1']); ?></a></h3>
<p><?php echo ($synckhomev2portfolio_output['portfolio_card_col2_content1']); ?></p>

<?php if(!empty($synckhomev2portfolio_output['portfolio_card_col2_btn_icon1'] )): ?>
<a <?php if($synckhomev2portfolio_output['portfolio_card_col2_link1']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2portfolio_output['portfolio_card_col2_link1']['url']); ?>" class="theme-btn">
    <i class="<?php echo esc_attr($synckhomev2portfolio_output['portfolio_card_col2_btn_icon1']);?>"></i>
</a>
<?php endif;?>

</div>
</div>
<?php endif;?>

</div>

<div class="portfolio-col">


<?php if(!empty($synckhomev2portfolio_output['portfolio_card_col3_title1'])
    || ($synckhomev2portfolio_output['portfolio_card_col3_content1'])
    || ($synckhomev2portfolio_output['portfolio_card_col3_btn_icon1'])): ?>
<div class="portfolio-card portfolio-card-1 card-h">
<div class="portfolio-img">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2portfolio_output['portfolio_card_col3_img1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2portfolio_output['portfolio_card_col3_img1']['id'], '_wp_attachment_image_alt', true); ?>" />
</div>
<div class="portfolio-body">
<h3><a <?php if($synckhomev2portfolio_output['portfolio_card_col3_link1']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2portfolio_output['portfolio_card_col3_link1']['url']); ?>"><?php echo ($synckhomev2portfolio_output['portfolio_card_col3_title1']); ?></a></h3>
<p><?php echo ($synckhomev2portfolio_output['portfolio_card_col3_content1']); ?></p>

<?php if(!empty($synckhomev2portfolio_output['portfolio_card_col3_btn_icon1'] )): ?>
<a <?php if($synckhomev2portfolio_output['portfolio_card_col3_link1']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2portfolio_output['portfolio_card_col3_link1']['url']); ?>" class="theme-btn">
    <i class="<?php echo esc_attr($synckhomev2portfolio_output['portfolio_card_col3_btn_icon1']);?>"></i>
</a>
<?php endif;?>

</div>
</div>
<?php endif;?>


<?php if(!empty($synckhomev2portfolio_output['portfolio_card_col3_title2'])
    || ($synckhomev2portfolio_output['portfolio_card_col3_content2'])
    || ($synckhomev2portfolio_output['portfolio_card_col3_btn_icon2'])): ?>
<div class="portfolio-card portfolio-card-2 card-h">
<div class="portfolio-body">
<h3><a <?php if($synckhomev2portfolio_output['portfolio_card_col3_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2portfolio_output['portfolio_card_col3_link2']['url']); ?>"><?php echo ($synckhomev2portfolio_output['portfolio_card_col3_title2']); ?></a></h3>
<p><?php echo ($synckhomev2portfolio_output['portfolio_card_col3_content2']); ?></p>

<?php if(!empty($synckhomev2portfolio_output['portfolio_card_col3_btn_icon2'] )): ?>
<a <?php if($synckhomev2portfolio_output['portfolio_card_col3_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2portfolio_output['portfolio_card_col3_link2']['url']); ?>" class="theme-btn">
    <i class="<?php echo esc_attr($synckhomev2portfolio_output['portfolio_card_col3_btn_icon2']);?>"></i>
</a>
<?php endif;?>

</div>
<div class="portfolio-img">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2portfolio_output['portfolio_card_col3_img2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2portfolio_output['portfolio_card_col3_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
</div>
</div>
<?php endif;?>

<div class="portfolio-social-card">
<ul class="d-flex align-items-center">
<?php if(!empty($synckhomev2portfolio_output['list1'])):
foreach ($synckhomev2portfolio_output['list1'] as $synckhomev2portfolio_loop):?>
<li>
    <a <?php if($synckhomev2portfolio_loop['portfolio_card_icon_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($synckhomev2portfolio_loop['portfolio_card_icon_link']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2portfolio_loop['portfolio_card_icon_class']);?>"></i></a>
</li>
<?php endforeach; endif;?>
</ul>
</div>

</div>

</div>

<div class="portfolio-footer d-flex align-items-center justify-content-between w-full">

<div class="our-expert-team-box d-flex align-items-center">
<div class="our-expert-team-box-inner d-flex align-items-center">
<div class="imgs d-flex align-items-center">
<?php if(!empty($synckhomev2portfolio_output['list2'])):
foreach ($synckhomev2portfolio_output['list2'] as $synckhomev2portfolio_loop):?>
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2portfolio_loop['portfolio_footer_team_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2portfolio_loop['portfolio_footer_team_img']['id'], '_wp_attachment_image_alt', true); ?>" />
<?php endforeach; endif;?>
</div>
<p>
<?php echo ($synckhomev2portfolio_output['portfolio_footer_team_content']); ?>
</p>
</div>
</div>

<div class="slide-btn" id="slide-btn" data-redirect-url="<?php echo esc_url($synckhomev2portfolio_output['portfolio_footer_sldeball_link']['url']); ?>">
<div id="slide-ball"></div>
    <span id="hide-text-on-slide"></span>
<h5><?php echo esc_html($synckhomev2portfolio_output['portfolio_footer_sldeball_title']); ?></h5>
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

