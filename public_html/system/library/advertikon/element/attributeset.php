<?php


namespace Advertikon\Element;


class AttributeSet {
    /** @var array Attribute[] */
    private $values = [];

	private $parent;

	public function __construct( Element $parent ) {
		$this->parent = $parent;
	}

    public function set( $name, $value = null ) {
	    if ( is_array( $name ) ) {
	        foreach ( $name as $k => $v ) {
                $this->values[ $k ] = new Attribute( $k, $v );
            }

        } else {
            $this->values[ $name ] = new Attribute( $name, $value );
        }

        return $this->parent;
    }

    public function has( $name ) {
		return isset( $this->values[$name ] );
	}

	public function get( $name ) {
	    return $this->has( $name ) ? $this->values[ $name ] : null;
    }

    public function remove( $name ) {
	    if ( $this->has( $name ) ) {
	        unset( $this->values[ $name ] );
        }
    }

    public function render() {
        $ret = [];

        foreach ( $this->values as $attribute ) {
            $ret[] = $attribute->render();
        }

        return implode( ' ', $ret );
    }
}