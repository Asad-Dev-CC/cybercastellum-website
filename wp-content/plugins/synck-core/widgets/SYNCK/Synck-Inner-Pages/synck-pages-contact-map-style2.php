<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckpagescontactmapstyle2 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckpagescontactmapstyle2_Widget extends \Elementor\Widget_Base {

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
        return 'synckpagescontactmapstyle2';
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
        return esc_html__( 'Pages Contact Map Style2', 'synck-core' );
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

        //Contact Map Section

        $this->start_controls_section(
            'section1',
            [
                'label' => esc_html__( 'Contact Map Section', 'synck-core' ),
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
            'contact_map_title', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

          // Repeater Start --1

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'contact_flag_img',
            [
                'label'     => esc_html__( 'Flag Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'contact_map_location', [
                'label'         => esc_html__( 'Location', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'contact_map_address', [
                'label'         => esc_html__( 'Address', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );
        
        $repeater->add_control(
            'contact_mapstyle_place', [
                'label'         => esc_html__( 'Circle Icon Position', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Contact Map Location List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ contact_map_location }}}', // Reapeter Title 
            ]
        );

        //END

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Map Image', 'synck-core' ),
            ]
        );

        $this->add_control(
            'contact_map_img',
            [
                'label'     => esc_html__( 'Map Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'map_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Map Info', 'synck-core' ),
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

        //Contact Info Section

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Contact Info Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start --1

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'contact_info_title', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'contact_info_description', [
                'label'         => esc_html__( 'Description', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // TEXT 
        $repeater->add_control( //this line only for repeater 
            'contact_info_icon_class',
            [
                'label'         => esc_html__( 'Icon Class Name','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Line Awesome-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://icons8.com/line-awesome/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'contact_info_link_title', [
                'label'         => esc_html__( 'Link Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'contact_info_link',
            [
                'label'         => esc_html__( 'Link', 'synck-core' ),
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
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Contact Info List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ contact_info_title }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'info_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Social Info', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Contact Header & Map section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagescontactmapstyle2header_design_option',
            [
                'label'         => esc_html__( 'Contact Map Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
        );

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_title_content_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-map-wrap h5'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_title_content_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact-map-wrap h5',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_header_title_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-map-wrap h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_header_title_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-map-wrap h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hometitle_color',
            [
                'label'         => esc_html__( 'Title Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-map-wrap h5'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Location', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_location_title_color',
            [
                'label'         => esc_html__( 'Map Location Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .map-location-item .map-location-item-inner h4'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_location_title_typography',
                'label'         => esc_html__( 'Map Location Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .map-location-item .map-location-item-inner h4',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_location_title_margin',
            [
                'label'         => __( 'Map Location Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .map-location-item .map-location-item-inner h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_location_title_padding',
            [
                'label'         => __( 'Map Location Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .map-location-item .map-location-item-inner h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Address', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_address_color',
            [
                'label'         => esc_html__( 'Map Address Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .map-location-item .map-location-item-inner p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_address_typography',
                'label'         => esc_html__( 'Map Address Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .map-location-item .map-location-item-inner p',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_address_margin',
            [
                'label'         => __( 'Map Address Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .map-location-item .map-location-item-inner p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_address_padding',
            [
                'label'         => __( 'Map Address Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .map-location-item .map-location-item-inner p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------Contact Info  section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagescontactmapstyle2info_design_option',
            [
                'label'         => esc_html__( 'Contact Info Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_info_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-info-box h5'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_info_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact-info-box h5',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_info_title_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-info-box h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_info_title_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-info-box h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_5',
            [
               'label' => esc_html__( 'Description', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_info_description_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact-info-box p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_info_description_typography',
                'label'         => esc_html__( 'Description Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact-info-box p',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_info_description_margin',
            [
                'label'         => __( 'Description Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-info-box p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_info_description_padding',
            [
                'label'         => __( 'Description Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-info-box p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_6',
            [
               'label' => esc_html__( 'Link Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_link_title_color',
            [
                'label'         => esc_html__( 'Link Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact-info-box h7 a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_link_title_typography',
                'label'         => esc_html__( 'Link Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact-info-box h7 a',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_link_title_margin',
            [
                'label'         => __( 'Link Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-info-box h7 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_link_title_padding',
            [
                'label'         => __( 'Link Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-info-box h7 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagescontactbg_design_option',
            [
                'label'         => esc_html__( 'Contact Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .contact-area2'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact-map-wrap,.contact-info-box'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'section_colbg_color',
            [
                'label'         => esc_html__( 'Icon BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-info-box .icon'=> 'background: {{VALUE}} !important;',
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

        $synckpagescontactmapstyle2_output = $this->get_settings_for_display(); ?>


<!-- Contact -->
<section class="contact-area2">
<div class="custom-container">
<div class="contact-inner">
<?php if ( $synckpagescontactmapstyle2_output['map_switcher_options'] === 'yes' ) : ?>
<div class="contact-map-wrap">
<?php if(!empty($synckpagescontactmapstyle2_output['contact_map_title'] )): ?>
    <h5><?php echo esc_html($synckpagescontactmapstyle2_output['contact_map_title']); ?></h5>
<?php endif;?>

    <div id="map">
<?php if(!empty($synckpagescontactmapstyle2_output['list1'])):
    foreach ($synckpagescontactmapstyle2_output['list1'] as $synckpagescontactmapstyle2_loop):?>
      <div class="map-location-item" style="<?php echo esc_attr($synckpagescontactmapstyle2_loop['contact_mapstyle_place']); ?>">
            <div class="map-location-item-inner">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagescontactmapstyle2_loop['contact_flag_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagescontactmapstyle2_loop['contact_flag_img']['id'], '_wp_attachment_image_alt', true); ?>" />
                <div class="content">
                    <h4><?php echo esc_html($synckpagescontactmapstyle2_loop['contact_map_location']); ?></h4>
                    <p><?php echo ($synckpagescontactmapstyle2_loop['contact_map_address']); ?></p>
                </div>
            </div>
            <span class="circle"></span>
        </div>
        <?php endforeach; endif;?>
        <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagescontactmapstyle2_output['contact_map_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagescontactmapstyle2_output['contact_map_img']['id'], '_wp_attachment_image_alt', true); ?>" />
    </div>
</div>
<?php endif;?>

<?php if ( $synckpagescontactmapstyle2_output['info_switcher_options'] === 'yes' ) : ?>
<div class="contact-inner-info-box d-flex align-items-center">
<?php if(!empty($synckpagescontactmapstyle2_output['list2'])):
    foreach ($synckpagescontactmapstyle2_output['list2'] as $synckpagescontactmapstyle2_loop):?>
    <div class="contact-info-box simple-shadow">
        <div class="icon"><i class="<?php echo esc_attr($synckpagescontactmapstyle2_loop['contact_info_icon_class']);?>"></i></div>
        <h5><?php echo esc_html($synckpagescontactmapstyle2_loop['contact_info_title']); ?></h5>
        <p><?php echo ($synckpagescontactmapstyle2_loop['contact_info_description']); ?></p>
        <h7><a <?php if($synckpagescontactmapstyle2_loop['contact_info_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
        href="<?php echo esc_url($synckpagescontactmapstyle2_loop['contact_info_link']['url']); ?>"><?php echo esc_html($synckpagescontactmapstyle2_loop['contact_info_link_title']); ?></a></h7>
    </div>
    <?php endforeach; endif;?>
</div>
<?php endif;?>

</div>
</div>
</section>

    <?php }
}

