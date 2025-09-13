<?php


namespace Advertikon\Element;


use Advertikon\Advertikon;
use Advertikon\Element\Input\Number;

class Slider extends Div {
    private $value1 = [];
    private $value2 = [];
    private $min = [0];
    private $max = [100];
    private $icon = [];
    private $text = [];
    private $title = [];
    private $currentValue1;
    private $currentValue2;
    private $currentText;

    static public function getMinVal( $value ) {
        if ( is_array( $value ) && isset( $value[0]['value'] ) ) {
            return $value[0]['value'];
        }

        return null;
    }

    static public function getMaxVal( $value ) {
        if ( is_array( $value ) && isset( $value[1]['value'] ) ) {
            return $value[1]['value'];
        }

        return null;
    }

    static public function getMinUnits( $value ) {
        if ( is_array( $value ) && isset( $value[0]['units'] ) ) {
            return $value[0]['units'];
        }

        return null;
    }

    static public function getMaxUnits( $value ) {
        if ( is_array( $value ) && isset( $value[1]['units'] ) ) {
            return $value[1]['units'];
        }

        return null;
    }

    static function getMax( $value ) {
        if ( !is_null( self::getMaxVal( $value ) ) && !is_null( self::getMaxUnits( $value ) ) ) {
            return self::getMaxVal( $value ) . self::getMaxUnits( $value );
        }

        return null;
    }

    static function getMin( $value ) {
        if ( !is_null( self::getMinVal( $value ) ) && !is_null( self::getMinUnits( $value ) ) ) {
            return self::getMinVal( $value ) . self::getMinUnits( $value );
        }

        return null;
    }

    static function def( $v1 = null, $u1 = null, $v2 = null, $u2 = null ) {
        $ret = [[],[]];

        if ( !is_null( $v1 ) ) {
            $ret[0]['value'] = $v1;
            $ret[0]['units'] = !is_null( $u1 ) ? $u1 : 'px';
        }

        if ( !is_null( $v2 ) ) {
            $ret[1]['value'] = $v2;
            $ret[1]['units'] = !is_null( $u2 ) ? $u2 : 'px';
        }

        return $ret;
    }

    /**
	 * Slider constructor.
	 * @param null $values
	 * @throws \Exception
	 */
    public function __construct( $values = null) {
    	parent::__construct();

    	if ( !is_null( $values ) ) {
		    $this->currentValue( $values );
	    }
    }

	/**
	 * @param array $values
	 * @throws \Exception
	 */
	public function currentValue( array $values ) {
		$units1 = null;
		$units2 = null;
		$value1 = null;
		$value2 = null;

		if ( !is_null( self::getMinVal( $values ) ) && !is_null( self::getMinUnits( $values ) ) ) {
			$value1 = self::getMinVal( $values );
			$units1 = self::getMinUnits( $values );
		}

        if ( !is_null( self::getMaxVal( $values ) ) && !is_null( self::getMaxUnits( $values ) ) ) {
            $value2 = self::getMaxVal( $values );
            $units2 = self::getMaxUnits( $values );
        }

		$this->currentValue1 = $value1;
		$this->currentValue2 = $value2;

		if ( isset( $units1, $units2 ) && $units1 !== $units2 ) {
			throw new \Exception( "Different units" );
		}

		if ( !isset( $units1 ) && !isset( $units2 ) ) {
			Advertikon::instance()->error( "Measure units missing" );
			return;
		}

		$this->currentText = isset( $units1 ) ? $units1 : $units2;

		if ( count( $this->text ) === 0 ) {
		    $this->text[] = $this->currentText;
        }
	}

	public function value1( $value ) {
        $this->value1 = (array)$value;
        return $this;
    }

    public function value2( $value ) {
        $this->value2 = (array)$value;
        return $this;
    }

    public function min( $value ) {
        $this->min = (array)$value;

        return $this;
    }

    public function max( $value ) {
        $this->max = (array)$value;
        return $this;
    }

    public function icon( $icon ) {
    	$this->icon = (array)$icon;
	    return $this;
    }

    public function text( $text ) {
    	$this->text = (array)$text;
	    return $this;
    }

    public function title( $title ) {
    	$this->title = (array)$title;
	    return $this;
    }

    public function render() {
        $this->prepare();
        return parent::render();
    }

    public function name( $name, \Advertikon\Advertikon $a ) {
		$this->attributes( 'data-name', \Advertikon\Setting::prefix_name( $name, $a ) );
		return $this;
    }

    private function prepare() {
        if ( !is_null( $this->currentValue1 ) ) {
            $leftContainer = new Div();
            $leftContainer->getClass( 'adk-slider-value-container' );

            if ( $this->text || $this->icon ) {
            	$switcher = (new Switcher( $this->text, $this->icon, $this->title ))->getClass()->add( 'adk-switcher-left' );
            	$switcher->currentUnits( $this->currentText );
            	$leftContainer->children( $switcher );
            }

            $leftValue = new Number();
            $leftValue->getClass( 'adk-slider-value adk-slider-value-min' );
            $leftValue->value( $this->currentValue1 );
            $leftContainer->children( $leftValue );

            $this->children( $leftContainer );
        }

        $sliderContainer = new Div();
        $sliderContainer->getClass( 'adk-slider-slider-container' );

        $sliderElement = new Div();
        $sliderElement->getClass( 'adk-slider' );
        $sliderContainer->children( $sliderElement );

        $this->children( $sliderContainer );

        if ( !is_null( $this->currentValue2 ) ) {
            $rightContainer = new Div();
            $rightContainer->getClass( 'adk-slider-value-container' );

            $rightValue = new Number();
            $rightValue->getClass( 'adk-slider-value adk-slider-value-max' );
            $rightValue->value( $this->currentValue2 );
            $rightContainer->children( $rightValue );

	        if ( $this->text || $this->icon ) {
		        $switcher = (new Switcher( $this->text, $this->icon, $this->title ))->getClass()->add( 'adk-switcher-right' );
                $switcher->currentUnits( $this->currentText );
		        $rightContainer->children( $switcher );
	        }

            $this->children( $rightContainer );
        }

        $this->getClass( 'adk-slider-element' );
        $this->attributes( 'data-data', json_encode( $this->prepareData(), JSON_HEX_QUOT ) );
    }

    private function prepareData() {
    	$data = [];

    	if ( count( $this->max ) > count( $this->min ) ) {
    	    $this->min = array_pad(
    	        $this->min,
                count( $this->max ),
                $this->min[ count( $this->min ) -1 ]
            );
        }

    	if ( count( $this->value1 ) === 0 && count( $this->value2 ) === 0 ) {
            for( $i = 0; $i < count( $this->text ); $i++ ) {
                if ( !is_null( $this->currentValue1 ) ) {
                    $this->value1[] = max( min( $this->max[$i], $this->currentValue1 ), $this->min[$i] );
                }

                if ( !is_null( $this->currentValue2 ) ) {
                    $this->value2[] = max( min( $this->max[$i], $this->currentValue2 ), $this->min[$i] );
                }
            }
        }

        if ( count( $this->min ) > 0 ) {
            $data['min'] = (array)$this->min;
        }

        if ( count( $this->max ) > 0 ) {
            $data['max'] = (array)$this->max;
        }

        if ( count( $this->value1 ) > 0 ) {
            $data['value1'] = (array)$this->value1;
        }
        
        if ( count( $this->value2 ) > 0 ) {
            $data['value2'] = (array)$this->value2;
        }

        return $data;
    }
}