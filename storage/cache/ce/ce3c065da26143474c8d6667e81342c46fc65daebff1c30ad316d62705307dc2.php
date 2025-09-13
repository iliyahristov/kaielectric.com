<?php

/* default/template/account/register.twig */
class __TwigTemplate_30799d2b56c18a630e05af1746a29068240e0eff1e3abfce2629ab05755e5f7d extends Twig_Template
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
<div id=\"account-register\" class=\"container\">
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
  ";
        // line 8
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 9
            echo "     <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            echo (isset($context["success"]) ? $context["success"] : null);
            echo "</div>
  ";
        }
        // line 11
        echo "  <div class=\"row\">";
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
    ";
        // line 12
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 13
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 14
            echo "    ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 15
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 16
            echo "    ";
        } else {
            // line 17
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 18
            echo "    ";
        }
        // line 19
        echo "    <div id=\"content\" class=\"col-sm-12\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
      <div class=\"block-content login-register-social\">
        <div class=\"enter\">
          <div class=\"pull-left\">Вход</div>
          <div class=\"pull-right\">Свържете се с нас <span><i class=\"fa fa-phone\"></i> <a href=\"tel:";
        // line 23
        echo (isset($context["telephone"]) ? $context["telephone"] : null);
        echo "\">";
        echo (isset($context["telephone"]) ? $context["telephone"] : null);
        echo "</a></span></div>
        </div>
        <div class=\"gnArqp\">        
          <a href=\"";
        // line 26
        echo (isset($context["googlelink"]) ? $context["googlelink"] : null);
        echo "\" class=\"btn btn-social-icon btn-sm btn-google-plus\">
            <svg width=\"18\" height=\"18\" xmlns=\"http://www.w3.org/2000/svg\"><g fill=\"#000\" fill-rule=\"evenodd\"><path d=\"M9 3.48c1.69 0 2.83.73 3.48 1.34l2.54-2.48C13.46.89 11.43 0 9 0 5.48 0 2.44 2.02.96 4.96l2.91 2.26C4.6 5.05 6.62 3.48 9 3.48z\" fill=\"#EA4335\"></path><path d=\"M17.64 9.2c0-.74-.06-1.28-.19-1.84H9v3.34h4.96c-.1.83-.64 2.08-1.84 2.92l2.84 2.2c1.7-1.57 2.68-3.88 2.68-6.62z\" fill=\"#4285F4\"></path><path d=\"M3.88 10.78A5.54 5.54 0 0 1 3.58 9c0-.62.11-1.22.29-1.78L.96 4.96A9.008 9.008 0 0 0 0 9c0 1.45.35 2.82.96 4.04l2.92-2.26z\" fill=\"#FBBC05\"></path><path d=\"M9 18c2.43 0 4.47-.8 5.96-2.18l-2.84-2.2c-.76.53-1.78.9-3.12.9-2.38 0-4.4-1.57-5.12-3.74L.97 13.04C2.45 15.98 5.48 18 9 18z\" fill=\"#34A853\"></path><path fill=\"none\" d=\"M0 0h18v18H0z\"></path></g>
            </svg>
            <span>Влез с Google</span>
          </a>
          <a href=\"";
        // line 31
        echo (isset($context["fblink"]) ? $context["fblink"] : null);
        echo "\" class=\"btn btn-social-icon btn-sm btn-facebook\">
            <svg width=\"18\" height=\"18\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 16 16\"><g fill=\"none\"><path d=\"M16 8c0-4.4-3.6-8-8-8S0 3.6 0 8c0 4 2.9 7.3 6.8 7.9v-5.6H4.7V8h2.1V6.2c0-2 1.1-3.1 3-3.1.8 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.2V8h2.2l-.4 2.3H9.3v5.6C13.1 15.3 16 12 16 8\" fill=\"#1877F2\"></path><path d=\"M11.1 10.3l.4-2.3H9.3V6.5c0-.6.3-1.2 1.3-1.2h1v-2s-1-.2-1.8-.2c-1.9 0-3 1.1-3 3.1V8H4.7v2.3h2.1v5.6c.4.1.8.1 1.2.1.4 0 .8 0 1.3-.1v-5.6h1.8\" fill=\"#FFF\"></path></g>
            </svg>
            <span>
              Влез с Facebook
            </span>
          </a>                  
        </div>
        <div class=\"d-flex\">
          <form class=\"form form-login col-reg registered-account\" action=\"";
        // line 40
        echo (isset($context["action_login"]) ? $context["action_login"] : null);
        echo "\" method=\"post\" id=\"login-form\">
            <h4>Съществуващ потребител</h4>
            ";
        // line 42
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 43
            echo "              <div class=\"alert alert-danger alert-dismissible login-warning-notice\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "</div>
            ";
        }
        // line 45
        echo "            <div class=\"block-content\">
              <fieldset class=\"fieldset login\" data-hasrequired=\"* Required Fields\">
                <div class=\"col-sm-12\">
                  <div class=\"form-group required\">
                      <label for=\"email\"> имейл адрес*</label>
                        <input 
                          name=\"email\" 
                          value=\"\" 
                          autocomplete=\"off\" 
                          id=\"email\" 
                          type=\"email\" 
                          class=\"input-text\" 
                          title=\"Email\" />
                  </div>
                </div>
                <div class=\"col-sm-12\">
                    <div class=\"form-group required\">
                      <label for=\"pass\"> парола*</label>
                        <input 
                          name=\"password\" 
                          type=\"password\" 
                          autocomplete=\"off\" 
                          class=\"input-text\" 
                          id=\"pass\" 
                          title=\"Password\" />
                    </div>
                </div>
                                            
                <div class=\"col-sm-12 text-left\">
                  <a 
                    class=\"action remind\" 
                    href=\"";
        // line 76
        echo (isset($context["forgotten"]) ? $context["forgotten"] : null);
        echo "\">
                      <span>
                        Забравена парола
                      </span>
                  </a>
                </div>
              </fieldset>
            </div>
            <div class=\"col-sm-12 action align-bottom\">
              <div class=\"text-center\">
                <button 
                  type=\"submit\" 
                  class=\"btn btn-reg-popup\" 
                  name=\"send\" id=\"send2\">
                  <span>Влез</span></button>
              </div>
            </div>
          </form>
          <div class=\"col-reg login-customer\">
            <h4>Нов потребител</h4>
            <p class=\"reg-subtitle\">*Задължителни полета</p>
            <form action=\"";
        // line 97
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" class=\"form form-login\">
            <fieldset id=\"account\">          
              <div class=\"col-sm-6\">
              <div class=\"form-group required\"> 
                  <label class=\"control-label\" for=\"input-firstname\">Име*</label>
                  <input type=\"text\" name=\"firstname\" value=\"";
        // line 102
        echo (isset($context["firstname"]) ? $context["firstname"] : null);
        echo "\" id=\"input-firstname\" class=\"input-text\" />
                  ";
        // line 103
        if ((isset($context["error_firstname"]) ? $context["error_firstname"] : null)) {
            // line 104
            echo "                  <div class=\"text-danger\">";
            echo (isset($context["error_firstname"]) ? $context["error_firstname"] : null);
            echo "</div>
                  ";
        }
        // line 105
        echo " 
                </div>
              </div>          
              <div class=\"col-sm-6\">
              <div class=\"form-group required\"> 
                  <label class=\"control-label\" for=\"input-lastname\">Фамилия*</label>
                  <input type=\"text\" name=\"lastname\" value=\"";
        // line 111
        echo (isset($context["lastname"]) ? $context["lastname"] : null);
        echo "\" id=\"input-lastname\" class=\"input-text\" />
                  ";
        // line 112
        if ((isset($context["error_lastname"]) ? $context["error_lastname"] : null)) {
            // line 113
            echo "                  <div class=\"text-danger\">";
            echo (isset($context["error_lastname"]) ? $context["error_lastname"] : null);
            echo "</div>
                  ";
        }
        // line 114
        echo " 
                </div>
              </div>
                        
            <!--  <div class=\"col-sm-6\">
              <div class=\"form-group required\"> 
                  <label class=\"control-label\" for=\"telephone\">Телефон*</label>
                  <input type=\"tel\" name=\"telephone\" value=\"\" placeholder=\"Телефон\" id=\"input-telephone\" class=\"form-control\" data-enpassusermodified=\"yes\">
                  ";
        // line 123
        echo "                  ";
        if ((isset($context["error_telephone"]) ? $context["error_telephone"] : null)) {
            // line 124
            echo "                  <div class=\"text-danger\">";
            echo (isset($context["error_telephone"]) ? $context["error_telephone"] : null);
            echo "</div>
                  ";
        }
        // line 125
        echo " 
                </div>
              </div> -->
              
              <div class=\"col-sm-12\">
                <div class=\"form-group required\">
                  <label class=\"control-label\" for=\"input-email\">Имейл адрес*</label>            
                  <input type=\"email\" name=\"email\" value=\"";
        // line 132
        echo (isset($context["email"]) ? $context["email"] : null);
        echo "\" id=\"input-email\" class=\"input-text\" />
                  ";
        // line 133
        if ((isset($context["error_email"]) ? $context["error_email"] : null)) {
            // line 134
            echo "                  <div class=\"text-danger\">";
            echo (isset($context["error_email"]) ? $context["error_email"] : null);
            echo "</div>
                  ";
        }
        // line 135
        echo " 
                </div>
              </div>          
            </fieldset>
              
            <fieldset>
              <div class=\"col-sm-6\">
                <div class=\"form-group required\">
                  <label class=\"control-label\" for=\"input-password\">";
        // line 143
        echo (isset($context["entry_password"]) ? $context["entry_password"] : null);
        echo "*</label>            
                  <input type=\"password\" name=\"password\" value=\"";
        // line 144
        echo (isset($context["password"]) ? $context["password"] : null);
        echo "\"  id=\"input-password\" class=\"input-text\" />
                  ";
        // line 145
        if ((isset($context["error_password"]) ? $context["error_password"] : null)) {
            // line 146
            echo "                  <div class=\"text-danger\">";
            echo (isset($context["error_password"]) ? $context["error_password"] : null);
            echo "</div>
                  ";
        }
        // line 147
        echo " 
                </div>
              </div>
              <div class=\"col-sm-6\">
                <div class=\"form-group required\">
                  <label class=\"control-label\" for=\"input-confirm\">Потвърди паролата*:</label>            
                  <input type=\"password\" name=\"confirm\" value=\"";
        // line 153
        echo (isset($context["confirm"]) ? $context["confirm"] : null);
        echo "\" id=\"input-confirm\" class=\"input-text\" />
                  ";
        // line 154
        if ((isset($context["error_confirm"]) ? $context["error_confirm"] : null)) {
            // line 155
            echo "                  <div class=\"text-danger\">";
            echo (isset($context["error_confirm"]) ? $context["error_confirm"] : null);
            echo "</div>
                  ";
        }
        // line 156
        echo " 
                </div>
              </div>
            </fieldset>
            <fieldset>
              <div class=\"form-group\">
                <div class=\"col-sm-12\">
                  <label class=\"control-label info-agree\">
                    ";
        // line 164
        echo (isset($context["route_policy"]) ? $context["route_policy"] : null);
        echo "
                    
                    ";
        // line 166
        echo (isset($context["route_cookies"]) ? $context["route_cookies"] : null);
        echo "
                  </label>
                </div>
            </div>

            </fieldset>

            ";
        // line 173
        echo (isset($context["captcha"]) ? $context["captcha"] : null);
        echo "
            
            <div class=\"buttons\">
              <div class=\"text-center\">
                <input type=\"submit\" value=\"Регистрирай се\" class=\"btn btn-reg-popup\" />
              </div>
            </div>
              
            </form>                                    
          </div>
        </div>
      <div style=\"clear:both;\"></div>
    </div>      
      
      ";
        // line 187
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "</div>
    </div>
    

