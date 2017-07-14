<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Collapse spaces (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Space_Collapse_Fix extends Abstract_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['spaceCollapse'] ) ) {
			return;
		}

		// Various special characters and regular expressions.
		$chr        = $settings->get_named_characters();
		$regex      = $settings->get_regular_expressions();

		// Normal spacing.
		$textnode->data = preg_replace( $regex['spaceCollapseNormal'], ' ', $textnode->data );

		// Non-breakable space get's priority. If non-breakable space exists in a string of spaces, it collapses to a single non-breakable space.
		$textnode->data = preg_replace( $regex['spaceCollapseNonBreakable'], $chr['noBreakSpace'], $textnode->data );

		// For any other spaceing, replace with the first occurance of an unusual space character.
		$textnode->data = preg_replace( $regex['spaceCollapseOther'], '$1', $textnode->data );

		// Remove all spacing at beginning of block level elements.
		if ( '' === DOM::get_prev_chr( $textnode ) ) { // we have the first text in a block level element.
			$textnode->data = preg_replace( $regex['spaceCollapseBlockStart'], '', $textnode->data );
		}
	}
}
