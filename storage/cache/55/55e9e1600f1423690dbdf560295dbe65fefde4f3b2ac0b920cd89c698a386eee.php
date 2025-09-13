<?php

/* default/template/tk_checkout/payment_display.twig */
class __TwigTemplate_a47b7751b1bcd96da4db2f0ae39f157e68ba8c737ece873f191b17edb6eb0b41 extends Twig_Template
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
        echo "<div id=\"payment_hidden\" class=\"payment_hidden payment_display_tpl\" >";
        echo (isset($context["payment"]) ? $context["payment"] : null);
        echo "</div>
<script> 
\t\$(document).ready(function() {
      saveData();
\t\t\tgetCart();
\t\t});
</script>";
    }

    public function getTemplateName()
    {
        return "default/template/tk_checkout/payment_display.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* <div id="payment_hidden" class="payment_hidden payment_display_tpl" >{{ payment }}</div>*/
/* <script> */
/* 	$(document).ready(function() {*/
/*       saveData();*/
/* 			getCart();*/
/* 		});*/
/* </script>*/
