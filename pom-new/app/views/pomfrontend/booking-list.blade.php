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
          <li class="active"><a href="<?php echo URL::to('create-booking'); ?>">Booking List</a></li>
          <li><a href="#">Schedule Shipment</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Portfolio Grid Section -->

  <div class="container" style="min-height:500px;">
  
  <div class="row">
    <div class="col-lg-12">
    <div class="status-menu-box">
    	<ul class="status-menu">
        	<li>STATUS</li>
            <li class="all active"><a href="#"  onClick="return showall('all');">All</a></li>
            <li class="booked"><a href="#"  onClick="return showall('booked');">Booked (To be Confirmed)</a></li>
            <li class="confirmed"><a href="#"  onClick="return showall('confirmed');">Confirmed (Waiting for Schedule)</a></li>
        </ul>
        <div class="clearfix"></div>
        </div>
    </div>
    </div>
    <div class="clearfix"></div>
    <div class="spacer"></div>
  <div class="row">
    <form class="form-inline" role="form">
    <div class="extendsearch col-lg-1">
    <p style="color:#CE7243; line-height:20px;"><a href="javascript:void(0);"  style="color:#CE7243; font-size:16px;" onClick="extrafilter();"><strong>Filters </strong><i class="fa fa-chevron-circle-down" id="search_icon"></i></a>
    </p>
    </div>
      <div class="col-lg-11 searchboxex">
<div class="col-lg-1">
<div class="form-group">
  <label for="usr">Status:</label>
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <input type="text" class="form-control" id="">
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <label for="usr">PO N&deg;:</label>
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <input type="text" class="form-control" id="">
</div>
</div>

<div class="col-lg-1">
<div class="form-group">
  <label for="usr">Customer:</label>
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <input type="text" class="form-control" id="">
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <label for="usr">Shipper:</label>
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <input type="text" class="form-control" id="">
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <label for="usr">PO Date:</label>
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <input type="text" class="form-control" id="">
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <label for="usr">Product PN:</label>
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <input type="text" class="form-control" id="">
</div>
</div>


      </div>
      <div id="hiddensec" >

      <div class="col-lg-11 searchboxex" style="margin-top:5px;">
