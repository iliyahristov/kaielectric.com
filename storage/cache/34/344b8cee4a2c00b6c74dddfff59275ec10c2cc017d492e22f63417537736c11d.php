<?php

/* default/template/tk_checkout/shipping_method_payment.twig */
class __TwigTemplate_50c463240fe5bd564dac1b3f91a7024be7f5f0393772dce36d4405e329255037 extends Twig_Template
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
        if ((isset($context["shipping_error_warning"]) ? $context["shipping_error_warning"] : null)) {
            echo " 
<div class=\"tk_alert_stay\"> ";
            // line 2
            echo (isset($context["shipping_error_warning"]) ? $context["shipping_error_warning"] : null);
            echo "</div>
<script> 
\t\$(document).ready(function() { 
\t\t\t\$('#tk_button_confirm').prop('disabled', false);
\t\t});
</script>
";
        }
        // line 8
        echo " 
\t\t\t\t\t\t
";
        // line 10
        if ((isset($context["shipping_methods"]) ? $context["shipping_methods"] : null)) {
            echo " 
<div class=\"tk_shipping_methods\">
\t";
            // line 12
            $context["counter"] = 0;
            echo " 
\t";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["shipping_methods"]) ? $context["shipping_methods"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["shipping_method"]) {
                // line 14
                echo "\t\t\t\t\t\t\t\t\t\t
\t";
                // line 15
                if ( !$this->getAttribute($context["shipping_method"], "error", array(), "array")) {
                    echo " 
\t";
                    // line 16
                    $context["counter_quote"] = 0;
                    echo " 
\t";
                    // line 17
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["shipping_method"], "quote", array(), "array"));
                    foreach ($context['_seq'] as $context["_key"] => $context["quote"]) {
                        // line 18
                        echo "\t\t
\t\t<div class=\"tk_shipping_method\">
\t\t\t<label for=\"shipping_check_";
                        // line 20
                        echo $this->getAttribute($context["quote"], "code", array(), "array");
                        echo "\" class=\"";
                        echo twig_replace_filter($this->getAttribute($context["quote"], "code", array(), "array"), array("." => "_"));
                        echo "\">
\t\t\t\t";
                        // line 21
                        if (($this->getAttribute((isset($context["shipping_method_code"]) ? $context["shipping_method_code"] : null), "code", array(), "array", true, true) && ($this->getAttribute($context["quote"], "code", array(), "array") == $this->getAttribute((isset($context["shipping_method_code"]) ? $context["shipping_method_code"] : null), "code", array(), "array")))) {
                            // line 22
                            echo "\t\t\t\t\t<input type=\"radio\" name=\"shipping_method\" value=\"";
                            echo $this->getAttribute($context["quote"], "code", array(), "array");
                            echo "\" title=\"";
                            echo $this->getAttribute($context["quote"], "title", array(), "array");
                            echo "\" checked=\"checked\" id=\"shipping_check_";
                            echo $this->getAttribute($context["quote"], "code", array(), "array");
                            echo "\"/>
\t\t\t\t";
                        } else {
                            // line 24
                            echo "\t\t\t\t\t";
                            if ((((isset($context["counter"]) ? $context["counter"] : null) == 0) && ((isset($context["counter_quote"]) ? $context["counter_quote"] : null) == 0))) {
                                // line 25
                                echo "\t\t\t\t\t\t<input type=\"radio\" class=\"shipping_method\" name=\"shipping_method\" value=\"";
                                echo $this->getAttribute($context["quote"], "code", array(), "array");
                                echo "\" title=\"";
                                echo $this->getAttribute($context["quote"], "title", array(), "array");
                                echo "\" checked=\"checked\" id=\"shipping_check_";
                                echo $this->getAttribute($context["quote"], "code", array(), "array");
                                echo "\"/>
\t\t\t\t\t";
                            } else {
                                // line 27
                                echo "\t\t\t\t\t\t<input type=\"radio\" class=\"shipping_method\" name=\"shipping_method\" value=\"";
                                echo $this->getAttribute($context["quote"], "code", array(), "array");
                                echo "\" title=\"";
                                echo $this->getAttribute($context["quote"], "title", array(), "array");
                                echo "\" id=\"shipping_check_";
                                echo $this->getAttribute($context["quote"], "code", array(), "array");
                                echo "\"/>
\t\t\t\t\t";
                            }
                            // line 29
                            echo "\t\t\t\t";
                        }
                        // line 30
                        echo "\t\t\t\t<div class=\"tk_shipping_method_txt_box\">
\t\t\t\t\t<span class=\"";
                        // line 31
                        echo twig_replace_filter($this->getAttribute($context["quote"], "code", array(), "array"), array("." => "_"));
                        echo " ";
                        if ($this->getAttribute($context["quote"], "name", array(), "array", true, true)) {
                            echo "tk_next_";
                            echo $this->getAttribute($context["quote"], "name", array(), "array");
                        }
                        echo "  ";
                        echo $context["key"];
                        echo " tk_shipping_method_icon \"></span><span class=\"tk_shipping_method_title\">";
                        echo $this->getAttribute($context["quote"], "title", array(), "array");
                        if ($this->getAttribute($context["quote"], "description", array(), "array")) {
                            // line 32
                            echo "\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t<small>";
                            // line 33
                            echo $this->getAttribute($context["quote"], "description", array(), "array");
                            echo "</small>";
                        }
                        echo "</span>
\t\t\t\t\t<span class=\"tk_shipping_method_price\">";
                        // line 34
                        echo $this->getAttribute($context["quote"], "text", array(), "array");
                        echo "</span>
\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t</div>
\t\t\t</label>
\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t";
                        // line 40
                        $context["counter_quote"] = ((isset($context["counter_quote"]) ? $context["counter_quote"] : null) + 1);
                        echo "\t\t\t\t\t\t\t\t\t
\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['quote'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 41
                    echo " 
\t";
                } else {
                    // line 42
                    echo " 
\t<div class=\"tk_alert\">";
                    // line 43
                    echo $this->getAttribute($context["shipping_method"], "error", array(), "array");
                    echo "</div>
\t";
                }
                // line 44
                echo "\t
\t";
                // line 45
                $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : null) + 1);
                echo "\t
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['shipping_method'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "\t\t
</div>
";
        }
        // line 48
        echo " 
