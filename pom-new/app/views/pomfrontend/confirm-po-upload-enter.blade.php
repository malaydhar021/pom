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
<div class="container-fluid">
  <div class="side-body">
<!-- Header -->
<header>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="top-menu">
          <li><a href="<?php echo URL::to('/')?>/po-overview">PO Overview</a></li>
          <li  class="active"><a href="<?php echo URL::to('/')?>/create-purchase-order">Add a PO</a></li>
          
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Portfolio Grid Section -->
<div class="container dashboard-page" style="min-height:500px;">
<div class="row">
@if(Session::has('success')) <br>
<div class="alert alert-info alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4> <i class="icon fa fa-check"></i> Success</h4>
{{ Session::get('success') }} </div>
@endif 
<div class="spacer"></div>
<form method='POST' action=''>
    <div class="over-flow-scroll">
      <p class="pull-left">Please enter PO details </p>
      <div class="text-right pull-right"><a href="#" id="trcopy-botton" class="btn btn-warning btn-xs"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" data-id='' name='add_new_po' data-toggle="tooltip" title="Add New PO">Add New PO</a></div>
      <table id="po" class="table">
        <tbody>
        <tr class="all">
          <td class="blue-bg">PO Creation Date</td>
          <td class="blue-bg">@if(!empty($customer_name)){{'Customer Name'}}
            @elseif(!empty($forwarder_name))
            {{'Forwarder Name'}}
            @endif</td>
          <td class="blue-bg">Consignee</td>
          <td class="blue-cyan-bg">Shipper</td>
          <td class="blue-cyan-bg">PO N°</td>
          <td class="blue-cyan-bg">PO Date</td>
          <td class="blue-cyan-bg">Product PN</td>
          <td class="blue-cyan-bg">Product&nbsp;Name</td>
          <td class="blue-cyan-bg">Product Type ?</td>
          <td class="blue-cyan-bg">Product Qty</td>
          <td class="blue-cyan-bg">Product Value</td>
          <td class="blue-cyan-bg">Value Currency</td>
          <td class="cyan-bg">Gross Wt (kgs)</td>
          <td class="cyan-bg">Volume (cbm)</td>
          <td class="cyan-bg">Packing Type 1</td>
          <td class="cyan-bg">Nbr of  1</td>
          <td class="cyan-bg">Packing Type 2</td>
          <td class="cyan-bg">Nbr of 2</td>
          <td class="cyan-bg">Action</td>
        </tr>
        @if(empty($show_po))
        <tr>
          <td colspan="17" class="text-center" id="no-found">No PO Found. <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  data-toggle="tooltip" title="Add new PO">Add new PO</a></td>
        </tr>
        @else
        @foreach($show_po as $data)
        <tr>
          <td>{{$data->PO_CREATION_DATE}}</td>
          <td>
            @if(!empty($customer_name))
            {{$customer_name}}
            @elseif(!empty($forwarder_name))
            {{$forwarder_name}}
            @endif
          </td>
          <td>{{$data->CONSINE_NAME}}<input type='hidden' id='consine_id' value='{{$data->CONSINE_ID}}'></td>
          <td>{{$data->SHIPPER_NAME}}<input type='hidden' id='shipper_id' value='{{$data->SHIPPER_ID}}'></td>
          <td id='po_num'>{{$data->PO_NUMBER}}</td>
          <td id='po_date'>{{$data->PO_DATE}}</td>
          <td id='po_product_pn'>{{$data->PO_PRODUCT_PN}}</td>
          <td id='po_product_name'>{{$data->PO_PRODUCT_NAME}}</td>
          <td id='po_product_type'>{{$data->PO_PRODUCT_TYPE}}</td>
          <td id='po_product_qty'>{{$data->PO_PRODUCT_QTY}}</td>
          <td id='po_product_value'>{{$data->PO_PRODUCT_VALUE}}</td>
          <td id='po_currency'>{{$data->PO_CURRENCY}}</td>
          <td id='po_gross_wt'>{{$data->PO_GROSS_WEIGHT}}</td>
          <td id='po_cbm_vol'>{{$data->PO_CBM_VOLUME}}</td>
          <td id='po_pkg_one'>{{$data->PO_PACKING_TYPE1}}</td>
          <td id='po_nbr_one'>{{$data->PO_NBR1}}</td>
          <td id='po_pkg_two'>{{$data->PO_PACKING_TYPE2}}</td>
          <td id='po_nbr_two'>{{$data->PO_NBR2}}</td>
          <td>
           <button name='edit_po' type='button' class="editsec" data-toggle="modal" data-target="#exampleModalEdit"  data-id='{{$data->PO_ID}}'  data-toggle="tooltip" title="Edit"></button>
           <button name='del_po' type='button' class="deletesec" data-toggle="modal" data-target="#ModalDelete" data-id='{{$data->PO_ID}}'  data-toggle="tooltip" title="Delete"></button> </td>
        </tr>
        <input type='hidden' name='po_ids[]' value='{{$data->PO_ID}}'>
        @endforeach
        @endif
      </tbody>
    </table>
      </div>
      <br>
      @if(!empty($show_po))
      <div class="text-right" id="saveBotton">
        <button class="btn btn-success" type='submit' name='send_for_confirmation'  data-toggle="tooltip" title="Send For Confirmation">Send for Confirmation</a>
      </div>
     @endif
      <br>
    </div>
  </form>
