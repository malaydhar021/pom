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
    <div class="row"></div>
  </div>
</header>
<!-- Portfolio Grid Section -->

  <div class="container" style="min-height:700px;">
    <div class="row">
      <div class="col-lg-6">
        <h4>ACTIONS</h4>
        <table class="table">
          <tr>
            <td colspan="7">PO waiting for approval</td>
          </tr>
          <tr>
            <td class="green-bg">Status</td>
            <td class="blue-bg">PO Creation Date</td>
          <?php $user_account_type=\Session::get('account_type'); $user_account_type[0]->ACCOUNT_TYPE_ID ?>
          @if($user_account_type[0]->ACCOUNT_TYPE_ID == 2)
          <td class="blue-bg">Customer</td>
          @elseif($user_account_type[0]->ACCOUNT_TYPE_ID == 3)
          <td class="blue-bg">Forwarder</td>
          @endif
            <td class="blue-bg">Shipper</td>
            <td class="blue-bg">PO N°</td>
            <td class="cyan-bg" colspan='2'>Action</td>
          </tr>
          @if(empty($show_awiting_list))
          <tr>
            <td colspan="7">NO RECORD</td>
          </tr>
          @endif
          @foreach($show_awiting_list as $data)
          <tr>
            <td>{{$data->STATUS_NAME}}</td>
            <td>{{$data->PO_CREATION_DATE}}</td>
            @if($user_account_type[0]->ACCOUNT_TYPE_ID == 2)
            <td>{{$data->CUSTOMER_NAME}}</td>
            @else
            <td>{{$data->FWDR_NAME}}</td>
            @endif
            <td>{{$data->SHIPPER_NAME}}</td>
            <td>{{$data->PO_NUMBER}}</td>
            <td>
            <button name='conf_po' class='btn btn-xs btn-success' data-toggle="modal" data-target="#ConfirmModal" data-id='{{$data->PO_ID}}'  >Confirm PO</a></td>
          </tr>
          @endforeach
        </table>
        <table class="table">
          <tr>
            <td colspan="7">Bookings waiting for approval</td>
            
          </tr>
           <tr>
            <td class="green-bg">Status</td>
            <td class="blue-bg">Transport Mode</td>
          <?php //$user_account_type=\Session::get('account_type'); $user_account_type[0]->ACCOUNT_TYPE_ID ?>
          
          <td class="blue-bg">Shipping Mode</td>
            <td class="blue-bg">POL</td>
            <td class="blue-bg">POD</td>
            <td class="cyan-bg" colspan='2'>Action</td>
          </tr>
          @if(empty($show_booking_awiting_list))
          <tr>
            <td colspan="7">NO RECORD</td>
          </tr>
          @endif
          @foreach($show_booking_awiting_list as $data)
          <tr>
            <td>{{$data->STATUS_NAME}}</td>
            <td>{{$data->TRANSPORT_MODE_NAME}}</td>
            <td>{{$data->SHIPPING_MODE_NAME}}</td>
            <td>{{$data->BOOKING_POL}}</td>
            <td>{{$data->BOOKING_POD}}</td>
            <td>
            <button data-tolgle="tooltip" data-toggle="modal" data-target="#Confirm_booking_Modal_new" data-id='{{$data->BOOKING_ID}}' type='button' class='btn btn-xs btn-success' name='confirm_booking'  title="Confirm">Confirm Booking</button>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="col-lg-6">
        <h4>DASHBOARD</h4>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script> 
        <script type="text/javascript">
      google.load("visualization","1",{packages:["corechart"]});google.setOnLoadCallback(drawChart);
