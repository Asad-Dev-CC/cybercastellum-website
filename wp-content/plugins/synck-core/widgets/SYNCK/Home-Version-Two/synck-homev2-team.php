<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev2team Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev2team_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev2team';
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
        return esc_html__( 'Home V2 Team Section', 'synck-core' );
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
                'label' => esc_html__( 'Team Header Section', 'synck-core' ),
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

        //Team Cards Section

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Team Cards Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'team_personal_img',
            [
                'label'     => esc_html__( 'Team Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'team_user_icon_title1', [
                'label'         => esc_html__( 'Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'team_user_icon1', [
                'label'         => esc_html__( 'Name Icon Class', 'synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Line Awesome-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://icons8.com/line-awesome/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'team_user_icon_title2', [
                'label'         => esc_html__( 'Role', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'team_user_icon2', [
                'label'         => esc_html__( 'Role Icon Class', 'synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Line Awesome-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://icons8.com/line-awesome/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'team_user_icon_title3', [
                'label'         => esc_html__( 'Location', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'team_user_icon3', [
                'label'         => esc_html__( 'Location Icon Class', 'synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Line Awesome-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://icons8.com/line-awesome/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'team_user_icon_title4', [
                'label'         => esc_html__( 'Experience', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'team_user_icon4', [
                'label'         => esc_html__( 'Experience Icon Class Name', 'synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Line Awesome-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://icons8.com/line-awesome/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'team_user_content', [
                'label'         => esc_html__( 'Team Bio', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'team_card_btn_icon_class', [
                'label'         => esc_html__( 'Button Icon Class Name', 'synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'team_card_btn_link',
            [
                'label'         => esc_html__( 'Button Icon Link', 'synck-core' ),
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

        $repeater->add_control(
            'team_card_pos_class', [
                'label'         => esc_html__( 'Team Card Class Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Teams List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Service List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ team_user_icon_title1 }}}', // Reapeter Title 
            ]
        );
         
        $this->end_controls_section();

        /*-----------------------------------------Teams Header section styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2teamheader_design_option',
            [
                'label'         => esc_html__( 'Team Header & List Section Style','synck-core' ),
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
            'homev2_team_header_content_color',
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
                'name'          => 'homev2_team_header_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .section-header p',
            ]
        );

        $this->add_responsive_control(
            'homev2_team_header_content_margin',
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
            'homev2_team_header_content_padding',
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
               'label' => esc_html__( 'List Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_team_list_title_color',
            [
                'label'         => esc_html__( 'List Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .our-team-box .our-team-body .our-team-personal-details h4'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_team_list_title_typography',
                'label'         => esc_html__( 'List Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .our-team-box .our-team-body .our-team-personal-details h4',
            ]
        );

        $this->add_responsive_control(
            'homev2_team_list_title_margin',
            [
                'label'         => __( 'List Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .our-team-box .our-team-body .our-team-personal-details h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_team_list_title_padding',
            [
                'label'         => __( 'List Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .our-team-box .our-team-body .our-team-personal-details h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Team Bio', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_team_list_bio_color',
            [
                'label'         => esc_html__( 'Bio Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .our-team-box .our-team-body .our-team-bio p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_team_list_bio_typography',
                'label'         => esc_html__( 'Bio Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .our-team-box .our-team-body .our-team-bio p',
            ]
        );

        $this->add_responsive_control(
            'homev2_team_list_bio_margin',
            [
                'label'         => __( 'Bio Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .our-team-box .our-team-body .our-team-bio p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_team_list_bio_padding',
            [
                'label'         => __( 'Bio Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .our-team-box .our-team-body .our-team-bio p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2teambg_design_option',
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
                    '{{WRAPPER}}  .our-team-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .our-team-box .img-box,.our-team-box .our-team-body'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectiontab_bg_color',
            [
                'label'         => esc_html__( 'Tab Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .our-team-box .our-team-body .our-team-personal-details h4,
                        .our-team-box .our-team-body .our-team-bio'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev2team_output = $this->get_settings_for_display(); ?>


<!-- Home V2 Teams Section -->

<section class="our-team-area">
<div class="custom-container">
<div class="section-header d-flex align-items-end justify-content-between w-full">
<div class="left">
<?php echo ($synckhomev2team_output['header_title_heading']); ?>
</div>

<p><?php echo esc_html($synckhomev2team_output['header_content']); ?>
</p>
</div>


<div class="our-teams-list">
<?php if(!empty($synckhomev2team_output['list1'])):
foreach ($synckhomev2team_output['list1'] as $synckhomev2team_loop):?>
<div class="our-team-box <?php echo esc_attr($synckhomev2team_loop['team_card_pos_class']);?> d-flex" id="first-box">
<div class="img-box">
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2team_loop['team_personal_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2team_loop['team_personal_img']['id'], '_wp_attachment_image_alt', true); ?>" />
</div>
<div class="our-team-body card-h">
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

<div class="our-team-body-inner">
<div class="our-team-personal-details">

    <?php if(!empty($synckhomev2team_loop['team_user_icon_title1']) ||
    ($synckhomev2team_loop['team_user_icon1'] )): ?>
    <h4 class="name">
        <span class="icon"><i class="<?php echo esc_attr($synckhomev2team_loop['team_user_icon1']);?>"></i></span> <?php echo ($synckhomev2team_loop['team_user_icon_title1']); ?>
    </h4>
    <?php endif;?>

<?php if(!empty($synckhomev2team_loop['team_user_icon_title2']) ||
    ($synckhomev2team_loop['team_user_icon2'] )): ?>
    <h4 class="web-design">
        <span class="icon"><i class="<?php echo esc_attr($synckhomev2team_loop['team_user_icon2']);?>"></i></span> <?php echo ($synckhomev2team_loop['team_user_icon_title2']); ?>
    </h4>
    <?php endif;?>

<?php if(!empty($synckhomev2team_loop['team_user_icon_title3']) ||
    ($synckhomev2team_loop['team_user_icon3'] )): ?>
    <h4 class="location">
        <span class="icon"><i class="<?php echo esc_attr($synckhomev2team_loop['team_user_icon3']);?>"></i></span> <?php echo ($synckhomev2team_loop['team_user_icon_title3']); ?>
    </h4>
    <?php endif;?>

<?php if(!empty($synckhomev2team_loop['team_user_icon_title4']) ||
    ($synckhomev2team_loop['team_user_icon4'] )): ?>
    <h4 class="experience">
        <span class="icon"><i class="<?php echo esc_attr($synckhomev2team_loop['team_user_icon4']);?>"></i></span> <?php echo ($synckhomev2team_loop['team_user_icon_title4']); ?>
    </h4>
    <?php endif;?>

</div>
<div class="our-team-bio">
    <p><?php echo ($synckhomev2team_loop['team_user_content']); ?></p>
</div>
<a <?php if($synckhomev2team_loop['team_card_btn_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2team_loop['team_card_btn_link']['url']); ?>" class="theme-btn">
    <i class="<?php echo esc_attr($synckhomev2team_loop['team_card_btn_icon_class']);?>"></i>
</a>
</div>
</div>
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

