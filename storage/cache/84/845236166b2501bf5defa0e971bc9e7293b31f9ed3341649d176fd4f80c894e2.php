<?php

/* so-revo/template/extension/simple_blog/article_info/style2.twig */
class __TwigTemplate_62a84870ff368e8deb86751ce1f685f306eac6a180b84366ae6dfccec70a7168 extends Twig_Template
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
        echo "<div class=\"container article--style2\">

    <ul class=\"breadcrumb\">
        ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 5
            echo "            <li><a href=\"";
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
        echo "    </ul>
     <div class=\"row\">

        <div class=\"col-xs-12\">
        ";
        // line 11
        if ((isset($context["image"]) ? $context["image"] : null)) {
            // line 12
            echo "            <div class=\"article--mainimage\">
            ";
            // line 13
            if (array_key_exists("featured_found", $context)) {
                // line 14
                echo "                <div class=\"article-image\">
                    <img src=\"";
                // line 15
                echo (isset($context["image"]) ? $context["image"] : null);
                echo "\" alt=\"";
                echo $this->getAttribute((isset($context["article_info"]) ? $context["article_info"] : null), "article_title", array());
                echo "\"  />
                </div>
            ";
            } else {
                // line 18
                echo "                <div class=\"article-image\">
                    <img src=\"";
                // line 19
                echo (isset($context["image"]) ? $context["image"] : null);
                echo "\" alt=\"";
                echo $this->getAttribute((isset($context["article_info"]) ? $context["article_info"] : null), "article_title", array());
                echo "\"/>
                </div>
            ";
            }
            // line 22
            echo "
                <div class=\"article--maintitle\">
                    <div class=\"article-title\">
                        <h3>";
            // line 25
            echo $this->getAttribute((isset($context["article_info"]) ? $context["article_info"] : null), "article_title", array());
            echo "</h3>
                    </div>
                    <div class=\"article-sub-title\">
                        <span class=\"article-author\"><a href=\"";
            // line 28
            echo (isset($context["author_url"]) ? $context["author_url"] : null);
            echo "\">";
            echo (isset($context["text_posted_by"]) ? $context["text_posted_by"] : null);
            echo ": ";
            echo $this->getAttribute((isset($context["article_info"]) ? $context["article_info"] : null), "author_name", array());
            echo "</a></span>
                        <span class=\"article-date\">";
            // line 29
            echo (isset($context["text_created"]) ? $context["text_created"] : null);
            echo ": ";
            echo (isset($context["article_date_modified"]) ? $context["article_date_modified"] : null);
            echo "</span>
                       
                    </div>
                </div>
            </div>
        ";
        }
        // line 35
        echo "        </div>

        
        ";
        // line 38
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 39
            echo "        ";
            $context["class"] = "col-sm-6 fluid-allsidebar";
            // line 40
            echo "        ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 41
            echo "            ";
            $context["class"] = "col-md-9 col-sm-12 fluid-sidebar";
            // line 42
            echo "        ";
        } else {
            // line 43
            echo "            ";
            $context["class"] = "col-sm-12";
            // line 44
            echo "        ";
        }
        // line 45
        echo "        
        <div id=\"content\" class=\"";
        // line 46
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">
            ";
        // line 47
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
            
            <div class=\"rows form-group\">
                ";
        // line 50
        if (array_key_exists("article_info_found", $context)) {
            // line 51
            echo "                    <div class=\"article-info\">
                       
                        
                        ";
            // line 54
            if (array_key_exists("featured_found", $context)) {
                // line 55
                echo "                            <div class=\"article-description\">
                                ";
                // line 56
                echo $this->getAttribute((isset($context["article_info"]) ? $context["article_info"] : null), "description", array());
                echo "
                            </div>
                        ";
            } else {
                // line 59
                echo "                            <div class=\"article-description\">
                                ";
                // line 60
                echo $this->getAttribute((isset($context["article_info"]) ? $context["article_info"] : null), "description", array());
                echo "
                            </div>
                        ";
            }
            // line 63
            echo "                        
                        ";
            // line 64
            if ((isset($context["article_additional_description"]) ? $context["article_additional_description"] : null)) {
                // line 65
                echo "                            <div class=\"article-description\">
                                 ";
                // line 66
                echo (isset($context["article_additional_description"]) ? $context["article_additional_description"] : null);
                echo "
                            </div>
                        ";
            }
            // line 69
            echo "                        
                         ";
            // line 70
            if ((isset($context["products"]) ? $context["products"] : null)) {
                // line 71
                echo "                        <div class=\"panel panel-default panel--related\">
                            <div class=\"panel-heading\">
                                <h3 class=\"panel-title\">";
                // line 73
                echo (isset($context["text_related_product"]) ? $context["text_related_product"] : null);
                echo "</h3>
                            </div>
                            <div class=\"panel-body\">
                                <div class=\"row product-layout\">
                                    ";
                // line 77
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    // line 78
                    echo "                                        <div class=\"col-md-3 col-sm-6 col-xs-12\">
                                            <div class=\"product-thumb transition simple-blog-product\">
                                                ";
                    // line 80
                    if ($this->getAttribute($context["product"], "thumb", array())) {
                        // line 81
                        echo "                                                    <div class=\"image\"><a href=\"";
                        echo $this->getAttribute($context["product"], "href", array());
                        echo "\"><img src=\"";
                        echo $this->getAttribute($context["product"], "thumb", array());
                        echo "\" alt=\"";
                        echo $this->getAttribute($context["product"], "name", array());
                        echo "\" title=\"";
                        echo $this->getAttribute($context["product"], "name", array());
                        echo "\" class=\"img-responsive\" /></a></div>
                                                ";
                    }
                    // line 83
                    echo "                                                
                                                <div class=\"caption text-center\">
                                                    <h4><a href=\"";
                    // line 85
                    echo $this->getAttribute($context["product"], "href", array());
                    echo "\">";
                    echo $this->getAttribute($context["product"], "name", array());
                    echo "</a></h4>  
                                                </div>
                                            </div>    
                                        </div>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 90
                echo "                                </div>
                            </div>
                        </div>
                    ";
            }
            // line 94
            echo "                   
                    ";
            // line 95
            if ((array_key_exists("simple_blog_related_articles", $context) && (isset($context["related_articles"]) ? $context["related_articles"] : null))) {
                // line 96
                echo "                        <div class=\"panel panel-default panel--related\">
                            <div class=\"panel-heading\">
                                <h3 class=\"panel-title\">";
                // line 98
                echo (isset($context["text_related_article"]) ? $context["text_related_article"] : null);
                echo "</h3>
                            </div>
                            
                            <div class=\"panel-body\">
                                <div class=\"related-article\">
                                    <div class=\"row \">
                                        ";
                // line 104
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["related_articles"]) ? $context["related_articles"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["related_article"]) {
                    // line 105
                    echo "                                            <div class=\" col-sm-3 col-xs-12\">
                                                <div class=\"product-thumb\">
                                                    <div class=\"image\">
                                                        <a href=\"";
                    // line 108
                    echo $this->getAttribute($context["related_article"], "article_href", array());
                    echo "\">
                                                            <img src=\"";
                    // line 109
                    echo $this->getAttribute($context["related_article"], "image", array());
                    echo "\" alt=\"";
                    echo $this->getAttribute($context["related_article"], "article_title", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["related_article"], "article_title", array());
                    echo "\" class=\"img-responsive\" />
                                                        </a>
                                                    </div>
                                                    <div class=\"name \">
                                                        <a href=\"";
                    // line 113
                    echo $this->getAttribute($context["related_article"], "article_href", array());
                    echo "\">";
                    echo $this->getAttribute($context["related_article"], "article_title", array());
                    echo "</a>
                                                    </div>
                                                    
                                                   
                                                </div>
                                            </div>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['related_article'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 120
                echo "                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
            }
            // line 125
            echo "
                    ";
            // line 126
            if (((isset($context["simple_blog_author_information"]) ? $context["simple_blog_author_information"] : null) == "1")) {
                // line 127
                echo "                        <div class=\"panel panel-default panel--author\">
                            <div class=\"panel-heading\">
                                <h3 class=\"panel-title\">";
                // line 129
                echo (((isset($context["author_name"]) ? $context["author_name"] : null) . " ") . (isset($context["text_author_information"]) ? $context["text_author_information"] : null));
                echo "</h3>
                            </div>
                            
                            <div class=\"panel-body\">
                                <div class=\"author-info\">
                                    ";
                // line 134
                if ((isset($context["author_image"]) ? $context["author_image"] : null)) {
                    // line 135
                    echo "                                    <div class=\"col-lg-2 col-md-2 col-sm-3 col-xs-12\">
                                        <img src=\"";
                    // line 136
                    echo (isset($context["author_image"]) ? $context["author_image"] : null);
                    echo "\" alt=\"";
                    echo $this->getAttribute((isset($context["article_info"]) ? $context["article_info"] : null), "article_title", array());
                    echo "\" style=\"border: 1px solid #cccccc; padding: 5px; border-radius: 5px;\" />
                                    </div>
                                    ";
                }
                // line 139
                echo "
                                    <div class=\"col-lg-10 col-md-10 col-sm-9 col-xs-12\">
                                        ";
                // line 141
                echo (isset($context["author_description"]) ? $context["author_description"] : null);
                echo "
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
            }
            // line 147
            echo "

                        ";
            // line 149
            if ($this->getAttribute((isset($context["article_info"]) ? $context["article_info"] : null), "allow_comment", array())) {
                echo "                                
                            <div class=\"panel panel-default related-comment\">
                                <div class=\"panel-body\">
                                    <div class=\"form-group\">
                                        <div id=\"comments\" class=\"blog-comment-info\">
                                            <div id=\"comment-list\"></div>
                                            <div id=\"comment-section\"></div>
                                            <h2 id=\"review-title\">
                                                ";
                // line 157
                echo (isset($context["text_write_comment"]) ? $context["text_write_comment"] : null);
                echo "
                                                <i class=\"fa fa-times-circle fa-lg\" id=\"reply-remove\" style=\"display:none; cursor: pointer;\" onclick=\"removeCommentId();\"></i>
                                            </h2>                           
                                            <input type=\"hidden\" name=\"blog_article_reply_id\" value=\"0\" id=\"blog-reply-id\"/>
                                            
                                            <div class=\"form-group contacts-form row\">
                                                <div class=\"col-md-6\">
                                                   <b>";
                // line 164
                echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
                echo "</b><br />
                                                   <input type=\"text\" name=\"name\" value=\"\" class=\"form-control\" /><br />
                                                </div>
                                                <div class=\"col-md-12\">
                                                   <b>";
                // line 168
                echo (isset($context["entry_review"]) ? $context["entry_review"] : null);
                echo "</b><br />
                                                    <textarea name=\"text\" class=\"form-control\"></textarea>
                                                    <span style=\"font-size: 11px;\">";
                // line 170
                echo (isset($context["text_note"]) ? $context["text_note"] : null);
                echo "</span>
                                                    <br /><br />
                                                </div>
                                                <div class=\"col-md-12\">
                                                    ";
                // line 174
                echo (isset($context["captcha"]) ? $context["captcha"] : null);
                echo "
                                                </div>
                                              
                                            </div>
                                            
                                            <div class=\"text-left\"><a id=\"button-comment\" class=\"btn btn-info\"><span>";
                // line 179
                echo (isset($context["button_submit"]) ? $context["button_submit"] : null);
                echo "</span></a></div>           
                                        </div>                                          
                                    </div>
                                </div>                                    
                            </div>                                    
                        ";
            }
            // line 185
            echo "                        
                    </div>
                ";
        } else {
            // line 188
            echo "                    <h3 class=\"text-center\">";
            echo (isset($context["text_no_found"]) ? $context["text_no_found"] : null);
            echo "</h3>
                ";
        }
        // line 190
        echo "            </div>
            
            ";
        // line 192
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "
        </div>
        ";
        // line 194
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
        ";
        // line 195
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "
    </div>  
</div>";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/simple_blog/article_info/style2.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  436 => 195,  432 => 194,  427 => 192,  423 => 190,  417 => 188,  412 => 185,  403 => 179,  395 => 174,  388 => 170,  383 => 168,  376 => 164,  366 => 157,  355 => 149,  351 => 147,  342 => 141,  338 => 139,  330 => 136,  327 => 135,  325 => 134,  317 => 129,  313 => 127,  311 => 126,  308 => 125,  301 => 120,  286 => 113,  275 => 109,  271 => 108,  266 => 105,  262 => 104,  253 => 98,  249 => 96,  247 => 95,  244 => 94,  238 => 90,  225 => 85,  221 => 83,  209 => 81,  207 => 80,  203 => 78,  199 => 77,  192 => 73,  188 => 71,  186 => 70,  183 => 69,  177 => 66,  174 => 65,  172 => 64,  169 => 63,  163 => 60,  160 => 59,  154 => 56,  151 => 55,  149 => 54,  144 => 51,  142 => 50,  136 => 47,  132 => 46,  129 => 45,  126 => 44,  123 => 43,  120 => 42,  117 => 41,  114 => 40,  111 => 39,  109 => 38,  104 => 35,  93 => 29,  85 => 28,  79 => 25,  74 => 22,  66 => 19,  63 => 18,  55 => 15,  52 => 14,  50 => 13,  47 => 12,  45 => 11,  39 => 7,  28 => 5,  24 => 4,  19 => 1,);
    }
}
/* <div class="container article--style2">*/
/* */
/*     <ul class="breadcrumb">*/
/*         {% for breadcrumb in breadcrumbs %}*/
/*             <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*         {% endfor %}*/
/*     </ul>*/
/*      <div class="row">*/
/* */
/*         <div class="col-xs-12">*/
/*         {% if image %}*/
/*             <div class="article--mainimage">*/
/*             {% if featured_found is defined %}*/
/*                 <div class="article-image">*/
/*                     <img src="{{ image }}" alt="{{ article_info.article_title }}"  />*/
/*                 </div>*/
/*             {% else %}*/
/*                 <div class="article-image">*/
/*                     <img src="{{ image }}" alt="{{ article_info.article_title }}"/>*/
/*                 </div>*/
/*             {% endif %}*/
/* */
/*                 <div class="article--maintitle">*/
/*                     <div class="article-title">*/
/*                         <h3>{{ article_info.article_title }}</h3>*/
/*                     </div>*/
/*                     <div class="article-sub-title">*/
/*                         <span class="article-author"><a href="{{ author_url }}">{{ text_posted_by }}: {{ article_info.author_name }}</a></span>*/
/*                         <span class="article-date">{{ text_created }}: {{ article_date_modified }}</span>*/
/*                        */
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         {% endif %}*/
/*         </div>*/
/* */
/*         */
/*         {% if column_left and column_right %}*/
/*         {% set class = 'col-sm-6 fluid-allsidebar' %}*/
/*         {% elseif column_left or column_right %}*/
/*             {% set class = 'col-md-9 col-sm-12 fluid-sidebar' %}*/
/*         {% else %}*/
/*             {% set class = 'col-sm-12' %}*/
/*         {% endif %}*/
/*         */
/*         <div id="content" class="{{ class }}">*/
/*             {{ content_top }}*/
/*             */
/*             <div class="rows form-group">*/
/*                 {% if article_info_found is defined %}*/
/*                     <div class="article-info">*/
/*                        */
/*                         */
/*                         {% if featured_found is defined %}*/
/*                             <div class="article-description">*/
/*                                 {{ article_info.description }}*/
/*                             </div>*/
/*                         {% else %}*/
/*                             <div class="article-description">*/
/*                                 {{ article_info.description }}*/
/*                             </div>*/
/*                         {% endif %}*/
/*                         */
/*                         {% if article_additional_description %}*/
/*                             <div class="article-description">*/
/*                                  {{ article_additional_description }}*/
/*                             </div>*/
/*                         {% endif %}*/
/*                         */
/*                          {% if products %}*/
/*                         <div class="panel panel-default panel--related">*/
/*                             <div class="panel-heading">*/
/*                                 <h3 class="panel-title">{{ text_related_product }}</h3>*/
/*                             </div>*/
/*                             <div class="panel-body">*/
/*                                 <div class="row product-layout">*/
/*                                     {% for product in products %}*/
/*                                         <div class="col-md-3 col-sm-6 col-xs-12">*/
/*                                             <div class="product-thumb transition simple-blog-product">*/
/*                                                 {% if product.thumb %}*/
/*                                                     <div class="image"><a href="{{ product.href }}"><img src="{{ product.thumb }}" alt="{{ product.name }}" title="{{ product.name }}" class="img-responsive" /></a></div>*/
/*                                                 {% endif %}*/
/*                                                 */
/*                                                 <div class="caption text-center">*/
/*                                                     <h4><a href="{{ product.href }}">{{ product.name }}</a></h4>  */
/*                                                 </div>*/
/*                                             </div>    */
/*                                         </div>*/
/*                                     {% endfor %}*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     {% endif %}*/
/*                    */
/*                     {% if simple_blog_related_articles is defined and related_articles %}*/
/*                         <div class="panel panel-default panel--related">*/
/*                             <div class="panel-heading">*/
/*                                 <h3 class="panel-title">{{ text_related_article }}</h3>*/
/*                             </div>*/
/*                             */
/*                             <div class="panel-body">*/
/*                                 <div class="related-article">*/
/*                                     <div class="row ">*/
/*                                         {% for related_article in related_articles %}*/
/*                                             <div class=" col-sm-3 col-xs-12">*/
/*                                                 <div class="product-thumb">*/
/*                                                     <div class="image">*/
/*                                                         <a href="{{ related_article.article_href }}">*/
/*                                                             <img src="{{ related_article.image }}" alt="{{ related_article.article_title }}" title="{{ related_article.article_title }}" class="img-responsive" />*/
/*                                                         </a>*/
/*                                                     </div>*/
/*                                                     <div class="name ">*/
/*                                                         <a href="{{ related_article.article_href }}">{{ related_article.article_title }}</a>*/
/*                                                     </div>*/
/*                                                     */
/*                                                    */
/*                                                 </div>*/
/*                                             </div>*/
/*                                         {% endfor %}*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     {% endif %}*/
/* */
/*                     {% if simple_blog_author_information == '1' %}*/
/*                         <div class="panel panel-default panel--author">*/
/*                             <div class="panel-heading">*/
/*                                 <h3 class="panel-title">{{ author_name ~ " " ~ text_author_information }}</h3>*/
/*                             </div>*/
/*                             */
/*                             <div class="panel-body">*/
/*                                 <div class="author-info">*/
/*                                     {% if author_image  %}*/
/*                                     <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">*/
/*                                         <img src="{{ author_image }}" alt="{{ article_info.article_title }}" style="border: 1px solid #cccccc; padding: 5px; border-radius: 5px;" />*/
/*                                     </div>*/
/*                                     {% endif %}*/
/* */
/*                                     <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">*/
/*                                         {{ author_description }}*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     {% endif %}*/
/* */
/* */
/*                         {% if article_info.allow_comment %}                                */
/*                             <div class="panel panel-default related-comment">*/
/*                                 <div class="panel-body">*/
/*                                     <div class="form-group">*/
/*                                         <div id="comments" class="blog-comment-info">*/
/*                                             <div id="comment-list"></div>*/
/*                                             <div id="comment-section"></div>*/
/*                                             <h2 id="review-title">*/
/*                                                 {{ text_write_comment }}*/
/*                                                 <i class="fa fa-times-circle fa-lg" id="reply-remove" style="display:none; cursor: pointer;" onclick="removeCommentId();"></i>*/
/*                                             </h2>                           */
/*                                             <input type="hidden" name="blog_article_reply_id" value="0" id="blog-reply-id"/>*/
/*                                             */
/*                                             <div class="form-group contacts-form row">*/
/*                                                 <div class="col-md-6">*/
/*                                                    <b>{{ entry_name }}</b><br />*/
/*                                                    <input type="text" name="name" value="" class="form-control" /><br />*/
/*                                                 </div>*/
/*                                                 <div class="col-md-12">*/
/*                                                    <b>{{ entry_review }}</b><br />*/
/*                                                     <textarea name="text" class="form-control"></textarea>*/
/*                                                     <span style="font-size: 11px;">{{ text_note }}</span>*/
/*                                                     <br /><br />*/
/*                                                 </div>*/
/*                                                 <div class="col-md-12">*/
/*                                                     {{ captcha }}*/
/*                                                 </div>*/
/*                                               */
/*                                             </div>*/
/*                                             */
/*                                             <div class="text-left"><a id="button-comment" class="btn btn-info"><span>{{ button_submit }}</span></a></div>           */
/*                                         </div>                                          */
/*                                     </div>*/
/*                                 </div>                                    */
/*                             </div>                                    */
/*                         {% endif %}*/
/*                         */
/*                     </div>*/
/*                 {% else %}*/
/*                     <h3 class="text-center">{{ text_no_found }}</h3>*/
/*                 {% endif %}*/
/*             </div>*/
/*             */
/*             {{ content_bottom }}*/
/*         </div>*/
/*         {{ column_left }}*/
/*         {{ column_right }}*/
/*     </div>  */
/* </div>*/
