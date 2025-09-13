<?php


namespace Advertikon\Element;


class AttributeClass {
    private $classes = [];
    private $parent;

    public function __construct( Element $parent ) {
    	$this->parent = $parent;
    }

	public function add( $class ) {
        $this->classes = array_merge( $this->classes, array_filter( explode( ' ', $class ) ) );
        return $this->parent;
    }

    public function remove( $classes ) {
    	$this->classes = array_diff( $this->classes, array_filter( explode( ' ', $classes ) ) );
        return $this->parent;
    }

    public function render() {
        if ( $this->classes ) {
            $classes = array_map( function ($i){ return Attribute::escapeValue($i);}, array_unique($this->classes) );
            return 'class="' . implode( " ", $classes ) . '"';
        }

        return '';
    }
}