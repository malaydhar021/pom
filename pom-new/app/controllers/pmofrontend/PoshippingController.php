<?php
namespace pmofrontend;
class PoshippingController extends \BaseController
{
public function show_shipments(){
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'shipments';
        $data_msg['page_filter'] = 'all';
        $shipping_data=\DB::select('SELECT * FROM tbl_tran_booking, tbl_cfg_mast_transport_mode, tbl_cfg_mast_shipping_mode, tbl_mast_incoterm, tbl_cfg_workflow_status WHERE tbl_tran_booking.TRANSPORT_MODE_ID = tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID AND tbl_tran_booking.SHIPPING_MODE_ID = tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID AND tbl_tran_booking.INCOTERM_ID = tbl_mast_incoterm.INCOTERM_ID AND tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID AND tbl_cfg_workflow_status.MODULE_NAME= "Shipping"');
        $data_msg['shipping_data'] = $shipping_data;
        
$count_shipping_data=\DB::select("SELECT tbl_cfg_workflow_status.STATUS_ID,tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.booking_count,0) AS 
BOOKING_COUNT FROM tbl_cfg_workflow_status LEFT JOIN 
(SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_booking.BOOKING_ID) AS booking_count FROM tbl_tran_booking                         
JOIN tbl_cfg_workflow_status ON tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID

GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE
ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'Shipping' ORDER BY STATUS_SEQUENCE");
$data_msg['count_shipping_data']=$count_shipping_data;

return \View::make('pomfrontend.shipments',$data_msg);

}
public function show_shipments_post(){
     $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'shipments';
        $data_msg['page_filter'] = $_POST['hid_po_status'];
        $status_post = $_POST['hid_po_status'];
            
        if($status_post=='all'){
            $shipping_data=\DB::select("SELECT * FROM tbl_tran_booking, tbl_cfg_mast_transport_mode, tbl_cfg_mast_shipping_mode, tbl_mast_incoterm, tbl_cfg_workflow_status WHERE tbl_tran_booking.TRANSPORT_MODE_ID = tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID AND tbl_tran_booking.SHIPPING_MODE_ID = tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID AND tbl_tran_booking.INCOTERM_ID = tbl_mast_incoterm.INCOTERM_ID AND tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID AND tbl_cfg_workflow_status.MODULE_NAME= 'Shipping'");
            $count_shipping_data=\DB::select("SELECT tbl_cfg_workflow_status.STATUS_ID,tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.booking_count,0) AS 
BOOKING_COUNT FROM tbl_cfg_workflow_status LEFT JOIN 
(SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_booking.BOOKING_ID) AS booking_count FROM tbl_tran_booking                         
JOIN tbl_cfg_workflow_status ON tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID
GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE
ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'Shipping' ORDER BY STATUS_SEQUENCE");

        }else{
            
        $shipping_data=\DB::select("SELECT * FROM tbl_tran_booking, tbl_cfg_mast_transport_mode, tbl_cfg_mast_shipping_mode, tbl_mast_incoterm, tbl_cfg_workflow_status WHERE tbl_tran_booking.TRANSPORT_MODE_ID = tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID AND tbl_tran_booking.SHIPPING_MODE_ID = tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID AND tbl_tran_booking.INCOTERM_ID = tbl_mast_incoterm.INCOTERM_ID AND tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID AND tbl_cfg_workflow_status.MODULE_NAME= 'Shipping' AND tbl_cfg_workflow_status.STATUS_ID=$status_post");
        
        $count_shipping_data=\DB::select("SELECT tbl_cfg_workflow_status.STATUS_ID,tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.booking_count,0) AS 
        BOOKING_COUNT FROM tbl_cfg_workflow_status LEFT JOIN 
        (SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_booking.BOOKING_ID) AS booking_count FROM tbl_tran_booking                         
        JOIN tbl_cfg_workflow_status ON tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID
        GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE
        ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'Shipping' ORDER BY STATUS_SEQUENCE");
            }
$data_msg['shipping_data'] = $shipping_data;
$data_msg['count_shipping_data']=$count_shipping_data;
return \View::make('pomfrontend.shipments',$data_msg);
}
public function recive_cargo($id){
		$data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'shipments';
        $booking_id                     = $id;
        $fetch_booking_data             = \DB::select("SELECT * FROM tbl_tran_booking JOIN tbl_tran_booking_po_map ON tbl_tran_booking_po_map.BOOKING_ID =tbl_tran_booking.BOOKING_ID 
        JOIN tbl_mast_incoterm ON tbl_mast_incoterm.INCOTERM_ID = tbl_tran_booking.INCOTERM_ID 
        JOIN tbl_cfg_mast_transport_mode ON tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID = tbl_tran_booking.TRANSPORT_MODE_ID 
        JOIN tbl_cfg_mast_shipping_mode ON tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID=tbl_tran_booking.SHIPPING_MODE_ID  
        JOIN tbl_tran_purchase_order ON tbl_tran_purchase_order.PO_ID = tbl_tran_booking_po_map.PO_ID 
        JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
        JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
        JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
        JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID
        JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_booking.BOOKING_ID = $booking_id");
        $data_msg['fetch_booking_data'] = $fetch_booking_data;
        return \View::make('pomfrontend.recive-cargo',$data_msg);
}
public function recive_cargo_post($id){
	if(isset($_POST['update_shipment'])){
        $hide_booking_id=\Input::get('hide_booking_id');  
        $cargo_recive_date=\Input::get('cargo_recive_date');  
        //update booking table
        $update_booking_table=\DB::table('tbl_tran_booking')->where('BOOKING_ID','=',$hide_booking_id)
        ->update(array('BOOKING_CARGO_RECEIVE_DATE'=>$cargo_recive_date,'STATUS_ID'=>18));
        //select po ids from booking map table 
        $select_po_ids_from_booking=\DB::select("SELECT PO_ID FROM tbl_tran_booking_po_map WHERE BOOKING_ID = $hide_booking_id");
        //update purchase order table status 
        foreach ($select_po_ids_from_booking as $data_id) {
        $update_po_table_status_after_booking=\DB::table('tbl_tran_purchase_order')->where('PO_ID','=',$data_id->PO_ID)->update(array('STATUS_ID'=>8));    
        }
        return \Redirect::to('shipments')->with('success','PO Received');       
        }
}
public function ship($id)
{
		$data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'shipments';
        $booking_id                     = $id;
        $fetch_booking_data             = \DB::select("SELECT * FROM tbl_tran_booking JOIN tbl_tran_booking_po_map ON tbl_tran_booking_po_map.BOOKING_ID =tbl_tran_booking.BOOKING_ID 
        JOIN tbl_mast_incoterm ON tbl_mast_incoterm.INCOTERM_ID = tbl_tran_booking.INCOTERM_ID 
        JOIN tbl_cfg_mast_transport_mode ON tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID = tbl_tran_booking.TRANSPORT_MODE_ID 
        JOIN tbl_cfg_mast_shipping_mode ON tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID=tbl_tran_booking.SHIPPING_MODE_ID  
        JOIN tbl_tran_purchase_order ON tbl_tran_purchase_order.PO_ID = tbl_tran_booking_po_map.PO_ID 
        JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
        JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
        JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
        JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID
        JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_booking.BOOKING_ID = $booking_id");
        $data_msg['fetch_booking_data'] = $fetch_booking_data;
        return \View::make('pomfrontend.ship',$data_msg);	
}
public function ship_post($id){
if(isset($_POST['update_shipment'])){
        $hide_booking_id=\Input::get('hide_booking_id');  
        $cargo_recive_date=\Input::get('cargo_recive_date');  
        $mbl=\Input::get('mbl');  
        $hbl=\Input::get('hbl');  
        $container=\Input::get('container');  
        $company=\Input::get('company');  
        $flight=\Input::get('flight');  
        $closeing_date=\Input::get('closeing_date');  
        $etd=\Input::get('etd');  
        $eta=\Input::get('eta');  
        $update_booking_table=\DB::table('tbl_tran_booking')->where('BOOKING_ID','=',$hide_booking_id)
        ->update(array('BOOKING_CARGO_RECEIVE_DATE'=>$cargo_recive_date,'BOOKING_MBL'=>$mbl,'BOOKING_HBL'=>
$hbl,'BOOKING_CONTAINER'=>$container,
            'BOOKING_COMPANY'=>$company,'BOOKING_FLIGHT'=>$flight,'BOOKING_CLOSING_DATE'=>$closeing_date,'BOOKING_ETD'=>
$etd,'BOOKING_ETA'=>$eta,'STATUS_ID'=>19));
        $select_po_ids_from_booking=\DB::select("SELECT PO_ID FROM tbl_tran_booking_po_map WHERE BOOKING_ID = 
$hide_booking_id");
        foreach ($select_po_ids_from_booking as $data_id) {
        $update_po_table_status_after_booking=\DB::table('tbl_tran_purchase_order')->where('PO_ID','=',$data_id->PO_ID)->update(array('STATUS_ID'=>10));
        }

        return \Redirect::to('shipments')->with('success','Booking shipped');
	}	
}
public function deliver($id){
	$data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'shipments';
        $booking_id                     = $id;
        $fetch_booking_data             = \DB::select("SELECT * FROM tbl_tran_booking JOIN tbl_tran_booking_po_map ON tbl_tran_booking_po_map.BOOKING_ID =tbl_tran_booking.BOOKING_ID 
        JOIN tbl_mast_incoterm ON tbl_mast_incoterm.INCOTERM_ID = tbl_tran_booking.INCOTERM_ID 
        JOIN tbl_cfg_mast_transport_mode ON tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID = tbl_tran_booking.TRANSPORT_MODE_ID 
        JOIN tbl_cfg_mast_shipping_mode ON tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID=tbl_tran_booking.SHIPPING_MODE_ID  
        JOIN tbl_tran_purchase_order ON tbl_tran_purchase_order.PO_ID = tbl_tran_booking_po_map.PO_ID 
        JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
        JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
        JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
        JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID
        JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_booking.BOOKING_ID = $booking_id");
        $data_msg['fetch_booking_data'] = $fetch_booking_data;
        return \View::make('pomfrontend.deliver',$data_msg);	
}
public function deliver_post($id)
{
	if(isset($_POST['update_shipment'])){
        $hide_booking_id=\Input::get('hide_booking_id');  
        $cargo_recive_date=\Input::get('cargo_recive_date');  
        $mbl=\Input::get('mbl');  
        $hbl=\Input::get('hbl');  
        $container=\Input::get('container');  
        $company=\Input::get('company');  
        $flight=\Input::get('flight');  
        $closeing_date=\Input::get('closeing_date');  
        $etd=\Input::get('etd');  
        $eta=\Input::get('eta');  
        $update_booking_table=\DB::table('tbl_tran_booking')->where('BOOKING_ID','=',$hide_booking_id)
        ->update(array('BOOKING_CARGO_RECEIVE_DATE'=>$cargo_recive_date,'BOOKING_MBL'=>$mbl,'BOOKING_HBL'=>

$hbl,'BOOKING_CONTAINER'=>$container,
            'BOOKING_COMPANY'=>$company,'BOOKING_FLIGHT'=>$flight,'BOOKING_CLOSING_DATE'=>$closeing_date,'BOOKING_ETD'=>

$etd,'BOOKING_ETA'=>$eta,'STATUS_ID'=>20));
        $select_po_ids_from_booking=\DB::select("SELECT PO_ID FROM tbl_tran_booking_po_map WHERE BOOKING_ID = 

$hide_booking_id");
     
        foreach ($select_po_ids_from_booking as $data_id) {
        $update_po_table_status_after_booking=\DB::table('tbl_tran_purchase_order')->where('PO_ID','=',$data_id->PO_ID)->update(array('STATUS_ID'=>11));
        }
        return \Redirect::to('shipments')->with('success','Consignment delivered at Air/Port');       
	}	
}
public function despatch_deliver($id){
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'shipments';
        $booking_id                     = $id;
        $fetch_booking_data             = \DB::select("SELECT * FROM tbl_tran_booking JOIN tbl_tran_booking_po_map ON tbl_tran_booking_po_map.BOOKING_ID =tbl_tran_booking.BOOKING_ID 
        JOIN tbl_mast_incoterm ON tbl_mast_incoterm.INCOTERM_ID = tbl_tran_booking.INCOTERM_ID 
        JOIN tbl_cfg_mast_transport_mode ON tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID = tbl_tran_booking.TRANSPORT_MODE_ID 
        JOIN tbl_cfg_mast_shipping_mode ON tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID=tbl_tran_booking.SHIPPING_MODE_ID  
        JOIN tbl_tran_purchase_order ON tbl_tran_purchase_order.PO_ID = tbl_tran_booking_po_map.PO_ID 
        JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
        JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
        JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
        JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID
        JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_booking.BOOKING_ID = $booking_id");
        $data_msg['fetch_booking_data'] = $fetch_booking_data;
        return \View::make('pomfrontend.despatch-deliver',$data_msg);    
}
public function despatch_deliver_post(){
    if(isset($_POST['despatch_shipment'])){
         $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'shipments';
         $booking_id  =\Input::get('hide_booking_id');  
          $fetch_booking_data             = \DB::select("SELECT * FROM tbl_tran_booking JOIN tbl_tran_booking_po_map ON tbl_tran_booking_po_map.BOOKING_ID =tbl_tran_booking.BOOKING_ID 
        JOIN tbl_mast_incoterm ON tbl_mast_incoterm.INCOTERM_ID = tbl_tran_booking.INCOTERM_ID 
        JOIN tbl_cfg_mast_transport_mode ON tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID = tbl_tran_booking.TRANSPORT_MODE_ID 
        JOIN tbl_cfg_mast_shipping_mode ON tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID=tbl_tran_booking.SHIPPING_MODE_ID  
        JOIN tbl_tran_purchase_order ON tbl_tran_purchase_order.PO_ID = tbl_tran_booking_po_map.PO_ID 
        JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
        JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
        JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
        JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID
        JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_booking.BOOKING_ID = $booking_id");
        $data_msg['fetch_booking_data'] = $fetch_booking_data;
        return \View::make('pomfrontend.despatch-shipment',$data_msg);
    }
    if(isset($_POST['close_shipment'])){
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'shipments';
        $booking_id  =\Input::get('hide_booking_id');  
        $fetch_booking_data             = \DB::select("SELECT * FROM tbl_tran_booking JOIN tbl_tran_booking_po_map ON tbl_tran_booking_po_map.BOOKING_ID =tbl_tran_booking.BOOKING_ID 
        JOIN tbl_mast_incoterm ON tbl_mast_incoterm.INCOTERM_ID = tbl_tran_booking.INCOTERM_ID 
        JOIN tbl_cfg_mast_transport_mode ON tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID = tbl_tran_booking.TRANSPORT_MODE_ID 
        JOIN tbl_cfg_mast_shipping_mode ON tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID=tbl_tran_booking.SHIPPING_MODE_ID  
        JOIN tbl_tran_purchase_order ON tbl_tran_purchase_order.PO_ID = tbl_tran_booking_po_map.PO_ID 
        JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
        JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
        JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
        JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID
        JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_booking.BOOKING_ID = $booking_id");
        $data_msg['fetch_booking_data'] = $fetch_booking_data;
        return \View::make('pomfrontend.close-shipment',$data_msg);
    }
}
public function close_shipments(){
    if(isset($_POST['close_shipment'])){
        $hide_booking_id=\Input::get('hide_booking_id');  
        $cargo_recive_date=\Input::get('cargo_recive_date');  
        $mbl=\Input::get('mbl');  
        $hbl=\Input::get('hbl');  
        $container=\Input::get('container');  
        $company=\Input::get('company');  
        $flight=\Input::get('flight');  
        $closeing_date=\Input::get('closeing_date');  
        $etd=\Input::get('etd');  
        $eta=\Input::get('eta');  
        $update_booking_table=\DB::table('tbl_tran_booking')->where('BOOKING_ID','=',$hide_booking_id)
        ->update(array('BOOKING_CARGO_RECEIVE_DATE'=>$cargo_recive_date,'BOOKING_MBL'=>$mbl,'BOOKING_HBL'=>
        $hbl,'BOOKING_CONTAINER'=>$container,'BOOKING_COMPANY'=>$company,'BOOKING_FLIGHT'=>$flight,'BOOKING_CLOSING_DATE'=>$closeing_date,'BOOKING_ETD'=>
        $etd,'BOOKING_ETA'=>$eta,'STATUS_ID'=>23));
        $select_po_ids_from_booking=\DB::select("SELECT PO_ID FROM tbl_tran_booking_po_map WHERE BOOKING_ID = 
        $hide_booking_id");
        foreach ($select_po_ids_from_booking as $data_id) {
        $update_po_table_status_after_booking=\DB::table('tbl_tran_purchase_order')->where('PO_ID','=',$data_id->PO_ID)->update(array('STATUS_ID'=>14));
        }   
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'shipments';
        $booking_id  =\Input::get('hide_booking_id');  
        $fetch_booking_data             = \DB::select("SELECT * FROM tbl_tran_booking JOIN tbl_tran_booking_po_map ON tbl_tran_booking_po_map.BOOKING_ID =tbl_tran_booking.BOOKING_ID 
        JOIN tbl_mast_incoterm ON tbl_mast_incoterm.INCOTERM_ID = tbl_tran_booking.INCOTERM_ID 
        JOIN tbl_cfg_mast_transport_mode ON tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID = tbl_tran_booking.TRANSPORT_MODE_ID 
        JOIN tbl_cfg_mast_shipping_mode ON tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID=tbl_tran_booking.SHIPPING_MODE_ID  
        JOIN tbl_tran_purchase_order ON tbl_tran_purchase_order.PO_ID = tbl_tran_booking_po_map.PO_ID 
        JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
        JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
        JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
        JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID
        JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_booking.BOOKING_ID = $booking_id");
        $data_msg['fetch_booking_data'] = $fetch_booking_data;
        return \View::make('pomfrontend.shipment-close',$data_msg)->with('success','PO CLOSED');
    }
}
public function despatch_shipment_post(){
    if(isset($_POST['despatch_shipment_go'])){

       $booking_id=\Input::get('hide_booking_id');
       $po_ids=\Input::get('po_ids');
       $appointment=\Input::get('appointment');
       $final_delivary_place=\Input::get('final_delivary_place');
       $fwdr_warehouse_departure_time=\Input::get('fwdr_warehouse_departure_time');
       $fwdr_warehouse_arrival_time=\Input::get('fwdr_warehouse_arrival_time');
       $fwdr_warehouse_place=\Input::get('fwdr_warehouse_place');
       $fwdr_warehouse=\Input::get('fwdr_warehouse');
       $insert_into_tbl_despatch=\DB::table('tbl_tran_despatch')->insert(array('BOOKING_ID'=>$booking_id,
       'FORWARDER_WAREHOUSE'=>$fwdr_warehouse,
       'FORWARDER_WAREHOUSE_PLACE'=>$fwdr_warehouse_place,
       'ARRIVAL_AT_FORWARDER_WAREHOUSE'=>$fwdr_warehouse_arrival_time,
       'DEPARTURE_FROM_FORWARDER_WAREHOUSE'=>$fwdr_warehouse_departure_time,
       'FINAL_DELIVARY_PLACE'=>$final_delivary_place,
       'APPOINTMENT'=>$appointment));
       $update_booking_table=\DB::table('tbl_tran_booking')
       ->where('BOOKING_ID','=',$booking_id)->update(array('STATUS_ID'=>21));
       //change 
       foreach($po_ids as $data_po_id){
        $update_po_status=\DB::table('tbl_tran_purchase_order')->where('PO_ID','=',$data_po_id)
        ->update(array('STATUS_ID'=>12));
        }
       return \Redirect::to('shipments')->with('success','Consignment despatched');
    }
}
public function update_despatch($id){
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'shipments';
        $booking_id                     = $id;
        $fetch_booking_data             = \DB::select("SELECT * FROM tbl_tran_booking JOIN tbl_tran_booking_po_map ON tbl_tran_booking_po_map.BOOKING_ID =tbl_tran_booking.BOOKING_ID 
        JOIN tbl_mast_incoterm ON tbl_mast_incoterm.INCOTERM_ID = tbl_tran_booking.INCOTERM_ID 
        JOIN tbl_cfg_mast_transport_mode ON tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID = tbl_tran_booking.TRANSPORT_MODE_ID 
        JOIN tbl_cfg_mast_shipping_mode ON tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID=tbl_tran_booking.SHIPPING_MODE_ID  
        JOIN tbl_tran_purchase_order ON tbl_tran_purchase_order.PO_ID = tbl_tran_booking_po_map.PO_ID 
        JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
        JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
        JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
        JOIN tbl_tran_despatch ON tbl_tran_despatch.BOOKING_ID = tbl_tran_booking.BOOKING_ID
        JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID
        JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_booking.BOOKING_ID = $booking_id");

        $data_msg['fetch_booking_data'] = $fetch_booking_data;
        return \View::make('pomfrontend.update-despatch',$data_msg);    

}
public function update_despatch_post(){
if(isset($_POST['despatch_shipment_update'])){
       $booking_id=\Input::get('hide_booking_id');
       $po_ids=\Input::get('po_ids');
       

       $appointment=\Input::get('appointment');
       $final_delivary_place=\Input::get('final_delivary_place');
       $fwdr_warehouse_departure_time=\Input::get('fwdr_warehouse_departure_time');
       $fwdr_warehouse_arrival_time=\Input::get('fwdr_warehouse_arrival_time');
       $fwdr_warehouse_place=\Input::get('fwdr_warehouse_place');
       $fwdr_warehouse=\Input::get('fwdr_warehouse');
       $appointment_date=\Input::get('appointment_date');
       $appointment_time=\Input::get('appointment_time');
       $final_delivary_date=\Input::get('final_delivary_date');
       $final_delivary_time=\Input::get('final_delivary_time');

       $update_tbl_despatch=\DB::table('tbl_tran_despatch')->where('BOOKING_ID','=',$booking_id)
       ->update(array(
       'FORWARDER_WAREHOUSE'=>$fwdr_warehouse,
       'FORWARDER_WAREHOUSE_PLACE'=>$fwdr_warehouse_place,
       'ARRIVAL_AT_FORWARDER_WAREHOUSE'=>$fwdr_warehouse_arrival_time,
       'DEPARTURE_FROM_FORWARDER_WAREHOUSE'=>$fwdr_warehouse_departure_time,
       'FINAL_DELIVARY_PLACE'=>$final_delivary_place,
       'APPOINTMENT'=>$appointment,'APPOINTMENT_DATE'=>$appointment_date,'APPOINTMENT_TIME'=>$appointment_time,
       'FINAL_DELIVARY_DATE'=>$final_delivary_date,'FINAL_DELIVARY_TIME'=>$final_delivary_time));
        $update_booking_table=\DB::table('tbl_tran_booking')
       ->where('BOOKING_ID','=',$booking_id)->update(array('STATUS_ID'=>22));
       foreach($po_ids as $data_po_id){
        $update_po_status=\DB::table('tbl_tran_purchase_order')->where('PO_ID','=',$data_po_id)
        ->update(array('STATUS_ID'=>13));
            }
       return \Redirect::to('shipments')->with('success','Consignment deliverd');
    }
}
public function view_deliverd($id){
     $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'shipments';
        $booking_id                     = $id;
        $acc_type = \Session::get('account_type'); //user account type get from the session 
        $account_type_id=$acc_type[0]->ACCOUNT_TYPE_ID;
        if($account_type_id == 3){

        $fetch_booking_data = \DB::select("SELECT * FROM tbl_tran_booking JOIN tbl_tran_booking_po_map ON tbl_tran_booking_po_map.BOOKING_ID =tbl_tran_booking.BOOKING_ID 
        JOIN tbl_mast_incoterm ON tbl_mast_incoterm.INCOTERM_ID = tbl_tran_booking.INCOTERM_ID 
        JOIN tbl_cfg_mast_transport_mode ON tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID = tbl_tran_booking.TRANSPORT_MODE_ID 
        JOIN tbl_cfg_mast_shipping_mode ON tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID=tbl_tran_booking.SHIPPING_MODE_ID  
        JOIN tbl_tran_purchase_order ON tbl_tran_purchase_order.PO_ID = tbl_tran_booking_po_map.PO_ID 
        JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
        JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
        JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
        JOIN tbl_tran_despatch ON tbl_tran_despatch.BOOKING_ID = tbl_tran_booking.BOOKING_ID
        JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID
        JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_booking.BOOKING_ID = $booking_id");    
        }else{
        $fetch_booking_data             = \DB::select("SELECT * FROM tbl_tran_booking JOIN tbl_tran_booking_po_map ON tbl_tran_booking_po_map.BOOKING_ID =tbl_tran_booking.BOOKING_ID 
        JOIN tbl_mast_incoterm ON tbl_mast_incoterm.INCOTERM_ID = tbl_tran_booking.INCOTERM_ID 
        JOIN tbl_cfg_mast_transport_mode ON tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID = tbl_tran_booking.TRANSPORT_MODE_ID 
        JOIN tbl_cfg_mast_shipping_mode ON tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID=tbl_tran_booking.SHIPPING_MODE_ID  
        JOIN tbl_tran_purchase_order ON tbl_tran_purchase_order.PO_ID = tbl_tran_booking_po_map.PO_ID 
        JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
        JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
        JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
        JOIN tbl_tran_despatch ON tbl_tran_despatch.BOOKING_ID = tbl_tran_booking.BOOKING_ID
        JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID
        JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_booking.BOOKING_ID = $booking_id");
        }
        $data_msg['fetch_booking_data'] = $fetch_booking_data;
        return \View::make('pomfrontend.deliverd',$data_msg);    
}

 //new function for search 
    public function table_search(){
        if(\Request::ajax())
        {
            $pick_up=\Input::get('pick_up');
            $pol=\Input::get('pol');
            $pod=\Input::get('pod');
            $delivery_place=\Input::get('delivery_place'); 
            $incoterm_origin=\Input::get('incoterm_origin');

            //working

           // $shipping_data=\DB::select('SELECT * FROM tbl_tran_booking, tbl_cfg_mast_transport_mode, tbl_cfg_mast_shipping_mode, tbl_mast_incoterm, tbl_cfg_workflow_status WHERE tbl_tran_booking.TRANSPORT_MODE_ID = tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID AND tbl_tran_booking.SHIPPING_MODE_ID = tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID AND tbl_tran_booking.INCOTERM_ID = tbl_mast_incoterm.INCOTERM_ID AND tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID AND tbl_cfg_workflow_status.MODULE_NAME= "Shipping"');

            $sql="SELECT * FROM tbl_tran_booking, tbl_cfg_mast_transport_mode, tbl_cfg_mast_shipping_mode, tbl_mast_incoterm, tbl_cfg_workflow_status WHERE tbl_tran_booking.TRANSPORT_MODE_ID = tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID AND tbl_tran_booking.SHIPPING_MODE_ID = tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID AND tbl_tran_booking.INCOTERM_ID = tbl_mast_incoterm.INCOTERM_ID AND tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID AND tbl_cfg_workflow_status.MODULE_NAME='Shipping' ";

           // $sql="SELECT * FROM tbl_tran_booking, tbl_cfg_mast_transport_mode, tbl_cfg_mast_shipping_mode, tbl_mast_incoterm, tbl_cfg_workflow_status WHERE tbl_tran_booking.TRANSPORT_MODE_ID = tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID AND tbl_tran_booking.SHIPPING_MODE_ID = tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID AND tbl_tran_booking.INCOTERM_ID = tbl_mast_incoterm.INCOTERM_ID AND tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID AND tbl_cfg_workflow_status.MODULE_NAME='Booking' ";
          
            if($pick_up!=" "){
             $sql.="AND BOOKING_PICK_UP_PLACE LIKE '%$pick_up%' ";   
            }
            if($pol!=" "){
             $sql.="AND BOOKING_POL LIKE '%$pol%' ";   
            }
            if($pod!=" "){
             $sql.="AND BOOKING_POD LIKE '%$pod%' ";   
            }
            if($delivery_place!=" "){
             $sql.="AND BOOKING_DELEVERY_PLACE LIKE '%$delivery_place%' ";   
            }
            if($incoterm_origin!=" "){
             $sql.="AND tbl_mast_incoterm.INCOTERM_NAME LIKE '%$incoterm_origin%' ";   
            }

            $shipping_data= \DB::select($sql);

            $usr_data      = \Session::get('user_data');
            $usr_account_id = $usr_data[0]->ACCOUNT_ID; //login user account id
            
            return \View::make('pomfrontend.shipments-table-search',array('shipping_data'=>$shipping_data,'usr_account_id'=>$usr_account_id));
            
        }
    }//function ENDS 

//working on this function
    
    public function shipping_undo($id){
        //echo $id;
        $select_booking_po_id =\DB::select("SELECT BOOKING_ID,PO_ID FROM tbl_tran_booking_po_map WHERE BOOKING_ID = $id"); 
        $check_booking_status =\DB::select("SELECT STATUS_ID FROM tbl_tran_booking WHERE BOOKING_ID = $id");
        //$str=array();
        foreach($select_booking_po_id as $po_id){     
        $str=$po_id->PO_ID.',';
        //echo substr($str,0, -1);
        //echo rtrim($po_id->PO_ID.',',",");
        //echo rtrim("$po_id->PO_ID,", ",");
        //echo implode(",",$str);
        //echo $po_id->PO_ID.',';
        //$string=$po_id->PO_ID.',';
       // echo '<br>';
       // echo $string;
        //echo rtrim($string, "/");
        echo '<br>';
        echo substr("a,b,c,d,e,", 0, -1);

        //$check_po_status=\DB::select("SELECT STATUS_ID FROM tbl_tran_purchase_order WHERE PO_ID IN($string)");
        }
        echo '<br>';
        echo substr("a,b,c,d,e,", 0, -1);
        //echo substr($string, 0, -1);
        //echo '<br>';
        //print_r($check_po_status);
        //echo '<br>';
        //print_r($check_booking_status);
        //echo '<br>';
        //print_r($select_booking_po_id);
        //echo '<br>';
        die();
    }

} // class end