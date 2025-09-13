<?php

/* so-revo/template/product/category.twig */
class __TwigTemplate_403f6e4fa605487575c69dde948a59de8b97475a3bffd063d5fd1fa55f45f707 extends Twig_Template
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
        // line 2
        echo (isset($context["header"]) ? $context["header"] : null);
        echo "
";
        // line 5
        echo "

";
        // line 8
        if ((isset($context["url_asidePosition"]) ? $context["url_asidePosition"] : null)) {
            $context["col_position"] = (isset($context["url_asidePosition"]) ? $context["url_asidePosition"] : null);
        } else {
            // line 9
            $context["col_position"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "catalog_col_position"), "method");
            echo " ";
        }
        // line 10
        echo "
";
        // line 11
        if ((isset($context["url_asideType"]) ? $context["url_asideType"] : null)) {
            echo " ";
            $context["col_canvas"] = (isset($context["url_asideType"]) ? $context["url_asideType"] : null);
        } else {
            // line 12
            $context["col_canvas"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "catalog_col_type"), "method");
        }
        // line 13
        $context["desktop_canvas"] = ((((isset($context["col_canvas"]) ? $context["col_canvas"] : null) == "off_canvas")) ? ("desktop-offcanvas") : (""));
        // line 14
        echo "

";
        // line 16
        if (((isset($context["col_position"]) ? $context["col_position"] : null) == "inside")) {
            // line 17
            echo "<div class=\"container\">
\t";
            // line 18
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/soconfig/subcategory.twig"), "so-revo/template/product/category.twig", 18)->display($context);
            // line 19
            echo "\t
</div>
";
        }
        // line 22
        echo "
<div class=\"container product-listing content-main ";
        // line 23
        echo (isset($context["desktop_canvas"]) ? $context["desktop_canvas"] : null);
        echo "\">
  
  <div class=\"row\">";
        // line 25
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
     ";
        // line 26
        if (((isset($context["col_canvas"]) ? $context["col_canvas"] : null) == "off_canvas")) {
            // line 27
            echo "    \t";
            $context["class"] = "col-sm-12";
            // line 28
            echo "    ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 29
            echo "    \t";
            $context["class"] = "col-md-6 col-sm-12 col-xs-12 fluid-allsidebar";
            // line 30
            echo "    ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 31
            echo "    \t";
            $context["class"] = "col-md-9 col-sm-12 col-xs-12 fluid-sidebar";
            // line 32
            echo "    ";
        } else {
            // line 33
            echo "    \t";
            $context["class"] = "col-sm-12";
            // line 34
            echo "    ";
        }
        // line 35
        echo "<input type=\"hidden\" id=\"last-id\" value=\"\" />
    <div id=\"content\" class=\"";
        // line 36
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">

    \t";
        // line 38
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "


\t\t<div class=\"products-category clearfix\">


\t\t\t";
        // line 44
        if (((isset($context["col_position"]) ? $context["col_position"] : null) == "outside")) {
            // line 45
            echo "\t\t\t\t
\t\t\t\t";
            // line 46
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/soconfig/subcategory.twig"), "so-revo/template/product/category.twig", 46)->display($context);
            // line 47
            echo "\t\t\t";
        }
        // line 48
        echo "\t  
\t\t\t";
        // line 49
        if ((isset($context["products"]) ? $context["products"] : null)) {
            // line 50
            echo "
\t\t\t\t";
            // line 52
            echo "\t\t\t\t";
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/soconfig/listing.twig"), "so-revo/template/product/category.twig", 52)->display(array_merge($context, array("listingType" => (isset($context["listingType"]) ? $context["listingType"] : null))));
            // line 53
            echo "\t\t\t\t
\t\t\t";
        }
        // line 55
        echo "      ";
        // line 56
        echo "      ";
        // line 57
        echo "      ";
        // line 58
        echo "      ";
        // line 59
        echo "\t\t\t";
        if (( !(isset($context["categories"]) ? $context["categories"] : null) &&  !(isset($context["products"]) ? $context["products"] : null))) {
            // line 60
            echo "\t\t\t  <p>";
            echo (isset($context["text_empty"]) ? $context["text_empty"] : null);
            echo "</p>
\t\t\t  <div class=\"buttons\">
\t\t\t\t<div class=\"pull-right\"><a href=\"";
            // line 62
            echo (isset($context["continue"]) ? $context["continue"] : null);
            echo "\" class=\"btn btn-primary\">";
            echo (isset($context["button_continue"]) ? $context["button_continue"] : null);
            echo "</a></div>
\t\t\t  </div>
\t\t\t";
        }
        // line 65
        echo "
