<?php

namespace PHP_Typography\Fixes\Token_Fixes;

use \PHP_Typography\Fixes\Token_Fix;
use \PHP_Typography\Settings;
use \PHP_Typography\Text_Parser;

/**
 * Hyphenates hyphenated compound words (if enabled).
 *
 * Calls hyphenate() on the component words.
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Hyphenate_Compounds_Fix extends Hyphenate_Fix {

	/**
	 * Creates a new fix instance.
	 *
	 * @param bool $feed_compatible Optional. Default false.
	 */
	public function __construct( $feed_compatible = false ) {
		parent::__construct( Token_Fix::COMPOUND_WORDS, $feed_compatible );
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
		if ( empty( $settings['hyphenateCompounds'] ) ) {
			return $tokens; // abort.
		}

		// Hyphenate compound words.
		foreach ( $tokens as $key => $word_token ) {
			$component_words = [];
			foreach ( preg_split( '/(-)/', $word_token->value, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE ) as $word_part ) {
				$component_words[] = new Text_Parser\Token( $word_part, Text_Parser\Token::WORD );
			}

			$tokens[ $key ] = $word_token->with_value( array_reduce( parent::apply( $component_words, $settings, $is_title, $textnode ), function( $carry, $item ) {
				return $carry . $item->value;
			} ) );
		}

		return $tokens;
	}
}
