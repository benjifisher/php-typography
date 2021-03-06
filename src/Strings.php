<?php

namespace PHP_Typography;

/**
 * A utility class to handle fast and save string function access.
 */
abstract class Strings {
	/**
	 * Utility patterns for splitting string parameter lists into arrays.
	 *
	 * @var string
	 */
	const _RE_PARAMETER_SPLITTING = '/[\s,]+/S';

	/**
	 * An array of encodings in detection order.
	 *
	 * ASCII has to be first to have a chance of detection.
	 *
	 * @var array
	 */
	private static $encodings = [ 'ASCII', 'UTF-8' ];

	/**
	 * A hash map for string functions according to encoding.
	 *
	 * @var array $encoding => [ 'strlen' => $function_name, ... ].
	 */
	private static $str_functions = [
		'UTF-8' => [
			'strlen'     => 'mb_strlen',
			'str_split'  => [ '\PHP_Typography\Strings', 'mb_str_split' ],
			'strtolower' => 'mb_strtolower',
			'strtoupper' => 'mb_strtoupper',
			'substr'     => 'mb_substr',
			'u'          => 'u',
		],
		'ASCII' => [
			'strlen'     => 'strlen',
			'str_split'  => 'str_split',
			'strtolower' => 'strtolower',
			'strtoupper' => 'strtoupper',
			'substr'     => 'substr',
			'u'          => '',
		],
		false   => [],
	];

	/**
	 * Retrieves str* functions.
	 *
	 * @param  string $str A string to detect the encoding from.
	 * @return array {
	 *         An array of string functions.
	 *
	 *         'strlen'     => callable,
	 *         'str_split'  => callable,
	 *         'strtolower' => callable,
	 *         'strtoupper' => callable,
	 *         'substr'     => callable,
	 *         'u'          => modifier string
	 * }
	 */
	public static function functions( $str ) {
		return self::$str_functions[ mb_detect_encoding( $str, self::$encodings, true ) ];
	}

	/**
	 * Multibyte-safe str_split function.
	 *
	 * Unlike str_split, a $split_length less than 1 is ignored (and thus
	 * equivalent to the default).
	 *
	 * @param string $str           Required.
	 * @param int    $split_length  Optional. Default 1.
	 *
	 * @return array                An array of $split_length character chunks.
	 */
	public static function mb_str_split( $str, $split_length = 1 ) {
		$result = preg_split( '//u', $str , -1, PREG_SPLIT_NO_EMPTY );

		if ( $split_length > 1 ) {
			$splits = [];
			foreach ( array_chunk( $result, $split_length ) as $chunk ) {
				$splits[] = join( '', $chunk );
			}

			$result = $splits;
		}

		return $result;
	}

	/**
	 * Converts decimal value to unicode character.
	 *
	 * @param int|string|array $codes Decimal value(s) coresponding to unicode character(s).
	 *
	 * @return string Unicode character(s).
	 */
	public static function uchr( $codes ) {

		// Single character code.
		if ( is_scalar( $codes ) ) {
			$codes = func_get_args();
		}

		// Deal with an array of character codes.
		$str = '';
		foreach ( $codes as $code ) {
			$str .= self::_uchr( (int) $code );
		}

		return $str;
	}
	/**
	 * Converts decimal value to unicode character.
	 *
	 * For internal use only.
	 *
	 * @param int $code Decimal value coresponding to unicode character.
	 *
	 * @return string Unicode character.
	 */
	public static function _uchr( $code ) {
		return html_entity_decode( '&#' . $code . ';', ENT_NOQUOTES, 'UTF-8' );
	}

	/**
	 * If necessary, split the passed parameters string into an array.
	 *
	 * @param  array|string $params Parameters.
	 *
	 * @return array
	 */
	public static function maybe_split_parameters( $params ) {
		if ( ! is_array( $params ) ) {
			$params = preg_split( self::_RE_PARAMETER_SPLITTING, $params, -1, PREG_SPLIT_NO_EMPTY );
		}

		return $params;
	}
}

/**
 * Set UTF-8 as the default encoding for mb_* functions.
 *
 * Not sure if this is necessary - but error_log seems to have problems with
 * the strings otherwise.
 */
mb_internal_encoding( 'UTF-8' );  // @codeCoverageIgnore
