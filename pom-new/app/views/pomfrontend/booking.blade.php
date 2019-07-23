@include('pomfrontend.includes.header')
@include('pomfrontend.includes.sidebar')
<style>
.deletesec{background:none; background:url(img/deletepic.png) no-repeat; border:none; float:left; margin-right:2px; width:24px; height:24px;}
.editsec{background:none; background:url(img/editpic.png) no-repeat; border:none; float:left; margin-right:2px; width:24px; height:24px;}
.viewsec{background:none; background:url(img/viewpic.png) no-repeat; border:none; float:left; margin-right:2px; width:24px; height:24px;}
.confirmsec{background:none; background:url(img/confirmpic.png) no-repeat; border:none; float:left; margin-right:2px; width:24px; height:24px;}
.send_for_approval{background:none; background:url(img/send_for_approval.png) no-repeat; border:none; float:left; margin-right:2px; width:24px; height:24px;}
</style>

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
          <li class="active"><a href="<?php echo URL::to('booking-po'); ?>">Bookings Overview</a></li>
          <?php  $user_account_type=\Session::get('account_type');?>
          @if($user_account_type[0]->ACCOUNT_TYPE_ID == 2)
          <li><a href="<?php echo URL::to('create-booking'); ?>">Create Booking</a></li>
          @else
          @endif
<!--          <li><a href="#">Schedule Shipment</a></li>-->
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Portfolio Grid Section -->

  <div class="container" style="min-height:500px;">
  
<!--  <div class="row">
    <div class="col-lg-12">
    <div class="status-menu-box">
    	<ul class="status-menu">
        	<li>STATUS</li>
          <?php /*
          $all = '';
          foreach($count_booking_data as $data) { 
        $all = $all + $data->BOOKING_COUNT;
        }?>       
        
        <li class="all <?php if($page_filter == 'all'){echo 'active';} ?>"><a href="#"  onClick="return show_all('all');">All</a><div class="badge bg-danger">{{$all}}</div></li></li>
         @foreach($count_booking_data as $data)
           <li class="<?php if($page_filter == $data->STATUS_NAME){ echo 'active'; }?>"><a href="#"  onClick="return show_all('{{$data->STATUS_NAME}}');">{{$data->STATUS_NAME}}</a><div class="badge bg-danger">{{$data->BOOKING_COUNT}}</div></li>
          @endforeach   
            */ ?>
                 
        </ul>
        <div class="clearfix"></div>
        </div>
    </div>
    </div>-->
    <div class="clearfix"></div>
    <div class="spacer"></div>
  <div class="row">
    <form class="form-inline" role="form">
    <div class="extendsearch col-lg-1">
    <p style="color:#CE7243; line-height:20px;"><a href="javascript:void(0);"  style="color:#CE7243; font-size:16px;" onClick="extrafilter();"><strong>Filters </strong><i class="fa fa-chevron-circle-down" id="search_icon"></i></a>
    </p>
    </div>
     

      <!--working -->
      <div id="" >

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
            
            <button class="btn btn-xs btn-info" type='button' id='search-button' name='search'>Search</button>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12 with-border"></div>
      </form>
      <div>
@if(Session::has('success')) <br>
<div class="alert alert-info alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4> <i class="icon fa fa-check"></i> Success</h4>
{{ Session::get('success') }} </div>
@endif 
      </div>
