<?php

/* default/template/tk_checkout/speedy_address.twig */
class __TwigTemplate_f90aa2c71f3e7a9d4418486b32bf7a9556b920a2bac4edf88d7be7190b6fff5a extends Twig_Template
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
        echo "<div id=\"tk_speedy_office\">
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
\t\t\t<div id=\"tk_speedy_offices\">

\t\t\t\t<input type=\"hidden\" id=\"shipping_to\" name=\"shipping_to\" value=\"address\" />
\t\t\t\t<input type=\"hidden\" id=\"shipping_type\" name=\"shipping_type\" value=\"speedy\" />
\t\t\t\t
\t\t\t\t";
        // line 15
        if (( !array_key_exists("module_tk_checkout_zone", $context) || ((isset($context["module_tk_checkout_zone"]) ? $context["module_tk_checkout_zone"] : null) == 0))) {
            echo " 
\t\t\t\t<input type=\"hidden\" id=\"zone_id\" name=\"zone_id\" value=\"";
            // line 16
            echo (isset($context["zone_id"]) ? $context["zone_id"] : null);
            echo "\" />
\t\t\t\t";
        }
        // line 17
        echo " 

\t\t\t\t";
        // line 19
        if ((isset($context["speedy_addresses_customer"]) ? $context["speedy_addresses_customer"] : null)) {
            echo " 
\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"speedy_address_type\" value=\"existing\" checked=\"checked\" ";
            // line 22
            if ((array_key_exists("speedy_address_type", $context) && ((isset($context["speedy_address_type"]) ? $context["speedy_address_type"] : null) == "existing"))) {
                echo "checked=\"\"";
            }
            echo " onclick=\"jQuery('#speedy_address_new').hide();jQuery('#tk_speedy_address_existing').show();\" />
\t\t\t\t\t\t";
            // line 23
            echo (isset($context["text_address_existing"]) ? $context["text_address_existing"] : null);
            echo " 
\t\t\t\t\t</label>
\t\t\t\t</div>
\t\t\t\t<div id=\"tk_speedy_address_existing\">
\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t<select name=\"speedy_address_customer_id\" >
\t\t\t\t\t\t\t";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["speedy_addresses_customer"]) ? $context["speedy_addresses_customer"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["speedy_address"]) {
                echo " 
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<option value=\"";
                // line 31
                echo $this->getAttribute($context["speedy_address"], "speedy_customer_id", array(), "array");
                echo "\" ";
                if ((array_key_exists("speedy_address_customer_id", $context) && ($this->getAttribute($context["speedy_address"], "speedy_customer_id", array(), "array") == (isset($context["speedy_address_customer_id"]) ? $context["speedy_address_customer_id"] : null)))) {
                    echo "selected=\"selected\"";
                }
                echo ">";
                echo $this->getAttribute($context["speedy_address"], "city", array(), "array");
                echo ", ";
                echo $this->getAttribute($context["speedy_address"], "street", array(), "array");
                echo ", ";
                echo $this->getAttribute($context["speedy_address"], "street_num", array(), "array");
                echo "</option>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['speedy_address'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo " 
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t</div>\t 
\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"speedy_address_type\" value=\"new\" ";
            // line 39
            if ((array_key_exists("speedy_address_type", $context) && ((isset($context["speedy_address_type"]) ? $context["speedy_address_type"] : null) == "new"))) {
                echo "checked=\"\"";
            }
            echo " onclick=\"jQuery('#speedy_address_new').show();jQuery('#tk_speedy_address_existing').hide();\" />
\t\t\t\t\t\t";
            // line 40
            echo (isset($context["text_address_new"]) ? $context["text_address_new"] : null);
            echo " 
\t\t\t\t\t</label>
\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t";
        } else {
            // line 44
            echo " 
\t\t\t\t<input type=\"hidden\" name=\"speedy_address_type\" value=\"new\">
\t\t\t\t";
        }
        // line 46
        echo " 
\t\t\t
\t\t\t\t<div id=\"speedy_address_new\" ";
        // line 48
        if (( !(isset($context["speedy_addresses_customer"]) ? $context["speedy_addresses_customer"] : null) || (array_key_exists("speedy_address_type", $context) && ((isset($context["speedy_address_type"]) ? $context["speedy_address_type"] : null) == "new")))) {
            echo " style=\"display:block\"";
        } else {
            echo "style=\"display:none\"";
        }
        echo ">
\t\t\t\t\t\t\t
\t\t\t\t\t<input type=\"hidden\" name=\"default\" value=\"1\" />
\t\t\t\t\t<input type=\"hidden\" id=\"speedy_address_postcode\" name=\"speedy_address_postcode\" value=\"";
        // line 51
        echo (isset($context["speedy_address_postcode"]) ? $context["speedy_address_postcode"] : null);
        echo "\" />
\t\t\t\t\t<input type=\"hidden\" id=\"speedy_address_city\" name=\"speedy_address_city\" value=\"";
        // line 52
        echo (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null);
        echo "\" />
\t\t\t\t\t<input type=\"hidden\" id=\"speedy_address_city_id\" name=\"speedy_address_city_id\" value=\"";
        // line 53
        echo (isset($context["speedy_address_city_id"]) ? $context["speedy_address_city_id"] : null);
        echo "\" />
\t\t\t\t\t\t
\t\t\t\t\t";
        // line 55
        if (((array_key_exists("iso_code_2", $context) && ((isset($context["iso_code_2"]) ? $context["iso_code_2"] : null) == "BG")) ||  !array_key_exists("iso_code_2", $context))) {
            echo " 
\t\t\t\t\t<input type=\"hidden\" id=\"speedy_quarter_id\" name=\"speedy_quarter_id\" value=\"";
            // line 56
            echo (isset($context["speedy_quarter_id"]) ? $context["speedy_quarter_id"] : null);
            echo "\" />
\t\t\t\t\t<input type=\"hidden\" id=\"speedy_quarter\" name=\"speedy_quarter\" value=\"";
            // line 57
            echo (isset($context["speedy_quarter"]) ? $context["speedy_quarter"] : null);
            echo "\" />
\t\t\t\t\t";
        }
        // line 58
        echo " 
\t\t\t\t\t\t
\t\t\t\t\t<input type=\"hidden\" id=\"speedy_street_id\" name=\"speedy_street_id\" value=\"";
        // line 60
        echo (isset($context["speedy_street_id"]) ? $context["speedy_street_id"] : null);
        echo "\" />
\t\t\t\t\t<input type=\"hidden\" id=\"speedy_street\" name=\"speedy_street\" value=\"";
        // line 61
        echo (isset($context["speedy_street"]) ? $context["speedy_street"] : null);
        echo "\" />
\t\t\t\t\t\t 
\t\t\t\t\t<div class=\"tk_12_column tk_center_column tk_speedy_address_city_select tk_required_box ";
        // line 63
        if ((isset($context["speedy_address_city_id"]) ? $context["speedy_address_city_id"] : null)) {
            echo " tk_redy_box";
        }
        echo "\" id=\"tk_speedy_address_city_select\">
\t\t\t\t\t\t<input type=\"text\" id=\"speedy_address_city_select\" readonly=\"true\" name=\"speedy_address_city_select\" value=\"";
        // line 64
        if ((isset($context["speedy_address_postcode"]) ? $context["speedy_address_postcode"] : null)) {
            echo (((isset($context["speedy_address_postcode"]) ? $context["speedy_address_postcode"] : null) . " ") . (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null));
        }
        echo "\" placeholder=\"";
        echo (isset($context["text_speedy_office_city"]) ? $context["text_speedy_office_city"] : null);
        echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 65
        echo (isset($context["text_speedy_office_city"]) ? $context["text_speedy_office_city"] : null);
        echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t
