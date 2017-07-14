<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Prevents the number part of numbered abbreviations from being split from the basename (if enabled).
 *
 * E.G. "ISO 9000" gets replaced with "ISO&nbsp;9000".
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Numbered_Abbreviation_Spacing_Fix extends Abstract_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['numberedAbbreviationSpacing'] ) ) {
			return;
		}

		$textnode->data = preg_replace( $settings->regex( 'numberedAbbreviationSpacing' ), '$1' . $settings->chr( 'noBreakSpace' ) . '$2', $textnode->data );
		// $textnode->data = preg_replace( $settings->regex( 'unitSpacingUnitPattern' ), '$1' . $settings->chr( 'noBreakNarrowSpace' ) . '$2', $textnode->data );
	}
}
