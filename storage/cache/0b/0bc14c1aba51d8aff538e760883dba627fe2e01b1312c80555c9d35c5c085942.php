<?php

/* default/template/tk_checkout/cart.twig */
class __TwigTemplate_5c4e409361207ecc9b2ef207a1d120ee6e91131adbce01cb49d637d4c0baa793 extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["totals"]) ? $context["totals"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["total"]) {
            echo " 
<div class=\"tk_totals_price c-";
            // line 2
            echo $this->getAttribute($context["total"], "code", array(), "array");
            echo "\">
\t<div class=\"tk_totals_left\"><strong>";
            // line 3
            echo $this->getAttribute($context["total"], "title", array(), "array");
            echo ":</strong></div>
\t<div class=\"tk_totals_right\" >";
            // line 4
            echo $this->getAttribute($context["total"], "text", array(), "array");
            echo "</div>
\t<div class=\"tk_clear\"></div>
</div>\t\t\t\t\t\t\t
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['total'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo " 
<script type=\"text/javascript\">
\t\$(document).ready(function() { 
\t
\t\t\t";
        // line 11
        if ((isset($context["redirect"]) ? $context["redirect"] : null)) {
            echo " 
\t\t\tlocation = '";
            // line 12
            echo (isset($context["redirect"]) ? $context["redirect"] : null);
            echo "';
\t\t\t";
        }
        // line 14
        echo "\t\t\t\t
\t\t\tminCart();
\t\t\tgetCartWeight();
\t\t\tgetTextFreeShipping(); 
\t\t\t
\t\t\tgetSave();\t\t
\t\t
\t\t});
</script>
";
    }

    public function getTemplateName()
    {
        return "default/template/tk_checkout/cart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 14,  53 => 12,  49 => 11,  43 => 7,  33 => 4,  29 => 3,  25 => 2,  19 => 1,);
    }
}
/* {% for total in totals %} */
/* <div class="tk_totals_price c-{{ total['code'] }}">*/
/* 	<div class="tk_totals_left"><strong>{{ total['title'] }}:</strong></div>*/
/* 	<div class="tk_totals_right" >{{ total['text'] }}</div>*/
/* 	<div class="tk_clear"></div>*/
/* </div>							*/
/* {% endfor %} */
/* <script type="text/javascript">*/
/* 	$(document).ready(function() { */
/* 	*/
/* 			{% if (redirect) %} */
/* 			location = '{{ redirect }}';*/
/* 			{% endif %}*/
/* 				*/
/* 			minCart();*/
/* 			getCartWeight();*/
/* 			getTextFreeShipping(); */
/* 			*/
/* 			getSave();		*/
/* 		*/
/* 		});*/
/* </script>*/
/* */
