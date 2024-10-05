define( "animate_css", [], function() {
    $.fn.extend( {
        animateCss: function animateCss( animationName, callback ) {
            var
                $this = $( this ),
                cb = function ecb() {
                    $this.removeClass( "animated " + animationName );

                    if ( typeof callback === "function" ) {
                        callback();
                    }
                };

            $this
                .removeClass( "animated " + animationName )
                .addClass( "animated " + animationName );

            setTimeout( cb, 1000 );

            return this;
        }
    } );
} );