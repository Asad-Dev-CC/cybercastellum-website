<?php

if (!class_exists('Redux'))
    {
    return;
    }
function newIconFont() 
    { 
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fontawesome-all.css' );
    }

add_action( 'redux/page/synck_options/enqueue', 'newIconFont' );

$opt_name = "synck_options";
$theme    = wp_get_theme();
$args = array(
    'opt_name' => $opt_name,
    'display_name' => $theme->get('Name') ,
    'display_version' => $theme->get('Version') ,
    'menu_type' => 'menu',
    'allow_sub_menu' => true,
    'menu_title'        => esc_html__( 'Synck Options', 'synck' ),
    'google_api_key' => '',
    'google_update_weekly' => false,
    'async_typography' => true,
    'admin_bar' => false,
    'admin_bar_icon' => '',
    'admin_bar_priority' => 50,
    'global_variable' => $opt_name,
    'dev_mode' => false,
    'update_notice' => false,
    'customizer' => false,
    'page_priority' => 3,
    'page_parent' => 'themes.php',
    'page_permissions' => 'manage_options',
    'menu_icon' => '',
    'last_tab' => '',
    'page_icon' => 'icon-themes',
    'page_slug' => 'themeoptions',
    'save_defaults' => true,
    'default_show' => false,
    'default_mark' => '',
    'show_import_export' => true
);
Redux::setArgs( $opt_name, $args );

//404-Page

