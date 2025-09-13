<?php

/* default/template/tk_checkout/speedy_office.twig */
class __TwigTemplate_5335576ba74b5868e61caebf2c98ea845f4662f55523250aa80887a338522eea extends Twig_Template
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
        echo (isset($context["text_speedy_office_title"]) ? $context["text_speedy_office_title"] : null);
        echo "</span> 
\t\t\t<span class=\"tk_all_spin\"><i class=\"tk_icon-spin rotating\"></i></span>
\t\t</div>\t\t\t\t
\t
\t\t<div class=\"tk_panel_body\">
\t\t\t<div id=\"tk_speedy_offices\">

\t\t\t\t<input type=\"hidden\" id=\"shipping_to\" name=\"shipping_to\" value=\"office\" />
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
        if ((isset($context["speedy_offices_customer"]) ? $context["speedy_offices_customer"] : null)) {
            echo " 
\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"speedy_office_type\" value=\"existing\" checked=\"checked\" ";
            // line 22
            if ((array_key_exists("speedy_office_type", $context) && ((isset($context["speedy_office_type"]) ? $context["speedy_office_type"] : null) == "existing"))) {
                echo "checked=\"\"";
            }
            echo " onclick=\"jQuery('#speedy_office_new').hide();jQuery('#tk_speedy_office_existing').show();\" />
\t\t\t\t\t\t";
            // line 23
            echo (isset($context["text_address_existing"]) ? $context["text_address_existing"] : null);
            echo " 
\t\t\t\t\t</label>
\t\t\t\t</div>
\t\t\t\t<div id=\"tk_speedy_office_existing\">
\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t<select name=\"speedy_office_customer_id\">
\t\t\t\t\t\t\t";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["speedy_offices_customer"]) ? $context["speedy_offices_customer"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["speedy_office_customer"]) {
                echo " 
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<option value=\"";
                // line 31
                echo $this->getAttribute($context["speedy_office_customer"], "speedy_customer_id", array(), "array");
                echo "\" ";
                if ((array_key_exists("speedy_office_customer_id", $context) && ($this->getAttribute($context["speedy_office_customer"], "speedy_customer_id", array(), "array") == (isset($context["speedy_office_customer_id"]) ? $context["speedy_office_customer_id"] : null)))) {
                    echo "selected=\"selected\"";
                }
                echo ">";
                echo $this->getAttribute($context["speedy_office_customer"], "office_name", array(), "array");
                echo "</option>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['speedy_office_customer'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo " 
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t</div>\t 
\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t<label>
\t\t\t\t\t\t<input type=\"radio\" name=\"speedy_office_type\" value=\"new\" ";
            // line 39
            if ((array_key_exists("speedy_office_type", $context) && ((isset($context["speedy_office_type"]) ? $context["speedy_office_type"] : null) == "new"))) {
                echo "checked=\"\"";
            }
            echo " onclick=\"jQuery('#speedy_office_new').show();jQuery('#tk_speedy_office_existing').hide();\"/>
\t\t\t\t\t\t";
            // line 40
            echo (isset($context["text_address_new"]) ? $context["text_address_new"] : null);
            echo " 
\t\t\t\t\t</label>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t";
        } else {
            // line 44
            echo " 
\t\t\t\t<input type=\"hidden\" name=\"speedy_office_type\" value=\"new\">
\t\t\t\t";
        }
        // line 46
        echo " 

\t\t\t\t<div id=\"speedy_office_new\" ";
        // line 48
        if (( !(isset($context["speedy_offices_customer"]) ? $context["speedy_offices_customer"] : null) || (array_key_exists("speedy_office_type", $context) && ((isset($context["speedy_office_type"]) ? $context["speedy_office_type"] : null) == "new")))) {
            echo " style=\"display:block\"";
        } else {
            echo "style=\"display:none\"";
        }
        echo ">
\t\t\t\t
\t\t\t\t\t<div class=\"tk_6_column tk_center_column tk_speedy_office_city_select tk_required_box ";
        // line 50
        if ((isset($context["speedy_office_city"]) ? $context["speedy_office_city"] : null)) {
            echo " tk_redy_box";
        }
        echo "\" id=\"tk_speedy_office_city_select\">
\t\t\t\t\t
\t\t\t\t\t\t<input type=\"text\" id=\"speedy_office_city_select\" readonly=\"true\" name=\"speedy_office_city_select\" value=\"";
        // line 52
        echo (isset($context["speedy_office_city"]) ? $context["speedy_office_city"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["text_speedy_office_city"]) ? $context["text_speedy_office_city"] : null);
        echo "\" />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 53
        echo (isset($context["text_speedy_office_city"]) ? $context["text_speedy_office_city"] : null);
        echo "</span>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"tk_6_column tk_center_column tk_speedy_office_select tk_required_box ";
        // line 56
        if ((((twig_length_filter($this->env, (isset($context["speedy_offices"]) ? $context["speedy_offices"] : null)) < 1) || (isset($context["speedy_office_id"]) ? $context["speedy_office_id"] : null)) && (isset($context["speedy_office_city_id"]) ? $context["speedy_office_city_id"] : null))) {
            echo " tk_redy_box";
        }
        echo "\" id=\"tk_speedy_office_id\">
