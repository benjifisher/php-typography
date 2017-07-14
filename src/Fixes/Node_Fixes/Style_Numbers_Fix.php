<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Wraps numbers in <span class="numbers"> (even numbers that appear inside a word,
 * i.e. A9 becomes A<span class="numbers">9</span>), if enabled.
 *
 * Call after style_caps so A9 becomes <span class="caps">A<span class="numbers">9</span></span>.
 * Call after smart_fractions and smart_ordinal_suffix.
 * Only call if you are certain that no html tags have been injected containing numbers.
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Style_Numbers_Fix extends HTML_Class_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply_internal( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['styleNumbers'] ) ) {
			return;
		}

		$textnode->data = preg_replace( $settings->regex( 'styleNumbers' ), '<span class="' . $this->css_class . '">$1</span>', $textnode->data );
	}
}
