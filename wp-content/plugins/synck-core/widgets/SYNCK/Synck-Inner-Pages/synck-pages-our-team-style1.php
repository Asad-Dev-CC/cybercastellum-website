<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckpagesourteam Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckpagesourteamstyle1_Widget extends \Elementor\Widget_Base {

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
        return 'synckpagesourteam';
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
        return esc_html__( 'Pages Our Team style1', 'synck-core' );
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
                'label' => esc_html__( 'Our Team Section', 'synck-core' ),
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
            'title_heading', [
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Button & Image', 'synck-core' ),
            ]
        );

        $this->add_control(
            'btn_title', [
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
            'team_bg_img',
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

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Our Team Cards Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // IMAGE
        $repeater->add_control(
            'auth_img',
            [
                'label'     => esc_html__( 'Author Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'auth_name', [
                'label'         => esc_html__( 'Author Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'auth_designation', [
                'label'         => esc_html__( 'Author Designation', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'soc_icon1', [
                'label'         => esc_html__( 'Social Icon Class Name 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'soc_link1',
            [
                'label'         => esc_html__( 'Social Link 1', 'synck-core' ),
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
            'soc_icon2', [
                'label'         => esc_html__( 'Social Icon Class Name 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'soc_link2',
            [
                'label'         => esc_html__( 'Social Link 2', 'synck-core' ),
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
            'soc_icon3', [
                'label'         => esc_html__( 'Social Icon Class Name 3', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'soc_link3',
            [
                'label'         => esc_html__( 'Social Link 3', 'synck-core' ),
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
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Team Cards List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ auth_name }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Service section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagesteam_design_option',
            [
                'label'         => esc_html__( 'Our Team Section Style','synck-core' ),
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
            'synckpagesteam_content_color',
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
                'name'          => 'synckpagesteam_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .section-header p',
            ]
        );

        $this->add_responsive_control(
            'synckpagesteam_content_margin',
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
            'synckpagesteam_content_padding',
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
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Button', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagesteam_button_color',
            [
                'label'         => esc_html__( 'Button Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesteam_button_typography',
                'label'         => esc_html__( 'Button Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .theme-btn',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab333',
            [
               'label' => esc_html__( 'Hover Button', 'synck-core' ),
            ]
        );

        $this->add_control(
            'hoverbtn_color',
            [
                'label'         => esc_html__( 'Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn2:hover, .theme-btn:hover'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'hoverbtnbg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn2::after, .theme-btn2::before, .theme-btn::after, .theme-btn::before'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'synckpagesteamcard_design_option',
            [
                'label'         => esc_html__( 'Our Team Card Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Card Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagesteamcard_title_color',
            [
                'label'         => esc_html__( 'Card Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .our-team-2-card h3'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesteamcard_title_typography',
                'label'         => esc_html__( 'Card Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .our-team-2-card h3',
            ]
        );

        $this->add_responsive_control(
            'synckpagesteamcard_title_margin',
            [
                'label'         => __( 'Card Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .our-team-2-card h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagesteamcard_title_padding',
            [
                'label'         => __( 'Card Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .our-team-2-card h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'synckpagesteamcard_content_color',
            [
                'label'         => esc_html__( 'Card Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .our-team-2-card .designation'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesteamcard_content_typography',
                'label'         => esc_html__( 'Card Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .our-team-2-card .designation',
            ]
        );

        $this->add_responsive_control(
            'synckpagesteamcard_content_margin',
            [
                'label'         => __( 'Card Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .our-team-2-card .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagesteamcard_content_padding',
            [
                'label'         => __( 'Card Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .our-team-2-card .designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Card Icon', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagesteamcard_icon_color',
            [
                'label'         => esc_html__( 'Icon Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .our-team-2-card .social-links li a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesteamcard_icon_typography',
                'label'         => esc_html__( 'Icon Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .our-team-2-card .social-links li a',
            ]
        );

        $this->end_controls_tab();  

        $this->end_controls_tabs();  

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagesteambg_design_option',
            [
                'label'         => esc_html__( 'Team Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .our-team-2-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .our-team-2-header,.our-team-2-card'=> 'background-color: {{VALUE}} !important;',
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

        $synckpagesourteam_output = $this->get_settings_for_display(); ?>

<!-- Our Team -->
<section class="our-team-2-area">
<div class="custom-container">
<div class="section-header our-team-2-header d-flex align-items-center justify-content-between w-full">
    <img class="<?php echo esc_attr($synckpagesourteam_output['bg_animation']);?> bg-shape" src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesourteam_output['team_bg_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesourteam_output['team_bg_img']['id'], '_wp_attachment_image_alt', true); ?>" />
    <div class="left">
        <?php echo($synckpagesourteam_output['title_heading']); ?>
        <p><?php echo ($synckpagesourteam_output['content']); ?></p>
    </div>

    <a <?php if($synckpagesourteam_output['btn_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($synckpagesourteam_output['btn_link']['url']); ?>" class="theme-btn"><?php echo esc_html($synckpagesourteam_output['btn_title']); ?></a>
</div>

<div class="our-team-2-lists">
    <?php if(!empty($synckpagesourteam_output['list1'])):
        foreach ($synckpagesourteam_output['list1'] as $synckpagesourteam_loop):?>
    <div class="our-team-2-card">
        <div class="img-box">
            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesourteam_loop['auth_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesourteam_loop['auth_img']['id'], '_wp_attachment_image_alt', true); ?>" />
        </div>
        <h3><?php echo esc_html($synckpagesourteam_loop['auth_name']); ?></h3>
        <span class="designation"><?php echo esc_html($synckpagesourteam_loop['auth_designation']); ?></span>
        <ul class="social-links d-flex align-items-center">
            <li><a <?php if($synckpagesourteam_loop['soc_link1']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckpagesourteam_loop['soc_link1']['url']); ?>">
                <i class="<?php echo esc_attr($synckpagesourteam_loop['soc_icon1']);?>"></i>
            </a></li>
            <li><a <?php if($synckpagesourteam_loop['soc_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckpagesourteam_loop['soc_link2']['url']); ?>">
                <i class="<?php echo esc_attr($synckpagesourteam_loop['soc_icon2']);?>"></i>
            </a></li>
            <li><a <?php if($synckpagesourteam_loop['soc_link3']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckpagesourteam_loop['soc_link3']['url']); ?>">
                <i class="<?php echo esc_attr($synckpagesourteam_loop['soc_icon3']);?>"></i>
            </a></li>
        </ul>
    </div>
    <?php endforeach; endif;?>
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

