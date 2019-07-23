<?php
namespace pmofrontend;
class PobookingController extends \BaseController
{
    
    public function booking_po()
    {
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'booking-po';
        $data_msg['page_filter'] = 'all';
        //$account_id        = \Session::get('account_data');//get the account id of login user        
        $sql                           = "SELECT * FROM tbl_tran_booking, tbl_cfg_mast_transport_mode, tbl_cfg_mast_shipping_mode, tbl_mast_incoterm, tbl_cfg_workflow_status WHERE tbl_tran_booking.TRANSPORT_MODE_ID = tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID AND tbl_tran_booking.SHIPPING_MODE_ID = tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID AND tbl_tran_booking.INCOTERM_ID = tbl_mast_incoterm.INCOTERM_ID AND tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID AND tbl_cfg_workflow_status.MODULE_NAME='Booking'";
        $fetch_booked_data             = \DB::select($sql);
        $data_msg['fetch_booked_data'] = $fetch_booked_data;
        $count_booking_data=\DB::select("SELECT tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.booking_count,0) AS 
        BOOKING_COUNT FROM tbl_cfg_workflow_status LEFT JOIN 
        (SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_booking.BOOKING_ID) AS booking_count FROM tbl_tran_booking                         
        JOIN tbl_cfg_workflow_status ON tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID
        GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE
        ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'Booking' ORDER BY STATUS_SEQUENCE");
        $this->layout                  = \View::make('pomfrontend.booking', $data_msg,array('count_booking_data'=>$count_booking_data));
    }
    public function booking_po_post(){
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'booking-po';
        $data_msg['page_filter'] = $_POST['hid_po_status'];
        $status_post = $_POST['hid_po_status'];
        if($status_post == 'all'){
        $fetch_booked_data = \DB::select("SELECT * FROM tbl_tran_booking, tbl_cfg_mast_transport_mode, tbl_cfg_mast_shipping_mode, tbl_mast_incoterm, tbl_cfg_workflow_status WHERE tbl_tran_booking.TRANSPORT_MODE_ID = tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID AND tbl_tran_booking.SHIPPING_MODE_ID = tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID AND tbl_tran_booking.INCOTERM_ID = tbl_mast_incoterm.INCOTERM_ID AND tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID AND tbl_cfg_workflow_status.MODULE_NAME='Booking'");         
        $count_booking_data=\DB::select("SELECT tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.booking_count,0) AS 
        BOOKING_COUNT FROM tbl_cfg_workflow_status LEFT JOIN 
        (SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_booking.BOOKING_ID) AS booking_count FROM tbl_tran_booking                         
        JOIN tbl_cfg_workflow_status ON tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID
        GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE
        ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'Booking' ORDER BY STATUS_SEQUENCE");
        }else{
        $fetch_booked_data = \DB::select("SELECT * FROM tbl_tran_booking, tbl_cfg_mast_transport_mode, tbl_cfg_mast_shipping_mode, tbl_mast_incoterm, tbl_cfg_workflow_status WHERE tbl_tran_booking.TRANSPORT_MODE_ID = tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID AND tbl_tran_booking.SHIPPING_MODE_ID = tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID AND tbl_tran_booking.INCOTERM_ID = tbl_mast_incoterm.INCOTERM_ID AND tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID AND tbl_cfg_workflow_status.STATUS_NAME = '$status_post'");
        $count_booking_data=\DB::select("SELECT tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.booking_count,0) AS 
        BOOKING_COUNT FROM tbl_cfg_workflow_status LEFT JOIN 
        (SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_booking.BOOKING_ID) AS booking_count FROM tbl_tran_booking                         
        JOIN tbl_cfg_workflow_status ON tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID
        GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE
        ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'Booking' ORDER BY STATUS_SEQUENCE");
        }
        $this->layout = \View::make('pomfrontend.booking', $data_msg,array('count_booking_data'=>$count_booking_data,'fetch_booked_data'=>$fetch_booked_data));
    }
    public function origin_booking_view($id)
    {
        $data_msg                       = array();
        $data_msg['page_title']         = 'PMO Admin Panel | Log in';
        $data_msg['page_name']          = 'origin-booking-view';
        $booking_id                     = $id;
        $incoterm                       = \DB::table('tbl_mast_incoterm')->select('INCOTERM_ID', 'INCOTERM_NAME')->get();
        $shipping_mode                  = \DB::table('tbl_cfg_mast_shipping_mode')->select('*')->get();
        $transport_mode                 = \DB::table('tbl_cfg_mast_transport_mode')->select('*')->get();
        $fetch_booking_data             = \DB::select("SELECT * FROM tbl_tran_booking JOIN tbl_tran_booking_po_map ON tbl_tran_booking_po_map.BOOKING_ID =tbl_tran_booking.BOOKING_ID 
		JOIN tbl_mast_incoterm ON tbl_mast_incoterm.INCOTERM_ID = tbl_tran_booking.INCOTERM_ID 
		JOIN tbl_cfg_mast_transport_mode ON tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID = tbl_tran_booking.TRANSPORT_MODE_ID 
		JOIN tbl_cfg_mast_shipping_mode ON tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID=tbl_tran_booking.SHIPPING_MODE_ID  
		JOIN tbl_tran_purchase_order ON tbl_tran_purchase_order.PO_ID = tbl_tran_booking_po_map.PO_ID 
		JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
		JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
		JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
		JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_booking.STATUS_ID
		JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_booking.BOOKING_ID = $booking_id");
        $data_msg['fetch_booking_data'] = $fetch_booking_data;
        
        $this->layout = \View::make('pomfrontend.origin-booking-view', $data_msg);
    }
    
    public function create_booking()
    {
        $data_msg                = array();
        $data_msg['page_title']  = 'PMO Admin Panel | Log in';
        $data_msg['page_name']   = 'create-booking';
        $data_msg['page_filter'] = 'all';
        $mast_id                 = \Session::get('master_id');
        $user_account_type       = \Session::get('account_type');
        $user_account_type[0]->ACCOUNT_TYPE_ID;
        $shipper_names = \DB::table('tbl_mast_shipper')->select('SHIPPER_ID', 'SHIPPER_NAME')->get();
        $currency      = \DB::table('tb_mast_currency')->select('CURRENCY_ID', 'CURRENCY_NAME')->get();
        $consine       = \DB::table('table_mast_consine')->select('CONSINE_NAME', 'CONSINE_ID')->get();
        
        $usr_data       = \Session::get('user_data');
        $usr_account_id = $usr_data[0]->ACCOUNT_ID; //login user account id
        $account_id     = \Session::get('account_data');
        
        if ($user_account_type[0]->ACCOUNT_TYPE_ID == 3) {
            //checking for customer can't show booking link 
            return \Redirect::to('booking-po');
        }
        if ($user_account_type[0]->ACCOUNT_TYPE_ID == 2) {
            $fw_mast_id_post = $mast_id[0]->FWDR_ID;
            $po_overview     = \DB::select("SELECT *,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order 
		JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
		JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
		JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID  
		JOIN tbl_mast_customer_account_map ON tbl_mast_customer_account_map.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID
		JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID 
		WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_cfg_workflow_status.STATUS_ID = 3
			AND tbl_mast_customer_account_map.ACCOUNT_ID = $account_id 
			AND tbl_tran_purchase_order.FORWARDER_ID = $fw_mast_id_post");
        }
        $data_msg['po_overview']    = $po_overview;
        $data_msg['shipper_names']  = $shipper_names;
        $data_msg['consine']        = $consine;
        $data_msg['currency']       = $currency;
        $data_msg['usr_account_id'] = $usr_account_id;
        
        $this->layout = \View::make('pomfrontend.create-booking', $data_msg);
    }
    public function origin_booking_multi()
    {
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'create-booking';
        $selected_po            = \Input::get('selected_po');
        if (empty($selected_po)) {
            return \Redirect::to('create-booking')->with('success', 'Please select at least one PO.');
        }
        $selected_po             = implode(',', $selected_po);
        $data_msg['page_filter'] = 'all';
        $mast_id                 = \Session::get('master_id');
        $shipper_names           = \DB::table('tbl_mast_shipper')->select('SHIPPER_ID', 'SHIPPER_NAME')->get();
        $currency                = \DB::table('tb_mast_currency')->select('CURRENCY_ID', 'CURRENCY_NAME')->get();
        $consine                 = \DB::table('table_mast_consine')->select('CONSINE_NAME', 'CONSINE_ID')->get();
        $incoterm                = \DB::table('tbl_mast_incoterm')->select('INCOTERM_ID', 'INCOTERM_NAME')->get();
        $shipping_mode           = \DB::table('tbl_cfg_mast_shipping_mode')->select('*')->get();
        $transport_mode          = \DB::table('tbl_cfg_mast_transport_mode')->select('*')->get();
        $usr_data                = \Session::get('user_data');
        $usr_account_id          = $usr_data[0]->ACCOUNT_ID; //login user account id
        
        $account_id = \Session::get('account_data');
        $user_account_type = \Session::get('account_type');
        $user_account_type[0]->ACCOUNT_TYPE_ID;
        
        if ($user_account_type[0]->ACCOUNT_TYPE_ID == 2) {
            $fw_mast_id_post = $mast_id[0]->FWDR_ID;
            $po_overview     = \DB::select("SELECT *,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order 
		JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
		JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
		JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID  
		JOIN tbl_mast_customer_account_map ON tbl_mast_customer_account_map.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID
		JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID 
		WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 
			AND tbl_mast_customer_account_map.ACCOUNT_ID = $account_id 
			AND tbl_tran_purchase_order.FORWARDER_ID = $fw_mast_id_post
			AND tbl_tran_purchase_order.PO_ID IN($selected_po)");
            
        } elseif ($user_account_type[0]->ACCOUNT_TYPE_ID == 3) {
            $cust_mast_id_post = $mast_id[0]->CUSTOMER_ID;
            
            $po_overview = \DB::select("SELECT *,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order 
		JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
		JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
		JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID  
		JOIN  tbl_mast_forwarder_account_map ON tbl_mast_forwarder_account_map.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID
		JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID 
		WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 
		AND tbl_mast_forwarder_account_map.ACCOUNT_ID = $account_id  
		AND tbl_tran_purchase_order.CUSTOMER_ID = $cust_mast_id_post
		AND tbl_tran_purchase_order.PO_ID IN($selected_po)");
        }
        $data_msg['po_overview']    = $po_overview;
        $data_msg['shipper_names']  = $shipper_names;
        $data_msg['consine']        = $consine;
        $data_msg['currency']       = $currency;
        $data_msg['usr_account_id'] = $usr_account_id;
        $data_msg['incoterm']       = $incoterm;
        $data_msg['shipping_mode']  = $shipping_mode;
        $data_msg['transport_mode'] = $transport_mode;
        $data_msg['']               = $this->layout = \View::make('pomfrontend.origin-booking-multi', $data_msg);
    }
    public function origin_booking_multi_post()
    {
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'origin-booking-view';
        $usr_data         = \Session::get('user_data');
        if (isset($_POST['conf_booking'])) {
            $account_id     = $usr_data[0]->ACCOUNT_ID; //login user account id
            $selected_po    = \Input::get('selected_po');
            $transport_mode = \Input::get('transport_mode');
            $shipping_mode  = \Input::get('shipping_mode');
            $incoterm       = \Input::get('incoterm');
            $pickup_place   = \Input::get('pickup_place');
            $pol            = \Input::get('pol');
            $pod            = \Input::get('pod');
            $delibery_place = \Input::get('delibery_place');
            $booking_date   = \Input::get('booking_date');
            $res_date       = \Input::get('res_date');
            
            $insert_into_booking = \DB::table('tbl_tran_booking')->insert(array(
                'ACCOUNT_ID' => $account_id,
                'STATUS_ID' => '15',
                'TRANSPORT_MODE_ID' => $transport_mode,
                'SHIPPING_MODE_ID' => $shipping_mode,
                'INCOTERM_ID' => $incoterm,
                'BOOKING_PICK_UP_PLACE' => $pickup_place,
                'BOOKING_POL' => $pol,
                'BOOKING_POD' => $pod,
                'BOOKING_DELEVERY_PLACE' => $delibery_place,
                'BOOKING_REQUESTED_SIPPING_DATE' => $booking_date,
                'BOOKING_REQUESTED_DELIVERY_DATE' => $res_date
            ));
            $last_id             = \DB::table('tbl_tran_booking')->max('BOOKING_ID');
            foreach ($selected_po as $po) {
                $insert_into_po_map = \DB::table('tbl_tran_booking_po_map')->insert(array(
                    'BOOKING_ID' => $last_id,
                    'PO_ID' => $po
                ));
                $update_po_status   = \DB::table('tbl_tran_purchase_order')->where('PO_ID', '=', $po)->update(array(
                    'STATUS_ID' => 6
                ));//status id changed
            }
            
        }
        
        return \Redirect::to('booking-po')->with('success', 'PO BOOKED');
    }
    public function edit_booking($id)
    {
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO | Edit Booking';
        $data_msg['page_name']  = 'edit-booking';
        $booking_id             = $id;
        $incoterm               = \DB::table('tbl_mast_incoterm')->select('INCOTERM_ID', 'INCOTERM_NAME')->get();
        $shipping_mode          = \DB::table('tbl_cfg_mast_shipping_mode')->select('*')->get();
        $transport_mode         = \DB::table('tbl_cfg_mast_transport_mode')->select('*')->get();
        $fetch_booking_data     = \DB::select("SELECT * FROM tbl_tran_booking JOIN tbl_tran_booking_po_map ON tbl_tran_booking_po_map.BOOKING_ID =tbl_tran_booking.BOOKING_ID 
		JOIN tbl_mast_incoterm ON tbl_mast_incoterm.INCOTERM_ID = tbl_tran_booking.INCOTERM_ID 
		JOIN tbl_cfg_mast_transport_mode ON tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID = tbl_tran_booking.TRANSPORT_MODE_ID 
		JOIN tbl_cfg_mast_shipping_mode ON tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID=tbl_tran_booking.SHIPPING_MODE_ID  
		JOIN tbl_tran_purchase_order ON tbl_tran_purchase_order.PO_ID = tbl_tran_booking_po_map.PO_ID 
		JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
		JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
		JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
		JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
		WHERE tbl_tran_booking.BOOKING_ID = $id");
        return \View::make('pomfrontend.edit-booking', $data_msg, array(
            'fetch_booking_data' => $fetch_booking_data,
            'incoterm' => $incoterm,
            'shipping_mode' => $shipping_mode,
            'transport_mode' => $transport_mode
        ));
    }
    public function edit_booking_post($id)
    {
        
        if (isset($_POST['conf_booking'])) {

            //$get_all = \Input::all();
            $po_id   = \Input::get('selected_po'); //get the selected po id 
            $booking_id     = \Input::get('booking_id'); //get the booking id
            $transport_mode = \Input::get('transport_mode');
            $shipping_mode  = \Input::get('shipping_mode');
            $incoterm       = \Input::get('incoterm');
            $pickup_place   = \Input::get('pickup_place');
            $pol            = \Input::get('pol');
            $pod            = \Input::get('pod');
            $delibery_place = \Input::get('delibery_place');
            $booking_date   = \Input::get('booking_date');
            $res_date       = \Input::get('res_date');
            $update_booking = \DB::table('tbl_tran_booking')->where('BOOKING_ID', '=', $booking_id)->update(array(
                'TRANSPORT_MODE_ID' => $transport_mode,
                'SHIPPING_MODE_ID' => $shipping_mode,
                'INCOTERM_ID' => $incoterm,
                'BOOKING_PICK_UP_PLACE' => $pickup_place,
                'BOOKING_POL' => $pol,
                'BOOKING_POD' => $pod,
                'BOOKING_DELEVERY_PLACE' => $delibery_place,
                'BOOKING_REQUESTED_DELIVERY_DATE' => $res_date
            ));
            $delete_po_map=\DB::table('tbl_tran_booking_po_map')->where('BOOKING_ID','=',$booking_id)->delete();
            
            foreach ($po_id as $new_po_id) {
                $update_po_table_status=\DB::table('tbl_tran_purchase_order')->where('PO_ID','=',$new_po_id)->update(array('STATUS_ID'=>3));
                $insert_into_po_map=\DB::table('tbl_tran_booking_po_map')->insert(array('BOOKING_ID'=>$booking_id,'PO_ID'=>$new_po_id));
            }
            return \Redirect::to('booking-po')->with('success', 'Booking Updated');
        }
    }
    
    public function booking_list($booking_id=null)
    {
        
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'booking-list';
        $mast_id                = \Session::get('master_id');
        $user_account_type      = \Session::get('account_type');
        $user_account_type[0]->ACCOUNT_TYPE_ID;

        $selected_po_ids=\DB::table('tbl_tran_booking_po_map')->select('PO_ID')->where('BOOKING_ID','=',$booking_id)->get();
        //$selected_po_ids=implode(',',$selected_po_ids);
        
        
        $shipper_names = \DB::table('tbl_mast_shipper')->select('SHIPPER_ID', 'SHIPPER_NAME')->get();
        $currency      = \DB::table('tb_mast_currency')->select('CURRENCY_ID', 'CURRENCY_NAME')->get();
        $consine       = \DB::table('table_mast_consine')->select('CONSINE_NAME', 'CONSINE_ID')->get();
        $usr_data = \Session::get('user_data');
        $usr_account_id = $usr_data[0]->ACCOUNT_ID; //login user account id
        $account_id     = \Session::get('account_data');
        if ($user_account_type[0]->ACCOUNT_TYPE_ID == 3) {
            //checking for customer can't show booking link 
            return \Redirect::to('booking-po');
        }
        if ($user_account_type[0]->ACCOUNT_TYPE_ID == 2) {
            $fw_mast_id_post = $mast_id[0]->FWDR_ID;
            $po_overview     = \DB::select("SELECT *,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order 
        JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
        JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
        JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID  
        JOIN tbl_mast_customer_account_map ON tbl_mast_customer_account_map.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID
        JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID 
        WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_cfg_workflow_status.STATUS_ID = 3 OR tbl_cfg_workflow_status.STATUS_ID = 6
        AND tbl_mast_customer_account_map.ACCOUNT_ID = $account_id 
        AND tbl_tran_purchase_order.FORWARDER_ID = $fw_mast_id_post 
        GROUP BY tbl_tran_purchase_order.PO_ID");
            
        }
        $data_msg['po_overview']    = $po_overview;
        $data_msg['shipper_names']  = $shipper_names;
        $data_msg['consine']        = $consine;
        $data_msg['currency']       = $currency;
        $data_msg['usr_account_id'] = $usr_account_id;

        $this->layout = \View::make('pomfrontend.booking-list',$data_msg,array('booking_id' => $booking_id,'selected_po_ids'=>$selected_po_ids));
    }
    
    public function booking_list_post($booking_id)
    {
        if (isset($_POST['add_to_list'])) {
            $selected_po_id=\Input::all();
            $sel_po_id=$selected_po_id['selected_po'];
            $selected_po = implode(',',$sel_po_id);
        $po_overview = \DB::select("SELECT *,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order 
        JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
        JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
        JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID  
        JOIN  tbl_mast_forwarder_account_map ON tbl_mast_forwarder_account_map.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID
        JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID 
        WHERE tbl_tran_purchase_order.IS_ACTIVE = 1
        AND tbl_tran_purchase_order.PO_ID IN($selected_po) GROUP BY tbl_tran_purchase_order.PO_ID");
        //done function working MD --
        return \Redirect::to('edit-booking/'.$booking_id)->with('po_overview',$po_overview);
            
        }
    }
    public function conf_booking($id)
    {
        $conf_booking = \DB::table('tbl_tran_booking')->where('BOOKING_ID', '=', $id)->update(array(
        'STATUS_ID' => 16));

        $select_po_ids=\DB::table('tbl_tran_booking_po_map')->select('PO_ID')->where('BOOKING_ID', '=', $id)->get();
        foreach($select_po_ids as $po_id){
        $update_po_table = \DB::table('tbl_tran_purchase_order')->where('PO_ID', '=',$po_id->PO_ID)->update(array(
        'STATUS_ID' => 7));
        }
        return \Redirect::back()->with('success', 'Booking Confirmed');
    }
    public function delete_booking($id)//Function change 2_2_16
    {
        $select_po_ids =\DB::statement("UPDATE tbl_tran_purchase_order SET tbl_tran_purchase_order.STATUS_ID = 3 WHERE tbl_tran_purchase_order.PO_ID IN(SELECT tbl_tran_booking_po_map.PO_ID FROM tbl_tran_booking_po_map WHERE tbl_tran_booking_po_map.BOOKING_ID = '$id')");
        $delete_booking = \DB::table('tbl_tran_booking')->where('BOOKING_ID', '=', $id)->delete();
        $delete_po_map  = \DB::table('tbl_tran_booking_po_map')->where('BOOKING_ID', '=', $id)->delete();

        return \Redirect::back()->with('success', 'Booking Deleted');
    }
    public function shipment_status_updating($id){
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'booking-po';
        $booking_id                     = $id;
        $incoterm                       = \DB::table('tbl_mast_incoterm')->select('INCOTERM_ID', 'INCOTERM_NAME')->get();
        $shipping_mode                  = \DB::table('tbl_cfg_mast_shipping_mode')->select('*')->get();
        $transport_mode                 = \DB::table('tbl_cfg_mast_transport_mode')->select('*')->get();
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
        return \View::make('pomfrontend.shipment-status-updating',$data_msg);
    }
    public function shipment_status_updating_post($id){
        if(isset($_POST['update_shipment'])){
        $hide_booking_id=\Input::get('hide_booking_id');  
        $cargo_recive_date=\Input::get('cargo_recive_date');  
        //update booking table
        $update_booking_table=\DB::table('tbl_tran_booking')->where('BOOKING_ID','=',$hide_booking_id)
        ->update(array('BOOKING_CARGO_RECEIVE_DATE'=>$cargo_recive_date,'STATUS_ID'=>17));
        //select po ids from booking map table 
        $select_po_ids_from_booking=\DB::select("SELECT PO_ID FROM tbl_tran_booking_po_map WHERE BOOKING_ID = $hide_booking_id");
        //update purchase order table status 
        foreach ($select_po_ids_from_booking as $data_id) {
        $update_po_table_status_after_booking=\DB::table('tbl_tran_purchase_order')->where('PO_ID','=',$data_id->PO_ID)->update(array('STATUS_ID'=>9));    
        }
        return \Redirect::to('booking-po')->with('success','Booking scheduled.');       
        }
        
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
            
            $sql="SELECT * FROM tbl_tran_booking, tbl_cfg_mast_transport_mode, tbl_cfg_mast_shipping_mode, tbl_mast_incoterm, tbl_cfg_workflow_status WHERE tbl_tran_booking.TRANSPORT_MODE_ID = tbl_cfg_mast_transport_mode.TRANSPORT_MODE_ID AND tbl_tran_booking.SHIPPING_MODE_ID = tbl_cfg_mast_shipping_mode.SHIPPING_MODE_ID AND tbl_tran_booking.INCOTERM_ID = tbl_mast_incoterm.INCOTERM_ID AND tbl_tran_booking.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID AND tbl_cfg_workflow_status.MODULE_NAME='Booking' ";
          
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

            $fetch_booked_data= \DB::select($sql);

            $usr_data      = \Session::get('user_data');
            $usr_account_id = $usr_data[0]->ACCOUNT_ID; //login user account id
            
            return \View::make('pomfrontend.booking-search-data',array('fetch_booked_data'=>$fetch_booked_data,'usr_account_id'=>$usr_account_id));
            
        }
    }//function END 
    public function booking_confirmation_send($id){
        $login_user_data = \Session::get('user_data');
        $send_on              =  date('Y-m-d h:m:s');
        $account_id=$login_user_data[0]->ACCOUNT_ID;
        $select_role_id = \DB::select("SELECT wf_setting.ROLE_ID FROM wf_setting WHERE WF_FUNCTION = 'on_send_booking_approve' AND ACCOUNT_ID = $account_id");
        $check_current_entry_in_workflow=\DB::table('wf_booking_approval')->select('BOOKING_ID')->where('BOOKING_ID','=',$id)->get();
        
            if(!empty($check_current_entry_in_workflow[0]->BOOKING_ID)){
                foreach($select_role_id as $role_id){
                $update_workflow_table = \DB::table('wf_booking_approval')->insert(array(
                'BOOKING_ID' => $id,
                'TO_ROLE_ID' => $role_id->ROLE_ID,
                'FROM_USER_ID' => $login_user_data[0]->USER_ID,
                'APPROVAL_COMMENT' => '',
                'SEND_ON' => $send_on,
                'APPROVAL_STATUS'=>0));//change     
                }
            $update_booking_status = \DB::table('tbl_tran_booking')->where('BOOKING_ID', '=', $id)->update(array(
                'STATUS_ID' => 24
            ));
            }else{
                foreach($select_role_id as $role_id){
                $update_workflow_table = \DB::table('wf_booking_approval')->insert(array(
                'BOOKING_ID' => $id,
                'TO_ROLE_ID' => $role_id->ROLE_ID,
                'FROM_USER_ID' => $login_user_data[0]->USER_ID,
                'APPROVAL_COMMENT' => '',
                'SEND_ON' => $send_on,
                'APPROVAL_STATUS'=>0));
                }
               $update_booking_status = \DB::table('tbl_tran_booking')->where('BOOKING_ID', '=', $id)->update(array(
                'STATUS_ID' => 24
            ));     
            }
    return \Redirect::to('booking-po')->with('success','Booking Send For Approval');       
    }
    
    public function confirm_booking(){
      $get_booking_id   = \Input::get('booking_id');
      $get_booking_status    = \Input::get('booking_status');
      $get_comment      = \Input::get('comment');
      $usr_data         = \Session::get('user_data');
      $usr_id           = $usr_data[0]->USER_ID;
      $approve_time     = date('Y-m-d h:m:s');
     
        $insert_comment_workflow  = \DB::table('wf_booking_approval')
        ->where('BOOKING_ID','=',$get_booking_id)
        ->where('APPROVAL_STATUS','=',0)
        ->update(array(
            'APPROVED_BY' => $usr_id,
            'APPROVED_ON' => $approve_time,
            'APPROVAL_COMMENT' => $get_comment,
            'APPROVAL_STATUS' => $get_booking_status
        ));
        $update_booking_status = \DB::table('tbl_tran_booking')->where('BOOKING_ID', '=', $get_booking_id)->update(array(
            'STATUS_ID' => $get_booking_status));
            if($get_booking_status == '16'){
            $sql="UPDATE tbl_tran_purchase_order SET STATUS_ID = 7 WHERE PO_ID IN (SELECT PO_ID FROM tbl_tran_booking_po_map WHERE BOOKING_ID = $get_booking_id)";
            $update_po_status = \DB::statement($sql);
            }
        return \Redirect::back();
    }
    public function booking_cmt_show($id=null){

      $booking_comment=\DB::select("SELECT * FROM wf_booking_approval JOIN tbl_tran_booking ON tbl_tran_booking.BOOKING_ID = wf_booking_approval.BOOKING_ID WHERE tbl_tran_booking.BOOKING_ID = $id AND wf_booking_approval.APPROVAL_STATUS != 0 AND wf_booking_approval.APPROVAL_COMMENT !='' ORDER BY APPROVED_ON DESC");
      
        return \View::make('pomfrontend.booking-comment-page',array('booking_comment' =>$booking_comment));
    }
}
