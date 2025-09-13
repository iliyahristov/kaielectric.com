<?php

/* so-revo/template/soconfig/related_product.twig */
class __TwigTemplate_4f932dc7409b6930a952e7e44129e48959def6bd8fc64504e226bb9d84340b41 extends Twig_Template
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
        $context["related_col_lg"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_related_column_lg"), "method");
        // line 18
        $context["related_col_md"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_related_column_md"), "method");
        // line 19
        $context["related_col_sm"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_related_column_sm"), "method");
        // line 20
        $context["related_col_xs"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_related_column_xs"), "method");
        // line 21
        echo "
<div class=\"clearfix module related-horizontal \">
\t<h3 class=\"modtitle hidden\"><span>";
        // line 23
        echo (isset($context["text_related_module_name"]) ? $context["text_related_module_name"] : null);
        echo " </span></h3>
\t
    <div class=\"related-products products-list  contentslider\" data-rtl=\"";
        // line 25
        echo (isset($context["direction"]) ? $context["direction"] : null);
        echo "\" data-autoplay=\"no\"  data-pagination=\"no\" data-delay=\"4\" data-speed=\"0.6\" data-margin=\"30\"  data-items_column0=\"";
        echo (isset($context["related_col_lg"]) ? $context["related_col_lg"] : null);
        echo "\" data-items_column1=\"";
        echo (isset($context["related_col_md"]) ? $context["related_col_md"] : null);
        echo "\" data-items_column2=\"";
        echo (isset($context["related_col_sm"]) ? $context["related_col_sm"] : null);
        echo "\"
\t\t\tdata-items_column3=\"";
        // line 26
        echo (isset($context["related_col_xs"]) ? $context["related_col_xs"] : null);
        echo "\" data-items_column4=\"1\" data-arrows=\"yes\" data-lazyload=\"yes\" data-loop=\"no\" data-hoverpause=\"yes\">
\t\t<!-- Products list -->
\t\t";
        // line 28
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
            echo " 
            <div class=\"product-layout product-grid\">
\t\t\t<div class=\"product-item-container\">
\t\t\t\t";
            // line 32
            echo "\t\t\t\t";
            if (((isset($context["cartinfo"]) ? $context["cartinfo"] : null) == "right")) {
                // line 33
                echo "\t\t\t\t\t";
                $context["class_cart_info"] = "cartinfo--right";
                // line 34
                echo "\t\t\t\t";
            } elseif (((isset($context["cartinfo"]) ? $context["cartinfo"] : null) == "bottom")) {
                // line 35
                echo "\t\t\t\t\t";
                $context["class_cart_info"] = "cartinfo--static";
                // line 36
                echo "\t\t\t\t\t";
                $context["leftb"] = "left-b";
                // line 37
                echo "\t\t\t\t\t";
                $context["rightb"] = "right-b";
                // line 38
                echo "\t\t\t\t";
            } elseif (((isset($context["cartinfo"]) ? $context["cartinfo"] : null) == "center")) {
                // line 39
                echo "\t\t\t\t\t";
                $context["class_cart_info"] = "cartinfo--center";
                // line 40
                echo "\t\t\t\t";
            } else {
                // line 41
                echo "\t\t\t\t\t";
                $context["class_cart_info"] = "cartinfo--left";
                // line 42
                echo "\t\t\t\t";
            }
            // line 43
            echo "\t\t\t\t<div class=\"left-block ";
            echo (isset($context["leftb"]) ? $context["leftb"] : null);
            echo "\">
\t\t\t\t\t
\t\t\t\t\t<div class=\"product-image-container\">
\t\t\t\t\t
\t\t\t\t\t\t<a href=\"";
            // line 47
            echo $this->getAttribute($context["product"], "href", array());
            echo " \" title=\"";
            echo $this->getAttribute($context["product"], "name", array());
            echo " \" target=\"_blank\">
\t\t\t\t\t\t\t\t<img data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
            // line 48
            echo $this->getAttribute($context["product"], "thumb", array());
            echo " \"  title=\"";
            echo $this->getAttribute($context["product"], "name", array());
            echo "\" 
\t\t\t\t\t\t\t\tclass=\"lazyload img-responsive\" alt=\"";
            // line 49
            echo $this->getAttribute($context["product"], "name", array());
            echo "\"/>
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t";
            // line 54
            echo "\t\t\t\t\t";
            if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "countdown_status"), "method") && $this->getAttribute($context["product"], "special_end_date", array()))) {
                // line 55
                echo "\t\t\t\t\t
\t\t\t\t\t\t";
                // line 56
                $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/soconfig/countdown.twig"), "so-revo/template/soconfig/related_product.twig", 56)->display(array_merge($context, array("product" => $context["product"], "special_end_date" => $this->getAttribute($context["product"], "special_end_date", array()))));
                // line 57
                echo "\t\t\t\t\t
\t\t\t\t\t";
            }
            // line 59
            echo "\t\t\t\t\t