</div>
  </div></div>
<!-- Footer -->
@include('pomfrontend.includes.footer')
<!--Add  PO MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form method='post' action='confirm-po-upload-enter'>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add New PO</h4>
      </div>

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
              <select class="form-control" id="recipient-no2" name='shipper_name' required>
                <option value="">--Select Shipper--</option>
                @foreach($shipper_names as $data)
                <option value='{{$data->SHIPPER_ID}}'>{{$data->SHIPPER_NAME}}</option>
                @endforeach
              </select>
            </div>
            <div class="clearfix"></div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-5">
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
              <select name='currency_type' class="form-control" id="recipient-no6" required>
                <option value="">--Select Currency--</option>
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
              <label for="consine" class="control-label" style="line-height:45px;">Consignee:</label>
            </div>
            <div class="col-sm-7">
              <select name='consine_id' class='form-control' required>
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
          
          <?php $acc_type=\Session::get('account_type');$acc_type[0]->ACCOUNT_TYPE_ID ?>
          @if($acc_type[0]->ACCOUNT_TYPE_ID == 2)
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-name10" class="control-label" style="line-height:45px;">Customer: </label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-name10" name='customer_name' value='{{$customer_name}}' disabled>
              <input type='hidden' name='customer_id' value='{{$customer_id}}'>
              <input type='hidden' name='cust_account_id' value='{{$customer_account_id}}'>
            </div>
            <div class="clearfix"></div>
          </div>
         @elseif($acc_type[0]->ACCOUNT_TYPE_ID == 3)
         <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-name10" class="control-label" style="line-height:45px;">Forwarder: </label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-name10" name='forwarder_name' value='{{$forwarder_name}}' disabled>
              <input type='hidden' name='forwarder_id' value='{{$forwarder_id}}'>
              <input type='hidden' name='forwarder_account_id' value='{{$forwarder_account_id}}'>
            </div>
            <div class="clearfix"></div>
          </div>
          @endif
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
        <input type="submit" name='add_po_info' class="btn btn-primary" value='OK'  data-toggle="tooltip" title="OK">
        <button type="button" class="btn btn-default" data-dismiss="modal"  data-toggle="tooltip" title="CANCEL ">CANCEL</button>
      </div>
      
    </div>
    </form>
  </div>
</div>
<!--Add  PO MODAL END -->


