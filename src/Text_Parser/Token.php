<?php

namespace PHP_Typography\Text_Parser;

/**
 * Tokenized text.
 *
 * Multibyte characters are assumed to be encoded as UTF-8.
 *
 * @property-read string $value The token value.
 * @property-read int    $type  The token type. Can be any of the following constants:
 * - Token::SPACE
 * - Token::PUNCTUATION
 * - Token::WORD
 * - Token::OTHER
 * @property-read bool   $mutable Wether the properties of the object can be modified.
 */
final class Token {
	const SPACE       = 1;
	const PUNCTUATION = 2;
	const WORD        = 3;
	const OTHER       = 4;

	/**
	 * The token type. Can be any of the following constants:
	 * - Token::SPACE
	 * - Token::PUNCTUATION
	 * - Token::WORD
	 * - Token::OTHER
	 *
	 * @var int
	 */
	private $type;

	/**
	 * The token value.
	 *
	 * @var string
	 */
	private $value;

	/**
	 * Ensure that properties can only be set once via the constructor.
	 *
	 * @var boolean
	 */
	private $mutable = true;

	/**
	 * Creates a new token.
	 *
	 * @param string $value The token value.
	 * @param int    $type  Optional. Default Token::WORD.
	 *
	 * @throws \BadMethodCallException   If the constructor is called twice.
	 * @throws \UnexpectedValueException If the type attribute is outside the allowed range.
	 */
	public function __construct( $value, $type = self::WORD ) {
		if ( false === $this->mutable ) {
			throw new \BadMethodCallException( 'Constructor called twice.' );
		}

		switch ( $type ) {
			case self::SPACE:
			case self::PUNCTUATION:
			case self::WORD:
			case self::OTHER:
				$this->type = $type;
				break;

			default:
				throw new \UnexpectedValueException( "Invalid type $type." );
		}

		if ( ! isset( $value ) || ! is_string( $value ) ) {
			throw new \UnexpectedValueException( 'Value has to be a string.' );
		} else {
			$this->value   = $value;
		}

		$this->mutable = false;
	}

	/**
	 * Provide read-only access to properties.
	 *
	 * @param  string $property The property name.
	 *
	 * @return mixed
	 */
	public function __get( $property ) {
		if ( property_exists( $this, $property ) ) {
			return $this->$property;
		}
	}

	/**
	 * Prevent setting undeclared properties.
	 *
	 * @param string $id  The property name.
	 * @param mixed  $val The value.
	 * @return void
	 *
	 * @throws \BadMethodCallException The Token class is immutable.
	 */
	public function __set( $id, $val ) {
		throw new \BadMethodCallException( 'Object of class Text_Parser\Token is immutable.' );
	}

	/**
	 * Prevent un-setting of properties.
	 *
	 * @param string $id  The property name.
	 * @return void
	 *
	 * @throws \BadMethodCallException The Token class is immutable.
	 */
	public function __unset( $id ) {
		throw new \BadMethodCallException( 'Object of class Text_Parser\Token is immutable.' );
	}

	/**
	 * Create a new token with the same type, but a different value.
	 * If the value is unchanged, the original token is returned.
	 *
	 * @param  string $value The value attribute.
	 *
	 * @return Token
	 */
	public function with_value( $value ) {
		if ( $this->value === $value ) {
			return $this;
		}

		$cloned_token = clone $this;
		$cloned_token->value = $value;

		return $cloned_token;
	}

}
