<?php

/* default/template/extension/d_gdpr_module/cookies.twig */
class __TwigTemplate_27af88a031a511044c71c8c8024ffe0a231e5b789e21579383f150fc6749f836 extends Twig_Template
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
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo (isset($context["style_link"]) ? $context["style_link"] : null);
        echo "\"/>
<script src=\"";
        // line 2
        echo (isset($context["script_link"]) ? $context["script_link"] : null);
        echo "\"></script>

<script>
    var setting = {
        \"palette\": {
            \"popup\": {
                \"background\": \"";
        // line 8
        echo (isset($context["banner_color"]) ? $context["banner_color"] : null);
        echo "\"
            },
            \"button\": {
                \"background\": \"";
        // line 11
        echo (isset($context["button_color"]) ? $context["button_color"] : null);
        echo "\"
            }
        },
        \"content\": {
            \"message\": \"";
        // line 15
        echo (isset($context["text_message"]) ? $context["text_message"] : null);
        echo "\",
            \"dismiss\": \"";
        // line 16
        echo (isset($context["text_dismiss"]) ? $context["text_dismiss"] : null);
        echo "\",
            \"link\": \"";
        // line 17
        echo (isset($context["text_link"]) ? $context["text_link"] : null);
        echo "\",
            \"href\": \"";
        // line 18
        echo (isset($context["privacy_link"]) ? $context["privacy_link"] : null);
        echo "\"
        },
        \"showLink\": ";
        // line 20
        echo (((isset($context["show_privacy_link"]) ? $context["show_privacy_link"] : null)) ? ("true") : ("false"));
        echo ",
        onStatusChange: function (status) {
            console.log(this.hasConsented() ?
                'enable cookies' : 'disable cookies');

            this.hasConsented() ? \$(function () {
                \$.post(\"";
        // line 26
        echo (isset($context["cookie_accepted_route"]) ? $context["cookie_accepted_route"] : null);
        echo "\", function (t) {
                })
            }) : \$(function () {
                \$.post(\"";
        // line 29
        echo (isset($context["cookie_declined_route"]) ? $context["cookie_declined_route"] : null);
        echo "\", function (t) {
                })
            });
        },
    };



    ";
        // line 37
        if ((isset($context["position"]) ? $context["position"] : null)) {
            // line 38
            echo "    setting['position'] = '";
            echo (isset($context["position"]) ? $context["position"] : null);
            echo "';
    ";
        }
        // line 40
        echo "
    ";
        // line 41
        if ((isset($context["banner_text_color"]) ? $context["banner_text_color"] : null)) {
            // line 42
            echo "    setting['palette']['popup']['text'] = '";
            echo (isset($context["banner_text_color"]) ? $context["banner_text_color"] : null);
            echo "';
    ";
        }
        // line 44
        echo "
    ";
        // line 45
        if ((isset($context["button_text_color"]) ? $context["button_text_color"] : null)) {
            // line 46
            echo "    setting['palette']['button']['text'] = '";
            echo (isset($context["button_text_color"]) ? $context["button_text_color"] : null);
            echo "';
    ";
        }
        // line 48
        echo "
    window.addEventListener(\"load\", function () {
        window.cookieconsent.initialise(setting)
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "default/template/extension/d_gdpr_module/cookies.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 48,  113 => 46,  111 => 45,  108 => 44,  102 => 42,  100 => 41,  97 => 40,  91 => 38,  89 => 37,  78 => 29,  72 => 26,  63 => 20,  58 => 18,  54 => 17,  50 => 16,  46 => 15,  39 => 11,  33 => 8,  24 => 2,  19 => 1,);
    }
}
/* <link rel="stylesheet" type="text/css" href="{{ style_link }}"/>*/
/* <script src="{{ script_link }}"></script>*/
/* */
/* <script>*/
/*     var setting = {*/
/*         "palette": {*/
/*             "popup": {*/
/*                 "background": "{{ banner_color }}"*/
/*             },*/
/*             "button": {*/
/*                 "background": "{{ button_color }}"*/
/*             }*/
/*         },*/
/*         "content": {*/
/*             "message": "{{ text_message }}",*/
/*             "dismiss": "{{ text_dismiss }}",*/
/*             "link": "{{ text_link }}",*/
/*             "href": "{{ privacy_link }}"*/
/*         },*/
/*         "showLink": {{ show_privacy_link?'true':'false' }},*/
/*         onStatusChange: function (status) {*/
/*             console.log(this.hasConsented() ?*/
/*                 'enable cookies' : 'disable cookies');*/
/* */
/*             this.hasConsented() ? $(function () {*/
/*                 $.post("{{ cookie_accepted_route }}", function (t) {*/
/*                 })*/
/*             }) : $(function () {*/
/*                 $.post("{{ cookie_declined_route }}", function (t) {*/
/*                 })*/
/*             });*/
/*         },*/
/*     };*/
/* */
/* */
/* */
/*     {% if position %}*/
/*     setting['position'] = '{{ position }}';*/
/*     {% endif %}*/
/* */
/*     {% if banner_text_color %}*/
/*     setting['palette']['popup']['text'] = '{{ banner_text_color }}';*/
/*     {% endif %}*/
/* */
/*     {% if button_text_color %}*/
/*     setting['palette']['button']['text'] = '{{ button_text_color }}';*/
/*     {% endif %}*/
/* */
/*     window.addEventListener("load", function () {*/
/*         window.cookieconsent.initialise(setting)*/
/*     });*/
/* </script>*/
/* */
