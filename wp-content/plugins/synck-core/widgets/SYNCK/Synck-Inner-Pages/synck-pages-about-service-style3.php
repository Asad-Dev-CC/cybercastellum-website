<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckpagesaboutservicedark2 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckpagesaboutservicestyle3_Widget extends \Elementor\Widget_Base {

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
        return 'synckpagesaboutservicedark2';
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
        return esc_html__( 'Pages About Service Style3', 'synck-core' );
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
                'label' => esc_html__( 'About Service Section', 'synck-core' ),
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

        $this->add_control(
            'description', [
                'label'         => esc_html__( 'Description', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Image & Check List', 'synck-core' ),
            ]
        );

        $this->add_control(
            'abt_serv_img',
            [
                'label'     => esc_html__( 'Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'check_list', [
                'label'         => esc_html__( 'Check List Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'check_icon', [
                'label'         => esc_html__( 'Check List Icon Class Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Line Awesome-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://icons8.com/line-awesome/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Check List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ check_list }}}', // Reapeter Title 
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*-----------------------------------------About section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagesaboutservicedark2_design_option',
            [
                'label'         => esc_html__( 'About Service Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Content', 'synck-core' ),
            ]
        );


        $this->add_control(
            'synckpagesaboutservice_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about-service6-area .section-header p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesaboutservice_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-service6-area .section-header p',
            ]
        );

        $this->add_responsive_control(
            'synckpagesaboutservice_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about-service6-area .section-header p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagesaboutservice_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about-service6-area .section-header p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab',
            [
               'label' => esc_html__( 'Description', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagesaboutservicedark2_description_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about-service3-area p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesaboutservicedark2_description_typography',
                'label'         => esc_html__( 'Description Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-service3-area p',
            ]
        );

        $this->add_responsive_control(
            'synckpagesaboutservicedark2_description_margin',
            [
                'label'         => __( 'Description Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about-service3-area p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagesaboutservicedark2_description_padding',
            [
                'label'         => __( 'Description Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about-service3-area p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'List Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagesaboutservice_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about-service6-area .content-box ul li'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesaboutservice_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-service6-area .content-box ul li',
            ]
        );

        $this->add_responsive_control(
            'synckpagesaboutservice_title_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about-service6-area .content-box ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagesaboutservice_title_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about-service6-area .content-box ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'section_icon_color',
            [
                'label'         => esc_html__( 'Icon Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} ul li i'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'section_iconbg_color',
            [
                'label'         => esc_html__( 'Icon BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  ul li i'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagesaboutbg_design_option',
            [
                'label'         => esc_html__( 'About Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .about-service3-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'section_bottom_color',
            [
                'label'         => esc_html__( 'Border Line Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about-service6-area .section-header'=> 'border-bottom: 1px solid {{VALUE}} !important;',
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

        $synckpagesaboutservicedark2_output = $this->get_settings_for_display(); ?>

<!-- About Service -->

<section class="about-service3-area about-service6-area">
<div class="custom-container">
<div class="custom-row align-items-center">
    <div class="content-box">
        <div class="section-header">
            <?php echo ($synckpagesaboutservicedark2_output['title_heading']); ?>
            <p><?php echo esc_html__($synckpagesaboutservicedark2_output['content']); ?></p>
        </div>
        <div class="content-body">
            <?php echo ($synckpagesaboutservicedark2_output['description']); ?>
            <ul>
                <?php if(!empty($synckpagesaboutservicedark2_output['list1'])):
                foreach ($synckpagesaboutservicedark2_output['list1'] as $synckpagesaboutservicedark2_loop):?>
                <li>
                <i class="<?php echo esc_attr($synckpagesaboutservicedark2_loop['check_icon']);?>"></i> <?php echo esc_html($synckpagesaboutservicedark2_loop['check_list']); ?>
                </li>
                <?php endforeach; endif;?>
            </ul>
        </div>
    </div>
    
    <div class="img-box">
        <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesaboutservicedark2_output['abt_serv_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesaboutservicedark2_output['abt_serv_img']['id'], '_wp_attachment_image_alt', true); ?>" />
    </div>
</div>
</div>
</section>

    <?php }
}