\t      \t";
        // line 66
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "

\t  \t</div>
\t </div>

    ";
        // line 71
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "
    

    ";
        // line 74
        if ((isset($context["url_sidebarsticky"]) ? $context["url_sidebarsticky"] : null)) {
            echo " ";
            $context["sidebar_sticky"] = (isset($context["url_sidebarsticky"]) ? $context["url_sidebarsticky"] : null);
            // line 75
            echo "\t";
        } else {
            echo " ";
            $context["sidebar_sticky"] = $this->getAttribute((isset($context["soconfig"]) ? $context["soconfig"] : null), "get_settings", array(0 => "catalog_sidebar_sticky"), "method");
        }
        // line 76
        echo "    <script type=\"text/javascript\"><!--

   
\t\t\$(window).load(sidebar_sticky_update);
\t\t\$(window).resize(sidebar_sticky_update);

    \tfunction sidebar_sticky_update(){
    \t\t var viewportWidth = \$(window).width();
    \t\t if (viewportWidth > 1200) {
\t    \t\t// Initialize the sticky scrolling on an item 
\t\t\t\tsidebar_sticky = '";
        // line 86
        echo (isset($context["sidebar_sticky"]) ? $context["sidebar_sticky"] : null);
        echo "';
\t\t\t\t
\t\t\t\tif(sidebar_sticky=='left'){
\t\t\t\t\t\$(\".left_column\").stick_in_parent({
\t\t\t\t\t    offset_top: 10,
\t\t\t\t\t    bottoming   : true
\t\t\t\t\t});
\t\t\t\t}else if (sidebar_sticky=='right'){
\t\t\t\t\t\$(\".right_column\").stick_in_parent({
\t\t\t\t\t    offset_top: 10,
\t\t\t\t\t    bottoming   : true
\t\t\t\t\t});
\t\t\t\t}else if (sidebar_sticky=='all'){
\t\t\t\t\t\$(\".content-aside\").stick_in_parent({
\t\t\t\t\t    offset_top: 10,
\t\t\t\t\t    bottoming   : true
\t\t\t\t\t});
\t\t\t\t}
\t\t\t}
    \t}
\t</script> 
  <script>
var container = \$('.products-list'),
        request_in_progress = false,
        total = \$('#total-products').val(),
        previousScroll = 0,
        man = 0;
        parent = 0;

\$(window).scroll(function( event ) {
    var currentScroll = \$(this).scrollTop(),
        page = parseInt( container.find('.product-layout:last-of-type').attr('data-page'));

    if ( currentScroll > previousScroll){
        if( page*12 < total ){
            scrollReaction( page, 'down' );
            
        }
    } 
        
    previousScroll = currentScroll;
})

