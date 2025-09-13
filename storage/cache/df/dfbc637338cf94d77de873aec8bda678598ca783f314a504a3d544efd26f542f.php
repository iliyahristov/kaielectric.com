<?php

/* default/template/tk_checkout/econt_address.twig */
class __TwigTemplate_db1dc6c46b21aecd30fbb5a93c123c30a257c243ce32a8258a713a0cbaa9e24a extends Twig_Template
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
        echo "<div id=\"tk_econt_office\">
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
\t\t\t
\t\t\t<div id=\"tk_econt_offices\">

\t\t\t\t<input type=\"hidden\" id=\"shipping_to\" name=\"shipping_to\" value=\"address\" />
\t\t\t\t<input type=\"hidden\" id=\"shipping_type\" name=\"shipping_type\" value=\"econt\" />
\t\t\t\t
\t\t\t\t";
        // line 16
        if (( !array_key_exists("module_tk_checkout_zone", $context) || ((isset($context["module_tk_checkout_zone"]) ? $context["module_tk_checkout_zone"] : null) == 0))) {
            echo " 
\t\t\t\t<input type=\"hidden\" id=\"zone_id\" name=\"zone_id\" value=\"";
            // line 17
            echo (isset($context["zone_id"]) ? $context["zone_id"] : null);
            echo "\" />
\t\t\t\t";
        }
        // line 18
        echo " 

\t\t\t\t";
        // line 20
        if ((isset($context["econt_addresses_customer"]) ? $context["econt_addresses_customer"] : null)) {
            echo " 
\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"econt_address_type\" value=\"existing\" checked=\"checked\" ";
            // line 23
            if ((array_key_exists("econt_address_type", $context) && ((isset($context["econt_address_type"]) ? $context["econt_address_type"] : null) == "existing"))) {
                echo "checked=\"\"";
            }
            echo " onclick=\"jQuery('#econt_address_new').hide();jQuery('#tk_econt_address_existing').show();\" />
\t\t\t\t\t\t";
            // line 24
            echo (isset($context["text_address_existing"]) ? $context["text_address_existing"] : null);
            echo " 
\t\t\t\t\t</label>
\t\t\t\t</div>
\t\t\t\t<div id=\"tk_econt_address_existing\">
\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t<select name=\"econt_address_customer_id\" >
\t\t\t\t\t\t\t";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["econt_addresses_customer"]) ? $context["econt_addresses_customer"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["econt_address"]) {
                echo " 
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<option value=\"";
                // line 32
                echo $this->getAttribute($context["econt_address"], "econt_customer_id", array(), "array");
                echo "\" ";
                if ((array_key_exists("econt_address_customer_id", $context) && ($this->getAttribute($context["econt_address"], "econt_customer_id", array(), "array") == (isset($context["econt_address_customer_id"]) ? $context["econt_address_customer_id"] : null)))) {
                    echo "selected=\"selected\"";
                }
                echo ">";
                echo $this->getAttribute($context["econt_address"], "city", array(), "array");
                echo ", ";
                echo $this->getAttribute($context["econt_address"], "street", array(), "array");
                echo ", ";
                echo $this->getAttribute($context["econt_address"], "street_num", array(), "array");
                echo "</option>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['econt_address'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo " 
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t</div>\t 
\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"econt_address_type\" value=\"new\" ";
            // line 40
            if ((array_key_exists("econt_address_type", $context) && ((isset($context["econt_address_type"]) ? $context["econt_address_type"] : null) == "new"))) {
                echo "checked=\"\"";
            }
            echo " onclick=\"jQuery('#econt_address_new').show();jQuery('#tk_econt_address_existing').hide();\" />
\t\t\t\t\t\t";
            // line 41
            echo (isset($context["text_address_new"]) ? $context["text_address_new"] : null);
            echo " 
\t\t\t\t\t</label>
\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t";
        } else {
            // line 45
            echo " 
\t\t\t\t<input type=\"hidden\" name=\"econt_address_type\" value=\"new\">
\t\t\t\t";
        }
        // line 47
        echo " 
\t\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t\t<div id=\"econt_address_new\" ";
        // line 50
        if (( !(isset($context["econt_addresses_customer"]) ? $context["econt_addresses_customer"] : null) || (array_key_exists("econt_address_type", $context) && ((isset($context["econt_address_type"]) ? $context["econt_address_type"] : null) == "new")))) {
            echo " style=\"display:block\"";
        } else {
            echo "style=\"display:none\"";
        }
        echo ">
\t\t\t\t\t\t\t
\t\t\t\t\t<input type=\"hidden\" name=\"default\" value=\"1\" />
\t\t\t\t\t<input type=\"hidden\" id=\"econt_address_postcode\" name=\"econt_address_postcode\" value=\"";
        // line 53
        echo (isset($context["econt_address_postcode"]) ? $context["econt_address_postcode"] : null);
        echo "\" />
\t\t\t\t\t<input type=\"hidden\" id=\"econt_address_city\" name=\"econt_address_city\" value=\"";
        // line 54
        echo (isset($context["econt_address_city"]) ? $context["econt_address_city"] : null);
        echo "\" />
\t\t\t\t\t<input type=\"hidden\" id=\"econt_address_city_id\" name=\"econt_address_city_id\" value=\"";
        // line 55
        echo (isset($context["econt_address_city_id"]) ? $context["econt_address_city_id"] : null);
        echo "\" />
\t\t\t\t\t<input type=\"hidden\" id=\"econt_quarter_id\" name=\"econt_quarter_id\" value=\"";
        // line 56
        echo (isset($context["econt_quarter_id"]) ? $context["econt_quarter_id"] : null);
        echo "\" />
\t\t\t\t\t<input type=\"hidden\" id=\"econt_quarter\" name=\"econt_quarter\" value=\"";
        // line 57
        echo (isset($context["econt_quarter"]) ? $context["econt_quarter"] : null);
        echo "\" />
\t\t\t\t\t<input type=\"hidden\" id=\"econt_street_id\" name=\"econt_street_id\" value=\"";
        // line 58
        echo (isset($context["econt_street_id"]) ? $context["econt_street_id"] : null);
        echo "\" />
\t\t\t\t\t<input type=\"hidden\" id=\"econt_street\" name=\"econt_street\" value=\"";
        // line 59
        echo (isset($context["econt_street"]) ? $context["econt_street"] : null);
        echo "\" />
\t\t\t\t\t\t 
\t\t\t\t\t<div class=\" ";
        // line 61
        if ((((isset($context["econt_street"]) ? $context["econt_street"] : null) == "Център") || ((twig_length_filter($this->env, (isset($context["econt_streets"]) ? $context["econt_streets"] : null)) < 2) && (isset($context["econt_address_city"]) ? $context["econt_address_city"] : null)))) {
            echo "tk_12_column";
        } else {
            echo "tk_6_column";
        }
        echo " tk_center_column tk_econt_address_city_select tk_required_box ";
        if ((isset($context["econt_address_city_id"]) ? $context["econt_address_city_id"] : null)) {
            echo " tk_redy_box";
        }
        echo "\" id=\"tk_econt_address_city_select\">
\t\t\t\t\t\t<input type=\"text\" id=\"econt_address_city_select\" readonly=\"true\" name=\"econt_address_city_select\" value=\"";
        // line 62
        if ((isset($context["econt_address_postcode"]) ? $context["econt_address_postcode"] : null)) {
            echo (((isset($context["econt_address_postcode"]) ? $context["econt_address_postcode"] : null) . " ") . (isset($context["econt_address_city"]) ? $context["econt_address_city"] : null));
        }
        echo "\" placeholder=\"";
        echo (isset($context["text_econt_office_city"]) ? $context["text_econt_office_city"] : null);
        echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 63
        echo twig_replace_filter((isset($context["text_econt_office_city"]) ? $context["text_econt_office_city"] : null), array(":" => ""));
        echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_6_column tk_center_column tk_econt_quarter_select ";
        // line 66
        if ((((twig_length_filter($this->env, (isset($context["econt_quarters"]) ? $context["econt_quarters"] : null)) < 1) || (isset($context["econt_quarter"]) ? $context["econt_quarter"] : null)) && (isset($context["econt_address_city"]) ? $context["econt_address_city"] : null))) {
            echo " tk_redy_box";
        }
        echo "\" id=\"tk_econt_quarter_select\" ";
        if ((((isset($context["econt_street"]) ? $context["econt_street"] : null) == "Център") || ((twig_length_filter($this->env, (isset($context["econt_streets"]) ? $context["econt_streets"] : null)) < 2) && (isset($context["econt_address_city"]) ? $context["econt_address_city"] : null)))) {
            echo "style=\"display:none\"";
        }
        echo ">\t
