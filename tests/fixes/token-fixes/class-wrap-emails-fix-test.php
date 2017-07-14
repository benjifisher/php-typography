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
class Wrap_Emails_Fix_Test extends Token_Fix_Testcase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Token_Fixes\Wrap_Emails_Fix();
	}

	/**
	 * Provide data for testing wrap_emails.
	 *
	 * @return array
	 */
	public function provide_wrap_emails_data() {
		return [
			[ 'code@example.org',         'code@&#8203;example.&#8203;org' ],
			[ 'some.name@sub.domain.org', 'some.&#8203;name@&#8203;sub.&#8203;domain.&#8203;org' ],
			[ 'funny123@summer1.org',     'funny1&#8203;2&#8203;3&#8203;@&#8203;summer1&#8203;.&#8203;org' ],
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
	 * @dataProvider provide_wrap_emails_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 */
	public function test_apply( $input, $result ) {
		$this->s->set_email_wrap( true );

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
	 * @dataProvider provide_wrap_emails_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 */
	public function test_apply_off( $input, $result ) {
		$this->s->set_email_wrap( false );

		$this->assertFixResultSame( $input, $input );
	}
}
