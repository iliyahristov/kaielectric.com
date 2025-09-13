<?php

/* listing.twig */
class __TwigTemplate_8e6196ffce2eb9a225b56c77084610709b30d7ec51dc8459d22284a00575486b extends Twig_Template
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
        // line 10
        if ((isset($context["url_thumbgallery"]) ? $context["url_thumbgallery"] : null)) {
            echo " ";
            $context["thumbgallery"] = (isset($context["url_thumbgallery"]) ? $context["url_thumbgallery"] : null);
        } else {
            // line 11
            echo " ";
            $context["thumbgallery"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "card_gallery"), "method");
        }
        // line 12
        echo "
";
        // line 13
        if ((isset($context["url_cartinfo"]) ? $context["url_cartinfo"] : null)) {
            echo " ";
            $context["cartinfo"] = (isset($context["url_cartinfo"]) ? $context["url_cartinfo"] : null);
        } else {
            // line 14
            echo " ";
            $context["cartinfo"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "desktop_addcart_position"), "method");
        }
        // line 15
        echo "
";
        // line 17
        echo "<div class=\"product-filter product-filter-top filters-panel\">
  <div class=\"row\">
\t\t<div class=\"col-sm-5 view-mode\">
\t\t\t";
        // line 20
        $context["category_route"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_route", array(), "method");
        // line 21
        echo "\t\t\t
\t\t\t";
        // line 22
        if ((((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null)) && ((isset($context["category_route"]) ? $context["category_route"] : null) == "product/category"))) {
            // line 23
            echo "\t\t\t\t";
            if ((isset($context["url_asideType"]) ? $context["url_asideType"] : null)) {
                echo " ";
                $context["btn_canvas"] = (isset($context["url_asideType"]) ? $context["url_asideType"] : null);
                // line 24
                echo "\t\t\t\t";
            } else {
                $context["btn_canvas"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "catalog_col_type"), "method");
                // line 25
                echo "\t\t\t\t";
            }
            // line 26
            echo "
\t\t\t\t";
            // line 27
            $context["class_btn_canvas"] = ((((isset($context["btn_canvas"]) ? $context["btn_canvas"] : null) == "off_canvas")) ? ("") : ("hidden-lg hidden-md"));
            // line 28
            echo "\t\t\t\t<a href=\"javascript:void(0)\" class=\"open-sidebar ";
            echo twig_escape_filter($this->env, (isset($context["class_btn_canvas"]) ? $context["class_btn_canvas"] : null), "html", null, true);
            echo "\"><i class=\"fa fa-bars\"></i>";
            echo twig_escape_filter($this->env, (isset($context["text_sidebar"]) ? $context["text_sidebar"] : null), "html", null, true);
            echo "</a>
\t\t\t\t<div class=\"sidebar-overlay \"></div>
\t\t\t";
        }
        // line 31
        echo "\t\t\t
\t\t</div>
\t
\t\t<div class=\"short-by-show form-inline text-right col-md-12 col-sm-12 col-xs-12\">
\t\t\t<div class=\"form-group short-by\">
\t\t\t\t<label class=\"control-label\" for=\"input-sort\">";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["text_sort"]) ? $context["text_sort"] : null), "html", null, true);
        echo "</label>
\t\t\t\t<select id=\"input-sort\" class=\"form-control\">
\t\t\t\t\t
\t\t\t\t\t";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["sorts"]);
        foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
            echo "\t\t\t\t\t
\t\t\t\t\t\t<option value=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($context["sorts"], "value", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["sorts"], "text", array()), "html", null, true);
            echo "</option>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sorts'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "\t\t\t\t
\t\t\t\t</select>
\t\t\t</div>\t\t\t
\t\t</div>\t
\t\t<div class=\"kai-selected-filters\">
\t\t\t<p class=\"kai-p-selected hidden-p-filter\">Цена от <span class=\"kai-min-pr\"></span> до <span class=\"kai-max-pr\"></span> лв.
        \t\t<a data-tf-reset=\"price\" data-toggle=\"tooltip\" title=\"";
        // line 48
        echo twig_escape_filter($this->env, (isset($context["text_reset"]) ? $context["text_reset"] : null), "html", null, true);
        echo "\" class=\"tf-filter-reset\"><i class=\"fa fa-close\"></i></a>
        \t</p>
\t\t</div>
\t\t <input type=\"hidden\" id=\"total-products\" value = ";
        // line 51
        echo twig_escape_filter($this->env, (isset($context["total"]) ? $context["total"] : null), "html", null, true);
        echo ">
  </div>
</div>

";
        // line 56
        echo "
