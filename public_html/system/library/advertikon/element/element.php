<?php

namespace Advertikon\Element;

abstract class Element extends Node {

    /** @var null string */
    protected $tag = '';

    protected $selfClosing = true;

    /** @var AttributeClass */
    protected $class = null;

    /** @var AttributeSet[] */
    protected $attributes = null;

    /** @var Style  */
    protected $style = null;

    public function __construct() {
        $this->class = new AttributeClass($this);
        $this->style = new Style($this);
        $this->attributes = new AttributeSet($this);
    }

    /**
     * @return string
     */
    public function getTag() {
        return $this->tag;
    }

    /**
     * @return Attribute
     */
    public function getId() {
        return $this->attributes()->get( 'id' );
    }

    /**
     * @param string $id
     * @return Element
     */
    public function id($id) {
        $this->attributes( 'id', $id );
        return $this;
    }

	/**
	 * @param null $class
	 * @return AttributeClass
	 */
    public function getClass( $class = null ) {
    	if ( !is_null( $class ) ) {
    		$this->class->add( $class );
	    }

        return $this->class;
    }

	/**
	 * @param null $name
	 * @param null $val
	 * @return AttributeSet
	 */
    public function attributes( $name = null, $val = null ) {
    	if ( !is_null( $name ) ) {
    		$this->attributes->set( $name, $val );
	    }

        return $this->attributes;
    }

    public function name( $name, \Advertikon\Advertikon $a ) {
        $this->attributes( 'name', \Advertikon\Setting::prefix_name( $name, $a ) );
        return $this;
    }

    public function style( \Advertikon\Element\Style $style = null ) {
    	if ( is_a( $style, 'Advertikon\Element\Style' ) ) {
    		$this->style = $style;
    		$style->setParent( $this );
	    }

        return $this->style;
    }

    public function render() {
        $ret = $this->renderOpenTag();

        if ( !$this->selfClosing ) {
            $ret .= $this->renderCloseTag();
        }

        return $ret;
    }

    protected function renderOpenTag() {
        $ret[] = "<{$this->getTag()}";
        if ( $this->getId() )$ret[] = $this->getId();
        $ret[] = $this->getClass()->render();
        $ret[] = $this->attributes()->render();
        $ret[] = $this->style()->render();

        if ( $this->selfClosing ) {
            $ret[] = '/>';
        } else {
            $ret[] = '>';
        }

        return implode( ' ', $ret );
    }

    protected function renderCloseTag() {
        return "</{$this->getTag()}>";
    }

    /**
     * @throws \Advertikon\Exception
     * @throws \Exception
     */
    static function test() {
	    $e = new Input();
	    $e->setId( "id" )
            ->getClass()->add("foo bar")
            ->getClass()->add("foo")

            ->attributes()->set("attr1", "value1")
            ->attributes()->set("attr2", "value2")
            ->attributes()->set("attr3", "")

            ->style()
	            ->width( '12px' )
                ->maxHeight( "20%" )
                ->border("solid 2px black" )
                    ->stop()
                ->boxShadow("1px 2px 5px black" )
	                ->stop()
	            ->textShadow("1px 2px 5px black" )
		            ->stop()
                ->filter()
                    ->sepia("12%")
                    ->dropShadow( "2px 3px 5px red" )->y("17%")
                    ->stop()
                ->stop()
            ->children()->append( new Text("hello" ) );

        $e1 = new Input();
        $e1->setId( "id1" );
        $e1->getClass()->add("foo bar");
        $e1->attributes()->set("attr1", "value1");

//        $e->children()->append($e1);

        \Advertikon\Advertikon::instance()->log( $e->render() );
    }
}