\t\t\t\t\t";
            // line 60
            if (($this->getAttribute($context["product"], "quantity", array()) == 0)) {
                // line 61
                echo "\t\t\t\t\t\t<div class=\"label-stock label label-success \">";
                echo $this->getAttribute($context["product"], "stock_status", array());
                echo "</div> 
\t\t\t\t\t";
            }
            // line 63
            echo "\t\t\t\t\t
\t\t\t\t\t";
            // line 64
            if (($this->getAttribute($context["product"], "price", array()) && $this->getAttribute($context["product"], "special", array()))) {
                echo " 
\t\t\t\t\t<div class=\"box-label\">
\t\t\t\t\t\t";
                // line 67
                echo "\t\t\t\t\t\t";
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "discount_status"), "method")) {
                    echo " 
\t\t\t\t\t\t\t<span class=\"label-product label-sale\">
\t\t\t\t\t\t\t\t ";
                    // line 69
                    echo $this->getAttribute($context["product"], "discount", array());
                    echo "
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t";
                }
                // line 71
                echo " 
\t\t\t\t\t\t
\t\t\t\t\t</div> 
\t\t\t\t\t";
            }
            // line 74
            echo " 

\t\t\t\t\t
\t\t\t\t\t";
            // line 77
            if (((isset($context["cartinfo"]) ? $context["cartinfo"] : null) != "bottom")) {
                // line 78
                echo "\t\t\t\t\t<div class=\"button-group ";
                echo (isset($context["class_cart_info"]) ? $context["class_cart_info"] : null);
                echo "\">
\t\t\t\t\t\t";
                // line 79
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "desktop_addcart_status"), "method")) {
                    // line 80
                    echo "\t\t\t\t\t\t<button class=\"addToCart  btn-button\" type=\"button\" title=\"";
                    echo (isset($context["button_cart"]) ? $context["button_cart"] : null);
                    echo "\" onclick=\"cart.add('";
                    echo $this->getAttribute($context["product"], "product_id", array());
                    echo "', '";
                    echo $this->getAttribute($context["product"], "minimum", array());
                    echo "');\">\t\t\t\t\t\t
\t\t\t\t\t\t\t<i class=\"fa fa-shopping-cart\"></i><span>";
                    // line 81
                    echo (isset($context["button_cart"]) ? $context["button_cart"] : null);
                    echo "</span>
\t\t\t\t\t\t</button>
\t\t\t\t\t\t";
                }
                // line 84
                echo "\t\t\t\t\t\t";
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "desktop_wishlist_status"), "method")) {
                    // line 85
                    echo "\t\t\t\t\t\t<button class=\"wishlist btn-button\" type=\"button\" title=\"";
                    echo (isset($context["button_wishlist"]) ? $context["button_wishlist"] : null);
                    echo "\" onclick=\"wishlist.add('";
                    echo $this->getAttribute($context["product"], "product_id", array());
                    echo "');\"><i class=\"fa fa-heart\"></i><span>";
                    echo (isset($context["button_wishlist"]) ? $context["button_wishlist"] : null);
                    echo "</span></button>
\t\t\t\t\t\t";
                }
                // line 86
                echo " 

