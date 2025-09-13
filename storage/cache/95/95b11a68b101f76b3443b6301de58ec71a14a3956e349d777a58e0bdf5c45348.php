<?php

/* default/template/tk_checkout/checkout.twig */
class __TwigTemplate_f9b88bf0fb51b5a954f623aa0a5d16084e6b0391a568cad66e2e712645d6c7a4 extends Twig_Template
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
        echo "
<section id=\"tk_checkout\" class=\"tk_checkout_lable_";
        // line 2
        echo (isset($context["module_tk_checkout_title"]) ? $context["module_tk_checkout_title"] : null);
        echo "\">
\t<div class=\"tk_container\" id=\"tk_no_payment\">
\t\t
\t\t";
        // line 5
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 6
            echo "\t\t\t<div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
\t\t\t</div>
\t\t";
        }
        // line 10
        echo "\t\t
\t\t";
        // line 11
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
\t\t<div class=\"tk_clear\"></div>
\t\t
\t\t<h1 class=\"tk_left\">";
        // line 14
        echo (isset($context["checkout_title"]) ? $context["checkout_title"] : null);
        echo "</h1>
\t\t<div class=\"tk_right tk_login_buttons\">
\t\t\t";
        // line 16
        if (( !array_key_exists("customer_id", $context) || ((isset($context["customer_id"]) ? $context["customer_id"] : null) == 0))) {
            // line 17
            echo "\t\t\t\t<button type=\"button\" class=\"tk_btn_clear tk_btn_login\" id=\"tk_login\"><span class=\"tk_icon-login\"></span> ";
            echo (isset($context["text_account_have"]) ? $context["text_account_have"] : null);
            echo "</button>
\t\t\t\t";
            // line 18
            if ((array_key_exists("tk_checkout_fbq_app_id", $context) && (isset($context["tk_checkout_fbq_app_id"]) ? $context["tk_checkout_fbq_app_id"] : null))) {
                // line 19
                echo "\t\t\t\t<a href=\"";
                echo (isset($context["facebook_login_url"]) ? $context["facebook_login_url"] : null);
                echo "\" class=\"tk_btn_clear tk_btn_facebook\"><i class=\"tk_icon-facebook\"></i> ";
                echo (isset($context["text_account_facebook"]) ? $context["text_account_facebook"] : null);
                echo "</a>
\t\t\t";
            }
            // line 21
            echo "\t\t\t";
        }
        // line 22
        echo "\t\t\t<a href=\"";
        echo (isset($context["home"]) ? $context["home"] : null);
        echo "\" class=\"tk_btn_clear home_again tk_btn_home\"><span class=\"tk_icon-cart\"></span> ";
        echo (isset($context["text_buy_more"]) ? $context["text_buy_more"] : null);
        echo "
\t\t\t</a>
\t\t</div>
\t\t<div class=\"tk_clear\"></div>
\t\t";
        // line 26
        if (( !array_key_exists("customer_id", $context) || ((isset($context["customer_id"]) ? $context["customer_id"] : null) == 0))) {
            // line 27
            echo "\t\t\t";
            echo (isset($context["column_login"]) ? $context["column_login"] : null);
            echo "
\t\t";
        }
        // line 29
        echo "\t\t<div class=\"tk_clear\"></div>
\t\t
\t\t<hr>
\t\t
\t\t<div id=\"tk_text_top\">
\t\t\t";
        // line 34
        echo (isset($context["text_top"]) ? $context["text_top"] : null);
        echo "
\t\t\t<div class=\"tk_clear\"></div>
\t\t</div>
\t\t<form ";
        // line 37
        if (( !array_key_exists("module_tk_checkout_autocomplete", $context) || ((isset($context["module_tk_checkout_autocomplete"]) ? $context["module_tk_checkout_autocomplete"] : null) == 0))) {
            echo "autocomplete=\"off\"";
        } else {
            echo "autocomplete=\"on\"";
        }
        echo " >
\t\t\t<div class=\"tk_form\">
\t\t\t\t<input type=\"hidden\" name=\"fax\" value=\"\"/>
\t\t\t\t<input type=\"hidden\" name=\"company\" value=\"\"/>
\t\t\t\t<input type=\"hidden\" name=\"company_id\" value=\"\"/>
\t\t\t\t<input type=\"hidden\" name=\"tax_id\" value=\"\"/>
\t\t\t\t<input type=\"hidden\" name=\"address_2\" value=\"\"/>
\t\t\t\t<input type=\"hidden\" name=\"address_zone_id\" value=\"";
        // line 44
        echo (isset($context["address_zone_id"]) ? $context["address_zone_id"] : null);
        echo "\"/>
\t\t\t\t
\t\t\t\t";
        // line 46
        if ((( !array_key_exists("customer_id", $context) || ((isset($context["customer_id"]) ? $context["customer_id"] : null) == 0)) && (isset($context["random_password"]) ? $context["random_password"] : null))) {
            // line 47
            echo "\t\t\t\t\t<input type=\"hidden\" name=\"register\" value=\"1\">
\t\t\t\t\t<input type=\"hidden\" name=\"password\" value=\"";
            // line 48
            echo (isset($context["random_password"]) ? $context["random_password"] : null);
            echo "\" ";
            if (( !array_key_exists("module_tk_checkout_autocomplete", $context) || ((isset($context["module_tk_checkout_autocomplete"]) ? $context["module_tk_checkout_autocomplete"] : null) == 0))) {
                echo "autocomplete=\"off\"";
            } else {
                echo "autocomplete=\"on\"";
            }
            echo ">
\t\t\t\t\t<input type=\"hidden\" name=\"confirm\" value=\"";
            // line 49
            echo (isset($context["random_password"]) ? $context["random_password"] : null);
            echo "\" ";
            if (( !array_key_exists("module_tk_checkout_autocomplete", $context) || ((isset($context["module_tk_checkout_autocomplete"]) ? $context["module_tk_checkout_autocomplete"] : null) == 0))) {
                echo "autocomplete=\"off\"";
            } else {
                echo "autocomplete=\"on\"";
            }
            echo ">
\t\t\t\t";
        }
        // line 51
        echo "\t\t\t\t
\t\t\t\t<div id=\"tk_error_box\"></div>
\t\t\t\t
\t\t\t\t";
        // line 54
        if (((isset($context["module_tk_checkout_column"]) ? $context["module_tk_checkout_column"] : null) == 2)) {
            // line 55
            echo "\t\t\t\t<div class=\"tk_5_column tk_left_column\">
\t\t\t\t";
        } else {
            // line 57
            echo "\t\t\t\t<div class=\" tk_order_column\">
\t\t\t\t";
        }
        // line 59
        echo "\t\t\t\t
\t\t\t\t\t<div id=\"tk_user_data\">
\t\t\t\t\t\t<div class=\"tk_panel\">
\t\t\t\t\t\t\t<div class=\"tk_panel_heading\">
\t\t\t\t\t\t\t\t<span class=\"tk_panel_icon\"><span class=\"tk_icon-user\"></span></span>
\t\t\t\t\t\t\t\t<span class=\"tk_panel_text\"> ";
        // line 64
        echo (isset($context["text_persondata"]) ? $context["text_persondata"] : null);
        echo "</span>
