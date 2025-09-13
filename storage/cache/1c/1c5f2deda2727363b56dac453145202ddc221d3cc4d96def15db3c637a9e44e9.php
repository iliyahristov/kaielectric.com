<?php

/* extension/module/nitropack_manage.twig */
class __TwigTemplate_01a695a997c19164def487c9da6b9f6f181024cc1dd2bbabbd3580b2c7521248 extends Twig_Template
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
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\" class=\"nitro\">
    <div class=\"container-fluid bg-light p-4\">
        <div class=\"row\">
            <div class=\"col-12\">
                <h2 class=\"pull-left\">
                    <img src=\"view/image/vendor/nitropackio/logo.png\" id=\"nitropack-logo\" alt=\"";
        // line 8
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "\" />
                    <span class=\"opacity-0-9\">";
        // line 9
        echo (isset($context["text_nitropack"]) ? $context["text_nitropack"] : null);
        echo "</span>
                    <span class=\"opacity-0-2\">";
        // line 10
        echo (isset($context["text_io"]) ? $context["text_io"] : null);
        echo "</span>
                    <span class=\"opacity-0-2\">&nbsp;<small>";
        // line 11
        echo (isset($context["version"]) ? $context["version"] : null);
        echo "</small></span>
                </h2>
                <div class=\"pull-right\">
                    <a target=\"_blank\" href=\"";
        // line 14
        echo (isset($context["external_settings"]) ? $context["external_settings"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_external_settings"]) ? $context["button_external_settings"] : null);
        echo "\" class=\"btn btn-warning d-inline-block\"><i class=\"fa fa-cogs\"></i></a>
                    <a target=\"_blank\" href=\"";
        // line 15
        echo (isset($context["documentation"]) ? $context["documentation"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_documentation"]) ? $context["button_documentation"] : null);
        echo "\" class=\"btn btn-info d-inline-block\"><i class=\"fa fa-question-circle\"></i></a>
                    <div class=\"dropdown d-inline-block\">
                        <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" id=\"store-picker\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        ";
        // line 18
        echo $this->getAttribute((isset($context["store"]) ? $context["store"] : null), "name", array(), "array");
        echo "
                        </button>
                        <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"store-picker\">
                            ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["stores"]) ? $context["stores"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 22
            echo "                                <a class=\"dropdown-item ";
            echo (($this->getAttribute($context["store"], "current", array(), "array")) ? ("active") : (""));
            echo "\" href=\"";
            echo $this->getAttribute($context["store"], "admin_href", array(), "array");
            echo "\">";
            echo $this->getAttribute($context["store"], "name", array(), "array");
            echo "</a>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "                        </div>
                    </div>
                    <a href=\"";
        // line 26
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-light btn-outline-secondary d-inline-block\"><i class=\"fa fa-reply\"></i></a>
                </div>
            </div>
            <div class=\"col-12 mt-3\" id=\"nitropack-flash-container\">
                ";
        // line 30
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 31
            echo "                    <div class=\"alert alert-danger\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"fa fa-times\"></i></button>
                        <i class=\"fa fa-exclamation-circle\"></i> ";
            // line 33
            echo (isset($context["error"]) ? $context["error"] : null);
            echo "
                    </div>
                ";
        }
        // line 36
        echo "                ";
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 37
            echo "                    <div class=\"alert alert-success\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"fa fa-times\"></i></button>
                        <i class=\"fa fa-check\"></i> ";
            // line 39
            echo (isset($context["success"]) ? $context["success"] : null);
            echo "
                    </div>
                ";
        }
        // line 42
        echo "                ";
        if ((isset($context["warning"]) ? $context["warning"] : null)) {
            // line 43
            echo "                    <div class=\"alert alert-warning\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><i class=\"fa fa-times\"></i></button>
                        <i class=\"fa fa-exclamation-triangle\"></i> ";
            // line 45
            echo (isset($context["warning"]) ? $context["warning"] : null);
            echo "
                    </div>
                ";
        }
        // line 48
        echo "            </div>
        </div>
        <form method=\"POST\" action=\"";
        // line 50
        echo (isset($context["manage"]) ? $context["manage"] : null);
        echo "\" enctype=\"multipart/form-data\" id=\"manage-form\" data-text-loading=\"";
        echo (isset($context["text_loading_form"]) ? $context["text_loading_form"] : null);
        echo "\" data-text-logged-out=\"";
        echo (isset($context["text_logged_out"]) ? $context["text_logged_out"] : null);
        echo "\" data-text-connection-lost=\"";
        echo (isset($context["text_connection_lost"]) ? $context["text_connection_lost"] : null);
        echo "\" data-url-update-check=\"";
        echo (isset($context["update_check"]) ? $context["update_check"] : null);
        echo "\" data-text-onbeforeunload=\"";
        echo (isset($context["text_onbeforeunload"]) ? $context["text_onbeforeunload"] : null);
        echo "\" data-url-cleanup-stale-cache=\"";
        echo (isset($context["cleanup_stale_cache"]) ? $context["cleanup_stale_cache"] : null);
        echo "\" data-url-has-stale-cache=\"";
        echo (isset($context["has_stale_cache"]) ? $context["has_stale_cache"] : null);
        echo "\" data-url-default=\"";
        echo (isset($context["url_default"]) ? $context["url_default"] : null);
        echo "\">
            <input type=\"hidden\" name=\"local_preset\" id=\"nitropack-local-preset\" value=\"";
        // line 51
        echo (isset($context["local_preset"]) ? $context["local_preset"] : null);
        echo "\" />
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <div class=\"card mt-4\">
                        <div class=\"iframe-container iframe-container-small\">
                            <iframe scrolling=\"no\" data-text-loading-invalidate-cache=\"";
        // line 56
        echo (isset($context["text_loading_invalidate_cache"]) ? $context["text_loading_invalidate_cache"] : null);
        echo "\" data-text-preset-changed=\"";
        echo (isset($context["text_preset_changed"]) ? $context["text_preset_changed"] : null);
        echo "\" data-url-invalidate-cache=\"";
        echo (isset($context["invalidate"]) ? $context["invalidate"] : null);
        echo "\" data-text-loading-purge-cache=\"";
        echo (isset($context["text_loading_purge_cache"]) ? $context["text_loading_purge_cache"] : null);
        echo "\" data-url-purge-cache=\"";
        echo (isset($context["purge"]) ? $context["purge"] : null);
        echo "\" id=\"optimizations\" data-src=\"";
        echo (isset($context["optimizations"]) ? $context["optimizations"] : null);
        echo "\" scrolling=\"no\"></iframe>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"card mt-4\">
                        <div class=\"iframe-container iframe-container-small\">
                            <iframe scrolling=\"no\" id=\"plan\" data-src=\"";
        // line 63
        echo (isset($context["plan"]) ? $context["plan"] : null);
        echo "\" scrolling=\"no\"></iframe>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"card mt-4\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">
                            ";
        // line 71
        echo (isset($context["text_service_status"]) ? $context["text_service_status"] : null);
        echo "
                            </h5>
                            <div class=\"form-group\">
                                <label>";
        // line 74
        echo (isset($context["field_site_id"]) ? $context["field_site_id"] : null);
        echo "</label>
                                <div>
                                    <span id=\"site-id\">";
        // line 76
        echo (isset($context["site_id"]) ? $context["site_id"] : null);
        echo "</span>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label>";
        // line 80
        echo (isset($context["field_site"]) ? $context["field_site"] : null);
        echo "</label>
                                <div>
                                    <span id=\"site\">";
        // line 82
        echo (isset($context["site"]) ? $context["site"] : null);
        echo "</span>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label>";
        // line 86
        echo (isset($context["entry_warmup_status"]) ? $context["entry_warmup_status"] : null);
        echo "</label>
                                <div>
                                    <small class=\"pull-left\">
                                        <span class=\"warmup-status\">";
        // line 89
        echo $this->getAttribute((isset($context["warmup_stats"]) ? $context["warmup_stats"] : null), "text_warmup_status", array());
        echo "</span>
                                    </small>
                                    <span class=\"pull-right\">
                                        <span id=\"warmup-buttons\" data-warmup-stats-url=\"";
        // line 92
        echo (isset($context["warmup_stats_url"]) ? $context["warmup_stats_url"] : null);
        echo "\" data-warmup-estimate-url=\"";
        echo (isset($context["warmup_estimate_url"]) ? $context["warmup_estimate_url"] : null);
        echo "\">
                                            <button ";
        // line 93
        if ((($this->getAttribute((isset($context["warmup_stats"]) ? $context["warmup_stats"] : null), "is_warmup_active", array()) ||  !$this->getAttribute((isset($context["warmup_stats"]) ? $context["warmup_stats"] : null), "status", array())) ||  !$this->getAttribute((isset($context["warmup_stats"]) ? $context["warmup_stats"] : null), "is_warmup_enabled", array()))) {
            echo " style=\"display: none;\" ";
        }
        echo " data-warmup-button=\"start\" data-warmup-action=\"";
        echo (isset($context["warmup_start"]) ? $context["warmup_start"] : null);
        echo "\" class=\"btn btn-sm btn-success\" data-toggle=\"tooltip\" data-original-title=\"";
        echo (isset($context["text_warmup_start"]) ? $context["text_warmup_start"] : null);
        echo "\"><i class=\"fa fa-play\"></i></button>
                                            <button ";
        // line 94
        if (((($this->getAttribute((isset($context["warmup_stats"]) ? $context["warmup_stats"] : null), "pending", array()) == 0) ||  !$this->getAttribute((isset($context["warmup_stats"]) ? $context["warmup_stats"] : null), "is_warmup_enabled", array())) ||  !$this->getAttribute((isset($context["warmup_stats"]) ? $context["warmup_stats"] : null), "status", array()))) {
            echo " style=\"display: none;\" ";
        }
        echo " data-warmup-button=\"pause\" data-warmup-action=\"";
        echo (isset($context["warmup_pause"]) ? $context["warmup_pause"] : null);
        echo "\" class=\"btn btn-sm btn-warning\" data-toggle=\"tooltip\" data-original-title=\"";
        echo (isset($context["text_warmup_pause"]) ? $context["text_warmup_pause"] : null);
        echo "\"><i class=\"fa fa-pause\"></i></button>
                                            <!--button ";
        // line 95
        if (( !(isset($context["warmup"]) ? $context["warmup"] : null) ||  !$this->getAttribute((isset($context["warmup_stats"]) ? $context["warmup_stats"] : null), "status", array()))) {
            echo " style=\"display: none;\" ";
        }
        echo " data-warmup-button=\"info\" class=\"btn btn-sm btn-info\" data-toggle=\"tooltip\" data-original-title=\"";
        echo (isset($context["text_warmup_stats"]) ? $context["text_warmup_stats"] : null);
        echo "\"><i class=\"fa fa-info-circle\"></i></button-->
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class=\"card-footer\">
                            <small class=\"pull-left\">
                                <span data-connection=\"connected\" class=\"text-secondary\">
                                    <i class=\"fa fa-circle text-success\"></i> ";
        // line 104
        echo (isset($context["text_active"]) ? $context["text_active"] : null);
        echo "
                                </span>
                                <span data-connection=\"disabled\" class=\"text-secondary\">
                                    <i class=\"fa fa-circle text-danger\"></i> ";
        // line 107
        echo (isset($context["text_disabled"]) ? $context["text_disabled"] : null);
        echo "
                                </span>
                            </small>
                            <small class=\"pull-right\">
                                <a href=\"";
        // line 111
        echo (isset($context["disconnect"]) ? $context["disconnect"] : null);
        echo "\" id=\"disconnect\" data-loading-text=\"";
        echo (isset($context["text_disconnecting"]) ? $context["text_disconnecting"] : null);
        echo "\" data-are-you-sure=\"";
        echo (isset($context["text_confirm"]) ? $context["text_confirm"] : null);
        echo "\" class=\"card-link text-secondary\">
                                    <i class=\"fa fa-power-off\"></i> ";
        // line 112
        echo (isset($context["button_disconnect"]) ? $context["button_disconnect"] : null);
        echo "
                                </a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"row mt-2\">
                <div class=\"col-md-6 p-3\">
                    <div class=\"card\">
                        <div class=\"iframe-container iframe-container-medium\">
                            <iframe scrolling=\"no\" id=\"quicksetup\" data-src=\"";
        // line 123
        echo (isset($context["quicksetup"]) ? $context["quicksetup"] : null);
        echo "\" scrolling=\"no\"></iframe>
                        </div>
                    </div>
                    <div class=\"card mt-4\">
                        <div class=\"iframe-container iframe-container-medium\">
                            <iframe scrolling=\"no\" id=\"beforeafter\" data-src=\"";
        // line 128
        echo (isset($context["beforeafter"]) ? $context["beforeafter"] : null);
        echo "\" scrolling=\"no\"></iframe>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-6 p-3\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title mb-4\">
                                ";
        // line 136
        echo (isset($context["text_general_settings"]) ? $context["text_general_settings"] : null);
        echo "
                                <a class=\"pull-right text-primary\" href=\"";
        // line 137
        echo (isset($context["help_general_settings"]) ? $context["help_general_settings"] : null);
        echo "\" target=\"_blank\" data-toggle=\"tooltip\" data-original-title=\"";
        echo (isset($context["button_help"]) ? $context["button_help"] : null);
        echo "\"><i class=\"fa fa-question-circle\"></i></a>
                            </h5>
                            <div class=\"form-group row\">
                                <label class=\"col-xs-8 col-form-label\">
                                    ";
        // line 141
        echo (isset($context["entry_extension_status"]) ? $context["entry_extension_status"] : null);
        echo "<br />
                                    <small class=\"text-secondary\">";
        // line 142
        echo (isset($context["help_extension_status"]) ? $context["help_extension_status"] : null);
        echo "</small>
                                </label>
                                <div class=\"col-xs-4 text-right\">
                                    <label class=\"switch\">
                                        <input id=\"select-status\" type=\"checkbox\" name=\"";
        // line 146
        echo (isset($context["field_status"]) ? $context["field_status"] : null);
        echo "\" value=\"1\" ";
        echo ((((isset($context["status"]) ? $context["status"] : null) == "1")) ? ("checked") : (""));
        echo " />
                                        <span class=\"slider round\"></span>
                                    </label>
                                </div>
                            </div>
                            <div class=\"form-group row\">
                                <label class=\"col-6 col-md-8 col-form-label\" for=\"select-warmup\">
                                    ";
        // line 153
        echo (isset($context["entry_warmup"]) ? $context["entry_warmup"] : null);
        echo "<br />
                                    <small class=\"text-secondary\">";
        // line 154
        echo (isset($context["help_warmup"]) ? $context["help_warmup"] : null);
        echo "</small>
                                    <small class=\"text-secondary\"><div id=\"warmup-details\">";
        // line 155
        echo (isset($context["warmup_details"]) ? $context["warmup_details"] : null);
        echo "</div></small>
                                    <div id=\"warmup-data\">
                                        ";
        // line 157
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["excluded_warmup_languages"]) ? $context["excluded_warmup_languages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["excluded_warmup_language"]) {
            // line 158
            echo "                                            <input type=\"hidden\" name=\"excluded_warmup_languages[]\" value=\"";
            echo $context["excluded_warmup_language"];
            echo "\" />
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['excluded_warmup_language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 160
        echo "
                                        ";
        // line 161
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["excluded_warmup_currencies"]) ? $context["excluded_warmup_currencies"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["excluded_warmup_currency"]) {
            // line 162
            echo "                                            <input type=\"hidden\" name=\"excluded_warmup_currencies[]\" value=\"";
            echo $context["excluded_warmup_currency"];
            echo "\" />
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['excluded_warmup_currency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 164
        echo "
                                        ";
        // line 165
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["included_warmup_routes"]) ? $context["included_warmup_routes"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["included_warmup_route"]) {
            // line 166
            echo "                                            <input type=\"hidden\" name=\"included_warmup_routes[]\" value=\"";
            echo $context["included_warmup_route"];
            echo "\" />
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['included_warmup_route'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 168
        echo "
                                        ";
        // line 169
        if ((isset($context["product_categories_warmup"]) ? $context["product_categories_warmup"] : null)) {
            // line 170
            echo "                                            <input type=\"hidden\" name=\"product_categories_warmup\" value=\"1\" />
                                        ";
        }
        // line 172
        echo "                                    </div>
                                </label>
                                <div class=\"col-6 col-md-4 text-right\">
                                    <button id=\"button-configure-warmup\" data-toggle=\"tooltip\" data-original-title=\"";
        // line 175
        echo (isset($context["button_configure_warmup"]) ? $context["button_configure_warmup"] : null);
        echo "\" class=\"btn btn-md btn-light btn-outline-secondary\"><i class=\"fa fa-gear\"></i></button>

                                    <label class=\"switch\">
                                        <input type=\"checkbox\" name=\"warmup\" value=\"1\" ";
        // line 178
        echo (((isset($context["warmup"]) ? $context["warmup"] : null)) ? ("checked") : (""));
        echo " />
                                        <span class=\"slider round\"></span>
                                    </label>
                                </div>
                            </div>
                            <div class=\"form-group row\">
                                <label class=\"col-xs-8 col-form-label\" for=\"select-allow-cart\">
                                    ";
        // line 185
        echo (isset($context["entry_allow_cart"]) ? $context["entry_allow_cart"] : null);
        echo "<br />
                                    <small class=\"text-secondary\">";
        // line 186
        echo (isset($context["help_allow_cart"]) ? $context["help_allow_cart"] : null);
        echo "</small>
                                </label>
                                <div class=\"col-xs-4 text-right\">
                                    <label class=\"switch\">
                                        <input type=\"checkbox\" name=\"allow_cart\" value=\"1\" ";
        // line 190
        echo (((isset($context["allow_cart"]) ? $context["allow_cart"] : null)) ? ("checked") : (""));
        echo " />
                                        <span class=\"slider round\"></span>
                                    </label>
                                </div>
                            </div>
                            <div class=\"form-group row\">
                                <label class=\"col-xs-8 col-form-label\" for=\"select-compression\">
                                    ";
        // line 197
        echo (isset($context["entry_compression"]) ? $context["entry_compression"] : null);
        echo "<br />
                                    <small class=\"text-secondary\">";
        // line 198
        echo (isset($context["help_compression"]) ? $context["help_compression"] : null);
        echo "</small>
                                </label>
                                <div class=\"col-xs-4 text-right\">
                                    <label class=\"switch\">
                                        <input type=\"checkbox\" name=\"compression\" value=\"1\" ";
        // line 202
        echo (((isset($context["compression"]) ? $context["compression"] : null)) ? ("checked") : (""));
        echo " />
                                        <span class=\"slider round\"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"card-footer\">
                            <small class=\"pull-right\">
                                <a href=\"#\" id=\"open-cron\" class=\"card-link text-secondary\">
                                    <i class=\"fa fa-clock-o\"></i> ";
        // line 211
        echo (isset($context["button_cron"]) ? $context["button_cron"] : null);
        echo "
                                </a>
                                <a href=\"";
        // line 213
        echo (isset($context["debug_log"]) ? $context["debug_log"] : null);
        echo "\" class=\"card-link text-secondary\">
                                    <i class=\"fa fa-download\"></i> ";
        // line 214
        echo (isset($context["button_debug_log"]) ? $context["button_debug_log"] : null);
        echo "
                                </a>
                                <a href=\"";
        // line 216
        echo (isset($context["error_log"]) ? $context["error_log"] : null);
        echo "\" class=\"card-link text-secondary\">
                                    <i class=\"fa fa-download\"></i> ";
        // line 217
        echo (isset($context["button_error_log"]) ? $context["button_error_log"] : null);
        echo "
                                </a>
                            </small>
                        </div>
                    </div>
                    <div class=\"card mt-4\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">
                                ";
        // line 225
        echo (isset($context["text_included"]) ? $context["text_included"] : null);
        echo "
                                <a class=\"pull-right text-primary\" href=\"";
        // line 226
        echo (isset($context["help_page_types"]) ? $context["help_page_types"] : null);
        echo "\" target=\"_blank\" data-toggle=\"tooltip\" data-original-title=\"";
        echo (isset($context["button_help"]) ? $context["button_help"] : null);
        echo "\"><i class=\"fa fa-question-circle\"></i></a>
                            </h5>
                            <table class=\"table table-hover mt-4\">
                                <thead>
                                    <tr>
                                        <td colspan=\"4\">
                                            ";
        // line 232
        echo (isset($context["entry_standard_pages"]) ? $context["entry_standard_pages"] : null);
        echo "
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    ";
        // line 237
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["standard_pages"]) ? $context["standard_pages"] : null));
        foreach ($context['_seq'] as $context["i"] => $context["page"]) {
            // line 238
            echo "                                    <tr data-standard-page-route=\"";
            echo $this->getAttribute($context["page"], "route", array());
            echo "\">
                                        <td>
                                            ";
            // line 240
            echo $this->getAttribute($context["page"], "name", array());
            echo "
                                        </td>
                                        <td class=\"text-muted hidden-xs word-break\">
                                            ";
            // line 243
            echo $this->getAttribute($context["page"], "route", array());
            echo "
                                        </td>
                                        <td class=\"text-right button-clear-td\">
                                            <button class=\"btn btn-warning btn-sm\" data-toggle=\"tooltip\" data-original-title=\"";
            // line 246
            echo (isset($context["button_invalidate"]) ? $context["button_invalidate"] : null);
            echo "\" data-button-clear=\"invalidate\" data-button-clear-action=\"&invalidate_type=route&invalidate_value=";
            echo $this->getAttribute($context["page"], "route", array());
            echo "\" data-are-you-sure=\"";
            echo (isset($context["text_confirm_invalidate"]) ? $context["text_confirm_invalidate"] : null);
            echo "\"><i class=\"fa fa-recycle\"></i></button>

                                            <button class=\"btn btn-danger btn-sm\" data-toggle=\"tooltip\" data-original-title=\"";
            // line 248
            echo (isset($context["button_purge"]) ? $context["button_purge"] : null);
            echo "\" data-button-clear=\"purge\" data-button-clear-action=\"&purge_type=route&purge_value=";
            echo $this->getAttribute($context["page"], "route", array());
            echo "\" data-are-you-sure=\"";
            echo (isset($context["text_confirm_purge"]) ? $context["text_confirm_purge"] : null);
            echo "\"><i class=\"fa fa-recycle\"></i></button>
                                        </td>
                                        <td class=\"text-right\">
                                            <label class=\"switch\">
                                                <input type=\"checkbox\" name=\"standard_page[";
            // line 252
            echo $this->getAttribute($context["page"], "key", array());
            echo "]\" ";
            echo (($this->getAttribute($context["page"], "status", array())) ? ("checked") : (""));
            echo " />
                                                <span class=\"slider round\"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 258
        echo "                                </tbody>
                                <thead>
                                    <tr>
                                        <td colspan=\"4\">
                                            ";
        // line 262
        echo (isset($context["entry_custom_pages"]) ? $context["entry_custom_pages"] : null);
        echo "
                                        </td>
                                    </tr>
                                </thead>
                                <tbody id=\"custom-pages\">
                                    ";
        // line 267
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["custom_pages"]) ? $context["custom_pages"] : null));
        foreach ($context['_seq'] as $context["i"] => $context["page"]) {
            // line 268
            echo "                                    <tr data-custom-page-i=\"";
            echo $context["i"];
            echo "\">
                                        <td>
                                            ";
            // line 270
            echo $this->getAttribute($context["page"], "name", array());
            echo "
                                        </td>
                                        <td class=\"text-muted hidden-xs word-break\">
                                            ";
            // line 273
            echo $this->getAttribute($context["page"], "route", array());
            echo "
                                        </td>
                                        <td class=\"text-right button-clear-td\">
                                            <input type=\"hidden\" name=\"custom_page[";
            // line 276
            echo $context["i"];
            echo "][name]\" value=\"";
            echo $this->getAttribute($context["page"], "name", array());
            echo "\" />
                                            <input type=\"hidden\" name=\"custom_page[";
            // line 277
            echo $context["i"];
            echo "][route]\" value=\"";
            echo $this->getAttribute($context["page"], "route", array());
            echo "\" />

                                            <button data-toggle=\"tooltip\" data-original-title=\"";
            // line 279
            echo (isset($context["button_delete_custom_page"]) ? $context["button_delete_custom_page"] : null);
            echo "\" class=\"btn btn-light btn-sm delete-custom-page\" data-are-you-sure=\"";
            echo (isset($context["text_confirm_custom_page"]) ? $context["text_confirm_custom_page"] : null);
            echo "\"><i class=\"fa fa-times\"></i></button>

                                            <button class=\"btn btn-warning btn-sm\" data-toggle=\"tooltip\" data-original-title=\"";
            // line 281
            echo (isset($context["button_invalidate"]) ? $context["button_invalidate"] : null);
            echo "\" data-button-clear=\"invalidate\" data-button-clear-action=\"&invalidate_type=route&invalidate_value=";
            echo $this->getAttribute($context["page"], "route", array());
            echo "\" data-are-you-sure=\"";
            echo (isset($context["text_confirm_invalidate"]) ? $context["text_confirm_invalidate"] : null);
            echo "\"><i class=\"fa fa-recycle\"></i></button>

                                            <button class=\"btn btn-danger btn-sm\" data-toggle=\"tooltip\" data-original-title=\"";
            // line 283
            echo (isset($context["button_purge"]) ? $context["button_purge"] : null);
            echo "\" data-button-clear=\"purge\" data-button-clear-action=\"&purge_type=route&purge_value=";
            echo $this->getAttribute($context["page"], "route", array());
            echo "\" data-are-you-sure=\"";
            echo (isset($context["text_confirm_purge"]) ? $context["text_confirm_purge"] : null);
            echo "\"><i class=\"fa fa-recycle\"></i></button>
                                        </td>
                                        <td class=\"text-right\">
                                            <label class=\"switch\">
                                                <input type=\"checkbox\" name=\"custom_page[";
            // line 287
            echo $context["i"];
            echo "][status]\" ";
            echo (($this->getAttribute($context["page"], "status", array())) ? ("checked") : (""));
            echo " />
                                                <span class=\"slider round\"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 293
        echo "                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan=\"4\" class=\"text-right\">
                                        <button id=\"add-custom-page\" class=\"btn btn-light btn-outline-secondary\"><i class=\"fa fa-plus\"></i> ";
        // line 297
        echo (isset($context["button_add_custom_page"]) ? $context["button_add_custom_page"] : null);
        echo "</button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class=\"card mt-4\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">
                                ";
        // line 307
        echo (isset($context["text_auto_cache_clear"]) ? $context["text_auto_cache_clear"] : null);
        echo "
                                <a class=\"pull-right text-primary\" href=\"";
        // line 308
        echo (isset($context["help_auto_cache_clear"]) ? $context["help_auto_cache_clear"] : null);
        echo "\" target=\"_blank\" data-toggle=\"tooltip\" data-original-title=\"";
        echo (isset($context["button_help"]) ? $context["button_help"] : null);
        echo "\"><i class=\"fa fa-question-circle\"></i></a>
                            </h5>
                            <div class=\"alert alert-light bg-light\">
                                ";
        // line 311
        echo (isset($context["info_auto_cache_clear"]) ? $context["info_auto_cache_clear"] : null);
        echo "
                            </div>
                            <div class=\"form-group row\">
                                <label class=\"col-xs-8 col-form-label\" for=\"select-warmup\">
                                    ";
        // line 315
        echo (isset($context["entry_auto_cache_clear_admin_product"]) ? $context["entry_auto_cache_clear_admin_product"] : null);
        echo "<br />
                                    <small class=\"text-secondary\">";
        // line 316
        echo (isset($context["help_auto_cache_clear_admin_product"]) ? $context["help_auto_cache_clear_admin_product"] : null);
        echo "</small>
                                </label>
                                <div class=\"col-xs-4 text-right\">
                                    <label class=\"switch\">
                                        <input type=\"checkbox\" name=\"auto_cache_clear_admin_product\" value=\"1\" ";
        // line 320
        echo (((isset($context["auto_cache_clear_admin_product"]) ? $context["auto_cache_clear_admin_product"] : null)) ? ("checked") : (""));
        echo " />
                                        <span class=\"slider round\"></span>
                                    </label>
                                </div>
                            </div>
                            <div class=\"form-group row\">
                                <label class=\"col-xs-8 col-form-label\" for=\"select-warmup\">
                                    ";
        // line 327
        echo (isset($context["entry_auto_cache_clear_admin_category"]) ? $context["entry_auto_cache_clear_admin_category"] : null);
        echo "<br />
                                    <small class=\"text-secondary\">";
        // line 328
        echo (isset($context["help_auto_cache_clear_admin_category"]) ? $context["help_auto_cache_clear_admin_category"] : null);
        echo "</small>
                                </label>
                                <div class=\"col-xs-4 text-right\">
                                    <label class=\"switch\">
                                        <input type=\"checkbox\" name=\"auto_cache_clear_admin_category\" value=\"1\" ";
        // line 332
        echo (((isset($context["auto_cache_clear_admin_category"]) ? $context["auto_cache_clear_admin_category"] : null)) ? ("checked") : (""));
        echo " />
                                        <span class=\"slider round\"></span>
                                    </label>
                                </div>
                            </div>
                            <div class=\"form-group row\">
                                <label class=\"col-xs-8 col-form-label\" for=\"select-warmup\">
                                    ";
        // line 339
        echo (isset($context["entry_auto_cache_clear_admin_information"]) ? $context["entry_auto_cache_clear_admin_information"] : null);
        echo "<br />
                                    <small class=\"text-secondary\">";
        // line 340
        echo (isset($context["help_auto_cache_clear_admin_information"]) ? $context["help_auto_cache_clear_admin_information"] : null);
        echo "</small>
                                </label>
                                <div class=\"col-xs-4 text-right\">
                                    <label class=\"switch\">
                                        <input type=\"checkbox\" name=\"auto_cache_clear_admin_information\" value=\"1\" ";
        // line 344
        echo (((isset($context["auto_cache_clear_admin_information"]) ? $context["auto_cache_clear_admin_information"] : null)) ? ("checked") : (""));
        echo " />
                                        <span class=\"slider round\"></span>
                                    </label>
                                </div>
                            </div>
                            <div class=\"form-group row\">
                                <label class=\"col-xs-8 col-form-label\" for=\"select-warmup\">
                                    ";
        // line 351
        echo (isset($context["entry_auto_cache_clear_admin_manufacturer"]) ? $context["entry_auto_cache_clear_admin_manufacturer"] : null);
        echo "<br />
                                    <small class=\"text-secondary\">";
        // line 352
        echo (isset($context["help_auto_cache_clear_admin_manufacturer"]) ? $context["help_auto_cache_clear_admin_manufacturer"] : null);
        echo "</small>
                                </label>
                                <div class=\"col-xs-4 text-right\">
                                    <label class=\"switch\">
                                        <input type=\"checkbox\" name=\"auto_cache_clear_admin_manufacturer\" value=\"1\" ";
        // line 356
        echo (((isset($context["auto_cache_clear_admin_manufacturer"]) ? $context["auto_cache_clear_admin_manufacturer"] : null)) ? ("checked") : (""));
        echo " />
                                        <span class=\"slider round\"></span>
                                    </label>
                                </div>
                            </div>
                            <div class=\"form-group row\">
                                <label class=\"col-xs-8 col-form-label\" for=\"select-warmup\">
                                    ";
        // line 363
        echo (isset($context["entry_auto_cache_clear_admin_review"]) ? $context["entry_auto_cache_clear_admin_review"] : null);
        echo "<br />
                                    <small class=\"text-secondary\">";
        // line 364
        echo (isset($context["help_auto_cache_clear_admin_review"]) ? $context["help_auto_cache_clear_admin_review"] : null);
        echo "</small>
                                </label>
                                <div class=\"col-xs-4 text-right\">
                                    <label class=\"switch\">
                                        <input type=\"checkbox\" name=\"auto_cache_clear_admin_review\" value=\"1\" ";
        // line 368
        echo (((isset($context["auto_cache_clear_admin_review"]) ? $context["auto_cache_clear_admin_review"] : null)) ? ("checked") : (""));
        echo " />
                                        <span class=\"slider round\"></span>
                                    </label>
                                </div>
                            </div>
                            <div class=\"form-group row\">
                                <label class=\"col-xs-8 col-form-label\" for=\"select-warmup\">
                                    ";
        // line 375
        echo (isset($context["entry_auto_cache_clear_order"]) ? $context["entry_auto_cache_clear_order"] : null);
        echo "<br />
                                    <small class=\"text-secondary\">";
        // line 376
        echo (isset($context["help_auto_cache_clear_order"]) ? $context["help_auto_cache_clear_order"] : null);
        echo "</small>
                                </label>
                                <div class=\"col-xs-4 text-right\">
                                    <label class=\"switch\">
                                        <input type=\"checkbox\" name=\"auto_cache_clear_order\" value=\"1\" ";
        // line 380
        echo (((isset($context["auto_cache_clear_order"]) ? $context["auto_cache_clear_order"] : null)) ? ("checked") : (""));
        echo " />
                                        <span class=\"slider round\"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class=\"fb-chat\" data-toggle=\"tooltip\" title=\"";
        // line 391
        echo (isset($context["button_chat"]) ? $context["button_chat"] : null);
        echo "\">
        <a href=\"";
        // line 392
        echo (isset($context["messenger"]) ? $context["messenger"] : null);
        echo "\" target=\"_blank\">
            <svg width=\"60px\" height=\"60px\" viewBox=\"0 0 60 60\">
                <svg x=\"0\" y=\"0\" width=\"60px\" height=\"60px\">
                    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                        <g>
                            <circle fill=\"#007bff\" cx=\"30\" cy=\"30\" r=\"30\"></circle>
                            <svg x=\"10\" y=\"10\">
                                <g transform=\"translate(0.000000, -10.000000)\" fill=\"#FFFFFF\">
                                    <g id=\"logo\" transform=\"translate(0.000000, 10.000000)\">
                                        <path fill=\"#fff\" d=\"M20,0 C31.2666,0 40,8.2528 40,19.4 C40,30.5472 31.2666,38.8 20,38.8 C17.9763,38.8 16.0348,38.5327 14.2106,38.0311 C13.856,37.9335 13.4789,37.9612 13.1424,38.1098 L9.1727,39.8621 C8.1343,40.3205 6.9621,39.5819 6.9273,38.4474 L6.8184,34.8894 C6.805,34.4513 6.6078,34.0414 6.2811,33.7492 C2.3896,30.2691 0,25.2307 0,19.4 C0,8.2528 8.7334,0 20,0 Z M7.99009,25.07344 C7.42629,25.96794 8.52579,26.97594 9.36809,26.33674 L15.67879,21.54734 C16.10569,21.22334 16.69559,21.22164 17.12429,21.54314 L21.79709,25.04774 C23.19919,26.09944 25.20039,25.73014 26.13499,24.24744 L32.00999,14.92654 C32.57369,14.03204 31.47419,13.02404 30.63189,13.66324 L24.32119,18.45264 C23.89429,18.77664 23.30439,18.77834 22.87569,18.45674 L18.20299,14.95224 C16.80079,13.90064 14.79959,14.26984 13.86509,15.75264 L7.99009,25.07344 Z\"></path>
                                    </g>
                                </g>
                            </svg>
                        </g>
                    </g>
                </svg>
            </svg>
        </a>
    </div>
</div>
<script id=\"template-nitropack-notification-success\" type=\"text/template\">
<div id=\"nitropack-notification\" data-type=\"success\">
    <div class=\"alert alert-success\" id=\"nitropack-notification-message\">{message}</div>
</div>
</script>
<script id=\"template-nitropack-notification-danger\" type=\"text/template\">
<div id=\"nitropack-notification\" data-type=\"danger\">
    <div class=\"alert alert-danger\" id=\"nitropack-notification-message\">{message}</div>
</div>
</script>
<script id=\"template-nitropack-notification-warning\" type=\"text/template\">
<div id=\"nitropack-notification\" data-type=\"warning\">
    <div class=\"alert alert-warning\" id=\"nitropack-notification-message\">{message}</div>
</div>
</script>
<script id=\"template-nitropack-notification-info\" type=\"text/template\">
<div id=\"nitropack-notification\" data-type=\"info\">
    <div class=\"alert alert-info\" id=\"nitropack-notification-message\">{message}</div>
</div>
</script>
<script id=\"template-custom-page\" type=\"text/template\">
<tr data-custom-page-i=\"{i}\">
    <td>
        {name}
    </td>
    <td class=\"text-muted hidden-xs word-break\">
        {route}
    </td>
    <td class=\"text-right button-clear-td\">
        <input type=\"hidden\" name=\"custom_page[{i}][name]\" value=\"{name_escaped}\" />
        <input type=\"hidden\" name=\"custom_page[{i}][route]\" value=\"{route}\" />

        <button data-toggle=\"tooltip\" data-original-title=\"";
        // line 444
        echo (isset($context["button_delete_custom_page"]) ? $context["button_delete_custom_page"] : null);
        echo "\" class=\"btn btn-light btn-sm delete-custom-page\" data-are-you-sure=\"";
        echo (isset($context["text_confirm_custom_page"]) ? $context["text_confirm_custom_page"] : null);
        echo "\"><i class=\"fa fa-times\"></i></button>

        <button class=\"btn btn-warning btn-sm\" data-toggle=\"tooltip\" data-original-title=\"";
        // line 446
        echo (isset($context["button_invalidate"]) ? $context["button_invalidate"] : null);
        echo "\" data-button-clear=\"invalidate\" data-button-clear-action=\"&invalidate_type=route&invalidate_value={route}\" data-are-you-sure=\"";
        echo (isset($context["text_confirm_invalidate"]) ? $context["text_confirm_invalidate"] : null);
        echo "\"><i class=\"fa fa-recycle\"></i></button>

        <button class=\"btn btn-danger btn-sm\" data-toggle=\"tooltip\" data-original-title=\"";
        // line 448
        echo (isset($context["button_purge"]) ? $context["button_purge"] : null);
        echo "\" data-button-clear=\"purge\" data-button-clear-action=\"&purge_type=route&purge_value={route}\" data-are-you-sure=\"";
        echo (isset($context["text_confirm_purge"]) ? $context["text_confirm_purge"] : null);
        echo "\"><i class=\"fa fa-recycle\"></i></button>
    </td>
    <td class=\"text-right\">
        <label class=\"switch\">
            <input type=\"checkbox\" name=\"custom_page[{i}][status]\" value=\"1\" checked />
            <span class=\"slider round\"></span>
        </label>
    </td>
</tr>
</script>
<script id=\"template-modal-custom-page\" type=\"text/template\">
<div class=\"nitro modal fade modal-removable\" tabindex=\"-1\" role=\"dialog\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">";
        // line 463
        echo (isset($context["text_add_custom_page"]) ? $context["text_add_custom_page"] : null);
        echo "</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><i class=\"fa fa-close\"></i></button>
            </div>
            <div class=\"modal-body\">
                <form id=\"custom-page\">
                    <div class=\"form-group required\">
                        <label for=\"input-custom-page-name\">";
        // line 469
        echo (isset($context["entry_custom_page_name"]) ? $context["entry_custom_page_name"] : null);
        echo "</label>
                        <div>
                            <input type=\"text\" name=\"custom_page_name\" value=\"\" placeholder=\"";
        // line 471
        echo (isset($context["placeholder_custom_page_name"]) ? $context["placeholder_custom_page_name"] : null);
        echo "\" id=\"input-custom-page-name\" class=\"form-control\" autocomplete=\"new-password\" />
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"select-custom-page-route\">";
        // line 475
        echo (isset($context["entry_custom_page_route"]) ? $context["entry_custom_page_route"] : null);
        echo "</label>
                        <div>
                            <select id=\"select-custom-page-route\" name=\"custom_page_route\" class=\"form-control\">
                                ";
        // line 478
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["all_pages"]) ? $context["all_pages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 479
            echo "                                <option value=\"";
            echo $context["page"];
            echo "\">";
            echo $context["page"];
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 481
        echo "                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-light btn-outline-secondary\" data-dismiss=\"modal\">";
        // line 487
        echo (isset($context["button_close"]) ? $context["button_close"] : null);
        echo "</button>
                <button disabled type=\"button\" class=\"btn btn-primary\" id=\"save-custom-page\">";
        // line 488
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "</button>
            </div>
        </div>
    </div>
</div>
</script>
<script id=\"template-modal-warmup-disable-confirm\" type=\"text/template\">
<div id=\"modal-warmup-disable-confirm\" class=\"nitro modal fade modal-removable\" tabindex=\"-1\" role=\"dialog\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">";
        // line 499
        echo (isset($context["text_configure_warmup"]) ? $context["text_configure_warmup"] : null);
        echo "</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><i class=\"fa fa-close\"></i></button>
            </div>
            <div class=\"modal-body\">
                <p><i class=\"fa fa-exclamation-triangle text-warning\"></i> ";
        // line 503
        echo (isset($context["text_warmup_disable_confirm"]) ? $context["text_warmup_disable_confirm"] : null);
        echo "</p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-light btn-outline-secondary\" data-dismiss=\"modal\">";
        // line 506
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "</button>
                <button type=\"button\" class=\"btn btn-primary\" id=\"open-warmup-settings\">";
        // line 507
        echo (isset($context["button_disable_warmup_continue"]) ? $context["button_disable_warmup_continue"] : null);
        echo "</button>
            </div>
        </div>
    </div>
</div>
</script>
<script id=\"template-modal-warmup\" type=\"text/template\">
<div id=\"modal-warmup\" class=\"nitro modal fade modal-removable\" tabindex=\"-1\" role=\"dialog\" data-warmup-form=\"";
        // line 514
        echo (isset($context["warmup_form"]) ? $context["warmup_form"] : null);
        echo "\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">";
        // line 518
        echo (isset($context["text_configure_warmup"]) ? $context["text_configure_warmup"] : null);
        echo "</h5>
                <a class=\"text-primary close\" href=\"";
        // line 519
        echo (isset($context["help_warmup"]) ? $context["help_warmup"] : null);
        echo "\" target=\"_blank\"><i class=\"fa fa-question-circle\"></i></a>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><i class=\"fa fa-close\"></i></button>
            </div>
            <div class=\"modal-body\">
                <div class=\"alert alert-info text-center\"><i class=\"fa fa-spinner fa-spin\"></i> ";
        // line 523
        echo (isset($context["text_loading_warmup"]) ? $context["text_loading_warmup"] : null);
        echo "</div>
            </div>
            <div id=\"warmup-estimate-loading\" class=\"modal-footer modal-footer-left warmup-estimate-modal-container\" style=\"display: none;\">
                <div class=\"alert alert-warning\"><i class=\"fa fa-spinner fa-spin\"></i> ";
        // line 526
        echo (isset($context["text_warmup_estimate_loading"]) ? $context["text_warmup_estimate_loading"] : null);
        echo "</div>
            </div>
            <div id=\"warmup-estimate-error\" class=\"modal-footer modal-footer-left warmup-estimate-modal-container\" style=\"display: none;\">
                <div id=\"warmup-estimate-error-message\" class=\"alert alert-danger\"></div>
            </div>
            <div id=\"warmup-estimate-result\" class=\"modal-footer modal-footer-left warmup-estimate-modal-container\" style=\"display: none;\" data-warmup-estimate-result-text=\"";
        // line 531
        echo (isset($context["text_warmup_estimate_result"]) ? $context["text_warmup_estimate_result"] : null);
        echo "\">
                <div id=\"warmup-estimate-result-message\" class=\"alert alert-warning\"></div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-light btn-outline-secondary\" data-dismiss=\"modal\">";
        // line 535
        echo (isset($context["button_close"]) ? $context["button_close"] : null);
        echo "</button>
                <button disabled type=\"button\" class=\"btn btn-primary\" id=\"close-enable-warmup\">";
        // line 536
        echo (isset($context["button_close_enable_warmup"]) ? $context["button_close_enable_warmup"] : null);
        echo "</button>
            </div>
        </div>
    </div>
</div>
</script>
<script id=\"template-modal-warmup-stats\" type=\"text/template\">
<div id=\"modal-warmup-stats\" class=\"nitro modal fade modal-removable\" tabindex=\"-1\" role=\"dialog\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">";
        // line 547
        echo (isset($context["text_warmup_stats"]) ? $context["text_warmup_stats"] : null);
        echo "</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><i class=\"fa fa-close\"></i></button>
            </div>
            <div class=\"modal-body\">
                <div class=\"alert alert-info text-center\"><i class=\"fa fa-spinner fa-spin\"></i> ";
        // line 551
        echo (isset($context["text_loading_warmup_stats"]) ? $context["text_loading_warmup_stats"] : null);
        echo "</div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-light btn-outline-secondary\" data-dismiss=\"modal\">";
        // line 554
        echo (isset($context["button_close"]) ? $context["button_close"] : null);
        echo "</button>
            </div>
        </div>
    </div>
</div>
</script>
<script id=\"template-modal-warmup-detail\" type=\"text/template\">
    <div class=\"row mb-2\">
        <div class=\"col-xs-6\">
            {key}
        </div>
        <div class=\"col-xs-6 text-right\">
            {value}
        </div>
    </div>
</script>
<script id=\"template-update-check-flash\" type=\"text/template\">
    <div class=\"alert alert-info d-flex justify-content-between lh-2\">
        <div>{message}</div>
        <div><button class=\"btn btn-primary btn-sm\" id=\"button-modal-update\">";
        // line 573
        echo (isset($context["button_update_check_get_it"]) ? $context["button_update_check_get_it"] : null);
        echo "</button></div>
    </div>
</script>
<script id=\"template-modal-update\" type=\"text/template\">
<div id=\"modal-update\" class=\"nitro modal fade modal-removable\" tabindex=\"-1\" role=\"dialog\">
    <div class=\"modal-dialog modal-lg\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">{title}</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><i class=\"fa fa-close\"></i></button>
            </div>
            ";
        // line 584
        if ((isset($context["non_installed_modifications"]) ? $context["non_installed_modifications"] : null)) {
            // line 585
            echo "                <div class=\"modal-body\">
                    <div class=\"alert alert-warning lh-2\">
                        <div>";
            // line 587
            echo (isset($context["text_non_installed_modifications"]) ? $context["text_non_installed_modifications"] : null);
            echo "</div>
                        <hr />
                        <ul>
                            ";
            // line 590
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["non_installed_modifications"]) ? $context["non_installed_modifications"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["non_installed_modification"]) {
                // line 591
                echo "                                <li>";
                echo $context["non_installed_modification"];
                echo "</li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['non_installed_modification'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 593
            echo "                        </ul>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <a id=\"modifications-refresh\" href=\"";
            // line 597
            echo (isset($context["modifications_refresh"]) ? $context["modifications_refresh"] : null);
            echo "\" class=\"btn btn-primary btn-sm\">";
            echo (isset($context["button_update_check_refresh_now"]) ? $context["button_update_check_refresh_now"] : null);
            echo "</a>
                </div>
            ";
        } else {
            // line 600
            echo "                <div class=\"modal-body\">
                    <h3>";
            // line 601
            echo (isset($context["text_release_notes"]) ? $context["text_release_notes"] : null);
            echo "</h3>
                    {body}
                </div>
                <div id=\"modal-update-steps\" class=\"modal-footer text-left d-none\">
                    <h3>";
            // line 605
            echo (isset($context["text_update_progress"]) ? $context["text_update_progress"] : null);
            echo "</h3>
                    <div id=\"progress-lines\" class=\"well\"></div>
                    <div id=\"modal-update-progress\" class=\"progress w-100 d-block\">
                        <div class=\"progress-bar\" role=\"progressbar\"></div>
                    </div>
                </div>
                <div id=\"modal-update-setup\" class=\"modal-footer text-left d-none\">
                    ";
            // line 612
            if ((isset($context["has_modification_permissions"]) ? $context["has_modification_permissions"] : null)) {
                // line 613
                echo "                        <div class=\"w-100 alert alert-info\">
                            ";
                // line 614
                echo (isset($context["text_refresh_modifications"]) ? $context["text_refresh_modifications"] : null);
                echo "
                        </div>
                    ";
            } else {
                // line 617
                echo "                        <div class=\"w-100 alert alert-warning\">
                            <i class=\"fa fa-exclamation-triangle\"></i> ";
                // line 618
                echo (isset($context["text_refresh_modifications_no_permissions"]) ? $context["text_refresh_modifications_no_permissions"] : null);
                echo "
                        </div>
                    ";
            }
            // line 621
            echo "                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-light d-none\" id=\"modal-update-abort\">";
            // line 623
            echo (isset($context["button_abort"]) ? $context["button_abort"] : null);
            echo "</button>
                    <button type=\"button\" class=\"btn btn-primary\" id=\"modal-update-start\">";
            // line 624
            echo (isset($context["button_update"]) ? $context["button_update"] : null);
            echo "</button>
                </div>
            ";
        }
        // line 627
        echo "        </div>
    </div>
</div>
</script>
<script id=\"template-update-check-progress\" type=\"text/template\">
    <div class=\"w-100 d-flex justify-content-between\">
        <div><i class=\"fa fa-arrow-right\"></i> {message}</div>
        <div class=\"update-progress\">
            <small class=\"text-secondary\">
                <i class=\"fa fa-spin fa-circle-o-notch\"></i> ";
        // line 636
        echo (isset($context["text_working"]) ? $context["text_working"] : null);
        echo "
            </small>
        </div>
    </div>
</script>
<script id=\"template-update-check-error\" type=\"text/template\">
    <div id=\"update-check-error-container\" class=\"alert alert-danger mt-2\">
        <i class=\"fa fa-exclamation-triangle\"></i> {message}
    </div>
</script>
<script id=\"template-update-check-badge-ok\" type=\"text/template\">
    <span class=\"badge badge-success\">";
        // line 647
        echo (isset($context["text_ok"]) ? $context["text_ok"] : null);
        echo "</span>
</script>
<script id=\"template-update-check-badge-error\" type=\"text/template\">
    <span class=\"badge badge-danger\">";
        // line 650
        echo (isset($context["text_error"]) ? $context["text_error"] : null);
        echo "</span>
</script>
<script id=\"template-update-check-badge-aborted\" type=\"text/template\">
    <span class=\"badge badge-warning\">";
        // line 653
        echo (isset($context["text_aborted"]) ? $context["text_aborted"] : null);
        echo "</span>
</script>
<script id=\"template-modal-cron\" type=\"text/template\">
<div id=\"modal-cron\" class=\"nitro modal fade modal-removable\" tabindex=\"-1\" role=\"dialog\">
    <div class=\"modal-dialog modal-lg\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">";
        // line 660
        echo (isset($context["text_title_cron"]) ? $context["text_title_cron"] : null);
        echo "</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><i class=\"fa fa-close\"></i></button>
            </div>

            <div class=\"modal-body\">
                ";
        // line 665
        if ((isset($context["cron_warning"]) ? $context["cron_warning"] : null)) {
            // line 666
            echo "                <div class=\"alert alert-danger\">
                    ";
            // line 667
            echo (isset($context["text_cron_warning"]) ? $context["text_cron_warning"] : null);
            echo "
                </div>
                ";
        }
        // line 670
        echo "
                ";
        // line 671
        echo (isset($context["text_cron_info"]) ? $context["text_cron_info"] : null);
        echo "
            </div>
        </div>
    </div>
</div>
</script>
";
        // line 677
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "extension/module/nitropack_manage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1338 => 677,  1329 => 671,  1326 => 670,  1320 => 667,  1317 => 666,  1315 => 665,  1307 => 660,  1297 => 653,  1291 => 650,  1285 => 647,  1271 => 636,  1260 => 627,  1254 => 624,  1250 => 623,  1246 => 621,  1240 => 618,  1237 => 617,  1231 => 614,  1228 => 613,  1226 => 612,  1216 => 605,  1209 => 601,  1206 => 600,  1198 => 597,  1192 => 593,  1183 => 591,  1179 => 590,  1173 => 587,  1169 => 585,  1167 => 584,  1153 => 573,  1131 => 554,  1125 => 551,  1118 => 547,  1104 => 536,  1100 => 535,  1093 => 531,  1085 => 526,  1079 => 523,  1072 => 519,  1068 => 518,  1061 => 514,  1051 => 507,  1047 => 506,  1041 => 503,  1034 => 499,  1020 => 488,  1016 => 487,  1008 => 481,  997 => 479,  993 => 478,  987 => 475,  980 => 471,  975 => 469,  966 => 463,  946 => 448,  939 => 446,  932 => 444,  877 => 392,  873 => 391,  859 => 380,  852 => 376,  848 => 375,  838 => 368,  831 => 364,  827 => 363,  817 => 356,  810 => 352,  806 => 351,  796 => 344,  789 => 340,  785 => 339,  775 => 332,  768 => 328,  764 => 327,  754 => 320,  747 => 316,  743 => 315,  736 => 311,  728 => 308,  724 => 307,  711 => 297,  705 => 293,  691 => 287,  680 => 283,  671 => 281,  664 => 279,  657 => 277,  651 => 276,  645 => 273,  639 => 270,  633 => 268,  629 => 267,  621 => 262,  615 => 258,  601 => 252,  590 => 248,  581 => 246,  575 => 243,  569 => 240,  563 => 238,  559 => 237,  551 => 232,  540 => 226,  536 => 225,  525 => 217,  521 => 216,  516 => 214,  512 => 213,  507 => 211,  495 => 202,  488 => 198,  484 => 197,  474 => 190,  467 => 186,  463 => 185,  453 => 178,  447 => 175,  442 => 172,  438 => 170,  436 => 169,  433 => 168,  424 => 166,  420 => 165,  417 => 164,  408 => 162,  404 => 161,  401 => 160,  392 => 158,  388 => 157,  383 => 155,  379 => 154,  375 => 153,  363 => 146,  356 => 142,  352 => 141,  343 => 137,  339 => 136,  328 => 128,  320 => 123,  306 => 112,  298 => 111,  291 => 107,  285 => 104,  269 => 95,  259 => 94,  249 => 93,  243 => 92,  237 => 89,  231 => 86,  224 => 82,  219 => 80,  212 => 76,  207 => 74,  201 => 71,  190 => 63,  170 => 56,  162 => 51,  142 => 50,  138 => 48,  132 => 45,  128 => 43,  125 => 42,  119 => 39,  115 => 37,  112 => 36,  106 => 33,  102 => 31,  100 => 30,  91 => 26,  87 => 24,  74 => 22,  70 => 21,  64 => 18,  56 => 15,  50 => 14,  44 => 11,  40 => 10,  36 => 9,  32 => 8,  23 => 2,  19 => 1,);
    }
}
/* {{ header }}*/
/* {{ column_left }}*/
/* <div id="content" class="nitro">*/
/*     <div class="container-fluid bg-light p-4">*/
/*         <div class="row">*/
/*             <div class="col-12">*/
/*                 <h2 class="pull-left">*/
/*                     <img src="view/image/vendor/nitropackio/logo.png" id="nitropack-logo" alt="{{ heading_title }}" />*/
/*                     <span class="opacity-0-9">{{ text_nitropack }}</span>*/
/*                     <span class="opacity-0-2">{{ text_io }}</span>*/
/*                     <span class="opacity-0-2">&nbsp;<small>{{ version }}</small></span>*/
/*                 </h2>*/
/*                 <div class="pull-right">*/
/*                     <a target="_blank" href="{{ external_settings }}" data-toggle="tooltip" title="{{ button_external_settings }}" class="btn btn-warning d-inline-block"><i class="fa fa-cogs"></i></a>*/
/*                     <a target="_blank" href="{{ documentation }}" data-toggle="tooltip" title="{{ button_documentation }}" class="btn btn-info d-inline-block"><i class="fa fa-question-circle"></i></a>*/
/*                     <div class="dropdown d-inline-block">*/
/*                         <button class="btn btn-secondary dropdown-toggle" type="button" id="store-picker" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">*/
/*                         {{ store['name'] }}*/
/*                         </button>*/
/*                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="store-picker">*/
/*                             {% for store in stores %}*/
/*                                 <a class="dropdown-item {{ store['current'] ? 'active' }}" href="{{ store['admin_href'] }}">{{ store['name'] }}</a>*/
/*                             {% endfor %}*/
/*                         </div>*/
/*                     </div>*/
/*                     <a href="{{ cancel }}" data-toggle="tooltip" title="{{ button_cancel }}" class="btn btn-light btn-outline-secondary d-inline-block"><i class="fa fa-reply"></i></a>*/
/*                 </div>*/
/*             </div>*/
/*             <div class="col-12 mt-3" id="nitropack-flash-container">*/
/*                 {% if error %}*/
/*                     <div class="alert alert-danger">*/
/*                         <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>*/
/*                         <i class="fa fa-exclamation-circle"></i> {{ error }}*/
/*                     </div>*/
/*                 {% endif %}*/
/*                 {% if success %}*/
/*                     <div class="alert alert-success">*/
/*                         <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>*/
/*                         <i class="fa fa-check"></i> {{ success }}*/
/*                     </div>*/
/*                 {% endif %}*/
/*                 {% if warning %}*/
/*                     <div class="alert alert-warning">*/
/*                         <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>*/
/*                         <i class="fa fa-exclamation-triangle"></i> {{ warning }}*/
/*                     </div>*/
/*                 {% endif %}*/
/*             </div>*/
/*         </div>*/
/*         <form method="POST" action="{{ manage }}" enctype="multipart/form-data" id="manage-form" data-text-loading="{{ text_loading_form }}" data-text-logged-out="{{ text_logged_out }}" data-text-connection-lost="{{ text_connection_lost }}" data-url-update-check="{{ update_check }}" data-text-onbeforeunload="{{ text_onbeforeunload }}" data-url-cleanup-stale-cache="{{ cleanup_stale_cache }}" data-url-has-stale-cache="{{ has_stale_cache }}" data-url-default="{{ url_default }}">*/
/*             <input type="hidden" name="local_preset" id="nitropack-local-preset" value="{{ local_preset }}" />*/
/*             <div class="row">*/
/*                 <div class="col-md-4">*/
/*                     <div class="card mt-4">*/
/*                         <div class="iframe-container iframe-container-small">*/
/*                             <iframe scrolling="no" data-text-loading-invalidate-cache="{{ text_loading_invalidate_cache }}" data-text-preset-changed="{{ text_preset_changed }}" data-url-invalidate-cache="{{ invalidate }}" data-text-loading-purge-cache="{{ text_loading_purge_cache }}" data-url-purge-cache="{{ purge }}" id="optimizations" data-src="{{ optimizations }}" scrolling="no"></iframe>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="col-md-4">*/
/*                     <div class="card mt-4">*/
/*                         <div class="iframe-container iframe-container-small">*/
/*                             <iframe scrolling="no" id="plan" data-src="{{ plan }}" scrolling="no"></iframe>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="col-md-4">*/
/*                     <div class="card mt-4">*/
/*                         <div class="card-body">*/
/*                             <h5 class="card-title">*/
/*                             {{ text_service_status }}*/
/*                             </h5>*/
/*                             <div class="form-group">*/
/*                                 <label>{{ field_site_id }}</label>*/
/*                                 <div>*/
/*                                     <span id="site-id">{{ site_id }}</span>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group">*/
/*                                 <label>{{ field_site }}</label>*/
/*                                 <div>*/
/*                                     <span id="site">{{ site }}</span>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group">*/
/*                                 <label>{{ entry_warmup_status }}</label>*/
/*                                 <div>*/
/*                                     <small class="pull-left">*/
/*                                         <span class="warmup-status">{{ warmup_stats.text_warmup_status }}</span>*/
/*                                     </small>*/
/*                                     <span class="pull-right">*/
/*                                         <span id="warmup-buttons" data-warmup-stats-url="{{ warmup_stats_url }}" data-warmup-estimate-url="{{ warmup_estimate_url }}">*/
/*                                             <button {% if warmup_stats.is_warmup_active or not warmup_stats.status or not warmup_stats.is_warmup_enabled %} style="display: none;" {% endif %} data-warmup-button="start" data-warmup-action="{{ warmup_start }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-original-title="{{ text_warmup_start }}"><i class="fa fa-play"></i></button>*/
/*                                             <button {% if warmup_stats.pending == 0 or not warmup_stats.is_warmup_enabled or not warmup_stats.status %} style="display: none;" {% endif %} data-warmup-button="pause" data-warmup-action="{{ warmup_pause }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-original-title="{{ text_warmup_pause }}"><i class="fa fa-pause"></i></button>*/
/*                                             <!--button {% if not warmup or not warmup_stats.status %} style="display: none;" {% endif %} data-warmup-button="info" class="btn btn-sm btn-info" data-toggle="tooltip" data-original-title="{{ text_warmup_stats }}"><i class="fa fa-info-circle"></i></button-->*/
/*                                         </span>*/
/*                                     </span>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                         <div class="card-footer">*/
/*                             <small class="pull-left">*/
/*                                 <span data-connection="connected" class="text-secondary">*/
/*                                     <i class="fa fa-circle text-success"></i> {{ text_active }}*/
/*                                 </span>*/
/*                                 <span data-connection="disabled" class="text-secondary">*/
/*                                     <i class="fa fa-circle text-danger"></i> {{ text_disabled }}*/
/*                                 </span>*/
/*                             </small>*/
/*                             <small class="pull-right">*/
/*                                 <a href="{{ disconnect }}" id="disconnect" data-loading-text="{{ text_disconnecting }}" data-are-you-sure="{{ text_confirm }}" class="card-link text-secondary">*/
/*                                     <i class="fa fa-power-off"></i> {{ button_disconnect }}*/
/*                                 </a>*/
/*                             </small>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*             <div class="row mt-2">*/
/*                 <div class="col-md-6 p-3">*/
/*                     <div class="card">*/
/*                         <div class="iframe-container iframe-container-medium">*/
/*                             <iframe scrolling="no" id="quicksetup" data-src="{{ quicksetup }}" scrolling="no"></iframe>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="card mt-4">*/
/*                         <div class="iframe-container iframe-container-medium">*/
/*                             <iframe scrolling="no" id="beforeafter" data-src="{{ beforeafter }}" scrolling="no"></iframe>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="col-md-6 p-3">*/
/*                     <div class="card">*/
/*                         <div class="card-body">*/
/*                             <h5 class="card-title mb-4">*/
/*                                 {{ text_general_settings }}*/
/*                                 <a class="pull-right text-primary" href="{{ help_general_settings }}" target="_blank" data-toggle="tooltip" data-original-title="{{ button_help }}"><i class="fa fa-question-circle"></i></a>*/
/*                             </h5>*/
/*                             <div class="form-group row">*/
/*                                 <label class="col-xs-8 col-form-label">*/
/*                                     {{ entry_extension_status }}<br />*/
/*                                     <small class="text-secondary">{{ help_extension_status }}</small>*/
/*                                 </label>*/
/*                                 <div class="col-xs-4 text-right">*/
/*                                     <label class="switch">*/
/*                                         <input id="select-status" type="checkbox" name="{{ field_status }}" value="1" {{ status == '1' ? 'checked' }} />*/
/*                                         <span class="slider round"></span>*/
/*                                     </label>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group row">*/
/*                                 <label class="col-6 col-md-8 col-form-label" for="select-warmup">*/
/*                                     {{ entry_warmup }}<br />*/
/*                                     <small class="text-secondary">{{ help_warmup }}</small>*/
/*                                     <small class="text-secondary"><div id="warmup-details">{{ warmup_details }}</div></small>*/
/*                                     <div id="warmup-data">*/
/*                                         {% for excluded_warmup_language in excluded_warmup_languages %}*/
/*                                             <input type="hidden" name="excluded_warmup_languages[]" value="{{ excluded_warmup_language }}" />*/
/*                                         {% endfor %}*/
/* */
/*                                         {% for excluded_warmup_currency in excluded_warmup_currencies %}*/
/*                                             <input type="hidden" name="excluded_warmup_currencies[]" value="{{ excluded_warmup_currency }}" />*/
/*                                         {% endfor %}*/
/* */
/*                                         {% for included_warmup_route in included_warmup_routes %}*/
/*                                             <input type="hidden" name="included_warmup_routes[]" value="{{ included_warmup_route }}" />*/
/*                                         {% endfor %}*/
/* */
/*                                         {% if product_categories_warmup %}*/
/*                                             <input type="hidden" name="product_categories_warmup" value="1" />*/
/*                                         {% endif %}*/
/*                                     </div>*/
/*                                 </label>*/
/*                                 <div class="col-6 col-md-4 text-right">*/
/*                                     <button id="button-configure-warmup" data-toggle="tooltip" data-original-title="{{ button_configure_warmup }}" class="btn btn-md btn-light btn-outline-secondary"><i class="fa fa-gear"></i></button>*/
/* */
/*                                     <label class="switch">*/
/*                                         <input type="checkbox" name="warmup" value="1" {{ warmup ? 'checked' }} />*/
/*                                         <span class="slider round"></span>*/
/*                                     </label>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group row">*/
/*                                 <label class="col-xs-8 col-form-label" for="select-allow-cart">*/
/*                                     {{ entry_allow_cart }}<br />*/
/*                                     <small class="text-secondary">{{ help_allow_cart }}</small>*/
/*                                 </label>*/
/*                                 <div class="col-xs-4 text-right">*/
/*                                     <label class="switch">*/
/*                                         <input type="checkbox" name="allow_cart" value="1" {{ allow_cart ? 'checked' }} />*/
/*                                         <span class="slider round"></span>*/
/*                                     </label>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group row">*/
/*                                 <label class="col-xs-8 col-form-label" for="select-compression">*/
/*                                     {{ entry_compression }}<br />*/
/*                                     <small class="text-secondary">{{ help_compression }}</small>*/
/*                                 </label>*/
/*                                 <div class="col-xs-4 text-right">*/
/*                                     <label class="switch">*/
/*                                         <input type="checkbox" name="compression" value="1" {{ compression ? 'checked' }} />*/
/*                                         <span class="slider round"></span>*/
/*                                     </label>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                         <div class="card-footer">*/
/*                             <small class="pull-right">*/
/*                                 <a href="#" id="open-cron" class="card-link text-secondary">*/
/*                                     <i class="fa fa-clock-o"></i> {{ button_cron }}*/
/*                                 </a>*/
/*                                 <a href="{{ debug_log }}" class="card-link text-secondary">*/
/*                                     <i class="fa fa-download"></i> {{ button_debug_log }}*/
/*                                 </a>*/
/*                                 <a href="{{ error_log }}" class="card-link text-secondary">*/
/*                                     <i class="fa fa-download"></i> {{ button_error_log }}*/
/*                                 </a>*/
/*                             </small>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="card mt-4">*/
/*                         <div class="card-body">*/
/*                             <h5 class="card-title">*/
/*                                 {{ text_included }}*/
/*                                 <a class="pull-right text-primary" href="{{ help_page_types }}" target="_blank" data-toggle="tooltip" data-original-title="{{ button_help }}"><i class="fa fa-question-circle"></i></a>*/
/*                             </h5>*/
/*                             <table class="table table-hover mt-4">*/
/*                                 <thead>*/
/*                                     <tr>*/
/*                                         <td colspan="4">*/
/*                                             {{ entry_standard_pages }}*/
/*                                         </td>*/
/*                                     </tr>*/
/*                                 </thead>*/
/*                                 <tbody>*/
/*                                     {% for i, page in standard_pages %}*/
/*                                     <tr data-standard-page-route="{{ page.route }}">*/
/*                                         <td>*/
/*                                             {{ page.name }}*/
/*                                         </td>*/
/*                                         <td class="text-muted hidden-xs word-break">*/
/*                                             {{ page.route }}*/
/*                                         </td>*/
/*                                         <td class="text-right button-clear-td">*/
/*                                             <button class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="{{ button_invalidate }}" data-button-clear="invalidate" data-button-clear-action="&invalidate_type=route&invalidate_value={{ page.route }}" data-are-you-sure="{{ text_confirm_invalidate }}"><i class="fa fa-recycle"></i></button>*/
/* */
/*                                             <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="{{ button_purge }}" data-button-clear="purge" data-button-clear-action="&purge_type=route&purge_value={{ page.route }}" data-are-you-sure="{{ text_confirm_purge }}"><i class="fa fa-recycle"></i></button>*/
/*                                         </td>*/
/*                                         <td class="text-right">*/
/*                                             <label class="switch">*/
/*                                                 <input type="checkbox" name="standard_page[{{ page.key }}]" {{ page.status ? 'checked' }} />*/
/*                                                 <span class="slider round"></span>*/
/*                                             </label>*/
/*                                         </td>*/
/*                                     </tr>*/
/*                                     {% endfor %}*/
/*                                 </tbody>*/
/*                                 <thead>*/
/*                                     <tr>*/
/*                                         <td colspan="4">*/
/*                                             {{ entry_custom_pages }}*/
/*                                         </td>*/
/*                                     </tr>*/
/*                                 </thead>*/
/*                                 <tbody id="custom-pages">*/
/*                                     {% for i, page in custom_pages %}*/
/*                                     <tr data-custom-page-i="{{ i }}">*/
/*                                         <td>*/
/*                                             {{ page.name }}*/
/*                                         </td>*/
/*                                         <td class="text-muted hidden-xs word-break">*/
/*                                             {{ page.route }}*/
/*                                         </td>*/
/*                                         <td class="text-right button-clear-td">*/
/*                                             <input type="hidden" name="custom_page[{{ i }}][name]" value="{{ page.name }}" />*/
/*                                             <input type="hidden" name="custom_page[{{ i }}][route]" value="{{ page.route }}" />*/
/* */
/*                                             <button data-toggle="tooltip" data-original-title="{{ button_delete_custom_page }}" class="btn btn-light btn-sm delete-custom-page" data-are-you-sure="{{ text_confirm_custom_page }}"><i class="fa fa-times"></i></button>*/
/* */
/*                                             <button class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="{{ button_invalidate }}" data-button-clear="invalidate" data-button-clear-action="&invalidate_type=route&invalidate_value={{ page.route }}" data-are-you-sure="{{ text_confirm_invalidate }}"><i class="fa fa-recycle"></i></button>*/
/* */
/*                                             <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="{{ button_purge }}" data-button-clear="purge" data-button-clear-action="&purge_type=route&purge_value={{ page.route }}" data-are-you-sure="{{ text_confirm_purge }}"><i class="fa fa-recycle"></i></button>*/
/*                                         </td>*/
/*                                         <td class="text-right">*/
/*                                             <label class="switch">*/
/*                                                 <input type="checkbox" name="custom_page[{{ i }}][status]" {{ page.status ? 'checked' }} />*/
/*                                                 <span class="slider round"></span>*/
/*                                             </label>*/
/*                                         </td>*/
/*                                     </tr>*/
/*                                     {% endfor %}*/
/*                                 </tbody>*/
/*                                 <tfoot>*/
/*                                 <tr>*/
/*                                     <td colspan="4" class="text-right">*/
/*                                         <button id="add-custom-page" class="btn btn-light btn-outline-secondary"><i class="fa fa-plus"></i> {{ button_add_custom_page }}</button>*/
/*                                     </td>*/
/*                                 </tr>*/
/*                                 </tfoot>*/
/*                             </table>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="card mt-4">*/
/*                         <div class="card-body">*/
/*                             <h5 class="card-title">*/
/*                                 {{ text_auto_cache_clear }}*/
/*                                 <a class="pull-right text-primary" href="{{ help_auto_cache_clear }}" target="_blank" data-toggle="tooltip" data-original-title="{{ button_help }}"><i class="fa fa-question-circle"></i></a>*/
/*                             </h5>*/
/*                             <div class="alert alert-light bg-light">*/
/*                                 {{ info_auto_cache_clear }}*/
/*                             </div>*/
/*                             <div class="form-group row">*/
/*                                 <label class="col-xs-8 col-form-label" for="select-warmup">*/
/*                                     {{ entry_auto_cache_clear_admin_product }}<br />*/
/*                                     <small class="text-secondary">{{ help_auto_cache_clear_admin_product }}</small>*/
/*                                 </label>*/
/*                                 <div class="col-xs-4 text-right">*/
/*                                     <label class="switch">*/
/*                                         <input type="checkbox" name="auto_cache_clear_admin_product" value="1" {{ auto_cache_clear_admin_product ? 'checked' }} />*/
/*                                         <span class="slider round"></span>*/
/*                                     </label>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group row">*/
/*                                 <label class="col-xs-8 col-form-label" for="select-warmup">*/
/*                                     {{ entry_auto_cache_clear_admin_category }}<br />*/
/*                                     <small class="text-secondary">{{ help_auto_cache_clear_admin_category }}</small>*/
/*                                 </label>*/
/*                                 <div class="col-xs-4 text-right">*/
/*                                     <label class="switch">*/
/*                                         <input type="checkbox" name="auto_cache_clear_admin_category" value="1" {{ auto_cache_clear_admin_category ? 'checked' }} />*/
/*                                         <span class="slider round"></span>*/
/*                                     </label>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group row">*/
/*                                 <label class="col-xs-8 col-form-label" for="select-warmup">*/
/*                                     {{ entry_auto_cache_clear_admin_information }}<br />*/
/*                                     <small class="text-secondary">{{ help_auto_cache_clear_admin_information }}</small>*/
/*                                 </label>*/
/*                                 <div class="col-xs-4 text-right">*/
/*                                     <label class="switch">*/
/*                                         <input type="checkbox" name="auto_cache_clear_admin_information" value="1" {{ auto_cache_clear_admin_information ? 'checked' }} />*/
/*                                         <span class="slider round"></span>*/
/*                                     </label>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group row">*/
/*                                 <label class="col-xs-8 col-form-label" for="select-warmup">*/
/*                                     {{ entry_auto_cache_clear_admin_manufacturer }}<br />*/
/*                                     <small class="text-secondary">{{ help_auto_cache_clear_admin_manufacturer }}</small>*/
/*                                 </label>*/
/*                                 <div class="col-xs-4 text-right">*/
/*                                     <label class="switch">*/
/*                                         <input type="checkbox" name="auto_cache_clear_admin_manufacturer" value="1" {{ auto_cache_clear_admin_manufacturer ? 'checked' }} />*/
/*                                         <span class="slider round"></span>*/
/*                                     </label>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group row">*/
/*                                 <label class="col-xs-8 col-form-label" for="select-warmup">*/
/*                                     {{ entry_auto_cache_clear_admin_review }}<br />*/
/*                                     <small class="text-secondary">{{ help_auto_cache_clear_admin_review }}</small>*/
/*                                 </label>*/
/*                                 <div class="col-xs-4 text-right">*/
/*                                     <label class="switch">*/
/*                                         <input type="checkbox" name="auto_cache_clear_admin_review" value="1" {{ auto_cache_clear_admin_review ? 'checked' }} />*/
/*                                         <span class="slider round"></span>*/
/*                                     </label>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <div class="form-group row">*/
/*                                 <label class="col-xs-8 col-form-label" for="select-warmup">*/
/*                                     {{ entry_auto_cache_clear_order }}<br />*/
/*                                     <small class="text-secondary">{{ help_auto_cache_clear_order }}</small>*/
/*                                 </label>*/
/*                                 <div class="col-xs-4 text-right">*/
/*                                     <label class="switch">*/
/*                                         <input type="checkbox" name="auto_cache_clear_order" value="1" {{ auto_cache_clear_order ? 'checked' }} />*/
/*                                         <span class="slider round"></span>*/
/*                                     </label>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </form>*/
/*     </div>*/
/*     <div class="fb-chat" data-toggle="tooltip" title="{{ button_chat }}">*/
/*         <a href="{{ messenger }}" target="_blank">*/
/*             <svg width="60px" height="60px" viewBox="0 0 60 60">*/
/*                 <svg x="0" y="0" width="60px" height="60px">*/
/*                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">*/
/*                         <g>*/
/*                             <circle fill="#007bff" cx="30" cy="30" r="30"></circle>*/
/*                             <svg x="10" y="10">*/
/*                                 <g transform="translate(0.000000, -10.000000)" fill="#FFFFFF">*/
/*                                     <g id="logo" transform="translate(0.000000, 10.000000)">*/
/*                                         <path fill="#fff" d="M20,0 C31.2666,0 40,8.2528 40,19.4 C40,30.5472 31.2666,38.8 20,38.8 C17.9763,38.8 16.0348,38.5327 14.2106,38.0311 C13.856,37.9335 13.4789,37.9612 13.1424,38.1098 L9.1727,39.8621 C8.1343,40.3205 6.9621,39.5819 6.9273,38.4474 L6.8184,34.8894 C6.805,34.4513 6.6078,34.0414 6.2811,33.7492 C2.3896,30.2691 0,25.2307 0,19.4 C0,8.2528 8.7334,0 20,0 Z M7.99009,25.07344 C7.42629,25.96794 8.52579,26.97594 9.36809,26.33674 L15.67879,21.54734 C16.10569,21.22334 16.69559,21.22164 17.12429,21.54314 L21.79709,25.04774 C23.19919,26.09944 25.20039,25.73014 26.13499,24.24744 L32.00999,14.92654 C32.57369,14.03204 31.47419,13.02404 30.63189,13.66324 L24.32119,18.45264 C23.89429,18.77664 23.30439,18.77834 22.87569,18.45674 L18.20299,14.95224 C16.80079,13.90064 14.79959,14.26984 13.86509,15.75264 L7.99009,25.07344 Z"></path>*/
/*                                     </g>*/
/*                                 </g>*/
/*                             </svg>*/
/*                         </g>*/
/*                     </g>*/
/*                 </svg>*/
/*             </svg>*/
/*         </a>*/
/*     </div>*/
/* </div>*/
/* <script id="template-nitropack-notification-success" type="text/template">*/
/* <div id="nitropack-notification" data-type="success">*/
/*     <div class="alert alert-success" id="nitropack-notification-message">{message}</div>*/
/* </div>*/
/* </script>*/
/* <script id="template-nitropack-notification-danger" type="text/template">*/
/* <div id="nitropack-notification" data-type="danger">*/
/*     <div class="alert alert-danger" id="nitropack-notification-message">{message}</div>*/
/* </div>*/
/* </script>*/
/* <script id="template-nitropack-notification-warning" type="text/template">*/
/* <div id="nitropack-notification" data-type="warning">*/
/*     <div class="alert alert-warning" id="nitropack-notification-message">{message}</div>*/
/* </div>*/
/* </script>*/
/* <script id="template-nitropack-notification-info" type="text/template">*/
/* <div id="nitropack-notification" data-type="info">*/
/*     <div class="alert alert-info" id="nitropack-notification-message">{message}</div>*/
/* </div>*/
/* </script>*/
/* <script id="template-custom-page" type="text/template">*/
/* <tr data-custom-page-i="{i}">*/
/*     <td>*/
/*         {name}*/
/*     </td>*/
/*     <td class="text-muted hidden-xs word-break">*/
/*         {route}*/
/*     </td>*/
/*     <td class="text-right button-clear-td">*/
/*         <input type="hidden" name="custom_page[{i}][name]" value="{name_escaped}" />*/
/*         <input type="hidden" name="custom_page[{i}][route]" value="{route}" />*/
/* */
/*         <button data-toggle="tooltip" data-original-title="{{ button_delete_custom_page }}" class="btn btn-light btn-sm delete-custom-page" data-are-you-sure="{{ text_confirm_custom_page }}"><i class="fa fa-times"></i></button>*/
/* */
/*         <button class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="{{ button_invalidate }}" data-button-clear="invalidate" data-button-clear-action="&invalidate_type=route&invalidate_value={route}" data-are-you-sure="{{ text_confirm_invalidate }}"><i class="fa fa-recycle"></i></button>*/
/* */
/*         <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="{{ button_purge }}" data-button-clear="purge" data-button-clear-action="&purge_type=route&purge_value={route}" data-are-you-sure="{{ text_confirm_purge }}"><i class="fa fa-recycle"></i></button>*/
/*     </td>*/
/*     <td class="text-right">*/
/*         <label class="switch">*/
/*             <input type="checkbox" name="custom_page[{i}][status]" value="1" checked />*/
/*             <span class="slider round"></span>*/
/*         </label>*/
/*     </td>*/
/* </tr>*/
/* </script>*/
/* <script id="template-modal-custom-page" type="text/template">*/
/* <div class="nitro modal fade modal-removable" tabindex="-1" role="dialog">*/
/*     <div class="modal-dialog" role="document">*/
/*         <div class="modal-content">*/
/*             <div class="modal-header">*/
/*                 <h5 class="modal-title">{{ text_add_custom_page }}</h5>*/
/*                 <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>*/
/*             </div>*/
/*             <div class="modal-body">*/
/*                 <form id="custom-page">*/
/*                     <div class="form-group required">*/
/*                         <label for="input-custom-page-name">{{ entry_custom_page_name }}</label>*/
/*                         <div>*/
/*                             <input type="text" name="custom_page_name" value="" placeholder="{{ placeholder_custom_page_name }}" id="input-custom-page-name" class="form-control" autocomplete="new-password" />*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="form-group">*/
/*                         <label for="select-custom-page-route">{{ entry_custom_page_route }}</label>*/
/*                         <div>*/
/*                             <select id="select-custom-page-route" name="custom_page_route" class="form-control">*/
/*                                 {% for page in all_pages %}*/
/*                                 <option value="{{ page }}">{{ page }}</option>*/
/*                                 {% endfor %}*/
/*                             </select>*/
/*                         </div>*/
/*                     </div>*/
/*                 </form>*/
/*             </div>*/
/*             <div class="modal-footer">*/
/*                 <button type="button" class="btn btn-light btn-outline-secondary" data-dismiss="modal">{{ button_close }}</button>*/
/*                 <button disabled type="button" class="btn btn-primary" id="save-custom-page">{{ button_save }}</button>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* </script>*/
/* <script id="template-modal-warmup-disable-confirm" type="text/template">*/
/* <div id="modal-warmup-disable-confirm" class="nitro modal fade modal-removable" tabindex="-1" role="dialog">*/
/*     <div class="modal-dialog" role="document">*/
/*         <div class="modal-content">*/
/*             <div class="modal-header">*/
/*                 <h5 class="modal-title">{{ text_configure_warmup }}</h5>*/
/*                 <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>*/
/*             </div>*/
/*             <div class="modal-body">*/
/*                 <p><i class="fa fa-exclamation-triangle text-warning"></i> {{ text_warmup_disable_confirm }}</p>*/
/*             </div>*/
/*             <div class="modal-footer">*/
/*                 <button type="button" class="btn btn-light btn-outline-secondary" data-dismiss="modal">{{ button_cancel }}</button>*/
/*                 <button type="button" class="btn btn-primary" id="open-warmup-settings">{{ button_disable_warmup_continue }}</button>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* </script>*/
/* <script id="template-modal-warmup" type="text/template">*/
/* <div id="modal-warmup" class="nitro modal fade modal-removable" tabindex="-1" role="dialog" data-warmup-form="{{ warmup_form }}">*/
/*     <div class="modal-dialog" role="document">*/
/*         <div class="modal-content">*/
/*             <div class="modal-header">*/
/*                 <h5 class="modal-title">{{ text_configure_warmup }}</h5>*/
/*                 <a class="text-primary close" href="{{ help_warmup }}" target="_blank"><i class="fa fa-question-circle"></i></a>*/
/*                 <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>*/
/*             </div>*/
/*             <div class="modal-body">*/
/*                 <div class="alert alert-info text-center"><i class="fa fa-spinner fa-spin"></i> {{ text_loading_warmup }}</div>*/
/*             </div>*/
/*             <div id="warmup-estimate-loading" class="modal-footer modal-footer-left warmup-estimate-modal-container" style="display: none;">*/
/*                 <div class="alert alert-warning"><i class="fa fa-spinner fa-spin"></i> {{ text_warmup_estimate_loading }}</div>*/
/*             </div>*/
/*             <div id="warmup-estimate-error" class="modal-footer modal-footer-left warmup-estimate-modal-container" style="display: none;">*/
/*                 <div id="warmup-estimate-error-message" class="alert alert-danger"></div>*/
/*             </div>*/
/*             <div id="warmup-estimate-result" class="modal-footer modal-footer-left warmup-estimate-modal-container" style="display: none;" data-warmup-estimate-result-text="{{ text_warmup_estimate_result }}">*/
/*                 <div id="warmup-estimate-result-message" class="alert alert-warning"></div>*/
/*             </div>*/
/*             <div class="modal-footer">*/
/*                 <button type="button" class="btn btn-light btn-outline-secondary" data-dismiss="modal">{{ button_close }}</button>*/
/*                 <button disabled type="button" class="btn btn-primary" id="close-enable-warmup">{{ button_close_enable_warmup }}</button>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* </script>*/
/* <script id="template-modal-warmup-stats" type="text/template">*/
/* <div id="modal-warmup-stats" class="nitro modal fade modal-removable" tabindex="-1" role="dialog">*/
/*     <div class="modal-dialog" role="document">*/
/*         <div class="modal-content">*/
/*             <div class="modal-header">*/
/*                 <h5 class="modal-title">{{ text_warmup_stats }}</h5>*/
/*                 <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>*/
/*             </div>*/
/*             <div class="modal-body">*/
/*                 <div class="alert alert-info text-center"><i class="fa fa-spinner fa-spin"></i> {{ text_loading_warmup_stats }}</div>*/
/*             </div>*/
/*             <div class="modal-footer">*/
/*                 <button type="button" class="btn btn-light btn-outline-secondary" data-dismiss="modal">{{ button_close }}</button>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* </script>*/
/* <script id="template-modal-warmup-detail" type="text/template">*/
/*     <div class="row mb-2">*/
/*         <div class="col-xs-6">*/
/*             {key}*/
/*         </div>*/
/*         <div class="col-xs-6 text-right">*/
/*             {value}*/
/*         </div>*/
/*     </div>*/
/* </script>*/
/* <script id="template-update-check-flash" type="text/template">*/
/*     <div class="alert alert-info d-flex justify-content-between lh-2">*/
/*         <div>{message}</div>*/
/*         <div><button class="btn btn-primary btn-sm" id="button-modal-update">{{ button_update_check_get_it }}</button></div>*/
/*     </div>*/
/* </script>*/
/* <script id="template-modal-update" type="text/template">*/
/* <div id="modal-update" class="nitro modal fade modal-removable" tabindex="-1" role="dialog">*/
/*     <div class="modal-dialog modal-lg" role="document">*/
/*         <div class="modal-content">*/
/*             <div class="modal-header">*/
/*                 <h5 class="modal-title">{title}</h5>*/
/*                 <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>*/
/*             </div>*/
/*             {% if non_installed_modifications %}*/
/*                 <div class="modal-body">*/
/*                     <div class="alert alert-warning lh-2">*/
/*                         <div>{{ text_non_installed_modifications }}</div>*/
/*                         <hr />*/
/*                         <ul>*/
/*                             {% for non_installed_modification in non_installed_modifications %}*/
/*                                 <li>{{ non_installed_modification }}</li>*/
/*                             {% endfor %}*/
/*                         </ul>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="modal-footer">*/
/*                     <a id="modifications-refresh" href="{{ modifications_refresh }}" class="btn btn-primary btn-sm">{{ button_update_check_refresh_now }}</a>*/
/*                 </div>*/
/*             {% else %}*/
/*                 <div class="modal-body">*/
/*                     <h3>{{ text_release_notes }}</h3>*/
/*                     {body}*/
/*                 </div>*/
/*                 <div id="modal-update-steps" class="modal-footer text-left d-none">*/
/*                     <h3>{{ text_update_progress }}</h3>*/
/*                     <div id="progress-lines" class="well"></div>*/
/*                     <div id="modal-update-progress" class="progress w-100 d-block">*/
/*                         <div class="progress-bar" role="progressbar"></div>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div id="modal-update-setup" class="modal-footer text-left d-none">*/
/*                     {% if has_modification_permissions %}*/
/*                         <div class="w-100 alert alert-info">*/
/*                             {{ text_refresh_modifications }}*/
/*                         </div>*/
/*                     {% else %}*/
/*                         <div class="w-100 alert alert-warning">*/
/*                             <i class="fa fa-exclamation-triangle"></i> {{ text_refresh_modifications_no_permissions }}*/
/*                         </div>*/
/*                     {% endif %}*/
/*                 </div>*/
/*                 <div class="modal-footer">*/
/*                     <button type="button" class="btn btn-light d-none" id="modal-update-abort">{{ button_abort }}</button>*/
/*                     <button type="button" class="btn btn-primary" id="modal-update-start">{{ button_update }}</button>*/
/*                 </div>*/
/*             {% endif %}*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* </script>*/
/* <script id="template-update-check-progress" type="text/template">*/
/*     <div class="w-100 d-flex justify-content-between">*/
/*         <div><i class="fa fa-arrow-right"></i> {message}</div>*/
/*         <div class="update-progress">*/
/*             <small class="text-secondary">*/
/*                 <i class="fa fa-spin fa-circle-o-notch"></i> {{ text_working }}*/
/*             </small>*/
/*         </div>*/
/*     </div>*/
/* </script>*/
/* <script id="template-update-check-error" type="text/template">*/
/*     <div id="update-check-error-container" class="alert alert-danger mt-2">*/
/*         <i class="fa fa-exclamation-triangle"></i> {message}*/
/*     </div>*/
/* </script>*/
/* <script id="template-update-check-badge-ok" type="text/template">*/
/*     <span class="badge badge-success">{{ text_ok }}</span>*/
/* </script>*/
/* <script id="template-update-check-badge-error" type="text/template">*/
/*     <span class="badge badge-danger">{{ text_error }}</span>*/
/* </script>*/
/* <script id="template-update-check-badge-aborted" type="text/template">*/
/*     <span class="badge badge-warning">{{ text_aborted }}</span>*/
/* </script>*/
/* <script id="template-modal-cron" type="text/template">*/
/* <div id="modal-cron" class="nitro modal fade modal-removable" tabindex="-1" role="dialog">*/
/*     <div class="modal-dialog modal-lg" role="document">*/
/*         <div class="modal-content">*/
/*             <div class="modal-header">*/
/*                 <h5 class="modal-title">{{ text_title_cron }}</h5>*/
/*                 <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>*/
/*             </div>*/
/* */
/*             <div class="modal-body">*/
/*                 {% if cron_warning %}*/
/*                 <div class="alert alert-danger">*/
/*                     {{ text_cron_warning }}*/
/*                 </div>*/
/*                 {% endif %}*/
/* */
/*                 {{ text_cron_info }}*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* </script>*/
/* {{ footer }}*/
/* */
