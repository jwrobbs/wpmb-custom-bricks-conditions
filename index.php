<?php
/**
 * Plugin Name: WPMB Bricks Conditions
 * Plugin URI: https://joshrobbs.com
 * Description: Adds custom conditions for Bricks Builder
 * Version: 1.0.0
 * Author: Josh Robbs
 * Author URI: https://joshrobbs.com
 * License: The Unlicense
 * License URI: https://unlicense.org/
 * Text Domain: wpmb-bricks-conditions
 *
 * @package WPMB_Bricks_Conditions
 */

namespace WPMB_Bricks_Conditions;

use WPMB_Bricks_Conditions_Common\Hooks;

defined( 'ABSPATH' ) || exit;

// Autoloader.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

// Load constants.
require_once __DIR__ . '/common/constants.php';

// Initialize hooks.
Hooks::init();
