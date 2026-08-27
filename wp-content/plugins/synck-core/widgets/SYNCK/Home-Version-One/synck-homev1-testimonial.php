<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev1testimonial Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev1testimonial_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev1testimonial';
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
        return esc_html__( 'Home V1 Testimonial', 'synck-core' );
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
                'label' => esc_html__( 'Testimonial Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1_1'
        );

        $this->start_controls_tab(
            'style_normal_tab_1_1',
            [
               'label' => esc_html__( 'Testimonial Lists', 'synck-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'content', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'name', [
                'label'         => esc_html__( 'Author Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'desgination', [
                'label'         => esc_html__( 'Author Desgination', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'testimonial_auth_img',
            [
                'label'     => esc_html__( 'Author Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'testimonial_icon_img',
            [
                'label'     => esc_html__( 'Testimonial Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'testimonial_bg_img',
            [
                'label'     => esc_html__( 'Testimonial Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'bgimg_animation', [
                'label'         => esc_html__( 'Background Image Animation Class', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Testimonial List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ name }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_1_2',
            [
               'label' => esc_html__( 'Icons Section', 'synck-core' ),
            ]
        );

        $this->add_control(
            'prev_icon', [
                'label'         => esc_html__( 'Previous Icon', 'synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'next_icon', [
                'label'         => esc_html__( 'Next Icon', 'synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*-----------------------------------------Home section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1testimonial_design_option',
            [
                'label'         => esc_html__( 'Testimonial Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
               'label' => esc_html__( 'Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'testimonial_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .testimonial-item h2'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'testimonial_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .testimonial-item h2',
            ]
        );

        $this->add_responsive_control(
            'testimonial_title_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_title_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'testimonial_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .testimonial-item p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'testimonial_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .testimonial-item p',
            ]
        );

        $this->add_responsive_control(
            'testimonial_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->start_controls_tabs(
        'style_tabs_2'
        );


        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Author Name', 'synck-core' ),
            ]
        );

        $this->add_control(
            'testimonial_auth_name_color',
            [
                'label'         => esc_html__( 'Author Name Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .testimonial-item .author-box h5'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'testimonial_auth_name_typography',
                'label'         => esc_html__( 'Author Name Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .testimonial-item .author-box h5',
            ]
        );

        $this->add_responsive_control(
            'testimonial_auth_name_margin',
            [
                'label'         => __( 'Author Name Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item .author-box h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_auth_name_padding',
            [
                'label'         => __( 'Author Name Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item .author-box h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Author Designation', 'synck-core' ),
            ]
        );

        $this->add_control(
            'testimonial_auth_desig_color',
            [
                'label'         => esc_html__( 'Author Desgination Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .testimonial-item .author-box p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'testimonial_auth_desig_typography',
                'label'         => esc_html__( 'Author Desgination Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .testimonial-item .author-box p',
            ]
        );

        $this->add_responsive_control(
            'testimonial_auth_desig_margin',
            [
                'label'         => __( 'Author Desgination Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item .author-box p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_auth_desig_padding',
            [
                'label'         => __( 'Author Desgination Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item .author-box p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'synckhomev1testimonialbg_design_option',
            [
                'label'         => esc_html__( 'Testimonial Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .testimonial-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .testimonial-item'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab(); 

        $this->start_controls_tab(
            'style_normal_tab_05',
            [
               'label' => esc_html__( 'Button', 'synck-core' ),
            ]
        );

        $this->add_control(
            'sectionbtn_bg_color',
            [
                'label'         => esc_html__( 'Button Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .testimonial-slider-wrap .swiper-button-prev, .testimonial-slider-wrap .swiper-button-next'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncardbtn_bg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .testimonial-slider-wrap .swiper-button-prev, .testimonial-slider-wrap .swiper-button-next'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev1testimonial_output = $this->get_settings_for_display(); ?>


<!-- Testimonial Section -->
<section class="testimonial-area">
<div class="custom-container">

<div class="testimonial-slider-wrap">
    <div class="testimonial-slider swiper">
        
        <div class="swiper-wrapper">
            <?php if(!empty($synckhomev1testimonial_output['list1'])):
                foreach ($synckhomev1testimonial_output['list1'] as $synckhomev1testimonial_loop):?>

            <div class="swiper-slide testimonial-item">
                <div class="testimonial-item-body">
                    <img class="<?php echo esc_attr($synckhomev1testimonial_loop['bgimg_animation']);?> bg-shape" src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1testimonial_loop['testimonial_bg_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1testimonial_loop['testimonial_bg_img']['id'], '_wp_attachment_image_alt', true); ?>" />

   <?php if(!empty($synckhomev1testimonial_loop['testimonial_icon_img']['id'] )): ?>
                    <span class="platform-name">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1testimonial_loop['testimonial_icon_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1testimonial_loop['testimonial_icon_img']['id'], '_wp_attachment_image_alt', true); ?>" />
                    </span>
    <?php endif;?>
                    <h2><?php echo($synckhomev1testimonial_loop['title']); ?></h2>
                    <p><?php echo($synckhomev1testimonial_loop['content']); ?></p>
                    <div class="author-box d-flex align-items-center">
                        <?php if (!empty($synckhomev1testimonial_loop['testimonial_auth_img']['id'])) { ?>
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1testimonial_loop['testimonial_auth_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1testimonial_loop['testimonial_auth_img']['id'], '_wp_attachment_image_alt', true); ?>" />
                        <?php } ?>
                        <div class="author-box-content">
                            <h5><?php echo esc_html($synckhomev1testimonial_loop['name']); ?></h5>
                            <p><?php echo esc_html($synckhomev1testimonial_loop['desgination']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif;?>

        </div>
    
    </div>
    
    <!-- navigation buttons -->
    <div class="swiper-button-prev"><i class="<?php echo esc_attr($synckhomev1testimonial_output['prev_icon']);?>"></i></div>
    <div class="swiper-button-next"><i class="<?php echo esc_attr($synckhomev1testimonial_output['next_icon']);?>"></i></div>
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

