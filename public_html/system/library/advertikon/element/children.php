<?php


namespace Advertikon\Element;


class Children {
    /** @var Node[] */
    private $value = [];

	private $parent;

	public function __construct( Element $parent ) {
		$this->parent = $parent;
	}

    public function append( Node $children ) {
        $this->value[] = $children;

	    if ( 0 === $children->getOrder() ) { // needed for php 5
		    $children->order( $this->count() - 1 );
	    }

        return $this->parent;
    }

    public function isEmpty() {
		return !$this->value;
    }

    public function render() {
	    $this->sort();
        $ret = [];

        foreach ( $this->value as $c ) {
            $ret[] = $c->render();
        }

        return implode( $ret );
    }

    public function count() {
        return count( $this->value );
    }

    private function sort() {
	    usort( $this->value, function(Node $a, Node $b ) { return $a->getOrder() - $b->getOrder(); } );
    }

    public function __toString() {
        return '';
    }
}