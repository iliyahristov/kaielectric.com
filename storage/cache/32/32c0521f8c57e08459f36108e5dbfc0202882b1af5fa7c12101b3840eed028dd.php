<?php

/* default/template/tk_checkout/address.twig */
class __TwigTemplate_526c72f4ac22b5686af3431c1b0365db7b95250a2d5e78c19e3356cb798c1973 extends Twig_Template
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
        echo "<div id=\"tk_adress\">
\t<div class=\"tk_panel\">
\t\t<div class=\"tk_panel_heading\">
\t\t\t<span class=\"tk_panel_icon\"><span class=\"tk_icon-address\"></span></span> 
\t\t\t<span class=\"tk_panel_text\"> ";
        // line 5
        echo (isset($context["text_address"]) ? $context["text_address"] : null);
        echo "</span> 
\t\t\t<span class=\"tk_all_spin\"><i class=\"tk_icon-spin rotating\"></i></span>
\t\t</div>\t\t\t\t
\t
\t\t<div class=\"tk_panel_body\">
\t\t\t<div id=\"tk_adresses\">
\t\t\t
\t\t\t\t<input type=\"hidden\" id=\"shipping_to\" name=\"shipping_to\" value=\"address\" />
\t\t\t\t<input type=\"hidden\" id=\"shipping_type\" name=\"shipping_type\" value=\"root\" />
\t\t\t\t<input type=\"hidden\" id=\"address\" name=\"address\" value=\"\" />