\t\t\t\t\t\t";
                // line 88
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "desktop_Compare_status"), "method")) {
                    // line 89
                    echo "\t\t\t\t\t\t<button class=\"compare btn-button\" type=\"button\" title=\"";
                    echo (isset($context["button_compare"]) ? $context["button_compare"] : null);
                    echo "\" onclick=\"compare.add('";
                    echo $this->getAttribute($context["product"], "product_id", array());
                    echo "');\"><i class=\"fa fa-random\"></i><span>";
                    echo (isset($context["button_compare"]) ? $context["button_compare"] : null);
                    echo "</span></button>
\t\t\t\t\t\t";
                }
                // line 90
                echo " 

\t\t\t\t\t\t";
                // line 92
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "quick_status"), "method")) {
                    // line 93
                    echo "\t\t\t\t\t\t\t<a class=\"quickview iframe-link visible-lg btn-button\" data-toggle=\"tooltip\" title=\"";
                    echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "text_quickview"), "method");
                    echo " \" data-fancybox-type=\"iframe\"  href=\"";
                    echo $this->getAttribute((isset($context["our_url"]) ? $context["our_url"] : null), "link", array(0 => "extension/soconfig/quickview", 1 => ("product_id=" . $this->getAttribute($context["product"], "product_id", array()))), "method");
                    echo "\"> <i class=\"fa fa-eye\"></i> <span>";
                    echo (isset($context["text_quickview"]) ? $context["text_quickview"] : null);
                    echo "</span></a>
\t\t\t\t\t\t";
                }
                // line 94
                echo " 
\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 97
            echo "\t\t\t\t\t";
            if (((isset($context["cartinfo"]) ? $context["cartinfo"] : null) == "bottom")) {
                // line 98
                echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
                // line 99
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "quick_status"), "method")) {
                    // line 100
                    echo "\t\t\t\t\t\t\t\t\t<a class=\"quickview iframe-link visible-lg btn-button\" data-toggle=\"tooltip\" title=\"";
                    echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "text_quickview"), "method");
                    echo " \" data-fancybox-type=\"iframe\"  href=\"";
                    echo $this->getAttribute((isset($context["our_url"]) ? $context["our_url"] : null), "link", array(0 => "extension/soconfig/quickview", 1 => ("product_id=" . $this->getAttribute($context["product"], "product_id", array()))), "method");
                    echo "\"> <i class=\"fa fa-eye\"></i> </a>
\t\t\t\t\t\t";
                }
                // line 101
                echo " 
\t\t\t\t\t";
            }
            // line 102
            echo " 
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"right-block ";
            // line 105
            echo (isset($context["rightb"]) ? $context["rightb"] : null);
            echo "\">
\t\t\t\t\t<h4><a href=\"";
            // line 106
            echo $this->getAttribute($context["product"], "href", array());
            echo "\" target=\"_blank\">";
            echo $this->getAttribute($context["product"], "name", array());
            echo " </a></h4>
\t\t\t\t\t<div class=\"rate-history\">
\t\t\t\t\t\t";
            // line 108
            if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "rating_status"), "method")) {
                echo " 
\t\t\t\t\t\t<div class=\"ratings\">
\t\t\t\t\t\t\t<div class=\"rating-box\">
\t\t\t\t\t\t\t";
                // line 111
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 112
                    echo "\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["product"], "rating", array()) < $context["i"])) {
                        echo " 
\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-1x\"></i></span>
\t\t\t\t\t\t\t";
                    } else {
                        // line 114
                        echo "   
\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-1x\"></i><i class=\"fa fa-star-o fa-stack-1x\"></i></span>
\t\t\t\t\t\t\t";
                    }
                    // line 116
                    echo " 
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 118
                echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a class=\"rating-num\"  href=\"";
                // line 120
                echo $this->getAttribute($context["product"], "href", array());
                echo "\" rel=\"nofollow\" target=\"_blank\" >";
                echo $this->getAttribute($context["product"], "reviews", array());
                echo "</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            // line 123
            echo "
