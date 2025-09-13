<?php

/* default/template/tk_checkout/econt_office.twig */
class __TwigTemplate_e2a1148135212a3c631f4c2dcbfe0664552881fa2a77cee9b6019bcb1c30e022 extends Twig_Template
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
        echo (isset($context["text_econt_office_title"]) ? $context["text_econt_office_title"] : null);
        echo "</span> 
\t\t\t<span class=\"tk_all_spin\"><i class=\"tk_icon-spin rotating\"></i></span>
\t\t\t\t\t\t\t\t
\t\t\t<div id=\"tk_econt_map\" class=\"tk_right\" ";
        // line 8
        if (( !(isset($context["econt_offices"]) ? $context["econt_offices"] : null) || (array_key_exists("econt_office_type", $context) && ((isset($context["econt_office_type"]) ? $context["econt_office_type"] : null) == "new")))) {
            echo " style=\"display:inline-block\"";
        } else {
            echo "style=\"display:none\"";
        }
        echo "><span class=\"tk_panel_text\"> ";
        echo (isset($context["text_econt_office_desc"]) ? $context["text_econt_office_desc"] : null);
        echo " <a href=\"javascript:void(0);\" id=\"econt_office_locator\" style=\"color:red;\">";
        echo (isset($context["text_econt_office_map"]) ? $context["text_econt_office_map"] : null);
        echo "</a></span> \t\t\t
\t\t\t</div>
\t\t</div>\t\t\t\t
\t
\t\t<div class=\"tk_panel_body\">
\t\t
\t\t\t<div id=\"tk_econt_offices\">

\t\t\t\t<input type=\"hidden\" id=\"shipping_to\" name=\"shipping_to\" value=\"office\" />
\t\t\t\t<input type=\"hidden\" id=\"shipping_type\" name=\"shipping_type\" value=\"econt\" />
\t\t\t\t
\t\t\t\t";
        // line 19
        if (( !array_key_exists("module_tk_checkout_zone", $context) || ((isset($context["module_tk_checkout_zone"]) ? $context["module_tk_checkout_zone"] : null) == 0))) {
            echo " 
\t\t\t\t<input type=\"hidden\" id=\"zone_id\" name=\"zone_id\" value=\"";
            // line 20
            echo (isset($context["zone_id"]) ? $context["zone_id"] : null);
            echo "\" />
\t\t\t\t";
        }
        // line 21
        echo " 
\t\t
\t\t\t
\t\t\t\t";
        // line 24
        if ((isset($context["econt_offices_customer"]) ? $context["econt_offices_customer"] : null)) {
            echo " 
\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"econt_office_type\" value=\"existing\" checked=\"checked\" ";
            // line 27
            if ((array_key_exists("econt_office_type", $context) && ((isset($context["econt_office_type"]) ? $context["econt_office_type"] : null) == "existing"))) {
                echo "checked=\"\"";
            }
            echo " onclick=\"jQuery('#econt_office_new').hide();jQuery('#tk_econt_office_existing').show();\" />
\t\t\t\t\t\t";
            // line 28
            echo (isset($context["text_address_existing"]) ? $context["text_address_existing"] : null);
            echo " 
\t\t\t\t\t</label>
\t\t\t\t</div>
\t\t\t\t<div id=\"tk_econt_office_existing\">
\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t<select name=\"econt_office_customer_id\">
\t\t\t\t\t\t\t";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["econt_offices_customer"]) ? $context["econt_offices_customer"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["econt_office_customer"]) {
                echo " 
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<option value=\"";
                // line 36
                echo $this->getAttribute($context["econt_office_customer"], "econt_customer_id", array(), "array");
                echo "\" ";
                if ((array_key_exists("econt_office_customer_id", $context) && ($this->getAttribute($context["econt_office_customer"], "econt_customer_id", array(), "array") == (isset($context["econt_office_customer_id"]) ? $context["econt_office_customer_id"] : null)))) {
                    echo "selected=\"selected\"";
                }
                echo ">";
                echo $this->getAttribute($context["econt_office_customer"], "office_name", array(), "array");
                echo "</option>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['econt_office_customer'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo " 
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t</div>\t 
\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"econt_office_type\" value=\"new\" ";
            // line 44
            if ((array_key_exists("econt_office_type", $context) && ((isset($context["econt_office_type"]) ? $context["econt_office_type"] : null) == "new"))) {
                echo "checked=\"\"";
            }
            echo " onclick=\"jQuery('#econt_office_new').show();jQuery('#tk_econt_office_existing').hide();jQuery('#tk_econt_map').show();\"/>
\t\t\t\t\t\t";
            // line 45
            echo (isset($context["text_address_new"]) ? $context["text_address_new"] : null);
            echo " 
\t\t\t\t\t</label>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t";
        } else {
            // line 49
            echo " 
\t\t\t\t<input type=\"hidden\" name=\"econt_office_type\" value=\"new\">
\t\t\t\t";
        }
        // line 51
        echo " 

\t\t\t\t<div id=\"econt_office_new\" ";
        // line 53
        if (( !(isset($context["econt_offices_customer"]) ? $context["econt_offices_customer"] : null) || (array_key_exists("econt_office_type", $context) && ((isset($context["econt_office_type"]) ? $context["econt_office_type"] : null) == "new")))) {
            echo " style=\"display:block\"";
        } else {
            echo "style=\"display:none\"";
        }
        echo ">
\t\t\t\t
\t\t\t\t\t<div class=\"tk_6_column tk_center_column tk_econt_office_city_select tk_required_box ";
        // line 55
        if ((isset($context["econt_office_city"]) ? $context["econt_office_city"] : null)) {
            echo " tk_redy_box";
        }
        echo "\" id=\"tk_econt_office_city_select\">
\t\t\t\t\t
\t\t\t\t\t\t<input type=\"text\" id=\"econt_office_city_select\" readonly=\"true\" name=\"econt_office_city_select\" value=\"";
        // line 57
        echo (isset($context["econt_office_city"]) ? $context["econt_office_city"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["text_econt_office_city"]) ? $context["text_econt_office_city"] : null);
        echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 58
        echo twig_replace_filter((isset($context["text_econt_office_city"]) ? $context["text_econt_office_city"] : null), array(":" => ""));
        echo "</span>
\t\t\t
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"tk_6_column tk_center_column tk_econt_office_select tk_required_box ";
        // line 62
        if ((((twig_length_filter($this->env, (isset($context["econt_offices"]) ? $context["econt_offices"] : null)) < 1) || (isset($context["econt_office_code"]) ? $context["econt_office_code"] : null)) && (isset($context["econt_office_city_id"]) ? $context["econt_office_city_id"] : null))) {
            echo " tk_redy_box";
        }
        echo "\" id=\"tk_econt_office_id\">
