<?php

namespace PHP_Typography\Tests\Fixes\Token_Fixes;

use \PHP_Typography\Tests\PHP_Typography_Testcase;
use \PHP_Typography\Settings;
use \PHP_Typography\Fixes\Token_Fix;

/**
 * Abstract base class for \PHP_Typography\* unit tests.
 */
abstract class Token_Fix_Testcase extends PHP_Typography_Testcase {

	/**
	 * Settings object.
	 *
	 * @var Ssttings
	 */
	protected $s;

	/**
	 * Our test object.
	 *
	 * @var Token_Fix
	 */
	protected $fix;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		$this->s = new Settings( false );
	}

	/**
	 * Assert that the output of the fix is the same as the expected result.
	 *
	 * @param string $input  Text node value.
	 * @param string $result Expected result.
	 */
	protected function assertFixResultSame( $input, $result ) {
		$tokens = $this->tokenize_sentence( $input );
		$result_tokens = $this->fix->apply( $tokens, $this->s );
		$this->assertTokensSame( $result, $result_tokens );
	}
}
