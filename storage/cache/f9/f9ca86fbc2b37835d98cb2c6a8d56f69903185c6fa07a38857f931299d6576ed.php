<?php

/* so-revo/template/extension/captcha/google.twig */
class __TwigTemplate_e49335530cc1676e30e86417b670b24e44bf239770ce66ba84578845dfa8ee1f extends Twig_Template
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
        echo "<script src=\"//www.google.com/recaptcha/api.js\" type=\"text/javascript\"></script>
<fieldset>
  <legend>";
        // line 3
        echo (isset($context["text_captcha"]) ? $context["text_captcha"] : null);
        echo "</legend>
  <div class=\"form-group required\">";
        // line 4
        if ((twig_slice($this->env, (isset($context["route"]) ? $context["route"] : null), 0, 9) == "checkout/")) {
            // line 5
            echo "    <label class=\"control-label\" for=\"input-payment-captcha\">";
            echo (isset($context["entry_captcha"]) ? $context["entry_captcha"] : null);
            echo "</label>
    <div id=\"input-payment-captcha\" class=\"g-recaptcha\" data-sitekey=\"";
            // line 6
            echo (isset($context["site_key"]) ? $context["site_key"] : null);
            echo "\"></div>
    ";
            // line 7
            if ((isset($context["error_captcha"]) ? $context["error_captcha"] : null)) {
                // line 8
                echo "    <div class=\"text-danger\">";
                echo (isset($context["error_captcha"]) ? $context["error_captcha"] : null);
                echo "</div>
    ";
            }
            // line 10
            echo "    ";
        } else {
            // line 11
            echo "    <label class=\"col-sm-2 control-label\">";
            echo (isset($context["entry_captcha"]) ? $context["entry_captcha"] : null);
            echo "</label>
    <div class=\"col-sm-10\">
      <div class=\"g-recaptcha\" data-sitekey=\"";
            // line 13
            echo (isset($context["site_key"]) ? $context["site_key"] : null);
            echo "\"></div>
      ";
            // line 14
            if ((isset($context["error_captcha"]) ? $context["error_captcha"] : null)) {
                // line 15
                echo "      <div class=\"text-danger\">";
                echo (isset($context["error_captcha"]) ? $context["error_captcha"] : null);
                echo "</div>
      ";
            }
            // line 16
            echo "</div>
    ";
        }
        // line 17
        echo "</div>
</fieldset>
";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/captcha/google.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 17,  67 => 16,  61 => 15,  59 => 14,  55 => 13,  49 => 11,  46 => 10,  40 => 8,  38 => 7,  34 => 6,  29 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }
}
/* <script src="//www.google.com/recaptcha/api.js" type="text/javascript"></script>*/
/* <fieldset>*/
/*   <legend>{{ text_captcha }}</legend>*/
/*   <div class="form-group required">{% if route|slice(0, 9) == 'checkout/' %}*/
/*     <label class="control-label" for="input-payment-captcha">{{ entry_captcha }}</label>*/
/*     <div id="input-payment-captcha" class="g-recaptcha" data-sitekey="{{ site_key }}"></div>*/
/*     {% if error_captcha %}*/
/*     <div class="text-danger">{{ error_captcha }}</div>*/
/*     {% endif %}*/
/*     {% else %}*/
/*     <label class="col-sm-2 control-label">{{ entry_captcha }}</label>*/
/*     <div class="col-sm-10">*/
/*       <div class="g-recaptcha" data-sitekey="{{ site_key }}"></div>*/
/*       {% if error_captcha %}*/
/*       <div class="text-danger">{{ error_captcha }}</div>*/
/*       {% endif %}</div>*/
/*     {% endif %}</div>*/
/* </fieldset>*/
/* */