\t\t\t\t\t\t<input type=\"text\" id=\"econt_quarter_select\" readonly=\"true\" name=\"econt_quarter_select\" value=\"";
        // line 67
        echo (isset($context["econt_quarter"]) ? $context["econt_quarter"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_quarter"]) ? $context["entry_quarter"] : null);
        echo "\" />
\t\t\t\t\t\t
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 69
        echo twig_replace_filter((isset($context["entry_quarter"]) ? $context["entry_quarter"] : null), array(":" => ""));
        echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_clear\"></div>

\t\t\t\t\t<div class=\"tk_6_column tk_center_column tk_econt_street_select ";
        // line 74
        if ((((twig_length_filter($this->env, (isset($context["econt_streets"]) ? $context["econt_streets"] : null)) < 1) || (isset($context["econt_street"]) ? $context["econt_street"] : null)) && (isset($context["econt_address_city"]) ? $context["econt_address_city"] : null))) {
            echo " tk_redy_box";
        }
        echo "\" id=\"tk_econt_street_select\" ";
        if ((((isset($context["econt_street"]) ? $context["econt_street"] : null) == "Център") || ((twig_length_filter($this->env, (isset($context["econt_streets"]) ? $context["econt_streets"] : null)) < 2) && (isset($context["econt_address_city"]) ? $context["econt_address_city"] : null)))) {
            echo "style=\"display:none\"";
        }
        echo ">
\t\t\t\t\t\t<input type=\"text\" id=\"econt_street_select\" readonly=\"true\" name=\"econt_street_select\" value=\"";
        // line 75
        echo (isset($context["econt_street"]) ? $context["econt_street"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_street"]) ? $context["entry_street"] : null);
        echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 76
        echo twig_replace_filter((isset($context["entry_street"]) ? $context["entry_street"] : null), array(":" => ""));
        echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_4_column tk_right_column tk_required_box\" id=\"tk_econt_street_num\" ";
        // line 79
        if ((((isset($context["econt_street"]) ? $context["econt_street"] : null) == "Център") || ((twig_length_filter($this->env, (isset($context["econt_streets"]) ? $context["econt_streets"] : null)) < 2) && (isset($context["econt_address_city"]) ? $context["econt_address_city"] : null)))) {
            echo "style=\"display:none\"";
        }
        echo ">
\t\t\t\t\t\t<input type=\"text\" id=\"econt_street_num\" name=\"econt_street_num\" value=\"";
        // line 80
        echo (isset($context["econt_street_num"]) ? $context["econt_street_num"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_street_num"]) ? $context["entry_street_num"] : null);
        echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 81
        echo (isset($context["entry_street_num"]) ? $context["entry_street_num"] : null);
        echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"tk_12_column tk_center_column \" id=\"tk_econt_other\">
\t\t\t\t\t\t<input type=\"text\" id=\"econt_other\" name=\"econt_other\" value=\"";
        // line 86
        echo (isset($context["econt_other"]) ? $context["econt_other"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_other"]) ? $context["entry_other"] : null);
        echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 87
        echo (isset($context["entry_other"]) ? $context["entry_other"] : null);
        echo "</span>

\t\t\t\t\t\t<div id=\"tk_econt_no_street\" ";
        // line 89
        if ((((isset($context["econt_street"]) ? $context["econt_street"] : null) == "Център") || ((twig_length_filter($this->env, (isset($context["econt_streets"]) ? $context["econt_streets"] : null)) < 2) && (isset($context["econt_address_city"]) ? $context["econt_address_city"] : null)))) {
            echo "style=\"display:block\"";
        } else {
            echo "style=\"display: none\"";
        }
        echo "><hr> <span class=\"tk_text_free_shipping\">";
        echo (isset($context["text_no_street"]) ? $context["text_no_street"] : null);
        echo "</span></div>
\t\t\t\t\t\t<div id=\"tk_econt_help_address\" ";
        // line 90
        if ((((isset($context["econt_street"]) ? $context["econt_street"] : null) == "Център") || ((twig_length_filter($this->env, (isset($context["econt_streets"]) ? $context["econt_streets"] : null)) < 2) && (isset($context["econt_address_city"]) ? $context["econt_address_city"] : null)))) {
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
        // line 97
        if ((isset($context["error_address"]) ? $context["error_address"] : null)) {
            echo " 
\t\t\t\t<span class=\"tk_alert\">";
            // line 98
            echo (isset($context["error_address"]) ? $context["error_address"] : null);
            echo "</span>
\t\t\t\t";
        }
        // line 99
        echo " 
\t
\t\t\t</div>\t
\t\t\t<div class=\"tk_clear\"></div>
\t
\t\t\t
\t\t\t";
        // line 105
        if ((isset($context["econt_sms_enabled"]) ? $context["econt_sms_enabled"] : null)) {
            echo " 
\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t<input type=\"checkbox\" name=\"econt_sms\" id=\"econt_sms\" value=\"1\" ";
            // line 107
            if (((isset($context["econt_sms"]) ? $context["econt_sms"] : null) && ((isset($context["econt_sms"]) ? $context["econt_sms"] : null) == 2))) {
                echo "checked=\"\"";
            }
            echo ">
\t\t\t\t<label for=\"econt_sms\"> ";
            // line 108
            echo (isset($context["text_sms"]) ? $context["text_sms"] : null);
            echo "</label>
\t\t\t</div>
\t\t\t";
        }
        // line 111
        echo "\t\t</div> 
\t</div>
</div>

<div class=\"econt_city_container radio_container mfp-hide\" id=\"econt_city_locator\">
\t<div class=\"radio_search\">
\t\t<span class=\"econt_city_spin pull-right magnific_spin\"></span>
\t\t<input id=\"econt_city_search\" name=\"econt_city_search\" type=\"text\" placeholder=\"Търсене..\" class=\"radio_box_search\">
\t</div>
\t<div class=\"radio_box\" id=\"econt_city_locator_radio_box\">
\t\t<span class=\"radio_box_top\"></span>
\t\t<div class=\"radio_box_html\"></div>
\t\t<span class=\"last_element_city\"></span>
\t</div>
\t<input id=\"econt_city_page\" name=\"econt_city_page\" type=\"hidden\" value=\"1\">
</div>

<div class=\"econt_quarter_container radio_container mfp-hide\" id=\"econt_quarter_locator\">
\t<div class=\"radio_search\">
\t\t<input id=\"econt_quarter_search\" name=\"econt_quarter_search\" type=\"text\" placeholder=\"Търсене..\" class=\"radio_box_search\">
\t</div>
\t<div class=\"radio_box\">
\t\t";
        // line 133
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["econt_quarters"]) ? $context["econt_quarters"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["quarter"]) {
            echo " 
\t\t<div class=\"radio_elements\">
\t\t\t<label>
\t\t\t\t<input type=\"radio\" name=\"tk_econt_quarter_id\" value=\"";
            // line 136
            echo $this->getAttribute($context["quarter"], "quarter_id", array(), "array");
            echo "\" ";
            if ((array_key_exists("quarter_id", $context) && ($this->getAttribute($context["quarter"], "quarter_id", array(), "array") == (isset($context["quarter_id"]) ? $context["quarter_id"] : null)))) {
                echo "checked=\"\"";
            }
            echo " data-name=\"";
            echo $this->getAttribute($context["quarter"], "name", array(), "array");
            echo "\">";
            echo $this->getAttribute($context["quarter"], "name", array(), "array");
            echo " 
\t\t\t</label>
\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['quarter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 139
        echo " 
\t</div>
</div>

<div class=\"econt_street_container radio_container mfp-hide\" id=\"econt_street_locator\">
\t<div class=\"radio_search\">
\t\t<span class=\"econt_street_spin pull-right magnific_spin\"></span>
\t\t<input id=\"econt_street_search\" name=\"econt_street_search\" type=\"text\" placeholder=\"Търсене..\" class=\" radio_box_search\">
\t\t
\t</div>
\t<div class=\"radio_box\" id=\"econt_street_locator_radio_box\">
\t\t<span class=\"radio_box_top\"></span>
\t\t<div class=\"radio_box_html\"></div>
\t\t<span class=\"last_element_street\"></span>
\t</div>
\t<input id=\"econt_street_page\" name=\"econt_street_page\" type=\"hidden\" value=\"1\">
</div>

<script type=\"text/javascript\">

\t\$(document).ready(function() { 
\t\t\tgetPaymentMethod();
\t\t});
\t
\t\$(document).on('click', '#econt_sms', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$('.tk_all_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\t\$('#tk_checkout').css('opacity','0.6');
\t\t\t\$('#tk_checkout').css('pointer-events','none');
\t\t\t\$('#tk_button_confirm').prop('disabled', true);\t
\t\t\t
\t\t\tgetShippingMethodAddress();
\t\t});
\t 
\t 
\t\$('#econt_street_num').change(function() { saveData(); } );
\t\$('#econt_other').change(function() { saveData(); } );

\t//попъп за градове
\t\$(document).on('click', '#econt_address_city_select', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$.magnificPopup.open( { 
\t\t\t\t\ttype: 'inline',
\t\t\t\t\titems: { src: '#econt_city_locator'} 
\t\t\t\t});
\t\t\tgetCitiesHtml();
\t\t\tsetTimeout(function () { 
\t\t\t\t\t\$('#econt_city_search').focus();
\t\t\t\t} , 200);
 
\t\t});

\t//въвеждане на град ръчно
\t\$('#econt_city_search').on('input',function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$('#econt_city_page').val(1);
\t\t\tgetCitiesHtml();
\t\t\tvar container = \$('#econt_city_locator_radio_box');
\t\t\tvar top = \$('#econt_city_locator_radio_box .radio_box_top').position().top,currentScroll = container.scrollTop();
\t\t\tcontainer.animate( { 
\t\t\t\t\tscrollTop: currentScroll + top + 50
\t\t\t\t} , 600);
\t\t});

\t//добавяне на нови градове при скрол
\t\$(function(\$) { 
\t\t\t\$('#econt_city_locator_radio_box').on('scroll', function(e) { 
\t\t\t\t\te.stopImmediatePropagation();
\t\t\t\t\tif(\$(this).scrollTop() + \$(this).innerHeight()+50 >= \$(this)[0].scrollHeight) { 
\t\t\t\t\t\tvar city_page = parseInt(\$('#econt_city_page').val());
\t\t\t\t\t\t\$('#econt_city_page').val(city_page+1);
\t\t\t\t\t\tgetCitiesHtml();
\t\t\t\t\t} 
\t\t\t\t})
\t\t});

\t//добавяне на слектирания град и извикваме квартали и улици спрямо него
\t\$(document).delegate('#econt_city_locator .radio_elements input[type=\\'radio\\']', 'click', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar econt_address_city_id = \$(this).val();
\t\t\tvar econt_address_city = \$(this).data('name');
\t\t\tvar econt_address_city_select = \$(this).data('select');
\t\t\t\$('#econt_address_city_id').val(econt_address_city_id);
\t\t\t\$('#econt_address_city').val(econt_address_city);
\t\t\t\$('#econt_address_city_select').val(econt_address_city_select);

\t\t\t\$('.tk_all_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\t\$('#tk_checkout').css('opacity','0.6');
\t\t\t\$('#tk_checkout').css('pointer-events','none');
\t\t\t\$('#tk_button_confirm').prop('disabled', true);
\t\t\t\$('.tk_econt_address_city_select').addClass('tk_redy_box');
\t\t\tgetQuarterStreet();
\t\t\t\$.magnificPopup.close()
\t\t});

\t//попъп за квартали
\t\$(document).on('click', '#econt_quarter_select', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$.magnificPopup.open( { 
\t\t\t\t\ttype: 'inline',
\t\t\t\t\titems: { src: '#econt_quarter_locator'} 
\t\t\t\t});
\t\t\tsetTimeout(function () { 
\t\t\t\t\t\$('#econt_quarter_search').focus();
\t\t\t\t} , 500);
\t\t});
\t 
\t//въвеждане на квартал ръчно
\t\$(\"#econt_quarter_search\").on(\"keyup\", function(e) { 
\t\t\te.stopImmediatePropagation(); 
\t\t\tvar value = \$(this).val().toLowerCase();
\t\t\tvar bg_value = transliterate(value);
\t\t\tvar en_value = transliterateEN(value);
\t\t\t\$(\"#econt_quarter_locator .radio_box .radio_elements\").filter(function() { 
\t\t\t\t\t\$(this).toggle((\$(this).text().toLowerCase().indexOf(value) > -1 || \$(this).text().toLowerCase().indexOf(bg_value) > -1 || \$(this).text().toLowerCase().indexOf(en_value) > -1));
\t\t\t\t});
\t\t});

\t//добавяне на селектирания кавартал
\t\$(document).delegate('#econt_quarter_locator .radio_elements input[type=\\'radio\\']', 'click', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar econt_quarter_id = \$(this).val();
\t\t\tvar econt_quarter = \$(this).data('name');
\t\t\t\$('#econt_quarter_id').val(econt_quarter_id);
\t\t\t\$('#econt_quarter').val(econt_quarter);
\t\t\t\$('#econt_quarter_select').val(econt_quarter);
\t\t
\t\t\t\$('.tk_econt_quarter_select').addClass('tk_redy_box');

\t\t\tsaveData();
\t\t\t\$.magnificPopup.close()
\t\t});

\t//попъп за улици
\t\$(document).on('click', '#econt_street_select', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$.magnificPopup.open( { 
\t\t\t\t\ttype: 'inline',
\t\t\t\t\titems: { src: '#econt_street_locator'} 
\t\t\t\t});
\t\t\tgetStreetsHtml();
\t\t\tsetTimeout(function () { 
\t\t\t\t\t\$('#econt_street_search').focus();
\t\t\t\t} , 500);
\t\t});
 
\t//въвеждане на улица ръчно
\t\$('#econt_street_search').on('input',function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$('#street_page').val(1);
\t\t\tgetStreetsHtml();
\t\t\tvar container = \$('#econt_street_locator_radio_box');
\t\t\tvar top = \$('#econt_street_locator_radio_box .radio_box_top').position().top,currentScroll = container.scrollTop();
\t\t\tcontainer.animate( { 
\t\t\t\t\tscrollTop: currentScroll + top + 50
\t\t\t\t} , 600);
 
\t\t});

\t//добавяне на нови улици при скрол
\t\$(function(\$) { 
\t\t\t\$('#econt_street_locator_radio_box').on('scroll', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\t\tif(\$(this).scrollTop() + \$(this).innerHeight()+50 >= \$(this)[0].scrollHeight) { 
\t\t\t\t\t\tvar street_page = parseInt(\$('#econt_street_page').val());
\t\t\t\t\t\t\$('#econt_street_page').val(street_page+1);
\t\t\t\t\t\tgetStreetsHtml();
\t\t\t\t\t} 
\t\t\t\t})
\t\t});

\t//добавяне на селектираната улица
\t\$(document).delegate('#econt_street_locator .radio_box input[type=\\'radio\\']', 'click', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar econt_street_id = \$(this).val();
\t\t\tvar econt_street = \$(this).data('name');
\t\t\t\$('#econt_street_id').val(econt_street_id);
\t\t\t\$('#econt_street').val(econt_street);
\t\t\t\$('#econt_street_select').val(econt_street);

\t\t\t\$('.tk_econt_street_select').addClass('tk_redy_box');
\t\t\t
\t\t\tsaveData();
\t\t\t\$.magnificPopup.close()
\t\t});


