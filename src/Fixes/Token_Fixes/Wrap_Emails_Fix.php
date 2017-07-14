<?php

namespace PHP_Typography\Fixes\Token_Fixes;

use \PHP_Typography\Fixes\Token_Fix;
use \PHP_Typography\Settings;

/**
 * Wraps email parts zero-width spaces (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Wrap_Emails_Fix extends Abstract_Token_Fix {

	/**
	 * Creates a new fix instance.
	 *
	 * @param bool $feed_compatible Optional. Default false.
	 */
	public function __construct( $feed_compatible = false ) {
		parent::__construct( Token_Fix::OTHER, $feed_compatible );
	}

	/**
	 * Apply the tweak to a given textnode.
	 *
	 * @param array         $tokens   Required.
	 * @param Settings      $settings Required.
	 * @param bool          $is_title Optional. Default false.
	 * @param \DOMText|null $textnode Optional. Default null.
	 */
	public function apply( array $tokens, Settings $settings, $is_title = false, \DOMText $textnode = null ) {
		if ( empty( $settings['emailWrap'] ) ) {
			return $tokens;
		}

		// Various special characters and regular expressions.
		$chr   = $settings->get_named_characters();
		$regex = $settings->get_regular_expressions();

		// Test for and parse urls.
		foreach ( $tokens as $index => $token ) {
			$value = $token->value;
			if ( preg_match( $regex['wrapEmailsMatchEmails'], $value, $email_match ) ) {
				$tokens[ $index ] = $token->with_value( preg_replace( $regex['wrapEmailsReplaceEmails'], '$1' . $chr['zeroWidthSpace'], $value ) );
			}
		}

		return $tokens;
	}
}
