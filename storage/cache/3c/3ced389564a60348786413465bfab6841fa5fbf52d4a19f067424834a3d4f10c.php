<?php

/* so-revo/template/header/header10.twig */
class __TwigTemplate_219269a35c650354d7f583e7d28de40b61332671905a361f5a816329e2d058bb extends Twig_Template
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
";
        // line 3
        $context["hidden_headertop"] = (((($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "toppanel_type"), "method") == "1") || ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "toppanel_type"), "method") == "2"))) ? ("hidden-compact") : (""));
        // line 4
        $context["hidden_headercenter"] = ((($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "toppanel_type"), "method") == "2")) ? ("hidden-compact") : (""));
        // line 5
        $context["hidden_headerbottom"] = ((($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "toppanel_type"), "method") == "1")) ? ("hidden-compact") : (""));
        // line 6
        echo "
<header id=\"header\" class=\" variant typeheader-";
        // line 7
        echo (((isset($context["typeheader"]) ? $context["typeheader"] : null)) ? ((isset($context["typeheader"]) ? $context["typeheader"] : null)) : ("1"));
        echo "\">
\t";
        // line 8
        if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "promotion_status"), "method") && $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "promotion"), "method"))) {
            // line 9
            echo "\t<div class=\"header-promotion ";
            echo (isset($context["hidden_headertop"]) ? $context["hidden_headertop"] : null);
            echo "\" >
\t\t";
            // line 10
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "decode_entities", array(0 => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "promotion"), "method")), "method");
            echo "
\t</div>
\t";
        }
        // line 12
        echo " 
\t<!-- HEADER TOP -->
\t<div class=\"header-top ";
        // line 14
        echo (isset($context["hidden_headertop"]) ? $context["hidden_headertop"] : null);
        echo "\">
\t\t<div class=\"header-top-inner\">
\t\t\t<div class=\"row\">
\t\t\t\t
\t\t\t\t<div class=\"header-top-right collapsed-block col-lg-12 col-sm-9 col-md-9 col-xs-12 \">
\t\t\t\t\t<h5 class=\"tabBlockTitle hidden-lg hidden-sm hidden-md visible-xs\">";
        // line 19
        echo (isset($context["text_more"]) ? $context["text_more"] : null);
        echo "<a class=\"expander \" href=\"#TabBlock-1\"><i class=\"fa fa-angle-down\"></i></a></h5>
\t\t\t\t    <div class=\"navbar-logo  col-lg-2 col-sm-3 col-md-3\">";
        // line 20
        echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_logo", array(), "method");
        echo "</div>
\t\t\t\t\t<div  class=\"tabBlock\" id=\"TabBlock-1\">
\t\t\t\t\t\t<ul class=\"top-link list-inline\">
\t\t\t\t\t\t\t";
        // line 23
        if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "welcome_message_status"), "method")) {
            // line 24
            echo "\t\t\t\t\t\t\t<li class=\"message hidden-xs hidden-sm\" >
\t\t\t\t\t\t\t   <a href=\"https://goo.gl/maps/ryCZFaUXiBKaieUZ8\" target=\"_blank\"><i class=\"fa fa-map-marker\"></i></a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        // line 27
        echo " 
\t\t\t\t\t\t\t";
        // line 28
        if (($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "phone_status"), "method") && $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "contact_number"), "method"))) {
            // line 29
            echo "\t\t\t\t\t\t\t<li class=\"phone-header\">\t
\t\t\t\t\t\t\t\t<span class=\"telephone hidden-xs\" >
\t\t\t\t\t\t\t\t\t";
            // line 31
            echo $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "decode_entities", array(0 => $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "contact_number"), "method")), "method");
            echo "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        // line 35
        echo "\t\t\t\t\t\t\t<!-- LANGUAGE CURENTY test-->
