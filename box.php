<?php

/*
  Name: BYOB Thesis Side Menu
  Author: Rick Anderson - BYOBWebsite.com
  Version: 2.0
  Requires: 2.3
  Description: A side menu for Thesis 2 skins.
  Class: byob_thesis_side_menu
  Docs: https://www.byobwebsite.com/addons/thesis-2/boxes/simple-footer-widgets/
  License: MIT

  Copyright 2018 BYOBWebsite.
  DIYthemes, Thesis, and the Thesis Theme are registered trademarks of DIYthemes, LLC.

  Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the
 * Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
 * PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 */

// ANY place you see "my" or "byob" make sure you replace it with your own prefix


class byob_thesis_side_menu extends thesis_box {

	public $type = 'box';

	public function translate() {
		$this->title = $this->name = __( 'BYOB Side Menu', 'byobsm' );
	}

	/**
	 *  Box API method of providing a pseudo constructor method
	 */
	protected function construct() {
		global $byob_ah;;

		if ( ! defined( 'BYOBSM_PATH' ) ) {
			define( 'BYOBSM_PATH', dirname( __FILE__ ) );
		}
		if ( ! defined( 'BYOBSM_URL' ) ) {
			define( 'BYOBSM_URL', THESIS_USER_BOXES_URL . '/' . basename( __DIR__ ) );
		}


		if ( is_admin() ) {
			if ( ! class_exists( 'byob_asset_handler' ) ) {
				include_once( BYOBSM_PATH . '/byob_asset_handler.php' );
			}
			if ( ! isset( $my_asset_handler ) ) {
				$byob_ah = new byob_asset_handler;
			}
			if ( ! class_exists( 'byobsm_design_options' ) ) {
				include_once( BYOBSM_PATH . '/includes/byobsm_design_options.php' );
			}
			if ( ! class_exists( 'byobsm_generate_css_rules' ) ) {
				include_once( BYOBSM_PATH . '/includes/byobsm_generate_css_rules.php' );
			}
			if ( ! class_exists( 'byobsm_button_css' ) ) {
				include_once( BYOBSM_PATH . '/includes/byobsm_button_css.php' );
			}
			if ( ! class_exists( 'byobsm_icon_css' ) ) {
				include_once( BYOBSM_PATH . '/includes/byobsm_icon_css.php' );
			}
			if ( ! class_exists( 'byobsm_menu_css' ) ) {
				include_once( BYOBSM_PATH . '/includes/byobsm_menu_css.php' );
			}
			if ( ! class_exists( 'byobsm_overlay_css' ) ) {
				include_once( BYOBSM_PATH . '/includes/byobsm_overlay_css.php' );
			}
			if ( ! class_exists( 'byobsm_static_css' ) ) {
				include_once( BYOBSM_PATH . '/includes/byobsm_static_css.php' );
			}
		}
	}


	/**
	 * @return array of HTML Option settings
	 *
	 * Box API Method for formatting HTML Options
	 */
	protected function html_options() {
		global $thesis;
		$html = $thesis->api->html_options();

		return $html;
	}

	/**
	 * @return array of Skin Content Options
	 *
	 * Box API Method for formatting Skin Content Options
	 */
	protected function options() {
		$menus[''] = __( 'Select a WP menu:', 'thesis' );
		foreach ( wp_get_nav_menus() as $menu ) {
			$menus[ (int) $menu->term_id ] = $menu->name;
		}

		return array(
			'menu'       => array(
				'type'    => 'select',
				'label'   => __( 'Menu To Display', 'thesis' ),
				'tooltip' => sprintf( __( 'Select a WordPress nav menu for this box to display. To edit your menus, visit the <a href="%s">WordPress nav menu editor</a>.', 'thesis' ), admin_url( 'nav-menus.php' ) ),
				'options' => $menus
			),
			'open_text'  => array(
				'type'    => 'text',
				'width'   => 'short',
				'label'   => __( 'Menu Open Text', 'thesis' ),
				'default' => __( 'MENU', 'thesis' )
			),
			'close_text' => array(
				'type'    => 'text',
				'width'   => 'short',
				'label'   => __( 'Menu Close Text', 'thesis' ),
				'default' => __( 'CLOSE', 'thesis' )
			)
		);
	}

	protected function class_options() {
		$fields  = new byobsm_design_options();
		$options = array(
			'style_types' => array(
				'type'    => 'object_set',
				'label'   => __( 'Sliding Menu Style Options', 'byobsm' ),
				'select'  => __( 'Choose the Elements to configure:', 'byobsm' ),
				'objects' => array(
					'open_button' => array(
						'type'   => 'object',
						'label'  => __( 'Open Menu Button Styles', 'byobsm' ),
						'fields' => $fields->open_button()
					),
					'open_button_icon' => array(
						'type' => 'object',
						'label' => __('Open Menu Icon Styles', 'byobsm'),
						'fields' => $fields->open_button_icon()
					),
					'open_button_hover' => array(
						'type' => 'object',
						'label' => __('Open Menu Button Hover Styles', 'byobsm'),
						'fields' => $fields->open_button_hover()
					),
					'open_button_icon_hover' => array(
						'type' => 'object',
						'label' => __('Open Menu Icon Hover Styles', 'byobsm'),
						'fields' => $fields->open_button_icon_hover()
					),
					'close_button' => array(
						'type' => 'object',
						'label' => __('Close Menu Button Styles', 'byobsm'),
						'fields' => $fields->close_button()
					),
					'close_button_icon' => array(
						'type' => 'object',
						'label' => __('Close Menu Icon Styles', 'byobsm'),
						'fields' => $fields->close_button_icon()
					),
					'close_button_hover' => array(
						'type' => 'object',
						'label' => __('Close Menu Button Hover Styles', 'byobsm'),
						'fields' => $fields->close_button_hover()
					),
					'close_button_icon_hover' => array(
						'type' => 'object',
						'label' => __('Close Menu Icon Hover Styles', 'byobsm'),
						'fields' => $fields->close_button_icon_hover()
					),
					'menu_styles' => array(
						'type' => 'object',
						'label' => __('Menu Style Configuration', 'byobsm'),
						'fields' => $fields->navigation()
					),
					'overlay_styles' => array(
						'type' => 'object',
						'label' => __('Overlay Styles', 'byobsm'),
						'fields' => $fields->overlay()
					)
				)
			)
		);

		return $options;
	}

