<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * All fixes that depend on certain HTML classes not being present should extend this baseclass.
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
abstract class Classes_Dependent_Fix extends Abstract_Node_Fix {

	/**
	 * An array of HTML classes to avoid applying the fix.
	 *
	 * @var array
	 */
	private $classes_to_avoid;

	/**
	 * Creates a new classes dependent fix.
	 *
	 * @param array|string $classes         HTML class(es).
	 * @param bool         $feed_compatible Optional. Default false.
	 */
	public function __construct( $classes, $feed_compatible = false ) {
		parent::__construct( $feed_compatible );

		if ( ! is_array( $classes ) ) {
			$classes = [ $classes ];
		}

		$this->classes_to_avoid = $classes;
	}

	/**
	 * Apply the fix to a given textnode if the nodes class(es) allow it.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( ! DOM::has_class( $textnode, $this->classes_to_avoid ) ) {
			$this->apply_internal( $textnode, $settings, $is_title );
		}
	}

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	abstract public function apply_internal( \DOMText $textnode, Settings $settings, $is_title = false );
}
