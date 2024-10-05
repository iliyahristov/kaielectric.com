define( "form", [], function() {
    function Form( element ) {
        var $form = $( element );
        var data = {};
        var self = this;
        var isSubmitted = false;

        this.getData = function () {
            $form.find("[name]").each( function( index, item ) {
                addValue( $( item ).attr( 'name' ), $( item ).val() );
            } );

            $form.find(".adk-slider-element[data-name]").each( function( index, item ) {
                addValue( $( item ).attr( 'data-name' ), item.adk_slider.value() ) ;
            } );

            return data;
        };

        this.setData = function() {
            $form.find(".adk-slider-element[data-name]").each( function( index, item ) {
                flattenArray( $( item ).attr('data-name'), item.adk_slider.value() );
            } );

            element.submit();
        };

        function flattenArray( name, value ) {
            var index = name.indexOf('[]');

            if ( index !== -1 && index === name.length - 2 ) {
                name = name.substr(0, index );

                if ( !$.isArray( value ) ) {
                    value = [ value ];
                }
            }

            if ( typeof value === "object" ) {
                if ( $.isEmptyObject( value ) ) {
                    if ( $.isArray( value ) ) {
                        addHiddenElement( name + '[0]', null );

                    } else {
                        addHiddenElement( name, null );
                    }

                } else {
                    $.each( value, function( k, v ) { flattenArray( name + '[' + k + ']', v ); } );
                }

            } else {
                addHiddenElement( name, value );
            }
        }

        function addHiddenElement( name, value ) {
            var field = document.createElement("input" );
            field.type = "hidden";
            field.name = name;
            field.value = value;
            $form.append( field );
        }

        function addValue( name, value ) {
            if ( name.indexOf( "[" ) > 0 ) {
                addArray( name, value );

            } else {
                data[name] = value;
            }
        }

        function addArray( name, value ) {
            var parts = name.replace( /]/g, '' ).split('[');
            var current = data;
            var index = 0;
            var isArray = false;

            if ( parts[ parts.length - 1 ] === '' ) {
                isArray = true;
                parts.pop();
            }

            parts.forEach( function( item ) {
                if ( typeof current[item] === "undefined" ) {
                    current[item] = index === parts.length - 1 && isArray ? [] : {};
                }

                if ( index === parts.length - 1 ) {
                    if ( isArray ) {
                        if ( typeof value === "object" && value.length ) {
                            current[item] = value;

                        } else {
                            current[item].push( value );
                        }

                    } else {
                        current[item] = value;
                    }
                }

                current = current[item];
                index++;
            } );
        }

        this.submit = function() {
            $.post( $form.attr( 'action' ), this.getData() );
        };

        +function init(){
            $form.on( "submit", function(e) {
                e.preventDefault();

                if ( !isSubmitted ) {
                    self.setData.call( self );
                    isSubmitted = true;
                }
            } );
        }();

        // var t = '--------------------';
        //
        // function assert( a, b ) {
        //     console.log( t + b );
        // }
        //
        // assert( flattenArray( 'a[]', 1 ), t + 'a[]=1' );
        // assert( flattenArray( 'a[]', [1,2] ), t + 'a[]=[1,2]' );
        // assert( flattenArray( 'a[]', [] ), t + 'a[]=[]' );
        // assert( flattenArray( 'a', [1,3] ), t + 'a=[1,3]' );
        // assert( flattenArray( 'a', [] ), t + 'a[0]=' );
        // assert( flattenArray( 'a[b]', [1,2] ), t + 'a[b]=[1,2]' );
        // assert( flattenArray( 'a[b]', [] ), t + 'a[b]=[]' );
        // assert( flattenArray( 'a[b]', {a:1, b:2} ), t + 'a[b]={a:1,b:2}' );
        // assert( flattenArray( 'a', {a:1, b:2} ), t + 'a={a:1,b:2}' );
    }

    return {
        init: function ( element ) { new Form(element); }
    };
} );