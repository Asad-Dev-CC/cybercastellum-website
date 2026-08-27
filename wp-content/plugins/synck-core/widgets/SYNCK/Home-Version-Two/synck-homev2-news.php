<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev2news Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev2news_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev2news';
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
        return esc_html__( 'Home V2 News Section', 'synck-core' );
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
                'label' => esc_html__( 'News Header Section', 'synck-core' ),
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
            'news_header_content', [
                'label'         => esc_html__( 'Header Content', 'synck-core' ),
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
            'news_btn_name', [
                'label'         => esc_html__( 'Header Button Text', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'news_btn_icon_class',
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
            'news_btn_link',
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

        $this->end_controls_tabs();
       
        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'News Column Cards Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'news_col_card_img',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'news_col_card_date', [
                'label'         => esc_html__( 'Date', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'news_col_card_tag', [
                'label'         => esc_html__( 'Tag', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'news_col_card_heading', [
                'label'         => esc_html__( 'Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'news_col_card_content', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'news_col_card_featured', [
                'label'         => esc_html__( 'Card Ribbon', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // TEXT 
        $repeater->add_control( //this line only for repeater 
            'news_col_card_btn_icon_class',
            [
                'label'         => esc_html__( 'Card button Icon Class','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'news_col_card_link',
            [
                'label'         => esc_html__( 'Cards Link', 'synck-core' ),
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
                'label'     => esc_html__( 'News Cards List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ news_col_card_tag }}}', // Reapeter Title 
            ]
        );

        //END

        $this->end_controls_section();

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'News Row Card Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs11'
        );

        $this->start_controls_tab(
            'style_normal_tab11',
            [
               'label' => esc_html__( 'Content Section', 'synck-core' ),
            ]
        );

        $this->add_control(
            'news_row_card_date', [
                'label'         => esc_html__( 'Date', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'news_row_card_tag', [
                'label'         => esc_html__( 'Tag', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'news_row_card_heading', [
                'label'         => esc_html__( 'Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'news_row_card_content', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(  
            'news_row_card_btn_icon_class',
            [
                'label'         => esc_html__( 'Card button Icon Class','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'news_row_card_link',
            [
                'label'         => esc_html__( 'Cards Link', 'synck-core' ),
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
            'style_normal_tab22',
            [
               'label' => esc_html__( 'Image Section', 'synck-core' ),
            ]
        );

        $this->add_control(
            'news_row_card_img',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'news_row_bg_img',
            [
                'label'     => esc_html__( 'Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(  
            'animationclass_right',
            [
                'label'         => esc_html__( 'Background Image Animation Slide Right Class','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        //END

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section4',
            [
                'label' => esc_html__( 'Cards Controls Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'row_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Row Card Info', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'col_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Column Card Info', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_section();


        /*-----------------------------------------News Header section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2newsheader_design_option',
            [
                'label'         => esc_html__( 'News Header Section Style','synck-core' ),
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
            'homev2_news_header_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .news2-area .section-header p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_news_header_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .news2-area .section-header p',
            ]
        );

        $this->add_responsive_control(
            'homev2_news_header_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news2-area .section-header p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_news_header_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news2-area .section-header p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Button Text', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_news_header_button_color',
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
                'name'          => 'homev2_news_header_button_typography',
                'label'         => esc_html__( 'Button Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .theme-btn',
            ]
        );

        $this->add_responsive_control(
            'homev2_news_header_button_margin',
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
            'homev2_news_header_button_padding',
            [
                'label'         => __( 'Button Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab3',
            [
               'label' => esc_html__( 'Hover Button', 'synck-core' ),
            ]
        );

        $this->add_control(
            'news_hoverbtn_color',
            [
                'label'         => esc_html__( 'Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn:hover'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'news_hoverbtnbg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn2::after, .theme-btn2::before, .theme-btn::after, .theme-btn::before'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------News Cards section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2newscards_design_option',
            [
                'label'         => esc_html__( 'News Cards Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Date & Tag', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_news_cards_date_color',
            [
                'label'         => esc_html__( 'Date Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .news2-card .meta > *'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_news_cards_date_typography',
                'label'         => esc_html__( 'Date Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .news2-card .meta > *',
            ]
        );

        $this->add_responsive_control(
            'homev2_news_cards_date_margin',
            [
                'label'         => __( 'Date Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news2-card .meta > *' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_news_cards_date_padding',
            [
                'label'         => __( 'Date Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news2-card .meta > *' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'news_datebg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .news2-card .meta > *'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_5',
            [
               'label' => esc_html__( 'Heading', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_news_card_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .news2-card h3 a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_news_card_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .news2-card h3 a',
            ]
        );

        $this->add_responsive_control(
            'homev2_news_card_heading_margin',
            [
                'label'         => __( 'Heading Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news2-card h3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_news_card_heading_padding',
            [
                'label'         => __( 'Heading Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news2-card h3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_6',
            [
               'label' => esc_html__( 'Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_news_card_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .news2-card p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_news_card_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .news2-card p',
            ]
        );

        $this->add_responsive_control(
            'homev2_news_card_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news2-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_news_card_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news2-card p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2newsbg_design_option',
            [
                'label'         => esc_html__( 'News Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .news2-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab(); 

        $this->start_controls_tab(
            'style_normal_tab_05',
            [
               'label' => esc_html__( 'Column BG', 'synck-core' ),
            ]
        );

        $this->add_control(
            'sectioncol_bg_color',
            [
                'label'         => esc_html__( 'Column Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .news2-card'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab(); 

        $this->start_controls_tab(
            'style_normal_tab_06',
            [
               'label' => esc_html__( 'Row BG', 'synck-core' ),
            ]
        );

        $this->add_control(
            'sectionrow_bg_color',
            [
                'label'         => esc_html__( 'Row Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .news2-sticky'=> 'background: {{VALUE}} !important;',
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

        $synckhomev2news_output = $this->get_settings_for_display(); ?>


<!-- Home V2 News Section -->

<section class="news2-area">
<div class="custom-container">

<div class="section-header d-flex align-items-center justify-content-between">
<div class="left">

<?php echo ($synckhomev2news_output['header_title_heading']); ?>

<p>  <?php echo esc_html($synckhomev2news_output['news_header_content']); ?>
</p>
</div>

<a <?php if($synckhomev2news_output['news_btn_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2news_output['news_btn_link']['url']); ?>" class="theme-btn">
<?php echo esc_html($synckhomev2news_output['news_btn_name']); ?>
<i class="<?php echo esc_attr($synckhomev2news_output['news_btn_icon_class']);?>"></i>
</a>

</div>

<?php if ( $synckhomev2news_output['row_switcher_options'] === 'yes' ) : ?>
<div class="news2-lists d-flex">
<?php if(!empty($synckhomev2news_output['list1'])):
    foreach ($synckhomev2news_output['list1'] as $synckhomev2news_loop):?>
<div class="news2-card card-h">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2news_loop['news_col_card_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2news_loop['news_col_card_img']['id'], '_wp_attachment_image_alt', true); ?>" />
<?php if(!empty($synckhomev2news_loop['news_col_card_featured'] )): ?>
<span class="news-ribbon">
<?php echo ($synckhomev2news_loop['news_col_card_featured']); ?>
</span>
<?php endif;?>
<div class="news2-card-body">
<div class="meta">

<?php if(!empty($synckhomev2news_loop['news_col_card_date'] )): ?>
<span class="date"><?php echo esc_html($synckhomev2news_loop['news_col_card_date']); ?>
</span>
<?php endif;?>

<?php if(!empty($synckhomev2news_loop['news_col_card_tag'] )): ?>
<a <?php if($synckhomev2news_loop['news_col_card_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2news_loop['news_col_card_link']['url']); ?>" class="category"><?php echo esc_html($synckhomev2news_loop['news_col_card_tag']); ?>
</a>
<?php endif;?>

</div>
<h3><a <?php if($synckhomev2news_loop['news_col_card_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2news_loop['news_col_card_link']['url']); ?>"><?php echo ($synckhomev2news_loop['news_col_card_heading']); ?></a></h3>
<p><?php echo esc_html($synckhomev2news_loop['news_col_card_content']); ?></p>

<?php if(!empty($synckhomev2news_loop['news_col_card_btn_icon_class'] )): ?>
<a <?php if($synckhomev2news_loop['news_col_card_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2news_loop['news_col_card_link']['url']); ?>" class="theme-btn">
<i class="<?php echo esc_attr($synckhomev2news_loop['news_col_card_btn_icon_class']);?>"></i>
</a>
<?php endif;?>

</div>
</div>
<?php endforeach; endif;?>
</div>
<?php endif;?>

<?php if ( $synckhomev2news_output['col_switcher_options'] === 'yes' ) : ?>
<?php if(!empty($synckhomev2news_output['news_row_card_heading'] )||
($synckhomev2news_output['news_row_card_content'] )): ?>
<div class="news2-sticky news2-card d-flex card-h">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2news_output['news_row_bg_img']['id'], 'full' ));?>"  class="<?php echo esc_attr($synckhomev2news_output['animationclass_right']);?> bg-shape" alt="<?php echo get_post_meta($synckhomev2news_output['news_row_bg_img']['id'], '_wp_attachment_image_alt', true); ?>"/>
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2news_output['news_row_card_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2news_output['news_row_card_img']['id'], '_wp_attachment_image_alt', true); ?>" />
<div class="news2-card-body">
<div class="meta">

<?php if(!empty($synckhomev2news_output['news_row_card_date'] )): ?>
<span class="date"><?php echo esc_html($synckhomev2news_output['news_row_card_date']); ?></span>
<?php endif;?>

<?php if(!empty($synckhomev2news_output['news_row_card_tag'] )): ?>
<a  <?php if($synckhomev2news_output['news_row_card_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2news_output['news_row_card_link']['url']); ?>" class="category"><?php echo esc_html($synckhomev2news_output['news_row_card_tag']); ?></a>
<?php endif;?>
</div>

<h3><a  <?php if($synckhomev2news_output['news_row_card_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2news_output['news_row_card_link']['url']); ?>"><?php echo esc_html($synckhomev2news_output['news_row_card_heading']); ?></a></h3>
<p><?php echo esc_html($synckhomev2news_output['news_row_card_content']); ?></p>

<?php if(!empty($synckhomev2news_output['news_row_card_btn_icon_class'] )): ?>
<a  <?php if($synckhomev2news_output['news_row_card_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2news_output['news_row_card_link']['url']); ?>" class="theme-btn">
<i class="<?php echo esc_attr($synckhomev2news_output['news_row_card_btn_icon_class']);?>"></i>
</a>
<?php endif;?>

</div>
</div>
<?php endif;?>
<?php endif;?>

</div>
</section>


    <?php }
}

