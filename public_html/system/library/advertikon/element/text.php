<?php

namespace Advertikon\Element;


class Text extends Node {
    protected $content = '';

    public function __construct( $text = null ) {
        if ( !is_null( $text ) ) {
            $this->content = $text;
        }
    }

    public function render() {
        return $this->content;
    }
}