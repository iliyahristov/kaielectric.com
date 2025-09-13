<?php


namespace Advertikon\Element;


class Hidden extends Input{

    public function render() {
        $this->attributes('type', 'hidden' );
        return parent::render();
    }
}