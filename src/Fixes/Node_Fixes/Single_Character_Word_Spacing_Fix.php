<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Prevent single character words from being alone (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Single_Character_Word_Spacing_Fix extends Abstract_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['singleCharacterWordSpacing'] ) ) {
			return;
		}

		// Add $next_character and $previous_character for context.
		$previous_character = DOM::get_prev_chr( $textnode );
		if ( '' !== $previous_character ) {
			$textnode->data = $previous_character . $textnode->data;
		}

		$next_character = DOM::get_next_chr( $textnode );
		if ( '' !== $next_character ) {
			$textnode->data = $textnode->data . $next_character;
		}

		$textnode->data = preg_replace( $settings->regex( 'singleCharacterWordSpacing' ), '$1$2' . $settings->chr( 'noBreakSpace' ), $textnode->data );

		// If we have adjacent characters remove them from the text.
		$textnode->data = parent::remove_adjacent_characters( $textnode->data, $previous_character, $next_character );
	}
}