\t\t\t\t\t";
        // line 70
        if (((array_key_exists("iso_code_2", $context) && ((isset($context["iso_code_2"]) ? $context["iso_code_2"] : null) == "BG")) ||  !array_key_exists("iso_code_2", $context))) {
            echo " 
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_6_column tk_center_column tk_speedy_quarter_select ";
            // line 73
            if ((((twig_length_filter($this->env, (isset($context["speedy_quarters"]) ? $context["speedy_quarters"] : null)) < 1) || (isset($context["speedy_quarter"]) ? $context["speedy_quarter"] : null)) && (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null))) {
                echo " tk_redy_box";
            }
            echo "\" id=\"tk_speedy_quarter_select\" ";
            if ((((isset($context["speedy_street"]) ? $context["speedy_street"] : null) == "Център") && (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null))) {
                echo "style=\"display:none\"";
            }
            echo " >
\t\t\t\t\t\t\t
\t\t\t\t\t\t<input type=\"text\" id=\"speedy_quarter_select\" readonly=\"true\" name=\"speedy_quarter_select\" value=\"";
            // line 75
            echo (isset($context["speedy_quarter"]) ? $context["speedy_quarter"] : null);
            echo "\" placeholder=\"";
            echo (isset($context["entry_quarter"]) ? $context["entry_quarter"] : null);
            echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 76
            echo (isset($context["entry_quarter"]) ? $context["entry_quarter"] : null);
            echo "</span>
\t
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_1_column tk_center_column \" id=\"tk_speedy_block_no\" ";
            // line 80
            if ((((isset($context["speedy_street"]) ? $context["speedy_street"] : null) == "Център") && (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null))) {
                echo "style=\"display:none\"";
            }
            echo ">
\t\t\t\t\t\t<input type=\"text\" id=\"speedy_block_no\" name=\"speedy_block_no\" value=\"";
            // line 81
            echo (isset($context["speedy_block_no"]) ? $context["speedy_block_no"] : null);
            echo "\" placeholder=\"";
            echo (isset($context["entry_block_no"]) ? $context["entry_block_no"] : null);
            echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 82
            echo (isset($context["entry_block_no"]) ? $context["entry_block_no"] : null);
            echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_1_column tk_center_column \" id=\"tk_speedy_entrance_no\" ";
            // line 85
            if ((((isset($context["speedy_street"]) ? $context["speedy_street"] : null) == "Център") && (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null))) {
                echo "style=\"display:none\"";
            }
            echo ">
\t\t\t\t\t\t<input type=\"text\" id=\"speedy_entrance_no\" name=\"speedy_entrance_no\" value=\"";
            // line 86
            echo (isset($context["speedy_entrance_no"]) ? $context["speedy_entrance_no"] : null);
            echo "\" placeholder=\"";
            echo (isset($context["entry_entrance_no"]) ? $context["entry_entrance_no"] : null);
            echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 87
            echo (isset($context["entry_entrance_no"]) ? $context["entry_entrance_no"] : null);
            echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_1_column tk_center_column \" id=\"tk_speedy_floor_no\" ";
            // line 90
            if ((((isset($context["speedy_street"]) ? $context["speedy_street"] : null) == "Център") && (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null))) {
                echo "style=\"display:none\"";
            }
            echo ">
\t\t\t\t\t\t<input type=\"text\" id=\"speedy_floor_no\" name=\"speedy_floor_no\" value=\"";
            // line 91
            echo (isset($context["speedy_floor_no"]) ? $context["speedy_floor_no"] : null);
            echo "\" placeholder=\"";
            echo (isset($context["entry_floor_no"]) ? $context["entry_floor_no"] : null);
            echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 92
            echo (isset($context["entry_floor_no"]) ? $context["entry_floor_no"] : null);
            echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_1_column tk_center_column \" id=\"tk_speedy_apartment_no\" ";
            // line 95
            if ((((isset($context["speedy_street"]) ? $context["speedy_street"] : null) == "Център") && (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null))) {
                echo "style=\"display:none\"";
            }
            echo ">
\t\t\t\t\t\t<input type=\"text\" id=\"speedy_apartment_no\" name=\"speedy_apartment_no\" value=\"";
            // line 96
            echo (isset($context["speedy_apartment_no"]) ? $context["speedy_apartment_no"] : null);
            echo "\" placeholder=\"";
            echo (isset($context["entry_apartment_no"]) ? $context["entry_apartment_no"] : null);
            echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 97
            echo (isset($context["entry_apartment_no"]) ? $context["entry_apartment_no"] : null);
            echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 99
        echo " 

\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t
\t\t\t\t\t";
        // line 103
        if ((array_key_exists("iso_code_2", $context) && ((isset($context["iso_code_2"]) ? $context["iso_code_2"] : null) == "GR"))) {
            echo " 
\t\t\t\t\t<div class=\"tk_12_column tk_center_column tk_speedy_street_select ";
            // line 104
            if ((((twig_length_filter($this->env, (isset($context["speedy_streets"]) ? $context["speedy_streets"] : null)) < 1) || (isset($context["speedy_street"]) ? $context["speedy_street"] : null)) && (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null))) {
                echo " tk_redy_box";
            }
            echo "\" id=\"tk_speedy_street_select\">
\t\t\t\t\t\t<input type=\"text\" id=\"speedy_street_select\" readonly=\"true\" name=\"speedy_street_select\" value=\"";
            // line 105
            echo (isset($context["speedy_street"]) ? $context["speedy_street"] : null);
            echo "\" placeholder=\"";
            echo (isset($context["entry_street"]) ? $context["entry_street"] : null);
            echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 106
            echo (isset($context["entry_street"]) ? $context["entry_street"] : null);
            echo "</span>
\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t";
        } else {
            // line 109
            echo " 
\t\t\t\t\t<div class=\"tk_8_column tk_center_column tk_speedy_street_select ";
            // line 110
            if ((((twig_length_filter($this->env, (isset($context["speedy_streets"]) ? $context["speedy_streets"] : null)) < 1) || (isset($context["speedy_street"]) ? $context["speedy_street"] : null)) && (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null))) {
                echo " tk_redy_box";
            }
            echo "\" id=\"tk_speedy_street_select\" ";
            if ((((isset($context["speedy_street"]) ? $context["speedy_street"] : null) == "Център") && (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null))) {
                echo "style=\"display:none\"";
            }
            echo ">
\t\t\t\t\t\t<input type=\"text\" id=\"speedy_street_select\" readonly=\"true\" name=\"speedy_street_select\" value=\"";
            // line 111
            echo (isset($context["speedy_street"]) ? $context["speedy_street"] : null);
            echo "\" placeholder=\"";
            echo (isset($context["entry_street"]) ? $context["entry_street"] : null);
            echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 112
            echo (isset($context["entry_street"]) ? $context["entry_street"] : null);
            echo "</span>
\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_4_column tk_center_column \" id=\"tk_speedy_street_num\" ";
            // line 116
            if ((((isset($context["speedy_street"]) ? $context["speedy_street"] : null) == "Център") && (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null))) {
                echo "style=\"display:none\"";
            }
            echo ">
\t\t\t\t\t\t<input type=\"text\" id=\"speedy_street_num\" name=\"speedy_street_num\" value=\"";
            // line 117
            echo (isset($context["speedy_street_num"]) ? $context["speedy_street_num"] : null);
            echo "\" placeholder=\"";
            echo (isset($context["entry_street_num"]) ? $context["entry_street_num"] : null);
            echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 118
            echo (isset($context["entry_street_num"]) ? $context["entry_street_num"] : null);
            echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t";
        }
        // line 122
        echo " 
\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_12_column tk_center_column \" id=\"tk_speedy_other\">
\t\t\t\t\t\t<input type=\"text\" id=\"speedy_other\" name=\"speedy_other\" value=\"";
        // line 127
        echo (isset($context["speedy_other"]) ? $context["speedy_other"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_other"]) ? $context["entry_other"] : null);
        echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 128
        echo (isset($context["entry_other"]) ? $context["entry_other"] : null);
        echo "</span>
\t\t\t\t\t\t
\t\t\t\t\t\t<div id=\"tk_speedy_no_street\" ";
        // line 130
        if ((((isset($context["speedy_street"]) ? $context["speedy_street"] : null) == "Център") && (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null))) {
            echo "style=\"display:block\"";
        } else {
            echo "style=\"display: none\"";
        }
        echo "><hr> <span class=\"tk_text_free_shipping\">";
        echo (isset($context["text_no_street"]) ? $context["text_no_street"] : null);
        echo "</span></div>
\t\t\t\t\t\t<div id=\"tk_speedy_help_address\" ";
        // line 131
        if ((((isset($context["speedy_street"]) ? $context["speedy_street"] : null) == "Център") && (isset($context["speedy_address_city"]) ? $context["speedy_address_city"] : null))) {
            echo "style=\"display:none\"";
        } else {
            echo "style=\"display: block\"";
        }
        echo "><hr> <span class=\"tk_text_free_shipping\">";
        echo (isset($context["text_help_address"]) ? $context["text_help_address"] : null);
        echo "</span></div>

\t\t\t\t\t</div>
\t
\t\t\t\t</div>

\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t";
        // line 138
        if ((isset($context["error_address"]) ? $context["error_address"] : null)) {
            echo " 
\t\t\t\t<span class=\"tk_alert\">";
            // line 139
            echo (isset($context["error_address"]) ? $context["error_address"] : null);
            echo "</span>
\t\t\t\t";
        }
        // line 140
        echo " 
 \t
\t\t\t</div>\t
\t\t\t<div class=\"tk_clear\"></div>
\t
\t\t</div> 
\t</div>
</div>

<div class=\"speedy_city_container radio_container mfp-hide\" id=\"speedy_city_locator\">
\t<div class=\"radio_search\">
\t\t<span class=\"speedy_city_spin pull-right magnific_spin\"></span>
\t\t<input id=\"speedy_city_search\" name=\"speedy_city_search\" type=\"text\" placeholder=\"Търсене..\" class=\"radio_box_search\">
\t</div>
\t<div class=\"radio_box\" id=\"speedy_city_locator_radio_box\">
\t\t<span class=\"radio_box_top\"></span>
\t\t<div class=\"radio_box_html\"></div>
\t\t<span class=\"last_element_city\"></span>
\t</div>
</div>

<div class=\"speedy_quarter_container radio_container mfp-hide\" id=\"speedy_quarter_locator\">
\t<div class=\"radio_search\">
\t\t<input id=\"speedy_quarter_search\" name=\"speedy_quarter_search\" type=\"text\" placeholder=\"Търсене..\" class=\"radio_box_search\">
\t</div>
\t<div class=\"radio_box\" id=\"speedy_quarter_locator_radio_box\">
\t\t<span class=\"radio_box_top\"></span>
\t\t<div class=\"radio_box_html\"></div>
\t\t<span class=\"last_element_street\"></span>
\t</div>
</div>

<div class=\"speedy_street_container radio_container mfp-hide\" id=\"speedy_street_locator\">
\t<div class=\"radio_search\">
\t\t<span class=\"speedy_street_spin pull-right magnific_spin\"></span>
\t\t<input id=\"speedy_street_search\" name=\"speedy_street_search\" type=\"text\" placeholder=\"Търсене..\" class=\" radio_box_search\">
\t</div>
\t<div class=\"radio_box\" id=\"speedy_street_locator_radio_box\">
\t\t<span class=\"radio_box_top\"></span>
\t\t<div class=\"radio_box_html\"></div>
\t\t<span class=\"last_element_street\"></span>
\t</div>
</div>

<script>
\t
\t\$(document).ready(function() { 
\t\t\tgetPaymentMethod();
\t\t});
\t
\t\$('#speedy_street_num').change(function() { saveData(); } );
\t\$('#speedy_block_no').change(function() { saveData(); } );
\t\$('#speedy_entrance_no').change(function() { saveData(); } );
\t\$('#speedy_floor_no').change(function() { saveData(); } );
\t\$('#speedy_apartment_no').change(function() { saveData(); } );
\t\$('#speedy_other').change(function() { saveData(); } );

\t//попъп за градове
\t\$(document).on('click', '#speedy_address_city_select', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$.magnificPopup.open( { 
\t\t\t\t\ttype: 'inline',
\t\t\t\t\titems: { src: '#speedy_city_locator'} 
\t\t\t\t});
\t\t\t\$('.speedy_city_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\tgetCitiesHtml();
\t\t\tsetTimeout(function () { 
\t\t\t\t\t\$('#speedy_city_search').focus();
\t\t\t\t} , 500);
 
\t\t});

\t//въвеждане на град ръчно
\t\$('#speedy_city_search').on('input',function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tgetCitiesHtml();
\t\t});


\t//добавяне на слектирания град и извикваме квартали и улици спрямо него
\t\$(document).delegate('#speedy_city_locator .radio_box input[type=\\'radio\\']', 'click', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar speedy_address_city_id = \$(this).val();
\t\t\tvar speedy_address_city = \$(this).data('name');
\t\t\tvar speedy_address_city_select = \$(this).data('select');
\t\t\t\$('#speedy_address_city_id').val(speedy_address_city_id);
\t\t\t\$('#speedy_address_city').val(speedy_address_city);
\t\t\t\$('#speedy_address_city_select').val(speedy_address_city_select);

\t\t\t\$('.tk_all_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\t\$('#tk_checkout').css('opacity','0.6');
\t\t\t\$('#tk_checkout').css('pointer-events','none');
\t\t\t\$('#tk_button_confirm').prop('disabled', true);
\t\t\t\$('.tk_speedy_address_city_select').addClass('tk_redy_box');

\t\t\tgetQuarterStreet();
\t\t\t\$.magnificPopup.close()
\t\t});

\t//попъп за квартали
\t\$(document).on('click', '#speedy_quarter_select', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$.magnificPopup.open( { 
\t\t\t\t\ttype: 'inline',
\t\t\t\t\titems: { src: '#speedy_quarter_locator'} 
\t\t\t\t});
\t\t\t\$('.speedy_quarter_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\tgetQuartersHtml();
\t\t\tsetTimeout(function () { 
\t\t\t\t\t\$('#speedy_quarter_search').focus();
\t\t\t\t} , 500);
\t\t});
\t 
\t//въвеждане на квартал ръчно
\t\$('#speedy_quarter_search').on('input',function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tgetQuartersHtml();
\t\t});


\t//добавяне на селектирания кавартал
\t\$(document).delegate('#speedy_quarter_locator .radio_box input[type=\\'radio\\']', 'click', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar speedy_quarter_id = \$(this).val();
\t\t\tvar speedy_quarter = \$(this).data('name');
\t\t\tvar speedy_quarter_type = \$(this).data('type');
\t\t\t\$('#speedy_quarter_id').val(speedy_quarter_id);
\t\t\t\$('#speedy_quarter').val(speedy_quarter);
\t\t\t\$('#speedy_quarter_select').val(speedy_quarter_type + speedy_quarter);

\t\t\t\$('.tk_speedy_quarter_select').addClass('tk_redy_box');
\t\t
\t\t\tsaveData();

\t\t\t\$.magnificPopup.close()
\t\t});

