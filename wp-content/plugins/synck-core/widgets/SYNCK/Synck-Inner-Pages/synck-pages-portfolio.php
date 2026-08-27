<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckpagesportfolio Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckpagesportfolio_Widget extends \Elementor\Widget_Base {

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
        return 'synckpagesportfolio';
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
        return esc_html__( 'Pages Portfolio Section', 'synck-core' );
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
                'label' => esc_html__( 'Portfolio Row 1 Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start--1

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'port_col_class1', [
                'label'         => esc_html__( 'Colomn Class', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'port_heading1', [
                'label'         => esc_html__( 'Card Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // IMAGE
        $repeater->add_control(
            'port_item_img1',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'port_title1', [
                'label'         => esc_html__( 'Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'port_content1', [
                'label'         => esc_html__( 'Card Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'port_arrow_icon1', [
                'label'         => esc_html__( 'Card Arrow Icon Class', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'port_card_link1',
            [
                'label'         => esc_html__( 'Title & Heading Link', 'synck-core' ),
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
            'port_bg_img1',
            [
                'label'     => esc_html__( 'Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Portfolio Items List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ port_col_class1 }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'box1_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Row Info', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Portfolio Row 2 Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start--2

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'port_col_class2', [
                'label'         => esc_html__( 'Colomn Class', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'port_heading2', [
                'label'         => esc_html__( 'Card Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // IMAGE
        $repeater->add_control(
            'port_item_img2',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'port_title2', [
                'label'         => esc_html__( 'Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'port_content2', [
                'label'         => esc_html__( 'Card Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'port_arrow_icon2', [
                'label'         => esc_html__( 'Card Arrow Icon Class', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'port_card_link2',
            [
                'label'         => esc_html__( 'Title & Heading Link', 'synck-core' ),
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
            'port_bg_img2',
            [
                'label'     => esc_html__( 'Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Portfolio Items List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ port_col_class2 }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'box2_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Row Info', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Portfolio Row 3 Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start--3

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'port_col_class3', [
                'label'         => esc_html__( 'Colomn Class', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'port_heading3', [
                'label'         => esc_html__( 'Card Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // IMAGE
        $repeater->add_control(
            'port_item_img3',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'port_title3', [
                'label'         => esc_html__( 'Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'port_content3', [
                'label'         => esc_html__( 'Card Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'port_arrow_icon3', [
                'label'         => esc_html__( 'Card Arrow Icon Class', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'port_card_link3',
            [
                'label'         => esc_html__( 'Title & Heading Link', 'synck-core' ),
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
            'port_bg_img3',
            [
                'label'     => esc_html__( 'Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list3', //repeater name
            [
                'label'     => esc_html__( 'Portfolio Items List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ port_col_class3 }}}', // Reapeter Title 
            ]
        );

        $this->add_control(
            'box3_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Row Info', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Portfolio section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagesportfolio_design_option',
            [
                'label'         => esc_html__( 'Portfolio Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs'
        );


        $this->start_controls_tab(
            'style_normal_tab',
            [
               'label' => esc_html__( 'Card Heading', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagesportfolio_card_heading_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .project-item .project-item-inner h3 a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesportfolio_card_heading_typography',
                'label'         => esc_html__( 'Card Heading', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .project-item .project-item-inner h3 a',
            ]
        );

        $this->add_responsive_control(
            'synckpagesportfolio_card_heading_margin',
            [
                'label'         => __( 'Card Heading', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .project-item .project-item-inner h3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagesportfolio_card_heading_padding',
            [
                'label'         => __( 'Card Heading', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .project-item .project-item-inner h3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'synckpagesportfolio_card_title_color',
            [
                'label'         => esc_html__( 'Card Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .portfolio-sample-details h4 a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesportfolio_card_title_typography',
                'label'         => esc_html__( 'Card Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .portfolio-sample-details h4 a',
            ]
        );

        $this->add_responsive_control(
            'synckpagesportfolio_card_title_margin',
            [
                'label'         => __( 'Card Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-sample-details h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagesportfolio_card_title_padding',
            [
                'label'         => __( 'Card Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-sample-details h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'synckpagesportfolio_card_content_color',
            [
                'label'         => esc_html__( 'Card Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .portfolio-sample-details p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesportfolio_card_content_typography',
                'label'         => esc_html__( 'Card Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .portfolio-sample-details p',
            ]
        );

        $this->add_responsive_control(
            'synckpagesportfolio_card_content_margin',
            [
                'label'         => __( 'Card Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-sample-details p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagesportfolio_card_content_padding',
            [
                'label'         => __( 'Card Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .portfolio-sample-details p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'synckpagesportfoliobg_design_option',
            [
                'label'         => esc_html__( 'Portfolio Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .portfolio-area'=> 'background-color: {{VALUE}} !important;',
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

        $synckpagesportfolio_output = $this->get_settings_for_display(); ?>

<!-- Portfolio Items -->
<section class="portfolio-area">
<div class="custom-container">

<?php if ( $synckpagesportfolio_output['box1_switcher_options'] === 'yes' ) : ?>
<div class="portfolio-items">
    <?php if(!empty($synckpagesportfolio_output['list1'])):
        foreach ($synckpagesportfolio_output['list1'] as $synckpagesportfolio_loop):?>

    <div class="portfolio-item-col <?php echo esc_attr($synckpagesportfolio_loop['port_col_class1']);?>">

        <div class="project-item">
            <div class="project-item-inner">
                <h3 class="white"><a <?php if($synckpagesportfolio_loop['port_card_link1']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckpagesportfolio_loop['port_card_link1']['url']); ?>">
                    <?php echo($synckpagesportfolio_loop['port_heading1']); ?></a></h3>
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesportfolio_loop['port_item_img1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesportfolio_loop['port_item_img1']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>
        </div>

        <?php if(!empty($synckpagesportfolio_loop['port_title1'] )): ?>
        <div class="portfolio-sample-details">
            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesportfolio_loop['port_bg_img1']['id'], 'full' ));?>" class="bg-shape" alt="<?php echo get_post_meta($synckpagesportfolio_loop['port_bg_img1']['id'], '_wp_attachment_image_alt', true); ?>" />
            <h4>
                <a <?php if($synckpagesportfolio_loop['port_card_link1']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckpagesportfolio_loop['port_card_link1']['url']); ?>">
                    <?php echo($synckpagesportfolio_loop['port_title1']); ?>
                    <i class="<?php echo esc_attr($synckpagesportfolio_loop['port_arrow_icon1']);?>"></i>
                </a>
            </h4>
            <p><?php echo($synckpagesportfolio_loop['port_content1']); ?></p>
        </div>
        <?php endif;?>

    </div>
    <?php endforeach; endif;?>
</div>
<?php endif;?>

<?php if ( $synckpagesportfolio_output['box2_switcher_options'] === 'yes' ) : ?>
<div class="portfolio-items">
    <?php if(!empty($synckpagesportfolio_output['list2'])):
        foreach ($synckpagesportfolio_output['list2'] as $synckpagesportfolio_loop):?>

    <div class="portfolio-item-col <?php echo esc_attr($synckpagesportfolio_loop['port_col_class2']);?>">

        <?php if(!empty($synckpagesportfolio_loop['port_heading2'] )): ?>
        <div class="project-item">
            <div class="project-item-inner">
                <h3 class=""><a <?php if($synckpagesportfolio_loop['port_card_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckpagesportfolio_loop['port_card_link2']['url']); ?>">
                    <?php echo($synckpagesportfolio_loop['port_heading2']); ?></a></h3>
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesportfolio_loop['port_item_img2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesportfolio_loop['port_item_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>
        </div>
        <?php endif;?>

        <?php if(!empty($synckpagesportfolio_loop['port_title2'] )): ?>
        <div class="portfolio-sample-details">
            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesportfolio_loop['port_bg_img2']['id'], 'full' ));?>" class="bg-shape" alt="<?php echo get_post_meta($synckpagesportfolio_loop['port_bg_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
            <h4>
                <a <?php if($synckpagesportfolio_loop['port_card_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckpagesportfolio_loop['port_card_link2']['url']); ?>">
                    <?php echo($synckpagesportfolio_loop['port_title2']); ?>
                    <i class="<?php echo esc_attr($synckpagesportfolio_loop['port_arrow_icon2']);?>"></i>
                </a>
            </h4>
            <p><?php echo($synckpagesportfolio_loop['port_content2']); ?></p>
        </div>
        <?php endif;?>

    </div>
    <?php endforeach; endif;?>
</div>
<?php endif;?>

<?php if ( $synckpagesportfolio_output['box3_switcher_options'] === 'yes' ) : ?>
<div class="portfolio-items">
    <?php if(!empty($synckpagesportfolio_output['list3'])):
        foreach ($synckpagesportfolio_output['list3'] as $synckpagesportfolio_loop):?>

    <div class="portfolio-item-col <?php echo esc_attr($synckpagesportfolio_loop['port_col_class3']);?>">

        <?php if(!empty($synckpagesportfolio_loop['port_heading3'] )): ?>
        <div class="project-item">
            <div class="project-item-inner">
                <h3 class=""><a <?php if($synckpagesportfolio_loop['port_card_link3']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckpagesportfolio_loop['port_card_link3']['url']); ?>">
                    <?php echo($synckpagesportfolio_loop['port_heading3']); ?></a></h3>
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesportfolio_loop['port_item_img3']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesportfolio_loop['port_item_img3']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>
        </div>
        <?php endif;?>

        <?php if(!empty($synckpagesportfolio_loop['port_title3'] )): ?>
        <div class="portfolio-sample-details">
            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesportfolio_loop['port_bg_img3']['id'], 'full' ));?>" class="bg-shape" alt="<?php echo get_post_meta($synckpagesportfolio_loop['port_bg_img3']['id'], '_wp_attachment_image_alt', true); ?>" />
            <h4>
                <a <?php if($synckpagesportfolio_loop['port_card_link3']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckpagesportfolio_loop['port_card_link3']['url']); ?>">
                    <?php echo($synckpagesportfolio_loop['port_title3']); ?>
                    <i class="<?php echo esc_attr($synckpagesportfolio_loop['port_arrow_icon3']);?>"></i>
                </a>
            </h4>
            <p><?php echo($synckpagesportfolio_loop['port_content3']); ?></p>
        </div>
        <?php endif;?>

    </div>
    <?php endforeach; endif;?>
</div>
<?php endif;?>

</div>
</section>

    <?php }
}

