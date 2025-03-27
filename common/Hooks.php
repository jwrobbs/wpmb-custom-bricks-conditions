<?php
/**
 * Plugin hooks initialization
 *
 * @package WPMB_Bricks_Conditions_Common
 */

namespace WPMB_Bricks_Conditions_Common;

defined( 'ABSPATH' ) || exit;

/**
 * Hooks class
 */
class Hooks {
	/**
	 * Initialize the plugin hooks
	 *
	 * @return void
	 */
	public static function init(): void {
		new \WPMB_Bricks_Conditions\Conditions\WordPress();
		\WPMB_Bricks_Conditions\Conditions\WordPress::init();
	}
}
