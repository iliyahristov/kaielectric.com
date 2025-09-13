<?php

/* so-revo/template/product/search.twig */
class __TwigTemplate_a0b3e147a4f0efd98c01bb68a19a643fc87b846d2826933d90fe14561fcec8a2 extends Twig_Template
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
<input type=\"hidden\" id=\"last-id\" value=\"\" />
<input id=\"search\" type=\"hidden\" value=";
        // line 3
        echo (isset($context["search"]) ? $context["search"] : null);
        echo " />
<div class=\"container\">
  <ul class=\"breadcrumb\">
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 7
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
        // line 9
        echo "  </ul>
  <div class=\"row\">";
        // line 10
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
    ";
        // line 11
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 12
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 13
            echo "    ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 14
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 15
            echo "    ";
        } else {
            // line 16
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 17
            echo "    ";
        }
        // line 18
        echo "    
    <div id=\"content\" class=\"";
        // line 19
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
\t\t<div class=\"form-group\">
\t\t\t<h1>";
        // line 21
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1>
\t\t 
\t\t</div>
\t\t";
        // line 24
        if ((isset($context["products"]) ? $context["products"] : null)) {
            // line 25
            echo "\t\t
\t  
\t\t";
            // line 28
            echo "\t\t<div class=\"products-category\">
\t\t";
            // line 29
            $this->loadTemplate(((isset($context["theme_directory"]) ? $context["theme_directory"] : null) . "/template/soconfig/listing.twig"), "so-revo/template/product/search.twig", 29)->display(array_merge($context, array("listingType" => (isset($context["listingType"]) ? $context["listingType"] : null))));
            // line 30
            echo "\t\t</div>
\t  
\t  
\t\t";
        } else {
            // line 34
            echo "\t\t\t<p>";
            echo (isset($context["text_empty"]) ? $context["text_empty"] : null);
            echo "</p>
\t\t\t<div class=\"buttons\">
\t\t\t\t<div class=\"pull-right\"><a href=\"";
            // line 36
            echo (isset($context["continue"]) ? $context["continue"] : null);
            echo "\" class=\"btn btn-primary\">";
            echo (isset($context["button_continue"]) ? $context["button_continue"] : null);
            echo "</a></div>
\t\t\t</div>
\t\t";
        }
        // line 39
        echo "\t  
      ";
        // line 40
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "</div>
    ";
        // line 41
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "</div>
</div>
<script type=\"text/javascript\"><!--
\$('#button-search').bind('click', function() {
\turl = 'index.php?route=product/search';

\tvar search = \$('#content input[name=\\'search\\']').prop('value');

\tif (search) {
\t\turl += '&search=' + encodeURIComponent(search);
\t}

\tvar category_id = \$('#content select[name=\\'category_id\\']').prop('value');

\tif (category_id > 0) {
\t\turl += '&category_id=' + encodeURIComponent(category_id);
\t}

\tvar sub_category = \$('#content input[name=\\'sub_category\\']:checked').prop('value');

\tif (sub_category) {
\t\turl += '&sub_category=true';
\t}

\tvar filter_description = \$('#content input[name=\\'description\\']:checked').prop('value');

\tif (filter_description) {
\t\turl += '&description=true';
\t}

\tlocation = url;
});

\$('#content input[name=\\'search\\']').bind('keydown', function(e) {
\tif (e.keyCode == 13) {
\t\t\$('#button-search').trigger('click');
\t}
});

\$('select[name=\\'category_id\\']').on('change', function() {
\tif (this.value == '0') {
\t\t\$('input[name=\\'sub_category\\']').prop('disabled', true);
\t} else {
\t\t\$('input[name=\\'sub_category\\']').prop('disabled', false);
\t}
});

