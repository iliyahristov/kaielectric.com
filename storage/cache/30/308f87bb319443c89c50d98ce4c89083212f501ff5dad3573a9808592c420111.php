<?php

/* so-revo/template/extension/module/so_newletter_custom_popup/default_layout_default.twig */
class __TwigTemplate_70395d956d70c6f5538a9c5e15fbf2630b83f28855edeab881f09cb30776de01 extends Twig_Template
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
        $context["width_popup"] = (((isset($context["width"]) ? $context["width"] : null)) ? ((isset($context["width"]) ? $context["width"] : null)) : ("50%"));
        // line 2
        echo "
";
        // line 3
        if ((isset($context["image_bg_display"]) ? $context["image_bg_display"] : null)) {
            // line 4
            echo "    ";
            $context["bg"] = (("background: url(image/" . (isset($context["image"]) ? $context["image"] : null)) . ")");
        } else {
            // line 5
            echo " 
   ";
            // line 6
            $context["bg"] = (("background-color: #" . (isset($context["color_bg"]) ? $context["color_bg"] : null)) . "");
        }
        // line 8
        echo "

<div class=\"module ";
        // line 10
        echo (isset($context["class_suffix"]) ? $context["class_suffix"] : null);
        echo "\">
    <div class=\"so-custom-default newsletter\" style=\"width:";
        // line 11
        echo (isset($context["width_popup"]) ? $context["width_popup"] : null);
        echo "; ";
        echo (isset($context["bg"]) ? $context["bg"] : null);
        echo " ; \">
        ";
        // line 12
        if ((isset($context["disp_title_module"]) ? $context["disp_title_module"] : null)) {
            echo " 
            <h3 class=\"modtitle\">";
            // line 13
            echo (isset($context["head_name"]) ? $context["head_name"] : null);
            echo " </h3>
        ";
        }
        // line 14
        echo " 
        
        ";
        // line 16
        if ( !twig_test_empty(trim((isset($context["pre_text"]) ? $context["pre_text"] : null)))) {
            // line 17
            echo "            <div class=\"form-group\">
                ";
            // line 18
            echo (isset($context["pre_text"]) ? $context["pre_text"] : null);
            echo "
            </div>
        ";
        }
        // line 21
        echo "        
\t\t";
        // line 22
        if ((isset($context["title_display"]) ? $context["title_display"] : null)) {
            // line 23
            echo "            <div class=\"btn-group title-block\">
                <div class=\"popup-title page-heading\">
                    ";
            // line 25
            echo (isset($context["title"]) ? $context["title"] : null);
            echo "
                </div>
                <div class=\"newsletter_promo\">";
            // line 27
            echo (isset($context["newsletter_promo"]) ? $context["newsletter_promo"] : null);
            echo "</div>
            </div>
        ";
        }
        // line 30
        echo "        <div class=\"modcontent block_content\">
            <form method=\"post\" id=\"signup\" name=\"signup\" class=\"form-group form-inline signup send-mail\">
                <div class=\"input-group \">
\t\t\t<div class=\"input-box\">
\t                    <input type=\"email\" placeholder=\"";
        // line 34
        echo (isset($context["newsletter_placeholder"]) ? $context["newsletter_placeholder"] : null);
        echo "\" value=\"\" class=\"form-control\" id=\"txtemail\" name=\"txtemail\" size=\"55\">
\t\t\t</div>
                    <div class=\"input-group-btn subcribe\">
                        <button class=\"btn btn-primary\" type=\"submit\" onclick=\"return subscribe_newsletter();\" name=\"submit\">
                            ";
        // line 38
        echo (isset($context["newsletter_button"]) ? $context["newsletter_button"] : null);
        echo "
                        </button>
                    </div>
                </div>
            </form>
            

        </div> <!--/.modcontent-->
        ";
        // line 46
        if ( !twig_test_empty(trim((isset($context["post_text"]) ? $context["post_text"] : null)))) {
            // line 47
            echo "            <div class=\"newsletter_promo\">
                ";
            // line 48
            echo (isset($context["post_text"]) ? $context["post_text"] : null);
            echo "
            </div>
        ";
        }
        // line 51
        echo "        
    </div>