<!--EDIT  PO MODAL -->
<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form method='post' action='confirm-po-upload-enter'>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">EDIT PO</h4>
      </div>

      <div class="modal-body fixedsec">
          
        <div class="col-sm-6">
        
          <div class="form-group">
            <div class="col-sm-5">
              <label for="po_creation_dt" class="control-label" style="line-height:45px;">PO Creation Date:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" name='po_creation_date' class="form-control datepicker" id="po_creation_dt" required>
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
              <label for="po_dt" class="control-label" style="line-height:45px;">PO Date:</label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control datepicker" id="po_dt" name='po_date' required>
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
              <label for="consine" class="control-label" style="line-height:45px;">Consignee :</label>
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
          <?php $acc_type=\Session::get('account_type');$acc_type[0]->ACCOUNT_TYPE_ID ?>
          @if($acc_type[0]->ACCOUNT_TYPE_ID == 2)
          <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-name10" class="control-label" style="line-height:45px;">Customer: </label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-name10" name='customer_name' value='{{$customer_name}}' disabled>
              <input type='hidden' name='customer_id' value='{{$customer_id}}'>
              <input type='hidden' name='cust_account_id' value='{{$customer_account_id}}'>
            </div>
            <div class="clearfix"></div>
          </div>
         @elseif($acc_type[0]->ACCOUNT_TYPE_ID == 3)
         <div class="form-group">
            <div class="col-sm-5">
              <label for="recipient-name10" class="control-label" style="line-height:45px;">Forwarder: </label>
            </div>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="recipient-name10" name='forwarder_name' value='{{$forwarder_name}}' disabled>
              <input type='hidden' name='forwarder_id' value='{{$forwarder_id}}'>
              <input type='hidden' name='forwarder_account_id' value='{{$forwarder_account_id}}'>
            </div>
            <div class="clearfix"></div>
          </div>
          @endif
          
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
        <input type="submit" name='edit_po_post' class="btn btn-primary" value='UPDATE'  data-toggle="tooltip" title="UPDATE">
        <button type="button" class="btn btn-default" data-dismiss="modal"  data-toggle="tooltip" title="CANCEL">CANCEL</button>
      </div>
      
    </div>
    </form>
  </div>
</div>
</div>
<!--EDIT  PO MODAL END -->
<!--DELETE Modal Start -->

<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <form method='POST' action='confirm-po-upload-enter'>
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

<!-- Custom Theme JavaScript -->
<script src="<?php echo URL::to('/');?>/frontend/js/freelancer.js"></script>

<link rel="stylesheet" href="<?php echo URL::to('/');?>/frontend/css/jquery-ui.css">
  <script src="<?php echo URL::to('/');?>/frontend/js/jquery-1.10.2.js"></script>
  <script src="<?php echo URL::to('/');?>/frontend/js/jquery-ui.js"></script>
  <script src="<?php echo URL::to('/');?>/frontend/js/custom_validation.js"></script>
    <script>
  $(function() {
    $( ".datepicker" ).datepicker({"dateFormat":"yy-mm-dd"});
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


  <script>
    $('button[name="edit_po"]').on('click', function(){
    var edit_model=$('#exampleModalEdit');
    var po_id=$(this).data('id');
    var po_creation_date = $(this).closest('tr').find('td').html();
    var po_date = $(this).closest('tr').find('td#po_date').html();
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
    var po_pkg_one = $(this).closest('tr').find('td#po_pkg_one').html();
    var po_pkg_two = $(this).closest('tr').find('td#po_pkg_two').html();
    var po_nbr_one = $(this).closest('tr').find('td#po_nbr_one').html();
    var po_nbr_two = $(this).closest('tr').find('td#po_nbr_two').html();


    $('#po_creation_dt', edit_model).val(po_creation_date);
    $('#recipient-no2', edit_model).val(shipper_id);
    $('#po_dt', edit_model).val(po_date);
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

    $('#recipient-name11', edit_model).val(po_num);

    $('#hidden_id', edit_model).val(po_id);
    $('#consine_id', edit_model).val(consine_id);
    edit_model.modal({ show: true });
    return false;
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
