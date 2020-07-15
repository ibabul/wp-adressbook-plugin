<?php
/**
 * Plugin Name: AA weDevs Academy
 * Plugin URI: https://wpmaestro.net/
 * Description: A Plugin Tutorial.
 * Version: 1.0.0
 * Author: MD IMTIAZ
 * Author URI: https://wpmaestro.net
 * License: GPL2 or later
 */

if (!defined('ABSPATH')) {
	die('Silly kiddo');
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */

final class WeDevs_Academy {

	/**
	 * plugin version
	 */
	const version = '1.0';

	/**
	 * class constructor
	 */
	private function __construct() {
		// add_action('woocommerce_cart_is_empty', woocommerce_empty_cart(), 10);
		$this->define_constants();

		register_activation_hook(__FILE__, [$this, 'activate']);

		add_action('plugins_loaded', [$this, 'init_plugin']);
	}

	/**
	 * initializes a singleton instance
	 *
	 * @return \WeDevs_Academy
	 */
	public static function init() {
		static $instance = false;

		if (!$instance) {
			$instance = new self();
		}
		return $instance;
	}

	/**
	 * Define Constants
	 * @return [type]
	 */
	public function define_constants() {
		define('WD_ACADEMY_VERSION', self::version);
		define('WD_ACADEMY_FILE', __FILE__);
		define('WD_ACADEMY_PATH', __DIR__);
		define('WD_ACADEMY_URL', plugins_url('', WD_ACADEMY_FILE));
		define('WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets');
	}

	/**
	 * Do stuff on plugin activation
	 * @return void
	 */
	public function activate() {
		$installer = new WeDevs\Academy\Installer();
		$installer->run();
	}

	/**
	 * Initialize the plugin
	 * @return void
	 */
	public function init_plugin() {
		new WeDevs\Academy\Assets();

		if (defined('DOING_AJAX') && DOING_AJAX) {
			new WeDevs\Academy\Ajax();
		}

		if (is_admin()) {
			new WeDevs\Academy\Admin();
		} else {
			new WeDevs\Academy\Frontend();
		}

		new WeDevs\Academy\API();
	}
}

/**
 * initializes the main plugin
 * @return \WeDevs_Academy
 */
function wedevs_academy() {
	return WeDevs_Academy::init();
}

//kick off the plugin
wedevs_academy();
