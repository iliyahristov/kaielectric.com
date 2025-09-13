<?php

/* so-revo/template/soconfig/subcategory.twig */
class __TwigTemplate_ee122a29e5a5a6785294c9fb610307da2ea4f6a6b9564892bf1a169ac4cf36fc extends Twig_Template
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
        // line 9
        $context["category_info"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "lstimg_cate_status"), "method");
        // line 10
        if ((isset($context["category_info"]) ? $context["category_info"] : null)) {
            // line 11
            echo "<ul class=\"breadcrumb\">
    ";
            // line 12
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
                // line 13
                echo "    <li><a href=\"";
                echo $this->getAttribute($context["breadcrumb"], "href", array());
                echo "\">";
                echo $this->getAttribute($context["breadcrumb"], "text", array());
                echo "</a></li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "  </ul>
\t<h1 class=\"title-category \">";
            // line 16
            echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
            echo "</h1> 
\t
\t";
            // line 19
            echo "\t";
            if (((isset($context["thumb"]) ? $context["thumb"] : null) || (isset($context["description"]) ? $context["description"] : null))) {
                // line 20
                echo "\t<div class=\"form-group category-info desc-collapse showdown\">
\t\t";
                // line 21
                $context["class_category_info"] = ((((isset($context["category_info"]) ? $context["category_info"] : null) == 2)) ? ("col-sm-9 col-xs-12") : ("col-sm-12 col-xs-12"));
                // line 22
                echo "\t\t<div class=\"row\">
\t\t\t";
                // line 23
                if (((isset($context["thumb"]) ? $context["thumb"] : null) && ((isset($context["category_info"]) ? $context["category_info"] : null) == 2))) {
                    // line 24
                    echo "\t\t\t\t<div class=\"img-cate col-sm-3 col-xs-12\"><img class=\"media-object lazyload\"  data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                    echo (isset($context["thumb"]) ? $context["thumb"] : null);
                    echo "\" alt=\"";
                    echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
                    echo "\" title=\"";
                    echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
                    echo "\" /></div>
\t\t\t";
                }
                // line 26
                echo "
\t\t\t";
                // line 27
                if ((isset($context["description"]) ? $context["description"] : null)) {
                    // line 28
                    echo "\t\t\t\t<div class=\"";
                    echo (isset($context["class_category_info"]) ? $context["class_category_info"] : null);
                    echo "\">";
                    echo (isset($context["description"]) ? $context["description"] : null);
                    echo "</div>
\t\t\t";
                }
                // line 30
                echo "\t\t</div>
\t</div>
\t<div class=\"button-toggle\">
\t\t\t<a class=\"showmore\" data-toggle=\"collapse\" href=\"#\" aria-expanded=\"false\" aria-controls=\"collapse-footer\">
\t\t\t<span class=\"toggle-more\">покажи <i class=\"fa fa-angle-down\"></i></span> 
\t\t\t<span class=\"toggle-less\">скрий <i class=\"fa fa-angle-up\"></i></span>           
\t\t</a>        
\t</div>
\t";
            }
        }
        // line 40
        echo "
";
        // line 42
        if (((isset($context["categories"]) ? $context["categories"] : null) && $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_catalog_refine"), "method"))) {
            // line 43
            echo "\t<div class=\"refine-search form-group clearfix\">
\t\t<h3 class=\"title-category\">";
            // line 44
            echo (isset($context["text_refine"]) ? $context["text_refine"] : null);
            echo "</h3>
\t\t<ul class=\"refine-search__content \">
\t\t";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 47
                echo "\t\t\t<li class=\"refine-search__subitem\">
\t\t\t\t";
                // line 48
                if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_catalog_refine"), "method") == 1)) {
                    // line 49
                    echo "\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["category"], "href", array());
                    echo "\" class=\"thumbnail\"><img class=\"lazyload\"  data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                    echo $this->getAttribute($context["category"], "thumb", array());
                    echo "\" alt=\"";
                    echo $this->getAttribute($context["category"], "name", array());
                    echo "\" /> </a>
\t\t\t\t";
                } else {
                    // line 51
                    echo "\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["category"], "href", array());
                    echo "\" class=\"thumbnail\"><img class=\"lazyload\"  data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                    echo $this->getAttribute($context["category"], "thumb", array());
                    echo "\" alt=\"";
                    echo $this->getAttribute($context["category"], "name", array());
                    echo "\" /> </a>
\t\t\t\t\t<a href=\"";
                    // line 52
                    echo $this->getAttribute($context["category"], "href", array());
                    echo "\" class=\"text-center\">";
                    echo $this->getAttribute($context["category"], "name", array());
                    echo "</a>
\t\t\t\t";
                }
                // line 54
                echo "\t\t\t</li>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            echo "\t\t</ul>
\t\t<script type=\"text/javascript\"><!--
\t\t\tcatalog_refine_number = ";
            // line 58
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "catalog_refine_number"), "method");
            echo ";
