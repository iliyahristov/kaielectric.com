<?php
/**
 * Advertikon anchor.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element;


class Anchor extends ParentView {
	protected $tag = 'a';
	private $blank = false;

	/** @var Node|string */
	protected $text;

	public function __construct( $href = null, $text = null, $blank = false ) {
		parent::__construct();

		if ( !is_null( $href ) ) {
			$this->href( $href );
		}

		$this->text = $text;

		if ( $blank ) {
		    $this->target( true );
        }
	}

	public function  href( $href ) {
		$this->attributes( 'href', $href );
		return $this;
	}

	public function text( $text ) {
		$this->text = $text;
		return $this;
	}

	public function target( $blank = true ) {
	    if ( $blank ) {
	        $this->attributes( 'target', '_blank' );
        }

	    return $this;
    }

	public function render() {
		$text = $this->text ?: '';

		if ( is_a( $text, 'Advertikon\Element\Node' ) ) {
			$this->children( $text );

		} else {
			$this->children( new Text( $text ) );
		}

		return parent::render();
	}
}