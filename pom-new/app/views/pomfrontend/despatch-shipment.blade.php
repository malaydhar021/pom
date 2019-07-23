@include('pomfrontend.includes.header')
@include('pomfrontend.includes.sidebar')
</head>
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
          <li><a href="<?php echo URL::to('/');?>/shipments">Shipping Overview</a></li>
         
        </ul>
      </div>
    </div>
    </div>
</header>
<!-- Portfolio Grid Section -->
<div class="container dashboard-page" style="min-height:700px;">
<div class="row">
<div class="row"></div>
   <div class="clearfix"></div>
  <div class="spacer"></div>
  
   <div class="clearfix"></div>
  <div class="spacer"></div>
   <div class="clearfix"></div>
  <div class="spacer"></div>
  
  
      <div class="over-flow-scroll">
<form method='POST' action='<?php echo URL::to('despatch-shipment');?>'>
      <table id="po" class="table">
        <tbody><tr class="all">
          <td class="red-bg">Despatch </td>
        <td class="green-bg">Status</td>
          <td class="blue-bg">PO Creation Date</td>
          <td class="blue-bg">Customer</td>
          <td class="blue-cyan-bg">Shipper</td>
          <td class="blue-cyan-bg">PO N°</td>
          <td class="blue-cyan-bg">PO Date</td>
          <td class="blue-cyan-bg">Product PN</td>
          <td class="blue-cyan-bg">Product&nbsp;Name</td>
          <td class="blue-cyan-bg">Product Type </td>
          <td class="blue-cyan-bg">Product Qty</td>
          <td class="blue-cyan-bg">Product Value</td>
          <td class="blue-cyan-bg">Value Currency</td>
          <td class="cyan-bg">Gross Wt (kgs)</td>
          <td class="cyan-bg">Volume (cbm)</td>
          <td class="cyan-bg">Packing Type 1</td>
          <td class="cyan-bg">Nbr of  1</td>
          <td class="cyan-bg">Packing Type 2</td>
          <td class="cyan-bg">Nbr of 2</td>
        </tr>
        @foreach($fetch_booking_data as $data)
        <tr>
        <td><span class="hide checkbox-box"><input type="checkbox" checked name="po_ids[]" id="box1" value='{{$data->PO_ID}}'><label for="box1"></label></span></td>
       <td>{{$data->STATUS_NAME}}</td>
          <td>{{$data->PO_CREATION_DATE}}</td>
          <td>{{$data->CUSTOMER_NAME}}</td>
          <td>{{$data->SHIPPER_NAME}}</td>
          <td>{{$data->PO_NUMBER}}</td>
          <td>{{$data->PO_DATE}}</td>
          <td>{{$data->PO_PRODUCT_PN}}</td>
          <td>{{$data->PO_PRODUCT_NAME}}</td>
          <td>{{$data->PO_PRODUCT_TYPE}}</td>
          <td>{{$data->PO_PRODUCT_QTY}}</td>
          <td>{{$data->PO_PRODUCT_VALUE}}</td>
          <td>{{$data->PO_CURRENCY}}</td>
          <td>{{$data->PO_GROSS_WEIGHT}}</td>
          <td>{{$data->PO_CBM_VOLUME}}</td>
          <td>{{$data->PO_PACKING_TYPE1}}</td>
          <td>{{$data->PO_NBR1}}</td>
          <td>{{$data->PO_PACKING_TYPE2}}</td>
          <td>{{$data->PO_NBR2}}</td>
        </tr>
        @endforeach
        
        <tr>
        <td colspan="10">
        
        
        </td>
          
         <td><span class="btn-success btn btn-xs " style="cursor:default;">Total</span></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
        <td colspan="18">
        <table class="table">
        <tr>
        <td class="light-cyan-bg">Tp Mode</td>
        <td class="light-cyan-bg">Shipping Mode</td>
        <td class="light-cyan-bg">Incoterm at Origin</td>
        <td class="light-cyan-bg">Pick-up Place</td>
        <td class="light-cyan-bg">POL</td>
        <td class="light-cyan-bg">POD</td>
        <td class="light-cyan-bg">Delivery Place</td>
        <td class="light-cyan-bg">Requested Shipping Date</td>
        <td class="light-cyan-bg">Requested Delivery Date</td>
        <td class="light-cyan-bg">Cargo Receive Date</td>
        @if($fetch_booking_data[0]->TRANSPORT_MODE_NAME == 'SEA')
        <td class="light-cyan-bg">MBL</td>
        <td class="light-cyan-bg">HBL</td>
        @endif 
        @if($fetch_booking_data[0]->TRANSPORT_MODE_NAME == 'AIR')
        <td class="light-cyan-bg">M(AW)BL</td>
        <td class="light-cyan-bg">H(AW)BL</td>
        @endif
        <td class="light-cyan-bg">Container</td>
        <td class="light-cyan-bg">Company</td>
        <td class="light-cyan-bg">Flight Vessel Truck</td>
        <td class="light-cyan-bg">Closing Date</td>
        <td class="light-cyan-bg">ETD</td>
        <td class="light-cyan-bg">ETA</td>
        </tr>
        <tr>
        <td><lebel>{{$fetch_booking_data[0]->TRANSPORT_MODE_NAME}}</lebel>
        </td>
        <td><lebel>{{$fetch_booking_data[0]->SHIPPING_MODE_NAME}}</lebel>
      </td>
        <td><lebel>{{$fetch_booking_data[0]->INCOTERM_NAME}}</lebel>
      </td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_PICK_UP_PLACE}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_POL}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_POD}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_DELEVERY_PLACE}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_REQUESTED_SIPPING_DATE}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_REQUESTED_DELIVERY_DATE}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_CARGO_RECEIVE_DATE}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_MBL}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_HBL}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_CONTAINER}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_COMPANY}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_FLIGHT}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_CLOSING_DATE}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_ETD}}</lebel></td>
        <td><lebel>{{$fetch_booking_data[0]->BOOKING_ETA}}</lebel></td>
        </tr>
        
        </table>
        </td>
        </tr>
        <tr>
          <td colspan="14"><table class="table">
              <tr>
                <td class="warning">Forwarder Warehouse</td>
                <td class="warning">Fwd Wrhs Place</td>
                <td class="warning">Arrival at Fwd Wrhse</td>
                <td class="warning">Departure frome Fwd Wrhse</td>
                <td class="warning">Final Delivery Place</td>
                <td class="warning">Appointment</td>
                <td class="warning">Appointment Date</td>
                <td class="warning">Appointment Time</td>
                <td class="warning">Final Delivery Date</td>
                <td class="warning">Final Delivery Time</td>
              </tr>
              <tr>
                <td><select name='fwdr_warehouse' required>
                  <option value=''>Select One</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </td>
                <td><input name='fwdr_warehouse_place' type="text" required></td>
                <td><input name='fwdr_warehouse_arrival_time' type="text" class="datepicker" required></td>
                <td><input  name='fwdr_warehouse_departure_time' type="text" class="datepicker" required></td>
                <td><input name='final_delivary_place' type="text" required></td>
                <td><select name='appointment' required>
                  <option value=''>Select One</option>
                  <option value='Yes'>Yes</option>
                  <option value='No'>No</option>
                </select>
              </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </table></td>
         
        </tr>
        
      </tbody></table></div><br>

      <div class="text-right">
        <input type='hidden' name='hide_booking_id' value='{{$fetch_booking_data[0]->BOOKING_ID}}'>
       
       <button type='submit' id='next_button' name='despatch_shipment_go' class="btn btn-success">Despatch Shipment</button>
      </div>
      <br>
      </form>
    
    </div>
  
