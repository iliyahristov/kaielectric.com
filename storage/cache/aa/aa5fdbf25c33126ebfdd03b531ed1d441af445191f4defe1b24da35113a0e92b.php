<?php

/* so-revo/template/common/currency.twig */
class __TwigTemplate_62631fd1600a7d43b48b984ae9dd5f0356e6d439c7aeb544349cdf61f02ac916 extends Twig_Template
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
        if ((twig_length_filter($this->env, (isset($context["currencies"]) ? $context["currencies"] : null)) > 1)) {
            // line 2
            echo "<div class=\"pull-left\">
  <form action=\"";
            // line 3
            echo (isset($context["action"]) ? $context["action"] : null);
            echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-currency\">
    <div class=\"btn-group\">
      <button class=\"btn-link dropdown-toggle\" data-toggle=\"dropdown\">
\t  ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["currencies"]) ? $context["currencies"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
                // line 7
                echo "\t\t\t";
                if (($this->getAttribute($context["currency"], "symbol_left", array()) && ($this->getAttribute($context["currency"], "code", array()) == (isset($context["code"]) ? $context["code"] : null)))) {
                    echo " 
\t\t\t\t";
                    // line 8
                    echo ((($this->getAttribute($context["currency"], "symbol_left", array()) . "<span class=\"hidden-xs\"> ") . $this->getAttribute($context["currency"], "title", array())) . "</span>");
                    echo " 
\t\t\t";
                } elseif (($this->getAttribute(                // line 9
$context["currency"], "symbol_right", array()) && ($this->getAttribute($context["currency"], "code", array()) == (isset($context["code"]) ? $context["code"] : null)))) {
                    echo " 
\t\t\t\t";
                    // line 10
                    echo ((($this->getAttribute($context["currency"], "symbol_right", array()) . "<span class=\"hidden-xs\"> ") . $this->getAttribute($context["currency"], "title", array())) . "</span>");
                    echo " 
\t\t\t";
                }
                // line 11
                echo "  
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            echo "\t\t<i class=\"fa fa-angle-down\"></i>\t  
\t</button>
      <ul class=\"dropdown-menu\">
        ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["currencies"]) ? $context["currencies"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
                // line 17
                echo "        ";
                if ($this->getAttribute($context["currency"], "symbol_left", array())) {
                    // line 18
                    echo "        <li>
          <button class=\"currency-select btn-block\" type=\"button\" name=\"";
                    // line 19
                    echo $this->getAttribute($context["currency"], "code", array());
                    echo "\">";
                    echo $this->getAttribute($context["currency"], "symbol_left", array());
                    echo " ";
                    echo $this->getAttribute($context["currency"], "title", array());
                    echo "</button>
        </li>
        ";
                } else {
                    // line 22
                    echo "        <li>
          <button class=\"currency-select btn-block\" type=\"button\" name=\"";
                    // line 23
                    echo $this->getAttribute($context["currency"], "code", array());
                    echo "\">";
                    echo $this->getAttribute($context["currency"], "symbol_right", array());
                    echo " ";
                    echo $this->getAttribute($context["currency"], "title", array());
                    echo "</button>
        </li>
        ";
                }
                // line 26
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "      </ul>
    </div>
    <input type=\"hidden\" name=\"code\" value=\"\" />
    <input type=\"hidden\" name=\"redirect\" value=\"";
            // line 30
            echo (isset($context["redirect"]) ? $context["redirect"] : null);
            echo "\" />
  </form>
</div>
";
        }
        // line 33
        echo " ";
    }

    public function getTemplateName()
    {
        return "so-revo/template/common/currency.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 33,  108 => 30,  103 => 27,  97 => 26,  87 => 23,  84 => 22,  74 => 19,  71 => 18,  68 => 17,  64 => 16,  59 => 13,  52 => 11,  47 => 10,  43 => 9,  39 => 8,  34 => 7,  30 => 6,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if currencies|length > 1 %}*/
/* <div class="pull-left">*/
/*   <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-currency">*/
/*     <div class="btn-group">*/
/*       <button class="btn-link dropdown-toggle" data-toggle="dropdown">*/
/* 	  {% for currency in currencies %}*/
/* 			{% if currency.symbol_left  and  currency.code ==  code %} */
/* 				{{ currency.symbol_left~'<span class="hidden-xs"> '~currency.title~'</span>' }} */
/* 			{% elseif  currency.symbol_right  and  currency.code  ==  code %} */
/* 				{{ currency.symbol_right~'<span class="hidden-xs"> '~currency.title~'</span>' }} */
/* 			{% endif %}  */
/*       {% endfor %}*/
/* 		<i class="fa fa-angle-down"></i>	  */
/* 	</button>*/
/*       <ul class="dropdown-menu">*/
/*         {% for currency in currencies %}*/
/*         {% if currency.symbol_left %}*/
/*         <li>*/
/*           <button class="currency-select btn-block" type="button" name="{{ currency.code }}">{{ currency.symbol_left }} {{ currency.title }}</button>*/
/*         </li>*/
/*         {% else %}*/
/*         <li>*/
/*           <button class="currency-select btn-block" type="button" name="{{ currency.code }}">{{ currency.symbol_right }} {{ currency.title }}</button>*/
/*         </li>*/
/*         {% endif %}*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*     <input type="hidden" name="code" value="" />*/
/*     <input type="hidden" name="redirect" value="{{ redirect }}" />*/
/*   </form>*/
/* </div>*/
/* {% endif %} */
