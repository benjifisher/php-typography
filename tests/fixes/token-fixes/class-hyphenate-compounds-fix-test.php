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
class Hyphenate_Compounds_Fix_Test extends Token_Fix_Testcase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Token_Fixes\Hyphenate_Compounds_Fix();
	}

	/**
	 * Provide data for testing hyphenation.
	 *
	 * @return array
	 */
	public function provide_hyphenate_data() {
		return [
			// Not working with new de pattern file: [ 'Sauerstoff-Feldflasche', 'Sau&shy;er&shy;stoff-Feld&shy;fla&shy;sche', 'de', true, true, true, true ],.
			[ 'Sauerstoff-Feldflasche', 'Sauer&shy;stoff-Feld&shy;fla&shy;sche', 'de', true, true, true, true ],
			[ 'Sauerstoff-Feldflasche', 'Sauerstoff-Feldflasche', 'de', true, true, true, false ],
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
	 * @dataProvider provide_hyphenate_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 * @param string $lang                 Language code.
	 * @param bool   $hyphenate_headings   Hyphenate headings.
	 * @param bool   $hyphenate_all_caps   Hyphenate words in ALL caps.
	 * @param bool   $hyphenate_title_case Hyphenate words in Title Case.
	 * @param bool   $hyphenate_compunds   Hyphenate compound-words.
	 */
	public function test_apply( $input, $result, $lang, $hyphenate_headings, $hyphenate_all_caps, $hyphenate_title_case, $hyphenate_compunds ) {
		$this->s->set_hyphenation( true );
		$this->s->set_hyphenation_language( $lang );
		$this->s->set_min_length_hyphenation( 2 );
		$this->s->set_min_before_hyphenation( 2 );
		$this->s->set_min_after_hyphenation( 2 );
		$this->s->set_hyphenate_headings( $hyphenate_headings );
		$this->s->set_hyphenate_all_caps( $hyphenate_all_caps );
		$this->s->set_hyphenate_title_case( $hyphenate_title_case );
		$this->s->set_hyphenate_compounds( $hyphenate_compunds );
		$this->s->set_hyphenation_exceptions( [ 'KING-desk' ] );

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
	 * @dataProvider provide_hyphenate_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 * @param string $lang                 Language code.
	 * @param bool   $hyphenate_headings   Hyphenate headings.
	 * @param bool   $hyphenate_all_caps   Hyphenate words in ALL caps.
	 * @param bool   $hyphenate_title_case Hyphenate words in Title Case.
	 * @param bool   $hyphenate_compunds   Hyphenate compound-words.
	 */
	public function test_apply_off( $input, $result, $lang, $hyphenate_headings, $hyphenate_all_caps, $hyphenate_title_case, $hyphenate_compunds ) {
		$this->s->set_hyphenation( false );
		$this->s->set_hyphenation_language( $lang );
		$this->s->set_min_length_hyphenation( 2 );
		$this->s->set_min_before_hyphenation( 2 );
		$this->s->set_min_after_hyphenation( 2 );
		$this->s->set_hyphenate_headings( $hyphenate_headings );
		$this->s->set_hyphenate_all_caps( $hyphenate_all_caps );
		$this->s->set_hyphenate_title_case( $hyphenate_title_case );
		$this->s->set_hyphenate_compounds( $hyphenate_compunds );
		$this->s->set_hyphenation_exceptions( [ 'KING-desk' ] );

		$this->assertFixResultSame( $input, $input );
	}
}
