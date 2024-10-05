define( "button", [ "notification", "adk" ], function( Notifiaciton, ADK ) {
    function Button() {
        this.on = function ( $button ) {
            if ( $button.attr( "data-i" ) ) {
                $button.attr( "disabled", "disabled" )
                    .find( "i.fa" )
                    .removeClass( $button.attr( "data-i" ) )
                    .addClass( "fa-spin fa-refresh" );
            }
        };

        this.off = function ( $button ) {
            if ($button.attr("data-i")) {
                $button.removeAttr("disabled")
                    .find("i.fa")
                    .removeClass("fa-spin fa-refresh")
                    .addClass($button.attr("data-i"));
            }
        };

        this.url = function ( $button, data ) {
            var
                url = $button.attr( "data-url" ),
                d = $.Deferred(),
                self = this;

            this.on( $button );

            $.ajax( {
                url: url.replace( /&amp;/g, "&" ),
                data: data || {},
                type: "POST",
                dataType: "json",
            } )

            .always( function () {
                self.off( $button );
            } )

            .done( function ( resp ) {
                if ( resp.success) {
                    if ( resp.success !== "ok" ) {
                        Notifiaciton.notification( resp.success );
                    }

                    d.resolve(resp);

                } else if ( resp.error ) {
                    Notifiaciton.alert( resp.error );
                    d.reject( resp );

                } else {
                    d.reject( resp );
                }
            } )

            .fail( function bcFail( resp ) {
                Notifiaciton.alert( ADK.locale.networkError );
                d.reject( resp );
            } );

            return d;
        };
    }

    return new Button();
} );