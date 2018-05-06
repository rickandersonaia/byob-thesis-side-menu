<?php
/**
 * Created by PhpStorm.
 * User: ander
 * Date: 5/6/2018
 * Time: 7:43 AM
 */

class byobsm_design_options {

	public function open_button() {
		$fsc                                   = $this->font_size_color();
		$fonts                                 = $this->font_size_color();
		$background_color                      = $this->background_color();
		$padding                               = $this->padding_full();
		$padding['customize_padding']['label'] = __( 'Customize Button Padding', 'byobsm' );
		$margin                                = $this->margin_full();
		$margin['customize_margin']['label']   = __( 'Customize Button Margin', 'byobsm' );
		$position                              = $this->positioning();
		$border                                = $this->border();

		return array_merge( $fsc, $fonts, $background_color, $padding, $margin, $position );
	}

	public function open_button_icon() {
		$icon_color                                 = $this->color();
		$icon_color['color']['label']               = __( 'Choose an Icon Color', 'byobsm' );
		$icon_padding                               = $this->padding_full();
		$icon_padding['customize_padding']['label'] = __( 'Customize Icon Padding', 'byobsm' );

		return array_merge( $icon_color, $icon_padding );
	}

	public function open_button_hover() {
		$fsc              = $this->font_size_color();
		$fonts            = $this->font_size_color();
		$background_color = $this->background_color();
		$border           = $this->border();

		return array_merge( $fsc, $fonts, $background_color, $border );
	}

	public function open_button_icon_hover() {
		$icon_color                   = $this->color();
		$icon_color['color']['label'] = __( 'Choose an Icon Color', 'byobsm' );

		return array_merge( $icon_color );
	}

	public function close_button() {
		$fsc                                   = $this->font_size_color();
		$fonts                                 = $this->font_size_color();
		$background_color                      = $this->background_color();
		$padding                               = $this->padding_full();
		$padding['customize_padding']['label'] = __( 'Customize Button Padding', 'byobsm' );
		$margin                                = $this->margin_full();
		$margin['customize_margin']['label']   = __( 'Customize Button Margin', 'byobsm' );
		$position                              = $this->positioning();
		$border                                = $this->border();

		return array_merge( $fsc, $fonts, $margin, $padding, $background_color, $border, $position );
	}

	public function close_button_icon() {
		$icon_color                                 = $this->color();
		$icon_color['color']['label']               = __( 'Choose an Icon Color', 'byobsm' );
		$icon_padding                               = $this->padding_full();
		$icon_padding['customize_padding']['label'] = __( 'Customize Icon Padding', 'byobsm' );

		return array_merge( $icon_color, $icon_padding );
	}

	public function close_button_hover() {
		$fsc              = $this->font_size_color();
		$fonts            = $this->font_size_color();
		$background_color = $this->background_color();
		$border           = $this->border();

		return array_merge( $fsc, $fonts, $background_color, $border );
	}

	public function close_button_icon_hover() {
		$icon_color                   = $this->color();
		$icon_color['color']['label'] = __( 'Choose an Icon Color', 'byobsm' );

		return array_merge( $icon_color );
	}

	public function overlay(){
		return $this->background_color();
	}

