@include('admin.includes.header')
<body id="page-top" class="index">
<!-- Navigation -->
@include('admin.includes.navbar')
<!-- Header --> 

<!-- Header -->
<header>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="top-menu">
          <li ><a href="new-customer">Customer</a></li>
          <li ><a href="new-forwarder">Forwarder</a></li>
          <li ><a href="new-supplier">Supplier</a></li>
          <li><a href="new-qc-agent">QC Agent</a></li>
          <li   class="active"><a href="warehouse">Warehouse</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Portfolio Grid Section -->

<div class="container min-height-maintainer" >
  <div class="row">
    <form class="form-horizontal">
      <!-- Text input-->
      <div class="col-sm-4">
      <div class="form-group">
        <label class="col-md-4 control-label" for="customer_name">Warehouse Name</label>
        <div class="col-md-8">
          <input id="customer_name" name="customer_name" type="text" placeholder="Forwarder Name" class="form-control input-md" value="Bansard">
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="email">Email ID </label>
        <div class="col-md-8">
          <input id="email" name="email" type="text" placeholder="Email ID" class="form-control input-md" value="bansard@gmail.com">
        </div>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group">
        <label class="col-md-4 control-label" for="cname">Company Name </label>
        <div class="col-md-8">
          <input id="cname" name="cname" type="text" placeholder="Company Name" value="Bansard International" class="form-control input-md">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="Address">Address </label>
        <div class="col-md-8">
          <textarea id="Address" name="Address" placeholder="Address" class="form-control input-md">SHANGHAI - China Head Office, Room 901, Central Plaza
227 Huang Pi North Road
200003 SHANGHAI</textarea>
        </div>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group">
        <label class="col-md-4 control-label" for="Country">Country </label>
        <div class="col-md-8">
          <select class="form-control input-md" name="Country" id="Country"><option>Select Country</option><option selected>India</option><option>China</option></select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="Zip">Zip </label>
        <div class="col-md-8">
          <input id="Zip" name="Zip" type="text" placeholder="Zip" value="51421" class="form-control input-md">
        </div>
      </div>
      </div>
      <!-- Multiple Checkboxes -->
      <div class="form-group">
        <table class="table table-bordered table-striped table-responsive">
          <thead>
            <tr>
              <th colspan="3">Check Privilege</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><div class="checkbox">
                  <label for="checkboxes-0">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-0" value="1">
                    Create Warehouse Branch </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-1">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-1" value="2">
                    Create Sub-admin </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-2">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-2" value="3">
                    Manage Employee </label>
                </div></td>
            </tr>
            <tr>
              <td><div class="checkbox">
                  <label for="checkboxes-2">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-30" value="3">
                    Manage Inventory </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-3">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-33" value="4">
                    Generate Purchase Requisition </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-4">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-43" value="5">
                    Manage Equipment </label>
                </div></td>
            </tr>
            <tr>
              <td><div class="checkbox">
                  <label for="checkboxes-5">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-5" value="6">
                    Messaging section / news </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-6">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-6" value="7">
                    Manage warehouse items </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-7">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-7" value="8">
                    Fleet Management / Fleet Scheduling </label>
                </div></td>
            </tr>
            <tr>
              <td><div class="checkbox">
                  <label for="checkboxes-8">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-8" value="9">
                    Item Scheduling </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-9">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-9" value="10">
                    Manage Receiving Status </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-10">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-10" value="11">
                    Manage Payment </label>
                </div></td>
            </tr>
            <tr>
              <td><div class="checkbox">
                  <label for="checkboxes-11">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-11" value="12">
                    Generate Invoice </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-12">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-12" value="12">
                    Manage Damaged Material Status </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-13">
                    <input type="checkbox" name="checkboxes" class="checky" checked data-size="mini" id="checkboxes-13" value="13">
                    Data Backup </label>
                </div></td>
            </tr>
          </tbody>
        </table>
        <div class="form-group">
  <div class="text-right col-sm-10 pull-right">
    <div id="button1idGroup" class="btn-group" role="group" aria-label="Button Group">
      <a href="warehouse-list"><button type="button" id="button1id" name="button1id" class="btn btn-danger btn-sm bacckky" aria-label="Left Button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button></a>
      
      <button type="button" id="button2id" name="button2id" class="btn btn-success btn-sm" aria-label="Left Button">Save <span class="glyphicon glyphicon-floppy-disk"></span></button>
    </div>
      </div>
      </div>
      </div>
    </form>
  </div>
</div>

<!-- Footer -->
@include('admin.includes.footer')
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm"> <a class="btn btn-primary" href="#page-top"> <i class="fa fa-chevron-up"></i> </a> </div>
<!-- jQuery --> 
<script src="<?php echo URL::to('/'); ?>/admin/js/jquery.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="<?php echo URL::to('/'); ?>/admin/js/bootstrap.min.js"></script> 
<!-- Plugin JavaScript --> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> 
<script src="<?php echo URL::to('/'); ?>/admin/js/classie.js"></script> 
<script src="<?php echo URL::to('/'); ?>/admin/js/cbpAnimatedHeader.js"></script> 
<!-- Contact Form JavaScript --> 
<script src="<?php echo URL::to('/'); ?>/admin/js/jqBootstrapValidation.js"></script> 
<script src="<?php echo URL::to('/'); ?>/admin/js/contact_me.js"></script> 
<!-- Custom Theme JavaScript --> 
<script src="<?php echo URL::to('/'); ?>/admin/js/freelancer.js"></script> 
<script src="<?php echo URL::to('/'); ?>/admin/js/bootstrap-switch.js"></script> 
<script type="text/javascript">
$("[class='checky']").bootstrapSwitch();
</script>
<style type="text/css">
.bacckky{ margin-right:5px; float:left;}
</style>
</body>
</html>
