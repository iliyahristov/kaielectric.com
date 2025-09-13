<?php


namespace Advertikon\Element\Bootstrap;


use Advertikon\Element\Div;
use Advertikon\Element\Node;
use Advertikon\Element\Span;
use Advertikon\Element\Text;

class InputGroup extends Div {
    protected $element;
    protected $addonBefore = [];
    protected $addonAfter = [];

    public function element( Node $element ) {
        $this->element = $element;
    }

    public function addonBefore( $addon ) {
        $this->addonBefore[] = $addon;
    }

    public function addonAfter( $addon ) {
        $this->addonAfter[] = $addon;
    }

    public function render() {
        $this->getClass( 'input-group' );
        $addonBefore = $this->renderAddon( $this->addonBefore );
        $addonAfter = $this->renderAddon( $this->addonAfter );

        if ( $addonBefore ) $this->children( $addonBefore );

        if ( $this->element ) {
            $this->children( is_a( $this->element, 'Advertikon\Element\Node' ) ?
                $this->element : new Text( $this->element ) );
        }

        if ( $addonAfter ) $this->children( $addonAfter );

        return parent::render();
    }

    private function renderAddon( array $addon ) {
        if ( !$addon ) return null;
        $span = new Span();

        if ( count( $addon ) > 1 ) {
            $span->getClass()->add('input-group-btn');

            foreach( $addon as $item ) {
                $span->children( is_a( $item, 'Advertikon\Element\Node' ) ? $item : new Text( $item ) );
            }

        } else {
            if ( is_a( $addon[0], 'Advertikon\Element\Button' ) ) {
                $span->getClass()->add('input-group-btn');
            } else {
                $span->getClass()->add('input-group-addon');
            }

            $span->children( is_a( $addon[0], 'Advertikon\Element\Node' ) ? $addon[0] : new Text( $addon[0] ) );
        }

        return $span;
    }
}