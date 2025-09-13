<?php

/* so-revo/template/product/manufacturer_list.twig */
class __TwigTemplate_1554f9c65b6ab547e438711c4dae873fef7a39bd696e165d1af5b4fc4e233b1d extends Twig_Template
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
<div class=\"container\">
  <ul class=\"breadcrumb\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 5
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
        // line 7
        echo "  </ul>
  <div class=\"row\">";
        // line 8
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
    ";
        // line 9
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 10
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 11
            echo "    ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 12
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 13
            echo "    ";
        } else {
            // line 14
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 15
            echo "    ";
        }
        // line 16
        echo "    <div id=\"content\" class=\"";
        echo (isset($context["class"]) ? $context["class"] : null);
        echo " mans-content\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
      <h1>";
        // line 17
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
     
\t\t";
        // line 19
        if ((isset($context["categories"]) ? $context["categories"] : null)) {
            // line 20
            echo "\t\t\t<p class=\"mans-letters\"><strong>";
            echo (isset($context["text_index"]) ? $context["text_index"] : null);
            echo "</strong> 
\t\t\t";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 22
                echo "        &nbsp;&nbsp;&nbsp;<a href=\"index.php?route=product/manufacturer#";
                echo $this->getAttribute($context["category"], "name", array());
                echo "\">";
                echo $this->getAttribute($context["category"], "name", array());
                echo "</a> 
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo " 
            </p>
      
\t\t\t";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 27
                echo "\t\t\t    <div class=\"row single-mans-letter\">
\t\t\t        <div class=\"col-sm-3 man-name\">
                        <h2 id=\"";
                // line 29
                echo $this->getAttribute($context["category"], "name", array());
                echo "\">";
                echo $this->getAttribute($context["category"], "name", array());
                echo "</h2>
                    </div>
                    <div class=\"col-sm-9\">
                        ";
                // line 32
                if ($this->getAttribute($context["category"], "manufacturer", array())) {
                    // line 33
                    echo "                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_array_batch($this->getAttribute($context["category"], "manufacturer", array()), 4));
                    foreach ($context['_seq'] as $context["_key"] => $context["manufacturers"]) {
                        // line 34
                        echo "                                <div class=\"row\"> 
                                ";
                        // line 35
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["manufacturers"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["manufacturer"]) {
                            // line 36
                            echo "                                    <div class=\"col-sm-3\"><a href=\"";
                            echo $this->getAttribute($context["manufacturer"], "href", array());
                            echo "\">";
                            echo $this->getAttribute($context["manufacturer"], "name", array());
                            echo "</a></div>
                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturer'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 37
                        echo " 
                                </div>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturers'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 40
                    echo "                        ";
                }
                // line 41
                echo "                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "
      ";
        } else {
            // line 46
            echo "      <p>";
            echo (isset($context["text_empty"]) ? $context["text_empty"] : null);
            echo "</p>
      <div class=\"buttons clearfix\">
        <div class=\"pull-right\"><a href=\"";
            // line 48
            echo (isset($context["continue"]) ? $context["continue"] : null);
            echo "\" class=\"btn btn-primary\">";
            echo (isset($context["button_continue"]) ? $context["button_continue"] : null);
            echo "</a></div>
      </div>
      ";
        }
        // line 51
        echo "\t  
      ";
        // line 52
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "</div>
    ";
        // line 53
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "</div>
</div>
";
        // line 55
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "so-revo/template/product/manufacturer_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  196 => 55,  191 => 53,  187 => 52,  184 => 51,  176 => 48,  170 => 46,  166 => 44,  158 => 41,  155 => 40,  147 => 37,  136 => 36,  132 => 35,  129 => 34,  124 => 33,  122 => 32,  114 => 29,  110 => 27,  106 => 26,  101 => 23,  90 => 22,  86 => 21,  81 => 20,  79 => 19,  74 => 17,  67 => 16,  64 => 15,  61 => 14,  58 => 13,  55 => 12,  52 => 11,  49 => 10,  47 => 9,  43 => 8,  40 => 7,  29 => 5,  25 => 4,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div class="container">*/
/*   <ul class="breadcrumb">*/
/*     {% for breadcrumb in breadcrumbs %}*/
/*     <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*     {% endfor %}*/
/*   </ul>*/
/*   <div class="row">{{ column_left }}*/
/*     {% if column_left and column_right %}*/
/*     {% set class = 'col-sm-6' %}*/
/*     {% elseif column_left or column_right %}*/
/*     {% set class = 'col-sm-9' %}*/
/*     {% else %}*/
/*     {% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/*     <div id="content" class="{{ class }} mans-content">{{ content_top }}*/
/*       <h1>{{ heading_title }}</h1>*/
/*      */
/* 		{% if categories %}*/
/* 			<p class="mans-letters"><strong>{{ text_index }}</strong> */
/* 			{% for category in categories %}*/
/*         &nbsp;&nbsp;&nbsp;<a href="index.php?route=product/manufacturer#{{ category.name }}">{{ category.name }}</a> */
/*             {% endfor %} */
/*             </p>*/
/*       */
/* 			{% for category in categories %}*/
/* 			    <div class="row single-mans-letter">*/
/* 			        <div class="col-sm-3 man-name">*/
/*                         <h2 id="{{ category.name }}">{{ category.name }}</h2>*/
/*                     </div>*/
/*                     <div class="col-sm-9">*/
/*                         {% if category.manufacturer %}*/
/*                             {% for manufacturers in category.manufacturer|batch(4) %}*/
/*                                 <div class="row"> */
/*                                 {% for manufacturer in manufacturers %}*/
/*                                     <div class="col-sm-3"><a href="{{ manufacturer.href }}">{{ manufacturer.name }}</a></div>*/
/*                                 {% endfor %} */
/*                                 </div>*/
/*                             {% endfor %}*/
/*                         {% endif %}*/
/*                     </div>*/
/*                 </div>*/
/*             {% endfor %}*/
/* */
/*       {% else %}*/
/*       <p>{{ text_empty }}</p>*/
/*       <div class="buttons clearfix">*/
/*         <div class="pull-right"><a href="{{ continue }}" class="btn btn-primary">{{ button_continue }}</a></div>*/
/*       </div>*/
/*       {% endif %}*/
/* 	  */
/*       {{ content_bottom }}</div>*/
/*     {{ column_right }}</div>*/
/* </div>*/
/* {{ footer }}*/