<div class=\"tk_clear\"></div>
<script> 
\t\$(document).ready(function() { 
\t\t\tgetPaymentDisplay();
\t\t});
</script>";
    }

    public function getTemplateName()
    {
        return "default/template/tk_checkout/shipping_method_payment.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 48,  177 => 46,  169 => 45,  166 => 44,  161 => 43,  158 => 42,  154 => 41,  146 => 40,  137 => 34,  131 => 33,  128 => 32,  116 => 31,  113 => 30,  110 => 29,  100 => 27,  90 => 25,  87 => 24,  77 => 22,  75 => 21,  69 => 20,  65 => 18,  61 => 17,  57 => 16,  53 => 15,  50 => 14,  46 => 13,  42 => 12,  37 => 10,  33 => 8,  23 => 2,  19 => 1,);
    }
}
/* {% if (shipping_error_warning) %} */
/* <div class="tk_alert_stay"> {{ shipping_error_warning }}</div>*/
/* <script> */
/* 	$(document).ready(function() { */
/* 			$('#tk_button_confirm').prop('disabled', false);*/
/* 		});*/
/* </script>*/
/* {% endif %} */
/* 						*/
/* {% if (shipping_methods) %} */
/* <div class="tk_shipping_methods">*/
/* 	{% set counter = 0 %} */
/* 	{% for key,shipping_method in shipping_methods %}*/
/* 										*/
/* 	{% if (not shipping_method['error']) %} */
/* 	{% set counter_quote = 0 %} */
/* 	{% for quote in shipping_method['quote'] %}*/
/* 		*/
/* 		<div class="tk_shipping_method">*/
/* 			<label for="shipping_check_{{ quote['code'] }}" class="{{ quote['code']|replace({ ".": "_" }) }}">*/
/* 				{% if (shipping_method_code['code'] is defined and quote['code'] == shipping_method_code['code']) %}*/
/* 					<input type="radio" name="shipping_method" value="{{ quote['code'] }}" title="{{ quote['title'] }}" checked="checked" id="shipping_check_{{ quote['code'] }}"/>*/
/* 				{% else %}*/
/* 					{% if (counter == 0 and counter_quote == 0) %}*/
/* 						<input type="radio" class="shipping_method" name="shipping_method" value="{{ quote['code'] }}" title="{{ quote['title'] }}" checked="checked" id="shipping_check_{{ quote['code'] }}"/>*/
/* 					{% else %}*/
/* 						<input type="radio" class="shipping_method" name="shipping_method" value="{{ quote['code'] }}" title="{{ quote['title'] }}" id="shipping_check_{{ quote['code'] }}"/>*/
/* 					{% endif %}*/
/* 				{% endif %}*/
/* 				<div class="tk_shipping_method_txt_box">*/
/* 					<span class="{{ quote['code']|replace({ ".": "_" }) }} {% if quote['name'] is defined %}tk_next_{{ quote['name']}}{% endif %}  {{ key }} tk_shipping_method_icon "></span><span class="tk_shipping_method_title">{{ quote['title'] }}{% if quote['description'] %}*/
/* 							<br>*/
/* 							<small>{{ quote['description'] }}</small>{% endif %}</span>*/
/* 					<span class="tk_shipping_method_price">{{ quote['text'] }}</span>*/
/* 					<div class="tk_clear"></div>*/
/* 				</div>*/
/* 			</label>*/
/* 		</div>*/
/* 										*/
/* 	{% set counter_quote = counter_quote + 1 %}									*/
/* 	{% endfor %} */
/* 	{% else %} */
/* 	<div class="tk_alert">{{ shipping_method['error'] }}</div>*/
/* 	{% endif %}	*/
/* 	{% set counter = counter + 1 %}	*/
/* 	{% endfor %}		*/
/* </div>*/
/* {% endif %} */
/* <div class="tk_clear"></div>*/
/* <script> */
/* 	$(document).ready(function() { */
/* 			getPaymentDisplay();*/
/* 		});*/
/* </script>*/
