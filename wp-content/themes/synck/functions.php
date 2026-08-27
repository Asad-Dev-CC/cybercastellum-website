<?php
// global $synck_options; 


/**
 * synck functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package synck
 */

/**
 * Required Files
 */

require_once get_template_directory() . '/inc/synck-class-wp-bootstrap-navwalker.php';

require_once get_template_directory() . '/inc/redux/config.php';
require_once get_template_directory() . '/inc/redux/color.php';

/*TGM PLUGIN*/
require_once get_template_directory() . '/tgm-plugin/recommend_plugins.php';

/**
 * Enqueue Google Fonts
 */

function synck_fonts_url() {
        $font_url = '';

        /* Translators: If there are characters in your language that are not
        * supported by Lora, translate this to 'off'. Do not translate
        * into your own language.
        */
        $lora = _x('on', 'Lora font: on or off', 'synck');

        /* Translators: If there are characters in your language that are not
        * supported by Lora, translate this to 'off'. Do not translate
        * into your own language.
        */
        $sansserif = _x('on', 'sansserif font: on or off', 'synck');

        /* Translators: If there are characters in your language that are not
        * supported by Open Sans, translate this to 'off'. Do not translate
        * into your own language.
        */
        $open_sans = _x('on', 'Open Sans font: on or off', 'synck');

        if ('off' !== _x('on', 'Google font: on or off', 'synck')) {
            $font_families = array();

            if ('off' !== $lora) {
                $font_families[] = 'Syne:400,500,600';
            }

            if ('off' !== $open_sans) {
                $font_families[] = 'DM Sans:0,100,0,200,0,300,0,400,0,500,0,600,0,700,0,800,1,100,1,200,1,300,1,400,1,500,1,600';
            }

            if ('off' !== $sansserif) {
                $font_families[] = 'Yantramanav:100,300,400,500,700,900';
            }

            $query_args = array(
                'family' => urlencode(implode('|', $font_families)),
                'subset' => urlencode('latin,latin-ext'),
            );

            $fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
        }

    return esc_url_raw( $fonts_url );
}

/**
 * Register and Enqueue Styles.
 */

function synck_register_styles() {

    wp_enqueue_style( 'iconoir', get_template_directory_uri() . '/assets/css/iconoir.css' );

    wp_enqueue_style( 'line-awesome', get_template_directory_uri() . '/assets/css/line-awesome.min.css' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

    wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css' );

    wp_enqueue_style( 'synck-style', get_template_directory_uri() . '/assets/css/style.css' );

    wp_enqueue_style( 'synck-unit', get_template_directory_uri() . '/assets/css/synck-unit-test.css' );

    wp_enqueue_style( 'synck-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );

    wp_enqueue_style( 'synck-fonts', synck_fonts_url(), array(), '1.0.0' );

}

add_action( 'wp_enqueue_scripts', 'synck_register_styles' );


/**
 * Register and Enqueue Scripts.
 */

function synck_register_scripts() {

    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'gsap',
        get_template_directory_uri() . '/assets/js/gsap.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'Draggable',
        get_template_directory_uri() . '/assets/js/Draggable.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'swiper-bundle',
        get_template_directory_uri() . '/assets/js/swiper-bundle.min.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'client-marquee',
        get_template_directory_uri() . '/assets/js/client-marquee.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'theme-slidetobook',
        get_template_directory_uri() . '/assets/js/slideTobook.js',
        array( 'jquery' ),
        time(),
        true
    );

    wp_enqueue_script(
        'theme-custom',
        get_template_directory_uri() . '/assets/js/theme-custom.js',
        array( 'jquery' ),
        '',
        true
    );

    wp_enqueue_script(
        'theme-worldmap',
        get_template_directory_uri() . '/assets/js/theme-worldmap.js',
        array( 'jquery' ),
        '',
        true
    );

}

add_action( 'wp_enqueue_scripts', 'synck_register_scripts' );

/**
 * Synck Theme Configuration
 */

function synck_theme_config(){

    // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

         add_image_size( 'synck-blog', 350, 262, false);
        add_image_size( 'synck-blog-standard', 671, 400, false);
        // add_image_size( 'synck-blog-sidebar', 730, 400, false);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',

        ) );

    if ( ! isset( $content_width ) ) $content_width = 900;

    $synck_lang = get_template_directory_uri() . '/languages';
    load_theme_textdomain('synck', $synck_lang);

    if( class_exists( 'ReduxFrameworkPlugin' ) ) { 
            register_nav_menus(
                array(
                'main-menu' => esc_html__( 'Main Menu', 'synck' ),

                //Header Menus
                'header-menu' => esc_html__( 'Header Home Menu', 'synck' ),
                'header-menu1' => esc_html__( 'Header Get Started Menu', 'synck' ),
                'header-menu2' => esc_html__( 'Header Company Menu', 'synck' ),
                'header-menu3' => esc_html__( 'Header Product Menu', 'synck' ),
                'header-menu4' => esc_html__( 'Header Legal Menu', 'synck' ),
                'header-menu5' => esc_html__( 'Header Services Menu', 'synck' ),
                'header-menu6' => esc_html__( 'Header Our Fields Menu', 'synck' ),

                //Footer Menus
                'footer-menu1' => esc_html__( 'Footer Services Menu', 'synck' ),
                'footer-menu2' => esc_html__( 'Footer Company Menu', 'synck' ),
                'footer-menu3' => esc_html__( 'Footer Product Menu', 'synck' ),
                'footer-menu4' => esc_html__( 'Footer Our Fields Menu', 'synck' ),
                'footer-menu5' => esc_html__( 'Footer Legal Menu', 'synck' ),
                )
            ); 
        } else
        {
            register_nav_menus(
                array(
                'main-menu' => esc_html__( 'Main Menu', 'synck' ),
                )
            ); 
        }

}

