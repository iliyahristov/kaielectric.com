<?php


namespace Advertikon\Element;


class FancyCheckBox extends Hidden {
    private $textOn = 'On';
    private $textOff = 'Off';
    private $valueOn = '1';
    private $valueOff = '0';
    private $dependsOn;
    private $dependsOff;

    public function valueOn( $value ) {
        $this->valueOn = $value;
        return $this;
    }

    public function valueOff( $value ) {
        $this->valueOff = $value;
        return $this;
    }

    public function textOn( $value ) {
        $this->textOn = $value;
        return $this;
    }

    public function textOff( $value ) {
        $this->textOff = $value;
        return $this;
    }

    public function dependsOn( $value ) {
        $this->dependsOn = $value;
        return $this;
    }

    public function dependsOff( $value ) {
        $this->dependsOff = $value;
        return $this;
    }

    public function value($value) {
        if ( true === $value ) {
            $value = '1';

        } else if ( false === $value ) {
            $value = '0';
        }

        return parent::value($value);
    }

    public function render() {
        $this->getClass('fancy-checkbox' );

        $this->attributes( [
            'data-value-on'  => $this->valueOn,
            'data-value-off' => $this->valueOff,
            'data-text-on'   => $this->textOn,
            'data-text-off'  => $this->textOff,
        ] );

        if ( !is_null( $this->dependsOn ) ) {
            $this->attributes( 'data-dependent-on', $this->dependsOn );
        }

        if ( !is_null( $this->dependsOff ) ) {
            $this->attributes( 'data-dependent-off', $this->dependsOff );
        }

        return parent::render();
    }
}