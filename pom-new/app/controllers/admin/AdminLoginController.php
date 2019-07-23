<?php
namespace admin;
class AdminLoginController extends \BaseController {

public function admin_login_check(){

	$user_name=trim(\Input::get('username'));
	$password=trim(\Input::get('password'));
	
	$get_user_log_in = \DB::select("SELECT * FROM `tbl_mast_app_user`,`tbl_cfg_mast_account_type` WHERE tbl_cfg_mast_account_type.ACCOUNT_TYPE_ID=tbl_mast_app_user.USER_TYPE='1' AND   tbl_mast_app_user.USER_NAME= '".$user_name."' AND  tbl_mast_app_user.PASSWORD= '".$password."' ");
	
	if (!empty($get_user_log_in)) {
            \Session::put('user_data', $get_user_log_in);
            return \Redirect::to('dashboard');
        } else {
			$errormessage='<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Wrong Username/Password !</strong> </div>';
            return \Redirect::back()->with('error', $errormessage);
        }
}//function ends 

















}//class ends