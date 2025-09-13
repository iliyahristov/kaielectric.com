<?php

/* default/template/account/address_list.twig */
class __TwigTemplate_1a44f8054113c08ab782fdbe70b6e326c649231982b546a2504c6d2cec9c30e6 extends Twig_Template
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
<div id=\"account-address\" class=\"container\">
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
  ";
        // line 8
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 9
            echo "  <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            echo (isset($context["success"]) ? $context["success"] : null);
            echo "</div>
  ";
        }
        // line 11
        echo "  ";
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 12
            echo "  <div class=\"alert alert-warning\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "</div>
  ";
        }
        // line 14
        echo "  <div class=\"row\">";
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
    ";
        // line 15
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 16
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 17
            echo "    ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 18
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 19
            echo "    ";
        } else {
            // line 20
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 21
            echo "    ";
        }
        // line 22
        echo "    <div id=\"content\" class=\"";
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
      <p>";
        // line 23
        echo (isset($context["text_address_book"]) ? $context["text_address_book"] : null);
        echo "</p>
      ";
        // line 24
        if ((isset($context["addresses"]) ? $context["addresses"] : null)) {
            // line 25
            echo "      ";
            // line 37
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["addresses"]) ? $context["addresses"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                // line 38
                echo "  <div class=\"address-list\">
    <div class=\"address-info\">
      <p>";
                // line 40
                echo $this->getAttribute($context["result"], "address", array());
                echo "</p>
      <p>";
                // line 41
                echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
                echo ": ";
                echo $this->getAttribute($context["result"], "name", array());
                echo "</p>
      ";
                // line 42
                if ($this->getAttribute($context["result"], "company", array())) {
                    // line 43
                    echo "      <p>";
                    echo (isset($context["entry_company"]) ? $context["entry_company"] : null);
                    echo ": ";
                    echo $this->getAttribute($context["result"], "company", array());
                    echo "</p>
      ";
                }
                // line 45
                echo "    </div>
    <div class=\"address-actions\">
      <a href=\"";
                // line 47
                echo $this->getAttribute($context["result"], "delete", array());
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
                echo "\" class=\"\"><i class=\"fa fa-times\"></i></a>
      </br>
      </br>
      <a href=\"";
                // line 50
                echo $this->getAttribute($context["result"], "update", array());
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
                echo "\"><i class=\"fa fa-edit\"></i></a>
    </div>
  </div>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "      ";
        } else {
            // line 55
            echo "      <p>";
            echo (isset($context["text_empty"]) ? $context["text_empty"] : null);
            echo "</p>
      ";
        }
        // line 57
        echo "      <div class=\"buttons clearfix\">
        ";
        // line 59
        echo "        <div class=\"pull-right\"><a href=\"";
        echo (isset($context["add"]) ? $context["add"] : null);
        echo "\" class=\"btn btn-primary\">";
        echo (isset($context["button_new_address"]) ? $context["button_new_address"] : null);
        echo "</a></div>
      </div>
      ";
        // line 61
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "</div>
    ";
        // line 62
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "</div>
</div>
";
        // line 64
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "default/template/account/address_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 64,  177 => 62,  173 => 61,  165 => 59,  162 => 57,  156 => 55,  153 => 54,  141 => 50,  133 => 47,  129 => 45,  121 => 43,  119 => 42,  113 => 41,  109 => 40,  105 => 38,  100 => 37,  98 => 25,  96 => 24,  92 => 23,  85 => 22,  82 => 21,  79 => 20,  76 => 19,  73 => 18,  70 => 17,  67 => 16,  65 => 15,  60 => 14,  54 => 12,  51 => 11,  45 => 9,  43 => 8,  40 => 7,  29 => 5,  25 => 4,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div id="account-address" class="container">*/
/*   <ul class="breadcrumb">*/
/*     {% for breadcrumb in breadcrumbs %}*/
/*     <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*     {% endfor %}*/
/*   </ul>*/
/*   {% if success %}*/
/*   <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> {{ success }}</div>*/
/*   {% endif %}*/
/*   {% if error_warning %}*/
/*   <div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}</div>*/
/*   {% endif %}*/
/*   <div class="row">{{ column_left }}*/
/*     {% if column_left and column_right %}*/
/*     {% set class = 'col-sm-6' %}*/
/*     {% elseif column_left or column_right %}*/
/*     {% set class = 'col-sm-9' %}*/
/*     {% else %}*/
/*     {% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/*     <div id="content" class="{{ class }}">{{ content_top }}*/
/*       <p>{{ text_address_book }}</p>*/
/*       {% if addresses %}*/
/*       {# <div class="table-responsive">*/
/*         <table class="table table-bordered table-hover">*/
/*           {% for result in addresses %}*/
/*           <tr>*/
/*             <td class="text-left">{{ result.address }}</td>*/
/*             <td class="text-left">{{ entry_name }} {{ result.name }}</td>*/
/*             <td class="text-left">{{ entry_company }} {{ result.company }}</td>*/
/*             <td class="text-right"><a href="{{ result.update }}" class="btn btn-info">{{ button_edit }}</a> &nbsp; <a href="{{ result.delete }}" class="btn btn-danger">{{ button_delete }}</a></td>*/
/*           </tr>*/
/*           {% endfor %}*/
/*         </table>*/
/*       </div> #}*/
/*   {% for result in addresses %}*/
/*   <div class="address-list">*/
/*     <div class="address-info">*/
/*       <p>{{ result.address }}</p>*/
/*       <p>{{ entry_name }}: {{ result.name }}</p>*/
/*       {% if result.company %}*/
/*       <p>{{ entry_company }}: {{ result.company }}</p>*/
/*       {% endif %}*/
/*     </div>*/
/*     <div class="address-actions">*/
/*       <a href="{{ result.delete }}" data-toggle="tooltip" title="{{ button_remove }}" class=""><i class="fa fa-times"></i></a>*/
/*       </br>*/
/*       </br>*/
/*       <a href="{{ result.update }}" data-toggle="tooltip" title="{{ button_edit }}"><i class="fa fa-edit"></i></a>*/
/*     </div>*/
/*   </div>*/
/*   {% endfor %}*/
/*       {% else %}*/
/*       <p>{{ text_empty }}</p>*/
/*       {% endif %}*/
/*       <div class="buttons clearfix">*/
/*         {# <div class="pull-left"><a href="{{ back }}" class="btn btn-default">{{ button_back }}</a></div> #}*/
/*         <div class="pull-right"><a href="{{ add }}" class="btn btn-primary">{{ button_new_address }}</a></div>*/
/*       </div>*/
/*       {{ content_bottom }}</div>*/
/*     {{ column_right }}</div>*/
/* </div>*/
/* {{ footer }}*/
