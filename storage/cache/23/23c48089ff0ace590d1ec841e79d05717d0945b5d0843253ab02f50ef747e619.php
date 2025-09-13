<?php

/* sale/order_list.twig */
class __TwigTemplate_54335f84e15cebc0aff2b4f7bfd75e99f262c09148f79e84ceebe49b550e4b0c extends Twig_Template
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
    <div class=\"pull-right\">
      <button type=\"button\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo (isset($context["button_filter"]) ? $context["button_filter"] : null);
        echo "\" onclick=\"\$('#filter-order').toggleClass('hidden-sm hidden-xs');\" class=\"btn btn-default hidden-md hidden-lg\"><i class=\"fa fa-filter\"></i></button>
      <button type=\"submit\" id=\"button-shipping\" form=\"form-order\" formaction=\"";
        // line 7
        echo (isset($context["shipping"]) ? $context["shipping"] : null);
        echo "\" formtarget=\"_blank\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_shipping_print"]) ? $context["button_shipping_print"] : null);
        echo "\" class=\"btn btn-info\"><i class=\"fa fa-truck\"></i></button>
      <button type=\"submit\" id=\"button-invoice\" form=\"form-order\" formaction=\"";
        // line 8
        echo (isset($context["invoice"]) ? $context["invoice"] : null);
        echo "\" formtarget=\"_blank\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_invoice_print"]) ? $context["button_invoice_print"] : null);
        echo "\" class=\"btn btn-info\"><i class=\"fa fa-print\"></i></button>
      <a href=\"";
        // line 9
        echo (isset($context["add"]) ? $context["add"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_add"]) ? $context["button_add"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i></a> </div>
    <h1>";
        // line 10
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
    <ul class=\"breadcrumb\">
      ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 13
            echo "      <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    </ul>
  </div>
</div>
<div class=\"container-fluid\">";
        // line 18
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 19
            echo "  <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  </div>
  ";
        }
        // line 23
        echo "  ";
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 24
            echo "  <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            echo (isset($context["success"]) ? $context["success"] : null);
            echo "
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  </div>
  ";
        }
        // line 28
        echo "  <div class=\"row\">
    <div id=\"filter-order\" class=\"col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs\">
      <div class=\"panel panel-default\">
        <div class=\"panel-heading\">
          <h3 class=\"panel-title\"><i class=\"fa fa-filter\"></i> ";
        // line 32
        echo (isset($context["text_filter"]) ? $context["text_filter"] : null);
        echo "</h3>
        </div>
        <div class=\"panel-body\">
          <div class=\"form-group\">
            <label class=\"control-label\" for=\"input-order-id\">";
        // line 36
        echo (isset($context["entry_order_id"]) ? $context["entry_order_id"] : null);
        echo "</label>
            <input type=\"text\" name=\"filter_order_id\" value=\"";
        // line 37
        echo (isset($context["filter_order_id"]) ? $context["filter_order_id"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_order_id"]) ? $context["entry_order_id"] : null);
        echo "\" id=\"input-order-id\" class=\"form-control\" />
          </div>
          <div class=\"form-group\">
            <label class=\"control-label\" for=\"input-customer\">";
        // line 40
        echo (isset($context["entry_customer"]) ? $context["entry_customer"] : null);
        echo "</label>
            <input type=\"text\" name=\"filter_customer\" value=\"";
        // line 41
        echo (isset($context["filter_customer"]) ? $context["filter_customer"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_customer"]) ? $context["entry_customer"] : null);
        echo "\" id=\"input-customer\" class=\"form-control\" />
          </div>
          <div class=\"form-group\">
            <label class=\"control-label\" for=\"input-order-status\">";
        // line 44
        echo (isset($context["entry_order_status"]) ? $context["entry_order_status"] : null);
        echo "</label>
            <select name=\"filter_order_status_id\" id=\"input-order-status\" class=\"form-control\">
              <option value=\"\"></option>
              
              ";
        // line 48
        if (((isset($context["filter_order_status_id"]) ? $context["filter_order_status_id"] : null) == "0")) {
            // line 49
            echo "              
              <option value=\"0\" selected=\"selected\">";
            // line 50
            echo (isset($context["text_missing"]) ? $context["text_missing"] : null);
            echo "</option>
              
              ";
        } else {
            // line 53
            echo "              
              <option value=\"0\">";
            // line 54
            echo (isset($context["text_missing"]) ? $context["text_missing"] : null);
            echo "</option>
              
              ";
        }
        // line 57
        echo "              ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["order_statuses"]) ? $context["order_statuses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 58
            echo "              ";
            if (($this->getAttribute($context["order_status"], "order_status_id", array()) == (isset($context["filter_order_status_id"]) ? $context["filter_order_status_id"] : null))) {
                // line 59
                echo "              
              <option value=\"";
                // line 60
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
              
              ";
            } else {
                // line 63
                echo "              
              <option value=\"";
                // line 64
                echo $this->getAttribute($context["order_status"], "order_status_id", array());
                echo "\">";
                echo $this->getAttribute($context["order_status"], "name", array());
                echo "</option>
              
              ";
            }
            // line 67
            echo "              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "            
            </select>
          </div>
          <div class=\"form-group\">
            <label class=\"control-label\" for=\"input-total\">";
        // line 72
        echo (isset($context["entry_total"]) ? $context["entry_total"] : null);
        echo "</label>
            <input type=\"text\" name=\"filter_total\" value=\"";
        // line 73
        echo (isset($context["filter_total"]) ? $context["filter_total"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_total"]) ? $context["entry_total"] : null);
        echo "\" id=\"input-total\" class=\"form-control\" />
          </div>
          <div class=\"form-group\">
            <label class=\"control-label\" for=\"input-date-added\">";
        // line 76
        echo (isset($context["entry_date_added"]) ? $context["entry_date_added"] : null);
        echo "</label>
            <div class=\"input-group date\">
              <input type=\"text\" name=\"filter_date_added\" value=\"";
        // line 78
        echo (isset($context["filter_date_added"]) ? $context["filter_date_added"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_date_added"]) ? $context["entry_date_added"] : null);
        echo "\" data-date-format=\"YYYY-MM-DD\" id=\"input-date-added\" class=\"form-control\" />
              <span class=\"input-group-btn\">
              <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button>
              </span> </div>
          </div>
          <div class=\"form-group\">
            <label class=\"control-label\" for=\"input-date-modified\">";
        // line 84
        echo (isset($context["entry_date_modified"]) ? $context["entry_date_modified"] : null);
        echo "</label>
            <div class=\"input-group date\">
              <input type=\"text\" name=\"filter_date_modified\" value=\"";
        // line 86
        echo (isset($context["filter_date_modified"]) ? $context["filter_date_modified"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_date_modified"]) ? $context["entry_date_modified"] : null);
        echo "\" data-date-format=\"YYYY-MM-DD\" id=\"input-date-modified\" class=\"form-control\" />
              <span class=\"input-group-btn\">
              <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button>
              </span> </div>
          </div>
          <div class=\"form-group text-right\">
            <button type=\"button\" id=\"button-filter\" class=\"btn btn-default\"><i class=\"fa fa-filter\"></i> ";
        // line 92
        echo (isset($context["button_filter"]) ? $context["button_filter"] : null);
        echo "</button>
          </div>
        </div>
      </div>
    </div>
    <div class=\"col-md-9 col-md-pull-3 col-sm-12\">
      <div class=\"panel panel-default\">
        <div class=\"panel-heading\">
          <h3 class=\"panel-title\"><i class=\"fa fa-list\"></i> ";
        // line 100
        echo (isset($context["text_list"]) ? $context["text_list"] : null);
        echo "</h3>
        </div>
        <div class=\"panel-body\">
          <form method=\"post\" action=\"\" enctype=\"multipart/form-data\" id=\"form-order\">
            <div class=\"table-responsive\">
              <table class=\"table table-bordered table-hover\">
                <thead>
                  <tr>
                    <td style=\"width: 1px;\" class=\"text-center\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', this.checked);\" /></td>
                    <td class=\"text-right\">";
        // line 109
        if (((isset($context["sort"]) ? $context["sort"] : null) == "o.order_id")) {
            echo " <a href=\"";
            echo (isset($context["sort_order"]) ? $context["sort_order"] : null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, (isset($context["order"]) ? $context["order"] : null));
            echo "\">";
            echo (isset($context["column_order_id"]) ? $context["column_order_id"] : null);
            echo "</a> ";
        } else {
            echo " <a href=\"";
            echo (isset($context["sort_order"]) ? $context["sort_order"] : null);
            echo "\">";
            echo (isset($context["column_order_id"]) ? $context["column_order_id"] : null);
            echo "</a> ";
        }
        echo "</td>
                    <td class=\"text-left\">";
        // line 110
        if (((isset($context["sort"]) ? $context["sort"] : null) == "customer")) {
            echo " <a href=\"";
            echo (isset($context["sort_customer"]) ? $context["sort_customer"] : null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, (isset($context["order"]) ? $context["order"] : null));
            echo "\">";
            echo (isset($context["column_customer"]) ? $context["column_customer"] : null);
            echo "</a> ";
        } else {
            echo " <a href=\"";
            echo (isset($context["sort_customer"]) ? $context["sort_customer"] : null);
            echo "\">";
            echo (isset($context["column_customer"]) ? $context["column_customer"] : null);
            echo "</a> ";
        }
        echo "</td>
                    <td class=\"text-left\">";
        // line 111
        if (((isset($context["sort"]) ? $context["sort"] : null) == "order_status")) {
            echo " <a href=\"";
            echo (isset($context["sort_status"]) ? $context["sort_status"] : null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, (isset($context["order"]) ? $context["order"] : null));
            echo "\">";
            echo (isset($context["column_status"]) ? $context["column_status"] : null);
            echo "</a> ";
        } else {
            echo " <a href=\"";
            echo (isset($context["sort_status"]) ? $context["sort_status"] : null);
            echo "\">";
            echo (isset($context["column_status"]) ? $context["column_status"] : null);
            echo "</a> ";
        }
        echo "</td>
                    <td class=\"text-right\">";
        // line 112
        if (((isset($context["sort"]) ? $context["sort"] : null) == "o.total")) {
            echo " <a href=\"";
            echo (isset($context["sort_total"]) ? $context["sort_total"] : null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, (isset($context["order"]) ? $context["order"] : null));
            echo "\">";
            echo (isset($context["column_total"]) ? $context["column_total"] : null);
            echo "</a> ";
        } else {
            echo " <a href=\"";
            echo (isset($context["sort_total"]) ? $context["sort_total"] : null);
            echo "\">";
            echo (isset($context["column_total"]) ? $context["column_total"] : null);
            echo "</a> ";
        }
        echo "</td>
                    <td class=\"text-left\">";
        // line 113
        if (((isset($context["sort"]) ? $context["sort"] : null) == "o.date_added")) {
            echo " <a href=\"";
            echo (isset($context["sort_date_added"]) ? $context["sort_date_added"] : null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, (isset($context["order"]) ? $context["order"] : null));
            echo "\">";
            echo (isset($context["column_date_added"]) ? $context["column_date_added"] : null);
            echo "</a> ";
        } else {
            echo " <a href=\"";
            echo (isset($context["sort_date_added"]) ? $context["sort_date_added"] : null);
            echo "\">";
            echo (isset($context["column_date_added"]) ? $context["column_date_added"] : null);
            echo "</a> ";
        }
        echo "</td>
                    <td class=\"text-left\">";
        // line 114
        if (((isset($context["sort"]) ? $context["sort"] : null) == "o.date_modified")) {
            echo " <a href=\"";
            echo (isset($context["sort_date_modified"]) ? $context["sort_date_modified"] : null);
            echo "\" class=\"";
            echo twig_lower_filter($this->env, (isset($context["order"]) ? $context["order"] : null));
            echo "\">";
            echo (isset($context["column_date_modified"]) ? $context["column_date_modified"] : null);
            echo "</a> ";
        } else {
            echo " <a href=\"";
            echo (isset($context["sort_date_modified"]) ? $context["sort_date_modified"] : null);
            echo "\">";
            echo (isset($context["column_date_modified"]) ? $context["column_date_modified"] : null);
            echo "</a> ";
        }
        echo "</td>
                    <td class=\"text-right\">";
        // line 115
        echo (isset($context["column_action"]) ? $context["column_action"] : null);
        echo "</td>

\t\t\t
\t\t\t\t";
        // line 118
        if ((((((((isset($context["shipping_tk_econt_status"]) ? $context["shipping_tk_econt_status"] : null) && (isset($context["shipping_tk_econt_store_kay"]) ? $context["shipping_tk_econt_store_kay"] : null)) || (isset($context["shipping_tk_speedy_status"]) ? $context["shipping_tk_speedy_status"] : null)) || (isset($context["shipping_tk_transpress_status"]) ? $context["shipping_tk_transpress_status"] : null)) || (isset($context["shipping_tk_boxnow_status"]) ? $context["shipping_tk_boxnow_status"] : null)) || (isset($context["shipping_tk_next_status"]) ? $context["shipping_tk_next_status"] : null)) || (isset($context["shipping_tk_sameday_status"]) ? $context["shipping_tk_sameday_status"] : null))) {
            // line 119
            echo "\t\t\t\t\t\t<td class=\"text-left\" style=\"min-width: 100px;\">Куриери <span class=\"tk_all_spin\"></span></td>
\t\t\t\t\t\t<td class=\"text-left\" style=\"min-width: 100px;\">
\t\t\t\t\t\t";
            // line 121
            if (((isset($context["shipping_tk_econt_status"]) ? $context["shipping_tk_econt_status"] : null) && (isset($context["shipping_tk_econt_store_kay"]) ? $context["shipping_tk_econt_store_kay"] : null))) {
                echo " 
\t\t\t\t\t\t\t<button type=\"button\" id=\"update_tk_econt_shipment\" class=\"btn btn-default\" ><img src=\"view/image/shipping/tk_econt.png\" height=\"15px\"> Обнови</button>
\t\t\t\t\t\t";
            }
            // line 124
            echo "
\t\t\t\t\t\t";
            // line 125
            if ((isset($context["shipping_tk_speedy_status"]) ? $context["shipping_tk_speedy_status"] : null)) {
                // line 126
                echo "\t\t\t\t\t\t\t<button type=\"button\" id=\"update_tk_speedy_shipment\" class=\"btn btn-default\" ><img src=\"view/image/shipping/tk_speedy.png\" height=\"15px\"> Обнови</button>
\t\t\t\t\t\t";
            }
            // line 128
            echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
            // line 129
            if ((isset($context["shipping_tk_transpress_status"]) ? $context["shipping_tk_transpress_status"] : null)) {
                echo " 
\t\t\t\t\t\t\t<button class=\"btn btn-default update_tk_transpress_shipment\" onclick=\"return false;\"><img src=\"view/image/shipping/tk_transpress.png\" height=\"15px\"> Обнови</button>
\t\t\t\t\t\t";
            }
            // line 132
            echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
            // line 133
            if ((isset($context["shipping_tk_boxnow_status"]) ? $context["shipping_tk_boxnow_status"] : null)) {
                echo " 
\t\t\t\t\t\t\t<button class=\"btn btn-default update_tk_boxnow_shipment\" onclick=\"return false;\"><img src=\"view/image/shipping/tk_boxnow.png\" height=\"15px\"> Обнови</button>
\t\t\t\t\t\t";
            }
            // line 136
            echo "
\t\t\t\t\t\t";
            // line 137
            if ((isset($context["shipping_tk_next_status"]) ? $context["shipping_tk_next_status"] : null)) {
                // line 138
                echo "\t\t\t\t\t\t\t<button type=\"button\" id=\"update_tk_next_shipment\" class=\"btn btn-default\" onclick=\"return false;\"><img src=\"view/image/shipping/tk_next.png\" height=\"15px\"> Обнови</button>
\t\t\t\t\t\t";
            }
            // line 140
            echo "
\t\t\t\t\t\t";
            // line 141
            if ((isset($context["shipping_tk_sameday_status"]) ? $context["shipping_tk_sameday_status"] : null)) {
                // line 142
                echo "\t\t\t\t\t\t\t<button type=\"button\" id=\"update_tk_sameday_shipment\" class=\"btn btn-default\" onclick=\"return false;\"><img src=\"view/image/shipping/tk_sameday.png\" height=\"15px\"> Обнови</button>
\t\t\t\t\t\t";
            }
            // line 144
            echo "\t\t\t\t\t\t</td>
\t\t\t\t";
        }
        // line 146
        echo "\t\t\t\t\t\t\t\t
\t\t\t\t
                  </tr>
                </thead>
                <tbody>
                
                ";
        // line 152
        if ((isset($context["orders"]) ? $context["orders"] : null)) {
            // line 153
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["orders"]) ? $context["orders"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 154
                echo "                <tr>
                  <td class=\"text-center\"> ";
                // line 155
                if (twig_in_filter($this->getAttribute($context["order"], "order_id", array()), (isset($context["selected"]) ? $context["selected"] : null))) {
                    // line 156
                    echo "                    <input type=\"checkbox\" name=\"selected[]\" value=\"";
                    echo $this->getAttribute($context["order"], "order_id", array());
                    echo "\" checked=\"checked\" />
                    ";
                } else {
                    // line 158
                    echo "                    <input type=\"checkbox\" name=\"selected[]\" value=\"";
                    echo $this->getAttribute($context["order"], "order_id", array());
                    echo "\" />
                    ";
                }
                // line 160
                echo "                    <input type=\"hidden\" name=\"shipping_code[]\" value=\"";
                echo $this->getAttribute($context["order"], "shipping_code", array());
                echo "\" /></td>
                  <td class=\"text-right\">";
                // line 161
                echo $this->getAttribute($context["order"], "order_id", array());
                echo "</td>
                  <td class=\"text-left\">";
                // line 162
                echo $this->getAttribute($context["order"], "customer", array());
                echo "</td>
                  <td class=\"text-left\">";
                // line 163
                echo $this->getAttribute($context["order"], "order_status", array());
                echo "</td>
                  <td class=\"text-right\">";
                // line 164
                echo $this->getAttribute($context["order"], "total", array());
                echo "</td>
                  <td class=\"text-left\">";
                // line 165
                echo $this->getAttribute($context["order"], "date_added", array());
                echo "</td>
                  <td class=\"text-left\">";
                // line 166
                echo $this->getAttribute($context["order"], "date_modified", array());
                echo "</td>
                  <td class=\"text-right\"><div style=\"min-width: 120px;\">
                      <div class=\"btn-group\"> <a href=\"";
                // line 168
                echo $this->getAttribute($context["order"], "view", array());
                echo "\" data-toggle=\"tooltip\" title=\"";
                echo (isset($context["button_view"]) ? $context["button_view"] : null);
                echo "\" class=\"btn btn-primary\"><i class=\"fa fa-eye\"></i></a>
                        <button type=\"button\" data-toggle=\"dropdown\" class=\"btn btn-primary dropdown-toggle\"><span class=\"caret\"></span></button>
                        <ul class=\"dropdown-menu dropdown-menu-right\">
                          <li><a href=\"";
                // line 171
                echo $this->getAttribute($context["order"], "edit", array());
                echo "\"><i class=\"fa fa-pencil\"></i> ";
                echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
                echo "</a></li>
                          <li><a href=\"";
                // line 172
                echo $this->getAttribute($context["order"], "order_id", array());
                echo "\"><i class=\"fa fa-trash-o\"></i> ";
                echo (isset($context["button_delete"]) ? $context["button_delete"] : null);
                echo "</a></li>
                        </ul>
                      </div>
                    </div></td>


\t\t\t\t\t\t\t";
                // line 178
                if ((((((((isset($context["shipping_tk_econt_status"]) ? $context["shipping_tk_econt_status"] : null) && (isset($context["shipping_tk_econt_store_kay"]) ? $context["shipping_tk_econt_store_kay"] : null)) || (isset($context["shipping_tk_speedy_status"]) ? $context["shipping_tk_speedy_status"] : null)) || (isset($context["shipping_tk_transpress_status"]) ? $context["shipping_tk_transpress_status"] : null)) || (isset($context["shipping_tk_boxnow_status"]) ? $context["shipping_tk_boxnow_status"] : null)) || (isset($context["shipping_tk_next_status"]) ? $context["shipping_tk_next_status"] : null)) || (isset($context["shipping_tk_sameday_status"]) ? $context["shipping_tk_sameday_status"] : null))) {
                    // line 179
                    echo "\t\t\t\t\t\t\t\t<td class=\"text-left\">
\t\t\t\t\t\t\t\t\t";
                    // line 180
                    if (($this->getAttribute($context["order"], "econt_edit", array(), "array", true, true) && ($this->getAttribute($context["order"], "econt_edit", array(), "array") != "0"))) {
                        // line 181
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["order"], "econt_status_id", array(), "array") == 2)) {
                            // line 182
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($context["order"], "econt_shipment", array(), "array") != "0")) {
                                // line 183
                                echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                // line 184
                                echo $this->getAttribute($context["order"], "econt_pdf", array(), "array");
                                echo "\" class=\"btn btn-success\" target=\"_blank\" style=\"padding: 8px 8px;min-width: 110px;\"><small>";
                                echo $this->getAttribute($context["order"], "econt_shipment", array(), "array");
                                echo "</small></a>

\t\t\t\t\t\t\t\t\t\t\t\t<button id=\"econt_button_delete_";
                                // line 186
                                echo $this->getAttribute($context["order"], "order_id", array(), "array");
                                echo "\" class=\"btn btn-danger open_tk_econt_delete_label\" data-order-id=\"";
                                echo $this->getAttribute($context["order"], "order_id", array(), "array");
                                echo "\" data-store-id=\"";
                                echo $this->getAttribute($context["order"], "store_id", array(), "array");
                                echo "\" data-toggle=\"tooltip\" title=\"";
                                echo (isset($context["button_delete"]) ? $context["button_delete"] : null);
                                echo "\"><i class=\"fa fa-trash-o\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 189
                                echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t\t\t<button id=\"econt_button_send_";
                                // line 190
                                echo $this->getAttribute($context["order"], "order_id", array(), "array");
                                echo "\" class=\"btn btn-primary open_tk_econt_create_label\" data-order-id=\"";
                                echo $this->getAttribute($context["order"], "order_id", array(), "array");
                                echo "\" data-store-id=\"";
                                echo $this->getAttribute($context["order"], "store_id", array(), "array");
                                echo "\" style=\"padding: 8px 8px;min-width: 110px;\"><small>Товарителница</small></button>
\t\t\t\t\t\t\t\t\t\t\t\t<a style=\"display: inline-block\" id=\"econt_button_edit_";
                                // line 191
                                echo $this->getAttribute($context["order"], "order_id", array(), "array");
                                echo "\" href=\"";
                                echo $this->getAttribute($context["order"], "econt_edit", array(), "array");
                                echo "\" data-toggle=\"tooltip\" title=\"";
                                echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
                                echo "\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 194
                            echo "\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($context["order"], "econt_status_id", array(), "array") == 1)) {
                            // line 195
                            echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t\t\t<button id=\"econt_button_send_";
                            // line 196
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" class=\"btn btn-primary open_tk_econt_create_label\" data-order-id=\"";
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" data-store-id=\"";
                            echo $this->getAttribute($context["order"], "store_id", array(), "array");
                            echo "\" style=\"padding: 8px 8px;min-width: 110px;\"><small>Товарителница</small></button>
\t\t\t\t\t\t\t\t\t\t\t\t<a style=\"display: inline-block\" id=\"econt_button_edit_";
                            // line 197
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" href=\"";
                            echo $this->getAttribute($context["order"], "econt_edit", array(), "array");
                            echo "\" data-toggle=\"tooltip\" title=\"";
                            echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
                            echo "\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute(                        // line 199
$context["order"], "econt_status_id", array(), "array") == "admin_order")) {
                            // line 200
                            echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t\t\t<a id=\"econt_button_edit_";
                            // line 201
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" href=\"";
                            echo $this->getAttribute($context["order"], "econt_edit", array(), "array");
                            echo "\" data-toggle=\"tooltip\" title=\"";
                            echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
                            echo "\" class=\"btn btn-primary\" style=\"min-width: 150px;\">Редактирай</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 204
                            echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t\t\t<button id=\"econt_button_on_";
                            // line 205
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" class=\"btn btn-info send_tk_econt_data\" data-order-id=\"";
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" data-store-id=\"";
                            echo $this->getAttribute($context["order"], "store_id", array(), "array");
                            echo "\"  style=\"padding: 8px 8px;min-width: 110px;\"><small>Изпрати</small></button>
\t\t\t\t\t\t\t\t\t\t\t\t<button id=\"econt_button_send_";
                            // line 206
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" class=\"btn btn-primary open_tk_econt_create_label\" style=\"display: none\" data-order-id=\"";
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" data-store-id=\"";
                            echo $this->getAttribute($context["order"], "store_id", array(), "array");
                            echo "\" style=\"padding: 8px 8px;min-width: 110px;\"><small>Товарителница</small></button>
\t\t\t\t\t\t\t\t\t\t\t\t<a style=\"display: inline-block\" id=\"econt_button_edit_";
                            // line 207
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" href=\"";
                            echo $this->getAttribute($context["order"], "econt_edit", array(), "array");
                            echo "\" data-toggle=\"tooltip\" title=\"";
                            echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
                            echo "\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 210
                        echo "\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute($context["order"], "speedy_edit", array(), "array", true, true) && ($this->getAttribute($context["order"], "speedy_edit", array(), "array") != "0"))) {
                        // line 211
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["order"], "speedy_shipment", array(), "array") != "0")) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            // line 213
                            echo $this->getAttribute($context["order"], "speedy_pdf", array(), "array");
                            echo "\" class=\"btn btn-success\" target=\"_blank\"  style=\"padding: 8px 8px;min-width: 110px;\"><small>";
                            echo $this->getAttribute($context["order"], "speedy_shipment", array(), "array");
                            echo "</small></a>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            // line 215
                            echo $this->getAttribute($context["order"], "speedy_cancel", array(), "array");
                            echo "\"  id=\"speedy_button_close_";
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" data-toggle=\"tooltip\" title=\"Анулирай\" class=\"tk_button_delete_shipping btn btn-danger\" data-original-title=\"Анулирай\"><i class=\"fa fa-trash-o\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 218
                            echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            echo $this->getAttribute($context["order"], "speedy_edit", array(), "array");
                            echo "\" id=\"speedy_button_send_";
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" class=\"btn btn-primary open_tk_speedy_create_label\"  style=\"min-width: 150px;\"><small>Товарителница</small></a>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 220
                        echo "\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute($context["order"], "transpress_edit", array(), "array", true, true) && ($this->getAttribute($context["order"], "transpress_edit", array(), "array") != "0"))) {
                        // line 221
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["order"], "transpress_shipment", array(), "array") != "0")) {
                            // line 222
                            echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            echo $this->getAttribute($context["order"], "transpress_pdf", array(), "array");
                            echo "\" class=\"btn btn-success\" target=\"_blank\">";
                            echo $this->getAttribute($context["order"], "transpress_shipment", array(), "array");
                            echo "</a>

\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            // line 224
                            echo $this->getAttribute($context["order"], "transpress_cancel", array(), "array");
                            echo "\"  id=\"transpress_button_close_";
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" data-toggle=\"tooltip\" title=\"Анулирай\" class=\"tk_button_delete_shipping btn btn-danger\" data-original-title=\"Анулирай\"><i class=\"fa fa-trash-o\"></i></a>
\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 226
                            echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            echo $this->getAttribute($context["order"], "transpress_edit", array(), "array");
                            echo "\" id=\"transpress_button_send_";
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" class=\"btn btn-primary open_tk_transpress_create_label\" style=\"min-width: 150px;\"><small>Товарителница</small></a>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 228
                        echo "\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute($context["order"], "boxnow_status_id", array(), "array", true, true) && ($this->getAttribute($context["order"], "boxnow_status_id", array(), "array") != "0"))) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t";
                        // line 229
                        if (($this->getAttribute($context["order"], "boxnow_shipment", array(), "array") != "0")) {
                            // line 230
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($context["order"], "boxnow_cancel", array(), "array") != "0")) {
                                // line 231
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                // line 232
                                echo $this->getAttribute($context["order"], "boxnow_pdf", array(), "array");
                                echo "\" class=\"btn btn-success\" target=\"_blank\" style=\"padding: 8px 8px;min-width: 110px;\"><small>";
                                echo $this->getAttribute($context["order"], "boxnow_shipment", array(), "array");
                                echo "</small></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                // line 233
                                echo $this->getAttribute($context["order"], "boxnow_cancel", array(), "array");
                                echo "\"  id=\"boxnow_button_close_";
                                echo $this->getAttribute($context["order"], "order_id", array(), "array");
                                echo "\" data-toggle=\"tooltip\" title=\"Анулирай\" class=\"tk_button_delete_shipping btn btn-danger\" data-original-title=\"Анулирай\"><i class=\"fa fa-trash-o\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 236
                                echo "                                                ";
                                if (($this->getAttribute($context["order"], "boxnow_status_id", array(), "array") == "Откзана от подател")) {
                                    // line 237
                                    echo "                                                    <a href=\"";
                                    echo $this->getAttribute($context["order"], "boxnow_edit", array(), "array");
                                    echo "\" id=\"boxnow_button_send_";
                                    echo $this->getAttribute($context["order"], "order_id", array(), "array");
                                    echo "\" class=\"btn btn-primary open_tk_boxnow_create_label\" style=\"min-width: 150px;\"><small>Товарителница</small></a>
                                                ";
                                } else {
                                    // line 239
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t    <a href=\"";
                                    echo $this->getAttribute($context["order"], "boxnow_pdf", array(), "array");
                                    echo "\" class=\"btn btn-success\" target=\"_blank\" style=\"min-width: 150px;\"><small>";
                                    echo $this->getAttribute($context["order"], "boxnow_shipment", array(), "array");
                                    echo "</small></a>
\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 241
                                echo "\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 242
                            echo "\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 243
                            echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            echo $this->getAttribute($context["order"], "boxnow_edit", array(), "array");
                            echo "\" id=\"boxnow_button_send_";
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" class=\"btn btn-primary open_tk_boxnow_create_label\" style=\"min-width: 150px;\"><small>Товарителница</small></a>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 245
                        echo "\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute($context["order"], "next_status_id", array(), "array", true, true) && ($this->getAttribute($context["order"], "next_status_id", array(), "array") != "0"))) {
                        // line 246
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["order"], "next_shipment", array(), "array") != "0")) {
                            // line 247
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($context["order"], "next_cancel", array(), "array") != "0")) {
                                // line 248
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                // line 249
                                echo $this->getAttribute($context["order"], "next_pdf", array(), "array");
                                echo "\" class=\"btn btn-success\" target=\"_blank\" style=\"padding: 8px 8px;min-width: 110px;\"><small>";
                                echo $this->getAttribute($context["order"], "next_shipment", array(), "array");
                                echo "</small></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                // line 250
                                echo $this->getAttribute($context["order"], "next_cancel", array(), "array");
                                echo "\"  id=\"next_button_close_";
                                echo $this->getAttribute($context["order"], "order_id", array(), "array");
                                echo "\" data-toggle=\"tooltip\" title=\"Анулирай\" class=\"tk_button_delete_shipping btn btn-danger\" data-original-title=\"Анулирай\"><i class=\"fa fa-trash-o\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 253
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"<?php echo \$order['next_pdf']; ?>\" class=\"btn btn-success\" target=\"_blank\" style=\"min-width: 150px;\"><small>";
                                echo $this->getAttribute($context["order"], "next_shipment", array(), "array");
                                echo "</small></a>
\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 255
                            echo "\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 256
                            echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            echo $this->getAttribute($context["order"], "next_edit", array(), "array");
                            echo "\" id=\"next_button_send_";
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" class=\"btn btn-primary open_tk_next_create_label\" style=\"min-width: 150px;\"><small>Товарителница</small></a>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 258
                        echo "\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute($context["order"], "sameday_status_id", array(), "array", true, true) && ($this->getAttribute($context["order"], "sameday_status_id", array(), "array") != "0"))) {
                        // line 259
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["order"], "sameday_shipment", array(), "array") != "0")) {
                            // line 260
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($context["order"], "sameday_cancel", array(), "array") != "0")) {
                                // line 261
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"btn-group\"  style=\"min-width: 150px;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                // line 262
                                echo $this->getAttribute($context["order"], "sameday_pdf", array(), "array");
                                echo "\" class=\"btn btn-success\" target=\"_blank\" style=\"padding: 8px 8px;min-width: 110px;\"><small>";
                                echo $this->getAttribute($context["order"], "sameday_shipment", array(), "array");
                                echo "</small></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                                // line 263
                                echo $this->getAttribute($context["order"], "sameday_cancel", array(), "array");
                                echo "\"  id=\"sameday_button_close_";
                                echo $this->getAttribute($context["order"], "order_id", array(), "array");
                                echo "\" data-toggle=\"tooltip\" title=\"Анулирай\" class=\"tk_button_delete_shipping btn btn-danger\" data-original-title=\"Анулирай\"><i class=\"fa fa-trash-o\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 266
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"<?php echo \$order['sameday_pdf']; ?>\" class=\"btn btn-success\" target=\"_blank\" style=\"min-width: 150px;\"><small>";
                                echo $this->getAttribute($context["order"], "sameday_shipment", array(), "array");
                                echo "</small></a>
\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 268
                            echo "\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 269
                            echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                            echo $this->getAttribute($context["order"], "sameday_edit", array(), "array");
                            echo "\" id=\"sameday_button_send_";
                            echo $this->getAttribute($context["order"], "order_id", array(), "array");
                            echo "\" class=\"btn btn-primary open_tk_sameday_create_label\" style=\"min-width: 150px;\"><small>Товарителница</small></a>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 271
                        echo "\t\t\t\t\t\t\t\t\t";
                    }
                    // line 272
                    echo "\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td class=\"text-left\">
