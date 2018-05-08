<?php
/**
 * Created by PhpStorm.
 * User: ander
 * Date: 5/8/2018
 * Time: 9:03 AM
 */

class byobsm_content_wrapper_css {
	public $design = array();

	public function __construct( $design ) {
		$this->design = $design;
	}

	public function get_content_wrapper_styles(){
		global $thesis;
		$design   = $this->design;
		$selector = '#byobsm-content-wrapper.byobsm-open';

		$final_output = '';
		$output       = '';
		$output_start = "\n$selector{";
		$output_end   = "\n}";

		if ( ! empty( $design['menu_styles']['menu_width'] ) ) {
			$output .= "\n\tmargin-left:" . $thesis->api->css->number( $design['menu_styles']['menu_width'] ) . ";";
		}

		if ( ! empty( $output ) ) {
			$final_output .= $output_start . $output . $output_end;
		}

		return $final_output;
	}
}