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
<div class="container dashboard-page" style="min-height:500px;">
<div class="row">

<br>
<br>
<br>

    <div class="over-flow-scroll">
      <p>Please edit or confirm POs uploaded</p>
      <p>File Uploaded: <a href="#">PO Upload Electrocorp 2015 11 04.csv</a></p>
      <table id="po" class="table">
        <tbody><tr class="all">
          <td class="blue-bg" width="90">PO Creation Date</td>
          <td class="blue-bg">Customer</td>
          <td class="blue-cyan-bg">Shipper</td>
          <td class="blue-cyan-bg">PO N°</td>
          <td class="blue-cyan-bg" width="90">PO Date</td>
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
          <td><input type="text" class="datepicker" value="2015-11-05" style="width:80px;"></td>
          <td><input type="text" value="Electrocorp" style="width:80px;"></td>
          <td><select><option>Zhengji</option><option>Tianjung</option></select></td>
          <td><input type="text" value="40001236"  style="width:70px;"></td>
          <td><input type="text" class="datepicker" value="2015-11-08"  style="width:80px;"></td>
          <td><input type="text" value="10101225"></td>
          <td><input type="text" value="Red Front Cover C56"></td>
          <td><input type="text" value="Plastic Part"></td>
          <td><input type="text" value="1 000"></td>
          <td><input type="text" value="1 500"></td>
          <td>USD</td>
          <td><input type="text" value="120"></td>
          <td><input type="text" value="0,7"></td>
          <td><select><option>-</option><option selected value="Boxes">Boxes</option></select></td>
          <td><input type="text" value="8"></td>
          <td><select><option selected>-</option><option  value="Boxes">Boxes</option></select></td>
          <td><input type="text" value="-"></td>
        </tr>
        <tr>
          <td><input type="text" class="datepicker" value="2015-11-05"></td>
          <td><input type="text" value="Electrocorp"></td>
          <td><select><option>Zhengji</option><option>Tianjung</option></select></td>
          <td><input type="text" value="40001237"></td>
          <td><input type="text" class="datepicker" value="2015-11-08"></td>
          <td><input type="text" value="10101225"></td>
          <td><input type="text" value="Led Display B089"></td>
          <td><input type="text" value="Plastic Part"></td>
          <td><input type="text" value="1 000"></td>
          <td><input type="text" value="1 500"></td>
          <td>USD</td>
          <td><input type="text" value="120"></td>
          <td><input type="text" value="0,7"></td>
          <td><select><option>-</option><option selected value="Boxes">Boxes</option></select></td>
          <td><input type="text" value="8"></td>
          <td><select><option selected>-</option><option  value="Boxes">Boxes</option></select></td>
          <td><input type="text" value="-"></td>
        </tr>
        <tr>
          <td><input type="text" class="datepicker" value="2015-11-05"></td>
          <td><input type="text" value="Electrocorp"></td>
          <td><select><option>Zhengji</option><option selected>Tianjung</option></select></td>
          <td><input type="text" value="10005666"></td>
          <td><input type="text" class="datepicker" value="2015-11-08"></td>
          <td><input type="text" value="10101225"></td>
          <td><input type="text" value="PCB Module 232443A"></td>
          <td><input type="text" value="Plastic Part"></td>
          <td><input type="text" value="1 000"></td>
          <td><input type="text" value="1 500"></td>
          <td>USD</td>
          <td><input type="text" value="120"></td>
          <td><input type="text" value="0,7"></td>
          <td><select><option>-</option><option selected value="Boxes">Boxes</option></select></td>
          <td><input type="text" value="8"></td>
          <td><select><option selected>-</option><option  value="Boxes">Boxes</option></select></td>
          <td><input type="text" value="-"></td>
        </tr>
       
      </tbody></table>
      </div>
      <br>
      <div class="text-right">
      <a href="confirm-po-upload" class="btn btn-warning">Cancel Changes</a>
        <a href="po-upload-successfully.html" class="btn btn-success">Save Changes</a>
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
<script tpe="text/javascript">
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
