<?php

/* default/template/tk_checkout/free_shipping_text.twig */
class __TwigTemplate_d06271422f8af993ff86651362e29a6cc1e1e019999776a465226cee5130fb75 extends Twig_Template
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
        if ((array_key_exists("text_free_shipping", $context) && (isset($context["text_free_shipping"]) ? $context["text_free_shipping"] : null))) {
            echo " 
<hr>
<span class=\"tk_text_free_shipping\">";
            // line 3
            echo (isset($context["text_free_shipping"]) ? $context["text_free_shipping"] : null);
            echo "</span>
";
        }
        // line 5
        echo "<script>
    \$(document).ready(function() {
        \$('#tk_button_confirm').button('reset');
        \$('.tk_all_spin').html('');
        \$('#tk_checkout').css('opacity', '1');
        \$('#tk_checkout').css('pointer-events', 'auto');
    });
</script>";
    }

    public function getTemplateName()
    {
        return "default/template/tk_checkout/free_shipping_text.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 5,  24 => 3,  19 => 1,);
    }
}
/* {% if (text_free_shipping is defined and text_free_shipping) %} */
/* <hr>*/
/* <span class="tk_text_free_shipping">{{ text_free_shipping }}</span>*/
/* {% endif %}*/
/* <script>*/
/*     $(document).ready(function() {*/
/*         $('#tk_button_confirm').button('reset');*/
/*         $('.tk_all_spin').html('');*/
/*         $('#tk_checkout').css('opacity', '1');*/
/*         $('#tk_checkout').css('pointer-events', 'auto');*/
/*     });*/
/* </script>*/
