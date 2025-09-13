<?php

/* extension/tfa/authenticate.twig */
class __TwigTemplate_bb71d599261e58d3df6137f2bf88a1f5425e3b89a842442c655de78fc23675fc extends Twig_Template
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
        echo (isset($context["header"]) ? $context["header"] : null);
        echo "
<div id=\"content\">
    <div class=\"container-fluid\"><br />
        <br />
        <div class=\"row\">
            <div class=\"col-sm-offset-4 col-sm-4\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <h1 class=\"panel-title\"><i class=\"fa fa-lock\"></i> ";
        // line 9
        echo (isset($context["text_login"]) ? $context["text_login"] : null);
        echo "</h1>
                    </div>
                    <div class=\"panel-body\">
                        ";
        // line 12
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 13
            echo "                            <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            echo (isset($context["success"]) ? $context["success"] : null);
            echo "
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                            </div>
                        ";
        }
        // line 17
        echo "                        ";
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 18
            echo "                            <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                            </div>
                        ";
        }
        // line 22
        echo "                        <p>";
        echo (isset($context["text_login_description"]) ? $context["text_login_description"] : null);
        echo "</p>
                        <form action=\"";
        // line 23
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\">
                            <div class=\"form-group\">
                                <label for=\"input-code\">";
        // line 25
        echo (isset($context["entry_code"]) ? $context["entry_code"] : null);
        echo "</label>
                                <div class=\"input-group\"><span class=\"input-group-addon\"><i class=\"fa fa-shield\"></i></span>
                                    <input type=\"text\" name=\"code\" value=\"";
        // line 27
        echo (isset($context["code"]) ? $context["code"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_code"]) ? $context["entry_code"] : null);
        echo "\" id=\"input-code\" class=\"form-control\" />
                                </div>
                            </div>
                            <div class=\"text-right\">
                                <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-key\"></i> ";
        // line 31
        echo (isset($context["button_authenticate"]) ? $context["button_authenticate"] : null);
        echo "</button>
                            </div>
                            ";
        // line 33
        if ((isset($context["redirect"]) ? $context["redirect"] : null)) {
            // line 34
            echo "                                <input type=\"hidden\" name=\"redirect\" value=\"";
            echo (isset($context["redirect"]) ? $context["redirect"] : null);
            echo "\" />
                            ";
        }
        // line 36
        echo "                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
        // line 43
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "extension/tfa/authenticate.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 43,  94 => 36,  88 => 34,  86 => 33,  81 => 31,  72 => 27,  67 => 25,  62 => 23,  57 => 22,  49 => 18,  46 => 17,  38 => 13,  36 => 12,  30 => 9,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div id="content">*/
/*     <div class="container-fluid"><br />*/
/*         <br />*/
/*         <div class="row">*/
/*             <div class="col-sm-offset-4 col-sm-4">*/
/*                 <div class="panel panel-default">*/
/*                     <div class="panel-heading">*/
/*                         <h1 class="panel-title"><i class="fa fa-lock"></i> {{ text_login }}</h1>*/
/*                     </div>*/
/*                     <div class="panel-body">*/
/*                         {% if success %}*/
/*                             <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> {{ success }}*/
/*                                 <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*                             </div>*/
/*                         {% endif %}*/
/*                         {% if error_warning %}*/
/*                             <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/*                                 <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*                             </div>*/
/*                         {% endif %}*/
/*                         <p>{{ text_login_description }}</p>*/
/*                         <form action="{{ action }}" method="post" enctype="multipart/form-data">*/
/*                             <div class="form-group">*/
/*                                 <label for="input-code">{{ entry_code }}</label>*/
/*                                 <div class="input-group"><span class="input-group-addon"><i class="fa fa-shield"></i></span>*/
/*                                     <input type="text" name="code" value="{{ code }}" placeholder="{{ entry_code }}" id="input-code" class="form-control" />*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="text-right">*/
/*                                 <button type="submit" class="btn btn-primary"><i class="fa fa-key"></i> {{ button_authenticate }}</button>*/
/*                             </div>*/
/*                             {% if redirect %}*/
/*                                 <input type="hidden" name="redirect" value="{{ redirect }}" />*/
/*                             {% endif %}*/
/*                         </form>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {{ footer }}*/
