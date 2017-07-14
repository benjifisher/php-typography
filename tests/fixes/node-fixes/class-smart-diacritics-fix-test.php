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
class Smart_Diacritics_Fix_Test extends Node_Fix_Testcase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Node_Fixes\Smart_Diacritics_Fix();
	}

	/**
	 * Provide data for testing smart_diacritics.
	 *
	 * @return array
	 */
	public function provide_smart_diacritics_data() {
		return [
			[ '<p>creme brulee</p>', '<p>crème brûlée</p>', 'en-US' ],
			[ 'no diacritics to replace, except creme', 'no diacritics to replace, except crème', 'en-US' ],
			[ 'ne vs. seine vs einzelne', 'né vs. seine vs einzelne', 'de-DE' ],
			[ 'ne vs. sei&shy;ne vs einzelne', 'né vs. sei&shy;ne vs einzelne', 'de-DE' ],
		];
	}

	/**
	 * Provide data for testing smart_diacritics.
	 *
	 * @return array
	 */
	public function provide_smart_diacritics_error_in_pattern_data() {
		return [
			[ 'no diacritics to replace, except creme', 'en-US', 'creme' ],
		];
	}

	/**
	 * Test smart_diacritics.
	 *
	 * @covers ::smart_diacritics
	 *
	 * @uses PHP_Typography\Text_Parser
	 * @uses PHP_Typography\Text_Parser\Token
	 *
	 * @dataProvider provide_smart_diacritics_error_in_pattern_data
	 *
	 * @param string $html  HTML input.
	 * @param string $lang  Language code.
	 * @param string $unset Replacement to unset.
	 */
	public function test_smart_diacritics_error_in_pattern( $html, $lang, $unset ) {

		$this->s->set_smart_diacritics( true );
		$this->s->set_diacritic_language( $lang );

		$replacements = $this->s['diacriticReplacement'];
		unset( $replacements['replacements'][ $unset ] );
		$this->s['diacriticReplacement'] = $replacements;

		$this->assertFixResultSame( $html, $html );
	}


	/**
	 * Test apply.
	 *
	 * @covers ::apply
	 *
	 * @uses PHP_Typography\Text_Parser
	 * @uses PHP_Typography\Text_Parser\Token
	 *
	 * @dataProvider provide_smart_diacritics_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 * @param string $lang   Language code.
	 */
	public function test_apply( $input, $result, $lang ) {
		$this->s->set_smart_diacritics( true );
		$this->s->set_diacritic_language( $lang );

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
	 * @dataProvider provide_smart_diacritics_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 * @param string $lang   Language code.
	 */
	public function test_apply_off( $input, $result, $lang ) {
		$this->s->set_smart_diacritics( false );
		$this->s->set_diacritic_language( $lang );

		$this->assertFixResultSame( $input, $input );
	}
}
