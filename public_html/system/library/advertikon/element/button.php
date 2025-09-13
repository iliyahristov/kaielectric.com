<?php
/**
 * Advertikon button.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element;


class Button extends ParentView {
	protected $tag = 'button';

	public function __construct( $text = null ) {
		parent::__construct( $text );
		$this->attributes()->set( "type", "button" );
	}

	public function title( $title ) {
		$this->attributes( 'title', $title );
		return $this;
	}
}