\t\t\t
\t\t\t\t\t\t<input type=\"text\" id=\"econt_office_select\" readonly=\"true\" name=\"econt_office_select\" value=\"";
        // line 64
        if ((isset($context["econt_office_code"]) ? $context["econt_office_code"] : null)) {
            echo (((isset($context["econt_office_code"]) ? $context["econt_office_code"] : null) . " ") . (isset($context["econt_office_name"]) ? $context["econt_office_name"] : null));
        }
        echo "\" placeholder=\"";
        echo (isset($context["text_econt_office_title"]) ? $context["text_econt_office_title"] : null);
        echo "\" ";
        if ( !(isset($context["econt_office_city_id"]) ? $context["econt_office_city_id"] : null)) {
            echo "disabled=\"\"";
        }
        echo " />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 65
        echo twig_replace_filter((isset($context["text_econt_office_title"]) ? $context["text_econt_office_title"] : null), array(":" => ""));
        echo "</span>
\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t<div class=\"tk_12_column tk_center_column \">
\t\t\t\t\t\t<input type=\"hidden\" id=\"econt_office_code\" name=\"econt_office_code\" value=\"";
        // line 70
        echo (isset($context["econt_office_code"]) ? $context["econt_office_code"] : null);
        echo "\" />
\t\t\t\t\t\t<input type=\"hidden\" id=\"econt_office_name\" name=\"econt_office_name\" value=\"";
        // line 71
        echo (isset($context["econt_office_name"]) ? $context["econt_office_name"] : null);
        echo "\" />
\t\t\t\t\t\t<input type=\"hidden\" id=\"econt_office_address\" name=\"econt_office_address\" value=\"";
        // line 72
        echo (isset($context["econt_office_address"]) ? $context["econt_office_address"] : null);
        echo "\" />
\t\t\t\t\t\t<input type=\"hidden\" id=\"econt_office_city\" name=\"econt_office_city\" value=\"";
        // line 73
        echo (isset($context["econt_office_city"]) ? $context["econt_office_city"] : null);
        echo "\">
\t\t\t\t\t\t<input type=\"hidden\" id=\"econt_office_postcode\" name=\"econt_office_postcode\" value=\"";
        // line 74
        echo (isset($context["econt_office_postcode"]) ? $context["econt_office_postcode"] : null);
        echo "\" />
\t\t\t\t\t\t<input type=\"hidden\" id=\"econt_office_city_id\" name=\"econt_office_city_id\" value=\"";
        // line 75
        echo (isset($context["econt_office_city_id"]) ? $context["econt_office_city_id"] : null);
        echo "\">
\t\t\t\t\t\t<input type=\"hidden\" id=\"econt_office_id\" name=\"econt_office_id\" value=\"";
        // line 76
        echo (isset($context["econt_office_id"]) ? $context["econt_office_id"] : null);
        echo "\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"tk_clear\"></div>\t\t
\t\t\t</div>
\t\t\t
\t\t\t";
        // line 82
        if ((isset($context["econt_sms_enabled"]) ? $context["econt_sms_enabled"] : null)) {
            echo " 
\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t<input type=\"checkbox\" name=\"econt_sms\" id=\"econt_sms\" value=\"1\" ";
            // line 84
            if (((isset($context["econt_sms"]) ? $context["econt_sms"] : null) && ((isset($context["econt_sms"]) ? $context["econt_sms"] : null) == 2))) {
                echo "checked=\"\"";
            }
            echo ">
\t\t\t\t<label for=\"econt_sms\"> ";
            // line 85
            echo (isset($context["text_sms"]) ? $context["text_sms"] : null);
            echo "</label>
\t\t\t</div>
\t\t\t";
        }
        // line 87
        echo " 
\t
\t\t\t\t\t\t\t\t
\t\t</div>\t
\t</div>\t
</div>