add_action( 'after_setup_theme', 'synck_theme_config' , 0 );

// Retrieve all registered WordPress menus
function get_wordpress_menus() {
    $menus = get_registered_nav_menus();

    $menu_options = [];

    foreach ($menus as $location => $description) {
        $menu_options[$location] = $description;
    }

    return $menu_options;
}

/**
 * Synck Register Widgets
 */

add_action( 'widgets_init', 'synck_widgets_init' );
function synck_widgets_init() {

        register_sidebar( array(
        'name' => esc_html__( 'Main Sidebar', 'synck' ),
        'id' => 'main-sidebar',
        'description' => esc_html__( 'Widgets in this area will be shown on all posts and pages.', 'synck' ),
        'before_widget' => '<div id="%1$s" class="blog-2-sidebar-widget categories-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}

// Synck Pagination Display

function synck_pagination() {

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) return; 

$big = 999999999; // need an unlikely integer

$pages = paginate_links( array(
        'prev_text' => wp_specialchars_decode('<i class="iconoir-arrow-left"></i>',ENT_QUOTES),
        'next_text' => wp_specialchars_decode('<i class="iconoir-arrow-right"></i>',ENT_QUOTES),
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<nav aria-label="navigation"><ul class="pagination">';
        foreach ( $pages as $page ) {
                echo "<li class='page-item'>$page</li>";
        }
       echo '</ul></nav>';
		wp_link_pages($args);
        }
}


add_filter( 'widget_tag_cloud_args', 'synck_change_tag_cloud_font_sizes');
function synck_change_tag_cloud_font_sizes( array $args ) {
    $args['default'] = '13';
    $args['smallest'] = '13';
    $args['largest'] = '13';
    $args['unit'] = 'px';

    return $args;
}

// Synck Category

function synck_category() {
 $categories = get_the_category();
      $separator = ' ';
      $output = '';
      if($categories){
          foreach($categories as $category) {
              $output .= '<a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>'.$separator;
          }
          echo trim($output, $separator);
      }
}

// Synck Comments Display

function synck_theme_comment($comment, $args, $depth) {
    //echo 's';
   $GLOBALS['comment'] = $comment;
   $gravatar = get_avatar($comment,$size='100' ); ?>
 <div class="comment-box-inner">
        <?php echo get_avatar($comment,$size='80' ); ?>
    <div class="comment-body">
            <span class="comment-date"><?php the_time('F j, Y'); ?></span>
            <h4><?php printf( get_comment_author()) ?></h4>
            <p><?php comment_text() ?></p>
           <?php comment_reply_link(array_merge( $args, array('reply_text' =>  'Reply' , 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
</div>
<?php
}

// Synck Demo-Import

function synck_import_files() {
    return array(

        array(
            'import_file_name'           => 'HOME 1 - IT SERVICES',
            'import_file_url'            => trailingslashit(site_url('/')) . 'wp-content/themes/synck/demo-import/data.xml',
            'import_widget_file_url'     => trailingslashit(site_url('/')) . 'wp-content/themes/synck/demo-import/widget.wie',
            'import_customizer_file_url' => trailingslashit(site_url('/')) . 'wp-content/themes/synck/demo-import/custom.dat',
            'import_redux'               => array(
                array(
                    'file_url'    => trailingslashit(site_url('/')) . 'wp-content/themes/synck/demo-import/redux.json',
                    'option_name' => 'synck_options',
                ),
            ),
            'import_preview_image_url'   => 'https://wpriverthemes.com/HTML/synck/landing-page/imgs/home-1.jpg',
            'import_notice'              => esc_html__( 'Import process may take 2-5 minutes. If you are facing any issues, please contact our support.', 'synck' ),
            'preview_url'                => 'https://wpriverthemes.com/synck/',
        ),

        array(
            'import_file_name'           => 'HOME 2 - BUSINESS CONSULTING',
            'import_file_url'            => trailingslashit(site_url('/')) . 'wp-content/themes/synck/demo-import/data.xml',
            'import_widget_file_url'     => trailingslashit(site_url('/')) . 'wp-content/themes/synck/demo-import/widget.wie',
            'import_customizer_file_url' => trailingslashit(site_url('/')) . 'wp-content/themes/synck/demo-import/custom.dat',
            'import_redux'               => array(
                array(
                    'file_url'    => trailingslashit(site_url('/')) . 'wp-content/themes/synck/demo-import/redux.json',
                    'option_name' => 'synck_options',
                ),
            ),
            'import_preview_image_url'   => 'https://wpriverthemes.com/HTML/synck/landing-page/imgs/home-2.jpg',
            'import_notice'              => esc_html__( 'Import process may take 2-5 minutes. If you are facing any issues, please contact our support.', 'synck' ),
            'preview_url'                => 'https://wpriverthemes.com/synck/home-version2',
        ),      

    );
}
add_filter( 'pt-ocdi/import_files', 'synck_import_files' );

function synck_ocdi_after_import( $selected_import ) {

    if ( 'HOME 1 - IT SERVICES' === $selected_import['import_file_name'] ) {

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Blog Menu', 'nav_menu' );

        // Assign menus to their locations.
        $header_menu = get_term_by( 'name', 'Header Home Menu Links', 'nav_menu' );
        $header_menu1 = get_term_by( 'name', 'Header Get Started Menu Links', 'nav_menu' );
        $header_menu2 = get_term_by( 'name', 'Header Company Menu Links', 'nav_menu' );
        $header_menu3 = get_term_by( 'name', 'Header Product Menu Links', 'nav_menu' );
        $header_menu4 = get_term_by( 'name', 'Header Legal Menu Links', 'nav_menu' );
        $header_menu5 = get_term_by( 'name', 'Header Services Menu Links', 'nav_menu' );
        $header_menu6 = get_term_by( 'name', 'Header Our Fields Menu Links', 'nav_menu' );

        $footer_menu1 = get_term_by( 'name', 'Footer Services Menu Links', 'nav_menu' );
        $footer_menu2 = get_term_by( 'name', 'Footer Company Menu Links', 'nav_menu' );
        $footer_menu3 = get_term_by( 'name', 'Footer Product Menu Links', 'nav_menu' );
        $footer_menu4 = get_term_by( 'name', 'Footer Our Fields Menu Links', 'nav_menu' );
        $footer_menu5 = get_term_by( 'name', 'Footer Legal Menu Links', 'nav_menu' );
        
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'HOME 1 - IT SERVICES' );
        $posts_page_id = get_page_by_title( 'Blog With Sidebar' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $posts_page_id->ID );
        
    }

    elseif ( 'HOME 2 - BUSINESS CONSULTING' === $selected_import['import_file_name'] ) {

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Blog Menu', 'nav_menu' );

        // Assign menus to their locations.
        $header_menu = get_term_by( 'name', 'Header Home Menu Links', 'nav_menu' );
        $header_menu1 = get_term_by( 'name', 'Header Get Started Menu Links', 'nav_menu' );
        $header_menu2 = get_term_by( 'name', 'Header Company Menu Links', 'nav_menu' );
        $header_menu3 = get_term_by( 'name', 'Header Product Menu Links', 'nav_menu' );
        $header_menu4 = get_term_by( 'name', 'Header Legal Menu Links', 'nav_menu' );
        $header_menu5 = get_term_by( 'name', 'Header Services Menu Links', 'nav_menu' );
        $header_menu6 = get_term_by( 'name', 'Header Our Fields Menu Links', 'nav_menu' );

        $footer_menu1 = get_term_by( 'name', 'Footer Services Menu Links', 'nav_menu' );
        $footer_menu2 = get_term_by( 'name', 'Footer Company Menu Links', 'nav_menu' );
        $footer_menu3 = get_term_by( 'name', 'Footer Product Menu Links', 'nav_menu' );
        $footer_menu4 = get_term_by( 'name', 'Footer Our Fields Menu Links', 'nav_menu' );
        $footer_menu5 = get_term_by( 'name', 'Footer Legal Menu Links', 'nav_menu' );
        
        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'HOME 2 - BUSINESS CONSULTING' );
        $posts_page_id = get_page_by_title( 'Blog With Sidebar' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $posts_page_id->ID );
        
    }


    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
            'header-menu' => $header_menu->term_id,
            'header-menu1' => $header_menu1->term_id,
            'header-menu2' => $header_menu2->term_id,
            'header-menu3' => $header_menu3->term_id,
            'header-menu4' => $header_menu4->term_id,
            'header-menu5' => $header_menu5->term_id,
            'header-menu6' => $header_menu6->term_id,

            'footer-menu1' => $footer_menu1->term_id,
            'footer-menu2' => $footer_menu2->term_id,
            'footer-menu3' => $footer_menu3->term_id,
            'footer-menu4' => $footer_menu4->term_id,
            'footer-menu5' => $footer_menu5->term_id,
        )
    );
}
add_action( 'pt-ocdi/after_import', 'synck_ocdi_after_import' );