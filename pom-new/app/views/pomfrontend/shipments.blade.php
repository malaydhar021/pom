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
          <li class="active"><a href="<?php echo URL::to('/');?>/shipments">Shipments Overview</a></li>
<!--          <li><a href="create-booking.html">Create Booking</a></li>
          <li><a href="origin-booking-confirmed.html">Confirm Booking</a></li>
          <li><a href="#">Confirm (Air)Port Arrival</a></li>
          <li><a href="#">Close Shipment</a></li>
          <li><a href="#">Despatch Shipment</a></li>-->
        </ul>
      </div>
    </div>
  </div>
</header>

  <div class="container">
<!--    <div class="row">
      <div class="col-lg-12">
        <div class="status-menu-box">
          <ul class="status-menu">
            <li>STATUS</li>

             <?php /*
          $all = '';
          foreach($count_shipping_data as $data) { 
        $all = $all + $data->BOOKING_COUNT;
        }?>       
            <li class="all <?php if($page_filter == 'all') echo 'active'; ?>"><a href="#" onClick="return show_all('all');">All<div class="badge bg-danger">{{$all}}</div></a></li>
            <?php foreach($count_shipping_data as $data_count) { ?>
            <li class="all <?php if($page_filter == $data_count->STATUS_ID ) echo 'active'; ?>"><a href="#"  onClick="return show_all('{{$data_count->STATUS_ID}}');">{{$data_count->STATUS_NAME}}<div class="badge bg-danger">{{$data_count->BOOKING_COUNT}}</div></a></li>
            <?php } */?>
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
          <p style="color:#CE7243; line-height:20px;"><a href="javascript:void(0);"  style="color:#CE7243; font-size:16px;" onClick="extrafilter();"><strong>Filters </strong><i class="fa fa-chevron-circle-down" id="search_icon"></i></a> </p>
        </div>


          
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
        <div class="clearfix"></div>
        <div class="col-lg-12 with-border"></div>
      </form>
      <div class="spacer"></div>
    </div>
    <div class="spacer"></div>
<div>
      <!--Success Massage-->  
@if(Session::has('success')) <br>
<div class="alert alert-info alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4> <i class="icon fa fa-check"></i> Success</h4>
{{ Session::get('success') }} </div>
@endif 
      </div>
    <div class="row">

      <div class="col-lg-9" style="overflow:auto;">
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
            <td class="green-bg" style="width:200px;">Action</td>
          </tr>

          @foreach($shipping_data as $data)
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
            <?php  $acc_type = \Session::get('account_type'); //user account type get from the session ?>
            @if($acc_type[0]->ACCOUNT_TYPE_ID == 2)

            @if($data->STATUS_NAME =='Scheduled')

            <td>
              <a data-toggle="tooltip" title="Receive Cargo" href="<?php echo URL::to('/');?>/recive-cargo/{{$data->BOOKING_ID}}">Receive Cargo</a>
              
            </td>
            @endif
            @if($data->STATUS_NAME =='Received')
            <td><a data-toggle="tooltip" title="Ship" href="<?php echo URL::to('/');?>/ship/{{$data->BOOKING_ID}}">Ship</a>
              &nbsp; 
              <a data-toggle="tooltip" title="Undo" href="<?php echo URL::to('/');?>/booking-revart/{{$data->BOOKING_ID}}"><i class="fa fa-undo"></i></a>
            </td>
            
            @endif
            @if($data->STATUS_NAME =='Shipped')
            <td><a data-toggle="tooltip" title="Deliver at Air/Port" href="<?php echo URL::to('/');?>/deliver/{{$data->BOOKING_ID}}">Deliver at Air/Port</a></td>
            @endif
            @if($data->STATUS_ID =='20')
            <td><a data-toggle="tooltip" title="Dispatch / Deliver" href="<?php echo URL::to('/');?>/despatch-deliver/{{$data->BOOKING_ID}}"> Despatch / Deliver</a></td>
            @endif
            @if($data->STATUS_ID =='23')
            <td></td>
            @endif
            @if($data->STATUS_NAME=='Despatched')
            <td><a data-toggle="tooltip" title="Update Despatch" href="<?php echo URL::to('/');?>/update-despatch/{{$data->BOOKING_ID}}"> Update Despatch</a></td>
            @endif
             @if($data->STATUS_ID=='22')
             <td><a data-toggle="tooltip" title="View" href="<?php echo URL::to('/');?>/deliverd/{{$data->BOOKING_ID}}"> View</a></td>
             @endif
            @endif
            @if($acc_type[0]->ACCOUNT_TYPE_ID == 3)
              <td><a data-toggle='tooltip' title='View' href='<?php echo URL::to('/');?>/deliverd/{{$data->BOOKING_ID}}'> View</a></td>
            @endif
            
          </tr>
          @endforeach
          <tbody class='search_data'>
            

          </tbody>
          
        </table>
      </div>
       <form id='submit_id' method='POST'>
        <input type='hidden' id='hid_po_status' name="hid_po_status">
      </form>
      <div class="col-lg-3" style="overflow:auto">
        <table class="table">
          <tbody>
            <tr>
              <td colspan="2" class="blue-bg">Shipments Overview</td>
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
	} else if(c == 'Received') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.Received').show();
	} else if(c == 'Scheduled') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.Scheduled').show();
	} else if(c == 'Shipped') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.Shipped').show();
	} else if(c == 'delivered-at-air-port') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.delivered-at-air-port').show();
	} else if(c == 'Despatched') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.Despatched').show();
	} else if(c == 'Delivered') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.Delivered').show();
	} else if(c == 'Closed') {
		$('#po tr').hide();
		$('#po tr.all').show();
		$('#po tr.Closed').show();
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
                    url : "shipments-data-search",
                    data : datastring,
                    success : function(data){
                    $('.booked').addClass('hide');
                    $('.search_data').removeClass('hide');
                    $('.search_data').html(data);
                    console.log(data);
                      }
              },"json");
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
