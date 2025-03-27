<?php
/**
 * Class WordPress_Conditions
 *
 * @package WPMB_Bricks_Conditions
 */

namespace WPMB_Bricks_Conditions\Conditions;

use WPMB_Bricks_Conditions\Traits\ConditionsTrait;

defined( 'ABSPATH' ) || exit;

/**
 * Class WordPress_Conditions
 */
class WordPress {
	use ConditionsTrait;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->initialize();
	}

	/**
	 * Init.
	 */
	public static function init() {
		add_filter(
			'bricks/conditions/groups',
			function ( $groups ) {
				$groups[] = array(
					'name'  => 'wpmb_wordpress_conditions',
					'label' => __( 'WordPress conditions', 'wpmb-bricks-conditions' ),
				);

				return $groups;
			}
		);
	}

	/**
	 * Register options.
	 *
	 * @param array $options Options.
	 * @return array
	 */
	public function register_options( $options ) {
		$options[] = array(
			'key'     => 'wpmb_wordpress_conditions',
			'label'   => 'WordPress Conditions',
			'group'   => $this->group,
			'compare' => array(
				'type'        => 'select',
				'options'     => array(
					'is'     => 'Is',
					'is_not' => 'Is not',
				),
				'placeholder' => 'is',
			),
			'value'   => array(
				'type'        => 'select',
				'options'     => array(
					'404'               => '404',
					'admin'             => 'admin',
					'archive'           => 'archive',
					'attachment'        => 'attachment',
					'author'            => 'author',
					'category'          => 'category',
					'day'               => 'day',
					'date'              => 'date',
					'embed'             => 'embed',
					'feed'              => 'feed',
					'front_page'        => 'front page',
					'home'              => 'home',
					'month'             => 'month',
					'network_admin'     => 'network admin',
					'page'              => 'page',
					'page_template'     => 'page template',
					'paged'             => 'paged',
					'post_type_archive' => 'post type archive',
					'preview'           => 'preview',
					'rtl'               => 'RTL',
					'robots'            => 'robots',
					'search'            => 'search',
					'single'            => 'single',
					'singular'          => 'singular',
					'sticky'            => 'sticky',
					'tag'               => 'tag',
					'tax'               => 'taxonomy',
					'time'              => 'time',
					'user_admin'        => 'user admin',
					'year'              => 'year',
				),
				'placeholder' => 'Select',
			),
		);

		return $options;
	}

	/**
	 * Evaluate result.
	 *
	 * @param bool   $result The result.
	 * @param string $condition_key The key.
	 * @param array  $condition The args.
	 *
	 * @return bool
	 */
	public function evaluate_result( $result, $condition_key, $condition ) {
		if ( 'wpmb_wordpress_conditions' !== $condition_key ) {
			return $result;
		}

		if ( is_null( $condition['value'] ) ) {
			return false;
		}

		$compare = $condition['compare'] ?? 'is';
		$value   = $condition['value'];

		$function = 'is_' . $value;

		if ( 'is' === $compare ) {
			return call_user_func( $function );
		} else {
			return ! call_user_func( $function );
		}
	}
}