\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t\t\t</div>

\t\t\t\t\t
\t\t\t\t\t";
            // line 129
            if ($this->getAttribute($context["product"], "price", array())) {
                echo " 
\t\t\t\t\t<div class=\"price\">
\t\t\t\t\t\t";
                // line 131
                if ( !$this->getAttribute($context["product"], "special", array())) {
                    echo " 
\t\t\t\t\t\t\t<span class=\"price-new\">";
                    // line 132
                    echo $this->getAttribute($context["product"], "price", array());
                    echo " </span>
\t\t\t\t\t\t";
                } else {
                    // line 133
                    echo "   
\t\t\t\t\t\t\t<span class=\"price-new\">";
                    // line 134
                    echo $this->getAttribute($context["product"], "special", array());
                    echo " </span> <span class=\"price-old\">";
                    echo $this->getAttribute($context["product"], "price", array());
                    echo " </span>
\t\t\t\t\t\t";
                }
                // line 135
                echo " 
\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            // line 138
            echo "\t\t\t\t\t
\t\t\t\t\t<div class=\"description\">
\t\t\t\t\t\t<p>";
            // line 140
            echo $this->getAttribute($context["product"], "description", array());
            echo " </p>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t
\t\t\t\t\t
\t\t\t\t</div>

\t\t\t\t";
            // line 147
            if ((($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "desktop_addcart_status"), "method") || $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "desktop_wishlist_status"), "method")) || $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "desktop_Compare_status"), "method"))) {
                // line 148
                echo "\t\t\t\t<div class=\"list-block\">

\t\t\t\t\t";
                // line 150
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "desktop_addcart_status"), "method")) {
                    // line 151
                    echo "\t\t\t\t\t<button class=\"addToCart btn-button\" type=\"button\" title=\"";
                    echo (isset($context["button_cart"]) ? $context["button_cart"] : null);
                    echo "\" onclick=\"cart.add('";
                    echo $this->getAttribute($context["product"], "product_id", array());
                    echo "', '";
                    echo $this->getAttribute($context["product"], "minimum", array());
                    echo "');\"><i class=\"fa fa-shopping-cart\"></i></button>
\t\t\t\t\t";
                }
                // line 152
                echo " 

\t\t\t\t\t";
                // line 154
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "desktop_wishlist_status"), "method")) {
                    // line 155
                    echo "\t\t\t\t\t<button class=\"wishlist btn-button\" type=\"button\" title=\"";
                    echo (isset($context["button_wishlist"]) ? $context["button_wishlist"] : null);
                    echo "\" onclick=\"wishlist.add('";
                    echo $this->getAttribute($context["product"], "product_id", array());
                    echo "');\"><i class=\"fa fa-heart-o\"></i></button>
\t\t\t\t\t";
                }
                // line 156
                echo " 

\t\t\t\t\t";
                // line 158
                if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "desktop_Compare_status"), "method")) {
                    // line 159
                    echo "\t\t\t\t\t<button class=\"compare btn-button\" type=\"button\" title=\"";
                    echo (isset($context["button_compare"]) ? $context["button_compare"] : null);
                    echo "\" onclick=\"compare.add('";
                    echo $this->getAttribute($context["product"], "product_id", array());
                    echo "');\"><i class=\"fa fa-random\"></i></button>
\t\t\t\t\t";
                }
                // line 160
                echo " 

