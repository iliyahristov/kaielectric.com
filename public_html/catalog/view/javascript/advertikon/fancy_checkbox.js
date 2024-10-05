define( "fancy_checkbox", [ "adk"], function( ADK ) {
    $.fn.fancyCheckbox = function( options ) {
        $.each(this, function () {
            if ("object" === typeof options || "undefined" === typeof options) {
                if (this.adk_fancy_checbox) {
                    return;
                }

                this.adk_fancy_checbox = new Checkbox(this);

            } else if ("string" === typeof options) {
                if ("on" === options) {
                    this.adk_fancy_checbox.on();

                } else if ("off" === options) {
                    this.adk_fancy_checbox.off();

                } else if ("toggle" === options) {
                    this.adk_fancy_checbox.toggle();

                } else if ("toggle-view" === options) {
                    this.adk_fancy_checbox.toggleView();

                } else if ("disable" === options) {
                    this.adk_fancy_checbox.disable();

                } else if ("enable" === options) {
                    this.adk_fancy_checbox.enable();
                }
            }
        } )
    };

    function Checkbox( elem ) {
        var element = elem;
        var $this = $( elem );
        var defaults = {
            wrapper: "<span class='fc-wrapper'>" +
                "<span class='fc-inner'>" +
                "<span class='fc-off'></span>" +
                "<span class='fc-middle'></span>" +
                "<span class='fc-on'></span>" +
                "</span>" +
                "</span>",
            width:         80,
            switcherWidth: 30,
            textOn:        "On",
            textOff:       "Off",
            valueOn:       1,
            valueOff:      0
        };

        var self = this;

        +function init() {
            if( $this.attr( "data-text-on" ) ) {
                defaults.textOn = $this.attr( "data-text-on" );
            }

            if( $this.attr( "data-text-off" ) ) {
                defaults.textOff = $this.attr( "data-text-off" );
            }

            if( $this.attr( "data-value-on" ) ) {
                defaults.valueOn = $this.attr( "data-value-on" );
            }

            if( $this.attr( "data-value-off" ) ) {
                defaults.valueOff = $this.attr( "data-value-off" );
            }

            if( $this.attr( "data-width" ) ) {
                defaults.width = $this.attr( "data-width" );
            }

            if( $this.attr( "data-dependent-on" ) ) {
                // this.fc_dependentOn = $this.attr( "data-dependent-on" );
                $(document).on( "change", $this.attr( "data-dependent-on" ), function( evt ) {
                    if ( !ADK.isEmpty( evt.target.value ) ) {
                        self.on();
                    }
                } );
            }

            if( $this.attr( "data-dependent-off" ) ) {
                // this.fc_dependentOff = $this.attr( "data-dependent-off" );
                $(document).on( "change", $this.attr( "data-dependent-off" ), function( evt ) {
                    if ( ADK.isEmpty( evt.target.value ) ) {
                        self.off();
                    }
                } );
            }

            // Slider width
            element.fc_shift = defaults.width - defaults.switcherWidth;

            // Make element and initialize it dimensions
            element.fc_wrapper = $( defaults.wrapper );
            $this.after( element.fc_wrapper );

            element.fc_inner = element.fc_wrapper.find( ".fc-inner" );
            element.fc_switcher = element.fc_wrapper.find( ".fc-middle" );

            element.fc_wrapper.css( "width", defaults.width + "px" )
                .find( ".fc-middle" )
                .css( "width", defaults.switcherWidth + "px" )
                .end()
                .find( ".fc-on, .fc-off" )
                .css( "width", element.fc_shift + "px" )
                .end()
                .find( ".fc-inner" )
                .css( "width", 2 * element.fc_shift + defaults.switcherWidth + "px" )
                .end()
                .on( "click", switchStatus );

            // Set back link
            element.fc_wrapper[ 0 ].fc_input = element;

            // Set captions
            element.fc_wrapper.find( ".fc-on" ).html( defaults.textOn );
            element.fc_wrapper.find( ".fc-off" ).html( defaults.textOff );

            $this.on( "change", checkStatus );

            element.fc_inited = true;
            checkStatus.call( element );
        }();

        /**
         * Switches element values
         * @returns {void}
         */
        function switchStatus() {
            if ( element.disabled ) {
                return;
            }

            if( ADK.isEmpty( element.value ) ) {
                element.value = 1;

            } else {
                element.value = 0;
            }

            checkStatus();
            $this.trigger( "change" );
        }

        /**
         * Switches On the element
         * @param {boolean} silent Fag as whether to trigger change event on the element
         * @returns {void}
         */
        this.on = function( silent ) {
            if( true === element.disabled ) {
                return;
            }

            if ( !ADK.isEmpty( element.value ) ) {
                return;
            }

            element.value = 1;
            checkStatus();

            if( !silent ) {
                $this.trigger( "change" );
            }
        };

        /**
         * Switches Off the element
         * @param {boolean} silent Flag as whether to trigger change event on the element
         * @returns {void}
         */
        this.off = function( silent ) {
            if( true === element.disabled ) {
                return;
            }

            if ( ADK.isEmpty( element.value ) ) {
                return;
            }

            element.value = 0;
            checkStatus();

            if( !silent ) {
                $this.trigger( "change" );
            }
        };

        /**
         * Toggles the element
         * @returns {void}
         */
        this.toggle = function() {
            if( true === element.disabled ) {
                return;
            }

            if( ADK.isEmpty( element.value ) ) {
                this.on();

            } else {
                this.off();
            }
        };

        /**
         * Silently toggles the element value (without event)
         * @returns {void}
         */
        this.toggleView = function () {
            if( true === element.disabled ) {
                return;
            }

            if( ADK.isEmpty( element.value ) ) {
                this.on( true );

            } else {
                this.off( true );
            }
        };

        /**
         * Changes element appearance depend on its value
         * @returns {void}
         */
        function checkStatus() {
            if( ADK.isEmpty( element.value ) ) {
                switch_off();

            } else {
                switch_on();
            }

            clearTimeout( element.fc_animationTimeout );
            element.fc_animationTimeout = setTimeout( function() { shiftEnd(); }, 400 );
        }

        /**
         * Switch element on
         * @returns {void}
         */
        function switch_on() {
            element.fc_inner.css( "left", -1 * element.fc_shift + "px" );
        }

        /**
         * Switch element off
         * @returns {void}
         */
        function switch_off() {
            element.fc_inner.css( "left", 0 );
        }

        /**
         * Shift animation end call-back
         * @returns {void}
         */
        function shiftEnd() {
            if( ADK.isEmpty( element.value ) ) {
                element.fc_switcher.removeClass( "on" );
                element.fc_wrapper.css( "border-color", "gray" )
                    .removeClass( "fc-switched-on" )
                    .addClass( "fc-switched-off" );

            } else {
                element.fc_switcher.addClass( "on" );
                element.fc_wrapper.css( "border-color", "green" )
                    .removeClass( "fc-switched-off" )
                    .addClass( "fc-switched-on" );
            }
        }

        /**
         * Disables element
         * @returns {void}
         */
        this.disable = function () {
            element.fc_wrapper.addClass( "fc-disabled" )
                .find( "span" )
                .addClass( "fc-disabled" );
            element.disabled = true;
        };

        /**
         * Enables element
         * @returns {void}
         */
        this.enable = function () {
            element.fc_wrapper.removeClass( "fc-disabled" )
                .find( "span" )
                .removeClass( "fc-disabled" );
            element.disabled = false;
        };
    }

    return {};
} );