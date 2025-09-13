<?php
/**
 * Advertikon select.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element;


class Select extends ParentView {
	protected $tag = 'select';
	private $value;

	/** @var Option[] */
	private $options = [];

	public function __construct( $options = null ) {
		parent::__construct();

		if ( is_array( $options ) ) {
			$this->option( $options );
		}
	}

	public function option( $value, $text = null ) {
		if ( is_array( $value ) ) {
			foreach( $value as $v => $t ) {
				$this->option( $v, $t );
			}

		} else {
			$this->options[] = is_a( $value, 'Advertikon\Element\Option') ? $value : new Option( $value, $text );
		}

		return $this;
	}

    public function value( $value ) {
        $this->value = $value;
        return $this;
    }

    public function render() {
	    foreach( $this->options as $option ) {
	        if ( !is_null($this->value) && $option->getValue() == $this->value ) {
	            $option->selected();
            }

	        $this->children( $option );
        }

        return parent::render();
    }
}