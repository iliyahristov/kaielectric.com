<?php
/**
 * Advertikon parentview.php Class
 * @author Advertikon
 * @package
 * @version 1.1.75  
 */

namespace Advertikon\Element;


abstract class ParentView extends Element {
	protected $selfClosing = false;

    /** @var Children */
    protected $children = null;

	public function __construct() {
		parent::__construct();
        $this->children = new Children($this);

		foreach ( func_get_args() as $item ) {
			$this->children()->append( is_a($item, 'Advertikon\Element\Node') ? $item : new Text($item) );
		}
	}

	public function isEmpty() {
		return $this->children->isEmpty();
	}

    /**
     * @param Node|null $child
     * @return Children
     */
    public function children( Node $child = null ) {
        if ( !is_null( $child ) ) {
            $this->children->append( $child );
        }

        return $this->children;
    }

	public function renderCloseTag() {
        return $this->children()->render() . parent::renderCloseTag();
    }
}