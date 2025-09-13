<?php
/**
 * Advertikon textarea.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element;


class TextArea extends ParentView {
	protected $tag = 'textarea';
	private $value;

	public function __construct( $value = null ) {
		parent::__construct();

		if ( !is_null( $value ) ) {
			$this->value( $value );
		}
	}

	public function value( $value ) {
		$this->value = $value;
	}

	public function render() {
		if ( $this->value ) {
			$this->children( new Text( $this->value ) );
		}

		return parent::render();
	}
}