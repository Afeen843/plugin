<?php

include_once ABSPATH .'wp-content/plugins/echarge/configIn.php';

class echarge {


	/**
	 * Plugin Path
	 * @var string
	 */

	protected string $_plugin;

	/**
	 * Class Instance
	 * @var object
	 */
	public static object $_instance;

	/**
	 * Constructor
	 */

	public function __construct() {


		$this->_plugin = plugin_basename( __FILE__ );

	}

	/**
	 * Singleton
	 * @return echarge
	 */
	public static function instance() {

		if ( ! isset( self::$_instance ) ) {

			self::$_instance = new self();
		}

		return self::$_instance;

	}

	/**
	 * Add StyleSheets and JavaScript
	 * @return void
	 */
	function enqueue_style() {

		//styleSheets

		wp_enqueue_style( 'myStyleSheet',
			plugins_url( 'assets/myStyle.css' , ASSET_DIR_ ),
			array(),
			'4.0',
		    'all'

		);
		//javaScripts
		wp_enqueue_script( 'myScript',
			plugins_url( 'assets/myScript.js', ASSET_DIR_ ),
			array( 'scriptCdn' ),
			'1.0'
		);

		//JavaScript Cdn
		wp_enqueue_script( 'scriptCdn',
			'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js',
			array(),
			'1.0' );
	}


	/**
	 * Player Menu
	 * @return void
	 */
	public function customer_menu() {


		add_menu_page(
			'',
			'EbizCharge',
			'',
			'ebizcharge',

		);

		add_submenu_page(
			'ebizcharge',
			'customers',
			'Customers',
			'manage_options',
			'customers',
			[$this , 'customerTable']
		);

		add_submenu_page(
			'ebizcharge',
			'Subscription',
			'Subscription',
			'manage_options',
			'subscription',
			[$this , 'SubscriptionTable']
		);

		add_submenu_page(
			'ebizcharge',
			'Configuration',
			'Configuration',
			'manage_options',
			'configuration',
			[$this , 'configForm']
		);


	}



	public function configForm() {

		include_once VIEW_DIR_ . 'configForm.php';
	}

	public function customerTable() {

		include_once VIEW_DIR_ . 'customerTable.php';
	}

	public  function SubscriptionTable(){

		include_once VIEW_DIR_.'subscriptionTable.php';
	}


	/**
	 * Register Actions
	 */

	public function register() {

		add_action( 'admin_menu', array( $this, 'customer_menu' ) );
		add_action( 'init', array( $this, 'enqueue_style' ) );
	}

}




