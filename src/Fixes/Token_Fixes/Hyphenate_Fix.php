<?php

namespace PHP_Typography\Fixes\Token_Fixes;

use \PHP_Typography\Fixes\Token_Fix;
use \PHP_Typography\Settings;
use \PHP_Typography\DOM;
use \PHP_Typography\Hyphenator;

/**
 * Hyphenates a given text fragment (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Hyphenate_Fix extends Abstract_Token_Fix {
	/**
	 * An array of ( $tag => true ) for quick checking with `isset`.
	 *
	 * @var array
	 */
	const HEADING_TAGS = [
		'h1' => true,
		'h2' => true,
		'h3' => true,
		'h4' => true,
		'h5' => true,
		'h6' => true,
	];

	/**
	 * Creates a new fix instance.
	 *
	 * @param int  $target          Optional. Default Token_Fix::WORDS.
	 * @param bool $feed_compatible Optional. Default false.
	 */
	public function __construct( $target = Token_Fix::WORDS, $feed_compatible = false ) {
		parent::__construct( $target, $feed_compatible );
	}

	/**
	 * The hyphenator instance.
	 *
	 * @var Hyphenator $hyphenator
	 */
	protected $hyphenator;

	/**
	 * Apply the tweak to a given textnode.
	 *
	 * @param array         $tokens   Required.
	 * @param Settings      $settings Required.
	 * @param bool          $is_title Optional. Default false.
	 * @param \DOMText|null $textnode Optional. Default null.
	 */
	public function apply( array $tokens, Settings $settings, $is_title = false, \DOMText $textnode = null ) {
		if ( empty( $settings['hyphenation'] ) ) {
			return $tokens; // abort.
		}

		$is_heading = false;
		if ( ! empty( $textnode ) && ! empty( $textnode->parentNode ) ) {
			$block_level_parent = DOM::get_block_parent_name( $textnode );

			if ( ! empty( $block_level_parent ) && null !== self::HEADING_TAGS[ $block_level_parent ] ) {
				$is_heading = true;
			}
		}

		if ( empty( $settings['hyphenateTitle'] ) && ( $is_title || $is_heading ) ) {
			return $tokens; // abort.
		}

		// Call functionality as seperate function so it can be run without test for setting['hyphenation'] - such as with url wrapping.
		return $this->do_hyphenate( $tokens, $settings );
	}

	/**
	 * Really hyphenates given text fragment.
	 *
	 * @param array       $tokens Filtered to words.
	 * @param Settings    $settings           The settings to apply.
	 * @param string|null $hyphen             Hyphenation character. Optional. Default is the soft hyphen character (`&shy;`).
	 *
	 * @return array The hyphenated text token.
	 */
	protected function do_hyphenate( array $tokens, Settings $settings, $hyphen = null ) {
		if ( empty( $settings['hyphenMinLength'] ) || empty( $settings['hyphenMinBefore'] ) ) {
			return $tokens;
		}

		// Default to &shy; is $hyphen is not set.
		if ( ! isset( $hyphen ) ) {
			$hyphen = $settings->chr( 'softHyphen' );
		}

		return $this->get_hyphenator( $settings )->hyphenate( $tokens, $hyphen, ! empty( $settings['hyphenateTitleCase'] ), $settings['hyphenMinLength'], $settings['hyphenMinBefore'], $settings['hyphenMinAfter'] );
	}

	/**
	 * Retrieves the hyphenator instance.
	 *
	 * @param Settings $settings The settings to apply.
	 *
	 * @return Hyphenator
	 */
	public function get_hyphenator( Settings $settings ) {
		if ( ! isset( $this->hyphenator ) ) {

			// Create and initialize our hyphenator instance.
			$this->hyphenator = new Hyphenator(
				isset( $settings['hyphenLanguage'] ) ? $settings['hyphenLanguage'] : null,
				isset( $settings['hyphenationCustomExceptions'] ) ? $settings['hyphenationCustomExceptions'] : []
			);
		} else {
			$this->hyphenator->set_language( $settings['hyphenLanguage'] );
			$this->hyphenator->set_custom_exceptions( isset( $settings['hyphenationCustomExceptions'] ) ? $settings['hyphenationCustomExceptions'] : [] );
		}

		return $this->hyphenator;
	}

	/**
	 * Injects an existing Hyphenator instance (to facilitate language caching).
	 *
	 * @param Hyphenator $hyphenator A hyphenator instance.
	 */
	public function set_hyphenator( Hyphenator $hyphenator ) {
		$this->hyphenator = $hyphenator;
	}
}
