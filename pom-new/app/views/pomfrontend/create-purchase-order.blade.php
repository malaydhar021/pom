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
          <li><a href="po-overview">PO Overview</a></li>
          <li class="active"><a href="create-purchase-order">Add a PO</a></li>
          
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

    <p style="color:#aa6708;">Choose which way you want to add PO </p>
      
      <div style="text-align:center; padding-top:5%;" class="col-lg-6"> <a href="enter-purchase-order"><img src="<?php echo URL::to('/');?>/frontend/img/enter-po.jpg"></a>
        <p>Enter PO</p>
      </div>
      <div style="text-align:center; padding-top:5%;" class="col-lg-6"> <a href="import-purchase-order"><img src="<?php echo URL::to('/');?>/frontend/img/import-po.jpg"></a>
        <p>Import PO</p>
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
