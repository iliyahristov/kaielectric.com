<?php

/* so-revo/template/common/header.twig */
class __TwigTemplate_8891352d00a375d5ab08add167cafffe783d20e0d2ebc3c5400251ebcea2bc6c extends Twig_Template
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
        // line 9
        echo "<!DOCTYPE html>
<html dir=\"";
        // line 10
        echo (isset($context["direction"]) ? $context["direction"] : null);
        echo "\" lang=\"";
        echo (isset($context["lang"]) ? $context["lang"] : null);
        echo "\">
<head>
<meta charset=\"UTF-8\" />
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
<title>";
        // line 14
        echo (isset($context["title"]) ? $context["title"] : null);
        echo "</title>
<base href=\"";
        // line 15
        echo (isset($context["base"]) ? $context["base"] : null);
        echo "\" />
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\"> 
";
        // line 17
        if ((isset($context["description"]) ? $context["description"] : null)) {
            echo "<meta name=\"description\" content=\"";
            echo (isset($context["description"]) ? $context["description"] : null);
            echo "\" />";
        }
        // line 18
        if ((isset($context["keywords"]) ? $context["keywords"] : null)) {
            echo "<meta name=\"keywords\" content=\"";
            echo (isset($context["keywords"]) ? $context["keywords"] : null);
            echo "\" />";
        }
        // line 19
        echo "<!--[if IE]><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\"><![endif]-->

";
        // line 22
        if (((isset($context["direction"]) ? $context["direction"] : null) == "ltr")) {
            echo " ";
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addCss", array(0 => "catalog/view/javascript/bootstrap/css/bootstrap.min.css"), "method");
            echo "
";
        } elseif ((        // line 23
(isset($context["direction"]) ? $context["direction"] : null) == "rtl")) {
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addCss", array(0 => "catalog/view/javascript/soconfig/css/bootstrap/bootstrap.rtl.min.css"), "method");
            echo " 
";
        } else {
            // line 24
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addCss", array(0 => "catalog/view/javascript/bootstrap/css/bootstrap.min.css"), "method");
            echo " ";
        }
        // line 25
        echo "
";
        // line 26
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addCss", array(0 => "catalog/view/javascript/font-awesome/css/font-awesome.min.css"), "method");
        echo "
";
        // line 27
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addCss", array(0 => "catalog/view/javascript/soconfig/css/lib.css"), "method");
        echo "
";
        // line 28
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addCss", array(0 => (("catalog/view/theme/" . (isset($context["theme_directory"]) ? $context["theme_directory"] : null)) . "/css/ie9-and-up.css")), "method");
        echo "
";
        // line 29
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addCss", array(0 => (("catalog/view/theme/" . (isset($context["theme_directory"]) ? $context["theme_directory"] : null)) . "/css/custom.css")), "method");
        echo "

";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["styles"]) ? $context["styles"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addCss", array(0 => $this->getAttribute($context["style"], "href", array())), "method");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "cssfile_status"), "method")) {
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "cssfile_url"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["cssfile"]) {
                echo " ";
                echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addCss", array(0 => $context["cssfile"]), "method");
                echo " ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cssfile'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo " ";
        }
        // line 33
        echo "
";
        // line 35
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => "catalog/view/javascript/jquery/jquery-2.1.1.min.js"), "method");
        echo "
";
        // line 36
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => "catalog/view/javascript/bootstrap/js/bootstrap.min.js"), "method");
        echo "
";
        // line 37
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => "catalog/view/javascript/soconfig/js/libs.js"), "method");
        echo "

";
        // line 39
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => "catalog/view/javascript/soconfig/js/so.system.js"), "method");
        echo "
";
        // line 40
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => "catalog/view/javascript/soconfig/js/jquery.sticky-kit.min.js"), "method");
        echo "
";
        // line 41
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => "catalog/view/javascript/lazysizes/lazysizes.min.js"), "method");
        echo "
";
        // line 42
        if (((isset($context["class"]) ? $context["class"] : null) == "information-information")) {
            echo " ";
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => "catalog/view/javascript/soconfig/js/typo/element.js"), "method");
            echo " ";
        }
        // line 43
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => "catalog/view/javascript/soconfig/js/jquery.elevateZoom-3.0.8.min.js"), "method");
        echo "



