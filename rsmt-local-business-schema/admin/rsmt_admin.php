<?php

class RSMT_Admin{
    function __construct() {
        add_action('admin_menu', array($this, 'init_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'print_styles'));
    }
    
    function print_styles(){
    	wp_enqueue_style( 'rsmt_admin_style', plugin_dir_url( __FILE__ ) . 'views/styles/rsmt_admin_style.css');
    }
    
    /**
    * function/options_page
    * Usage: show options/settings for plugin
    * Arg(0): null
    * Return: void
    */
    function init_admin_menu(){
        $menuTitle = '';
        add_menu_page(
            'RSMT Tools - Main',
            'RSMT Tools',
            'manage_options',
            'rsmt_tools_settings',
            array(&$this, 'render_settings_main_page'),
            plugins_url('views/img/icon.png', __FILE__)
            );
        add_submenu_page(
            'rsmt_tools_settings',
            'RSMT Tools - Main',
            'RSMT Tools Options',
            'manage_options',
            'rsmt_tools_settings',
            array(&$this, 'render_settings_main_page')
            );
        add_submenu_page(
            'rsmt_tools_settings',
            'RSMT Tools - Schema Options',
            'Schema Options',
            'manage_options',
            'rsmt_tools_schema_data',
            array(&$this, 'render_schema_settings_page')
            );
    }

    function render_settings_main_page(){
        $rsmtPath = plugin_dir_url( __FILE__ );
        include ('views/rsmt_main_options_view.php');
    }

    function render_schema_settings_page(){
      $rsmtPath = plugin_dir_url( __FILE__ );
      include ('views/rsmt_schema_options.php');
      screen_icon();
    }
}
	global $RSMT_Admin;
	$RSMT_Admin = new RSMT_Admin;
