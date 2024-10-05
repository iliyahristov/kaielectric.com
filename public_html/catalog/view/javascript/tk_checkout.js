
	
//когато се зареди страницата извикваме всички нужни данни
$(document).ready(function() { 
	
		getSchipingMethod(); 
			
		$('a.agree').addClass('tk_agree').removeClass('agree');
		$('#tk_button_confirm').prop('disabled', false);

		$('#tk_login').magnificPopup( { 
				items: { 
					src: '.tk_login_form',
					type: 'inline',
					mainClass: 'mfp_tk_login'
				} 
			});

		$('#tk_agree_popup a').magnificPopup( { 
				type: 'iframe',
				iframe: { 
					patterns: { 
						bgmaps: { 				 
							index: 'javascript:void(0);',					
							src: $(this).find('a').attr('href')					
						} 
					} 
				} 
			});

	});
	
//при смяна на метод за доставка 
// 1) извикваме новите методи за плащане => извика скрития бутон за потвърждение на плащането
// 2) извикваме съответните адреси или офиси за избор
// 3) извикваме преизчислени тотали на количката => извежда преизчислено съобщение за оставаща сума до безплатна доставка
$(document).delegate('input[name=\'shipping_method\']', 'click', function() { 
		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');
		$('#tk_checkout').css('opacity','0.6');
		$('#tk_checkout').css('pointer-events','none');
		$('#tk_button_confirm').prop('disabled', true);
			
		getSchipingAddress(); 
		
			
	}); 
	
//при смяна на метод за плащане 
// 1) извикваме преизчислени методите за доставка => съответните адреси или офиси за избор; преизчислени тотали на количката;
$(document).delegate('input[name=\'payment_method\']', 'click', function() { 
		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');
		$('#tk_checkout').css('opacity','0.6');
		$('#tk_checkout').css('pointer-events','none');
		$('#tk_button_confirm').prop('disabled', true);
			
		getSchipingMethodPayment();

	}); 
	

//запазваме всички текущи данни
function saveData() { 
	setTimeout(function() {

			var data = $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select').serialize();
			data += '&_shipping_method='+ $('.tk_form input[name=\'shipping_method\']:checked').prop('title') + '&_payment_method=' + $('.tk_form input[name=\'payment_method\']:checked').prop('title');

			
			$.ajax( { 
					url: 'index.php?route=tk_checkout/checkout/add_abandoned_cart',
					type: 'post',
					data: data,
					dataType: 'json'
				}); 
		} , 500);
} 

// изпълнима функция за сейв
function getSave() { 
	$('.tk_alert').remove();
	$('#tk_button_confirm').button('reset');
	$('.tk_all_spin').html('');
	$('#tk_checkout').css('opacity','1');
	$('#tk_checkout').css('pointer-events','auto');
	$('#tk_button_confirm').prop('disabled', false);	
			
	saveData();	
}	