\t\t\t\t\t\t\t\t\t";
                    // line 274
                    if (($this->getAttribute($context["order"], "econt_edit", array(), "array", true, true) && ($this->getAttribute($context["order"], "econt_edit", array(), "array") != "0"))) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<img src=\"view/image/shipping/tk_econt.png\">
\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute(                    // line 276
$context["order"], "speedy_edit", array(), "array", true, true) && ($this->getAttribute($context["order"], "speedy_edit", array(), "array") != "0"))) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<img src=\"view/image/shipping/tk_speedy.png\">
\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute(                    // line 278
$context["order"], "transpress_edit", array(), "array", true, true) && ($this->getAttribute($context["order"], "transpress_edit", array(), "array") != "0"))) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<img src=\"view/image/shipping/tk_transpress.png\">
\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute(                    // line 280
$context["order"], "boxnow_status_id", array(), "array", true, true) && ($this->getAttribute($context["order"], "boxnow_status_id", array(), "array") != "0"))) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<img src=\"view/image/shipping/tk_boxnow.png\">
\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute(                    // line 282
$context["order"], "next_status_id", array(), "array", true, true) && ($this->getAttribute($context["order"], "next_status_id", array(), "array") != "0"))) {
                        // line 283
                        echo "\t\t\t\t\t\t\t\t\t\t<img src=\"view/image/shipping/tk_next.png\">
\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute(                    // line 284
$context["order"], "sameday_status_id", array(), "array", true, true) && ($this->getAttribute($context["order"], "sameday_status_id", array(), "array") != "0"))) {
                        // line 285
                        echo "\t\t\t\t\t\t\t\t\t\t<img src=\"view/image/shipping/tk_sameday.png\">
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 287
                    echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                    // line 288
                    if (($this->getAttribute($context["order"], "econt_shipment", array(), "array") != 0)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<a href=\"https://www.econt.com/services/track-shipment/";
                        // line 289
                        echo $this->getAttribute($context["order"], "econt_shipment", array(), "array");
                        echo "\" target=\"_blank\"><small>";
                        echo $this->getAttribute($context["order"], "econt_shipment_status_txt", array(), "array");
                        echo "</small></a>
\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute(                    // line 290
$context["order"], "speedy_shipment", array(), "array") != 0)) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<a href=\"https://www.speedy.bg/bg/track-shipment?shipmentNumber=";
                        // line 291
                        echo $this->getAttribute($context["order"], "speedy_shipment", array(), "array");
                        echo "\" target=\"_blank\"><small>";
                        echo $this->getAttribute($context["order"], "speedy_shipment_status_txt", array(), "array");
                        echo "</small></a>
