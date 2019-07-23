@include('pomfrontend.includes.header')
@include('pomfrontend.includes.sidebar')
<style>
.deletesec{background:none; background:url(img/deletepic.png) no-repeat; border:none; float:left; margin-right:2px; width:24px; height:24px;}
.editsec{background:none; background:url(img/editpic.png) no-repeat; border:none; float:left; margin-right:2px; width:24px; height:24px;}
.viewsec{background:none; background:url(img/viewpic.png) no-repeat; border:none; float:left; margin-right:2px; width:24px; height:24px;}
.confirmsec{background:none; background:url(img/confirmpic.png) no-repeat; border:none; float:left; margin-right:2px; width:24px; height:24px;}
.send_for_approval{background:none; background:url(img/send_for_approval.png) no-repeat; border:none; float:left; margin-right:2px; width:24px; height:24px;}
</style>
<body id="page-top" class="index">
<!-- Navigation -->
@include('pomfrontend.includes.navbar')
<!-- Header -->
<!--exp md-->
<div class="container-fluid">
  <div class="side-body">
<header>
<div class="container">
  <div class="row">
      <div class="col-lg-12">
        <ul class="top-menu">
          <li class="active"><a href="<?php echo URL::to('/');?>/po-overview">PO Overview</a></li>
          <li><a href="<?php echo URL::to('/');?>/create-purchase-order">Add a PO</a></li>
        </ul>
      </div>
    </div>
    </div>
</header>
<!-- Portfolio Grid Section -->
<div class="container dashboard-page" style="min-height:500px;">
<!--<div class="row">
  
    <div class="col-lg-12">
      <div class="status-menu-box">
        <ul class="status-menu">
          <li>STATUS</li>
          <?php 
          /*
          $all = '';
          foreach($fw_status_count as $data) { 
$all = $all + $data->PO_COUNT;

}
          ?>
          <li class="all <?php if($page_filter == 'all') echo 'active'; ?>"><a href="#" onClick="return showall('all');">All</a><div class="badge bg-danger">{{$all}}</div></li>
          <?php 
          foreach($fw_status_count as $data) { ?>
<li class="<?php if($page_filter == $data->STATUS_NAME) echo 'active'; ?>"><a href="#" onClick="return showall('{{$data->STATUS_NAME}}');">{{$data->STATUS_NAME}}</a><div class="badge bg-danger">{{$data->PO_COUNT}}</div></li>
         <?php }*/ ?>

          
          
        </ul>
        <div class="clearfix"></div>
      </div>
    </div>

  </div>-->
  
  <div class="clearfix"></div>
  <div class="spacer"></div>
   <div class="row">
    <form class="form-inline" role="form" method='POST'>
    <!-- form is here -->
      <div class="extendsearch col-lg-1">
        <p style="color:#CE7243; line-height:20px;"><a href="javascript:void(0);"  style="color:#CE7243; font-size:12px;" onClick="extrafilter();"><strong>Filters </strong><i class="fa fa-chevron-circle-down" id="search_icon"></i></a>
           </p>
      </div>
      
      <div class="col-lg-11 searchboxex">
        <div class="col-lg-1">
          <div class="form-group">
            <label for="usr">PO N&deg;:</label>
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <input type="text" class="form-control" name="" id="po_n">
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <label for="usr">Customer:</label>
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <input type="text" class="form-control" id="customer">
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <label for="usr">Shipper:</label>
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <input type="text" class="form-control" id="shipper">
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <label for="usr">PO Date:</label>
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <input type="text" class="form-control datepicker" id="po_date">
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <label for="usr">Product PN:</label>
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <input type="text" class="form-control" id="product_pn">
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            
            <button class="btn btn-xs btn-info" type='button' id='search-button' name='search'>Search</button>
          </div>
        </div>
      </div>

      <!--hidden Fuild -->
      <div id="hiddensec">
        <div class="col-lg-11 searchboxex" style="margin-top:5px;">
          <div class="col-lg-1">
            <div class="form-group">
              <label for="usr">Pick-Up:</label>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <input type="text" class="form-control" id="pick_up">
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <label for="usr">POL:</label>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <input type="text" class="form-control" id="pol">
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <label for="usr">POD:</label>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <input type="text" class="form-control" id="pod">
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <label for="usr">Delivery Place:</label>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <input type="text" class="form-control" id="delivery_place">
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <label for="usr">Incoterm Origin:</label>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <input type="text" class="form-control" id="incoterm_origin">
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <label for="usr">Incoterm Destination:</label>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <input type="text" class="form-control" id="incotrm_destination">
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12 with-border"></div>
    </form>
    <div class="spacer"></div>
  </div>
  <div class="spacer"></div>

  <div>
