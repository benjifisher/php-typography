<?php

namespace PHP_Typography\Tests\Fixes\Node_Fixes;

use \PHP_Typography\Fixes\Node_Fixes\Dash_Spacing_Fix;
use \PHP_Typography\Settings;

/**
 * DOM unit test.
 *
 * @coversDefaultClass \PHP_Typography\Fixes\Node_Fixes\Dash_Spacing_Fix
 * @usesDefaultClass \PHP_Typography\Fixes\Node_Fixes\Dash_Spacing_Fix
 */
class Dash_Spacing_Fix_Test extends Node_Fix_Testcase {
	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Dash_Spacing_Fix();
	}

	/**
	 * Provide data for testing dash spacing.
	 *
	 * @return array
	 */
	public function provide_dash_spacing_data() {
		return [
			[
				'Ein &mdash; mehr oder weniger &mdash; guter Gedanke, 1908&ndash;2008',
				'Ein&thinsp;&mdash;&thinsp;mehr oder weniger&thinsp;&mdash;&thinsp;guter Gedanke, 1908&thinsp;&ndash;&thinsp;2008',
				'traditionalUS',
			],
			[
				'Ein &ndash; mehr oder weniger &ndash; guter Gedanke, 1908&ndash;2008',
				'Ein &ndash; mehr oder weniger &ndash; guter Gedanke, 1908&#8202;&ndash;&#8202;2008',
				'international',
			],
			[
				"We just don't know &mdash; really&mdash;, but you know, &ndash;",
				"We just don't know&thinsp;&mdash;&thinsp;really&thinsp;&mdash;&thinsp;, but you know, &ndash;",
				'traditionalUS',
			],
			[
				"We just don't know &mdash; really&mdash;, but you know, &ndash;",
				"We just don't know&#8202;&mdash;&#8202;really&#8202;&mdash;&#8202;, but you know, &ndash;",
				'international',
			],
			[
				'Auch 3.&ndash;8. März sollte die &mdash; richtigen &mdash; Gedankenstriche verwenden.',
				'Auch 3.&thinsp;&ndash;&thinsp;8. M&auml;rz sollte die&thinsp;&mdash;&thinsp;richtigen&thinsp;&mdash;&thinsp;Gedankenstriche verwenden.',
				'traditionalUS',
			],
			[
				'Auch 3.&ndash;8. März sollte die &ndash; richtigen &ndash; Gedankenstriche verwenden.',
				'Auch 3.&#8202;&ndash;&#8202;8. M&auml;rz sollte die &ndash; richtigen &ndash; Gedankenstriche verwenden.',
				'international',
			],
		];
	}

	/**
	 * Provide data for testing smart dashes (where hyphen should not be changed).
	 *
	 * @return array
	 */
	public function provide_dash_spacing_unchanged_data() {
		return [
			[ 'Vor- und Nachteile, i-Tüpfelchen, 100-jährig, Fritz-Walter-Stadion, 2015-12-03, 01-01-1999, 2012-04' ],
			[ 'Bananen-Milch und -Brot' ],
			[ 'pick-me-up' ],
			[ 'You may see a yield that is two-, three-, or fourfold.' ],
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
	 * @dataProvider provide_dash_spacing_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Entity-escaped result.
	 * @param string $style  Dash style.
	 */
	 public function test_apply( $input, $result, $style ) {
		$this->s->set_dash_spacing( true );
		$this->s->set_smart_dashes_style( $style );

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
	 * @dataProvider provide_dash_spacing_unchanged_data
	 *
	 * @param string $input HTML input.
	 */
	 public function test_apply_unchanged( $input ) {
		$this->s->set_dash_spacing( true );

		$this->s->set_smart_dashes_style( 'traditionalUS' );
		$this->assertFixResultSame( $input, $input );

		$this->s->set_smart_dashes_style( 'international' );
		$this->assertFixResultSame( $input, $input );
	}

	/**
	 * Test dewidow.
	 *
	 * @covers ::apply
	 *
	 * @uses PHP_Typography\Text_Parser
	 * @uses PHP_Typography\Text_Parser\Token
	 *
	 * @dataProvider provide_dash_spacing_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Entity-escaped result.
	 * @param string $style  Dash style.
	 */
	public function test_apply_off( $input, $result, $style ) {
		$this->s->set_dash_spacing( false );
		$this->s->set_smart_dashes_style( $style );

		$this->assertFixResultSame( $input, $input );
	}
}
