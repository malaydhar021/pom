<?php

namespace admin;

class CustomerController extends \BaseController {

    public function editcustomer($id) {
			//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
        $data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Edit Customer';
        $data_msg['page_name'] = 'edit-customer';
        $data_msg['country'] = \DB::select('SELECT * FROM `tbl_mast_country`');
        $data_msg['menu'] = \DB::select("SELECT * FROM `tbl_cfg_mast_menu` mm, `tbl_mast_role_menu_map` rmm,`tbl_mast_role` r 
          WHERE  mm.MENU_ID = rmm.MENU_ID 
          AND rmm.USER_ROLE_ID = r.ROLE_ID 
          AND r.ROLE_ID = '2' 
          AND r.IS_SYS_ROLE = 1 
          AND r.ACCOUNT_ID = 0 
          ORDER BY mm.MENU_SEQUENCE");
        //$data_msg['cust_menu_items']=\DB::select("SELECT m.* FROM tbl_cfg_mast_menu m,tbl_mast_role_menu_map rmm,tbl_mast_user_role_map urm,tbl_mast_role r WHERE urm.USER_ID = '$id' AND urm.ROLE_ID = r.ROLE_ID AND r.ROLE_ID = rmm.USER_ROLE_ID AND rmm.MENU_ID = m.MENU_ID");
        
         //fixed md   
        $data_msg['cust_menu_items']=\DB::select("SELECT * FROM tbl_mast_role_menu_map 
        JOIN tbl_mast_user_role_map ON tbl_mast_role_menu_map.USER_ROLE_ID = tbl_mast_user_role_map.ROLE_ID 
        JOIN tbl_mast_app_user ON tbl_mast_app_user.USER_ID = tbl_mast_user_role_map.USER_ID 
        JOIN tbl_mast_customer ON tbl_mast_app_user.ACCOUNT_ID = tbl_mast_customer.ACCOUNT_ID 
        WHERE tbl_mast_customer.CUSTOMER_ID = $id");



        $data_msg['cust_info']=\DB::select("SELECT * FROM tbl_mast_customer JOIN tbl_mast_country ON tbl_mast_country.CNT_ID = tbl_mast_customer.CUSTOMER_COUNTRY 
        WHERE tbl_mast_customer.CUSTOMER_ID = '$id'");
        $this->layout = \View::make('admin.edit-customer', $data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
		
    }
    public function editcustomer_post($id){
      
	//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
      // $fetch_roal_id=\DB::table('tbl_mast_user_role_map')->select('ROLE_ID')->where('USER_ID','=',$id)->first();
      

       $customer_name = $_POST['customer_name'];
       $email =  $_POST['email'];
       $company_name = $_POST['company_name'];
       $cust_address = $_POST['cust_address'];
       $cust_country = $_POST['cust_country'];
       $cust_zip = $_POST['cust_zip'];

        $cust_privilage=\Input::get('checkboxes');
       //checkbox validation 
       if(empty($cust_privilage)){
        return \Redirect::back()->with('error','Select Privelage');
       }

       $sql = \DB::table('tbl_mast_customer')->where('CUSTOMER_ID','=',$id)->update(array('CUSTOMER_NAME'=>$customer_name,'CUSTOMER_EMAIL'=>$email,'CUSTOMER_COMPANY_NAME'=>$company_name,'CUSTOMER_ADDRESS'=>$cust_address,'CUSTOMER_COUNTRY'=>$cust_country,'CUSTOMER_ZIP'=>$cust_zip));
       
        //select roal id   
      $roal_id=\DB::select("SELECT tbl_mast_role.ROLE_ID FROM tbl_mast_role_menu_map JOIN tbl_mast_role ON tbl_mast_role_menu_map.USER_ROLE_ID = tbl_mast_role.ROLE_ID JOIN tbl_mast_user_role_map ON tbl_mast_user_role_map.ROLE_ID = tbl_mast_role.ROLE_ID JOIN tbl_mast_app_user ON tbl_mast_app_user.USER_ID= tbl_mast_user_role_map.USER_ID JOIN tbl_mast_customer ON tbl_mast_app_user.ACCOUNT_ID = tbl_mast_customer.ACCOUNT_ID WHERE tbl_mast_customer.CUSTOMER_ID = $id GROUP BY tbl_mast_role.ROLE_ID");
      //stringconverted MD
      $select_roal_id=$roal_id[0]->ROLE_ID;
      
      
      //select menu ids 
      $selected_menu_id=\DB::select("SELECT tbl_mast_role_menu_map.MENU_ID FROM tbl_mast_role_menu_map JOIN tbl_mast_role ON tbl_mast_role_menu_map.USER_ROLE_ID = tbl_mast_role.ROLE_ID JOIN tbl_mast_user_role_map ON tbl_mast_user_role_map.ROLE_ID = tbl_mast_role.ROLE_ID JOIN tbl_mast_app_user ON tbl_mast_app_user.USER_ID= tbl_mast_user_role_map.USER_ID JOIN tbl_mast_customer ON   tbl_mast_app_user.ACCOUNT_ID = tbl_mast_customer.ACCOUNT_ID WHERE tbl_mast_customer.CUSTOMER_ID = $id");
       
     //delete roall menu map ids
    $delete_roal_menu_map=\DB::table('tbl_mast_role_menu_map')->where('USER_ROLE_ID','=',$select_roal_id)->delete();

       foreach($cust_privilage as $data){
           $insert_cust_privilage=\DB::table('tbl_mast_role_menu_map')->insert(array('USER_ROLE_ID'=>$select_roal_id,'MENU_ID'=>$data));
       }

/*
       $update_roal_map_delete=\DB::table('tbl_mast_role_menu_map')->where('USER_ROLE_ID','=',$fetch_roal_id->ROLE_ID)->delete();
       foreach($cust_privilage as $data){
           $insert_cust_privilage=\DB::table('tbl_mast_role_menu_map')->insert(array('USER_ROLE_ID'=>$fetch_roal_id->ROLE_ID,'MENU_ID'=>$data));
       }*/
       return \Redirect::to('customer')->with('success','Customer Updated');
	}
		else
		{
			return \Redirect::to('/logout');
		}
    }

     public function viewcustomer($id) {
		 	//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
        $data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | View Customer';
        $data_msg['page_name'] = 'view-customer';
        $data_msg['id'] = $id;
        $data_msg['customer_detail'] = \DB::select("SELECT * FROM `tbl_mast_customer` cm, tbl_mast_country cn WHERE cm.CUSTOMER_ID = '$id' AND cm.CUSTOMER_COUNTRY = cn.CNT_ID");
        
        $data_msg['menu'] = \DB::select("SELECT * FROM `tbl_cfg_mast_menu` mm, `tbl_mast_role_menu_map` rmm,`tbl_mast_role` r 
          WHERE  mm.MENU_ID = rmm.MENU_ID 
          AND rmm.USER_ROLE_ID = r.ROLE_ID 
          AND r.ROLE_ID = '2' 
          AND r.IS_SYS_ROLE = 1 
          AND r.ACCOUNT_ID = 0 
          ORDER BY mm.MENU_SEQUENCE");
        
       
        //fixed md   
        $data_msg['cust_menu_items']=\DB::select("SELECT * FROM tbl_mast_role_menu_map 
        JOIN tbl_mast_user_role_map ON tbl_mast_role_menu_map.USER_ROLE_ID = tbl_mast_user_role_map.ROLE_ID 
        JOIN tbl_mast_app_user ON tbl_mast_app_user.USER_ID = tbl_mast_user_role_map.USER_ID 
        JOIN tbl_mast_customer ON tbl_mast_app_user.ACCOUNT_ID = tbl_mast_customer.ACCOUNT_ID 
        WHERE tbl_mast_customer.CUSTOMER_ID = $id");


        $this->layout = \View::make('admin.view-customer', $data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
		
    }
    public function suspendcustomer($id=null)
    {
			//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{

        // $suspend_customer=\DB::table('tbl_mast_customer')->where('CUSTOMER_ID','=',$id)->update(array('IS_ACTIVE'=>'0'));
        // return \Redirect::to('customer')->with('success','Customer Suspended');


        $val = \DB::table('tbl_mast_customer')->where('CUSTOMER_ID', $id)->first();
    
        $act =  $val->IS_ACTIVE;
        if($act==1)
        {
          \DB::table('tbl_mast_customer')->where('CUSTOMER_ID','=',$id)->update(array('IS_ACTIVE'=> 0));
        }
        if ($act==0) 
        {
          \DB::table('tbl_mast_customer')->where('CUSTOMER_ID','=',$id)->update(array('IS_ACTIVE'=> 1));
        }

        
        return \Redirect::back();
		}
			else
		{
			return \Redirect::to('/logout');
		}
		
    }
    

    public function shownew_customer() {
			//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
        $data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Environment';
        $data_msg['page_name'] = 'new-customer';
         $data_msg['menu'] = \DB::select("SELECT * FROM `tbl_cfg_mast_menu` mm, `tbl_mast_role_menu_map` rmm,`tbl_mast_role` r 
          WHERE  mm.MENU_ID = rmm.MENU_ID 
          AND rmm.USER_ROLE_ID = r.ROLE_ID 
          AND r.ROLE_ID = '2' 
          AND r.IS_SYS_ROLE = 1 
          AND r.ACCOUNT_ID = 0 
          ORDER BY mm.MENU_SEQUENCE");
         $data_msg['country'] = \DB::select('SELECT * FROM `tbl_mast_country`');
         
        $this->layout = \View::make('admin.new-customer', $data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
    }

    /*public function suspendcustomer($id = '') {
        \DB::select('CALL PRC_SUSPEND_CUSTOMER(?)', array($id));
        return \Redirect::to('customer');
    }*/
    
    public function customercreater(){
			//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
        
		$customer_name =trim(\Input::get('customer_name'));
		$email =trim(\Input::get('email'));
		$company_name = trim(\Input::get('company_name'));
		$cust_address =trim(\Input::get('cust_address'));
		$cust_country =trim(\Input::get('cust_country'));
		$cust_zip = trim(\Input::get('cust_zip'));
		$cust_privilage=\Input::get('checkboxes');

   
	             //checkbox validation 
       if(empty($cust_privilage)){
		   $sucessmessage='<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Please Select Privelage !</strong> </div>';
		
		 return \Redirect::back()->withInput()->with('success',$sucessmessage);  
       }
				$mainservices = \DB::select("SELECT * FROM `tbl_mast_app_user` WHERE USER_EMAIL = '".$email."' ");
				if(!empty($mainservices))//If found the same data 
				{
					$sucessmessage='<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Customer Email already exists !</strong> </div>';
					return \Redirect::back()->withInput()->with('success',$sucessmessage);  
				}
				else
				{
					

        $account_insert_array = array(
           'ACCOUNT_TYPE_ID'=>'3',
           'ACCOUNT_TYPE_NAME'=>'Customer ADMIN'
           );
       $sql_account = \DB::table('tbl_cfg_mast_app_account')->insert($account_insert_array);
       $account_id = \DB::table('tbl_cfg_mast_app_account')->max('ACCOUNT_ID');
       $customer_indert_array = array(
           'ACCOUNT_ID'=>$account_id,
           'CUSTOMER_NAME'=>$customer_name,
           'CUSTOMER_EMAIL'=>$email,
           'CUSTOMER_COMPANY_NAME'=>$company_name,
           'CUSTOMER_ADDRESS'=>$cust_address,
           'CUSTOMER_COUNTRY'=>$cust_country,
           'CUSTOMER_ZIP'=>$cust_zip,
           'CREATED_AT'=> date("Y-m-d h:m:s")
               );
       $sql = \DB::table('tbl_mast_customer')->insert($customer_indert_array);
       
       $last_insert_fwrd_id=\DB::table('tbl_mast_customer')->max('CUSTOMER_ID');
       
       $app_user_insert_array = array(
           'ACCOUNT_ID'=> $account_id,
           'USER_NAME'=>$customer_name,
           'USER_EMAIL'=>$email,
           'PASSWORD'=>'12345',
           'USER_TYPE'=>'3',
           'USER_COMPANY_NAME'=>$company_name,
           'USER_ADDRESS'=>$cust_address,
           'USER_COUNTRY'=>$cust_country,
           'USER_ZIP'=>$cust_zip,
           'CREATED_AT'=> date("Y-m-d h:m:s")
          );
       $insert_into_app_user=\DB::table('tbl_mast_app_user')->insert($app_user_insert_array);
       $app_user_insert_id = \DB::table('tbl_mast_app_user')->max('USER_ID');
       
       $usr_roll_name='customer_admin_role_'.$account_id;
       
       $insert_into_role=\DB::table('tbl_mast_role')->insert(array('USER_TYPE_ID'=>3,'USER_ROLE_NAME'=>$usr_roll_name,'IS_SYS_ROLE'=>'0','ACCOUNT_ID'=>$account_id));
       $roal_id=\DB::table('tbl_mast_role')->max('ROLE_ID');
       $user_mst_roal_map=\DB::table('tbl_mast_user_role_map')->insert(array('USER_ID'=>$app_user_insert_id,'ROLE_ID'=>$roal_id));
       
       foreach($cust_privilage as $data){
           $insert_fwrd_privilage=\DB::table('tbl_mast_role_menu_map')->insert(array('USER_ROLE_ID'=>$roal_id,'MENU_ID'=>$data));
       }
       


//ACCOUNT_ID 	CUSTOMER_NAME 	CUSTOMER_EMAIL 	CUSTOMER_COMPANY_NAME 	CUSTOMER_ADDRESS 	CUSTOMER_COUNTRY 	CUSTOMER_ZIP 	CUSTOMER_PRIVILAGE 	CUSTOMER_STATUS 	CREATED_BY 	UPDATED_BY 	DELETED_BY 	CREATED_AT 	UPDATED_AT 	DELETED_AT
       //=> [checkboxes] => Array ( [0] => value [1] => value [2] => value [3] => value [4] => value [5] => value [6] => value [7] => value [8] => value [9] => value
		/*$rules = array(
				'customer_name'  => 'required|Max:100',
				'email' => 'required|Between:3,100|email|unique:tbl_mast_customer,CUSTOMER_EMAIL',
				'company_name' => 'required|Max:100',
				'cust_address' => 'required',
				'cust_country' => 'required',
				'cust_zip' => 'required|Max:10'
			);
			$validator = \Validator::make(\Input::all(), $rules);
			 if ($validator->fails()){
			 	$messages = $validator->messages();
				return \Redirect::to('new-customer')
					->withErrors($validator);					
			 }else{			 
			 	$all=\Input::all();
				$data = array($all['customer_name'],$all['email'],$all['company_name'],$all['cust_address'],$all['cust_country'],$all['cust_zip']);
    		 \DB::select('CALL PRC_CUSTOMER_CREATER (?,?,?,?,?,?)',$data);   
   */
  /* foreach($all['checkboxes'] as $value){
     \DB::select('CALL PRC_INSERT_MENU_MAPPING (?,?,?)',array(1,$id[0]->INSERT_ID,$value));
    }*/   
   								
				
				return \Redirect::to('customer')->with('success','Customer Created');
			 }
		}
			else
		{
			return \Redirect::to('/logout');
		}
	}

}