<!--Validation-->
 @if(Session::has('success')) <br>
<div class="alert alert-success alert-dismissible fade in" id='alert-massage'>
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong>{{ Session::get('success') }} </strong>
</div>
@endif
</div>

  <div class="row">
    <div class="col-lg-9">
    <div class="over-flow-scroll">
       
      <table class="table" id="po">
        <tr class="all">
          <td class="green-bg">Status</td>
          <td class="blue-bg">PO Creation Date</td>
          <?php $user_account_type=\Session::get('account_type'); $user_account_type[0]->ACCOUNT_TYPE_ID ?>
          @if($user_account_type[0]->ACCOUNT_TYPE_ID == 2)
          <td class="blue-bg">Customer</td>
          @elseif($user_account_type[0]->ACCOUNT_TYPE_ID == 3)
          <td class="blue-bg">Forwarder</td>
          @endif
          <td class="blue-bg">Shipper</td>
          <td class="blue-bg">Consignee</td>
          <td class="blue-bg">PO N°</td>
          <td class="blue-cyan-bg">PO Date</td>
          <td class="blue-cyan-bg">Product PN</td>
          <td class="blue-cyan-bg">Product&nbsp;Name</td>
          <td class="blue-cyan-bg">Product Type </td>
          <td class="blue-cyan-bg">Product Qty</td>
          <td class="blue-cyan-bg">Product Value</td>
          <td class="blue-cyan-bg">Value Currency</td>
          <td class="cyan-bg">Gross Wt (kgs)</td>
          <td class="cyan-bg">Volume (cbm)</td>
          <td class="orrange-bg">Packing Type 1</td>
          <td class="orrange-bg">Nbr of  1</td>
          <td class="orrange-bg">Packing Type 2</td>
          <td class="orrange-bg">Nbr of 2</td>
          
          <td class="green-bg" style="width:200px;">Action</td>
        </tr>
        @foreach($po_overview as $data)
        <tr class="po-added">
          <td>{{$data->STATUS_NAME}}</td>
          <td id='po_creation_date'>{{$data->PO_CREATION_DATE}}</td>
          <td id='customer_name'>@if(empty($data->CUSTOMER_NAME)){{$data->FWDR_NAME}}@elseif(empty($data->FWDR_NAME)){{$data->CUSTOMER_NAME}}@endif</td>
          <td>{{$data->SHIPPER_NAME}}<input type='hidden' id='shipper_id' value='{{$data->SHIPPER_ID}}'></td>
          <td>{{$data->CONSINE_NAME}}<input type='hidden' id='consine_id' value='{{$data->CONSINE_ID}}'></td>
          <td id='po_num'>{{$data->PO_NUMBER}}</td>
          <td id='po_date_new'>{{$data->PO_DATE}}</td>
          <td id='po_product_pn'>{{$data->PO_PRODUCT_PN}}</td>
          <td id='po_product_name'>{{$data->PO_PRODUCT_NAME}}</td>
          <td id='po_product_type'>{{$data->PO_PRODUCT_TYPE}}</td>
          <td id='po_product_qty'>{{$data->PO_PRODUCT_QTY}}</td>
          <td id='po_product_value'>{{$data->PO_PRODUCT_VALUE}}</td>
          <td id='po_currency'>{{$data->PO_CURRENCY}}</td>
          <td id='po_gross_wt'>{{$data->PO_GROSS_WEIGHT}}</td>
          <td id='po_cbm_vol'>{{$data->PO_CBM_VOLUME}}</td>
          <td id='po_pack_one'>{{$data->PO_PACKING_TYPE1}}</td>
          <td id='po_nbr_one'>{{$data->PO_NBR1}}</td>
          <td id='po_pack_two'>{{$data->PO_PACKING_TYPE2}}</td>
          <td id='po_nbr_two'>{{$data->PO_NBR2}}</td>
          @if($data->STATUS_NAME == 'Rejected')
          <td><button id='cmt_btn' name='cmt_btn' class='btn btn-sm' data-toggle="modal" data-target="#cmtModal" data-id='{{$data->PO_ID}}' data-action='po-comment-page'><i class="fa fa-comment-o"></i></button></td>
          @endif
          @if($data->STATUS_NAME == 'PO Review')
          <td><button id='cmt_btn' name='cmt_btn' class='btn btn-sm' data-toggle="modal" data-target="#cmtModal" data-id='{{$data->PO_ID}}' data-action='po-comment-page'><i class="fa fa-comment-o"></i></button></td>
          @endif
          @if($data->STATUS_NAME == 'PO Added' && $usr_account_id != $data->PO_ACCOUNT_ID)
          <td>
          
           </td>
          @elseif($data->STATUS_NAME == 'PO Added' && $usr_account_id == $data->PO_ACCOUNT_ID)
          <td>
          
          <button name='edit_po' class="editsec" data-toggle="modal" data-target="#exampleModalEdit"  data-id='{{$data->PO_ID}}' data-toggle="tooltip" title="Edit"></button>
          <button name='del_po' class="deletesec" data-toggle="tooltip" title="Delete" data-toggle="modal" data-target="#ModalDelete" data-id='{{$data->PO_ID}}'></button> 
          <a href='<?php echo URL::to('/'); ?>/po-conf-send/{{$data->PO_ID}}' data-toggle="tooltip" title="Send For Confirmation" class="send_for_approval"></a>
          </td>
          @elseif($usr_account_id != $data->PO_ACCOUNT_ID && $data->STATUS_NAME == 'Approval Awaiting')
           <td>
            <button name='edit_po' class="editsec" data-toggle="modal" data-target="#exampleModalEdit"  data-id='{{$data->PO_ID}}' data-toggle="tooltip" title="Edit"></button>
            <button name='conf_po' class='confirmsec' data-toggle="modal" data-target="#ConfirmModal" data-id='{{$data->PO_ID}}' data-toggle="tooltip" title="Confirm PO"></a></td>
            </td>
          @endif
          @if($data->STATUS_NAME == 'PO Review' && $usr_account_id == $data->PO_ACCOUNT_ID)
          <td width='100'>
          <button name='edit_po' class="editsec" data-toggle="modal" data-target="#exampleModalEdit"  data-id='{{$data->PO_ID}}' data-toggle="tooltip" title="Edit"></button>
          <button name='del_po' class="deletesec" data-toggle="modal" data-target="#ModalDelete" data-id='{{$data->PO_ID}}' data-toggle="tooltip" title="Delete" ></button> 
          <a href='<?php echo URL::to('/'); ?>/po-conf-send/{{$data->PO_ID}}' data-toggle="tooltip" title="Send For Confirmation" class="send_for_approval"></a>
          </td>
          @endif
      </tr>
        @endforeach
        <tbody class='search_data hide'>
          
        </tbody>
      </table>
      <div class='comment-box'>

      </div>
