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
class Smart_Ordinal_Suffix_Fix_Test extends Node_Fix_Testcase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Node_Fixes\Smart_Ordinal_Suffix_Fix();
	}

	/**
	 * Provide data for testing ordinal suffixes.
	 *
	 * @return array
	 */
	public function provide_smart_ordinal_suffix() {
		return [
			[ 'in the 1st instance',      'in the 1<sup>st</sup> instance', '' ],
			[ 'in the 2nd degree',        'in the 2<sup>nd</sup> degree',   '' ],
			[ 'a 3rd party',              'a 3<sup>rd</sup> party',         '' ],
			[ '12th Night',               '12<sup>th</sup> Night',          '' ],
			[ 'in the 1st instance, we',  'in the 1<sup class="ordinal">st</sup> instance, we',  'ordinal' ],
			[ 'murder in the 2nd degree', 'murder in the 2<sup class="ordinal">nd</sup> degree', 'ordinal' ],
			[ 'a 3rd party',              'a 3<sup class="ordinal">rd</sup> party',              'ordinal' ],
			[ 'the 12th Night',           'the 12<sup class="ordinal">th</sup> Night',           'ordinal' ],
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
	 * @dataProvider provide_smart_ordinal_suffix
	 *
	 * @param string $input     HTML input.
	 * @param string $result    Expected result.
	 * @param string $css_class Optional.
	 */
	public function test_apply( $input, $result, $css_class ) {
		$this->s->set_smart_ordinal_suffix( true );

		if ( ! empty( $css_class ) ) {
			$this->fix = new Node_Fixes\Smart_Ordinal_Suffix_Fix( $css_class );
		}

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
	 * @dataProvider provide_smart_ordinal_suffix
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 * @param string $css_class Optional.
	 */
	public function test_apply_off( $input, $result, $css_class ) {
		$this->s->set_smart_ordinal_suffix( false );

		if ( ! empty( $css_class ) ) {
			$this->fix = new Node_Fixes\Smart_Ordinal_Suffix_Fix( $css_class );
		}

		$this->assertFixResultSame( $input, $input );
	}
}