<div class=\"products-list row nopadding-xs\">
\t";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 59
            echo "\t
\t\t<div class=\"product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12\" data-page=\"1\">
\t\t\t<div class=\"product-item-container\">
\t\t\t\t";
            // line 63
            echo "\t\t\t\t";
            if (((isset($context["cartinfo"]) ? $context["cartinfo"] : null) == "right")) {
                // line 64
                echo "\t\t\t\t\t";
                $context["class_cart_info"] = "cartinfo--right";
                // line 65
                echo "\t\t\t\t";
            } elseif (((isset($context["cartinfo"]) ? $context["cartinfo"] : null) == "bottom")) {
                // line 66
                echo "\t\t\t\t\t";
                $context["class_cart_info"] = "cartinfo--static";
                // line 67
                echo "\t\t\t\t\t";
                $context["leftb"] = "left-b";
                // line 68
                echo "\t\t\t\t\t";
                $context["rightb"] = "right-b";
                // line 69
                echo "\t\t\t\t";
            } elseif (((isset($context["cartinfo"]) ? $context["cartinfo"] : null) == "center")) {
                // line 70
                echo "\t\t\t\t\t";
                $context["class_cart_info"] = "cartinfo--center";
                // line 71
                echo "\t\t\t\t";
            } else {
                // line 72
                echo "\t\t\t\t\t";
                $context["class_cart_info"] = "cartinfo--left";
                // line 73
                echo "\t\t\t\t";
            }
            // line 74
            echo "\t\t\t\t<div class=\"left-block ";
            echo twig_escape_filter($this->env, (isset($context["leftb"]) ? $context["leftb"] : null), "html", null, true);
            echo "\">
\t\t\t\t\t";
            // line 75
            if (((isset($context["thumbgallery"]) ? $context["thumbgallery"] : null) && $this->getAttribute($context["product"], "image_galleries", array()))) {
                // line 76
                echo "
\t\t\t\t\t";
                // line 77
                if (((isset($context["thumbgallery"]) ? $context["thumbgallery"] : null) == 1)) {
                    // line 78
                    echo "\t\t\t\t\t\t";
                    $context["class_thumbgallery"] = "product-card__left";
                    // line 79
                    echo "\t\t\t\t\t";
                } elseif (((isset($context["thumbgallery"]) ? $context["thumbgallery"] : null) == 2)) {
                    // line 80
                    echo "\t\t\t\t\t\t";
                    $context["class_thumbgallery"] = "product-card__right";
                    // line 81
                    echo "\t\t\t\t\t";
                } else {
                    // line 82
                    echo "\t\t\t\t\t\t";
                    $context["class_thumbgallery"] = "product-card__bottom";
                    // line 83
                    echo "\t\t\t\t\t";
                }
                // line 84
                echo "\t\t\t\t\t<div class=\"product-card__gallery ";
                echo twig_escape_filter($this->env, (isset($context["class_thumbgallery"]) ? $context["class_thumbgallery"] : null), "html", null, true);
                echo "\">
\t\t\t\t\t\t    <div class=\"item-img thumb-active\" data-src=\"";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product"], "first_gallery", array()), "thumb", array(), "array"), "html", null, true);
                echo "\"><img class=\"lazyload\" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product"], "first_gallery", array()), "cart", array(), "array"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                echo "\"></div>
\t\t\t\t\t\t\t";
                // line 86
                $context["total_gallery"] = 2;
                // line 87
                echo "\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["product"], "image_galleries", array()));
                foreach ($context['_seq'] as $context["number_gallery"] => $context["image_gallery"]) {
                    // line 88
                    echo "\t\t\t\t\t\t\t\t";
                    if (($context["number_gallery"] < (isset($context["total_gallery"]) ? $context["total_gallery"] : null))) {
                        // line 89
                        echo "\t\t\t\t\t\t\t\t<div class=\"item-img\" data-src=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["image_gallery"], "thumb", array()), "html", null, true);
                        echo "\"><img class=\"lazyload \" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["image_gallery"], "cart", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                        echo "\"></div>
\t\t\t\t\t\t\t\t";
                    }
                    // line 91
                    echo "\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['number_gallery'], $context['image_gallery'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 92
                echo "\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 94
            echo "
\t\t\t\t\t<div class=\"product-image-container\">
\t\t\t\t\t
\t\t\t\t\t\t<a href=\"";
            // line 97
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "href", array()), "html", null, true);
            echo " \" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
            echo " \" > <!-- target=\"_blank\" 09.01.2023 -->
