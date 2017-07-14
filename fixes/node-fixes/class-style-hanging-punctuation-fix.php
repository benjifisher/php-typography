<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * Wraps hanging punctuation in <span class="pull-*"> and <span class="push-*">, if enabled.
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
class Style_Hanging_Punctuation_Fix extends Classes_Dependent_Fix {

	/**
	 * CSS class for single-width punctuation marks.
	 *
	 * @var string
	 */
	protected $push_single_class;

	/**
	 * CSS class for double-width punctuation marks.
	 *
	 * @var string
	 */
	protected $push_double_class;

	/**
	 * CSS class for single-width punctuation marks.
	 *
	 * @var string
	 */
	protected $pull_single_class;

	/**
	 * CSS class for double-width punctuation marks.
	 *
	 * @var string
	 */
	protected $pull_double_class;

	/**
	 * Creates a new classes dependent fix.
	 *
	 * @param string $push_single_class Required.
	 * @param string $push_double_class Required.
	 * @param string $pull_single_class Required.
	 * @param string $pull_double_class Required.
	 * @param bool   $feed_compatible   Optional. Default false.
	 */
	public function __construct( $push_single_class, $push_double_class, $pull_single_class, $pull_double_class, $feed_compatible = false ) {
		parent::__construct( [ $pull_single_class, $pull_double_class ], $feed_compatible );

		$this->push_single_class = $push_single_class;
		$this->push_double_class = $push_double_class;
		$this->pull_single_class = $pull_single_class;
		$this->pull_double_class = $pull_double_class;
	}

	/**
	 * Apply the fix to a given textnode.
	 *
	 * @param \DOMText $textnode Required.
	 * @param Settings $settings Required.
	 * @param bool     $is_title Optional. Default false.
	 */
	public function apply_internal( \DOMText $textnode, Settings $settings, $is_title = false ) {
		if ( empty( $settings['styleHangingPunctuation'] ) ) {
			return;
		}

		// We need the parent.
		$block = DOM::get_block_parent( $textnode );
		$firstnode = ! empty( $block ) ? DOM::get_first_textnode( $block ) : null;

		// Need to get context of adjacent characters outside adjacent inline tags or HTML comment
		// if we have adjacent characters add them to the text.
		$next_character = DOM::get_next_chr( $textnode );
		if ( '' !== $next_character ) {
			$textnode->data = $textnode->data . $next_character;
		}

		// Various special characters and regular expressions.
		$chr   = $settings->get_named_characters();
		$regex = $settings->get_regular_expressions();

		$textnode->data = preg_replace( $regex['styleHangingPunctuationDouble'], '$1<span class="' . $this->push_double_class . '"></span>' . $chr['zeroWidthSpace'] . '<span class="' . $this->pull_double_class . '">$2</span>$3', $textnode->data );
		$textnode->data = preg_replace( $regex['styleHangingPunctuationSingle'], '$1<span class="' . $this->push_single_class . '"></span>' . $chr['zeroWidthSpace'] . '<span class="' . $this->pull_single_class . '">$2</span>$3', $textnode->data );

		if ( empty( $block ) || $firstnode === $textnode ) {
			$textnode->data = preg_replace( $regex['styleHangingPunctuationInitialDouble'], '<span class="' . $this->pull_double_class . '">$1</span>$2', $textnode->data );
			$textnode->data = preg_replace( $regex['styleHangingPunctuationInitialSingle'], '<span class="' . $this->pull_single_class . '">$1</span>$2', $textnode->data );
		} else {
			$textnode->data = preg_replace( $regex['styleHangingPunctuationInitialDouble'], '<span class="' . $this->push_double_class . '"></span>' . $chr['zeroWidthSpace'] . '<span class="' . $this->pull_double_class . '">$1</span>$2', $textnode->data );
			$textnode->data = preg_replace( $regex['styleHangingPunctuationInitialSingle'], '<span class="' . $this->push_single_class . '"></span>' . $chr['zeroWidthSpace'] . '<span class="' . $this->pull_single_class . '">$1</span>$2', $textnode->data );
		}

		// Remove any added characters.
		$textnode->data = parent::remove_adjacent_characters( $textnode->data, '', $next_character );
	}
}
