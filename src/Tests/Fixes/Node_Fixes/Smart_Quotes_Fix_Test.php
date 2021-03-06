<?php

namespace PHP_Typography\Tests\Fixes\Node_Fixes;

use \PHP_Typography\Fixes\Node_Fixes\Smart_Quotes_Fix;
use \PHP_Typography\Settings;

/**
 * DOM unit test.
 *
 * @coversDefaultClass \PHP_Typography\Fixes\Node_Fixes\Smart_Quotes_Fix
 * @usesDefaultClass \PHP_Typography\Fixes\Node_Fixes\Smart_Quotes_Fix
 */
class Smart_Quotes_Fix_Test extends Node_Fix_Testcase {
	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Smart_Quotes_Fix();
	}

	/**
	 * Provide data for testing smart_quotes.
	 *
	 * @return array
	 */
	public function provide_smart_quotes_data() {
		return array(
			[ '"This is so 1996", he said.',       '&ldquo;This is so 1996&rdquo;, he said.' ],
			[ '6\'5"',                             '6&prime;5&Prime;' ],
			[ '6\' 5"',                            '6&prime; 5&Prime;' ],
			[ '6\'&nbsp;5"',                       '6&prime;&nbsp;5&Prime;' ],
			[ " 6'' ",                             ' 6&Prime; ' ], // nobody uses this for quotes, so it should be OK to keep the primes here.
			[ 'ein 32"-Fernseher',                 'ein 32&Prime;-Fernseher' ],
			[ "der 8'-Ölbohrer",                   'der 8&prime;-&Ouml;lbohrer' ],
			[ "der 1/4'-Bohrer",                   'der 1/4&prime;-Bohrer' ],
			[ 'Hier 1" "Typ 2" einsetzen',         'Hier 1&Prime; &ldquo;Typ 2&rdquo; einsetzen' ],
			[ "2/4'",                              '2/4&prime;' ],
			[ '3/44"',                             '3/44&Prime;' ],
			[ '("Some" word',                      '(&ldquo;Some&rdquo; word' ],
		);
	}

	/**
	 * Provide data for testing smart quotes.
	 *
	 * @return array
	 */
	public function provide_smart_quotes_special_data() {
		return array(
			array( '("Some" word', '(&raquo;Some&laquo; word', 'doubleGuillemetsReversed', 'singleGuillemetsReversed' ),
		);
	}

	/**
	 * Test apply.
	 *
	 * @covers ::apply
	 *
	 * @uses PHP_Typography\Text_Parser
	 * @uses PHP_Typography\Text_Parser\Token
	 *
	 * @dataProvider provide_smart_quotes_special_data
	 *
	 * @param string $html      HTML input.
	 * @param string $result    Expected entity-escaped result.
	 * @param string $primary   Primary quote style.
	 * @param string $secondary Secondard  quote style.
	 */
	public function test_smart_quotes_special( $html, $result, $primary, $secondary ) {
		$this->s->set_smart_quotes( true );
		$this->s->set_smart_quotes_primary( $primary );
		$this->s->set_smart_quotes_secondary( $secondary );

		$this->assertFixResultSame( $html, $result );
	}

	/**
	 * Test apply.
	 *
	 * @covers ::apply
	 *
	 * @uses PHP_Typography\Text_Parser
	 * @uses PHP_Typography\Text_Parser\Token
	 *
	 * @dataProvider provide_smart_quotes_data
	 *
	 * @param string $html       HTML input.
	 * @param string $result     Expected result.
	 */
	public function test_apply( $html, $result ) {
		$this->s->set_smart_quotes( true );

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
	 * @dataProvider provide_smart_quotes_data
	 *
	 * @param string $html       HTML input.
	 * @param string $result     Expected result.
	 */
	public function test_apply_off( $html, $result ) {
		$this->s->set_smart_quotes( false );

		$this->assertFixResultSame( $html, $html );
	}
}