\t\t\t\t\t\t<input type=\"text\" id=\"speedy_office_select\" readonly=\"true\" name=\"speedy_office_select\" value=\"";
        // line 57
        if ((isset($context["speedy_office_id"]) ? $context["speedy_office_id"] : null)) {
            echo (((isset($context["speedy_office_id"]) ? $context["speedy_office_id"] : null) . " ") . (isset($context["speedy_office_name"]) ? $context["speedy_office_name"] : null));
        }
        echo "\" placeholder=\"";
        echo (isset($context["text_speedy_office_title"]) ? $context["text_speedy_office_title"] : null);
        echo "\" ";
        if ( !(isset($context["speedy_office_city_id"]) ? $context["speedy_office_city_id"] : null)) {
            echo "disabled=\"\"";
        }
        echo " />
\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 58
        echo (isset($context["text_speedy_office_title"]) ? $context["text_speedy_office_title"] : null);
        echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t<div class=\"tk_12_column tk_center_column \">
\t\t\t\t\t\t<input type=\"hidden\" id=\"speedy_office_name\" name=\"speedy_office_name\" value=\"";
        // line 62
        echo (isset($context["speedy_office_name"]) ? $context["speedy_office_name"] : null);
        echo "\" />
\t\t\t\t\t\t<input type=\"hidden\" id=\"speedy_office_address\" name=\"speedy_office_address\" value=\"";
        // line 63
        echo (isset($context["speedy_office_address"]) ? $context["speedy_office_address"] : null);
        echo "\" />
\t\t\t\t\t\t<input type=\"hidden\" id=\"speedy_office_city\" name=\"speedy_office_city\" value=\"";
        // line 64
        echo (isset($context["speedy_office_city"]) ? $context["speedy_office_city"] : null);
        echo "\">
\t\t\t\t\t\t<input type=\"hidden\" id=\"speedy_office_postcode\" name=\"speedy_office_postcode\" value=\"";
        // line 65
        echo (isset($context["speedy_office_postcode"]) ? $context["speedy_office_postcode"] : null);
        echo "\" />
\t\t\t\t\t\t<input type=\"hidden\" id=\"speedy_office_city_id\" name=\"speedy_office_city_id\" value=\"";
        // line 66
        echo (isset($context["speedy_office_city_id"]) ? $context["speedy_office_city_id"] : null);
        echo "\">
\t\t\t\t\t\t<input type=\"hidden\" id=\"speedy_office_id\" name=\"speedy_office_id\" value=\"";
        // line 67
        echo (isset($context["speedy_office_id"]) ? $context["speedy_office_id"] : null);
        echo "\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"tk_clear\"></div>\t\t
\t\t\t</div>\t
\t\t</div>\t
\t</div>\t
</div>

