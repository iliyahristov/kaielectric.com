<?php

/* so-revo/template/extension/module/tf_filter.twig */
class __TwigTemplate_51f36cb954cabbf7db167ac913ce473267abdc8bb5b69b7e89768b061b4b6d46 extends Twig_Template
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
        echo "<div id=\"tf-filter-";
        echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
        echo "\" class=\"panel tf-filter panel-default\">
<div data-toggle=\"collapse\" href=\"#tf-filter-content-";
        // line 2
        echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
        echo "\" class=\"panel-heading";
        echo (((isset($context["collapsed"]) ? $context["collapsed"] : null)) ? (" collapsed") : (""));
        echo "\">
  <h4 class=\"panel-title\">";
        // line 3
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h4>
  ";
        // line 4
        if ((isset($context["reset_all"]) ? $context["reset_all"] : null)) {
            // line 5
            echo "    <span data-tf-reset=\"all\" data-toggle=\"tooltip\" title=\"";
            echo (isset($context["text_reset_all"]) ? $context["text_reset_all"] : null);
            echo "\" class=\"tf-filter-reset hide text-danger\"><i class=\"fa fa-times\"></i></span>
  ";
        }
        // line 7
        echo "  <i class=\"fa fa-chevron-circle-down\" aria-hidden=\"true\"></i>
</div>
<div id=\"tf-filter-content-";
        // line 9
        echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
        echo "\" data-mz-base-z-index=\"99\" class=\"collapse";
        echo (( !(isset($context["collapsed"]) ? $context["collapsed"] : null)) ? (" in") : (""));
        echo " tf-list-filter-group row\">