	public function navigation() {
		global $thesis;


		$nav['customize_colors']           = array(
			'type'       => 'checkbox',
			'label'      => __( 'Show Menu Color options', 'byobtsm' ),
			'options'    => array(
				'show' => __( 'Check to show the color options', 'byobtsm' ),
			),
			'dependents' => array( 'show' )
		);
		$nav['link_text_color']            = array(
			'type'   => 'color',
			'label'  => __( 'Link Text Color - <span class="note">or choose your own color</span>', 'byobtsm' ),
			'parent' => array(
				'customize_colors' => 'show'
			)
		);
		$nav['link_background_color']      = array(
			'type'   => 'color',
			'label'  => __( 'Link Custom Background Color - <span class="note">or choose your own color</span>', 'byobtsm' ),
			'parent' => array(
				'customize_colors' => 'show'
			)
		);
		$nav['link_background_opacity']    = array(
			'type'        => 'text',
			'width'       => 'short',
			'label'       => __( 'Link Background Color Opacity', 'byobtsm' ),
			'tooltip'     => __( 'The value should be less than 1 - in decimal format', 'byobtsm' ),
			'placeholder' => __( '0.9 - 0.1', 'byobtsm' ),
			'parent'      => array(
				'customize_colors' => 'show'
			)
		);
		$nav['hover_text_color']           = array(
			'type'   => 'color',
			'label'  => __( 'Hover Text Color - <span class="note">or choose your own color</span>', 'byobtsm' ),
			'parent' => array(
				'customize_colors' => 'show'
			)
		);
		$nav['hover_background_color']     = array(
			'type'   => 'color',
			'label'  => __( 'Hover Custom Background Color - <span class="note">or choose your own color</span>', 'byobtsm' ),
			'parent' => array(
				'customize_colors' => 'show'
			)
		);
		$nav['hover_background_opacity']   = array(
			'type'        => 'text',
			'width'       => 'short',
			'label'       => __( 'Hover Background Color Opacity', 'byobtsm' ),
			'tooltip'     => __( 'The value should be less than 1 - in decimal format', 'byobtsm' ),
			'placeholder' => __( '0.9 - 0.1', 'byobtsm' ),
			'parent'      => array(
				'customize_colors' => 'show'
			)
		);
		$nav['current_text_color']         = array(
			'type'   => 'color',
			'label'  => __( 'Current Text Color - <span class="note">or choose your own color</span>', 'byobtsm' ),
			'parent' => array(
				'customize_colors' => 'show'
			)
		);
		$nav['current_background_color']   = array(
			'type'   => 'color',
			'label'  => __( 'Current Custom Background Color', 'byobtsm' ),
			'parent' => array(
				'customize_colors' => 'show'
			)
		);
		$nav['current_background_opacity'] = array(
			'type'        => 'text',
			'width'       => 'short',
			'label'       => __( 'Current Background Color Opacity', 'byobtsm' ),
			'tooltip'     => __( 'The value should be less than 1 - in decimal format', 'byobtsm' ),
			'placeholder' => __( '0.9 - 0.1', 'byobtsm' ),
			'parent'      => array(
				'customize_colors' => 'show'
			)
		);

		$nav['menu_width']       = array(
			'type'        => 'text',
			'width'       => 'tiny',
			'label'       => __( 'Menu Width - desktop & tablet', 'byobtsm' ),
			'placeholder' => '400'
		);
		$nav['link_decoration']  = array(
			'type'    => 'select',
			'label'   => __( 'Menu Link Decoration', 'byobtsm' ),
			'options' => $thesis->api->css->properties['text-decoration']
		);
		$nav['hover_decoration'] = array(
			'type'    => 'select',
			'label'   => __( 'Menu Hover Decoration', 'byobtsm' ),
			'options' => $thesis->api->css->properties['text-decoration']
		);
		$nav['padding']          = $thesis->api->css->options['padding'];
		$nav['padding']['label'] = __( 'Menu Item Padding', 'byobtsm' );

		$fsc   = $this->font_size_color();
		$fonts = $this->fonts();
		unset( $fsc['color'] );
		unset( $fsc['opacity'] );

		return array_merge( $nav, $fsc, $fonts );
	}


	public function font_size_color() {
		global $thesis;
		$default                 = array(
			'font-family' => array(
				'type'    => 'select',
				'label'   => __( 'Font Family', 'byobsm' ),
				'options' => $thesis->api->css->properties['font-family']
			),
			'font-size'   => array(
				'type'        => 'text',
				'width'       => 'tiny',
				'label'       => __( 'Font Size', 'byobsm' ),
				'description' => 'px'
			),
			'line-height' => array(
				'type'        => 'text',
				'width'       => 'tiny',
				'label'       => __( 'Line Height', 'byobsm' ),
				'description' => 'Use this to over ride default settings',
				'parent'      => array(
					'additional_styles' => 'show'
				)
			)
		);
		$color                   = $this->color();
		$color['color']['label'] = __( 'Choose an Text Color', 'byobsm' );

		return array_merge( $default, $color );
	}

