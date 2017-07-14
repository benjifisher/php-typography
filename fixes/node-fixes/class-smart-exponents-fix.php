<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Applies smart exponents (if enabled).
 * Purposefully seperated from smart_math because of HTML code injection.
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Smart_Exponents_Fix extends Abstract_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['smartExponents'] ) ) {
			return;
		}

		// Handle exponents (ie. 4^2).
		$textnode->data = preg_replace( $settings->regex( 'smartExponents' ), '$1<sup>$2</sup>', $textnode->data );
	}
}
