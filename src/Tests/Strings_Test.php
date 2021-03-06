<?php

namespace PHP_Typography\Tests;

use PHP_Typography\Strings;

/**
 * DOM unit test.
 *
 * @coversDefaultClass \PHP_Typography\Strings
 * @usesDefaultClass \PHP_Typography\Strings
 */
class Strings_Test extends \PHPUnit\Framework\TestCase {

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() { // @codingStandardsIgnoreLine
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() { // @codingStandardsIgnoreLine
	}

	/**
	 * Reports an error identified by $message if the given function array contains a non-callable.
	 *
	 * @param array  $func    An array of string functions.
	 * @param string $message Optional. Default ''.
	 */
	protected function assertStringFunctions( array $func, $message = '' ) {
		// Each function is a callable (except for the 'u' modifier string).
		foreach ( $func as $name => $function ) {
			if ( 'u' !== $name ) {
				$this->assertTrue( is_callable( $function ) );
			}
		}
	}

	/**
	 * Test ::functions.
	 *
	 * @covers ::functions
	 */
	public function test_functions() {
		$func_ascii = Strings::functions( 'ASCII' );
		$func_utf8  = Strings::functions( 'UTF-8 üäß' );

		// We are dealing with ararys.
		$this->assertTrue( is_array( $func_ascii ) );
		$this->assertTrue( is_array( $func_utf8 ) );

		// The arrays are not (almost) empty.
		$this->assertGreaterThan( 1, count( $func_ascii ), 'ASCII array contains fewer than 2 functions.' );
		$this->assertGreaterThan( 1, count( $func_utf8 ),  'UTF-8 array contains fewer than 2 functions.' );

		// The keys are identical.
		$this->assertSame( array_keys( $func_ascii ), array_keys( $func_utf8 ) );

		// Each function is a callable (except for the 'u' modifier string).
		$this->assertStringFunctions( $func_ascii );
		$this->assertStringFunctions( $func_utf8 );
	}

	/**
	 * Provide data for testing uchr.
	 *
	 * @return array
	 */
	public function provide_uchr_data() {
		return [
			[ 33,   '!' ],
			[ 9,    "\t" ],
			[ 10,   "\n" ],
			[ 35,   '#' ],
			[ 103,  'g' ],
			[ 336,  'Ő' ],
			[ 497,  'Ǳ' ],
			[ 1137, 'ѱ' ],
			[ 2000, 'ߐ' ],
		];
	}

	/**
	 * Provide data for testing uchr.
	 *
	 * @return array
	 */
	public function provide_uchr_multi_data() {
		return [
			[ [ 33, 9, 103, 2000 ],   "!\tgߐ" ],
		];
	}

	/**
	 * Test uchr.
	 *
	 * @covers ::uchr
	 * @uses ::_uchr
	 *
	 * @dataProvider provide_uchr_data
	 *
	 * @param  int    $code   Character code.
	 * @param  string $result Expected result.
	 */
	public function test_uchr( $code, $result ) {
		$this->assertSame( $result, Strings::uchr( $code ) );
	}

	/**
	 * Test uchr.
	 *
	 * @covers ::uchr
	 * @uses ::_uchr
	 *
	 * @dataProvider provide_uchr_multi_data
	 *
	 * @param  array  $input  Character codes.
	 * @param  string $result Expected result.
	 */
	public function test_uchr_multi( $input, $result ) {
		$this->assertSame( $result, call_user_func_array( [ 'PHP_Typography\Strings', 'uchr' ], $input ) );
		$this->assertSame( $result, Strings::uchr( $input ) );
	}

	/**
	 * Test _uchr.
	 *
	 * @covers ::_uchr
	 *
	 * @dataProvider provide_uchr_data
	 *
	 * @param  int    $code   Character code.
	 * @param  string $result Expected result.
	 */
	public function test__uchr( $code, $result ) {
		$this->assertSame( $result, Strings::_uchr( $code ) );
	}


	/**
	 * Provide data for testing mb_str_split.
	 *
	 * @return array
	 */
	public function provide_mb_str_split_data() {
		return [
			[ '', 1, [] ],
			[ 'A ship', 1, [ 'A', ' ', 's', 'h', 'i', 'p' ] ],
			[ 'Äöüß', 1, [ 'Ä', 'ö', 'ü', 'ß' ] ],
			[ 'Äöüß', 2, [ 'Äö', 'üß' ] ],
			[ 'Äöüß', 0, [ 'Ä', 'ö', 'ü', 'ß' ] ],
		];
	}

	/**
	 * Test mb_str_split.
	 *
	 * @covers ::mb_str_split
	 * @dataProvider provide_mb_str_split_data
	 *
	 * @param  string $string   A multibyte string.
	 * @param  int    $length   Split length.
	 * @param  array  $result   Expected result.
	 */
	public function test_mb_str_split( $string, $length, $result ) {
		$this->assertSame( $result, Strings::mb_str_split( $string, $length ) );
	}

	/**
	 * Provide data for testing maybe_split_parameters.
	 *
	 * @return array
	 */
	public function provide_maybe_split_parameters_data() {
		return [
			[ [], [] ],
			[ '', [] ],
			[ ',', [] ],
			[ 'a,b', [ 'a', 'b' ] ],
			[ 'foo, bar, xxx', [ 'foo', 'bar', 'xxx' ] ],
			[ [ 'foo', 'bar', 'xxx' ], [ 'foo', 'bar', 'xxx' ] ],
			[ [ 1, 2, 'drei' ], [ 1, 2, 'drei' ] ],
		];
	}

	/**
	 * Test maybe_split_parameters.
	 *
	 * @covers ::maybe_split_parameters
	 * @dataProvider provide_maybe_split_parameters_data
	 *
	 * @param string|array $input  Parameters sring/array.
	 * @param array        $result Expected output.
	 */
	public function test_maybe_split_parameters( $input, $result ) {
		$this->assertSame( $result, Strings::maybe_split_parameters( $input ) );
	}
}
