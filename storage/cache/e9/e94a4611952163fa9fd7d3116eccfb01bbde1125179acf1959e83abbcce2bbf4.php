<?php

/* so-revo/template/extension/module/so_tools/layout.twig */
class __TwigTemplate_475b859499d0b6caa16bb8cf2a87dc069b0df527a8af92e257de9432c0044091 extends Twig_Template
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
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "status", array(), "any", true, true) && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "status", array()) == 1))) {
            // line 2
            echo "
<div id=\"so-groups\" class=\"";
            // line 3
            echo (isset($context["position"]) ? $context["position"] : null);
            echo " so-groups-sticky hidden-xs\">
\t";
            // line 4
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_category", array())) {
                // line 5
                echo "\t<a class=\"sticky-categories\" data-target=\"popup\" data-popup=\"#popup-categories\"><span>";
                echo (isset($context["text_head_categories"]) ? $context["text_head_categories"] : null);
                echo "</span><i class=\"fa fa-align-justify\"></i></a>
\t";
            }
            // line 7
            echo "\t";
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_cart", array())) {
                // line 8
                echo "\t<a class=\"sticky-mycart\" data-target=\"popup\" data-popup=\"#popup-mycart\"><span>";
                echo (isset($context["text_head_cart"]) ? $context["text_head_cart"] : null);
                echo "</span><i class=\"fa fa-shopping-cart\"></i></a>
\t";
            }
            // line 10
            echo "\t";
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_account", array())) {
                // line 11
                echo "\t<a class=\"sticky-myaccount\" data-target=\"popup\" data-popup=\"#popup-myaccount\"><span>";
                echo (isset($context["text_head_account"]) ? $context["text_head_account"] : null);
                echo "</span><i class=\"fa fa-user\"></i></a>
\t";
            }
            // line 13
            echo "\t";
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_search", array())) {
                // line 14
                echo "\t<a class=\"sticky-mysearch\" data-target=\"popup\" data-popup=\"#popup-mysearch\"><span>";
                echo (isset($context["text_head_search"]) ? $context["text_head_search"] : null);
                echo "</span><i class=\"fa fa-search\"></i></a>
\t";
            }
            // line 16
            echo "\t";
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_recent_product", array())) {
                // line 17
                echo "\t<a class=\"sticky-recent\" data-target=\"popup\" data-popup=\"#popup-recent\"><span>";
                echo (isset($context["text_head_recent_view"]) ? $context["text_head_recent_view"] : null);
                echo "</span><i class=\"fa fa-recent\"></i></a>
\t";
            }
            // line 19
            echo "\t";
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_backtop", array())) {
                // line 20
                echo "\t<a class=\"sticky-backtop\" data-target=\"scroll\" data-scroll=\"html\"><i class=\"fa fa-arrow-up\" aria-hidden=\"true\"></i>
\t<span class=\"text-top\">Top</span></a>
\t";
            }
            // line 23
            echo "
\t";
            // line 24
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_category", array())) {
                // line 25
                echo "\t<div class=\"popup popup-categories popup-hidden\" id=\"popup-categories\">
\t\t<div class=\"popup-screen\">
\t\t\t<div class=\"popup-position\">
\t\t\t\t<div class=\"popup-container popup-small\">
\t\t\t\t\t<div class=\"popup-header\">
\t\t\t\t\t\t<span><i class=\"fa fa-align-justify\"></i>";
                // line 30
                echo (isset($context["text_all_categories"]) ? $context["text_all_categories"] : null);
                echo "</span>