\t//попъп за улици
\t\$(document).on('click', '#speedy_street_select', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$.magnificPopup.open( { 
\t\t\t\t\ttype: 'inline',
\t\t\t\t\titems: { src: '#speedy_street_locator'} 
\t\t\t\t});
\t\t\t\$('.speedy_street_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\tgetStreetsHtml();
\t\t\tsetTimeout(function () { 
\t\t\t\t\t\$('#speedy_street_search').focus();
\t\t\t\t} , 500);
\t\t});
 
\t//въвеждане на улица ръчно
\t\$('#speedy_street_search').on('input',function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tgetStreetsHtml();
\t\t});


\t//добавяне на селектираната улица
\t\$(document).delegate('#speedy_street_locator .radio_box input[type=\\'radio\\']', 'click', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar speedy_street_id = \$(this).val();
\t\t\tvar speedy_street = \$(this).data('name');
\t\t\tvar speedy_street_type = \$(this).data('type');
\t\t\t\$('#speedy_street_id').val(speedy_street_id);
\t\t\t\$('#speedy_street').val(speedy_street_type + speedy_street);
\t\t\t\$('#speedy_street_select').val(speedy_street_type + speedy_street);

\t\t\t\$('.tk_speedy_street_select').addClass('tk_redy_box');
\t\t
\t\t\tsaveData();
\t\t\t\t 
\t\t\t\$.magnificPopup.close()
\t\t});

