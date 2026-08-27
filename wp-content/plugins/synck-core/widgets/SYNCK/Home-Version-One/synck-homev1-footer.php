<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev1footer Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev1footer_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev1footer';
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
        return esc_html__( 'Home V1 Footer section', 'synck-core' );
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

        // Footer Bar Section //

        $this->start_controls_section(
            'sectionbar1',
            [
                'label' => esc_html__( 'Footer Logo section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
        );

        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Logo Info', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_logo',
            [
                'label'     => esc_html__( 'Footer Logo Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // LINK
        $this->add_control(
            'footerlink_logo',
            [
                'label'         => esc_html__( 'Footer Logo Link', 'synck-core' ),
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
            'logo_text', [
                'label'         => esc_html__( 'Logo Description', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'footer_subscribe',
            [
                'label'         => esc_html__( 'Contact Form Shortcode', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'rows'          => 2,
                'placeholder'   => esc_html__( 'Enter Subscribe From 7 ShortCode Here', 'synck-core' ),
                'description' => esc_html__( 'Navigate to the contact form and click on "Synck-Footer-Subscribe-Form"', 'synck' ),
            ]

        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'client_img',
            [
                'label'     => esc_html__( 'Footer Client Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Image List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'     => [
                    [
                        'list_title' => 'Banner Text',
                    ],
                ],
                'title_field' => 'Image', // Static title
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Other Info', 'synck-core' ),
            ]
        );

        $this->add_control(
            'rightinfo_title', [
                'label'         => esc_html__( 'Info Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                
            ]
        );

        $this->add_control(
            'rightinfo_description', [
                'label'         => esc_html__( 'Description', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                
            ]
        );

        $this->add_control(
            'rightinfo_btn', [
                'label'         => esc_html__( 'Button Text', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                
            ]
        );

        // LINK
        $this->add_control(
            'rightinfo_btnlink',
            [
                'label'         => esc_html__( 'Button Text Link', 'synck-core' ),
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

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'rightexp_title', [
                'label'         => esc_html__( 'Experience Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                
            ]
        );

        $repeater->add_control(
            'rightexp_heading', [
                'label'         => esc_html__( 'Experience Heading', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                
            ]
        );

        $this->add_control(
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Experience List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Experience List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ rightexp_heading }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Controls Info', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_subscribe_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Subscribe Form', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'client_image_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Client Image', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'rightinfo_btn_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Info Button', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'rightexp_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Experience Items', 'synck-core' ),
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

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Footer Menu Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Menu Items', 'synck-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'footermenuitem_title', [
                'label'         => esc_html__( 'Menu Item Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'footer_menuitems',
            [
                'label'         => esc_html__( 'Menu location', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => array_merge(['' => 'No Menu'], get_wordpress_menus()),
                'indent'        => true,
				'default'     => 'footer-menu1',
                'description'   => esc_html__( 'Navigate to Appearance -> Menus to edit menu items.', 'synck-core' ),
            ]
        );

        $this->add_control(
            'list3', //repeater name
            [
                'label'     => esc_html__( 'Menu List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ footermenuitem_title }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_5',
            [
               'label' => esc_html__( 'Number Info', 'synck-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'footermenuinfo_title', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'footermenuinfo_number', [
                'label'         => esc_html__( 'Info', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list4', //repeater name
            [
                'label'     => esc_html__( 'Info List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ footermenuinfo_title }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_6',
            [
               'label' => esc_html__( 'Controls Info', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footermenu_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Menu Lists', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'footermenuinfo_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Info Lists', 'synck-core' ),
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

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Footer Info Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_3'
        );

        $this->start_controls_tab(
            'style_normal_tab_7',
            [
               'label' => esc_html__( 'Social Icons', 'synck-core' ),
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 
            'footersocial_iconclass',
            [
                'label'         => esc_html__( 'Icon Class Name','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'footersocial_iconlink',
            [
                'label'         => esc_html__( 'Icon Link', 'synck-core' ),
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
            'list5', //repeater name
            [
                'label'     => esc_html__( 'Social Icons List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ footersocial_iconclass }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_8',
            [
               'label' => esc_html__( 'Copyright Info', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footercopyinfo_text', [
                'label'         => esc_html__( 'Copy Right Text', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'footercopyinfo_linktext', [
                'label'         => esc_html__( 'Company Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'footercopyinfo_link',
            [
                'label'         => esc_html__( 'Title Link', 'synck-core' ),
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

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_9',
            [
               'label' => esc_html__( 'Controls Info', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footersocial_iconclass_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Icon Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'footercopyinfo_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Info Lists', 'synck-core' ),
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

        $this->start_controls_section(
            'section4',
            [
                'label' => esc_html__( 'Footer Background Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'footerbg_img_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Image Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'footerbg_img',
            [
                'label'     => esc_html__( 'Background Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control( 
            'footerbgimg_animationclass',
            [
                'label'         => esc_html__( 'Image Animation Class','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'default'   => sprintf(
                    esc_html__( 'animation-slide-right', 'synck-core' ),
                    ),
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Footer Logo section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1footer_design_option',
            [
                'label'         => esc_html__( 'Footer Logo Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_logo_tab_1',
            [
               'label' => esc_html__( 'Description', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_logo_title_color',
            [
                'label'         => esc_html__( 'Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .footer-area .footer-top .left-content p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_logo_title_typography',
                'label'         => esc_html__( 'Text Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .footer-area .footer-top .left-content p',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_logo_tab_2',
            [
               'label' => esc_html__( 'Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_otherinfo_color',
            [
                'label'         => esc_html__( 'Title Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .footer-area .footer-top .right-content .right-content-inner h3'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_otherinfo_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .footer-area .footer-top .right-content .right-content-inner h3',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_logo_tab_3',
            [
               'label' => esc_html__( 'Info Desc', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_otherinfodesc_color',
            [
                'label'         => esc_html__( 'Title Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .footer-area .footer-top .right-content .right-content-inner p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_otherinfodesc_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .footer-area .footer-top .right-content .right-content-inner p',
            ]
        );

        //END
        $this->end_controls_tab();     

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*-----------------------------------------Footer Button section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1footerbutton_design_option',
            [
                'label'         => esc_html__( 'Footer Button Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs1'
        );

        $this->start_controls_tab(
            'style_normal_logo_tab_5',
            [
               'label' => esc_html__( 'Button', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_btnnormal_color',
            [
                'label'         => esc_html__( 'Normal Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .theme-btn '=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_btnnormal_typography',
                'label'         => esc_html__( 'Normal Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .theme-btn',
            ]
        );

        $this->add_control(
            'footer_btnhover_color',
            [
                'label'         => esc_html__( 'Hover Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .footer-area .theme-btn:hover'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_btnhover_typography',
                'label'         => esc_html__( 'Hover Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .footer-area .theme-btn:hover',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_logo_tab_4',
            [
               'label' => esc_html__( 'Experience', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_exptitle_color',
            [
                'label'         => esc_html__( 'Title Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .footer-area .footer-top .right-content .right-content-inner .footer-experience .footer-experience-item h2'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_exptitle_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .footer-area .footer-top .right-content .right-content-inner .footer-experience .footer-experience-item p',
            ]
        );

        $this->add_control(
            'footer_expdesc_color',
            [
                'label'         => esc_html__( 'Description Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .footer-area .footer-top .right-content .right-content-inner .footer-experience .footer-experience-item p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_expdesc_typography',
                'label'         => esc_html__( 'Description Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .footer-area .footer-top .right-content .right-content-inner .footer-experience .footer-experience-item h2',
            ]
        );

        //END
        $this->end_controls_tab();      

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*-----------------------------------------Footer Menu section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1footermenu_design_option',
            [
                'label'         => esc_html__( 'Footer Menu Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_menu_1'
        );

        $this->start_controls_tab(
            'style_normal_menu_tab_1',
            [
               'label' => esc_html__( 'Menu Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_menu_item_title_color',
            [
                'label'         => esc_html__( 'Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .footer-links h4'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_menu_item_title_typography',
                'label'         => esc_html__( 'Text Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .footer-links h4',
            ]
        );

        $this->add_responsive_control(
            'footer_menu_item_title_margin',
            [
                'label'         => __( 'Text Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .footer-links h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'footer_menu_item_title_padding',
            [
                'label'         => __( 'Text Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .footer-links h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_menu_tab_2',
            [
               'label' => esc_html__( 'Menu Items', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_menu_item_loc_color',
            [
                'label'         => esc_html__( 'Normal Text', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .footer-links ul li a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_menu_item_loc_typography',
                'label'         => esc_html__( 'Normal Text', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .footer-links ul li a',
            ]
        );

        $this->add_control(
            'footer_menu_item_loc_hover_color',
            [
                'label'         => esc_html__( 'Hover Text', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .footer-links ul li a:hover'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_menu_item_loc_hover_typography',
                'label'         => esc_html__( 'Hover Text', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .footer-links ul li a:hover',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_menu_tab_3',
            [
               'label' => esc_html__( 'Info Lists', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_info_item_color',
            [
                'label'         => esc_html__( 'Title Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .footer-area .footer-bottom .footer-contact-info .footer-contact-info-item h5'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_info_item_typography',
                'label'         => esc_html__( 'Title Color', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .footer-area .footer-bottom .footer-contact-info .footer-contact-info-item h5',
            ]
        );

        //END
        $this->end_controls_tab();        

        $this->end_controls_tabs();  

        $this->end_controls_section();


        /*-----------------------------------------Footer Info section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1footerinfo_design_option',
            [
                'label'         => esc_html__( 'Footer Info Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_info'
        );

        $this->start_controls_tab(
            'style_normal_info_tab_1',
            [
               'label' => esc_html__( 'Social Icon', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_info_normal_title_color',
            [
                'label'         => esc_html__( 'Normal Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .copyright-area .social-links li a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_info_normal_title_typography',
                'label'         => esc_html__( 'Normal Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .copyright-area .social-links li a',
            ]
        );

        $this->add_control(
            'footer_info_hover_title_color',
            [
                'label'         => esc_html__( 'Hover Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .copyright-area .social-links li a:hover'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_info_hover_title_typography',
                'label'         => esc_html__( 'Hover Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .copyright-area .social-links li a:hover',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_copyright_tab_1',
            [
               'label' => esc_html__( 'Copyright Text', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_copyright_text_color',
            [
                'label'         => esc_html__( 'Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .copyright-area p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_copyright_text_typography',
                'label'         => esc_html__( 'Text Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .copyright-area p',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_copyright_tab_2',
            [
               'label' => esc_html__( 'Company Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'footer_copyright_title_color',
            [
                'label'         => esc_html__( 'Title Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .copyright-area p a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_copyright_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .copyright-area p a',
            ]
        );

        $this->add_control(
            'footer_copyright_hover_title_color',
            [
                'label'         => esc_html__( 'Hover Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .copyright-area p a:hover'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'footer_copyright_hover_title_typography',
                'label'         => esc_html__( 'Hover Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .copyright-area p a:hover',
            ]
        );


        //END
        $this->end_controls_tab();

        $this->end_controls_tabs();  
             
        $this->end_controls_section();

         /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1footerbg_design_option',
            [
                'label'         => esc_html__( 'Footer Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .footer-area'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev1footer_output = $this->get_settings_for_display(); ?>

<!-- Footer -->
<footer class="footer-area">

<?php if ( $synckhomev1footer_output['footerbg_img_switcher_options'] === 'yes' ) : ?>
<img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1footer_output['footerbg_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1footer_output['footerbg_img']['id'], '_wp_attachment_image_alt', true); ?>" class="<?php echo esc_attr($synckhomev1footer_output['footerbgimg_animationclass']); ?> bg-shape" />
<?php endif; ?>

<div class="footer-top">
<div class="custom-container">
<div class="custom-row align-items-end justify-content-between">

<div class="left-content">
    <a <?php if($synckhomev1footer_output['footerlink_logo']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($synckhomev1footer_output['footerlink_logo']['url']); ?>" class="logo">
        <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1footer_output['footer_logo']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1footer_output['footer_logo']['id'], '_wp_attachment_image_alt', true); ?>" />
    </a>
    <p><?php echo ($synckhomev1footer_output['logo_text']); ?></p>
    
    <?php if ( $synckhomev1footer_output['footer_subscribe_switcher_options'] === 'yes' ) : ?>
    <?php echo apply_shortcodes( $synckhomev1footer_output['footer_subscribe'] ); ?>
    <?php endif; ?>

    <?php if ( $synckhomev1footer_output['client_image_switcher_options'] === 'yes' ) : ?>
    <div class="footer-clients d-flex align-items-center">
        <?php if(!empty($synckhomev1footer_output['list1'])):
                    foreach ($synckhomev1footer_output['list1'] as $synckhomev1footer_loop):?>
        <div class="footer-client-img">
            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1footer_loop['client_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1footer_loop['client_img']['id'], '_wp_attachment_image_alt', true); ?>" />
        </div>
        <?php endforeach; endif;?>
    </div>
    <?php endif; ?>
</div>

<div class="right-content">
    <div class="right-content-inner">
        <h3><?php echo esc_html($synckhomev1footer_output['rightinfo_title']); ?></h3>
        <p><?php echo ($synckhomev1footer_output['rightinfo_description']); ?></p>

        <?php if ( $synckhomev1footer_output['rightinfo_btn_switcher_options'] === 'yes' ) : ?>
        <a <?php if($synckhomev1footer_output['rightinfo_btnlink']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
        href="<?php echo esc_url($synckhomev1footer_output['rightinfo_btnlink']['url']); ?>" class="theme-btn"><?php echo esc_html($synckhomev1footer_output['rightinfo_btn']); ?></a>
        <?php endif; ?>

        <?php if ( $synckhomev1footer_output['rightexp_switcher_options'] === 'yes' ) : ?>
        <div class="footer-experience d-flex align-items-center">
            <?php if(!empty($synckhomev1footer_output['list2'])):
                    foreach ($synckhomev1footer_output['list2'] as $synckhomev1footer_loop):?>
            <div class="footer-experience-item">
                <h2><?php echo ($synckhomev1footer_loop['rightexp_title']); ?></h2>
                <p><?php echo esc_html($synckhomev1footer_loop['rightexp_heading']); ?></p>
            </div>
            <?php endforeach; endif;?>
        </div>
        <?php endif; ?>
    </div>
</div>
</div>
</div>
</div>

<?php if(!empty($synckhomev1footer_output['footermenu_switcher_options'])||
    ($synckhomev1footer_output['footermenuinfo_switcher_options']) ):?>
<div class="footer-bottom">
<div class="custom-container">
<div class="custom-row">
<div class="footer-all-links-wrap justify-content-between d-flex">

    <?php if(!empty($synckhomev1footer_output['list3'])):
        foreach ($synckhomev1footer_output['list3'] as $synckhomev1footer_loop):?>
    <?php if ( $synckhomev1footer_output['footermenu_switcher_options'] === 'yes' ) : ?>
    <div class="footer-links">
        <h4><?php echo esc_html($synckhomev1footer_loop['footermenuitem_title']); ?></h4>
        <ul>
            <?php
                if (isset($synckhomev1footer_loop['footer_menuitems']) && !empty($synckhomev1footer_loop['footer_menuitems'])) {
                    wp_nav_menu( array(
                        'theme_location'  => $synckhomev1footer_loop['footer_menuitems'],
                    ) );
                } 
            ?>
        </ul>
    </div>
    <?php endif; ?>
    <?php endforeach; endif;?>

</div>

<?php if ( $synckhomev1footer_output['footermenuinfo_switcher_options'] === 'yes' ) : ?>
<div class="footer-contact-info">
    <?php if(!empty($synckhomev1footer_output['list4'])):
        foreach ($synckhomev1footer_output['list4'] as $synckhomev1footer_loop):?>
    <div class="footer-contact-info-item">
        <h5><?php echo esc_html($synckhomev1footer_loop['footermenuinfo_title']); ?></h5>
        <p>
            <?php echo ($synckhomev1footer_loop['footermenuinfo_number']); ?>
        </p>
    </div>
    <?php endforeach; endif;?>
</div>
<?php endif; ?>

</div>
</div>
</div>
<?php endif; ?>

<div class="copyright-area">
<div class="custom-container">
<div class="custom-row d-flex align-items-center justify-content-between">
<ul class="social-links d-flex align-items-center">

    <?php if(!empty($synckhomev1footer_output['list5'])):
        foreach ($synckhomev1footer_output['list5'] as $synckhomev1footer_loop):?>
    <?php if ( $synckhomev1footer_output['footersocial_iconclass_switcher_options'] === 'yes' ) : ?>
    <li><a <?php if($synckhomev1footer_loop['footersocial_iconlink']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($synckhomev1footer_loop['footersocial_iconlink']['url']); ?>">
        <i class="<?php echo esc_attr($synckhomev1footer_loop['footersocial_iconclass']); ?>"></i>
    </a>
    </li>
    <?php endif; ?>
    <?php endforeach; endif;?>
 
</ul>

<?php if ( $synckhomev1footer_output['footercopyinfo_switcher_options'] === 'yes' ) : ?>
<p><?php echo esc_html($synckhomev1footer_output['footercopyinfo_text']); ?> <a <?php if($synckhomev1footer_output['footercopyinfo_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev1footer_output['footercopyinfo_link']['url']); ?>"><?php echo esc_html($synckhomev1footer_output['footercopyinfo_linktext']); ?></a></p>
<?php endif; ?>

</div>
</div>
</div>
</footer>

    <?php }
}

