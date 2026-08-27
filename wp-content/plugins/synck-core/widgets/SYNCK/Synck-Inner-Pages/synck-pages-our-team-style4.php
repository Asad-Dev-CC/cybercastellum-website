<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckpagesourteamstyle4 Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckpagesourteamstyle4_Widget extends \Elementor\Widget_Base {

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
        return 'synckpagesourteamstyle4';
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
        return esc_html__( 'Pages Our Team Style4', 'synck-core' );
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
                'label' => esc_html__( 'Our Team Style4 Section', 'synck-core' ),
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

        // IMAGE
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
                'label' => esc_html__( 'Our Team style4 Cards Section', 'synck-core' ),
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
                'label'         => esc_html__( 'Our Team Style4 Section Style','synck-core' ),
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

        $this->end_controls_tabs();     

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagesteambg_design_option',
            [
                'label'         => esc_html__( 'Our Team Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .our-team-3-area .our-team-inner'=> 'background-color: {{VALUE}} !important;',
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

        $synckpagesourteamstyle4_output = $this->get_settings_for_display(); ?>

<!-- Our Team -->
<section class="our-team-2-area our-team-3-area">
<div class="custom-container">
<div class="our-team-inner">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesourteamstyle4_output['team_bg_img']['id'], 'full' ));?>" class="<?php echo esc_attr($synckpagesourteamstyle4_output['bg_animation']);?> bg-shape" alt="<?php echo get_post_meta($synckpagesourteamstyle4_output['team_bg_img']['id'], '_wp_attachment_image_alt', true); ?>" />

<div class="section-header our-team-2-header d-flex align-items-center justify-content-between w-full">

<div class="left">
    <?php echo($synckpagesourteamstyle4_output['title_heading']); ?>
    <p><?php echo ($synckpagesourteamstyle4_output['content']); ?></p>
</div>

<?php if(!empty($synckpagesourteamstyle4_output['btn_title'] )): ?>
    <a <?php if($synckpagesourteamstyle4_output['btn_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($synckpagesourteamstyle4_output['btn_link']['url']); ?>" class="theme-btn"><?php echo esc_html($synckpagesourteamstyle4_output['btn_title']); ?></a>
<?php endif;?>
</div>

<div class="our-team-2-lists our-team-3-lists">

<?php if(!empty($synckpagesourteamstyle4_output['list1'])):
        foreach ($synckpagesourteamstyle4_output['list1'] as $synckpagesourteamstyle4_loop):?>
<div class="our-team-2-card">
    <div class="img-box">
        <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesourteamstyle4_loop['auth_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesourteamstyle4_loop['auth_img']['id'], '_wp_attachment_image_alt', true); ?>" />
    </div>
    <h3><?php echo esc_html($synckpagesourteamstyle4_loop['auth_name']); ?></h3>
    <span class="designation"><?php echo esc_html($synckpagesourteamstyle4_loop['auth_designation']); ?></span>
</div>
<?php endforeach; endif;?>

</div>
</div>
</div>
</section>


    <?php }
}

