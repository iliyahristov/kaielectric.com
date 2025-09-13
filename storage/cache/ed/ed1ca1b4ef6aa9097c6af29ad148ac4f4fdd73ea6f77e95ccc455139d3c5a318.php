<?php

/* default/template/checkout/cart.twig */
class __TwigTemplate_6e5d2203f9f8a89ae5d4bb213879f64726a59b90f42187a524e3fe933d5ad1a1 extends Twig_Template
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
<div id=\"checkout-cart\" class=\"container\">
  <ul class=\"breadcrumb\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 5
            echo "    <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "  </ul>
  ";
        // line 8
        if ((isset($context["attention"]) ? $context["attention"] : null)) {
            // line 9
            echo "  <div class=\"alert alert-info\"><i class=\"fa fa-info-circle\"></i> ";
            echo (isset($context["attention"]) ? $context["attention"] : null);
            echo "
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  </div>
  ";
        }
        // line 13
        echo "  ";
        // line 18
        echo "  ";
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
        echo "  <div class=\"row\">";
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
    ";
        // line 24
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 25
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 26
            echo "    ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 27
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 28
            echo "    ";
        } else {
            // line 29
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 30
            echo "    ";
        }
        // line 31
        echo "    <div id=\"content\" class=\"";
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
      <form action=\"";
        // line 32
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\">
        <div class=\"table-responsive\">
          <table class=\"table\">
            <thead>
              <tr>
                <td class=\"text-center\"></td>
                <td class=\"text-left\">";
        // line 38
        echo (isset($context["column_name"]) ? $context["column_name"] : null);
        echo "</td>
                <td class=\"text-left\"></td>
                <td class=\"text-right\">";
        // line 40
        echo (isset($context["column_price"]) ? $context["column_price"] : null);
        echo "</td>
                 <td class=\"text-center\">";
        // line 41
        echo (isset($context["column_quantity"]) ? $context["column_quantity"] : null);
        echo "</td>
                <td class=\"text-right\">";
        // line 42
        echo (isset($context["column_total"]) ? $context["column_total"] : null);
        echo "</td>
              </tr>
            </thead>
            <tbody>
            
            ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 48
            echo "            <tr>
              <td class=\"text-center\">";
            // line 49
            if ($this->getAttribute($context["product"], "thumb", array())) {
                echo " <a href=\"";
                echo $this->getAttribute($context["product"], "href", array());
                echo "\"><img src=\"";
                echo $this->getAttribute($context["product"], "thumb", array());
                echo "\" alt=\"";
                echo $this->getAttribute($context["product"], "name", array());
                echo "\" title=\"";
                echo $this->getAttribute($context["product"], "name", array());
                echo "\" class=\"img-thumbnail\" /></a> ";
            }
            echo "</td>
              <td class=\"text-left\"><a href=\"";
            // line 50
            echo $this->getAttribute($context["product"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["product"], "name", array());
            echo "</a> ";
            if ( !$this->getAttribute($context["product"], "stock", array())) {
                echo " <span class=\"text-danger\">***</span> ";
            }
            // line 51
            echo "                ";
            if ($this->getAttribute($context["product"], "option", array())) {
                // line 52
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["product"], "option", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                    echo " <br />
                <small>";
                    // line 53
                    echo $this->getAttribute($context["option"], "name", array());
                    echo ": ";
                    echo $this->getAttribute($context["option"], "value", array());
                    echo "</small> ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 54
                echo "                ";
            }
            // line 55
            echo "                ";
            if ($this->getAttribute($context["product"], "reward", array())) {
                echo " <br />
                <small>";
                // line 56
                echo $this->getAttribute($context["product"], "reward", array());
                echo "</small> ";
            }
            // line 57
            echo "                ";
            if ($this->getAttribute($context["product"], "recurring", array())) {
                echo " <br />
                <span class=\"label label-info\">";
                // line 58
                echo (isset($context["text_recurring_item"]) ? $context["text_recurring_item"] : null);
                echo "</span> <small>";
                echo $this->getAttribute($context["product"], "recurring", array());
                echo "</small> ";
            }
            // line 59
            echo "                <div class=\"model\">
                  <small><span>Продуктов код: </span>";
            // line 60
            echo $this->getAttribute($context["product"], "model", array());
            echo "</small>
                </div>
              </td>
              <td class=\"text-left\">
                <a onclick=\"wishlist.add('";
            // line 64
            echo $this->getAttribute($context["product"], "id", array());
            echo "');\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-heart\"></i>
\t\t\t\t\t\t\t\t</a>
                Добави в любими 
              </td>
              <td class=\"text-right\">";
            // line 69
            echo $this->getAttribute($context["product"], "price", array());
            echo "</td>
              <td class=\"text-center\">
              <div class=\"input-group btn-block\" style=\"width: 243px; margin: auto\">
                <div class=\"quantity-control\" unselectable=\"on\" style=\"user-select: none;\">
                  <span class=\"input-group-addon product_quantity_down fa fa-minus\"></span>
                  <input class=\"form-control\" type=\"text\" name=\"quantity[";
            // line 74
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "]\" value=\"";
            echo $this->getAttribute($context["product"], "quantity", array());
            echo "\" size=\"1\">\t\t\t\t  
                  <span class=\"input-group-addon product_quantity_up fa fa-plus\"></span>
                </div>
                <span class=\"input-group-btn\">
                <button type=\"submit\" data-toggle=\"tooltip\" title=\"";
            // line 78
            echo (isset($context["button_update"]) ? $context["button_update"] : null);
            echo "\" class=\"btn btn-info\"><i class=\"fa fa-refresh\"></i></button>
                <button type=\"button\" data-toggle=\"tooltip\" title=\"";
            // line 79
            echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
            echo "\" class=\"btn btn-transparent\" onclick=\"cart.remove('";
            echo $this->getAttribute($context["product"], "cart_id", array());
            echo "');\"><i class=\"fa fa-times\"></i></button>
                </span></div>
              </td>
              <td class=\"text-right\">";
            // line 82
            echo $this->getAttribute($context["product"], "total", array());
            echo "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["vouchers"]) ? $context["vouchers"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["voucher"]) {
            // line 86
            echo "            <tr>
              <td></td>
              <td class=\"text-left\">";
            // line 88
            echo $this->getAttribute($context["voucher"], "description", array());
            echo "</td>
              <td class=\"text-left\"></td>
              <td class=\"text-left\"><div class=\"input-group btn-block\" style=\"max-width: 200px;\">
                  <input type=\"text\" name=\"\" value=\"1\" size=\"1\" disabled=\"disabled\" class=\"form-control\" />
                  <span class=\"input-group-btn\">
                  <button type=\"button\" data-toggle=\"tooltip\" title=\"";
            // line 93
            echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
            echo "\" class=\"btn btn-danger\" onclick=\"voucher.remove('";
            echo $this->getAttribute($context["voucher"], "key", array());
            echo "');\"><i class=\"fa fa-times-circle\"></i></button>
                  </span></div></td>
              <td class=\"text-right\">";
            // line 95
            echo $this->getAttribute($context["voucher"], "amount", array());
            echo "</td>
              <td class=\"text-right\">";
            // line 96
            echo $this->getAttribute($context["voucher"], "amount", array());
            echo "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['voucher'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 99
        echo "              </tbody>
            
          </table>
        </div>
      </form>
      ";
        // line 112
        echo "      <div class=\"row\">
        <div class=\"col-sm-3 col-sm-offset-9\">
          <table class=\"table\">
            ";
        // line 116
        echo "            <tr>
              <td class=\"text-right\"><strong>";
        // line 117
        echo $this->getAttribute($this->getAttribute((isset($context["totals"]) ? $context["totals"] : null), 1, array(), "array"), "title", array());
        echo ":</strong></td>
              <td class=\"text-right\">";
        // line 118
        echo $this->getAttribute($this->getAttribute((isset($context["totals"]) ? $context["totals"] : null), 1, array(), "array"), "text", array());
        echo "</td>
            </tr>
            ";
        // line 121
        echo "            ";
        if ((isset($context["weight"]) ? $context["weight"] : null)) {
            // line 122
            echo "            <tr>
              <td class=\"text-right\">
                <small>Тегло:</small>
              </td>
              <td class=\"text-right\">
                <small>
                    ";
            // line 128
            echo (isset($context["weight"]) ? $context["weight"] : null);
            echo "
                </small>
              </td>
            </tr>
             ";
        }
        // line 133
        echo "          </table>
        </div>
      </div>
      <div class=\"buttons clearfix\">
        ";
        // line 138
        echo "        <div class=\"pull-right\"><a href=\"";
        echo (isset($context["checkout"]) ? $context["checkout"] : null);
        echo "\" class=\"btn btn-primary\">";
        echo (isset($context["button_continue"]) ? $context["button_continue"] : null);
        echo "</a></div>
      </div>
      ";
        // line 140
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "</div>
    ";
        // line 141
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "</div>
</div>
";
        // line 143
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "default/template/checkout/cart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  358 => 143,  353 => 141,  349 => 140,  341 => 138,  335 => 133,  327 => 128,  319 => 122,  316 => 121,  311 => 118,  307 => 117,  304 => 116,  299 => 112,  292 => 99,  283 => 96,  279 => 95,  272 => 93,  264 => 88,  260 => 86,  255 => 85,  246 => 82,  238 => 79,  234 => 78,  225 => 74,  217 => 69,  209 => 64,  202 => 60,  199 => 59,  193 => 58,  188 => 57,  184 => 56,  179 => 55,  176 => 54,  167 => 53,  160 => 52,  157 => 51,  149 => 50,  135 => 49,  132 => 48,  128 => 47,  120 => 42,  116 => 41,  112 => 40,  107 => 38,  98 => 32,  91 => 31,  88 => 30,  85 => 29,  82 => 28,  79 => 27,  76 => 26,  73 => 25,  71 => 24,  66 => 23,  58 => 19,  55 => 18,  53 => 13,  45 => 9,  43 => 8,  40 => 7,  29 => 5,  25 => 4,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div id="checkout-cart" class="container">*/
/*   <ul class="breadcrumb">*/
/*     {% for breadcrumb in breadcrumbs %}*/
/*     <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*     {% endfor %}*/
/*   </ul>*/
/*   {% if attention %}*/
/*   <div class="alert alert-info"><i class="fa fa-info-circle"></i> {{ attention }}*/
/*     <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*   </div>*/
/*   {% endif %}*/
/*   {# {% if success %}*/
/*   <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> {{ success }}*/
/*     <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*   </div>*/
/*   {% endif %} #}*/
/*   {% if error_warning %}*/
/*   <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/*     <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*   </div>*/
/*   {% endif %}*/
/*   <div class="row">{{ column_left }}*/
/*     {% if column_left and column_right %}*/
/*     {% set class = 'col-sm-6' %}*/
/*     {% elseif column_left or column_right %}*/
/*     {% set class = 'col-sm-9' %}*/
/*     {% else %}*/
/*     {% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/*     <div id="content" class="{{ class }}">{{ content_top }}*/
/*       <form action="{{ action }}" method="post" enctype="multipart/form-data">*/
/*         <div class="table-responsive">*/
/*           <table class="table">*/
/*             <thead>*/
/*               <tr>*/
/*                 <td class="text-center"></td>*/
/*                 <td class="text-left">{{ column_name }}</td>*/
/*                 <td class="text-left"></td>*/
/*                 <td class="text-right">{{ column_price }}</td>*/
/*                  <td class="text-center">{{ column_quantity }}</td>*/
/*                 <td class="text-right">{{ column_total }}</td>*/
/*               </tr>*/
/*             </thead>*/
/*             <tbody>*/
/*             */
/*             {% for product in products %}*/
/*             <tr>*/
/*               <td class="text-center">{% if product.thumb %} <a href="{{ product.href }}"><img src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}" class="img-thumbnail" /></a> {% endif %}</td>*/
/*               <td class="text-left"><a href="{{ product.href }}">{{ product.name }}</a> {% if not product.stock %} <span class="text-danger">***</span> {% endif %}*/
/*                 {% if product.option %}*/
/*                 {% for option in product.option %} <br />*/
/*                 <small>{{ option.name }}: {{ option.value }}</small> {% endfor %}*/
/*                 {% endif %}*/
/*                 {% if product.reward %} <br />*/
/*                 <small>{{ product.reward }}</small> {% endif %}*/
/*                 {% if product.recurring %} <br />*/
/*                 <span class="label label-info">{{ text_recurring_item }}</span> <small>{{ product.recurring }}</small> {% endif %}*/
/*                 <div class="model">*/
/*                   <small><span>Продуктов код: </span>{{ product.model }}</small>*/
/*                 </div>*/
/*               </td>*/
/*               <td class="text-left">*/
/*                 <a onclick="wishlist.add('{{ product.id }}');">*/
/* 									<i class="fa fa-heart"></i>*/
/* 								</a>*/
/*                 Добави в любими */
/*               </td>*/
/*               <td class="text-right">{{ product.price }}</td>*/
/*               <td class="text-center">*/
/*               <div class="input-group btn-block" style="width: 243px; margin: auto">*/
/*                 <div class="quantity-control" unselectable="on" style="user-select: none;">*/
/*                   <span class="input-group-addon product_quantity_down fa fa-minus"></span>*/
/*                   <input class="form-control" type="text" name="quantity[{{ product.cart_id }}]" value="{{ product.quantity }}" size="1">				  */
/*                   <span class="input-group-addon product_quantity_up fa fa-plus"></span>*/
/*                 </div>*/
/*                 <span class="input-group-btn">*/
/*                 <button type="submit" data-toggle="tooltip" title="{{ button_update }}" class="btn btn-info"><i class="fa fa-refresh"></i></button>*/
/*                 <button type="button" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-transparent" onclick="cart.remove('{{ product.cart_id }}');"><i class="fa fa-times"></i></button>*/
/*                 </span></div>*/
/*               </td>*/
/*               <td class="text-right">{{ product.total }}</td>*/
/*             </tr>*/
/*             {% endfor %}*/
/*             {% for voucher in vouchers %}*/
/*             <tr>*/
/*               <td></td>*/
/*               <td class="text-left">{{ voucher.description }}</td>*/
/*               <td class="text-left"></td>*/
/*               <td class="text-left"><div class="input-group btn-block" style="max-width: 200px;">*/
/*                   <input type="text" name="" value="1" size="1" disabled="disabled" class="form-control" />*/
/*                   <span class="input-group-btn">*/
/*                   <button type="button" data-toggle="tooltip" title="{{ button_remove }}" class="btn btn-danger" onclick="voucher.remove('{{ voucher.key }}');"><i class="fa fa-times-circle"></i></button>*/
/*                   </span></div></td>*/
/*               <td class="text-right">{{ voucher.amount }}</td>*/
/*               <td class="text-right">{{ voucher.amount }}</td>*/
/*             </tr>*/
/*             {% endfor %}*/
/*               </tbody>*/
/*             */
/*           </table>*/
/*         </div>*/
/*       </form>*/
/*       {# {% if modules %}*/
/*       <h2>{{ text_next }}</h2>*/
/*       <p>{{ text_next_choice }}</p>*/
/*       <div class="panel-group" id="accordion"> {% for module in modules %}*/
/*         {{ module }}*/
/*         {% endfor %} */
/*       </div>*/
/*       {% endif %} <br /> #}*/
/*       <div class="row">*/
/*         <div class="col-sm-3 col-sm-offset-9">*/
/*           <table class="table">*/
/*             {# {% for total in totals %} #}*/
/*             <tr>*/
/*               <td class="text-right"><strong>{{ totals[1].title }}:</strong></td>*/
/*               <td class="text-right">{{ totals[1].text }}</td>*/
/*             </tr>*/
/*             {# {% endfor %} #}*/
/*             {% if weight %}*/
/*             <tr>*/
/*               <td class="text-right">*/
/*                 <small>Тегло:</small>*/
/*               </td>*/
/*               <td class="text-right">*/
/*                 <small>*/
/*                     {{ weight }}*/
/*                 </small>*/
/*               </td>*/
/*             </tr>*/
/*              {% endif %}*/
/*           </table>*/
/*         </div>*/
/*       </div>*/
/*       <div class="buttons clearfix">*/
/*         {# <div class="pull-left"><a href="{{ continue }}" class="btn btn-default">{{ button_shopping }}</a></div> #}*/
/*         <div class="pull-right"><a href="{{ checkout }}" class="btn btn-primary">{{ button_continue }}</a></div>*/
/*       </div>*/
/*       {{ content_bottom }}</div>*/
/*     {{ column_right }}</div>*/
/* </div>*/
/* {{ footer }} */