";
        // line 47
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => (("catalog/view/theme/" . (isset($context["theme_directory"]) ? $context["theme_directory"] : null)) . "/js/so.custom.js")), "method");
        echo "
";
        // line 48
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => (("catalog/view/theme/" . (isset($context["theme_directory"]) ? $context["theme_directory"] : null)) . "/js/common.js")), "method");
        echo "
";
        // line 49
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => (("catalog/view/theme/" . (isset($context["theme_directory"]) ? $context["theme_directory"] : null)) . "/js/custom.js")), "method");
        echo "
";
        // line 50
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => (("catalog/view/theme/" . (isset($context["theme_directory"]) ? $context["theme_directory"] : null)) . "/js/jquery.easyembed.js")), "method");
        echo "

";
        // line 52
        if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "toppanel_status"), "method")) {
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => "catalog/view/javascript/soconfig/js/toppanel.js"), "method");
        }
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["scripts"]) ? $context["scripts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            echo " ";
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "addJs", array(0 => $context["script"]), "method");
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "

";
        // line 57
        echo "
";
        // line 58
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "scss_compass", array());
        echo "
";
        // line 59
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "css_out", array(0 => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "cssExclude"), "method")), "method");
        echo "
";
        // line 60
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "js_out", array(0 => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "jsExclude"), "method")), "method");
        echo "


";
        // line 64
        if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "url_body"), "method") && ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "body_status"), "method") == "google"))) {
            echo " <link href='";
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "url_body"), "method");
            echo "' rel='stylesheet' type='text/css'> ";
        }
        echo " \t
";
        // line 65
        if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "url_menu"), "method") && ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "menu_status"), "method") == "google"))) {
            echo " <link href='";
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "url_menu"), "method");
            echo "' rel='stylesheet' type='text/css'> ";
        }
        echo " \t
";
        // line 66
        if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "url_heading"), "method") && ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "heading_status"), "method") == "google"))) {
            echo " <link href='";
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "url_heading"), "method");
            echo "' rel='stylesheet' type='text/css'> ";
        }
        echo " \t
";
        // line 67
        if ((isset($context["selector_body"]) ? $context["selector_body"] : null)) {
            // line 68
            echo "\t<style type=\"text/css\">
\t\t";
            // line 69
            if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "body_status"), "method") == "google")) {
                echo " ";
                echo ((((isset($context["selector_body"]) ? $context["selector_body"] : null) . "{font-family:") . $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "family_body"), "method")) . "}");
                echo "
\t\t";
            } else {
                // line 70
                echo "  ";
                echo ((((isset($context["selector_body"]) ? $context["selector_body"] : null) . "{font-family:") . $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "normal_body"), "method")) . "}");
            }
            echo " 
\t</style>
";
        }
        // line 72
        echo " 
";
        // line 73
        if ((isset($context["selector_menu"]) ? $context["selector_menu"] : null)) {
            // line 74
            echo "\t<style type=\"text/css\">
\t\t";
            // line 75
            if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "menu_status"), "method") == "google")) {
                echo " ";
                echo ((((isset($context["selector_menu"]) ? $context["selector_menu"] : null) . "{font-family:") . $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "family_menu"), "method")) . "}");
                echo "
\t\t";
            } else {
                // line 76
                echo "  ";
                echo ((((isset($context["selector_menu"]) ? $context["selector_menu"] : null) . "{font-family:") . $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "normal_menu"), "method")) . "}");
            }
            echo " 
\t</style>
";
        }
        // line 78
        echo " 
";
        // line 79
        if ((isset($context["selector_heading"]) ? $context["selector_heading"] : null)) {
            // line 80
            echo "\t<style type=\"text/css\">
\t\t";
            // line 81
            if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "heading_status"), "method") == "google")) {
                echo " ";
                echo ((((isset($context["selector_heading"]) ? $context["selector_heading"] : null) . "{font-family:") . $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "family_heading"), "method")) . "}");
                echo "
\t\t";
            } else {
                // line 82
                echo "  ";
                echo ((((isset($context["selector_heading"]) ? $context["selector_heading"] : null) . "{font-family:") . $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "normal_heading"), "method")) . "}");
            }
            echo " 
\t</style>
";
        }
        // line 84
        echo " 


";
        // line 88
        if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "cssinput_status"), "method") &&  !twig_test_empty($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "cssinput_content"), "method")))) {
            // line 89
            echo "    <style type=\"text/css\">";
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "cssinput_content"), "method");
            echo " </style>