\t\t\t\t\t\t\t\t\t";
                    } elseif ($this->getAttribute(                    // line 292
$context["order"], "transpress_shipment", array(), "array")) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<a href=\"https://www.transpress.bg/bg/e-transpress/shipment-tracking?manifestID=";
                        // line 293
                        echo $this->getAttribute($context["order"], "transpress_shipment", array(), "array");
                        echo "\" target=\"_blank\"><small>";
                        echo $this->getAttribute($context["order"], "transpress_status_id", array(), "array");
                        echo "</small></a>
\t\t\t\t\t\t\t\t\t";
                    } elseif ($this->getAttribute(                    // line 294
$context["order"], "boxnow_shipment", array(), "array")) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<a href=\"https://boxnow.bg/?track=";
                        // line 295
                        echo $this->getAttribute($context["order"], "boxnow_shipment", array(), "array");
                        echo "\" target=\"_blank\"><small>";
                        echo $this->getAttribute($context["order"], "boxnow_status_id", array(), "array");
                        echo "</small></a>
\t\t\t\t\t\t\t\t\t";
                    } elseif ($this->getAttribute(                    // line 296
$context["order"], "next_shipment", array(), "array")) {
                        // line 297
                        echo "\t\t\t\t\t\t\t\t\t\t<a href=\"https://nextlevel.delivery/bg/track?awb=";
                        echo $this->getAttribute($context["order"], "next_shipment", array(), "array");
                        echo "\" target=\"_blank\"><small>";
                        echo $this->getAttribute($context["order"], "next_status_id", array(), "array");
                        echo "</small></a>
\t\t\t\t\t\t\t\t\t";
                    } elseif ($this->getAttribute(                    // line 298
$context["order"], "sameday_shipment", array(), "array")) {
                        // line 299
                        echo "\t\t\t\t\t\t\t\t\t\t<a href=\"https://sameday.bg/#awb=";
                        echo $this->getAttribute($context["order"], "sameday_shipment", array(), "array");
                        echo "\" target=\"_blank\"><small>";
                        echo $this->getAttribute($context["order"], "sameday_status_id", array(), "array");
                        echo "</small></a>
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 301
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        if ($this->getAttribute($context["order"], "free_delivery", array(), "array")) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t<small style=\"color:orange\">БЕЗПЛАТНА ДОСТАВКА</small>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 303
                        echo " 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                        // line 305
                        if (($this->getAttribute($context["order"], "econt_sms", array(), "array") == 1)) {
                            echo " 
\t\t\t\t\t\t\t\t\t\t\t<br><small style=\"color:red\">Желае SMS</small>
\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 308
                        echo "\t\t\t\t\t\t\t\t\t";
                    }
                    echo " 
\t\t\t\t\t\t\t\t\t";
                    // line 309
                    if (($this->getAttribute($context["order"], "econt_pay", array(), "array", true, true) && ($this->getAttribute($context["order"], "econt_pay", array(), "array") != "0"))) {
                        echo " 
\t\t\t\t\t\t\t\t\t\t<br><small style=\"color:red\">Има блкирана сума</small>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 312
                    echo "\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t";
                }
                // line 314
                echo "\t\t\t\t
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 317
            echo "                ";
        } else {
            // line 318
            echo "                <tr>
                  <td class=\"text-center\" colspan=\"8\">";
            // line 319
            echo (isset($context["text_no_results"]) ? $context["text_no_results"] : null);
            echo "</td>
                </tr>
                ";
        }
        // line 322
        echo "                  </tbody>
                
              </table>
            </div>
          </form>
          <div class=\"row\">
            <div class=\"col-sm-6 text-left\">";
        // line 328
        echo (isset($context["pagination"]) ? $context["pagination"] : null);
        echo "</div>
            <div class=\"col-sm-6 text-right\">";
        // line 329
        echo (isset($context["results"]) ? $context["results"] : null);
        echo "</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type=\"text/javascript\"><!--
