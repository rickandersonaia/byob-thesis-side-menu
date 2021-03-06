<?php
/**
 * Created by PhpStorm.
 * User: ander
 * Date: 5/6/2018
 * Time: 11:41 AM
 */

class byobsm_overlay_css {
	public $design = array();


	public function __construct( $design ) {
		$this->design = $design;
	}

	public function get_overlay_styles(){
		// overlay background color
		global $thesis;
		$design   = $this->design;
		$selector = '#byobsm-overlay.byobsm-content-overlay';
		$g        = new byobsm_generate_css_rules( $design['overlay_styles'] );

		$final_output = '';
		$output       = '';
		$output_start = "\n$selector{";
		$output_end   = "\n}";

		if(!empty($design['overlay_styles']['customize_background_color'])){
			$output .= $g->background_color();
		}

		if ( ! empty( $output ) ) {
			$final_output .= $output_start . $output . $output_end;
		}

		return $final_output;
	}
}