<?php
/**
 * Advertikon tooltip.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element\Bootstrap;


use advertikon\element\Span;

class ToolTip extends Span {

	public function __construct( $content, $title = '', $right = true ) {
		parent::__construct();
		$this->getClass( 'popover-icon' );

		if ( $right ) {
			$this->getClass( 'pull-right' );
		}

		$this->attributes( 'title', $title );
		$this->attributes( 'data-html', 'true' );
		$this->attributes( 'data-content', html_entity_decode( strip_tags( $content ) ) );
	}
}