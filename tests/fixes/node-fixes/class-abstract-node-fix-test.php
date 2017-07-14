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
class Abstract_Node_Fix_Test extends Node_Fix_Testcase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Node_Fixes\Style_Caps_Fix( 'caps' ); // Does not matter.
	}

	/**
	 * Provide data for testing remove_adjacent_characters.
	 *
	 * @return array
	 */
	public function provide_remove_adjacent_characters_data() {
		return [
			[ "'A certain kind'", "'", "'", 'A certain kind' ],
			[ "'A certain kind", "'", "'", 'A certain kin' ],
			[ "'A certain kind'", "'", '', "A certain kind'" ],
		];
	}

	/**
	 * Test private method remove_adjacent_characters.
	 *
	 * @covers ::remove_adjacent_characters
	 * @dataProvider provide_remove_adjacent_characters_data
	 *
	 * @param string $string A string.
	 * @param string $prev   The previous character.
	 * @param string $next   The next character.
	 * @param string $result The trimmed string.
	 */
	public function test_remove_adjacent_characters( $string, $prev, $next, $result ) {
		$this->assertSame( $result, $this->invokeStaticMethod( \PHP_Typography\Fixes\Node_Fixes\Abstract_Node_Fix::class, 'remove_adjacent_characters', [ $string, $prev, $next ] ) );
	}
}