\$('#button-filter').on('click', function() {
\turl = '';

\tvar filter_order_id = \$('input[name=\\'filter_order_id\\']').val();

\tif (filter_order_id) {
\t\turl += '&filter_order_id=' + encodeURIComponent(filter_order_id);
\t}

\tvar filter_customer = \$('input[name=\\'filter_customer\\']').val();

\tif (filter_customer) {
\t\turl += '&filter_customer=' + encodeURIComponent(filter_customer);
\t}

\tvar filter_order_status_id = \$('select[name=\\'filter_order_status_id\\']').val();

\tif (filter_order_status_id !== '') {
\t\turl += '&filter_order_status_id=' + encodeURIComponent(filter_order_status_id);
\t}

\tvar filter_total = \$('input[name=\\'filter_total\\']').val();

\tif (filter_total) {
\t\turl += '&filter_total=' + encodeURIComponent(filter_total);
\t}

\tvar filter_date_added = \$('input[name=\\'filter_date_added\\']').val();

\tif (filter_date_added) {
\t\turl += '&filter_date_added=' + encodeURIComponent(filter_date_added);
\t}

\tvar filter_date_modified = \$('input[name=\\'filter_date_modified\\']').val();

\tif (filter_date_modified) {
\t\turl += '&filter_date_modified=' + encodeURIComponent(filter_date_modified);
\t}

\tlocation = 'index.php?route=sale/order&user_token=";
        // line 375
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "' + url;
});
//--></script> 
  <script type=\"text/javascript\"><!--
\$('input[name=\\'filter_customer\\']').autocomplete({
\t'source': function(request, response) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=customer/customer/autocomplete&user_token=";
        // line 382
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&filter_name=' +  encodeURIComponent(request),
\t\t\tdataType: 'json',
\t\t\tsuccess: function(json) {
\t\t\t\tresponse(\$.map(json, function(item) {
\t\t\t\t\treturn {
\t\t\t\t\t\tlabel: item['name'],
\t\t\t\t\t\tvalue: item['customer_id']
\t\t\t\t\t}
\t\t\t\t}));
\t\t\t}
\t\t});
\t},
\t'select': function(item) {
\t\t\$('input[name=\\'filter_customer\\']').val(item['label']);
\t}
});
//--></script> 
  <script type=\"text/javascript\"><!--
\$('input[name^=\\'selected\\']').on('change', function() {
\t\$('#button-shipping, #button-invoice').prop('disabled', true);

\tvar selected = \$('input[name^=\\'selected\\']:checked');

\tif (selected.length) {
\t\t\$('#button-invoice').prop('disabled', false);
\t}

\tfor (i = 0; i < selected.length; i++) {
\t\tif (\$(selected[i]).parent().find('input[name^=\\'shipping_code\\']').val()) {
\t\t\t\$('#button-shipping').prop('disabled', false);

\t\t\tbreak;
\t\t}
\t}
});

\$('#button-shipping, #button-invoice').prop('disabled', true);

\$('input[name^=\\'selected\\']:first').trigger('change');

// IE and Edge fix!
\$('#button-shipping, #button-invoice').on('click', function(e) {
\t\$('#form-order').attr('action', this.getAttribute('formAction'));
});

\$('#form-order li:last-child a').on('click', function(e) {
\te.preventDefault();
\t
\tvar element = this;
\t
\tif (confirm('";
        // line 432
        echo (isset($context["text_confirm"]) ? $context["text_confirm"] : null);
        echo "')) {
\t\t\$.ajax({
\t\t\turl: '";
        // line 434
        echo (isset($context["catalog"]) ? $context["catalog"] : null);
        echo "index.php?route=api/order/delete&api_token=";
        echo (isset($context["api_token"]) ? $context["api_token"] : null);
        echo "&store_id=";
        echo (isset($context["store_id"]) ? $context["store_id"] : null);
        echo "&order_id=' + \$(element).attr('href'),
\t\t\tdataType: 'json',
\t\t\tbeforeSend: function() {
\t\t\t\t\$(element).parent().parent().parent().find('button').button('loading');
\t\t\t},
\t\t\tcomplete: function() {
\t\t\t\t\$(element).parent().parent().parent().find('button').button('reset');
\t\t\t},
\t\t\tsuccess: function(json) {
\t\t\t\t\$('.alert-dismissible').remove();
\t
\t\t\t\tif (json['error']) {
\t\t\t\t\t\$('#content > .container-fluid').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
\t\t\t\t}
\t
\t\t\t\tif (json['success']) {
\t\t\t\t\tlocation = '";
        // line 450
        echo (isset($context["delete"]) ? $context["delete"] : null);
        echo "';
\t\t\t\t}
\t\t\t},
\t\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t\t}
\t\t});
\t}
});
//--></script> 
  <script src=\"view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js\" type=\"text/javascript\"></script>
  <link href=\"view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css\" type=\"text/css\" rel=\"stylesheet\" media=\"screen\" />
  <script type=\"text/javascript\"><!--
\$('.date').datetimepicker({
\tlanguage: '";
        // line 464
        echo (isset($context["datepicker"]) ? $context["datepicker"] : null);
        echo "',
\tpickTime: false
});
//--></script></div>

