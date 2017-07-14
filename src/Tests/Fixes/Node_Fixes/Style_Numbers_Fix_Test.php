<?php

namespace PHP_Typography\Tests\Fixes\Node_Fixes;

use \PHP_Typography\Fixes\Node_Fixes;
use \PHP_Typography\Settings;

/**
 * DOM unit test.
 *
 * @coversDefaultClass \PHP_Typography\Fixes\Node_Fixes\Dewidow_Fix
 * @usesDefaultClass \PHP_Typography\Fixes\Node_Fixes\Dewidow_Fix
 */
class Style_Numbers_Fix_Test extends Node_Fix_Testcase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Node_Fixes\Style_Numbers_Fix( 'numbers' );
	}

	/**
	 * Provide data for testing style_numbers.
	 *
	 * @return array
	 */
	public function provide_style_numbers_data() {
		return [
			[ 'foo 123 bar', 'foo <span class="numbers">123</span> bar' ],
			[ 'foo 123bar baz', 'foo <span class="numbers">123</span>bar baz' ],
			[ 'foo bar123 baz', 'foo bar<span class="numbers">123</span> baz' ],
			[ 'foo 123BAR baz', 'foo <span class="numbers">123</span>BAR baz' ],
		];
	}

	/**
	 * Test apply.
	 *
	 * @covers ::apply
	 *
	 * @uses PHP_Typography\Text_Parser
	 * @uses PHP_Typography\Text_Parser\Token
	 *
	 * @dataProvider provide_style_numbers_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 */
	public function test_apply( $input, $result ) {
		$this->s->set_style_numbers( true );

		$this->assertFixResultSame( $input, $result );
	}

	/**
	 * Test apply.
	 *
	 * @covers ::apply
	 *
	 * @uses PHP_Typography\Text_Parser
	 * @uses PHP_Typography\Text_Parser\Token
	 *
	 * @dataProvider provide_style_numbers_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 */
	public function test_apply_off( $input, $result ) {
		$this->s->set_style_numbers( false );

		$this->assertFixResultSame( $input, $input );
	}
}