<!--      <form id='submit_id' method='POST'>
        <input type='hidden' id='hid_po_status' name="hid_po_status">
      </form>-->
      </div>
    </div>
    <div class="col-lg-3">
      <table class="table" id="detail-preview">
        <tbody>
          <tr>
            <td colspan="2" class="blue-bg">PO Details Preview</td>
          </tr>
          <tr>
            <td>Status</td>
            <td><span id="status"></span></td>
          </tr>
          <tr>
            <td>PO Creation Date</td>
            <td><span id="po_cr_date"></span></td>
          </tr>
          <tr>
            <td>Customer</td>
            <td><span id="Customer"></span></td>
          </tr>
          <tr>
            <td>Shipper</td>
            <td><span id="Shipper"></span></td>
          </tr>
          <tr>
            <td>Consignee</td>
            <td><span id="Consignee"></span></td>
          </tr>
          <tr>
            <td>PO N°</td>
            <td><span id="po_no"></span></td>
          </tr>
<tr>
	<td>PO Date</td>
	<td><span id="po_date_new1"></span></td>
</tr>
<tr>
	<td>Product PN</td>
	<td><span id="po_pn"></span></td>
</tr>
<tr>
	<td>Product Name</td>
	<td><span id="po_name"></span></td>
</tr>
<tr>
	<td>Product Type </td>
	<td><span id="po_type"></span></td>