\t\t\t\t\t\t\t\t<span class=\"tk_all_spin\"><i class=\"tk_icon-spin rotating\"></i></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"tk_panel_body\">
\t\t\t\t\t\t\t\t";
        // line 68
        if (((array_key_exists("customer_id", $context) && ((isset($context["customer_id"]) ? $context["customer_id"] : null) > 0)) || ((isset($context["count_customer_groups"]) ? $context["count_customer_groups"] : null) == 1))) {
            // line 69
            echo "\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"customer_group_id\" value=\"";
            echo (isset($context["customer_group_id"]) ? $context["customer_group_id"] : null);
            echo "\"/>
\t\t\t\t\t\t\t\t";
        } else {
            // line 71
            echo "\t\t\t\t\t\t\t\t\t";
            if ((array_key_exists("module_tk_checkout_customer_group", $context) && ((isset($context["module_tk_checkout_customer_group"]) ? $context["module_tk_checkout_customer_group"] : null) == 1))) {
                // line 72
                echo "\t\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["customer_groups"]) ? $context["customer_groups"] : null));
                foreach ($context['_seq'] as $context["customer_count"] => $context["customer_group"]) {
                    // line 73
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                    if ((($this->getAttribute($context["customer_group"], "customer_group_id", array(), "array") == (isset($context["customer_group_id"]) ? $context["customer_group_id"] : null)) || ($context["customer_count"] == 0))) {
                        // line 74
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"customer_group_id\"><input type=\"radio\" name=\"customer_group_id\" value=\"";
                        // line 75
                        echo $this->getAttribute($context["customer_group"], "customer_group_id", array(), "array");
                        echo "\" checked=\"checked\" onclick=\"var temp = getAccountCustomFields();getAddressCustomFields(); return temp;\"/>";
                        echo $this->getAttribute($context["customer_group"], "name", array(), "array");
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 78
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"customer_group_id\"><input type=\"radio\" name=\"customer_group_id\" value=\"";
                        // line 79
                        echo $this->getAttribute($context["customer_group"], "customer_group_id", array(), "array");
                        echo "\" onclick=\"var temp = getAccountCustomFields();getAddressCustomFields(); return temp;\"/>";
                        echo $this->getAttribute($context["customer_group"], "name", array(), "array");
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 82
                    echo "\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['customer_count'], $context['customer_group'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 83
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t\t<hr class=\"bottom_zero\">
\t\t\t\t\t\t\t\t\t";
            }
            // line 86
            echo "\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t";
        }
        // line 88
        echo "\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column tk_required_box\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"firstname\" value=\"";
        // line 89
        if (array_key_exists("firstname", $context)) {
            echo (isset($context["firstname"]) ? $context["firstname"] : null);
        }
        echo "\" id=\"firstname\" placeholder=\"";
        echo twig_replace_filter((isset($context["entry_firstname"]) ? $context["entry_firstname"] : null), array(":" => ""));
        echo "\" ";
        if (( !array_key_exists("module_tk_checkout_autocomplete", $context) || ((isset($context["module_tk_checkout_autocomplete"]) ? $context["module_tk_checkout_autocomplete"] : null) == 0))) {
            echo "autocomplete=\"off\"";
        } else {
            echo "autocomplete=\"on\"";
        }
        echo "/>
\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 90
        echo twig_replace_filter((isset($context["entry_firstname"]) ? $context["entry_firstname"] : null), array(":" => ""));
        echo "</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column tk_required_box\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"lastname\" value=\"";
        // line 93
        if (array_key_exists("lastname", $context)) {
            echo (isset($context["lastname"]) ? $context["lastname"] : null);
        }
        echo "\" id=\"lastname\" placeholder=\"";
        echo twig_replace_filter((isset($context["entry_lastname"]) ? $context["entry_lastname"] : null), array(":" => ""));
        echo "\" ";
        if (( !array_key_exists("module_tk_checkout_autocomplete", $context) || ((isset($context["module_tk_checkout_autocomplete"]) ? $context["module_tk_checkout_autocomplete"] : null) == 0))) {
            echo "autocomplete=\"off\"";
        } else {
            echo "autocomplete=\"on\"";
        }
        echo "/>
\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
        // line 94
        echo twig_replace_filter((isset($context["entry_lastname"]) ? $context["entry_lastname"] : null), array(":" => ""));
        echo "</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t";
        // line 97
        if (((isset($context["module_tk_checkout_required_phone"]) ? $context["module_tk_checkout_required_phone"] : null) == 3)) {
            // line 98
            echo "\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"telephone\" value=\"not_required\" id=\"telephone\"/>
\t\t\t\t\t\t\t\t";
        } else {
            // line 100
            echo "\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column ";
            if ((((isset($context["module_tk_checkout_required_phone"]) ? $context["module_tk_checkout_required_phone"] : null) == 0) || ((isset($context["module_tk_checkout_required_phone"]) ? $context["module_tk_checkout_required_phone"] : null) == 2))) {
                echo "tk_required_box";
            }
            echo "\">
\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"telephone\" value=\"";
            // line 101
            if (array_key_exists("telephone", $context)) {
                echo (isset($context["telephone"]) ? $context["telephone"] : null);
            }
            echo "\" id=\"telephone\" placeholder=\"";
            echo twig_replace_filter((isset($context["entry_telephone"]) ? $context["entry_telephone"] : null), array(":" => ""));
            echo "\" ";
            if (( !array_key_exists("module_tk_checkout_autocomplete", $context) || ((isset($context["module_tk_checkout_autocomplete"]) ? $context["module_tk_checkout_autocomplete"] : null) == 0))) {
                echo "autocomplete=\"off\"";
            } else {
                echo "autocomplete=\"on\"";
            }
            echo "/>
\t\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 102
            echo twig_replace_filter((isset($context["entry_telephone"]) ? $context["entry_telephone"] : null), array(":" => ""));
            echo "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        // line 105
        echo "\t\t\t\t\t\t\t\t";
        if (((isset($context["module_tk_checkout_required_email"]) ? $context["module_tk_checkout_required_email"] : null) == 3)) {
            // line 106
            echo "\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"email\" value=\"";
            echo (isset($context["module_tk_checkout_customer_mail"]) ? $context["module_tk_checkout_customer_mail"] : null);
            echo "\" id=\"email\"/>
\t\t\t\t\t\t\t\t";
        } else {
            // line 108
            echo "\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column ";
            if (((isset($context["module_tk_checkout_required_email"]) ? $context["module_tk_checkout_required_email"] : null) == 0)) {
                echo "tk_required_box";
            }
            echo "\">
\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"email\" value=\"";
            // line 109
            if (array_key_exists("email", $context)) {
                echo (isset($context["email"]) ? $context["email"] : null);
            }
            echo "\" id=\"email\" placeholder=\"";
            echo twig_replace_filter((isset($context["entry_email"]) ? $context["entry_email"] : null), array(":" => ""));
            echo "\" ";
            if (( !array_key_exists("module_tk_checkout_autocomplete", $context) || ((isset($context["module_tk_checkout_autocomplete"]) ? $context["module_tk_checkout_autocomplete"] : null) == 0))) {
                echo "autocomplete=\"off\"";
            } else {
                echo "autocomplete=\"on\"";
            }
            echo "/>
\t\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 110
            echo twig_replace_filter((isset($context["entry_email"]) ? $context["entry_email"] : null), array(":" => ""));
            echo "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        // line 113
        echo "\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t";
        // line 114
        if (((isset($context["count_countries"]) ? $context["count_countries"] : null) > 1)) {
            // line 115
            echo "\t\t\t\t\t\t\t\t\t";
            if (((isset($context["module_tk_checkout_country_count"]) ? $context["module_tk_checkout_country_count"] : null) > 1)) {
                // line 116
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column tk_required_box\">
\t\t\t\t\t\t\t\t\t\t\t<select name=\"country_id\" id=\"country_id\" ";
                // line 117
                if (( !array_key_exists("module_tk_checkout_autocomplete", $context) || ((isset($context["module_tk_checkout_autocomplete"]) ? $context["module_tk_checkout_autocomplete"] : null) == 0))) {
                    echo "autocomplete=\"off\"";
                } else {
                    echo "autocomplete=\"on\"";
                }
                echo ">
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                // line 118
                echo (isset($context["text_select"]) ? $context["text_select"] : null);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 119
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["countries"]) ? $context["countries"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
                    // line 120
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (twig_in_filter($this->getAttribute($context["country"], "country_id", array(), "array"), (isset($context["module_tk_checkout_country"]) ? $context["module_tk_checkout_country"] : null))) {
                        // line 121
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["country"], "country_id", array(), "array") == (isset($context["country_id"]) ? $context["country_id"] : null))) {
                            // line 122
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["country"], "country_id", array(), "array");
                            echo "\" selected=\"selected\">";
                            echo $this->getAttribute($context["country"], "name", array(), "array");
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 124
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["country"], "country_id", array(), "array");
                            echo "\">";
                            echo $this->getAttribute($context["country"], "name", array(), "array");
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 126
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 127
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 128
                echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
                // line 129
                echo twig_replace_filter((isset($context["entry_country"]) ? $context["entry_country"] : null), array(":" => ""));
                echo "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            } elseif ((            // line 131
(isset($context["module_tk_checkout_country_count"]) ? $context["module_tk_checkout_country_count"] : null) == 0)) {
                // line 132
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column tk_required_box\">
\t\t\t\t\t\t\t\t\t\t\t<select name=\"country_id\" id=\"country_id\" ";
                // line 133
                if (( !array_key_exists("module_tk_checkout_autocomplete", $context) || ((isset($context["module_tk_checkout_autocomplete"]) ? $context["module_tk_checkout_autocomplete"] : null) == 0))) {
                    echo "autocomplete=\"off\"";
                } else {
                    echo "autocomplete=\"on\"";
                }
                echo ">
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
                // line 134
                echo (isset($context["text_select"]) ? $context["text_select"] : null);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 135
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["countries"]) ? $context["countries"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
                    // line 136
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["country"], "country_id", array(), "array") == (isset($context["country_id"]) ? $context["country_id"] : null))) {
                        // line 137
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $this->getAttribute($context["country"], "country_id", array(), "array");
                        echo "\" selected=\"selected\">";
                        echo $this->getAttribute($context["country"], "name", array(), "array");
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 139
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $this->getAttribute($context["country"], "country_id", array(), "array");
                        echo "\">";
                        echo $this->getAttribute($context["country"], "name", array(), "array");
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 141
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 142
                echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
                // line 143
                echo twig_replace_filter((isset($context["entry_country"]) ? $context["entry_country"] : null), array(":" => ""));
                echo "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            } else {
                // line 146
                echo "\t\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["module_tk_checkout_country"]) ? $context["module_tk_checkout_country"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
                    // line 147
                    echo "\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"country_id\" value=\"";
                    echo $context["country"];
                    echo "\"/>
\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 149
                echo "\t\t\t\t\t\t\t\t\t";
            }
            // line 150
            echo "\t\t\t\t\t\t\t\t";
        } else {
            // line 151
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["countries"]) ? $context["countries"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
                // line 152
                echo "\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"country_id\" value=\"";
                echo $this->getAttribute($context["country"], "country_id", array(), "array");
                echo "\"/>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 154
            echo "\t\t\t\t\t\t\t\t";
        }
        // line 155
        echo "\t\t\t\t\t\t\t\t";
        if ((array_key_exists("module_tk_checkout_zone", $context) && ((isset($context["module_tk_checkout_zone"]) ? $context["module_tk_checkout_zone"] : null) == 1))) {
            // line 156
            echo "\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column tk_required_box\">
\t\t\t\t\t\t\t\t\t\t<select name=\"zone_id\" id=\"input-payment-zone\" class=\"form-control\" ";
            // line 157
            if (( !array_key_exists("module_tk_checkout_autocomplete", $context) || ((isset($context["module_tk_checkout_autocomplete"]) ? $context["module_tk_checkout_autocomplete"] : null) == 0))) {
                echo "autocomplete=\"off\"";
            } else {
                echo "autocomplete=\"on\"";
            }
            echo ">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 158
            echo twig_replace_filter((isset($context["entry_zone"]) ? $context["entry_zone"] : null), array(":" => ""));
            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 159
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["zone"]) ? $context["zone"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["zona"]) {
                // line 160
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["zona"], "zone_id", array(), "array") == (isset($context["zone_id"]) ? $context["zone_id"] : null))) {
                    // line 161
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo $this->getAttribute($context["zona"], "zone_id", array(), "array");
                    echo "\" selected=\"selected\">";
                    echo $this->getAttribute($context["zona"], "name", array(), "array");
                    echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 163
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo $this->getAttribute($context["zona"], "zone_id", array(), "array");
                    echo "\">";
                    echo $this->getAttribute($context["zona"], "name", array(), "array");
                    echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 165
                echo "\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['zona'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 166
            echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 167
            echo twig_replace_filter((isset($context["entry_zone"]) ? $context["entry_zone"] : null), array(":" => ""));
            echo "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        // line 170
        echo "\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t";
        // line 171
        if ((( !array_key_exists("customer_id", $context) || ((isset($context["customer_id"]) ? $context["customer_id"] : null) == 0)) && ((isset($context["module_tk_checkout_register"]) ? $context["module_tk_checkout_register"] : null) == 2))) {
            // line 172
            echo "\t\t\t\t\t\t\t\t<div id=\"tk_register_top\">
\t\t\t\t\t\t\t\t\t";
            // line 173
            if ((array_key_exists("config_checkout_guest", $context) && ((isset($context["config_checkout_guest"]) ? $context["config_checkout_guest"] : null) == 1))) {
                // line 174
                echo "\t\t\t\t\t\t\t\t\t\t";
                if (((isset($context["module_tk_checkout_required_email"]) ? $context["module_tk_checkout_required_email"] : null) != 3)) {
                    // line 175
                    echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"register\" onclick=\"\$('#tk_register_form').toggle();\$('#tk_newsletter').toggle();\" id=\"tk_register\">
\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"tk_register\">";
                    // line 177
                    echo (isset($context["text_register"]) ? $context["text_register"] : null);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 181
                echo "\t\t\t\t\t\t\t\t\t";
            } else {
                // line 182
                echo "\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"register\" value=\"1\">
\t\t\t\t\t\t\t\t\t";
            }
            // line 184
            echo "
\t\t\t\t\t\t\t\t\t<div id=\"tk_register_form\" ";
            // line 185
            if (((array_key_exists("config_checkout_guest", $context) && ((isset($context["config_checkout_guest"]) ? $context["config_checkout_guest"] : null) == 1)) || ((isset($context["module_tk_checkout_required_email"]) ? $context["module_tk_checkout_required_email"] : null) == 3))) {
                echo "style=\"display:none\"";
            }
            echo ">
\t\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" name=\"password\" value=\"\" placeholder=\"";
            // line 187
            echo twig_replace_filter((isset($context["entry_password"]) ? $context["entry_password"] : null), array(":" => ""));
            echo "\" autocomplete=\"off\"/>
\t\t\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 188
            echo twig_replace_filter((isset($context["entry_password"]) ? $context["entry_password"] : null), array(":" => ""));
            echo "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" name=\"confirm\" value=\"\" placeholder=\"";
            // line 191
            echo twig_replace_filter((isset($context["entry_confirm"]) ? $context["entry_confirm"] : null), array(":" => ""));
            echo "\" autocomplete=\"off\"/>
\t\t\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 192
            echo twig_replace_filter((isset($context["entry_confirm"]) ? $context["entry_confirm"] : null), array(":" => ""));
            echo "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
            // line 196
            if (( !array_key_exists("customer_id", $context) || (((((isset($context["customer_id"]) ? $context["customer_id"] : null) == 0) && ((isset($context["count_customer_groups"]) ? $context["count_customer_groups"] : null) > 1)) && array_key_exists("module_tk_checkout_customer_group", $context)) && ((isset($context["module_tk_checkout_customer_group"]) ? $context["module_tk_checkout_customer_group"] : null) == 1)))) {
                // line 197
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["customer_groups"]) ? $context["customer_groups"] : null));
                foreach ($context['_seq'] as $context["customer_count"] => $context["customer_group"]) {
                    // line 198
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((($this->getAttribute($context["customer_group"], "customer_group_id", array(), "array") == (isset($context["customer_group_id"]) ? $context["customer_group_id"] : null)) || ($context["customer_count"] == 0))) {
                        // line 199
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"customer_group_id\"><input type=\"radio\" name=\"customer_group_id\" value=\"";
                        // line 200
                        echo $this->getAttribute($context["customer_group"], "customer_group_id", array(), "array");
                        echo "\" checked=\"checked\" onclick=\"var temp = getAccountCustomFields();getAddressCustomFields(); return temp;\"/>";
                        echo $this->getAttribute($context["customer_group"], "name", array(), "array");
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 203
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"customer_group_id\"><input type=\"radio\" name=\"customer_group_id\" value=\"";
                        // line 204
                        echo $this->getAttribute($context["customer_group"], "customer_group_id", array(), "array");
                        echo "\" onclick=\"var temp = getAccountCustomFields();getAddressCustomFields(); return temp;\"/>";
                        echo $this->getAttribute($context["customer_group"], "name", array(), "array");
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 207
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['customer_count'], $context['customer_group'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 208
                echo "\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 209
            echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        // line 213
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div id=\"tk_account_custom_fields_table\">
\t\t\t\t\t\t";
        // line 218
        if ((array_key_exists("account_custom_fields", $context) && (isset($context["account_custom_fields"]) ? $context["account_custom_fields"] : null))) {
            // line 219
            echo "\t\t\t\t\t\t\t<div class=\"tk_account_custom_fields\">
\t\t\t\t\t\t\t\t<div class=\"tk_panel\">
\t\t\t\t\t\t\t\t\t<div class=\"tk_panel_heading\">
\t\t\t\t\t\t\t\t\t\t<span class=\"tk_panel_icon\"><span class=\"tk_icon-briefcas\"></span></span>
\t\t\t\t\t\t\t\t\t\t<span class=\"tk_panel_text\"> ";
            // line 223
            echo (isset($context["text_invoice"]) ? $context["text_invoice"] : null);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t<span class=\"tk_all_spin\"><i class=\"tk_icon-spin rotating\"></i></span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"tk_panel_body\">
\t\t\t\t\t\t\t\t\t\t";
            // line 227
            $context["invoice_checkbox"] = twig_constant("false");
            // line 228
            echo "\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["account_custom_fields"]) ? $context["account_custom_fields"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
                // line 229
                echo "\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["custom_field"], "location", array(), "array") == "account")) {
                    // line 230
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["custom_field"], "type", array(), "array") == "checkbox")) {
                        // line 231
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["custom_field"], "custom_field_value", array(), "array"));
                        foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                            // line 232
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($context["custom_field"], "custom_field_id", array(), "array") == (isset($context["module_tk_checkout_invoice"]) ? $context["module_tk_checkout_invoice"] : null))) {
                                // line 233
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["invoice_checkbox"] = true;
                                // line 234
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"invoice_checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"invoice_checkbox\" name=\"custom_field[";
                                // line 236
                                echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                                echo "][";
                                echo $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array");
                                echo "][]\" value=\"";
                                echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                                echo "\" id=\"custom_field_";
                                echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                                echo "_";
                                echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                                echo "\" class=\"custom_field\" ";
                                if (($this->getAttribute($this->getAttribute((isset($context["account_custom_field"]) ? $context["account_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array", false, true), 0, array(), "array", true, true) && ($this->getAttribute($this->getAttribute((isset($context["account_custom_field"]) ? $context["account_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array"), 0, array(), "array") == $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array")))) {
                                    echo " ";
                                    $context["account_custom_field_open"] = 1;
                                    echo " data-invoice=\"1\" checked=\"\" ";
                                }
                                echo "data-invoice=\"0\" ";
                                if ((isset($context["invoice_checkbox"]) ? $context["invoice_checkbox"] : null)) {
                                    echo "onclick=\"jQuery('.invoice-form').toggle()\"";
                                }
                                echo " />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 237
                                echo $this->getAttribute($context["custom_field"], "name", array(), "array");
                                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 241
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 242
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 245
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 246
                echo "\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 247
            echo "\t\t\t\t\t\t\t\t\t\t";
            if (((isset($context["module_tk_checkout_invoice"]) ? $context["module_tk_checkout_invoice"] : null) == 9999)) {
                // line 248
                echo "\t\t\t\t\t\t\t\t\t\t\t";
                $context["account_custom_field_open"] = 1;
                // line 249
                echo "\t\t\t\t\t\t\t\t\t\t";
            }
            // line 250
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"invoice-form\" ";
            if (array_key_exists("account_custom_field_open", $context)) {
                echo "style=\"display:block\" ";
            } else {
                echo "style=\"display:none\" ";
            }
            echo ">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 251
            if (((isset($context["invoice_checkbox"]) ? $context["invoice_checkbox"] : null) == true)) {
                // line 252
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<hr class=\"bottom_zero\">";
            }
            // line 253
            echo "\t\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["account_custom_fields"]) ? $context["account_custom_fields"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
                // line 254
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["custom_field"], "location", array(), "array") == "account")) {
                    // line 255
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["custom_field"], "type", array(), "array") == "text")) {
                        // line 256
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"custom_field[";
                        // line 257
                        echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                        echo "][";
                        echo $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array");
                        echo "]\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tvalue=\"";
                        // line 258
                        if ($this->getAttribute((isset($context["account_custom_field"]) ? $context["account_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array", true, true)) {
                            echo $this->getAttribute((isset($context["account_custom_field"]) ? $context["account_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array");
                        }
                        echo "\" id=\"custom_field";
                        echo $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array");
                        echo "\" class=\"form-control custom_field\" placeholder=\"";
                        echo $this->getAttribute($context["custom_field"], "name", array(), "array");
                        echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
                        // line 259
                        echo $this->getAttribute($context["custom_field"], "name", array(), "array");
                        echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 262
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["custom_field"], "type", array(), "array") == "checkbox")) {
                        // line 263
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["custom_field"], "custom_field_value", array(), "array"));
                        foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                            // line 264
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($context["custom_field"], "custom_field_id", array(), "array") != (isset($context["module_tk_checkout_invoice"]) ? $context["module_tk_checkout_invoice"] : null))) {
                                // line 265
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"custom_field_";
                                // line 266
                                echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                                echo "_";
                                echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                                echo "\"><input type=\"checkbox\" name=\"custom_field[";
                                echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                                echo "][";
                                echo $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array");
                                echo "][]\" value=\"";
                                echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                                echo "\" id=\"custom_field_";
                                echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                                echo "_";
                                echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                                echo "\" class=\"custom_field\" ";
                                if (($this->getAttribute($this->getAttribute((isset($context["account_custom_field"]) ? $context["account_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array", false, true), 0, array(), "array", true, true) && ($this->getAttribute($this->getAttribute((isset($context["account_custom_field"]) ? $context["account_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array"), 0, array(), "array") == $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array")))) {
                                    echo " checked=\"\"";
                                }
                                echo " />";
                                echo $this->getAttribute($context["custom_field"], "name", array(), "array");
                                echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 269
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 270
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 271
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["custom_field"], "type", array(), "array") == "radio")) {
                        // line 272
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>";
                        // line 273
                        echo $this->getAttribute($context["custom_field"], "name", array(), "array");
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 275
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["custom_field"], "custom_field_value", array(), "array"));
                        foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                            // line 276
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"custom_field_";
                            // line 277
                            echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                            echo "_";
                            echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                            echo "\"><input type=\"radio\" name=\"custom_field[";
                            echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                            echo "][";
                            echo $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array");
                            echo "]\" value=\"";
                            echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                            echo "\" id=\"custom_field_";
                            echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                            echo "_";
                            echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                            echo "\" class=\"custom_field\" ";
                            if (($this->getAttribute($this->getAttribute((isset($context["account_custom_field"]) ? $context["account_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array", false, true), 0, array(), "array", true, true) && ($this->getAttribute($this->getAttribute((isset($context["account_custom_field"]) ? $context["account_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array"), 0, array(), "array") == $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array")))) {
                                echo " checked=\"\"";
                            }
                            echo " />";
                            echo $this->getAttribute($context["custom_field_value"], "name", array(), "array");
                            echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 280
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 281
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["custom_field"], "type", array(), "array") == "select")) {
                        // line 282
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"custom_field[";
                        // line 283
                        echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                        echo "][";
                        echo $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array");
                        echo "]\" id=\"input-payment-custom-field";
                        echo $this->getAttribute($context["custom_field"], "custom_field_id", array());
                        echo "\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">";
                        // line 284
                        echo (isset($context["text_select"]) ? $context["text_select"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 285
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["custom_field"], "custom_field_value", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                            // line 286
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array());
                            echo "\">";
                            echo $this->getAttribute($context["custom_field_value"], "name", array());
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 288
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 291
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 292
                echo "\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 293
            echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        // line 299
        echo "\t\t\t\t\t</div>

\t\t\t\t\t<div id=\"tk_address_custom_fields_table\">
\t\t\t\t\t\t";
        // line 302
        if ((array_key_exists("address_custom_fields", $context) && (isset($context["address_custom_fields"]) ? $context["address_custom_fields"] : null))) {
            // line 303
            echo "\t\t\t\t\t\t\t<div class=\"tk_address_custom_fields\">
\t\t\t\t\t\t\t\t<div class=\"tk_panel\">
\t\t\t\t\t\t\t\t\t<div class=\"tk_panel_heading\">
\t\t\t\t\t\t\t\t\t\t<span class=\"tk_panel_icon\"><span class=\"tk_icon-user\"></span></span>
\t\t\t\t\t\t\t\t\t\t<span class=\"tk_panel_text\"> ";
            // line 307
            echo (isset($context["text_other"]) ? $context["text_other"] : null);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t<span class=\"tk_all_spin\"><i class=\"tk_icon-spin rotating\"></i></span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"tk_panel_body\">
\t\t\t\t\t\t\t\t\t\t";
            // line 311
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["address_custom_fields"]) ? $context["address_custom_fields"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
                // line 312
                echo "\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["custom_field"], "location", array(), "array") == "address")) {
                    // line 313
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["custom_field"], "type", array(), "array") == "text")) {
                        // line 314
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"custom_field[";
                        // line 315
                        echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                        echo "][";
                        echo $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array");
                        echo "]\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\tvalue=\"";
                        // line 316
                        if ($this->getAttribute((isset($context["address_custom_field"]) ? $context["address_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array", true, true)) {
                            echo $this->getAttribute((isset($context["address_custom_field"]) ? $context["address_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array");
                        }
                        echo "\" id=\"custom_field";
                        echo $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array");
                        echo "\" class=\"form-control custom_field\" placeholder=\"";
                        echo twig_replace_filter($this->getAttribute($context["custom_field"], "name", array(), "array"), array(":" => ""));
                        echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
                        // line 317
                        echo twig_replace_filter($this->getAttribute($context["custom_field"], "name", array(), "array"), array(":" => ""));
                        echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 320
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["custom_field"], "type", array(), "array") == "checkbox")) {
                        // line 321
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["custom_field"], "custom_field_value", array(), "array"));
                        foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                            // line 322
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"custom_field_";
                            // line 323
                            echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                            echo "_";
                            echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"custom_field[";
                            // line 324
                            echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                            echo "][";
                            echo $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array");
                            echo "][]\" value=\"";
                            echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                            echo "\" id=\"custom_field_";
                            echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                            echo "_";
                            echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                            echo "\" class=\"custom_field\" ";
                            if (($this->getAttribute($this->getAttribute((isset($context["address_custom_field"]) ? $context["address_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array", false, true), 0, array(), "array", true, true) && ($this->getAttribute($this->getAttribute((isset($context["address_custom_field"]) ? $context["address_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array"), 0, array(), "array") == $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array")))) {
                                echo "checked=\"\"";
                            }
                            echo " />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 325
                            echo $this->getAttribute($context["custom_field"], "name", array(), "array");
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 329
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 330
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["custom_field"], "type", array(), "array") == "radio")) {
                        // line 331
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 333
                        echo $this->getAttribute($context["custom_field"], "name", array(), "array");
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 336
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["custom_field"], "custom_field_value", array(), "array"));
                        foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                            // line 337
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"custom_field[";
                            // line 338
                            echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                            echo "][";
                            echo $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array");
                            echo "]\" value=\"";
                            echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                            echo "\" id=\"custom_field_";
                            echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                            echo "_";
                            echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                            echo "\" class=\"custom_field\" ";
                            if (($this->getAttribute($this->getAttribute((isset($context["address_custom_field"]) ? $context["address_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array", false, true), 0, array(), "array", true, true) && ($this->getAttribute($this->getAttribute((isset($context["address_custom_field"]) ? $context["address_custom_field"] : null), $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array"), array(), "array"), 0, array(), "array") == $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array")))) {
                                echo "checked=\"\"";
                            }
                            echo " />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"custom_field_";
                            // line 339
                            echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                            echo "_";
                            echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array(), "array");
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 340
                            echo $this->getAttribute($context["custom_field_value"], "name", array(), "array");
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 344
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 345
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["custom_field"], "type", array(), "array") == "select")) {
                        // line 346
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"custom_field[";
                        // line 347
                        echo $this->getAttribute($context["custom_field"], "location", array(), "array");
                        echo "][";
                        echo $this->getAttribute($context["custom_field"], "custom_field_id", array(), "array");
                        echo "]\" id=\"input-payment-custom-field";
                        echo $this->getAttribute($context["custom_field"], "custom_field_id", array());
                        echo "\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">";
                        // line 348
                        echo (isset($context["text_select"]) ? $context["text_select"] : null);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 349
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["custom_field"], "custom_field_value", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                            // line 350
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $this->getAttribute($context["custom_field_value"], "custom_field_value_id", array());
                            echo "\">";
                            echo $this->getAttribute($context["custom_field_value"], "name", array());
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 352
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 355
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 356
                echo "\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 357
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        // line 362
        echo "\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t";
        // line 364
        if ((isset($context["shipping_error_warning"]) ? $context["shipping_error_warning"] : null)) {
            // line 365
            echo "\t\t\t\t\t\t<div class=\"tk_alert_stay\"> ";
            echo (isset($context["shipping_error_warning"]) ? $context["shipping_error_warning"] : null);
            echo "</div>
\t\t\t\t\t";
        }
        // line 367
        echo "\t\t\t\t\t
\t\t\t\t\t";
        // line 368
        if ((isset($context["shipping_methods"]) ? $context["shipping_methods"] : null)) {
            // line 369
            echo "\t\t\t\t\t\t<div id=\"tk_shipping_methods\">
\t\t\t\t\t\t\t<div class=\"tk_panel\">
\t\t\t\t\t\t\t\t<div class=\"tk_panel_heading\">
\t\t\t\t\t\t\t\t\t<span class=\"tk_panel_icon\"><span class=\"tk_icon-delivery\"></span></span>
\t\t\t\t\t\t\t\t\t<span class=\"tk_panel_text\"> ";
            // line 373
            echo (isset($context["text_shiping_select"]) ? $context["text_shiping_select"] : null);
            echo "</span>
\t\t\t\t\t\t\t\t\t<span class=\"tk_all_spin\"><i class=\"tk_icon-spin rotating\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"tk_panel_body\">
\t\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"shipping_method_error\" value=\"\"/>
\t\t\t\t\t\t\t\t\t\t<div id=\"tk_shipping_table\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_shipping_methods\">
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 381
            $context["counter"] = 0;
            // line 382
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["shipping_methods"]) ? $context["shipping_methods"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["shipping_method"]) {
                // line 383
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if ( !$this->getAttribute($context["shipping_method"], "error", array(), "array")) {
                    // line 384
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["counter_quote"] = 0;
                    // line 385
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["shipping_method"], "quote", array(), "array"));
                    foreach ($context['_seq'] as $context["_key"] => $context["quote"]) {
                        // line 386
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_shipping_method\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"shipping_check_";
                        // line 387
                        echo $this->getAttribute($context["quote"], "code", array(), "array");
                        echo "\" class=\"";
                        echo twig_replace_filter($this->getAttribute($context["quote"], "code", array(), "array"), array("." => "_"));
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 388
                        if (($this->getAttribute((isset($context["shipping_method_code"]) ? $context["shipping_method_code"] : null), "code", array(), "array", true, true) && ($this->getAttribute($context["quote"], "code", array(), "array") == $this->getAttribute((isset($context["shipping_method_code"]) ? $context["shipping_method_code"] : null), "code", array(), "array")))) {
                            // line 389
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"shipping_method\" value=\"";
                            echo $this->getAttribute($context["quote"], "code", array(), "array");
                            echo "\" title=\"";
                            echo $this->getAttribute($context["quote"], "title", array(), "array");
                            echo "\" checked=\"checked\" id=\"shipping_check_";
                            echo $this->getAttribute($context["quote"], "code", array(), "array");
                            echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 391
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if ((((isset($context["counter"]) ? $context["counter"] : null) == 0) && ((isset($context["counter_quote"]) ? $context["counter_quote"] : null) == 0))) {
                                // line 392
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" class=\"shipping_method\" name=\"shipping_method\" value=\"";
                                echo $this->getAttribute($context["quote"], "code", array(), "array");
                                echo "\" title=\"";
                                echo $this->getAttribute($context["quote"], "title", array(), "array");
                                echo "\" checked=\"checked\" id=\"shipping_check_";
                                echo $this->getAttribute($context["quote"], "code", array(), "array");
                                echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 394
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" class=\"shipping_method\" name=\"shipping_method\" value=\"";
                                echo $this->getAttribute($context["quote"], "code", array(), "array");
                                echo "\" title=\"";
                                echo $this->getAttribute($context["quote"], "title", array(), "array");
                                echo "\" id=\"shipping_check_";
                                echo $this->getAttribute($context["quote"], "code", array(), "array");
                                echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 396
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 397
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_shipping_method_txt_box\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"";
                        // line 398
                        echo twig_replace_filter($this->getAttribute($context["quote"], "code", array(), "array"), array("." => "_"));
                        echo " ";
                        if ($this->getAttribute($context["quote"], "name", array(), "array", true, true)) {
                            echo "tk_next_";
                            echo $this->getAttribute($context["quote"], "name", array(), "array");
                        }
                        echo " ";
                        echo $context["key"];
                        echo " tk_shipping_method_icon \"></span><span class=\"tk_shipping_method_title\">";
                        echo $this->getAttribute($context["quote"], "title", array(), "array");
                        if ($this->getAttribute($context["quote"], "description", array(), "array")) {
                            // line 399
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<small>";
                            // line 400
                            echo $this->getAttribute($context["quote"], "description", array(), "array");
                            echo "</small>";
                        }
                        echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"tk_shipping_method_price\">";
                        // line 401
                        echo $this->getAttribute($context["quote"], "text", array(), "array");
                        echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 406
                        $context["counter_quote"] = ((isset($context["counter_quote"]) ? $context["counter_quote"] : null) + 1);
                        // line 407
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['quote'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 408
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 409
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_alert\">";
                    echo $this->getAttribute($context["shipping_method"], "error", array(), "array");
                    echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 411
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : null) + 1);
                // line 412
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['shipping_method'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 413
            echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div id=\"tk_text_free_shipping_table\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        } else {
            // line 422
            echo "\t\t\t\t\t<input type=\"hidden\" name=\"shipping_method_error\" value=\"\"/>
\t\t\t\t\t\t<div id=\"tk_shipping_table\">
\t\t\t\t\t\t\t<div class=\"tk_shipping_methods\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\$(document).ready(function () {
\t\t\t\t\t\t\t\tgetPaymentMethod();
\t\t\t\t\t\t\t});
\t\t\t\t\t\t</script>
\t\t\t\t\t";
        }
        // line 432
        echo "\t\t\t\t\t
\t\t\t\t\t<div id=\"tk_address_table\"></div>
\t\t\t\t\t
\t\t\t\t\t<div id=\"tk_payment_methods\">
\t\t\t\t\t\t<div class=\"tk_panel\">
\t\t\t\t\t\t\t<div class=\"tk_panel_heading\">
\t\t\t\t\t\t\t\t<span class=\"tk_panel_icon\"><span class=\"tk_icon-money\"></span></span>
\t\t\t\t\t\t\t\t<span class=\"tk_panel_text\"> ";
        // line 439
        echo (isset($context["text_payment_select"]) ? $context["text_payment_select"] : null);
        echo "</span>
\t\t\t\t\t\t\t\t<span class=\"tk_all_spin\"><i class=\"tk_icon-spin rotating\"></i></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"tk_panel_body\">
\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"payment_method_error\" value=\"\"/>
\t\t\t\t\t\t\t\t\t<div id=\"tk_payment_table\">
\t\t\t\t\t\t\t\t\t\t";
        // line 446
        if ((isset($context["payment_error_warning"]) ? $context["payment_error_warning"] : null)) {
            // line 447
            echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_alert_stay\"> ";
            echo (isset($context["payment_error_warning"]) ? $context["payment_error_warning"] : null);
            echo "</div>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 449
        echo "\t\t\t\t\t\t\t\t\t\t";
        if ((isset($context["payment_methods"]) ? $context["payment_methods"] : null)) {
            // line 450
            echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_payment_methods\">
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 451
            $context["counter"] = 0;
            // line 452
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["payment_methods"]) ? $context["payment_methods"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["payment_method"]) {
                // line 453
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"payment_method_popup_";
                echo $this->getAttribute($context["payment_method"], "code", array(), "array");
                echo "\" value=\"";
                echo $this->getAttribute($context["payment_method"], "popup_payment", array(), "array");
                echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_payment_method\" id=\"payment_code_";
                // line 454
                echo $this->getAttribute($context["payment_method"], "code", array(), "array");
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"payment_check_";
                // line 455
                echo $this->getAttribute($context["payment_method"], "code", array(), "array");
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"payment_method\" value=\"";
                // line 456
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
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"payment_check_bgr\">";
                // line 457
                echo $this->getAttribute($context["payment_method"], "title", array(), "array");
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 460
                $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : null) + 1);
                // line 461
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['payment_method'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 462
            echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 464
        echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t<style>
\t\t\t\t\t\t\t\t\t#tk_payment_triger #button-confirm {display: none;}
\t\t\t\t\t\t\t\t\t#tk_payment_display #button-confirm {display: none;}
\t\t\t\t\t\t\t\t</style>
\t\t\t\t\t\t\t\t<div id=\"tk_payment_display\"></div>
\t\t\t\t\t\t\t\t<div id=\"tk_payment_triger\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t
\t\t\t\t";
        // line 478
        if (((isset($context["module_tk_checkout_column"]) ? $context["module_tk_checkout_column"] : null) == 2)) {
            // line 479
            echo "\t\t\t\t</div>
\t\t\t\t<div class=\"tk_7_column tk_right_column\">
\t\t\t\t";
        }
        // line 482
        echo "\t\t\t\t
\t\t\t\t\t<div id=\"tk_cart\">
\t\t\t\t\t\t<div class=\"tk_panel\">
\t\t\t\t\t\t\t<div class=\"tk_panel_heading\">
\t\t\t\t\t\t\t\t<span class=\"tk_panel_icon\"><span class=\"tk_icon-cart\"></span></span> 
\t\t\t\t\t\t\t\t<span class=\"tk_panel_text\"> ";
        // line 487
        echo (isset($context["text_cart"]) ? $context["text_cart"] : null);
        echo " ";
        if ((array_key_exists("config_cart_weight", $context) && ((isset($context["config_cart_weight"]) ? $context["config_cart_weight"] : null) == 1))) {
            echo "(
\t\t\t\t\t\t\t\t\t\t<span class=\"tk_weight_cart\">";
            // line 488
            echo (isset($context["weight_cart"]) ? $context["weight_cart"] : null);
            echo "</span>)";
        }
        echo "</span>
\t\t\t\t\t\t\t\t<span class=\"tk_all_spin\"><i class=\"tk_icon-spin rotating\"></i></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"tk_panel_body\">
\t\t\t\t\t\t\t\t<table class=\"tk_table\">
\t\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>";
        // line 495
        echo (isset($context["column_image"]) ? $context["column_image"] : null);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t<th>";
        // line 496
        echo (isset($context["column_name"]) ? $context["column_name"] : null);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t<th class=\"tk_only_desctop\" style=\" min-width: 130px;\">";
        // line 497
        echo (isset($context["column_quantity"]) ? $context["column_quantity"] : null);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t<th class=\"tk_only_desctop\">";
        // line 498
        echo (isset($context["column_price"]) ? $context["column_price"] : null);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t<th class=\"tk_text_right\">";
        // line 499
        echo (isset($context["column_total"]) ? $context["column_total"] : null);
        echo "</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t";
        // line 503
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 504
            echo "\t\t\t\t\t\t\t\t\t\t<tr id=\"tk_cart_product_";
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t<td class=\"tk_text_center\">
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 506
            if ($this->getAttribute($context["product"], "thumb", array())) {
                // line 507
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                echo $this->getAttribute($context["product"], "href", array());
                echo "\"><img src=\"";
                echo $this->getAttribute($context["product"], "thumb", array());
                echo "\"/></a>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 509
            echo "\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 511
            if ( !$this->getAttribute($context["product"], "stock", array())) {
                // line 512
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_alert_stay\">***</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 514
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            echo $this->getAttribute($context["product"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["product"], "name", array());
            echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 515
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["product"], "option", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                // line 516
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<small> - ";
                // line 517
                echo $this->getAttribute($context["option"], "name", array());
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t: ";
                // line 518
                if (($this->getAttribute($context["option"], "option_value", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($context["option"], "option_value", array())))) {
                    echo $this->getAttribute($context["option"], "option_value", array());
                } elseif ($this->getAttribute($context["option"], "value", array(), "any", true, true)) {
                    echo $this->getAttribute($context["option"], "value", array());
                }
                echo "</small>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 520
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            if ($this->getAttribute($context["product"], "reward", array())) {
                // line 521
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<small>";
                // line 522
                echo $this->getAttribute($context["product"], "reward", array());
                echo "</small>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 524
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            if ($this->getAttribute($context["product"], "recurring", array())) {
                // line 525
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"label label-info\">";
                // line 526
                echo (isset($context["text_recurring_item"]) ? $context["text_recurring_item"] : null);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t<small>";
                // line 528
                echo $this->getAttribute($context["product"], "recurring", array());
                echo "</small>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 530
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_only_mobile\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span id=\"tk_save_m\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" value=\"";
            // line 532
            echo $this->getAttribute($context["product"], "quantity", array());
            echo "\" class=\"tk_qantity_input_m\" name=\"quantity[";
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "]\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"tk_btn_update\" type=\"button\" onclick=\"updateCart('";
            // line 533
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "', \$('#tk_save_m input[name=\\'quantity[";
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "]\\']').val(), '";
            echo (isset($context["lang"]) ? $context["lang"] : null);
            echo "');\"><i class=\"tk_icon-refresh\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" onclick=\"removeCart('";
            // line 534
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "');\" title=\"Премахване\" class=\"tk_btn_remove\"><i class=\"tk_icon-close\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"tk_only_desctop\">
\t\t\t\t\t\t\t\t\t\t\t\t<span id=\"tk_save_d\">\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" value=\"";
            // line 540
            echo $this->getAttribute($context["product"], "quantity", array());
            echo "\" class=\"tk_qantity_input_d\" name=\"quantity[";
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "]\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"tk_btn_update\" type=\"button\" onclick=\"updateCart('";
            // line 541
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "', \$('#tk_save_d input[name=\\'quantity[";
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "]\\']').val(), '";
            echo (isset($context["lang"]) ? $context["lang"] : null);
            echo "');\"><i class=\"tk_icon-refresh\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" onclick=\"removeCart('";
            // line 542
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "');\" title=\"Премахване\" class=\"tk_btn_remove\"><i class=\"tk_icon-close\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"tk_only_desctop\">
\t\t\t\t\t\t\t\t\t\t\t\t<span id=\"tk_cart_product_price_";
            // line 546
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "\">";
            echo $this->getAttribute($context["product"], "price", array());
            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"tk_text_right\">
\t\t\t\t\t\t\t\t\t\t\t\t<span id=\"tk_cart_product_total_";
            // line 549
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "\">";
            echo $this->getAttribute($context["product"], "total", array());
            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 553
        echo "\t\t\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["vouchers"]) ? $context["vouchers"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["voucher_cart"]) {
            // line 554
            echo "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td>*</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 556
            echo $this->getAttribute($context["voucher_cart"], "description", array());
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"tk_only_desctop\">1</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"tk_only_desctop\">";
            // line 558
            echo $this->getAttribute($context["voucher_cart"], "amount", array());
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"tk_text_right\">";
            // line 559
            echo $this->getAttribute($context["voucher_cart"], "amount", array());
            echo "</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['voucher_cart'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 562
        echo "\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t<div id=\"tk_cart_table\">
\t\t\t\t\t\t\t\t\t";
        // line 566
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["totals"]) ? $context["totals"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["total"]) {
            // line 567
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"tk_totals_price c-";
            echo $this->getAttribute($context["total"], "code", array());
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_totals_left\"><strong>";
            // line 568
            echo $this->getAttribute($context["total"], "title", array());
            echo ":</strong></div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_totals_right\">";
            // line 569
            echo $this->getAttribute($context["total"], "text", array());
            echo "</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['total'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 573
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t";
        // line 575
        if ((isset($context["tk_special_totals"]) ? $context["tk_special_totals"] : null)) {
            // line 576
            echo "\t\t\t\t\t\t\t\t<div id=\"tk_special_totals\" style=\"margin-top: 15px;text-align: right;\">
\t\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t\t";
            // line 578
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tk_special_totals"]) ? $context["tk_special_totals"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["tk_special_total"]) {
                // line 579
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"tk_check_box\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"tk_special_total[";
                // line 580
                echo $this->getAttribute($context["tk_special_total"], "special_total_id", array());
                echo "]\" class=\"tk_special_total\" id=\"tk_special_total_";
                echo $this->getAttribute($context["tk_special_total"], "special_total_id", array());
                echo "\"  ";
                if ($this->getAttribute($context["tk_special_total"], "status", array())) {
                    echo "checked";
                }
                echo ">
\t\t\t\t\t\t\t\t\t\t\t<label for=\"tk_special_total_";
                // line 581
                echo $this->getAttribute($context["tk_special_total"], "special_total_id", array());
                echo "\">";
                echo $this->getAttribute($context["tk_special_total"], "title", array());
                echo "</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tk_special_total'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 584
            echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<script>
                      \$(document).on('click', '.tk_special_total', function(e) {
                          e.stopImmediatePropagation();
                          \$('.tk_all_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
                          \$('#tk_checkout').css('opacity','0.6');
                          \$('#tk_checkout').css('pointer-events','none');
                          \$('#tk_button_confirm').prop('disabled', true);
                          getShippingMethodAddress();
                      });
\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t";
        }
        // line 596
        echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 597
        if ((isset($context["reward_status"]) ? $context["reward_status"] : null)) {
            // line 598
            echo "\t\t\t\t\t\t\t\t\t<div id=\"tk_reward\" ";
            if ((isset($context["reward"]) ? $context["reward"] : null)) {
                echo "class=\"tk_remove_reward_ok\"";
            }
            echo ">
\t\t\t\t\t\t\t\t\t\t<input type=\"button\" value=\"";
            // line 599
            echo (isset($context["button_reward"]) ? $context["button_reward"] : null);
            echo "\" id=\"tk_confirm_reward\" data-loading-text=\"";
            echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
            echo "\" class=\"tk_btn_primary\"/>
\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"reward\" value=\"";
            // line 600
            echo (isset($context["reward"]) ? $context["reward"] : null);
            echo "\" placeholder=\"";
            echo (isset($context["txt_entry_reward"]) ? $context["txt_entry_reward"] : null);
            echo "\" id=\"tk_input_reward\"/>
\t\t\t\t\t\t\t\t\t\t<span id=\"tk_remove_reward_box\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 602
            if ((isset($context["reward"]) ? $context["reward"] : null)) {
                // line 603
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"tk_right tk_remove\" id=\"tk_remove_reward\"><i class=\"tk_icon-close\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 605
            echo "\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t\t<div class=\"tk_checkout_reward\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        // line 610
        echo "\t\t\t\t\t\t\t\t";
        if ((isset($context["coupon_status"]) ? $context["coupon_status"] : null)) {
            // line 611
            echo "\t\t\t\t\t\t\t\t\t<div id=\"tk_coupon\" ";
            if ((isset($context["coupon"]) ? $context["coupon"] : null)) {
                echo "class=\"tk_remove_coupon_ok\"";
            }
            echo ">
\t\t\t\t\t\t\t\t\t\t<input type=\"button\" value=\"";
            // line 612
            echo (isset($context["button_coupon"]) ? $context["button_coupon"] : null);
            echo "\" id=\"tk_confirm_coupon\" data-loading-text=\"";
            echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
            echo "\" class=\"tk_btn_primary\"/>
\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"coupon\" value=\"";
            // line 613
            echo (isset($context["coupon"]) ? $context["coupon"] : null);
            echo "\" placeholder=\"";
            echo (isset($context["txt_entry_coupon"]) ? $context["txt_entry_coupon"] : null);
            echo "\" id=\"tk_input_coupon\"/>
\t\t\t\t\t\t\t\t\t\t<span id=\"tk_remove_coupon_box\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 615
            if ((isset($context["coupon"]) ? $context["coupon"] : null)) {
                // line 616
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"tk_right tk_remove\" id=\"tk_remove_coupon\"><i class=\"tk_icon-close\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 618
            echo "\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t\t<div class=\"tk_checkout_coupon\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        // line 623
        echo "\t\t\t\t\t\t\t\t";
        if ((isset($context["voucher_status"]) ? $context["voucher_status"] : null)) {
            // line 624
            echo "\t\t\t\t\t\t\t\t\t<div id=\"tk_voucher\" ";
            if ((isset($context["voucher"]) ? $context["voucher"] : null)) {
                echo " class=\"tk_remove_voucher_ok\"";
            }
            echo ">
\t\t\t\t\t\t\t\t\t\t<input type=\"button\" value=\"";
            // line 625
            echo (isset($context["button_voucher"]) ? $context["button_voucher"] : null);
            echo "\" id=\"tk_confirm_voucher\" data-loading-text=\"";
            echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
            echo "\" class=\"tk_btn_primary\"/>
\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"voucher\" value=\"";
            // line 626
            echo (isset($context["voucher"]) ? $context["voucher"] : null);
            echo "\" placeholder=\"";
            echo (isset($context["txt_entry_voucher"]) ? $context["txt_entry_voucher"] : null);
            echo "\" id=\"tk_input_voucher\"/>
\t\t\t\t\t\t\t\t\t\t<span id=\"tk_remove_voucher_box\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 628
            if ((isset($context["voucher"]) ? $context["voucher"] : null)) {
                // line 629
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"tk_right tk_remove\" id=\"tk_remove_voucher\"><i class=\"tk_icon-close\"></i></span>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 631
            echo "\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t\t<div class=\"tk_checkout_voucher\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        // line 636
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t";
        // line 640
        if ((( !array_key_exists("customer_id", $context) || ((isset($context["customer_id"]) ? $context["customer_id"] : null) == 0)) && ((isset($context["module_tk_checkout_register"]) ? $context["module_tk_checkout_register"] : null) == 0))) {
            // line 641
            echo "\t\t\t\t\t<div id=\"tk_register_bottom\">
\t\t\t\t\t\t";
            // line 642
            if ((array_key_exists("config_checkout_guest", $context) && ((isset($context["config_checkout_guest"]) ? $context["config_checkout_guest"] : null) == 1))) {
                // line 643
                echo "\t\t\t\t\t\t\t";
                if (((isset($context["module_tk_checkout_required_email"]) ? $context["module_tk_checkout_required_email"] : null) != 3)) {
                    // line 644
                    echo "\t\t\t\t\t\t\t\t<div class=\"tk_check_box\">
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"register\" onclick=\"\$('#tk_register_form').toggle();\$('#tk_newsletter').toggle();\" id=\"tk_register\">
\t\t\t\t\t\t\t\t\t<label for=\"tk_register\">";
                    // line 646
                    echo (isset($context["text_register"]) ? $context["text_register"] : null);
                    echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                }
                // line 650
                echo "\t\t\t\t\t\t";
            } else {
                // line 651
                echo "\t\t\t\t\t\t\t<input type=\"hidden\" name=\"register\" value=\"1\">
\t\t\t\t\t\t";
            }
            // line 653
            echo "\t\t\t\t\t\t<div id=\"tk_register_form\" ";
            if (((array_key_exists("config_checkout_guest", $context) && ((isset($context["config_checkout_guest"]) ? $context["config_checkout_guest"] : null) == 1)) || ((isset($context["module_tk_checkout_required_email"]) ? $context["module_tk_checkout_required_email"] : null) == 3))) {
                echo "style=\"display:none\"";
            }
            echo ">
\t\t\t\t\t\t\t<div class=\"tk_panel\">
\t\t\t\t\t\t\t\t<div class=\"tk_panel_heading\">
\t\t\t\t\t\t\t\t\t<span class=\"tk_panel_icon\"><span class=\"tk_icon-login\"></span></span>
\t\t\t\t\t\t\t\t\t<span class=\"tk_panel_text\"> ";
            // line 657
            echo (isset($context["text_register_account"]) ? $context["text_register_account"] : null);
            echo "</span>
\t\t\t\t\t\t\t\t\t<span class=\"tk_all_spin\"><i class=\"tk_icon-spin rotating\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"tk_panel_body\">
\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t<input type=\"password\" name=\"password\" value=\"\" placeholder=\"";
            // line 662
            echo twig_replace_filter((isset($context["entry_password"]) ? $context["entry_password"] : null), array(":" => ""));
            echo "\"/>
\t\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 663
            echo twig_replace_filter((isset($context["entry_password"]) ? $context["entry_password"] : null), array(":" => ""));
            echo "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t<input type=\"password\" name=\"confirm\" value=\"\" placeholder=\"";
            // line 666
            echo twig_replace_filter((isset($context["entry_confirm"]) ? $context["entry_confirm"] : null), array(":" => ""));
            echo "\"/>
\t\t\t\t\t\t\t\t\t\t<span class=\"tk_floating_label\">";
            // line 667
            echo twig_replace_filter((isset($context["entry_confirm"]) ? $context["entry_confirm"] : null), array(":" => ""));
            echo "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
            // line 671
            if (( !array_key_exists("customer_id", $context) || (((((isset($context["customer_id"]) ? $context["customer_id"] : null) == 0) && ((isset($context["count_customer_groups"]) ? $context["count_customer_groups"] : null) > 1)) && array_key_exists("module_tk_checkout_customer_group", $context)) && ((isset($context["module_tk_checkout_customer_group"]) ? $context["module_tk_checkout_customer_group"] : null) == 1)))) {
                // line 672
                echo "\t\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["customer_groups"]) ? $context["customer_groups"] : null));
                foreach ($context['_seq'] as $context["customer_count"] => $context["customer_group"]) {
                    // line 673
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                    if ((($this->getAttribute($context["customer_group"], "customer_group_id", array(), "array") == (isset($context["customer_group_id"]) ? $context["customer_group_id"] : null)) || ($context["customer_count"] == 0))) {
                        // line 674
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"customer_group_id\"><input type=\"radio\" name=\"customer_group_id\" value=\"";
                        // line 675
                        echo $this->getAttribute($context["customer_group"], "customer_group_id", array(), "array");
                        echo "\" checked=\"checked\" onclick=\"var temp = getAccountCustomFields();getAddressCustomFields(); return temp;\"/>";
                        echo $this->getAttribute($context["customer_group"], "name", array(), "array");
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 678
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"tk_6_column tk_center_column\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"customer_group_id\"><input type=\"radio\" name=\"customer_group_id\" value=\"";
                        // line 679
                        echo $this->getAttribute($context["customer_group"], "customer_group_id", array(), "array");
                        echo "\" onclick=\"var temp = getAccountCustomFields();getAddressCustomFields(); return temp;\"/>";
                        echo $this->getAttribute($context["customer_group"], "name", array(), "array");
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 682
                    echo "\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['customer_count'], $context['customer_group'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 683
                echo "\t\t\t\t\t\t\t\t\t";
            }
            // line 684
            echo "\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 692
        echo "\t\t\t\t\t
\t\t\t\t\t<div id=\"tk_confirm\">
\t\t\t\t\t\t<div class=\"tk_panel\">
\t\t\t\t\t\t\t<div class=\"tk_panel_body\">
\t\t\t\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t\t\t\t<textarea name=\"comment\" rows=\"2\" placeholder=\"";
        // line 697
        echo (isset($context["text_comments"]) ? $context["text_comments"] : null);
        echo "\">";
        echo (isset($context["comment"]) ? $context["comment"] : null);
        echo "</textarea>
\t\t\t\t\t\t\t\t\t<div class=\"tk_agree\" id=\"tk_newsletter\" ";
        // line 698
        if (((((isset($context["customer_id"]) ? $context["customer_id"] : null) || (isset($context["random_password"]) ? $context["random_password"] : null)) || ((isset($context["config_checkout_guest"]) ? $context["config_checkout_guest"] : null) == 0)) ||  !array_key_exists("config_checkout_guest", $context))) {
            echo "style=\"display:block\" ";
        } else {
            echo "style=\"display:none\"";
        }
        echo ">
\t\t\t\t\t\t\t\t\t\t<label for=\"tk_newsletter_input\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"newsletter\" id=\"tk_newsletter_input\" value=\"1\" ";
        // line 700
        if ((isset($context["newsletter"]) ? $context["newsletter"] : null)) {
            echo "checked=\"\"";
        }
        echo " >
\t\t\t\t\t\t\t\t\t\t\t";
        // line 701
        echo (isset($context["entry_newsletter"]) ? $context["entry_newsletter"] : null);
        echo "
\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        // line 704
        if ((array_key_exists("text_agree", $context) && (isset($context["text_agree"]) ? $context["text_agree"] : null))) {
            // line 705
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"tk_agree\">
\t\t\t\t\t\t\t\t\t\t\t<label for=\"tk_agree_button\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"tk_agree_button\" name=\"agree\" value=\"1\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<strong style=\"color: #ff0000;\">*</strong>
\t\t\t\t\t\t\t\t\t\t\t\t<strong id=\"tk_agree_popup\">";
            // line 709
            echo (isset($context["text_agree"]) ? $context["text_agree"] : null);
            echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        } else {
            // line 713
            echo "\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"tk_agree_button\" name=\"agree\" value=\"1\"/>
\t\t\t\t\t\t\t\t\t";
        }
        // line 715
        echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
        // line 716
        if ((array_key_exists("text_agree_2", $context) && (isset($context["text_agree_2"]) ? $context["text_agree_2"] : null))) {
            // line 717
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"tk_agree_2\">
\t\t\t\t\t\t\t\t\t\t\t<label for=\"tk_agree_2_button\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"tk_agree_2_button\" name=\"agree_2\" value=\"1\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<strong style=\"color: #ff0000;\">*</strong>
\t\t\t\t\t\t\t\t\t\t\t\t<strong id=\"tk_agree_popup\">";
            // line 721
            echo (isset($context["text_agree_2"]) ? $context["text_agree_2"] : null);
            echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        } else {
            // line 725
            echo "\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"tk_agree_2_button\" name=\"agree_2\" value=\"1\"/>
\t\t\t\t\t\t\t\t\t";
        }
        // line 727
        echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<div class=\"error\"></div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
        // line 730
        if ((array_key_exists("error_warning", $context) && (isset($context["error_warning"]) ? $context["error_warning"] : null))) {
            // line 731
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"tk_alert\"> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "</div>
\t\t\t\t\t\t\t\t\t";
        }
        // line 733
        echo "\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"tk_btn_success\" data-loading-text=\"";
        echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
        echo " ...\" id=\"tk_button_confirm\">";
        echo (isset($context["text_send"]) ? $context["text_send"] : null);
        echo "</button>
\t\t\t\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t\t\t\t\t<p class=\"tk_req_text\">";
        // line 735
        echo (isset($context["text_req_text"]) ? $context["text_req_text"] : null);
        echo "</p>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t<div id=\"tk_text_under_button\">
\t\t\t\t\t\t";
        // line 742
        echo (isset($context["text_under_button"]) ? $context["text_under_button"] : null);
        echo "
\t\t\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"tk_clear\"></div>
\t\t\t</div>
\t\t</form>
\t\t<div id=\"tk_text_bottom\">
\t\t\t";
        // line 750
        echo (isset($context["text_bottom"]) ? $context["text_bottom"] : null);
        echo "
\t\t\t<div class=\"tk_clear\"></div>
\t\t</div>
\t</div>
\t";
        // line 754
        if (( !array_key_exists("customer_id", $context) || ((isset($context["customer_id"]) ? $context["customer_id"] : null) == 0))) {
            // line 755
            echo "\t\t<div id=\"tk_quick_login\">
\t\t\t<div class=\"tk_login_form\">
\t\t\t\t<button title=\"Close (Esc)\" type=\"button\" class=\"mfp-close\">×</button>
\t\t\t\t<form class=\"form-inline\">
\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t<label for=\"input-email\">";
            // line 760
            echo (isset($context["entry_email"]) ? $context["entry_email"] : null);
            echo "</label>
\t\t\t\t\t\t<input type=\"text\" name=\"login_email\" value=\"\" placeholder=\"";
            // line 761
            echo twig_replace_filter((isset($context["entry_email"]) ? $context["entry_email"] : null), array(":" => ""));
            echo "\" id=\"input-email\"/>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t<label class=\"control-label\" for=\"input-password\">";
            // line 764
            echo (isset($context["entry_password"]) ? $context["entry_password"] : null);
            echo "</label>
\t\t\t\t\t\t<input type=\"password\" name=\"login_password\" value=\"\" placeholder=\"";
            // line 765
            echo twig_replace_filter((isset($context["entry_password"]) ? $context["entry_password"] : null), array(":" => ""));
            echo "\" id=\"input-password\"/>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"tk_12_column tk_center_column\">
\t\t\t\t\t\t<input type=\"button\" value=\"";
            // line 768
            echo (isset($context["button_login"]) ? $context["button_login"] : null);
            echo "\" id=\"tk_button_login\" data-loading-text=\"";
            if (array_key_exists("text_loading", $context)) {
                echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
            } else {
                echo "loading ...";
            }
            echo "\" class=\"tk_btn_success\"/>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t\t<div class=\"tk_message_login\"></div>
\t\t\t\t<hr>
\t\t\t\t<div class=\"tk_12_column tk_center_column tk_text_center\"><a href=\"";
            // line 773
            echo (isset($context["forgotten"]) ? $context["forgotten"] : null);
            echo "\">";
            echo (isset($context["text_forgotten"]) ? $context["text_forgotten"] : null);
            echo "</a></div>
\t\t\t</div>
\t\t</div>
\t";
        }
        // line 777
        echo "\t<div class=\"tk_clear\"></div>
\t";
        // line 778
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "
</section>

<div id=\"tk_payment_triger_run\"></div>
<script>
\t\$(document).ready(function () {
\t\tvar invoice = \$('#invoice_checkbox').data('invoice');
\t\tif (invoice == '1') {
\t\t\t\$('.invoice-form').css('display', 'block');
\t\t}
\t});

\t\$('.tk_form input').change(function () {
\t\tsaveData();
\t});
\t\$('.tk_form select').change(function () {
\t\tsaveData();
\t});
\t\$('.tk_form textarea').change(function () {
\t\tsaveData();
\t});

\t\$('#tk_checkout').css('opacity', '0.6');
\t\$('#tk_checkout').css('pointer-events', 'none');
\t\$('#tk_button_confirm').prop('disabled', true);
\t
\t\$(document).delegate('select[name=\\'country_id\\']', 'change', function () {
\t\t\$('.tk_all_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\$('#tk_checkout').css('opacity', '0.6');
\t\t\$('#tk_checkout').css('pointer-events', 'none');
\t\t\$('#tk_button_confirm').prop('disabled', true);
\t\t
\t\t\$('#speedy_city_locator .radio_box_html').html('');
\t\t\$('#speedy_city_id').val('');
\t\t\$('#speedy_city').val('');
\t\t\$('#speedy_city_select').val('');
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
\t\t
\t\t\$('#speedy_office_id').val('');
\t\t\$('#speedy_office_city_id').val('');
\t\t\$('#speedy_office_name').val('');
\t\t\$('#speedy_office_select').val('');
\t\t\$('#speedy_office_address').val('');
\t\t\$('#speedy_office_city').val('');
\t\t\$('#speedy_office_city_select').val('');
\t\t\$('#speedy_office_postcode').val('');
\t\t
\t\t\$('.tk_speedy_address_city_select').removeClass('tk_redy_box');
\t\t\$('.tk_speedy_quarter_select').removeClass('tk_redy_box');
\t\t\$('.tk_speedy_street_select').removeClass('tk_redy_box');
\t\t\$('.tk_speedy_office_select').removeClass('tk_redy_box');
\t\t\$('.tk_speedy_office_city_select').removeClass('tk_redy_box');
\t\t\$('.tk_speedy_office_city_id').removeClass('tk_redy_box');
\t\t
\t\t\$('#econt_city_locator .radio_box_html').html('');
\t\t\$('#econt_city_id').val('');
\t\t\$('#econt_city').val('');
\t\t\$('#econt_city_select').val('');
\t\t\$('#econt_quarter_id').val('');
\t\t\$('#econt_quarter').val('');
\t\t\$('#econt_quarter_select').val('');
\t\t\$('#econt_street_id').val('');
\t\t\$('#econt_street').val('');
\t\t\$('#econt_street_select').val('');
\t\t\$('#econt_street_num').val('');
\t\t\$('#econt_block_no').val('');
\t\t\$('#econt_other').val('');
\t\t\$('#econt_address_postcode').val('');
\t\t
\t\t\$('#econt_office_id').val('');
\t\t\$('#econt_office_city_id').val('');
\t\t\$('#econt_office_name').val('');
\t\t\$('#econt_office_select').val('');
\t\t\$('#econt_office_address').val('');
\t\t\$('#econt_office_city').val('');
\t\t\$('#econt_office_city_select').val('');
\t\t\$('#econt_office_postcode').val('');
\t\t
\t\t\$('.tk_econt_address_city_select').removeClass('tk_redy_box');
\t\t\$('.tk_econt_quarter_select').removeClass('tk_redy_box');
\t\t\$('.tk_econt_street_select').removeClass('tk_redy_box');
\t\t\$('.tk_econt_office_select').removeClass('tk_redy_box');
\t\t\$('.tk_econt_office_city_select').removeClass('tk_redy_box');
\t\t\$('.tk_econt_office_city_id').removeClass('tk_redy_box');


\t\t\$.ajax({
\t\t\turl: 'index.php?route=tk_checkout/checkout/get_country&country_id=' + this.value,
\t\t\tdataType: 'json',
\t\t\tbeforeSend: function () {
\t\t\t},
\t\t\tcomplete: function () {
\t\t\t},
\t\t\tsuccess: function (json) {
\t\t\t\thtml = '';
\t\t\t\tif (json['zone'] && json['zone'] != '') {
\t\t\t\t\thtml += '<option value=\"0\">";
        // line 883
        echo twig_replace_filter((isset($context["entry_zone"]) ? $context["entry_zone"] : null), array(":" => ""));
        echo "</option>';
\t\t\t\t\tfor (i = 0; i < json['zone'].length; i++) {
\t\t\t\t\t\thtml += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';
\t\t\t\t\t\tif (json['zone'][i]['zone_id'] == '<?php echo \$zone_id; ?>') {
\t\t\t\t\t\t\thtml += ' selected=\"selected\"';
\t\t\t\t\t\t}
\t\t\t\t\t\thtml += '>' + json['zone'][i]['name'] + '</option>';
\t\t\t\t\t}
\t\t\t\t} else {
\t\t\t\t\thtml += '<option value=\"0\" selected=\"selected\">";
        // line 892
        echo twig_replace_filter((isset($context["text_none"]) ? $context["text_none"] : null), array(":" => ""));
        echo "</option>';
\t\t\t\t}
\t\t\t\t\$('select[name=\\'zone_id\\']').html(html);
\t\t\t},
\t\t\terror: function (xhr, ajaxOptions, thrownError) {
\t\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t\t}
\t\t});
\t\tgetShippingMethod();
\t});

\t\$(document).delegate('select[name=\\'zone_id\\']', 'change', function () {
\t\t\$('.tk_all_spin').html(' <i class=\"tk_icon-spin rotating\"></i>');
\t\t\$('#tk_checkout').css('opacity', '0.6');
\t\t\$('#tk_checkout').css('pointer-events', 'none');
\t\t\$('#tk_button_confirm').prop('disabled', true);
\t\t
\t\tvar address_zone_id = \$('input[name=\\'address_zone_id\\']').val();
\t\t
\t\tif (address_zone_id > 0) {
\t\t\tif (\$(this).val() != address_zone_id) {
\t\t\t\t\$(\"input:radio[name='base_address_type'][value='existing']\").prop('checked', false);
\t\t\t\t\$(\"input:radio[name='base_address_type'][value='new']\").prop('checked', true);
\t\t\t\tjQuery('#address_new').show();
\t\t\t} else {
\t\t\t\t\$(\"input:radio[name='base_address_type'][value='existing']\").prop('checked', true);
\t\t\t\t\$(\"input:radio[name='base_address_type'][value='new']\").prop('checked', false);
\t\t\t\tjQuery('#address_new').hide();
\t\t\t}
\t\t}

\t\tgetShippingMethod();
\t});

\t\$('#tk_register').click(function () {
\t\t\$('#tk_newsletter input').prop('checked', true)
\t});

</script>
<style>
\t.tk_panel_text::after {
\t\tbackground: ";
        // line 933
        echo (isset($context["module_tk_checkout_color"]) ? $context["module_tk_checkout_color"] : null);
        echo " !important;
\t}
\t.tk_panel_icon {
\t\tcolor: ";
        // line 936
        echo (isset($context["module_tk_checkout_color"]) ? $context["module_tk_checkout_color"] : null);
        echo " !important;
\t}
\t.tk_btn_clear:active:hover, .tk_btn_clear:active:focus, .tk_btn_clear:hover {
\t\tborder-color: ";
        // line 939
        echo (isset($context["module_tk_checkout_color"]) ? $context["module_tk_checkout_color"] : null);
        echo " !important;
\t}
\t.tk_btn_clear span, .tk_btn_clear i {
\t\tcolor: ";
        // line 942
        echo (isset($context["module_tk_checkout_color"]) ? $context["module_tk_checkout_color"] : null);
        echo " !important;
\t}
\t#tk_checkout input:focus {
\t\tborder: 1px solid ";
        // line 945
        echo (isset($context["module_tk_checkout_color"]) ? $context["module_tk_checkout_color"] : null);
        echo " !important;
\t}
\t.tk_container {
\t\tmax-width: ";
        // line 948
        echo (isset($context["module_tk_checkout_size"]) ? $context["module_tk_checkout_size"] : null);
        echo "px !important;
\t}
\t
\t";
        // line 951
        echo (isset($context["module_tk_checkout_css"]) ? $context["module_tk_checkout_css"] : null);
        echo "

\t";
        // line 953
        if (((isset($context["module_tk_checkout_column"]) ? $context["module_tk_checkout_column"] : null) == 1)) {
            // line 954
            echo "\t.tk_panel_heading .tk_panel_icon {
\t\tleft: 25px !important;
\t}
\t";
            // line 957
            if (((isset($context["module_tk_checkout_size"]) ? $context["module_tk_checkout_size"] : null) > 600)) {
                // line 958
                echo "\t.tk_payment_method {
\t\twidth: 33.33% !important;
\t}
\t";
            }
            // line 962
            echo "\t";
        }
        // line 963
        echo "\t
\t.tk_btn_success {
\t\tbackground-color: ";
        // line 965
        echo (isset($context["module_tk_checkout_color_button"]) ? $context["module_tk_checkout_color_button"] : null);
        echo " !important;
\t\tborder-color: ";
        // line 966
        echo (isset($context["module_tk_checkout_color_button"]) ? $context["module_tk_checkout_color_button"] : null);
        echo " !important;
\t}
\t.tk_btn_success:hover {
\t\tbackground-color: ";
        // line 969
        echo (isset($context["module_tk_checkout_color_button_hover"]) ? $context["module_tk_checkout_color_button_hover"] : null);
        echo " !important;
\t\tborder-color: ";
        // line 970
        echo (isset($context["module_tk_checkout_color_button_hover"]) ? $context["module_tk_checkout_color_button_hover"] : null);
        echo " !important;
\t}

\t";
        // line 973
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["module_tk_checkout_shipping_image"]) ? $context["module_tk_checkout_shipping_image"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["shipping_image"]) {
            // line 974
            echo "\t";
            if ($context["shipping_image"]) {
                // line 975
                echo "\t#tk_checkout .tk_shipping_method .tk_shipping_method_icon.";
                echo $context["key"];
                echo " {
\t\tbackground-image: url('";
                // line 976
                echo $context["shipping_image"];
                echo "') !important;
\t}

\t";
            }
            // line 980
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['shipping_image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 981
        echo "
\t";
        // line 982
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["module_tk_checkout_payment_image"]) ? $context["module_tk_checkout_payment_image"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["payment_image"]) {
            // line 983
            echo "\t";
            if ($context["payment_image"]) {
                // line 984
                echo "\t#tk_checkout #payment_code_";
                echo $context["key"];
                echo ".tk_payment_method .payment_check_bgr {
\t\tbackground-image: url('";
                // line 985
                echo $context["payment_image"];
                echo "') !important;
\t}

\t";
            }
            // line 989
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['payment_image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 990
        echo "</style>
";
        // line 991
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "default/template/tk_checkout/checkout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2504 => 991,  2501 => 990,  2495 => 989,  2488 => 985,  2483 => 984,  2480 => 983,  2476 => 982,  2473 => 981,  2467 => 980,  2460 => 976,  2455 => 975,  2452 => 974,  2448 => 973,  2442 => 970,  2438 => 969,  2432 => 966,  2428 => 965,  2424 => 963,  2421 => 962,  2415 => 958,  2413 => 957,  2408 => 954,  2406 => 953,  2401 => 951,  2395 => 948,  2389 => 945,  2383 => 942,  2377 => 939,  2371 => 936,  2365 => 933,  2321 => 892,  2309 => 883,  2201 => 778,  2198 => 777,  2189 => 773,  2175 => 768,  2169 => 765,  2165 => 764,  2159 => 761,  2155 => 760,  2148 => 755,  2146 => 754,  2139 => 750,  2128 => 742,  2118 => 735,  2110 => 733,  2104 => 731,  2102 => 730,  2097 => 727,  2093 => 725,  2086 => 721,  2080 => 717,  2078 => 716,  2075 => 715,  2071 => 713,  2064 => 709,  2058 => 705,  2056 => 704,  2050 => 701,  2044 => 700,  2035 => 698,  2029 => 697,  2022 => 692,  2012 => 684,  2009 => 683,  2003 => 682,  1995 => 679,  1992 => 678,  1984 => 675,  1981 => 674,  1978 => 673,  1973 => 672,  1971 => 671,  1964 => 667,  1960 => 666,  1954 => 663,  1950 => 662,  1942 => 657,  1932 => 653,  1928 => 651,  1925 => 650,  1918 => 646,  1914 => 644,  1911 => 643,  1909 => 642,  1906 => 641,  1904 => 640,  1898 => 636,  1891 => 631,  1887 => 629,  1885 => 628,  1878 => 626,  1872 => 625,  1865 => 624,  1862 => 623,  1855 => 618,  1851 => 616,  1849 => 615,  1842 => 613,  1836 => 612,  1829 => 611,  1826 => 610,  1819 => 605,  1815 => 603,  1813 => 602,  1806 => 600,  1800 => 599,  1793 => 598,  1791 => 597,  1788 => 596,  1774 => 584,  1763 => 581,  1753 => 580,  1750 => 579,  1746 => 578,  1742 => 576,  1740 => 575,  1736 => 573,  1726 => 569,  1722 => 568,  1717 => 567,  1713 => 566,  1707 => 562,  1698 => 559,  1694 => 558,  1689 => 556,  1685 => 554,  1680 => 553,  1668 => 549,  1660 => 546,  1653 => 542,  1645 => 541,  1639 => 540,  1630 => 534,  1622 => 533,  1616 => 532,  1612 => 530,  1607 => 528,  1602 => 526,  1599 => 525,  1596 => 524,  1591 => 522,  1588 => 521,  1585 => 520,  1573 => 518,  1569 => 517,  1566 => 516,  1562 => 515,  1555 => 514,  1551 => 512,  1549 => 511,  1545 => 509,  1537 => 507,  1535 => 506,  1529 => 504,  1525 => 503,  1518 => 499,  1514 => 498,  1510 => 497,  1506 => 496,  1502 => 495,  1490 => 488,  1484 => 487,  1477 => 482,  1472 => 479,  1470 => 478,  1454 => 464,  1450 => 462,  1444 => 461,  1442 => 460,  1436 => 457,  1422 => 456,  1418 => 455,  1414 => 454,  1407 => 453,  1402 => 452,  1400 => 451,  1397 => 450,  1394 => 449,  1388 => 447,  1386 => 446,  1376 => 439,  1367 => 432,  1355 => 422,  1344 => 413,  1338 => 412,  1335 => 411,  1329 => 409,  1326 => 408,  1320 => 407,  1318 => 406,  1310 => 401,  1304 => 400,  1301 => 399,  1289 => 398,  1286 => 397,  1283 => 396,  1273 => 394,  1263 => 392,  1260 => 391,  1250 => 389,  1248 => 388,  1242 => 387,  1239 => 386,  1234 => 385,  1231 => 384,  1228 => 383,  1223 => 382,  1221 => 381,  1210 => 373,  1204 => 369,  1202 => 368,  1199 => 367,  1193 => 365,  1191 => 364,  1187 => 362,  1180 => 357,  1174 => 356,  1171 => 355,  1166 => 352,  1155 => 350,  1151 => 349,  1147 => 348,  1139 => 347,  1136 => 346,  1133 => 345,  1130 => 344,  1120 => 340,  1114 => 339,  1098 => 338,  1095 => 337,  1091 => 336,  1085 => 333,  1081 => 331,  1078 => 330,  1075 => 329,  1065 => 325,  1049 => 324,  1043 => 323,  1040 => 322,  1035 => 321,  1032 => 320,  1026 => 317,  1016 => 316,  1010 => 315,  1007 => 314,  1004 => 313,  1001 => 312,  997 => 311,  990 => 307,  984 => 303,  982 => 302,  977 => 299,  969 => 293,  963 => 292,  960 => 291,  955 => 288,  944 => 286,  940 => 285,  936 => 284,  928 => 283,  925 => 282,  922 => 281,  919 => 280,  892 => 277,  889 => 276,  885 => 275,  880 => 273,  877 => 272,  874 => 271,  871 => 270,  865 => 269,  841 => 266,  838 => 265,  835 => 264,  830 => 263,  827 => 262,  821 => 259,  811 => 258,  805 => 257,  802 => 256,  799 => 255,  796 => 254,  791 => 253,  788 => 252,  786 => 251,  777 => 250,  774 => 249,  771 => 248,  768 => 247,  762 => 246,  759 => 245,  754 => 242,  748 => 241,  741 => 237,  719 => 236,  715 => 234,  712 => 233,  709 => 232,  704 => 231,  701 => 230,  698 => 229,  693 => 228,  691 => 227,  684 => 223,  678 => 219,  676 => 218,  669 => 213,  663 => 209,  660 => 208,  654 => 207,  646 => 204,  643 => 203,  635 => 200,  632 => 199,  629 => 198,  624 => 197,  622 => 196,  615 => 192,  611 => 191,  605 => 188,  601 => 187,  594 => 185,  591 => 184,  587 => 182,  584 => 181,  577 => 177,  573 => 175,  570 => 174,  568 => 173,  565 => 172,  563 => 171,  560 => 170,  554 => 167,  551 => 166,  545 => 165,  537 => 163,  529 => 161,  526 => 160,  522 => 159,  518 => 158,  510 => 157,  507 => 156,  504 => 155,  501 => 154,  492 => 152,  487 => 151,  484 => 150,  481 => 149,  472 => 147,  467 => 146,  461 => 143,  458 => 142,  452 => 141,  444 => 139,  436 => 137,  433 => 136,  429 => 135,  425 => 134,  417 => 133,  414 => 132,  412 => 131,  407 => 129,  404 => 128,  398 => 127,  395 => 126,  387 => 124,  379 => 122,  376 => 121,  373 => 120,  369 => 119,  365 => 118,  357 => 117,  354 => 116,  351 => 115,  349 => 114,  346 => 113,  340 => 110,  326 => 109,  319 => 108,  313 => 106,  310 => 105,  304 => 102,  290 => 101,  283 => 100,  279 => 98,  277 => 97,  271 => 94,  257 => 93,  251 => 90,  237 => 89,  234 => 88,  230 => 86,  225 => 83,  219 => 82,  211 => 79,  208 => 78,  200 => 75,  197 => 74,  194 => 73,  189 => 72,  186 => 71,  180 => 69,  178 => 68,  171 => 64,  164 => 59,  160 => 57,  156 => 55,  154 => 54,  149 => 51,  138 => 49,  128 => 48,  125 => 47,  123 => 46,  118 => 44,  104 => 37,  98 => 34,  91 => 29,  85 => 27,  83 => 26,  73 => 22,  70 => 21,  62 => 19,  60 => 18,  55 => 17,  53 => 16,  48 => 14,  42 => 11,  39 => 10,  31 => 6,  29 => 5,  23 => 2,  19 => 1,);
    }
}
/* {{ header }}*/
/* <section id="tk_checkout" class="tk_checkout_lable_{{ module_tk_checkout_title }}">*/
/* 	<div class="tk_container" id="tk_no_payment">*/
/* 		*/
/* 		{% if (error_warning) %}*/
/* 			<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/* 				<button type="button" class="close" data-dismiss="alert">&times;</button>*/
/* 			</div>*/
/* 		{% endif %}*/
/* 		*/
/* 		{{ content_top }}*/
/* 		<div class="tk_clear"></div>*/
/* 		*/
/* 		<h1 class="tk_left">{{ checkout_title }}</h1>*/
/* 		<div class="tk_right tk_login_buttons">*/
/* 			{% if (customer_id is not defined or customer_id == 0) %}*/
/* 				<button type="button" class="tk_btn_clear tk_btn_login" id="tk_login"><span class="tk_icon-login"></span> {{ text_account_have }}</button>*/
/* 				{% if (tk_checkout_fbq_app_id is defined and tk_checkout_fbq_app_id) %}*/
/* 				<a href="{{ facebook_login_url }}" class="tk_btn_clear tk_btn_facebook"><i class="tk_icon-facebook"></i> {{ text_account_facebook }}</a>*/
/* 			{% endif %}*/
/* 			{% endif %}*/
/* 			<a href="{{ home }}" class="tk_btn_clear home_again tk_btn_home"><span class="tk_icon-cart"></span> {{ text_buy_more }}*/
/* 			</a>*/
/* 		</div>*/
/* 		<div class="tk_clear"></div>*/
/* 		{% if (customer_id is not defined or customer_id == 0) %}*/
/* 			{{ column_login }}*/
/* 		{% endif %}*/
/* 		<div class="tk_clear"></div>*/
/* 		*/
/* 		<hr>*/
/* 		*/
/* 		<div id="tk_text_top">*/
/* 			{{ text_top }}*/
/* 			<div class="tk_clear"></div>*/
/* 		</div>*/
/* 		<form {% if (module_tk_checkout_autocomplete is not defined or module_tk_checkout_autocomplete == 0) %}autocomplete="off"{% else %}autocomplete="on"{% endif %} >*/
/* 			<div class="tk_form">*/
/* 				<input type="hidden" name="fax" value=""/>*/
/* 				<input type="hidden" name="company" value=""/>*/
/* 				<input type="hidden" name="company_id" value=""/>*/
/* 				<input type="hidden" name="tax_id" value=""/>*/
/* 				<input type="hidden" name="address_2" value=""/>*/
/* 				<input type="hidden" name="address_zone_id" value="{{ address_zone_id }}"/>*/
/* 				*/
/* 				{% if (customer_id is not defined or customer_id == 0) and random_password %}*/
/* 					<input type="hidden" name="register" value="1">*/
/* 					<input type="hidden" name="password" value="{{ random_password }}" {% if (module_tk_checkout_autocomplete is not defined or module_tk_checkout_autocomplete == 0) %}autocomplete="off"{% else %}autocomplete="on"{% endif %}>*/
/* 					<input type="hidden" name="confirm" value="{{ random_password }}" {% if (module_tk_checkout_autocomplete is not defined or module_tk_checkout_autocomplete == 0) %}autocomplete="off"{% else %}autocomplete="on"{% endif %}>*/
/* 				{% endif %}*/
/* 				*/
/* 				<div id="tk_error_box"></div>*/
/* 				*/
/* 				{% if module_tk_checkout_column == 2 %}*/
/* 				<div class="tk_5_column tk_left_column">*/
/* 				{% else %}*/
/* 				<div class=" tk_order_column">*/
/* 				{% endif %}*/
/* 				*/
/* 					<div id="tk_user_data">*/
/* 						<div class="tk_panel">*/
/* 							<div class="tk_panel_heading">*/
/* 								<span class="tk_panel_icon"><span class="tk_icon-user"></span></span>*/
/* 								<span class="tk_panel_text"> {{ text_persondata }}</span>*/
/* 								<span class="tk_all_spin"><i class="tk_icon-spin rotating"></i></span>*/
/* 							</div>*/
/* 							<div class="tk_panel_body">*/
/* 								{% if ((customer_id is defined and customer_id > 0) or (count_customer_groups == 1)) %}*/
/* 									<input type="hidden" name="customer_group_id" value="{{ customer_group_id }}"/>*/
/* 								{% else %}*/
/* 									{% if module_tk_checkout_customer_group is defined and module_tk_checkout_customer_group == 1 %}*/
/* 										{% for customer_count,customer_group in customer_groups %}*/
/* 											{% if (customer_group['customer_group_id'] == customer_group_id or customer_count == 0) %}*/
/* 												<div class="tk_6_column tk_center_column">*/
/* 													<label class="customer_group_id"><input type="radio" name="customer_group_id" value="{{ customer_group['customer_group_id'] }}" checked="checked" onclick="var temp = getAccountCustomFields();getAddressCustomFields(); return temp;"/>{{ customer_group['name'] }}</label>*/
/* 												</div>*/
/* 											{% else %}*/
/* 												<div class="tk_6_column tk_center_column">*/
/* 													<label class="customer_group_id"><input type="radio" name="customer_group_id" value="{{ customer_group['customer_group_id'] }}" onclick="var temp = getAccountCustomFields();getAddressCustomFields(); return temp;"/>{{ customer_group['name'] }}</label>*/
/* 												</div>*/
/* 											{% endif %}*/
/* 										{% endfor %}*/
/* 										<div class="tk_clear"></div>*/
/* 										<hr class="bottom_zero">*/
/* 									{% endif %}*/
/* 									<div class="tk_clear"></div>*/
/* 								{% endif %}*/
/* 								<div class="tk_6_column tk_center_column tk_required_box">*/
/* 									<input type="text" name="firstname" value="{% if (firstname is defined) %}{{ firstname }}{% endif %}" id="firstname" placeholder="{{ entry_firstname|replace({ ":": "" }) }}" {% if (module_tk_checkout_autocomplete is not defined or module_tk_checkout_autocomplete == 0) %}autocomplete="off"{% else %}autocomplete="on"{% endif %}/>*/
/* 									<span class="tk_floating_label">{{ entry_firstname|replace({ ":": "" }) }}</span>*/
/* 								</div>*/
/* 								<div class="tk_6_column tk_center_column tk_required_box">*/
/* 									<input type="text" name="lastname" value="{% if (lastname is defined) %}{{ lastname }}{% endif %}" id="lastname" placeholder="{{ entry_lastname|replace({ ":": "" }) }}" {% if (module_tk_checkout_autocomplete is not defined or module_tk_checkout_autocomplete == 0) %}autocomplete="off"{% else %}autocomplete="on"{% endif %}/>*/
/* 									<span class="tk_floating_label">{{ entry_lastname|replace({ ":": "" }) }}</span>*/
/* 								</div>*/
/* 								<div class="tk_clear"></div>*/
/* 								{% if module_tk_checkout_required_phone == 3 %}*/
/* 									<input type="hidden" name="telephone" value="not_required" id="telephone"/>*/
/* 								{% else %}*/
/* 									<div class="tk_6_column tk_center_column {% if module_tk_checkout_required_phone == 0 or module_tk_checkout_required_phone == 2 %}tk_required_box{% endif %}">*/
/* 										<input type="text" name="telephone" value="{% if (telephone is defined) %}{{ telephone }}{% endif %}" id="telephone" placeholder="{{ entry_telephone|replace({ ":": "" }) }}" {% if (module_tk_checkout_autocomplete is not defined or module_tk_checkout_autocomplete == 0) %}autocomplete="off"{% else %}autocomplete="on"{% endif %}/>*/
/* 										<span class="tk_floating_label">{{ entry_telephone|replace({ ":": "" }) }}</span>*/
/* 									</div>*/
/* 								{% endif %}*/
/* 								{% if module_tk_checkout_required_email == 3 %}*/
/* 									<input type="hidden" name="email" value="{{ module_tk_checkout_customer_mail }}" id="email"/>*/
/* 								{% else %}*/
/* 									<div class="tk_6_column tk_center_column {% if module_tk_checkout_required_email == 0 %}tk_required_box{% endif %}">*/
/* 										<input type="text" name="email" value="{% if (email is defined) %}{{ email }}{% endif %}" id="email" placeholder="{{ entry_email|replace({ ":": "" }) }}" {% if (module_tk_checkout_autocomplete is not defined or module_tk_checkout_autocomplete == 0) %}autocomplete="off"{% else %}autocomplete="on"{% endif %}/>*/
/* 										<span class="tk_floating_label">{{ entry_email|replace({ ":": "" }) }}</span>*/
/* 									</div>*/
/* 								{% endif %}*/
/* 								<div class="tk_clear"></div>*/
/* 								{% if count_countries > 1 %}*/
/* 									{% if module_tk_checkout_country_count > 1 %}*/
/* 										<div class="tk_6_column tk_center_column tk_required_box">*/
/* 											<select name="country_id" id="country_id" {% if (module_tk_checkout_autocomplete is not defined or module_tk_checkout_autocomplete == 0) %}autocomplete="off"{% else %}autocomplete="on"{% endif %}>*/
/* 												<option value="0">{{ text_select }}</option>*/
/* 												{% for country in countries %}*/
/* 													{% if country['country_id'] in module_tk_checkout_country %}*/
/* 														{% if (country['country_id'] == country_id) %}*/
/* 															<option value="{{ country['country_id'] }}" selected="selected">{{ country['name'] }}</option>*/
/* 														{% else %}*/
/* 															<option value="{{ country['country_id'] }}">{{ country['name'] }}</option>*/
/* 														{% endif %}*/
/* 													{% endif %}*/
/* 												{% endfor %}*/
/* 											</select>*/
/* 											<span class="tk_floating_label">{{ entry_country|replace({ ":": "" }) }}</span>*/
/* 										</div>*/
/* 									{% elseif module_tk_checkout_country_count == 0 %}*/
/* 										<div class="tk_6_column tk_center_column tk_required_box">*/
/* 											<select name="country_id" id="country_id" {% if (module_tk_checkout_autocomplete is not defined or module_tk_checkout_autocomplete == 0) %}autocomplete="off"{% else %}autocomplete="on"{% endif %}>*/
/* 												<option value="0">{{ text_select }}</option>*/
/* 												{% for country in countries %}*/
/* 													{% if (country['country_id'] == country_id) %}*/
/* 														<option value="{{ country['country_id'] }}" selected="selected">{{ country['name'] }}</option>*/
/* 													{% else %}*/
/* 														<option value="{{ country['country_id'] }}">{{ country['name'] }}</option>*/
/* 													{% endif %}*/
/* 												{% endfor %}*/
/* 											</select>*/
/* 											<span class="tk_floating_label">{{ entry_country|replace({ ":": "" }) }}</span>*/
/* 										</div>*/
/* 									{% else %}*/
/* 										{% for country in module_tk_checkout_country %}*/
/* 											<input type="hidden" name="country_id" value="{{ country }}"/>*/
/* 										{% endfor %}*/
/* 									{% endif %}*/
/* 								{% else %}*/
/* 									{% for country in countries %}*/
/* 										<input type="hidden" name="country_id" value="{{ country['country_id'] }}"/>*/
/* 									{% endfor %}*/
/* 								{% endif %}*/
/* 								{% if module_tk_checkout_zone is defined and module_tk_checkout_zone == 1 %}*/
/* 									<div class="tk_6_column tk_center_column tk_required_box">*/
/* 										<select name="zone_id" id="input-payment-zone" class="form-control" {% if (module_tk_checkout_autocomplete is not defined or module_tk_checkout_autocomplete == 0) %}autocomplete="off"{% else %}autocomplete="on"{% endif %}>*/
/* 											<option value="0" selected="selected">{{ entry_zone|replace({ ":": "" }) }}</option>*/
/* 											{% for zona in zone %}*/
/* 												{% if (zona['zone_id'] == zone_id) %}*/
/* 													<option value="{{ zona['zone_id'] }}" selected="selected">{{ zona['name'] }}</option>*/
/* 												{% else %}*/
/* 													<option value="{{ zona['zone_id'] }}">{{ zona['name'] }}</option>*/
/* 												{% endif %}*/
/* 											{% endfor %}*/
/* 										</select>*/
/* 										<span class="tk_floating_label">{{ entry_zone|replace({ ":": "" }) }}</span>*/
/* 									</div>*/
/* 								{% endif %}*/
/* 								<div class="tk_clear"></div>*/
/* 								{% if (customer_id is not defined or customer_id == 0) and module_tk_checkout_register == 2 %}*/
/* 								<div id="tk_register_top">*/
/* 									{% if (config_checkout_guest is defined and config_checkout_guest == 1) %}*/
/* 										{% if (module_tk_checkout_required_email != 3) %}*/
/* 											<div class="tk_12_column tk_center_column">*/
/* 												<input type="checkbox" name="register" onclick="$('#tk_register_form').toggle();$('#tk_newsletter').toggle();" id="tk_register">*/
/* 												<label for="tk_register">{{ text_register }}*/
/* 												</label>*/
/* 											</div>*/
/* 										{% endif %}*/
/* 									{% else %}*/
/* 										<input type="hidden" name="register" value="1">*/
/* 									{% endif %}*/
/* */
/* 									<div id="tk_register_form" {% if ((config_checkout_guest is defined and config_checkout_guest == 1) or module_tk_checkout_required_email == 3) %}style="display:none"{% endif %}>*/
/* 										<div class="tk_6_column tk_center_column">*/
/* 											<input type="password" name="password" value="" placeholder="{{ entry_password|replace({ ":": "" }) }}" autocomplete="off"/>*/
/* 											<span class="tk_floating_label">{{ entry_password|replace({ ":": "" }) }}</span>*/
/* 										</div>*/
/* 										<div class="tk_6_column tk_center_column">*/
/* 											<input type="password" name="confirm" value="" placeholder="{{ entry_confirm|replace({ ":": "" }) }}" autocomplete="off"/>*/
/* 											<span class="tk_floating_label">{{ entry_confirm|replace({ ":": "" }) }}</span>*/
/* 										</div>*/
/* 										<div class="tk_clear"></div>*/
/* 										*/
/* 											{% if customer_id is not defined or customer_id == 0 and count_customer_groups > 1 and module_tk_checkout_customer_group is defined and module_tk_checkout_customer_group == 1 %}*/
/* 												{% for customer_count,customer_group in customer_groups %}*/
/* 													{% if (customer_group['customer_group_id'] == customer_group_id or customer_count == 0) %}*/
/* 														<div class="tk_6_column tk_center_column">*/
/* 															<label class="customer_group_id"><input type="radio" name="customer_group_id" value="{{ customer_group['customer_group_id'] }}" checked="checked" onclick="var temp = getAccountCustomFields();getAddressCustomFields(); return temp;"/>{{ customer_group['name'] }}</label>*/
/* 														</div>*/
/* 													{% else %}*/
/* 														<div class="tk_6_column tk_center_column">*/
/* 															<label class="customer_group_id"><input type="radio" name="customer_group_id" value="{{ customer_group['customer_group_id'] }}" onclick="var temp = getAccountCustomFields();getAddressCustomFields(); return temp;"/>{{ customer_group['name'] }}</label>*/
/* 														</div>*/
/* 													{% endif %}*/
/* 												{% endfor %}*/
/* 											{% endif %}*/
/* 									</div>*/
/* 									<div class="tk_clear"></div>*/
/* 								</div>*/
/* 								{% endif %}*/
/* 							</div>*/
/* 						</div>*/
/* 					</div>*/
/* */
/* 					<div id="tk_account_custom_fields_table">*/
/* 						{% if (account_custom_fields is defined and account_custom_fields) %}*/
/* 							<div class="tk_account_custom_fields">*/
/* 								<div class="tk_panel">*/
/* 									<div class="tk_panel_heading">*/
/* 										<span class="tk_panel_icon"><span class="tk_icon-briefcas"></span></span>*/
/* 										<span class="tk_panel_text"> {{ text_invoice }}</span>*/
/* 										<span class="tk_all_spin"><i class="tk_icon-spin rotating"></i></span>*/
/* 									</div>*/
/* 									<div class="tk_panel_body">*/
/* 										{% set invoice_checkbox = constant('false') %}*/
/* 										{% for custom_field in account_custom_fields %}*/
/* 											{% if (custom_field['location'] == 'account') %}*/
/* 												{% if (custom_field['type'] == 'checkbox') %}*/
/* 													{% for custom_field_value in custom_field['custom_field_value'] %}*/
/* 														{% if ((custom_field['custom_field_id'] == module_tk_checkout_invoice)) %}*/
/* 															{% set invoice_checkbox = true %}*/
/* 															<div class="tk_12_column tk_center_column">*/
/* 																<label for="invoice_checkbox">*/
/* 																	<input type="checkbox" id="invoice_checkbox" name="custom_field[{{ custom_field['location'] }}][{{ custom_field['custom_field_id'] }}][]" value="{{ custom_field_value['custom_field_value_id'] }}" id="custom_field_{{ custom_field['location'] }}_{{ custom_field_value['custom_field_value_id'] }}" class="custom_field" {% if (account_custom_field[custom_field['custom_field_id']][0] is defined and account_custom_field[custom_field['custom_field_id']][0] == custom_field_value['custom_field_value_id']) %} {% set account_custom_field_open = 1 %} data-invoice="1" checked="" {% endif %}data-invoice="0" {% if (invoice_checkbox) %}onclick="jQuery('.invoice-form').toggle()"{% endif %} />*/
/* 																	{{ custom_field['name'] }}*/
/* 																</label>*/
/* 															</div>*/
/* 														{% endif %}*/
/* 													{% endfor %}*/
/* */
/* 													<div class="tk_clear"></div>*/
/* 												{% endif %}*/
/* 											{% endif %}*/
/* 										{% endfor %}*/
/* 										{% if module_tk_checkout_invoice == 9999 %}*/
/* 											{% set account_custom_field_open = 1 %}*/
/* 										{% endif %}*/
/* 										<div class="invoice-form" {% if (account_custom_field_open is defined) %}style="display:block" {% else %}style="display:none" {% endif %}>*/
/* 											{% if (invoice_checkbox == true) %}*/
/* 												<hr class="bottom_zero">{% endif %}*/
/* 											{% for custom_field in account_custom_fields %}*/
/* 												{% if (custom_field['location'] == 'account') %}*/
/* 													{% if (custom_field['type'] == 'text') %}*/
/* 														<div class="tk_6_column tk_center_column">*/
/* 															<input type="text" name="custom_field[{{ custom_field['location'] }}][{{ custom_field['custom_field_id'] }}]"*/
/* 															value="{% if (account_custom_field[custom_field['custom_field_id']] is defined) %}{{ account_custom_field[custom_field['custom_field_id']] }}{% endif %}" id="custom_field{{ custom_field['custom_field_id'] }}" class="form-control custom_field" placeholder="{{ custom_field['name'] }}"/>*/
/* 															<span class="tk_floating_label">{{ custom_field['name'] }}</span>*/
/* 														</div>*/
/* 													{% endif %}*/
/* 													{% if (custom_field['type'] == 'checkbox') %}*/
/* 													{% for custom_field_value in custom_field['custom_field_value'] %}*/
/* 														{% if (custom_field['custom_field_id'] != module_tk_checkout_invoice) %}*/
/* 															<div class="tk_12_column tk_center_column">*/
/* 																<label for="custom_field_{{ custom_field['location'] }}_{{ custom_field_value['custom_field_value_id'] }}"><input type="checkbox" name="custom_field[{{ custom_field['location'] }}][{{ custom_field['custom_field_id'] }}][]" value="{{ custom_field_value['custom_field_value_id'] }}" id="custom_field_{{ custom_field['location'] }}_{{ custom_field_value['custom_field_value_id'] }}" class="custom_field" {% if (account_custom_field[custom_field['custom_field_id']][0] is defined and account_custom_field[custom_field['custom_field_id']][0] == custom_field_value['custom_field_value_id']) %} checked=""{% endif %} />{{ custom_field['name'] }}</label>*/
/* 															</div>*/
/* 														{% endif %}*/
/* 													{% endfor %}*/
/* 												{% endif %}*/
/* 													{% if (custom_field['type'] == 'radio') %}*/
/* 													<div class="tk_12_column tk_center_column">*/
/* 															<label>{{ custom_field['name'] }}</label>*/
/* 														</div>*/
/* 														{% for custom_field_value in custom_field['custom_field_value'] %}*/
/* 														<div class="tk_12_column tk_center_column">*/
/* 																<label for="custom_field_{{ custom_field['location'] }}_{{ custom_field_value['custom_field_value_id'] }}"><input type="radio" name="custom_field[{{ custom_field['location'] }}][{{ custom_field['custom_field_id'] }}]" value="{{ custom_field_value['custom_field_value_id'] }}" id="custom_field_{{ custom_field['location'] }}_{{ custom_field_value['custom_field_value_id'] }}" class="custom_field" {% if (account_custom_field[custom_field['custom_field_id']][0] is defined and account_custom_field[custom_field['custom_field_id']][0] == custom_field_value['custom_field_value_id']) %} checked=""{% endif %} />{{ custom_field_value['name'] }}</label>*/
/* 															</div>*/
/* 													{% endfor %}*/
/* 												{% endif %}*/
/* 													{% if (custom_field['type'] == 'select') %}*/
/* 													<div class="tk_12_column tk_center_column">*/
/* 															<select name="custom_field[{{ custom_field['location'] }}][{{ custom_field['custom_field_id'] }}]" id="input-payment-custom-field{{ custom_field.custom_field_id }}" class="form-control">*/
/* 																<option value="">{{ text_select }}</option>*/
/* 																{% for custom_field_value in custom_field.custom_field_value %}*/
/* 																	<option value="{{ custom_field_value.custom_field_value_id }}">{{ custom_field_value.name }}</option>*/
/* 																{% endfor %}*/
/* 															</select>*/
/* 														</div>*/
/* 												{% endif %}*/
/* 												{% endif %}*/
/* 											{% endfor %}*/
/* 										</div>*/
/* 										<div class="tk_clear"></div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 						{% endif %}*/
/* 					</div>*/
/* */
/* 					<div id="tk_address_custom_fields_table">*/
/* 						{% if (address_custom_fields is defined and address_custom_fields) %}*/
/* 							<div class="tk_address_custom_fields">*/
/* 								<div class="tk_panel">*/
/* 									<div class="tk_panel_heading">*/
/* 										<span class="tk_panel_icon"><span class="tk_icon-user"></span></span>*/
/* 										<span class="tk_panel_text"> {{ text_other }}</span>*/
/* 										<span class="tk_all_spin"><i class="tk_icon-spin rotating"></i></span>*/
/* 									</div>*/
/* 									<div class="tk_panel_body">*/
/* 										{% for custom_field in address_custom_fields %}*/
/* 											{% if (custom_field['location'] == 'address') %}*/
/* 												{% if (custom_field['type'] == 'text') %}*/
/* 													<div class="tk_6_column tk_center_column">*/
/* 														<input type="text" name="custom_field[{{ custom_field['location'] }}][{{ custom_field['custom_field_id'] }}]"*/
/* 														value="{% if (address_custom_field[custom_field['custom_field_id']] is defined) %}{{ address_custom_field[custom_field['custom_field_id']] }}{% endif %}" id="custom_field{{ custom_field['custom_field_id'] }}" class="form-control custom_field" placeholder="{{ custom_field['name']|replace({ ":": "" }) }}"/>*/
/* 														<span class="tk_floating_label">{{ custom_field['name']|replace({ ":": "" }) }}</span>*/
/* 													</div>*/
/* 												{% endif %}*/
/* 												{% if (custom_field['type'] == 'checkbox') %}*/
/* 												{% for custom_field_value in custom_field['custom_field_value'] %}*/
/* 													<div class="tk_12_column tk_center_column">*/
/* 															<label for="custom_field_{{ custom_field['location'] }}_{{ custom_field_value['custom_field_value_id'] }}">*/
/* 																<input type="checkbox" name="custom_field[{{ custom_field['location'] }}][{{ custom_field['custom_field_id'] }}][]" value="{{ custom_field_value['custom_field_value_id'] }}" id="custom_field_{{ custom_field['location'] }}_{{ custom_field_value['custom_field_value_id'] }}" class="custom_field" {% if (address_custom_field[custom_field['custom_field_id']][0] is defined and address_custom_field[custom_field['custom_field_id']][0] == custom_field_value['custom_field_value_id']) %}checked=""{% endif %} />*/
/* 																{{ custom_field['name'] }}*/
/* 															</label>*/
/* 														</div>*/
/* 												{% endfor %}*/
/* 											{% endif %}*/
/* 												{% if (custom_field['type'] == 'radio') %}*/
/* 												<div class="tk_12_column tk_center_column">*/
/* 														<label>*/
/* 															{{ custom_field['name'] }}*/
/* 														</label>*/
/* 													</div>*/
/* 													{% for custom_field_value in custom_field['custom_field_value'] %}*/
/* 													<div class="tk_12_column tk_center_column">*/
/* 															<input type="radio" name="custom_field[{{ custom_field['location'] }}][{{ custom_field['custom_field_id'] }}]" value="{{ custom_field_value['custom_field_value_id'] }}" id="custom_field_{{ custom_field['location'] }}_{{ custom_field_value['custom_field_value_id'] }}" class="custom_field" {% if (address_custom_field[custom_field['custom_field_id']][0] is defined and address_custom_field[custom_field['custom_field_id']][0] == custom_field_value['custom_field_value_id']) %}checked=""{% endif %} />*/
/* 															<label for="custom_field_{{ custom_field['location'] }}_{{ custom_field_value['custom_field_value_id'] }}">*/
/* 																{{ custom_field_value['name'] }}*/
/* 															</label>*/
/* 														</div>*/
/* 												{% endfor %}*/
/* 											{% endif %}*/
/* 												{% if (custom_field['type'] == 'select') %}*/
/* 												<div class="tk_12_column tk_center_column">*/
/* 														<select name="custom_field[{{ custom_field['location'] }}][{{ custom_field['custom_field_id'] }}]" id="input-payment-custom-field{{ custom_field.custom_field_id }}" class="form-control">*/
/* 															<option value="">{{ text_select }}</option>*/
/* 															{% for custom_field_value in custom_field.custom_field_value %}*/
/* 																<option value="{{ custom_field_value.custom_field_value_id }}">{{ custom_field_value.name }}</option>*/
/* 															{% endfor %}*/
/* 														</select>*/
/* 													</div>*/
/* 											{% endif %}*/
/* 											{% endif %}*/
/* 										{% endfor %}*/
/* 										<div class="tk_clear"></div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 						{% endif %}*/
/* 					</div>*/
/* 					*/
/* 					{% if (shipping_error_warning) %}*/
/* 						<div class="tk_alert_stay"> {{ shipping_error_warning }}</div>*/
/* 					{% endif %}*/
/* 					*/
/* 					{% if (shipping_methods) %}*/
/* 						<div id="tk_shipping_methods">*/
/* 							<div class="tk_panel">*/
/* 								<div class="tk_panel_heading">*/
/* 									<span class="tk_panel_icon"><span class="tk_icon-delivery"></span></span>*/
/* 									<span class="tk_panel_text"> {{ text_shiping_select }}</span>*/
/* 									<span class="tk_all_spin"><i class="tk_icon-spin rotating"></i></span>*/
/* 								</div>*/
/* 								<div class="tk_panel_body">*/
/* 									<div class="tk_12_column tk_center_column">*/
/* 										<input type="hidden" name="shipping_method_error" value=""/>*/
/* 										<div id="tk_shipping_table">*/
/* 											<div class="tk_shipping_methods">*/
/* 												{% set counter = 0 %}*/
/* 												{% for key,shipping_method in shipping_methods %}*/
/* 													{% if (not shipping_method['error']) %}*/
/* 														{% set counter_quote = 0 %}*/
/* 														{% for quote in shipping_method['quote'] %}*/
/* 															<div class="tk_shipping_method">*/
/* 																<label for="shipping_check_{{ quote['code'] }}" class="{{ quote['code']|replace({ ".": "_" }) }}">*/
/* 																	{% if (shipping_method_code['code'] is defined and quote['code'] == shipping_method_code['code']) %}*/
/* 																		<input type="radio" name="shipping_method" value="{{ quote['code'] }}" title="{{ quote['title'] }}" checked="checked" id="shipping_check_{{ quote['code'] }}"/>*/
/* 																	{% else %}*/
/* 																		{% if (counter == 0 and counter_quote == 0) %}*/
/* 																			<input type="radio" class="shipping_method" name="shipping_method" value="{{ quote['code'] }}" title="{{ quote['title'] }}" checked="checked" id="shipping_check_{{ quote['code'] }}"/>*/
/* 																		{% else %}*/
/* 																			<input type="radio" class="shipping_method" name="shipping_method" value="{{ quote['code'] }}" title="{{ quote['title'] }}" id="shipping_check_{{ quote['code'] }}"/>*/
/* 																		{% endif %}*/
/* 																	{% endif %}*/
/* 																	<div class="tk_shipping_method_txt_box">*/
/* 																		<span class="{{ quote['code']|replace({ ".": "_" }) }} {% if quote['name'] is defined %}tk_next_{{ quote['name']}}{% endif %} {{key }} tk_shipping_method_icon "></span><span class="tk_shipping_method_title">{{ quote['title'] }}{% if quote['description'] %}*/
/* 																				<br>*/
/* 																				<small>{{ quote['description'] }}</small>{% endif %}</span>*/
/* 																		<span class="tk_shipping_method_price">{{ quote['text'] }}</span>*/
/* 																		<div class="tk_clear"></div>*/
/* 																	</div>*/
/* 																</label>*/
/* 															</div>*/
/* 															{% set counter_quote = counter_quote + 1 %}*/
/* 														{% endfor %}*/
/* 													{% else %}*/
/* 														<div class="tk_alert">{{ shipping_method['error'] }}</div>*/
/* 													{% endif %}*/
/* 													{% set counter = counter + 1 %}*/
/* 												{% endfor %}*/
/* 											</div>*/
/* 											<div class="tk_clear"></div>*/
/* 										</div>*/
/* 										<div id="tk_text_free_shipping_table"></div>*/
/* 									</div>*/
/* 								</div>*/
/* 							</div>*/
/* 						</div>*/
/* 					{% else %}*/
/* 					<input type="hidden" name="shipping_method_error" value=""/>*/
/* 						<div id="tk_shipping_table">*/
/* 							<div class="tk_shipping_methods"></div>*/
/* 						</div>*/
/* 						<script>*/
/* 							$(document).ready(function () {*/
/* 								getPaymentMethod();*/
/* 							});*/
/* 						</script>*/
/* 					{% endif %}*/
/* 					*/
/* 					<div id="tk_address_table"></div>*/
/* 					*/
/* 					<div id="tk_payment_methods">*/
/* 						<div class="tk_panel">*/
/* 							<div class="tk_panel_heading">*/
/* 								<span class="tk_panel_icon"><span class="tk_icon-money"></span></span>*/
/* 								<span class="tk_panel_text"> {{ text_payment_select }}</span>*/
/* 								<span class="tk_all_spin"><i class="tk_icon-spin rotating"></i></span>*/
/* 							</div>*/
/* 							<div class="tk_panel_body">*/
/* 								<div class="tk_12_column tk_center_column">*/
/* 									<input type="hidden" name="payment_method_error" value=""/>*/
/* 									<div id="tk_payment_table">*/
/* 										{% if (payment_error_warning) %}*/
/* 											<div class="tk_alert_stay"> {{ payment_error_warning }}</div>*/
/* 										{% endif %}*/
/* 										{% if (payment_methods) %}*/
/* 											<div class="tk_payment_methods">*/
/* 												{% set counter = 0 %}*/
/* 												{% for payment_method in payment_methods %}*/
/* 													<input type="hidden" name="payment_method_popup_{{ payment_method['code'] }}" value="{{ payment_method['popup_payment'] }}"/>*/
/* 													<div class="tk_payment_method" id="payment_code_{{ payment_method['code'] }}">*/
/* 														<label for="payment_check_{{ payment_method['code'] }}">*/
/* 															<input type="radio" name="payment_method" value="{{ payment_method['code'] }}" title="{{ payment_method['title'] }}" id="payment_check_{{ payment_method['code'] }}" {% if (payment_method_code == payment_method['code']) %}checked="checked" {% elseif (counter == 0) %}checked="checked"{% endif %} />*/
/* 															<span class="payment_check_bgr">{{ payment_method['title'] }}</span>*/
/* 														</label>*/
/* 													</div>*/
/* 													{% set counter = counter + 1 %}*/
/* 												{% endfor %}*/
/* 											</div>*/
/* 										{% endif %}*/
/* 									</div>*/
/* 								</div>*/
/* 								<div class="tk_clear"></div>*/
/* 								<style>*/
/* 									#tk_payment_triger #button-confirm {display: none;}*/
/* 									#tk_payment_display #button-confirm {display: none;}*/
/* 								</style>*/
/* 								<div id="tk_payment_display"></div>*/
/* 								<div id="tk_payment_triger"></div>*/
/* 							</div>*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="tk_clear"></div>*/
/* 					*/
/* 				{% if module_tk_checkout_column == 2 %}*/
/* 				</div>*/
/* 				<div class="tk_7_column tk_right_column">*/
/* 				{% endif %}*/
/* 				*/
/* 					<div id="tk_cart">*/
/* 						<div class="tk_panel">*/
/* 							<div class="tk_panel_heading">*/
/* 								<span class="tk_panel_icon"><span class="tk_icon-cart"></span></span> */
/* 								<span class="tk_panel_text"> {{ text_cart }} {% if (config_cart_weight is defined and config_cart_weight == 1) %}(*/
/* 										<span class="tk_weight_cart">{{ weight_cart }}</span>){% endif %}</span>*/
/* 								<span class="tk_all_spin"><i class="tk_icon-spin rotating"></i></span>*/
/* 							</div>*/
/* 							<div class="tk_panel_body">*/
/* 								<table class="tk_table">*/
/* 									<thead>*/
/* 									<tr>*/
/* 										<th>{{ column_image }}</th>*/
/* 										<th>{{ column_name }}</th>*/
/* 										<th class="tk_only_desctop" style=" min-width: 130px;">{{ column_quantity }}</th>*/
/* 										<th class="tk_only_desctop">{{ column_price }}</th>*/
/* 										<th class="tk_text_right">{{ column_total }}</th>*/
/* 									</tr>*/
/* 									</thead>*/
/* 									<tbody>*/
/* 									{% for product in products %}*/
/* 										<tr id="tk_cart_product_{{ product.cart_id }}">*/
/* 											<td class="tk_text_center">*/
/* 												{% if (product.thumb) %}*/
/* 													<a href="{{ product.href }}"><img src="{{ product.thumb }}"/></a>*/
/* 												{% endif %}*/
/* 											</td>*/
/* 											<td>*/
/* 												{% if not product.stock %}*/
/* 													<div class="tk_alert_stay">***</div>*/
/* 												{% endif %}*/
/* 												<a href="{{ product.href }}">{{ product.name }}</a>*/
/* 												{% for option in product.option %}*/
/* 													<br/>*/
/* 													<small> - {{ option.name }}*/
/* 														: {% if (option.option_value is defined and option.option_value is not empty) %}{{ option.option_value }}{% elseif (option.value is defined) %}{{ option.value }}{% endif %}</small>*/
/* 												{% endfor %}*/
/* 												{% if (product.reward) %}*/
/* 													<br/>*/
/* 													<small>{{ product.reward }}</small>*/
/* 												{% endif %}*/
/* 												{% if (product.recurring) %}*/
/* 													<br/>*/
/* 													<span class="label label-info">{{ text_recurring_item }}</span>*/
/* 													<br/>*/
/* 													<small>{{ product.recurring }}</small>*/
/* 												{% endif %}*/
/* 												<div class="tk_only_mobile">*/
/* 													<span id="tk_save_m">*/
/* 														<input type="text" value="{{ product.quantity }}" class="tk_qantity_input_m" name="quantity[{{ product.cart_id }}]">*/
/* 														<button class="tk_btn_update" type="button" onclick="updateCart('{{ product.cart_id }}', $('#tk_save_m input[name=\'quantity[{{ product.cart_id }}]\']').val(), '{{ lang }}');"><i class="tk_icon-refresh"></i></button>*/
/* 														<button type="button" onclick="removeCart('{{ product.cart_id }}');" title="Премахване" class="tk_btn_remove"><i class="tk_icon-close"></i></button>*/
/* 													</span>*/
/* 												</div>*/
/* 											</td>*/
/* 											<td class="tk_only_desctop">*/
/* 												<span id="tk_save_d">		*/
/* 													<input type="text" value="{{ product.quantity }}" class="tk_qantity_input_d" name="quantity[{{ product.cart_id }}]">*/
/* 													<button class="tk_btn_update" type="button" onclick="updateCart('{{ product.cart_id }}', $('#tk_save_d input[name=\'quantity[{{ product.cart_id }}]\']').val(), '{{ lang }}');"><i class="tk_icon-refresh"></i></button>*/
/* 													<button type="button" onclick="removeCart('{{ product.cart_id }}');" title="Премахване" class="tk_btn_remove"><i class="tk_icon-close"></i></button>*/
/* 												</span>*/
/* 											</td>*/
/* 											<td class="tk_only_desctop">*/
/* 												<span id="tk_cart_product_price_{{ product.cart_id }}">{{ product.price }}</span>*/
/* 											</td>*/
/* 											<td class="tk_text_right">*/
/* 												<span id="tk_cart_product_total_{{ product.cart_id }}">{{ product.total }}</span>*/
/* 											</td>*/
/* 										</tr>*/
/* 									{% endfor %}*/
/* 									{% for voucher_cart in vouchers %}*/
/* 										<tr>*/
/* 											<td>*</td>*/
/* 											<td>{{ voucher_cart.description }}</td>*/
/* 											<td class="tk_only_desctop">1</td>*/
/* 											<td class="tk_only_desctop">{{ voucher_cart.amount }}</td>*/
/* 											<td class="tk_text_right">{{ voucher_cart.amount }}</td>*/
/* 										</tr>*/
/* 									{% endfor %}*/
/* 									</tbody>*/
/* 								</table>*/
/* 								<div class="tk_clear"></div>*/
/* 								<div id="tk_cart_table">*/
/* 									{% for total in totals %}*/
/* 										<div class="tk_totals_price c-{{ total.code }}">*/
/* 											<div class="tk_totals_left"><strong>{{ total.title }}:</strong></div>*/
/* 											<div class="tk_totals_right">{{ total.text }}</div>*/
/* 											<div class="tk_clear"></div>*/
/* 										</div>*/
/* 									{% endfor %}*/
/* 								</div>*/
/* 								<div class="tk_clear"></div>*/
/* 								{% if (tk_special_totals) %}*/
/* 								<div id="tk_special_totals" style="margin-top: 15px;text-align: right;">*/
/* 									<hr>*/
/* 									{% for tk_special_total in tk_special_totals %}*/
/* 										<div class="tk_check_box">*/
/* 											<input type="checkbox" name="tk_special_total[{{ tk_special_total.special_total_id }}]" class="tk_special_total" id="tk_special_total_{{ tk_special_total.special_total_id }}"  {% if (tk_special_total.status) %}checked{% endif %}>*/
/* 											<label for="tk_special_total_{{ tk_special_total.special_total_id }}">{{ tk_special_total.title }}</label>*/
/* 										</div>*/
/* 									{% endfor %}*/
/* 								</div>*/
/* 									<script>*/
/*                       $(document).on('click', '.tk_special_total', function(e) {*/
/*                           e.stopImmediatePropagation();*/
/*                           $('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/*                           $('#tk_checkout').css('opacity','0.6');*/
/*                           $('#tk_checkout').css('pointer-events','none');*/
/*                           $('#tk_button_confirm').prop('disabled', true);*/
/*                           getShippingMethodAddress();*/
/*                       });*/
/* 									</script>*/
/* 								{% endif %}*/
/* 								*/
/* 								{% if (reward_status) %}*/
/* 									<div id="tk_reward" {% if (reward) %}class="tk_remove_reward_ok"{% endif %}>*/
/* 										<input type="button" value="{{ button_reward }}" id="tk_confirm_reward" data-loading-text="{{ text_loading }}" class="tk_btn_primary"/>*/
/* 										<input type="text" name="reward" value="{{ reward }}" placeholder="{{ txt_entry_reward }}" id="tk_input_reward"/>*/
/* 										<span id="tk_remove_reward_box">*/
/* 											{% if (reward) %}*/
/* 												<span class="tk_right tk_remove" id="tk_remove_reward"><i class="tk_icon-close"></i></span>*/
/* 											{% endif %}*/
/* 										</span>*/
/* 										<div class="tk_clear"></div>*/
/* 										<div class="tk_checkout_reward"></div>*/
/* 									</div>*/
/* 								{% endif %}*/
/* 								{% if (coupon_status) %}*/
/* 									<div id="tk_coupon" {% if (coupon) %}class="tk_remove_coupon_ok"{% endif %}>*/
/* 										<input type="button" value="{{ button_coupon }}" id="tk_confirm_coupon" data-loading-text="{{ text_loading }}" class="tk_btn_primary"/>*/
/* 										<input type="text" name="coupon" value="{{ coupon }}" placeholder="{{ txt_entry_coupon }}" id="tk_input_coupon"/>*/
/* 										<span id="tk_remove_coupon_box">*/
/* 											{% if (coupon) %}*/
/* 												<span class="tk_right tk_remove" id="tk_remove_coupon"><i class="tk_icon-close"></i></span>*/
/* 											{% endif %}*/
/* 										</span>*/
/* 										<div class="tk_clear"></div>*/
/* 										<div class="tk_checkout_coupon"></div>*/
/* 									</div>*/
/* 								{% endif %}*/
/* 								{% if (voucher_status) %}*/
/* 									<div id="tk_voucher" {% if (voucher) %} class="tk_remove_voucher_ok"{% endif %}>*/
/* 										<input type="button" value="{{ button_voucher }}" id="tk_confirm_voucher" data-loading-text="{{ text_loading }}" class="tk_btn_primary"/>*/
/* 										<input type="text" name="voucher" value="{{ voucher }}" placeholder="{{ txt_entry_voucher }}" id="tk_input_voucher"/>*/
/* 										<span id="tk_remove_voucher_box">*/
/* 											{% if (voucher) %}*/
/* 												<span class="tk_right tk_remove" id="tk_remove_voucher"><i class="tk_icon-close"></i></span>*/
/* 											{% endif %}*/
/* 										</span>*/
/* 										<div class="tk_clear"></div>*/
/* 										<div class="tk_checkout_voucher"></div>*/
/* 									</div>*/
/* 								{% endif %}*/
/* 							</div>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					{% if (customer_id is not defined or customer_id == 0) and module_tk_checkout_register == 0 %}*/
/* 					<div id="tk_register_bottom">*/
/* 						{% if (config_checkout_guest is defined and config_checkout_guest == 1) %}*/
/* 							{% if (module_tk_checkout_required_email != 3) %}*/
/* 								<div class="tk_check_box">*/
/* 									<input type="checkbox" name="register" onclick="$('#tk_register_form').toggle();$('#tk_newsletter').toggle();" id="tk_register">*/
/* 									<label for="tk_register">{{ text_register }}*/
/* 									</label>*/
/* 								</div>*/
/* 							{% endif %}*/
/* 						{% else %}*/
/* 							<input type="hidden" name="register" value="1">*/
/* 						{% endif %}*/
/* 						<div id="tk_register_form" {% if ((config_checkout_guest is defined and config_checkout_guest == 1) or module_tk_checkout_required_email == 3) %}style="display:none"{% endif %}>*/
/* 							<div class="tk_panel">*/
/* 								<div class="tk_panel_heading">*/
/* 									<span class="tk_panel_icon"><span class="tk_icon-login"></span></span>*/
/* 									<span class="tk_panel_text"> {{ text_register_account }}</span>*/
/* 									<span class="tk_all_spin"><i class="tk_icon-spin rotating"></i></span>*/
/* 								</div>*/
/* 								<div class="tk_panel_body">*/
/* 									<div class="tk_6_column tk_center_column">*/
/* 										<input type="password" name="password" value="" placeholder="{{ entry_password|replace({ ":": "" }) }}"/>*/
/* 										<span class="tk_floating_label">{{ entry_password|replace({ ":": "" }) }}</span>*/
/* 									</div>*/
/* 									<div class="tk_6_column tk_center_column">*/
/* 										<input type="password" name="confirm" value="" placeholder="{{ entry_confirm|replace({ ":": "" }) }}"/>*/
/* 										<span class="tk_floating_label">{{ entry_confirm|replace({ ":": "" }) }}</span>*/
/* 									</div>*/
/* 									<div class="tk_clear"></div>*/
/* 									*/
/* 									{% if customer_id is not defined or customer_id == 0 and count_customer_groups > 1 and module_tk_checkout_customer_group is defined and module_tk_checkout_customer_group == 1 %}*/
/* 										{% for customer_count,customer_group in customer_groups %}*/
/* 											{% if (customer_group['customer_group_id'] == customer_group_id or customer_count == 0) %}*/
/* 												<div class="tk_6_column tk_center_column">*/
/* 													<label class="customer_group_id"><input type="radio" name="customer_group_id" value="{{ customer_group['customer_group_id'] }}" checked="checked" onclick="var temp = getAccountCustomFields();getAddressCustomFields(); return temp;"/>{{ customer_group['name'] }}</label>*/
/* 												</div>*/
/* 											{% else %}*/
/* 												<div class="tk_6_column tk_center_column">*/
/* 													<label class="customer_group_id"><input type="radio" name="customer_group_id" value="{{ customer_group['customer_group_id'] }}" onclick="var temp = getAccountCustomFields();getAddressCustomFields(); return temp;"/>{{ customer_group['name'] }}</label>*/
/* 												</div>*/
/* 											{% endif %}*/
/* 										{% endfor %}*/
/* 									{% endif %}*/
/* 									<div class="tk_clear"></div>*/
/* 									*/
/* 								</div>*/
/* 							</div>*/
/* 						</div>*/
/* 						<div class="tk_clear"></div>*/
/* 					</div>*/
/* 					{% endif %}*/
/* 					*/
/* 					<div id="tk_confirm">*/
/* 						<div class="tk_panel">*/
/* 							<div class="tk_panel_body">*/
/* 								<div class="tk_12_column tk_center_column">*/
/* 									<textarea name="comment" rows="2" placeholder="{{ text_comments }}">{{ comment }}</textarea>*/
/* 									<div class="tk_agree" id="tk_newsletter" {% if customer_id or random_password or config_checkout_guest == 0 or config_checkout_guest is not defined %}style="display:block" {% else %}style="display:none"{% endif %}>*/
/* 										<label for="tk_newsletter_input">*/
/* 											<input type="checkbox" name="newsletter" id="tk_newsletter_input" value="1" {% if newsletter %}checked=""{% endif %} >*/
/* 											{{ entry_newsletter }}*/
/* 										</label>*/
/* 									</div>*/
/* 									{% if (text_agree is defined and text_agree) %}*/
/* 										<div class="tk_agree">*/
/* 											<label for="tk_agree_button">*/
/* 												<input type="checkbox" id="tk_agree_button" name="agree" value="1"/>*/
/* 												<strong style="color: #ff0000;">*</strong>*/
/* 												<strong id="tk_agree_popup">{{ text_agree }}</strong>*/
/* 											</label>*/
/* 										</div>*/
/* 									{% else %}*/
/* 										<input type="hidden" id="tk_agree_button" name="agree" value="1"/>*/
/* 									{% endif %}*/
/* 									*/
/* 									{% if (text_agree_2 is defined and text_agree_2) %}*/
/* 										<div class="tk_agree_2">*/
/* 											<label for="tk_agree_2_button">*/
/* 												<input type="checkbox" id="tk_agree_2_button" name="agree_2" value="1"/>*/
/* 												<strong style="color: #ff0000;">*</strong>*/
/* 												<strong id="tk_agree_popup">{{ text_agree_2 }}</strong>*/
/* 											</label>*/
/* 										</div>*/
/* 									{% else %}*/
/* 										<input type="hidden" id="tk_agree_2_button" name="agree_2" value="1"/>*/
/* 									{% endif %}*/
/* 									*/
/* 									<div class="error"></div>*/
/* 									*/
/* 									{% if (error_warning is defined and error_warning) %}*/
/* 										<div class="tk_alert"> {{ error_warning }}</div>*/
/* 									{% endif %}*/
/* 									<button type="button" class="tk_btn_success" data-loading-text="{{ text_loading }} ..." id="tk_button_confirm">{{ text_send }}</button>*/
/* 									<div class="tk_clear"></div>*/
/* 									<p class="tk_req_text">{{ text_req_text }}</p>*/
/* 								</div>*/
/* 							</div>*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="tk_clear"></div>*/
/* 					<div id="tk_text_under_button">*/
/* 						{{ text_under_button }}*/
/* 						<div class="tk_clear"></div>*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="tk_clear"></div>*/
/* 			</div>*/
/* 		</form>*/
/* 		<div id="tk_text_bottom">*/
/* 			{{ text_bottom }}*/
/* 			<div class="tk_clear"></div>*/
/* 		</div>*/
/* 	</div>*/
/* 	{% if (customer_id is not defined or customer_id == 0) %}*/
/* 		<div id="tk_quick_login">*/
/* 			<div class="tk_login_form">*/
/* 				<button title="Close (Esc)" type="button" class="mfp-close">×</button>*/
/* 				<form class="form-inline">*/
/* 					<div class="tk_12_column tk_center_column">*/
/* 						<label for="input-email">{{ entry_email }}</label>*/
/* 						<input type="text" name="login_email" value="" placeholder="{{ entry_email|replace({ ":": "" }) }}" id="input-email"/>*/
/* 					</div>*/
/* 					<div class="tk_12_column tk_center_column">*/
/* 						<label class="control-label" for="input-password">{{ entry_password }}</label>*/
/* 						<input type="password" name="login_password" value="" placeholder="{{ entry_password|replace({ ":": "" }) }}" id="input-password"/>*/
/* 					</div>*/
/* 					<div class="tk_12_column tk_center_column">*/
/* 						<input type="button" value="{{ button_login }}" id="tk_button_login" data-loading-text="{% if (text_loading is defined) %}{{ text_loading }}{% else %}{{ 'loading ...' }}{% endif %}" class="tk_btn_success"/>*/
/* 					</div>*/
/* 				</form>*/
/* 				<div class="tk_message_login"></div>*/
/* 				<hr>*/
/* 				<div class="tk_12_column tk_center_column tk_text_center"><a href="{{ forgotten }}">{{ text_forgotten }}</a></div>*/
/* 			</div>*/
/* 		</div>*/
/* 	{% endif %}*/
/* 	<div class="tk_clear"></div>*/
/* 	{{ content_bottom }}*/
/* </section>*/
/* */
/* <div id="tk_payment_triger_run"></div>*/
/* <script>*/
/* 	$(document).ready(function () {*/
/* 		var invoice = $('#invoice_checkbox').data('invoice');*/
/* 		if (invoice == '1') {*/
/* 			$('.invoice-form').css('display', 'block');*/
/* 		}*/
/* 	});*/
/* */
/* 	$('.tk_form input').change(function () {*/
/* 		saveData();*/
/* 	});*/
/* 	$('.tk_form select').change(function () {*/
/* 		saveData();*/
/* 	});*/
/* 	$('.tk_form textarea').change(function () {*/
/* 		saveData();*/
/* 	});*/
/* */
/* 	$('#tk_checkout').css('opacity', '0.6');*/
/* 	$('#tk_checkout').css('pointer-events', 'none');*/
/* 	$('#tk_button_confirm').prop('disabled', true);*/
/* 	*/
/* 	$(document).delegate('select[name=\'country_id\']', 'change', function () {*/
/* 		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 		$('#tk_checkout').css('opacity', '0.6');*/
/* 		$('#tk_checkout').css('pointer-events', 'none');*/
/* 		$('#tk_button_confirm').prop('disabled', true);*/
/* 		*/
/* 		$('#speedy_city_locator .radio_box_html').html('');*/
/* 		$('#speedy_city_id').val('');*/
/* 		$('#speedy_city').val('');*/
/* 		$('#speedy_city_select').val('');*/
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
/* 		*/
/* 		$('#speedy_office_id').val('');*/
/* 		$('#speedy_office_city_id').val('');*/
/* 		$('#speedy_office_name').val('');*/
/* 		$('#speedy_office_select').val('');*/
/* 		$('#speedy_office_address').val('');*/
/* 		$('#speedy_office_city').val('');*/
/* 		$('#speedy_office_city_select').val('');*/
/* 		$('#speedy_office_postcode').val('');*/
/* 		*/
/* 		$('.tk_speedy_address_city_select').removeClass('tk_redy_box');*/
/* 		$('.tk_speedy_quarter_select').removeClass('tk_redy_box');*/
/* 		$('.tk_speedy_street_select').removeClass('tk_redy_box');*/
/* 		$('.tk_speedy_office_select').removeClass('tk_redy_box');*/
/* 		$('.tk_speedy_office_city_select').removeClass('tk_redy_box');*/
/* 		$('.tk_speedy_office_city_id').removeClass('tk_redy_box');*/
/* 		*/
/* 		$('#econt_city_locator .radio_box_html').html('');*/
/* 		$('#econt_city_id').val('');*/
/* 		$('#econt_city').val('');*/
/* 		$('#econt_city_select').val('');*/
/* 		$('#econt_quarter_id').val('');*/
/* 		$('#econt_quarter').val('');*/
/* 		$('#econt_quarter_select').val('');*/
/* 		$('#econt_street_id').val('');*/
/* 		$('#econt_street').val('');*/
/* 		$('#econt_street_select').val('');*/
/* 		$('#econt_street_num').val('');*/
/* 		$('#econt_block_no').val('');*/
/* 		$('#econt_other').val('');*/
/* 		$('#econt_address_postcode').val('');*/
/* 		*/
/* 		$('#econt_office_id').val('');*/
/* 		$('#econt_office_city_id').val('');*/
/* 		$('#econt_office_name').val('');*/
/* 		$('#econt_office_select').val('');*/
/* 		$('#econt_office_address').val('');*/
/* 		$('#econt_office_city').val('');*/
/* 		$('#econt_office_city_select').val('');*/
/* 		$('#econt_office_postcode').val('');*/
/* 		*/
/* 		$('.tk_econt_address_city_select').removeClass('tk_redy_box');*/
/* 		$('.tk_econt_quarter_select').removeClass('tk_redy_box');*/
/* 		$('.tk_econt_street_select').removeClass('tk_redy_box');*/
/* 		$('.tk_econt_office_select').removeClass('tk_redy_box');*/
/* 		$('.tk_econt_office_city_select').removeClass('tk_redy_box');*/
/* 		$('.tk_econt_office_city_id').removeClass('tk_redy_box');*/
/* */
/* */
/* 		$.ajax({*/
/* 			url: 'index.php?route=tk_checkout/checkout/get_country&country_id=' + this.value,*/
/* 			dataType: 'json',*/
/* 			beforeSend: function () {*/
/* 			},*/
/* 			complete: function () {*/
/* 			},*/
/* 			success: function (json) {*/
/* 				html = '';*/
/* 				if (json['zone'] && json['zone'] != '') {*/
/* 					html += '<option value="0">{{ entry_zone|replace({ ":": "" }) }}</option>';*/
/* 					for (i = 0; i < json['zone'].length; i++) {*/
/* 						html += '<option value="' + json['zone'][i]['zone_id'] + '"';*/
/* 						if (json['zone'][i]['zone_id'] == '<?php echo $zone_id; ?>') {*/
/* 							html += ' selected="selected"';*/
/* 						}*/
/* 						html += '>' + json['zone'][i]['name'] + '</option>';*/
/* 					}*/
/* 				} else {*/
/* 					html += '<option value="0" selected="selected">{{ text_none|replace({ ":": "" }) }}</option>';*/
/* 				}*/
/* 				$('select[name=\'zone_id\']').html(html);*/
/* 			},*/
/* 			error: function (xhr, ajaxOptions, thrownError) {*/
/* 				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 			}*/
/* 		});*/
/* 		getShippingMethod();*/
/* 	});*/
/* */
/* 	$(document).delegate('select[name=\'zone_id\']', 'change', function () {*/
/* 		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');*/
/* 		$('#tk_checkout').css('opacity', '0.6');*/
/* 		$('#tk_checkout').css('pointer-events', 'none');*/
/* 		$('#tk_button_confirm').prop('disabled', true);*/
/* 		*/
/* 		var address_zone_id = $('input[name=\'address_zone_id\']').val();*/
/* 		*/
/* 		if (address_zone_id > 0) {*/
/* 			if ($(this).val() != address_zone_id) {*/
/* 				$("input:radio[name='base_address_type'][value='existing']").prop('checked', false);*/
/* 				$("input:radio[name='base_address_type'][value='new']").prop('checked', true);*/
/* 				jQuery('#address_new').show();*/
/* 			} else {*/
/* 				$("input:radio[name='base_address_type'][value='existing']").prop('checked', true);*/
/* 				$("input:radio[name='base_address_type'][value='new']").prop('checked', false);*/
/* 				jQuery('#address_new').hide();*/
/* 			}*/
/* 		}*/
/* */
/* 		getShippingMethod();*/
/* 	});*/
/* */
/* 	$('#tk_register').click(function () {*/
/* 		$('#tk_newsletter input').prop('checked', true)*/
/* 	});*/
/* */
/* </script>*/
/* <style>*/
/* 	.tk_panel_text::after {*/
/* 		background: {{ module_tk_checkout_color }} !important;*/
/* 	}*/
/* 	.tk_panel_icon {*/
/* 		color: {{ module_tk_checkout_color }} !important;*/
/* 	}*/
/* 	.tk_btn_clear:active:hover, .tk_btn_clear:active:focus, .tk_btn_clear:hover {*/
/* 		border-color: {{ module_tk_checkout_color }} !important;*/
/* 	}*/
/* 	.tk_btn_clear span, .tk_btn_clear i {*/
/* 		color: {{ module_tk_checkout_color }} !important;*/
/* 	}*/
/* 	#tk_checkout input:focus {*/
/* 		border: 1px solid {{ module_tk_checkout_color }} !important;*/
/* 	}*/
/* 	.tk_container {*/
/* 		max-width: {{ module_tk_checkout_size }}px !important;*/
/* 	}*/
/* 	*/
/* 	{{ module_tk_checkout_css }}*/
/* */
/* 	{% if module_tk_checkout_column == 1 %}*/
/* 	.tk_panel_heading .tk_panel_icon {*/
/* 		left: 25px !important;*/
/* 	}*/
/* 	{% if module_tk_checkout_size > 600 %}*/
/* 	.tk_payment_method {*/
/* 		width: 33.33% !important;*/
/* 	}*/
/* 	{% endif %}*/
/* 	{% endif %}*/
/* 	*/
/* 	.tk_btn_success {*/
/* 		background-color: {{ module_tk_checkout_color_button }} !important;*/
/* 		border-color: {{ module_tk_checkout_color_button }} !important;*/
/* 	}*/
/* 	.tk_btn_success:hover {*/
/* 		background-color: {{ module_tk_checkout_color_button_hover }} !important;*/
/* 		border-color: {{ module_tk_checkout_color_button_hover }} !important;*/
/* 	}*/
/* */
/* 	{% for key, shipping_image in module_tk_checkout_shipping_image %}*/
/* 	{% if shipping_image %}*/
/* 	#tk_checkout .tk_shipping_method .tk_shipping_method_icon.{{ key }} {*/
/* 		background-image: url('{{ shipping_image }}') !important;*/
/* 	}*/
/* */
/* 	{% endif %}*/
/* 	{% endfor %}*/
/* */
/* 	{% for key, payment_image in module_tk_checkout_payment_image %}*/
/* 	{% if payment_image %}*/
/* 	#tk_checkout #payment_code_{{ key }}.tk_payment_method .payment_check_bgr {*/
/* 		background-image: url('{{ payment_image }}') !important;*/
/* 	}*/
/* */
/* 	{% endif %}*/
/* 	{% endfor %}*/
/* </style>*/
/* {{ footer }} */
