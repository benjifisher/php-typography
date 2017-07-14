<?php

namespace PHP_Typography\Tests\Fixes\Node_Fixes;

use \PHP_Typography\Tests\PHP_Typography_Testcase;
use \PHP_Typography\Settings;
use \PHP_Typography\Fixes\Node_Fix;

/**
 * Abstract base class for \PHP_Typography\* unit tests.
 */
abstract class Node_Fix_Testcase extends PHP_Typography_Testcase {

	/**
	 * Settings object.
	 *
	 * @var Ssttings
	 */
	protected $s;

	/**
	 * Our test object.
	 *
	 * @var Node_Fix
	 */
	protected $fix;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		$this->s = new Settings( true );
	}

	/**
	 * Create a normalilzed textnode.
	 *
	 * @param  string $value Required.
	 *
	 * @return \DOMText
	 */
	protected function create_textnode( $value ) {
		// returns < > & to encoded HTML characters (&lt; &gt; and &amp; respectively).
		return new \DOMText( htmlspecialchars( html_entity_decode( $value ), ENT_NOQUOTES, 'UTF-8', false ) );
	}

	/**
	 * Assert that the output of the fix is the same as the expected result.
	 *
	 * @param string $input  Text node value.
	 * @param string $result Expected result.
	 */
	protected function assertFixResultSame( $input, $result ) {
		$node = $this->create_textnode( $input );
		$this->fix->apply( $node, $this->s );
		$this->assertSame( $this->clean_html( $result ), $this->clean_html( $node->data ) );
	}
}
