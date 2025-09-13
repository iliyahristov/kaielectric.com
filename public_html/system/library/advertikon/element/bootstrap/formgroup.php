<?php
/**
 * Advertikon formgroup.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element\Bootstrap;


use advertikon\element\Div;
use Advertikon\Element\Element;
use Advertikon\Element\Node;
use advertikon\element\ParentView;
use advertikon\element\Span;
use Advertikon\Element\Text;

class FormGroup extends ParentView {
	protected $tag = 'div';

	/** @var Node|string */
	private $label;

	/** @var Element */
	private $element;
	private $success;
	private $error;
	private $warning;
	private $tooltip;

	public function __construct( Element $element = null ) {
		parent::__construct();
		$this->getClass( "form-group" );

		if ( !is_null( $element ) ) {
			$this->element = $element;
		}
	}

    /**
     * @return string
     * @throws \Exception
     */
	public function render() {
		$this->setClass();
		$this->setLabel();
		$this->setElement();

		return parent::render();
	}

	public function label( $text ) {
		$this->label = $text;
		return $this;
	}

	public function tooltip( $tooltip ) {
		$this->tooltip = $tooltip;
		return $this;
	}

	public function error( $text, $path = null ) {
	    if ( is_array( $text ) && !is_null( $path ) ) {
	        $this->error = $this->followThePath( $text, $path );

        } else {
	        $this->error = $text;
        }

		return $this;
	}

	public function warning( $text ) {
		$this->warning = $text;
		return $this;
	}

	public function success( $text ) {
		$this->success = $text;
		return $this;
	}

	public function element( Node $element ) {
		$this->element = $element;
		return $this;
	}

	private function setClass() {
		if ( $this->error || $this->warning || $this->success ) {
			$this->getClass( 'has-feedback' );
		}

		if ( $this->error ) {
			$this->getClass( 'has-error' );

		} else if ( $this->warning ) {
			$this->getClass( 'has-warning' );

		} else if ( $this->success ) {
			$this->getClass( 'has-success' );
		}
	}

	/**
	 * @throws \Exception
	 */
	private function setLabel() {
		$label = new \Advertikon\Element\Label();
		$label->getClass( 'control-label col-sm-3' );
		$label->style()->display( 'flex' )->alignItems( 'center' )->justifyContent( 'space-between' );
		$this->children()->append( $label );

		if ( $this->label ) {
			$labelContent = is_a( $this->label, 'Advertikon\Element\Node' ) ? $this->label : new Text( $this->label );

		} else {
			$labelContent = new Text( '' );
		}

		$label->children( $labelContent );

		if ( $this->tooltip ) {
			$label->children( (new ToolTip( $this->tooltip ) )->style()->margin()->right( '5px' )->stop()->stop() );
		}
	}

	private function setElement() {
		$div = new Div();
		$div->getClass( 'col-sm-9' );
		$this->children( $div );

		if ( $this->element ) {
			$div->children( $this->element );

			if ( !in_array( get_class( $this->element ), [
			    'Advertikon\Element\Slider',
                'Advertikon\Element\Div',
                'Advertikon\Element\Button',
                'Advertikon\Element\Bootstrap\Button',
                'Advertikon\Element\Bootstrap\InputGroup',
            ] ) ) {

				$this->element->getClass('form-control' );
			}
		}

		if ( $this->error || $this->warning || $this->success ) {
			$span = new Span();
			$span->getClass( 'glyphicon form-control-feedback' );

			if ( $this->error ) {
				$span->getClass( 'glyphicon-ok' );

			} else if ( $this->warning ) {
				$span->getClass( 'glyphicon-warning-sign' );

			} else if ( $this->success ) {
				$span->getClass( 'glyphicon-remove' );
			}

			$div->children( $span );
		}
	}

	private function followThePath( array $a, $path ) {
	    $value = $a;

	    foreach( explode( '/', $path ) as $p ) {
	        if ( isset( $value[$p] ) ) {
	            $value = $value[$p];

            } else {
	            return null;
            }
        }

	    return $value;
    }
}