</tr>
          <tr>
            <td>Product Qty</td>
            <td><span id="qty"></span></td>
          </tr>
<tr>
	<td>Product Value</td>
	<td><span id="po_val"></span></td>
</tr>
<tr>
	<td>Value Currency</td>
	<td><span id="po_cur"></span></td>
</tr>
          <tr>
            <td>Gross Wt (kgs)</td>
            <td><span id="gross_wt"></span></td>
          </tr>
          <tr>
            <td>Volume (cbm)</td>
            <td><span id="volume"></span></td>
          </tr>
          <tr>
            <td>Packing Type 1</td>
            <td><span id="pack_type1"></span></td>
          </tr>
          <tr>
            <td>Nbr of 1</td>
            <td><span id="nbr1"></span></td>
          </tr>
          <tr>
            <td>Packing Type 2</td>
            <td><span id="pack_type2"></span></td>
          </tr>
          <tr>
            <td>Nbr of 2</td>
            <td><span id="nbr2"></span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<div class="spacer"></div>
</div><!-- side body ends -->
</div><!-- container fluid ends -->

<!--EDIT  PO MODAL -->
<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form method='POST' action='po-overview'>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">EDIT PO</h4>
      </div>
       <input type='hidden' id='hid_po_status' name="hid_po_status">
      <div class="modal-body fixedsec">
          
        <div class="col-sm-6">
        
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-no1" class="control-label" style="line-height:45px;">PO Creation Date:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" name='po_creation_date' class="form-control datepicker" id="recipient-no1" required>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-no2" class="control-label" style="line-height:45px;">Shipper:</label>
            </div>
            <div class="col-sm-7">

              <select class="form-control" id="recipient-no2" name='shipper_name'>

                @foreach($shipper_names as $data)
                <option value='{{$data->SHIPPER_ID}}'>{{$data->SHIPPER_NAME}}</option>
                @endforeach
              </select>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
               <input type='hidden' id='hidden_id' name='po_id'>
              <label for="recipient-no3" class="control-label" style="line-height:45px;">PO Date:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control datepicker" id="recipient-no3" name='po_date' required>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-no4" class="control-label" style="line-height:45px;">Product Name:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-no4" name='product_name' required>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-no5" class="control-label" style="line-height:45px;">Product Qty:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-no5" name='product_qty' onkeypress="return numbersonly(event)" required>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-no6" class="control-label" style="line-height:45px;">Value Currency:</label>
            </div>
            <div class="col-sm-7">
              <select name='currency_type' class="form-control" id="recipient-no6">
                <option selected>--Select Currency--</option>
                @foreach($currency as $currency_type)
                <option value='{{$currency_type->CURRENCY_NAME}}'>{{$currency_type->CURRENCY_NAME}}</option>
                @endforeach
              </select>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-no7" class="control-label" style="line-height:45px;">Volume (cbm):</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-no7" name='volume_cbm' onkeypress="return numbersonly(event)" required>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-5">
              <label for="consine" class="control-label" style="line-height:45px;">Consine Name:</label>
            </div>
            <div class="col-sm-7">
              <select name='consine_id' id='consine_id' class='form-control' required>
                <option value="">--Select Consine--</option>
                @foreach($consine as $con_names)
                <option value='{{$con_names->CONSINE_ID}}'>{{$con_names->CONSINE_NAME}} </option>
                @endforeach
              </select>
            </div>
            <div class="clearfix"></div>
          </div>

          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-no8" class="control-label" style="line-height:45px;">Nbr of 1:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-no8" name='nbr_one' onkeypress="return numbersonly(event)" required>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-no9" class="control-label" style="line-height:45px;">Nbr of 2:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-no9" name='nbr_two' onkeypress="return numbersonly(event)" required>
            </div>
            <div class="clearfix"></div>
          </div>

          </div>
          <div class="col-sm-6">
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-name10" class="control-label" style="line-height:45px;">Customer: </label>
            </div>
            <div class="col-sm-7">
              
              <input type="text" class="form-control" id="recipient-name10" name='customer_name' disabled>
              <input type='hidden' name='customer_id' value=''>
              
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-name11" class="control-label" style="line-height:45px;">PO N°:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-name11" name='po_n' maxlength='25' required>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-name12" class="control-label" style="line-height:45px;">Product PN:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-name12" name='product_pn' required>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-name13" class="control-label" style="line-height:45px;">Product Type :</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-name13" name='product_type' required>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-name14" class="control-label" style="line-height:45px;">Product Value:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-name14" name='product_value' onkeypress="return numbersonly(event)" required>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-name15" class="control-label" style="line-height:45px;">Gross Wt (kgs):</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-name15" name='gross_wt' onkeypress="return numbersonly(event)" required>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-name16" class="control-label" style="line-height:45px;">Packing Type 1:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-name16" name='packing_type_one' required>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-name17" class="control-label" style="line-height:45px;">Packing Type 2:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-name17" name='packing_type_two' required>
            </div>
            <div class="clearfix"></div>
          </div>
          
          </div>
          <div class="clearfix"></div>
        
      </div>
      <div class="modal-footer">
      <input type="hidden" value="0" name="hid" id="hid">
        <input type="submit" name='edit_po_update' class="btn btn-primary" value='UPDATE'  data-toggle="tooltip" title="UPDATE">
        <button type="button" class="btn btn-default" data-dismiss="modal"  data-toggle="tooltip" title="CANCEL">CANCEL</button>
      </div>
      
    </div>
    </form>
  </div>