<script type=\"text/javascript\">
    function subscribe_newsletter()
    {
        var emailpattern = /^\\w+([\\.-]?\\w+)*@\\w+([\\.-]?\\w+)*(\\.\\w{2,3})+\$/;
        var email = \$('#txtemail').val();
        var d = new Date();
        var createdate = d.getFullYear() + '-' + (d.getMonth()+1) + '-' + d.getDate() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();
        var status   = 0;
        var dataString = 'email='+email+'&createdate='+createdate+'&status='+status;

        if(email != \"\"){

            if(!emailpattern.test(email))
            {

                \$('.show-error').remove();
                \$('.send-mail').after('<div class=\"alert alert-danger show-error\" role=\"alert\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button> Invalid Email </div>')
                return false;
            }
            else
            {
                \$.ajax({
                    url: 'index.php?route=extension/module/so_newletter_custom_popup/newsletter',
                    type: 'post',
                    data: dataString,
                    dataType: 'json',
                    success: function(json) {
                        \$('.show-error').remove();
                        if(json.error == false) {
                            \$('.send-mail').after('<div class=\"alert alert-success show-error\" role=\"alert\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button> ' + json.message + '</div>');
                            setTimeout(function () {
                                var this_close = \$('.popup-close');
                                this_close.parent().css('display', 'none');
                                this_close.parents().find('.so_newletter_custom_popup_bg').removeClass('popup_bg');
                            }, 3000);

                        }else{
                            \$('.send-mail').after('<div class=\"alert alert-danger show-error\" role=\"alert\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button> ' + json.message + '</div>');
                        }
                        var x = document.getElementsByClassName('signup');
                            for (i = 0; i < x.length; i++) {
                            x[i].reset();
                        }
                    }
                });
                return false;
            }
        } else{
            alert(\"";
        // line 102
        echo (isset($context["text_email_required"]) ? $context["text_email_required"] : null);
        echo "\");
            \$(email).focus();
            return false;
        }
    }
</script>
</div>
";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/module/so_newletter_custom_popup/default_layout_default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 102,  129 => 51,  123 => 48,  120 => 47,  118 => 46,  107 => 38,  100 => 34,  94 => 30,  88 => 27,  83 => 25,  79 => 23,  77 => 22,  74 => 21,  68 => 18,  65 => 17,  63 => 16,  59 => 14,  54 => 13,  50 => 12,  44 => 11,  40 => 10,  36 => 8,  33 => 6,  30 => 5,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set width_popup =  width ? width : '50%' %}*/
/* */
/* {% if image_bg_display %}*/
/*     {% set bg   =  'background: url(image/'~image~')' %}*/
/* {% else %} */
/*    {%  set  bg  =  'background-color: #'~color_bg~'' %}*/
/* {% endif %}*/
/* */
/* */
/* <div class="module {{ class_suffix }}">*/
/*     <div class="so-custom-default newsletter" style="width:{{ width_popup }}; {{ bg }} ; ">*/
/*         {% if disp_title_module %} */
/*             <h3 class="modtitle">{{ head_name }} </h3>*/
/*         {% endif %} */
/*         */
/*         {% if pre_text |trim is not empty  %}*/
/*             <div class="form-group">*/
/*                 {{ pre_text }}*/
/*             </div>*/
/*         {% endif %}*/
/*         */
/* 		{% if title_display%}*/
/*             <div class="btn-group title-block">*/
/*                 <div class="popup-title page-heading">*/
/*                     {{ title }}*/
/*                 </div>*/
/*                 <div class="newsletter_promo">{{ newsletter_promo }}</div>*/
/*             </div>*/
/*         {% endif %}*/
/*         <div class="modcontent block_content">*/
/*             <form method="post" id="signup" name="signup" class="form-group form-inline signup send-mail">*/
/*                 <div class="input-group ">*/
/* 			<div class="input-box">*/
/* 	                    <input type="email" placeholder="{{ newsletter_placeholder}}" value="" class="form-control" id="txtemail" name="txtemail" size="55">*/
/* 			</div>*/
/*                     <div class="input-group-btn subcribe">*/
/*                         <button class="btn btn-primary" type="submit" onclick="return subscribe_newsletter();" name="submit">*/
/*                             {{ newsletter_button  }}*/
/*                         </button>*/
/*                     </div>*/
/*                 </div>*/
/*             </form>*/
/*             */
/* */
/*         </div> <!--/.modcontent-->*/
/*         {% if post_text |trim is not empty %}*/
/*             <div class="newsletter_promo">*/
/*                 {{ post_text }}*/
/*             </div>*/
/*         {% endif %}*/
/*         */
/*     </div>*/
/* */
/* <script type="text/javascript">*/
/*     function subscribe_newsletter()*/
/*     {*/
/*         var emailpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;*/
/*         var email = $('#txtemail').val();*/
/*         var d = new Date();*/
/*         var createdate = d.getFullYear() + '-' + (d.getMonth()+1) + '-' + d.getDate() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();*/
/*         var status   = 0;*/
/*         var dataString = 'email='+email+'&createdate='+createdate+'&status='+status;*/
/* */
/*         if(email != ""){*/
/* */
/*             if(!emailpattern.test(email))*/
/*             {*/
/* */
/*                 $('.show-error').remove();*/
/*                 $('.send-mail').after('<div class="alert alert-danger show-error" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Invalid Email </div>')*/
/*                 return false;*/
/*             }*/
/*             else*/
/*             {*/
/*                 $.ajax({*/
/*                     url: 'index.php?route=extension/module/so_newletter_custom_popup/newsletter',*/
/*                     type: 'post',*/
/*                     data: dataString,*/
/*                     dataType: 'json',*/
/*                     success: function(json) {*/
/*                         $('.show-error').remove();*/
/*                         if(json.error == false) {*/
/*                             $('.send-mail').after('<div class="alert alert-success show-error" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> ' + json.message + '</div>');*/
/*                             setTimeout(function () {*/
/*                                 var this_close = $('.popup-close');*/
/*                                 this_close.parent().css('display', 'none');*/
/*                                 this_close.parents().find('.so_newletter_custom_popup_bg').removeClass('popup_bg');*/
/*                             }, 3000);*/
/* */
/*                         }else{*/
/*                             $('.send-mail').after('<div class="alert alert-danger show-error" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> ' + json.message + '</div>');*/
/*                         }*/
/*                         var x = document.getElementsByClassName('signup');*/
/*                             for (i = 0; i < x.length; i++) {*/
/*                             x[i].reset();*/
/*                         }*/
/*                     }*/
/*                 });*/
/*                 return false;*/
/*             }*/
/*         } else{*/
/*             alert("{{ text_email_required }}");*/
/*             $(email).focus();*/
/*             return false;*/
/*         }*/
/*     }*/
/* </script>*/
/* </div>*/
/* */
