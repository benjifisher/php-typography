<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Applies smart diacritics (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Smart_Diacritics_Fix extends Abstract_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['smartDiacritics'] ) ) {
			return; // abort.
		}

		if ( ! empty( $settings['diacriticReplacement'] ) &&
			 ! empty( $settings['diacriticReplacement']['patterns'] ) &&
			 ! empty( $settings['diacriticReplacement']['replacements'] ) ) {

			// Uses "word" => "replacement" pairs from an array to make fast preg_* replacements.
			$replacements = $settings['diacriticReplacement']['replacements'];
			$textnode->data = preg_replace_callback( $settings['diacriticReplacement']['patterns'], function( $match ) use ( $replacements ) {
				if ( isset( $replacements[ $match[0] ] ) ) {
					return $replacements[ $match[0] ];
				} else {
					return $match[0];
				}
			}, $textnode->data );
		}
	}
}
