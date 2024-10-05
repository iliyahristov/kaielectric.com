define( "switcher", [], function() {
    function SwitcherInit() {
        this.init = function ( element ) {
            if ( element.length === 1 ) {
                return new Switcher( element );
            }

            return null;
        }
    }

    function Switcher( element ) {
        var $switcher = $( element );
        var data  = JSON.parse( $switcher.attr( 'data-data' ) ) || {};
        var icon = data.icon;
        var text = data.text;
        var title = data.title;
        var index = data.index;
        var count = 0;
        var onSwitch;

        this.onSwitch = function( cb ) {
            onSwitch = cb;
        };

        this.getIndex = function() {
            return index;
        };

        this.switch = function( fireEvent = false ) {
            doSwitch( fireEvent );
        };

        this.units = function() {
            return text ? text[index] : null;
        };

        function doSwitch ( fireEvent = true ) {
            index = (index + 1) % count;
            setValues();

            if ( fireEvent ) {
                if ( onSwitch ) {
                    onSwitch( index, text ? text[index] : null );
                }
            }
        }

        function init () {
            $switcher.on( "click", doSwitch.bind( this ) );
            setValues();

            if ( icon ) {
                count = icon.length;

            } else if ( text ) {
                count = text.length;
            }
        }

        function setValues() {
            if ( title ) {
                $switcher.attr( 'title', title[index] ? title[index] : '' );
            }

            if ( icon ) {
                var iconHolder = $switcher.find( 'i' );
                iconHolder.removeClass( icon.join( ' ' ) );
                iconHolder.addClass( icon[index] ) ;

            } else if ( text ) {
                $switcher.find( 'span' ).html( text[index] );
            }
        }

        init.call( this );
    }

    return new SwitcherInit();
} );