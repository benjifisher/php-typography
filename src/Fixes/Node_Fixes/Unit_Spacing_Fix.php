<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Prevents values being split from their units (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Unit_Spacing_Fix extends Abstract_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['unitSpacing'] ) ) {
			return;
		}

		$textnode->data = preg_replace( $settings->regex( 'unitSpacingUnitPattern' ), '$1' . $settings->chr( 'noBreakNarrowSpace' ) . '$2', $textnode->data );
	}
}
