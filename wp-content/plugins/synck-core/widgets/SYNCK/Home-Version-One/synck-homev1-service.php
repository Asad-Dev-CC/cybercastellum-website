<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev1service Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev1service_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev1service';
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
        return esc_html__( 'Home V1 Service Section', 'synck-core' );
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
                'label' => esc_html__( 'Service Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // TEXT 
        $this->add_control(
            'description', [
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

        // IMAGE
        $repeater->add_control(
            'card_img',
            [
                'label'     => esc_html__( 'Service Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'card_title', [
                'label'         => esc_html__( 'Service Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'card_content', [
                'label'         => esc_html__( 'Service Card Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'card_link',
            [
                'label'         => esc_html__( 'Card Link', 'synck-core' ),
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
            'card_badge', [
                'label'         => esc_html__( 'Service Card Badge', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Review Icon List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ card_title }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Service section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1service_design_option',
            [
                'label'         => esc_html__( 'Service Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs'
        );


        $this->start_controls_tab(
            'style_normal_tab',
            [
               'label' => esc_html__( 'Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'service_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .section-header p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'service_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .section-header p',
            ]
        );

        $this->add_responsive_control(
            'service_content_margin',
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
            'service_content_padding',
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
               'label' => esc_html__( 'Card Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'service_card_title_color',
            [
                'label'         => esc_html__( 'Card Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .service-card h4 a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'service_card_title_typography',
                'label'         => esc_html__( 'Card Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .service-card h4 a',
            ]
        );

        $this->add_responsive_control(
            'service_card_title_margin',
            [
                'label'         => __( 'Card Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service-card h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'service_card_title_padding',
            [
                'label'         => __( 'Card Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service-card h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Card Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'service_card_content_color',
            [
                'label'         => esc_html__( 'Card Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .service-card p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'service_card_content_typography',
                'label'         => esc_html__( 'Card Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .service-card p',
            ]
        );

        $this->add_responsive_control(
            'service_card_content_margin',
            [
                'label'         => __( 'Card Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'service_card_content_padding',
            [
                'label'         => __( 'Card Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .service-card p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'synckhomev1herobg_design_option',
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
                    '{{WRAPPER}}  .service-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .service-area .service-card'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev1service_output = $this->get_settings_for_display(); ?>


<!-- Service Area -->
<section class="service-area">
<div class="custom-container">
    <div class="service-section-header section-header d-flex align-items-end justify-content-between">
        <div class="left">
            <?php echo($synckhomev1service_output['description']); ?>
        </div>
        <p><?php echo esc_html($synckhomev1service_output['content']); ?></p>
    </div>

    <div class="services-list ">
        <?php if(!empty($synckhomev1service_output['list1'])):
                foreach ($synckhomev1service_output['list1'] as $synckhomev1service_loop):?>
        <div class="service-card simple-shadow">

            <?php if(!empty($synckhomev1service_loop['card_badge'] )): ?>
            <span class="service-badge"><?php echo esc_attr($synckhomev1service_loop['card_badge']); ?></span>
            <?php endif;?>

            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1service_loop['card_img']['id'], 'full' ));?>"  class="service-icon" alt="<?php echo get_post_meta($synckhomev1service_loop['card_img']['id'], '_wp_attachment_image_alt', true); ?>" />
            <h4><a <?php if($synckhomev1service_loop['card_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckhomev1service_loop['card_link']['url']); ?>"><?php echo esc_html($synckhomev1service_loop['card_title']); ?></a></h4>
            <p><?php echo esc_html($synckhomev1service_loop['card_content']); ?></p>
        </div>
        <?php endforeach; endif;?>
    </div>

</div>
</section>
</section>


<!-- <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>  -->

    <?php }
}

