<?php

/* so-revo/template/product/product.twig */
class __TwigTemplate_cac13031d2c535e7fc3457a9511a0fd91c74a50a6b3882b13f4d049a83819178 extends Twig_Template
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
        echo (isset($context["header"]) ? $context["header"] : null);
        echo "

";
        // line 5
        echo "
";
        // line 7
        if ((isset($context["url_asidePosition"]) ? $context["url_asidePosition"] : null)) {
            $context["col_position"] = (isset($context["url_asidePosition"]) ? $context["url_asidePosition"] : null);
        } else {
            // line 8
            $context["col_position"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "catalog_col_position"), "method");
        }
        // line 9
        echo "
";
        // line 10
        if ((isset($context["url_asideType"]) ? $context["url_asideType"] : null)) {
            echo " ";
            $context["col_canvas"] = (isset($context["url_asideType"]) ? $context["url_asideType"] : null);
        } else {
            // line 11
            $context["col_canvas"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "catalog_col_type"), "method");
        }
        // line 12
        echo "
";
        // line 13
        if ((isset($context["url_productGallery"]) ? $context["url_productGallery"] : null)) {
            echo " ";
            $context["productGallery"] = (isset($context["url_productGallery"]) ? $context["url_productGallery"] : null);
        } else {
            // line 14
            $context["productGallery"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "thumbnails_position"), "method");
        }
        // line 15
        echo "
";
        // line 16
        if ((isset($context["url_sidebarsticky"]) ? $context["url_sidebarsticky"] : null)) {
            echo " ";
            $context["sidebar_sticky"] = (isset($context["url_sidebarsticky"]) ? $context["url_sidebarsticky"] : null);
        } else {
            // line 17
            echo " ";
            $context["sidebar_sticky"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "catalog_sidebar_sticky"), "method");
        }
        // line 18
        echo "
";
        // line 19
        $context["desktop_canvas"] = ((((isset($context["col_canvas"]) ? $context["col_canvas"] : null) == "off_canvas")) ? ("desktop-offcanvas") : (""));
        // line 20
        echo "
<div class=\"content-main container product-detail  ";
        // line 21
        echo (isset($context["desktop_canvas"]) ? $context["desktop_canvas"] : null);
        echo "\">
\t<div class=\"row\">
\t\t<ul class=\"breadcrumb\">
\t\t\t";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 25
            echo "\t\t\t\t<li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "\t\t</ul>

\t\t";
        // line 30
        echo "
\t\t";
        // line 31
        if (((isset($context["col_position"]) ? $context["col_position"] : null) == "outside")) {
            // line 32
            echo "\t\t\t";
            echo (isset($context["column_left"]) ? $context["column_left"] : null);
            echo "

\t\t\t";
            // line 34
            if (((isset($context["col_canvas"]) ? $context["col_canvas"] : null) == "off_canvas")) {
                // line 35
                echo "\t\t\t\t";
                $context["class_pos"] = "col-sm-12";
                // line 36
                echo "\t\t\t";
            } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
                // line 37
                echo "\t\t\t\t";
                $context["class_pos"] = "col-md-6 col-xs-12 fluid-allsidebar";
                // line 38
                echo "\t\t\t";
            } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
                // line 39
                echo "\t\t\t\t";
                $context["class_pos"] = "col-md-9 col-sm-12 col-xs-12 fluid-sidebar";
                // line 40
                echo "\t\t\t";
            } else {
                // line 41
                echo "\t\t\t\t";
                $context["class_pos"] = "col-sm-12";
                // line 42
                echo "\t\t\t";
            }
            // line 43
            echo "\t\t";
        } else {
            // line 44
            echo "\t\t\t";
            $context["class_pos"] = "col-sm-12";
            // line 45
            echo "\t\t";
        }
        // line 46
        echo "\t\t";
        // line 47
        echo "
\t\t<div id=\"content\" class=\"product-view ";
        // line 48
        echo (isset($context["class_pos"]) ? $context["class_pos"] : null);
        echo "\">

\t\t\t";
        // line 51
        echo "\t\t\t";
        if (((isset($context["productGallery"]) ? $context["productGallery"] : null) == "grid")) {
            // line 52
            echo "\t\t\t\t";
            $context["class_left_gallery"] = "col-md-6 col-sm-12 col-xs-12";
            // line 53
            echo "\t\t\t\t";
            $context["class_right_gallery"] = "col-md-6 col-sm-12 col-xs-12";
            // line 54
            echo "\t\t\t";
        } elseif (((isset($context["productGallery"]) ? $context["productGallery"] : null) == "list")) {
            // line 55
            echo "\t\t\t\t";
            $context["class_left_gallery"] = "col-md-5 col-sm-12 col-xs-12";
            // line 56
            echo "\t\t\t\t";
            $context["class_right_gallery"] = "col-md-7 col-sm-12 col-xs-12";
            // line 57
            echo "\t\t\t";
        } elseif (((isset($context["productGallery"]) ? $context["productGallery"] : null) == "left")) {
            // line 58
            echo "\t\t\t\t";
            $context["class_left_gallery"] = "col-md-6 col-sm-12 col-xs-12";
            // line 59
            echo "\t\t\t\t";
            $context["class_right_gallery"] = "col-md-6 col-sm-12 col-xs-12";
            // line 60
            echo "\t\t\t";
        } elseif (((isset($context["productGallery"]) ? $context["productGallery"] : null) == "bottom")) {
            // line 61
            echo "\t\t\t\t";
            $context["class_left_gallery"] = "col-md-5 col-sm-12 col-xs-12";
            // line 62
            echo "\t\t\t\t";
            $context["class_right_gallery"] = "col-md-7 col-sm-12 col-xs-12";
            // line 63
            echo "\t\t\t";
        } else {
            // line 64
            echo "\t\t\t\t";
            $context["class_left_gallery"] = "col-md-12 col-sm-12 col-xs-12";
            // line 65
            echo "\t\t\t\t";
            $context["class_right_gallery"] = "col-md-12 col-sm-12 col-xs-12 col-gallery-slider";
            // line 66
            echo "\t\t\t";
        }
        // line 67
        echo "
\t\t\t";
        // line 69
        echo "\t\t\t";
        if (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 70
            echo "\t\t\t\t";
            $context["class_canvas"] = ((((isset($context["col_canvas"]) ? $context["col_canvas"] : null) == "off_canvas")) ? ("") : ("hidden-lg hidden-md"));
            // line 71
            echo "\t\t\t\t<a href=\"javascript:void(0)\" class=\" open-sidebar ";
            echo (isset($context["class_canvas"]) ? $context["class_canvas"] : null);
            echo "\"><i
\t\t\t\t\t\t\tclass=\"fa fa-bars\"></i>";
            // line 72
            echo (isset($context["text_sidebar"]) ? $context["text_sidebar"] : null);
            echo "</a>
\t\t\t\t<div class=\"sidebar-overlay \"></div>
\t\t\t";
        }
        // line 75
        echo "

\t\t\t<div class=\"content-product-mainheader clearfix\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t";
        // line 80
        echo "\t\t\t\t\t<div class=\"content-product-left  ";
        echo (isset($context["class_left_gallery"]) ? $context["class_left_gallery"] : null);
        echo "\">
\t\t\t\t\t\t";
        // line 81
        if ((isset($context["images"]) ? $context["images"] : null)) {
            // line 82
            echo "\t\t\t\t\t\t\t<div class=\"so-loadeding\"></div>
\t\t\t\t\t\t\t";
            // line 84
            echo "\t\t\t\t\t\t\t";
            if (((isset($context["productGallery"]) ? $context["productGallery"] : null) == "left")) {
                // line 85
                echo "\t\t\t\t\t\t\t\t";
                $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/product/gallery/gallery-left.twig"), "so-revo/template/product/product.twig", 85)->display($context);
                // line 86
                echo "
\t\t\t\t\t\t\t";
            } elseif ((            // line 87
(isset($context["productGallery"]) ? $context["productGallery"] : null) == "bottom")) {
                // line 88
                echo "\t\t\t\t\t\t\t\t";
                $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/product/gallery/gallery-bottom.twig"), "so-revo/template/product/product.twig", 88)->display($context);
                // line 89
                echo "
\t\t\t\t\t\t\t";
            } elseif ((            // line 90
(isset($context["productGallery"]) ? $context["productGallery"] : null) == "grid")) {
                // line 91
                echo "\t\t\t\t\t\t\t\t";
                $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/product/gallery/gallery-grid.twig"), "so-revo/template/product/product.twig", 91)->display($context);
                // line 92
                echo "
\t\t\t\t\t\t\t";
            } elseif ((            // line 93
(isset($context["productGallery"]) ? $context["productGallery"] : null) == "list")) {
                // line 94
                echo "\t\t\t\t\t\t\t\t";
                $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/product/gallery/gallery-list.twig"), "so-revo/template/product/product.twig", 94)->display($context);
                // line 95
                echo "
\t\t\t\t\t\t\t";
            } elseif ((            // line 96
(isset($context["productGallery"]) ? $context["productGallery"] : null) == "slider")) {
                // line 97
                echo "\t\t\t\t\t\t\t\t";
                $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/product/gallery/gallery-slider.twig"), "so-revo/template/product/product.twig", 97)->display($context);
                // line 98
                echo "\t\t\t\t\t\t\t";
            }
            // line 99
            echo "\t\t\t\t\t\t";
        }
        // line 100
        echo "\t\t\t\t\t</div>
\t\t\t\t\t";
        // line 102
        echo "
\t\t\t\t\t";
        // line 104
        echo "\t\t\t\t\t<div class=\"content-product-right ";
        echo (isset($context["class_right_gallery"]) ? $context["class_right_gallery"] : null);
        echo "\" itemprop=\"offerDetails\" itemscope
\t\t\t\t\t     itemtype=\"http://schema.org/Product\">
\t\t\t\t\t\t<div class=\"kai-product-heading\">

\t\t\t\t\t\t\t<div class=\"product-box-desc\">
\t\t\t\t\t\t\t\t<div class=\"inner-box-desc\">

