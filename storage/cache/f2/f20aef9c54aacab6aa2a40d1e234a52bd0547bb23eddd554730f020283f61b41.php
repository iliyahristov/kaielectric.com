<?php

/* sale/order_info.twig */
class __TwigTemplate_357cb5893d93a1e9f6eafc63ba858e147ce3d2460cb98d3ae11b7bbde9818864 extends Twig_Template
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
    <div class=\"container-fluid\">
      <div class=\"pull-right\"><a href=\"";
        // line 5
        echo (isset($context["invoice"]) ? $context["invoice"] : null);
        echo "\" target=\"_blank\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_invoice_print"]) ? $context["button_invoice_print"] : null);
        echo "\" class=\"btn btn-info\"><i class=\"fa fa-print\"></i></a> <a href=\"";
        echo (isset($context["shipping"]) ? $context["shipping"] : null);
        echo "\" target=\"_blank\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_shipping_print"]) ? $context["button_shipping_print"] : null);
        echo "\" class=\"btn btn-info\"><i class=\"fa fa-truck\"></i></a> <a href=\"";
        echo (isset($context["edit"]) ? $context["edit"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a> <a href=\"";
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>


\t\t\t\t";
        // line 8
        if ((((((((isset($context["shipping_tk_econt_status"]) ? $context["shipping_tk_econt_status"] : null) && (isset($context["shipping_tk_econt_store_kay"]) ? $context["shipping_tk_econt_store_kay"] : null)) || (isset($context["shipping_tk_speedy_status"]) ? $context["shipping_tk_speedy_status"] : null)) || (isset($context["shipping_tk_transpress_status"]) ? $context["shipping_tk_transpress_status"] : null)) || (isset($context["shipping_tk_boxnow_status"]) ? $context["shipping_tk_boxnow_status"] : null)) || (isset($context["shipping_tk_next_status"]) ? $context["shipping_tk_next_status"] : null)) || (isset($context["shipping_tk_sameday_status"]) ? $context["shipping_tk_sameday_status"] : null))) {
            // line 9
            echo "\t\t\t\t\t<div class=\"pull-right\" style=\"margin-right:10px;\">
\t\t\t\t\t\t";
            // line 10
            if ((array_key_exists("econt_edit", $context) && ((isset($context["econt_edit"]) ? $context["econt_edit"] : null) != "0"))) {
                echo " 
\t\t\t\t\t\t\t";
                // line 11
                if (((isset($context["econt_status_id"]) ? $context["econt_status_id"] : null) == 2)) {
                    // line 12
                    echo "\t\t\t\t\t\t\t\t";
                    if (((isset($context["econt_shipment"]) ? $context["econt_shipment"] : null) != "0")) {
                        // line 13
                        echo "\t\t\t\t\t\t\t\t\t<a href=\"https://www.econt.com/services/track-shipment/";
                        echo (isset($context["econt_shipment"]) ? $context["econt_shipment"] : null);
                        echo "\" class=\"btn btn-info\" target=\"_blank\"><i class=\"fa fa-eye\"></i></a>
\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 15
                        echo (isset($context["econt_pdf"]) ? $context["econt_pdf"] : null);
                        echo "\" class=\"btn btn-success\" target=\"_blank\" style=\"padding: 8px 8px;min-width: 110px;\"><small>";
                        echo (isset($context["econt_shipment"]) ? $context["econt_shipment"] : null);
                        echo "</small></a>
\t\t\t\t\t\t\t\t\t\t<button id=\"econt_button_delete_";
                        // line 16
                        echo (isset($context["order_id"]) ? $context["order_id"] : null);
                        echo "\" class=\"btn btn-danger open_tk_econt_delete_label\" data-order-id=\"";
                        echo (isset($context["order_id"]) ? $context["order_id"] : null);
                        echo "\" data-toggle=\"tooltip\" title=\"";
                        echo (isset($context["button_delete"]) ? $context["button_delete"] : null);
                        echo "\"><i class=\"fa fa-trash-o\"></i></button>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 19
                        echo "\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t<button id=\"econt_button_send_";
                        // line 20
                        echo (isset($context["order_id"]) ? $context["order_id"] : null);
                        echo "\" class=\"btn btn-primary open_tk_econt_create_label\" data-order-id=\"";
                        echo (isset($context["order_id"]) ? $context["order_id"] : null);
                        echo "\" style=\"padding: 8px 8px;min-width: 110px;\"><small>Товарителница</small></button>
\t\t\t\t\t\t\t\t\t\t<a style=\"display: inline-block\" id=\"econt_button_edit_";
                        // line 21
                        echo (isset($context["order_id"]) ? $context["order_id"] : null);
                        echo "\" href=\"";
                        echo (isset($context["econt_edit"]) ? $context["econt_edit"] : null);
                        echo "\" data-toggle=\"tooltip\" title=\"";
                        echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
                        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    }
                    // line 24
                    echo "\t\t\t\t\t\t\t";
                } elseif (((isset($context["econt_status_id"]) ? $context["econt_status_id"] : null) == 1)) {
                    // line 25
                    echo "\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t<button id=\"econt_button_send_";
                    // line 26
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" class=\"btn btn-primary open_tk_econt_create_label\" data-order-id=\"";
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" style=\"padding: 8px 8px;min-width: 110px;\"><small>Товарителница</small></button>
\t\t\t\t\t\t\t\t\t<a style=\"display: inline-block\" id=\"econt_button_edit_";
                    // line 27
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" href=\"";
                    echo (isset($context["econt_edit"]) ? $context["econt_edit"] : null);
                    echo "\" data-toggle=\"tooltip\" title=\"";
                    echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
                    echo "\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                } elseif ((                // line 29
(isset($context["econt_status_id"]) ? $context["econt_status_id"] : null) == "admin_order")) {
                    // line 30
                    echo "\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t<a id=\"econt_button_edit_";
                    // line 31
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" href=\"";
                    echo (isset($context["econt_edit"]) ? $context["econt_edit"] : null);
                    echo "\" data-toggle=\"tooltip\" title=\"";
                    echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
                    echo "\" class=\"btn btn-primary\">Редактирай</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                } else {
                    // line 34
                    echo "\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t<button id=\"econt_button_on_";
                    // line 35
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" class=\"btn btn-info send_tk_econt_data\" data-order-id=\"";
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\"  style=\"padding: 8px 8px;min-width: 110px;\"><small>Изпрати</small></button>
\t\t\t\t\t\t\t\t\t<button id=\"econt_button_send_";
                    // line 36
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" class=\"btn btn-primary open_tk_econt_create_label\" style=\"display: none\" data-order-id=\"";
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" style=\"padding: 8px 8px;min-width: 110px;\"><small>Товарителница</small></button>
\t\t\t\t\t\t\t\t\t<a style=\"display: inline-block\" id=\"econt_button_edit_";
                    // line 37
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" href=\"";
                    echo (isset($context["econt_edit"]) ? $context["econt_edit"] : null);
                    echo "\" data-toggle=\"tooltip\" title=\"";
                    echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
                    echo "\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a> 
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                }
                // line 40
                echo "\t\t\t\t\t\t";
            } elseif ((array_key_exists("speedy_edit", $context) && ((isset($context["speedy_edit"]) ? $context["speedy_edit"] : null) != "0"))) {
                // line 41
                echo "\t\t\t\t\t\t\t";
                if (((isset($context["speedy_shipment"]) ? $context["speedy_shipment"] : null) != "0")) {
                    // line 42
                    echo "\t\t\t\t\t\t\t\t<a href=\"https://www.speedy.bg/bg/track-shipment?shipmentNumber=";
                    echo (isset($context["speedy_shipment"]) ? $context["speedy_shipment"] : null);
                    echo "\" class=\"btn btn-info\" target=\"_blank\"><i class=\"fa fa-eye\"></i></a>
\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 44
                    echo (isset($context["speedy_pdf"]) ? $context["speedy_pdf"] : null);
                    echo "\" class=\"btn btn-success\" target=\"_blank\"  style=\"padding: 8px 8px;min-width: 110px;\"><small>";
                    echo (isset($context["speedy_shipment"]) ? $context["speedy_shipment"] : null);
                    echo "</small></a>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 46
                    echo (isset($context["speedy_cancel"]) ? $context["speedy_cancel"] : null);
                    echo "\"  id=\"speedy_button_close_";
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" data-toggle=\"tooltip\" title=\"Анулирай\" class=\"tk_button_delete_shipping btn btn-danger\" data-original-title=\"Анулирай\"><i class=\"fa fa-trash-o\"></i></a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                } else {
                    // line 49
                    echo "\t\t\t\t\t\t\t\t<a href=\"";
                    echo (isset($context["speedy_edit"]) ? $context["speedy_edit"] : null);
                    echo "\" id=\"speedy_button_send_";
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" class=\"btn btn-primary open_tk_speedy_create_label\"  style=\"min-width: 150px;\"><small>Товарителница</small></a>
\t\t\t\t\t\t\t";
                }
                // line 51
                echo "\t\t\t\t\t\t";
            } elseif ((array_key_exists("transpress_edit", $context) && ((isset($context["transpress_edit"]) ? $context["transpress_edit"] : null) != "0"))) {
                // line 52
                echo "\t\t\t\t\t\t\t";
                if (((isset($context["transpress_shipment"]) ? $context["transpress_shipment"] : null) != "0")) {
                    // line 53
                    echo "\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 54
                    echo (isset($context["transpress_pdf"]) ? $context["transpress_pdf"] : null);
                    echo "\" class=\"btn btn-success\" target=\"_blank\">";
                    echo (isset($context["transpress_shipment"]) ? $context["transpress_shipment"] : null);
                    echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 56
                    echo (isset($context["transpress_cancel"]) ? $context["transpress_cancel"] : null);
                    echo "\"  id=\"transpress_button_close_";
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" data-toggle=\"tooltip\" title=\"Анулирай\" class=\"tk_button_delete_shipping btn btn-danger\" data-original-title=\"Анулирай\"><i class=\"fa fa-trash-o\"></i></a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                } else {
                    // line 59
                    echo "\t\t\t\t\t\t\t\t<a href=\"";
                    echo (isset($context["transpress_edit"]) ? $context["transpress_edit"] : null);
                    echo "\" id=\"transpress_button_send_";
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" class=\"btn btn-primary open_tk_transpress_create_label\"  style=\"min-width: 150px;\"><small>Товарителница</small></a>
\t\t\t\t\t\t\t";
                }
                // line 61
                echo "\t\t\t\t\t\t";
            } elseif ((array_key_exists("boxnow_status_id", $context) && ((isset($context["boxnow_status_id"]) ? $context["boxnow_status_id"] : null) != "0"))) {
                // line 62
                echo "\t\t\t\t\t\t\t";
                if (((isset($context["boxnow_shipment"]) ? $context["boxnow_shipment"] : null) != "0")) {
                    // line 63
                    echo "\t\t\t\t\t\t\t\t";
                    if (((isset($context["boxnow_cancel"]) ? $context["boxnow_cancel"] : null) != "0")) {
                        // line 64
                        echo "\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 65
                        echo (isset($context["boxnow_pdf"]) ? $context["boxnow_pdf"] : null);
                        echo "\" class=\"btn btn-success\" target=\"_blank\" style=\"padding: 8px 8px;min-width: 110px;\"><small>";
                        echo (isset($context["boxnow_shipment"]) ? $context["boxnow_shipment"] : null);
                        echo "</small></a>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 66
                        echo (isset($context["boxnow_cancel"]) ? $context["boxnow_cancel"] : null);
                        echo "\"  id=\"boxnow_button_close_";
                        echo (isset($context["order_id"]) ? $context["order_id"] : null);
                        echo "\" data-toggle=\"tooltip\" title=\"Анулирай\" class=\"tk_button_delete_shipping btn btn-danger\" data-original-title=\"Анулирай\"><i class=\"fa fa-trash-o\"></i></a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 69
                        echo "\t\t\t\t\t\t\t\t    ";
                        if (((isset($context["boxnow_status_id"]) ? $context["boxnow_status_id"] : null) == "Откзана от подател")) {
                            // line 70
                            echo "                                        <a href=\"";
                            echo (isset($context["boxnow_edit"]) ? $context["boxnow_edit"] : null);
                            echo "\" id=\"boxnow_button_send_";
                            echo (isset($context["order_id"]) ? $context["order_id"] : null);
                            echo "\" class=\"btn btn-primary open_tk_boxnow_create_label\"   style=\"min-width: 150px;\"><small>Товарителница</small></a>
                                    ";
                        } else {
                            // line 72
                            echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            echo (isset($context["boxnow_pdf"]) ? $context["boxnow_pdf"] : null);
                            echo "\" class=\"btn btn-success\" target=\"_blank\" style=\"min-width: 150px;\"><small>";
                            echo (isset($context["boxnow_shipment"]) ? $context["boxnow_shipment"] : null);
                            echo "</small></a>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 74
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 75
                    echo "\t\t\t\t\t\t\t";
                } else {
                    // line 76
                    echo "\t\t\t\t\t\t\t\t<a href=\"";
                    echo (isset($context["boxnow_edit"]) ? $context["boxnow_edit"] : null);
                    echo "\" id=\"boxnow_button_send_";
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" class=\"btn btn-primary open_tk_boxnow_create_label\"   style=\"min-width: 150px;\"><small>Товарителница</small></a>
\t\t\t\t\t\t\t";
                }
                // line 78
                echo "\t\t\t\t\t\t";
            } elseif ((array_key_exists("next_status_id", $context) && ((isset($context["next_status_id"]) ? $context["next_status_id"] : null) != "0"))) {
                // line 79
                echo "\t\t\t\t\t\t\t";
                if (((isset($context["next_shipment"]) ? $context["next_shipment"] : null) != "0")) {
                    // line 80
                    echo "\t\t\t\t\t\t\t\t";
                    if (((isset($context["next_cancel"]) ? $context["next_cancel"] : null) != "0")) {
                        // line 81
                        echo "\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 82
                        echo (isset($context["next_pdf"]) ? $context["next_pdf"] : null);
                        echo "\" class=\"btn btn-success\" target=\"_blank\" style=\"padding: 8px 8px;min-width: 110px;\"><small>";
                        echo (isset($context["next_shipment"]) ? $context["next_shipment"] : null);
                        echo "</small></a>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 83
                        echo (isset($context["next_cancel"]) ? $context["next_cancel"] : null);
                        echo "\"  id=\"next_button_close_";
                        echo (isset($context["order_id"]) ? $context["order_id"] : null);
                        echo "\" data-toggle=\"tooltip\" title=\"Анулирай\" class=\"tk_button_delete_shipping btn btn-danger\" data-original-title=\"Анулирай\"><i class=\"fa fa-trash-o\"></i></a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 86
                        echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                        echo (isset($context["next_pdf"]) ? $context["next_pdf"] : null);
                        echo "\" class=\"btn btn-success\" target=\"_blank\" style=\"min-width: 150px;\"><small>";
                        echo (isset($context["next_shipment"]) ? $context["next_shipment"] : null);
                        echo "</small></a>
\t\t\t\t\t\t\t\t";
                    }
                    // line 88
                    echo "\t\t\t\t\t\t\t";
                } else {
                    // line 89
                    echo "\t\t\t\t\t\t\t\t<a href=\"";
                    echo (isset($context["next_edit"]) ? $context["next_edit"] : null);
                    echo "\" id=\"next_button_send_";
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" class=\"btn btn-primary open_tk_next_create_label\"   style=\"min-width: 150px;\"><small>Товарителница</small></a>
\t\t\t\t\t\t\t";
                }
                // line 91
                echo "                        ";
            } elseif ((array_key_exists("sameday_status_id", $context) && ((isset($context["sameday_status_id"]) ? $context["sameday_status_id"] : null) != "0"))) {
                // line 92
                echo "\t\t\t\t\t\t\t";
                if (((isset($context["sameday_shipment"]) ? $context["sameday_shipment"] : null) != "0")) {
                    // line 93
                    echo "\t\t\t\t\t\t\t\t";
                    if (((isset($context["sameday_cancel"]) ? $context["sameday_cancel"] : null) != "0")) {
                        // line 94
                        echo "\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 95
                        echo (isset($context["sameday_pdf"]) ? $context["sameday_pdf"] : null);
                        echo "\" class=\"btn btn-success\" target=\"_blank\" style=\"padding: 8px 8px;min-width: 110px;\"><small>";
                        echo (isset($context["sameday_shipment"]) ? $context["sameday_shipment"] : null);
                        echo "</small></a>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 96
                        echo (isset($context["sameday_cancel"]) ? $context["sameday_cancel"] : null);
                        echo "\"  id=\"sameday_button_close_";
                        echo (isset($context["order_id"]) ? $context["order_id"] : null);
                        echo "\" data-toggle=\"tooltip\" title=\"Анулирай\" class=\"tk_button_delete_shipping btn btn-danger\" data-original-title=\"Анулирай\"><i class=\"fa fa-trash-o\"></i></a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 99
                        echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                        echo (isset($context["sameday_pdf"]) ? $context["sameday_pdf"] : null);
                        echo "\" class=\"btn btn-success\" target=\"_blank\" style=\"min-width: 150px;\"><small>";
                        echo (isset($context["sameday_shipment"]) ? $context["sameday_shipment"] : null);
                        echo "</small></a>
\t\t\t\t\t\t\t\t";
                    }
                    // line 101
                    echo "\t\t\t\t\t\t\t";
                } else {
                    // line 102
                    echo "\t\t\t\t\t\t\t\t<a href=\"";
                    echo (isset($context["sameday_edit"]) ? $context["sameday_edit"] : null);
                    echo "\" id=\"sameday_button_send_";
                    echo (isset($context["order_id"]) ? $context["order_id"] : null);
                    echo "\" class=\"btn btn-primary open_tk_sameday_create_label\"   style=\"min-width: 150px;\"><small>Товарителница</small></a>
\t\t\t\t\t\t\t";
                }
                // line 104
                echo "\t\t\t\t\t\t";
            }
            // line 105
            echo "\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 107
        echo "\t\t\t\t
      <h1>";
        // line 108
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 110
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 111
            echo "        <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"row\">
      <div class=\"col-md-4\">
        <div class=\"panel panel-default\">
          <div class=\"panel-heading\">
            <h3 class=\"panel-title\"><i class=\"fa fa-shopping-cart\"></i> ";
        // line 121
        echo (isset($context["text_order_detail"]) ? $context["text_order_detail"] : null);
        echo "</h3>
          </div>
          <table class=\"table\">
            <tbody>
              <tr>
                <td style=\"width: 1%;\"><button data-toggle=\"tooltip\" title=\"";
        // line 126
        echo (isset($context["text_store"]) ? $context["text_store"] : null);
        echo "\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-shopping-cart fa-fw\"></i></button></td>
                <td><a href=\"";
        // line 127
        echo (isset($context["store_url"]) ? $context["store_url"] : null);
        echo "\" target=\"_blank\">";
        echo (isset($context["store_name"]) ? $context["store_name"] : null);
        echo "</a></td>
              </tr>
              <tr>
                <td><button data-toggle=\"tooltip\" title=\"";
        // line 130
        echo (isset($context["text_date_added"]) ? $context["text_date_added"] : null);
        echo "\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-calendar fa-fw\"></i></button></td>
                <td>";
        // line 131
        echo (isset($context["date_added"]) ? $context["date_added"] : null);
        echo "</td>
              </tr>
              <tr>
                <td><button data-toggle=\"tooltip\" title=\"";
        // line 134
        echo (isset($context["text_payment_method"]) ? $context["text_payment_method"] : null);
        echo "\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-credit-card fa-fw\"></i></button></td>
                <td>";
        // line 135
        echo (isset($context["payment_method"]) ? $context["payment_method"] : null);
        echo "</td>
              </tr>
            ";
        // line 137
        if ((isset($context["shipping_method"]) ? $context["shipping_method"] : null)) {
            // line 138
            echo "            <tr>
              <td><button data-toggle=\"tooltip\" title=\"";
            // line 139
            echo (isset($context["text_shipping_method"]) ? $context["text_shipping_method"] : null);
            echo "\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-truck fa-fw\"></i></button></td>
              <td>";
            // line 140
            echo (isset($context["shipping_method"]) ? $context["shipping_method"] : null);
            echo "</td>
            </tr>
            ";
        }
        // line 143
        echo "              </tbody>
            
          </table>
        </div>
      </div>
      <div class=\"col-md-4\">
        <div class=\"panel panel-default\">
          <div class=\"panel-heading\">
            <h3 class=\"panel-title\"><i class=\"fa fa-user\"></i> ";
        // line 151
        echo (isset($context["text_customer_detail"]) ? $context["text_customer_detail"] : null);
        echo "</h3>
          </div>
          <table class=\"table\">
            <tr>
              <td style=\"width: 1%;\"><button data-toggle=\"tooltip\" title=\"";
        // line 155
        echo (isset($context["text_customer"]) ? $context["text_customer"] : null);
        echo "\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-user fa-fw\"></i></button></td>
              <td>";
        // line 156
        if ((isset($context["customer"]) ? $context["customer"] : null)) {
            echo " <a href=\"";
            echo (isset($context["customer"]) ? $context["customer"] : null);
            echo "\" target=\"_blank\">";
            echo (isset($context["firstname"]) ? $context["firstname"] : null);
            echo " ";
            echo (isset($context["lastname"]) ? $context["lastname"] : null);
            echo "</a> ";
        } else {
            // line 157
            echo "                ";
            echo (isset($context["firstname"]) ? $context["firstname"] : null);
            echo " ";
            echo (isset($context["lastname"]) ? $context["lastname"] : null);
            echo "
                ";
        }
        // line 158
        echo "</td>
            </tr>
            <tr>
              <td><button data-toggle=\"tooltip\" title=\"";
        // line 161
        echo (isset($context["text_customer_group"]) ? $context["text_customer_group"] : null);
        echo "\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-group fa-fw\"></i></button></td>
              <td>";
        // line 162
        echo (isset($context["customer_group"]) ? $context["customer_group"] : null);
        echo "</td>
            </tr>
            <tr>
              <td><button data-toggle=\"tooltip\" title=\"";
        // line 165
        echo (isset($context["text_email"]) ? $context["text_email"] : null);
        echo "\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-envelope-o fa-fw\"></i></button></td>
              <td><a href=\"mailto:";
        // line 166
        echo (isset($context["email"]) ? $context["email"] : null);
        echo "\">";
        echo (isset($context["email"]) ? $context["email"] : null);
        echo "</a></td>
            </tr>
            <tr>
              <td><button data-toggle=\"tooltip\" title=\"";
        // line 169
        echo (isset($context["text_telephone"]) ? $context["text_telephone"] : null);
        echo "\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-phone fa-fw\"></i></button></td>
              <td>";
        // line 170
        echo (isset($context["telephone"]) ? $context["telephone"] : null);
        echo "</td>
            </tr>
          </table>
        </div>
      </div>
      <div class=\"col-md-4\">
        <div class=\"panel panel-default\">
          <div class=\"panel-heading\">
            <h3 class=\"panel-title\"><i class=\"fa fa-cog\"></i> ";
        // line 178
        echo (isset($context["text_option"]) ? $context["text_option"] : null);
        echo "</h3>
          </div>
          <table class=\"table\">
            <tbody>
              <tr>
                <td>";
        // line 183
        echo (isset($context["text_invoice"]) ? $context["text_invoice"] : null);
        echo "</td>
                <td id=\"invoice\" class=\"text-right\">";
        // line 184
        echo (isset($context["invoice_no"]) ? $context["invoice_no"] : null);
        echo "</td>
                <td style=\"width: 1%;\" class=\"text-center\">";
        // line 185
        if ( !(isset($context["invoice_no"]) ? $context["invoice_no"] : null)) {
            // line 186
            echo "                  <button id=\"button-invoice\" data-loading-text=\"";
            echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
            echo "\" data-toggle=\"tooltip\" title=\"";
            echo (isset($context["button_generate"]) ? $context["button_generate"] : null);
            echo "\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-cog\"></i></button>
                  ";
        } else {
            // line 188
            echo "                  <button disabled=\"disabled\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-refresh\"></i></button>
                  ";
        }
        // line 189
        echo "</td>
              </tr>
              <tr>
                <td>";
        // line 192
        echo (isset($context["text_reward"]) ? $context["text_reward"] : null);
        echo "</td>
                <td class=\"text-right\">";
        // line 193
        echo (isset($context["reward"]) ? $context["reward"] : null);
        echo "</td>
                <td class=\"text-center\">";
        // line 194
        if (((isset($context["customer"]) ? $context["customer"] : null) && (isset($context["reward"]) ? $context["reward"] : null))) {
            // line 195
            echo "                  ";
            if ( !(isset($context["reward_total"]) ? $context["reward_total"] : null)) {
                // line 196
                echo "                  <button id=\"button-reward-add\" data-loading-text=\"";
                echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_reward_add"]) ? $context["button_reward_add"] : null);
                echo "\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-plus-circle\"></i></button>
                  ";
            } else {
                // line 198
                echo "                  <button id=\"button-reward-remove\" data-loading-text=\"";
                echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_reward_remove"]) ? $context["button_reward_remove"] : null);
                echo "\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-minus-circle\"></i></button>
                  ";
            }
            // line 200
            echo "                  ";
        } else {
            // line 201
            echo "                  <button disabled=\"disabled\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-plus-circle\"></i></button>
                  ";
        }
        // line 202
        echo "</td>
              </tr>
              <tr>
                <td>";
        // line 205
        echo (isset($context["text_affiliate"]) ? $context["text_affiliate"] : null);
        echo "
                  ";
        // line 206
        if ((isset($context["affiliate"]) ? $context["affiliate"] : null)) {
            // line 207
            echo "                  (<a href=\"";
            echo (isset($context["affiliate"]) ? $context["affiliate"] : null);
            echo "\">";
            echo (isset($context["affiliate_firstname"]) ? $context["affiliate_firstname"] : null);
            echo " ";
            echo (isset($context["affiliate_lastname"]) ? $context["affiliate_lastname"] : null);
            echo "</a>)
                  ";
        }
        // line 208
        echo "</td>
                <td class=\"text-right\">";
        // line 209
        echo (isset($context["commission"]) ? $context["commission"] : null);
        echo "</td>
                <td class=\"text-center\">";
        // line 210
        if ((isset($context["affiliate"]) ? $context["affiliate"] : null)) {
            // line 211
            echo "                  ";
            if ( !(isset($context["commission_total"]) ? $context["commission_total"] : null)) {
                // line 212
                echo "                  <button id=\"button-commission-add\" data-loading-text=\"";
                echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_commission_add"]) ? $context["button_commission_add"] : null);
                echo "\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-plus-circle\"></i></button>
                  ";
            } else {
                // line 214
                echo "                  <button id=\"button-commission-remove\" data-loading-text=\"";
                echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_commission_remove"]) ? $context["button_commission_remove"] : null);
                echo "\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-minus-circle\"></i></button>
                  ";
            }
            // line 216
            echo "                  ";
        } else {
            // line 217
            echo "                  <button disabled=\"disabled\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-plus-circle\"></i></button>
                  ";
        }
        // line 218
        echo "</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-info-circle\"></i> ";
        // line 227
        echo (isset($context["text_order"]) ? $context["text_order"] : null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <table class=\"table table-bordered\">
          <thead>
            <tr>
              
\t\t\t\t<td style=\"width: 33%;\" class=\"text-left\">
\t \t\t";
        // line 235
        echo (isset($context["text_payment_address"]) ? $context["text_payment_address"] : null);
        echo "</td>
              ";
        // line 236
        if ((isset($context["shipping_method"]) ? $context["shipping_method"] : null)) {
            // line 237
            echo "              
\t\t\t\t<td style=\"width: 33%;\" class=\"text-left\">
\t \t\t";
            // line 239
            echo (isset($context["text_shipping_address"]) ? $context["text_shipping_address"] : null);
            echo "</td>

\t\t\t\t<td style=\"width: 34%;\" class=\"text-left\">";
            // line 241
            echo (isset($context["text_account_custom_field"]) ? $context["text_account_custom_field"] : null);
            echo "</td>
\t \t\t
              ";
        }
        // line 243
        echo " </tr>
          </thead>
          <tbody>
            <tr>
              <td class=\"text-left\">";
        // line 247
        echo (isset($context["payment_address"]) ? $context["payment_address"] : null);
        echo "</td>
              ";
        // line 248
        if ((isset($context["shipping_method"]) ? $context["shipping_method"] : null)) {
            // line 249
            echo "              <td class=\"text-left\">";
            echo (isset($context["shipping_address"]) ? $context["shipping_address"] : null);
            echo "</td>

\t\t\t<td class=\"text-left\">
\t\t\t\t";
            // line 252
            if (($this->getAttribute($this->getAttribute((isset($context["payment_custom_fields"]) ? $context["payment_custom_fields"] : null), 0, array(), "array", false, true), "value", array(), "array", true, true) && $this->getAttribute($this->getAttribute((isset($context["payment_custom_fields"]) ? $context["payment_custom_fields"] : null), 0, array(), "array"), "value", array(), "array"))) {
                echo " 
\t              <div class=\"table-responsive\">
\t                <table class=\"table table-bordered\">
\t                  <tbody>
\t                    ";
                // line 256
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["payment_custom_fields"]) ? $context["payment_custom_fields"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
                    // line 257
                    echo "\t                      <tr>
\t                        <td>";
                    // line 258
                    echo $this->getAttribute($context["custom_field"], "name", array());
                    echo "</td>
\t                        <td>";
                    // line 259
                    echo $this->getAttribute($context["custom_field"], "value", array());
                    echo "</td>
\t                      </tr>
\t                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 262
                echo "\t                  </tbody>
\t                </table>
\t              </div>
            \t";
            }
            // line 266
            echo "            \t
            \t";
            // line 267
            if (($this->getAttribute($this->getAttribute((isset($context["account_custom_fields"]) ? $context["account_custom_fields"] : null), 0, array(), "array", false, true), "value", array(), "array", true, true) && $this->getAttribute($this->getAttribute((isset($context["account_custom_fields"]) ? $context["account_custom_fields"] : null), 0, array(), "array"), "value", array(), "array"))) {
                echo " 
\t              <div class=\"table-responsive\">
\t                <table class=\"table table-bordered\">
\t                  <tbody>
\t                    ";
                // line 271
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["account_custom_fields"]) ? $context["account_custom_fields"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
                    // line 272
                    echo "\t                      <tr>
\t                        <td>";
                    // line 273
                    echo $this->getAttribute($context["custom_field"], "name", array());
                    echo "</td>
\t                        <td>";
                    // line 274
                    echo $this->getAttribute($context["custom_field"], "value", array());
                    echo "</td>
\t                      </tr>
\t                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 277
                echo "\t                  </tbody>
\t                </table>
\t              </div>
            \t";
            }
            // line 281
            echo "            </td>
\t \t\t
              ";
        }
        // line 283
        echo " </tr>
          </tbody>
        </table>
        <table class=\"table table-bordered\">
          <thead>
            <tr>
              <td class=\"text-left\">";
        // line 289
        echo (isset($context["column_product"]) ? $context["column_product"] : null);
        echo "</td>
              <td class=\"text-left\">";
        // line 290
        echo (isset($context["column_model"]) ? $context["column_model"] : null);
        echo "</td>
              <td class=\"text-right\">";
        // line 291
        echo (isset($context["column_quantity"]) ? $context["column_quantity"] : null);
        echo "</td>
              <td class=\"text-right\">";
        // line 292
        echo (isset($context["column_price"]) ? $context["column_price"] : null);
        echo "</td>
              <td class=\"text-right\">";
        // line 293
        echo (isset($context["column_total"]) ? $context["column_total"] : null);
        echo "</td>
            </tr>
          </thead>
          <tbody>
          
          ";
        // line 298
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 299
            echo "          <tr>
            <td class=\"text-left\"><a href=\"";
            // line 300
            echo $this->getAttribute($context["product"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["product"], "name", array());
            echo "</a> ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["product"], "option", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                echo " <br />
              ";
                // line 301
                if (($this->getAttribute($context["option"], "type", array()) != "file")) {
                    // line 302
                    echo "              &nbsp;<small> - ";
                    echo $this->getAttribute($context["option"], "name", array());
                    echo ": ";
                    echo $this->getAttribute($context["option"], "value", array());
                    echo "</small> ";
                } else {
                    // line 303
                    echo "              &nbsp;<small> - ";
                    echo $this->getAttribute($context["option"], "name", array());
                    echo ": <a href=\"";
                    echo $this->getAttribute($context["option"], "href", array());
                    echo "\">";
                    echo $this->getAttribute($context["option"], "value", array());
                    echo "</a></small> ";
                }
                // line 304
                echo "              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</td>
            <td class=\"text-left\">";
            // line 305
            echo $this->getAttribute($context["product"], "model", array());
            echo "</td>
            <td class=\"text-right\">";
            // line 306
            echo $this->getAttribute($context["product"], "quantity", array());
            echo "</td>
            <td class=\"text-right\">";
            // line 307
            echo $this->getAttribute($context["product"], "price", array());
            echo "</td>
            <td class=\"text-right\">";
            // line 308
            echo $this->getAttribute($context["product"], "total", array());
            echo "</td>
          </tr>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 311
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["vouchers"]) ? $context["vouchers"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["voucher"]) {
            // line 312
            echo "          <tr>
            <td class=\"text-left\"><a href=\"";
            // line 313
            echo $this->getAttribute($context["voucher"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["voucher"], "description", array());
            echo "</a></td>
            <td class=\"text-left\"></td>
            <td class=\"text-right\">1</td>
            <td class=\"text-right\">";
            // line 316
            echo $this->getAttribute($context["voucher"], "amount", array());
            echo "</td>
            <td class=\"text-right\">";
            // line 317
            echo $this->getAttribute($context["voucher"], "amount", array());
            echo "</td>
          </tr>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['voucher'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 320
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["totals"]) ? $context["totals"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["total"]) {
            // line 321
            echo "          <tr>
            <td colspan=\"4\" class=\"text-right\">";
            // line 322
            echo $this->getAttribute($context["total"], "title", array());
            echo "</td>
            <td class=\"text-right\">";
            // line 323
            echo $this->getAttribute($context["total"], "text", array());
            echo "</td>
          </tr>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['total'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 326
        echo "            </tbody>
          
        </table>
        ";
        // line 329
        if ((isset($context["comment"]) ? $context["comment"] : null)) {
            // line 330
            echo "        <table class=\"table table-bordered\">
          <thead>
            <tr>
              <td>";
            // line 333
            echo (isset($context["text_comment"]) ? $context["text_comment"] : null);
            echo "</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>";
            // line 338
            echo (isset($context["comment"]) ? $context["comment"] : null);
            echo "</td>
            </tr>
          </tbody>
        </table>
        ";
        }
        // line 342
        echo " </div>
    </div>
    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-comment-o\"></i> ";
        // line 346
        echo (isset($context["text_history"]) ? $context["text_history"] : null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <ul class=\"nav nav-tabs\">
          <li class=\"active\"><a href=\"#tab-history\" data-toggle=\"tab\">";
        // line 350
        echo (isset($context["tab_history"]) ? $context["tab_history"] : null);
        echo "</a></li>
          <li><a href=\"#tab-additional\" data-toggle=\"tab\">";
        // line 351
        echo (isset($context["tab_additional"]) ? $context["tab_additional"] : null);
        echo "</a></li>
          ";
        // line 352
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tabs"]) ? $context["tabs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["tab"]) {
            // line 353
            echo "          <li><a href=\"#tab-";
            echo $this->getAttribute($context["tab"], "code", array());
            echo "\" data-toggle=\"tab\">";
            echo $this->getAttribute($context["tab"], "title", array());
            echo "</a></li>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 355
        echo "        </ul>
        <div class=\"tab-content\">
          <div class=\"tab-pane active\" id=\"tab-history\">
            <div id=\"history\"></div>
            <br />
            <fieldset>
              <legend>";
        // line 361
        echo (isset($context["text_history_add"]) ? $context["text_history_add"] : null);
        echo "</legend>
              <form class=\"form-horizontal\">
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-order-status\">";
        // line 364
        echo (isset($context["entry_order_status"]) ? $context["entry_order_status"] : null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"order_status_id\" id=\"input-order-status\" class=\"form-control\">
                      
                      
                      ";
        // line 369
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["order_statuses"]);
        foreach ($context['_seq'] as $context["_key"] => $context["order_statuses"]) {
            // line 370
            echo "                      ";
            if (($this->getAttribute($context["order_statuses"], "order_status_id", array()) == (isset($context["order_status_id"]) ? $context["order_status_id"] : null))) {
                // line 371
                echo "                      
                      
                      <option value=\"";
                // line 373
                echo $this->getAttribute($context["order_statuses"], "order_status_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["order_statuses"], "name", array());
                echo "</option>
                      
                      
                      ";
            } else {
                // line 377
                echo "                      
                      
                      <option value=\"";
                // line 379
                echo $this->getAttribute($context["order_statuses"], "order_status_id", array());
                echo "\">";
                echo $this->getAttribute($context["order_statuses"], "name", array());
                echo "</option>
                      
                      
                      ";
            }
            // line 383
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_statuses'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 384
        echo "                    
                    
                    </select>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-override\"><span data-toggle=\"tooltip\" title=\"";
        // line 390
        echo (isset($context["help_override"]) ? $context["help_override"] : null);
        echo "\">";
        echo (isset($context["entry_override"]) ? $context["entry_override"] : null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <div class=\"checkbox\">
                      <input type=\"checkbox\" name=\"override\" value=\"1\" id=\"input-override\" />
                    </div>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-notify\">";
        // line 398
        echo (isset($context["entry_notify"]) ? $context["entry_notify"] : null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"checkbox\">
                      <input type=\"checkbox\" name=\"notify\" value=\"1\" id=\"input-notify\" />
                    </div>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-comment\">";
        // line 406
        echo (isset($context["entry_comment"]) ? $context["entry_comment"] : null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"comment\" rows=\"8\" id=\"input-comment\" class=\"form-control\"></textarea>
                  </div>
                </div>
              </form>
            </fieldset>
            <div class=\"text-right\">
              <button id=\"button-history\" data-loading-text=\"";
        // line 414
        echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-plus-circle\"></i> ";
        echo (isset($context["button_history_add"]) ? $context["button_history_add"] : null);
        echo "</button>
            </div>
          </div>
          <div class=\"tab-pane\" id=\"tab-additional\"> ";
        // line 417
        if ((isset($context["account_custom_fields"]) ? $context["account_custom_fields"] : null)) {
            // line 418
            echo "            <div class=\"table-responsive\">
              <table class=\"table table-bordered\">
                <thead>
                  <tr>
                    <td colspan=\"2\">";
            // line 422
            echo (isset($context["text_account_custom_field"]) ? $context["text_account_custom_field"] : null);
            echo "</td>
                  </tr>
                </thead>
                <tbody>
                
                ";
            // line 427
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["account_custom_fields"]) ? $context["account_custom_fields"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
                // line 428
                echo "                <tr>
                  <td>";
                // line 429
                echo $this->getAttribute($context["custom_field"], "name", array());
                echo "</td>
                  <td>";
                // line 430
                echo $this->getAttribute($context["custom_field"], "value", array());
                echo "</td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 433
            echo "                  </tbody>
                
              </table>
            </div>
            ";
        }
        // line 438
        echo "            ";
        if ((isset($context["payment_custom_fields"]) ? $context["payment_custom_fields"] : null)) {
            // line 439
            echo "            <div class=\"table-responsive\">
              <table class=\"table table-bordered\">
                <thead>
                  <tr>
                    <td colspan=\"2\">";
            // line 443
            echo (isset($context["text_payment_custom_field"]) ? $context["text_payment_custom_field"] : null);
            echo "</td>
                  </tr>
                </thead>
                <tbody>
                
                ";
            // line 448
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["payment_custom_fields"]) ? $context["payment_custom_fields"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
                // line 449
                echo "                <tr>
                  <td>";
                // line 450
                echo $this->getAttribute($context["custom_field"], "name", array());
                echo "</td>
                  <td>";
                // line 451
                echo $this->getAttribute($context["custom_field"], "value", array());
                echo "</td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 454
            echo "                  </tbody>
                
              </table>
            </div>
            ";
        }
        // line 459
        echo "            ";
        if (((isset($context["shipping_method"]) ? $context["shipping_method"] : null) && (isset($context["shipping_custom_fields"]) ? $context["shipping_custom_fields"] : null))) {
            // line 460
            echo "            <div class=\"table-responsive\">
              <table class=\"table table-bordered\">
                <thead>
                  <tr>
                    <td colspan=\"2\">";
            // line 464
            echo (isset($context["text_shipping_custom_field"]) ? $context["text_shipping_custom_field"] : null);
            echo "</td>
                  </tr>
                </thead>
                <tbody>
                
                ";
            // line 469
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["shipping_custom_fields"]) ? $context["shipping_custom_fields"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
                // line 470
                echo "                <tr>
                  <td>";
                // line 471
                echo $this->getAttribute($context["custom_field"], "name", array());
                echo "</td>
                  <td>";
                // line 472
                echo $this->getAttribute($context["custom_field"], "value", array());
                echo "</td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 475
            echo "                  </tbody>
                
              </table>
            </div>
            ";
        }
        // line 480
        echo "            <div class=\"table-responsive\">
              <table class=\"table table-bordered\">
                <thead>
                  <tr>
                    <td colspan=\"2\">";
        // line 484
        echo (isset($context["text_browser"]) ? $context["text_browser"] : null);
        echo "</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>";
        // line 489
        echo (isset($context["text_ip"]) ? $context["text_ip"] : null);
        echo "</td>
                    <td>";
        // line 490
        echo (isset($context["ip"]) ? $context["ip"] : null);
        echo "</td>
                  </tr>
                ";
        // line 492
        if ((isset($context["forwarded_ip"]) ? $context["forwarded_ip"] : null)) {
            // line 493
            echo "                <tr>
                  <td>";
            // line 494
            echo (isset($context["text_forwarded_ip"]) ? $context["text_forwarded_ip"] : null);
            echo "</td>
                  <td>";
            // line 495
            echo (isset($context["forwarded_ip"]) ? $context["forwarded_ip"] : null);
            echo "</td>
                </tr>
                ";
        }
        // line 498
        echo "                <tr>
                  <td>";
        // line 499
        echo (isset($context["text_user_agent"]) ? $context["text_user_agent"] : null);
        echo "</td>
                  <td>";
        // line 500
        echo (isset($context["user_agent"]) ? $context["user_agent"] : null);
        echo "</td>
                </tr>
                <tr>
                  <td>";
        // line 503
        echo (isset($context["text_accept_language"]) ? $context["text_accept_language"] : null);
        echo "</td>
                  <td>";
        // line 504
        echo (isset($context["accept_language"]) ? $context["accept_language"] : null);
        echo "</td>
                </tr>
                  </tbody>
                
              </table>
            </div>
          </div>
          ";
        // line 511
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tabs"]) ? $context["tabs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["tab"]) {
            // line 512
            echo "          <div class=\"tab-pane\" id=\"tab-";
            echo $this->getAttribute($context["tab"], "code", array());
            echo "\">";
            echo $this->getAttribute($context["tab"], "content", array());
            echo "</div>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 513
        echo " </div>
      </div>
    </div>
  </div>
  <script type=\"text/javascript\"><!--
\$(document).delegate('#button-invoice', 'click', function() {
\t\$.ajax({
\t\turl: 'index.php?route=sale/order/createinvoiceno&user_token=";
        // line 520
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&order_id=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "',
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('#button-invoice').button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-invoice').button('reset');
\t\t},
\t\tsuccess: function(json) {
\t\t\t\$('.alert-dismissible').remove();

\t\t\tif (json['error']) {
\t\t\t\t\$('#content > .container-fluid').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + '</div>');
\t\t\t}

\t\t\tif (json['invoice_no']) {
\t\t\t\t\$('#invoice').html(json['invoice_no']);

\t\t\t\t\$('#button-invoice').replaceWith('<button disabled=\"disabled\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-cog\"></i></button>');
\t\t\t}
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});

\$(document).delegate('#button-reward-add', 'click', function() {
\t\$.ajax({
\t\turl: 'index.php?route=sale/order/addreward&user_token=";
        // line 549
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&order_id=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "',
\t\ttype: 'post',
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('#button-reward-add').button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-reward-add').button('reset');
\t\t},
\t\tsuccess: function(json) {
\t\t\t\$('.alert-dismissible').remove();

\t\t\tif (json['error']) {
\t\t\t\t\$('#content > .container-fluid').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + '</div>');
\t\t\t}

\t\t\tif (json['success']) {
                \$('#content > .container-fluid').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + '</div>');

\t\t\t\t\$('#button-reward-add').replaceWith('<button id=\"button-reward-remove\" data-toggle=\"tooltip\" title=\"";
        // line 568
        echo (isset($context["button_reward_remove"]) ? $context["button_reward_remove"] : null);
        echo "\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-minus-circle\"></i></button>');
\t\t\t}
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});

\$(document).delegate('#button-reward-remove', 'click', function() {
\t\$.ajax({
\t\turl: 'index.php?route=sale/order/removereward&user_token=";
        // line 579
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&order_id=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "',
\t\ttype: 'post',
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('#button-reward-remove').button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-reward-remove').button('reset');
\t\t},
\t\tsuccess: function(json) {
\t\t\t\$('.alert-dismissible').remove();

\t\t\tif (json['error']) {
\t\t\t\t\$('#content > .container-fluid').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + '</div>');
\t\t\t}

\t\t\tif (json['success']) {
                \$('#content > .container-fluid').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + '</div>');

\t\t\t\t\$('#button-reward-remove').replaceWith('<button id=\"button-reward-add\" data-toggle=\"tooltip\" title=\"";
        // line 598
        echo (isset($context["button_reward_add"]) ? $context["button_reward_add"] : null);
        echo "\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-plus-circle\"></i></button>');
\t\t\t}
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});

\$(document).delegate('#button-commission-add', 'click', function() {
\t\$.ajax({
\t\turl: 'index.php?route=sale/order/addcommission&user_token=";
        // line 609
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&order_id=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "',
\t\ttype: 'post',
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('#button-commission-add').button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-commission-add').button('reset');
\t\t},
\t\tsuccess: function(json) {
\t\t\t\$('.alert-dismissible').remove();

\t\t\tif (json['error']) {
\t\t\t\t\$('#content > .container-fluid').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + '</div>');
\t\t\t}

\t\t\tif (json['success']) {
                \$('#content > .container-fluid').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + '</div>');

\t\t\t\t\$('#button-commission-add').replaceWith('<button id=\"button-commission-remove\" data-toggle=\"tooltip\" title=\"";
        // line 628
        echo (isset($context["button_commission_remove"]) ? $context["button_commission_remove"] : null);
        echo "\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-minus-circle\"></i></button>');
\t\t\t}
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});

\$(document).delegate('#button-commission-remove', 'click', function() {
\t\$.ajax({
\t\turl: 'index.php?route=sale/order/removecommission&user_token=";
        // line 639
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&order_id=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "',
\t\ttype: 'post',
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('#button-commission-remove').button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-commission-remove').button('reset');
\t\t},
\t\tsuccess: function(json) {
\t\t\t\$('.alert-dismissible').remove();

\t\t\tif (json['error']) {
\t\t\t\t\$('#content > .container-fluid').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + '</div>');
\t\t\t}

\t\t\tif (json['success']) {
                \$('#content > .container-fluid').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + '</div>');

\t\t\t\t\$('#button-commission-remove').replaceWith('<button id=\"button-commission-add\" data-toggle=\"tooltip\" title=\"";
        // line 658
        echo (isset($context["button_commission_add"]) ? $context["button_commission_add"] : null);
        echo "\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-plus-circle\"></i></button>');
\t\t\t}
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});

var api_token = '';

\$.ajax({
  url: '";
        // line 670
        echo (isset($context["catalog"]) ? $context["catalog"] : null);
        echo "index.php?route=api/login',
  type: 'post',
  dataType: 'json',
  data: 'key=";
        // line 673
        echo (isset($context["api_key"]) ? $context["api_key"] : null);
        echo "',
  crossDomain: true,
  success: function(json) {
    \$('.alert').remove();
    if (json['error']) {
      if (json['error']['key']) {
        \$('#content > .container-fluid').prepend('<div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error']['key'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
      }
      if (json['error']['ip']) {
        \$('#content > .container-fluid').prepend('<div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error']['ip'] + ' <button type=\"button\" id=\"button-ip-add\" data-loading-text=\"";
        // line 682
        echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
        echo "\" class=\"btn btn-danger btn-xs pull-right\"><i class=\"fa fa-plus\"></i>";
        echo (isset($context["button_ip_add"]) ? $context["button_ip_add"] : null);
        echo "</button></div>');
      }
    }
    if (json['token']) {
      api_token = json['token'];
    }
  },
  error: function(xhr, ajaxOptions, thrownError) {
    alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
  }
});

\$('#history').delegate('.pagination a', 'click', function(e) {
\te.preventDefault();

\t\$('#history').load(this.href);
});

\$('#history').load('index.php?route=sale/order/history&user_token=";
        // line 700
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&order_id=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "');

\$('#button-history').on('click', function() {
\tif (typeof verifyStatusChange == 'function'){
\t  if (verifyStatusChange() == false){
\t    return false;
\t  } else{
\t    addOrderInfo();
\t  }
\t} else{
\t  addOrderInfo();
\t}


\t\$.ajax({
\t\turl: '";
        // line 715
        echo (isset($context["catalog"]) ? $context["catalog"] : null);
        echo "index.php?route=api/order/history&api_token=";
        echo (isset($context["api_token"]) ? $context["api_token"] : null);
        echo "&store_id=";
        echo (isset($context["store_id"]) ? $context["store_id"] : null);
        echo "&order_id=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "',
\t\ttype: 'post',
\t\tdataType: 'json',
\t\tdata: 'order_status_id=' + encodeURIComponent(\$('select[name=\\'order_status_id\\']').val()) + '&notify=' + (\$('input[name=\\'notify\\']').prop('checked') ? 1 : 0) + '&override=' + (\$('input[name=\\'override\\']').prop('checked') ? 1 : 0) + '&append=' + (\$('input[name=\\'append\\']').prop('checked') ? 1 : 0) + '&comment=' + encodeURIComponent(\$('textarea[name=\\'comment\\']').val()),
\t\tbeforeSend: function() {
\t\t\t\$('#button-history').button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-history').button('reset');
\t\t},
\t\tsuccess: function(json) {
\t\t\t\$('.alert-dismissible').remove();

\t\t\tif (json['error']) {
\t\t\t\t\$('#history').before('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
\t\t\t}

\t\t\tif (json['success']) {
\t\t\t\t\$('#history').load('index.php?route=sale/order/history&user_token=";
        // line 733
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&order_id=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "');

\t\t\t\t\$('#history').before('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');

\t\t\t\t\$('textarea[name=\\'comment\\']').val('');
\t\t\t}
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});

function changeStatus(){
  var status_id = \$('select[name=\"order_status_id\"]').val();
  \$('#openbay-info').remove();
  \$.ajax({
    url: 'index.php?route=marketplace/openbay/getorderinfo&user_token=";
        // line 750
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&order_id=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "&status_id='+status_id,
    dataType: 'html',
    success: function (html) {
      \$('#history').after(html);
    }
  });
}

function addOrderInfo(){
  var status_id = \$('select[name=\"order_status_id\"]').val();
  \$.ajax({
    url: 'index.php?route=marketplace/openbay/addorderinfo&user_token=";
        // line 761
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&order_id=";
        echo (isset($context["order_id"]) ? $context["order_id"] : null);
        echo "&status_id='+status_id,
    type: 'post',
    dataType: 'html',
    data: \$(\".openbay-data\").serialize()
  });
}

\$(document).ready(function() {
  changeStatus();
});

\$('select[name=\"order_status_id\"]').change(function(){
  changeStatus();
});
//--></script> 
</div>

\t\t\t\t<script>

\t\t\t\t\$('.tk_button_delete_shipping').click(function(event) {
\t\t\t\t\treturn confirm('";
        // line 781
        echo (isset($context["text_confirm"]) ? $context["text_confirm"] : null);
        echo "');
\t\t\t\t});

\t\t\t\t";
        // line 784
        if (((isset($context["shipping_tk_econt_status"]) ? $context["shipping_tk_econt_status"] : null) && (isset($context["shipping_tk_econt_store_kay"]) ? $context["shipping_tk_econt_store_kay"] : null))) {
            // line 785
            echo "\t\t\t\t\t\$(function(\$) {
\t\t\t\t\t\t\$('.open_tk_econt_delete_label').click(function(event) {
\t\t\t\t\t\t\tevent.preventDefault();
\t\t\t\t\t\t\tevent.stopPropagation();
\t\t\t\t\t\t\tvar order_id = \$(this).attr('data-order-id');
\t\t\t\t\t\t\tif (confirm('";
            // line 790
            echo (isset($context["text_confirm"]) ? $context["text_confirm"] : null);
            echo "')) {
\t\t\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\t\turl: 'index.php?route=sale/tk_econt/cancel&user_token=";
            // line 792
            echo (isset($context["user_token"]) ? $context["user_token"] : null);
            echo "&order_id=' + order_id + '&status_id=1',
\t\t\t\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\t\t\t\tsuccess: function(html) {
\t\t\t\t\t\t\t\t\t\tif(html.error) {
\t\t\t\t\t\t\t\t\t\t\talert(html.error);
\t\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\tlocation.reload();
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});
\t\t\t\t\t
\t\t\t\t\t\t\$('.send_tk_econt_data').click(function(event) {
\t\t\t\t\t\t\tevent.preventDefault();
\t\t\t\t\t\t\tevent.stopPropagation();
\t\t\t\t\t\t\tvar order_id = \$(this).attr('data-order-id');
\t\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\turl: 'index.php?route=sale/tk_econt/generate&user_token=";
            // line 810
            echo (isset($context["user_token"]) ? $context["user_token"] : null);
            echo "&order_id=' + order_id + '&status_id=1',
\t\t\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\t\t\tsuccess: function(html) {
\t\t\t\t\t\t\t\t\tif(html.error) {
\t\t\t\t\t\t\t\t\t\talert(html.error);
\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\t\$('#econt_button_on_'+order_id).css('display','none');
\t\t\t\t\t\t\t\t\t\t\$('#econt_button_send_'+order_id).css('display','inline-block');
\t\t\t\t\t\t\t\t\t\t\$('#econt_button_of_'+order_id).css('display','none');
\t\t\t\t\t\t\t\t\t\talert(html.success);
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t});
\t\t\t\t\t\t});
\t\t\t\t\t\t\t \t
\t\t\t\t\t\t\$('.open_tk_econt_create_label').click(function(event) {
\t\t\t\t\t\t\tevent.preventDefault();
\t\t\t\t\t\t\tevent.stopPropagation();
\t\t\t\t\t\t\tvar order_id = \$(this).attr('data-order-id');
\t\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\turl: 'index.php?route=sale/tk_econt/generate&user_token=";
            // line 830
            echo (isset($context["user_token"]) ? $context["user_token"] : null);
            echo "&order_id=' + order_id + '&status_id=1',
\t\t\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\t\t\tsuccess: function(html) {
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\$createLabelWindow.find('iframe').attr('src', '";
            // line 835
            echo (isset($context["delivery_econt_url"]) ? $context["delivery_econt_url"] : null);
            echo "/create_label.php?' + \$.param( {
\t\t\t\t\t\t\t\t'order_number': order_id,
\t\t\t\t\t\t\t\t'token': '";
            // line 837
            echo (isset($context["shipping_tk_econt_store_kay"]) ? $context["shipping_tk_econt_store_kay"] : null);
            echo "'
\t\t\t\t\t\t\t}));
\t\t\t\t\t\t\t\$createLabelWindow.modal('show');
\t\t\t\t\t\t});
\t\t\t\t\t\t\t 
\t\t\t\t\t\tvar empty__ = function(thingy) {
\t\t\t\t\t\t\treturn thingy == 0 || !thingy || (typeof(thingy) === 'object' && \$.isEmptyObject(thingy));
\t\t\t\t\t\t}
\t\t\t\t\t\tvar \$createLabelWindow = \$('#tk-econt-delivery-create-label-modal').modal( {
\t\t\t\t\t\t\t'show': false,
\t\t\t\t\t\t\t'backdrop': 'static'
\t\t\t\t\t\t});
\t\t\t\t\t\t\t 
\t\t\t\t\t\t\$(window).on('message', function(event) {
\t\t\t\t\t\t\tif (event['originalEvent']['origin'] != '";
            // line 851
            echo (isset($context["delivery_econt_url"]) ? $context["delivery_econt_url"] : null);
            echo "') return;
\t\t\t\t\t\t\tvar messageData = event['originalEvent']['data'];
\t\t\t\t\t\t\tif (!messageData) return;
\t\t\t\t\t\t\tswitch (messageData['event']) {
\t\t\t\t\t\t\t\tcase 'cancel':
\t\t\t\t\t\t\t\t\$createLabelWindow.modal('hide');
\t\t\t\t\t\t\t\tbreak;
\t\t\t\t\t\t\t\tcase 'confirm':
\t\t\t\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\t\t\turl: 'index.php?route=sale/tk_econt/trace&user_token=";
            // line 860
            echo (isset($context["user_token"]) ? $context["user_token"] : null);
            echo "&order_id=' + messageData['orderData']['num'],
\t\t\t\t\t\t\t\t\t\ttype: 'post',
\t\t\t\t\t\t\t\t\t\tdata: messageData,
\t\t\t\t\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\t\t\t\t\tsuccess: function(html) {
\t\t\t\t\t\t\t\t\t\t\tif(!html.error) {
\t\t\t\t\t\t\t\t\t\t\t\tif (messageData['printPdf'] === true && !empty__(messageData['shipmentStatus']['pdfURL'])) window.open(messageData['shipmentStatus']['pdfURL'], '_blank');
\t\t\t\t\t\t\t\t\t\t\t\twindow.location.href = 'index.php?' + \$.param( {
\t\t\t\t\t\t\t\t\t\t\t\t\t'route': 'sale/order/info',
\t\t\t\t\t\t\t\t\t\t\t\t\t'user_token': '";
            // line 869
            echo (isset($context["user_token"]) ? $context["user_token"] : null);
            echo "',
\t\t\t\t\t\t\t\t\t\t\t\t\t'order_id': messageData['orderData']['num']
\t\t\t\t\t\t\t\t\t\t\t\t})";
            // line 871
            if (array_key_exists("url", $context)) {
                echo "+'";
                echo (isset($context["url"]) ? $context["url"] : null);
                echo "'";
            }
            echo ";
\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\tbreak;
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});
\t\t\t\t\t});
\t\t\t\t";
        }
        // line 880
        echo "\t\t\t\t</script>

\t\t\t\t<div id=\"tk-econt-delivery-create-label-modal\" class=\"modal fade\" role=\"dialog\">
\t\t\t\t\t<div class=\"modal-dialog\">
\t\t\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
\t\t\t\t\t\t\t\t<h4 class=\"modal-title\">Достави с Еконт</h4>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t\t\t<iframe src=\"about:blank\"></iframe>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<style>
\t\t\t\t\t#tk-econt-delivery-create-label-modal .modal-dialog { 
\t\t\t\t\t\twidth: 96%;
\t\t\t\t\t} 
\t\t\t\t\t#tk-econt-delivery-create-label-modal .modal-body { 
\t\t\t\t\t\tpadding: 0;
\t\t\t\t\t} 
\t\t\t\t\t#tk-econt-delivery-create-label-modal iframe { 
\t\t\t\t\t\tborder: 0;
\t\t\t\t\t\twidth: 100%;
\t\t\t\t\t\theight: 87vh;
\t\t\t\t\t}
\t\t\t\t\t@media screen and (min-width: 800px) { 
\t\t\t\t\t\t#tk-econt-delivery-create-label-modal .modal-dialog { 
\t\t\t\t\t\t\twidth: 700px;
\t\t\t\t\t\t} 
\t\t\t\t\t} 
\t\t\t\t</style>
\t\t\t\t
";
        // line 915
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "sale/order_info.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1873 => 915,  1836 => 880,  1820 => 871,  1815 => 869,  1803 => 860,  1791 => 851,  1774 => 837,  1769 => 835,  1761 => 830,  1738 => 810,  1717 => 792,  1712 => 790,  1705 => 785,  1703 => 784,  1697 => 781,  1672 => 761,  1656 => 750,  1634 => 733,  1607 => 715,  1587 => 700,  1564 => 682,  1552 => 673,  1546 => 670,  1531 => 658,  1507 => 639,  1493 => 628,  1469 => 609,  1455 => 598,  1431 => 579,  1417 => 568,  1393 => 549,  1359 => 520,  1350 => 513,  1339 => 512,  1335 => 511,  1325 => 504,  1321 => 503,  1315 => 500,  1311 => 499,  1308 => 498,  1302 => 495,  1298 => 494,  1295 => 493,  1293 => 492,  1288 => 490,  1284 => 489,  1276 => 484,  1270 => 480,  1263 => 475,  1254 => 472,  1250 => 471,  1247 => 470,  1243 => 469,  1235 => 464,  1229 => 460,  1226 => 459,  1219 => 454,  1210 => 451,  1206 => 450,  1203 => 449,  1199 => 448,  1191 => 443,  1185 => 439,  1182 => 438,  1175 => 433,  1166 => 430,  1162 => 429,  1159 => 428,  1155 => 427,  1147 => 422,  1141 => 418,  1139 => 417,  1131 => 414,  1120 => 406,  1109 => 398,  1096 => 390,  1088 => 384,  1082 => 383,  1073 => 379,  1069 => 377,  1060 => 373,  1056 => 371,  1053 => 370,  1049 => 369,  1041 => 364,  1035 => 361,  1027 => 355,  1016 => 353,  1012 => 352,  1008 => 351,  1004 => 350,  997 => 346,  991 => 342,  983 => 338,  975 => 333,  970 => 330,  968 => 329,  963 => 326,  954 => 323,  950 => 322,  947 => 321,  942 => 320,  933 => 317,  929 => 316,  921 => 313,  918 => 312,  913 => 311,  904 => 308,  900 => 307,  896 => 306,  892 => 305,  884 => 304,  875 => 303,  868 => 302,  866 => 301,  856 => 300,  853 => 299,  849 => 298,  841 => 293,  837 => 292,  833 => 291,  829 => 290,  825 => 289,  817 => 283,  812 => 281,  806 => 277,  797 => 274,  793 => 273,  790 => 272,  786 => 271,  779 => 267,  776 => 266,  770 => 262,  761 => 259,  757 => 258,  754 => 257,  750 => 256,  743 => 252,  736 => 249,  734 => 248,  730 => 247,  724 => 243,  718 => 241,  713 => 239,  709 => 237,  707 => 236,  703 => 235,  692 => 227,  681 => 218,  677 => 217,  674 => 216,  666 => 214,  658 => 212,  655 => 211,  653 => 210,  649 => 209,  646 => 208,  636 => 207,  634 => 206,  630 => 205,  625 => 202,  621 => 201,  618 => 200,  610 => 198,  602 => 196,  599 => 195,  597 => 194,  593 => 193,  589 => 192,  584 => 189,  580 => 188,  572 => 186,  570 => 185,  566 => 184,  562 => 183,  554 => 178,  543 => 170,  539 => 169,  531 => 166,  527 => 165,  521 => 162,  517 => 161,  512 => 158,  504 => 157,  494 => 156,  490 => 155,  483 => 151,  473 => 143,  467 => 140,  463 => 139,  460 => 138,  458 => 137,  453 => 135,  449 => 134,  443 => 131,  439 => 130,  431 => 127,  427 => 126,  419 => 121,  409 => 113,  398 => 111,  394 => 110,  389 => 108,  386 => 107,  382 => 105,  379 => 104,  371 => 102,  368 => 101,  360 => 99,  352 => 96,  346 => 95,  343 => 94,  340 => 93,  337 => 92,  334 => 91,  326 => 89,  323 => 88,  315 => 86,  307 => 83,  301 => 82,  298 => 81,  295 => 80,  292 => 79,  289 => 78,  281 => 76,  278 => 75,  275 => 74,  267 => 72,  259 => 70,  256 => 69,  248 => 66,  242 => 65,  239 => 64,  236 => 63,  233 => 62,  230 => 61,  222 => 59,  214 => 56,  207 => 54,  204 => 53,  201 => 52,  198 => 51,  190 => 49,  182 => 46,  175 => 44,  169 => 42,  166 => 41,  163 => 40,  153 => 37,  147 => 36,  141 => 35,  138 => 34,  128 => 31,  125 => 30,  123 => 29,  114 => 27,  108 => 26,  105 => 25,  102 => 24,  92 => 21,  86 => 20,  83 => 19,  73 => 16,  67 => 15,  61 => 13,  58 => 12,  56 => 11,  52 => 10,  49 => 9,  47 => 8,  27 => 5,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/*   <div class="page-header">*/
/*     <div class="container-fluid">*/
/*       <div class="pull-right"><a href="{{ invoice }}" target="_blank" data-toggle="tooltip" title="{{ button_invoice_print }}" class="btn btn-info"><i class="fa fa-print"></i></a> <a href="{{ shipping }}" target="_blank" data-toggle="tooltip" title="{{ button_shipping_print }}" class="btn btn-info"><i class="fa fa-truck"></i></a> <a href="{{ edit }}" data-toggle="tooltip" title="{{ button_edit }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a> <a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-default"><i class="fa fa-reply"></i></a></div>*/
/* */
/* */
/* 				{% if ((shipping_tk_econt_status and shipping_tk_econt_store_kay) or shipping_tk_speedy_status or shipping_tk_transpress_status or shipping_tk_boxnow_status or shipping_tk_next_status or shipping_tk_sameday_status) %}*/
/* 					<div class="pull-right" style="margin-right:10px;">*/
/* 						{% if (econt_edit is defined and econt_edit != '0') %} */
/* 							{% if (econt_status_id == 2) %}*/
/* 								{% if (econt_shipment != '0') %}*/
/* 									<a href="https://www.econt.com/services/track-shipment/{{ econt_shipment }}" class="btn btn-info" target="_blank"><i class="fa fa-eye"></i></a>*/
/* 									<div class="btn-group"  style="min-width: 150px;">*/
/* 										<a href="{{ econt_pdf }}" class="btn btn-success" target="_blank" style="padding: 8px 8px;min-width: 110px;"><small>{{ econt_shipment }}</small></a>*/
/* 										<button id="econt_button_delete_{{ order_id }}" class="btn btn-danger open_tk_econt_delete_label" data-order-id="{{ order_id }}" data-toggle="tooltip" title="{{ button_delete }}"><i class="fa fa-trash-o"></i></button>*/
/* 									</div>*/
/* 								{% else %}*/
/* 									<div class="btn-group"  style="min-width: 150px;">*/
/* 										<button id="econt_button_send_{{ order_id }}" class="btn btn-primary open_tk_econt_create_label" data-order-id="{{ order_id }}" style="padding: 8px 8px;min-width: 110px;"><small>Товарителница</small></button>*/
/* 										<a style="display: inline-block" id="econt_button_edit_{{ order_id }}" href="{{ econt_edit }}" data-toggle="tooltip" title="{{ button_edit }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>*/
/* 									</div>*/
/* 								{% endif %}*/
/* 							{% elseif (econt_status_id == 1) %}*/
/* 								<div class="btn-group"  style="min-width: 150px;">*/
/* 									<button id="econt_button_send_{{ order_id }}" class="btn btn-primary open_tk_econt_create_label" data-order-id="{{ order_id }}" style="padding: 8px 8px;min-width: 110px;"><small>Товарителница</small></button>*/
/* 									<a style="display: inline-block" id="econt_button_edit_{{ order_id }}" href="{{ econt_edit }}" data-toggle="tooltip" title="{{ button_edit }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>*/
/* 								</div>*/
/* 							{% elseif (econt_status_id == 'admin_order') %}*/
/* 								<div class="btn-group"  style="min-width: 150px;">*/
/* 									<a id="econt_button_edit_{{ order_id }}" href="{{ econt_edit }}" data-toggle="tooltip" title="{{ button_edit }}" class="btn btn-primary">Редактирай</a>*/
/* 								</div>*/
/* 							{% else %}*/
/* 								<div class="btn-group"  style="min-width: 150px;">*/
/* 									<button id="econt_button_on_{{ order_id }}" class="btn btn-info send_tk_econt_data" data-order-id="{{ order_id }}"  style="padding: 8px 8px;min-width: 110px;"><small>Изпрати</small></button>*/
/* 									<button id="econt_button_send_{{ order_id }}" class="btn btn-primary open_tk_econt_create_label" style="display: none" data-order-id="{{ order_id }}" style="padding: 8px 8px;min-width: 110px;"><small>Товарителница</small></button>*/
/* 									<a style="display: inline-block" id="econt_button_edit_{{ order_id }}" href="{{ econt_edit }}" data-toggle="tooltip" title="{{ button_edit }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a> */
/* 								</div>*/
/* 							{% endif %}*/
/* 						{% elseif (speedy_edit is defined and speedy_edit != '0') %}*/
/* 							{% if (speedy_shipment != '0') %}*/
/* 								<a href="https://www.speedy.bg/bg/track-shipment?shipmentNumber={{ speedy_shipment }}" class="btn btn-info" target="_blank"><i class="fa fa-eye"></i></a>*/
/* 								<div class="btn-group"  style="min-width: 150px;">*/
/* 									<a href="{{ speedy_pdf }}" class="btn btn-success" target="_blank"  style="padding: 8px 8px;min-width: 110px;"><small>{{ speedy_shipment }}</small></a>*/
/* 										*/
/* 									<a href="{{ speedy_cancel }}"  id="speedy_button_close_{{ order_id }}" data-toggle="tooltip" title="Анулирай" class="tk_button_delete_shipping btn btn-danger" data-original-title="Анулирай"><i class="fa fa-trash-o"></i></a>*/
/* 								</div>*/
/* 							{% else %}*/
/* 								<a href="{{ speedy_edit }}" id="speedy_button_send_{{ order_id }}" class="btn btn-primary open_tk_speedy_create_label"  style="min-width: 150px;"><small>Товарителница</small></a>*/
/* 							{% endif %}*/
/* 						{% elseif (transpress_edit is defined and transpress_edit != '0') %}*/
/* 							{% if (transpress_shipment != '0') %}*/
/* 								<div class="btn-group"  style="min-width: 150px;">*/
/* 									<a href="{{ transpress_pdf }}" class="btn btn-success" target="_blank">{{ transpress_shipment }}</a>*/
/* 																*/
/* 									<a href="{{ transpress_cancel }}"  id="transpress_button_close_{{ order_id }}" data-toggle="tooltip" title="Анулирай" class="tk_button_delete_shipping btn btn-danger" data-original-title="Анулирай"><i class="fa fa-trash-o"></i></a>*/
/* 								</div>*/
/* 							{% else %}*/
/* 								<a href="{{ transpress_edit }}" id="transpress_button_send_{{ order_id }}" class="btn btn-primary open_tk_transpress_create_label"  style="min-width: 150px;"><small>Товарителница</small></a>*/
/* 							{% endif %}*/
/* 						{% elseif (boxnow_status_id is defined and boxnow_status_id != '0') %}*/
/* 							{% if (boxnow_shipment != '0') %}*/
/* 								{% if (boxnow_cancel != '0') %}*/
/* 									<div class="btn-group"  style="min-width: 150px;">*/
/* 										<a href="{{ boxnow_pdf }}" class="btn btn-success" target="_blank" style="padding: 8px 8px;min-width: 110px;"><small>{{ boxnow_shipment }}</small></a>*/
/* 										<a href="{{ boxnow_cancel }}"  id="boxnow_button_close_{{ order_id }}" data-toggle="tooltip" title="Анулирай" class="tk_button_delete_shipping btn btn-danger" data-original-title="Анулирай"><i class="fa fa-trash-o"></i></a>*/
/* 									</div>*/
/* 								{% else %}*/
/* 								    {% if (boxnow_status_id == 'Откзана от подател') %}*/
/*                                         <a href="{{ boxnow_edit }}" id="boxnow_button_send_{{ order_id }}" class="btn btn-primary open_tk_boxnow_create_label"   style="min-width: 150px;"><small>Товарителница</small></a>*/
/*                                     {% else %}*/
/* 										<a href="{{ boxnow_pdf }}" class="btn btn-success" target="_blank" style="min-width: 150px;"><small>{{ boxnow_shipment }}</small></a>*/
/* 									{% endif %}*/
/* 								{% endif %}*/
/* 							{% else %}*/
/* 								<a href="{{ boxnow_edit }}" id="boxnow_button_send_{{ order_id }}" class="btn btn-primary open_tk_boxnow_create_label"   style="min-width: 150px;"><small>Товарителница</small></a>*/
/* 							{% endif %}*/
/* 						{% elseif (next_status_id is defined and next_status_id != '0') %}*/
/* 							{% if (next_shipment != '0') %}*/
/* 								{% if (next_cancel != '0') %}*/
/* 									<div class="btn-group"  style="min-width: 150px;">*/
/* 										<a href="{{ next_pdf }}" class="btn btn-success" target="_blank" style="padding: 8px 8px;min-width: 110px;"><small>{{ next_shipment }}</small></a>*/
/* 										<a href="{{ next_cancel }}"  id="next_button_close_{{ order_id }}" data-toggle="tooltip" title="Анулирай" class="tk_button_delete_shipping btn btn-danger" data-original-title="Анулирай"><i class="fa fa-trash-o"></i></a>*/
/* 									</div>*/
/* 								{% else %}*/
/* 									<a href="{{ next_pdf }}" class="btn btn-success" target="_blank" style="min-width: 150px;"><small>{{ next_shipment }}</small></a>*/
/* 								{% endif %}*/
/* 							{% else %}*/
/* 								<a href="{{ next_edit }}" id="next_button_send_{{ order_id }}" class="btn btn-primary open_tk_next_create_label"   style="min-width: 150px;"><small>Товарителница</small></a>*/
/* 							{% endif %}*/
/*                         {% elseif (sameday_status_id is defined and sameday_status_id != '0') %}*/
/* 							{% if (sameday_shipment != '0') %}*/
/* 								{% if (sameday_cancel != '0') %}*/
/* 									<div class="btn-group"  style="min-width: 150px;">*/
/* 										<a href="{{ sameday_pdf }}" class="btn btn-success" target="_blank" style="padding: 8px 8px;min-width: 110px;"><small>{{ sameday_shipment }}</small></a>*/
/* 										<a href="{{ sameday_cancel }}"  id="sameday_button_close_{{ order_id }}" data-toggle="tooltip" title="Анулирай" class="tk_button_delete_shipping btn btn-danger" data-original-title="Анулирай"><i class="fa fa-trash-o"></i></a>*/
/* 									</div>*/
/* 								{% else %}*/
/* 									<a href="{{ sameday_pdf }}" class="btn btn-success" target="_blank" style="min-width: 150px;"><small>{{ sameday_shipment }}</small></a>*/
/* 								{% endif %}*/
/* 							{% else %}*/
/* 								<a href="{{ sameday_edit }}" id="sameday_button_send_{{ order_id }}" class="btn btn-primary open_tk_sameday_create_label"   style="min-width: 150px;"><small>Товарителница</small></a>*/
/* 							{% endif %}*/
/* 						{% endif %}*/
/* 					</div>*/
/* 				{% endif %}*/
/* 				*/
/*       <h1>{{ heading_title }}</h1>*/
/*       <ul class="breadcrumb">*/
/*         {% for breadcrumb in breadcrumbs %}*/
/*         <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*   </div>*/
/*   <div class="container-fluid">*/
/*     <div class="row">*/
/*       <div class="col-md-4">*/
/*         <div class="panel panel-default">*/
/*           <div class="panel-heading">*/
/*             <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> {{ text_order_detail }}</h3>*/
/*           </div>*/
/*           <table class="table">*/
/*             <tbody>*/
/*               <tr>*/
/*                 <td style="width: 1%;"><button data-toggle="tooltip" title="{{ text_store }}" class="btn btn-info btn-xs"><i class="fa fa-shopping-cart fa-fw"></i></button></td>*/
/*                 <td><a href="{{ store_url }}" target="_blank">{{ store_name }}</a></td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td><button data-toggle="tooltip" title="{{ text_date_added }}" class="btn btn-info btn-xs"><i class="fa fa-calendar fa-fw"></i></button></td>*/
/*                 <td>{{ date_added }}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td><button data-toggle="tooltip" title="{{ text_payment_method }}" class="btn btn-info btn-xs"><i class="fa fa-credit-card fa-fw"></i></button></td>*/
/*                 <td>{{ payment_method }}</td>*/
/*               </tr>*/
/*             {% if shipping_method %}*/
/*             <tr>*/
/*               <td><button data-toggle="tooltip" title="{{ text_shipping_method }}" class="btn btn-info btn-xs"><i class="fa fa-truck fa-fw"></i></button></td>*/
/*               <td>{{ shipping_method }}</td>*/
/*             </tr>*/
/*             {% endif %}*/
/*               </tbody>*/
/*             */
/*           </table>*/
/*         </div>*/
/*       </div>*/
/*       <div class="col-md-4">*/
/*         <div class="panel panel-default">*/
/*           <div class="panel-heading">*/
/*             <h3 class="panel-title"><i class="fa fa-user"></i> {{ text_customer_detail }}</h3>*/
/*           </div>*/
/*           <table class="table">*/
/*             <tr>*/
/*               <td style="width: 1%;"><button data-toggle="tooltip" title="{{ text_customer }}" class="btn btn-info btn-xs"><i class="fa fa-user fa-fw"></i></button></td>*/
/*               <td>{% if customer %} <a href="{{ customer }}" target="_blank">{{ firstname }} {{ lastname }}</a> {% else %}*/
/*                 {{ firstname }} {{ lastname }}*/
/*                 {% endif %}</td>*/
/*             </tr>*/
/*             <tr>*/
/*               <td><button data-toggle="tooltip" title="{{ text_customer_group }}" class="btn btn-info btn-xs"><i class="fa fa-group fa-fw"></i></button></td>*/
/*               <td>{{ customer_group }}</td>*/
/*             </tr>*/
/*             <tr>*/
/*               <td><button data-toggle="tooltip" title="{{ text_email }}" class="btn btn-info btn-xs"><i class="fa fa-envelope-o fa-fw"></i></button></td>*/
/*               <td><a href="mailto:{{ email }}">{{ email }}</a></td>*/
/*             </tr>*/
/*             <tr>*/
/*               <td><button data-toggle="tooltip" title="{{ text_telephone }}" class="btn btn-info btn-xs"><i class="fa fa-phone fa-fw"></i></button></td>*/
/*               <td>{{ telephone }}</td>*/
/*             </tr>*/
/*           </table>*/
/*         </div>*/
/*       </div>*/
/*       <div class="col-md-4">*/
/*         <div class="panel panel-default">*/
/*           <div class="panel-heading">*/
/*             <h3 class="panel-title"><i class="fa fa-cog"></i> {{ text_option }}</h3>*/
/*           </div>*/
/*           <table class="table">*/
/*             <tbody>*/
/*               <tr>*/
/*                 <td>{{ text_invoice }}</td>*/
/*                 <td id="invoice" class="text-right">{{ invoice_no }}</td>*/
/*                 <td style="width: 1%;" class="text-center">{% if not invoice_no %}*/
/*                   <button id="button-invoice" data-loading-text="{{ text_loading }}" data-toggle="tooltip" title="{{ button_generate }}" class="btn btn-success btn-xs"><i class="fa fa-cog"></i></button>*/
/*                   {% else %}*/
/*                   <button disabled="disabled" class="btn btn-success btn-xs"><i class="fa fa-refresh"></i></button>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td>{{ text_reward }}</td>*/
/*                 <td class="text-right">{{ reward }}</td>*/
/*                 <td class="text-center">{% if customer and reward %}*/
/*                   {% if not reward_total %}*/
/*                   <button id="button-reward-add" data-loading-text="{{ text_loading }}" data-toggle="tooltip" title="{{ button_reward_add }}" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i></button>*/
/*                   {% else %}*/
/*                   <button id="button-reward-remove" data-loading-text="{{ text_loading }}" data-toggle="tooltip" title="{{ button_reward_remove }}" class="btn btn-danger btn-xs"><i class="fa fa-minus-circle"></i></button>*/
/*                   {% endif %}*/
/*                   {% else %}*/
/*                   <button disabled="disabled" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i></button>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*               <tr>*/
/*                 <td>{{ text_affiliate }}*/
/*                   {% if affiliate %}*/
/*                   (<a href="{{ affiliate }}">{{ affiliate_firstname }} {{ affiliate_lastname }}</a>)*/
/*                   {% endif %}</td>*/
/*                 <td class="text-right">{{ commission }}</td>*/
/*                 <td class="text-center">{% if affiliate %}*/
/*                   {% if not commission_total %}*/
/*                   <button id="button-commission-add" data-loading-text="{{ text_loading }}" data-toggle="tooltip" title="{{ button_commission_add }}" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i></button>*/
/*                   {% else %}*/
/*                   <button id="button-commission-remove" data-loading-text="{{ text_loading }}" data-toggle="tooltip" title="{{ button_commission_remove }}" class="btn btn-danger btn-xs"><i class="fa fa-minus-circle"></i></button>*/
/*                   {% endif %}*/
/*                   {% else %}*/
/*                   <button disabled="disabled" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i></button>*/
/*                   {% endif %}</td>*/
/*               </tr>*/
/*             </tbody>*/
/*           </table>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*     <div class="panel panel-default">*/
/*       <div class="panel-heading">*/
/*         <h3 class="panel-title"><i class="fa fa-info-circle"></i> {{ text_order }}</h3>*/
/*       </div>*/
/*       <div class="panel-body">*/
/*         <table class="table table-bordered">*/
/*           <thead>*/
/*             <tr>*/
/*               */
/* 				<td style="width: 33%;" class="text-left">*/
/* 	 		{{ text_payment_address }}</td>*/
/*               {% if shipping_method %}*/
/*               */
/* 				<td style="width: 33%;" class="text-left">*/
/* 	 		{{ text_shipping_address }}</td>*/
/* */
/* 				<td style="width: 34%;" class="text-left">{{ text_account_custom_field }}</td>*/
/* 	 		*/
/*               {% endif %} </tr>*/
/*           </thead>*/
/*           <tbody>*/
/*             <tr>*/
/*               <td class="text-left">{{ payment_address }}</td>*/
/*               {% if shipping_method %}*/
/*               <td class="text-left">{{ shipping_address }}</td>*/
/* */
/* 			<td class="text-left">*/
/* 				{% if (payment_custom_fields[0]['value'] is defined and payment_custom_fields[0]['value']) %} */
/* 	              <div class="table-responsive">*/
/* 	                <table class="table table-bordered">*/
/* 	                  <tbody>*/
/* 	                    {% for custom_field in payment_custom_fields %}*/
/* 	                      <tr>*/
/* 	                        <td>{{ custom_field.name }}</td>*/
/* 	                        <td>{{ custom_field.value }}</td>*/
/* 	                      </tr>*/
/* 	                    {% endfor %}*/
/* 	                  </tbody>*/
/* 	                </table>*/
/* 	              </div>*/
/*             	{% endif %}*/
/*             	*/
/*             	{% if (account_custom_fields[0]['value'] is defined and account_custom_fields[0]['value']) %} */
/* 	              <div class="table-responsive">*/
/* 	                <table class="table table-bordered">*/
/* 	                  <tbody>*/
/* 	                    {% for custom_field in account_custom_fields %}*/
/* 	                      <tr>*/
/* 	                        <td>{{ custom_field.name }}</td>*/
/* 	                        <td>{{ custom_field.value }}</td>*/
/* 	                      </tr>*/
/* 	                    {% endfor %}*/
/* 	                  </tbody>*/
/* 	                </table>*/
/* 	              </div>*/
/*             	{% endif %}*/
/*             </td>*/
/* 	 		*/
/*               {% endif %} </tr>*/
/*           </tbody>*/
/*         </table>*/
/*         <table class="table table-bordered">*/
/*           <thead>*/
/*             <tr>*/
/*               <td class="text-left">{{ column_product }}</td>*/
/*               <td class="text-left">{{ column_model }}</td>*/
/*               <td class="text-right">{{ column_quantity }}</td>*/
/*               <td class="text-right">{{ column_price }}</td>*/
/*               <td class="text-right">{{ column_total }}</td>*/
/*             </tr>*/
/*           </thead>*/
/*           <tbody>*/
/*           */
/*           {% for product in products %}*/
/*           <tr>*/
/*             <td class="text-left"><a href="{{ product.href }}">{{ product.name }}</a> {% for option in product.option %} <br />*/
/*               {% if option.type != 'file' %}*/
/*               &nbsp;<small> - {{ option.name }}: {{ option.value }}</small> {% else %}*/
/*               &nbsp;<small> - {{ option.name }}: <a href="{{ option.href }}">{{ option.value }}</a></small> {% endif %}*/
/*               {% endfor %}</td>*/
/*             <td class="text-left">{{ product.model }}</td>*/
/*             <td class="text-right">{{ product.quantity }}</td>*/
/*             <td class="text-right">{{ product.price }}</td>*/
/*             <td class="text-right">{{ product.total }}</td>*/
/*           </tr>*/
/*           {% endfor %}*/
/*           {% for voucher in vouchers %}*/
/*           <tr>*/
/*             <td class="text-left"><a href="{{ voucher.href }}">{{ voucher.description }}</a></td>*/
/*             <td class="text-left"></td>*/
/*             <td class="text-right">1</td>*/
/*             <td class="text-right">{{ voucher.amount }}</td>*/
/*             <td class="text-right">{{ voucher.amount }}</td>*/
/*           </tr>*/
/*           {% endfor %}*/
/*           {% for total in totals %}*/
/*           <tr>*/
/*             <td colspan="4" class="text-right">{{ total.title }}</td>*/
/*             <td class="text-right">{{ total.text }}</td>*/
/*           </tr>*/
/*           {% endfor %}*/
/*             </tbody>*/
/*           */
/*         </table>*/
/*         {% if comment %}*/
/*         <table class="table table-bordered">*/
/*           <thead>*/
/*             <tr>*/
/*               <td>{{ text_comment }}</td>*/
/*             </tr>*/
/*           </thead>*/
/*           <tbody>*/
/*             <tr>*/
/*               <td>{{ comment }}</td>*/
/*             </tr>*/
/*           </tbody>*/
/*         </table>*/
/*         {% endif %} </div>*/
/*     </div>*/
/*     <div class="panel panel-default">*/
/*       <div class="panel-heading">*/
/*         <h3 class="panel-title"><i class="fa fa-comment-o"></i> {{ text_history }}</h3>*/
/*       </div>*/
/*       <div class="panel-body">*/
/*         <ul class="nav nav-tabs">*/
/*           <li class="active"><a href="#tab-history" data-toggle="tab">{{ tab_history }}</a></li>*/
/*           <li><a href="#tab-additional" data-toggle="tab">{{ tab_additional }}</a></li>*/
/*           {% for tab in tabs %}*/
/*           <li><a href="#tab-{{ tab.code }}" data-toggle="tab">{{ tab.title }}</a></li>*/
/*           {% endfor %}*/
/*         </ul>*/
/*         <div class="tab-content">*/
/*           <div class="tab-pane active" id="tab-history">*/
/*             <div id="history"></div>*/
/*             <br />*/
/*             <fieldset>*/
/*               <legend>{{ text_history_add }}</legend>*/
/*               <form class="form-horizontal">*/
/*                 <div class="form-group">*/
/*                   <label class="col-sm-2 control-label" for="input-order-status">{{ entry_order_status }}</label>*/
/*                   <div class="col-sm-10">*/
/*                     <select name="order_status_id" id="input-order-status" class="form-control">*/
/*                       */
/*                       */
/*                       {% for order_statuses in order_statuses %}*/
/*                       {% if order_statuses.order_status_id == order_status_id %}*/
/*                       */
/*                       */
/*                       <option value="{{ order_statuses.order_status_id }}" selected="selected">{{ order_statuses.name }}</option>*/
/*                       */
/*                       */
/*                       {% else %}*/
/*                       */
/*                       */
/*                       <option value="{{ order_statuses.order_status_id }}">{{ order_statuses.name }}</option>*/
/*                       */
/*                       */
/*                       {% endif %}*/
/*                       {% endfor %}*/
/*                     */
/*                     */
/*                     </select>*/
/*                   </div>*/
/*                 </div>*/
/*                 <div class="form-group">*/
/*                   <label class="col-sm-2 control-label" for="input-override"><span data-toggle="tooltip" title="{{ help_override }}">{{ entry_override }}</span></label>*/
/*                   <div class="col-sm-10">*/
/*                     <div class="checkbox">*/
/*                       <input type="checkbox" name="override" value="1" id="input-override" />*/
/*                     </div>*/
/*                   </div>*/
/*                 </div>*/
/*                 <div class="form-group">*/
/*                   <label class="col-sm-2 control-label" for="input-notify">{{ entry_notify }}</label>*/
/*                   <div class="col-sm-10">*/
/*                     <div class="checkbox">*/
/*                       <input type="checkbox" name="notify" value="1" id="input-notify" />*/
/*                     </div>*/
/*                   </div>*/
/*                 </div>*/
/*                 <div class="form-group">*/
/*                   <label class="col-sm-2 control-label" for="input-comment">{{ entry_comment }}</label>*/
/*                   <div class="col-sm-10">*/
/*                     <textarea name="comment" rows="8" id="input-comment" class="form-control"></textarea>*/
/*                   </div>*/
/*                 </div>*/
/*               </form>*/
/*             </fieldset>*/
/*             <div class="text-right">*/
/*               <button id="button-history" data-loading-text="{{ text_loading }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> {{ button_history_add }}</button>*/
/*             </div>*/
/*           </div>*/
/*           <div class="tab-pane" id="tab-additional"> {% if account_custom_fields %}*/
/*             <div class="table-responsive">*/
/*               <table class="table table-bordered">*/
/*                 <thead>*/
/*                   <tr>*/
/*                     <td colspan="2">{{ text_account_custom_field }}</td>*/
/*                   </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                 */
/*                 {% for custom_field in account_custom_fields %}*/
/*                 <tr>*/
/*                   <td>{{ custom_field.name }}</td>*/
/*                   <td>{{ custom_field.value }}</td>*/
/*                 </tr>*/
/*                 {% endfor %}*/
/*                   </tbody>*/
/*                 */
/*               </table>*/
/*             </div>*/
/*             {% endif %}*/
/*             {% if payment_custom_fields %}*/
/*             <div class="table-responsive">*/
/*               <table class="table table-bordered">*/
/*                 <thead>*/
/*                   <tr>*/
/*                     <td colspan="2">{{ text_payment_custom_field }}</td>*/
/*                   </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                 */
/*                 {% for custom_field in payment_custom_fields %}*/
/*                 <tr>*/
/*                   <td>{{ custom_field.name }}</td>*/
/*                   <td>{{ custom_field.value }}</td>*/
/*                 </tr>*/
/*                 {% endfor %}*/
/*                   </tbody>*/
/*                 */
/*               </table>*/
/*             </div>*/
/*             {% endif %}*/
/*             {% if shipping_method and shipping_custom_fields %}*/
/*             <div class="table-responsive">*/
/*               <table class="table table-bordered">*/
/*                 <thead>*/
/*                   <tr>*/
/*                     <td colspan="2">{{ text_shipping_custom_field }}</td>*/
/*                   </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                 */
/*                 {% for custom_field in shipping_custom_fields %}*/
/*                 <tr>*/
/*                   <td>{{ custom_field.name }}</td>*/
/*                   <td>{{ custom_field.value }}</td>*/
/*                 </tr>*/
/*                 {% endfor %}*/
/*                   </tbody>*/
/*                 */
/*               </table>*/
/*             </div>*/
/*             {% endif %}*/
/*             <div class="table-responsive">*/
/*               <table class="table table-bordered">*/
/*                 <thead>*/
/*                   <tr>*/
/*                     <td colspan="2">{{ text_browser }}</td>*/
/*                   </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                   <tr>*/
/*                     <td>{{ text_ip }}</td>*/
/*                     <td>{{ ip }}</td>*/
/*                   </tr>*/
/*                 {% if forwarded_ip %}*/
/*                 <tr>*/
/*                   <td>{{ text_forwarded_ip }}</td>*/
/*                   <td>{{ forwarded_ip }}</td>*/
/*                 </tr>*/
/*                 {% endif %}*/
/*                 <tr>*/
/*                   <td>{{ text_user_agent }}</td>*/
/*                   <td>{{ user_agent }}</td>*/
/*                 </tr>*/
/*                 <tr>*/
/*                   <td>{{ text_accept_language }}</td>*/
/*                   <td>{{ accept_language }}</td>*/
/*                 </tr>*/
/*                   </tbody>*/
/*                 */
/*               </table>*/
/*             </div>*/
/*           </div>*/
/*           {% for tab in tabs %}*/
/*           <div class="tab-pane" id="tab-{{ tab.code }}">{{ tab.content }}</div>*/
/*           {% endfor %} </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   <script type="text/javascript"><!--*/
/* $(document).delegate('#button-invoice', 'click', function() {*/
/* 	$.ajax({*/
/* 		url: 'index.php?route=sale/order/createinvoiceno&user_token={{ user_token }}&order_id={{ order_id }}',*/
/* 		dataType: 'json',*/
/* 		beforeSend: function() {*/
/* 			$('#button-invoice').button('loading');*/
/* 		},*/
/* 		complete: function() {*/
/* 			$('#button-invoice').button('reset');*/
/* 		},*/
/* 		success: function(json) {*/
/* 			$('.alert-dismissible').remove();*/
/* */
/* 			if (json['error']) {*/
/* 				$('#content > .container-fluid').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');*/
/* 			}*/
/* */
/* 			if (json['invoice_no']) {*/
/* 				$('#invoice').html(json['invoice_no']);*/
/* */
/* 				$('#button-invoice').replaceWith('<button disabled="disabled" class="btn btn-success btn-xs"><i class="fa fa-cog"></i></button>');*/
/* 			}*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});*/
/* });*/
/* */
/* $(document).delegate('#button-reward-add', 'click', function() {*/
/* 	$.ajax({*/
/* 		url: 'index.php?route=sale/order/addreward&user_token={{ user_token }}&order_id={{ order_id }}',*/
/* 		type: 'post',*/
/* 		dataType: 'json',*/
/* 		beforeSend: function() {*/
/* 			$('#button-reward-add').button('loading');*/
/* 		},*/
/* 		complete: function() {*/
/* 			$('#button-reward-add').button('reset');*/
/* 		},*/
/* 		success: function(json) {*/
/* 			$('.alert-dismissible').remove();*/
/* */
/* 			if (json['error']) {*/
/* 				$('#content > .container-fluid').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');*/
/* 			}*/
/* */
/* 			if (json['success']) {*/
/*                 $('#content > .container-fluid').prepend('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');*/
/* */
/* 				$('#button-reward-add').replaceWith('<button id="button-reward-remove" data-toggle="tooltip" title="{{ button_reward_remove }}" class="btn btn-danger btn-xs"><i class="fa fa-minus-circle"></i></button>');*/
/* 			}*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});*/
/* });*/
/* */
/* $(document).delegate('#button-reward-remove', 'click', function() {*/
/* 	$.ajax({*/
/* 		url: 'index.php?route=sale/order/removereward&user_token={{ user_token }}&order_id={{ order_id }}',*/
/* 		type: 'post',*/
/* 		dataType: 'json',*/
/* 		beforeSend: function() {*/
/* 			$('#button-reward-remove').button('loading');*/
/* 		},*/
/* 		complete: function() {*/
/* 			$('#button-reward-remove').button('reset');*/
/* 		},*/
/* 		success: function(json) {*/
/* 			$('.alert-dismissible').remove();*/
/* */
/* 			if (json['error']) {*/
/* 				$('#content > .container-fluid').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');*/
/* 			}*/
/* */
/* 			if (json['success']) {*/
/*                 $('#content > .container-fluid').prepend('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');*/
/* */
/* 				$('#button-reward-remove').replaceWith('<button id="button-reward-add" data-toggle="tooltip" title="{{ button_reward_add }}" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i></button>');*/
/* 			}*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});*/
/* });*/
/* */
/* $(document).delegate('#button-commission-add', 'click', function() {*/
/* 	$.ajax({*/
/* 		url: 'index.php?route=sale/order/addcommission&user_token={{ user_token }}&order_id={{ order_id }}',*/
/* 		type: 'post',*/
/* 		dataType: 'json',*/
/* 		beforeSend: function() {*/
/* 			$('#button-commission-add').button('loading');*/
/* 		},*/
/* 		complete: function() {*/
/* 			$('#button-commission-add').button('reset');*/
/* 		},*/
/* 		success: function(json) {*/
/* 			$('.alert-dismissible').remove();*/
/* */
/* 			if (json['error']) {*/
/* 				$('#content > .container-fluid').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');*/
/* 			}*/
/* */
/* 			if (json['success']) {*/
/*                 $('#content > .container-fluid').prepend('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');*/
/* */
/* 				$('#button-commission-add').replaceWith('<button id="button-commission-remove" data-toggle="tooltip" title="{{ button_commission_remove }}" class="btn btn-danger btn-xs"><i class="fa fa-minus-circle"></i></button>');*/
/* 			}*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});*/
/* });*/
/* */
/* $(document).delegate('#button-commission-remove', 'click', function() {*/
/* 	$.ajax({*/
/* 		url: 'index.php?route=sale/order/removecommission&user_token={{ user_token }}&order_id={{ order_id }}',*/
/* 		type: 'post',*/
/* 		dataType: 'json',*/
/* 		beforeSend: function() {*/
/* 			$('#button-commission-remove').button('loading');*/
/* 		},*/
/* 		complete: function() {*/
/* 			$('#button-commission-remove').button('reset');*/
/* 		},*/
/* 		success: function(json) {*/
/* 			$('.alert-dismissible').remove();*/
/* */
/* 			if (json['error']) {*/
/* 				$('#content > .container-fluid').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');*/
/* 			}*/
/* */
/* 			if (json['success']) {*/
/*                 $('#content > .container-fluid').prepend('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');*/
/* */
/* 				$('#button-commission-remove').replaceWith('<button id="button-commission-add" data-toggle="tooltip" title="{{ button_commission_add }}" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i></button>');*/
/* 			}*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});*/
/* });*/
/* */
/* var api_token = '';*/
/* */
/* $.ajax({*/
/*   url: '{{ catalog }}index.php?route=api/login',*/
/*   type: 'post',*/
/*   dataType: 'json',*/
/*   data: 'key={{ api_key }}',*/
/*   crossDomain: true,*/
/*   success: function(json) {*/
/*     $('.alert').remove();*/
/*     if (json['error']) {*/
/*       if (json['error']['key']) {*/
/*         $('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error']['key'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');*/
/*       }*/
/*       if (json['error']['ip']) {*/
/*         $('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error']['ip'] + ' <button type="button" id="button-ip-add" data-loading-text="{{ text_loading }}" class="btn btn-danger btn-xs pull-right"><i class="fa fa-plus"></i>{{ button_ip_add }}</button></div>');*/
/*       }*/
/*     }*/
/*     if (json['token']) {*/
/*       api_token = json['token'];*/
/*     }*/
/*   },*/
/*   error: function(xhr, ajaxOptions, thrownError) {*/
/*     alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/*   }*/
/* });*/
/* */
/* $('#history').delegate('.pagination a', 'click', function(e) {*/
/* 	e.preventDefault();*/
/* */
/* 	$('#history').load(this.href);*/
/* });*/
/* */
/* $('#history').load('index.php?route=sale/order/history&user_token={{ user_token }}&order_id={{ order_id }}');*/
/* */
/* $('#button-history').on('click', function() {*/
/* 	if (typeof verifyStatusChange == 'function'){*/
/* 	  if (verifyStatusChange() == false){*/
/* 	    return false;*/
/* 	  } else{*/
/* 	    addOrderInfo();*/
/* 	  }*/
/* 	} else{*/
/* 	  addOrderInfo();*/
/* 	}*/
/* */
/* */
/* 	$.ajax({*/
/* 		url: '{{ catalog }}index.php?route=api/order/history&api_token={{ api_token }}&store_id={{ store_id }}&order_id={{ order_id }}',*/
/* 		type: 'post',*/
/* 		dataType: 'json',*/
/* 		data: 'order_status_id=' + encodeURIComponent($('select[name=\'order_status_id\']').val()) + '&notify=' + ($('input[name=\'notify\']').prop('checked') ? 1 : 0) + '&override=' + ($('input[name=\'override\']').prop('checked') ? 1 : 0) + '&append=' + ($('input[name=\'append\']').prop('checked') ? 1 : 0) + '&comment=' + encodeURIComponent($('textarea[name=\'comment\']').val()),*/
/* 		beforeSend: function() {*/
/* 			$('#button-history').button('loading');*/
/* 		},*/
/* 		complete: function() {*/
/* 			$('#button-history').button('reset');*/
/* 		},*/
/* 		success: function(json) {*/
/* 			$('.alert-dismissible').remove();*/
/* */
/* 			if (json['error']) {*/
/* 				$('#history').before('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');*/
/* 			}*/
/* */
/* 			if (json['success']) {*/
/* 				$('#history').load('index.php?route=sale/order/history&user_token={{ user_token }}&order_id={{ order_id }}');*/
/* */
/* 				$('#history').before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');*/
/* */
/* 				$('textarea[name=\'comment\']').val('');*/
/* 			}*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});*/
/* });*/
/* */
/* function changeStatus(){*/
/*   var status_id = $('select[name="order_status_id"]').val();*/
/*   $('#openbay-info').remove();*/
/*   $.ajax({*/
/*     url: 'index.php?route=marketplace/openbay/getorderinfo&user_token={{ user_token }}&order_id={{ order_id }}&status_id='+status_id,*/
/*     dataType: 'html',*/
/*     success: function (html) {*/
/*       $('#history').after(html);*/
/*     }*/
/*   });*/
/* }*/
/* */
/* function addOrderInfo(){*/
/*   var status_id = $('select[name="order_status_id"]').val();*/
/*   $.ajax({*/
/*     url: 'index.php?route=marketplace/openbay/addorderinfo&user_token={{ user_token }}&order_id={{ order_id }}&status_id='+status_id,*/
/*     type: 'post',*/
/*     dataType: 'html',*/
/*     data: $(".openbay-data").serialize()*/
/*   });*/
/* }*/
/* */
/* $(document).ready(function() {*/
/*   changeStatus();*/
/* });*/
/* */
/* $('select[name="order_status_id"]').change(function(){*/
/*   changeStatus();*/
/* });*/
/* //--></script> */
/* </div>*/
/* */
/* 				<script>*/
/* */
/* 				$('.tk_button_delete_shipping').click(function(event) {*/
/* 					return confirm('{{ text_confirm }}');*/
/* 				});*/
/* */
/* 				{% if ((shipping_tk_econt_status and shipping_tk_econt_store_kay)) %}*/
/* 					$(function($) {*/
/* 						$('.open_tk_econt_delete_label').click(function(event) {*/
/* 							event.preventDefault();*/
/* 							event.stopPropagation();*/
/* 							var order_id = $(this).attr('data-order-id');*/
/* 							if (confirm('{{ text_confirm }}')) {*/
/* 								$.ajax({*/
/* 									url: 'index.php?route=sale/tk_econt/cancel&user_token={{ user_token }}&order_id=' + order_id + '&status_id=1',*/
/* 									dataType: 'json',*/
/* 									success: function(html) {*/
/* 										if(html.error) {*/
/* 											alert(html.error);*/
/* 										} else {*/
/* 											location.reload();*/
/* 										}*/
/* 									}*/
/* 								});*/
/* 							}*/
/* 						});*/
/* 					*/
/* 						$('.send_tk_econt_data').click(function(event) {*/
/* 							event.preventDefault();*/
/* 							event.stopPropagation();*/
/* 							var order_id = $(this).attr('data-order-id');*/
/* 							$.ajax({*/
/* 								url: 'index.php?route=sale/tk_econt/generate&user_token={{ user_token }}&order_id=' + order_id + '&status_id=1',*/
/* 								dataType: 'json',*/
/* 								success: function(html) {*/
/* 									if(html.error) {*/
/* 										alert(html.error);*/
/* 									} else {*/
/* 										$('#econt_button_on_'+order_id).css('display','none');*/
/* 										$('#econt_button_send_'+order_id).css('display','inline-block');*/
/* 										$('#econt_button_of_'+order_id).css('display','none');*/
/* 										alert(html.success);*/
/* 									}*/
/* 								}*/
/* 							});*/
/* 						});*/
/* 							 	*/
/* 						$('.open_tk_econt_create_label').click(function(event) {*/
/* 							event.preventDefault();*/
/* 							event.stopPropagation();*/
/* 							var order_id = $(this).attr('data-order-id');*/
/* 							$.ajax({*/
/* 								url: 'index.php?route=sale/tk_econt/generate&user_token={{ user_token }}&order_id=' + order_id + '&status_id=1',*/
/* 								dataType: 'json',*/
/* 								success: function(html) {*/
/* 								}*/
/* 							});*/
/* 							$createLabelWindow.find('iframe').attr('src', '{{ delivery_econt_url }}/create_label.php?' + $.param( {*/
/* 								'order_number': order_id,*/
/* 								'token': '{{ shipping_tk_econt_store_kay }}'*/
/* 							}));*/
/* 							$createLabelWindow.modal('show');*/
/* 						});*/
/* 							 */
/* 						var empty__ = function(thingy) {*/
/* 							return thingy == 0 || !thingy || (typeof(thingy) === 'object' && $.isEmptyObject(thingy));*/
/* 						}*/
/* 						var $createLabelWindow = $('#tk-econt-delivery-create-label-modal').modal( {*/
/* 							'show': false,*/
/* 							'backdrop': 'static'*/
/* 						});*/
/* 							 */
/* 						$(window).on('message', function(event) {*/
/* 							if (event['originalEvent']['origin'] != '{{ delivery_econt_url }}') return;*/
/* 							var messageData = event['originalEvent']['data'];*/
/* 							if (!messageData) return;*/
/* 							switch (messageData['event']) {*/
/* 								case 'cancel':*/
/* 								$createLabelWindow.modal('hide');*/
/* 								break;*/
/* 								case 'confirm':*/
/* 									$.ajax({*/
/* 										url: 'index.php?route=sale/tk_econt/trace&user_token={{ user_token }}&order_id=' + messageData['orderData']['num'],*/
/* 										type: 'post',*/
/* 										data: messageData,*/
/* 										dataType: 'json',*/
/* 										success: function(html) {*/
/* 											if(!html.error) {*/
/* 												if (messageData['printPdf'] === true && !empty__(messageData['shipmentStatus']['pdfURL'])) window.open(messageData['shipmentStatus']['pdfURL'], '_blank');*/
/* 												window.location.href = 'index.php?' + $.param( {*/
/* 													'route': 'sale/order/info',*/
/* 													'user_token': '{{ user_token }}',*/
/* 													'order_id': messageData['orderData']['num']*/
/* 												}){% if url is defined %}+'{{ url }}'{% endif %};*/
/* 											}*/
/* 										}*/
/* 									});*/
/* 								break;*/
/* 							}*/
/* 						});*/
/* 					});*/
/* 				{% endif %}*/
/* 				</script>*/
/* */
/* 				<div id="tk-econt-delivery-create-label-modal" class="modal fade" role="dialog">*/
/* 					<div class="modal-dialog">*/
/* 						<div class="modal-content">*/
/* 							<div class="modal-header">*/
/* 								<button type="button" class="close" data-dismiss="modal">&times;</button>*/
/* 								<h4 class="modal-title">Достави с Еконт</h4>*/
/* 							</div>*/
/* 							<div class="modal-body">*/
/* 								<iframe src="about:blank"></iframe>*/
/* 							</div>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* */
/* 				<style>*/
/* 					#tk-econt-delivery-create-label-modal .modal-dialog { */
/* 						width: 96%;*/
/* 					} */
/* 					#tk-econt-delivery-create-label-modal .modal-body { */
/* 						padding: 0;*/
/* 					} */
/* 					#tk-econt-delivery-create-label-modal iframe { */
/* 						border: 0;*/
/* 						width: 100%;*/
/* 						height: 87vh;*/
/* 					}*/
/* 					@media screen and (min-width: 800px) { */
/* 						#tk-econt-delivery-create-label-modal .modal-dialog { */
/* 							width: 700px;*/
/* 						} */
/* 					} */
/* 				</style>*/
/* 				*/
/* {{ footer }} */
