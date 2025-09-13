<?php

/* so-revo/template/extension/module/category.twig */
class __TwigTemplate_ebf3308bd3f4b352af04a7c27179fcdc9d52b8292f2342628a280ea0f6c096e6 extends Twig_Template
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
<div class=\"module category-style kai-category-module\">
    ";
        // line 3
        if ((isset($context["categories"]) ? $context["categories"] : null)) {
            // line 4
            echo "        <h3 class=\"modtitle\"><span>";
            echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
            echo " </span></h3>
    ";
        }
        // line 6
        echo "  <div class=\"mod-content box-category\">
    <ul class=\"accordion\" id=\"accordion-category\">
      ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["i"] => $context["category"]) {
            echo " 
\t\t<li class=\"panel\">
\t\t\t";
            // line 10
            if (($this->getAttribute($context["category"], "category_id", array()) == (isset($context["category_id"]) ? $context["category_id"] : null))) {
                echo " 
\t\t\t\t<a href=\"";
                // line 11
                echo $this->getAttribute($context["category"], "href", array());
                echo " \" class=\"active\">";
                echo $this->getAttribute($context["category"], "name", array());
                echo " </a>
\t\t\t";
            } else {
                // line 12
                echo "   
\t\t\t\t<a href=\"";
                // line 13
                echo $this->getAttribute($context["category"], "href", array());
                echo " \">";
                echo $this->getAttribute($context["category"], "name", array());
                echo " </a>
\t\t\t";
            }
            // line 14
            echo " 
\t\t\t\t\t\t
\t\t\t";
            // line 16
            if ($this->getAttribute($context["category"], "children", array())) {
                echo " 
\t\t\t\t<span class=\"head\"><a  class=\"pull-right accordion-toggle";
                // line 17
                if (($this->getAttribute($context["category"], "category_id", array()) == (isset($context["category_id"]) ? $context["category_id"] : null))) {
                    echo " ";
                    echo " collapsed";
                    echo " ";
                }
                echo " \" data-toggle=\"collapse\" data-parent=\"#accordion-category\" href=\"#category";
                echo $context["i"];
                echo " \"></a></span>
\t\t\t\t<div id=\"category";
                // line 18
                echo $context["i"];
                echo "\" class=\"panel-collapse collapse ";
                if (($this->getAttribute($context["category"], "category_id", array()) == (isset($context["category_id"]) ? $context["category_id"] : null))) {
                    echo " ";
                    echo "in";
                    echo " ";
                }
                echo " \" style=\"clear:both\">
\t\t\t\t\t<ul>
\t\t\t\t\t   ";
                // line 20
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["category"], "children", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    echo " 
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t";
                    // line 22
                    if (($this->getAttribute($context["child"], "category_id", array()) == (isset($context["child_id"]) ? $context["child_id"] : null))) {
                        echo " 
\t\t\t\t\t\t\t\t<a href=\"";
                        // line 23
                        echo $this->getAttribute($context["child"], "href", array());
                        echo " \" class=\"active\">";
                        echo $this->getAttribute($context["child"], "name", array());
                        echo " </a>
\t\t\t\t\t\t\t";
                    } else {
                        // line 24
                        echo "   
\t\t\t\t\t\t\t\t<a href=\"";
                        // line 25
                        echo $this->getAttribute($context["child"], "href", array());
                        echo " \">";
                        echo $this->getAttribute($context["child"], "name", array());
                        echo " </a>
\t\t\t\t\t\t\t";
                    }
                    // line 26
                    echo " 
\t\t\t\t\t\t</li>
\t\t\t\t\t   ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 29
                echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t";
            }
            // line 32
            echo " 
\t\t</li>
       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "    </ul>
  </div>
</div>
<script>
    \$(\".kai-category-module h3\").on('click', function(e){
        let categories = \$(this).parents('.kai-category-module').find('.box-category');
        if( categories.hasClass('kai-hidden-filter-category-item') ){
            categories.removeClass('kai-hidden-filter-category-item').css({
                borderStyle:'solid',
                borderWidth: '1px',
                borderColor: '#ccc',
                borderLeft: 'none',
                borderRight: 'none',
                borderBottom: 'none'
            })
            \$(this).find('span').css({
                borderStyle:'solid',
                borderWidth: '3px',
                borderColor: ' #E30025',
                borderLeft: 'none',
                borderTop: 'none',
                borderRight: 'none',
                position: \"relative\",
                top: '1px'
            })
        
        } else {
            categories.addClass('kai-hidden-filter-category-item').css('border-top', 'none')
            \$(this).find('span').css('border-bottom', 'none')
        }
    })