<div class=\"econt_office_city_container radio_container mfp-hide\" id=\"econt_office_city_locator\">
\t<div class=\"radio_search\">
\t\t<input id=\"econt_office_city_search\" name=\"econt_office_city_search\" type=\"text\" placeholder=\"Търсене..\" class=\"radio_box_search\">
\t</div>
\t<div class=\"radio_box\">
\t\t";
        // line 99
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["econt_cities"]) ? $context["econt_cities"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["econt_city"]) {
            echo " 
\t\t<div class=\"radio_elements\">
\t\t\t<label>
\t\t\t\t<input type=\"radio\" name=\"tk_econt_office_city_id\" value=\"";
            // line 102
            echo $this->getAttribute($context["econt_city"], "city_id", array(), "array");
            echo "\" ";
            if ((array_key_exists("econt_office_city_id", $context) && ($this->getAttribute($context["econt_city"], "city_id", array(), "array") == (isset($context["econt_office_city_id"]) ? $context["econt_office_city_id"] : null)))) {
                echo "checked=\"\"";
            }
            echo " data-name=\"";
            echo $this->getAttribute($context["econt_city"], "name", array(), "array");
            echo "\">";
            echo $this->getAttribute($context["econt_city"], "name", array(), "array");
            echo " 
\t\t\t</label>
\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['econt_city'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 105
        echo " 
\t</div>
</div>

<div class=\"econt_office_container radio_container mfp-hide\" id=\"econt_office_id_locator\">
\t<div class=\"radio_search\">
\t\t<input id=\"econt_office_search\" name=\"econt_office_search\" type=\"text\" placeholder=\"Търсене..\" class=\"radio_box_search\">
\t</div>
\t<div class=\"radio_box\">
\t\t";
        // line 114
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["econt_offices"]) ? $context["econt_offices"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["office"]) {
            echo " 
\t\t<div class=\"radio_elements\">
\t\t\t<label>
\t\t\t\t<input type=\"radio\" name=\"tk_econt_office_id\" value=\"";
            // line 117
            echo $this->getAttribute($context["office"], "office_id", array(), "array");
            echo "\" ";
            if ((array_key_exists("econt_office_id", $context) && ($this->getAttribute($context["office"], "office_id", array(), "array") == (isset($context["econt_office_id"]) ? $context["econt_office_id"] : null)))) {
                echo "checked=\"\"";
            }
            echo " data-name=\"";
            echo $this->getAttribute($context["office"], "office_code", array(), "array");
            echo " ";
            echo $this->getAttribute($context["office"], "name", array(), "array");
            echo "\">
\t\t\t\t<span>";
            // line 118
            echo $this->getAttribute($context["office"], "office_code", array(), "array");
            echo "</span> <strong>";
            echo $this->getAttribute($context["office"], "name", array(), "array");
            echo "</strong> <br> <i>";
            echo $this->getAttribute($context["office"], "address", array(), "array");
            echo "</i>
\t\t\t</label>
\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['office'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        echo " 
\t</div>
</div>

<script>

\t\$(document).ready(function() { 
\t\tgetPaymentMethod();
\t});
\t\t
\t\$(document).on('click', '#econt_sms', function(e) { 
\t\te.stopImmediatePropagation();
\t\t\$('.tk_all_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\$('#tk_checkout').css('opacity','0.6');
\t\t\$('#tk_checkout').css('pointer-events','none');
\t\t\$('#tk_button_confirm').prop('disabled', true);\t
\t\t\t
\t\tgetShippingMethodAddress();
\t\t\t
\t});
\t\t
\t//попъп за градове
\t\$(document).on('click', '#econt_office_city_select', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$.magnificPopup.open( { 
\t\t\t\t\ttype: 'inline',
\t\t\t\t\titems: { src: '#econt_office_city_locator' } 
\t\t\t\t } );
\t\t\tsetTimeout(function () { 
\t\t\t\t\t\$('#econt_office_city_search').focus();
\t\t\t\t } , 200);
\t\t } );
\t 
\t//въвеждане на град ръчно
\t\$(\"#econt_office_city_search\").on(\"keyup\", function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar value = \$(this).val().toLowerCase();
\t\t\tvar bg_value = transliterate(value);
\t\t\tvar en_value = transliterateEN(value);
\t\t\t\$(\"#econt_office_city_locator .radio_box .radio_elements\").filter(function() { 
\t\t\t\t\t\$(this).toggle((\$(this).text().toLowerCase().indexOf(value) > -1 || \$(this).text().toLowerCase().indexOf(bg_value) > -1 || \$(this).text().toLowerCase().indexOf(en_value) > -1));
\t\t\t\t } );
\t\t } );

\t//добавяне на селектирания град и извеждаме офисите спрямо него
\t\$(document).delegate('#econt_office_city_locator .radio_box input[type=\\'radio\\']', 'click', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar econt_office_city_id = \$(this).val();
\t\t\tvar econt_office_city = \$(this).data('name');
\t\t\t\$('#econt_office_city_id').val(econt_office_city_id);
\t\t\t\$('#econt_office_city').val(econt_office_city);
\t\t\t\$('#econt_office_city_select').val(econt_office_city);
\t\t
\t\t\t\$('.tk_all_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\t\$('#tk_checkout').css('opacity','0.6');
\t\t\t\$('#tk_checkout').css('pointer-events','none');
\t\t\t\$('#tk_button_confirm').prop('disabled', true);\t
\t\t\tgetOfficesByCityId();
\t\t\t\$.magnificPopup.close()

\t\t } );

\t//попъп за офиси
\t\$(document).on('click', '#econt_office_select', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$.magnificPopup.open( { 
\t\t\t\t\ttype: 'inline',
\t\t\t\t\titems: { src: '#econt_office_id_locator' } 
\t\t\t\t } );
\t\t\tsetTimeout(function () { 
\t\t\t\t\t\$('#econt_office_search').focus();
\t\t\t\t } , 500);
\t\t } );
\t 
\t//въвеждане на офис ръчно
\t\$(\"#econt_office_search\").on(\"keyup\", function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar value = \$(this).val().toLowerCase();
\t\t\tvar bg_value = transliterate(value);
\t\t\tvar en_value = transliterateEN(value);
\t\t\t\$(\"#econt_office_id_locator .radio_box .radio_elements\").filter(function() { 
\t\t\t\t\t\$(this).toggle((\$(this).text().toLowerCase().indexOf(value) > -1 || \$(this).text().toLowerCase().indexOf(bg_value) > -1 || \$(this).text().toLowerCase().indexOf(en_value) > -1));
\t\t\t\t } );
\t\t } );

\t//добавяне на селектирания офис и извеждаме данните за него
\t\$(document).delegate('#econt_office_id_locator .radio_box input[type=\\'radio\\']', 'click', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar econt_office_id = \$(this).val();
\t\t\tvar econt_office_name = \$(this).data('name');
\t\t\t\$('#econt_office_id').val(econt_office_id);
\t\t\t\$('#econt_office_name').val(econt_office_name);
\t\t\t\$('#econt_office_select').val(econt_office_name);
\t\t\tgetOffice();
\t\t\tsaveData();
\t\t\t\$.magnificPopup.close()
\t\t } );

