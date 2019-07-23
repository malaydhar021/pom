<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Route For Admin 

Route::get('/',array('uses'=>'admin\\AdminController@showindex'));
//admin login MD --- 
Route::post('/',array('uses'=>'admin\\AdminLoginController@admin_login_check'));


Route::get('dashboard',array('as'=>'dashboard','uses'=>'admin\\AdminController@showdashboard'));
//Route::get('forwarder/{suspend?}',array('as'=>'forwarder','uses'=>'admin\\AdminController@showforwarder'));
Route::match(array('GET', 'POST'),'forwarder/{suspend?}',array('as'=>'forwarder','uses'=>'admin\\AdminController@showforwarder'));

//Route::post('forwarder/',array('as'=>'forwarder-post','uses'=>'admin\\AdminController@search'));

Route::get('suspend-forwarder/{s_id?}',array('as'=>'forwarder','uses'=>'admin\\AdminController@suspendForwoder'));
//forwarder functions
Route::get('view-forwarder/{id}',array('as'=>'view-forwarder','uses'=>'admin\\ForwarderController@viewforwarder'));
Route::get('edit-forwarder/{id}',array('as'=>'edit-forwarder','uses'=>'admin\\ForwarderController@editforwarder'));
Route::post('edit-forwarder/{id}',array('as'=>'edit-forwarder','uses'=>'admin\\ForwarderController@editforwarder_post'));
Route::get('new-forwarder',array('as'=>'new-forwarder','uses'=>'admin\\ForwarderController@shownew_forwarder'));
Route::post('new-forwarder-create',array('as'=>'new-forwarder-create','uses'=>'admin\\ForwarderController@save_forwarder'));
//forwarder functions end

//---------------Amit 1.21.16-------------------------------------------------------------

Route::match(array('GET', 'POST'),'customer/{suspend?}',array('as'=>'customer','uses'=>'admin\\AdminController@showcustomer'));
//customer functions
Route::get('edit-customer/{id}',array('as'=>'edit-customer','uses'=>'admin\\CustomerController@editcustomer'));
Route::post('edit-customer/{id}',array('as'=>'edit-customer','uses'=>'admin\\CustomerController@editcustomer_post'));
Route::get('customer-suspend/{id}',array('as'=>'customer-suspend','uses'=>'admin\\CustomerController@suspendcustomer'));
Route::get('view-customer/{id}',array('as'=>'view-customer','uses'=>'admin\\CustomerController@viewcustomer'));
Route::get('new-customer',array('as'=>'new-customer','uses'=>'admin\\CustomerController@shownew_customer'));
Route::post('customer-creater',array('as'=>'customer-creater','uses'=>'admin\\CustomerController@customercreater'));
Route::get('customer/delete/{id}',array('as'=>'customer/delete/{id}','uses'=>'admin\\CustomerController@suspendcustomer'));


//customer functions end
Route::match(array('GET', 'POST'),'qc-agent/{suspend?}',array('as'=>'qc-agent','uses'=>'admin\\AdminController@showqc_agent'));
Route::get('suspend-qc/{s_id?}',array('as'=>'qc-sus','uses'=>'admin\\AdminController@suspendQc'));
//Qc Agent functions
Route::get('view-qc-agent/{id}',array('as'=>'view-qc-agent','uses'=>'admin\\QcagentController@view_qc_agent'));
Route::get('edit-qc-agent/{id}',array('as'=>'edit-qc-agent','uses'=>'admin\\QcagentController@edit_qc_agent'));

Route::post('edit-qc-agent/{id}',array('as'=>'edit-qc-agent','uses'=>'admin\\QcagentController@edit_qc_agent_post'));



Route::get('new-qc-agent',array('as'=>'new-qc-agent','uses'=>'admin\\QcagentController@shownew_qc_agent'));
Route::post('new-qc-create',array('as'=>'new-qc-create','uses'=>'admin\\QcagentController@save_qcagent'));

//-------------------end 21.1.16
//Qc Agent functions Ends
Route::get('warehouse',array('as'=>'warehouse','uses'=>'admin\\AdminController@showwarehouse'));
//warehouse-list function 
Route::get('view-warehouse',array('as'=>'view-warehouse','uses'=>'admin\\WarehouseController@view_warehouse'));
Route::get('edit-warehouse',array('as'=>'edit-warehouse','uses'=>'admin\\WarehouseController@edit_warehouse'));
Route::get('new-warehouse',array('as'=>'new-warehouse','uses'=>'admin\\WarehouseController@shownew_warehouse'));

// amit 21.1.16---------------------------------------------------//
//warehouse-list function Ends
Route::match(array('GET', 'POST'),'supplier/{suspend?}',array('as'=>'supplier','uses'=>'admin\\AdminController@showsupplier'));

Route::get('suspend-supplier/{s_id?}',array('as'=>'supplier-sus','uses'=>'admin\\AdminController@suspendSupplier'));

//supplier function

