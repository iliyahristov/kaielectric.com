<?php

/* extension/shipping/tk_speedy.twig */
class __TwigTemplate_1fa958e95a4e8877db94aa13fa722dba3fd93bd168ae1ea1367039b829e7c8d6 extends Twig_Template
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
";
        // line 2
        $context["weight_value_row"] = 0;
        // line 3
        echo "<div id=\"content\">
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"pull-right\">
\t\t\t\t";
        // line 7
        if (((isset($context["shipping_tk_speedy_logged"]) ? $context["shipping_tk_speedy_logged"] : null) && (isset($context["cities"]) ? $context["cities"] : null))) {
            echo " 
\t\t\t\t<button type=\"submit\" form=\"form-speedy\" data-toggle=\"tooltip\" title=\"";
            // line 8
            echo (isset($context["button_save"]) ? $context["button_save"] : null);
            echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
\t\t\t\t";
        }
        // line 9
        echo " 
\t\t\t\t<a href=\"";
        // line 10
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a>
\t\t\t</div>
\t\t\t<h1>";
        // line 12
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
\t\t\t<ul class=\"breadcrumb\">
\t\t\t\t";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            echo " 
\t\t\t\t<li><a href=\"";
            // line 15
            echo $this->getAttribute($context["breadcrumb"], "href", array(), "array");
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array(), "array");
            echo "</a></li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo " 
\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
 
\t\t";
        // line 22
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            echo " 
\t\t<div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            // line 23
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo " 
\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
\t\t</div>
\t\t";
        }
        // line 26
        echo " 
 
\t\t";
        // line 28
        if ((isset($context["success"]) ? $context["success"] : null)) {
            echo " 
\t\t<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            // line 29
            echo (isset($context["success"]) ? $context["success"] : null);
            echo " 
\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
\t\t</div>
\t\t";
        }
        // line 32
        echo " 
