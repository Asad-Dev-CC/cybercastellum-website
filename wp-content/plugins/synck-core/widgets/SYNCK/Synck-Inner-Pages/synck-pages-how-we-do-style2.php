<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckpageshowwedov2 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckpageshowwedostyle2_Widget extends \Elementor\Widget_Base {

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
        return 'synckpageshowwedov2';
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
        return esc_html__( 'Pages How We Do style2', 'synck-core' );
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
                'label' => esc_html__( 'How We Do section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start --1

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'timeline_number', [
                'label'         => esc_html__( 'TimeLine Number', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'timeline_heading', [
                'label'         => esc_html__( 'Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'timeline_content', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'timeline_heading_link',
            [
                'label'         => esc_html__( 'Heading Link', 'synck-core' ),
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

        $repeater->add_control(
            'timeline_icon_img',
            [
                'label'     => esc_html__( 'TimeLine Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'timeline_bg_img',
            [
                'label'     => esc_html__( 'TimeLine Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'About Timeline List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ timeline_number }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------HWD section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpageshowwedov2right_design_option',
            [
                'label'         => esc_html__( 'How We Do V2 section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_3'
        );

        $this->start_controls_tab(
            'style_normal_tab_1_1',
            [
               'label' => esc_html__( 'Number', 'synck-core' ),
            ]
        );

        $this->add_control(
            'aboutright_number_color',
            [
                'label'         => esc_html__( 'Number Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about-timeline .about-timeline-item .number'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'aboutright_number_typography',
                'label'         => esc_html__( 'Number Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-timeline .about-timeline-item .number',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2_2_2',
            [
               'label' => esc_html__( 'Heading', 'synck-core' ),
            ]
        );

        $this->add_control(
            'aboutright_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about-timeline-item-inner h4 a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'aboutright_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-timeline-item-inner h4 a',
            ]
        );

        $this->add_responsive_control(
            'aboutright_heading_margin',
            [
                'label'         => __( 'Heading Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about-timeline-item-inner h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'aboutright_heading_padding',
            [
                'label'         => __( 'Heading Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about-timeline-item-inner h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2_3',
            [
               'label' => esc_html__( 'Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'aboutright_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about-timeline .about-timeline-item p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'aboutright_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about-timeline .about-timeline-item p',
            ]
        );

        $this->add_responsive_control(
            'aboutright_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about-timeline .about-timeline-item p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'aboutright_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about-timeline .about-timeline-item p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'synckpageshwdbg_design_option',
            [
                'label'         => esc_html__( 'How We Do Background Style','synck-core' ),
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
                    '{{WRAPPER}}  .how-we-do-style-2'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .how-we-do-style-2 .about-timeline .about-timeline-item,.about-timeline .about-timeline-item .number'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'section_colbg_color',
            [
                'label'         => esc_html__( 'Card Hover BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about-timeline .about-timeline-item:hover'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncardicon_bg_color',
            [
                'label'         => esc_html__( 'Icon Box Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .how-we-do-style-2 .about-timeline .about-timeline-item .about-timeline-item-inner .icon-box'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncardiconhover_bg_color',
            [
                'label'         => esc_html__( 'Hover Icon Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .how-we-do-style-2 .about-timeline .about-timeline-item:hover .about-timeline-item-inner .icon-box'=> 'background: {{VALUE}} !important;',
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

        $synckpageshowwedov2_output = $this->get_settings_for_display(); ?>


<!-- About Section -->
<section class="about-area how-we-do-style-2">
<div class="custom-container">
<div class="about-timeline-body">
<div class="about-timeline">
    
    <?php if(!empty($synckpageshowwedov2_output['list1'])):
            foreach ($synckpageshowwedov2_output['list1'] as $synckpageshowwedov2_loop):?>
        <div class="about-timeline-item">
            <div class="about-timeline-item-inner">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpageshowwedov2_loop['timeline_bg_img']['id'], 'full' ));?>" class="line-shape" alt="<?php echo get_post_meta($synckpageshowwedov2_loop['timeline_bg_img']['id'], '_wp_attachment_image_alt', true); ?>" />

                <?php if(!empty($synckpageshowwedov2_loop['timeline_number'] )): ?>
                <span class="number"><?php echo esc_html($synckpageshowwedov2_loop['timeline_number']); ?>
                </span>
                <?php endif;?>
                <div class="icon-box">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpageshowwedov2_loop['timeline_icon_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpageshowwedov2_loop['timeline_icon_img']['id'], '_wp_attachment_image_alt', true); ?>" />
                </div>
                <div class="content">
                    <h4><a href="<?php echo esc_url($synckpageshowwedov2_loop['timeline_heading_link']['url']); ?>"><?php echo esc_html($synckpageshowwedov2_loop['timeline_heading']); ?></a></h4>
                    <p><?php echo($synckpageshowwedov2_loop['timeline_content']); ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; endif;?>

</div>
</div>
</div>
</section>


    <?php }
}

