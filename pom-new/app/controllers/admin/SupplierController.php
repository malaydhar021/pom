<?php
namespace admin;
class SupplierController extends \BaseController {
	public function view_supplier($id=null)
  {
	//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{

    $data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | View supplier';
        $data_msg['page_name'] = 'view-supplier';
        $data_msg['supplier_detail'] = \DB::select("SELECT * FROM `tbl_mast_supplier` cm, tbl_mast_country cn WHERE cm.SUPPLIER_ID = '$id' AND cm.SUPPLIER_COUNTRY = cn.CNT_ID");
        $data_msg['menu'] = \DB::select("SELECT * FROM `tbl_cfg_mast_menu` mm, `tbl_mast_role_menu_map` rmm,`tbl_mast_role` r WHERE  mm.MENU_ID = rmm.MENU_ID AND rmm.USER_ROLE_ID = r.ROLE_ID AND r.ROLE_ID = '4' AND r.IS_SYS_ROLE = 1 
          AND r.ACCOUNT_ID = 0 
          ORDER BY mm.MENU_SEQUENCE");
       // $data_msg['for_menu_items']=\DB::select("SELECT m.* FROM tbl_cfg_mast_menu m,tbl_mast_role_menu_map rmm,tbl_mast_user_role_map urm,tbl_mast_role r WHERE urm.USER_ID = '$id' AND urm.ROLE_ID = r.ROLE_ID AND r.ROLE_ID = rmm.USER_ROLE_ID AND rmm.MENU_ID = m.MENU_ID");
  
   //fixed md   
        $data_msg['for_menu_items']=\DB::select("SELECT * FROM tbl_mast_role_menu_map 
        JOIN tbl_mast_user_role_map ON tbl_mast_role_menu_map.USER_ROLE_ID = tbl_mast_user_role_map.ROLE_ID 
        JOIN tbl_mast_app_user ON tbl_mast_app_user.USER_ID = tbl_mast_user_role_map.USER_ID 
        JOIN tbl_mast_supplier ON tbl_mast_app_user.ACCOUNT_ID = tbl_mast_supplier.ACCOUNT_ID 
        WHERE tbl_mast_supplier.SUPPLIER_ID = $id");



        $this->layout = \View::make('admin.view-supplier',$data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
	}


//amit----------------------------1.21

	public function edit_supplier($id)
  {
	  	//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
  $data_msg = array();
        $data_msg['page_title'] = 'PMO Admin Panel | Edit supplier';
        $data_msg['page_name'] = 'edit-supplier';
        $data_msg['country'] = \DB::select('SELECT * FROM `tbl_mast_country`');
        $data_msg['menu'] = \DB::select("SELECT * FROM `tbl_cfg_mast_menu` mm, `tbl_mast_role_menu_map` rmm,`tbl_mast_role` r WHERE  mm.MENU_ID = rmm.MENU_ID AND rmm.USER_ROLE_ID = r.ROLE_ID AND r.ROLE_ID = '4' AND r.IS_SYS_ROLE = 1 
          AND r.ACCOUNT_ID = 0 
          ORDER BY mm.MENU_SEQUENCE");

        //$data_msg['for_menu_items']=\DB::select("SELECT m.* FROM tbl_cfg_mast_menu m,tbl_mast_role_menu_map rmm,tbl_mast_user_role_map urm,tbl_mast_role r WHERE urm.USER_ID = '$id' AND urm.ROLE_ID = r.ROLE_ID AND r.ROLE_ID = rmm.USER_ROLE_ID AND rmm.MENU_ID = m.MENU_ID");
       // $data_msg['for_menu_items']=\DB::select("SELECT m.* FROM tbl_cfg_mast_menu m,tbl_mast_role_menu_map rmm,tbl_mast_user_role_map urm,tbl_mast_role r WHERE urm.USER_ID = '$id' AND urm.ROLE_ID = r.ROLE_ID AND r.ROLE_ID = rmm.USER_ROLE_ID AND rmm.MENU_ID = m.MENU_ID");

         //fixed md   
        $data_msg['for_menu_items']=\DB::select("SELECT * FROM tbl_mast_role_menu_map 
        JOIN tbl_mast_user_role_map ON tbl_mast_role_menu_map.USER_ROLE_ID = tbl_mast_user_role_map.ROLE_ID 
        JOIN tbl_mast_app_user ON tbl_mast_app_user.USER_ID = tbl_mast_user_role_map.USER_ID 
        JOIN tbl_mast_supplier ON tbl_mast_app_user.ACCOUNT_ID = tbl_mast_supplier.ACCOUNT_ID 
        WHERE tbl_mast_supplier.SUPPLIER_ID = $id");




        $data_msg['for_info']=\DB::select("SELECT * FROM tbl_mast_supplier JOIN tbl_mast_country ON tbl_mast_country.CNT_ID = tbl_mast_supplier.SUPPLIER_COUNTRY 
        WHERE tbl_mast_supplier.SUPPLIER_ID = '$id'");


  
        $this->layout = \View::make('admin.edit-supplier',$data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
  
  }


   public function editsupplierPost($id)
   {
	   	//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
  
       /*    $data_msg =\DB::table('tbl_mast_supplier')
          ->join('tbl_mast_app_user','tbl_mast_app_user.ACCOUNT_ID','=','tbl_mast_supplier.ACCOUNT_ID')
          ->join('tbl_mast_user_role_map','tbl_mast_app_user.USER_ID','=','tbl_mast_user_role_map.USER_ID')
          ->where('tbl_mast_supplier.SUPPLIER_ID','=',$id)
          ->first();
      */
         //  echo $data_msg->ROLE_ID;
         // die();

       $customer_name = $_POST['customer_name'];
       $email =  $_POST['email'];
       $company_name = $_POST['company_name'];
       $cust_address = $_POST['cust_address'];
       $cust_country = $_POST['cust_country'];
       $cust_zip = $_POST['cust_zip'];
       //$cust_privilage=$_POST['checkboxes'];

      $cust_privilage=\Input::get('checkboxes');
       //checkbox validation 
       if(empty($cust_privilage)){
        return \Redirect::back()->with('error','Select Privelage');
       }

       $sql = \DB::table('tbl_mast_supplier')->where('SUPPLIER_ID','=',$id)->update(array('SUPPLIER_NAME'=>$customer_name,'SUPPLIER_EMAIL'=>$email,'SUPPLIER_COMPANY_NAME'=>$company_name,'SUPPLIER_ADDRESS'=>$cust_address,'SUPPLIER_COUNTRY'=>$cust_country,'SUPPLIER_ZIP'=>$cust_zip));
       
      //select roal id   
      $roal_id=\DB::select("SELECT tbl_mast_role.ROLE_ID FROM tbl_mast_role_menu_map JOIN tbl_mast_role ON tbl_mast_role_menu_map.USER_ROLE_ID = tbl_mast_role.ROLE_ID JOIN tbl_mast_user_role_map ON tbl_mast_user_role_map.ROLE_ID = tbl_mast_role.ROLE_ID JOIN tbl_mast_app_user ON tbl_mast_app_user.USER_ID= tbl_mast_user_role_map.USER_ID JOIN tbl_mast_supplier ON tbl_mast_app_user.ACCOUNT_ID = tbl_mast_supplier.ACCOUNT_ID WHERE tbl_mast_supplier.SUPPLIER_ID = $id GROUP BY tbl_mast_role.ROLE_ID");
      //stringconverted MD
      $select_roal_id=$roal_id[0]->ROLE_ID;
      
      
      //select menu ids 
      $selected_menu_id=\DB::select("SELECT tbl_mast_role_menu_map.MENU_ID FROM tbl_mast_role_menu_map JOIN tbl_mast_role ON tbl_mast_role_menu_map.USER_ROLE_ID = tbl_mast_role.ROLE_ID JOIN tbl_mast_user_role_map ON tbl_mast_user_role_map.ROLE_ID = tbl_mast_role.ROLE_ID JOIN tbl_mast_app_user ON tbl_mast_app_user.USER_ID= tbl_mast_user_role_map.USER_ID JOIN tbl_mast_supplier ON   tbl_mast_app_user.ACCOUNT_ID = tbl_mast_supplier.ACCOUNT_ID WHERE tbl_mast_supplier.SUPPLIER_ID = $id");
       
     //delete roall menu map ids
    $delete_roal_menu_map=\DB::table('tbl_mast_role_menu_map')->where('USER_ROLE_ID','=',$select_roal_id)->delete();

       foreach($cust_privilage as $data){
           $insert_fwrd_privilage=\DB::table('tbl_mast_role_menu_map')->insert(array('USER_ROLE_ID'=>$select_roal_id,'MENU_ID'=>$data));
       }


       return \Redirect::to('supplier')->with('success','Supplier Updated');
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
          $data_msg['menu'] = \DB::select("SELECT * FROM `tbl_cfg_mast_menu` mm, `tbl_mast_role_menu_map` rmm,`tbl_mast_role` r 
            WHERE  mm.MENU_ID = rmm.MENU_ID 
            AND rmm.USER_ROLE_ID = r.ROLE_ID 
            AND r.ROLE_ID = '4' 
            AND r.IS_SYS_ROLE = 1 
          AND r.ACCOUNT_ID = 0 
          ORDER BY mm.MENU_SEQUENCE");
         $data_msg['country'] = \DB::select('SELECT * FROM `tbl_mast_country`');
       
	$this->layout = \View::make('admin.new-supplier',$data_msg);
		}
			else
		{
			return \Redirect::to('/logout');
		}
	}
       
  public function save_new_supplier()
  {
	  
   	//Login and Module Permission Checker
		if(ModulePermissionChecker()=='1'&&PostLoginChecker()=='1')
		{
//---------------------------------------------------------------------------//
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
					$sucessmessage='<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Supplier Email already exists !</strong> </div>';
					return \Redirect::back()->withInput()->with('success',$sucessmessage);  
				}
				else
				{
       $account_insert_array = array(
           'ACCOUNT_TYPE_ID'=>'4',
           'ACCOUNT_TYPE_NAME'=>'SUPPLIER ADMIN'
           );
       $sql_account = \DB::table('tbl_cfg_mast_app_account')->insert($account_insert_array);
       $account_id = \DB::table('tbl_cfg_mast_app_account')->max('ACCOUNT_ID');
       $supplier_indert_array = array(
           'ACCOUNT_ID'=>$account_id,
           'SUPPLIER_NAME'=>$customer_name,
           'SUPPLIER_EMAIL'=>$email,
           'SUPPLIER_COMPANY_NAME'=>$company_name,
           'SUPPLIER_ADDRESS'=>$cust_address,
           'SUPPLIER_COUNTRY'=>$cust_country,
           'SUPPLIER_ZIP'=>$cust_zip,
           'CREATED_AT'=> date("Y-m-d h:m:s")
               );
       $sql = \DB::table('tbl_mast_supplier')->insert($supplier_indert_array);
       
       $last_insert_supplier_id=\DB::table('tbl_mast_supplier')->max('SUPPLIER_ID');
       
       $app_user_insert_array = array(
           'ACCOUNT_ID'=> $account_id,
           'USER_NAME'=>$customer_name,
           'USER_EMAIL'=>$email,
           'PASSWORD'=>'12345',
           'USER_TYPE'=>'3',//fixed
           'USER_COMPANY_NAME'=>$company_name,
           'USER_ADDRESS'=>$cust_address,
           'USER_COUNTRY'=>$cust_country,
           'USER_ZIP'=>$cust_zip,
           'CREATED_AT'=> date("Y-m-d h:m:s")
          );
       $insert_into_app_user=\DB::table('tbl_mast_app_user')->insert($app_user_insert_array);
       $app_user_insert_id = \DB::table('tbl_mast_app_user')->max('USER_ID');
       
       $usr_roll_name='supplier_admin_role_'.$account_id;
       
       $insert_into_role=\DB::table('tbl_mast_role')->insert(array('USER_TYPE_ID'=>3,'USER_ROLE_NAME'=>$usr_roll_name,'IS_SYS_ROLE'=>'0','ACCOUNT_ID'=>$account_id));
       $roal_id=\DB::table('tbl_mast_role')->max('ROLE_ID');
       $user_mst_roal_map=\DB::table('tbl_mast_user_role_map')->insert(array('USER_ID'=>$app_user_insert_id,'ROLE_ID'=>$roal_id));
       
       foreach($cust_privilage as $data){
           $insert_fwrd_privilage=\DB::table('tbl_mast_role_menu_map')->insert(array('USER_ROLE_ID'=>$roal_id,'MENU_ID'=>$data));
       }

        return \Redirect::to('supplier')->with('success','Supplier Created');
				}
		}
			else
		{
			return \Redirect::to('/logout');
		}

  }




}