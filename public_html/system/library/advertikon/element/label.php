<?php
/**
 * Advertikon label.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element;


class Label extends ParentView {
	protected $tag = 'label';

	public function forId( $id ) {
		$this->attributes( 'for', $id );
		return $this;
	}
}