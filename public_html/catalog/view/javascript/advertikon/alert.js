define( "alert", [], function() {
    function Alert () {
        var locale;

        this.setLocale = function (loc) {
            locale = loc;
        };

        /**
         * Modal widow deferred object constructor
         * @param {(object|undefined)} self This pointer for callbacks functions, optional
         * @returns {object} New instance
         */
        function ModalDeffered ( self ) {
            var
                hiddenList = [],
                hideList = [],
                noList = [],
                showList = [],
                shownList = [],
                yesList = [];

            /**
             * Adds show callback
             * @param {function} func Callback function
             * @returns {object} this
             */
            this.show = function show( func ) {
                if ( typeof func === "function" ) {
                    showList.push( func );
                }

                return this;
            };

            /**
             * Adds shown callback
             * @param {function} func Callback function
             * @returns {object} this
             */
            this.shown = function shown( func ) {
                if ( typeof func === "function" ) {
                    shownList.push( func );
                }

                return this;
            };

            /**
             * Adds hide callback
             * @param {function} func Callback function
             * @returns {object} this
             */
            this.hide = function hide( func ) {
                if ( typeof func === "function" ) {
                    hideList.push( func );
                }

                return this;
            };

            /**
             * Adds hidden callback
             * @param {function} func Callback function
             * @returns {object} this
             */
            this.hidden = function hidden( func ) {
                if ( typeof func === "function" ) {
                    hiddenList.push( func );
                }

                return this;
            };

            /**
             * Adds YRS callback (confirm box)
             * @param {function} func Callback function
             * @returns {object} this
             */
            this.yes = function y( func ) {
                if ( typeof func === "function" ) {
                    yesList.push( func );
                }

                return this;
            };

            /**
             * Adds NO callback (confirm box)
             * @param {function} func Callback function
             * @returns {object} this
             */
            this.no = function n( func ) {
                if ( typeof func === "function" ) {
                    noList.push( func );
                }

                return this;
            };

            /**
             * Triggers all the show callbacks
             * @returns {object} Self
             */
            this.triggerShow = function triggerShow() {
                $.each( showList, function queue() {
                    this.call( self );
                } );

                return this;
            };

            /**
             * Triggers all the shown callbacks
             * @returns {object} Self
             */
            this.triggerShown = function triggerShown() {
                $.each( shownList, function queue() {
                    this.call( self );
                } );

                return this;
            };

            /**
             * Triggers all the hide callbacks
             * @returns {object} Self
             */
            this.triggerHide = function triggerHide() {
                $.each( hideList, function queue() {
                    this.call( self );
                } );

                return this;
            };

            /**
             * Triggers all the hidden callbacks
             * @returns {object} Self
             */
            this.triggerHidden = function triggerHidden() {
                $.each( hiddenList, function queue() {
                    this.call( self );
                } );

                return this;
            };

            /**
             * Triggers all the YES callbacks
             * @returns {object} Self
             */
            this.triggerYes = function ty() {
                $.each( yesList, function queue() {
                    this.call( self );
                } );

                return this;
            };

            /**
             * Triggers all the NO callbacks
             * @returns {object} Self
             */
            this.triggerNo = function tn() {
                $.each( noList, function queue() {
                    this.call( self );
                } );

                return this;
            };

            /**
             * Clears all the callbacks queues
             * @returns {object} Self
             */
            this.clear = function clear() {
                hiddenList = [];
                hideList = [];
                showList = [];
                shownList = [];
                yesList = [];
                noList = [];

                return this;
            };
        }

        /**
         * A browser's alert substitution
         * @param {String} msg Alert message
         * @param {string} title Alert title
         * @param {string} size Modal size (modal-sm|modal-lg)
         * @returns {object} Deferred object
         */
        this.alert = function ( msg, title, size ) {
            var instance = $( "<div class=\"modal fade\" tabindex=\"-1\"" +
                " role=\"dialog\" aria-labelledby=\"modal alert messenger\">" +
                "<div class=\"modal-dialog modal-sm\">" +
                "<div class=\"modal-content\">" +
                "<div class=\"modal-header\">" +
                "<button type=\"button\" class=\"close\" data-dismiss=\"modal\"" +
                "aria-label=\"Close\">" +
                "<span aria-hidden=\"true\">&times;</span>" +
                "</button>" +
                "<h4 class=\"modal-title\">" + locale.modalHeader + "</h4>" +
                "</div>" +
                "<div class=\"modal-body\">" + msg + "</div>" +
                "</div>" +
                "</div>" );

            var messageField = instance.find( ".modal-body" );
            var titleField = instance.find( ".modal-title" );
            var dialogField = instance.find( ".modal-dialog" );
            var deffered = new ModalDeffered( instance );

            instance.on( {
                "show.bs.modal": function showAlert() {
                    deffered.triggerShow();
                },
                "shown.bs.modal": function shownAlert() {
                    deffered.triggerShown();
                },
                "hide.bs.modal": function hideAlert() {
                    deffered.triggerHide();
                },
                "hidden.bs.modal": function hiddentAlert() {
                    deffered.triggerHidden();
                    deffered.triggerYes();
                }
            } );

            messageField.html( msg );
            titleField.html( title || locale.modalHeader );
            dialogField.removeClass( "modal-sm modal-md modal-lg" ).addClass( size || "modal-sm" );

            $( ".modal" ).not( instance ).modal( "hide" );
            instance.modal( "show" );
            deffered.clear();

            return deffered;
        };

        /**
         * A browser's confirm substitution
         * @param {String} msg Alert message
         * @param {function} callbackYes Yes-callback
         * @param {function} callbackNo No-callback
         * @returns {void}
         */
        this.confirm = function ( msg, config ) {
            var isYes = false;

            if ( typeof msg === "undefined" ) {
                msg = "Are you sure?";
            }

            if ( typeof config === "undefined" ) {
                config = {};
            }

            var c = $.extend( config, {
                showNo:  true,
                textYes: locale.yes,
                textNo:  locale.no
            } );

            var instance =
                $( "<div class=\"modal fade\" tabindex=\"-1\"" +
                    " role=\"dialog\" aria-labelledby=\"modal alert messenger\">" +
                    "<div class=\"modal-dialog modal-sm\">" +
                    "<div class=\"modal-content\">" +
                    "<div class=\"modal-header\">" +
                    "<button type=\"button\" class=\"close\" data-dismiss=\"modal\"" +
                    "aria-label=\"Close\">" +
                    "<span aria-hidden=\"true\">&times;</span>" +
                    "</button>" +
                    "<h4 class=\"modal-title\">" + locale.modalHeader + "</h4>" +
                    "</div>" +
                    "<div class=\"modal-body\">" + msg + "</div>" +
                    "<div class=\"modal-footer\">" +
                    ( c.showNo ?
                        "<button type=\"button\" class=\"btn btn-default\" " +
                        "data-dismiss=\"modal\">" +
                        c.textNo +
                        "</button>"
                        : "" ) +
                    "<button id=\"modal-yes\" type=\"button\" class=\"btn btn-primary\">" +
                    c.textYes +
                    "</button>" +
                    "</div>" +
                    "</div>" +
                    "</div>" );

            var messageField = instance.find( ".modal-body" );
            var deffered = new ModalDeffered( instance );

            instance.on( {
                "show.bs.modal": function showC() {
                    deffered.triggerShow();
                },
                "shown.bs.modal": function shownC() {
                    deffered.triggerShown();
                },
                "hide.bs.modal": function hideC() {
                    deffered.triggerHide();
                },
                "hidden.bs.modal": function hiddentC() {
                    deffered.triggerHidden();

                    if ( !isYes ) {
                        deffered.triggerNo();
                    }
                }
            } );

            instance.find( "#modal-yes" ).on( "click", function c() {
                isYes = true;
                instance.modal( "hide" );
                deffered.triggerYes();
            } );

            messageField.html( msg );
            instance.modal( "show" );
            deffered.clear();

            return deffered;
        };

        /**
         * Makes element background color pulsate for a while
         * @param {object} elem Element
         * @param {(integer|undefined)} time Time to pulsate. Default 2 sec.
         * @returns {void}
         */
        this.pulsate = function p( elem, time ) {
            if ( $( elem ).hasClass( "select2-hidden-accessible" ) ) {
                elem = $( elem ).next( "span" ).find( ".select2-selection" );
            }

            $( elem ).addClass( "pulsate" );

            elem.pulseTimeout = window.setTimeout( function removePusingClass() {
                $( elem ).removeClass( "pulsate" );
            }, time || 2000 );

            // Remove pulsating on focus
            $( elem ).one( "focus", function () {
                clearTimeout( this.pulseTimeout );
                $( this ).removeClass( "pulsate" );
            } );
        };
    }

    return new Alert();
} );