</div>
<script type=\"text/javascript\"><!--
// Sort the custom fields
\$('#account .form-group[data-sort]').detach().each(function() {
\tif (\$(this).attr('data-sort') >= 0 && \$(this).attr('data-sort') <= \$('#account .form-group').length) {
\t\t\$('#account .form-group').eq(\$(this).attr('data-sort')).before(this);
\t}

\tif (\$(this).attr('data-sort') > \$('#account .form-group').length) {
\t\t\$('#account .form-group:last').after(this);
\t}

\tif (\$(this).attr('data-sort') == \$('#account .form-group').length) {
\t\t\$('#account .form-group:last').after(this);
\t}

\tif (\$(this).attr('data-sort') < -\$('#account .form-group').length) {
\t\t\$('#account .form-group:first').before(this);
\t}
});

\$('input[name=\\'customer_group_id\\']').on('change', function() {
\t\$.ajax({
\t\turl: 'index.php?route=account/register/customfield&customer_group_id=' + this.value,
\t\tdataType: 'json',
\t\tsuccess: function(json) {
\t\t\t\$('.custom-field').hide();
\t\t\t\$('.custom-field').removeClass('required');

\t\t\tfor (i = 0; i < json.length; i++) {
\t\t\t\tcustom_field = json[i];

\t\t\t\t\$('#custom-field' + custom_field['custom_field_id']).show();

\t\t\t\tif (custom_field['required']) {
\t\t\t\t\t\$('#custom-field' + custom_field['custom_field_id']).addClass('required');
\t\t\t\t}
\t\t\t}
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});

\$('input[name=\\'customer_group_id\\']:checked').trigger('change');
//--></script> 
<script type=\"text/javascript\"><!--
\$('button[id^=\\'button-custom-field\\']').on('click', function() {
\tvar element = this;

\t\$('#form-upload').remove();

\t\$('body').prepend('<form enctype=\"multipart/form-data\" id=\"form-upload\" style=\"display: none;\"><input type=\"file\" name=\"file\" /></form>');

\t\$('#form-upload input[name=\\'file\\']').trigger('click');

\tif (typeof timer != 'undefined') {
    \tclearInterval(timer);
\t}

\ttimer = setInterval(function() {
\t\tif (\$('#form-upload input[name=\\'file\\']').val() != '') {
\t\t\tclearInterval(timer);

\t\t\t\$.ajax({
\t\t\t\turl: 'index.php?route=tool/upload',
\t\t\t\ttype: 'post',
\t\t\t\tdataType: 'json',
\t\t\t\tdata: new FormData(\$('#form-upload')[0]),
\t\t\t\tcache: false,
\t\t\t\tcontentType: false,
\t\t\t\tprocessData: false,
\t\t\t\tbeforeSend: function() {
\t\t\t\t\t\$(element).button('loading');
\t\t\t\t},
\t\t\t\tcomplete: function() {
\t\t\t\t\t\$(element).button('reset');
\t\t\t\t},
\t\t\t\tsuccess: function(json) {
\t\t\t\t\t\$(element).parent().find('.text-danger').remove();

\t\t\t\t\tif (json['error']) {
\t\t\t\t\t\t\$(node).parent().find('input').after('<div class=\"text-danger\">' + json['error'] + '</div>');
\t\t\t\t\t}

\t\t\t\t\tif (json['success']) {
\t\t\t\t\t\talert(json['success']);

\t\t\t\t\t\t\$(element).parent().find('input').val(json['code']);
\t\t\t\t\t}
\t\t\t\t},
\t\t\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t\t\t}
\t\t\t});
\t\t}
\t}, 500);
});
//--></script> 
<script type=\"text/javascript\"><!--
\$('.date').datetimepicker({
\tlanguage: '";
        // line 293
        echo (isset($context["datepicker"]) ? $context["datepicker"] : null);
        echo "',
\tpickTime: false
});

\$('.time').datetimepicker({
\tlanguage: '";
        // line 298
        echo (isset($context["datepicker"]) ? $context["datepicker"] : null);
        echo "',
\tpickDate: false
});

\$('.datetime').datetimepicker({
\tlanguage: '";
        // line 303
        echo (isset($context["datepicker"]) ? $context["datepicker"] : null);
        echo "',
\tpickDate: true,
\tpickTime: true
});
//--></script> 
";
        // line 308
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "default/template/account/register.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  483 => 308,  475 => 303,  467 => 298,  459 => 293,  350 => 187,  333 => 173,  323 => 166,  318 => 164,  308 => 156,  302 => 155,  300 => 154,  296 => 153,  288 => 147,  282 => 146,  280 => 145,  276 => 144,  272 => 143,  262 => 135,  256 => 134,  254 => 133,  250 => 132,  241 => 125,  235 => 124,  232 => 123,  222 => 114,  216 => 113,  214 => 112,  210 => 111,  202 => 105,  196 => 104,  194 => 103,  190 => 102,  182 => 97,  158 => 76,  125 => 45,  119 => 43,  117 => 42,  112 => 40,  100 => 31,  92 => 26,  84 => 23,  76 => 19,  73 => 18,  70 => 17,  67 => 16,  64 => 15,  61 => 14,  58 => 13,  56 => 12,  51 => 11,  45 => 9,  43 => 8,  40 => 7,  29 => 5,  25 => 4,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div id="account-register" class="container">*/
/*   <ul class="breadcrumb">*/
/*     {% for breadcrumb in breadcrumbs %}*/
/*     <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*     {% endfor %}*/
/*   </ul>*/
/*   {% if success %}*/
/*      <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> {{ success }}</div>*/
/*   {% endif %}*/
/*   <div class="row">{{ column_left }}*/
/*     {% if column_left and column_right %}*/
/*     {% set class = 'col-sm-6' %}*/
/*     {% elseif column_left or column_right %}*/
/*     {% set class = 'col-sm-9' %}*/
/*     {% else %}*/
/*     {% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/*     <div id="content" class="col-sm-12">{{ content_top }}*/
/*       <div class="block-content login-register-social">*/
/*         <div class="enter">*/
/*           <div class="pull-left">Вход</div>*/
/*           <div class="pull-right">Свържете се с нас <span><i class="fa fa-phone"></i> <a href="tel:{{ telephone }}">{{ telephone }}</a></span></div>*/
/*         </div>*/
/*         <div class="gnArqp">        */
/*           <a href="{{ googlelink }}" class="btn btn-social-icon btn-sm btn-google-plus">*/
/*             <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg"><g fill="#000" fill-rule="evenodd"><path d="M9 3.48c1.69 0 2.83.73 3.48 1.34l2.54-2.48C13.46.89 11.43 0 9 0 5.48 0 2.44 2.02.96 4.96l2.91 2.26C4.6 5.05 6.62 3.48 9 3.48z" fill="#EA4335"></path><path d="M17.64 9.2c0-.74-.06-1.28-.19-1.84H9v3.34h4.96c-.1.83-.64 2.08-1.84 2.92l2.84 2.2c1.7-1.57 2.68-3.88 2.68-6.62z" fill="#4285F4"></path><path d="M3.88 10.78A5.54 5.54 0 0 1 3.58 9c0-.62.11-1.22.29-1.78L.96 4.96A9.008 9.008 0 0 0 0 9c0 1.45.35 2.82.96 4.04l2.92-2.26z" fill="#FBBC05"></path><path d="M9 18c2.43 0 4.47-.8 5.96-2.18l-2.84-2.2c-.76.53-1.78.9-3.12.9-2.38 0-4.4-1.57-5.12-3.74L.97 13.04C2.45 15.98 5.48 18 9 18z" fill="#34A853"></path><path fill="none" d="M0 0h18v18H0z"></path></g>*/
/*             </svg>*/
/*             <span>Влез с Google</span>*/
/*           </a>*/
/*           <a href="{{ fblink }}" class="btn btn-social-icon btn-sm btn-facebook">*/
/*             <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><g fill="none"><path d="M16 8c0-4.4-3.6-8-8-8S0 3.6 0 8c0 4 2.9 7.3 6.8 7.9v-5.6H4.7V8h2.1V6.2c0-2 1.1-3.1 3-3.1.8 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.2V8h2.2l-.4 2.3H9.3v5.6C13.1 15.3 16 12 16 8" fill="#1877F2"></path><path d="M11.1 10.3l.4-2.3H9.3V6.5c0-.6.3-1.2 1.3-1.2h1v-2s-1-.2-1.8-.2c-1.9 0-3 1.1-3 3.1V8H4.7v2.3h2.1v5.6c.4.1.8.1 1.2.1.4 0 .8 0 1.3-.1v-5.6h1.8" fill="#FFF"></path></g>*/
/*             </svg>*/
/*             <span>*/
/*               Влез с Facebook*/
/*             </span>*/
/*           </a>                  */
/*         </div>*/
/*         <div class="d-flex">*/
/*           <form class="form form-login col-reg registered-account" action="{{ action_login }}" method="post" id="login-form">*/
/*             <h4>Съществуващ потребител</h4>*/
/*             {% if error_warning %}*/
/*               <div class="alert alert-danger alert-dismissible login-warning-notice"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}</div>*/
/*             {% endif %}*/
/*             <div class="block-content">*/
/*               <fieldset class="fieldset login" data-hasrequired="* Required Fields">*/
/*                 <div class="col-sm-12">*/
/*                   <div class="form-group required">*/
/*                       <label for="email"> имейл адрес*</label>*/
/*                         <input */
/*                           name="email" */
/*                           value="" */
/*                           autocomplete="off" */
/*                           id="email" */
/*                           type="email" */
/*                           class="input-text" */
/*                           title="Email" />*/
/*                   </div>*/
/*                 </div>*/
/*                 <div class="col-sm-12">*/
/*                     <div class="form-group required">*/
/*                       <label for="pass"> парола*</label>*/
/*                         <input */
/*                           name="password" */
/*                           type="password" */
/*                           autocomplete="off" */
/*                           class="input-text" */
/*                           id="pass" */
/*                           title="Password" />*/
/*                     </div>*/
/*                 </div>*/
/*                                             */
/*                 <div class="col-sm-12 text-left">*/
/*                   <a */
/*                     class="action remind" */
/*                     href="{{ forgotten }}">*/
/*                       <span>*/
/*                         Забравена парола*/
/*                       </span>*/
/*                   </a>*/
/*                 </div>*/
/*               </fieldset>*/
/*             </div>*/
/*             <div class="col-sm-12 action align-bottom">*/
/*               <div class="text-center">*/
/*                 <button */
/*                   type="submit" */
/*                   class="btn btn-reg-popup" */
/*                   name="send" id="send2">*/
/*                   <span>Влез</span></button>*/
/*               </div>*/
/*             </div>*/
/*           </form>*/
/*           <div class="col-reg login-customer">*/
/*             <h4>Нов потребител</h4>*/
/*             <p class="reg-subtitle">*Задължителни полета</p>*/
/*             <form action="{{ action }}" method="post" enctype="multipart/form-data" class="form form-login">*/
/*             <fieldset id="account">          */
/*               <div class="col-sm-6">*/
/*               <div class="form-group required"> */
/*                   <label class="control-label" for="input-firstname">Име*</label>*/
/*                   <input type="text" name="firstname" value="{{ firstname }}" id="input-firstname" class="input-text" />*/
/*                   {% if error_firstname %}*/
/*                   <div class="text-danger">{{ error_firstname }}</div>*/
/*                   {% endif %} */
/*                 </div>*/
/*               </div>          */
/*               <div class="col-sm-6">*/
/*               <div class="form-group required"> */
/*                   <label class="control-label" for="input-lastname">Фамилия*</label>*/
/*                   <input type="text" name="lastname" value="{{ lastname }}" id="input-lastname" class="input-text" />*/
/*                   {% if error_lastname %}*/
/*                   <div class="text-danger">{{ error_lastname }}</div>*/
/*                   {% endif %} */
/*                 </div>*/
/*               </div>*/
/*                         */
/*             <!--  <div class="col-sm-6">*/
/*               <div class="form-group required"> */
/*                   <label class="control-label" for="telephone">Телефон*</label>*/
/*                   <input type="tel" name="telephone" value="" placeholder="Телефон" id="input-telephone" class="form-control" data-enpassusermodified="yes">*/
/*                   {#<input type="text" name="telephone" value="{{ telephone }}" id="telephone" class="input-text" />#}*/
/*                   {% if error_telephone %}*/
/*                   <div class="text-danger">{{ error_telephone }}</div>*/
/*                   {% endif %} */
/*                 </div>*/
/*               </div> -->*/
/*               */
/*               <div class="col-sm-12">*/
/*                 <div class="form-group required">*/
/*                   <label class="control-label" for="input-email">Имейл адрес*</label>            */
/*                   <input type="email" name="email" value="{{ email }}" id="input-email" class="input-text" />*/
/*                   {% if error_email %}*/
/*                   <div class="text-danger">{{ error_email }}</div>*/
/*                   {% endif %} */
/*                 </div>*/
/*               </div>          */
/*             </fieldset>*/
/*               */
/*             <fieldset>*/
/*               <div class="col-sm-6">*/
/*                 <div class="form-group required">*/
/*                   <label class="control-label" for="input-password">{{ entry_password }}*</label>            */
/*                   <input type="password" name="password" value="{{ password }}"  id="input-password" class="input-text" />*/
/*                   {% if error_password %}*/
/*                   <div class="text-danger">{{ error_password }}</div>*/
/*                   {% endif %} */
/*                 </div>*/
/*               </div>*/
/*               <div class="col-sm-6">*/
/*                 <div class="form-group required">*/
/*                   <label class="control-label" for="input-confirm">Потвърди паролата*:</label>            */
/*                   <input type="password" name="confirm" value="{{ confirm }}" id="input-confirm" class="input-text" />*/
/*                   {% if error_confirm %}*/
/*                   <div class="text-danger">{{ error_confirm }}</div>*/
/*                   {% endif %} */
/*                 </div>*/
/*               </div>*/
/*             </fieldset>*/
/*             <fieldset>*/
/*               <div class="form-group">*/
/*                 <div class="col-sm-12">*/
/*                   <label class="control-label info-agree">*/
/*                     {{ route_policy }}*/
/*                     */
/*                     {{ route_cookies }}*/
/*                   </label>*/
/*                 </div>*/
/*             </div>*/
/* */
/*             </fieldset>*/
/* */
/*             {{ captcha }}*/
/*             */
/*             <div class="buttons">*/
/*               <div class="text-center">*/
/*                 <input type="submit" value="Регистрирай се" class="btn btn-reg-popup" />*/
/*               </div>*/
/*             </div>*/
/*               */
/*             </form>                                    */
/*           </div>*/
/*         </div>*/
/*       <div style="clear:both;"></div>*/
/*     </div>      */
/*       */
/*       {{ content_bottom }}</div>*/
/*     </div>*/
/*     */
/* */
/* </div>*/
/* <script type="text/javascript"><!--*/
/* // Sort the custom fields*/
/* $('#account .form-group[data-sort]').detach().each(function() {*/
/* 	if ($(this).attr('data-sort') >= 0 && $(this).attr('data-sort') <= $('#account .form-group').length) {*/
/* 		$('#account .form-group').eq($(this).attr('data-sort')).before(this);*/
/* 	}*/
/* */
/* 	if ($(this).attr('data-sort') > $('#account .form-group').length) {*/
/* 		$('#account .form-group:last').after(this);*/
/* 	}*/
/* */
/* 	if ($(this).attr('data-sort') == $('#account .form-group').length) {*/
/* 		$('#account .form-group:last').after(this);*/
/* 	}*/
/* */
/* 	if ($(this).attr('data-sort') < -$('#account .form-group').length) {*/
/* 		$('#account .form-group:first').before(this);*/
/* 	}*/
/* });*/
/* */
/* $('input[name=\'customer_group_id\']').on('change', function() {*/
/* 	$.ajax({*/
/* 		url: 'index.php?route=account/register/customfield&customer_group_id=' + this.value,*/
/* 		dataType: 'json',*/
/* 		success: function(json) {*/
/* 			$('.custom-field').hide();*/
/* 			$('.custom-field').removeClass('required');*/
/* */
/* 			for (i = 0; i < json.length; i++) {*/
/* 				custom_field = json[i];*/
/* */
/* 				$('#custom-field' + custom_field['custom_field_id']).show();*/
/* */
/* 				if (custom_field['required']) {*/
/* 					$('#custom-field' + custom_field['custom_field_id']).addClass('required');*/
/* 				}*/
/* 			}*/
/* 		},*/
/* 		error: function(xhr, ajaxOptions, thrownError) {*/
/* 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 		}*/
/* 	});*/
/* });*/
/* */
/* $('input[name=\'customer_group_id\']:checked').trigger('change');*/
/* //--></script> */
/* <script type="text/javascript"><!--*/
/* $('button[id^=\'button-custom-field\']').on('click', function() {*/
/* 	var element = this;*/
/* */
/* 	$('#form-upload').remove();*/
/* */
/* 	$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');*/
/* */
/* 	$('#form-upload input[name=\'file\']').trigger('click');*/
/* */
/* 	if (typeof timer != 'undefined') {*/
/*     	clearInterval(timer);*/
/* 	}*/
/* */
/* 	timer = setInterval(function() {*/
/* 		if ($('#form-upload input[name=\'file\']').val() != '') {*/
/* 			clearInterval(timer);*/
/* */
/* 			$.ajax({*/
/* 				url: 'index.php?route=tool/upload',*/
/* 				type: 'post',*/
/* 				dataType: 'json',*/
/* 				data: new FormData($('#form-upload')[0]),*/
/* 				cache: false,*/
/* 				contentType: false,*/
/* 				processData: false,*/
/* 				beforeSend: function() {*/
/* 					$(element).button('loading');*/
/* 				},*/
/* 				complete: function() {*/
/* 					$(element).button('reset');*/
/* 				},*/
/* 				success: function(json) {*/
/* 					$(element).parent().find('.text-danger').remove();*/
/* */
/* 					if (json['error']) {*/
/* 						$(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');*/
/* 					}*/
/* */
/* 					if (json['success']) {*/
/* 						alert(json['success']);*/
/* */
/* 						$(element).parent().find('input').val(json['code']);*/
/* 					}*/
/* 				},*/
/* 				error: function(xhr, ajaxOptions, thrownError) {*/
/* 					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/* 				}*/
/* 			});*/
/* 		}*/
/* 	}, 500);*/
/* });*/
/* //--></script> */
/* <script type="text/javascript"><!--*/
/* $('.date').datetimepicker({*/
/* 	language: '{{ datepicker }}',*/
/* 	pickTime: false*/
/* });*/
/* */
/* $('.time').datetimepicker({*/
/* 	language: '{{ datepicker }}',*/
/* 	pickDate: false*/
/* });*/
/* */
/* $('.datetime').datetimepicker({*/
/* 	language: '{{ datepicker }}',*/
/* 	pickDate: true,*/
/* 	pickTime: true*/
/* });*/
/* //--></script> */
/* {{ footer }} */
