<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckpagescta Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckpagesctastyle1_Widget extends \Elementor\Widget_Base {

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
        return 'synckpagescta';
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
        return esc_html__( 'Pages CTA Style1 Section', 'synck-core' );
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
                'label' => esc_html__( 'CTA Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs1'
        );

        $this->start_controls_tab(
            'style_normal_tab1',
            [
               'label' => esc_html__( 'Image Section', 'synck-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // IMAGE
        $repeater->add_control(
            'cta_auth_img',
            [
                'label'     => esc_html__( 'Author Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'CTA Image List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ cta_auth_img }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'cta_bg_img',
            [
                'label'     => esc_html__( 'Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'bg_animation',
            [
                'label'         => esc_html__( 'Image Fade Animation Class','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Content & Button', 'synck-core' ),
            ]
        );

        // TEXT 
        $this->add_control(
            'cta_head', [
                'label'         => esc_html__( 'Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'cta_content', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'btn_name', [
                'label'         => esc_html__( 'Button Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'btn_link',
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

        $this->add_control(
            'section_class',
            [
                'label'         => esc_html__( 'Section Class','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*-----------------------------------------CTA2 section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagescta_design_option',
            [
                'label'         => esc_html__( 'CTA Section Style','synck-core' ),
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
            'synckpagescta_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .cta-body h3'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagescta_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}}  .cta-body h3',
            ]
        );

        $this->add_responsive_control(
            'synckpagescta_heading_margin',
            [
                'label'         => __( 'Heading Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}}  .cta-body h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagescta_heading_padding',
            [
                'label'         => __( 'Heading Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}}  .cta-body h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'synckpagescta_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}   .cta-body p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagescta_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}}  .cta-body p',
            ]
        );

        $this->add_responsive_control(
            'synckpagescta_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}}  .cta-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagescta_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}}  .cta-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Button', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagescta_button_color',
            [
                'label'         => esc_html__( 'Button Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .cta-body .theme-btn'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagescta_button_typography',
                'label'         => esc_html__( 'Button Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}}  .cta-body .theme-btn',
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
            'synckpagesctabg_design_option',
            [
                'label'         => esc_html__( 'CTA Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .cta-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .cta-body'=> 'background-color: {{VALUE}} !important;',
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

        $synckpagescta_output = $this->get_settings_for_display(); ?>

<!-- Our CTA -->
<section class="<?php echo esc_attr($synckpagescta_output['section_class']);?>">
<div class="custom-container">
<div class="cta-body text-center">
    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagescta_output['cta_bg_img']['id'], 'full' ));?>" alt="Shape" class="<?php echo esc_attr($synckpagescta_output['bg_animation']);?> bg-shape" alt="<?php echo get_post_meta($synckpagescta_output['cta_bg_img']['id'], '_wp_attachment_image_alt', true); ?>" />
    <div class="our-expert-team-box">
        <div class="our-expert-team-box-inner d-flex align-items-center">
            <div class="imgs d-flex align-items-center">
            <?php if(!empty($synckpagescta_output['list1'])):
            foreach ($synckpagescta_output['list1'] as $synckpagescta_loop):?>
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagescta_loop['cta_auth_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagescta_loop['cta_auth_img']['id'], '_wp_attachment_image_alt', true); ?>" />
                <?php endforeach; endif;?>
            </div>
        </div>
    </div>
    <h3><?php echo esc_html($synckpagescta_output['cta_head']); ?></h3>
    <p><?php echo esc_html($synckpagescta_output['cta_content']); ?></p>
    <a <?php if($synckpagescta_output['btn_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($synckpagescta_output['btn_link']['url']); ?>" class="theme-btn"><?php echo esc_html($synckpagescta_output['btn_name']); ?></a>

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

