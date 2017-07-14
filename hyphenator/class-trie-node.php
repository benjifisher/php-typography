<?php

namespace PHP_Typography\Hyphenator;

use PHP_Typography\Strings;

 /**
  * A hyphenation pattern trie node.
  *
  * Portions of this code have been inspired by:
  *  - hyphenator-php (https://nikonyrh.github.io/phphyphenation.html)
  *
  *  @author Peter Putzer <github@mundschenk.at>
  */
final class Trie_Node {

	/**
	 * The offsets array.
	 *
	 * @var array
	 */
	private $offsets = [];

	/**
	 * Linked trie nodes.
	 *
	 * @var array {
	 *      @type Trie_Node $char The next node in the given character path.
	 * }
	 */
	private $links = [];

	/**
	 * Create new Trie_Node.
	 */
	private function __construct() {
	}

	/**
	 * Retrieves the node for the given letter (or creates it).
	 *
	 * @param string $char A single character.
	 *
	 * @return Trie_Node
	 */
	public function get_node( $char ) {
		if ( ! isset( $this->links[ $char ] ) ) {
			$this->links[ $char ] = new Trie_Node();
		}

		return $this->links[ $char ];
	}

	/**
	 * Checks if there is a node for the given letter.
	 *
	 * @param string $char A single character.
	 *
	 * @return bool
	 */
	public function exists( $char ) {
		return ! empty( $this->links[ $char ] );
	}

	/**
	 * Retrieves the offsets array.
	 *
	 * @return array
	 */
	public function offsets() {
		return $this->offsets;
	}

	/**
	 * Builds pattern search trie from pattern list(s).
	 *
	 * @param array $patterns An array of hyphenation patterns.
	 *
	 * @return Trie_Node The starting node of the trie.
	 */
	public static function build_trie( array $patterns ) {
		$trie = new Trie_Node();

		foreach ( $patterns as $key => $pattern ) {
			$node = $trie;

			foreach ( Strings::mb_str_split( $key ) as $char ) {
				$node = $node->get_node( $char );
			}

			preg_match_all( '/([1-9])/S', $pattern, $offsets, PREG_OFFSET_CAPTURE );
			$node->offsets = $offsets[1];
		}

		return $trie;
	}
}
