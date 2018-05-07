<?php
/**
 * Created by PhpStorm.
 * User: ander
 * Date: 5/6/2018
 * Time: 11:39 AM
 */

class byobsm_icon_css {

	public $design = array();

	public $button_icon_selectors = array(
		'open_button_icon'        => '#open-icon',
		'open_button_icon_hover'  => '#open-icon:hover',
		'close_button_icon'       => '#close-icon',
		'close_button_icon_hover' => '#close-icon:hover'
	);

	public function __construct( $design ) {
		$this->design = $design;
	}

	public function get_icon_styles() {
		$final_output = '';
		foreach ( $this->button_icon_selectors as $option => $s ) {
			$g            = new byobsm_generate_css_rules( $this->design[ $option ] );
			$output       = '';
			$output_start = "\n$s{";
			$output_end   = "\n}";

			if ( ! empty( $this->design[ $option ]['customize_margin'] ) ) {
				$output .= $g->margin();
			}
			if ( ! empty( $this->design[ $option ]['customize_positioning'] ) ) {
				$output .= $g->positioning();
			}
			if ( ! empty( $output ) ) {
				$final_output .= $output_start . $output . $output_end;
			}

		}

		return $final_output;
	}


	public function get_icon_span_styles() {
		$final_output = '';
		foreach ( $this->button_icon_selectors as $option => $s ) {
			$g            = new byobsm_generate_css_rules( $this->design[ $option ] );
			$output       = '';
			$output_start = "\n$s span{";
			$output_end   = "\n}";
			if ( ! empty( $this->design[ $option ]['customize_background_color'] ) ) {
				$output .= $g->background_color();
			}
			if ( ! empty( $output ) ) {
				$final_output .= $output_start . $output . $output_end;
			}

		}

		return $final_output;
	}

}