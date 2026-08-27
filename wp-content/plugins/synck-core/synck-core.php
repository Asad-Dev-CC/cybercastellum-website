<?php
/**
 * Plugin Name: Synck Core
 * Description: Synck Core Plugin Contains Elementor Widgets Specifically created for synck WordPress Theme.
 * Plugin URI:  wordpressriverthemes.com/synck
 * Version:     3.1.0
 * Author:      WordPressRiver
 * Author URI:  https://themeforest.net/user/wordpressriver/portfolio
 * Text Domain: synck-core
 *
 * Elementor tested up to: 3.27.6
 * Elementor Pro tested up to: 3.27.0
 */


if ( !defined('ABSPATH') )
    die('-1');

// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'synck_core' ) ) {
	/**
	 * Main synck Core Class
	 *
	 * The main class that initiates and runs the synck Core plugin.
	 *
	 * @since 1.7.0
	 */
	final class synck_core {
		/**
		 * synck Core Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.0' ;
		/**
		 * Minimum Elementor Version
		 *
		 * Holds the minimum Elementor version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '1.7.0';
		/**
		 * Minimum PHP Version
		 *
		 * Holds the minimum PHP version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Plugin's directory paths
         * @since 1.0
         */
        const CSS = null;
        const JS = null;
        const IMG = null;
        const VEND = null;

		/**
		 * Instance
		 *
		 * Holds a single instance of the `synck_core` class.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 * @static
		 *
		 * @var synck_core A single instance of the class.
		 */
		private static  $_instance = null ;
		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 * @static
		 *
		 * @return synck_core An instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'synck-core' ), '1.7.0' );
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'synck-core' ), '1.7.0' );
		}

		/**
		 * Constructor
		 *
		 * Initialize the synck Core plugins.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function __construct() {
			$this->core_includes();
			$this->init_hooks();
			do_action( 'synck_core_loaded' );
		}

		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function core_includes() {
		
		}

		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 */
		private function init_hooks() {
			add_action( 'init', [ $this, 'i18n' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function i18n() {
			load_plugin_textdomain( 'synck-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}



		/**
		 * Init synck Core
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @since 1.0.0
		 * @since 1.7.0 The logic moved from a standalone function to this class method.
		 *
		 * @access public
		 */
		public function init() {

			if ( !did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return;
			}

			// Check for required Elementor version

			if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
				return;
			}

			// Check for required PHP version

			if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
				return;
			}

			// Add new Elementor Categories
			add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

			// Register Widget Styles
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );

			// Register Widget Scripts
			add_action( 'elementor/frontend/after_register_scripts', [ $this,'register_widget_scripts' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_scripts' ] );

			// Register New Widgets
			add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			$message = sprintf(
			/* translators: 1: synck Core 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'synck-core' ),
				'<strong>' . esc_html__( 'synck core', 'synck-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'synck-core' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {
			$message = sprintf(
			/* translators: 1: synck Core 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'synck-core' ),
				'<strong>' . esc_html__( 'synck Core', 'synck-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'synck-core' ) . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version() {
			$message = sprintf(
			/* translators: 1: synck Core 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'synck-core' ),
				'<strong>' . esc_html__( 'synck Core', 'synck-core' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'synck-core' ) . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Add new Elementor Categories
		 *
		 * Register new widget categories for synck Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function add_elementor_category() {
			\Elementor\Plugin::instance()->elements_manager->add_category( 'synck', [
				'title' => __( 'synck Elements', 'synck-core' ),
			], 1 );
		}


		/**
		 * Register Widget Scripts
		 *
		 * Register custom scripts required to run Saasland Core.
		 *
		 * @since 1.6.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function register_widget_scripts() {
			wp_register_script( 'main', plugins_url( '/assets/js/main.js', __FILE__ ), array( 'jquery' ), false, true );
		}




		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Saasland Core.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		
		public function enqueue_widget_styles() {

		}

		/**
		 * Register New Widgets
		 *
		 * Include synck Core widgets files and register them in Elementor.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function on_widgets_registered() {
			$this->include_widgets();
			$this->register_widgets();
		}

		/**
		 * Include Widgets Files
		 *
		 * Load synck Core widgets files.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function include_widgets() {

			// homev1-Page //

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-hero.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-client.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-how-we-do.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-service.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-case-studie.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-about.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-testimonial.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-project.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-news.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-feature.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-contact.php');
            
            require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-header.php');

            require_once( __DIR__ . '/widgets/SYNCK/Home-Version-One/synck-homev1-footer.php');


			// Home-Version-Two //

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-Two/synck-homev2-hero.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-Two/synck-homev2-client.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-Two/synck-homev2-services.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-Two/synck-homev2-about.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-Two/synck-homev2-feature.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-Two/synck-homev2-news.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-Two/synck-homev2-portfolio.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-Two/synck-homev2-team.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-Two/synck-homev2-testimonial.php');

			require_once( __DIR__ . '/widgets/SYNCK/Home-Version-Two/synck-homev2-contact-map.php');
            
            require_once( __DIR__ . '/widgets/SYNCK/Home-Version-Two/synck-homev2-header.php');

			// Synck-Inner-Pages //

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-hero-style1.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-company-service.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-service-style2.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-our-team-style1.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-about-service-style1.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-cta-style1.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-partner.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-about-service-style2.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-faq.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-cta-style2.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-hero-style2.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-hero-style3.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-pricing.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-our-team-style2.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-about-service-style3.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-our-team-style3.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-case-studie-style2.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-feature-style1.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-how-we-do-style2.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-detail-hero-img.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-about-service-style4.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-about-service-style5.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-feature-style2.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-about-service-style6.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-about-service-style7.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-portfolio.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-career.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-our-team-style4.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-contact-map-style2.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-contact-location.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-event-detail.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-blog-details-area.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-news-style1.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-news-style2.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-news-style3.php');

			require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-news-style4.php');
            
            require_once( __DIR__ . '/widgets/SYNCK/Synck-Inner-Pages/synck-pages-hero-style4.php');
    }

        
		/**
		 * Register Widgets
		 *
		 * Register synck Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function register_widgets() {

			// Home-Version-One //

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1about_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1casestudie_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1client_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1contact_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1feature_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1footer_Widget() );
            
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1header_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1hero_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1howwedo_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1news_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1project_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1service_Widget() );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev1testimonial_Widget() );


			// Home-Version-Two //

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev2about_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev2client_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev2contact_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev2feature_Widget() );
            
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev2header_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev2hero_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev2news_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev2portfolio_Widget() );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev2services_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev2team_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckhomev2testimonial_Widget() );

			
			// Inner-Pages //

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesaboutservicestyle1_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesaboutservicestyle2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesaboutservicestyle3_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesaboutservicestyle4_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesaboutservicestyle5_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesaboutservicestyle6_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesaboutservicestyle7_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesblogdetailsarea_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagescareer_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagescasestudiestyle2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagescompanyservice_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagescontactlocation_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagescontactmapstyle2_Widget() );		

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesctastyle1_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesctastyle2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesdetailheroimg_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpageseventdetail_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesfaq_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesfeaturestyle1_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesfeaturestyle2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesherostyle1_Widget() );	

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesherostyle2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesherostyle3_Widget() );
            
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesherostyle4_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpageshowwedostyle2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesnewsstyle1_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesnewsstyle2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesnewsstyle3_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesnewsstyle4_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesourteamstyle1_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesourteamstyle2_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesourteamstyle3_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesourteamstyle4_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagespartner_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesportfolio_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagespricing_Widget() );

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_synck_synckpagesservicestyle2_Widget() );

		}
	}
}


// Make sure the same function is not loaded twice in free/premium versions.

if ( !function_exists( 'synck_core_load' ) ) {
	/**
	 * Load synck Core
	 *
	 * Main instance of synck_core.
	 *
	 * @since 1.0.0
	 * @since 1.7.0 The logic moved from this function to a class method.
	 */
	function synck_core_load() {
		return synck_core::instance();
	}

	// Run synck Core
    synck_core_load();
}