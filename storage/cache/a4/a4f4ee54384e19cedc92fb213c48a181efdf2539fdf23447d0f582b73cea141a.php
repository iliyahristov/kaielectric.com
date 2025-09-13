<?php

/* sale/tk_speedy.twig */
class __TwigTemplate_5835d2ef8e4c4324414c1b4e47b7a3e696252e69bfd5a63ce7676172f097e907 extends Twig_Template
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
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"pull-right\">
\t\t\t\t<a href=\"";
        // line 6
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a>
\t\t\t</div>
\t\t\t<h1>";
        // line 8
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
\t\t\t<ul class=\"breadcrumb\">
\t\t\t\t";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "\t\t\t\t\t<li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array(), "array");
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array(), "array");
            echo "</a></li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t";
        // line 17
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 18
            echo "\t\t\t<div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
\t\t\t</div>
\t\t";
        }
        // line 22
        echo "\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 24
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t<form action=\"";
        // line 27
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-speedy\" class=\"form-horizontal\">
\t\t\t\t\t
\t\t\t\t\t<input id=\"shipping_speedy_taking_date\" type=\"hidden\" name=\"taking_date\" value=\"";
        // line 29
        echo (isset($context["taking_date"]) ? $context["taking_date"] : null);
        echo "\"/>
\t\t\t\t\t<input type=\"hidden\" id=\"abroad\" name=\"abroad\" value=\"";
        // line 30
        echo (isset($context["abroad"]) ? $context["abroad"] : null);
        echo "\"/>
