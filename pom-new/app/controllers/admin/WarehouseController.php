<?php
namespace admin;
class WarehouseController extends \BaseController {
	public function view_warehouse(){
			//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | View Warehouse';
        $data_msg['page_name'] = 'view-warehouse';
		$this->layout = \View::make('admin.view-warehouse',$data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
	}
	public function edit_warehouse(){
			//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | View Warehouse';
        $data_msg['page_name'] = 'edit-warehouse';
		$this->layout = \View::make('admin.edit-warehouse',$data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
	}
        public function shownew_warehouse(){
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