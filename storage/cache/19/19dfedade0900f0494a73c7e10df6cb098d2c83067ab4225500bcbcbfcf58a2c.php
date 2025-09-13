<?php

/* so-revo/template/extension/module/so_page_builder/default.twig */
class __TwigTemplate_e3dee62a23ab42c05c4185789c04c209c8220ea2bd690e86b1433520351d9811 extends Twig_Template
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
        echo "<div class=\"so-page-builder\">
\t";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["font_ends"]) ? $context["font_ends"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 3
            echo "\t\t";
            if ($this->getAttribute($context["row"], "row_section", array())) {
                // line 4
                echo "\t\t\t<section id=\"";
                echo $this->getAttribute($context["row"], "row_section_id", array());
                echo "\" class=\"";
                echo $this->getAttribute($context["row"], "row_section_class", array());
                echo " ";
                if (($this->getAttribute($context["row"], "section_background_type", array()) == 1)) {
                    echo " ";
                    echo "section-color";
                    echo " ";
                } elseif (($this->getAttribute($context["row"], "section_background_type", array()) == 1)) {
                    echo " ";
                    echo "section-image";
                    echo " ";
                } elseif (($this->getAttribute($context["row"], "section_background_type", array()) == 3)) {
                    echo " ";
                    echo "section-video";
                    echo " ";
                }
                echo "\">
\t\t\t\t";
                // line 5
                if (($this->getAttribute($context["row"], "section_background_type", array()) == 3)) {
                    // line 6
                    echo "\t\t\t\t\t<div class=\"bg-content\">
\t\t\t\t";
                }
                // line 8
                echo "\t\t\t";
            }
            // line 9
            echo "\t\t\t<div class=\"";
            echo ((($this->getAttribute($context["row"], "row_container_fluid", array()) == 1)) ? ("container-fluid") : ("container"));
            echo " page-builder-";
            echo (isset($context["direction"]) ? $context["direction"] : null);
            echo "\">
\t\t\t\t<div class=\"row ";
            // line 10
            echo $this->getAttribute($context["row"], "text_class_id", array());
            echo " ";
            echo ((($this->getAttribute($context["row"], "text_class", array()) != "")) ? ((" " . $this->getAttribute($context["row"], "text_class", array()))) : (""));
            echo " ";
            if (($this->getAttribute($context["row"], "background_type", array()) == 1)) {
                echo " ";
                echo "row-color";
                echo " ";
            } elseif (($this->getAttribute($context["row"], "background_type", array()) == 2)) {
                echo " ";
                echo "row-image";
                echo " ";
            } elseif (($this->getAttribute($context["row"], "background_type", array()) == 3)) {
                echo " ";
                echo "row-video";
                echo " ";
            }
            echo "\">
