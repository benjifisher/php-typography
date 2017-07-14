<?php

namespace PHP_Typography\Tests\Fixes\Node_Fixes;

use \PHP_Typography\Fixes\Node_Fixes\Dewidow_Fix;
use \PHP_Typography\Settings;

/**
 * DOM unit test.
 *
 * @coversDefaultClass \PHP_Typography\Fixes\Node_Fixes\Dewidow_Fix
 * @usesDefaultClass \PHP_Typography\Fixes\Node_Fixes\Dewidow_Fix
 */
class Dewidow_Fix_Test extends Node_Fix_Testcase {
	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Dewidow_Fix();
	}

	/**
	 * Provide data for testing dewidowing.
	 *
	 * @return array
	 */
	public function provide_dewidow_data() {
		return [
			[ 'bla foo b', 'bla foo&nbsp;b', 3, 2 ],
			[ 'bla foo&thinsp;b', 'bla foo&thinsp;b', 3, 2 ], // don't replace thin space...
			[ 'bla foo&#8202;b', 'bla foo&#8202;b', 3, 2 ],   // ... or hair space.
			[ 'bla foo bar', 'bla foo bar', 2, 2 ],
			[ 'bla foo bär...', 'bla foo&nbsp;b&auml;r...', 3, 3 ],
			[ 'bla foo&nbsp;bär...', 'bla foo&nbsp;b&auml;r...', 3, 3 ],
			[ 'bla föö&#8203;bar s', 'bla f&ouml;&ouml;&#8203;bar&nbsp;s', 3, 2 ],
			[ 'bla foo&#8203;bar s', 'bla foo&#8203;bar s', 2, 2 ],
			[ 'bla foo&shy;bar', 'bla foo&shy;bar', 3, 3 ], // &shy; not matched.
			[ 'bla foo&shy;bar bar', 'bla foo&shy;bar&nbsp;bar', 3, 3 ], // &shy; not matched, but syllable after is.
			[ 'bla foo&#8203;bar bar', 'bla foo&#8203;bar&nbsp;bar', 3, 3 ],
			[ 'bla foo&nbsp;bar bar', 'bla foo&nbsp;bar bar', 3, 3 ], // widow not replaced because the &nbsp; would pull too many letters from previous.
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
	 * @dataProvider provide_dewidow_data
	 *
	 * @param string $html       HTML input.
	 * @param string $result     Expected result.
	 * @param int    $max_pull   Maximum number of pulled characters.
	 * @param int    $max_length Maximum word length for dewidowing.
	 */
	public function test_apply( $html, $result, $max_pull, $max_length ) {
		$this->s->set_dewidow( true );
		$this->s->set_max_dewidow_pull( $max_pull );
		$this->s->set_max_dewidow_length( $max_length );

		$this->assertFixResultSame( $html, $result );
	}

	/**
	 * Test dewidow.
	 *
	 * @covers ::apply
	 *
	 * @uses PHP_Typography\Text_Parser
	 * @uses PHP_Typography\Text_Parser\Token
	 *
	 * @dataProvider provide_dewidow_data
	 *
	 * @param string $html       HTML input.
	 * @param string $result     Expected result.
	 * @param int    $max_pull   Maximum number of pulled characters.
	 * @param int    $max_length Maximum word length for dewidowing.
	 */
	public function test_apply_off( $html, $result, $max_pull, $max_length ) {
		$this->s->set_dewidow( false );
		$this->s->set_max_dewidow_pull( $max_pull );
		$this->s->set_max_dewidow_length( $max_length );

		$this->assertFixResultSame( $html, $html );
	}
}