\t//извежда списъка с градове в попъпа
\tfunction getCitiesHtml() { 
\t\tvar url = 'index.php?route=extension/shipping/tk_econt/autocompleteCity';
\t\tvar filter_name = \$('input[name=\\'econt_city_search\\']').val();
\t\tvar filter_page = \$('input[name=\\'econt_city_page\\']').val();

\t\tif (filter_name) { 
\t\t\turl += '&filter_name=' + encodeURIComponent(filter_name);
\t\t} 
\t\t
\t\tif (filter_page) { 
\t\t\turl += '&page=' + filter_page;
\t\t} 
\t\t 
\t\t\$.ajax( { 
\t\t\t\turl: url,
\t\t\t\tbeforeSend: function() { 
\t\t\t\t\t\$('.econt_city_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\t\t} ,
\t\t\t\tsuccess: function(data) { 
\t\t\t\t\t\$('.econt_city_spin').html('');
\t \t\t\t\t
\t\t\t\t\tif (filter_name && filter_page == 1) { 
\t\t\t\t\t\t\$('#econt_city_locator .radio_box_html').html('');
\t\t\t\t\t} 

\t\t\t\t\thtml = '';
\t\t\t\t\tif(data) { 
\t\t\t\t\t\t//JSON.parse(data)
\t\t\t\t\t\t\$.map(data, function(item) { 
\t\t\t\t\t\t\t\thtml += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_econt_address_city_id\" value=\"' + item['city_id'] + '\" data-name=\"' + item['name'] + '\" data-select=\"' + item['post_code'] + ' ' + item['name'] + '\"><span>' + item['post_code'] + '</span> ' + item['type'] + ' ' + item['name'] + '</label></div>';
\t\t\t\t\t\t\t});
\t\t\t\t\t} 
\t\t\t\t\t\$('#econt_city_locator .radio_box_html').append(html);

\t\t\t\t} 
\t\t\t});
\t} 

\t//извежда списъка с улици в попъпа
\tfunction getStreetsHtml() { 
\t\tvar url = 'index.php?route=extension/shipping/tk_econt/autocompleteStreet';
\t\tvar filter_name = \$('input[name=\\'econt_street_search\\']').val();
\t\tvar filter_page = \$('input[name=\\'econt_street_page\\']').val();
\t\tvar city_id = \$('#econt_address_city_id').val();

\t\tif (filter_name) { 
\t\t\turl += '&filter_name=' + encodeURIComponent(filter_name);
\t\t} 
\t\t
\t\tif (filter_page) { 
\t\t\turl += '&page=' + filter_page;
\t\t} 
\t\t
\t\turl += '&city_id=' + city_id;
\t\t 
\t\t\$.ajax( { 
\t\t\t\turl: url,
\t\t\t\tbeforeSend: function() { 
\t\t\t\t\t\$('.econt_street_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\t\t} ,
\t\t\t\tsuccess: function(data) { 
\t\t\t\t\t\$('.econt_street_spin').html('');
\t \t\t\t\t
\t\t\t\t\tif (filter_name && filter_page == 1) { 
\t\t\t\t\t\t\$('#econt_street_locator .radio_box_html').html('');
\t\t\t\t\t} 

\t\t\t\t\thtml = '';
\t\t\t\t\tif(data) { 
\t\t\t\t\t\t\$.map(data, function(item) { 
\t\t\t\t\t\t\t\thtml += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_econt_street_id\" value=\"' + item['street_id'] + '\" data-name=\"' + item['name'] + '\">' + item['name'] + '</label></div>';
\t\t\t\t\t\t\t});
\t\t\t\t\t} 
\t\t\t\t\t
\t\t\t\t\t\$('#econt_street_locator .radio_box_html').append(html);

\t\t\t\t} 
\t\t\t});
\t 
\t} 

\t//извежда кварталите и улиците спрямо избрания град\t
\t//извиква призчислени методи за доставка => извежда преизчислени тотали в количката
\t//ако имаме само 1 улица или 1 квартал ги селектираме
\t//ако няма улици или квартали ги изключваме
\tfunction getQuarterStreet() { 
\t\t\$('#econt_quarter_id').val('');
\t\t\$('#econt_quarter').val('');
\t\t\$('#econt_quarter_select').val('');
\t\t\$('#econt_street_id').val('');
\t\t\$('#econt_street').val('');
\t\t\$('#econt_street_select').val('');
\t\t\$('#econt_street_num').val('');
\t\t\$('#econt_other').val('');
\t\t\$('#econt_address_postcode').val('');
\t\t
\t\t\$('.tk_econt_quarter_select').removeClass('tk_redy_box');
\t\t\$('.tk_econt_street_select').removeClass('tk_redy_box');
\t\t\$('#tk_econt_street_num').removeClass('tk_redy_box');
\t\t
\t\tcity_id = \$('#econt_address_city_id').val();
\t\t
\t\tif(city_id > 0) { 
\t\t\t\$.ajax( { 
\t\t\t\t\turl: 'index.php?route=extension/shipping/tk_econt/getQuartereStreet',
\t\t\t\t\ttype: 'POST',
\t\t\t\t\tdata: 'city_id=' + encodeURIComponent(city_id),
\t\t\t\t\tdataType: 'json',
\t\t\t\t\tsuccess: function(data) { 
\t\t\t\t\t\tif (data) { 
\t\t\t\t\t\t\t\$('#econt_street_select').prop(\"disabled\", false);
\t\t\t\t\t\t\t\$('#econt_quarter_select').prop(\"disabled\", false);
\t\t\t\t\t\t\t\$('#econt_street_num').prop(\"disabled\", false);
\t\t\t\t\t\t
\t\t\t\t\t\t\t\$('#econt_address_postcode').val(data.city_post_code);
\t\t
\t\t\t\t\t\t\t//скрипт за квартали
\t\t\t\t\t\t\tif (data.quarters_count && data.quarters_count > 0) { 
\t\t\t\t\t\t\t\t\$('#econt_quarter_select').prop(\"disabled\", false);
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t//ако има повече от 1 квартал извежда слектор ако е 1 го селектираме, ако няма квартали изключваме полето
\t\t\t\t\t\t\t\tif(data.quarters_count > 1) { 
\t\t
\t\t\t\t\t\t\t\t\thtml_popup = '';
\t\t\t\t\t\t\t\t\tfor (i = 0; i < data.quarters.length; i++) { 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
        // line 453
        if ((isset($context["econt_quarter_id"]) ? $context["econt_quarter_id"] : null)) {
            echo " 
\t\t\t\t\t\t\t\t\t\tvar quarter_id = ";
            // line 454
            echo (isset($context["econt_quarter_id"]) ? $context["econt_quarter_id"] : null);
            echo ";
\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 455
            echo " 
\t\t\t\t\t\t\t\t\t\tvar quarter_id = 0;
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 457
        echo " 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\tif(quarter_id == data.quarters[i]['quarter_id']) { 
\t\t\t\t\t\t\t\t\t\t\tvar quarter_checked = 'checked=\"\"';
\t\t\t\t\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\t\t\t\t\tvar quarter_checked = '';
\t\t\t\t\t\t\t\t\t\t} 

\t\t\t\t\t\t\t\t\t\thtml_popup += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_econt_quarter_id\" value=\"' + data.quarters[i]['quarter_id'] + '\" ' + quarter_checked + ' data-name=\"' + data.quarters[i]['name'] + '\">' + data.quarters[i]['name'] + '</label></div>';
\t\t\t\t\t\t\t\t\t} 
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\$('#econt_quarter_locator .radio_box').html(html_popup);

\t\t\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\t\t\tfor (i = 0; i < data.quarters.length; i++) { 
\t\t\t\t\t\t\t\t\t\tvar econt_quarter_id = data.quarters[i]['quarter_id'];
\t\t\t\t\t\t\t\t\t\tvar econt_quarter = data.quarters[i]['name'];
\t\t\t\t\t\t\t\t\t} 
\t\t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t\t\t\$('#econt_quarter_id').val(econt_quarter_id);
\t\t\t\t\t\t\t\t\t\$('#econt_quarter').val(econt_quarter);
\t\t\t\t\t\t\t\t\t\$('#econt_quarter_select').val(econt_quarter);
\t\t\t\t\t\t\t\t\t\$('#econt_quarter_select').prop(\"disabled\", true);
\t\t\t\t\t\t\t\t\t\$('.tk_econt_quarter_select').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t} 
\t\t\t\t\t
\t\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\t\t\$('#econt_quarter_id').val('');
\t\t\t\t\t\t\t\t\$('#econt_quarter').val('');
\t\t\t\t\t\t\t\t\$('#econt_quarter_select').val('');
\t\t\t\t\t\t\t\t\$('#econt_quarter_select').prop(\"disabled\", true);
\t\t\t\t\t\t\t\t\$('.tk_econt_quarter_select').addClass('tk_redy_box');
\t\t\t\t\t\t\t} 
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t//скрипт за улици
\t\t\t\t\t\t\tif (data.streets_count && data.streets_count > 0) { 
\t\t\t\t\t\t\t\t\$('#econt_street_select').prop(\"disabled\", false);
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#tk_econt_quarter_select').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_econt_block_no').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_econt_entrance_no').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_econt_floor_no').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_econt_apartment_no').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_econt_street_select').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_econt_street_num').css('display','block');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#tk_econt_no_street').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_econt_help_address').css('display','block');

\t\t\t\t\t\t\t\t\$('#tk_econt_address_city_select').removeClass('tk_12_column');
\t\t\t\t\t\t\t\t\$('#tk_econt_address_city_select').addClass('tk_6_column');
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t//ако има повече от 1 улици извежда слектор ако е 1 я селектираме, ако няма изключваме полето
\t\t\t\t\t\t\t\tif(data.streets_count > 1) { 
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\thtml_popup = '';
\t\t\t\t\t\t\t\t\tfor (i = 0; i < data.streets.length; i++) { 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
        // line 515
        if ((isset($context["econt_street_id"]) ? $context["econt_street_id"] : null)) {
            echo " 
\t\t\t\t\t\t\t\t\t\tvar street_id = ";
            // line 516
            echo (isset($context["econt_street_id"]) ? $context["econt_street_id"] : null);
            echo ";
\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 517
            echo " 
\t\t\t\t\t\t\t\t\t\tvar street_id = 0;
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 519
        echo " 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\tif(street_id == data.streets[i]['street_id']) { 
\t\t\t\t\t\t\t\t\t\t\tvar street_checked = 'checked=\"\"';
\t\t\t\t\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\t\t\t\t\tvar street_checked = '';
\t\t\t\t\t\t\t\t\t\t} 

\t\t\t\t\t\t\t\t\t\thtml_popup += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_econt_street_id\" value=\"' + data.streets[i]['street_id'] + '\" ' + street_checked + ' data-name=\"' + data.streets[i]['name'] + '\">' + data.streets[i]['name'] + '</label></div>';
\t\t\t\t\t\t\t\t\t} 
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\$('#econt_street_locator .radio_box_html').html(html_popup);
\t \t\t\t\t\t\t\t
\t \t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\t\t\tfor (i = 0; i < data.streets.length; i++) { 
\t\t\t\t\t\t\t\t\t\tvar econt_street_id = data.streets[i]['street_id'];
\t\t\t\t\t\t\t\t\t\tvar econt_street = data.streets[i]['name'];
\t\t\t\t\t\t\t\t\t} 
\t\t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t\t\t\$('#econt_street_id').val(econt_street_id);
\t\t\t\t\t\t\t\t\t\$('#econt_street').val(econt_street);
\t\t\t\t\t\t\t\t\t\$('#econt_street_select').val(econt_street);
\t\t\t\t\t\t\t\t\t\$('#econt_street_select').prop(\"disabled\", true);
\t\t\t\t\t\t\t\t\t\$('.tk_econt_street_select').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\$('#econt_street_num').val('1');
\t\t\t\t\t\t\t\t\t\$('#tk_econt_street_num').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t\t\t\$('input#street_num').val('1');
\t\t\t\t\t\t\t\t\t\$('input#other').val('Център');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\$('#tk_econt_quarter_select').css('display','none');
\t\t\t\t\t\t\t\t\t\$('#tk_econt_block_no').css('display','none');
\t\t\t\t\t\t\t\t\t\$('#tk_econt_entrance_no').css('display','none');
\t\t\t\t\t\t\t\t\t\$('#tk_econt_floor_no').css('display','none');
\t\t\t\t\t\t\t\t\t\$('#tk_econt_apartment_no').css('display','none');
\t\t\t\t\t\t\t\t\t\$('#tk_econt_street_select').css('display','none');
\t\t\t\t\t\t\t\t\t\$('#tk_econt_street_num').css('display','none');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\$('#tk_econt_no_street').css('display','block');
\t\t\t\t\t\t\t\t\t\$('#tk_econt_help_address').css('display','none');

\t\t\t\t\t\t\t\t\t\$('#tk_econt_address_city_select').removeClass('tk_6_column');
\t\t\t\t\t\t\t\t\t\$('#tk_econt_address_city_select').addClass('tk_12_column');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t} 

\t\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\t\t\$('#econt_street_id').val('');
\t\t\t\t\t\t\t\t\$('#econt_street').val('Център');
\t\t\t\t\t\t\t\t\$('#econt_street_select').val('Център');
\t\t\t\t\t\t\t\t\$('#econt_street_select').prop(\"disabled\", true);
\t\t\t\t\t\t\t\t\$('.tk_econt_street_select').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#econt_street_num').val('1');
\t\t\t\t\t\t\t\t\$('#econt_street_num').prop(\"disabled\", true);
\t\t\t\t\t\t\t\t\$('#tk_econt_street_num').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#econt_street_id').prop(\"disabled\", true);
\t\t\t\t\t\t\t\t\$('.tk_econt_street_id').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('input#street_num').val('');
\t\t\t\t\t\t\t\t\$('input#other').val('');
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#tk_econt_quarter_select').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_econt_block_no').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_econt_entrance_no').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_econt_floor_no').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_econt_apartment_no').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_econt_street_select').css('display','none');
\t\t\t\t\t\t\t\t\$('#tk_econt_street_num').css('display','none');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\$('#tk_econt_no_street').css('display','block');
\t\t\t\t\t\t\t\t\$('#tk_econt_help_address').css('display','none');

\t\t\t\t\t\t\t\t\$('#tk_econt_address_city_select').removeClass('tk_6_column');
\t\t\t\t\t\t\t\t\$('#tk_econt_address_city_select').addClass('tk_12_column');
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t} 
\t\t\t\t\t\t} 
\t\t\t\t\t\t
\t\t\t\t\t\tgetShippingMethodAddress();
\t\t\t\t\t} 
\t\t\t\t});
\t\t} 
\t} 

\t//транслитерация за търсачката
\tfunction transliterate(word) { 
\t\treturn word.split('').map(function (char) { 
\t\t\t\treturn Lat2Cyr[char] || char; 
\t\t\t}).join(\"\");
\t} 

\tLat2Cyr= { \"a\":\"а\",\"b\":\"б\",\"c\":\"ц\",\"d\":\"д\",\"e\":\"е\",\"f\":\"ф\",\"g\":\"г\",\"h\":\"х\",\"i\":\"и\",\"j\":\"ј\",\"k\":\"к\",\"l\":\"л\",\"m\":\"м\",\"n\":\"н\",\"o\":\"о\",\"p\":\"п\",\"q\":\"\",\"r\":\"р\",\"s\":\"с\",\"t\":\"т\",\"u\":\"у\",\"v\":\"в\",\"w\":\"\",\"x\":\"\",\"y\":\"\",\"z\":\"з\",\"A\":\"А\",\"B\":\"Б\",\"C\":\"Ц\",\"D\":\"Д\",\"E\":\"Е\",\"F\":\"Ф\",\"G\":\"Г\",\"H\":\"Х\",\"I\":\"И\",\"J\":\"Ј\",\"K\":\"К\",\"L\":\"Л\",\"M\":\"М\",\"N\":\"Н\",\"O\":\"О\",\"P\":\"П\",\"Q\":\"\",\"R\":\"Р\",\"S\":\"С\",\"T\":\"Т\",\"U\":\"У\",\"V\":\"В\",\"W\":\"\",\"X\":\"\",\"Y\":\"\",\"Z\":\"З\",\"č\":\"ч\",\"ć\":\"ћ\",\"đ\":\"ђ\",\"ž\":\"ж\",\"š\":\"ш\",\"Č\":\"Ч\",\"Ć\":\"Ћ\",\"Đ\":\"Ђ\",\"Ž\":\"Ж\",\"Š\":\"Ш\"} ;
\t
\t//транслитерация за търсачката
\tfunction transliterateEN(word) { 
\t\treturn word.split('').map(function (char) { 
\t\t\t\treturn getKeyByValue(Lat2Cyr,char) || char; 
\t\t\t}).join(\"\");
\t} 
\t 
\tfunction getKeyByValue(object, value) {
\t\treturn Object.keys(object).find(key => object[key] === value);
\t}

</script>";
    }

    public function getTemplateName()
    {
        return "default/template/tk_checkout/econt_address.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  788 => 519,  783 => 517,  778 => 516,  774 => 515,  714 => 457,  709 => 455,  704 => 454,  700 => 453,  384 => 139,  366 => 136,  358 => 133,  334 => 111,  328 => 108,  322 => 107,  317 => 105,  309 => 99,  304 => 98,  300 => 97,  284 => 90,  274 => 89,  269 => 87,  263 => 86,  255 => 81,  249 => 80,  243 => 79,  237 => 76,  231 => 75,  221 => 74,  213 => 69,  206 => 67,  196 => 66,  190 => 63,  182 => 62,  170 => 61,  165 => 59,  161 => 58,  157 => 57,  153 => 56,  149 => 55,  145 => 54,  141 => 53,  131 => 50,  126 => 47,  121 => 45,  113 => 41,  107 => 40,  99 => 34,  80 => 32,  73 => 30,  64 => 24,  58 => 23,  52 => 20,  48 => 18,  43 => 17,  39 => 16,  25 => 5,  19 => 1,);
    }
}
/* <div id="tk_econt_office">*/
/* 	<div class="tk_panel">*/
/* 		<div class="tk_panel_heading">*/
/* 			<span class="tk_panel_icon"><span class="tk_icon-address"></span></span> */
/* 			<span class="tk_panel_text"> {{ text_address }}</span> */
/* 			<span class="tk_all_spin"><i class="tk_icon-spin rotating"></i></span>*/
/* 		</div>				*/
/* 	*/
/* 		<div class="tk_panel_body">*/
/* 			*/
/* 			<div id="tk_econt_offices">*/
/* */
/* 				<input type="hidden" id="shipping_to" name="shipping_to" value="address" />*/
/* 				<input type="hidden" id="shipping_type" name="shipping_type" value="econt" />*/
/* 				*/
/* 				{% if module_tk_checkout_zone is not defined or module_tk_checkout_zone == 0 %} */
/* 				<input type="hidden" id="zone_id" name="zone_id" value="{{ zone_id }}" />*/
/* 				{% endif %} */
/* */
/* 				{% if (econt_addresses_customer) %} */
/* 				<div class="tk_12_column tk_center_column">*/
/* 					<label>*/
/* 						<input type="radio" name="econt_address_type" value="existing" checked="checked" {% if (econt_address_type is defined and econt_address_type == 'existing') %}checked=""{% endif %} onclick="jQuery('#econt_address_new').hide();jQuery('#tk_econt_address_existing').show();" />*/
/* 						{{ text_address_existing }} */
/* 					</label>*/
/* 				</div>*/
/* 				<div id="tk_econt_address_existing">*/
/* 					<div class="tk_12_column tk_center_column">*/
/* 						<select name="econt_address_customer_id" >*/
/* 							{% for econt_address in econt_addresses_customer %} */
/* 							*/
/* 							<option value="{{ econt_address['econt_customer_id'] }}" {% if (econt_address_customer_id is defined and econt_address['econt_customer_id'] == econt_address_customer_id) %}selected="selected"{% endif %}>{{ econt_address['city'] }}, {{ econt_address['street'] }}, {{ econt_address['street_num'] }}</option>*/
/* 								*/
/* 							{% endfor %} */
/* 						</select>*/
/* 					</div>*/
/* 				</div>	 */
/* 				<div class="tk_12_column tk_center_column">*/
/* 					<label>*/
/* 						<input type="radio" name="econt_address_type" value="new" {% if (econt_address_type is defined and econt_address_type == 'new') %}checked=""{% endif %} onclick="jQuery('#econt_address_new').show();jQuery('#tk_econt_address_existing').hide();" />*/
/* 						{{ text_address_new }} */
/* 					</label>*/
/* 				</div>*/
/* 					*/
/* 				{% else %} */
/* 				<input type="hidden" name="econt_address_type" value="new">*/
/* 				{% endif %} */
/* 						*/
/* 						*/
/* 				<div id="econt_address_new" {% if (not econt_addresses_customer or (econt_address_type is defined and econt_address_type == 'new')) %} style="display:block"{% else %}style="display:none"{% endif %}>*/
/* 							*/
/* 					<input type="hidden" name="default" value="1" />*/
/* 					<input type="hidden" id="econt_address_postcode" name="econt_address_postcode" value="{{ econt_address_postcode }}" />*/
/* 					<input type="hidden" id="econt_address_city" name="econt_address_city" value="{{ econt_address_city }}" />*/
/* 					<input type="hidden" id="econt_address_city_id" name="econt_address_city_id" value="{{ econt_address_city_id }}" />*/
/* 					<input type="hidden" id="econt_quarter_id" name="econt_quarter_id" value="{{ econt_quarter_id }}" />*/
/* 					<input type="hidden" id="econt_quarter" name="econt_quarter" value="{{ econt_quarter }}" />*/
/* 					<input type="hidden" id="econt_street_id" name="econt_street_id" value="{{ econt_street_id }}" />*/
/* 					<input type="hidden" id="econt_street" name="econt_street" value="{{ econt_street }}" />*/
/* 						 */
/* 					<div class=" {% if econt_street == 'Център' or econt_streets|length < 2 and econt_address_city %}tk_12_column{% else %}tk_6_column{% endif %} tk_center_column tk_econt_address_city_select tk_required_box {% if (econt_address_city_id) %} tk_redy_box{% endif %}" id="tk_econt_address_city_select">*/
/* 						<input type="text" id="econt_address_city_select" readonly="true" name="econt_address_city_select" value="{% if (econt_address_postcode) %}{{ econt_address_postcode ~ ' ' ~ econt_address_city }}{% endif %}" placeholder="{{ text_econt_office_city }}" />*/
/* 						<span class="tk_floating_label">{{ text_econt_office_city|replace({ ":": "" }) }}</span>*/
/* 					</div>*/
/* 					*/
/* 					<div class="tk_6_column tk_center_column tk_econt_quarter_select {% if (((econt_quarters|length) < 1 or econt_quarter) and econt_address_city) %} tk_redy_box{% endif %}" id="tk_econt_quarter_select" {% if econt_street == 'Център' or econt_streets|length < 2 and econt_address_city %}style="display:none"{% endif %}>	*/
/* 						<input type="text" id="econt_quarter_select" readonly="true" name="econt_quarter_select" value="{{ econt_quarter }}" placeholder="{{entry_quarter }}" />*/
/* 						*/
/* 						<span class="tk_floating_label">{{ entry_quarter|replace({ ":": "" }) }}</span>*/
/* 					</div>*/
/* 						*/
/* 					<div class="tk_clear"></div>*/
/* */
/* 					<div class="tk_6_column tk_center_column tk_econt_street_select {% if (((econt_streets|length) < 1 or econt_street) and econt_address_city) %} tk_redy_box{% endif %}" id="tk_econt_street_select" {% if econt_street == 'Център' or econt_streets|length < 2 and econt_address_city %}style="display:none"{% endif %}>*/
/* 						<input type="text" id="econt_street_select" readonly="true" name="econt_street_select" value="{{ econt_street }}" placeholder="{{entry_street }}" />*/
/* 						<span class="tk_floating_label">{{ entry_street|replace({ ":": "" }) }}</span>*/
/* 					</div>*/
/* 							*/
/* 					<div class="tk_4_column tk_right_column tk_required_box" id="tk_econt_street_num" {% if econt_street == 'Център' or econt_streets|length < 2 and econt_address_city %}style="display:none"{% endif %}>*/
/* 						<input type="text" id="econt_street_num" name="econt_street_num" value="{{ econt_street_num }}" placeholder="{{entry_street_num }}" />*/
/* 						<span class="tk_floating_label">{{entry_street_num }}</span>*/
/* 					</div>*/
/* 					<div class="tk_clear"></div>*/
/* 							*/
/* 					<div class="tk_12_column tk_center_column " id="tk_econt_other">*/
/* 						<input type="text" id="econt_other" name="econt_other" value="{{ econt_other }}" placeholder="{{entry_other }}" />*/
/* 						<span class="tk_floating_label">{{entry_other }}</span>*/
/* */
/* 						<div id="tk_econt_no_street" {% if econt_street == 'Център' or econt_streets|length < 2 and econt_address_city %}style="display:block"{% else %}style="display: none"{% endif %}><hr> <span class="tk_text_free_shipping">{{ text_no_street }}</span></div>*/
/* 						<div id="tk_econt_help_address" {% if econt_street == 'Център' or econt_streets|length < 2 and econt_address_city %}style="display:none"{% else %}style="display: block"{% endif %}><hr> <span class="tk_text_free_shipping">{{ text_help_address }}</span></div>*/
/* */
/* 					</div>*/
/* 	*/
/* 				</div>*/
/* */
/* 				<div class="tk_clear"></div>*/
/* 				{% if (error_address) %} */
/* 				<span class="tk_alert">{{ error_address }}</span>*/
/* 				{% endif %} */
/* 	*/
/* 			</div>	*/
/* 			<div class="tk_clear"></div>*/
/* 	*/
/* 			*/
/* 			{% if (econt_sms_enabled) %} */
/* 			<div class="tk_12_column tk_center_column">*/
/* 				<input type="checkbox" name="econt_sms" id="econt_sms" value="1" {% if (econt_sms and econt_sms == 2) %}checked=""{% endif %}>*/
/* 				<label for="econt_sms"> {{ text_sms }}</label>*/
/* 			</div>*/
/* 			{% endif %}*/
/* 		</div> */
/* 	</div>*/
/* </div>*/
/* */
/* <div class="econt_city_container radio_container mfp-hide" id="econt_city_locator">*/
/* 	<div class="radio_search">*/
/* 		<span class="econt_city_spin pull-right magnific_spin"></span>*/
/* 		<input id="econt_city_search" name="econt_city_search" type="text" placeholder="Търсене.." class="radio_box_search">*/
/* 	</div>*/
/* 	<div class="radio_box" id="econt_city_locator_radio_box">*/
/* 		<span class="radio_box_top"></span>*/
/* 		<div class="radio_box_html"></div>*/
/* 		<span class="last_element_city"></span>*/
/* 	</div>*/
/* 	<input id="econt_city_page" name="econt_city_page" type="hidden" value="1">*/
/* </div>*/
/* */
/* <div class="econt_quarter_container radio_container mfp-hide" id="econt_quarter_locator">*/
/* 	<div class="radio_search">*/
/* 		<input id="econt_quarter_search" name="econt_quarter_search" type="text" placeholder="Търсене.." class="radio_box_search">*/
/* 	</div>*/
/* 	<div class="radio_box">*/
/* 		{% for quarter in econt_quarters %} */
/* 		<div class="radio_elements">*/
/* 			<label>*/
/* 				<input type="radio" name="tk_econt_quarter_id" value="{{ quarter['quarter_id'] }}" {% if (quarter_id is defined and quarter['quarter_id'] == quarter_id) %}checked=""{% endif %} data-name="{{ quarter['name'] }}">{{ quarter['name'] }} */
/* 			</label>*/
/* 		</div>*/
/* 		{% endfor %} */
/* 	</div>*/
/* </div>*/
/* */
/* <div class="econt_street_container radio_container mfp-hide" id="econt_street_locator">*/
/* 	<div class="radio_search">*/
/* 		<span class="econt_street_spin pull-right magnific_spin"></span>*/
/* 		<input id="econt_street_search" name="econt_street_search" type="text" placeholder="Търсене.." class=" radio_box_search">*/
/* 		*/
/* 	</div>*/
/* 	<div class="radio_box" id="econt_street_locator_radio_box">*/
/* 		<span class="radio_box_top"></span>*/
/* 		<div class="radio_box_html"></div>*/
/* 		<span class="last_element_street"></span>*/
/* 	</div>*/
/* 	<input id="econt_street_page" name="econt_street_page" type="hidden" value="1">*/
/* </div>*/
/* */
/* <script type="text/javascript">*/
/* */
/* 	$(document).ready(function() { */
/* 			getPaymentMethod();*/
/* 		});*/
/* 	*/
/* 	$(document).on('click', '#econt_sms', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 			$('#tk_checkout').css('opacity','0.6');*/
/* 			$('#tk_checkout').css('pointer-events','none');*/
/* 			$('#tk_button_confirm').prop('disabled', true);	*/
/* 			*/
/* 			getShippingMethodAddress();*/
/* 		});*/
/* 	 */
/* 	 */
/* 	$('#econt_street_num').change(function() { saveData(); } );*/
/* 	$('#econt_other').change(function() { saveData(); } );*/
/* */
/* 	//попъп за градове*/
/* 	$(document).on('click', '#econt_address_city_select', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$.magnificPopup.open( { */
/* 					type: 'inline',*/
/* 					items: { src: '#econt_city_locator'} */
/* 				});*/
/* 			getCitiesHtml();*/
/* 			setTimeout(function () { */
/* 					$('#econt_city_search').focus();*/
/* 				} , 200);*/
/*  */
/* 		});*/
/* */
/* 	//въвеждане на град ръчно*/
/* 	$('#econt_city_search').on('input',function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$('#econt_city_page').val(1);*/
/* 			getCitiesHtml();*/
/* 			var container = $('#econt_city_locator_radio_box');*/
/* 			var top = $('#econt_city_locator_radio_box .radio_box_top').position().top,currentScroll = container.scrollTop();*/
/* 			container.animate( { */
/* 					scrollTop: currentScroll + top + 50*/
/* 				} , 600);*/
/* 		});*/
/* */
/* 	//добавяне на нови градове при скрол*/
/* 	$(function($) { */
/* 			$('#econt_city_locator_radio_box').on('scroll', function(e) { */
/* 					e.stopImmediatePropagation();*/
/* 					if($(this).scrollTop() + $(this).innerHeight()+50 >= $(this)[0].scrollHeight) { */
/* 						var city_page = parseInt($('#econt_city_page').val());*/
/* 						$('#econt_city_page').val(city_page+1);*/
/* 						getCitiesHtml();*/
/* 					} */
/* 				})*/
/* 		});*/
/* */
/* 	//добавяне на слектирания град и извикваме квартали и улици спрямо него*/
/* 	$(document).delegate('#econt_city_locator .radio_elements input[type=\'radio\']', 'click', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var econt_address_city_id = $(this).val();*/
/* 			var econt_address_city = $(this).data('name');*/
/* 			var econt_address_city_select = $(this).data('select');*/
/* 			$('#econt_address_city_id').val(econt_address_city_id);*/
/* 			$('#econt_address_city').val(econt_address_city);*/
/* 			$('#econt_address_city_select').val(econt_address_city_select);*/
/* */
/* 			$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 			$('#tk_checkout').css('opacity','0.6');*/
/* 			$('#tk_checkout').css('pointer-events','none');*/
/* 			$('#tk_button_confirm').prop('disabled', true);*/
/* 			$('.tk_econt_address_city_select').addClass('tk_redy_box');*/
/* 			getQuarterStreet();*/
/* 			$.magnificPopup.close()*/
/* 		});*/
/* */
/* 	//попъп за квартали*/
/* 	$(document).on('click', '#econt_quarter_select', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$.magnificPopup.open( { */
/* 					type: 'inline',*/
/* 					items: { src: '#econt_quarter_locator'} */
/* 				});*/
/* 			setTimeout(function () { */
/* 					$('#econt_quarter_search').focus();*/
/* 				} , 500);*/
/* 		});*/
/* 	 */
/* 	//въвеждане на квартал ръчно*/
/* 	$("#econt_quarter_search").on("keyup", function(e) { */
/* 			e.stopImmediatePropagation(); */
/* 			var value = $(this).val().toLowerCase();*/
/* 			var bg_value = transliterate(value);*/
/* 			var en_value = transliterateEN(value);*/
/* 			$("#econt_quarter_locator .radio_box .radio_elements").filter(function() { */
/* 					$(this).toggle(($(this).text().toLowerCase().indexOf(value) > -1 || $(this).text().toLowerCase().indexOf(bg_value) > -1 || $(this).text().toLowerCase().indexOf(en_value) > -1));*/
/* 				});*/
/* 		});*/
/* */
/* 	//добавяне на селектирания кавартал*/
/* 	$(document).delegate('#econt_quarter_locator .radio_elements input[type=\'radio\']', 'click', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var econt_quarter_id = $(this).val();*/
/* 			var econt_quarter = $(this).data('name');*/
/* 			$('#econt_quarter_id').val(econt_quarter_id);*/
/* 			$('#econt_quarter').val(econt_quarter);*/
/* 			$('#econt_quarter_select').val(econt_quarter);*/
/* 		*/
/* 			$('.tk_econt_quarter_select').addClass('tk_redy_box');*/
/* */
/* 			saveData();*/
/* 			$.magnificPopup.close()*/
/* 		});*/
/* */
/* 	//попъп за улици*/
/* 	$(document).on('click', '#econt_street_select', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$.magnificPopup.open( { */
/* 					type: 'inline',*/
/* 					items: { src: '#econt_street_locator'} */
/* 				});*/
/* 			getStreetsHtml();*/
/* 			setTimeout(function () { */
/* 					$('#econt_street_search').focus();*/
/* 				} , 500);*/
/* 		});*/
/*  */
/* 	//въвеждане на улица ръчно*/
/* 	$('#econt_street_search').on('input',function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$('#street_page').val(1);*/
/* 			getStreetsHtml();*/
/* 			var container = $('#econt_street_locator_radio_box');*/
/* 			var top = $('#econt_street_locator_radio_box .radio_box_top').position().top,currentScroll = container.scrollTop();*/
/* 			container.animate( { */
/* 					scrollTop: currentScroll + top + 50*/
/* 				} , 600);*/
/*  */
/* 		});*/
/* */
/* 	//добавяне на нови улици при скрол*/
/* 	$(function($) { */
/* 			$('#econt_street_locator_radio_box').on('scroll', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 					if($(this).scrollTop() + $(this).innerHeight()+50 >= $(this)[0].scrollHeight) { */
/* 						var street_page = parseInt($('#econt_street_page').val());*/
/* 						$('#econt_street_page').val(street_page+1);*/
/* 						getStreetsHtml();*/
/* 					} */
/* 				})*/
/* 		});*/
/* */
/* 	//добавяне на селектираната улица*/
/* 	$(document).delegate('#econt_street_locator .radio_box input[type=\'radio\']', 'click', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var econt_street_id = $(this).val();*/
/* 			var econt_street = $(this).data('name');*/
/* 			$('#econt_street_id').val(econt_street_id);*/
/* 			$('#econt_street').val(econt_street);*/
/* 			$('#econt_street_select').val(econt_street);*/
/* */
/* 			$('.tk_econt_street_select').addClass('tk_redy_box');*/
/* 			*/
/* 			saveData();*/
/* 			$.magnificPopup.close()*/
/* 		});*/
/* */
/* */
/* 	//извежда списъка с градове в попъпа*/
/* 	function getCitiesHtml() { */
/* 		var url = 'index.php?route=extension/shipping/tk_econt/autocompleteCity';*/
/* 		var filter_name = $('input[name=\'econt_city_search\']').val();*/
/* 		var filter_page = $('input[name=\'econt_city_page\']').val();*/
/* */
/* 		if (filter_name) { */
/* 			url += '&filter_name=' + encodeURIComponent(filter_name);*/
/* 		} */
/* 		*/
/* 		if (filter_page) { */
/* 			url += '&page=' + filter_page;*/
/* 		} */
/* 		 */
/* 		$.ajax( { */
/* 				url: url,*/
/* 				beforeSend: function() { */
/* 					$('.econt_city_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 				} ,*/
/* 				success: function(data) { */
/* 					$('.econt_city_spin').html('');*/
/* 	 				*/
/* 					if (filter_name && filter_page == 1) { */
/* 						$('#econt_city_locator .radio_box_html').html('');*/
/* 					} */
/* */
/* 					html = '';*/
/* 					if(data) { */
/* 						//JSON.parse(data)*/
/* 						$.map(data, function(item) { */
/* 								html += '<div class="radio_elements"><label><input type="radio" name="tk_econt_address_city_id" value="' + item['city_id'] + '" data-name="' + item['name'] + '" data-select="' + item['post_code'] + ' ' + item['name'] + '"><span>' + item['post_code'] + '</span> ' + item['type'] + ' ' + item['name'] + '</label></div>';*/
/* 							});*/
/* 					} */
/* 					$('#econt_city_locator .radio_box_html').append(html);*/
/* */
/* 				} */
/* 			});*/
/* 	} */
/* */
/* 	//извежда списъка с улици в попъпа*/
/* 	function getStreetsHtml() { */
/* 		var url = 'index.php?route=extension/shipping/tk_econt/autocompleteStreet';*/
/* 		var filter_name = $('input[name=\'econt_street_search\']').val();*/
/* 		var filter_page = $('input[name=\'econt_street_page\']').val();*/
/* 		var city_id = $('#econt_address_city_id').val();*/
/* */
/* 		if (filter_name) { */
/* 			url += '&filter_name=' + encodeURIComponent(filter_name);*/
/* 		} */
/* 		*/
/* 		if (filter_page) { */
/* 			url += '&page=' + filter_page;*/
/* 		} */
/* 		*/
/* 		url += '&city_id=' + city_id;*/
/* 		 */
/* 		$.ajax( { */
/* 				url: url,*/
/* 				beforeSend: function() { */
/* 					$('.econt_street_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 				} ,*/
/* 				success: function(data) { */
/* 					$('.econt_street_spin').html('');*/
/* 	 				*/
/* 					if (filter_name && filter_page == 1) { */
/* 						$('#econt_street_locator .radio_box_html').html('');*/
/* 					} */
/* */
/* 					html = '';*/
/* 					if(data) { */
/* 						$.map(data, function(item) { */
/* 								html += '<div class="radio_elements"><label><input type="radio" name="tk_econt_street_id" value="' + item['street_id'] + '" data-name="' + item['name'] + '">' + item['name'] + '</label></div>';*/
/* 							});*/
/* 					} */
/* 					*/
/* 					$('#econt_street_locator .radio_box_html').append(html);*/
/* */
/* 				} */
/* 			});*/
/* 	 */
/* 	} */
/* */
/* 	//извежда кварталите и улиците спрямо избрания град	*/
/* 	//извиква призчислени методи за доставка => извежда преизчислени тотали в количката*/
/* 	//ако имаме само 1 улица или 1 квартал ги селектираме*/
/* 	//ако няма улици или квартали ги изключваме*/
/* 	function getQuarterStreet() { */
/* 		$('#econt_quarter_id').val('');*/
/* 		$('#econt_quarter').val('');*/
/* 		$('#econt_quarter_select').val('');*/
/* 		$('#econt_street_id').val('');*/
/* 		$('#econt_street').val('');*/
/* 		$('#econt_street_select').val('');*/
/* 		$('#econt_street_num').val('');*/
/* 		$('#econt_other').val('');*/
/* 		$('#econt_address_postcode').val('');*/
/* 		*/
/* 		$('.tk_econt_quarter_select').removeClass('tk_redy_box');*/
/* 		$('.tk_econt_street_select').removeClass('tk_redy_box');*/
/* 		$('#tk_econt_street_num').removeClass('tk_redy_box');*/
/* 		*/
/* 		city_id = $('#econt_address_city_id').val();*/
/* 		*/
/* 		if(city_id > 0) { */
/* 			$.ajax( { */
/* 					url: 'index.php?route=extension/shipping/tk_econt/getQuartereStreet',*/
/* 					type: 'POST',*/
/* 					data: 'city_id=' + encodeURIComponent(city_id),*/
/* 					dataType: 'json',*/
/* 					success: function(data) { */
/* 						if (data) { */
/* 							$('#econt_street_select').prop("disabled", false);*/
/* 							$('#econt_quarter_select').prop("disabled", false);*/
/* 							$('#econt_street_num').prop("disabled", false);*/
/* 						*/
/* 							$('#econt_address_postcode').val(data.city_post_code);*/
/* 		*/
/* 							//скрипт за квартали*/
/* 							if (data.quarters_count && data.quarters_count > 0) { */
/* 								$('#econt_quarter_select').prop("disabled", false);*/
/* 								*/
/* 								//ако има повече от 1 квартал извежда слектор ако е 1 го селектираме, ако няма квартали изключваме полето*/
/* 								if(data.quarters_count > 1) { */
/* 		*/
/* 									html_popup = '';*/
/* 									for (i = 0; i < data.quarters.length; i++) { */
/* 										*/
/* 										{% if (econt_quarter_id) %} */
/* 										var quarter_id = {{ econt_quarter_id}};*/
/* 										{% else %} */
/* 										var quarter_id = 0;*/
/* 										{% endif %} */
/* 										*/
/* 										if(quarter_id == data.quarters[i]['quarter_id']) { */
/* 											var quarter_checked = 'checked=""';*/
/* 										} else { */
/* 											var quarter_checked = '';*/
/* 										} */
/* */
/* 										html_popup += '<div class="radio_elements"><label><input type="radio" name="tk_econt_quarter_id" value="' + data.quarters[i]['quarter_id'] + '" ' + quarter_checked + ' data-name="' + data.quarters[i]['name'] + '">' + data.quarters[i]['name'] + '</label></div>';*/
/* 									} */
/* 									*/
/* 									$('#econt_quarter_locator .radio_box').html(html_popup);*/
/* */
/* 								} else { */
/* 									for (i = 0; i < data.quarters.length; i++) { */
/* 										var econt_quarter_id = data.quarters[i]['quarter_id'];*/
/* 										var econt_quarter = data.quarters[i]['name'];*/
/* 									} */
/* 									 */
/* 									$('#econt_quarter_id').val(econt_quarter_id);*/
/* 									$('#econt_quarter').val(econt_quarter);*/
/* 									$('#econt_quarter_select').val(econt_quarter);*/
/* 									$('#econt_quarter_select').prop("disabled", true);*/
/* 									$('.tk_econt_quarter_select').addClass('tk_redy_box');*/
/* 								} */
/* 					*/
/* 							} else { */
/* 								$('#econt_quarter_id').val('');*/
/* 								$('#econt_quarter').val('');*/
/* 								$('#econt_quarter_select').val('');*/
/* 								$('#econt_quarter_select').prop("disabled", true);*/
/* 								$('.tk_econt_quarter_select').addClass('tk_redy_box');*/
/* 							} */
/* 							*/
/* 							//скрипт за улици*/
/* 							if (data.streets_count && data.streets_count > 0) { */
/* 								$('#econt_street_select').prop("disabled", false);*/
/* 								*/
/* 								$('#tk_econt_quarter_select').css('display','block');*/
/* 								$('#tk_econt_block_no').css('display','block');*/
/* 								$('#tk_econt_entrance_no').css('display','block');*/
/* 								$('#tk_econt_floor_no').css('display','block');*/
/* 								$('#tk_econt_apartment_no').css('display','block');*/
/* 								$('#tk_econt_street_select').css('display','block');*/
/* 								$('#tk_econt_street_num').css('display','block');*/
/* 									*/
/* 								$('#tk_econt_no_street').css('display','none');*/
/* 								$('#tk_econt_help_address').css('display','block');*/
/* */
/* 								$('#tk_econt_address_city_select').removeClass('tk_12_column');*/
/* 								$('#tk_econt_address_city_select').addClass('tk_6_column');*/
/* 								*/
/* 								//ако има повече от 1 улици извежда слектор ако е 1 я селектираме, ако няма изключваме полето*/
/* 								if(data.streets_count > 1) { */
/* 							*/
/* 									html_popup = '';*/
/* 									for (i = 0; i < data.streets.length; i++) { */
/* 										*/
/* 										{% if (econt_street_id) %} */
/* 										var street_id = {{ econt_street_id}};*/
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
/* 										html_popup += '<div class="radio_elements"><label><input type="radio" name="tk_econt_street_id" value="' + data.streets[i]['street_id'] + '" ' + street_checked + ' data-name="' + data.streets[i]['name'] + '">' + data.streets[i]['name'] + '</label></div>';*/
/* 									} */
/* 									*/
/* 									$('#econt_street_locator .radio_box_html').html(html_popup);*/
/* 	 							*/
/* 	 							*/
/* 								} else { */
/* 									for (i = 0; i < data.streets.length; i++) { */
/* 										var econt_street_id = data.streets[i]['street_id'];*/
/* 										var econt_street = data.streets[i]['name'];*/
/* 									} */
/* 									 */
/* 									$('#econt_street_id').val(econt_street_id);*/
/* 									$('#econt_street').val(econt_street);*/
/* 									$('#econt_street_select').val(econt_street);*/
/* 									$('#econt_street_select').prop("disabled", true);*/
/* 									$('.tk_econt_street_select').addClass('tk_redy_box');*/
/* 									*/
/* 									$('#econt_street_num').val('1');*/
/* 									$('#tk_econt_street_num').addClass('tk_redy_box');*/
/* 								 */
/* 									$('input#street_num').val('1');*/
/* 									$('input#other').val('Център');*/
/* 									*/
/* 									$('#tk_econt_quarter_select').css('display','none');*/
/* 									$('#tk_econt_block_no').css('display','none');*/
/* 									$('#tk_econt_entrance_no').css('display','none');*/
/* 									$('#tk_econt_floor_no').css('display','none');*/
/* 									$('#tk_econt_apartment_no').css('display','none');*/
/* 									$('#tk_econt_street_select').css('display','none');*/
/* 									$('#tk_econt_street_num').css('display','none');*/
/* 									*/
/* 									$('#tk_econt_no_street').css('display','block');*/
/* 									$('#tk_econt_help_address').css('display','none');*/
/* */
/* 									$('#tk_econt_address_city_select').removeClass('tk_6_column');*/
/* 									$('#tk_econt_address_city_select').addClass('tk_12_column');*/
/* 									*/
/* 								} */
/* */
/* 							} else { */
/* 								$('#econt_street_id').val('');*/
/* 								$('#econt_street').val('Център');*/
/* 								$('#econt_street_select').val('Център');*/
/* 								$('#econt_street_select').prop("disabled", true);*/
/* 								$('.tk_econt_street_select').addClass('tk_redy_box');*/
/* 								*/
/* 								$('#econt_street_num').val('1');*/
/* 								$('#econt_street_num').prop("disabled", true);*/
/* 								$('#tk_econt_street_num').addClass('tk_redy_box');*/
/* 								*/
/* 								$('#econt_street_id').prop("disabled", true);*/
/* 								$('.tk_econt_street_id').addClass('tk_redy_box');*/
/* 								*/
/* 								$('input#street_num').val('');*/
/* 								$('input#other').val('');*/
/* 								*/
/* 								$('#tk_econt_quarter_select').css('display','none');*/
/* 								$('#tk_econt_block_no').css('display','none');*/
/* 								$('#tk_econt_entrance_no').css('display','none');*/
/* 								$('#tk_econt_floor_no').css('display','none');*/
/* 								$('#tk_econt_apartment_no').css('display','none');*/
/* 								$('#tk_econt_street_select').css('display','none');*/
/* 								$('#tk_econt_street_num').css('display','none');*/
/* 									*/
/* 								$('#tk_econt_no_street').css('display','block');*/
/* 								$('#tk_econt_help_address').css('display','none');*/
/* */
/* 								$('#tk_econt_address_city_select').removeClass('tk_6_column');*/
/* 								$('#tk_econt_address_city_select').addClass('tk_12_column');*/
/* 									*/
/* 							} */
/* 						} */
/* 						*/
/* 						getShippingMethodAddress();*/
/* 					} */
/* 				});*/
/* 		} */
/* 	} */
/* */
/* 	//транслитерация за търсачката*/
/* 	function transliterate(word) { */
/* 		return word.split('').map(function (char) { */
/* 				return Lat2Cyr[char] || char; */
/* 			}).join("");*/
/* 	} */
/* */
/* 	Lat2Cyr= { "a":"а","b":"б","c":"ц","d":"д","e":"е","f":"ф","g":"г","h":"х","i":"и","j":"ј","k":"к","l":"л","m":"м","n":"н","o":"о","p":"п","q":"","r":"р","s":"с","t":"т","u":"у","v":"в","w":"","x":"","y":"","z":"з","A":"А","B":"Б","C":"Ц","D":"Д","E":"Е","F":"Ф","G":"Г","H":"Х","I":"И","J":"Ј","K":"К","L":"Л","M":"М","N":"Н","O":"О","P":"П","Q":"","R":"Р","S":"С","T":"Т","U":"У","V":"В","W":"","X":"","Y":"","Z":"З","č":"ч","ć":"ћ","đ":"ђ","ž":"ж","š":"ш","Č":"Ч","Ć":"Ћ","Đ":"Ђ","Ž":"Ж","Š":"Ш"} ;*/
/* 	*/
/* 	//транслитерация за търсачката*/
/* 	function transliterateEN(word) { */
/* 		return word.split('').map(function (char) { */
/* 				return getKeyByValue(Lat2Cyr,char) || char; */
/* 			}).join("");*/
/* 	} */
/* 	 */
/* 	function getKeyByValue(object, value) {*/
/* 		return Object.keys(object).find(key => object[key] === value);*/
/* 	}*/
/* */
/* </script>*/
