<?php
namespace admin;
class AdminLogoutController extends \BaseController {

public function Adminlogout()
	{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name'] = 'index';
		$sucessmessage='<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>You have successfully logged out!</strong> </div>';
		\Session::flush();	
		return \Redirect::to('/')->with('success', $sucessmessage);
	}

}//class ends