Route::get('view-supplier/{id}',array('as'=>'view-supplier','uses'=>'admin\\SupplierController@view_supplier'));
Route::get('edit-supplier/{id}',array('as'=>'edit-supplier','uses'=>'admin\\SupplierController@edit_supplier'));
Route::post('edit-supplier/{id}',array('as'=>'edit-supplier','uses'=>'admin\\SupplierController@editsupplierPost'));
Route::get('new-supplier',array('as'=>'new-supplier','uses'=>'admin\\SupplierController@shownew_supplier'));
Route::post('new-supplier-create',array('as'=>'new-supplier-create','uses'=>'admin\\SupplierController@save_new_supplier'));

//supplier function  end

//-------end 21.1.16-----------------------------------------------//





Route::get('settings',array('as'=>'settings','uses'=>'admin\\AdminController@showsettings'));
//menu under settings
Route::get('holiday',array('as'=>'holiday','uses'=>'admin\\SettingsController@showholiday'));
Route::get('site-configuration',array('as'=>'site-configuration','uses'=>'admin\\SettingsController@showsite_configuration'));

Route::get('news',array('as'=>'news','uses'=>'admin\\AdminController@shownews'));
Route::get('ticket',array('as'=>'ticket','uses'=>'admin\\AdminController@showticket'));

//ROUTES FOR ADMIN PANEL ENDS 


//-----------ROUTES FOR PMO-FRONTEND ------------------ 

Route::get('confirm-po-upload-enter',array('as'=>'confirm-po-upload-enter','uses'=>'pmofrontend\\PoController@confirm_po_upload_enter'));
Route::post('confirm-po-upload-enter',array('as'=>'confirm-po-upload-enter','uses'=>'pmofrontend\\PoController@add_po'));
//enter-po-page populate by db data from customer table --------------- MD 
Route::get('enter-purchase-order',array('as'=>'enter-purchase-order','uses'=>'pmofrontend\\PoController@enter_purchase_order'));
Route::post('enter-purchase-order',array('as'=>'enter-purchase-order','uses'=>'pmofrontend\\PoController@add_po_show'));
//ROUTES FOR cofirm-po-upload page -------------- 
Route::get('confirm-po-upload',array('as'=>'confirm-po-upload','uses'=>'pmofrontend\\PoController@confirm_po_upload'));
Route::get('confirm-po-upload-edit',array('as'=>'confirm-po-upload-edit','uses'=>'pmofrontend\\PoController@confirm_po_upload_edit'));
Route::get('create-purchase-order',array('as'=>'create-purchase-order','uses'=>'pmofrontend\\PoController@create_purchase_order'));
Route::get('import-purchase-order',array('as'=>'import-purchase-order','uses'=>'pmofrontend\\PoController@import_purchase_order'));
Route::get('po-overview',array('as'=>'po-overview','uses'=>'pmofrontend\\PoController@po_overview'));
Route::post('po-overview',array('as'=>'po-overview','uses'=>'pmofrontend\\PoController@po_overview_post'));

//ROUTES FOR PMO LOGIN 
Route::get('index',array('as' =>'index','uses'=>'pmofrontend\\LoginController@show_index'));
//FORWARDER LOGIN
Route::get('forwarder-login',array('as'=>'forwarder-login','uses'=>'pmofrontend\\LoginController@show_forwarder_login'));
Route::post('forwarder-login',array('as'=>'forwarder-login','uses'=>'pmofrontend\\LoginController@forwarder_login_check'));
//CUSTOMER LOGIN
Route::get('customer-login',array('as'=>'customer-login','uses'=>'pmofrontend\\LoginController@show_customer_login'));
Route::post('customer-login',array('as'=>'customer-login','uses'=>'pmofrontend\\LoginController@customer_login_check'));
//SUPPLIER LOGIN 
Route::get('supplier-login',array('as'=>'supplier-login','uses'=>'pmofrontend\\LoginController@show_supplier_login'));
Route::post('supplier-login',array('as'=>'supplier-login','uses'=>'pmofrontend\\LoginController@supplier_login_check'));
//QC AGENT LOGIN 
Route::get('qc-login',array('as'=>'qc-login','uses'=>'pmofrontend\\LoginController@show_qc_login'));
Route::post('qc-login',array('as'=>'qc-login','uses'=>'pmofrontend\\LoginController@qc_login_check'));
//USER DASHBOARD
Route::get('pom-dashboard',array('as'=>'pom-dashboard','uses'=>'pmofrontend\\PmoController@show_pom_dashboard'));
//PO Confirm send 
Route::get('po-conf-send/{id}',array('as'=>'po-conf-send','uses'=>'pmofrontend\\PoController@po_confirmation_send'));
Route::post('dashboard-conf-send',array('as'=>'dashboard-conf-send','uses'=>'pmofrontend\\PoController@confirm_po'));
Route::post('po-overview-del',array('as'=>'po-overview-del','uses'=>'pmofrontend\\PoController@del_po_overview'));
//---------PO ROUTS ENDS MD 

//BOOKING ROUTES
// booking po management

