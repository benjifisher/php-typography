<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Wraps words of all caps (may include numbers) in <span class="caps"> if enabled.
 *
 * Call before style_numbers().Only call if you are certain that no html tags have been
 * injected containing capital letters.
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Style_Caps_Fix extends HTML_Class_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply_internal( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['styleCaps'] ) ) {
			return;
		}

		$textnode->data = preg_replace( $settings->regex( 'styleCaps' ), '<span class="' . $this->css_class . '">$1</span>', $textnode->data );
	}
}
