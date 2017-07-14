<?php

namespace PHP_Typography;

/**
 * A utility class to help with array manipulation.
 */
abstract class Arrays {
	/**
	 * Provides an array_map implementation with control over resulting array's keys.
	 *
	 * @param  callable $callable A callback function that needs to $key, $value pairs.
	 *                            The callback should return tuple where the first part
	 *                            will be used as the key and the second as the value.
	 * @param  array    $array    The array.
	 *
	 * @return array
	 */
	public static function array_map_assoc( callable $callable, array $array ) {
		return array_column( array_map( $callable, array_keys( $array ), $array ), 1, 0 );
	}
}
