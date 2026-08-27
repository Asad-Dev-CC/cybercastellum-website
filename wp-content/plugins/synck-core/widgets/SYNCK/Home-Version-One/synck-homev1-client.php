<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev1client Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev1client_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev1client';
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
        return esc_html__( 'Home V1 Client Section', 'synck-core' );
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
                'label' => esc_html__( 'Client Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // IMAGE
        $repeater->add_control(
            'clientimg',
            [
                'label'     => esc_html__( 'Client Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Client Image List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ clientimg }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Hero section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1client_design_option',
            [
                'label'         => esc_html__( 'Client Background Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab_04',
            [
               'label' => esc_html__( 'Section', 'synck-core' ),
            ]
        );

        $this->add_control(
            'section_bg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .client-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_05',
            [
               'label' => esc_html__( 'Cards', 'synck-core' ),
            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .client-area .clients .client-logo'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev1client_output = $this->get_settings_for_display(); ?>

<!-- Client Section -->
<section class="client-area">
<div class="clients clients-marquee d-flex align-items-center">

    <?php if(!empty($synckhomev1client_output['list1'])):
    foreach ($synckhomev1client_output['list1'] as $synckhomev1client_loop):?>
    <div class="client-logo simple-shadow">
        <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1client_loop['clientimg']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1client_loop['clientimg']['id'], '_wp_attachment_image_alt', true); ?>" />
    </div>
    <?php endforeach; endif;?>

    <div class="client-logo" style="min-width: 0;"></div>
</div>
</section>


<!-- <script>
    AOS.init({
        duration: 1500,
        once: true,

    });</script>  -->

    <?php }
}