\t\t\t\t\t\t\t<img  data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "thumb", array()), "html", null, true);
            echo "\"  title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
            echo "\" class=\"lazyload img-responsive\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
            echo "\"/>
\t\t\t\t\t\t\t
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t";
            // line 104
            echo "\t\t\t\t\t";
            if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "countdown_status"), "method") && $this->getAttribute($context["product"], "special_end_date", array()))) {
                // line 105
                echo "\t\t\t\t\t
\t\t\t\t\t\t";
                // line 106
                $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/soconfig/countdown.twig"), "listing.twig", 106)->display(array_merge($context, array("product" => $context["product"], "special_end_date" => $this->getAttribute($context["product"], "special_end_date", array()))));
                // line 107
                echo "\t\t\t\t\t
\t\t\t\t\t";
            }
            // line 109
            echo "\t\t\t\t\t
\t\t\t\t\t";
            // line 110
            if (($this->getAttribute($context["product"], "price", array()) && $this->getAttribute($context["product"], "special", array()))) {
                echo " 
\t\t\t\t\t<div class=\"box-label\">
\t\t\t\t\t\t";
                // line 113
                echo "\t\t\t\t\t\t";
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "discount_status"), "method")) {
                    echo " 
\t\t\t\t\t\t\t<span class=\"label-product label-sale\">
\t\t\t\t\t\t\t\t ";
                    // line 115
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "discount", array()), "html", null, true);
                    echo "
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t";
                }
                // line 117
                echo " 
\t\t\t\t\t\t
\t\t\t\t\t</div> 
\t\t\t\t\t";
            }
            // line 120
            echo " 
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"right-block ";
            // line 123
            echo twig_escape_filter($this->env, (isset($context["rightb"]) ? $context["rightb"] : null), "html", null, true);
            echo "\">
\t\t\t\t\t<h4><a href=\"";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "href", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
            echo " </a></h4>  <!-- target=\"_blank\" 09.01.2023 -->
\t\t\t\t\t<div class=\"rate-history\">
\t\t\t\t\t\t";
            // line 126
            if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "rating_status"), "method")) {
                echo " 
\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t";
                // line 129
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 130
                    echo "\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["product"], "rating", array()) < $context["i"])) {
                        echo " 
\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-1x\"></i></span>
\t\t\t\t\t\t\t";
                    } else {
                        // line 132
                        echo "   
\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-1x\"></i><i class=\"fa fa-star-o fa-stack-1x\"></i></span>
\t\t\t\t\t\t\t";
                    }
                    // line 134
                    echo " 
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 136
                echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a class=\"rating-num\"  href=\"";
                // line 138
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "href", array()), "html", null, true);
                echo "\" rel=\"nofollow\" >";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "reviews", array()), "html", null, true);
                echo "</a>  <!-- target=\"_blank\" 09.01.2023 -->
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            // line 141
            echo "\t\t\t\t\t\t
\t\t\t\t\t</div>

\t\t\t\t\t
\t\t\t\t\t";
            // line 145
            if ($this->getAttribute($context["product"], "price", array())) {
                echo " 
\t\t\t\t\t<div class=\"price\">
\t\t\t\t\t\t";
                // line 147
                if ( !$this->getAttribute($context["product"], "special", array())) {
                    echo " 
\t\t\t\t\t\t\t<span class=\"price-new\">";
                    // line 148
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
                    echo " </span>
\t\t\t\t\t\t";
                } else {
                    // line 149
                    echo "   
\t\t\t\t\t\t\t<span class=\"price-new\">";
                    // line 150
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "special", array()), "html", null, true);
                    echo " </span> <span class=\"price-old\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
                    echo " </span>
\t\t\t\t\t\t";
                }
                // line 151
                echo " 
\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 154
            echo "\t\t\t\t\t
\t\t\t\t\t<div class=\"description\">
\t\t\t\t\t\t<p>";
            // line 156
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "description", array()), "html", null, true);
            echo " </p>
\t\t\t\t\t</div>
\t\t\t\t</div>\t\t\t\t
\t\t\t</div>
\t\t</div>
\t\t";
            // line 162
            echo "\t
\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 164
        echo "\t
</div>


