<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'RSMT_Schema' )  ) {
	class RSMT_Schema {
		function __construct() {
	 
		}

		function get_employee() {
			$rsmt_info = "";
			$employees = get_users( 'role=' . get_option( 'employee_role' ) . '&all_user_meta' );
			$rsmt_info .= '<span itemprop="employees" itemscope itemtype="http://schema.org/employees">';
			foreach ( $employees as $employee ) {
				if ( $employee->display_name ) {
					$employee_name = $employee->display_name;
				} else {
					$employee_name = $employee->user_nicename;
				}
				$rsmt_info .= '<span itemprop="employee" itemscope itemtype="http://schema.org/Person">';
				$rsmt_info .= '<a itemprop="url" href="http://microdataproject.org/author/' . $employee->user_login . '/" class="visuallyhidden"><span itemprop="name">' . $employee_name . '</span></a>';
				/* email */
				if ( $employee->user_email ) {
					$rsmt_info .= '<meta itemprop="email" content="' . $employee->user_email . '" />';
				}
				if ( $employee->job_title ){
					$rsmt_info .= '<meta itemprop="jobTitle" content="' . $employee->user_email . '" />';
				}
				if ( $employee->description ) {
					$rsmt_info .= '<meta itemprop="description" content="' . $employee->description . '" />';
				}
				$rsmt_info .= '</span>';
			}
			$rsmt_info .= '</span>';
			return $rsmt_info;
		}
	}
}
$RSMT_Schema = new RSMT_Schema;