<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Applies smart dashes (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Smart_Dashes_Fix extends Abstract_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['smartDashes'] ) ) {
			return;
		}

		// Various special characters and regular expressions.
		$chr        = $settings->get_named_characters();
		$regex      = $settings->get_regular_expressions();

		$textnode->data = str_replace( '---', $chr['emDash'], $textnode->data );
		$textnode->data = preg_replace( $regex['smartDashesParentheticalDoubleDash'], "\$1{$chr['parentheticalDash']}\$2", $textnode->data );
		$textnode->data = str_replace( '--', $chr['enDash'], $textnode->data );
		$textnode->data = preg_replace( $regex['smartDashesParentheticalSingleDash'], "\$1{$chr['parentheticalDash']}\$2", $textnode->data );

		$textnode->data = preg_replace( $regex['smartDashesEnDashWords'] ,       '$1' . $chr['enDash'] . '$2',        $textnode->data );
		$textnode->data = preg_replace( $regex['smartDashesEnDashNumbers'],      '$1' . $chr['intervalDash'] . '$3',  $textnode->data );
		$textnode->data = preg_replace( $regex['smartDashesEnDashPhoneNumbers'], '$1' . $chr['noBreakHyphen'] . '$2', $textnode->data ); // phone numbers.
		$textnode->data = str_replace( "xn{$chr['enDash']}",                     'xn--',                              $textnode->data ); // revert messed-up punycode.

		// Revert dates back to original formats
		// YYYY-MM-DD.
		$textnode->data = preg_replace( $regex['smartDashesYYYY-MM-DD'], '$1-$2-$3',     $textnode->data );
		// MM-DD-YYYY or DD-MM-YYYY.
		$textnode->data = preg_replace( $regex['smartDashesMM-DD-YYYY'], '$1$3-$2$4-$5', $textnode->data );
		// YYYY-MM or YYYY-DDDD next.
		$textnode->data = preg_replace( $regex['smartDashesYYYY-MM'],    '$1-$2',        $textnode->data );
	}
}
