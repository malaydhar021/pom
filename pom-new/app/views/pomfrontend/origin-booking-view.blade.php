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
          <li><a href="<?php echo URL::to('booking-po'); ?>">Bookings Overview</a></li>
          <li><a href="<?php echo URL::to('create-booking'); ?>">Create Booking</a></li>
          <li class="active"><a href="#">View Booking</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Portfolio Grid Section -->

  <div class="container" style="min-height:700px;">

    <div class="clearfix"></div>
    <div class="spacer"></div>

    <div class="spacer"></div>
    <div class="row">

      <div class="over-flow-scroll">
      <p>View Booking</p>

      <table id="po" class="table">
        <tbody><tr class="all">
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
        <td colspan="11">
        <table class="table">
        <tr>
        <td class="light-cyan-bg">Transport Mode</td>
        <td class="light-cyan-bg">Shipping Mode</td>
        <td class="light-cyan-bg">Incoterm at Origin</td>
        <td class="light-cyan-bg">Pick-up Place</td>
        <td class="light-cyan-bg">POL</td>
        <td class="light-cyan-bg">POD</td>
        <td class="light-cyan-bg">Delivery Place</td>
        <td class="light-cyan-bg">Requested Shipping Date</td>
        <td class="light-cyan-bg">Requested Delivery Date</td>
        </tr>
        <tr>
        <td>{{$fetch_booking_data[0]->TRANSPORT_MODE_NAME}}</td>
        <td>{{$fetch_booking_data[0]->SHIPPING_MODE_NAME}}</td>
        <td>{{$fetch_booking_data[0]->INCOTERM_NAME}}</td>
        <td>{{$fetch_booking_data[0]->BOOKING_PICK_UP_PLACE}}</td>
        <td>{{$fetch_booking_data[0]->BOOKING_POL}}</td>
        <td>{{$fetch_booking_data[0]->BOOKING_POD}}</td>
        <td>{{$fetch_booking_data[0]->BOOKING_DELEVERY_PLACE}}</td>
        <td>{{$fetch_booking_data[0]->BOOKING_REQUESTED_SIPPING_DATE}}</td>
        <td>{{$fetch_booking_data[0]->BOOKING_REQUESTED_DELIVERY_DATE}}</td>
        </tr>
        </table>
        
        </td>
          
         <!--<td><span class="btn-success btn btn-xs " style="cursor:default;">Total</span></td>
          <td>{{$fetch_booking_data[0]->PO_GROSS_WEIGHT}}</td>
          <td>{{$fetch_booking_data[0]->PO_CBM_VOLUME}}</td>
          <td>{{$fetch_booking_data[0]->PO_PACKING_TYPE1}}</td>
          <td>16</td>
          <td>Pallets</td>
          <td>1</td>-->
        </tr>
        
       
      </tbody></table>
      </div><br>
      <div class="text-left">
        <a href="<?php echo URL::to('/');?>/booking-po" class="btn btn-sm btn-info" data-toggle="tooltip" title="Back">BACK</a>
      
     </div>
     <br>
  </div>
</div>
  </div>
<!--confirm modal-->
<div class="modal fade" id="ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
     <form id='conf_po_form' method='POST' action='dashboard-conf-send'>
  <div class="modal-dialog modal-danger" role="document">
    <div class="modal-content">
      <input type='hidden' class='po_id' name='po_id'>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
      <div>
        <input type='radio' name='po_status' id='rb_app' value='3'>Approve<br>
        <input type='radio' name='po_status' class='rb_one' value='5'>Request For Review<br>
        <input type='radio' name='po_status' class='rb_one' value='4'>Reject<br>
        <input type='text' name='comment' id='cmt_box'>
      </div>   
      </div>
      <div class="modal-footer">
        <button type="submit" name='confirm_po_btn' id='confirm_po_btn' class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
      </div>
     
    </div>
  </div> </form>
</div>

<!--confirm modal-->
</div>
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
$('.table .checkbox-box').click(function(){
	var tot_qty = 0;
	var tot_gross_wt = 0;
	$('.table').each(function() {
	tot_qty += Number($(this).parents('tr').find('.po_qty_list').html());
	});
	$('.table').each(function() {
	tot_gross_wt += Number($(this).parents('tr').find('.gross_weight').html());
	alert(tot_gross_wt);
  });
	$('#product_qty').html(tot_qty);
	$('#gross_weight').html(tot_gross_wt);
	console.log(tot_qty);
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
  function showall (c){
 	$('.status-menu li').removeClass('active');
	$('.status-menu li.'+c).addClass('active');
	$('#po tr').removeClass('blue-bg-tr');
	$('#status').html('');
	$('#po_date').html('');
	$('#Customer').html('');
	$('#Shipper').html('');
	$('#po_no').html('');
	$('#qty').html('');
	$('#gross_wt').html('');
	$('#volume').html('');
	$('#pack_type1').html('');
	$('#nbr1').html('');
	$('#pack_type2').html('');
	$('#nbr2').html('');
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
  $('#po tr').click(function(){
 	$('#po tr').removeClass('blue-bg-tr');
 	$(this).addClass('blue-bg-tr');
 	if($(this).hasClass("all")) return false;
	var i = 0;
 	$(this).find('td').each(function(){
	if(i==0) $('#status').html($(this).html());
	if(i==1) $('#po_date').html($(this).html());
	if(i==2) $('#Customer').html($(this).html());
	if(i==3) $('#Shipper').html($(this).html());
	if(i==4) $('#po_no').html($(this).html());
	if(i==5) $('#qty').html($(this).html());
	if(i==6) $('#gross_wt').html($(this).html());
	if(i==7) $('#volume').html($(this).html());
	if(i==8) $('#pack_type1').html($(this).html());
	if(i==9) $('#nbr1').html($(this).html());
	if(i==10) $('#pack_type2').html($(this).html());
	if(i==11) $('#nbr2').html($(this).html());
	i = i+1;
	});
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
