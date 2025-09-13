<?php


namespace Advertikon\Element\Bootstrap;


use Advertikon\Element\Anchor;
use advertikon\element\Div;
use advertikon\element\H;
use Advertikon\Element\Image;
use Advertikon\Element\Text;

class Accordion extends Div {
    public function __construct() {
        parent::__construct();
        $this->getClass( 'panel-group' );
        $this->attributes( 'tablist' );
    }

    public function card() {
        $card = new Card( $this );
        $this->children( $card );
        return $card;
    }
}

class Card extends Div {
    private $header;
    private $image;
    private $body;

    /** @var Accordion */
    private $parent;

    public function __construct( Accordion $parent) {
        parent::__construct();
        $this->parent = $parent;
    }

    public function header( $header ) {
        if ( is_a( $header, 'Advertikon\Element\Node' ) ) {
            $this->header = $header;

        } else {
            $this->header = new Text( $header );
        }

        return $this;
    }

    public function image( $image ) {
        if ( is_a( $image, 'Advertikon\Element\Image' ) ) {
            $this->image = $image;

        } else {
            $this->image = new Image( $image );
        }

        return $this;
    }

    public function body( $body ) {
        if ( is_a( $body, 'Advertikon\Element\Node' ) ) {
            $this->body = $body;

        } else {
            $this->body = new Text( $body );
        }

        return $this;
    }

    public function stop() {
        return $this->parent;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function render() {
        $this->getClass( 'panel panel-default' );
        $bodyId = uniqid();

        $header = (new Div())
            ->getClass()->add('panel-heading' )
            ->attributes()->set( 'role', 'tab' )
            ->style()
                ->display( 'flex' )
                ->alignItems( 'center' )->stop();

        $h = (new H())
            ->level(4 )
            ->getClass()->add( 'panel-title' )
            ->style()->fontWight( 'bold' )->stop();

        $button = (new Anchor( "#{$bodyId}", $this->header ))
            ->attributes()->set([
                'role' => 'button',
                'data-toggle' => 'collapse',
                'data-parent' => "#{$this->parent->getId()}"
            ]);

        $body = (new Div())
            ->getClass()->add( 'panel-collapse collapse' )
            ->attributes()->set( 'role', 'tabpanel' )
            ->id( $bodyId );

        $bodyContent = (new Div( is_a( $this->body, 'Advertikon\Element\Node' ) ? $this->body : new Text( $this->body ) ) )
            ->getClass()->add( 'panel-body' );

        $this->children( $header );

        if ( $this->image ) {
            $image = is_a( $this->image, 'Advertikon\Element\Image' ) ?
                $this->image : new Image( $this->image );

            $image->style()->width( '50px' )->margin()->right('10px' );
            $header->children( $image );
        }

        $header->children( $h );
        $h->children( $button );

        $this->children( $body );
        $body->children( $bodyContent );

        return parent::render();
    }
}
