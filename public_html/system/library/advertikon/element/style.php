<?php

namespace Advertikon\Element;

use Advertikon\Advertikon;

class Style {
    /** @var Value[] */
    private $values = [];

    /** @var Element */
    private $parent;

    public function __construct( Element $parent ) {
    	$this->parent = $parent;
    }

	public function stop() {
    	return $this->parent;
    }

    public function setParent( Element $parent ) {
    	$this->parent = $parent;
    }

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
    public function raw( $string ) {
        foreach( explode( ';', $string ) as $item ) {
            $parts = explode( ':', $item );

            if ( count( $parts ) === 2 ) {
                $this->getByTag( trim( $parts[0] ) )->setValue( trim( $parts[1] ) );
            }
        }
    }

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
    public function width( $value ) {
        $this->getByTag( 'width' )->setValue( $value );
        return $this;
    }

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
    public function height( $value ) {
        $this->getByTag( 'height' )->setValue( $value );
        return $this;
    }

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
    public function maxWidth( $value ) {
        $this->getByTag( 'max-width' )->setValue( $value );
        return $this;
    }

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
    public function maxHeight( $value ) {
        $this->getByTag( 'max-height' )->setValue( $value );
        return $this;
    }

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
	public function display( $value ) {
		$this->getByTag( 'display' )->setValue( $value );
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
	public function justifyContent( $value ) {
		$this->getByTag( 'justify-content' )->setValue( $value );
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
	public function alignItems( $value ) {
		$this->getByTag( 'align-items' )->setValue( $value );
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
	public function cursor( $value ) {
		$this->getByTag( 'cursor' )->setValue( $value );
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
	public function overflow( $value ) {
		$this->getByTag( 'overflow' )->setValue( $value );
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
	public function position( $value ) {
		$this->getByTag( 'position' )->setValue( $value );
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
	public function top( $value ) {
		$this->getByTag( 'top' )->setValue( $value );
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
	public function left( $value ) {
		$this->getByTag( 'left' )->setValue( $value );
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
    public function fontSize( $value ) {
        $this->getByTag( 'font-size' )->setValue( $value );
        return $this;
    }

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
    public function fontWight( $value ) {
        $this->getByTag( 'font-weight' )->setValue( $value );
        return $this;
    }

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
	public function lineHeight( $value ) {
		$this->getByTag( 'line-height' )->setValue( $value );
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
    public function background( $value ) {
        $this->getByTag( 'background' )->setValue( $value );
        return $this;
    }

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
    public function flexShrink( $value ) {
        $this->getByTag( 'flex-shrink' )->setValue( $value );
        return $this;
    }

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
    public function flexGrow( $value ) {
        $this->getByTag( 'flex-grow' )->setValue( $value );
        return $this;
    }

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
	public function verticalAlign( $value ) {
		$this->getByTag( 'vertical-align' )->setValue( $value );
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
	public function opacity( $value ) {
		$this->getByTag( 'opacity' )->setValue( $value );
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
	public function textAlign( $value ) {
		$this->getByTag( 'text-align' )->setValue( $value );
		return $this;
	}

    /**
     * @param $value
     * @return $this
     * @throws \Exception
     */
    public function backgroundSize( $value ) {
        $this->getByTag( 'background-size' )->setValue( $value );
        return $this;
    }

	/**
     * @param $value
     * @return Border
     * @throws \Exception
     */
    public function border( $value = null ) {
        /** @var Border $item */
        $item = $this->getByTag( 'border', 'Advertikon\Element\Border' );

        if ( !is_null( $value ) ) {
            $item->setValue( $value );
        }

        return $item;
    }

	/**
	 * @param $value
	 * @return BorderRadius
	 * @throws \Exception
	 */
	public function borderRadius( $value = null ) {
		/** @var BorderRadius $item */
		$item = $this->getByTag( 'border-radius', 'Advertikon\Element\BorderRadius' );

		if ( !is_null( $value ) ) {
			$item->setValue( $value );
		}

		return $item;
	}

    /**
     * @param $value
     * @return Margin
     * @throws \Exception
     */
    public function margin( $value = null ) {
        /** @var Margin $item */
        $item = $this->getByTag( 'margin', 'Advertikon\Element\Margin' );

        if ( !is_null( $value ) ) {
            $item->setValue( $value );
        }

        return $item;
    }

    /**
     * @param $value
     * @return Padding
     * @throws \Exception
     */
    public function padding( $value = null ) {
        /** @var Padding $item */
        $item = $this->getByTag( 'padding', 'Advertikon\Element\Padding' );

        if ( !is_null( $value ) ) {
            $item->setValue( $value );
        }

        return $item;
    }

    /**
     * @param $value
     * @return ShadowWithSpread
     * @throws \Exception
     */
    public function boxShadow( $value = null ) {
        /** @var BoxShadow $item */
        $item = $this->getByTag( 'box-shadow', 'Advertikon\Element\BoxShadow' );
        $shadow = $item->setValue( $value );
        $shadow->setParent($this);
        return $shadow;
    }

    /**
     * @param $value
     * @return Shadow
     * @throws \Exception
     */
    public function textShadow( $value ) {
        /** @var TextShadow $item */
        $item = $this->getByTag( 'text-shadow', 'Advertikon\Element\TextShadow' );
        $shadow = $item->setValue( $value );
	    $shadow->setParent($this);
	    return $shadow;
    }

    /**
     * @return Filter
     * @throws \Exception
     */
    public function filter() {
        /** @var Filter $item */
        $item = $this->getByTag( 'filter', 'Advertikon\Element\Filter' );
        $item->setParent($this);
        return $item;
    }

    public function color( $value ) {
        /** @var Color $item */
        $item = $this->getByTag( 'color', 'Advertikon\Element\Color' );
        $item->color( $value );
        return $this;
    }

    public function backgroundColor( $value ) {
        /** @var Color $item */
        $item = $this->getByTag( 'background-color', 'Advertikon\Element\BackgroundColor' );
        $item->color( $value );
        return $this;
    }

    private function getByTag( $tag, $className = 'Advertikon\Element\Value' ) {
        if ( !isset( $this->values[ $tag ] ) ) {
            /** @var Value $item */
            $item = new $className( $tag );
            $item->setParent($this);
            $this->values[ $tag ] = $item;
            return $item;
        }

        return $this->values[ $tag ];
    }

    public function render() {
        $ret = [];

        foreach ( $this->values as $k => $v ) {
            $ret[] = $v->render();
        }

        return $ret ? 'style="' . Attribute::escapeValue( implode( ' ', $ret ) ) . '"' : '';
    }

    public function asCss() {
	    $ret = [];

	    foreach ( $this->values as $k => $v ) {
		    $ret[] = $v->render();
	    }

	    return $ret ? implode( "\n", $ret ) : '';
    }

    public function __toString() {
	    return $this->asCss();
    }

}

trait Colorable {
    protected $color = "black";

    public function color( $color ) {
        $this->color = $color;
        return $this;
    }

    protected function renderColor() {
        return Attribute::escapeValue( $this->color );
    }
}

trait Stoppable {
    private $parent;

    public function setParent( Style $parent ) {
        $this->parent = $parent;
    }

    /**
     * @return Style
     */
    public function stop() {
        return $this->parent;
    }
}

class Value {
	use Stoppable;

    protected $tag;
    protected $value;
    protected $important = false;

	/**
	 * Value constructor.
	 * @param $tag
	 * @param null $value
	 * @throws \Exception
	 */
    public function __construct($tag, $value = null ) {
        $this->tag = $tag;

        if ( !is_null($value)) {
            $this->setValue($value);
        }
    }

	/**
	 * @param $value
	 * @return $this
	 * @throws \Exception
	 */
    public function setValue( $value ) {
        if ( is_null( $value ) ) return $this;

    	if ( !is_scalar( $value ) ) {
    	    Advertikon::instance()->error( $value );
    		throw new \Exception( 'Value should be scalar' );
	    }

        $this->value = $value;
        return $this;
    }

    protected function renderTag() {
        return Attribute::escapeValue( $this->tag );
    }

    public function renderValue() {
        return Attribute::escapeValue($this->value);
    }

    public function render() {
        return $this->renderTag() . ": " . $this->renderValue() . ( $this->important ? '!important' : '' ) .  ";";
    }

    public function important() {
        $this->important = true;
        return $this;
    }
}

abstract class Rectangle extends Value {
    protected $top = 0;
    protected $right = 0;
    protected $bottom = 0;
    protected $left = 0;

    /**
     * @param $value
     * @return Rectangle
     * @throws \Exception
     */
    public function setValue($value) {
        $values = explode( " ", $value );

        switch( count( $values ) ) {
            case 1:
                $this->top = $values[0];
                $this->right = $values[0];
                $this->bottom = $values[0];
                $this->left = $values[0];
                break;
            case 2:
                $this->top = $values[0];
                $this->right = $values[1];
                $this->bottom = $values[0];
                $this->left = $values[1];
                break;
            case 3:
                $this->top = $values[0];
                $this->right = $values[1];
                $this->bottom = $values[2];
                $this->left = $values[1];
                break;
            case 4:
                $this->top = $values[0];
                $this->right = $values[1];
                $this->bottom = $values[2];
                $this->left = $values[3];
                break;
            default:
                throw new \Exception( "Invalid values count" );
        }

        return $this;
    }

    public function top($top) {
        $this->top = $top;
        return $this;
    }

    public function right($right) {
        $this->right = $right;
        return $this;
    }

    public function bottom($bottom) {
        $this->bottom = $bottom;
        return $this;
    }

    public function left($left) {
        $this->left = $left;
        return $this;
    }

    public function renderValue() {
        $ret[] = $this->top;

        if ( $this->left == $this->right ) {
            if ( $this->top == $this->bottom ) {
                if ( $this->top != $this->right ) {
                    $ret[] = $this->right;
                }

            } else {
                $ret[] = $this->right;
                $ret[] = $this->bottom;
            }

        } else {
            $ret[] = $this->right;
            $ret[] = $this->bottom;
            $ret[] = $this->left;
        }

        return implode( " ", $ret );
    }
}

class Border extends Rectangle {
    use Colorable;

    protected $tag = "border";
    private $style = "solid";

    public function setValue($value) {
        $v = explode( ' ', $value );

        if ( count( $v ) < 3 ) {
            throw new \Exception( "Invalid values count" );
        }

        $this->style = $v[0];
        $this->color( $v[ count( $v ) -1 ] );

        $val = array_slice( $v,1, -1 );
        return parent::setValue( implode( " ", $val ) );
    }

    /**
     * @param $style
     * @return Border
     * @throws \Exception
     */
    public function style( $style ) {
        switch ( strtolower( $style ) ) {
            case 'dotted':
                $this->setDotted();
                break;
            case 'dashed':
                $this->setDashed();
                break;
            case 'solid':
                $this->setSolid();
                break;
            case 'double':
                $this->setDouble();
                break;
            case 'groove':
                $this->setGroove();
                break;
            case 'ridge':
                $this->setRidge();
                break;
            case 'inset':
                $this->setInset();
                break;
            case 'outset':
                $this->setOutset();
                break;
            case 'none':
                $this->setNone();
                break;
            case 'hidden':
                $this->setHidden();
                break;
            default:
                throw new \Exception( 'Invalid border style: ' . $style );
        }

        return $this;
    }

    public function setDotted() {
        $this->style = "dotted";
        return $this;
    }

    public function setDashed() {
        $this->style = "dashed";
        return $this;
    }

    public function setSolid() {
        $this->style = "solid";
        return $this;
    }

    public function setDouble() {
        $this->style = "double";
        return $this;
    }

    public function setGroove() {
        $this->style = "groove";
        return $this;
    }

    public function setRidge() {
        $this->style = "ridge";
        return $this;
    }

    public function setInset() {
        $this->style = "inset";
        return $this;
    }

    public function setOutset() {
        $this->style = "outset";
        return $this;
    }

    public function setNone() {
        $this->style = "none";
        return $this;
    }

    public function setHidden() {
        $this->style = "hidden";
        return $this;
    }

    /**
     * @param $value
     * @return Border
     * @throws \Exception
     */
    public function width( $value ) {
        parent::setValue( $value );
        return $this;
    }

    public function renderValue() {
        $ret[] = $this->style;
        $ret[] = parent::renderValue();
        $ret[] = $this->renderColor();

        return implode( ' ', $ret );
    }
}

class BorderRadius extends Rectangle{}
class Padding extends Rectangle{}
class Margin extends Rectangle{}

class Shadow {
    use Colorable;
    use Stoppable;

    private $offsetX = 0;
    private $offsetY = 0;
    private $blur = 0;

    /**
     * Shadow constructor.
     * @param null $value
     * @throws \Exception
     */
    public function __construct( $value = null ) {
        if ( !is_null( $value ) ) {
            $v = explode( " ", $value );

            switch( count( $v ) ) {
                case 3;
                    $this->offsetX = $v[0];
                    $this->offsetY = $v[1];
                    $this->color( $v[2] );
                    break;
                case 4:
                    $this->offsetX = $v[0];
                    $this->offsetY = $v[1];
                    $this->blur = $v[2];
                    $this->color( $v[3] );
                    break;
                default:
                    throw new \Exception("Invalid values count" );
            }
        }
    }

    public function x( $x ) {
        $this->offsetX = $x;
        return $this;
    }

    public function y( $y ) {
        $this->offsetY = $y;
        return $this;
    }

    public function blur( $blur ) {
        $this->blur = $blur;
        return $this;
    }

    protected function renderValues() {
        $ret = [];
        $ret[] = $this->offsetX;
        $ret[] = $this->offsetY;
        if ( $this->blur )$ret[] = $this->blur;
        return implode( " ", $ret );
    }

    public function renderValue() {
        return $this->renderValues() . ' ' . $this->renderColor();
    }
}

class ShadowWithSpread extends Shadow {
    private $spread = 0;

    /**
     * Shadow constructor.
     * @param null $value
     * @throws \Exception
     */
    public function __construct( $value = null ) {
        if ( !is_null( $value ) ) {
            $v = explode( " ", $value );

            if ( count( $v ) == 5 ) {
                $this->spread = $v[3];
                array_splice( $v, 3, 1 );
                $value = implode( " ", $v );
            }
        }

        parent::__construct( $value );
    }

    public function spread( $spread ) {
        $this->spread = $spread;
        return $this;
    }

    public function renderValue() {
        return $this->renderValues() . ( $this->spread ?  ' ' .$this->spread : '' ) . ' ' . $this->renderColor();
    }
}

class ValueSet extends Value {
    /** @var Value[] */
    protected $value = [];

    public function renderValue() {
        $ret = [];

        foreach( $this->value as $v ) {
            $ret[] = $v->renderValue();
        }

        return implode( ', ', $ret );
    }
}

class BoxShadow extends ValueSet {
    public function __construct($tag, $value = null) {
        parent::__construct( 'box-shadow', $value);
    }

    /**
     * @param null $value
     * @return ShadowWithSpread
     * @throws \Exception
     */
    public function setValue( $value = null ) {
        /** @var ShadowWithSpread $item */
        $item = new ShadowWithSpread( $value );
        $this->value[] = $item;
        $item->setParent( $this->stop() );
        return $item;
    }
}

class TextShadow extends ValueSet {
    public function __construct($tag, $value = null) {
        parent::__construct( 'text-shadow', $value);
    }

    /**
     * @param null $value
     * @return Shadow
     * @throws \Exception
     */
    public function setValue( $value = null ) {
        /** @var Shadow $item */
        $item = new Shadow( $value );
        $this->value[] = $item;
        $item->setParent( $this->stop() );
        return $item;
    }
}

class Filter extends Value {
    protected $value = [];

    public function __construct($tag, $value = null) {
        parent::__construct( 'filter', $value);
    }

    /**
     * @param null $value
     * @return Filter
     * @throws \Exception
     */
    public function dropShadow( $value = null ) {
        $item = new ShadowWithSpread( $value );
        $this->value['drop-shadow'] = $item;
        return $this;
    }

    public function blur( $value ) {
        $item = new Value( null,  $value );
        $this->value['blur'] = $item;
        return $this;
    }

    public function contrast( $value ) {
        $item = new Value( null,  $value );
        $this->value['contrast'] = $item;
        return $this;
    }

    public function grayscale( $value ) {
        $item = new Value( null,  $value );
        $this->value['grayscale'] = $item;
        return $this;
    }

    public function hueRotate( $value ) {
        $item = new Value( null,  $value );
        $this->value['hue-rotate'] = $item;
        return $this;
    }

    public function invert( $value ) {
        $item = new Value( null,  $value );
        $this->value['invert'] = $item;
        return $this;
    }

    public function opacity( $value ) {
        $item = new Value( null,  $value );
        $this->value['opacity'] = $item;
        return $this;
    }

    public function brightness( $value ) {
        $item = new Value( null,  $value );
        $this->value['brightness'] = $item;
        return $this;
    }

    public function saturate( $value ) {
        $item = new Value( null,  $value );
        $this->value['saturate'] = $item;
        return $this;
    }

    public function sepia( $value ) {
        $item = new Value( null,  $value );
        $this->value['sepia'] = $item;
        return $this;
    }

    public function renderValue() {
        $ret = [];

        foreach( $this->value as $k => $v ) {
            $ret[] = "$k({$v->renderValue()})";
        }

        return implode( ', ', $ret );
    }
}

class BackgroundColor extends Value {
    use Colorable;

    public function renderValue() {
        return $this->renderColor();
    }
}

class Color extends Value {
    use Colorable;

    public function renderValue() {
        return $this->renderColor();
    }
}