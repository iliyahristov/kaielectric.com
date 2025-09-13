<?php

/* so-revo/template/extension/module/so_searchpro/default.twig */
class __TwigTemplate_a66642a46dfb5165fd9894494bd2068048aebef008952119e0cd13f948c25f95 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<div id=\"sosearchpro\" class=\"sosearchpro-wrapper ";
        // line 2
        echo (isset($context["additional_class"]) ? $context["additional_class"] : null);
        echo " \">
\t";
        // line 3
        if ((isset($context["disp_title_module"]) ? $context["disp_title_module"] : null)) {
            echo " 
\t\t<h3>";
            // line 4
            echo (isset($context["head_name"]) ? $context["head_name"] : null);
            echo " </h3>
\t";
        }
        // line 5
        echo " 
\t
\t<form method=\"GET\" action=\"index.php\">
\t\t<div id=\"search";
        // line 8
        echo (isset($context["module"]) ? $context["module"] : null);
        echo "\" class=\"search input-group form-group\">
\t\t\t";
        // line 9
        if ((isset($context["categories"]) ? $context["categories"] : null)) {
            echo " 
\t\t\t<div class=\"select_category filter_type  icon-select\">
\t\t\t\t<select class=\"no-border\" name=\"category_id\">
\t\t\t\t\t<option value=\"0\">";
            // line 12
            echo (isset($context["text_category_all"]) ? $context["text_category_all"] : null);
            echo " </option>
\t\t\t\t\t";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                echo " 
\t\t\t\t\t\t
\t\t\t\t\t\t";
                // line 15
                if (($this->getAttribute($context["category"], "category_id", array()) == (isset($context["category_id"]) ? $context["category_id"] : null))) {
                    echo " 
\t\t\t\t\t\t\t<option value=\"";
                    // line 16
                    echo $this->getAttribute($context["category"], "category_id", array());
                    echo " \" selected=\"selected\">";
                    echo $this->getAttribute($context["category"], "name", array());
                    echo " </option>
\t\t\t\t\t\t";
                } else {
                    // line 17
                    echo "   
\t\t\t\t\t\t\t<option value=\"";
                    // line 18
                    echo $this->getAttribute($context["category"], "category_id", array());
                    echo " \">";
                    echo $this->getAttribute($context["category"], "name", array());
                    echo " </option>
\t\t\t\t\t\t";
                }
                // line 19
                echo " 
\t\t\t\t\t\t
\t\t\t\t\t\t";
                // line 21
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["category"], "children", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["category_lv2"]) {
                    echo " 
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                    // line 23
                    if (($this->getAttribute($context["category_lv2"], "category_id", array()) == (isset($context["category_id"]) ? $context["category_id"] : null))) {
                        echo " 
\t\t\t\t\t\t\t\t<option value=\"";
                        // line 24
                        echo $this->getAttribute($context["category_lv2"], "category_id", array());
                        echo " \" selected=\"selected\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";
                        echo $this->getAttribute($context["category_lv2"], "name", array());
                        echo " </option>
\t\t\t\t\t\t\t";
                    } else {
                        // line 25
                        echo "   
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<option value=\"";
                        // line 27
                        echo $this->getAttribute($context["category_lv2"], "category_id", array());
                        echo "\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";
                        echo $this->getAttribute($context["category_lv2"], "name", array());
                        echo " </option>
\t\t\t\t\t\t\t";
                    }
                    // line 28
                    echo " 
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                    // line 30
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["category_lv2"], "children", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["category_lv3"]) {
                        echo " 
\t\t\t\t\t\t\t\t";
                        // line 31
                        if (($this->getAttribute($context["category_lv3"], "category_id", array()) == (isset($context["category_id"]) ? $context["category_id"] : null))) {
                            echo " 
\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 32
                            echo $this->getAttribute($context["category_lv3"], "category_id", array());
                            echo " \" selected=\"selected\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            echo $this->getAttribute($context["category_lv3"], "name", array());
                            echo " </option>
\t\t\t\t\t\t\t\t";
                        } else {
                            // line 33
                            echo "   
\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 34
                            echo $this->getAttribute($context["category_lv3"], "category_id", array());
                            echo " \">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            echo $this->getAttribute($context["category_lv3"], "name", array());
                            echo " </option>
\t\t\t\t\t\t\t\t";
                        }
                        // line 35
                        echo " 
\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category_lv3'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 37
                    echo "\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category_lv2'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                echo "\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "\t\t\t\t</select>
\t\t\t</div>
\t\t\t";
        }
        // line 41
        echo "  
