<?php
/**
 * Advertikon button.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element\Bootstrap;


use advertikon\element\Italic;
use advertikon\element\Span;
use Advertikon\Element\Text;

class Button extends \Advertikon\Element\Button {
	protected $textBefore;
	protected $icon = [];
	protected $textAfter;

	public function __construct( $text = null ) {
		parent::__construct();
		$this->getClass( "btn btn-default" );

		if ( !is_null( $text ) ) {
			$this->textBefore = $text;
		}
	}

	public function isDefault() {
		$this->resetType();
		$this->getClass( 'btn-default' );
		return $this;
	}

	public function isPrimary() {
		$this->resetType();
		$this->getClass( 'btn-primary' );
		return $this;
	}

	public function isSuccess() {
		$this->resetType();
		$this->getClass( 'btn-success' );
		return $this;
	}

	public function isInfo() {
		$this->resetType();
		$this->getClass( 'btn-info' );
		return $this;
	}

	public function isWarning() {
		$this->resetType();
		$this->getClass( 'btn-warning' );
		return $this;
	}

	public function isLink() {
		$this->resetType();
		$this->getClass( 'btn-link' );
		return $this;
	}

	public function isLarge() {
		$this->resetSize();
		$this->getClass( 'btn-lg' );
		return $this;
	}

	public function isSmall() {
		$this->resetSize();
		$this->getClass( 'btn-sm' );
		return $this;
	}

	public function isExtraSmall() {
		$this->resetSize();
		$this->getClass( 'btn-xs' );
		return $this;
	}

	public function textBefore( $text ) {
		$this->textBefore = $text;
		return $this;
	}

	public function textAfter( $text ) {
		$this->textAfter = $text;
		return $this;
	}

	/**
	 * @param $icon
	 * @param null $icon2
	 * @return Button
	 */
	public function icon( $icon, $icon2 = null ) {
		$this->icon[] = $icon;

		if ( !is_null( $icon2 ) ) {
			$this->icon[] = $icon2;
		}

		return $this;
	}

	public function url( $url ) {
		$this->attributes( 'data-url', $url );
		return $this;
	}

	private function resetType() {
		$this->getClass()->remove( 'btn-default btn-primary btn-success btn-info btn-warning btn-danger btn-link' );
	}

	private function resetSize() {
		$this->getClass()->remove( 'btn-lg btn-sm btn-xs' );
	}

	public function render() {
		if ( $this->textBefore ) {
			$this->children( new Italic( new Text( $this->textBefore ) ) );
		}

		if ( $this->icon ) {
			if ( $this->textBefore ) {
				$this->children( new Text("&nbsp;") );
			}

			$this->setIcon();

			if ( $this->textAfter ) {
				$this->children( new Text("&nbsp;") );
			}
		}

		if ( $this->textAfter ) {
			$this->children( new Italic( new Text( $this->textAfter ) ) );
		}

		return parent::render();
	}

	private function setIcon() {
		$icon1 = new Italic();
		$icon1->getClass( 'fa' )->add( $this->icon[0] );

		if ( count( $this->icon ) > 1 ) {
			$icon1->getClass( 'fa-stack-1x' );
			$icon2 = new Italic();
			$icon2->getClass( 'fa fa-stack-2x' )->add( $this->icon[1] );

			$span = new Span( $icon1, $icon2 );
			$span->getClass( "fa-stack fa-lg" );
			$this->children()->append( $span );
			return;
		}

		$this->attributes( 'data-i', $this->icon[0] );
		$this->children()->append( $icon1 );
	}
}