\t\t\t\t\t\t\t\t\t";
        // line 111
        if ((isset($context["manufacturer"]) ? $context["manufacturer"] : null)) {
            // line 112
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"brand\" itemprop=\"brand\" itemscope
\t\t\t\t\t\t\t\t\t\t     itemtype=\"http://schema.org/Brand\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 114
            echo (isset($context["manufacturers"]) ? $context["manufacturers"] : null);
            echo "\" itemprop=\"url\"><span
\t\t\t\t\t\t\t\t\t\t\t\t\t\titemprop=\"name\">";
            // line 115
            echo (isset($context["manufacturer"]) ? $context["manufacturer"] : null);
            echo " </span></a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        }
        // line 118
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"title-product\">
\t\t\t\t\t\t\t\t<h1 itemprop=\"name\">";
        // line 121
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t        ";
        // line 124
        if (((isset($context["stock"]) ? $context["stock"] : null) == "Out Of Stock")) {
            // line 125
            echo "        \t\t\t\t\t\t<h3 class=\"price-new\">
\t\t\t\t\t\t\t        <strong style=\"font-size: large\">ИЗЧЕРПАНА НАЛИЧНОСТ</strong>
        \t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t";
        } else {
            // line 129
            echo "\t\t\t\t\t\t\t\t";
            if ((isset($context["price"]) ? $context["price"] : null)) {
                // line 130
                echo "\t\t\t\t\t\t\t\t";
                // line 131
                echo "\t\t\t\t\t\t\t\t<div class=\"product_page_price price\" itemprop=\"offers\" itemscope
\t\t\t\t\t\t\t\t     itemtype=\"http://schema.org/Offer\">
\t\t\t\t\t\t\t\t\t";
                // line 133
                if ( !(isset($context["special"]) ? $context["special"] : null)) {
                    // line 134
                    echo "\t\t\t\t\t\t\t\t\t\t<span class=\"price-new\">
\t\t\t\t\t\t\t\t\t\t\t<span itemprop=\"price\" content=\"";
                    // line 135
                    echo (isset($context["price_value"]) ? $context["price_value"] : null);
                    echo "\" id=\"price-old\">";
                    echo (isset($context["price"]) ? $context["price"] : null);
                    echo "</span>
\t\t\t\t\t\t\t\t\t\t\t<meta itemprop=\"priceCurrency\" content=\"";
                    // line 136
                    echo (isset($context["currency"]) ? $context["currency"] : null);
                    echo "\"/>
\t\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 140
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-new\">
\t\t\t\t\t\t\t\t\t\t\t<span itemprop=\"price\" content=\"";
                    // line 142
                    echo (isset($context["special_value"]) ? $context["special_value"] : null);
                    echo "\" id=\"price-special\">";
                    echo (isset($context["special"]) ? $context["special"] : null);
                    echo "</span>
\t\t\t\t\t\t\t\t\t\t\t<meta itemprop=\"priceCurrency\" content=\"";
                    // line 143
                    echo (isset($context["currency"]) ? $context["currency"] : null);
                    echo "\"/>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t                        <span class=\"price-old\" id=\"price-old\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 146
                    echo (isset($context["price"]) ? $context["price"] : null);
                    echo "
\t\t\t\t\t\t\t\t\t   </span>

\t\t\t\t\t\t\t\t\t\t";
                    // line 149
                    $context["discount_percent"] = ((((isset($context["price_value"]) ? $context["price_value"] : null) - (isset($context["special_value"]) ? $context["special_value"] : null)) / (isset($context["price_value"]) ? $context["price_value"] : null)) * 100);
                    // line 150
                    echo "\t\t\t\t\t\t\t\t\t\t<div style=\"color: red; font-weight: bold;\">
\t\t\t\t\t\t\t\t\t\t\tСпестявате: ";
                    // line 151
                    echo twig_round((isset($context["discount_percent"]) ? $context["discount_percent"] : null), 0);
                    echo "%
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                }
                // line 154
                echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
            }
            // line 157
            echo "


\t\t\t\t\t\t\t\t";
            // line 160
            if ((isset($context["discounts"]) ? $context["discounts"] : null)) {
                // line 161
                echo "\t\t\t\t\t\t\t\t<ul class=\"list-unstyled text-success\">
\t\t\t\t\t\t\t\t\t";
                // line 162
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["discounts"]) ? $context["discounts"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["discount"]) {
                    // line 163
                    echo "\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<strong>";
                    // line 164
                    echo $this->getAttribute($context["discount"], "quantity", array());
                    echo " ";
                    echo (isset($context["text_discount"]) ? $context["text_discount"] : null);
                    echo " ";
                    echo $this->getAttribute($context["discount"], "price", array());
                    echo "</strong>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['discount'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 167
                echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t";
            }
            // line 169
            echo "

\t\t\t\t\t\t\t\t<div id=\"product\">
\t\t\t\t\t\t\t\t\t";
            // line 172
            if ((isset($context["options"]) ? $context["options"] : null)) {
                // line 173
                echo "\t\t\t\t\t\t\t\t\t\t<h3>";
                echo (isset($context["text_option"]) ? $context["text_option"] : null);
                echo "</h3>
\t\t\t\t\t\t\t\t\t\t";
                // line 174
                if ((((isset($context["option_data"]) ? $context["option_data"] : null) && $this->getAttribute((isset($context["option_data"]) ? $context["option_data"] : null), "product_option_value", array(), "any", true, true)) && $this->getAttribute((isset($context["option_data"]) ? $context["option_data"] : null), "product_option_value", array()))) {
                    // line 175
                    echo "\t\t\t\t\t\t\t\t\t\t\t<ul id=\"so-colorswatch-selector-";
                    echo (isset($context["product_id"]) ? $context["product_id"] : null);
                    echo "\"
\t\t\t\t\t\t\t\t\t\t\t    class='so-colorswatch-productpage-icons'>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 177
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["option_data"]) ? $context["option_data"] : null), "product_option_value", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["option_value"]) {
                        // line 178
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"option-item\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t   data-product-option-value-id=\"";
                        // line 180
                        echo $this->getAttribute($context["option_value"], "product_option_value_id", array());
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t   data-option-value-id=\"";
                        // line 181
                        echo $this->getAttribute($context["option_value"], "option_value_id", array());
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t   data-color-image=\"";
                        // line 182
                        echo $this->getAttribute($context["option_value"], "color_image", array());
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t   data-color-thumb-image=\"";
                        // line 183
                        echo $this->getAttribute($context["option_value"], "color_thumb_image", array());
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t   style=\"width: ";
                        // line 184
                        echo (isset($context["width_product_page"]) ? $context["width_product_page"] : null);
                        echo "px; height: ";
                        echo (isset($context["height_product_page"]) ? $context["height_product_page"] : null);
                        echo "px; background-image: url('";
                        echo $this->getAttribute($context["option_value"], "image", array());
                        echo "')\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 188
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"selected-option\"><span></span></li>
\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t<script type=\"text/javascript\">
\t\t                                        var \$window_width = \$(window).width();
\t\t                                        var ProductOptionId = '";
                    // line 192
                    echo (isset($context["product_option_id"]) ? $context["product_option_id"] : null);
                    echo "';
\t\t                                        var default_image = \$('.large-image img').attr('src');
\t\t                                        jQuery(document).ready(function (\$) {
\t\t                                            \$('#input-option";
                    // line 195
                    echo (isset($context["product_option_id"]) ? $context["product_option_id"] : null);
                    echo "').parent().hide();

\t\t                                            \$('#input-option";
                    // line 197
                    echo (isset($context["product_option_id"]) ? $context["product_option_id"] : null);
                    echo " option').each(function () {
\t\t                                                var text = \$(this).text().replace(/\\s{2,}/g, ' ');
\t\t                                                var val = \$(this).attr('value');
\t\t                                                \$('.so-colorswatch-productpage-icons li a').each(function (index, el) {
\t\t                                                    if (\$(el).data('product-option-value-id') == val) {
\t\t                                                        \$(el).attr('title', text);
\t\t                                                    }
\t\t                                                })
\t\t                                            })

\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 207
                    if (((isset($context["colorswatch_type"]) ? $context["colorswatch_type"] : null) == "click")) {
                        // line 208
                        echo "\t\t                                            \$(document).on('click', '.so-colorswatch-productpage-icons li.option-item', function (e) {
\t\t                                                e.preventDefault();
\t\t                                                var option_value_id = \$(this).children('a').data('product-option-value-id');
\t\t                                                var option_id = \$(this).children('a').data('option-value-id');

\t\t                                                if (\$(this).hasClass('checked')) {
\t\t                                                    \$('.so-colorswatch-productpage-icons li.option-item').removeClass('checked');
\t\t                                                    \$(this).removeClass('checked');
\t\t                                                    \$('#input-option";
                        // line 216
                        echo (isset($context["product_option_id"]) ? $context["product_option_id"] : null);
                        echo "').val('').trigger('change');
\t\t                                                    \$('.so-colorswatch-productpage-icons li.selected-option > span').html('');

\t\t                                                    \$('.large-image img').attr('src', default_image);
\t\t                                                } else {
\t\t                                                    \$('.so-colorswatch-productpage-icons li.option-item').removeClass('checked');
\t\t                                                    \$(this).removeClass('checked').addClass('checked');
\t\t                                                    \$('#input-option";
                        // line 223
                        echo (isset($context["product_option_id"]) ? $context["product_option_id"] : null);
                        echo "').val(option_value_id).trigger('change');
\t\t                                                    \$('.so-colorswatch-productpage-icons li.selected-option > span').html(\$(this).children('a').attr('title'));

\t\t                                                    if (\$(this).children('a').data('color-image') != '') {
\t\t                                                        \$('.large-image img').attr('src', \$(this).children('a').data('color-image'));
\t\t                                                    } else {
\t\t                                                        \$('.large-image img').attr('src', default_image);
\t\t                                                    }

\t\t                                                    \$('#thumb-slider a.thumbnail').removeClass('active');
\t\t                                                }
\t\t                                            })
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 236
                        echo "\t\t                                            if (\$window_width > 1199) {
\t\t                                                \$('.so-colorswatch-productpage-icons li.option-item').hover(function (e) {
\t\t                                                    e.preventDefault();
\t\t                                                    var option_value_id = \$(this).children('a').data('product-option-value-id');
\t\t                                                    var option_id = \$(this).children('a').data('option-value-id');

\t\t                                                    \$('.so-colorswatch-productpage-icons li.option-item').removeClass('checked');
\t\t                                                    if (\$(this).hasClass('checked')) {
\t\t                                                        \$(this).removeClass('checked');
\t\t                                                        \$('#input-option";
                        // line 245
                        echo (isset($context["product_option_id"]) ? $context["product_option_id"] : null);
                        echo "').val('').trigger('change');
\t\t                                                        \$('.large-image img').attr('src', default_image);

\t\t                                                    } else {
\t\t                                                        \$(this).removeClass('checked').addClass('checked');
\t\t                                                        \$('#input-option";
                        // line 250
                        echo (isset($context["product_option_id"]) ? $context["product_option_id"] : null);
                        echo "').val(option_value_id).trigger('change');
\t\t                                                        \$('.so-colorswatch-productpage-icons li.selected-option > span').html(\$(this).children('a').attr('title'));

\t\t                                                        if (\$(this).children('a').data('color-image') != '') {
\t\t                                                            \$('.large-image img').attr('src', \$(this).children('a').data('color-image'));
\t\t                                                        } else {
\t\t                                                            \$('.large-image img').attr('src', default_image);
\t\t                                                        }
\t\t                                                        \$('#thumb-slider a.thumbnail').removeClass('active');
\t\t                                                    }
\t\t                                                });
\t\t                                            } else {
\t\t                                                \$(document).on('click', '.so-colorswatch-productpage-icons li.option-item', function (e) {
\t\t                                                    e.preventDefault();
\t\t                                                    var option_value_id = \$(this).children('a').data('product-option-value-id');
\t\t                                                    var option_id = \$(this).children('a').data('option-value-id');

\t\t                                                    \$('.so-colorswatch-productpage-icons li.option-item').removeClass('checked');
\t\t                                                    if (\$(this).hasClass('checked')) {
\t\t                                                        \$(this).removeClass('checked');
\t\t                                                        \$('#input-option";
                        // line 270
                        echo (isset($context["product_option_id"]) ? $context["product_option_id"] : null);
                        echo "').val('').trigger('change');
\t\t                                                        \$('.large-image img').attr('src', default_image);

\t\t                                                    } else {
\t\t                                                        \$(this).removeClass('checked').addClass('checked');
\t\t                                                        \$('#input-option";
                        // line 275
                        echo (isset($context["product_option_id"]) ? $context["product_option_id"] : null);
                        echo "').val(option_value_id).trigger('change');
\t\t                                                        \$('.so-colorswatch-productpage-icons li.selected-option > span').html(\$(this).children('a').attr('title'));

\t\t                                                        if (\$(this).children('a').data('color-image') != '') {
\t\t                                                            \$('.large-image img').attr('src', \$(this).children('a').data('color-image'));
\t\t                                                        } else {
\t\t                                                            \$('.large-image img').attr('src', default_image);
\t\t                                                        }
\t\t                                                        \$('#thumb-slider a.thumbnail').removeClass('active');
\t\t                                                    }
\t\t                                                })
\t\t                                            }
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 288
                    echo "\t\t                                        })
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 291
                echo "
\t\t\t\t\t\t\t\t\t\t";
                // line 292
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                    // line 293
                    echo "
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 294
                    if (($this->getAttribute($context["option"], "type", array()) == "select")) {
                        // line 295
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group";
                        if ($this->getAttribute($context["option"], "required", array())) {
                            echo " required ";
                        }
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\"
\t\t\t\t\t\t\t\t\t\t\t\t\t       for=\"input-option";
                        // line 297
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\">";
                        echo $this->getAttribute($context["option"], "name", array());
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"option[";
                        // line 298
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "]\"
\t\t\t\t\t\t\t\t\t\t\t\t\t        id=\"input-option";
                        // line 299
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t        class=\"form-control width50\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">";
                        // line 301
                        echo (isset($context["text_select"]) ? $context["text_select"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 302
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["option"], "product_option_value", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["option_value"]) {
                            // line 303
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["option_value"], "product_option_value_id", array());
                            echo "\">";
                            echo $this->getAttribute($context["option_value"], "name", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 304
                            if ($this->getAttribute($context["option_value"], "price", array())) {
                                // line 305
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t(";
                                echo $this->getAttribute($context["option_value"], "price_prefix", array());
                                echo $this->getAttribute($context["option_value"], "price", array());
                                echo ")
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 307
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 309
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 312
                    echo "
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 313
                    if (($this->getAttribute($context["option"], "type", array()) == "radio")) {
                        // line 314
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group";
                        if ($this->getAttribute($context["option"], "required", array())) {
                            echo " required ";
                        }
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\">";
                        // line 315
                        echo $this->getAttribute($context["option"], "name", array());
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"input-option";
                        // line 316
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 317
                        $context["radio_style"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "radio_style"), "method");
                        // line 318
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context["radio_type"] = (((isset($context["radio_style"]) ? $context["radio_style"] : null)) ? (" radio-type-button") : (""));
                        // line 319
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 320
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["option"], "product_option_value", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["option_value"]) {
                            // line 321
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["radio_image"] = (($this->getAttribute($context["option_value"], "image", array())) ? ("option_image") : (""));
                            // line 322
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["radio_price"] = (((isset($context["radio_style"]) ? $context["radio_style"] : null)) ? (($this->getAttribute($context["option_value"], "price_prefix", array()) . $this->getAttribute($context["option_value"], "price", array()))) : (""));
                            // line 323
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"radio ";
                            // line 324
                            echo ((isset($context["radio_image"]) ? $context["radio_image"] : null) . (isset($context["radio_type"]) ? $context["radio_type"] : null));
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t       name=\"option[";
                            // line 327
                            echo $this->getAttribute($context["option"], "product_option_id", array());
                            echo "]\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t       value=\"";
                            // line 328
                            echo $this->getAttribute($context["option_value"], "product_option_value_id", array());
                            echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"option-content-box\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t      data-title=\"";
                            // line 330
                            echo $this->getAttribute($context["option_value"], "name", array());
                            echo " ";
                            echo (isset($context["radio_price"]) ? $context["radio_price"] : null);
                            echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t      data-toggle='tooltip'>
\t\t\t                                                    ";
                            // line 332
                            if ($this->getAttribute($context["option_value"], "image", array())) {
                                // line 333
                                echo "\t\t\t\t                                                    <img src=\"";
                                echo $this->getAttribute($context["option_value"], "image", array());
                                echo " \"
\t\t\t\t                                                         alt=\"";
                                // line 334
                                echo $this->getAttribute($context["option_value"], "name", array());
                                echo "  ";
                                echo (isset($context["radio_price"]) ? $context["radio_price"] : null);
                                echo "\"/>
\t\t\t                                                    ";
                            }
                            // line 336
                            echo "\t\t\t                                                    <span class=\"option-name\">";
                            echo $this->getAttribute($context["option_value"], "name", array());
                            echo " </span>
\t\t\t                                                    ";
                            // line 337
                            if (($this->getAttribute($context["option_value"], "price", array()) && ((isset($context["radio_style"]) ? $context["radio_style"] : null) != "1"))) {
                                echo " (";
                                echo $this->getAttribute($context["option_value"], "price_prefix", array());
                                echo " ";
                                echo $this->getAttribute($context["option_value"], "price", array());
                                echo " )";
                            }
                            // line 338
                            echo "
\t\t\t                                                </span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 343
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 344
                        if ((isset($context["radio_style"]) ? $context["radio_style"] : null)) {
                            // line 345
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t                                                    \$(document).ready(function () {
\t\t\t                                                        \$('#input-option";
                            // line 347
                            echo $this->getAttribute($context["option"], "product_option_id", array());
                            echo " ').on('click', 'span', function () {
\t\t\t                                                            \$('#input-option";
                            // line 348
                            echo $this->getAttribute($context["option"], "product_option_id", array());
                            echo "  span').removeClass(\"active\");
\t\t\t                                                            \$(this).toggleClass(\"active\");
\t\t\t                                                        });
\t\t\t                                                    });
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 354
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 358
                    echo "
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 359
                    if (($this->getAttribute($context["option"], "type", array()) == "checkbox")) {
                        // line 360
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group";
                        if ($this->getAttribute($context["option"], "required", array())) {
                            echo " required ";
                        }
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\">";
                        // line 361
                        echo $this->getAttribute($context["option"], "name", array());
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"input-option";
                        // line 362
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 363
                        $context["radio_style"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "radio_style"), "method");
                        // line 364
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context["radio_type"] = (((isset($context["radio_style"]) ? $context["radio_style"] : null)) ? (" radio-type-button") : (""));
                        // line 365
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 366
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["option"], "product_option_value", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["option_value"]) {
                            // line 367
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["radio_image"] = (($this->getAttribute($context["option_value"], "image", array())) ? ("option_image") : (""));
                            // line 368
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["radio_price"] = (((isset($context["radio_style"]) ? $context["radio_style"] : null)) ? (($this->getAttribute($context["option_value"], "price_prefix", array()) . $this->getAttribute($context["option_value"], "price", array()))) : (""));
                            // line 369
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"checkbox  ";
                            // line 370
                            echo ((isset($context["radio_image"]) ? $context["radio_image"] : null) . (isset($context["radio_type"]) ? $context["radio_type"] : null));
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t       name=\"option[";
                            // line 373
                            echo $this->getAttribute($context["option"], "product_option_id", array());
                            echo "][]\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t       value=\"";
                            // line 374
                            echo $this->getAttribute($context["option_value"], "product_option_value_id", array());
                            echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"option-content-box\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t      data-title=\"";
                            // line 376
                            echo $this->getAttribute($context["option_value"], "name", array());
                            echo " ";
                            echo (isset($context["radio_price"]) ? $context["radio_price"] : null);
                            echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t      data-toggle='tooltip'>
\t\t\t                                                    ";
                            // line 378
                            if ($this->getAttribute($context["option_value"], "image", array())) {
                                // line 379
                                echo "\t\t\t\t                                                    <img src=\"";
                                echo $this->getAttribute($context["option_value"], "image", array());
                                echo " \"
\t\t\t\t                                                         alt=\"";
                                // line 380
                                echo $this->getAttribute($context["option_value"], "name", array());
                                echo "  ";
                                echo (isset($context["radio_price"]) ? $context["radio_price"] : null);
                                echo "\"/>
\t\t\t                                                    ";
                            }
                            // line 382
                            echo "
\t\t\t                                                    <span class=\"option-name\">";
                            // line 383
                            echo $this->getAttribute($context["option_value"], "name", array());
                            echo " </span>
\t\t\t                                                    ";
                            // line 384
                            if (($this->getAttribute($context["option_value"], "price", array()) && ((isset($context["radio_style"]) ? $context["radio_style"] : null) != "1"))) {
                                // line 385
                                echo "\t\t\t\t                                                    (";
                                echo $this->getAttribute($context["option_value"], "price_prefix", array());
                                echo " ";
                                echo $this->getAttribute($context["option_value"], "price", array());
                                echo " )
\t\t\t                                                    ";
                            }
                            // line 387
                            echo "
\t\t\t                                                </span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 392
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 393
                        if ((isset($context["radio_style"]) ? $context["radio_style"] : null)) {
                            // line 394
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t                                                    \$(document).ready(function () {
\t\t\t                                                        \$('#input-option";
                            // line 396
                            echo $this->getAttribute($context["option"], "product_option_id", array());
                            echo " ').on('click', 'span', function () {
\t\t\t                                                            \$(this).toggleClass(\"active\");
\t\t\t                                                        });
\t\t\t                                                    });
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 402
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 406
                    echo "
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 407
                    if (($this->getAttribute($context["option"], "type", array()) == "text")) {
                        // line 408
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group";
                        if ($this->getAttribute($context["option"], "required", array())) {
                            echo " required ";
                        }
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\"
\t\t\t\t\t\t\t\t\t\t\t\t\t       for=\"input-option";
                        // line 410
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\">";
                        echo $this->getAttribute($context["option"], "name", array());
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"option[";
                        // line 411
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "]\"
\t\t\t\t\t\t\t\t\t\t\t\t\t       value=\"";
                        // line 412
                        echo $this->getAttribute($context["option"], "value", array());
                        echo "\" placeholder=\"";
                        echo $this->getAttribute($context["option"], "name", array());
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t       id=\"input-option";
                        // line 413
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\" class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 416
                    echo "
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 417
                    if (($this->getAttribute($context["option"], "type", array()) == "textarea")) {
                        // line 418
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group";
                        if ($this->getAttribute($context["option"], "required", array())) {
                            echo " required ";
                        }
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\"
\t\t\t\t\t\t\t\t\t\t\t\t\t       for=\"input-option";
                        // line 420
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\">";
                        echo $this->getAttribute($context["option"], "name", array());
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea name=\"option[";
                        // line 421
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "]\" rows=\"5\"
\t\t\t\t\t\t\t\t\t\t\t\t\t          placeholder=\"";
                        // line 422
                        echo $this->getAttribute($context["option"], "name", array());
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t          id=\"input-option";
                        // line 423
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t          class=\"form-control\">";
                        // line 424
                        echo $this->getAttribute($context["option"], "value", array());
                        echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 427
                    echo "
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 428
                    if (($this->getAttribute($context["option"], "type", array()) == "file")) {
                        // line 429
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group";
                        if ($this->getAttribute($context["option"], "required", array())) {
                            echo " required ";
                        }
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\">";
                        // line 430
                        echo $this->getAttribute($context["option"], "name", array());
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" id=\"button-upload";
                        // line 431
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t        data-loading-text=\"";
                        // line 432
                        echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t        class=\"btn btn-default btn-block\"><i
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"fa fa-upload\"></i> ";
                        // line 434
                        echo (isset($context["button_upload"]) ? $context["button_upload"] : null);
                        echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"option[";
                        // line 435
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "]\" value=\"\"
\t\t\t\t\t\t\t\t\t\t\t\t\t       id=\"input-option";
                        // line 436
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 439
                    echo "
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 440
                    if (($this->getAttribute($context["option"], "type", array()) == "date")) {
                        // line 441
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group";
                        if ($this->getAttribute($context["option"], "required", array())) {
                            echo " required ";
                        }
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\"
\t\t\t\t\t\t\t\t\t\t\t\t\t       for=\"input-option";
                        // line 443
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\">";
                        echo $this->getAttribute($context["option"], "name", array());
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group date\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"option[";
                        // line 445
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "]\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t       value=\"";
                        // line 446
                        echo $this->getAttribute($context["option"], "value", array());
                        echo "\" data-date-format=\"YYYY-MM-DD\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t       id=\"input-option";
                        // line 447
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t       class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-btn\">
\t\t\t                                    <button class=\"btn btn-default\" type=\"button\"><i
\t\t\t\t\t\t                                    class=\"fa fa-calendar\"></i></button>
\t\t\t                                    </span></div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 455
                    echo "
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 456
                    if (($this->getAttribute($context["option"], "type", array()) == "datetime")) {
                        // line 457
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group";
                        if ($this->getAttribute($context["option"], "required", array())) {
                            echo " required ";
                        }
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\"
\t\t\t\t\t\t\t\t\t\t\t\t\t       for=\"input-option";
                        // line 459
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\">";
                        echo $this->getAttribute($context["option"], "name", array());
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group datetime\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"option[";
                        // line 461
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "]\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t       value=\"";
                        // line 462
                        echo $this->getAttribute($context["option"], "value", array());
                        echo "\" data-date-format=\"YYYY-MM-DD HH:mm\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t       id=\"input-option";
                        // line 463
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t       class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-btn\">
\t\t\t                                                <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button>
\t\t\t                                            </span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 471
                    echo "
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 472
                    if (($this->getAttribute($context["option"], "type", array()) == "time")) {
                        // line 473
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group";
                        if ($this->getAttribute($context["option"], "required", array())) {
                            echo " required ";
                        }
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\"
\t\t\t\t\t\t\t\t\t\t\t\t\t       for=\"input-option";
                        // line 475
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\">";
                        echo $this->getAttribute($context["option"], "name", array());
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group time\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"option[";
                        // line 477
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "]\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t       value=\"";
                        // line 478
                        echo $this->getAttribute($context["option"], "value", array());
                        echo "\" data-date-format=\"HH:mm\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t       id=\"input-option";
                        // line 479
                        echo $this->getAttribute($context["option"], "product_option_id", array());
                        echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t       class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-btn\">
\t\t\t                                                <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button>
\t\t                                                </span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 487
                    echo "\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 488
                echo "\t\t\t\t\t\t\t\t\t";
            }
            // line 489
            echo "
\t\t\t\t\t\t\t\t\t<div class=\"box-cart clearfix \">
\t\t\t\t\t\t\t\t\t\t";
            // line 491
            if ((isset($context["recurrings"]) ? $context["recurrings"] : null)) {
                // line 492
                echo "\t\t\t\t\t\t\t\t\t\t\t<h3>";
                echo (isset($context["text_payment_recurring"]) ? $context["text_payment_recurring"] : null);
                echo "</h3>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"recurring_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">";
                // line 495
                echo (isset($context["text_select"]) ? $context["text_select"] : null);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 496
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["recurrings"]) ? $context["recurrings"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["recurring"]) {
                    // line 497
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo $this->getAttribute($context["recurring"], "recurring_id", array());
                    echo "\">";
                    echo $this->getAttribute($context["recurring"], "name", array());
                    echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['recurring'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 499
                echo "\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"help-block\" id=\"recurring-description\"></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 503
            echo "
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group box-info-product\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"option quantity\">
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\" for=\"input-quantity\">";
            // line 506
            echo (isset($context["entry_qty"]) ? $context["entry_qty"] : null);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group quantity-control\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon product_quantity_down fa fa-minus\"></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" name=\"quantity\"
\t\t\t\t\t\t\t\t\t\t\t\t\t       value=\"";
            // line 510
            echo (isset($context["minimum"]) ? $context["minimum"] : null);
            echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"product_id\" value=\"";
            // line 511
            echo (isset($context["product_id"]) ? $context["product_id"] : null);
            echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon product_quantity_up fa fa-plus\"></span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"detail-action\">
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 517
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"cart kai\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"button\" value=\"Добави\"
\t\t\t\t\t\t\t\t\t\t\t\t\t       data-loading-text=\"";
            // line 519
            echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
            echo "\" id=\"button-cart\"
\t\t\t\t\t\t\t\t\t\t\t\t\t       class=\"btn btn-mega\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"add-to-links wish_comp kai\">

\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"blank list-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"wishlist\">

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"wishlist.add(";
            // line 528
            echo (isset($context["product_id"]) ? $context["product_id"] : null);
            echo ");\"> Добави в любими <i
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"fa fa-heart\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"free-delivery\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"\"> <img src=\"image/catalog/demo/icon/icon1.png\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                 alt=\"free-shipping-icon\"/> Безплатна доставка
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tнад 120 лв. до 5 кг</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"model\"><span>Продуктов код: </span> ";
            // line 537
            echo (isset($context["model"]) ? $context["model"] : null);
            echo "</li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"weight\"><span>Тегло: </span> ";
            // line 538
            echo (isset($context["weight"]) ? $context["weight"] : null);
            echo " кг.</li>
\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t\t\t\t";
            // line 545
            if (((isset($context["minimum"]) ? $context["minimum"] : null) > 1)) {
                // line 546
                echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"alert alert-info\"><i
\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"fa fa-info-circle\"></i> ";
                // line 547
                echo (isset($context["text_minimum"]) ? $context["text_minimum"] : null);
                echo "</div>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 549
            echo "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t";
            // line 551
            if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_page_button"), "method") && $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_socialshare"), "method"))) {
                // line 552
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"form-group social-share clearfix\">
\t\t\t\t\t\t\t\t\t\t\t";
                // line 553
                echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "decode_entities", array(0 => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_socialshare"), "method")), "method");
                echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            }
            // line 556
            echo "\t\t\t\t\t\t\t\t\t<!-- Go to www.addthis.com/dashboard to customize your tools -->

\t\t\t\t\t\t\t\t\t";
            // line 559
            echo "
\t\t\t\t\t\t\t\t\t";
            // line 560
            if ((isset($context["tags"]) ? $context["tags"] : null)) {
                // line 561
                echo "\t\t\t\t\t\t\t\t\t\t<div id=\"tab-tags\" style=\"visibility: hidden;\">
\t\t\t\t\t\t\t\t\t\t\t";
                // line 562
                echo (isset($context["text_tags"]) ? $context["text_tags"] : null);
                echo "
\t\t\t\t\t\t\t\t\t\t\t";
                // line 563
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(0, twig_length_filter($this->env, (isset($context["tags"]) ? $context["tags"] : null))));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 564
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($context["i"] < (twig_length_filter($this->env, (isset($context["tags"]) ? $context["tags"] : null)) - 1))) {
                        echo " <a class=\"btn btn-primary btn-sm\"
\t\t\t\t\t\t\t\t\t\t\t\t                                  href=\"";
                        // line 565
                        echo $this->getAttribute($this->getAttribute((isset($context["tags"]) ? $context["tags"] : null), $context["i"], array(), "array"), "href", array());
                        echo "\">";
                        echo $this->getAttribute($this->getAttribute((isset($context["tags"]) ? $context["tags"] : null), $context["i"], array(), "array"), "tag", array());
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 567
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ( !twig_test_empty($this->getAttribute((isset($context["tags"]) ? $context["tags"] : null), $context["i"], array(), "array"))) {
                            // line 568
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-primary btn-sm 22\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t   href=\"";
                            // line 569
                            echo $this->getAttribute($this->getAttribute((isset($context["tags"]) ? $context["tags"] : null), $context["i"], array(), "array"), "href", array());
                            echo "\">";
                            echo $this->getAttribute($this->getAttribute((isset($context["tags"]) ? $context["tags"] : null), $context["i"], array(), "array"), "tag", array());
                            echo "</a> ";
                        }
                        // line 570
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 571
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 572
                echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            }
            // line 574
            echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        // line 576
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        // line 578
        echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        // line 582
        echo "\t\t\t";
        if ((isset($context["content_top"]) ? $context["content_top"] : null)) {
            // line 583
            echo "\t\t\t\t<div class=\"content-product-maintop form-group clearfix\">
\t\t\t\t\t";
            // line 584
            echo (isset($context["content_top"]) ? $context["content_top"] : null);
            echo "
\t\t\t\t</div>
\t\t\t";
        }
        // line 587
        echo "\t\t\t<div class=\"content-product-mainbody clearfix row\">
\t\t\t\t";
        // line 589
        echo "
\t\t\t\t";
        // line 590
        if (((isset($context["col_position"]) ? $context["col_position"] : null) == "inside")) {
            // line 591
            echo "\t\t\t\t\t";
            // line 592
            echo "\t\t\t\t\t";
            echo (isset($context["column_left"]) ? $context["column_left"] : null);
            echo "
\t\t\t\t\t";
            // line 593
            if (((isset($context["col_canvas"]) ? $context["col_canvas"] : null) == "off_canvas")) {
                // line 594
                echo "\t\t\t\t\t\t";
                $context["class_left"] = "col-sm-12";
                // line 595
                echo "\t\t\t\t\t";
            } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
                // line 596
                echo "\t\t\t\t\t\t";
                $context["class_left"] = "col-md-6 col-column3";
                // line 597
                echo "\t\t\t\t\t";
            } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
                // line 598
                echo "\t\t\t\t\t\t";
                $context["class_left"] = "col-md-9 col-sm-12 col-xs-12";
                // line 599
                echo "\t\t\t\t\t";
            } else {
                // line 600
                echo "\t\t\t\t\t\t";
                $context["class_left"] = "col-sm-12";
                // line 601
                echo "\t\t\t\t\t";
            }
            // line 602
            echo "\t\t\t\t";
        } else {
            // line 603
            echo "\t\t\t\t\t";
            $context["class_left"] = "col-sm-12";
            // line 604
            echo "\t\t\t\t";
        }
        // line 605
        echo "
\t\t\t\t<div class=\"content-product-content ";
        // line 606
        echo (isset($context["class_left"]) ? $context["class_left"] : null);
        echo "\">
\t\t\t\t\t<div class=\"content-product-midde clearfix\">
\t\t\t\t\t\t";
        // line 609
        echo "\t\t\t\t\t\t";
        $context["related_position"] = ((($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "tabs_position"), "method") == 1)) ? ("vertical-tabs") : (""));
        // line 610
        echo "\t\t\t\t\t\t";
        $context["tabs_position"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "tabs_position"), "method");
        // line 611
        echo "\t\t\t\t\t\t";
        $context["showmore"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_enableshowmore"), "method");
        // line 612
        echo "\t\t\t\t\t\t";
        if ((isset($context["showmore"]) ? $context["showmore"] : null)) {
            echo " ";
            $context["class_showmore"] = "showdown";
            // line 613
            echo "\t\t\t\t\t\t";
        } else {
            echo " ";
            $context["class_showmore"] = "showup";
            // line 614
            echo "\t\t\t\t\t\t";
        }
        // line 615
        echo "
\t\t\t\t\t\t<div class=\"producttab \">
\t\t\t\t\t\t\t<div class=\"tabsslider ";
        // line 617
        echo (isset($context["related_position"]) ? $context["related_position"] : null);
        echo " ";
        if (((isset($context["tabs_position"]) ? $context["tabs_position"] : null) == 1)) {
            echo " ";
            echo "vertical-tabs";
            echo " ";
        } else {
            echo " ";
            echo "horizontal-tabs";
            echo " ";
        }
        echo " col-xs-12\">
\t\t\t\t\t\t\t\t";
        // line 619
        echo "\t\t\t\t\t\t\t\t";
        if (((isset($context["tabs_position"]) ? $context["tabs_position"] : null) == 2)) {
            // line 620
            echo "\t\t\t\t\t\t\t\t\t<ul class=\"nav nav-tabs font-sn\">
\t\t\t\t\t\t\t\t\t\t<li class=\"active\"><a data-toggle=\"tab\"
\t\t\t\t\t\t\t\t\t\t                      href=\"#tab-description\">Описание</a></li>
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab-customhtml\" data-toggle=\"tab\">Файлове</a></li>
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab-contentshipping\" data-toggle=\"tab\">Доставка</a></li>

\t\t\t\t\t\t\t\t\t\t";
            // line 626
            if ((isset($context["product_video"]) ? $context["product_video"] : null)) {
                // line 627
                echo "\t\t\t\t\t\t\t\t\t\t\t<li><a class=\"thumb-video\" href=\"";
                echo (isset($context["product_video"]) ? $context["product_video"] : null);
                echo "\"><i
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"fa fa-youtube-play fa-lg\"></i> ";
                // line 628
                echo (isset($context["tab_video"]) ? $context["tab_video"] : null);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 631
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 632
            if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_enablesizechart"), "method")) {
                // line 633
                echo "\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab-sizechart\" data-toggle=\"tab\">";
                echo (isset($context["text_size_chart"]) ? $context["text_size_chart"] : null);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 636
            echo "

\t\t\t\t\t\t\t\t\t</ul>

\t\t\t\t\t\t\t\t\t";
            // line 641
            echo "\t\t\t\t\t\t\t\t";
        } elseif (((isset($context["tabs_position"]) ? $context["tabs_position"] : null) == 1)) {
            // line 642
            echo "\t\t\t\t\t\t\t\t\t<ul class=\"nav nav-tabs col-lg-3 col-sm-4\">
\t\t\t\t\t\t\t\t\t\t<li class=\"active\"><a data-toggle=\"tab\"
\t\t\t\t\t\t\t\t\t\t                      href=\"#tab-description\">Характеристики</a></li>
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab-contentshipping\" data-toggle=\"tab\">Файлове</a></li>
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab-customhtml\" data-toggle=\"tab\">Доставка</a></li>

\t\t\t\t\t\t\t\t\t\t";
            // line 648
            if ((isset($context["product_tabtitle"]) ? $context["product_tabtitle"] : null)) {
                // line 649
                echo "\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab-customhtml\" data-toggle=\"tab\">";
                echo (isset($context["product_tabtitle"]) ? $context["product_tabtitle"] : null);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 652
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 653
            if ((isset($context["product_video"]) ? $context["product_video"] : null)) {
                // line 654
                echo "\t\t\t\t\t\t\t\t\t\t\t<li><a class=\"thumb-video\" href=\"";
                echo (isset($context["product_video"]) ? $context["product_video"] : null);
                echo "\"><i
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"fa fa-youtube-play fa-lg\"></i> ";
                // line 655
                echo (isset($context["tab_video"]) ? $context["tab_video"] : null);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 658
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 659
            if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_enablesizechart"), "method")) {
                // line 660
                echo "\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#tab-sizechart\" data-toggle=\"tab\">";
                echo (isset($context["text_size_chart"]) ? $context["text_size_chart"] : null);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 663
            echo "
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t";
        }
        // line 666
        echo "
\t\t\t\t\t\t\t\t<div class=\"tab-content ";
        // line 667
        if (((isset($context["tabs_position"]) ? $context["tabs_position"] : null) == 1)) {
            echo " ";
            echo "col-lg-9 col-sm-8";
            echo " ";
        }
        echo " col-xs-12\">
\t\t\t\t\t\t\t\t\t<h2 class=\"tab-pane active\" id=\"tab-description\">

\t\t\t\t\t\t\t\t\t\t";
        // line 670
        if ((isset($context["attribute_groups"]) ? $context["attribute_groups"] : null)) {
            // line 671
            echo "\t\t\t\t\t\t\t\t\t\t\t<h3 class=\"product-property-title\"> ";
            echo (isset($context["text_product_specifics"]) ? $context["text_product_specifics"] : null);
            echo "</h3>
\t\t\t\t\t\t\t\t\t\t\t<ul class=\"product-property-list util-clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 673
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["attribute_groups"]) ? $context["attribute_groups"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["attribute_group"]) {
                // line 674
                echo "

\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 676
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["attribute_group"], "attribute", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["attribute"]) {
                    // line 677
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"property-item\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"propery-title\">";
                    // line 678
                    echo $this->getAttribute($context["attribute"], "name", array());
                    echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"propery-des\">";
                    // line 679
                    echo $this->getAttribute($context["attribute"], "text", array());
                    echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 682
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute_group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 684
            echo "\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 686
        echo "
\t\t\t\t\t\t\t\t\t\t<div id=\"collapse-description\" class=\"desc-collapse ";
        // line 687
        echo (isset($context["class_showmore"]) ? $context["class_showmore"] : null);
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 688
        echo (isset($context["description"]) ? $context["description"] : null);
        echo "
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t";
        // line 691
        if ((isset($context["showmore"]) ? $context["showmore"] : null)) {
            // line 692
            echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"button-toggle\">
\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"showmore\" data-toggle=\"collapse\" href=\"#\"
\t\t\t\t\t\t\t\t\t\t\t\t   aria-expanded=\"false\" aria-controls=\"collapse-footer\">
                                                    <span class=\"toggle-more\">покажи <i
\t\t\t                                                    class=\"fa fa-angle-down\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"toggle-less\">скрий <i
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"fa fa-angle-up\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 702
        echo "\t\t\t\t\t\t\t\t\t</h2>


\t\t\t\t\t\t\t\t\t";
        // line 705
        if ((isset($context["review_status"]) ? $context["review_status"] : null)) {
            // line 706
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab-review\">
\t\t\t\t\t\t\t\t\t\t\t<form class=\"form-horizontal\" id=\"form-review\">
\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"review\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t<h3>";
            // line 709
            echo (isset($context["text_write"]) ? $context["text_write"] : null);
            echo "</h3>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 710
            if ((isset($context["review_guest"]) ? $context["review_guest"] : null)) {
                // line 711
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t       for=\"input-name\">";
                // line 714
                echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
                echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"name\" value=\"";
                // line 715
                echo (isset($context["customer_name"]) ? $context["customer_name"] : null);
                echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t       id=\"input-name\" class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t       for=\"input-review\">";
                // line 722
                echo (isset($context["entry_review"]) ? $context["entry_review"] : null);
                echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea name=\"text\" rows=\"5\" id=\"input-review\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t          class=\"form-control\"></textarea>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"help-block\">";
                // line 725
                echo (isset($context["text_note"]) ? $context["text_note"] : null);
                echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"control-label\">";
                // line 730
                echo (isset($context["entry_rating"]) ? $context["entry_rating"] : null);
                echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp; ";
                // line 731
                echo (isset($context["entry_bad"]) ? $context["entry_bad"] : null);
                echo "&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"rating\" value=\"1\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"rating\" value=\"2\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"rating\" value=\"3\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"rating\" value=\"4\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"rating\" value=\"5\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;";
                // line 741
                echo (isset($context["entry_good"]) ? $context["entry_good"] : null);
                echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 743
                echo (isset($context["captcha"]) ? $context["captcha"] : null);
                echo "

\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" id=\"button-review\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t        data-loading-text=\"";
                // line 747
                echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
                echo "\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t        class=\"btn btn-primary\">";
                // line 748
                echo (isset($context["button_continue"]) ? $context["button_continue"] : null);
                echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 752
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo (isset($context["text_login"]) ? $context["text_login"] : null);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 754
            echo "\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        }
        // line 757
        echo "
\t\t\t\t\t\t\t\t\t<h3 class=\"tab-pane\" id=\"tab-customhtml\">
\t\t\t\t\t\t\t\t\t\t";
        // line 759
        if ((isset($context["specif"]) ? $context["specif"] : null)) {
            // line 760
            echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            echo (isset($context["specif"]) ? $context["specif"] : null);
            echo "\" target=\"_blank\">Техническа спесификация PDF</a>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 762
        echo "\t\t\t\t\t\t\t\t\t</h3>

\t\t\t\t\t\t\t\t\t";
        // line 764
        if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_enableshipping"), "method") && $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_contentshipping"), "method"))) {
            // line 765
            echo "\t\t\t\t\t\t\t\t\t\t<h3 class=\"tab-pane\" id=\"tab-contentshipping\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 766
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "decode_entities", array(0 => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_contentshipping"), "method")), "method");
            echo "
\t\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t";
        }
        // line 769
        echo "

\t\t\t\t\t\t\t\t\t";
        // line 771
        if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "product_enablesizechart"), "method")) {
            // line 772
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"tab-pane \" id=\"tab-sizechart\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"image/";
            // line 773
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "img_sizechart"), "method");
            echo "\"
\t\t\t\t\t\t\t\t\t\t\t     alt=\"Size Chart\">
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        }
        // line 777
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t";
        // line 783
        echo "\t\t\t\t\t";
        if (((isset($context["products"]) ? $context["products"] : null) && $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "related_status"), "method"))) {
            // line 784
            echo "\t\t\t\t\t\t<div class=\"content-product-bottom clearfix\">
\t\t\t\t\t\t\t<ul class=\"nav nav-tabs\">
\t\t\t\t\t\t\t\t<li class=\"active\"><a data-toggle=\"tab\"
\t\t\t\t\t\t\t\t                      href=\"#product-related\">";
            // line 787
            echo (isset($context["related_module_name"]) ? $context["related_module_name"] : null);
            echo "</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t\t\t<div id=\"product-related\" class=\"tab-pane fade in active\">
\t\t\t\t\t\t\t\t\t";
            // line 791
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/soconfig/related_product.twig"), "so-revo/template/product/product.twig", 791)->display($context);
            // line 792
            echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"product-upsell\" class=\"tab-pane fade\">
\t\t\t\t\t\t\t\t\t";
            // line 795
            echo "\t\t\t\t\t\t\t\t\t";
            echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
            echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<button id=\"show_more_related_button\" onClick=\"showRelated();\"
\t\t\t\t\t\t\t\t        class=\"btn btn-default btn-block\">Виж повече
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 805
        echo "

\t\t\t\t</div>
\t\t\t\t";
        // line 809
        echo "\t\t\t\t";
        if (((isset($context["col_position"]) ? $context["col_position"] : null) == "inside")) {
            echo " ";
            echo (isset($context["column_right"]) ? $context["column_right"] : null);
            echo " ";
        }
        // line 810
        echo "
\t\t\t</div>


\t\t</div>
\t\t";
        // line 816
        echo "\t\t";
        if (((isset($context["col_position"]) ? $context["col_position"] : null) == "outside")) {
            echo " ";
            echo (isset($context["column_right"]) ? $context["column_right"] : null);
            echo " ";
        }
        // line 817
        echo "\t</div>
</div>

<script type=\"text/javascript\">
    <!--
    \$('select[name=\\'recurring_id\\'], input[name=\"quantity\"]').change(function () {
        \$.ajax({
            url: 'index.php?route=product/product/getRecurringDescription',
            type: 'post',
            data: \$('input[name=\\'product_id\\'], input[name=\\'quantity\\'], select[name=\\'recurring_id\\']'),
            dataType: 'json',
            beforeSend: function () {
                \$('#recurring-description').html('');
            },
            success: function (json) {
                \$('.alert-dismissible, .text-danger').remove();

                if (json['success']) {
                    \$('#recurring-description').html(json['success']);
                }
            }
        });
    });
    --></script>

<script type=\"text/javascript\"><!--
    \$('#button-cart').on('click', function () {

        \$.ajax({
            url: 'index.php?route=extension/soconfig/cart/add',
            type: 'post',
            data: \$('#product input[type=\\'text\\'], #product input[type=\\'hidden\\'], #product input[type=\\'radio\\']:checked, #product input[type=\\'checkbox\\']:checked, #product select, #product textarea'),
            dataType: 'json',
            beforeSend: function () {
                \$('#button-cart').button('loading');
            },
            complete: function () {
                \$('#button-cart').button('reset');
            },
            success: function (json) {
                \$('.alert').remove();
                \$('.text-danger').remove();
                \$('.form-group').removeClass('has-error');
                if (json['error']) {
                    if (json['error']['option']) {
                        for (i in json['error']['option']) {
                            var element = \$('#input-option' + i.replace('_', '-'));

\t\t\t\t\t\t\t";
        // line 865
        if ((isset($context["option_data"]) ? $context["option_data"] : null)) {
            // line 866
            echo "                            if (ProductOptionId != undefined && ProductOptionId == i.replace('_', '-')) {
                                \$('.so-colorswatch-productpage-icons').after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
                            }
\t\t\t\t\t\t\t";
        }
        // line 870
        echo "

                            if (element.parent().hasClass('input-group')) {
                                element.parent().after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
                            } else {
                                element.after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
                            }
                        }
                    }

                    if (json['error']['recurring']) {
                        \$('select[name=\\'recurring_id\\']').after('<div class=\"text-danger\">' + json['error']['recurring'] + '</div>');
                    }

                    // Highlight any found errors
                    \$('.text-danger').parent().addClass('has-error');
                }

                if (json['success']) {
                    \$('.text-danger').remove();

                    \$('#cart  .total-shopping-cart ').html(json['total']);
                    \$('#cart > ul').load('index.php?route=common/cart/info ul li');


                    \$('.so-groups-sticky .popup-mycart .popup-content').load('index.php?route=extension/module/so_tools/info .popup-content .cart-header');
                }


            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    });
    \$('#button-checkout').on('click', function () {
        \$.ajax({
            url: 'index.php?route=checkout/cart/add',
            type: 'post',
            data: \$('#product input[type=\\'text\\'], #product input[type=\\'hidden\\'], #product input[type=\\'radio\\']:checked, #product input[type=\\'checkbox\\']:checked, #product select, #product textarea'),
            dataType: 'json',
            beforeSend: function () {
                \$('#button-checkout').button('loading');
            },
            complete: function () {
                \$('#button-checkout').button('reset');
            },
            success: function (json) {
                \$('.alert').remove();
                \$('.text-danger').remove();
                \$('.form-group').removeClass('has-error');

                if (json['error']) {
                    if (json['error']['option']) {
                        for (i in json['error']['option']) {
                            var element = \$('#input-option' + i.replace('_', '-'));

\t\t\t\t\t\t\t";
        // line 927
        if ((isset($context["option_data"]) ? $context["option_data"] : null)) {
            // line 928
            echo "                            if (ProductOptionId != undefined && ProductOptionId == i.replace('_', '-')) {
                                \$('.so-colorswatch-productpage-icons').after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
                            }
\t\t\t\t\t\t\t";
        }
        // line 932
        echo "

\t\t\t\t\t\t\t";
        // line 934
        if ((isset($context["option_data"]) ? $context["option_data"] : null)) {
            // line 935
            echo "                            if (ProductOptionId != undefined && ProductOptionId == i.replace('_', '-')) {
                                \$('.so-colorswatch-productpage-icons').after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
                            }
\t\t\t\t\t\t\t";
        }
        // line 939
        echo "

                            if (element.parent().hasClass('input-group')) {
                                element.parent().after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
                            } else {
                                element.after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
                            }
                        }
                    }

                    if (json['error']['recurring']) {
                        \$('select[name=\\'recurring_id\\']').after('<div class=\"text-danger\">' + json['error']['recurring'] + '</div>');
                    }

                    // Highlight any found errors
                    \$('.text-danger').parent().addClass('has-error');
                }

                if (json['success']) {
                    \$('.text-danger').remove();
                    \$('#cart  .total-shopping-cart ').html(json['total']);
                    window.location.href = \"index.php?route=checkout/checkout\";
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    });
    --></script>

<script type=\"text/javascript\"><!--
    \$('.date').datetimepicker({
        language: document.cookie.match(new RegExp('language=([^;]+)'))[1],
        pickTime: false
    });

    \$('.datetime').datetimepicker({
        language: document.cookie.match(new RegExp('language=([^;]+)'))[1],
        pickDate: true,
        pickTime: true
    });

    \$('.time').datetimepicker({
        language: document.cookie.match(new RegExp('language=([^;]+)'))[1],
        pickDate: false
    });

    \$('button[id^=\\'button-upload\\']').on('click', function () {
        var node = this;

        \$('#form-upload').remove();

        \$('body').prepend('<form enctype=\"multipart/form-data\" id=\"form-upload\" style=\"display: none;\"><input type=\"file\" name=\"file\" /></form>');

        \$('#form-upload input[name=\\'file\\']').trigger('click');

        if (typeof timer != 'undefined') {
            clearInterval(timer);
        }

        timer = setInterval(function () {
            if (\$('#form-upload input[name=\\'file\\']').val() != '') {
                clearInterval(timer);

                \$.ajax({
                    url: 'index.php?route=tool/upload',
                    type: 'post',
                    dataType: 'json',
                    data: new FormData(\$('#form-upload')[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        \$(node).button('loading');
                    },
                    complete: function () {
                        \$(node).button('reset');
                    },
                    success: function (json) {
                        \$('.text-danger').remove();

                        if (json['error']) {
                            \$(node).parent().find('input').after('<div class=\"text-danger\">' + json['error'] + '</div>');
                        }

                        if (json['success']) {
                            alert(json['success']);

                            \$(node).parent().find('input').val(json['code']);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
                    }
                });
            }
        }, 500);
    });
    //--></script>
<script type=\"text/javascript\"><!--
    \$('#review').delegate('.pagination a', 'click', function (e) {
        e.preventDefault();

        \$('#review').fadeOut('slow');
        \$('#review').load(this.href);
        \$('#review').fadeIn('slow');
    });

    \$('#review').load('index.php?route=product/product/review&product_id=";
        // line 1048
        echo (isset($context["product_id"]) ? $context["product_id"] : null);
        echo "');

    \$('#button-review').on('click', function () {
        \$.ajax({
            url: 'index.php?route=product/product/write&product_id=";
        // line 1052
        echo (isset($context["product_id"]) ? $context["product_id"] : null);
        echo "',
            type: 'post',
            dataType: 'json',
            data: \$(\"#form-review\").serialize(),
            beforeSend: function () {
                \$('#button-review').button('loading');
            },
            complete: function () {
                \$('#button-review').button('reset');
            },
            success: function (json) {
                \$('.alert-dismissible').remove();

                if (json['error']) {
                    \$('#review').after('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + '</div>');
                }

                if (json['success']) {
                    \$('#review').after('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + '</div>');

                    \$('input[name=\\'name\\']').val('');
                    \$('textarea[name=\\'text\\']').val('');
                    \$('input[name=\\'rating\\']:checked').prop('checked', false);
                }
            }
        });
    });

    //--></script>


<script type=\"text/javascript\"><!--
    \$(document).ready(function () {

        // Initialize the sticky scrolling on an item
        sidebar_sticky = '";
        // line 1087
        echo (isset($context["sidebar_sticky"]) ? $context["sidebar_sticky"] : null);
        echo "';

        if (sidebar_sticky == 'left') {
            \$(\".left_column\").stick_in_parent({
                offset_top: 10,
                bottoming: true
            });
        } else if (sidebar_sticky == 'right') {
            \$(\".right_column\").stick_in_parent({
                offset_top: 10,
                bottoming: true
            });
        } else if (sidebar_sticky == 'all') {
            \$(\".content-aside\").stick_in_parent({
                offset_top: 10,
                bottoming: true
            });
        }


        \$(\"#thumb-slider .image-additional--default\").each(function () {
            \$(this).find(\"[data-index='0']\").addClass('active');
        });

        \$('.product-options li.radio').click(function () {
            \$(this).addClass(function () {
                if (\$(this).hasClass(\"active\")) return \"\";
                return \"active\";
            });

            \$(this).siblings(\"li\").removeClass(\"active\");
            \$(this).parent().find('.selected-option').html('<span class=\"label label-success\">' + \$(this).find('img').data('original-title') + '</span>');
        })

        \$('.thumb-video').magnificPopup({
            type: 'iframe',
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
                        id: 'v=', // String that splits URL in a two parts, second part should be %id%
                        src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
                    },
                }
            }
        });
    });
    //--></script>


<script type=\"text/javascript\">
    var ajax_price = function () {
        \$.ajax({
            type: 'POST',
            url: 'index.php?route=extension/soconfig/liveprice/index',
            data: \$('.product-detail input[type=\\'text\\'], .product-detail input[type=\\'hidden\\'], .product-detail input[type=\\'radio\\']:checked, .product-detail input[type=\\'checkbox\\']:checked, .product-detail select, .product-detail textarea'),
            dataType: 'json',
            success: function (json) {
                if (json.success) {
                    change_price('#price-special', json.new_price.special);
                    change_price('#price-tax', json.new_price.tax);
                    change_price('#price-old', json.new_price.price);
                }
            }
        });
    }

    var change_price = function (id, new_price) {
        \$(id).html(new_price);
    }
    \$('.product-detail input[type=\\'text\\'], .product-detail input[type=\\'hidden\\'], .product-detail input[type=\\'radio\\'], .product-detail input[type=\\'checkbox\\'], .product-detail select, .product-detail textarea, .product-detail input[name=\\'quantity\\']').on('change', function () {
        ajax_price();
    });
</script>
<script type=\"text/javascript\">
    function showRelated() {
        document.getElementById('product-related').getElementsByClassName('owl2-stage')[0].style.width = '110%';
        document.getElementById('show_more_related_button').style.display = 'none';
    }
</script>
";
        // line 1167
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "so-revo/template/product/product.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2276 => 1167,  2193 => 1087,  2155 => 1052,  2148 => 1048,  2037 => 939,  2031 => 935,  2029 => 934,  2025 => 932,  2019 => 928,  2017 => 927,  1958 => 870,  1952 => 866,  1950 => 865,  1900 => 817,  1893 => 816,  1886 => 810,  1879 => 809,  1874 => 805,  1860 => 795,  1856 => 792,  1854 => 791,  1847 => 787,  1842 => 784,  1839 => 783,  1832 => 777,  1825 => 773,  1822 => 772,  1820 => 771,  1816 => 769,  1810 => 766,  1807 => 765,  1805 => 764,  1801 => 762,  1795 => 760,  1793 => 759,  1789 => 757,  1784 => 754,  1778 => 752,  1771 => 748,  1767 => 747,  1760 => 743,  1755 => 741,  1742 => 731,  1738 => 730,  1730 => 725,  1724 => 722,  1714 => 715,  1710 => 714,  1705 => 711,  1703 => 710,  1699 => 709,  1694 => 706,  1692 => 705,  1687 => 702,  1675 => 692,  1673 => 691,  1667 => 688,  1663 => 687,  1660 => 686,  1656 => 684,  1649 => 682,  1640 => 679,  1636 => 678,  1633 => 677,  1629 => 676,  1625 => 674,  1621 => 673,  1615 => 671,  1613 => 670,  1603 => 667,  1600 => 666,  1595 => 663,  1588 => 660,  1586 => 659,  1583 => 658,  1577 => 655,  1572 => 654,  1570 => 653,  1567 => 652,  1560 => 649,  1558 => 648,  1550 => 642,  1547 => 641,  1541 => 636,  1534 => 633,  1532 => 632,  1529 => 631,  1523 => 628,  1518 => 627,  1516 => 626,  1508 => 620,  1505 => 619,  1491 => 617,  1487 => 615,  1484 => 614,  1479 => 613,  1474 => 612,  1471 => 611,  1468 => 610,  1465 => 609,  1460 => 606,  1457 => 605,  1454 => 604,  1451 => 603,  1448 => 602,  1445 => 601,  1442 => 600,  1439 => 599,  1436 => 598,  1433 => 597,  1430 => 596,  1427 => 595,  1424 => 594,  1422 => 593,  1417 => 592,  1415 => 591,  1413 => 590,  1410 => 589,  1407 => 587,  1401 => 584,  1398 => 583,  1395 => 582,  1390 => 578,  1387 => 576,  1383 => 574,  1379 => 572,  1373 => 571,  1370 => 570,  1364 => 569,  1361 => 568,  1358 => 567,  1351 => 565,  1346 => 564,  1342 => 563,  1338 => 562,  1335 => 561,  1333 => 560,  1330 => 559,  1326 => 556,  1320 => 553,  1317 => 552,  1315 => 551,  1311 => 549,  1306 => 547,  1303 => 546,  1301 => 545,  1291 => 538,  1287 => 537,  1275 => 528,  1263 => 519,  1259 => 517,  1251 => 511,  1247 => 510,  1240 => 506,  1235 => 503,  1229 => 499,  1218 => 497,  1214 => 496,  1210 => 495,  1203 => 492,  1201 => 491,  1197 => 489,  1194 => 488,  1188 => 487,  1177 => 479,  1173 => 478,  1169 => 477,  1162 => 475,  1154 => 473,  1152 => 472,  1149 => 471,  1138 => 463,  1134 => 462,  1130 => 461,  1123 => 459,  1115 => 457,  1113 => 456,  1110 => 455,  1099 => 447,  1095 => 446,  1091 => 445,  1084 => 443,  1076 => 441,  1074 => 440,  1071 => 439,  1065 => 436,  1061 => 435,  1057 => 434,  1052 => 432,  1048 => 431,  1044 => 430,  1037 => 429,  1035 => 428,  1032 => 427,  1026 => 424,  1022 => 423,  1018 => 422,  1014 => 421,  1008 => 420,  1000 => 418,  998 => 417,  995 => 416,  989 => 413,  983 => 412,  979 => 411,  973 => 410,  965 => 408,  963 => 407,  960 => 406,  954 => 402,  945 => 396,  941 => 394,  939 => 393,  936 => 392,  926 => 387,  918 => 385,  916 => 384,  912 => 383,  909 => 382,  902 => 380,  897 => 379,  895 => 378,  888 => 376,  883 => 374,  879 => 373,  873 => 370,  870 => 369,  867 => 368,  864 => 367,  860 => 366,  857 => 365,  854 => 364,  852 => 363,  848 => 362,  844 => 361,  837 => 360,  835 => 359,  832 => 358,  826 => 354,  817 => 348,  813 => 347,  809 => 345,  807 => 344,  804 => 343,  794 => 338,  786 => 337,  781 => 336,  774 => 334,  769 => 333,  767 => 332,  760 => 330,  755 => 328,  751 => 327,  745 => 324,  742 => 323,  739 => 322,  736 => 321,  732 => 320,  729 => 319,  726 => 318,  724 => 317,  720 => 316,  716 => 315,  709 => 314,  707 => 313,  704 => 312,  699 => 309,  692 => 307,  685 => 305,  683 => 304,  676 => 303,  672 => 302,  668 => 301,  663 => 299,  659 => 298,  653 => 297,  645 => 295,  643 => 294,  640 => 293,  636 => 292,  633 => 291,  628 => 288,  612 => 275,  604 => 270,  581 => 250,  573 => 245,  562 => 236,  546 => 223,  536 => 216,  526 => 208,  524 => 207,  511 => 197,  506 => 195,  500 => 192,  494 => 188,  480 => 184,  476 => 183,  472 => 182,  468 => 181,  464 => 180,  460 => 178,  456 => 177,  450 => 175,  448 => 174,  443 => 173,  441 => 172,  436 => 169,  432 => 167,  419 => 164,  416 => 163,  412 => 162,  409 => 161,  407 => 160,  402 => 157,  397 => 154,  391 => 151,  388 => 150,  386 => 149,  380 => 146,  374 => 143,  368 => 142,  364 => 140,  357 => 136,  351 => 135,  348 => 134,  346 => 133,  342 => 131,  340 => 130,  337 => 129,  331 => 125,  329 => 124,  323 => 121,  318 => 118,  312 => 115,  308 => 114,  304 => 112,  302 => 111,  291 => 104,  288 => 102,  285 => 100,  282 => 99,  279 => 98,  276 => 97,  274 => 96,  271 => 95,  268 => 94,  266 => 93,  263 => 92,  260 => 91,  258 => 90,  255 => 89,  252 => 88,  250 => 87,  247 => 86,  244 => 85,  241 => 84,  238 => 82,  236 => 81,  231 => 80,  225 => 75,  219 => 72,  214 => 71,  211 => 70,  208 => 69,  205 => 67,  202 => 66,  199 => 65,  196 => 64,  193 => 63,  190 => 62,  187 => 61,  184 => 60,  181 => 59,  178 => 58,  175 => 57,  172 => 56,  169 => 55,  166 => 54,  163 => 53,  160 => 52,  157 => 51,  152 => 48,  149 => 47,  147 => 46,  144 => 45,  141 => 44,  138 => 43,  135 => 42,  132 => 41,  129 => 40,  126 => 39,  123 => 38,  120 => 37,  117 => 36,  114 => 35,  112 => 34,  106 => 32,  104 => 31,  101 => 30,  97 => 27,  86 => 25,  82 => 24,  76 => 21,  73 => 20,  71 => 19,  68 => 18,  64 => 17,  59 => 16,  56 => 15,  53 => 14,  48 => 13,  45 => 12,  42 => 11,  37 => 10,  34 => 9,  31 => 8,  27 => 7,  24 => 5,  19 => 1,);
    }
}
/* {{ header }}*/
/* */
/* {# ====  Loader breadcrumbs ==== #}*/
/* {# {% include theme_directory~'/template/soconfig/breadcrumbs.twig' %} #}*/
/* */
/* {# ====  Variables url parameter ==== #}*/
/* {% if url_asidePosition %}{% set col_position = url_asidePosition %}*/
/* {% else %}{% set col_position = soconfig.get_settings('catalog_col_position') %}{% endif %}*/
/* */
/* {% if url_asideType %} {% set col_canvas = url_asideType %}*/
/* {% else %}{% set col_canvas = soconfig.get_settings('catalog_col_type') %}{% endif %}*/
/* */
/* {% if url_productGallery %} {% set productGallery = url_productGallery %}*/
/* {% else %}{% set productGallery = soconfig.get_settings('thumbnails_position') %}{% endif %}*/
/* */
/* {% if url_sidebarsticky %} {% set sidebar_sticky = url_sidebarsticky %}*/
/* {% else %} {% set sidebar_sticky = soconfig.get_settings('catalog_sidebar_sticky') %}{% endif %}*/
/* */
/* {% set desktop_canvas = col_canvas =='off_canvas' ? 'desktop-offcanvas' : '' %}*/
/* */
/* <div class="content-main container product-detail  {{ desktop_canvas }}">*/
/* 	<div class="row">*/
/* 		<ul class="breadcrumb">*/
/* 			{% for breadcrumb in breadcrumbs %}*/
/* 				<li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/* 			{% endfor %}*/
/* 		</ul>*/
/* */
/* 		{# ==== Column Left Outside ==== #}*/
/* */
/* 		{% if col_position== 'outside' %}*/
/* 			{{ column_left }}*/
/* */
/* 			{% if col_canvas =='off_canvas' %}*/
/* 				{% set class_pos = 'col-sm-12' %}*/
/* 			{% elseif column_left and column_right %}*/
/* 				{% set class_pos = 'col-md-6 col-xs-12 fluid-allsidebar' %}*/
/* 			{% elseif column_left or column_right %}*/
/* 				{% set class_pos = 'col-md-9 col-sm-12 col-xs-12 fluid-sidebar' %}*/
/* 			{% else %}*/
/* 				{% set class_pos = 'col-sm-12' %}*/
/* 			{% endif %}*/
/* 		{% else %}*/
/* 			{% set class_pos = 'col-sm-12' %}*/
/* 		{% endif %}*/
/* 		{# ==== End Column Outside ==== #}*/
/* */
/* 		<div id="content" class="product-view {{ class_pos }}">*/
/* */
/* 			{# ====  Product Gallery ==== #}*/
/* 			{% if productGallery =='grid' %}*/
/* 				{% set class_left_gallery  = 'col-md-6 col-sm-12 col-xs-12' %}*/
/* 				{% set class_right_gallery = 'col-md-6 col-sm-12 col-xs-12' %}*/
/* 			{% elseif productGallery =='list' %}*/
/* 				{% set class_left_gallery  = 'col-md-5 col-sm-12 col-xs-12' %}*/
/* 				{% set class_right_gallery = 'col-md-7 col-sm-12 col-xs-12' %}*/
/* 			{% elseif productGallery =='left' %}*/
/* 				{% set class_left_gallery  = 'col-md-6 col-sm-12 col-xs-12' %}*/
/* 				{% set class_right_gallery = 'col-md-6 col-sm-12 col-xs-12' %}*/
/* 			{% elseif productGallery =='bottom' %}*/
/* 				{% set class_left_gallery  = 'col-md-5 col-sm-12 col-xs-12' %}*/
/* 				{% set class_right_gallery = 'col-md-7 col-sm-12 col-xs-12' %}*/
/* 			{% else %}*/
/* 				{% set class_left_gallery  = 'col-md-12 col-sm-12 col-xs-12' %}*/
/* 				{% set class_right_gallery = 'col-md-12 col-sm-12 col-xs-12 col-gallery-slider' %}*/
/* 			{% endif %}*/
/* */
/* 			{# ====  Button Sidebar canvas==== #}*/
/* 			{% if column_left or column_right %}*/
/* 				{% set class_canvas = col_canvas =='off_canvas' ? '' : 'hidden-lg hidden-md' %}*/
/* 				<a href="javascript:void(0)" class=" open-sidebar {{ class_canvas }}"><i*/
/* 							class="fa fa-bars"></i>{{ text_sidebar }}</a>*/
/* 				<div class="sidebar-overlay "></div>*/
/* 			{% endif %}*/
/* */
/* */
/* 			<div class="content-product-mainheader clearfix">*/
/* 				<div class="row">*/
/* 					{# ========== Product Left ============ #}*/
/* 					<div class="content-product-left  {{ class_left_gallery }}">*/
/* 						{% if images %}*/
/* 							<div class="so-loadeding"></div>*/
/* 							{# ==== Gallery -  Thumbnails ==== #}*/
/* 							{% if productGallery=='left' %}*/
/* 								{% include theme_directory~'/template/product/gallery/gallery-left.twig' %}*/
/* */
/* 							{% elseif productGallery=='bottom' %}*/
/* 								{% include theme_directory~'/template/product/gallery/gallery-bottom.twig' %}*/
/* */
/* 							{% elseif productGallery=='grid' %}*/
/* 								{% include theme_directory~'/template/product/gallery/gallery-grid.twig' %}*/
/* */
/* 							{% elseif productGallery=='list' %}*/
/* 								{% include theme_directory~'/template/product/gallery/gallery-list.twig' %}*/
/* */
/* 							{% elseif productGallery=='slider' %}*/
/* 								{% include theme_directory~'/template/product/gallery/gallery-slider.twig' %}*/
/* 							{% endif %}*/
/* 						{% endif %}*/
/* 					</div>*/
/* 					{# ========== //Product Left ============ #}*/
/* */
/* 					{# ========== Product Right ============ #}*/
/* 					<div class="content-product-right {{ class_right_gallery }}" itemprop="offerDetails" itemscope*/
/* 					     itemtype="http://schema.org/Product">*/
/* 						<div class="kai-product-heading">*/
/* */
/* 							<div class="product-box-desc">*/
/* 								<div class="inner-box-desc">*/
/* */
/* 									{% if manufacturer %}*/
/* 										<div class="brand" itemprop="brand" itemscope*/
/* 										     itemtype="http://schema.org/Brand">*/
/* 											<a href="{{ manufacturers }}" itemprop="url"><span*/
/* 														itemprop="name">{{ manufacturer }} </span></a>*/
/* 										</div>*/
/* 									{% endif %}*/
/* 								</div>*/
/* 							</div>*/
/* 							<div class="title-product">*/
/* 								<h1 itemprop="name">{{ heading_title }}</h1>*/
/* 							</div>*/
/* 							*/
/* 					        {% if stock == 'Out Of Stock' %}*/
/*         						<h3 class="price-new">*/
/* 							        <strong style="font-size: large">ИЗЧЕРПАНА НАЛИЧНОСТ</strong>*/
/*         						</h3>*/
/* 							{% else %}*/
/* 								{% if price %}*/
/* 								{# ========= Product - Price ========= #}*/
/* 								<div class="product_page_price price" itemprop="offers" itemscope*/
/* 								     itemtype="http://schema.org/Offer">*/
/* 									{% if not special %}*/
/* 										<span class="price-new">*/
/* 											<span itemprop="price" content="{{ price_value }}" id="price-old">{{ price }}</span>*/
/* 											<meta itemprop="priceCurrency" content="{{ currency }}"/>*/
/* 										</span>*/
/* */
/* 												{% else %}*/
/* */
/* 													<span class="price-new">*/
/* 											<span itemprop="price" content="{{ special_value }}" id="price-special">{{ special }}</span>*/
/* 											<meta itemprop="priceCurrency" content="{{ currency }}"/>*/
/* 										</span>*/
/* 				                        <span class="price-old" id="price-old">*/
/* 											{{ price }}*/
/* 									   </span>*/
/* */
/* 										{% set discount_percent = ((price_value - special_value) / price_value) * 100 %}*/
/* 										<div style="color: red; font-weight: bold;">*/
/* 											Спестявате: {{ discount_percent | round(0) }}%*/
/* 										</div>*/
/* 									{% endif %}*/
/* */
/* 								</div>*/
/* 								{% endif %}*/
/* */
/* */
/* */
/* 								{% if discounts %}*/
/* 								<ul class="list-unstyled text-success">*/
/* 									{% for discount in discounts %}*/
/* 										<li>*/
/* 											<strong>{{ discount.quantity }} {{ text_discount }} {{ discount.price }}</strong>*/
/* 										</li>*/
/* 									{% endfor %}*/
/* 								</ul>*/
/* 								{% endif %}*/
/* */
/* */
/* 								<div id="product">*/
/* 									{% if options %}*/
/* 										<h3>{{ text_option }}</h3>*/
/* 										{% if option_data and option_data.product_option_value is defined and option_data.product_option_value %}*/
/* 											<ul id="so-colorswatch-selector-{{ product_id }}"*/
/* 											    class='so-colorswatch-productpage-icons'>*/
/* 												{% for option_value in option_data.product_option_value %}*/
/* 													<li class="option-item">*/
/* 														<a class=""*/
/* 														   data-product-option-value-id="{{ option_value.product_option_value_id }}"*/
/* 														   data-option-value-id="{{ option_value.option_value_id }}"*/
/* 														   data-color-image="{{ option_value.color_image }}"*/
/* 														   data-color-thumb-image="{{ option_value.color_thumb_image }}"*/
/* 														   style="width: {{ width_product_page }}px; height: {{ height_product_page }}px; background-image: url('{{ option_value.image }}')">*/
/* 														</a>*/
/* 													</li>*/
/* 												{% endfor %}*/
/* 												<li class="selected-option"><span></span></li>*/
/* 											</ul>*/
/* 											<script type="text/javascript">*/
/* 		                                        var $window_width = $(window).width();*/
/* 		                                        var ProductOptionId = '{{ product_option_id }}';*/
/* 		                                        var default_image = $('.large-image img').attr('src');*/
/* 		                                        jQuery(document).ready(function ($) {*/
/* 		                                            $('#input-option{{ product_option_id }}').parent().hide();*/
/* */
/* 		                                            $('#input-option{{ product_option_id }} option').each(function () {*/
/* 		                                                var text = $(this).text().replace(/\s{2,}/g, ' ');*/
/* 		                                                var val = $(this).attr('value');*/
/* 		                                                $('.so-colorswatch-productpage-icons li a').each(function (index, el) {*/
/* 		                                                    if ($(el).data('product-option-value-id') == val) {*/
/* 		                                                        $(el).attr('title', text);*/
/* 		                                                    }*/
/* 		                                                })*/
/* 		                                            })*/
/* */
/* 													{% if colorswatch_type == 'click' %}*/
/* 		                                            $(document).on('click', '.so-colorswatch-productpage-icons li.option-item', function (e) {*/
/* 		                                                e.preventDefault();*/
/* 		                                                var option_value_id = $(this).children('a').data('product-option-value-id');*/
/* 		                                                var option_id = $(this).children('a').data('option-value-id');*/
/* */
/* 		                                                if ($(this).hasClass('checked')) {*/
/* 		                                                    $('.so-colorswatch-productpage-icons li.option-item').removeClass('checked');*/
/* 		                                                    $(this).removeClass('checked');*/
/* 		                                                    $('#input-option{{ product_option_id }}').val('').trigger('change');*/
/* 		                                                    $('.so-colorswatch-productpage-icons li.selected-option > span').html('');*/
/* */
/* 		                                                    $('.large-image img').attr('src', default_image);*/
/* 		                                                } else {*/
/* 		                                                    $('.so-colorswatch-productpage-icons li.option-item').removeClass('checked');*/
/* 		                                                    $(this).removeClass('checked').addClass('checked');*/
/* 		                                                    $('#input-option{{ product_option_id }}').val(option_value_id).trigger('change');*/
/* 		                                                    $('.so-colorswatch-productpage-icons li.selected-option > span').html($(this).children('a').attr('title'));*/
/* */
/* 		                                                    if ($(this).children('a').data('color-image') != '') {*/
/* 		                                                        $('.large-image img').attr('src', $(this).children('a').data('color-image'));*/
/* 		                                                    } else {*/
/* 		                                                        $('.large-image img').attr('src', default_image);*/
/* 		                                                    }*/
/* */
/* 		                                                    $('#thumb-slider a.thumbnail').removeClass('active');*/
/* 		                                                }*/
/* 		                                            })*/
/* 													{% else %}*/
/* 		                                            if ($window_width > 1199) {*/
/* 		                                                $('.so-colorswatch-productpage-icons li.option-item').hover(function (e) {*/
/* 		                                                    e.preventDefault();*/
/* 		                                                    var option_value_id = $(this).children('a').data('product-option-value-id');*/
/* 		                                                    var option_id = $(this).children('a').data('option-value-id');*/
/* */
/* 		                                                    $('.so-colorswatch-productpage-icons li.option-item').removeClass('checked');*/
/* 		                                                    if ($(this).hasClass('checked')) {*/
/* 		                                                        $(this).removeClass('checked');*/
/* 		                                                        $('#input-option{{ product_option_id }}').val('').trigger('change');*/
/* 		                                                        $('.large-image img').attr('src', default_image);*/
/* */
/* 		                                                    } else {*/
/* 		                                                        $(this).removeClass('checked').addClass('checked');*/
/* 		                                                        $('#input-option{{ product_option_id }}').val(option_value_id).trigger('change');*/
/* 		                                                        $('.so-colorswatch-productpage-icons li.selected-option > span').html($(this).children('a').attr('title'));*/
/* */
/* 		                                                        if ($(this).children('a').data('color-image') != '') {*/
/* 		                                                            $('.large-image img').attr('src', $(this).children('a').data('color-image'));*/
/* 		                                                        } else {*/
/* 		                                                            $('.large-image img').attr('src', default_image);*/
/* 		                                                        }*/
/* 		                                                        $('#thumb-slider a.thumbnail').removeClass('active');*/
/* 		                                                    }*/
/* 		                                                });*/
/* 		                                            } else {*/
/* 		                                                $(document).on('click', '.so-colorswatch-productpage-icons li.option-item', function (e) {*/
/* 		                                                    e.preventDefault();*/
/* 		                                                    var option_value_id = $(this).children('a').data('product-option-value-id');*/
/* 		                                                    var option_id = $(this).children('a').data('option-value-id');*/
/* */
/* 		                                                    $('.so-colorswatch-productpage-icons li.option-item').removeClass('checked');*/
/* 		                                                    if ($(this).hasClass('checked')) {*/
/* 		                                                        $(this).removeClass('checked');*/
/* 		                                                        $('#input-option{{ product_option_id }}').val('').trigger('change');*/
/* 		                                                        $('.large-image img').attr('src', default_image);*/
/* */
/* 		                                                    } else {*/
/* 		                                                        $(this).removeClass('checked').addClass('checked');*/
/* 		                                                        $('#input-option{{ product_option_id }}').val(option_value_id).trigger('change');*/
/* 		                                                        $('.so-colorswatch-productpage-icons li.selected-option > span').html($(this).children('a').attr('title'));*/
/* */
/* 		                                                        if ($(this).children('a').data('color-image') != '') {*/
/* 		                                                            $('.large-image img').attr('src', $(this).children('a').data('color-image'));*/
/* 		                                                        } else {*/
/* 		                                                            $('.large-image img').attr('src', default_image);*/
/* 		                                                        }*/
/* 		                                                        $('#thumb-slider a.thumbnail').removeClass('active');*/
/* 		                                                    }*/
/* 		                                                })*/
/* 		                                            }*/
/* 													{% endif %}*/
/* 		                                        })*/
/* 											</script>*/
/* 										{% endif %}*/
/* */
/* 										{% for option in options %}*/
/* */
/* 											{% if option.type == 'select' %}*/
/* 												<div class="form-group{% if option.required %} required {% endif %}">*/
/* 													<label class="control-label"*/
/* 													       for="input-option{{ option.product_option_id }}">{{ option.name }}</label>*/
/* 													<select name="option[{{ option.product_option_id }}]"*/
/* 													        id="input-option{{ option.product_option_id }}"*/
/* 													        class="form-control width50">*/
/* 														<option value="">{{ text_select }}</option>*/
/* 														{% for option_value in option.product_option_value %}*/
/* 															<option value="{{ option_value.product_option_value_id }}">{{ option_value.name }}*/
/* 																{% if option_value.price %}*/
/* 																	({{ option_value.price_prefix }}{{ option_value.price }})*/
/* 																{% endif %}*/
/* 															</option>*/
/* 														{% endfor %}*/
/* 													</select>*/
/* 												</div>*/
/* 											{% endif %}*/
/* */
/* 											{% if option.type == 'radio' %}*/
/* 												<div class="form-group{% if option.required %} required {% endif %}">*/
/* 													<label class="control-label">{{ option.name }}</label>*/
/* 													<div id="input-option{{ option.product_option_id }}">*/
/* 														{% set radio_style     = soconfig.get_settings('radio_style') %}*/
/* 														{% set radio_type     = radio_style ? ' radio-type-button':'' %}*/
/* */
/* 														{% for option_value in option.product_option_value %}*/
/* 															{% set radio_image    =  option_value.image ? 'option_image' : '' %}*/
/* 															{% set radio_price    =  radio_style ? option_value.price_prefix ~ option_value.price : '' %}*/
/* */
/* 															<div class="radio {{ radio_image ~ radio_type }}">*/
/* 																<label>*/
/* 																	<input type="radio"*/
/* 																	       name="option[{{ option.product_option_id }}]"*/
/* 																	       value="{{ option_value.product_option_value_id }}"/>*/
/* 																	<span class="option-content-box"*/
/* 																	      data-title="{{ option_value.name }} {{ radio_price }}"*/
/* 																	      data-toggle='tooltip'>*/
/* 			                                                    {% if option_value.image %}*/
/* 				                                                    <img src="{{ option_value.image }} "*/
/* 				                                                         alt="{{ option_value.name }}  {{ radio_price }}"/>*/
/* 			                                                    {% endif %}*/
/* 			                                                    <span class="option-name">{{ option_value.name }} </span>*/
/* 			                                                    {% if option_value.price  and  radio_style  != '1' %} ({{ option_value.price_prefix }} {{ option_value.price }} ){% endif %}*/
/* */
/* 			                                                </span>*/
/* 																</label>*/
/* 															</div>*/
/* 														{% endfor %}*/
/* */
/* 														{% if radio_style %}*/
/* 															<script type="text/javascript">*/
/* 			                                                    $(document).ready(function () {*/
/* 			                                                        $('#input-option{{ option.product_option_id }} ').on('click', 'span', function () {*/
/* 			                                                            $('#input-option{{ option.product_option_id }}  span').removeClass("active");*/
/* 			                                                            $(this).toggleClass("active");*/
/* 			                                                        });*/
/* 			                                                    });*/
/* 															</script>*/
/* 														{% endif %}*/
/* */
/* 													</div>*/
/* 												</div>*/
/* 											{% endif %}*/
/* */
/* 											{% if option.type == 'checkbox' %}*/
/* 												<div class="form-group{% if option.required %} required {% endif %}">*/
/* 													<label class="control-label">{{ option.name }}</label>*/
/* 													<div id="input-option{{ option.product_option_id }}">*/
/* 														{% set radio_style     = soconfig.get_settings('radio_style') %}*/
/* 														{% set radio_type     = radio_style ? ' radio-type-button':'' %}*/
/* */
/* 														{% for option_value in option.product_option_value %}*/
/* 															{% set radio_image    =  option_value.image ? 'option_image' : '' %}*/
/* 															{% set radio_price    =  radio_style ? option_value.price_prefix ~ option_value.price : '' %}*/
/* */
/* 															<div class="checkbox  {{ radio_image ~ radio_type }}">*/
/* 																<label>*/
/* 																	<input type="checkbox"*/
/* 																	       name="option[{{ option.product_option_id }}][]"*/
/* 																	       value="{{ option_value.product_option_value_id }}"/>*/
/* 																	<span class="option-content-box"*/
/* 																	      data-title="{{ option_value.name }} {{ radio_price }}"*/
/* 																	      data-toggle='tooltip'>*/
/* 			                                                    {% if option_value.image %}*/
/* 				                                                    <img src="{{ option_value.image }} "*/
/* 				                                                         alt="{{ option_value.name }}  {{ radio_price }}"/>*/
/* 			                                                    {% endif %}*/
/* */
/* 			                                                    <span class="option-name">{{ option_value.name }} </span>*/
/* 			                                                    {% if option_value.price  and  radio_style  != '1' %}*/
/* 				                                                    ({{ option_value.price_prefix }} {{ option_value.price }} )*/
/* 			                                                    {% endif %}*/
/* */
/* 			                                                </span>*/
/* 																</label>*/
/* 															</div>*/
/* 														{% endfor %}*/
/* */
/* 														{% if radio_style %}*/
/* 															<script type="text/javascript">*/
/* 			                                                    $(document).ready(function () {*/
/* 			                                                        $('#input-option{{ option.product_option_id }} ').on('click', 'span', function () {*/
/* 			                                                            $(this).toggleClass("active");*/
/* 			                                                        });*/
/* 			                                                    });*/
/* 															</script>*/
/* 														{% endif %}*/
/* */
/* 													</div>*/
/* 												</div>*/
/* 											{% endif %}*/
/* */
/* 											{% if option.type == 'text' %}*/
/* 												<div class="form-group{% if option.required %} required {% endif %}">*/
/* 													<label class="control-label"*/
/* 													       for="input-option{{ option.product_option_id }}">{{ option.name }}</label>*/
/* 													<input type="text" name="option[{{ option.product_option_id }}]"*/
/* 													       value="{{ option.value }}" placeholder="{{ option.name }}"*/
/* 													       id="input-option{{ option.product_option_id }}" class="form-control"/>*/
/* 												</div>*/
/* 											{% endif %}*/
/* */
/* 											{% if option.type == 'textarea' %}*/
/* 												<div class="form-group{% if option.required %} required {% endif %}">*/
/* 													<label class="control-label"*/
/* 													       for="input-option{{ option.product_option_id }}">{{ option.name }}</label>*/
/* 													<textarea name="option[{{ option.product_option_id }}]" rows="5"*/
/* 													          placeholder="{{ option.name }}"*/
/* 													          id="input-option{{ option.product_option_id }}"*/
/* 													          class="form-control">{{ option.value }}</textarea>*/
/* 												</div>*/
/* 											{% endif %}*/
/* */
/* 											{% if option.type == 'file' %}*/
/* 												<div class="form-group{% if option.required %} required {% endif %}">*/
/* 													<label class="control-label">{{ option.name }}</label>*/
/* 													<button type="button" id="button-upload{{ option.product_option_id }}"*/
/* 													        data-loading-text="{{ text_loading }}"*/
/* 													        class="btn btn-default btn-block"><i*/
/* 																class="fa fa-upload"></i> {{ button_upload }}</button>*/
/* 													<input type="hidden" name="option[{{ option.product_option_id }}]" value=""*/
/* 													       id="input-option{{ option.product_option_id }}"/>*/
/* 												</div>*/
/* 											{% endif %}*/
/* */
/* 											{% if option.type == 'date' %}*/
/* 												<div class="form-group{% if option.required %} required {% endif %}">*/
/* 													<label class="control-label"*/
/* 													       for="input-option{{ option.product_option_id }}">{{ option.name }}</label>*/
/* 													<div class="input-group date">*/
/* 														<input type="text" name="option[{{ option.product_option_id }}]"*/
/* 														       value="{{ option.value }}" data-date-format="YYYY-MM-DD"*/
/* 														       id="input-option{{ option.product_option_id }}"*/
/* 														       class="form-control"/>*/
/* 														<span class="input-group-btn">*/
/* 			                                    <button class="btn btn-default" type="button"><i*/
/* 						                                    class="fa fa-calendar"></i></button>*/
/* 			                                    </span></div>*/
/* 												</div>*/
/* 											{% endif %}*/
/* */
/* 											{% if option.type == 'datetime' %}*/
/* 												<div class="form-group{% if option.required %} required {% endif %}">*/
/* 													<label class="control-label"*/
/* 													       for="input-option{{ option.product_option_id }}">{{ option.name }}</label>*/
/* 													<div class="input-group datetime">*/
/* 														<input type="text" name="option[{{ option.product_option_id }}]"*/
/* 														       value="{{ option.value }}" data-date-format="YYYY-MM-DD HH:mm"*/
/* 														       id="input-option{{ option.product_option_id }}"*/
/* 														       class="form-control"/>*/
/* 														<span class="input-group-btn">*/
/* 			                                                <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>*/
/* 			                                            </span>*/
/* 													</div>*/
/* 												</div>*/
/* 											{% endif %}*/
/* */
/* 											{% if option.type == 'time' %}*/
/* 												<div class="form-group{% if option.required %} required {% endif %}">*/
/* 													<label class="control-label"*/
/* 													       for="input-option{{ option.product_option_id }}">{{ option.name }}</label>*/
/* 													<div class="input-group time">*/
/* 														<input type="text" name="option[{{ option.product_option_id }}]"*/
/* 														       value="{{ option.value }}" data-date-format="HH:mm"*/
/* 														       id="input-option{{ option.product_option_id }}"*/
/* 														       class="form-control"/>*/
/* 														<span class="input-group-btn">*/
/* 			                                                <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>*/
/* 		                                                </span>*/
/* 													</div>*/
/* 												</div>*/
/* 											{% endif %}*/
/* 										{% endfor %}*/
/* 									{% endif %}*/
/* */
/* 									<div class="box-cart clearfix ">*/
/* 										{% if recurrings %}*/
/* 											<h3>{{ text_payment_recurring }}</h3>*/
/* 											<div class="form-group required">*/
/* 												<select name="recurring_id" class="form-control">*/
/* 													<option value="">{{ text_select }}</option>*/
/* 													{% for recurring in recurrings %}*/
/* 														<option value="{{ recurring.recurring_id }}">{{ recurring.name }}</option>*/
/* 													{% endfor %}*/
/* 												</select>*/
/* 												<div class="help-block" id="recurring-description"></div>*/
/* 											</div>*/
/* 										{% endif %}*/
/* */
/* 										<div class="form-group box-info-product">*/
/* 											<div class="option quantity">*/
/* 												<label class="control-label" for="input-quantity">{{ entry_qty }}</label>*/
/* 												<div class="input-group quantity-control">*/
/* 													<span class="input-group-addon product_quantity_down fa fa-minus"></span>*/
/* 													<input class="form-control" type="text" name="quantity"*/
/* 													       value="{{ minimum }}"/>*/
/* 													<input type="hidden" name="product_id" value="{{ product_id }}"/>*/
/* 													<span class="input-group-addon product_quantity_up fa fa-plus"></span>*/
/* 												</div>*/
/* 											</div>*/
/* 											<div class="detail-action">*/
/* 												{# =========button Cart ====== #}*/
/* 												<div class="cart kai">*/
/* 													<input type="button" value="Добави"*/
/* 													       data-loading-text="{{ text_loading }}" id="button-cart"*/
/* 													       class="btn btn-mega">*/
/* 												</div>*/
/* */
/* 												<div class="add-to-links wish_comp kai">*/
/* */
/* 													<ul class="blank list-inline">*/
/* 														<li class="wishlist">*/
/* */
/* 															<a onclick="wishlist.add({{ product_id }});"> Добави в любими <i*/
/* 																		class="fa fa-heart"></i></a>*/
/* 														</li>*/
/* 														<li class="free-delivery">*/
/* 															<a href=""> <img src="image/catalog/demo/icon/icon1.png"*/
/* 															                 alt="free-shipping-icon"/> Безплатна доставка*/
/* 																над 120 лв. до 5 кг</a>*/
/* 														</li>*/
/* */
/* 														<li class="model"><span>Продуктов код: </span> {{ model }}</li>*/
/* 														<li class="weight"><span>Тегло: </span> {{ weight }} кг.</li>*/
/* 													</ul>*/
/* 												</div>*/
/* 											</div>*/
/* 										</div>*/
/* */
/* */
/* 										{% if minimum > 1 %}*/
/* 											<div class="alert alert-info"><i*/
/* 														class="fa fa-info-circle"></i> {{ text_minimum }}</div>*/
/* 										{% endif %}*/
/* 									</div>*/
/* */
/* 									{% if soconfig.get_settings('product_page_button') and soconfig.get_settings('product_socialshare') %}*/
/* 										<div class="form-group social-share clearfix">*/
/* 											{{ soconfig.decode_entities( soconfig.get_settings('product_socialshare') ) }}*/
/* 										</div>*/
/* 									{% endif %}*/
/* 									<!-- Go to www.addthis.com/dashboard to customize your tools -->*/
/* */
/* 									{# <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-529be2200cc72db5"></script> #}*/
/* */
/* 									{% if tags %}*/
/* 										<div id="tab-tags" style="visibility: hidden;">*/
/* 											{{ text_tags }}*/
/* 											{% for i in 0..tags|length %}*/
/* 												{% if i < (tags|length - 1) %} <a class="btn btn-primary btn-sm"*/
/* 												                                  href="{{ tags[i].href }}">{{ tags[i].tag }}</a>*/
/* 												{% else %}*/
/* 													{% if tags[i] is not empty %}*/
/* 														<a class="btn btn-primary btn-sm 22"*/
/* 														   href="{{ tags[i].href }}">{{ tags[i].tag }}</a> {% endif %}*/
/* 												{% endif %}*/
/* 											{% endfor %}*/
/* 										</div>*/
/* 									{% endif %}*/
/* 								</div>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 						{# ========== //Product Right ============ #}*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 			{# ====  content_Top==== #}*/
/* 			{% if content_top %}*/
/* 				<div class="content-product-maintop form-group clearfix">*/
/* 					{{ content_top }}*/
/* 				</div>*/
/* 			{% endif %}*/
/* 			<div class="content-product-mainbody clearfix row">*/
/* 				{#<h2>Описание {{ heading_title }}</h2>#}*/
/* */
/* 				{% if col_position== 'inside' %}*/
/* 					{# ====  Column left inside==== #}*/
/* 					{{ column_left }}*/
/* 					{% if col_canvas =='off_canvas' %}*/
/* 						{% set class_left = 'col-sm-12' %}*/
/* 					{% elseif column_left and column_right %}*/
/* 						{% set class_left = 'col-md-6 col-column3' %}*/
/* 					{% elseif column_left or column_right %}*/
/* 						{% set class_left = 'col-md-9 col-sm-12 col-xs-12' %}*/
/* 					{% else %}*/
/* 						{% set class_left = 'col-sm-12' %}*/
/* 					{% endif %}*/
/* 				{% else %}*/
/* 					{% set class_left = 'col-sm-12' %}*/
/* 				{% endif %}*/
/* */
/* 				<div class="content-product-content {{ class_left }}">*/
/* 					<div class="content-product-midde clearfix">*/
/* 						{# ========== TAB BLOCK ============ #}*/
/* 						{% set related_position = soconfig.get_settings('tabs_position') == 1 ? 'vertical-tabs' : '' %}*/
/* 						{% set tabs_position    = soconfig.get_settings('tabs_position') %}*/
/* 						{% set showmore            = soconfig.get_settings('product_enableshowmore') %}*/
/* 						{% if showmore %} {% set class_showmore = 'showdown' %}*/
/* 						{% else %} {% set class_showmore = 'showup' %}*/
/* 						{% endif %}*/
/* */
/* 						<div class="producttab ">*/
/* 							<div class="tabsslider {{ related_position }} {% if tabs_position == 1 %} {{ 'vertical-tabs' }} {% else %} {{ 'horizontal-tabs' }} {% endif %} col-xs-12">*/
/* 								{# ========= Tabs - Bottom horizontal ========= #}*/
/* 								{% if tabs_position == 2 %}*/
/* 									<ul class="nav nav-tabs font-sn">*/
/* 										<li class="active"><a data-toggle="tab"*/
/* 										                      href="#tab-description">Описание</a></li>*/
/* 										<li><a href="#tab-customhtml" data-toggle="tab">Файлове</a></li>*/
/* 										<li><a href="#tab-contentshipping" data-toggle="tab">Доставка</a></li>*/
/* */
/* 										{% if product_video %}*/
/* 											<li><a class="thumb-video" href="{{ product_video }}"><i*/
/* 															class="fa fa-youtube-play fa-lg"></i> {{ tab_video }}</a>*/
/* 											</li>*/
/* 										{% endif %}*/
/* */
/* 										{% if soconfig.get_settings('product_enablesizechart') %}*/
/* 											<li><a href="#tab-sizechart" data-toggle="tab">{{ text_size_chart }}</a>*/
/* 											</li>*/
/* 										{% endif %}*/
/* */
/* */
/* 									</ul>*/
/* */
/* 									{# ========= Tabs - Left vertical ========= #}*/
/* 								{% elseif tabs_position == 1 %}*/
/* 									<ul class="nav nav-tabs col-lg-3 col-sm-4">*/
/* 										<li class="active"><a data-toggle="tab"*/
/* 										                      href="#tab-description">Характеристики</a></li>*/
/* 										<li><a href="#tab-contentshipping" data-toggle="tab">Файлове</a></li>*/
/* 										<li><a href="#tab-customhtml" data-toggle="tab">Доставка</a></li>*/
/* */
/* 										{% if product_tabtitle %}*/
/* 											<li><a href="#tab-customhtml" data-toggle="tab">{{ product_tabtitle }}</a>*/
/* 											</li>*/
/* 										{% endif %}*/
/* */
/* 										{% if product_video %}*/
/* 											<li><a class="thumb-video" href="{{ product_video }}"><i*/
/* 															class="fa fa-youtube-play fa-lg"></i> {{ tab_video }}</a>*/
/* 											</li>*/
/* 										{% endif %}*/
/* */
/* 										{% if soconfig.get_settings('product_enablesizechart') %}*/
/* 											<li><a href="#tab-sizechart" data-toggle="tab">{{ text_size_chart }}</a>*/
/* 											</li>*/
/* 										{% endif %}*/
/* */
/* 									</ul>*/
/* 								{% endif %}*/
/* */
/* 								<div class="tab-content {% if tabs_position == 1 %} {{ 'col-lg-9 col-sm-8' }} {% endif %} col-xs-12">*/
/* 									<h2 class="tab-pane active" id="tab-description">*/
/* */
/* 										{% if attribute_groups %}*/
/* 											<h3 class="product-property-title"> {{ text_product_specifics }}</h3>*/
/* 											<ul class="product-property-list util-clearfix">*/
/* 												{% for attribute_group in attribute_groups %}*/
/* */
/* */
/* 													{% for attribute in attribute_group.attribute %}*/
/* 														<li class="property-item">*/
/* 															<span class="propery-title">{{ attribute.name }}</span>*/
/* 															<span class="propery-des">{{ attribute.text }}</span>*/
/* 														</li>*/
/* 													{% endfor %}*/
/* */
/* 												{% endfor %}*/
/* 											</ul>*/
/* 										{% endif %}*/
/* */
/* 										<div id="collapse-description" class="desc-collapse {{ class_showmore }}">*/
/* 											{{ description }}*/
/* 										</div>*/
/* */
/* 										{% if showmore %}*/
/* 											<div class="button-toggle">*/
/* 												<a class="showmore" data-toggle="collapse" href="#"*/
/* 												   aria-expanded="false" aria-controls="collapse-footer">*/
/*                                                     <span class="toggle-more">покажи <i*/
/* 			                                                    class="fa fa-angle-down"></i></span>*/
/* 													<span class="toggle-less">скрий <i*/
/* 																class="fa fa-angle-up"></i></span>*/
/* 												</a>*/
/* 											</div>*/
/* 										{% endif %}*/
/* 									</h2>*/
/* */
/* */
/* 									{% if review_status %}*/
/* 										<div class="tab-pane" id="tab-review">*/
/* 											<form class="form-horizontal" id="form-review">*/
/* 												<div id="review"></div>*/
/* 												<h3>{{ text_write }}</h3>*/
/* 												{% if review_guest %}*/
/* 													<div class="form-group required">*/
/* 														<div class="col-sm-12">*/
/* 															<label class="control-label"*/
/* 															       for="input-name">{{ entry_name }}</label>*/
/* 															<input type="text" name="name" value="{{ customer_name }}"*/
/* 															       id="input-name" class="form-control"/>*/
/* 														</div>*/
/* 													</div>*/
/* 													<div class="form-group required">*/
/* 														<div class="col-sm-12">*/
/* 															<label class="control-label"*/
/* 															       for="input-review">{{ entry_review }}</label>*/
/* 															<textarea name="text" rows="5" id="input-review"*/
/* 															          class="form-control"></textarea>*/
/* 															<div class="help-block">{{ text_note }}</div>*/
/* 														</div>*/
/* 													</div>*/
/* 													<div class="form-group required">*/
/* 														<div class="col-sm-12">*/
/* 															<label class="control-label">{{ entry_rating }}</label>*/
/* 															&nbsp;&nbsp;&nbsp; {{ entry_bad }}&nbsp;*/
/* 															<input type="radio" name="rating" value="1"/>*/
/* 															&nbsp;*/
/* 															<input type="radio" name="rating" value="2"/>*/
/* 															&nbsp;*/
/* 															<input type="radio" name="rating" value="3"/>*/
/* 															&nbsp;*/
/* 															<input type="radio" name="rating" value="4"/>*/
/* 															&nbsp;*/
/* 															<input type="radio" name="rating" value="5"/>*/
/* 															&nbsp;{{ entry_good }}</div>*/
/* 													</div>*/
/* 													{{ captcha }}*/
/* */
/* 													<div class="pull-right">*/
/* 														<button type="button" id="button-review"*/
/* 														        data-loading-text="{{ text_loading }}"*/
/* 														        class="btn btn-primary">{{ button_continue }}</button>*/
/* 													</div>*/
/* */
/* 												{% else %}*/
/* 													{{ text_login }}*/
/* 												{% endif %}*/
/* 											</form>*/
/* 										</div>*/
/* 									{% endif %}*/
/* */
/* 									<h3 class="tab-pane" id="tab-customhtml">*/
/* 										{% if specif %}*/
/* 											<a href="{{ specif }}" target="_blank">Техническа спесификация PDF</a>*/
/* 										{% endif %}*/
/* 									</h3>*/
/* */
/* 									{% if soconfig.get_settings('product_enableshipping') and soconfig.get_settings('product_contentshipping') %}*/
/* 										<h3 class="tab-pane" id="tab-contentshipping">*/
/* 											{{ soconfig.decode_entities( soconfig.get_settings('product_contentshipping') ) }}*/
/* 										</h3>*/
/* 									{% endif %}*/
/* */
/* */
/* 									{% if soconfig.get_settings('product_enablesizechart') %}*/
/* 										<div class="tab-pane " id="tab-sizechart">*/
/* 											<img src="image/{{ soconfig.get_settings('img_sizechart') }}"*/
/* 											     alt="Size Chart">*/
/* 										</div>*/
/* 									{% endif %}*/
/* 								</div>*/
/* 							</div>*/
/* 						</div>*/
/* 					</div>*/
/* */
/* 					{# ====  Related_Product==== #}*/
/* 					{% if products and soconfig.get_settings('related_status') %}*/
/* 						<div class="content-product-bottom clearfix">*/
/* 							<ul class="nav nav-tabs">*/
/* 								<li class="active"><a data-toggle="tab"*/
/* 								                      href="#product-related">{{ related_module_name }}</a></li>*/
/* 							</ul>*/
/* 							<div class="tab-content">*/
/* 								<div id="product-related" class="tab-pane fade in active">*/
/* 									{% include theme_directory~'/template/soconfig/related_product.twig' %}*/
/* 								</div>*/
/* 								<div id="product-upsell" class="tab-pane fade">*/
/* 									{# ====  content_bottom==== #}*/
/* 									{{ content_bottom }}*/
/* 								</div>*/
/* 							</div>*/
/* 							<div>*/
/* 								<button id="show_more_related_button" onClick="showRelated();"*/
/* 								        class="btn btn-default btn-block">Виж повече*/
/* 								</button>*/
/* 							</div>*/
/* 						</div>*/
/* 					{% endif %}*/
/* */
/* */
/* 				</div>*/
/* 				{# ====  Column Right inside==== #}*/
/* 				{% if col_position== 'inside' %} {{ column_right }} {% endif %}*/
/* */
/* 			</div>*/
/* */
/* */
/* 		</div>*/
/* 		{# ====  Column Right outside==== #}*/
/* 		{% if col_position== 'outside' %} {{ column_right }} {% endif %}*/
/* 	</div>*/
/* </div>*/
/* */
/* <script type="text/javascript">*/
/*     <!--*/
/*     $('select[name=\'recurring_id\'], input[name="quantity"]').change(function () {*/
/*         $.ajax({*/
/*             url: 'index.php?route=product/product/getRecurringDescription',*/
/*             type: 'post',*/
/*             data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),*/
/*             dataType: 'json',*/
/*             beforeSend: function () {*/
/*                 $('#recurring-description').html('');*/
/*             },*/
/*             success: function (json) {*/
/*                 $('.alert-dismissible, .text-danger').remove();*/
/* */
/*                 if (json['success']) {*/
/*                     $('#recurring-description').html(json['success']);*/
/*                 }*/
/*             }*/
/*         });*/
/*     });*/
/*     --></script>*/
/* */
/* <script type="text/javascript"><!--*/
/*     $('#button-cart').on('click', function () {*/
/* */
/*         $.ajax({*/
/*             url: 'index.php?route=extension/soconfig/cart/add',*/
/*             type: 'post',*/
/*             data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),*/
/*             dataType: 'json',*/
/*             beforeSend: function () {*/
/*                 $('#button-cart').button('loading');*/
/*             },*/
/*             complete: function () {*/
/*                 $('#button-cart').button('reset');*/
/*             },*/
/*             success: function (json) {*/
/*                 $('.alert').remove();*/
/*                 $('.text-danger').remove();*/
/*                 $('.form-group').removeClass('has-error');*/
/*                 if (json['error']) {*/
/*                     if (json['error']['option']) {*/
/*                         for (i in json['error']['option']) {*/
/*                             var element = $('#input-option' + i.replace('_', '-'));*/
/* */
/* 							{% if option_data %}*/
/*                             if (ProductOptionId != undefined && ProductOptionId == i.replace('_', '-')) {*/
/*                                 $('.so-colorswatch-productpage-icons').after('<div class="text-danger">' + json['error']['option'][i] + '</div>');*/
/*                             }*/
/* 							{% endif %}*/
/* */
/* */
/*                             if (element.parent().hasClass('input-group')) {*/
/*                                 element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');*/
/*                             } else {*/
/*                                 element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');*/
/*                             }*/
/*                         }*/
/*                     }*/
/* */
/*                     if (json['error']['recurring']) {*/
/*                         $('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');*/
/*                     }*/
/* */
/*                     // Highlight any found errors*/
/*                     $('.text-danger').parent().addClass('has-error');*/
/*                 }*/
/* */
/*                 if (json['success']) {*/
/*                     $('.text-danger').remove();*/
/* */
/*                     $('#cart  .total-shopping-cart ').html(json['total']);*/
/*                     $('#cart > ul').load('index.php?route=common/cart/info ul li');*/
/* */
/* */
/*                     $('.so-groups-sticky .popup-mycart .popup-content').load('index.php?route=extension/module/so_tools/info .popup-content .cart-header');*/
/*                 }*/
/* */
/* */
/*             },*/
/*             error: function (xhr, ajaxOptions, thrownError) {*/
/*                 alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/*             }*/
/*         });*/
/*     });*/
/*     $('#button-checkout').on('click', function () {*/
/*         $.ajax({*/
/*             url: 'index.php?route=checkout/cart/add',*/
/*             type: 'post',*/
/*             data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),*/
/*             dataType: 'json',*/
/*             beforeSend: function () {*/
/*                 $('#button-checkout').button('loading');*/
/*             },*/
/*             complete: function () {*/
/*                 $('#button-checkout').button('reset');*/
/*             },*/
/*             success: function (json) {*/
/*                 $('.alert').remove();*/
/*                 $('.text-danger').remove();*/
/*                 $('.form-group').removeClass('has-error');*/
/* */
/*                 if (json['error']) {*/
/*                     if (json['error']['option']) {*/
/*                         for (i in json['error']['option']) {*/
/*                             var element = $('#input-option' + i.replace('_', '-'));*/
/* */
/* 							{% if option_data %}*/
/*                             if (ProductOptionId != undefined && ProductOptionId == i.replace('_', '-')) {*/
/*                                 $('.so-colorswatch-productpage-icons').after('<div class="text-danger">' + json['error']['option'][i] + '</div>');*/
/*                             }*/
/* 							{% endif %}*/
/* */
/* */
/* 							{% if option_data %}*/
/*                             if (ProductOptionId != undefined && ProductOptionId == i.replace('_', '-')) {*/
/*                                 $('.so-colorswatch-productpage-icons').after('<div class="text-danger">' + json['error']['option'][i] + '</div>');*/
/*                             }*/
/* 							{% endif %}*/
/* */
/* */
/*                             if (element.parent().hasClass('input-group')) {*/
/*                                 element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');*/
/*                             } else {*/
/*                                 element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');*/
/*                             }*/
/*                         }*/
/*                     }*/
/* */
/*                     if (json['error']['recurring']) {*/
/*                         $('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');*/
/*                     }*/
/* */
/*                     // Highlight any found errors*/
/*                     $('.text-danger').parent().addClass('has-error');*/
/*                 }*/
/* */
/*                 if (json['success']) {*/
/*                     $('.text-danger').remove();*/
/*                     $('#cart  .total-shopping-cart ').html(json['total']);*/
/*                     window.location.href = "index.php?route=checkout/checkout";*/
/*                 }*/
/*             },*/
/*             error: function (xhr, ajaxOptions, thrownError) {*/
/*                 alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/*             }*/
/*         });*/
/*     });*/
/*     --></script>*/
/* */
/* <script type="text/javascript"><!--*/
/*     $('.date').datetimepicker({*/
/*         language: document.cookie.match(new RegExp('language=([^;]+)'))[1],*/
/*         pickTime: false*/
/*     });*/
/* */
/*     $('.datetime').datetimepicker({*/
/*         language: document.cookie.match(new RegExp('language=([^;]+)'))[1],*/
/*         pickDate: true,*/
/*         pickTime: true*/
/*     });*/
/* */
/*     $('.time').datetimepicker({*/
/*         language: document.cookie.match(new RegExp('language=([^;]+)'))[1],*/
/*         pickDate: false*/
/*     });*/
/* */
/*     $('button[id^=\'button-upload\']').on('click', function () {*/
/*         var node = this;*/
/* */
/*         $('#form-upload').remove();*/
/* */
/*         $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');*/
/* */
/*         $('#form-upload input[name=\'file\']').trigger('click');*/
/* */
/*         if (typeof timer != 'undefined') {*/
/*             clearInterval(timer);*/
/*         }*/
/* */
/*         timer = setInterval(function () {*/
/*             if ($('#form-upload input[name=\'file\']').val() != '') {*/
/*                 clearInterval(timer);*/
/* */
/*                 $.ajax({*/
/*                     url: 'index.php?route=tool/upload',*/
/*                     type: 'post',*/
/*                     dataType: 'json',*/
/*                     data: new FormData($('#form-upload')[0]),*/
/*                     cache: false,*/
/*                     contentType: false,*/
/*                     processData: false,*/
/*                     beforeSend: function () {*/
/*                         $(node).button('loading');*/
/*                     },*/
/*                     complete: function () {*/
/*                         $(node).button('reset');*/
/*                     },*/
/*                     success: function (json) {*/
/*                         $('.text-danger').remove();*/
/* */
/*                         if (json['error']) {*/
/*                             $(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');*/
/*                         }*/
/* */
/*                         if (json['success']) {*/
/*                             alert(json['success']);*/
/* */
/*                             $(node).parent().find('input').val(json['code']);*/
/*                         }*/
/*                     },*/
/*                     error: function (xhr, ajaxOptions, thrownError) {*/
/*                         alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/*                     }*/
/*                 });*/
/*             }*/
/*         }, 500);*/
/*     });*/
/*     //--></script>*/
/* <script type="text/javascript"><!--*/
/*     $('#review').delegate('.pagination a', 'click', function (e) {*/
/*         e.preventDefault();*/
/* */
/*         $('#review').fadeOut('slow');*/
/*         $('#review').load(this.href);*/
/*         $('#review').fadeIn('slow');*/
/*     });*/
/* */
/*     $('#review').load('index.php?route=product/product/review&product_id={{ product_id }}');*/
/* */
/*     $('#button-review').on('click', function () {*/
/*         $.ajax({*/
/*             url: 'index.php?route=product/product/write&product_id={{ product_id }}',*/
/*             type: 'post',*/
/*             dataType: 'json',*/
/*             data: $("#form-review").serialize(),*/
/*             beforeSend: function () {*/
/*                 $('#button-review').button('loading');*/
/*             },*/
/*             complete: function () {*/
/*                 $('#button-review').button('reset');*/
/*             },*/
/*             success: function (json) {*/
/*                 $('.alert-dismissible').remove();*/
/* */
/*                 if (json['error']) {*/
/*                     $('#review').after('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');*/
/*                 }*/
/* */
/*                 if (json['success']) {*/
/*                     $('#review').after('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');*/
/* */
/*                     $('input[name=\'name\']').val('');*/
/*                     $('textarea[name=\'text\']').val('');*/
/*                     $('input[name=\'rating\']:checked').prop('checked', false);*/
/*                 }*/
/*             }*/
/*         });*/
/*     });*/
/* */
/*     //--></script>*/
/* */
/* */
/* <script type="text/javascript"><!--*/
/*     $(document).ready(function () {*/
/* */
/*         // Initialize the sticky scrolling on an item*/
/*         sidebar_sticky = '{{ sidebar_sticky }}';*/
/* */
/*         if (sidebar_sticky == 'left') {*/
/*             $(".left_column").stick_in_parent({*/
/*                 offset_top: 10,*/
/*                 bottoming: true*/
/*             });*/
/*         } else if (sidebar_sticky == 'right') {*/
/*             $(".right_column").stick_in_parent({*/
/*                 offset_top: 10,*/
/*                 bottoming: true*/
/*             });*/
/*         } else if (sidebar_sticky == 'all') {*/
/*             $(".content-aside").stick_in_parent({*/
/*                 offset_top: 10,*/
/*                 bottoming: true*/
/*             });*/
/*         }*/
/* */
/* */
/*         $("#thumb-slider .image-additional--default").each(function () {*/
/*             $(this).find("[data-index='0']").addClass('active');*/
/*         });*/
/* */
/*         $('.product-options li.radio').click(function () {*/
/*             $(this).addClass(function () {*/
/*                 if ($(this).hasClass("active")) return "";*/
/*                 return "active";*/
/*             });*/
/* */
/*             $(this).siblings("li").removeClass("active");*/
/*             $(this).parent().find('.selected-option').html('<span class="label label-success">' + $(this).find('img').data('original-title') + '</span>');*/
/*         })*/
/* */
/*         $('.thumb-video').magnificPopup({*/
/*             type: 'iframe',*/
/*             iframe: {*/
/*                 patterns: {*/
/*                     youtube: {*/
/*                         index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).*/
/*                         id: 'v=', // String that splits URL in a two parts, second part should be %id%*/
/*                         src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.*/
/*                     },*/
/*                 }*/
/*             }*/
/*         });*/
/*     });*/
/*     //--></script>*/
/* */
/* */
/* <script type="text/javascript">*/
/*     var ajax_price = function () {*/
/*         $.ajax({*/
/*             type: 'POST',*/
/*             url: 'index.php?route=extension/soconfig/liveprice/index',*/
/*             data: $('.product-detail input[type=\'text\'], .product-detail input[type=\'hidden\'], .product-detail input[type=\'radio\']:checked, .product-detail input[type=\'checkbox\']:checked, .product-detail select, .product-detail textarea'),*/
/*             dataType: 'json',*/
/*             success: function (json) {*/
/*                 if (json.success) {*/
/*                     change_price('#price-special', json.new_price.special);*/
/*                     change_price('#price-tax', json.new_price.tax);*/
/*                     change_price('#price-old', json.new_price.price);*/
/*                 }*/
/*             }*/
/*         });*/
/*     }*/
/* */
/*     var change_price = function (id, new_price) {*/
/*         $(id).html(new_price);*/
/*     }*/
/*     $('.product-detail input[type=\'text\'], .product-detail input[type=\'hidden\'], .product-detail input[type=\'radio\'], .product-detail input[type=\'checkbox\'], .product-detail select, .product-detail textarea, .product-detail input[name=\'quantity\']').on('change', function () {*/
/*         ajax_price();*/
/*     });*/
/* </script>*/
/* <script type="text/javascript">*/
/*     function showRelated() {*/
/*         document.getElementById('product-related').getElementsByClassName('owl2-stage')[0].style.width = '110%';*/
/*         document.getElementById('show_more_related_button').style.display = 'none';*/
/*     }*/
/* </script>*/
/* {{ footer }}*/
/* */