\t\t\t\t\t
\t\t\t\t\t";
        // line 32
        if ( !twig_test_empty((isset($context["quote"]) ? $context["quote"] : null))) {
            // line 33
            echo "\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label class=\"col-sm-4 control-label\">";
            // line 34
            echo (isset($context["entry_shipping_method"]) ? $context["entry_shipping_method"] : null);
            echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t\t";
            // line 36
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["quote"]) ? $context["quote"] : null), "quote", array(), "array"));
            foreach ($context['_seq'] as $context["shipping_method_key_id"] => $context["shipping_method"]) {
                // line 37
                echo "\t\t\t\t\t\t\t\t\t<div class=\"radio\">
\t\t\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" id=\"";
                // line 39
                echo $this->getAttribute($context["shipping_method"], "code", array(), "array");
                echo "\" data-shipping_method_id=\"";
                echo $context["shipping_method_key_id"];
                echo "\" name=\"shipping_method\" value=\"";
                echo $this->getAttribute($context["shipping_method"], "code", array(), "array");
                echo "\" ";
                if ((($context["shipping_method_key_id"] == (isset($context["shipping_method_id"]) ? $context["shipping_method_id"] : null)) || (twig_length_filter($this->env, $this->getAttribute((isset($context["quote"]) ? $context["quote"] : null), "quote", array(), "array")) == 1))) {
                    echo " checked=\"checked\"";
                }
                echo " />
\t\t\t\t\t\t\t\t\t\t\t";
                // line 40
                echo $this->getAttribute($context["shipping_method"], "title", array(), "array");
                echo "&nbsp;";
                echo $this->getAttribute($context["shipping_method"], "text", array(), "array");
                echo "
\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['shipping_method_key_id'], $context['shipping_method'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 47
        echo "\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<b><label class=\"col-sm-4 control-label\" for=\"shipping_speedy_note\">";
        // line 49
        echo (isset($context["text_calculate"]) ? $context["text_calculate"] : null);
        echo "</label></b>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t";
        // line 51
        if ( !twig_test_empty((isset($context["quote"]) ? $context["quote"] : null))) {
            // line 52
            echo "\t\t\t\t\t\t\t\t<a id=\"createBillOfLading\" onclick=\"speedySubmit();\" class=\"btn btn-primary\">2 - ";
            echo (isset($context["button_create"]) ? $context["button_create"] : null);
            echo "
\t\t\t\t\t\t\t\t\tтоварителница</a>
\t\t\t\t\t\t\t";
        } else {
            // line 55
            echo "\t\t\t\t\t\t\t\t<a onclick=\"\$('#calculate').val('1'); \$('#form-speedy :input').removeAttr('disabled'); \$('#form-speedy').submit();\" class=\"btn btn-primary\">1
\t\t\t\t\t\t\t\t\t- ";
            // line 56
            echo (isset($context["button_calculate"]) ? $context["button_calculate"] : null);
            echo "</a>
\t\t\t\t\t\t\t";
        }
        // line 58
        echo "\t\t\t\t\t\t\t<input type=\"hidden\" id=\"calculate\" name=\"calculate\" value=\"0\"/>
\t\t\t\t\t\t\t<input type=\"hidden\" id=\"recalculate\" name=\"recalculate\" value=\"0\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<hr>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"custmer_name\">Име на клиент</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"custmer_name\" name=\"custmer_name\" value=\"";
        // line 68
        echo (isset($context["custmer_name"]) ? $context["custmer_name"] : null);
        echo "\"/>
\t\t\t\t\t\t\t";
        // line 69
        if ((isset($context["error_custmer_name"]) ? $context["error_custmer_name"] : null)) {
            // line 70
            echo "\t\t\t\t\t\t\t\t<span class=\"text-danger\">";
            echo (isset($context["error_custmer_name"]) ? $context["error_custmer_name"] : null);
            echo "</span>
\t\t\t\t\t\t\t";
        }
        // line 72
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"custmer_contact\">Име на фирма (не е задължително) </label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"custmer_contact\" name=\"custmer_contact\" value=\"";
        // line 78
        echo (isset($context["custmer_contact"]) ? $context["custmer_contact"] : null);
        echo "\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"custmer_telephone\">Телефон на клиент</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"custmer_telephone\" name=\"custmer_telephone\" value=\"";
        // line 85
        echo (isset($context["custmer_telephone"]) ? $context["custmer_telephone"] : null);
        echo "\"/>
\t\t\t\t\t\t\t";
        // line 86
        if ((isset($context["error_custmer_telephone"]) ? $context["error_custmer_telephone"] : null)) {
            // line 87
            echo "\t\t\t\t\t\t\t\t<span class=\"text-danger\">";
            echo (isset($context["error_custmer_telephone"]) ? $context["error_custmer_telephone"] : null);
            echo "</span>
\t\t\t\t\t\t\t";
        }
        // line 89
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"custmer_email\">Е-майл на клиент</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"custmer_email\" name=\"custmer_email\" value=\"";
        // line 95
        echo (isset($context["custmer_email"]) ? $context["custmer_email"] : null);
        echo "\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_contents\">";
        // line 100
        echo (isset($context["entry_contents"]) ? $context["entry_contents"] : null);
        echo "
\t\t\t\t\t\t\t<div style=\"font-weight: normal\">Брой символи: <strong id=\"count-contents\"></strong></div>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_speedy_contents\" name=\"contents\" value=\"";
        // line 104
        echo (isset($context["contents"]) ? $context["contents"] : null);
        echo "\"/>
\t\t\t\t\t\t\t";
        // line 105
        if ((isset($context["error_contents"]) ? $context["error_contents"] : null)) {
            // line 106
            echo "\t\t\t\t\t\t\t\t<span class=\"text-danger\">";
            echo (isset($context["error_contents"]) ? $context["error_contents"] : null);
            echo "</span>
\t\t\t\t\t\t\t";
        }
        // line 108
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<script>
              \$('#shipping_speedy_contents').keyup(countname);
              \$('#shipping_speedy_contents').keydown(countname);

              function countname() {
                  var cs_1_speedy_contents = \$(this).val().length;
                  \$('#count-contents').text(cs_1_speedy_contents);

                  if (cs_1_speedy_contents > 100 || cs_1_speedy_contents == 0) {
                      \$('#count-contents').css('color', 'red');
                  } else {
                      \$('#count-contents').css('color', 'green');
                  }
              }

              \$(document).ready(function () {
                  var cs_2_speedy_contents = \$('#shipping_speedy_contents').val().length;
                  \$('#count-contents').text(cs_2_speedy_contents);

                  if (cs_2_speedy_contents > 100 || cs_2_speedy_contents == 0) {
                      \$('#count-contents').css('color', 'red');
                  } else {
                      \$('#count-contents').css('color', 'green');
                  }
              });
\t\t\t\t\t
\t\t\t\t\t</script>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_packing\">";
        // line 139
        echo (isset($context["entry_packing"]) ? $context["entry_packing"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_speedy_packing\" name=\"packing\" value=\"";
        // line 141
        echo (isset($context["packing"]) ? $context["packing"] : null);
        echo "\"/>
\t\t\t\t\t\t\t";
        // line 142
        if ((isset($context["error_packing"]) ? $context["error_packing"] : null)) {
            // line 143
            echo "\t\t\t\t\t\t\t\t<span class=\"text-danger\">";
            echo (isset($context["error_packing"]) ? $context["error_packing"] : null);
            echo "</span>
\t\t\t\t\t\t\t";
        }
        // line 145
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"client_id\">";
        // line 149
        echo (isset($context["entry_client_id"]) ? $context["entry_client_id"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<select name=\"client_id\" id=\"speedy_client_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
        // line 152
        if (((twig_length_filter($this->env, (isset($context["clients"]) ? $context["clients"] : null)) > 1) || (twig_length_filter($this->env, (isset($context["clients"]) ? $context["clients"] : null)) == 0))) {
            // line 153
            echo "\t\t\t\t\t\t\t\t\t<option value=\"0\">";
            echo (isset($context["text_none"]) ? $context["text_none"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        // line 155
        echo "\t\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["clients"]) ? $context["clients"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
            // line 156
            echo "\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($context["client"], "clientId", array()) == (isset($context["client_id"]) ? $context["client_id"] : null))) {
                // line 157
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $this->getAttribute($context["client"], "clientId", array());
                echo "\" selected=\"selected\">";
                echo sprintf((isset($context["text_client_id"]) ? $context["text_client_id"] : null), $this->getAttribute($context["client"], "clientId", array()), $this->getAttribute($context["client"], "name", array()), $this->getAttribute($context["client"], "address", array()));
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            } else {
                // line 159
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $this->getAttribute($context["client"], "clientId", array());
                echo "\">";
                echo sprintf((isset($context["text_client_id"]) ? $context["text_client_id"] : null), $this->getAttribute($context["client"], "clientId", array()), $this->getAttribute($context["client"], "name", array()), $this->getAttribute($context["client"], "address", array()));
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            }
            // line 161
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['client'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 162
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_weight\">";
        // line 167
        echo (isset($context["entry_weight"]) ? $context["entry_weight"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_speedy_weight\" name=\"weight\" value=\"";
        // line 169
        echo (isset($context["weight"]) ? $context["weight"] : null);
        echo "\"/>
\t\t\t\t\t\t\t";
        // line 170
        if ((isset($context["error_weight"]) ? $context["error_weight"] : null)) {
            // line 171
            echo "\t\t\t\t\t\t\t\t<span class=\"text-danger\">";
            echo (isset($context["error_weight"]) ? $context["error_weight"] : null);
            echo "</span>
\t\t\t\t\t\t\t";
        }
        // line 173
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_count\">";
        // line 177
        echo (isset($context["entry_count"]) ? $context["entry_count"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_speedy_count\" name=\"count\" value=\"";
        // line 179
        echo (isset($context["count"]) ? $context["count"] : null);
        echo "\"/>
\t\t\t\t\t\t\t";
        // line 180
        if ((isset($context["error_count"]) ? $context["error_count"] : null)) {
            // line 181
            echo "\t\t\t\t\t\t\t\t<span class=\"text-danger\">";
            echo (isset($context["error_count"]) ? $context["error_count"] : null);
            echo "</span>
\t\t\t\t\t\t\t";
        }
        // line 183
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_width\">";
        // line 187
        echo (isset($context["entry_size"]) ? $context["entry_size"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"table-responsive col-sm-8\">
\t\t\t\t\t\t\t<table id=\"parcels_size\" class=\"table table-striped table-bordered table-hover\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"text-left\">";
        // line 192
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"text-left\">";
        // line 193
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"text-left\">";
        // line 194
        echo (isset($context["entry_depth"]) ? $context["entry_depth"] : null);
        echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"text-left\">";
        // line 195
        echo (isset($context["entry_parcel_weight"]) ? $context["entry_parcel_weight"] : null);
        echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
        // line 199
        $context["parcels_size_row"] = 1;
        // line 200
        echo "\t\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["parcels_sizes"]) ? $context["parcels_sizes"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["parcels_size"]) {
            // line 201
            echo "\t\t\t\t\t\t\t\t\t<tr id=\"parcel-size-row";
            echo (isset($context["parcels_size_row"]) ? $context["parcels_size_row"] : null);
            echo "\">
\t\t\t\t\t\t\t\t\t\t<td class=\"text-left\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"parcels_size[";
            // line 203
            echo (isset($context["parcels_size_row"]) ? $context["parcels_size_row"] : null);
            echo "][width]\" value=\"";
            echo $this->getAttribute($context["parcels_size"], "width", array(), "array");
            echo "\" placeholder=\"";
            echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
            echo "\" class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-left\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"parcels_size[";
            // line 206
            echo (isset($context["parcels_size_row"]) ? $context["parcels_size_row"] : null);
            echo "][height]\" value=\"";
            echo $this->getAttribute($context["parcels_size"], "height", array(), "array");
            echo "\" placeholder=\"";
            echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
            echo "\" class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-left\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"parcels_size[";
            // line 209
            echo (isset($context["parcels_size_row"]) ? $context["parcels_size_row"] : null);
            echo "][depth]\" value=\"";
            echo $this->getAttribute($context["parcels_size"], "depth", array(), "array");
            echo "\" placeholder=\"";
            echo (isset($context["entry_depth"]) ? $context["entry_depth"] : null);
            echo "\" class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-left\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"parcels_size[";
            // line 212
            echo (isset($context["parcels_size_row"]) ? $context["parcels_size_row"] : null);
            echo "][weight]\" value=\"";
            echo $this->getAttribute($context["parcels_size"], "weight", array(), "array");
            echo "\" placeholder=\"";
            echo (isset($context["entry_parcel_weight"]) ? $context["entry_parcel_weight"] : null);
            echo "\" class=\"form-control\"/>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
            // line 215
            $context["parcels_size_row"] = ((isset($context["parcels_size_row"]) ? $context["parcels_size_row"] : null) + 1);
            // line 216
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parcels_size'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 217
        echo "\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_parcel_sizes\">";
        // line 223
        echo (isset($context["entry_min_parcel_size"]) ? $context["entry_min_parcel_size"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<select name=\"parcel_size\" id=\"shipping_speedy_parcel_sizes\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
        // line 226
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["parcel_sizes"]) ? $context["parcel_sizes"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["option"]) {
            // line 227
            echo "\t\t\t\t\t\t\t\t\t";
            if (($context["key"] == (isset($context["parcel_size"]) ? $context["parcel_size"] : null))) {
                // line 228
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $context["key"];
                echo "\" selected=\"selected\">";
                echo $context["option"];
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            } else {
                // line 230
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $context["key"];
                echo "\">";
                echo $context["option"];
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            }
            // line 232
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 233
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_client_note\">";
        // line 238
        echo (isset($context["entry_client_note"]) ? $context["entry_client_note"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<textarea class=\"form-control\" type=\"text\" id=\"speedy_client_note\" name=\"client_note\" row=\"3\">";
        // line 240
        echo (isset($context["client_note"]) ? $context["client_note"] : null);
        echo "</textarea>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"payer_type\">";
        // line 245
        echo (isset($context["entry_payer_type"]) ? $context["entry_payer_type"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<select name=\"payer_type\" id=\"payer_type\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
        // line 248
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["return_payer_types"]) ? $context["return_payer_types"] : null));
        foreach ($context['_seq'] as $context["option_id"] => $context["option"]) {
            // line 249
            echo "\t\t\t\t\t\t\t\t\t";
            if (($context["option_id"] == (isset($context["payer_type"]) ? $context["payer_type"] : null))) {
                // line 250
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $context["option_id"];
                echo "\" selected=\"selected\">";
                echo $context["option"];
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            } else {
                // line 252
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $context["option_id"];
                echo "\">";
                echo $context["option"];
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            }
            // line 254
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['option_id'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 255
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_deffered_days\">Брой дни за отлагане</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"number\" id=\"shipping_speedy_deffered_days\" name=\"deffered_days\" value=\"";
        // line 262
        echo (isset($context["deffered_days"]) ? $context["deffered_days"] : null);
        echo "\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\" id=\"shipping_speedy_cod_container\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\">";
        // line 267
        echo (isset($context["entry_cod"]) ? $context["entry_cod"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<label class=\"radio-inline\" style=\"display: inline; width: auto; float: none;\">
\t\t\t\t\t\t\t\t<input type=\"radio\" id=\"shipping_speedy_cod_yes\" name=\"cod\" value=\"1\" ";
        // line 270
        if ((isset($context["cod"]) ? $context["cod"] : null)) {
            echo " checked=\"checked\"";
        }
        echo " onclick=\"\$('#shipping_speedy_total_container').show(); \$('#shipping_speedy_option_before_payment_container').show(); \"/>
\t\t\t\t\t\t\t\t";
        // line 271
        echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
        echo "
\t\t\t\t\t\t\t</label> <label class=\"radio-inline\" style=\"display: inline; width: auto; float: none;\">
\t\t\t\t\t\t\t\t<input type=\"radio\" id=\"shipping_speedy_cod_no\" name=\"cod\" value=\"0\" ";
        // line 273
        if ( !(isset($context["cod"]) ? $context["cod"] : null)) {
            echo " checked=\"checked\"";
        }
        echo " onclick=\"\$('#shipping_speedy_total_container').hide(); \$('#shipping_speedy_option_before_payment_container').hide(); \"/>
\t\t\t\t\t\t\t\t";
        // line 274
        echo (isset($context["text_no"]) ? $context["text_no"] : null);
        echo "
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\" id=\"shipping_speedy_total_container\" ";
        // line 279
        if ( !(isset($context["cod"]) ? $context["cod"] : null)) {
            echo " style=\"display: none;\"";
        }
        echo " >
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_total\">";
        // line 280
        echo (isset($context["entry_total"]) ? $context["entry_total"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_speedy_total\" name=\"total\" value=\"";
        // line 282
        echo (isset($context["total"]) ? $context["total"] : null);
        echo "\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\" id=\"shipping_speedy_option_before_payment_container\" ";
        // line 286
        if ( !(isset($context["cod"]) ? $context["cod"] : null)) {
            echo " style=\"display: none;\" ";
        }
        echo ">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_option_before_payment\">";
        // line 287
        echo (isset($context["entry_options_before_payment"]) ? $context["entry_options_before_payment"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<select name=\"option_before_payment\" id=\"shipping_speedy_option_before_payment\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
        // line 290
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["options_before_payment"]) ? $context["options_before_payment"] : null));
        foreach ($context['_seq'] as $context["option_id"] => $context["option"]) {
            // line 291
            echo "\t\t\t\t\t\t\t\t\t";
            if (($context["option_id"] == (isset($context["option_before_payment"]) ? $context["option_before_payment"] : null))) {
                // line 292
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $context["option_id"];
                echo "\" selected=\"selected\">";
                echo $context["option"];
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            } else {
                // line 294
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $context["option_id"];
                echo "\">";
                echo $context["option"];
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            }
            // line 296
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['option_id'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 297
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"return_payer_type\">";
        // line 302
        echo (isset($context["entry_return_payer_type"]) ? $context["entry_return_payer_type"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<select name=\"return_payer_type\" id=\"return_payer_type\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
        // line 305
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["return_payer_types"]) ? $context["return_payer_types"] : null));
        foreach ($context['_seq'] as $context["option_id"] => $context["option"]) {
            // line 306
            echo "\t\t\t\t\t\t\t\t\t";
            if (($context["option_id"] == (isset($context["return_payer_type"]) ? $context["return_payer_type"] : null))) {
                // line 307
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $context["option_id"];
                echo "\" selected=\"selected\">";
                echo $context["option"];
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            } else {
                // line 309
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $context["option_id"];
                echo "\">";
                echo $context["option"];
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            }
            // line 311
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['option_id'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 312
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_insurance\">";
        // line 317
        echo (isset($context["entry_insurance"]) ? $context["entry_insurance"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_speedy_insurance\" name=\"insurance\" onchange=\"\$('#shipping_speedy_fragile').parent().parent().toggle(); \$('#shipping_speedy_total_insurance').parent().parent().toggle();\">
\t\t\t\t\t\t\t\t";
        // line 320
        if ((isset($context["insurance"]) ? $context["insurance"] : null)) {
            // line 321
            echo "\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
            echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t\t<option value=\"0\">";
            // line 322
            echo (isset($context["text_no"]) ? $context["text_no"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        } else {
            // line 324
            echo "\t\t\t\t\t\t\t\t\t<option value=\"1\">";
            echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 325
            echo (isset($context["text_no"]) ? $context["text_no"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        // line 327
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\" ";
        // line 331
        if ( !(isset($context["insurance"]) ? $context["insurance"] : null)) {
            echo " style=\"display: none;\"";
        }
        echo " >
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_fragile\"><span data-toggle=\"tooltip\" title=\"";
        // line 332
        echo (isset($context["help_fragile"]) ? $context["help_fragile"] : null);
        echo "\">";
        echo (isset($context["entry_fragile"]) ? $context["entry_fragile"] : null);
        echo "</span></label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_speedy_fragile\" name=\"fragile\">
\t\t\t\t\t\t\t\t";
        // line 335
        if ((isset($context["fragile"]) ? $context["fragile"] : null)) {
            // line 336
            echo "\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
            echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t\t<option value=\"0\">";
            // line 337
            echo (isset($context["text_no"]) ? $context["text_no"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        } else {
            // line 339
            echo "\t\t\t\t\t\t\t\t\t<option value=\"1\">";
            echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 340
            echo (isset($context["text_no"]) ? $context["text_no"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        // line 342
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\" ";
        // line 346
        if ( !(isset($context["insurance"]) ? $context["insurance"] : null)) {
            echo " style=\"display: none;\"";
        }
        echo " >
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_total_insurance\">";
        // line 347
        echo (isset($context["entry_total_insurance"]) ? $context["entry_total_insurance"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_speedy_total_insurance\" name=\"totalNoShipping\" value=\"";
        // line 349
        echo (isset($context["totalNoShipping"]) ? $context["totalNoShipping"] : null);
        echo "\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" >Заявка за обратна пратка</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<select class=\"form-control\" name=\"swap\">
\t\t\t\t\t\t\t\t";
        // line 357
        if ((isset($context["swap"]) ? $context["swap"] : null)) {
            // line 358
            echo "\t\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
            echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t\t<option value=\"0\">";
            // line 359
            echo (isset($context["text_no"]) ? $context["text_no"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        } else {
            // line 361
            echo "\t\t\t\t\t\t\t\t\t<option value=\"1\">";
            echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 362
            echo (isset($context["text_no"]) ? $context["text_no"] : null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        // line 364
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<hr>
\t\t\t\t\t<input type=\"hidden\" id=\"shipping_speedy_country_id\" name=\"country_id\" value=\"";
        // line 369
        echo (isset($context["country_id"]) ? $context["country_id"] : null);
        echo "\"/>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<div class=\"required\">
\t\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"speedy_country\">";
        // line 373
        echo (isset($context["entry_country"]) ? $context["entry_country"] : null);
        echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-5\">
\t\t\t\t\t\t\t\t<input type=\"search\" autocomplete=\"off\" id=\"shipping_speedy_country\" name=\"country\" value=\"";
        // line 375
        echo (isset($context["country"]) ? $context["country"] : null);
        echo "\" class=\"form-control\"/>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_city\">";
        // line 381
        echo (isset($context["entry_city"]) ? $context["entry_city"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_speedy_city\" name=\"city\" value=\"";
        // line 383
        echo (isset($context["city"]) ? $context["city"] : null);
        echo "\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"shipping_speedy_city_id\" name=\"city_id\" value=\"";
        // line 385
        echo (isset($context["city_id"]) ? $context["city_id"] : null);
        echo "\"/>
\t\t\t\t\t\t<input type=\"hidden\" id=\"shipping_speedy_city_nomenclature\" name=\"city_nomenclature\" value=\"";
        // line 386
        echo (isset($context["city_nomenclature"]) ? $context["city_nomenclature"] : null);
        echo "\"/>
\t\t\t\t\t\t<label class=\"col-sm-1 control-label\" for=\"shipping_speedy_postcode\">";
        // line 387
        echo (isset($context["entry_postcode"]) ? $context["entry_postcode"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-1\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_speedy_postcode\" name=\"postcode\" value=\"";
        // line 389
        echo (isset($context["postcode"]) ? $context["postcode"] : null);
        echo "\" disabled=\"disabled\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\" id=\"to_office\" ";
        // line 393
        if (twig_test_empty((isset($context["offices"]) ? $context["offices"] : null))) {
            echo "style=\"display:none;\" ";
        }
        echo ">
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\">";
        // line 394
        echo (isset($context["entry_shipping_to"]) ? $context["entry_shipping_to"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<label class=\"radio-inline\" style=\"display: inline; width: auto; float: none;\">
\t\t\t\t\t\t\t\t<input type=\"radio\" id=\"shipping_speedy_shipping_to_door\" name=\"to_office\" value=\"0\" ";
        // line 397
        if ( !(isset($context["to_office"]) ? $context["to_office"] : null)) {
            echo " checked=\"checked\"";
        }
        echo " onclick=\"\$('#shipping_speedy_quarter_container,#shipping_speedy_street_container,#shipping_speedy_block_no_container,#shipping_speedy_note_container').show(); \$('#shipping_speedy_office_container').hide();\"/>
\t\t\t\t\t\t\t\t";
        // line 398
        echo (isset($context["text_to_door"]) ? $context["text_to_door"] : null);
        echo "
\t\t\t\t\t\t\t</label> <label class=\"radio-inline\" style=\"display: inline; width: auto; float: none;\">
\t\t\t\t\t\t\t\t<input type=\"radio\" id=\"shipping_speedy_shipping_to_office\" name=\"to_office\" value=\"1\" ";
        // line 400
        if ((isset($context["to_office"]) ? $context["to_office"] : null)) {
            echo " checked=\"checked\"";
        }
        echo " onclick=\"\$('#shipping_speedy_quarter_container,#shipping_speedy_street_container,#shipping_speedy_block_no_container,#shipping_speedy_note_container').hide(); \$('#shipping_speedy_office_container').show();\"/>
\t\t\t\t\t\t\t\t";
        // line 401
        echo (isset($context["text_to_office"]) ? $context["text_to_office"] : null);
        echo "
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\" id=\"shipping_speedy_quarter_container\" ";
        // line 406
        if ((isset($context["to_office"]) ? $context["to_office"] : null)) {
            echo " style=\"display: none;\"";
        }
        echo " >
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_quarter\">";
        // line 407
        echo (isset($context["entry_quarter"]) ? $context["entry_quarter"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_speedy_quarter\" name=\"quarter\" value=\"";
        // line 409
        echo (isset($context["quarter"]) ? $context["quarter"] : null);
        echo "\"/>
\t\t\t\t\t\t\t<input type=\"hidden\" id=\"shipping_speedy_quarter_id\" name=\"quarter_id\" value=\"";
        // line 410
        echo (isset($context["quarter_id"]) ? $context["quarter_id"] : null);
        echo "\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\" id=\"shipping_speedy_street_container\" ";
        // line 414
        if ((isset($context["to_office"]) ? $context["to_office"] : null)) {
            echo " style=\"display: none;\"";
        }
        echo " >
\t\t\t\t\t\t
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_street\">";
        // line 416
        echo (isset($context["entry_street"]) ? $context["entry_street"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_speedy_street\" name=\"street\" value=\"";
        // line 418
        echo (isset($context["street"]) ? $context["street"] : null);
        echo "\"/>
\t\t\t\t\t\t\t<input type=\"hidden\" id=\"shipping_speedy_street_id\" name=\"street_id\" value=\"";
        // line 419
        echo (isset($context["street_id"]) ? $context["street_id"] : null);
        echo "\"/>
\t\t\t\t\t\t\t";
        // line 420
        if ((isset($context["error_address"]) ? $context["error_address"] : null)) {
            // line 421
            echo "\t\t\t\t\t\t\t\t<span class=\"text-danger\">";
            echo (isset($context["error_address"]) ? $context["error_address"] : null);
            echo "</span>
\t\t\t\t\t\t\t";
        }
        // line 423
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<label class=\"col-sm-1 control-label\" for=\"shipping_speedy_street_no\">";
        // line 425
        echo (isset($context["entry_street_no"]) ? $context["entry_street_no"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-1\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_speedy_street_no\" name=\"street_no\" value=\"";
        // line 427
        echo (isset($context["street_no"]) ? $context["street_no"] : null);
        echo "\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t\t\t<hr>
\t\t\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t\t\t
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"speedy_block_no\">Блок:</label>
\t\t\t\t\t\t<div class=\"col-sm-2\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" autocomplete=\"off\" id=\"shipping_speedy_block_no\" name=\"block_no\" value=\"";
        // line 436
        echo (isset($context["block_no"]) ? $context["block_no"] : null);
        echo "\">
\t\t\t\t\t\t\t<ul class=\"dropdown-menu\"></ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<label class=\"col-sm-1 control-label\" for=\"speedy_entrance_no\">Вход:</label>
\t\t\t\t\t\t<div class=\"col-sm-1\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" autocomplete=\"off\" id=\"shipping_speedy_entrance_no\" name=\"entrance_no\" value=\"";
        // line 442
        echo (isset($context["entrance_no"]) ? $context["entrance_no"] : null);
        echo "\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<label class=\"col-sm-1 control-label\" for=\"speedy_floor_no\">Етаж:</label>
\t\t\t\t\t\t<div class=\"col-sm-1\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" autocomplete=\"off\" id=\"shipping_speedy_floor_no\" name=\"floor_no\" value=\"";
        // line 447
        echo (isset($context["floor_no"]) ? $context["floor_no"] : null);
        echo "\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<label class=\"col-sm-1 control-label\" for=\"speedy_apartment_no\">Апартамент:</label>
\t\t\t\t\t\t<div class=\"col-sm-1\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" autocomplete=\"off\" id=\"shipping_speedy_apartment_no\" name=\"apartment_no\" value=\"";
        // line 452
        echo (isset($context["apartment_no"]) ? $context["apartment_no"] : null);
        echo "\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\" id=\"shipping_speedy_note_container\" ";
        // line 459
        if ((isset($context["to_office"]) ? $context["to_office"] : null)) {
            echo " style=\"display: none;\"";
        }
        echo " >
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_note\">";
        // line 460
        echo (isset($context["entry_note"]) ? $context["entry_note"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" id=\"shipping_speedy_note\" name=\"note\" value=\"";
        // line 462
        echo (isset($context["note"]) ? $context["note"] : null);
        echo "\"/>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\" id=\"shipping_speedy_office_container\" ";
        // line 466
        if ( !(isset($context["to_office"]) ? $context["to_office"] : null)) {
            echo " style=\"display: none;\"";
        }
        echo " >
\t\t\t\t\t\t<label class=\"col-sm-4 control-label\" for=\"shipping_speedy_office_id\">";
        // line 467
        echo (isset($context["entry_office"]) ? $context["entry_office"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t<select class=\"form-control\" id=\"shipping_speedy_office_id\" name=\"office_id\">
\t\t\t\t\t\t\t\t<option value=\"0\">";
        // line 470
        echo (isset($context["text_select_office"]) ? $context["text_select_office"] : null);
        echo "</option>
\t\t\t\t\t\t\t\t";
        // line 471
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["offices"]) ? $context["offices"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["office"]) {
            // line 472
            echo "\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($context["office"], "id", array(), "array") == (isset($context["office_id"]) ? $context["office_id"] : null))) {
                // line 473
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $this->getAttribute($context["office"], "id", array(), "array");
                echo "\" selected=\"selected\">";
                echo $this->getAttribute($context["office"], "label", array(), "array");
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            } else {
                // line 475
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $this->getAttribute($context["office"], "id", array(), "array");
                echo "\">";
                echo $this->getAttribute($context["office"], "label", array(), "array");
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            }
            // line 477
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['office'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 478
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t";
        // line 479
        if ((isset($context["error_office"]) ? $context["error_office"] : null)) {
            // line 480
            echo "\t\t\t\t\t\t\t\t<br/>&nbsp;&nbsp;&nbsp;<span class=\"text-danger\">";
            echo (isset($context["error_office"]) ? $context["error_office"] : null);
            echo "</span>
\t\t\t\t\t\t\t";
        }
        // line 482
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<script type=\"text/javascript\">
    \$('#shipping_speedy_parcel_sizes, #client_id').on('change', function () {
        if (\$('#recalculate').val() == 0) {
            alert(\"";
        // line 493
        echo (isset($context["error_recalculate"]) ? $context["error_recalculate"] : null);
        echo "\");

            \$('#createBillOfLading').attr('disabled', 'disabled');
            \$('#recalculate').val('1');
        }
    });

    function speedySubmit() {
        \$('#createBillOfLading').off('click');
        \$('#createBillOfLading').attr('disabled', 'disabled');
        if (\$('[name=\"shipping_method\"][value^=\"speedy.\"]:checked').length) {
            var shipping_method_id = \$('[name=\"shipping_method\"][value^=\"speedy.\"]:checked').data('shipping_method_id');
        } else {
            var shipping_method_id = '";
        // line 506
        echo (isset($context["shipping_method_id"]) ? $context["shipping_method_id"] : null);
        echo "';
        }
        var post_data = {
            'shipping_method_id': shipping_method_id,
            'abroad': \$('#abroad').val()
        };
\t\t    
        post_data.speedy_shipping_to_office = \$('input[name=to_office]:checked').val();
        post_data.speedy_option_before_payment = \$('#shipping_speedy_option_before_payment').val();
        post_data.speedy_city_id = \$('#shipping_speedy_city_id').val();
        post_data.speedy_office_id = \$('#shipping_speedy_office_id').val();

        \$.ajax({
            url: 'index.php?route=sale/tk_speedy/generate&user_token=";
        // line 519
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
            type: 'POST',
            data: post_data,
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    var confurm = 1;

                    if (data.taking_date) {
                        \$('#shipping_speedy_taking_date').val(data.taking_date);
                    }

                    for (error in data.errors) {
                        if (!confirm(data.errors[error])) {
                            confurm = 0;
                        }
                    }

                    if (confurm) {
                        \$('#form-speedy :input').removeAttr('disabled');
                        \$('#form-speedy').submit();
                    }
                } else {
                    \$('#form-speedy :input').removeAttr('disabled');
                    \$('#form-speedy').submit();
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    }


    var shipping_speedy_count_previous;

    \$('#shipping_speedy_count').keydown(function (e) {
        if (!e.key.match(/\\d/)) {
            e.preventDefault()
        }
    }).on('focus', function () {
        shipping_speedy_count_previous = parseInt(\$(this).val());
    }).change(function () {
        if (parseInt(shipping_speedy_count_previous) < parseInt(\$(this).val())) {
            addParcelsSize(parseInt(shipping_speedy_count_previous) + 1, parseInt(\$(this).val()));
        } else {
            removeParcelsSize(parseInt(\$(this).val()), parseInt(shipping_speedy_count_previous));
        }

        shipping_speedy_count_previous = parseInt(\$(this).val());
    });

    function addParcelsSize(old_rows, new_rows) {
        for (i = old_rows; i <= new_rows; i++) {
            html = '<tr id=\"parcel-size-row' + i + '\">';
            html += ' <td class=\"text-left\"><input type=\"text\" name=\"parcels_size[' + i + '][width]\" value=\"\" placeholder=\"";
        // line 574
        echo (isset($context["entry_width"]) ? $context["entry_width"] : null);
        echo "\" class=\"form-control\" /></td>';
            html += ' <td class=\"text-left\"><input type=\"text\" name=\"parcels_size[' + i + '][height]\" value=\"\" placeholder=\"";
        // line 575
        echo (isset($context["entry_height"]) ? $context["entry_height"] : null);
        echo "\" class=\"form-control\" /></td>';
            html += ' <td class=\"text-left\"><input type=\"text\" name=\"parcels_size[' + i + '][depth]\" value=\"\" placeholder=\"";
        // line 576
        echo (isset($context["entry_depth"]) ? $context["entry_depth"] : null);
        echo "\" class=\"form-control\" /></td>';
            html += ' <td class=\"text-left\"><input type=\"text\" name=\"parcels_size[' + i + '][weight]\" value=\"\" placeholder=\"";
        // line 577
        echo (isset($context["entry_parcel_weight"]) ? $context["entry_parcel_weight"] : null);
        echo "\" class=\"form-control\" /></td>';
            html += '</tr>';

            \$('#parcels_size tbody').append(html);
        }
    }

    function removeParcelsSize(old_rows, new_rows) {
        for (i = new_rows; i > old_rows; i--) {
            \$('#parcel-size-row' + i).remove();
        }
    }

    var shipping_speedy_city = '";
        // line 590
        echo (isset($context["city"]) ? $context["city"] : null);
        echo "';
    var shipping_speedy_quarter = '";
        // line 591
        echo (isset($context["quarter"]) ? $context["quarter"] : null);
        echo "';
    var shipping_speedy_street = '";
        // line 592
        echo (isset($context["street"]) ? $context["street"] : null);
        echo "';
    var shipping_speedy_country = '";
        // line 593
        echo (isset($context["country"]) ? $context["country"] : null);
        echo "';
    var shipping_speedy_state = '";
        // line 594
        echo (isset($context["state"]) ? $context["state"] : null);
        echo "';

    \$(document).ready(function () {
\t\t    
        \$('#shipping_speedy_city').autocomplete({
            'source': function (request, response) {
                if (request) {
                    \$.ajax({
                        url: 'index.php?route=sale/tk_speedy/getCities&user_token=";
        // line 602
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
                        dataType: 'json',
                        type: 'get',
                        data: {
                            term: function () {
                                return \$('#shipping_speedy_city').val();
                            },
                            country_id: \$('#shipping_speedy_country_id').val(),
                            abroad: \$('#abroad').val()
                        },
                        success: function (json) {
                            if (\$('#shipping_speedy_city').is(\":focus\")) {
                                response(\$.map(json, function (item) {
                                    return {
                                        label: item['label'],
                                        value: item['value'],
                                        id: item['id'],
                                        postcode: item['postcode'],
                                        nomenclature: item['nomenclature']
                                    }
                                }));
                            }
                        }
                    });
                }
            },
            'select': function (item) {
                if (item) {
                    shipping_speedy_city = item.value;
                    \$('#shipping_speedy_city').val(item.value);
                    \$('#shipping_speedy_postcode').val(item.postcode);
                    \$('#shipping_speedy_city_id').val(item.id);
                    \$('#shipping_speedy_city_nomenclature').val(item.nomenclature);
                    \$('#shipping_speedy_quarter').val('');
                    \$('#shipping_speedy_quarter_id').val('');
                    \$('#shipping_speedy_street').val('');
                    \$('#shipping_speedy_street_id').val('');
                    \$('#shipping_speedy_street_no').val('');
                    \$('#shipping_speedy_block_no').val('');
                    \$('#shipping_speedy_entrance_no').val('');
                    \$('#shipping_speedy_floor_no').val('');
                    \$('#shipping_speedy_apartment_no').val('');
                    \$('#shipping_speedy_note').val('');
                    \$('#shipping_speedy_office_id').html('<option value=\"0\">";
        // line 645
        echo (isset($context["text_wait"]) ? $context["text_wait"] : null);
        echo "</option>');

                    \$.ajax({
                        url: 'index.php?route=sale/tk_speedy/getOffices&user_token=";
        // line 648
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
                        dataType: 'json',
                        data: {
                            city_id: item.id,
                            abroad: \$('#abroad').val(),
                            country_id: \$('#shipping_speedy_country_id').val()
                        },
                        success: function (data) {
                            if (data.error) {
                                alert(data.error);
                            } else {
                                html = '';

                                if (data.length) {
                                    \$('#to_office').show();
                                    html += '<option value=\"0\">";
        // line 663
        echo (isset($context["text_select_office"]) ? $context["text_select_office"] : null);
        echo "</option>';
                                    for (i = 0; i < data.length; i++) {
                                        html += '<option value=\"' + data[i]['id'] + '\">' + data[i]['label'] + '</option>';
                                    }
                                } else {
                                    \$('#to_office').hide();
                                    \$('[name=to_office][value=0]').trigger('click');
                                }

                                \$('#shipping_speedy_office_id').html(html);
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            //alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
                        }
                    });
                }
            },
            'change': function (item) {
                if (!item && \$('#shipping_speedy_country_nomenclature').val() == 'FULL') {
                    \$('#shipping_speedy_city').val('');
                    \$('#shipping_speedy_city_id').val('');
                    \$('#shipping_speedy_city_nomenclature').val('');
                    \$('#shipping_speedy_postcode').val('');
                    \$('#shipping_speedy_office_id').html('<option value=\"0\">";
        // line 687
        echo (isset($context["text_select_city"]) ? $context["text_select_city"] : null);
        echo "</option>');
                }

                \$('#shipping_speedy_quarter').val('');
                \$('#shipping_speedy_quarter_id').val('');
                \$('#shipping_speedy_street').val('');
                \$('#shipping_speedy_street_id').val('');
                \$('#shipping_speedy_street_no').val('');
                \$('#shipping_speedy_block_no').val('');
                \$('#shipping_speedy_entrance_no').val('');
                \$('#shipping_speedy_floor_no').val('');
                \$('#shipping_speedy_apartment_no').val('');
                \$('#shipping_speedy_note').val('');
            }
        });

        \$('#shipping_speedy_city').blur(function () {
            if (\$(this).val() != shipping_speedy_city) {

                if (!\$('#abroad').val() || (\$('#abroad').val() && (\$('#shipping_speedy_country_nomenclature').val() == 'FULL'))) {
                    \$('#shipping_speedy_city').val('');
                }

                \$('#shipping_speedy_city_id').val('');
                \$('#shipping_speedy_city_nomenclature').val('');
                \$('#shipping_speedy_postcode').val('');
                \$('#shipping_speedy_office_id').html('<option value=\"0\">";
        // line 713
        echo (isset($context["text_select_city"]) ? $context["text_select_city"] : null);
        echo "</option>');
                \$('#shipping_speedy_quarter').val('');
                \$('#shipping_speedy_quarter_id').val('');
                \$('#shipping_speedy_street').val('');
                \$('#shipping_speedy_street_id').val('');
                \$('#shipping_speedy_street_no').val('');
                \$('#shipping_speedy_block_no').val('');
                \$('#shipping_speedy_entrance_no').val('');
                \$('#shipping_speedy_floor_no').val('');
                \$('#shipping_speedy_apartment_no').val('');
                \$('#shipping_speedy_note').val('');
            }
        });

        \$('#shipping_speedy_quarter').autocomplete({
            'source': function (request, response) {
                if (request) {
                    \$.ajax({
                        url: 'index.php?route=sale/tk_speedy/getQuarters&user_token=";
        // line 731
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
                        dataType: 'json',
                        data: {
                            term: function () {
                                return \$('#shipping_speedy_quarter').val();
                            },
                            city_id: function () {
                                return \$('#shipping_speedy_city_id').val();
                            },
                            abroad: \$('#abroad').val()
                        },
                        success: function (data) {
                            if (data.error) {
                                \$('#shipping_speedy_quarter').val('');
                                \$('#shipping_speedy_quarter_id').val('');
                                alert(data.error);
                            } else {
                                if (\$('#shipping_speedy_city_nomenclature').val() == 'FULL') {
                                    if (data.length) {
                                        response(\$.map(data, function (item) {
                                            return {
                                                label: item['label'],
                                                value: item['value'],
                                                id: item['id'],
                                            }
                                        }));
                                    }
                                } else {
                                    response(\$.map(data, function (item) {
                                        return {
                                            label: item['label'],
                                            value: item['value'],
                                            id: item['id'],
                                        }
                                    }));
                                }
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            //alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
                        }
                    });
                }
            },
            'select': function (item) {
                if (item) {
                    shipping_speedy_quarter = item.value;
                    \$('#shipping_speedy_quarter').val(item.value);
                    \$('#shipping_speedy_quarter_id').val(item.id);
                }
            },
            'change': function (item) {
                if (!item && \$('#shipping_speedy_city_nomenclature').val() == 'FULL') {
                    \$('#shipping_speedy_quarter').val('');
                    \$('#shipping_speedy_quarter_id').val('');
                }
            }
        });

        \$('#shipping_speedy_quarter').blur(function () {
            if ((\$(this).val() != shipping_speedy_quarter) && (\$('#shipping_speedy_city_nomenclature').val() == 'FULL')) {
                \$('#shipping_speedy_quarter').val('');
                \$('#shipping_speedy_quarter_id').val('');
            }
        });

        \$('#shipping_speedy_street').autocomplete({
            'source': function (request, response) {
                if (request) {
                    \$.ajax({
                        url: 'index.php?route=sale/tk_speedy/getStreets&user_token=";
        // line 801
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
                        dataType: 'json',
                        data: {
                            term: function () {
                                return \$('#shipping_speedy_street').val();
                            },
                            city_id: function () {
                                return \$('#shipping_speedy_city_id').val();
                            },
                            abroad: \$('#abroad').val()
                        },
                        success: function (data) {
                            if (data.error) {
                                \$('#shipping_speedy_street').val('');
                                \$('#shipping_speedy_street_id').val('');
                                alert(data.error);
                            } else {
                                if (\$('#shipping_speedy_city_nomenclature').val() == 'FULL') {
                                    if (data.length) {
                                        response(\$.map(data, function (item) {
                                            return {
                                                label: item['label'],
                                                value: item['value'],
                                                id: item['id']
                                            }
                                        }));
                                    }
                                } else {
                                    response(\$.map(data, function (item) {
                                        return {
                                            label: item['label'],
                                            value: item['value'],
                                            id: item['id']
                                        }
                                    }));
                                }
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            //alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
                        }
                    });
                }
            },
            'select': function (item) {
                if (item) {
                    shipping_speedy_street = item.value;
                    \$('#shipping_speedy_street').val(item.value);
                    \$('#shipping_speedy_street_id').val(item.id);
                }
            },
            'change': function (item) {
                if (!item) {
                    if (!item && \$('#shipping_speedy_city_nomenclature').val() == 'FULL') {
                        \$('#shipping_speedy_street').val('');
                        \$('#shipping_speedy_street_id').val('');
                    }
                }
            }
        });

        \$('#shipping_speedy_street').blur(function () {
            if ((\$(this).val() != shipping_speedy_street) && (\$('#shipping_speedy_city_nomenclature').val() == 'FULL')) {
                \$('#shipping_speedy_street').val('');
                \$('#shipping_speedy_street_id').val('');
            }
        });


        \$('#shipping_speedy_country').autocomplete({
            'source': function (request, response) {
                if (request) {
                    \$.ajax({
                        url: 'index.php?route=sale/tk_speedy/getCountries&user_token=";
        // line 874
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
                        dataType: 'json',
                        type: 'get',
                        data: {
                            term: request,
                            abroad: \$('#abroad').val()
                        },
                        success: function (json) {
                            if (\$('#shipping_speedy_country').is(\":focus\")) {
                                response(\$.map(json, function (item) {
                                    return {
                                        label: item['name'],
                                        value: item['name'],
                                        id: item['id'],
                                        nomenclature: item['nomenclature'],
                                        required_state: item['required_state'],
                                        required_postcode: item['required_postcode'],
                                        active_currency_code: item['active_currency_code'],
                                        address_nomenclature: item['address_nomenclature'],
                                    }
                                }));
                            }
                        }
                    });
                }
            },
            'select': function (item) {
                if (item) {
                    \$('#abroad_shipping_speedy_state, #abroad_shipping_speedy_postcode').removeClass('required');
                    shipping_speedy_country = item.value;
                    \$('#shipping_speedy_country').val(item.value);
                    \$('#shipping_speedy_country_id').val(item.id);
                    \$('#shipping_speedy_country_nomenclature').val(item.nomenclature);
                    \$('#required_state').val(item.required_state);
                    \$('#required_postcode').val(item.required_postcode);
                    \$('#shipping_speedy_active_currency_code').val(item.active_currency_code);

                    if (item.address_nomenclature) {
                        \$('#country_has_address_nomenclature').show();
                        \$('#country_has_no_address_nomenclature').hide();
                    } else {
                        \$('#country_has_address_nomenclature').hide();
                        \$('#country_has_no_address_nomenclature').show();
                    }

                    if (!item.active_currency_code) {
                        \$('#shipping_speedy_cod_container').hide();
                        \$('#shipping_speedy_total_container').hide();
                        \$('#shipping_speedy_option_before_payment_container').hide();
                        \$('#shipping_speedy_cod_no').click();
                        \$('#shipping_speedy_cod_status').val(0);
                    } else {
                        \$('#shipping_speedy_cod_container').show();
                        \$('#shipping_speedy_total_container').show();
                        \$('#shipping_speedy_option_before_payment_container').show();
                        \$('#shipping_speedy_cod_container').show();
                        \$('#shipping_speedy_cod_status').val(1);
                    }

                    if (item.required_state) {
                        \$('#abroad_shipping_speedy_state').addClass('required');
                    } else {
                        \$('#abroad_shipping_speedy_state').removeClass('required');
                    }

                    if (item.required_postcode) {
                        \$('#abroad_shipping_speedy_postcode').addClass('required');
                    } else {
                        \$('#abroad_shipping_speedy_postcode').removeClass('required');
                    }
                }
            },
            'change': function (item) {
                if (!item) {
                    \$('#to_office').hide();
                    \$('[name=to_office][value=0]').trigger('click');

                    \$('#shipping_speedy_country').val('');
                    \$('#shipping_speedy_country_id').val('');
                    \$('#shipping_speedy_country_nomenclature').val('');
                    \$('#shipping_speedy_state').val('');
                    \$('#shipping_speedy_state_id').val('');
                    \$('#shipping_speedy_city').val('');
                    \$('#shipping_speedy_city_id').val('');
                    \$('#shipping_speedy_city_nomenclature').val('');
                    \$('#shipping_speedy_quarter').val('');
                    \$('#shipping_speedy_quarter_id').val('');
                    \$('#shipping_speedy_street').val('');
                    \$('#shipping_speedy_street_id').val('');
                    \$('#shipping_speedy_street_no').val('');
                    \$('#shipping_speedy_block_no').val('');
                    \$('#shipping_speedy_entrance_no').val('');
                    \$('#shipping_speedy_floor_no').val('');
                    \$('#shipping_speedy_apartment_no').val('');
                    \$('#shipping_speedy_note').val('');
                    \$('#shipping_speedy_postcode').val('');
                    \$('#shipping_speedy_fixed_time_cb').val('');
                }
            }
        });

        \$('#shipping_speedy_country').blur(function () {
            if (\$(this).val() != shipping_speedy_country) {
                \$('#to_office').hide();
                \$('[name=to_office][value=0]').trigger('click');

                \$(this).val('');
                \$('#shipping_speedy_country_id').val('');
                \$('#shipping_speedy_country_nomenclature').val('');
                \$('#shipping_speedy_state').val('');
                \$('#shipping_speedy_state_id').val('');
                \$('#shipping_speedy_city').val('');
                \$('#shipping_speedy_city_id').val('');
                \$('#shipping_speedy_city_nomenclature').val('');
                \$('#shipping_speedy_quarter').val('');
                \$('#shipping_speedy_quarter_id').val('');
                \$('#shipping_speedy_street').val('');
                \$('#shipping_speedy_street_id').val('');
                \$('#shipping_speedy_street_no').val('');
                \$('#shipping_speedy_block_no').val('');
                \$('#shipping_speedy_entrance_no').val('');
                \$('#shipping_speedy_floor_no').val('');
                \$('#shipping_speedy_apartment_no').val('');
                \$('#shipping_speedy_note').val('');
                \$('#shipping_speedy_postcode').val('');
                \$('#shipping_speedy_fixed_time_cb').val('');
            }
        });

        \$('#shipping_speedy_state').autocomplete({
            'source': function (request, response) {
                if (request) {
                    \$.ajax({
                        url: 'index.php?route=sale/tk_speedy/getStates&user_token=";
        // line 1007
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
                        dataType: 'json',
                        type: 'get',
                        data: {
                            term: request,
                            country_id: \$('#shipping_speedy_country_id').val()
                        },
                        success: function (json) {
                            if (\$('#shipping_speedy_state').is(\":focus\")) {
                                response(\$.map(json, function (item) {
                                    return {
                                        label: item['name'],
                                        value: item['name'],
                                        id: item['id']
                                    }
                                }));
                            }
                        }
                    });
                }
            },
            'select': function (item) {
                if (item) {
                    shipping_speedy_state = item.value;
                    \$('#shipping_speedy_state').val(item.value);
                    \$('#shipping_speedy_state_id').val(item.id);
                }
            },
            'change': function (item) {
                if (!item) {
                    \$('#shipping_speedy_state').val('');
                    \$('#shipping_speedy_state_id').val('');
                }
            }
        });

        \$('#shipping_speedy_state').blur(function () {
            if (\$(this).val() != shipping_speedy_state) {
                \$(this).val('');
                \$('#shipping_speedy_state_id').val('');
            }
        });

    });
</script>
";
        // line 1052
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "sale/tk_speedy.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1785 => 1052,  1737 => 1007,  1601 => 874,  1525 => 801,  1452 => 731,  1431 => 713,  1402 => 687,  1375 => 663,  1357 => 648,  1351 => 645,  1305 => 602,  1294 => 594,  1290 => 593,  1286 => 592,  1282 => 591,  1278 => 590,  1262 => 577,  1258 => 576,  1254 => 575,  1250 => 574,  1192 => 519,  1176 => 506,  1160 => 493,  1147 => 482,  1141 => 480,  1139 => 479,  1136 => 478,  1130 => 477,  1122 => 475,  1114 => 473,  1111 => 472,  1107 => 471,  1103 => 470,  1097 => 467,  1091 => 466,  1084 => 462,  1079 => 460,  1073 => 459,  1063 => 452,  1055 => 447,  1047 => 442,  1038 => 436,  1026 => 427,  1021 => 425,  1017 => 423,  1011 => 421,  1009 => 420,  1005 => 419,  1001 => 418,  996 => 416,  989 => 414,  982 => 410,  978 => 409,  973 => 407,  967 => 406,  959 => 401,  953 => 400,  948 => 398,  942 => 397,  936 => 394,  930 => 393,  923 => 389,  918 => 387,  914 => 386,  910 => 385,  905 => 383,  900 => 381,  891 => 375,  886 => 373,  879 => 369,  872 => 364,  867 => 362,  862 => 361,  857 => 359,  852 => 358,  850 => 357,  839 => 349,  834 => 347,  828 => 346,  822 => 342,  817 => 340,  812 => 339,  807 => 337,  802 => 336,  800 => 335,  792 => 332,  786 => 331,  780 => 327,  775 => 325,  770 => 324,  765 => 322,  760 => 321,  758 => 320,  752 => 317,  745 => 312,  739 => 311,  731 => 309,  723 => 307,  720 => 306,  716 => 305,  710 => 302,  703 => 297,  697 => 296,  689 => 294,  681 => 292,  678 => 291,  674 => 290,  668 => 287,  662 => 286,  655 => 282,  650 => 280,  644 => 279,  636 => 274,  630 => 273,  625 => 271,  619 => 270,  613 => 267,  605 => 262,  596 => 255,  590 => 254,  582 => 252,  574 => 250,  571 => 249,  567 => 248,  561 => 245,  553 => 240,  548 => 238,  541 => 233,  535 => 232,  527 => 230,  519 => 228,  516 => 227,  512 => 226,  506 => 223,  498 => 217,  492 => 216,  490 => 215,  480 => 212,  470 => 209,  460 => 206,  450 => 203,  444 => 201,  439 => 200,  437 => 199,  430 => 195,  426 => 194,  422 => 193,  418 => 192,  410 => 187,  404 => 183,  398 => 181,  396 => 180,  392 => 179,  387 => 177,  381 => 173,  375 => 171,  373 => 170,  369 => 169,  364 => 167,  357 => 162,  351 => 161,  343 => 159,  335 => 157,  332 => 156,  327 => 155,  321 => 153,  319 => 152,  313 => 149,  307 => 145,  301 => 143,  299 => 142,  295 => 141,  290 => 139,  257 => 108,  251 => 106,  249 => 105,  245 => 104,  238 => 100,  230 => 95,  222 => 89,  216 => 87,  214 => 86,  210 => 85,  200 => 78,  192 => 72,  186 => 70,  184 => 69,  180 => 68,  168 => 58,  163 => 56,  160 => 55,  153 => 52,  151 => 51,  146 => 49,  142 => 47,  137 => 44,  125 => 40,  113 => 39,  109 => 37,  105 => 36,  100 => 34,  97 => 33,  95 => 32,  90 => 30,  86 => 29,  81 => 27,  75 => 24,  71 => 22,  63 => 18,  61 => 17,  55 => 13,  44 => 11,  40 => 10,  35 => 8,  28 => 6,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/* 	<div class="page-header">*/
/* 		<div class="container-fluid">*/
/* 			<div class="pull-right">*/
/* 				<a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-default"><i class="fa fa-reply"></i></a>*/
/* 			</div>*/
/* 			<h1>{{ heading_title }}</h1>*/
/* 			<ul class="breadcrumb">*/
/* 				{% for breadcrumb in breadcrumbs %}*/
/* 					<li><a href="{{ breadcrumb['href'] }}">{{ breadcrumb['text'] }}</a></li>*/
/* 				{% endfor %}*/
/* 			</ul>*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="container-fluid">*/
/* 		{% if (error_warning) %}*/
/* 			<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/* 				<button type="button" class="close" data-dismiss="alert">&times;</button>*/
/* 			</div>*/
/* 		{% endif %}*/
/* 		<div class="panel panel-default">*/
/* 			<div class="panel-heading">*/
/* 				<h3 class="panel-title"><i class="fa fa-pencil"></i> {{ heading_title }}</h3>*/
/* 			</div>*/
/* 			<div class="panel-body">*/
/* 				<form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-speedy" class="form-horizontal">*/
/* 					*/
/* 					<input id="shipping_speedy_taking_date" type="hidden" name="taking_date" value="{{ taking_date }}"/>*/
/* 					<input type="hidden" id="abroad" name="abroad" value="{{ abroad }}"/>*/
/* 					*/
/* 					{% if (quote is not empty) %}*/
/* 						<div class="form-group">*/
/* 							<label class="col-sm-4 control-label">{{ entry_shipping_method }}</label>*/
/* 							<div class="col-sm-8">*/
/* 								{% for shipping_method_key_id,shipping_method in quote['quote'] %}*/
/* 									<div class="radio">*/
/* 										<label>*/
/* 											<input type="radio" id="{{ shipping_method['code'] }}" data-shipping_method_id="{{ shipping_method_key_id }}" name="shipping_method" value="{{ shipping_method['code'] }}" {% if (shipping_method_key_id == shipping_method_id or quote['quote']|length == 1) %} checked="checked"{% endif %} />*/
/* 											{{ shipping_method['title'] }}&nbsp;{{ shipping_method['text'] }}*/
/* 										</label>*/
/* 									</div>*/
/* 								{% endfor %}*/
/* 							</div>*/
/* 						</div>*/
/* 					{% endif %}*/
/* 					*/
/* 					<div class="form-group">*/
/* 						<b><label class="col-sm-4 control-label" for="shipping_speedy_note">{{ text_calculate }}</label></b>*/
/* 						<div class="col-sm-8">*/
/* 							{% if (quote is not empty) %}*/
/* 								<a id="createBillOfLading" onclick="speedySubmit();" class="btn btn-primary">2 - {{ button_create }}*/
/* 									товарителница</a>*/
/* 							{% else %}*/
/* 								<a onclick="$('#calculate').val('1'); $('#form-speedy :input').removeAttr('disabled'); $('#form-speedy').submit();" class="btn btn-primary">1*/
/* 									- {{ button_calculate }}</a>*/
/* 							{% endif %}*/
/* 							<input type="hidden" id="calculate" name="calculate" value="0"/>*/
/* 							<input type="hidden" id="recalculate" name="recalculate" value="0"/>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<hr>*/
/* 					*/
/* 					<div class="form-group required">*/
/* 						<label class="col-sm-4 control-label" for="custmer_name">Име на клиент</label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="text" id="custmer_name" name="custmer_name" value="{{ custmer_name }}"/>*/
/* 							{% if (error_custmer_name) %}*/
/* 								<span class="text-danger">{{ error_custmer_name }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 					</div>*/
/* */
/* 					<div class="form-group">*/
/* 						<label class="col-sm-4 control-label" for="custmer_contact">Име на фирма (не е задължително) </label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="text" id="custmer_contact" name="custmer_contact" value="{{ custmer_contact }}"/>*/
/* 						</div>*/
/* 					</div>*/
/* */
/* 					<div class="form-group required">*/
/* 						<label class="col-sm-4 control-label" for="custmer_telephone">Телефон на клиент</label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="text" id="custmer_telephone" name="custmer_telephone" value="{{ custmer_telephone }}"/>*/
/* 							{% if (error_custmer_telephone) %}*/
/* 								<span class="text-danger">{{ error_custmer_telephone }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-4 control-label" for="custmer_email">Е-майл на клиент</label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="text" id="custmer_email" name="custmer_email" value="{{ custmer_email }}"/>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group required">*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_contents">{{ entry_contents }}*/
/* 							<div style="font-weight: normal">Брой символи: <strong id="count-contents"></strong></div>*/
/* 						</label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="text" id="shipping_speedy_contents" name="contents" value="{{ contents }}"/>*/
/* 							{% if (error_contents) %}*/
/* 								<span class="text-danger">{{ error_contents }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 					</div>*/
/* 					<script>*/
/*               $('#shipping_speedy_contents').keyup(countname);*/
/*               $('#shipping_speedy_contents').keydown(countname);*/
/* */
/*               function countname() {*/
/*                   var cs_1_speedy_contents = $(this).val().length;*/
/*                   $('#count-contents').text(cs_1_speedy_contents);*/
/* */
/*                   if (cs_1_speedy_contents > 100 || cs_1_speedy_contents == 0) {*/
/*                       $('#count-contents').css('color', 'red');*/
/*                   } else {*/
/*                       $('#count-contents').css('color', 'green');*/
/*                   }*/
/*               }*/
/* */
/*               $(document).ready(function () {*/
/*                   var cs_2_speedy_contents = $('#shipping_speedy_contents').val().length;*/
/*                   $('#count-contents').text(cs_2_speedy_contents);*/
/* */
/*                   if (cs_2_speedy_contents > 100 || cs_2_speedy_contents == 0) {*/
/*                       $('#count-contents').css('color', 'red');*/
/*                   } else {*/
/*                       $('#count-contents').css('color', 'green');*/
/*                   }*/
/*               });*/
/* 					*/
/* 					</script>*/
/* 					*/
/* 					<div class="form-group required">*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_packing">{{ entry_packing }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="text" id="shipping_speedy_packing" name="packing" value="{{ packing }}"/>*/
/* 							{% if (error_packing) %}*/
/* 								<span class="text-danger">{{ error_packing }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group required">*/
/* 						<label class="col-sm-4 control-label" for="client_id">{{ entry_client_id }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<select name="client_id" id="speedy_client_id" class="form-control">*/
/* 								{% if clients|length > 1 or clients|length == 0 %}*/
/* 									<option value="0">{{ text_none }}</option>*/
/* 								{% endif %}*/
/* 								{% for client in clients %}*/
/* 									{% if client.clientId == client_id %}*/
/* 										<option value="{{ client.clientId }}" selected="selected">{{ text_client_id|format(client.clientId, client.name, client.address) }}</option>*/
/* 									{% else %}*/
/* 										<option value="{{ client.clientId }}">{{ text_client_id|format(client.clientId, client.name, client.address) }}</option>*/
/* 									{% endif %}*/
/* 								{% endfor %}*/
/* 							</select>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group required">*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_weight">{{ entry_weight }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="text" id="shipping_speedy_weight" name="weight" value="{{ weight }}"/>*/
/* 							{% if (error_weight) %}*/
/* 								<span class="text-danger">{{ error_weight }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group required">*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_count">{{ entry_count }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="text" id="shipping_speedy_count" name="count" value="{{ count }}"/>*/
/* 							{% if (error_count) %}*/
/* 								<span class="text-danger">{{ error_count }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_width">{{ entry_size }}</label>*/
/* 						<div class="table-responsive col-sm-8">*/
/* 							<table id="parcels_size" class="table table-striped table-bordered table-hover">*/
/* 								<thead>*/
/* 								<tr>*/
/* 									<td class="text-left">{{ entry_width }}</td>*/
/* 									<td class="text-left">{{ entry_height }}</td>*/
/* 									<td class="text-left">{{ entry_depth }}</td>*/
/* 									<td class="text-left">{{ entry_parcel_weight }}</td>*/
/* 								</tr>*/
/* 								</thead>*/
/* 								<tbody>*/
/* 								{% set parcels_size_row = 1 %}*/
/* 								{% for parcels_size in parcels_sizes %}*/
/* 									<tr id="parcel-size-row{{ parcels_size_row }}">*/
/* 										<td class="text-left">*/
/* 											<input type="text" name="parcels_size[{{ parcels_size_row }}][width]" value="{{ parcels_size['width'] }}" placeholder="{{ entry_width }}" class="form-control"/>*/
/* 										</td>*/
/* 										<td class="text-left">*/
/* 											<input type="text" name="parcels_size[{{ parcels_size_row }}][height]" value="{{ parcels_size['height'] }}" placeholder="{{ entry_height }}" class="form-control"/>*/
/* 										</td>*/
/* 										<td class="text-left">*/
/* 											<input type="text" name="parcels_size[{{ parcels_size_row }}][depth]" value="{{ parcels_size['depth'] }}" placeholder="{{ entry_depth }}" class="form-control"/>*/
/* 										</td>*/
/* 										<td class="text-left">*/
/* 											<input type="text" name="parcels_size[{{ parcels_size_row }}][weight]" value="{{ parcels_size['weight'] }}" placeholder="{{ entry_parcel_weight }}" class="form-control"/>*/
/* 										</td>*/
/* 									</tr>*/
/* 									{% set parcels_size_row = parcels_size_row + 1 %}*/
/* 								{% endfor %}*/
/* 								</tbody>*/
/* 							</table>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_parcel_sizes">{{ entry_min_parcel_size }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<select name="parcel_size" id="shipping_speedy_parcel_sizes" class="form-control">*/
/* 								{% for key,option in parcel_sizes %}*/
/* 									{% if (key == parcel_size) %}*/
/* 										<option value="{{ key }}" selected="selected">{{ option }}</option>*/
/* 									{% else %}*/
/* 										<option value="{{ key }}">{{ option }}</option>*/
/* 									{% endif %}*/
/* 								{% endfor %}*/
/* 							</select>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_client_note">{{ entry_client_note }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<textarea class="form-control" type="text" id="speedy_client_note" name="client_note" row="3">{{ client_note }}</textarea>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-4 control-label" for="payer_type">{{ entry_payer_type }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<select name="payer_type" id="payer_type" class="form-control">*/
/* 								{% for option_id, option in return_payer_types %}*/
/* 									{% if option_id == payer_type %}*/
/* 										<option value="{{ option_id }}" selected="selected">{{ option }}</option>*/
/* 									{% else %}*/
/* 										<option value="{{ option_id }}">{{ option }}</option>*/
/* 									{% endif %}*/
/* 								{% endfor %}*/
/* 							</select>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_deffered_days">Брой дни за отлагане</label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="number" id="shipping_speedy_deffered_days" name="deffered_days" value="{{ deffered_days }}"/>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group" id="shipping_speedy_cod_container">*/
/* 						<label class="col-sm-4 control-label">{{ entry_cod }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<label class="radio-inline" style="display: inline; width: auto; float: none;">*/
/* 								<input type="radio" id="shipping_speedy_cod_yes" name="cod" value="1" {% if (cod) %} checked="checked"{% endif %} onclick="$('#shipping_speedy_total_container').show(); $('#shipping_speedy_option_before_payment_container').show(); "/>*/
/* 								{{ text_yes }}*/
/* 							</label> <label class="radio-inline" style="display: inline; width: auto; float: none;">*/
/* 								<input type="radio" id="shipping_speedy_cod_no" name="cod" value="0" {% if (not cod) %} checked="checked"{% endif %} onclick="$('#shipping_speedy_total_container').hide(); $('#shipping_speedy_option_before_payment_container').hide(); "/>*/
/* 								{{ text_no }}*/
/* 							</label>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group" id="shipping_speedy_total_container" {% if (not cod) %} style="display: none;"{% endif %} >*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_total">{{ entry_total }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="text" id="shipping_speedy_total" name="total" value="{{ total }}"/>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group" id="shipping_speedy_option_before_payment_container" {% if (not cod) %} style="display: none;" {% endif %}>*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_option_before_payment">{{ entry_options_before_payment }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<select name="option_before_payment" id="shipping_speedy_option_before_payment" class="form-control">*/
/* 								{% for option_id,option in options_before_payment %}*/
/* 									{% if (option_id == option_before_payment) %}*/
/* 										<option value="{{ option_id }}" selected="selected">{{ option }}</option>*/
/* 									{% else %}*/
/* 										<option value="{{ option_id }}">{{ option }}</option>*/
/* 									{% endif %}*/
/* 								{% endfor %}*/
/* 							</select>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-4 control-label" for="return_payer_type">{{ entry_return_payer_type }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<select name="return_payer_type" id="return_payer_type" class="form-control">*/
/* 								{% for option_id, option in return_payer_types %}*/
/* 									{% if option_id == return_payer_type %}*/
/* 										<option value="{{ option_id }}" selected="selected">{{ option }}</option>*/
/* 									{% else %}*/
/* 										<option value="{{ option_id }}">{{ option }}</option>*/
/* 									{% endif %}*/
/* 								{% endfor %}*/
/* 							</select>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_insurance">{{ entry_insurance }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<select class="form-control" id="shipping_speedy_insurance" name="insurance" onchange="$('#shipping_speedy_fragile').parent().parent().toggle(); $('#shipping_speedy_total_insurance').parent().parent().toggle();">*/
/* 								{% if (insurance) %}*/
/* 									<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 									<option value="0">{{ text_no }}</option>*/
/* 								{% else %}*/
/* 									<option value="1">{{ text_yes }}</option>*/
/* 									<option value="0" selected="selected">{{ text_no }}</option>*/
/* 								{% endif %}*/
/* 							</select>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group" {% if (not insurance) %} style="display: none;"{% endif %} >*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_fragile"><span data-toggle="tooltip" title="{{ help_fragile }}">{{ entry_fragile }}</span></label>*/
/* 						<div class="col-sm-8">*/
/* 							<select class="form-control" id="shipping_speedy_fragile" name="fragile">*/
/* 								{% if (fragile) %}*/
/* 									<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 									<option value="0">{{ text_no }}</option>*/
/* 								{% else %}*/
/* 									<option value="1">{{ text_yes }}</option>*/
/* 									<option value="0" selected="selected">{{ text_no }}</option>*/
/* 								{% endif %}*/
/* 							</select>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group" {% if (not insurance) %} style="display: none;"{% endif %} >*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_total_insurance">{{ entry_total_insurance }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="text" id="shipping_speedy_total_insurance" name="totalNoShipping" value="{{ totalNoShipping }}"/>*/
/* 						</div>*/
/* 					</div>*/
/* */
/* 					<div class="form-group">*/
/* 						<label class="col-sm-4 control-label" >Заявка за обратна пратка</label>*/
/* 						<div class="col-sm-8">*/
/* 							<select class="form-control" name="swap">*/
/* 								{% if (swap) %}*/
/* 									<option value="1" selected="selected">{{ text_yes }}</option>*/
/* 									<option value="0">{{ text_no }}</option>*/
/* 								{% else %}*/
/* 									<option value="1">{{ text_yes }}</option>*/
/* 									<option value="0" selected="selected">{{ text_no }}</option>*/
/* 								{% endif %}*/
/* 							</select>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<hr>*/
/* 					<input type="hidden" id="shipping_speedy_country_id" name="country_id" value="{{ country_id }}"/>*/
/* 					*/
/* 					<div class="form-group">*/
/* 						<div class="required">*/
/* 							<label class="col-sm-4 control-label" for="speedy_country">{{ entry_country }}</label>*/
/* 							<div class="col-sm-5">*/
/* 								<input type="search" autocomplete="off" id="shipping_speedy_country" name="country" value="{{ country }}" class="form-control"/>*/
/* 							</div>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_city">{{ entry_city }}</label>*/
/* 						<div class="col-sm-6">*/
/* 							<input class="form-control" type="text" id="shipping_speedy_city" name="city" value="{{ city }}"/>*/
/* 						</div>*/
/* 						<input type="hidden" id="shipping_speedy_city_id" name="city_id" value="{{ city_id }}"/>*/
/* 						<input type="hidden" id="shipping_speedy_city_nomenclature" name="city_nomenclature" value="{{ city_nomenclature }}"/>*/
/* 						<label class="col-sm-1 control-label" for="shipping_speedy_postcode">{{ entry_postcode }}</label>*/
/* 						<div class="col-sm-1">*/
/* 							<input class="form-control" type="text" id="shipping_speedy_postcode" name="postcode" value="{{ postcode }}" disabled="disabled"/>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group" id="to_office" {% if (offices is empty) %}style="display:none;" {% endif %}>*/
/* 						<label class="col-sm-4 control-label">{{ entry_shipping_to }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<label class="radio-inline" style="display: inline; width: auto; float: none;">*/
/* 								<input type="radio" id="shipping_speedy_shipping_to_door" name="to_office" value="0" {% if (not to_office) %} checked="checked"{% endif %} onclick="$('#shipping_speedy_quarter_container,#shipping_speedy_street_container,#shipping_speedy_block_no_container,#shipping_speedy_note_container').show(); $('#shipping_speedy_office_container').hide();"/>*/
/* 								{{ text_to_door }}*/
/* 							</label> <label class="radio-inline" style="display: inline; width: auto; float: none;">*/
/* 								<input type="radio" id="shipping_speedy_shipping_to_office" name="to_office" value="1" {% if (to_office) %} checked="checked"{% endif %} onclick="$('#shipping_speedy_quarter_container,#shipping_speedy_street_container,#shipping_speedy_block_no_container,#shipping_speedy_note_container').hide(); $('#shipping_speedy_office_container').show();"/>*/
/* 								{{ text_to_office }}*/
/* 							</label>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group" id="shipping_speedy_quarter_container" {% if (to_office) %} style="display: none;"{% endif %} >*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_quarter">{{ entry_quarter }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="text" id="shipping_speedy_quarter" name="quarter" value="{{ quarter }}"/>*/
/* 							<input type="hidden" id="shipping_speedy_quarter_id" name="quarter_id" value="{{ quarter_id }}"/>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group" id="shipping_speedy_street_container" {% if (to_office) %} style="display: none;"{% endif %} >*/
/* 						*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_street">{{ entry_street }}</label>*/
/* 						<div class="col-sm-6">*/
/* 							<input class="form-control" type="text" id="shipping_speedy_street" name="street" value="{{ street }}"/>*/
/* 							<input type="hidden" id="shipping_speedy_street_id" name="street_id" value="{{ street_id }}"/>*/
/* 							{% if (error_address) %}*/
/* 								<span class="text-danger">{{ error_address }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 						*/
/* 						<label class="col-sm-1 control-label" for="shipping_speedy_street_no">{{ entry_street_no }}</label>*/
/* 						<div class="col-sm-1">*/
/* 							<input class="form-control" type="text" id="shipping_speedy_street_no" name="street_no" value="{{ street_no }}"/>*/
/* 						</div>*/
/* 						*/
/* 						<div class="clearfix"></div>*/
/* 						<hr>*/
/* 						<div class="clearfix"></div>*/
/* 						*/
/* 						<label class="col-sm-4 control-label" for="speedy_block_no">Блок:</label>*/
/* 						<div class="col-sm-2">*/
/* 							<input class="form-control" type="text" autocomplete="off" id="shipping_speedy_block_no" name="block_no" value="{{ block_no }}">*/
/* 							<ul class="dropdown-menu"></ul>*/
/* 						</div>*/
/* 						*/
/* 						<label class="col-sm-1 control-label" for="speedy_entrance_no">Вход:</label>*/
/* 						<div class="col-sm-1">*/
/* 							<input class="form-control" type="text" autocomplete="off" id="shipping_speedy_entrance_no" name="entrance_no" value="{{ entrance_no }}">*/
/* 						</div>*/
/* 						*/
/* 						<label class="col-sm-1 control-label" for="speedy_floor_no">Етаж:</label>*/
/* 						<div class="col-sm-1">*/
/* 							<input class="form-control" type="text" autocomplete="off" id="shipping_speedy_floor_no" name="floor_no" value="{{ floor_no }}">*/
/* 						</div>*/
/* 						*/
/* 						<label class="col-sm-1 control-label" for="speedy_apartment_no">Апартамент:</label>*/
/* 						<div class="col-sm-1">*/
/* 							<input class="form-control" type="text" autocomplete="off" id="shipping_speedy_apartment_no" name="apartment_no" value="{{ apartment_no }}">*/
/* 						</div>*/
/* 						*/
/* 						<div class="clearfix"></div>*/
/* 					*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group" id="shipping_speedy_note_container" {% if (to_office) %} style="display: none;"{% endif %} >*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_note">{{ entry_note }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<input class="form-control" type="text" id="shipping_speedy_note" name="note" value="{{ note }}"/>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					<div class="form-group" id="shipping_speedy_office_container" {% if (not to_office) %} style="display: none;"{% endif %} >*/
/* 						<label class="col-sm-4 control-label" for="shipping_speedy_office_id">{{ entry_office }}</label>*/
/* 						<div class="col-sm-8">*/
/* 							<select class="form-control" id="shipping_speedy_office_id" name="office_id">*/
/* 								<option value="0">{{ text_select_office }}</option>*/
/* 								{% for office in offices %}*/
/* 									{% if (office['id'] == office_id) %}*/
/* 										<option value="{{ office['id'] }}" selected="selected">{{ office['label'] }}</option>*/
/* 									{% else %}*/
/* 										<option value="{{ office['id'] }}">{{ office['label'] }}</option>*/
/* 									{% endif %}*/
/* 								{% endfor %}*/
/* 							</select>*/
/* 							{% if (error_office) %}*/
/* 								<br/>&nbsp;&nbsp;&nbsp;<span class="text-danger">{{ error_office }}</span>*/
/* 							{% endif %}*/
/* 						</div>*/
/* 					</div>*/
/* 				*/
/* 				</form>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* <script type="text/javascript">*/
/*     $('#shipping_speedy_parcel_sizes, #client_id').on('change', function () {*/
/*         if ($('#recalculate').val() == 0) {*/
/*             alert("{{ error_recalculate }}");*/
/* */
/*             $('#createBillOfLading').attr('disabled', 'disabled');*/
/*             $('#recalculate').val('1');*/
/*         }*/
/*     });*/
/* */
/*     function speedySubmit() {*/
/*         $('#createBillOfLading').off('click');*/
/*         $('#createBillOfLading').attr('disabled', 'disabled');*/
/*         if ($('[name="shipping_method"][value^="speedy."]:checked').length) {*/
/*             var shipping_method_id = $('[name="shipping_method"][value^="speedy."]:checked').data('shipping_method_id');*/
/*         } else {*/
/*             var shipping_method_id = '{{ shipping_method_id }}';*/
/*         }*/
/*         var post_data = {*/
/*             'shipping_method_id': shipping_method_id,*/
/*             'abroad': $('#abroad').val()*/
/*         };*/
/* 		    */
/*         post_data.speedy_shipping_to_office = $('input[name=to_office]:checked').val();*/
/*         post_data.speedy_option_before_payment = $('#shipping_speedy_option_before_payment').val();*/
/*         post_data.speedy_city_id = $('#shipping_speedy_city_id').val();*/
/*         post_data.speedy_office_id = $('#shipping_speedy_office_id').val();*/
/* */
/*         $.ajax({*/
/*             url: 'index.php?route=sale/tk_speedy/generate&user_token={{ user_token }}',*/
/*             type: 'POST',*/
/*             data: post_data,*/
/*             dataType: 'json',*/
/*             success: function (data) {*/
/*                 if (data.error) {*/
/*                     var confurm = 1;*/
/* */
/*                     if (data.taking_date) {*/
/*                         $('#shipping_speedy_taking_date').val(data.taking_date);*/
/*                     }*/
/* */
/*                     for (error in data.errors) {*/
/*                         if (!confirm(data.errors[error])) {*/
/*                             confurm = 0;*/
/*                         }*/
/*                     }*/
/* */
/*                     if (confurm) {*/
/*                         $('#form-speedy :input').removeAttr('disabled');*/
/*                         $('#form-speedy').submit();*/
/*                     }*/
/*                 } else {*/
/*                     $('#form-speedy :input').removeAttr('disabled');*/
/*                     $('#form-speedy').submit();*/
/*                 }*/
/*             },*/
/*             error: function (xhr, ajaxOptions, thrownError) {*/
/*                 //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/*             }*/
/*         });*/
/*     }*/
/* */
/* */
/*     var shipping_speedy_count_previous;*/
/* */
/*     $('#shipping_speedy_count').keydown(function (e) {*/
/*         if (!e.key.match(/\d/)) {*/
/*             e.preventDefault()*/
/*         }*/
/*     }).on('focus', function () {*/
/*         shipping_speedy_count_previous = parseInt($(this).val());*/
/*     }).change(function () {*/
/*         if (parseInt(shipping_speedy_count_previous) < parseInt($(this).val())) {*/
/*             addParcelsSize(parseInt(shipping_speedy_count_previous) + 1, parseInt($(this).val()));*/
/*         } else {*/
/*             removeParcelsSize(parseInt($(this).val()), parseInt(shipping_speedy_count_previous));*/
/*         }*/
/* */
/*         shipping_speedy_count_previous = parseInt($(this).val());*/
/*     });*/
/* */
/*     function addParcelsSize(old_rows, new_rows) {*/
/*         for (i = old_rows; i <= new_rows; i++) {*/
/*             html = '<tr id="parcel-size-row' + i + '">';*/
/*             html += ' <td class="text-left"><input type="text" name="parcels_size[' + i + '][width]" value="" placeholder="{{ entry_width }}" class="form-control" /></td>';*/
/*             html += ' <td class="text-left"><input type="text" name="parcels_size[' + i + '][height]" value="" placeholder="{{ entry_height }}" class="form-control" /></td>';*/
/*             html += ' <td class="text-left"><input type="text" name="parcels_size[' + i + '][depth]" value="" placeholder="{{ entry_depth }}" class="form-control" /></td>';*/
/*             html += ' <td class="text-left"><input type="text" name="parcels_size[' + i + '][weight]" value="" placeholder="{{ entry_parcel_weight }}" class="form-control" /></td>';*/
/*             html += '</tr>';*/
/* */
/*             $('#parcels_size tbody').append(html);*/
/*         }*/
/*     }*/
/* */
/*     function removeParcelsSize(old_rows, new_rows) {*/
/*         for (i = new_rows; i > old_rows; i--) {*/
/*             $('#parcel-size-row' + i).remove();*/
/*         }*/
/*     }*/
/* */
/*     var shipping_speedy_city = '{{ city }}';*/
/*     var shipping_speedy_quarter = '{{ quarter }}';*/
/*     var shipping_speedy_street = '{{ street }}';*/
/*     var shipping_speedy_country = '{{ country }}';*/
/*     var shipping_speedy_state = '{{ state }}';*/
/* */
/*     $(document).ready(function () {*/
/* 		    */
/*         $('#shipping_speedy_city').autocomplete({*/
/*             'source': function (request, response) {*/
/*                 if (request) {*/
/*                     $.ajax({*/
/*                         url: 'index.php?route=sale/tk_speedy/getCities&user_token={{ user_token }}',*/
/*                         dataType: 'json',*/
/*                         type: 'get',*/
/*                         data: {*/
/*                             term: function () {*/
/*                                 return $('#shipping_speedy_city').val();*/
/*                             },*/
/*                             country_id: $('#shipping_speedy_country_id').val(),*/
/*                             abroad: $('#abroad').val()*/
/*                         },*/
/*                         success: function (json) {*/
/*                             if ($('#shipping_speedy_city').is(":focus")) {*/
/*                                 response($.map(json, function (item) {*/
/*                                     return {*/
/*                                         label: item['label'],*/
/*                                         value: item['value'],*/
/*                                         id: item['id'],*/
/*                                         postcode: item['postcode'],*/
/*                                         nomenclature: item['nomenclature']*/
/*                                     }*/
/*                                 }));*/
/*                             }*/
/*                         }*/
/*                     });*/
/*                 }*/
/*             },*/
/*             'select': function (item) {*/
/*                 if (item) {*/
/*                     shipping_speedy_city = item.value;*/
/*                     $('#shipping_speedy_city').val(item.value);*/
/*                     $('#shipping_speedy_postcode').val(item.postcode);*/
/*                     $('#shipping_speedy_city_id').val(item.id);*/
/*                     $('#shipping_speedy_city_nomenclature').val(item.nomenclature);*/
/*                     $('#shipping_speedy_quarter').val('');*/
/*                     $('#shipping_speedy_quarter_id').val('');*/
/*                     $('#shipping_speedy_street').val('');*/
/*                     $('#shipping_speedy_street_id').val('');*/
/*                     $('#shipping_speedy_street_no').val('');*/
/*                     $('#shipping_speedy_block_no').val('');*/
/*                     $('#shipping_speedy_entrance_no').val('');*/
/*                     $('#shipping_speedy_floor_no').val('');*/
/*                     $('#shipping_speedy_apartment_no').val('');*/
/*                     $('#shipping_speedy_note').val('');*/
/*                     $('#shipping_speedy_office_id').html('<option value="0">{{ text_wait }}</option>');*/
/* */
/*                     $.ajax({*/
/*                         url: 'index.php?route=sale/tk_speedy/getOffices&user_token={{ user_token }}',*/
/*                         dataType: 'json',*/
/*                         data: {*/
/*                             city_id: item.id,*/
/*                             abroad: $('#abroad').val(),*/
/*                             country_id: $('#shipping_speedy_country_id').val()*/
/*                         },*/
/*                         success: function (data) {*/
/*                             if (data.error) {*/
/*                                 alert(data.error);*/
/*                             } else {*/
/*                                 html = '';*/
/* */
/*                                 if (data.length) {*/
/*                                     $('#to_office').show();*/
/*                                     html += '<option value="0">{{ text_select_office }}</option>';*/
/*                                     for (i = 0; i < data.length; i++) {*/
/*                                         html += '<option value="' + data[i]['id'] + '">' + data[i]['label'] + '</option>';*/
/*                                     }*/
/*                                 } else {*/
/*                                     $('#to_office').hide();*/
/*                                     $('[name=to_office][value=0]').trigger('click');*/
/*                                 }*/
/* */
/*                                 $('#shipping_speedy_office_id').html(html);*/
/*                             }*/
/*                         },*/
/*                         error: function (xhr, ajaxOptions, thrownError) {*/
/*                             //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/*                         }*/
/*                     });*/
/*                 }*/
/*             },*/
/*             'change': function (item) {*/
/*                 if (!item && $('#shipping_speedy_country_nomenclature').val() == 'FULL') {*/
/*                     $('#shipping_speedy_city').val('');*/
/*                     $('#shipping_speedy_city_id').val('');*/
/*                     $('#shipping_speedy_city_nomenclature').val('');*/
/*                     $('#shipping_speedy_postcode').val('');*/
/*                     $('#shipping_speedy_office_id').html('<option value="0">{{ text_select_city }}</option>');*/
/*                 }*/
/* */
/*                 $('#shipping_speedy_quarter').val('');*/
/*                 $('#shipping_speedy_quarter_id').val('');*/
/*                 $('#shipping_speedy_street').val('');*/
/*                 $('#shipping_speedy_street_id').val('');*/
/*                 $('#shipping_speedy_street_no').val('');*/
/*                 $('#shipping_speedy_block_no').val('');*/
/*                 $('#shipping_speedy_entrance_no').val('');*/
/*                 $('#shipping_speedy_floor_no').val('');*/
/*                 $('#shipping_speedy_apartment_no').val('');*/
/*                 $('#shipping_speedy_note').val('');*/
/*             }*/
/*         });*/
/* */
/*         $('#shipping_speedy_city').blur(function () {*/
/*             if ($(this).val() != shipping_speedy_city) {*/
/* */
/*                 if (!$('#abroad').val() || ($('#abroad').val() && ($('#shipping_speedy_country_nomenclature').val() == 'FULL'))) {*/
/*                     $('#shipping_speedy_city').val('');*/
/*                 }*/
/* */
/*                 $('#shipping_speedy_city_id').val('');*/
/*                 $('#shipping_speedy_city_nomenclature').val('');*/
/*                 $('#shipping_speedy_postcode').val('');*/
/*                 $('#shipping_speedy_office_id').html('<option value="0">{{ text_select_city }}</option>');*/
/*                 $('#shipping_speedy_quarter').val('');*/
/*                 $('#shipping_speedy_quarter_id').val('');*/
/*                 $('#shipping_speedy_street').val('');*/
/*                 $('#shipping_speedy_street_id').val('');*/
/*                 $('#shipping_speedy_street_no').val('');*/
/*                 $('#shipping_speedy_block_no').val('');*/
/*                 $('#shipping_speedy_entrance_no').val('');*/
/*                 $('#shipping_speedy_floor_no').val('');*/
/*                 $('#shipping_speedy_apartment_no').val('');*/
/*                 $('#shipping_speedy_note').val('');*/
/*             }*/
/*         });*/
/* */
/*         $('#shipping_speedy_quarter').autocomplete({*/
/*             'source': function (request, response) {*/
/*                 if (request) {*/
/*                     $.ajax({*/
/*                         url: 'index.php?route=sale/tk_speedy/getQuarters&user_token={{ user_token }}',*/
/*                         dataType: 'json',*/
/*                         data: {*/
/*                             term: function () {*/
/*                                 return $('#shipping_speedy_quarter').val();*/
/*                             },*/
/*                             city_id: function () {*/
/*                                 return $('#shipping_speedy_city_id').val();*/
/*                             },*/
/*                             abroad: $('#abroad').val()*/
/*                         },*/
/*                         success: function (data) {*/
/*                             if (data.error) {*/
/*                                 $('#shipping_speedy_quarter').val('');*/
/*                                 $('#shipping_speedy_quarter_id').val('');*/
/*                                 alert(data.error);*/
/*                             } else {*/
/*                                 if ($('#shipping_speedy_city_nomenclature').val() == 'FULL') {*/
/*                                     if (data.length) {*/
/*                                         response($.map(data, function (item) {*/
/*                                             return {*/
/*                                                 label: item['label'],*/
/*                                                 value: item['value'],*/
/*                                                 id: item['id'],*/
/*                                             }*/
/*                                         }));*/
/*                                     }*/
/*                                 } else {*/
/*                                     response($.map(data, function (item) {*/
/*                                         return {*/
/*                                             label: item['label'],*/
/*                                             value: item['value'],*/
/*                                             id: item['id'],*/
/*                                         }*/
/*                                     }));*/
/*                                 }*/
/*                             }*/
/*                         },*/
/*                         error: function (xhr, ajaxOptions, thrownError) {*/
/*                             //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/*                         }*/
/*                     });*/
/*                 }*/
/*             },*/
/*             'select': function (item) {*/
/*                 if (item) {*/
/*                     shipping_speedy_quarter = item.value;*/
/*                     $('#shipping_speedy_quarter').val(item.value);*/
/*                     $('#shipping_speedy_quarter_id').val(item.id);*/
/*                 }*/
/*             },*/
/*             'change': function (item) {*/
/*                 if (!item && $('#shipping_speedy_city_nomenclature').val() == 'FULL') {*/
/*                     $('#shipping_speedy_quarter').val('');*/
/*                     $('#shipping_speedy_quarter_id').val('');*/
/*                 }*/
/*             }*/
/*         });*/
/* */
/*         $('#shipping_speedy_quarter').blur(function () {*/
/*             if (($(this).val() != shipping_speedy_quarter) && ($('#shipping_speedy_city_nomenclature').val() == 'FULL')) {*/
/*                 $('#shipping_speedy_quarter').val('');*/
/*                 $('#shipping_speedy_quarter_id').val('');*/
/*             }*/
/*         });*/
/* */
/*         $('#shipping_speedy_street').autocomplete({*/
/*             'source': function (request, response) {*/
/*                 if (request) {*/
/*                     $.ajax({*/
/*                         url: 'index.php?route=sale/tk_speedy/getStreets&user_token={{ user_token }}',*/
/*                         dataType: 'json',*/
/*                         data: {*/
/*                             term: function () {*/
/*                                 return $('#shipping_speedy_street').val();*/
/*                             },*/
/*                             city_id: function () {*/
/*                                 return $('#shipping_speedy_city_id').val();*/
/*                             },*/
/*                             abroad: $('#abroad').val()*/
/*                         },*/
/*                         success: function (data) {*/
/*                             if (data.error) {*/
/*                                 $('#shipping_speedy_street').val('');*/
/*                                 $('#shipping_speedy_street_id').val('');*/
/*                                 alert(data.error);*/
/*                             } else {*/
/*                                 if ($('#shipping_speedy_city_nomenclature').val() == 'FULL') {*/
/*                                     if (data.length) {*/
/*                                         response($.map(data, function (item) {*/
/*                                             return {*/
/*                                                 label: item['label'],*/
/*                                                 value: item['value'],*/
/*                                                 id: item['id']*/
/*                                             }*/
/*                                         }));*/
/*                                     }*/
/*                                 } else {*/
/*                                     response($.map(data, function (item) {*/
/*                                         return {*/
/*                                             label: item['label'],*/
/*                                             value: item['value'],*/
/*                                             id: item['id']*/
/*                                         }*/
/*                                     }));*/
/*                                 }*/
/*                             }*/
/*                         },*/
/*                         error: function (xhr, ajaxOptions, thrownError) {*/
/*                             //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/*                         }*/
/*                     });*/
/*                 }*/
/*             },*/
/*             'select': function (item) {*/
/*                 if (item) {*/
/*                     shipping_speedy_street = item.value;*/
/*                     $('#shipping_speedy_street').val(item.value);*/
/*                     $('#shipping_speedy_street_id').val(item.id);*/
/*                 }*/
/*             },*/
/*             'change': function (item) {*/
/*                 if (!item) {*/
/*                     if (!item && $('#shipping_speedy_city_nomenclature').val() == 'FULL') {*/
/*                         $('#shipping_speedy_street').val('');*/
/*                         $('#shipping_speedy_street_id').val('');*/
/*                     }*/
/*                 }*/
/*             }*/
/*         });*/
/* */
/*         $('#shipping_speedy_street').blur(function () {*/
/*             if (($(this).val() != shipping_speedy_street) && ($('#shipping_speedy_city_nomenclature').val() == 'FULL')) {*/
/*                 $('#shipping_speedy_street').val('');*/
/*                 $('#shipping_speedy_street_id').val('');*/
/*             }*/
/*         });*/
/* */
/* */
/*         $('#shipping_speedy_country').autocomplete({*/
/*             'source': function (request, response) {*/
/*                 if (request) {*/
/*                     $.ajax({*/
/*                         url: 'index.php?route=sale/tk_speedy/getCountries&user_token={{ user_token }}',*/
/*                         dataType: 'json',*/
/*                         type: 'get',*/
/*                         data: {*/
/*                             term: request,*/
/*                             abroad: $('#abroad').val()*/
/*                         },*/
/*                         success: function (json) {*/
/*                             if ($('#shipping_speedy_country').is(":focus")) {*/
/*                                 response($.map(json, function (item) {*/
/*                                     return {*/
/*                                         label: item['name'],*/
/*                                         value: item['name'],*/
/*                                         id: item['id'],*/
/*                                         nomenclature: item['nomenclature'],*/
/*                                         required_state: item['required_state'],*/
/*                                         required_postcode: item['required_postcode'],*/
/*                                         active_currency_code: item['active_currency_code'],*/
/*                                         address_nomenclature: item['address_nomenclature'],*/
/*                                     }*/
/*                                 }));*/
/*                             }*/
/*                         }*/
/*                     });*/
/*                 }*/
/*             },*/
/*             'select': function (item) {*/
/*                 if (item) {*/
/*                     $('#abroad_shipping_speedy_state, #abroad_shipping_speedy_postcode').removeClass('required');*/
/*                     shipping_speedy_country = item.value;*/
/*                     $('#shipping_speedy_country').val(item.value);*/
/*                     $('#shipping_speedy_country_id').val(item.id);*/
/*                     $('#shipping_speedy_country_nomenclature').val(item.nomenclature);*/
/*                     $('#required_state').val(item.required_state);*/
/*                     $('#required_postcode').val(item.required_postcode);*/
/*                     $('#shipping_speedy_active_currency_code').val(item.active_currency_code);*/
/* */
/*                     if (item.address_nomenclature) {*/
/*                         $('#country_has_address_nomenclature').show();*/
/*                         $('#country_has_no_address_nomenclature').hide();*/
/*                     } else {*/
/*                         $('#country_has_address_nomenclature').hide();*/
/*                         $('#country_has_no_address_nomenclature').show();*/
/*                     }*/
/* */
/*                     if (!item.active_currency_code) {*/
/*                         $('#shipping_speedy_cod_container').hide();*/
/*                         $('#shipping_speedy_total_container').hide();*/
/*                         $('#shipping_speedy_option_before_payment_container').hide();*/
/*                         $('#shipping_speedy_cod_no').click();*/
/*                         $('#shipping_speedy_cod_status').val(0);*/
/*                     } else {*/
/*                         $('#shipping_speedy_cod_container').show();*/
/*                         $('#shipping_speedy_total_container').show();*/
/*                         $('#shipping_speedy_option_before_payment_container').show();*/
/*                         $('#shipping_speedy_cod_container').show();*/
/*                         $('#shipping_speedy_cod_status').val(1);*/
/*                     }*/
/* */
/*                     if (item.required_state) {*/
/*                         $('#abroad_shipping_speedy_state').addClass('required');*/
/*                     } else {*/
/*                         $('#abroad_shipping_speedy_state').removeClass('required');*/
/*                     }*/
/* */
/*                     if (item.required_postcode) {*/
/*                         $('#abroad_shipping_speedy_postcode').addClass('required');*/
/*                     } else {*/
/*                         $('#abroad_shipping_speedy_postcode').removeClass('required');*/
/*                     }*/
/*                 }*/
/*             },*/
/*             'change': function (item) {*/
/*                 if (!item) {*/
/*                     $('#to_office').hide();*/
/*                     $('[name=to_office][value=0]').trigger('click');*/
/* */
/*                     $('#shipping_speedy_country').val('');*/
/*                     $('#shipping_speedy_country_id').val('');*/
/*                     $('#shipping_speedy_country_nomenclature').val('');*/
/*                     $('#shipping_speedy_state').val('');*/
/*                     $('#shipping_speedy_state_id').val('');*/
/*                     $('#shipping_speedy_city').val('');*/
/*                     $('#shipping_speedy_city_id').val('');*/
/*                     $('#shipping_speedy_city_nomenclature').val('');*/
/*                     $('#shipping_speedy_quarter').val('');*/
/*                     $('#shipping_speedy_quarter_id').val('');*/
/*                     $('#shipping_speedy_street').val('');*/
/*                     $('#shipping_speedy_street_id').val('');*/
/*                     $('#shipping_speedy_street_no').val('');*/
/*                     $('#shipping_speedy_block_no').val('');*/
/*                     $('#shipping_speedy_entrance_no').val('');*/
/*                     $('#shipping_speedy_floor_no').val('');*/
/*                     $('#shipping_speedy_apartment_no').val('');*/
/*                     $('#shipping_speedy_note').val('');*/
/*                     $('#shipping_speedy_postcode').val('');*/
/*                     $('#shipping_speedy_fixed_time_cb').val('');*/
/*                 }*/
/*             }*/
/*         });*/
/* */
/*         $('#shipping_speedy_country').blur(function () {*/
/*             if ($(this).val() != shipping_speedy_country) {*/
/*                 $('#to_office').hide();*/
/*                 $('[name=to_office][value=0]').trigger('click');*/
/* */
/*                 $(this).val('');*/
/*                 $('#shipping_speedy_country_id').val('');*/
/*                 $('#shipping_speedy_country_nomenclature').val('');*/
/*                 $('#shipping_speedy_state').val('');*/
/*                 $('#shipping_speedy_state_id').val('');*/
/*                 $('#shipping_speedy_city').val('');*/
/*                 $('#shipping_speedy_city_id').val('');*/
/*                 $('#shipping_speedy_city_nomenclature').val('');*/
/*                 $('#shipping_speedy_quarter').val('');*/
/*                 $('#shipping_speedy_quarter_id').val('');*/
/*                 $('#shipping_speedy_street').val('');*/
/*                 $('#shipping_speedy_street_id').val('');*/
/*                 $('#shipping_speedy_street_no').val('');*/
/*                 $('#shipping_speedy_block_no').val('');*/
/*                 $('#shipping_speedy_entrance_no').val('');*/
/*                 $('#shipping_speedy_floor_no').val('');*/
/*                 $('#shipping_speedy_apartment_no').val('');*/
/*                 $('#shipping_speedy_note').val('');*/
/*                 $('#shipping_speedy_postcode').val('');*/
/*                 $('#shipping_speedy_fixed_time_cb').val('');*/
/*             }*/
/*         });*/
/* */
/*         $('#shipping_speedy_state').autocomplete({*/
/*             'source': function (request, response) {*/
/*                 if (request) {*/
/*                     $.ajax({*/
/*                         url: 'index.php?route=sale/tk_speedy/getStates&user_token={{ user_token }}',*/
/*                         dataType: 'json',*/
/*                         type: 'get',*/
/*                         data: {*/
/*                             term: request,*/
/*                             country_id: $('#shipping_speedy_country_id').val()*/
/*                         },*/
/*                         success: function (json) {*/
/*                             if ($('#shipping_speedy_state').is(":focus")) {*/
/*                                 response($.map(json, function (item) {*/
/*                                     return {*/
/*                                         label: item['name'],*/
/*                                         value: item['name'],*/
/*                                         id: item['id']*/
/*                                     }*/
/*                                 }));*/
/*                             }*/
/*                         }*/
/*                     });*/
/*                 }*/
/*             },*/
/*             'select': function (item) {*/
/*                 if (item) {*/
/*                     shipping_speedy_state = item.value;*/
/*                     $('#shipping_speedy_state').val(item.value);*/
/*                     $('#shipping_speedy_state_id').val(item.id);*/
/*                 }*/
/*             },*/
/*             'change': function (item) {*/
/*                 if (!item) {*/
/*                     $('#shipping_speedy_state').val('');*/
/*                     $('#shipping_speedy_state_id').val('');*/
/*                 }*/
/*             }*/
/*         });*/
/* */
/*         $('#shipping_speedy_state').blur(function () {*/
/*             if ($(this).val() != shipping_speedy_state) {*/
/*                 $(this).val('');*/
/*                 $('#shipping_speedy_state_id').val('');*/
/*             }*/
/*         });*/
/* */
/*     });*/
/* </script>*/
/* {{ footer }}*/