\t\t\t\t";
        // line 16
        if ((isset($context["addresses"]) ? $context["addresses"] : null)) {
            echo " 
\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"base_address_type\" value=\"existing\" checked=\"checked\" onclick=\"jQuery('#address_new').hide();jQuery('#tk_address_existing').show();\" ";
            // line 19
            if ((array_key_exists("base_address_type", $context) && ((isset($context["base_address_type"]) ? $context["base_address_type"] : null) == "existing"))) {
                echo "checked=\"\"";
            }
            echo " />
\t\t\t\t\t\t";
            // line 20
            echo (isset($context["text_address_existing"]) ? $context["text_address_existing"] : null);
            echo " 
\t\t\t\t\t</label>
\t\t\t\t</div>
\t\t\t\t<div id=\"tk_address_existing\">
\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t<select name=\"payment_address_id\" class=\"form-control\">
\t\t\t\t\t\t\t";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["addresses"]) ? $context["addresses"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["address"]) {
                echo " 
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<option value=\"";
                // line 28
                echo $this->getAttribute($context["address"], "address_id", array(), "array");
                echo "\" ";
                if ((array_key_exists("payment_address_id", $context) && ($this->getAttribute($context["address"], "address_id", array(), "array") == (isset($context["payment_address_id"]) ? $context["payment_address_id"] : null)))) {
                    echo "selected=\"selected\"";
                }
                echo ">";
                echo $this->getAttribute($context["address"], "zone", array(), "array");
                echo ", ";
                echo $this->getAttribute($context["address"], "city", array(), "array");
                echo ", ";
                echo $this->getAttribute($context["address"], "address_1", array(), "array");
                echo "</option>
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['address'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo " 
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>\t
\t\t\t\t</div>\t 
\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"base_address_type\" value=\"new\" ";
            // line 35
            if ((array_key_exists("base_address_type", $context) && ((isset($context["base_address_type"]) ? $context["base_address_type"] : null) == "new"))) {
                echo "checked=\"\"";
            }
            echo " onclick=\"jQuery('#address_new').show();jQuery('#tk_address_existing').hide();\"/>
\t\t\t\t\t\t";
            // line 36
            echo (isset($context["text_address_new"]) ? $context["text_address_new"] : null);
            echo " 
\t\t\t\t\t</label>
\t\t\t\t</div>
\t\t\t\t";
        }
        // line 39
        echo " 
\t\t\t\t\t\t
\t\t\t\t<div id=\"address_new\" ";
        // line 41
        if (( !(isset($context["addresses"]) ? $context["addresses"] : null) || (array_key_exists("base_address_type", $context) && ((isset($context["base_address_type"]) ? $context["base_address_type"] : null) == "new")))) {
            echo " style=\"display:block\"";
        } else {
            echo "style=\"display:none\"";
        }
        echo ">
\t
\t\t\t\t\t<input type=\"hidden\" name=\"default\" value=\"1\" />
\t\t\t\t\t
\t\t\t\t\t";
        // line 45
        if (((isset($context["module_tk_checkout_zone"]) ? $context["module_tk_checkout_zone"] : null) == 0)) {
            echo " 
\t\t\t\t\t<input type=\"hidden\" name=\"zone_id\" value=\"";
            // line 46
            echo (isset($context["zone_id"]) ? $context["zone_id"] : null);
            echo "\" />
\t\t\t\t\t";
        } elseif ((        // line 47
(isset($context["module_tk_checkout_zone"]) ? $context["module_tk_checkout_zone"] : null) == 2)) {
            echo " 
\t\t\t\t\t<div class=\"tk_12_column tk_center_column tk_address_zone_id tk_required_box\" id=\"tk_address_zone_id\">
\t\t\t\t\t\t<select name=\"zone_id\" id=\"input-payment-zone\" class=\"form-control\">
\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 50
            echo (isset($context["entry_zone"]) ? $context["entry_zone"] : null);
            echo "</option>
\t\t\t\t\t\t\t";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["zone"]) ? $context["zone"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["zona"]) {
                echo " 
\t\t\t\t\t\t\t<option value=\"";
                // line 52
                echo $this->getAttribute($context["zona"], "zone_id", array(), "array");
                echo "\" ";
                if (((isset($context["zone_id"]) ? $context["zone_id"] : null) == $this->getAttribute($context["zona"], "zone_id", array(), "array"))) {
                    echo " selected=\"\"";
                }
                echo ">";
                echo $this->getAttribute($context["zona"], "name", array(), "array");
                echo "</option>
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['zona'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo " 
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 56
        echo " 
\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t 
\t\t\t\t\t<div class=\"tk_8_column tk_center_column tk_address_city tk_required_box\" id=\"tk_address_city\">
\t\t\t\t\t\t<input type=\"text\" name=\"city\" value=\"";
        // line 60
        if (array_key_exists("city", $context)) {
            echo (isset($context["city"]) ? $context["city"] : null);
        }
        echo "\" placeholder=\"";
        echo (isset($context["entry_city"]) ? $context["entry_city"] : null);
        echo "\" id=\"city\" class=\"form-control\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 61
        echo (isset($context["entry_city"]) ? $context["entry_city"] : null);
        echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_4_column tk_center_column tk_address_postcode ";
        // line 64
        if ((array_key_exists("postcode_required", $context) && ((isset($context["postcode_required"]) ? $context["postcode_required"] : null) > 0))) {
            echo "tk_required_box";
        }
        echo "\" id=\"tk_address_postcode\">
\t\t\t\t\t\t<input type=\"text\" name=\"postcode\" value=\"";
        // line 65
        if (array_key_exists("postcode", $context)) {
            echo (isset($context["postcode"]) ? $context["postcode"] : null);
        }
        echo "\" placeholder=\"";
        echo (isset($context["entry_postcode"]) ? $context["entry_postcode"] : null);
        echo "\" id=\"postcode\" class=\"form-control\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 66
        echo (isset($context["entry_postcode"]) ? $context["entry_postcode"] : null);
        echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t<div class=\"tk_12_column tk_center_column tk_address_address_1\" id=\"tk_address_address_1\">
\t\t\t\t\t\t<input type=\"text\" name=\"address_1\" value=\"";
        // line 71
        if (array_key_exists("address_1", $context)) {
            echo (isset($context["address_1"]) ? $context["address_1"] : null);
        }
        echo "\" placeholder=\"";
        echo (isset($context["entry_address_1"]) ? $context["entry_address_1"] : null);
        echo "\" id=\"input-payment-address-1\" class=\"form-control\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 72
        echo (isset($context["entry_address_1"]) ? $context["entry_address_1"] : null);
        echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t</div>

\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t";
        // line 78
        if ((isset($context["error_address"]) ? $context["error_address"] : null)) {
            echo " 
\t\t\t\t<span class=\"text-danger\">";
            // line 79
            echo (isset($context["error_address"]) ? $context["error_address"] : null);
            echo "</span>
\t\t\t\t";
        }
        // line 80
        echo " 

\t\t\t</div>\t
\t\t\t<div class=\"clearfix\"></div>
\t
\t\t</div> 
\t</div>
</div>

<script>
\t
\t\$('#tk_adress input').change(function() { saveData(); } );
\t\$('#tk_adress select').change(function() { saveData(); } );
\t\$('#tk_adress textarea').change(function() { saveData(); } );
\t
\$(document).ready(function() { 
\t\tgetPaymentMethod();
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "default/template/tk_checkout/address.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  233 => 80,  228 => 79,  224 => 78,  215 => 72,  207 => 71,  199 => 66,  191 => 65,  185 => 64,  179 => 61,  171 => 60,  165 => 56,  159 => 53,  145 => 52,  139 => 51,  135 => 50,  129 => 47,  125 => 46,  121 => 45,  110 => 41,  106 => 39,  99 => 36,  93 => 35,  85 => 29,  67 => 28,  60 => 26,  51 => 20,  45 => 19,  39 => 16,  25 => 5,  19 => 1,);
    }
}
/* <div id="tk_adress">*/
/* 	<div class="tk_panel">*/
/* 		<div class="tk_panel_heading">*/
/* 			<span class="tk_panel_icon"><span class="tk_icon-address"></span></span> */
/* 			<span class="tk_panel_text"> {{ text_address }}</span> */
/* 			<span class="tk_all_spin"><i class="tk_icon-spin rotating"></i></span>*/
/* 		</div>				*/
/* 	*/
/* 		<div class="tk_panel_body">*/
/* 			<div id="tk_adresses">*/
/* 			*/
/* 				<input type="hidden" id="shipping_to" name="shipping_to" value="address" />*/
/* 				<input type="hidden" id="shipping_type" name="shipping_type" value="root" />*/
/* 				<input type="hidden" id="address" name="address" value="" />*/
/* */
/* 				{% if (addresses) %} */
/* 				<div class="tk_12_column tk_center_column">*/
/* 					<label>*/
/* 						<input type="radio" name="base_address_type" value="existing" checked="checked" onclick="jQuery('#address_new').hide();jQuery('#tk_address_existing').show();" {% if (base_address_type is defined and base_address_type == 'existing') %}checked=""{% endif %} />*/
/* 						{{ text_address_existing }} */
/* 					</label>*/
/* 				</div>*/
/* 				<div id="tk_address_existing">*/
/* 					<div class="tk_12_column tk_center_column">*/
/* 						<select name="payment_address_id" class="form-control">*/
/* 							{% for address in addresses %} */
/* 								*/
/* 							<option value="{{ address['address_id'] }}" {% if (payment_address_id is defined and address['address_id'] == payment_address_id) %}selected="selected"{% endif %}>{{ address['zone'] }}, {{ address['city'] }}, {{ address['address_1'] }}</option>*/
/* 							{% endfor %} */
/* 						</select>*/
/* 					</div>	*/
/* 				</div>	 */
/* 				<div class="tk_12_column tk_center_column">*/
/* 					<label>*/
/* 						<input type="radio" name="base_address_type" value="new" {% if (base_address_type is defined and base_address_type == 'new') %}checked=""{% endif %} onclick="jQuery('#address_new').show();jQuery('#tk_address_existing').hide();"/>*/
/* 						{{ text_address_new }} */
/* 					</label>*/
/* 				</div>*/
/* 				{% endif %} */
/* 						*/
/* 				<div id="address_new" {% if (not addresses or (base_address_type is defined and base_address_type == 'new')) %} style="display:block"{% else %}style="display:none"{% endif %}>*/
/* 	*/
/* 					<input type="hidden" name="default" value="1" />*/
/* 					*/
/* 					{% if module_tk_checkout_zone == 0 %} */
/* 					<input type="hidden" name="zone_id" value="{{ zone_id }}" />*/
/* 					{% elseif module_tk_checkout_zone == 2 %} */
/* 					<div class="tk_12_column tk_center_column tk_address_zone_id tk_required_box" id="tk_address_zone_id">*/
/* 						<select name="zone_id" id="input-payment-zone" class="form-control">*/
/* 							<option value="0" selected="selected">{{entry_zone }}</option>*/
/* 							{% for zona in zone %} */
/* 							<option value="{{ zona['zone_id'] }}" {% if (zone_id == zona['zone_id']) %} selected=""{% endif %}>{{ zona['name'] }}</option>*/
/* 							{% endfor %} */
/* 						</select>*/
/* 					</div>*/
/* 					{% endif %} */
/* 					<div class="tk_clear"></div>*/
/* 						 */
/* 					<div class="tk_8_column tk_center_column tk_address_city tk_required_box" id="tk_address_city">*/
/* 						<input type="text" name="city" value="{% if (city is defined) %}{{ city }}{% endif %}" placeholder="{{entry_city }}" id="city" class="form-control" />*/
/* 						<span class="tk_floating_label">{{entry_city }}</span>*/
/* 					</div>*/
/* 					*/
/* 					<div class="tk_4_column tk_center_column tk_address_postcode {% if (postcode_required is defined and postcode_required > 0) %}tk_required_box{% endif %}" id="tk_address_postcode">*/
/* 						<input type="text" name="postcode" value="{% if (postcode is defined) %}{{ postcode }}{% endif %}" placeholder="{{entry_postcode }}" id="postcode" class="form-control" />*/
/* 						<span class="tk_floating_label">{{entry_postcode }}</span>*/
/* 					</div>*/
/* 					*/
/* 					<div class="tk_clear"></div>*/
/* 					<div class="tk_12_column tk_center_column tk_address_address_1" id="tk_address_address_1">*/
/* 						<input type="text" name="address_1" value="{% if (address_1 is defined) %}{{ address_1 }}{% endif %}" placeholder="{{entry_address_1 }}" id="input-payment-address-1" class="form-control" />*/
/* 						<span class="tk_floating_label">{{entry_address_1 }}</span>*/
/* 					</div>*/
/* 					*/
/* 				</div>*/
/* */
/* 				<div class="clearfix"></div>*/
/* 				{% if (error_address) %} */
/* 				<span class="text-danger">{{ error_address }}</span>*/
/* 				{% endif %} */
/* */
/* 			</div>	*/
/* 			<div class="clearfix"></div>*/
/* 	*/
/* 		</div> */
/* 	</div>*/
/* </div>*/
/* */
/* <script>*/
/* 	*/
/* 	$('#tk_adress input').change(function() { saveData(); } );*/
/* 	$('#tk_adress select').change(function() { saveData(); } );*/
/* 	$('#tk_adress textarea').change(function() { saveData(); } );*/
/* 	*/
/* $(document).ready(function() { */
/* 		getPaymentMethod();*/
/* 	});*/
/* </script>*/