	public function fonts() {
		global $thesis;
		$fonts = array(
			'additional_styles' => array(
				'type'       => 'checkbox',
				'label'      => __( 'Show additional Font Style options', 'byobsm' ),
				'options'    => array(
					'show' => __( 'Check to show additional Font Style options', 'byobsm' ),
				),
				'dependents' => array( 'show' )
			),
			'font-weight'       => array(
				'type'    => 'select',
				'label'   => __( 'Font Weight', 'byobsm' ),
				'options' => $thesis->api->css->properties['font-weight'],
				'parent'  => array(
					'additional_styles' => 'show'
				)
			),
			'font-style'        => array(
				'type'    => 'select',
				'label'   => __( 'Font Style', 'byobsm' ),
				'options' => $thesis->api->css->properties['font-style'],
				'parent'  => array(
					'additional_styles' => 'show'
				)
			),
			'font-variant'      => array(
				'type'    => 'select',
				'label'   => __( 'Font Variant', 'byobsm' ),
				'options' => $thesis->api->css->properties['font-variant'],
				'parent'  => array(
					'additional_styles' => 'show'
				)
			),
			'text-transform'    => array(
				'type'    => 'select',
				'label'   => __( 'Font Text Transform', 'byobsm' ),
				'options' => $thesis->api->css->properties['text-transform'],
				'parent'  => array(
					'additional_styles' => 'show'
				)
			),
			'text-align'        => array(
				'type'    => 'select',
				'label'   => __( 'Font Text Align', 'byobsm' ),
				'options' => $thesis->api->css->properties['text-align'],
				'parent'  => array(
					'additional_styles' => 'show'
				)
			),
			'letter-spacing'    => array(
				'type'        => 'text',
				'width'       => 'tiny',
				'label'       => __( 'Letter Spacing', 'byobsm' ),
				'description' => 'px',
				'parent'      => array(
					'additional_styles' => 'show'
				)
			),
			'text-shadow'       => array(
				'type'        => 'text',
				'width'       => 'medium',
				'label'       => __( 'Text Shadow', 'byobsm' ),
				'placeholder' => '2px 2px 2px rgba(0,0,0,0.5)',
				'parent'      => array(
					'additional_styles' => 'show'
				)
			)
		);

		return $fonts;
	}

	public function color() {
		$color = array(
			'color'   => array(
				'type'  => 'color',
				'label' => __( 'Choose a color', 'byobsm' )
			),
			'opacity' => array(
				'type'        => 'text',
				'width'       => 'short',
				'label'       => __( 'Color Opacity', 'byobsm' ),
				'tooltip'     => __( 'The value should be less than 1 - in decimal format', 'byobsm' ),
				'placeholder' => __( '0.9 - 0.1', 'byobsm' )
			)
		);

		return $color;
	}

	public function background_color() {
		$background = array(
			'customize_backgrpound_color' => array(
				'type'       => 'checkbox',
				'label'      => __( 'Customize background color', 'byobsm' ),
				'options'    => array(
					'show_color' => __( 'Check to show background color options', 'byobsm' ),
				),
				'dependents' => array( 'show_color' )
			),
			'background-color'            => array(
				'type'   => 'color',
				'label'  => __( 'Choose your own background color', 'byobsm' ),
				'parent' => array(
					'customize_backgrpound_color' => 'show_color'
				)
			),
			'background-opacity'          => array(
				'type'        => 'text',
				'width'       => 'short',
				'label'       => __( 'Background Color Opacity', 'byobsm' ),
				'tooltip'     => __( 'The value should be less than 1 - in decimal format', 'byobsm' ),
				'placeholder' => __( '0.9 - 0.1', 'byobsm' ),
				'parent'      => array(
					'customize_backgrpound_color' => 'show_color'
				)
			)
		);

		return $background;
	}