\t//извежда списъка с градове в попъпа - първите 10 се зареждат веднага останалите са аутокомплийт от АПИ на Спиди
\tfunction getCitiesHtml() { 
\t\tvar url = 'index.php?route=extension/shipping/tk_speedy/autocompleteCity';
\t\tvar filter_name = \$('input[name=\\'speedy_city_search\\']').val();

\t\tif (filter_name) { 
\t\t\turl += '&filter_name=' + encodeURIComponent(filter_name);
\t\t} 

\t\t\$.ajax( { 
\t\t\t\turl: url,
\t\t\t\tbeforeSend: function() { 
\t\t\t\t\t\$('.speedy_city_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\t\t} ,
\t\t\t\tsuccess: function(data) { 
\t\t\t\t\t\$('.speedy_city_spin').html('');
\t \t\t\t\t
\t\t\t\t\tif (filter_name) { 
\t\t\t\t\t\t\$('#speedy_city_locator .radio_box_html').html('');
\t\t\t\t\t} 

\t\t\t\t\thtml = '';
\t\t\t\t
\t\t\t\t\tif(data) { 
\t\t\t\t\t\t\$.map(data, function(item) { 
\t\t\t\t\t\t\t\thtml += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_speedy_city_id\" value=\"' + item['city_id'] + '\" data-name=\"' + item['name'] + '\" data-select=\"' + item['post_code'] + ' ' + item['name'] + '\"><span>' + item['post_code'] + '</span> ' + item['type'] + ' ' + item['name'] + '</label></div>';
\t\t\t\t\t\t\t});
\t\t\t\t\t} 
\t\t\t\t\t
\t\t\t\t\t\$('#speedy_city_locator .radio_box_html').append(html);

\t\t\t\t} 
\t\t\t});
\t 
\t} 

\t//извежда списъка с квартали в попъпа - първите 10 се зареждат веднага останалите са аутокомплийт от АПИ на Спиди
\tfunction getQuartersHtml() { 
\t\t\$('#speedy_quarter_locator .radio_box_html').html('');
\t\tvar url = 'index.php?route=extension/shipping/tk_speedy/autocompleteQuarter';
\t\tvar filter_name = \$('input[name=\\'speedy_quarter_search\\']').val();
\t\tvar city_id = \$('#speedy_address_city_id').val();

\t\tif (filter_name) { 
\t\t\turl += '&filter_name=' + encodeURIComponent(filter_name);
\t\t} 
\t\turl += '&city_id=' + city_id;
\t\t 
\t\t\$.ajax( { 
\t\t\t\turl: url,
\t\t\t\tbeforeSend: function() { 
\t\t\t\t\t\$('.speedy_quarter_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\t\t} ,
\t\t\t\tsuccess: function(data) { 
\t\t\t\t\t\$('.speedy_quarter_spin').html('');
\t \t\t\t\t
\t\t\t\t\tif (filter_name) { 
\t\t\t\t\t\t\$('#speedy_quarter_locator .radio_box_html').html('');
\t\t\t\t\t} 

\t\t\t\t\thtml = '';
\t\t\t\t
\t\t\t\t\tif(data) { 
\t\t\t\t\t\t\$.map(data, function(item) { 
\t\t\t\t\t\t\t\thtml += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_speedy_quarter_id\" value=\"' + item['quarter_id'] + '\" data-name=\"' + item['name'] + '\" data-type=\"' + item['type'] + '\"><span>' + item['type'] + item['name'] + '</label></div>';
\t\t\t\t\t\t\t});
\t\t\t\t\t} 
\t\t\t\t\t
\t\t\t\t\t\$('#speedy_quarter_locator .radio_box_html').append(html);
\t\t\t
\t\t\t\t} 
\t\t\t});
\t 
\t} 
\t 
\t//извежда списъка с улици в попъпа - първите 10 се зареждат веднага останалите са аутокомплийт от АПИ на Спиди
\tfunction getStreetsHtml() { 
\t\t\$('#speedy_street_locator .radio_box_html').html('');
\t\t
\t\tvar url = 'index.php?route=extension/shipping/tk_speedy/autocompleteStreet';
\t\tvar filter_name = \$('input[name=\\'speedy_street_search\\']').val();

\t\tvar city_id = \$('#speedy_address_city_id').val();

\t\tif (filter_name) { 
\t\t\turl += '&filter_name=' + encodeURIComponent(filter_name);
\t\t} 
\t\turl += '&city_id=' + city_id;
\t\t 
\t\t\$.ajax( { 
\t\t\t\turl: url,
\t\t\t\tbeforeSend: function() { 
\t\t\t\t\t\$('.speedy_street_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\t\t} ,
\t\t\t\tsuccess: function(data) { 
\t\t\t\t\t\$('.speedy_street_spin').html('');
\t \t\t\t\t
\t\t\t\t\tif (filter_name) { 
\t\t\t\t\t\t\$('#speedy_street_locator .radio_box_html').html('');
\t\t\t\t\t} 

\t\t\t\t\thtml = '';
\t\t\t\t
\t\t\t\t\tif(data) { 
\t\t\t\t\t\t\$.map(data, function(item) { 
\t\t\t\t\t\t\t\thtml += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_speedy_street_id\" value=\"' + item['street_id'] + '\" data-name=\"' + item['name'] + '\" data-type=\"' + item['type'] + '\" ><span>' + item['type'] + item['name'] + '</label></div>';
\t\t\t\t\t\t\t});
\t\t\t\t\t} 
\t\t\t\t\t
\t\t\t\t\t\$('#speedy_street_locator .radio_box_html').append(html);

\t\t\t\t} 
\t\t\t});
\t 
\t} 


\t//извежда кварталите и улиците спрямо избрания град\t
\t//извиква призчислени методи за доставка => извежда преизчислени тотали в количката
\t//ако имаме само 1 улица или 1 квартал ги селектираме
\t//ако няма улици или квартали ги изключваме\t
\tfunction getQuarterStreet() { 
\t\t\$('#speedy_city_locator .radio_box_html').html('');
\t\t\$('#speedy_quarter_id').val('');
\t\t\$('#speedy_quarter').val('');
\t\t\$('#speedy_quarter_select').val('');
\t\t\$('#speedy_street_id').val('');
\t\t\$('#speedy_street').val('');
\t\t\$('#speedy_street_select').val('');
\t\t\$('#speedy_street_num').val('');
\t\t\$('#speedy_block_no').val('');
\t\t\$('#speedy_other').val('');
\t\t\$('#speedy_address_postcode').val('');

\t\t\$('.tk_speedy_quarter_select').removeClass('tk_redy_box');
\t\t\$('.tk_speedy_street_select').removeClass('tk_redy_box');
\t\t\$('#tk_speedy_street_num').removeClass('tk_redy_box');
\t\t
\t\tcity_id = \$('#speedy_address_city_id').val();

\t\t
\t\tif(city_id > 0) { 
\t\t\t\$.ajax( { 
\t\t\t\t\turl: 'index.php?route=extension/shipping/tk_speedy/getQuartereStreet',
\t\t\t\t\ttype: 'POST',
\t\t\t\t\tdata: 'city_id=' + encodeURIComponent(city_id),
\t\t\t\t\tdataType: 'json',
\t\t\t\t\tsuccess: function(data) { 
\t\t\t\t\t\tif (data) { 
\t\t\t\t\t\t\t\$('#speedy_street_select').prop(\"disabled\", false);
\t\t\t\t\t\t\t\$('#speedy_quarter_select').prop(\"disabled\", false);
\t\t\t\t\t\t\t\$('#speedy_street_num').prop(\"disabled\", false);
\t\t\t\t\t\t
\t\t\t\t\t\t\t\$('#speedy_address_postcode').val(data.city_post_code);

\t\t\t\t\t\t\t//скрипт за квартали
\t\t\t\t\t\t\tif (data.quarters_count && data.quarters_count > 0) { 
\t\t\t\t\t\t\t\t\$('#speedy_quarter_id').prop(\"disabled\", false);
\t\t\t\t\t\t\t\t \t
\t\t\t\t\t\t\t\thtml_popup = '';
\t\t\t\t\t\t\t\tfor (i = 0; i < data.quarters.length; i++) { 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
        // line 477
        if ((array_key_exists("speedy_quarter_id", $context) && (isset($context["speedy_quarter_id"]) ? $context["speedy_quarter_id"] : null))) {
            echo " 
\t\t\t\t\t\t\t\t\tvar quarter_id = ";
            // line 478
            echo (isset($context["speedy_quarter_id"]) ? $context["speedy_quarter_id"] : null);
            echo ";
\t\t\t\t\t\t\t\t\t";
        } else {
            // line 479
            echo " 
\t\t\t\t\t\t\t\t\tvar quarter_id = 0;
\t\t\t\t\t\t\t\t\t";
        }
        // line 481
        echo " 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\tif(quarter_id == data.quarters[i]['quarter_id']) { 
\t\t\t\t\t\t\t\t\t\tvar quarter_checked = 'checked=\"\"';
\t\t\t\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\t\t\t\tvar quarter_checked = '';
\t\t\t\t\t\t\t\t\t} 

\t\t\t\t\t\t\t\t\thtml_popup += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_speedy_quarter_id\" value=\"' + data.quarters[i]['quarter_id'] + '\" ' + quarter_checked + '>' + data.quarters[i]['type'] + ' ' + data.quarters[i]['name'] + '</label></div>';
\t\t\t\t\t\t\t\t} 
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#speedy_quarter_locator .radio_box_html').html(html_popup);

\t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\t\t\$('#speedy_quarter_id').val('');
\t\t\t\t\t\t\t\t\$('#speedy_quarter').val('');
\t\t\t\t\t\t\t\t\$('#speedy_quarter_select').val('');
\t\t\t\t\t\t\t\t\$('#speedy_quarter_select').prop(\"disabled\", true);
\t\t\t\t\t\t\t\t\$('.tk_speedy_quarter_select').addClass('tk_redy_box');
\t\t\t\t\t\t\t} 
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t//скрипт за улици
\t\t\t\t\t\t\tif (data.streets_count && data.streets_count > 0) { 
\t\t\t\t\t\t\t\t\$('#speedy_street_id').prop(\"disabled\", false);
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#tk_speedy_quarter_select').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_speedy_block_no').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_speedy_entrance_no').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_speedy_floor_no').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_speedy_apartment_no').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_speedy_street_select').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_speedy_street_num').css('display','block');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#tk_speedy_no_street').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_speedy_help_address').css('display','block');

\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t//ако има повече от 1 улици извежда слектор ако е 1 я селектираме, ако няма изключваме полето
\t\t\t\t\t\t\t\tif(data.streets_count > 1) { 

\t\t\t\t\t\t\t\t\thtml_popup = '';
\t\t\t\t\t\t\t\t\tfor (i = 0; i < data.streets.length; i++) { 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
        // line 525
        if ((array_key_exists("speedy_street_id", $context) && (isset($context["speedy_street_id"]) ? $context["speedy_street_id"] : null))) {
            echo " 
\t\t\t\t\t\t\t\t\t\tvar street_id = ";
            // line 526
            echo (isset($context["speedy_street_id"]) ? $context["speedy_street_id"] : null);
            echo ";
\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 527
            echo " 
\t\t\t\t\t\t\t\t\t\tvar street_id = 0;
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 529
        echo " 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\tif(street_id == data.streets[i]['street_id']) { 
\t\t\t\t\t\t\t\t\t\t\tvar street_checked = 'checked=\"\"';
\t\t\t\t\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\t\t\t\t\tvar street_checked = '';
\t\t\t\t\t\t\t\t\t\t} 

\t\t\t\t\t\t\t\t\t\thtml_popup += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_speedy_street_id\" value=\"' + data.streets[i]['street_id'] + '\" ' + street_checked + '>' + data.streets[i]['type'] + ' ' + data.streets[i]['name'] + '</label></div>';
\t\t\t\t\t\t\t\t\t} 
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\$('#speedy_street_locator .radio_box_html').html(html_popup);
\t \t\t\t\t\t\t\t
\t \t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\t\t\tfor (i = 0; i < data.streets.length; i++) { 
\t\t\t\t\t\t\t\t\t\tvar speedy_street_id = data.streets[i]['street_id'];
\t\t\t\t\t\t\t\t\t\tvar speedy_street = data.streets[i]['name'];
\t\t\t\t\t\t\t\t\t\tvar speedy_type = data.streets[i]['type'] + ' ';
\t\t\t\t\t\t\t\t\t} 
\t\t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t\t\t\$('#speedy_street_id').val(speedy_street_id);
\t\t\t\t\t\t\t\t\t\$('#speedy_street').val(speedy_type + speedy_street);
\t\t\t\t\t\t\t\t\t\$('#speedy_street_select').val(speedy_street);
\t\t\t\t\t\t\t\t\t\$('#speedy_street_select').prop(\"disabled\", true);
\t\t\t\t\t\t\t\t\t\$('.tk_speedy_street_select').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\$('#speedy_street_num').val('1');
\t\t\t\t\t\t\t\t\t\$('#tk_speedy_street_num').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t\t\t\$('input#street_num').val('1');
\t\t\t\t\t\t\t\t\t\$('input#other').val('Център');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\$('#tk_speedy_quarter_select').css('display','none');
\t\t\t\t\t\t\t\t\t\$('#tk_speedy_block_no').css('display','none');
\t\t\t\t\t\t\t\t\t\$('#tk_speedy_entrance_no').css('display','none');
\t\t\t\t\t\t\t\t\t\$('#tk_speedy_floor_no').css('display','none');
\t\t\t\t\t\t\t\t\t\$('#tk_speedy_apartment_no').css('display','none');
\t\t\t\t\t\t\t\t\t\$('#tk_speedy_street_select').css('display','none');
\t\t\t\t\t\t\t\t\t\$('#tk_speedy_street_num').css('display','none');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\$('#tk_speedy_no_street').css('display','block');
\t\t\t\t\t\t\t\t\t\$('#tk_speedy_help_address').css('display','none');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t} 

\t\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\t\t\$('#speedy_street_id').val('');
\t\t\t\t\t\t\t\t\$('#speedy_street').val('Център');
\t\t\t\t\t\t\t\t\$('#speedy_street_select').val('Център');
\t\t\t\t\t\t\t\t\$('#speedy_street_select').prop(\"disabled\", true);
\t\t\t\t\t\t\t\t\$('.tk_speedy_street_select').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#speedy_street_num').val('1');
\t\t\t\t\t\t\t\t\$('#speedy_street_num').prop(\"disabled\", true);
\t\t\t\t\t\t\t\t\$('#tk_speedy_street_num').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#speedy_street_id').prop(\"disabled\", true);
\t\t\t\t\t\t\t\t\$('.tk_speedy_street_id').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('input#street_num').val('');
\t\t\t\t\t\t\t\t\$('input#block_no').val('');
\t\t\t\t\t\t\t\t\$('input#other').val('');
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#tk_speedy_quarter_select').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_speedy_block_no').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_speedy_entrance_no').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_speedy_floor_no').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_speedy_apartment_no').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_speedy_street_select').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_speedy_street_num').css('display','none');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#tk_speedy_no_street').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_speedy_help_address').css('display','none');
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t} 
\t\t\t\t\t\t} 
\t\t\t\t\t 
\t\t\t\t\t\tgetShippingMethodAddress();
\t\t\t\t\t} 
\t\t\t\t});
\t\t} 
\t} 

\t//--></script>
\t 
";
    }

    public function getTemplateName()
    {
        return "default/template/tk_checkout/speedy_address.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  843 => 529,  838 => 527,  833 => 526,  829 => 525,  783 => 481,  778 => 479,  773 => 478,  769 => 477,  430 => 140,  425 => 139,  421 => 138,  405 => 131,  395 => 130,  390 => 128,  384 => 127,  377 => 122,  369 => 118,  363 => 117,  357 => 116,  350 => 112,  344 => 111,  334 => 110,  331 => 109,  324 => 106,  318 => 105,  312 => 104,  308 => 103,  302 => 99,  296 => 97,  290 => 96,  284 => 95,  278 => 92,  272 => 91,  266 => 90,  260 => 87,  254 => 86,  248 => 85,  242 => 82,  236 => 81,  230 => 80,  223 => 76,  217 => 75,  206 => 73,  200 => 70,  192 => 65,  184 => 64,  178 => 63,  173 => 61,  169 => 60,  165 => 58,  160 => 57,  156 => 56,  152 => 55,  147 => 53,  143 => 52,  139 => 51,  129 => 48,  125 => 46,  120 => 44,  112 => 40,  106 => 39,  98 => 33,  79 => 31,  72 => 29,  63 => 23,  57 => 22,  51 => 19,  47 => 17,  42 => 16,  38 => 15,  25 => 5,  19 => 1,);
    }
}
/* <div id="tk_speedy_office">*/
/* 	<div class="tk_panel">*/
/* 		<div class="tk_panel_heading">*/
/* 			<span class="tk_panel_icon"><span class="tk_icon-address"></span></span> */
/* 			<span class="tk_panel_text"> {{ text_address }}</span> */
/* 			<span class="tk_all_spin"><i class="tk_icon-spin rotating"></i></span>*/
/* 		</div>				*/
/* 	*/
/* 		<div class="tk_panel_body">*/
/* 			<div id="tk_speedy_offices">*/
/* */
/* 				<input type="hidden" id="shipping_to" name="shipping_to" value="address" />*/
/* 				<input type="hidden" id="shipping_type" name="shipping_type" value="speedy" />*/
/* 				*/
/* 				{% if module_tk_checkout_zone is not defined or module_tk_checkout_zone == 0 %} */
/* 				<input type="hidden" id="zone_id" name="zone_id" value="{{ zone_id }}" />*/
/* 				{% endif %} */
/* */
/* 				{% if (speedy_addresses_customer) %} */
/* 				<div class="tk_12_column tk_center_column">*/
/* 					<label>*/
/* 						<input type="radio" name="speedy_address_type" value="existing" checked="checked" {% if (speedy_address_type is defined and speedy_address_type == 'existing') %}checked=""{% endif %} onclick="jQuery('#speedy_address_new').hide();jQuery('#tk_speedy_address_existing').show();" />*/
/* 						{{ text_address_existing }} */
/* 					</label>*/
/* 				</div>*/
/* 				<div id="tk_speedy_address_existing">*/
/* 					<div class="tk_12_column tk_center_column">*/
/* 						<select name="speedy_address_customer_id" >*/
/* 							{% for speedy_address in speedy_addresses_customer %} */
/* 							*/
/* 							<option value="{{ speedy_address['speedy_customer_id'] }}" {% if (speedy_address_customer_id is defined and speedy_address['speedy_customer_id'] == speedy_address_customer_id) %}selected="selected"{% endif %}>{{ speedy_address['city'] }}, {{ speedy_address['street'] }}, {{ speedy_address['street_num'] }}</option>*/
/* 								*/
/* 							{% endfor %} */
/* 						</select>*/
/* 					</div>*/
/* 				</div>	 */
/* 				<div class="tk_12_column tk_center_column">*/
/* 					<label>*/
/* 						<input type="radio" name="speedy_address_type" value="new" {% if (speedy_address_type is defined and speedy_address_type == 'new') %}checked=""{% endif %} onclick="jQuery('#speedy_address_new').show();jQuery('#tk_speedy_address_existing').hide();" />*/
/* 						{{ text_address_new }} */
/* 					</label>*/
/* 				</div>*/
/* 					*/
/* 				{% else %} */
/* 				<input type="hidden" name="speedy_address_type" value="new">*/
/* 				{% endif %} */
/* 			*/
/* 				<div id="speedy_address_new" {% if (not speedy_addresses_customer or (speedy_address_type is defined and speedy_address_type == 'new')) %} style="display:block"{% else %}style="display:none"{% endif %}>*/
/* 							*/
/* 					<input type="hidden" name="default" value="1" />*/
/* 					<input type="hidden" id="speedy_address_postcode" name="speedy_address_postcode" value="{{ speedy_address_postcode }}" />*/
/* 					<input type="hidden" id="speedy_address_city" name="speedy_address_city" value="{{ speedy_address_city }}" />*/
/* 					<input type="hidden" id="speedy_address_city_id" name="speedy_address_city_id" value="{{ speedy_address_city_id }}" />*/
/* 						*/
/* 					{% if iso_code_2 is defined and iso_code_2 == 'BG' or iso_code_2 is not defined %} */
/* 					<input type="hidden" id="speedy_quarter_id" name="speedy_quarter_id" value="{{ speedy_quarter_id }}" />*/
/* 					<input type="hidden" id="speedy_quarter" name="speedy_quarter" value="{{ speedy_quarter }}" />*/
/* 					{% endif %} */
/* 						*/
/* 					<input type="hidden" id="speedy_street_id" name="speedy_street_id" value="{{ speedy_street_id }}" />*/
/* 					<input type="hidden" id="speedy_street" name="speedy_street" value="{{ speedy_street }}" />*/
/* 						 */
/* 					<div class="tk_12_column tk_center_column tk_speedy_address_city_select tk_required_box {% if (speedy_address_city_id) %} tk_redy_box{% endif %}" id="tk_speedy_address_city_select">*/
/* 						<input type="text" id="speedy_address_city_select" readonly="true" name="speedy_address_city_select" value="{% if (speedy_address_postcode) %}{{ speedy_address_postcode ~ ' ' ~ speedy_address_city }}{% endif %}" placeholder="{{ text_speedy_office_city }}" />*/
/* 						<span class="tk_floating_label">{{text_speedy_office_city }}</span>*/
/* 					</div>*/
/* 							*/
/* 					<div class="tk_clear"></div>*/
/* 					*/
/* 					{% if iso_code_2 is defined and iso_code_2 == 'BG' or iso_code_2 is not defined %} */
/* 					*/
/* 					*/
/* 					<div class="tk_6_column tk_center_column tk_speedy_quarter_select {% if (((speedy_quarters|length) < 1 or speedy_quarter) and speedy_address_city) %} tk_redy_box{% endif %}" id="tk_speedy_quarter_select" {% if speedy_street == 'Център' and speedy_address_city %}style="display:none"{% endif %} >*/
/* 							*/
/* 						<input type="text" id="speedy_quarter_select" readonly="true" name="speedy_quarter_select" value="{{ speedy_quarter }}" placeholder="{{entry_quarter }}" />*/
/* 						<span class="tk_floating_label">{{entry_quarter }}</span>*/
/* 	*/
/* 					</div>*/
/* 					*/
/* 					<div class="tk_1_column tk_center_column " id="tk_speedy_block_no" {% if speedy_street == 'Център' and speedy_address_city %}style="display:none"{% endif %}>*/
/* 						<input type="text" id="speedy_block_no" name="speedy_block_no" value="{{ speedy_block_no }}" placeholder="{{entry_block_no }}" />*/
/* 						<span class="tk_floating_label">{{entry_block_no }}</span>*/
/* 					</div>*/
/* 					*/
/* 					<div class="tk_1_column tk_center_column " id="tk_speedy_entrance_no" {% if speedy_street == 'Център' and speedy_address_city %}style="display:none"{% endif %}>*/
/* 						<input type="text" id="speedy_entrance_no" name="speedy_entrance_no" value="{{ speedy_entrance_no }}" placeholder="{{entry_entrance_no }}" />*/
/* 						<span class="tk_floating_label">{{entry_entrance_no }}</span>*/
/* 					</div>*/
/* 					*/
/* 					<div class="tk_1_column tk_center_column " id="tk_speedy_floor_no" {% if speedy_street == 'Център' and speedy_address_city %}style="display:none"{% endif %}>*/
/* 						<input type="text" id="speedy_floor_no" name="speedy_floor_no" value="{{ speedy_floor_no }}" placeholder="{{entry_floor_no }}" />*/
/* 						<span class="tk_floating_label">{{entry_floor_no }}</span>*/
/* 					</div>*/
/* 					*/
/* 					<div class="tk_1_column tk_center_column " id="tk_speedy_apartment_no" {% if speedy_street == 'Център' and speedy_address_city %}style="display:none"{% endif %}>*/
/* 						<input type="text" id="speedy_apartment_no" name="speedy_apartment_no" value="{{ speedy_apartment_no }}" placeholder="{{entry_apartment_no }}" />*/
/* 						<span class="tk_floating_label">{{entry_apartment_no }}</span>*/
/* 					</div>*/
/* 					{% endif %} */
/* */
/* 					<div class="tk_clear"></div>*/
/* 					*/
/* 					{% if iso_code_2 is defined and iso_code_2 == 'GR' %} */
/* 					<div class="tk_12_column tk_center_column tk_speedy_street_select {% if (((speedy_streets|length) < 1 or speedy_street) and speedy_address_city) %} tk_redy_box{% endif %}" id="tk_speedy_street_select">*/
/* 						<input type="text" id="speedy_street_select" readonly="true" name="speedy_street_select" value="{{ speedy_street }}" placeholder="{{entry_street }}" />*/
/* 						<span class="tk_floating_label">{{entry_street }}</span>*/
/* 						*/
/* 					</div>*/
/* 					{% else %} */
/* 					<div class="tk_8_column tk_center_column tk_speedy_street_select {% if (((speedy_streets|length) < 1 or speedy_street) and speedy_address_city) %} tk_redy_box{% endif %}" id="tk_speedy_street_select" {% if speedy_street == 'Център' and speedy_address_city %}style="display:none"{% endif %}>*/
/* 						<input type="text" id="speedy_street_select" readonly="true" name="speedy_street_select" value="{{ speedy_street }}" placeholder="{{entry_street }}" />*/
/* 						<span class="tk_floating_label">{{entry_street }}</span>*/
/* 						*/
/* 					</div>*/
/* 							*/
/* 					<div class="tk_4_column tk_center_column " id="tk_speedy_street_num" {% if speedy_street == 'Център' and speedy_address_city %}style="display:none"{% endif %}>*/
/* 						<input type="text" id="speedy_street_num" name="speedy_street_num" value="{{ speedy_street_num }}" placeholder="{{entry_street_num }}" />*/
/* 						<span class="tk_floating_label">{{entry_street_num }}</span>*/
/* 					</div>*/
/* 					*/
/* 							*/
/* 					{% endif %} */
/* 					*/
/* 					<div class="tk_clear"></div>*/
/* 							*/
/* 					<div class="tk_12_column tk_center_column " id="tk_speedy_other">*/
/* 						<input type="text" id="speedy_other" name="speedy_other" value="{{ speedy_other }}" placeholder="{{entry_other }}" />*/
/* 						<span class="tk_floating_label">{{entry_other }}</span>*/
/* 						*/
/* 						<div id="tk_speedy_no_street" {% if speedy_street == 'Център' and speedy_address_city %}style="display:block"{% else %}style="display: none"{% endif %}><hr> <span class="tk_text_free_shipping">{{ text_no_street }}</span></div>*/
/* 						<div id="tk_speedy_help_address" {% if speedy_street == 'Център' and speedy_address_city %}style="display:none"{% else %}style="display: block"{% endif %}><hr> <span class="tk_text_free_shipping">{{ text_help_address }}</span></div>*/
/* */
/* 					</div>*/
/* 	*/
/* 				</div>*/
/* */
/* 				<div class="tk_clear"></div>*/
/* 				{% if (error_address) %} */
/* 				<span class="tk_alert">{{ error_address }}</span>*/
/* 				{% endif %} */
/*  	*/
/* 			</div>	*/
/* 			<div class="tk_clear"></div>*/
/* 	*/
/* 		</div> */
/* 	</div>*/
/* </div>*/
/* */
/* <div class="speedy_city_container radio_container mfp-hide" id="speedy_city_locator">*/
/* 	<div class="radio_search">*/
/* 		<span class="speedy_city_spin pull-right magnific_spin"></span>*/
/* 		<input id="speedy_city_search" name="speedy_city_search" type="text" placeholder="Търсене.." class="radio_box_search">*/
/* 	</div>*/
/* 	<div class="radio_box" id="speedy_city_locator_radio_box">*/
/* 		<span class="radio_box_top"></span>*/
/* 		<div class="radio_box_html"></div>*/
/* 		<span class="last_element_city"></span>*/
/* 	</div>*/
/* </div>*/
/* */
/* <div class="speedy_quarter_container radio_container mfp-hide" id="speedy_quarter_locator">*/
/* 	<div class="radio_search">*/
/* 		<input id="speedy_quarter_search" name="speedy_quarter_search" type="text" placeholder="Търсене.." class="radio_box_search">*/
/* 	</div>*/
/* 	<div class="radio_box" id="speedy_quarter_locator_radio_box">*/
/* 		<span class="radio_box_top"></span>*/
/* 		<div class="radio_box_html"></div>*/
/* 		<span class="last_element_street"></span>*/
/* 	</div>*/
/* </div>*/
/* */
/* <div class="speedy_street_container radio_container mfp-hide" id="speedy_street_locator">*/
/* 	<div class="radio_search">*/
/* 		<span class="speedy_street_spin pull-right magnific_spin"></span>*/
/* 		<input id="speedy_street_search" name="speedy_street_search" type="text" placeholder="Търсене.." class=" radio_box_search">*/
/* 	</div>*/
/* 	<div class="radio_box" id="speedy_street_locator_radio_box">*/
/* 		<span class="radio_box_top"></span>*/
/* 		<div class="radio_box_html"></div>*/
/* 		<span class="last_element_street"></span>*/
/* 	</div>*/
/* </div>*/
/* */
/* <script>*/
/* 	*/
/* 	$(document).ready(function() { */
/* 			getPaymentMethod();*/
/* 		});*/
/* 	*/
/* 	$('#speedy_street_num').change(function() { saveData(); } );*/
/* 	$('#speedy_block_no').change(function() { saveData(); } );*/
/* 	$('#speedy_entrance_no').change(function() { saveData(); } );*/
/* 	$('#speedy_floor_no').change(function() { saveData(); } );*/
/* 	$('#speedy_apartment_no').change(function() { saveData(); } );*/
/* 	$('#speedy_other').change(function() { saveData(); } );*/
/* */
/* 	//попъп за градове*/
/* 	$(document).on('click', '#speedy_address_city_select', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$.magnificPopup.open( { */
/* 					type: 'inline',*/
/* 					items: { src: '#speedy_city_locator'} */
/* 				});*/
/* 			$('.speedy_city_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 			getCitiesHtml();*/
/* 			setTimeout(function () { */
/* 					$('#speedy_city_search').focus();*/
/* 				} , 500);*/
/*  */
/* 		});*/
/* */
/* 	//въвеждане на град ръчно*/
/* 	$('#speedy_city_search').on('input',function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			getCitiesHtml();*/
/* 		});*/
/* */
/* */
/* 	//добавяне на слектирания град и извикваме квартали и улици спрямо него*/
/* 	$(document).delegate('#speedy_city_locator .radio_box input[type=\'radio\']', 'click', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var speedy_address_city_id = $(this).val();*/
/* 			var speedy_address_city = $(this).data('name');*/
/* 			var speedy_address_city_select = $(this).data('select');*/
/* 			$('#speedy_address_city_id').val(speedy_address_city_id);*/
/* 			$('#speedy_address_city').val(speedy_address_city);*/
/* 			$('#speedy_address_city_select').val(speedy_address_city_select);*/
/* */
/* 			$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 			$('#tk_checkout').css('opacity','0.6');*/
/* 			$('#tk_checkout').css('pointer-events','none');*/
/* 			$('#tk_button_confirm').prop('disabled', true);*/
/* 			$('.tk_speedy_address_city_select').addClass('tk_redy_box');*/
/* */
/* 			getQuarterStreet();*/
/* 			$.magnificPopup.close()*/
/* 		});*/
/* */
/* 	//попъп за квартали*/
/* 	$(document).on('click', '#speedy_quarter_select', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$.magnificPopup.open( { */
/* 					type: 'inline',*/
/* 					items: { src: '#speedy_quarter_locator'} */
/* 				});*/
/* 			$('.speedy_quarter_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 			getQuartersHtml();*/
/* 			setTimeout(function () { */
/* 					$('#speedy_quarter_search').focus();*/
/* 				} , 500);*/
/* 		});*/
/* 	 */
/* 	//въвеждане на квартал ръчно*/
/* 	$('#speedy_quarter_search').on('input',function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			getQuartersHtml();*/
/* 		});*/
/* */
/* */
/* 	//добавяне на селектирания кавартал*/
/* 	$(document).delegate('#speedy_quarter_locator .radio_box input[type=\'radio\']', 'click', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var speedy_quarter_id = $(this).val();*/
/* 			var speedy_quarter = $(this).data('name');*/
/* 			var speedy_quarter_type = $(this).data('type');*/
/* 			$('#speedy_quarter_id').val(speedy_quarter_id);*/
/* 			$('#speedy_quarter').val(speedy_quarter);*/
/* 			$('#speedy_quarter_select').val(speedy_quarter_type + speedy_quarter);*/
/* */
/* 			$('.tk_speedy_quarter_select').addClass('tk_redy_box');*/
/* 		*/
/* 			saveData();*/
/* */
/* 			$.magnificPopup.close()*/
/* 		});*/
/* */
/* 	//попъп за улици*/
/* 	$(document).on('click', '#speedy_street_select', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$.magnificPopup.open( { */
/* 					type: 'inline',*/
/* 					items: { src: '#speedy_street_locator'} */
/* 				});*/
/* 			$('.speedy_street_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 			getStreetsHtml();*/
/* 			setTimeout(function () { */
/* 					$('#speedy_street_search').focus();*/
/* 				} , 500);*/
/* 		});*/
/*  */
/* 	//въвеждане на улица ръчно*/
/* 	$('#speedy_street_search').on('input',function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			getStreetsHtml();*/
/* 		});*/
/* */
/* */
/* 	//добавяне на селектираната улица*/
/* 	$(document).delegate('#speedy_street_locator .radio_box input[type=\'radio\']', 'click', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var speedy_street_id = $(this).val();*/
/* 			var speedy_street = $(this).data('name');*/
/* 			var speedy_street_type = $(this).data('type');*/
/* 			$('#speedy_street_id').val(speedy_street_id);*/
/* 			$('#speedy_street').val(speedy_street_type + speedy_street);*/
/* 			$('#speedy_street_select').val(speedy_street_type + speedy_street);*/
/* */
/* 			$('.tk_speedy_street_select').addClass('tk_redy_box');*/
/* 		*/
/* 			saveData();*/
/* 				 */
/* 			$.magnificPopup.close()*/
/* 		});*/
/* */
/* 	//извежда списъка с градове в попъпа - първите 10 се зареждат веднага останалите са аутокомплийт от АПИ на Спиди*/
/* 	function getCitiesHtml() { */
/* 		var url = 'index.php?route=extension/shipping/tk_speedy/autocompleteCity';*/
/* 		var filter_name = $('input[name=\'speedy_city_search\']').val();*/
/* */
/* 		if (filter_name) { */
/* 			url += '&filter_name=' + encodeURIComponent(filter_name);*/
/* 		} */
/* */
/* 		$.ajax( { */
/* 				url: url,*/
/* 				beforeSend: function() { */
/* 					$('.speedy_city_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 				} ,*/
/* 				success: function(data) { */
/* 					$('.speedy_city_spin').html('');*/
/* 	 				*/
/* 					if (filter_name) { */
/* 						$('#speedy_city_locator .radio_box_html').html('');*/
/* 					} */
/* */
/* 					html = '';*/
/* 				*/
/* 					if(data) { */
/* 						$.map(data, function(item) { */
/* 								html += '<div class="radio_elements"><label><input type="radio" name="tk_speedy_city_id" value="' + item['city_id'] + '" data-name="' + item['name'] + '" data-select="' + item['post_code'] + ' ' + item['name'] + '"><span>' + item['post_code'] + '</span> ' + item['type'] + ' ' + item['name'] + '</label></div>';*/
/* 							});*/
/* 					} */
/* 					*/
/* 					$('#speedy_city_locator .radio_box_html').append(html);*/
/* */
/* 				} */
/* 			});*/
/* 	 */
/* 	} */
/* */
/* 	//извежда списъка с квартали в попъпа - първите 10 се зареждат веднага останалите са аутокомплийт от АПИ на Спиди*/
/* 	function getQuartersHtml() { */
/* 		$('#speedy_quarter_locator .radio_box_html').html('');*/
/* 		var url = 'index.php?route=extension/shipping/tk_speedy/autocompleteQuarter';*/
/* 		var filter_name = $('input[name=\'speedy_quarter_search\']').val();*/
/* 		var city_id = $('#speedy_address_city_id').val();*/
/* */
/* 		if (filter_name) { */
/* 			url += '&filter_name=' + encodeURIComponent(filter_name);*/
/* 		} */
/* 		url += '&city_id=' + city_id;*/
/* 		 */
/* 		$.ajax( { */
/* 				url: url,*/
/* 				beforeSend: function() { */
/* 					$('.speedy_quarter_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 				} ,*/
/* 				success: function(data) { */
/* 					$('.speedy_quarter_spin').html('');*/
/* 	 				*/
/* 					if (filter_name) { */
/* 						$('#speedy_quarter_locator .radio_box_html').html('');*/
/* 					} */
/* */
/* 					html = '';*/
/* 				*/
/* 					if(data) { */
/* 						$.map(data, function(item) { */
/* 								html += '<div class="radio_elements"><label><input type="radio" name="tk_speedy_quarter_id" value="' + item['quarter_id'] + '" data-name="' + item['name'] + '" data-type="' + item['type'] + '"><span>' + item['type'] + item['name'] + '</label></div>';*/
/* 							});*/
/* 					} */
/* 					*/
/* 					$('#speedy_quarter_locator .radio_box_html').append(html);*/
/* 			*/
/* 				} */
/* 			});*/
/* 	 */
/* 	} */
/* 	 */
/* 	//извежда списъка с улици в попъпа - първите 10 се зареждат веднага останалите са аутокомплийт от АПИ на Спиди*/
/* 	function getStreetsHtml() { */
/* 		$('#speedy_street_locator .radio_box_html').html('');*/
/* 		*/
/* 		var url = 'index.php?route=extension/shipping/tk_speedy/autocompleteStreet';*/
/* 		var filter_name = $('input[name=\'speedy_street_search\']').val();*/
/* */
/* 		var city_id = $('#speedy_address_city_id').val();*/
/* */
/* 		if (filter_name) { */
/* 			url += '&filter_name=' + encodeURIComponent(filter_name);*/
/* 		} */
/* 		url += '&city_id=' + city_id;*/
/* 		 */
/* 		$.ajax( { */
/* 				url: url,*/
/* 				beforeSend: function() { */
/* 					$('.speedy_street_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 				} ,*/
/* 				success: function(data) { */
/* 					$('.speedy_street_spin').html('');*/
/* 	 				*/
/* 					if (filter_name) { */
/* 						$('#speedy_street_locator .radio_box_html').html('');*/
/* 					} */
/* */
/* 					html = '';*/
/* 				*/
/* 					if(data) { */
/* 						$.map(data, function(item) { */
/* 								html += '<div class="radio_elements"><label><input type="radio" name="tk_speedy_street_id" value="' + item['street_id'] + '" data-name="' + item['name'] + '" data-type="' + item['type'] + '" ><span>' + item['type'] + item['name'] + '</label></div>';*/
/* 							});*/
/* 					} */
/* 					*/
/* 					$('#speedy_street_locator .radio_box_html').append(html);*/
/* */
/* 				} */
/* 			});*/
/* 	 */
/* 	} */
/* */
/* */
/* 	//извежда кварталите и улиците спрямо избрания град	*/
/* 	//извиква призчислени методи за доставка => извежда преизчислени тотали в количката*/
/* 	//ако имаме само 1 улица или 1 квартал ги селектираме*/
/* 	//ако няма улици или квартали ги изключваме	*/
/* 	function getQuarterStreet() { */
/* 		$('#speedy_city_locator .radio_box_html').html('');*/
/* 		$('#speedy_quarter_id').val('');*/
/* 		$('#speedy_quarter').val('');*/
/* 		$('#speedy_quarter_select').val('');*/
/* 		$('#speedy_street_id').val('');*/
/* 		$('#speedy_street').val('');*/
/* 		$('#speedy_street_select').val('');*/
/* 		$('#speedy_street_num').val('');*/
/* 		$('#speedy_block_no').val('');*/
/* 		$('#speedy_other').val('');*/
/* 		$('#speedy_address_postcode').val('');*/
/* */
/* 		$('.tk_speedy_quarter_select').removeClass('tk_redy_box');*/
/* 		$('.tk_speedy_street_select').removeClass('tk_redy_box');*/
/* 		$('#tk_speedy_street_num').removeClass('tk_redy_box');*/
/* 		*/
/* 		city_id = $('#speedy_address_city_id').val();*/
/* */
/* 		*/
/* 		if(city_id > 0) { */
/* 			$.ajax( { */
/* 					url: 'index.php?route=extension/shipping/tk_speedy/getQuartereStreet',*/
/* 					type: 'POST',*/
/* 					data: 'city_id=' + encodeURIComponent(city_id),*/
/* 					dataType: 'json',*/
/* 					success: function(data) { */
/* 						if (data) { */
/* 							$('#speedy_street_select').prop("disabled", false);*/
/* 							$('#speedy_quarter_select').prop("disabled", false);*/
/* 							$('#speedy_street_num').prop("disabled", false);*/
/* 						*/
/* 							$('#speedy_address_postcode').val(data.city_post_code);*/
/* */
/* 							//скрипт за квартали*/
/* 							if (data.quarters_count && data.quarters_count > 0) { */
/* 								$('#speedy_quarter_id').prop("disabled", false);*/
/* 								 	*/
/* 								html_popup = '';*/
/* 								for (i = 0; i < data.quarters.length; i++) { */
/* 										*/
/* 									{% if (speedy_quarter_id is defined and speedy_quarter_id) %} */
/* 									var quarter_id = {{ speedy_quarter_id}};*/
/* 									{% else %} */
/* 									var quarter_id = 0;*/
/* 									{% endif %} */
/* 										*/
/* 									if(quarter_id == data.quarters[i]['quarter_id']) { */
/* 										var quarter_checked = 'checked=""';*/
/* 									} else { */
/* 										var quarter_checked = '';*/
/* 									} */
/* */
/* 									html_popup += '<div class="radio_elements"><label><input type="radio" name="tk_speedy_quarter_id" value="' + data.quarters[i]['quarter_id'] + '" ' + quarter_checked + '>' + data.quarters[i]['type'] + ' ' + data.quarters[i]['name'] + '</label></div>';*/
/* 								} */
/* 									*/
/* 								$('#speedy_quarter_locator .radio_box_html').html(html_popup);*/
/* */
/* 								 */
/* 							} else { */
/* 								$('#speedy_quarter_id').val('');*/
/* 								$('#speedy_quarter').val('');*/
/* 								$('#speedy_quarter_select').val('');*/
/* 								$('#speedy_quarter_select').prop("disabled", true);*/
/* 								$('.tk_speedy_quarter_select').addClass('tk_redy_box');*/
/* 							} */
/* 							*/
/* 							//скрипт за улици*/
/* 							if (data.streets_count && data.streets_count > 0) { */
/* 								$('#speedy_street_id').prop("disabled", false);*/
/* 								*/
/* 								$('#tk_speedy_quarter_select').css('display','block');*/
/* 								$('#tk_speedy_block_no').css('display','block');*/
/* 								$('#tk_speedy_entrance_no').css('display','block');*/
/* 								$('#tk_speedy_floor_no').css('display','block');*/
/* 								$('#tk_speedy_apartment_no').css('display','block');*/
/* 								$('#tk_speedy_street_select').css('display','block');*/
/* 								$('#tk_speedy_street_num').css('display','block');*/
/* 									*/
/* 								$('#tk_speedy_no_street').css('display','none');*/
/* 								$('#tk_speedy_help_address').css('display','block');*/
/* */
/* 								*/
/* 								//ако има повече от 1 улици извежда слектор ако е 1 я селектираме, ако няма изключваме полето*/
/* 								if(data.streets_count > 1) { */
/* */
/* 									html_popup = '';*/
/* 									for (i = 0; i < data.streets.length; i++) { */
/* 										*/
/* 										{% if (speedy_street_id is defined and speedy_street_id) %} */
/* 										var street_id = {{ speedy_street_id}};*/
/* 										{% else %} */
/* 										var street_id = 0;*/
/* 										{% endif %} */
/* 										*/
/* 										if(street_id == data.streets[i]['street_id']) { */
/* 											var street_checked = 'checked=""';*/
/* 										} else { */
/* 											var street_checked = '';*/
/* 										} */
/* */
/* 										html_popup += '<div class="radio_elements"><label><input type="radio" name="tk_speedy_street_id" value="' + data.streets[i]['street_id'] + '" ' + street_checked + '>' + data.streets[i]['type'] + ' ' + data.streets[i]['name'] + '</label></div>';*/
/* 									} */
/* 									*/
/* 									$('#speedy_street_locator .radio_box_html').html(html_popup);*/
/* 	 							*/
/* 	 							*/
/* 								} else { */
/* 									for (i = 0; i < data.streets.length; i++) { */
/* 										var speedy_street_id = data.streets[i]['street_id'];*/
/* 										var speedy_street = data.streets[i]['name'];*/
/* 										var speedy_type = data.streets[i]['type'] + ' ';*/
/* 									} */
/* 									 */
/* 									$('#speedy_street_id').val(speedy_street_id);*/
/* 									$('#speedy_street').val(speedy_type + speedy_street);*/
/* 									$('#speedy_street_select').val(speedy_street);*/
/* 									$('#speedy_street_select').prop("disabled", true);*/
/* 									$('.tk_speedy_street_select').addClass('tk_redy_box');*/
/* 									*/
/* 									$('#speedy_street_num').val('1');*/
/* 									$('#tk_speedy_street_num').addClass('tk_redy_box');*/
/* 								 */
/* 									$('input#street_num').val('1');*/
/* 									$('input#other').val('Център');*/
/* 									*/
/* 									$('#tk_speedy_quarter_select').css('display','none');*/
/* 									$('#tk_speedy_block_no').css('display','none');*/
/* 									$('#tk_speedy_entrance_no').css('display','none');*/
/* 									$('#tk_speedy_floor_no').css('display','none');*/
/* 									$('#tk_speedy_apartment_no').css('display','none');*/
/* 									$('#tk_speedy_street_select').css('display','none');*/
/* 									$('#tk_speedy_street_num').css('display','none');*/
/* 									*/
/* 									$('#tk_speedy_no_street').css('display','block');*/
/* 									$('#tk_speedy_help_address').css('display','none');*/
/* 									*/
/* 								} */
/* */
/* 							} else { */
/* 								$('#speedy_street_id').val('');*/
/* 								$('#speedy_street').val('Център');*/
/* 								$('#speedy_street_select').val('Център');*/
/* 								$('#speedy_street_select').prop("disabled", true);*/
/* 								$('.tk_speedy_street_select').addClass('tk_redy_box');*/
/* 								*/
/* 								$('#speedy_street_num').val('1');*/
/* 								$('#speedy_street_num').prop("disabled", true);*/
/* 								$('#tk_speedy_street_num').addClass('tk_redy_box');*/
/* 								*/
/* 								$('#speedy_street_id').prop("disabled", true);*/
/* 								$('.tk_speedy_street_id').addClass('tk_redy_box');*/
/* 								*/
/* 								$('input#street_num').val('');*/
/* 								$('input#block_no').val('');*/
/* 								$('input#other').val('');*/
/* 								*/
/* 								$('#tk_speedy_quarter_select').css('display','none');*/
/* 								$('#tk_speedy_block_no').css('display','none');*/
/* 								$('#tk_speedy_entrance_no').css('display','none');*/
/* 								$('#tk_speedy_floor_no').css('display','none');*/
/* 								$('#tk_speedy_apartment_no').css('display','none');*/
/* 								$('#tk_speedy_street_select').css('display','none');*/
/* 								$('#tk_speedy_street_num').css('display','none');*/
/* 									*/
/* 								$('#tk_speedy_no_street').css('display','block');*/
/* 								$('#tk_speedy_help_address').css('display','none');*/
/* 								*/
/* 							} */
/* 						} */
/* 					 */
/* 						getShippingMethodAddress();*/
/* 					} */
/* 				});*/
/* 		} */
/* 	} */
/* */
/* 	//--></script>*/
/* 	 */
/* */
