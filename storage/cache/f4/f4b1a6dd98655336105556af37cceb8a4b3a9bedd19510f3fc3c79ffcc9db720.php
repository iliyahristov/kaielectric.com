<?php

/* sale/tk_econt.twig */
class __TwigTemplate_4949d23bdc4a1f3e3b891dfef080d052b9f4f7996b5929b0b7c4be8ee054ac67 extends Twig_Template
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
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo " 
<div id=\"content\">
<div class=\"page-header\">
\t<div class=\"container-fluid\">
\t\t<div class=\"pull-right\"><a href=\"";
        // line 5
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i> ";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "</a></div>
\t\t<h1>";
        // line 6
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo " - ";
        echo (isset($context["text_order"]) ? $context["text_order"] : null);
        echo ": ";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "</h1>
\t\t<ul class=\"breadcrumb\">
\t\t\t";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            echo " 
\t\t\t<li><a href=\"";
            // line 9
            echo $this->getAttribute($context["breadcrumb"], "href", array(), "array");
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array(), "array");
            echo "</a></li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo " 
\t\t</ul>
\t</div>
</div>
<div class=\"container-fluid\">
\t<div class=\"panel panel-default\">
\t\t<div class=\"panel-heading\">
\t\t\t<h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 17
        echo (isset($context["text_form"]) ? $context["text_form"] : null);
        echo "  - ";
        echo (isset($context["text_order"]) ? $context["text_order"] : null);
        echo ": ";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "</h3>
\t\t</div>
\t\t<div class=\"panel-body\">
\t\t\t<form class=\"form-horizontal econt_form\">
  \t\t\t
\t\t\t\t<input type=\"hidden\" name=\"order_id\" value=\"";
        // line 22
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "\" />
\t\t\t\t
\t\t\t\t<div class=\"form-group\" id=\"status_id\" >
\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"status_id\">Статус</label>
\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t<select class=\"form-control\" id=\"status_id\" name=\"status_id\">
\t\t\t\t\t\t\t<option value=\"0\" ";
        // line 28
        if (((isset($context["status_id"]) ? $context["status_id"] : null) == 0)) {
            echo "selected=\"selected\"";
        }
        echo ">Не обработена</option>
\t\t\t\t\t\t\t<option value=\"1\" ";
        // line 29
        if (((isset($context["status_id"]) ? $context["status_id"] : null) == 1)) {
            echo "selected=\"selected\"";
        }
        echo ">Обработена</option>
\t\t\t\t\t\t\t<option value=\"2\" ";
        // line 30
        if (((isset($context["status_id"]) ? $context["status_id"] : null) == 2)) {
            echo "selected=\"selected\"";
        }
        echo ">Има товарителница</option>
\t\t\t\t\t
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"form-group\" id=\"payment_code\" >
\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"payment_code\">Метод на плащане</label>
\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t<select class=\"form-control\" id=\"payment_code\" name=\"payment_code\">
\t\t\t\t\t\t\t<option value=\"cod\" ";
        // line 40
        if (((isset($context["payment_code"]) ? $context["payment_code"] : null) == "cod")) {
            echo "selected=\"selected\"";
        }
        echo ">Наложено плащане</option>
\t\t\t\t\t\t\t<option value=\"tk_econt_payment\" ";
        // line 41
        if (((isset($context["payment_code"]) ? $context["payment_code"] : null) == "tk_econt_payment")) {
            echo "selected=\"selected\"";
        }
        echo ">Гарантирано от Еконт</option>
\t\t\t\t\t\t\t<option value=\"bank\" ";
        // line 42
        if ((((isset($context["payment_code"]) ? $context["payment_code"] : null) != "cod") && ((isset($context["payment_code"]) ? $context["payment_code"] : null) != "tk_econt_payment"))) {
            echo "selected=\"selected\"";
        }
        echo ">Без наложено плащане</option>
\t\t\t\t\t
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t<input type=\"hidden\" name=\"date_delivery\" value=\"";
        // line 48
        echo (isset($context["date_delivery"]) ? $context["date_delivery"] : null);
        echo "\" />
 
\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<label class=\"col-sm-3 control-label\">";
        // line 51
        echo (isset($context["text_receiver_shipping_to"]) ? $context["text_receiver_shipping_to"] : null);
        echo "</label>
\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t
\t\t\t\t\t\t<label class=\"radio-inline\" style=\"display: inline; width: auto; float: none;\">
\t\t\t\t\t\t\t<input type=\"radio\" id=\"to_door\" name=\"shipping_to\" value=\"address\" ";
        // line 55
        if (((isset($context["shipping_to"]) ? $context["shipping_to"] : null) == "address")) {
            echo "checked=\"checked\"";
        }
        echo " onclick=\"\$('#econt_addres').show();\$('#econt_office').hide();\$('#econt_machine').hide();\" />
\t\t\t\t\t\t\t";
        // line 56
        echo (isset($context["text_to_door"]) ? $context["text_to_door"] : null);
        echo "
\t\t\t\t\t\t</label>   
\t\t\t\t\t\t           
\t\t\t\t\t\t<label class=\"radio-inline\" style=\"display: inline; width: auto; float: none;\">
\t\t\t\t\t\t\t<input type=\"radio\" id=\"to_office\" name=\"shipping_to\" value=\"office\" ";
        // line 60
        if (((isset($context["shipping_to"]) ? $context["shipping_to"] : null) == "office")) {
            echo "checked=\"checked\"";
        }
        echo " onclick=\"\$('#econt_office').show();\$('#econt_addres').hide();\$('#econt_machine').hide();\" />
\t\t\t\t\t\t\t";
        // line 61
        echo (isset($context["text_to_office"]) ? $context["text_to_office"] : null);
        echo "
\t\t\t\t\t\t</label>
\t\t\t\t\t\t
\t\t\t\t\t\t<label class=\"radio-inline\" style=\"display: inline; width: auto; float: none;\">
\t\t\t\t\t\t\t<input type=\"radio\" id=\"to_machine\" name=\"shipping_to\" value=\"machine\" ";
        // line 65
        if (((isset($context["shipping_to"]) ? $context["shipping_to"] : null) == "machine")) {
            echo "checked=\"checked\"";
        }
        echo " onclick=\"\$('#econt_machine').show();\$('#econt_addres').hide();\$('#econt_office').hide();\" />
\t\t\t\t\t\t\tЕконтомат
\t\t\t\t\t\t</label>
\t\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>
          \t\t
\t\t\t\t<div id=\"econt_addres\"  ";
        // line 74
        if (((isset($context["shipping_to"]) ? $context["shipping_to"] : null) == "address")) {
            echo "style=\"display: block;\"";
        } else {
            echo "style=\"display: none;\"";
        }
        echo ">
