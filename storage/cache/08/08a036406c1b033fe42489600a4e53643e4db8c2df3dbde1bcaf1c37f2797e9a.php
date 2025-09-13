<?php

/* so-revo/template/common/home.twig */
class __TwigTemplate_9bb8f765b4951ca1a67e0aeb1997185ad5a216bf7b8bc4912febb24e740ba527 extends Twig_Template
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
        echo "
";
        // line 2
        echo (isset($context["header"]) ? $context["header"] : null);
        echo "

    <div id=\"content\" class=\"";
        // line 4
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">
    ";
        // line 5
        echo (isset($context["content_home"]) ? $context["content_home"] : null);
        echo "
    ";
        // line 6
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
    ";
        // line 7
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "
    
    </div>
";
        // line 10
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "so-revo/template/common/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 10,  39 => 7,  35 => 6,  31 => 5,  27 => 4,  22 => 2,  19 => 1,);
    }
}
/* */
/* {{ header }}*/
/* */
/*     <div id="content" class="{{ class }}">*/
/*     {{ content_home }}*/
/*     {{ content_top }}*/
/*     {{ content_bottom }}*/
/*     */
/*     </div>*/
/* {{ footer }}*/
