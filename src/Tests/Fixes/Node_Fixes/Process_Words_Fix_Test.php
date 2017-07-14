<?php

namespace PHP_Typography\Tests\Fixes\Node_Fixes;

use \PHP_Typography\Fixes\Node_Fixes;
use \PHP_Typography\Fixes\Token_Fix;
use \PHP_Typography\Settings;

/**
 * DOM unit test.
 *
 * @coversDefaultClass \PHP_Typography\Fixes\Node_Fixes\Dewidow_Fix
 * @usesDefaultClass \PHP_Typography\Fixes\Node_Fixes\Dewidow_Fix
 */
class Process_Words_Fix_Test extends Node_Fix_Testcase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
		parent::setUp();

		$this->fix = new Node_Fixes\Process_Words_Fix();
	}

	/**
	 * Provide data for testing process_words.
	 *
	 * @return array
	 */
	public function provide_process_words_data() {
		return [
			[ 'superfluous', 'super&shy;flu&shy;ous', false ], // hyphenate.
			[ 'super-policemen', 'super-police&shy;men', false ], // hyphenate compounds.
			[ 'http://example.org', 'http://&#8203;exam&#8203;ple&#8203;.org', false ], // wrap URLs.
			[ 'foo@example.org', 'foo@&#8203;example.&#8203;org', false ], // wrap emails.
		];
	}

	/**
	 * Test get_text_parser.
	 *
	 * @covers ::get_text_parser
	 *
	 * @uses PHP_Typography\Text_Parser::__construct
	 */
	public function test_get_text_parser() {
		$this->assertAttributeEmpty( 'text_parser', $this->fix );

		$parser1 = $this->fix->get_text_parser();
		$this->assertInstanceOf( '\PHP_Typography\Text_Parser', $parser1 );

		$parser2 = $this->fix->get_text_parser();
		$this->assertInstanceOf( '\PHP_Typography\Text_Parser', $parser2 );

		$this->assertSame( $parser1, $parser2 );
		$this->assertAttributeInstanceOf( '\PHP_Typography\Text_Parser', 'text_parser', $this->fix );
	}

	/**
	 * Test apply.
	 *
	 * @covers ::apply
	 *
	 * @uses PHP_Typography\Hyphenator
	 * @uses PHP_Typography\Hyphenator\Trie_Node
	 * @uses PHP_Typography\Text_Parser
	 * @uses PHP_Typography\Text_Parser\Token
	 *
	 * @dataProvider provide_process_words_data
	 *
	 * @param string $input  HTML input.
	 * @param string $result Expected result.
	 */
	public function test_apply( $input, $result ) {
		// Create a stub for the Token_Fixer interface.
		$fake_token_fixer = $this->createMock( Token_Fix::class );
		$fake_token_fixer->method( 'apply' )->willReturn( $this->tokenize( $result ) );
		$fake_token_fixer->method( 'target' )->willReturn( Token_Fix::MIXED_WORDS );

		$this->fix->register_token_fix( $fake_token_fixer );

		$this->assertFixResultSame( $input, $result );
	}
}