\t\t\t\t
\t\t\t\t\t<div class=\"form-group\" id=\"econt_post_code\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"postcode\">";
        // line 77
        echo (isset($context["text_receiver_postcode"]) ? $context["text_receiver_postcode"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"postcode\" name=\"postcode\" value=\"";
        // line 79
        echo (isset($context["postcode"]) ? $context["postcode"] : null);
        echo "\" size=\"3\" readonly=\"readonly\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
          
\t\t\t\t\t<div class=\"form-group\" id=\"econt_city\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"city\">";
        // line 84
        echo (isset($context["text_receiver_city"]) ? $context["text_receiver_city"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"city\" name=\"city\" value=\"";
        // line 86
        echo (isset($context["city_name"]) ? $context["city_name"] : null);
        echo "\" />
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"hidden\" id=\"city_id\" name=\"city_id\" value=\"";
        // line 87
        echo (isset($context["city_id"]) ? $context["city_id"] : null);
        echo "\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
          
\t\t\t\t\t<div class=\"form-group\" id=\"econt_quarter\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"quarter\">";
        // line 92
        echo (isset($context["text_receiver_quarter"]) ? $context["text_receiver_quarter"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"quarter\" name=\"quarter\" value=\"";
        // line 94
        echo (isset($context["quarter"]) ? $context["quarter"] : null);
        echo "\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\" id=\"econt_street\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"street\">";
        // line 98
        echo (isset($context["text_receiver_street"]) ? $context["text_receiver_street"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"street\" name=\"street\" value=\"";
        // line 100
        echo (isset($context["street"]) ? $context["street"] : null);
        echo "\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\" id=\"econt_street_num\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"street_num\">";
        // line 104
        echo (isset($context["text_receiver_street_num"]) ? $context["text_receiver_street_num"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"street_num\" name=\"street_num\" value=\"";
        // line 106
        echo (isset($context["street_num"]) ? $context["street_num"] : null);
        echo "\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\" id=\"econt_other\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"other\">";
        // line 110
        echo (isset($context["text_receiver_other"]) ? $context["text_receiver_other"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"other\" name=\"other\" value=\"";
        // line 112
        echo (isset($context["other"]) ? $context["other"] : null);
        echo "\" />
\t\t\t\t\t\t\t";
        // line 113
        if ((isset($context["error_receiver_address"]) ? $context["error_receiver_address"] : null)) {
            // line 114
            echo "\t\t\t\t\t\t\t<br />&nbsp;&nbsp;&nbsp;<span class=\"text-danger\">";
            echo (isset($context["error_receiver_address"]) ? $context["error_receiver_address"] : null);
            echo "</span>
\t\t\t\t\t\t\t";
        }
        // line 116
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t
\t\t\t\t<div id=\"econt_office\"  ";
        // line 120
        if (((isset($context["shipping_to"]) ? $context["shipping_to"] : null) == "office")) {
            echo "style=\"display: block;\"";
        } else {
            echo "style=\"display: none;\"";
        }
        echo ">
\t\t\t\t\t<div class=\"form-group\" id=\"econt_office_city_id\" >
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"office_city_id\">";
        // line 122
        echo (isset($context["text_receiver_city"]) ? $context["text_receiver_city"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select class=\"form-control\" id=\"office_city_id\" name=\"office_city_id\" onchange=\"getOfficesByCityId(0);\">
\t\t\t\t\t\t\t\t<option value=\"0\">";
        // line 125
        echo (isset($context["text_select"]) ? $context["text_select"] : null);
        echo "</option>
\t\t\t\t\t\t\t\t";
        // line 126
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["office_cities"]) ? $context["office_cities"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
            echo " 
\t\t\t\t\t\t\t\t";
            // line 127
            if ((array_key_exists("office_city_id", $context) && ($this->getAttribute($context["city"], "city_id", array(), "array") == (isset($context["office_city_id"]) ? $context["office_city_id"] : null)))) {
                echo " 
\t\t\t\t\t\t\t\t<option value=\"";
                // line 128
                echo $this->getAttribute($context["city"], "city_id", array(), "array");
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["city"], "name", array(), "array");
                echo "</option>
\t\t\t\t\t\t\t\t";
            } else {
                // line 129
                echo " 
\t\t\t\t\t\t\t\t<option value=\"";
                // line 130
                echo $this->getAttribute($context["city"], "city_id", array(), "array");
                echo "\">";
                echo $this->getAttribute($context["city"], "name", array(), "array");
                echo "</option>
\t\t\t\t\t\t\t\t";
            }
            // line 131
            echo " 
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 132
        echo " 
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t
\t\t\t\t\t<div class=\"form-group\" id=\"econt_office_id\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"office_id\">";
        // line 138
        echo (isset($context["text_receiver_office"]) ? $context["text_receiver_office"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select class=\"form-control\" id=\"office_id\" name=\"office_id\" onchange=\"getOffice(0);\">
\t\t\t\t\t\t\t\t<option value=\"0\">";
        // line 141
        echo (isset($context["text_select"]) ? $context["text_select"] : null);
        echo "</option>
\t\t\t\t\t\t\t\t";
        // line 142
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["offices"]) ? $context["offices"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["office"]) {
            echo " 
\t\t\t\t\t\t\t\t";
            // line 143
            if (($this->getAttribute($context["office"], "office_id", array(), "array") == (isset($context["office_id"]) ? $context["office_id"] : null))) {
                echo " 
\t\t\t\t\t\t\t\t<option value=\"";
                // line 144
                echo $this->getAttribute($context["office"], "office_id", array(), "array");
                echo "\" selected=\"selected\">";
                echo (((($this->getAttribute($context["office"], "office_code", array(), "array") . ", ") . $this->getAttribute($context["office"], "name", array(), "array")) . ", ") . $this->getAttribute($context["office"], "address", array(), "array"));
                echo "</option>
\t\t\t\t\t\t\t\t";
            } else {
                // line 145
                echo " 
\t\t\t\t\t\t\t\t<option value=\"";
                // line 146
                echo $this->getAttribute($context["office"], "office_id", array(), "array");
                echo "\">";
                echo (((($this->getAttribute($context["office"], "office_code", array(), "array") . ", ") . $this->getAttribute($context["office"], "name", array(), "array")) . ", ") . $this->getAttribute($context["office"], "address", array(), "array"));
                echo "</option>
\t\t\t\t\t\t\t\t";
            }
            // line 147
            echo " 
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['office'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 148
        echo " 
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t";
        // line 150
        if ((isset($context["error_receiver_office"]) ? $context["error_receiver_office"] : null)) {
            // line 151
            echo "\t\t\t\t\t\t\t<br />&nbsp;&nbsp;&nbsp;<span class=\"text-danger\">";
            echo (isset($context["error_receiver_office"]) ? $context["error_receiver_office"] : null);
            echo "</span>
\t\t\t\t\t\t\t";
        }
        // line 153
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\" id=\"econt_office_code\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"office_code\">";
        // line 157
        echo (isset($context["text_receiver_office_code"]) ? $context["text_receiver_office_code"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"office_code\" name=\"office_code\" value=\"";
        // line 159
        echo (isset($context["office_code"]) ? $context["office_code"] : null);
        echo "\" size=\"3\" readonly=\"readonly\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t</div>
          \t\t
\t\t\t\t<div id=\"econt_machine\"  ";
        // line 165
        if (((isset($context["shipping_to"]) ? $context["shipping_to"] : null) == "machine")) {
            echo "style=\"display: block;\"";
        } else {
            echo "style=\"display: none;\"";
        }
        echo ">
\t\t\t\t\t<div class=\"form-group\" id=\"econt_machine_city_id\" >
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"machine_city_id\">";
        // line 167
        echo (isset($context["text_receiver_city"]) ? $context["text_receiver_city"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select class=\"form-control\" id=\"machine_city_id\" name=\"machine_city_id\" onchange=\"getMachinesByCityId(0);\">
\t\t\t\t\t\t\t\t<option value=\"0\">";
        // line 170
        echo (isset($context["text_select"]) ? $context["text_select"] : null);
        echo "</option>
\t\t\t\t\t\t\t\t";
        // line 171
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["machine_cities"]) ? $context["machine_cities"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
            echo " 
\t\t\t\t\t\t\t\t";
            // line 172
            if ((array_key_exists("machine_city_id", $context) && ($this->getAttribute($context["city"], "city_id", array(), "array") == (isset($context["machine_city_id"]) ? $context["machine_city_id"] : null)))) {
                echo " 
\t\t\t\t\t\t\t\t<option value=\"";
                // line 173
                echo $this->getAttribute($context["city"], "city_id", array(), "array");
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["city"], "name", array(), "array");
                echo "</option>
\t\t\t\t\t\t\t\t";
            } else {
                // line 174
                echo " 
\t\t\t\t\t\t\t\t<option value=\"";
                // line 175
                echo $this->getAttribute($context["city"], "city_id", array(), "array");
                echo "\">";
                echo $this->getAttribute($context["city"], "name", array(), "array");
                echo "</option>
\t\t\t\t\t\t\t\t";
            }
            // line 176
            echo " 
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 177
        echo " 
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t
\t\t\t\t\t<div class=\"form-group\" id=\"econt_machine_id\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"machine_id\">Еконтомат</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<select class=\"form-control\" id=\"machine_id\" name=\"machine_id\" onchange=\"getMachine(0);\">
\t\t\t\t\t\t\t\t<option value=\"0\">";
        // line 187
        echo (isset($context["text_select"]) ? $context["text_select"] : null);
        echo "</option>
\t\t\t\t\t\t\t\t";
        // line 188
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["machines"]) ? $context["machines"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["machine"]) {
            echo " 
\t\t\t\t\t\t\t\t";
            // line 189
            if (($this->getAttribute($context["machine"], "office_id", array(), "array") == (isset($context["machine_id"]) ? $context["machine_id"] : null))) {
                echo " 
\t\t\t\t\t\t\t\t<option value=\"";
                // line 190
                echo $this->getAttribute($context["machine"], "office_id", array(), "array");
                echo "\" selected=\"selected\">";
                echo (((($this->getAttribute($context["machine"], "office_code", array(), "array") . ", ") . $this->getAttribute($context["machine"], "name", array(), "array")) . ", ") . $this->getAttribute($context["machine"], "address", array(), "array"));
                echo "</option>
\t\t\t\t\t\t\t\t";
            } else {
                // line 191
                echo " 
\t\t\t\t\t\t\t\t<option value=\"";
                // line 192
                echo $this->getAttribute($context["machine"], "office_id", array(), "array");
                echo "\">";
                echo (((($this->getAttribute($context["machine"], "office_code", array(), "array") . ", ") . $this->getAttribute($context["machine"], "name", array(), "array")) . ", ") . $this->getAttribute($context["machine"], "address", array(), "array"));
                echo "</option>
\t\t\t\t\t\t\t\t";
            }
            // line 193
            echo " 
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['machine'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 194
        echo " 
\t\t\t\t\t\t\t</select>
\t
\t\t\t\t\t\t\t";
        // line 197
        if ((isset($context["error_receiver_machine"]) ? $context["error_receiver_machine"] : null)) {
            // line 198
            echo "\t\t\t\t\t\t\t<br />&nbsp;&nbsp;&nbsp;<span class=\"text-danger\">";
            echo (isset($context["error_receiver_machine"]) ? $context["error_receiver_machine"] : null);
            echo "</span>
\t\t\t\t\t\t\t";
        }
        // line 200
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>


\t\t\t\t\t<div class=\"form-group\" id=\"econt_machine_code\" >
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"machine_code\">Код на Еконтомат</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"machine_code\" name=\"machine_code\" value=\"";
        // line 207
        echo (isset($context["machine_code"]) ? $context["machine_code"] : null);
        echo "\" size=\"3\" readonly=\"readonly\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t</div>
\t\t\t
\t\t\t
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-sm-6 text-left\">
                  
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-sm-6 text-right\">
              
\t\t\t\t\t\t<button type=\"button\" id=\"button-save\" class=\"btn btn-primary\"><i class=\"fa fa-check-circle\"></i> ";
        // line 220
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "</button>
\t\t\t\t\t</div>
\t\t\t\t</div>
              
\t\t\t</form>
\t\t</div>
\t</div>
</div>





<link href=\"view/javascript/jquery/magnific/magnific-popup.css\" rel=\"stylesheet\">
<script src=\"view/javascript/jquery/magnific/jquery.magnific-popup.min.js\"></script>
<script type=\"text/javascript\">

function getMachinesByCityId() {
\t\$('#machine_id').html('<option value=\"0\">";
        // line 238
        echo (isset($context["text_wait"]) ? $context["text_wait"] : null);
        echo "</option>');
\t\$('#machine_code').val('');
\tmachine_city_id = \$('#machine_city_id').val();

\t\$.ajax({
\t\t\turl: 'index.php?route=sale/tk_econt/getOfficesByCityId&is_machine=1&user_token=";
        // line 243
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\ttype: 'POST',
\t\t\tdata: 'city_id=' + encodeURIComponent(machine_city_id),
\t\t\tdataType: 'json',
\t\t\tsuccess: function(data) {
\t\t\t\tif (data) {
\t\t\t\t\thtml = '<option value=\"0\">";
        // line 249
        echo (isset($context["text_select"]) ? $context["text_select"] : null);
        echo "</option>';

\t\t\t\t\tfor (i = 0; i < data.length; i++) {
\t\t\t\t\t\thtml += '<option value=\"' + data[i]['office_id'] + '\">' + data[i]['office_code'] + ' ' + data[i]['name'] + ' - ' + data[i]['address'] +  '</option>';
\t\t\t\t\t}

\t\t\t\t\t\$('#machine_id').html(html);
\t\t\t\t\t
\t\t\t\t}
\t\t\t}
\t\t});
}

function getMachine() {

\t\$('#machine_code').val('');
\tmachine_id = \$('#machine_id').val();


\t\$.ajax({
\t\t\turl: 'index.php?route=sale/tk_econt/getOffice&user_token=";
        // line 269
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\ttype: 'POST',
\t\t\tdata: 'office_id=' + encodeURIComponent(machine_id),
\t\t\tdataType: 'json',
\t\t\tsuccess: function(data) {
\t\t\t\tif (data && data.office_code) {
\t\t\t\t\t\$('#machine_code').val(data.office_code);
\t\t\t\t\t\$('#machine_name').val(data.name);
\t\t\t\t\t\$('#machine_address').val(data.address);
\t\t\t\t\t\$('#machine_city').val(data.office_city);

\t\t\t\t}
\t\t\t}
\t\t});
}
\t
function getMachineByOfficeCode(office_code) {
\tif (parseInt(office_code)) {
\t\t\$.ajax({
\t\t\t\turl: 'index.php?route=sale/tk_econt/getOfficeByOfficeCode&user_token=";
        // line 288
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\t\ttype: 'POST',
\t\t\t\tdata: 'office_code=' + parseInt(office_code),
\t\t\t\tdataType: 'json',
\t\t\t\tsuccess: function(data) {
\t\t\t\t\tif (!data.error) {
\t\t\t\t\t\t\$('#office_city_id').val(data.city_id);
\t\t\t\t\t\thtml = '<option value=\"0\">";
        // line 295
        echo (isset($context["text_select"]) ? $context["text_select"] : null);
        echo "</option>';

\t\t\t\t\t\tfor (i = 0; i < data.offices.length; i++) {
\t\t\t\t\t\t\thtml += '<option ';
\t\t\t\t\t\t\tif (data.offices[i]['office_id'] == data.office_id) {
\t\t\t\t\t\t\t\thtml += 'selected=\"selected\"';
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\thtml += 'value=\"' + data.offices[i]['office_id'] + '\">' + data.offices[i]['office_code'] + ', ' + data.offices[i]['name'] + ', ' + data.offices[i]['address'] +  '</option>';
\t\t\t\t\t\t}

\t\t\t\t\t\t\$('#machine_id').html(html);
\t\t\t\t\t\t\$('#machine_code').val(office_code);
\t\t\t\t\t\t\$('#machine_name').val(data.name);
\t\t\t\t\t\t\$('#machine_address').val(data.address);
\t\t\t\t\t\t\$('#machine_city').val(data.office_city);
\t\t\t\t\t
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});
\t}
}

function getOfficesByCityId() {
\t\$('#office_id').html('<option value=\"0\">";
        // line 318
        echo (isset($context["text_wait"]) ? $context["text_wait"] : null);
        echo "</option>');
\t\$('#office_code').val('');
\toffice_city_id = \$('#office_city_id').val();

\t\$.ajax({

\t\t\turl: 'index.php?route=sale/tk_econt/getOfficesByCityId&is_machine=0&user_token=";
        // line 324
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\ttype: 'POST',
\t\t\tdata: 'city_id=' + encodeURIComponent(office_city_id),
\t\t\tdataType: 'json',
\t\t\tsuccess: function(data) {
\t\t\t\tif (data) {
\t\t\t\t\thtml = '<option value=\"0\">";
        // line 330
        echo (isset($context["text_select"]) ? $context["text_select"] : null);
        echo "</option>';

\t\t\t\t\tfor (i = 0; i < data.length; i++) {
\t\t\t\t\t\thtml += '<option value=\"' + data[i]['office_id'] + '\">' + data[i]['office_code'] + ' ' + data[i]['name'] + ' - ' + data[i]['address'] +  '</option>';
\t\t\t\t\t}

\t\t\t\t\t\$('#office_id').html(html);
\t\t\t\t\t
\t\t\t\t}
\t\t\t}
\t\t});
}

function getOffice() {

\t\$('#office_code').val('');
\toffice_id = \$('#office_id').val();


\t\$.ajax({
\t\t\turl: 'index.php?route=sale/tk_econt/getOffice&user_token=";
        // line 350
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\ttype: 'POST',
\t\t\tdata: 'office_id=' + encodeURIComponent(office_id),
\t\t\tdataType: 'json',
\t\t\tsuccess: function(data) {
\t\t\t\tif (data && data.office_code) {
\t\t\t\t\t\$('#office_code').val(data.office_code);
\t\t\t\t\t\$('#office_name').val(data.name);
\t\t\t\t\t\$('#office_address').val(data.address);
\t\t\t\t\t\$('#office_city').val(data.office_city);

\t\t\t\t}
\t\t\t}
\t\t});
}
\t
function getOfficeByOfficeCode(office_code) {
\tif (parseInt(office_code)) {
\t\t\$.ajax({
\t\t\t\turl: 'index.php?route=sale/tk_econt/getOfficeByOfficeCode&user_token=";
        // line 369
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\t\ttype: 'POST',
\t\t\t\tdata: 'office_code=' + parseInt(office_code),
\t\t\t\tdataType: 'json',
\t\t\t\tsuccess: function(data) {
\t\t\t\t\tif (!data.error) {
\t\t\t\t\t\t\$('#office_city_id').val(data.city_id);
\t\t\t\t\t\thtml = '<option value=\"0\">";
        // line 376
        echo (isset($context["text_select"]) ? $context["text_select"] : null);
        echo "</option>';

\t\t\t\t\t\tfor (i = 0; i < data.offices.length; i++) {
\t\t\t\t\t\t\thtml += '<option ';
\t\t\t\t\t\t\tif (data.offices[i]['office_id'] == data.office_id) {
\t\t\t\t\t\t\t\thtml += 'selected=\"selected\"';
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\thtml += 'value=\"' + data.offices[i]['office_id'] + '\">' + data.offices[i]['office_code'] + ', ' + data.offices[i]['name'] + ', ' + data.offices[i]['address'] +  '</option>';
\t\t\t\t\t\t}

\t\t\t\t\t\t\$('#office_id').html(html);
\t\t\t\t\t\t\$('#office_code').val(office_code);
\t\t\t\t\t\t\$('#office_name').val(data.name);
\t\t\t\t\t\t\$('#office_address').val(data.address);
\t\t\t\t\t\t\$('#office_city').val(data.office_city);
\t\t\t\t\t
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});
\t}
}

var sender_post_code = '";
        // line 398
        echo (isset($context["postcode"]) ? $context["postcode"] : null);
        echo "';
var econt_city = '";
        // line 399
        echo (isset($context["city_name"]) ? $context["city_name"] : null);
        echo "';
var econt_city_id = '";
        // line 400
        echo (isset($context["city_id"]) ? $context["city_id"] : null);
        echo "';
var econt_quarter = '";
        // line 401
        echo (isset($context["quarter"]) ? $context["quarter"] : null);
        echo "';
var econt_street = '";
        // line 402
        echo (isset($context["street"]) ? $context["street"] : null);
        echo "';
\t\t

\$('#city').autocomplete({
\t\t'source': function(request, response) {
\t\t\t\$.ajax({
\t\t\t\t\turl: 'index.php?route=sale/tk_econt/getCityByName&user_token=";
        // line 408
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&filter_name=' + encodeURIComponent(request),
\t\t\t\t\tdataType: 'json',
\t\t\t\t\tsuccess: function(json) {
\t\t\t\t\t\tresponse(\$.map(json, function(item) {
\t\t\t\t\t\t\t\t\treturn {
\t\t\t\t\t\t\t\t\t\tlabel:     item['post_code'] + ' ' + item['name'],
\t\t\t\t\t\t\t\t\t\tvalue:     item['post_code'] + ' ' + item['name'],
\t\t\t\t\t\t\t\t\t\tname:      item['name'],
\t\t\t\t\t\t\t\t\t\tcity_id:   item['city_id'],
\t\t\t\t\t\t\t\t\t\tpost_code: item['post_code']
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}));
\t\t\t\t\t}
\t\t\t\t});
\t\t},
\t\t'select': function(item) {
\t\t\tif (item) {
\t\t\t\tecont_city = item.name;
\t\t\t\t\$('#city').val(item.name);
\t\t\t\t\$('#city_id').val(item.city_id);
\t\t\t\t\$('#postcode').val(item.post_code);
\t\t\t\t\$('#quarter').val('');
\t\t\t\t\$('#street').val('');
\t\t\t\t\$('#street_num').val('');
\t\t\t\t\$('#other').val('');

\t\t\t\tif (item.post_code == sender_post_code) {
\t\t\t\t\t\$('#express_city_courier').show();
\t\t\t\t} else {
\t\t\t\t\t\$('#express_city_courier').hide();
\t\t\t\t}
\t\t\t}
\t\t},
\t\t'change': function(item) {
\t\t\tif(!item) {
\t\t\t\t\$('#city').val('');
\t\t\t\t\$('#city_id').val('');
\t\t\t\t\$('#postcode').val('');
\t\t\t}

\t\t\t\$('#quarter').val('');
\t\t\t\$('#street').val('');
\t\t\t\$('#street_num').val('');
\t\t\t\$('#other').val('');

\t\t\t\$('#express_city_courier').hide();
\t\t}
\t});

\$('#city').blur(function() {
\t\tif (\$(this).val() != econt_city) {
\t\t\t\$(this).val('');
\t\t\t\$('#city_id').val('');
\t\t\t\$('#postcode').val('');
\t\t\t\$('#quarter').val('');
\t\t\t\$('#street').val('');
\t\t\t\$('#street_num').val('');
\t\t\t\$('#other').val('');

\t\t\t\$('#express_city_courier').hide();
\t\t}
\t});

\$('#quarter').autocomplete({
\t\t'source': function(request, response) {
\t\t\t\$.ajax({
\t\t\t\t\turl: 'index.php?route=sale/tk_econt/getQuartersByName&user_token=";
        // line 474
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&filter_name=' +  encodeURIComponent(request) + '&city_id=' +  encodeURIComponent(\$('#city_id').val()),
\t\t\t\t\tdataType: 'json',
\t\t\t\t\tsuccess: function(json) {
\t\t\t\t\t\tresponse(\$.map(json, function(item) {
\t\t\t\t\t\t\t\t\treturn {
\t\t\t\t\t\t\t\t\t\tlabel: item['name'],
\t\t\t\t\t\t\t\t\t\tvalue: item['name']
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}));
\t\t\t\t\t}
\t\t\t\t});
\t\t},
\t\t'select': function(item) {
\t\t\tif (item) {
\t\t\t\tecont_quarter = item.label;
\t\t\t\t\$('#quarter').val(item['label']);
\t\t\t}
\t\t},
\t\t'change': function(item) {
\t\t\tif(!item) {
\t\t\t\t\$('#quarter').val('');
\t\t\t}
\t\t}
\t});

\$('#quarter').blur(function() {
\t\tif (\$(this).val() != econt_quarter) {
\t\t\t\$('#quarter').val('');
\t\t}
\t});

\$('#street').autocomplete({
\t\t'source': function(request, response) {
\t\t\t\$.ajax({
\t\t\t\t\turl: 'index.php?route=sale/tk_econt/getStreetsByName&user_token=";
        // line 508
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&filter_name=' +  encodeURIComponent(request) + '&city_id=' +  encodeURIComponent(\$('#city_id').val()),
\t\t\t\t\tdataType: 'json',
\t\t\t\t\tsuccess: function(json) {
\t\t\t\t\t\tresponse(\$.map(json, function(item) {
\t\t\t\t\t\t\t\t\treturn {
\t\t\t\t\t\t\t\t\t\tlabel: item['name'],
\t\t\t\t\t\t\t\t\t\tvalue: item['name']
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}));
\t\t\t\t\t}
\t\t\t\t});
\t\t},
\t\t'select': function(item) {
\t\t\tif (item) {
\t\t\t\tecont_street = item.label;
\t\t\t\t\$('#street').val(item['label']);
\t\t\t}
\t\t},
\t\t'change': function(item) {
\t\t\tif(!item) {
\t\t\t\t\$('#street').val('');
\t\t\t}
\t\t}
\t});

\$('#street').blur(function() {
\t\tif (\$(this).val() != econt_street) {
\t\t\t\$('#street').val('');
\t\t}
\t});

\$(document).delegate('#button-save', 'click', function()  {  

\t\tvar data = \$('.econt_form input[type=\\'text\\'], .econt_form input[type=\\'date\\'], .econt_form input[type=\\'datetime-local\\'], .econt_form input[type=\\'time\\'], .econt_form input[type=\\'password\\'], .econt_form input[type=\\'hidden\\'], .econt_form input[type=\\'checkbox\\']:checked, .econt_form input[type=\\'radio\\']:checked, .econt_form textarea, .econt_form select').serialize();

\t\t\$.ajax(  {  
\t\t\t\turl: 'index.php?route=sale/tk_econt/validate_post&user_token=";
        // line 544
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\t\ttype: 'post',
\t\t\t\tdata: data,
\t\t\t\tdataType: 'json',
\t\t\t\tbeforeSend: function()  {  
\t\t\t\t\t\$('#button-save').button('loading');
\t\t\t\t\t
\t\t\t\t}, 
\t\t\t\tcomplete: function()  {  
\t\t\t\t\t\$('#button-save').button('reset');
\t\t\t\t}, 
\t\t\t\t\t 
\t\t\t\tsuccess: function(json) {
\t\t\t\t\t\$('.alert, .text-danger').remove();

\t\t\t\t\tif (json['error']) {
\t\t\t\t\t\t\$('#content > .container-fluid').prepend('<div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + ' <button type=\"button\" class=\"close\" data-d==m==s=\"alert\">&times;</button></div>');
\t\t\t\t\t}

\t\t\t\t\tif (json['success']) {
\t\t\t\t\t\t\$('#content > .container-fluid').prepend('<div class=\"alert alert-success\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + '  <button type=\"button\" class=\"close\" data-d==m==s=\"alert\">&times;</button></div>');

\t\t\t\t\t}

\t\t\t\t\tif (json['order_id']) {
\t\t\t\t\t\t\$('input[name=\\'order_id\\']').val(json['order_id']);
\t\t\t\t\t}
\t\t\t\t},
\t\t\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t\t\t}
\t 
\t\t\t}); 
\t});
</script>
</div>
";
        // line 580
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "sale/tk_econt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  994 => 580,  955 => 544,  916 => 508,  879 => 474,  810 => 408,  801 => 402,  797 => 401,  793 => 400,  789 => 399,  785 => 398,  760 => 376,  750 => 369,  728 => 350,  705 => 330,  696 => 324,  687 => 318,  661 => 295,  651 => 288,  629 => 269,  606 => 249,  597 => 243,  589 => 238,  568 => 220,  552 => 207,  543 => 200,  537 => 198,  535 => 197,  530 => 194,  523 => 193,  516 => 192,  513 => 191,  506 => 190,  502 => 189,  496 => 188,  492 => 187,  480 => 177,  473 => 176,  466 => 175,  463 => 174,  456 => 173,  452 => 172,  446 => 171,  442 => 170,  436 => 167,  427 => 165,  418 => 159,  413 => 157,  407 => 153,  401 => 151,  399 => 150,  395 => 148,  388 => 147,  381 => 146,  378 => 145,  371 => 144,  367 => 143,  361 => 142,  357 => 141,  351 => 138,  343 => 132,  336 => 131,  329 => 130,  326 => 129,  319 => 128,  315 => 127,  309 => 126,  305 => 125,  299 => 122,  290 => 120,  284 => 116,  278 => 114,  276 => 113,  272 => 112,  267 => 110,  260 => 106,  255 => 104,  248 => 100,  243 => 98,  236 => 94,  231 => 92,  223 => 87,  219 => 86,  214 => 84,  206 => 79,  201 => 77,  191 => 74,  177 => 65,  170 => 61,  164 => 60,  157 => 56,  151 => 55,  144 => 51,  138 => 48,  127 => 42,  121 => 41,  115 => 40,  100 => 30,  94 => 29,  88 => 28,  79 => 22,  67 => 17,  58 => 10,  48 => 9,  42 => 8,  33 => 6,  27 => 5,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }} */
/* <div id="content">*/
/* <div class="page-header">*/
/* 	<div class="container-fluid">*/
/* 		<div class="pull-right"><a href="{{ cancel }}" class="btn btn-default"><i class="fa fa-reply"></i> {{ button_cancel }}</a></div>*/
/* 		<h1>{{ heading_title }} - {{ text_order }}: {{ order_id }}</h1>*/
/* 		<ul class="breadcrumb">*/
/* 			{% for breadcrumb in breadcrumbs %} */
/* 			<li><a href="{{ breadcrumb['href'] }}">{{ breadcrumb['text'] }}</a></li>*/
/* 			{% endfor %} */
/* 		</ul>*/
/* 	</div>*/
/* </div>*/
/* <div class="container-fluid">*/
/* 	<div class="panel panel-default">*/
/* 		<div class="panel-heading">*/
/* 			<h3 class="panel-title"><i class="fa fa-pencil"></i> {{ text_form }}  - {{ text_order }}: {{ order_id }}</h3>*/
/* 		</div>*/
/* 		<div class="panel-body">*/
/* 			<form class="form-horizontal econt_form">*/
/*   			*/
/* 				<input type="hidden" name="order_id" value="{{ order_id }}" />*/
/* 				*/
/* 				<div class="form-group" id="status_id" >*/
/* 					<label class="col-sm-3 control-label" for="status_id">Статус</label>*/
/* 					<div class="col-sm-9">*/
/* 						<select class="form-control" id="status_id" name="status_id">*/
/* 							<option value="0" {% if (status_id == 0) %}selected="selected"{% endif %}>Не обработена</option>*/
/* 							<option value="1" {% if (status_id == 1) %}selected="selected"{% endif %}>Обработена</option>*/
/* 							<option value="2" {% if (status_id == 2) %}selected="selected"{% endif %}>Има товарителница</option>*/
/* 					*/
/* 						</select>*/
/* 					</div>*/
/* 				</div>*/
/* */
/* 				<div class="form-group" id="payment_code" >*/
/* 					<label class="col-sm-3 control-label" for="payment_code">Метод на плащане</label>*/
/* 					<div class="col-sm-9">*/
/* 						<select class="form-control" id="payment_code" name="payment_code">*/
/* 							<option value="cod" {% if (payment_code == 'cod') %}selected="selected"{% endif %}>Наложено плащане</option>*/
/* 							<option value="tk_econt_payment" {% if (payment_code == 'tk_econt_payment') %}selected="selected"{% endif %}>Гарантирано от Еконт</option>*/
/* 							<option value="bank" {% if (payment_code != 'cod' and payment_code != 'tk_econt_payment') %}selected="selected"{% endif %}>Без наложено плащане</option>*/
/* 					*/
/* 						</select>*/
/* 					</div>*/
/* 				</div>*/
/* 					*/
/* 				<input type="hidden" name="date_delivery" value="{{ date_delivery }}" />*/
/*  */
/* 				<div class="form-group">*/
/* 					<label class="col-sm-3 control-label">{{ text_receiver_shipping_to }}</label>*/
/* 					<div class="col-sm-9">*/
/* 					*/
/* 						<label class="radio-inline" style="display: inline; width: auto; float: none;">*/
/* 							<input type="radio" id="to_door" name="shipping_to" value="address" {% if shipping_to  ==  'address' %}checked="checked"{% endif %} onclick="$('#econt_addres').show();$('#econt_office').hide();$('#econt_machine').hide();" />*/
/* 							{{ text_to_door }}*/
/* 						</label>   */
/* 						           */
/* 						<label class="radio-inline" style="display: inline; width: auto; float: none;">*/
/* 							<input type="radio" id="to_office" name="shipping_to" value="office" {% if shipping_to  ==  'office' %}checked="checked"{% endif %} onclick="$('#econt_office').show();$('#econt_addres').hide();$('#econt_machine').hide();" />*/
/* 							{{ text_to_office }}*/
/* 						</label>*/
/* 						*/
/* 						<label class="radio-inline" style="display: inline; width: auto; float: none;">*/
/* 							<input type="radio" id="to_machine" name="shipping_to" value="machine" {% if shipping_to  ==  'machine' %}checked="checked"{% endif %} onclick="$('#econt_machine').show();$('#econt_addres').hide();$('#econt_office').hide();" />*/
/* 							Еконтомат*/
/* 						</label>*/
/* 						*/
/* 						*/
/* 			*/
/* 					</div>*/
/* 				</div>*/
/*           		*/
/* 				<div id="econt_addres"  {% if (shipping_to == 'address') %}style="display: block;"{% else %}style="display: none;"{% endif %}>*/
/* 				*/
/* 					<div class="form-group" id="econt_post_code">*/
/* 						<label class="col-sm-3 control-label" for="postcode">{{ text_receiver_postcode }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input class="form-control" type="text" id="postcode" name="postcode" value="{{ postcode }}" size="3" readonly="readonly" />*/
/* 						</div>*/
/* 					</div>*/
/*           */
/* 					<div class="form-group" id="econt_city">*/
/* 						<label class="col-sm-3 control-label" for="city">{{ text_receiver_city }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input class="form-control" type="text" id="city" name="city" value="{{ city_name }}" />*/
/* 							<input class="form-control" type="hidden" id="city_id" name="city_id" value="{{ city_id }}" />*/
/* 						</div>*/
/* 					</div>*/
/*           */
/* 					<div class="form-group" id="econt_quarter">*/
/* 						<label class="col-sm-3 control-label" for="quarter">{{ text_receiver_quarter }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input class="form-control" type="text" id="quarter" name="quarter" value="{{ quarter }}" />*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group" id="econt_street">*/
/* 						<label class="col-sm-3 control-label" for="street">{{ text_receiver_street }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input class="form-control" type="text" id="street" name="street" value="{{ street }}" />*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group" id="econt_street_num">*/
/* 						<label class="col-sm-3 control-label" for="street_num">{{ text_receiver_street_num }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input class="form-control" type="text" id="street_num" name="street_num" value="{{ street_num }}" />*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group" id="econt_other">*/
/* 						<label class="col-sm-3 control-label" for="other">{{ text_receiver_other }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input class="form-control" type="text" id="other" name="other" value="{{ other }}" />*/
/* 							{% if error_receiver_address %}*/
/* 							<br />&nbsp;&nbsp;&nbsp;<span class="text-danger">{{ error_receiver_address }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 			*/
/* 				<div id="econt_office"  {% if (shipping_to == 'office') %}style="display: block;"{% else %}style="display: none;"{% endif %}>*/
/* 					<div class="form-group" id="econt_office_city_id" >*/
/* 						<label class="col-sm-3 control-label" for="office_city_id">{{ text_receiver_city }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<select class="form-control" id="office_city_id" name="office_city_id" onchange="getOfficesByCityId(0);">*/
/* 								<option value="0">{{ text_select }}</option>*/
/* 								{% for city in office_cities %} */
/* 								{% if (office_city_id is defined and city['city_id'] == office_city_id) %} */
/* 								<option value="{{ city['city_id'] }}" selected="selected">{{ city['name'] }}</option>*/
/* 								{% else %} */
/* 								<option value="{{ city['city_id'] }}">{{ city['name'] }}</option>*/
/* 								{% endif %} */
/* 								{% endfor %} */
/* 							</select>*/
/* 						</div>*/
/* 					</div>*/
/* 	*/
/* 					<div class="form-group" id="econt_office_id">*/
/* 						<label class="col-sm-3 control-label" for="office_id">{{ text_receiver_office }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<select class="form-control" id="office_id" name="office_id" onchange="getOffice(0);">*/
/* 								<option value="0">{{ text_select }}</option>*/
/* 								{% for office in offices %} */
/* 								{% if (office['office_id'] == office_id) %} */
/* 								<option value="{{ office['office_id'] }}" selected="selected">{{ office['office_code'] ~ ', ' ~ office['name'] ~ ', ' ~ office['address'] }}</option>*/
/* 								{% else %} */
/* 								<option value="{{ office['office_id'] }}">{{ office['office_code'] ~ ', ' ~ office['name'] ~ ', ' ~ office['address'] }}</option>*/
/* 								{% endif %} */
/* 								{% endfor %} */
/* 							</select>*/
/* 							{% if error_receiver_office %}*/
/* 							<br />&nbsp;&nbsp;&nbsp;<span class="text-danger">{{ error_receiver_office }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 					</div>*/
/* */
/* 					<div class="form-group" id="econt_office_code">*/
/* 						<label class="col-sm-3 control-label" for="office_code">{{ text_receiver_office_code }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input class="form-control" type="text" id="office_code" name="office_code" value="{{ office_code }}" size="3" readonly="readonly" />*/
/* 						</div>*/
/* 					</div>*/
/* */
/* 				</div>*/
/*           		*/
/* 				<div id="econt_machine"  {% if (shipping_to == 'machine') %}style="display: block;"{% else %}style="display: none;"{% endif %}>*/
/* 					<div class="form-group" id="econt_machine_city_id" >*/
/* 						<label class="col-sm-3 control-label" for="machine_city_id">{{ text_receiver_city }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<select class="form-control" id="machine_city_id" name="machine_city_id" onchange="getMachinesByCityId(0);">*/
/* 								<option value="0">{{ text_select }}</option>*/
/* 								{% for city in machine_cities %} */
/* 								{% if (machine_city_id is defined and city['city_id'] == machine_city_id) %} */
/* 								<option value="{{ city['city_id'] }}" selected="selected">{{ city['name'] }}</option>*/
/* 								{% else %} */
/* 								<option value="{{ city['city_id'] }}">{{ city['name'] }}</option>*/
/* 								{% endif %} */
/* 								{% endfor %} */
/* 							</select>*/
/* 						</div>*/
/* 					</div>*/
/* 	*/
/* 					<div class="form-group" id="econt_machine_id">*/
/* 						<label class="col-sm-3 control-label" for="machine_id">Еконтомат</label>*/
/* 						<div class="col-sm-9">*/
/* 							*/
/* 							<select class="form-control" id="machine_id" name="machine_id" onchange="getMachine(0);">*/
/* 								<option value="0">{{ text_select }}</option>*/
/* 								{% for machine in machines %} */
/* 								{% if (machine['office_id'] == machine_id) %} */
/* 								<option value="{{ machine['office_id'] }}" selected="selected">{{ machine['office_code'] ~ ', ' ~ machine['name'] ~ ', ' ~ machine['address'] }}</option>*/
/* 								{% else %} */
/* 								<option value="{{ machine['office_id'] }}">{{ machine['office_code'] ~ ', ' ~ machine['name'] ~ ', ' ~ machine['address'] }}</option>*/
/* 								{% endif %} */
/* 								{% endfor %} */
/* 							</select>*/
/* 	*/
/* 							{% if error_receiver_machine %}*/
/* 							<br />&nbsp;&nbsp;&nbsp;<span class="text-danger">{{ error_receiver_machine }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 					</div>*/
/* */
/* */
/* 					<div class="form-group" id="econt_machine_code" >*/
/* 						<label class="col-sm-3 control-label" for="machine_code">Код на Еконтомат</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input class="form-control" type="text" id="machine_code" name="machine_code" value="{{ machine_code }}" size="3" readonly="readonly" />*/
/* 						</div>*/
/* 					</div>*/
/* */
/* 				</div>*/
/* 			*/
/* 			*/
/* 				<div class="row">*/
/* 					<div class="col-sm-6 text-left">*/
/*                   */
/* 					</div>*/
/* 					<div class="col-sm-6 text-right">*/
/*               */
/* 						<button type="button" id="button-save" class="btn btn-primary"><i class="fa fa-check-circle"></i> {{ button_save }}</button>*/
/* 					</div>*/
/* 				</div>*/
/*               */
/* 			</form>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* */
/* */
/* */
/* */
/* */
/* <link href="view/javascript/jquery/magnific/magnific-popup.css" rel="stylesheet">*/
/* <script src="view/javascript/jquery/magnific/jquery.magnific-popup.min.js"></script>*/
/* <script type="text/javascript">*/
/* */
/* function getMachinesByCityId() {*/
/* 	$('#machine_id').html('<option value="0">{{ text_wait }}</option>');*/
/* 	$('#machine_code').val('');*/
/* 	machine_city_id = $('#machine_city_id').val();*/
/* */
/* 	$.ajax({*/
/* 			url: 'index.php?route=sale/tk_econt/getOfficesByCityId&is_machine=1&user_token={{ user_token }}',*/
/* 			type: 'POST',*/
/* 			data: 'city_id=' + encodeURIComponent(machine_city_id),*/
/* 			dataType: 'json',*/
/* 			success: function(data) {*/
/* 				if (data) {*/
/* 					html = '<option value="0">{{ text_select }}</option>';*/
/* */
/* 					for (i = 0; i < data.length; i++) {*/
/* 						html += '<option value="' + data[i]['office_id'] + '">' + data[i]['office_code'] + ' ' + data[i]['name'] + ' - ' + data[i]['address'] +  '</option>';*/
/* 					}*/
/* */
/* 					$('#machine_id').html(html);*/
/* 					*/
/* 				}*/
/* 			}*/
/* 		});*/
/* }*/
/* */
/* function getMachine() {*/
/* */
/* 	$('#machine_code').val('');*/
/* 	machine_id = $('#machine_id').val();*/
/* */
/* */
/* 	$.ajax({*/
/* 			url: 'index.php?route=sale/tk_econt/getOffice&user_token={{ user_token }}',*/
/* 			type: 'POST',*/
/* 			data: 'office_id=' + encodeURIComponent(machine_id),*/
/* 			dataType: 'json',*/
/* 			success: function(data) {*/
/* 				if (data && data.office_code) {*/
/* 					$('#machine_code').val(data.office_code);*/
/* 					$('#machine_name').val(data.name);*/
/* 					$('#machine_address').val(data.address);*/
/* 					$('#machine_city').val(data.office_city);*/
/* */
/* 				}*/
/* 			}*/
/* 		});*/
/* }*/
/* 	*/
/* function getMachineByOfficeCode(office_code) {*/
/* 	if (parseInt(office_code)) {*/
/* 		$.ajax({*/
/* 				url: 'index.php?route=sale/tk_econt/getOfficeByOfficeCode&user_token={{ user_token }}',*/
/* 				type: 'POST',*/
/* 				data: 'office_code=' + parseInt(office_code),*/
/* 				dataType: 'json',*/
/* 				success: function(data) {*/
/* 					if (!data.error) {*/
/* 						$('#office_city_id').val(data.city_id);*/
/* 						html = '<option value="0">{{ text_select }}</option>';*/
/* */
/* 						for (i = 0; i < data.offices.length; i++) {*/
/* 							html += '<option ';*/
/* 							if (data.offices[i]['office_id'] == data.office_id) {*/
/* 								html += 'selected="selected"';*/
/* 							}*/
/* 							html += 'value="' + data.offices[i]['office_id'] + '">' + data.offices[i]['office_code'] + ', ' + data.offices[i]['name'] + ', ' + data.offices[i]['address'] +  '</option>';*/
/* 						}*/
/* */
/* 						$('#machine_id').html(html);*/
/* 						$('#machine_code').val(office_code);*/
/* 						$('#machine_name').val(data.name);*/
/* 						$('#machine_address').val(data.address);*/
/* 						$('#machine_city').val(data.office_city);*/
/* 					*/
/* 					}*/
/* 				}*/
/* 			});*/
/* 	}*/
/* }*/
/* */
/* function getOfficesByCityId() {*/
/* 	$('#office_id').html('<option value="0">{{ text_wait }}</option>');*/
/* 	$('#office_code').val('');*/
/* 	office_city_id = $('#office_city_id').val();*/
/* */
/* 	$.ajax({*/
/* */
/* 			url: 'index.php?route=sale/tk_econt/getOfficesByCityId&is_machine=0&user_token={{ user_token }}',*/
/* 			type: 'POST',*/
/* 			data: 'city_id=' + encodeURIComponent(office_city_id),*/
/* 			dataType: 'json',*/
/* 			success: function(data) {*/
/* 				if (data) {*/
/* 					html = '<option value="0">{{ text_select }}</option>';*/
/* */
/* 					for (i = 0; i < data.length; i++) {*/
/* 						html += '<option value="' + data[i]['office_id'] + '">' + data[i]['office_code'] + ' ' + data[i]['name'] + ' - ' + data[i]['address'] +  '</option>';*/
/* 					}*/
/* */
/* 					$('#office_id').html(html);*/
/* 					*/
/* 				}*/
/* 			}*/
/* 		});*/
/* }*/
/* */
/* function getOffice() {*/
/* */
/* 	$('#office_code').val('');*/
/* 	office_id = $('#office_id').val();*/
/* */
/* */
/* 	$.ajax({*/
/* 			url: 'index.php?route=sale/tk_econt/getOffice&user_token={{ user_token }}',*/
/* 			type: 'POST',*/
/* 			data: 'office_id=' + encodeURIComponent(office_id),*/
/* 			dataType: 'json',*/
/* 			success: function(data) {*/
/* 				if (data && data.office_code) {*/
/* 					$('#office_code').val(data.office_code);*/
/* 					$('#office_name').val(data.name);*/
/* 					$('#office_address').val(data.address);*/
/* 					$('#office_city').val(data.office_city);*/
/* */
/* 				}*/
/* 			}*/
/* 		});*/
/* }*/
/* 	*/
/* function getOfficeByOfficeCode(office_code) {*/
/* 	if (parseInt(office_code)) {*/
/* 		$.ajax({*/
/* 				url: 'index.php?route=sale/tk_econt/getOfficeByOfficeCode&user_token={{ user_token }}',*/
/* 				type: 'POST',*/
/* 				data: 'office_code=' + parseInt(office_code),*/
/* 				dataType: 'json',*/
/* 				success: function(data) {*/
/* 					if (!data.error) {*/
/* 						$('#office_city_id').val(data.city_id);*/
/* 						html = '<option value="0">{{ text_select }}</option>';*/
/* */
/* 						for (i = 0; i < data.offices.length; i++) {*/
/* 							html += '<option ';*/
/* 							if (data.offices[i]['office_id'] == data.office_id) {*/
/* 								html += 'selected="selected"';*/
/* 							}*/
/* 							html += 'value="' + data.offices[i]['office_id'] + '">' + data.offices[i]['office_code'] + ', ' + data.offices[i]['name'] + ', ' + data.offices[i]['address'] +  '</option>';*/
/* 						}*/
/* */
/* 						$('#office_id').html(html);*/
/* 						$('#office_code').val(office_code);*/
/* 						$('#office_name').val(data.name);*/
/* 						$('#office_address').val(data.address);*/
/* 						$('#office_city').val(data.office_city);*/
/* 					*/
/* 					}*/
/* 				}*/
/* 			});*/
/* 	}*/
/* }*/
/* */
/* var sender_post_code = '{{ postcode }}';*/
/* var econt_city = '{{ city_name }}';*/
/* var econt_city_id = '{{ city_id }}';*/
/* var econt_quarter = '{{ quarter }}';*/
/* var econt_street = '{{ street }}';*/
/* 		*/
/* */
/* $('#city').autocomplete({*/
/* 		'source': function(request, response) {*/
/* 			$.ajax({*/
/* 					url: 'index.php?route=sale/tk_econt/getCityByName&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),*/
/* 					dataType: 'json',*/
/* 					success: function(json) {*/
/* 						response($.map(json, function(item) {*/
/* 									return {*/
/* 										label:     item['post_code'] + ' ' + item['name'],*/
/* 										value:     item['post_code'] + ' ' + item['name'],*/
/* 										name:      item['name'],*/
/* 										city_id:   item['city_id'],*/
/* 										post_code: item['post_code']*/
/* 									}*/
/* 								}));*/
/* 					}*/
/* 				});*/
/* 		},*/
/* 		'select': function(item) {*/
/* 			if (item) {*/
/* 				econt_city = item.name;*/
/* 				$('#city').val(item.name);*/
/* 				$('#city_id').val(item.city_id);*/
/* 				$('#postcode').val(item.post_code);*/
/* 				$('#quarter').val('');*/
/* 				$('#street').val('');*/
/* 				$('#street_num').val('');*/
/* 				$('#other').val('');*/
/* */
/* 				if (item.post_code == sender_post_code) {*/
/* 					$('#express_city_courier').show();*/
/* 				} else {*/
/* 					$('#express_city_courier').hide();*/
/* 				}*/
/* 			}*/
/* 		},*/
/* 		'change': function(item) {*/
/* 			if(!item) {*/
/* 				$('#city').val('');*/
/* 				$('#city_id').val('');*/
/* 				$('#postcode').val('');*/
/* 			}*/
/* */
/* 			$('#quarter').val('');*/
/* 			$('#street').val('');*/
/* 			$('#street_num').val('');*/
/* 			$('#other').val('');*/
/* */
/* 			$('#express_city_courier').hide();*/
/* 		}*/
/* 	});*/
/* */
/* $('#city').blur(function() {*/
/* 		if ($(this).val() != econt_city) {*/
/* 			$(this).val('');*/
/* 			$('#city_id').val('');*/
/* 			$('#postcode').val('');*/
/* 			$('#quarter').val('');*/
/* 			$('#street').val('');*/
/* 			$('#street_num').val('');*/
/* 			$('#other').val('');*/
/* */
/* 			$('#express_city_courier').hide();*/
/* 		}*/
/* 	});*/
/* */
/* $('#quarter').autocomplete({*/
/* 		'source': function(request, response) {*/
/* 			$.ajax({*/
/* 					url: 'index.php?route=sale/tk_econt/getQuartersByName&user_token={{ user_token }}&filter_name=' +  encodeURIComponent(request) + '&city_id=' +  encodeURIComponent($('#city_id').val()),*/
/* 					dataType: 'json',*/
/* 					success: function(json) {*/
/* 						response($.map(json, function(item) {*/
/* 									return {*/
/* 										label: item['name'],*/
/* 										value: item['name']*/
/* 									}*/
/* 								}));*/
/* 					}*/
/* 				});*/
/* 		},*/
/* 		'select': function(item) {*/
/* 			if (item) {*/
/* 				econt_quarter = item.label;*/
/* 				$('#quarter').val(item['label']);*/
/* 			}*/
/* 		},*/
/* 		'change': function(item) {*/
/* 			if(!item) {*/
/* 				$('#quarter').val('');*/
/* 			}*/
/* 		}*/
/* 	});*/
/* */
/* $('#quarter').blur(function() {*/
/* 		if ($(this).val() != econt_quarter) {*/
/* 			$('#quarter').val('');*/
/* 		}*/
/* 	});*/
/* */
/* $('#street').autocomplete({*/
/* 		'source': function(request, response) {*/
/* 			$.ajax({*/
/* 					url: 'index.php?route=sale/tk_econt/getStreetsByName&user_token={{ user_token }}&filter_name=' +  encodeURIComponent(request) + '&city_id=' +  encodeURIComponent($('#city_id').val()),*/
/* 					dataType: 'json',*/
/* 					success: function(json) {*/
/* 						response($.map(json, function(item) {*/
/* 									return {*/
/* 										label: item['name'],*/
/* 										value: item['name']*/
/* 									}*/
/* 								}));*/
/* 					}*/
/* 				});*/
/* 		},*/
/* 		'select': function(item) {*/
/* 			if (item) {*/
/* 				econt_street = item.label;*/
/* 				$('#street').val(item['label']);*/
/* 			}*/
/* 		},*/
/* 		'change': function(item) {*/
/* 			if(!item) {*/
/* 				$('#street').val('');*/
/* 			}*/
/* 		}*/
/* 	});*/
/* */
/* $('#street').blur(function() {*/
/* 		if ($(this).val() != econt_street) {*/
/* 			$('#street').val('');*/
/* 		}*/
/* 	});*/
/* */
/* $(document).delegate('#button-save', 'click', function()  {  */
/* */
/* 		var data = $('.econt_form input[type=\'text\'], .econt_form input[type=\'date\'], .econt_form input[type=\'datetime-local\'], .econt_form input[type=\'time\'], .econt_form input[type=\'password\'], .econt_form input[type=\'hidden\'], .econt_form input[type=\'checkbox\']:checked, .econt_form input[type=\'radio\']:checked, .econt_form textarea, .econt_form select').serialize();*/
/* */
/* 		$.ajax(  {  */
/* 				url: 'index.php?route=sale/tk_econt/validate_post&user_token={{ user_token }}',*/
/* 				type: 'post',*/
/* 				data: data,*/
/* 				dataType: 'json',*/
/* 				beforeSend: function()  {  */
/* 					$('#button-save').button('loading');*/
/* 					*/
/* 				}, */
/* 				complete: function()  {  */
/* 					$('#button-save').button('reset');*/
/* 				}, */
/* 					 */
/* 				success: function(json) {*/
/* 					$('.alert, .text-danger').remove();*/
/* */
/* 					if (json['error']) {*/
/* 						$('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + ' <button type="button" class="close" data-d==m==s="alert">&times;</button></div>');*/
/* 					}*/
/* */
/* 					if (json['success']) {*/
/* 						$('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '  <button type="button" class="close" data-d==m==s="alert">&times;</button></div>');*/
/* */
/* 					}*/
/* */
/* 					if (json['order_id']) {*/
/* 						$('input[name=\'order_id\']').val(json['order_id']);*/
/* 					}*/
/* 				},*/
/* 				error: function(xhr, ajaxOptions, thrownError) {*/
/* 					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 				}*/
/* 	 */
/* 			}); */
/* 	});*/
/* </script>*/
/* </div>*/
/* {{ footer}}*/
