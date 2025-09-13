<?php

/* so-revo/template/information/contact.twig */
class __TwigTemplate_1d61b6ad0d4534b7b09c6674ac4333a4a744aaf19a5950f66cf4563b34cba8ad extends Twig_Template
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
<div class=\"container\">
  <ul class=\"breadcrumb\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 5
            echo "    <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "  </ul>
  
  <div class=\"row\">";
        // line 9
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
    ";
        // line 10
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 11
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 12
            echo "    ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 13
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 14
            echo "    ";
        } else {
            // line 15
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 16
            echo "    ";
        }
        // line 17
        echo "    <div id=\"content\" class=\"";
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
\t\t<div class=\"info-contact row\">
\t\t\t<div class=\"col-sm-6 col-xs-12 info-store\">
\t\t\t  ";
        // line 20
        if ((isset($context["image"]) ? $context["image"] : null)) {
            echo " 
\t\t\t\t<div id=\"map-canvas\"><img src=\"";
            // line 21
            echo (isset($context["image"]) ? $context["image"] : null);
            echo " \" alt=\"";
            echo (isset($context["store"]) ? $context["store"] : null);
            echo " \" title=\"";
            echo (isset($context["store"]) ? $context["store"] : null);
            echo " \" /></div>
\t\t\t  ";
        }
        // line 22
        echo " 
