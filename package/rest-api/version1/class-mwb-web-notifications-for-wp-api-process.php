<?php
/**
 * Fired during plugin activation
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Web_Notifications_For_Wp
 * @subpackage Mwb_Web_Notifications_For_Wp/package/rest-api/version1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Mwb_Web_Notifications_For_Wp_Api_Process' ) ) {

	/**
	 * The plugin API class.
	 *
	 * This is used to define the functions and data manipulation for custom endpoints.
	 *
	 * @since      1.0.0
	 * @package    Mwb_Web_Notifications_For_Wp
	 * @subpackage Mwb_Web_Notifications_For_Wp/package/rest-api/version1
	 * @author     MakeWebBetter <makewebbetter.com>
	 */
	class Mwb_Web_Notifications_For_Wp_Api_Process {

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 */
		public function __construct() {

		}

		/**
		 * Define the function to process data for custom endpoint.
		 *
		 * @since    1.0.0
		 * @param   Array $mwnfw_request  data of requesting headers and other information.
		 * @return  Array $mwb_mwnfw_rest_response    returns processed data and status of operations.
		 */
		public function mwb_mwnfw_default_process( $mwnfw_request ) {
			$mwb_mwnfw_rest_response = array();

			// Write your custom code here.

			$mwb_mwnfw_rest_response['status'] = 200;
			$mwb_mwnfw_rest_response['data'] = $mwnfw_request->get_headers();
			return $mwb_mwnfw_rest_response;
		}
	}
}
