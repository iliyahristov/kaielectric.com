define( "adk", [], function() {
    var ADK = function() {
        this.locale;

        this.isEmpty = function( value ) {
            return typeof value === "undefined" || value === false || "off" === value ||
                "false" === value || null === value || 0 === value || "0" === value;
        };

        this.isMobile = function () {
            return ( /android|blackberry|iemobile|ipad|iphone|ipod|opera mini|webos/i )
                .test( navigator.userAgent );
        };
    };

    return new ADK();
} );