\t\t\t\t<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyBf-EZpcLV72omKDDxOlhG6-i8Ga8NenRo\"></script>
\t\t\t\t";
        // line 24
        if ((isset($context["geocode"]) ? $context["geocode"] : null)) {
            echo " 
\t\t\t\t  <script>
\t\t\t\t\tfunction initialize() {
\t\t\t\t\t  var myLatlng = new google.maps.LatLng(";
            // line 27
            echo (isset($context["geocode"]) ? $context["geocode"] : null);
            echo ");
\t\t\t\t\t  var mapOptions = {
\t\t\t\t\t\tzoom: 16,
\t\t\t\t\t\tzoomControl: false,
\t\t\t\t\t\tscaleControl: false,
\t\t\t\t\t\tscrollwheel: false,
\t\t\t\t\t\tdisableDoubleClickZoom: true,
\t\t\t\t\t\tcenter: myLatlng
\t\t\t\t\t  }
\t\t\t\t\t  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
\t\t\t\t\t  var marker = new google.maps.Marker({
\t\t\t\t\t\t  position: myLatlng,
\t\t\t\t\t\t  map: map,
\t\t\t\t\t\t  title: 'Furnicom!'
\t\t\t\t\t  });
\t\t\t\t\t} 
\t\t\t\t\tgoogle.maps.event.addDomListener(window, 'load', initialize);  
\t\t\t\t  </script>
\t\t\t\t  ";
            // line 46
            echo "\t\t\t\t";
        }
        echo "   
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"col-sm-6 col-xs-12 contact-form\">
\t\t\t    
\t\t\t    <p>
\t\t\t        <span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">
\t\t\t        <span style=\"font-family:&quot;Helvetica BQ&quot;\">Kaielectric.com</span></span>
\t\t        </p>

                <p> 
\t\t\t        <span style=\"font-size:12.0pt;font-family:Calibri,sans-serif\">онлайн магазин за осветление електрооборудване и електроапаратура продукти за дома .</span>
\t\t        </p>

                <p>
                    <span style=\"font-size:12.0pt;font-family:Calibri,sans-serif\">E-mail на онлайн магазина :</span>
                </p>
                <p>
                    <a href=\"mailto:office@kaielectric.com\" style=\"color:#0563c1; text-decoration:underline\">
                        <span style=\"font-size:12.0pt;font-family:&quot;Helvetica BQ&quot;\">office@kaielectric.com</span>
                    </a>
                </p>
                <p>
                    <span style=\"font-size:12.0pt;font-family:Calibri,sans-serif\">Телефон на онлайн магазина :</span>
                </p>
                <p>
                    <span style=\"font-size:12.0pt;font-family:&quot;Helvetica BQ&quot;\">(+359) 896 80 56 56</span>
                </p>
                
                <p>
                    <span style=\"font-size:12.0pt; font-family:Calibri,sans-serif\">Работно време на онлайн магазин : </span>
                </p>
                <p>
                    <span style=\"font-size:12.0pt; font-family:Calibri,sans-serif\">Всеки делничен ден от 9.00ч до 17.00 часа</span>
                </p>
                
                <p><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Национални</span> <span style=\"font-size:12.0pt\">празници</span> <span style=\"font-size:12.0pt\">и</span> <span style=\"font-size:12.0pt\">официални</span> <span style=\"font-size:12.0pt\">почивни</span> <span style=\"font-size:12.0pt\">дни</span> <span style=\"font-size:12.0pt\">са</span> <span style=\"font-size:12.0pt\">неработни</span> <span style=\"font-size:12.0pt\">за</span> <span style=\"font-size:12.0pt\">магазина</span><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Helvetica BQ&quot;\">.</span></span></span></span></p>

\t\t\t    <hr/>
\t\t\t    <br/>
\t\t\t   <form action=\"";
        // line 86
        echo (isset($context["action"]) ? $context["action"] : null);
        echo " \" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
\t\t\t\t<fieldset>
\t\t\t\t\t<legend><h2>";
        // line 88
        echo (isset($context["text_contact"]) ? $context["text_contact"] : null);
        echo " </h2></legend>
\t\t\t\t\t <p>";
        // line 89
        echo (isset($context["comment"]) ? $context["comment"] : null);
        echo "</p>
                  
\t\t\t\t  <div class=\"form-group required\">
\t\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t\t  <input type=\"text\" name=\"name\" value=\"";
        // line 93
        echo (isset($context["name"]) ? $context["name"] : null);
        echo "\" id=\"input-name\" class=\"form-control\" placeholder=\"";
        echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
        echo " *\"/>
\t\t\t\t\t  ";
        // line 94
        if ((isset($context["error_name"]) ? $context["error_name"] : null)) {
            echo " 
\t\t\t\t\t  <div class=\"text-danger\">";
            // line 95
            echo (isset($context["error_name"]) ? $context["error_name"] : null);
            echo " </div>
\t\t\t\t\t  ";
        }
        // line 96
        echo " 
\t\t\t\t\t</div>
\t\t\t\t  </div>
\t\t\t\t  <div class=\"form-group required\">
\t\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t\t  <input type=\"text\" name=\"email\" value=\"";
        // line 101
        echo (isset($context["email"]) ? $context["email"] : null);
        echo "\" id=\"input-email\" class=\"form-control\" placeholder=\"";
        echo (isset($context["entry_email"]) ? $context["entry_email"] : null);
        echo " *\" />
\t\t\t\t\t  ";
        // line 102
        if ((isset($context["error_email"]) ? $context["error_email"] : null)) {
            echo " 
\t\t\t\t\t  <div class=\"text-danger\">";
            // line 103
            echo (isset($context["error_email"]) ? $context["error_email"] : null);
            echo " </div>
\t\t\t\t\t  ";
        }
        // line 104
        echo " 
\t\t\t\t\t</div>
\t\t\t\t  </div>
\t\t\t\t  <div class=\"form-group required\">
\t\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t\t  <textarea name=\"enquiry\" rows=\"10\" id=\"input-enquiry\" placeholder=\"";
        // line 109
        echo (isset($context["entry_enquiry"]) ? $context["entry_enquiry"] : null);
        echo " *\" class=\"form-control\">";
        echo (isset($context["enquiry"]) ? $context["enquiry"] : null);
        echo "</textarea>
\t\t\t\t\t  ";
        // line 110
        if ((isset($context["error_enquiry"]) ? $context["error_enquiry"] : null)) {
            echo " 
\t\t\t\t\t  <div class=\"text-danger\">";
            // line 111
            echo (isset($context["error_enquiry"]) ? $context["error_enquiry"] : null);
            echo " </div>
\t\t\t\t\t  ";
        }
        // line 112
        echo " 
\t\t\t\t\t</div>
\t\t\t\t  </div>
\t\t\t\t  ";
        // line 115
        echo (isset($context["captcha"]) ? $context["captcha"] : null);
        echo " 
\t\t\t\t</fieldset>
\t\t\t\t<div class=\"buttons\">
\t\t\t\t  <div class=\"pull-left\">
\t\t\t\t\t<button class=\"btn btn-info\" type=\"submit\"><span>";
        // line 119
        echo (isset($context["button_submit"]) ? $context["button_submit"] : null);
        echo " </span></button>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t  </form>
\t\t\t</div>
\t\t</div>
\t\t
\t\t
      
\t  
      
      
      ";
        // line 131
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "</div>
    ";
        // line 132
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "</div>
</div>
";
        // line 134
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "so-revo/template/information/contact.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  276 => 134,  271 => 132,  267 => 131,  252 => 119,  245 => 115,  240 => 112,  235 => 111,  231 => 110,  225 => 109,  218 => 104,  213 => 103,  209 => 102,  203 => 101,  196 => 96,  191 => 95,  187 => 94,  181 => 93,  174 => 89,  170 => 88,  165 => 86,  121 => 46,  100 => 27,  94 => 24,  90 => 22,  81 => 21,  77 => 20,  68 => 17,  65 => 16,  62 => 15,  59 => 14,  56 => 13,  53 => 12,  50 => 11,  48 => 10,  44 => 9,  40 => 7,  29 => 5,  25 => 4,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div class="container">*/
/*   <ul class="breadcrumb">*/
/*     {% for breadcrumb in breadcrumbs %}*/
/*     <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*     {% endfor %}*/
/*   </ul>*/
/*   */
/*   <div class="row">{{ column_left }}*/
/*     {% if column_left and column_right %}*/
/*     {% set class = 'col-sm-6' %}*/
/*     {% elseif column_left or column_right %}*/
/*     {% set class = 'col-sm-9' %}*/
/*     {% else %}*/
/*     {% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/*     <div id="content" class="{{ class }}">{{ content_top }}*/
/* 		<div class="info-contact row">*/
/* 			<div class="col-sm-6 col-xs-12 info-store">*/
/* 			  {% if image %} */
/* 				<div id="map-canvas"><img src="{{ image }} " alt="{{ store }} " title="{{ store }} " /></div>*/
/* 			  {% endif %} */
/* 				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf-EZpcLV72omKDDxOlhG6-i8Ga8NenRo"></script>*/
/* 				{% if geocode %} */
/* 				  <script>*/
/* 					function initialize() {*/
/* 					  var myLatlng = new google.maps.LatLng({{ geocode }});*/
/* 					  var mapOptions = {*/
/* 						zoom: 16,*/
/* 						zoomControl: false,*/
/* 						scaleControl: false,*/
/* 						scrollwheel: false,*/
/* 						disableDoubleClickZoom: true,*/
/* 						center: myLatlng*/
/* 					  }*/
/* 					  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);*/
/* 					  var marker = new google.maps.Marker({*/
/* 						  position: myLatlng,*/
/* 						  map: map,*/
/* 						  title: 'Furnicom!'*/
/* 					  });*/
/* 					} */
/* 					google.maps.event.addDomListener(window, 'load', initialize);  */
/* 				  </script>*/
/* 				  {#<div id="map-canvas"></div>#}*/
/* 				{% endif %}   */
/* 			</div>*/
/* 			*/
/* 			<div class="col-sm-6 col-xs-12 contact-form">*/
/* 			    */
/* 			    <p>*/
/* 			        <span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">*/
/* 			        <span style="font-family:&quot;Helvetica BQ&quot;">Kaielectric.com</span></span>*/
/* 		        </p>*/
/* */
/*                 <p> */
/* 			        <span style="font-size:12.0pt;font-family:Calibri,sans-serif">онлайн магазин за осветление електрооборудване и електроапаратура продукти за дома .</span>*/
/* 		        </p>*/
/* */
/*                 <p>*/
/*                     <span style="font-size:12.0pt;font-family:Calibri,sans-serif">E-mail на онлайн магазина :</span>*/
/*                 </p>*/
/*                 <p>*/
/*                     <a href="mailto:office@kaielectric.com" style="color:#0563c1; text-decoration:underline">*/
/*                         <span style="font-size:12.0pt;font-family:&quot;Helvetica BQ&quot;">office@kaielectric.com</span>*/
/*                     </a>*/
/*                 </p>*/
/*                 <p>*/
/*                     <span style="font-size:12.0pt;font-family:Calibri,sans-serif">Телефон на онлайн магазина :</span>*/
/*                 </p>*/
/*                 <p>*/
/*                     <span style="font-size:12.0pt;font-family:&quot;Helvetica BQ&quot;">(+359) 896 80 56 56</span>*/
/*                 </p>*/
/*                 */
/*                 <p>*/
/*                     <span style="font-size:12.0pt; font-family:Calibri,sans-serif">Работно време на онлайн магазин : </span>*/
/*                 </p>*/
/*                 <p>*/
/*                     <span style="font-size:12.0pt; font-family:Calibri,sans-serif">Всеки делничен ден от 9.00ч до 17.00 часа</span>*/
/*                 </p>*/
/*                 */
/*                 <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt">Национални</span> <span style="font-size:12.0pt">празници</span> <span style="font-size:12.0pt">и</span> <span style="font-size:12.0pt">официални</span> <span style="font-size:12.0pt">почивни</span> <span style="font-size:12.0pt">дни</span> <span style="font-size:12.0pt">са</span> <span style="font-size:12.0pt">неработни</span> <span style="font-size:12.0pt">за</span> <span style="font-size:12.0pt">магазина</span><span style="font-size:12.0pt"><span style="font-family:&quot;Helvetica BQ&quot;">.</span></span></span></span></p>*/
/* */
/* 			    <hr/>*/
/* 			    <br/>*/
/* 			   <form action="{{ action }} " method="post" enctype="multipart/form-data" class="form-horizontal">*/
/* 				<fieldset>*/
/* 					<legend><h2>{{ text_contact }} </h2></legend>*/
/* 					 <p>{{ comment }}</p>*/
/*                   */
/* 				  <div class="form-group required">*/
/* 					<div class="col-sm-12">*/
/* 					  <input type="text" name="name" value="{{name}}" id="input-name" class="form-control" placeholder="{{ entry_name }} *"/>*/
/* 					  {% if error_name %} */
/* 					  <div class="text-danger">{{ error_name }} </div>*/
/* 					  {% endif %} */
/* 					</div>*/
/* 				  </div>*/
/* 				  <div class="form-group required">*/
/* 					<div class="col-sm-12">*/
/* 					  <input type="text" name="email" value="{{ email }}" id="input-email" class="form-control" placeholder="{{ entry_email }} *" />*/
/* 					  {% if error_email %} */
/* 					  <div class="text-danger">{{ error_email }} </div>*/
/* 					  {% endif %} */
/* 					</div>*/
/* 				  </div>*/
/* 				  <div class="form-group required">*/
/* 					<div class="col-sm-12">*/
/* 					  <textarea name="enquiry" rows="10" id="input-enquiry" placeholder="{{ entry_enquiry }} *" class="form-control">{{ enquiry }}</textarea>*/
/* 					  {% if error_enquiry %} */
/* 					  <div class="text-danger">{{ error_enquiry }} </div>*/
/* 					  {% endif %} */
/* 					</div>*/
/* 				  </div>*/
/* 				  {{ captcha }} */
/* 				</fieldset>*/
/* 				<div class="buttons">*/
/* 				  <div class="pull-left">*/
/* 					<button class="btn btn-info" type="submit"><span>{{ button_submit }} </span></button>*/
/* 				  </div>*/
/* 				</div>*/
/* 			  </form>*/
/* 			</div>*/
/* 		</div>*/
/* 		*/
/* 		*/
/*       */
/* 	  */
/*       */
/*       */
/*       {{ content_bottom }}</div>*/
/*     {{ column_right }}</div>*/
/* </div>*/
/* {{ footer }}*/
/* */
