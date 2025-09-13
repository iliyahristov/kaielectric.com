<?php

/* so-revo/template/error/not_found.twig */
class __TwigTemplate_83efd5a8591b7b5ae1843944233929f9e980857d17c457797db8c806ed6cdfbc extends Twig_Template
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
  <div class=\"row\">
        ";
        // line 9
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "

        ";
        // line 11
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 12
            echo "        ";
            $context["class"] = "col-sm-6";
            // line 13
            echo "        ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 14
            echo "        ";
            $context["class"] = "col-sm-9";
            // line 15
            echo "        ";
        } else {
            // line 16
            echo "        ";
            $context["class"] = "col-sm-12";
            // line 17
            echo "        ";
        }
        // line 18
        echo "        <div id=\"content\" class=\"bg-page-404 ";
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
    \t\t<div class=\"row\">
                <div class=\"content_404\">
                    <div class=\"item-left col-lg-5 col-md-5\">
                        <div class=\"erro-image\">
                            <span class=\"erro-key\">
                                <img src=\"image/catalog/demo/bonuspage/404/img-404.png\" alt=\"\">
                            </span>
                        </div>
                    </div>
                    <div class=\"item-right col-lg-7 col-md-7\">
                        <div class=\"block-top font-ct\">
                            <h2><span>Oops, ";
        // line 30
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo " </span></h2>
                            <div class=\"warning-code\"><p>";
        // line 31
        echo (isset($context["text_error"]) ? $context["text_error"] : null);
        echo " </p></div>
                        </div>

                        <div class=\"block-bottom\">
                            <a href=\"";
        // line 35
        echo (isset($context["continue"]) ? $context["continue"] : null);
        echo " \" class=\"btn btn-revo\" title=\"";
        echo (isset($context["button_continue"]) ? $context["button_continue"] : null);
        echo " \">";
        echo (isset($context["button_continue"]) ? $context["button_continue"] : null);
        echo " </a>
                            <a href=\"#\" class=\"btn btn-revo\" title=\"Go Support\">Go Support</a>                  
                        </div>
                    </div>
                </div>
                ";
        // line 40
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo " 
            </div>
    \t</div>
    \t  
        ";
        // line 44
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "
    </div>
</div>
";
        // line 47
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "so-revo/template/error/not_found.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 47,  117 => 44,  110 => 40,  98 => 35,  91 => 31,  87 => 30,  69 => 18,  66 => 17,  63 => 16,  60 => 15,  57 => 14,  54 => 13,  51 => 12,  49 => 11,  44 => 9,  40 => 7,  29 => 5,  25 => 4,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div class="container">*/
/*   <ul class="breadcrumb">*/
/*     {% for breadcrumb in breadcrumbs %}*/
/*     <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*     {% endfor %}*/
/*   </ul>*/
/*   <div class="row">*/
/*         {{ column_left }}*/
/* */
/*         {% if column_left and column_right %}*/
/*         {% set class = 'col-sm-6' %}*/
/*         {% elseif column_left or column_right %}*/
/*         {% set class = 'col-sm-9' %}*/
/*         {% else %}*/
/*         {% set class = 'col-sm-12' %}*/
/*         {% endif %}*/
/*         <div id="content" class="bg-page-404 {{ class }}">{{ content_top }}*/
/*     		<div class="row">*/
/*                 <div class="content_404">*/
/*                     <div class="item-left col-lg-5 col-md-5">*/
/*                         <div class="erro-image">*/
/*                             <span class="erro-key">*/
/*                                 <img src="image/catalog/demo/bonuspage/404/img-404.png" alt="">*/
/*                             </span>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="item-right col-lg-7 col-md-7">*/
/*                         <div class="block-top font-ct">*/
/*                             <h2><span>Oops, {{ heading_title }} </span></h2>*/
/*                             <div class="warning-code"><p>{{ text_error }} </p></div>*/
/*                         </div>*/
/* */
/*                         <div class="block-bottom">*/
/*                             <a href="{{ continue }} " class="btn btn-revo" title="{{ button_continue }} ">{{ button_continue }} </a>*/
/*                             <a href="#" class="btn btn-revo" title="Go Support">Go Support</a>                  */
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*                 {{ content_bottom }} */
/*             </div>*/
/*     	</div>*/
/*     	  */
/*         {{ column_right }}*/
/*     </div>*/
/* </div>*/
/* {{ footer }}*/
/* */