\t\t\t<script>
\t\t\t\$('.tk_button_delete_shipping').click(function(event) {
\t\t\t\treturn confirm('";
        // line 471
        echo (isset($context["text_confirm"]) ? $context["text_confirm"] : null);
        echo "');
\t\t\t});

\t\t\t\$(function(\$) {
\t\t\t\t\$('.update_tk_boxnow_shipment').click(function(event) {
\t\t\t\t\tevent.preventDefault();
\t\t\t\t\tevent.stopPropagation();
\t\t\t\t\t\$('.tk_all_spin').html(' <i class=\"fa fa-spinner fa-pulse fa-fw\"></i>');
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\turl: 'index.php?route=sale/tk_boxnow/update&user_token=";
        // line 480
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\tsuccess: function(html) {
\t\t\t\t\t\t\t\$('.tk_all_spin').html(' ');
\t\t\t\t\t\t\tif(html.error) {
\t\t\t\t\t\t\t\talert(html.error);
\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\tlocation.reload();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t});

\t\t\t\t\$('.update_tk_transpress_shipment').click(function(event) {
\t\t\t\t\tevent.preventDefault();
\t\t\t\t\tevent.stopPropagation();
\t\t\t\t\t\$('.tk_all_spin').html(' <i class=\"fa fa-spinner fa-pulse fa-fw\"></i>');
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\turl: 'index.php?route=sale/tk_transpress/update&user_token=";
        // line 498
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "&status_id=1',
\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\tsuccess: function(html) {
\t\t\t\t\t\t\t\$('.tk_all_spin').html(' ');
\t\t\t\t\t\t\tif(html.error) {
\t\t\t\t\t\t\t\talert(html.error);
\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\tlocation.reload();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t});

\t\t\t\t\$(document).on('click', '#update_tk_next_shipment', function (event) {
\t\t\t\t\tevent.preventDefault();
\t\t\t\t\tevent.stopPropagation();
\t\t\t\t\tupdate_tk_next_shipment(";
        // line 514
        echo (isset($context["tk_next_loadings_count"]) ? $context["tk_next_loadings_count"] : null);
        echo ");
\t\t\t\t});

\t\t\t\tfunction update_tk_next_shipment(count) {
\t\t\t\t\t\$('.tk_all_spin').html(' <i class=\"fa fa-spinner fa-pulse fa-fw\"></i> ' + count);
\t\t\t\t\t\$('#update_tk_next_shipment').prop('disabled', true);
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\turl: 'index.php?route=sale/tk_next/update&user_token=";
        // line 521
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\t\t\t\ttype: 'POST',
\t\t\t\t\t\tdata: 'count=' + count,
\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\tcache: false,
\t\t\t\t\t\tsuccess: function (data) {
\t\t\t\t\t\t\tif (data['redirect']) {
\t\t\t\t\t\t\t\tlocation.reload();
\t\t\t\t\t\t\t} else if (data['count']) {
\t\t\t\t\t\t\t\tupdate_tk_next_shipment(data['count']);
\t\t\t\t\t\t\t\t\$('.tk_all_spin').html('<i class=\"fa fa-spinner fa-pulse fa-fw\"></i> ' + data['count'] + ' от ' + data['pages']);
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t}

\t\t\t\t\$(document).on('click', '#update_tk_sameday_shipment', function (event) {
\t\t\t\t\tevent.preventDefault();
\t\t\t\t\tevent.stopPropagation();
\t\t\t\t\tupdate_tk_sameday_shipment(";
        // line 540
        echo (isset($context["tk_sameday_loadings_count"]) ? $context["tk_sameday_loadings_count"] : null);
        echo ");
\t\t\t\t});

\t\t\t\tfunction update_tk_sameday_shipment(count) {
\t\t\t\t\t\$('.tk_all_spin').html(' <i class=\"fa fa-spinner fa-pulse fa-fw\"></i> ' + count);
\t\t\t\t\t\$('#update_tk_sameday_shipment').prop('disabled', true);
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\turl: 'index.php?route=sale/tk_sameday/update&user_token=";
        // line 547
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\t\t\t\ttype: 'POST',
\t\t\t\t\t\tdata: 'count=' + count,
\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\tcache: false,
\t\t\t\t\t\tsuccess: function (data) {
\t\t\t\t\t\t\tif (data['redirect']) {
\t\t\t\t\t\t\t\tlocation.reload();
\t\t\t\t\t\t\t} else if (data['count']) {
\t\t\t\t\t\t\t\tupdate_tk_sameday_shipment(data['count']);
\t\t\t\t\t\t\t\t\$('.tk_all_spin').html('<i class=\"fa fa-spinner fa-pulse fa-fw\"></i> ' + data['count'] + ' от ' + data['pages']);
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t}

\t\t\t\t\$(document).on('click', '#update_tk_speedy_shipment', function (event) {
\t\t\t\t\tevent.preventDefault();
\t\t\t\t\tevent.stopPropagation();
\t\t\t\t\tupdate_tk_speedy_shipment(";
        // line 566
        echo (isset($context["tk_speedy_loadings_count"]) ? $context["tk_speedy_loadings_count"] : null);
        echo ");
\t\t\t\t});

\t\t\t\tfunction update_tk_speedy_shipment(count) {
\t\t\t\t\t\$('.tk_all_spin').html(' <i class=\"fa fa-spinner fa-pulse fa-fw\"></i> ' + count);
\t\t\t\t\t\$('#update_tk_speedy_shipment').prop('disabled', true);
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\turl: 'index.php?route=sale/tk_speedy/update&user_token=";
        // line 573
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\t\t\t\ttype: 'POST',
\t\t\t\t\t\tdata: 'count=' + count,
\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\tcache: false,
\t\t\t\t\t\tsuccess: function (data) {
\t\t\t\t\t\t\tif (data['redirect']) {
\t\t\t\t\t\t\t\tlocation.reload();
\t\t\t\t\t\t\t} else if (data['count']) {
\t\t\t\t\t\t\t\tupdate_tk_speedy_shipment(data['count']);
\t\t\t\t\t\t\t\t\$('.tk_all_spin').html('<i class=\"fa fa-spinner fa-pulse fa-fw\"></i> ' + data['count'] + ' от ' + data['pages']);
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t}

\t\t\t\t\$(document).on('click', '#update_tk_econt_shipment', function (event) {
\t\t\t\t\tevent.preventDefault();
\t\t\t\t\tevent.stopPropagation();
\t\t\t\t\tupdate_tk_econt_shipment(";
        // line 592
        echo (isset($context["tk_econt_loadings_count"]) ? $context["tk_econt_loadings_count"] : null);
        echo ");
\t\t\t\t});

\t\t\t\tfunction update_tk_econt_shipment(count) {
\t\t\t\t\t\$('.tk_all_spin').html(' <i class=\"fa fa-spinner fa-pulse fa-fw\"></i> ' + count);
\t\t\t\t\t\$('#update_tk_econt_shipment').prop('disabled', true);
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\turl: 'index.php?route=sale/tk_econt/update&user_token=";
        // line 599
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
\t\t\t\t\t\ttype: 'POST',
\t\t\t\t\t\tdata: 'count=' + count,
\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\tcache: false,
\t\t\t\t\t\tsuccess: function (data) {
\t\t\t\t\t\t\tif (data['redirect']) {
\t\t\t\t\t\t\t\tlocation.reload();
\t\t\t\t\t\t\t} else if (data['count']) {
\t\t\t\t\t\t\t\tupdate_tk_econt_shipment(data['count']);
\t\t\t\t\t\t\t\t\$('.tk_all_spin').html('<i class=\"fa fa-spinner fa-pulse fa-fw\"></i> ' + data['count'] + ' от ' + data['pages']);
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t}

\t\t\t\t";
        // line 615
        if (((isset($context["shipping_tk_econt_status"]) ? $context["shipping_tk_econt_status"] : null) && (isset($context["shipping_tk_econt_store_kay"]) ? $context["shipping_tk_econt_store_kay"] : null))) {
            // line 616
            echo "\t\t\t\t\t\$('.open_tk_econt_delete_label').click(function(event) {
\t\t\t\t\t\tevent.preventDefault();
\t\t\t\t\t\tevent.stopPropagation();
\t\t\t\t\t\tvar order_id = \$(this).attr('data-order-id');
\t\t\t\t\t\tif (confirm('";
            // line 620
            echo (isset($context["text_confirm"]) ? $context["text_confirm"] : null);
            echo "')) {
\t\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\turl: 'index.php?route=sale/tk_econt/cancel&user_token=";
            // line 622
            echo (isset($context["user_token"]) ? $context["user_token"] : null);
            echo "&order_id=' + order_id + '&status_id=1',
\t\t\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\t\t\tsuccess: function(html) {
\t\t\t\t\t\t\t\t\tif(html.error) {
\t\t\t\t\t\t\t\t\t\talert(html.error);
\t\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\tlocation.reload();
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t});
\t\t\t\t\t\t}
\t\t\t\t\t});

\t\t\t\t\t\$('.send_tk_econt_data').click(function(event) {
\t\t\t\t\t\tevent.preventDefault();
\t\t\t\t\t\tevent.stopPropagation();
\t\t\t\t\t\tvar order_id = \$(this).attr('data-order-id');
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\turl: 'index.php?route=sale/tk_econt/generate&user_token=";
            // line 640
            echo (isset($context["user_token"]) ? $context["user_token"] : null);
            echo "&order_id=' + order_id + '&status_id=1',
\t\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\t\tsuccess: function(html) {
\t\t\t\t\t\t\t\tif(html.error) {
\t\t\t\t\t\t\t\t\talert(html.error);
\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\t\$('#econt_button_on_'+order_id).css('display','none');
\t\t\t\t\t\t\t\t\t\$('#econt_button_send_'+order_id).css('display','inline-block');
\t\t\t\t\t\t\t\t\t\$('#econt_button_of_'+order_id).css('display','none');

\t\t\t\t\t\t\t\t\talert(html.success);
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});
\t\t\t\t\t});
\t\t\t \t
\t\t\t\t\t\$('.open_tk_econt_create_label').click(function(event) {
\t\t\t\t\t\tevent.preventDefault();
\t\t\t\t\t\tevent.stopPropagation();
\t\t\t\t\t\tvar order_id = \$(this).attr('data-order-id');
\t\t\t\t\t\tvar store_id = \$(this).attr('data-store-id');
\t\t\t\t\t\tconst store_kay = [];
\t\t\t\t\t\t ";
            // line 662
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["shipping_tk_econt_store_kay"]) ? $context["shipping_tk_econt_store_kay"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["store_kay"]) {
                // line 663
                echo "\t\t\t\t\t\t\t  store_kay[";
                echo $context["key"];
                echo "] = '";
                echo $context["store_kay"];
                echo "';
\t\t\t\t\t\t ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['store_kay'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 665
            echo "\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\turl: 'index.php?route=sale/tk_econt/generate&user_token=";
            // line 666
            echo (isset($context["user_token"]) ? $context["user_token"] : null);
            echo "&order_id=' + order_id + '&status_id=1',
\t\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\t\tsuccess: function(html) {
\t\t\t\t\t\t\t\tif(html.exist) {
\t\t\t\t\t\t\t\t\tlocation.reload();
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});
\t\t\t\t\t\t\$createLabelWindow.find('iframe').attr('src', '";
            // line 674
            echo (isset($context["delivery_econt_url"]) ? $context["delivery_econt_url"] : null);
            echo "/create_label.php?' + \$.param( {
\t\t\t\t\t\t\t'order_number': order_id,
\t\t\t\t\t\t\t'token': store_kay[store_id]
\t\t\t\t\t\t}));
\t\t\t\t\t\t\$createLabelWindow.modal('show');
\t\t\t\t\t});
\t\t\t 
\t\t\t\t\tvar empty__ = function(thingy) {
\t\t\t\t\t\treturn thingy == 0 || !thingy || (typeof(thingy) === 'object' && \$.isEmptyObject(thingy));
\t\t\t\t\t}
\t\t\t\t\tvar \$createLabelWindow = \$('#tk-econt-delivery-create-label-modal').modal( {
\t\t\t\t\t\t'show': false,
\t\t\t\t\t\t'backdrop': 'static'
\t\t\t\t\t});
\t\t\t 
\t\t\t\t\t\$(window).on('message', function(event) {
\t\t\t\t\t\tif (event['originalEvent']['origin'] != '";
            // line 690
            echo (isset($context["delivery_econt_url"]) ? $context["delivery_econt_url"] : null);
            echo "') return;
\t\t\t\t\t\tvar messageData = event['originalEvent']['data'];
\t\t\t\t\t\tif (!messageData) return;
\t\t\t\t\t\tswitch (messageData['event']) {
\t\t\t\t\t\t\tcase 'cancel':
\t\t\t\t\t\t\t\$createLabelWindow.modal('hide');
\t\t\t\t\t\t\tbreak;
\t\t\t\t\t\t\tcase 'confirm':
\t\t\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\t\t\turl: 'index.php?route=sale/tk_econt/trace&user_token=";
            // line 699
            echo (isset($context["user_token"]) ? $context["user_token"] : null);
            echo "&order_id=' + messageData['orderData']['num'],
\t\t\t\t\t\t\t\t\ttype: 'post',
\t\t\t\t\t\t\t\t\tdata: messageData,
\t\t\t\t\t\t\t\t\tdataType: 'json',
\t\t\t\t\t\t\t\t\tsuccess: function(html) {
\t\t\t\t\t\t\t\t\t\tif(!html.error) {
\t\t\t\t\t\t\t\t\t\t\tif (messageData['printPdf'] === true && !empty__(messageData['shipmentStatus']['pdfURL'])) window.open(messageData['shipmentStatus']['pdfURL'], '_blank');
\t\t\t\t\t\t\t\t\t\t\twindow.location.href = 'index.php?' + \$.param( {
\t\t\t\t\t\t\t\t\t\t\t\t'route': 'sale/order/info',
\t\t\t\t\t\t\t\t\t\t\t\t'user_token': '";
            // line 708
            echo (isset($context["user_token"]) ? $context["user_token"] : null);
            echo "',
\t\t\t\t\t\t\t\t\t\t\t\t'order_id': messageData['orderData']['num']
\t\t\t\t\t\t\t\t\t\t\t})";
            // line 710
            if (array_key_exists("url", $context)) {
                echo "+'";
                echo (isset($context["url"]) ? $context["url"] : null);
                echo "'";
            }
            echo ";
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\tbreak;
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t \t";
        }
        // line 718
        echo "\t\t\t});
\t\t\t</script>

\t\t\t<div id=\"tk-econt-delivery-create-label-modal\" class=\"modal fade\" role=\"dialog\">
\t\t\t\t<div class=\"modal-dialog\">
\t\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
\t\t\t\t\t\t\t<h4 class=\"modal-title\">Достави с Еконт</h4>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t\t<iframe src=\"about:blank\"></iframe>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<style>
\t\t\t\t#tk-econt-delivery-create-label-modal .modal-dialog {width: 96%;}
\t\t\t\t#tk-econt-delivery-create-label-modal .modal-body {padding: 0;}
\t\t\t\t#tk-econt-delivery-create-label-modal iframe {border: 0;width: 100%;height: 87vh;}
\t\t\t\t@media screen and (min-width: 800px) {
\t\t\t\t\t#tk-econt-delivery-create-label-modal .modal-dialog {width: 700px; }
\t\t\t\t }
\t\t\t</style>
\t\t\t\t
";
        // line 744
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "sale/order_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1548 => 744,  1520 => 718,  1505 => 710,  1500 => 708,  1488 => 699,  1476 => 690,  1457 => 674,  1446 => 666,  1443 => 665,  1432 => 663,  1428 => 662,  1403 => 640,  1382 => 622,  1377 => 620,  1371 => 616,  1369 => 615,  1350 => 599,  1340 => 592,  1318 => 573,  1308 => 566,  1286 => 547,  1276 => 540,  1254 => 521,  1244 => 514,  1225 => 498,  1204 => 480,  1192 => 471,  1182 => 464,  1165 => 450,  1142 => 434,  1137 => 432,  1084 => 382,  1074 => 375,  1025 => 329,  1021 => 328,  1013 => 322,  1007 => 319,  1004 => 318,  1001 => 317,  993 => 314,  989 => 312,  983 => 309,  978 => 308,  972 => 305,  968 => 303,  961 => 301,  953 => 299,  951 => 298,  944 => 297,  942 => 296,  936 => 295,  932 => 294,  926 => 293,  922 => 292,  916 => 291,  912 => 290,  906 => 289,  902 => 288,  899 => 287,  895 => 285,  893 => 284,  890 => 283,  888 => 282,  883 => 280,  878 => 278,  873 => 276,  868 => 274,  864 => 272,  861 => 271,  853 => 269,  850 => 268,  844 => 266,  836 => 263,  830 => 262,  827 => 261,  824 => 260,  821 => 259,  818 => 258,  810 => 256,  807 => 255,  801 => 253,  793 => 250,  787 => 249,  784 => 248,  781 => 247,  778 => 246,  775 => 245,  767 => 243,  764 => 242,  761 => 241,  753 => 239,  745 => 237,  742 => 236,  734 => 233,  728 => 232,  725 => 231,  722 => 230,  720 => 229,  715 => 228,  707 => 226,  700 => 224,  692 => 222,  689 => 221,  686 => 220,  678 => 218,  670 => 215,  663 => 213,  657 => 211,  654 => 210,  644 => 207,  636 => 206,  628 => 205,  625 => 204,  615 => 201,  612 => 200,  610 => 199,  601 => 197,  593 => 196,  590 => 195,  587 => 194,  577 => 191,  569 => 190,  566 => 189,  554 => 186,  547 => 184,  544 => 183,  541 => 182,  538 => 181,  536 => 180,  533 => 179,  531 => 178,  520 => 172,  514 => 171,  506 => 168,  501 => 166,  497 => 165,  493 => 164,  489 => 163,  485 => 162,  481 => 161,  476 => 160,  470 => 158,  464 => 156,  462 => 155,  459 => 154,  454 => 153,  452 => 152,  444 => 146,  440 => 144,  436 => 142,  434 => 141,  431 => 140,  427 => 138,  425 => 137,  422 => 136,  416 => 133,  413 => 132,  407 => 129,  404 => 128,  400 => 126,  398 => 125,  395 => 124,  389 => 121,  385 => 119,  383 => 118,  377 => 115,  359 => 114,  341 => 113,  323 => 112,  305 => 111,  287 => 110,  269 => 109,  257 => 100,  246 => 92,  235 => 86,  230 => 84,  219 => 78,  214 => 76,  206 => 73,  202 => 72,  196 => 68,  190 => 67,  182 => 64,  179 => 63,  171 => 60,  168 => 59,  165 => 58,  160 => 57,  154 => 54,  151 => 53,  145 => 50,  142 => 49,  140 => 48,  133 => 44,  125 => 41,  121 => 40,  113 => 37,  109 => 36,  102 => 32,  96 => 28,  88 => 24,  85 => 23,  77 => 19,  75 => 18,  70 => 15,  59 => 13,  55 => 12,  50 => 10,  44 => 9,  38 => 8,  32 => 7,  28 => 6,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/* <div class="page-header">*/
/*   <div class="container-fluid">*/
/*     <div class="pull-right">*/
/*       <button type="button" data-toggle="tooltip" title="{{ button_filter }}" onclick="$('#filter-order').toggleClass('hidden-sm hidden-xs');" class="btn btn-default hidden-md hidden-lg"><i class="fa fa-filter"></i></button>*/
/*       <button type="submit" id="button-shipping" form="form-order" formaction="{{ shipping }}" formtarget="_blank" data-toggle="tooltip" title="{{ button_shipping_print }}" class="btn btn-info"><i class="fa fa-truck"></i></button>*/
/*       <button type="submit" id="button-invoice" form="form-order" formaction="{{ invoice }}" formtarget="_blank" data-toggle="tooltip" title="{{ button_invoice_print }}" class="btn btn-info"><i class="fa fa-print"></i></button>*/
/*       <a href="{{ add }}" data-toggle="tooltip" title="{{ button_add }}" class="btn btn-primary"><i class="fa fa-plus"></i></a> </div>*/
/*     <h1>{{ heading_title }}</h1>*/
/*     <ul class="breadcrumb">*/
/*       {% for breadcrumb in breadcrumbs %}*/
/*       <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*       {% endfor %}*/
/*     </ul>*/
/*   </div>*/
/* </div>*/
/* <div class="container-fluid">{% if error_warning %}*/
/*   <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/*     <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*   </div>*/
/*   {% endif %}*/
/*   {% if success %}*/
/*   <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> {{ success }}*/
/*     <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*   </div>*/
/*   {% endif %}*/
/*   <div class="row">*/
/*     <div id="filter-order" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">*/
/*       <div class="panel panel-default">*/
/*         <div class="panel-heading">*/
/*           <h3 class="panel-title"><i class="fa fa-filter"></i> {{ text_filter }}</h3>*/
/*         </div>*/
/*         <div class="panel-body">*/
/*           <div class="form-group">*/
/*             <label class="control-label" for="input-order-id">{{ entry_order_id }}</label>*/
/*             <input type="text" name="filter_order_id" value="{{ filter_order_id }}" placeholder="{{ entry_order_id }}" id="input-order-id" class="form-control" />*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="control-label" for="input-customer">{{ entry_customer }}</label>*/
/*             <input type="text" name="filter_customer" value="{{ filter_customer }}" placeholder="{{ entry_customer }}" id="input-customer" class="form-control" />*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="control-label" for="input-order-status">{{ entry_order_status }}</label>*/
/*             <select name="filter_order_status_id" id="input-order-status" class="form-control">*/
/*               <option value=""></option>*/
/*               */
/*               {% if filter_order_status_id == '0' %}*/
/*               */
/*               <option value="0" selected="selected">{{ text_missing }}</option>*/
/*               */
/*               {% else %}*/
/*               */
/*               <option value="0">{{ text_missing }}</option>*/
/*               */
/*               {% endif %}*/
/*               {% for order_status in order_statuses %}*/
/*               {% if order_status.order_status_id == filter_order_status_id %}*/
/*               */
/*               <option value="{{ order_status.order_status_id }}" selected="selected">{{ order_status.name }}</option>*/
/*               */
/*               {% else %}*/
/*               */
/*               <option value="{{ order_status.order_status_id }}">{{ order_status.name }}</option>*/
/*               */
/*               {% endif %}*/
/*               {% endfor %}*/
/*             */
/*             </select>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="control-label" for="input-total">{{ entry_total }}</label>*/
/*             <input type="text" name="filter_total" value="{{ filter_total }}" placeholder="{{ entry_total }}" id="input-total" class="form-control" />*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="control-label" for="input-date-added">{{ entry_date_added }}</label>*/
/*             <div class="input-group date">*/
/*               <input type="text" name="filter_date_added" value="{{ filter_date_added }}" placeholder="{{ entry_date_added }}" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control" />*/
/*               <span class="input-group-btn">*/
/*               <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>*/
/*               </span> </div>*/
/*           </div>*/
/*           <div class="form-group">*/
/*             <label class="control-label" for="input-date-modified">{{ entry_date_modified }}</label>*/
/*             <div class="input-group date">*/
/*               <input type="text" name="filter_date_modified" value="{{ filter_date_modified }}" placeholder="{{ entry_date_modified }}" data-date-format="YYYY-MM-DD" id="input-date-modified" class="form-control" />*/
/*               <span class="input-group-btn">*/
/*               <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>*/
/*               </span> </div>*/
/*           </div>*/
/*           <div class="form-group text-right">*/
/*             <button type="button" id="button-filter" class="btn btn-default"><i class="fa fa-filter"></i> {{ button_filter }}</button>*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*     <div class="col-md-9 col-md-pull-3 col-sm-12">*/
/*       <div class="panel panel-default">*/
/*         <div class="panel-heading">*/
/*           <h3 class="panel-title"><i class="fa fa-list"></i> {{ text_list }}</h3>*/
/*         </div>*/
/*         <div class="panel-body">*/
/*           <form method="post" action="" enctype="multipart/form-data" id="form-order">*/
/*             <div class="table-responsive">*/
/*               <table class="table table-bordered table-hover">*/
/*                 <thead>*/
/*                   <tr>*/
/*                     <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>*/
/*                     <td class="text-right">{% if sort == 'o.order_id' %} <a href="{{ sort_order }}" class="{{ order|lower }}">{{ column_order_id }}</a> {% else %} <a href="{{ sort_order }}">{{ column_order_id }}</a> {% endif %}</td>*/
/*                     <td class="text-left">{% if sort == 'customer' %} <a href="{{ sort_customer }}" class="{{ order|lower }}">{{ column_customer }}</a> {% else %} <a href="{{ sort_customer }}">{{ column_customer }}</a> {% endif %}</td>*/
/*                     <td class="text-left">{% if sort == 'order_status' %} <a href="{{ sort_status }}" class="{{ order|lower }}">{{ column_status }}</a> {% else %} <a href="{{ sort_status }}">{{ column_status }}</a> {% endif %}</td>*/
/*                     <td class="text-right">{% if sort == 'o.total' %} <a href="{{ sort_total }}" class="{{ order|lower }}">{{ column_total }}</a> {% else %} <a href="{{ sort_total }}">{{ column_total }}</a> {% endif %}</td>*/
/*                     <td class="text-left">{% if sort == 'o.date_added' %} <a href="{{ sort_date_added }}" class="{{ order|lower }}">{{ column_date_added }}</a> {% else %} <a href="{{ sort_date_added }}">{{ column_date_added }}</a> {% endif %}</td>*/
/*                     <td class="text-left">{% if sort == 'o.date_modified' %} <a href="{{ sort_date_modified }}" class="{{ order|lower }}">{{ column_date_modified }}</a> {% else %} <a href="{{ sort_date_modified }}">{{ column_date_modified }}</a> {% endif %}</td>*/
/*                     <td class="text-right">{{ column_action }}</td>*/
/* */
/* 			*/
/* 				{% if ((shipping_tk_econt_status and shipping_tk_econt_store_kay) or shipping_tk_speedy_status or shipping_tk_transpress_status or shipping_tk_boxnow_status or shipping_tk_next_status or shipping_tk_sameday_status) %}*/
/* 						<td class="text-left" style="min-width: 100px;">Куриери <span class="tk_all_spin"></span></td>*/
/* 						<td class="text-left" style="min-width: 100px;">*/
/* 						{% if ((shipping_tk_econt_status and shipping_tk_econt_store_kay)) %} */
/* 							<button type="button" id="update_tk_econt_shipment" class="btn btn-default" ><img src="view/image/shipping/tk_econt.png" height="15px"> Обнови</button>*/
/* 						{% endif %}*/
/* */
/* 						{% if (shipping_tk_speedy_status) %}*/
/* 							<button type="button" id="update_tk_speedy_shipment" class="btn btn-default" ><img src="view/image/shipping/tk_speedy.png" height="15px"> Обнови</button>*/
/* 						{% endif %}*/
/* 						*/
/* 						{% if (shipping_tk_transpress_status) %} */
/* 							<button class="btn btn-default update_tk_transpress_shipment" onclick="return false;"><img src="view/image/shipping/tk_transpress.png" height="15px"> Обнови</button>*/
/* 						{% endif %}*/
/* 						*/
/* 						{% if (shipping_tk_boxnow_status) %} */
/* 							<button class="btn btn-default update_tk_boxnow_shipment" onclick="return false;"><img src="view/image/shipping/tk_boxnow.png" height="15px"> Обнови</button>*/
/* 						{% endif %}*/
/* */
/* 						{% if (shipping_tk_next_status) %}*/
/* 							<button type="button" id="update_tk_next_shipment" class="btn btn-default" onclick="return false;"><img src="view/image/shipping/tk_next.png" height="15px"> Обнови</button>*/
/* 						{% endif %}*/
/* */
/* 						{% if (shipping_tk_sameday_status) %}*/
/* 							<button type="button" id="update_tk_sameday_shipment" class="btn btn-default" onclick="return false;"><img src="view/image/shipping/tk_sameday.png" height="15px"> Обнови</button>*/
/* 						{% endif %}*/
/* 						</td>*/
/* 				{% endif %}*/
/* 								*/
/* 				*/
/*                   </tr>*/
/*                 </thead>*/
/*                 <tbody>*/
/*                 */
/*                 {% if orders %}*/
/*                 {% for order in orders %}*/
/*                 <tr>*/
/*                   <td class="text-center"> {% if order.order_id in selected %}*/
/*                     <input type="checkbox" name="selected[]" value="{{ order.order_id }}" checked="checked" />*/
/*                     {% else %}*/
/*                     <input type="checkbox" name="selected[]" value="{{ order.order_id }}" />*/
/*                     {% endif %}*/
/*                     <input type="hidden" name="shipping_code[]" value="{{ order.shipping_code }}" /></td>*/
/*                   <td class="text-right">{{ order.order_id }}</td>*/
/*                   <td class="text-left">{{ order.customer }}</td>*/
/*                   <td class="text-left">{{ order.order_status }}</td>*/
/*                   <td class="text-right">{{ order.total }}</td>*/
/*                   <td class="text-left">{{ order.date_added }}</td>*/
/*                   <td class="text-left">{{ order.date_modified }}</td>*/
/*                   <td class="text-right"><div style="min-width: 120px;">*/
/*                       <div class="btn-group"> <a href="{{ order.view }}" data-toggle="tooltip" title="{{ button_view }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>*/
/*                         <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></button>*/
/*                         <ul class="dropdown-menu dropdown-menu-right">*/
/*                           <li><a href="{{ order.edit }}"><i class="fa fa-pencil"></i> {{ button_edit }}</a></li>*/
/*                           <li><a href="{{ order.order_id }}"><i class="fa fa-trash-o"></i> {{ button_delete }}</a></li>*/
/*                         </ul>*/
/*                       </div>*/
/*                     </div></td>*/
/* */
/* */
/* 							{% if ((shipping_tk_econt_status and shipping_tk_econt_store_kay) or shipping_tk_speedy_status or shipping_tk_transpress_status or shipping_tk_boxnow_status or shipping_tk_next_status or shipping_tk_sameday_status) %}*/
/* 								<td class="text-left">*/
/* 									{% if (order['econt_edit'] is defined and order['econt_edit'] != '0') %}*/
/* 										{% if (order['econt_status_id'] == 2) %}*/
/* 											{% if (order['econt_shipment'] != '0') %}*/
/* 											<div class="btn-group"  style="min-width: 150px;">*/
/* 												<a href="{{ order['econt_pdf'] }}" class="btn btn-success" target="_blank" style="padding: 8px 8px;min-width: 110px;"><small>{{ order['econt_shipment'] }}</small></a>*/
/* */
/* 												<button id="econt_button_delete_{{ order['order_id'] }}" class="btn btn-danger open_tk_econt_delete_label" data-order-id="{{ order['order_id'] }}" data-store-id="{{ order['store_id'] }}" data-toggle="tooltip" title="{{ button_delete }}"><i class="fa fa-trash-o"></i></button>*/
/* 											</div>*/
/* 											{% else %}*/
/* 											<div class="btn-group"  style="min-width: 150px;">*/
/* 												<button id="econt_button_send_{{ order['order_id'] }}" class="btn btn-primary open_tk_econt_create_label" data-order-id="{{ order['order_id'] }}" data-store-id="{{ order['store_id'] }}" style="padding: 8px 8px;min-width: 110px;"><small>Товарителница</small></button>*/
/* 												<a style="display: inline-block" id="econt_button_edit_{{ order['order_id'] }}" href="{{ order['econt_edit'] }}" data-toggle="tooltip" title="{{ button_edit }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>*/
/* 											</div>*/
/* 											{% endif %}*/
/* 										{% elseif (order['econt_status_id'] == 1) %}*/
/* 											<div class="btn-group"  style="min-width: 150px;">*/
/* 												<button id="econt_button_send_{{ order['order_id'] }}" class="btn btn-primary open_tk_econt_create_label" data-order-id="{{ order['order_id'] }}" data-store-id="{{ order['store_id'] }}" style="padding: 8px 8px;min-width: 110px;"><small>Товарителница</small></button>*/
/* 												<a style="display: inline-block" id="econt_button_edit_{{ order['order_id'] }}" href="{{ order['econt_edit'] }}" data-toggle="tooltip" title="{{ button_edit }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>*/
/* 											</div>*/
/* 										{% elseif (order['econt_status_id'] == 'admin_order') %}*/
/* 											<div class="btn-group"  style="min-width: 150px;">*/
/* 												<a id="econt_button_edit_{{ order['order_id'] }}" href="{{ order['econt_edit'] }}" data-toggle="tooltip" title="{{ button_edit }}" class="btn btn-primary" style="min-width: 150px;">Редактирай</a>*/
/* 											</div>*/
/* 										{% else %}*/
/* 											<div class="btn-group"  style="min-width: 150px;">*/
/* 												<button id="econt_button_on_{{ order['order_id'] }}" class="btn btn-info send_tk_econt_data" data-order-id="{{ order['order_id'] }}" data-store-id="{{ order['store_id'] }}"  style="padding: 8px 8px;min-width: 110px;"><small>Изпрати</small></button>*/
/* 												<button id="econt_button_send_{{ order['order_id'] }}" class="btn btn-primary open_tk_econt_create_label" style="display: none" data-order-id="{{ order['order_id'] }}" data-store-id="{{ order['store_id'] }}" style="padding: 8px 8px;min-width: 110px;"><small>Товарителница</small></button>*/
/* 												<a style="display: inline-block" id="econt_button_edit_{{ order['order_id'] }}" href="{{ order['econt_edit'] }}" data-toggle="tooltip" title="{{ button_edit }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>*/
/* 											</div>*/
/* 										{% endif %}*/
/* 									{% elseif (order['speedy_edit'] is defined and order['speedy_edit'] != '0') %}*/
/* 										{% if (order['speedy_shipment'] != '0') %} */
/* 											<div class="btn-group"  style="min-width: 150px;">*/
/* 											<a href="{{ order['speedy_pdf'] }}" class="btn btn-success" target="_blank"  style="padding: 8px 8px;min-width: 110px;"><small>{{ order['speedy_shipment'] }}</small></a>*/
/* 										*/
/* 											<a href="{{ order['speedy_cancel'] }}"  id="speedy_button_close_{{ order['order_id'] }}" data-toggle="tooltip" title="Анулирай" class="tk_button_delete_shipping btn btn-danger" data-original-title="Анулирай"><i class="fa fa-trash-o"></i></a>*/
/* 											</div>*/
/* 										{% else %}*/
/* 											<a href="{{ order['speedy_edit'] }}" id="speedy_button_send_{{ order['order_id'] }}" class="btn btn-primary open_tk_speedy_create_label"  style="min-width: 150px;"><small>Товарителница</small></a>*/
/* 										{% endif %}*/
/* 									{% elseif (order['transpress_edit'] is defined and order['transpress_edit'] != '0') %}*/
/* 										{% if (order['transpress_shipment'] != '0') %}*/
/* 											<a href="{{ order['transpress_pdf'] }}" class="btn btn-success" target="_blank">{{ order['transpress_shipment'] }}</a>*/
/* */
/* 											<a href="{{ order['transpress_cancel'] }}"  id="transpress_button_close_{{ order['order_id'] }}" data-toggle="tooltip" title="Анулирай" class="tk_button_delete_shipping btn btn-danger" data-original-title="Анулирай"><i class="fa fa-trash-o"></i></a>*/
/* 										{% else %}*/
/* 											<a href="{{ order['transpress_edit'] }}" id="transpress_button_send_{{ order['order_id'] }}" class="btn btn-primary open_tk_transpress_create_label" style="min-width: 150px;"><small>Товарителница</small></a>*/
/* 										{% endif %}*/
/* 									{% elseif (order['boxnow_status_id'] is defined and order['boxnow_status_id'] != '0') %} */
/* 										{% if (order['boxnow_shipment'] != '0') %}*/
/* 											{% if (order['boxnow_cancel'] != '0') %}*/
/* 												<div class="btn-group"  style="min-width: 150px;">*/
/* 													<a href="{{ order['boxnow_pdf'] }}" class="btn btn-success" target="_blank" style="padding: 8px 8px;min-width: 110px;"><small>{{ order['boxnow_shipment'] }}</small></a>*/
/* 													<a href="{{ order['boxnow_cancel'] }}"  id="boxnow_button_close_{{ order['order_id'] }}" data-toggle="tooltip" title="Анулирай" class="tk_button_delete_shipping btn btn-danger" data-original-title="Анулирай"><i class="fa fa-trash-o"></i></a>*/
/* 												</div>*/
/* 											{% else %}*/
/*                                                 {% if (order['boxnow_status_id'] == 'Откзана от подател') %}*/
/*                                                     <a href="{{ order['boxnow_edit'] }}" id="boxnow_button_send_{{ order['order_id'] }}" class="btn btn-primary open_tk_boxnow_create_label" style="min-width: 150px;"><small>Товарителница</small></a>*/
/*                                                 {% else %}*/
/* 												    <a href="{{ order['boxnow_pdf'] }}" class="btn btn-success" target="_blank" style="min-width: 150px;"><small>{{ order['boxnow_shipment'] }}</small></a>*/
/* 												{% endif %}*/
/* 											{% endif %}*/
/* 										{% else %}*/
/* 											<a href="{{ order['boxnow_edit'] }}" id="boxnow_button_send_{{ order['order_id'] }}" class="btn btn-primary open_tk_boxnow_create_label" style="min-width: 150px;"><small>Товарителница</small></a>*/
/* 										{% endif %}*/
/* 									{% elseif (order['next_status_id'] is defined and order['next_status_id'] != '0') %}*/
/* 										{% if (order['next_shipment'] != '0') %}*/
/* 											{% if (order['next_cancel'] != '0') %}*/
/* 												<div class="btn-group"  style="min-width: 150px;">*/
/* 													<a href="{{ order['next_pdf'] }}" class="btn btn-success" target="_blank" style="padding: 8px 8px;min-width: 110px;"><small>{{ order['next_shipment'] }}</small></a>*/
/* 													<a href="{{ order['next_cancel'] }}"  id="next_button_close_{{ order['order_id'] }}" data-toggle="tooltip" title="Анулирай" class="tk_button_delete_shipping btn btn-danger" data-original-title="Анулирай"><i class="fa fa-trash-o"></i></a>*/
/* 												</div>*/
/* 											{% else %}*/
/* 												<a href="<?php echo $order['next_pdf']; ?>" class="btn btn-success" target="_blank" style="min-width: 150px;"><small>{{ order['next_shipment'] }}</small></a>*/
/* 											{% endif %}*/
/* 										{% else %}*/
/* 											<a href="{{ order['next_edit'] }}" id="next_button_send_{{ order['order_id'] }}" class="btn btn-primary open_tk_next_create_label" style="min-width: 150px;"><small>Товарителница</small></a>*/
/* 										{% endif %}*/
/* 									{% elseif (order['sameday_status_id'] is defined and order['sameday_status_id'] != '0') %}*/
/* 										{% if (order['sameday_shipment'] != '0') %}*/
/* 											{% if (order['sameday_cancel'] != '0') %}*/
/* 												<div class="btn-group"  style="min-width: 150px;">*/
/* 													<a href="{{ order['sameday_pdf'] }}" class="btn btn-success" target="_blank" style="padding: 8px 8px;min-width: 110px;"><small>{{ order['sameday_shipment'] }}</small></a>*/
/* 													<a href="{{ order['sameday_cancel'] }}"  id="sameday_button_close_{{ order['order_id'] }}" data-toggle="tooltip" title="Анулирай" class="tk_button_delete_shipping btn btn-danger" data-original-title="Анулирай"><i class="fa fa-trash-o"></i></a>*/
/* 												</div>*/
/* 											{% else %}*/
/* 												<a href="<?php echo $order['sameday_pdf']; ?>" class="btn btn-success" target="_blank" style="min-width: 150px;"><small>{{ order['sameday_shipment'] }}</small></a>*/
/* 											{% endif %}*/
/* 										{% else %}*/
/* 											<a href="{{ order['sameday_edit'] }}" id="sameday_button_send_{{ order['order_id'] }}" class="btn btn-primary open_tk_sameday_create_label" style="min-width: 150px;"><small>Товарителница</small></a>*/
/* 										{% endif %}*/
/* 									{% endif %}*/
/* 								</td>*/
/* 								<td class="text-left">*/
/* 									{% if (order['econt_edit'] is defined and order['econt_edit'] != '0') %} */
/* 										<img src="view/image/shipping/tk_econt.png">*/
/* 									{% elseif (order['speedy_edit'] is defined and order['speedy_edit'] != '0') %} */
/* 										<img src="view/image/shipping/tk_speedy.png">*/
/* 									{% elseif (order['transpress_edit'] is defined and order['transpress_edit'] != '0') %} */
/* 										<img src="view/image/shipping/tk_transpress.png">*/
/* 									{% elseif (order['boxnow_status_id'] is defined and order['boxnow_status_id'] != '0') %} */
/* 										<img src="view/image/shipping/tk_boxnow.png">*/
/* 									{% elseif (order['next_status_id'] is defined and order['next_status_id'] != '0') %}*/
/* 										<img src="view/image/shipping/tk_next.png">*/
/* 									{% elseif (order['sameday_status_id'] is defined and order['sameday_status_id'] != '0') %}*/
/* 										<img src="view/image/shipping/tk_sameday.png">*/
/* 									{% endif %}*/
/* 									*/
/* 									{% if (order['econt_shipment'] != 0) %} */
/* 										<a href="https://www.econt.com/services/track-shipment/{{ order['econt_shipment'] }}" target="_blank"><small>{{ order['econt_shipment_status_txt'] }}</small></a>*/
/* 									{% elseif (order['speedy_shipment'] != 0) %} */
/* 										<a href="https://www.speedy.bg/bg/track-shipment?shipmentNumber={{ order['speedy_shipment'] }}" target="_blank"><small>{{ order['speedy_shipment_status_txt'] }}</small></a>*/
/* 									{% elseif (order['transpress_shipment']) %} */
/* 										<a href="https://www.transpress.bg/bg/e-transpress/shipment-tracking?manifestID={{ order['transpress_shipment'] }}" target="_blank"><small>{{ order['transpress_status_id'] }}</small></a>*/
/* 									{% elseif (order['boxnow_shipment']) %} */
/* 										<a href="https://boxnow.bg/?track={{ order['boxnow_shipment'] }}" target="_blank"><small>{{ order['boxnow_status_id'] }}</small></a>*/
/* 									{% elseif (order['next_shipment']) %}*/
/* 										<a href="https://nextlevel.delivery/bg/track?awb={{ order['next_shipment'] }}" target="_blank"><small>{{ order['next_status_id'] }}</small></a>*/
/* 									{% elseif (order['sameday_shipment']) %}*/
/* 										<a href="https://sameday.bg/#awb={{ order['sameday_shipment'] }}" target="_blank"><small>{{ order['sameday_status_id'] }}</small></a>*/
/* 									{% else %}*/
/* 										{% if (order['free_delivery']) %} */
/* 											<small style="color:orange">БЕЗПЛАТНА ДОСТАВКА</small>*/
/* 										{% endif %} */
/* 										*/
/* 										{% if (order['econt_sms'] == 1) %} */
/* 											<br><small style="color:red">Желае SMS</small>*/
/* 										{% endif %}*/
/* 									{% endif %} */
/* 									{% if (order['econt_pay'] is defined and order['econt_pay'] != '0') %} */
/* 										<br><small style="color:red">Има блкирана сума</small>*/
/* 									{% endif %}*/
/* 								</td>*/
/* 								{% endif %}*/
/* 				*/
/*                 </tr>*/
/*                 {% endfor %}*/
/*                 {% else %}*/
/*                 <tr>*/
/*                   <td class="text-center" colspan="8">{{ text_no_results }}</td>*/
/*                 </tr>*/
/*                 {% endif %}*/
/*                   </tbody>*/
/*                 */
/*               </table>*/
/*             </div>*/
/*           </form>*/
/*           <div class="row">*/
/*             <div class="col-sm-6 text-left">{{ pagination }}</div>*/
/*             <div class="col-sm-6 text-right">{{ results }}</div>*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   <script type="text/javascript"><!--*/
/* $('#button-filter').on('click', function() {*/
/* 	url = '';*/
/* */
/* 	var filter_order_id = $('input[name=\'filter_order_id\']').val();*/
/* */
/* 	if (filter_order_id) {*/
/* 		url += '&filter_order_id=' + encodeURIComponent(filter_order_id);*/
/* 	}*/
/* */
/* 	var filter_customer = $('input[name=\'filter_customer\']').val();*/
/* */
/* 	if (filter_customer) {*/
/* 		url += '&filter_customer=' + encodeURIComponent(filter_customer);*/
/* 	}*/
/* */
/* 	var filter_order_status_id = $('select[name=\'filter_order_status_id\']').val();*/
/* */
/* 	if (filter_order_status_id !== '') {*/
/* 		url += '&filter_order_status_id=' + encodeURIComponent(filter_order_status_id);*/
/* 	}*/
/* */
/* 	var filter_total = $('input[name=\'filter_total\']').val();*/
/* */
/* 	if (filter_total) {*/
/* 		url += '&filter_total=' + encodeURIComponent(filter_total);*/
/* 	}*/
/* */
/* 	var filter_date_added = $('input[name=\'filter_date_added\']').val();*/
/* */
/* 	if (filter_date_added) {*/
/* 		url += '&filter_date_added=' + encodeURIComponent(filter_date_added);*/
/* 	}*/
/* */
/* 	var filter_date_modified = $('input[name=\'filter_date_modified\']').val();*/
/* */
/* 	if (filter_date_modified) {*/
/* 		url += '&filter_date_modified=' + encodeURIComponent(filter_date_modified);*/
/* 	}*/
/* */
/* 	location = 'index.php?route=sale/order&user_token={{ user_token }}' + url;*/
/* });*/
/* //--></script> */
/*   <script type="text/javascript"><!--*/
/* $('input[name=\'filter_customer\']').autocomplete({*/
/* 	'source': function(request, response) {*/
/* 		$.ajax({*/
/* 			url: 'index.php?route=customer/customer/autocomplete&user_token={{ user_token }}&filter_name=' +  encodeURIComponent(request),*/
/* 			dataType: 'json',*/
/* 			success: function(json) {*/
/* 				response($.map(json, function(item) {*/
/* 					return {*/
/* 						label: item['name'],*/
/* 						value: item['customer_id']*/
/* 					}*/
/* 				}));*/
/* 			}*/
/* 		});*/
/* 	},*/
/* 	'select': function(item) {*/
/* 		$('input[name=\'filter_customer\']').val(item['label']);*/
/* 	}*/
/* });*/
/* //--></script> */
/*   <script type="text/javascript"><!--*/
/* $('input[name^=\'selected\']').on('change', function() {*/
/* 	$('#button-shipping, #button-invoice').prop('disabled', true);*/
/* */
/* 	var selected = $('input[name^=\'selected\']:checked');*/
/* */
/* 	if (selected.length) {*/
/* 		$('#button-invoice').prop('disabled', false);*/
/* 	}*/
/* */
/* 	for (i = 0; i < selected.length; i++) {*/
/* 		if ($(selected[i]).parent().find('input[name^=\'shipping_code\']').val()) {*/
/* 			$('#button-shipping').prop('disabled', false);*/
/* */
/* 			break;*/
/* 		}*/
/* 	}*/
/* });*/
/* */
/* $('#button-shipping, #button-invoice').prop('disabled', true);*/
/* */
/* $('input[name^=\'selected\']:first').trigger('change');*/
/* */
/* // IE and Edge fix!*/
/* $('#button-shipping, #button-invoice').on('click', function(e) {*/
/* 	$('#form-order').attr('action', this.getAttribute('formAction'));*/
/* });*/
/* */
/* $('#form-order li:last-child a').on('click', function(e) {*/
/* 	e.preventDefault();*/
/* 	*/
/* 	var element = this;*/
/* 	*/
/* 	if (confirm('{{ text_confirm }}')) {*/
/* 		$.ajax({*/
/* 			url: '{{ catalog }}index.php?route=api/order/delete&api_token={{ api_token }}&store_id={{ store_id }}&order_id=' + $(element).attr('href'),*/
/* 			dataType: 'json',*/
/* 			beforeSend: function() {*/
/* 				$(element).parent().parent().parent().find('button').button('loading');*/
/* 			},*/
/* 			complete: function() {*/
/* 				$(element).parent().parent().parent().find('button').button('reset');*/
/* 			},*/
/* 			success: function(json) {*/
/* 				$('.alert-dismissible').remove();*/
/* 	*/
/* 				if (json['error']) {*/
/* 					$('#content > .container-fluid').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');*/
/* 				}*/
/* 	*/
/* 				if (json['success']) {*/
/* 					location = '{{ delete }}';*/
/* 				}*/
/* 			},*/
/* 			error: function(xhr, ajaxOptions, thrownError) {*/
/* 				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 			}*/
/* 		});*/
/* 	}*/
/* });*/
/* //--></script> */
/*   <script src="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>*/
/*   <link href="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />*/
/*   <script type="text/javascript"><!--*/
/* $('.date').datetimepicker({*/
/* 	language: '{{ datepicker }}',*/
/* 	pickTime: false*/
/* });*/
/* //--></script></div>*/
/* */
/* 			<script>*/
/* 			$('.tk_button_delete_shipping').click(function(event) {*/
/* 				return confirm('{{ text_confirm }}');*/
/* 			});*/
/* */
/* 			$(function($) {*/
/* 				$('.update_tk_boxnow_shipment').click(function(event) {*/
/* 					event.preventDefault();*/
/* 					event.stopPropagation();*/
/* 					$('.tk_all_spin').html(' <i class="fa fa-spinner fa-pulse fa-fw"></i>');*/
/* 					$.ajax({*/
/* 						url: 'index.php?route=sale/tk_boxnow/update&user_token={{ user_token }}',*/
/* 						dataType: 'json',*/
/* 						success: function(html) {*/
/* 							$('.tk_all_spin').html(' ');*/
/* 							if(html.error) {*/
/* 								alert(html.error);*/
/* 							} else {*/
/* 								location.reload();*/
/* 							}*/
/* 						}*/
/* 					});*/
/* 				});*/
/* */
/* 				$('.update_tk_transpress_shipment').click(function(event) {*/
/* 					event.preventDefault();*/
/* 					event.stopPropagation();*/
/* 					$('.tk_all_spin').html(' <i class="fa fa-spinner fa-pulse fa-fw"></i>');*/
/* 					$.ajax({*/
/* 						url: 'index.php?route=sale/tk_transpress/update&user_token={{ user_token }}&status_id=1',*/
/* 						dataType: 'json',*/
/* 						success: function(html) {*/
/* 							$('.tk_all_spin').html(' ');*/
/* 							if(html.error) {*/
/* 								alert(html.error);*/
/* 							} else {*/
/* 								location.reload();*/
/* 							}*/
/* 						}*/
/* 					});*/
/* 				});*/
/* */
/* 				$(document).on('click', '#update_tk_next_shipment', function (event) {*/
/* 					event.preventDefault();*/
/* 					event.stopPropagation();*/
/* 					update_tk_next_shipment({{ tk_next_loadings_count }});*/
/* 				});*/
/* */
/* 				function update_tk_next_shipment(count) {*/
/* 					$('.tk_all_spin').html(' <i class="fa fa-spinner fa-pulse fa-fw"></i> ' + count);*/
/* 					$('#update_tk_next_shipment').prop('disabled', true);*/
/* 					$.ajax({*/
/* 						url: 'index.php?route=sale/tk_next/update&user_token={{ user_token }}',*/
/* 						type: 'POST',*/
/* 						data: 'count=' + count,*/
/* 						dataType: 'json',*/
/* 						cache: false,*/
/* 						success: function (data) {*/
/* 							if (data['redirect']) {*/
/* 								location.reload();*/
/* 							} else if (data['count']) {*/
/* 								update_tk_next_shipment(data['count']);*/
/* 								$('.tk_all_spin').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> ' + data['count'] + ' от ' + data['pages']);*/
/* 							}*/
/* 						}*/
/* 					});*/
/* 				}*/
/* */
/* 				$(document).on('click', '#update_tk_sameday_shipment', function (event) {*/
/* 					event.preventDefault();*/
/* 					event.stopPropagation();*/
/* 					update_tk_sameday_shipment({{ tk_sameday_loadings_count }});*/
/* 				});*/
/* */
/* 				function update_tk_sameday_shipment(count) {*/
/* 					$('.tk_all_spin').html(' <i class="fa fa-spinner fa-pulse fa-fw"></i> ' + count);*/
/* 					$('#update_tk_sameday_shipment').prop('disabled', true);*/
/* 					$.ajax({*/
/* 						url: 'index.php?route=sale/tk_sameday/update&user_token={{ user_token }}',*/
/* 						type: 'POST',*/
/* 						data: 'count=' + count,*/
/* 						dataType: 'json',*/
/* 						cache: false,*/
/* 						success: function (data) {*/
/* 							if (data['redirect']) {*/
/* 								location.reload();*/
/* 							} else if (data['count']) {*/
/* 								update_tk_sameday_shipment(data['count']);*/
/* 								$('.tk_all_spin').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> ' + data['count'] + ' от ' + data['pages']);*/
/* 							}*/
/* 						}*/
/* 					});*/
/* 				}*/
/* */
/* 				$(document).on('click', '#update_tk_speedy_shipment', function (event) {*/
/* 					event.preventDefault();*/
/* 					event.stopPropagation();*/
/* 					update_tk_speedy_shipment({{ tk_speedy_loadings_count }});*/
/* 				});*/
/* */
/* 				function update_tk_speedy_shipment(count) {*/
/* 					$('.tk_all_spin').html(' <i class="fa fa-spinner fa-pulse fa-fw"></i> ' + count);*/
/* 					$('#update_tk_speedy_shipment').prop('disabled', true);*/
/* 					$.ajax({*/
/* 						url: 'index.php?route=sale/tk_speedy/update&user_token={{ user_token }}',*/
/* 						type: 'POST',*/
/* 						data: 'count=' + count,*/
/* 						dataType: 'json',*/
/* 						cache: false,*/
/* 						success: function (data) {*/
/* 							if (data['redirect']) {*/
/* 								location.reload();*/
/* 							} else if (data['count']) {*/
/* 								update_tk_speedy_shipment(data['count']);*/
/* 								$('.tk_all_spin').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> ' + data['count'] + ' от ' + data['pages']);*/
/* 							}*/
/* 						}*/
/* 					});*/
/* 				}*/
/* */
/* 				$(document).on('click', '#update_tk_econt_shipment', function (event) {*/
/* 					event.preventDefault();*/
/* 					event.stopPropagation();*/
/* 					update_tk_econt_shipment({{ tk_econt_loadings_count }});*/
/* 				});*/
/* */
/* 				function update_tk_econt_shipment(count) {*/
/* 					$('.tk_all_spin').html(' <i class="fa fa-spinner fa-pulse fa-fw"></i> ' + count);*/
/* 					$('#update_tk_econt_shipment').prop('disabled', true);*/
/* 					$.ajax({*/
/* 						url: 'index.php?route=sale/tk_econt/update&user_token={{ user_token }}',*/
/* 						type: 'POST',*/
/* 						data: 'count=' + count,*/
/* 						dataType: 'json',*/
/* 						cache: false,*/
/* 						success: function (data) {*/
/* 							if (data['redirect']) {*/
/* 								location.reload();*/
/* 							} else if (data['count']) {*/
/* 								update_tk_econt_shipment(data['count']);*/
/* 								$('.tk_all_spin').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> ' + data['count'] + ' от ' + data['pages']);*/
/* 							}*/
/* 						}*/
/* 					});*/
/* 				}*/
/* */
/* 				{% if ((shipping_tk_econt_status and shipping_tk_econt_store_kay)) %}*/
/* 					$('.open_tk_econt_delete_label').click(function(event) {*/
/* 						event.preventDefault();*/
/* 						event.stopPropagation();*/
/* 						var order_id = $(this).attr('data-order-id');*/
/* 						if (confirm('{{ text_confirm }}')) {*/
/* 							$.ajax({*/
/* 								url: 'index.php?route=sale/tk_econt/cancel&user_token={{ user_token }}&order_id=' + order_id + '&status_id=1',*/
/* 								dataType: 'json',*/
/* 								success: function(html) {*/
/* 									if(html.error) {*/
/* 										alert(html.error);*/
/* 									} else {*/
/* 										location.reload();*/
/* 									}*/
/* 								}*/
/* 							});*/
/* 						}*/
/* 					});*/
/* */
/* 					$('.send_tk_econt_data').click(function(event) {*/
/* 						event.preventDefault();*/
/* 						event.stopPropagation();*/
/* 						var order_id = $(this).attr('data-order-id');*/
/* 						$.ajax({*/
/* 							url: 'index.php?route=sale/tk_econt/generate&user_token={{ user_token }}&order_id=' + order_id + '&status_id=1',*/
/* 							dataType: 'json',*/
/* 							success: function(html) {*/
/* 								if(html.error) {*/
/* 									alert(html.error);*/
/* 								} else {*/
/* 									$('#econt_button_on_'+order_id).css('display','none');*/
/* 									$('#econt_button_send_'+order_id).css('display','inline-block');*/
/* 									$('#econt_button_of_'+order_id).css('display','none');*/
/* */
/* 									alert(html.success);*/
/* 								}*/
/* 							}*/
/* 						});*/
/* 					});*/
/* 			 	*/
/* 					$('.open_tk_econt_create_label').click(function(event) {*/
/* 						event.preventDefault();*/
/* 						event.stopPropagation();*/
/* 						var order_id = $(this).attr('data-order-id');*/
/* 						var store_id = $(this).attr('data-store-id');*/
/* 						const store_kay = [];*/
/* 						 {% for key,store_kay in shipping_tk_econt_store_kay %}*/
/* 							  store_kay[{{ key }}] = '{{ store_kay }}';*/
/* 						 {% endfor %}*/
/* 						$.ajax({*/
/* 							url: 'index.php?route=sale/tk_econt/generate&user_token={{ user_token }}&order_id=' + order_id + '&status_id=1',*/
/* 							dataType: 'json',*/
/* 							success: function(html) {*/
/* 								if(html.exist) {*/
/* 									location.reload();*/
/* 								}*/
/* 							}*/
/* 						});*/
/* 						$createLabelWindow.find('iframe').attr('src', '{{ delivery_econt_url }}/create_label.php?' + $.param( {*/
/* 							'order_number': order_id,*/
/* 							'token': store_kay[store_id]*/
/* 						}));*/
/* 						$createLabelWindow.modal('show');*/
/* 					});*/
/* 			 */
/* 					var empty__ = function(thingy) {*/
/* 						return thingy == 0 || !thingy || (typeof(thingy) === 'object' && $.isEmptyObject(thingy));*/
/* 					}*/
/* 					var $createLabelWindow = $('#tk-econt-delivery-create-label-modal').modal( {*/
/* 						'show': false,*/
/* 						'backdrop': 'static'*/
/* 					});*/
/* 			 */
/* 					$(window).on('message', function(event) {*/
/* 						if (event['originalEvent']['origin'] != '{{ delivery_econt_url }}') return;*/
/* 						var messageData = event['originalEvent']['data'];*/
/* 						if (!messageData) return;*/
/* 						switch (messageData['event']) {*/
/* 							case 'cancel':*/
/* 							$createLabelWindow.modal('hide');*/
/* 							break;*/
/* 							case 'confirm':*/
/* 								$.ajax({*/
/* 									url: 'index.php?route=sale/tk_econt/trace&user_token={{ user_token }}&order_id=' + messageData['orderData']['num'],*/
/* 									type: 'post',*/
/* 									data: messageData,*/
/* 									dataType: 'json',*/
/* 									success: function(html) {*/
/* 										if(!html.error) {*/
/* 											if (messageData['printPdf'] === true && !empty__(messageData['shipmentStatus']['pdfURL'])) window.open(messageData['shipmentStatus']['pdfURL'], '_blank');*/
/* 											window.location.href = 'index.php?' + $.param( {*/
/* 												'route': 'sale/order/info',*/
/* 												'user_token': '{{ user_token }}',*/
/* 												'order_id': messageData['orderData']['num']*/
/* 											}){% if url is defined %}+'{{ url }}'{% endif %};*/
/* 										}*/
/* 									}*/
/* 								});*/
/* 							break;*/
/* 						}*/
/* 					});*/
/* 			 	{% endif %}*/
/* 			});*/
/* 			</script>*/
/* */
/* 			<div id="tk-econt-delivery-create-label-modal" class="modal fade" role="dialog">*/
/* 				<div class="modal-dialog">*/
/* 					<div class="modal-content">*/
/* 						<div class="modal-header">*/
/* 							<button type="button" class="close" data-dismiss="modal">&times;</button>*/
/* 							<h4 class="modal-title">Достави с Еконт</h4>*/
/* 						</div>*/
/* 						<div class="modal-body">*/
/* 							<iframe src="about:blank"></iframe>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* */
/* 			<style>*/
/* 				#tk-econt-delivery-create-label-modal .modal-dialog {width: 96%;}*/
/* 				#tk-econt-delivery-create-label-modal .modal-body {padding: 0;}*/
/* 				#tk-econt-delivery-create-label-modal iframe {border: 0;width: 100%;height: 87vh;}*/
/* 				@media screen and (min-width: 800px) {*/
/* 					#tk-econt-delivery-create-label-modal .modal-dialog {width: 700px; }*/
/* 				 }*/
/* 			</style>*/
/* 				*/
/* {{ footer }} */
