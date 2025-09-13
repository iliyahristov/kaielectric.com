<?php

namespace Advertikon\Element;

class Attribute {
    protected $name = '';
    protected $value = '';

    /**
     * Attribute constructor.
     * @param $name
     * @param null|string|Attribute $value
     */
    public function __construct( $name, $value = null ) {
        $this->name = $name;

        if ( is_a( $value, 'Advertikon\Element\Attribute' ) ) {
            $value = $value->getValue();
        }

        $this->value = is_string( $value ) && trim( $value ) !== '' ? $value : null;
    }

    static public function escapeName( $value ) {
        return str_replace( [ '<', '>' ], ['&lt;', '&gt;'], $value );
    }

    static public function escapeValue( $value ) {
        return str_replace( '"', '&quot;', $value );
    }

    public function render() {
        if ( !is_null( $this->value ) ) {
            return self::escapeName( $this->name ) . '="' . self::escapeValue( $this->value ) . '"';
        } else {
            return self::escapeName( $this->name );
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getValue() {
        return $this->value;
    }

    public function __toString() {
        return $this->render();
    }
}