<?php

/* so-revo/template/extension/module/account.twig */
class __TwigTemplate_0f4bc758eabb98933fa423b61918787dfe691dc1b9b5252eb977e3f3582d090e extends Twig_Template
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
        echo "<div class=\"module\"> 
  <div class=\"module-content custom-border\">
    <ul class=\"list-box\">
      ";
        // line 4
        if ( !(isset($context["logged"]) ? $context["logged"] : null)) {
            echo " 
      <li><a href=\"";
            // line 5
            echo (isset($context["login"]) ? $context["login"] : null);
            echo " \">";
            echo (isset($context["text_login"]) ? $context["text_login"] : null);
            echo " </a></li>
      <li><a href=\"";
            // line 6
            echo (isset($context["register"]) ? $context["register"] : null);
            echo " \">";
            echo (isset($context["text_register"]) ? $context["text_register"] : null);
            echo " </a></li>
      <li><a href=\"";
            // line 7
            echo (isset($context["forgotten"]) ? $context["forgotten"] : null);
            echo " \">";
            echo (isset($context["text_forgotten"]) ? $context["text_forgotten"] : null);
            echo " </a></li>
      ";
        }
        // line 8
        echo "         
      ";
        // line 9
        if ((isset($context["logged"]) ? $context["logged"] : null)) {
            echo " 
      <li><a href=\"";
            // line 10
            echo (isset($context["edit"]) ? $context["edit"] : null);
            echo " \">";
            echo (isset($context["text_edit"]) ? $context["text_edit"] : null);
            echo " </a></li>
      <li><a href=\"";
            // line 11
            echo (isset($context["password"]) ? $context["password"] : null);
            echo " \">";
            echo (isset($context["text_password"]) ? $context["text_password"] : null);
            echo " </a></li>      
      <li><a href=\"";
            // line 12
            echo (isset($context["address"]) ? $context["address"] : null);
            echo " \">";
            echo (isset($context["text_address"]) ? $context["text_address"] : null);
            echo " </a></li>
      <li><a href=\"";
            // line 13
            echo (isset($context["wishlist"]) ? $context["wishlist"] : null);
            echo " \">";
            echo (isset($context["text_wishlist"]) ? $context["text_wishlist"] : null);
            echo " </a></li>
      <li><a href=\"";
            // line 14
            echo (isset($context["order"]) ? $context["order"] : null);
            echo " \">";
            echo (isset($context["text_order"]) ? $context["text_order"] : null);
            echo " </a></li>
      <li><a href=\"";
            // line 15
            echo (isset($context["recurring"]) ? $context["recurring"] : null);
            echo " \">";
            echo (isset($context["text_recurring"]) ? $context["text_recurring"] : null);
            echo " </a></li>
      <li><a href=\"";
            // line 16
            echo (isset($context["reward"]) ? $context["reward"] : null);
            echo " \">";
            echo (isset($context["text_reward"]) ? $context["text_reward"] : null);
            echo " </a></li>
      <li><a href=\"";
            // line 17
            echo (isset($context["return"]) ? $context["return"] : null);
            echo " \">";
            echo (isset($context["text_return"]) ? $context["text_return"] : null);
            echo " </a></li>
      <li><a href=\"";
            // line 18
            echo (isset($context["newsletter"]) ? $context["newsletter"] : null);
            echo " \">";
            echo (isset($context["text_newsletter"]) ? $context["text_newsletter"] : null);
            echo " </a></li>      
      <li><a href=\"";
            // line 19
            echo (isset($context["logout"]) ? $context["logout"] : null);
            echo " \">";
            echo (isset($context["text_logout"]) ? $context["text_logout"] : null);
            echo " </a></li>
      ";
        }
        // line 20
        echo " 
    </ul>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/module/account.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 20,  108 => 19,  102 => 18,  96 => 17,  90 => 16,  84 => 15,  78 => 14,  72 => 13,  66 => 12,  60 => 11,  54 => 10,  50 => 9,  47 => 8,  40 => 7,  34 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
/* <div class="module"> */
/*   <div class="module-content custom-border">*/
/*     <ul class="list-box">*/
/*       {% if not logged %} */
/*       <li><a href="{{ login }} ">{{ text_login }} </a></li>*/
/*       <li><a href="{{ register }} ">{{ text_register }} </a></li>*/
/*       <li><a href="{{ forgotten }} ">{{ text_forgotten }} </a></li>*/
/*       {% endif %}         */
/*       {% if logged %} */
/*       <li><a href="{{ edit }} ">{{ text_edit }} </a></li>*/
/*       <li><a href="{{ password }} ">{{ text_password }} </a></li>      */
/*       <li><a href="{{ address }} ">{{ text_address }} </a></li>*/
/*       <li><a href="{{ wishlist }} ">{{ text_wishlist }} </a></li>*/
/*       <li><a href="{{ order }} ">{{ text_order }} </a></li>*/
/*       <li><a href="{{ recurring }} ">{{ text_recurring }} </a></li>*/
/*       <li><a href="{{ reward }} ">{{ text_reward }} </a></li>*/
/*       <li><a href="{{ return }} ">{{ text_return }} </a></li>*/
/*       <li><a href="{{ newsletter }} ">{{ text_newsletter }} </a></li>      */
/*       <li><a href="{{ logout }} ">{{ text_logout }} </a></li>*/
/*       {% endif %} */
/*     </ul>*/
/*   </div>*/
/* </div>*/