<div class="spacer"></div>
    </div>
    <div class="spacer"></div>
    <div class="row">

      <div class="col-lg-9">
      <div class="over-flow-scroll">
        <table class="table" id="po">
         
          <tr class="all">
            <td class="cyan-bg">Status</td>
            <td class="grey-bg">Transport Mode</td>
            <td class="grey-bg">Shipping Mode</td>
            <td class="grey-bg">Incoterm at Origin</td>
            <td class="light-blue-bg">Pick-up Place</td>
            <td class="light-blue-bg">POL</td>
            <td class="light-blue-bg">POD</td>
            <td class="light-blue-bg">Delivery Place</td>
            <td class="light-cyan-bg">Requested Shipping Date</td>
            <td class="light-cyan-bg">Requested Delivery Date</td>
            <?php $user_account_type=\Session::get('account_type'); $user_account_type[0]->ACCOUNT_TYPE_ID ?>
              @if($user_account_type[0]->ACCOUNT_TYPE_ID == 2)
            <td class="green-bg" colspan='20' style="width:200px;">Action</td>
            @endif
          </tr>
          <?php foreach($fetch_booked_data as $data) { ?>
          <tr class="booked">
            <td>{{$data->STATUS_NAME}}</td>
            <td>{{$data->TRANSPORT_MODE_NAME}}</td>
            <td>{{$data->SHIPPING_MODE_NAME}}</td>
            <td>{{$data->INCOTERM_NAME}}</td>
            <td>{{$data->BOOKING_PICK_UP_PLACE}}</td>
            <td>{{$data->BOOKING_POL}}</td>
            <td>{{$data->BOOKING_POD}}</td>
            <td>{{$data->BOOKING_DELEVERY_PLACE}}</td>
            <td>{{$data->BOOKING_REQUESTED_SIPPING_DATE}}</td>
            <td>{{$data->BOOKING_REQUESTED_DELIVERY_DATE}}</td>
              <?php $user_account_type=\Session::get('account_type'); $user_account_type[0]->ACCOUNT_TYPE_ID ?>
              @if($user_account_type[0]->ACCOUNT_TYPE_ID == 2)
            <td colspan='20'>
              <?php $get_user_type = \Session::get('user_data'); $user_account_id=$get_user_type[0]->ACCOUNT_ID; $user_type=$get_user_type[0]->USER_TYPE; ?>
              
              @if($user_account_id == $data->ACCOUNT_ID && ($data->STATUS_NAME=='Booked (To be Confirmed)' || $data->STATUS_NAME=='Booking Review'))
              <a class='send_for_approval' data-toggle="tooltip" title="Send for Confirmation" href="<?php echo URL::to('/');?>/send-for-conf-booking/{{$data->BOOKING_ID}}"></a>
              <a class='editsec' data-toggle="tooltip" title="EDIT" href="<?php echo URL::to('/');?>/edit-booking/{{$data->BOOKING_ID}}"></a> 
              <a class='deletesec' data-toggle="tooltip" title="Delete" onClick="calltheshower(<?php echo $data->BOOKING_ID;?>);"></a>
              <a class='viewsec' data-toggle="tooltip" title="View" href="<?php echo URL::to('/');?>/view-booking/{{$data->BOOKING_ID}}"></a>
              
              @elseif($user_account_id == $data->ACCOUNT_ID && $user_type == 4 && ($data->STATUS_NAME =='Approval Awaiting' || $data->STATUS_NAME =='Rejected'))
              <a class='viewsec' data-toggle="tooltip" title="View" href="<?php echo URL::to('/');?>/view-booking/{{$data->BOOKING_ID}}"></a>
              @endif
             
              @if($user_account_id == $data->ACCOUNT_ID && $user_type == 3 && ($data->STATUS_NAME=='Booked (To be Confirmed)' || $data->STATUS_NAME =='Approval Awaiting'))
              <!--<a class='send_for_approval' data-toggle="tooltip" title="Send for Confirmation" href="<?php echo URL::to('/');?>/send-for-conf-booking/{{$data->BOOKING_ID}}"></a>-->
              <button data-toggle="modal" data-target="#ConfirmModal" data-id='{{$data->BOOKING_ID}}' type='button' class='confirmsec' name='confirm_booking' data-toggle="tooltip" title="Confirm"></button>
              <a class='editsec' data-toggle="tooltip" title="EDIT" href="<?php echo URL::to('/');?>/edit-booking/{{$data->BOOKING_ID}}"></a>  
              <a class='viewsec' data-toggle="tooltip" title="View" href="<?php echo URL::to('/');?>/view-booking/{{$data->BOOKING_ID}}"></a>
              @elseif($user_account_id == $data->ACCOUNT_ID && $user_type == 3 && $data->STATUS_NAME =='Booking Review')
              <a class='editsec' data-toggle="tooltip" title="EDIT" href="<?php echo URL::to('/');?>/edit-booking/{{$data->BOOKING_ID}}"></a> 
              <a class='viewsec' data-toggle="tooltip" title="View" href="<?php echo URL::to('/');?>/view-booking/{{$data->BOOKING_ID}}"></a>
              @endif
              
              @if($data->STATUS_NAME=='Confirmed (Waiting for Schedule)')
              <a class='' data-toggle="tooltip" title="Schudule Shipment" href='<?php echo URL::to('/');?>/shipment-status-updating/{{$data->BOOKING_ID}}'>Schudule Shipment</a>
              @endif

              @if($data->STATUS_NAME=='Booking Review')
              <button id='cmt_btn' name='cmt_btn' class='btn btn-sm' data-toggle="modal" data-target="#cmtModal" data-id='{{$data->BOOKING_ID}}' data-action='booking-comment-page'><i class="fa fa-comment-o"></i></button>
              @endif
             
            </td>
            @endif
          </tr>
          <?php } ?>
          <tbody class='search_data hide'>
          
        </tbody>
         
        </table>
        </div>
      </div>
      <form id='submit_id' method='POST'>
        <input type='hidden' id='hid_po_status' name="hid_po_status">
      </form>
      <div class="col-lg-3" style="overflow:auto">
       
        <table class="table">
          <tbody>
            <tr>
              <td colspan="2" class="blue-bg">Bookings Overview</td>
            </tr>
            
            <tr>
              <td>Status</td>
              <td><span id="status"></span></td>
            </tr>
            <tr>
              <td>Transport Mode</td>
              <td><span id="po_date"></span></td>
            </tr>
            <tr>
              <td>Shipping Mode</td>
              <td><span id="Customer"></span></td>
            </tr>
            <tr>
              <td>Incoterm at Origin</td>
              <td><span id="Shipper"></span></td>
            </tr>
            <tr>
              <td>Pick-up Place</td>
              <td><span id="po_no"></span></td>
            </tr>
            <tr>
              <td>POL</td>
              <td><span id="qty"></span></td>
            </tr>
            <tr>
              <td>POD</td>
              <td><span id="gross_wt"></span></td>
            </tr>
            <tr>
              <td>Delivery Place</td>
              <td><span id="volume"></span></td>
            </tr>
            <tr>
              <td>Requested Shipping Date</td>
              <td><span id="pack_type1"></span></td>
            </tr>
            <tr>
              <td>Requested Delivery Date</td>
              <td><span id="nbr1"></span></td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