	public function positioning() {
		$positioning = array(
			'customize_positioning' => array(
				'type'       => 'checkbox',
				'label'      => __( 'Customize the positioning styles', 'byobsm' ),
				'options'    => array(
					'show' => __( 'Check to show positioning options', 'byobsm' ),
				),
				'dependents' => array( 'show' )
			),
			'position'              => array(
				'type'    => 'select',
				'label'   => __( 'Position setting', 'byobsm' ),
				'options' => array(
					''         => __( 'select a value', 'byobsm' ),
					'absolute' => __( 'absolute', 'byobsm' ),
					'relative' => __( 'relative', 'byobsm' ),
					'fixed'    => __( 'fixed', 'byobsm' ),
					'initial'  => __( 'initial', 'byobsm' )
				),
				'parent'  => array(
					'customize_positioning' => 'show'
				)
			),
			'display'               => array(
				'type'    => 'select',
				'label'   => __( 'Display setting', 'byobsm' ),
				'options' => array(
					''             => __( 'select a value', 'byobsm' ),
					'block'        => __( 'block', 'byobsm' ),
					'inline'       => __( 'inline', 'byobsm' ),
					'inline-block' => __( 'inline block', 'byobsm' ),
					'table'        => __( 'table', 'byobsm' ),
					'inline-table' => __( 'inline table', 'byobsm' ),
					'initial'      => __( 'initial', 'byobsm' )
				),
				'parent'  => array(
					'customize_positioning' => 'show'
				)
			),
			'float'                 => array(
				'type'    => 'select',
				'label'   => __( 'Float setting', 'byobsm' ),
				'options' => array(
					''      => __( 'select a value', 'byobsm' ),
					'left'  => __( 'left', 'byobsm' ),
					'right' => __( 'right', 'byobsm' ),
					'none'  => __( 'none', 'byobsm' )
				),
				'parent'  => array(
					'customize_positioning' => 'show'
				)
			),
			'clear'                 => array(
				'type'    => 'select',
				'label'   => __( 'Clear setting', 'byobsm' ),
				'options' => array(
					''      => __( 'select a value', 'byobsm' ),
					'left'  => __( 'left', 'byobsm' ),
					'right' => __( 'right', 'byobsm' ),
					'both'  => __( 'both', 'byobsm' ),
					'none'  => __( 'none', 'byobsm' )
				),
				'parent'  => array(
					'customize_positioning' => 'show'
				)
			),
			'self_clearning'        => array(
				'type'    => 'checkbox',
				'label'   => __( 'Remove self clearing from the button wrapper', 'byobsm' ),
				'options' => array(
					'remove' => __( 'Check to remove the self clearning', 'byobsm' ),
				),
				'parent'  => array(
					'customize_positioning' => 'show'
				)
			)
		);

		return $positioning;
	}

	public function padding_full() {
		return array(
			'customize_padding' => array(
				'type'       => 'checkbox',
				'label'      => __( 'Customize the padding', 'byobtsm' ),
				'options'    => array(
					'show_padding' => __( 'Check to show padding options', 'byobtsm' ),
				),
				'dependents' => array( 'show_padding' )
			),
			'padding-top'       => array(
				'type'   => 'text',
				'width'  => 'tiny',
				'label'  => __( 'Top Padding', 'byobtsm' ),
				'parent' => array(
					'customize_padding' => 'show_padding'
				)
			),
			'padding-bottom'    => array(
				'type'   => 'text',
				'width'  => 'tiny',
				'label'  => __( 'Bottom Padding', 'byobtsm' ),
				'parent' => array(
					'customize_padding' => 'show_padding'
				)
			),
			'padding-left'      => array(
				'type'   => 'text',
				'width'  => 'tiny',
				'label'  => __( 'Left Padding', 'byobtsm' ),
				'parent' => array(
					'customize_padding' => 'show_padding'
				)
			),
			'padding-right'     => array(
				'type'   => 'text',
				'width'  => 'tiny',
				'label'  => __( 'Right Padding', 'byobtsm' ),
				'parent' => array(
					'customize_padding' => 'show_padding'
				)
			)
		);
	}