\t\t\t\t\t\t\t";
        // line 36
        if ($this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "lang_status"), "method")) {
            // line 37
            echo "\t\t\t\t\t\t\t\t<li class=\"language\">";
            echo (isset($context["language"]) ? $context["language"] : null);
            echo " </li>
\t\t\t\t\t\t\t\t<li class=\"currency\" > ";
            // line 38
            echo (isset($context["currency"]) ? $context["currency"] : null);
            echo "  </li>
\t\t\t\t\t\t\t";
        }
        // line 39
        echo " 
\t\t\t\t\t\t\t";
        // line 40
        if ((isset($context["logged"]) ? $context["logged"] : null)) {
            echo "\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<li class=\"account\" id=\"my_account\">
\t\t\t\t\t\t\t\t<a href=\"";
            // line 43
            echo (isset($context["account"]) ? $context["account"] : null);
            echo "\" title=\"";
            echo (isset($context["text_account"]) ? $context["text_account"] : null);
            echo "\" class=\"btn-xs dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-user\"><p id=\"username-desktop\"> ";
            // line 44
            echo (isset($context["text_logged"]) ? $context["text_logged"] : null);
            echo "</p></i>
\t\t\t\t\t\t\t\t\t<span class=\"my-acc hidden-xs\"></span> <span class=\"fa fa-angle-down\"></span>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu \">
\t\t\t\t\t\t\t\t\t";
            // line 48
            if ((isset($context["logged"]) ? $context["logged"] : null)) {
                // line 49
                echo "\t\t\t\t\t\t\t        <li><strong id=\"username-mobile\">";
                echo (isset($context["text_logged"]) ? $context["text_logged"] : null);
                echo "</strong></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"";
                // line 50
                echo (isset($context["account"]) ? $context["account"] : null);
                echo "\">";
                echo (isset($context["text_account"]) ? $context["text_account"] : null);
                echo "</a></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"";
                // line 51
                echo (isset($context["order"]) ? $context["order"] : null);
                echo "\">";
                echo (isset($context["text_order"]) ? $context["text_order"] : null);
                echo "</a></li>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<li><a href=\"";
                // line 52
                echo (isset($context["wishlist"]) ? $context["wishlist"] : null);
                echo "\"><i class=\"fa fa-heart\"></i> Любими продукти</a></li>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<li><a href=\"";
                // line 53
                echo (isset($context["logout"]) ? $context["logout"] : null);
                echo "\">";
                echo (isset($context["text_logout"]) ? $context["text_logout"] : null);
                echo "</a></li>
\t\t\t\t\t\t\t\t\t";
            } else {
                // line 55
                echo "\t\t\t\t\t\t\t\t\t<li><a href=\"";
                echo (isset($context["register"]) ? $context["register"] : null);
                echo "\"><i class=\"fa fa-user\"></i> ";
                echo (isset($context["text_register"]) ? $context["text_register"] : null);
                echo "</a></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"";
                // line 56
                echo (isset($context["login"]) ? $context["login"] : null);
                echo "\"><i class=\"fa fa-pencil-square-o\"></i> ";
                echo (isset($context["text_login"]) ? $context["text_login"] : null);
                echo "</a></li>
\t\t\t\t\t\t\t\t\t";
            }
            // line 58
            echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li class=\"wishlist\">\t
\t\t\t\t\t\t\t    <a href=\"";
            // line 61
            echo (isset($context["wishlist"]) ? $context["wishlist"] : null);
            echo "\" title=\"Любими продукти\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-heart\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        } else {
            // line 66
            echo "\t\t\t\t\t\t\t<li class=\"login\"><a href=\"";
            echo (isset($context["register"]) ? $context["register"] : null);
            echo "\"><i class=\"fa fa-user\"></i><span class=\"hidden-xs\"></span></a></li>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
        }
        // line 69
        echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<li class=\"shopping_cart\">\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t \t";
        // line 71
        echo (isset($context["cart"]) ? $context["cart"] : null);
        echo " 
\t\t\t\t\t\t\t \t";
        // line 73
        echo "\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<!-- LOGO -->