\t\t\t\t\t";
            // line 11
            if (($this->getAttribute($context["row"], "background_type", array()) == 3)) {
                echo "\t\t\t
\t\t\t\t\t\t";
                // line 12
                if (($this->getAttribute($context["row"], "video_type", array()) == 0)) {
                    // line 13
                    echo "\t\t\t\t\t\t\t<div class=\"bg-video\" id=\"";
                    echo (isset($context["id_row_video"]) ? $context["id_row_video"] : null);
                    echo "\" data-id=\"";
                    echo (isset($context["id_row_video"]) ? $context["id_row_video"] : null);
                    echo "\" data-loop=\"true\" data-muted=\"true\" data-autoplay=\"true\" data-ratio=\"1.77\" data-overlay=\"\" data-swfpath=\"\"  data-youtube=\"";
                    echo $this->getAttribute($context["row"], "link_video", array());
                    echo "\"></div>
\t\t\t\t\t\t";
                } else {
                    // line 15
                    echo "\t\t\t\t\t\t\t<div class=\"bg-video\" id=\"";
                    echo (isset($context["id_row_video"]) ? $context["id_row_video"] : null);
                    echo "\" data-id=\"";
                    echo (isset($context["id_row_video"]) ? $context["id_row_video"] : null);
                    echo "\" data-loop=\"true\" data-muted=\"true\" data-autoplay=\"true\" data-ratio=\"1.77\" data-overlay=\"\" data-swfpath=\"\"  data-webm=\"";
                    echo $this->getAttribute($context["row"], "link_video", array());
                    echo "\">
\t\t\t\t\t\t\t\t<div style=\"z-index: 0; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: hidden;\">
\t\t\t\t\t\t\t\t\t<video autoplay=\"\" style=\"width:100%;height:100%;\" loop=\"\" onended=\"this.play()\"><source src=\"";
                    // line 17
                    echo $this->getAttribute($context["row"], "link_video", array());
                    echo "\" type=\"video/webm\"></video>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 21
                echo "\t\t\t\t\t";
            }
            // line 22
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["row"], "cols", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
                // line 23
                echo "\t\t\t\t\t\t<div class=\"col-lg-";
                echo $this->getAttribute($context["col"], "lg_col", array());
                echo " col-md-";
                echo $this->getAttribute($context["col"], "md_col", array());
                echo " col-sm-";
                echo $this->getAttribute($context["col"], "sm_col", array());
                echo " col-xs-";
                echo $this->getAttribute($context["col"], "xs_col", array());
                echo " ";
                echo $this->getAttribute($context["col"], "text_class_id", array());
                echo " ";
                echo ((($this->getAttribute($context["col"], "text_class", array()) != "")) ? ((" " . $this->getAttribute($context["col"], "text_class", array()))) : (""));
                echo "\">
\t\t\t\t\t\t\t";
                // line 24
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["col"], "widgets", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["widget"]) {
                    // line 25
                    echo "\t\t\t\t\t\t\t\t";
                    if ($this->getAttribute($context["widget"], "content", array())) {
                        // line 26
                        echo "\t\t\t\t\t\t\t\t\t";
                        echo $this->getAttribute($context["widget"], "content", array());
                        echo "
\t\t\t\t\t\t\t\t";
                    }
                    // line 28
                    echo "\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['widget'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 29
                echo "\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["col"], "rows", array()) && $this->getAttribute($context["col"], "rows", array()))) {
                    // line 30
                    echo "\t\t\t\t\t\t\t\t";
                    $context["rows_child"] = $this->getAttribute($context["col"], "rows", array());
                    // line 31
                    echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                    // line 32
                    $this->loadTemplate(((isset($context["DIR_TEMPLATE"]) ? $context["DIR_TEMPLATE"] : null) . "default/template/extension/module/so_page_builder/default_row.twig"), "so-revo/template/extension/module/so_page_builder/default.twig", 32)->display($context);
                    // line 33
                    echo "\t\t\t\t\t\t\t";
                }
                // line 34
                echo "
\t\t\t\t\t\t\t";
                // line 35
                if (($this->getAttribute($context["col"], "background_type", array()) == 3)) {
                    // line 36
                    echo "\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["col"], "col_video_type", array()) == 0)) {
                        // line 37
                        echo "\t\t\t\t\t\t\t\t\t<div class=\"bg-video\" id=\"";
                        echo (isset($context["id_col_video"]) ? $context["id_col_video"] : null);
                        echo "\" data-id=\"";
                        echo (isset($context["id_col_video"]) ? $context["id_col_video"] : null);
                        echo "\" data-loop=\"true\" data-muted=\"true\" data-autoplay=\"true\" data-ratio=\"1.77\" data-overlay=\"\" data-swfpath=\"\"  data-youtube=\"";
                        echo $this->getAttribute($context["col"], "col_link_video", array());
                        echo "\"></div>
\t\t\t\t\t\t\t\t";
                    } else {
                        // line 39
                        echo "\t\t\t\t\t\t\t\t\t<div class=\"bg-video\" id=\"";
                        echo (isset($context["id_col_video"]) ? $context["id_col_video"] : null);
                        echo "\" data-id=\"";
                        echo (isset($context["id_col_video"]) ? $context["id_col_video"] : null);
                        echo "\" data-loop=\"true\" data-muted=\"true\" data-autoplay=\"true\" data-ratio=\"1.77\" data-overlay=\"\" data-swfpath=\"\"  data-webm=\"";
                        echo $this->getAttribute($context["col"], "col_link_video", array());
                        echo "\">
\t\t\t\t\t\t\t\t\t\t<div style=\"z-index: 0; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: hidden;\">
\t\t\t\t\t\t\t\t\t\t\t<video autoplay=\"\" style=\"width:100%;height:100%;\" loop=\"\" onended=\"this.play()\"><source src=\"";
                        // line 41
                        echo $this->getAttribute($context["col"], "col_link_video", array());
                        echo "\" type=\"video/webm\"></video>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    }
                    // line 45
                    echo "\t\t\t\t\t\t\t";
                }
                // line 46
                echo "\t\t\t\t\t\t</div>\t\t\t
