<?php

/* so-revo/template/extension/module/filter.twig */
class __TwigTemplate_733a43457dfd31ba0af2eb019b9679f7f915ac4f04bdb4f7f9431fcbdcfd7d48 extends Twig_Template
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
        echo "<style>
.filter-group-selected {
  //background: green
}
.kai-disabled-filter {
  color: red;
  display: none
}
</style>
<div class=\"panel panel-default filter-module\">
  <div class=\"list-group\"> ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["filter_groups"]) ? $context["filter_groups"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["filter_group"]) {
            echo " <a class=\"list-group-item\"><span>";
            echo $this->getAttribute($context["filter_group"], "name", array());
            echo "</span><i class=\"fa fa-caret-down toggle-icon\"></i></a>
    <div class=\"list-group-item \">
        ";
            // line 14
            echo "      <div id=\"filter-group-";
            echo $this->getAttribute($context["filter_group"], "filter_group_id", array());
            echo "\" data-fgroup=\"";
            echo $this->getAttribute($context["filter_group"], "filter_group_id", array());
            echo "\" class=\"kai-filter-group\">";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["filter_group"], "filter", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
                // line 15
                echo "        <div class=\"checkbox kai-filter\" data-filter=\"";
                echo $this->getAttribute($context["filter"], "filter_id", array());
                echo "\">
          <label>";
                // line 16
                if (twig_in_filter($this->getAttribute($context["filter"], "filter_id", array()), (isset($context["filter_category"]) ? $context["filter_category"] : null))) {
                    // line 17
                    echo "            <input type=\"checkbox\" name=\"filter[]\" value=\"";
                    echo $this->getAttribute($context["filter"], "filter_id", array());
                    echo "\" checked=\"checked\" />
            ";
                    // line 18
                    echo $this->getAttribute($context["filter"], "name", array());
                    echo "
            ";
                } else {
                    // line 20
                    echo "            <input type=\"checkbox\" name=\"filter[]\" value=\"";
                    echo $this->getAttribute($context["filter"], "filter_id", array());
                    echo "\" />
            ";
                    // line 21
                    echo $this->getAttribute($context["filter"], "name", array());
                    echo "
            ";
                }
                // line 22
                echo "</label>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "</div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "</div>  
