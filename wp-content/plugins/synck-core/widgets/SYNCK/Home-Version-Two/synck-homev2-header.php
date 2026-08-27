<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev2header Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev2header_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev2header';
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
        return esc_html__( 'Home V2 Header section', 'synck-core' );
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

        // Header Content Section //

        $this->start_controls_section(
            'section1',
            [
                'label' => esc_html__( 'Header Content section', 'synck-core' ),
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
            'header_logo',
            [
                'label'     => esc_html__( 'Header Logo Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        ); 

        // LINK
        $this->add_control(
            'headerlink_logo',
            [
                'label'         => esc_html__( 'Header Logo Link', 'synck-core' ),
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
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Other Info1', 'synck-core' ),
            ]
        );

        $this->add_control(
            'headerinfo1_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Info1 Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'headerrightbtn1_name', [
                'label'         => esc_html__( 'Header Button Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'headerinfo1_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $this->add_control(
            'headerrightbtn1_link',
            [
                'label'         => esc_html__( 'Header Button Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                'headerinfo1_switcher_options' => 'yes',],
            ]
        );

        $this->add_control( 
            'headerrightbtnicon_name',
            [
                'label'         => esc_html__( 'Header Button Icon Class','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
                'condition'     => [
                'headerinfo1_switcher_options' => 'yes',],
            ]
        );

        $this->add_control(
            'headerrightbtn_title', [
                'label'         => esc_html__( 'Header Button Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'headerinfo1_switcher_options' => 'yes',],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Other Info2', 'synck-core' ),
            ]
        );

        $this->add_control(
            'headerinfo2_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Info2 Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $this->add_control(
            'headerrightbtn_name', [
                'label'         => esc_html__( 'Header Button Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'headerinfo2_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $this->add_control(
            'headerrightbtn_link',
            [
                'label'         => esc_html__( 'Header Button Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                'headerinfo2_switcher_options' => 'yes',],
            ]
        );

        $this->add_control(
            'headerrightbtnresp_name', [
                'label'         => esc_html__( 'Responsive Header Button Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'headerinfo2_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $this->add_control(
            'headerrightbtnresp_link',
            [
                'label'         => esc_html__( 'Responsive Header Button Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                'headerinfo2_switcher_options' => 'yes',],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Menu Starts --1 //

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Menu Style One', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'homemenu_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Menu Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'hmenu_title', [
                'label'         => esc_html__( 'Menu Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'homemenu_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'hmenu_link',
            [
                'label'         => esc_html__( 'Menu Title Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                'homemenu_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'homemenuicon_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Drop-Down Menu', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'home_menuitems',
            [
                'label'         => esc_html__( 'Menu location', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => array_merge(['' => 'No Menu'], get_wordpress_menus()),
                'indent'        => true,
                'default'     => 'header-menu',
                'description'   => esc_html__( 'Navigate to Appearance -> Menus to edit menu items.', 'synck-core' ),
                'condition'     => [
                'homemenuicon_switcher_options' => 'yes',],
            ]
        );

        $this->add_control(
            'list1', //repeater name
            [
                'label'     => esc_html__( 'Menu List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ hmenu_title }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        // Menu Starts --2 //

        $this->start_controls_section(
            'section5',
            [
                'label' => esc_html__( 'Menu Style Two', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'aboutmenu_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Menu Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'aboutmenu_title', [
                'label'         => esc_html__( 'Menu Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'aboutmenu_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'aboutmenu_link',
            [
                'label'         => esc_html__( 'Menu Title Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                'aboutmenu_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'aboutmenuicon_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Drop-Down Menu', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'divider_11',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_12',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'aboutmenuitem_title1', [
                'label'         => esc_html__( 'Menu Item Title 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'about_menuitems1',
            [
                'label'         => esc_html__( 'Menu location', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => array_merge(['' => 'No Menu'], get_wordpress_menus()),
                'indent'        => true,
                'default'     => 'header-menu1',
                'description'   => esc_html__( 'Navigate to Appearance -> Menus to edit menu items.', 'synck-core' ),
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_13',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_14',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'aboutmenuitem_title2', [
                'label'         => esc_html__( 'Menu Item Title 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'about_menuitems2',
            [
                'label'         => esc_html__( 'Menu location', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => array_merge(['' => 'No Menu'], get_wordpress_menus()),
                'indent'        => true,
                'default'     => 'header-menu2',
                'description'   => esc_html__( 'Navigate to Appearance -> Menus to edit menu items.', 'synck-core' ),
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_15',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]

        );

        $repeater->add_control(
            'divider_16',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'aboutmenuitem_title3', [
                'label'         => esc_html__( 'Menu Item Title 3', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'about_menuitems3',
            [
                'label'         => esc_html__( 'Menu location', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => array_merge(['' => 'No Menu'], get_wordpress_menus()),
                'indent'        => true,
                'default'     => 'header-menu3',
                'description'   => esc_html__( 'Navigate to Appearance -> Menus to edit menu items.', 'synck-core' ),
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_17',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]

        );

        $repeater->add_control(
            'divider_18',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'aboutmenuitem_title4', [
                'label'         => esc_html__( 'Menu Item Title 4', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'about_menuitems4',
            [
                'label'         => esc_html__( 'Menu location', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => array_merge(['' => 'No Menu'], get_wordpress_menus()),
                'indent'        => true,
                'default'     => 'header-menu4',
                'description'   => esc_html__( 'Navigate to Appearance -> Menus to edit menu items.', 'synck-core' ),
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_19',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]

        );

        $repeater->add_control(
            'divider_20',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        // Header About Right //

        $repeater->add_control(
            'headeraboutright_switcher',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Right Info Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'headeraboutright_img',
            [
                'label'     => esc_html__( 'Right Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'aboutmenuicon_switcher_options' => 'yes',],
            ]
        ); 

        $repeater->add_control(
            'headeraboutright_title', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'headeraboutright_description', [
                'label'         => esc_html__( 'Description', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => [
                    'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'headeraboutrightbtn_name', [
                'label'         => esc_html__( 'Button Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'headeraboutrightbtn_link',
            [
                'label'         => esc_html__( 'Button Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                    'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_21',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_22',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        // Header About Footer //

        $repeater->add_control(
            'headeraboutmenuf_title', [
                'label'         => esc_html__( 'Menu Footer Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'headeraboutmenufbtn_title', [
                'label'         => esc_html__( 'Menu Footer Button Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'headeraboutmenufbtn_link',
            [
                'label'         => esc_html__( 'Menu Footer Button Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                'aboutmenuicon_switcher_options' => 'yes',],
            ]
        );

        $this->add_control(
            'list4', //repeater name
            [
                'label'     => esc_html__( 'Menu List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ aboutmenu_title }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        // Menu Starts --3 //

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Menu Style Three', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

       // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'servicemenu_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Menu Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'servicemenu_title', [
                'label'         => esc_html__( 'Menu Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'servicemenu_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'servicemenu_link',
            [
                'label'         => esc_html__( 'Menu Title Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                'servicemenu_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'servicemenuicon_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Drop-Down Menu', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'divider_11',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_12',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'servicemenuitem_title1', [
                'label'         => esc_html__( 'Menu Item Title 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'service_menuitems1',
            [
                'label'         => esc_html__( 'Menu location', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => array_merge(['' => 'No Menu'], get_wordpress_menus()),
                'indent'        => true,
                'default'     => 'header-menu5',
                'description'   => esc_html__( 'Navigate to Appearance -> Menus to edit menu items.', 'synck-core' ),
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_13',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_14',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'servicemenuitem_title2', [
                'label'         => esc_html__( 'Menu Item Title 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'service_menuitems2',
            [
                'label'         => esc_html__( 'Menu location', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'options'       => array_merge(['' => 'No Menu'], get_wordpress_menus()),
                'indent'        => true,
                'default'     => 'header-menu6',
                'description'   => esc_html__( 'Navigate to Appearance -> Menus to edit menu items.', 'synck-core' ),
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_15',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]

        );

        $repeater->add_control(
            'divider_16',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'cardcontrols_switcher_options',
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

        // Header Service Card //

        $repeater->add_control(
            'servicemenucard_img1',
            [
                'label'     => esc_html__( 'Card Image 1', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        ); 

        $repeater->add_control(
            'servicemenucard_title1', [
                'label'         => esc_html__( 'Card Title 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'servicemenucard_desc1', [
                'label'         => esc_html__( 'Card Description 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

                // LINK
        $repeater->add_control(
            'servicemenucard_cardlink1',
            [
                'label'         => esc_html__( 'Card Link 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_17',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]

        );

        $repeater->add_control(
            'divider_18',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        // Header Service Card //

        $repeater->add_control(
            'servicemenucard_img2',
            [
                'label'     => esc_html__( 'Card Image 2', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        ); 

        $repeater->add_control(
            'servicemenucard_title2', [
                'label'         => esc_html__( 'Card Title 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'servicemenucard_desc2', [
                'label'         => esc_html__( 'Card Description 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'servicemenucard_cardlink2',
            [
                'label'         => esc_html__( 'Card Link 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_19',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]

        );

        $repeater->add_control(
            'divider_20',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        // Header Service Card //

        $repeater->add_control(
            'servicemenucard_img3',
            [
                'label'     => esc_html__( 'Card Image 3', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        ); 

        $repeater->add_control(
            'servicemenucard_title3', [
                'label'         => esc_html__( 'Card Title 3', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'servicemenucard_desc3', [
                'label'         => esc_html__( 'Card Description 3', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'servicemenucard_cardlink3',
            [
                'label'         => esc_html__( 'Card Link 3', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_21',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]

        );

        $repeater->add_control(
            'divider_22',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        // Header Service Card //

        $repeater->add_control(
            'servicemenucard_img4',
            [
                'label'     => esc_html__( 'Card Image 4', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        ); 

        $repeater->add_control(
            'servicemenucard_title4', [
                'label'         => esc_html__( 'Card Title 4', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'servicemenucard_desc4', [
                'label'         => esc_html__( 'Card Description 4', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'servicemenucard_cardlink4',
            [
                'label'         => esc_html__( 'Card Link 4', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_23',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]

        );

        $repeater->add_control(
            'divider_24',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        // Header Service Right //

        $repeater->add_control(
            'headerserviceright_switcher',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Right Info Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'headerserviceright_img',
            [
                'label'     => esc_html__( 'Right Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        ); 

        $repeater->add_control(
            'headerserviceright_title', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'headerserviceright_description', [
                'label'         => esc_html__( 'Description', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'headerservicerightbtn_name', [
                'label'         => esc_html__( 'Button Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'headerservicerightbtn_link',
            [
                'label'         => esc_html__( 'Button Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                    'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_25',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_26',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        // Header Service Footer //

        $repeater->add_control(
            'headerservicemenuf_title', [
                'label'         => esc_html__( 'Menu Footer Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'headerservicemenufbtn_title', [
                'label'         => esc_html__( 'Menu Footer Button Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'headerservicemenufbtn_link',
            [
                'label'         => esc_html__( 'Menu Footer Button Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                'servicemenuicon_switcher_options' => 'yes',],
            ]
        );

        $this->add_control(
            'list2', //repeater name
            [
                'label'     => esc_html__( 'Menu List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ servicemenu_title }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        // Menu Starts --4 //

        $this->start_controls_section(
            'section4',
            [
                'label' => esc_html__( 'Menu Style Four', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        // Header Portfolio Menu //

        $repeater->add_control(
            'portfmenu_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Menu Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'portfmenu_title', [
                'label'         => esc_html__( 'Menu Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'portfmenu_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'portfmenu_link',
            [
                'label'         => esc_html__( 'Menu Title Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                'portfmenu_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'portfoliomenuicon_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Drop-Down Menu', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'divider_11',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_12',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        // Header Portfolio Card //

        $repeater->add_control(
            'portfmenucard_img1',
            [
                'label'     => esc_html__( 'Card Image 1', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        ); 

        $repeater->add_control(
            'portfmenucard_title1', [
                'label'         => esc_html__( 'Card Title 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'portfmenucard_desc1', [
                'label'         => esc_html__( 'Card Description 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'portfmenucard_cardlink1',
            [
                'label'         => esc_html__( 'Card Link 1', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_13',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_14',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'portfmenucard_img2',
            [
                'label'     => esc_html__( 'Card Image 2', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        ); 

        $repeater->add_control(
            'portfmenucard_title2', [
                'label'         => esc_html__( 'Card Title 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'portfmenucard_desc2', [
                'label'         => esc_html__( 'Card Description 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'portfmenucard_cardlink2',
            [
                'label'         => esc_html__( 'Card Link 2', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_15',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_16',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'portfmenucard_img3',
            [
                'label'     => esc_html__( 'Card Image 3', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        ); 

        $repeater->add_control(
            'portfmenucard_title3', [
                'label'         => esc_html__( 'Card Title 3', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'portfmenucard_desc3', [
                'label'         => esc_html__( 'Card Description 3', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'portfmenucard_cardlink3',
            [
                'label'         => esc_html__( 'Card Link 3', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_17',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_18',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'portfmenucard_img4',
            [
                'label'     => esc_html__( 'Card Image 4', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        ); 

        $repeater->add_control(
            'portfmenucard_title4', [
                'label'         => esc_html__( 'Card Title 4', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'portfmenucard_desc4', [
                'label'         => esc_html__( 'Card Description 4', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'portfmenucard_cardlink4',
            [
                'label'         => esc_html__( 'Card Link 4', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_19',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_20',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        // Header Portfolio Right //

        $repeater->add_control(
            'headerportfright_switcher',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Right Info Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'headerportfright_img',
            [
                'label'     => esc_html__( 'Right Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        ); 

        $repeater->add_control(
            'headerportfright_title', [
                'label'         => esc_html__( 'Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'headerportfright_description', [
                'label'         => esc_html__( 'Description', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'headerportfrightbtn_name', [
                'label'         => esc_html__( 'Button Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'headerportfrightbtn_link',
            [
                'label'         => esc_html__( 'Button Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_21',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control(
            'divider_22',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        // Header Portfolio Footer //

        $repeater->add_control(
            'headerportfmenufbtn_name', [
                'label'         => esc_html__( 'Menu Footer Button Name', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'headerportfmenufbtn_link',
            [
                'label'         => esc_html__( 'Menu Footer Button Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
            ]
        );

        $repeater->add_control( 
            'headerportfmenufbtn_icon',
            [
                'label'         => esc_html__( 'Menu Footer Icon Class','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
                'condition'     => [
                    'portfoliomenuicon_switcher_options' => 'yes',],
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
                'title_field' => '{{{ portfmenu_title }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        // Menu Starts --5 //

        $this->start_controls_section(
            'section6',
            [
                'label' => esc_html__( 'Menu Style Five', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'faqmenu_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Menu Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'fmenu_title', [
                'label'         => esc_html__( 'Menu Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'faqmenu_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'fmenu_link',
            [
                'label'         => esc_html__( 'Menu Title Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                'faqmenu_switcher_options' => 'yes',],
            ]
        );

        $this->add_control(
            'list5', //repeater name
            [
                'label'     => esc_html__( 'Menu List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ fmenu_title }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        // Menu Starts --6 //

        $this->start_controls_section(
            'section7',
            [
                'label' => esc_html__( 'Menu Style Six', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Repeater Start 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'pricingmenu_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Menu Controls', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

        $repeater->add_control(
            'pricingmenu_title', [
                'label'         => esc_html__( 'Menu Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
                'condition'     => [
                'pricingmenu_switcher_options' => 'yes',],
            ]
        );

        // LINK
        $repeater->add_control(
            'pricingmenu_link',
            [
                'label'         => esc_html__( 'Menu Title Link', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'Paste The URL Here.' ),
                'show_external' => true,
                'default'       => [
                    'url'           => '#',
                    'is_external'   => false,
                    'nofollow'      => false,
                ],
                'condition'     => [
                'pricingmenu_switcher_options' => 'yes',],
            ]
        );

        $this->add_control(
            'list6', //repeater name
            [
                'label'     => esc_html__( 'Menu List', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title' => esc_html__( 'Add Features List', 'synck-core' ),
                    ],
                ],
                'title_field' => '{{{ pricingmenu_title }}}', // Reapeter Title 
            ]
        );

        $this->end_controls_section();

        // Social Icon //

        $this->start_controls_section(
            'section8',
            [
                'label' => esc_html__( 'Social Icons', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control( 
            'hedermenusoc_icon1',
            [
                'label'         => esc_html__( 'Social Icon Class Name 1','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hedermenusoc_link1',
            [
                'label'         => esc_html__( 'Social Icon Link 1', 'synck-core' ),
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
            'hedermenusoc_icon2',
            [
                'label'         => esc_html__( 'Social Icon Class Name 2','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hedermenusoc_link2',
            [
                'label'         => esc_html__( 'Social Icon Link 2', 'synck-core' ),
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
            'hedermenusoc_icon3',
            [
                'label'         => esc_html__( 'Social Icon Class Name 3','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hedermenusoc_link3',
            [
                'label'         => esc_html__( 'Social Icon Link 3', 'synck-core' ),
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
            'hedermenusoc_icon4',
            [
                'label'         => esc_html__( 'Social Icon Class Name 4','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'hedermenusoc_link4',
            [
                'label'         => esc_html__( 'Social Icon Link 4', 'synck-core' ),
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

        $this->end_controls_section();

        $this->start_controls_section(
            'section9',
            [
                'label' => esc_html__( 'Language Controls', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'langbtn_switcher_options',
            [
                'type'     => \Elementor\Controls_Manager::SWITCHER,
                'label'    => esc_html__( 'Language Selectors', 'synck-core' ),
                'default'  => 'yes', // Default value is 'true' for showing the menu
                'label_on'      => __( 'Show', 'synck-core' ),
                'label_off'     => __( 'Hide', 'synck-core' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );
        
        $this->add_control(
            'lang_controls', [
                'label'         => esc_html__( 'Language content', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------Header Menu section Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2header_design_option',
            [
                'label'         => esc_html__( 'Header Menu Content Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
               'label' => esc_html__( 'Menu Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'header_menu_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'header_menu_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .header-area .navbar-wrapper ul li a',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab1',
            [
               'label' => esc_html__( 'Menu Item', 'synck-core' ),
            ]
        );

        $this->add_control(
            'header_menu_item_color',
            [
                'label'         => esc_html__( 'Menu Item Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper .mega-menu-link h4'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'header_menu_item_typography',
                'label'         => esc_html__( 'Menu Item Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .header-area .navbar-wrapper .mega-menu-link h4',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Menu location', 'synck-core' ),
            ]
        );

        $this->add_control(
            'header_menu_location_color',
            [
                'label'         => esc_html__( 'location Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper .mega-menu-link ul li a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'header_menu_location',
                'label'         => esc_html__( 'location Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .header-area .navbar-wrapper .mega-menu-link ul li a',
            ]
        );

        //END
        $this->end_controls_tab();        

        $this->end_controls_tabs();       
        $this->end_controls_section();

        /*-----------------------------------------Header Menu Card Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2headercard_design_option',
            [
                'label'         => esc_html__( 'Header Cards Content Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs1'
        );

        $this->start_controls_tab(
            'style_normal_tab4',
            [
               'label' => esc_html__( 'Card Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'header_menu_card_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li .mega-menu.mega-menu-portfolio .mega-menu-inner .mega-menu-portfolio-card h4,
                        .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .mega-menu-service-cards .mega-menu-service-card .content h3'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'header_menu_card_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .header-area .navbar-wrapper ul li .mega-menu.mega-menu-portfolio .mega-menu-inner .mega-menu-portfolio-card h4,
                        .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .mega-menu-service-cards .mega-menu-service-card .content h3',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab5',
            [
               'label' => esc_html__( 'Description', 'synck-core' ),
            ]
        );

        $this->add_control(
            'header_menu_card_desc_color',
            [
                'label'         => esc_html__( 'Description Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li .mega-menu.mega-menu-portfolio .mega-menu-inner p,.header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .mega-menu-service-cards .mega-menu-service-card .content p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'header_menu_card_desc_typography',
                'label'         => esc_html__( 'Description Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .header-area .navbar-wrapper ul li .mega-menu.mega-menu-portfolio .mega-menu-inner p,.header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .mega-menu-service-cards .mega-menu-service-card .content p',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab9',
            [
               'label' => esc_html__( 'Footer', 'synck-core' ),
            ]
        );

        $this->add_control(
            'header_menu_card_footer_color',
            [
                'label'         => esc_html__( 'Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .mega-meu-footer p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'header_menu_card_footerlink_color',
            [
                'label'         => esc_html__( 'Link Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .mega-meu-footer p a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab11',
            [
               'label' => esc_html__( 'Card BG', 'synck-core' ),
            ]
        );
        $this->add_control(
            'section_cardbg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .mega-menu-service-cards .mega-menu-service-card'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );
        $this->add_control(
            'section_cardiconbg_color',
            [
                'label'         => esc_html__( 'Icon Box BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .mega-menu-service-cards .mega-menu-service-card .icon'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs(); 

        $this->end_controls_section();

        /*-----------------------------------------Header section Right Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2headerright_design_option',
            [
                'label'         => esc_html__( 'Header Right Content Style','synck-core' ),
                'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
        'style_tabs2'
        );

        $this->start_controls_tab(
            'style_normal_tab6',
            [
               'label' => esc_html__( 'Right Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'header_right_title_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .right h3'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'header_right_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .right h3',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab7',
            [
               'label' => esc_html__( 'Right Desc', 'synck-core' ),
            ]
        );

        $this->add_control(
            'header_right_item_color',
            [
                'label'         => esc_html__( 'Description Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .right p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'header_right_item_typography',
                'label'         => esc_html__( 'Description Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .right p',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab8',
            [
               'label' => esc_html__( 'Footer Title', 'synck-core' ),
            ]
        );

        $this->add_control(
            'header_footer_title_color',
            [
                'label'         => esc_html__( 'Title Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .right a'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'header_footer_title_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .right a',
            ]
        );

        //END
        $this->end_controls_tab();

        $this->end_controls_tabs();   

        $this->end_controls_section();

        /*-----------------------------------------section BG Content styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2headerbg_design_option',
            [
                'label'         => esc_html__( 'Header Background Section Style','synck-core' ),
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
                'label'         => esc_html__( 'Header Area BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area.header-2'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Header Bar BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-2 .navbar-wrapper'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'section_hammenu_color',
            [
                'label'         => esc_html__( 'Ham menu BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .header-left .menu-bar'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'section_mobmenu_color',
            [
                'label'         => esc_html__( 'Mobile Menu BG Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li .dropdown-menu-item-icon'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->end_controls_tab(); 

        $this->start_controls_tab(
            'style_normal_tab_05',
            [
               'label' => esc_html__( 'Hover Background', 'synck-core' ),
            ]
        );      

        $this->add_control(
            'sectionleft_bg_color',
            [
                'label'         => esc_html__( 'Left Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li:hover > .dropdown-menu,.header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectionright_bg_color',
            [
                'label'         => esc_html__( 'Right Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .header-area .navbar-wrapper ul li .mega-menu .mega-menu-inner .right::before'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev2header_output = $this->get_settings_for_display(); ?>


<!-- Header Menu -->
<header class="header-area header-2">

<div class="custom-container">
<div class="custom-row align-items-center justify-content-between">
<div class="header-left d-flex align-items-center">
<a <?php if($synckhomev2header_output['headerlink_logo']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
href="<?php echo esc_url($synckhomev2header_output['headerlink_logo']['url']); ?>" class="logo">
    <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2header_output['header_logo']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2header_output['header_logo']['id'], '_wp_attachment_image_alt', true); ?>" />
</a>

<div class="header-left-right">
<?php if(!empty($synckhomev2header_output['headerrightbtnresp_name'] )): ?>
    <a <?php if($synckhomev2header_output['headerrightbtnresp_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($synckhomev2header_output['headerrightbtnresp_link']['url']); ?>" class="theme-btn"><?php echo esc_html($synckhomev2header_output['headerrightbtnresp_name']); ?></a>
    <?php endif;?>
<span class="menu-bar">
<i class="las la-bars"></i>
</span>
</div>
<nav class="navbar-wrapper d-flex align-items-center">
<span class="close-menu-bar">
<i class="las la-times"></i>
</span>
<ul>

<?php if(!empty($synckhomev2header_output['list1'])):
                    foreach ($synckhomev2header_output['list1'] as $index => $synckhomev2header_loop):?>
        <?php if ( $synckhomev2header_loop['homemenu_switcher_options'] === 'yes' ) : ?>
        <li class="dropdown-menu-item home-menu" data-menu-index="<?php echo $index; ?>">

            <a <?php if($synckhomev2header_loop['hmenu_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckhomev2header_loop['hmenu_link']['url']); ?>"><?php echo esc_html($synckhomev2header_loop['hmenu_title']); ?></a>

            <span class="dropdown-menu-item-icon">
                <i class="las la-angle-down"></i>
            </span>
            <ul class="dropdown-menu">
                <?php
                if (isset($synckhomev2header_loop['home_menuitems']) && !empty($synckhomev2header_loop['home_menuitems'])) {
                    wp_nav_menu( array(
                        'theme_location'  => $synckhomev2header_loop['home_menuitems'],
                    ) );
                } 
                ?>
            </ul>

        </li>
        <?php endif;?>
        <?php endforeach; endif;?>

<?php if(!empty($synckhomev2header_output['list4'])):
                    foreach ($synckhomev2header_output['list4'] as $index => $synckhomev2headerabout_loop):?>
<?php if ( $synckhomev2headerabout_loop['aboutmenu_switcher_options'] === 'yes' ) : ?>
<li class="mega-menu-item about-menu" data-menu-index="<?php echo $index; ?>">
    <a <?php if($synckhomev2headerabout_loop['aboutmenu_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckhomev2headerabout_loop['aboutmenu_link']['url']); ?>"><?php echo esc_html($synckhomev2headerabout_loop['aboutmenu_title']); ?></a>

            <?php if ( $synckhomev2headerabout_loop['aboutmenuicon_switcher_options'] === 'yes' ) : ?>
    <span class="dropdown-menu-item-icon">
        <i class="las la-angle-down"></i>
    </span>
    <div class="mega-menu mega-menu-about">
        <div class="mega-menu-inner">
            <div class="custom-container d-flex">
                <div class="left">
                    <div class="mega-menu-link-wrap d-flex justify-content-between">
                        <?php if(!empty($synckhomev2headerabout_loop['aboutmenuitem_title1']) || ($synckhomev2headerabout_loop['about_menuitems1']) ): ?>
                        <div class="mega-menu-link">
                            <h4><?php echo esc_html($synckhomev2headerabout_loop['aboutmenuitem_title1']); ?></h4>
                            <ul>
                                <?php
                                    if (isset($synckhomev2headerabout_loop['about_menuitems1']) && !empty($synckhomev2headerabout_loop['about_menuitems1'])) {
                                        wp_nav_menu( array(
                                            'theme_location'  => $synckhomev2headerabout_loop['about_menuitems1'],
                                        ) );
                                    } 
                                    ?>
                            </ul>
                        </div>
                        <?php endif;?>

                        <div class="mega-menu-links d-flex">
                            <div class="mega-menu-link">
                                <h4><?php echo esc_html($synckhomev2headerabout_loop['aboutmenuitem_title2']); ?></h4>
                                <ul>
                                    <?php
                                        if (isset($synckhomev2headerabout_loop['about_menuitems2']) && !empty($synckhomev2headerabout_loop['about_menuitems2'])) {
                                            wp_nav_menu( array(
                                                'theme_location'  => $synckhomev2headerabout_loop['about_menuitems2'],
                                            ) );
                                        } 
                                        ?>
                                </ul>
                            </div>
                            <div class="mega-menu-link">
                                <h4><?php echo esc_html($synckhomev2headerabout_loop['aboutmenuitem_title3']); ?></h4>
                                <ul>
                                    <?php
                                        if (isset($synckhomev2headerabout_loop['about_menuitems3']) && !empty($synckhomev2headerabout_loop['about_menuitems3'])) {
                                            wp_nav_menu( array(
                                                'theme_location'  => $synckhomev2headerabout_loop['about_menuitems3'],
                                            ) );
                                        } 
                                        ?>
                                </ul>
                            </div>
                            <div class="mega-menu-link">
                                <h4><?php echo esc_html($synckhomev2headerabout_loop['aboutmenuitem_title4']); ?></h4>
                                <ul>
                                    <?php
                                        if (isset($synckhomev2headerabout_loop['about_menuitems4']) && !empty($synckhomev2headerabout_loop['about_menuitems4'])) {
                                            wp_nav_menu( array(
                                                'theme_location'  => $synckhomev2headerabout_loop['about_menuitems4'],
                                            ) );
                                        } 
                                        ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div
                        class="mega-meu-footer d-flex align-items-center justify-content-between w-full">
                        <ul class="mega-menu-social d-flex align-items-center">
                            <li><a <?php if ($synckhomev2header_output['hedermenusoc_link1']['is_external'] == true) : ?> target="_blank" <?php endif; ?> href="<?php echo esc_url($synckhomev2header_output['hedermenusoc_link1']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2header_output['hedermenusoc_icon1']); ?>"></i></a></li>

                                    <li><a <?php if ($synckhomev2header_output['hedermenusoc_link2']['is_external'] == true) : ?> target="_blank" <?php endif; ?> href="<?php echo esc_url($synckhomev2header_output['hedermenusoc_link2']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2header_output['hedermenusoc_icon2']); ?>"></i></a></li>

                                    <li><a <?php if ($synckhomev2header_output['hedermenusoc_link3']['is_external'] == true) : ?> target="_blank" <?php endif; ?> href="<?php echo esc_url($synckhomev2header_output['hedermenusoc_link3']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2header_output['hedermenusoc_icon3']); ?>"></i></a></li>

                                    <li><a <?php if ($synckhomev2header_output['hedermenusoc_link4']['is_external'] == true) : ?> target="_blank" <?php endif; ?> href="<?php echo esc_url($synckhomev2header_output['hedermenusoc_link4']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2header_output['hedermenusoc_icon4']); ?>"></i></a></li>
                        </ul>

                        <p><?php echo esc_html($synckhomev2headerabout_loop['headeraboutmenuf_title']); ?> <a <?php if ($synckhomev2headerabout_loop['headeraboutmenufbtn_link']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($synckhomev2headerabout_loop['headeraboutmenufbtn_link']['url']); ?>"><?php echo esc_html($synckhomev2headerabout_loop['headeraboutmenufbtn_title']); ?></a></a></p>
                    </div>
                </div>
                <?php if ( $synckhomev2headerabout_loop['headeraboutright_switcher'] === 'yes' ) : ?>
                <div class="right">
                    <div class="mega-menu-ads">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2headerabout_loop['headeraboutright_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2headerabout_loop['headeraboutright_img']['id'], '_wp_attachment_image_alt', true); ?>" />

                        <h3><?php echo esc_html($synckhomev2headerabout_loop['headeraboutright_title']); ?></h3>
                        <p><?php echo ($synckhomev2headerabout_loop['headeraboutright_description']); ?></p>
                        <a <?php if ($synckhomev2headerabout_loop['headeraboutrightbtn_link']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                        href="<?php echo esc_url($synckhomev2headerabout_loop['headeraboutrightbtn_link']['url']); ?>"><?php echo esc_html($synckhomev2headerabout_loop['headeraboutrightbtn_name']); ?></a>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php endif;?>
</li>
<?php endif;?>
<?php endforeach; endif;?>

<?php if(!empty($synckhomev2header_output['list2'])):
                    foreach ($synckhomev2header_output['list2'] as $index => $synckhomev2headerservice_loop):?>
        <?php if ( $synckhomev2headerservice_loop['servicemenu_switcher_options'] === 'yes' ) : ?>
       <li class="mega-menu-item service-menu" data-menu-index="<?php echo $index; ?>">
            <a <?php if($synckhomev2headerservice_loop['servicemenu_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckhomev2headerservice_loop['servicemenu_link']['url']); ?>"><?php echo esc_html($synckhomev2headerservice_loop['servicemenu_title']); ?></a>

            <?php if ( $synckhomev2headerservice_loop['servicemenuicon_switcher_options'] === 'yes' ) : ?>
            <span class="dropdown-menu-item-icon">
                <i class="las la-angle-down"></i>
            </span>
            <div class="mega-menu mega-menu-service">
                <div class="mega-menu-inner">
                    <div class="custom-container d-flex">
                        <div class="left">
                            <div
                                class="mega-menu-link-wrap d-flex align-items-start justify-content-between">
                                <?php if ( $synckhomev2headerservice_loop['cardcontrols_switcher_options'] === 'yes' ) : ?>
                                <div class="mega-menu-service-cards align-items-start">

                                    <?php if(!empty($synckhomev2headerservice_loop['servicemenucard_title1'] ) || ($synckhomev2headerservice_loop['servicemenucard_desc1'] )  ): ?>
                                    <a <?php if ($synckhomev2headerservice_loop['servicemenucard_cardlink1']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($synckhomev2headerservice_loop['servicemenucard_cardlink1']['url']); ?>">
                                        <div class="mega-menu-service-card">
                                            <span class="icon">
                                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2headerservice_loop['servicemenucard_img1']['id'], 'full' ));?>"
                                                    alt="<?php echo get_post_meta($synckhomev2headerservice_loop['servicemenucard_img1']['id'], '_wp_attachment_image_alt', true); ?>" />
                                            </span>
                                            <div class="content">
                                                <h3><?php echo esc_html($synckhomev2headerservice_loop['servicemenucard_title1']); ?></h3>
                                                <p><?php echo ($synckhomev2headerservice_loop['servicemenucard_desc1']); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endif;?>

                                    <?php if(!empty($synckhomev2headerservice_loop['servicemenucard_title2'] ) || ($synckhomev2headerservice_loop['servicemenucard_desc2'] )  ): ?>
                                    <a <?php if ($synckhomev2headerservice_loop['servicemenucard_cardlink2']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($synckhomev2headerservice_loop['servicemenucard_cardlink2']['url']); ?>">
                                        <div class="mega-menu-service-card">
                                            <span class="icon">
                                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2headerservice_loop['servicemenucard_img2']['id'], 'full' ));?>"
                                                    alt="<?php echo get_post_meta($synckhomev2headerservice_loop['servicemenucard_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
                                            </span>
                                            <div class="content">
                                                <h3><?php echo esc_html($synckhomev2headerservice_loop['servicemenucard_title2']); ?></h3>
                                                <p><?php echo ($synckhomev2headerservice_loop['servicemenucard_desc2']); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endif;?>

                                    <?php if(!empty($synckhomev2headerservice_loop['servicemenucard_title3'] ) || ($synckhomev2headerservice_loop['servicemenucard_desc3'] )  ): ?>
                                    <a <?php if ($synckhomev2headerservice_loop['servicemenucard_cardlink3']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($synckhomev2headerservice_loop['servicemenucard_cardlink3']['url']); ?>">
                                        <div class="mega-menu-service-card">
                                            <span class="icon">
                                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2headerservice_loop['servicemenucard_img3']['id'], 'full' ));?>"
                                                    alt="<?php echo get_post_meta($synckhomev2headerservice_loop['servicemenucard_img3']['id'], '_wp_attachment_image_alt', true); ?>" />
                                            </span>
                                            <div class="content">
                                                <h3><?php echo esc_html($synckhomev2headerservice_loop['servicemenucard_title3']); ?></h3>
                                                <p><?php echo ($synckhomev2headerservice_loop['servicemenucard_desc3']); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endif;?>

                                    <?php if(!empty($synckhomev2headerservice_loop['servicemenucard_title4'] ) || ($synckhomev2headerservice_loop['servicemenucard_desc4'] )  ): ?>
                                    <a <?php if ($synckhomev2headerservice_loop['servicemenucard_cardlink4']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($synckhomev2headerservice_loop['servicemenucard_cardlink4']['url']); ?>">
                                        <div class="mega-menu-service-card">
                                            <span class="icon">
                                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2headerservice_loop['servicemenucard_img4']['id'], 'full' ));?>"
                                                    alt="<?php echo get_post_meta($synckhomev2headerservice_loop['servicemenucard_img4']['id'], '_wp_attachment_image_alt', true); ?>" />
                                            </span>
                                            <div class="content">
                                                <h3><?php echo esc_html($synckhomev2headerservice_loop['servicemenucard_title4']); ?></h3>
                                                <p><?php echo ($synckhomev2headerservice_loop['servicemenucard_desc4']); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endif;?>
                                </div>
                                 <?php endif;?>

                                <div class="mega-menu-links d-flex">
                                    <div class="mega-menu-link">
                                        <h4><?php echo esc_html($synckhomev2headerservice_loop['servicemenuitem_title1']); ?></h4>
                                        <ul>
                                            <?php
                                                if (isset($synckhomev2headerservice_loop['service_menuitems1']) && !empty($synckhomev2headerservice_loop['service_menuitems1'])) {
                                                    wp_nav_menu( array(
                                                        'theme_location'  => $synckhomev2headerservice_loop['service_menuitems1'],
                                                    ) );
                                                } 
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="mega-menu-link">
                                        <h4><?php echo esc_html($synckhomev2headerservice_loop['servicemenuitem_title2']); ?></h4>
                                        <ul>
                                            <?php
                                                if (isset($synckhomev2headerservice_loop['service_menuitems2']) && !empty($synckhomev2headerservice_loop['service_menuitems2'])) {
                                                    wp_nav_menu( array(
                                                        'theme_location'  => $synckhomev2headerservice_loop['service_menuitems2'],
                                                    ) );
                                                } 
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="mega-meu-footer d-flex align-items-center justify-content-between w-full">
                                <ul class="mega-menu-social d-flex align-items-center">
                                    <li><a <?php if ($synckhomev2header_output['hedermenusoc_link1']['is_external'] == true) : ?> target="_blank" <?php endif; ?> href="<?php echo esc_url($synckhomev2header_output['hedermenusoc_link1']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2header_output['hedermenusoc_icon1']); ?>"></i></a></li>

                                    <li><a <?php if ($synckhomev2header_output['hedermenusoc_link2']['is_external'] == true) : ?> target="_blank" <?php endif; ?> href="<?php echo esc_url($synckhomev2header_output['hedermenusoc_link2']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2header_output['hedermenusoc_icon2']); ?>"></i></a></li>

                                    <li><a <?php if ($synckhomev2header_output['hedermenusoc_link3']['is_external'] == true) : ?> target="_blank" <?php endif; ?> href="<?php echo esc_url($synckhomev2header_output['hedermenusoc_link3']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2header_output['hedermenusoc_icon3']); ?>"></i></a></li>

                                    <li><a <?php if ($synckhomev2header_output['hedermenusoc_link4']['is_external'] == true) : ?> target="_blank" <?php endif; ?> href="<?php echo esc_url($synckhomev2header_output['hedermenusoc_link4']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2header_output['hedermenusoc_icon4']); ?>"></i></a></li>
                                </ul>

                                <p><?php echo esc_html($synckhomev2headerservice_loop['headerservicemenuf_title']); ?> <a <?php if ($synckhomev2headerservice_loop['headerservicemenufbtn_link']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($synckhomev2headerservice_loop['headerservicemenufbtn_link']['url']); ?>"><?php echo esc_html($synckhomev2headerservice_loop['headerservicemenufbtn_title']); ?></a></p>
                            </div>
                        </div>
                        <?php if ( $synckhomev2headerservice_loop['headerserviceright_switcher'] === 'yes' ) : ?>
                        <div class="right">
                            <div class="mega-menu-ads">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2headerservice_loop['headerserviceright_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2headerservice_loop['headerserviceright_img']['id'], '_wp_attachment_image_alt', true); ?>" />

                                <h3><?php echo esc_html($synckhomev2headerservice_loop['headerserviceright_title']); ?></h3>
                                <p><?php echo ($synckhomev2headerservice_loop['headerserviceright_description']); ?></p>
                                <a <?php if ($synckhomev2headerservice_loop['headerservicerightbtn_link']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($synckhomev2headerservice_loop['headerservicerightbtn_link']['url']); ?>"><?php echo esc_html($synckhomev2headerservice_loop['headerservicerightbtn_name']); ?></a>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
             <?php endif;?>
        </li>
        <?php endif;?>
        <?php endforeach; endif;?>

<?php if(!empty($synckhomev2header_output['list3'])):
                    foreach ($synckhomev2header_output['list3'] as $index => $synckhomev2headerportf_loop):?>
        <?php if ( $synckhomev2headerportf_loop['portfmenu_switcher_options'] === 'yes' ) : ?>
        <li class="mega-menu-item portfolio-menu" data-menu-index="<?php echo $index; ?>">
            <a <?php if($synckhomev2headerportf_loop['portfmenu_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckhomev2headerportf_loop['portfmenu_link']['url']); ?>"><?php echo esc_html($synckhomev2headerportf_loop['portfmenu_title']); ?></a>

            <?php if ( $synckhomev2headerportf_loop['portfoliomenuicon_switcher_options'] === 'yes' ) : ?>
            <span class="dropdown-menu-item-icon">
                <i class="las la-angle-down"></i>
            </span>
            <div class="mega-menu mega-menu-portfolio">
                <div class="mega-menu-inner">
                    <div class="custom-container d-flex">
                        <div class="left">
                            <div
                                class="mega-menu-link-wrap d-flex align-items-start justify-content-between">

                                <?php if(!empty($synckhomev2headerportf_loop['portfmenucard_title1'] ) || ($synckhomev2headerportf_loop['portfmenucard_desc1'] )  ): ?>
                                <a <?php if ($synckhomev2headerportf_loop['portfmenucard_cardlink1']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($synckhomev2headerportf_loop['portfmenucard_cardlink1']['url']); ?>">
                                    <div class="mega-menu-portfolio-card">
                                        <div class="img-box">
                                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2headerportf_loop['portfmenucard_img1']['id'], 'full' ));?>"
                                                alt="<?php echo get_post_meta($synckhomev2headerportf_loop['portfmenucard_img1']['id'], '_wp_attachment_image_alt', true); ?>" />
                                        </div>
                                        <div class="content-box">
                                            <h4><?php echo esc_html($synckhomev2headerportf_loop['portfmenucard_title1']); ?></h4>
                                            <p><?php echo ($synckhomev2headerportf_loop['portfmenucard_desc1']); ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <?php endif;?>
                                
                                <?php if(!empty($synckhomev2headerportf_loop['portfmenucard_title2'] ) || ($synckhomev2headerportf_loop['portfmenucard_desc2'] )  ): ?>
                                <a <?php if ($synckhomev2headerportf_loop['portfmenucard_cardlink2']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($synckhomev2headerportf_loop['portfmenucard_cardlink2']['url']); ?>">
                                    <div class="mega-menu-portfolio-card">
                                        <div class="img-box">
                                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2headerportf_loop['portfmenucard_img2']['id'], 'full' ));?>"
                                                alt="<?php echo get_post_meta($synckhomev2headerportf_loop['portfmenucard_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
                                        </div>
                                        <div class="content-box">
                                            <h4><?php echo esc_html($synckhomev2headerportf_loop['portfmenucard_title2']); ?></h4>
                                            <p><?php echo ($synckhomev2headerportf_loop['portfmenucard_desc2']); ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <?php endif;?>

                                <?php if(!empty($synckhomev2headerportf_loop['portfmenucard_title3'] ) || ($synckhomev2headerportf_loop['portfmenucard_desc3'] )  ): ?>
                                <a <?php if ($synckhomev2headerportf_loop['portfmenucard_cardlink3']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($synckhomev2headerportf_loop['portfmenucard_cardlink3']['url']); ?>">
                                    <div class="mega-menu-portfolio-card">
                                        <div class="img-box">
                                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2headerportf_loop['portfmenucard_img3']['id'], 'full' ));?>"
                                                alt="<?php echo get_post_meta($synckhomev2headerportf_loop['portfmenucard_img3']['id'], '_wp_attachment_image_alt', true); ?>" />
                                        </div>
                                        <div class="content-box">
                                            <h4><?php echo esc_html($synckhomev2headerportf_loop['portfmenucard_title3']); ?></h4>
                                            <p><?php echo ($synckhomev2headerportf_loop['portfmenucard_desc3']); ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <?php endif;?>

                                <?php if(!empty($synckhomev2headerportf_loop['portfmenucard_title4'] ) || ($synckhomev2headerportf_loop['portfmenucard_desc4'] )  ): ?>
                                <a <?php if ($synckhomev2headerportf_loop['portfmenucard_cardlink4']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($synckhomev2headerportf_loop['portfmenucard_cardlink4']['url']); ?>">
                                    <div class="mega-menu-portfolio-card">
                                        <div class="img-box">
                                            <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2headerportf_loop['portfmenucard_img4']['id'], 'full' ));?>"
                                                alt="<?php echo get_post_meta($synckhomev2headerportf_loop['portfmenucard_img4']['id'], '_wp_attachment_image_alt', true); ?>" />
                                        </div>
                                        <div class="content-box">
                                            <h4><?php echo esc_html($synckhomev2headerportf_loop['portfmenucard_title4']); ?></h4>
                                            <p><?php echo ($synckhomev2headerportf_loop['portfmenucard_desc4']); ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <?php endif;?>
                            </div>

                            <div
                                class="mega-meu-footer d-flex align-items-center justify-content-between w-full">
                                <ul class="mega-menu-social d-flex align-items-center">
                                    <li><a <?php if ($synckhomev2header_output['hedermenusoc_link1']['is_external'] == true) : ?> target="_blank" <?php endif; ?> href="<?php echo esc_url($synckhomev2header_output['hedermenusoc_link1']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2header_output['hedermenusoc_icon1']); ?>"></i></a></li>

                                    <li><a <?php if ($synckhomev2header_output['hedermenusoc_link2']['is_external'] == true) : ?> target="_blank" <?php endif; ?> href="<?php echo esc_url($synckhomev2header_output['hedermenusoc_link2']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2header_output['hedermenusoc_icon2']); ?>"></i></a></li>

                                    <li><a <?php if ($synckhomev2header_output['hedermenusoc_link3']['is_external'] == true) : ?> target="_blank" <?php endif; ?> href="<?php echo esc_url($synckhomev2header_output['hedermenusoc_link3']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2header_output['hedermenusoc_icon3']); ?>"></i></a></li>

                                    <li><a <?php if ($synckhomev2header_output['hedermenusoc_link4']['is_external'] == true) : ?> target="_blank" <?php endif; ?> href="<?php echo esc_url($synckhomev2header_output['hedermenusoc_link4']['url']); ?>"><i class="<?php echo esc_attr($synckhomev2header_output['hedermenusoc_icon4']); ?>"></i></a></li>
                                </ul>
                                <p>
                                    <a <?php if ($synckhomev2headerportf_loop['headerportfmenufbtn_link']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                    href="<?php echo esc_url($synckhomev2headerportf_loop['headerportfmenufbtn_link']['url']); ?>"><?php echo esc_html($synckhomev2headerportf_loop['headerportfmenufbtn_name']); ?> <i
                                            class="<?php echo esc_attr($synckhomev2headerportf_loop['headerportfmenufbtn_icon']); ?>"></i></a>
                                </p>
                            </div>
                        </div>
                        <?php if ( $synckhomev2headerportf_loop['headerportfright_switcher'] === 'yes' ) : ?>
                        <div class="right">
                            <div class="mega-menu-ads">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2headerportf_loop['headerportfright_img']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2headerportf_loop['headerportfright_img']['id'], '_wp_attachment_image_alt', true); ?>" />

                                <h3><?php echo esc_html($synckhomev2headerportf_loop['headerportfright_title']); ?></h3>
                                <p><?php echo ($synckhomev2headerportf_loop['headerportfright_description']); ?></p>
                                <a <?php if ($synckhomev2headerportf_loop['headerportfrightbtn_link']['is_external'] == true) : ?> target="_blank" <?php endif; ?>
                                href="<?php echo esc_url($synckhomev2headerportf_loop['headerportfrightbtn_link']['url']); ?>"><?php echo esc_html($synckhomev2headerportf_loop['headerportfrightbtn_name']); ?></a>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
             <?php endif;?>
        </li>
        <?php endif;?>
        <?php endforeach; endif;?>

<?php if(!empty($synckhomev2header_output['list5'])):
                    foreach ($synckhomev2header_output['list5'] as $synckhomev2headerfaq_loop):?>
        <?php if ( $synckhomev2headerfaq_loop['faqmenu_switcher_options'] === 'yes' ) : ?>
        <li>
            <a <?php if($synckhomev2headerfaq_loop['fmenu_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckhomev2headerfaq_loop['fmenu_link']['url']); ?>"><?php echo esc_html($synckhomev2headerfaq_loop['fmenu_title']); ?></a>
        </li>
        <?php endif;?>
        <?php endforeach; endif;?>

<?php if(!empty($synckhomev2header_output['list6'])):
                    foreach ($synckhomev2header_output['list6'] as $synckhomev2headerpricing_loop):?>
        <?php if ( $synckhomev2headerpricing_loop['pricingmenu_switcher_options'] === 'yes' ) : ?>
        <li>
            <a <?php if($synckhomev2headerpricing_loop['pricingmenu_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
            href="<?php echo esc_url($synckhomev2headerpricing_loop['pricingmenu_link']['url']); ?>"><?php echo esc_html($synckhomev2headerpricing_loop['pricingmenu_title']); ?></a>
        </li>
        <?php endif;?>
        <?php endforeach; endif;?>

</ul>

<?php if ( $synckhomev2header_output['langbtn_switcher_options'] === 'yes' ) : ?>

 <?php echo ($synckhomev2header_output['lang_controls']); ?>

<?php endif;?>

</nav>
</div>

<div class="header-right">
<div class="header-contact-info d-flex align-items-center">

<?php if ( $synckhomev2header_output['headerinfo1_switcher_options'] === 'yes' ) : ?>
<div class="phone-number">
        <a <?php if($synckhomev2header_output['headerrightbtn1_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
        href="<?php echo esc_url($synckhomev2header_output['headerrightbtn1_link']['url']); ?>">
            <?php echo esc_html($synckhomev2header_output['headerrightbtn1_name']); ?>
            <i class="<?php echo esc_attr($synckhomev2header_output['headerrightbtnicon_name']); ?>"></i>
        </a>
        <?php echo esc_html($synckhomev2header_output['headerrightbtn_title']); ?>
</div>
<?php endif;?>

    <?php if(!empty($synckhomev2header_output['headerrightbtn_name'] )): ?>
    <?php if ( $synckhomev2header_output['headerinfo2_switcher_options'] === 'yes' ) : ?>
    <a <?php if($synckhomev2header_output['headerrightbtn_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
    href="<?php echo esc_url($synckhomev2header_output['headerrightbtn_link']['url']); ?>" class="theme-btn"><?php echo esc_html($synckhomev2header_output['headerrightbtn_name']); ?></a>
    <?php endif;?>
    <?php endif;?>

</div>
</div>
</div>
</div>

</header>


<style>
    /*   Home */
    <?php foreach ($synckhomev2header_output['list1'] as $index => $synckhomev2header_loop): ?>
        <?php if ($synckhomev2header_loop['homemenuicon_switcher_options'] === 'yes') : ?>
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].dropdown-menu-item.home-menu > a:after {
        content: '';
    }
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].dropdown-menu-item.home-menu .mega-menu .mega-menu-inner{
        display: block;
    }
    <?php else : ?>
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].dropdown-menu-item.home-menu .dropdown-menu {
        display: none;
    }
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].dropdown-menu-item.home-menu .dropdown-menu-item-icon,
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].dropdown-menu-item.home-menu .mega-menu .mega-menu-inner{
        display: none;
    }
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].dropdown-menu-item.home-menu a {
        padding-right: 0px;
    }
    <?php endif; ?>
    <?php endforeach; ?>

    /*   Services */
    <?php foreach ($synckhomev2header_output['list2'] as $index => $synckhomev2headerservice_loop): ?>
        <?php if ($synckhomev2headerservice_loop['servicemenuicon_switcher_options'] === 'yes') : ?>
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].mega-menu-item.service-menu > a:after {
        content: '';
    }
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].service-menu .mega-menu .mega-menu-inner{
        display: block;
    }
    <?php else : ?>
    .header-area .navbar-wrapper ul > li[data-menu-index="<?php echo $index; ?>"]:hover > .mega-menu-service {
        visibility: hidden;
    }
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].service-menu .dropdown-menu-item-icon,
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].service-menu .mega-menu .mega-menu-inner{
        display: none;
    }
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].mega-menu-item.service-menu a {
        padding-right: 0px;
    }
    .header-area .navbar-wrapper ul > li.mega-menu-item.service-menu.active{
        padding-bottom: 0px;
        padding-top: 0px;
    }
    <?php endif; ?>
    <?php endforeach; ?>

    /*   Portfolio */
    <?php foreach ($synckhomev2header_output['list3'] as $index => $synckhomev2headerportf_loop): ?>
        <?php if ($synckhomev2headerportf_loop['portfoliomenuicon_switcher_options'] === 'yes') : ?>
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].mega-menu-item.portfolio-menu > a:after {
        content: '';
    }
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].portfolio-menu .mega-menu .mega-menu-inner{
        display: block;
    }
    <?php else : ?>
    .header-area .navbar-wrapper ul > li[data-menu-index="<?php echo $index; ?>"]:hover > .mega-menu-portfolio {
        visibility: hidden;
    }
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].portfolio-menu .dropdown-menu-item-icon,
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].portfolio-menu .mega-menu .mega-menu-inner{
        display: none;
    }
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].mega-menu-item.portfolio-menu a {
        padding-right: 0px;
    }
    .header-area .navbar-wrapper ul > li.mega-menu-item.portfolio-menu.active{
        padding-bottom: 0px;
        padding-top: 0px;
    }
    <?php endif; ?>
    <?php endforeach; ?>

    /*   About */
    <?php foreach ($synckhomev2header_output['list4'] as $index => $synckhomev2headerabout_loop): ?>
        <?php if ($synckhomev2headerabout_loop['aboutmenuicon_switcher_options'] === 'yes') : ?>
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].mega-menu-item.about-menu > a:after {
        content: '';
    }
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].about-menu .mega-menu .mega-menu-inner{
        display: block;
    }
    <?php else : ?>
    .header-area .navbar-wrapper ul > li[data-menu-index="<?php echo $index; ?>"]:hover > .mega-menu-about {
        visibility: hidden;
    }
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].about-menu .dropdown-menu-item-icon,
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].about-menu .mega-menu .mega-menu-inner{
        display: none;
    }
    .header-area .navbar-wrapper ul li[data-menu-index="<?php echo $index; ?>"].mega-menu-item.about-menu a {
        padding-right: 0px;
    }
    .header-area .navbar-wrapper ul > li.mega-menu-item.about-menu.active{
        padding-bottom: 0px;
        padding-top: 0px;
    }
    <?php endif; ?>
    <?php endforeach; ?>
</style>




    <?php }
}

