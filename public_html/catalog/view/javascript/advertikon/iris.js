define( "iris", [ "iris.min" ], function() {
    function Iris() {
        var irisHideExceptions = [];

        this.init = function is( e ) {
            $( e || $(".iris").not(".iris-init" ) ).each( function each( index, item ) {
                iris( item );
            } );

            initHider();
        };

        function iris( element ) {
            $( element ).iris( {
                target: $( element ).parent().parent(),
                width:  300,
                hide:   true,
                change: function ( evt, ui ) {
                    setColor( element, ui.color );

                    // Iris doesn't trigger change event on target element - do it
                    window.clearTimeout( element.irisTimeout );
                    element.irisTimeout = setTimeout( function () {
                        $( element ).trigger( "change" );
                    }, 100 );
                }
            } )
                .addClass( "iris-init" );

            // Show color-picker on element get focus
            $( element ).on( "focus", function () {
                $( element ).iris( "show" );
                irisHideExceptions.push( element );
            } );

            // Color color-picker add-on
            // It's not an API so may be changed by time
            try {
                setColor(
                    element,
                    $( element ).data( "a8c-iris" )._color.fromHex( element.value )
                );

            } catch ( error ) {
                console.error( error );
            }
        }

        function setColor( element, color ) {
            $( element ).parent().find( ".input-group-addon" ).css( {
                    "background-color": color.toString(),
                    "color":            color.getMaxContrastColor().toString()
                } );
        }

        function initHider() {
            $( document ).on( "click", function ( evt ) {
                evt.stopPropagation();

                if ( irisHideExceptions.length > 1 ) {
                    $( irisHideExceptions.shift() ).iris("hide");
                }

                if ( $( evt.target ).hasClass( "iris" ) || $( evt.target ).closest( ".iris-picker" ).length ) return;

                irisHideExceptions.forEach( function( item ) {
                    $( item ).iris( "hide" );
                } );

                irisHideExceptions = [];
            } );
        }
    }

    return new Iris();
} );