//извежда методите за плащане
function getPaymentMethod() { 
	$("#tk_payment_table").load('index.php?route=tk_checkout/checkout/get_payment_method', $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select'));
		
} 
	 
//извежда скрития бутон на платежния модул
function getPaymentDisplay() { 
	$("#tk_payment_triger").load('index.php?route=tk_checkout/checkout/get_payment_display', $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select'));
		
} 
	 
//Стартираме бутона за плащане
function getPaymentTriger() { 
	$("#tk_payment_triger").html('');
	 	
	$("#tk_payment_triger_run").load('index.php?route=tk_checkout/checkout/get_payment_triger', $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select'));
	
	var payment_method = $('.tk_form input[name=\'payment_method\']:checked').val();
	var payment_method_popup = $('.tk_form input[name=\'payment_method_popup_' + payment_method + '\']').val();

	if(payment_method_popup == 0){
		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');
		$('#tk_checkout').css('opacity','0.6');
		$('#tk_checkout').css('pointer-events','none');
		$('#tk_button_confirm').prop('disabled', true);	
	}
	
}  

	
//извежда методите за доставка
function getSchipingMethod() { 
	$("#tk_shipping_table").load('index.php?route=tk_checkout/checkout/get_shipping_method', $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select'));	
} 

//извежда преизчислени методи за доставка без да променя селектора на адреси и офиси
function getSchipingMethodAddress() { 
	$("#tk_shipping_table").load('index.php?route=tk_checkout/checkout/get_shipping_method&type=method_address', $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select'));
} 
	 
//извежда преизчислени методи за доставка + селектора на адреси и офиси + новите методи за плащане - спрямо метода на доставка
function getSchipingMethodPayment() { 
	$("#tk_shipping_table").load('index.php?route=tk_checkout/checkout/get_shipping_method&type=method_payment', $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select'));
} 

//извежда преизчислени методи за доставка + селектора на адреси и офиси + новите методи за плащане - спрямо метода на доставка
function getSchipingMethodPaymentAddress() { 
	$("#tk_shipping_table").load('index.php?route=tk_checkout/checkout/get_shipping_method&type=method_payment_address', $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select'));
} 

//извежда преизчислени методи за доставка + селектора на адреси и офиси спрямо метода на доставка
function getSchipingAddress() { 
	$("#tk_address_table").load('index.php?route=tk_checkout/checkout/get_address_shipping', $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select'));
		
} 
	 
//извежда допълнителните полета към адреси
function getAddressCustomFields() { 
	$("#tk_address_custom_fields_table").load('index.php?route=tk_checkout/checkout/get_address_custom_fields', $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select'));
} 
	
//извежда допълнителните полета към акаунта
function getAccountCustomFields() { 
	$("#tk_account_custom_fields_table").load('index.php?route=tk_checkout/checkout/get_account_custom_fields', $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select'));
} 
	 
//извежда изчисленията за оставаща сума до безплатна доставка
function getTextFreeShipping() { 
	$("#tk_text_free_shipping_table").load('index.php?route=tk_checkout/checkout/get_text_free_shipping', $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select'));
}
 
//извежда тоталите на количката => извежда преизчислено съобщение за оставаща сума до безплатна доставка
//ако сесията е изтекла и количката е празна редиректва към страницата за празна количка
function getCart() { 
	$("#tk_cart_table").load('index.php?route=tk_checkout/checkout/get_cart', $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select'));
} 

	

	 
//тегло на количката
function getCartWeight() { 

	$.ajax( { 
			url: 'index.php?route=tk_checkout/checkout/get_cart_weight',
			type: 'post',
			data: '',
			dataType: 'json',
			beforeSend: function() { 
						
			} ,
			complete: function() { 
						
			} ,
			success: function(json) { 
				if (json['weight']) { 
					$('.tk_weight_cart').html(json['weight']);
				}
			} ,
			error: function(xhr, ajaxOptions, thrownError) { 
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			} 
		});
		
} 
	
function minCart() { 

	$.ajax( { 
			url: 'index.php?route=tk_checkout/checkout/get_min_cart',
			type: 'post',
			data: '',
			dataType: 'json',
			beforeSend: function() { 
						
			} ,
			complete: function() { 
						
			} ,
			success: function(json) { 
				if (json['total']) { 
					$('.cart-content ul').load('index.php?route=common/cart/info ul li');
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
					
					$('#cart-items,.cart-badge').html(json['items_count']);
					$('#cart-total').html(json['total']);
				}
			} ,
			error: function(xhr, ajaxOptions, thrownError) { 
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			} 
		});
		
} 
	 
//запазваме количството на продукта => извикваме отново методите за доставка, плащане и преизчислени тотали на количката - работи само над 0
function updateCart(key, quantity) { 
	if(quantity > 0) { 
		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');
		$('#tk_checkout').css('opacity','0.6');
		$('#tk_checkout').css('pointer-events','none');
			
		$.ajax( { 
				url: 'index.php?route=tk_checkout/checkout/edit_cart',
				type: 'post',
				data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
				dataType: 'json',
				beforeSend: function() { 
					$('#tk_cart_product_' + key + ' > button').button('loading');
				} ,
				complete: function() { 
					$('#tk_cart_product_' + key + ' > button').button('reset');
				} ,
				success: function(json) { 
						
					if (json['redirect']) { 
						location = json['redirect'];
					} else { 

						$('#tk_cart_product_total_' + key).html(json['total']);
						getSchipingMethod();
	
					} 
				} ,
				error: function(xhr, ajaxOptions, thrownError) { 
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				} 
			});
	} 	
} 
	
//премахване на продукт от количката => извикваме отново методите за доставка, плащане и преизчислени тотали на количката => ако е последн продукт редирект към страницата с празна количка
function removeCart(key) { 
	$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');
	$('#tk_checkout').css('opacity','0.6');
	$('#tk_checkout').css('pointer-events','none');
	$.ajax( { 
			url: 'index.php?route=tk_checkout/checkout/remove_cart',
			type: 'post',
			data: 'key=' + key,
			dataType: 'json',
			beforeSend: function() { 
				$('#tk_cart_product_' + key + ' > button').button('loading');
			} ,
			complete: function() { 
				$('#tk_cart_product_' + key + ' > button').button('reset');
			} ,
			success: function(json) { 
					
				if (json['redirect']) { 
					location = json['redirect'];
				} else { 
					$('#tk_cart_product_' + key).remove();
						
					getSchipingMethod();
		
				} 
			} ,
			error: function(xhr, ajaxOptions, thrownError) { 
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			} 
		});
} 

//запазване на данни за вписване - работи с презареждане на страницата
$(document).on('click', '#tk_button_login', function(event) { 
		$.ajax( { 
				url: 'index.php?route=tk_checkout/checkout/validate_login',
				type: 'post',
				data: $('.tk_login_form :input'),
				dataType: 'json',
				beforeSend: function() { 
					$('#tk_button_login').button('loading');
				} , 
				complete: function() { 
					$('#tk_button_login').button('reset');
				} , 
				success: function(json) { 
					
					$('tk_alert').remove();
 
					if (json['redirect']) { 
						location = json['redirect'];
					} else if (json['error']) { 
						$('.tk_login_form .tk_message_login').prepend('<div class="tk_alert_stay"> ' + json['error']['warning'] + '</div>');
					} 
				} ,
				error: function(xhr, ajaxOptions, thrownError) { 
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				} 
			}); 
		event.stopImmediatePropagation()
	});
	
//проверка на валидноста на бонус точките => извикваме отново методите за доставка и преизчислени тотали на количката
$(document).on('click', '#tk_confirm_reward', function(event) { 
		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');
		$('#tk_checkout').css('opacity','0.6');
		$('#tk_checkout').css('pointer-events','none');
		$('.tk_checkout_reward').html('');
		$.ajax( { 
				url: 'index.php?route=tk_checkout/checkout/validate_reward',
				type: 'post',
				data: 'reward=' + encodeURIComponent($('input[name=\'reward\']').val()),
				dataType: 'json',
				beforeSend: function() { 
 
				} ,
				complete: function() { 
 
				} ,
				success: function(json) { 
					if(json['error']) { 
						$('.tk_checkout_reward').prepend('<span class="tk_alert" >' + json['error'] + '</span>');
						$('.tk_all_spin').html('');
						$('#tk_checkout').css('opacity','1');
						$('#tk_checkout').css('pointer-events','auto');
					} 
					$('.tk_checkout_reward .tk_success').remove();
					if(json['success']) { 
						$('.tk_checkout_reward').prepend('<span class="tk_success" >' + json['success'] + '</span>');
						$('.tk_remove_reward_box').html('<span class="tk_right tk_remove" id="tk_remove_reward" ><i class="tk_icon-close"></i></span>');
						$('#tk_reward').addClass('tk_remove_reward_ok');

						getSchipingMethod();

					} 
				} ,
				error: function(xhr, ajaxOptions, thrownError) { 
					console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				} 
			}); 
		event.stopImmediatePropagation()
	});

//премахване на бонус точките => извикваме отново методите за доставка и преизчислени тотали на количката		 
$(document).on('click', '#tk_remove_reward', function(event) { 
		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');
		$('#tk_checkout').css('opacity','0.6');
		$('#tk_checkout').css('pointer-events','none');
		$('.tk_checkout_reward').html('');
		$.ajax( { 
				url: 'index.php?route=tk_checkout/checkout/remove_reward',
				type: 'post',
				data: 'reward=' + encodeURIComponent($('input[name=\'reward\']').val()),
				dataType: 'json',
				beforeSend: function() { 
 
				} ,
				complete: function() { 
 
				} ,
				success: function(json) { 
					$('.tk_checkout_reward .tk_success').remove();
					$('input[name=\'reward\']').val('');
					$('#tk_remove_reward_box').html('');
					$('#tk_reward').removeClass('tk_remove_reward_ok');
							
					if(json['success']) { 
						$('.tk_checkout_reward').prepend('<span class="tk_success" >' + json['success'] + '</span>');

						getSchipingMethod();
	
					} 
				} ,
				error: function(xhr, ajaxOptions, thrownError) { 
					console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				} 
			}); 
		event.stopImmediatePropagation()
	});

//проверка на валидноста на купона => извикваме отново методите за доставка и преизчислени тотали на количката
$(document).on('click', '#tk_confirm_coupon', function(event) { 
		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');
		$('#tk_checkout').css('opacity','0.6');
		$('#tk_checkout').css('pointer-events','none');
		$('.tk_checkout_coupon').html('');
		$.ajax( { 
				url: 'index.php?route=tk_checkout/checkout/validate_coupon',
				type: 'post',
				data: 'coupon=' + encodeURIComponent($('input[name=\'coupon\']').val()),
				dataType: 'json',
				beforeSend: function() { 
 
				} ,
				complete: function() { 
 
				} ,
				success: function(json) { 
					$('.tk_checkout_coupon .tk_success').remove();
					if(json['error']) { 
						$('.tk_checkout_coupon').prepend('<span class="tk_alert" >' + json['error'] + '</span>');
						$('.tk_all_spin').html('');
						$('#tk_checkout').css('opacity','1');
						$('#tk_checkout').css('pointer-events','auto');
					} 
					if(json['success']) { 
						$('.tk_checkout_coupon').prepend('<span class="tk_success" >' + json['success'] + '</span>');
						$('#tk_remove_coupon_box').html('<span class="tk_right tk_remove" id="tk_remove_coupon" ><i class="tk_icon-close"></i></span>');
						$('#tk_coupon').addClass('tk_remove_coupon_ok');

						getSchipingMethod();


					} 
				} ,
				error: function(xhr, ajaxOptions, thrownError) { 
					console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				} 
			}); 
		event.stopImmediatePropagation()
	});

//премахване на купона => извикваме отново методите за доставка и преизчислени тотали на количката
$(document).on('click', '#tk_remove_coupon', function(event) { 
		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');
		$('#tk_checkout').css('opacity','0.6');
		$('#tk_checkout').css('pointer-events','none');
		$('.tk_checkout_coupon').html('');
		$.ajax( { 
				url: 'index.php?route=tk_checkout/checkout/remove_coupon',
				type: 'post',
				data: 'coupon=' + encodeURIComponent($('input[name=\'coupon\']').val()),
				dataType: 'json',
				beforeSend: function() { 
 
				} ,
				complete: function() { 
 
				} ,
				success: function(json) { 
					$('.tk_checkout_coupon .tk_success').remove();
					$('input[name=\'coupon\']').val('');

					$('#tk_remove_coupon_box').html('');
					$('#tk_coupon').removeClass('tk_remove_coupon_ok');
							
					if(json['success']) { 
						$('.tk_checkout_coupon').prepend('<span class="tk_success" >' + json['success'] + '</span>');

						getSchipingMethod();
			
					} 
				} ,
				error: function(xhr, ajaxOptions, thrownError) { 
					console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				} 
			}); 
		event.stopImmediatePropagation()
	});

//проверка на валидноста на ваучера => извикваме отново методите за доставка и преизчислени тотали на количката
$(document).on('click', '#tk_confirm_voucher', function(event) { 
		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');
		$('#tk_checkout').css('opacity','0.6');
		$('#tk_checkout').css('pointer-events','none');
		$('.tk_checkout_voucher').html('');
		$.ajax( { 
				url: 'index.php?route=tk_checkout/checkout/validate_voucher',
				type: 'post',
				data: 'voucher=' + encodeURIComponent($('input[name=\'voucher\']').val()),
				dataType: 'json',
				beforeSend: function() { 
 
				} ,
				complete: function() { 
 
				} ,
				success: function(json) { 
					$('.tk_checkout_voucher .tk_success').remove();
							
					if(json['error']) { 
						$('.tk_checkout_voucher').prepend('<span class="tk_alert" >' + json['error'] + '</span>');
						$('.tk_all_spin').html('');
						$('#tk_checkout').css('opacity','1');
						$('#tk_checkout').css('pointer-events','auto');
					} 
							
					if(json['success']) { 
						$('.tk_checkout_voucher').prepend('<span class="tk_success" >' + json['success'] + '</span>');
						$('#tk_remove_voucher_box').html('<span class="tk_right tk_remove" id="tk_remove_voucher" ><i class="tk_icon-close"></i></span>');
						$('#tk_voucher').addClass('tk_remove_voucher_ok');

						getSchipingMethod();
			
					} 
				} ,
				error: function(xhr, ajaxOptions, thrownError) { 
					console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				} 
			}); 
		event.stopImmediatePropagation()
	});
	
//премахване на ваучера => извикваме отново методите за доставка и преизчислени тотали на количката
$(document).on('click', '#tk_remove_voucher', function(event) { 
		$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');
		$('#tk_checkout').css('opacity','0.6');
		$('#tk_checkout').css('pointer-events','none');
		$('.tk_checkout_voucher').html('');
		$.ajax( { 
				url: 'index.php?route=tk_checkout/checkout/remove_voucher',
				type: 'post',
				data: 'voucher=' + encodeURIComponent($('input[name=\'voucher\']').val()),
				dataType: 'json',
				beforeSend: function() { 
 
				} ,
				complete: function() { 
 
				} ,
				success: function(json) { 
					$('.tk_checkout_voucher .tk_success').remove();
					$('input[name=\'voucher\']').val('');
					$('#tk_remove_voucher_box').html('');
					$('#tk_voucher').removeClass('tk_remove_voucher_ok');

					if(json['success']) { 
						$('.tk_checkout_voucher').prepend('<span class="tk_success" >' + json['success'] + '</span>');

						getSchipingMethod();
				
					} 
				} ,
				error: function(xhr, ajaxOptions, thrownError) { 
					console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				} 
			}); 
		event.stopImmediatePropagation()
	});

//изпращаме данните за валидиране
$(document).delegate('#tk_button_confirm', 'click', function() { 
	
		$('.error_class').removeClass('error_class');

		var data = $('.tk_form input[type=\'text\'], .tk_form input[type=\'date\'], .tk_form input[type=\'datetime-local\'], .tk_form input[type=\'time\'], .tk_form input[type=\'password\'], .tk_form input[type=\'hidden\'], .tk_form input[type=\'checkbox\']:checked, .tk_form input[type=\'radio\']:checked, .tk_form textarea, .tk_form select').serialize();
		data += '&_shipping_method='+ $('.tk_form input[name=\'shipping_method\']:checked').prop('title') + '&_payment_method=' + $('.tk_form input[name=\'payment_method\']:checked').prop('title');
			
		var payment_method = $('.tk_form input[name=\'payment_method\']:checked').val();
			
		$.ajax( { 
				url: 'index.php?route=tk_checkout/checkout/validate_post',
				type: 'post',
				data: data,
				dataType: 'json',
				beforeSend: function() { 
					$('#tk_button_confirm').button('loading');
					$('.tk_all_spin').html(' <i class="tk_icon-spin rotating"></i>');
					$('#tk_checkout').css('opacity','0.6');
					$('#tk_checkout').css('pointer-events','none');
				} , 
				complete: function() { 
						
				} , 
				success: function(json) { 
					$('.tk_alert').remove();

					if (json['confirm']) { 
						//извикваме скрития бутон за платежния метод
						getPaymentTriger();
					
					} 
					else if (json['redirect']) { 
						location = json['redirect'];
					} 
					else if (json['error']) { 
						$('#tk_button_confirm').button('reset');
						$('.tk_all_spin').html('');
						$('#tk_checkout').css('opacity','1');
						$('#tk_checkout').css('pointer-events','auto');
							
						error = true;
							
						if (json['error']['warning']) { 
							$('#tk_button_confirm').before('<div class="tk_alert">' + json['error']['warning'] + '</div>');
						} else if(json['error']) { 
							$('#tk_error_box').after('<div class="tk_alert"> ' + json['error']['text_error'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
						} 
 
						for (i in json['error']) { 
							$('[name="' + i + '"]').after('<div class="tk_alert">' + json['error'][i] + '</div>');
							$('[name="' + i + '"]').addClass('error_class');
						} 
							
						setTimeout(function() {
								$("html, body").animate( { 
										scrollTop: $('.tk_alert').offset().top-40
									} , 'slow');
							} , 200);
					} else 
					{ 
						error = false;
						$('[name=\'payment_method\']:checked').click();
					} 
				} ,
				error: function(xhr, ajaxOptions, thrownError) { 
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				} 
			}); 
	});

