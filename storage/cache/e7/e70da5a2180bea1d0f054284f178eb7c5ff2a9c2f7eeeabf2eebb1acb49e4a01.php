<?php

/* so-revo/template/extension/module/featured_manufacturers.twig */
class __TwigTemplate_ab10e3e46ad801d64dd7169e937af6a718972fea492353a73e53682514bada46 extends Twig_Template
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
<div class=\"module ";
        // line 2
        echo (isset($context["direction_class"]) ? $context["direction_class"] : null);
        echo " extra_home10 mans-slider\">
\t<div class=\"head-title\">\t\t
\t\t<h2 class=\"modtitle font-ct\">";
        // line 4
        echo (isset($context["head_name"]) ? $context["head_name"] : null);
        echo "</h2>\t\t

\t\t";
        // line 6
        if ( !twig_test_empty(trim((isset($context["pre_text"]) ? $context["pre_text"] : null)))) {
            echo " 
\t\t\t<div class=\"form-group\">
\t\t\t\t";
            // line 8
            echo (isset($context["pre_text"]) ? $context["pre_text"] : null);
            echo "
\t\t\t</div>
\t\t";
        }
        // line 11
        echo "\t</div>
\t<div class=\"modcontent\">
\t\t
\t\t";
        // line 14
        if (twig_test_empty((isset($context["manufacturers"]) ? $context["manufacturers"] : null))) {
            // line 15
            echo "\t\t\t<div class=\"alert alert-info\"><i class=\"fa fa-info-circle\"></i> 
\t\t\t\t";
            // line 16
            echo (isset($context["text_noproduct"]) ? $context["text_noproduct"] : null);
            echo "
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
\t\t\t</div>

\t\t";
        } else {
            // line 21
            echo "\t\t\t";
            $context["count_item"] = twig_length_filter($this->env, (isset($context["manufacturers"]) ? $context["manufacturers"] : null));
            echo "\t
\t\t\t";
            // line 22
            $context["cls_btn_page"] = ((((isset($context["button_page"]) ? $context["button_page"] : null) == "top")) ? ("buttom-type1") : ("button-type2"));
            echo "\t
\t\t\t";
            // line 23
            $context["btn_type"] = ((((isset($context["button_page"]) ? $context["button_page"] : null) == "top")) ? ("button-type1") : ("button-type2"));
            // line 24
            echo "\t\t\t
\t\t\t";
            // line 25
            $context["tag_id"] = ("so_extra_slider_" . (isset($context["suffix"]) ? $context["suffix"] : null));
            // line 26
            echo "\t\t\t";
            $context["class_respl"] = ((((((((("preset00-" . (isset($context["nb_column0"]) ? $context["nb_column0"] : null)) . " preset01-") . (isset($context["nb_column1"]) ? $context["nb_column1"] : null)) . " preset02-") . (isset($context["nb_column2"]) ? $context["nb_column2"] : null)) . " preset03-") . (isset($context["nb_column3"]) ? $context["nb_column3"] : null)) . " preset04-") . (isset($context["nb_column4"]) ? $context["nb_column4"] : null));
            // line 27
            echo "\t\t\t";
            $context["btn_prev"] = ((((isset($context["button_page"]) ? $context["button_page"] : null) == "top")) ? ("&#171") : ("&#139"));
            // line 28
            echo "\t\t\t";
            $context["btn_next"] = ((((isset($context["button_page"]) ? $context["button_page"] : null) == "top")) ? ("&#187") : ("&#155"));
            // line 29
            echo "\t\t\t";
            $context["i"] = 0;
            // line 30
            echo "
\t\t\t<div id=\"";
            // line 31
            echo (isset($context["tag_id"]) ? $context["tag_id"] : null);
            echo "\" class=\"so-extraslider ";
            echo (isset($context["cls_btn_page"]) ? $context["cls_btn_page"] : null);
            echo " ";
            echo (isset($context["class_respl"]) ? $context["class_respl"] : null);
            echo " ";
            echo (isset($context["btn_type"]) ? $context["btn_type"] : null);
            echo "\">
\t\t\t";
            // line 32
            $context["nb_rows"] = 5;
            // line 33
            echo "\t\t\t\t<!-- Begin extraslider-inner -->
\t\t\t\t<div class=\"extraslider-inner products-list grid\" data-effect=\"none\">

\t\t\t\t\t";
            // line 36
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["manufacturers"]) ? $context["manufacturers"] : null));
            foreach ($context['_seq'] as $context["i"] => $context["manufacturer"]) {
                // line 37
                echo "\t\t\t\t\t
\t\t\t\t\t\t";
                // line 38
                $context["i"] = ($context["i"] + 1);
                // line 39
                echo "\t\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"item \">
\t\t\t\t\t\t\t<div class=\"item-wrap product-layout ";
                // line 42
                echo (isset($context["products_style"]) ? $context["products_style"] : null);
                echo " \">
\t\t\t\t\t\t\t\t<div class=\"item-wrap-inner product-item-container \">
\t\t\t\t\t\t\t\t\t<div class=\"left-block\">
\t\t\t\t\t\t\t\t\t\t<div class=\"product-image-container\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"lt-image\" 
\t\t\t\t\t\t\t\t\t\t\t\tdata-manufacturer='";
                // line 47
                echo $this->getAttribute($context["manufacturer"], "manufacturer_id", array());
                echo "' 
\t\t\t\t\t\t\t\t\t\t\t   \thref=\"";
                // line 48
                echo $this->getAttribute($context["manufacturer"], "href", array());
                echo "\" 
\t\t\t\t\t\t\t\t\t\t\t   \t";
                // line 50
                echo "\t\t\t\t\t\t\t\t\t\t\t   \ttitle=\"";
                echo $this->getAttribute($context["manufacturer"], "name", array());
                echo "\">

\t\t\t\t\t\t\t\t\t\t\t";
                // line 52
                if (((isset($context["manufacturer_image_num"]) ? $context["manufacturer_image_num"] : null) == 2)) {
                    // line 53
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                    echo $this->getAttribute($context["manufacturer"], "thumb", array());
                    echo "\" class=\"img-1 lazyload\" alt=\"";
                    echo $this->getAttribute($context["manufacturer"], "nameFull", array());
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                    // line 54
                    echo $this->getAttribute($context["manufacturer"], "thumb2", array());
                    echo "\" class=\"img-2 lazyload\" alt=\"";
                    echo $this->getAttribute($context["manufacturer"], "nameFull", array());
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 56
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                    echo $this->getAttribute($context["manufacturer"], "thumb", array());
                    echo "\" alt=\"";
                    echo $this->getAttribute($context["manufacturer"], "nameFull", array());
                    echo "\" class=\"lazyload\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 58
                echo "\t\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<!-- End item-info -->
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<!-- End item-wrap-inner -->
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<!-- End item-wrap -->
\t\t\t\t\t\t</div>
\t\t\t\t\t\t

\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['manufacturer'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            echo "\t 
\t\t\t\t</div>
\t\t\t\t<!--End extraslider-inner -->
                <div class=\"see-all-mans\">
                    <div class=\"text-center\">
                      <a href=\"";
            // line 76
            echo (isset($context["see_all_mans"]) ? $context["see_all_mans"] : null);
            echo "\" class=\"see-all-mans-btn\" > <!-- target=\"_blank\" 09.01.2023 -->
                        Виж всички
                        </a>
                    </div>
                  </div>
\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t
\t\t\t\t//<![CDATA[
\t\t\t\tjQuery(document).ready(function (\$) {
\t\t\t\t\t(function (element) {
\t\t\t\t\t\tvar \$element = \$(element),
\t\t\t\t\t\t\t\t\$extraslider = \$(\".extraslider-inner\", \$element),
\t\t\t\t\t\t\t\t_delay = 500 ,
\t\t\t\t\t\t\t\t_duration = 800 ,
\t\t\t\t\t\t\t\t_effect = 'none ';

\t\t\t\t\t\t\$extraslider.on(\"initialized.owl.carousel2\", function () {
\t\t\t\t\t\t\tvar \$item_active = \$(\".owl2-item.active\", \$element);
\t\t\t\t\t\t\tif (\$item_active.length > 1 && _effect != \"none\") {
\t\t\t\t\t\t\t\t_getAnimate(\$item_active);
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\telse {
\t\t\t\t\t\t\t\tvar \$item = \$(\".owl2-item\", \$element);
\t\t\t\t\t\t\t\t\$item.css({\"opacity\": 1, \"filter\": \"alpha(opacity = 100)\"});
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t\t\$(\".owl2-controls\", \$element).insertBefore(\$extraslider);
\t\t\t\t\t\t\t\t\$(\".owl2-dots\", \$element).insertAfter(\$(\".owl2-prev\", \$element));
\t\t\t\t\t\t\t
\t\t\t\t\t\t});

\t\t\t\t\t\t\$extraslider.owlCarousel2({
\t\t\t\t\t\t\trtl: false,
\t\t\t\t\t\t\tcenter: false,
\t\t\t\t\t\t\tmargin: 5,
\t\t\t\t\t\t\tslideBy: 1,
\t\t\t\t\t\t\tautoplay: 0,
\t\t\t\t\t\t\tautoplayHoverPause: 0,
\t\t\t\t\t\t\tautoplayTimeout: 0 ,
\t\t\t\t\t\t\tautoplaySpeed: 1000 ,
\t\t\t\t\t\t\tstartPosition: 0 ,
\t\t\t\t\t\t\tmouseDrag: 1,
\t\t\t\t\t\t\ttouchDrag: 1 ,
\t\t\t\t\t\t\tautoWidth: false,
\t\t\t\t\t\t\tresponsive: {
\t\t\t\t\t\t\t\t0: \t{ items: 1 } ,
\t\t\t\t\t\t\t\t480: { items: 2 },
\t\t\t\t\t\t\t\t768: { items: 3 },
\t\t\t\t\t\t\t\t992: { items: 5 },
\t\t\t\t\t\t\t\t1200: {items: 5}
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\tdotClass: \"owl2-dot\",
\t\t\t\t\t\t\tdotsClass: \"owl2-dots\",
\t\t\t\t\t\t\tdots: false ,
\t\t\t\t\t\t\tdotsSpeed:500 ,
\t\t\t\t\t\t\tnav: true ,
\t\t\t\t\t\t\tloop: true ,
\t\t\t\t\t\t\tnavSpeed: 500 ,
\t\t\t\t\t\t\tnavText: [\"\", \"\"],
\t\t\t\t\t\t\tnavClass: [\"owl2-prev\", \"owl2-next\"]

\t\t\t\t\t\t});

\t\t\t\t\t\t\$extraslider.on(\"translate.owl.carousel2\", function (e) {\t\t\t\t\t\t\t 

\t\t\t\t\t\t\tvar \$item_active = \$(\".owl2-item.active\", \$element);
\t\t\t\t\t\t\t_UngetAnimate(\$item_active);
\t\t\t\t\t\t\t_getAnimate(\$item_active);
\t\t\t\t\t\t});

\t\t\t\t\t\t\$extraslider.on(\"translated.owl.carousel2\", function (e) {

\t\t\t\t\t\t\t 

\t\t\t\t\t\t\tvar \$item_active = \$(\".owl2-item.active\", \$element);
\t\t\t\t\t\t\tvar \$item = \$(\".owl2-item\", \$element);

\t\t\t\t\t\t\t_UngetAnimate(\$item);

\t\t\t\t\t\t\tif (\$item_active.length > 1 && _effect != \"none\") {
\t\t\t\t\t\t\t\t_getAnimate(\$item_active);
\t\t\t\t\t\t\t} else {

\t\t\t\t\t\t\t\t\$item.css({\"opacity\": 1, \"filter\": \"alpha(opacity = 100)\"});

\t\t\t\t\t\t\t}
\t\t\t\t\t\t});

\t\t\t\t\t\tfunction _getAnimate(\$el) {
\t\t\t\t\t\t\tif (_effect == \"none\") return;
\t\t\t\t\t\t\t//if (\$.browser.msie && parseInt(\$.browser.version, 10) <= 9) return;
\t\t\t\t\t\t\t\$extraslider.removeClass(\"extra-animate\");
\t\t\t\t\t\t\t\$el.each(function (i) {
\t\t\t\t\t\t\t\tvar \$_el = \$(this);
\t\t\t\t\t\t\t\t\$(this).css({
\t\t\t\t\t\t\t\t\t\"-webkit-animation\": _effect + \" \" + _duration + \"ms ease both\",
\t\t\t\t\t\t\t\t\t\"-moz-animation\": _effect + \" \" + _duration + \"ms ease both\",
\t\t\t\t\t\t\t\t\t\"-o-animation\": _effect + \" \" + _duration + \"ms ease both\",
\t\t\t\t\t\t\t\t\t\"animation\": _effect + \" \" + _duration + \"ms ease both\",
\t\t\t\t\t\t\t\t\t\"-webkit-animation-delay\": +i * _delay + \"ms\",
\t\t\t\t\t\t\t\t\t\"-moz-animation-delay\": +i * _delay + \"ms\",
\t\t\t\t\t\t\t\t\t\"-o-animation-delay\": +i * _delay + \"ms\",
\t\t\t\t\t\t\t\t\t\"animation-delay\": +i * _delay + \"ms\",
\t\t\t\t\t\t\t\t\t\"opacity\": 1
\t\t\t\t\t\t\t\t}).animate({
\t\t\t\t\t\t\t\t\topacity: 1
\t\t\t\t\t\t\t\t});

\t\t\t\t\t\t\t\tif (i == \$el.size() - 1) {
\t\t\t\t\t\t\t\t\t\$extraslider.addClass(\"extra-animate\");
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t});
\t\t\t\t\t\t}

\t\t\t\t\t\tfunction _UngetAnimate(\$el) {
\t\t\t\t\t\t\t\$el.each(function (i) {
\t\t\t\t\t\t\t\t\$(this).css({
\t\t\t\t\t\t\t\t\t\"animation\": \"\",
\t\t\t\t\t\t\t\t\t\"-webkit-animation\": \"\",
\t\t\t\t\t\t\t\t\t\"-moz-animation\": \"\",
\t\t\t\t\t\t\t\t\t\"-o-animation\": \"\",
\t\t\t\t\t\t\t\t\t\"opacity\": 1
\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t});
\t\t\t\t\t\t}

\t\t\t\t\t})(\"#";
            // line 203
            echo (isset($context["tag_id"]) ? $context["tag_id"] : null);
            echo "\");
\t\t\t\t});
\t\t\t\t//]]>
\t\t\t
\t\t\t</script>

\t\t\t</div>
\t\t";
        }
        // line 211
        echo "\t
\t</div> 
\t";
        // line 213
        if ( !twig_test_empty(trim((isset($context["post_text"]) ? $context["post_text"] : null)))) {
            echo " 
\t\t<div class=\"viewall\">
\t\t\t";
            // line 215
            echo (isset($context["post_text"]) ? $context["post_text"] : null);
            echo "
\t\t</div>
\t";
        }
        // line 218
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/module/featured_manufacturers.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  351 => 218,  345 => 215,  340 => 213,  336 => 211,  325 => 203,  195 => 76,  188 => 71,  169 => 58,  161 => 56,  154 => 54,  147 => 53,  145 => 52,  139 => 50,  135 => 48,  131 => 47,  123 => 42,  118 => 39,  116 => 38,  113 => 37,  109 => 36,  104 => 33,  102 => 32,  92 => 31,  89 => 30,  86 => 29,  83 => 28,  80 => 27,  77 => 26,  75 => 25,  72 => 24,  70 => 23,  66 => 22,  61 => 21,  53 => 16,  50 => 15,  48 => 14,  43 => 11,  37 => 8,  32 => 6,  27 => 4,  22 => 2,  19 => 1,);
    }
}
/* */
/* <div class="module {{direction_class}} extra_home10 mans-slider">*/
/* 	<div class="head-title">		*/
/* 		<h2 class="modtitle font-ct">{{ head_name }}</h2>		*/
/* */
/* 		{% if pre_text|trim is not empty  %} */
/* 			<div class="form-group">*/
/* 				{{ pre_text }}*/
/* 			</div>*/
/* 		{% endif %}*/
/* 	</div>*/
/* 	<div class="modcontent">*/
/* 		*/
/* 		{% if manufacturers is empty %}*/
/* 			<div class="alert alert-info"><i class="fa fa-info-circle"></i> */
/* 				{{ text_noproduct }}*/
/* 				<button type="button" class="close" data-dismiss="alert">×</button>*/
/* 			</div>*/
/* */
/* 		{% else %}*/
/* 			{% set count_item 	= manufacturers|length %}	*/
/* 			{% set cls_btn_page =  (button_page  ==  'top') ? 'buttom-type1':'button-type2' %}	*/
/* 			{% set btn_type 	=  (button_page  ==  'top') ? 'button-type1':'button-type2'%}*/
/* 			*/
/* 			{% set tag_id = 'so_extra_slider_'~suffix %}*/
/* 			{% set class_respl = 'preset00-'~nb_column0~' preset01-'~nb_column1~' preset02-'~nb_column2~' preset03-'~nb_column3~' preset04-'~nb_column4 %}*/
/* 			{% set btn_prev = (button_page == 'top') ? '&#171':'&#139' %}*/
/* 			{% set btn_next = (button_page == 'top') ? '&#187':'&#155' %}*/
/* 			{% set i = 0 %}*/
/* */
/* 			<div id="{{tag_id}}" class="so-extraslider {{cls_btn_page}} {{class_respl}} {{btn_type}}">*/
/* 			{% set nb_rows=5 %}*/
/* 				<!-- Begin extraslider-inner -->*/
/* 				<div class="extraslider-inner products-list grid" data-effect="none">*/
/* */
/* 					{% for i, manufacturer in manufacturers %}*/
/* 					*/
/* 						{% set i = i + 1 %}*/
/* 						*/
/* 						*/
/* 						<div class="item ">*/
/* 							<div class="item-wrap product-layout {{ products_style }} ">*/
/* 								<div class="item-wrap-inner product-item-container ">*/
/* 									<div class="left-block">*/
/* 										<div class="product-image-container">*/
/* 											<a class="lt-image" */
/* 												data-manufacturer='{{manufacturer.manufacturer_id}}' */
/* 											   	href="{{ manufacturer.href }}" */
/* 											   	{# target="_blank" 09.01.2023 #}*/
/* 											   	title="{{ manufacturer.name }}">*/
/* */
/* 											{% if manufacturer_image_num ==2 %}*/
/* 														<img data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ manufacturer.thumb }}" class="img-1 lazyload" alt="{{ manufacturer.nameFull }}">*/
/* 														<img data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ manufacturer.thumb2 }}" class="img-2 lazyload" alt="{{ manufacturer.nameFull }}">*/
/* 													{% else %}*/
/* 														<img data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ manufacturer.thumb }}" alt="{{ manufacturer.nameFull }}" class="lazyload">*/
/* 													{% endif %}*/
/* 											</a>*/
/* */
/* 										</div>*/
/* 									</div>									*/
/* 								*/
/* 										<!-- End item-info -->*/
/* 								</div>*/
/* 								<!-- End item-wrap-inner -->*/
/* 							</div>*/
/* 							<!-- End item-wrap -->*/
/* 						</div>*/
/* 						*/
/* */
/* 					{% endfor %}	 */
/* 				</div>*/
/* 				<!--End extraslider-inner -->*/
/*                 <div class="see-all-mans">*/
/*                     <div class="text-center">*/
/*                       <a href="{{ see_all_mans }}" class="see-all-mans-btn" > <!-- target="_blank" 09.01.2023 -->*/
/*                         Виж всички*/
/*                         </a>*/
/*                     </div>*/
/*                   </div>*/
/* 				<script type="text/javascript">*/
/* 				*/
/* 				//<![CDATA[*/
/* 				jQuery(document).ready(function ($) {*/
/* 					(function (element) {*/
/* 						var $element = $(element),*/
/* 								$extraslider = $(".extraslider-inner", $element),*/
/* 								_delay = 500 ,*/
/* 								_duration = 800 ,*/
/* 								_effect = 'none ';*/
/* */
/* 						$extraslider.on("initialized.owl.carousel2", function () {*/
/* 							var $item_active = $(".owl2-item.active", $element);*/
/* 							if ($item_active.length > 1 && _effect != "none") {*/
/* 								_getAnimate($item_active);*/
/* 							}*/
/* 							else {*/
/* 								var $item = $(".owl2-item", $element);*/
/* 								$item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});*/
/* 							}*/
/* 							*/
/* 							 */
/* 								$(".owl2-controls", $element).insertBefore($extraslider);*/
/* 								$(".owl2-dots", $element).insertAfter($(".owl2-prev", $element));*/
/* 							*/
/* 						});*/
/* */
/* 						$extraslider.owlCarousel2({*/
/* 							rtl: false,*/
/* 							center: false,*/
/* 							margin: 5,*/
/* 							slideBy: 1,*/
/* 							autoplay: 0,*/
/* 							autoplayHoverPause: 0,*/
/* 							autoplayTimeout: 0 ,*/
/* 							autoplaySpeed: 1000 ,*/
/* 							startPosition: 0 ,*/
/* 							mouseDrag: 1,*/
/* 							touchDrag: 1 ,*/
/* 							autoWidth: false,*/
/* 							responsive: {*/
/* 								0: 	{ items: 1 } ,*/
/* 								480: { items: 2 },*/
/* 								768: { items: 3 },*/
/* 								992: { items: 5 },*/
/* 								1200: {items: 5}*/
/* 							},*/
/* 							dotClass: "owl2-dot",*/
/* 							dotsClass: "owl2-dots",*/
/* 							dots: false ,*/
/* 							dotsSpeed:500 ,*/
/* 							nav: true ,*/
/* 							loop: true ,*/
/* 							navSpeed: 500 ,*/
/* 							navText: ["", ""],*/
/* 							navClass: ["owl2-prev", "owl2-next"]*/
/* */
/* 						});*/
/* */
/* 						$extraslider.on("translate.owl.carousel2", function (e) {							 */
/* */
/* 							var $item_active = $(".owl2-item.active", $element);*/
/* 							_UngetAnimate($item_active);*/
/* 							_getAnimate($item_active);*/
/* 						});*/
/* */
/* 						$extraslider.on("translated.owl.carousel2", function (e) {*/
/* */
/* 							 */
/* */
/* 							var $item_active = $(".owl2-item.active", $element);*/
/* 							var $item = $(".owl2-item", $element);*/
/* */
/* 							_UngetAnimate($item);*/
/* */
/* 							if ($item_active.length > 1 && _effect != "none") {*/
/* 								_getAnimate($item_active);*/
/* 							} else {*/
/* */
/* 								$item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});*/
/* */
/* 							}*/
/* 						});*/
/* */
/* 						function _getAnimate($el) {*/
/* 							if (_effect == "none") return;*/
/* 							//if ($.browser.msie && parseInt($.browser.version, 10) <= 9) return;*/
/* 							$extraslider.removeClass("extra-animate");*/
/* 							$el.each(function (i) {*/
/* 								var $_el = $(this);*/
/* 								$(this).css({*/
/* 									"-webkit-animation": _effect + " " + _duration + "ms ease both",*/
/* 									"-moz-animation": _effect + " " + _duration + "ms ease both",*/
/* 									"-o-animation": _effect + " " + _duration + "ms ease both",*/
/* 									"animation": _effect + " " + _duration + "ms ease both",*/
/* 									"-webkit-animation-delay": +i * _delay + "ms",*/
/* 									"-moz-animation-delay": +i * _delay + "ms",*/
/* 									"-o-animation-delay": +i * _delay + "ms",*/
/* 									"animation-delay": +i * _delay + "ms",*/
/* 									"opacity": 1*/
/* 								}).animate({*/
/* 									opacity: 1*/
/* 								});*/
/* */
/* 								if (i == $el.size() - 1) {*/
/* 									$extraslider.addClass("extra-animate");*/
/* 								}*/
/* 							});*/
/* 						}*/
/* */
/* 						function _UngetAnimate($el) {*/
/* 							$el.each(function (i) {*/
/* 								$(this).css({*/
/* 									"animation": "",*/
/* 									"-webkit-animation": "",*/
/* 									"-moz-animation": "",*/
/* 									"-o-animation": "",*/
/* 									"opacity": 1*/
/* 								});*/
/* 							});*/
/* 						}*/
/* */
/* 					})("#{{tag_id}}");*/
/* 				});*/
/* 				//]]>*/
/* 			*/
/* 			</script>*/
/* */
/* 			</div>*/
/* 		{% endif %}*/
/* 	*/
/* 	</div> */
/* 	{% if post_text|trim is not empty  %} */
/* 		<div class="viewall">*/
/* 			{{ post_text  }}*/
/* 		</div>*/
/* 	{% endif %}*/
/* */
/* </div>*/