<div class="col-lg-1">
<div class="form-group">
  <label for="usr">Pick-Up:</label>
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <input type="text" class="form-control" id="">
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <label for="usr">POL:</label>
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <input type="text" class="form-control" id="">
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <label for="usr">POD:</label>
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <input type="text" class="form-control" id="">
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <label for="usr">Delivery Place:</label>
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <input type="text" class="form-control" id="">
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <label for="usr">Incoterm Origin:</label>
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <input type="text" class="form-control" id="">
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <label for="usr">Incoterm Destination:</label>
</div>
</div>
<div class="col-lg-1">
<div class="form-group">
  <input type="text" class="form-control" id="">
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
    <div class="row">
    <div class="col-lg-12 leftersec">
    
    <form name="select_po" action="" method="post">
    <div class="over-flow-scroll">
    <?php 
	//print_r($po_overview);
	?>
    
      <table class="table">
        <tr>
          <td class="red-bg">Add to Booking ?</td>
          <td class="blue-bg">PO Creation Date</td>
          <td class="blue-bg">Customer</td>
          <td class="blue-bg">Shipper</td>
          <td class="blue-bg">Consine Name</td>
          <td class="blue-bg">PO N°</td>
          <td class="darkgray-bg">Product PN</td>
          <td class="darkgray-bg">Product Name</td>
          <td class="darkgray-bg">Product Value</td>
          <td class="darkgray-bg">Product Currency</td>
          <td class="cyan-bg">Product Qty</td>
          <td class="cyan-bg">Gross Wt (kgs)</td>
          <td class="cyan-bg">Volume (cbm)</td>
          <td class="orrange-bg">Packing Type 1</td>
          <td class="orrange-bg">Nbr of  1</td>
          <td class="orrange-bg">Packing Type 2</td>
          <td class="orrange-bg">Nbr of 2</td>
          
          
        </tr>
        
            <?php 
			$k=0;
			foreach($po_overview as $data) {
			$k++; ?>
			
        <tr>
          <td><span class="checkbox-box"><input type="checkbox" name="selected_po[]" value="{{$data->PO_ID}}" <?php foreach($selected_po_ids as $po_ID){ if($data->PO_ID == $po_ID->PO_ID){ echo 'checked';} }?> id="box<?php echo $k; ?>"><label for="box<?php echo $k; ?>"></label></span></td>
          <td>{{$data->PO_CREATION_DATE}}</td>
          <td>{{$data->CUSTOMER_NAME}}</td>
          <td>{{$data->SHIPPER_NAME}}</td>
          <td>{{$data->CONSINE_NAME}}</td>
          <td>{{$data->PO_NUMBER}}</td>
          <td>{{$data->PO_PRODUCT_PN}}</td>
          <td>{{$data->PO_PRODUCT_NAME}}</td>
          <td>{{$data->PO_CBM_VOLUME}}</td>
          <td>{{$data->PO_CURRENCY}}</td>
          <td class="po_qty_list">{{$data->PO_PRODUCT_QTY}}</td>
          <td class="gross_weight">{{$data->PO_GROSS_WEIGHT}}</td>
          <td class="product_cbm_vol">{{$data->PO_CBM_VOLUME}}</td>
          <td>{{$data->PO_PACKING_TYPE1}}</td>
          <td>{{$data->PO_NBR1}}</td>
          <td>{{$data->PO_PACKING_TYPE2}}</td>
          <td>{{$data->PO_NBR2}}</td>
          
          
        </tr>
        <?php } ?>
     </table>
      </div>
      <div class="over-flow-scroll">
        <table class="table">
        <tr>
          <td style="width:680px;display:block;">&nbsp;</td>
          <td class="cyan-bg">Product Qty</td>
          <td class="cyan-bg">Gross Wt (kgs)</td>
          <td class="cyan-bg">Volume (cbm)</td>
          <td class="orrange-bg">Packing Type 1</td>
          <td class="orrange-bg">Nbr of  1</td>
          <td class="orrange-bg">Packing Type 2</td>
          <td class="orrange-bg">Nbr of 2</td>
        </tr>
       
        <tr>
          <td><div role="alert" class="alert alert-success"> TOTAL FOR THE BOOKING </div></td>
          <td><span id="product_qty">0</span></td>
          <td><span id="gross_weight">0</span></td>
          <td><span id="product_cbm_vol">0</span></td>
          <td>Boxes</td>
          <td>8</td>
          <td>-</td>
          <td>-</td>
        </tr>
      </table>
     </div>
     
    </div>
    <div class="clearfix"></div>
    <br>
<div class="text-right">
   
    
      <button class="btn btn-success" id='next_button' name='add_to_list' type='submit' data-toggle="tooltip" title="Add To List">Add To List</a>    </div>
      </form>
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
      </form>
    </div>
  </div>
</div>
</DIV>
<!--confirm modal-->

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
  var tot_cbm_vol =0;
	$('.table .checkbox-box input[type="checkbox"]:checked').each(function() {
	tot_qty += Number($(this).parents('tr').find('.po_qty_list').html());
	});
	$('.table .checkbox-box input[type="checkbox"]:checked').each(function() {
	tot_gross_wt += Number($(this).parents('tr').find('.gross_weight').html());
	});
  $('.table .checkbox-box input[type="checkbox"]:checked').each(function() {
  tot_cbm_vol += Number($(this).parents('tr').find('.product_cbm_vol').html());//working
  });
   
	$('#product_qty').html(tot_qty);
	$('#gross_weight').html(tot_gross_wt);
  $('#product_cbm_vol').html(tot_cbm_vol);//working
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
<script type="text/javascript">

  $('#next_button').click(function(){
    var cbk_val =$('input:checked');
        if(cbk_val.length == 0){
          alert('CHECK AT LIST ONE PO');
      return false;      
        }
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
