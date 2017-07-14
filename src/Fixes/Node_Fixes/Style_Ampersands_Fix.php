<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Wraps ampersands in <span class="amp"> (i.e. H&amp;J becomes H<span class="amp">&amp;</span>J),
 * if enabled.
 *
 * Call after style_caps so H&amp;J becomes <span class="caps">H<span class="amp">&amp;</span>J</span>.
 * Note that all standalone ampersands were previously converted to &amp;.
 * Only call if you are certain that no html tags have been injected containing "&amp;".
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Style_Ampersands_Fix extends HTML_Class_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply_internal( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['styleAmpersands'] ) ) {
			return;
		}

		$textnode->data = preg_replace( $settings->regex( 'styleAmpersands' ), '<span class="' . $this->css_class . '">$1</span>', $textnode->data );
	}
}
