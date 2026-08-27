<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckpagescontactlocation Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckpagescontactlocation_Widget extends \Elementor\Widget_Base {

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
        return 'synckpagescontactlocation';
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
        return esc_html__( 'Pages Contact Location', 'synck-core' );
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

        //Contact Location Section

        $this->start_controls_section(
            'section1',
            [
                'label' => esc_html__( 'Contact Location Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs1'
        );

        $this->start_controls_tab(
            'style_normal_tab1',
            [
               'label' => esc_html__( 'Content & Image', 'synck-core' ),
            ]
        );

        $this->add_control(
            'title_heading', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'content', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'contact_bg_img',
            [
                'label'     => esc_html__( 'Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'bg_animation', [
                'label'         => esc_html__( 'Image Fade Animation Class', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        //END

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Location Card', 'synck-core' ),
            ]
        );

        // Repeater Start --1

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'contact_location_card_title', [
                'label'         => esc_html__( 'Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'contact_location_card_desc', [
                'label'         => esc_html__( 'Card Description', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'contact_location_card_number', [
                'label'         => esc_html__( 'Card number', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Contact Location Card List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ contact_location_card_number }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*-----------------------------------------Contact Header & Map section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagescontactlocationheader_design_option',
            [
                'label'         => esc_html__( 'Contact Location Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
        );

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_header_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-location-left-body p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_header_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact-location-left-body p',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_header_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-location-left-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_header_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-location-left-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'homev2_contact_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact-location-box .content h4'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact-location-box .content h4',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_title_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-location-box .content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_title_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-location-box .content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Description', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_description_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact-location-box .content p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_description_typography',
                'label'         => esc_html__( 'Description Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact-location-box .content p',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_description_margin',
            [
                'label'         => __( 'Description Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-location-box .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_description_padding',
            [
                'label'         => __( 'Description Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-location-box .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Number', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_number_color',
            [
                'label'         => esc_html__( 'Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact-location-box .number'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncardicon_bg_color',
            [
                'label'         => esc_html__( 'Number Box Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-location-box .number'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

         $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpageslocationbg_design_option',
            [
                'label'         => esc_html__( 'Location Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .contact-location-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-location-box'=> 'background-color: {{VALUE}} !important;',
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

        $synckpagescontactlocation_output = $this->get_settings_for_display(); ?>


<!-- Location -->
<section class="contact-location-area">
<img class="<?php echo esc_attr($synckpagescontactlocation_output['bg_animation']);?> bg-shape" src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagescontactlocation_output['contact_bg_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagescontactlocation_output['contact_bg_img']['id'], '_wp_attachment_image_alt', true); ?>" />
<div class="custom-container">
<div class="custom-row justify-content-between align-items-center">
    <div class="contact-location-left-content">
        <div class="contact-location-left-body">
            <?php echo ($synckpagescontactlocation_output['title_heading']); ?>
            <p><?php echo ($synckpagescontactlocation_output['content']); ?></p>
        </div>
    </div>

    <div class="right">
        <div class="contact-locations-list">
            <?php if(!empty($synckpagescontactlocation_output['list1'])):
                foreach ($synckpagescontactlocation_output['list1'] as $synckpagescontactlocation_loop):?>
            <div class="contact-location-box">
                <?php if(!empty($synckpagescontactlocation_loop['contact_location_card_number'] )): ?>
                <div class="number">
                   <?php echo esc_html($synckpagescontactlocation_loop['contact_location_card_number']); ?>
                </div>
                <?php endif;?>
                <div class="content">
                    <h4><?php echo esc_html($synckpagescontactlocation_loop['contact_location_card_title']); ?></h4>
                    <p><?php echo ($synckpagescontactlocation_loop['contact_location_card_desc']); ?></p>
                </div>
            </div>
            <?php endforeach; endif;?>

        </div>
    </div>
</div>
</div>
</section>

    <?php }
}

