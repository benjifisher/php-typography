<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Applies smart marks (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Smart_Marks_Fix extends Abstract_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['smartMarks'] ) ) {
			return;
		}

		// Various special characters and regular expressions.
		$chr        = $settings->get_named_characters();
		$regex      = $settings->get_regular_expressions();
		$components = $settings->get_components();

		// Escape usage of "501(c)(1...29)" (US non-profit).
		$textnode->data = preg_replace( $regex['smartMarksEscape501(c)'], '$1' . $components['escapeMarker'] . '$2' . $components['escapeMarker'] . '$3', $textnode->data );

		// Replace marks.
		$textnode->data = str_replace( [ '(c)', '(C)' ],   $chr['copyright'],      $textnode->data );
		$textnode->data = str_replace( [ '(r)', '(R)' ],   $chr['registeredMark'], $textnode->data );
		$textnode->data = str_replace( [ '(p)', '(P)' ],   $chr['soundCopyMark'],  $textnode->data );
		$textnode->data = str_replace( [ '(sm)', '(SM)' ], $chr['serviceMark'],    $textnode->data );
		$textnode->data = str_replace( [ '(tm)', '(TM)' ], $chr['tradeMark'],      $textnode->data );

		// Un-escape escaped sequences.
		$textnode->data = str_replace( $components['escapeMarker'], '', $textnode->data );
	}
}
