<?php

namespace Advertikon\Element;


class Input extends Element {
    protected $selfClosing = true;
    protected $tag = 'input';

    public function __construct( $type = 'text' ) {
        parent::__construct();
        $this->attributes('type', $type );
    }

    public function getId() {
        if ( is_null( parent::getId() ) ) {
            $this->id( uniqid() );
        }

        return parent::getId();
    }

    public function value( $value ) {
        $this->attributes( 'value', $value );
        return $this;
    }
}