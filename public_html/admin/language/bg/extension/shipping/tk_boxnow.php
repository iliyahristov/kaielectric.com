<?php
// Heading
$_['heading_title']    		= 'ТК - Доставка с BOX NOW';
$_['heading_title_report']	= 'Справка за доставки чрез BOX NOW';
$_['heading_help']			= 'За да използвате Модула за доставки на BOX NOW е нужно да се регистрирате <a target="_blank" href="https://boxnow.bg/e-shops">тук</a>, след което моля попълнете информацията, която получите - във формата по-долу.';

// Text
$_['text_extension']   = 'Разширения';
$_['text_success']     = 'Вие успешно редактирахте Модула за доставка на BOX NOW!';
$_['text_edit']        = 'Редактирайте Модул за доставка на BOX NOW';

// Entry
$_['entry_cost']       		= 'Стойност на доставката / колко ще заплати крайният клиент за доставка';
$_['entry_free_shipping']   = 'Сума над която доставката е безплатна';
$_['entry_tax_class']  		= 'Данъчен клас';
$_['entry_geo_zone']   		= 'Географска зона';
$_['entry_status']    		= 'Статус';
$_['entry_sort_order'] 		= 'Сортиране';
$_['entry_payment_modules'] = 'Използва се при определени методи за плащане';
$_['help_payment_modules'] 	= 'Някои методи за плащане, като <b>Наложен Платеж</b>, е невъзможно да бъдат комбинирани с Модула за доставки на BOX NOW';

$_['entry_api_url'] 			= 'API URL';
$_['entry_client_id'] 			= 'Client ID';
$_['entry_client_secret'] 		= 'Client Secret';
$_['entry_warehouse_number'] 	= 'Номер на склад';
$_['entry_partner_id']       	= 'ID на партньор';
$_['entry_no']       	= 'Не';
$_['entry_yes']       	= 'Да';

$_['text_status_boxnow']['new'] 					= 'Регистрирана в системата';
$_['text_status_boxnow']['delivered'] 				= 'Доставена на получател';
$_['text_status_boxnow']['expired-return']			= 'Времето за престой е свършило, ще бъде върната';
$_['text_status_boxnow']['returned'] 				= 'Върната на подателя';
$_['text_status_boxnow']['in-transit'] 				= 'Пътува за автомат';
$_['text_status_boxnow']['in-depot'] 				= 'Намира се в склад';
$_['text_status_boxnow']['in-final-destination']	= 'Намира се в Автомат - очаква вземане от клиент';
$_['text_status_boxnow']['canceled']				= 'Откзана от подател';
$_['text_status_boxnow']['wait-for-load']			= 'Намира се в Автомат - ще бъде върната към търговеца';

//REPORT
$_['column_box_now_status'] 			= 'Статус';
$_['column_order_status'] 				= 'Статус на поръчката';
$_['column_vouchers'] 					= 'Товарителници';
$_['column_info'] 						= 'Информация/Изтегли товарителница';
$_['column_locker_id'] 					= 'ID на BOX NOW автомат';
$_['column_total_products'] 			= 'Общ брой продукти';
$_['text_voucher_send_instructioms']	= 'Тип общ брой товарителници';
$_['text_voucher_success'] 				= 'Товарителница беше генерирана';
$_['text_voucher_notfound'] 			= 'Товарителница - не е намерена';
$_['text_voucher_pending'] 				= 'В изчакване';
$_['text_voucher_send'] 				= 'Създай товарителница';
$_['text_voucher_status_success'] 		= 'Успешно беше създадена товарителница';
$_['status_message_error'] 				= 'Не беше генерирана товарителница (Код на грешката: %s). Можете да направите справка с API документацията или да се свържете с нас на <a href="mailto:integrationsupport@boxnow.bg">integrationsupport@boxnow.bg</a>';

// Error
$_['error_permission'] = 'Нямате неободимите права, за да редактирате Mодула за доставки на BOX NOW!';
$_['error_firstname'] = 'Трябва да попълните име';
$_['error_lastname'] = 'Трябва да попълните фамилия';
$_['error_telephone'] = 'Трябва да попълните телефон';
$_['error_locker_id'] = 'Трябва да изберете автомат';