</div>
<!--EDIT  PO MODAL END -->

<!--DELETE Modal Start -->

<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <form method='POST' action='po-overview-del'>
  <div class="modal-dialog modal-danger" role="document">
    <div class="modal-content">
      
      <input type='hidden' class='po_id' name='pur_id'>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Delete</h4>
      </div>
      <div class="modal-body"> 
           <p> Are you Sure ? </p>
      </div>
      <div class="modal-footer">
        <input type="submit" name='del_po' class="btn btn-primary" value='Delete'>
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--DELETE Modal END -->
  <!--confirm modal-->
<div class="modal fade" id="ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
     <form id='conf_po_form' method='POST' action='dashboard-conf-send'>
  <div class="modal-dialog modal-danger" role="document">
    <div class="modal-content">
      <input type='hidden' class='po_id' name='po_id'>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Confirm PO</h4>
      </div>
      <div class="modal-body">
      <div>
        <input type='radio' name='po_status' id='rb_app' value='3'>Approve<br>
        <input type='radio' name='po_status' class='rb_one' value='5'>Request For Review<br>
        <input type='radio' name='po_status' class='rb_one' value='4'>Reject<br>
        <textarea name='comment' id='cmt_box'> </textarea>
      </div>   
      </div>
      <div class="modal-footer">
        <button type="submit" name='confirm_po_btn' id='confirm_po_btn' class="btn btn-primary" data-toggle="tooltip" title="Confirm">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="tooltip" title="Cancel">CANCEL</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--confirm modal-->

