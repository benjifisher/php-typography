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
class Smart_Dashes_Fix_Test extends Node_Fix_Testcase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Node_Fixes\Smart_Dashes_Fix();
	}

	/**
	 * Provide data for testing smart dashes.
	 *
	 * @return array
	 */
	public function provide_smart_dashes_data() {
		return [
			[
				'Ein - mehr oder weniger - guter Gedanke, 1908-2008',
				'Ein &mdash; mehr oder weniger &mdash; guter Gedanke, 1908&ndash;2008',
				'Ein &ndash; mehr oder weniger &ndash; guter Gedanke, 1908&ndash;2008',
			],
			[
				"We just don't know --- really---, but you know, --",
				"We just don't know &mdash; really&mdash;, but you know, &ndash;",
				"We just don't know &mdash; really&mdash;, but you know, &ndash;",
			],
			[
				'что природа жизни - это Блаженство',
				'что природа жизни &mdash; это Блаженство',
				'что природа жизни &ndash; это Блаженство',
			],
			[
				'Auch 3.-8. März sollte die - richtigen - Gedankenstriche verwenden.',
				'Auch 3.&ndash;8. M&auml;rz sollte die &mdash; richtigen &mdash; Gedankenstriche verwenden.',
				'Auch 3.&ndash;8. M&auml;rz sollte die &ndash; richtigen &ndash; Gedankenstriche verwenden.',
			],
			[
				'20.-30.',
				'20.&ndash;30.',
				'20.&ndash;30.',
			],
			[
				'Zu- und Abnahme',
				'Zu- und Abnahme',
				'Zu- und Abnahme',
			],
			[
				'Glücks-',
				'Glücks-',
				'Glücks-',
			],
			[
				'Foo-',
				'Foo-',
				'Foo-',
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
	 * @dataProvider provide_smart_dashes_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result_us  Entity-escaped result with US dash style.
	 * @param string $result_int Entity-escaped result with international dash style.
	 */
	public function test_apply( $input, $result_us, $result_int ) {
		$this->s->set_smart_dashes( true );

		$this->s->set_smart_dashes_style( 'traditionalUS' );
		$this->assertFixResultSame( $input, $result_us );

		$this->s->set_smart_dashes_style( 'international' );
		$this->assertFixResultSame( $input, $result_int );

	}

	/**
	 * Test apply.
	 *
	 * @covers ::apply
	 *
	 * @uses PHP_Typography\Text_Parser
	 * @uses PHP_Typography\Text_Parser\Token
	 *
	 * @dataProvider provide_smart_dashes_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result_us  Entity-escaped result with US dash style.
	 * @param string $result_int Entity-escaped result with international dash style.
	 */
	public function test_apply_off( $input, $result_us, $result_int ) {
		$this->s->set_smart_dashes( false );

		$this->s->set_smart_dashes_style( 'traditionalUS' );
		$this->assertFixResultSame( $input, $input );

		$this->s->set_smart_dashes_style( 'international' );
		$this->assertFixResultSame( $input, $input );
	}
}
