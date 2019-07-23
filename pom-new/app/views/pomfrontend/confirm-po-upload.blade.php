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
          <li><a href="#">Create a Booking</a></li>
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

    <div class="over-flow-scroll">
      
      <p>File Uploaded: <a href="#">PO Upload Electrocorp 2015 11 04.csv</a></p>
      <table id="po" class="table">
        <tbody><tr class="all">
          <td class="blue-bg">PO Creation Date</td>
          <td class="blue-bg">Customer</td>
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
        </tr>
        <tr>
          <td>2015-11-05</td>
          <td>Electrocorp</td>
          <td>Zhengji</td>
          <td>40001236</td>
          <td>2015-11-08</td>
          <td>10101225</td>
          <td>Red Front Cover C56</td>
          <td>Plastic Part</td>
          <td>1 000</td>
          <td>1 500</td>
          <td>USD</td>
          <td>120</td>
          <td>0,7</td>
          <td>Boxes</td>
          <td>8</td>
          <td>-</td>
          <td>-</td>
        </tr>
        <tr>
          <td>2015-11-05</td>
          <td>Electrocorp</td>
          <td>Zhengji</td>
          <td>40001237</td>
          <td>2015-11-08</td>
          <td>10101225</td>
          <td>Led Display B089</td>
          <td>Plastic Part</td>
          <td>1 000</td>
          <td>1 500</td>
          <td>USD</td>
          <td>120</td>
          <td>0,7</td>
          <td>Boxes</td>
          <td>8</td>
          <td>-</td>
          <td>-</td>
        </tr>
        <tr>
          <td>2015-11-05</td>
          <td>Electrocorp</td>
          <td>Tianjung</td>
          <td>10005666</td>
          <td>2015-11-08</td>
          <td>10101225</td>
          <td>PCB Module 232443A</td>
          <td>Plastic Part</td>
          <td>1 000</td>
          <td>1 500</td>
          <td>USD</td>
          <td>120</td>
          <td>0,7</td>
          <td>Boxes</td>
          <td>8</td>
          <td>-</td>
          <td>-</td>
        </tr>
              </tbody></table></div><br>
      <div class="text-right"><a href="confirm-po-upload-edit" class="btn btn-warning">Edit</a>
        <a href="po-upload-successfully" class="btn btn-success">Ok</a></div><br>
    </div>
      
      
      
      
      
    </div>
  
</div>
</div>
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
