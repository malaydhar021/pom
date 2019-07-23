<?php
namespace admin;
class SettingsController extends \BaseController {
	public function showholiday(){
			//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Settings';
        $data_msg['page_name'] = 'holiday';
		$this->layout = \View::make('admin.holiday',$data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
	
	}
		public function showsite_configuration(){
				//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Settings';
        $data_msg['page_name'] = 'site-configuration';
		$this->layout = \View::make('admin.site-configuration',$data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
	
	}
}