<!-- Comment Modal -->
  <div class="modal fade" id='cmtModal' role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal content-->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Comments</h4>
        </div>
        <div class="modal-body">
          
          <p id='show_comment'>
           
        </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      
      </div>
    </div>
  </div>
<!-- Comment Modal Ends-->


</div>

@include('pomfrontend.includes.footer')
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm"> <a class="btn btn-primary" href="#page-top"> <i class="fa fa-chevron-up"></i> </a> </div>
<!-- jQuery -->
<script src="<?php echo URL::to('/');?>/frontend/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo URL::to('/');?>/frontend/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo URL::to('/');?>/frontend/js/classie.js"></script>
<script src="<?php echo URL::to('/');?>/frontend/js/cbpAnimatedHeader.js"></script>
<!-- Contact Form JavaScript -->
<script src="<?php echo URL::to('/');?>/frontend/js/jqBootstrapValidation.js"></script>
<script src="<?php echo URL::to('/');?>/frontend/js/contact_me.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo URL::to('/');?>/frontend/js/freelancer.js"></script>

<link rel="stylesheet" href="<?php echo URL::to('/');?>/frontend/css/jquery-ui.css">
<script src="<?php echo URL::to('/');?>/frontend/js/custom_validation.js"></script>
<script src="<?php echo URL::to('/');?>/frontend/js/jquery-1.10.2.js"></script>
<script src="<?php echo URL::to('/');?>/frontend/js/jquery-ui.js"></script>

<script type="text/javascript">
function extrafilter()
{
 $('#hiddensec').slideToggle();
 if($('#search_icon').hasClass('fa-chevron-circle-down')) {
 	$('#search_icon').removeClass('fa-chevron-circle-down');
	$('#search_icon').addClass('fa-chevron-circle-up');
 } else {
 $('#search_icon').removeClass('fa-chevron-circle-up');
	$('#search_icon').addClass('fa-chevron-circle-down');
	}
}
$(document).ready(function(){
 $('#hiddensec').hide();
 })
 $('#po tr').click(function(){
 	$('#po tr').removeClass('blue-bg-tr');
 	$(this).addClass('blue-bg-tr');
 	if($(this).hasClass("all")) return false;
	var i = 0;
 	$(this).find('td').each(function(){
	if(i==0) $('#status').html($(this).html());
	if(i==1) $('#po_cr_date').html($(this).html());
	if(i==2) $('#Customer').html($(this).html());
	if(i==3) $('#Shipper').html($(this).html());
  if(i==4) $('#Consignee').html($(this).html());
	if(i==5) $('#po_no').html($(this).html());
	if(i==6) $('#po_date_new1').html($(this).html());
	if(i==7) $('#po_pn').html($(this).html());
	if(i==8) $('#po_name').html($(this).html());
	if(i==9) $('#po_type').html($(this).html());
	if(i==10) $('#qty').html($(this).html());
	if(i==11) $('#po_val').html($(this).html());
	if(i==12) $('#po_cur').html($(this).html());
	if(i==13) $('#gross_wt').html($(this).html());
	if(i==14) $('#volume').html($(this).html());
	if(i==15) $('#pack_type1').html($(this).html());
	if(i==16) $('#nbr1').html($(this).html());
	if(i==17) $('#pack_type2').html($(this).html());
	if(i==18) $('#nbr2').html($(this).html());
	i = i+1;
	});
 });
 function showall (c){

 	//$('.status-menu li').removeClass('active');
  //$('.status-menu li.'+c).addClass('active');
	
  $('#detail-preview tr td span').html('');
	$('#po tr').removeClass('blue-bg-tr');
  $('#hid_po_status').val(c);
  $('#submit_id').submit();
 	
	//return false;
 }

