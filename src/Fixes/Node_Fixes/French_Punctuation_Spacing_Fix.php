<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Adds a narrow no-break space before
 * - exclamation mark (!)
 * - question mark (?)
 * - semicolon (;)
 * - colon (:)
 *
 * If there already is a space there, it is replaced.
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class French_Punctuation_Spacing_Fix extends Abstract_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['frenchPunctuationSpacing'] ) ) {
			return;
		}

		// Various special characters and regular expressions.
		$chr   = $settings->get_named_characters();
		$regex = $settings->get_regular_expressions();

		$textnode->data = preg_replace( $regex['frenchPunctuationSpacingClosingQuote'], '$1' . $chr['noBreakNarrowSpace'] . '$3$4', $textnode->data );
		$textnode->data = preg_replace( $regex['frenchPunctuationSpacingNarrow'],       '$1' . $chr['noBreakNarrowSpace'] . '$3$4', $textnode->data );
		$textnode->data = preg_replace( $regex['frenchPunctuationSpacingFull'],         '$1' . $chr['noBreakSpace'] . '$3$4',       $textnode->data );
		$textnode->data = preg_replace( $regex['frenchPunctuationSpacingSemicolon'],    '$1' . $chr['noBreakNarrowSpace'] . '$3$4', $textnode->data );
		$textnode->data = preg_replace( $regex['frenchPunctuationSpacingOpeningQuote'], '$1$2' . $chr['noBreakNarrowSpace'] . '$4', $textnode->data );
	}
}
