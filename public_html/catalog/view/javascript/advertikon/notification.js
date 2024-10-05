define( "notification", [ "animate_css" ], function() {
    function Notification() {
        var
            container = null,
            hourGlassSteps = [
                "fa-hourglass-start",
                "fa-hourglass-half",
                "fa-hourglass-end",
                "fa-hourglass-end fa-rotate-180",
                "fa-hourglass-half fa-rotate-180",
                "fa-hourglass-start fa-rotate-180"
            ];

        container = $( "#adk-notification-container" );

        // Create notifications holder
        if ( !container.length ) {
            container = $( "<div id='adk-notification-container' class='adk-notification-container'></div>" );
            $( document.body ).append( container );
        }

        /**
         * Adds new slot to notifications holder
         * @param {element} item Notification element to be put into the slot
         * @param {int} timeout Time to show notification
         * @returns {function} Remove slot function
         */
        function addSlot( item, timeout ) {
            var
                slot = document.createElement( "div" ),
                $slot = $( slot );

            slot.className = "adk-notification-slot";

            $slot.append( $( item ) );
            container.append( $slot );

            $slot.one( "click", removeSlot.bind( slot ) );

            // Notification has expiration time
            if( -1 !== timeout ) {
                $slot.timeout = setTimeout(
                    removeSlot.bind( slot ),
                    timeout || 5000
                );
            }

            $slot[ 0 ].item = item;
            $slot.animateCss( "bounceIn" );

            return slot;
        }

        /**
         * Removes notification slot
         * @returns {void}
         */
        function removeSlot() {
            var $this = $( this );

            if( this.timeout ) {
                clearTimeout( this.timeout );
            }

            $this.animateCss( "bounceOut", function cb() {
                $this.remove();
            } );
        }

        /**
         * Runs animation, which consists of list of classes
         * @returns {void}
         */
        function runAnimation() {

            var $this = $( this );

            if( this.animation[ this.currentAnimation % this.animation.length ] ) {
                $this
                    .removeClass(
                        this.animation[ this.currentAnimation % this.animation.length ]
                    );
            }

            $this
                .addClass(
                    this.animation[ ++this.currentAnimation % this.animation.length ]
                );

            this.timeout = setTimeout( runAnimation.bind( this ), 750 );
        }

        /**
         * Shows hour glass widget
         * @returns {function} Remove widget callback
         */
        this.hourglass = function() {
            var item = document.createElement( "i" );

            item.className = "notification-hourglass fa";
            item.animation = hourGlassSteps;
            item.currentAnimation = -1;

            runAnimation.call( item );

            return removeSlot.bind( addSlot( item, -1 ) );
        };

        /**
         * Shows alert message
         * @param {string} msg Message text
         * @param {int} timeout Time to showing message
         * @returns {void}
         */
        this.alert = function a( msg, timeout ) {
            var $item = $(
                "<div class='notification-alert notification-body'>" +
                "<div class='notification-alert-wrapper'>" +
                "<div class='notification-icon-wrapper notification-alert-icon-wrapper'>" +
                "<i class='fa fa-warning notification-icon " +
                "notification-alert-message-icon'></i>" +
                "</div>" +
                "<div class='notification-text-wrapper notification-alert-text-wrapper'>" +
                "<i class='notification-alert-message-text'>" +
                ( msg || "" ) +
                "</i>" +
                "</div>" +
                "</div>" +
                "</div>"
            );

            return removeSlot.bind( addSlot( $item[ 0 ], timeout || 10000 ) );
        };

        /**
         * Shows notification message
         * @param {string} msg Notification text
         * @param {int} timeout Time to show notification
         * @returns {void}
         */
        this.notification = function m( msg, timeout ) {
            var $item = $(
                "<div class='notification-info notification-body'>" +
                "<div class='notification-alert-wrapper'>" +
                "<div class='notification-icon-wrapper notification-info-icon-wrapper'>" +
                "<i class='fa fa-info notification-icon " +
                "notification-info-message-icon'></i>" +
                "</div>" +
                "<div class='notification-text-wrapper notification-info-text-wrapper'>" +
                "<i class='notification-info-message-text'>" +
                ( msg || "" ) +
                "</i>" +
                "</div>" +
                "</div>" +
                "</div>"
            );

            return removeSlot.bind( addSlot( $item[ 0 ], timeout || 5000 ) );
        };

        /**
         * Shows notification message
         * @param {string} msg Notification text
         * @param {int} timeout Time to show notification
         * @returns {void}
         */
        this.progress = function m( progress, msg ) {
            var $item = $(
                "<div class='notification-progress notification-body'>" +
                "<div class='notification-text-wrapper notification-progress-wrapper'>" +
                "<div class=\"progress\" style=\"width: 100%; margin: 0;\">" +
                "<div class=\"progress-bar progress-bar-striped active progress-bar-warning\" style=\"width: 45%\">" +
                "<span class=\"msg\" style=\"color: black\">" + msg || "" + "</span>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>"
            );

            $item.progress = function( p, msg ) {
                p = p || 0;
                this.find( ".progress-bar" ).css( "width", p + "%" );

                if ( msg ) {
                    this.find( ".msg" ).html( msg );
                }

                if ( p >= 100 ) {
                    this.close();
                }

                return this;
            };

            $item.close = function() {
                removeSlot.call( this[ 0 ] );
            };

            addSlot( $item[ 0 ], -1 );
            $item.progress( progress );

            return $item;
        };
    }

    return new Notification();
} );