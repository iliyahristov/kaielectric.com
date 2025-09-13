<?php

/* extension/shipping/tk_econt.twig */
class __TwigTemplate_68cb6b228fb4930683a92c6c56e453a2dbbf5f9a9c9813e0f0649e212d8e58d7 extends Twig_Template
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
        $context["percent_value_row"] = 0;
        // line 4
        echo "<div id=\"content\">
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"pull-right\">
\t\t\t\t
\t\t\t\t<button type=\"submit\" form=\"form-econt\" data-toggle=\"tooltip\" title=\"";
        // line 9
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
\t\t\t
\t\t\t\t<a href=\"";
        // line 11
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a>
\t\t\t</div>
\t\t\t<h1>";
        // line 13
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
\t\t\t<ul class=\"breadcrumb\">
\t\t\t\t";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 16
            echo "\t\t\t\t<li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
 
\t\t";
        // line 23
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 24
            echo "\t\t<div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
\t\t</div>
\t\t";
        }
        // line 28
        echo " 
\t\t";
        // line 29
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 30
            echo "\t\t<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            echo (isset($context["success"]) ? $context["success"] : null);
            echo "
\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
\t\t</div>
\t\t";
        }
        // line 34
        echo " 
\t\t<form action=\"";
        // line 35
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-econt\" class=\"form-horizontal\">
\t\t\t
\t\t\t";
        // line 37
        if ((isset($context["module_tk_checkout_token"]) ? $context["module_tk_checkout_token"] : null)) {
            echo " 

\t\t\t";
            // line 39
            if ((isset($context["shipping_tk_econt_logged"]) ? $context["shipping_tk_econt_logged"] : null)) {
                // line 40
                echo "\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">";
                // line 43
                echo (isset($context["text_get_data_info"]) ? $context["text_get_data_info"] : null);
                echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<a id=\"get_data\" onclick=\"if (!\$(this).attr('disabled')) { refreshData(); } \" class=\"btn btn-primary\"><span id=\"get_data_text\">";
                // line 45
                echo (isset($context["button_get_data"]) ? $context["button_get_data"] : null);
                echo "</span></a>
\t\t\t\t\t\t\t<span id=\"data_error\">";
                // line 46
                if ((isset($context["error_get_data"]) ? $context["error_get_data"] : null)) {
                    echo (isset($context["error_get_data"]) ? $context["error_get_data"] : null);
                    echo " ";
                }
                echo "</span>
\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_username\">";
                // line 51
                echo (isset($context["entry_username"]) ? $context["entry_username"] : null);
                echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" id=\"shipping_tk_econt_username\" value=\"";
                // line 53
                echo (isset($context["shipping_tk_econt_username"]) ? $context["shipping_tk_econt_username"] : null);
                echo "\" readonly class=\"form-control\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\"></label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<a onclick=\"econtButtonLogout();\" class=\"btn btn-primary\"><span>";
                // line 59
                echo (isset($context["entry_button_logout"]) ? $context["entry_button_logout"] : null);
                echo "</span></a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<hr>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<div class=\"col-sm-3 text-right\"><p><b>Крон за ъпдейт на офиси:</b></p></div>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<p>/opt/cpanel/ea-php74/root/usr/bin/php ";
                // line 68
                echo (isset($context["root"]) ? $context["root"] : null);
                echo "catalog/controller/tk_checkout/cron_econt.php ";
                echo (isset($context["web_url"]) ? $context["web_url"] : null);
                echo " > /dev/null 2>&1</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<div class=\"col-sm-3 text-right\"><p><b>Крон за ъпдейт на пратки:</b></p></div>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<p>/opt/cpanel/ea-php74/root/usr/bin/php ";
                // line 74
                echo (isset($context["root"]) ? $context["root"] : null);
                echo "catalog/controller/tk_checkout/cron_econt_shipping.php ";
                echo (isset($context["web_url"]) ? $context["web_url"] : null);
                echo " > /dev/null 2>&1</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
            }
            // line 80
            echo "\t\t\t\t\t
\t\t\t";
            // line 81
            if ( !(isset($context["shipping_tk_econt_logged"]) ? $context["shipping_tk_econt_logged"] : null)) {
                // line 82
                echo "\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-body\">
 
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_test\"><span data-toggle=\"tooltip\" title=\"";
                // line 86
                echo (isset($context["text_environment_info"]) ? $context["text_environment_info"] : null);
                echo "\">";
                echo (isset($context["entry_test"]) ? $context["entry_test"] : null);
                echo "</span></label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_test\" name=\"shipping_tk_econt_test\">
\t\t\t\t\t\t\t\t";
                // line 89
                if ((isset($context["shipping_tk_econt_test"]) ? $context["shipping_tk_econt_test"] : null)) {
                    // line 90
                    echo "\t\t\t\t\t\t\t\t<option value=\"0\">";
                    echo (isset($context["text_real_environment"]) ? $context["text_real_environment"] : null);
                    echo "</option>
\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                    // line 91
                    echo (isset($context["text_demo_environment"]) ? $context["text_demo_environment"] : null);
                    echo "</option>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 93
                    echo "\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                    echo (isset($context["text_real_environment"]) ? $context["text_real_environment"] : null);
                    echo "</option>
\t\t\t\t\t\t\t\t<option value=\"1\">";
                    // line 94
                    echo (isset($context["text_demo_environment"]) ? $context["text_demo_environment"] : null);
                    echo "</option>
\t\t\t\t\t\t\t\t";
                }
                // line 96
                echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
 
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_username\">";
                // line 101
                echo (isset($context["entry_username"]) ? $context["entry_username"] : null);
                echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" id=\"shipping_tk_econt_username\" name=\"shipping_tk_econt_username\" value=\"";
                // line 103
                echo (isset($context["shipping_tk_econt_username"]) ? $context["shipping_tk_econt_username"] : null);
                echo "\" placeholder=\"";
                echo (isset($context["shipping_tk_econtusername"]) ? $context["shipping_tk_econtusername"] : null);
                echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t";
                // line 104
                if ((isset($context["error_username"]) ? $context["error_username"] : null)) {
                    // line 105
                    echo "\t\t\t\t\t\t\t<span class=\"text-danger\">";
                    echo (isset($context["error_username"]) ? $context["error_username"] : null);
                    echo "</span>
\t\t\t\t\t\t\t";
                }
                // line 107
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
 
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_password\">";
                // line 111
                echo (isset($context["entry_password"]) ? $context["entry_password"] : null);
                echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"password\" id=\"shipping_tk_econt_password\" name=\"shipping_tk_econt_password\" value=\"";
                // line 113
                echo (isset($context["shipping_tk_econt_password"]) ? $context["shipping_tk_econt_password"] : null);
                echo "\" placeholder=\"";
                echo (isset($context["shipping_tk_econt_password"]) ? $context["shipping_tk_econt_password"] : null);
                echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t";
                // line 114
                if ((isset($context["error_password"]) ? $context["error_password"] : null)) {
                    // line 115
                    echo "\t\t\t\t\t\t\t<span class=\"text-danger\">";
                    echo (isset($context["error_password"]) ? $context["error_password"] : null);
                    echo "</span>
\t\t\t\t\t\t\t";
                }
                // line 117
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
 
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\"></label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<a id=\"login_button\" onclick=\"econtButtonLogin();\" class=\"btn btn-primary\"><span id=\"login_text\">";
                // line 123
                echo (isset($context["button_login"]) ? $context["button_login"] : null);
                echo "</span></a>
\t\t\t\t\t\t\t<span id=\"login_error\"></span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
 
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
            } else {
                // line 131
                echo "\t\t\t
\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-body\" id=\"additional_table\">
\t
\t\t\t\t\t";
                // line 135
                if ((isset($context["cities"]) ? $context["cities"] : null)) {
                    // line 136
                    echo "\t\t\t\t\t
\t\t\t\t\t<ul class=\"nav nav-tabs\">
\t\t\t\t\t\t<li class=\"active\"><a href=\"#tab-general\" data-toggle=\"tab\">";
                    // line 138
                    echo (isset($context["entry_general_settings"]) ? $context["entry_general_settings"] : null);
                    echo "</a></li>
\t\t\t\t\t\t<li><a href=\"#tab-delivery\" data-toggle=\"tab\">";
                    // line 139
                    echo (isset($context["text_delivery_settings"]) ? $context["text_delivery_settings"] : null);
                    echo "</a></li>
\t\t\t\t\t\t<li><a href=\"#tab-price\" data-toggle=\"tab\">";
                    // line 140
                    echo (isset($context["text_tab_price"]) ? $context["text_tab_price"] : null);
                    echo "</a></li>
\t\t\t\t\t\t<li><a href=\"#tab-price_weight\" data-toggle=\"tab\">Ценообрзвуане спрямо килограми</a></li>
\t\t\t\t\t\t<li><a href=\"#tab-price_percent\" data-toggle=\"tab\">Ценообрзвуане в %</a></li>
\t\t\t\t\t\t<li><a href=\"#tab-status\" data-toggle=\"tab\">";
                    // line 143
                    echo (isset($context["text_tab_status"]) ? $context["text_tab_status"] : null);
                    echo "</a></li>
\t\t\t\t\t\t<li><a href=\"#tab-lang\" data-toggle=\"tab\">Текстове</a></li>
\t\t\t\t\t</ul>
\t\t\t          
\t\t\t\t\t<div class=\"tab-content\">
\t\t\t          
\t\t\t\t\t\t<div class=\"tab-pane active\" id=\"tab-general\">

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_status\">";
                    // line 152
                    echo (isset($context["entry_status"]) ? $context["entry_status"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_econt_status\" id=\"input-shipping_tk_econt_status\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 155
                    if ((isset($context["shipping_tk_econt_status"]) ? $context["shipping_tk_econt_status"] : null)) {
                        // line 156
                        echo "\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 157
                        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 159
                        echo "\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_enabled"]) ? $context["text_enabled"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 160
                        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 162
                    echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_geo_zone_id\">";
                    // line 167
                    echo (isset($context["entry_geo_zone"]) ? $context["entry_geo_zone"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_geo_zone_id\" name=\"shipping_tk_econt_geo_zone_id\">
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                    // line 170
                    echo (isset($context["text_all_zones"]) ? $context["text_all_zones"] : null);
                    echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    // line 171
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["geo_zones"]) ? $context["geo_zones"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["geo_zone"]) {
                        // line 172
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["geo_zone"], "geo_zone_id", array()) == (isset($context["shipping_tk_econt_geo_zone_id"]) ? $context["shipping_tk_econt_geo_zone_id"] : null))) {
                            // line 173
                            echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["geo_zone"], "geo_zone_id", array());
                            echo "\" selected=\"selected\">";
                            echo $this->getAttribute($context["geo_zone"], "name", array());
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 175
                            echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["geo_zone"], "geo_zone_id", array());
                            echo "\">";
                            echo $this->getAttribute($context["geo_zone"], "name", array());
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 177
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['geo_zone'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 178
                    echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-tax-class\">Данъчен клас</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_econt_tax_class_id\" id=\"input-tax-class\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                    // line 186
                    echo (isset($context["text_none"]) ? $context["text_none"] : null);
                    echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    // line 187
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["tax_classes"]) ? $context["tax_classes"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["tax_class"]) {
                        // line 188
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["tax_class"], "tax_class_id", array()) == (isset($context["shipping_tk_econt_tax_class_id"]) ? $context["shipping_tk_econt_tax_class_id"] : null))) {
                            // line 189
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["tax_class"], "tax_class_id", array());
                            echo "\" selected=\"selected\">";
                            echo $this->getAttribute($context["tax_class"], "title", array());
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 191
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["tax_class"], "tax_class_id", array());
                            echo "\">";
                            echo $this->getAttribute($context["tax_class"], "title", array());
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 193
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tax_class'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 194
                    echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
 
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_sort_order\">";
                    // line 199
                    echo (isset($context["entry_sort_order"]) ? $context["entry_sort_order"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_tk_econt_sort_order\" name=\"shipping_tk_econt_sort_order\" value=\"";
                    // line 201
                    echo (isset($context["shipping_tk_econt_sort_order"]) ? $context["shipping_tk_econt_sort_order"] : null);
                    echo "\" size=\"1\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab-delivery\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"econt_client_id\">Избери клиенстки профил</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_profile_id\" name=\"shipping_tk_econt_profile_id\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 212
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["clients"]) ? $context["clients"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
                        // line 213
                        echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $this->getAttribute($context["client"], "id", array());
                        echo "\"";
                        if (($this->getAttribute($context["client"], "id", array()) == (isset($context["shipping_tk_econt_profile_id"]) ? $context["shipping_tk_econt_profile_id"] : null))) {
                            echo " selected=\"selected\"";
                        }
                        echo ">";
                        echo $this->getAttribute($context["client"], "name", array());
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['client'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 215
                    echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t              
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"shipping_tk_econt_company_name\" name=\"shipping_tk_econt_company_name\" value=\"";
                    // line 217
                    echo (isset($context["shipping_tk_econt_company_name"]) ? $context["shipping_tk_econt_company_name"] : null);
                    echo "\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_cd_agreement\">Избери номер на споразумение</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_cd_agreement\" name=\"shipping_tk_econt_cd_agreement\">
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">без споразумение</option>
\t\t\t\t\t\t\t\t\t\t";
                    // line 226
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["cd_agreement"]) ? $context["cd_agreement"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["agreement"]) {
                        // line 227
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $context["agreement"];
                        echo "\"";
                        if (($context["agreement"] == (isset($context["shipping_tk_econt_cd_agreement"]) ? $context["shipping_tk_econt_cd_agreement"] : null))) {
                            echo " selected=\"selected\"";
                        }
                        echo ">";
                        echo $context["agreement"];
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['agreement'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 229
                    echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
          \t\t\t\t\t
          \t\t\t\t\t";
                    // line 233
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["stores"]) ? $context["stores"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
                        // line 234
                        echo "          \t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_store_kay_";
                        // line 235
                        echo $this->getAttribute($context["store"], "store_id", array());
                        echo "\">";
                        echo (isset($context["text_delivery_code"]) ? $context["text_delivery_code"] : null);
                        echo "<br> <strong>Мултистор - ";
                        echo $this->getAttribute($context["store"], "name", array());
                        echo "</strong></label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_tk_econt_store_kay_";
                        // line 237
                        echo $this->getAttribute($context["store"], "store_id", array());
                        echo "\" name=\"shipping_tk_econt_store_kay[";
                        echo $this->getAttribute($context["store"], "store_id", array());
                        echo "]\" value=\"";
                        echo $this->getAttribute((isset($context["shipping_tk_econt_store_kay"]) ? $context["shipping_tk_econt_store_kay"] : null), $this->getAttribute($context["store"], "store_id", array()), array(), "array");
                        echo "\" size=\"1\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 241
                    echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_auto_label\">";
                    // line 243
                    echo (isset($context["entry_auto_label"]) ? $context["entry_auto_label"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_auto_label\" name=\"shipping_tk_econt_auto_label\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 246
                    if ((isset($context["shipping_tk_econt_auto_label"]) ? $context["shipping_tk_econt_auto_label"] : null)) {
                        // line 247
                        echo "\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 248
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 250
                        echo "\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 251
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 253
                    echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                    // line 257
                    if ((isset($context["custom_fields"]) ? $context["custom_fields"] : null)) {
                        // line 258
                        echo "\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_company\">Поле за име на фирма</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_econt_company\" id=\"shipping_tk_econt_company\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"9999\">";
                        // line 262
                        echo (isset($context["text_no_company"]) ? $context["text_no_company"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 263
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["custom_fields"]) ? $context["custom_fields"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
                            // line 264
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($context["custom_field"], "custom_field_id", array()) == (isset($context["shipping_tk_econt_company"]) ? $context["shipping_tk_econt_company"] : null))) {
                                // line 265
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                echo $this->getAttribute($context["custom_field"], "custom_field_id", array());
                                echo "\" selected=\"selected\">";
                                echo $this->getAttribute($context["custom_field"], "name", array());
                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 267
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                echo $this->getAttribute($context["custom_field"], "custom_field_id", array());
                                echo "\">";
                                echo $this->getAttribute($context["custom_field"], "name", array());
                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 269
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 270
                        echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                    }
                    // line 274
                    echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_shipment_product_name\">Името на продукта в описанието на пратката</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_shipment_product_name\" name=\"shipping_tk_econt_shipment_product_name\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 279
                    if ((isset($context["shipping_tk_econt_shipment_product_name"]) ? $context["shipping_tk_econt_shipment_product_name"] : null)) {
                        // line 280
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" ";
                        // line 281
                        if (((isset($context["shipping_tk_econt_shipment_product_name"]) ? $context["shipping_tk_econt_shipment_product_name"] : null) == 1)) {
                            echo "selected=\"selected\"";
                        }
                        echo ">Продукт</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"2\" ";
                        // line 282
                        if (((isset($context["shipping_tk_econt_shipment_product_name"]) ? $context["shipping_tk_econt_shipment_product_name"] : null) == 2)) {
                            echo "selected=\"selected\"";
                        }
                        echo ">Продукт и модел номер</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"3\" ";
                        // line 283
                        if (((isset($context["shipping_tk_econt_shipment_product_name"]) ? $context["shipping_tk_econt_shipment_product_name"] : null) == 3)) {
                            echo "selected=\"selected\"";
                        }
                        echo ">Само модел номер</option>
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 285
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" >";
                        // line 286
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"2\" >Продукт и модел номер</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"3\" >Само модел номер</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 290
                    echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-tk_econt_shipment_description\">";
                    // line 295
                    echo (isset($context["text_shipment_description"]) ? $context["text_shipment_description"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_shipment_description\" value=\"";
                    // line 297
                    echo (isset($context["shipping_tk_econt_shipment_description"]) ? $context["shipping_tk_econt_shipment_description"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["text_shipment_description"]) ? $context["text_shipment_description"] : null);
                    echo "\" id=\"input-tk_econt_shipment_description\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-tk_econt_shipment_opis\">Текст заменящ името на продукта в описа</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_shipment_opis\" value=\"";
                    // line 305
                    echo (isset($context["shipping_tk_econt_shipment_opis"]) ? $context["shipping_tk_econt_shipment_opis"] : null);
                    echo "\" placeholder=\"Остави празно за да не се замени името\" id=\"input-tk_econt_shipment_opis\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_weight_type\">Мерна единица</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_weight_type\" name=\"shipping_tk_econt_weight_type\">
\t\t\t\t\t\t\t\t\t\t<option value=\"kilogram\" ";
                    // line 313
                    if (((isset($context["shipping_tk_econt_weight_type"]) ? $context["shipping_tk_econt_weight_type"] : null) == "kilogram")) {
                        echo "selected=\"selected\"";
                    }
                    echo ">Килограм</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"gram\" ";
                    // line 314
                    if (((isset($context["shipping_tk_econt_weight_type"]) ? $context["shipping_tk_econt_weight_type"] : null) == "gram")) {
                        echo "selected=\"selected\"";
                    }
                    echo ">Грам</option>
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-weight-total\">";
                    // line 321
                    echo (isset($context["entry_weight_total"]) ? $context["entry_weight_total"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_weight_total\" value=\"";
                    // line 323
                    echo (isset($context["shipping_tk_econt_weight_total"]) ? $context["shipping_tk_econt_weight_total"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_weight_total"]) ? $context["entry_weight_total"] : null);
                    echo "\" id=\"input-weight-total\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t<i>В кг.</i>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_machine_enabled\">";
                    // line 330
                    echo (isset($context["entry_machine_enabled"]) ? $context["entry_machine_enabled"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-2\">
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_machine_enabled\" name=\"shipping_tk_econt_machine_enabled\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 335
                    if ((isset($context["shipping_tk_econt_machine_enabled"]) ? $context["shipping_tk_econt_machine_enabled"] : null)) {
                        // line 336
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 337
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 339
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 340
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 342
                    echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"shipping_tk_econt_machine_sort\">Подредба</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_machine_sort\" value=\"";
                    // line 347
                    echo (isset($context["shipping_tk_econt_machine_sort"]) ? $context["shipping_tk_econt_machine_sort"] : null);
                    echo "\" placeholder=\"Подредба\" id=\"shipping_tk_econt_machine_sort\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"shipping_tk_econt_machine_weight\">До кг.</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_machine_weight\" value=\"";
                    // line 352
                    echo (isset($context["shipping_tk_econt_machine_weight"]) ? $context["shipping_tk_econt_machine_weight"] : null);
                    echo "\" placeholder=\"До кг.\" id=\"shipping_tk_econt_machine_weight\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_office_enabled\">";
                    // line 359
                    echo (isset($context["entry_office_enabled"]) ? $context["entry_office_enabled"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-2\">
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_office_enabled\" name=\"shipping_tk_econt_office_enabled\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 364
                    if ((isset($context["shipping_tk_econt_office_enabled"]) ? $context["shipping_tk_econt_office_enabled"] : null)) {
                        // line 365
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 366
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 368
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 369
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 371
                    echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"shipping_tk_econt_office_sort\">Подредба</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_office_sort\" value=\"";
                    // line 376
                    echo (isset($context["shipping_tk_econt_office_sort"]) ? $context["shipping_tk_econt_office_sort"] : null);
                    echo "\" placeholder=\"Подредба\" id=\"shipping_tk_econt_office_sort\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"shipping_tk_econt_office_weight\">До кг.</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_office_weight\" value=\"";
                    // line 380
                    echo (isset($context["shipping_tk_econt_office_weight"]) ? $context["shipping_tk_econt_office_weight"] : null);
                    echo "\" placeholder=\"До кг.\" id=\"shipping_tk_econt_office_weight\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
 
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_address_enabled\">";
                    // line 387
                    echo (isset($context["entry_address_enabled"]) ? $context["entry_address_enabled"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-2\">
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_address_enabled\" name=\"shipping_tk_econt_address_enabled\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 392
                    if ((isset($context["shipping_tk_econt_address_enabled"]) ? $context["shipping_tk_econt_address_enabled"] : null)) {
                        // line 393
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 394
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 396
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 397
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 399
                    echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"shipping_tk_econt_address_sort\">Подредба</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_address_sort\" value=\"";
                    // line 404
                    echo (isset($context["shipping_tk_econt_address_sort"]) ? $context["shipping_tk_econt_address_sort"] : null);
                    echo "\" placeholder=\"Подредба\" id=\"shipping_tk_econt_address_sort\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"shipping_tk_econt_address_weight\">До кг.</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_address_weight\" value=\"";
                    // line 408
                    echo (isset($context["shipping_tk_econt_address_weight"]) ? $context["shipping_tk_econt_address_weight"] : null);
                    echo "\" placeholder=\"До кг.\" id=\"shipping_tk_econt_address_weight\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab-price\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_shipping_in\">Добави сумата на транспорта като продукт в описа:</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_shipping_in\" name=\"shipping_tk_econt_shipping_in\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 423
                    if ((isset($context["shipping_tk_econt_shipping_in"]) ? $context["shipping_tk_econt_shipping_in"] : null)) {
                        // line 424
                        echo "\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 425
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 427
                        echo "\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 428
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 430
                    echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"shipping_tk_econt_payment_receiver_method\" value=\"1\"  />
\t\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-shipping_tk_econt_bank_fee\">Отстъпка при плащане по банка:</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_bank_fee\" value=\"";
                    // line 440
                    echo (isset($context["shipping_tk_econt_bank_fee"]) ? $context["shipping_tk_econt_bank_fee"] : null);
                    echo "\" placeholder=\"Отстъпка при плащане по банка\" id=\"input-shipping_tk_econt_bank_fee\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_cod_sum\">Какво включва сумата за дсотавка:</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_cod_sum\" name=\"shipping_tk_econt_cod_sum\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" ";
                    // line 448
                    if (((isset($context["shipping_tk_econt_cod_sum"]) ? $context["shipping_tk_econt_cod_sum"] : null) == 1)) {
                        echo "selected=\"selected\"";
                    }
                    echo ">Всичко</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"2\" ";
                    // line 449
                    if (((isset($context["shipping_tk_econt_cod_sum"]) ? $context["shipping_tk_econt_cod_sum"] : null) == 2)) {
                        echo "selected=\"selected\"";
                    }
                    echo ">Само доставка без такси</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"3\" ";
                    // line 450
                    if (((isset($context["shipping_tk_econt_cod_sum"]) ? $context["shipping_tk_econt_cod_sum"] : null) == 3)) {
                        echo "selected=\"selected\"";
                    }
                    echo ">Само доставка без такси и то само за безплатна доставка</option>
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
 \t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-machine_cost\">";
                    // line 456
                    echo (isset($context["entry_machine_cost"]) ? $context["entry_machine_cost"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_machine_free\" value=\"";
                    // line 460
                    echo (isset($context["shipping_tk_econt_machine_free"]) ? $context["shipping_tk_econt_machine_free"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_machine_cost"]) ? $context["entry_machine_cost"] : null);
                    echo "\" id=\"input-office_cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"input-machine_cost\">Тегло за безплатна доставка до Еконтомат</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_machine_free_weight\" value=\"";
                    // line 465
                    echo (isset($context["shipping_tk_econt_machine_free_weight"]) ? $context["shipping_tk_econt_machine_free_weight"] : null);
                    echo "\" placeholder=\"Тегло\" id=\"input-office_cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-office_cost\">";
                    // line 473
                    echo (isset($context["entry_office_cost"]) ? $context["entry_office_cost"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_office_free\" value=\"";
                    // line 477
                    echo (isset($context["shipping_tk_econt_office_free"]) ? $context["shipping_tk_econt_office_free"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_office_cost"]) ? $context["entry_office_cost"] : null);
                    echo "\" id=\"input-office_cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"input-office_cost\">Тегло за безплатна доставка до офис</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_office_free_weight\" value=\"";
                    // line 481
                    echo (isset($context["shipping_tk_econt_office_free_weight"]) ? $context["shipping_tk_econt_office_free_weight"] : null);
                    echo "\" placeholder=\"Тегло\" id=\"input-office_cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-address_cost\">";
                    // line 489
                    echo (isset($context["entry_door_cost"]) ? $context["entry_door_cost"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_door_free\" value=\"";
                    // line 493
                    echo (isset($context["shipping_tk_econt_door_free"]) ? $context["shipping_tk_econt_door_free"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_door_cost"]) ? $context["entry_door_cost"] : null);
                    echo "\" id=\"input-address_cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"input-office_cost\">Тегло за безплатна доставка до адрес</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_door_free_weight\" value=\"";
                    // line 497
                    echo (isset($context["shipping_tk_econt_door_free_weight"]) ? $context["shipping_tk_econt_door_free_weight"] : null);
                    echo "\" placeholder=\"Тегло\" id=\"input-office_cost\" class=\"form-control\" />
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
                    // line 507
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["oc_totals"]) ? $context["oc_totals"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["total"]) {
                        // line 508
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"checkbox col-sm-4\"><label><input type=\"checkbox\" name=\"shipping_tk_econt_totals[]\" value=\"";
                        echo $this->getAttribute($context["total"], "code", array());
                        echo "\" ";
                        if (twig_in_filter($this->getAttribute($context["total"], "code", array()), (isset($context["shipping_tk_econt_totals"]) ? $context["shipping_tk_econt_totals"] : null))) {
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
                    // line 510
                    echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-fixed-cost\">";
                    // line 515
                    echo (isset($context["entry_machine_fixed_cost"]) ? $context["entry_machine_fixed_cost"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_machine_fixed_cost\" value=\"";
                    // line 517
                    echo (isset($context["shipping_tk_econt_machine_fixed_cost"]) ? $context["shipping_tk_econt_machine_fixed_cost"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_machine_fixed_cost"]) ? $context["entry_machine_fixed_cost"] : null);
                    echo "\" id=\"input-fixed-cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-fixed-cost\">";
                    // line 521
                    echo (isset($context["entry_office_fixed_cost"]) ? $context["entry_office_fixed_cost"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_office_fixed_cost\" value=\"";
                    // line 523
                    echo (isset($context["shipping_tk_econt_office_fixed_cost"]) ? $context["shipping_tk_econt_office_fixed_cost"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_office_fixed_cost"]) ? $context["entry_office_fixed_cost"] : null);
                    echo "\" id=\"input-fixed-cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
 
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-fixed-cost\">";
                    // line 528
                    echo (isset($context["entry_door_fixed_cost"]) ? $context["entry_door_fixed_cost"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_door_fixed_cost\" value=\"";
                    // line 530
                    echo (isset($context["shipping_tk_econt_door_fixed_cost"]) ? $context["shipping_tk_econt_door_fixed_cost"] : null);
                    echo "\" placeholder=\"";
                    echo (isset($context["entry_door_fixed_cost"]) ? $context["entry_door_fixed_cost"] : null);
                    echo "\" id=\"input-fixed-cost\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div id=\"calculate_settings\">

\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3 text-right\"></div>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<br><br><h4><b>";
                    // line 540
                    echo (isset($context["entry_auto_price_settings"]) ? $context["entry_auto_price_settings"] : null);
                    echo "</b></h4>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_calculate_enabled\">";
                    // line 545
                    echo (isset($context["entry_calculate_enabled"]) ? $context["entry_calculate_enabled"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_calculate_enabled\" name=\"shipping_tk_econt_calculate_enabled\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 548
                    if ((isset($context["shipping_tk_econt_calculate_enabled"]) ? $context["shipping_tk_econt_calculate_enabled"] : null)) {
                        // line 549
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 550
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 552
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 553
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 555
                    echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

 \t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_discount\">";
                    // line 561
                    echo (isset($context["entry_discount"]) ? $context["entry_discount"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_discount\" name=\"shipping_tk_econt_discount\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 564
                    if ((isset($context["shipping_tk_econt_discount"]) ? $context["shipping_tk_econt_discount"] : null)) {
                        // line 565
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 566
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 568
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 569
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 571
                    echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_np_enabled\">";
                    // line 576
                    echo (isset($context["entry_np"]) ? $context["entry_np"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_np_enabled\" name=\"shipping_tk_econt_np_enabled\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 579
                    if ((isset($context["shipping_tk_econt_np_enabled"]) ? $context["shipping_tk_econt_np_enabled"] : null)) {
                        // line 580
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 581
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 583
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 584
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 586
                    echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_os_enabled\">";
                    // line 591
                    echo (isset($context["entry_os"]) ? $context["entry_os"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_os_enabled\" name=\"shipping_tk_econt_os_enabled\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 594
                    if ((isset($context["shipping_tk_econt_os_enabled"]) ? $context["shipping_tk_econt_os_enabled"] : null)) {
                        // line 595
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 596
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 598
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 599
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 601
                    echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-shipping_tk_econt_os_price\">Над каква сума да се прилага услугата обявена стойност</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_os_price\" value=\"";
                    // line 608
                    echo (isset($context["shipping_tk_econt_os_price"]) ? $context["shipping_tk_econt_os_price"] : null);
                    echo "\" placeholder=\"Сума за обавена стойност\" id=\"input-shipping_tk_econt_os_price\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
 
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_sms_enabled\">";
                    // line 613
                    echo (isset($context["entry_sms"]) ? $context["entry_sms"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_sms_enabled\" name=\"shipping_tk_econt_sms_enabled\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 616
                    if (((isset($context["shipping_tk_econt_sms_enabled"]) ? $context["shipping_tk_econt_sms_enabled"] : null) && ((isset($context["shipping_tk_econt_sms_enabled"]) ? $context["shipping_tk_econt_sms_enabled"] : null) == 1))) {
                        // line 617
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"2\">Клиента да избере сам</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 619
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } elseif ((                    // line 620
(isset($context["shipping_tk_econt_sms_enabled"]) ? $context["shipping_tk_econt_sms_enabled"] : null) && ((isset($context["shipping_tk_econt_sms_enabled"]) ? $context["shipping_tk_econt_sms_enabled"] : null) == 2))) {
                        // line 621
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"2\" selected=\"selected\">Клиента да избере сам</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 623
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 625
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"2\">Клиента да избере сам</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 627
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 629
                    echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
 
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_dc_enabled\">";
                    // line 634
                    echo (isset($context["entry_dc"]) ? $context["entry_dc"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_dc_enabled\" name=\"shipping_tk_econt_dc_enabled\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 637
                    if ((isset($context["shipping_tk_econt_dc_enabled"]) ? $context["shipping_tk_econt_dc_enabled"] : null)) {
                        // line 638
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 639
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 641
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 642
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 644
                    echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_get_door_enabled\">";
                    // line 649
                    echo (isset($context["entry_get_address"]) ? $context["entry_get_address"] : null);
                    echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_tk_econt_get_door_enabled\" name=\"shipping_tk_econt_get_door_enabled\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 652
                    if ((isset($context["shipping_tk_econt_get_door_enabled"]) ? $context["shipping_tk_econt_get_door_enabled"] : null)) {
                        // line 653
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 654
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 656
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 657
                        echo (isset($context["text_no"]) ? $context["text_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 659
                    echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
 
 \t
\t\t\t\t\t\t\t</div>
 
\t\t\t\t\t\t</div>
 
\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab-status\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"shipping_tk_econt_order_status_id\">Статус на поръчката след генериране на товарителница:</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_econt_order_status_id\" id=\"shipping_tk_econt_order_status_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">Без смяна на статуса</option>
\t\t\t\t\t\t\t\t\t\t";
                    // line 675
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
                        echo " 
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                        // line 677
                        if (($this->getAttribute($context["order_status"], "order_status_id", array(), "array") == (isset($context["shipping_tk_econt_order_status_id"]) ? $context["shipping_tk_econt_order_status_id"] : null))) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 678
                            echo $this->getAttribute($context["order_status"], "order_status_id", array(), "array");
                            echo "\" selected=\"selected\">";
                            echo $this->getAttribute($context["order_status"], "name", array(), "array");
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 679
                            echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            // line 680
                            echo $this->getAttribute($context["order_status"], "order_status_id", array(), "array");
                            echo "\">";
                            echo $this->getAttribute($context["order_status"], "name", array(), "array");
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 681
                        echo " 
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 682
                    echo " 
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-shipping_tk_econt_order_status_id_mail\">Да се пратили и-меил след генериране на товарителница:</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_econt_order_status_id_mail\" id=\"input-shipping_tk_econt_order_status_id_mail\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 691
                    if ((isset($context["shipping_tk_econt_order_status_id_mail"]) ? $context["shipping_tk_econt_order_status_id_mail"] : null)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                        // line 692
                        echo (isset($context["entry_no"]) ? $context["entry_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                        // line 693
                        echo (isset($context["entry_yes"]) ? $context["entry_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 694
                        echo " 
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                        // line 695
                        echo (isset($context["entry_no"]) ? $context["entry_no"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                        // line 696
                        echo (isset($context["entry_yes"]) ? $context["entry_yes"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 697
                    echo " 
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"input-shipping_tk_econt_order_status_id_mail_text\">Текст към и-меила след генериране на товарителница<br> ({shipment_number} - заменя номера на товарителница в текста):</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<textarea name=\"shipping_tk_econt_order_status_id_mail_text\" rows=\"3\" placeholder=\"Въведи текст\" id=\"input-shipping_tk_econt_order_status_id_mail_text\" class=\"form-control\">";
                    // line 705
                    echo (isset($context["shipping_tk_econt_order_status_id_mail_text"]) ? $context["shipping_tk_econt_order_status_id_mail_text"] : null);
                    echo "</textarea>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<div class=\"col-sm-3 text-right\"></div>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<br><br><h4><b>Синхронизиране на статуси между Еконт и Opencart и изпращане на и-мейл до клиента</b></h4>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
                    // line 716
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["text_statuses"]) ? $context["text_statuses"] : null));
                    foreach ($context['_seq'] as $context["key"] => $context["text_status"]) {
                        // line 717
                        echo "\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">";
                        // line 718
                        echo $context["text_status"];
                        echo "</label>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">Избери статус за синхронизиране</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_econt_order_status[";
                        // line 724
                        echo $context["key"];
                        echo "]\" id=\"input-shipping_tk_econt_order_status\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Без смяна на статуса</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 726
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
                            // line 727
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute((isset($context["shipping_tk_econt_order_status"]) ? $context["shipping_tk_econt_order_status"] : null), $context["key"], array(), "array") == $this->getAttribute($context["order_status"], "order_status_id", array()))) {
                                echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                // line 728
                                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                                echo "\" selected=\"selected\">";
                                echo $this->getAttribute($context["order_status"], "name", array());
                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 729
                                echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                // line 730
                                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                                echo "\">";
                                echo $this->getAttribute($context["order_status"], "name", array());
                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 731
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 732
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">Да се изпратили и-мейл до клиента</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t\t\t\t\t\t<select name=\"shipping_tk_econt_order_status_mail[";
                        // line 737
                        echo $context["key"];
                        echo "]\" id=\"input-shipping_tk_econt_order_status_mail\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 738
                        if ($this->getAttribute((isset($context["shipping_tk_econt_order_status_mail"]) ? $context["shipping_tk_econt_order_status_mail"] : null), $context["key"], array(), "array")) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                            // line 739
                            echo (isset($context["entry_no"]) ? $context["entry_no"] : null);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
                            // line 740
                            echo (isset($context["entry_yes"]) ? $context["entry_yes"] : null);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 741
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
                            // line 742
                            echo (isset($context["entry_no"]) ? $context["entry_no"] : null);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
                            // line 743
                            echo (isset($context["entry_yes"]) ? $context["entry_yes"] : null);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 744
                        echo " 
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-3\">Допълнителен текст към и-меила</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t\t\t<textarea name=\"shipping_tk_econt_order_status_mail_text[";
                        // line 752
                        echo $context["key"];
                        echo "]\" rows=\"3\" placeholder=\"Въведи текст\" id=\"input-shipping_tk_econt_order_status_mail_text\" class=\"form-control\">";
                        echo $this->getAttribute((isset($context["shipping_tk_econt_order_status_mail_text"]) ? $context["shipping_tk_econt_order_status_mail_text"] : null), $context["key"], array(), "array");
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
                    // line 757
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
                    // line 776
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["shipping_tk_econt_weight_value"]) ? $context["shipping_tk_econt_weight_value"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["weight_value"]) {
                        // line 777
                        echo "\t\t\t\t\t\t\t\t\t<tr id=\"weight-value-row";
                        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_econt_weight_value[";
                        // line 778
                        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
                        echo "][from]\" value=\"";
                        echo $this->getAttribute($context["weight_value"], "from", array());
                        echo "\" class=\"form-control\" /></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_econt_weight_value[";
                        // line 779
                        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
                        echo "][to]\" value=\"";
                        echo $this->getAttribute($context["weight_value"], "to", array());
                        echo "\" class=\"form-control\" /></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_econt_weight_value[";
                        // line 780
                        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
                        echo "][price]\" value=\"";
                        echo $this->getAttribute($context["weight_value"], "price", array());
                        echo "\" class=\"form-control\" /></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\">
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"shipping_tk_econt_weight_value[";
                        // line 782
                        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
                        echo "][type]\">
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"machine\" ";
                        // line 783
                        if (($this->getAttribute($context["weight_value"], "type", array()) == "machine")) {
                            echo "selected=\"selected\"";
                        }
                        echo ">До автомат</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"office\" ";
                        // line 784
                        if (($this->getAttribute($context["weight_value"], "type", array()) == "office")) {
                            echo "selected=\"selected\"";
                        }
                        echo ">До офис</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"door\" ";
                        // line 785
                        if (($this->getAttribute($context["weight_value"], "type", array()) == "door")) {
                            echo "selected=\"selected\"";
                        }
                        echo ">До адрес</option>
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><button type=\"button\" onclick=\"\$('#weight-value-row";
                        // line 788
                        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
                        echo "').remove();\" data-toggle=\"tooltip\" title=\"";
                        echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
                        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></button></td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
                        // line 790
                        $context["weight_value_row"] = ((isset($context["weight_value_row"]) ? $context["weight_value_row"] : null) + 1);
                        // line 791
                        echo "\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['weight_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 792
                    echo "\t\t\t\t\t\t\t\t</tbody>
              
\t\t\t\t\t\t\t\t<tfoot>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td colspan=\"4\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><button type=\"button\" onclick=\"addWeightValue();\" data-toggle=\"tooltip\" title=\"";
                    // line 797
                    echo (isset($context["button_weight_value_add"]) ? $context["button_weight_value_add"] : null);
                    echo "\" class=\"btn btn-primary\"><i class=\"fa fa-plus-circle\"></i></button></td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</tfoot>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t
\t\t\t\t\t\t</div>
 \t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"tab-pane\" id=\"tab-price_percent\">
\t\t\t\t\t\t
\t\t\t\t\t\t\t<table id=\"percent-value\" class=\"table table-striped table-bordered table-hover\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-left required\">Сума - От</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-left required\">Сума - До (включително)</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-left required\">Процент който ще плати клиента</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-left required\">Вид доставка</td>
\t\t\t\t\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
              
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                    // line 819
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["shipping_tk_econt_percent_value"]) ? $context["shipping_tk_econt_percent_value"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["percent_value"]) {
                        // line 820
                        echo "\t\t\t\t\t\t\t\t\t<tr id=\"percent-value-row";
                        echo (isset($context["percent_value_row"]) ? $context["percent_value_row"] : null);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_econt_percent_value[";
                        // line 821
                        echo (isset($context["percent_value_row"]) ? $context["percent_value_row"] : null);
                        echo "][from]\" value=\"";
                        echo $this->getAttribute($context["percent_value"], "from", array());
                        echo "\" class=\"form-control\" /></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_econt_percent_value[";
                        // line 822
                        echo (isset($context["percent_value_row"]) ? $context["percent_value_row"] : null);
                        echo "][to]\" value=\"";
                        echo $this->getAttribute($context["percent_value"], "to", array());
                        echo "\" class=\"form-control\" /></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_econt_percent_value[";
                        // line 823
                        echo (isset($context["percent_value_row"]) ? $context["percent_value_row"] : null);
                        echo "][percent]\" value=\"";
                        echo $this->getAttribute($context["percent_value"], "percent", array());
                        echo "\" class=\"form-control\" /></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\">
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"shipping_tk_econt_percent_value[";
                        // line 825
                        echo (isset($context["percent_value_row"]) ? $context["percent_value_row"] : null);
                        echo "][type]\">
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"machine\" ";
                        // line 826
                        if (($this->getAttribute($context["percent_value"], "type", array()) == "machine")) {
                            echo "selected=\"selected\"";
                        }
                        echo ">До автомат</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"office\" ";
                        // line 827
                        if (($this->getAttribute($context["percent_value"], "type", array()) == "office")) {
                            echo "selected=\"selected\"";
                        }
                        echo ">До офис</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"door\" ";
                        // line 828
                        if (($this->getAttribute($context["percent_value"], "type", array()) == "door")) {
                            echo "selected=\"selected\"";
                        }
                        echo ">До адрес</option>
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><button type=\"button\" onclick=\"\$('#percent-value-row";
                        // line 831
                        echo (isset($context["percent_value_row"]) ? $context["percent_value_row"] : null);
                        echo "').remove();\" data-toggle=\"tooltip\" title=\"";
                        echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
                        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></button></td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
                        // line 833
                        $context["percent_value_row"] = ((isset($context["percent_value_row"]) ? $context["percent_value_row"] : null) + 1);
                        // line 834
                        echo "\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['percent_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 835
                    echo "\t\t\t\t\t\t\t\t</tbody>
              
\t\t\t\t\t\t\t\t<tfoot>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td colspan=\"4\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-right\"><button type=\"button\" onclick=\"addPercentValue();\" data-toggle=\"tooltip\" title=\"";
                    // line 840
                    echo (isset($context["button_percent_value_add"]) ? $context["button_percent_value_add"] : null);
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
                    // line 852
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 853
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\" style=\"margin-bottom: 5px\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><img src=\"language/";
                        // line 854
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "/";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo ".png\" title=\"";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_text[";
                        // line 855
                        echo $this->getAttribute($context["language"], "language_id", array());
                        echo "][machine_title]\" value=\"";
                        echo (($this->getAttribute($this->getAttribute((isset($context["shipping_tk_econt_text"]) ? $context["shipping_tk_econt_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "machine_title", array())) ? ($this->getAttribute($this->getAttribute((isset($context["shipping_tk_econt_text"]) ? $context["shipping_tk_econt_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "machine_title", array())) : (""));
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 858
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">Автомат - текст </label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t";
                    // line 864
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 865
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\" style=\"margin-bottom: 5px\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><img src=\"language/";
                        // line 866
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "/";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo ".png\" title=\"";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_text[";
                        // line 867
                        echo $this->getAttribute($context["language"], "language_id", array());
                        echo "][machine_text]\" value=\"";
                        echo (($this->getAttribute($this->getAttribute((isset($context["shipping_tk_econt_text"]) ? $context["shipping_tk_econt_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "machine_text", array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["shipping_tk_econt_text"]) ? $context["shipping_tk_econt_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "machine_text", array(), "array")) : (""));
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 870
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">Офис - заглавие</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t";
                    // line 876
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 877
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\" style=\"margin-bottom: 5px\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><img src=\"language/";
                        // line 878
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "/";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo ".png\" title=\"";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_text[";
                        // line 879
                        echo $this->getAttribute($context["language"], "language_id", array());
                        echo "][office_title]\" value=\"";
                        echo (($this->getAttribute($this->getAttribute((isset($context["shipping_tk_econt_text"]) ? $context["shipping_tk_econt_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "office_title", array())) ? ($this->getAttribute($this->getAttribute((isset($context["shipping_tk_econt_text"]) ? $context["shipping_tk_econt_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "office_title", array())) : (""));
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 882
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">Офис - текст</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t";
                    // line 888
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 889
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\" style=\"margin-bottom: 5px\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><img src=\"language/";
                        // line 890
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "/";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo ".png\" title=\"";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_text[";
                        // line 891
                        echo $this->getAttribute($context["language"], "language_id", array());
                        echo "][office_text]\" value=\"";
                        echo (($this->getAttribute($this->getAttribute((isset($context["shipping_tk_econt_text"]) ? $context["shipping_tk_econt_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "office_text", array())) ? ($this->getAttribute($this->getAttribute((isset($context["shipping_tk_econt_text"]) ? $context["shipping_tk_econt_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "office_text", array())) : (""));
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 894
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">Адрес - заглавие</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t";
                    // line 900
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 901
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\" style=\"margin-bottom: 5px\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><img src=\"language/";
                        // line 902
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "/";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo ".png\" title=\"";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_text[";
                        // line 903
                        echo $this->getAttribute($context["language"], "language_id", array());
                        echo "][address_title]\" value=\"";
                        echo (($this->getAttribute($this->getAttribute((isset($context["shipping_tk_econt_text"]) ? $context["shipping_tk_econt_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "address_title", array())) ? ($this->getAttribute($this->getAttribute((isset($context["shipping_tk_econt_text"]) ? $context["shipping_tk_econt_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "address_title", array())) : (""));
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 906
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-3 control-label\">Адрес - текст</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t\t\t";
                    // line 912
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 913
                        echo "\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\" style=\"margin-bottom: 5px\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><img src=\"language/";
                        // line 914
                        echo $this->getAttribute($context["language"], "code", array());
                        echo "/";
                        echo $this->getAttribute($context["language"], "code", array());
                        echo ".png\" title=\"";
                        echo $this->getAttribute($context["language"], "name", array());
                        echo "\" /></span>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"shipping_tk_econt_text[";
                        // line 915
                        echo $this->getAttribute($context["language"], "language_id", array());
                        echo "][address_text]\" value=\"";
                        echo (($this->getAttribute($this->getAttribute((isset($context["shipping_tk_econt_text"]) ? $context["shipping_tk_econt_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "address_text", array())) ? ($this->getAttribute($this->getAttribute((isset($context["shipping_tk_econt_text"]) ? $context["shipping_tk_econt_text"] : null), $this->getAttribute($context["language"], "language_id", array()), array(), "array"), "address_text", array())) : (""));
                        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 918
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t";
                } else {
                    // line 925
                    echo "\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<div class=\"col-sm-3\"></div>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<b>";
                    // line 928
                    echo (isset($context["text_sync_info_warning"]) ? $context["text_sync_info_warning"] : null);
                    echo "</b>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 932
                echo "\t\t\t\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
            }
            // line 936
            echo "\t\t\t
\t\t\t";
        } else {
            // line 938
            echo "\t\t\t
\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t<h3>Трябва да активирате модула TK Checkout за да позлвате Доставка с Еконт</h3>
\t\t\t\t</div>
\t\t\t</div>\t\t\t\t\t
\t\t\t
\t\t\t";
        }
        // line 946
        echo "\t\t\t

\t\t</form>
\t</div>
</div>

<script type=\"text/javascript\"><!--
\t
\t\$('select[name=shipping_tk_econt_profile_id]').change(function(){
\t\t\tvar name = \$('select[name=shipping_tk_econt_profile_id] option:selected').text();
\t\t\t\$('input[name=shipping_tk_econt_company_name]').val(name);
\t\t});


\tvar weight_value_row = ";
        // line 960
        echo (isset($context["weight_value_row"]) ? $context["weight_value_row"] : null);
        echo ";

\tfunction addWeightValue() {
\t\thtml  = '<tr id=\"weight-value-row' + weight_value_row + '\">';
\t\thtml += '  <td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_econt_weight_value[' + weight_value_row + '][from]\" value=\"\" placeholder=\"0.00\" class=\"form-control\" /></td>';
\t\thtml += '  <td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_econt_weight_value[' + weight_value_row + '][to]\" value=\"\" placeholder=\"0.00\" class=\"form-control\" /></td>';
\t\thtml += '  <td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_econt_weight_value[' + weight_value_row + '][price]\" value=\"\" placeholder=\"0.00\" class=\"form-control\" /></td>';
\t\thtml += '  <td class=\"text-right\"><select class=\"form-control\" name=\"shipping_tk_econt_weight_value[' + weight_value_row + '][type]\"><option value=\"machine\">До автомат</option><option value=\"office\">До офис</option><option value=\"door\">До адрес</option></select></td>';
\t\thtml += '  <td class=\"text-right\"><button type=\"button\" onclick=\"\$(\\'#weight-value-row' + weight_value_row + '\\').remove();\" data-toggle=\"tooltip\" title=\"";
        // line 968
        echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></button></td>';
\t\thtml += '</tr>';

\t\t\$('#weight-value tbody').append(html);

\t\tweight_value_row++;
\t}
\t
\tvar percent_value_row = ";
        // line 976
        echo (isset($context["percent_value_row"]) ? $context["percent_value_row"] : null);
        echo ";

\tfunction addPercentValue() {
\t\thtml  = '<tr id=\"percent-value-row' + percent_value_row + '\">';
\t\thtml += '  <td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_econt_percent_value[' + percent_value_row + '][from]\" value=\"\" placeholder=\"0.00\" class=\"form-control\" /></td>';
\t\thtml += '  <td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_econt_percent_value[' + percent_value_row + '][to]\" value=\"\" placeholder=\"0.00\" class=\"form-control\" /></td>';
\t\thtml += '  <td class=\"text-right\"><input type=\"text\" name=\"shipping_tk_econt_percent_value[' + percent_value_row + '][percent]\" value=\"\" placeholder=\"0\" class=\"form-control\" /></td>';
\t\thtml += '  <td class=\"text-right\"><select class=\"form-control\" name=\"shipping_tk_econt_percent_value[' + percent_value_row + '][type]\"><option value=\"machine\">До автомат</option><option value=\"office\">До офис</option><option value=\"door\">До адрес</option></select></td>';
\t\thtml += '  <td class=\"text-right\"><button type=\"button\" onclick=\"\$(\\'#percent-value-row' + percent_value_row + '\\').remove();\" data-toggle=\"tooltip\" title=\"";
        // line 984
        echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
        echo "\" class=\"btn btn-danger\"><i class=\"fa fa-minus-circle\"></i></button></td>';
\t\thtml += '</tr>';

\t\t\$('#percent-value tbody').append(html);

\t\tpercent_value_row++;
\t}
\t//--></script>

\t<script type=\"text/javascript\">

\tfunction econtButtonLogin() {
\t\t\$('#loading').remove();
\t\t\$('#login_error').html('').removeClass(\"text-danger\");
\t\t\$('#login_button').after('<span id=\"loading\" class=\"attention\" style=\"padding: 5px;\">Моля, изчакайте.</span>');

\t\t\$.ajax({
\t\t\t\turl: 'index.php?route=extension/shipping/tk_econt/login&user_token=";
        // line 1001
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\t\ttype: 'POST',
\t\t\t\tdata: 'username=' + encodeURIComponent(\$('#shipping_tk_econt_username').val()) + '&password=' + encodeURIComponent(\$('#shipping_tk_econt_password').val()) + '&test=' + encodeURIComponent(\$('#shipping_tk_econt_test').val()),
\t\t\t\tdataType: 'json',
\t\t\t\tsuccess: function(data) {
\t\t\t\t\tif (data) {
\t\t\t\t\t\t\$('#loading').remove();

\t\t\t\t\t\tif (data.success) {
\t\t\t\t\t\t\twindow.location = window.location;
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$('#login_error').html(data.message).addClass('text-danger');
\t\t\t\t\t\t} 
\t\t\t\t\t} 
\t\t\t\t} ,
\t\t\t\terror: function(request) {
\t\t\t\t\t\$('#loading').remove();

\t\t\t\t\t\$('#login_error').html('";
        // line 1019
        echo (isset($context["error_general"]) ? $context["error_general"] : null);
        echo "').addClass(\"text-danger\");
\t\t\t\t} 
\t\t\t});
\t} 


\tfunction refreshData() {
\t\t\$('#data_error').html('').removeClass(\"text-danger\");
\t\t\$('#get_data').attr('disabled', true);
\t\t\$('#get_data').after('<span id=\"loading\" class=\"attention\" style=\"padding: 5px;\">";
        // line 1028
        echo (isset($context["text_get_data"]) ? $context["text_get_data"] : null);
        echo "</span>');


\t\t\$.ajax({
\t\t\t\turl: 'index.php?route=extension/shipping/tk_econt/update&user_token=";
        // line 1032
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\t\ttype: 'POST',
\t\t\t\tdata: '',
\t\t\t\tdataType: 'json',
\t\t\t\tsuccess: function(data) {
\t\t\t\t\tif (data) {
\t\t\t\t\t\tif (data.success) {
\t\t\t\t\t\t\twindow.location = window.location;
\t\t\t\t\t\t} else if (data.error) {
\t\t\t\t\t\t\t\$('#data_error').html(data.message).addClass('text-danger');
\t\t\t\t\t\t} 
\t\t\t\t\t} 
\t\t\t\t} ,
\t\t\t\terror: function(request) {
\t\t\t\t\t\$('#data_error').html('";
        // line 1046
        echo (isset($context["error_general"]) ? $context["error_general"] : null);
        echo "').addClass(\"text-danger\");
\t\t\t\t} ,
\t\t\t\tcomplete: function() {
\t\t\t\t\t\$('#loading').remove();
\t\t\t\t} 
\t\t\t});
\t}

\tfunction econtButtonLogout() {
\t\tif (confirm('";
        // line 1055
        echo (isset($context["text_warning_logout"]) ? $context["text_warning_logout"] : null);
        echo "')) {
\t\t\t\$.get('index.php?route=extension/shipping/tk_econt/logout&user_token=";
        // line 1056
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "').done(function() {
\t\t\t\t\twindow.location = window.location;
\t\t\t\t});
\t\t} 
\t} 

</script>

";
        // line 1064
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "extension/shipping/tk_econt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2263 => 1064,  2252 => 1056,  2248 => 1055,  2236 => 1046,  2219 => 1032,  2212 => 1028,  2200 => 1019,  2179 => 1001,  2159 => 984,  2148 => 976,  2137 => 968,  2126 => 960,  2110 => 946,  2100 => 938,  2096 => 936,  2090 => 932,  2083 => 928,  2078 => 925,  2069 => 918,  2058 => 915,  2050 => 914,  2047 => 913,  2043 => 912,  2035 => 906,  2024 => 903,  2016 => 902,  2013 => 901,  2009 => 900,  2001 => 894,  1990 => 891,  1982 => 890,  1979 => 889,  1975 => 888,  1967 => 882,  1956 => 879,  1948 => 878,  1945 => 877,  1941 => 876,  1933 => 870,  1922 => 867,  1914 => 866,  1911 => 865,  1907 => 864,  1899 => 858,  1888 => 855,  1880 => 854,  1877 => 853,  1873 => 852,  1858 => 840,  1851 => 835,  1845 => 834,  1843 => 833,  1836 => 831,  1828 => 828,  1822 => 827,  1816 => 826,  1812 => 825,  1805 => 823,  1799 => 822,  1793 => 821,  1788 => 820,  1784 => 819,  1759 => 797,  1752 => 792,  1746 => 791,  1744 => 790,  1737 => 788,  1729 => 785,  1723 => 784,  1717 => 783,  1713 => 782,  1706 => 780,  1700 => 779,  1694 => 778,  1689 => 777,  1685 => 776,  1664 => 757,  1650 => 752,  1640 => 744,  1635 => 743,  1631 => 742,  1628 => 741,  1623 => 740,  1619 => 739,  1615 => 738,  1611 => 737,  1604 => 732,  1597 => 731,  1590 => 730,  1587 => 729,  1580 => 728,  1575 => 727,  1571 => 726,  1566 => 724,  1557 => 718,  1554 => 717,  1550 => 716,  1536 => 705,  1526 => 697,  1521 => 696,  1517 => 695,  1514 => 694,  1509 => 693,  1505 => 692,  1501 => 691,  1490 => 682,  1483 => 681,  1476 => 680,  1473 => 679,  1466 => 678,  1462 => 677,  1455 => 675,  1437 => 659,  1432 => 657,  1427 => 656,  1422 => 654,  1417 => 653,  1415 => 652,  1409 => 649,  1402 => 644,  1397 => 642,  1392 => 641,  1387 => 639,  1382 => 638,  1380 => 637,  1374 => 634,  1367 => 629,  1362 => 627,  1356 => 625,  1351 => 623,  1345 => 621,  1343 => 620,  1339 => 619,  1333 => 617,  1331 => 616,  1325 => 613,  1317 => 608,  1308 => 601,  1303 => 599,  1298 => 598,  1293 => 596,  1288 => 595,  1286 => 594,  1280 => 591,  1273 => 586,  1268 => 584,  1263 => 583,  1258 => 581,  1253 => 580,  1251 => 579,  1245 => 576,  1238 => 571,  1233 => 569,  1228 => 568,  1223 => 566,  1218 => 565,  1216 => 564,  1210 => 561,  1202 => 555,  1197 => 553,  1192 => 552,  1187 => 550,  1182 => 549,  1180 => 548,  1174 => 545,  1166 => 540,  1151 => 530,  1146 => 528,  1136 => 523,  1131 => 521,  1122 => 517,  1117 => 515,  1110 => 510,  1095 => 508,  1091 => 507,  1078 => 497,  1069 => 493,  1062 => 489,  1051 => 481,  1042 => 477,  1035 => 473,  1024 => 465,  1014 => 460,  1007 => 456,  996 => 450,  990 => 449,  984 => 448,  973 => 440,  961 => 430,  956 => 428,  951 => 427,  946 => 425,  941 => 424,  939 => 423,  921 => 408,  914 => 404,  907 => 399,  902 => 397,  897 => 396,  892 => 394,  887 => 393,  885 => 392,  877 => 387,  867 => 380,  860 => 376,  853 => 371,  848 => 369,  843 => 368,  838 => 366,  833 => 365,  831 => 364,  823 => 359,  813 => 352,  805 => 347,  798 => 342,  793 => 340,  788 => 339,  783 => 337,  778 => 336,  776 => 335,  768 => 330,  756 => 323,  751 => 321,  739 => 314,  733 => 313,  722 => 305,  709 => 297,  704 => 295,  697 => 290,  690 => 286,  685 => 285,  678 => 283,  672 => 282,  666 => 281,  661 => 280,  659 => 279,  652 => 274,  646 => 270,  640 => 269,  632 => 267,  624 => 265,  621 => 264,  617 => 263,  613 => 262,  607 => 258,  605 => 257,  599 => 253,  594 => 251,  589 => 250,  584 => 248,  579 => 247,  577 => 246,  571 => 243,  567 => 241,  553 => 237,  544 => 235,  541 => 234,  537 => 233,  531 => 229,  516 => 227,  512 => 226,  500 => 217,  496 => 215,  481 => 213,  477 => 212,  463 => 201,  458 => 199,  451 => 194,  445 => 193,  437 => 191,  429 => 189,  426 => 188,  422 => 187,  418 => 186,  408 => 178,  402 => 177,  394 => 175,  386 => 173,  383 => 172,  379 => 171,  375 => 170,  369 => 167,  362 => 162,  357 => 160,  352 => 159,  347 => 157,  342 => 156,  340 => 155,  334 => 152,  322 => 143,  316 => 140,  312 => 139,  308 => 138,  304 => 136,  302 => 135,  296 => 131,  285 => 123,  277 => 117,  271 => 115,  269 => 114,  263 => 113,  258 => 111,  252 => 107,  246 => 105,  244 => 104,  238 => 103,  233 => 101,  226 => 96,  221 => 94,  216 => 93,  211 => 91,  206 => 90,  204 => 89,  196 => 86,  190 => 82,  188 => 81,  185 => 80,  174 => 74,  163 => 68,  151 => 59,  142 => 53,  137 => 51,  126 => 46,  122 => 45,  117 => 43,  112 => 40,  110 => 39,  105 => 37,  100 => 35,  97 => 34,  89 => 30,  87 => 29,  84 => 28,  76 => 24,  74 => 23,  67 => 18,  56 => 16,  52 => 15,  47 => 13,  40 => 11,  35 => 9,  28 => 4,  26 => 3,  24 => 2,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* {% set weight_value_row = 0 %}*/
/* {% set percent_value_row = 0 %}*/
/* <div id="content">*/
/* 	<div class="page-header">*/
/* 		<div class="container-fluid">*/
/* 			<div class="pull-right">*/
/* 				*/
/* 				<button type="submit" form="form-econt" data-toggle="tooltip" title="{{ button_save }}" class="btn btn-primary"><i class="fa fa-save"></i></button>*/
/* 			*/
/* 				<a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-default"><i class="fa fa-reply"></i></a>*/
/* 			</div>*/
/* 			<h1>{{ heading_title }}</h1>*/
/* 			<ul class="breadcrumb">*/
/* 				{% for breadcrumb in breadcrumbs %}*/
/* 				<li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/* 				{% endfor %}*/
/* 			</ul>*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="container-fluid">*/
/*  */
/* 		{% if error_warning %}*/
/* 		<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/* 			<button type="button" class="close" data-dismiss="alert">&times;</button>*/
/* 		</div>*/
/* 		{% endif %}*/
/*  */
/* 		{% if success %}*/
/* 		<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> {{ success }}*/
/* 			<button type="button" class="close" data-dismiss="alert">&times;</button>*/
/* 		</div>*/
/* 		{% endif %}*/
/*  */
/* 		<form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-econt" class="form-horizontal">*/
/* 			*/
/* 			{% if module_tk_checkout_token %} */
/* */
/* 			{% if shipping_tk_econt_logged %}*/
/* 			<div class="panel panel-default">*/
/* 				<div class="panel-body">*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-3 control-label">{{ text_get_data_info }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<a id="get_data" onclick="if (!$(this).attr('disabled')) { refreshData(); } " class="btn btn-primary"><span id="get_data_text">{{ button_get_data }}</span></a>*/
/* 							<span id="data_error">{% if error_get_data %}{{ error_get_data }} {% endif %}</span>*/
/* 							*/
/* 						</div>*/
/* 					</div>					*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-3 control-label" for="shipping_tk_econt_username">{{ entry_username }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input type="text" id="shipping_tk_econt_username" value="{{ shipping_tk_econt_username }}" readonly class="form-control" />*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-3 control-label"></label>*/
/* 						<div class="col-sm-9">*/
/* 							<a onclick="econtButtonLogout();" class="btn btn-primary"><span>{{ entry_button_logout }}</span></a>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<hr>*/
/* */
/* 					<div class="form-group">*/
/* 						<div class="col-sm-3 text-right"><p><b>Крон за ъпдейт на офиси:</b></p></div>*/
/* 						<div class="col-sm-9">*/
/* 							<p>/opt/cpanel/ea-php74/root/usr/bin/php {{ root }}catalog/controller/tk_checkout/cron_econt.php {{ web_url }} > /dev/null 2>&1</p>*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group">*/
/* 						<div class="col-sm-3 text-right"><p><b>Крон за ъпдейт на пратки:</b></p></div>*/
/* 						<div class="col-sm-9">*/
/* 							<p>/opt/cpanel/ea-php74/root/usr/bin/php {{ root }}catalog/controller/tk_checkout/cron_econt_shipping.php {{ web_url }} > /dev/null 2>&1</p>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 			{% endif %}*/
/* 					*/
/* 			{% if not shipping_tk_econt_logged  %}*/
/* 			<div class="panel panel-default">*/
/* 				<div class="panel-body">*/
/*  */
/* 					<div class="form-group">*/
/* 						<label class="col-sm-3 control-label" for="shipping_tk_econt_test"><span data-toggle="tooltip" title="{{ text_environment_info }}">{{ entry_test }}</span></label>*/
/* 						<div class="col-sm-9">*/
/* 							<select class="form-control" id="shipping_tk_econt_test" name="shipping_tk_econt_test">*/
/* 								{% if shipping_tk_econt_test %}*/
/* 								<option value="0">{{ text_real_environment }}</option>*/
/* 								<option value="1" selected="selected">{{ text_demo_environment }}</option>*/
/* 								{% else %}*/
/* 								<option value="0" selected="selected">{{ text_real_environment }}</option>*/
/* 								<option value="1">{{ text_demo_environment }}</option>*/
/* 								{% endif %}*/
/* 							</select>*/
/* 						</div>*/
/* 					</div>*/
/*  */
/* 					<div class="form-group required">*/
/* 						<label class="col-sm-3 control-label" for="shipping_tk_econt_username">{{ entry_username }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input type="text" id="shipping_tk_econt_username" name="shipping_tk_econt_username" value="{{ shipping_tk_econt_username }}" placeholder="{{ shipping_tk_econtusername }}" class="form-control" />*/
/* 							{% if error_username %}*/
/* 							<span class="text-danger">{{ error_username }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 					</div>*/
/*  */
/* 					<div class="form-group required">*/
/* 						<label class="col-sm-3 control-label" for="shipping_tk_econt_password">{{ entry_password }}</label>*/
/* 						<div class="col-sm-9">*/
/* 							<input type="password" id="shipping_tk_econt_password" name="shipping_tk_econt_password" value="{{ shipping_tk_econt_password }}" placeholder="{{ shipping_tk_econt_password }}" class="form-control" />*/
/* 							{% if error_password %}*/
/* 							<span class="text-danger">{{ error_password }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 					</div>*/
/*  */
/* 					<div class="form-group">*/
/* 						<label class="col-sm-3 control-label"></label>*/
/* 						<div class="col-sm-9">*/
/* 							<a id="login_button" onclick="econtButtonLogin();" class="btn btn-primary"><span id="login_text">{{ button_login }}</span></a>*/
/* 							<span id="login_error"></span>*/
/* 						</div>*/
/* 					</div>*/
/*  */
/* 				</div>*/
/* 			</div>*/
/* 			{% else %}*/
/* 			*/
/* 			<div class="panel panel-default">*/
/* 				<div class="panel-body" id="additional_table">*/
/* 	*/
/* 					{% if cities %}*/
/* 					*/
/* 					<ul class="nav nav-tabs">*/
/* 						<li class="active"><a href="#tab-general" data-toggle="tab">{{ entry_general_settings }}</a></li>*/
/* 						<li><a href="#tab-delivery" data-toggle="tab">{{ text_delivery_settings }}</a></li>*/
/* 						<li><a href="#tab-price" data-toggle="tab">{{ text_tab_price }}</a></li>*/
/* 						<li><a href="#tab-price_weight" data-toggle="tab">Ценообрзвуане спрямо килограми</a></li>*/
/* 						<li><a href="#tab-price_percent" data-toggle="tab">Ценообрзвуане в %</a></li>*/
/* 						<li><a href="#tab-status" data-toggle="tab">{{ text_tab_status }}</a></li>*/
/* 						<li><a href="#tab-lang" data-toggle="tab">Текстове</a></li>*/
/* 					</ul>*/
/* 			          */
/* 					<div class="tab-content">*/
/* 			          */
/* 						<div class="tab-pane active" id="tab-general">*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_status">{{ entry_status }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_econt_status" id="input-shipping_tk_econt_status" class="form-control">*/
/* 										{% if shipping_tk_econt_status %}*/
/* 										<option value="1" selected="selected">{{ text_enabled }}</option>*/
/* 										<option value="0">{{ text_disabled }}</option>*/
/* 										{% else %}*/
/* 										<option value="1">{{ text_enabled }}</option>*/
/* 										<option value="0" selected="selected">{{ text_disabled }}</option>*/
/* 										{% endif %}*/
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_geo_zone_id">{{ entry_geo_zone }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_econt_geo_zone_id" name="shipping_tk_econt_geo_zone_id">*/
/* 										<option value="0">{{ text_all_zones }}</option>*/
/* 										{% for geo_zone in geo_zones %}*/
/* 										{% if geo_zone.geo_zone_id == shipping_tk_econt_geo_zone_id %}*/
/* 										<option value="{{ geo_zone.geo_zone_id }}" selected="selected">{{ geo_zone.name }}</option>*/
/* 										{% else %}*/
/* 										<option value="{{ geo_zone.geo_zone_id }}">{{ geo_zone.name }}</option>*/
/* 										{% endif %}*/
/* 										{% endfor %}*/
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-tax-class">Данъчен клас</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_econt_tax_class_id" id="input-tax-class" class="form-control">*/
/* 										<option value="0">{{ text_none }}</option>*/
/* 										{% for tax_class in tax_classes %}*/
/* 											{% if tax_class.tax_class_id == shipping_tk_econt_tax_class_id %}*/
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
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_sort_order">{{ entry_sort_order }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input class="form-control" type="text" id="shipping_tk_econt_sort_order" name="shipping_tk_econt_sort_order" value="{{ shipping_tk_econt_sort_order }}" size="1" />*/
/* 								</div>*/
/* 							</div>*/
/* 						</div>*/
/* 							*/
/* 						<div class="tab-pane" id="tab-delivery">*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="econt_client_id">Избери клиенстки профил</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_econt_profile_id" name="shipping_tk_econt_profile_id">*/
/* 										{% for client in clients %}*/
/* 										<option value="{{ client.id }}"{% if client.id == shipping_tk_econt_profile_id %} selected="selected"{% endif %}>{{ client.name }}</option>*/
/* 										{% endfor %}*/
/* 									</select>*/
/* 					              */
/* 									<input type="hidden" id="shipping_tk_econt_company_name" name="shipping_tk_econt_company_name" value="{{ shipping_tk_econt_company_name }}" />*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_cd_agreement">Избери номер на споразумение</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_econt_cd_agreement" name="shipping_tk_econt_cd_agreement">*/
/* 										<option value="0">без споразумение</option>*/
/* 										{% for agreement in cd_agreement %}*/
/* 											<option value="{{ agreement }}"{% if agreement == shipping_tk_econt_cd_agreement %} selected="selected"{% endif %}>{{ agreement }}</option>*/
/* 										{% endfor %}*/
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/*           					*/
/*           					{% for store in stores %}*/
/*           					<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_store_kay_{{ store.store_id }}">{{ text_delivery_code }}<br> <strong>Мултистор - {{ store.name }}</strong></label>*/
/* 								<div class="col-sm-9">*/
/* 									<input class="form-control" type="text" id="shipping_tk_econt_store_kay_{{ store.store_id }}" name="shipping_tk_econt_store_kay[{{ store.store_id }}]" value="{{ shipping_tk_econt_store_kay[store.store_id] }}" size="1" />*/
/* 								</div>*/
/* 							</div>*/
/* 							{% endfor %}*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_auto_label">{{ entry_auto_label }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_econt_auto_label" name="shipping_tk_econt_auto_label">*/
/* 										{% if shipping_tk_econt_auto_label %}*/
/* 										<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 										<option value="0">{{ text_no }}</option>*/
/* 										{% else %}*/
/* 										<option value="1">{{ text_yes }}</option>*/
/* 										<option value="0" selected="selected">{{ text_no }}</option>*/
/* 										{% endif %}*/
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							{% if custom_fields %}*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_econt_company">Поле за име на фирма</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select name="shipping_tk_econt_company" id="shipping_tk_econt_company" class="form-control">*/
/* 											<option value="9999">{{ text_no_company}}</option>*/
/* 											{% for custom_field in custom_fields %}*/
/* 												{% if custom_field.custom_field_id == shipping_tk_econt_company %}*/
/* 													<option value="{{ custom_field.custom_field_id }}" selected="selected">{{ custom_field.name }}</option>*/
/* 												{% else %}*/
/* 													<option value="{{ custom_field.custom_field_id }}">{{ custom_field.name }}</option>*/
/* 												{% endif %}*/
/* 											{% endfor %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 							{% endif %}*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_shipment_product_name">Името на продукта в описанието на пратката</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_econt_shipment_product_name" name="shipping_tk_econt_shipment_product_name">*/
/* 										{% if shipping_tk_econt_shipment_product_name %}*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											<option value="1" {% if shipping_tk_econt_shipment_product_name == 1 %}selected="selected"{% endif %}>Продукт</option>*/
/* 											<option value="2" {% if shipping_tk_econt_shipment_product_name == 2 %}selected="selected"{% endif %}>Продукт и модел номер</option>*/
/* 											<option value="3" {% if shipping_tk_econt_shipment_product_name == 3 %}selected="selected"{% endif %}>Само модел номер</option>*/
/* 										{% else %}*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											<option value="1" >{{ text_yes }}</option>*/
/* 											<option value="2" >Продукт и модел номер</option>*/
/* 											<option value="3" >Само модел номер</option>*/
/* 										{% endif %}*/
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 					*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-tk_econt_shipment_description">{{ text_shipment_description }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_econt_shipment_description" value="{{ shipping_tk_econt_shipment_description }}" placeholder="{{ text_shipment_description }}" id="input-tk_econt_shipment_description" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 					*/
/* 					*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-tk_econt_shipment_opis">Текст заменящ името на продукта в описа</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_econt_shipment_opis" value="{{ shipping_tk_econt_shipment_opis }}" placeholder="Остави празно за да не се замени името" id="input-tk_econt_shipment_opis" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_weight_type">Мерна единица</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_econt_weight_type" name="shipping_tk_econt_weight_type">*/
/* 										<option value="kilogram" {% if shipping_tk_econt_weight_type == 'kilogram' %}selected="selected"{% endif %}>Килограм</option>*/
/* 										<option value="gram" {% if shipping_tk_econt_weight_type == 'gram' %}selected="selected"{% endif %}>Грам</option>*/
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 					*/
/* 					*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-weight-total">{{ entry_weight_total }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_econt_weight_total" value="{{ shipping_tk_econt_weight_total }}" placeholder="{{ entry_weight_total }}" id="input-weight-total" class="form-control" />*/
/* 									<i>В кг.</i>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_machine_enabled">{{ entry_machine_enabled }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-2">*/
/* 											<select class="form-control" id="shipping_tk_econt_machine_enabled" name="shipping_tk_econt_machine_enabled">*/
/* 												{% if shipping_tk_econt_machine_enabled %}*/
/* 												<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 												<option value="0">{{ text_no }}</option>*/
/* 												{% else %}*/
/* 												<option value="1">{{ text_yes }}</option>*/
/* 												<option value="0" selected="selected">{{ text_no }}</option>*/
/* 												{% endif %}*/
/* 											</select>*/
/* 										</div>*/
/* 									*/
/* 										<label class="col-sm-2 control-label" for="shipping_tk_econt_machine_sort">Подредба</label>*/
/* 										<div class="col-sm-3">*/
/* 											<input type="text" name="shipping_tk_econt_machine_sort" value="{{ shipping_tk_econt_machine_sort }}" placeholder="Подредба" id="shipping_tk_econt_machine_sort" class="form-control" />*/
/* 										</div>*/
/* 										*/
/* 										<label class="col-sm-2 control-label" for="shipping_tk_econt_machine_weight">До кг.</label>*/
/* 										<div class="col-sm-3">*/
/* 											<input type="text" name="shipping_tk_econt_machine_weight" value="{{ shipping_tk_econt_machine_weight }}" placeholder="До кг." id="shipping_tk_econt_machine_weight" class="form-control" />*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_office_enabled">{{ entry_office_enabled }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-2">*/
/* 											<select class="form-control" id="shipping_tk_econt_office_enabled" name="shipping_tk_econt_office_enabled">*/
/* 												{% if shipping_tk_econt_office_enabled %}*/
/* 												<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 												<option value="0">{{ text_no }}</option>*/
/* 												{% else %}*/
/* 												<option value="1">{{ text_yes }}</option>*/
/* 												<option value="0" selected="selected">{{ text_no }}</option>*/
/* 												{% endif %}*/
/* 											</select>*/
/* 										</div>*/
/* 									*/
/* 										<label class="col-sm-2 control-label" for="shipping_tk_econt_office_sort">Подредба</label>*/
/* 										<div class="col-sm-3">*/
/* 											<input type="text" name="shipping_tk_econt_office_sort" value="{{ shipping_tk_econt_office_sort }}" placeholder="Подредба" id="shipping_tk_econt_office_sort" class="form-control" />*/
/* 										</div>*/
/* 										<label class="col-sm-2 control-label" for="shipping_tk_econt_office_weight">До кг.</label>*/
/* 										<div class="col-sm-3">*/
/* 											<input type="text" name="shipping_tk_econt_office_weight" value="{{ shipping_tk_econt_office_weight }}" placeholder="До кг." id="shipping_tk_econt_office_weight" class="form-control" />*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/*  */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_address_enabled">{{ entry_address_enabled }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-2">*/
/* 											<select class="form-control" id="shipping_tk_econt_address_enabled" name="shipping_tk_econt_address_enabled">*/
/* 												{% if shipping_tk_econt_address_enabled %}*/
/* 												<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 												<option value="0">{{ text_no }}</option>*/
/* 												{% else %}*/
/* 												<option value="1">{{ text_yes }}</option>*/
/* 												<option value="0" selected="selected">{{ text_no }}</option>*/
/* 												{% endif %}*/
/* 											</select>*/
/* 										</div>*/
/* 									*/
/* 										<label class="col-sm-2 control-label" for="shipping_tk_econt_address_sort">Подредба</label>*/
/* 										<div class="col-sm-3">*/
/* 											<input type="text" name="shipping_tk_econt_address_sort" value="{{ shipping_tk_econt_address_sort }}" placeholder="Подредба" id="shipping_tk_econt_address_sort" class="form-control" />*/
/* 										</div>*/
/* 										<label class="col-sm-2 control-label" for="shipping_tk_econt_address_weight">До кг.</label>*/
/* 										<div class="col-sm-3">*/
/* 											<input type="text" name="shipping_tk_econt_address_weight" value="{{ shipping_tk_econt_address_weight }}" placeholder="До кг." id="shipping_tk_econt_address_weight" class="form-control" />*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 						</div>*/
/* 							*/
/* 						<div class="tab-pane" id="tab-price">*/
/* 							*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_shipping_in">Добави сумата на транспорта като продукт в описа:</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_econt_shipping_in" name="shipping_tk_econt_shipping_in">*/
/* 										{% if shipping_tk_econt_shipping_in %}*/
/* 										<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 										<option value="0">{{ text_no }}</option>*/
/* 										{% else %}*/
/* 										<option value="1">{{ text_yes }}</option>*/
/* 										<option value="0" selected="selected">{{ text_no }}</option>*/
/* 										{% endif %}*/
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<input type="hidden" name="shipping_tk_econt_payment_receiver_method" value="1"  />*/
/* 						*/
/* 					*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-shipping_tk_econt_bank_fee">Отстъпка при плащане по банка:</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_econt_bank_fee" value="{{ shipping_tk_econt_bank_fee }}" placeholder="Отстъпка при плащане по банка" id="input-shipping_tk_econt_bank_fee" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_cod_sum">Какво включва сумата за дсотавка:</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select class="form-control" id="shipping_tk_econt_cod_sum" name="shipping_tk_econt_cod_sum">*/
/* 											<option value="1" {% if shipping_tk_econt_cod_sum == 1 %}selected="selected"{% endif %}>Всичко</option>*/
/* 											<option value="2" {% if shipping_tk_econt_cod_sum == 2 %}selected="selected"{% endif %}>Само доставка без такси</option>*/
/* 											<option value="3" {% if shipping_tk_econt_cod_sum == 3 %}selected="selected"{% endif %}>Само доставка без такси и то само за безплатна доставка</option>*/
/* 									</select>*/
/* 								</div>*/
/* 							</div>*/
/*  					*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-machine_cost">{{ entry_machine_cost }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-4">*/
/* 											<input type="text" name="shipping_tk_econt_machine_free" value="{{ shipping_tk_econt_machine_free }}" placeholder="{{ entry_machine_cost }}" id="input-office_cost" class="form-control" />*/
/* 										</div>*/
/* 									*/
/* 										<label class="col-sm-4 control-label" for="input-machine_cost">Тегло за безплатна доставка до Еконтомат</label>*/
/* 										<div class="col-sm-4">*/
/* 											<input type="text" name="shipping_tk_econt_machine_free_weight" value="{{ shipping_tk_econt_machine_free_weight }}" placeholder="Тегло" id="input-office_cost" class="form-control" />*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 					*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-office_cost">{{ entry_office_cost }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-4">*/
/* 											<input type="text" name="shipping_tk_econt_office_free" value="{{ shipping_tk_econt_office_free }}" placeholder="{{ entry_office_cost }}" id="input-office_cost" class="form-control" />*/
/* 										</div>*/
/* 										<label class="col-sm-4 control-label" for="input-office_cost">Тегло за безплатна доставка до офис</label>*/
/* 										<div class="col-sm-4">*/
/* 											<input type="text" name="shipping_tk_econt_office_free_weight" value="{{ shipping_tk_econt_office_free_weight }}" placeholder="Тегло" id="input-office_cost" class="form-control" />*/
/* 										</div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 					*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-address_cost">{{ entry_door_cost }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<div class="row">*/
/* 										<div class="col-sm-4">*/
/* 											<input type="text" name="shipping_tk_econt_door_free" value="{{ shipping_tk_econt_door_free }}" placeholder="{{ entry_door_cost }}" id="input-address_cost" class="form-control" />*/
/* 										</div>*/
/* 										<label class="col-sm-4 control-label" for="input-office_cost">Тегло за безплатна доставка до адрес</label>*/
/* 										<div class="col-sm-4">*/
/* 											<input type="text" name="shipping_tk_econt_door_free_weight" value="{{ shipping_tk_econt_door_free_weight }}" placeholder="Тегло" id="input-office_cost" class="form-control" />*/
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
/* 										<div class="checkbox col-sm-4"><label><input type="checkbox" name="shipping_tk_econt_totals[]" value="{{ total.code }}" {% if total.code in shipping_tk_econt_totals %}checked="checked"{% endif %} />{{ total.name }}</label></div>*/
/* 										{% endfor %}*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 					*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-fixed-cost">{{ entry_machine_fixed_cost }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_econt_machine_fixed_cost" value="{{ shipping_tk_econt_machine_fixed_cost }}" placeholder="{{ entry_machine_fixed_cost }}" id="input-fixed-cost" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-fixed-cost">{{ entry_office_fixed_cost }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_econt_office_fixed_cost" value="{{ shipping_tk_econt_office_fixed_cost }}" placeholder="{{ entry_office_fixed_cost }}" id="input-fixed-cost" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/*  */
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="input-fixed-cost">{{ entry_door_fixed_cost }}</label>*/
/* 								<div class="col-sm-9">*/
/* 									<input type="text" name="shipping_tk_econt_door_fixed_cost" value="{{ shipping_tk_econt_door_fixed_cost }}" placeholder="{{ entry_door_fixed_cost }}" id="input-fixed-cost" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							*/
/* 							<div id="calculate_settings">*/
/* */
/* 								<div class="form-group">*/
/* 									<div class="col-sm-3 text-right"></div>*/
/* 									<div class="col-sm-9">*/
/* 										<br><br><h4><b>{{ entry_auto_price_settings }}</b></h4>*/
/* 									</div>*/
/* 								</div>*/
/* 								*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_econt_calculate_enabled">{{ entry_calculate_enabled }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select class="form-control" id="shipping_tk_econt_calculate_enabled" name="shipping_tk_econt_calculate_enabled">*/
/* 											{% if shipping_tk_econt_calculate_enabled %}*/
/* 											<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% else %}*/
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											{% endif %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* */
/*  				*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_econt_discount">{{ entry_discount }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select class="form-control" id="shipping_tk_econt_discount" name="shipping_tk_econt_discount">*/
/* 											{% if shipping_tk_econt_discount %}*/
/* 											<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% else %}*/
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											{% endif %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* */
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_econt_np_enabled">{{ entry_np }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select class="form-control" id="shipping_tk_econt_np_enabled" name="shipping_tk_econt_np_enabled">*/
/* 											{% if shipping_tk_econt_np_enabled %}*/
/* 											<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% else %}*/
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											{% endif %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 						*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_econt_os_enabled">{{ entry_os }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select class="form-control" id="shipping_tk_econt_os_enabled" name="shipping_tk_econt_os_enabled">*/
/* 											{% if shipping_tk_econt_os_enabled %}*/
/* 											<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% else %}*/
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											{% endif %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* 								*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="input-shipping_tk_econt_os_price">Над каква сума да се прилага услугата обявена стойност</label>*/
/* 									<div class="col-sm-9">*/
/* 										<input type="text" name="shipping_tk_econt_os_price" value="{{ shipping_tk_econt_os_price }}" placeholder="Сума за обавена стойност" id="input-shipping_tk_econt_os_price" class="form-control" />*/
/* 									</div>*/
/* 								</div>*/
/*  */
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_econt_sms_enabled">{{ entry_sms }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select class="form-control" id="shipping_tk_econt_sms_enabled" name="shipping_tk_econt_sms_enabled">*/
/* 											{% if shipping_tk_econt_sms_enabled and shipping_tk_econt_sms_enabled == 1 %}*/
/* 											<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 											<option value="2">Клиента да избере сам</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% elseif shipping_tk_econt_sms_enabled and shipping_tk_econt_sms_enabled == 2 %}*/
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="2" selected="selected">Клиента да избере сам</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% else %}*/
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="2">Клиента да избере сам</option>*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											{% endif %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/*  */
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_econt_dc_enabled">{{ entry_dc }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select class="form-control" id="shipping_tk_econt_dc_enabled" name="shipping_tk_econt_dc_enabled">*/
/* 											{% if shipping_tk_econt_dc_enabled %}*/
/* 											<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% else %}*/
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											{% endif %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/* */
/* 								<div class="form-group">*/
/* 									<label class="col-sm-3 control-label" for="shipping_tk_econt_get_door_enabled">{{ entry_get_address }}</label>*/
/* 									<div class="col-sm-9">*/
/* 										<select class="form-control" id="shipping_tk_econt_get_door_enabled" name="shipping_tk_econt_get_door_enabled">*/
/* 											{% if shipping_tk_econt_get_door_enabled %}*/
/* 											<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 											<option value="0">{{ text_no }}</option>*/
/* 											{% else %}*/
/* 											<option value="1">{{ text_yes }}</option>*/
/* 											<option value="0" selected="selected">{{ text_no }}</option>*/
/* 											{% endif %}*/
/* 										</select>*/
/* 									</div>*/
/* 								</div>*/
/*  */
/*  	*/
/* 							</div>*/
/*  */
/* 						</div>*/
/*  */
/* 						<div class="tab-pane" id="tab-status">*/
/* 							*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-3 control-label" for="shipping_tk_econt_order_status_id">Статус на поръчката след генериране на товарителница:</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_econt_order_status_id" id="shipping_tk_econt_order_status_id" class="form-control">*/
/* 										<option value="0">Без смяна на статуса</option>*/
/* 										{% for order_status in order_statuses %} */
/* 								*/
/* 										{% if (order_status['order_status_id'] == shipping_tk_econt_order_status_id) %} */
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
/* 								<label class="col-sm-3 control-label" for="input-shipping_tk_econt_order_status_id_mail">Да се пратили и-меил след генериране на товарителница:</label>*/
/* 								<div class="col-sm-9">*/
/* 									<select name="shipping_tk_econt_order_status_id_mail" id="input-shipping_tk_econt_order_status_id_mail" class="form-control">*/
/* 										{% if  shipping_tk_econt_order_status_id_mail %} */
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
/* 								<label class="col-sm-3 control-label" for="input-shipping_tk_econt_order_status_id_mail_text">Текст към и-меила след генериране на товарителница<br> ({shipment_number} - заменя номера на товарителница в текста):</label>*/
/* 								<div class="col-sm-9">*/
/* 									<textarea name="shipping_tk_econt_order_status_id_mail_text" rows="3" placeholder="Въведи текст" id="input-shipping_tk_econt_order_status_id_mail_text" class="form-control">{{ shipping_tk_econt_order_status_id_mail_text }}</textarea>*/
/* 								</div>*/
/* 							</div>*/
/* */
/* 							<div class="form-group">*/
/* 								<div class="col-sm-3 text-right"></div>*/
/* 								<div class="col-sm-9">*/
/* 									<br><br><h4><b>Синхронизиране на статуси между Еконт и Opencart и изпращане на и-мейл до клиента</b></h4>*/
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
/* 											<select name="shipping_tk_econt_order_status[{{ key }}]" id="input-shipping_tk_econt_order_status" class="form-control">*/
/* 												<option value="">Без смяна на статуса</option>*/
/* 												{% for order_status in order_statuses %}*/
/* 												{% if  shipping_tk_econt_order_status[key] == order_status.order_status_id %} */
/* 												<option value="{{ order_status.order_status_id }}" selected="selected">{{ order_status.name }}</option>*/
/* 												{% else %} */
/* 												<option value="{{ order_status.order_status_id }}">{{ order_status.name }}</option>*/
/* 												{% endif %} */
/* 												{% endfor %} */
/* 											</select>*/
/* 										</div>*/
/* 										<div class="col-sm-3">Да се изпратили и-мейл до клиента</div>*/
/* 										<div class="col-sm-3">*/
/* 											<select name="shipping_tk_econt_order_status_mail[{{ key }}]" id="input-shipping_tk_econt_order_status_mail" class="form-control">*/
/* 												{% if  shipping_tk_econt_order_status_mail[key] %} */
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
/* 											<textarea name="shipping_tk_econt_order_status_mail_text[{{ key }}]" rows="3" placeholder="Въведи текст" id="input-shipping_tk_econt_order_status_mail_text" class="form-control">{{ shipping_tk_econt_order_status_mail_text[key] }}</textarea>*/
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
/* 									{% for weight_value in shipping_tk_econt_weight_value %}*/
/* 									<tr id="weight-value-row{{ weight_value_row }}">*/
/* 										<td class="text-right"><input type="text" name="shipping_tk_econt_weight_value[{{ weight_value_row }}][from]" value="{{ weight_value.from }}" class="form-control" /></td>*/
/* 										<td class="text-right"><input type="text" name="shipping_tk_econt_weight_value[{{ weight_value_row }}][to]" value="{{ weight_value.to }}" class="form-control" /></td>*/
/* 										<td class="text-right"><input type="text" name="shipping_tk_econt_weight_value[{{ weight_value_row }}][price]" value="{{ weight_value.price }}" class="form-control" /></td>*/
/* 										<td class="text-right">*/
/* 											<select class="form-control" name="shipping_tk_econt_weight_value[{{ weight_value_row }}][type]">*/
/* 												<option value="machine" {% if  weight_value.type == 'machine' %}selected="selected"{% endif %}>До автомат</option>*/
/* 												<option value="office" {% if  weight_value.type == 'office' %}selected="selected"{% endif %}>До офис</option>*/
/* 												<option value="door" {% if  weight_value.type == 'door' %}selected="selected"{% endif %}>До адрес</option>*/
/* 											</select>*/
/* 										</td>*/
/* 										<td class="text-right"><button type="button" onclick="$('#weight-value-row{{ weight_value_row }}').remove();" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>*/
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
/*  						*/
/* 						<div class="tab-pane" id="tab-price_percent">*/
/* 						*/
/* 							<table id="percent-value" class="table table-striped table-bordered table-hover">*/
/* 								<thead>*/
/* 									<tr>*/
/* 										<td class="text-left required">Сума - От</td>*/
/* 										<td class="text-left required">Сума - До (включително)</td>*/
/* 										<td class="text-left required">Процент който ще плати клиента</td>*/
/* 										<td class="text-left required">Вид доставка</td>*/
/* 										<td></td>*/
/* 									</tr>*/
/* 								</thead>*/
/* 								<tbody>*/
/*               */
/* 									*/
/* 									{% for percent_value in shipping_tk_econt_percent_value %}*/
/* 									<tr id="percent-value-row{{ percent_value_row }}">*/
/* 										<td class="text-right"><input type="text" name="shipping_tk_econt_percent_value[{{ percent_value_row }}][from]" value="{{ percent_value.from }}" class="form-control" /></td>*/
/* 										<td class="text-right"><input type="text" name="shipping_tk_econt_percent_value[{{ percent_value_row }}][to]" value="{{ percent_value.to }}" class="form-control" /></td>*/
/* 										<td class="text-right"><input type="text" name="shipping_tk_econt_percent_value[{{ percent_value_row }}][percent]" value="{{ percent_value.percent }}" class="form-control" /></td>*/
/* 										<td class="text-right">*/
/* 											<select class="form-control" name="shipping_tk_econt_percent_value[{{ percent_value_row }}][type]">*/
/* 												<option value="machine" {% if  percent_value.type == 'machine' %}selected="selected"{% endif %}>До автомат</option>*/
/* 												<option value="office" {% if  percent_value.type == 'office' %}selected="selected"{% endif %}>До офис</option>*/
/* 												<option value="door" {% if  percent_value.type == 'door' %}selected="selected"{% endif %}>До адрес</option>*/
/* 											</select>*/
/* 										</td>*/
/* 										<td class="text-right"><button type="button" onclick="$('#percent-value-row{{ percent_value_row }}').remove();" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>*/
/* 									</tr>*/
/* 									{% set percent_value_row = percent_value_row + 1 %}*/
/* 									{% endfor %}*/
/* 								</tbody>*/
/*               */
/* 								<tfoot>*/
/* 									<tr>*/
/* 										<td colspan="4"></td>*/
/* 										<td class="text-right"><button type="button" onclick="addPercentValue();" data-toggle="tooltip" title="{{ button_percent_value_add }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>*/
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
/* 											<input type="text" name="shipping_tk_econt_text[{{ language.language_id }}][machine_title]" value="{{ shipping_tk_econt_text[language.language_id].machine_title ? shipping_tk_econt_text[language.language_id].machine_title : '' }}" class="form-control" />*/
/* 										</div>*/
/* 									{% endfor %}*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							<div class="form-group row">*/
/* 								<label class="col-sm-3 control-label">Автомат - текст </label>*/
/* 								<div class="col-sm-9">*/
/* 									{% for language in languages %}*/
/* 										<div class="input-group" style="margin-bottom: 5px">*/
/* 											<span class="input-group-addon"><img src="language/{{ language.code }}/{{ language.code }}.png" title="{{ language.name }}" /></span>*/
/* 											<input type="text" name="shipping_tk_econt_text[{{ language.language_id }}][machine_text]" value="{{ shipping_tk_econt_text[language.language_id]['machine_text'] ? shipping_tk_econt_text[language.language_id]['machine_text'] : '' }}" class="form-control" />*/
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
/* 											<input type="text" name="shipping_tk_econt_text[{{ language.language_id }}][office_title]" value="{{ shipping_tk_econt_text[language.language_id].office_title ? shipping_tk_econt_text[language.language_id].office_title : '' }}" class="form-control" />*/
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
/* 											<input type="text" name="shipping_tk_econt_text[{{ language.language_id }}][office_text]" value="{{ shipping_tk_econt_text[language.language_id].office_text ? shipping_tk_econt_text[language.language_id].office_text : '' }}" class="form-control" />*/
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
/* 											<input type="text" name="shipping_tk_econt_text[{{ language.language_id }}][address_title]" value="{{ shipping_tk_econt_text[language.language_id].address_title ? shipping_tk_econt_text[language.language_id].address_title : '' }}" class="form-control" />*/
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
/* 											<input type="text" name="shipping_tk_econt_text[{{ language.language_id }}][address_text]" value="{{ shipping_tk_econt_text[language.language_id].address_text ? shipping_tk_econt_text[language.language_id].address_text : '' }}" class="form-control" />*/
/* 										</div>*/
/* 									{% endfor %}*/
/* 								</div>*/
/* 							</div>*/
/* 						*/
/* 						</div>*/
/* 						*/
/* 					</div>*/
/* 					{% else %}*/
/* 					<div class="form-group">*/
/* 						<div class="col-sm-3"></div>*/
/* 						<div class="col-sm-9">*/
/* 							<b>{{ text_sync_info_warning }}</b>*/
/* 						</div>*/
/* 					</div>*/
/* 					{% endif %}*/
/* 					*/
/* 				</div>*/
/* 			</div>*/
/* 			{% endif %}*/
/* 			*/
/* 			{% else %}*/
/* 			*/
/* 			<div class="panel panel-default">*/
/* 				<div class="panel-body">*/
/* 					<h3>Трябва да активирате модула TK Checkout за да позлвате Доставка с Еконт</h3>*/
/* 				</div>*/
/* 			</div>					*/
/* 			*/
/* 			{% endif %}*/
/* 			*/
/* */
/* 		</form>*/
/* 	</div>*/
/* </div>*/
/* */
/* <script type="text/javascript"><!--*/
/* 	*/
/* 	$('select[name=shipping_tk_econt_profile_id]').change(function(){*/
/* 			var name = $('select[name=shipping_tk_econt_profile_id] option:selected').text();*/
/* 			$('input[name=shipping_tk_econt_company_name]').val(name);*/
/* 		});*/
/* */
/* */
/* 	var weight_value_row = {{ weight_value_row}};*/
/* */
/* 	function addWeightValue() {*/
/* 		html  = '<tr id="weight-value-row' + weight_value_row + '">';*/
/* 		html += '  <td class="text-right"><input type="text" name="shipping_tk_econt_weight_value[' + weight_value_row + '][from]" value="" placeholder="0.00" class="form-control" /></td>';*/
/* 		html += '  <td class="text-right"><input type="text" name="shipping_tk_econt_weight_value[' + weight_value_row + '][to]" value="" placeholder="0.00" class="form-control" /></td>';*/
/* 		html += '  <td class="text-right"><input type="text" name="shipping_tk_econt_weight_value[' + weight_value_row + '][price]" value="" placeholder="0.00" class="form-control" /></td>';*/
/* 		html += '  <td class="text-right"><select class="form-control" name="shipping_tk_econt_weight_value[' + weight_value_row + '][type]"><option value="machine">До автомат</option><option value="office">До офис</option><option value="door">До адрес</option></select></td>';*/
/* 		html += '  <td class="text-right"><button type="button" onclick="$(\'#weight-value-row' + weight_value_row + '\').remove();" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';*/
/* 		html += '</tr>';*/
/* */
/* 		$('#weight-value tbody').append(html);*/
/* */
/* 		weight_value_row++;*/
/* 	}*/
/* 	*/
/* 	var percent_value_row = {{ percent_value_row}};*/
/* */
/* 	function addPercentValue() {*/
/* 		html  = '<tr id="percent-value-row' + percent_value_row + '">';*/
/* 		html += '  <td class="text-right"><input type="text" name="shipping_tk_econt_percent_value[' + percent_value_row + '][from]" value="" placeholder="0.00" class="form-control" /></td>';*/
/* 		html += '  <td class="text-right"><input type="text" name="shipping_tk_econt_percent_value[' + percent_value_row + '][to]" value="" placeholder="0.00" class="form-control" /></td>';*/
/* 		html += '  <td class="text-right"><input type="text" name="shipping_tk_econt_percent_value[' + percent_value_row + '][percent]" value="" placeholder="0" class="form-control" /></td>';*/
/* 		html += '  <td class="text-right"><select class="form-control" name="shipping_tk_econt_percent_value[' + percent_value_row + '][type]"><option value="machine">До автомат</option><option value="office">До офис</option><option value="door">До адрес</option></select></td>';*/
/* 		html += '  <td class="text-right"><button type="button" onclick="$(\'#percent-value-row' + percent_value_row + '\').remove();" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';*/
/* 		html += '</tr>';*/
/* */
/* 		$('#percent-value tbody').append(html);*/
/* */
/* 		percent_value_row++;*/
/* 	}*/
/* 	//--></script>*/
/* */
/* 	<script type="text/javascript">*/
/* */
/* 	function econtButtonLogin() {*/
/* 		$('#loading').remove();*/
/* 		$('#login_error').html('').removeClass("text-danger");*/
/* 		$('#login_button').after('<span id="loading" class="attention" style="padding: 5px;">Моля, изчакайте.</span>');*/
/* */
/* 		$.ajax({*/
/* 				url: 'index.php?route=extension/shipping/tk_econt/login&user_token={{ user_token }}',*/
/* 				type: 'POST',*/
/* 				data: 'username=' + encodeURIComponent($('#shipping_tk_econt_username').val()) + '&password=' + encodeURIComponent($('#shipping_tk_econt_password').val()) + '&test=' + encodeURIComponent($('#shipping_tk_econt_test').val()),*/
/* 				dataType: 'json',*/
/* 				success: function(data) {*/
/* 					if (data) {*/
/* 						$('#loading').remove();*/
/* */
/* 						if (data.success) {*/
/* 							window.location = window.location;*/
/* 						} else {*/
/* 							$('#login_error').html(data.message).addClass('text-danger');*/
/* 						} */
/* 					} */
/* 				} ,*/
/* 				error: function(request) {*/
/* 					$('#loading').remove();*/
/* */
/* 					$('#login_error').html('{{ error_general }}').addClass("text-danger");*/
/* 				} */
/* 			});*/
/* 	} */
/* */
/* */
/* 	function refreshData() {*/
/* 		$('#data_error').html('').removeClass("text-danger");*/
/* 		$('#get_data').attr('disabled', true);*/
/* 		$('#get_data').after('<span id="loading" class="attention" style="padding: 5px;">{{ text_get_data }}</span>');*/
/* */
/* */
/* 		$.ajax({*/
/* 				url: 'index.php?route=extension/shipping/tk_econt/update&user_token={{ user_token }}',*/
/* 				type: 'POST',*/
/* 				data: '',*/
/* 				dataType: 'json',*/
/* 				success: function(data) {*/
/* 					if (data) {*/
/* 						if (data.success) {*/
/* 							window.location = window.location;*/
/* 						} else if (data.error) {*/
/* 							$('#data_error').html(data.message).addClass('text-danger');*/
/* 						} */
/* 					} */
/* 				} ,*/
/* 				error: function(request) {*/
/* 					$('#data_error').html('{{ error_general }}').addClass("text-danger");*/
/* 				} ,*/
/* 				complete: function() {*/
/* 					$('#loading').remove();*/
/* 				} */
/* 			});*/
/* 	}*/
/* */
/* 	function econtButtonLogout() {*/
/* 		if (confirm('{{ text_warning_logout }}')) {*/
/* 			$.get('index.php?route=extension/shipping/tk_econt/logout&user_token={{ user_token }}').done(function() {*/
/* 					window.location = window.location;*/
/* 				});*/
/* 		} */
/* 	} */
/* */
/* </script>*/
/* */
/* {{ footer}}*/
/* */
