<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Text_Parser;
use \PHP_Typography\Settings;
use \PHP_Typography\DOM;
use \PHP_Typography\Fixes\Token_Fix;

/**
 * Tokenizes the content of a textnode and process the individual words separately.
 *
 * Currently this functions applies the following enhancements:
 *   - wrapping hard hyphens
 *   - hyphenation
 *   - wrapping URLs
 *   - wrapping email addresses
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Process_Words_Fix extends Abstract_Node_Fix {

	/**
	 * An array of token fixes.
	 *
	 * @var array
	 */
	private $token_fixes = [];

	/**
	 * A custom parser for \DOMText to separate words, whitespace etc. for HTML injection.
	 *
	 * @var Text_Parser
	 */
	private $text_parser;

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply( \DOMText $textnode, Settings $settings, $is_title = false ) {
		// Lazy-load text parser.
		$text_parser  = $this->get_text_parser();

		// Set up parameters for word categories.
		$mixed_caps       = empty( $settings['hyphenateAllCaps'] ) ? Text_Parser::ALLOW_ALL_CAPS : Text_Parser::NO_ALL_CAPS;
		$letter_caps      = empty( $settings['hyphenateAllCaps'] ) ? Text_Parser::NO_ALL_CAPS : Text_Parser::ALLOW_ALL_CAPS;
		$mixed_compounds  = empty( $settings['hyphenateCompounds'] ) ? Text_Parser::ALLOW_COMPOUNDS : Text_Parser::NO_COMPOUNDS;
		$letter_compounds = empty( $settings['hyphenateCompounds'] ) ? Text_Parser::NO_COMPOUNDS : Text_Parser::ALLOW_COMPOUNDS;

		// Break text down for a bit more granularity.
		$text_parser->load( $textnode->data );
		$tokens[ Token_Fix::MIXED_WORDS ]    = $text_parser->get_words( Text_Parser::NO_ALL_LETTERS, $mixed_caps, $mixed_compounds );  // prohibit letter-only words, allow caps, allow compounds (or not).
		$tokens[ Token_Fix::COMPOUND_WORDS ] = ! empty( $settings['hyphenateCompounds'] ) ? $text_parser->get_words( Text_Parser::NO_ALL_LETTERS, $letter_caps, Text_Parser::REQUIRE_COMPOUNDS ) : [];
		$tokens[ Token_Fix::WORDS ]          = $text_parser->get_words( Text_Parser::REQUIRE_ALL_LETTERS, $letter_caps, $letter_compounds ); // require letter-only words allow/prohibit caps & compounds vice-versa.
		$tokens[ Token_Fix::OTHER ]          = $text_parser->get_other();

		/*
		$parsed_mixed_words    = $this->wrap_hard_hyphens( $parsed_mixed_words, $settings );
		$parsed_compound_words = $this->hyphenate_compounds( $parsed_compound_words, $settings, $is_title, $textnode );
		$parsed_words          = $this->hyphenate( $parsed_words, $settings, $is_title, $textnode );
		$parsed_other          = $this->wrap_urls( $parsed_other, $settings );
		$parsed_other          = $this->wrap_emails( $parsed_other, $settings );
		*/

		// Process individual text parts here.
		foreach ( $this->token_fixes as $fix ) {
			$t = $fix->target();

			$tokens[ $t ] = $fix->apply( $tokens[ $t ], $settings, $is_title, $textnode );
		}

		// Apply updates to our text.
		$text_parser->update( $tokens[ Token_Fix::MIXED_WORDS ] + $tokens[ Token_Fix::COMPOUND_WORDS ] + $tokens[ Token_Fix::WORDS ] + $tokens[ Token_Fix::OTHER ] );
		$textnode->data = $text_parser->unload();
	}

	/**
	 * Retrieves the text parser instance.
	 *
	 * @return \PHP_Typography\Text_Parser
	 */
	public function get_text_parser() {
		// Lazy-load text parser.
		if ( ! isset( $this->text_parser ) ) {
			$this->text_parser = new Text_Parser();
		}

		return $this->text_parser;
	}

	/**
	 * Registers a new token fix.
	 *
	 * @param Token_Fix $fix Required.
	 */
	public function register_token_fix( Token_Fix $fix ) {
		$this->token_fixes[] = $fix;
	}
}
