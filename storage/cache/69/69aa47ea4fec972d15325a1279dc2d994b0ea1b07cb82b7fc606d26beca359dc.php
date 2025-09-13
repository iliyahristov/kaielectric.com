<?php

/* so-revo/template/extension/module/so_extra_slider/layout10_center.twig */
class __TwigTemplate_30b4cb20ac8e1d60f0cd8ea42177d2f8614970339e89ea27390329597b1be6a8 extends Twig_Template
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
        echo " ";
        echo (isset($context["class_suffix"]) ? $context["class_suffix"] : null);
        echo "\">
\t<div class=\"head-title\">
\t\t";
        // line 4
        if ((isset($context["disp_title_module"]) ? $context["disp_title_module"] : null)) {
            echo " 
\t\t\t<h2 class=\"modtitle font-ct\">";
            // line 5
            echo (isset($context["head_name"]) ? $context["head_name"] : null);
            echo "</h2>
\t\t";
        }
        // line 7
        echo "
\t\t";
        // line 8
        if ( !twig_test_empty(trim((isset($context["pre_text"]) ? $context["pre_text"] : null)))) {
            echo " 
\t\t\t<div class=\"form-group\">
\t\t\t\t";
            // line 10
            echo (isset($context["pre_text"]) ? $context["pre_text"] : null);
            echo "
\t\t\t</div>
\t\t";
        }
        // line 13
        echo "\t</div>
