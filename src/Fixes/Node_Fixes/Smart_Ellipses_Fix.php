<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Applies smart ellipses (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Smart_Ellipses_Fix extends Abstract_Node_Fix {

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['smartEllipses'] ) ) {
			return;
		}

		$ellipses = $settings->chr( 'ellipses' );

		$textnode->data = str_replace( [ '....', '. . . .' ], '.' . $ellipses, $textnode->data );
		$textnode->data = str_replace( [ '...', '. . .' ],          $ellipses, $textnode->data );
	}
}
