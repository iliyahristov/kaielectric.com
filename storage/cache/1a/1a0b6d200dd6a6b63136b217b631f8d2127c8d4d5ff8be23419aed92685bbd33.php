<?php

/* default/template/mail/register.twig */
class __TwigTemplate_720bbb9571dd3ff98ec4db1ec06adde5e1893653bbfb511509add5b085231ad5 extends Twig_Template
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
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd\">
<html>
\t<head>
\t\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
\t\t<title>";
        // line 5
        echo (isset($context["title"]) ? $context["title"] : null);
        echo "</title>
\t</head>
\t<body style=\"font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000;\">
\t\t<div style=\"width: 100%; text-align: center; padding-top: 40px; padding-bottom: 40px \">
    \t\t<a href=\"";
        // line 9
        echo (isset($context["store_url"]) ? $context["store_url"] : null);
        echo "\" title=\"";
        echo (isset($context["store_name"]) ? $context["store_name"] : null);
        echo "\">
        \t\t<img src=\"";
        // line 10
        echo (isset($context["logo"]) ? $context["logo"] : null);
        echo "\" alt=\"";
        echo (isset($context["store_name"]) ? $context["store_name"] : null);
        echo "\" style=\"margin-bottom: 20px; border: none; width: 300px\" />
    \t\t</a>
    \t\t<p style=\"margin-top: 0px; margin-bottom: 60px; text-align: center; line-height: 36px;font-family: 'Nimbus-Sans','Helvetica Neue',sans-serif;font-size: 36px;text-transform: uppercase;font-weight: bold\">";
        // line 12
        echo (isset($context["text_thanks_for_registration"]) ? $context["text_thanks_for_registration"] : null);
        echo "</p>
    \t\t<p style=\"text-align: center;font-size: 18px;line-height: 22px;font-family: 'Nimbus-Roman','Times New Roman',sans-serif; color:#000\">
                ";
        // line 14
        echo (isset($context["text_welcome"]) ? $context["text_welcome"] : null);
        echo "
    \t\t</p>
    \t\t<p 
                style=\"text-align: center;font-size: 18px;line-height: 22px;font-family: 'Nimbus-Roman', 'Times New Roman',sans-serif; color:#000; width:600px; margin:0 auto;\">
                ";
        // line 18
        echo (isset($context["text_explanation"]) ? $context["text_explanation"] : null);
        echo "
    \t\t</p>
    \t\t<p style=\"text-align: center;\">
    \t\t\t<a href=\"";
        // line 21
        echo (isset($context["store_url"]) ? $context["store_url"] : null);
        echo "\" style=\"background-color: #E30025;border: 1px solid #E30025;border-radius: 3px; color: #ffffff; display: inline-block;padding-bottom: 2px; font-weight: bold;font-family: 'Farfetch-Basis', 'Helvetica Neue', sans-serif; font-size: 16px;line-height: 40px; text-align: center; text-decoration: none; width: 250px; margin-top: 40px\"> 
    \t\t\t\t";
        // line 22
        echo (isset($context["text_shop_now"]) ? $context["text_shop_now"] : null);
        echo "
    \t\t\t</a> 
    \t\t</p>
    
            <p 
                style=\"font-size:16px;text-align:center;padding:7px; color:#000\">
                <a \t
                \thref=\"";
        // line 29
        echo (isset($context["store_contact_page"]) ? $context["store_contact_page"] : null);
        echo "\" 
                \ttitle=\"";
        // line 30
        echo (isset($context["store_name"]) ? $context["store_name"] : null);
        echo "\"
                \tstyle=\" color: #000; text-transform:uppercase; margin-top: 40px; display: inline-block \">
                \t";
        // line 32
        echo (isset($context["text_contact_us"]) ? $context["text_contact_us"] : null);
        echo "
                </a>
            </p>
       
        </div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "default/template/mail/register.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 32,  81 => 30,  77 => 29,  67 => 22,  63 => 21,  57 => 18,  50 => 14,  45 => 12,  38 => 10,  32 => 9,  25 => 5,  19 => 1,);
    }
}
/* <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">*/
/* <html>*/
/* 	<head>*/
/* 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">*/
/* 		<title>{{ title }}</title>*/
/* 	</head>*/
/* 	<body style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000;">*/
/* 		<div style="width: 100%; text-align: center; padding-top: 40px; padding-bottom: 40px ">*/
/*     		<a href="{{ store_url }}" title="{{ store_name }}">*/
/*         		<img src="{{ logo }}" alt="{{ store_name }}" style="margin-bottom: 20px; border: none; width: 300px" />*/
/*     		</a>*/
/*     		<p style="margin-top: 0px; margin-bottom: 60px; text-align: center; line-height: 36px;font-family: 'Nimbus-Sans','Helvetica Neue',sans-serif;font-size: 36px;text-transform: uppercase;font-weight: bold">{{ text_thanks_for_registration }}</p>*/
/*     		<p style="text-align: center;font-size: 18px;line-height: 22px;font-family: 'Nimbus-Roman','Times New Roman',sans-serif; color:#000">*/
/*                 {{ text_welcome }}*/
/*     		</p>*/
/*     		<p */
/*                 style="text-align: center;font-size: 18px;line-height: 22px;font-family: 'Nimbus-Roman', 'Times New Roman',sans-serif; color:#000; width:600px; margin:0 auto;">*/
/*                 {{ text_explanation }}*/
/*     		</p>*/
/*     		<p style="text-align: center;">*/
/*     			<a href="{{ store_url }}" style="background-color: #E30025;border: 1px solid #E30025;border-radius: 3px; color: #ffffff; display: inline-block;padding-bottom: 2px; font-weight: bold;font-family: 'Farfetch-Basis', 'Helvetica Neue', sans-serif; font-size: 16px;line-height: 40px; text-align: center; text-decoration: none; width: 250px; margin-top: 40px"> */
/*     				{{ text_shop_now }}*/
/*     			</a> */
/*     		</p>*/
/*     */
/*             <p */
/*                 style="font-size:16px;text-align:center;padding:7px; color:#000">*/
/*                 <a 	*/
/*                 	href="{{ store_contact_page }}" */
/*                 	title="{{ store_name }}"*/
/*                 	style=" color: #000; text-transform:uppercase; margin-top: 40px; display: inline-block ">*/
/*                 	{{ text_contact_us }}*/
/*                 </a>*/
/*             </p>*/
/*        */
/*         </div>*/
/*     </body>*/
/* </html>*/
/* */
