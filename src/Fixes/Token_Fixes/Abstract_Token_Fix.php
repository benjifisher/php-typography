<?php

namespace PHP_Typography\Fixes\Token_Fixes;

use \PHP_Typography\Fixes\Token_Fix;
use \PHP_Typography\Settings;

/**
 * An abstract base class for token fixes.
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
abstract class Abstract_Token_Fix implements Token_Fix {

	/**
	 * Is this fix compatible with feeds?
	 *
	 * @var bool
	 */
	private $feed_compatible;

	/**
	 * The target token type.
	 *
	 * @var int
	 */
	private $target;

	/**
	 * Creates a new fix instance.
	 *
	 * @param int  $target          Required.
	 * @param bool $feed_compatible Optional. Default false.
	 */
	protected function __construct( $target, $feed_compatible = false ) {
		$this->target          = $target;
		$this->feed_compatible = $feed_compatible;
	}

	/**
	 * Apply the tweak to a given textnode.
	 *
	 * @param array         $tokens   Required.
	 * @param Settings      $settings Required.
	 * @param bool          $is_title Optional. Default false.
	 * @param \DOMText|null $textnode Optional. Default null.
	 */
	abstract public function apply( array $tokens, Settings $settings, $is_title = false, \DOMText $textnode = null );

	/**
	 * Determines whether the fix should be applied to (RSS) feeds.
	 *
	 * @return bool
	 */
	public function feed_compatible() {
		return $this->feed_compatible;
	}

	/**
	 * Retrieves the target token array for this fix.
	 *
	 * @return int
	 */
	public function target() {
		return $this->target;
	}
}
