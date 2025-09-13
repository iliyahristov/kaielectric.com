<?php
/**
 * Advertikon Registry Placeholder class
 * @author Advertikon
 * @package Advertikon
 * @version 1.1.75       
 */

namespace Advertikon;

class Placeholderr extends \ArrayIterator {
	public function __get( $v ) {
		return new $this;
	}

	public function __call( $n, $v  ) {
		if ( 'config' === $n ) {
			return null;
		}

		return $this;
	}

	public function __toString() {
		return '';
	}
}