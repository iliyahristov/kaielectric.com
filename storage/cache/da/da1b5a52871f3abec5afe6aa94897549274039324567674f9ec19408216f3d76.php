<?php

/* default/template/tk_checkout/payment_method.twig */
class __TwigTemplate_57bd1031a3d73e066f7cde4785886f61f07817bdf1241e582785c210de95bd04 extends Twig_Template
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
        if ((isset($context["payment_error_warning"]) ? $context["payment_error_warning"] : null)) {
            // line 2
            echo "\t<div class=\"tk_alert\"> ";
            echo (isset($context["payment_error_warning"]) ? $context["payment_error_warning"] : null);
            echo "</div>
\t<script>
      \$(document).ready(function () {
          \$('#tk_button_confirm').prop('disabled', false);
      });
\t</script>
";
        }
        // line 9
        if ((isset($context["payment_methods"]) ? $context["payment_methods"] : null)) {
            // line 10
            echo "\t<div class=\"tk_payment_methods\">
\t\t";
            // line 11
            $context["counter"] = 0;
            // line 12
            echo "\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["payment_methods"]) ? $context["payment_methods"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["payment_method"]) {
                // line 13
                echo "\t\t\t<input type=\"hidden\" name=\"payment_method_popup_";
                echo $this->getAttribute($context["payment_method"], "code", array(), "array");
                echo "\" value=\"";
                echo $this->getAttribute($context["payment_method"], "popup_payment", array(), "array");
                echo "\"/>
\t\t\t<div class=\"tk_payment_method\" id=\"payment_code_";
                // line 14
                echo $this->getAttribute($context["payment_method"], "code", array(), "array");
                echo "\">
\t\t\t\t<label for=\"payment_check_";
                // line 15
                echo $this->getAttribute($context["payment_method"], "code", array(), "array");
                echo "\">
\t\t\t\t\t<input type=\"radio\" name=\"payment_method\" value=\"";
                // line 16
                echo $this->getAttribute($context["payment_method"], "code", array(), "array");
                echo "\" title=\"";
                echo $this->getAttribute($context["payment_method"], "title", array(), "array");
                echo "\" id=\"payment_check_";
                echo $this->getAttribute($context["payment_method"], "code", array(), "array");
                echo "\" ";
                if (((isset($context["payment_method_code"]) ? $context["payment_method_code"] : null) == $this->getAttribute($context["payment_method"], "code", array(), "array"))) {
                    echo "checked=\"checked\" ";
                } elseif (((isset($context["counter"]) ? $context["counter"] : null) == 0)) {
                    echo "checked=\"checked\"";
                }
                echo " />
\t\t\t\t\t<span class=\"payment_check_bgr\">";
                // line 17
                echo $this->getAttribute($context["payment_method"], "title", array(), "array");
                echo "</span>
\t\t\t\t</label>
\t\t\t</div>
\t\t\t";
                // line 20
                $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : null) + 1);
                // line 21
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['payment_method'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "\t</div>
";
        }
        // line 24
        echo "<script>
    \$(document).ready(function () {
        saveData();
        getPaymentDisplay();
    });
</script>";
    }

    public function getTemplateName()
    {
        return "default/template/tk_checkout/payment_method.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 24,  87 => 22,  81 => 21,  79 => 20,  73 => 17,  59 => 16,  55 => 15,  51 => 14,  44 => 13,  39 => 12,  37 => 11,  34 => 10,  32 => 9,  21 => 2,  19 => 1,);
    }
}
/* {% if (payment_error_warning) %}*/
/* 	<div class="tk_alert"> {{ payment_error_warning }}</div>*/
/* 	<script>*/
/*       $(document).ready(function () {*/
/*           $('#tk_button_confirm').prop('disabled', false);*/
/*       });*/
/* 	</script>*/
/* {% endif %}*/
/* {% if (payment_methods) %}*/
/* 	<div class="tk_payment_methods">*/
/* 		{% set counter = 0 %}*/
/* 		{% for payment_method in payment_methods %}*/
/* 			<input type="hidden" name="payment_method_popup_{{ payment_method['code'] }}" value="{{ payment_method['popup_payment'] }}"/>*/
/* 			<div class="tk_payment_method" id="payment_code_{{ payment_method['code'] }}">*/
/* 				<label for="payment_check_{{ payment_method['code'] }}">*/
/* 					<input type="radio" name="payment_method" value="{{ payment_method['code'] }}" title="{{ payment_method['title'] }}" id="payment_check_{{ payment_method['code'] }}" {% if (payment_method_code == payment_method['code']) %}checked="checked" {% elseif (counter == 0) %}checked="checked"{% endif %} />*/
/* 					<span class="payment_check_bgr">{{ payment_method['title'] }}</span>*/
/* 				</label>*/
/* 			</div>*/
/* 			{% set counter = counter + 1 %}*/
/* 		{% endfor %}*/
/* 	</div>*/
/* {% endif %}*/
/* <script>*/
/*     $(document).ready(function () {*/
/*         saveData();*/
/*         getPaymentDisplay();*/
/*     });*/
/* </script>*/
