<?php
/**
 * Advertikon image.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element;


class Image extends Element {
	protected $tag = 'img';

	public function __construct( $src = null, $alt = null) {
		parent::__construct();

		if ( !is_null( $src ) ) {
			$this->src( $src );

			if ( !is_null( $alt ) ) {
				$this->alt( $alt );
			}
		}
	}

	public function src( $url ) {
		$this->attributes( 'src', $url );
		return $this;
	}

	public function alt ( $text ) {
		$this->attributes( 'alt', $text );
		$this->attributes( 'title', $text );
		return $this;
	}
}