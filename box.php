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

//	 search and replace
//	 BYOBTSM
//	 byobtsm
//   byob_thesis_side_menu

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

		return array(
			'menu_id'    => array(
				'type'    => 'text',
				'width'   => 'medium',
				'code'    => true,
				'label'   => __( 'HTML ID for the menu', 'thesis' ),
				'tooltip' => __( 'Optional HTML ID to be assigned to the menu', 'thesis' )
			),
			'menu_class' => array(
				'type'        => 'text',
				'width'       => 'medium',
				'code'        => true,
				'label'       => __( 'HTML class for the menu', 'thesis' ),
				'tooltip'     => __( 'By default the menu class will be set automatically.  You can add an additonal class here if you wish', 'thesis' ),
				'placeholder' => 'sidenav'
			)
		);
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
		$html    = ! empty( $this->options['html'] ) ? trim( esc_attr( $this->options['html'] ) ) : 'div';
		$class   = ! empty( $this->options['class'] ) ? ' class="' . trim( esc_attr( $this->options['class'] ) ) . '"' : '';
		$id      = ( ! empty( $this->options['id'] ) ? ' id="' . trim( esc_attr( $this->options['id'] ) ) . '"' : '' );
		$message = ! empty( $this->options['message'] ) ? trim( wp_kses_post( $this->options['message'] ) ) : false;

		echo "$tab<$html$id$class>\n";
		if ( $message ) {
			echo $message;
		}
		echo $this->rotator( array_merge( $args, array( 'depth' => $depth + 1 ) ) );
		echo "$tab</$html>\n";
	}

}
