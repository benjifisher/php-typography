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
class Wrap_URLs_Fix_Test extends Token_Fix_Testcase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Token_Fixes\Wrap_URLs_Fix();
	}

	/**
	 * Provide data for testing wrap_urls.
	 *
	 * @return array
	 */
	public function provide_wrap_urls_data() {
		return [
			[ 'https://example.org/',                'https://&#8203;example&#8203;.org/',          2 ],
			[ 'http://example.org/',                 'http://&#8203;example&#8203;.org/',           2 ],
			[ 'https://my-example.org',              'https://&#8203;my&#8203;-example&#8203;.org', 2 ],
			[ 'https://example.org/some/long/path/', 'https://&#8203;example&#8203;.org/&#8203;s&#8203;o&#8203;m&#8203;e&#8203;/&#8203;l&#8203;o&#8203;n&#8203;g&#8203;/&#8203;path/', 5 ],
			[ 'https://example.org:8080/',           'https://&#8203;example&#8203;.org:8080/',     2 ],
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
	 * @dataProvider provide_wrap_urls_data
	 *
	 * @param string $input     HTML input.
	 * @param string $result    Expected result.
	 * @param int    $min_after Minimum number of characters after URL wrapping.
	 */
	public function test_apply( $input, $result, $min_after  ) {
		$this->s->set_url_wrap( true );
		$this->s->set_min_after_url_wrap( $min_after );

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
	 * @dataProvider provide_wrap_urls_data
	 *
	 * @param string $input     HTML input.
	 * @param string $result    Expected result.
	 * @param int    $min_after Minimum number of characters after URL wrapping.
	 */
	public function test_apply_off( $input, $result, $min_after  ) {
		$this->s->set_url_wrap( false );
		$this->s->set_min_after_url_wrap( $min_after );

		$this->assertFixResultSame( $input, $input );
	}
}