function drawChart()
{
var data = google.visualization.arrayToDataTable([['Dinosaur','Length'],
['Acrocanthosaurus (top-spined lizard)',12.2],
['Albertosaurus (Alberta lizard)',9.1],
['Allosaurus (other lizard)',12.2],
['Apatosaurus (deceptive lizard)',22.9],
['Archaeopteryx (ancient wing)',0.9],
['Argentinosaurus (Argentina lizard)',36.6],
['Baryonyx (heavy claws)',9.1],
['Brachiosaurus (arm lizard)',30.5],
['Ceratosaurus (horned lizard)',6.1],
['Coelophysis (hollow form)',2.7],
['Compsognathus (elegant jaw)',0.9],
['Deinonychus (terrible claw)',2.7],
['Diplodocus (double beam)',27.1],
['Dromicelomimus (emu mimic)',3.4],
['Gallimimus (fowl mimic)',5.5],
['Mamenchisaurus (Mamenchi lizard)',21.0],
['Megalosaurus (big lizard)',7.9],
['Microvenator (small hunter)',1.2],
['Ornithomimus (bird mimic)',4.6],
['Oviraptor (egg robber)',1.5],
['Plateosaurus (flat lizard)',7.9],
['Sauronithoides (narrow-clawed lizard)',2.0],
['Seismosaurus (tremor lizard)',45.7],       
['Spinosaurus (spiny lizard)',12.2],       
['Supersaurus (super lizard)',30.5],       
['Tyrannosaurus (tyrant lizard)',15.2],
['Ultrasaurus (ultra lizard)',30.5],        
['Velociraptor (swift robber)',1.8]]);

var options ={title:'Order Management, in number',legend:{position:'none'},colors: ['green'],  
};

var chart =new google.visualization.Histogram(document.getElementById('chart_div'));
        chart.draw(data, options);
}
</script>
        <div id="chart_div" style="width:100%; border:1px solid #7D7A7A; height:300px;"></div>
        <div class="spacer"></div>
      </div>
    </div>
  </div>
  </div>
    
<!--confirm modal-->
<div class="modal fade" id="ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
     
  <div class="modal-dialog modal-danger" role="document">
    <div class="modal-content">
      <form id='conf_po_form' method='POST' action='dashboard-conf-send'>
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
        <textarea name='comment' id='cmt_box' rows="4" cols="25"></textarea>
      </div>   
      </div>
      <div class="modal-footer">
        <button type="submit" name='confirm_po_btn' id='confirm_po_btn' class="btn btn-primary" data-toggle="tooltip" title="Confirm">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="tooltip" title="CANCEL">CANCEL</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--confirm modal-->
<!--booking confirm model -->

<div class="modal fade" id="Confirm_booking_Modal_new" tabindex="-1" role="dialog" aria-labelledby="Confirm_booking_ModalLabel">
     
  <div class="modal-dialog modal-danger" role="document">
    <div class="modal-content">
      <form id='conf_booking_form' method='POST' action='booking-conf-send'>
      <input type='hidden' class='booking_id' name='booking_id'>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Confirm</h4>
      </div>
      <div class="modal-body">
      <div>
        <input type='radio' name='booking_status' id='rb_conf' value='16'>Confirm Booking<br>
        <input type='radio' name='booking_status' class='rb_review' value='26'>Request For Review<br>
        <input type='text' name='comment' id='booking_cmt_box'>
      </div>   
      </div>
      <div class="modal-footer">
        <button type="submit" name='confirm_po_btn' id='confirm_booking_btn' class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!--booking confirm modal-->

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
<!--page script-->
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

<!--page script-->
<script>
$(document).ready(function () {
    $("#booking_cmt_box").hide();
    $(".rb_review").click(function () {
    $("#booking_cmt_box").show();
    });
    $("#rb_conf").click(function () {
    $("#booking_cmt_box").hide();
    });
});

</script>
<!--page script-->

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
<!-- TOOLTIP-->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

<!-- Page Script for booking confirmation -->
<script>
$('button[name="confirm_booking"]').click(function(){

  var confirm_booking_modal=$('#Confirm_booking_Modal_new');
  var booking_id=$(this).data('id');
  $('.booking_id',confirm_booking_modal).val(booking_id);
  confirm_booking_modal.modal({ show: true });
return false;
});
$('#confirm').modal({ backdrop: 'static', keyboard: false })
.one('click','#confirm_booking_btn', function() {
$('#conf_booking_form').trigger('submit'); // submit the form
});
</script> 

<!--Page Script-->
<script>
$('#confirm_booking_btn').click(function(){
  if ( (conf_booking_form.booking_status[0].checked == false ) && (conf_booking_form.booking_status[1].checked == false ) )
{
alert ( "Please choose your Action" );
return false;
}
});
</script>

<!--Page Script-->
<script>
$('#confirm_po_btn').click(function(){
  if ( (conf_po_form.po_status[0].checked == false ) && (conf_po_form.po_status[1].checked == false ) )
{
alert ( "Please choose your Action" );
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
