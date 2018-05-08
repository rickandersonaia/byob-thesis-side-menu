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

	public function background_color($state = '') {
		if(!empty($state)){ // $state is used for menu sytles: link, hover, current
			$bc_option = $state . '_background-color';
			$bo_option = $state . '_background-opacity';
		}else{
			$bc_option = 'background-color';
			$bo_option = 'background-opacity';
		}
		$final_color      = '';
		$background_color = ! empty( $this->design[$bc_option] ) ? $this->design[$bc_option] : '';
		$opacity          = ! empty( $this->design[$bo_option] ) ? $this->design[$bo_option] : '';
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

	public function text_padding() {
		global $thesis;
		$design = $this->design;
		$top    = ! empty( $design['padding-top_text'] ) ? $thesis->api->css->number( $design['padding-top_text'] ) : '0px';
		$right  = ! empty( $design['padding-right_text'] ) ? $thesis->api->css->number( $design['padding-right_text'] ) : '0px';
		$bottom = ! empty( $design['padding-bottom_text'] ) ? $thesis->api->css->number( $design['padding-bottom_text'] ) : '0px';
		$left   = ! empty( $design['padding-left_text'] ) ? $thesis->api->css->number( $design['padding-left_text'] ) : '0px';
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
		$design   = $this->design;
		$output   = '';
		$position = ! empty( $design['position'] ) ? $design['position'] : '';
		$display  = ! empty( $design['display'] ) ? $design['display'] : '';
		$float    = ! empty( $design['float'] ) ? $design['float'] : '';
		$clear    = ! empty( $design['clear'] ) ? $design['clear'] : '';
		$top    = ! empty( $design['top'] ) ? $thesis->api->css->number($design['top']) : '';
		$right    = ! empty( $design['right'] ) ? $thesis->api->css->number($design['right']) : '';
		$bottom    = ! empty( $design['bottom'] ) ? $thesis->api->css->number($design['bottom']) : '';
		$left    = ! empty( $design['left'] ) ? $thesis->api->css->number($design['left']) : '';
		if ( ! empty( $position ) ) {
			$output .= "\n\tposition: $position;";
		}
		if ( ! empty( $top ) ) {
			$output .= "\n\ttop: $top;";
		}
		if ( ! empty( $right ) ) {
			$output .= "\n\tright: $right;";
		}
		if ( ! empty( $bottom ) ) {
			$output .= "\n\tbottom: $bottom;";
		}
		if ( ! empty( $left ) ) {
			$output .= "\n\tleft: $left;";
		}
		if ( ! empty( $display ) ) {
			$output .= "\n\tdisplay: $display;";
		}
		if ( ! empty( $float ) ) {
			$output .= "\n\tfloat: $float;";
		}
		if ( ! empty( $clear ) ) {
			$output .= "\n\tclear: $clear;";
		}

		return $output;
	}

	public function font_family( $name ) {
		global $thesis;
		// initialize the return value to false
		$output = '';
		if ( ! empty( $name ) ) {
			// if there is a design option - use it
			$font   = $thesis->api->fonts->family( $name );
			$output = "\n\tfont-family: $font;";
		}

		return $output;
	}

	// takes the design option id ($name) and a default size
	// returns a formatted font size - or false
	public function font_size( $size ) {
		global $thesis;
		// initialize the return value to false
		$output = '';
		if ( ! empty( $size ) ) {
			// if there is a design option - use it
			$font   = $thesis->api->css->number( $size );
			$output = "\n\tfont-size: $font;";
		}

		return $output;
	}

	public function font_color() {
		$design  = $this->design;
		$output  = '';
		$color   = ! empty( $design['color'] ) ? $design['color'] : '';
		$opacity = ! empty( $design['opacity'] ) ? $design['opacity'] : '';
		if ( ! empty( $color ) ) {
			$final_color = $this->setup_color( $color, $opacity );
			$output      = "\n\tcolor: $final_color;";
		}

		return $output;
	}

	public function line_height() {
		global $thesis;
		$design = $this->design;
		$output = '';
		if ( ! empty( $design['line-height'] ) ) {
			$output = "\n\tline-height:" . $thesis->api->css->number( $design['line-height'] ) . ";";
		}

		return $output;
	}

	public function additional_font_styles() {
		global $thesis;
		$design         = $this->design;
		$output         = '';
		$font_weight    = ! empty( $design['font-weight'] ) ? $design['font-weight'] : '';
		$font_style     = ! empty( $design['font-style'] ) ? $design['font-style'] : '';
		$font_variant   = ! empty( $design['font-variant'] ) ? $design['font-variant'] : '';
		$text_transform = ! empty( $design['text-transform'] ) ? $design['text-transform'] : '';
		$text_align     = ! empty( $design['text-align'] ) ? $design['text-align'] : '';
		$letter_spacing = ! empty( $design['letter-spacing'] ) ? $design['letter-spacing'] : '';
		$text_shadow    = ! empty( $design['text-shadow'] ) ? $design['text-shadow'] : '';

		if ( ! empty( $font_weight ) ) {
			$output .= "\n\tfont-weight: $font_weight;";
		}
		if ( ! empty( $font_style ) ) {
			$output .= "\n\tfont-style: $font_style;";
		}
		if ( ! empty( $font_variant ) ) {
			$output .= "\n\tfont-variant: $font_variant;";
		}
		if ( ! empty( $text_transform ) ) {
			$output .= "\n\ttext-transform: $text_transform;";
		}
		if ( ! empty( $text_align ) ) {
			$output .= "\n\ttext-align: $text_align;";
		}
		if ( ! empty( $letter_spacing ) ) {
			$output .= "\n\tletter-spacing: " . $thesis->api->css->number( $letter_spacing ) . ";";
		}
		if ( ! empty( $text_shadow ) ) {
			$output .= "\n\ttext-shadow: $text_shadow;";
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