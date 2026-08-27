<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor synck synckhomev2about Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_synck_synckhomev2about_Widget extends \Elementor\Widget_Base {

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
        return 'synckhomev2about';
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
        return esc_html__( 'Home V2 About Section', 'synck-core' );
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
                'label' => esc_html__( 'About Header Section', 'synck-core' ),
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

        $this->end_controls_section();

        //Tabs Section--1

        $this->start_controls_section(
            'section2',
            [
                'label' => esc_html__( 'Business Strategy Tabs', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'about_tab_title1', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_title_img1',
            [
                'label'     => esc_html__( 'Tab Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        
        $this->start_controls_tabs(
        'style_tabs1'
        );

        $this->start_controls_tab(
            'style_normal_tab1',
            [
               'label' => esc_html__( 'Left Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_tab_left_img1',
            [
                'label'     => esc_html__( 'Left Side Panel Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab2',
            [
               'label' => esc_html__( 'Right Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_right_tab_title1', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_right_title_img1',
            [
                'label'     => esc_html__( 'Right Side Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control( 
            'about_right_tab_content',
            [
                'label'         => esc_html__( 'Right Panel Content Box','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'about_right_tab_btn_icon',
            [
                'label'         => esc_html__( 'Right Panel Button Icon Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'about_right_tab_btn_link',
            [
                'label'         => esc_html__( 'Right Panel Button Link', 'synck-core' ),
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

        //END

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

         //Tabs Section--2

        $this->start_controls_section(
            'section3',
            [
                'label' => esc_html__( 'Market Analysis Tabs', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'about_tab_title2', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_title_img2',
            [
                'label'     => esc_html__( 'Tab Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->start_controls_tabs(
        'style_tabs2'
        );

        $this->start_controls_tab(
            'style_normal_tab3',
            [
               'label' => esc_html__( 'Left Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_tab_left_img2',
            [
                'label'     => esc_html__( 'Left Side Panel Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab4',
            [
               'label' => esc_html__( 'Right Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_right_tab_title2', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_right_title_img2',
            [
                'label'     => esc_html__( 'Right Side Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control( 
            'about_right_tab_content2',
            [
                'label'         => esc_html__( 'Right Panel Content Box','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'about_right_tab_btn_icon2',
            [
                'label'         => esc_html__( 'Right Panel Button Icon Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'about_right_tab_btn_link2',
            [
                'label'         => esc_html__( 'Right Panel Button Link', 'synck-core' ),
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

        //END

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Tabs Section--3

        $this->start_controls_section(
            'section4',
            [
                'label' => esc_html__( 'Process Optimization Tabs', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'about_tab_title3', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_title_img3',
            [
                'label'     => esc_html__( 'Tab Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->start_controls_tabs(
        'style_tabs3'
        );

        $this->start_controls_tab(
            'style_normal_tab5',
            [
               'label' => esc_html__( 'Left Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_tab_left_img3',
            [
                'label'     => esc_html__( 'Left Side Panel Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab6',
            [
               'label' => esc_html__( 'Right Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_right_tab_title3', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_right_title_img3',
            [
                'label'     => esc_html__( 'Right Side Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control( 
            'about_right_tab_content3',
            [
                'label'         => esc_html__( 'Right Panel Content Box','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'about_right_tab_btn_icon3',
            [
                'label'         => esc_html__( 'Right Panel Button Icon Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'about_right_tab_btn_link3',
            [
                'label'         => esc_html__( 'Right Panel Button Link', 'synck-core' ),
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

        //END

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Tabs Section--4

        $this->start_controls_section(
            'section5',
            [
                'label' => esc_html__( 'Performance Improvement Tabs', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'about_tab_title4', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_title_img4',
            [
                'label'     => esc_html__( 'Tab Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->start_controls_tabs(
        'style_tabs4'
        );

        $this->start_controls_tab(
            'style_normal_tab7',
            [
               'label' => esc_html__( 'Left Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_tab_left_img4',
            [
                'label'     => esc_html__( 'Left Side Panel Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab8',
            [
               'label' => esc_html__( 'Right Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_right_tab_title4', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_right_title_img4',
            [
                'label'     => esc_html__( 'Right Side Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control( 
            'about_right_tab_content4',
            [
                'label'         => esc_html__( 'Right Panel Content Box','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'about_right_tab_btn_icon4',
            [
                'label'         => esc_html__( 'Right Panel Button Icon Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'about_right_tab_btn_link4',
            [
                'label'         => esc_html__( 'Right Panel Button Link', 'synck-core' ),
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

        //END

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Tabs Section--5

        $this->start_controls_section(
            'section6',
            [
                'label' => esc_html__( 'Entrepreneurial Guidance Tabs', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'about_tab_title5', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_title_img5',
            [
                'label'     => esc_html__( 'Tab Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->start_controls_tabs(
        'style_tabs5'
        );

        $this->start_controls_tab(
            'style_normal_tab9',
            [
               'label' => esc_html__( 'Left Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_tab_left_img5',
            [
                'label'     => esc_html__( 'Left Side Panel Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab10',
            [
               'label' => esc_html__( 'Right Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_right_tab_title5', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_right_title_img5',
            [
                'label'     => esc_html__( 'Right Side Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control( 
            'about_right_tab_content5',
            [
                'label'         => esc_html__( 'Right Panel Content Box','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'about_right_tab_btn_icon5',
            [
                'label'         => esc_html__( 'Right Panel Button Icon Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'about_right_tab_btn_link5',
            [
                'label'         => esc_html__( 'Right Panel Button Link', 'synck-core' ),
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

        //END

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Tabs Section--6

        $this->start_controls_section(
            'section7',
            [
                'label' => esc_html__( 'Organizational Excellence Tabs', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'about_tab_title6', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_title_img6',
            [
                'label'     => esc_html__( 'Tab Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->start_controls_tabs(
        'style_tabs6'
        );

        $this->start_controls_tab(
            'style_normal_tab11',
            [
               'label' => esc_html__( 'Left Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_tab_left_img6',
            [
                'label'     => esc_html__( 'Left Side Panel Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab12',
            [
               'label' => esc_html__( 'Right Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_right_tab_title6', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_right_title_img6',
            [
                'label'     => esc_html__( 'Right Side Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control( 
            'about_right_tab_content6',
            [
                'label'         => esc_html__( 'Right Panel Content Box','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'about_right_tab_btn_icon6',
            [
                'label'         => esc_html__( 'Right Panel Button Icon Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'about_right_tab_btn_link6',
            [
                'label'         => esc_html__( 'Right Panel Button Link', 'synck-core' ),
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

        //END

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        //Tabs Section--7

        $this->start_controls_section(
            'section8',
            [
                'label' => esc_html__( 'Market Research Tabs', 'synck-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'about_tab_title7', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_title_img7',
            [
                'label'     => esc_html__( 'Tab Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->start_controls_tabs(
        'style_tabs7'
        );

        $this->start_controls_tab(
            'style_normal_tab13',
            [
               'label' => esc_html__( 'Left Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_tab_left_img7',
            [
                'label'     => esc_html__( 'Left Side Panel Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab14',
            [
               'label' => esc_html__( 'Right Panel', 'synck-core' ),
            ]
        );

        $this->add_control(
            'about_right_tab_title7', [
                'label'         => esc_html__( 'Tab Title', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'about_tab_right_title_img7',
            [
                'label'     => esc_html__( 'Right Side Title Image', 'synck-core' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control( 
            'about_right_tab_content7',
            [
                'label'         => esc_html__( 'Right Panel Content Box','synck-core' ),
                'type'          => \Elementor\Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->add_control( 
            'about_right_tab_btn_icon7',
            [
                'label'         => esc_html__( 'Right Panel Button Icon Class Name','synck-core' ),
                'description'   => sprintf(
                    esc_html__( 'Paste Iconoir-Icon Class. For more icons, visit %s.', 'synck-core' ),
                    '<a href="https://iconoir.com/" target="_blank">icons pack</a>'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        // LINK
        $this->add_control(
            'about_right_tab_btn_link7',
            [
                'label'         => esc_html__( 'Right Panel Button Link', 'synck-core' ),
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

        //END

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /*-----------------------------------------Home V2 AboutTabs section styling------------------------------------*/

        //START

        $this->start_controls_section(
            'synckhomev2abouttabs_design_option',
            [
                'label'         => esc_html__( 'About Tabs Section Style','synck-core' ),
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
            'homev2_about_tabs_title_color',
            [
                'label'         => esc_html__( 'Tab Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .about2-tabs .nav-item button'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_about_tabs_title_typography',
                'label'         => esc_html__( 'Tab Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about2-tabs .nav-item button',
            ]
        );

        $this->add_responsive_control(
            'homev2_about_tabs_title_margin',
            [
                'label'         => __( 'Tab Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about2-tabs .nav-item button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_about_tabs_title_padding',
            [
                'label'         => __( 'Tab Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about2-tabs .nav-item button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'homev2_about_tabs_titlebg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about2-tabs .nav-item button'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'homev2_about_tabs_iconbg_color',
            [
                'label'         => esc_html__( 'Image Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about2-tabs .nav-item button .icon'=> 'background: {{VALUE}} !important;',
                ],

            ]
        );

        //END
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_2',
            [
               'label' => esc_html__( 'Title text', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_about_tabs_title1_color',
            [
                'label'         => esc_html__( 'Title Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about2-tab-content .about2-tab-content-body .content-box h2'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_about_tabs_title1_typography',
                'label'         => esc_html__( 'Title Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about2-tab-content .about2-tab-content-body .content-box h2',
            ]
        );

        $this->add_responsive_control(
            'homev2_about_tabs_title1_margin',
            [
                'label'         => __( 'Title Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about2-tab-content .about2-tab-content-body .content-box h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_about_tabs_title1_padding',
            [
                'label'         => __( 'Title Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about2-tab-content .about2-tab-content-body .content-box h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_normal_tab_3',
            [
               'label' => esc_html__( 'Content Box', 'synck-core' ),
            ]
        );

        $this->add_control(
            'homev2_about_tabs_content_color',
            [
                'label'         => esc_html__( 'Content Text Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about2-tab-content .about2-tab-content-body .content-box .content p'=> 'color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'          => 'homev2_about_tabs_content_typography',
                'label'         => esc_html__( 'Content Typography', 'synck-core' ),
                'selector'      => 
                    '{{WRAPPER}} .about2-tab-content .about2-tab-content-body .content-box .content p',
            ]
        );

        $this->add_responsive_control(
            'homev2_about_tabs_content_margin',
            [
                'label'         => __( 'Content Margin', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about2-tab-content .about2-tab-content-body .content-box .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'homev2_about_tabs_content_padding',
            [
                'label'         => __( 'Content Padding', 'synck-core' ),
                'type'          => elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .about2-tab-content .about2-tab-content-body .content-box .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'homev2_about_content_iconbg_color',
            [
                'label'         => esc_html__( 'Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about2-tab-content .about2-tab-content-body .content-box .content,.about2-tab-content .about2-tab-content-body .content-box h2'=> 'background: {{VALUE}} !important;',
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
            'synckhomev2aboutbg_design_option',
            [
                'label'         => esc_html__( 'About Background Section Style','synck-core' ),
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
                    '{{WRAPPER}}  .about2-area'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectioncard_bg_color',
            [
                'label'         => esc_html__( 'Card Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about2-area .about2-inner-box'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectiontab_bg_color',
            [
                'label'         => esc_html__( 'Tabs Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about2-tabs .nav-item button,.about2-tab-content .about2-tab-content-body .img-box,.about2-tab-content .about2-tab-content-body .content-box'=> 'background-color: {{VALUE}} !important;',
                ],

            ]
        );

        $this->add_control(
            'sectiontab2_bg_color',
            [
                'label'         => esc_html__( 'Tab2 Background Color', 'synck-core' ),
                'type'          => \Elementor\Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}}  .about2-tab-content .about2-tab-content-body .content-box h2,.about2-tab-content .about2-tab-content-body .content-box .content'=> 'background-color: {{VALUE}} !important;',
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

        $synckhomev2about_output = $this->get_settings_for_display(); ?>


<!-- Home V2 About Section -->

<section class="about2-area">
<div class="custom-container">
<div class="about2-inner-box">

<div class="about2-header">
    <?php echo ($synckhomev2about_output['header_title_heading']); ?>
</div>

<ul class="nav nav-tabs about2-tabs" role="tablist">

    <?php if(!empty($synckhomev2about_output['about_tab_title1'] )): ?>
    <li class="nav-item">
        <button class="nav-link active" id="business_strategy-tab" data-bs-toggle="tab" href="#business_strategy"
            role="tab" aria-controls="business_strategy" aria-selected="true">
            <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_title_img1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_title_img1']['id'], '_wp_attachment_image_alt', true); ?>" /></span> <?php echo esc_html($synckhomev2about_output['about_tab_title1']); ?>
        </button>
    </li>
    <?php endif;?>

    <?php if(!empty($synckhomev2about_output['about_tab_title2'] )): ?>
    <li class="nav-item">
        <button class="nav-link" id="market_analysis-tab" data-bs-toggle="tab" href="#market_analysis" role="tab"
            aria-controls="market_analysis" aria-selected="false">
            <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_title_img2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_title_img2']['id'], '_wp_attachment_image_alt', true); ?>"/></span> <?php echo esc_html($synckhomev2about_output['about_tab_title2']); ?>
        </button>
    </li>
    <?php endif;?>

    <?php if(!empty($synckhomev2about_output['about_tab_title3'] )): ?>
    <li class="nav-item">
        <button class="nav-link" id="process_optimation-tab" data-bs-toggle="tab" href="#process_optimation" role="tab"
            aria-controls="process_optimation" aria-selected="false">
            <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_title_img3']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_title_img3']['id'], '_wp_attachment_image_alt', true); ?>"/></span> <?php echo esc_html($synckhomev2about_output['about_tab_title3']); ?>
        </button>
    </li>
    <?php endif;?>

    <?php if(!empty($synckhomev2about_output['about_tab_title4'] )): ?>
    <li class="nav-item">
        <button class="nav-link" id="performance_improvement-tab" data-bs-toggle="tab" href="#performance_improvement" role="tab"
            aria-controls="performance_improvement" aria-selected="false">
            <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_title_img4']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_title_img4']['id'], '_wp_attachment_image_alt', true); ?>"/></span> <?php echo esc_html($synckhomev2about_output['about_tab_title4']); ?>
        </button>
    </li>
    <?php endif;?>

    <?php if(!empty($synckhomev2about_output['about_tab_title5'] )): ?>
    <li class="nav-item">
        <button class="nav-link" id="entrepreneurial_guidance-tab" data-bs-toggle="tab" href="#entrepreneurial_guidance" role="tab"
            aria-controls="entrepreneurial_guidance" aria-selected="false">
            <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_title_img5']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_title_img5']['id'], '_wp_attachment_image_alt', true); ?>"/></span> <?php echo esc_html($synckhomev2about_output['about_tab_title5']); ?>
        </button>
    </li>
    <?php endif;?>

    <?php if(!empty($synckhomev2about_output['about_tab_title6'] )): ?>
    <li class="nav-item">
        <button class="nav-link" id="organizational_excellence-tab" data-bs-toggle="tab" href="#organizational_excellence" role="tab"
            aria-controls="organizational_excellence" aria-selected="false">
            <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_title_img6']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_title_img6']['id'], '_wp_attachment_image_alt', true); ?>"/></span> <?php echo esc_html($synckhomev2about_output['about_tab_title6']); ?>
        </button>
    </li>
    <?php endif;?>

    <?php if(!empty($synckhomev2about_output['about_tab_title7'] )): ?>
    <li class="nav-item">
        <button class="nav-link" id="market_research-tab" data-bs-toggle="tab" href="#market_research" role="tab"
            aria-controls="market_research" aria-selected="false">
            <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_title_img7']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_title_img7']['id'], '_wp_attachment_image_alt', true); ?>"/></span> <?php echo esc_html($synckhomev2about_output['about_tab_title7']); ?>
        </button>
    </li>
    <?php endif;?>
</ul>


<div class="tab-content about2-tab-content">

    <div class="tab-pane fade show active" id="business_strategy" role="tabpanel" aria-labelledby="business_strategy-tab">
        <div class="about2-tab-content-body d-flex gap-24">
            <div class="img-box">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_left_img1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_left_img1']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>

            <div class="content-box card-h">
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

                <h2>
                    <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_right_title_img1']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_right_title_img1']['id'], '_wp_attachment_image_alt', true); ?>"/></span> <?php echo esc_html($synckhomev2about_output['about_right_tab_title1']); ?>
                </h2>
                <div class="content">
                    <?php echo ($synckhomev2about_output['about_right_tab_content']); ?>
                </div>
                <?php if(!empty($synckhomev2about_output['about_right_tab_btn_icon'] )): ?>
                <a 
                <?php if($synckhomev2about_output['about_right_tab_btn_link']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev2about_output['about_right_tab_btn_link']['url']); ?>" class="theme-btn">
                    <i class="<?php echo esc_attr($synckhomev2about_output['about_right_tab_btn_icon']);?>"></i> 
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="market_analysis" role="tabpanel" aria-labelledby="market_analysis-tab">
        <div class="about2-tab-content-body d-flex gap-24">
            <div class="img-box">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_left_img2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_left_img2']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>

            <div class="content-box card-h">
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

                <h2>
                    <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_right_title_img2']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_right_title_img2']['id'], '_wp_attachment_image_alt', true); ?>" /></span> <?php echo esc_html($synckhomev2about_output['about_right_tab_title2']); ?>
                </h2>
                <div class="content">
                    <?php echo ($synckhomev2about_output['about_right_tab_content2']); ?>
                </div>
<?php if(!empty($synckhomev2about_output['about_right_tab_btn_icon2'] )): ?>
                <a <?php if($synckhomev2about_output['about_right_tab_btn_link2']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev2about_output['about_right_tab_btn_link2']['url']); ?>" class="theme-btn">
                    <i class="<?php echo esc_attr($synckhomev2about_output['about_right_tab_btn_icon2']);?>"></i> 
                </a>
                <?php endif;?>
            </div>
        </div>

    </div>
    
    <div class="tab-pane fade" id="process_optimation" role="tabpanel" aria-labelledby="process_optimation-tab">
        <div class="about2-tab-content-body d-flex gap-24">
            <div class="img-box">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_left_img3']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_left_img3']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>

            <div class="content-box card-h">
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

                <h2>
                    <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_right_title_img3']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_right_title_img3']['id'], '_wp_attachment_image_alt', true); ?>" /></span> <?php echo esc_html($synckhomev2about_output['about_right_tab_title3']); ?>
                </h2>
                <div class="content">
                    <?php echo ($synckhomev2about_output['about_right_tab_content3']); ?>
                </div>
<?php if(!empty($synckhomev2about_output['about_right_tab_btn_icon3'] )): ?>
                <a 
                <?php if($synckhomev2about_output['about_right_tab_btn_link3']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev2about_output['about_right_tab_btn_link3']['url']); ?>" class="theme-btn">
                    <i class="<?php echo esc_attr($synckhomev2about_output['about_right_tab_btn_icon3']);?>"></i> 
                </a>
                <?php endif;?>
            </div>
        </div>

    </div>
    
    <div class="tab-pane fade" id="performance_improvement" role="tabpanel" aria-labelledby="performance_improvement-tab">
        <div class="about2-tab-content-body d-flex gap-24">
            <div class="img-box">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_left_img4']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_left_img4']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>

            <div class="content-box card-h">
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

                <h2>
                    <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_right_title_img4']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_right_title_img4']['id'], '_wp_attachment_image_alt', true); ?>" /></span> <?php echo esc_html($synckhomev2about_output['about_right_tab_title4']); ?>
                </h2>
                <div class="content">
                    <?php echo ($synckhomev2about_output['about_right_tab_content4']); ?>
                </div>
<?php if(!empty($synckhomev2about_output['about_right_tab_btn_icon4'] )): ?>
                <a <?php if($synckhomev2about_output['about_right_tab_btn_link4']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev2about_output['about_right_tab_btn_link4']['url']); ?>" class="theme-btn">
                    <i class="<?php echo esc_attr($synckhomev2about_output['about_right_tab_btn_icon4']);?>"></i> 
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>
    
    <div class="tab-pane fade" id="entrepreneurial_guidance" role="tabpanel" aria-labelledby="entrepreneurial_guidance-tab">
        <div class="about2-tab-content-body d-flex gap-24">
            <div class="img-box">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_left_img5']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_left_img5']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>

            <div class="content-box card-h">
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

                <h2>
                    <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_right_title_img5']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_right_title_img5']['id'], '_wp_attachment_image_alt', true); ?>" /></span> <?php echo esc_html($synckhomev2about_output['about_right_tab_title5']); ?>
                </h2>
                <div class="content">
                    <?php echo ($synckhomev2about_output['about_right_tab_content5']); ?>
                </div>
<?php if(!empty($synckhomev2about_output['about_right_tab_btn_icon5'] )): ?>
                <a <?php if($synckhomev2about_output['about_right_tab_btn_link5']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev2about_output['about_right_tab_btn_link5']['url']); ?>" class="theme-btn">
                    <i class="<?php echo esc_attr($synckhomev2about_output['about_right_tab_btn_icon5']);?>"></i> 
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="organizational_excellence" role="tabpanel" aria-labelledby="organizational_excellencey-tab">
        <div class="about2-tab-content-body d-flex gap-24">
            <div class="img-box">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_left_img6']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_left_img6']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>

            <div class="content-box card-h">
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

                <h2>
                    <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_right_title_img6']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_right_title_img6']['id'], '_wp_attachment_image_alt', true); ?>"/></span> <?php echo esc_html($synckhomev2about_output['about_right_tab_title6']); ?>
                </h2>
                <div class="content">
                    <?php echo ($synckhomev2about_output['about_right_tab_content6']); ?>
                </div>
<?php if(!empty($synckhomev2about_output['about_right_tab_btn_icon6'] )): ?>
                <a <?php if($synckhomev2about_output['about_right_tab_btn_link6']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev2about_output['about_right_tab_btn_link6']['url']); ?>" class="theme-btn">
                    <i class="<?php echo esc_attr($synckhomev2about_output['about_right_tab_btn_icon6']);?>"></i> 
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="market_research" role="tabpanel" aria-labelledby="market_research-tab">
        <div class="about2-tab-content-body d-flex gap-24">
            <div class="img-box">
                <img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_left_img7']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_left_img7']['id'], '_wp_attachment_image_alt', true); ?>" />
            </div>

            <div class="content-box card-h">
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

                <h2>
                    <span class="icon"><img src="<?php echo esc_url(wp_get_attachment_image_url( $synckhomev2about_output['about_tab_right_title_img7']['id'], 'full' ));?>" alt="<?php echo get_post_meta($synckhomev2about_output['about_tab_right_title_img7']['id'], '_wp_attachment_image_alt', true); ?>" /></span> <?php echo esc_html($synckhomev2about_output['about_right_tab_title7']); ?>
                </h2>
                <div class="content">
                    <?php echo ($synckhomev2about_output['about_right_tab_content7']); ?>
                </div>
<?php if(!empty($synckhomev2about_output['about_right_tab_btn_icon7'] )): ?>
                <a <?php if($synckhomev2about_output['about_right_tab_btn_link7']['is_external'] == true ): ?> target="_blank" <?php endif; ?>
                href="<?php echo esc_url($synckhomev2about_output['about_right_tab_btn_link7']['url']); ?>" class="theme-btn">
                    <i class="<?php echo esc_attr($synckhomev2about_output['about_right_tab_btn_icon7']);?>"></i> 
                </a>
                <?php endif;?>
            </div>
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