";
        }
        // line 90
        echo " 

";
        // line 92
        if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "jsinput_status"), "method") &&  !twig_test_empty($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "jsinput_content"), "method")))) {
            // line 93
            echo "   <script type=\"text/javascript\"><!--";
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "jsinput_content"), "method");
            echo "  //--></script>
";
        }
        // line 94
        echo " 


";
        // line 98
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["links"]) ? $context["links"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            echo "<link href=\"";
            echo $this->getAttribute($context["link"], "href", array());
            echo "\" rel=\"";
            echo $this->getAttribute($context["link"], "rel", array());
            echo "\" />";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 99
        echo "\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["analytics"]) ? $context["analytics"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["analytic"]) {
            // line 100
            echo "\t";
            echo $context["analytic"];
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['analytic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "
";
        // line 104
        if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "layoutstyle"), "method") == "boxed")) {
            echo " 
\t<style type=\"text/css\">
\tbody {
\t\tbackground-color:";
            // line 107
            echo (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "theme_bgcolor"), "method")) ? ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "theme_bgcolor"), "method")) : ("none"));
            echo " ;\t\t
\t\t";
            // line 108
            if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "contentbg"), "method") != "")) {
                // line 109
                echo "\t\t\tbackground-image: url(\"image/";
                echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "contentbg"), "method");
                echo " \");
\t\t";
            }
            // line 111
            echo "\t\tbackground-repeat:";
            echo (( !twig_test_empty($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "content_bg_mode"), "method"))) ? ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "content_bg_mode"), "method")) : ("no-repeat"));
            echo " ;
\t\tbackground-attachment:";
            // line 112
            echo (( !twig_test_empty($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "content_attachment"), "method"))) ? ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "content_attachment"), "method")) : ("inherit"));
            echo " ;
\t\tbackground-position:top center; 
\t}
\t</style>
";
        }
        // line 116
        echo " \t

</head>
";
        // line 120
        echo "
\t";
        // line 121
        $context["layoutbox"] = (( !twig_test_empty((isset($context["url_layoutbox"]) ? $context["url_layoutbox"] : null))) ? ((isset($context["url_layoutbox"]) ? $context["url_layoutbox"] : null)) : ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "layoutstyle"), "method")));
        // line 122
        echo "\t";
        $context["pattern"] = (( !twig_test_empty((isset($context["url_pattern"]) ? $context["url_pattern"] : null))) ? ((isset($context["url_pattern"]) ? $context["url_pattern"] : null)) : ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "pattern"), "method")));
        // line 123
        echo "

\t";
        // line 125
        $context["cls_body"] = ((isset($context["class"]) ? $context["class"] : null) . " ");
        // line 126
        echo "\t";
        $context["cls_body"] = ((isset($context["cls_body"]) ? $context["cls_body"] : null) . (isset($context["direction"]) ? $context["direction"] : null));
        // line 127
        echo "\t";
        $context["cls_body"] = (((isset($context["cls_body"]) ? $context["cls_body"] : null) . " layout-") . $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typelayout"), "method"));
        // line 128
        if (((((isset($context["layoutbox"]) ? $context["layoutbox"] : null) == "boxed") && ((isset($context["pattern"]) ? $context["pattern"] : null) != "none")) && twig_test_empty($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "contentbg"), "method")))) {
            // line 129
            echo "\t";
            $context["cls_body"] = (((isset($context["cls_body"]) ? $context["cls_body"] : null) . " pattern-") . (isset($context["pattern"]) ? $context["pattern"] : null));
        }
        // line 130
        echo " 

\t";
        // line 132
        $context["cls_wrapper"] = ("wrapper-" . (isset($context["layoutbox"]) ? $context["layoutbox"] : null));
        // line 133
        echo "\t";
        $context["cls_wrapper"] = (((isset($context["cls_wrapper"]) ? $context["cls_wrapper"] : null) . " banners-effect-") . $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "type_banner"), "method"));
        // line 134
        echo "
\t
<body class=\"";
        // line 136
        echo (isset($context["cls_body"]) ? $context["cls_body"] : null);
        echo "\">
<div id=\"wrapper\" class=\"";
        // line 137
        echo (isset($context["cls_wrapper"]) ? $context["cls_wrapper"] : null);
        echo "\">  
 
