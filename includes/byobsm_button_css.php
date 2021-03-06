<?php
/**
 * Created by PhpStorm.
 * User: ander
 * Date: 5/6/2018
 * Time: 11:39 AM
 */

class byobsm_button_css {
	public $design = array();
	public $button_selectors = array(
		'open_button' => '.byobsm-menu-button',
		'open_button_hover' => '.byobsm-menu-button:hover',
		'close_button' => '.byobsm-close-menu-button',
		'close_button_hover' => '.byobsm-close-menu-button:hover'
	);
	public $button_text_selectors = array(
		'open_button' => '.byobsm-open-text',
		'open_button_hover' => '.byobsm-open-text:hover',
		'close_button' => '.byobsm-close-text',
		'close_button_hover' => '.byobsm-close-text:hover'
	);

	public function __construct($design) {
		$this->design = $design;
	}

	public function get_button_styles(){
		$final_output = '';
		foreach ($this->button_selectors as $option => $s){
			$g = new byobsm_generate_css_rules($this->design[$option]);
			$output = '';
			$output_start = "\n$s{";
			$output_end = "\n}";
			if(!empty($this->design[$option]['customize_background_color'])){
				$output .= $g->background_color();
			}
			if(!empty($this->design[$option]['customize_padding'])){
				$output .= $g->padding();
			}
			if(!empty($this->design[$option]['customize_margin'])){
				$output .= $g->margin();
			}
			if(!empty($this->design[$option]['add_border'])){
				$output .= $g->border();
			}
			if(!empty($this->design[$option]['customize_positioning'])){
				$output .= $g->positioning();
			}
			if(!empty($output)){
				$final_output .= $output_start . $output . $output_end;
			}

		}
		return $final_output;
	}

	public function get_button_text_styles(){
		$final_output = '';
		foreach ($this->button_text_selectors as $option => $s){
			$g = new byobsm_generate_css_rules($this->design[$option]);
			$output = '';
			$output_start = "\n$s{";
			$output_end = "\n}";
			if(!empty($this->design[$option]['font-family'])){
				$output .= $g->font_family($this->design[$option]['font-family']);
			}
			if(!empty($this->design[$option]['font-size'])){
				$output .= $g->font_size($this->design[$option]['font-size']);
			}
			if(!empty($this->design[$option]['color'])){
				$output .= $g->font_color();
			}
			if(!empty($this->design[$option]['line-height'])){
				$output .= $g->line_height();
			}
			if(!empty($this->design[$option]['customize_text_padding'])){
				$output .= $g->text_padding();
			}
			if(!empty($this->design[$option]['additional_styles'])){
				$output .= $g->additional_font_styles();
			}
			if(!empty($output)){
				$final_output .= $output_start . $output . $output_end;
			}

		}
		return $final_output;
	}
}