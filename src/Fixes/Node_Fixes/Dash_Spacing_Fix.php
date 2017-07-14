<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Applies spacing around dashes (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Dash_Spacing_Fix extends Abstract_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['dashSpacing'] ) ) {
			return;
		}

		// Various special characters and regular expressions.
		$chr   = $settings->get_named_characters();
		$regex = $settings->get_regular_expressions();

		$textnode->data = preg_replace( $regex['dashSpacingEmDash'],            $chr['intervalDashSpace'] . '$1$2' . $chr['intervalDashSpace'],           $textnode->data );
		$textnode->data = preg_replace( $regex['dashSpacingParentheticalDash'], $chr['parentheticalDashSpace'] . '$1$2' . $chr['parentheticalDashSpace'], $textnode->data );
		$textnode->data = preg_replace( $regex['dashSpacingIntervalDash'],      $chr['intervalDashSpace'] . '$1$2' . $chr['intervalDashSpace'],           $textnode->data );
	}
}
