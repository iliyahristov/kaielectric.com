<?php

/* so-revo/template/extension/simple_blog/article_info.twig */
class __TwigTemplate_40289187f4147aa8a4610d378aa72c5271a91ddb66f40e80eafd8dd88dc186c9 extends Twig_Template
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
    ";
        // line 2
        $context["acticle_style"] = (isset($context["simple_blog_articles_style"]) ? $context["simple_blog_articles_style"] : null);
        echo " 

    ";
        // line 4
        if (((isset($context["acticle_style"]) ? $context["acticle_style"] : null) == "default")) {
            echo " 
        ";
            // line 5
            echo twig_include($this->env, $context, ((isset($context["theme_config"]) ? $context["theme_config"] : null) . "/template/extension/simple_blog/article_info/default.twig"));
            echo "
    ";
        } elseif ((        // line 6
(isset($context["acticle_style"]) ? $context["acticle_style"] : null) == "style1")) {
            echo " 
        ";
            // line 7
            echo twig_include($this->env, $context, ((isset($context["theme_config"]) ? $context["theme_config"] : null) . "/template/extension/simple_blog/article_info/style1.twig"));
            echo "
    ";
        } elseif ((        // line 8
(isset($context["acticle_style"]) ? $context["acticle_style"] : null) == "style2")) {
            echo " 
        ";
            // line 9
            echo twig_include($this->env, $context, ((isset($context["theme_config"]) ? $context["theme_config"] : null) . "/template/extension/simple_blog/article_info/style2.twig"));
            echo "
    ";
        } elseif ((        // line 10
(isset($context["acticle_style"]) ? $context["acticle_style"] : null) == "style3")) {
            echo " 
        ";
            // line 11
            echo twig_include($this->env, $context, ((isset($context["theme_config"]) ? $context["theme_config"] : null) . "/template/extension/simple_blog/article_info/style3.twig"));
            echo "
    ";
        } elseif ((        // line 12
(isset($context["acticle_style"]) ? $context["acticle_style"] : null) == "style4")) {
            echo " 
        ";
            // line 13
            echo twig_include($this->env, $context, ((isset($context["theme_config"]) ? $context["theme_config"] : null) . "/template/extension/simple_blog/article_info/style4.twig"));
            echo "
    ";
        } elseif ((        // line 14
(isset($context["acticle_style"]) ? $context["acticle_style"] : null) == "style5")) {
            echo " 
        ";
            // line 15
            echo twig_include($this->env, $context, ((isset($context["theme_config"]) ? $context["theme_config"] : null) . "/template/extension/simple_blog/article_info/style5.twig"));
            echo "
    ";
        } else {
            // line 17
            echo "        ";
            echo twig_include($this->env, $context, ((isset($context["theme_config"]) ? $context["theme_config"] : null) . "/template/extension/simple_blog/article_info/default.twig"));
            echo "
    ";
        }
        // line 19
        echo "    
    
    <script type=\"text/javascript\">
