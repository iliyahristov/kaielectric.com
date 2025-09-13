<?php

/* so-revo/template/extension/module/so_megamenu/default.twig */
class __TwigTemplate_c6f0a36f8ceaaa96823a4b70cfe49a5eceebbdd7c0173532e9e667a57328d8dc extends Twig_Template
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
        echo "<div class=\"responsive megamenu-style-dev\">
\t";
        // line 2
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            // line 3
            echo "\t<div class=\"so-vertical-menu no-gutter\">
\t";
        }
        // line 5
        echo "\t
\t";
        // line 6
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "disp_title_module", array()) && (isset($context["head_name"]) ? $context["head_name"] : null))) {
            // line 7
            echo "\t\t<h3>";
            echo (isset($context["head_name"]) ? $context["head_name"] : null);
            echo "</h3>
\t";
        }
        // line 9
        echo "\t<nav class=\"navbar-default\">
\t\t<div class=\" container-megamenu ";
        // line 10
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "full_width", array()) != 1)) {
            echo " ";
            echo "container";
            echo " ";
        }
        echo " ";
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            echo " ";
            echo "vertical ";
            echo " ";
        } else {
            echo " ";
            echo "horizontal";
            echo " ";
        }
        echo "\">
\t\t";
        // line 11
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            // line 12
            echo "\t\t\t<div id=\"menuHeading\">
\t\t\t\t<div class=\"megamenuToogle-wrapper\">
\t\t\t\t\t<div class=\"megamenuToogle-pattern\">
\t\t\t\t\t\t<div class=\"container\">
\t\t\t\t\t\t\t<div><span></span><span></span><span></span></div>
\t\t\t\t\t\t\t<span class=\"title-mega\">
\t\t\t\t\t\t\t";
            // line 18
            echo (isset($context["navigation_text"]) ? $context["navigation_text"] : null);
            echo "
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"navbar-header\">
\t\t\t\t<button type=\"button\" id=\"show-verticalmenu\" data-toggle=\"collapse\"  class=\"navbar-toggle\">
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"menu-text\">Меню</span>
\t\t\t\t</button>
\t\t\t</div>
\t\t";
        } else {
            // line 33
            echo "\t\t\t<div class=\"navbar-header\">
\t\t\t\t<button type=\"button\" id=\"show-megamenu\" data-toggle=\"collapse\"  class=\"navbar-toggle\">
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"menu-text\">Меню</span>
\t\t\t\t</button>
\t\t\t</div>
\t\t";
        }
        // line 42
        echo "
\t\t";
        // line 43
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            // line 44
            echo "\t\t\t<div class=\"vertical-wrapper\">
\t\t";
        } else {
            // line 46
            echo "\t\t\t<div class=\"megamenu-wrapper\">
\t\t";
        }
        // line 48
        echo "
\t\t";
        // line 49
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            // line 50
            echo "\t\t\t<span id=\"remove-verticalmenu\" class=\"fa fa-times\"></span>
\t\t";
        } else {
            // line 52
            echo "\t\t\t<span id=\"remove-megamenu\" class=\"fa fa-times\"></span>
\t\t";
        }
        // line 54
        echo "
\t\t\t<div class=\"megamenu-pattern\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<ul class=\"megamenu\"
\t\t\t\t\tdata-transition=\"";
        // line 58
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "animation", array()) != "")) {
            echo $this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "animation", array());
        } else {
            echo "none";
        }
        echo "\" data-animationtime=\"";
        if ((($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "animation_time", array()) > 0) && ($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "animation_time", array()) < 5000))) {
            echo $this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "animation_time", array());
        } else {
            echo 500;
        }
        echo "\">
\t\t\t\t\t\t";
        // line 59
        if ((($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "home_item", array()) == "icon") || ($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "home_item", array()) == "text"))) {
            // line 60
            echo "\t\t\t\t\t\t\t<li class=\"home\">
\t\t\t\t\t\t\t\t<a href=\"";
            // line 61
            echo (isset($context["home"]) ? $context["home"] : null);
            echo "\">
\t\t\t\t\t\t\t\t";
            // line 62
            if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "home_item", array()) == "icon")) {
                // line 63
                echo "\t\t\t\t\t\t\t\t\t<i class=\"fa fa-home\"></i>
\t\t\t\t\t\t\t\t";
            } else {
                // line 65
                echo "\t\t\t\t\t\t\t\t\t<span><strong>";
                echo (isset($context["home_text"]) ? $context["home_text"] : null);
                echo "</strong></span>
\t\t\t\t\t\t\t\t";
            }
            // line 67
            echo "\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        // line 70
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 71
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["row"]) {
            // line 72
            echo "\t\t\t\t\t\t\t";
            $context["class"] = "";
            // line 73
            echo "\t\t\t\t\t\t\t";
            $context["icon_font"] = "";
            // line 74
            echo "\t\t\t\t\t\t\t";
            $context["class_link"] = "clearfix";
            // line 75
            echo "\t\t\t\t\t\t\t";
            $context["label_item"] = "";
            // line 76
            echo "\t\t\t\t\t\t\t";
            $context["title"] = false;
            // line 77
            echo "\t\t\t\t\t\t\t";
            $context["target"] = false;
            // line 78
            echo "
\t\t\t\t\t\t\t";
            // line 79
            if (twig_in_filter("no_image", $this->getAttribute($context["row"], "icon", array()))) {
                // line 80
                echo "\t\t\t\t\t\t\t\t";
                $context["icon"] = "";
                // line 81
                echo "\t\t\t\t\t\t\t";
            } else {
                // line 82
                echo "\t\t\t\t\t\t\t\t";
                $context["icon"] = $this->getAttribute($context["row"], "icon", array());
                // line 83
                echo "\t\t\t\t\t\t\t";
            }
            // line 84
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            // line 85
            if (($this->getAttribute($context["row"], "description", array()) != "")) {
                // line 86
                echo "\t\t\t\t\t\t\t\t";
                $context["class_link"] = ((isset($context["class_link"]) ? $context["class_link"] : null) . " description");
                // line 87
                echo "\t\t\t\t\t\t\t";
            }
            // line 88
            echo "
\t\t\t\t\t\t\t";
            // line 89
            if (((((isset($context["route"]) ? $context["route"] : null) && ((isset($context["route"]) ? $context["route"] : null) == $this->getAttribute($context["row"], "route", array()))) && (isset($context["path"]) ? $context["path"] : null)) && ((isset($context["path"]) ? $context["path"] : null) == $this->getAttribute($context["row"], "path", array())))) {
                // line 90
                echo "\t\t\t\t\t\t\t\t";
                $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " active_menu");
                // line 91
                echo "\t\t\t\t\t\t\t";
            }
            // line 92
            echo "
\t\t\t\t\t\t\t";
            // line 93
            if ($this->getAttribute($context["row"], "class_menu", array())) {
                // line 94
                echo "\t\t\t\t\t\t\t\t";
                $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . $this->getAttribute($context["row"], "class_menu", array()));
                // line 95
                echo "\t\t\t\t\t\t\t";
            }
            // line 96
            echo "
\t\t\t\t\t\t\t";
            // line 97
            if ($this->getAttribute($context["row"], "icon_font", array())) {
                // line 98
                echo "\t\t\t\t\t\t\t\t";
                $context["icon_font"] = ((((isset($context["icon_font"]) ? $context["icon_font"] : null) . "<i class=\"") . $this->getAttribute($context["row"], "icon_font", array())) . "\"></i>");
                // line 99
                echo "\t\t\t\t\t\t\t";
            }
            // line 100
            echo "
