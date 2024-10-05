define( "ui_init", [ "fancy_checkbox" ], function () {
    function UI() {

        function main() {
            // Popover element press event
            $( document ).delegate( ".popover-icon", "mousedown", function press() {
                $( this )
                    .removeClass( "released" )
                    .addClass( "pressed" );
            } );

            // Popover element release event
            $( document ).delegate( ".popover-icon", "mouseup", function release() {
                $( this )
                    .removeClass( "pressed" )
                    .addClass( "released" );
            } );

            // Pop over hint
            $( document ).delegate( ".popover-icon", "click", function popover() {
                if( true !== this.popovered ) {
                    this.popovered = true;
                    $( this ).popover()
                        .trigger( "click" );
                }

            } );

            // Copy to clipboard
            $( document ).delegate( ".clipboard", "click", function copy() {
                if ( "select" in this && "getSelection" in window ) {
                    this.select();

                    if ( "" === window.getSelection().toString() ) {
                        return;
                    }

                    if( "execCommand" in document && document.execCommand( "copy" ) ) {
                        ADK.n.notification(
                            ADK.locale.clipboard ||
                            "Data have been copied into clipboard"
                        );
                    }
                }
            } );

            // Make icons sway
            $( document ).delegate( ".sway-able", "mouseenter", function onHover() {
                $( this ).find( "i" ).animateCss( "flip" );
            } );
        }

        this.init = function () {
            main();
            this.checkbox();
        };

        this.checkbox = function( parent ) {
            if ( parent ) {
                $(parent).find( ".fancy-checkbox" ).fancyCheckbox();

            } else {
                $( ".fancy-checkbox" ).fancyCheckbox();
            }
        };
    }

    return new UI();
} );