<?php
/**
 * Created by PhpStorm.
 * User: ander
 * Date: 5/6/2018
 * Time: 11:40 AM
 */

class byobsm_menu_css {

	public $design = array();

	public $button_icon_selectors = array(
		'open_button_icon'        => '.sidenav',
		'open_button_icon_hover'  => '.sidenav a',
		'close_button_icon'       => '.sidenav a:hover',
		'close_button_icon_hover' => '.sidenav .current-menu-item a'
	);

	public function __construct( $design ) {
		$this->design = $design;
	}

	public function get_sidenav_styles() {
		global $thesis;
		$design   = $this->design;
		$selector = '.sidenav';
		$g        = new byobsm_generate_css_rules( $design['menu_styles'] );

		$final_output = '';
		$output       = '';
		$output_start = "\n$selector{";
		$output_end   = "\n}";

		if ( ! empty( $design['menu_styles']['customize_colors'] ) ) {
			$output .= $g->background_color( 'link' );
		}
		if ( ! empty( $design['menu_styles']['menu_width'] ) ) {
			$output .= "\n\twidth:" . $thesis->api->css->number( $design['menu_styles']['menu_width'] . ";" );
		}

		if ( ! empty( $output ) ) {
			$final_output .= $output_start . $output . $output_end;
		}

		return $final_output;
	}

	public function get_menu_link_styles() {
		global $thesis;
		$design   = $this->design;
		$selector = '.sidenav a';
		$g        = new byobsm_generate_css_rules( $design['menu_styles'] );

		$final_output = '';
		$output       = '';
		$output_start = "\n$selector{";
		$output_end   = "\n}";

		if ( ! empty( $this->design['menu_styles']['font-family'] ) ) {
			$output .= $g->font_family( $this->design['menu_styles']['font-family'] );
		}
		if ( ! empty( $this->design['menu_styles']['font-size'] ) ) {
			$output .= $g->font_size( $this->design['menu_styles']['font-size'] );
		}
		if ( ! empty( $design['menu_styles']['customize_colors'] ) ) {
			if ( ! empty( $design['menu_styles']['link_background-color'] ) ) {
				$output .= $g->background_color( 'link' );
			}
			if ( ! empty( $design['menu_styles']['link_text_color'] ) ) {
				$output .= "\n\tcolor: " . $thesis->api->colors->css( $design['menu_styles']['link_text_color'] ) . ";";
			}
		}
		if ( ! empty( $design['menu_styles']['link_decoration'] ) ) {
			$output .= "\n\ttext-decoration: " . $design['menu_styles']['link_decoration'] . ";";
		}
		if ( ! empty( $this->design['menu_styles']['customize_padding'] ) ) {
			$output .= $g->padding();
		}
		if ( ! empty( $this->design['menu_styles']['additional_styles'] ) ) {
			$output .= $g->additional_font_styles();
		}
		if ( ! empty( $output ) ) {
			$final_output .= $output_start . $output . $output_end;
		}

		return $final_output;
	}

	public function get_menu_hover_styles() {
		global $thesis;
		$design   = $this->design;
		$selector = '.sidenav a:hover';
		$g        = new byobsm_generate_css_rules( $design['menu_styles'] );

		$final_output = '';
		$output       = '';
		$output_start = "\n$selector{";
		$output_end   = "\n}";

		if ( ! empty( $design['menu_styles']['customize_colors'] ) ) {
			if ( ! empty( $design['menu_styles']['hover_background-color'] ) ) {
				$output .= $g->background_color( 'hover' );
			}
			if ( ! empty( $design['menu_styles']['hover_text_color'] ) ) {
				$output .= "\n\tcolor: " . $thesis->api->colors->css( $design['menu_styles']['hover_text_color'] ) . ";";
			}
		}
		if ( ! empty( $design['menu_styles']['hover_decoration'] ) ) {
			$output .= "\n\ttext-decoration: " . $design['menu_styles']['hover_decoration'] . ";";
		}
		if ( ! empty( $output ) ) {
			$final_output .= $output_start . $output . $output_end;
		}

		return $final_output;
	}

	public function get_menu_current_styles() {
		global $thesis;
		$design   = $this->design;
		$selector = '.sidenav .current-menu-item a';
		$g        = new byobsm_generate_css_rules( $design['menu_styles'] );

		$final_output = '';
		$output       = '';
		$output_start = "\n$selector{";
		$output_end   = "\n}";

		if ( ! empty( $design['menu_styles']['customize_colors'] ) ) {
			if ( ! empty( $design['menu_styles']['current_background-color'] ) ) {
				$output .= $g->background_color( 'current' );
			}
			if ( ! empty( $design['menu_styles']['current_text_color'] ) ) {
				$output .= "\n\tcolor: " . $thesis->api->colors->css( $design['menu_styles']['current_text_color'] ) . ";";
			}
			if ( ! empty( $output ) ) {
				$final_output .= $output_start . $output . $output_end;
			}
		}

		return $final_output;
	}
}