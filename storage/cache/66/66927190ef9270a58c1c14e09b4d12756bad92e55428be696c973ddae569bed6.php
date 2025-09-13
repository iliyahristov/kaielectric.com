<?php

/* default/template/tk_checkout/payment_triger.twig */
class __TwigTemplate_3ede37bcf916a971d5879edb86ee6fc13440728681e9255391ec29bd60d84f59 extends Twig_Template
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
        if (twig_in_filter((isset($context["payment_method"]) ? $context["payment_method"] : null), (isset($context["popup_payments"]) ? $context["popup_payments"] : null))) {
            // line 2
            echo "
<div class=\"payment_container mfp-hide radio_container\" id=\"payment_triger_mfp\">
\t<div>
\t";
            // line 5
            echo (isset($context["payment"]) ? $context["payment"] : null);
            echo "\t
\t<div class=\"tk_clear\"></div>
\t</div>
</div>

<script type=\"text/javascript\">
\t\$(document).ready(function() { 
\t\t\t\$('#tk_button_confirm').button('reset');
\t\t\t\$('.tk_all_spin').html('');
\t\t\t\$('#tk_checkout').css('opacity','1');
\t\t\t\$('#tk_checkout').css('pointer-events','auto');
\t\t});
\t\t
\t\$.magnificPopup.open( { 
\t\t\ttype: 'inline',
\t\t\titems: { src: '#payment_triger_mfp'} 
\t\t});
\t\t\t 
\t\$.magnificPopup.instance.close = function () {

\t\tlocation = '";
            // line 25
            echo (isset($context["back_url"]) ? $context["back_url"] : null);
            echo "';
\t};
</script>

<style>#payment_hidden #button-confirm{
\t\tdisplay: block!important;}
\t#button-confirm {
\t\tdisplay: block!important;}</style>

";
        } else {
            // line 34
            echo " 

<div id=\"payment_hidden\" style=\"display: none!important\">";
            // line 36
            echo (isset($context["payment"]) ? $context["payment"] : null);
            echo "</div>

<script type=\"text/javascript\">
    \$(document).ready(function() {
\t\t\tif(typeof \$('button#button-confirm').attr(\"id\") != 'undefined'){
\t\t\t\t\$(\"#button-confirm\").get(0).click();
\t\t\t} else if(typeof \$('input#button-confirm').attr(\"id\") != 'undefined'){
\t\t\t\t\$(\"#button-confirm\").get(0).click();
\t\t\t} else if(typeof \$('a#button-confirm').attr(\"id\") != 'undefined'){
\t\t\t\t\$(\"#button-confirm\").get(0).click();
\t\t\t} else {
\t\t\t\t\$('#payment_hidden form').submit();
\t\t\t}
\t\t});
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "default/template/tk_checkout/payment_triger.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 36,  62 => 34,  49 => 25,  26 => 5,  21 => 2,  19 => 1,);
    }
}
/* {% if payment_method in popup_payments %}*/
/* */
/* <div class="payment_container mfp-hide radio_container" id="payment_triger_mfp">*/
/* 	<div>*/
/* 	{{ payment }}	*/
/* 	<div class="tk_clear"></div>*/
/* 	</div>*/
/* </div>*/
/* */
/* <script type="text/javascript">*/
/* 	$(document).ready(function() { */
/* 			$('#tk_button_confirm').button('reset');*/
/* 			$('.tk_all_spin').html('');*/
/* 			$('#tk_checkout').css('opacity','1');*/
/* 			$('#tk_checkout').css('pointer-events','auto');*/
/* 		});*/
/* 		*/
/* 	$.magnificPopup.open( { */
/* 			type: 'inline',*/
/* 			items: { src: '#payment_triger_mfp'} */
/* 		});*/
/* 			 */
/* 	$.magnificPopup.instance.close = function () {*/
/* */
/* 		location = '{{ back_url }}';*/
/* 	};*/
/* </script>*/
/* */
/* <style>#payment_hidden #button-confirm{*/
/* 		display: block!important;}*/
/* 	#button-confirm {*/
/* 		display: block!important;}</style>*/
/* */
/* {% else %} */
/* */
/* <div id="payment_hidden" style="display: none!important">{{ payment }}</div>*/
/* */
/* <script type="text/javascript">*/
/*     $(document).ready(function() {*/
/* 			if(typeof $('button#button-confirm').attr("id") != 'undefined'){*/
/* 				$("#button-confirm").get(0).click();*/
/* 			} else if(typeof $('input#button-confirm').attr("id") != 'undefined'){*/
/* 				$("#button-confirm").get(0).click();*/
/* 			} else if(typeof $('a#button-confirm').attr("id") != 'undefined'){*/
/* 				$("#button-confirm").get(0).click();*/
/* 			} else {*/
/* 				$('#payment_hidden form').submit();*/
/* 			}*/
/* 		});*/
/* </script>*/
/* {% endif %}*/
