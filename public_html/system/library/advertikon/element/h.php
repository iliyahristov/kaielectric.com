<?php


namespace Advertikon\Element;


class H extends ParentView {
    protected $tag = 'h';
    private $level = 1;

    public function level( $level ) {
        $this->level = $level;
        return $this;
    }

    public function render() {
        $this->tag .= $this->level;
        return parent::render();
    }
}