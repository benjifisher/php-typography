<?php

namespace PHP_Typography\Fixes;

use \PHP_Typography\Settings;

/**
 * All fixes that apply to parsed text tokens should implement this interface.
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
interface Token_Fix {

	const MIXED_WORDS    = 1;
	const COMPOUND_WORDS = 2;
	const WORDS          = 3;
	const OTHER          = 4;

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param array         $tokens   Required.
	 * @param Settings      $settings Required.
	 * @param bool          $is_title Optional. Default false.
	 * @param \DOMText|null $textnode Optional. Default null.
	 */
	public function apply( array $tokens, Settings $settings, $is_title = false, \DOMText $textnode = null );

	/**
	 * Determines whether the fix should be applied to (RSS) feeds.
	 *
	 * @return bool
	 */
	public function feed_compatible();

	/**
	 * Retrieves the target token array for this fix.
	 *
	 * @return int
	 */
	public function target();
}