</script>
";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/module/category.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 35,  134 => 32,  128 => 29,  120 => 26,  113 => 25,  110 => 24,  103 => 23,  99 => 22,  92 => 20,  81 => 18,  71 => 17,  67 => 16,  63 => 14,  56 => 13,  53 => 12,  46 => 11,  42 => 10,  35 => 8,  31 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
/* */
/* <div class="module category-style kai-category-module">*/
/*     {% if categories %}*/
/*         <h3 class="modtitle"><span>{{ heading_title }} </span></h3>*/
/*     {% endif %}*/
/*   <div class="mod-content box-category">*/
/*     <ul class="accordion" id="accordion-category">*/
/*       {% for i,category in categories %} */
/* 		<li class="panel">*/
/* 			{% if category.category_id == category_id %} */
/* 				<a href="{{ category.href }} " class="active">{{ category.name }} </a>*/
/* 			{% else %}   */
/* 				<a href="{{ category.href }} ">{{ category.name }} </a>*/
/* 			{% endif %} */
/* 						*/
/* 			{% if category.children %} */
/* 				<span class="head"><a  class="pull-right accordion-toggle{% if category.category_id  ==  category_id %} {{ ' collapsed' }} {% endif %} " data-toggle="collapse" data-parent="#accordion-category" href="#category{{ i }} "></a></span>*/
/* 				<div id="category{{ i }}" class="panel-collapse collapse {% if category.category_id  == category_id %} {{ 'in' }} {% endif %} " style="clear:both">*/
/* 					<ul>*/
/* 					   {% for child in category.children %} */
/* 						<li>*/
/* 							{% if child.category_id  ==  child_id %} */
/* 								<a href="{{ child.href }} " class="active">{{ child.name }} </a>*/
/* 							{% else %}   */
/* 								<a href="{{ child.href }} ">{{ child.name }} </a>*/
/* 							{% endif %} */
/* 						</li>*/
/* 					   {% endfor %}*/
/* 					</ul>*/
/* 				</div>*/
/* 				*/
/* 			{% endif %} */
/* 		</li>*/
/*        {% endfor %}*/
/*     </ul>*/
/*   </div>*/
/* </div>*/
/* <script>*/
/*     $(".kai-category-module h3").on('click', function(e){*/
/*         let categories = $(this).parents('.kai-category-module').find('.box-category');*/
/*         if( categories.hasClass('kai-hidden-filter-category-item') ){*/
/*             categories.removeClass('kai-hidden-filter-category-item').css({*/
/*                 borderStyle:'solid',*/
/*                 borderWidth: '1px',*/
/*                 borderColor: '#ccc',*/
/*                 borderLeft: 'none',*/
/*                 borderRight: 'none',*/
/*                 borderBottom: 'none'*/
/*             })*/
/*             $(this).find('span').css({*/
/*                 borderStyle:'solid',*/
/*                 borderWidth: '3px',*/
/*                 borderColor: ' #E30025',*/
/*                 borderLeft: 'none',*/
/*                 borderTop: 'none',*/
/*                 borderRight: 'none',*/
/*                 position: "relative",*/
/*                 top: '1px'*/
/*             })*/
/*         */
/*         } else {*/
/*             categories.addClass('kai-hidden-filter-category-item').css('border-top', 'none')*/
/*             $(this).find('span').css('border-bottom', 'none')*/
/*         }*/
/*     })*/
/* </script>*/
/* */
