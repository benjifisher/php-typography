<?php

namespace PHP_Typography\Fixes\Token_Fixes;

use \PHP_Typography\Fixes\Token_Fix;
use \PHP_Typography\Settings;

/**
 * Wraps hard hypens with zero-width spaces (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Wrap_Hard_Hyphens_Fix extends Abstract_Token_Fix {
	/**
	 * Creates a new fix instance.
	 *
	 * @param bool $feed_compatible Optional. Default false.
	 */
	public function __construct( $feed_compatible = false ) {
		parent::__construct( Token_Fix::MIXED_WORDS, $feed_compatible );
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
		if ( ! empty( $settings['hyphenHardWrap'] ) || ! empty( $settings['smartDashes'] ) ) {

			// Various special characters and regular expressions.
			$chr        = $settings->get_named_characters();
			$regex      = $settings->get_regular_expressions();
			$components = $settings->get_components();

			foreach ( $tokens as $index => $text_token ) {
				$value = $text_token->value;

				if ( isset( $settings['hyphenHardWrap'] ) && $settings['hyphenHardWrap'] ) {
					$value = str_replace( $components['hyphensArray'], '-' . $chr['zeroWidthSpace'], $value );
					$value = str_replace( '_', '_' . $chr['zeroWidthSpace'], $value );
					$value = str_replace( '/', '/' . $chr['zeroWidthSpace'], $value );

					$value = preg_replace( $regex['wrapHardHyphensRemoveEndingSpace'], '$1', $value );
				}

				if ( ! empty( $settings['smartDashes'] ) ) {
					// Handled here because we need to know we are inside a word and not a URL.
					$value = str_replace( '-', $chr['hyphen'], $value );
				}

				$tokens[ $index ] = $text_token->with_value( $value );
			}
		}

		return $tokens;
	}
}