Route::get('booking-po',array('as'=>'booking','uses'=>'pmofrontend\\PobookingController@booking_po'));
Route::get('create-booking',array('as'=>'create-booking','uses'=>'pmofrontend\\PobookingController@create_booking'));
Route::any('origin-booking-multi',array('as'=>'origin-booking-multi','uses'=>'pmofrontend\\PobookingController@origin_booking_multi'));
//view booking
Route::any('view-booking/{id}',array('as'=>'view-booking','uses'=>'pmofrontend\\PobookingController@origin_booking_view'));

Route::post('origin_booking_multi',array('as'=>'origin_booking_multi','uses'=>'pmofrontend\\PobookingController@origin_booking_multi_post'));
//new route for po booking ---MD --20-1-16
Route::get('edit-booking/{id}',array('as'=>'edit-booking','uses'=>'pmofrontend\\PobookingController@edit_booking'));
Route::post('edit-booking/{id}',array('as'=>'edit-booking','uses'=>'pmofrontend\\PobookingController@edit_booking_post'));
//new route --- MD for list of avalible po 22--1--16 MD--- 
Route::get('booking-list/{booking_id}',array('as'=>'booking-list','uses'=>'pmofrontend\\PobookingController@booking_list'));
Route::post('booking-list/{booking_id}',array('as'=>'booking-list','uses'=>'pmofrontend\\PobookingController@booking_list_post'));
//confirm booking -- MD --21-6-16
Route::get('conf-booking/{id}',array('as'=>'conf-booking','uses'=>'pmofrontend\\PobookingController@conf_booking'));
Route::get('delete-booking/{id}',array('as'=>'delete-booking','uses'=>'pmofrontend\\PobookingController@delete_booking'));
//booking PO POST ----23---1--16

Route::post('booking-po',array('as'=>'booking','uses'=>'pmofrontend\\PobookingController@booking_po_post'));


//ROUTE START FOR SHIPPING  -----24_1_16
Route::get('shipment-status-updating/{id}',array('as'=>'shipment-status-updating','uses'=>'pmofrontend\\PobookingController@shipment_status_updating'));
Route::post('shipment-status-updating/{id}',array('as'=>'shipment-status-updating','uses'=>'pmofrontend\\PobookingController@shipment_status_updating_post'));

Route::get('shipments',array('as'=>'shipments','uses'=>'pmofrontend\\PoshippingController@show_shipments'));
Route::post('shipments',array('as'=>'shipments','uses'=>'pmofrontend\\PoshippingController@show_shipments_post'));

Route::get('recive-cargo/{id}',array('as'=>'recive-cargo','uses'=>'pmofrontend\\PoshippingController@recive_cargo'));
Route::post('recive-cargo/{id}',array('as'=>'recive-cargo','uses'=>'pmofrontend\\PoshippingController@recive_cargo_post'));
Route::get('ship/{id}',array('as'=>'ship','uses'=>'pmofrontend\\PoshippingController@ship'));
Route::post('ship/{id}',array('as'=>'ship','uses'=>'pmofrontend\\PoshippingController@ship_post'));
Route::get('deliver/{id}',array('as'=>'deliver','uses'=>'pmofrontend\\PoshippingController@deliver'));
Route::post('deliver/{id}',array('as'=>'deliver','uses'=>'pmofrontend\\PoshippingController@deliver_post'));
Route::get('despatch-deliver/{id}',array('as'=>'despatch-deliver','uses'=>'pmofrontend\\PoshippingController@despatch_deliver'));
Route::post('despatch-deliver/{id}',array('as'=>'despatch-deliver','uses'=>'pmofrontend\\PoshippingController@despatch_deliver_post'));
Route::post('shipments-close',array('as'=>'shipments-close','uses'=>'pmofrontend\\PoshippingController@close_shipments'));
//Route for despatch shipment 25/1/16
Route::post('despatch-shipment',array('as'=>'despatch-shipment','uses'=>'pmofrontend\\PoshippingController@despatch_shipment_post'));
Route::get('update-despatch/{id}',array('as'=>'update-despatch','uses'=>'pmofrontend\\PoshippingController@update_despatch'));
Route::post('update-despatch',array('as'=>'update-despatch','uses'=>'pmofrontend\\PoshippingController@update_despatch_post'));
Route::get('deliverd/{id}',array('as'=>'deliverd','uses'=>'pmofrontend\\PoshippingController@view_deliverd'));

//New Route 26/1/16 ----MD ---- 
Route::any('data-search',array('as'=>'data-search','uses'=>'pmofrontend\\PoController@table_search'));
Route::get('table-search',array('as'=>'table-search','uses'=>'pmofrontend\\PoController@table_search'));

//New Route 28/1/16 ----------- MD ------- 

Route::any('booking-data-search',array('as'=>'booking-data-search','uses'=>'pmofrontend\\PobookingController@table_search'));
Route::get('booking-table-search',array('as'=>'booking-table-search','uses'=>'pmofrontend\\PobookingController@table_search'));
//shipments search 
Route::any('shipments-data-search',array('as'=>'shipments-data-search','uses'=>'pmofrontend\\PoshippingController@table_search'));
Route::get('shipments-table-search',array('as'=>'shipments-table-search','uses'=>'pmofrontend\\PoshippingController@table_search'));


