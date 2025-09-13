<?php
/**
 * Advertikon option.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element;


class Option extends ParentView {
	protected $tag = 'option';
	private $value;
	private $text;
	private $disabled;
	private $selected;

	public function __construct( $value = null, $text = null ) {
		parent::__construct();

		if ( !is_null( $value ) ) {
			$this->value( $value );
			$this->text( !is_null( $text ) ? $text : $value );
		}
	}

	public function value( $value ) {
		$this->value = $value;
		return $this;
	}

	public function getValue() {
	    return $this->value;
    }

	public function text( $text ) {
		$this->text = $text;
		return $this;
	}

    public function disabled( ) {
        $this->disabled = true;
        return $this;
    }

    public function selected() {
	    $this->selected = true;
	    return $this;
    }

	public function render() {
	    if ( !is_null( $this->text ) ) {
	        $this->children( new Text( $this->text ) );
        }

	    if ( !is_null( $this->value ) ) {
	        $this->attributes( 'value', $this->value );
        }

        if ( !is_null( $this->disabled ) ) {
            $this->attributes( 'disabled'  );
        }

        if ( !is_null( $this->selected ) ) {
            $this->attributes( 'selected' );
        }

        return parent::render();
    }
}