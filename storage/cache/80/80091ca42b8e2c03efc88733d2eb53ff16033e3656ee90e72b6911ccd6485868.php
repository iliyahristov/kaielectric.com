<?php

/* so-revo/template/common/cart.twig */
class __TwigTemplate_ccf3cb86e7b0a17bd4f4ae54feb5162b722b45edd755e479b840385e88267db7 extends Twig_Template
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
        echo "<div id=\"cart\" class=\"btn-shopping-cart\">
  
  <a data-loading-text=\"";
        // line 3
        echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
        echo " \" class=\"btn-group top_cart dropdown-toggle\" data-toggle=\"dropdown\">
    <div class=\"shopcart\">
      <span class=\"handle pull-left\"></span>
      <p class=\"title-cart-h6\">";
        // line 6
        echo (isset($context["text_shop_cart"]) ? $context["text_shop_cart"] : null);
        echo " </p>
  \t\t<span class=\"total-shopping-cart cart-total-full\">
  \t\t\t ";
        // line 8
        echo (isset($context["text_items"]) ? $context["text_items"] : null);
        echo " 
  \t\t</span>
  \t\t<i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i>
    </div>
  </a>
  
  <ul class=\"dropdown-menu pull-right shoppingcart-box\">
    ";
        // line 15
        if (((isset($context["products"]) ? $context["products"] : null) || (isset($context["vouchers"]) ? $context["vouchers"] : null))) {
            // line 16
            echo "    <li class=\"content-item\">
      <table class=\"table table-striped\" style=\"margin-bottom:10px;\">
        ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 19
                echo "        <tr>
          <td class=\"text-center size-img-cart\">";
                // line 20
                if ($this->getAttribute($context["product"], "thumb", array())) {
                    echo " <a href=\"";
                    echo $this->getAttribute($context["product"], "href", array());
                    echo "\"><img class=\"img-thumbnail lazyload\" data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                    echo $this->getAttribute($context["product"], "thumb", array());
                    echo "\" alt=\"";
                    echo $this->getAttribute($context["product"], "name", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["product"], "name", array());
                    echo "\"  /></a> ";
                }
                echo "</td>
          <td class=\"text-left\"><a href=\"";
                // line 21
                echo $this->getAttribute($context["product"], "href", array());
                echo "\">";
                echo $this->getAttribute($context["product"], "name", array());
                echo "</a> ";
                if ($this->getAttribute($context["product"], "option", array())) {
                    // line 22
                    echo "            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["product"], "option", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                        echo " <br />
            - <small>";
                        // line 23
                        echo $this->getAttribute($context["option"], "name", array());
                        echo " ";
                        echo $this->getAttribute($context["option"], "value", array());
                        echo "</small> ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 24
                    echo "            ";
                }
                // line 25
                echo "            ";
                if ($this->getAttribute($context["product"], "recurring", array())) {
                    echo " <br />
            - <small>";
                    // line 26
                    echo (isset($context["text_recurring"]) ? $context["text_recurring"] : null);
                    echo " ";
                    echo $this->getAttribute($context["product"], "recurring", array());
                    echo "</small> ";
                }
                echo "</td>
          <td class=\"text-right x-quantity\">x ";
                // line 27
                echo $this->getAttribute($context["product"], "quantity", array());
                echo "</td>
          <td class=\"text-right\">";
                // line 28
                echo $this->getAttribute($context["product"], "total", array());
                echo "</td>
          <td class=\"text-center\"><button type=\"button\" onclick=\"cart.remove('";
                // line 29
                echo $this->getAttribute($context["product"], "cart_id", array());
                echo "');\" title=\"";
                echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
                echo "\" class=\"btn btn-trash\"><i class=\"fa fa-trash-o\"></i></button></td>
        </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["vouchers"]) ? $context["vouchers"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["voucher"]) {
                // line 33
                echo "        <tr>
          <td class=\"text-center\"></td>
          <td class=\"text-left\">";
                // line 35
                echo $this->getAttribute($context["voucher"], "description", array());
                echo "</td>
          <td class=\"text-right\">x&nbsp;1</td>
          <td class=\"text-right\">";
                // line 37
                echo $this->getAttribute($context["voucher"], "amount", array());
                echo "</td>
          <td class=\"text-center text-danger\"><button type=\"button\" onclick=\"voucher.remove('";
                // line 38
                echo $this->getAttribute($context["voucher"], "key", array());
                echo "');\" title=\"";
                echo (isset($context["button_remove"]) ? $context["button_remove"] : null);
                echo "\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-times\"></i></button></td>
        </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['voucher'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "      </table>
    </li>
  
\t<li>
\t\t<div class=\"checkout cart kai clearfix\">
\t\t<a href=\"";
            // line 46
            echo (isset($context["cart"]) ? $context["cart"] : null);
            echo "\" class=\"btn\"> ";
            echo (isset($context["text_cart"]) ? $context["text_cart"] : null);
            echo "</a>
\t\t<a href=\"";
            // line 47
            echo (isset($context["checkout"]) ? $context["checkout"] : null);
            echo "\" class=\"btn pull-right\">";
            echo (isset($context["text_checkout"]) ? $context["text_checkout"] : null);
            echo "</a>
\t\t</div>
\t</li>
    ";
        } else {
            // line 51
            echo "    <li>
      <p class=\"text-center empty\">";
            // line 52
            echo (isset($context["text_empty"]) ? $context["text_empty"] : null);
            echo "</p>
    </li>
    ";
        }
        // line 55
        echo "  </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "so-revo/template/common/cart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 55,  182 => 52,  179 => 51,  170 => 47,  164 => 46,  157 => 41,  146 => 38,  142 => 37,  137 => 35,  133 => 33,  128 => 32,  117 => 29,  113 => 28,  109 => 27,  101 => 26,  96 => 25,  93 => 24,  84 => 23,  77 => 22,  71 => 21,  57 => 20,  54 => 19,  50 => 18,  46 => 16,  44 => 15,  34 => 8,  29 => 6,  23 => 3,  19 => 1,);
    }
}
/* <div id="cart" class="btn-shopping-cart">*/
/*   */
/*   <a data-loading-text="{{ text_loading }} " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown">*/
/*     <div class="shopcart">*/
/*       <span class="handle pull-left"></span>*/
/*       <p class="title-cart-h6">{{ text_shop_cart }} </p>*/
/*   		<span class="total-shopping-cart cart-total-full">*/
/*   			 {{ text_items }} */
/*   		</span>*/
/*   		<i class="fa fa-shopping-cart" aria-hidden="true"></i>*/
/*     </div>*/
/*   </a>*/
/*   */
/*   <ul class="dropdown-menu pull-right shoppingcart-box">*/
/*     {% if products or vouchers %}*/
/*     <li class="content-item">*/
/*       <table class="table table-striped" style="margin-bottom:10px;">*/
/*         {% for product in products %}*/
/*         <tr>*/
/*           <td class="text-center size-img-cart">{% if product.thumb %} <a href="{{ product.href }}"><img class="img-thumbnail lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}"  /></a> {% endif %}</td>*/
/*           <td class="text-left"><a href="{{ product.href }}">{{ product.name }}</a> {% if product.option %}*/
/*             {% for option in product.option %} <br />*/
/*             - <small>{{ option.name }} {{ option.value }}</small> {% endfor %}*/
/*             {% endif %}*/
/*             {% if product.recurring %} <br />*/
/*             - <small>{{ text_recurring }} {{ product.recurring }}</small> {% endif %}</td>*/
/*           <td class="text-right x-quantity">x {{ product.quantity }}</td>*/
/*           <td class="text-right">{{ product.total }}</td>*/
/*           <td class="text-center"><button type="button" onclick="cart.remove('{{ product.cart_id }}');" title="{{ button_remove }}" class="btn btn-trash"><i class="fa fa-trash-o"></i></button></td>*/
/*         </tr>*/
/*         {% endfor %}*/
/*         {% for voucher in vouchers %}*/
/*         <tr>*/
/*           <td class="text-center"></td>*/
/*           <td class="text-left">{{ voucher.description }}</td>*/
/*           <td class="text-right">x&nbsp;1</td>*/
/*           <td class="text-right">{{ voucher.amount }}</td>*/
/*           <td class="text-center text-danger"><button type="button" onclick="voucher.remove('{{ voucher.key }}');" title="{{ button_remove }}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></td>*/
/*         </tr>*/
/*         {% endfor %}*/
/*       </table>*/
/*     </li>*/
/*   */
/* 	<li>*/
/* 		<div class="checkout cart kai clearfix">*/
/* 		<a href="{{ cart }}" class="btn"> {{ text_cart }}</a>*/
/* 		<a href="{{ checkout }}" class="btn pull-right">{{ text_checkout }}</a>*/
/* 		</div>*/
/* 	</li>*/
/*     {% else %}*/
/*     <li>*/
/*       <p class="text-center empty">{{ text_empty }}</p>*/
/*     </li>*/
/*     {% endif %}*/
/*   </ul>*/
/* </div>*/
/* */