<!--confirm modal-->
<div class="modal fade" id="ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
     <form id='conf_po_form' method='POST' action='booking-conf-send'>
  <div class="modal-dialog modal-danger" role="document">
    <div class="modal-content">
      <input type='hidden' class='booking_id' name='booking_id'>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Confirm</h4>
      </div>
      <div class="modal-body">
      <div>
        <input type='radio' name='booking_status' id='rb_app' value='16'>Confirm Booking<br>
        <input type='radio' name='booking_status' class='rb_one' value='26'>Request For Review<br>
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

<!--confirm modal-->

<!-- Comment Modal -->
  <div class="modal fade" id='cmtModal' role="dialog">
    <div class="modal-dialog">
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
<script src="<?php echo URL::to('/');?>/frontend/js/custom_validation.js"></script>
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
$('button[name="confirm_booking"]').on('click',function(){
  var confirm_modal=$('#ConfirmModal');
  var booking_id=$(this).data('id');
  $('.booking_id',confirm_modal).val(booking_id);
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
  /*function showall (c){
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
 }*/
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
<script>
function show_all(c){
 
  $('#hid_po_status').val(c);
  $('#submit_id').submit();
  
  //return false;
 }

</script>

<!--Page Script search -->

<script>
$('#search-button').click(function(){
  
var pick_up=$('#pick_up').val();
var pol=$('#pol').val();
var pod=$('#pod').val();
var delivery_place=$('#delivery_place').val();
var incoterm_origin=$('#incoterm_origin').val();
var datastring ='&pick_up='+pick_up
                +'&pol='+pol
                +'&pod='+pod
                +'&delivery_place='+delivery_place
                +'&incoterm_origin='+incoterm_origin;
 $.ajax({
                    type: "POST",
                    url : "booking-data-search",
                    data : datastring,
                    success : function(data){
                    $('.booked').addClass('hide');
                    $('.search_data').removeClass('hide');
                    $('.search_data').html(data);
                    console.log(data);
                      }
              },"json");
});
</script>

<!-- TOOLTIP-->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
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

<script>
function calltheshower(dataurlid)
 {
   if(confirm("Are you sure you want to delete this Booking ?")) {
        window.location.href ='<?php echo URL::to('delete-booking'); ?>/'+dataurlid;
    }
    return false;
 }
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
