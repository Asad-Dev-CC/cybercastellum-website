<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev2testimonial Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev2testimonial_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev2testimonial';
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
        return esc_html__( 'Home V2 Testimonial', 'synck-core' );
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
                'label' => esc_html__( 'Testimonial Header Section', 'synck-core' ),
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

        $this->end_controls_section();

        //Testimonial Cards Section--1

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Testimonial Top Cards Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start --1

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testimonial_card_heading', [
                'label'         => esc_html__( 'Card Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'testimonial_card_content', [
                'label'         => esc_html__( 'Card Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'testimonial_author_name', [
                'label'         => esc_html__( 'Author Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'testimonial_author_role', [
                'label'         => esc_html__( 'Author Role', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'testimonial_author_img',
            [
                'label'     => esc_html__( 'Author Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'testimonial_card_img',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'testimonial_bg_img',
            [
                'label'     => esc_html__( 'Card Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'animationclass_right', [
                'label'         => esc_html__( 'Background Image Animation Class', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Testimonial Cards List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{testimonial_author_name }}}', // Reapeter Title 
            ]
        );
         
        $this->end_controls_section();

        //Testimonial Cards Section--2

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Testimonial Bottom Cards Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start --2

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testimonial2_card_heading', [
                'label'         => esc_html__( 'Card Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'testimonial2_card_content', [
                'label'         => esc_html__( 'Card Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'testimonial2_author_name', [
                'label'         => esc_html__( 'Author Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'testimonial2_author_role', [
                'label'         => esc_html__( 'Author Role', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'testimonial2_author_img',
            [
                'label'     => esc_html__( 'Author Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'testimonial2_card_img',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'testimonial2_bg_img',
            [
                'label'     => esc_html__( 'Card Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'animationclass2_right', [
                'label'         => esc_html__( 'Background Image Animation Class', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Testimonial Cards List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{testimonial2_author_name }}}', // Reapeter Title 
            ]
        );
         
        $this->end_controls_section();

        //Testimonial Controls Section

        $this->start_controls_section(
            'section4',
            [
                'label' => esc_html__( 'Testimonial Controls Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'testimonialtop_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Top Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'testimonialbottom_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Bottom Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Testimonial Header section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2testimonialheader_design_option',
            [
                'label'         => esc_html__( 'Testimonial Header Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
        );


        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Header Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_testimonial_header_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .section-header p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_testimonial_header_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .section-header p',
            ]
        );

        $this->add_responsive_control(
            'homev2_testimonial_header_content_margin',
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
            'homev2_testimonial_header_content_padding',
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

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*-----------------------------------------Testimonial Cards section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2testimonialcards_design_option',
            [
                'label'         => esc_html__( 'Testimonial Cards Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Heading', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_testimonial_card_heading_color',
            [
                'label'         => esc_html__( 'Card Heading Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .testimonial-item h2'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_testimonial_card_heading_typography',
                'label'         => esc_html__( 'Card Heading Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .testimonial-item h2',
            ]
        );

        $this->add_responsive_control(
            'homev2_testimonial_card_heading_margin',
            [
                'label'         => __( 'Card Heading Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_testimonial_card_heading_padding',
            [
                'label'         => __( 'Card Heading Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_testimonial_card_content_color',
            [
                'label'         => esc_html__( 'Card Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .testimonial-item p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_testimonial_card_content_typography',
                'label'         => esc_html__( 'Card Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .testimonial-item p',
            ]
        );

        $this->add_responsive_control(
            'homev2_testimonial_card_content_margin',
            [
                'label'         => __( 'Card Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_testimonial_card_content_padding',
            [
                'label'         => __( 'Card Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Author', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_testimonial_auth_name_color',
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
                'name'          => 'homev2_testimonial_auth_name_typography',
                'label'         => esc_html__( 'Author Name Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .testimonial-item .author-box h5',
            ]
        );

        $this->add_responsive_control(
            'homev2_testimonial_auth_name_margin',
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
            'homev2_testimonial_auth_name_padding',
            [
                'label'         => __( 'Author Name Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item .author-box h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_5',
            [
               'label' => esc_html__( 'Role', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_testimonial_auth_role_color',
            [
                'label'         => esc_html__( 'Author Role Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .testimonial-item.testimonial2-card .author-box p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_testimonial_auth_role_typography',
                'label'         => esc_html__( 'Author Role Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .testimonial-item.testimonial2-card .author-box p',
            ]
        );

        $this->add_responsive_control(
            'homev2_testimonial_auth_role_margin',
            [
                'label'         => __( 'Author Role Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item.testimonial2-card .author-box p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_testimonial_auth_role_padding',
            [
                'label'         => __( 'Author Role Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .testimonial-item.testimonial2-card .author-box p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2testimonialbg_design_option',
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
                    '{{WRAPPER}}  .testimonial2-area'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev2testimonial_output = $this->get_settings_for_display(); ?>


<!-- Home V2 Testimonials Section -->
<section class="testimonial2-area">
<div class="custom-container">
<div class="section-header text-center">
<?php echo ($synckhomev2testimonial_output['header_title_heading']); ?>
<p><?php echo ($synckhomev2testimonial_output['header_content']); ?></p>
</div>
</div>

<div class="testimonial2-lists d-flex gap-24">

<?php if(!empty($synckhomev2testimonial_output['list1'])):
foreach ($synckhomev2testimonial_output['list1'] as $synckhomev2testimonial_loop):?>

<?php if ( $synckhomev2testimonial_output['testimonialtop_switcher_options'] === 'yes' ) : ?>
<div class="testimonial-item testimonial2-card">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2testimonial_loop['testimonial_bg_img']['id'], 'full' ));?>" class="<?php echo esc_attr($synckhomev2testimonial_loop['animationclass_right']);?> bg-shape" alt="<?php echo get_post_meta($synckhomev2testimonial_loop['testimonial_bg_img']['id'], '_wp_attachment_image_alt', true); ?>" />

<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2testimonial_loop['testimonial_card_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2testimonial_loop['testimonial_card_img']['id'], '_wp_attachment_image_alt', true); ?>" />
<h2><?php echo esc_html($synckhomev2testimonial_loop['testimonial_card_heading']); ?></h2>
<p><?php echo ($synckhomev2testimonial_loop['testimonial_card_content']); ?></p>
<div class="author-box d-flex align-items-center">
<?php if (!empty($synckhomev2testimonial_loop['testimonial_author_img']['id'])) { ?>
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2testimonial_loop['testimonial_author_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2testimonial_loop['testimonial_author_img']['id'], '_wp_attachment_image_alt', true); ?>" />
<?php } ?>
<div class="author-box-content">
<h5><?php echo esc_html($synckhomev2testimonial_loop['testimonial_author_name']); ?></h5>
<p><?php echo esc_html($synckhomev2testimonial_loop['testimonial_author_role']); ?></p>
</div>
</div>
</div>
<?php endif;?>

<?php endforeach; endif;?>

<!-- <div class="testimonial-item testimonial2-card" style="min-width: 0px;background: transparent;padding: 0;"></div> -->
</div>

<div class="testimonial2-lists-two d-flex gap-24">
<?php if(!empty($synckhomev2testimonial_output['list2'])):
foreach ($synckhomev2testimonial_output['list2'] as $synckhomev2testimonial_loop):?>

<?php if ( $synckhomev2testimonial_output['testimonialbottom_switcher_options'] === 'yes' ) : ?>
<div class="testimonial-item testimonial2-card">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2testimonial_loop['testimonial2_bg_img']['id'], 'full' ));?>" class="<?php echo esc_attr($synckhomev2testimonial_loop['animationclass2_right']);?> bg-shape" alt="<?php echo get_post_meta($synckhomev2testimonial_loop['testimonial2_bg_img']['id'], '_wp_attachment_image_alt', true); ?>" />

<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2testimonial_loop['testimonial2_card_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2testimonial_loop['testimonial2_card_img']['id'], '_wp_attachment_image_alt', true); ?>" />
<h2><?php echo esc_html($synckhomev2testimonial_loop['testimonial2_card_heading']); ?></h2>
<p><?php echo ($synckhomev2testimonial_loop['testimonial2_card_content']); ?></p>
<div class="author-box d-flex align-items-center">
<?php if (!empty($synckhomev2testimonial_loop['testimonial2_author_img']['id'])) { ?>
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2testimonial_loop['testimonial2_author_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2testimonial_loop['testimonial2_author_img']['id'], '_wp_attachment_image_alt', true); ?>" />
<?php } ?>
<div class="author-box-content">
<h5><?php echo esc_html($synckhomev2testimonial_loop['testimonial2_author_name']); ?></h5>
<p><?php echo esc_html($synckhomev2testimonial_loop['testimonial2_author_role']); ?></p>
</div>
</div>
</div>
<?php endif;?>

<?php endforeach; endif;?>

<!-- <div class="testimonial-item testimonial2-card client-logo" style="min-width: 0px;background: transparent;padding: 0;"></div> -->
</div>
</section>


<!-- <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>  -->

<?php }
}

