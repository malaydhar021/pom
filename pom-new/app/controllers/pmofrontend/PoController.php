<?php
namespace pmofrontend;
class PoController extends \BaseController
{
    public function add_po_show()
    {
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'po-overview';
        if (isset($_POST['submit_company_name'])) {
            $acc_type = \Session::get('account_type'); //user account type get from the session 
            if ($acc_type[0]->ACCOUNT_TYPE_ID == 2) {
                //FOR FORWARDER USER TYPE 
                \Session::forget('po_last_id');
                if (\Session::has('po_last_id')) {
                    $check_current_entry = \Session::get('po_last_id');
                    $s                   = substr($check_current_entry, 0, -1);
                    $check_current_entry = explode(',', $s); //check current ENTRY OF THE CUSTOMER 
                    
                    $customer_id         = \Input::get('customer_id'); //form the submit  form get customer id 
                    $cust_id_seasson     = \Session::put('key', $customer_id); //PUT custmor id from session 
                    $get_customer_name   = \DB::table('tbl_mast_customer')->select('CUSTOMER_NAME', 'ACCOUNT_ID')->where('CUSTOMER_ID', '=', $cust_id_seasson)->first();
                    $customer_name       = $get_customer_name->CUSTOMER_NAME;
                    $customer_account_id = $get_customer_name->ACCOUNT_ID;
                    
                    $show_po       = \DB::select('CALL PRC_SHOW_PURCHASE_ORDER(?)', $check_current_entry);
                    $shipper_names = \DB::table('tbl_mast_shipper')->select('SHIPPER_ID', 'SHIPPER_NAME')->get();
                    $currency      = \DB::table('tb_mast_currency')->select('CURRENCY_ID', 'CURRENCY_NAME')->get();
                    $consine       = \DB::table('table_mast_consine')->select('CONSINE_NAME', 'CONSINE_ID')->get();
                    $this->layout  = \View::make('pomfrontend.confirm-po-upload-enter', $data_msg, array(
                        'shipper_names' => $shipper_names,
                        'currency' => $currency,
                        'consine' => $consine,
                        'show_po' => $show_po,
                        'customer_name' => $customer_name,
                        'customer_id' => $customer_id,
                        'customer_account_id' => $customer_account_id
                    ));
                } //session if endS 
                else {
                    $customer_id     = \Input::get('customer_id'); //Form The submit from get the customer ID 
                    $show_po         = '';
                    $cust_id_seasson = \Session::put('key', $customer_id); //PUT the Login customer id in the session 
                    
                    $get_customer_name   = \DB::table('tbl_mast_customer')->select('CUSTOMER_NAME', 'ACCOUNT_ID')->where('CUSTOMER_ID', '=', $customer_id)->first();
                    $customer_name       = $get_customer_name->CUSTOMER_NAME; //customer Names  FROM THE CUST MASTER TABLE 
                    $customer_account_id = $get_customer_name->ACCOUNT_ID; //CUSTOMER ACCOUNT ID FROM THE CUST MASTER TABLE
                    
                    $shipper_names = \DB::table('tbl_mast_shipper')->select('SHIPPER_ID', 'SHIPPER_NAME')->get();
                    $currency      = \DB::table('tb_mast_currency')->select('CURRENCY_ID', 'CURRENCY_NAME')->get();
                    $consine       = \DB::table('table_mast_consine')->select('CONSINE_NAME', 'CONSINE_ID')->get();
                    
                    $this->layout = \View::make('pomfrontend.confirm-po-upload-enter', $data_msg, array(
                        'shipper_names' => $shipper_names,
                        'currency' => $currency,
                        'consine' => $consine,
                        'show_po' => $show_po,
                        'customer_name' => $customer_name,
                        'customer_id' => $customer_id,
                        'customer_account_id' => $customer_account_id
                    ));
                } //ELSE ENDS 
            } // account type if ends 
            elseif ($acc_type[0]->ACCOUNT_TYPE_ID == 3) {
                //FOR CUSTOMER  USER TYPE 
                \Session::forget('po_last_id');
                if (\Session::has('po_last_id')) {
                    $fw_id_session = \Session::get('user_data'); //forwarder id 		
                    
                    
                    $check_current_entry = \Session::get('po_last_id');
                    $s                   = substr($check_current_entry, 0, -1);
                    $check_current_entry = explode(',', $s);
                    
                    $fwdr_id              = \Input::get('forwarder_id'); //forom the form get the forwarder id 
                    $fw_id_session        = \Session::put('fw_id', $forwarder_id);
                    $get_forwarder_name   = \DB::table('tbl_mast_forwarder')->select('FWDR_NAME', 'ACCOUNT_ID')->where('FWDR_ID', '=', $fwdr_id)->first();
                    $forwarder_name       = $get_forwarder_name->FWDR_NAME; //forwarder name
                    $forwarder_account_id = $get_forwarder_name->ACCOUNT_ID; //forwarder account id 
                    $show_po              = \DB::select('CALL PRC_SHOW_PURCHASE_ORDER(?)', $check_current_entry);
                    $shipper_names        = \DB::table('tbl_mast_shipper')->select('SHIPPER_ID', 'SHIPPER_NAME')->get();
                    $currency             = \DB::table('tb_mast_currency')->select('CURRENCY_ID', 'CURRENCY_NAME')->get();
                    $consine              = \DB::table('table_mast_consine')->select('CONSINE_NAME', 'CONSINE_ID')->get();
                    $this->layout         = \View::make('pomfrontend.confirm-po-upload-enter', $data_msg, array(
                        'forwarder_name' => $forwarder_name,
                        'forwarder_account_id' => $forwarder_account_id,
                        'show_po' => $show_po,
                        'shipper_names' => $shipper_names,
                        'currency' => $currency,
                        'consine' => $consine
                    ));
                    
                } //if ends 
                else {
                    //$customer_id=\Input::get('customer_id'); //Form The submit from get the customer ID 
                    $show_po              = '';
                    $forwarder_id         = \Input::get('forwarder_id');
                    $fw_id_session        = \Session::put('fw_id', $forwarder_id);
                    $get_forwarder_name   = \DB::table('tbl_mast_forwarder')->select('FWDR_NAME', 'ACCOUNT_ID')->where('FWDR_ID', '=', $forwarder_id)->get();
                    $forwarder_name       = $get_forwarder_name[0]->FWDR_NAME; //forwarder name
                    $forwarder_account_id = $get_forwarder_name[0]->ACCOUNT_ID; //forwarder account id 
                    $shipper_names        = \DB::table('tbl_mast_shipper')->select('SHIPPER_ID', 'SHIPPER_NAME')->get();
                    $currency             = \DB::table('tb_mast_currency')->select('CURRENCY_ID', 'CURRENCY_NAME')->get();
                    $consine              = \DB::table('table_mast_consine')->select('CONSINE_NAME', 'CONSINE_ID')->get();
                    $this->layout         = \View::make('pomfrontend.confirm-po-upload-enter', $data_msg, array(
                        'shipper_names' => $shipper_names,
                        'currency' => $currency,
                        'consine' => $consine,
                        'show_po' => $show_po,
                        'forwarder_name' => $forwarder_name,
                        'forwarder_account_id' => $forwarder_account_id,
                        'forwarder_id' => $forwarder_id
                    ));
                } //else ends
                
            } //else if ends 
        } //isset ends
    } //function ends 
    
    
    public function confirm_po_upload_enter()
    {
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'po-overview';
        $acc_type               = \Session::get('account_type');
        $acc_type[0]->ACCOUNT_TYPE_ID; //check the user type 
        if ($acc_type[0]->ACCOUNT_TYPE_ID == 2) //FORWARDER USER 
            {
            if (\Session::has('po_last_id')) {
                if ($cust_session = \Session::has('key')) {
                    $check_current_entry = \Session::get('po_last_id');
                    $s                   = substr($check_current_entry, 0, -1);
                    $check_current_entry = explode(',', $s);
                    $forwarder_id        = \Input::get('forwarder_id');
                    
                    
                    $fw_id_session       = \Session::get('fw_id', $forwarder_id); //forwarder id from seassion
                    $customer_id         = \Session::get('key');
                    $get_customer_name   = \DB::table('tbl_mast_customer')->select('CUSTOMER_NAME', 'ACCOUNT_ID')->where('CUSTOMER_ID', '=', $customer_id)->get();
                    $customer_name       = $get_customer_name[0]->CUSTOMER_NAME;
                    $customer_account_id = $get_customer_name[0]->ACCOUNT_ID;
                    $show_po             = \DB::select("SELECT * FROM tbl_tran_purchase_order JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_tran_purchase_order.PO_ID IN($s)");
                    $shipper_names       = \DB::table('tbl_mast_shipper')->select('SHIPPER_ID', 'SHIPPER_NAME')->get();
                    $currency            = \DB::table('tb_mast_currency')->select('CURRENCY_ID', 'CURRENCY_NAME')->get();
                    $consine             = \DB::table('table_mast_consine')->select('CONSINE_NAME', 'CONSINE_ID')->get();
                    $this->layout        = \View::make('pomfrontend.confirm-po-upload-enter', $data_msg, array(
                        'show_po' => $show_po,
                        'customer_name' => $customer_name,
                        'customer_id' => $customer_id,
                        'shipper_names' => $shipper_names,
                        'currency' => $currency,
                        'consine' => $consine,
                        'customer_account_id' => $customer_account_id
                    ));
                } //CUST SESSION CHECK 
            } //SESSION END CHECK 
        } //IF ENDS 
        elseif ($acc_type[0]->ACCOUNT_TYPE_ID == 3) {
            if (\Session::has('po_last_id')) {
                
                if ($cust_session = \Session::has('fw_id')) {
                    
                    $check_current_entry = \Session::get('po_last_id');
                    $s                   = substr($check_current_entry, 0, -1);
                    $check_current_entry = explode(',', $s);
                    $forwarder_id        = \Session::get('fw_id'); //get forwarder id from the session 
                    //$forwarder_id=\Input::get('forwarder_id');
                    $get_forwarder_name  = \DB::table('tbl_mast_forwarder')->select('FWDR_NAME', 'ACCOUNT_ID')->where('FWDR_ID', '=', $forwarder_id)->get();
                    
                    $forwarder_name       = $get_forwarder_name[0]->FWDR_NAME; //forwarder name
                    $forwarder_account_id = $get_forwarder_name[0]->ACCOUNT_ID; //forwarder account id 
                    
                    $show_po       = \DB::select("SELECT * FROM tbl_tran_purchase_order JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_tran_purchase_order.PO_ID IN($s)");
                    $shipper_names = \DB::table('tbl_mast_shipper')->select('SHIPPER_ID', 'SHIPPER_NAME')->get();
                    $currency      = \DB::table('tb_mast_currency')->select('CURRENCY_ID', 'CURRENCY_NAME')->get();
                    $consine       = \DB::table('table_mast_consine')->select('CONSINE_NAME', 'CONSINE_ID')->get();
                    $this->layout  = \View::make('pomfrontend.confirm-po-upload-enter', $data_msg, array(
                        'show_po' => $show_po,
                        'forwarder_id' => $forwarder_id,
                        'forwarder_name' => $forwarder_name,
                        'shipper_names' => $shipper_names,
                        'currency' => $currency,
                        'consine' => $consine,
                        'forwarder_account_id' => $forwarder_account_id
                    ));
                } // FORWARDER SESSION CHECK 
            } //SESSION ENDS 
        } //else END 
    } //FUNCTION ENDS 
    public function add_po()
    {
        if (isset($_POST['add_po_info'])) {
            $fw_mast_id = \Session::get('master_id');
            
            
            $fetch_status_id_po_creation = \DB::table('tbl_cfg_workflow_status')->select('STATUS_ID')->where('APPLICABLE_TO', '=', 'on_po_insert')->first();
            $status_id                   = $fetch_status_id_po_creation->STATUS_ID;
            $cust_post_id                = \Input::get('customer_id'); //get customer ID FROM THE SUBMIT FORM 
            $forwarder_id                = \Input::get('forwarder_id'); //get FORWARDER ID FROM THE SUBMIT FORM 
            $shipper_id                  = \Input::get('shipper_name');
            $po_creation_date            = \Input::get('po_creation_date');
            $po_date                     = \Input::get('po_date');
            $po_product_pn               = \Input::get('product_pn');
            $po_product_name             = \Input::get('product_name');
            $po_product_type             = \Input::get('product_type');
            $po_product_qty              = \Input::get('product_qty');
            $po_product_value            = \Input::get('product_value');
            $po_currency                 = \Input::get('currency_type');
            $po_gross_weight             = \Input::get('gross_wt');
            $po_cbm_volume               = \Input::get('volume_cbm');
            $po_packing_type_one         = \Input::get('packing_type_one');
            $po_packing_type_two         = \Input::get('packing_type_two');
            $po_nbr_one                  = \Input::get('nbr_one');
            $po_nbr_two                  = \Input::get('nbr_two');
            $po_num                      = \Input::get('po_n');
            $consine_id                  = \Input::get('consine_id');
            $usr_data                    = \Session::get('user_data');
            $account_id                  = $usr_data[0]->ACCOUNT_ID; //login user account id
            $acc_type                    = \Session::get('account_type'); //user account type get from the session 
            if ($acc_type[0]->ACCOUNT_TYPE_ID == 2) //FOR FORWARDER ADD 
                {
                $fw_id          = $fw_mast_id[0]->FWDR_ID;
                $insert_po      = \DB::table('tbl_tran_purchase_order')->insert(array(
                    'FORWARDER_ID' => $fw_id,
                    'CUSTOMER_ID' => $cust_post_id,
                    'SHIPPER_ID' => $shipper_id,
                    'ACCOUNT_ID' => $account_id,
                    'STATUS_ID' => $status_id,
                    'CONSINE_ID' => $consine_id,
                    'PO_CREATION_DATE' => $po_creation_date,
                    'PO_DATE' => $po_date,
                    'PO_PRODUCT_PN' => $po_product_pn,
                    'PO_PRODUCT_NAME' => $po_product_name,
                    'PO_NUMBER' => $po_num,
                    'PO_PRODUCT_TYPE' => $po_product_type,
                    'PO_PRODUCT_QTY' => $po_product_qty,
                    'PO_PRODUCT_VALUE' => $po_product_value,
                    'PO_CURRENCY' => $po_currency,
                    'PO_GROSS_WEIGHT' => $po_gross_weight,
                    'PO_CBM_VOLUME' => $po_cbm_volume,
                    'PO_PACKING_TYPE1' => $po_packing_type_one,
                    'PO_PACKING_TYPE2' => $po_packing_type_two,
                    'PO_NBR1' => $po_nbr_one,
                    'PO_NBR2' => $po_nbr_two
                ));
                $last_insert_id = \DB::table('tbl_tran_purchase_order')->max('PO_ID');
                
                if (\Session::has('po_last_id')) {
                    $po_add_session = \Session::get('po_last_id');
                } else {
                    $po_add_session = '';
                }
                $po_add_session .= $last_insert_id . ',';
                \Session::put('po_last_id', $po_add_session);
                return \Redirect::to('confirm-po-upload-enter')->with('success', 'PO RECORD ADDED SUCCESFULLY');
            } //USER TYPE CHECK ENDS 
            elseif ($acc_type[0]->ACCOUNT_TYPE_ID == 3) //FOR CUSTOMER ADD 
                {
                $cust_id        = $fw_mast_id[0]->CUSTOMER_ID;
                $insert_po      = \DB::table('tbl_tran_purchase_order')->insert(array(
                    'FORWARDER_ID' => $forwarder_id,
                    'CUSTOMER_ID' => $cust_id,
                    'SHIPPER_ID' => $shipper_id,
                    'ACCOUNT_ID' => $account_id,
                    'STATUS_ID' => $status_id,
                    'CONSINE_ID' => $consine_id,
                    'PO_CREATION_DATE' => $po_creation_date,
                    'PO_DATE' => $po_date,
                    'PO_PRODUCT_PN' => $po_product_pn,
                    'PO_PRODUCT_NAME' => $po_product_name,
                    'PO_NUMBER' => $po_num,
                    'PO_PRODUCT_TYPE' => $po_product_type,
                    'PO_PRODUCT_QTY' => $po_product_qty,
                    'PO_PRODUCT_VALUE' => $po_product_value,
                    'PO_CURRENCY' => $po_currency,
                    'PO_GROSS_WEIGHT' => $po_gross_weight,
                    'PO_CBM_VOLUME' => $po_cbm_volume,
                    'PO_PACKING_TYPE1' => $po_packing_type_one,
                    'PO_PACKING_TYPE2' => $po_packing_type_two,
                    'PO_NBR1' => $po_nbr_one,
                    'PO_NBR2' => $po_nbr_two
                ));
                $last_insert_id = \DB::table('tbl_tran_purchase_order')->max('PO_ID');
                
                if (\Session::has('po_last_id')) {
                    $po_add_session = \Session::get('po_last_id');
                } else {
                    $po_add_session = '';
                }
                $po_add_session .= $last_insert_id . ',';
                \Session::put('po_last_id', $po_add_session);
                return \Redirect::to('confirm-po-upload-enter')->with('success', 'PO RECORD ADDED SUCCESFULLY');
            } //elseif ends 
        } //add-po-ENDS--
        if (isset($_POST['edit_po_post'])) {
            $po_id_post          = \Input::get('po_id');
            $shipper_id          = \Input::get('shipper_name');
            $po_creation_date    = \Input::get('po_creation_date');
            $po_date             = \Input::get('po_date');
            $po_product_pn       = \Input::get('product_pn');
            $po_product_name     = \Input::get('product_name');
            $po_product_type     = \Input::get('product_type');
            $po_product_qty      = \Input::get('product_qty');
            $po_product_value    = \Input::get('product_value');
            $po_currency         = \Input::get('currency_type');
            $po_gross_weight     = \Input::get('gross_wt');
            $po_cbm_volume       = \Input::get('volume_cbm');
            $po_packing_type_one = \Input::get('packing_type_one');
            $po_packing_type_two = \Input::get('packing_type_two');
            $po_nbr_one          = \Input::get('nbr_one');
            $po_nbr_two          = \Input::get('nbr_two');
            $po_num              = \Input::get('po_n');
            $consine_id          = \Input::get('consine_id');
            $update_po           = \DB::table('tbl_tran_purchase_order')->where('PO_ID', '=', $po_id_post)->update(array(
                'SHIPPER_ID' => $shipper_id,
                'PO_CREATION_DATE' => $po_creation_date,
                'PO_DATE' => $po_date,
                'PO_PRODUCT_PN' => $po_product_pn,
                'PO_PRODUCT_NAME' => $po_product_name,
                'PO_PRODUCT_TYPE' => $po_product_type,
                'PO_PRODUCT_QTY' => $po_product_qty,
                'PO_PRODUCT_VALUE' => $po_product_value,
                'PO_NUMBER' => $po_num,
                'PO_CURRENCY' => $po_currency,
                'PO_GROSS_WEIGHT' => $po_gross_weight,
                'PO_CBM_VOLUME' => $po_cbm_volume,
                'CONSINE_ID' => $consine_id,
                'PO_PACKING_TYPE1' => $po_packing_type_one,
                'PO_PACKING_TYPE2' => $po_packing_type_two,
                'PO_NBR1' => $po_nbr_one,
                'PO_NBR2' => $po_nbr_two
            ));
            return \Redirect::to('confirm-po-upload-enter')->with('success', 'PO RECORD UPDATED SUCCESFULLY');
        } //EDIT PO ENDS
        if (isset($_POST['del_po'])) {
            $po_id       = \Input::get('pur_id');
            $po_del_data = \DB::table('tbl_tran_purchase_order')->where('PO_ID', '=', $po_id)->delete();
            return \Redirect::to('confirm-po-upload-enter')->with('success', 'PO RECORD DELETED SUCCESFULLY');
            ;
        } //DELETE PO 
        
        //bulk po confirmation send 
        if (isset($_POST['send_for_confirmation'])) {
            $po_ids = \Input::get('po_ids');
            foreach ($po_ids as $id) {
                $select_po_account    = \DB::table('tbl_tran_purchase_order')->select('ACCOUNT_ID')->where('PO_ID', '=', $id)->get(); //PO_account ID
                $cust_account_id      = \DB::table('tbl_tran_purchase_order')->join('tbl_mast_customer', 'tbl_mast_customer.CUSTOMER_ID', '=', 'tbl_tran_purchase_order.CUSTOMER_ID')->select('tbl_mast_customer.ACCOUNT_ID')->where('tbl_tran_purchase_order.PO_ID', '=', $id)->get(); //customer Account ID From cust_master table 
                $insert_into_workflow = \DB::table('wf_po_approval')->insert(array(
                    'PO_ID' => $id,
                    'TO_ACCOUNT_ID' => $cust_account_id[0]->ACCOUNT_ID,
                    'FROM_ACCOUNT_ID' => $select_po_account[0]->ACCOUNT_ID
                ));
                $update_po_status     = \DB::table('tbl_tran_purchase_order')->where('PO_ID', '=', $id)->update(array(
                    'STATUS_ID' => 2
                ));
            }
            return \Redirect::to('po-overview');
        }
    }
    
    
    public function enter_purchase_order()
    {
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'po-overview';
        $account_type_id        = \Session::get('account_type'); //USER ACCOUNT TYPE 
        $fw_mast_id             = \Session::get('master_id'); //forwarder ID 
       
        if ($account_type_id[0]->ACCOUNT_TYPE_ID == 2) {
            $login_usr_account_id  = $fw_mast_id[0]->ACCOUNT_ID;
            $customer_name = \DB::select("select tbl_mast_customer.CUSTOMER_ID,tbl_mast_customer.CUSTOMER_NAME from tbl_mast_customer ,tbl_mast_customer_account_map where tbl_mast_customer.CUSTOMER_ID = tbl_mast_customer_account_map.CUSTOMER_ID AND tbl_mast_customer_account_map.ACCOUNT_ID = $login_usr_account_id");
            $this->layout  = \View::make('pomfrontend.enter-purchase-order', $data_msg, array(
                'customer_name' => $customer_name
            ));
        } elseif ($account_type_id[0]->ACCOUNT_TYPE_ID == 3) {
            $login_usr_account_id   = $fw_mast_id[0]->ACCOUNT_ID;
            $forwarder_name = \DB::select("select tbl_mast_forwarder.FWDR_ID,tbl_mast_forwarder.FWDR_NAME from tbl_mast_forwarder, tbl_mast_forwarder_account_map where tbl_mast_forwarder.FWDR_ID = tbl_mast_forwarder_account_map.FWDR_ID AND tbl_mast_forwarder_account_map.ACCOUNT_ID = $login_usr_account_id");
            $this->layout   = \View::make('pomfrontend.enter-purchase-order', $data_msg, array(
                'forwarder_name' => $forwarder_name
            ));
        } //THIS FUNCTION IS WORKING FOR THE POPULATION OF ENTER PURCHASE ORDER PAGE 
        
    }
    public function confirm_po_upload()
    {
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'po-overview';
        
        $this->layout = \View::make('pomfrontend.confirm-po-upload', $data_msg);
    }
    public function confirm_po_upload_edit()
    {
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'po-overview';
        
        $this->layout = \View::make('pomfrontend.confirm-po-upload-edit', $data_msg);
    }
    public function create_purchase_order()
    {
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'po-overview';
        
        $this->layout = \View::make('pomfrontend.create-purchase-order', $data_msg);
    }
    public function import_purchase_order()
    {
        $data_msg               = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name']  = 'po-overview';
        
        $this->layout = \View::make('pomfrontend.import-purchase-order', $data_msg);
    }
    public function po_overview()
    {
        if (!(ModulePermissionChecker() && PostLoginChecker())) {
            return \Redirect::to('index');
        }
        $data_msg                = array();
        $data_msg['page_title']  = 'PMO Admin Panel | Log in';
        $data_msg['page_name']   = 'po-overview';
        $data_msg['page_filter'] = 'all';
        
        $mast_id       = \Session::get('master_id');
        $shipper_names = \DB::table('tbl_mast_shipper')->select('SHIPPER_ID', 'SHIPPER_NAME')->get();
        $currency      = \DB::table('tb_mast_currency')->select('CURRENCY_ID', 'CURRENCY_NAME')->get();
        $consine       = \DB::table('table_mast_consine')->select('CONSINE_NAME', 'CONSINE_ID')->get();
        $usr_data      = \Session::get('user_data');
        
        $usr_account_id = $usr_data[0]->ACCOUNT_ID; //login user account id
        
        $account_id        = \Session::get('account_data');
       

        $user_account_type = \Session::get('account_type');
        
        if ($user_account_type[0]->ACCOUNT_TYPE_ID == 2) {

            $fw_mast_id_post = $mast_id[0]->FWDR_ID;

            $po_overview     = \DB::select("SELECT *,tbl_tran_purchase_order.PO_ID AS PO_ID,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order 
			JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
			JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
			JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID  
			JOIN tbl_mast_customer_account_map ON tbl_mast_customer_account_map.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
			JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID 
			
			WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_customer_account_map.ACCOUNT_ID = $account_id AND tbl_tran_purchase_order.FORWARDER_ID = $fw_mast_id_post");
            
            $fw_status_count=\DB::select("SELECT tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.po_count,0) AS PO_COUNT
FROM tbl_cfg_workflow_status LEFT JOIN 
(SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_purchase_order.PO_ID) AS po_count FROM tbl_tran_purchase_order 
                        
            JOIN tbl_mast_customer_account_map ON tbl_mast_customer_account_map.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID       
            
        JOIN tbl_cfg_workflow_status ON tbl_tran_purchase_order.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID
 
            WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_customer_account_map.ACCOUNT_ID = $account_id AND tbl_tran_purchase_order.FORWARDER_ID = $fw_mast_id_post
            GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE

ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'PO' ORDER BY STATUS_SEQUENCE");
          
        } elseif ($user_account_type[0]->ACCOUNT_TYPE_ID == 3) {
            $cust_mast_id_post = $mast_id[0]->CUSTOMER_ID;
            
            $po_overview = \DB::select("SELECT *,tbl_tran_purchase_order.PO_ID AS PO_ID,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order 
			JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
			JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
			JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID
			JOIN tbl_mast_forwarder_account_map ON tbl_mast_forwarder_account_map.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
			JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID 
			
			WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_forwarder_account_map.ACCOUNT_ID = $account_id  AND tbl_tran_purchase_order.CUSTOMER_ID = $cust_mast_id_post");
            // COUNTER 
            //COUNTER STARTS FOR CUSTOMER TYPE USER 

            $fw_status_count=\DB::select("SELECT tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.po_count,0) AS PO_COUNT FROM tbl_cfg_workflow_status LEFT JOIN (SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_purchase_order.PO_ID) AS po_count FROM tbl_tran_purchase_order JOIN tbl_mast_forwarder_account_map ON tbl_mast_forwarder_account_map.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID JOIN tbl_cfg_workflow_status ON tbl_tran_purchase_order.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_forwarder_account_map.ACCOUNT_ID = $account_id AND tbl_tran_purchase_order.CUSTOMER_ID = $cust_mast_id_post GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'PO' ORDER BY STATUS_SEQUENCE"); 
           // print_r($fw_status_count);
           // die();
        }
        $this->layout = \View::make('pomfrontend.po-overview', $data_msg, array(
            'po_overview' => $po_overview,
            'shipper_names' => $shipper_names,
            'consine' => $consine,
            'currency' => $currency,
            'usr_account_id' => $usr_account_id,'fw_status_count'=>$fw_status_count
            
        ));
    }
    public function po_overview_post()
    {
        $data_msg                = array();
        $data_msg['page_title']  = 'PMO Admin Panel | Log in';
        $data_msg['page_name']   = 'po-overview';
        $data_msg['page_filter'] = $_POST['hid_po_status'];
        $usr_data       = \Session::get('user_data');
        $usr_account_id = $usr_data[0]->ACCOUNT_ID; //login user account id
        
        $shipper_names = \DB::table('tbl_mast_shipper')->select('SHIPPER_ID', 'SHIPPER_NAME')->get();
        $currency      = \DB::table('tb_mast_currency')->select('CURRENCY_ID', 'CURRENCY_NAME')->get();
        $consine       = \DB::table('table_mast_consine')->select('CONSINE_NAME', 'CONSINE_ID')->get();
        
        $mast_id     = \Session::get('master_id');
        
        $status_post = $_POST['hid_po_status'];
        
 echo $status_post;
 echo strpos($status_post,"all");
        $account_id  = \Session::get('account_data');

        
        $user_account_type = \Session::get('account_type');  
              if ($user_account_type[0]->ACCOUNT_TYPE_ID == 2) { 

            $fw_mast_id_post = $mast_id[0]->FWDR_ID;
           
          /*  $po_overview=\DB::select("SELECT *,tbl_tran_purchase_order.PO_ID AS PO_ID,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order 
			JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
			JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
			JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID  
			JOIN tbl_mast_customer_account_map ON tbl_mast_customer_account_map.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 		
			JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID  
			WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_customer_account_map.ACCOUNT_ID = $account_id AND tbl_tran_purchase_order.FORWARDER_ID = $fw_mast_id_post AND tbl_cfg_workflow_status.MODULE_NAME = 'PO' AND tbl_cfg_workflow_status.STATUS_NAME IN ($status_post)");
            //counters 
            */
            $fw_status_count=\DB::select("SELECT tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.po_count,0) AS PO_COUNT
FROM tbl_cfg_workflow_status LEFT JOIN 
(SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_purchase_order.PO_ID) AS po_count FROM tbl_tran_purchase_order 
            JOIN tbl_mast_customer_account_map ON tbl_mast_customer_account_map.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID       
        JOIN tbl_cfg_workflow_status ON tbl_tran_purchase_order.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID
 
            WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_customer_account_map.ACCOUNT_ID = $account_id AND tbl_tran_purchase_order.FORWARDER_ID = $fw_mast_id_post
            GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE

ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'PO' ORDER BY STATUS_SEQUENCE");

           
            //COUNTER ENDS FOR FORWARDER TYPE USER 
         //   echo strpos($status_post,"all");
           //  die;
            if ($status_post == "'all'" || $status_post == "all") {
           
           //  if (strpos($status_post,"all")== ) {

                $po_overview = \DB::select("SELECT *,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID  JOIN  tbl_mast_customer_account_map ON tbl_mast_customer_account_map.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_customer_account_map.ACCOUNT_ID = $account_id AND tbl_tran_purchase_order.FORWARDER_ID = $fw_mast_id_post");
           
            } else {
                $po_overview = \DB::select("SELECT *,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID  JOIN  tbl_mast_customer_account_map ON tbl_mast_customer_account_map.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_customer_account_map.ACCOUNT_ID = $account_id AND tbl_tran_purchase_order.FORWARDER_ID = $fw_mast_id_post AND tbl_cfg_workflow_status.STATUS_NAME IN ($status_post)");
            }
        } elseif ($user_account_type[0]->ACCOUNT_TYPE_ID == 3) {

            $cust_mast_id_post = $mast_id[0]->CUSTOMER_ID;
            // need to clrify 
//            $po_overview       = \DB::select("SELECT *,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order 
//			JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
//			JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
//			JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID
//
//			JOIN tbl_mast_forwarder_account_map ON tbl_mast_forwarder_account_map.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
//			JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID
//			JOIN wf_po_approval ON wf_po_approval.PO_ID = tbl_tran_purchase_order.PO_ID  
//			WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_forwarder_account_map.ACCOUNT_ID = $account_id  AND tbl_tran_purchase_order.CUSTOMER_ID = $cust_mast_id_post  AND tbl_cfg_workflow_status.MODULE_NAME = 'PO' AND tbl_cfg_workflow_status.STATUS_NAME IN ($status_post) ");
            
            //COUNTER STARTS FOR CUSTOMER TYPE USER 

            //counters 
             $fw_status_count=\DB::select("SELECT tbl_cfg_workflow_status.STATUS_SEQUENCE,tbl_cfg_workflow_status.STATUS_NAME, IFNULL(STAT_TABLE.po_count,0) AS PO_COUNT FROM tbl_cfg_workflow_status LEFT JOIN (SELECT tbl_cfg_workflow_status.STATUS_ID,COUNT(tbl_tran_purchase_order.PO_ID) AS po_count FROM tbl_tran_purchase_order JOIN tbl_mast_forwarder_account_map ON tbl_mast_forwarder_account_map.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID JOIN tbl_cfg_workflow_status ON tbl_tran_purchase_order.STATUS_ID = tbl_cfg_workflow_status.STATUS_ID WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_forwarder_account_map.ACCOUNT_ID = $account_id AND tbl_tran_purchase_order.CUSTOMER_ID = $cust_mast_id_post GROUP by tbl_cfg_workflow_status.STATUS_ID) AS STAT_TABLE ON STAT_TABLE.STATUS_ID=tbl_cfg_workflow_status.STATUS_ID WHERE tbl_cfg_workflow_status.MODULE_NAME = 'PO' ORDER BY STATUS_SEQUENCE"); 
            //COUNTER ENDS FOR CUSTOMER TYPE USER 
          //   echo strpos($status_post,"all");
            // die;
            if ($status_post == "'all'" || $status_post == "all") {
               
                $po_overview = \DB::select("SELECT *,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order 
                    JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
                    
                    JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID
                    JOIN tbl_mast_forwarder_account_map ON tbl_mast_forwarder_account_map.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
                    JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID 
                    WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_forwarder_account_map.ACCOUNT_ID = $account_id  AND tbl_tran_purchase_order.CUSTOMER_ID = $cust_mast_id_post");
           
            } else {
                $po_overview = \DB::select("SELECT *,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order 
                    JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID
                    JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
                    JOIN tbl_mast_forwarder ON tbl_mast_forwarder.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID
                    JOIN  tbl_mast_forwarder_account_map ON tbl_mast_forwarder_account_map.FWDR_ID = tbl_tran_purchase_order.FORWARDER_ID 
                    JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 AND tbl_mast_forwarder_account_map.ACCOUNT_ID = $account_id  AND tbl_tran_purchase_order.CUSTOMER_ID = $cust_mast_id_post  AND tbl_cfg_workflow_status.MODULE_NAME = 'PO' AND tbl_cfg_workflow_status.STATUS_NAME IN ($status_post) ");
            }
        }
        if (isset($_POST['edit_po_update'])) {

            $po_id_post          = \Input::get('po_id');
            //$cust_id=\Input::get('customer_id');
            $shipper_id          = \Input::get('shipper_name');
            $po_creation_date    = \Input::get('po_creation_date');
            $po_date             = \Input::get('po_date');
            $po_product_pn       = \Input::get('product_pn');
            $po_product_name     = \Input::get('product_name');
            $po_product_type     = \Input::get('product_type');
            $po_product_qty      = \Input::get('product_qty');
            $po_product_value    = \Input::get('product_value');
            $po_currency         = \Input::get('currency_type');
            $po_gross_weight     = \Input::get('gross_wt');
            $po_cbm_volume       = \Input::get('volume_cbm');
            $po_packing_type_one = \Input::get('packing_type_one');
            $po_packing_type_two = \Input::get('packing_type_two');
            $po_nbr_one          = \Input::get('nbr_one');
            $po_nbr_two          = \Input::get('nbr_two');
            $po_num              = \Input::get('po_n');
            $consine_id          = \Input::get('consine_id');
            $update_po           = \DB::table('tbl_tran_purchase_order')->where('PO_ID', '=', $po_id_post)->update(array(
                'SHIPPER_ID' => $shipper_id,
                'PO_CREATION_DATE' => $po_creation_date,
                'PO_DATE' => $po_date,
                'PO_PRODUCT_PN' => $po_product_pn,
                'PO_PRODUCT_NAME' => $po_product_name,
                'PO_PRODUCT_TYPE' => $po_product_type,
                'PO_PRODUCT_QTY' => $po_product_qty,
                'PO_PRODUCT_VALUE' => $po_product_value,
                'PO_NUMBER' => $po_num,
                'PO_CURRENCY' => $po_currency,
                'PO_GROSS_WEIGHT' => $po_gross_weight,
                'PO_CBM_VOLUME' => $po_cbm_volume,
                'CONSINE_ID' => $consine_id,
                'PO_PACKING_TYPE1' => $po_packing_type_one,
                'PO_PACKING_TYPE2' => $po_packing_type_two,
                'PO_NBR1' => $po_nbr_one,
                'PO_NBR2' => $po_nbr_two
            ));
            return \Redirect::to('po-overview');
        }
        
        
        $this->layout = \View::make('pomfrontend.po-overview', $data_msg, array(
            'po_overview' => $po_overview,
            'shipper_names' => $shipper_names,
            'consine' => $consine,
            'currency' => $currency,
            'usr_account_id' => $usr_account_id,
            'fw_status_count'=>$fw_status_count,
            
        ));
    }
      public function po_confirmation_send($id)
    {
        $user_account_type = \Session::get('account_type');
        //For Forwarder Login 
        $po_id=$id; // ID 
        $send_on              =  date('Y-m-d h:m:s');
        if ($user_account_type[0]->ACCOUNT_TYPE_ID == 2) {
            
            
            $select_po_account    = \DB::table('tbl_tran_purchase_order')->select('ACCOUNT_ID')->where('PO_ID', '=', $po_id)->get(); //PO_account ID
            $cust_account_id      = \DB::table('tbl_tran_purchase_order')->join('tbl_mast_customer', 'tbl_mast_customer.CUSTOMER_ID', '=', 'tbl_tran_purchase_order.CUSTOMER_ID')->select('tbl_mast_customer.ACCOUNT_ID')->where('tbl_tran_purchase_order.PO_ID', '=', $po_id)->get(); //customer Account ID From cust_master table 
            //check for existing record 
            $check_current_entry_in_workflow=\DB::table('wf_po_approval')->select('PO_ID')->where('PO_ID','=',$po_id)->get();
            if(!empty($check_current_entry_in_workflow[0]->PO_ID)){
                $update_workflow_table = \DB::table('wf_po_approval')->insert(array(
                'PO_ID' => $po_id,
                'TO_ACCOUNT_ID' => $cust_account_id[0]->ACCOUNT_ID,
                'FROM_ACCOUNT_ID' => $select_po_account[0]->ACCOUNT_ID,
                'APPROVAL_COMMENT' => '',
                'SEND_ON' => $send_on,
                'APPROVAL_STATUS'=>0));//change     
            $update_po_status     = \DB::table('tbl_tran_purchase_order')->where('PO_ID', '=', $po_id)->update(array(
                'STATUS_ID' => 2
            ));
            }
            else{
            
            $insert_into_workflow = \DB::table('wf_po_approval')->insert(array(
                'PO_ID' => $po_id,
                'TO_ACCOUNT_ID' => $cust_account_id[0]->ACCOUNT_ID,
                'FROM_ACCOUNT_ID' => $select_po_account[0]->ACCOUNT_ID,
                'APPROVAL_COMMENT' => '',
                'SEND_ON' => $send_on,'APPROVAL_STATUS'=>0
            ));
            $update_po_status     = \DB::table('tbl_tran_purchase_order')->where('PO_ID', '=', $po_id)->update(array(
                'STATUS_ID' => 2
            ));
        }
            return \Redirect::back()->with('success','PO Send For Approval !');
        }
        //For Customer Login 
        if ($user_account_type[0]->ACCOUNT_TYPE_ID == 3) {
           // $send_on              = date('Y-m-d h:m:s');
            $select_po_account    = \DB::table('tbl_tran_purchase_order')->select('ACCOUNT_ID')->where('PO_ID', '=', $po_id)->get(); //PO_account ID
            $fwdr_account_id      = \DB::table('tbl_tran_purchase_order')->join('tbl_mast_forwarder', 'tbl_mast_forwarder.FWDR_ID', '=', 'tbl_tran_purchase_order.CUSTOMER_ID')->select('tbl_mast_forwarder.ACCOUNT_ID')->where('tbl_tran_purchase_order.PO_ID', '=', $po_id)->get(); //customer Account ID From cust_master table 
            $insert_into_workflow = \DB::table('wf_po_approval')->insert(array(
                'PO_ID' => $po_id,
                'TO_ACCOUNT_ID' => $fwdr_account_id[0]->ACCOUNT_ID,
                'FROM_ACCOUNT_ID' => $select_po_account[0]->ACCOUNT_ID,
                'APPROVAL_COMMENT' => '',
                'SEND_ON' => $send_on
            ));
            $update_po_status= \DB::table('tbl_tran_purchase_order')->where('PO_ID', '=', $po_id)->update(array(
                'STATUS_ID' => 2
            ));
            return \Redirect::back();
        }
    } //confirm po upload 
    public function confirm_po()  //function change 
    {
        $get_po_id        = \Input::get('po_id');
        $get_po_status    = \Input::get('po_status');
        $get_comment      = \Input::get('comment');
        $usr_data         = \Session::get('user_data');
        $usr_id           = $usr_data[0]->USER_ID;
        $approve_time     = date('Y-m-d h:m:s');
        $insert_comment_workflow  = \DB::table('wf_po_approval')->where('PO_ID','=',$get_po_id)->where('APPROVAL_STATUS','=',0)->update(array(
            'APPROVED_BY' => $usr_id,
            'APPROVED_ON' => $approve_time,
            'APPROVAL_COMMENT' => $get_comment,
            'APPROVAL_STATUS' => $get_po_status
        ));
        $update_po_status = \DB::table('tbl_tran_purchase_order')->where('PO_ID', '=', $get_po_id)->update(array(
            'STATUS_ID' => $get_po_status
        ));
        if($get_po_status == 3){
         $po_status_post ='Approve';
        }
        if($get_po_status == 5){
         $po_status_post ='Request For Review';
        }
        if($get_po_status == 4){
         $po_status_post ='Reject';
        }
        return \Redirect::back()->with('success',$po_status_post);
    }
    public function del_po_overview()
    {
        if (isset($_POST['del_po'])) {
            $po_id = \Input::get('pur_id');
            
            
            $po_del_data = \DB::table('tbl_tran_purchase_order')->where('PO_ID', '=', $po_id)->update(array(
                'IS_ACTIVE' => 0
            ));
            return \Redirect::back()->with('success', 'PO RECORD DELETED SUCCESFULLY');
        } //DELETE PO
    }

    //new function for search 
    public function table_search(){
        if(\Request::ajax())
        {
           $po_n=\Input::get('pon_name');
           $product_pn=\Input::get('product_pn');
           $customer=\Input::get('customer');
           $shipper=\Input::get('shipper');
           $po_date=\Input::get('po_date');
            $pick_up=\Input::get('pick_up');
            $pol=\Input::get('pol');
            $pod=\Input::get('pod');
            $delivery_place=\Input::get('delivery_place');
           // $incoterm_origin=\Input::get('incoterm_origin');
           // $incotrm_destination=\Input::get('incotrm_destination');
            $sql="SELECT *,tbl_tran_purchase_order.PO_ID AS PO_ID,tbl_tran_purchase_order.ACCOUNT_ID AS PO_ACCOUNT_ID FROM tbl_tran_purchase_order 
            JOIN tbl_mast_shipper ON tbl_mast_shipper.SHIPPER_ID = tbl_tran_purchase_order.SHIPPER_ID 
            JOIN table_mast_consine ON table_mast_consine.CONSINE_ID = tbl_tran_purchase_order.CONSINE_ID 
            JOIN tbl_mast_customer ON tbl_mast_customer.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID  
            JOIN tbl_mast_customer_account_map ON tbl_mast_customer_account_map.CUSTOMER_ID = tbl_tran_purchase_order.CUSTOMER_ID 
            JOIN tbl_cfg_workflow_status ON tbl_cfg_workflow_status.STATUS_ID = tbl_tran_purchase_order.STATUS_ID       
            WHERE tbl_tran_purchase_order.IS_ACTIVE = 1 ";
            if($po_n!=" ") {
             $sql.="AND PO_NUMBER LIKE '%$po_n%' ";
            }
            if($product_pn!=" ") 
            {
            $sql.="AND PO_PRODUCT_PN LIKE '%$product_pn%' ";
            }
            if($customer!=" ")
             {
             $sql.="AND CUSTOMER_NAME LIKE '%$customer%' ";
            }
            if($shipper!=" ") 
            { 
             $sql.="AND SHIPPER_NAME LIKE '%$shipper%' ";
             }
             if($po_date!=" ")
              { 
             $sql.="AND PO_DATE LIKE '%$po_date%' ";
            }
            $sql.="GROUP BY tbl_tran_purchase_order.PO_ID";
            $po_overview= \DB::select($sql);

            $usr_data      = \Session::get('user_data');
            $usr_account_id = $usr_data[0]->ACCOUNT_ID; //login user account id
            
            return \View::make('pomfrontend.table-search',array('po_overview'=>$po_overview,'usr_account_id'=>$usr_account_id));
            
        }
    }//function ENDS 
    public function po_cmt_show($id=null){
      $po_comment=\DB::select("SELECT * FROM wf_po_approval JOIN tbl_mast_app_user ON tbl_mast_app_user.USER_ID = wf_po_approval.APPROVED_BY WHERE wf_po_approval.PO_ID = $id AND wf_po_approval.APPROVAL_STATUS != 0 AND wf_po_approval.APPROVAL_COMMENT !='' ORDER BY APPROVED_ON DESC");

        return \View::make('pomfrontend.po-comment-page',array('po_comment' =>$po_comment));
    }

}