\t\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "\t\t
\t\t\t\t</div>
\t\t\t</div>

\t\t\t";
            // line 51
            if ($this->getAttribute($context["row"], "row_section", array())) {
                // line 52
                echo "\t\t\t\t";
                if (($this->getAttribute($context["row"], "section_background_type", array()) == 3)) {
                    // line 53
                    echo "\t\t\t\t</div>
\t\t\t\t<div class=\"bg-overlay\"></div>
\t\t\t\t";
                    // line 55
                    if (($this->getAttribute($context["row"], "section_video_type", array()) == 0)) {
                        // line 56
                        echo "\t\t\t\t\t<div class=\"bg-video\" id=\"";
                        echo (isset($context["id_sec_video"]) ? $context["id_sec_video"] : null);
                        echo "\" data-id=\"";
                        echo (isset($context["id_sec_video"]) ? $context["id_sec_video"] : null);
                        echo "\" data-loop=\"true\" data-muted=\"true\" data-autoplay=\"true\" data-ratio=\"1.77\" data-overlay=\"\" data-swfpath=\"\"  data-youtube=\"";
                        echo $this->getAttribute($context["row"], "section_link_video", array());
                        echo "\"></div>
\t\t\t\t";
                    } else {
                        // line 58
                        echo "\t\t\t\t\t<div class=\"bg-video\" id=\"";
                        echo (isset($context["id_sec_video"]) ? $context["id_sec_video"] : null);
                        echo "\" data-id=\"";
                        echo (isset($context["id_sec_video"]) ? $context["id_sec_video"] : null);
                        echo "\" data-loop=\"true\" data-muted=\"true\" data-autoplay=\"true\" data-ratio=\"1.77\" data-overlay=\"\" data-swfpath=\"\"  data-webm=\"";
                        echo $this->getAttribute($context["row"], "section_link_video", array());
                        echo "\">
\t\t\t\t\t\t<div style=\"z-index: 0; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: hidden;\">
\t\t\t\t\t\t\t<video autoplay=\"\" style=\"width:100%;height:100%;\" loop=\"\" onended=\"this.play()\"><source src=\"";
                        // line 60
                        echo $this->getAttribute($context["row"], "section_link_video", array());
                        echo "\" type=\"video/webm\"></video>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
                    }
                    // line 64
                    echo "\t\t\t";
                }
                // line 65
                echo "\t\t</section>
\t\t";
            }
            // line 67
            echo "\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/module/so_page_builder/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  319 => 68,  305 => 67,  301 => 65,  298 => 64,  291 => 60,  281 => 58,  271 => 56,  269 => 55,  265 => 53,  262 => 52,  260 => 51,  254 => 47,  239 => 46,  236 => 45,  229 => 41,  219 => 39,  209 => 37,  206 => 36,  204 => 35,  201 => 34,  198 => 33,  196 => 32,  193 => 31,  190 => 30,  187 => 29,  181 => 28,  175 => 26,  172 => 25,  168 => 24,  153 => 23,  135 => 22,  132 => 21,  125 => 17,  115 => 15,  105 => 13,  103 => 12,  99 => 11,  79 => 10,  72 => 9,  69 => 8,  65 => 6,  63 => 5,  42 => 4,  39 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div class="so-page-builder">*/
