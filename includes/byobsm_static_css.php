<?php
/**
 * Created by PhpStorm.
 * User: ander
 * Date: 5/6/2018
 * Time: 11:39 AM
 */

class byobsm_static_css {

	public function get_static_css() {
		$css = '';
		if ( file_exists( BYOBSM_PATH . '/assets/css/byobsm-styles.css' ) ) {
			$css = file_get_contents( BYOBSM_PATH . '/assets/css/byobsm-styles.css' );
		}
		return $css;
  }
}