<?php
namespace admin;
class EnvironmentController extends \BaseController {
	public function shownew_customer(){
			//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Environment';
        $data_msg['page_name'] = 'new-customer';
		$this->layout = \View::make('admin.new-customer',$data_msg);
	}
		else
		{
			return \Redirect::to('/logout');
		}
	}
	public function shownew_forwarder(){
			//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Environment';
        $data_msg['page_name'] = 'new-forwarder';
		$this->layout = \View::make('admin.new-forwarder',$data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
	}
	public function shownew_qc_agent(){
			//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Environment';
        $data_msg['page_name'] = 'new-qc-agent';
		$this->layout = \View::make('admin.new-qc-agent',$data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
	}
	public function shownew_supplier(){
			//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Environment';
        $data_msg['page_name'] = 'new-supplier';
		$this->layout = \View::make('admin.new-supplier',$data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
	}
	public function showwarehouse(){
			//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Environment';
        $data_msg['page_name'] = 'warehouse';
		$this->layout = \View::make('admin.warehouse',$data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
	}
}