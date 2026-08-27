<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev2contact Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev2contact_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev2contact';
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
        return esc_html__( 'Home V2 Contact Map', 'synck-core' );
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
                'label' => esc_html__( 'Contact Header Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // TEXT 
        $this->add_control(
            'header_title_heading', [
                'label'         => esc_html__( 'Heading & Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'header_content', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        //END

        $this->end_controls_section();

        //Contact Map Section

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Contact Map Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

        // $this->start_controls_tabs(
        // 'style_tabs2'
        // );

        // $this->start_controls_tab(
        //     'style_normal_tab3',
        //     [
        //        'label' => esc_html__( 'Social Icons Box', 'synck-core' ),
        //     ]
        // );

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
            'list3', //repeater name
            [
                'label'     => esc_html__( 'Conatct Map Loaction List', 'synck-core' ),
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

        $this->add_control(
            'contactmap_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Map Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        //END

        // $this->end_controls_tab();

        // $this->end_controls_tabs();

        $this->end_controls_section();

        //Contact Info Section

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Contact Info Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs1'
        );

        $this->start_controls_tab(
            'style_normal_tab1',
            [
               'label' => esc_html__( 'Info Box 1', 'synck-core' ),
            ]
        );

        $this->add_control(
            'contact_info1_img',
            [
                'label'     => esc_html__( 'Info Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'contact_info1_title_list', [
                'label'         => esc_html__( 'Info Title & Lists', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'contactinfo1_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Info Box1 Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );
       
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Info Box 2', 'synck-core' ),
            ]
        );

        $this->add_control(
            'contact_info2_img',
            [
                'label'     => esc_html__( 'Info Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'contact_info2_title', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'contact_info2_content', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'contactinfo2_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Info Box2 Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );
    
        //END

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Contact Experience Section

        $this->start_controls_section(
            'section4',
            [
                'label' => esc_html__( 'Contact Icons & Experience Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs2'
        );

        $this->start_controls_tab(
            'style_normal_tab3',
            [
               'label' => esc_html__( 'Social Icons Box', 'synck-core' ),
            ]
        );

        // Repeater Start --1

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'contact_socicon_title', [
                'label'         => esc_html__( 'Icon Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // TEXT 
        $repeater->add_control( //this line only for repeater 
            'contact_socicon_class_name',
            [
                'label'         => esc_html__( 'Icon Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'contact_socicon_link',
            [
                'label'         => esc_html__( 'Icon Link', 'synck-core' ),
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
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Social Icons List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ contact_socicon_title }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'contactsocicon_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Icons Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );
       
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab4',
            [
               'label' => esc_html__( 'Experience Box', 'synck-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'contact_exp_heading', [
                'label'         => esc_html__( 'Experience Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // TEXT 
        $repeater->add_control( //this line only for repeater 
            'contact_exp_title',
            [
                'label'         => esc_html__( 'Experience Title','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Social Icons List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ contact_exp_title }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'contactexperience_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Experience Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        //END

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*-----------------------------------------Contact Header & Map section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2contactheader_design_option',
            [
                'label'         => esc_html__( 'Contact Header & Map Section Style','synck-core' ),
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
                    '{{WRAPPER}} .contact2-area .section-header p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_header_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact2-area .section-header p',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_header_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact2-area .section-header p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .contact2-area .section-header p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        /*-----------------------------------------Contact Info & Icon section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2contactinfo_design_option',
            [
                'label'         => esc_html__( 'Contact Info & Icon Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Info Box 2 Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_info_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact2-info-box.contact2-visit-our-office h3'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_info_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact2-info-box.contact2-visit-our-office h3',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_info_title_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact2-info-box.contact2-visit-our-office h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .contact2-info-box.contact2-visit-our-office h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_5',
            [
               'label' => esc_html__( 'Info Box 2 Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_info_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact2-info-box.contact2-visit-our-office p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_info_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact2-info-box.contact2-visit-our-office p',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_info_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact2-info-box.contact2-visit-our-office p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_info_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact2-info-box.contact2-visit-our-office p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_6',
            [
               'label' => esc_html__( 'Icon Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_icon_title_color',
            [
                'label'         => esc_html__( 'Icon Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact2-info-box.contact2-social-links ul li a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_icon_title_typography',
                'label'         => esc_html__( 'Icon Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact2-info-box.contact2-social-links ul li a',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_icon_title_margin',
            [
                'label'         => __( 'Icon Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact2-info-box.contact2-social-links ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_icon_title_padding',
            [
                'label'         => __( 'Icon Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact2-info-box.contact2-social-links ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------Contact Experience section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2contactexp_design_option',
            [
                'label'         => esc_html__( 'Contact Experience Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_3'
        );

        $this->start_controls_tab(
            'style_normal_tab_7',
            [
               'label' => esc_html__( 'Heading', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_exp_heading_color',
            [
                'label'         => esc_html__( 'Heading Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact2-info-box.contact2-experience .contact2-experience-list h2'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_exp_heading_typography',
                'label'         => esc_html__( 'Heading Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact2-info-box.contact2-experience .contact2-experience-list h2',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_exp_heading_margin',
            [
                'label'         => __( 'Heading Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact2-info-box.contact2-experience .contact2-experience-list h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_exp_heading_padding',
            [
                'label'         => __( 'Heading Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact2-info-box.contact2-experience .contact2-experience-list h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_8',
            [
               'label' => esc_html__( 'Span', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_exp_span_color',
            [
                'label'         => esc_html__( 'Span Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact2-info-box.contact2-experience .contact2-experience-list h2 span'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_exp_span_typography',
                'label'         => esc_html__( 'Span Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact2-info-box.contact2-experience .contact2-experience-list h2 span',
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_9',
            [
               'label' => esc_html__( 'Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_contact_exp_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact2-info-box.contact2-experience .contact2-experience-list p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_contact_exp_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .contact2-info-box.contact2-experience .contact2-experience-list p',
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_exp_title_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact2-info-box.contact2-experience .contact2-experience-list p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_contact_exp_title_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact2-info-box.contact2-experience .contact2-experience-list p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2contactbg_design_option',
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
                    '{{WRAPPER}}  .contact2-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact2-body'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioninfo_bg_color',
            [
                'label'         => esc_html__( 'Info Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .contact2-area .contact-map-wrap,.contact2-infos'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev2contact_output = $this->get_settings_for_display(); ?>


<!-- Home V2 Contacts Section -->

<section class="contact2-area">
<div class="custom-container">
<div class="section-header d-flex align-items-center justify-content-between">
<div class="left">
<?php echo ($synckhomev2contact_output['header_title_heading']); ?>
</div>
<p><?php echo esc_html($synckhomev2contact_output['header_content']); ?></p>
</div>
<div class="contact2-body">

<?php if ( $synckhomev2contact_output['contactmap_switcher_options'] === 'yes' ) : ?>
<div class="contact-map-wrap">

<div class="mac-btns-wrap d-flex align-items-center justify-content-between">
<div class="mac-buttons d-flex align-items-center">
<span></span>
<span></span>
<span></span>
</div>

<div class="action-btn d-flex align-items-center">
<span></span>
<span></span>
<span></span>
</div>
</div>

<div id="map">
<?php if(!empty($synckhomev2contact_output['list3'])):
    foreach ($synckhomev2contact_output['list3'] as $synckhomev2contact_loop):?>
<div class="map-location-item" style="<?php echo esc_attr($synckhomev2contact_loop['contact_mapstyle_place']); ?>">
<div class="map-location-item-inner">
    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2contact_loop['contact_flag_img']['id'], 'full' ));?>" alt="Flag" alt="<?php echo get_post_meta($synckhomev2contact_loop['contact_flag_img']['id'], '_wp_attachment_image_alt', true); ?>" />
    <div class="content">
        <h4><?php echo esc_html($synckhomev2contact_loop['contact_map_location']); ?></h4>
        <p><?php echo ($synckhomev2contact_loop['contact_map_address']); ?></p>
    </div>
</div>
<span class="circle"></span>
</div>
<?php endforeach; endif;?>

<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2contact_output['contact_map_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2contact_output['contact_map_img']['id'], '_wp_attachment_image_alt', true); ?>" />

</div>
</div>
<?php endif;?>

<div class="contact2-infos d-flex">
<?php if ( $synckhomev2contact_output['contactinfo1_switcher_options'] === 'yes' ) : ?>
<div class="contact2-info-box">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2contact_output['contact_info1_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2contact_output['contact_info1_img']['id'], '_wp_attachment_image_alt', true); ?>" />
<?php echo ($synckhomev2contact_output['contact_info1_title_list']); ?>
</div>
<?php endif;?>

<?php if ( $synckhomev2contact_output['contactinfo2_switcher_options'] === 'yes' ) : ?>
<div class="contact2-info-box contact2-visit-our-office">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2contact_output['contact_info2_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2contact_output['contact_info2_img']['id'], '_wp_attachment_image_alt', true); ?>" />
<h3><?php echo esc_html($synckhomev2contact_output['contact_info2_title']); ?></h3>
<p class="address">
<?php echo esc_html($synckhomev2contact_output['contact_info2_content']); ?>
</p>
</div>
<?php endif;?>

<?php if ( $synckhomev2contact_output['contactsocicon_switcher_options'] === 'yes' ) : ?>
<div class="contact2-info-box contact2-social-links">
<ul>
<?php if(!empty($synckhomev2contact_output['list1'])):
    foreach ($synckhomev2contact_output['list1'] as $synckhomev2contact_loop):?>
<li>
    <a <?php if($synckhomev2contact_loop['contact_socicon_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($synckhomev2contact_loop['contact_socicon_link']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2contact_loop['contact_socicon_class_name']);?>"></i><?php echo esc_html($synckhomev2contact_loop['contact_socicon_title']); ?></a>
</li>
<?php endforeach; endif;?>
</ul>
</div>
<?php endif;?>

<?php if ( $synckhomev2contact_output['contactexperience_switcher_options'] === 'yes' ) : ?>
<div class="contact2-info-box contact2-experience">
<?php if(!empty($synckhomev2contact_output['list2'])):
    foreach ($synckhomev2contact_output['list2'] as $synckhomev2contact_loop):?>
<div class="contact2-experience-list">
<h2><?php echo ($synckhomev2contact_loop['contact_exp_heading']); ?></h2>
<p><?php echo esc_html($synckhomev2contact_loop['contact_exp_title']); ?></p>
</div>
<?php endforeach; endif;?>
</div>
<?php endif;?>

</div>
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