function scrollReaction( page, direction ){

    var contentHeight = container.outerHeight();
    var current_y = window.innerHeight + window.pageYOffset;
    var last = container.find('.product-layout:last-of-type'); 
       
    if( direction == 'down' ){
             
        if( last.offset().top <= ( current_y + 100 ) ){
           loadMore( page, direction );

        }
    }
}
//needs last to continue loading when filters are set
function loadMore( page, direction ) {
    
    var filter = [], next_page, filterQuery, sortOrder, sortOrderArr, sort, order, minPrice, maxPrice, lastId, total;        

    sortOrder = \$('#input-sort').val(), sortOrderArr, sort, order;
    sortOrderArr = sortOrder.split('-');
    sort = sortOrderArr[0];
    order = sortOrderArr[1];
    minPrice = \$(\"#min-price\").val();
    maxPrice = \$('#max-price').val();
    lastId = \$('#last-id').val();
    total = \$('#total-products').val()
    \$('input[name^=\\'filter\\']:checked').each(function(element) {
        filter.push(this.value);
    });
        
    if( filter.length ){
        filterQuery = '&filter=' + filter.join(',');
    } 

    if(request_in_progress) { return; }
    if( direction == 'down' ){ 
        if( page * 12 > total ){
            return;
        } else {
            next_page = page + 1;
        }
    }
    request_in_progress = true;  
      
    \$.ajax({
        url: 'index.php?route=product/category/load_products',
        type: 'get',
        data: 'path=";
        // line 177
        echo (isset($context["path"]) ? $context["path"] : null);
        echo "&page=' + next_page + '&limit=12&' + filterQuery + \"&sort=\" + sort + \"&order=\"+order + \"&min_pr=\"+minPrice+\"&max_pr=\"+maxPrice + '&man=' + man + '&parent='+parent + '&last='+lastId,
        dataType: 'json',
        success:function( response ){         
            \$('#total-products').val(response.total)
                appendToDiv( container, response.products, next_page ); 
          
                request_in_progress = false;
                \$('#last-id').val(response.last)
            }
    });
}

function appendToDiv(div, data, page ) {    

    \tlet html = '';
    \tfor( let ind in data ){
    \t\tlet product = data[ind];
    \t\t
    \t\thtml += '<div class=\"product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12\" data-page=\"'+ page +'\">';
\t\t\thtml += '<div class=\"product-item-container\">';\t\t
    \t\thtml += '<div class=\"left-block left-b\">';
\t\t\thtml += '<div class=\"product-image-container\">';
\t\t\thtml += '<a href=\"' + product.href + '\" title=\"' + product.name + '\">'; //  target=\"_blank\" 09.01.2023
\t\t\thtml += '<img  data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"' + product.thumb + '\"  title=\"' + product.name + '\" class=\"lazyload img-responsive\" alt=\"' + product.name + '\"/>';
\t\t\thtml += '</a>';
\t\t\thtml += '</div>';
\t\t\thtml += '</div>';\t\t\t\t
\t\t\thtml += '<div class=\"right-block right-b\">';
\t\t\thtml += '<h4><a href=\"' + product.href + '\">' + product.name + '</a></h4>'; //  target=\"_blank\" 09.01.2023
\t\t\tif ( product.price ){ 
\t\t\thtml += '<div class=\"price\">';
\t\t\t\tif ( !product.special ) {
\t\t\t\t\thtml += '<span class=\"price-new\">' + product.price + '</span>';
\t\t\t\t}else {   
\t\t\t\t\thtml += '<span class=\"price-new\">' + product.special + '</span> <span class=\"price-old\">' + product.price + '</span>';
\t\t\t\t} 
\t\t\thtml += '</div>';
\t\t\t}\t\t\t\t\t
\t\t\thtml += '<div class=\"description\">';
\t\t\thtml += '<p>' + product.description + '</p>';
\t\t\thtml += '</div>';
\t\t\thtml += '</div>';
\t\t\thtml += '</div>';
\t\t\thtml += '</div>';
    \t}
        
       div.append( html )
    }
function replaceProductsList(div, data, page ) {    
        
    let html = '';
    
    for( let ind in data ){
            
        let product = data[ind];
            
        html += '<div class=\"product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12\" data-page=\"'+ page +'\">';
        html += '<div class=\"product-item-container\">';     
        html += '<div class=\"left-block left-b\">';
        html += '<div class=\"product-image-container\">';
        html += '<a href=\"' + product.href + '\" title=\"' + product.name + '\">'; // target=\"_blank\" 09.01.2023
        html += '<img  data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"' + product.thumb + '\"  title=\"' + product.name + '\" class=\"lazyload img-responsive\" alt=\"' + product.name + '\"/>';
        html += '</a>';
        html += '</div>';
        html += '</div>';               
        html += '<div class=\"right-block right-b\">';
        html += '<h4><a href=\"' + product.href + '\">' + product.name + '</a></h4>'; // target=\"_blank\" 09.01.2023
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
        
    div.html( html )
}
//resets last to 0
\$('#content').on('change', '#input-sort', function(e){

    var filter = [], filterQuery, sortOrder, sortOrderArr, sort, order, minPrice, maxPrice;
    \$('#last-id').val(0)

    sortOrder = \$(this).val();
    sortOrderArr = sortOrder.split('-');
    sort = sortOrderArr[0];
    order = sortOrderArr[1];
    minPrice = \$(\"#min-price\").val();
    maxPrice = \$('#max-price').val();
        
    \$('input[name^=\\'filter\\']:checked').each(function(element) {
        filter.push(this.value);
    });
    
    if( filter.length ){
        filterQuery = '&filter=' + filter.join(',');
    }       
    \$.ajax({
        url: 'index.php?route=product/category/load_products',
        type: 'get',
        data: 'path=";
        // line 286
        echo (isset($context["path"]) ? $context["path"] : null);
        echo "&page=1&limit=12&' + filterQuery + \"&sort=\" + sort + \"&order=\"+order + \"&min_pr=\"+minPrice+\"&max_pr=\"+ maxPrice + '&man=' + man + '&parent='+parent+'&last=0',
        dataType: 'json',
        success:function( response ){  
        \$('#total-products').val(response.total)
            replaceProductsList( container, response.products, 1 ); 
      
            request_in_progress = false;
            \$('#last-id').val(response.last)
        }
    });
})

//resets last to 0
\$('.kai-selected-filters').on('click', '.kai-f-selected a', function(e){
    e.preventDefault();
    let val = \$(this).parents('.kai-f-selected').data('f');
    \$('.checkbox input[value='+val+']').prop('checked', false);
    \$(this).parents('.kai-f-selected').remove();
    
                       
    if( !\$('.kai-filter').parents('.kai-filter-group').find('input:checked').length ){
        \$('.kai-filter').parents('.kai-filter-group').removeClass('filter-group-selected')
    }
    //reload products, set lastId = 0;
    \$('#last-id').val(0);
    var filter = [],
    sortOrder = \$('#input-sort').val(), sortOrderArr, sort, order, minPrice, maxPrice;
    
    sortOrderArr = sortOrder.split('-');
    sort = sortOrderArr[0];
    order = sortOrderArr[1];
    minPrice = \$(\"#min-price\").val();
    maxPrice = \$('#max-price').val();

    \$('input[name^=\\'filter\\']:checked').each(function(element) {
          filter.push(this.value);
    });
    
    //filter the profucts
    \$.ajax({
        url: 'index.php?route=product/category/load_products',
        type: 'get',
        data: 'path=";
        // line 328
        echo (isset($context["path"]) ? $context["path"] : null);
        echo "&page=1&limit=12&filter=' + filter.join(',') + \"&sort=\" + sort + \"&order=\"+order + \"&min_pr=\"+minPrice+\"&max_pr=\"+maxPrice + '&man=' + man + '&parent='+parent+'&last=0',
        dataType: 'json',
        success:function( response ){ 
        
            \$('#total-products').val(response.total)
            let html = '', data = response.products, page = 1, f = response.filters;        
            //attach filtered products
            for( let ind in data ){          
                
                let product = data[ind];
        
                html += '<div class=\"product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12\" data-page=\"'+ page +'\">';
                html += '<div class=\"product-item-container\">';   
                html += '<div class=\"left-block left-b\">';
                html += '<div class=\"product-image-container\">';
                html += '<a href=\"' + product.href + '\" title=\"' + product.name + '\" >'; // target=\"_blank\" 09.01.2023
                html += '<img  data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"' + product.thumb + '\"  title=\"' + product.name + '\" class=\"lazyload img-responsive\" alt=\"' + product.name + '\"/>';
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
            \$('#last-id').val(response.last)
            \$('.products-list').html( html )

            //toggle filters        
            //hide filters that do not belong to filtered products
            
            \$('.checkbox.kai-filter').each(function(index, item){
            //check item parent is not selected
                if( !\$(item).parents('.kai-filter-group').hasClass('filter-group-selected') ){
                let flag = false;
                
                for(let m in f ){
                    let arr = f[m];
              
                    if( arr.indexOf( \$(item).data('filter').toString()) > -1 ) {
                        flag = true;
                        break;              
                    }
                }
                if( !flag ){
                    
                    \$(item).addClass('kai-disabled-filter')
                } else {
                    if( \$(item).hasClass('kai-disabled-filter')){
                        \$(item).removeClass('kai-disabled-filter')
                        
                    }
                }
            }
        });
            }
        });
    });
</script>

\t</div>
</div>
";
        // line 403
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "so-revo/template/product/category.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  540 => 403,  462 => 328,  417 => 286,  305 => 177,  211 => 86,  199 => 76,  193 => 75,  189 => 74,  183 => 71,  175 => 66,  172 => 65,  164 => 62,  158 => 60,  155 => 59,  153 => 58,  151 => 57,  149 => 56,  147 => 55,  143 => 53,  140 => 52,  137 => 50,  135 => 49,  132 => 48,  129 => 47,  127 => 46,  124 => 45,  122 => 44,  113 => 38,  108 => 36,  105 => 35,  102 => 34,  99 => 33,  96 => 32,  93 => 31,  90 => 30,  87 => 29,  84 => 28,  81 => 27,  79 => 26,  75 => 25,  70 => 23,  67 => 22,  62 => 19,  60 => 18,  57 => 17,  55 => 16,  51 => 14,  49 => 13,  46 => 12,  41 => 11,  38 => 10,  34 => 9,  30 => 8,  26 => 5,  22 => 2,  19 => 1,);
    }
}
/* */
/* {{ header }}*/
/* {#====  Loader breadcrumbs ==== #}*/
/* {#{% include theme_directory~'/template/soconfig/breadcrumbs.twig' %}#}*/
/* */
/* */
/* {#====  Variables url parameter ==== #}*/
/* {% if url_asidePosition %}{% set col_position = url_asidePosition %}*/
/* {% else %}{% set col_position = soconfig.get_settings('catalog_col_position') %} {% endif %}*/
/* */
/* {% if url_asideType %} {% set col_canvas = url_asideType %}*/
/* {% else %}{% set col_canvas = soconfig.get_settings('catalog_col_type') %}{% endif %}*/
/* {% set desktop_canvas = col_canvas =='off_canvas' ? 'desktop-offcanvas' : '' %}*/
/* */
/* */
/* {% if col_position == 'inside' %}*/
/* <div class="container">*/
/* 	{% include theme_directory~'/template/soconfig/subcategory.twig' %}*/
/* 	*/
/* </div>*/
/* {% endif %}*/
/* */
/* <div class="container product-listing content-main {{desktop_canvas}}">*/
/*   */
/*   <div class="row">{{ column_left }}*/
/*      {% if col_canvas =='off_canvas' %}*/
/*     	{% set class = 'col-sm-12' %}*/
/*     {% elseif column_left and column_right %}*/
/*     	{% set class = 'col-md-6 col-sm-12 col-xs-12 fluid-allsidebar' %}*/
/*     {% elseif column_left or column_right %}*/
/*     	{% set class = 'col-md-9 col-sm-12 col-xs-12 fluid-sidebar' %}*/
/*     {% else %}*/
/*     	{% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/* <input type="hidden" id="last-id" value="" />*/
/*     <div id="content" class="{{ class }}">*/
/* */
/*     	{{ content_top }}*/
/* */
/* */
/* 		<div class="products-category clearfix">*/
/* */
/* */
/* 			{% if col_position== 'outside' %}*/
/* 				*/
/* 				{% include theme_directory~'/template/soconfig/subcategory.twig' %}*/
/* 			{% endif %}*/
/* 	  */
/* 			{% if products %}*/
/* */
/* 				{#==== Product Listing ==== #}*/
/* 				{% include theme_directory~'/template/soconfig/listing.twig' with {listingType: listingType} %}*/
/* 				*/
/* 			{% endif %}*/
/*       {#<div class="row">#}*/
/*       {#  <div class="col-sm-6 text-left">{{ pagination }}</div>#}*/
/*       {#  <div class="col-sm-6 text-right">{{ results }}</div>#}*/
/*       {#</div>#}*/
/* 			{% if not categories and not products %}*/
/* 			  <p>{{ text_empty }}</p>*/
/* 			  <div class="buttons">*/
/* 				<div class="pull-right"><a href="{{ continue }}" class="btn btn-primary">{{ button_continue }}</a></div>*/
/* 			  </div>*/
/* 			{% endif %}*/
/* */
/* 	      	{{ content_bottom }}*/
/* */
/* 	  	</div>*/
/* 	 </div>*/
/* */
/*     {{ column_right }}*/
/*     */
/* */
/*     {% if url_sidebarsticky %} {% set sidebar_sticky = url_sidebarsticky %}*/
/* 	{% else %} {% set sidebar_sticky = soconfig.get_settings('catalog_sidebar_sticky') %}{% endif %}*/
/*     <script type="text/javascript"><!--*/
/* */
/*    */
/* 		$(window).load(sidebar_sticky_update);*/
/* 		$(window).resize(sidebar_sticky_update);*/
/* */
/*     	function sidebar_sticky_update(){*/
/*     		 var viewportWidth = $(window).width();*/
/*     		 if (viewportWidth > 1200) {*/
/* 	    		// Initialize the sticky scrolling on an item */
/* 				sidebar_sticky = '{{sidebar_sticky}}';*/
/* 				*/
/* 				if(sidebar_sticky=='left'){*/
/* 					$(".left_column").stick_in_parent({*/
/* 					    offset_top: 10,*/
/* 					    bottoming   : true*/
/* 					});*/
/* 				}else if (sidebar_sticky=='right'){*/
/* 					$(".right_column").stick_in_parent({*/
/* 					    offset_top: 10,*/
/* 					    bottoming   : true*/
/* 					});*/
/* 				}else if (sidebar_sticky=='all'){*/
/* 					$(".content-aside").stick_in_parent({*/
/* 					    offset_top: 10,*/
/* 					    bottoming   : true*/
/* 					});*/
/* 				}*/
/* 			}*/
/*     	}*/
/* 	</script> */
/*   <script>*/
/* var container = $('.products-list'),*/
/*         request_in_progress = false,*/
/*         total = $('#total-products').val(),*/
/*         previousScroll = 0,*/
/*         man = 0;*/
/*         parent = 0;*/
/* */
/* $(window).scroll(function( event ) {*/
/*     var currentScroll = $(this).scrollTop(),*/
/*         page = parseInt( container.find('.product-layout:last-of-type').attr('data-page'));*/
/* */
/*     if ( currentScroll > previousScroll){*/
/*         if( page*12 < total ){*/
/*             scrollReaction( page, 'down' );*/
/*             */
/*         }*/
/*     } */
/*         */
/*     previousScroll = currentScroll;*/
/* })*/
/* */
/* function scrollReaction( page, direction ){*/
/* */
/*     var contentHeight = container.outerHeight();*/
/*     var current_y = window.innerHeight + window.pageYOffset;*/
/*     var last = container.find('.product-layout:last-of-type'); */
/*        */
/*     if( direction == 'down' ){*/
/*              */
/*         if( last.offset().top <= ( current_y + 100 ) ){*/
/*            loadMore( page, direction );*/
/* */
/*         }*/
/*     }*/
/* }*/
/* //needs last to continue loading when filters are set*/
/* function loadMore( page, direction ) {*/
/*     */
/*     var filter = [], next_page, filterQuery, sortOrder, sortOrderArr, sort, order, minPrice, maxPrice, lastId, total;        */
/* */
/*     sortOrder = $('#input-sort').val(), sortOrderArr, sort, order;*/
/*     sortOrderArr = sortOrder.split('-');*/
/*     sort = sortOrderArr[0];*/
/*     order = sortOrderArr[1];*/
/*     minPrice = $("#min-price").val();*/
/*     maxPrice = $('#max-price').val();*/
/*     lastId = $('#last-id').val();*/
/*     total = $('#total-products').val()*/
/*     $('input[name^=\'filter\']:checked').each(function(element) {*/
/*         filter.push(this.value);*/
/*     });*/
/*         */
/*     if( filter.length ){*/
/*         filterQuery = '&filter=' + filter.join(',');*/
/*     } */
/* */
/*     if(request_in_progress) { return; }*/
/*     if( direction == 'down' ){ */
/*         if( page * 12 > total ){*/
/*             return;*/
/*         } else {*/
/*             next_page = page + 1;*/
/*         }*/
/*     }*/
/*     request_in_progress = true;  */
/*       */
/*     $.ajax({*/
/*         url: 'index.php?route=product/category/load_products',*/
/*         type: 'get',*/
/*         data: 'path={{path}}&page=' + next_page + '&limit=12&' + filterQuery + "&sort=" + sort + "&order="+order + "&min_pr="+minPrice+"&max_pr="+maxPrice + '&man=' + man + '&parent='+parent + '&last='+lastId,*/
/*         dataType: 'json',*/
/*         success:function( response ){         */
/*             $('#total-products').val(response.total)*/
/*                 appendToDiv( container, response.products, next_page ); */
/*           */
/*                 request_in_progress = false;*/
/*                 $('#last-id').val(response.last)*/
/*             }*/
/*     });*/
/* }*/
/* */
/* function appendToDiv(div, data, page ) {    */
/* */
/*     	let html = '';*/
/*     	for( let ind in data ){*/
/*     		let product = data[ind];*/
/*     		*/
/*     		html += '<div class="product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12" data-page="'+ page +'">';*/
/* 			html += '<div class="product-item-container">';		*/
/*     		html += '<div class="left-block left-b">';*/
/* 			html += '<div class="product-image-container">';*/
/* 			html += '<a href="' + product.href + '" title="' + product.name + '">'; //  target="_blank" 09.01.2023*/
/* 			html += '<img  data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="' + product.thumb + '"  title="' + product.name + '" class="lazyload img-responsive" alt="' + product.name + '"/>';*/
/* 			html += '</a>';*/
/* 			html += '</div>';*/
/* 			html += '</div>';				*/
/* 			html += '<div class="right-block right-b">';*/
/* 			html += '<h4><a href="' + product.href + '">' + product.name + '</a></h4>'; //  target="_blank" 09.01.2023*/
/* 			if ( product.price ){ */
/* 			html += '<div class="price">';*/
/* 				if ( !product.special ) {*/
/* 					html += '<span class="price-new">' + product.price + '</span>';*/
/* 				}else {   */
/* 					html += '<span class="price-new">' + product.special + '</span> <span class="price-old">' + product.price + '</span>';*/
/* 				} */
/* 			html += '</div>';*/
/* 			}					*/
/* 			html += '<div class="description">';*/
/* 			html += '<p>' + product.description + '</p>';*/
/* 			html += '</div>';*/
/* 			html += '</div>';*/
/* 			html += '</div>';*/
/* 			html += '</div>';*/
/*     	}*/
/*         */
/*        div.append( html )*/
/*     }*/
/* function replaceProductsList(div, data, page ) {    */
/*         */
/*     let html = '';*/
/*     */
/*     for( let ind in data ){*/
/*             */
/*         let product = data[ind];*/
/*             */
/*         html += '<div class="product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12" data-page="'+ page +'">';*/
/*         html += '<div class="product-item-container">';     */
/*         html += '<div class="left-block left-b">';*/
/*         html += '<div class="product-image-container">';*/
/*         html += '<a href="' + product.href + '" title="' + product.name + '">'; // target="_blank" 09.01.2023*/
/*         html += '<img  data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="' + product.thumb + '"  title="' + product.name + '" class="lazyload img-responsive" alt="' + product.name + '"/>';*/
/*         html += '</a>';*/
/*         html += '</div>';*/
/*         html += '</div>';               */
/*         html += '<div class="right-block right-b">';*/
/*         html += '<h4><a href="' + product.href + '">' + product.name + '</a></h4>'; // target="_blank" 09.01.2023*/
/*         if ( product.price ){ */
/*         html += '<div class="price">';*/
/*             if ( !product.special ) {*/
/*                 html += '<span class="price-new">' + product.price + '</span>';*/
/*             }else {   */
/*                 html += '<span class="price-new">' + product.special + '</span> <span class="price-old">' + product.price + '</span>';*/
/*             } */
/*         html += '</div>';*/
/*         }                   */
/*         html += '<div class="description">';*/
/*         html += '<p>' + product.description + '</p>';*/
/*         html += '</div>';*/
/*         html += '</div>';*/
/*         html += '</div>';*/
/*         html += '</div>';*/
/*     }*/
/*         */
/*     div.html( html )*/
/* }*/
/* //resets last to 0*/
/* $('#content').on('change', '#input-sort', function(e){*/
/* */
/*     var filter = [], filterQuery, sortOrder, sortOrderArr, sort, order, minPrice, maxPrice;*/
/*     $('#last-id').val(0)*/
/* */
/*     sortOrder = $(this).val();*/
/*     sortOrderArr = sortOrder.split('-');*/
/*     sort = sortOrderArr[0];*/
/*     order = sortOrderArr[1];*/
/*     minPrice = $("#min-price").val();*/
/*     maxPrice = $('#max-price').val();*/
/*         */
/*     $('input[name^=\'filter\']:checked').each(function(element) {*/
/*         filter.push(this.value);*/
/*     });*/
/*     */
/*     if( filter.length ){*/
/*         filterQuery = '&filter=' + filter.join(',');*/
/*     }       */
/*     $.ajax({*/
/*         url: 'index.php?route=product/category/load_products',*/
/*         type: 'get',*/
/*         data: 'path={{ path }}&page=1&limit=12&' + filterQuery + "&sort=" + sort + "&order="+order + "&min_pr="+minPrice+"&max_pr="+ maxPrice + '&man=' + man + '&parent='+parent+'&last=0',*/
/*         dataType: 'json',*/
/*         success:function( response ){  */
/*         $('#total-products').val(response.total)*/
/*             replaceProductsList( container, response.products, 1 ); */
/*       */
/*             request_in_progress = false;*/
/*             $('#last-id').val(response.last)*/
/*         }*/
/*     });*/
/* })*/
/* */
/* //resets last to 0*/
/* $('.kai-selected-filters').on('click', '.kai-f-selected a', function(e){*/
/*     e.preventDefault();*/
/*     let val = $(this).parents('.kai-f-selected').data('f');*/
/*     $('.checkbox input[value='+val+']').prop('checked', false);*/
/*     $(this).parents('.kai-f-selected').remove();*/
/*     */
/*                        */
/*     if( !$('.kai-filter').parents('.kai-filter-group').find('input:checked').length ){*/
/*         $('.kai-filter').parents('.kai-filter-group').removeClass('filter-group-selected')*/
/*     }*/
/*     //reload products, set lastId = 0;*/
/*     $('#last-id').val(0);*/
/*     var filter = [],*/
/*     sortOrder = $('#input-sort').val(), sortOrderArr, sort, order, minPrice, maxPrice;*/
/*     */
/*     sortOrderArr = sortOrder.split('-');*/
/*     sort = sortOrderArr[0];*/
/*     order = sortOrderArr[1];*/
/*     minPrice = $("#min-price").val();*/
/*     maxPrice = $('#max-price').val();*/
/* */
/*     $('input[name^=\'filter\']:checked').each(function(element) {*/
/*           filter.push(this.value);*/
/*     });*/
/*     */
/*     //filter the profucts*/
/*     $.ajax({*/
/*         url: 'index.php?route=product/category/load_products',*/
/*         type: 'get',*/
/*         data: 'path={{ path }}&page=1&limit=12&filter=' + filter.join(',') + "&sort=" + sort + "&order="+order + "&min_pr="+minPrice+"&max_pr="+maxPrice + '&man=' + man + '&parent='+parent+'&last=0',*/
/*         dataType: 'json',*/
/*         success:function( response ){ */
/*         */
/*             $('#total-products').val(response.total)*/
/*             let html = '', data = response.products, page = 1, f = response.filters;        */
/*             //attach filtered products*/
/*             for( let ind in data ){          */
/*                 */
/*                 let product = data[ind];*/
/*         */
/*                 html += '<div class="product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12" data-page="'+ page +'">';*/
/*                 html += '<div class="product-item-container">';   */
/*                 html += '<div class="left-block left-b">';*/
/*                 html += '<div class="product-image-container">';*/
/*                 html += '<a href="' + product.href + '" title="' + product.name + '" >'; // target="_blank" 09.01.2023*/
/*                 html += '<img  data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="' + product.thumb + '"  title="' + product.name + '" class="lazyload img-responsive" alt="' + product.name + '"/>';*/
/*                 html += '</a>';*/
/*                 html += '</div>';*/
/*                 html += '</div>';       */
/*                 html += '<div class="right-block right-b">';*/
/*                 html += '<h4><a href="' + product.href + '" >' + product.name + '</a></h4>'; // target="_blank" 09.01.2023*/
/*                 if ( product.price ){ */
/*                     html += '<div class="price">';*/
/*                     if ( !product.special ) {*/
/*                       html += '<span class="price-new">' + product.price + '</span>';*/
/*                     }else {   */
/*                       html += '<span class="price-new">' + product.special + '</span> <span class="price-old">' + product.price + '</span>';*/
/*                     } */
/*                     html += '</div>';*/
/*                 }         */
/*                 html += '<div class="description">';*/
/*                 html += '<p>' + product.description + '</p>';*/
/*                 html += '</div>';*/
/*                 html += '</div>';*/
/*                 html += '</div>';*/
/*                 html += '</div>';*/
/*             }*/
/*             $('#last-id').val(response.last)*/
/*             $('.products-list').html( html )*/
/* */
/*             //toggle filters        */
/*             //hide filters that do not belong to filtered products*/
/*             */
/*             $('.checkbox.kai-filter').each(function(index, item){*/
/*             //check item parent is not selected*/
/*                 if( !$(item).parents('.kai-filter-group').hasClass('filter-group-selected') ){*/
/*                 let flag = false;*/
/*                 */
/*                 for(let m in f ){*/
/*                     let arr = f[m];*/
/*               */
/*                     if( arr.indexOf( $(item).data('filter').toString()) > -1 ) {*/
/*                         flag = true;*/
/*                         break;              */
/*                     }*/
/*                 }*/
/*                 if( !flag ){*/
/*                     */
/*                     $(item).addClass('kai-disabled-filter')*/
/*                 } else {*/
/*                     if( $(item).hasClass('kai-disabled-filter')){*/
/*                         $(item).removeClass('kai-disabled-filter')*/
/*                         */
/*                     }*/
/*                 }*/
/*             }*/
/*         });*/
/*             }*/
/*         });*/
/*     });*/
/* </script>*/
/* */
/* 	</div>*/
/* </div>*/
/* {{ footer }} */
