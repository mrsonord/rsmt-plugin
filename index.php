<?php
/*
Plugin Name: RSMT Schema
Description: Local business Schema Creator
Version: 0.2
Plugin URI: http://repairshopmarketingtools.com
Author: Samuel Nord
Author URI: mailto:sam@repairshopmarketingtools.com
*/



// DEFINE PLUGIN ID
define( 'RSMT_Local_Business_Schema_ID' , 'rsmt_local_business_schema' );
// DEFINE PLUGIN NICK
define( 'RSMT_Local_Business_Schema_N' , 'Local Schema' );


if ( ! class_exists ( 'rsmtschema' ) ) {

	class rsmtschema
	{

		public $name;

		public function __construct ()
		{

			$this->name = 'mdpLocalBusinessInfo';

			register_activation_hook ( __FILE__ , array ( $this , 'rsmt_activate' ) );
			register_deactivation_hook ( __FILE__ , array ( $this , 'rsmt_deactivate' ) );
			register_uninstall_hook ( __FILE__ , array ( $this , 'rsmt_uninstall' ) );

		}

		/**
		* function/default
		 * Usage: Set option defaults
		 * Arg(0): null
		 * Return: void
		*/

		function rsmt_default_options(){
			return array(
					'rsmt_status' => '0'
					'rsmt_type' => 'AutoRepair'
					'rsmt_name' => ''
					'rsmt_description' => ''
					'rsmt_url' => ''
					'rsmt_image' => ''
					'rsmt_sameas' => ''
					'rsmt_payment_accepted' => 'Cash'
					'rsmt_street_address_one' => ''
					'rsmt_address_locality_one' => ''
					'rsmt_address_region_one' => ''
					'rsmt_postal_code_one' => ''
					'rsmt_address_country_one' => 'United States'
					'rsmt_street_address_two' => ''
					'rsmt_address_locality_two' => ''
					'rsmt_address_region_two' => ''
					'rsmt_postal_code_two' => ''
					'rsmt_address_country_two' => 'United States'
					'rsmt_email' => ''
					'rsmt_telephone_one' => ''
					'rsmt_telephone_two' => ''
					'rsmt_fax_number_one' => ''
					'rsmt_fax_number_two' => ''
					'rsmt_best_rating' => '5'
					'rsmt_rating_value' => '1'
					'rsmt_open' => ''
					'rsmt_close' => ''
					'rsmt_dow' => 'Mo - Fr'
					'rsmt_seeks' => ''
					'rsmt_seeks_url' => ''
					'rsmt_seeks_name' => ''
					'rsmt_seeks_description' => ''
					'rsmt_member' => ''
					'rsmt_member_url' => ''
					'rsmt_member_name' => ''
					'rsmt_member_description' => ''
					'rsmt_geo_location_one' => '1'
					'rsmt_longitude_one' => ''
					'rsmt_latitude_one' => ''
					'rsmt_geo_location_two' => '1'
					'rsmt_longitude_two' => ''
					'rsmt_latitude_two' => ''
					'rsmt_founder_role' => ''
					'rsmt_employee_role' => ''
					'rsmt_review' => ''
					'rsmt_review_default' => ''
					'rsmt_keyword' => ''
					'rsmt_monday' => '1'
					'rsmt_tuesday' => '1'
					'rsmt_wednesday' => '1'
					'rsmt_thursday' => '1'
					'rsmt_friday' => '1'
					'rsmt_saturday' => '1' );
		}

		function rsmt_get_options() {

			return array_merge( get_option( 'rsmt_options', array() ), rsmt_default_options() );

		}


		/** function/activate
		 * Usage: create tables if not exist and activates the plugin
		 * Arg(0): null
		 * Return: void
		 */

		public static function rsmt_activate ()
		{

			add_option ( 'rsmt_status' );
			add_option ( 'rsmt_type' );
			add_option ( 'rsmt_name' );
			add_option ( 'rsmt_description' );
			add_option ( 'rsmt_url' );
			add_option ( 'rsmt_image' );
			add_option ( 'rsmt_sameas' );
			add_option ( 'rsmt_payment_accepted' );
			add_option ( 'rsmt_street_address_one' );
			add_option ( 'rsmt_address_locality_one' );
			add_option ( 'rsmt_address_region_one' );
			add_option ( 'rsmt_postal_code_one' );
			add_option ( 'rsmt_address_country_one' );
			add_option ( 'rsmt_street_address_two' );
			add_option ( 'rsmt_address_locality_two' );
			add_option ( 'rsmt_address_region_two' );
			add_option ( 'rsmt_postal_code_two' );
			add_option ( 'rsmt_address_country_two' );
			add_option ( 'rsmt_email' );
			add_option ( 'rsmt_telephone_one' );
			add_option ( 'rsmt_telephone_two' );
			add_option ( 'rsmt_fax_number_one' );
			add_option ( 'rsmt_fax_number_two' );
			add_option ( 'rsmt_best_rating' );
			add_option ( 'rsmt_rating_value' );
			add_option ( 'rsmt_open' );
			add_option ( 'rsmt_close' );
			add_option ( 'rsmt_dow' );
			add_option ( 'rsmt_seeks' );
			add_option ( 'rsmt_seeks_url' );
			add_option ( 'rsmt_seeks_name' );
			add_option ( 'rsmt_seeks_description' );
			add_option ( 'rsmt_member' );
			add_option ( 'rsmt_member_url' );
			add_option ( 'rsmt_member_name' );
			add_option ( 'rsmt_member_description' );
			add_option ( 'rsmt_geo_location_one' );
			add_option ( 'rsmt_longitude_one' );
			add_option ( 'rsmt_latitude_one' );
			add_option ( 'rsmt_geo_location_two' );
			add_option ( 'rsmt_longitude_two' );
			add_option ( 'rsmt_latitude_two' );
			add_option ( 'rsmt_founder_role' );
			add_option ( 'rsmt_employee_role' );
			add_option ( 'rsmt_review' );
			add_option ( 'rsmt_review_default' );
			add_option ( 'rsmt_keyword' );
			add_option ( 'rsmt_monday' );
			add_option ( 'rsmt_tuesday' );
			add_option ( 'rsmt_wednesday' );
			add_option ( 'rsmt_thursday' );
			add_option ( 'rsmt_friday' );
			add_option ( 'rsmt_saturday' );


		}

		/** function/deactivate
		 * Usage: create tables if not exist and activates the plugin
		 * Arg(0): null
		 * Return: void
		 */

		public static function rsmt_deactivate ()
		{

			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_status' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_type' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_name' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_description' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_url' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_image' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_sameas' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_payment_accepted' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_geo_location_one' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_longitude_one' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_latitude_one' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_geo_location_two' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_longitude_two' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_latitude_two' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_telephone_one' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_telephone_two' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_fax_number_one' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_fax_number_two' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_street_address_one' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_address_locality_one' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_address_region_one' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_postal_code_one' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_address_country_one' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_street_address_two' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_address_locality_two' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_address_region_two' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_postal_code_two' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_address_country_two' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_email' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_best_rating' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_worst_rating' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_rating_count' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_rating_value' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_open' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_close' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_dow' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_seeks' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_seeks_url' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_seeks_name' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_seeks_description' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_member' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_member_url' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_member_name' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_member_description' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_founder_role' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_employee_role' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_reviews' , 'rsmt_review' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_reviews' , 'rsmt_review_default' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_reviews' , 'rsmt_keyword' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_monday' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_tuesday' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_wednesday' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_thursday' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_friday' );
			unregister_setting ( RSMT_Local_Business_Schema_ID . '_options' , 'rsmt_saturday' );

		}

		/** function/uninstall
		 * Usage: create tables if not exist and activates the plugin
		 * Arg(0): null
		 * Return: void
		 */

		public static function rsmt_uninstall ()
		{

			delete_option ( 'rsmt_status' );
			delete_option ( 'rsmt_type' );
			delete_option ( 'rsmt_name' );
			delete_option ( 'rsmt_description' );
			delete_option ( 'rsmt_url' );
			delete_option ( 'rsmt_image' );
			delete_option ( 'rsmt_sameas' );
			delete_option ( 'rsmt_payment_accepted' );
			delete_option ( 'rsmt_geo_location_one' );
			delete_option ( 'rsmt_longitude_one' );
			delete_option ( 'rsmt_latitude_one' );
			delete_option ( 'rsmt_geo_location_two' );
			delete_option ( 'rsmt_longitude_two' );
			delete_option ( 'rsmt_latitude_two' );
			delete_option ( 'rsmt_telephone_one' );
			delete_option ( 'rsmt_telephone_two' );
			delete_option ( 'rsmt_fax_number_one' );
			delete_option ( 'rsmt_fax_number_two' );
			delete_option ( 'rsmt_street_address_one' );
			delete_option ( 'rsmt_address_locality_one' );
			delete_option ( 'rsmt_address_region_one' );
			delete_option ( 'rsmt_postal_code_one' );
			delete_option ( 'rsmt_address_country_one' );
			delete_option ( 'rsmt_street_address_two' );
			delete_option ( 'rsmt_address_locality_two' );
			delete_option ( 'rsmt_address_region_two' );
			delete_option ( 'rsmt_postal_code_two' );
			delete_option ( 'rsmt_address_country_two' );
			delete_option ( 'rsmt_email' );
			delete_option ( 'rsmt_best_rating' );
			delete_option ( 'rsmt_rating_value' );
			delete_option ( 'rsmt_open' );
			delete_option ( 'rsmt_close' );
			delete_option ( 'rsmt_dow' );
			delete_option ( 'rsmt_seeks' );
			delete_option ( 'rsmt_seeks_url' );
			delete_option ( 'rsmt_seeks_name' );
			delete_option ( 'rsmt_seeks_description' );
			delete_option ( 'rsmt_member' );
			delete_option ( 'rsmt_member_name' );
			delete_option ( 'rsmt_member_url' );
			delete_option ( 'rsmt_member_description' );
			delete_option ( 'rsmt_founder_role' );
			delete_option ( 'rsmt_employee_role' );
			delete_option ( 'rsmt_review' );
			delete_option ( 'rsmt_review_default' );
			delete_option ( 'rsmt_keyword' );
			delete_option ( 'rsmt_monday' );
			delete_option ( 'rsmt_tuesday' );
			delete_option ( 'rsmt_wednesday' );
			delete_option ( 'rsmt_thursday' );
			delete_option ( 'rsmt_friday' );
			delete_option ( 'rsmt_saturday' );

		}

		/** function/file_path
		 * Usage: includes the plugin file path
		 * Arg(0): null
		 * Return: void
		 */

		public static function rsmt_file_path (
			$file
		) {

			return ABSPATH . 'wp-content/plugins/' . str_replace ( basename ( __FILE__ ) , "" , plugin_basename ( __FILE__ ) ) . $file;
		}


		/** function/register_settings
		 * Usage: registers the plugins options
		 * Arg(0): null
		 * Return: void
		 */
		public static function rsmt_register ()
		{
			global $wpdb;

			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_status' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_type' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_name' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_description' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_url' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_image' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_sameas' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_payment_accepted' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_geo_location_one' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_longitude_one' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_latitude_one' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_geo_location_two' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_longitude_two' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_latitude_two' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_telephone_one' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_telephone_two' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_fax_number_one' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_fax_number_two' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_street_address_one' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_address_locality_one' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_address_region_one' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_postal_code_one' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_address_country_one' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_street_address_two' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_address_locality_two' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_address_region_two' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_postal_code_two' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_address_country_two' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_email' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_best_rating' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_worst_rating' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_rating_count' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_rating_value' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_open' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_close' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_dow' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_seeks' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_seeks_name' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_seeks_url' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_seeks_description' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_member' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_member_name' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_member_url' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_member_description' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_founder_role' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_employee_role' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_reviews' , 'rsmt_review' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_reviews' , 'rsmt_review_default' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_reviews' , 'rsmt_keyword' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_monday' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_tuesday' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_wednesday' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_thursday' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_friday' );
			register_setting ( 'RSMT_Local_Business_Schema_ID' . '_options' , 'rsmt_saturday' );


			$table_name = $wpdb->prefix . "rsmt_";

			$sql = "CREATE TABLE $table_name (
		                        id mediumint(9) NOT NULL AUTO_INCREMENT,
		                        author VARCHAR(100) NOT NULL,
		                        pid VARCHAR(10) NOT NULL,
		                        review_body TEXT NOT NULL,
		                        url VARCHAR(255) NOT NULL,
		                        provider VARCHAR(100) NOT NULL,
		                        description VARCHAR(160) NOT NULL,
		                        date_created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		                        PRIMARY KEY id (id),
		                        UNIQUE KEY pid (pid)
		                        );
                   		";

			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

			dbDelta($sql);


		}

		/** function/method
		 * Usage: hooking (registering) the plugin menu
		 * Arg(0): null
		 * Return: void
		 */
		static function rsmt_menu ()
		{

			$icon_url = str_replace ( basename ( __FILE__ ) , "" , plugin_basename ( __FILE__ ) );
			//add__page ( 'RSMT Schema' . ' Plugin Options' , 'RSMT Schema' , '' , RSMT_Local_Business_Schema_ID . '_options' , array ( 'rsmtschema' , 'rsmt_options_page' ) , plugins_url ( $icon_url . 'rsmt_icon.png' ) );
			add_options_page( 'RSMT Schema', 'RSMT Schema', 'manage_options', 'options.php');
			//add_submenu_page(RSMT_Local_Business_Schema_ID . '_options', RSMT_Local_Business_Schema_NICK . ' Reviews', 'Reviews', '10', RSMT_Local_Business_Schema_ID . '_reviews', array('rsmtschema', 'rsmt_reviews_page'));
		}

		/** function/options_page
		 * Usage: show options/settings for plugin
		 * Arg(0): null
		 * Return: void
		 */
		static function rsmt_options_page ()
		{

			$plugin_id = RSMT_Local_Business_Schema_ID;
			// display options page
			include ( self::rsmt_file_path ( 'options.php' ) );

		}

		/** function/reviews_page
		 * Usage: show options/settings for plugin
		 * Arg(0): null
		 * Return: void

		public static function rsmt_reviews_page (){
			$plugin_id = RSMT_Local_Business_Schema_ID;
			// display options page
			include ( self::rsmt_file_path ( 'reviews.php' ) );
		}
*/
/*
		public static function genReveiws()
		{
			require_once('reviews_class.php');
			$reviews = new Reviews();
			global $wpdb;
			$table_name = $wpdb->prefix . "rsmt_reviews";
			$args = array ('post_status'      => 'publish');

			$posts = get_posts( $args );
			$pages = get_pages( $args );
			$array = array_merge($posts, $pages);
			foreach( $array as $val ){

				$data = explode('::', $reviews->buildReview());

				$wpdb->replace(
					$table_name,
					array(
					     'pid' => $val->ID,
					     'author' => $data[0],
					     'review_body' => $data[1],
					     'provider' => $data[2],
					     'url' => $data[3],
					     'description' => $data[4],
					     'date_created' => current_time('mysql', 1)

					)
				);
			}


		}


		public static function genReveiw($pid)
		{
			require_once('reviews_class.php');
			$reviews = new Reviews();
			global $wpdb;
			$table_name = $wpdb->prefix . "rsmt_reviews";
			$data = explode('::', $reviews->buildReview());

			$wpdb->insert(
				$table_name,
				array(
				     'pid' => $pid,
				     'author' => $data[0],
				     'review_body' => $data[1],
				     'provider' => $data[2],
				     'url' => $data[3],
				     'description' => $data[4],
				     'date_created' => current_time('mysql', 1)

				)
			);

		}
*/

		/** function/separateCapital
		 * Usage: separate string by capital letters with spaces
		 * Arg(0): null
		 * Return: parsed string
		 */
		public static function separateCapital ($str)
		{

			preg_match_all ( '/[A-Z][^A-Z]*/' , $str , $results );
			$result  = "";
			$results = $results[ 0 ];
			foreach ( $results as $val ) {
				$result .= $val . ' ';
			}

			return rtrim ( $result , ' ' );
		}


	}
}

add_action ( 'admin_init' , array ( 'rsmtschema' , 'rsmt_register' ) );
add_action ( 'admin_menu' , array ( 'rsmtschema' , 'rsmt_menu' ) );
add_action ( 'user_admin_menu' , array ( 'rsmtschema' , 'rsmt_menu' ) );


if ( get_option ( 'rsmt_status' ) == 1 ) {

	include ( 'rsmt_info.php' );


}
$rsmtschema = new rsmtschema();

?>