";
        // line 140
        if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "preloader"), "method")) {
            // line 141
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/soconfig/preloader.twig"), "so-revo/template/common/header.twig", 141)->display(array_merge($context, array("preloader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "preloader_animation"), "method"))));
        }
        // line 143
        echo "
";
        // line 145
        if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "1")) {
            // line 146
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header1.twig"), "so-revo/template/common/header.twig", 146)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 147
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "2")) {
            // line 148
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header2.twig"), "so-revo/template/common/header.twig", 148)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 149
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "3")) {
            // line 150
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header3.twig"), "so-revo/template/common/header.twig", 150)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 151
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "4")) {
            // line 152
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header4.twig"), "so-revo/template/common/header.twig", 152)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 153
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "5")) {
            // line 154
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header5.twig"), "so-revo/template/common/header.twig", 154)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 155
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "6")) {
            // line 156
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header6.twig"), "so-revo/template/common/header.twig", 156)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 157
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "7")) {
            // line 158
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header7.twig"), "so-revo/template/common/header.twig", 158)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 159
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "8")) {
            // line 160
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header8.twig"), "so-revo/template/common/header.twig", 160)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 161
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "9")) {
            // line 162
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header9.twig"), "so-revo/template/common/header.twig", 162)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 163
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "10")) {
            // line 164
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header10.twig"), "so-revo/template/common/header.twig", 164)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 165
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "11")) {
            // line 166
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header11.twig"), "so-revo/template/common/header.twig", 166)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 167
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "12")) {
            // line 168
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header12.twig"), "so-revo/template/common/header.twig", 168)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 169
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "13")) {
            // line 170
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header13.twig"), "so-revo/template/common/header.twig", 170)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 171
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "14")) {
            // line 172
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header14.twig"), "so-revo/template/common/header.twig", 172)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } elseif (($this->getAttribute(        // line 173
(isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method") == "15")) {
            // line 174
            echo "\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/header/header15.twig"), "so-revo/template/common/header.twig", 174)->display(array_merge($context, array("typeheader" => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "typeheader"), "method"))));
        } else {
            // line 176
            echo "\t<style>
\t\t.alert-primary .alert-link {color: #002752;}
\t\t.alert-link {font-weight: 700;text-decoration: none;}
\t\t.alert-link:hover{text-decoration: underline;}
\t\t.alert {color: #004085;background-color: #cce5ff;padding: .75rem 1.25rem;margin-bottom: 1rem;border: 1px solid #b8daff;border-radius: .25rem;
\t\t}
\t</style>
\t<div class=\"alert alert-primary\">
\t\t\tGo to admin, find Extensions >>  <a class=\"alert-link\" href=\"admin/index.php?route=marketplace/modification\"  target=”_blank”> Modifications </a> and click 'Refresh' button. To apply the changes characterised by the uploaded modification file
\t</div>
";
        }
        // line 187
        echo "

";
    }

    public function getTemplateName()
    {
        return "so-revo/template/common/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  541 => 187,  528 => 176,  524 => 174,  522 => 173,  519 => 172,  517 => 171,  514 => 170,  512 => 169,  509 => 168,  507 => 167,  504 => 166,  502 => 165,  499 => 164,  497 => 163,  494 => 162,  492 => 161,  489 => 160,  487 => 159,  484 => 158,  482 => 157,  479 => 156,  477 => 155,  474 => 154,  472 => 153,  469 => 152,  467 => 151,  464 => 150,  462 => 149,  459 => 148,  457 => 147,  454 => 146,  452 => 145,  449 => 143,  445 => 141,  443 => 140,  438 => 137,  434 => 136,  430 => 134,  427 => 133,  425 => 132,  421 => 130,  417 => 129,  415 => 128,  412 => 127,  409 => 126,  407 => 125,  403 => 123,  400 => 122,  398 => 121,  395 => 120,  390 => 116,  382 => 112,  377 => 111,  371 => 109,  369 => 108,  365 => 107,  359 => 104,  356 => 102,  347 => 100,  342 => 99,  329 => 98,  324 => 94,  318 => 93,  316 => 92,  312 => 90,  306 => 89,  304 => 88,  299 => 84,  291 => 82,  284 => 81,  281 => 80,  279 => 79,  276 => 78,  268 => 76,  261 => 75,  258 => 74,  256 => 73,  253 => 72,  245 => 70,  238 => 69,  235 => 68,  233 => 67,  225 => 66,  217 => 65,  209 => 64,  203 => 60,  199 => 59,  195 => 58,  192 => 57,  188 => 54,  177 => 53,  173 => 52,  168 => 50,  164 => 49,  160 => 48,  156 => 47,  149 => 43,  143 => 42,  139 => 41,  135 => 40,  131 => 39,  126 => 37,  122 => 36,  118 => 35,  115 => 33,  101 => 32,  92 => 31,  87 => 29,  83 => 28,  79 => 27,  75 => 26,  72 => 25,  68 => 24,  62 => 23,  56 => 22,  52 => 19,  46 => 18,  40 => 17,  35 => 15,  31 => 14,  22 => 10,  19 => 9,);
    }
}
/* {#*/
/* ****************************************************** */
/*  * @package	SO Framework for Opencart 3.x*/
/*  * @author	http://www.opencartworks.com*/
/*  * @license	GNU General Public License*/
/*  * @copyright(C) 2008-2017 opencartworks.com. All rights reserved.*/
/*  *******************************************************/
/* #}*/
/* <!DOCTYPE html>*/
/* <html dir="{{ direction }}" lang="{{ lang }}">*/
/* <head>*/
/* <meta charset="UTF-8" />*/
/* <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/* <title>{{ title }}</title>*/
/* <base href="{{ base }}" />*/
/* <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> */
/* {% if description %}<meta name="description" content="{{ description }}" />{% endif %}*/
/* {% if keywords %}<meta name="keywords" content="{{ keywords }}" />{% endif %}*/
/* <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->*/
/* */
/* {# =========== Begin General CSS ==============#}*/
/* {% if direction=='ltr' %} {{soconfig.addCss('catalog/view/javascript/bootstrap/css/bootstrap.min.css')}}*/
/* {% elseif direction=='rtl' %}{{soconfig.addCss('catalog/view/javascript/soconfig/css/bootstrap/bootstrap.rtl.min.css')}} */
/* {% else %}{{soconfig.addCss('catalog/view/javascript/bootstrap/css/bootstrap.min.css')}} {% endif %}*/
/* */
/* {{soconfig.addCss('catalog/view/javascript/font-awesome/css/font-awesome.min.css')}}*/
/* {{soconfig.addCss('catalog/view/javascript/soconfig/css/lib.css')}}*/
/* {{soconfig.addCss('catalog/view/theme/'~theme_directory~'/css/ie9-and-up.css')}}*/
/* {{soconfig.addCss('catalog/view/theme/'~theme_directory~'/css/custom.css')}}*/
/* */
/* {% for style in styles %}{{ soconfig.addCss(style.href)}}{% endfor %}*/
/* {% if soconfig.get_settings('cssfile_status') %}{% for cssfile in soconfig.get_settings('cssfile_url') %} {{soconfig.addCss(cssfile)}} {% endfor %} {% endif %}*/
/* */
/* {# =========== Begin General Scripts ==============#}*/
/* {{soconfig.addJs('catalog/view/javascript/jquery/jquery-2.1.1.min.js')}}*/
/* {{soconfig.addJs('catalog/view/javascript/bootstrap/js/bootstrap.min.js')}}*/
/* {{soconfig.addJs('catalog/view/javascript/soconfig/js/libs.js')}}*/
/* */
/* {{soconfig.addJs('catalog/view/javascript/soconfig/js/so.system.js')}}*/
/* {{soconfig.addJs('catalog/view/javascript/soconfig/js/jquery.sticky-kit.min.js')}}*/
/* {{soconfig.addJs('catalog/view/javascript/lazysizes/lazysizes.min.js')}}*/
/* {% if class=='information-information' %} {{soconfig.addJs('catalog/view/javascript/soconfig/js/typo/element.js')}} {% endif %}*/
/* {{soconfig.addJs('catalog/view/javascript/soconfig/js/jquery.elevateZoom-3.0.8.min.js')}}*/
/* */
/* */
/* */
/* {{soconfig.addJs('catalog/view/theme/'~theme_directory~'/js/so.custom.js')}}*/
/* {{soconfig.addJs('catalog/view/theme/'~theme_directory~'/js/common.js')}}*/
/* {{soconfig.addJs('catalog/view/theme/'~theme_directory~'/js/custom.js')}}*/
/* {{soconfig.addJs('catalog/view/theme/'~theme_directory~'/js/jquery.easyembed.js')}}*/
/* */
/* {% if soconfig.get_settings('toppanel_status') %}{{soconfig.addJs('catalog/view/javascript/soconfig/js/toppanel.js')}}{% endif %}*/
/* {% for script in scripts %} {{soconfig.addJs(script)}} {% endfor %}*/
/* */
/* */
/* {# =========== Begin Other CSS & JS  ==============#}*/
/* */
/* {{soconfig.scss_compass}}*/
/* {{soconfig.css_out(soconfig.get_settings('cssExclude'))}}*/
/* {{soconfig.js_out(soconfig.get_settings('jsExclude'))}}*/
/* */
/* */
/* {# =========== Begin Google Font ==============#}*/
/* {% if soconfig.get_settings('url_body')  and  soconfig.get_settings('body_status') ==  'google' %} <link href='{{ soconfig.get_settings('url_body') }}' rel='stylesheet' type='text/css'> {% endif %} 	*/
/* {% if soconfig.get_settings('url_menu')  and  soconfig.get_settings('menu_status')  ==  'google' %} <link href='{{ soconfig.get_settings('url_menu') }}' rel='stylesheet' type='text/css'> {% endif %} 	*/
/* {% if soconfig.get_settings('url_heading')  and  soconfig.get_settings('heading_status') ==  'google' %} <link href='{{ soconfig.get_settings('url_heading') }}' rel='stylesheet' type='text/css'> {% endif %} 	*/
/* {% if selector_body %}*/
/* 	<style type="text/css">*/
/* 		{% if soconfig.get_settings('body_status') == 'google' %} {{ (selector_body|raw~'{font-family:'~ soconfig.get_settings('family_body')~'}') }}*/
/* 		{% else %}  {{ selector_body|raw~'{font-family:'~ soconfig.get_settings('normal_body')~'}' }}{% endif %} */
/* 	</style>*/
/* {% endif %} */
/* {% if selector_menu %}*/
/* 	<style type="text/css">*/
/* 		{% if soconfig.get_settings('menu_status') == 'google' %} {{ (selector_menu|raw~'{font-family:'~ soconfig.get_settings('family_menu')~'}') }}*/
/* 		{% else %}  {{ selector_menu|raw~'{font-family:'~ soconfig.get_settings('normal_menu')~'}' }}{% endif %} */
/* 	</style>*/
/* {% endif %} */
/* {% if selector_heading %}*/
/* 	<style type="text/css">*/
/* 		{% if soconfig.get_settings('heading_status') == 'google' %} {{ (selector_heading|raw~'{font-family:'~ soconfig.get_settings('family_heading')~'}') }}*/
/* 		{% else %}  {{ selector_heading|raw~'{font-family:'~ soconfig.get_settings('normal_heading')~'}' }}{% endif %} */
/* 	</style>*/
/* {% endif %} */
/* */
/* */
/* {# =========== Custom Code Editor ==============#}*/
/* {% if soconfig.get_settings('cssinput_status') and (soconfig.get_settings('cssinput_content')) is not empty %}*/
/*     <style type="text/css">{{ soconfig.get_settings('cssinput_content')  }} </style>*/
/* {% endif %} */
/* */
/* {% if soconfig.get_settings('jsinput_status') and (soconfig.get_settings('jsinput_content')) is not empty %}*/
/*    <script type="text/javascript"><!--{{ soconfig.get_settings('jsinput_content')  }}  //--></script>*/
/* {% endif %} */
/* */
/* */
/* {# =========== Begin Google Analytics ==============#}*/
/* {% for link in links %}<link href="{{ link.href }}" rel="{{ link.rel }}" />{% endfor %}*/
/* 	{% for analytic in analytics %}*/
/* 	{{ analytic }}*/
/* {% endfor %}*/
/* */
/* {# =========== Begin Cusom Code ==============#}*/
/* {% if soconfig.get_settings('layoutstyle') == 'boxed'  %} */
/* 	<style type="text/css">*/
/* 	body {*/
/* 		background-color:{{ soconfig.get_settings('theme_bgcolor') ? soconfig.get_settings('theme_bgcolor') : 'none' }} ;		*/
/* 		{% if soconfig.get_settings('contentbg') !='' %}*/
/* 			background-image: url("image/{{soconfig.get_settings('contentbg') }} ");*/
/* 		{% endif %}*/
/* 		background-repeat:{{ soconfig.get_settings('content_bg_mode') is not empty ? soconfig.get_settings('content_bg_mode') : 'no-repeat' }} ;*/
/* 		background-attachment:{{ soconfig.get_settings('content_attachment') is not empty ? soconfig.get_settings('content_attachment') : 'inherit' }} ;*/
/* 		background-position:top center; */
/* 	}*/
/* 	</style>*/
/* {% endif %} 	*/
/* */
/* </head>*/
/* {# =========== Add class Body ==============#}*/
/* */
/* 	{% set layoutbox =  url_layoutbox is not empty  ? url_layoutbox : soconfig.get_settings('layoutstyle') %}*/
/* 	{% set pattern  =  url_pattern is not empty    ? url_pattern : soconfig.get_settings('pattern') %}*/
/* */
/* */
/* 	{% set cls_body = class ~ ' ' %}*/
/* 	{% set cls_body = cls_body ~ direction %}*/
/* 	{% set cls_body = cls_body ~ ' layout-'~soconfig.get_settings('typelayout')%}*/
/* {% if layoutbox=='boxed' and pattern !='none' and soconfig.get_settings('contentbg') is empty %}*/
/* 	{% set cls_body = cls_body ~ ' pattern-'~pattern%}*/
/* {% endif %} */
/* */
/* 	{% set cls_wrapper = 'wrapper-'~layoutbox%}*/
/* 	{% set cls_wrapper = cls_wrapper ~ ' banners-effect-'~soconfig.get_settings('type_banner')%}*/
/* */
/* 	*/
/* <body class="{{cls_body}}">*/
/* <div id="wrapper" class="{{cls_wrapper}}">  */
/*  */
/* {# =========== Show Preloader ==============#}*/
/* {% if soconfig.get_settings('preloader')%}*/
/* 	{% include theme_directory~'/template/soconfig/preloader.twig' with {preloader: soconfig.get_settings('preloader_animation')} %}*/
/* {% endif %}*/
/* */
/* {# =========== Show Header==============#}*/
/* {% if soconfig.get_settings('typeheader') =='1'%}*/
/* 	{% include theme_directory~'/template/header/header1.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='2'%}*/
/* 	{% include theme_directory~'/template/header/header2.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='3'%}*/
/* 	{% include theme_directory~'/template/header/header3.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='4'%}*/
/* 	{% include theme_directory~'/template/header/header4.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='5'%}*/
/* 	{% include theme_directory~'/template/header/header5.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='6'%}*/
/* 	{% include theme_directory~'/template/header/header6.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='7'%}*/
/* 	{% include theme_directory~'/template/header/header7.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='8'%}*/
/* 	{% include theme_directory~'/template/header/header8.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='9'%}*/
/* 	{% include theme_directory~'/template/header/header9.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='10'%}*/
/* 	{% include theme_directory~'/template/header/header10.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='11'%}*/
/* 	{% include theme_directory~'/template/header/header11.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='12'%}*/
/* 	{% include theme_directory~'/template/header/header12.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='13'%}*/
/* 	{% include theme_directory~'/template/header/header13.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='14'%}*/
/* 	{% include theme_directory~'/template/header/header14.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% elseif soconfig.get_settings('typeheader') =='15'%}*/
/* 	{% include theme_directory~'/template/header/header15.twig' with {typeheader: soconfig.get_settings('typeheader')} %}*/
/* {% else%}*/
/* 	<style>*/
/* 		.alert-primary .alert-link {color: #002752;}*/
/* 		.alert-link {font-weight: 700;text-decoration: none;}*/
/* 		.alert-link:hover{text-decoration: underline;}*/
/* 		.alert {color: #004085;background-color: #cce5ff;padding: .75rem 1.25rem;margin-bottom: 1rem;border: 1px solid #b8daff;border-radius: .25rem;*/
/* 		}*/
/* 	</style>*/
/* 	<div class="alert alert-primary">*/
/* 			Go to admin, find Extensions >>  <a class="alert-link" href="admin/index.php?route=marketplace/modification"  target=”_blank”> Modifications </a> and click 'Refresh' button. To apply the changes characterised by the uploaded modification file*/
/* 	</div>*/
/* {% endif %}*/
/* */
/* */
/* */
