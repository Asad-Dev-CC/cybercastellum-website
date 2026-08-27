<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev1howwedo Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev1howwedo_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev1howwedo';
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
        return esc_html__( 'Home V1 How We Do', 'synck-core' );
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
                'label' => esc_html__( 'How We Do Section', 'synck-core' ),
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

        // TEXT 
        $this->add_control(
            'title_content', [
                'label'         => esc_html__( 'Heading & Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hwd_content', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Button Section', 'synck-core' ),
            ]
        );

        $this->add_control(
            'btn_text', [
                'label'         => esc_html__( 'Button Text', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'btn_icon',
            [
                'label'         => esc_html__( 'Button Icon Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
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
            'bg_img',
            [
                'label'     => esc_html__( 'Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'animationclass',
            [
                'label'         => esc_html__( 'Image Animation Class','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();        

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( ' Brainstorming Card Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // IMAGE
        $this->add_control(
            'hwd_img1',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hwd_title1', [
                'label'         => esc_html__( 'Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hwd_subtitle1', [
                'label'         => esc_html__( 'Card Sub Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'hwd_titlelink1',
            [
                'label'         => esc_html__( 'Card Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
            ]
        );

        $this->add_control(
            'hwd_card1_switch',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Card Controls', 'synck-core' ),
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
                'label' => esc_html__( ' Product Card Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // IMAGE
        $this->add_control(
            'hwd_img2',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hwd_title2', [
                'label'         => esc_html__( 'Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hwd_subtitle2', [
                'label'         => esc_html__( 'Card Sub Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'hwd_titlelink2',
            [
                'label'         => esc_html__( 'Card Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
            ]
        );

        $this->add_control(
            'hwd_card2_switch',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Card Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section4',
            [
                'label' => esc_html__( ' Front-End Card Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // IMAGE
        $this->add_control(
            'hwd_img3',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hwd_title3', [
                'label'         => esc_html__( 'Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hwd_subtitle3', [
                'label'         => esc_html__( 'Card Sub Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'hwd_titlelink3',
            [
                'label'         => esc_html__( 'Card Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
            ]
        );

        $this->add_control(
            'hwd_card3_switch',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Card Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section5',
            [
                'label' => esc_html__( ' Seo Card Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // IMAGE
        $this->add_control(
            'hwd_img4',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hwd_title4', [
                'label'         => esc_html__( 'Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hwd_subtitle4', [
                'label'         => esc_html__( 'Card Sub Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'hwd_titlelink4',
            [
                'label'         => esc_html__( 'Card Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
            ]
        );

        $this->add_control(
            'hwd_card4_switch',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Card Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section6',
            [
                'label' => esc_html__( ' Back-End Card Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // IMAGE
        $this->add_control(
            'hwd_img5',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hwd_title5', [
                'label'         => esc_html__( 'Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hwd_subtitle5', [
                'label'         => esc_html__( 'Card Sub Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'hwd_titlelink5',
            [
                'label'         => esc_html__( 'Card Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
            ]
        );

        $this->add_control(
            'hwd_card5_switch',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Card Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section7',
            [
                'label' => esc_html__( ' Digital Card Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // IMAGE
        $this->add_control(
            'hwd_img6',
            [
                'label'     => esc_html__( 'Card Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hwd_title6', [
                'label'         => esc_html__( 'Card Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hwd_subtitle6', [
                'label'         => esc_html__( 'Card Sub Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );   

        // LINK
        $this->add_control(
            'hwd_titlelink6',
            [
                'label'         => esc_html__( 'Card Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
            ]
        );

        $this->add_control(
            'hwd_card6_switch',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Card Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );
     

        $this->end_controls_section();

        /*-----------------------------------------How-We-Do section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1howwedo_design_option',
            [
                'label'         => esc_html__( 'How We Do Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1_1'
        );


        $this->start_controls_tab(
            'style_normal_tab_1_1',
            [
               'label' => esc_html__( 'Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'howwedo_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .how-we-do-area .how-we-do-left-content .top p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'howwedo_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .how-we-do-area .how-we-do-left-content .top p',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_1_2',
            [
               'label' => esc_html__( 'Button', 'synck-core' ),
            ]
        );

        $this->add_control(
            'howwedo_button_color',
            [
                'label'         => esc_html__( 'Button Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .how-we-do-area .how-we-do-left-content .theme-btn'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'howwedo_button_typography',
                'label'         => esc_html__( 'Button Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .how-we-do-area .how-we-do-left-content .theme-btn',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        $this->start_controls_section(
            'synckhomev1howwedocards_design_option',
            [
                'label'         => esc_html__( 'How We Do Cards Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_2_2',
            [
               'label' => esc_html__( 'Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'howwedocards_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .how-we-do-card .how-we-do-content h5'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'howwedocards_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .how-we-do-card .how-we-do-content h5',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2_3',
            [
               'label' => esc_html__( 'Sub Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'howwedocards_subtitle_color',
            [
                'label'         => esc_html__( 'Sub Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .how-we-do-card .how-we-do-content p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'howwedocards_subtitle_typography',
                'label'         => esc_html__( 'Sub Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .how-we-do-card .how-we-do-content p',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1hwdbg_design_option',
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
                    '{{WRAPPER}}  .how-we-do-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectionrow_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .how-we-do-area .custom-container > .custom-row'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Cards Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .how-we-do-card'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncardicon_bg_color',
            [
                'label'         => esc_html__( 'Cards Icon Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .how-we-do-card .how-we-do-icon'=> 'background: {{VALUE}} !important;',
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

        $synckhomev1howwedo_output = $this->get_settings_for_display(); ?>

<!-- How We Do -->
<section class="how-we-do-area">
<div class="custom-container">
<div class="custom-row">
    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1howwedo_output['bg_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1howwedo_output['bg_img']['id'], '_wp_attachment_image_alt', true); ?>" class="<?php echo esc_attr($synckhomev1howwedo_output['animationclass']);?> how-we-do-bg" />
    <div class="how-we-do-left-content">
        <div class="top">
            <?php echo($synckhomev1howwedo_output['title_content']); ?>
            <p><?php echo($synckhomev1howwedo_output['hwd_content']); ?></p>
        </div>

        <?php if(!empty($synckhomev1howwedo_output['btn_text'] )): ?>
        <a 
        <?php if($synckhomev1howwedo_output['btn_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?> 
        href="<?php echo esc_url($synckhomev1howwedo_output['btn_link']['url']);?>" class="theme-btn">
        <?php echo esc_html($synckhomev1howwedo_output['btn_text']); ?>
        <i class="<?php echo esc_attr($synckhomev1howwedo_output['btn_icon']);?>"></i>
        </a>
        <?php endif;?>
    </div>
    <div class="how-we-do-right-content">
        <div class="how-we-do-items d-flex align-items-center justify-content-center">

<?php if ( $synckhomev1howwedo_output['hwd_card1_switch'] === 'yes' ) : ?>
            <div class="how-we-do-card">
                <div class="circle-shape"></div>
                <div class="line-shape"></div>

            <?php if(!empty($synckhomev1howwedo_output['hwd_img1'] )): ?>
                <div class="how-we-do-icon">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1howwedo_output['hwd_img1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1howwedo_output['hwd_img1']['id'], '_wp_attachment_image_alt', true); ?>" />
                </div>
                <?php endif;?>
          
                <div class="how-we-do-content">

                    <h5>
                        <a <?php if($synckhomev1howwedo_output['hwd_titlelink1']['is_external'] == true ): ?> target="_blank" <?php endif; ?> 
                        href="<?php echo esc_url($synckhomev1howwedo_output['hwd_titlelink1']['url']);?>">
                        <?php echo esc_html($synckhomev1howwedo_output['hwd_title1']); ?>
                        </a>
                    </h5>

                    <p><?php echo esc_html($synckhomev1howwedo_output['hwd_subtitle1']); ?></p>
                </div>
            </div>
            <?php endif;?>

<?php if($synckhomev1howwedo_output['hwd_card2_switch']=== 'yes') : ?>
            <div class="how-we-do-card">
                <div class="circle-shape"></div>
                <div class="line-shape"></div>

                <div class="how-we-do-icon">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1howwedo_output['hwd_img2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1howwedo_output['hwd_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
                </div>
                <div class="how-we-do-content">
                    <h5>
                        <a <?php if($synckhomev1howwedo_output['hwd_titlelink2']['is_external'] == true ): ?> target="_blank" <?php endif; ?> 
                        href="<?php echo esc_url($synckhomev1howwedo_output['hwd_titlelink2']['url']);?>">
                        <?php echo esc_html($synckhomev1howwedo_output['hwd_title2']); ?>
                        </a>
                    </h5>
                    <p><?php echo esc_html($synckhomev1howwedo_output['hwd_subtitle2']); ?></p>
                </div>
            </div>
            <?php endif;?>

<?php if($synckhomev1howwedo_output['hwd_card3_switch']=== 'yes') : ?>
            <div class="how-we-do-card">
                <div class="circle-shape"></div>
                <div class="line-shape"></div>

                <div class="how-we-do-icon">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1howwedo_output['hwd_img3']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1howwedo_output['hwd_img3']['id'], '_wp_attachment_image_alt', true); ?>" />
                </div>
                <div class="how-we-do-content">
                    <h5>
                        <a <?php if($synckhomev1howwedo_output['hwd_titlelink3']['is_external'] == true ): ?> target="_blank" <?php endif; ?> 
                        href="<?php echo esc_url($synckhomev1howwedo_output['hwd_titlelink3']['url']);?>">
                        <?php echo esc_html($synckhomev1howwedo_output['hwd_title3']); ?>
                        </a>
                    </h5>
                    <p><?php echo esc_html($synckhomev1howwedo_output['hwd_subtitle3']); ?></p>
                </div>
            </div>
            <?php endif;?>

        </div>

        <div class="how-we-do-items d-flex align-items-center justify-content-center">

            <?php if($synckhomev1howwedo_output['hwd_card4_switch']=== 'yes') : ?>
            <div class="how-we-do-card">
                <div class="circle-shape"></div>
                <div class="line-shape"></div>

                <div class="how-we-do-icon">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1howwedo_output['hwd_img4']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1howwedo_output['hwd_img4']['id'], '_wp_attachment_image_alt', true); ?>"  />
                </div>
                <div class="how-we-do-content">
                    <h5>
                        <a <?php if($synckhomev1howwedo_output['hwd_titlelink4']['is_external'] == true ): ?> target="_blank" <?php endif; ?> 
                        href="<?php echo esc_url($synckhomev1howwedo_output['hwd_titlelink4']['url']);?>">
                        <?php echo esc_html($synckhomev1howwedo_output['hwd_title4']); ?>
                        </a>
                    </h5>
                    <p><?php echo esc_html($synckhomev1howwedo_output['hwd_subtitle4']); ?></p>
                </div>
            </div>
            <?php endif;?>

<?php if($synckhomev1howwedo_output['hwd_card5_switch']=== 'yes') : ?>
            <div class="how-we-do-card">
                <div class="circle-shape"></div>
                <div class="line-shape"></div>

                <div class="how-we-do-icon">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1howwedo_output['hwd_img5']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1howwedo_output['hwd_img5']['id'], '_wp_attachment_image_alt', true); ?>" />
                </div>
                <div class="how-we-do-content">
                    <h5>
                        <a <?php if($synckhomev1howwedo_output['hwd_titlelink5']['is_external'] == true ): ?> target="_blank" <?php endif; ?> 
                        href="<?php echo esc_url($synckhomev1howwedo_output['hwd_titlelink5']['url']);?>">
                        <?php echo esc_html($synckhomev1howwedo_output['hwd_title5']); ?>
                        </a>
                    </h5>
                    <p><?php echo esc_html($synckhomev1howwedo_output['hwd_subtitle5']); ?></p>
                </div>
            </div>
            <?php endif;?>
        </div>

        <div class="how-we-do-items d-flex align-items-center justify-content-center">

<?php if($synckhomev1howwedo_output['hwd_card6_switch']=== 'yes') : ?>
            <div class="how-we-do-card">
                <div class="circle-shape"></div>
                <div class="line-shape"></div>

                <div class="how-we-do-icon">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1howwedo_output['hwd_img6']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1howwedo_output['hwd_img6']['id'], '_wp_attachment_image_alt', true); ?>" />
                </div>
                <div class="how-we-do-content">
                    <h5>
                        <a <?php if($synckhomev1howwedo_output['hwd_titlelink6']['is_external'] == true ): ?> target="_blank" <?php endif; ?> 
                        href="<?php echo esc_url($synckhomev1howwedo_output['hwd_titlelink6']['url']);?>">
                        <?php echo esc_html($synckhomev1howwedo_output['hwd_title6']); ?>
                        </a>
                    </h5>
                    <p><?php echo esc_html($synckhomev1howwedo_output['hwd_subtitle6']); ?></p>
                </div>
            </div>
            <?php endif;?>
        </div>

    </div>
    
</div>
</div>
</section>


    <?php }
}

