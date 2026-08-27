<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckpagesfaq Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckpagesfaq_Widget extends \Elementor\Widget_Base {

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
        return 'synckpagesfaq';
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
        return esc_html__( 'Pages FAQ Section', 'synck-core' );
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
                'label' => esc_html__( 'FAQ Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title_heading', [
                'label'         => esc_html__( 'Title & Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'FAQ Item Box1', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq_ques_1', [
                'label'         => esc_html__( 'FAQ Question', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'faq_ans_1', [
                'label'         => esc_html__( 'FAQ Answer', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // IMAGE
        $this->add_control(
            'faq_img_1',
            [
                'label'     => esc_html__( 'Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'box1_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'FAQ Info', 'synck-core' ),
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
                'label' => esc_html__( 'FAQ Item Box2', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq_ques_2', [
                'label'         => esc_html__( 'FAQ Question', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'faq_ans_2', [
                'label'         => esc_html__( 'FAQ Answer', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // IMAGE
        $this->add_control(
            'faq_img_2',
            [
                'label'     => esc_html__( 'Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'box2_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'FAQ Info', 'synck-core' ),
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
                'label' => esc_html__( 'FAQ Item Box3', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq_ques_3', [
                'label'         => esc_html__( 'FAQ Question', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'faq_ans_3', [
                'label'         => esc_html__( 'FAQ Answer', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // IMAGE
        $this->add_control(
            'faq_img_3',
            [
                'label'     => esc_html__( 'Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'box3_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'FAQ Info', 'synck-core' ),
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
                'label' => esc_html__( 'FAQ Item Box4', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq_ques_4', [
                'label'         => esc_html__( 'FAQ Question', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'faq_ans_4', [
                'label'         => esc_html__( 'FAQ Answer', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // IMAGE
        $this->add_control(
            'faq_img_4',
            [
                'label'     => esc_html__( 'Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'box4_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'FAQ Info', 'synck-core' ),
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
                'label' => esc_html__( 'FAQ Item Box5', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq_ques_5', [
                'label'         => esc_html__( 'FAQ Question', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'faq_ans_5', [
                'label'         => esc_html__( 'FAQ Answer', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // IMAGE
        $this->add_control(
            'faq_img_5',
            [
                'label'     => esc_html__( 'Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'box5_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'FAQ Info', 'synck-core' ),
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
                'label' => esc_html__( 'FAQ Item Box6', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq_ques_6', [
                'label'         => esc_html__( 'FAQ Question', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'faq_ans_6', [
                'label'         => esc_html__( 'FAQ Answer', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        // IMAGE
        $this->add_control(
            'faq_img_6',
            [
                'label'     => esc_html__( 'Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'box6_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'FAQ Info', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->end_controls_section();


        /*-----------------------------------------FAQ section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagesfaq_design_option',
            [
                'label'         => esc_html__( 'FAQ Item Box  Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
               'label' => esc_html__( 'Question', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagesfaq_question_color',
            [
                'label'         => esc_html__( 'Question Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .faq-box .card-header button'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesfaq_question_typography',
                'label'         => esc_html__( 'Question Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .faq-box .card-header button',
            ]
        );

        $this->add_responsive_control(
            'synckpagesfaq_question_margin',
            [
                'label'         => __( 'Question Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-box .card-header button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagesfaq_question_padding',
            [
                'label'         => __( 'Question Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-box .card-header button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Answer', 'synck-core' ),
            ]
        );

        $this->add_control(
            'synckpagesfaq_answer_color',
            [
                'label'         => esc_html__( 'Answer Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .faq-box .card-body'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'synckpagesfaq_answer_typography',
                'label'         => esc_html__( 'Answer Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .faq-box .card-body',
            ]
        );

        $this->add_responsive_control(
            'synckpagesfaq_answer_margin',
            [
                'label'         => __( 'Answer Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-box .card-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'synckpagesfaq_answer_padding',
            [
                'label'         => __( 'Answer Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .faq-box .card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckpagesfaqbg_design_option',
            [
                'label'         => esc_html__( 'FAQ Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .faq-style-2-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .faq-style-2-area .faq-inner'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectionbox_bg_color',
            [
                'label'         => esc_html__( 'Cards Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .faq-style-2-area .faq-box'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'section_colbg_color',
            [
                'label'         => esc_html__( 'Icon BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .faq-box .card-header button .icon'=> 'background: {{VALUE}} !important;',
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

        $synckpagesfaq_output = $this->get_settings_for_display(); ?>

<!-- Faq -->
<section class="faq-area  faq-style-2-area">
<div class="custom-container">
<div class="faq-inner">

<?php echo($synckpagesfaq_output['title_heading']); ?>

<div class="faq-items-box">
    <div class="faq-col">
        <div  id="accordion">
            <?php if ( $synckpagesfaq_output['box1_switcher_options'] === 'yes' ) : ?>
            <div class="faq-box">
                <h6 class="card-header" id="headingOne">
                    <button data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <?php if(!empty($synckpagesfaq_output['faq_img_1']['url']) ):?>
                        <div class="icon">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesfaq_output['faq_img_1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesfaq_output['faq_img_1']['id'], '_wp_attachment_image_alt', true); ?>" />
                        </div> 
                        <?php endif;?>
                        <?php echo esc_html($synckpagesfaq_output['faq_ques_1']); ?>
                    </button>
                </h6>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#accordion">
                    <div class="card-body">
                        <?php echo ($synckpagesfaq_output['faq_ans_1']); ?>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <?php if ( $synckpagesfaq_output['box2_switcher_options'] === 'yes' ) : ?>
            <div class="faq-box">
                <h6 class="card-header" id="headingTwo">
                    <button data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        <?php if(!empty($synckpagesfaq_output['faq_img_2']['url']) ):?>
                        <div class="icon">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesfaq_output['faq_img_2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesfaq_output['faq_img_2']['id'], '_wp_attachment_image_alt', true); ?>"  />
                        </div> 
                        <?php endif;?>
                        <?php echo esc_html($synckpagesfaq_output['faq_ques_2']); ?>
                    </button>
                </h6>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordion">
                    <div class="card-body">
                        <?php echo ($synckpagesfaq_output['faq_ans_2']); ?> 
                    </div>
                </div>
            </div>
            <?php endif;?>
            <?php if ( $synckpagesfaq_output['box3_switcher_options'] === 'yes' ) : ?>
            <div class="faq-box">
                <h6 class="card-header" id="headingThree">
                    <button data-bs-toggle="collapse" data-bs-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                        <?php if(!empty($synckpagesfaq_output['faq_img_3']['url']) ):?>
                        <div class="icon">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesfaq_output['faq_img_3']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesfaq_output['faq_img_3']['id'], '_wp_attachment_image_alt', true); ?>" />
                        </div><?php endif;?>
                         <?php echo esc_html($synckpagesfaq_output['faq_ques_3']); ?> 
                    </button>
                </h6>

                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                    data-parent="#accordion">
                    <div class="card-body">
                        <?php echo ($synckpagesfaq_output['faq_ans_3']); ?> 
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
    <div class="faq-col">
        <div id="accordion2">
            <?php if ( $synckpagesfaq_output['box4_switcher_options'] === 'yes' ) : ?>
            <div class="faq-box">
                <h6 class="card-header" id="headingFour">
                    <button data-bs-toggle="collapse" data-bs-target="#collapseFour"
                        aria-expanded="true" aria-controls="collapseFour">
                        <?php if(!empty($synckpagesfaq_output['faq_img_4']['url']) ):?>
                        <div class="icon">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesfaq_output['faq_img_4']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesfaq_output['faq_img_4']['id'], '_wp_attachment_image_alt', true); ?>" />
                        </div>
                        <?php endif;?> 
                        <?php echo esc_html($synckpagesfaq_output['faq_ques_4']); ?>
                    </button>
                </h6>

                <div id="collapseFour" class="collapse show" aria-labelledby="headingFour"
                    data-parent="#accordion2">
                    <div class="card-body">
                        <?php echo ($synckpagesfaq_output['faq_ans_4']); ?>
                    </div>
                </div>
            </div>
             <?php endif;?>
            <?php if ( $synckpagesfaq_output['box5_switcher_options'] === 'yes' ) : ?>
            <div class="faq-box">
                <h6 class="card-header" id="headingFive">
                    <button data-bs-toggle="collapse" data-bs-target="#collapseFive"
                        aria-expanded="false" aria-controls="collapseFive">
                        <?php if(!empty($synckpagesfaq_output['faq_img_5']['url']) ):?>
                        <div class="icon">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesfaq_output['faq_img_5']['id'], 'full' ));?>"  alt="<?php echo get_post_meta($synckpagesfaq_output['faq_img_5']['id'], '_wp_attachment_image_alt', true); ?>" />
                        </div> 
                        <?php endif;?>
                        <?php echo esc_html($synckpagesfaq_output['faq_ques_5']); ?>
                    </button>
                </h6>

                <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                    data-parent="#accordion2">
                    <div class="card-body">
                        <?php echo ($synckpagesfaq_output['faq_ans_5']); ?> 
                    </div>
                </div>
            </div>
             <?php endif;?>
            <?php if ( $synckpagesfaq_output['box6_switcher_options'] === 'yes' ) : ?>
            <div class="faq-box">
                <h6 class="card-header" id="headingSix">
                    <button data-bs-toggle="collapse" data-bs-target="#collapseSix"
                        aria-expanded="false" aria-controls="collapseSix">
                        <?php if(!empty($synckpagesfaq_output['faq_img_6']['url']) ):?>
                        <div class="icon">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckpagesfaq_output['faq_img_6']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckpagesfaq_output['faq_img_6']['id'], '_wp_attachment_image_alt', true); ?>" />
                        </div> 
                        <?php endif;?>
                        <?php echo esc_html($synckpagesfaq_output['faq_ques_6']); ?>
                        
                    </button>
                </h6>

                <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                    data-parent="#accordion2">
                    <div class="card-body">
                        <?php echo ($synckpagesfaq_output['faq_ans_6']); ?> 
                    </div>
                </div>
            </div>
             <?php endif;?>
        </div>
    </div>
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

