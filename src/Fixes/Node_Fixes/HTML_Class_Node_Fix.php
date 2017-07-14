<?php

namespace PHP_Typography\Fixes\Node_Fixes;

use \PHP_Typography\Settings;
use \PHP_Typography\DOM;

/**
 * All fixes that depend on certain HTML classes not being present should extend this baseclass.
 *
 * @author Peter Putzer <github@mundschenk.at>
 *
 * @since 5.0.0
 */
abstract class HTML_Class_Node_Fix extends Classes_Dependent_Fix {

	/**
	 * The css class name to include in the generated markup.
	 *
	 * @var string
	 */
	protected $cass_class;

	/**
	 * Creates a new node fix with a class.
	 *
	 * @param string $css_class       HTML class used in markup.
	 * @param bool   $feed_compatible Optional. Default false.
	 */
	public function __construct( $css_class, $feed_compatible = false ) {
		parent::__construct( $css_class, $feed_compatible );

		$this->css_class = $css_class;
	}
}