\t\t\tif(catalog_refine_number <= \$('.refine-search__content > li').length)
\t\t\t\$('.refine-search__content').append('<li class=\"refine-loadmore\"><i class=\"fa fa-plus\"></i> <span class=\"more-view\"> ";
            // line 60
            echo (isset($context["text_refine_more"]) ? $context["text_refine_more"] : null);
            echo " </span></li>');

\t\t\tvar show_catalog_refine_number = catalog_refine_number-1 ;
\t\t\t\$('ul.refine-search__content > li.refine-search__subitem').each(function(i){
\t\t\t\tif(i>show_catalog_refine_number){
\t\t\t\t\t\$(this).css('display', 'none');
\t\t\t\t}
\t\t\t});

\t\t\t\$(\"ul.refine-search__content .refine-loadmore\").click(function(){
\t\t\t\tif(\$(this).hasClass('open')){
\t\t\t\t\t\$('ul.refine-search__content li.refine-search__subitem').each(function(i){
\t\t\t\t\t\tif(i>show_catalog_refine_number){
\t\t\t\t\t\t\t\$(this).slideUp(200);
\t\t\t\t\t\t\t\$(this).css('display', 'none');
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t\t\$(this).removeClass('open');
\t\t\t\t\t\$('.refine-loadmore').html('<i class=\"fa fa-plus\"></i> <span class=\"more-view\">";
            // line 78
            echo (isset($context["text_refine_more"]) ? $context["text_refine_more"] : null);
            echo " </span>');

\t\t\t\t}else{
\t\t\t\t\t\$('ul.refine-search__content li.refine-search__subitem').each(function(i){
\t\t\t\t\t\tif(i>show_catalog_refine_number){
\t\t\t\t\t\t\t\$(this).slideDown(200);
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t\t\$(this).addClass('open');
\t\t\t\t\t\$('.refine-loadmore').html('<i class=\"fa fa-minus\"></i> <span class=\"more-view\">";
            // line 87
            echo (isset($context["text_refine_less"]) ? $context["text_refine_less"] : null);
            echo " </span>');
\t\t\t\t}
\t\t\t});
\t\t//--></script> 
\t\t
\t\t
\t</div>
";
        }
    }

    public function getTemplateName()
    {
        return "so-revo/template/soconfig/subcategory.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 87,  182 => 78,  161 => 60,  156 => 58,  152 => 56,  145 => 54,  138 => 52,  129 => 51,  119 => 49,  117 => 48,  114 => 47,  110 => 46,  105 => 44,  102 => 43,  100 => 42,  97 => 40,  85 => 30,  77 => 28,  75 => 27,  72 => 26,  62 => 24,  60 => 23,  57 => 22,  55 => 21,  52 => 20,  49 => 19,  44 => 16,  41 => 15,  30 => 13,  26 => 12,  23 => 11,  21 => 10,  19 => 9,);
    }
}
/* {#*/
/* ****************************************************** */
/*  * @package	SO Framework for Opencart 3.x*/
/*  * @author	http://www.opencartworks.com*/
/*  * @license	GNU General Public License*/
/*  * @copyright(C) 2008-2017 opencartworks.com. All rights reserved.*/
/*  *******************************************************/
/* #}*/
/* {% set category_info = soconfig.get_settings('lstimg_cate_status') %}*/
/* {% if category_info %}*/
/* <ul class="breadcrumb">*/
/*     {% for breadcrumb in breadcrumbs %}*/
/*     <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*     {% endfor %}*/
/*   </ul>*/
/* 	<h1 class="title-category ">{{heading_title}}</h1> */
/* 	*/
/* 	{#===== Show Description Category =======#}*/
/* 	{% if thumb or description %}*/
/* 	<div class="form-group category-info desc-collapse showdown">*/
/* 		{% set class_category_info = category_info == 2 ? 'col-sm-9 col-xs-12' : 'col-sm-12 col-xs-12' %}*/
/* 		<div class="row">*/
/* 			{% if thumb and category_info == 2 %}*/
/* 				<div class="img-cate col-sm-3 col-xs-12"><img class="media-object lazyload"  data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ thumb }}" alt="{{ heading_title }}" title="{{ heading_title }}" /></div>*/
/* 			{% endif %}*/
/* */
/* 			{% if description %}*/
/* 				<div class="{{class_category_info}}">{{ description }}</div>*/
/* 			{% endif %}*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="button-toggle">*/
/* 			<a class="showmore" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="collapse-footer">*/
/* 			<span class="toggle-more">покажи <i class="fa fa-angle-down"></i></span> */
/* 			<span class="toggle-less">скрий <i class="fa fa-angle-up"></i></span>           */
/* 		</a>        */
/* 	</div>*/
/* 	{% endif %}*/
/* {% endif %}*/
/* */
/* {#===== Show Sub Category =======#}*/
/* {% if categories and soconfig.get_settings('product_catalog_refine') %}*/
/* 	<div class="refine-search form-group clearfix">*/
/* 		<h3 class="title-category">{{ text_refine }}</h3>*/
/* 		<ul class="refine-search__content ">*/
/* 		{% for category in categories %}*/
/* 			<li class="refine-search__subitem">*/
/* 				{%if soconfig.get_settings('product_catalog_refine') == 1 %}*/
/* 					<a href="{{ category.href }}" class="thumbnail"><img class="lazyload"  data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{category.thumb}}" alt="{{ category.name }}" /> </a>*/
/* 				{% else %}*/
/* 					<a href="{{ category.href }}" class="thumbnail"><img class="lazyload"  data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{category.thumb}}" alt="{{ category.name }}" /> </a>*/
/* 					<a href="{{ category.href }}" class="text-center">{{ category.name }}</a>*/
/* 				{% endif %}*/
/* 			</li>*/
/* 		{% endfor %}*/
/* 		</ul>*/
/* 		<script type="text/javascript"><!--*/
/* 			catalog_refine_number = {{soconfig.get_settings('catalog_refine_number')}};*/
/* 			if(catalog_refine_number <= $('.refine-search__content > li').length)*/
/* 			$('.refine-search__content').append('<li class="refine-loadmore"><i class="fa fa-plus"></i> <span class="more-view"> {{text_refine_more}} </span></li>');*/
/* */
/* 			var show_catalog_refine_number = catalog_refine_number-1 ;*/
/* 			$('ul.refine-search__content > li.refine-search__subitem').each(function(i){*/
/* 				if(i>show_catalog_refine_number){*/
/* 					$(this).css('display', 'none');*/
/* 				}*/
/* 			});*/
/* */
/* 			$("ul.refine-search__content .refine-loadmore").click(function(){*/
/* 				if($(this).hasClass('open')){*/
/* 					$('ul.refine-search__content li.refine-search__subitem').each(function(i){*/
/* 						if(i>show_catalog_refine_number){*/
/* 							$(this).slideUp(200);*/
/* 							$(this).css('display', 'none');*/
/* 						}*/
/* 					});*/
/* 					$(this).removeClass('open');*/
/* 					$('.refine-loadmore').html('<i class="fa fa-plus"></i> <span class="more-view">{{text_refine_more}} </span>');*/
/* */
/* 				}else{*/
/* 					$('ul.refine-search__content li.refine-search__subitem').each(function(i){*/
/* 						if(i>show_catalog_refine_number){*/
/* 							$(this).slideDown(200);*/
/* 						}*/
/* 					});*/
/* 					$(this).addClass('open');*/
/* 					$('.refine-loadmore').html('<i class="fa fa-minus"></i> <span class="more-view">{{text_refine_less}} </span>');*/
/* 				}*/
/* 			});*/
/* 		//--></script> */
/* 		*/
/* 		*/
/* 	</div>*/
/* {% endif %}*/
/* */
