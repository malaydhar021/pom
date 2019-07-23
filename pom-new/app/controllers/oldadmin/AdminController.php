<?php
namespace admin;
class AdminController extends \BaseController {
	
	public function showindex()
	{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Log in';
        $data_msg['page_name'] = 'index';
		
		if (\Session::has('user_data'))
		{
			return \Redirect::to('dashboard');
		}
		else
		{
			$this->layout = \View::make('admin.index',$data_msg);
		}
		
	}
	
	public function showdashboard()
	{
		//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
			$data_msg = array();
			$data_msg['page_title'] = 'PMO Admin Panel | Dashboard';
			$data_msg['page_name'] = 'dashboard';
			$data_msg['user_data']  = \Session::get('user_data');
			$this->layout = \View::make('admin.dashboard',$data_msg);
		}
		else
		{
			return \Redirect::to('/logout');
		}
	
	}
	public function showforwarder($msg=null)
	{
		//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
		$data_msg['page_title'] = 'PMO Admin Panel | Dashboard';
		$data_msg['page_name'] = 'forwarder';
		$data_msg['all_user_count'] = \DB::select("SELECT count(FWDR_ID) as `all_user` FROM `tbl_mast_forwarder`");
		$data_msg['sus_user_count'] = \DB::select("SELECT count(FWDR_ID) as `sus_user` FROM `tbl_mast_forwarder` WHERE IS_ACTIVE = '0'");
		$accttype = 'all';
		
			$namesearch = \Input::get('name_search');
			$emailsearch = \Input::get('email_search');
			$accttype = \Input::get('viewaccttype');	
			$querywhere="SELECT * FROM `tbl_mast_forwarder` JOIN `tbl_mast_country` ON tbl_mast_country.CNT_ID=tbl_mast_forwarder.FWDR_COUNTRY  WHERE  tbl_mast_forwarder.ACCOUNT_ID!=''";			
			
			if($namesearch !='')
			{
			$querywhere.=" AND tbl_mast_forwarder.FWDR_NAME LIKE '%$namesearch%'";	
			}	
			if($emailsearch !='')
			{
			$querywhere.=" AND tbl_mast_forwarder.FWDR_EMAIL='$emailsearch'";	
			}
			if($accttype=='suspended')
			{
			$querywhere.=" AND tbl_mast_forwarder.IS_ACTIVE='0'";			
			}
			$order_by_sql=" ORDER BY tbl_mast_forwarder.FWDR_NAME ";
		        $data_msg['forwarder']=\DB::select($querywhere.$order_by_sql);
				$data_msg['namesearch']=$namesearch;
				$data_msg['emailsearch']=$emailsearch;
				$this->layout = \View::make('admin.forwarder',$data_msg,array('acct_type'=>$accttype));

		}
		else
			{
				return \Redirect::to('/logout');
			}
	}

	public function suspendForwoder($id=null)
	{
		//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$val = \DB::table('tbl_mast_forwarder')->where('FWDR_ID', $id)->first();
		$act =  $val->IS_ACTIVE;
		if($act==1)
		{
			\DB::table('tbl_mast_forwarder')->where('FWDR_ID','=',$id)->update(array('IS_ACTIVE'=> 0));
		}
		if ($act==0) 
		{
			\DB::table('tbl_mast_forwarder')->where('FWDR_ID','=',$id)->update(array('IS_ACTIVE'=> 1));
		}		
		return \Redirect::back();
		}
		else
		{
			return \Redirect::to('/logout');
		}

	}


	public function showcustomer($msg=null)
	{
		//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
		$data_msg['page_title'] = 'PMO Admin Panel | Dashboard';
		$data_msg['page_name'] = 'customer';
		$data_msg['all_user_count'] = \DB::select("SELECT count(CUSTOMER_ID) as `all_user` FROM `tbl_mast_customer`");
		$data_msg['sus_user_count'] = \DB::select("SELECT count(CUSTOMER_ID) as `sus_user` FROM `tbl_mast_customer` WHERE IS_ACTIVE = '0'");
		$accttype = 'all';
		
			$namesearch = \Input::get('name_search');
			$emailsearch = \Input::get('email_search');
			$accttype = \Input::get('viewaccttype');	
			$querywhere="SELECT * FROM `tbl_mast_customer` JOIN `tbl_mast_country` ON tbl_mast_country.CNT_ID=tbl_mast_customer.CUSTOMER_COUNTRY  WHERE  tbl_mast_customer.ACCOUNT_ID!=''";			
			
			if($namesearch !='')
			{
			$querywhere.=" AND tbl_mast_customer.CUSTOMER_NAME LIKE '%$namesearch%'";	
			}	
			if($emailsearch !='')
			{
			$querywhere.=" AND tbl_mast_customer.CUSTOMER_EMAIL='$emailsearch'";	
			}
			if($accttype=='suspended')
			{
			$querywhere.=" AND tbl_mast_customer.IS_ACTIVE='0'";			
			}
			$order_by_sql=" ORDER BY tbl_mast_customer.CUSTOMER_NAME ";
		        $data_msg['customer']=\DB::select($querywhere.$order_by_sql);
				$data_msg['namesearch']=$namesearch;
				$data_msg['emailsearch']=$emailsearch;
				$this->layout = \View::make('admin.customer',$data_msg,array('acct_type'=>$accttype));

		}
		else
			{
				return \Redirect::to('/logout');
			}
	}


	public function showqc_agent($msg=null)
	{
		//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		if (\Request::isMethod('get'))
		{


			if($msg!=null)
			{

			$data_msg = array();
	        $data_msg['page_title'] = 'PMO Admin Panel | Dashboard';
	        $data_msg['page_name'] = 'qc-agent';
	        $data_msg['qcagent'] =\DB::select("SELECT * FROM `tbl_mast_qcagent` cm, tbl_mast_country cn WHERE cm.QCAGENT_COUNTRY = cn.CNT_ID && cm.IS_ACTIVE = 0");
	        $data_msg['all_user_count'] = \DB::select("SELECT count(QCAGENT_ID) as `all_user` FROM `tbl_mast_qcagent`");
	        $data_msg['sus_user_count'] = \DB::select("SELECT count(QCAGENT_ID) as `sus_user` FROM `tbl_mast_qcagent` WHERE IS_ACTIVE = '0'");
			$data_msg['filter'] = 'suspend';
	        $this->layout = \View::make('admin.qc-agent',$data_msg);
			}
			else
			{
			$data_msg = array();
	        $data_msg['page_title'] = 'PMO Admin Panel | Dashboard';
	        $data_msg['page_name'] = 'qc-agent';
	        $data_msg['qcagent'] =\DB::select("SELECT * FROM `tbl_mast_qcagent` cm, tbl_mast_country cn WHERE cm.QCAGENT_COUNTRY = cn.CNT_ID");
	        $data_msg['all_user_count'] = \DB::select("SELECT count(QCAGENT_ID) as `all_user` FROM `tbl_mast_qcagent`");
	        $data_msg['sus_user_count'] = \DB::select("SELECT count(QCAGENT_ID) as `sus_user` FROM `tbl_mast_qcagent` WHERE IS_ACTIVE = '0'");
			$data_msg['filter'] = 'all';
			$this->layout = \View::make('admin.qc-agent',$data_msg);
			}
		}
		if (\Request::isMethod('post'))
		{
			$name = \Input::get('name');
			$email = \Input::get('email');
			$page_filter =\Input::get('page_filter');

				$data_msg = array();
		        $data_msg['page_title'] = 'PMO Admin Panel | Dashboard';
		        $data_msg['page_name'] = 'qc-agent';
		        $data_msg['all_user_count'] = \DB::select("SELECT count(QCAGENT_ID) as `all_user` FROM `tbl_mast_qcagent`");
		        $data_msg['sus_user_count'] = \DB::select("SELECT count(QCAGENT_ID) as `sus_user` FROM `tbl_mast_qcagent` WHERE IS_ACTIVE = '0'");
		        $data_msg['filter'] = $page_filter;

			$sql=("SELECT * FROM tbl_mast_qcagent JOIN tbl_mast_country ON tbl_mast_country.CNT_ID = tbl_mast_qcagent.QCAGENT_COUNTRY WHERE  tbl_mast_qcagent.ACCOUNT_ID!='' ");
		    if($name !='')
			{
			$sql.=" AND tbl_mast_qcagent.QCAGENT_NAME LIKE '%$name%'";	
			}	
			if($email !='')
			{
			$sql.=" AND tbl_mast_qcagent.QCAGENT_EMAIL LIKE '%$email%'";	
			}	
			if($page_filter=='suspend'){
				$sql.=" AND tbl_mast_qcagent.IS_ACTIVE='0'";	
			}
			$data_msg['qcagent']=\DB::select($sql);
			
			$this->layout = \View::make('admin.qc-agent',$data_msg);

		}
		}
		else
		{
			return \Redirect::to('/logout');
		}


	}

	public function suspendQc($id=null)
	{
		//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$val = \DB::table('tbl_mast_qcagent')->where('QCAGENT_ID', $id)->first();
		$act =  $val->IS_ACTIVE;
		if($act==1)
		{
			\DB::table('tbl_mast_qcagent')->where('QCAGENT_ID','=',$id)->update(array('IS_ACTIVE'=> 0));
		}
		if ($act==0) 
		{
			\DB::table('tbl_mast_qcagent')->where('QCAGENT_ID','=',$id)->update(array('IS_ACTIVE'=> 1));
		}		
		return \Redirect::back();
		}
		else
		{
			return \Redirect::to('/logout');
		}

	}



	public function showwarehouse()
	{
		//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{	
	$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Dashboard';
        $data_msg['page_name'] = 'warehouse-list';
	$this->layout = \View::make('admin.warehouse',$data_msg);
		}
		else
		{
			return \Redirect::to('/logout');
		}
	}


	public function showsupplier($msg=null)
	{
		//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
		$data_msg['page_title'] = 'PMO Admin Panel | Dashboard';
		$data_msg['page_name'] = 'Supplier';
		$data_msg['all_user_count'] = \DB::select("SELECT count(SUPPLIER_ID) as `all_user` FROM `tbl_mast_supplier`");
		$data_msg['sus_user_count'] = \DB::select("SELECT count(SUPPLIER_ID) as `sus_user` FROM `tbl_mast_supplier` WHERE IS_ACTIVE = '0'");
		$accttype = 'all';
		
			$namesearch = \Input::get('name_search');
			$emailsearch = \Input::get('email_search');
			$accttype = \Input::get('viewaccttype');	
			$querywhere="SELECT * FROM `tbl_mast_supplier` JOIN `tbl_mast_country` ON tbl_mast_country.CNT_ID=tbl_mast_supplier.SUPPLIER_COUNTRY  WHERE  tbl_mast_supplier.ACCOUNT_ID!=''";			
			
			if($namesearch !='')
			{
			$querywhere.=" AND tbl_mast_supplier.SUPPLIER_NAME LIKE '%$namesearch%'";	
			}	
			if($emailsearch !='')
			{
			$querywhere.=" AND tbl_mast_supplier.SUPPLIER_EMAIL='$emailsearch'";	
			}
			if($accttype=='suspended')
			{
			$querywhere.=" AND tbl_mast_supplier.IS_ACTIVE='0'";			
			}
			$order_by_sql=" ORDER BY tbl_mast_supplier.SUPPLIER_NAME ";
		        $data_msg['supplier']=\DB::select($querywhere.$order_by_sql);
				$data_msg['namesearch']=$namesearch;
				$data_msg['emailsearch']=$emailsearch;
				$this->layout = \View::make('admin.supplier',$data_msg,array('acct_type'=>$accttype));

		}
		else
			{
				return \Redirect::to('/logout');
			}
	}
	



	public function suspendSupplier($id=null)
	{
	//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$val = \DB::table('tbl_mast_supplier')->where('SUPPLIER_ID', $id)->first();
		$act =  $val->IS_ACTIVE;
		if($act==1)
		{
			\DB::table('tbl_mast_supplier')->where('SUPPLIER_ID','=',$id)->update(array('IS_ACTIVE'=> 0));
		}
		if ($act==0) 
		{
			\DB::table('tbl_mast_supplier')->where('SUPPLIER_ID','=',$id)->update(array('IS_ACTIVE'=> 1));
		}
		return \Redirect::back();
		}
		else
		{
			return \Redirect::to('/logout');
		}
	}

//-----------------------------------------------------------
	public function showenvironment()
	{
		//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Dashboard';
        $data_msg['page_name'] = 'environment';
		$this->layout = \View::make('admin.environment',$data_msg);
		}
		else
		{
			return \Redirect::to('/logout');
		}
	}
	public function showsettings()
	{
		//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Dashboard';
        $data_msg['page_name'] = 'settings';
		$this->layout = \View::make('admin.settings',$data_msg);
		}
		else
		{
			return \Redirect::to('/logout');
		}
	}
	public function shownews()
	{
		//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Dashboard';
        $data_msg['page_name'] = 'news';
		$this->layout = \View::make('admin.manage-news',$data_msg);
		}
		else
		{
			return \Redirect::to('/logout');
		}
	}
	public function showticket()
	{
		//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
		$data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Dashboard';
        $data_msg['page_name'] = 'ticket';
		$this->layout = \View::make('admin.manage-ticket',$data_msg);
		}
		else
		{
			return \Redirect::to('/logout');
		}
	}

}
