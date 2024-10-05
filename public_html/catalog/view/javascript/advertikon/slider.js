define( "slider", [ "switcher", "jquery-ui.min"], function( Switcher ){
    function SliderInit() {
        this.init = function () {
            $(".adk-slider-element").each(function (index, item) {
                if ( !item.adk_slider ) {
                    item.adk_slider = new Slider(item);
                    item.value = function(){return this.adk_slider.value();}
                }
            } );
        }
    }

    function Slider( element ) {
        var $element = $( element );
        var $slider = $element.find( ".adk-slider" );
        var data = JSON.parse( $element.attr( 'data-data' ) ) || {};
        var $input1 = $( element ).find( ".adk-slider-value-min" );
        var $input2 = $( element ).find( ".adk-slider-value-max" );
        var switcher1 = Switcher.init( $( element ).find( ".adk-switcher-left" ) );
        var switcher2 = Switcher.init( $( element ).find( ".adk-switcher-right" ) );
        var value1 = data.value1;
        var value2 = data.value2;
        var max = data.max;
        var min = data.min;
        var index = $input1.length ? switcher1.getIndex() : switcher2.getIndex();
        var isRange = $input1.length && $input2.length;

        this.value = function () {
            var ret = [[],[]];

            if ( $input1.length ) {
                ret[0] = { value: value1[index], units: switcher1.units() };
            }

            if ( $input2.length ) {
                ret[1] = { value: value2[index], units: switcher2.units() };
            }

            return ret;
        };

        this.init = function() {
            var sliderData = {};
            var self = this;

            if ( value1 && value2 ) {
                sliderData['values'] = [ value1[index], value2[index]];

            } else if ( value1 ) {
                sliderData['value'] = value1[index];
                sliderData['range'] = 'max';

            } else if ( value2 ) {
                sliderData['value'] = value2[index];
                sliderData['range'] = 'min';
            }

            if ( min ) {
                sliderData['min'] = min[index];
            }

            if ( max ) {
                sliderData['max'] = max[index];
            }

            $slider.slider( sliderData );
            $slider.on( "slide", this.slide.bind( this) );
            this.initValues();
            this.updateInputs();

            if ( switcher1 ) {
                switcher1.onSwitch( function( i ) {
                    if ( switcher2 ) switcher2.switch();
                    index = i;
                    self.updateInputs();
                    self.updateSlider();
                } );
            }

            if ( switcher2 ) {
                switcher2.onSwitch( function( i ) {
                    if ( switcher1 ) switcher1.switch();
                    index = i;
                    self.updateInputs();
                    self.updateSlider();
                } );
            }
        };

        this.initValues = function() {
            var self = this;

            if ( $input1.length ) {
                $input1.on( "change", function() {
                    value1[index] = $(this).val();
                    self.fixValues();
                    self.updateSlider();
                } );
            }

            if ( $input2.length ) {
                $input2.on( "change", function() {
                    value2[index] = $(this).val();
                    self.fixValues( false );
                    self.updateSlider();
                } );
            }
        };

        this.slide = function( event, ui ) {
            if ( ui.values ) {
                this.slideRange( ui );

            } else {
                if ( $input1.length ) {
                    value1[index] = ui.value;

                } else {
                    value2[index] = ui.value;
                }
            }

            this.updateInputs();
        };

        this.slideRange = function( ui ) {
            if ( ui.handleIndex === 0 ) {
                value1[index] = ui.value;
                value2[index] = ui.values[1];
                this.fixValues();

            } else {
                value2[index] = ui.value;
                value1['index'] = ui.values[0];
                this.fixValues( false );
            }
        };

        this.updateInputs = function() {
            if ( $input1.length ) $input1.val( value1[index] );
            if ( $input2.length ) $input2.val( value2[index] );
        };

        this.updateSlider = function() {
            if ( isRange ) {
                $slider.slider( 'option', 'values', [ value1[index], value2[index] ] );

            } else {
                $slider.slider( 'option', 'value', typeof value1 !== 'undefined' ? value1[index] : value2[index] );
            }

            $slider.slider( 'option', 'max', max[index] );
            $slider.slider( 'option', 'min', min[index] );
        };

        this.fixValues = function( slidingMin = true ) {
            if ( !isRange ) return;

            if ( value1[index] > value2[index] ) {
                if ( slidingMin ) {
                    value2[index] = value1[index];

                } else {
                    value1[index] = value2[index];
                }

                this.updateSlider();
                this.updateInputs();
            }
        };

        this.init();
    }

    return new SliderInit();
} );