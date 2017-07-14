<?php

namespace PHP_Typography\Tests;

/**
 * Subclass of PHP_Typography for setting custom CSS classes.
 */
class PHP_Typography_CSS_Classes extends \PHP_Typography\PHP_Typography {

	/**
	 * Create new instance of PHP_Typography_CSS_Classes.
	 *
	 * @param boolean $set_defaults Optional. Set default values. Default true.
	 * @param string  $init         Optional. Initialize immediately. Default 'now'.
	 * @param array   $css_classes  Optional. An array of CSS classes. Default [].
	 */
	public function __construct( $set_defaults = true, $init = 'now', $css_classes = [] ) {
		$this->css_classes = array_merge( $this->css_classes, $css_classes );

		parent::__construct( $set_defaults, $init );
	}
}
