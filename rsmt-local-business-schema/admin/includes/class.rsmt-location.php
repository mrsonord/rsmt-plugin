<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'RSMT_Location' )  ) {
	class RSMT_Location {

		private function __construct() {
			$this->settings = array();
			$this->get_location_settings();
		
			add_action( 'init', 'register_location_post_type' );
		}
	
			function register_location_post_type(){
				$labels = array(
				'name'          => _x('Locations', 'post type general name', 'rsmt-tools' ),
				'singular_name'     => _x( 'Location', 'post type singular name', 'rsmt-tools' ),
				'menu_name'             => _x('Locations', 'admin menu', 'rsmt-tools' ),
				'add_new'            => _x( 'Add New', 'location', 'rsmt-tools' ),
				'add_new_item'       => __( 'Add New Location', 'rsmt-tools' ),
				'new_item'           => __( 'New Location', 'rsmt-tools' ),
				'edit_item'          => __( 'Edit Location', 'rsmt-tools' ),
				'view_item'          => __( 'View Location', 'rsmt-tools' ),
				'all_items'          => __( 'All Locations', 'rsmt-tools' ),
				'search_items'       => __( 'Search Locations', 'rsmt-tools' ),
				'parent_item_colon'  => __( 'Parent Locations:', 'rsmt-tools' ),
				'not_found'          => __( 'No locations found.', 'rsmt-tools' ),
				'not_found_in_trash' => __( 'No locations found in Trash.', 'rsmt-tools' )
				);
				
				$args = array(
				'labels'             => $labels,
				'public'             => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'location' ),
				'has_archive'        => false,
				'hierarchical'       => false,
				'menu_position'      => null,
				'description' => __( 'This is where you can create and manage locations.', 'rsmt-tools' ),
				'capability_type'     => 'post',
				'supports'        => array( 'title', 'custom-fields' ),
				);
			register_post_type( "location", $args );
			}
		}
	}
$RSMT_Location = new RSMT_Location;