\t\t\t\t
\t\t\t</div>
\t\t</div>
\t</div>
\t
\t<!-- HEADER CENTER -->
\t<div class=\"header-center ";
        // line 84
        echo (isset($context["hidden_headercenter"]) ? $context["hidden_headercenter"] : null);
        echo "\">
\t\t<div class=\"contain\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"header-menu col-lg-9 col-md-9 col-xs-3\">
\t\t\t\t\t<div class=\"responsive megamenu-style-dev megamenu-dev\">
\t\t\t\t\t";
        // line 89
        echo (isset($context["content_menu"]) ? $context["content_menu"] : null);
        echo "\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"inner-top-right kai col-lg-3 col-md-3 col-xs-12\">
\t\t\t\t\t<div class=\"header_search\">
\t\t\t\t\t\t<a href=\"javascript:void(0)\" title=\"Search\" class=\"btn-search\">
\t\t\t\t\t\t\t<span class=\"hidden\">Search</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
        // line 98
        echo (isset($context["search_block"]) ? $context["search_block"] : null);
        echo " 
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t
</header>";
    }

    public function getTemplateName()
    {
        return "so-revo/template/header/header10.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 98,  224 => 89,  216 => 84,  203 => 73,  199 => 71,  195 => 69,  188 => 66,  180 => 61,  175 => 58,  168 => 56,  161 => 55,  154 => 53,  150 => 52,  144 => 51,  138 => 50,  133 => 49,  131 => 48,  124 => 44,  118 => 43,  112 => 40,  109 => 39,  104 => 38,  99 => 37,  97 => 36,  94 => 35,  87 => 31,  83 => 29,  81 => 28,  78 => 27,  72 => 24,  70 => 23,  64 => 20,  60 => 19,  52 => 14,  48 => 12,  42 => 10,  37 => 9,  35 => 8,  31 => 7,  28 => 6,  26 => 5,  24 => 4,  22 => 3,  19 => 1,);
    }
}
/* */
/* {#=====Get variable : Config Select Block on header=====#}*/
/* {% set hidden_headertop = soconfig.get_settings('toppanel_type') =='1' or soconfig.get_settings('toppanel_type') =='2'? 'hidden-compact' : '' %}*/
/* {% set hidden_headercenter = soconfig.get_settings('toppanel_type') =='2'? 'hidden-compact' : '' %}*/
/* {% set hidden_headerbottom = soconfig.get_settings('toppanel_type') =='1'? 'hidden-compact' : '' %}*/
/* */
/* <header id="header" class=" variant typeheader-{{ typeheader ? typeheader : '1'}}">*/
/* 	{% if soconfig.get_settings('promotion_status') and soconfig.get_settings('promotion') %}*/
/* 	<div class="header-promotion {{hidden_headertop}}" >*/
/* 		{{ soconfig.decode_entities( soconfig.get_settings('promotion') ) }}*/
/* 	</div>*/
/* 	{% endif %} */
/* 	<!-- HEADER TOP -->*/
/* 	<div class="header-top {{hidden_headertop}}">*/
/* 		<div class="header-top-inner">*/
/* 			<div class="row">*/
/* 				*/
/* 				<div class="header-top-right collapsed-block col-lg-12 col-sm-9 col-md-9 col-xs-12 ">*/
/* 					<h5 class="tabBlockTitle hidden-lg hidden-sm hidden-md visible-xs">{{ text_more }}<a class="expander " href="#TabBlock-1"><i class="fa fa-angle-down"></i></a></h5>*/
/* 				    <div class="navbar-logo  col-lg-2 col-sm-3 col-md-3">{{soconfig.get_logo()}}</div>*/
/* 					<div  class="tabBlock" id="TabBlock-1">*/
/* 						<ul class="top-link list-inline">*/
/* 							{% if soconfig.get_settings('welcome_message_status') %}*/
/* 							<li class="message hidden-xs hidden-sm" >*/
/* 							   <a href="https://goo.gl/maps/ryCZFaUXiBKaieUZ8" target="_blank"><i class="fa fa-map-marker"></i></a>*/
/* 							</li>*/
/* 							{% endif  %} */
/* 							{% if soconfig.get_settings('phone_status') and soconfig.get_settings('contact_number') %}*/
/* 							<li class="phone-header">	*/
/* 								<span class="telephone hidden-xs" >*/
/* 									{{ soconfig.decode_entities( soconfig.get_settings('contact_number') ) }}*/
/* 								</span>*/
/* 							</li>*/
/* 							{% endif  %}*/
/* 							<!-- LANGUAGE CURENTY test-->*/
/* 							{% if soconfig.get_settings('lang_status') %}*/
/* 								<li class="language">{{ language }} </li>*/
/* 								<li class="currency" > {{ currency }}  </li>*/
/* 							{% endif %} */
/* 							{% if logged %}	*/
/* 							*/
/* 							<li class="account" id="my_account">*/
/* 								<a href="{{ account  }}" title="{{ text_account  }}" class="btn-xs dropdown-toggle" data-toggle="dropdown">*/
/* 									<i class="fa fa-user"><p id="username-desktop"> {{ text_logged }}</p></i>*/
/* 									<span class="my-acc hidden-xs"></span> <span class="fa fa-angle-down"></span>*/
/* 								</a>*/
/* 								<ul class="dropdown-menu ">*/
/* 									{% if logged %}*/
/* 							        <li><strong id="username-mobile">{{ text_logged }}</strong></li>*/
/* 									<li><a href="{{ account  }}">{{ text_account  }}</a></li>*/
/* 									<li><a href="{{ order  }}">{{ text_order  }}</a></li>									*/
/* 									<li><a href="{{ wishlist  }}"><i class="fa fa-heart"></i> Любими продукти</a></li>									*/
/* 									<li><a href="{{ logout  }}">{{ text_logout  }}</a></li>*/
/* 									{% else %}*/
/* 									<li><a href="{{ register  }}"><i class="fa fa-user"></i> {{ text_register  }}</a></li>*/
/* 									<li><a href="{{ login }}"><i class="fa fa-pencil-square-o"></i> {{ text_login }}</a></li>*/
/* 									{% endif %}*/
/* 								</ul>*/
/* 							</li>*/
/* 							<li class="wishlist">	*/
/* 							    <a href="{{ wishlist  }}" title="Любими продукти">*/
/* 									<i class="fa fa-heart"></i>*/
/* 								</a>*/
/* 							</li>*/
/* 							{% else %}*/
/* 							<li class="login"><a href="{{ register  }}"><i class="fa fa-user"></i><span class="hidden-xs"></span></a></li>*/
/* 							*/
/* 							{% endif %}*/
/* 							*/
/* 							<li class="shopping_cart">												*/
/* 							 	{{ cart }} */
/* 							 	{#<i class="fa fa-shopping-cart" aria-hidden="true"></i>		#}*/
/* 							</li>*/
/* 						</ul>*/
/* 					</div>*/
/* 				</div>*/
/* 				<!-- LOGO -->*/
/* 				*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	*/
/* 	<!-- HEADER CENTER -->*/
/* 	<div class="header-center {{hidden_headercenter}}">*/
/* 		<div class="contain">*/
/* 			<div class="row">*/
/* 				<div class="header-menu col-lg-9 col-md-9 col-xs-3">*/
/* 					<div class="responsive megamenu-style-dev megamenu-dev">*/
/* 					{{content_menu }}	*/
/* 					</div>*/
/* 				</div>*/
/* 				*/
/* 				<div class="inner-top-right kai col-lg-3 col-md-3 col-xs-12">*/
/* 					<div class="header_search">*/
/* 						<a href="javascript:void(0)" title="Search" class="btn-search">*/
/* 							<span class="hidden">Search</span>*/
/* 						</a>*/
/* 						{{ search_block }} */
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	*/
/* </header>*/
