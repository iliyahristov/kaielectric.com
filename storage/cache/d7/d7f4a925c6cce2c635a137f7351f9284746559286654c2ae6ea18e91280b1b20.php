<?php

/* so-revo/template/extension/module/so_home_slider/default.twig */
class __TwigTemplate_5177208b817be4678d43086244122e98dd182efe7cc180aecc547b25e2d21a02 extends Twig_Template
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
        $context["count_item"] = twig_length_filter($this->env, (isset($context["list"]) ? $context["list"] : null));
        // line 2
        echo "
<div class=\"module sohomepage-slider ";
        // line 3
        echo (isset($context["direction_class"]) ? $context["direction_class"] : null);
        echo "  ";
        echo (isset($context["class_suffix"]) ? $context["class_suffix"] : null);
        echo "\">
    ";
        // line 4
        if ((isset($context["disp_title_module"]) ? $context["disp_title_module"] : null)) {
            // line 5
            echo "      <h3 class=\"modtitle\">";
            echo (isset($context["head_name"]) ? $context["head_name"] : null);
            echo "</h3>
    ";
        }
        // line 7
        echo "
";
        // line 8
        if ( !twig_test_empty(trim((isset($context["pre_text"]) ? $context["pre_text"] : null)))) {
            // line 9
            echo "  <div class=\"form-group\">
    ";
            // line 10
            echo (isset($context["pre_text"]) ? $context["pre_text"] : null);
            echo "
  </div>
";
        }
        // line 13
        echo "