\t\t\t<input id=\"autosearch-input\" class=\"autosearch-input form-control\" type=\"text\" value=\"\" size=\"50\" autocomplete=\"off\" placeholder=\"";
        // line 42
        echo (isset($context["text_search"]) ? $context["text_search"] : null);
        echo "\" name=\"search\">
\t\t\t<span class=\"input-group-btn\">
\t\t\t\t<button type=\"submit\" class=\"button-search btn btn-default btn-lg\" name=\"submit_search\" disabled=\"true\"><i class=\"fa fa-search\"></i></button>
\t\t\t</span>
\t\t</div>

\t\t";
        // line 48
        if ((isset($context["show_keyword"]) ? $context["show_keyword"] : null)) {
            echo " 
\t\t<div class=\"text-keyword hidden-sm hidden-md hidden-xs\">
\t\t\t<span class=\"title-key\"><b>";
            // line 50
            echo (isset($context["str_keyword"]) ? $context["str_keyword"] : null);
            echo " :</b></span>
\t\t\t
\t\t\t<span class=\"item-key\">
\t\t\t\t";
            // line 53
            $context["dem"] = 0;
            // line 54
            echo "\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["list_products"]) ? $context["list_products"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 55
                echo "\t\t\t\t\t";
                $context["dem"] = ((isset($context["dem"]) ? $context["dem"] : null) + 1);
                // line 56
                echo "\t\t\t\t\t<a href=\"";
                echo $this->getAttribute($context["item"], "href", array());
                echo "\" target=\"_blank\" title=\"";
                echo $this->getAttribute($context["item"], "nameFull", array());
                echo "\">";
                echo $this->getAttribute($context["item"], "name_maxlength", array());
                echo "</a> ";
                if (((isset($context["dem"]) ? $context["dem"] : null) < twig_length_filter($this->env, (isset($context["list_products"]) ? $context["list_products"] : null)))) {
                    echo " | ";
                }
                echo "\t
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "\t\t\t</span>
\t\t</div>
\t";
        }
        // line 61
        echo "
\t\t<input type=\"hidden\" name=\"route\" value=\"product/search\"/>
\t</form>
</div>

<script type=\"text/javascript\">