\t\tfunction removeCommentId() {
\t\t\t\$(\"#blog-reply-id\").val(0);
\t\t\t\$(\"#reply-remove\").css('display', 'none');
\t\t}
\t</script>
    
    <script type=\"text/javascript\">
\t\t\$('#comment-list .pagination a').delegate('click', function() {
\t\t\t\$('#comment-list').fadeOut('slow');
\t\t\t\t
\t\t\t\$('#comment-list').load(this.href);
\t\t\t
\t\t\t\$('#comment-list').fadeIn('slow');
\t\t\t
\t\t\treturn false;
\t\t});\t\t\t
\t\t
\t\t\$('#comment-list').load('index.php?route=extension/simple_blog/article/comment&simple_blog_article_id=";
        // line 39
        echo (isset($context["simple_blog_article_id"]) ? $context["simple_blog_article_id"] : null);
        echo "');
\t\t
\t</script>\t
    
    <script type=\"text/javascript\">\t\t
\t\t\$('#button-comment').bind('click', function() {
\t\t\t\$.ajax({
\t\t\t\ttype: 'POST',
\t\t\t\turl: 'index.php?route=extension/simple_blog/article/writeComment&simple_blog_article_id=";
        // line 47
        echo (isset($context["simple_blog_article_id"]) ? $context["simple_blog_article_id"] : null);
        echo "',
\t\t\t\tdataType: 'json',
\t\t\t\tdata: 'name=' + encodeURIComponent(\$('input[name=\\'name\\']').val()) + '&text=' + encodeURIComponent(\$('textarea[name=\\'text\\']').val()) + '&captcha=' + encodeURIComponent(\$('input[name=\\'captcha\\']').val()) + '&reply_id=' + encodeURIComponent(\$('input[name=\\'blog_article_reply_id\\']').val()),
\t\t\t\tbeforeSend: function() {
\t\t\t\t\t\$('.success, .warning').remove();
\t\t\t\t\t\$('#button-comment').attr('disabled', true);
\t\t\t\t\t\$('#review-title').after('<div class=\"attention\"><img src=\"catalog/view/theme/default/image/loading.gif\" alt=\"\" /> ";
        // line 53
        echo (isset($context["text_wait"]) ? $context["text_wait"] : null);
        echo "</div>');
\t\t\t\t},
\t\t\t\tcomplete: function() {
\t\t\t\t\t\$('#button-comment').attr('disabled', false);
\t\t\t\t\t\$('.attention').remove();
\t\t\t\t},
\t\t\t\tsuccess: function(data) {
\t\t\t\t   
                    \$('.alert').remove();
                    
\t\t\t\t\tif (data['error']) {
\t\t\t\t\t\t\$('#review-title').after('<div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ' + data['error'] + '</div>');
\t\t\t\t\t}
\t\t\t\t\t
\t\t\t\t\tif (data['success']) {
\t\t\t\t\t\t\$('#review-title').after('<div class=\"alert alert-success\"><i class=\"fa fa-check-circle\"></i> ' + data['success'] + '</div>');
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\$('input[name=\\'name\\']').val('');
\t\t\t\t\t\t\$('textarea[name=\\'text\\']').val('');
\t\t\t\t\t\t\$('input[name=\\'captcha\\']').val('');
\t\t\t\t\t\t\$(\"#blog-reply-id\").val(0);
\t\t\t\t\t\t\$(\"#reply-remove\").css('display', 'none');
\t\t\t\t\t\t
\t\t\t\t\t\t\$('#comment-list').load('index.php?route=extension/simple_blog/article/comment&simple_blog_article_id=";
        // line 76
        echo (isset($context["simple_blog_article_id"]) ? $context["simple_blog_article_id"] : null);
        echo "');\t\t\t\t\t\t\t
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});
\t\t});
\t</script> \t
\t\t
    
";
        // line 84
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/simple_blog/article_info.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 84,  151 => 76,  125 => 53,  116 => 47,  105 => 39,  83 => 19,  77 => 17,  72 => 15,  68 => 14,  64 => 13,  60 => 12,  56 => 11,  52 => 10,  48 => 9,  44 => 8,  40 => 7,  36 => 6,  32 => 5,  28 => 4,  23 => 2,  19 => 1,);
    }
}
/* {{ header }}*/
/*     {% set acticle_style = simple_blog_articles_style %} */
/* */
/*     {% if acticle_style == 'default'%} */
/*         {{ include (theme_config~"/template/extension/simple_blog/article_info/default.twig") }}*/
/*     {% elseif acticle_style == 'style1'%} */
/*         {{ include (theme_config~"/template/extension/simple_blog/article_info/style1.twig") }}*/
/*     {% elseif acticle_style == 'style2'%} */
/*         {{ include (theme_config~"/template/extension/simple_blog/article_info/style2.twig") }}*/
/*     {% elseif acticle_style == 'style3'%} */
/*         {{ include (theme_config~"/template/extension/simple_blog/article_info/style3.twig") }}*/
/*     {% elseif acticle_style == 'style4'%} */
/*         {{ include (theme_config~"/template/extension/simple_blog/article_info/style4.twig") }}*/
/*     {% elseif acticle_style == 'style5'%} */
/*         {{ include (theme_config~"/template/extension/simple_blog/article_info/style5.twig") }}*/
/*     {% else %}*/
/*         {{ include (theme_config~"/template/extension/simple_blog/article_info/default.twig") }}*/
/*     {% endif %}*/
/*     */
/*     */
/*     <script type="text/javascript">*/
/* 		function removeCommentId() {*/
/* 			$("#blog-reply-id").val(0);*/
/* 			$("#reply-remove").css('display', 'none');*/
/* 		}*/
/* 	</script>*/
/*     */
/*     <script type="text/javascript">*/
/* 		$('#comment-list .pagination a').delegate('click', function() {*/
/* 			$('#comment-list').fadeOut('slow');*/
/* 				*/
/* 			$('#comment-list').load(this.href);*/
/* 			*/
/* 			$('#comment-list').fadeIn('slow');*/
/* 			*/
/* 			return false;*/
/* 		});			*/
/* 		*/
/* 		$('#comment-list').load('index.php?route=extension/simple_blog/article/comment&simple_blog_article_id={{ simple_blog_article_id }}');*/
/* 		*/
/* 	</script>	*/
/*     */
/*     <script type="text/javascript">		*/
/* 		$('#button-comment').bind('click', function() {*/
/* 			$.ajax({*/
/* 				type: 'POST',*/
/* 				url: 'index.php?route=extension/simple_blog/article/writeComment&simple_blog_article_id={{ simple_blog_article_id }}',*/
/* 				dataType: 'json',*/
/* 				data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val()) + '&captcha=' + encodeURIComponent($('input[name=\'captcha\']').val()) + '&reply_id=' + encodeURIComponent($('input[name=\'blog_article_reply_id\']').val()),*/
/* 				beforeSend: function() {*/
/* 					$('.success, .warning').remove();*/
/* 					$('#button-comment').attr('disabled', true);*/
/* 					$('#review-title').after('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> {{ text_wait }}</div>');*/
/* 				},*/
/* 				complete: function() {*/
/* 					$('#button-comment').attr('disabled', false);*/
/* 					$('.attention').remove();*/
/* 				},*/
/* 				success: function(data) {*/
/* 				   */
/*                     $('.alert').remove();*/
/*                     */
/* 					if (data['error']) {*/
/* 						$('#review-title').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + data['error'] + '</div>');*/
/* 					}*/
/* 					*/
/* 					if (data['success']) {*/
/* 						$('#review-title').after('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + data['success'] + '</div>');*/
/* 										*/
/* 						$('input[name=\'name\']').val('');*/
/* 						$('textarea[name=\'text\']').val('');*/
/* 						$('input[name=\'captcha\']').val('');*/
/* 						$("#blog-reply-id").val(0);*/
/* 						$("#reply-remove").css('display', 'none');*/
/* 						*/
/* 						$('#comment-list').load('index.php?route=extension/simple_blog/article/comment&simple_blog_article_id={{ simple_blog_article_id }}');							*/
/* 					}*/
/* 				}*/
/* 			});*/
/* 		});*/
/* 	</script> 	*/
/* 		*/
/*     */
/* {{ footer }}*/
/* */
