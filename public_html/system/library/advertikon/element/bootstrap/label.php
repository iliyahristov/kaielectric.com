<?php
/**
 * Advertikon label.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element\Bootstrap;


use advertikon\element\Span;
use Advertikon\Element\Text;

class Label extends Span {
	const DEFAULT_LABEL = 1;
	const PRIMARY = 2;
	const SUCCESS = 3;
	const INFO    = 4;
	const WARNING = 5;
	const DANGER  = 6;

	public function __construct( $message, $type = self::DEFAULT_LABEL ) {
		parent::__construct( new Text( $message ) );
		$this->getClass( $this->getClassName( $type ) );
	}

	private function getClassName( $type ) {
		switch( $type ) {
			case self::PRIMARY: return "label label-primary";
			case self::SUCCESS: return "label label-success";
			case self::INFO:    return "label label-info";
			case self::WARNING: return "label label-warning";
			case self::DANGER:  return "label label-danger";
			default:
			case self::DEFAULT_LABEL: return "label label-default";
		}
	}
}