\t/* избери офис от картата */
\tfunction displayMessage(event) {
\t\tif (event.data?.office === undefined) {
\t\t\treturn;
\t\t} 
\t\tgetOfficeByOfficeCode(event.data.office.code);
\t\tsaveData();
\t\t\$.magnificPopup.close();
\t}
\tif (window.addEventListener) {
\t\twindow.addEventListener('message', displayMessage);
\t} else {
\t\twindow.attachEvent(\"onmessage\", displayMessage);
\t}

\t\$('#econt_office_locator').magnificPopup( { 
\t\t\ttype: 'iframe',
\t\t\tiframe: { 
\t\t\t\tmarkup: '<div class=\"mfp-iframe-scaler econt_office_locator_mfp\">'+
\t\t\t\t'<div class=\"mfp-close\"></div>'+
\t\t\t\t'<iframe title=\"Econt Office Locator\" allow=\"geolocation;\" class=\"mfp-iframe\" frameborder=\"0\" allowfullscreen style=\"width: 100%; height: 90vh; border-width: 0px;\"></iframe>'+
\t\t\t\t'</div>',
\t\t\t\tpatterns: { 
\t\t\t\t\tecontmaps: { \t\t\t\t 
\t\t\t\t\t\tindex: 'javascript:void(0);',\t\t\t\t\t
\t\t\t\t\t\tsrc: '";
        // line 244
        echo (isset($context["econt_office_locator"]) ? $context["econt_office_locator"] : null);
        echo "&officeType=office&lang=";
        echo (isset($context["lang"]) ? $context["lang"] : null);
        echo "&city=' + \$('#econt_office_city').val()\t\t\t\t
\t\t\t\t\t} 
\t\t\t\t}      
                    
\t\t\t} 
\t\t});
\t/* избери офис от картата */
\t
\t//извежда офисите спрямо града и извиква призчислени методи за доставка => извежда преизчислени тотали в количката
\t//извиква данните за офиса ако е само 1
\tfunction getOfficesByCityId() { 
\t\t\$('.tk_econt_office_select').removeClass('tk_redy_box');
\t\t
\t\t\$('#econt_office_id').val('');
\t\t\$('#econt_office_code').val('');
\t\t\$('#econt_office_name').val('');
\t\t\$('#econt_office_select').val('');
\t\t\$('#econt_office_address').val('');
\t\t\$('#econt_office_city').val('');
\t\t\$('#econt_office_city_select').val('');
\t\t\$('#econt_office_postcode').val('');

\t\toffice_city_id = \$('#econt_office_city_id').val();

\t\t\$.ajax( { 
\t\t\t\turl: 'index.php?route=extension/shipping/tk_econt/getOfficesByCityId',
\t\t\t\ttype: 'POST',
\t\t\t\tdata: 'city_id=' + encodeURIComponent(office_city_id),
\t\t\t\tdataType: 'json',
\t\t\t\tsuccess: function(data) { 
\t\t\t\t\tif (data) { 

\t\t\t\t\t\t\$('#econt_office_city').val(data.office_city);
\t\t\t\t\t\t\$('#econt_office_city_select').val(data.office_city);
\t\t\t\t\t\t\$('#econt_office_select').prop(\"disabled\", false);
\t\t\t\t\t\t
\t\t\t\t\t\t//ако има повече от 1 офис изкаравме селектор, ако не слектираме автоматично
\t\t\t\t\t\tif(data.offices_count > 1) { 
\t\t\t\t\t\t\thtml_popup = '';
\t\t\t\t\t\t\t";
        // line 283
        if ((isset($context["econt_office_id"]) ? $context["econt_office_id"] : null)) {
            echo " 
\t\t\t\t\t\t\tvar office_id = ";
            // line 284
            echo (isset($context["econt_office_id"]) ? $context["econt_office_id"] : null);
            echo ";
\t\t\t\t\t\t\t";
        } else {
            // line 285
            echo " 
\t\t\t\t\t\t\tvar office_id = 0;
\t\t\t\t\t\t\t";
        }
        // line 287
        echo " 
\t\t\t\t\t\t\t
\t\t\t\t\t\t\tfor (i = 0; i < data.offices.length; i++) { 
\t\t\t\t\t\t\t\tif(office_id == data.offices[i]['office_id']) { 
\t\t\t\t\t\t\t\t\tvar office_checked = 'checked=\"\"';
\t\t\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\t\t\tvar office_checked = '';
\t\t\t\t\t\t\t\t} 
\t\t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t\thtml_popup += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_econt_office_id\" value=\"' + data.offices[i]['office_id'] + '\" ' + office_checked + ' data-name=\"' + data.offices[i]['office_code'] + ' ' + data.offices[i]['name'] + '\" ><span>' + data.offices[i]['office_code'] + '</span> <strong>' + data.offices[i]['name'] + '</strong><br> <i>' + data.offices[i]['address'] + '</i></label></div>';
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t} 
\t\t\t\t\t\t
\t\t\t\t\t\t\t\$('.tk_econt_office_city_id').addClass('tk_redy_box');
\t\t\t\t\t\t\t\$('#econt_office_id_locator .radio_box').html(html_popup);
\t\t\t\t\t\t\t\$('#econt_office_select').val('";
        // line 302
        echo (isset($context["text_econt_office_title"]) ? $context["text_econt_office_title"] : null);
        echo "');

\t\t\t\t\t\t} else { 
\t\t\t\t\t\t\thtml_popup = '';
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\tfor (i = 0; i < 1; i++) { 
\t\t\t\t\t\t\t\thtml_popup += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_econt_office_id\" value=\"' + data.offices[i]['office_id'] + '\" checked=\"\" data-name=\"' + data.offices[i]['office_code'] + ' ' + data.offices[i]['name'] + '\"><span>' + data.offices[i]['office_code'] + '</span> <strong>' + data.offices[i]['name'] + '</strong><br> <i>' + data.offices[i]['address'] + '</i></label></div>';
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\tecont_office_id = data.offices[i]['office_id'];
\t\t\t\t\t\t\t\tecont_office_name = data.offices[i]['office_code'] + ' ' + data.offices[i]['name'];
\t\t\t\t\t\t\t} 
\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t\$('.tk_econt_office_select').addClass('tk_redy_box');
\t\t\t\t\t\t\t\$('.tk_econt_office_city_select').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\$('#econt_office_id_locator .radio_box').html(html_popup);
\t\t\t\t\t\t\t\$('#econt_office_id').val(econt_office_id);
\t\t\t\t\t\t\t\$('#econt_office_name').val(econt_office_name);
\t\t\t\t\t\t\t\$('#econt_office_select').val(econt_office_name);

\t\t\t\t\t\t\tgetOffice();
\t\t\t\t\t\t } \t
\t\t\t\t\t } 
\t\t\t\t\t 
\t\t\t\t\t getShippingMethodAddress();
\t\t\t\t} 
\t\t\t});
\t} 
\t
\t//извиква данните за офиса
\tfunction getOffice() { 
\t\t\$('#econt_office_code').val('');
\t\toffice_id = \$('#econt_office_id').val();
\t\t\$.ajax( { 
\t\t\t\turl: 'index.php?route=extension/shipping/tk_econt/getOffice',
\t\t\t\ttype: 'POST',
\t\t\t\tdata: 'office_id=' + encodeURIComponent(office_id),
\t\t\t\tdataType: 'json',
\t\t\t\tsuccess: function(data) { 
\t\t
\t\t\t\t\tif (data && data.office_code) { 
\t\t\t\t\t\t\$('#econt_office_code').val(data.office_code);
\t\t\t\t\t\t\$('#econt_office_name').val(data.name);
\t\t\t\t\t\t\$('#econt_office_select').val(data.office_code + ' ' + data.name);
\t\t\t\t\t\t\$('#econt_office_address').val(data.address);
\t\t\t\t\t\t\$('#econt_office_city').val(data.office_city);
\t\t\t\t\t\t\$('#econt_office_city_select').val(data.office_city);
\t\t\t\t\t\t\$('#econt_office_postcode').val(data.post_code);
\t\t\t\t\t\t\$('.tk_econt_office_select').addClass('tk_redy_box');
\t\t\t\t\t} 
\t\t\t\t} 
\t\t\t});
\t} 
\t
\t//извиква данните за офиса спярмо кода му, позлв се за селектора от картата
\tfunction getOfficeByOfficeCode(office_code) { 
\t\tif (parseInt(office_code)) { 
\t\t\t\$.ajax( { 
\t\t\t\t\turl: 'index.php?route=extension/shipping/tk_econt/getOfficeByOfficeCode',
\t\t\t\t\ttype: 'POST',
\t\t\t\t\tdata: 'office_code=' + parseInt(office_code),
\t\t\t\t\tdataType: 'json',
\t\t\t\t\tsuccess: function(data) { 
\t\t\t\t\t\tif (!data.error) { 
\t\t\t\t\t\t\t\$('#econt_office_city_id').val(data.city_id);

\t\t\t\t\t\t\t\$('#econt_office_id').val(data.office_id);
\t\t\t\t\t\t\t\$('#econt_office_code').val(office_code);
\t\t\t\t\t\t\t\$('#econt_office_name').val(data.name);
\t\t\t\t\t\t\t\$('#econt_office_select').val(data.office_code + ' ' + data.name);
\t\t\t\t\t\t\t\$('#econt_office_address').val(data.address);
\t\t\t\t\t\t\t\$('#econt_office_city').val(data.office_city);
\t\t\t\t\t\t\t\$('#econt_office_city_select').val(data.office_city);
\t\t\t\t\t\t\t\$('#econt_office_postcode').val(data.post_code);
\t\t\t\t\t\t\t\$('.tk_econt_office_select').addClass('tk_redy_box');
\t\t\t\t\t\t} 
\t\t\t\t\t} 
\t\t\t\t});
\t\t} 
\t} 
\t
\t//транслитерация за търсачката
\tfunction transliterate(word) { 
\t\treturn word.split('').map(function (char) { 
\t\t\t\treturn Lat2Cyr[char] || char; 
\t\t\t } ).join(\"\");
\t } 

\tLat2Cyr= { \"a\":\"а\",\"b\":\"б\",\"c\":\"ц\",\"d\":\"д\",\"e\":\"е\",\"f\":\"ф\",\"g\":\"г\",\"h\":\"х\",\"i\":\"и\",\"j\":\"ј\",\"k\":\"к\",\"l\":\"л\",\"m\":\"м\",\"n\":\"н\",\"o\":\"о\",\"p\":\"п\",\"q\":\"\",\"r\":\"р\",\"s\":\"с\",\"t\":\"т\",\"u\":\"у\",\"v\":\"в\",\"w\":\"\",\"x\":\"\",\"y\":\"\",\"z\":\"з\",\"A\":\"А\",\"B\":\"Б\",\"C\":\"Ц\",\"D\":\"Д\",\"E\":\"Е\",\"F\":\"Ф\",\"G\":\"Г\",\"H\":\"Х\",\"I\":\"И\",\"J\":\"Ј\",\"K\":\"К\",\"L\":\"Л\",\"M\":\"М\",\"N\":\"Н\",\"O\":\"О\",\"P\":\"П\",\"Q\":\"\",\"R\":\"Р\",\"S\":\"С\",\"T\":\"Т\",\"U\":\"У\",\"V\":\"В\",\"W\":\"\",\"X\":\"\",\"Y\":\"\",\"Z\":\"З\",\"č\":\"ч\",\"ć\":\"ћ\",\"đ\":\"ђ\",\"ž\":\"ж\",\"š\":\"ш\",\"Č\":\"Ч\",\"Ć\":\"Ћ\",\"Đ\":\"Ђ\",\"Ž\":\"Ж\",\"Š\":\"Ш\" } ;
\t
\t//транслитерация за търсачката
\tfunction transliterateEN(word) { 
\t\treturn word.split('').map(function (char) { 
\t\t\t\treturn getKeyByValue(Lat2Cyr,char) || char; 
\t\t\t } ).join(\"\");
\t } 
\t 
\tfunction getKeyByValue(object, value) {
\t  \treturn Object.keys(object).find(key => object[key] === value);
\t}

</script>";
    }

    public function getTemplateName()
    {
        return "default/template/tk_checkout/econt_office.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  532 => 302,  515 => 287,  510 => 285,  505 => 284,  501 => 283,  457 => 244,  332 => 121,  318 => 118,  306 => 117,  298 => 114,  287 => 105,  269 => 102,  261 => 99,  247 => 87,  241 => 85,  235 => 84,  230 => 82,  221 => 76,  217 => 75,  213 => 74,  209 => 73,  205 => 72,  201 => 71,  197 => 70,  189 => 65,  177 => 64,  170 => 62,  163 => 58,  157 => 57,  150 => 55,  141 => 53,  137 => 51,  132 => 49,  124 => 45,  118 => 44,  110 => 38,  95 => 36,  88 => 34,  79 => 28,  73 => 27,  67 => 24,  62 => 21,  57 => 20,  53 => 19,  31 => 8,  25 => 5,  19 => 1,);
    }
}
/* <div id="tk_econt_office">*/
/* 	<div class="tk_panel">*/
/* 		<div class="tk_panel_heading">*/
/* 			<span class="tk_panel_icon"><span class="tk_icon-address"></span></span> */
/* 			<span class="tk_panel_text"> {{ text_econt_office_title }}</span> */
/* 			<span class="tk_all_spin"><i class="tk_icon-spin rotating"></i></span>*/
/* 								*/
/* 			<div id="tk_econt_map" class="tk_right" {% if (not econt_offices or (econt_office_type is defined and econt_office_type == 'new')) %} style="display:inline-block"{% else %}style="display:none"{% endif %}><span class="tk_panel_text"> {{ text_econt_office_desc }} <a href="javascript:void(0);" id="econt_office_locator" style="color:red;">{{ text_econt_office_map }}</a></span> 			*/
/* 			</div>*/
/* 		</div>				*/
/* 	*/
/* 		<div class="tk_panel_body">*/
/* 		*/
/* 			<div id="tk_econt_offices">*/
/* */
/* 				<input type="hidden" id="shipping_to" name="shipping_to" value="office" />*/
/* 				<input type="hidden" id="shipping_type" name="shipping_type" value="econt" />*/
/* 				*/
/* 				{% if module_tk_checkout_zone is not defined or module_tk_checkout_zone == 0 %} */
/* 				<input type="hidden" id="zone_id" name="zone_id" value="{{ zone_id }}" />*/
/* 				{% endif %} */
/* 		*/
/* 			*/
/* 				{% if (econt_offices_customer) %} */
/* 				<div class="tk_12_column tk_center_column">*/
/* 					<label>*/
/* 						<input type="radio" name="econt_office_type" value="existing" checked="checked" {% if (econt_office_type is defined and econt_office_type == 'existing') %}checked=""{% endif %} onclick="jQuery('#econt_office_new').hide();jQuery('#tk_econt_office_existing').show();" />*/
/* 						{{ text_address_existing }} */
/* 					</label>*/
/* 				</div>*/
/* 				<div id="tk_econt_office_existing">*/
/* 					<div class="tk_12_column tk_center_column">*/
/* 						<select name="econt_office_customer_id">*/
/* 							{% for econt_office_customer in econt_offices_customer %} */
/* 								*/
/* 							<option value="{{ econt_office_customer['econt_customer_id'] }}" {% if (econt_office_customer_id is defined and econt_office_customer['econt_customer_id'] == econt_office_customer_id) %}selected="selected"{% endif %}>{{ econt_office_customer['office_name'] }}</option>*/
/* 								*/
/* 							{% endfor %} */
/* 						</select>*/
/* 					</div>*/
/* 				</div>	 */
/* 				<div class="tk_12_column tk_center_column">*/
/* 					<label>*/
/* 						<input type="radio" name="econt_office_type" value="new" {% if (econt_office_type is defined and econt_office_type == 'new') %}checked=""{% endif %} onclick="jQuery('#econt_office_new').show();jQuery('#tk_econt_office_existing').hide();jQuery('#tk_econt_map').show();"/>*/
/* 						{{ text_address_new }} */
/* 					</label>*/
/* 				</div>*/
/* 				*/
/* 				{% else %} */
/* 				<input type="hidden" name="econt_office_type" value="new">*/
/* 				{% endif %} */
/* */
/* 				<div id="econt_office_new" {% if (not econt_offices_customer or (econt_office_type is defined and econt_office_type == 'new')) %} style="display:block"{% else %}style="display:none"{% endif %}>*/
/* 				*/
/* 					<div class="tk_6_column tk_center_column tk_econt_office_city_select tk_required_box {% if (econt_office_city) %} tk_redy_box{% endif %}" id="tk_econt_office_city_select">*/
/* 					*/
/* 						<input type="text" id="econt_office_city_select" readonly="true" name="econt_office_city_select" value="{{ econt_office_city }}" placeholder="{{ text_econt_office_city }}" />*/
/* 						<span class="tk_floating_label">{{ text_econt_office_city|replace({ ":": "" }) }}</span>*/
/* 			*/
/* 					</div>*/
/* */
/* 					<div class="tk_6_column tk_center_column tk_econt_office_select tk_required_box {% if (((econt_offices|length) < 1 or econt_office_code) and econt_office_city_id) %} tk_redy_box{% endif %}" id="tk_econt_office_id">*/
/* 			*/
/* 						<input type="text" id="econt_office_select" readonly="true" name="econt_office_select" value="{% if (econt_office_code) %}{{ econt_office_code ~ ' ' ~ econt_office_name }}{% endif %}" placeholder="{{ text_econt_office_title }}" {% if (not econt_office_city_id) %}disabled=""{% endif %} />*/
/* 						<span class="tk_floating_label">{{ text_econt_office_title|replace({ ":": "" }) }}</span>*/
/* 					*/
/* 					</div>*/
/* 					<div class="tk_clear"></div>*/
/* 					<div class="tk_12_column tk_center_column ">*/
/* 						<input type="hidden" id="econt_office_code" name="econt_office_code" value="{{ econt_office_code }}" />*/
/* 						<input type="hidden" id="econt_office_name" name="econt_office_name" value="{{ econt_office_name }}" />*/
/* 						<input type="hidden" id="econt_office_address" name="econt_office_address" value="{{ econt_office_address }}" />*/
/* 						<input type="hidden" id="econt_office_city" name="econt_office_city" value="{{ econt_office_city }}">*/
/* 						<input type="hidden" id="econt_office_postcode" name="econt_office_postcode" value="{{ econt_office_postcode }}" />*/
/* 						<input type="hidden" id="econt_office_city_id" name="econt_office_city_id" value="{{ econt_office_city_id }}">*/
/* 						<input type="hidden" id="econt_office_id" name="econt_office_id" value="{{ econt_office_id }}">*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="tk_clear"></div>		*/
/* 			</div>*/
/* 			*/
/* 			{% if (econt_sms_enabled) %} */
/* 			<div class="tk_12_column tk_center_column">*/
/* 				<input type="checkbox" name="econt_sms" id="econt_sms" value="1" {% if (econt_sms and econt_sms == 2) %}checked=""{% endif %}>*/
/* 				<label for="econt_sms"> {{ text_sms }}</label>*/
/* 			</div>*/
/* 			{% endif %} */
/* 	*/
/* 								*/
/* 		</div>	*/
/* 	</div>	*/
/* </div>*/
/* */
/* <div class="econt_office_city_container radio_container mfp-hide" id="econt_office_city_locator">*/
/* 	<div class="radio_search">*/
/* 		<input id="econt_office_city_search" name="econt_office_city_search" type="text" placeholder="Търсене.." class="radio_box_search">*/
/* 	</div>*/
/* 	<div class="radio_box">*/
/* 		{% for econt_city in econt_cities %} */
/* 		<div class="radio_elements">*/
/* 			<label>*/
/* 				<input type="radio" name="tk_econt_office_city_id" value="{{ econt_city['city_id'] }}" {% if (econt_office_city_id is defined and econt_city['city_id'] == econt_office_city_id) %}checked=""{% endif %} data-name="{{ econt_city['name'] }}">{{ econt_city['name'] }} */
/* 			</label>*/
/* 		</div>*/
/* 		{% endfor %} */
/* 	</div>*/
/* </div>*/
/* */
/* <div class="econt_office_container radio_container mfp-hide" id="econt_office_id_locator">*/
/* 	<div class="radio_search">*/
/* 		<input id="econt_office_search" name="econt_office_search" type="text" placeholder="Търсене.." class="radio_box_search">*/
/* 	</div>*/
/* 	<div class="radio_box">*/
/* 		{% for office in econt_offices %} */
/* 		<div class="radio_elements">*/
/* 			<label>*/
/* 				<input type="radio" name="tk_econt_office_id" value="{{ office['office_id'] }}" {% if (econt_office_id is defined and office['office_id'] == econt_office_id) %}checked=""{% endif %} data-name="{{ office['office_code'] }} {{ office['name'] }}">*/
/* 				<span>{{ office['office_code'] }}</span> <strong>{{ office['name'] }}</strong> <br> <i>{{ office['address'] }}</i>*/
/* 			</label>*/
/* 		</div>*/
/* 		{% endfor %} */
/* 	</div>*/
/* </div>*/
/* */
/* <script>*/
/* */
/* 	$(document).ready(function() { */
/* 		getPaymentMethod();*/
/* 	});*/
/* 		*/
/* 	$(document).on('click', '#econt_sms', function(e) { */
/* 		e.stopImmediatePropagation();*/
/* 		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 		$('#tk_checkout').css('opacity','0.6');*/
/* 		$('#tk_checkout').css('pointer-events','none');*/
/* 		$('#tk_button_confirm').prop('disabled', true);	*/
/* 			*/
/* 		getShippingMethodAddress();*/
/* 			*/
/* 	});*/
/* 		*/
/* 	//попъп за градове*/
/* 	$(document).on('click', '#econt_office_city_select', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$.magnificPopup.open( { */
/* 					type: 'inline',*/
/* 					items: { src: '#econt_office_city_locator' } */
/* 				 } );*/
/* 			setTimeout(function () { */
/* 					$('#econt_office_city_search').focus();*/
/* 				 } , 200);*/
/* 		 } );*/
/* 	 */
/* 	//въвеждане на град ръчно*/
/* 	$("#econt_office_city_search").on("keyup", function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var value = $(this).val().toLowerCase();*/
/* 			var bg_value = transliterate(value);*/
/* 			var en_value = transliterateEN(value);*/
/* 			$("#econt_office_city_locator .radio_box .radio_elements").filter(function() { */
/* 					$(this).toggle(($(this).text().toLowerCase().indexOf(value) > -1 || $(this).text().toLowerCase().indexOf(bg_value) > -1 || $(this).text().toLowerCase().indexOf(en_value) > -1));*/
/* 				 } );*/
/* 		 } );*/
/* */
/* 	//добавяне на селектирания град и извеждаме офисите спрямо него*/
/* 	$(document).delegate('#econt_office_city_locator .radio_box input[type=\'radio\']', 'click', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var econt_office_city_id = $(this).val();*/
/* 			var econt_office_city = $(this).data('name');*/
/* 			$('#econt_office_city_id').val(econt_office_city_id);*/
/* 			$('#econt_office_city').val(econt_office_city);*/
/* 			$('#econt_office_city_select').val(econt_office_city);*/
/* 		*/
/* 			$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 			$('#tk_checkout').css('opacity','0.6');*/
/* 			$('#tk_checkout').css('pointer-events','none');*/
/* 			$('#tk_button_confirm').prop('disabled', true);	*/
/* 			getOfficesByCityId();*/
/* 			$.magnificPopup.close()*/
/* */
/* 		 } );*/
/* */
/* 	//попъп за офиси*/
/* 	$(document).on('click', '#econt_office_select', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$.magnificPopup.open( { */
/* 					type: 'inline',*/
/* 					items: { src: '#econt_office_id_locator' } */
/* 				 } );*/
/* 			setTimeout(function () { */
/* 					$('#econt_office_search').focus();*/
/* 				 } , 500);*/
/* 		 } );*/
/* 	 */
/* 	//въвеждане на офис ръчно*/
/* 	$("#econt_office_search").on("keyup", function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var value = $(this).val().toLowerCase();*/
/* 			var bg_value = transliterate(value);*/
/* 			var en_value = transliterateEN(value);*/
/* 			$("#econt_office_id_locator .radio_box .radio_elements").filter(function() { */
/* 					$(this).toggle(($(this).text().toLowerCase().indexOf(value) > -1 || $(this).text().toLowerCase().indexOf(bg_value) > -1 || $(this).text().toLowerCase().indexOf(en_value) > -1));*/
/* 				 } );*/
/* 		 } );*/
/* */
/* 	//добавяне на селектирания офис и извеждаме данните за него*/
/* 	$(document).delegate('#econt_office_id_locator .radio_box input[type=\'radio\']', 'click', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var econt_office_id = $(this).val();*/
/* 			var econt_office_name = $(this).data('name');*/
/* 			$('#econt_office_id').val(econt_office_id);*/
/* 			$('#econt_office_name').val(econt_office_name);*/
/* 			$('#econt_office_select').val(econt_office_name);*/
/* 			getOffice();*/
/* 			saveData();*/
/* 			$.magnificPopup.close()*/
/* 		 } );*/
/* */
/* 	/* избери офис от картата *//* */
/* 	function displayMessage(event) {*/
/* 		if (event.data?.office === undefined) {*/
/* 			return;*/
/* 		} */
/* 		getOfficeByOfficeCode(event.data.office.code);*/
/* 		saveData();*/
/* 		$.magnificPopup.close();*/
/* 	}*/
/* 	if (window.addEventListener) {*/
/* 		window.addEventListener('message', displayMessage);*/
/* 	} else {*/
/* 		window.attachEvent("onmessage", displayMessage);*/
/* 	}*/
/* */
/* 	$('#econt_office_locator').magnificPopup( { */
/* 			type: 'iframe',*/
/* 			iframe: { */
/* 				markup: '<div class="mfp-iframe-scaler econt_office_locator_mfp">'+*/
/* 				'<div class="mfp-close"></div>'+*/
/* 				'<iframe title="Econt Office Locator" allow="geolocation;" class="mfp-iframe" frameborder="0" allowfullscreen style="width: 100%; height: 90vh; border-width: 0px;"></iframe>'+*/
/* 				'</div>',*/
/* 				patterns: { */
/* 					econtmaps: { 				 */
/* 						index: 'javascript:void(0);',					*/
/* 						src: '{{ econt_office_locator }}&officeType=office&lang={{ lang }}&city=' + $('#econt_office_city').val()				*/
/* 					} */
/* 				}      */
/*                     */
/* 			} */
/* 		});*/
/* 	/* избери офис от картата *//* */
/* 	*/
/* 	//извежда офисите спрямо града и извиква призчислени методи за доставка => извежда преизчислени тотали в количката*/
/* 	//извиква данните за офиса ако е само 1*/
/* 	function getOfficesByCityId() { */
/* 		$('.tk_econt_office_select').removeClass('tk_redy_box');*/
/* 		*/
/* 		$('#econt_office_id').val('');*/
/* 		$('#econt_office_code').val('');*/
/* 		$('#econt_office_name').val('');*/
/* 		$('#econt_office_select').val('');*/
/* 		$('#econt_office_address').val('');*/
/* 		$('#econt_office_city').val('');*/
/* 		$('#econt_office_city_select').val('');*/
/* 		$('#econt_office_postcode').val('');*/
/* */
/* 		office_city_id = $('#econt_office_city_id').val();*/
/* */
/* 		$.ajax( { */
/* 				url: 'index.php?route=extension/shipping/tk_econt/getOfficesByCityId',*/
/* 				type: 'POST',*/
/* 				data: 'city_id=' + encodeURIComponent(office_city_id),*/
/* 				dataType: 'json',*/
/* 				success: function(data) { */
/* 					if (data) { */
/* */
/* 						$('#econt_office_city').val(data.office_city);*/
/* 						$('#econt_office_city_select').val(data.office_city);*/
/* 						$('#econt_office_select').prop("disabled", false);*/
/* 						*/
/* 						//ако има повече от 1 офис изкаравме селектор, ако не слектираме автоматично*/
/* 						if(data.offices_count > 1) { */
/* 							html_popup = '';*/
/* 							{% if (econt_office_id) %} */
/* 							var office_id = {{ econt_office_id}};*/
/* 							{% else %} */
/* 							var office_id = 0;*/
/* 							{% endif %} */
/* 							*/
/* 							for (i = 0; i < data.offices.length; i++) { */
/* 								if(office_id == data.offices[i]['office_id']) { */
/* 									var office_checked = 'checked=""';*/
/* 								} else { */
/* 									var office_checked = '';*/
/* 								} */
/* 									 */
/* 								html_popup += '<div class="radio_elements"><label><input type="radio" name="tk_econt_office_id" value="' + data.offices[i]['office_id'] + '" ' + office_checked + ' data-name="' + data.offices[i]['office_code'] + ' ' + data.offices[i]['name'] + '" ><span>' + data.offices[i]['office_code'] + '</span> <strong>' + data.offices[i]['name'] + '</strong><br> <i>' + data.offices[i]['address'] + '</i></label></div>';*/
/* 								*/
/* 							} */
/* 						*/
/* 							$('.tk_econt_office_city_id').addClass('tk_redy_box');*/
/* 							$('#econt_office_id_locator .radio_box').html(html_popup);*/
/* 							$('#econt_office_select').val('{{ text_econt_office_title }}');*/
/* */
/* 						} else { */
/* 							html_popup = '';*/
/* 								*/
/* 							for (i = 0; i < 1; i++) { */
/* 								html_popup += '<div class="radio_elements"><label><input type="radio" name="tk_econt_office_id" value="' + data.offices[i]['office_id'] + '" checked="" data-name="' + data.offices[i]['office_code'] + ' ' + data.offices[i]['name'] + '"><span>' + data.offices[i]['office_code'] + '</span> <strong>' + data.offices[i]['name'] + '</strong><br> <i>' + data.offices[i]['address'] + '</i></label></div>';*/
/* 									*/
/* 								econt_office_id = data.offices[i]['office_id'];*/
/* 								econt_office_name = data.offices[i]['office_code'] + ' ' + data.offices[i]['name'];*/
/* 							} */
/* 							 */
/* 							$('.tk_econt_office_select').addClass('tk_redy_box');*/
/* 							$('.tk_econt_office_city_select').addClass('tk_redy_box');*/
/* 								*/
/* 							$('#econt_office_id_locator .radio_box').html(html_popup);*/
/* 							$('#econt_office_id').val(econt_office_id);*/
/* 							$('#econt_office_name').val(econt_office_name);*/
/* 							$('#econt_office_select').val(econt_office_name);*/
/* */
/* 							getOffice();*/
/* 						 } 	*/
/* 					 } */
/* 					 */
/* 					 getShippingMethodAddress();*/
/* 				} */
/* 			});*/
/* 	} */
/* 	*/
/* 	//извиква данните за офиса*/
/* 	function getOffice() { */
/* 		$('#econt_office_code').val('');*/
/* 		office_id = $('#econt_office_id').val();*/
/* 		$.ajax( { */
/* 				url: 'index.php?route=extension/shipping/tk_econt/getOffice',*/
/* 				type: 'POST',*/
/* 				data: 'office_id=' + encodeURIComponent(office_id),*/
/* 				dataType: 'json',*/
/* 				success: function(data) { */
/* 		*/
/* 					if (data && data.office_code) { */
/* 						$('#econt_office_code').val(data.office_code);*/
/* 						$('#econt_office_name').val(data.name);*/
/* 						$('#econt_office_select').val(data.office_code + ' ' + data.name);*/
/* 						$('#econt_office_address').val(data.address);*/
/* 						$('#econt_office_city').val(data.office_city);*/
/* 						$('#econt_office_city_select').val(data.office_city);*/
/* 						$('#econt_office_postcode').val(data.post_code);*/
/* 						$('.tk_econt_office_select').addClass('tk_redy_box');*/
/* 					} */
/* 				} */
/* 			});*/
/* 	} */
/* 	*/
/* 	//извиква данните за офиса спярмо кода му, позлв се за селектора от картата*/
/* 	function getOfficeByOfficeCode(office_code) { */
/* 		if (parseInt(office_code)) { */
/* 			$.ajax( { */
/* 					url: 'index.php?route=extension/shipping/tk_econt/getOfficeByOfficeCode',*/
/* 					type: 'POST',*/
/* 					data: 'office_code=' + parseInt(office_code),*/
/* 					dataType: 'json',*/
/* 					success: function(data) { */
/* 						if (!data.error) { */
/* 							$('#econt_office_city_id').val(data.city_id);*/
/* */
/* 							$('#econt_office_id').val(data.office_id);*/
/* 							$('#econt_office_code').val(office_code);*/
/* 							$('#econt_office_name').val(data.name);*/
/* 							$('#econt_office_select').val(data.office_code + ' ' + data.name);*/
/* 							$('#econt_office_address').val(data.address);*/
/* 							$('#econt_office_city').val(data.office_city);*/
/* 							$('#econt_office_city_select').val(data.office_city);*/
/* 							$('#econt_office_postcode').val(data.post_code);*/
/* 							$('.tk_econt_office_select').addClass('tk_redy_box');*/
/* 						} */
/* 					} */
/* 				});*/
/* 		} */
/* 	} */
/* 	*/
/* 	//транслитерация за търсачката*/
/* 	function transliterate(word) { */
/* 		return word.split('').map(function (char) { */
/* 				return Lat2Cyr[char] || char; */
/* 			 } ).join("");*/
/* 	 } */
/* */
/* 	Lat2Cyr= { "a":"а","b":"б","c":"ц","d":"д","e":"е","f":"ф","g":"г","h":"х","i":"и","j":"ј","k":"к","l":"л","m":"м","n":"н","o":"о","p":"п","q":"","r":"р","s":"с","t":"т","u":"у","v":"в","w":"","x":"","y":"","z":"з","A":"А","B":"Б","C":"Ц","D":"Д","E":"Е","F":"Ф","G":"Г","H":"Х","I":"И","J":"Ј","K":"К","L":"Л","M":"М","N":"Н","O":"О","P":"П","Q":"","R":"Р","S":"С","T":"Т","U":"У","V":"В","W":"","X":"","Y":"","Z":"З","č":"ч","ć":"ћ","đ":"ђ","ž":"ж","š":"ш","Č":"Ч","Ć":"Ћ","Đ":"Ђ","Ž":"Ж","Š":"Ш" } ;*/
/* 	*/
/* 	//транслитерация за търсачката*/
/* 	function transliterateEN(word) { */
/* 		return word.split('').map(function (char) { */
/* 				return getKeyByValue(Lat2Cyr,char) || char; */
/* 			 } ).join("");*/
/* 	 } */
/* 	 */
/* 	function getKeyByValue(object, value) {*/
/* 	  	return Object.keys(object).find(key => object[key] === value);*/
/* 	}*/
/* */
/* </script>*/
