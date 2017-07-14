<?php

/**
 * An autoloader implementation for the PHP_Typography test scaffolding.
 *
 * @param string $class_name Required.
 */
function tests_autoloader( $class_name ) {
	static $prefix;
	if ( empty( $prefix ) ) {
		$prefix = 'PHP_Typography\\Tests\\';
	}

	if ( false === strpos( $class_name, $prefix ) ) {
		return; // abort early.
	} else {
		$class_name = str_replace( '_', '-', strtolower( substr( $class_name, strlen( $prefix ) ) ) );
	}

	$classes_dir = realpath( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR;
	$class_name_parts = explode( '\\', $class_name );
	$class_file = 'class-' . array_pop( $class_name_parts ) . '.php';

	if ( count( $class_name_parts ) > 0 ) {
		$classes_dir .= implode( DIRECTORY_SEPARATOR, array_map( 'strtolower', $class_name_parts ) ) . DIRECTORY_SEPARATOR;
	}

	$class_file_path = $classes_dir . $class_file;

	if ( is_file( $class_file_path ) ) {
		require_once( $class_file_path );
	}
}
spl_autoload_register( 'tests_autoloader' );

/**
 * Autoloading PHP_Typography.
 */
require_once dirname( __DIR__ ) . '/php-typography-autoload.php';

/**
 * Load HTML parser for function testing.
 */
require_once dirname( __DIR__ ) . '/vendor/Masterminds/HTML5.php';
require_once dirname( __DIR__ ) . '/vendor/Masterminds/HTML5/autoload.php';