";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["filters"]) ? $context["filters"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["filter"]) {
            echo " 
  ";
            // line 11
            if (($this->getAttribute($context["filter"], "type", array(), "array") == "price")) {
                echo " ";
                // line 12
                echo "  <div class=\"tf-filter-group col-xs-";
                echo twig_round((12 / (isset($context["column_xs"]) ? $context["column_xs"] : null)), 0, "ceil");
                echo " col-sm-";
                echo twig_round((12 / (isset($context["column_sm"]) ? $context["column_sm"] : null)), 0, "ceil");
                echo " col-md-";
                echo twig_round((12 / (isset($context["column_md"]) ? $context["column_md"] : null)), 0, "ceil");
                echo " col-lg-";
                echo twig_round((12 / (isset($context["column_lg"]) ? $context["column_lg"] : null)), 0, "ceil");
                echo "\">
    <div class=\"tf-filter-group-header ";
                // line 13
                echo (($this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("collapsed") : (""));
                echo "\" data-toggle=\"collapse\" href=\"#tf-filter-panel-";
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\">
      <span class=\"tf-filter-group-title\">";
                // line 14
                echo (isset($context["text_price"]) ? $context["text_price"] : null);
                echo "</span>
     
      <i class=\"fa fa-caret-up toggle-icon\"></i>
    </div>
    <div id=\"tf-filter-panel-";
                // line 18
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\" class=\"collapse ";
                echo (( !$this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("in") : (""));
                echo "\" >
      <div class=\"tf-filter-group-content\">
        <div data-role=\"rangeslider\"></div>
        <div class=\"row\">
          <div class=\"col-xs-6\"><input type=\"number\" id=\"min-price\" class=\"form-control\" name=\"tf_fp[min]\" value=\"";
                // line 22
                echo $this->getAttribute($this->getAttribute($context["filter"], "selected", array(), "array"), "min", array(), "array");
                echo "\" min=\"";
                echo $this->getAttribute($context["filter"], "min_price", array(), "array");
                echo "\" max=\"";
                echo ($this->getAttribute($context["filter"], "max_price", array(), "array") - 1);
                echo "\" /></div>
          <div class=\"col-xs-6\"><input type=\"number\" id=\"max-price\" class=\"form-control\" name=\"tf_fp[max]\" value=\"";
                // line 23
                echo $this->getAttribute($this->getAttribute($context["filter"], "selected", array(), "array"), "max", array(), "array");
                echo "\" min=\"";
                echo ($this->getAttribute($context["filter"], "min_price", array(), "array") + 1);
                echo "\" max=\"";
                echo $this->getAttribute($context["filter"], "max_price", array(), "array");
                echo "\" /></div>
        </div>
      </div>
    </div>
  </div>
        
  ";
            } elseif ((($this->getAttribute(            // line 29
$context["filter"], "type", array(), "array") == "sub_category") && $this->getAttribute($context["filter"], "values", array(), "array"))) {
                echo " ";
                // line 30
                echo "  <div class=\"tf-filter-group col-xs-";
                echo twig_round((12 / (isset($context["column_xs"]) ? $context["column_xs"] : null)), 0, "ceil");
                echo " col-sm-";
                echo twig_round((12 / (isset($context["column_sm"]) ? $context["column_sm"] : null)), 0, "ceil");
                echo " col-md-";
                echo twig_round((12 / (isset($context["column_md"]) ? $context["column_md"] : null)), 0, "ceil");
                echo " col-lg-";
                echo twig_round((12 / (isset($context["column_lg"]) ? $context["column_lg"] : null)), 0, "ceil");
                echo "\">
    <div class=\"tf-filter-group-header ";
                // line 31
                echo (($this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("collapsed") : (""));
                echo "\" data-toggle=\"collapse\" href=\"#tf-filter-panel-";
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\">
      <span class=\"tf-filter-group-title\">";
                // line 32
                echo (isset($context["text_sub_category"]) ? $context["text_sub_category"] : null);
                echo "</span>
      ";
                // line 33
                if ((isset($context["reset_group"]) ? $context["reset_group"] : null)) {
                    // line 34
                    echo "        ";
                    $context["total_selected"] = 0;
                    // line 35
                    echo "        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter"], "values", array(), "array"));
                    foreach ($context['_seq'] as $context["_key"] => $context["sub_category"]) {
                        if ($this->getAttribute($context["sub_category"], "selected", array(), "array")) {
                            $context["total_selected"] = ((isset($context["total_selected"]) ? $context["total_selected"] : null) + 1);
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_category'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 36
                    echo "        <a data-tf-reset=\"check\" data-toggle=\"tooltip\" title=\"";
                    echo (isset($context["text_reset"]) ? $context["text_reset"] : null);
                    echo "\" class=\" tf-filter-reset";
                    echo (( !(isset($context["total_selected"]) ? $context["total_selected"] : null)) ? (" hide") : (""));
                    echo "\"><i class=\"fa fa-times\"></i></a>
      ";
                }
                // line 38
                echo "      <i class=\"fa fa-caret-up toggle-icon\"></i>
    </div>
    <div id=\"tf-filter-panel-";
                // line 40
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\" class=\"collapse ";
                echo (( !$this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("in") : (""));
                echo "\" >
      ";
                // line 41
                if ($this->getAttribute($context["filter"], "search", array(), "array")) {
                    // line 42
                    echo "      <div class=\"tf-filter-group-search\"><i class=\"fa fa-search\"></i> <input type=\"search\" placeholder=\"";
                    echo (isset($context["text_search"]) ? $context["text_search"] : null);
                    echo "\"/></div>
      ";
                }
                // line 44
                echo "      <div class=\"tf-filter-group-content ";
                echo (isset($context["overflow"]) ? $context["overflow"] : null);
                echo "\">
      ";
                // line 45
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter"], "values", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["sub_category"]) {
                    echo " 
        <div class=\"form-check tf-filter-value custom-";
                    // line 46
                    echo $this->getAttribute($context["filter"], "input_type", array(), "array");
                    echo " ";
                    echo $this->getAttribute($context["filter"], "list_type", array(), "array");
                    echo "\">
          <label class=\"form-check-label\">
            ";
                    // line 48
                    if ($this->getAttribute($context["sub_category"], "selected", array(), "array")) {
                        echo " 
            <input type=\"";
                        // line 49
                        echo $this->getAttribute($context["filter"], "input_type", array(), "array");
                        echo "\" name=\"tf_fsc\" value=\"";
                        echo $this->getAttribute($context["sub_category"], "category_id", array(), "array");
                        echo "\" class=\"form-check-input\" checked>
            ";
                    } else {
                        // line 50
                        echo " 
            <input type=\"";
                        // line 51
                        echo $this->getAttribute($context["filter"], "input_type", array(), "array");
                        echo "\" name=\"tf_fsc\" value=\"";
                        echo $this->getAttribute($context["sub_category"], "category_id", array(), "array");
                        echo "\" class=\"form-check-input\" ";
                        echo (( !$this->getAttribute($context["sub_category"], "status", array(), "array")) ? ("disabled") : (""));
                        echo ">
            ";
                    }
                    // line 52
                    echo " 
            ";
                    // line 53
                    if ((($this->getAttribute($context["filter"], "list_type", array(), "array") == "image") || ($this->getAttribute($context["filter"], "list_type", array(), "array") == "both"))) {
                        echo " 
            <img src=\"";
                        // line 54
                        echo $this->getAttribute($context["sub_category"], "image", array(), "array");
                        echo "\" title=\"";
                        echo $this->getAttribute($context["sub_category"], "name", array(), "array");
                        echo "\" alt=\"";
                        echo $this->getAttribute($context["sub_category"], "name", array(), "array");
                        echo "\" />
            ";
                    } else {
                        // line 56
                        echo "            <span class=\"checkmark fa\"></span>
            ";
                    }
                    // line 57
                    echo " 
            ";
                    // line 58
                    if ((($this->getAttribute($context["filter"], "list_type", array(), "array") == "text") || ($this->getAttribute($context["filter"], "list_type", array(), "array") == "both"))) {
                        echo " 
              ";
                        // line 59
                        echo $this->getAttribute($context["sub_category"], "name", array(), "array");
                        echo "
            ";
                    }
                    // line 61
                    echo "          </label>
          ";
                    // line 62
                    if (((isset($context["count_product"]) ? $context["count_product"] : null) && ($this->getAttribute($context["filter"], "list_type", array(), "array") != "image"))) {
                        // line 63
                        echo "            ";
                        if ($this->getAttribute($context["sub_category"], "total", array(), "array")) {
                            echo " 
            <span class=\"label label-info tf-product-total\">";
                            // line 64
                            echo $this->getAttribute($context["sub_category"], "total", array(), "array");
                            echo "</span>
            ";
                        } else {
                            // line 66
                            echo "            <span class=\"label label-info label-danger tf-product-total\">";
                            echo $this->getAttribute($context["sub_category"], "total", array(), "array");
                            echo "</span>
            ";
                        }
                        // line 67
                        echo " 
          ";
                    }
                    // line 69
                    echo "        </div>
      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_category'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 71
                echo "      ";
                if ((((isset($context["overflow"]) ? $context["overflow"] : null) == "more") && (twig_length_filter($this->env, $this->getAttribute($context["filter"], "values", array(), "array")) >= 7))) {
                    // line 72
                    echo "        <a class=\"tf-see-more btn-link\" data-toggle=\"tf-seemore\" data-show=\"";
                    echo (isset($context["text_see_more"]) ? $context["text_see_more"] : null);
                    echo "\" data-hide=\"";
                    echo (isset($context["text_see_less"]) ? $context["text_see_less"] : null);
                    echo "\" href=\"#\">";
                    echo (isset($context["text_see_more"]) ? $context["text_see_more"] : null);
                    echo "</a>
      ";
                }
                // line 74
                echo "      </div>
    </div>
  </div>
      
  ";
            } elseif ((($this->getAttribute(            // line 78
$context["filter"], "type", array(), "array") == "manufacturer") && $this->getAttribute($context["filter"], "values", array(), "array"))) {
                echo " ";
                // line 79
                echo "  <div class=\"tf-filter-group col-xs-";
                echo twig_round((12 / (isset($context["column_xs"]) ? $context["column_xs"] : null)), 0, "ceil");
                echo " col-sm-";
                echo twig_round((12 / (isset($context["column_sm"]) ? $context["column_sm"] : null)), 0, "ceil");
                echo " col-md-";
                echo twig_round((12 / (isset($context["column_md"]) ? $context["column_md"] : null)), 0, "ceil");
                echo " col-lg-";
                echo twig_round((12 / (isset($context["column_lg"]) ? $context["column_lg"] : null)), 0, "ceil");
                echo "\">
    <div class=\"tf-filter-group-header ";
                // line 80
                echo (($this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("collapsed") : (""));
                echo "\" data-toggle=\"collapse\" href=\"#tf-filter-panel-";
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\">
      <span class=\"tf-filter-group-title\">";
                // line 81
                echo (isset($context["text_manufacturer"]) ? $context["text_manufacturer"] : null);
                echo "</span>
      ";
                // line 82
                if ((isset($context["reset_group"]) ? $context["reset_group"] : null)) {
                    // line 83
                    echo "        ";
                    $context["total_selected"] = 0;
                    // line 84
                    echo "        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter"], "values", array(), "array"));
                    foreach ($context['_seq'] as $context["_key"] => $context["manufacturer"]) {
                        if ($this->getAttribute($context["manufacturer"], "selected", array(), "array")) {
                            $context["total_selected"] = ((isset($context["total_selected"]) ? $context["total_selected"] : null) + 1);
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturer'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 85
                    echo "        <a data-tf-reset=\"check\" data-toggle=\"tooltip\" title=\"";
                    echo (isset($context["text_reset"]) ? $context["text_reset"] : null);
                    echo "\" class=\" tf-filter-reset";
                    echo (( !(isset($context["total_selected"]) ? $context["total_selected"] : null)) ? (" hide") : (""));
                    echo "\"><i class=\"fa fa-times\"></i></a>
      ";
                }
                // line 87
                echo "      <i class=\"fa fa-caret-up toggle-icon\"></i>
    </div>
    <div id=\"tf-filter-panel-";
                // line 89
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\" class=\"collapse ";
                echo (( !$this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("in") : (""));
                echo "\" >
      ";
                // line 90
                if ($this->getAttribute($context["filter"], "search", array(), "array")) {
                    // line 91
                    echo "      <div class=\"tf-filter-group-search\"><i class=\"fa fa-search\"></i> <input type=\"search\" placeholder=\"";
                    echo (isset($context["text_search"]) ? $context["text_search"] : null);
                    echo "\"/></div>
      ";
                }
                // line 93
                echo "      <div class=\"tf-filter-group-content ";
                echo (isset($context["overflow"]) ? $context["overflow"] : null);
                echo "\">
      ";
                // line 94
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter"], "values", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["manufacturer"]) {
                    echo " 
        <div class=\"form-check tf-filter-value custom-";
                    // line 95
                    echo $this->getAttribute($context["filter"], "input_type", array(), "array");
                    echo " ";
                    echo $this->getAttribute($context["filter"], "list_type", array(), "array");
                    echo "\">
          <label class=\"form-check-label\">
            ";
                    // line 97
                    if ($this->getAttribute($context["manufacturer"], "selected", array(), "array")) {
                        echo " 
            <input type=\"";
                        // line 98
                        echo $this->getAttribute($context["filter"], "input_type", array(), "array");
                        echo "\" name=\"tf_fm\" value=\"";
                        echo $this->getAttribute($context["manufacturer"], "manufacturer_id", array(), "array");
                        echo "\" class=\"form-check-input\" checked>
            ";
                    } else {
                        // line 99
                        echo " 
            <input type=\"";
                        // line 100
                        echo $this->getAttribute($context["filter"], "input_type", array(), "array");
                        echo "\" name=\"tf_fm\" value=\"";
                        echo $this->getAttribute($context["manufacturer"], "manufacturer_id", array(), "array");
                        echo "\" class=\"form-check-input\" ";
                        echo (( !$this->getAttribute($context["manufacturer"], "status", array(), "array")) ? ("disabled") : (""));
                        echo ">
            ";
                    }
                    // line 101
                    echo " 
            ";
                    // line 102
                    if ((($this->getAttribute($context["filter"], "list_type", array(), "array") == "image") || ($this->getAttribute($context["filter"], "list_type", array(), "array") == "both"))) {
                        echo " 
            <img src=\"";
                        // line 103
                        echo $this->getAttribute($context["manufacturer"], "image", array(), "array");
                        echo "\" title=\"";
                        echo $this->getAttribute($context["manufacturer"], "name", array(), "array");
                        echo "\" alt=\"";
                        echo $this->getAttribute($context["manufacturer"], "name", array(), "array");
                        echo "\" />
            ";
                    } else {
                        // line 105
                        echo "            <span class=\"checkmark fa\"></span>
            ";
                    }
                    // line 106
                    echo " 
            ";
                    // line 107
                    if ((($this->getAttribute($context["filter"], "list_type", array(), "array") == "text") || ($this->getAttribute($context["filter"], "list_type", array(), "array") == "both"))) {
                        echo " 
              ";
                        // line 108
                        echo $this->getAttribute($context["manufacturer"], "name", array(), "array");
                        echo "
            ";
                    }
                    // line 110
                    echo "          </label>
          ";
                    // line 111
                    if (((isset($context["count_product"]) ? $context["count_product"] : null) && ($this->getAttribute($context["filter"], "list_type", array(), "array") != "image"))) {
                        // line 112
                        echo "            ";
                        if ($this->getAttribute($context["manufacturer"], "total", array(), "array")) {
                            echo " 
            <span class=\"label label-info tf-product-total\">";
                            // line 113
                            echo $this->getAttribute($context["manufacturer"], "total", array(), "array");
                            echo "</span>
            ";
                        } else {
                            // line 115
                            echo "            <span class=\"label label-info label-danger tf-product-total\">";
                            echo $this->getAttribute($context["manufacturer"], "total", array(), "array");
                            echo "</span>
            ";
                        }
                        // line 116
                        echo " 
          ";
                    }
                    // line 118
                    echo "        </div>
      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturer'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 120
                echo "      ";
                if ((((isset($context["overflow"]) ? $context["overflow"] : null) == "more") && (twig_length_filter($this->env, $this->getAttribute($context["filter"], "values", array(), "array")) >= 7))) {
                    // line 121
                    echo "        <a class=\"tf-see-more btn-link\" data-toggle=\"tf-seemore\" data-show=\"";
                    echo (isset($context["text_see_more"]) ? $context["text_see_more"] : null);
                    echo "\" data-hide=\"";
                    echo (isset($context["text_see_less"]) ? $context["text_see_less"] : null);
                    echo "\" href=\"#\">";
                    echo (isset($context["text_see_more"]) ? $context["text_see_more"] : null);
                    echo "</a>
      ";
                }
                // line 123
                echo "      </div>
    </div>
  </div>
  ";
            } elseif (($this->getAttribute(            // line 126
$context["filter"], "type", array(), "array") == "search")) {
                echo " ";
                // line 127
                echo "  <div class=\"tf-filter-group col-xs-";
                echo twig_round((12 / (isset($context["column_xs"]) ? $context["column_xs"] : null)), 0, "ceil");
                echo " col-sm-";
                echo twig_round((12 / (isset($context["column_sm"]) ? $context["column_sm"] : null)), 0, "ceil");
                echo " col-md-";
                echo twig_round((12 / (isset($context["column_md"]) ? $context["column_md"] : null)), 0, "ceil");
                echo " col-lg-";
                echo twig_round((12 / (isset($context["column_lg"]) ? $context["column_lg"] : null)), 0, "ceil");
                echo "\">
    <div class=\"tf-filter-group-header ";
                // line 128
                echo (($this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("collapsed") : (""));
                echo "\" data-toggle=\"collapse\" href=\"#tf-filter-panel-";
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\">
      <span  class=\"tf-filter-group-title\">";
                // line 129
                echo (isset($context["text_search"]) ? $context["text_search"] : null);
                echo "</span>
      ";
                // line 130
                if ((isset($context["reset_group"]) ? $context["reset_group"] : null)) {
                    // line 131
                    echo "        ";
                    if ($this->getAttribute($context["filter"], "keyword", array(), "array")) {
                        // line 132
                        echo "        <a data-tf-reset=\"text\" data-toggle=\"tooltip\" title=\"";
                        echo (isset($context["text_reset"]) ? $context["text_reset"] : null);
                        echo "\" class=\"tf-filter-reset\"><i class=\"fa fa-times\"></i></a>
        ";
                    } else {
                        // line 134
                        echo "        <a data-tf-reset=\"text\" data-toggle=\"tooltip\" title=\"";
                        echo (isset($context["text_reset"]) ? $context["text_reset"] : null);
                        echo "\" class=\"tf-filter-reset hide\"><i class=\"fa fa-times\"></i></a>
        ";
                    }
                    // line 136
                    echo "      ";
                }
                // line 137
                echo "      <i class=\"fa fa-caret-up toggle-icon\"></i>
    </div>
    <div id=\"tf-filter-panel-";
                // line 139
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\" class=\"collapse ";
                echo (( !$this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("in") : (""));
                echo "\" >
      <div class=\"tf-filter-group-content\">
        <input type=\"text\" name=\"tf_fq\" value=\"";
                // line 141
                echo $this->getAttribute($context["filter"], "keyword", array(), "array");
                echo "\" placeholder=\"";
                echo (isset($context["text_search_placeholder"]) ? $context["text_search_placeholder"] : null);
                echo "\" class=\"form-control\" />
      </div>
    </div>
  </div>
  ";
            } elseif (($this->getAttribute(            // line 145
$context["filter"], "type", array(), "array") == "availability")) {
                echo " ";
                // line 146
                echo "  <div class=\"tf-filter-group col-xs-";
                echo twig_round((12 / (isset($context["column_xs"]) ? $context["column_xs"] : null)), 0, "ceil");
                echo " col-sm-";
                echo twig_round((12 / (isset($context["column_sm"]) ? $context["column_sm"] : null)), 0, "ceil");
                echo " col-md-";
                echo twig_round((12 / (isset($context["column_md"]) ? $context["column_md"] : null)), 0, "ceil");
                echo " col-lg-";
                echo twig_round((12 / (isset($context["column_lg"]) ? $context["column_lg"] : null)), 0, "ceil");
                echo "\">
    <div class=\"tf-filter-group-header ";
                // line 147
                echo (($this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("collapsed") : (""));
                echo "\" data-toggle=\"collapse\" href=\"#tf-filter-panel-";
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\">
      <span class=\"tf-filter-group-title\">";
                // line 148
                echo (isset($context["text_availability"]) ? $context["text_availability"] : null);
                echo "</span>
      ";
                // line 149
                if ((isset($context["reset_group"]) ? $context["reset_group"] : null)) {
                    // line 150
                    echo "        ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "values", array(), "array"), "in_stock", array(), "array"), "selected", array(), "array") || $this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "values", array(), "array"), "out_of_stock", array(), "array"), "selected", array(), "array"))) {
                        // line 151
                        echo "        <a data-tf-reset=\"check\" data-toggle=\"tooltip\" title=\"";
                        echo (isset($context["text_reset"]) ? $context["text_reset"] : null);
                        echo "\" class=\" tf-filter-reset\"><i class=\"fa fa-times\"></i></a>
        ";
                    } else {
                        // line 153
                        echo "        <a data-tf-reset=\"check\" data-toggle=\"tooltip\" title=\"";
                        echo (isset($context["text_reset"]) ? $context["text_reset"] : null);
                        echo "\" class=\" tf-filter-reset hide\"><i class=\"fa fa-times\"></i></a>
        ";
                    }
                    // line 155
                    echo "      ";
                }
                // line 156
                echo "      <i class=\"fa fa-caret-up toggle-icon\"></i>
    </div>
    <div id=\"tf-filter-panel-";
                // line 158
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\" class=\"collapse ";
                echo (( !$this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("in") : (""));
                echo "\" >
      <div class=\"tf-filter-group-content\">
        <div class=\"form-check tf-filter-value custom-radio\">
          <label class=\"form-check-label\">
            ";
                // line 162
                if ($this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "values", array(), "array"), "in_stock", array(), "array"), "selected", array(), "array")) {
                    echo " 
            <input type=\"radio\" value=\"1\" name=\"tf_fs\" class=\"form-check-input\" checked>
            ";
                } else {
                    // line 164
                    echo " 
            <input type=\"radio\" value=\"1\" name=\"tf_fs\" class=\"form-check-input\" ";
                    // line 165
                    echo (( !$this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "values", array(), "array"), "in_stock", array(), "array"), "status", array(), "array")) ? ("disabled") : (""));
                    echo ">
            ";
                }
                // line 166
                echo " 
            <span class=\"checkmark fa\"></span>
            ";
                // line 168
                echo (isset($context["text_in_stock"]) ? $context["text_in_stock"] : null);
                echo "
          </label>
          ";
                // line 170
                if ((isset($context["count_product"]) ? $context["count_product"] : null)) {
                    // line 171
                    echo "            ";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "values", array(), "array"), "in_stock", array(), "array"), "total", array(), "array")) {
                        echo " 
            <span class=\"label label-info tf-product-total\">";
                        // line 172
                        echo $this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "values", array(), "array"), "in_stock", array(), "array"), "total", array(), "array");
                        echo "</span>
            ";
                    } else {
                        // line 174
                        echo "            <span class=\"label label-info label-danger tf-product-total\">";
                        echo $this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "values", array(), "array"), "in_stock", array(), "array"), "total", array(), "array");
                        echo "</span>
            ";
                    }
                    // line 175
                    echo " 
          ";
                }
                // line 177
                echo "        </div>
        <div class=\"form-check tf-filter-value custom-radio\">
          <label class=\"form-check-label\">
            ";
                // line 180
                if ($this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "values", array(), "array"), "out_of_stock", array(), "array"), "selected", array(), "array")) {
                    echo " 
            <input type=\"radio\" value=\"0\" name=\"tf_fs\" class=\"form-check-input\" checked>
            ";
                } else {
                    // line 182
                    echo " 
            <input type=\"radio\" value=\"0\" name=\"tf_fs\" class=\"form-check-input\" ";
                    // line 183
                    echo (( !$this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "values", array(), "array"), "out_of_stock", array(), "array"), "status", array(), "array")) ? ("disabled") : (""));
                    echo ">
            ";
                }
                // line 184
                echo " 
            <span class=\"checkmark fa\"></span>
            ";
                // line 186
                echo (isset($context["text_out_of_stock"]) ? $context["text_out_of_stock"] : null);
                echo "
          </label>
          ";
                // line 188
                if ((isset($context["count_product"]) ? $context["count_product"] : null)) {
                    // line 189
                    echo "            ";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "values", array(), "array"), "out_of_stock", array(), "array"), "total", array(), "array")) {
                        echo " 
            <span class=\"label label-info tf-product-total\">";
                        // line 190
                        echo $this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "values", array(), "array"), "out_of_stock", array(), "array"), "total", array(), "array");
                        echo "</span>
            ";
                    } else {
                        // line 192
                        echo "            <span class=\"label label-info label-danger tf-product-total\">";
                        echo $this->getAttribute($this->getAttribute($this->getAttribute($context["filter"], "values", array(), "array"), "out_of_stock", array(), "array"), "total", array(), "array");
                        echo "</span>
            ";
                    }
                    // line 193
                    echo " 
          ";
                }
                // line 195
                echo "        </div>
      </div>
    </div>
  </div>
  ";
            } elseif (($this->getAttribute(            // line 199
$context["filter"], "type", array(), "array") == "rating")) {
                echo " ";
                // line 200
                echo "  <div class=\"tf-filter-group col-xs-";
                echo twig_round((12 / (isset($context["column_xs"]) ? $context["column_xs"] : null)), 0, "ceil");
                echo " col-sm-";
                echo twig_round((12 / (isset($context["column_sm"]) ? $context["column_sm"] : null)), 0, "ceil");
                echo " col-md-";
                echo twig_round((12 / (isset($context["column_md"]) ? $context["column_md"] : null)), 0, "ceil");
                echo " col-lg-";
                echo twig_round((12 / (isset($context["column_lg"]) ? $context["column_lg"] : null)), 0, "ceil");
                echo "\">
    <div class=\"tf-filter-group-header ";
                // line 201
                echo (($this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("collapsed") : (""));
                echo "\" data-toggle=\"collapse\" href=\"#tf-filter-panel-";
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\">
      <span class=\"tf-filter-group-title\">";
                // line 202
                echo (isset($context["text_rating"]) ? $context["text_rating"] : null);
                echo "</span>
      ";
                // line 203
                if ((isset($context["reset_group"]) ? $context["reset_group"] : null)) {
                    // line 204
                    echo "        ";
                    $context["total_selected"] = 0;
                    // line 205
                    echo "        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter"], "values", array(), "array"));
                    foreach ($context['_seq'] as $context["_key"] => $context["rating"]) {
                        if ($this->getAttribute($context["rating"], "selected", array(), "array")) {
                            $context["total_selected"] = ((isset($context["total_selected"]) ? $context["total_selected"] : null) + 1);
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rating'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 206
                    echo "        <a data-tf-reset=\"check\" data-toggle=\"tooltip\" title=\"";
                    echo (isset($context["text_reset"]) ? $context["text_reset"] : null);
                    echo "\" class=\"tf-filter-reset";
                    echo (( !(isset($context["total_selected"]) ? $context["total_selected"] : null)) ? (" hide") : (""));
                    echo "\"><i class=\"fa fa-times\"></i></a>
      ";
                }
                // line 208
                echo "      <i class=\"fa fa-caret-up toggle-icon\"></i>
    </div>
    <div id=\"tf-filter-panel-";
                // line 210
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\" class=\"collapse ";
                echo (( !$this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("in") : (""));
                echo "\" >
      <div class=\"tf-filter-group-content\">
        ";
                // line 212
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter"], "values", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["rating"]) {
                    echo " 
          <div class=\"form-check tf-filter-value custom-radio\">
            <label class=\"form-check-label\">
              ";
                    // line 215
                    if ($this->getAttribute($context["rating"], "selected", array(), "array")) {
                        echo " 
              <input type=\"radio\" value=\"";
                        // line 216
                        echo $this->getAttribute($context["rating"], "rating", array(), "array");
                        echo "\" name=\"tf_fr\" class=\"form-check-input\" checked>
              ";
                    } else {
                        // line 217
                        echo " 
              <input type=\"radio\" value=\"";
                        // line 218
                        echo $this->getAttribute($context["rating"], "rating", array(), "array");
                        echo "\" name=\"tf_fr\" class=\"form-check-input\" ";
                        echo (( !$this->getAttribute($context["rating"], "status", array(), "array")) ? ("disabled") : (""));
                        echo ">
              ";
                    }
                    // line 220
                    echo "              <span class=\"checkmark fa\"></span>
              <span class=\"rating\">
                ";
                    // line 222
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        echo " 
                  ";
                        // line 223
                        if (($this->getAttribute($context["rating"], "rating", array(), "array") < $context["i"])) {
                            echo " 
                  <span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-1x\"></i></span>
                  ";
                        } else {
                            // line 225
                            echo " 
                  <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-1x\"></i><i class=\"fa fa-star-o fa-stack-1x\"></i></span>
                  ";
                        }
                        // line 227
                        echo " 
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 228
                    echo " 
              </span>
              ";
                    // line 230
                    echo (isset($context["text_and_up"]) ? $context["text_and_up"] : null);
                    echo "
            </label>
            ";
                    // line 232
                    if ((isset($context["count_product"]) ? $context["count_product"] : null)) {
                        // line 233
                        echo "              ";
                        if ($this->getAttribute($context["rating"], "total", array(), "array")) {
                            echo " 
              <span class=\"label label-info tf-product-total\">";
                            // line 234
                            echo $this->getAttribute($context["rating"], "total", array(), "array");
                            echo "</span>
              ";
                        } else {
                            // line 236
                            echo "              <span class=\"label label-info label-danger tf-product-total\">";
                            echo $this->getAttribute($context["rating"], "total", array(), "array");
                            echo "</span>
              ";
                        }
                        // line 237
                        echo " 
            ";
                    }
                    // line 239
                    echo "          </div>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rating'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 240
                echo " 
      </div>
    </div>
  </div>
  ";
            } elseif (($this->getAttribute(            // line 244
$context["filter"], "type", array(), "array") == "discount")) {
                echo " ";
                // line 245
                echo "  <div class=\"tf-filter-group col-xs-";
                echo twig_round((12 / (isset($context["column_xs"]) ? $context["column_xs"] : null)), 0, "ceil");
                echo " col-sm-";
                echo twig_round((12 / (isset($context["column_sm"]) ? $context["column_sm"] : null)), 0, "ceil");
                echo " col-md-";
                echo twig_round((12 / (isset($context["column_md"]) ? $context["column_md"] : null)), 0, "ceil");
                echo " col-lg-";
                echo twig_round((12 / (isset($context["column_lg"]) ? $context["column_lg"] : null)), 0, "ceil");
                echo "\">
    <div class=\"tf-filter-group-header ";
                // line 246
                echo (($this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("collapsed") : (""));
                echo "\" data-toggle=\"collapse\" href=\"#tf-filter-panel-";
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\">
      <span class=\"tf-filter-group-title\">";
                // line 247
                echo (isset($context["text_discount"]) ? $context["text_discount"] : null);
                echo "</span>
      ";
                // line 248
                if ((isset($context["reset_group"]) ? $context["reset_group"] : null)) {
                    // line 249
                    echo "        ";
                    $context["total_selected"] = 0;
                    // line 250
                    echo "        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter"], "values", array(), "array"));
                    foreach ($context['_seq'] as $context["_key"] => $context["discount"]) {
                        if ($this->getAttribute($context["discount"], "selected", array(), "array")) {
                            $context["total_selected"] = ((isset($context["total_selected"]) ? $context["total_selected"] : null) + 1);
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['discount'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 251
                    echo "        <a data-tf-reset=\"check\" data-toggle=\"tooltip\" title=\"";
                    echo (isset($context["text_reset"]) ? $context["text_reset"] : null);
                    echo "\" class=\"tf-filter-reset";
                    echo (( !(isset($context["total_selected"]) ? $context["total_selected"] : null)) ? (" hide") : (""));
                    echo "\"><i class=\"fa fa-times\"></i></a>
      ";
                }
                // line 253
                echo "      <i class=\"fa fa-caret-up toggle-icon\"></i>
    </div>
    <div id=\"tf-filter-panel-";
                // line 255
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\" class=\"collapse ";
                echo (( !$this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("in") : (""));
                echo "\" >
      <div class=\"tf-filter-group-content\">
        ";
                // line 257
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter"], "values", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["discount"]) {
                    echo " 
          <div class=\"form-check tf-filter-value custom-radio\">
            <label class=\"form-check-label\">
              ";
                    // line 260
                    if ($this->getAttribute($context["discount"], "selected", array(), "array")) {
                        echo " 
              <input type=\"radio\" value=\"";
                        // line 261
                        echo $this->getAttribute($context["discount"], "value", array(), "array");
                        echo "\" name=\"tf_fd\" class=\"form-check-input\" checked>
              ";
                    } else {
                        // line 262
                        echo " 
              <input type=\"radio\" value=\"";
                        // line 263
                        echo $this->getAttribute($context["discount"], "value", array(), "array");
                        echo "\" name=\"tf_fd\" class=\"form-check-input\" ";
                        echo (( !$this->getAttribute($context["discount"], "status", array(), "array")) ? ("disabled") : (""));
                        echo ">
              ";
                    }
                    // line 265
                    echo "              <span class=\"checkmark fa\"></span>
              ";
                    // line 266
                    echo $this->getAttribute($context["discount"], "name", array(), "array");
                    echo "
            </label>
            ";
                    // line 268
                    if ((isset($context["count_product"]) ? $context["count_product"] : null)) {
                        // line 269
                        echo "              ";
                        if ($this->getAttribute($context["discount"], "total", array(), "array")) {
                            echo " 
              <span class=\"label label-info tf-product-total\">";
                            // line 270
                            echo $this->getAttribute($context["discount"], "total", array(), "array");
                            echo "</span>
              ";
                        } else {
                            // line 272
                            echo "              <span class=\"label label-info label-danger tf-product-total\">";
                            echo $this->getAttribute($context["discount"], "total", array(), "array");
                            echo "</span>
              ";
                        }
                        // line 273
                        echo " 
            ";
                    }
                    // line 275
                    echo "          </div>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['discount'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 277
                echo "      </div>
    </div>
  </div>
  ";
            } elseif (($this->getAttribute(            // line 280
$context["filter"], "type", array(), "array") == "filter")) {
                echo " ";
                // line 281
                echo "  <div class=\"tf-filter-group col-xs-";
                echo twig_round((12 / (isset($context["column_xs"]) ? $context["column_xs"] : null)), 0, "ceil");
                echo " col-sm-";
                echo twig_round((12 / (isset($context["column_sm"]) ? $context["column_sm"] : null)), 0, "ceil");
                echo " col-md-";
                echo twig_round((12 / (isset($context["column_md"]) ? $context["column_md"] : null)), 0, "ceil");
                echo " col-lg-";
                echo twig_round((12 / (isset($context["column_lg"]) ? $context["column_lg"] : null)), 0, "ceil");
                echo "\">
    <div class=\"tf-filter-group-header ";
                // line 282
                echo (($this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("collapsed") : (""));
                echo "\" data-toggle=\"collapse\" href=\"#tf-filter-panel-";
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\">
      <span  class=\"tf-filter-group-title\">";
                // line 283
                echo $this->getAttribute($context["filter"], "name", array(), "array");
                echo "</span>
      ";
                // line 284
                if ((isset($context["reset_group"]) ? $context["reset_group"] : null)) {
                    // line 285
                    echo "        ";
                    $context["total_selected"] = 0;
                    // line 286
                    echo "        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter"], "values", array(), "array"));
                    foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                        if ($this->getAttribute($context["value"], "selected", array(), "array")) {
                            $context["total_selected"] = ((isset($context["total_selected"]) ? $context["total_selected"] : null) + 1);
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 287
                    echo "        <a data-tf-reset=\"check\" data-toggle=\"tooltip\" title=\"";
                    echo (isset($context["text_reset"]) ? $context["text_reset"] : null);
                    echo "\" class=\" tf-filter-reset";
                    echo (( !(isset($context["total_selected"]) ? $context["total_selected"] : null)) ? (" hide") : (""));
                    echo "\"><i class=\"fa fa-times\"></i></a>
      ";
                }
                // line 289
                echo "      <i class=\"fa fa-caret-up toggle-icon\"></i>
    </div>
    <div id=\"tf-filter-panel-";
                // line 291
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\" class=\"collapse ";
                echo (( !$this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("in") : (""));
                echo "\" >
      ";
                // line 292
                if ($this->getAttribute($context["filter"], "search", array(), "array")) {
                    // line 293
                    echo "      <div class=\"tf-filter-group-search\"><i class=\"fa fa-search\"></i> <input type=\"search\" placeholder=\"";
                    echo (isset($context["text_search"]) ? $context["text_search"] : null);
                    echo "\"/></div>
      ";
                }
                // line 295
                echo "      <div class=\"tf-filter-group-content ";
                echo (isset($context["overflow"]) ? $context["overflow"] : null);
                echo "\">
        ";
                // line 296
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter"], "values", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                    echo " 
          <div class=\"form-check tf-filter-value custom-checkbox\">
            <label class=\"form-check-label\">
              ";
                    // line 299
                    if ($this->getAttribute($context["value"], "selected", array(), "array")) {
                        echo " 
              <input type=\"checkbox\" name=\"tf_ff\" value=\"";
                        // line 300
                        echo $this->getAttribute($context["value"], "filter_id", array(), "array");
                        echo "\" class=\"form-check-input\" checked>
              ";
                    } else {
                        // line 301
                        echo " 
              <input type=\"checkbox\" name=\"tf_ff\" value=\"";
                        // line 302
                        echo $this->getAttribute($context["value"], "filter_id", array(), "array");
                        echo "\" class=\"form-check-input\" ";
                        echo (( !$this->getAttribute($context["value"], "status", array(), "array")) ? ("disabled") : (""));
                        echo ">
              ";
                    }
                    // line 304
                    echo "              <span class=\"checkmark fa\"></span>
              ";
                    // line 305
                    echo $this->getAttribute($context["value"], "name", array(), "array");
                    echo "
            </label>
            ";
                    // line 307
                    if ((isset($context["count_product"]) ? $context["count_product"] : null)) {
                        // line 308
                        echo "              ";
                        if ($this->getAttribute($context["value"], "total", array(), "array")) {
                            echo " 
              <span class=\"label label-info tf-product-total\">";
                            // line 309
                            echo $this->getAttribute($context["value"], "total", array(), "array");
                            echo "</span>
              ";
                        } else {
                            // line 311
                            echo "              <span class=\"label label-info label-danger tf-product-total\">";
                            echo $this->getAttribute($context["value"], "total", array(), "array");
                            echo "</span>
              ";
                        }
                        // line 312
                        echo " 
            ";
                    }
                    // line 314
                    echo "          </div>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 316
                echo "        ";
                if ((((isset($context["overflow"]) ? $context["overflow"] : null) == "more") && (twig_length_filter($this->env, $this->getAttribute($context["filter"], "values", array(), "array")) >= 7))) {
                    // line 317
                    echo "          <a class=\"tf-see-more btn-link\" data-toggle=\"tf-seemore\" data-show=\"";
                    echo (isset($context["text_see_more"]) ? $context["text_see_more"] : null);
                    echo "\" data-hide=\"";
                    echo (isset($context["text_see_less"]) ? $context["text_see_less"] : null);
                    echo "\" href=\"#\">";
                    echo (isset($context["text_see_more"]) ? $context["text_see_more"] : null);
                    echo "</a>
        ";
                }
                // line 319
                echo "      </div>
    </div>
  </div>
  ";
            } elseif (($this->getAttribute(            // line 322
$context["filter"], "type", array(), "array") == "custom")) {
                echo " ";
                // line 323
                echo "  <div class=\"tf-filter-group col-xs-";
                echo twig_round((12 / (isset($context["column_xs"]) ? $context["column_xs"] : null)), 0, "ceil");
                echo " col-sm-";
                echo twig_round((12 / (isset($context["column_sm"]) ? $context["column_sm"] : null)), 0, "ceil");
                echo " col-md-";
                echo twig_round((12 / (isset($context["column_md"]) ? $context["column_md"] : null)), 0, "ceil");
                echo " col-lg-";
                echo twig_round((12 / (isset($context["column_lg"]) ? $context["column_lg"] : null)), 0, "ceil");
                echo "\">
    <div class=\"tf-filter-group-header ";
                // line 324
                echo (($this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("collapsed") : (""));
                echo "\" data-toggle=\"collapse\" href=\"#tf-filter-panel-";
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\">
      <span class=\"tf-filter-group-title\">";
                // line 325
                echo $this->getAttribute($context["filter"], "name", array(), "array");
                echo "</span>
      ";
                // line 326
                if ((isset($context["reset_group"]) ? $context["reset_group"] : null)) {
                    // line 327
                    echo "        ";
                    $context["total_selected"] = 0;
                    // line 328
                    echo "        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter"], "values", array(), "array"));
                    foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                        if ($this->getAttribute($context["value"], "selected", array(), "array")) {
                            $context["total_selected"] = ((isset($context["total_selected"]) ? $context["total_selected"] : null) + 1);
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 329
                    echo "        <a data-tf-reset=\"check\" data-toggle=\"tooltip\" title=\"";
                    echo (isset($context["text_reset"]) ? $context["text_reset"] : null);
                    echo "\" class=\"tf-filter-reset";
                    echo (( !(isset($context["total_selected"]) ? $context["total_selected"] : null)) ? (" hide") : (""));
                    echo "\"><i class=\"fa fa-times\"></i></a>
      ";
                }
                // line 331
                echo "      <i class=\"fa fa-caret-up toggle-icon\"></i>
    </div>
    <div id=\"tf-filter-panel-";
                // line 333
                echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
                echo "-";
                echo $context["key"];
                echo "\" data-custom-filter=\"";
                echo $this->getAttribute($context["filter"], "filter_id", array(), "array");
                echo "\" class=\"collapse ";
                echo (( !$this->getAttribute($context["filter"], "collapse", array(), "array")) ? ("in") : (""));
                echo "\" >
      ";
                // line 334
                if ($this->getAttribute($context["filter"], "search", array(), "array")) {
                    // line 335
                    echo "      <div class=\"tf-filter-group-search\"><i class=\"fa fa-search\"></i> <input type=\"search\" placeholder=\"";
                    echo (isset($context["text_search"]) ? $context["text_search"] : null);
                    echo "\"/></div>
      ";
                }
                // line 337
                echo "      <div class=\"tf-filter-group-content ";
                echo (isset($context["overflow"]) ? $context["overflow"] : null);
                echo "\">
        ";
                // line 338
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter"], "values", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                    // line 339
                    echo "        <div class=\"form-check tf-filter-value custom-";
                    echo $this->getAttribute($context["filter"], "input_type", array(), "array");
                    echo " ";
                    echo $this->getAttribute($context["filter"], "list_type", array(), "array");
                    echo "\">
          <label class=\"form-check-label\">
            ";
                    // line 341
                    if ($this->getAttribute($context["value"], "selected", array(), "array")) {
                        echo " 
            <input type=\"";
                        // line 342
                        echo $this->getAttribute($context["filter"], "input_type", array(), "array");
                        echo "\" name=\"tf_fc";
                        echo $this->getAttribute($context["filter"], "filter_id", array(), "array");
                        echo "\" value=\"";
                        echo $this->getAttribute($context["value"], "value_id", array(), "array");
                        echo "\" class=\"form-check-input\" checked>
            ";
                    } else {
                        // line 343
                        echo " 
            <input type=\"";
                        // line 344
                        echo $this->getAttribute($context["filter"], "input_type", array(), "array");
                        echo "\" name=\"tf_fc";
                        echo $this->getAttribute($context["filter"], "filter_id", array(), "array");
                        echo "\" value=\"";
                        echo $this->getAttribute($context["value"], "value_id", array(), "array");
                        echo "\" class=\"form-check-input\" ";
                        echo (( !$this->getAttribute($context["value"], "status", array(), "array")) ? ("disabled") : (""));
                        echo ">
            ";
                    }
                    // line 345
                    echo " 
            ";
                    // line 346
                    if ((($this->getAttribute($context["filter"], "list_type", array(), "array") == "image") || ($this->getAttribute($context["filter"], "list_type", array(), "array") == "both"))) {
                        echo " 
            <img src=\"";
                        // line 347
                        echo $this->getAttribute($context["value"], "image", array(), "array");
                        echo "\" title=\"";
                        echo $this->getAttribute($context["value"], "name", array(), "array");
                        echo "\" alt=\"";
                        echo $this->getAttribute($context["value"], "name", array(), "array");
                        echo "\" />
            ";
                    } else {
                        // line 349
                        echo "            <span class=\"checkmark fa\"></span>
            ";
                    }
                    // line 350
                    echo " 
            ";
                    // line 351
                    if ((($this->getAttribute($context["filter"], "list_type", array(), "array") == "text") || ($this->getAttribute($context["filter"], "list_type", array(), "array") == "both"))) {
                        echo " 
              ";
                        // line 352
                        echo $this->getAttribute($context["value"], "name", array(), "array");
                        echo "
            ";
                    }
                    // line 354
                    echo "          </label>
          ";
                    // line 355
                    if (((isset($context["count_product"]) ? $context["count_product"] : null) && ($this->getAttribute($context["filter"], "list_type", array(), "array") != "image"))) {
                        // line 356
                        echo "            ";
                        if ($this->getAttribute($context["value"], "total", array(), "array")) {
                            echo " 
            <span class=\"label label-info tf-product-total\">";
                            // line 357
                            echo $this->getAttribute($context["value"], "total", array(), "array");
                            echo "</span>
            ";
                        } else {
                            // line 359
                            echo "            <span class=\"label label-info label-danger tf-product-total\">";
                            echo $this->getAttribute($context["value"], "total", array(), "array");
                            echo "</span>
            ";
                        }
                        // line 360
                        echo " 
          ";
                    }
                    // line 362
                    echo "        </div>
       ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 364
                echo "       ";
                if ((((isset($context["overflow"]) ? $context["overflow"] : null) == "more") && (twig_length_filter($this->env, $this->getAttribute($context["filter"], "values", array(), "array")) >= 7))) {
                    // line 365
                    echo "        <a class=\"tf-see-more btn-link\" data-toggle=\"tf-seemore\" data-show=\"";
                    echo (isset($context["text_see_more"]) ? $context["text_see_more"] : null);
                    echo "\" data-hide=\"";
                    echo (isset($context["text_see_less"]) ? $context["text_see_less"] : null);
                    echo "\" href=\"#\">";
                    echo (isset($context["text_see_more"]) ? $context["text_see_more"] : null);
                    echo "</a>
       ";
                }
                // line 367
                echo "      </div>
    </div>
  </div>
  ";
            }
            // line 370
            echo " 
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['filter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 372
        echo "</div>
</div>
<script>
\$(function(){
    if(window.innerWidth < 767){ // Collaped all panel in small device
        \$('.tf-filter .collapse.in').collapse(\"hide\");
    }
    
    // Filter
    var paginationContainer = \$('#content').children('.row').last();
    var productContainer = \$('.products-list');    
    productContainer.css('position', 'relative');
    \$('#tf-filter-";
        // line 384
        echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
        echo "').tf_filter({
        requestURL: \"";
        // line 385
        echo (isset($context["requestURL"]) ? $context["requestURL"] : null);
        echo "\",
        searchEl: \$('.tf-filter-group-search input'),
        ajax: ";
        // line 387
        echo (((isset($context["ajax"]) ? $context["ajax"] : null)) ? ("true") : ("false"));
        echo ",
        delay: ";
        // line 388
        echo (((isset($context["delay"]) ? $context["delay"] : null)) ? ("true") : ("false"));
        echo ",
        search_in_description: ";
        // line 389
        echo (((isset($context["search_in_description"]) ? $context["search_in_description"] : null)) ? ("true") : ("false"));
        echo ",
        countProduct: ";
        // line 390
        echo (((isset($context["count_product"]) ? $context["count_product"] : null)) ? ("true") : ("false"));
        echo ",
        sortBy: '";
        // line 391
        echo (isset($context["sort_by"]) ? $context["sort_by"] : null);
        echo "',
        onParamChange: function(param){
           /* \$(\"#input-limit,#input-sort\").find('option').each(function(){
                var url = \$(this).attr('value');
                \$(this).attr('value', modifyURLQuery(url, \$.extend({}, param, {page: null})));
            });*/
            var currency = \$('#form-currency input[name=\"redirect\"]');
            currency.val(modifyURLQuery(currency.val(), \$.extend({}, param, {tf_fp: null, page: null})));
            
            // Show or hide reset all button
            if(\$('.tf-filter-group [data-tf-reset]:not(.hide)').length){
                \$('[data-tf-reset=\"all\"]').removeClass('hide');
            } else {
                \$('[data-tf-reset=\"all\"]').addClass('hide');
            }
        },
        onInputChange: function(e){
            var filter_group = \$(e.target).closest('.tf-filter-group');
            
            var is_input_selected = false;
            
            // Hide Reset for Checkbox or radio
            if(filter_group.find('input[type=\"checkbox\"]:checked,input[type=\"radio\"]:checked').length){
                is_input_selected = true;
            }
            
            // Hide Reset for price
            if(\$(e.target).filter('[name=\"tf_fp[min]\"],[name=\"tf_fp[max]\"]').length){
                if(\$('[name=\"tf_fp[min]\"]').val() !== \$('[name=\"tf_fp[min]\"]').attr('min') || \$('[name=\"tf_fp[max]\"]').val() !== \$('[name=\"tf_fp[max]\"]').attr('max')){
                    is_input_selected = true;
                   
                }
            }
            
            // Hide reset for text
            if(\$(e.target).filter('[type=\"text\"]').val()){
                is_input_selected = true;
            }
            
            // Hide or show reset buton
            if(is_input_selected){
                filter_group.find('[data-tf-reset]').removeClass('hide');
            } else {
                filter_group.find('[data-tf-reset]').addClass('hide');
            }
        },
        onReset: function(el_reset){
          var type = \$(el_reset).data('tf-reset');
            
          // Reset price
          if(type === 'price' || type === 'all'){
            price_slider.slider(\"values\", [parseFloat(price_slider.slider(\"option\", 'min')), parseFloat(price_slider.slider(\"option\", 'max'))]);
          }
            
            // Hide reset button
        },
        onBeforeSend: function(){
          productContainer.append('<div class=\"tf-loader\"><img src=\"catalog/view/javascript/maza/loader.gif\" /></div>');
        },
        onResult: function(json){
          let html = '', data=json.products, page=1;
          
          for( let ind in data ){
          
            let product = data[ind];
        
            html += '<div class=\"product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12\" data-page=\"'+ page +'\">';
            html += '<div class=\"product-item-container\">';   
            html += '<div class=\"left-block left-b\">';
            html += '<div class=\"product-image-container\">';
            html += '<a href=\"' + product.href + '\" title=\"' + product.name + '\">'; // target=\"_blank\" 09.01.2023
            html += '<img  data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"' + product.thumb + '\"  title=\"' + product.name + '\" class=\"lazyload img-responsive\" />';
            html += '</a>';
            html += '</div>';
            html += '</div>';       
            html += '<div class=\"right-block right-b\">';
            html += '<h4><a href=\"' + product.href + '\" >' + product.name + '</a></h4>'; // target=\"_blank\" 09.01.2023
            
            if ( product.price ){ 
              html += '<div class=\"price\">';
              if ( !product.special ) {
                html += '<span class=\"price-new\">' + product.price + '</span>';
              }else {   
                html += '<span class=\"price-new\">' + product.special + '</span> <span class=\"price-old\">' + product.price + '</span>';
              } 
                html += '</div>';
              }         
              html += '<div class=\"description\">';
              html += '<p>' + product.description + '</p>';
              html += '</div>';
              html += '</div>';
              html += '</div>';
              html += '</div>';
            }
           
            \$(productContainer).html(html);
          }
        });
    
    // Price slider
    var price_slider = \$(\".tf-filter [data-role='rangeslider']\").slider({
        range: true,
        min: parseFloat(\$('[name=\"tf_fp[min]\"]').attr('min')),
        max: parseFloat(\$('[name=\"tf_fp[max]\"]').attr('max')),
        values: [parseFloat(\$('[name=\"tf_fp[min]\"]').val()), parseFloat(\$('[name=\"tf_fp[max]\"]').val())],
        slide: function( event, ui ) {
            \$('[name=\"tf_fp[min]\"]').val(ui.values[0]);
            \$('[name=\"tf_fp[max]\"]').val(ui.values[1]);
        },
        change: function( event, ui ) {
            // Hide Reset for price
            if(\$('[name=\"tf_fp[min]\"]').val() !== \$('[name=\"tf_fp[min]\"]').attr('min') || \$('[name=\"tf_fp[max]\"]').val() !== \$('[name=\"tf_fp[max]\"]').attr('max')){
                \$('.kai-p-selected').removeClass('hidden-p-filter');
                \$('.kai-p-selected .kai-min-pr').text(\$('[name=\"tf_fp[min]\"]').val())
                \$('.kai-p-selected .kai-max-pr').text(\$('[name=\"tf_fp[max]\"]').val())
                
            } else {
                \$('.kai-p-selected').addClass('hidden-p-filter');
            }
            
            // Trigger filter change
            \$('#tf-filter-";
        // line 512
        echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
        echo "').change();
        }
    });
    \$('[name=\"tf_fp[min]\"]').change(function(){
        price_slider.slider(\"values\", 0, \$(this).val());
    });
    \$('[name=\"tf_fp[max]\"]').change(function(){
        price_slider.slider(\"values\", 1, \$(this).val());
    });
    
    // Show reset all button if filter is selected
    if(\$('.tf-filter-group [data-tf-reset]:not(.hide)').length){
        \$('[data-tf-reset=\"all\"]').removeClass('hide');
    }
    
    // Fix z-index
    \$('.tf-filter-group .collapse').on('show.bs.collapse', function(){
        var z_index = Number(\$('#tf-filter-content-";
        // line 529
        echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
        echo "').data('mz-base-z-index')) + 1;
        \$(this).css('z-index', z_index);
        \$('#tf-filter-content-";
        // line 531
        echo (isset($context["module_class_id"]) ? $context["module_class_id"] : null);
        echo "').data('mz-base-z-index', z_index);
    });
});
</script>
<link href=\"catalog/view/theme/default/stylesheet/tf_filter.css\" rel=\"stylesheet\" media=\"screen\" />";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/module/tf_filter.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1587 => 531,  1582 => 529,  1562 => 512,  1438 => 391,  1434 => 390,  1430 => 389,  1426 => 388,  1422 => 387,  1417 => 385,  1413 => 384,  1399 => 372,  1392 => 370,  1386 => 367,  1376 => 365,  1373 => 364,  1366 => 362,  1362 => 360,  1356 => 359,  1351 => 357,  1346 => 356,  1344 => 355,  1341 => 354,  1336 => 352,  1332 => 351,  1329 => 350,  1325 => 349,  1316 => 347,  1312 => 346,  1309 => 345,  1298 => 344,  1295 => 343,  1286 => 342,  1282 => 341,  1274 => 339,  1270 => 338,  1265 => 337,  1259 => 335,  1257 => 334,  1247 => 333,  1243 => 331,  1235 => 329,  1223 => 328,  1220 => 327,  1218 => 326,  1214 => 325,  1206 => 324,  1195 => 323,  1192 => 322,  1187 => 319,  1177 => 317,  1174 => 316,  1167 => 314,  1163 => 312,  1157 => 311,  1152 => 309,  1147 => 308,  1145 => 307,  1140 => 305,  1137 => 304,  1130 => 302,  1127 => 301,  1122 => 300,  1118 => 299,  1110 => 296,  1105 => 295,  1099 => 293,  1097 => 292,  1089 => 291,  1085 => 289,  1077 => 287,  1065 => 286,  1062 => 285,  1060 => 284,  1056 => 283,  1048 => 282,  1037 => 281,  1034 => 280,  1029 => 277,  1022 => 275,  1018 => 273,  1012 => 272,  1007 => 270,  1002 => 269,  1000 => 268,  995 => 266,  992 => 265,  985 => 263,  982 => 262,  977 => 261,  973 => 260,  965 => 257,  956 => 255,  952 => 253,  944 => 251,  932 => 250,  929 => 249,  927 => 248,  923 => 247,  915 => 246,  904 => 245,  901 => 244,  895 => 240,  888 => 239,  884 => 237,  878 => 236,  873 => 234,  868 => 233,  866 => 232,  861 => 230,  857 => 228,  850 => 227,  845 => 225,  839 => 223,  833 => 222,  829 => 220,  822 => 218,  819 => 217,  814 => 216,  810 => 215,  802 => 212,  793 => 210,  789 => 208,  781 => 206,  769 => 205,  766 => 204,  764 => 203,  760 => 202,  752 => 201,  741 => 200,  738 => 199,  732 => 195,  728 => 193,  722 => 192,  717 => 190,  712 => 189,  710 => 188,  705 => 186,  701 => 184,  696 => 183,  693 => 182,  687 => 180,  682 => 177,  678 => 175,  672 => 174,  667 => 172,  662 => 171,  660 => 170,  655 => 168,  651 => 166,  646 => 165,  643 => 164,  637 => 162,  626 => 158,  622 => 156,  619 => 155,  613 => 153,  607 => 151,  604 => 150,  602 => 149,  598 => 148,  590 => 147,  579 => 146,  576 => 145,  567 => 141,  558 => 139,  554 => 137,  551 => 136,  545 => 134,  539 => 132,  536 => 131,  534 => 130,  530 => 129,  522 => 128,  511 => 127,  508 => 126,  503 => 123,  493 => 121,  490 => 120,  483 => 118,  479 => 116,  473 => 115,  468 => 113,  463 => 112,  461 => 111,  458 => 110,  453 => 108,  449 => 107,  446 => 106,  442 => 105,  433 => 103,  429 => 102,  426 => 101,  417 => 100,  414 => 99,  407 => 98,  403 => 97,  396 => 95,  390 => 94,  385 => 93,  379 => 91,  377 => 90,  369 => 89,  365 => 87,  357 => 85,  345 => 84,  342 => 83,  340 => 82,  336 => 81,  328 => 80,  317 => 79,  314 => 78,  308 => 74,  298 => 72,  295 => 71,  288 => 69,  284 => 67,  278 => 66,  273 => 64,  268 => 63,  266 => 62,  263 => 61,  258 => 59,  254 => 58,  251 => 57,  247 => 56,  238 => 54,  234 => 53,  231 => 52,  222 => 51,  219 => 50,  212 => 49,  208 => 48,  201 => 46,  195 => 45,  190 => 44,  184 => 42,  182 => 41,  174 => 40,  170 => 38,  162 => 36,  150 => 35,  147 => 34,  145 => 33,  141 => 32,  133 => 31,  122 => 30,  119 => 29,  106 => 23,  98 => 22,  87 => 18,  80 => 14,  72 => 13,  61 => 12,  58 => 11,  52 => 10,  46 => 9,  42 => 7,  36 => 5,  34 => 4,  30 => 3,  24 => 2,  19 => 1,);
    }
}
/* <div id="tf-filter-{{ module_class_id }}" class="panel tf-filter panel-default">*/
/* <div data-toggle="collapse" href="#tf-filter-content-{{ module_class_id }}" class="panel-heading{{ collapsed?' collapsed' }}">*/
/*   <h4 class="panel-title">{{ heading_title }}</h4>*/
/*   {% if reset_all %}*/
/*     <span data-tf-reset="all" data-toggle="tooltip" title="{{ text_reset_all }}" class="tf-filter-reset hide text-danger"><i class="fa fa-times"></i></span>*/
/*   {% endif %}*/
/*   <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>*/
/* </div>*/
/* <div id="tf-filter-content-{{ module_class_id }}" data-mz-base-z-index="99" class="collapse{{ not collapsed?' in' }} tf-list-filter-group row">*/
/* {% for key,filter in filters %} */
/*   {% if (filter['type'] == 'price') %} {# price range #}*/
/*   <div class="tf-filter-group col-xs-{{ (12/column_xs)|round(0, 'ceil') }} col-sm-{{ (12/column_sm)|round(0, 'ceil') }} col-md-{{ (12/column_md)|round(0, 'ceil') }} col-lg-{{ (12/column_lg)|round(0, 'ceil') }}">*/
/*     <div class="tf-filter-group-header {{ filter['collapse']?'collapsed' }}" data-toggle="collapse" href="#tf-filter-panel-{{ module_class_id }}-{{ key }}">*/
/*       <span class="tf-filter-group-title">{{ text_price }}</span>*/
/*      */
/*       <i class="fa fa-caret-up toggle-icon"></i>*/
/*     </div>*/
/*     <div id="tf-filter-panel-{{ module_class_id }}-{{ key }}" class="collapse {{ not filter['collapse']?'in':'' }}" >*/
/*       <div class="tf-filter-group-content">*/
/*         <div data-role="rangeslider"></div>*/
/*         <div class="row">*/
/*           <div class="col-xs-6"><input type="number" id="min-price" class="form-control" name="tf_fp[min]" value="{{ filter['selected']['min'] }}" min="{{ filter['min_price'] }}" max="{{ filter['max_price'] - 1 }}" /></div>*/
/*           <div class="col-xs-6"><input type="number" id="max-price" class="form-control" name="tf_fp[max]" value="{{ filter['selected']['max'] }}" min="{{ filter['min_price'] + 1 }}" max="{{ filter['max_price'] }}" /></div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*         */
/*   {% elseif (filter['type'] == 'sub_category' and filter['values']) %} {# Manufacturer #}*/
/*   <div class="tf-filter-group col-xs-{{ (12/column_xs)|round(0, 'ceil') }} col-sm-{{ (12/column_sm)|round(0, 'ceil') }} col-md-{{ (12/column_md)|round(0, 'ceil') }} col-lg-{{ (12/column_lg)|round(0, 'ceil') }}">*/
/*     <div class="tf-filter-group-header {{ filter['collapse']?'collapsed' }}" data-toggle="collapse" href="#tf-filter-panel-{{ module_class_id }}-{{ key }}">*/
/*       <span class="tf-filter-group-title">{{ text_sub_category }}</span>*/
/*       {% if reset_group %}*/
/*         {% set total_selected = 0 %}*/
/*         {% for sub_category in filter['values'] if sub_category['selected'] %}{% set total_selected = total_selected + 1 %}{% endfor %}*/
/*         <a data-tf-reset="check" data-toggle="tooltip" title="{{ text_reset }}" class=" tf-filter-reset{{ not total_selected?' hide' }}"><i class="fa fa-times"></i></a>*/
/*       {% endif %}*/
/*       <i class="fa fa-caret-up toggle-icon"></i>*/
/*     </div>*/
/*     <div id="tf-filter-panel-{{ module_class_id }}-{{ key }}" class="collapse {{ not filter['collapse']?'in':'' }}" >*/
/*       {% if filter['search'] %}*/
/*       <div class="tf-filter-group-search"><i class="fa fa-search"></i> <input type="search" placeholder="{{ text_search }}"/></div>*/
/*       {% endif %}*/
/*       <div class="tf-filter-group-content {{ overflow }}">*/
/*       {% for sub_category in filter['values'] %} */
/*         <div class="form-check tf-filter-value custom-{{ filter['input_type'] }} {{ filter['list_type'] }}">*/
/*           <label class="form-check-label">*/
/*             {% if (sub_category['selected']) %} */
/*             <input type="{{ filter['input_type'] }}" name="tf_fsc" value="{{ sub_category['category_id'] }}" class="form-check-input" checked>*/
/*             {% else %} */
/*             <input type="{{ filter['input_type'] }}" name="tf_fsc" value="{{ sub_category['category_id'] }}" class="form-check-input" {{ not sub_category['status']?'disabled' }}>*/
/*             {% endif %} */
/*             {% if (filter['list_type'] == 'image' or filter['list_type'] == 'both') %} */
/*             <img src="{{ sub_category['image'] }}" title="{{ sub_category['name'] }}" alt="{{ sub_category['name'] }}" />*/
/*             {% else %}*/
/*             <span class="checkmark fa"></span>*/
/*             {% endif %} */
/*             {% if (filter['list_type'] == 'text' or filter['list_type'] == 'both') %} */
/*               {{ sub_category['name'] }}*/
/*             {% endif %}*/
/*           </label>*/
/*           {% if count_product and filter['list_type'] != 'image' %}*/
/*             {% if (sub_category['total']) %} */
/*             <span class="label label-info tf-product-total">{{ sub_category['total'] }}</span>*/
/*             {% else %}*/
/*             <span class="label label-info label-danger tf-product-total">{{ sub_category['total'] }}</span>*/
/*             {% endif %} */
/*           {% endif %}*/
/*         </div>*/
/*       {% endfor %}*/
/*       {% if overflow == 'more' and filter['values']|length >= 7 %}*/
/*         <a class="tf-see-more btn-link" data-toggle="tf-seemore" data-show="{{ text_see_more }}" data-hide="{{ text_see_less }}" href="#">{{ text_see_more }}</a>*/
/*       {% endif %}*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*       */
/*   {% elseif (filter['type'] == 'manufacturer' and filter['values']) %} {# Manufacturer #}*/
/*   <div class="tf-filter-group col-xs-{{ (12/column_xs)|round(0, 'ceil') }} col-sm-{{ (12/column_sm)|round(0, 'ceil') }} col-md-{{ (12/column_md)|round(0, 'ceil') }} col-lg-{{ (12/column_lg)|round(0, 'ceil') }}">*/
/*     <div class="tf-filter-group-header {{ filter['collapse']?'collapsed' }}" data-toggle="collapse" href="#tf-filter-panel-{{ module_class_id }}-{{ key }}">*/
/*       <span class="tf-filter-group-title">{{ text_manufacturer }}</span>*/
/*       {% if reset_group %}*/
/*         {% set total_selected = 0 %}*/
/*         {% for manufacturer in filter['values'] if manufacturer['selected'] %}{% set total_selected = total_selected + 1 %}{% endfor %}*/
/*         <a data-tf-reset="check" data-toggle="tooltip" title="{{ text_reset }}" class=" tf-filter-reset{{ not total_selected?' hide' }}"><i class="fa fa-times"></i></a>*/
/*       {% endif %}*/
/*       <i class="fa fa-caret-up toggle-icon"></i>*/
/*     </div>*/
/*     <div id="tf-filter-panel-{{ module_class_id }}-{{ key }}" class="collapse {{ not filter['collapse']?'in':'' }}" >*/
/*       {% if filter['search'] %}*/
/*       <div class="tf-filter-group-search"><i class="fa fa-search"></i> <input type="search" placeholder="{{ text_search }}"/></div>*/
/*       {% endif %}*/
/*       <div class="tf-filter-group-content {{ overflow }}">*/
/*       {% for manufacturer in filter['values'] %} */
/*         <div class="form-check tf-filter-value custom-{{ filter['input_type'] }} {{ filter['list_type'] }}">*/
/*           <label class="form-check-label">*/
/*             {% if (manufacturer['selected']) %} */
/*             <input type="{{ filter['input_type'] }}" name="tf_fm" value="{{ manufacturer['manufacturer_id'] }}" class="form-check-input" checked>*/
/*             {% else %} */
/*             <input type="{{ filter['input_type'] }}" name="tf_fm" value="{{ manufacturer['manufacturer_id'] }}" class="form-check-input" {{ not manufacturer['status']?'disabled' }}>*/
/*             {% endif %} */
/*             {% if (filter['list_type'] == 'image' or filter['list_type'] == 'both') %} */
/*             <img src="{{ manufacturer['image'] }}" title="{{ manufacturer['name'] }}" alt="{{ manufacturer['name'] }}" />*/
/*             {% else %}*/
/*             <span class="checkmark fa"></span>*/
/*             {% endif %} */
/*             {% if (filter['list_type'] == 'text' or filter['list_type'] == 'both') %} */
/*               {{ manufacturer['name'] }}*/
/*             {% endif %}*/
/*           </label>*/
/*           {% if count_product and filter['list_type'] != 'image' %}*/
/*             {% if (manufacturer['total']) %} */
/*             <span class="label label-info tf-product-total">{{ manufacturer['total'] }}</span>*/
/*             {% else %}*/
/*             <span class="label label-info label-danger tf-product-total">{{ manufacturer['total'] }}</span>*/
/*             {% endif %} */
/*           {% endif %}*/
/*         </div>*/
/*       {% endfor %}*/
/*       {% if overflow == 'more' and filter['values']|length >= 7 %}*/
/*         <a class="tf-see-more btn-link" data-toggle="tf-seemore" data-show="{{ text_see_more }}" data-hide="{{ text_see_less }}" href="#">{{ text_see_more }}</a>*/
/*       {% endif %}*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   {% elseif (filter['type'] == 'search') %} {# Search #}*/
/*   <div class="tf-filter-group col-xs-{{ (12/column_xs)|round(0, 'ceil') }} col-sm-{{ (12/column_sm)|round(0, 'ceil') }} col-md-{{ (12/column_md)|round(0, 'ceil') }} col-lg-{{ (12/column_lg)|round(0, 'ceil') }}">*/
/*     <div class="tf-filter-group-header {{ filter['collapse']?'collapsed' }}" data-toggle="collapse" href="#tf-filter-panel-{{ module_class_id }}-{{ key }}">*/
/*       <span  class="tf-filter-group-title">{{ text_search }}</span>*/
/*       {% if reset_group %}*/
/*         {% if filter['keyword'] %}*/
/*         <a data-tf-reset="text" data-toggle="tooltip" title="{{ text_reset }}" class="tf-filter-reset"><i class="fa fa-times"></i></a>*/
/*         {% else %}*/
/*         <a data-tf-reset="text" data-toggle="tooltip" title="{{ text_reset }}" class="tf-filter-reset hide"><i class="fa fa-times"></i></a>*/
/*         {% endif %}*/
/*       {% endif %}*/
/*       <i class="fa fa-caret-up toggle-icon"></i>*/
/*     </div>*/
/*     <div id="tf-filter-panel-{{ module_class_id }}-{{ key }}" class="collapse {{ not filter['collapse']?'in':'' }}" >*/
/*       <div class="tf-filter-group-content">*/
/*         <input type="text" name="tf_fq" value="{{ filter['keyword'] }}" placeholder="{{ text_search_placeholder }}" class="form-control" />*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   {% elseif (filter['type'] == 'availability') %} {# Availability #}*/
/*   <div class="tf-filter-group col-xs-{{ (12/column_xs)|round(0, 'ceil') }} col-sm-{{ (12/column_sm)|round(0, 'ceil') }} col-md-{{ (12/column_md)|round(0, 'ceil') }} col-lg-{{ (12/column_lg)|round(0, 'ceil') }}">*/
/*     <div class="tf-filter-group-header {{ filter['collapse']?'collapsed' }}" data-toggle="collapse" href="#tf-filter-panel-{{ module_class_id }}-{{ key }}">*/
/*       <span class="tf-filter-group-title">{{ text_availability }}</span>*/
/*       {% if reset_group %}*/
/*         {% if filter['values']['in_stock']['selected'] or filter['values']['out_of_stock']['selected'] %}*/
/*         <a data-tf-reset="check" data-toggle="tooltip" title="{{ text_reset }}" class=" tf-filter-reset"><i class="fa fa-times"></i></a>*/
/*         {% else %}*/
/*         <a data-tf-reset="check" data-toggle="tooltip" title="{{ text_reset }}" class=" tf-filter-reset hide"><i class="fa fa-times"></i></a>*/
/*         {% endif %}*/
/*       {% endif %}*/
/*       <i class="fa fa-caret-up toggle-icon"></i>*/
/*     </div>*/
/*     <div id="tf-filter-panel-{{ module_class_id }}-{{ key }}" class="collapse {{ not filter['collapse']?'in':'' }}" >*/
/*       <div class="tf-filter-group-content">*/
/*         <div class="form-check tf-filter-value custom-radio">*/
/*           <label class="form-check-label">*/
/*             {% if (filter['values']['in_stock']['selected']) %} */
/*             <input type="radio" value="1" name="tf_fs" class="form-check-input" checked>*/
/*             {% else %} */
/*             <input type="radio" value="1" name="tf_fs" class="form-check-input" {{ not filter['values']['in_stock']['status']?'disabled' }}>*/
/*             {% endif %} */
/*             <span class="checkmark fa"></span>*/
/*             {{ text_in_stock }}*/
/*           </label>*/
/*           {% if count_product %}*/
/*             {% if (filter['values']['in_stock']['total']) %} */
/*             <span class="label label-info tf-product-total">{{ filter['values']['in_stock']['total'] }}</span>*/
/*             {% else %}*/
/*             <span class="label label-info label-danger tf-product-total">{{ filter['values']['in_stock']['total'] }}</span>*/
/*             {% endif %} */
/*           {% endif %}*/
/*         </div>*/
/*         <div class="form-check tf-filter-value custom-radio">*/
/*           <label class="form-check-label">*/
/*             {% if (filter['values']['out_of_stock']['selected']) %} */
/*             <input type="radio" value="0" name="tf_fs" class="form-check-input" checked>*/
/*             {% else %} */
/*             <input type="radio" value="0" name="tf_fs" class="form-check-input" {{ not filter['values']['out_of_stock']['status']?'disabled' }}>*/
/*             {% endif %} */
/*             <span class="checkmark fa"></span>*/
/*             {{ text_out_of_stock }}*/
/*           </label>*/
/*           {% if count_product %}*/
/*             {% if (filter['values']['out_of_stock']['total']) %} */
/*             <span class="label label-info tf-product-total">{{ filter['values']['out_of_stock']['total'] }}</span>*/
/*             {% else %}*/
/*             <span class="label label-info label-danger tf-product-total">{{ filter['values']['out_of_stock']['total'] }}</span>*/
/*             {% endif %} */
/*           {% endif %}*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   {% elseif (filter['type'] == 'rating') %} {# Rating #}*/
/*   <div class="tf-filter-group col-xs-{{ (12/column_xs)|round(0, 'ceil') }} col-sm-{{ (12/column_sm)|round(0, 'ceil') }} col-md-{{ (12/column_md)|round(0, 'ceil') }} col-lg-{{ (12/column_lg)|round(0, 'ceil') }}">*/
/*     <div class="tf-filter-group-header {{ filter['collapse']?'collapsed' }}" data-toggle="collapse" href="#tf-filter-panel-{{ module_class_id }}-{{ key }}">*/
/*       <span class="tf-filter-group-title">{{ text_rating }}</span>*/
/*       {% if reset_group %}*/
/*         {% set total_selected = 0 %}*/
/*         {% for rating in filter['values'] if rating['selected'] %}{% set total_selected = total_selected + 1 %}{% endfor %}*/
/*         <a data-tf-reset="check" data-toggle="tooltip" title="{{ text_reset }}" class="tf-filter-reset{{ not total_selected?' hide' }}"><i class="fa fa-times"></i></a>*/
/*       {% endif %}*/
/*       <i class="fa fa-caret-up toggle-icon"></i>*/
/*     </div>*/
/*     <div id="tf-filter-panel-{{ module_class_id }}-{{ key }}" class="collapse {{ not filter['collapse']?'in':'' }}" >*/
/*       <div class="tf-filter-group-content">*/
/*         {% for rating in filter['values'] %} */
/*           <div class="form-check tf-filter-value custom-radio">*/
/*             <label class="form-check-label">*/
/*               {% if (rating['selected']) %} */
/*               <input type="radio" value="{{ rating['rating'] }}" name="tf_fr" class="form-check-input" checked>*/
/*               {% else %} */
/*               <input type="radio" value="{{ rating['rating'] }}" name="tf_fr" class="form-check-input" {{ not rating['status']?'disabled' }}>*/
/*               {% endif %}*/
/*               <span class="checkmark fa"></span>*/
/*               <span class="rating">*/
/*                 {% for i in range(1, 5) %} */
/*                   {% if (rating['rating'] < i) %} */
/*                   <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>*/
/*                   {% else %} */
/*                   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>*/
/*                   {% endif %} */
/*                 {% endfor %} */
/*               </span>*/
/*               {{ text_and_up }}*/
/*             </label>*/
/*             {% if count_product %}*/
/*               {% if (rating['total']) %} */
/*               <span class="label label-info tf-product-total">{{ rating['total'] }}</span>*/
/*               {% else %}*/
/*               <span class="label label-info label-danger tf-product-total">{{ rating['total'] }}</span>*/
/*               {% endif %} */
/*             {% endif %}*/
/*           </div>*/
/*         {% endfor %} */
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   {% elseif (filter['type'] == 'discount') %} {# Discount #}*/
/*   <div class="tf-filter-group col-xs-{{ (12/column_xs)|round(0, 'ceil') }} col-sm-{{ (12/column_sm)|round(0, 'ceil') }} col-md-{{ (12/column_md)|round(0, 'ceil') }} col-lg-{{ (12/column_lg)|round(0, 'ceil') }}">*/
/*     <div class="tf-filter-group-header {{ filter['collapse']?'collapsed' }}" data-toggle="collapse" href="#tf-filter-panel-{{ module_class_id }}-{{ key }}">*/
/*       <span class="tf-filter-group-title">{{ text_discount }}</span>*/
/*       {% if reset_group %}*/
/*         {% set total_selected = 0 %}*/
/*         {% for discount in filter['values'] if discount['selected'] %}{% set total_selected = total_selected + 1 %}{% endfor %}*/
/*         <a data-tf-reset="check" data-toggle="tooltip" title="{{ text_reset }}" class="tf-filter-reset{{ not total_selected?' hide' }}"><i class="fa fa-times"></i></a>*/
/*       {% endif %}*/
/*       <i class="fa fa-caret-up toggle-icon"></i>*/
/*     </div>*/
/*     <div id="tf-filter-panel-{{ module_class_id }}-{{ key }}" class="collapse {{ not filter['collapse']?'in':'' }}" >*/
/*       <div class="tf-filter-group-content">*/
/*         {% for discount in filter['values'] %} */
/*           <div class="form-check tf-filter-value custom-radio">*/
/*             <label class="form-check-label">*/
/*               {% if (discount['selected']) %} */
/*               <input type="radio" value="{{ discount['value'] }}" name="tf_fd" class="form-check-input" checked>*/
/*               {% else %} */
/*               <input type="radio" value="{{ discount['value'] }}" name="tf_fd" class="form-check-input" {{ not discount['status']?'disabled' }}>*/
/*               {% endif %}*/
/*               <span class="checkmark fa"></span>*/
/*               {{ discount['name'] }}*/
/*             </label>*/
/*             {% if count_product %}*/
/*               {% if (discount['total']) %} */
/*               <span class="label label-info tf-product-total">{{ discount['total'] }}</span>*/
/*               {% else %}*/
/*               <span class="label label-info label-danger tf-product-total">{{ discount['total'] }}</span>*/
/*               {% endif %} */
/*             {% endif %}*/
/*           </div>*/
/*         {% endfor %}*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   {% elseif (filter['type'] == 'filter') %} {# Filter #}*/
/*   <div class="tf-filter-group col-xs-{{ (12/column_xs)|round(0, 'ceil') }} col-sm-{{ (12/column_sm)|round(0, 'ceil') }} col-md-{{ (12/column_md)|round(0, 'ceil') }} col-lg-{{ (12/column_lg)|round(0, 'ceil') }}">*/
/*     <div class="tf-filter-group-header {{ filter['collapse']?'collapsed' }}" data-toggle="collapse" href="#tf-filter-panel-{{ module_class_id }}-{{ key }}">*/
/*       <span  class="tf-filter-group-title">{{ filter['name'] }}</span>*/
/*       {% if reset_group %}*/
/*         {% set total_selected = 0 %}*/
/*         {% for value in filter['values'] if value['selected'] %}{% set total_selected = total_selected + 1 %}{% endfor %}*/
/*         <a data-tf-reset="check" data-toggle="tooltip" title="{{ text_reset }}" class=" tf-filter-reset{{ not total_selected?' hide' }}"><i class="fa fa-times"></i></a>*/
/*       {% endif %}*/
/*       <i class="fa fa-caret-up toggle-icon"></i>*/
/*     </div>*/
/*     <div id="tf-filter-panel-{{ module_class_id }}-{{ key }}" class="collapse {{ not filter['collapse']?'in':'' }}" >*/
/*       {% if filter['search'] %}*/
/*       <div class="tf-filter-group-search"><i class="fa fa-search"></i> <input type="search" placeholder="{{ text_search }}"/></div>*/
/*       {% endif %}*/
/*       <div class="tf-filter-group-content {{ overflow }}">*/
/*         {% for value in filter['values'] %} */
/*           <div class="form-check tf-filter-value custom-checkbox">*/
/*             <label class="form-check-label">*/
/*               {% if (value['selected']) %} */
/*               <input type="checkbox" name="tf_ff" value="{{ value['filter_id'] }}" class="form-check-input" checked>*/
/*               {% else %} */
/*               <input type="checkbox" name="tf_ff" value="{{ value['filter_id'] }}" class="form-check-input" {{ not value['status']?'disabled' }}>*/
/*               {% endif %}*/
/*               <span class="checkmark fa"></span>*/
/*               {{ value['name'] }}*/
/*             </label>*/
/*             {% if count_product %}*/
/*               {% if (value['total']) %} */
/*               <span class="label label-info tf-product-total">{{ value['total'] }}</span>*/
/*               {% else %}*/
/*               <span class="label label-info label-danger tf-product-total">{{ value['total'] }}</span>*/
/*               {% endif %} */
/*             {% endif %}*/
/*           </div>*/
/*         {% endfor %}*/
/*         {% if overflow == 'more' and filter['values']|length >= 7 %}*/
/*           <a class="tf-see-more btn-link" data-toggle="tf-seemore" data-show="{{ text_see_more }}" data-hide="{{ text_see_less }}" href="#">{{ text_see_more }}</a>*/
/*         {% endif %}*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   {% elseif (filter['type'] == 'custom') %} {# Custom filter #}*/
/*   <div class="tf-filter-group col-xs-{{ (12/column_xs)|round(0, 'ceil') }} col-sm-{{ (12/column_sm)|round(0, 'ceil') }} col-md-{{ (12/column_md)|round(0, 'ceil') }} col-lg-{{ (12/column_lg)|round(0, 'ceil') }}">*/
/*     <div class="tf-filter-group-header {{ filter['collapse']?'collapsed' }}" data-toggle="collapse" href="#tf-filter-panel-{{ module_class_id }}-{{ key }}">*/
/*       <span class="tf-filter-group-title">{{ filter['name'] }}</span>*/
/*       {% if reset_group %}*/
/*         {% set total_selected = 0 %}*/
/*         {% for value in filter['values'] if value['selected'] %}{% set total_selected = total_selected + 1 %}{% endfor %}*/
/*         <a data-tf-reset="check" data-toggle="tooltip" title="{{ text_reset }}" class="tf-filter-reset{{ not total_selected?' hide' }}"><i class="fa fa-times"></i></a>*/
/*       {% endif %}*/
/*       <i class="fa fa-caret-up toggle-icon"></i>*/
/*     </div>*/
/*     <div id="tf-filter-panel-{{ module_class_id }}-{{ key }}" data-custom-filter="{{ filter['filter_id'] }}" class="collapse {{ not filter['collapse']?'in':'' }}" >*/
/*       {% if filter['search'] %}*/
/*       <div class="tf-filter-group-search"><i class="fa fa-search"></i> <input type="search" placeholder="{{ text_search }}"/></div>*/
/*       {% endif %}*/
/*       <div class="tf-filter-group-content {{ overflow }}">*/
/*         {% for value in filter['values'] %}*/
/*         <div class="form-check tf-filter-value custom-{{ filter['input_type'] }} {{ filter['list_type'] }}">*/
/*           <label class="form-check-label">*/
/*             {% if (value['selected']) %} */
/*             <input type="{{ filter['input_type'] }}" name="tf_fc{{ filter['filter_id'] }}" value="{{ value['value_id'] }}" class="form-check-input" checked>*/
/*             {% else %} */
/*             <input type="{{ filter['input_type'] }}" name="tf_fc{{ filter['filter_id'] }}" value="{{ value['value_id'] }}" class="form-check-input" {{ (not value['status'])?'disabled' }}>*/
/*             {% endif %} */
/*             {% if (filter['list_type'] == 'image' or filter['list_type'] == 'both') %} */
/*             <img src="{{ value['image'] }}" title="{{ value['name'] }}" alt="{{ value['name'] }}" />*/
/*             {% else %}*/
/*             <span class="checkmark fa"></span>*/
/*             {% endif %} */
/*             {% if (filter['list_type'] == 'text' or filter['list_type'] == 'both') %} */
/*               {{ value['name'] }}*/
/*             {% endif %}*/
/*           </label>*/
/*           {% if count_product and filter['list_type'] != 'image' %}*/
/*             {% if (value['total']) %} */
/*             <span class="label label-info tf-product-total">{{ value['total'] }}</span>*/
/*             {% else %}*/
/*             <span class="label label-info label-danger tf-product-total">{{ value['total'] }}</span>*/
/*             {% endif %} */
/*           {% endif %}*/
/*         </div>*/
/*        {% endfor %}*/
/*        {% if overflow == 'more' and filter['values']|length >= 7 %}*/
/*         <a class="tf-see-more btn-link" data-toggle="tf-seemore" data-show="{{ text_see_more }}" data-hide="{{ text_see_less }}" href="#">{{ text_see_more }}</a>*/
/*        {% endif %}*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/*   {% endif %} */
/* {% endfor %}*/
/* </div>*/
/* </div>*/
/* <script>*/
/* $(function(){*/
/*     if(window.innerWidth < 767){ // Collaped all panel in small device*/
/*         $('.tf-filter .collapse.in').collapse("hide");*/
/*     }*/
/*     */
/*     // Filter*/
/*     var paginationContainer = $('#content').children('.row').last();*/
/*     var productContainer = $('.products-list');    */
/*     productContainer.css('position', 'relative');*/
/*     $('#tf-filter-{{ module_class_id }}').tf_filter({*/
/*         requestURL: "{{ requestURL }}",*/
/*         searchEl: $('.tf-filter-group-search input'),*/
/*         ajax: {{ ajax?'true':'false' }},*/
/*         delay: {{ delay?'true':'false' }},*/
/*         search_in_description: {{ search_in_description?'true':'false' }},*/
/*         countProduct: {{ count_product?'true':'false' }},*/
/*         sortBy: '{{ sort_by }}',*/
/*         onParamChange: function(param){*/
/*            /* $("#input-limit,#input-sort").find('option').each(function(){*/
/*                 var url = $(this).attr('value');*/
/*                 $(this).attr('value', modifyURLQuery(url, $.extend({}, param, {page: null})));*/
/*             });*//* */
/*             var currency = $('#form-currency input[name="redirect"]');*/
/*             currency.val(modifyURLQuery(currency.val(), $.extend({}, param, {tf_fp: null, page: null})));*/
/*             */
/*             // Show or hide reset all button*/
/*             if($('.tf-filter-group [data-tf-reset]:not(.hide)').length){*/
/*                 $('[data-tf-reset="all"]').removeClass('hide');*/
/*             } else {*/
/*                 $('[data-tf-reset="all"]').addClass('hide');*/
/*             }*/
/*         },*/
/*         onInputChange: function(e){*/
/*             var filter_group = $(e.target).closest('.tf-filter-group');*/
/*             */
/*             var is_input_selected = false;*/
/*             */
/*             // Hide Reset for Checkbox or radio*/
/*             if(filter_group.find('input[type="checkbox"]:checked,input[type="radio"]:checked').length){*/
/*                 is_input_selected = true;*/
/*             }*/
/*             */
/*             // Hide Reset for price*/
/*             if($(e.target).filter('[name="tf_fp[min]"],[name="tf_fp[max]"]').length){*/
/*                 if($('[name="tf_fp[min]"]').val() !== $('[name="tf_fp[min]"]').attr('min') || $('[name="tf_fp[max]"]').val() !== $('[name="tf_fp[max]"]').attr('max')){*/
/*                     is_input_selected = true;*/
/*                    */
/*                 }*/
/*             }*/
/*             */
/*             // Hide reset for text*/
/*             if($(e.target).filter('[type="text"]').val()){*/
/*                 is_input_selected = true;*/
/*             }*/
/*             */
/*             // Hide or show reset buton*/
/*             if(is_input_selected){*/
/*                 filter_group.find('[data-tf-reset]').removeClass('hide');*/
/*             } else {*/
/*                 filter_group.find('[data-tf-reset]').addClass('hide');*/
/*             }*/
/*         },*/
/*         onReset: function(el_reset){*/
/*           var type = $(el_reset).data('tf-reset');*/
/*             */
/*           // Reset price*/
/*           if(type === 'price' || type === 'all'){*/
/*             price_slider.slider("values", [parseFloat(price_slider.slider("option", 'min')), parseFloat(price_slider.slider("option", 'max'))]);*/
/*           }*/
/*             */
/*             // Hide reset button*/
/*         },*/
/*         onBeforeSend: function(){*/
/*           productContainer.append('<div class="tf-loader"><img src="catalog/view/javascript/maza/loader.gif" /></div>');*/
/*         },*/
/*         onResult: function(json){*/
/*           let html = '', data=json.products, page=1;*/
/*           */
/*           for( let ind in data ){*/
/*           */
/*             let product = data[ind];*/
/*         */
/*             html += '<div class="product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12" data-page="'+ page +'">';*/
/*             html += '<div class="product-item-container">';   */
/*             html += '<div class="left-block left-b">';*/
/*             html += '<div class="product-image-container">';*/
/*             html += '<a href="' + product.href + '" title="' + product.name + '">'; // target="_blank" 09.01.2023*/
/*             html += '<img  data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="' + product.thumb + '"  title="' + product.name + '" class="lazyload img-responsive" />';*/
/*             html += '</a>';*/
/*             html += '</div>';*/
/*             html += '</div>';       */
/*             html += '<div class="right-block right-b">';*/
/*             html += '<h4><a href="' + product.href + '" >' + product.name + '</a></h4>'; // target="_blank" 09.01.2023*/
/*             */
/*             if ( product.price ){ */
/*               html += '<div class="price">';*/
/*               if ( !product.special ) {*/
/*                 html += '<span class="price-new">' + product.price + '</span>';*/
/*               }else {   */
/*                 html += '<span class="price-new">' + product.special + '</span> <span class="price-old">' + product.price + '</span>';*/
/*               } */
/*                 html += '</div>';*/
/*               }         */
/*               html += '<div class="description">';*/
/*               html += '<p>' + product.description + '</p>';*/
/*               html += '</div>';*/
/*               html += '</div>';*/
/*               html += '</div>';*/
/*               html += '</div>';*/
/*             }*/
/*            */
/*             $(productContainer).html(html);*/
/*           }*/
/*         });*/
/*     */
/*     // Price slider*/
/*     var price_slider = $(".tf-filter [data-role='rangeslider']").slider({*/
/*         range: true,*/
/*         min: parseFloat($('[name="tf_fp[min]"]').attr('min')),*/
/*         max: parseFloat($('[name="tf_fp[max]"]').attr('max')),*/
/*         values: [parseFloat($('[name="tf_fp[min]"]').val()), parseFloat($('[name="tf_fp[max]"]').val())],*/
/*         slide: function( event, ui ) {*/
/*             $('[name="tf_fp[min]"]').val(ui.values[0]);*/
/*             $('[name="tf_fp[max]"]').val(ui.values[1]);*/
/*         },*/
/*         change: function( event, ui ) {*/
/*             // Hide Reset for price*/
/*             if($('[name="tf_fp[min]"]').val() !== $('[name="tf_fp[min]"]').attr('min') || $('[name="tf_fp[max]"]').val() !== $('[name="tf_fp[max]"]').attr('max')){*/
/*                 $('.kai-p-selected').removeClass('hidden-p-filter');*/
/*                 $('.kai-p-selected .kai-min-pr').text($('[name="tf_fp[min]"]').val())*/
/*                 $('.kai-p-selected .kai-max-pr').text($('[name="tf_fp[max]"]').val())*/
/*                 */
/*             } else {*/
/*                 $('.kai-p-selected').addClass('hidden-p-filter');*/
/*             }*/
/*             */
/*             // Trigger filter change*/
/*             $('#tf-filter-{{ module_class_id }}').change();*/
/*         }*/
/*     });*/
/*     $('[name="tf_fp[min]"]').change(function(){*/
/*         price_slider.slider("values", 0, $(this).val());*/
/*     });*/
/*     $('[name="tf_fp[max]"]').change(function(){*/
/*         price_slider.slider("values", 1, $(this).val());*/
/*     });*/
/*     */
/*     // Show reset all button if filter is selected*/
/*     if($('.tf-filter-group [data-tf-reset]:not(.hide)').length){*/
/*         $('[data-tf-reset="all"]').removeClass('hide');*/
/*     }*/
/*     */
/*     // Fix z-index*/
/*     $('.tf-filter-group .collapse').on('show.bs.collapse', function(){*/
/*         var z_index = Number($('#tf-filter-content-{{ module_class_id }}').data('mz-base-z-index')) + 1;*/
/*         $(this).css('z-index', z_index);*/
/*         $('#tf-filter-content-{{ module_class_id }}').data('mz-base-z-index', z_index);*/
/*     });*/
/* });*/
/* </script>*/
/* <link href="catalog/view/theme/default/stylesheet/tf_filter.css" rel="stylesheet" media="screen" />*/