</script>


<script>
$('button[name="edit_po"]').on('click', function(){
    var edit_model=$('#exampleModalEdit');
    var po_id=$(this).data('id');
    var po_creation_date = $(this).closest('tr').find('td#po_creation_date').html();
    var po_date = $(this).closest('tr').find('td#po_date_new').html();
    var po_num = $(this).closest('tr').find('td#po_num').html();
    var shipper_id = $(this).closest('tr').find('#shipper_id').val(); 
    var consine_id = $(this).closest('tr').find('#consine_id').val(); 
    var po_product_pn = $(this).closest('tr').find('td#po_product_pn').html();
    var po_product_name = $(this).closest('tr').find('td#po_product_name').html();
    var po_product_type = $(this).closest('tr').find('td#po_product_type').html();
    var po_product_qty = $(this).closest('tr').find('td#po_product_qty').html();
    var po_product_value = $(this).closest('tr').find('td#po_product_value').html();
    var po_currency = $(this).closest('tr').find('td#po_currency').html();
    var po_gross_wt = $(this).closest('tr').find('td#po_gross_wt').html();
    var po_cbm_vol = $(this).closest('tr').find('td#po_cbm_vol').html();
    var po_pkg_one = $(this).closest('tr').find('td#po_pack_one').html();
    var po_pkg_two = $(this).closest('tr').find('td#po_pack_two').html();
    var po_nbr_one = $(this).closest('tr').find('td#po_nbr_one').html();
    var po_nbr_two = $(this).closest('tr').find('td#po_nbr_two').html();
    var customer_name = $(this).closest('tr').find('td#customer_name').html();

    $('#recipient-no1', edit_model).val(po_creation_date);
    $('#recipient-no2', edit_model).val(shipper_id);
    $('#recipient-no3', edit_model).val(po_date);
    $('#recipient-no4', edit_model).val(po_product_name);
    $('#recipient-no5', edit_model).val(po_product_qty);
    $('#recipient-no6', edit_model).val(po_currency);
    $('#recipient-no7', edit_model).val(po_cbm_vol);
    $('#recipient-no8', edit_model).val(po_nbr_one);
    $('#recipient-no9', edit_model).val(po_nbr_two);
    $('#recipient-name12', edit_model).val(po_product_pn);
    $('#recipient-name13', edit_model).val(po_product_type);
    $('#recipient-name14', edit_model).val(po_product_value);
    $('#recipient-name15', edit_model).val(po_gross_wt);
    $('#recipient-name16', edit_model).val(po_pkg_one);
    $('#recipient-name17', edit_model).val(po_pkg_two);
    $('#recipient-name10', edit_model).val(customer_name);
    $('#recipient-name11', edit_model).val(po_num);

    $('#hidden_id', edit_model).val(po_id);
    $('#consine_id', edit_model).val(consine_id);
    edit_model.modal({ show: true });
    return false;
    });
</script>

<script>
$(document).ready(function () {
    $("#cmt_box").hide();
    $(".rb_one").click(function () {
    $("#cmt_box").show();
    });
    $("#rb_app").click(function () {
    $("#cmt_box").hide();
    });
});
</script>

<script>
$('button[name="conf_po"]').on('click',function(){
  var confirm_modal=$('#ConfirmModal');
  var po_id=$(this).data('id');
  $('.po_id',confirm_modal).val(po_id);
  confirm_modal.modal({ show: true });
return false;

});
$('#confirm').modal({ backdrop: 'static', keyboard: false })
.one('click','#confirm_po_btn', function() {
$('#conf_po_form').trigger('submit'); // submit the form
});
</script> 

<script>
$('button[name="del_po"]').on('click',function(){
  var delete_modal=$('#ModalDelete');
  var po_id=$(this).data('id');
  $('.po_id', delete_modal).val(po_id);
  delete_modal.modal({ show: true });
return false;
});
</script>