</div>
  </div></div>
<!-- Footer -->
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
  <script src="<?php echo URL::to('/');?>/frontend/js/jquery-1.10.2.js"></script>
  <script src="<?php echo URL::to('/');?>/frontend/js/jquery-ui.js"></script>
    <script>
  $(function() {
    $( ".datepicker" ).datepicker({"dateFormat":"yy-mm-dd"});
  });
  </script>
<script type="text/javascript">
$('.file').change(function(){
	$('#add-another').fadeIn();
});
$('#add-another').click(function(){
	$('#input-file').append('<input type="file" class="file" placeholder="Select a file" style="margin-bottom:10px;">');
});
</script>
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
	if(i==4) $('#po_no').html($(this).html());
	
	if(i==5) $('#po_date').html($(this).html());
	if(i==6) $('#po_pn').html($(this).html());
	if(i==7) $('#po_name').html($(this).html());
	if(i==8) $('#po_type').html($(this).html());
	if(i==9) $('#qty').html($(this).html());
	if(i==10) $('#po_val').html($(this).html());
	if(i==11) $('#po_cur').html($(this).html());
	if(i==12) $('#gross_wt').html($(this).html());
	if(i==13) $('#volume').html($(this).html());
	if(i==14) $('#pack_type1').html($(this).html());
	if(i==15) $('#nbr1').html($(this).html());
	if(i==16) $('#pack_type2').html($(this).html());
	if(i==17) $('#nbr2').html($(this).html());
	i = i+1;
	});
 });
 function showall (c){
 	$('.status-menu li').removeClass('active');
	$('.status-menu li.'+c).addClass('active');
	$('#detail-preview tr td span').html('');
	$('#po tr').removeClass('blue-bg-tr');
 	if(c == 'all') {
		$('#po tr').show();
	} else if(c == 'po-added') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.po-added').show();
	} else if(c == 'booked') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.booked').show();
	} else if(c == 'confirmed') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.confirmed').show();
	} else if(c == 'received') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.received').show();
	} else if(c == 'scheduled') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.scheduled').show();
	} else if(c == 'shipped') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.shipped').show();
	} else if(c == 'delivered-at-air-port') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.delivered-at-air-port').show();
	} else if(c == 'despatched') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.despatched').show();
	} else if(c == 'delivered') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.delivered').show();
	} else if(c == 'closed') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.closed').show();
	} else {
		$('#po tr').show();
	}
	return false;
 }
</script>

<script type="text/javascript">

  $('#next_button').click(function(){
    var cbk_val =$('input:checked');
        if(cbk_val.length == 0){
          alert('NO PO SELECTED');
      return false;      
        }
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
