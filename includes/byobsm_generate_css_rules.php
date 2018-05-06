<?php
/**
 * Created by PhpStorm.
 * User: ander
 * Date: 5/6/2018
 * Time: 11:33 AM
 */

class byobsm_generate_css_rules {

	public $design = array();

	public function __construct( $design = array() ) {
		$this->design = $design;
	}

	public function background_color() {
		$final_color      = '';
		$background_color = ! empty( $this->design['background-color'] ) ? $this->design['background-color'] : '';
		$opacity          = ! empty( $this->design['background-opacity'] ) ? $this->design['background-opacity'] : '';
		if ( ! empty( $background_color ) ) {
			$color       = $this->setup_color( $background_color, $opacity );
			$final_color = "\n\tbackground-color: $color;";
		}

		return $final_color;
	}

	public function setup_color( $color, $opacity ) {
		global $thesis;
		$final_color = $solid_color = '';
		if ( ! empty( $color ) ) {
			$solid_color = $thesis->api->colors->css( $color );
		}
		if ( ! empty( $opacity ) && ! empty( $color ) ) {
			$final_color = $this->hex2rgba( $solid_color, $opacity );
		}
		if ( $final_color ) {
			return $final_color;
		} elseif ( $solid_color ) {
			return $solid_color;
		} else {
			return '';
		}
	}

	public function color() {

	}

	public function padding() {
		global $thesis;
		$design = $this->design;
		$top    = ! empty( $design['padding-top'] ) ? $thesis->api->css->number( $design['padding-top'] ) : '0px';
		$right  = ! empty( $design['padding-right'] ) ? $thesis->api->css->number( $design['padding-right'] ) : '0px';
		$bottom = ! empty( $design['padding-bottom'] ) ? $thesis->api->css->number( $design['padding-bottom'] ) : '0px';
		$left   = ! empty( $design['padding-left'] ) ? $thesis->api->css->number( $design['padding-left'] ) : '0px';
		$output = "\n\tpadding: $top $right $bottom $left;";

		return $output;

	}

	public function margin() {
		global $thesis;
		$design = $this->design;
		$top    = ! empty( $design['margin-top'] ) ? $thesis->api->css->number( $design['margin-top'] ) : '0px';
		$right  = ! empty( $design['margin-right'] ) ? $thesis->api->css->number( $design['margin-right'] ) : '0px';
		$bottom = ! empty( $design['margin-bottom'] ) ? $thesis->api->css->number( $design['margin-bottom'] ) : '0px';
		$left   = ! empty( $design['margin-left'] ) ? $thesis->api->css->number( $design['margin-left'] ) : '0px';
		$output = "\n\tmargin: $top $right $bottom $left;";

		return $output;

	}

	public function border() {
		global $thesis;
		$design         = $this->design;
		$border_color   = ! empty( $design['border-color'] ) ? $design['border-color'] : '#888';
		$opacity        = ! empty( $design['border-color-opacity'] ) ? $design['border-color-opacity'] : '';
		$shadow_color   = ! empty( $design['shadow-color'] ) ? $design['shadow-color'] : '';
		$shadow_opacity = ! empty( $design['shadow-color-opacity'] ) ? $design['shadow-color-opacity'] : '';
		$style          = ! empty( $design['border-style'] ) ? $design['border-style'] : 'solid';
		$width          = ! empty( $design['border-width'] ) ? $thesis->api->css->number( $design['border-width'] ) : '1px';
		$color          = $this->setup_color( $border_color, $opacity );
		$output         = "\n\tborder: $style $width $color;";

		if ( ! empty( $design['border-radius'] ) ) {
			$output .= "\n\tborder-radius:" . $thesis->api->css->number( $design['border-radius'] ) . ';';
		}
		if ( ! empty( $design['shadow-color'] ) || ! empty( $design['shadow-offsets'] ) ) {
			$output .= "\n\tbox-shadow:";
			if ( ! empty( $design['shadow-offsets'] ) ) {
				$output .= $thesis->api->css->number( $design['shadow-offsets'] );
			} else {
				$output .= '3px 3px 3px';
			}

			$shadow_color = $this->setup_color( $shadow_color, $shadow_opacity );
			$output       .= " $shadow_color;";
		}

		return $output;
	}

	public function positioning() {
		global $thesis;
		$design         = $this->design;
		$output = '';
		$position   = ! empty( $design['position'] ) ? $design['position'] : '';
		$display   = ! empty( $design['display'] ) ? $design['display'] : '';
		$float   = ! empty( $design['float'] ) ? $design['float'] : '';
		$clear   = ! empty( $design['clear'] ) ? $design['clear'] : '';
		if(!empty($position)){
			$output .= "\n\tposition: $position;";
		}
		if(!empty($display)){
			$output .= "\n\tdisplay: $display;";
		}
		if(!empty($float)){
			$output .= "\n\tfloat: $float;";
		}
		if(!empty($clear)){
			$output .= "\n\tclear: $clear;";
		}
		return $output;
	}


	public function hex2rgba( $color, $opacity = false ) {

		$default = 'rgb(0,0,0)';

		//Return default if no color provided
		if ( empty( $color ) ) {
			return $default;
		}

		//Sanitize $color if "#" is provided
		if ( $color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		//Check if color has 6 or 3 characters and get values
		if ( strlen( $color ) == 6 ) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		//Convert hexadec to rgb
		$rgb = array_map( 'hexdec', $hex );

		//Check if opacity is set(rgba or rgb)
		if ( $opacity ) {
			if ( abs( $opacity ) > 1 ) {
				$opacity = 1.0;
			}
			$output = 'rgba(' . implode( ",", $rgb ) . ',' . $opacity . ')';
		} else {
			$output = 'rgb(' . implode( ",", $rgb ) . ')';
		}

		//Return rgb(a) color string
		return $output;
	}


}