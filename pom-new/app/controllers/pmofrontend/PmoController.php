<?php
namespace pmofrontend;
class PmoController extends \BaseController
{
    public function show_pom_dashboard()
    {
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'home';
        
        $usr_data       = \Session::get('user_data');
        $usr_account_id = $usr_data[0]->ACCOUNT_ID; //login user account id
        $user_id = $usr_data[0]->USER_ID;
        
        $show_awiting_list = \DB::select("SELECT tbl_tran_purchase_order.PO_ID,tbl_tran_purchase_order.PO_CREATION_DATE,tbl_tran_purchase_order.PO_NUMBER,tbl_mast_customer.CUSTOMER_NAME,tbl_mast_shipper.SHIPPER_NAME,tbl_cfg_workflow_status.STATUS_NAME,tbl_mast_forwarder.FWDR_NAME FROM tbl_tran_purchase_order JOIN wf_po_approval ON wf_po_approval.PO_ID = tbl_tran_purchase_order.PO_ID AND 
		wf_po_approval.TO_ACCOUNT_ID = $usr_account_id JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID WHERE wf_po_approval.APPROVAL_STATUS = 0");

        //$user_role_id =\DB::select("SELECT ROLE_ID FROM tbl_mast_user_role_map WHERE USER_ID = $usr_account_id");
        $show_booking_awiting_list=array();

        //if(!empty($user_role_id)){
          //  $role_id = $user_role_id[0]->ROLE_ID;
            

        $show_booking_awiting_list = \DB::select("SELECT * FROM tbl_tran_booking, tbl_cfg_mast_transport_mode, tbl_cfg_mast_shipping_mode, tbl_mast_incoterm, tbl_cfg_workflow_status,wf_booking_approval,tbl_mast_user_role_map,wf_setting
            WHERE tbl_tran_booking.TRANSPORT_MODE_ID = tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID 
            AND tbl_tran_booking.SHIPPING_MODE_ID = tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID 
            AND tbl_tran_booking.INCOTERM_ID = tbl_mast_incoterm.INCOTERM_ID 
            AND tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID
            AND wf_booking_approval.BOOKING_ID = tbl_tran_booking.BOOKING_ID
            AND wf_booking_approval.TO_ROLE_ID = wf_setting.ROLE_ID    
            AND wf_setting.ROLE_ID= tbl_mast_user_role_map.ROLE_ID 
            AND tbl_mast_user_role_map.USER_ID = $user_id
            AND wf_booking_approval.APPROVAL_STATUS = 0
            AND tbl_cfg_workflow_status.MODULE_NAME='Booking' GROUP BY tbl_tran_booking.BOOKING_ID");
        
        //}
        return \View::make('pomfrontend.dashboard', $data_msg, array('show_awiting_list' => $show_awiting_list,
        'show_booking_awiting_list'=>$show_booking_awiting_list));
        
    }
}
