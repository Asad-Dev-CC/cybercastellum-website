<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev1casestudie Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev1casestudie_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev1casestudie';
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
        return esc_html__( 'Home V1 Case Studie', 'synck-core' );
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
                'label' => esc_html__( 'Case Studie Section', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

        $this->end_controls_section();

        // Tab Sections Starts --1 //

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Development Tab', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'case_studie_tab_title', [
                'label'         => esc_html__( 'Case Studie Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs1'
        );

        $this->start_controls_tab(
            'style_normal_tab1',
            [
               'label' => esc_html__( 'Left Section', 'synck-core' ),
            ]
        );

        // // Repeater Start

        $repeater = new \Elementor\Repeater();

        // IMAGE
        $repeater->add_control(
            'case_studie_img',
            [
                'label'     => esc_html__( 'Case Studie Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'case_studie_img_title', [
                'label'         => esc_html__( 'Case Studie Image Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'case_studie_title_link',
            [
                'label'         => esc_html__( 'Title Link', 'synck-core' ),
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
                'label'     => esc_html__( 'Case Studie Image List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ case_studie_img_title }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Right Section', 'synck-core' ),
            ]
        );


         // IMAGE
        $this->add_control(
            'case_studie_icon_img',
            [
                'label'     => esc_html__( 'Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'case_studie_title', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'case_studie_content', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
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
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Tab Sections Starts --2 //

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Woo Commerce Tab', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'case_studie_tab2_switch',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Tab Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'case_studie_tab_title2', [
                'label'         => esc_html__( 'Case Studie Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_2'
        );

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Left Section', 'synck-core' ),
            ]
        );

        // // Repeater Start

        $repeater = new \Elementor\Repeater();

        // IMAGE
        $repeater->add_control(
            'case_studie_img2',
            [
                'label'     => esc_html__( 'Case Studie Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'case_studie_img_title2', [
                'label'         => esc_html__( 'Case Studie Image Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'case_studie_title_link2',
            [
                'label'         => esc_html__( 'Title Link', 'synck-core' ),
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
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Case Studie Image List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ case_studie_img_title2 }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_4',
            [
               'label' => esc_html__( 'Right Section', 'synck-core' ),
            ]
        );

        // IMAGE
        $this->add_control(
            'case_studie_icon_img2',
            [
                'label'     => esc_html__( 'Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'case_studie_title2', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'case_studie_content2', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'btn_icon2',
            [
                'label'         => esc_html__( 'Button Icon Class Name','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'btn_link2',
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
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Tab Sections Starts --3 //

        $this->start_controls_section(
            'section4',
            [
                'label' => esc_html__( 'CRM Solutions Tab', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'case_studie_tab3_switch',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Tab Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'case_studie_tab_title3', [
                'label'         => esc_html__( 'Case Studie Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_3'
        );

        $this->start_controls_tab(
            'style_normal_tab_5',
            [
               'label' => esc_html__( 'Left Section', 'synck-core' ),
            ]
        );

        // // Repeater Start

        $repeater = new \Elementor\Repeater();

        // IMAGE
        $repeater->add_control(
            'case_studie_img3',
            [
                'label'     => esc_html__( 'Case Studie Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'case_studie_img_title3', [
                'label'         => esc_html__( 'Case Studie Image Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'case_studie_title_link3',
            [
                'label'         => esc_html__( 'Title Link', 'synck-core' ),
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
            'list3', //repeater name
            [
                'label'     => esc_html__( 'Case Studie Image List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ case_studie_img_title3 }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_6',
            [
               'label' => esc_html__( 'Right Section', 'synck-core' ),
            ]
        );

        // IMAGE
        $this->add_control(
            'case_studie_icon_img3',
            [
                'label'     => esc_html__( 'Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'case_studie_title3', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'case_studie_content3', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'btn_icon3',
            [
                'label'         => esc_html__( 'Button Icon Class Name','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'btn_link3',
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
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Tab Sections Starts --4 //

        $this->start_controls_section(
            'section5',
            [
                'label' => esc_html__( 'Web Designing Tab', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'case_studie_tab4_switch',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Tab Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'case_studie_tab_title4', [
                'label'         => esc_html__( 'Case Studie Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_4'
        );

        $this->start_controls_tab(
            'style_normal_tab_7',
            [
               'label' => esc_html__( 'Left Section', 'synck-core' ),
            ]
        );

        // // Repeater Start

        $repeater = new \Elementor\Repeater();

        // IMAGE
        $repeater->add_control(
            'case_studie_img4',
            [
                'label'     => esc_html__( 'Case Studie Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'case_studie_img_title4', [
                'label'         => esc_html__( 'Case Studie Image Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'case_studie_title_link4',
            [
                'label'         => esc_html__( 'Title Link', 'synck-core' ),
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
            'list4', //repeater name
            [
                'label'     => esc_html__( 'Case Studie Image List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ case_studie_img_title4 }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_8',
            [
               'label' => esc_html__( 'Right Section', 'synck-core' ),
            ]
        );

        // IMAGE
        $this->add_control(
            'case_studie_icon_img4',
            [
                'label'     => esc_html__( 'Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'case_studie_title4', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'case_studie_content4', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'btn_icon4',
            [
                'label'         => esc_html__( 'Button Icon Class Name','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'btn_link4',
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
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Tab Sections Starts --5 //

        $this->start_controls_section(
            'section6',
            [
                'label' => esc_html__( 'IT Support Tab', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'case_studie_tab5_switch',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Tab Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'case_studie_tab_title5', [
                'label'         => esc_html__( 'Case Studie Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_5'
        );

        $this->start_controls_tab(
            'style_normal_tab_9',
            [
               'label' => esc_html__( 'Left Section', 'synck-core' ),
            ]
        );

        // // Repeater Start

        $repeater = new \Elementor\Repeater();

        // IMAGE
        $repeater->add_control(
            'case_studie_img5',
            [
                'label'     => esc_html__( 'Case Studie Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'case_studie_img_title5', [
                'label'         => esc_html__( 'Case Studie Image Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $repeater->add_control(
            'case_studie_title_link5',
            [
                'label'         => esc_html__( 'Title Link', 'synck-core' ),
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
            'list5', //repeater name
            [
                'label'     => esc_html__( 'Case Studie Image List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ case_studie_img_title5 }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_10',
            [
               'label' => esc_html__( 'Right Section', 'synck-core' ),
            ]
        );

        // IMAGE
        $this->add_control(
            'case_studie_icon_img5',
            [
                'label'     => esc_html__( 'Icon Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'case_studie_title5', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'case_studie_content5', [
                'label'         => esc_html__( 'Content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'btn_icon5',
            [
                'label'         => esc_html__( 'Button Icon Class Name','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'btn_link5',
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
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        /*-----------------------------------------Case-Studie section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev1casestudie_design_option',
            [
                'label'         => esc_html__( 'Case Studie Tab Section Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs_1'
        );


        $this->start_controls_tab(
            'style_normal_tab_1',
            [
               'label' => esc_html__( 'Tab Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev1_case-studie_tab_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .case-studio-area .case-studio .case-studio-tabs .nav-item button'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev1_case-studie_tab_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .case-studio-area .case-studio .case-studio-tabs .nav-item button',
            ]
        );

        $this->add_control(
            'homev1_case-studie_tab_titleact_color',
            [
                'label'         => esc_html__( 'Title Active Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .case-studio-area .case-studio .case-studio-tabs .nav-item button.active'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncardtab_bg_color',
            [
                'label'         => esc_html__( 'Tab Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .case-studio-area .case-studio .case-studio-tabs .nav-item button.active'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Image Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev1_case-studie_img_title_color',
            [
                'label'         => esc_html__( 'Image Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .case-studio-area .case-studio .case-studio-tab-content .case-studio-body .case-studio-img-card .case-studio-cat'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev1_case-studie_img_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .case-studio-area .case-studio .case-studio-tab-content .case-studio-body .case-studio-img-card .case-studio-cat',
            ]
        );

        $this->add_control(
            'homev1_case_studie_img_bgtitle_color',
            [
                'label'         => esc_html__( 'Image Title Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .case-studio-area .case-studio .case-studio-tab-content .case-studio-body .case-studio-img-card .case-studio-cat'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3_3',
            [
               'label' => esc_html__( 'Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev1_case-studie_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .service-card h4'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev1_case-studie_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .service-card h4',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_4_4',
            [
               'label' => esc_html__( 'Content', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev1_case-studie_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .case-studio-area .case-studio .case-studio-tab-content .case-studio-body .right .case-studio-contents p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev1_case-studie_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .case-studio-area .case-studio .case-studio-tab-content .case-studio-body .right .case-studio-contents p',
            ]
        );

        $this->add_responsive_control(
            'homev1_case-studie_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .case-studio-area .case-studio .case-studio-tab-content .case-studio-body .right .case-studio-contents p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev1_case-studie_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .case-studio-area .case-studio .case-studio-tab-content .case-studio-body .right .case-studio-contents p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'synckpagescsbg_design_option',
            [
                'label'         => esc_html__( 'Case Studie Background Style','synck-core' ),
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
                    '{{WRAPPER}}  .case-studio-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .case-studio-area .case-studio .case-studio-tabs,.case-studio-area .case-studio .case-studio-tab-content .case-studio-body .left,.case-studio-area .case-studio .case-studio-tab-content .case-studio-body .right .case-studio-contents'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev1casestudie_output = $this->get_settings_for_display(); ?>


<!-- Case Studio -->
<section class="case-studio-area">
<div class="custom-container">
<div class="case-studio-header text-center">
 <?php echo($synckhomev1casestudie_output['title_heading']); ?>
</div>

<div class="case-studio">

<ul class="nav nav-pills case-studio-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <button class="nav-link active" id="development-tab" data-bs-toggle="tab" href="#development"
            role="tab" aria-controls="development" aria-selected="true"><?php echo esc_html($synckhomev1casestudie_output['case_studie_tab_title']); ?></button>
    </li>

    <?php if($synckhomev1casestudie_output['case_studie_tab2_switch'] === 'yes') : ?>
    <li class="nav-item">
        <button class="nav-link" id="woo_commerce-tab" data-bs-toggle="tab" href="#woo_commerce" role="tab"
            aria-controls="woo_commerce" aria-selected="false"><?php echo esc_html($synckhomev1casestudie_output['case_studie_tab_title2']); ?></button>
    </li>
    <?php endif;?>

    <?php if($synckhomev1casestudie_output['case_studie_tab3_switch'] === 'yes') : ?>
    <li class="nav-item">
        <button class="nav-link" id="crm_solutions-tab" data-bs-toggle="tab" href="#crm_solutions"
            role="tab" aria-controls="crm_solutions" aria-selected="false"><?php echo esc_html($synckhomev1casestudie_output['case_studie_tab_title3']); ?></button>
    </li>
    <?php endif;?>

    <?php if($synckhomev1casestudie_output['case_studie_tab4_switch'] === 'yes') : ?>
    <li class="nav-item">
        <button class="nav-link" id="web_designing-tab" data-bs-toggle="tab" href="#web_designing"
            role="tab" aria-controls="web_designing" aria-selected="false"><?php echo esc_html($synckhomev1casestudie_output['case_studie_tab_title4']); ?></button>
    </li>
    <?php endif;?>

    <?php if($synckhomev1casestudie_output['case_studie_tab5_switch'] === 'yes') : ?>
    <li class="nav-item">
        <button class="nav-link" id="it_support-tab" data-bs-toggle="tab" href="#it_support" role="tab"
            aria-controls="it_support" aria-selected="false"><?php echo esc_html($synckhomev1casestudie_output['case_studie_tab_title5']); ?></button>
    </li>
    <?php endif;?>
</ul>


<div class="tab-content case-studio-tab-content">

<div class="tab-pane fade show active" id="development" role="tabpanel" aria-labelledby="development-tab">
    <div class="case-studio-body d-flex">
        <div class="left d-flex flex-1">
            <?php if(!empty($synckhomev1casestudie_output['list1'])):
                foreach ($synckhomev1casestudie_output['list1'] as $synckhomev1casestudie_loop):?>
            <div class="case-studio-img-card simple-shadow">
<?php if(!empty($synckhomev1casestudie_loop['case_studie_img_title'] )): ?>
                <a <?php if($synckhomev1casestudie_loop['case_studie_title_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev1casestudie_loop['case_studie_title_link']['url']); ?>" class="case-studio-cat"><?php echo esc_html($synckhomev1casestudie_loop['case_studie_img_title']); ?> </a>
<?php endif;?>
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1casestudie_loop['case_studie_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1casestudie_loop['case_studie_img']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>
            <?php endforeach; endif;?>
        </div>
        <div class="right">
            <div class="case-studio-contents service-card card-h">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1casestudie_output['case_studie_icon_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1casestudie_output['case_studie_icon_img']['id'], '_wp_attachment_image_alt', true); ?>" />
                <h4><?php echo ($synckhomev1casestudie_output['case_studie_title']); ?></h4>
                <p><?php echo ($synckhomev1casestudie_output['case_studie_content']); ?></p>

                <?php if(!empty($synckhomev1casestudie_output['btn_icon'] )): ?>
                <a <?php if($synckhomev1casestudie_output['btn_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev1casestudie_output['btn_link']['url']); ?>" class="theme-btn">
                    <i class="<?php echo esc_attr($synckhomev1casestudie_output['btn_icon']);?>"></i>
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<?php if($synckhomev1casestudie_output['case_studie_tab2_switch']=== 'yes') : ?>
<div class="tab-pane fade" id="woo_commerce" role="tabpanel" aria-labelledby="woo_commerce-tab">
    <div class="case-studio-body d-flex">
        <div class="left d-flex flex-1">
            <?php if(!empty($synckhomev1casestudie_output['list2'])):
                foreach ($synckhomev1casestudie_output['list2'] as $synckhomev1casestudie_loop):?>
            <div class="case-studio-img-card simple-shadow">
<?php if(!empty($synckhomev1casestudie_loop['case_studie_img_title2'] )): ?>
                <a <?php if($synckhomev1casestudie_loop['case_studie_title_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev1casestudie_loop['case_studie_title_link2']['url']); ?>" class="case-studio-cat"><?php echo esc_html($synckhomev1casestudie_loop['case_studie_img_title2']); ?> 
            </a>
<?php endif;?>
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1casestudie_loop['case_studie_img2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1casestudie_loop['case_studie_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>
            <?php endforeach; endif;?>
        </div>
        <div class="right">
            <div class="case-studio-contents service-card card-h">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1casestudie_output['case_studie_icon_img2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1casestudie_output['case_studie_icon_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
                <h4><?php echo ($synckhomev1casestudie_output['case_studie_title2']); ?></h4>
                <p><?php echo ($synckhomev1casestudie_output['case_studie_content2']); ?></p>

                <?php if(!empty($synckhomev1casestudie_output['btn_icon2'] )): ?>
                <a <?php if($synckhomev1casestudie_output['btn_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev1casestudie_output['btn_link2']['url']); ?>" class="theme-btn">
                    <i class="<?php echo esc_attr($synckhomev1casestudie_output['btn_icon2']);?>"></i>
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>

<?php if($synckhomev1casestudie_output['case_studie_tab3_switch']=== 'yes') : ?>
<div class="tab-pane fade" id="crm_solutions" role="tabpanel" aria-labelledby="crm_solutions-tab">
    <div class="case-studio-body d-flex">
        <div class="left d-flex flex-1">
            <?php if(!empty($synckhomev1casestudie_output['list3'])):
                foreach ($synckhomev1casestudie_output['list3'] as $synckhomev1casestudie_loop):?>
            <div class="case-studio-img-card simple-shadow">
<?php if(!empty($synckhomev1casestudie_loop['case_studie_img_title3'] )): ?>
                <a <?php if($synckhomev1casestudie_loop['case_studie_title_link3']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev1casestudie_loop['case_studie_title_link3']['url']); ?>" class="case-studio-cat"><?php echo esc_html($synckhomev1casestudie_loop['case_studie_img_title3']); ?> </a>
<?php endif;?>
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1casestudie_loop['case_studie_img3']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1casestudie_loop['case_studie_img3']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>
            <?php endforeach; endif;?>
        </div>
        <div class="right">
            <div class="case-studio-contents service-card card-h">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1casestudie_output['case_studie_icon_img3']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1casestudie_output['case_studie_icon_img3']['id'], '_wp_attachment_image_alt', true); ?>" />
                <h4><?php echo ($synckhomev1casestudie_output['case_studie_title3']); ?></h4>
                <p><?php echo ($synckhomev1casestudie_output['case_studie_content3']); ?></p>

                <?php if(!empty($synckhomev1casestudie_output['btn_icon3'] )): ?>
                <a <?php if($synckhomev1casestudie_output['btn_link3']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev1casestudie_output['btn_link3']['url']); ?>" class="theme-btn">
                    <i class="<?php echo esc_attr($synckhomev1casestudie_output['btn_icon3']);?>"></i>
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>

<?php if($synckhomev1casestudie_output['case_studie_tab4_switch']=== 'yes') : ?>
<div class="tab-pane fade" id="web_designing" role="tabpanel" aria-labelledby="web_designing-tab">
    <div class="case-studio-body d-flex">
        <div class="left d-flex flex-1">
            <?php if(!empty($synckhomev1casestudie_output['list4'])):
                foreach ($synckhomev1casestudie_output['list4'] as $synckhomev1casestudie_loop):?>
            <div class="case-studio-img-card simple-shadow">
<?php if(!empty($synckhomev1casestudie_loop['case_studie_img_title4'] )): ?>
                <a <?php if($synckhomev1casestudie_loop['case_studie_title_link4']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev1casestudie_loop['case_studie_title_link4']['url']); ?>" class="case-studio-cat"><?php echo esc_html($synckhomev1casestudie_loop['case_studie_img_title4']); ?> </a>
<?php endif;?>
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1casestudie_loop['case_studie_img4']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1casestudie_loop['case_studie_img4']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>
            <?php endforeach; endif;?>
        </div>
        <div class="right">
            <div class="case-studio-contents service-card card-h">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1casestudie_output['case_studie_icon_img4']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1casestudie_output['case_studie_icon_img4']['id'], '_wp_attachment_image_alt', true); ?>" />
                <h4><?php echo ($synckhomev1casestudie_output['case_studie_title4']); ?></h4>
                <p><?php echo ($synckhomev1casestudie_output['case_studie_content4']); ?></p>

                <?php if(!empty($synckhomev1casestudie_output['btn_icon4'] )): ?>
                <a <?php if($synckhomev1casestudie_output['btn_link4']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev1casestudie_output['btn_link4']['url']); ?>" class="theme-btn">
                    <i class="<?php echo esc_attr($synckhomev1casestudie_output['btn_icon4']);?>"></i>
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>

<?php if($synckhomev1casestudie_output['case_studie_tab5_switch']=== 'yes') : ?>
<div class="tab-pane fade" id="it_support" role="tabpanel" aria-labelledby="it_support-tab">
    <div class="case-studio-body d-flex">
        <div class="left d-flex flex-1">
            <?php if(!empty($synckhomev1casestudie_output['list5'])):
                foreach ($synckhomev1casestudie_output['list5'] as $synckhomev1casestudie_loop):?>
            <div class="case-studio-img-card simple-shadow">
<?php if(!empty($synckhomev1casestudie_loop['case_studie_img_title5'] )): ?>
                <a <?php if($synckhomev1casestudie_loop['case_studie_title_link5']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev1casestudie_loop['case_studie_title_link5']['url']); ?>" class="case-studio-cat"><?php echo esc_html($synckhomev1casestudie_loop['case_studie_img_title5']); ?> </a>
<?php endif;?>
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1casestudie_loop['case_studie_img5']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1casestudie_loop['case_studie_img5']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>
            <?php endforeach; endif;?>
        </div>
        <div class="right">
            <div class="case-studio-contents service-card card-h">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev1casestudie_output['case_studie_icon_img5']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev1casestudie_output['case_studie_icon_img5']['id'], '_wp_attachment_image_alt', true); ?>" />
                <h4><?php echo ($synckhomev1casestudie_output['case_studie_title5']); ?></h4>
                <p><?php echo ($synckhomev1casestudie_output['case_studie_content5']); ?></p>
                <?php if(!empty($synckhomev1casestudie_output['btn_icon5'] )): ?>
                <a 
                <?php if($synckhomev1casestudie_output['btn_link5']['is_external'] == true ): ?> target="_blank" <?php endif; ?>href="<?php echo esc_url($synckhomev1casestudie_output['btn_link5']['url']); ?>" class="theme-btn">
                    <i class="<?php echo esc_attr($synckhomev1casestudie_output['btn_icon5']);?>"></i>
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>
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

