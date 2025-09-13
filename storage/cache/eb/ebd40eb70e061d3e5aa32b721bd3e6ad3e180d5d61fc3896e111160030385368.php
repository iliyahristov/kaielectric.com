<?php

/* data/filters_upload_form.twig */
class __TwigTemplate_290bd6d885a84dfffc324f9846a1157f05186db9fec5213dec9e7d978437a58f extends Twig_Template
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
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\">
    <div class=\"page-header\">
        <div class=\"container-fluid\">
            <div class=\"pull-right\">
                <button type=\"submit\" form=\"form-custom-field\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "\"
                        class=\"btn btn-primary\">
                    <i class=\"fa fa-save\"></i>
                </button>
                <a href=\"";
        // line 10
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-default\">
                    <i class=\"fa fa-reply\"></i>
                </a>
            </div>
            <h1>";
        // line 14
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
            <ul class=\"breadcrumb\">
                ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 17
            echo "                <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "            </ul>
        </div>
    </div>

    <div class=\"container-fluid\">
        ";
        // line 24
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 25
            echo "        <div class=\"alert alert-danger alert-dismissible\">
            <i class=\"fa fa-exclamation-circle\"></i> ";
            // line 26
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
        </div>
        ";
        }
        // line 30
        echo "        ";
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 31
            echo "        <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            echo (isset($context["success"]) ? $context["success"] : null);
            echo "
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
        </div>
        ";
        }
        // line 35
        echo "        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> Добавете файл и посочете колони за данни</h3>
            </div>
            <div class=\"panel-body\">
                <form action=\"";
        // line 40
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-custom-field\"
                      class=\"form-horizontal\">
                    <fieldset>
                        <div class=\"row\">
                            <div class=\"form-group required col-sm-4\">
                                <label class=\"col-sm-4 control-label\">Баркод 1/EAN/</label>
                                <div class=\"col-sm-8\">
                                    <div class=\"input-group\">
                                        <input type=\"text\" name=\"data[barcode]\" value=\"";
        // line 48
        echo (isset($context["barcode"]) ? $context["barcode"] : null);
        echo "\" placeholder=\"A\"
                                               class=\"form-control\"/>
                                        ";
        // line 50
        if ((isset($context["error_barcode"]) ? $context["error_barcode"] : null)) {
            // line 51
            echo "                                        <div class=\"text-danger\">";
            echo (isset($context["error_barcode"]) ? $context["error_barcode"] : null);
            echo "</div>
                                        ";
        }
        // line 53
        echo "                                    </div>
                                </div>
                            </div><!--barcode-->
                            <div class=\"form-group required col-sm-4\">
                                <label class=\"col-sm-4 control-label\">Описание</label>
                                <div class=\"col-sm-8\">
                                    <div class=\"input-group\">
                                        <input type=\"text\" name=\"data[description]\" value=\"";
        // line 60
        echo (isset($context["description"]) ? $context["description"] : null);
        echo "\" placeholder=\"B\"
                                               class=\"form-control\"/>
                                        ";
        // line 62
        if ((isset($context["error_description"]) ? $context["error_description"] : null)) {
            // line 63
            echo "                                        <div class=\"text-danger\">";
            echo (isset($context["error_description"]) ? $context["error_description"] : null);
            echo "</div>
                                        ";
        }
        // line 65
        echo "                                    </div>
                                </div>
                            </div><!--description-->
                        </div>
                        <div class=\"row\">
                            <div class=\"form-group col-sm-4\">
                                <label class=\"col-sm-4 control-label\">От ред</label>
                                <div class=\"col-sm-8\">
                                    <div class=\"input-group\">
                                        <input type=\"text\" name=\"data[from_row]\" value=\"";
        // line 74
        echo (isset($context["from_row"]) ? $context["from_row"] : null);
        echo "\" placeholder=\"5\"
                                               class=\"form-control\"/>
                                    </div>
                                </div>
                            </div><!--1-->
                            <div class=\"form-group col-sm-4\">
                                <label class=\"col-sm-4 control-label\">До ред</label>
                                <div class=\"col-sm-8\">
                                    <div class=\"input-group\">
                                        <input type=\"text\" name=\"data[to_row]\" value=\"";
        // line 83
        echo (isset($context["to_row"]) ? $context["to_row"] : null);
        echo "\" placeholder=\"50\"
                                               class=\"form-control\"/>
                                    </div>
                                </div>
                            </div><!--1-->

                            <div class=\"form-group required col-sm-4\">
                                <label class=\"col-sm-4 control-label\">Файл с данни</label>
                                <div class=\"col-sm-8\">
                                    <div class=\"input-group\">
                                        <input type=\"file\" name=\"data_file\" class=\"form-control\"/>
                                        ";
        // line 94
        if ((isset($context["error_data_file"]) ? $context["error_data_file"] : null)) {
            // line 95
            echo "                                        <div class=\"text-danger\">";
            echo (isset($context["error_data_file"]) ? $context["error_data_file"] : null);
            echo "</div>
                                        ";
        }
        // line 97
        echo "                                    </div>
                                </div>
                            </div><!--1-->
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
";
        // line 107
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "data/filters_upload_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 107,  192 => 97,  186 => 95,  184 => 94,  170 => 83,  158 => 74,  147 => 65,  141 => 63,  139 => 62,  134 => 60,  125 => 53,  119 => 51,  117 => 50,  112 => 48,  101 => 40,  94 => 35,  86 => 31,  83 => 30,  76 => 26,  73 => 25,  71 => 24,  64 => 19,  53 => 17,  49 => 16,  44 => 14,  35 => 10,  28 => 6,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/*     <div class="page-header">*/
/*         <div class="container-fluid">*/
/*             <div class="pull-right">*/
/*                 <button type="submit" form="form-custom-field" data-toggle="tooltip" title="{{ button_save }}"*/
/*                         class="btn btn-primary">*/
/*                     <i class="fa fa-save"></i>*/
/*                 </button>*/
/*                 <a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-default">*/
/*                     <i class="fa fa-reply"></i>*/
/*                 </a>*/
/*             </div>*/
/*             <h1>{{ heading_title }}</h1>*/
/*             <ul class="breadcrumb">*/
/*                 {% for breadcrumb in breadcrumbs %}*/
/*                 <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*                 {% endfor %}*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <div class="container-fluid">*/
/*         {% if error_warning %}*/
/*         <div class="alert alert-danger alert-dismissible">*/
/*             <i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/*             <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*         </div>*/
/*         {% endif %}*/
/*         {% if success %}*/
/*         <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> {{ success }}*/
/*             <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*         </div>*/
/*         {% endif %}*/
/*         <div class="panel panel-default">*/
/*             <div class="panel-heading">*/
/*                 <h3 class="panel-title"><i class="fa fa-pencil"></i> Добавете файл и посочете колони за данни</h3>*/
/*             </div>*/
/*             <div class="panel-body">*/
/*                 <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-custom-field"*/
/*                       class="form-horizontal">*/
/*                     <fieldset>*/
/*                         <div class="row">*/
/*                             <div class="form-group required col-sm-4">*/
/*                                 <label class="col-sm-4 control-label">Баркод 1/EAN/</label>*/
/*                                 <div class="col-sm-8">*/
/*                                     <div class="input-group">*/
/*                                         <input type="text" name="data[barcode]" value="{{ barcode }}" placeholder="A"*/
/*                                                class="form-control"/>*/
/*                                         {% if error_barcode %}*/
/*                                         <div class="text-danger">{{ error_barcode }}</div>*/
/*                                         {% endif %}*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div><!--barcode-->*/
/*                             <div class="form-group required col-sm-4">*/
/*                                 <label class="col-sm-4 control-label">Описание</label>*/
/*                                 <div class="col-sm-8">*/
/*                                     <div class="input-group">*/
/*                                         <input type="text" name="data[description]" value="{{ description }}" placeholder="B"*/
/*                                                class="form-control"/>*/
/*                                         {% if error_description %}*/
/*                                         <div class="text-danger">{{ error_description }}</div>*/
/*                                         {% endif %}*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div><!--description-->*/
/*                         </div>*/
/*                         <div class="row">*/
/*                             <div class="form-group col-sm-4">*/
/*                                 <label class="col-sm-4 control-label">От ред</label>*/
/*                                 <div class="col-sm-8">*/
/*                                     <div class="input-group">*/
/*                                         <input type="text" name="data[from_row]" value="{{ from_row  }}" placeholder="5"*/
/*                                                class="form-control"/>*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div><!--1-->*/
/*                             <div class="form-group col-sm-4">*/
/*                                 <label class="col-sm-4 control-label">До ред</label>*/
/*                                 <div class="col-sm-8">*/
/*                                     <div class="input-group">*/
/*                                         <input type="text" name="data[to_row]" value="{{ to_row }}" placeholder="50"*/
/*                                                class="form-control"/>*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div><!--1-->*/
/* */
/*                             <div class="form-group required col-sm-4">*/
/*                                 <label class="col-sm-4 control-label">Файл с данни</label>*/
/*                                 <div class="col-sm-8">*/
/*                                     <div class="input-group">*/
/*                                         <input type="file" name="data_file" class="form-control"/>*/
/*                                         {% if error_data_file %}*/
/*                                         <div class="text-danger">{{ error_data_file }}</div>*/
/*                                         {% endif %}*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div><!--1-->*/
/*                         </div>*/
/*                     </fieldset>*/
/*                 </form>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {{ footer }}*/
