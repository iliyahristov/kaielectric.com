<?php
/**
 * Advertikon switcher.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element;


class Switcher extends Div {
	private $icon;
	private $text;
	private $title;
	private $index = 0;

	public function __construct( $text = null, $icon = null, $title = null ) {
		parent::__construct();
		$this->text = $text;
		$this->icon = $icon;
		$this->title = $title;
	}

	public function icon( $icon ) {
		$this->icon = $icon;
		return $this;
	}

	public function text( $text ) {
		$this->text = $text;
		return $this;
	}

	public function title( $title ) {
		$this->title = $title;
		return $this;
	}

	public function currentUnits( $text ) {
	    $index = 0;

	    foreach( $this->text as $t ) {
	        if ( $t === $text ) {
	            $this->index = $index;
            }

	        $index++;
        }

	    return $this;
    }

	public function render() {
		$this->getClass( 'adk-switcher' );
		$data = [];

		if ( $this->title ) {
			$data['title'] = (array)$this->title;
			$this->attributes( 'title', $data['title'][$this->index] );
		}

		if ( $this->text ) {
			$data['text'] = (array)$this->text;

			if ( !$this->icon ) {
				$this->children( (new Span( new Text( $data['text'][$this->index] ) ))->getClass()->add( 'adk-switcher-text') );
			}
		}

		if ( $this->icon ) {
			$data['icon'] = (array)$this->icon;
			$this->children( (new Italic())->getClass( 'adk-switcher-icon fa' )->add( $data['icon'][$this->index] ) );
		}

		if ( $data ) {
		    $data['index'] = $this->index;
			$this->attributes( 'data-data', json_encode( $data, JSON_HEX_QUOT ) );
		}

		return parent::render();
	}
}