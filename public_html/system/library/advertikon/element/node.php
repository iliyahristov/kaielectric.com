<?php

namespace Advertikon\Element;


abstract class Node {
    protected $order = 0;

    public function getOrder() {
        return $this->order;
    }

    public function order( $order ) {
        $this->order = $order;
        return $this;
    }

    abstract public function render();

    public function __toString() {
    	try {
		    return $this->render();
	    } catch ( \Exception $e ) {
    		echo $e->getTraceAsString();
	    }

	    return '';
    }
}