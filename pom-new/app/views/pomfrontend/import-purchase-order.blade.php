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
          <li><a href="po-overview.html">PO Overview</a></li>
          <li class="active"><a href="create-purchase-order">Add a PO</a></li>
          <li><a href="create-booking.html">Create a Booking</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Portfolio Grid Section -->
<div class="container dashboard-page" style="min-height:500px;">
<div class="row">

<br>
<br>
<br>

    <div class="col-sm-12" style="margin-bottom:25px;">
      <div class="col-lg-3"> </div>
      <div class="col-lg-6"> <form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><img src="img/upload-computer.jpg" alt=""></label>
    <div class="col-sm-10">
    <div style="margin-bottom:10px;">Upload from computer</div>
      <div id="input-file"><input type="file" class="file" placeholder="Select a file" style="margin-bottom:10px;"></div>
      
      <a href="#" id="add-another" class="btn btn-danger btn-xs" style="margin-bottom:10px; display:none;">Select another file</a> 
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <a href="confirm-po-upload" type="submit" class="btn btn-default">Submit</a>
    </div>
  </div>
</form> </div>
      <div class="col-lg-3"> </div>
      </div>
      
      <div class="col-sm-12">
      <div class="col-lg-3"> </div>
      <div class="col-lg-6"> <form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><img src="img/download-computer.jpg" alt=""></label>
    <div class="col-sm-10">
    <div style="margin-bottom:10px;">Download the PO Template in Excel</div>
    <a href="download-po-template.html" class="btn btn-primary">Click here to download</a>
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
<script type="text/javascript">
$('.file').change(function(){
	$('#add-another').fadeIn();
});
$('#add-another').click(function(){
	$('#input-file').append('<input type="file" class="file" placeholder="Select a file" style="margin-bottom:10px;">');
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