/* 	{% for row in font_ends %}*/
/* 		{% if row.row_section %}*/
/* 			<section id="{{ row.row_section_id }}" class="{{ row.row_section_class }} {% if row.section_background_type == 1 %} {{ "section-color" }} {% elseif row.section_background_type == 1 %} {{ "section-image" }} {% elseif row.section_background_type == 3 %} {{ "section-video" }} {% endif %}">*/
/* 				{% if row.section_background_type == 3 %}*/
/* 					<div class="bg-content">*/
/* 				{% endif %}*/
/* 			{% endif %}*/
/* 			<div class="{{ row.row_container_fluid == 1 ? "container-fluid" : "container" }} page-builder-{{ direction }}">*/
/* 				<div class="row {{ row.text_class_id }} {{ row.text_class != '' ? ' '~row.text_class : '' }} {% if row.background_type == 1 %} {{ "row-color" }} {% elseif row.background_type == 2 %} {{ "row-image" }} {% elseif row.background_type == 3 %} {{ "row-video" }} {% endif %}">*/
/* 					{% if row.background_type == 3 %}			*/
/* 						{% if row.video_type == 0 %}*/
/* 							<div class="bg-video" id="{{ id_row_video }}" data-id="{{ id_row_video }}" data-loop="true" data-muted="true" data-autoplay="true" data-ratio="1.77" data-overlay="" data-swfpath=""  data-youtube="{{ row.link_video }}"></div>*/
/* 						{% else %}*/
/* 							<div class="bg-video" id="{{ id_row_video }}" data-id="{{ id_row_video }}" data-loop="true" data-muted="true" data-autoplay="true" data-ratio="1.77" data-overlay="" data-swfpath=""  data-webm="{{ row.link_video }}">*/
/* 								<div style="z-index: 0; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: hidden;">*/
/* 									<video autoplay="" style="width:100%;height:100%;" loop="" onended="this.play()"><source src="{{ row.link_video }}" type="video/webm"></video>*/
/* 								</div>*/
/* 							</div>*/
/* 						{% endif %}*/
/* 					{% endif %}*/
/* 					{% for col in row.cols %}*/
/* 						<div class="col-lg-{{ col.lg_col }} col-md-{{ col.md_col }} col-sm-{{ col.sm_col }} col-xs-{{ col.xs_col }} {{ col.text_class_id }} {{ col.text_class != '' ? ' '~col.text_class : '' }}">*/
/* 							{% for widget in col.widgets %}*/
/* 								{% if widget.content %}*/
/* 									{{ widget.content }}*/
/* 								{% endif %}*/
/* 							{% endfor %}*/
/* 							{% if col.rows and col.rows %}*/
/* 								{% set rows_child = col.rows %}*/
/* 								*/
/* 								{% include DIR_TEMPLATE~'default/template/extension/module/so_page_builder/default_row.twig' %}*/
/* 							{% endif %}*/
/* */
/* 							{% if col.background_type == 3 %}*/
/* 								{% if col.col_video_type == 0 %}*/
/* 									<div class="bg-video" id="{{ id_col_video }}" data-id="{{ id_col_video }}" data-loop="true" data-muted="true" data-autoplay="true" data-ratio="1.77" data-overlay="" data-swfpath=""  data-youtube="{{ col.col_link_video }}"></div>*/
/* 								{% else %}*/
/* 									<div class="bg-video" id="{{ id_col_video }}" data-id="{{ id_col_video }}" data-loop="true" data-muted="true" data-autoplay="true" data-ratio="1.77" data-overlay="" data-swfpath=""  data-webm="{{ col.col_link_video }}">*/
/* 										<div style="z-index: 0; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: hidden;">*/
/* 											<video autoplay="" style="width:100%;height:100%;" loop="" onended="this.play()"><source src="{{ col.col_link_video }}" type="video/webm"></video>*/
/* 										</div>*/
/* 									</div>*/
/* 								{% endif %}*/
/* 							{% endif %}*/
/* 						</div>			*/
/* 					{% endfor %}		*/
/* 				</div>*/
/* 			</div>*/
/* */
/* 			{% if row.row_section %}*/
/* 				{% if row.section_background_type == 3 %}*/
/* 				</div>*/
/* 				<div class="bg-overlay"></div>*/
/* 				{% if row.section_video_type == 0 %}*/
/* 					<div class="bg-video" id="{{ id_sec_video }}" data-id="{{ id_sec_video }}" data-loop="true" data-muted="true" data-autoplay="true" data-ratio="1.77" data-overlay="" data-swfpath=""  data-youtube="{{ row.section_link_video }}"></div>*/
/* 				{% else %}*/
/* 					<div class="bg-video" id="{{ id_sec_video }}" data-id="{{ id_sec_video }}" data-loop="true" data-muted="true" data-autoplay="true" data-ratio="1.77" data-overlay="" data-swfpath=""  data-webm="{{ row.section_link_video }}">*/
/* 						<div style="z-index: 0; position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: hidden;">*/
/* 							<video autoplay="" style="width:100%;height:100%;" loop="" onended="this.play()"><source src="{{ row.section_link_video }}" type="video/webm"></video>*/
/* 						</div>*/
/* 					</div>*/
/* 				{% endif %}*/
/* 			{% endif %}*/
/* 		</section>*/
/* 		{% endif %}*/
/* 	{% endfor %}*/
/* </div>*/
