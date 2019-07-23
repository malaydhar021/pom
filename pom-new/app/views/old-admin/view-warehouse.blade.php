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
          <li><a href="new-supplier">Supplier</a></li>
          <li><a href="new-qc-agent">QC Agent</a></li>
          <li   class="active"><a href="warehouse">Warehouse</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Portfolio Grid Section -->

<div class="container  min-height-maintainer" >
  <div class="row">
    <form class="form-horizontal">
      <!-- Text input-->
      <div class="col-sm-4">
      <div class="form-group firstnamer">
        <label class="col-md-4 control-label" for="customer_name">Warehouse Name :</label>
        <div class="col-md-8">
          <span class="valler">Bansard</span>
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="email">Email ID :</label>
        <div class="col-md-8">
        <span class="valler">bansard@gmail.com</span>
          
        </div>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group">
        <label class="col-md-4 control-label" for="cname">Company Name </label>
        <div class="col-md-8">
          <span class="valler">Bansard International</span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="Address">Address </label>
        <div class="col-md-8">
          <span class="valler">
          <div style="line-height:20px;">SHANGHAI - China Head Office,
Room 901, Central Plaza<br>
227 Huang Pi North  Road<br>
200003 SHANGHAI</div></span>
        </div>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group">
        <label class="col-md-4 control-label" for="Country">Country </label>
        <div class="col-md-8">
          <span class="valler">India</span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="Zip">Zip </label>
        <div class="col-md-8">
         <span class="valler">51421</span>
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
<span class="label label-nwprimary">Yes</span>                    Create Warehouse Branch </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-1">
<span class="label label-nwprimary">Yes</span>                    Create Sub-admin </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-2">
<span class="label label-nwprimary">Yes</span>                    Manage Employee </label>
                </div></td>
            </tr>
            <tr>
              <td><div class="checkbox">
                  <label for="checkboxes-2">
<span class="label label-nwprimary">Yes</span>                    Manage Inventory </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-3">
<span class="label label-nwprimary">Yes</span>                    Generate Purchase Requisition </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-4">
<span class="label label-nwprimary">Yes</span>                    Manage Equipment </label>
                </div></td>
            </tr>
            <tr>
              <td><div class="checkbox">
                  <label for="checkboxes-5">
<span class="label label-nwprimary">Yes</span>                    Messaging section / news </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-6">
<span class="label label-nwprimary">Yes</span>                    Manage warehouse items </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-7">
<span class="label label-nwprimary">Yes</span>                    Fleet Management / Fleet Scheduling </label>
                </div></td>
            </tr>
            <tr>
              <td><div class="checkbox">
                  <label for="checkboxes-8">
<span class="label label-nwprimary">Yes</span>                    Item Scheduling </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-9">
<span class="label label-nwprimary">Yes</span>                    Manage Receiving Status </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-10">
<span class="label label-nwprimary">Yes</span>                    Manage Payment </label>
                </div></td>
            </tr>
            <tr>
              <td><div class="checkbox">
                  <label for="checkboxes-11">
<span class="label label-nwprimary">Yes</span>                    Generate Invoice </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-12">
<span class="label label-nwprimary">Yes</span>                    Manage Damaged Material Status </label>
                </div></td>
              <td><div class="checkbox">
                  <label for="checkboxes-13">
<span class="label label-nwprimary">Yes</span>                    Data Backup </label>
                </div></td>
            </tr>
          </tbody>
        </table>
<div class="form-group">
  <div class="text-right col-sm-10 pull-right">
    <div id="button1idGroup" class="btn-group" role="group" aria-label="Button Group">
      <a href="warehouse-list"><button type="button" id="button1id" name="button1id" class="btn btn-danger btn-sm bacckky" aria-label="Left Button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button></a>
   
      
      <a href="edit-warehouse"><button type="button" id="button2id" name="button2id" class="btn btn-success btn-sm" aria-label="Left Button">Edit <span class="glyphicon glyphicon-pencil"></span></button></a>
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
<style type="text/css">
.bacckky{ margin-right:5px;}
.valler{ line-height:40px;}
.firstnamer{ margin-bottom:0px;}
.label-nwprimary {
    background-color: #337AB7;
}
</style>

</body>
</html>
