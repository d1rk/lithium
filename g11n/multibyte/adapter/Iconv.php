<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2017, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace lithium\g11n\multibyte\adapter;

/**
 * The `Iconv` class is an adapter which uses certain string functions from
 * `ext/iconv`. You will need to have the extension installed to use this adapter.
 *
 * No known limitations affecting used functionality. Returns `false` when
 * seeing badly formed UTF-8 sequences. Additionally triggers an error.
 *
 * @link http://php.net/book.iconv.php
 */
class Iconv extends \lithium\core\Object {

	/**
	 * Determines if this adapter is enabled by checking if the `iconv` extension is loaded.
	 *
	 * @return boolean Returns `true` if enabled, otherwise `false`.
	 */
	public static function enabled() {
		return extension_loaded('iconv');
	}

	/**
	 * Here used as a multibyte enabled equivalent of `strlen()`.
	 *
	 * @link http://php.net/function.iconv-strlen.php
	 * @param string $string
	 * @return integer|boolean
	 */
	public function strlen($string) {
		return iconv_strlen($string, 'UTF-8');
	}

	/**
	 * Here used as a multibyte enabled equivalent of `strpos()`.
	 *
	 * @link http://php.net/function.iconv-strpos.php
	 * @param string $haystack
	 * @param string $needle
	 * @param integer $offset
	 * @return integer|boolean
	 */
	public function strpos($haystack, $needle, $offset) {
		return iconv_strpos($haystack, $needle, $offset, 'UTF-8');
	}

	/**
	 * Here used as a multibyte enabled equivalent of `strrpos()`.
	 *
	 * @link http://php.net/function.iconv-strpos.php
	 * @param string $haystack
	 * @param string $needle
	 * @return integer|boolean
	 */
	public function strrpos($haystack, $needle) {
		return iconv_strrpos($haystack, $needle, 'UTF-8');
	}

	/**
	 * Here used as a multibyte enabled equivalent of `substr()`.
	 *
	 * @link http://php.net/function.iconv-substr.php
	 * @param string $string
	 * @param integer $start
	 * @param integer $length
	 * @return string|boolean
	 */
	public function substr($string, $start, $length) {
		return iconv_substr($string, $start, $length, 'UTF-8');
	}
}

?>