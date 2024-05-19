<?php
/*
 * Plugin Name: Lite Table Of Contents
 * Plugin URI: https://linkedin.com/in/mrsbs
 * Description: SEO Friendly Table Of Contents
 * Version: 1.0
 * Requires at least: 5.7
 * Requires PHP: 8.x
 * Author: Subash
 * Author URI: https://twitter.com/subaasw
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-toc-lite
 * Domain Path: /languages
**/

if ( ! defined( 'ABSPATH' ) )  exit;

if ( ! class_exists( 'WP_Lite_Toc' ) ){

	final class WP_Lite_Toc {

		public static function init() {
			return new self();
		}

		function setup_plugin() {
			$this->define_constraints();
			$this->include_autoload();
		}

		function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}

		function include_autoload() {
			// require_once WP_TOC_LITE_PATH . '/inc/class-core.php';
			// require_once WP_TOC_LITE_PATH . 'autoload.php';
		}

		private function define_constraints() {
			$this->define( 'WP_TOC_LITE_PATH', plugin_dir_path( __FILE__ ) );
			$this->define( 'WP_TOC_LITE_URL', plugin_dir_url( __FILE__ ) );
			$this->define( 'WP_TOC_LITE_VERSION', '1.0' );
		}
	}
}

function load_wp_toc_lite() {
	$instance = WP_Lite_Toc::init();
	$instance->setup_plugin();
}

add_action( 'plugins_loaded', 'load_wp_toc_lite' );

function execute_in_blog_post_() {
    if ( is_single() ) {
        require_once plugin_dir_path( __FILE__ ) . '/inc/class-core.php';
    }
}
add_action( 'wp', 'execute_in_blog_post_' );
