define( "select2", ["adk", "select2/select2.min" ] , function( ADK ) {
    function Select2( element, data, force  ) {
        var
            d = {},
            me = null,
            $select = $( element ),
            imageHeight = data && data.imageHeight ? data.imageHeight : 50;

        // Autocomplete
        if (!element.selectInit || force) {
            if ( $select.attr("data-autocomplete")) {
                d.ajax = {
                    url: function url() {
                        return $select.attr("data-autocomplete").replace(/&amp;/, "&");
                    },
                    dataType: "json",
                    delay: 250,
                    data: function dFunc(params) {
                        var filter = null, ret = {};
                        filter = $select.attr("data-filter") || "filter_name";
                        ret.page = params.page;
                        ret[filter] = params.term;
                        return ret;
                    },
                    processResults: function (data, params) {
                        var
                            id = $select.attr("data-id") || "id",
                            ret = {results: []},
                            text = $select.attr("data-text") || "name";

                        params.page = params.page || 1;

                        ret.pagination = {
                            more: params.page * 30 < data.total_count
                        };

                        $.each(data, function ( index, item ) {
                            var record = null;

                            if (item[id] && item[text]) {
                                record = {id: item[id], text: item[text]};

                                if (item.image) {
                                    record.image = item.image;
                                }

                                ret.results.push(record);
                            }
                        });

                        return ret;
                    },
                    cache: true
                };

                d.minimumInputLength = 1;
            }

            d.escapeMarkup = function escM(markup) {
                return markup;
            };

            d.templateResult = function (data, element) {
                var ret = $(element);

                if (data.image) {
                    ret.html("<img src='" + ADK.imageBase + data.image +
                        "' style='height:" + imageHeight + "px' />&nbsp;" + data.text);
                } else {
                    ret.text(data.text);
                }

                ret.attr("value", data.id);

                return ret;
            };

            d.templateSelection = function formatRepoSelection(data) {
                if (data.image) {
                    return $("<span><img src='" + ADK.imageBase + data.image +
                        "' style='height:" + imageHeight + "px' />&nbsp;" + data.text + '</span>');
                } else {
                    return $("<span>" + data.text + "</span>");
                }
            };

            d.width = "100%";

            $select.select2($.extend(d, data || {}));
            element.selectInit = true;
        }
    }

    return {
        init: function( element ) {
            if ( element ) {
                new Select2( element );

            } else {
                $( ".select2" ).each( function( index, item ) { new Select2( item ) } );
            }
        }
    };
} );