	public function margin_full() {
		return array(
			'customize_margin' => array(
				'type'       => 'checkbox',
				'label'      => __( 'Customize the margin', 'byobtsm' ),
				'options'    => array(
					'show_margin' => __( 'Check to show margin options', 'byobtsm' ),
				),
				'dependents' => array( 'show_margin' )
			),
			'margin-top'       => array(
				'type'   => 'text',
				'width'  => 'tiny',
				'label'  => __( 'Top Margin', 'byobtsm' ),
				'parent' => array(
					'customize_margin' => 'show_margin'
				)
			),
			'margin-bottom'    => array(
				'type'   => 'text',
				'width'  => 'tiny',
				'label'  => __( 'Bottom Margin', 'byobtsm' ),
				'parent' => array(
					'customize_margin' => 'show_margin'
				)
			),
			'margin-left'      => array(
				'type'   => 'text',
				'width'  => 'tiny',
				'label'  => __( 'Left Margin', 'byobtsm' ),
				'parent' => array(
					'customize_margin' => 'show_margin'
				)
			),
			'margin-right'     => array(
				'type'   => 'text',
				'width'  => 'tiny',
				'label'  => __( 'Right Margin', 'byobtsm' ),
				'parent' => array(
					'customize_margin' => 'show_margin'
				)
			)
		);
	}

	public function border() {
		global $thesis;
		$border = array(
			'add_border'           => array(
				'type'       => 'checkbox',
				'label'      => __( 'Add a border', 'byobtsm' ),
				'options'    => array(
					'show_border' => __( 'Check to show border style options', 'byobtsm' ),
				),
				'dependents' => array( 'show_border' )
			),
			'border-style'         => array(
				'type'    => 'select',
				'label'   => __( 'Border Style', 'byobtsm' ),
				'options' => $thesis->api->css->properties['border-style'],
				'parent'  => array(
					'add_border' => 'show_border'
				)
			),
			'border-width'         => array(
				'type'   => 'text',
				'width'  => 'short',
				'label'  => __( 'Border Width', 'byobtsm' ),
				'parent' => array(
					'add_border' => 'show_border'
				)
			),
			'border-color'         => array(
				'type'   => 'color',
				'label'  => __( 'Border Color', 'byobtsm' ),
				'parent' => array(
					'add_border' => 'show_border'
				)
			),
			'border-radius'        => array(
				'type'   => 'text',
				'width'  => 'short',
				'label'  => __( 'Border Radius', 'byobtsm' ),
				'parent' => array(
					'add_border' => 'show_border'
				)
			),
			'shadow-color'         => array(
				'type'   => 'color',
				'label'  => __( 'Drop Shadow Color', 'byobtsm' ),
				'parent' => array(
					'add_border' => 'show_border'
				)
			),
			'shadow-offsets'       => array(
				'type'        => 'text',
				'width'       => 'short',
				'label'       => __( 'Drop Shadow Offsets & Blur', 'byobtsm' ),
				'parent'      => array(
					'add_border' => 'show_border'
				),
				'placeholder' => '3px 3px 3px'
			),
			'shadow_color_opacity' => array(
				'type'        => 'text',
				'width'       => 'short',
				'label'       => __( 'Shadow Color Opacity', 'byobtsm' ),
				'tooltip'     => __( 'The value should be less than 1 - in decimal format', 'byobtsm' ),
				'placeholder' => __( '0.9 - 0.1', 'byobtsm' ),
				'parent'      => array(
					'add_border' => 'show_border'
				)
			)
		);

		return $border;
	}
}