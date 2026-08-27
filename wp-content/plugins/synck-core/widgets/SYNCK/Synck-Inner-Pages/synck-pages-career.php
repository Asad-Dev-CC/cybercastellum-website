<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckpagescareer Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckpagescareer_Widget extends \Elementor\Widget_Base {

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
        return 'synckpagescareer';
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
        return esc_html__( 'Pages Career Section', 'synck-core' );
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
                'label' => esc_html__( 'Career Section', 'synck-core' ),
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Career Box', 'synck-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'career_location', [
                'label'         => esc_html__( 'Career Location', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'heading_role', [
                'label'         => esc_html__( 'Heading & Role', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'career_description', [
                'label'         => esc_html__( 'Career Description', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'career_icon1', [
                'label'         => esc_html__( 'Career Icon Class Name 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Line Awesome-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://icons8.com/line-awesome/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'career_icon_tit1', [
                'label'         => esc_html__( 'Career Icon title 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'career_icon2', [
                'label'         => esc_html__( 'Career Icon Class Name 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Line Awesome-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://icons8.com/line-awesome/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'career_icon_tit2', [
                'label'         => esc_html__( 'Career Icon title 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Career Box List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ career_location }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        /*-----------------------------------------Career section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagescareer_design_option',
            [
                'label'         => esc_html__( 'Career Box Style','synck-core' ),
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
            'synckpagescareer_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .career-box h3'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagescareer_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .career-box h3',
            ]
        );

        $this->add_responsive_control(
            'synckpagescareer_heading_margin',
            [
                'label'         => __( 'Heading Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .career-box h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagescareer_heading_padding',
            [
                'label'         => __( 'Heading Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .career-box h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Description', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagescareer_description_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .career-box p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagescareer_description_typography',
                'label'         => esc_html__( 'Description Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .career-box p',
            ]
        );

        $this->add_responsive_control(
            'synckpagescareer_description_margin',
            [
                'label'         => __( 'Description Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .career-box p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagescareer_description_padding',
            [
                'label'         => __( 'Description Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .career-box p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Location', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagescareer_location_color',
            [
                'label'         => esc_html__( 'Location Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .career-box .location'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagescareer_location_typography',
                'label'         => esc_html__( 'Location Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .career-box .location',
            ]
        );

        $this->add_responsive_control(
            'synckpagescareer_location_margin',
            [
                'label'         => __( 'Location Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .career-box .location' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagescareer_location_padding',
            [
                'label'         => __( 'Location Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .career-box .location' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'section_colbg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .career-box .location'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Icon Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagescareer_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .career-box .career-time span'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagescareer_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .career-box .career-time span',
            ]
        );

        $this->add_responsive_control(
            'synckpagescareer_title_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .career-box .career-time span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagescareer_title_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .career-box .career-time span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagescareerbg_design_option',
            [
                'label'         => esc_html__( 'Career Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .career-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .career-body'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectionbox_bg_color',
            [
                'label'         => esc_html__( 'Box Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .career-body .career-lists .career-box'=> 'background-color: {{VALUE}} !important;',
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

        $synckpagescareer_output = $this->get_settings_for_display(); ?>

<!-- Career -->
<section class="career-area">
<div class="custom-container">
<div class="career-body d-flex">
<div class="career-left">
    <?php echo($synckpagescareer_output['title_heading']); ?>
</div>

<div class="career-lists">
    <?php if(!empty($synckpagescareer_output['list1'])):
        foreach ($synckpagescareer_output['list1'] as $synckpagescareer_loop):?>
    <div class="career-box">
        <?php if(!empty($synckpagescareer_loop['career_location'] )): ?>
        <span class="location"><?php echo($synckpagescareer_loop['career_location']); ?></span>
        <?php endif;?>

        <h3><?php echo($synckpagescareer_loop['heading_role']); ?></span></h3>
        <p><?php echo esc_html__($synckpagescareer_loop['career_description']); ?></p>
        <div class="career-time">
            <span><i class="<?php echo esc_attr($synckpagescareer_loop['career_icon1']);?>"></i> <?php echo esc_html__($synckpagescareer_loop['career_icon_tit1']); ?></span>
            <span><i class="<?php echo esc_attr($synckpagescareer_loop['career_icon2']);?>"></i> <?php echo esc_html__($synckpagescareer_loop['career_icon_tit2']); ?></span>
        </div>
    </div>
    <?php endforeach; endif;?>
</div>
</div>
</div>
</section>

    <?php }
}