</div>
<script type=\"text/javascript\">

    
  //resets last id to 0, filters are changed
  \$('.filter-module input[type=checkbox]').on('change', function(e) {  
      
    const urlParams = new URLSearchParams(window.location.search);
    var manufacturer_id = urlParams.get('manufacturer_id');
    var id = \$(this).val(), man = ";
        // line 36
        echo (isset($context["man"]) ? $context["man"] : null);
        echo ", parent = ";
        echo (isset($context["parent"]) ? $context["parent"] : null);
        echo ";
    // console.log(\"manufacturer_id : \" + manufacturer_id);
    // console.log(\"man : \" + man);
    if (manufacturer_id && man === 0){
        man = manufacturer_id;
    }

    if( \$(this).prop('checked') ){ 
      //set current filter group is selected
      //filter-group-selected class
      if( !\$(this).parents('.kai-filter-group').hasClass('filter-group-selected')){
        \$(this).parents('.kai-filter-group').addClass('filter-group-selected')
      }
      
      \$.ajax({
    \turl: 'index.php?route=product/category/getFilterData',
      \ttype: 'get',
      \tdata: 'filter_id=' + id,
      \tdataType: 'json',
      \tsuccess:function( response ){
        //display selected filter info
        
        \$('.kai-selected-filters').append('<p class=\"kai-f-selected\" data-f=\"'+id+'\">'+response.filter_data.name + ' - ' + response.filter_data.filter_name+'<a href=\"/\"><i class=\"fa fa-close\"></i></a></p>');
        //disable filters that do not belong to filtered products
      }
      });
    
    } else {//remove selected filter info
  \t\t//if no selected element - remove filter-group-selected class
  \t\t\$('.kai-f-selected[data-f='+ id + ']').remove();
  \t\tif( !\$(this).parents('.kai-filter-group').find('input:checked').length ){
  \t\t  \$(this).parents('.kai-filter-group').removeClass('filter-group-selected');
  \t\t}
    }      

    var filter = [],
      sortOrder = \$('#input-sort').val(), sortOrderArr, sort, order, minPrice, maxPrice, search;
      \$('#last-id').val(0);
      sortOrderArr = sortOrder.split('-');
      sort = sortOrderArr[0];
      order = sortOrderArr[1];
      minPrice = \$(\"#min-price\").val();
      maxPrice = \$('#max-price').val();
      search = \$(\"#search\").val();
      if( !search ) {
        search = '';
      }

\t  \$('input[name^=\\'filter\\']:checked').each(function(element) {
\t \tfilter.push(this.value);
\t  });
     
      //filter the products
      \$.ajax({
        url: 'index.php?route=product/category/load_products',
        type: 'get',
        data: 'path=";
        // line 92
        echo (isset($context["path"]) ? $context["path"] : null);
        echo "&page=1&filter=' + filter.join(',') + \"&sort=\" + sort + \"&order=\"+order + \"&min_pr=\"+minPrice+\"&max_pr=\"+maxPrice+ '&man=' + man + '&parent='+parent+'&last=0'+'&search='+search,
        dataType: 'json',
        success:function( response ){
            // console.log('path=";
        // line 95
        echo (isset($context["path"]) ? $context["path"] : null);
        echo "&page=1&filter=' + filter.join(',') + \"&sort=\" + sort + \"&order=\"+order + \"&min_pr=\"+minPrice+\"&max_pr=\"+maxPrice+ '&man=' + man + '&parent='+parent+'&last=0'+'&search='+search);
            // console.log(response.products);
          var html = '', data = response.products, page = 1, f = response.filters;      
       
          //attach filtered products
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
          
          //reset last
          \$('#last-id').val(response.last)
          
          \$('#total-products').val(response.total)
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
                        
                    if( !\$(item).parents('.kai-filter-group').find('input:checked').length ){
                      
                      \$(item).parents('.kai-filter-group').removeClass('filter-group-selected')
                    }
                  }
                }
              }
            });
            //check non selected filter group have at least one non hidden filter
            \$('div.list-group-item').each(function(index, element){
                if(\$(element).find('.checkbox.kai-filter').not('.kai-disabled-filter').length > 0 ){
                    if( \$(element).prev().hasClass('disabled-kai-filter-group') ){
                        \$(element).prev().removeClass('disabled-kai-filter-group')
                    }
                } else {
                    if( !\$(element).prev().hasClass('disabled-kai-filter-group') ){
                        \$(element).prev().addClass('disabled-kai-filter-group')
                    }
                }
            });//end a each
          },
          error: function(response){
          console.log(response)
        }
        
        });
      });

  \$(\".filter-module a.list-group-item\").on('click', function(e){       
    let filterItems = \$(this).next();
      if( filterItems.hasClass('kai-hidden-filter-category-item') ){
        filterItems.removeClass('kai-hidden-filter-category-item').css({
            borderStyle:'solid',
            borderWidth: '1px',
            borderColor: '#ccc',
            borderLeft: 'none',
            borderRight: 'none',
            borderBottom: 'none'
        })
           
      \$(this).find('span').css({
          borderStyle:'solid',
          borderWidth: '3px',
          borderColor: ' #E30025',
          borderLeft: 'none',
          borderTop: 'none',
          borderRight: 'none'
      })
      \$(this).find('.fa').removeClass('fa-caret-down').addClass('fa-caret-up')
    } else {

      filterItems.addClass('kai-hidden-filter-category-item').css('border-top', 'none')
      \$(this).find('span').css('border-bottom', 'none')
      \$(this).find('.fa').removeClass('fa-caret-up').addClass('fa-caret-down')
    }
  })    
