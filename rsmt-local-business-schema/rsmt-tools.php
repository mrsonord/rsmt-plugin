<?php
/**
* Plugin Name: RSMT Schema
* Description: Local business Schema Creator
* Version: 0.2
* Plugin URI: http://repairshopmarketingtools.com
* Author: Samuel Nord
* Author URI: mailto:sam@repairshopmarketingtools.com
*/
// DEFINE PLUGIN ID
define('RSMT_TOOLS_ID', 'rsmt_local_business_schema');


if (!class_exists('RSMT_Tools') ) {
    class RSMT_Tools{
        public $name;
        /**
         * function/construct
         * @args: null
         * @return: void
         */
        public function __construct(){
            //$useEmbeddedFramework = true;
            $this->name = 'rsmtLocalBusinessInfo';
            //require_once(trailingslashit( dirname(__FILE__) ) . 'admin/includes/titan-framework/titan-framework.php' );
            register_activation_hook(__FILE__, array($this, 'rsmtActivate') );
            register_deactivation_hook(__FILE__, array($this, 'rsmtDeactivate') );
            add_action('admin_init', array($this, 'rsmtRegister') );
            //require(plugins_url('admin/includes/titan-framework/titan-framework.php', __FILE__));
            //register_uninstall_hook (__FILE__, array ($this, 'rsmtUninstall'));
        }

        /**
         * function/activate
         * Usage: create tables if not exist and activates the plugin
         * Arg(0): null
         * @return: void
         */
        function rsmtActivate(){
            add_option('rsmt_status');
            add_option('rsmt_type');
            add_option('rsmt_name');
            add_option('rsmt_description');
            add_option('rsmt_url');
            add_option('rsmt_image');
            add_option('rsmt_sameas');
            add_option('rsmt_payment_accepted');
            add_option('rsmt_locations');
            add_option('rsmt_street_address_one');
            add_option('rsmt_address_locality_one');
            add_option('rsmt_address_region_one');
            add_option('rsmt_postal_code_one');
            add_option('rsmt_address_country_one');
            add_option('rsmt_street_address_two');
            add_option('rsmt_address_locality_two');
            add_option('rsmt_address_region_two');
            add_option('rsmt_postal_code_two');
            add_option('rsmt_address_country_two');
            add_option('rsmt_email');
            add_option('rsmt_telephone_one');
            add_option('rsmt_telephone_two');
            add_option('rsmt_fax_number_one');
            add_option('rsmt_fax_number_two');
            add_option('rsmt_best_rating');
            add_option('rsmt_rating_value');
            add_option('rsmt_open');
            add_option('rsmt_close');
            add_option('rsmt_dow');
            add_option('rsmt_seeks');
            add_option('rsmt_seeks_url');
            add_option('rsmt_seeks_name');
            add_option('rsmt_seeks_description');
            add_option('rsmt_member');
            add_option('rsmt_member_url');
            add_option('rsmt_member_name');
            add_option('rsmt_member_description');
            add_option('rsmt_geo_location_one');
            add_option('rsmt_longitude_one');
            add_option('rsmt_latitude_one');
            add_option('rsmt_geo_location_two');
            add_option('rsmt_longitude_two');
            add_option('rsmt_latitude_two');
            add_option('rsmt_founder_role');
            add_option('rsmt_employee_role');
            add_option('rsmt_review');
            add_option('rsmt_review_default');
            add_option('rsmt_keyword');
            add_option('rsmt_monday');
            add_option('rsmt_tuesday');
            add_option('rsmt_wednesday');
            add_option('rsmt_thursday');
            add_option('rsmt_friday');
            add_option('rsmt_saturday');
        }

        /**
         * function/deactivate
         * Usage: create tables if not exist and activates the plugin
         * Arg(0): null
         * @return: void
         */
        function rsmtDeactivate(){
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_status');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_type');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_name');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_description');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_url');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_image');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_sameas');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_payment_accepted');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_locations');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_geo_location_one');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_longitude_one');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_latitude_one');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_geo_location_two');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_longitude_two');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_latitude_two');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_telephone_one');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_telephone_two');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_fax_number_one');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_fax_number_two');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_street_address_one');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_address_locality_one');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_address_region_one');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_postal_code_one');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_address_country_one');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_street_address_two');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_address_locality_two');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_address_region_two');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_postal_code_two');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_address_country_two');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_email');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_best_rating');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_worst_rating');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_rating_count');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_rating_value');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_open');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_close');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_dow');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_seeks');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_seeks_url');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_seeks_name');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_seeks_description');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_member');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_member_url');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_member_name');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_member_description');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_founder_role');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_employee_role');
            unregister_setting('RSMT_TOOLS_ID' . '_reviews', 'rsmt_review');
            unregister_setting('RSMT_TOOLS_ID' . '_reviews', 'rsmt_review_default');
            unregister_setting('RSMT_TOOLS_ID' . '_reviews', 'rsmt_keyword');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_monday');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_tuesday');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_wednesday');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_thursday');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_friday');
            unregister_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_saturday');
        }

        /**
         * function/uninstall
         * Usage: create tables if not exist and activates the plugin
         * Arg(0): null
         * @return: void
         */
        function rsmtUninstall(){
            delete_option('rsmt_status');
            delete_option('rsmt_type');
            delete_option('rsmt_name');
            delete_option('rsmt_description');
            delete_option('rsmt_url');
            delete_option('rsmt_image');
            delete_option('rsmt_sameas');
            delete_option('rsmt_payment_accepted');
            delete_option('rsmt_locations');
            delete_option('rsmt_geo_location_one');
            delete_option('rsmt_longitude_one');
            delete_option('rsmt_latitude_one');
            delete_option('rsmt_geo_location_two');
            delete_option('rsmt_longitude_two');
            delete_option('rsmt_latitude_two');
            delete_option('rsmt_telephone_one');
            delete_option('rsmt_telephone_two');
            delete_option('rsmt_fax_number_one');
            delete_option('rsmt_fax_number_two');
            delete_option('rsmt_street_address_one');
            delete_option('rsmt_address_locality_one');
            delete_option('rsmt_address_region_one');
            delete_option('rsmt_postal_code_one');
            delete_option('rsmt_address_country_one');
            delete_option('rsmt_street_address_two');
            delete_option('rsmt_address_locality_two');
            delete_option('rsmt_address_region_two');
            delete_option('rsmt_postal_code_two');
            delete_option('rsmt_address_country_two');
            delete_option('rsmt_email');
            delete_option('rsmt_best_rating');
            delete_option('rsmt_rating_value');
            delete_option('rsmt_open');
            delete_option('rsmt_close');
            delete_option('rsmt_dow');
            delete_option('rsmt_seeks');
            delete_option('rsmt_seeks_url');
            delete_option('rsmt_seeks_name');
            delete_option('rsmt_seeks_description');
            delete_option('rsmt_member');
            delete_option('rsmt_member_name');
            delete_option('rsmt_member_url');
            delete_option('rsmt_member_description');
            delete_option('rsmt_founder_role');
            delete_option('rsmt_employee_role');
            delete_option('rsmt_review');
            delete_option('rsmt_review_default');
            delete_option('rsmt_keyword');
            delete_option('rsmt_monday');
            delete_option('rsmt_tuesday');
            delete_option('rsmt_wednesday');
            delete_option('rsmt_thursday');
            delete_option('rsmt_friday');
            delete_option('rsmt_saturday');
        }

        /** function/file_path
         * Usage: includes the plugin file path
         * Arg(0): null
         * @return: void
         */
        function rsmtFilePath ($file) {
            return ABSPATH . 'wp-content/plugins/' . str_replace (basename (__FILE__), "", plugin_basename (__FILE__) ) . $file;
        }

        /** function/register_settings
         * Usage: registers the plugins options
         * Arg(0): null
         * @return: void
         */
        function rsmtRegister(){
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_status');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_type');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_name');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_description');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_url');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_image');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_sameas');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_payment_accepted');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_locations');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_geo_location_one');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_longitude_one');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_latitude_one');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_geo_location_two');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_longitude_two');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_latitude_two');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_telephone_one');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_telephone_two');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_fax_number_one');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_fax_number_two');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_street_address_one');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_address_locality_one');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_address_region_one');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_postal_code_one');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_address_country_one');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_street_address_two');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_address_locality_two');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_address_region_two');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_postal_code_two');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_address_country_two');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_email');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_best_rating');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_worst_rating');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_rating_count');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_rating_value');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_open');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_close');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_dow');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_seeks');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_seeks_name');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_seeks_url');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_seeks_description');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_member');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_member_name');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_member_url');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_member_description');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_founder_role');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_employee_role');
            register_setting('RSMT_TOOLS_ID' . '_reviews', 'rsmt_review');
            register_setting('RSMT_TOOLS_ID' . '_reviews', 'rsmt_review_default');
            register_setting('RSMT_TOOLS_ID' . '_reviews', 'rsmt_keyword');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_monday');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_tuesday');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_wednesday');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_thursday');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_friday');
            register_setting('RSMT_TOOLS_ID' . '_options', 'rsmt_saturday');
        }

        /**
         * function/separateCapital
         * Usage: separate string by capital letters with spaces
         * Arg(0): null
         * Return: parsed string
         */
        function separateCapital($str)
        {
            preg_match_all('/[A-Z][^A-Z]*/', $str, $results);
            $result  = "";
            $results = $results[ 0 ];
            foreach ($results as $val) {
                $result .= $val . ' ';
            }
            return rtrim ($result, ' ');
        }
    }
}

require_once('admin/rsmt_admin.php');

if (get_option('rsmt_status') == 1 ) {
    include 'rsmt_info.php';
}
global $rsmtTools;
$rsmtTools = new RSMT_Tools();