	public function preload() {
		add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ) );
//		add_action( 'wp_enqueue_scripts', array( $this, 'add_styles' ) ); // comment out when live
		add_action( 'hook_before_html', array( $this, 'insert_menu' ), 99 );
		add_action( 'hook_after_html', array( $this, 'close_main' ), 1 );
	}

	public function add_scripts() {
		wp_enqueue_script( 'byobsm-side-menu', BYOBSM_URL . '/assets/js/byobsm-side-menu.js' );
	}

	public function add_styles() {
		wp_enqueue_style( 'byobsm-side-menu', BYOBSM_URL . '/assets/css/byobsm-styles.css' );
	}

	public function admin_init() {
		global $thesis;
		wp_enqueue_style('thesis-colors', THESIS_CSS_URL. '/colors.css', array('thesis-options'), $thesis->version);
		wp_enqueue_script('js-color', THESIS_JS_URL. '/jscolor/jscolor.js', array('thesis-options'), $thesis->version, true);
		wp_enqueue_script('thesis-colors', THESIS_JS_URL. '/colors.js', array('thesis-options', 'js-color'), $thesis->version, true);
	}

	public function insert_menu() {
		$tab        = str_repeat( "\t", 2 );
		$args       = array(
			'menu'       => $this->options['menu'],
			'menu_class' => 'side-navigation',
			'container'  => false
		);
		$close_text = ! empty( $this->options['close_tex'] )
			? trim( wp_kses_post( $this->options['close_tex'] ) )
			: 'Close';

		echo "<div id='byobsm-sidenav-wrapper' class='sidenav'>";
		echo "$tab<div class=\"byobsm-close-menu-button\" onclick=\"closeNav()\">\n";
		echo "$tab\t<div id=\"close-icon\">\n";
		echo "$tab\t\t<span></span>\n";
		echo "$tab\t\t<span></span>\n";
		echo "$tab\t\t<span></span>\n";
		echo "$tab\t</div>\n";
		echo "<span class=\"byobsm-close-text\"> $close_text</span>";
		echo "$tab</div>\n";
		wp_nav_menu( $args );
		echo '</div>';
		echo '<div id="byobsm-content-wrapper">';
	}

	public function close_main() {
		echo "\t<div id=\"byobsm-overlay\" onclick=\"closeNav()\"></div>\n";
		echo "</div>\n";
	}


	/**
	 * @param array $args - a variable containing $depth and other potential data
	 *
	 * Box API Method of outputting HTML at the location of the box in the template
	 * Typically echo'd rather than returned
	 */
	public function html( $args = array() ) {
		global $thesis;
		extract( $args = is_array( $args ) ? $args : array() );
		$depth     = isset( $depth ) ? $depth : 0;
		$tab       = str_repeat( "\t", $depth );
		$html      = 'div';
		$id        = ( ! empty( $this->options['id'] )
			? ' id="' . trim( esc_attr( $this->options['id'] ) ) . '"'
			: '' );
		$class     = ! empty( $this->options['class'] )
			? ' class="' . trim( esc_attr( $this->options['class'] ) ) . ' byobsm-menu-button"'
			: ' class="byobsm-menu-button"';
		$open_text = ! empty( $this->options['open_text'] )
			? trim( wp_kses_post( $this->options['open_text'] ) )
			: 'Menu';

		echo "$tab<$html$id$class onclick=\"openNav()\">\n";
		echo "$tab\t<div id=\"open-icon\">\n";
		echo "$tab\t\t<span></span>\n";
		echo "$tab\t\t<span></span>\n";
		echo "$tab\t\t<span></span>\n";
		echo "$tab\t</div>\n";
		echo "<span class=\"byobsm-open-text\"> $open_text</span>";
		echo "$tab</$html>\n";
	}

	public function filter_css($css){
		$button = new byobsm_button_css($this->class_options);
		$static_css = new byobsm_static_css();
		$icon_css = new byobsm_icon_css($this->class_options);
		$menu_css = new byobsm_menu_css($this->class_options);

		$new = "\n/* Begin BYOB Thesis Sliding Menu Styles */";
		$new .= "\n/* *** Static Styles *** */";
		$new .= $static_css->get_static_css();
		$new .= "\n/* *** Open/Close Menu Button Styles *** */";
		$new .= $button->get_button_styles();
		$new .= $button->get_button_text_styles();
		$new .= "\n/* *** Open/Close Icon Styles *** */";
		$new .= $icon_css->get_icon_styles();
		$new .= $icon_css->get_icon_span_styles();
		$new .= "\n/* *** Menu Styles *** */";
		$new .= $menu_css->get_sidenav_styles();
		$new .= $menu_css->get_menu_link_styles();
		$new .= $menu_css->get_menu_hover_styles();
		$new .= $menu_css->get_menu_current_styles();
		$new .= "\n/* *** Overlay Styles *** */";
		$new .= '';
		$new .= "\n/* End BYOB Thesis Sliding Menu Styles */";
		return $css . $new;
	}

}
