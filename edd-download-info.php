<?php
/**
* Plugin Name: EDD Download Info
* Plugin URI: https://foxland.fi/downloads/edd-download-info/
* Description: Adds download info metabox and widget to Easy Digital Downloads.
* Version: 1.1
* Text Domain: edd-download-info
* Domain Path: /languages
* Author: Sami Keijonen
* Author URI: https://foxland.fi
*
* This program is free software; you can redistribute it and/or modify it under the terms of the GNU
* General Public License version 2, as published by the Free Software Foundation. You may NOT assume
* that you can use any other version of the GPL.
*
* This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
* even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*
* @package EDDDownloadInfo
* @version 1.1
* @author Sami Keijonen <sami.keijonen@foxnet.fi>
* @copyright Copyright (c) 2015, Sami Keijonen
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) exit;

final class EDD_Download_Info {

	/**
	 * Holds the instances of this class.
	 *
	 * @since  0.1.9
	 * @access private
	 * @var    object
	 */
	private static $instance;

	/**
	* PHP5 constructor method.
	*
	* @since  0.0.1
	* @access public
	* @var    void
	*/
	public function __construct() {

		/* Set the constants needed by the plugin. */
		add_action( 'plugins_loaded', array( $this, 'constants' ), 1 );

		/* Internationalize the text strings used. */
		add_action( 'plugins_loaded', array( $this, 'i18n' ), 2 );

		/* Load the functions files. */
		add_action( 'plugins_loaded', array( $this, 'includes' ), 3 );

	}

	/**
	* Defines constants used by the plugin.
	*
	* @since 0.1.0
	*/
	public function constants() {

		/* Set constant path to the plugin directory. */
		define( 'EDD_DOWNLOAD_INFO_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		
		/* Set constant path to the plugin directory. */
		define( 'EDD_DOWNLOAD_INFO_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

		/* Set the constant path to the includes directory. */
		define( 'EDD_DOWNLOAD_INFO_INCLUDES', EDD_DOWNLOAD_INFO_DIR . trailingslashit( 'includes' ) );

	}

	/**
	* Load the translation of the plugin.
	*
	* @since 0.1.0
	*/
	public function i18n() {

		/* Load the translation of the plugin. */
		load_plugin_textdomain( 'edd-download-info', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	}

	/**
	* Loads the initial files needed by the plugin.
	*
	* @since 0.1.0
	*/
	public function includes() {

		require_once( EDD_DOWNLOAD_INFO_INCLUDES . 'metabox.php' );
		require_once( EDD_DOWNLOAD_INFO_INCLUDES . 'widgets.php' );
		require_once( EDD_DOWNLOAD_INFO_INCLUDES . 'taxonomy.php' );
		require_once( EDD_DOWNLOAD_INFO_INCLUDES . 'settings.php' );
		require_once( EDD_DOWNLOAD_INFO_INCLUDES . 'shortcodes.php' );
		require_once( EDD_DOWNLOAD_INFO_INCLUDES . 'scripts.php' );
		require_once( EDD_DOWNLOAD_INFO_INCLUDES . 'functions.php' );
		
	}
	
	/**
	 * Returns the instance.
	 *
	 * @since  0.1.9
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		if ( !self::$instance ) {
			self::$instance = new self;
		}
		
		return self::$instance;
	}

}

EDD_Download_Info::get_instance();