<!-- TOOLTIP-->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

<!-- Page Script search -->
<script>
$('#search-button').click(function(){
var po_n =$('#po_n').val();
var product_pn=$('#product_pn').val();
var customer=$('#customer').val();
var shipper=$('#shipper').val();
var po_date=$('#po_date').val();
var datastring ='&pon_name='+po_n
                +'&product_pn='+product_pn
                +'&customer='+customer
                +'&shipper='+shipper
                +'&po_date='+po_date
                +'&pick_up='+pick_up
                +'&pol='+pol
                +'&pod='+pod
                +'&delivery_place='+delivery_place;

 $.ajax({
                    type: "POST",
                    url : "data-search",
                    data : datastring,
                    success : function(data){
                    $('.po-added').addClass('hide');
                    $('.search_data').removeClass('hide');
                    $('.search_data').html(data);
                    console.log(data);
                      }
              },"json");
});
</script>

<!--Page Script For Comment Modal -->
<script>
$(document).on('click','#cmt_btn', function(e)
{
   e.preventDefault();
   var fonturl = $(this).attr('data-action');
   var id = $(this).data('id');
    $.ajax({
    url : fonturl+'/'+id,
    type: 'get',
    cache: false,
    data: null,
    success: function(data)
    {
   $('#show_comment').html(data);
    }
    });
});
</script>

<!--Datepicker -->
<script>
  $(function() {
    $(".datepicker").datepicker({"dateFormat":"yy-mm-dd"});
  });
  function dataShow(){
  var hid = $('#hid').val();
      hid = Number(hid) + 1;
    $('#hid').val(hid);
    $('#no-found').hide();
    $('#saveBotton').fadeIn();
  var s = '<tr><td><input type="text" class="datepicker" value="2015-11-05" style="width:80px;"></td><td><input type="text" value="Electrocorp" style="width:80px;"></td><td><select><option selected>Zhengji</option><option>Tianjung</option></select></td><td><input type="text" value="40001236" style="width:70px;"></td><td><input type="text" class="datepicker" value="2015-11-08" style="width:80px;"></td><td><input type="text" value="10101225"></td><td><input type="text" value="Red Front Cover C56"></td><td><input type="text" value="Plastic Part"></td><td><input type="text" value="1 000"></td><td><input type="text" value="1 500"></td><td>USD</td><td><input type="text" value="120"></td><td><input type="text" value="0,7"></td><td><select><option >-</option><option selected value="Boxes">Boxes</option></select></td><td><input type="text" value="8"></td><td><select><option selected>-</option><option  value="Boxes">Boxes</option></select></td><td><input type="text" value="-"></td></tr>';
  $('#po tbody').append(s);
  return false;
  }
</script>


  <!-- JS for sidebar -->

    <script type="text/javascript">
    $(function () {
    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').toggleClass('slide-in');
        
    });
   
   // Remove menu for searching
   $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').removeClass('slide-in');

    });
});

$('.ajaxcall').click(function(){
   var page = $(this).data('page');
   var status = $(this).data('type');
   if(page == 'po'){
    $('#hid_po_status').val(status);
    $('#submit_id_po').submit();
   } else if(page == 'booking'){
       $('#hid_po_status_b').val(status);
    $('#submit_id_booking').submit();
   } else if(page == 'ship'){
       $('#hid_po_status_ship').val(status);
    $('#submit_id_ship').submit();
   }
   return false;
});
$('input[name="po_check"]').change(function(){
    var v = '';
   $('input[name="po_check"]:checked').each(function(){
       if(v!= '') {
       v += ",'"+$(this).val()+"'";
   } else {
      v += "'"+$(this).val()+"'"; 
   }
   });
   if(v == '') v = "'all'";
    $('#hid_po_status').val(v);
    $('#submit_id_po').submit();
});
    </script>


</body>
</html>