\t\t\t\t\t\t\t";
            // line 101
            if ($this->getAttribute($context["row"], "label_item", array())) {
                // line 102
                echo "\t\t\t\t\t\t\t\t";
                $context["label_item"] = ((((isset($context["label_item"]) ? $context["label_item"] : null) . "<span class=\"label") . $this->getAttribute($context["row"], "label_item", array())) . "\"></span>");
                // line 103
                echo "\t\t\t\t\t\t\t";
            }
            // line 104
            echo "
\t\t\t\t\t\t\t";
            // line 105
            if ((twig_test_iterable($this->getAttribute($context["row"], "submenu", array())) && $this->getAttribute($context["row"], "submenu", array()))) {
                // line 106
                echo "\t\t\t\t\t\t\t\t";
                $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " with-sub-menu");
                // line 107
                echo "\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["row"], "submenu_type", array()) == 1)) {
                    // line 108
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " click");
                    // line 109
                    echo "\t\t\t\t\t\t\t\t";
                } else {
                    // line 110
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " hover");
                    // line 111
                    echo "\t\t\t\t\t\t\t\t";
                }
                // line 112
                echo "\t\t\t\t\t\t\t";
            }
            // line 113
            echo "
\t\t\t\t\t\t\t";
            // line 114
            if (($this->getAttribute($context["row"], "position", array()) == 1)) {
                // line 115
                echo "\t\t\t\t\t\t\t\t";
                $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " pull-right");
                // line 116
                echo "\t\t\t\t\t\t\t";
            }
            // line 117
            echo "
\t\t\t\t\t\t\t";
            // line 118
            if (($this->getAttribute($context["row"], "submenu_type", array()) == 2)) {
                // line 119
                echo "\t\t\t\t\t\t\t\t";
                $context["title"] = "title=\"hover-intent\"";
                // line 120
                echo "\t\t\t\t\t\t\t";
            }
            // line 121
            echo "
\t\t\t\t\t\t\t";
            // line 122
            if (($this->getAttribute($context["row"], "new_window", array()) == 1)) {
                // line 123
                echo "\t\t\t\t\t\t\t\t";
                $context["target"] = "target=\"_blank\"";
                // line 124
                echo "\t\t\t\t\t\t\t";
            }
            // line 125
            echo "
\t\t\t\t\t\t\t";
            // line 126
            if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
                // line 127
                echo "\t\t\t\t\t\t\t\t<li class=\"item-vertical ";
                echo (isset($context["class"]) ? $context["class"] : null);
                echo "\" ";
                echo (isset($context["title"]) ? $context["title"] : null);
                echo ">