<div class=\"speedy_office_city_container radio_container mfp-hide\" id=\"speedy_office_city_locator\">
\t<div class=\"radio_search\">
\t\t<input id=\"speedy_office_city_search\" name=\"speedy_office_city_search\" type=\"text\" placeholder=\"Търсене..\" class=\"radio_box_search\">
\t</div>
\t<div class=\"radio_box\">
\t\t";
        // line 81
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["speedy_cities"]) ? $context["speedy_cities"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["speedy_city"]) {
            echo " 
\t\t<div class=\"radio_elements\">
\t\t\t<label>
\t\t\t\t<input type=\"radio\" name=\"tk_speedy_office_city_id\" value=\"";
            // line 84
            echo $this->getAttribute($context["speedy_city"], "city_id", array(), "array");
            echo "\" ";
            if ((array_key_exists("speedy_office_city_id", $context) && ($this->getAttribute($context["speedy_city"], "city_id", array(), "array") == (isset($context["speedy_office_city_id"]) ? $context["speedy_office_city_id"] : null)))) {
                echo "checked=\"\"";
            }
            echo " data-name=\"";
            echo $this->getAttribute($context["speedy_city"], "name", array(), "array");
            echo "\">";
            echo $this->getAttribute($context["speedy_city"], "name", array(), "array");
            echo " 
\t\t\t</label>
\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['speedy_city'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo " 
\t</div>
</div>

<div class=\"speedy_office_container radio_container mfp-hide\" id=\"speedy_office_id_locator\">
\t<div class=\"radio_search\">
\t\t<input id=\"speedy_office_search\" name=\"speedy_office_search\" type=\"text\" placeholder=\"Търсене..\" class=\"radio_box_search\">
\t</div>
\t<div class=\"radio_box\">
\t\t";
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["speedy_offices"]) ? $context["speedy_offices"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["office"]) {
            echo " 
\t\t<div class=\"radio_elements\">
\t\t\t<label>
\t\t\t\t<input type=\"radio\" name=\"tk_speedy_office_id\" value=\"";
            // line 99
            echo $this->getAttribute($context["office"], "office_id", array(), "array");
            echo "\" ";
            if ((array_key_exists("speedy_office_id", $context) && ($this->getAttribute($context["office"], "office_id", array(), "array") == (isset($context["speedy_office_id"]) ? $context["speedy_office_id"] : null)))) {
                echo "checked=\"\"";
            }
            echo " data-name=\"";
            echo $this->getAttribute($context["office"], "office_id", array(), "array");
            echo " ";
            echo $this->getAttribute($context["office"], "name", array(), "array");
            echo "\">
\t\t\t\t<span>";
            // line 100
            echo $this->getAttribute($context["office"], "office_id", array(), "array");
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
        // line 103
        echo " 
\t</div>
</div>

<script>
\t
\t\$(document).ready(function() { 
\t\t\tgetPaymentMethod();
\t});

\t//попъп за градове
\t\$(document).on('click', '#speedy_office_city_select', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$.magnificPopup.open( { 
\t\t\t\t\ttype: 'inline',
\t\t\t\t\titems: { src: '#speedy_office_city_locator'} 
\t\t\t\t});
\t\t\tsetTimeout(function () { 
\t\t\t\t\t\$('#speedy_office_city_search').focus();
\t\t\t\t} , 500);
\t\t});
\t 
\t//въвеждане на град ръчно
\t\$(\"#speedy_office_city_search\").on(\"keyup\", function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar value = \$(this).val().toLowerCase();
\t\t\tvar bg_value = transliterate(value);
\t\t\tvar en_value = transliterateEN(value);
\t\t\t\$(\"#speedy_office_city_locator .radio_box .radio_elements\").filter(function() { 
\t\t\t\t\t\$(this).toggle((\$(this).text().toLowerCase().indexOf(value) > -1 || \$(this).text().toLowerCase().indexOf(bg_value) > -1 || \$(this).text().toLowerCase().indexOf(en_value) > -1));
\t\t\t\t});
\t\t});

\t//добавяне на селектирания град и извеждаме офисите спрямо него
\t\$(document).delegate('#speedy_office_city_locator .radio_box input[type=\\'radio\\']', 'click', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar speedy_office_city_id = \$(this).val();
\t\t\tvar speedy_office_city = \$(this).data('name');
\t\t\t\$('#speedy_office_city_id').val(speedy_office_city_id);
\t\t\t\$('#speedy_office_city').val(speedy_office_city);
\t\t\t\$('#speedy_office_city_select').val(speedy_office_city);
\t\t
\t\t\t\$('.tk_all_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\t\$('#tk_checkout').css('opacity','0.6');
\t\t\t\$('#tk_checkout').css('pointer-events','none');
\t\t\t\$('#tk_button_confirm').prop('disabled', true);

\t\t\tgetOfficesByCityId();

\t\t\t\$.magnificPopup.close()

\t\t});

\t//попъп за офиси
\t\$(document).on('click', '#speedy_office_select', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\t\$.magnificPopup.open( { 
\t\t\t\t\ttype: 'inline',
\t\t\t\t\titems: { src: '#speedy_office_id_locator'} 
 
\t\t\t\t});

\t\t\tsetTimeout(function () { 
\t\t\t\t\t\$('#speedy_office_search').focus();
\t\t\t\t} , 500);
\t\t});
\t 
\t//въвеждане на офис ръчно
\t\$(\"#speedy_office_search\").on(\"keyup\", function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar value = \$(this).val().toLowerCase();
\t\t\tvar bg_value = transliterate(value);
\t\t\tvar en_value = transliterateEN(value);
\t\t\t\$(\"#speedy_office_id_locator .radio_box .radio_elements\").filter(function() { 
\t\t\t\t\t\$(this).toggle((\$(this).text().toLowerCase().indexOf(value) > -1 || \$(this).text().toLowerCase().indexOf(bg_value) > -1 || \$(this).text().toLowerCase().indexOf(en_value) > -1));
\t\t\t\t});
\t\t});

\t//добавяне на селектирания офис и извеждаме данните за него
\t\$(document).delegate('#speedy_office_id_locator .radio_box input[type=\\'radio\\']', 'click', function(e) { 
\t\t\te.stopImmediatePropagation();
\t\t\tvar speedy_office_id = \$(this).val();
\t\t\tvar speedy_office_name = \$(this).data('name');
\t\t\t\$('#speedy_office_id').val(speedy_office_id);
\t\t\t\$('#speedy_office_name').val(speedy_office_name);
\t\t\t\$('#speedy_office_select').val(speedy_office_name);
\t
\t\t\tgetOffice();

\t\t\t\$.magnificPopup.close()

\t\t});
\t 

