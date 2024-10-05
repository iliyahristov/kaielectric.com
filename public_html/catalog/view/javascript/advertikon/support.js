define( "support", ["button", "notification", "alert"], function(Button, Notificaiotn, Alert) {
    /**
     * Loads ticket button
     * @returns {void}
     */
    function renderTicketButton() {
        var element = $( "#ticket-wrapper" );

        if ( element.length ) {
            element.load( element.attr( "data-url" ).replace( /&amp;/g, "&" ), initSupportFields );
        }
    }

    /**
     * Send support request
     * @return {void}
     */
    function askSupport() {
        var form = new FormData();

        $( this ).closest( "#support-wrapper" ).find( ".form-field" ).each( function each() {
            var input = $( this );

            if ( "file" === this.type ) {
                for( var i = 0; i < this.files.length; i++ ) {
                    form.append( input.attr( "data-name" ), this.files[ i ], this.files[ i ].name );
                }

            } else {
                form.append( input.attr( "data-name" ), input.val() );
            }
        } );

        Button.url( $( this ), form );
    }

    /**
     * Rollback DB button click handler
     * @returns {void}
     */
    function rollbackDb() {
        Button.url( $( this ) )
            .done( function () {
                setTimeout( function sleep() { location.reload(); }, 1000 );
            } );
    }

    /**
     * Perform manual update of DB data
     * @returns {void}
     */
    function updateDB() {
        Button.url( $( this ) ).done( function () {
            setTimeout( function sleep() { location.reload(); }, 1000 );
        });
    }

    /**
     * Flush the cache click handler
     * @returns {void}
     */
    function flushCache() {
        Button.url( $( this ) );
    }

    function getLicenseById() {
        Button.url( $( this ), { id: $( "#license_by_id_input" ).val() } ).done( function ( resp ) {
            if ( resp.message ) {
                if ( resp.status && resp.status === 'attached_to_another' ) {
                    Alert.confirm( resp.message ).yes( function(){
                        registerExtension( $( "#license_by_id_input" ).val() );
                    } );

                } else {
                    Alert.alert( resp.message ).no( function(){ window.location.reload(); } );
                }
            }
        });
    }

    async function registerExtension( license ) {
        const button  = $( '#license_by_id_button');
        const data = new FormData();
        data.append( 'license', license );

        Button.on( button );
        const json = await fetch( button.attr( 'data-transfer_url' ), {
            'method': 'post',
            body: data,
        } );
        Button.off( button );

        const resp = await json.json();

        if ( resp.error ) {
            Notificaiotn.alert( resp.error, 5000 );

        } else if ( resp.message ) {
            Alert.alert(resp.message).no(function () {
                window.location.reload();
            } );
        }
    }

    // function finishTransfer() {
    //     Button.url( $( this ), {
    //         name:  $( "#license_name" ).val(),
    //         email: $( "#license_email" ).val(),
    //         code:  $( "#license_code" ).val()
    //     } ).done( function ( resp ) {
    //         Alert.alert( resp.success ).yes( function(){ window.location.reload(); } );
    //     });
    // }

    function cancelTransfer() {
        Button.url( $( this ) ).done( function ( resp ) {
            if ( resp.message ) {
                Alert.alert( resp.message ).yes( function(){ window.location.reload(); } );
            }
        });
    }

    function initSupportFields() {
        $( "#license_by_id_button" ).on( "click", getLicenseById );
        $( "#register_license_button" ).on( "click", registerExtension );
        //$( "#finish_transfer" ).on( "click", finishTransfer );
        $( "#cancel_transfer" ).on( "click", cancelTransfer );
    }

    $( document ).ready( function ready() {
        // Send support request
        $( document ).delegate( "#ask-support-button", "click", askSupport );

        // Rollback DB version
        $( document ).delegate( "#rollback-db", "click", rollbackDb );

        // Run update process of DB date manually
        $( "#update-button" ).on( "click", updateDB );

        // Flush system cache
        $( "#clear-cache" ).on( "click", flushCache );

        // Initialize tabs
        $( ".nav-tabs" ).tab();

        // Render support tab contents
        renderTicketButton();
    } );
} );