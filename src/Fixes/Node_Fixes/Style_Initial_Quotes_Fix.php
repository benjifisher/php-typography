<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;
use \PHP_Typography\Strings;

/**
 * Styles initial quotes and guillemets (if enabled).
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Style_Initial_Quotes_Fix extends Classes_Dependent_Fix {

	/**
	 * CSS class for single quotes.
	 *
	 * @var string
	 */
	protected $single_quote_class;

	/**
	 * CSS class for double quotes.
	 *
	 * @var string
	 */
	protected $double_quote_class;

	/**
	 * Creates a new classes dependent fix.
	 *
	 * @param string $css_single      Required.
	 * @param string $css_double      Required.
	 * @param bool   $feed_compatible Optional. Default false.
	 */
	public function __construct( $css_single, $css_double, $feed_compatible = false ) {
		parent::__construct( [ $css_single, $css_double ], $feed_compatible );

		$this->single_quote_class = $css_single;
		$this->double_quote_class = $css_double;
	}

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply_internal( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['styleInitialQuotes'] ) || empty( $settings['initialQuoteTags'] ) ) {
			return;
		}

		if ( '' === DOM::get_prev_chr( $textnode ) ) { // we have the first text in a block level element.

			$func            = Strings::functions( $textnode->data );
			$first_character = $func['substr']( $textnode->data, 0, 1 );
			$chr             = $settings->get_named_characters();

			switch ( $first_character ) {
				case "'":
				case $chr['singleQuoteOpen']:
				case $chr['singleLow9Quote']:
				case ',':
				case '"':
				case $chr['doubleQuoteOpen']:
				case $chr['guillemetOpen']:
				case $chr['guillemetClose']:
				case $chr['doubleLow9Quote']:

					$block_level_parent = DOM::get_block_parent_name( $textnode );

					if ( $is_title ) {
						// Assume page title is h2.
						$block_level_parent = 'h2';
					}

					if ( ! empty( $block_level_parent ) && isset( $settings['initialQuoteTags'][ $block_level_parent ] ) ) {
						switch ( $first_character ) {
							case "'":
							case $chr['singleQuoteOpen']:
							case $chr['singleLow9Quote']:
							case ',':
								$span_class = $this->single_quote_class;
								break;

							default: // double quotes or guillemets.
								$span_class = $this->double_quote_class;
						}

						$textnode->data = '<span class="' . $span_class . '">' . $first_character . '</span>' . $func['substr']( $textnode->data, 1, $func['strlen']( $textnode->data ) );
					}
			}
		}
	}
}
