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
class Smart_Marks_Fix_Test extends Node_Fix_Testcase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Node_Fixes\Smart_Marks_Fix();
	}

	/**
	 * Provide data for testing smart_marks.
	 *
	 * @return array
	 */
	public function provide_smart_marks_data() {
		return [
			[ '(c)',  '&copy;' ],
			[ '(C)',  '&copy;' ],
			[ '(r)',  '&reg;' ],
			[ '(R)',  '&reg;' ],
			[ '(p)',  '&#8471;' ],
			[ '(P)',  '&#8471;' ],
			[ '(sm)', '&#8480;' ],
			[ '(SM)', '&#8480;' ],
			[ '(tm)', '&trade;' ],
			[ '(TM)', '&trade;' ],
			[ '501(c)(1)', '501(c)(1)' ],      // protected.
			[ '501(c)(29)', '501(c)(29)' ],    // protected.
			[ '501(c)(30)', '501&copy;(30)' ], // not protected.
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
	 * @dataProvider provide_smart_marks_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 */
	public function test_apply( $input, $result ) {
		$this->s->set_smart_marks( true );

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
	 * @dataProvider provide_smart_marks_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 */
	public function test_apply_off( $input, $result ) {
		$this->s->set_smart_marks( false );

		$this->assertFixResultSame( $input, $input );
	}
}
