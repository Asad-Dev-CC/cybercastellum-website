<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckpagesblogdetailsarea Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckpagesblogdetailsarea_Widget extends \Elementor\Widget_Base {

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
        return 'synckpagesblogdetailsarea';
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
        return esc_html__( 'Pages Blog Details Area', 'synck-core' );
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
                'label' => esc_html__( 'Blog Details Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs1'
        );

        $this->start_controls_tab(
            'style_normal_tab1',
            [
               'label' => esc_html__( 'Content Info', 'synck-core' ),
            ]
        );

        // TEXT 
        $this->add_control(
            'det_title1', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // TEXT 
        $repeater->add_control(
            'det_content1', [
                'label'         => esc_html__( 'Content Areas', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Content List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ det_content1 }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'det_img1',
            [
                'label'     => esc_html__( 'Detail Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'det_img_content1', [
                'label'         => esc_html__( 'Image Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Quote Info', 'synck-core' ),
            ]
        );

        $this->add_control(
            'block_quote', [
                'label'         => esc_html__( 'Block Quote', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'quote_name', [
                'label'         => esc_html__( 'Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'quote_designation', [
                'label'         => esc_html__( 'Designation', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'quote_auth_img',
            [
                'label'     => esc_html__( 'Author Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'quote_icon', [
                'label'         => esc_html__( 'Quote Icon Class Name', 'synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Line-Awesome Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://icons8.com/line-awesome/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );


        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'quote_content', [
                'label'         => esc_html__( 'Quote Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Quote Content List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ quote_content }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab22',
            [
               'label' => esc_html__( 'Controls Info', 'synck-core' ),
            ]
        );

        $this->add_control(
            'bdcin1_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Content Info1', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'bdcin2_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Content Info2', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'bdqi1_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Quote Info1', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'bdqi2_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Quote Info2', 'synck-core' ),
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
            'section2',
            [
                'label' => esc_html__( 'Blog Details Body Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs2'
        );

        $this->start_controls_tab(
            'style_normal_tab3',
            [
               'label' => esc_html__( 'Content Info', 'synck-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // TEXT 
        $repeater->add_control(
            'det_title2', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // TEXT 
        $repeater->add_control(
            'det_content2', [
                'label'         => esc_html__( 'Content Areas', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list3', //repeater name
            [
                'label'     => esc_html__( 'Content List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ det_title2 }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'btn_text1', [
                'label'         => esc_html__( 'Button Text 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'btn_link1',
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
            'btn_text2', [
                'label'         => esc_html__( 'Button Text 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'btn_link2',
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab4',
            [
               'label' => esc_html__( 'Image  Info', 'synck-core' ),
            ]
        );

        $this->add_control(
            'det_img2',
            [
                'label'     => esc_html__( 'Detail Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'det_img_content2', [
                'label'         => esc_html__( 'Image Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list4', //repeater name
            [
                'label'     => esc_html__( 'Content List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ det_img_content2 }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab44',
            [
               'label' => esc_html__( 'Controls Info', 'synck-core' ),
            ]
        );

        $this->add_control(
            'bdbcin1_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Content Info1', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'bdbiin1_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Image Info1', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'bdbiin2_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Image Info2', 'synck-core' ),
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

        /*-----------------------------------------CTA2 section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagesblogdetails_design_option',
            [
                'label'         => esc_html__( 'Blog Details Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs'
        );


        $this->start_controls_tab(
            'style_normal_tab',
            [
               'label' => esc_html__( 'Heading', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagesblogdetails_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .blog-details-area .blog-details-body .blog-details-inner h2'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesblogdetails_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .blog-details-area .blog-details-body .blog-details-inner h2',
            ]
        );

        $this->add_responsive_control(
            'synckpagesblogdetails_heading_margin',
            [
                'label'         => __( 'Heading Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .blog-details-area .blog-details-body .blog-details-inner h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagesblogdetails_heading_padding',
            [
                'label'         => __( 'Heading Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .blog-details-area .blog-details-body .blog-details-inner h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagesblogdetails_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .blog-details-area .blog-details-body .blog-details-inner p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesblogdetails_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .blog-details-area .blog-details-body .blog-details-inner p',
            ]
        );

        $this->add_responsive_control(
            'synckpagesblogdetails_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .blog-details-area .blog-details-body .blog-details-inner p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagesblogdetails_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .blog-details-area .blog-details-body .blog-details-inner p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Author', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagesblogdetails_name_color',
            [
                'label'         => esc_html__( 'Name Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .blog-details-area .blog-details-body .blog-details-inner blockquote .blockquote-author-box h4'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesblogdetails_name_typography',
                'label'         => esc_html__( 'Name Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .blog-details-area .blog-details-body .blog-details-inner blockquote .blockquote-author-box h4',
            ]
        );


        $this->add_control(
            'synckpagesblogdetails_designation_color',
            [
                'label'         => esc_html__( 'Designation Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .blog-details-area .blog-details-body .blog-details-inner blockquote .blockquote-author-box span'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesblogdetails_designation_typography',
                'label'         => esc_html__( 'Designation Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .blog-details-area .blog-details-body .blog-details-inner blockquote .blockquote-author-box span',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Button', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagesblogdetails_btn_color',
            [
                'label'         => esc_html__( 'Button Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .blog-details-pagination .theme-btn'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesblogdetails_btn_typography',
                'label'         => esc_html__( 'Button Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .blog-details-pagination .theme-btn',
            ]
        );

        $this->add_control(
            'hoverbtn_color',
            [
                'label'         => esc_html__( 'Hover Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn2:hover, .theme-btn:hover'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'hoverbtnbg_color',
            [
                'label'         => esc_html__( 'Hover Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn2::after, .theme-btn2::before, .theme-btn::after, .theme-btn::before'=> 'background: {{VALUE}} !important;',
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
            'synckpagesblogbg_design_option',
            [
                'label'         => esc_html__( 'Blog Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .blog-details-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .blog-details-area .blog-details-body .blog-details-inner'=> 'background-color: {{VALUE}} !important;',
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

        $synckpagesblogdetailsarea_output = $this->get_settings_for_display(); ?>

<!-- Portfolio Details Content -->
<section class="blog-details-area portfolio-details-area">
<div class="custom-container">
<div class="blog-details-body">
<div class="blog-details-inner">

<div class="blog-details-introduction">
<?php if ( $synckpagesblogdetailsarea_output['bdcin1_switcher_options'] === 'yes' ) : ?>
    <h2><?php echo esc_html__($synckpagesblogdetailsarea_output['det_title1']); ?></h2>

    <?php if(!empty($synckpagesblogdetailsarea_output['list1'])):
                foreach ($synckpagesblogdetailsarea_output['list1'] as $synckpagesblogdetailsarea_loop):?>
    <p><?php echo($synckpagesblogdetailsarea_loop['det_content1']); ?></p>
    <?php endforeach; endif;?>
<?php endif;?>

<?php if ( $synckpagesblogdetailsarea_output['bdcin2_switcher_options'] === 'yes' ) : ?>
    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesblogdetailsarea_output['det_img1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesblogdetailsarea_output['det_img1']['id'], '_wp_attachment_image_alt', true); ?>" />
    <p><?php echo($synckpagesblogdetailsarea_output['det_img_content1']); ?></p>
<?php endif;?>

<?php if ( $synckpagesblogdetailsarea_output['bdqi1_switcher_options'] === 'yes' ) : ?>
    <blockquote>
        <p><?php echo($synckpagesblogdetailsarea_output['block_quote']); ?></p>
        <div class="blockquote-author-box d-flex align-items-center">
            <?php if(!empty($synckpagesblogdetailsarea_output['quote_auth_img']['url']) ):?>
            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesblogdetailsarea_output['quote_auth_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesblogdetailsarea_output['quote_auth_img']['id'], '_wp_attachment_image_alt', true); ?>" />
            <?php endif;?>
            <div class="content">
                <h4><?php echo esc_html($synckpagesblogdetailsarea_output['quote_name']); ?></h4>
                <span><?php echo esc_html($synckpagesblogdetailsarea_output['quote_designation']); ?></span>
            </div>
        </div>
        <i class="quote-icon <?php echo esc_attr($synckpagesblogdetailsarea_output['quote_icon']);?>"></i>
    </blockquote>
<?php endif;?>

<?php if ( $synckpagesblogdetailsarea_output['bdqi2_switcher_options'] === 'yes' ) : ?>
    <?php if(!empty($synckpagesblogdetailsarea_output['list2'])):
                foreach ($synckpagesblogdetailsarea_output['list2'] as $synckpagesblogdetailsarea_loop):?>
    <p><?php echo($synckpagesblogdetailsarea_loop['quote_content']); ?></p>
    <?php endforeach; endif;?>
<?php endif;?>

<?php if ( $synckpagesblogdetailsarea_output['bdbcin1_switcher_options'] === 'yes' ) : ?>
    <?php if(!empty($synckpagesblogdetailsarea_output['list3'])):
                foreach ($synckpagesblogdetailsarea_output['list3'] as $synckpagesblogdetailsarea_loop):?>
    <h2><?php echo esc_html__($synckpagesblogdetailsarea_loop['det_title2']); ?></h2>
    <?php echo($synckpagesblogdetailsarea_loop['det_content2']); ?>
    <?php endforeach; endif;?>
<?php endif;?>

<?php if ( $synckpagesblogdetailsarea_output['bdbiin1_switcher_options'] === 'yes' ) : ?>
    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesblogdetailsarea_output['det_img2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesblogdetailsarea_output['det_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
<?php endif;?>

<?php if ( $synckpagesblogdetailsarea_output['bdbiin2_switcher_options'] === 'yes' ) : ?>
    <?php if(!empty($synckpagesblogdetailsarea_output['list4'])):
                foreach ($synckpagesblogdetailsarea_output['list4'] as $synckpagesblogdetailsarea_loop):?>
    <p><?php echo($synckpagesblogdetailsarea_loop['det_img_content2']); ?></p>
    <?php endforeach; endif;?>
<?php endif;?>

    <div class="blog-details-pagination d-flex align-items-center justify-content-between">

        <?php if(!empty($synckpagesblogdetailsarea_output['btn_text1'] )): ?>
        <a <?php if($synckpagesblogdetailsarea_output['btn_link1']['is_external'] == true ): ?> target="_blank" <?php endif; ?> 
        href="<?php echo esc_url($synckpagesblogdetailsarea_output['btn_link1']['url']);?>" class="theme-btn"><?php echo esc_html($synckpagesblogdetailsarea_output['btn_text1']); ?></a>
        <?php endif;?>

        <?php if(!empty($synckpagesblogdetailsarea_output['btn_text2'] )): ?>
        <a <?php if($synckpagesblogdetailsarea_output['btn_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?> 
        href="<?php echo esc_url($synckpagesblogdetailsarea_output['btn_link2']['url']);?>" class="theme-btn"><?php echo esc_html($synckpagesblogdetailsarea_output['btn_text2']); ?></a>
        <?php endif;?>

    </div>
</div>

</div>
</div>
</div>
</section>

    <?php }
}

