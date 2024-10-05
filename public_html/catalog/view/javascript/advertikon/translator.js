define( "translator", ["button"], function( Button ) {
    function Caption ( element ) {
        var $element = $( element );
        var $button = $( element ).find( '.adk-translate-apply' );
        var code = $element.attr( 'data-code' );
        var isCatalog = $element.attr( 'data-catalog' );
        var language = $element.find( '.adk-translate-flag.actiff' ).attr( 'data-language' );
        var self = this;

        this.selectLanguage = function ( languageCode ) {
            $element.find( ".adk-translate-flag" ).each( function (index, item ) {
                if ( $( item ).attr( 'data-language' ) === languageCode ) {
                    $( item ).addClass( 'actiff' );

                } else {
                    $( item ).removeClass( 'actiff' );
                }
            } );

            $element.find( ".adk-translate-control-set" ).css( 'top',
                $element.find( '.adk-translate-text[data-language="' + languageCode + '"]').position().top * -1 );
            language = languageCode;
        };

        this.save = function() {
            Button.url( $button, {
                text:     $element.find( '.adk-translate-text[data-language="' + language + '"]' ).val(),
                language: language,
                code:     code,
                catalog:  isCatalog
            } );
        };

        function init() {
            $element.find( ".adk-translate-flag" ).on( "click", function( e ) { self.selectLanguage( $(e.target).attr('data-language' ) ); } );
            $button.on( "click", this.save.bind( this ) );
        }

        init.apply( this );
    }

    function Inline() {

    }

    function markTranslated( evt ) {
        var item = $( this ).closest( ".adk-translate-item" );
        evt.preventDefault();
        evt.stopPropagation();

        $( ".adk-translate-item" ).not( item ).removeClass( "adk-translate-active" );
        item.toggleClass( "adk-translate-active" );

        if ( item.hasClass( "adk-translate-active" ) ) {
            showTranslationForm.call( this );

        } else {
            hideTranslationForm();
        }

        return false;
    }

    function showTranslationForm() {
        var
            form = undefined,
            item = $( this ).closest( ".adk-translate-item" ),
            text = item.find( ".adk-translate-text" ).text();

        $( ".adk-form-translate" ).each( function() {
            if ( !form ) {
                form = $( this );
                form.appendTo( document.body );

            } else {
                $( this ).remove();
            }
        } );

        form.find( ".adk-translate-original" ).val( text );
        form.find( ".adk-translate-new" ).val( "" );
        form.addClass( "adk-form-active" );
    }

    function hideTranslationForm() {
        $( ".adk-form-translate" ).removeClass( "adk-form-active" );
        $( ".adk-translate-item.adk-translate-active" ).removeClass( "adk-translate-active" );
    }

    function translateCopy() {
        $( ".adk-translate-new" ).val( $( ".adk-translate-original" ).val() );
    }

    function translateApply() {
        var
            item = $( ".adk-translate-item.adk-translate-active" ),
            form = $( ".adk-form-translate" ),
            text = form.find( ".adk-translate-new" ).val(),
            language = item.attr( "data-language" ),
            code = item.attr( "data-code" ),
            isCatalog = item.attr( "data-catalog" ) ? "1" : "0";

        $.post( item.attr( "data-url" ), {
            text: text,
            language: language,
            code: code,
            catalog: isCatalog
        }, null, "json" )

            .always( function() {

            } )

            .done( function( ret ) {
                if ( ret.error ) {
                    alert( ret.error );
                }

                if ( ret.success ) {
                    hideTranslationForm();
                    updateTranslatedText( code, text );
                }
            } )

            .fail( function() { alert( 'Network Error' ) } );
    }

    function updateTranslatedText( code, text ) {
        $( ".adk-translate-item" ).each( function() {
            if ( $( this ).attr( "data-code" ) === code ) {
                $( this ).find( ".adk-translate-text" ).text( text );
            }
        } );
    }

    $( document ).on( "click", ".adk-translate-button-copy", translateCopy );
    $( document ).on( "click", ".adk-translate-button-apply", translateApply );
    $( document ).on( "click", ".adk-translate-button-close", hideTranslationForm );

    document.addEventListener( "click", function( e ) {
        if ( e.target.className === "adk-translate-check" ) {
            markTranslated.call( e.target, e );
        }
    }, true );


    return {
        init: function() {
            $( ".adk-translate-caption" ).each( function (index, item) {
                item.adk_translator = new Caption(item);
            } );
        }
    };
} );