\t\t\t\t\t
\t\t\t\t</div>
\t\t\t\t";
            }
            // line 164
            echo " 
\t\t\t</div>
\t\t</div>
\t\t";
            // line 168
            echo "     \t";
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
        // line 169
        echo "    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "so-revo/template/soconfig/related_product.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  484 => 169,  470 => 168,  465 => 164,  458 => 160,  450 => 159,  448 => 158,  444 => 156,  436 => 155,  434 => 154,  430 => 152,  420 => 151,  418 => 150,  414 => 148,  412 => 147,  402 => 140,  398 => 138,  393 => 135,  386 => 134,  383 => 133,  378 => 132,  374 => 131,  369 => 129,  361 => 123,  353 => 120,  349 => 118,  342 => 116,  337 => 114,  330 => 112,  326 => 111,  320 => 108,  313 => 106,  309 => 105,  304 => 102,  300 => 101,  292 => 100,  290 => 99,  287 => 98,  284 => 97,  279 => 94,  269 => 93,  267 => 92,  263 => 90,  253 => 89,  251 => 88,  247 => 86,  237 => 85,  234 => 84,  228 => 81,  219 => 80,  217 => 79,  212 => 78,  210 => 77,  205 => 74,  199 => 71,  193 => 69,  187 => 67,  182 => 64,  179 => 63,  173 => 61,  171 => 60,  168 => 59,  164 => 57,  162 => 56,  159 => 55,  156 => 54,  149 => 49,  143 => 48,  137 => 47,  129 => 43,  126 => 42,  123 => 41,  120 => 40,  117 => 39,  114 => 38,  111 => 37,  108 => 36,  105 => 35,  102 => 34,  99 => 33,  96 => 32,  75 => 28,  70 => 26,  60 => 25,  55 => 23,  51 => 21,  49 => 20,  47 => 19,  45 => 18,  43 => 17,  40 => 15,  36 => 14,  31 => 13,  28 => 12,  24 => 11,  19 => 10,);
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
/* {#========== Product Detail - Releate Horizontal ============#}*/
/* {% set related_col_lg = soconfig.get_settings('product_related_column_lg')  %}*/
/* {% set related_col_md = soconfig.get_settings('product_related_column_md')  %}*/
/* {% set related_col_sm = soconfig.get_settings('product_related_column_sm')  %}*/
/* {% set related_col_xs = soconfig.get_settings('product_related_column_xs')  %}*/
/* */
/* <div class="clearfix module related-horizontal ">*/
/* 	<h3 class="modtitle hidden"><span>{{ text_related_module_name }} </span></h3>*/
/* 	*/
/*     <div class="related-products products-list  contentslider" data-rtl="{{direction}}" data-autoplay="no"  data-pagination="no" data-delay="4" data-speed="0.6" data-margin="30"  data-items_column0="{{related_col_lg}}" data-items_column1="{{related_col_md}}" data-items_column2="{{related_col_sm}}"*/
/* 			data-items_column3="{{related_col_xs}}" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">*/
/* 		<!-- Products list -->*/
/* 		{% for product in products %} */
/*             <div class="product-layout product-grid">*/
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
/* 					*/
/* 					<div class="product-image-container">*/
/* 					*/
/* 						<a href="{{ product.href }} " title="{{ product.name }} " target="_blank">*/
/* 								<img data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ product.thumb }} "  title="{{ product.name }}" */
/* 								class="lazyload img-responsive" alt="{{ product.name }}"/>*/
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
/* 					{% if product.quantity== 0 %}*/
/* 						<div class="label-stock label label-success ">{{ product.stock_status}}</div> */
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
/* */
/* 					*/
/* 					{% if cartinfo != 'bottom' %}*/
/* 					<div class="button-group {{class_cart_info}}">*/
/* 						{% if soconfig.get_settings('desktop_addcart_status') %}*/
/* 						<button class="addToCart  btn-button" type="button" title="{{ button_cart }}" onclick="cart.add('{{ product.product_id }}', '{{ product.minimum }}');">						*/
/* 							<i class="fa fa-shopping-cart"></i><span>{{ button_cart }}</span>*/
/* 						</button>*/
/* 						{% endif %}*/
/* 						{% if soconfig.get_settings('desktop_wishlist_status') %}*/
/* 						<button class="wishlist btn-button" type="button" title="{{ button_wishlist }}" onclick="wishlist.add('{{ product.product_id }}');"><i class="fa fa-heart"></i><span>{{ button_wishlist }}</span></button>*/
/* 						{% endif %} */
/* */
/* 						{% if soconfig.get_settings('desktop_Compare_status') %}*/
/* 						<button class="compare btn-button" type="button" title="{{ button_compare }}" onclick="compare.add('{{ product.product_id }}');"><i class="fa fa-random"></i><span>{{ button_compare }}</span></button>*/
/* 						{% endif %} */
/* */
/* 						{% if soconfig.get_settings('quick_status') %}*/
/* 							<a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="{{ objlang.get('text_quickview')}} " data-fancybox-type="iframe"  href="{{ our_url.link('extension/soconfig/quickview','product_id='~product.product_id) }}"> <i class="fa fa-eye"></i> <span>{{ text_quickview}}</span></a>*/
/* 						{% endif %} */
/* 					</div>*/
/* 					{% endif %}*/
/* 					{% if cartinfo == 'bottom' %}*/
/* 						*/
/* 						{% if soconfig.get_settings('quick_status') %}*/
/* 									<a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title="{{ objlang.get('text_quickview')}} " data-fancybox-type="iframe"  href="{{ our_url.link('extension/soconfig/quickview','product_id='~product.product_id) }}"> <i class="fa fa-eye"></i> </a>*/
/* 						{% endif %} */
/* 					{% endif %} */
/* 				</div>*/
/* 				*/
/* 				<div class="right-block {{ rightb }}">*/
/* 					<h4><a href="{{ product.href }}" target="_blank">{{ product.name }} </a></h4>*/
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
/* 							<a class="rating-num"  href="{{ product.href }}" rel="nofollow" target="_blank" >{{product.reviews}}</a>*/
/* 						</div>*/
/* 						{% endif %}*/
/* */
/* 					*/
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
/* 					*/
/* 				*/
/* 					*/
/* 				</div>*/
/* */
/* 				{% if soconfig.get_settings('desktop_addcart_status') or soconfig.get_settings('desktop_wishlist_status') or  soconfig.get_settings('desktop_Compare_status') %}*/
/* 				<div class="list-block">*/
/* */
/* 					{% if soconfig.get_settings('desktop_addcart_status') %}*/
/* 					<button class="addToCart btn-button" type="button" title="{{ button_cart}}" onclick="cart.add('{{ product.product_id }}', '{{ product.minimum }}');"><i class="fa fa-shopping-cart"></i></button>*/
/* 					{% endif %} */
/* */
/* 					{% if soconfig.get_settings('desktop_wishlist_status') %}*/
/* 					<button class="wishlist btn-button" type="button" title="{{ button_wishlist}}" onclick="wishlist.add('{{ product.product_id }}');"><i class="fa fa-heart-o"></i></button>*/
/* 					{% endif %} */
/* */
/* 					{% if soconfig.get_settings('desktop_Compare_status') %}*/
/* 					<button class="compare btn-button" type="button" title="{{ button_compare }}" onclick="compare.add('{{ product.product_id }}');"><i class="fa fa-random"></i></button>*/
/* 					{% endif %} */
/* */
/* 					*/
/* 				</div>*/
/* 				{% endif %} */
/* 			</div>*/
/* 		</div>*/
/* 		{# ====End Clearfix fluid grid layout =======#}*/
/*      	{% endfor %}*/
/*     </div>*/
/* </div>*/
/* */
/* */