\t\t\t\t\t\t<a class=\"popup-close\" data-target=\"popup-close\" data-popup-close=\"#popup-categories\">&times;</a>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"popup-content\">
\t\t\t\t\t\t";
                // line 34
                if ((isset($context["categories"]) ? $context["categories"] : null)) {
                    // line 35
                    echo "\t\t\t\t\t\t<div class=\"nav-secondary\">
\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t";
                    // line 37
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                        // line 38
                        echo "\t\t\t\t\t\t\t\t\t";
                        $context["childrens"] = $this->getAttribute($context["category"], "children", array());
                        // line 39
                        echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t";
                        // line 40
                        if ((isset($context["childrens"]) ? $context["childrens"] : null)) {
                            // line 41
                            echo "\t\t\t\t\t\t\t\t\t\t\t<span class=\"nav-action\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plus more\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-minus less\"></i>
\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 46
                        echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute($context["category"], "href", array());
                        echo "\"><i class=\"fa fa-chevron-down nav-arrow\"></i>";
                        echo $this->getAttribute($context["category"], "name", array());
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t";
                        // line 47
                        if ((isset($context["childrens"]) ? $context["childrens"] : null)) {
                            // line 48
                            echo "\t\t\t\t\t\t\t\t\t\t\t<ul class=\"level-2\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 49
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable((isset($context["childrens"]) ? $context["childrens"] : null));
                            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                                // line 50
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["subchildrens"] = $this->getAttribute($context["child"], "children", array());
                                // line 51
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 52
                                if ((isset($context["subchildrens"]) ? $context["subchildrens"] : null)) {
                                    // line 53
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"nav-action\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plus more\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-minus less\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 58
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                echo $this->getAttribute($context["child"], "href", array());
                                echo "\"><i class=\"fa fa-chevron-right flip nav-arrow\"></i>";
                                echo $this->getAttribute($context["child"], "name", array());
                                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 59
                                if ((isset($context["subchildrens"]) ? $context["subchildrens"] : null)) {
                                    // line 60
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"level-3\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 61
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable((isset($context["subchildrens"]) ? $context["subchildrens"] : null));
                                    foreach ($context['_seq'] as $context["_key"] => $context["subchild"]) {
                                        // line 62
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                                        echo $this->getAttribute($context["subchild"], "href", array());
                                        echo "\">";
                                        echo $this->getAttribute($context["subchild"], "name", array());
                                        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subchild'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 64
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 66
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 68
                            echo "\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 70
                        echo "\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 72
                    echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 75
                echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
            }
            // line 81
            echo "
\t";
            // line 82
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_cart", array())) {
                // line 83
                echo "\t<div class=\"popup popup-mycart popup-hidden\" id=\"popup-mycart\">
\t\t<div class=\"popup-screen\">
\t\t\t<div class=\"popup-position\">
\t\t\t\t<div class=\"popup-container popup-small\">
\t\t\t\t\t<div class=\"popup-html\">
\t\t\t\t\t\t<div class=\"popup-header\">
\t\t\t\t\t\t\t<span><i class=\"fa fa-shopping-cart\"></i>";
                // line 89
                echo (isset($context["text_shopping_cart"]) ? $context["text_shopping_cart"] : null);
                echo "</span>
\t\t\t\t\t\t\t<a class=\"popup-close\" data-target=\"popup-close\" data-popup-close=\"#popup-mycart\">&times;</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"popup-content\">
\t\t\t\t\t\t\t<div class=\"cart-header\">
\t\t\t\t\t\t\t\t";
                // line 94
                if (((isset($context["products"]) ? $context["products"] : null) || (isset($context["vouchers"]) ? $context["vouchers"] : null))) {
                    // line 95
                    echo "\t\t\t\t\t\t\t\t\t<div class=\"notification gray\">
\t\t\t\t\t\t\t\t\t\t<p>";
                    // line 96
                    echo (isset($context["text_items_product"]) ? $context["text_items_product"] : null);
                    echo "</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<table class=\"table table-striped\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 99
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                        // line 100
                        echo "\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-left first\">
\t\t\t\t\t\t\t\t\t  \t\t\t\t";
                        // line 102
                        if ($this->getAttribute($context["product"], "thumb", array())) {
                            // line 103
                            echo "\t\t\t\t\t\t\t\t\t    \t\t\t\t<a href=\"";
                            echo $this->getAttribute($context["product"], "href", array());
                            echo "\"><img class=\"img-thumbnail lazyload\" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                            echo $this->getAttribute($context["product"], "thumb", array());
                            echo "\" alt=\"";
                            echo $this->getAttribute($context["product"], "name", array());
                            echo "\" title=\"";
                            echo $this->getAttribute($context["product"], "name", array());
                            echo "\" /></a>
\t\t\t\t\t\t\t\t\t    \t\t\t";
                        }
                        // line 105
                        echo "\t\t\t\t\t\t\t\t\t    \t\t</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-left\">
\t\t\t\t\t\t\t\t\t  \t\t\t\t<a href=\"";
                        // line 107
                        echo $this->getAttribute($context["product"], "href", array());
                        echo "\">";
                        echo $this->getAttribute($context["product"], "name", array());
                        echo "</a>
\t\t\t\t\t\t\t\t\t    \t\t\t";
                        // line 108
                        if ($this->getAttribute($context["product"], "option", array())) {
                            // line 109
                            echo "\t\t\t\t\t\t\t\t\t    \t\t\t\t";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["product"], "option", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                                // line 110
                                echo "\t\t\t\t\t\t\t\t\t    \t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t    \t\t\t\t\t- <small>";
                                // line 111
                                echo $this->getAttribute($context["option"], "name", array());
                                echo " ";
                                echo $this->getAttribute($context["option"], "value", array());
                                echo "</small>
\t\t\t\t\t\t\t\t\t    \t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 113
                            echo "\t\t\t\t\t\t\t\t\t    \t\t\t";
                        }
                        // line 114
                        echo "\t\t\t\t\t\t\t\t\t    \t\t\t";
                        if ($this->getAttribute($context["product"], "recurring", array())) {
                            // line 115
                            echo "\t\t\t\t\t\t\t\t\t    \t\t\t\t<br />
\t\t\t\t\t\t\t\t\t    \t\t\t\t- <small>";
                            // line 116
                            echo (isset($context["text_recurring"]) ? $context["text_recurring"] : null);
                            echo " ";
                            echo $this->getAttribute($context["product"], "recurring", array());
                            echo "</small>
\t\t\t\t\t\t\t\t\t    \t\t\t";
                        }
                        // line 118
                        echo "\t\t\t\t\t\t\t\t\t    \t\t</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-right\">x ";
                        // line 119
                        echo $this->getAttribute($context["product"], "quantity", array());
                        echo "</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-right total-price\">";
                        // line 120
                        echo $this->getAttribute($context["product"], "total", array());
                        echo "</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-right last\"><a href=\"javascript:;\" onclick=\"cart.remove('";
                        // line 121
                        echo $this->getAttribute($context["product"], "cart_id", array());
                        echo "');\" title=\"";
                        echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
                        echo "\"><i class=\"fa fa-trash\"></i></a></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 124
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["vouchers"]) ? $context["vouchers"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["voucher"]) {
                        // line 125
                        echo "\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-left first\"></td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-left\">";
                        // line 127
                        echo $this->getAttribute($context["voucher"], "description", array());
                        echo "</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-right\">x&nbsp;1</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-right\">";
                        // line 129
                        echo $this->getAttribute($context["voucher"], "amount", array());
                        echo "</td>
\t\t\t\t\t\t\t\t\t  \t\t\t<td class=\"text-right last\"><a href=\"javascript:;\" onclick=\"voucher.remove('";
                        // line 130
                        echo $this->getAttribute($context["voucher"], "key", array());
                        echo "');\" title=\"";
                        echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
                        echo "\"><i class=\"fa fa-trash\"></i></a></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['voucher'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 133
                    echo "\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t<div class=\"cart-bottom\">
\t\t\t\t\t\t\t\t\t\t<table class=\"table table-striped\">
\t\t\t\t\t\t\t\t\t  \t\t";
                    // line 136
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["totals"]) ? $context["totals"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["total"]) {
                        // line 137
                        echo "\t\t\t\t\t\t\t\t\t  \t\t\t<tr>
\t\t\t\t\t\t\t\t\t    \t\t\t<td class=\"text-left\"><strong>";
                        // line 138
                        echo $this->getAttribute($context["total"], "title", array());
                        echo "</strong></td>
\t\t\t\t\t\t\t\t\t    \t\t\t<td class=\"text-right\">";
                        // line 139
                        echo $this->getAttribute($context["total"], "text", array());
                        echo "</td>
\t\t\t\t\t\t\t\t\t  \t\t\t</tr>
\t\t\t\t\t\t\t\t\t  \t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['total'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 142
                    echo "\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t<p class=\"text-center\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 144
                    echo (isset($context["cart"]) ? $context["cart"] : null);
                    echo "\" class=\"btn btn-view-cart\"><strong>";
                    echo (isset($context["text_cart"]) ? $context["text_cart"] : null);
                    echo "</strong></a>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 145
                    echo (isset($context["checkout"]) ? $context["checkout"] : null);
                    echo "\" class=\"btn btn-checkout\"><strong>";
                    echo (isset($context["text_checkout"]) ? $context["text_checkout"] : null);
                    echo "</strong></a>
\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 149
                    echo "\t\t\t\t\t\t\t\t\t<div class=\"notification gray\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-shopping-cart info-icon\"></i>
\t\t\t\t\t\t\t\t\t\t<p>";
                    // line 151
                    echo (isset($context["text_empty"]) ? $context["text_empty"] : null);
                    echo "</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                }
                // line 154
                echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
            }
            // line 162
            echo "
\t";
            // line 163
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_account", array())) {
                // line 164
                echo "\t<div class=\"popup popup-myaccount popup-hidden\" id=\"popup-myaccount\">
\t\t<div class=\"popup-screen\">
\t\t\t<div class=\"popup-position\">
\t\t\t\t<div class=\"popup-container popup-small\">
\t\t\t\t\t<div class=\"popup-html\">
\t\t\t\t\t\t<div class=\"popup-header\">
\t\t\t\t\t\t\t<span><i class=\"fa fa-user\"></i>";
                // line 170
                echo (isset($context["text_my_account"]) ? $context["text_my_account"] : null);
                echo "</span>
\t\t\t\t\t\t\t<a class=\"popup-close\" data-target=\"popup-close\" data-popup-close=\"#popup-myaccount\">&times;</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"popup-content\">
\t\t\t\t\t\t\t<div class=\"form-content\">
\t\t\t\t\t\t\t\t<div class=\"row space\">
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-6 col-xs-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<form action=\"";
                // line 178
                echo (isset($context["action_currency"]) ? $context["action_currency"] : null);
                echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"sticky-form-currency\">
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"label-top\" for=\"input-language\"><span>";
                // line 179
                echo (isset($context["text_currency"]) ? $context["text_currency"] : null);
                echo "</span></label>
\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"select-currency\" id=\"input-currency\" class=\"field icon dark arrow\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 181
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["currencies"]) ? $context["currencies"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
                    // line 182
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ($this->getAttribute($context["currency"], "symbol_left", array())) {
                        // line 183
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $this->getAttribute($context["currency"], "code", array());
                        echo "\" ";
                        if (((isset($context["code"]) ? $context["code"] : null) == $this->getAttribute($context["currency"], "code", array()))) {
                            echo " ";
                            echo "selected=\"selected\"";
                            echo " ";
                        }
                        echo ">";
                        echo $this->getAttribute($context["currency"], "symbol_left", array());
                        echo " ";
                        echo $this->getAttribute($context["currency"], "title", array());
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 185
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $this->getAttribute($context["currency"], "code", array());
                        echo "\" ";
                        if (((isset($context["code"]) ? $context["code"] : null) == $this->getAttribute($context["currency"], "code", array()))) {
                            echo " ";
                            echo "selected=\"selected\"";
                            echo " ";
                        }
                        echo ">";
                        echo $this->getAttribute($context["currency"], "symbol_right", array());
                        echo " ";
                        echo $this->getAttribute($context["currency"], "title", array());
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 187
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"code\" value=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"redirect\" value=\"";
                // line 190
                echo (isset($context["redirect_currency"]) ? $context["redirect_currency"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-6 col-xs-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<form action=\"";
                // line 196
                echo (isset($context["action_language"]) ? $context["action_language"] : null);
                echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"sticky-form-language\">
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"label-top\" for=\"input-language\"><span>";
                // line 197
                echo (isset($context["text_language"]) ? $context["text_language"] : null);
                echo "</span></label>
\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"select-language\" id=\"input-language\" class=\"field icon dark arrow\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 199
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                    // line 200
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["language"], "code", array()) == (isset($context["code_language"]) ? $context["code_language"] : null))) {
                        // line 201
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "\" selected=\"selected\">";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 203
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "\">";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 205
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 206
                echo "\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"code\" value=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"redirect\" value=\"";
                // line 208
                echo (isset($context["redirect_language"]) ? $context["redirect_language"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"hr show\"></div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6 txt-center\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"account-url\" href=\"";
                // line 219
                echo (isset($context["link_order"]) ? $context["link_order"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"ico ico-32 ico-sm\"><i class=\"fa fa-history\"></i></span><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"account-txt\">";
                // line 221
                echo (isset($context["text_history"]) ? $context["text_history"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6 txt-center\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"account-url\" href=\"";
                // line 227
                echo (isset($context["link_cart"]) ? $context["link_cart"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"ico ico-32 ico-sm\"><i class=\"fa fa-shoppingcart\"></i></span><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"account-txt\">";
                // line 229
                echo (isset($context["text_shopping_cart"]) ? $context["text_shopping_cart"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6 txt-center\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"account-url\" href=\"";
                // line 235
                echo (isset($context["link_register"]) ? $context["link_register"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"ico ico-32 ico-sm\"><i class=\"fa fa-register\"></i></span><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"account-txt\">";
                // line 237
                echo (isset($context["text_register"]) ? $context["text_register"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6 txt-center\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"account-url\" href=\"";
                // line 243
                echo (isset($context["link_account"]) ? $context["link_account"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"ico ico-32 ico-sm\"><i class=\"fa fa-account\"></i></span><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"account-txt\">";
                // line 245
                echo (isset($context["text_account"]) ? $context["text_account"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6 txt-center\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"account-url\" href=\"";
                // line 251
                echo (isset($context["link_download"]) ? $context["link_download"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"ico ico-32 ico-sm\"><i class=\"fa fa-download\"></i></span><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"account-txt\">";
                // line 253
                echo (isset($context["text_download"]) ? $context["text_download"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6 txt-center\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"account-url\" href=\"";
                // line 259
                echo (isset($context["link_login"]) ? $context["link_login"] : null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"ico ico-32 ico-sm\"><i class=\"fa fa-login\"></i></span><br>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"account-txt\">";
                // line 261
                echo (isset($context["text_login"]) ? $context["text_login"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
            }
            // line 275
            echo "
\t";
            // line 276
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_search", array())) {
                // line 277
                echo "\t<div class=\"popup popup-mysearch popup-hidden\" id=\"popup-mysearch\">
\t\t<div class=\"popup-screen\">
\t\t\t<div class=\"popup-position\">
\t\t\t\t<div class=\"popup-container popup-small\">
\t\t\t\t\t<div class=\"popup-html\">
\t\t\t\t\t\t<div class=\"popup-header\">
\t\t\t\t\t\t\t<span><i class=\"fa fa-search\"></i>";
                // line 283
                echo (isset($context["text_search"]) ? $context["text_search"] : null);
                echo "</span>
\t\t\t\t\t\t\t<a class=\"popup-close\" data-target=\"popup-close\" data-popup-close=\"#popup-mysearch\">&times;</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"popup-content\">
\t\t\t\t\t\t\t<div class=\"form-content\">
\t\t\t\t\t\t\t\t<div class=\"row space\">
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"search\" value=\"\" placeholder=\"";
                // line 291
                echo (isset($context["text_search"]) ? $context["text_search"] : null);
                echo "\" id=\"input-search\" class=\"field\" />
\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-search sbmsearch\"></i>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" id=\"button-search\" class=\"btn button-search\">";
                // line 297
                echo (isset($context["text_search"]) ? $context["text_search"] : null);
                echo "</button>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
            }
            // line 310
            echo "
\t";
            // line 311
            if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "show_recent_product", array())) {
                // line 312
                echo "\t<div class=\"popup popup-recent popup-hidden\" id=\"popup-recent\">
\t\t<div class=\"popup-screen\">
\t\t\t<div class=\"popup-position\">
\t\t\t\t<div class=\"popup-container popup-small\">
\t\t\t\t\t<div class=\"popup-html\">
\t\t\t\t\t\t<div class=\"popup-header\">
\t\t\t\t\t\t\t<span><i class=\"fa fa-recent\"></i>";
                // line 318
                echo (isset($context["text_recent_products"]) ? $context["text_recent_products"] : null);
                echo "</span>
\t\t\t\t\t\t\t<a class=\"popup-close\" data-target=\"popup-close\" data-popup-close=\"#popup-recent\">&times;</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"popup-content\">
\t\t\t\t\t\t\t<div class=\"form-content\">
\t\t\t\t\t\t\t\t<div class=\"row space\">
\t\t\t\t\t\t\t\t\t";
                // line 324
                if ((isset($context["recent_products"]) ? $context["recent_products"] : null)) {
                    // line 325
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["recent_products"]) ? $context["recent_products"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["product_viewed"]) {
                        // line 326
                        echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"col col-sm-4 col-xs-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-box\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t                                        <div class=\"product-thumb transition\">
\t\t\t\t\t\t\t\t                        \t<div class=\"image\">
\t\t\t\t\t\t\t\t                        \t\t";
                        // line 331
                        if ($this->getAttribute($context["product_viewed"], "product_special", array())) {
                            // line 332
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"bt-sale\">";
                            echo $this->getAttribute($context["product_viewed"], "product_discount", array());
                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 334
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ($this->getAttribute($context["product_viewed"], "product_new", array())) {
                            // line 335
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"bt-new\">";
                            echo (isset($context["text_new"]) ? $context["text_new"] : null);
                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 337
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute($context["product_viewed"], "product_href", array());
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"lazyload\" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                        // line 338
                        echo $this->getAttribute($context["product_viewed"], "product_image", array());
                        echo "\" alt=\"";
                        echo $this->getAttribute($context["product_viewed"], "product_name", array());
                        echo "\" >
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t                         \t</div>
\t\t\t\t\t\t\t\t\t                        <div class=\"caption\">
\t\t                                                        ";
                        // line 342
                        if ($this->getAttribute($context["product_viewed"], "product_name", array())) {
                            echo "<h4 class=\"font-ct\"><a href=\"";
                            echo $this->getAttribute($context["product_viewed"], "product_href", array());
                            echo "\" title=\"";
                            echo $this->getAttribute($context["product_viewed"], "product_name", array());
                            echo "\" >";
                            echo $this->getAttribute($context["product_viewed"], "product_name", array());
                            echo "</a></h4>";
                        }
                        // line 343
                        echo "\t\t                                                        ";
                        if ($this->getAttribute($context["product_viewed"], "product_price", array())) {
                            // line 344
                            echo "\t\t\t                                                        <p class=\"price\">
\t\t\t                                                        \t";
                            // line 345
                            if (($this->getAttribute($context["product_viewed"], "product_special", array()) == false)) {
                                // line 346
                                echo "\t\t\t\t\t\t\t\t\t\t                                \t<span class=\"price-new\">";
                                echo $this->getAttribute($context["product_viewed"], "product_price", array());
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t                                ";
                            } else {
                                // line 348
                                echo "\t\t\t\t\t\t\t\t\t\t                                \t<span class=\"price-new\">";
                                echo $this->getAttribute($context["product_viewed"], "product_special", array());
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t                                \t<span class=\"price-old\">";
                                // line 349
                                echo $this->getAttribute($context["product_viewed"], "product_price", array());
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t                                ";
                            }
                            // line 351
                            echo "\t\t\t\t\t\t\t\t\t\t                            </p>
\t\t                                                    \t";
                        }
                        // line 353
                        echo "\t\t                                                    </div>
\t\t                                                    <div class=\"button-group\">
\t\t                                                    \t<button type=\"button\" onclick=\"cart.add('";
                        // line 355
                        echo $this->getAttribute($context["product_viewed"], "product_id", array());
                        echo "');\">
\t\t                                                    \t\t<span class=\"\">";
                        // line 356
                        echo (isset($context["button_cart"]) ? $context["button_cart"] : null);
                        echo "</span>
\t\t                                                    \t</button>
\t\t                                                    </div>
\t\t\t                                            </div>
\t\t\t\t                                    </div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_viewed'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 364
                    echo "\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 365
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"col col-xs-12\">";
                    echo (isset($context["text_no_content"]) ? $context["text_no_content"] : null);
                    echo "</div>
\t\t\t\t\t\t\t\t\t";
                }
                // line 367
                echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
            }
            // line 377
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/module/so_tools/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  868 => 377,  856 => 367,  850 => 365,  847 => 364,  833 => 356,  829 => 355,  825 => 353,  821 => 351,  816 => 349,  811 => 348,  805 => 346,  803 => 345,  800 => 344,  797 => 343,  787 => 342,  778 => 338,  773 => 337,  767 => 335,  764 => 334,  758 => 332,  756 => 331,  749 => 326,  744 => 325,  742 => 324,  733 => 318,  725 => 312,  723 => 311,  720 => 310,  704 => 297,  695 => 291,  684 => 283,  676 => 277,  674 => 276,  671 => 275,  654 => 261,  649 => 259,  640 => 253,  635 => 251,  626 => 245,  621 => 243,  612 => 237,  607 => 235,  598 => 229,  593 => 227,  584 => 221,  579 => 219,  565 => 208,  561 => 206,  555 => 205,  547 => 203,  539 => 201,  536 => 200,  532 => 199,  527 => 197,  523 => 196,  514 => 190,  504 => 187,  488 => 185,  472 => 183,  469 => 182,  465 => 181,  460 => 179,  456 => 178,  445 => 170,  437 => 164,  435 => 163,  432 => 162,  422 => 154,  416 => 151,  412 => 149,  403 => 145,  397 => 144,  393 => 142,  384 => 139,  380 => 138,  377 => 137,  373 => 136,  368 => 133,  357 => 130,  353 => 129,  348 => 127,  344 => 125,  339 => 124,  328 => 121,  324 => 120,  320 => 119,  317 => 118,  310 => 116,  307 => 115,  304 => 114,  301 => 113,  291 => 111,  288 => 110,  283 => 109,  281 => 108,  275 => 107,  271 => 105,  259 => 103,  257 => 102,  253 => 100,  249 => 99,  243 => 96,  240 => 95,  238 => 94,  230 => 89,  222 => 83,  220 => 82,  217 => 81,  209 => 75,  204 => 72,  197 => 70,  193 => 68,  186 => 66,  182 => 64,  171 => 62,  167 => 61,  164 => 60,  162 => 59,  155 => 58,  148 => 53,  146 => 52,  143 => 51,  140 => 50,  136 => 49,  133 => 48,  131 => 47,  124 => 46,  117 => 41,  115 => 40,  112 => 39,  109 => 38,  105 => 37,  101 => 35,  99 => 34,  92 => 30,  85 => 25,  83 => 24,  80 => 23,  75 => 20,  72 => 19,  66 => 17,  63 => 16,  57 => 14,  54 => 13,  48 => 11,  45 => 10,  39 => 8,  36 => 7,  30 => 5,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if settings.status is defined and settings.status == 1 %}*/
/* */
/* <div id="so-groups" class="{{ position }} so-groups-sticky hidden-xs">*/
/* 	{% if settings.show_category %}*/
/* 	<a class="sticky-categories" data-target="popup" data-popup="#popup-categories"><span>{{ text_head_categories }}</span><i class="fa fa-align-justify"></i></a>*/
/* 	{% endif %}*/
/* 	{% if settings.show_cart %}*/
/* 	<a class="sticky-mycart" data-target="popup" data-popup="#popup-mycart"><span>{{ text_head_cart }}</span><i class="fa fa-shopping-cart"></i></a>*/
/* 	{% endif %}*/
/* 	{% if settings.show_account %}*/
/* 	<a class="sticky-myaccount" data-target="popup" data-popup="#popup-myaccount"><span>{{ text_head_account }}</span><i class="fa fa-user"></i></a>*/
/* 	{% endif %}*/
/* 	{% if settings.show_search %}*/
/* 	<a class="sticky-mysearch" data-target="popup" data-popup="#popup-mysearch"><span>{{ text_head_search }}</span><i class="fa fa-search"></i></a>*/
/* 	{% endif %}*/
/* 	{% if settings.show_recent_product %}*/
/* 	<a class="sticky-recent" data-target="popup" data-popup="#popup-recent"><span>{{ text_head_recent_view }}</span><i class="fa fa-recent"></i></a>*/
/* 	{% endif %}*/
/* 	{% if settings.show_backtop %}*/
/* 	<a class="sticky-backtop" data-target="scroll" data-scroll="html"><i class="fa fa-arrow-up" aria-hidden="true"></i>*/
/* 	<span class="text-top">Top</span></a>*/
/* 	{% endif %}*/
/* */
/* 	{% if settings.show_category %}*/
/* 	<div class="popup popup-categories popup-hidden" id="popup-categories">*/
/* 		<div class="popup-screen">*/
/* 			<div class="popup-position">*/
/* 				<div class="popup-container popup-small">*/
/* 					<div class="popup-header">*/
/* 						<span><i class="fa fa-align-justify"></i>{{ text_all_categories }}</span>*/
/* 						<a class="popup-close" data-target="popup-close" data-popup-close="#popup-categories">&times;</a>*/
/* 					</div>*/
/* 					<div class="popup-content">*/
/* 						{% if categories %}*/
/* 						<div class="nav-secondary">*/
/* 							<ul>*/
/* 								{% for category in categories %}*/
/* 									{% set childrens = category.children %}*/
/* 									<li>*/
/* 										{% if childrens %}*/
/* 											<span class="nav-action">*/
/* 												<i class="fa fa-plus more"></i>*/
/* 												<i class="fa fa-minus less"></i>*/
/* 											</span>*/
/* 										{% endif %}*/
/* 										<a href="{{ category.href }}"><i class="fa fa-chevron-down nav-arrow"></i>{{ category.name }}</a>*/
/* 										{% if childrens %}*/
/* 											<ul class="level-2">*/
/* 												{% for child in childrens %}*/
/* 													{% set subchildrens = child.children %}*/
/* 													<li>*/
/* 														{% if subchildrens %}*/
/* 															<span class="nav-action">*/
/* 																<i class="fa fa-plus more"></i>*/
/* 																<i class="fa fa-minus less"></i>*/
/* 															</span>*/
/* 														{% endif %}*/
/* 														<a href="{{ child.href }}"><i class="fa fa-chevron-right flip nav-arrow"></i>{{ child.name }}</a>*/
/* 														{% if subchildrens %}*/
/* 															<ul class="level-3">*/
/* 																{% for subchild in subchildrens %}*/
/* 																	<li><a href="{{ subchild.href }}">{{ subchild.name }}</a></li>*/
/* 																{% endfor %}*/
/* 															</ul>*/
/* 														{% endif %}*/
/* 													</li>*/
/* 												{% endfor %}*/
/* 											</ul>*/
/* 										{% endif %}*/
/* 									</li>*/
/* 								{% endfor %}*/
/* 							</ul>*/
/* 						</div>*/
/* 						{% endif %}*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	{% endif %}*/
/* */
/* 	{% if settings.show_cart %}*/
/* 	<div class="popup popup-mycart popup-hidden" id="popup-mycart">*/
/* 		<div class="popup-screen">*/
/* 			<div class="popup-position">*/
/* 				<div class="popup-container popup-small">*/
/* 					<div class="popup-html">*/
/* 						<div class="popup-header">*/
/* 							<span><i class="fa fa-shopping-cart"></i>{{ text_shopping_cart }}</span>*/
/* 							<a class="popup-close" data-target="popup-close" data-popup-close="#popup-mycart">&times;</a>*/
/* 						</div>*/
/* 						<div class="popup-content">*/
/* 							<div class="cart-header">*/
/* 								{% if products or vouchers %}*/
/* 									<div class="notification gray">*/
/* 										<p>{{ text_items_product }}</p>*/
/* 									</div>*/
/* 									<table class="table table-striped">*/
/* 										{% for product in products %}*/
/* 											<tr>*/
/* 									  			<td class="text-left first">*/
/* 									  				{% if product.thumb %}*/
/* 									    				<a href="{{ product.href }}"><img class="img-thumbnail lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}" /></a>*/
/* 									    			{% endif %}*/
/* 									    		</td>*/
/* 									  			<td class="text-left">*/
/* 									  				<a href="{{ product.href }}">{{ product.name }}</a>*/
/* 									    			{% if product.option %}*/
/* 									    				{% for option in product.option %}*/
/* 									    					<br />*/
/* 									    					- <small>{{ option.name }} {{ option.value }}</small>*/
/* 									    				{% endfor %}*/
/* 									    			{% endif %}*/
/* 									    			{% if product.recurring %}*/
/* 									    				<br />*/
/* 									    				- <small>{{ text_recurring }} {{ product.recurring }}</small>*/
/* 									    			{% endif %}*/
/* 									    		</td>*/
/* 									  			<td class="text-right">x {{ product.quantity }}</td>*/
/* 									  			<td class="text-right total-price">{{ product.total }}</td>*/
/* 									  			<td class="text-right last"><a href="javascript:;" onclick="cart.remove('{{ product.cart_id }}');" title="{{ button_remove }}"><i class="fa fa-trash"></i></a></td>*/
/* 											</tr>*/
/* 										{% endfor %}*/
/* 										{% for voucher in vouchers %}*/
/* 											<tr>*/
/* 									  			<td class="text-left first"></td>*/
/* 									  			<td class="text-left">{{ voucher.description }}</td>*/
/* 									  			<td class="text-right">x&nbsp;1</td>*/
/* 									  			<td class="text-right">{{ voucher.amount }}</td>*/
/* 									  			<td class="text-right last"><a href="javascript:;" onclick="voucher.remove('{{ voucher.key }}');" title="{{ button_remove }}"><i class="fa fa-trash"></i></a></td>*/
/* 											</tr>*/
/* 										{% endfor %}*/
/* 									</table>*/
/* 									<div class="cart-bottom">*/
/* 										<table class="table table-striped">*/
/* 									  		{% for total in totals %}*/
/* 									  			<tr>*/
/* 									    			<td class="text-left"><strong>{{ total.title }}</strong></td>*/
/* 									    			<td class="text-right">{{ total.text }}</td>*/
/* 									  			</tr>*/
/* 									  		{% endfor %}*/
/* 										</table>*/
/* 										<p class="text-center">*/
/* 											<a href="{{ cart }}" class="btn btn-view-cart"><strong>{{ text_cart }}</strong></a>*/
/* 											<a href="{{ checkout }}" class="btn btn-checkout"><strong>{{ text_checkout }}</strong></a>*/
/* 										</p>*/
/* 									</div>*/
/* 								{% else %}*/
/* 									<div class="notification gray">*/
/* 										<i class="fa fa-shopping-cart info-icon"></i>*/
/* 										<p>{{ text_empty }}</p>*/
/* 									</div>*/
/* 								{% endif %}*/
/* 							</div>*/
/* 						</div>			*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	{% endif %}*/
/* */
/* 	{% if settings.show_account %}*/
/* 	<div class="popup popup-myaccount popup-hidden" id="popup-myaccount">*/
/* 		<div class="popup-screen">*/
/* 			<div class="popup-position">*/
/* 				<div class="popup-container popup-small">*/
/* 					<div class="popup-html">*/
/* 						<div class="popup-header">*/
/* 							<span><i class="fa fa-user"></i>{{ text_my_account }}</span>*/
/* 							<a class="popup-close" data-target="popup-close" data-popup-close="#popup-myaccount">&times;</a>*/
/* 						</div>*/
/* 						<div class="popup-content">*/
/* 							<div class="form-content">*/
/* 								<div class="row space">*/
/* 									<div class="col col-sm-6 col-xs-12">*/
/* 										<div class="form-box">*/
/* 											<form action="{{ action_currency }}" method="post" enctype="multipart/form-data" id="sticky-form-currency">*/
/* 												<label class="label-top" for="input-language"><span>{{ text_currency }}</span></label>*/
/* 												<select name="select-currency" id="input-currency" class="field icon dark arrow">*/
/* 													{% for currency in currencies %}*/
/* 														{% if currency.symbol_left %}*/
/* 															<option value="{{ currency.code }}" {% if code == currency.code %} {{ 'selected="selected"' }} {% endif %}>{{ currency.symbol_left }} {{ currency.title }}</option>*/
/* 														{% else %}*/
/* 															<option value="{{ currency.code }}" {% if code == currency.code %} {{ 'selected="selected"' }} {% endif %}>{{ currency.symbol_right }} {{ currency.title }}</option>*/
/* 														{% endif %}*/
/* 													{% endfor %}					*/
/* 												</select>*/
/* 												<input type="hidden" name="code" value="">*/
/* 												<input type="hidden" name="redirect" value="{{ redirect_currency }}">*/
/* 											</form>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-6 col-xs-12">*/
/* 										<div class="form-box">*/
/* 											<form action="{{ action_language }}" method="post" enctype="multipart/form-data" id="sticky-form-language">*/
/* 												<label class="label-top" for="input-language"><span>{{ text_language }}</span></label>*/
/* 												<select name="select-language" id="input-language" class="field icon dark arrow">*/
/* 													{% for language in languages %}*/
/* 														{% if language.code == code_language %}*/
/* 															<option value="{{ language.code }}" selected="selected">{{ language.name }}</option>*/
/* 														{% else %}*/
/* 															<option value="{{ language.code }}">{{ language.name }}</option>*/
/* 														{% endif %}*/
/* 													{% endfor %}*/
/* 												</select>*/
/* 												<input type="hidden" name="code" value="">*/
/* 												<input type="hidden" name="redirect" value="{{ redirect_language }}">*/
/* 											</form>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-12">*/
/* 										<div class="form-box">*/
/* 											<div class="hr show"></div>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-4 col-xs-6 txt-center">*/
/* 										<div class="form-box">*/
/* 											<a class="account-url" href="{{ link_order }}">*/
/* 												<span class="ico ico-32 ico-sm"><i class="fa fa-history"></i></span><br>*/
/* 												<span class="account-txt">{{ text_history }}</span>*/
/* 											</a>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-4 col-xs-6 txt-center">*/
/* 										<div class="form-box">*/
/* 											<a class="account-url" href="{{ link_cart }}">*/
/* 												<span class="ico ico-32 ico-sm"><i class="fa fa-shoppingcart"></i></span><br>*/
/* 												<span class="account-txt">{{ text_shopping_cart }}</span>*/
/* 											</a>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-4 col-xs-6 txt-center">*/
/* 										<div class="form-box">*/
/* 											<a class="account-url" href="{{ link_register }}">*/
/* 												<span class="ico ico-32 ico-sm"><i class="fa fa-register"></i></span><br>*/
/* 												<span class="account-txt">{{ text_register }}</span>*/
/* 											</a>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-4 col-xs-6 txt-center">*/
/* 										<div class="form-box">*/
/* 											<a class="account-url" href="{{ link_account }}">*/
/* 												<span class="ico ico-32 ico-sm"><i class="fa fa-account"></i></span><br>*/
/* 												<span class="account-txt">{{ text_account }}</span>*/
/* 											</a>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-4 col-xs-6 txt-center">*/
/* 										<div class="form-box">*/
/* 											<a class="account-url" href="{{ link_download }}">*/
/* 												<span class="ico ico-32 ico-sm"><i class="fa fa-download"></i></span><br>*/
/* 												<span class="account-txt">{{ text_download }}</span>*/
/* 											</a>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col col-sm-4 col-xs-6 txt-center">*/
/* 										<div class="form-box">*/
/* 											<a class="account-url" href="{{ link_login }}">*/
/* 												<span class="ico ico-32 ico-sm"><i class="fa fa-login"></i></span><br>*/
/* 												<span class="account-txt">{{ text_login }}</span>*/
/* 											</a>*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 							<div class="clear"></div>*/
/* 						</div>					*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	{% endif %}*/
/* */
/* 	{% if settings.show_search %}*/
/* 	<div class="popup popup-mysearch popup-hidden" id="popup-mysearch">*/
/* 		<div class="popup-screen">*/
/* 			<div class="popup-position">*/
/* 				<div class="popup-container popup-small">*/
/* 					<div class="popup-html">*/
/* 						<div class="popup-header">*/
/* 							<span><i class="fa fa-search"></i>{{ text_search }}</span>*/
/* 							<a class="popup-close" data-target="popup-close" data-popup-close="#popup-mysearch">&times;</a>*/
/* 						</div>*/
/* 						<div class="popup-content">*/
/* 							<div class="form-content">*/
/* 								<div class="row space">*/
/* 									<div class="col">*/
/* 										<div class="form-box">*/
/* 											<input type="text" name="search" value="" placeholder="{{ text_search }}" id="input-search" class="field" />*/
/* 											<i class="fa fa-search sbmsearch"></i>*/
/* 										</div>*/
/* 									</div>*/
/* 									<div class="col">*/
/* 										<div class="form-box">*/
/* 											<button type="button" id="button-search" class="btn button-search">{{ text_search }}</button>*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 							<div class="clear"></div>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	{% endif %}*/
/* */
/* 	{% if settings.show_recent_product %}*/
/* 	<div class="popup popup-recent popup-hidden" id="popup-recent">*/
/* 		<div class="popup-screen">*/
/* 			<div class="popup-position">*/
/* 				<div class="popup-container popup-small">*/
/* 					<div class="popup-html">*/
/* 						<div class="popup-header">*/
/* 							<span><i class="fa fa-recent"></i>{{ text_recent_products }}</span>*/
/* 							<a class="popup-close" data-target="popup-close" data-popup-close="#popup-recent">&times;</a>*/
/* 						</div>*/
/* 						<div class="popup-content">*/
/* 							<div class="form-content">*/
/* 								<div class="row space">*/
/* 									{% if recent_products %}*/
/* 										{% for product_viewed in recent_products %}*/
/* 											<div class="col col-sm-4 col-xs-6">*/
/* 												<div class="form-box">*/
/* 													<div class="item">*/
/* 				                                        <div class="product-thumb transition">*/
/* 								                        	<div class="image">*/
/* 								                        		{% if product_viewed.product_special %}*/
/* 																	<span class="bt-sale">{{ product_viewed.product_discount }}</span>*/
/* 																{% endif %}*/
/* 																{% if product_viewed.product_new %}*/
/* 																	<span class="bt-new">{{ text_new }}</span>*/
/* 																{% endif %}*/
/* 																<a href="{{ product_viewed.product_href }}">*/
/* 																	<img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ product_viewed.product_image }}" alt="{{ product_viewed.product_name }}" >*/
/* 																</a>*/
/* 								                         	</div>*/
/* 									                        <div class="caption">*/
/* 		                                                        {% if product_viewed.product_name %}<h4 class="font-ct"><a href="{{ product_viewed.product_href }}" title="{{ product_viewed.product_name }}" >{{ product_viewed.product_name }}</a></h4>{% endif %}*/
/* 		                                                        {% if product_viewed.product_price %}*/
/* 			                                                        <p class="price">*/
/* 			                                                        	{% if product_viewed.product_special == false %}*/
/* 										                                	<span class="price-new">{{ product_viewed.product_price }}</span>*/
/* 										                                {% else %}*/
/* 										                                	<span class="price-new">{{ product_viewed.product_special }}</span>*/
/* 										                                	<span class="price-old">{{ product_viewed.product_price }}</span>*/
/* 										                                {% endif %}*/
/* 										                            </p>*/
/* 		                                                    	{% endif %}*/
/* 		                                                    </div>*/
/* 		                                                    <div class="button-group">*/
/* 		                                                    	<button type="button" onclick="cart.add('{{ product_viewed.product_id }}');">*/
/* 		                                                    		<span class="">{{ button_cart }}</span>*/
/* 		                                                    	</button>*/
/* 		                                                    </div>*/
/* 			                                            </div>*/
/* 				                                    </div>*/
/* 												</div>*/
/* 											</div>*/
/* 										{% endfor %}*/
/* 									{% else %}*/
/* 										<div class="col col-xs-12">{{ text_no_content}}</div>*/
/* 									{% endif %}*/
/* 								</div>*/
/* 							</div>*/
/* 							<div class="clear"></div>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	{% endif %}*/
/* </div>*/
/* {% endif %}*/
/* */
