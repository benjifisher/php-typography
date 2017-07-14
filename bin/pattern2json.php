<?php

namespace PHP_Typography\Bin;

define( 'WP_TYPOGRAPHY_DEBUG', true );

/**
 * Autoload parser classes
 */
require_once dirname( __DIR__ ) . '/php-typography-autoload.php';

$shortopts = 'l:f:hv';
$longopts = [ 'lang:', 'file:', 'help', 'version' ];

$options = getopt( $shortopts, $longopts );

// Print version.
if ( isset( $options['v'] ) || isset( $options['version'] ) ) {
	echo "wp-Typography hyhpenation pattern converter 2.0-beta\n\n";
	die( 0 );
}

// Print help.
if ( isset( $options['h'] ) || isset( $options['help'] ) ) {
	echo "Usage: convert_pattern [arguments]\n";
	echo "pattern2json -l <language> -f <filename>\t\tconvert <filename>\n";
	echo "pattern2json --lang <language> --file <filename>\tconvert <filename>\n";
	echo "pattern2json -v|--version\t\t\t\tprint version\n";
	echo "pattern2json -h|--help\t\t\t\tprint help\n";
	die( 0 );
}

// Read necessary options.
if ( isset( $options['f'] ) ) {
	$filename = $options['f'];
} elseif ( isset( $options['file'] ) ) {
	$filename = $options['file'];
}
if ( empty( $filename ) ) {
	echo "Error: no filename\n";
	die( -1 );
}

if ( isset( $options['l'] ) ) {
	$language = $options['l'];
} elseif ( isset( $options['lang'] ) ) {
	$language = $options['lang'];
}
if ( empty( $language ) ) {
	echo "Error: no language\n";
	die( -2 );
}

$converter = new Pattern_Converter( $filename, $language );
$converter->convert();