</script> 
";
    }

    public function getTemplateName()
    {
        return "so-revo/template/extension/module/filter.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 95,  165 => 92,  104 => 36,  92 => 26,  84 => 24,  76 => 22,  71 => 21,  66 => 20,  61 => 18,  56 => 17,  54 => 16,  49 => 15,  40 => 14,  31 => 11,  19 => 1,);
    }
}
/* <style>*/
/* .filter-group-selected {*/
/*   //background: green*/
/* }*/
/* .kai-disabled-filter {*/
/*   color: red;*/
/*   display: none*/
/* }*/
/* </style>*/
/* <div class="panel panel-default filter-module">*/
/*   <div class="list-group"> {% for filter_group in filter_groups %} <a class="list-group-item"><span>{{ filter_group.name }}</span><i class="fa fa-caret-down toggle-icon"></i></a>*/
/*     <div class="list-group-item ">*/
/*         {#kai-hidden-filter-category-item#}*/
/*       <div id="filter-group-{{ filter_group.filter_group_id }}" data-fgroup="{{ filter_group.filter_group_id }}" class="kai-filter-group">{% for filter in filter_group.filter %}*/
/*         <div class="checkbox kai-filter" data-filter="{{ filter.filter_id }}">*/
/*           <label>{% if filter.filter_id in filter_category %}*/
/*             <input type="checkbox" name="filter[]" value="{{ filter.filter_id }}" checked="checked" />*/
/*             {{ filter.name }}*/
/*             {% else %}*/
/*             <input type="checkbox" name="filter[]" value="{{ filter.filter_id }}" />*/
/*             {{ filter.name }}*/
/*             {% endif %}</label>*/
/*         </div>*/
/*         {% endfor %}</div>*/
/*     </div>*/
/*     {% endfor %}</div>  */
/* </div>*/
/* <script type="text/javascript">*/
/* */
/*     */
/*   //resets last id to 0, filters are changed*/
/*   $('.filter-module input[type=checkbox]').on('change', function(e) {  */
/*       */
/*     const urlParams = new URLSearchParams(window.location.search);*/
/*     var manufacturer_id = urlParams.get('manufacturer_id');*/
/*     var id = $(this).val(), man = {{ man }}, parent = {{ parent }};*/
/*     // console.log("manufacturer_id : " + manufacturer_id);*/
/*     // console.log("man : " + man);*/
/*     if (manufacturer_id && man === 0){*/
/*         man = manufacturer_id;*/
/*     }*/
/* */
/*     if( $(this).prop('checked') ){ */
/*       //set current filter group is selected*/
/*       //filter-group-selected class*/
/*       if( !$(this).parents('.kai-filter-group').hasClass('filter-group-selected')){*/
/*         $(this).parents('.kai-filter-group').addClass('filter-group-selected')*/
/*       }*/
/*       */
/*       $.ajax({*/
/*     	url: 'index.php?route=product/category/getFilterData',*/
/*       	type: 'get',*/
/*       	data: 'filter_id=' + id,*/
/*       	dataType: 'json',*/
/*       	success:function( response ){*/
/*         //display selected filter info*/
/*         */
/*         $('.kai-selected-filters').append('<p class="kai-f-selected" data-f="'+id+'">'+response.filter_data.name + ' - ' + response.filter_data.filter_name+'<a href="/"><i class="fa fa-close"></i></a></p>');*/
/*         //disable filters that do not belong to filtered products*/
/*       }*/
/*       });*/
/*     */
/*     } else {//remove selected filter info*/
/*   		//if no selected element - remove filter-group-selected class*/
/*   		$('.kai-f-selected[data-f='+ id + ']').remove();*/
/*   		if( !$(this).parents('.kai-filter-group').find('input:checked').length ){*/
/*   		  $(this).parents('.kai-filter-group').removeClass('filter-group-selected');*/
/*   		}*/
/*     }      */
/* */
/*     var filter = [],*/
/*       sortOrder = $('#input-sort').val(), sortOrderArr, sort, order, minPrice, maxPrice, search;*/
/*       $('#last-id').val(0);*/
/*       sortOrderArr = sortOrder.split('-');*/
/*       sort = sortOrderArr[0];*/
/*       order = sortOrderArr[1];*/
/*       minPrice = $("#min-price").val();*/
/*       maxPrice = $('#max-price').val();*/
/*       search = $("#search").val();*/
/*       if( !search ) {*/
/*         search = '';*/
/*       }*/
/* */
/* 	  $('input[name^=\'filter\']:checked').each(function(element) {*/
/* 	 	filter.push(this.value);*/
/* 	  });*/
/*      */
/*       //filter the products*/
/*       $.ajax({*/
/*         url: 'index.php?route=product/category/load_products',*/
/*         type: 'get',*/
/*         data: 'path={{ path }}&page=1&filter=' + filter.join(',') + "&sort=" + sort + "&order="+order + "&min_pr="+minPrice+"&max_pr="+maxPrice+ '&man=' + man + '&parent='+parent+'&last=0'+'&search='+search,*/
/*         dataType: 'json',*/
/*         success:function( response ){*/
/*             // console.log('path={{ path }}&page=1&filter=' + filter.join(',') + "&sort=" + sort + "&order="+order + "&min_pr="+minPrice+"&max_pr="+maxPrice+ '&man=' + man + '&parent='+parent+'&last=0'+'&search='+search);*/
/*             // console.log(response.products);*/
/*           var html = '', data = response.products, page = 1, f = response.filters;      */
/*        */
/*           //attach filtered products*/
/*           for( let ind in data ){          */
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
/*             if ( product.price ){ */
/*             html += '<div class="price">';*/
/*               if ( !product.special ) {*/
/*                 html += '<span class="price-new">' + product.price + '</span>';*/
/*               }else {   */
/*                 html += '<span class="price-new">' + product.special + '</span> <span class="price-old">' + product.price + '</span>';*/
/*               } */
/*             html += '</div>';*/
/*             }         */
/*             html += '<div class="description">';*/
/*             html += '<p>' + product.description + '</p>';*/
/*             html += '</div>';*/
/*             html += '</div>';*/
/*             html += '</div>';*/
/*             html += '</div>';*/
/*           }*/
/*           */
/*           //reset last*/
/*           $('#last-id').val(response.last)*/
/*           */
/*           $('#total-products').val(response.total)*/
/*           $('.products-list').html( html )        */
/*      */
/*           //toggle filters        */
/*           //hide filters that do not belong to filtered products*/
/*             */
/*             $('.checkbox.kai-filter').each(function(index, item){*/
/*             //check item parent is not selected*/
/*               if( !$(item).parents('.kai-filter-group').hasClass('filter-group-selected') ){*/
/*                 let flag = false;*/
/*                 */
/*                 for(let m in f ){*/
/*                   let arr = f[m];*/
/*               */
/*                   if( arr.indexOf( $(item).data('filter').toString()) > -1 ) {*/
/*                     flag = true;*/
/*                     break;              */
/*                   }*/
/*                 }*/
/*                 if( !flag ){*/
/*                     */
/*                   $(item).addClass('kai-disabled-filter')*/
/*                 } else {*/
/*                     */
/*                   if( $(item).hasClass('kai-disabled-filter')){*/
/*                     */
/*                     $(item).removeClass('kai-disabled-filter')*/
/*                         */
/*                     if( !$(item).parents('.kai-filter-group').find('input:checked').length ){*/
/*                       */
/*                       $(item).parents('.kai-filter-group').removeClass('filter-group-selected')*/
/*                     }*/
/*                   }*/
/*                 }*/
/*               }*/
/*             });*/
/*             //check non selected filter group have at least one non hidden filter*/
/*             $('div.list-group-item').each(function(index, element){*/
/*                 if($(element).find('.checkbox.kai-filter').not('.kai-disabled-filter').length > 0 ){*/
/*                     if( $(element).prev().hasClass('disabled-kai-filter-group') ){*/
/*                         $(element).prev().removeClass('disabled-kai-filter-group')*/
/*                     }*/
/*                 } else {*/
/*                     if( !$(element).prev().hasClass('disabled-kai-filter-group') ){*/
/*                         $(element).prev().addClass('disabled-kai-filter-group')*/
/*                     }*/
/*                 }*/
/*             });//end a each*/
/*           },*/
/*           error: function(response){*/
/*           console.log(response)*/
/*         }*/
/*         */
/*         });*/
/*       });*/
/* */
/*   $(".filter-module a.list-group-item").on('click', function(e){       */
/*     let filterItems = $(this).next();*/
/*       if( filterItems.hasClass('kai-hidden-filter-category-item') ){*/
/*         filterItems.removeClass('kai-hidden-filter-category-item').css({*/
/*             borderStyle:'solid',*/
/*             borderWidth: '1px',*/
/*             borderColor: '#ccc',*/
/*             borderLeft: 'none',*/
/*             borderRight: 'none',*/
/*             borderBottom: 'none'*/
/*         })*/
/*            */
/*       $(this).find('span').css({*/
/*           borderStyle:'solid',*/
/*           borderWidth: '3px',*/
/*           borderColor: ' #E30025',*/
/*           borderLeft: 'none',*/
/*           borderTop: 'none',*/
/*           borderRight: 'none'*/
/*       })*/
/*       $(this).find('.fa').removeClass('fa-caret-down').addClass('fa-caret-up')*/
/*     } else {*/
/* */
/*       filterItems.addClass('kai-hidden-filter-category-item').css('border-top', 'none')*/
/*       $(this).find('span').css('border-bottom', 'none')*/
/*       $(this).find('.fa').removeClass('fa-caret-up').addClass('fa-caret-down')*/
/*     }*/
/*   })    */
/* </script> */
/* */