\t<div class=\"modcontent\">
\t\t
\t\t";
        // line 16
        if (twig_test_empty((isset($context["products"]) ? $context["products"] : null))) {
            // line 17
            echo "\t\t\t<div class=\"alert alert-info\"><i class=\"fa fa-info-circle\"></i> 
\t\t\t\t";
            // line 18
            echo (isset($context["text_noproduct"]) ? $context["text_noproduct"] : null);
            echo "
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
\t\t\t</div>

\t\t";
        } else {
            // line 23
            echo "\t\t\t";
            $context["count_item"] = twig_length_filter($this->env, (isset($context["products"]) ? $context["products"] : null));
            echo "\t
\t\t\t";
            // line 24
            $context["cls_btn_page"] = ((((isset($context["button_page"]) ? $context["button_page"] : null) == "top")) ? ("buttom-type1") : ("button-type2"));
            echo "\t
\t\t\t";
            // line 25
            $context["btn_type"] = ((((isset($context["button_page"]) ? $context["button_page"] : null) == "top")) ? ("button-type1") : ("button-type2"));
            // line 26
            echo "\t\t\t
\t\t\t";
            // line 27
            $context["tag_id"] = ("so_extra_slider_" . (isset($context["suffix"]) ? $context["suffix"] : null));
            // line 28
            echo "\t\t\t";
            $context["class_respl"] = ((((((((("preset00-" . (isset($context["nb_column0"]) ? $context["nb_column0"] : null)) . " preset01-") . (isset($context["nb_column1"]) ? $context["nb_column1"] : null)) . " preset02-") . (isset($context["nb_column2"]) ? $context["nb_column2"] : null)) . " preset03-") . (isset($context["nb_column3"]) ? $context["nb_column3"] : null)) . " preset04-") . (isset($context["nb_column4"]) ? $context["nb_column4"] : null));
            // line 29
            echo "\t\t\t";
            $context["btn_prev"] = ((((isset($context["button_page"]) ? $context["button_page"] : null) == "top")) ? ("&#171") : ("&#139"));
            // line 30
            echo "\t\t\t";
            $context["btn_next"] = ((((isset($context["button_page"]) ? $context["button_page"] : null) == "top")) ? ("&#187") : ("&#155"));
            // line 31
            echo "\t\t\t";
            $context["i"] = 0;
            // line 32
            echo "
\t\t\t<div id=\"";
            // line 33
            echo (isset($context["tag_id"]) ? $context["tag_id"] : null);
            echo "\" class=\"so-extraslider ";
            echo (isset($context["cls_btn_page"]) ? $context["cls_btn_page"] : null);
            echo " ";
            echo (isset($context["class_respl"]) ? $context["class_respl"] : null);
            echo " ";
            echo (isset($context["btn_type"]) ? $context["btn_type"] : null);
            echo "\">
\t\t\t\t<!-- Begin extraslider-inner -->
\t\t\t\t<div class=\"extraslider-inner products-list grid\" data-effect=\"";
            // line 35
            echo (isset($context["effect"]) ? $context["effect"] : null);
            echo "\">
\t\t\t\t\t";
            // line 36
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
            foreach ($context['_seq'] as $context["i"] => $context["product"]) {
                // line 37
                echo "\t\t\t\t\t\t";
                $context["i"] = ($context["i"] + 1);
                // line 38
                echo "\t\t\t\t\t\t";
                if (((($context["i"] % (isset($context["nb_rows"]) ? $context["nb_rows"] : null)) == 1) || ((isset($context["nb_rows"]) ? $context["nb_rows"] : null) == 1))) {
                    echo " 
\t\t\t\t\t\t<div class=\"item \">
\t\t\t\t\t\t";
                }
                // line 40
                echo " 

\t\t\t\t\t\t\t<div class=\"item-wrap product-layout ";
                // line 42
                echo (isset($context["products_style"]) ? $context["products_style"] : null);
                echo " \">
\t\t\t\t\t\t\t\t<div class=\"item-wrap-inner product-item-container \">
\t\t\t\t\t\t\t\t\t<div class=\"left-block\">
\t\t\t\t\t\t\t\t\t\t<div class=\"product-image-container so-quickview\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"lt-image\" 
\t\t\t\t\t\t\t\t\t\t\t\tdata-product='";
                // line 47
                echo $this->getAttribute($context["product"], "product_id", array());
                echo "' 
\t\t\t\t\t\t\t\t\t\t\t   \thref=\"";
                // line 48
                echo $this->getAttribute($context["product"], "href", array());
                echo "\" target=\"";
                echo (isset($context["item_link_target"]) ? $context["item_link_target"] : null);
                echo "\"
\t\t\t\t\t\t\t\t\t\t\t   \ttitle=\"";
                // line 49
                echo $this->getAttribute($context["product"], "name", array());
                echo "\">

\t\t\t\t\t\t\t\t\t\t\t";
                // line 51
                if (((isset($context["product_image_num"]) ? $context["product_image_num"] : null) == 2)) {
                    // line 52
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                    echo $this->getAttribute($context["product"], "thumb", array());
                    echo "\" class=\"img-1 lazyload\" alt=\"";
                    echo $this->getAttribute($context["product"], "nameFull", array());
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                    // line 53
                    echo $this->getAttribute($context["product"], "thumb2", array());
                    echo "\" class=\"img-2 lazyload\" alt=\"";
                    echo $this->getAttribute($context["product"], "nameFull", array());
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 55
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                    echo $this->getAttribute($context["product"], "thumb", array());
                    echo "\" alt=\"";
                    echo $this->getAttribute($context["product"], "nameFull", array());
                    echo "\" class=\"lazyload\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 57
                echo "\t\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"box-label\">
\t\t\t\t\t\t\t\t\t\t\t";
                // line 61
                if (($this->getAttribute($context["product"], "special", array()) && (isset($context["display_sale"]) ? $context["display_sale"] : null))) {
                    echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"label-product label-sale\">";
                    // line 62
                    echo $this->getAttribute($context["product"], "discount", array());
                    echo " </span>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 63
                echo " 

\t\t\t\t\t\t\t\t\t\t\t";
                // line 65
                if (($this->getAttribute($context["product"], "productNew", array()) && (isset($context["display_new"]) ? $context["display_new"] : null))) {
                    echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"label-product label-new\">";
                    // line 66
                    echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "text_new"), "method");
                    echo " </span>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 67
                echo " 
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                // line 69
                if ((((isset($context["display_addtocart"]) ? $context["display_addtocart"] : null) || (isset($context["display_wishlist"]) ? $context["display_wishlist"] : null)) || (isset($context["display_compare"]) ? $context["display_compare"] : null))) {
                    echo " 
\t\t\t\t\t\t\t\t\t\t\t<div class=\"button-group\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 71
                    if ((isset($context["display_addtocart"]) ? $context["display_addtocart"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"addToCart btn-button\" type=\"button\" onclick=\"cart.add('";
                        // line 72
                        echo $this->getAttribute($context["product"], "product_id", array());
                        echo " ');\"><i class=\"fa fa-shopping-cart hidden-lg hidden-md\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 73
                        if (((isset($context["nb_column0"]) ? $context["nb_column0"] : null) != 6)) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"hidden-xs hidden-sm\">";
                            // line 74
                            echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "button_cart"), "method");
                            echo " </span>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 75
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 77
                    echo " 
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 78
                    if ((isset($context["display_wishlist"]) ? $context["display_wishlist"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"wishlist btn-button\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                        // line 79
                        echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "button_wishlist"), "method");
                        echo " \" onclick=\"wishlist.add('";
                        echo $this->getAttribute($context["product"], "product_id", array());
                        echo " ');\"><i class=\"fa fa-heart\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 80
                    echo " 
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 81
                    if ((isset($context["display_compare"]) ? $context["display_compare"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"compare btn-button\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                        // line 82
                        echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "button_compare"), "method");
                        echo " \" onclick=\"compare.add('";
                        echo $this->getAttribute($context["product"], "product_id", array());
                        echo " ');\"><i class=\"fa fa-exchange\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 84
                    echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 86
                echo "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t";
                // line 88
                if ((((isset($context["display_title"]) ? $context["display_title"] : null) || (isset($context["display_description"]) ? $context["display_description"] : null)) || (isset($context["display_price"]) ? $context["display_price"] : null))) {
                    echo " 
\t\t\t\t\t\t\t\t\t\t<div class=\"right-block\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 91
                    echo "\t\t\t\t\t\t\t\t\t\t ";
                    // line 92
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                    // line 93
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                    // line 94
                    echo "\t\t\t\t\t\t\t\t\t  ";
                    // line 95
                    echo "\t\t\t\t\t\t\t\t\t  ";
                    // line 96
                    echo "\t\t\t\t\t\t\t\t\t  ";
                    // line 97
                    echo "\t\t\t\t\t\t\t\t\t        
\t\t\t\t\t\t\t\t\t  ";
                    // line 99
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                    // line 100
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 101
                    if ((isset($context["display_title"]) ? $context["display_title"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"font-ct\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 104
                        echo $this->getAttribute($context["product"], "href", array());
                        echo "\" target=\"";
                        echo (isset($context["item_link_target"]) ? $context["item_link_target"] : null);
                        echo "\" title=\"";
                        echo $this->getAttribute($context["product"], "nameFull", array());
                        echo " \"  >
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 105
                        echo $this->getAttribute($context["product"], "name", array());
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 108
                        if ((isset($context["display_price"]) ? $context["display_price"] : null)) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div  class=\"content_price\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 110
                            if ( !$this->getAttribute($context["product"], "special", array())) {
                                echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price product-price\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 112
                                echo $this->getAttribute($context["product"], "price", array());
                                echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 114
                                echo "   
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"old-price product-price\">";
                                // line 115
                                echo $this->getAttribute($context["product"], "special", array());
                                echo " </span>&nbsp;&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                // line 116
                                echo $this->getAttribute($context["product"], "price", array());
                                echo " </span>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 117
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 120
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 122
                    echo " 

\t\t\t\t\t\t\t\t\t\t\t";
                    // line 124
                    if ((isset($context["display_rating"]) ? $context["display_rating"] : null)) {
                        // line 125
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ($this->getAttribute($context["product"], "rating", array())) {
                            // line 126
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 127
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(range(1, 5));
                            foreach ($context['_seq'] as $context["_key"] => $context["k"]) {
                                // line 128
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["k"] = ($context["k"] + 1);
                                // line 129
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                if (($this->getAttribute($context["product"], "rating", array()) < $context["k"])) {
                                    echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t \t";
                                } else {
                                    // line 131
                                    echo "   
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 133
                                echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['k'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 134
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 136
                            echo "  
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 138
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(range(1, 5));
                            foreach ($context['_seq'] as $context["_key"] => $context["j"]) {
                                // line 139
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["j"] = ($context["j"] + 1);
                                // line 140
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['j'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 141
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 144
                        echo "\t
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 145
                    echo "\t\t
\t\t\t\t\t\t\t\t\t\t\t

\t\t\t\t\t\t\t\t\t\t\t";
                    // line 148
                    if ((isset($context["display_description"]) ? $context["display_description"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"item-des\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 151
                        echo $this->getAttribute($context["product"], "description", array());
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 154
                    echo " 
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<!-- End item-info -->
\t\t\t\t\t\t\t\t\t";
                }
                // line 157
                echo " 
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<!-- End item-wrap-inner -->
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<!-- End item-wrap -->

\t\t\t\t\t\t";
                // line 163
                if (((($context["i"] % (isset($context["nb_rows"]) ? $context["nb_rows"] : null)) == 0) || ($context["i"] == (isset($context["count_item"]) ? $context["count_item"] : null)))) {
                    echo " 
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 165
                echo " 

\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 167
            echo "\t 
\t\t\t\t</div>
\t\t\t\t<!--End extraslider-inner -->
<div class=\"see-all-mans\">
                    <div class=\"text-center\">
                      <a href=\"/promotsii\" class=\"see-all-mans-btn\"> <!--  target=\"_blank\" 09.01.2023 -->
                        Виж всички
                        </a>
                    </div>
                  </div>
\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t//<![CDATA[
\t\t\t\tjQuery(document).ready(function (\$) {
\t\t\t\t\t(function (element) {
\t\t\t\t\t\tvar \$element = \$(element),
\t\t\t\t\t\t\t\t\$extraslider = \$(\".extraslider-inner\", \$element),
\t\t\t\t\t\t\t\t_delay = ";
            // line 183
            echo (isset($context["delay"]) ? $context["delay"] : null);
            echo " ,
\t\t\t\t\t\t\t\t_duration = ";
            // line 184
            echo (isset($context["duration"]) ? $context["duration"] : null);
            echo " ,
\t\t\t\t\t\t\t\t_effect = '";
            // line 185
            echo (isset($context["effect"]) ? $context["effect"] : null);
            echo " ';

\t\t\t\t\t\t\$extraslider.on(\"initialized.owl.carousel2\", function () {
\t\t\t\t\t\t\tvar \$item_active = \$(\".owl2-item.active\", \$element);
\t\t\t\t\t\t\tif (\$item_active.length > 1 && _effect != \"none\") {
\t\t\t\t\t\t\t\t_getAnimate(\$item_active);
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\telse {
\t\t\t\t\t\t\t\tvar \$item = \$(\".owl2-item\", \$element);
\t\t\t\t\t\t\t\t\$item.css({\"opacity\": 1, \"filter\": \"alpha(opacity = 100)\"});
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t";
            // line 196
            if (((isset($context["dots"]) ? $context["dots"] : null) == "true")) {
                echo " 
\t\t\t\t\t\t\tif (\$(\".owl2-dot\", \$element).length < 2) {
\t\t\t\t\t\t\t\t\$(\".owl2-prev\", \$element).css(\"display\", \"none\");
\t\t\t\t\t\t\t\t\$(\".owl2-next\", \$element).css(\"display\", \"none\");
\t\t\t\t\t\t\t\t\$(\".owl2-dot\", \$element).css(\"display\", \"none\");
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t";
            }
            // line 203
            echo "
\t\t\t\t\t\t\t";
            // line 204
            if (((isset($context["button_page"]) ? $context["button_page"] : null) == "top")) {
                echo " 
\t\t\t\t\t\t\t\t\$(\".owl2-controls\", \$element).insertBefore(\$extraslider);
\t\t\t\t\t\t\t\t\$(\".owl2-dots\", \$element).insertAfter(\$(\".owl2-prev\", \$element));
\t\t\t\t\t\t\t";
            } else {
                // line 207
                echo "  
\t\t\t\t\t\t\t\t\$(\".owl2-nav\", \$element).insertBefore(\$extraslider);
\t\t\t\t\t\t\t\t\$(\".owl2-controls\", \$element).insertAfter(\$extraslider);
\t\t\t\t\t\t\t";
            }
            // line 211
            echo "
\t\t\t\t\t\t});

\t\t\t\t\t\t\$extraslider.owlCarousel2({
\t\t\t\t\t\t\trtl: ";
            // line 215
            echo (isset($context["direction"]) ? $context["direction"] : null);
            echo ",
\t\t\t\t\t\t\tcenter: 1,
\t\t\t\t\t\t\tmargin: ";
            // line 217
            echo (isset($context["margin"]) ? $context["margin"] : null);
            echo ",
\t\t\t\t\t\t\tslideBy: ";
            // line 218
            echo (isset($context["slideBy"]) ? $context["slideBy"] : null);
            echo ",
\t\t\t\t\t\t\tautoplay: ";
            // line 219
            echo (isset($context["autoplay"]) ? $context["autoplay"] : null);
            echo ",
\t\t\t\t\t\t\tautoplayHoverPause: ";
            // line 220
            echo (isset($context["autoplayHoverPause"]) ? $context["autoplayHoverPause"] : null);
            echo ",
\t\t\t\t\t\t\tautoplayTimeout: ";
            // line 221
            echo (isset($context["autoplayTimeout"]) ? $context["autoplayTimeout"] : null);
            echo " ,
\t\t\t\t\t\t\tautoplaySpeed: ";
            // line 222
            echo (isset($context["autoplaySpeed"]) ? $context["autoplaySpeed"] : null);
            echo " ,
\t\t\t\t\t\t\tstartPosition: ";
            // line 223
            echo (isset($context["startPosition"]) ? $context["startPosition"] : null);
            echo " ,
\t\t\t\t\t\t\tmouseDrag: ";
            // line 224
            echo (isset($context["mouseDrag"]) ? $context["mouseDrag"] : null);
            echo ",
\t\t\t\t\t\t\ttouchDrag: ";
            // line 225
            echo (isset($context["touchDrag"]) ? $context["touchDrag"] : null);
            echo " ,
\t\t\t\t\t\t\tautoWidth: false,
\t\t\t\t\t\t\tresponsive: {
\t\t\t\t\t\t\t\t0: \t{ items: ";
            // line 228
            echo (isset($context["nb_column4"]) ? $context["nb_column4"] : null);
            echo " } ,
\t\t\t\t\t\t\t\t480: { items: ";
            // line 229
            echo (isset($context["nb_column3"]) ? $context["nb_column3"] : null);
            echo " },
\t\t\t\t\t\t\t\t768: { items: ";
            // line 230
            echo (isset($context["nb_column2"]) ? $context["nb_column2"] : null);
            echo " },
\t\t\t\t\t\t\t\t992: { items: ";
            // line 231
            echo (isset($context["nb_column1"]) ? $context["nb_column1"] : null);
            echo " },
\t\t\t\t\t\t\t\t1200: {items: ";
            // line 232
            echo (isset($context["nb_column0"]) ? $context["nb_column0"] : null);
            echo "}
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\tdotClass: \"owl2-dot\",
\t\t\t\t\t\t\tdotsClass: \"owl2-dots\",
\t\t\t\t\t\t\tdots: ";
            // line 236
            echo (isset($context["dots"]) ? $context["dots"] : null);
            echo " ,
\t\t\t\t\t\t\tdotsSpeed:";
            // line 237
            echo (isset($context["dotsSpeed"]) ? $context["dotsSpeed"] : null);
            echo " ,
\t\t\t\t\t\t\tnav: ";
            // line 238
            echo (isset($context["nav"]) ? $context["nav"] : null);
            echo " ,
\t\t\t\t\t\t\tloop: ";
            // line 239
            echo (isset($context["loop"]) ? $context["loop"] : null);
            echo " ,
\t\t\t\t\t\t\tnavSpeed: ";
            // line 240
            echo (isset($context["navSpeed"]) ? $context["navSpeed"] : null);
            echo " ,
\t\t\t\t\t\t\tnavText: [\"\", \"\"],
\t\t\t\t\t\t\tnavClass: [\"owl2-prev\", \"owl2-next\"]

\t\t\t\t\t\t});

\t\t\t\t\t\t\$extraslider.on(\"translate.owl.carousel2\", function (e) {
\t\t\t\t\t\t\t";
            // line 247
            if (((isset($context["dots"]) ? $context["dots"] : null) == "true")) {
                echo " 
\t\t\t\t\t\t\tif (\$(\".owl2-dot\", \$element).length < 2) {
\t\t\t\t\t\t\t\t\$(\".owl2-prev\", \$element).css(\"display\", \"none\");
\t\t\t\t\t\t\t\t\$(\".owl2-next\", \$element).css(\"display\", \"none\");
\t\t\t\t\t\t\t\t\$(\".owl2-dot\", \$element).css(\"display\", \"none\");
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t";
            }
            // line 253
            echo " 

\t\t\t\t\t\t\tvar \$item_active = \$(\".owl2-item.active\", \$element);
\t\t\t\t\t\t\t_UngetAnimate(\$item_active);
\t\t\t\t\t\t\t_getAnimate(\$item_active);
\t\t\t\t\t\t});

\t\t\t\t\t\t\$extraslider.on(\"translated.owl.carousel2\", function (e) {

\t\t\t\t\t\t\t";
            // line 262
            if (((isset($context["dots"]) ? $context["dots"] : null) == "true")) {
                echo " 
\t\t\t\t\t\t\tif (\$(\".owl2-dot\", \$element).length < 2) {
\t\t\t\t\t\t\t\t\$(\".owl2-prev\", \$element).css(\"display\", \"none\");
\t\t\t\t\t\t\t\t\$(\".owl2-next\", \$element).css(\"display\", \"none\");
\t\t\t\t\t\t\t\t\$(\".owl2-dot\", \$element).css(\"display\", \"none\");
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t";
            }
            // line 268
            echo " 

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
            // line 322
            echo (isset($context["tag_id"]) ? $context["tag_id"] : null);
            echo " \");
\t\t\t\t});
\t\t\t\t//]]>
\t\t\t</script>

\t\t\t</div>
\t\t";
        }
        // line 329
        echo "\t
\t</div> 
\t";
        // line 331
        if ( !twig_test_empty(trim((isset($context["post_text"]) ? $context["post_text"] : null)))) {
            echo " 
\t\t<div class=\"viewall\">
\t\t\t";
            // line 333
            echo (isset($context["post_text"]) ? $context["post_text"] : null);
            echo "
\t\t</div>
\t";
        }
        // line 336
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/module/so_extra_slider/layout10_center.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  753 => 336,  747 => 333,  742 => 331,  738 => 329,  728 => 322,  672 => 268,  662 => 262,  651 => 253,  641 => 247,  631 => 240,  627 => 239,  623 => 238,  619 => 237,  615 => 236,  608 => 232,  604 => 231,  600 => 230,  596 => 229,  592 => 228,  586 => 225,  582 => 224,  578 => 223,  574 => 222,  570 => 221,  566 => 220,  562 => 219,  558 => 218,  554 => 217,  549 => 215,  543 => 211,  537 => 207,  530 => 204,  527 => 203,  517 => 196,  503 => 185,  499 => 184,  495 => 183,  477 => 167,  469 => 165,  463 => 163,  455 => 157,  449 => 154,  442 => 151,  436 => 148,  431 => 145,  427 => 144,  421 => 141,  414 => 140,  411 => 139,  407 => 138,  403 => 136,  398 => 134,  391 => 133,  386 => 131,  379 => 129,  376 => 128,  372 => 127,  369 => 126,  366 => 125,  364 => 124,  360 => 122,  355 => 120,  349 => 117,  344 => 116,  340 => 115,  337 => 114,  331 => 112,  326 => 110,  321 => 108,  315 => 105,  307 => 104,  301 => 101,  298 => 100,  296 => 99,  293 => 97,  291 => 96,  289 => 95,  287 => 94,  285 => 93,  283 => 92,  281 => 91,  276 => 88,  272 => 86,  268 => 84,  261 => 82,  257 => 81,  254 => 80,  247 => 79,  243 => 78,  240 => 77,  235 => 75,  230 => 74,  226 => 73,  222 => 72,  218 => 71,  213 => 69,  209 => 67,  204 => 66,  200 => 65,  196 => 63,  191 => 62,  187 => 61,  181 => 57,  173 => 55,  166 => 53,  159 => 52,  157 => 51,  152 => 49,  146 => 48,  142 => 47,  134 => 42,  130 => 40,  123 => 38,  120 => 37,  116 => 36,  112 => 35,  101 => 33,  98 => 32,  95 => 31,  92 => 30,  89 => 29,  86 => 28,  84 => 27,  81 => 26,  79 => 25,  75 => 24,  70 => 23,  62 => 18,  59 => 17,  57 => 16,  52 => 13,  46 => 10,  41 => 8,  38 => 7,  33 => 5,  29 => 4,  22 => 2,  19 => 1,);
    }
}
/* */
/* <div class="module {{direction_class}} {{ class_suffix }}">*/
/* 	<div class="head-title">*/
/* 		{% if disp_title_module %} */
/* 			<h2 class="modtitle font-ct">{{ head_name }}</h2>*/
/* 		{% endif %}*/
/* */
/* 		{% if pre_text|trim is not empty  %} */
/* 			<div class="form-group">*/
/* 				{{ pre_text }}*/
/* 			</div>*/
/* 		{% endif %}*/
/* 	</div>*/
/* 	<div class="modcontent">*/
/* 		*/
/* 		{% if products is empty %}*/
/* 			<div class="alert alert-info"><i class="fa fa-info-circle"></i> */
/* 				{{ text_noproduct }}*/
/* 				<button type="button" class="close" data-dismiss="alert">×</button>*/
/* 			</div>*/
/* */
/* 		{% else %}*/
/* 			{% set count_item 	= products|length %}	*/
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
/* 				<!-- Begin extraslider-inner -->*/
/* 				<div class="extraslider-inner products-list grid" data-effect="{{effect}}">*/
/* 					{% for i, product in products %}*/
/* 						{% set i = i + 1 %}*/
/* 						{% if i % nb_rows  ==  1  or  nb_rows  ==  1 %} */
/* 						<div class="item ">*/
/* 						{% endif %} */
/* */
/* 							<div class="item-wrap product-layout {{ products_style }} ">*/
/* 								<div class="item-wrap-inner product-item-container ">*/
/* 									<div class="left-block">*/
/* 										<div class="product-image-container so-quickview">*/
/* 											<a class="lt-image" */
/* 												data-product='{{product.product_id}}' */
/* 											   	href="{{ product.href }}" target="{{ item_link_target }}"*/
/* 											   	title="{{ product.name }}">*/
/* */
/* 											{% if product_image_num ==2 %}*/
/* 														<img data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ product.thumb }}" class="img-1 lazyload" alt="{{ product.nameFull }}">*/
/* 														<img data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ product.thumb2 }}" class="img-2 lazyload" alt="{{ product.nameFull }}">*/
/* 													{% else %}*/
/* 														<img data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ product.thumb }}" alt="{{ product.nameFull }}" class="lazyload">*/
/* 													{% endif %}*/
/* 											</a>*/
/* */
/* 										</div>*/
/* 										<div class="box-label">*/
/* 											{% if product.special  and  display_sale  %} */
/* 												<span class="label-product label-sale">{{ product.discount }} </span>*/
/* 											{% endif %} */
/* */
/* 											{% if product.productNew  and  display_new  %} */
/* 												<span class="label-product label-new">{{ objlang.get('text_new') }} </span>*/
/* 											{% endif %} */
/* 										</div>*/
/* 										{% if display_addtocart  or  display_wishlist  or  display_compare %} */
/* 											<div class="button-group">*/
/* 												{% if display_addtocart  %} */
/* 												<button class="addToCart btn-button" type="button" onclick="cart.add('{{ product.product_id }} ');"><i class="fa fa-shopping-cart hidden-lg hidden-md"></i>*/
/* 													{% if nb_column0  !=  6 %} */
/* 													<span class="hidden-xs hidden-sm">{{ objlang.get('button_cart') }} </span>*/
/* 													{% endif %} */
/* 												</button>*/
/* 												{% endif %} */
/* 												{% if display_wishlist  %} */
/* 												<button class="wishlist btn-button" type="button" data-toggle="tooltip" title="{{ objlang.get('button_wishlist') }} " onclick="wishlist.add('{{ product.product_id }} ');"><i class="fa fa-heart"></i></button>*/
/* 												{% endif %} */
/* 												{% if display_compare %} */
/* 												<button class="compare btn-button" type="button" data-toggle="tooltip" title="{{ objlang.get('button_compare') }} " onclick="compare.add('{{ product.product_id }} ');"><i class="fa fa-exchange"></i></button>*/
/* 												{% endif %}*/
/* 											</div>*/
/* 										{% endif %}*/
/* 									</div>*/
/* */
/* 									{% if display_title   or  display_description  or  display_price %} */
/* 										<div class="right-block">*/
/* 											{#{% for x in 0..product.tag|length %}#}*/
/* 										 {#    {% if x < (product.tag|length - 1) %}#}*/
/* 											{#    <a class="product-tag" href="{{product.href_tag[x]}}">{{product.tag[x]}}</a>, #}*/
/* 											{# {% else %} #}*/
/* 									  {#          {% if product.tag[x] is not empty  %}#}*/
/* 									  {#          <a class="product-tag 22" href="{{product.href_tag[x]}}">{{product.tag[x]}}</a>#}*/
/* 									  {#       {% endif %}#}*/
/* 									        */
/* 									  {#      {% endif %}#}*/
/* 											{#{% endfor %}#}*/
/* 												*/
/* 											{% if display_title %} */
/* 												<div class="caption">*/
/* 													<h4 class="font-ct">*/
/* 														<a href="{{ product.href }}" target="{{ item_link_target }}" title="{{ product.nameFull }} "  >*/
/* 															{{ product.name }} */
/* 														</a>*/
/* 													</h4>*/
/* 													{% if display_price %} */
/* 														<div  class="content_price">*/
/* 															{% if not product.special %} */
/* 																<span class="price product-price">*/
/* 																	{{ product.price }} */
/* 																</span>*/
/* 															{% else %}   */
/* 																<span class="old-price product-price">{{ product.special }} </span>&nbsp;&nbsp;*/
/* 																<span class="price-old">{{ product.price }} </span>&nbsp;*/
/* 															{% endif %} */
/* 															*/
/* 														</div>*/
/* 													{% endif %} */
/* 												</div>*/
/* 											{% endif %} */
/* */
/* 											{% if display_rating %}*/
/* 												{% if product.rating %}*/
/* 													<div class="rating">*/
/* 														{% for k in 1..5 %}*/
/* 															{% set k = k + 1 %}*/
/* 															{% if product.rating < k %} */
/* 																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/* 														 	{% else %}   */
/* 																<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/* 															{% endif %} */
/* 														{% endfor %} */
/* 													</div>*/
/* 												{% else %}  */
/* 												<div class="rating">*/
/* 													{% for j in 1..5 %}*/
/* 														{% set j = j + 1 %}*/
/* 														<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/* 													{% endfor %} */
/* 													*/
/* 												</div>*/
/* 												{% endif %}	*/
/* 											{% endif %}		*/
/* 											*/
/* */
/* 											{% if display_description %} */
/* 												<div class="item-content">*/
/* 														<div class="item-des">*/
/* 															{{ product.description }} */
/* 														</div>*/
/* 												</div>*/
/* 											{% endif %} */
/* 										</div>*/
/* 										<!-- End item-info -->*/
/* 									{% endif %} */
/* 								</div>*/
/* 								<!-- End item-wrap-inner -->*/
/* 							</div>*/
/* 							<!-- End item-wrap -->*/
/* */
/* 						{% if i % nb_rows  ==  0  or  i  ==  count_item %} */
/* 						</div>*/
/* 						{% endif %} */
/* */
/* 					{% endfor %}	 */
/* 				</div>*/
/* 				<!--End extraslider-inner -->*/
/* <div class="see-all-mans">*/
/*                     <div class="text-center">*/
/*                       <a href="/promotsii" class="see-all-mans-btn"> <!--  target="_blank" 09.01.2023 -->*/
/*                         Виж всички*/
/*                         </a>*/
/*                     </div>*/
/*                   </div>*/
/* 				<script type="text/javascript">*/
/* 				//<![CDATA[*/
/* 				jQuery(document).ready(function ($) {*/
/* 					(function (element) {*/
/* 						var $element = $(element),*/
/* 								$extraslider = $(".extraslider-inner", $element),*/
/* 								_delay = {{ delay }} ,*/
/* 								_duration = {{ duration }} ,*/
/* 								_effect = '{{ effect }} ';*/
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
/* 							{% if dots  ==  "true" %} */
/* 							if ($(".owl2-dot", $element).length < 2) {*/
/* 								$(".owl2-prev", $element).css("display", "none");*/
/* 								$(".owl2-next", $element).css("display", "none");*/
/* 								$(".owl2-dot", $element).css("display", "none");*/
/* 							}*/
/* 							{% endif %}*/
/* */
/* 							{% if button_page  ==  "top" %} */
/* 								$(".owl2-controls", $element).insertBefore($extraslider);*/
/* 								$(".owl2-dots", $element).insertAfter($(".owl2-prev", $element));*/
/* 							{% else %}  */
/* 								$(".owl2-nav", $element).insertBefore($extraslider);*/
/* 								$(".owl2-controls", $element).insertAfter($extraslider);*/
/* 							{% endif %}*/
/* */
/* 						});*/
/* */
/* 						$extraslider.owlCarousel2({*/
/* 							rtl: {{ direction}},*/
/* 							center: 1,*/
/* 							margin: {{ margin }},*/
/* 							slideBy: {{ slideBy }},*/
/* 							autoplay: {{ autoplay }},*/
/* 							autoplayHoverPause: {{ autoplayHoverPause  }},*/
/* 							autoplayTimeout: {{ autoplayTimeout }} ,*/
/* 							autoplaySpeed: {{ autoplaySpeed }} ,*/
/* 							startPosition: {{ startPosition }} ,*/
/* 							mouseDrag: {{ mouseDrag }},*/
/* 							touchDrag: {{ touchDrag }} ,*/
/* 							autoWidth: false,*/
/* 							responsive: {*/
/* 								0: 	{ items: {{ nb_column4 }} } ,*/
/* 								480: { items: {{ nb_column3 }} },*/
/* 								768: { items: {{ nb_column2 }} },*/
/* 								992: { items: {{ nb_column1 }} },*/
/* 								1200: {items: {{ nb_column0 }}}*/
/* 							},*/
/* 							dotClass: "owl2-dot",*/
/* 							dotsClass: "owl2-dots",*/
/* 							dots: {{ dots }} ,*/
/* 							dotsSpeed:{{ dotsSpeed }} ,*/
/* 							nav: {{ nav }} ,*/
/* 							loop: {{ loop }} ,*/
/* 							navSpeed: {{ navSpeed }} ,*/
/* 							navText: ["", ""],*/
/* 							navClass: ["owl2-prev", "owl2-next"]*/
/* */
/* 						});*/
/* */
/* 						$extraslider.on("translate.owl.carousel2", function (e) {*/
/* 							{% if dots  ==  "true" %} */
/* 							if ($(".owl2-dot", $element).length < 2) {*/
/* 								$(".owl2-prev", $element).css("display", "none");*/
/* 								$(".owl2-next", $element).css("display", "none");*/
/* 								$(".owl2-dot", $element).css("display", "none");*/
/* 							}*/
/* 							{% endif %} */
/* */
/* 							var $item_active = $(".owl2-item.active", $element);*/
/* 							_UngetAnimate($item_active);*/
/* 							_getAnimate($item_active);*/
/* 						});*/
/* */
/* 						$extraslider.on("translated.owl.carousel2", function (e) {*/
/* */
/* 							{% if dots  ==  "true" %} */
/* 							if ($(".owl2-dot", $element).length < 2) {*/
/* 								$(".owl2-prev", $element).css("display", "none");*/
/* 								$(".owl2-next", $element).css("display", "none");*/
/* 								$(".owl2-dot", $element).css("display", "none");*/
/* 							}*/
/* 							{% endif %} */
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
/* 					})("#{{ tag_id  }} ");*/
/* 				});*/
/* 				//]]>*/
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