\t\t\t\t\t\t\t\t\t<p class='close-menu'></p>
\t\t\t\t\t\t\t\t\t";
                // line 129
                if ((twig_test_iterable($this->getAttribute($context["row"], "submenu", array())) && $this->getAttribute($context["row"], "submenu", array()))) {
                    // line 130
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["row"], "link", array());
                    echo "\" class=\"";
                    echo (isset($context["class_link"]) ? $context["class_link"] : null);
                    echo "\" ";
                    echo (isset($context["target"]) ? $context["target"] : null);
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                    // line 132
                    echo ((((isset($context["icon_font"]) ? $context["icon_font"] : null) . (isset($context["icon"]) ? $context["icon"] : null)) . $this->getAttribute($this->getAttribute($context["row"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array")) . $this->getAttribute($context["row"], "description", array()));
                    echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 134
                    echo (isset($context["label_item"]) ? $context["label_item"] : null);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t<b class='fa fa-angle-right' ></b>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 138
                    echo "\t\t\t\t\t\t\t\t \t\t<a href=\"";
                    echo $this->getAttribute($context["row"], "link", array());
                    echo "\" class=\"";
                    echo (isset($context["class_link"]) ? $context["class_link"] : null);
                    echo "\" ";
                    echo (isset($context["target"]) ? $context["target"] : null);
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                    // line 140
                    echo ((((isset($context["icon_font"]) ? $context["icon_font"] : null) . (isset($context["icon"]) ? $context["icon"] : null)) . $this->getAttribute($this->getAttribute($context["row"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array")) . $this->getAttribute($context["row"], "description", array()));
                    echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 142
                    echo (isset($context["label_item"]) ? $context["label_item"] : null);
                    echo "
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 145
                echo "
\t\t\t\t\t\t\t\t\t";
                // line 146
                if ((twig_test_iterable($this->getAttribute($context["row"], "submenu", array())) && $this->getAttribute($context["row"], "submenu", array()))) {
                    // line 147
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    if (twig_in_filter("%", $this->getAttribute($context["row"], "submenu_width", array()))) {
                        // line 148
                        echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"sub-menu\" data-subwidth =\"";
                        echo twig_replace_filter($this->getAttribute($context["row"], "submenu_width", array()), array("%" => ""));
                        echo "\">
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 150
                        echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"sub-menu\" style=\"width:";
                        echo $this->getAttribute($context["row"], "submenu_width", array());
                        echo "\">
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 152
                    echo "
\t\t\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 155
                    $context["row_fluid"] = 0;
                    // line 156
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["row"], "submenu", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["submenu"]) {
                        // line 157
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ((((isset($context["row_fluid"]) ? $context["row_fluid"] : null) + $this->getAttribute($context["submenu"], "content_width", array())) > 12)) {
                            // line 158
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["row_fluid"] = $this->getAttribute($context["submenu"], "content_width", array());
                            // line 159
                            echo "\t\t\t\t\t\t\t\t\t\t \t\t\t\t</div><div class=\"border\"></div><div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 161
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["row_fluid"] = ((isset($context["row_fluid"]) ? $context["row_fluid"] : null) + $this->getAttribute($context["submenu"], "content_width", array()));
                            // line 162
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 163
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-";
                        echo $this->getAttribute($context["submenu"], "content_width", array());
                        echo "\">\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 164
                        if (($this->getAttribute($context["submenu"], "content_type", array()) == 0)) {
                            // line 165
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"html ";
                            echo $this->getAttribute($context["submenu"], "class_menu", array());
                            echo "\">";
                            echo $this->getAttribute($context["submenu"], "html", array());
                            echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 166
$context["submenu"], "content_type", array()) == 1)) {
                            // line 167
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_test_iterable($this->getAttribute($context["submenu"], "product", array()))) {
                                // line 168
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"product ";
                                echo $this->getAttribute($context["submenu"], "class_menu", array());
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"image\"><a href=\"";
                                // line 169
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "\" onclick=\"window.location = '";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "'\"><img src=\"";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "image", array());
                                echo "\" alt=\"\"></a></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"name\"><a href=\"";
                                // line 170
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "\" onclick=\"window.location = '";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "'\">";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "name", array());
                                echo "</a></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 172
                                if ( !$this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "special", array())) {
                                    // line 173
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "price", array());
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                } else {
                                    // line 175
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "special", array());
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 177
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 180
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["submenu"], "content_type", array()) == 2)) {
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"categories ";
                            // line 181
                            echo $this->getAttribute($context["submenu"], "class_menu", array());
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 182
                            echo $this->getAttribute($context["submenu"], "categories", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 184
$context["submenu"], "content_type", array()) == 3)) {
                            // line 185
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_test_iterable($this->getAttribute($context["submenu"], "manufactures", array()))) {
                                // line 186
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"manufacturer ";
                                echo $this->getAttribute($context["submenu"], "class_menu", array());
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 187
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["submenu"], "manufactures", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["manufacturer"]) {
                                    // line 188
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                                    echo $this->getAttribute($context["manufacturer"], "link", array());
                                    echo "\">";
                                    echo $this->getAttribute($context["manufacturer"], "name", array());
                                    echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturer'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 190
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 192
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["submenu"], "content_type", array()) == 4)) {
                            // line 193
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getAttribute($context["submenu"], "images", array()), "show_title", array()) == 1)) {
                                // line 194
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"title-submenu\">";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array");
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 196
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"link ";
                            echo $this->getAttribute($context["submenu"], "class_menu", array());
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 197
                            echo $this->getAttribute($this->getAttribute($context["submenu"], "images", array()), "link", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 199
$context["submenu"], "content_type", array()) == 5)) {
                            // line 200
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if ($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "categories", array())) {
                                // line 201
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"subcategory ";
                                echo $this->getAttribute($context["submenu"], "class_menu", array());
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 202
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "categories", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["categories"]) {
                                    // line 203
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 204
                                    if (($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "show_title", array()) == 1)) {
                                        // line 205
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                        echo $this->getAttribute($context["categories"], "href", array());
                                        echo "\" class=\"title-submenu ";
                                        echo $this->getAttribute($context["submenu"], "class_menu", array());
                                        echo "\">";
                                        echo $this->getAttribute($context["categories"], "name", array());
                                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 207
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if ($this->getAttribute($context["categories"], "categories", array())) {
                                        // line 208
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        echo $this->getAttribute($context["categories"], "categories", array());
                                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 210
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "show_image", array()) == 1)) {
                                        // line 211
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                                        echo $this->getAttribute($context["categories"], "thumb", array());
                                        echo "\" alt=\"\" >
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 213
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categories'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 215
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 217
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["submenu"], "content_type", array()) == 6)) {
                            // line 218
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "show_title", array()) == 1)) {
                                // line 219
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"title-submenu\">";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array");
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 221
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if ($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "products", array())) {
                                // line 222
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "products", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                                    // line 223
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    $context["itempage"] = (($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "col", array())) ? ((12 / $this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "col", array()))) : (4));
                                    // line 224
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-xs-";
                                    echo (isset($context["itempage"]) ? $context["itempage"] : null);
                                    echo " ";
                                    echo $this->getAttribute($context["submenu"], "class_menu", array());
                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"product-thumb\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                    // line 227
                                    echo $this->getAttribute($context["product"], "href", array());
                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                                    // line 228
                                    echo $this->getAttribute($context["product"], "thumb", array());
                                    echo "\" alt=\"";
                                    echo $this->getAttribute($context["product"], "name", array());
                                    echo "\" title=\"";
                                    echo $this->getAttribute($context["product"], "name", array());
                                    echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h4><a href=\"";
                                    // line 233
                                    echo $this->getAttribute($context["product"], "href", array());
                                    echo "\">";
                                    echo $this->getAttribute($context["product"], "name", array());
                                    echo "</a></h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>";
                                    // line 234
                                    echo $this->getAttribute($context["product"], "description", array());
                                    echo "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 235
                                    if ($this->getAttribute($context["product"], "rating", array())) {
                                        // line 236
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 237
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable(range(1, 5));
                                        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                            // line 238
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            if (($this->getAttribute($context["product"], "rating", array()) < $context["i"])) {
                                                // line 239
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } else {
                                                // line 241
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 243
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 244
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 246
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 247
                                    if ($this->getAttribute($context["product"], "price", array())) {
                                        // line 248
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 249
                                        if ( !$this->getAttribute($context["product"], "special", array())) {
                                            // line 250
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            echo $this->getAttribute($context["product"], "price", array());
                                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t\t";
                                        } else {
                                            // line 252
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-new\">";
                                            echo $this->getAttribute($context["product"], "special", array());
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                            // line 253
                                            echo $this->getAttribute($context["product"], "price", array());
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t\t";
                                        }
                                        // line 255
                                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t\t";
                                        // line 256
                                        if ($this->getAttribute($context["product"], "tax", array())) {
                                            // line 257
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                                            echo $this->getAttribute($context["product"], "tax", array());
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 259
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 261
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t \t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 266
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 267
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['submenu'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 270
                    echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t
\t\t\t\t\t\t\t\t\t";
                }
                // line 274
                echo "\t\t\t\t\t\t\t\t</li>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            } else {
                // line 275
                echo "\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<li class=\"";
                // line 276
                echo (isset($context["class"]) ? $context["class"] : null);
                echo "\" ";
                echo (isset($context["title"]) ? $context["title"] : null);
                echo ">
\t\t\t\t\t\t\t\t\t<p class='close-menu'></p>
\t\t\t\t\t\t\t\t\t";
                // line 278
                if ((twig_test_iterable($this->getAttribute($context["row"], "submenu", array())) && $this->getAttribute($context["row"], "submenu", array()))) {
                    // line 279
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["row"], "link", array());
                    echo "\" class=\"";
                    echo (isset($context["class_link"]) ? $context["class_link"] : null);
                    echo "\" ";
                    echo (isset($context["target"]) ? $context["target"] : null);
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<strong>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 281
                    echo ((((isset($context["icon_font"]) ? $context["icon_font"] : null) . (isset($context["icon"]) ? $context["icon"] : null)) . $this->getAttribute($this->getAttribute($context["row"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array")) . $this->getAttribute($context["row"], "description", array()));
                    echo "
\t\t\t\t\t\t\t\t\t\t\t</strong>
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 283
                    echo (isset($context["label_item"]) ? $context["label_item"] : null);
                    echo "\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 286
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["row"], "link", array());
                    echo "\" class=\"";
                    echo (isset($context["class_link"]) ? $context["class_link"] : null);
                    echo "\" ";
                    echo (isset($context["target"]) ? $context["target"] : null);
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t<strong>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 288
                    echo ((((isset($context["icon_font"]) ? $context["icon_font"] : null) . (isset($context["icon"]) ? $context["icon"] : null)) . $this->getAttribute($this->getAttribute($context["row"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array")) . $this->getAttribute($context["row"], "description", array()));
                    echo "
\t\t\t\t\t\t\t\t\t\t\t</strong>
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 290
                    echo (isset($context["label_item"]) ? $context["label_item"] : null);
                    echo "
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 293
                echo "
\t\t\t\t\t\t\t\t\t";
                // line 294
                if ((twig_test_iterable($this->getAttribute($context["row"], "submenu", array())) && $this->getAttribute($context["row"], "submenu", array()))) {
                    // line 295
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"sub-menu\" style=\"width: ";
                    echo $this->getAttribute($context["row"], "submenu_width", array());
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 298
                    $context["row_fluid"] = 0;
                    // line 299
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["row"], "submenu", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["submenu"]) {
                        // line 300
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ((((isset($context["row_fluid"]) ? $context["row_fluid"] : null) + $this->getAttribute($context["submenu"], "content_width", array())) > 12)) {
                            // line 301
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["row_fluid"] = $this->getAttribute($context["submenu"], "content_width", array());
                            // line 302
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div><div class=\"border\"></div><div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 304
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["row_fluid"] = ((isset($context["row_fluid"]) ? $context["row_fluid"] : null) + $this->getAttribute($context["submenu"], "content_width", array()));
                            // line 305
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 306
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-";
                        echo $this->getAttribute($context["submenu"], "content_width", array());
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 307
                        if (($this->getAttribute($context["submenu"], "content_type", array()) == 0)) {
                            // line 308
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"html ";
                            echo $this->getAttribute($context["submenu"], "class_menu", array());
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 309
                            echo $this->getAttribute($context["submenu"], "html", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 311
$context["submenu"], "content_type", array()) == 1)) {
                            // line 312
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_test_iterable($this->getAttribute($context["submenu"], "product", array()))) {
                                // line 313
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"product ";
                                echo $this->getAttribute($context["submenu"], "class_menu", array());
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"image\"><a href=\"";
                                // line 314
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "\" onclick=\"window.location = '";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "'\"><img src=\"";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "image", array());
                                echo "\" alt=\"\"></a></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"name\"><a href=\"";
                                // line 315
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "\" onclick=\"window.location = '";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "link", array());
                                echo "'\">";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "name", array());
                                echo "</a></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 317
                                if ( !$this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "special", array())) {
                                    // line 318
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "price", array());
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                } else {
                                    // line 320
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    echo $this->getAttribute($this->getAttribute($context["submenu"], "product", array()), "special", array());
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 322
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 325
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["submenu"], "content_type", array()) == 2)) {
                            // line 326
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"categories ";
                            echo $this->getAttribute($context["submenu"], "class_menu", array());
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"sub-menu-parent-category\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                            // line 328
                            echo ((((isset($context["icon_font"]) ? $context["icon_font"] : null) . (isset($context["icon"]) ? $context["icon"] : null)) . $this->getAttribute($this->getAttribute($context["row"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array")) . $this->getAttribute($context["row"], "description", array()));
                            echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 330
                            echo $this->getAttribute($context["submenu"], "categories", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 332
$context["submenu"], "content_type", array()) == 3)) {
                            // line 333
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (twig_test_iterable($this->getAttribute($context["submenu"], "manufactures", array()))) {
                                // line 334
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"manufacturer ";
                                echo $this->getAttribute($context["submenu"], "class_menu", array());
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 335
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["submenu"], "manufactures", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["manufacturer"]) {
                                    // line 336
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                                    echo $this->getAttribute($context["manufacturer"], "link", array());
                                    echo "\">";
                                    echo $this->getAttribute($context["manufacturer"], "name", array());
                                    echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturer'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 338
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 340
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["submenu"], "content_type", array()) == 4)) {
                            // line 341
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getAttribute($context["submenu"], "images", array()), "show_title", array()) == 1)) {
                                // line 342
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"title-submenu\">";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array");
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 344
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"link ";
                            echo $this->getAttribute($context["submenu"], "class_menu", array());
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 345
                            echo $this->getAttribute($this->getAttribute($context["submenu"], "images", array()), "link", array());
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 347
$context["submenu"], "content_type", array()) == 5)) {
                            // line 348
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if ($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "categories", array())) {
                                // line 349
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"subcategory ";
                                echo $this->getAttribute($context["submenu"], "class_menu", array());
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 350
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "categories", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["categories"]) {
                                    // line 351
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 352
                                    if (($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "show_title", array()) == 1)) {
                                        // line 353
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                        echo $this->getAttribute($context["categories"], "href", array());
                                        echo "\" class=\"title-submenu ";
                                        echo $this->getAttribute($context["submenu"], "class_menu", array());
                                        echo "\">";
                                        echo $this->getAttribute($context["categories"], "name", array());
                                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 355
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if ($this->getAttribute($context["categories"], "categories", array())) {
                                        // line 356
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        echo $this->getAttribute($context["categories"], "categories", array());
                                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 358
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (($this->getAttribute($this->getAttribute($context["submenu"], "subcategory", array()), "show_image", array()) == 1)) {
                                        // line 359
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                                        echo $this->getAttribute($context["categories"], "thumb", array());
                                        echo "\" alt=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 361
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</li>\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categories'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 363
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 365
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["submenu"], "content_type", array()) == 6)) {
                            // line 366
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "show_title", array()) == 1)) {
                                // line 367
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"title-submenu\">";
                                echo $this->getAttribute($this->getAttribute($context["submenu"], "name", array()), (isset($context["lang_id"]) ? $context["lang_id"] : null), array(), "array");
                                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 369
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if ($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "products", array())) {
                                // line 370
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "products", array()));
                                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                                    // line 371
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    $context["itempage"] = (($this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "col", array())) ? ((12 / $this->getAttribute($this->getAttribute($context["submenu"], "productlist", array()), "col", array()))) : (4));
                                    // line 372
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-";
                                    echo (isset($context["itempage"]) ? $context["itempage"] : null);
                                    echo " ";
                                    echo $this->getAttribute($context["submenu"], "class_menu", array());
                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"product-thumb\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                    // line 375
                                    echo $this->getAttribute($context["product"], "href", array());
                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                                    // line 376
                                    echo $this->getAttribute($context["product"], "thumb", array());
                                    echo "\" alt=\"";
                                    echo $this->getAttribute($context["product"], "name", array());
                                    echo "\" title=\"";
                                    echo $this->getAttribute($context["product"], "name", array());
                                    echo "\" class=\"img-responsive\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h4><a href=\"";
                                    // line 381
                                    echo $this->getAttribute($context["product"], "href", array());
                                    echo "\">";
                                    echo $this->getAttribute($context["product"], "name", array());
                                    echo "</a></h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>";
                                    // line 382
                                    echo $this->getAttribute($context["product"], "description", array());
                                    echo "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 383
                                    if ($this->getAttribute($context["product"], "rating", array())) {
                                        // line 384
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"rating\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 385
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable(range(1, 5));
                                        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                            // line 386
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            if (($this->getAttribute($context["product"], "rating", array()) < $context["i"])) {
                                                // line 387
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } else {
                                                // line 389
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 391
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 392
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 394
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 395
                                    if ($this->getAttribute($context["product"], "price", array())) {
                                        // line 396
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"price\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 397
                                        if ( !$this->getAttribute($context["product"], "special", array())) {
                                            // line 398
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            echo $this->getAttribute($context["product"], "price", array());
                                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t";
                                        } else {
                                            // line 400
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-new\">";
                                            echo $this->getAttribute($context["product"], "special", array());
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-old\">";
                                            // line 401
                                            echo $this->getAttribute($context["product"], "price", array());
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t";
                                        }
                                        // line 403
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   \t";
                                        // line 404
                                        if ($this->getAttribute($context["product"], "tax", array())) {
                                            // line 405
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"price-tax\">";
                                            echo $this->getAttribute($context["product"], "tax", array());
                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 407
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 409
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t  \t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t \t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 414
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 415
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 416
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['submenu'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 418
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                }
                // line 422
                echo "\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
            }
            // line 424
            echo "\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 425
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t</div>
\t</nav>
\t";
        // line 431
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            // line 432
            echo "\t\t</div>
\t";
        }
        // line 434
        echo "</div>

";
        // line 436
        if (($this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "orientation", array()) == 1)) {
            // line 437
            echo "<script type=\"text/javascript\">
\t\$(document).ready(function() {
\t\tvar itemver =  ";
            // line 439
            echo $this->getAttribute((isset($context["ustawienia"]) ? $context["ustawienia"] : null), "show_itemver", array());
            echo ";
\t\tif(itemver <= \$( \".vertical ul.megamenu >li\" ).length)
\t\t\t\$('.vertical ul.megamenu').append('<li class=\"loadmore\"><i class=\"fa fa-plus-square-o\"></i><span class=\"more-view\"> ";
            // line 441
            echo (isset($context["text_more_category"]) ? $context["text_more_category"] : null);
            echo "</span></li>');
\t\t\$('.horizontal ul.megamenu li.loadmore').remove();

\t\tvar show_itemver = itemver-1 ;
\t\t\$('ul.megamenu > li.item-vertical').each(function(i){
\t\t\tif(i>show_itemver){
\t\t\t\t\t\$(this).css('display', 'none');
\t\t\t}
\t\t});
\t\t\$(\".megamenu .loadmore\").click(function(){
\t\t\tif(\$(this).hasClass('open')){
\t\t\t\t\$('ul.megamenu li.item-vertical').each(function(i){
\t\t\t\t\tif(i>show_itemver){
\t\t\t\t\t\t\$(this).slideUp(200);
\t\t\t\t\t\t\$(this).css('display', 'none');
\t\t\t\t\t}
\t\t\t\t});
\t\t\t\t\$(this).removeClass('open');
\t\t\t\t\$('.loadmore').html('<i class=\"fa fa-plus\"></i><span class=\"more-view\">";
            // line 459
            echo (isset($context["text_more_category"]) ? $context["text_more_category"] : null);
            echo "</span>');
\t\t\t}else{
\t\t\t\t\$('ul.megamenu li.item-vertical').each(function(i){
\t\t\t\t\tif(i>show_itemver){
\t\t\t\t\t\t\$(this).slideDown(200);
\t\t\t\t\t}
\t\t\t\t});
\t\t\t\t\$(this).addClass('open');
\t\t\t\t\$('.loadmore').html('<i class=\"fa fa-minus\"></i><span class=\"more-view\">";
            // line 467
            echo (isset($context["text_more_category"]) ? $context["text_more_category"] : null);
            echo "</span>');
\t\t\t}
\t\t});
\t});
</script>
";
        }
        // line 473
        echo "<script>
\$(document).ready(function(){
\t\$('a[href=\"";
        // line 475
        echo (isset($context["actual_link"]) ? $context["actual_link"] : null);
        echo "\"]').each(function() {
\t\t\$(this).parents('.with-sub-menu').addClass('sub-active');
\t});  
});
</script>";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/module/so_megamenu/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1300 => 475,  1296 => 473,  1287 => 467,  1276 => 459,  1255 => 441,  1250 => 439,  1246 => 437,  1244 => 436,  1240 => 434,  1236 => 432,  1234 => 431,  1226 => 425,  1220 => 424,  1216 => 422,  1210 => 418,  1203 => 416,  1200 => 415,  1197 => 414,  1187 => 409,  1183 => 407,  1177 => 405,  1175 => 404,  1172 => 403,  1167 => 401,  1162 => 400,  1156 => 398,  1154 => 397,  1151 => 396,  1149 => 395,  1146 => 394,  1142 => 392,  1136 => 391,  1132 => 389,  1128 => 387,  1125 => 386,  1121 => 385,  1118 => 384,  1116 => 383,  1112 => 382,  1106 => 381,  1094 => 376,  1090 => 375,  1081 => 372,  1078 => 371,  1073 => 370,  1070 => 369,  1064 => 367,  1061 => 366,  1058 => 365,  1054 => 363,  1047 => 361,  1041 => 359,  1038 => 358,  1032 => 356,  1029 => 355,  1019 => 353,  1017 => 352,  1014 => 351,  1010 => 350,  1005 => 349,  1002 => 348,  1000 => 347,  995 => 345,  990 => 344,  984 => 342,  981 => 341,  978 => 340,  974 => 338,  963 => 336,  959 => 335,  954 => 334,  951 => 333,  949 => 332,  944 => 330,  939 => 328,  933 => 326,  930 => 325,  925 => 322,  919 => 320,  913 => 318,  911 => 317,  902 => 315,  894 => 314,  889 => 313,  886 => 312,  884 => 311,  879 => 309,  874 => 308,  872 => 307,  867 => 306,  864 => 305,  861 => 304,  857 => 302,  854 => 301,  851 => 300,  846 => 299,  844 => 298,  837 => 295,  835 => 294,  832 => 293,  826 => 290,  821 => 288,  811 => 286,  805 => 283,  800 => 281,  790 => 279,  788 => 278,  781 => 276,  778 => 275,  774 => 274,  768 => 270,  758 => 267,  755 => 266,  745 => 261,  741 => 259,  735 => 257,  733 => 256,  730 => 255,  725 => 253,  720 => 252,  714 => 250,  712 => 249,  709 => 248,  707 => 247,  704 => 246,  700 => 244,  694 => 243,  690 => 241,  686 => 239,  683 => 238,  679 => 237,  676 => 236,  674 => 235,  670 => 234,  664 => 233,  652 => 228,  648 => 227,  639 => 224,  636 => 223,  631 => 222,  628 => 221,  622 => 219,  619 => 218,  616 => 217,  612 => 215,  605 => 213,  599 => 211,  596 => 210,  590 => 208,  587 => 207,  577 => 205,  575 => 204,  572 => 203,  568 => 202,  563 => 201,  560 => 200,  558 => 199,  553 => 197,  548 => 196,  542 => 194,  539 => 193,  536 => 192,  532 => 190,  521 => 188,  517 => 187,  512 => 186,  509 => 185,  507 => 184,  502 => 182,  498 => 181,  493 => 180,  488 => 177,  482 => 175,  476 => 173,  474 => 172,  465 => 170,  457 => 169,  452 => 168,  449 => 167,  447 => 166,  440 => 165,  438 => 164,  433 => 163,  430 => 162,  427 => 161,  423 => 159,  420 => 158,  417 => 157,  412 => 156,  410 => 155,  405 => 152,  399 => 150,  393 => 148,  390 => 147,  388 => 146,  385 => 145,  379 => 142,  374 => 140,  364 => 138,  357 => 134,  352 => 132,  342 => 130,  340 => 129,  332 => 127,  330 => 126,  327 => 125,  324 => 124,  321 => 123,  319 => 122,  316 => 121,  313 => 120,  310 => 119,  308 => 118,  305 => 117,  302 => 116,  299 => 115,  297 => 114,  294 => 113,  291 => 112,  288 => 111,  285 => 110,  282 => 109,  279 => 108,  276 => 107,  273 => 106,  271 => 105,  268 => 104,  265 => 103,  262 => 102,  260 => 101,  257 => 100,  254 => 99,  251 => 98,  249 => 97,  246 => 96,  243 => 95,  240 => 94,  238 => 93,  235 => 92,  232 => 91,  229 => 90,  227 => 89,  224 => 88,  221 => 87,  218 => 86,  216 => 85,  213 => 84,  210 => 83,  207 => 82,  204 => 81,  201 => 80,  199 => 79,  196 => 78,  193 => 77,  190 => 76,  187 => 75,  184 => 74,  181 => 73,  178 => 72,  174 => 71,  171 => 70,  166 => 67,  160 => 65,  156 => 63,  154 => 62,  150 => 61,  147 => 60,  145 => 59,  131 => 58,  125 => 54,  121 => 52,  117 => 50,  115 => 49,  112 => 48,  108 => 46,  104 => 44,  102 => 43,  99 => 42,  88 => 33,  70 => 18,  62 => 12,  60 => 11,  42 => 10,  39 => 9,  33 => 7,  31 => 6,  28 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div class="responsive megamenu-style-dev">*/
/* 	{% if ustawienia.orientation == 1 %}*/
/* 	<div class="so-vertical-menu no-gutter">*/
/* 	{% endif %}*/
/* 	*/
/* 	{% if ustawienia.disp_title_module and head_name %}*/
/* 		<h3>{{ head_name }}</h3>*/
/* 	{% endif %}*/
/* 	<nav class="navbar-default">*/
/* 		<div class=" container-megamenu {% if ustawienia.full_width != 1 %} {{ 'container' }} {% endif %} {% if ustawienia.orientation == 1 %} {{ 'vertical ' }} {% else %} {{ 'horizontal' }} {% endif %}">*/
/* 		{% if ustawienia.orientation == 1 %}*/
/* 			<div id="menuHeading">*/
/* 				<div class="megamenuToogle-wrapper">*/
/* 					<div class="megamenuToogle-pattern">*/
/* 						<div class="container">*/
/* 							<div><span></span><span></span><span></span></div>*/
/* 							<span class="title-mega">*/
/* 							{{ navigation_text }}*/
/* 							</span>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 			<div class="navbar-header">*/
/* 				<button type="button" id="show-verticalmenu" data-toggle="collapse"  class="navbar-toggle">*/
/* 					<span class="icon-bar"></span>*/
/* 					<span class="icon-bar"></span>*/
/* 					<span class="icon-bar"></span>*/
/* 					<span class="menu-text">Меню</span>*/
/* 				</button>*/
/* 			</div>*/
/* 		{% else %}*/
/* 			<div class="navbar-header">*/
/* 				<button type="button" id="show-megamenu" data-toggle="collapse"  class="navbar-toggle">*/
/* 					<span class="icon-bar"></span>*/
/* 					<span class="icon-bar"></span>*/
/* 					<span class="icon-bar"></span>*/
/* 					<span class="menu-text">Меню</span>*/
/* 				</button>*/
/* 			</div>*/
/* 		{% endif %}*/
/* */
/* 		{% if ustawienia.orientation == 1 %}*/
/* 			<div class="vertical-wrapper">*/
/* 		{% else %}*/
/* 			<div class="megamenu-wrapper">*/
/* 		{% endif %}*/
/* */
/* 		{% if ustawienia.orientation == 1 %}*/
/* 			<span id="remove-verticalmenu" class="fa fa-times"></span>*/
/* 		{% else %}*/
/* 			<span id="remove-megamenu" class="fa fa-times"></span>*/
/* 		{% endif %}*/
/* */
/* 			<div class="megamenu-pattern">*/
/* 				<div class="container">*/
/* 					<ul class="megamenu"*/
/* 					data-transition="{% if ustawienia.animation != '' %}{{ ustawienia.animation }}{% else %}{{ 'none' }}{% endif %}" data-animationtime="{% if ustawienia.animation_time > 0 and ustawienia.animation_time < 5000 %}{{ ustawienia.animation_time }}{% else %}{{ 500 }}{% endif %}">*/
/* 						{% if ustawienia.home_item == 'icon' or ustawienia.home_item == 'text' %}*/
/* 							<li class="home">*/
/* 								<a href="{{ home }}">*/
/* 								{% if ustawienia.home_item == 'icon' %}*/
/* 									<i class="fa fa-home"></i>*/
/* 								{% else %}*/
/* 									<span><strong>{{ home_text }}</strong></span>*/
/* 								{% endif %}*/
/* 								</a>*/
/* 							</li>*/
/* 						{% endif %}*/
/* 						*/
/* 						{% for key, row in menu %}*/
/* 							{% set class 		= '' %}*/
/* 							{% set icon_font 	= '' %}*/
/* 							{% set class_link 	= 'clearfix' %}*/
/* 							{% set label_item 	= '' %}*/
/* 							{% set title 		= false %}*/
/* 							{% set target 		= false %}*/
/* */
/* 							{% if 'no_image' in row.icon %}*/
/* 								{% set icon = '' %}*/
/* 							{% else %}*/
/* 								{% set icon = row.icon %}*/
/* 							{% endif %}*/
/* 							*/
/* 							{% if row.description != '' %}*/
/* 								{% set class_link = class_link~' description' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if route and route == row.route and path and path == row.path %}*/
/* 								{% set class = class~' active_menu' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.class_menu %}*/
/* 								{% set class = class~row.class_menu %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.icon_font %}*/
/* 								{% set icon_font = icon_font~'<i class="'~row.icon_font~'"></i>' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.label_item %}*/
/* 								{% set label_item = label_item~'<span class="label'~row.label_item~'"></span>' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.submenu is iterable and row.submenu %}*/
/* 								{% set class = class~' with-sub-menu' %}*/
/* 								{% if row.submenu_type == 1 %}*/
/* 									{% set class = class~' click' %}*/
/* 								{% else %}*/
/* 									{% set class = class~' hover' %}*/
/* 								{% endif %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.position == 1 %}*/
/* 								{% set class = class~' pull-right' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.submenu_type == 2 %}*/
/* 								{% set title = 'title="hover-intent"' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if row.new_window == 1 %}*/
/* 								{% set target = 'target="_blank"' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if ustawienia.orientation == 1 %}*/
/* 								<li class="item-vertical {{ class }}" {{ title }}>*/
/* 									<p class='close-menu'></p>*/
/* 									{% if row.submenu is iterable and row.submenu %}*/
/* 										<a href="{{ row.link }}" class="{{ class_link }}" {{ target }}>*/
/* 											<span>*/
/* 												<strong>{{ icon_font~icon~row.name[lang_id]~row.description }}</strong>*/
/* 											</span>*/
/* 											{{ label_item }}*/
/* 											<b class='fa fa-angle-right' ></b>*/
/* 										</a>*/
/* 									{% else %}*/
/* 								 		<a href="{{ row.link }}" class="{{ class_link }}" {{ target }}>*/
/* 											<span>*/
/* 												<strong>{{ icon_font~icon~row.name[lang_id]~row.description }}</strong>*/
/* 											</span>*/
/* 											{{ label_item }}*/
/* 										</a>*/
/* 									{% endif %}*/
/* */
/* 									{% if row.submenu is iterable and row.submenu %}*/
/* 										{% if '%' in row.submenu_width %}*/
/* 											<div class="sub-menu" data-subwidth ="{{ row.submenu_width|replace({'%': ''}) }}">*/
/* 										{% else %}*/
/* 											<div class="sub-menu" style="width:{{ row.submenu_width }}">*/
/* 										{% endif %}*/
/* */
/* 										<div class="content">*/
/* 											<div class="row">*/
/* 												{% set row_fluid = 0 %}*/
/* 												{% for submenu in row.submenu %}*/
/* 													{% if row_fluid+submenu.content_width > 12 %}*/
/* 														{% set row_fluid = submenu.content_width %}*/
/* 										 				</div><div class="border"></div><div class="row">*/
/* 													{% else %}*/
/* 														{% set row_fluid = row_fluid+submenu.content_width %}*/
/* 													{% endif %}*/
/* 													<div class="col-sm-{{ submenu.content_width }}">														*/
/* 														{% if submenu.content_type == 0 %}*/
/* 															<div class="html {{submenu.class_menu }}">{{ submenu.html }}</div>*/
/* 														{% elseif submenu.content_type == 1 %}*/
/* 															{% if submenu.product is iterable %}*/
/* 																<div class="product {{ submenu.class_menu }}">*/
/* 																	<div class="image"><a href="{{ submenu.product.link }}" onclick="window.location = '{{ submenu.product.link }}'"><img src="{{ submenu.product.image }}" alt=""></a></div>*/
/* 																	<div class="name"><a href="{{ submenu.product.link }}" onclick="window.location = '{{ submenu.product.link }}'">{{ submenu.product.name }}</a></div>*/
/* 																	<div class="price">*/
/* 																		{% if not submenu.product.special %}*/
/* 																			{{ submenu.product.price }}*/
/* 																		{% else %}*/
/* 																			{{ submenu.product.special }}*/
/* 																		{% endif %}*/
/* 																	</div>*/
/* 																</div>*/
/* 															{% endif %}*/
/* 														{% elseif submenu.content_type == 2 %}															*/
/* 															<div class="categories {{ submenu.class_menu }}">*/
/* 																	{{ submenu.categories }}*/
/* 															</div>*/
/* 														{% elseif submenu.content_type == 3 %}*/
/* 															{% if submenu.manufactures is iterable %}*/
/* 																<ul class="manufacturer {{ submenu.class_menu }}">*/
/* 																	{% for manufacturer in submenu.manufactures %}*/
/* 																		<li><a href="{{ manufacturer.link }}">{{ manufacturer.name }}</a></li>*/
/* 																	{% endfor %}*/
/* 																</ul>*/
/* 															{% endif %}*/
/* 														{% elseif submenu.content_type == 4 %}*/
/* 															{% if submenu.images.show_title == 1 %}*/
/* 																<span class="title-submenu">{{ submenu.name[lang_id] }}</span>*/
/* 															{% endif %}*/
/* 															<div class="link {{ submenu.class_menu }}">*/
/* 																{{ submenu.images.link }}*/
/* 															</div>*/
/* 														{% elseif submenu.content_type == 5 %}*/
/* 															{% if submenu.subcategory.categories %}*/
/* 																<ul class="subcategory {{ submenu.class_menu }}">*/
/* 																	{% for categories in submenu.subcategory.categories %}*/
/* 																		<li>*/
/* 																			{% if submenu.subcategory.show_title == 1 %}*/
/* 																				<a href="{{ categories.href }}" class="title-submenu {{ submenu.class_menu }}">{{ categories.name }}</a>*/
/* 																			{% endif %}*/
/* 																			{% if categories.categories %}*/
/* 																				{{ categories.categories }}*/
/* 																			{% endif %}*/
/* 																			{% if submenu.subcategory.show_image == 1 %}*/
/* 																				<img src="{{ categories.thumb }}" alt="" >*/
/* 																			{% endif %}*/
/* 																		</li>*/
/* 																	{% endfor %}*/
/* 																</ul>*/
/* 															{% endif %}*/
/* 														{% elseif submenu.content_type == 6 %}*/
/* 															{% if submenu.productlist.show_title == 1 %}*/
/* 																<span class="title-submenu">{{ submenu.name[lang_id] }}</span>*/
/* 															{% endif %}*/
/* 															{% if submenu.productlist.products %}*/
/* 																{% for product in submenu.productlist.products %}*/
/* 																	{% set itempage = submenu.productlist.col ? 12/submenu.productlist.col : 4 %}*/
/* 																	<div class="col-xs-{{ itempage }} {{ submenu.class_menu }}">*/
/* 																		<div class="product-thumb">*/
/* 																			<div class="image">*/
/* 																				<a href="{{ product.href }}">*/
/* 																					<img src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}" class="img-responsive" />*/
/* 																				</a>*/
/* 																			</div>*/
/* 																			<div>*/
/* 																				<div class="caption">*/
/* 																					<h4><a href="{{ product.href }}">{{ product.name }}</a></h4>*/
/* 																					<p>{{ product.description }}</p>*/
/* 																					{% if product.rating %}*/
/* 																						<div class="rating">*/
/* 																							{% for i in 1..5 %}*/
/* 																								{% if product.rating < i %}*/
/* 																									<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/* 																								{% else %}*/
/* 																									<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/* 																								{% endif %}*/
/* 																							{% endfor %}*/
/* 																						</div>*/
/* 																					{% endif %}*/
/* 																			*/
/* 																					{% if product.price %}*/
/* 																						<p class="price">*/
/* 																							{% if not product.special %}*/
/* 																								{{ product.price }}*/
/* 																					   		{% else %}*/
/* 																								<span class="price-new">{{ product.special }}</span>*/
/* 																								<span class="price-old">{{ product.price }}</span>*/
/* 																					   		{% endif %}*/
/* */
/* 																					   		{% if product.tax %}*/
/* 																								<span class="price-tax">{{ product.tax }}</span>*/
/* 																							{% endif %}*/
/* 																						</p>*/
/* 																					{% endif %}*/
/* 																		  		</div>*/
/* 																			</div>*/
/* 																	  	</div>*/
/* 																	</div>*/
/* 															 	{% endfor %}*/
/* 															{% endif %}*/
/* 														{% endif %}													*/
/* 													</div>*/
/* 												{% endfor %}*/
/* 											</div>*/
/* 										</div>				*/
/* 										</div>			*/
/* 									{% endif %}*/
/* 								</li>							*/
/* 							{% else %}						*/
/* 								<li class="{{ class }}" {{ title }}>*/
/* 									<p class='close-menu'></p>*/
/* 									{% if row.submenu is iterable and row.submenu %}*/
/* 										<a href="{{ row.link }}" class="{{ class_link }}" {{ target }}>*/
/* 											<strong>*/
/* 												{{ icon_font~icon~row.name[lang_id]~row.description }}*/
/* 											</strong>*/
/* 											{{ label_item }}											*/
/* 										</a>*/
/* 									{% else %}*/
/* 										<a href="{{ row.link }}" class="{{ class_link }}" {{ target }}>*/
/* 											<strong>*/
/* 												{{ icon_font~icon~row.name[lang_id]~row.description }}*/
/* 											</strong>*/
/* 											{{ label_item }}*/
/* 										</a>*/
/* 									{% endif %}*/
/* */
/* 									{% if row.submenu is iterable and row.submenu %}*/
/* 										<div class="sub-menu" style="width: {{ row.submenu_width }}">*/
/* 											<div class="content">*/
/* 												<div class="row">*/
/* 													{% set row_fluid = 0 %}*/
/* 													{% for submenu in row.submenu %}*/
/* 														{% if row_fluid+submenu.content_width > 12 %}*/
/* 															{% set row_fluid = submenu.content_width %}*/
/* 															</div><div class="border"></div><div class="row">*/
/* 														{% else %}*/
/* 															{% set row_fluid = row_fluid+submenu.content_width %}*/
/* 														{% endif %}*/
/* 														<div class="col-sm-{{ submenu.content_width }}">*/
/* 															{% if submenu.content_type == 0 %}*/
/* 																<div class="html {{ submenu.class_menu }}">*/
/* 																	{{ submenu.html }}*/
/* 																</div>*/
/* 															{% elseif submenu.content_type == 1 %}*/
/* 																{% if submenu.product is iterable %}*/
/* 																	<div class="product {{ submenu.class_menu }}">*/
/* 																		<div class="image"><a href="{{ submenu.product.link }}" onclick="window.location = '{{ submenu.product.link }}'"><img src="{{ submenu.product.image }}" alt=""></a></div>*/
/* 																		<div class="name"><a href="{{ submenu.product.link }}" onclick="window.location = '{{ submenu.product.link }}'">{{ submenu.product.name }}</a></div>*/
/* 																		<div class="price">*/
/* 																			{% if not submenu.product.special %}*/
/* 																				{{ submenu.product.price }}*/
/* 																			{% else %}*/
/* 																				{{ submenu.product.special }}*/
/* 																			{% endif %}*/
/* 																		</div>*/
/* 																	</div>*/
/* 																{% endif %}*/
/* 															{% elseif submenu.content_type == 2 %}*/
/* 																<div class="categories {{ submenu.class_menu }}">*/
/* 																	<span class="sub-menu-parent-category">*/
/* 																		<strong>{{ icon_font~icon~row.name[lang_id]~row.description }}</strong>*/
/* 																	</span>*/
/* 																	{{ submenu.categories }}*/
/* 																</div>															*/
/* 															{% elseif submenu.content_type == 3 %}*/
/* 																{% if submenu.manufactures is iterable %}*/
/* 																	<ul class="manufacturer {{ submenu.class_menu }}">*/
/* 																		{% for manufacturer in submenu.manufactures %}*/
/* 																			<li><a href="{{ manufacturer.link }}">{{ manufacturer.name }}</a></li>*/
/* 																		{% endfor %}*/
/* 																	</ul>*/
/* 																{% endif %}*/
/* 															{% elseif submenu.content_type == 4 %}*/
/* 																{% if submenu.images.show_title == 1 %}*/
/* 																	<span class="title-submenu">{{ submenu.name[lang_id] }}</span>*/
/* 																{% endif %}*/
/* 																<div class="link {{ submenu.class_menu }}">*/
/* 																	{{ submenu.images.link }}*/
/* 																</div>*/
/* 															{% elseif submenu.content_type == 5 %}*/
/* 																{% if submenu.subcategory.categories %}*/
/* 																	<ul class="subcategory {{ submenu.class_menu }}">*/
/* 																		{% for categories in submenu.subcategory.categories %}*/
/* 																			<li>*/
/* 																				{% if submenu.subcategory.show_title == 1 %}*/
/* 																					<a href="{{ categories.href }}" class="title-submenu {{ submenu.class_menu }}">{{ categories.name }}</a>*/
/* 																				{% endif %}*/
/* 																				{% if categories.categories %}*/
/* 																					{{ categories.categories }}*/
/* 																				{% endif %}*/
/* 																				{% if submenu.subcategory.show_image == 1 %}*/
/* 																					<img src="{{ categories.thumb }}" alt="" />*/
/* 																				{% endif %}*/
/* 																			</li>		*/
/* 																		{% endfor %}*/
/* 																	</ul>*/
/* 																{% endif %}*/
/* 															{% elseif submenu.content_type == 6 %}*/
/* 																{% if submenu.productlist.show_title == 1 %}*/
/* 																	<span class="title-submenu">{{ submenu.name[lang_id] }}</span>*/
/* 																{% endif %}*/
/* 																{% if submenu.productlist.products %}*/
/* 																	{% for product in submenu.productlist.products %}*/
/* 																		{% set itempage = submenu.productlist.col ? 12/submenu.productlist.col : 4 %}*/
/* 																		<div class="col-sm-{{ itempage }} {{ submenu.class_menu }}">*/
/* 																			<div class="product-thumb">*/
/* 																				<div class="image">*/
/* 																					<a href="{{ product.href }}">*/
/* 																						<img src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}" class="img-responsive" />*/
/* 																					</a>*/
/* 																				</div>*/
/* 																				<div>*/
/* 																					<div class="caption">*/
/* 																						<h4><a href="{{ product.href }}">{{ product.name }}</a></h4>*/
/* 																						<p>{{ product.description }}</p>*/
/* 																						{% if product.rating %}*/
/* 																							<div class="rating">*/
/* 																								{% for i in 1..5 %}*/
/* 																									{% if product.rating < i %}*/
/* 																										<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/* 																									{% else %}*/
/* 																										<span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>*/
/* 																									{% endif %}*/
/* 																								{% endfor %}*/
/* 																							</div>*/
/* 																						{% endif %}*/
/* */
/* 																						{% if product.price %}*/
/* 																							<p class="price">*/
/* 																								{% if not product.special %}*/
/* 																									{{ product.price }}*/
/* 																							   	{% else %}*/
/* 																									<span class="price-new">{{ product.special }}</span>*/
/* 																									<span class="price-old">{{ product.price }}</span>*/
/* 																							   	{% endif %}*/
/* 																							   	*/
/* 																							   	{% if product.tax %}*/
/* 																									<span class="price-tax">{{ product.tax }}</span>*/
/* 																								{% endif %}*/
/* 																							</p>*/
/* 																						{% endif %}*/
/* 																			  		</div>*/
/* 																				</div>*/
/* 														  					</div>*/
/* 																		</div>*/
/* 													 				{% endfor %}*/
/* 																{% endif %}*/
/* 															{% endif %}*/
/* 														</div>*/
/* 													{% endfor %}*/
/* 												</div>												*/
/* 											</div>*/
/* 										</div>										*/
/* 									{% endif %}*/
/* 								</li>*/
/* 							{% endif %}*/
/* 						{% endfor %}*/
/* 					</ul>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 		</div>*/
/* 	</nav>*/
/* 	{% if ustawienia.orientation == 1 %}*/
/* 		</div>*/
/* 	{% endif %}*/
/* </div>*/
/* */
/* {% if ustawienia.orientation == 1 %}*/
/* <script type="text/javascript">*/
/* 	$(document).ready(function() {*/
/* 		var itemver =  {{ ustawienia.show_itemver }};*/
/* 		if(itemver <= $( ".vertical ul.megamenu >li" ).length)*/
/* 			$('.vertical ul.megamenu').append('<li class="loadmore"><i class="fa fa-plus-square-o"></i><span class="more-view"> {{text_more_category}}</span></li>');*/
/* 		$('.horizontal ul.megamenu li.loadmore').remove();*/
/* */
/* 		var show_itemver = itemver-1 ;*/
/* 		$('ul.megamenu > li.item-vertical').each(function(i){*/
/* 			if(i>show_itemver){*/
/* 					$(this).css('display', 'none');*/
/* 			}*/
/* 		});*/
/* 		$(".megamenu .loadmore").click(function(){*/
/* 			if($(this).hasClass('open')){*/
/* 				$('ul.megamenu li.item-vertical').each(function(i){*/
/* 					if(i>show_itemver){*/
/* 						$(this).slideUp(200);*/
/* 						$(this).css('display', 'none');*/
/* 					}*/
/* 				});*/
/* 				$(this).removeClass('open');*/
/* 				$('.loadmore').html('<i class="fa fa-plus"></i><span class="more-view">{{text_more_category}}</span>');*/
/* 			}else{*/
/* 				$('ul.megamenu li.item-vertical').each(function(i){*/
/* 					if(i>show_itemver){*/
/* 						$(this).slideDown(200);*/
/* 					}*/
/* 				});*/
/* 				$(this).addClass('open');*/
/* 				$('.loadmore').html('<i class="fa fa-minus"></i><span class="more-view">{{text_more_category}}</span>');*/
/* 			}*/
/* 		});*/
/* 	});*/
/* </script>*/
/* {% endif %}*/
/* <script>*/
/* $(document).ready(function(){*/
/* 	$('a[href="{{ actual_link }}"]').each(function() {*/
/* 		$(this).parents('.with-sub-menu').addClass('sub-active');*/
/* 	});  */
/* });*/
/* </script>*/
