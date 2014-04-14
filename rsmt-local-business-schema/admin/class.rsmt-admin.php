<?php

if ( ! class_exists( 'RSMT_Admin' )  ) {
	class RSMT_Admin {

		function __construct() {
			add_action('admin_menu', array($this, 'init_admin_menu' ), 9);
			add_action('admin_enqueue_scripts', array($this, 'print_styles' ) );
			add_action('rsmtActivate', array($this, 'init_user_roles' ) );
			if (get_option('schema_status' ) == '1' ) {
				add_action('admin_menu', array($this, 'init_schema_options_page' ), 9);
			}
			if (get_option( 'whitelabel_status' ) == '1' ) {
				add_action( 'admin_menu', array( $this, 'init_whitelabel_options_page' ), 9);
			}
		}


		function print_styles(){
			wp_enqueue_style( 'rsmt_admin_style', plugin_dir_url( __FILE__ ) . 'views/styles/rsmt_admin_style.css', false, '0.2.3', false );
		}
		
		/**
		* function/options_page
		* Usage: show options/settings for plugin
		* Arg(0): null
		* Return: void
		*/
		function init_admin_menu(){
			add_menu_page(
				'RSMT Tools - Main',
				'RSMT Tools',
				'manage_options',
				'rsmt_tools_settings',
				array(&$this, 'render_main_options' ),
				plugins_url('views/img/icon.png', __FILE__)
			);
			add_submenu_page(
				'rsmt_tools_settings',
				'RSMT Tools - Main',
				'Functionality',
				'manage_options',
				'rsmt_tools_settings',
				array(&$this, 'render_main_options' )
				);
			}

		function init_schema_options_page(){
			add_submenu_page(
				'rsmt_tools_settings',
				'RSMT Tools - Schema Options',
				'Schema Options',
				'manage_options',
				'rsmt_tools_schema',
				array(&$this, 'render_schema_options' )
			);
			add_submenu_page(
				 'rsmt_tools_settings',
				 'RSMT Tools - Locations',
				 'Locations',
				 'manage_options',
				 'rsmt_tools_locations',
				 array(&$this, 'render_location_options' )
			 );
		}

		function init_whitelabel_options_page(){
			add_submenu_page(
				 'rsmt_tools_settings',
				 'RSMT Tools - Whitelabel',
				 'Whitelabel',
				 'manage_options',
				 'rsmt_tools_whitelabel',
				 array(&$this, 'render_whitelabel_options' )
			 );
		 }

		function render_main_options(){
			include ('views/rsmt_main_options.php' );
		}

		function render_schema_options(){
			include ('views/rsmt_schema_options.php' );
		//	screen_icon();
		}

		function render_location_options(){
			include ('views/rsmt_location_options.php' );
		}

		function render_whitelabel_options(){
			include ('views/rsmt_whitelabel_options.php' );
		}

		public function init_user_roles() {
			global $wp_roles;
			if ( class_exists( 'WP_Roles' ) && ! isset( $wp_roles ) ) {
				$wp_roles = new WP_Roles();
			}
			if ( is_object( $wp_roles ) ) {
				$wp_roles->add_cap( 'administrator', 'manage_locations' );
				add_role( 'owner', __( 'Owner', $this ), array(
					'read' 						=> true,
					'edit_posts' 				=> false,
					'delete_posts' 				=> false
				));
				add_role( 'manager', __( 'Manager', $this ), array(
					'read'						=> true,
					'edit_posts'				=> false,
					'delete_posts'				=> false
				) );
			}
		}
	}
}
	global $RSMT_Admin;
	$RSMT_Admin = new RSMT_Admin;