\t\t
\t\t<form action=\"";
        // line 34
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-speedy\" class=\"form-horizontal\">
 \t\t\t
 \t\t\t";
        // line 36
        if ((isset($context["module_tk_checkout_token"]) ? $context["module_tk_checkout_token"] : null)) {
            // line 37
            echo "\t\t\t\t
\t\t\t";
            // line 38
            if ((isset($context["shipping_tk_speedy_logged"]) ? $context["shipping_tk_speedy_logged"] : null)) {
                // line 39
                echo "\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">";
                // line 42
                echo (isset($context["text_get_data_info"]) ? $context["text_get_data_info"] : null);
                echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<a id=\"get_data\" onclick=\"if (!\$(this).attr('disabled')) { refreshData(); } \" class=\"btn btn-primary\"><span id=\"get_data_text\">";
                // line 44
                echo (isset($context["button_get_data"]) ? $context["button_get_data"] : null);
                echo "</span></a>
\t\t\t\t\t\t\t<span id=\"data_error\">";
                // line 45
                if ((isset($context["error_get_data"]) ? $context["error_get_data"] : null)) {
                    echo (isset($context["error_get_data"]) ? $context["error_get_data"] : null);
                }
                echo "</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_name\">";
                // line 49
                echo (isset($context["entry_username"]) ? $context["entry_username"] : null);
                echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" id=\"shipping_tk_speedy_name\" value=\"";
                // line 51
                echo (isset($context["shipping_tk_speedy_username"]) ? $context["shipping_tk_speedy_username"] : null);
                echo "\" readonly class=\"form-control\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\"></label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<a onclick=\"speedyButtonLogout();\" class=\"btn btn-primary\"><span>";
                // line 57
                echo (isset($context["entry_button_logout"]) ? $context["entry_button_logout"] : null);
                echo "</span></a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<hr>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<div class=\"col-sm-3 text-right\"><p><b>Крон за ъпдейт на офиси:</b></p></div>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<p>/opt/cpanel/ea-php74/root/usr/bin/php ";
                // line 65
                echo (isset($context["root"]) ? $context["root"] : null);
                echo "catalog/controller/tk_checkout/cron_speedy.php ";
                echo (isset($context["web_url"]) ? $context["web_url"] : null);
                echo " > /dev/null 2>&1</p>
\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<div class=\"col-sm-3 text-right\"><p><b>Крон за ъпдейт на пратки:</b></p></div>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<p>/opt/cpanel/ea-php74/root/usr/bin/php ";
                // line 72
                echo (isset($context["root"]) ? $context["root"] : null);
                echo "catalog/controller/tk_checkout/cron_speedy_shipping.php ";
                echo (isset($context["web_url"]) ? $context["web_url"] : null);
                echo " > /dev/null 2>&1</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
            }
            // line 77
            echo " 
\t\t\t\t\t
\t\t\t";
            // line 79
            if ( !(isset($context["shipping_tk_speedy_logged"]) ? $context["shipping_tk_speedy_logged"] : null)) {
                // line 80
                echo "\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_username\">";
                // line 83
                echo (isset($context["entry_username"]) ? $context["entry_username"] : null);
                echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" id=\"shipping_tk_speedy_username\" name=\"shipping_tk_speedy_username\" value=\"";
                // line 85
                echo (isset($context["shipping_tk_speedy_username"]) ? $context["shipping_tk_speedy_username"] : null);
                echo "\" placeholder=\"";
                echo (isset($context["shipping_tk_speedy_username"]) ? $context["shipping_tk_speedy_username"] : null);
                echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t";
                // line 86
                if ((isset($context["error_username"]) ? $context["error_username"] : null)) {
                    echo " 
\t\t\t\t\t\t\t<span class=\"text-danger\">";
                    // line 87
                    echo (isset($context["error_username"]) ? $context["error_username"] : null);
                    echo "</span>
\t\t\t\t\t\t\t";
                }
                // line 88
                echo " 
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_password\">";
                // line 92
                echo (isset($context["entry_password"]) ? $context["entry_password"] : null);
                echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"shipping_tk_speedy_password\" name=\"shipping_tk_speedy_password\" value=\"";
                // line 94
                echo (isset($context["shipping_tk_speedy_password"]) ? $context["shipping_tk_speedy_password"] : null);
                echo "\" placeholder=\"";
                echo (isset($context["shipping_tk_speedy_password"]) ? $context["shipping_tk_speedy_password"] : null);
                echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t";
                // line 95
                if ((isset($context["error_password"]) ? $context["error_password"] : null)) {
                    echo " 
\t\t\t\t\t\t\t<span class=\"text-danger\">";
                    // line 96
                    echo (isset($context["error_password"]) ? $context["error_password"] : null);
                    echo "</span>
\t\t\t\t\t\t\t";
                }
                // line 97
                echo " 
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\"></label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<a id=\"login_button\" onclick=\"speedyButtonLogin();\" class=\"btn btn-primary\"><span id=\"login_text\">";
                // line 103
                echo (isset($context["button_login"]) ? $context["button_login"] : null);
                echo "</span></a>
\t\t\t\t\t\t\t<span id=\"login_error\"></span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
 
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
            } else {
                // line 110
                echo " 
\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-body\" id=\"additional_table\">

\t\t\t\t\t";
                // line 114
                if ((isset($context["cities"]) ? $context["cities"] : null)) {
                    echo " 
\t\t\t\t\t
\t\t\t\t\t<ul class=\"nav nav-tabs\">
\t\t\t\t\t\t<li class=\"active\"><a href=\"#tab-general\" data-toggle=\"tab\">";
                    // line 117
                    echo (isset($context["entry_general_settings"]) ? $context["entry_general_settings"] : null);
                    echo "</a></li>
\t\t\t\t\t\t<li><a href=\"#tab-speedy_settings\" data-toggle=\"tab\">";
                    // line 118
                    echo (isset($context["text_tab_speedy_settings"]) ? $context["text_tab_speedy_settings"] : null);
                    echo "</a></li>
\t\t\t\t\t\t<li><a href=\"#tab-price\" data-toggle=\"tab\">";
                    // line 119
                    echo (isset($context["text_tab_price"]) ? $context["text_tab_price"] : null);
                    echo "</a></li>
\t\t\t\t\t\t<li><a href=\"#tab-price_weight\" data-toggle=\"tab\">Ценообрзвуане спрямо килограми</a></li>
\t\t\t\t\t\t<li><a href=\"#tab-status\" data-toggle=\"tab\">";
                    // line 121
                    echo (isset($context["text_tab_status"]) ? $context["text_tab_status"] : null);
                    echo "</a></li>
\t\t\t\t\t\t<li><a href=\"#tab-lang\" data-toggle=\"tab\">Текстове</a></li>
\t\t\t\t\t</ul>
\t\t\t          
\t\t\t\t\t<div class=\"tab-content\">
\t\t\t          
\t\t\t\t\t\t<div class=\"tab-pane active\" id=\"tab-general\">
 
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_status\">";
                    // line 130
                    echo (isset($context["entry_status"]) ? $context["entry_status"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_speedy_status\" name=\"shipping_tk_speedy_status\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 133
                    if ((isset($context["shipping_tk_speedy_status"]) ? $context["shipping_tk_speedy_status"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 134
                        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 135
                        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 136
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 137
                        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 138
                        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 139
                    echo " 
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

 
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_geo_zone_id\">";
                    // line 146
                    echo (isset($context["entry_geo_zone"]) ? $context["entry_geo_zone"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_speedy_geo_zone_id\" name=\"shipping_tk_speedy_geo_zone_id\">
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                    // line 149
                    echo (isset($context["text_all_zones"]) ? $context["text_all_zones"] : null);
                    echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    // line 150
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["geo_zones"]) ? $context["geo_zones"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["geo_zone"]) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t";
                        // line 151
                        if (($this->getAttribute($context["geo_zone"], "geo_zone_id", array(), "array") == (isset($context["shipping_tk_speedy_geo_zone_id"]) ? $context["shipping_tk_speedy_geo_zone_id"] : null))) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 152
                            echo $this->getAttribute($context["geo_zone"], "geo_zone_id", array(), "array");
                            echo "\" selected=\"selected\">";
                            echo $this->getAttribute($context["geo_zone"], "name", array(), "array");
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 153
                            echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 154
                            echo $this->getAttribute($context["geo_zone"], "geo_zone_id", array(), "array");
                            echo "\">";
                            echo $this->getAttribute($context["geo_zone"], "name", array(), "array");
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 155
                        echo " 
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['geo_zone'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 156
                    echo " 
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-tax-class\">Данъчен клас</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_tax_class_id\" id=\"input-tax-class\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                    // line 165
                    echo (isset($context["text_none"]) ? $context["text_none"] : null);
                    echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    // line 166
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["tax_classes"]) ? $context["tax_classes"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["tax_class"]) {
                        // line 167
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["tax_class"], "tax_class_id", array()) == (isset($context["shipping_tk_speedy_tax_class_id"]) ? $context["shipping_tk_speedy_tax_class_id"] : null))) {
                            // line 168
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["tax_class"], "tax_class_id", array());
                            echo "\" selected=\"selected\">";
                            echo $this->getAttribute($context["tax_class"], "title", array());
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 170
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["tax_class"], "tax_class_id", array());
                            echo "\">";
                            echo $this->getAttribute($context["tax_class"], "title", array());
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 172
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tax_class'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 173
                    echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
 
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_sort_order\">";
                    // line 178
                    echo (isset($context["entry_sort_order"]) ? $context["entry_sort_order"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_tk_speedy_sort_order\" name=\"shipping_tk_speedy_sort_order\" value=\"";
                    // line 180
                    echo (isset($context["shipping_tk_speedy_sort_order"]) ? $context["shipping_tk_speedy_sort_order"] : null);
                    echo "\" size=\"1\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab-speedy_settings\">
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">";
                    // line 188
                    echo (isset($context["entry_allowed_methods"]) ? $context["entry_allowed_methods"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"well well-sm\" style=\"height: 150px; overflow: auto;\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 191
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : null));
                    foreach ($context['_seq'] as $context["service_id"] => $context["service"]) {
                        // line 192
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 194
                        if (twig_in_filter($context["service_id"], (isset($context["shipping_tk_speedy_allowed_methods"]) ? $context["shipping_tk_speedy_allowed_methods"] : null))) {
                            // line 195
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"shipping_tk_speedy_allowed_methods[]\" value=\"";
                            echo $context["service_id"];
                            echo "\" checked=\"checked\" />
\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 196
                            echo $context["service"];
                            echo " <i>(";
                            echo (isset($context["text_sevice_id"]) ? $context["text_sevice_id"] : null);
                            echo " ";
                            echo $context["service_id"];
                            echo ")</i>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 198
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"shipping_tk_speedy_allowed_methods[]\" value=\"";
                            echo $context["service_id"];
                            echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 199
                            echo $context["service"];
                            echo " <i>(";
                            echo (isset($context["text_sevice_id"]) ? $context["text_sevice_id"] : null);
                            echo " ";
                            echo $context["service_id"];
                            echo ")</i>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 201
                        echo "\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['service_id'], $context['service'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 204
                    echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<a onclick=\"\$(this).parent().find(':checkbox').prop('checked', true);\" style=\"cursor: pointer;\">";
                    // line 205
                    echo (isset($context["text_select_all"]) ? $context["text_select_all"] : null);
                    echo "</a> / <a onclick=\"\$(this).parent().find(':checkbox').prop('checked', false);\" style=\"cursor: pointer;\">";
                    echo (isset($context["text_unselect_all"]) ? $context["text_unselect_all"] : null);
                    echo "</a>
\t\t\t\t\t\t\t\t\t";
                    // line 206
                    if ((isset($context["error_allowed_methods"]) ? $context["error_allowed_methods"] : null)) {
                        // line 207
                        echo "\t\t\t\t\t\t\t\t\t<div class=\"text-danger\">";
                        echo (isset($context["error_allowed_methods"]) ? $context["error_allowed_methods"] : null);
                        echo "</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 209
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t
\t\t\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_client_id\">";
                    // line 213
                    echo (isset($context["entry_client_id"]) ? $context["entry_client_id"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_client_id\" id=\"speedy_client_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 216
                    if (((twig_length_filter($this->env, (isset($context["clients"]) ? $context["clients"] : null)) > 1) || (twig_length_filter($this->env, (isset($context["clients"]) ? $context["clients"] : null)) == 0))) {
                        // line 217
                        echo "\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        echo (isset($context["text_none"]) ? $context["text_none"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 219
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["clients"]) ? $context["clients"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
                        // line 220
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["client"], "clientId", array()) == (isset($context["shipping_tk_speedy_client_id"]) ? $context["shipping_tk_speedy_client_id"] : null))) {
                            // line 221
                            echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["client"], "clientId", array());
                            echo "\" selected=\"selected\">";
                            echo sprintf((isset($context["text_client_id"]) ? $context["text_client_id"] : null), $this->getAttribute($context["client"], "clientId", array()), $this->getAttribute($context["client"], "name", array()), $this->getAttribute($context["client"], "address", array()));
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 223
                            echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["client"], "clientId", array());
                            echo "\">";
                            echo sprintf((isset($context["text_client_id"]) ? $context["text_client_id"] : null), $this->getAttribute($context["client"], "clientId", array()), $this->getAttribute($context["client"], "name", array()), $this->getAttribute($context["client"], "address", array()));
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 225
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['client'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 226
                    echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t";
                    // line 227
                    if ((isset($context["error_client_id"]) ? $context["error_client_id"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t<div class=\"text-danger\">";
                        // line 228
                        echo (isset($context["error_client_id"]) ? $context["error_client_id"] : null);
                        echo "</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 229
                    echo " 
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_special_delivery_requirement_id\">Номер на допълнително споразумение при обслужване:</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_special_delivery_requirement_id\" value=\"";
                    // line 236
                    echo (isset($context["shipping_tk_speedy_special_delivery_requirement_id"]) ? $context["shipping_tk_speedy_special_delivery_requirement_id"] : null);
                    echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_administrative_fee\">Допълнителна административна такса:</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_administrative_fee\" id=\"shipping_tk_speedy_administrative_fee\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 244
                    if ((isset($context["shipping_tk_speedy_administrative_fee"]) ? $context["shipping_tk_speedy_administrative_fee"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 245
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 246
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 247
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 248
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 249
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 250
                    echo " 
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_discount_contract_id\">Карта за отстъпка - договор:</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_discount_contract_id\" value=\"";
                    // line 258
                    echo (isset($context["shipping_tk_speedy_discount_contract_id"]) ? $context["shipping_tk_speedy_discount_contract_id"] : null);
                    echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_discount_card_id\">Карта за отстъпка - карта:</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_discount_card_id\" value=\"";
                    // line 265
                    echo (isset($context["shipping_tk_speedy_discount_card_id"]) ? $context["shipping_tk_speedy_discount_card_id"] : null);
                    echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                    // line 269
                    if ((isset($context["custom_fields"]) ? $context["custom_fields"] : null)) {
                        // line 270
                        echo "\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_company\">Поле за име на фирма</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_company\" id=\"shipping_tk_speedy_company\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"9999\">";
                        // line 274
                        echo (isset($context["text_no_company"]) ? $context["text_no_company"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 275
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["custom_fields"]) ? $context["custom_fields"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
                            // line 276
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($context["custom_field"], "custom_field_id", array()) == (isset($context["shipping_tk_speedy_company"]) ? $context["shipping_tk_speedy_company"] : null))) {
                                // line 277
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                echo $this->getAttribute($context["custom_field"], "custom_field_id", array());
                                echo "\" selected=\"selected\">";
                                echo $this->getAttribute($context["custom_field"], "name", array());
                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 279
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                echo $this->getAttribute($context["custom_field"], "custom_field_id", array());
                                echo "\">";
                                echo $this->getAttribute($context["custom_field"], "name", array());
                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 281
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 282
                        echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                    }
                    // line 286
                    echo "\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_name\">";
                    // line 288
                    echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_name\" value=\"";
                    // line 290
                    echo (isset($context["shipping_tk_speedy_name"]) ? $context["shipping_tk_speedy_name"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
                    echo "\" id=\"shipping_tk_speedy_name\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t";
                    // line 291
                    if ((isset($context["error_name"]) ? $context["error_name"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t<div class=\"text-danger\">";
                        // line 292
                        echo (isset($context["error_name"]) ? $context["error_name"] : null);
                        echo "</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 293
                    echo " 
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_telephone\">";
                    // line 298
                    echo (isset($context["entry_telephone"]) ? $context["entry_telephone"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_telephone\" value=\"";
                    // line 300
                    echo (isset($context["shipping_tk_speedy_telephone"]) ? $context["shipping_tk_speedy_telephone"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_telephone"]) ? $context["entry_telephone"] : null);
                    echo "\" id=\"shipping_tk_speedy_telephone\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t";
                    // line 301
                    if ((isset($context["error_telephone"]) ? $context["error_telephone"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t<div class=\"text-danger\">";
                        // line 302
                        echo (isset($context["error_telephone"]) ? $context["error_telephone"] : null);
                        echo "</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 303
                    echo " 
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_shipment_product_name\">Името на продукта</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_speedy_shipment_product_name\" name=\"shipping_tk_speedy_shipment_product_name\">
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" ";
                    // line 311
                    if (( !array_key_exists("shipping_tk_speedy_shipment_product_name", $context) || ((isset($context["shipping_tk_speedy_shipment_product_name"]) ? $context["shipping_tk_speedy_shipment_product_name"] : null) == 0))) {
                        echo "selected=\"selected\"";
                    }
                    echo ">Не се използва</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"1\" ";
                    // line 312
                    if ((array_key_exists("shipping_tk_speedy_shipment_product_name", $context) && ((isset($context["shipping_tk_speedy_shipment_product_name"]) ? $context["shipping_tk_speedy_shipment_product_name"] : null) == 1))) {
                        echo "selected=\"selected\"";
                    }
                    echo ">В описанието на пратката - продукт и модел номер</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"2\" ";
                    // line 313
                    if ((array_key_exists("shipping_tk_speedy_shipment_product_name", $context) && ((isset($context["shipping_tk_speedy_shipment_product_name"]) ? $context["shipping_tk_speedy_shipment_product_name"] : null) == 2))) {
                        echo "selected=\"selected\"";
                    }
                    echo ">В описанието на пратката - продукт</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"3\" ";
                    // line 314
                    if ((array_key_exists("shipping_tk_speedy_shipment_product_name", $context) && ((isset($context["shipping_tk_speedy_shipment_product_name"]) ? $context["shipping_tk_speedy_shipment_product_name"] : null) == 3))) {
                        echo "selected=\"selected\"";
                    }
                    echo ">В описанието на пратката - модел номер</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"4\" ";
                    // line 315
                    if ((array_key_exists("shipping_tk_speedy_shipment_product_name", $context) && ((isset($context["shipping_tk_speedy_shipment_product_name"]) ? $context["shipping_tk_speedy_shipment_product_name"] : null) == 4))) {
                        echo "selected=\"selected\"";
                    }
                    echo ">В поле - Забележка (клиент) - продукт и модел номер</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"5\" ";
                    // line 316
                    if ((array_key_exists("shipping_tk_speedy_shipment_product_name", $context) && ((isset($context["shipping_tk_speedy_shipment_product_name"]) ? $context["shipping_tk_speedy_shipment_product_name"] : null) == 5))) {
                        echo "selected=\"selected\"";
                    }
                    echo ">В поле - Забележка (клиент) - продукт</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"6\" ";
                    // line 317
                    if ((array_key_exists("shipping_tk_speedy_shipment_product_name", $context) && ((isset($context["shipping_tk_speedy_shipment_product_name"]) ? $context["shipping_tk_speedy_shipment_product_name"] : null) == 6))) {
                        echo "selected=\"selected\"";
                    }
                    echo ">В поле - Забележка (клиент) - модел номер</option>
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-shipping_tk_speedy_shipment_description\">Описание на пратката</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_shipment_description\" value=\"";
                    // line 325
                    echo (isset($context["shipping_tk_speedy_shipment_description"]) ? $context["shipping_tk_speedy_shipment_description"] : null);
                    echo "\" placeholder=\"Описание на пратката\" id=\"input-shipping_tk_speedy_shipment_description\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_back_documents\">";
                    // line 330
                    echo (isset($context["entry_back_documents"]) ? $context["entry_back_documents"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_back_documents\" id=\"shipping_tk_speedy_back_documents\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 333
                    if ((isset($context["shipping_tk_speedy_back_documents"]) ? $context["shipping_tk_speedy_back_documents"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 334
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 335
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 336
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 337
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 338
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 339
                    echo " 
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_back_receipt\">";
                    // line 345
                    echo (isset($context["entry_back_receipt"]) ? $context["entry_back_receipt"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_back_receipt\" id=\"shipping_tk_speedy_back_receipt\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 348
                    if ((isset($context["shipping_tk_speedy_back_receipt"]) ? $context["shipping_tk_speedy_back_receipt"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 349
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 350
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 351
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 352
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 353
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 354
                    echo " 
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_packing\">";
                    // line 360
                    echo (isset($context["entry_packing"]) ? $context["entry_packing"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_packing\" value=\"";
                    // line 362
                    echo (isset($context["shipping_tk_speedy_packing"]) ? $context["shipping_tk_speedy_packing"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_packing"]) ? $context["entry_packing"] : null);
                    echo "\" id=\"shipping_tk_speedy_packing\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"speedy-group\">
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_option_before_payment\">";
                    // line 368
                    echo (isset($context["entry_options_before_payment"]) ? $context["entry_options_before_payment"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_option_before_payment\" id=\"shipping_tk_speedy_option_before_payment\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 371
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["options_before_payment"]) ? $context["options_before_payment"] : null));
                    foreach ($context['_seq'] as $context["option_id"] => $context["option"]) {
                        // line 372
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if (($context["option_id"] == (isset($context["shipping_tk_speedy_option_before_payment"]) ? $context["shipping_tk_speedy_option_before_payment"] : null))) {
                            // line 373
                            echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $context["option_id"];
                            echo "\" selected=\"selected\">";
                            echo $context["option"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 375
                            echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $context["option_id"];
                            echo "\">";
                            echo $context["option"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 377
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['option_id'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 378
                    echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"form-group\" >
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_return_payer_type\">";
                    // line 383
                    echo (isset($context["entry_return_payer_type"]) ? $context["entry_return_payer_type"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_return_payer_type\" id=\"shipping_tk_speedy_return_payer_type\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 386
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["return_payer_types"]) ? $context["return_payer_types"] : null));
                    foreach ($context['_seq'] as $context["option_id"] => $context["option"]) {
                        // line 387
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if (($context["option_id"] == (isset($context["shipping_tk_speedy_return_payer_type"]) ? $context["shipping_tk_speedy_return_payer_type"] : null))) {
                            // line 388
                            echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $context["option_id"];
                            echo "\" selected=\"selected\">";
                            echo $context["option"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 390
                            echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $context["option_id"];
                            echo "\">";
                            echo $context["option"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 392
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['option_id'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 393
                    echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group\" >
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_return_package_city_service_id\">";
                    // line 397
                    echo (isset($context["entry_return_package_city_service_id"]) ? $context["entry_return_package_city_service_id"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_return_package_city_service_id\" id=\"shipping_tk_speedy_return_package_city_service_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 400
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : null));
                    foreach ($context['_seq'] as $context["service_id"] => $context["service"]) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 401
                        if (($context["service_id"] == (isset($context["shipping_tk_speedy_return_package_city_service_id"]) ? $context["shipping_tk_speedy_return_package_city_service_id"] : null))) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 402
                            echo $context["service_id"];
                            echo "\" selected=\"selected\">";
                            echo $context["service"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 403
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 404
                            echo $context["service_id"];
                            echo "\">";
                            echo $context["service"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 405
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['service_id'], $context['service'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 406
                    echo " 
\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group\" >
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_return_package_intercity_service_id\">";
                    // line 411
                    echo (isset($context["entry_return_package_intercity_service_id"]) ? $context["entry_return_package_intercity_service_id"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_return_package_intercity_service_id\" id=\"shipping_tk_speedy_return_package_intercity_service_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 414
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["services"]) ? $context["services"] : null));
                    foreach ($context['_seq'] as $context["service_id"] => $context["service"]) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 415
                        if (($context["service_id"] == (isset($context["shipping_tk_speedy_return_package_intercity_service_id"]) ? $context["shipping_tk_speedy_return_package_intercity_service_id"] : null))) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 416
                            echo $context["service_id"];
                            echo "\" selected=\"selected\">";
                            echo $context["service"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 417
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 418
                            echo $context["service_id"];
                            echo "\">";
                            echo $context["service"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 419
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['service_id'], $context['service'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 420
                    echo " 
\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_label_printer\">";
                    // line 427
                    echo (isset($context["entry_label_printer"]) ? $context["entry_label_printer"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_label_printer\" id=\"shipping_tk_speedy_label_printer\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 430
                    if ((isset($context["shipping_tk_speedy_label_printer"]) ? $context["shipping_tk_speedy_label_printer"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 431
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 432
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 433
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 434
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 435
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 436
                    echo " 
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_weight_type\">Мерна единица</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_speedy_weight_type\" name=\"shipping_tk_speedy_weight_type\">
\t\t\t\t\t\t\t\t\t\t<option value=\"kilogram\" ";
                    // line 445
                    if (((isset($context["shipping_tk_speedy_weight_type"]) ? $context["shipping_tk_speedy_weight_type"] : null) == "kilogram")) {
                        echo "selected=\"selected\"";
                    }
                    echo ">Килограм</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"gram\" ";
                    // line 446
                    if (((isset($context["shipping_tk_speedy_weight_type"]) ? $context["shipping_tk_speedy_weight_type"] : null) == "gram")) {
                        echo "selected=\"selected\"";
                    }
                    echo ">Грам</option>
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-weight-total\">";
                    // line 452
                    echo (isset($context["entry_weight_total"]) ? $context["entry_weight_total"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_weight_total\" value=\"";
                    // line 454
                    echo (isset($context["shipping_tk_speedy_weight_total"]) ? $context["shipping_tk_speedy_weight_total"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_weight_total"]) ? $context["entry_weight_total"] : null);
                    echo "\" id=\"input-weight-total\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_machine_enabled\">Да се включат ли доставки до Автомат на Спиди</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-2\">
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_speedy_machine_enabled\" name=\"shipping_tk_speedy_machine_enabled\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 464
                    if ((isset($context["shipping_tk_speedy_machine_enabled"]) ? $context["shipping_tk_speedy_machine_enabled"] : null)) {
                        // line 465
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 466
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 468
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 469
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 471
                    echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"shipping_tk_speedy_machine_sort\">Подредба</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_machine_sort\" value=\"";
                    // line 476
                    echo (isset($context["shipping_tk_speedy_machine_sort"]) ? $context["shipping_tk_speedy_machine_sort"] : null);
                    echo "\" placeholder=\"Подредба\" id=\"shipping_tk_speedy_machine_sort\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"shipping_tk_speedy_machine_weight\">До кг.</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_machine_weight\" value=\"";
                    // line 481
                    echo (isset($context["shipping_tk_speedy_machine_weight"]) ? $context["shipping_tk_speedy_machine_weight"] : null);
                    echo "\" placeholder=\"До кг.\" id=\"shipping_tk_speedy_machine_weight\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_office_enabled\">Да се включат ли доставки до Офис на Спиди</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-2\">
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_speedy_office_enabled\" name=\"shipping_tk_speedy_office_enabled\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 494
                    if ((isset($context["shipping_tk_speedy_office_enabled"]) ? $context["shipping_tk_speedy_office_enabled"] : null)) {
                        // line 495
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 496
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 498
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 499
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 501
                    echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"shipping_tk_speedy_office_sort\">Подредба</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_office_sort\" value=\"";
                    // line 506
                    echo (isset($context["shipping_tk_speedy_office_sort"]) ? $context["shipping_tk_speedy_office_sort"] : null);
                    echo "\" placeholder=\"Подредба\" id=\"shipping_tk_speedy_office_sort\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"shipping_tk_speedy_office_weight\">До кг.</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_office_weight\" value=\"";
                    // line 511
                    echo (isset($context["shipping_tk_speedy_office_weight"]) ? $context["shipping_tk_speedy_office_weight"] : null);
                    echo "\" placeholder=\"До кг.\" id=\"shipping_tk_speedy_office_weight\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
 
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_address_enabled\">Да се включат ли доставки до Адрес със Спиди</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-2\">
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_speedy_address_enabled\" name=\"shipping_tk_speedy_address_enabled\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 523
                    if ((isset($context["shipping_tk_speedy_address_enabled"]) ? $context["shipping_tk_speedy_address_enabled"] : null)) {
                        // line 524
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 525
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 527
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 528
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 530
                    echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"shipping_tk_speedy_address_sort\">Подредба</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_address_sort\" value=\"";
                    // line 535
                    echo (isset($context["shipping_tk_speedy_address_sort"]) ? $context["shipping_tk_speedy_address_sort"] : null);
                    echo "\" placeholder=\"Подредба\" id=\"shipping_tk_speedy_address_sort\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"shipping_tk_speedy_address_weight\">До кг.</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_address_weight\" value=\"";
                    // line 539
                    echo (isset($context["shipping_tk_speedy_address_weight"]) ? $context["shipping_tk_speedy_address_weight"] : null);
                    echo "\" placeholder=\"До кг.\" id=\"shipping_tk_speedy_address_weight\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab-price\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_os_enabled\">Ще се изплащат ли сумите като паричен превод?</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_speedy_ppp_enabled\" name=\"shipping_tk_speedy_ppp_enabled\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 553
                    if ((isset($context["shipping_tk_speedy_ppp_enabled"]) ? $context["shipping_tk_speedy_ppp_enabled"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 554
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 555
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 556
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 557
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 558
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 559
                    echo " 
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-fixed-cost\">Надбавка за обработка:</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_calculator_fixed\" value=\"";
                    // line 567
                    echo (isset($context["shipping_tk_speedy_calculator_fixed"]) ? $context["shipping_tk_speedy_calculator_fixed"] : null);
                    echo "\" placeholder=\"Надбавка за обработка\" id=\"input-fixed-cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-fixed-cost\">Минимална такса ППП (0.60 в лева с ДДС):</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_ppp_min\" value=\"";
                    // line 574
                    echo (isset($context["shipping_tk_speedy_ppp_min"]) ? $context["shipping_tk_speedy_ppp_min"] : null);
                    echo "\" placeholder=\"Минимална такса ППП\" id=\"input-fixed-cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-fixed-cost\">Такса ППП (1.6 в %):</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_ppp_tax\" value=\"";
                    // line 581
                    echo (isset($context["shipping_tk_speedy_ppp_tax"]) ? $context["shipping_tk_speedy_ppp_tax"] : null);
                    echo "\" placeholder=\"Такса ППП\" id=\"input-fixed-cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_payer_type\">Платец на куриерската услуга</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_payer_type\" id=\"shipping_tk_speedy_payer_type\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 589
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["return_payer_types"]) ? $context["return_payer_types"] : null));
                    foreach ($context['_seq'] as $context["option_id"] => $context["option"]) {
                        // line 590
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if (($context["option_id"] == (isset($context["shipping_tk_speedy_payer_type"]) ? $context["shipping_tk_speedy_payer_type"] : null))) {
                            // line 591
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $context["option_id"];
                            echo "\" selected=\"selected\">";
                            echo $context["option"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 593
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $context["option_id"];
                            echo "\">";
                            echo $context["option"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 595
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['option_id'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 596
                    echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-shipping_tk_speedy_machine_free\">Сума за безплатна доставка до автомат</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_machine_free\" value=\"";
                    // line 605
                    echo (isset($context["shipping_tk_speedy_machine_free"]) ? $context["shipping_tk_speedy_machine_free"] : null);
                    echo "\" placeholder=\"Сума за безплатна доставка до Спиди автомат\" id=\"input-shipping_tk_speedy_machine_free\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"input-shipping_tk_speedy_machine_free_weight\">Тегло за безплатна доставка до автомат</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_machine_free_weight\" value=\"";
                    // line 610
                    echo (isset($context["shipping_tk_speedy_machine_free_weight"]) ? $context["shipping_tk_speedy_machine_free_weight"] : null);
                    echo "\" placeholder=\"Тегло\" id=\"input-shipping_tk_speedy_machine_free_weight\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-shipping_tk_speedy_office_free\">";
                    // line 617
                    echo (isset($context["entry_office_cost"]) ? $context["entry_office_cost"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_office_free\" value=\"";
                    // line 621
                    echo (isset($context["shipping_tk_speedy_office_free"]) ? $context["shipping_tk_speedy_office_free"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_office_cost"]) ? $context["entry_office_cost"] : null);
                    echo "\" id=\"input-shipping_tk_speedy_office_free\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"input-shipping_tk_speedy_office_free_weight\">Тегло за безплатна доставка до офис</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_office_free_weight\" value=\"";
                    // line 626
                    echo (isset($context["shipping_tk_speedy_office_free_weight"]) ? $context["shipping_tk_speedy_office_free_weight"] : null);
                    echo "\" placeholder=\"Тегло\" id=\"input-shipping_tk_speedy_office_free_weight\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-shipping_tk_speedy_door_free\">";
                    // line 633
                    echo (isset($context["entry_door_cost"]) ? $context["entry_door_cost"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_door_free\" value=\"";
                    // line 637
                    echo (isset($context["shipping_tk_speedy_door_free"]) ? $context["shipping_tk_speedy_door_free"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_door_cost"]) ? $context["entry_door_cost"] : null);
                    echo "\" id=\"input-shipping_tk_speedy_door_free\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"input-shipping_tk_speedy_door_free_weight\">Тегло за безплатна доставка до адрес</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_door_free_weight\" value=\"";
                    // line 642
                    echo (isset($context["shipping_tk_speedy_door_free_weight"]) ? $context["shipping_tk_speedy_door_free_weight"] : null);
                    echo "\" placeholder=\"Тегло\" id=\"input-shipping_tk_speedy_door_free_weight\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\"><span data-toggle=\"tooltip\" title=\"Избери списък със суми които да се пресмятат за сума която трябва да се достигне преди да се активира отстъпката.\">Избери суми</span></label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"well well-sm\" style=\"height: 180px; overflow: auto;\" id=\"totals\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 652
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["oc_totals"]) ? $context["oc_totals"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["total"]) {
                        // line 653
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"checkbox col-sm-4\"><label><input type=\"checkbox\" name=\"shipping_tk_speedy_totals[]\" value=\"";
                        echo $this->getAttribute($context["total"], "code", array());
                        echo "\" ";
                        if (twig_in_filter($this->getAttribute($context["total"], "code", array()), (isset($context["shipping_tk_speedy_totals"]) ? $context["shipping_tk_speedy_totals"] : null))) {
                            echo "checked=\"checked\"";
                        }
                        echo " />";
                        echo $this->getAttribute($context["total"], "name", array());
                        echo "</label></div>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['total'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 655
                    echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-fixed-cost\">Твърда сума за доставка до автомат</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_machine_fixed_cost\" value=\"";
                    // line 662
                    echo (isset($context["shipping_tk_speedy_machine_fixed_cost"]) ? $context["shipping_tk_speedy_machine_fixed_cost"] : null);
                    echo "\" placeholder=\"Твърда сума за доставка до автомат\" id=\"input-fixed-cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-fixed-cost\">";
                    // line 667
                    echo (isset($context["entry_office_fixed_cost"]) ? $context["entry_office_fixed_cost"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_office_fixed_cost\" value=\"";
                    // line 669
                    echo (isset($context["shipping_tk_speedy_office_fixed_cost"]) ? $context["shipping_tk_speedy_office_fixed_cost"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_office_fixed_cost"]) ? $context["entry_office_fixed_cost"] : null);
                    echo "\" id=\"input-fixed-cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
 
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-fixed-cost\">";
                    // line 674
                    echo (isset($context["entry_door_fixed_cost"]) ? $context["entry_door_fixed_cost"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_door_fixed_cost\" value=\"";
                    // line 676
                    echo (isset($context["shipping_tk_speedy_door_fixed_cost"]) ? $context["shipping_tk_speedy_door_fixed_cost"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_door_fixed_cost"]) ? $context["entry_door_fixed_cost"] : null);
                    echo "\" id=\"input-fixed-cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t
\t\t\t\t\t\t\t<div id=\"calculate_settings\" >
\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3 text-right\"></div>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<br><br><h4><b>";
                    // line 685
                    echo (isset($context["entry_price_auto_settings"]) ? $context["entry_price_auto_settings"] : null);
                    echo "</b></h4>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_calculate_enabled\">";
                    // line 690
                    echo (isset($context["entry_calculate_enabled"]) ? $context["entry_calculate_enabled"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_speedy_calculate_enabled\" name=\"shipping_tk_speedy_calculate_enabled\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 693
                    if ((isset($context["shipping_tk_speedy_calculate_enabled"]) ? $context["shipping_tk_speedy_calculate_enabled"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 694
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 695
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 696
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 697
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 698
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 699
                    echo " 
\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"speedy-group\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_from_office\"><span data-toggle=\"tooltip\" title=\"";
                    // line 707
                    echo (isset($context["help_from_office"]) ? $context["help_from_office"] : null);
                    echo "\">";
                    echo (isset($context["entry_from_office"]) ? $context["entry_from_office"] : null);
                    echo "</span></label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_from_office\" id=\"shipping_tk_speedy_from_office\" class=\"form-control\" >
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 710
                    if ((isset($context["shipping_tk_speedy_from_office"]) ? $context["shipping_tk_speedy_from_office"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 711
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 712
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 713
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 714
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 715
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 716
                    echo " 
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<div class=\"form-group\" >
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_office_id\">";
                    // line 722
                    echo (isset($context["entry_office"]) ? $context["entry_office"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_office_id\" id=\"shipping_tk_speedy_office_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 725
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["offices"]) ? $context["offices"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["office"]) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 726
                        if (($this->getAttribute($context["office"], "id", array(), "array") == (isset($context["shipping_tk_speedy_office_id"]) ? $context["shipping_tk_speedy_office_id"] : null))) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 727
                            echo $this->getAttribute($context["office"], "id", array(), "array");
                            echo "\" selected=\"selected\">";
                            echo $this->getAttribute($context["office"], "label", array(), "array");
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 728
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 729
                            echo $this->getAttribute($context["office"], "id", array(), "array");
                            echo "\">";
                            echo $this->getAttribute($context["office"], "label", array(), "array");
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 730
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['office'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 731
                    echo " 
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
 
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_np_enabled\">";
                    // line 738
                    echo (isset($context["entry_np"]) ? $context["entry_np"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_speedy_np_enabled\" name=\"shipping_tk_speedy_np_enabled\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 741
                    if ((isset($context["shipping_tk_speedy_np_enabled"]) ? $context["shipping_tk_speedy_np_enabled"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 742
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 743
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 744
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 745
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 746
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 747
                    echo " 
\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_os_enabled\">";
                    // line 753
                    echo (isset($context["entry_os"]) ? $context["entry_os"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_speedy_os_enabled\" name=\"shipping_tk_speedy_os_enabled\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 756
                    if ((isset($context["shipping_tk_speedy_os_enabled"]) ? $context["shipping_tk_speedy_os_enabled"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 757
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 758
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 759
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 760
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 761
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 762
                    echo " 
\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_os_enabled\">";
                    // line 768
                    echo (isset($context["entry_fragile"]) ? $context["entry_fragile"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_speedy_fragile_enabled\" name=\"shipping_tk_speedy_fragile_enabled\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 771
                    if ((isset($context["shipping_tk_speedy_fragile_enabled"]) ? $context["shipping_tk_speedy_fragile_enabled"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 772
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 773
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 774
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 775
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 776
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 777
                    echo " 
\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<div class=\"col-sm-3 text-right\"></div>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<br><br><h4><b>Избор на офис за всеки клиентски номер</b></h4>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                    // line 792
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["clients"]) ? $context["clients"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
                        // line 793
                        echo "\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<div class=\"col-sm-3 text-right\"></div>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<p><b>";
                        // line 798
                        echo sprintf((isset($context["text_client_id"]) ? $context["text_client_id"] : null), $this->getAttribute($context["client"], "clientId", array()), $this->getAttribute($context["client"], "name", array()), $this->getAttribute($context["client"], "address", array()));
                        echo "</b></p>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"speedy-group\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_from_offices_";
                        // line 804
                        echo $this->getAttribute($context["client"], "clientId", array());
                        echo "\">
\t\t\t\t\t\t\t\t\t\t";
                        // line 805
                        echo (isset($context["entry_from_office"]) ? $context["entry_from_office"] : null);
                        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_from_offices[";
                        // line 808
                        echo $this->getAttribute($context["client"], "clientId", array());
                        echo "]\" id=\"shipping_tk_speedy_from_offices_";
                        echo $this->getAttribute($context["client"], "clientId", array());
                        echo "\" class=\"form-control\" >
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 809
                        if ($this->getAttribute((isset($context["shipping_tk_speedy_from_offices"]) ? $context["shipping_tk_speedy_from_offices"] : null), $this->getAttribute($context["client"], "clientId", array()), array(), "array")) {
                            // line 810
                            echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                            echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                            // line 811
                            echo (isset($context["text_no"]) ? $context["text_no"] : null);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 812
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                            // line 813
                            echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                            // line 814
                            echo (isset($context["text_no"]) ? $context["text_no"] : null);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 816
                        echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"form-group\" >
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_offices_id_";
                        // line 821
                        echo $this->getAttribute($context["client"], "clientId", array());
                        echo "\">";
                        echo (isset($context["entry_office"]) ? $context["entry_office"] : null);
                        echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_offices_id[";
                        // line 823
                        echo $this->getAttribute($context["client"], "clientId", array());
                        echo "]\" id=\"shipping_tk_speedy_offices_id_";
                        echo $this->getAttribute($context["client"], "clientId", array());
                        echo "\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 824
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["offices"]) ? $context["offices"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["office"]) {
                            // line 825
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($context["office"], "id", array()) == $this->getAttribute((isset($context["shipping_tk_speedy_offices_id"]) ? $context["shipping_tk_speedy_offices_id"] : null), $this->getAttribute($context["client"], "clientId", array(), "array"), array(), "array"))) {
                                // line 826
                                echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                echo $this->getAttribute($context["office"], "id", array(), "array");
                                echo "\" selected=\"selected\">";
                                echo $this->getAttribute($context["office"], "label", array(), "array");
                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 827
                                echo " 
\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                // line 828
                                echo $this->getAttribute($context["office"], "id", array(), "array");
                                echo "\">";
                                echo $this->getAttribute($context["office"], "label", array(), "array");
                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 830
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['office'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 831
                        echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" >";
                        // line 836
                        echo (isset($context["entry_telephone"]) ? $context["entry_telephone"] : null);
                        echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_telephone_client[";
                        // line 838
                        echo $this->getAttribute($context["client"], "clientId", array());
                        echo "]\" value=\"";
                        echo $this->getAttribute((isset($context["shipping_tk_speedy_telephone_client"]) ? $context["shipping_tk_speedy_telephone_client"] : null), $this->getAttribute($context["client"], "clientId", array(), "array"), array(), "array");
                        echo "\" placeholder=\"";
                        echo (isset($context["entry_telephone"]) ? $context["entry_telephone"] : null);
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" >";
                        // line 843
                        echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
                        echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_name_client[";
                        // line 845
                        echo $this->getAttribute($context["client"], "clientId", array());
                        echo "]\" value=\"";
                        echo $this->getAttribute((isset($context["shipping_tk_speedy_name_client"]) ? $context["shipping_tk_speedy_name_client"] : null), $this->getAttribute($context["client"], "clientId", array(), "array"), array(), "array");
                        echo "\" placeholder=\"";
                        echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['client'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 851
                    echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab-status\">

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_speedy_order_status_id\">Статус на поръчката след генериране на товарителница:</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_order_status_id\" id=\"shipping_tk_speedy_order_status_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">Без смяна на статуса</option>
\t\t\t\t\t\t\t\t\t\t";
                    // line 861
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
                        echo " 
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                        // line 863
                        if (($this->getAttribute($context["order_status"], "order_status_id", array(), "array") == (isset($context["shipping_tk_speedy_order_status_id"]) ? $context["shipping_tk_speedy_order_status_id"] : null))) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 864
                            echo $this->getAttribute($context["order_status"], "order_status_id", array(), "array");
                            echo "\" selected=\"selected\">";
                            echo $this->getAttribute($context["order_status"], "name", array(), "array");
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 865
                            echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 866
                            echo $this->getAttribute($context["order_status"], "order_status_id", array(), "array");
                            echo "\">";
                            echo $this->getAttribute($context["order_status"], "name", array(), "array");
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 867
                        echo " 
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 868
                    echo " 
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-shipping_tk_speedy_order_status_id_mail\">Да се пратили и-меил след генериране на товарителница:</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_order_status_id_mail\" id=\"input-shipping_tk_speedy_order_status_id_mail\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 877
                    if ((isset($context["shipping_tk_speedy_order_status_id_mail"]) ? $context["shipping_tk_speedy_order_status_id_mail"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 878
                        echo (isset($context["entry_no"]) ? $context["entry_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 879
                        echo (isset($context["entry_yes"]) ? $context["entry_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 880
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 881
                        echo (isset($context["entry_no"]) ? $context["entry_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 882
                        echo (isset($context["entry_yes"]) ? $context["entry_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 883
                    echo " 
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-shipping_tk_speedy_order_status_id_mail_text\">Текст към и-меила след генериране на товарителница<br> ({shipment_number} - заменя номера на товарителница в текста):</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<textarea name=\"shipping_tk_speedy_order_status_id_mail_text\" rows=\"3\" placeholder=\"Въведи текст\" id=\"input-shipping_tk_speedy_order_status_id_mail_text\" class=\"form-control\">";
                    // line 891
                    echo (isset($context["shipping_tk_speedy_order_status_id_mail_text"]) ? $context["shipping_tk_speedy_order_status_id_mail_text"] : null);
                    echo "</textarea>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<div class=\"col-sm-3 text-right\"></div>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<br><br><h4><b>Синхронизиране на статуси между Speedy и Opencart и изпращане на и-мейл до клиента</b></h4>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
                    // line 902
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["text_statuses"]) ? $context["text_statuses"] : null));
                    foreach ($context['_seq'] as $context["key"] => $context["text_status"]) {
                        // line 903
                        echo "\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">";
                        // line 904
                        echo $context["text_status"];
                        echo "</label>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">Избери статус за синхронизиране</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_order_status[";
                        // line 910
                        echo $context["key"];
                        echo "]\" id=\"input-shipping_tk_speedy_order_status\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Без смяна на статуса</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 912
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
                            // line 913
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute((isset($context["shipping_tk_speedy_order_status"]) ? $context["shipping_tk_speedy_order_status"] : null), $context["key"], array(), "array") == $this->getAttribute($context["order_status"], "order_status_id", array()))) {
                                echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                // line 914
                                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                                echo "\" selected=\"selected\">";
                                echo $this->getAttribute($context["order_status"], "name", array());
                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 915
                                echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                // line 916
                                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                                echo "\">";
                                echo $this->getAttribute($context["order_status"], "name", array());
                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 917
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 918
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">Да се изпратили и-мейл до клиента</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_speedy_order_status_mail[";
                        // line 923
                        echo $context["key"];
                        echo "]\" id=\"input-shipping_tk_speedy_order_status_mail\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 924
                        if ($this->getAttribute((isset($context["shipping_tk_speedy_order_status_mail"]) ? $context["shipping_tk_speedy_order_status_mail"] : null), $context["key"], array(), "array")) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                            // line 925
                            echo (isset($context["entry_no"]) ? $context["entry_no"] : null);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                            // line 926
                            echo (isset($context["entry_yes"]) ? $context["entry_yes"] : null);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 927
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                            // line 928
                            echo (isset($context["entry_no"]) ? $context["entry_no"] : null);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                            // line 929
                            echo (isset($context["entry_yes"]) ? $context["entry_yes"] : null);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 930
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">Допълнителен текст към и-меила</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t\t<textarea name=\"shipping_tk_speedy_order_status_mail_text[";
                        // line 938
                        echo $context["key"];
                        echo "]\" rows=\"3\" placeholder=\"Въведи текст\" id=\"input-shipping_tk_speedy_order_status_mail_text\" class=\"form-control\">";
                        echo $this->getAttribute((isset($context["shipping_tk_speedy_order_status_mail_text"]) ? $context["shipping_tk_speedy_order_status_mail_text"] : null), $context["key"], array(), "array");
                        echo "</textarea>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['text_status'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 943
                    echo " 
\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab-price_weight\">
\t\t\t\t\t\t
\t\t\t\t\t\t\t<table id=\"weight-value\" class=\"table table-striped table-bordered table-hover\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-left required\">Килограми - От</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-left required\">Килограми - До (включително)</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-left required\">Твърда цена</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-left required\">Вид доставка</td>
\t\t\t\t\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
              
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                    // line 962
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["shipping_tk_speedy_weight_value"]) ? $context["shipping_tk_speedy_weight_value"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["weight_value"]) {
                        // line 963
                        echo "\t\t\t\t\t\t\t\t\t<tr id=\"weight-value-row";
                        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_speedy_weight_value[";
                        // line 964
                        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
                        echo "][from]\" value=\"";
                        echo $this->getAttribute($context["weight_value"], "from", array());
                        echo "\" class=\"form-control\" /></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_speedy_weight_value[";
                        // line 965
                        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
                        echo "][to]\" value=\"";
                        echo $this->getAttribute($context["weight_value"], "to", array());
                        echo "\" class=\"form-control\" /></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_speedy_weight_value[";
                        // line 966
                        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
                        echo "][price]\" value=\"";
                        echo $this->getAttribute($context["weight_value"], "price", array());
                        echo "\" class=\"form-control\" /></td>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\">
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"shipping_tk_speedy_weight_value[";
                        // line 969
                        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
                        echo "][type]\">
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"machine\" ";
                        // line 970
                        if (($this->getAttribute($context["weight_value"], "type", array()) == "machine")) {
                            echo "selected=\"selected\"";
                        }
                        echo ">До автомат</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"office\" ";
                        // line 971
                        if (($this->getAttribute($context["weight_value"], "type", array()) == "office")) {
                            echo "selected=\"selected\"";
                        }
                        echo ">До офис</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"door\" ";
                        // line 972
                        if (($this->getAttribute($context["weight_value"], "type", array()) == "door")) {
                            echo "selected=\"selected\"";
                        }
                        echo ">До адрес</option>
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><button type=\"button\" onclick=\"\$('#weight-value-row";
                        // line 975
                        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
                        echo "').remove();\" data-toggle=\"tooltip\" title=\"";
                        echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
                        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></button></td>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
                        // line 979
                        $context["weight_value_row"] = ((isset($context["weight_value_row"]) ? $context["weight_value_row"] : null) + 1);
                        // line 980
                        echo "\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['weight_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 981
                    echo "\t\t\t\t\t\t\t\t</tbody>
              
\t\t\t\t\t\t\t\t<tfoot>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td colspan=\"4\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><button type=\"button\" onclick=\"addWeightValue();\" data-toggle=\"tooltip\" title=\"";
                    // line 986
                    echo (isset($context["button_weight_value_add"]) ? $context["button_weight_value_add"] : null);
                    echo "\" class=\"btn btn-primary\"><i class=\"fa fa-plus-circle\"></i></button></td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</tfoot>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab-lang\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">Автомат - заглавие</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t";
                    // line 998
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 999
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\" style=\"margin-bottom: 5px\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><img src=\"language/";
                        // line 1000
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "/";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo ".png\" title=\"";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_text[";
                        // line 1001
                        echo $this->getAttribute($context["language"], "language_id", array());
                        echo "][machine_title]\" value=\"";
                        echo (($this->getAttribute($this->getAttribute((isset($context["shipping_tk_speedy_text"]) ? $context["shipping_tk_speedy_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "machine_title", array())) ? ($this->getAttribute($this->getAttribute((isset($context["shipping_tk_speedy_text"]) ? $context["shipping_tk_speedy_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "machine_title", array())) : (""));
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 1004
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">Автомат - текст</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t";
                    // line 1010
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 1011
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\" style=\"margin-bottom: 5px\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><img src=\"language/";
                        // line 1012
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "/";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo ".png\" title=\"";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_text[";
                        // line 1013
                        echo $this->getAttribute($context["language"], "language_id", array());
                        echo "][machine_text]\" value=\"";
                        echo (($this->getAttribute($this->getAttribute((isset($context["shipping_tk_speedy_text"]) ? $context["shipping_tk_speedy_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "machine_text", array())) ? ($this->getAttribute($this->getAttribute((isset($context["shipping_tk_speedy_text"]) ? $context["shipping_tk_speedy_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "machine_text", array())) : (""));
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 1016
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">Офис - заглавие</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t";
                    // line 1022
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 1023
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\" style=\"margin-bottom: 5px\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><img src=\"language/";
                        // line 1024
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "/";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo ".png\" title=\"";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_text[";
                        // line 1025
                        echo $this->getAttribute($context["language"], "language_id", array());
                        echo "][office_title]\" value=\"";
                        echo (($this->getAttribute($this->getAttribute((isset($context["shipping_tk_speedy_text"]) ? $context["shipping_tk_speedy_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "office_title", array())) ? ($this->getAttribute($this->getAttribute((isset($context["shipping_tk_speedy_text"]) ? $context["shipping_tk_speedy_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "office_title", array())) : (""));
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 1028
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">Офис - текст</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t";
                    // line 1034
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 1035
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\" style=\"margin-bottom: 5px\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><img src=\"language/";
                        // line 1036
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "/";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo ".png\" title=\"";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_text[";
                        // line 1037
                        echo $this->getAttribute($context["language"], "language_id", array());
                        echo "][office_text]\" value=\"";
                        echo (($this->getAttribute($this->getAttribute((isset($context["shipping_tk_speedy_text"]) ? $context["shipping_tk_speedy_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "office_text", array())) ? ($this->getAttribute($this->getAttribute((isset($context["shipping_tk_speedy_text"]) ? $context["shipping_tk_speedy_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "office_text", array())) : (""));
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 1040
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">Адрес - заглавие</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t";
                    // line 1046
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 1047
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\" style=\"margin-bottom: 5px\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><img src=\"language/";
                        // line 1048
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "/";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo ".png\" title=\"";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_text[";
                        // line 1049
                        echo $this->getAttribute($context["language"], "language_id", array());
                        echo "][address_title]\" value=\"";
                        echo (($this->getAttribute($this->getAttribute((isset($context["shipping_tk_speedy_text"]) ? $context["shipping_tk_speedy_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "address_title", array())) ? ($this->getAttribute($this->getAttribute((isset($context["shipping_tk_speedy_text"]) ? $context["shipping_tk_speedy_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "address_title", array())) : (""));
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 1052
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">Адрес - текст</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t";
                    // line 1058
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 1059
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\" style=\"margin-bottom: 5px\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><img src=\"language/";
                        // line 1060
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "/";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo ".png\" title=\"";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_speedy_text[";
                        // line 1061
                        echo $this->getAttribute($context["language"], "language_id", array());
                        echo "][address_text]\" value=\"";
                        echo (($this->getAttribute($this->getAttribute((isset($context["shipping_tk_speedy_text"]) ? $context["shipping_tk_speedy_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "address_text", array())) ? ($this->getAttribute($this->getAttribute((isset($context["shipping_tk_speedy_text"]) ? $context["shipping_tk_speedy_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "address_text", array())) : (""));
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 1064
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t</div>

\t\t\t\t\t";
                } else {
                    // line 1071
                    echo " 
\t\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"col-sm-3\"></div>
\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t<b>";
                    // line 1076
                    echo (isset($context["text_sync_info_warning"]) ? $context["text_sync_info_warning"] : null);
                    echo "</b>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 1080
                echo " 
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
            }
            // line 1083
            echo " 
\t\t\t
\t\t\t";
        } else {
            // line 1085
            echo " 
\t\t\t
\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-body\">
\t\t\t\t<h3>Трябва да активирате модула TK Checkout за да позлвате Доставка със Спиди</h3>
\t\t\t\t</div>
\t\t\t</div>\t
\t\t\t
\t\t\t";
        }
        // line 1093
        echo " 
\t\t</form>
\t\t
\t</div>
</div>

<script type=\"text/javascript\">

var weight_value_row = ";
        // line 1101
        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
        echo ";

function addWeightValue() {
\thtml  = '<tr id=\"weight-value-row' + weight_value_row + '\">';
\thtml += '  <td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_speedy_weight_value[' + weight_value_row + '][from]\" value=\"\" placeholder=\"0.00\" class=\"form-control\" /></td>';
\thtml += '  <td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_speedy_weight_value[' + weight_value_row + '][to]\" value=\"\" placeholder=\"0.00\" class=\"form-control\" /></td>';
\thtml += '  <td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_speedy_weight_value[' + weight_value_row + '][price]\" value=\"\" placeholder=\"0.00\" class=\"form-control\" /></td>';
\thtml += '  <td class=\"text-right\"><select class=\"form-control\" name=\"shipping_tk_speedy_weight_value[' + weight_value_row + '][type]\"><option value=\"machine\">До автомат</option><option value=\"office\">До офис</option><option value=\"door\">До адрес</option></select></td>';
\thtml += '  <td class=\"text-right\"><button type=\"button\" onclick=\"\$(\\'#weight-value-row' + weight_value_row + '\\').remove();\" data-toggle=\"tooltip\" title=\"";
        // line 1109
        echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></button></td>';
\thtml += '</tr>';

\t\$('#weight-value tbody').append(html);

\tweight_value_row++;
}

function speedyButtonLogin() { 
\t\$('#loading').remove();
\t\$('#login_error').html('').removeClass(\"text-danger\");
\t\$('#login_button').after('<span id=\"loading\" class=\"attention\" style=\"padding: 5px;\">Моля, изчакайте.</span>');

\t\$.ajax( { 
\t\t\turl: 'index.php?route=extension/shipping/tk_speedy/login&user_token=";
        // line 1123
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\ttype: 'POST',
\t\t\tdata: 'username=' + encodeURIComponent(\$('#shipping_tk_speedy_username').val()) + '&password=' + encodeURIComponent(\$('#shipping_tk_speedy_password').val()) + '&test=' + encodeURIComponent(\$('#shipping_tk_speedy_test').val()),
\t\t\tdataType: 'json',
\t\t\tsuccess: function(data) { 
\t\t\t\tif (data) { 
\t\t\t\t\t\$('#loading').remove();

\t\t\t\t\tif (data.success) { 
\t\t\t\t\t\twindow.location = window.location;
\t\t\t\t\t} else { 
\t\t\t\t\t\t\$('#login_error').html(data.message).addClass('text-danger');
\t\t\t\t\t} 
\t\t\t\t} 
\t\t\t} ,
\t\t\terror: function(request) { 
\t\t\t\t\$('#loading').remove();

\t\t\t\t\$('#login_error').html('";
        // line 1141
        echo (isset($context["error_general"]) ? $context["error_general"] : null);
        echo "').addClass(\"text-danger\");
\t\t\t} 
\t\t});
} 

function refreshData() { 
\t\$('#data_error').html('').removeClass(\"text-danger\");
\t\$('#get_data').attr('disabled', true);
\t\$('#get_data').after('<span id=\"loading\" class=\"attention\" style=\"padding: 5px;\">";
        // line 1149
        echo (isset($context["text_get_data"]) ? $context["text_get_data"] : null);
        echo "</span>');


\t\$.ajax( { 
\t\t\turl: 'index.php?route=extension/shipping/tk_speedy/update&user_token=";
        // line 1153
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\ttype: 'POST',
\t\t\tdata: '',
\t\t\tdataType: 'json',
\t\t\tsuccess: function(data) { 
\t\t\t\tif (data) { 
\t\t\t\t\tif (data.success) { 
\t\t\t\t\t\twindow.location = window.location;
\t\t\t\t\t} else if (data.error) { 
\t\t\t\t\t\t\$('#data_error').html(data.message).addClass('text-danger');
\t\t\t\t\t} 
\t\t\t\t} 
\t\t\t} ,
\t\t\terror: function(request) { 
\t\t\t\t\$('#data_error').html('";
        // line 1167
        echo (isset($context["error_general"]) ? $context["error_general"] : null);
        echo "').addClass(\"text-danger\");
\t\t\t} ,
\t\t\tcomplete: function() { 
\t\t\t\t\$('#loading').remove();
\t\t\t} 
\t\t});
} 

function speedyButtonLogout() { 
\tif (confirm('";
        // line 1176
        echo (isset($context["text_warning_logout"]) ? $context["text_warning_logout"] : null);
        echo "')) { 
\t\t\$.get('index.php?route=extension/shipping/tk_speedy/logout&user_token=";
        // line 1177
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "').done(function() { 
\t\t\t\twindow.location = window.location;
\t\t\t});
\t} 
} 

function addSpeedyWeightDimension() { 
\tvar next_row = 0;

\tif(typeof \$('#weight_dimensions tbody tr:last').attr('data-row') != 'undefined') { 
\t\tnext_row = parseInt(\$('#weight_dimensions tbody tr:last').attr('data-row')) + 1;
\t} 

\tvar html = '';
\thtml = '<tr data-row=\"' + next_row + '\">';
\thtml += '<td class=\"text-center\">';
\thtml += '<input type=\"text\" name=\"weight_dimensions[' + next_row + '][WEIGHT]\" class=\"form-control\">';
\thtml += '</td>';
\thtml += '<td class=\"text-center\">';
\thtml += '<input type=\"text\" name=\"weight_dimensions[' + next_row + '][XS]\" class=\"form-control\">';
\thtml += '</td>';
\thtml += '<td class=\"text-center\">';
\thtml += '<input type=\"text\" name=\"weight_dimensions[' + next_row + '][S]\" class=\"form-control\">';
\thtml += '</td>';
\thtml += '<td class=\"text-center\">';
\thtml += '<input type=\"text\" name=\"weight_dimensions[' + next_row + '][M]\" class=\"form-control\">';
\thtml += '</td>';
\thtml += '<td class=\"text-center\">';
\thtml += '<input type=\"text\" name=\"weight_dimensions[' + next_row + '][L]\" class=\"form-control\">';
\thtml += '</td>';
\thtml += '<td class=\"text-center\">';
\thtml += '<input type=\"text\" name=\"weight_dimensions[' + next_row + '][XL]\" class=\"form-control\">';
\thtml += '</td>';
\thtml += '<td class=\"text-center\">';
\thtml += '<button type=\"button\" onclick=\"removeSpeedyWeightDimension(' + next_row + ');\" data-toggle=\"tooltip\" title=\"\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></button>';
\thtml += '</td>';
\thtml += '</tr>';

\t\$('#weight_dimensions tbody').append(html);
}

function removeSpeedyWeightDimension(row) { 
\t\$('#weight_dimensions tr[data-row=' + row + ']').remove();
}
</script>
";
        // line 1222
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "extension/shipping/tk_speedy.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2742 => 1222,  2694 => 1177,  2690 => 1176,  2678 => 1167,  2661 => 1153,  2654 => 1149,  2643 => 1141,  2622 => 1123,  2605 => 1109,  2594 => 1101,  2584 => 1093,  2573 => 1085,  2568 => 1083,  2562 => 1080,  2554 => 1076,  2547 => 1071,  2537 => 1064,  2526 => 1061,  2518 => 1060,  2515 => 1059,  2511 => 1058,  2503 => 1052,  2492 => 1049,  2484 => 1048,  2481 => 1047,  2477 => 1046,  2469 => 1040,  2458 => 1037,  2450 => 1036,  2447 => 1035,  2443 => 1034,  2435 => 1028,  2424 => 1025,  2416 => 1024,  2413 => 1023,  2409 => 1022,  2401 => 1016,  2390 => 1013,  2382 => 1012,  2379 => 1011,  2375 => 1010,  2367 => 1004,  2356 => 1001,  2348 => 1000,  2345 => 999,  2341 => 998,  2326 => 986,  2319 => 981,  2313 => 980,  2311 => 979,  2302 => 975,  2294 => 972,  2288 => 971,  2282 => 970,  2278 => 969,  2270 => 966,  2264 => 965,  2258 => 964,  2253 => 963,  2249 => 962,  2228 => 943,  2214 => 938,  2204 => 930,  2199 => 929,  2195 => 928,  2192 => 927,  2187 => 926,  2183 => 925,  2179 => 924,  2175 => 923,  2168 => 918,  2161 => 917,  2154 => 916,  2151 => 915,  2144 => 914,  2139 => 913,  2135 => 912,  2130 => 910,  2121 => 904,  2118 => 903,  2114 => 902,  2100 => 891,  2090 => 883,  2085 => 882,  2081 => 881,  2078 => 880,  2073 => 879,  2069 => 878,  2065 => 877,  2054 => 868,  2047 => 867,  2040 => 866,  2037 => 865,  2030 => 864,  2026 => 863,  2019 => 861,  2007 => 851,  1991 => 845,  1986 => 843,  1974 => 838,  1969 => 836,  1962 => 831,  1956 => 830,  1949 => 828,  1946 => 827,  1938 => 826,  1935 => 825,  1931 => 824,  1925 => 823,  1918 => 821,  1911 => 816,  1906 => 814,  1902 => 813,  1899 => 812,  1894 => 811,  1889 => 810,  1887 => 809,  1881 => 808,  1875 => 805,  1871 => 804,  1862 => 798,  1855 => 793,  1851 => 792,  1834 => 777,  1829 => 776,  1825 => 775,  1822 => 774,  1817 => 773,  1813 => 772,  1809 => 771,  1803 => 768,  1795 => 762,  1790 => 761,  1786 => 760,  1783 => 759,  1778 => 758,  1774 => 757,  1770 => 756,  1764 => 753,  1756 => 747,  1751 => 746,  1747 => 745,  1744 => 744,  1739 => 743,  1735 => 742,  1731 => 741,  1725 => 738,  1716 => 731,  1709 => 730,  1702 => 729,  1699 => 728,  1692 => 727,  1688 => 726,  1682 => 725,  1676 => 722,  1668 => 716,  1663 => 715,  1659 => 714,  1656 => 713,  1651 => 712,  1647 => 711,  1643 => 710,  1635 => 707,  1625 => 699,  1620 => 698,  1616 => 697,  1613 => 696,  1608 => 695,  1604 => 694,  1600 => 693,  1594 => 690,  1586 => 685,  1572 => 676,  1567 => 674,  1557 => 669,  1552 => 667,  1544 => 662,  1535 => 655,  1520 => 653,  1516 => 652,  1503 => 642,  1493 => 637,  1486 => 633,  1476 => 626,  1466 => 621,  1459 => 617,  1449 => 610,  1441 => 605,  1430 => 596,  1424 => 595,  1416 => 593,  1408 => 591,  1405 => 590,  1401 => 589,  1390 => 581,  1380 => 574,  1370 => 567,  1360 => 559,  1355 => 558,  1351 => 557,  1348 => 556,  1343 => 555,  1339 => 554,  1335 => 553,  1318 => 539,  1311 => 535,  1304 => 530,  1299 => 528,  1294 => 527,  1289 => 525,  1284 => 524,  1282 => 523,  1267 => 511,  1259 => 506,  1252 => 501,  1247 => 499,  1242 => 498,  1237 => 496,  1232 => 495,  1230 => 494,  1214 => 481,  1206 => 476,  1199 => 471,  1194 => 469,  1189 => 468,  1184 => 466,  1179 => 465,  1177 => 464,  1162 => 454,  1157 => 452,  1146 => 446,  1140 => 445,  1129 => 436,  1124 => 435,  1120 => 434,  1117 => 433,  1112 => 432,  1108 => 431,  1104 => 430,  1098 => 427,  1089 => 420,  1082 => 419,  1075 => 418,  1072 => 417,  1065 => 416,  1061 => 415,  1055 => 414,  1049 => 411,  1042 => 406,  1035 => 405,  1028 => 404,  1025 => 403,  1018 => 402,  1014 => 401,  1008 => 400,  1002 => 397,  996 => 393,  990 => 392,  982 => 390,  974 => 388,  971 => 387,  967 => 386,  961 => 383,  954 => 378,  948 => 377,  940 => 375,  932 => 373,  929 => 372,  925 => 371,  919 => 368,  908 => 362,  903 => 360,  895 => 354,  890 => 353,  886 => 352,  883 => 351,  878 => 350,  874 => 349,  870 => 348,  864 => 345,  856 => 339,  851 => 338,  847 => 337,  844 => 336,  839 => 335,  835 => 334,  831 => 333,  825 => 330,  817 => 325,  804 => 317,  798 => 316,  792 => 315,  786 => 314,  780 => 313,  774 => 312,  768 => 311,  758 => 303,  753 => 302,  749 => 301,  743 => 300,  738 => 298,  731 => 293,  726 => 292,  722 => 291,  716 => 290,  711 => 288,  707 => 286,  701 => 282,  695 => 281,  687 => 279,  679 => 277,  676 => 276,  672 => 275,  668 => 274,  662 => 270,  660 => 269,  653 => 265,  643 => 258,  633 => 250,  628 => 249,  624 => 248,  621 => 247,  616 => 246,  612 => 245,  608 => 244,  597 => 236,  588 => 229,  583 => 228,  579 => 227,  576 => 226,  570 => 225,  562 => 223,  554 => 221,  551 => 220,  546 => 219,  540 => 217,  538 => 216,  532 => 213,  526 => 209,  520 => 207,  518 => 206,  512 => 205,  509 => 204,  501 => 201,  492 => 199,  487 => 198,  478 => 196,  473 => 195,  471 => 194,  467 => 192,  463 => 191,  457 => 188,  446 => 180,  441 => 178,  434 => 173,  428 => 172,  420 => 170,  412 => 168,  409 => 167,  405 => 166,  401 => 165,  390 => 156,  383 => 155,  376 => 154,  373 => 153,  366 => 152,  362 => 151,  356 => 150,  352 => 149,  346 => 146,  337 => 139,  332 => 138,  328 => 137,  325 => 136,  320 => 135,  316 => 134,  312 => 133,  306 => 130,  294 => 121,  289 => 119,  285 => 118,  281 => 117,  275 => 114,  269 => 110,  258 => 103,  250 => 97,  245 => 96,  241 => 95,  235 => 94,  230 => 92,  224 => 88,  219 => 87,  215 => 86,  209 => 85,  204 => 83,  199 => 80,  197 => 79,  193 => 77,  182 => 72,  170 => 65,  159 => 57,  150 => 51,  145 => 49,  136 => 45,  132 => 44,  127 => 42,  122 => 39,  120 => 38,  117 => 37,  115 => 36,  110 => 34,  106 => 32,  99 => 29,  95 => 28,  91 => 26,  84 => 23,  80 => 22,  72 => 16,  62 => 15,  56 => 14,  51 => 12,  44 => 10,  41 => 9,  36 => 8,  32 => 7,  26 => 3,  24 => 2,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }} */
/* {% set weight_value_row = 0 %}*/
/* <div id="content">*/
/* 	<div class="page-header">*/
/* 		<div class="container-fluid">*/
/* 			<div class="pull-right">*/
/* 				{% if (shipping_tk_speedy_logged and cities) %} */
/* 				<button type="submit" form="form-speedy" data-toggle="tooltip" title="{{ button_save }}" class="btn btn-primary"><i class="fa fa-save"></i></button>*/
/* 				{% endif %} */
/* 				<a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-default"><i class="fa fa-reply"></i></a>*/
/* 			</div>*/
/* 			<h1>{{ heading_title }}</h1>*/
/* 			<ul class="breadcrumb">*/
/* 				{% for breadcrumb in breadcrumbs %} */
/* 				<li><a href="{{ breadcrumb['href'] }}">{{ breadcrumb['text'] }}</a></li>*/
/* 				{% endfor %} */
/* 			</ul>*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="container-fluid">*/
/*  */
/* 		{% if (error_warning) %} */
/* 		<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> {{ error_warning }} */
/* 			<button type="button" class="close" data-dismiss="alert">&times;</button>*/
/* 		</div>*/
/* 		{% endif %} */
/*  */
/* 		{% if (success) %} */
/* 		<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> {{ success }} */
/* 			<button type="button" class="close" data-dismiss="alert">&times;</button>*/
/* 		</div>*/
/* 		{% endif %} */
/* 		*/
/* 		<form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-speedy" class="form-horizontal">*/
/*  			*/
/*  			{% if module_tk_checkout_token %}*/
/* 				*/
/* 			{% if shipping_tk_speedy_logged %}*/
/* 			<div class="panel panel-default">*/
/* 				<div class="panel-body">*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-3 control-label">{{ text_get_data_info }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<a id="get_data" onclick="if (!$(this).attr('disabled')) { refreshData(); } " class="btn btn-primary"><span id="get_data_text">{{ button_get_data }}</span></a>*/
/* 							<span id="data_error">{% if (error_get_data) %}{{ error_get_data }}{% endif %}</span>*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-3 control-label" for="shipping_tk_speedy_name">{{ entry_username }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input type="text" id="shipping_tk_speedy_name" value="{{ shipping_tk_speedy_username }}" readonly class="form-control" />*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-3 control-label"></label>*/
/* 						<div class="col-sm-9">*/
/* 							<a onclick="speedyButtonLogout();" class="btn btn-primary"><span>{{ entry_button_logout }}</span></a>*/
/* 						</div>*/
/* 					</div>*/
/* 					<hr>*/
/* 					*/
/* 					<div class="form-group">*/
/* 						<div class="col-sm-3 text-right"><p><b>Крон за ъпдейт на офиси:</b></p></div>*/
/* 						<div class="col-sm-9">*/
/* 							<p>/opt/cpanel/ea-php74/root/usr/bin/php {{ root }}catalog/controller/tk_checkout/cron_speedy.php {{ web_url }} > /dev/null 2>&1</p>*/
/* 						*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group">*/
/* 						<div class="col-sm-3 text-right"><p><b>Крон за ъпдейт на пратки:</b></p></div>*/
/* 						<div class="col-sm-9">*/
/* 							<p>/opt/cpanel/ea-php74/root/usr/bin/php {{ root }}catalog/controller/tk_checkout/cron_speedy_shipping.php {{ web_url }} > /dev/null 2>&1</p>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 			{% endif %} */
/* 					*/
/* 			{% if not shipping_tk_speedy_logged %}*/
/* 			<div class="panel panel-default">*/
/* 				<div class="panel-body">*/
/* 					<div class="form-group required">*/
/* 						<label class="col-sm-3 control-label" for="shipping_tk_speedy_username">{{ entry_username }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input type="text" id="shipping_tk_speedy_username" name="shipping_tk_speedy_username" value="{{ shipping_tk_speedy_username }}" placeholder="{{ shipping_tk_speedy_username }}" class="form-control" />*/
/* 							{% if (error_username) %} */
/* 							<span class="text-danger">{{ error_username }}</span>*/
/* 							{% endif %} */
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group required">*/
/* 						<label class="col-sm-3 control-label" for="shipping_tk_speedy_password">{{ entry_password }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input type="password" id="shipping_tk_speedy_password" name="shipping_tk_speedy_password" value="{{ shipping_tk_speedy_password }}" placeholder="{{ shipping_tk_speedy_password }}" class="form-control" />*/
/* 							{% if (error_password) %} */
/* 							<span class="text-danger">{{ error_password }}</span>*/
/* 							{% endif %} */
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-3 control-label"></label>*/
/* 						<div class="col-sm-9">*/
/* 							<a id="login_button" onclick="speedyButtonLogin();" class="btn btn-primary"><span id="login_text">{{ button_login }}</span></a>*/
/* 							<span id="login_error"></span>*/
/* 						</div>*/
/* 					</div>*/
/*  */
/* 				</div>*/
/* 			</div>*/
/* 			{% else %} */
/* 			<div class="panel panel-default">*/
/* 				<div class="panel-body" id="additional_table">*/
/* */
/* 					{% if (cities) %} */
/* 					*/
/* 					<ul class="nav nav-tabs">*/
/* 						<li class="active"><a href="#tab-general" data-toggle="tab">{{ entry_general_settings }}</a></li>*/
/* 						<li><a href="#tab-speedy_settings" data-toggle="tab">{{ text_tab_speedy_settings }}</a></li>*/
/* 						<li><a href="#tab-price" data-toggle="tab">{{ text_tab_price }}</a></li>*/
/* 						<li><a href="#tab-price_weight" data-toggle="tab">Ценообрзвуане спрямо килограми</a></li>*/
/* 						<li><a href="#tab-status" data-toggle="tab">{{ text_tab_status }}</a></li>*/
/* 						<li><a href="#tab-lang" data-toggle="tab">Текстове</a></li>*/
/* 					</ul>*/
/* 			          */
/* 					<div class="tab-content">*/
/* 			          */
/* 						<div class="tab-pane active" id="tab-general">*/
/*  */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_status">{{ entry_status }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_speedy_status" name="shipping_tk_speedy_status">*/
/* 										{% if (shipping_tk_speedy_status) %} */
/* 										<option value="1" selected="selected">{{ text_enabled }}</option>*/
/* 										<option value="0">{{ text_disabled }}</option>*/
/* 										{% else %} */
/* 										<option value="1">{{ text_enabled }}</option>*/
/* 										<option value="0" selected="selected">{{ text_disabled }}</option>*/
/* 										{% endif %} */
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* */
/*  */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_geo_zone_id">{{ entry_geo_zone }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_speedy_geo_zone_id" name="shipping_tk_speedy_geo_zone_id">*/
/* 										<option value="0">{{ text_all_zones }}</option>*/
/* 										{% for geo_zone in geo_zones %} */
/* 										{% if (geo_zone['geo_zone_id'] == shipping_tk_speedy_geo_zone_id) %} */
/* 										<option value="{{ geo_zone['geo_zone_id'] }}" selected="selected">{{ geo_zone['name'] }}</option>*/
/* 										{% else %} */
/* 										<option value="{{ geo_zone['geo_zone_id'] }}">{{ geo_zone['name'] }}</option>*/
/* 										{% endif %} */
/* 										{% endfor %} */
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-tax-class">Данъчен клас</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_speedy_tax_class_id" id="input-tax-class" class="form-control">*/
/* 										<option value="0">{{ text_none }}</option>*/
/* 										{% for tax_class in tax_classes %}*/
/* 											{% if tax_class.tax_class_id == shipping_tk_speedy_tax_class_id %}*/
/* 												<option value="{{ tax_class.tax_class_id }}" selected="selected">{{ tax_class.title }}</option>*/
/* 											{% else %}*/
/* 												<option value="{{ tax_class.tax_class_id }}">{{ tax_class.title }}</option>*/
/* 											{% endif %}*/
/* 										{% endfor %}*/
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/*  */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_sort_order">{{ entry_sort_order }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input class="form-control" type="text" id="shipping_tk_speedy_sort_order" name="shipping_tk_speedy_sort_order" value="{{ shipping_tk_speedy_sort_order }}" size="1" />*/
/* 								</div>*/
/* 							</div>*/
/* 						</div>*/
/* 						*/
/* 						<div class="tab-pane" id="tab-speedy_settings">*/
/* 												*/
/* 							<div class="form-group required">*/
/* 								<label class="col-sm-3 control-label">{{ entry_allowed_methods }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="well well-sm" style="height: 150px; overflow: auto;">*/
/* 										{% for service_id, service in services %}*/
/* 										<div class="checkbox">*/
/* 											<label>*/
/* 												{% if service_id in shipping_tk_speedy_allowed_methods %}*/
/* 												<input type="checkbox" name="shipping_tk_speedy_allowed_methods[]" value="{{ service_id }}" checked="checked" />*/
/* 												{{ service }} <i>({{ text_sevice_id }} {{ service_id }})</i>*/
/* 												{% else %}*/
/* 												<input type="checkbox" name="shipping_tk_speedy_allowed_methods[]" value="{{ service_id }}" />*/
/* 												{{ service }} <i>({{ text_sevice_id }} {{ service_id }})</i>*/
/* 												{% endif %}*/
/* 											</label>*/
/* 										</div>*/
/* 										{% endfor %}*/
/* 									</div>*/
/* 									<a onclick="$(this).parent().find(':checkbox').prop('checked', true);" style="cursor: pointer;">{{ text_select_all }}</a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);" style="cursor: pointer;">{{ text_unselect_all }}</a>*/
/* 									{% if error_allowed_methods %}*/
/* 									<div class="text-danger">{{ error_allowed_methods }}</div>*/
/* 									{% endif %}*/
/* 								</div>*/
/* 							</div>*/
/* 		*/
/* 							<div class="form-group required">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_client_id">{{ entry_client_id }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_speedy_client_id" id="speedy_client_id" class="form-control">*/
/* 										{% if clients|length > 1 or clients|length == 0 %}*/
/* 										<option value="0">{{ text_none }}</option>*/
/* 										{% endif %}*/
/* 										{% for client in clients %}*/
/* 										{% if client.clientId == shipping_tk_speedy_client_id %}*/
/* 										<option value="{{ client.clientId }}" selected="selected">{{ text_client_id|format(client.clientId, client.name, client.address) }}</option>*/
/* 										{% else %}*/
/* 										<option value="{{ client.clientId }}">{{ text_client_id|format(client.clientId, client.name, client.address) }}</option>*/
/* 										{% endif %}*/
/* 										{% endfor %}*/
/* 									</select>*/
/* 									{% if (error_client_id) %} */
/* 									<div class="text-danger">{{ error_client_id }}</div>*/
/* 									{% endif %} */
/* 								</div>*/
/* 							</div>*/
/* 					*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_special_delivery_requirement_id">Номер на допълнително споразумение при обслужване:</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_special_delivery_requirement_id" value="{{ shipping_tk_speedy_special_delivery_requirement_id }}" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_administrative_fee">Допълнителна административна такса:</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_speedy_administrative_fee" id="shipping_tk_speedy_administrative_fee" class="form-control">*/
/* 										{% if (shipping_tk_speedy_administrative_fee) %} */
/* 										<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 										<option value="0">{{ text_no }}</option>*/
/* 										{% else %} */
/* 										<option value="1">{{ text_yes }}</option>*/
/* 										<option value="0" selected="selected">{{ text_no }}</option>*/
/* 										{% endif %} */
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_discount_contract_id">Карта за отстъпка - договор:</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_discount_contract_id" value="{{ shipping_tk_speedy_discount_contract_id }}" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_discount_card_id">Карта за отстъпка - карта:</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_discount_card_id" value="{{ shipping_tk_speedy_discount_card_id }}" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							{% if custom_fields %}*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_speedy_company">Поле за име на фирма</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select name="shipping_tk_speedy_company" id="shipping_tk_speedy_company" class="form-control">*/
/* 											<option value="9999">{{ text_no_company}}</option>*/
/* 											{% for custom_field in custom_fields %}*/
/* 												{% if custom_field.custom_field_id == shipping_tk_speedy_company %}*/
/* 													<option value="{{ custom_field.custom_field_id }}" selected="selected">{{ custom_field.name }}</option>*/
/* 												{% else %}*/
/* 													<option value="{{ custom_field.custom_field_id }}">{{ custom_field.name }}</option>*/
/* 												{% endif %}*/
/* 											{% endfor %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 							{% endif %}*/
/* 					*/
/* 							<div class="form-group required">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_name">{{ entry_name }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_name" value="{{ shipping_tk_speedy_name }}" placeholder="{{ entry_name }}" id="shipping_tk_speedy_name" class="form-control" />*/
/* 									{% if (error_name) %} */
/* 									<div class="text-danger">{{ error_name }}</div>*/
/* 									{% endif %} */
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group required">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_telephone">{{ entry_telephone }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_telephone" value="{{ shipping_tk_speedy_telephone }}" placeholder="{{ entry_telephone }}" id="shipping_tk_speedy_telephone" class="form-control" />*/
/* 									{% if (error_telephone) %} */
/* 									<div class="text-danger">{{ error_telephone }}</div>*/
/* 									{% endif %} */
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_shipment_product_name">Името на продукта</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_speedy_shipment_product_name" name="shipping_tk_speedy_shipment_product_name">*/
/* 										<option value="0" {% if shipping_tk_speedy_shipment_product_name is not defined or shipping_tk_speedy_shipment_product_name == 0 %}selected="selected"{% endif %}>Не се използва</option>*/
/* 										<option value="1" {% if shipping_tk_speedy_shipment_product_name is defined and shipping_tk_speedy_shipment_product_name == 1 %}selected="selected"{% endif %}>В описанието на пратката - продукт и модел номер</option>*/
/* 										<option value="2" {% if shipping_tk_speedy_shipment_product_name is defined and shipping_tk_speedy_shipment_product_name == 2 %}selected="selected"{% endif %}>В описанието на пратката - продукт</option>*/
/* 										<option value="3" {% if shipping_tk_speedy_shipment_product_name is defined and shipping_tk_speedy_shipment_product_name == 3 %}selected="selected"{% endif %}>В описанието на пратката - модел номер</option>*/
/* 										<option value="4" {% if shipping_tk_speedy_shipment_product_name is defined and shipping_tk_speedy_shipment_product_name == 4 %}selected="selected"{% endif %}>В поле - Забележка (клиент) - продукт и модел номер</option>*/
/* 										<option value="5" {% if shipping_tk_speedy_shipment_product_name is defined and shipping_tk_speedy_shipment_product_name == 5 %}selected="selected"{% endif %}>В поле - Забележка (клиент) - продукт</option>*/
/* 										<option value="6" {% if shipping_tk_speedy_shipment_product_name is defined and shipping_tk_speedy_shipment_product_name == 6 %}selected="selected"{% endif %}>В поле - Забележка (клиент) - модел номер</option>*/
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-shipping_tk_speedy_shipment_description">Описание на пратката</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_shipment_description" value="{{ shipping_tk_speedy_shipment_description }}" placeholder="Описание на пратката" id="input-shipping_tk_speedy_shipment_description" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_back_documents">{{ entry_back_documents }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_speedy_back_documents" id="shipping_tk_speedy_back_documents" class="form-control">*/
/* 										{% if (shipping_tk_speedy_back_documents) %} */
/* 										<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 										<option value="0">{{ text_no }}</option>*/
/* 										{% else %} */
/* 										<option value="1">{{ text_yes }}</option>*/
/* 										<option value="0" selected="selected">{{ text_no }}</option>*/
/* 										{% endif %} */
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_back_receipt">{{ entry_back_receipt }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_speedy_back_receipt" id="shipping_tk_speedy_back_receipt" class="form-control">*/
/* 										{% if (shipping_tk_speedy_back_receipt) %} */
/* 										<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 										<option value="0">{{ text_no }}</option>*/
/* 										{% else %} */
/* 										<option value="1">{{ text_yes }}</option>*/
/* 										<option value="0" selected="selected">{{ text_no }}</option>*/
/* 										{% endif %} */
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_packing">{{ entry_packing }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_packing" value="{{ shipping_tk_speedy_packing }}" placeholder="{{ entry_packing }}" id="shipping_tk_speedy_packing" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 							<div class="speedy-group">*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_speedy_option_before_payment">{{ entry_options_before_payment }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select name="shipping_tk_speedy_option_before_payment" id="shipping_tk_speedy_option_before_payment" class="form-control">*/
/* 											{% for option_id, option in options_before_payment %}*/
/* 											{% if option_id == shipping_tk_speedy_option_before_payment %}*/
/* 											<option value="{{ option_id }}" selected="selected">{{ option }}</option>*/
/* 											{% else %}*/
/* 											<option value="{{ option_id }}">{{ option }}</option>*/
/* 											{% endif %}*/
/* 											{% endfor %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* */
/* 								<div class="form-group" >*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_speedy_return_payer_type">{{ entry_return_payer_type }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select name="shipping_tk_speedy_return_payer_type" id="shipping_tk_speedy_return_payer_type" class="form-control">*/
/* 											{% for option_id, option in return_payer_types %}*/
/* 											{% if option_id == shipping_tk_speedy_return_payer_type %}*/
/* 											<option value="{{ option_id }}" selected="selected">{{ option }}</option>*/
/* 											{% else %}*/
/* 											<option value="{{ option_id }}">{{ option }}</option>*/
/* 											{% endif %}*/
/* 											{% endfor %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 								<div class="form-group" >*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_speedy_return_package_city_service_id">{{ entry_return_package_city_service_id }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select name="shipping_tk_speedy_return_package_city_service_id" id="shipping_tk_speedy_return_package_city_service_id" class="form-control">*/
/* 											{% for service_id,service in services %} */
/* 											{% if (service_id == shipping_tk_speedy_return_package_city_service_id) %} */
/* 											<option value="{{ service_id }}" selected="selected">{{ service }}</option>*/
/* 											{% else %} */
/* 											<option value="{{ service_id }}">{{ service }}</option>*/
/* 											{% endif %} */
/* 											{% endfor %} */
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 								<div class="form-group" >*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_speedy_return_package_intercity_service_id">{{ entry_return_package_intercity_service_id }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select name="shipping_tk_speedy_return_package_intercity_service_id" id="shipping_tk_speedy_return_package_intercity_service_id" class="form-control">*/
/* 											{% for service_id,service in services %} */
/* 											{% if (service_id == shipping_tk_speedy_return_package_intercity_service_id) %} */
/* 											<option value="{{ service_id }}" selected="selected">{{ service }}</option>*/
/* 											{% else %} */
/* 											<option value="{{ service_id }}">{{ service }}</option>*/
/* 											{% endif %} */
/* 											{% endfor %} */
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_label_printer">{{ entry_label_printer }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_speedy_label_printer" id="shipping_tk_speedy_label_printer" class="form-control">*/
/* 										{% if (shipping_tk_speedy_label_printer) %} */
/* 										<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 										<option value="0">{{ text_no }}</option>*/
/* 										{% else %} */
/* 										<option value="1">{{ text_yes }}</option>*/
/* 										<option value="0" selected="selected">{{ text_no }}</option>*/
/* 										{% endif %} */
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_weight_type">Мерна единица</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_speedy_weight_type" name="shipping_tk_speedy_weight_type">*/
/* 										<option value="kilogram" {% if shipping_tk_speedy_weight_type == 'kilogram' %}selected="selected"{% endif %}>Килограм</option>*/
/* 										<option value="gram" {% if shipping_tk_speedy_weight_type == 'gram' %}selected="selected"{% endif %}>Грам</option>*/
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-weight-total">{{ entry_weight_total }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_weight_total" value="{{ shipping_tk_speedy_weight_total }}" placeholder="{{ entry_weight_total }}" id="input-weight-total" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 					*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_machine_enabled">Да се включат ли доставки до Автомат на Спиди</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-2">*/
/* 											<select class="form-control" id="shipping_tk_speedy_machine_enabled" name="shipping_tk_speedy_machine_enabled">*/
/* 												{% if shipping_tk_speedy_machine_enabled %}*/
/* 												<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 												<option value="0">{{ text_no }}</option>*/
/* 												{% else %}*/
/* 												<option value="1">{{ text_yes }}</option>*/
/* 												<option value="0" selected="selected">{{ text_no }}</option>*/
/* 												{% endif %}*/
/* 											</select>*/
/* 										</div>*/
/* 									*/
/* 										<label class="col-sm-2 control-label" for="shipping_tk_speedy_machine_sort">Подредба</label>*/
/* 										<div class="col-sm-3">*/
/* 											<input type="text" name="shipping_tk_speedy_machine_sort" value="{{ shipping_tk_speedy_machine_sort }}" placeholder="Подредба" id="shipping_tk_speedy_machine_sort" class="form-control" />*/
/* 										</div>*/
/* 										*/
/* 										<label class="col-sm-2 control-label" for="shipping_tk_speedy_machine_weight">До кг.</label>*/
/* 										<div class="col-sm-3">*/
/* 											<input type="text" name="shipping_tk_speedy_machine_weight" value="{{ shipping_tk_speedy_machine_weight }}" placeholder="До кг." id="shipping_tk_speedy_machine_weight" class="form-control" />*/
/* 										</div>*/
/* 										*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_office_enabled">Да се включат ли доставки до Офис на Спиди</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-2">*/
/* 											<select class="form-control" id="shipping_tk_speedy_office_enabled" name="shipping_tk_speedy_office_enabled">*/
/* 												{% if shipping_tk_speedy_office_enabled %}*/
/* 												<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 												<option value="0">{{ text_no }}</option>*/
/* 												{% else %}*/
/* 												<option value="1">{{ text_yes }}</option>*/
/* 												<option value="0" selected="selected">{{ text_no }}</option>*/
/* 												{% endif %}*/
/* 											</select>*/
/* 										</div>*/
/* 									*/
/* 										<label class="col-sm-2 control-label" for="shipping_tk_speedy_office_sort">Подредба</label>*/
/* 										<div class="col-sm-3">*/
/* 											<input type="text" name="shipping_tk_speedy_office_sort" value="{{ shipping_tk_speedy_office_sort }}" placeholder="Подредба" id="shipping_tk_speedy_office_sort" class="form-control" />*/
/* 										</div>*/
/* 										*/
/* 										<label class="col-sm-2 control-label" for="shipping_tk_speedy_office_weight">До кг.</label>*/
/* 										<div class="col-sm-3">*/
/* 											<input type="text" name="shipping_tk_speedy_office_weight" value="{{ shipping_tk_speedy_office_weight }}" placeholder="До кг." id="shipping_tk_speedy_office_weight" class="form-control" />*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/*  */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_address_enabled">Да се включат ли доставки до Адрес със Спиди</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-2">*/
/* 											<select class="form-control" id="shipping_tk_speedy_address_enabled" name="shipping_tk_speedy_address_enabled">*/
/* 												{% if shipping_tk_speedy_address_enabled %}*/
/* 												<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 												<option value="0">{{ text_no }}</option>*/
/* 												{% else %}*/
/* 												<option value="1">{{ text_yes }}</option>*/
/* 												<option value="0" selected="selected">{{ text_no }}</option>*/
/* 												{% endif %}*/
/* 											</select>*/
/* 										</div>*/
/* 									*/
/* 										<label class="col-sm-2 control-label" for="shipping_tk_speedy_address_sort">Подредба</label>*/
/* 										<div class="col-sm-3">*/
/* 											<input type="text" name="shipping_tk_speedy_address_sort" value="{{ shipping_tk_speedy_address_sort }}" placeholder="Подредба" id="shipping_tk_speedy_address_sort" class="form-control" />*/
/* 										</div>*/
/* 										<label class="col-sm-2 control-label" for="shipping_tk_speedy_address_weight">До кг.</label>*/
/* 										<div class="col-sm-3">*/
/* 											<input type="text" name="shipping_tk_speedy_address_weight" value="{{ shipping_tk_speedy_address_weight }}" placeholder="До кг." id="shipping_tk_speedy_address_weight" class="form-control" />*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 						</div>*/
/* 					*/
/* 						<div class="tab-pane" id="tab-price">*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_os_enabled">Ще се изплащат ли сумите като паричен превод?</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_speedy_ppp_enabled" name="shipping_tk_speedy_ppp_enabled">*/
/* 										{% if (shipping_tk_speedy_ppp_enabled) %} */
/* 										<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 										<option value="0">{{ text_no }}</option>*/
/* 										{% else %} */
/* 										<option value="1">{{ text_yes }}</option>*/
/* 										<option value="0" selected="selected">{{ text_no }}</option>*/
/* 										{% endif %} */
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 	*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-fixed-cost">Надбавка за обработка:</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_calculator_fixed" value="{{ shipping_tk_speedy_calculator_fixed }}" placeholder="Надбавка за обработка" id="input-fixed-cost" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-fixed-cost">Минимална такса ППП (0.60 в лева с ДДС):</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_ppp_min" value="{{ shipping_tk_speedy_ppp_min }}" placeholder="Минимална такса ППП" id="input-fixed-cost" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-fixed-cost">Такса ППП (1.6 в %):</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_ppp_tax" value="{{ shipping_tk_speedy_ppp_tax }}" placeholder="Такса ППП" id="input-fixed-cost" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 		*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_payer_type">Платец на куриерската услуга</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_speedy_payer_type" id="shipping_tk_speedy_payer_type" class="form-control">*/
/* 										{% for option_id, option in return_payer_types %}*/
/* 											{% if option_id == shipping_tk_speedy_payer_type %}*/
/* 												<option value="{{ option_id }}" selected="selected">{{ option }}</option>*/
/* 											{% else %}*/
/* 												<option value="{{ option_id }}">{{ option }}</option>*/
/* 											{% endif %}*/
/* 										{% endfor %}*/
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-shipping_tk_speedy_machine_free">Сума за безплатна доставка до автомат</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-4">*/
/* 											<input type="text" name="shipping_tk_speedy_machine_free" value="{{ shipping_tk_speedy_machine_free }}" placeholder="Сума за безплатна доставка до Спиди автомат" id="input-shipping_tk_speedy_machine_free" class="form-control" />*/
/* 										</div>*/
/* 									*/
/* 										<label class="col-sm-4 control-label" for="input-shipping_tk_speedy_machine_free_weight">Тегло за безплатна доставка до автомат</label>*/
/* 										<div class="col-sm-4">*/
/* 											<input type="text" name="shipping_tk_speedy_machine_free_weight" value="{{ shipping_tk_speedy_machine_free_weight }}" placeholder="Тегло" id="input-shipping_tk_speedy_machine_free_weight" class="form-control" />*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-shipping_tk_speedy_office_free">{{ entry_office_cost }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-4">*/
/* 											<input type="text" name="shipping_tk_speedy_office_free" value="{{ shipping_tk_speedy_office_free }}" placeholder="{{ entry_office_cost }}" id="input-shipping_tk_speedy_office_free" class="form-control" />*/
/* 										</div>*/
/* 									*/
/* 										<label class="col-sm-4 control-label" for="input-shipping_tk_speedy_office_free_weight">Тегло за безплатна доставка до офис</label>*/
/* 										<div class="col-sm-4">*/
/* 											<input type="text" name="shipping_tk_speedy_office_free_weight" value="{{ shipping_tk_speedy_office_free_weight }}" placeholder="Тегло" id="input-shipping_tk_speedy_office_free_weight" class="form-control" />*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-shipping_tk_speedy_door_free">{{ entry_door_cost }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-4">*/
/* 											<input type="text" name="shipping_tk_speedy_door_free" value="{{ shipping_tk_speedy_door_free }}" placeholder="{{ entry_door_cost }}" id="input-shipping_tk_speedy_door_free" class="form-control" />*/
/* 										</div>*/
/* 									*/
/* 										<label class="col-sm-4 control-label" for="input-shipping_tk_speedy_door_free_weight">Тегло за безплатна доставка до адрес</label>*/
/* 										<div class="col-sm-4">*/
/* 											<input type="text" name="shipping_tk_speedy_door_free_weight" value="{{ shipping_tk_speedy_door_free_weight }}" placeholder="Тегло" id="input-shipping_tk_speedy_door_free_weight" class="form-control" />*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label"><span data-toggle="tooltip" title="Избери списък със суми които да се пресмятат за сума която трябва да се достигне преди да се активира отстъпката.">Избери суми</span></label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="well well-sm" style="height: 180px; overflow: auto;" id="totals">*/
/* 										{% for total in oc_totals %}*/
/* 										<div class="checkbox col-sm-4"><label><input type="checkbox" name="shipping_tk_speedy_totals[]" value="{{ total.code }}" {% if total.code in shipping_tk_speedy_totals %}checked="checked"{% endif %} />{{ total.name }}</label></div>*/
/* 										{% endfor %}*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-fixed-cost">Твърда сума за доставка до автомат</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_machine_fixed_cost" value="{{ shipping_tk_speedy_machine_fixed_cost }}" placeholder="Твърда сума за доставка до автомат" id="input-fixed-cost" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 				*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-fixed-cost">{{ entry_office_fixed_cost }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_office_fixed_cost" value="{{ shipping_tk_speedy_office_fixed_cost }}" placeholder="{{ entry_office_fixed_cost }}" id="input-fixed-cost" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/*  */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-fixed-cost">{{ entry_door_fixed_cost }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_speedy_door_fixed_cost" value="{{ shipping_tk_speedy_door_fixed_cost }}" placeholder="{{ entry_door_fixed_cost }}" id="input-fixed-cost" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 	*/
/* 							<div id="calculate_settings" >*/
/* 					*/
/* 								<div class="form-group">*/
/* 									<div class="col-sm-3 text-right"></div>*/
/* 									<div class="col-sm-9">*/
/* 										<br><br><h4><b>{{ entry_price_auto_settings }}</b></h4>*/
/* 									</div>*/
/* 								</div>*/
/* 								*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_speedy_calculate_enabled">{{ entry_calculate_enabled }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select class="form-control" id="shipping_tk_speedy_calculate_enabled" name="shipping_tk_speedy_calculate_enabled">*/
/* 											{% if (shipping_tk_speedy_calculate_enabled) %} */
/* 											<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% else %} */
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											{% endif %} */
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 						*/
/* 								<div class="speedy-group">*/
/* 							*/
/* 									<div class="form-group">*/
/* 										<label class="col-sm-3 control-label" for="shipping_tk_speedy_from_office"><span data-toggle="tooltip" title="{{ help_from_office }}">{{ entry_from_office }}</span></label>*/
/* 										<div class="col-sm-9">*/
/* 											<select name="shipping_tk_speedy_from_office" id="shipping_tk_speedy_from_office" class="form-control" >*/
/* 												{% if (shipping_tk_speedy_from_office) %} */
/* 												<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 												<option value="0">{{ text_no }}</option>*/
/* 												{% else %} */
/* 												<option value="1">{{ text_yes }}</option>*/
/* 												<option value="0" selected="selected">{{ text_no }}</option>*/
/* 												{% endif %} */
/* 											</select>*/
/* 										</div>*/
/* 									</div>*/
/* 								*/
/* 									<div class="form-group" >*/
/* 										<label class="col-sm-3 control-label" for="shipping_tk_speedy_office_id">{{ entry_office }}</label>*/
/* 										<div class="col-sm-9">*/
/* 											<select name="shipping_tk_speedy_office_id" id="shipping_tk_speedy_office_id" class="form-control">*/
/* 												{% for office in offices %} */
/* 												{% if (office['id'] == shipping_tk_speedy_office_id) %} */
/* 												<option value="{{ office['id'] }}" selected="selected">{{ office['label'] }}</option>*/
/* 												{% else %} */
/* 												<option value="{{ office['id'] }}">{{ office['label'] }}</option>*/
/* 												{% endif %} */
/* 												{% endfor %} */
/* 											</select>*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/*  */
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_speedy_np_enabled">{{ entry_np }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select class="form-control" id="shipping_tk_speedy_np_enabled" name="shipping_tk_speedy_np_enabled">*/
/* 											{% if (shipping_tk_speedy_np_enabled) %} */
/* 											<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% else %} */
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											{% endif %} */
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 						*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_speedy_os_enabled">{{ entry_os }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select class="form-control" id="shipping_tk_speedy_os_enabled" name="shipping_tk_speedy_os_enabled">*/
/* 											{% if (shipping_tk_speedy_os_enabled) %} */
/* 											<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% else %} */
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											{% endif %} */
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 						*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_speedy_os_enabled">{{ entry_fragile }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select class="form-control" id="shipping_tk_speedy_fragile_enabled" name="shipping_tk_speedy_fragile_enabled">*/
/* 											{% if (shipping_tk_speedy_fragile_enabled) %} */
/* 											<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% else %} */
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											{% endif %} */
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 								*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<div class="col-sm-3 text-right"></div>*/
/* 								<div class="col-sm-9">*/
/* 									<br><br><h4><b>Избор на офис за всеки клиентски номер</b></h4>*/
/* 								</div>*/
/* 							</div>*/
/* 								*/
/* 									*/
/* 							{% for client in clients %}*/
/* 							<br>*/
/* 							<hr>*/
/* 							<div class="form-group">*/
/* 								<div class="col-sm-3 text-right"></div>*/
/* 								<div class="col-sm-9">*/
/* 									<p><b>{{ text_client_id|format(client.clientId, client.name, client.address) }}</b></p>*/
/* 								</div>*/
/* 							</div>*/
/* 							<div class="speedy-group">*/
/* 										*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_speedy_from_offices_{{ client.clientId }}">*/
/* 										{{ entry_from_office }}*/
/* 									</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select name="shipping_tk_speedy_from_offices[{{ client.clientId }}]" id="shipping_tk_speedy_from_offices_{{ client.clientId }}" class="form-control" >*/
/* 											{% if shipping_tk_speedy_from_offices[client.clientId] %}*/
/* 											<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% else %} */
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											{% endif %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 								*/
/* 								<div class="form-group" >*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_speedy_offices_id_{{ client.clientId }}">{{ entry_office }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select name="shipping_tk_speedy_offices_id[{{ client.clientId }}]" id="shipping_tk_speedy_offices_id_{{ client.clientId }}" class="form-control">*/
/* 											{% for office in offices %}*/
/* 											{% if office.id == shipping_tk_speedy_offices_id[client['clientId']] %}*/
/* 											<option value="{{ office['id'] }}" selected="selected">{{ office['label'] }}</option>*/
/* 											{% else %} */
/* 											<option value="{{ office['id'] }}">{{ office['label'] }}</option>*/
/* 											{% endif %}*/
/* 											{% endfor %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 								*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" >{{ entry_telephone }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<input type="text" name="shipping_tk_speedy_telephone_client[{{ client.clientId }}]" value="{{ shipping_tk_speedy_telephone_client[client['clientId']] }}" placeholder="{{ entry_telephone }}" class="form-control" />*/
/* 									</div>*/
/* 								</div>*/
/* 								*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" >{{ entry_name }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<input type="text" name="shipping_tk_speedy_name_client[{{ client.clientId }}]" value="{{ shipping_tk_speedy_name_client[client['clientId']] }}" placeholder="{{ entry_name }}" class="form-control" />*/
/* 									</div>*/
/* 								</div>*/
/* 								*/
/* 							</div>*/
/* 							{% endfor %}*/
/* 							*/
/* 						</div>*/
/* 					*/
/* 						<div class="tab-pane" id="tab-status">*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_speedy_order_status_id">Статус на поръчката след генериране на товарителница:</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_speedy_order_status_id" id="shipping_tk_speedy_order_status_id" class="form-control">*/
/* 										<option value="0">Без смяна на статуса</option>*/
/* 										{% for order_status in order_statuses %} */
/* 								*/
/* 										{% if (order_status['order_status_id'] == shipping_tk_speedy_order_status_id) %} */
/* 										<option value="{{ order_status['order_status_id'] }}" selected="selected">{{ order_status['name'] }}</option>*/
/* 										{% else %} */
/* 										<option value="{{ order_status['order_status_id'] }}">{{ order_status['name'] }}</option>*/
/* 										{% endif %} */
/* 										{% endfor %} */
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-shipping_tk_speedy_order_status_id_mail">Да се пратили и-меил след генериране на товарителница:</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_speedy_order_status_id_mail" id="input-shipping_tk_speedy_order_status_id_mail" class="form-control">*/
/* 										{% if  shipping_tk_speedy_order_status_id_mail %} */
/* 										<option value="0">{{ entry_no }}</option>*/
/* 										<option value="1" selected="selected">{{ entry_yes }}</option>*/
/* 										{% else %} */
/* 										<option value="0" selected="selected">{{ entry_no }}</option>*/
/* 										<option value="1">{{ entry_yes }}</option>*/
/* 										{% endif %} */
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-shipping_tk_speedy_order_status_id_mail_text">Текст към и-меила след генериране на товарителница<br> ({shipment_number} - заменя номера на товарителница в текста):</label>*/
/* 								<div class="col-sm-9">*/
/* 									<textarea name="shipping_tk_speedy_order_status_id_mail_text" rows="3" placeholder="Въведи текст" id="input-shipping_tk_speedy_order_status_id_mail_text" class="form-control">{{ shipping_tk_speedy_order_status_id_mail_text }}</textarea>*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 							<div class="form-group">*/
/* 								<div class="col-sm-3 text-right"></div>*/
/* 								<div class="col-sm-9">*/
/* 									<br><br><h4><b>Синхронизиране на статуси между Speedy и Opencart и изпращане на и-мейл до клиента</b></h4>*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 							{% for key,text_status in text_statuses %}*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label">{{ text_status }}</label>*/
/* 							*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-3">Избери статус за синхронизиране</div>*/
/* 										<div class="col-sm-3">*/
/* 											<select name="shipping_tk_speedy_order_status[{{ key }}]" id="input-shipping_tk_speedy_order_status" class="form-control">*/
/* 												<option value="">Без смяна на статуса</option>*/
/* 												{% for order_status in order_statuses %}*/
/* 												{% if  shipping_tk_speedy_order_status[key] == order_status.order_status_id %} */
/* 												<option value="{{ order_status.order_status_id }}" selected="selected">{{ order_status.name }}</option>*/
/* 												{% else %} */
/* 												<option value="{{ order_status.order_status_id }}">{{ order_status.name }}</option>*/
/* 												{% endif %} */
/* 												{% endfor %} */
/* 											</select>*/
/* 										</div>*/
/* 										<div class="col-sm-3">Да се изпратили и-мейл до клиента</div>*/
/* 										<div class="col-sm-3">*/
/* 											<select name="shipping_tk_speedy_order_status_mail[{{ key }}]" id="input-shipping_tk_speedy_order_status_mail" class="form-control">*/
/* 												{% if  shipping_tk_speedy_order_status_mail[key] %} */
/* 												<option value="0">{{ entry_no }}</option>*/
/* 												<option value="1" selected="selected">{{ entry_yes }}</option>*/
/* 												{% else %} */
/* 												<option value="0" selected="selected">{{ entry_no }}</option>*/
/* 												<option value="1">{{ entry_yes }}</option>*/
/* 												{% endif %} */
/* 											</select>*/
/* 										</div>*/
/* 										<div class="clearfix"></div>*/
/* 										<br>*/
/* 									*/
/* 										<div class="col-sm-3">Допълнителен текст към и-меила</div>*/
/* 										<div class="col-sm-9">*/
/* 											<textarea name="shipping_tk_speedy_order_status_mail_text[{{ key }}]" rows="3" placeholder="Въведи текст" id="input-shipping_tk_speedy_order_status_mail_text" class="form-control">{{ shipping_tk_speedy_order_status_mail_text[key] }}</textarea>*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 							{% endfor %} */
/* 					*/
/* 						</div>*/
/* 						*/
/* 						<div class="tab-pane" id="tab-price_weight">*/
/* 						*/
/* 							<table id="weight-value" class="table table-striped table-bordered table-hover">*/
/* 								<thead>*/
/* 									<tr>*/
/* 										<td class="text-left required">Килограми - От</td>*/
/* 										<td class="text-left required">Килограми - До (включително)</td>*/
/* 										<td class="text-left required">Твърда цена</td>*/
/* 										<td class="text-left required">Вид доставка</td>*/
/* 										<td></td>*/
/* 									</tr>*/
/* 								</thead>*/
/* 								<tbody>*/
/*               */
/* 									*/
/* 									{% for weight_value in shipping_tk_speedy_weight_value %}*/
/* 									<tr id="weight-value-row{{ weight_value_row }}">*/
/* 										<td class="text-right"><input type="text" name="shipping_tk_speedy_weight_value[{{ weight_value_row }}][from]" value="{{ weight_value.from }}" class="form-control" /></td>*/
/* 										<td class="text-right"><input type="text" name="shipping_tk_speedy_weight_value[{{ weight_value_row }}][to]" value="{{ weight_value.to }}" class="form-control" /></td>*/
/* 										<td class="text-right"><input type="text" name="shipping_tk_speedy_weight_value[{{ weight_value_row }}][price]" value="{{ weight_value.price }}" class="form-control" /></td>*/
/* 										*/
/* 										<td class="text-right">*/
/* 											<select class="form-control" name="shipping_tk_speedy_weight_value[{{ weight_value_row }}][type]">*/
/* 												<option value="machine" {% if  weight_value.type == 'machine' %}selected="selected"{% endif %}>До автомат</option>*/
/* 												<option value="office" {% if  weight_value.type == 'office' %}selected="selected"{% endif %}>До офис</option>*/
/* 												<option value="door" {% if  weight_value.type == 'door' %}selected="selected"{% endif %}>До адрес</option>*/
/* 											</select>*/
/* 										</td>*/
/* 										<td class="text-right"><button type="button" onclick="$('#weight-value-row{{ weight_value_row }}').remove();" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>*/
/* 										*/
/* 										*/
/* 									</tr>*/
/* 									{% set weight_value_row = weight_value_row + 1 %}*/
/* 									{% endfor %}*/
/* 								</tbody>*/
/*               */
/* 								<tfoot>*/
/* 									<tr>*/
/* 										<td colspan="4"></td>*/
/* 										<td class="text-right"><button type="button" onclick="addWeightValue();" data-toggle="tooltip" title="{{ button_weight_value_add }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>*/
/* 									</tr>*/
/* 								</tfoot>*/
/* 							</table>*/
/* 						*/
/* 						</div>*/
/* 						*/
/* 						<div class="tab-pane" id="tab-lang">*/
/* 							*/
/* 							<div class="form-group row">*/
/* 								<label class="col-sm-3 control-label">Автомат - заглавие</label>*/
/* 								<div class="col-sm-9">*/
/* 									{% for language in languages %}*/
/* 										<div class="input-group" style="margin-bottom: 5px">*/
/* 											<span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>*/
/* 											<input type="text" name="shipping_tk_speedy_text[{{ language.language_id }}][machine_title]" value="{{ shipping_tk_speedy_text[language.language_id].machine_title ? shipping_tk_speedy_text[language.language_id].machine_title : '' }}" class="form-control" />*/
/* 										</div>*/
/* 									{% endfor %}*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group row">*/
/* 								<label class="col-sm-3 control-label">Автомат - текст</label>*/
/* 								<div class="col-sm-9">*/
/* 									{% for language in languages %}*/
/* 										<div class="input-group" style="margin-bottom: 5px">*/
/* 											<span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>*/
/* 											<input type="text" name="shipping_tk_speedy_text[{{ language.language_id }}][machine_text]" value="{{ shipping_tk_speedy_text[language.language_id].machine_text ? shipping_tk_speedy_text[language.language_id].machine_text : '' }}" class="form-control" />*/
/* 										</div>*/
/* 									{% endfor %}*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group row">*/
/* 								<label class="col-sm-3 control-label">Офис - заглавие</label>*/
/* 								<div class="col-sm-9">*/
/* 									{% for language in languages %}*/
/* 										<div class="input-group" style="margin-bottom: 5px">*/
/* 											<span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>*/
/* 											<input type="text" name="shipping_tk_speedy_text[{{ language.language_id }}][office_title]" value="{{ shipping_tk_speedy_text[language.language_id].office_title ? shipping_tk_speedy_text[language.language_id].office_title : '' }}" class="form-control" />*/
/* 										</div>*/
/* 									{% endfor %}*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group row">*/
/* 								<label class="col-sm-3 control-label">Офис - текст</label>*/
/* 								<div class="col-sm-9">*/
/* 									{% for language in languages %}*/
/* 										<div class="input-group" style="margin-bottom: 5px">*/
/* 											<span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>*/
/* 											<input type="text" name="shipping_tk_speedy_text[{{ language.language_id }}][office_text]" value="{{ shipping_tk_speedy_text[language.language_id].office_text ? shipping_tk_speedy_text[language.language_id].office_text : '' }}" class="form-control" />*/
/* 										</div>*/
/* 									{% endfor %}*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group row">*/
/* 								<label class="col-sm-3 control-label">Адрес - заглавие</label>*/
/* 								<div class="col-sm-9">*/
/* 									{% for language in languages %}*/
/* 										<div class="input-group" style="margin-bottom: 5px">*/
/* 											<span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>*/
/* 											<input type="text" name="shipping_tk_speedy_text[{{ language.language_id }}][address_title]" value="{{ shipping_tk_speedy_text[language.language_id].address_title ? shipping_tk_speedy_text[language.language_id].address_title : '' }}" class="form-control" />*/
/* 										</div>*/
/* 									{% endfor %}*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group row">*/
/* 								<label class="col-sm-3 control-label">Адрес - текст</label>*/
/* 								<div class="col-sm-9">*/
/* 									{% for language in languages %}*/
/* 										<div class="input-group" style="margin-bottom: 5px">*/
/* 											<span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>*/
/* 											<input type="text" name="shipping_tk_speedy_text[{{ language.language_id }}][address_text]" value="{{ shipping_tk_speedy_text[language.language_id].address_text ? shipping_tk_speedy_text[language.language_id].address_text : '' }}" class="form-control" />*/
/* 										</div>*/
/* 									{% endfor %}*/
/* 								</div>*/
/* 							</div>*/
/* 						*/
/* 						</div>*/
/* 						*/
/* 					</div>*/
/* */
/* 					{% else %} */
/* 					<div class="panel-body">*/
/* 						<div class="form-group">*/
/* 							<div class="col-sm-3"></div>*/
/* 							<div class="col-sm-9">*/
/* 								<b>{{ text_sync_info_warning }}</b>*/
/* 							</div>*/
/* 						</div>*/
/* 					</div>*/
/* 					{% endif %} */
/* 				</div>*/
/* 			</div>*/
/* 			{% endif %} */
/* 			*/
/* 			{% else %} */
/* 			*/
/* 			<div class="panel panel-default">*/
/* 				<div class="panel-body">*/
/* 				<h3>Трябва да активирате модула TK Checkout за да позлвате Доставка със Спиди</h3>*/
/* 				</div>*/
/* 			</div>	*/
/* 			*/
/* 			{% endif %} */
/* 		</form>*/
/* 		*/
/* 	</div>*/
/* </div>*/
/* */
/* <script type="text/javascript">*/
/* */
/* var weight_value_row = {{ weight_value_row}};*/
/* */
/* function addWeightValue() {*/
/* 	html  = '<tr id="weight-value-row' + weight_value_row + '">';*/
/* 	html += '  <td class="text-right"><input type="text" name="shipping_tk_speedy_weight_value[' + weight_value_row + '][from]" value="" placeholder="0.00" class="form-control" /></td>';*/
/* 	html += '  <td class="text-right"><input type="text" name="shipping_tk_speedy_weight_value[' + weight_value_row + '][to]" value="" placeholder="0.00" class="form-control" /></td>';*/
/* 	html += '  <td class="text-right"><input type="text" name="shipping_tk_speedy_weight_value[' + weight_value_row + '][price]" value="" placeholder="0.00" class="form-control" /></td>';*/
/* 	html += '  <td class="text-right"><select class="form-control" name="shipping_tk_speedy_weight_value[' + weight_value_row + '][type]"><option value="machine">До автомат</option><option value="office">До офис</option><option value="door">До адрес</option></select></td>';*/
/* 	html += '  <td class="text-right"><button type="button" onclick="$(\'#weight-value-row' + weight_value_row + '\').remove();" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';*/
/* 	html += '</tr>';*/
/* */
/* 	$('#weight-value tbody').append(html);*/
/* */
/* 	weight_value_row++;*/
/* }*/
/* */
/* function speedyButtonLogin() { */
/* 	$('#loading').remove();*/
/* 	$('#login_error').html('').removeClass("text-danger");*/
/* 	$('#login_button').after('<span id="loading" class="attention" style="padding: 5px;">Моля, изчакайте.</span>');*/
/* */
/* 	$.ajax( { */
/* 			url: 'index.php?route=extension/shipping/tk_speedy/login&user_token={{ user_token }}',*/
/* 			type: 'POST',*/
/* 			data: 'username=' + encodeURIComponent($('#shipping_tk_speedy_username').val()) + '&password=' + encodeURIComponent($('#shipping_tk_speedy_password').val()) + '&test=' + encodeURIComponent($('#shipping_tk_speedy_test').val()),*/
/* 			dataType: 'json',*/
/* 			success: function(data) { */
/* 				if (data) { */
/* 					$('#loading').remove();*/
/* */
/* 					if (data.success) { */
/* 						window.location = window.location;*/
/* 					} else { */
/* 						$('#login_error').html(data.message).addClass('text-danger');*/
/* 					} */
/* 				} */
/* 			} ,*/
/* 			error: function(request) { */
/* 				$('#loading').remove();*/
/* */
/* 				$('#login_error').html('{{ error_general }}').addClass("text-danger");*/
/* 			} */
/* 		});*/
/* } */
/* */
/* function refreshData() { */
/* 	$('#data_error').html('').removeClass("text-danger");*/
/* 	$('#get_data').attr('disabled', true);*/
/* 	$('#get_data').after('<span id="loading" class="attention" style="padding: 5px;">{{ text_get_data }}</span>');*/
/* */
/* */
/* 	$.ajax( { */
/* 			url: 'index.php?route=extension/shipping/tk_speedy/update&user_token={{ user_token }}',*/
/* 			type: 'POST',*/
/* 			data: '',*/
/* 			dataType: 'json',*/
/* 			success: function(data) { */
/* 				if (data) { */
/* 					if (data.success) { */
/* 						window.location = window.location;*/
/* 					} else if (data.error) { */
/* 						$('#data_error').html(data.message).addClass('text-danger');*/
/* 					} */
/* 				} */
/* 			} ,*/
/* 			error: function(request) { */
/* 				$('#data_error').html('{{ error_general }}').addClass("text-danger");*/
/* 			} ,*/
/* 			complete: function() { */
/* 				$('#loading').remove();*/
/* 			} */
/* 		});*/
/* } */
/* */
/* function speedyButtonLogout() { */
/* 	if (confirm('{{ text_warning_logout }}')) { */
/* 		$.get('index.php?route=extension/shipping/tk_speedy/logout&user_token={{ user_token }}').done(function() { */
/* 				window.location = window.location;*/
/* 			});*/
/* 	} */
/* } */
/* */
/* function addSpeedyWeightDimension() { */
/* 	var next_row = 0;*/
/* */
/* 	if(typeof $('#weight_dimensions tbody tr:last').attr('data-row') != 'undefined') { */
/* 		next_row = parseInt($('#weight_dimensions tbody tr:last').attr('data-row')) + 1;*/
/* 	} */
/* */
/* 	var html = '';*/
/* 	html = '<tr data-row="' + next_row + '">';*/
/* 	html += '<td class="text-center">';*/
/* 	html += '<input type="text" name="weight_dimensions[' + next_row + '][WEIGHT]" class="form-control">';*/
/* 	html += '</td>';*/
/* 	html += '<td class="text-center">';*/
/* 	html += '<input type="text" name="weight_dimensions[' + next_row + '][XS]" class="form-control">';*/
/* 	html += '</td>';*/
/* 	html += '<td class="text-center">';*/
/* 	html += '<input type="text" name="weight_dimensions[' + next_row + '][S]" class="form-control">';*/
/* 	html += '</td>';*/
/* 	html += '<td class="text-center">';*/
/* 	html += '<input type="text" name="weight_dimensions[' + next_row + '][M]" class="form-control">';*/
/* 	html += '</td>';*/
/* 	html += '<td class="text-center">';*/
/* 	html += '<input type="text" name="weight_dimensions[' + next_row + '][L]" class="form-control">';*/
/* 	html += '</td>';*/
/* 	html += '<td class="text-center">';*/
/* 	html += '<input type="text" name="weight_dimensions[' + next_row + '][XL]" class="form-control">';*/
/* 	html += '</td>';*/
/* 	html += '<td class="text-center">';*/
/* 	html += '<button type="button" onclick="removeSpeedyWeightDimension(' + next_row + ');" data-toggle="tooltip" title="" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>';*/
/* 	html += '</td>';*/
/* 	html += '</tr>';*/
/* */
/* 	$('#weight_dimensions tbody').append(html);*/
/* }*/
/* */
/* function removeSpeedyWeightDimension(row) { */
/* 	$('#weight_dimensions tr[data-row=' + row + ']').remove();*/
/* }*/
/* </script>*/
/* {{ footer}} */