\$('select[name=\\'category_id\\']').trigger('change');
--></script>
<script>
var container = \$('.products-list'),
        request_in_progress = false,
        total = \$('#total-products').val(),
        previousScroll = 0,
        man = '';
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
    
    var filter = [], next_page, filterQuery, sortOrder, sortOrderArr, sort, order, minPrice, maxPrice, lastId, total, search;        

    sortOrder = \$('#input-sort').val(), sortOrderArr, sort, order;
    sortOrderArr = sortOrder.split('-');
    sort = sortOrderArr[0];
    order = sortOrderArr[1];
    minPrice = \$(\"#min-price\").val();
    maxPrice = \$('#max-price').val();
    lastId = \$('#last-id').val();
    total = \$('#total-products').val()
    search = \$('#search').val();

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
        // line 165
        echo (isset($context["path"]) ? $context["path"] : null);
        echo "&page=' + next_page + '&limit=12&' + filterQuery + \"&sort=\" + sort + \"&order=\"+order + \"&min_pr=\"+minPrice+\"&max_pr=\"+maxPrice + '&man=' + man + '&parent='+parent + '&last='+lastId + '&search=' + search,
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

    let html = '';
    for( let ind in data ){
        let product = data[ind];

        html += '<div class=\"product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12\" data-page=\"'+ page +'\">';
        html += '<div class=\"product-item-container\">';
        html += '<div class=\"left-block left-b\">';
        html += '<div class=\"product-image-container\">';
        html += '<a href=\"' + product.href + '\" title=\"' + product.name + '\">'; //  target=\"_blank\" 09.01.2023
        html += '<img  data-sizes=\"auto\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" data-src=\"' + product.thumb + '\"  title=\"' + product.name + '\" class=\"lazyload img-responsive\" alt=\"' + product.name + '\"/>';
        html += '</a>';
        html += '</div>';
        html += '</div>';
        html += '<div class=\"right-block right-b\">';
        html += '<h4><a href=\"' + product.href + '\">' + product.name + '</a></h4>'; //  target=\"_blank\" 09.01.2023
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
        html += '<a href=\"' + product.href + '\" title=\"' + product.name + '\">';
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
    search = \$('#search').val();

        
    \$('input[name^=\\'filter\\']:checked').each(function(element) {
        filter.push(this.value);
    });
    
    if( filter.length ){
        filterQuery = '&filter=' + filter.join(',');
    } else {
     filterQuery = '&filter=';
    }
    \$.ajax({
        url: 'index.php?route=product/category/load_products',
        type: 'get',
        data: 'path=";
        // line 280
        echo (isset($context["path"]) ? $context["path"] : null);
        echo "&page=1&limit=12&' + filterQuery + \"&sort=\" + sort + \"&order=\"+order + \"&min_pr=\"+minPrice+\"&max_pr=\"+ maxPrice + '&man=' + man + '&parent='+parent+'&last=0' + '&search=' + search,
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
        // line 322
        echo (isset($context["path"]) ? $context["path"] : null);
        echo "&page=1&limit=12&filter=' + filter.join(',') + \"&sort=\" + sort + \"&order=\"+order + \"&min_pr=\"+minPrice+\"&max_pr=\"+maxPrice + '&man=' + man + '&parent='+parent+'&last=0'+'&search=' + search,
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
                html += '<a href=\"' + product.href + '\" title=\"' + product.name + '\">'; // target=\"_blank\" 09.01.2023
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

";
        // line 395
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "so-revo/template/product/search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  492 => 395,  416 => 322,  371 => 280,  253 => 165,  126 => 41,  122 => 40,  119 => 39,  111 => 36,  105 => 34,  99 => 30,  97 => 29,  94 => 28,  90 => 25,  88 => 24,  82 => 21,  75 => 19,  72 => 18,  69 => 17,  66 => 16,  63 => 15,  60 => 14,  57 => 13,  54 => 12,  52 => 11,  48 => 10,  45 => 9,  34 => 7,  30 => 6,  24 => 3,  19 => 1,);
    }
}
/* {{ header }}*/
/* <input type="hidden" id="last-id" value="" />*/
/* <input id="search" type="hidden" value={{ search }} />*/
/* <div class="container">*/
/*   <ul class="breadcrumb">*/
/*     {% for breadcrumb in breadcrumbs %}*/
/*     <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/*     {% endfor %}*/
/*   </ul>*/
/*   <div class="row">{{ column_left }}*/
/*     {% if column_left and column_right %}*/
/*     {% set class = 'col-sm-6' %}*/
/*     {% elseif column_left or column_right %}*/
/*     {% set class = 'col-sm-9' %}*/
/*     {% else %}*/
/*     {% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/*     */
/*     <div id="content" class="{{ class }}">{{ content_top }}*/
/* 		<div class="form-group">*/
/* 			<h1>{{ heading_title }}</h1>*/
/* 		 */
/* 		</div>*/
/* 		{% if products %}*/
/* 		*/
/* 	  */
/* 		{#==== Product Listing ==== #}*/
/* 		<div class="products-category">*/
/* 		{% include theme_directory~'/template/soconfig/listing.twig' with {listingType: listingType} %}*/
/* 		</div>*/
/* 	  */
/* 	  */
/* 		{% else %}*/
/* 			<p>{{ text_empty }}</p>*/
/* 			<div class="buttons">*/
/* 				<div class="pull-right"><a href="{{ continue }}" class="btn btn-primary">{{ button_continue }}</a></div>*/
/* 			</div>*/
/* 		{% endif %}*/
/* 	  */
/*       {{ content_bottom }}</div>*/
/*     {{ column_right }}</div>*/
/* </div>*/
/* <script type="text/javascript"><!--*/
/* $('#button-search').bind('click', function() {*/
/* 	url = 'index.php?route=product/search';*/
/* */
/* 	var search = $('#content input[name=\'search\']').prop('value');*/
/* */
/* 	if (search) {*/
/* 		url += '&search=' + encodeURIComponent(search);*/
/* 	}*/
/* */
/* 	var category_id = $('#content select[name=\'category_id\']').prop('value');*/
/* */
/* 	if (category_id > 0) {*/
/* 		url += '&category_id=' + encodeURIComponent(category_id);*/
/* 	}*/
/* */
/* 	var sub_category = $('#content input[name=\'sub_category\']:checked').prop('value');*/
/* */
/* 	if (sub_category) {*/
/* 		url += '&sub_category=true';*/
/* 	}*/
/* */
/* 	var filter_description = $('#content input[name=\'description\']:checked').prop('value');*/
/* */
/* 	if (filter_description) {*/
/* 		url += '&description=true';*/
/* 	}*/
/* */
/* 	location = url;*/
/* });*/
/* */
/* $('#content input[name=\'search\']').bind('keydown', function(e) {*/
/* 	if (e.keyCode == 13) {*/
/* 		$('#button-search').trigger('click');*/
/* 	}*/
/* });*/
/* */
/* $('select[name=\'category_id\']').on('change', function() {*/
/* 	if (this.value == '0') {*/
/* 		$('input[name=\'sub_category\']').prop('disabled', true);*/
/* 	} else {*/
/* 		$('input[name=\'sub_category\']').prop('disabled', false);*/
/* 	}*/
/* });*/
/* */
/* $('select[name=\'category_id\']').trigger('change');*/
/* --></script>*/
/* <script>*/
/* var container = $('.products-list'),*/
/*         request_in_progress = false,*/
/*         total = $('#total-products').val(),*/
/*         previousScroll = 0,*/
/*         man = '';*/
/*         parent = 0;*/
/* */
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
/*     var filter = [], next_page, filterQuery, sortOrder, sortOrderArr, sort, order, minPrice, maxPrice, lastId, total, search;        */
/* */
/*     sortOrder = $('#input-sort').val(), sortOrderArr, sort, order;*/
/*     sortOrderArr = sortOrder.split('-');*/
/*     sort = sortOrderArr[0];*/
/*     order = sortOrderArr[1];*/
/*     minPrice = $("#min-price").val();*/
/*     maxPrice = $('#max-price').val();*/
/*     lastId = $('#last-id').val();*/
/*     total = $('#total-products').val()*/
/*     search = $('#search').val();*/
/* */
/*     $('input[name^=\'filter\']:checked').each(function(element) {*/
/*         filter.push(this.value);*/
/*     });*/
/*         */
/*     if( filter.length ){*/
/*         filterQuery = '&filter=' + filter.join(',');*/
/*     } */
/* */
/*     if(request_in_progress) { return; }*/
/* */
/*   */
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
/*         data: 'path={{path}}&page=' + next_page + '&limit=12&' + filterQuery + "&sort=" + sort + "&order="+order + "&min_pr="+minPrice+"&max_pr="+maxPrice + '&man=' + man + '&parent='+parent + '&last='+lastId + '&search=' + search,*/
/*         dataType: 'json',*/
/*         success:function( response ){  */
/*             $('#total-products').val(response.total)*/
/*             appendToDiv( container, response.products, next_page ); */
/*           */
/*                 request_in_progress = false;*/
/*                 $('#last-id').val(response.last)*/
/*             }*/
/*     });*/
/* }*/
/* */
/* function appendToDiv(div, data, page ) {*/
/* */
/*     let html = '';*/
/*     for( let ind in data ){*/
/*         let product = data[ind];*/
/* */
/*         html += '<div class="product-layout product-grid product-grid-3 col-lg-4 col-md-4 col-sm-6 col-xs-12" data-page="'+ page +'">';*/
/*         html += '<div class="product-item-container">';*/
/*         html += '<div class="left-block left-b">';*/
/*         html += '<div class="product-image-container">';*/
/*         html += '<a href="' + product.href + '" title="' + product.name + '">'; //  target="_blank" 09.01.2023*/
/*         html += '<img  data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="' + product.thumb + '"  title="' + product.name + '" class="lazyload img-responsive" alt="' + product.name + '"/>';*/
/*         html += '</a>';*/
/*         html += '</div>';*/
/*         html += '</div>';*/
/*         html += '<div class="right-block right-b">';*/
/*         html += '<h4><a href="' + product.href + '">' + product.name + '</a></h4>'; //  target="_blank" 09.01.2023*/
/*         if ( product.price ){*/
/*             html += '<div class="price">';*/
/*             if ( !product.special ) {*/
/*                 html += '<span class="price-new">' + product.price + '</span>';*/
/*             }else {*/
/*                 html += '<span class="price-new">' + product.special + '</span> <span class="price-old">' + product.price + '</span>';*/
/*             }*/
/*             html += '</div>';*/
/*         }*/
/*         html += '<div class="description">';*/
/*         html += '<p>' + product.description + '</p>';*/
/*         html += '</div>';*/
/*         html += '</div>';*/
/*         html += '</div>';*/
/*         html += '</div>';*/
/*     }*/
/* */
/*     div.append( html )*/
/* }*/
/* */
/*    */
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
/*         html += '<a href="' + product.href + '" title="' + product.name + '">';*/
/*         html += '<img  data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="' + product.thumb + '"  title="' + product.name + '" class="lazyload img-responsive" alt="' + product.name + '"/>';*/
/*         html += '</a>';*/
/*         html += '</div>';*/
/*         html += '</div>';               */
/*         html += '<div class="right-block right-b">';*/
/*         html += '<h4><a href="' + product.href + '" >' + product.name + '</a></h4>'; // target="_blank" 09.01.2023*/
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
/*     search = $('#search').val();*/
/* */
/*         */
/*     $('input[name^=\'filter\']:checked').each(function(element) {*/
/*         filter.push(this.value);*/
/*     });*/
/*     */
/*     if( filter.length ){*/
/*         filterQuery = '&filter=' + filter.join(',');*/
/*     } else {*/
/*      filterQuery = '&filter=';*/
/*     }*/
/*     $.ajax({*/
/*         url: 'index.php?route=product/category/load_products',*/
/*         type: 'get',*/
/*         data: 'path={{ path }}&page=1&limit=12&' + filterQuery + "&sort=" + sort + "&order="+order + "&min_pr="+minPrice+"&max_pr="+ maxPrice + '&man=' + man + '&parent='+parent+'&last=0' + '&search=' + search,*/
/*         dataType: 'json',*/
/*         success:function( response ){*/
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
/*         data: 'path={{ path }}&page=1&limit=12&filter=' + filter.join(',') + "&sort=" + sort + "&order="+order + "&min_pr="+minPrice+"&max_pr="+maxPrice + '&man=' + man + '&parent='+parent+'&last=0'+'&search=' + search,*/
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
/*                 html += '<a href="' + product.href + '" title="' + product.name + '">'; // target="_blank" 09.01.2023*/
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
/* {{ footer }}*/
