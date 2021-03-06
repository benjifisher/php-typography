<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Applies smart math (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Smart_Maths_Fix extends Abstract_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['smartMath'] ) ) {
			return;
		}

		// Various special characters and regular expressions.
		$chr   = $settings->get_named_characters();
		$regex = $settings->get_regular_expressions();

		// First, let's find math equations.
		$textnode->data = preg_replace_callback( $regex['smartMathEquation'], function( array $matches ) use ( $chr ) {
			$matches[0] = str_replace( '-', $chr['minus'],          $matches[0] );
			$matches[0] = str_replace( '/', $chr['division'],       $matches[0] );
			$matches[0] = str_replace( 'x', $chr['multiplication'], $matches[0] );
			$matches[0] = str_replace( '*', $chr['multiplication'], $matches[0] );

			return $matches[0];
		}, $textnode->data );

		// Revert 4-4 to plain minus-hyphen so as to not mess with ranges of numbers (i.e. pp. 46-50).
		$textnode->data = preg_replace( $regex['smartMathRevertRange'], '$1-$2', $textnode->data );

		// Revert fractions to basic slash.
		// We'll leave styling fractions to smart_fractions.
		$textnode->data = preg_replace( $regex['smartMathRevertFraction'], '$1/$2', $textnode->data );

		// Revert date back to original formats.
		// YYYY-MM-DD.
		$textnode->data = preg_replace( $regex['smartMathRevertDateYYYY-MM-DD'], '$1-$2-$3',     $textnode->data );
		// MM-DD-YYYY or DD-MM-YYYY.
		$textnode->data = preg_replace( $regex['smartMathRevertDateMM-DD-YYYY'], '$1$3-$2$4-$5', $textnode->data );
		// YYYY-MM or YYYY-DDD next.
		$textnode->data = preg_replace( $regex['smartMathRevertDateYYYY-MM'],    '$1-$2',        $textnode->data );
		// MM/DD/YYYY or DD/MM/YYYY.
		$textnode->data = preg_replace( $regex['smartMathRevertDateMM/DD/YYYY'], '$1$3/$2$4/$5', $textnode->data );
	}
}