\t//извежда офисите спрямо града и извиква призчислени методи за доставка => извежда преизчислени тотали в количката
\t//извиква данните за офиса ако е само 1
\tfunction getOfficesByCityId() { 
\t\t\$('.tk_speedy_office_select').removeClass('tk_redy_box');
\t\t
\t\t\$('#speedy_office_id').val('');
\t\t\$('#speedy_office_name').val('');
\t\t\$('#speedy_office_select').val('');
\t\t\$('#speedy_office_address').val('');
\t\t\$('#speedy_office_city').val('');
\t\t\$('#speedy_office_city_select').val('');
\t\t\$('#speedy_office_postcode').val('');

\t\toffice_city_id = \$('#speedy_office_city_id').val();

\t\t\$.ajax( { 
\t\t\t\turl: 'index.php?route=extension/shipping/tk_speedy/getOfficesByCityId',
\t\t\t\ttype: 'POST',
\t\t\t\tdata: 'city_id=' + encodeURIComponent(office_city_id),
\t\t\t\tdataType: 'json',
\t\t\t\tsuccess: function(data) { 
\t\t\t\t\tif (data) { 

\t\t\t\t\t\t\$('#speedy_office_city').val(data.office_city);
\t\t\t\t\t\t\$('#speedy_office_city_select').val(data.office_city);
\t\t\t\t\t\t\$('#speedy_office_select').prop(\"disabled\", false);
\t\t\t\t\t\t
\t\t\t\t\t\t//ако има повече от 1 офис изкаравме селектор, ако не слектираме автоматично
\t\t\t\t\t\tif(data.offices_count > 1) { 
\t\t\t\t\t\t\thtml_popup = '';
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
        // line 228
        if ((isset($context["speedy_office_id"]) ? $context["speedy_office_id"] : null)) {
            echo " 
\t\t\t\t\t\t\t\tvar office_id = ";
            // line 229
            echo (isset($context["speedy_office_id"]) ? $context["speedy_office_id"] : null);
            echo ";
\t\t\t\t\t\t\t";
        } else {
            // line 230
            echo " 
\t\t\t\t\t\t\t\tvar office_id = 0;
\t\t\t\t\t\t\t";
        }
        // line 232
        echo " 
\t\t\t\t\t\t\t
\t\t\t\t\t\t\tfor (i = 0; i < data.offices.length; i++) { 
\t\t\t\t\t\t\t\tif(office_id == data.offices[i]['office_id']) { 
\t\t\t\t\t\t\t\t\tvar office_checked = 'checked=\"\"';
\t\t\t\t\t\t\t\t } else { 
\t\t\t\t\t\t\t\t\tvar office_checked = '';
\t\t\t\t\t\t\t\t } 
\t\t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t\thtml_popup += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_speedy_office_id\" value=\"' + data.offices[i]['office_id'] + '\" ' + office_checked + ' data-name=\"' + data.offices[i]['office_id'] + ' ' + data.offices[i]['name'] + '\" ><span>' + data.offices[i]['office_id'] + '</span> <strong>' + data.offices[i]['name'] + '</strong><br> <i>' + data.offices[i]['address'] + '</i></label></div>';
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t } 
\t\t\t\t\t\t
\t\t\t\t\t\t\t\$('.tk_speedy_office_city_id').addClass('tk_redy_box');
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\$('#speedy_office_id_locator .radio_box').html(html_popup);
\t\t\t\t\t\t\t\$('#speedy_office_select').val('";
        // line 248
        echo (isset($context["text_speedy_office_title"]) ? $context["text_speedy_office_title"] : null);
        echo "');
\t\t

\t\t\t\t\t\t } else { 
\t\t\t\t\t\t\thtml_popup = '';
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\tfor (i = 0; i < 1; i++) { 
\t\t\t\t\t\t\t\thtml_popup += '<div class=\"radio_elements\"><label><input type=\"radio\" name=\"tk_speedy_office_id\" value=\"' + data.offices[i]['office_id'] + '\" checked=\"\" data-name=\"' + data.offices[i]['office_id'] + ' ' + data.offices[i]['name'] + '\"><span>' + data.offices[i]['office_id'] + '</span> <strong>' + data.offices[i]['name'] + '</strong><br> <i>' + data.offices[i]['address'] + '</i></label></div>';
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\tspeedy_office_id = data.offices[i]['office_id'];
\t\t\t\t\t\t\t\tspeedy_office_name = data.offices[i]['office_id'] + ' ' + data.offices[i]['name'];
\t\t\t\t\t\t\t } 
\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t\$('.tk_speedy_office_select').addClass('tk_redy_box');
\t\t\t\t\t\t\t\$('.tk_speedy_office_city_select').addClass('tk_redy_box');
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\$('#speedy_office_id_locator .radio_box').html(html_popup);
\t\t\t\t\t\t\t\$('#speedy_office_id').val(speedy_office_id);
\t\t\t\t\t\t\t\$('#speedy_office_name').val(speedy_office_name);
\t\t\t\t\t\t\t\$('#speedy_office_select').val(speedy_office_name);
\t
\t\t\t\t\t\t\tgetOffice();
\t\t\t\t\t\t} \t
\t\t\t\t\t} 
\t\t\t\t\t
\t\t\t\t\tgetShippingMethodAddress();
\t\t\t\t } 
\t\t\t } );
\t } 
\t
\t//извиква данните за офиса
\tfunction getOffice() { 

\t\toffice_id = \$('#speedy_office_id').val();

\t\t\$.ajax( { 
\t\t\t\turl: 'index.php?route=extension/shipping/tk_speedy/getOffice',
\t\t\t\ttype: 'POST',
\t\t\t\tdata: 'office_id=' + encodeURIComponent(office_id),
\t\t\t\tdataType: 'json',
\t\t\t\tsuccess: function(data) { 
\t\t
\t\t\t\t\tif (data && data.name) { 
\t\t\t\t\t\t\$('#speedy_office_name').val(data.name);
\t\t\t\t\t\t\$('#speedy_office_select').val(data.office_id + ' ' + data.name);
\t\t\t\t\t\t\$('#speedy_office_address').val(data.address);
\t\t\t\t\t\t\$('#speedy_office_city').val(data.office_city);
\t\t\t\t\t\t\$('#speedy_office_city_select').val(data.office_city);
\t\t\t\t\t\t
\t\t\t\t\t\t\$('#speedy_office_postcode').val(data.post_code);
\t\t\t\t\t\t\$('.tk_speedy_office_select').addClass('tk_redy_box');
\t\t\t\t\t\t
\t\t\t\t\t\t} 
\t\t\t\t\t
\t\t\t\t\tsaveData();
\t\t\t\t} 
\t\t\t } );
\t } 
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
        return "default/template/tk_checkout/speedy_office.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  445 => 248,  427 => 232,  422 => 230,  417 => 229,  413 => 228,  286 => 103,  272 => 100,  260 => 99,  252 => 96,  241 => 87,  223 => 84,  215 => 81,  198 => 67,  194 => 66,  190 => 65,  186 => 64,  182 => 63,  178 => 62,  171 => 58,  159 => 57,  153 => 56,  147 => 53,  141 => 52,  134 => 50,  125 => 48,  121 => 46,  116 => 44,  108 => 40,  102 => 39,  94 => 33,  79 => 31,  72 => 29,  63 => 23,  57 => 22,  51 => 19,  47 => 17,  42 => 16,  38 => 15,  25 => 5,  19 => 1,);
    }
}
/* <div id="tk_speedy_office">*/
/* 	<div class="tk_panel">*/
/* 		<div class="tk_panel_heading">*/
/* 			<span class="tk_panel_icon"><span class="tk_icon-address"></span></span> */
/* 			<span class="tk_panel_text"> {{ text_speedy_office_title }}</span> */
/* 			<span class="tk_all_spin"><i class="tk_icon-spin rotating"></i></span>*/
/* 		</div>				*/
/* 	*/
/* 		<div class="tk_panel_body">*/
/* 			<div id="tk_speedy_offices">*/
/* */
/* 				<input type="hidden" id="shipping_to" name="shipping_to" value="office" />*/
/* 				<input type="hidden" id="shipping_type" name="shipping_type" value="speedy" />*/
/* 				*/
/* 				{% if module_tk_checkout_zone is not defined or module_tk_checkout_zone == 0 %} */
/* 				<input type="hidden" id="zone_id" name="zone_id" value="{{ zone_id }}" />*/
/* 				{% endif %} */
/* */
/* 				{% if (speedy_offices_customer) %} */
/* 				<div class="tk_12_column tk_center_column">*/
/* 					<label>*/
/* 						<input type="radio" name="speedy_office_type" value="existing" checked="checked" {% if (speedy_office_type is defined and speedy_office_type == 'existing') %}checked=""{% endif %} onclick="jQuery('#speedy_office_new').hide();jQuery('#tk_speedy_office_existing').show();" />*/
/* 						{{ text_address_existing }} */
/* 					</label>*/
/* 				</div>*/
/* 				<div id="tk_speedy_office_existing">*/
/* 					<div class="tk_12_column tk_center_column">*/
/* 						<select name="speedy_office_customer_id">*/
/* 							{% for speedy_office_customer in speedy_offices_customer %} */
/* 								*/
/* 							<option value="{{ speedy_office_customer['speedy_customer_id'] }}" {% if (speedy_office_customer_id is defined and speedy_office_customer['speedy_customer_id'] == speedy_office_customer_id) %}selected="selected"{% endif %}>{{ speedy_office_customer['office_name'] }}</option>*/
/* 								*/
/* 							{% endfor %} */
/* 						</select>*/
/* 					</div>*/
/* 				</div>	 */
/* 				<div class="tk_12_column tk_center_column">*/
/* 					<label>*/
/* 						<input type="radio" name="speedy_office_type" value="new" {% if (speedy_office_type is defined and speedy_office_type == 'new') %}checked=""{% endif %} onclick="jQuery('#speedy_office_new').show();jQuery('#tk_speedy_office_existing').hide();"/>*/
/* 						{{ text_address_new }} */
/* 					</label>*/
/* 				</div>*/
/* 				*/
/* 				{% else %} */
/* 				<input type="hidden" name="speedy_office_type" value="new">*/
/* 				{% endif %} */
/* */
/* 				<div id="speedy_office_new" {% if (not speedy_offices_customer or (speedy_office_type is defined and speedy_office_type == 'new')) %} style="display:block"{% else %}style="display:none"{% endif %}>*/
/* 				*/
/* 					<div class="tk_6_column tk_center_column tk_speedy_office_city_select tk_required_box {% if (speedy_office_city) %} tk_redy_box{% endif %}" id="tk_speedy_office_city_select">*/
/* 					*/
/* 						<input type="text" id="speedy_office_city_select" readonly="true" name="speedy_office_city_select" value="{{ speedy_office_city }}" placeholder="{{ text_speedy_office_city }}" />*/
/* 						<span class="tk_floating_label">{{text_speedy_office_city }}</span>*/
/* 					</div>*/
/* */
/* 					<div class="tk_6_column tk_center_column tk_speedy_office_select tk_required_box {% if (((speedy_offices|length) < 1 or speedy_office_id) and speedy_office_city_id) %} tk_redy_box{% endif %}" id="tk_speedy_office_id">*/
/* 						<input type="text" id="speedy_office_select" readonly="true" name="speedy_office_select" value="{% if (speedy_office_id) %}{{ speedy_office_id ~ ' ' ~ speedy_office_name }}{% endif %}" placeholder="{{ text_speedy_office_title }}" {% if (not speedy_office_city_id) %}disabled=""{% endif %} />*/
/* 						<span class="tk_floating_label">{{text_speedy_office_title }}</span>*/
/* 					</div>*/
/* 					<div class="tk_clear"></div>*/
/* 					<div class="tk_12_column tk_center_column ">*/
/* 						<input type="hidden" id="speedy_office_name" name="speedy_office_name" value="{{ speedy_office_name }}" />*/
/* 						<input type="hidden" id="speedy_office_address" name="speedy_office_address" value="{{ speedy_office_address }}" />*/
/* 						<input type="hidden" id="speedy_office_city" name="speedy_office_city" value="{{ speedy_office_city }}">*/
/* 						<input type="hidden" id="speedy_office_postcode" name="speedy_office_postcode" value="{{ speedy_office_postcode }}" />*/
/* 						<input type="hidden" id="speedy_office_city_id" name="speedy_office_city_id" value="{{ speedy_office_city_id }}">*/
/* 						<input type="hidden" id="speedy_office_id" name="speedy_office_id" value="{{ speedy_office_id }}">*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="tk_clear"></div>		*/
/* 			</div>	*/
/* 		</div>	*/
/* 	</div>	*/
/* </div>*/
/* */
/* <div class="speedy_office_city_container radio_container mfp-hide" id="speedy_office_city_locator">*/
/* 	<div class="radio_search">*/
/* 		<input id="speedy_office_city_search" name="speedy_office_city_search" type="text" placeholder="Търсене.." class="radio_box_search">*/
/* 	</div>*/
/* 	<div class="radio_box">*/
/* 		{% for speedy_city in speedy_cities %} */
/* 		<div class="radio_elements">*/
/* 			<label>*/
/* 				<input type="radio" name="tk_speedy_office_city_id" value="{{ speedy_city['city_id'] }}" {% if (speedy_office_city_id is defined and speedy_city['city_id'] == speedy_office_city_id) %}checked=""{% endif %} data-name="{{ speedy_city['name'] }}">{{ speedy_city['name'] }} */
/* 			</label>*/
/* 		</div>*/
/* 		{% endfor %} */
/* 	</div>*/
/* </div>*/
/* */
/* <div class="speedy_office_container radio_container mfp-hide" id="speedy_office_id_locator">*/
/* 	<div class="radio_search">*/
/* 		<input id="speedy_office_search" name="speedy_office_search" type="text" placeholder="Търсене.." class="radio_box_search">*/
/* 	</div>*/
/* 	<div class="radio_box">*/
/* 		{% for office in speedy_offices %} */
/* 		<div class="radio_elements">*/
/* 			<label>*/
/* 				<input type="radio" name="tk_speedy_office_id" value="{{ office['office_id'] }}" {% if (speedy_office_id is defined and office['office_id'] == speedy_office_id) %}checked=""{% endif %} data-name="{{ office['office_id'] }} {{ office['name'] }}">*/
/* 				<span>{{ office['office_id'] }}</span> <strong>{{ office['name'] }}</strong> <br> <i>{{ office['address'] }}</i>*/
/* 			</label>*/
/* 		</div>*/
/* 		{% endfor %} */
/* 	</div>*/
/* </div>*/
/* */
/* <script>*/
/* 	*/
/* 	$(document).ready(function() { */
/* 			getPaymentMethod();*/
/* 	});*/
/* */
/* 	//попъп за градове*/
/* 	$(document).on('click', '#speedy_office_city_select', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$.magnificPopup.open( { */
/* 					type: 'inline',*/
/* 					items: { src: '#speedy_office_city_locator'} */
/* 				});*/
/* 			setTimeout(function () { */
/* 					$('#speedy_office_city_search').focus();*/
/* 				} , 500);*/
/* 		});*/
/* 	 */
/* 	//въвеждане на град ръчно*/
/* 	$("#speedy_office_city_search").on("keyup", function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var value = $(this).val().toLowerCase();*/
/* 			var bg_value = transliterate(value);*/
/* 			var en_value = transliterateEN(value);*/
/* 			$("#speedy_office_city_locator .radio_box .radio_elements").filter(function() { */
/* 					$(this).toggle(($(this).text().toLowerCase().indexOf(value) > -1 || $(this).text().toLowerCase().indexOf(bg_value) > -1 || $(this).text().toLowerCase().indexOf(en_value) > -1));*/
/* 				});*/
/* 		});*/
/* */
/* 	//добавяне на селектирания град и извеждаме офисите спрямо него*/
/* 	$(document).delegate('#speedy_office_city_locator .radio_box input[type=\'radio\']', 'click', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var speedy_office_city_id = $(this).val();*/
/* 			var speedy_office_city = $(this).data('name');*/
/* 			$('#speedy_office_city_id').val(speedy_office_city_id);*/
/* 			$('#speedy_office_city').val(speedy_office_city);*/
/* 			$('#speedy_office_city_select').val(speedy_office_city);*/
/* 		*/
/* 			$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 			$('#tk_checkout').css('opacity','0.6');*/
/* 			$('#tk_checkout').css('pointer-events','none');*/
/* 			$('#tk_button_confirm').prop('disabled', true);*/
/* */
/* 			getOfficesByCityId();*/
/* */
/* 			$.magnificPopup.close()*/
/* */
/* 		});*/
/* */
/* 	//попъп за офиси*/
/* 	$(document).on('click', '#speedy_office_select', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			$.magnificPopup.open( { */
/* 					type: 'inline',*/
/* 					items: { src: '#speedy_office_id_locator'} */
/*  */
/* 				});*/
/* */
/* 			setTimeout(function () { */
/* 					$('#speedy_office_search').focus();*/
/* 				} , 500);*/
/* 		});*/
/* 	 */
/* 	//въвеждане на офис ръчно*/
/* 	$("#speedy_office_search").on("keyup", function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var value = $(this).val().toLowerCase();*/
/* 			var bg_value = transliterate(value);*/
/* 			var en_value = transliterateEN(value);*/
/* 			$("#speedy_office_id_locator .radio_box .radio_elements").filter(function() { */
/* 					$(this).toggle(($(this).text().toLowerCase().indexOf(value) > -1 || $(this).text().toLowerCase().indexOf(bg_value) > -1 || $(this).text().toLowerCase().indexOf(en_value) > -1));*/
/* 				});*/
/* 		});*/
/* */
/* 	//добавяне на селектирания офис и извеждаме данните за него*/
/* 	$(document).delegate('#speedy_office_id_locator .radio_box input[type=\'radio\']', 'click', function(e) { */
/* 			e.stopImmediatePropagation();*/
/* 			var speedy_office_id = $(this).val();*/
/* 			var speedy_office_name = $(this).data('name');*/
/* 			$('#speedy_office_id').val(speedy_office_id);*/
/* 			$('#speedy_office_name').val(speedy_office_name);*/
/* 			$('#speedy_office_select').val(speedy_office_name);*/
/* 	*/
/* 			getOffice();*/
/* */
/* 			$.magnificPopup.close()*/
/* */
/* 		});*/
/* 	 */
/* */
/* 	//извежда офисите спрямо града и извиква призчислени методи за доставка => извежда преизчислени тотали в количката*/
/* 	//извиква данните за офиса ако е само 1*/
/* 	function getOfficesByCityId() { */
/* 		$('.tk_speedy_office_select').removeClass('tk_redy_box');*/
/* 		*/
/* 		$('#speedy_office_id').val('');*/
/* 		$('#speedy_office_name').val('');*/
/* 		$('#speedy_office_select').val('');*/
/* 		$('#speedy_office_address').val('');*/
/* 		$('#speedy_office_city').val('');*/
/* 		$('#speedy_office_city_select').val('');*/
/* 		$('#speedy_office_postcode').val('');*/
/* */
/* 		office_city_id = $('#speedy_office_city_id').val();*/
/* */
/* 		$.ajax( { */
/* 				url: 'index.php?route=extension/shipping/tk_speedy/getOfficesByCityId',*/
/* 				type: 'POST',*/
/* 				data: 'city_id=' + encodeURIComponent(office_city_id),*/
/* 				dataType: 'json',*/
/* 				success: function(data) { */
/* 					if (data) { */
/* */
/* 						$('#speedy_office_city').val(data.office_city);*/
/* 						$('#speedy_office_city_select').val(data.office_city);*/
/* 						$('#speedy_office_select').prop("disabled", false);*/
/* 						*/
/* 						//ако има повече от 1 офис изкаравме селектор, ако не слектираме автоматично*/
/* 						if(data.offices_count > 1) { */
/* 							html_popup = '';*/
/* 								*/
/* 							{% if (speedy_office_id) %} */
/* 								var office_id = {{ speedy_office_id }};*/
/* 							{% else %} */
/* 								var office_id = 0;*/
/* 							{% endif %} */
/* 							*/
/* 							for (i = 0; i < data.offices.length; i++) { */
/* 								if(office_id == data.offices[i]['office_id']) { */
/* 									var office_checked = 'checked=""';*/
/* 								 } else { */
/* 									var office_checked = '';*/
/* 								 } */
/* 									 */
/* 								html_popup += '<div class="radio_elements"><label><input type="radio" name="tk_speedy_office_id" value="' + data.offices[i]['office_id'] + '" ' + office_checked + ' data-name="' + data.offices[i]['office_id'] + ' ' + data.offices[i]['name'] + '" ><span>' + data.offices[i]['office_id'] + '</span> <strong>' + data.offices[i]['name'] + '</strong><br> <i>' + data.offices[i]['address'] + '</i></label></div>';*/
/* 								*/
/* 							 } */
/* 						*/
/* 							$('.tk_speedy_office_city_id').addClass('tk_redy_box');*/
/* 							*/
/* 							$('#speedy_office_id_locator .radio_box').html(html_popup);*/
/* 							$('#speedy_office_select').val('{{ text_speedy_office_title }}');*/
/* 		*/
/* */
/* 						 } else { */
/* 							html_popup = '';*/
/* 								*/
/* 							for (i = 0; i < 1; i++) { */
/* 								html_popup += '<div class="radio_elements"><label><input type="radio" name="tk_speedy_office_id" value="' + data.offices[i]['office_id'] + '" checked="" data-name="' + data.offices[i]['office_id'] + ' ' + data.offices[i]['name'] + '"><span>' + data.offices[i]['office_id'] + '</span> <strong>' + data.offices[i]['name'] + '</strong><br> <i>' + data.offices[i]['address'] + '</i></label></div>';*/
/* 									*/
/* 								speedy_office_id = data.offices[i]['office_id'];*/
/* 								speedy_office_name = data.offices[i]['office_id'] + ' ' + data.offices[i]['name'];*/
/* 							 } */
/* 							 */
/* 							$('.tk_speedy_office_select').addClass('tk_redy_box');*/
/* 							$('.tk_speedy_office_city_select').addClass('tk_redy_box');*/
/* 								*/
/* 							$('#speedy_office_id_locator .radio_box').html(html_popup);*/
/* 							$('#speedy_office_id').val(speedy_office_id);*/
/* 							$('#speedy_office_name').val(speedy_office_name);*/
/* 							$('#speedy_office_select').val(speedy_office_name);*/
/* 	*/
/* 							getOffice();*/
/* 						} 	*/
/* 					} */
/* 					*/
/* 					getShippingMethodAddress();*/
/* 				 } */
/* 			 } );*/
/* 	 } */
/* 	*/
/* 	//извиква данните за офиса*/
/* 	function getOffice() { */
/* */
/* 		office_id = $('#speedy_office_id').val();*/
/* */
/* 		$.ajax( { */
/* 				url: 'index.php?route=extension/shipping/tk_speedy/getOffice',*/
/* 				type: 'POST',*/
/* 				data: 'office_id=' + encodeURIComponent(office_id),*/
/* 				dataType: 'json',*/
/* 				success: function(data) { */
/* 		*/
/* 					if (data && data.name) { */
/* 						$('#speedy_office_name').val(data.name);*/
/* 						$('#speedy_office_select').val(data.office_id + ' ' + data.name);*/
/* 						$('#speedy_office_address').val(data.address);*/
/* 						$('#speedy_office_city').val(data.office_city);*/
/* 						$('#speedy_office_city_select').val(data.office_city);*/
/* 						*/
/* 						$('#speedy_office_postcode').val(data.post_code);*/
/* 						$('.tk_speedy_office_select').addClass('tk_redy_box');*/
/* 						*/
/* 						} */
/* 					*/
/* 					saveData();*/
/* 				} */
/* 			 } );*/
/* 	 } */
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
