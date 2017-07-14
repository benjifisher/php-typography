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
class Smart_Fractions_Fix_Test extends Node_Fix_Testcase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();
	}

	/**
	 * Provide data for testing smart_fractions.
	 *
	 * @return array
	 */
	public function provide_smart_fractions_data() {
		return [
			[
				'1/2 3/300 999/1000',
				'<sup>1</sup>&frasl;<sub>2</sub> <sup>3</sup>&frasl;<sub>300</sub> <sup>999</sup>&frasl;<sub>1000</sub>',
				'',
				'',
			],
			[
				'1/2 4/2015 1999/2000 999/1000',
				'<sup>1</sup>&frasl;<sub>2</sub> 4/2015 1999/2000 <sup>999</sup>&frasl;<sub>1000</sub>',
				'',
				'',
			],
			[
				'1/2 3/300 999/1000',
				'<sup class="num">1</sup>&frasl;<sub class="denom">2</sub> <sup class="num">3</sup>&frasl;<sub class="denom">300</sub> <sup class="num">999</sup>&frasl;<sub class="denom">1000</sub>',
				'num',
				'denom',
			],
			[
				'1/2 4/2015 1999/2000 999/1000',
				'<sup class="num">1</sup>&frasl;<sub class="denom">2</sub> 4/2015 1999/2000 <sup class="num">999</sup>&frasl;<sub class="denom">1000</sub>',
				'num',
				'denom',
			],
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
	 * @dataProvider provide_smart_fractions_data
	 *
	 * @param string $input       HTML input.
	 * @param string $result      Expected result.
	 * @param string $numerator   Numerator CSS class.
	 * @param string $denominator Denominator CSS class.
	 */
	public function test_apply( $input, $result, $numerator, $denominator ) {
		$this->fix = new Node_Fixes\Smart_Fractions_Fix( $numerator, $denominator );

		$this->s->set_smart_fractions( true );
		$this->s->set_true_no_break_narrow_space( true );
		$this->s->set_fraction_spacing( false );

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
	 * @dataProvider provide_smart_fractions_data
	 *
	 * @param string $input       HTML input.
	 * @param string $result      Expected result.
	 * @param string $numerator   Numerator CSS class.
	 * @param string $denominator Denominator CSS class.
	 */
	public function test_apply_off( $input, $result, $numerator, $denominator ) {
		$this->fix = new Node_Fixes\Smart_Fractions_Fix( $numerator, $denominator );

		$this->s->set_smart_fractions( false );
		$this->s->set_true_no_break_narrow_space( true );
		$this->s->set_fraction_spacing( false );

		$this->assertFixResultSame( $input, $input );
	}
}