<div class=\"modcontent\">
    ";
        // line 16
        if ((isset($context["list"]) ? $context["list"] : null)) {
            echo " 
    <div id=\"sohomepage-slider";
            // line 17
            echo (isset($context["module"]) ? $context["module"] : null);
            echo "\">
        <div class=\"so-homeslider sohomeslider-inner-";
            // line 18
            echo (isset($context["module"]) ? $context["module"] : null);
            echo "\">
        ";
            // line 19
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                echo "        
            <div class=\"item\">
                <a href=\"";
                // line 21
                echo $this->getAttribute($context["item"], "url", array());
                echo "\" title=\"";
                echo $this->getAttribute($context["item"], "title", array());
                echo "\" target=\"";
                echo (isset($context["item_link_target"]) ? $context["item_link_target"] : null);
                echo "\">
                    <img class=\"lazyload\"   data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"";
                // line 22
                echo $this->getAttribute($context["item"], "thumb", array());
                echo "\"  alt=\"";
                echo $this->getAttribute($context["item"], "title", array());
                echo "\" />
                </a>
                <div class=\"sohomeslider-description\">
                    ";
                // line 25
                if ($this->getAttribute($context["item"], "caption", array())) {
                    echo " <h2>";
                    echo $this->getAttribute($context["item"], "caption", array());
                    echo "</h2> ";
                }
                // line 26
                echo "                    ";
                echo $this->getAttribute($context["item"], "description", array());
                echo "              
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "        </div>

    <script type=\"text/javascript\">
      var total_item = ";
            // line 33
            echo (isset($context["count_item"]) ? $context["count_item"] : null);
            echo " ;
      \$(\".sohomeslider-inner-";
            // line 34
            echo (isset($context["module"]) ? $context["module"] : null);
            echo "\").owlCarousel2({
\t\t  rtl: ";
            // line 35
            echo (isset($context["direction"]) ? $context["direction"] : null);
            echo ",
          animateOut: '";
            // line 36
            echo (isset($context["animateOut"]) ? $context["animateOut"] : null);
            echo "',
          animateIn: '";
            // line 37
            echo (isset($context["animateIn"]) ? $context["animateIn"] : null);
            echo "',
          autoplay: ";
            // line 38
            echo (isset($context["autoplay"]) ? $context["autoplay"] : null);
            echo ",
          autoplayTimeout: ";
            // line 39
            echo (isset($context["autoplayTimeout"]) ? $context["autoplayTimeout"] : null);
            echo ",
          autoplaySpeed:  ";
            // line 40
            echo (isset($context["autoplaySpeed"]) ? $context["autoplaySpeed"] : null);
            echo ",
          smartSpeed: 500,
          autoplayHoverPause: ";
            // line 42
            echo (isset($context["autoplayHoverPause"]) ? $context["autoplayHoverPause"] : null);
            echo ",
          startPosition: ";
            // line 43
            echo (isset($context["startPosition"]) ? $context["startPosition"] : null);
            echo ",
          mouseDrag:  ";
            // line 44
            echo (isset($context["mouseDrag"]) ? $context["mouseDrag"] : null);
            echo ",
          touchDrag: ";
            // line 45
            echo (isset($context["touchDrag"]) ? $context["touchDrag"] : null);
            echo ",
          dots: ";
            // line 46
            echo (isset($context["dots"]) ? $context["dots"] : null);
            echo ",
          autoWidth: false,
          dotClass: \"owl2-dot\",
          dotsClass: \"owl2-dots\",
          loop: ";
            // line 50
            echo (isset($context["loop"]) ? $context["loop"] : null);
            echo ",
          navText: [\"Next\", \"Prev\"],
          navClass: [\"owl2-prev\", \"owl2-next\"],

          responsive: {
          0:{ items: ";
            // line 55
            echo (isset($context["nb_column4"]) ? $context["nb_column4"] : null);
            echo ",
            nav: total_item <= ";
            // line 56
            echo (isset($context["nb_column4"]) ? $context["nb_column4"] : null);
            echo " ? false : ((";
            echo (isset($context["nav"]) ? $context["nav"] : null);
            echo " ) ? true: false),
          },
          480:{ items: ";
            // line 58
            echo (isset($context["nb_column3"]) ? $context["nb_column3"] : null);
            echo ",
            nav: total_item <= ";
            // line 59
            echo (isset($context["nb_column3"]) ? $context["nb_column3"] : null);
            echo " ? false : ((";
            echo (isset($context["nav"]) ? $context["nav"] : null);
            echo " ) ? true: false),
          },
          768:{ items: ";
            // line 61
            echo (isset($context["nb_column2"]) ? $context["nb_column2"] : null);
            echo ",
            nav: total_item <= ";
            // line 62
            echo (isset($context["nb_column2"]) ? $context["nb_column2"] : null);
            echo " ? false : ((";
            echo (isset($context["nav"]) ? $context["nav"] : null);
            echo " ) ? true: false),
          },
          992:{ items: ";
            // line 64
            echo (isset($context["nb_column1"]) ? $context["nb_column1"] : null);
            echo ",
            nav: total_item <= ";
            // line 65
            echo (isset($context["nb_column1"]) ? $context["nb_column1"] : null);
            echo " ? false : ((";
            echo (isset($context["nav"]) ? $context["nav"] : null);
            echo " ) ? true: false),
          },
          1200:{ items: ";
            // line 67
            echo (isset($context["nb_column0"]) ? $context["nb_column0"] : null);
            echo ",
            nav: total_item <= ";
            // line 68
            echo (isset($context["nb_column0"]) ? $context["nb_column0"] : null);
            echo " ? false : ((";
            echo (isset($context["nav"]) ? $context["nav"] : null);
            echo " ) ? true: false),
          }
        },
      });
    </script>
    </div>
    ";
        } else {
            // line 74
            echo "  
        ";
            // line 75
            echo $this->getAttribute((isset($context["objlang"]) ? $context["objlang"] : null), "get", array(0 => "text_noitem"), "method");
            echo "
    ";
        }
        // line 77
        echo "</div> <!--/.modcontent-->

";
        // line 79
        if ( !twig_test_empty(trim((isset($context["post_text"]) ? $context["post_text"] : null)))) {
            // line 80
            echo "  <div class=\"form-group\">
    ";
            // line 81
            echo (isset($context["post_text"]) ? $context["post_text"] : null);
            echo "
  </div>
";
        }
        // line 84
        echo "

</div> 
";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/module/so_home_slider/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  261 => 84,  255 => 81,  252 => 80,  250 => 79,  246 => 77,  241 => 75,  238 => 74,  226 => 68,  222 => 67,  215 => 65,  211 => 64,  204 => 62,  200 => 61,  193 => 59,  189 => 58,  182 => 56,  178 => 55,  170 => 50,  163 => 46,  159 => 45,  155 => 44,  151 => 43,  147 => 42,  142 => 40,  138 => 39,  134 => 38,  130 => 37,  126 => 36,  122 => 35,  118 => 34,  114 => 33,  109 => 30,  98 => 26,  92 => 25,  84 => 22,  76 => 21,  69 => 19,  65 => 18,  61 => 17,  57 => 16,  52 => 13,  46 => 10,  43 => 9,  41 => 8,  38 => 7,  32 => 5,  30 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set count_item = list|length %}*/
/* */
/* <div class="module sohomepage-slider {{direction_class}}  {{ class_suffix}}">*/
/*     {% if disp_title_module %}*/
/*       <h3 class="modtitle">{{ head_name}}</h3>*/
/*     {% endif %}*/
/* */
/* {% if pre_text|trim is not empty  %}*/
/*   <div class="form-group">*/
/*     {{ pre_text }}*/
/*   </div>*/
/* {% endif %}*/
/* */
/* */
/* <div class="modcontent">*/
/*     {% if list %} */
/*     <div id="sohomepage-slider{{ module}}">*/
/*         <div class="so-homeslider sohomeslider-inner-{{ module}}">*/
/*         {% for item in list %}        */
/*             <div class="item">*/
/*                 <a href="{{ item.url}}" title="{{ item.title}}" target="{{ item_link_target}}">*/
/*                     <img class="lazyload"   data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ item.thumb}}"  alt="{{ item.title}}" />*/
/*                 </a>*/
/*                 <div class="sohomeslider-description">*/
/*                     {% if item.caption %} <h2>{{ item.caption}}</h2> {% endif %}*/
/*                     {{ item.description}}              */
/*                 </div>*/
/*             </div>*/
/*         {% endfor %}*/
/*         </div>*/
/* */
/*     <script type="text/javascript">*/
/*       var total_item = {{ count_item }} ;*/
/*       $(".sohomeslider-inner-{{ module}}").owlCarousel2({*/
/* 		  rtl: {{ direction}},*/
/*           animateOut: '{{ animateOut}}',*/
/*           animateIn: '{{ animateIn}}',*/
/*           autoplay: {{ autoplay}},*/
/*           autoplayTimeout: {{ autoplayTimeout}},*/
/*           autoplaySpeed:  {{ autoplaySpeed}},*/
/*           smartSpeed: 500,*/
/*           autoplayHoverPause: {{ autoplayHoverPause}},*/
/*           startPosition: {{ startPosition}},*/
/*           mouseDrag:  {{ mouseDrag}},*/
/*           touchDrag: {{ touchDrag}},*/
/*           dots: {{ dots}},*/
/*           autoWidth: false,*/
/*           dotClass: "owl2-dot",*/
/*           dotsClass: "owl2-dots",*/
/*           loop: {{ loop}},*/
/*           navText: ["Next", "Prev"],*/
/*           navClass: ["owl2-prev", "owl2-next"],*/
/* */
/*           responsive: {*/
/*           0:{ items: {{ nb_column4}},*/
/*             nav: total_item <= {{ nb_column4 }} ? false : (({{ nav  }} ) ? true: false),*/
/*           },*/
/*           480:{ items: {{ nb_column3 }},*/
/*             nav: total_item <= {{ nb_column3 }} ? false : (({{ nav  }} ) ? true: false),*/
/*           },*/
/*           768:{ items: {{ nb_column2 }},*/
/*             nav: total_item <= {{ nb_column2 }} ? false : (({{ nav  }} ) ? true: false),*/
/*           },*/
/*           992:{ items: {{ nb_column1 }},*/
/*             nav: total_item <= {{ nb_column1 }} ? false : (({{ nav  }} ) ? true: false),*/
/*           },*/
/*           1200:{ items: {{ nb_column0 }},*/
/*             nav: total_item <= {{ nb_column0 }} ? false : (({{ nav  }} ) ? true: false),*/
/*           }*/
/*         },*/
/*       });*/
/*     </script>*/
/*     </div>*/
/*     {% else %}  */
/*         {{ objlang.get('text_noitem') }}*/
/*     {% endif %}*/
/* </div> <!--/.modcontent-->*/
/* */
/* {% if post_text|trim is not empty %}*/
/*   <div class="form-group">*/
/*     {{ post_text }}*/
/*   </div>*/
/* {% endif %}*/
/* */
/* */
/* </div> */
/* */
