<?php

/* so-revo/template/footer/footer10.twig */
class __TwigTemplate_4c4403eccb080448707d53931ad181559750ffb4283c209a0d59ae8a4415f0f0 extends Twig_Template
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
        echo "<footer class=\"footer-container typefooter-";
        echo (((isset($context["typefooter"]) ? $context["typefooter"] : null)) ? ((isset($context["typefooter"]) ? $context["typefooter"] : null)) : ("1"));
        echo "\">
\t
\t";
        // line 3
        if ((isset($context["footer_10"]) ? $context["footer_10"] : null)) {
            echo " 
\t<div class=\"footer-main\">
\t\t";
            // line 5
            echo (isset($context["footer_10"]) ? $context["footer_10"] : null);
            echo "
\t</div>
\t";
        }
        // line 8
        echo "
\t";
        // line 9
        echo " 
\t<div class=\"footer-bottom \">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-sm-12 copyright\">
\t\t\t\tCopyright © 2020-";
        // line 14
        echo twig_date_format_filter($this->env, "now", "Y");
        echo " Kai Trade Ltd. All Rights Reserved. Kai Electric.com is a property of Kai Trade Ltd.
\t\t\t\t\t";
        // line 20
        echo "\t\t\t\t</div>

\t\t\t\t";
        // line 27
        echo "
\t\t\t</div>
\t\t</div>
\t</div>
\t";
        // line 31
        echo (isset($context["footer_bottom"]) ? $context["footer_bottom"] : null);
        echo "
</footer>";
    }

    public function getTemplateName()
    {
        return "so-revo/template/footer/footer10.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 31,  54 => 27,  50 => 20,  46 => 14,  39 => 9,  36 => 8,  30 => 5,  25 => 3,  19 => 1,);
    }
}
/* <footer class="footer-container typefooter-{{typefooter ? typefooter : '1'}}">*/
/* 	*/
/* 	{% if footer_10 %} */
/* 	<div class="footer-main">*/
/* 		{{ footer_10 }}*/
/* 	</div>*/
/* 	{% endif %}*/
/* */
/* 	{#======	FOOTER BOTTOM	=======#} */
/* 	<div class="footer-bottom ">*/
/* 		<div class="container">*/
/* 			<div class="row">*/
/* 				<div class="col-sm-12 copyright">*/
/* 				Copyright © 2020-{{"now"|date("Y")}} Kai Trade Ltd. All Rights Reserved. Kai Electric.com is a property of Kai Trade Ltd.*/
/* 					{# {% if soconfig.get_settings('copyright') is empty %}*/
/* 						{{ powered }}*/
/* 					{% else %}*/
/* 						{{ soconfig.decode_entities(soconfig.get_settings('copyright'))|replace({'{year}': "now"|date("Y")}) }}*/
/* 					{% endif %} #}*/
/* 				</div>*/
/* */
/* 				{# {% if soconfig.get_settings('imgpayment_status')%} */
/* 				<div class="col-sm-12 payment">*/
/* 					<img class="lazyload" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="image/{{  soconfig.get_settings('imgpayment') }}"  alt="imgpayment">*/
/* 				</div>*/
/* 				{% endif %}  #}*/
/* */
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	{{ footer_bottom }}*/
/* </footer>*/