";
    }

    public function getTemplateName()
    {
        return "listing.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  443 => 164,  428 => 162,  420 => 156,  416 => 154,  411 => 151,  404 => 150,  401 => 149,  396 => 148,  392 => 147,  387 => 145,  381 => 141,  373 => 138,  369 => 136,  362 => 134,  357 => 132,  350 => 130,  346 => 129,  340 => 126,  333 => 124,  329 => 123,  324 => 120,  318 => 117,  312 => 115,  306 => 113,  301 => 110,  298 => 109,  294 => 107,  292 => 106,  289 => 105,  286 => 104,  274 => 98,  268 => 97,  263 => 94,  259 => 92,  253 => 91,  243 => 89,  240 => 88,  235 => 87,  233 => 86,  225 => 85,  220 => 84,  217 => 83,  214 => 82,  211 => 81,  208 => 80,  205 => 79,  202 => 78,  200 => 77,  197 => 76,  195 => 75,  190 => 74,  187 => 73,  184 => 72,  181 => 71,  178 => 70,  175 => 69,  172 => 68,  169 => 67,  166 => 66,  163 => 65,  160 => 64,  157 => 63,  152 => 59,  135 => 58,  131 => 56,  124 => 51,  118 => 48,  110 => 42,  100 => 40,  94 => 39,  88 => 36,  81 => 31,  72 => 28,  70 => 27,  67 => 26,  64 => 25,  60 => 24,  55 => 23,  53 => 22,  50 => 21,  48 => 20,  43 => 17,  40 => 15,  36 => 14,  31 => 13,  28 => 12,  24 => 11,  19 => 10,);
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
/* {#====  Variables url parameter ==== #}*/
/* {% if url_thumbgallery %} {% set thumbgallery = url_thumbgallery %}*/
/* {% else %} {% set thumbgallery = soconfig.get_settings('card_gallery') %}{% endif %}*/
/* */
/* {% if url_cartinfo %} {% set cartinfo = url_cartinfo %}*/
/* {% else %} {% set cartinfo = soconfig.get_settings('desktop_addcart_position') %}{% endif %}*/
/* */
/* {#==== filters panel Top==== #}*/
/* <div class="product-filter product-filter-top filters-panel">*/
/*   <div class="row">*/
/* 		<div class="col-sm-5 view-mode">*/
/* 			{% set category_route = soconfig.get_route() %}*/
/* 			*/
/* 			{% if (column_left or column_right ) and category_route =='product/category' %}*/
/* 				{% if url_asideType %} {% set btn_canvas = url_asideType %}*/
/* 				{% else %}{% set btn_canvas = soconfig.get_settings('catalog_col_type') %}*/
/* 				{% endif %}*/
/* */
/* 				{% set class_btn_canvas = (btn_canvas =='off_canvas') ? '' : 'hidden-lg hidden-md' %}*/
/* 				<a href="javascript:void(0)" class="open-sidebar {{class_btn_canvas}}"><i class="fa fa-bars"></i>{{ text_sidebar }}</a>*/
/* 				<div class="sidebar-overlay "></div>*/
/* 			{% endif %}*/
/* 			*/
/* 		</div>*/
/* 	*/
/* 		<div class="short-by-show form-inline text-right col-md-12 col-sm-12 col-xs-12">*/
/* 			<div class="form-group short-by">*/
/* 				<label class="control-label" for="input-sort">{{ text_sort }}</label>*/
/* 				<select id="input-sort" class="form-control">*/
/* 					*/
/* 					{% for sorts in sorts %}					*/
/* 						<option value="{{ sorts.value }}">{{ sorts.text }}</option>*/
/* 					{% endfor %}*/
/* 				*/
/* 				</select>*/
/* 			</div>			*/
/* 		</div>	*/
/* 		<div class="kai-selected-filters">*/
/* 			<p class="kai-p-selected hidden-p-filter">Цена от <span class="kai-min-pr"></span> до <span class="kai-max-pr"></span> лв.*/
/*         		<a data-tf-reset="price" data-toggle="tooltip" title="{{ text_reset }}" class="tf-filter-reset"><i class="fa fa-close"></i></a>*/
/*         	</p>*/
/* 		</div>*/
/* 		 <input type="hidden" id="total-products" value = {{ total }}>*/
/*   </div>*/
/* </div>*/
/* */
/* {#==== Product Grid ==== #}*/
/* */
/* <div class="products-list row nopadding-xs">*/
/* 	{% for  product in products %}*/
/* 	*/
/* 		<div class="product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12" data-page="1">*/
/* 			<div class="product-item-container">*/
/* 				{#=======Show Group_cart_info ======= #}*/
/* 				{% if cartinfo == 'right' %}*/
/* 					{% set class_cart_info = 'cartinfo--right' %}*/
/* 				{% elseif cartinfo == 'bottom' %}*/
/* 					{% set class_cart_info = 'cartinfo--static' %}*/
/* 					{% set leftb = 'left-b' %}*/
/* 					{% set rightb = 'right-b' %}*/
/* 				{% elseif cartinfo == 'center' %}*/
/* 					{% set class_cart_info = 'cartinfo--center' %}*/
/* 				{% else %}*/
/* 					{% set class_cart_info = 'cartinfo--left' %}*/
/* 				{% endif %}*/
/* 				<div class="left-block {{ leftb }}">*/
/* 					{% if thumbgallery   and product.image_galleries %}*/
/* */
/* 					{% if thumbgallery == 1 %}*/
/* 						{% set  class_thumbgallery = 'product-card__left' %}*/
/* 					{% elseif thumbgallery == 2 %}*/
/* 						{% set  class_thumbgallery = 'product-card__right' %}*/
/* 					{% else %}*/
/* 						{% set  class_thumbgallery = 'product-card__bottom' %}*/
/* 					{% endif %}*/
/* 					<div class="product-card__gallery {{class_thumbgallery}}">*/
/* 						    <div class="item-img thumb-active" data-src="{{product.first_gallery['thumb']}}"><img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{product.first_gallery['cart']}}" alt="{{ product.name }}"></div>*/
/* 							{% set total_gallery = 2 %}*/
/* 							{% for number_gallery,image_gallery in product.image_galleries %}*/
/* 								{% if number_gallery < total_gallery %}*/
/* 								<div class="item-img" data-src="{{image_gallery.thumb}}"><img class="lazyload " data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{image_gallery.cart}}" alt="{{ product.name }}"></div>*/
/* 								{% endif %}*/
/* 							{% endfor %}*/
/* 					</div>*/
/* 					{% endif %}*/
/* */
/* 					<div class="product-image-container">*/
/* 					*/
/* 						<a href="{{ product.href }} " title="{{ product.name }} " > <!-- target="_blank" 09.01.2023 -->*/
/* 							<img  data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ product.thumb }}"  title="{{ product.name }}" class="lazyload img-responsive" alt="{{ product.name }}"/>*/
/* 							*/
/* 						</a>*/
/* 					</div>*/
/* 					*/
/* 					{#===== Show CountDown Product =======#}*/
/* 					{% if soconfig.get_settings('countdown_status') and product.special_end_date %}*/
/* 					*/
/* 						{% include theme_directory~'/template/soconfig/countdown.twig' with {product: product,special_end_date:product.special_end_date} %}*/
/* 					*/
/* 					{% endif %}*/
/* 					*/
/* 					{% if product.price  and  product.special  %} */
/* 					<div class="box-label">*/
/* 						{#=======Discount Label======= #}*/
/* 						{% if soconfig.get_settings('discount_status')  %} */
/* 							<span class="label-product label-sale">*/
/* 								 {{ product.discount }}*/
/* 							</span>*/
/* 						{% endif %} */
/* 						*/
/* 					</div> */
/* 					{% endif %} */
/* 				</div>*/
/* 				*/
/* 				<div class="right-block {{ rightb }}">*/
/* 					<h4><a href="{{ product.href }}">{{ product.name }} </a></h4>  <!-- target="_blank" 09.01.2023 -->*/
/* 					<div class="rate-history">*/
/* 						{% if soconfig.get_settings('rating_status') %} */
/* 						<div class="ratings">*/
/* 							<div class="rating-box">*/
/* 							{% for i in 1..5 %}*/
/* 							{% if product.rating < i %} */
/* 								<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>*/
/* 							{% else %}   */
/* 								<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>*/
/* 							{% endif %} */
/* 							{% endfor %}*/
/* */
/* 							</div>*/
/* 							<a class="rating-num"  href="{{ product.href }}" rel="nofollow" >{{product.reviews}}</a>  <!-- target="_blank" 09.01.2023 -->*/
/* 						</div>*/
/* 						{% endif %}*/
/* 						*/
/* 					</div>*/
/* */
/* 					*/
/* 					{% if product.price %} */
/* 					<div class="price">*/
/* 						{% if not product.special %} */
/* 							<span class="price-new">{{ product.price }} </span>*/
/* 						{% else %}   */
/* 							<span class="price-new">{{ product.special }} </span> <span class="price-old">{{ product.price }} </span>*/
/* 						{% endif %} */
/* 					</div>*/
/* 					{% endif %}*/
/* 					*/
/* 					<div class="description">*/
/* 						<p>{{ product.description }} </p>*/
/* 					</div>*/
/* 				</div>				*/
/* 			</div>*/
/* 		</div>*/
/* 		{# ====End Clearfix fluid grid layout =======#}*/
/* 	*/
/* 	{% endfor %}*/
/* 	*/
/* </div>*/
/* */
/* */
/* */
