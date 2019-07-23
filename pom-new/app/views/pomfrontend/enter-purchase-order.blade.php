@include('pomfrontend.includes.header')
@include('pomfrontend.includes.sidebar')
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
          <li><a href="<?php echo URL::to('/');?>/po-overview">PO Overview</a></li>
          <li  class="active"><a href="<?php echo URL::to('/');?>/create-purchase-order">Add a PO</a></li>
          
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Portfolio Grid Section -->
<div class="container dashboard-page" style="min-height:700px;">
<div class="row">

<br>
<br>
<br>

    <div class="col-sm-12" style="margin-bottom:25px;">

      <div class="col-lg-3"> </div>
      <div class="col-lg-6"> 
        <form class="form-horizontal" role="form" method='post'>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><img src="<?php echo URL::to('/');?>/frontend/img/enter-purchase-order.jpg" alt=""></label>
    <?php $acc_type=Session::get('account_type');$acc_type[0]->ACCOUNT_TYPE_ID; ?> 
    <?php if($acc_type[0]->ACCOUNT_TYPE_ID == 2): ?>
    <div class="col-sm-10">
    <div style="margin-bottom:10px;">Select the Customer</div>
      <select class="form-control" name='customer_id' required>
        <option value="" selected>--Select Customer Name--</option>
        @foreach($customer_name as $data)
        <option value='{{$data->CUSTOMER_ID}}'>{{$data->CUSTOMER_NAME}}</option>
        @endforeach
      </select>
    </div>
    <?php elseif($acc_type[0]->ACCOUNT_TYPE_ID == 3): ?>
    <div class="col-sm-10">
      
    <div style="margin-bottom:10px;">Select the Forwarder</div>
      <select class="form-control" name='forwarder_id' required>
        <option value="" selected>--Select Forwarder Name--</option>
        @foreach($forwarder_name as $data)
        <option value='{{$data->FWDR_ID}}'>{{$data->FWDR_NAME}}</option>
        @endforeach
      </select>
    </div>
    
    <?php endif; ?>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type='submit' name='submit_company_name' class="btn btn-default" data-toggle="tooltip" title="Next">Next</button>
    </div>
  </div>
</form> </div>
      <div class="col-lg-3"> </div>
      </div>
      
      <div class="col-sm-12">
      <div class="col-lg-3"> </div>
      <div class="col-lg-6"> <form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">&nbsp;</label>
    <div class="col-sm-10">
    <div style="margin-bottom:10px;">Don’t find your customer ?</div>
    <a href="#" class="btn btn-primary">Click here to ask authorization or customer profile creation</a>
    </div>
  </div>
  
</form> </div>
      <div class="col-lg-3"> </div>
      </div>
    </div>
  
</div>
  </div>
</div>
<!-- Footer -->
@include('pomfrontend.includes.footer')
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm"> <a class="btn btn-primary" href="#page-top"> <i class="fa fa-chevron-up"></i> </a> </div>
<!-- jQuery -->
<script src="<?php echo URL::to('/'); ?>/frontend/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo URL::to('/'); ?>/frontend/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/frontend/js/classie.js"></script>
<script src="<?php echo URL::to('/'); ?>/frontend/js/cbpAnimatedHeader.js"></script>
<!-- Contact Form JavaScript -->
<script src="<?php echo URL::to('/'); ?>/frontend/js/jqBootstrapValidation.js"></script>
<script src="<?php echo URL::to('/'); ?>/frontend/js/contact_me.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo URL::to('/'); ?>/frontend/js/freelancer.js"></script>
<script type="text/javascript">
$('.file').change(function(){
	$('#add-another').fadeIn();
});
$('#add-another').click(function(){
	$('#input-file').append('<input type="file" class="file" placeholder="Select a file" style="margin-bottom:10px;">');
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
