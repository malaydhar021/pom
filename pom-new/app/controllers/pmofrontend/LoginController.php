<?php
namespace pmofrontend;
class LoginController extends \BaseController
{
    public function show_index()
    {
        return \View::make('pomfrontend.index');
    }
    public function show_forwarder_login()
    {
        return \View::make('pomfrontend.forwarder-login');
    }
    public function show_customer_login()
    {
        return \View::make('pomfrontend.login-customer');
    }
    public function show_supplier_login()
    {
        return \View::make('pomfrontend.login-supplier');
    }
    public function show_qc_login()
    {
        return \View::make('pomfrontend.login-qc-agent');
    }
    
    public function forwarder_login_check()
    {
        $user_name       = \Input::get('user_name');
        $password        = \Input::get('password');
        $get_user_log_in = \DB::table('tbl_mast_app_user')->select('*')->where('USER_NAME', '=', $user_name)->where('PASSWORD', '=', $password)->get(); //1st level checking	 
        if (!empty($get_user_log_in)) {
            \Session::put('user_data', $get_user_log_in);
        } else {
            return \Redirect::back()->with('error', 'Wrong Username/Password');
        }
        //check the account type of the user matches with the respective login screen 
        $check_acc_type = \DB::table('tbl_cfg_mast_app_account')->select('ACCOUNT_TYPE_ID')->where('ACCOUNT_ID', '=', $get_user_log_in[0]->ACCOUNT_ID)->get();
        \Session::put('account_type', $check_acc_type);
        if ($check_acc_type[0]->ACCOUNT_TYPE_ID != 2) //function change due to reqiirment
        {
                    
            return \Redirect::back()->with('error', ' Account Type Mismatch');
        }
        $forwarder_account_id = $get_user_log_in[0]->ACCOUNT_ID;
        \Session::put('account_data', $forwarder_account_id);
        $forwarder_mast_id = \DB::table('tbl_mast_forwarder')->select('FWDR_ID','ACCOUNT_ID')->where('ACCOUNT_ID', '=', $forwarder_account_id)->get(); //fetch forwarder master id from the forwarder mast table 
        
        \Session::put('master_id', $forwarder_mast_id);
        if (empty($forwarder_mast_id)) {
                                        
            return \Redirect::back()->with('error', ' Account Type Mismatch');
        } else {
            return \Redirect::to('pom-dashboard');
        }
    }
    
    public function customer_login_check()
    {
        $user_name       = \Input::get('user_name');
        $password        = \Input::get('password');
        $get_user_log_in = \DB::table('tbl_mast_app_user')->select('*')->where('USER_NAME', '=', $user_name)->where('PASSWORD', '=', $password)->get(); //1st level checking	 
        if (!empty($get_user_log_in)) {
            \Session::put('user_data', $get_user_log_in);
        } else {
            return \Redirect::back()->with('error', 'Wrong Username/Password');
        }
        //check the account type of the user matches with the respective login screen 
        $check_acc_type = \DB::table('tbl_cfg_mast_app_account')->select('ACCOUNT_TYPE_ID')->where('ACCOUNT_ID', '=', $get_user_log_in[0]->ACCOUNT_ID)->get();
        \Session::put('account_type', $check_acc_type);
        if ($check_acc_type[0]->ACCOUNT_TYPE_ID != 3) {
            return \Redirect::back()->with('error', ' Account Type Mismatch');
        }
        $customer_account_id = $get_user_log_in[0]->ACCOUNT_ID;
        \Session::put('account_data', $customer_account_id);
        $customer_mast_id = \DB::table('tbl_mast_customer')->select('CUSTOMER_ID','ACCOUNT_ID')->where('ACCOUNT_ID', '=', $customer_account_id)->get(); //fetch forwarder master id from the forwarder mast table 
        
        \Session::put('master_id', $customer_mast_id);
        if (empty($customer_mast_id)) {
            return \Redirect::back()->with('error', ' Account Type Mismatch');
        } else {
            return \Redirect::to('pom-dashboard');
        }
        
    }
    
    public function supplier_login_check()
    {
        $user_name       = \Input::get('user_name');
        $password        = \Input::get('password');
        $get_user_log_in = \DB::table('tbl_mast_app_user')->select('*')->where('USER_NAME', '=', $user_name)->where('PASSWORD', '=', $password)->where('USER_TYPE', '=', 4)->get();
        if (!empty($get_user_log_in)) {
            \Session::put('user_data', $get_user_log_in);
            return \Redirect::to('pom-dashboard');
        } else {
            return \Redirect::back()->with('error', 'Wrong Username/Password');
        }
        
    }
    
    public function qc_login_check()
    {
        $user_name       = \Input::get('user_name');
        $password        = \Input::get('password');
        $get_user_log_in = \DB::table('tbl_mast_app_user')->select('*')->where('USER_NAME', '=', $user_name)->where('PASSWORD', '=', $password)->where('USER_TYPE', '=', 5)->get();
        if (!empty($get_user_log_in)) {
            \Session::put('user_data', $get_user_log_in);
            return \Redirect::to('pom-dashboard');
        } else {
            return \Redirect::back()->with('error', 'Wrong Username/Password');
        }
        
    }
    
    
    
    
    
}