Redux::setSection($opt_name, array(
    'title' => esc_html__('404 Page', 'synck') ,
    'id' => esc_html__('404-Page', 'synck') ,
    'icon' => 'fa-solid fa-bars-progress',
    'fields' => array(

        array(
            'title'     => esc_html__( 'Breadcrumb Details', 'synck' ),
            'id'        => 'sec1',
            'type'      => 'section',
            'indent'    => true
        ),


        array(
            'title'     => esc_html__( 'Text', 'synck' ),
            'id'        => 'title_text',
            'type'      => 'text',
            'default'   => esc_html__( 'Home', 'synck' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Text Link', 'synck' ),
            'id'        => 'titletext_link',
            'type'      => 'text',
            'default'   => esc_html__( 'https://wpriverthemes.com/magnuz/wp-admin/index.php', 'synck' ),
            'indent'    => true
        ),

        array(
            'id'       => 'titletextlink_newtab',
            'type'     => 'checkbox',
            'default'  => '2',
            'title'    => esc_html__( 'Link to Open in new window', 'synck' ),
        ),

        array(
            'title'     => esc_html__( 'Text', 'synck' ),
            'id'        => 'breadcrumb_text',
            'type'      => 'text',
            'default'   => esc_html__( '404 Error', 'synck' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Breadcrumb Heading', 'synck' ),
            'id'        => 'heading',
            'type'      => 'text',
            'default'   => esc_html__( 'Error Page', 'synck' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Page Details', 'synck' ),
            'id'        => 'sec2',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Title', 'synck' ),
            'id'        => 'banner_title',
            'type'      => 'text',
            'default'   => esc_html__( '404', 'synck' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Heading', 'synck' ),
            'id'        => 'banner_heading',
            'type'      => 'text',
            'default'   => esc_html__( 'SORRY PAGE WAS NOT FOUND!', 'synck' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Search Bar Widget', 'synck' ),
            'id'        => 'sec3',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Placeholder Text', 'synck' ),
            'id'        => 'placeholder_text',
            'type'      => 'text',
            'default'   => esc_html__( 'Search Here...', 'synck' ),
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Button text', 'synck' ),
            'id'        => 'button_text',
            'type'      => 'text',
            'default'   => esc_html__( 'Search', 'synck' ),
            'indent'    => true
        ),

    )
));

//404-Styling

Redux::setSection($opt_name, array(
    'title' => esc_html__('404 Page Styling', 'synck') ,
    'id' => esc_html__('404-Page-style', 'synck') ,
    'icon' => 'fa-solid fa-bars-progress',
    'sub-section' => 'true',
    'fields' => array(

        array( 
            'id'          => 'text-typography',
            'type'        => 'typography', 
            'title'       => esc_html__('Text Font', 'synck'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('.breadcrumb-list li a'),
            'units'       =>'px',
            'subtitle'    => esc_html__('specify the body font properties', 'synck'),
            'default'     => array(
                // 'color'       => '#1351D8', 
                // 'font-weight'  => '500', 
                'font-family' => 'DM Sans', 
                'google'      => true,
                // 'font-size'   => '14px', 
                // 'line-height' => '1px'
            ),
        ),

        array( 
            'id'          => 'breadcrumbheading-typography',
            'type'        => 'typography', 
            'title'       => esc_html__('Breadcrumb Heading Font', 'synck'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('.blog-breadcrumb-area h1'),
            'units'       =>'px',
            'subtitle'    => esc_html__('specify the body font properties', 'synck'),
            'default'     => array(
                // 'color'       => '#212529', 
                // 'font-weight'  => '700', 
                'font-family' => 'Yantramanav', 
                'google'      => true,
                // 'font-size'   => '64px', 
                // 'line-height' => '1'
            ),
        ),

        array( 
            'id'          => 'title-typography',
            'type'        => 'typography', 
            'title'       => esc_html__('Title Font', 'synck'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('h1'),
            'units'       =>'px',
            'subtitle'    => esc_html__('specify the body font properties', 'synck'),
            'default'     => array(
                // 'color'       => '#212529', 
                // 'font-weight'  => '500', 
                'font-family' => 'DM Sans', 
                'google'      => true,
                // 'font-size'   => '40px', 
                // 'line-height' => '1.2'
            ),
        ),

        array( 
            'id'          => 'heading-typography',
            'type'        => 'typography', 
            'title'       => esc_html__('Heading Font', 'synck'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('h2'),
            'units'       =>'px',
            'subtitle'    => esc_html__('specify the body font properties', 'synck'),
            'default'     => array(
                // 'color'       => '#212529', 
                // 'font-weight'  => '500', 
                'font-family' => 'DM Sans', 
                'google'      => true,
                // 'font-size'   => '32px', 
                // 'line-height' => '1.2'
            ),
        ),

        

    )
));

//Blog-Page Styling

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Page Styling', 'synck') ,
    'id' => esc_html__('blog-Page-style', 'synck') ,
    'icon' => 'fa-solid fa-bars-progress',
    'sub-section' => 'true',
    'fields' => array(

        array(
            'title'        => esc_html__( 'Badge Background Color', 'synck' ),
            'id'           => 'badge-color',
            'type'         => 'color',
            'output'       => array(
                'background' => '.breadcrumb-list'
            ),
            'validate'     => 'color',
        ),

        array(
            'title'        => esc_html__( 'Widget Background Color', 'synck' ),
            'id'           => 'widget-color',
            'type'         => 'color',
            'output'       => array(
                'background' => '.blog-2-sidebar-widget'
            ),
            'validate'     => 'color',
        ),
    )
));


//Color

Redux::setSection($opt_name, array(
    'title' => esc_html__('Styling', 'synck') ,
    'id' => esc_html__('synck_color', 'synck') ,
    'icon' => 'fas fa-edit',
    'fields' => array(
		
	array(
            'title'     => esc_html__( 'Favicon logo', 'synck' ),
            'id'        => 'favicon-logo',
            'type'      => 'media',
            'default'  => array(
                'url'=> get_template_directory_uri() . '/assets/imgs/favicon.svg'
                ), 
            'indent'    => true
        ),
        
    array(
            'id'        => 'main_color_synck',
            'title'     => esc_html__( 'Main theme color', 'synck' ),
            'subtitle'  => esc_html__( 'The main color of the site.', 'synck' ),
            'type'      => 'select',
            'options'   => array(
                '1'     => esc_html__( 'Custom Colors', 'synck' ),
            ),
            'default'   => '1',
            'indent'    => true,
        ),

    array(
            'title'     => esc_html__( 'Custom Color Option', 'synck' ),
            'id'        => 'customcolors',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array( 'main_color_synck', 'equals', '1' ),
        ),

    array(
            'title'     => esc_html__( 'Choose main theme color', 'synck' ),
            'id'        => 'colorcode',
            'type'      => 'color',
            'default'  => '#1351D8',
            'validate' => 'color',
            'transparent' => false,
            'required'  => array( 'main_color_synck', 'equals', '1' ),
        ),
    )
));
