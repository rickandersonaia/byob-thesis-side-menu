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
		$this->title = $this->name = __( 'BYOB Side Menu', 'byobtsm' );
	}

	/**
	 *  Box API method of providing a pseudo constructor method
	 */
	protected function construct() {
		global $byob_ah;;

		if ( ! defined( 'BYOBTSM_PATH' ) ) {
			define( 'BYOBTSM_PATH', dirname( __FILE__ ) );
		}
		if ( ! defined( 'BYOBTSM_URL' ) ) {
			define( 'BYOBTSM_URL', THESIS_USER_BOXES_URL . '/' . basename( __DIR__ ) );
		}


		if ( is_admin() ) {
			if ( ! class_exists( 'byob_asset_handler' ) ) {
				include_once( BYOBTSM_PATH . '/byob_asset_handler.php' );
			}
			if ( ! isset( $my_asset_handler ) ) {
				$byob_ah = new byob_asset_handler;
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

	public function preload() {
		add_action('wp_enqueue_scripts', array($this, 'add_scripts'));
		add_action('wp_enqueue_scripts', array($this, 'add_styles'));
		add_action('hook_before_html', array($this, 'insert_menu'), 99);
		add_action('hook_after_html', array($this, 'close_main'), 1);
	}

	public function add_scripts(){
		wp_enqueue_script('byobtsm-side-menu',BYOBTSM_URL . '/assets/js/byobtsm-side-menu.js');
	}

	public function add_styles(){
		wp_enqueue_style('byobtsm-side-menu',BYOBTSM_URL . '/assets/css/byobtsm-styles.css');
	}

	public function insert_menu(){
		$tab     = str_repeat( "\t", 2 );
		$args = array(
			'menu' => $this->options['menu'],
			'menu_class' => 'side-navigation',
			'container' => false
		);

		echo "<div id='byobtsm-sidenav-wrapper' class='sidenav'>";
		echo "$tab\t<div id=\"nav-icon2\" onclick=\"closeNav()\">\n";
		echo "$tab\t\t<span></span>\n";
		echo "$tab\t\t<span></span>\n";
		echo "$tab\t\t<span></span>\n";
		echo "$tab\t</div>\n";
		wp_nav_menu($args);
		echo '</div>';
		echo '<div id="byobtsm-content-wrapper">';
	}

	public function close_main(){
		echo "\t<div id=\"byobtsm-overlay\" onclick=\"closeNav()\"></div>\n";
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
		$depth   = isset( $depth ) ? $depth : 0;
		$tab     = str_repeat( "\t", $depth );
		$html    = 'div';
		$id      = ( ! empty( $this->options['id'] )
			? ' id="' . trim( esc_attr( $this->options['id'] ) ) . '"'
			: '' );
		$class   = ! empty( $this->options['class'] )
			? ' class="' . trim( esc_attr( $this->options['class'] ) ) . ' byobtsm-menu-button"'
			: ' class="byobtsm-menu-button"';
		$open_text = ! empty( $this->options['open_text'] )
			? trim( wp_kses_post( $this->options['open_text'] ) )
			: 'Menu';

		echo "$tab<$html$id$class>\n";
		echo "$tab\t<div id=\"nav-icon1\" onclick=\"openNav()\">\n";
		echo "$tab\t\t<span></span>\n";
		echo "$tab\t\t<span></span>\n";
		echo "$tab\t\t<span></span>\n";
		echo "$tab\t</div>\n";
		echo "<span class=\"byobtsm-open-text\"> $open_text</span>";
		echo "$tab</$html>\n";
	}

}
