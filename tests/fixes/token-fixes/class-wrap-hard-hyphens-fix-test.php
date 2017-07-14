<?php

namespace PHP_Typography\Tests\Fixes\Token_Fixes;

use \PHP_Typography\Fixes\Token_Fixes;
use \PHP_Typography\Settings;

/**
 * DOM unit test.
 *
 * @coversDefaultClass \PHP_Typography\Fixes\Token_Fixes\Hyphenate_Compounds_Fix
 * @usesDefaultClass \PHP_Typography\Fixes\Token_Fixes\Hyphenate_Compounds_Fix
 */
class Wrap_Hard_Hyphens_Fix_Test extends Token_Fix_Testcase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Token_Fixes\Wrap_Hard_Hyphens_Fix();
	}

	/**
	 * Provide data for testing wrap_hard_hyphens.
	 *
	 * @return array
	 */
	public function provide_wrap_hard_hyphens_data() {
		return [
			[ 'This-is-a-hyphenated-word', 'This-&#8203;is-&#8203;a-&#8203;hyphenated-&#8203;word' ],
			[ 'This-is-a-hyphenated-', 'This-&#8203;is-&#8203;a-&#8203;hyphenated-' ],

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
	 * @dataProvider provide_wrap_hard_hyphens_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 */
	public function test_apply( $input, $result ) {
		$this->s->set_wrap_hard_hyphens( true );

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
	 * @dataProvider provide_wrap_hard_hyphens_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 */
	public function test_apply_off( $input, $result ) {
		$this->s->set_wrap_hard_hyphens( false );

		$this->assertFixResultSame( $input, $input );
	}
}
