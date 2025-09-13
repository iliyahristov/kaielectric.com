<?php


namespace Advertikon\Element\Bootstrap;


use Advertikon\Element\Input;
use Advertikon\Element\Italic;

class Color extends InputGroup {
    private $value;

    public function value( $value ) {
        $this->value = $value;
        return $this;
    }

    public function render() {
        $this->addonBefore = [];
        $this->addonAfter = [ (new Italic())->getClass()->add('fa fa-paint-brush') ];
        $this->element = (new Input())->value( $this->value )->getClass()->add('form-control iris');

        if ( $this->attributes->has( 'id' ) ) {
            $this->element->attributes( 'id', $this->attributes->get( 'id' ) );
            $this->attributes->remove('id');
        }

        if ( $this->attributes->has( 'name' ) ) {
            $this->element->attributes( 'name', $this->attributes->get( 'name' ) );
            $this->attributes->remove('name' );
        }

        return parent::render();
    }
}