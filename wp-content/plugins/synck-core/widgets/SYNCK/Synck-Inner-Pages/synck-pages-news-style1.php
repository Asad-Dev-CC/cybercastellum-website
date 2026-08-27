<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckpagesnewsstyle1 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckpagesnewsstyle1_Widget extends \Elementor\Widget_Base {

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
        return 'synckpagesnewsstyle1';
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
        return esc_html__( 'Pages News Style1 Section', 'synck-core' );
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
                'label' => esc_html__( 'News Row Card Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
        );

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Content Section', 'synck-core' ),
            ]
        );

        $this->add_control(
            'news_row_card_img',
            [
                'label'     => esc_html__( 'News Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        
        $this->add_control(
            'news_row_card_title', [
                'label'         => esc_html__( 'News Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'news_row_card_heading', [
                'label'         => esc_html__( 'News Card Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'news_row_card_content', [
                'label'         => esc_html__( 'News Card Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'List & Button', 'synck-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'news_row_list_icon_title', [
                'label'         => esc_html__( 'News Lists Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'news_row_list_icon_class', [
                'label'         => esc_html__( 'News Lists Icon Class', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Line Awesome-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://icons8.com/line-awesome/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2', //repeater name
            [
                'label'     => esc_html__( 'News Card Lists', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ news_row_list_icon_title }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'news_row_btn_arrow_icon', [
                'label'         => esc_html__( 'Button Arrow Icon', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'news_row_btn_arrow_link',
            [
                'label'         => esc_html__( 'Button Arrow & Heading Link', 'synck-core' ),
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

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Content Section', 'synck-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'news_col_card_img',
            [
                'label'     => esc_html__( 'News Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        
        $repeater->add_control(
            'news_col_title', [
                'label'         => esc_html__( 'News Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'news_col_heading', [
                'label'         => esc_html__( 'News Card Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'news_col_content', [
                'label'         => esc_html__( 'News Card content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'news_col_list_icon_title', [
                'label'         => esc_html__( 'News Lists & Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'news_col_btn_arrow_icon', [
                'label'         => esc_html__( 'Button Arrow Icon', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'news_col_btn_arrow_link',
            [
                'label'         => esc_html__( 'Button Arrow & Heading Link', 'synck-core' ),
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
                'title_field' => '{{{ news_col_title }}}', // Reapeter Title 
            ]
        );

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

        /*-----------------------------------------News Row Card section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagesnewsstyle1rowcard_design_option',
            [
                'label'         => esc_html__( 'News Row Card Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_4'
        );

        $this->start_controls_tab(
            'style_normal_tab_5',
            [
               'label' => esc_html__( 'Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'news_row_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .sticky-news .news-content .section-subtitle'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'news_row_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .sticky-news .news-content .section-subtitle',
            ]
        );


        $this->add_responsive_control(
            'news_row_title_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .sticky-news .news-content .section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'news_row_title_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .sticky-news .news-content .section-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_6',
            [
               'label' => esc_html__( 'Heading', 'synck-core' ),
            ]
        );

        $this->add_control(
            'news_row_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .sticky-news .news-content .section-title a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'news_row_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .sticky-news .news-content .section-title a',
            ]
        );

        $this->add_responsive_control(
            'news_row_heading_margin',
            [
                'label'         => __( 'Heading Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .sticky-news .news-content .section-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'news_row_heading_padding',
            [
                'label'         => __( 'Heading Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .sticky-news .news-content .section-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_7',
            [
               'label' => esc_html__( 'Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'news_row_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .sticky-news .news-content p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'news_row_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .sticky-news .news-content p',
            ]
        );

        $this->add_responsive_control(
            'news_row_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .sticky-news .news-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'news_row_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .sticky-news .news-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_8',
            [
               'label' => esc_html__( 'List', 'synck-core' ),
            ]
        );

        $this->add_control(
            'news_row_list_color',
            [
                'label'         => esc_html__( 'List Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .sticky-news .news-content ul li'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'news_row_list_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .sticky-news .news-content ul li',
            ]
        );

        $this->add_responsive_control(
            'news_row_list_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .sticky-news .news-content ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'news_row_list_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .sticky-news .news-content ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'news_row_icon_color',
            [
                'label'         => esc_html__( 'List Icon Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .sticky-news .news-content ul li i'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'news_row_iconbg_color',
            [
                'label'         => esc_html__( 'List Icon BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .sticky-news .news-content ul li i'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------News Column Card section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagesnewsstyle1colcard_design_option',
            [
                'label'         => esc_html__( 'News Column Card Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_5'
        );

        $this->start_controls_tab(
            'style_normal_tab_9',
            [
               'label' => esc_html__( 'Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'news_col_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .news-item .news-item-body .section-subtitle'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'news_colhov_title_color',
            [
                'label'         => esc_html__( 'Hover Title Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .news-item .news-item-body .section-title a:hover'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'news_col_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .news-item .news-item-body .section-subtitle',
            ]
        );


        $this->add_responsive_control(
            'news_col_title_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news-item .news-item-body .section-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'news_col_title_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news-item .news-item-body .section-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_10',
            [
               'label' => esc_html__( 'Heading', 'synck-core' ),
            ]
        );

        $this->add_control(
            'news_col_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .news-item .news-item-body .section-title a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'news_col_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .news-item .news-item-body .section-title a',
            ]
        );

        $this->add_responsive_control(
            'news_col_heading_margin',
            [
                'label'         => __( 'Heading Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news-item .news-item-body .section-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'news_col_heading_padding',
            [
                'label'         => __( 'Heading Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news-item .news-item-body .section-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_11',
            [
               'label' => esc_html__( 'Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'news_col_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .news-item .news-item-body p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'news_col_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .news-item .news-item-body pp',
            ]
        );

        $this->add_responsive_control(
            'news_col_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news-item .news-item-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'news_col_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news-item .news-item-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_12',
            [
               'label' => esc_html__( 'List', 'synck-core' ),
            ]
        );

        $this->add_control(
            'news_col_list_color',
            [
                'label'         => esc_html__( 'List Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .news-item .news-item-body ul li'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'news_col_list_typography',
                'label'         => esc_html__( 'List Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .news-item .news-item-body ul li',
            ]
        );

        $this->add_responsive_control(
            'news_col_list_margin',
            [
                'label'         => __( 'List Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news-item .news-item-body ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'news_col_list_padding',
            [
                'label'         => __( 'List Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .news-item .news-item-body ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'news_col_icon_color',
            [
                'label'         => esc_html__( 'List Icon Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .news-item .news-item-body ul li i'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'news_col_iconbg_color',
            [
                'label'         => esc_html__( 'List Icon BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .news-item .news-item-body ul li i'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagesnewsbg_design_option',
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
                    '{{WRAPPER}}  .news-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab(); 

        $this->start_controls_tab(
            'style_normal_tab_05',
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
                    '{{WRAPPER}}  .sticky-news'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab(); 

        $this->start_controls_tab(
            'style_normal_tab_06',
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
                    '{{WRAPPER}}  .news-item'=> 'background: {{VALUE}} !important;',
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

        $synckpagesnewsstyle1_output = $this->get_settings_for_display(); ?>

<!-- News Section -->
<section class="news-area">
<div class="custom-container">

<?php if ( $synckpagesnewsstyle1_output['row_switcher_options'] === 'yes' ) : ?>
<div class="sticky-news d-flex card-h">
    <?php if(!empty($synckpagesnewsstyle1_output['news_row_card_img'] )): ?>
<div class="news-img-box">
    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesnewsstyle1_output['news_row_card_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesnewsstyle1_output['news_row_card_img']['id'], '_wp_attachment_image_alt', true); ?>" />
</div>
 <?php endif;?>
<div class="news-content">
    <h6 class="section-subtitle section-subtitle1"><?php echo esc_html($synckpagesnewsstyle1_output['news_row_card_title']); ?></h6>
    <h2 class="section-title">
        <a <?php if($synckpagesnewsstyle1_output['news_row_btn_arrow_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
        href="<?php echo esc_url($synckpagesnewsstyle1_output['news_row_btn_arrow_link']['url']); ?>"><?php echo($synckpagesnewsstyle1_output['news_row_card_heading']); ?></a>
    </h2>
    <p><?php echo($synckpagesnewsstyle1_output['news_row_card_content']); ?></p>
    <ul>

        <?php if(!empty($synckpagesnewsstyle1_output['list2'])):
        foreach ($synckpagesnewsstyle1_output['list2'] as $synckpagesnewsstyle1_loop):?>
        <li>
            <i class="<?php echo esc_attr($synckpagesnewsstyle1_loop['news_row_list_icon_class']);?>"></i> <?php echo esc_html($synckpagesnewsstyle1_loop['news_row_list_icon_title']); ?>
        </li>
        <?php endforeach; endif;?>

    </ul>
<?php if(!empty($synckpagesnewsstyle1_output['news_row_btn_arrow_icon'] )): ?>
    <a <?php if($synckpagesnewsstyle1_output['news_row_btn_arrow_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($synckpagesnewsstyle1_output['news_row_btn_arrow_link']['url']); ?>" class="theme-btn">
        <i class="icon-right <?php echo esc_attr($synckpagesnewsstyle1_output['news_row_btn_arrow_icon']);?>"></i>
    </a>
    <?php endif;?>
</div>
</div>
<?php endif;?>

<?php if ( $synckpagesnewsstyle1_output['col_switcher_options'] === 'yes' ) : ?>
<div class="news-items align-items-start">
<?php if(!empty($synckpagesnewsstyle1_output['list1'])):
        foreach ($synckpagesnewsstyle1_output['list1'] as $synckpagesnewsstyle1_loop):?>
<div class="news-item card-h">
    <div class="news-img-box">
        <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesnewsstyle1_loop['news_col_card_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesnewsstyle1_loop['news_col_card_img']['id'], '_wp_attachment_image_alt', true); ?>" />
    </div>
    <div class="news-item-body">

            <h6 class="section-subtitle"><?php echo esc_html($synckpagesnewsstyle1_loop['news_col_title']); ?></h6>
            <h2 class="section-title">
                <a href="<?php echo esc_url($synckpagesnewsstyle1_loop['news_col_btn_arrow_link']['url']); ?>"><?php echo ($synckpagesnewsstyle1_loop['news_col_heading']); ?></a>
            </h2>
            <p><?php echo ($synckpagesnewsstyle1_loop['news_col_content']); ?></p>

            <?php echo ($synckpagesnewsstyle1_loop['news_col_list_icon_title']); ?>

        <?php if(!empty($synckpagesnewsstyle1_loop['news_col_btn_arrow_icon'] )): ?>
            <a <?php if($synckpagesnewsstyle1_loop['news_col_btn_arrow_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckpagesnewsstyle1_loop['news_col_btn_arrow_link']['url']); ?>" class="theme-btn">
                <i class="icon-right <?php echo esc_attr($synckpagesnewsstyle1_loop['news_col_btn_arrow_icon']);?>"></i>
            </a>
            <?php endif;?>
    </div>
</div>
<?php endforeach; endif;?>

</div>
<?php endif;?>

</div>
</section>

<!-- <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>  -->

    <?php }
}

