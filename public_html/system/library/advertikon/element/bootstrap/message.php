<?php
/**
 * Advertikon sessionmessage.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element\Bootstrap;

use advertikon\element\Button;
use advertikon\element\Div;
use advertikon\element\Span;
use Advertikon\Element\Text;

class Message extends Div {
	const INFO    = 1;
	const WARN    = 2;
	const WARNING = 2;
	const ERROR   = 3;
	const SUCCESS = 4;

	public function __construct( $message, $type = self::INFO, $dismissible = true ) {
		parent::__construct();

		$this->getClass( $this->getClassName( $type ) );
		$this->attributes( "role", "alert" );

		if ( $dismissible ) {
			$button = new Button();
			$button->getClass()->add( "close" );
			$button->attributes( ["data-dismiss" => "alert", "aria-label" => "Close" ] );

			$span = new Span( new Text( "&times;" ) );
			$span->attributes( "aria-hidden", "true" );

			$button->children( $span );
			$this->children( $button );
		}

		$this->children( is_a( $message, 'Advertikon\Element\Node' ) ? $message : new Text( $message ) );
	}

	private function getClassName( $type ) {
		switch( $type ) {
			case self::INFO:    return "alert alert-info";
			case self::WARN:    return "alert alert-warning";
			case self::ERROR:   return "alert alert-danger";
			case self::SUCCESS:
			default: return "alert alert-success";
		}
	}
}