// Autocomplete */
(function(\$) {
\t\$.fn.Soautocomplete = function(option) {
\t\treturn this.each(function() {
\t\t\tthis.timer = null;
\t\t\tthis.items = new Array();

\t\t\t\$.extend(this, option);

\t\t\t\$(this).attr('autocomplete', 'off');

\t\t\t// Focus
\t\t\t\$(this).on('focus', function() {
\t\t\t\tthis.request();
\t\t\t});

\t\t\t// Blur
\t\t\t\$(this).on('blur', function() {
\t\t\t\tsetTimeout(function(object) {
\t\t\t\t\tobject.hide();
\t\t\t\t}, 200, this);
\t\t\t});

\t\t\t// Keydown
\t\t\t\$(this).on('keydown', function(event) {
\t\t\t\tswitch(event.keyCode) {
\t\t\t\t\tcase 27: // escape
\t\t\t\t\t\tthis.hide();
\t\t\t\t\t\tbreak;
\t\t\t\t\tdefault:
\t\t\t\t\t\tthis.request();
\t\t\t\t\t\tbreak;
\t\t\t\t}
\t\t\t});

\t\t\t// Click
\t\t\tthis.click = function(event) {
\t\t\t\tevent.preventDefault();

\t\t\t\tvalue = \$(event.target).parent().attr('data-value');

\t\t\t\tif (value && this.items[value]) {
\t\t\t\t\tthis.select(this.items[value]);
\t\t\t\t}
\t\t\t}

\t\t\t// Show
\t\t\tthis.show = function() {
\t\t\t\tvar pos = \$(this).position();

\t\t\t\t\$(this).siblings('ul.dropdown-menu').css({
\t\t\t\t\ttop: pos.top + \$(this).outerHeight(),
\t\t\t\t\tleft: pos.left,
\t\t\t\t\tdisplay: \"flow-root\"
\t\t\t\t});

\t\t\t\t\$(this).siblings('ul.dropdown-menu').show();
\t\t\t}

\t\t\t// Hide
\t\t\tthis.hide = function() {
\t\t\t\t\$(this).siblings('ul.dropdown-menu').hide();
\t\t\t}

\t\t\t// Request
\t\t\tthis.request = function() {
\t\t\t\tclearTimeout(this.timer);

\t\t\t\tthis.timer = setTimeout(function(object) {
\t\t\t\t\tobject.source(\$(object).val(), \$.proxy(object.response, object));
\t\t\t\t}, 200, this);
\t\t\t}

\t\t\t// Response
\t\t\tthis.response = function(json) {
\t\t\t
\t\t\t\thtml = '';

\t\t\t\t
\t\t\t\t//to do add search string
\t\t\t\tif ( json[1].item.length ) {\t\t\t\t
\t\t\t\t\thtml += '<h6>Марки</h6>';\t

\t\t\t\t\tvar mans = json[1].item;
\t\t\t\t\tfor ( let i in mans ) {\t\t\t\t\t

\t\t\t\t\t\thtml += '<li class=\"media\" title=\"' + mans[i]['name'] + '\">';
\t\t\t\t\t\thtml += '<a href=\"' + mans[i]['link'] + '\" title=\"' + mans[i]['name'] + '\"><span>' + mans[i]['name'] + '</span></a>';
\t\t\t\t\t\thtml += '</li>';
\t\t\t\t\t\thtml += '<li class=\"clearfix\"></li>';\t\t\t\t\t\t
\t\t\t\t\t}\t\t\t\t\t
\t\t\t\t}
\t\t\t\t
\t\t\t\tif ( json[0].item.length ) {\t
\t\t\t\thtml += '<h6>Продукти</h6>';\t\t\t
\t\t\t
\t\t\t\t\tvar products = json[0].item;
\t\t\t\t\tfor ( let i in products ) {\t\t\t\t\t

\t\t\t\t\t\thtml += '<li class=\"media\" title=\"' + products[i]['name'] + '\">';
\t\t\t\t\t\thtml += '<a href=\"' + products[i]['link'] + '\" title=\"' + products[i]['name'] + '\"><span>' + products[i]['name'] + '</span></a>';
\t\t\t\t\t\thtml += '</li>';
\t\t\t\t\t\thtml += '<li class=\"clearfix\"></li>';\t\t\t\t\t\t
\t\t\t\t\t}\t\t\t\t\t
\t\t\t\t}

\t\t\t\tif ( json[2].item.length ) {\t
\t\t\t\thtml += '<h6>Категории</h6>';\t\t\t
\t\t\t
\t\t\t\t\tvar cats = json[2].item;
\t\t\t\t\tfor ( let i in cats ) {\t\t\t\t\t

\t\t\t\t\t\thtml += '<li class=\"media\" title=\"' + cats[i]['name'] + '\">';
\t\t\t\t\t\thtml += '<a href=\"' + cats[i]['link'] + '\" title=\"' + cats[i]['name'] + '\"><span>' + cats[i]['name'] + '</span></a>';
\t\t\t\t\t\thtml += '</li>';
\t\t\t\t\t\thtml += '<li class=\"clearfix\"></li>';\t\t\t\t\t\t
\t\t\t\t\t}\t\t\t\t\t
\t\t\t\t}

\t\t\t\tif (html) {
\t\t\t\t\tthis.show();
\t\t\t\t} else {
\t\t\t\t\tthis.hide();
\t\t\t\t}
                
\t\t\t\t\$(this).siblings('ul.dropdown-menu').html(html);
\t\t\t}

\t\t\t\$(this).after('<ul id=\"searchlist\" class=\"dropdown-menu\"></ul>');
\t\t\tif (!mobileAndTabletCheck()) {
                \$('#searchlist').on(\"touchstart mousedown\", function(evt) {
                    evt.preventDefault();
                });
            }
            // if ((document.documentElement.clientWidth || window.innerWidth) > 500) {
            //     \$('#searchlist').on(\"touchstart mousedown\", function(evt) {
            //         evt.preventDefault();
            //     });
            // }
\t\t});
\t}
\t\$(\"input[name=search]\").on('input', function(e){
\t\t
\t\tif( \$(\"input[name=search]\").val().length > 2 ){
\t\t\t
\t\t\t\$(\"button.button-search\").prop('disabled', false);
\t\t} else {
\t\t\t\$(\"button.button-search\").prop('disabled', true);
\t\t}
\t})
})(window.jQuery);

\$(document).ready(function() {
\tvar selector = '#search";
        // line 221
        echo (isset($context["module"]) ? $context["module"] : null);
        echo "';
\tvar total = 0;
\tvar showimage = ";
        // line 223
        echo (isset($context["showimage"]) ? $context["showimage"] : null);
        echo ";
\tvar showprice = ";
        // line 224
        echo (isset($context["showprice"]) ? $context["showprice"] : null);
        echo ";
\tvar character = ";
        // line 225
        echo (isset($context["character"]) ? $context["character"] : null);
        echo ";
\tvar height = ";
        // line 226
        echo (isset($context["height"]) ? $context["height"] : null);
        echo ";
\tvar width = ";
        // line 227
        echo (isset($context["width"]) ? $context["width"] : null);
        echo ";

    // document.querySelector('ul.dropdown-menu').addEventListener(\"touchstart\", function(evt) {
    //                 evt.preventDefault();
    //             }, false);
\t\$(selector).find('input[name=\\'search\\']').Soautocomplete({
\t\tdelay: 500,
\t\tsource: function(request, response) {
\t\t\tvar category_id = \$(\".select_category select[name=\\\"category_id\\\"]\").first().val();
\t\t\tif(typeof(category_id) == 'undefined')
\t\t\t\tcategory_id = 0;

\t\t\tif(request.length >= character){
\t\t\t\t\$.ajax({
\t\t\t\t\turl: 'index.php?route=extension/module/so_searchpro/autocomplete&filter_category_id='+category_id+'&width='+width+'&height='+height+'&filter_name='+encodeURIComponent(request),
\t\t\t\t\tdataType: 'json',
\t\t\t\t\tsuccess: function(json) {
\t\t\t\t\t
\t\t\t\t\t\tresponse( \$.map(json, function(item) {
\t\t\t\t\t\t\ttotal = 0;
\t\t\t\t\t\t\tif(item.total){
\t\t\t\t\t\t\t\ttotal = item.total;
\t\t\t\t\t\t\t}

\t\t\t\t\t\t\treturn {
\t\t\t\t\t\t\t\titem: item,
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}));
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
\t\t},
\t});
});
</script>";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/module/so_searchpro/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  408 => 227,  404 => 226,  400 => 225,  396 => 224,  392 => 223,  387 => 221,  225 => 61,  220 => 58,  203 => 56,  200 => 55,  195 => 54,  193 => 53,  187 => 50,  182 => 48,  173 => 42,  170 => 41,  165 => 39,  159 => 38,  153 => 37,  146 => 35,  139 => 34,  136 => 33,  129 => 32,  125 => 31,  119 => 30,  115 => 28,  108 => 27,  104 => 25,  97 => 24,  93 => 23,  86 => 21,  82 => 19,  75 => 18,  72 => 17,  65 => 16,  61 => 15,  54 => 13,  50 => 12,  44 => 9,  40 => 8,  35 => 5,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
/* */
/* <div id="sosearchpro" class="sosearchpro-wrapper {{ additional_class }} ">*/
/* 	{% if disp_title_module %} */
/* 		<h3>{{ head_name }} </h3>*/
/* 	{% endif %} */
/* 	*/
/* 	<form method="GET" action="index.php">*/
/* 		<div id="search{{ module }}" class="search input-group form-group">*/
/* 			{% if categories %} */
/* 			<div class="select_category filter_type  icon-select">*/
/* 				<select class="no-border" name="category_id">*/
/* 					<option value="0">{{ text_category_all  }} </option>*/
/* 					{% for category in categories %} */
/* 						*/
/* 						{% if category.category_id  ==  category_id %} */
/* 							<option value="{{ category.category_id }} " selected="selected">{{ category.name }} </option>*/
/* 						{% else %}   */
/* 							<option value="{{ category.category_id }} ">{{ category.name }} </option>*/
/* 						{% endif %} */
/* 						*/
/* 						{% for category_lv2 in category.children %} */
/* 							*/
/* 							{% if category_lv2.category_id  ==  category_id %} */
/* 								<option value="{{ category_lv2.category_id }} " selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ category_lv2.name }} </option>*/
/* 							{% else %}   */
/* 								*/
/* 								<option value="{{ category_lv2.category_id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{category_lv2.name}} </option>*/
/* 							{% endif %} */
/* 							*/
/* 							{% for category_lv3 in category_lv2.children %} */
/* 								{% if category_lv3.category_id  ==  category_id %} */
/* 									<option value="{{ category_lv3.category_id }} " selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ category_lv3.name }} </option>*/
/* 								{% else %}   */
/* 									<option value="{{ category_lv3.category_id }} ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ category_lv3.name }} </option>*/
/* 								{% endif %} */
/* 							{% endfor %}*/
/* 						{% endfor %}*/
/* 					{% endfor %}*/
/* 				</select>*/
/* 			</div>*/
/* 			{% endif %}  */
/* 			<input id="autosearch-input" class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="{{ text_search  }}" name="search">*/
/* 			<span class="input-group-btn">*/
/* 				<button type="submit" class="button-search btn btn-default btn-lg" name="submit_search" disabled="true"><i class="fa fa-search"></i></button>*/
/* 			</span>*/
/* 		</div>*/
/* */
/* 		{% if show_keyword %} */
/* 		<div class="text-keyword hidden-sm hidden-md hidden-xs">*/
/* 			<span class="title-key"><b>{{ str_keyword }} :</b></span>*/
/* 			*/
/* 			<span class="item-key">*/
/* 				{% set dem = 0%}*/
/* 				{% for item in list_products %}*/
/* 					{% set dem = dem + 1%}*/
/* 					<a href="{{ item.href }}" target="_blank" title="{{ item.nameFull }}">{{ item.name_maxlength }}</a> {% if dem < list_products|length %} | {% endif %}	*/
/* 				{% endfor %}*/
/* 			</span>*/
/* 		</div>*/
/* 	{% endif %}*/
/* */
/* 		<input type="hidden" name="route" value="product/search"/>*/
/* 	</form>*/
/* </div>*/
/* */
/* <script type="text/javascript">*/
/* */
/* // Autocomplete *//* */
/* (function($) {*/
/* 	$.fn.Soautocomplete = function(option) {*/
/* 		return this.each(function() {*/
/* 			this.timer = null;*/
/* 			this.items = new Array();*/
/* */
/* 			$.extend(this, option);*/
/* */
/* 			$(this).attr('autocomplete', 'off');*/
/* */
/* 			// Focus*/
/* 			$(this).on('focus', function() {*/
/* 				this.request();*/
/* 			});*/
/* */
/* 			// Blur*/
/* 			$(this).on('blur', function() {*/
/* 				setTimeout(function(object) {*/
/* 					object.hide();*/
/* 				}, 200, this);*/
/* 			});*/
/* */
/* 			// Keydown*/
/* 			$(this).on('keydown', function(event) {*/
/* 				switch(event.keyCode) {*/
/* 					case 27: // escape*/
/* 						this.hide();*/
/* 						break;*/
/* 					default:*/
/* 						this.request();*/
/* 						break;*/
/* 				}*/
/* 			});*/
/* */
/* 			// Click*/
/* 			this.click = function(event) {*/
/* 				event.preventDefault();*/
/* */
/* 				value = $(event.target).parent().attr('data-value');*/
/* */
/* 				if (value && this.items[value]) {*/
/* 					this.select(this.items[value]);*/
/* 				}*/
/* 			}*/
/* */
/* 			// Show*/
/* 			this.show = function() {*/
/* 				var pos = $(this).position();*/
/* */
/* 				$(this).siblings('ul.dropdown-menu').css({*/
/* 					top: pos.top + $(this).outerHeight(),*/
/* 					left: pos.left,*/
/* 					display: "flow-root"*/
/* 				});*/
/* */
/* 				$(this).siblings('ul.dropdown-menu').show();*/
/* 			}*/
/* */
/* 			// Hide*/
/* 			this.hide = function() {*/
/* 				$(this).siblings('ul.dropdown-menu').hide();*/
/* 			}*/
/* */
/* 			// Request*/
/* 			this.request = function() {*/
/* 				clearTimeout(this.timer);*/
/* */
/* 				this.timer = setTimeout(function(object) {*/
/* 					object.source($(object).val(), $.proxy(object.response, object));*/
/* 				}, 200, this);*/
/* 			}*/
/* */
/* 			// Response*/
/* 			this.response = function(json) {*/
/* 			*/
/* 				html = '';*/
/* */
/* 				*/
/* 				//to do add search string*/
/* 				if ( json[1].item.length ) {				*/
/* 					html += '<h6>Марки</h6>';	*/
/* */
/* 					var mans = json[1].item;*/
/* 					for ( let i in mans ) {					*/
/* */
/* 						html += '<li class="media" title="' + mans[i]['name'] + '">';*/
/* 						html += '<a href="' + mans[i]['link'] + '" title="' + mans[i]['name'] + '"><span>' + mans[i]['name'] + '</span></a>';*/
/* 						html += '</li>';*/
/* 						html += '<li class="clearfix"></li>';						*/
/* 					}					*/
/* 				}*/
/* 				*/
/* 				if ( json[0].item.length ) {	*/
/* 				html += '<h6>Продукти</h6>';			*/
/* 			*/
/* 					var products = json[0].item;*/
/* 					for ( let i in products ) {					*/
/* */
/* 						html += '<li class="media" title="' + products[i]['name'] + '">';*/
/* 						html += '<a href="' + products[i]['link'] + '" title="' + products[i]['name'] + '"><span>' + products[i]['name'] + '</span></a>';*/
/* 						html += '</li>';*/
/* 						html += '<li class="clearfix"></li>';						*/
/* 					}					*/
/* 				}*/
/* */
/* 				if ( json[2].item.length ) {	*/
/* 				html += '<h6>Категории</h6>';			*/
/* 			*/
/* 					var cats = json[2].item;*/
/* 					for ( let i in cats ) {					*/
/* */
/* 						html += '<li class="media" title="' + cats[i]['name'] + '">';*/
/* 						html += '<a href="' + cats[i]['link'] + '" title="' + cats[i]['name'] + '"><span>' + cats[i]['name'] + '</span></a>';*/
/* 						html += '</li>';*/
/* 						html += '<li class="clearfix"></li>';						*/
/* 					}					*/
/* 				}*/
/* */
/* 				if (html) {*/
/* 					this.show();*/
/* 				} else {*/
/* 					this.hide();*/
/* 				}*/
/*                 */
/* 				$(this).siblings('ul.dropdown-menu').html(html);*/
/* 			}*/
/* */
/* 			$(this).after('<ul id="searchlist" class="dropdown-menu"></ul>');*/
/* 			if (!mobileAndTabletCheck()) {*/
/*                 $('#searchlist').on("touchstart mousedown", function(evt) {*/
/*                     evt.preventDefault();*/
/*                 });*/
/*             }*/
/*             // if ((document.documentElement.clientWidth || window.innerWidth) > 500) {*/
/*             //     $('#searchlist').on("touchstart mousedown", function(evt) {*/
/*             //         evt.preventDefault();*/
/*             //     });*/
/*             // }*/
/* 		});*/
/* 	}*/
/* 	$("input[name=search]").on('input', function(e){*/
/* 		*/
/* 		if( $("input[name=search]").val().length > 2 ){*/
/* 			*/
/* 			$("button.button-search").prop('disabled', false);*/
/* 		} else {*/
/* 			$("button.button-search").prop('disabled', true);*/
/* 		}*/
/* 	})*/
/* })(window.jQuery);*/
/* */
/* $(document).ready(function() {*/
/* 	var selector = '#search{{ module }}';*/
/* 	var total = 0;*/
/* 	var showimage = {{ showimage }};*/
/* 	var showprice = {{ showprice }};*/
/* 	var character = {{ character }};*/
/* 	var height = {{ height }};*/
/* 	var width = {{ width }};*/
/* */
/*     // document.querySelector('ul.dropdown-menu').addEventListener("touchstart", function(evt) {*/
/*     //                 evt.preventDefault();*/
/*     //             }, false);*/
/* 	$(selector).find('input[name=\'search\']').Soautocomplete({*/
/* 		delay: 500,*/
/* 		source: function(request, response) {*/
/* 			var category_id = $(".select_category select[name=\"category_id\"]").first().val();*/
/* 			if(typeof(category_id) == 'undefined')*/
/* 				category_id = 0;*/
/* */
/* 			if(request.length >= character){*/
/* 				$.ajax({*/
/* 					url: 'index.php?route=extension/module/so_searchpro/autocomplete&filter_category_id='+category_id+'&width='+width+'&height='+height+'&filter_name='+encodeURIComponent(request),*/
/* 					dataType: 'json',*/
/* 					success: function(json) {*/
/* 					*/
/* 						response( $.map(json, function(item) {*/
/* 							total = 0;*/
/* 							if(item.total){*/
/* 								total = item.total;*/
/* 							}*/
/* */
/* 							return {*/
/* 								item: item,*/
/* 							}*/
/* 						}));*/
/* 					}*/
/* 				});*/
/* 			}*/
/* 		},*/
/* 	});*/
/* });*/
/* </script>*/
