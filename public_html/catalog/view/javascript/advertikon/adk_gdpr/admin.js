define( [ "adk" ],function ( ADK ) {
    function Admin() {
        this.locale = {};

        //Translator.init()

        this.setLocale = function (locale) {
            this.locale = locale;
        };

        // Entry point
        this.run = function (locale) {
            this.setLocale(locale);
            ADK.locale = locale;
        };
    }

    return new Admin();

} );