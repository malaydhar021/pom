@include('admin.includes.meta')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
@include('admin.includes.header')
      <!-- Left side column. contains the logo and sidebar -->
@include('admin.includes.sidebar')      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            New Forwarder 
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Forwarder</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class='content'>
         <div class="row">   
@if (Session::has('success'))
{{ Session::get('success') }}
@endif

      {{Form::open(array('role'=>'form','id'=>'customer_regs_form','class'=>'form-horizontal','method'=>'POST','route'=>'new-forwarder-create','files' => 'false'))}}
  <?php //echo Form::open(array('action' => '','id'=>'customer_regs_form','class'=>'form-horizontal'));?>
      <!-- Text input-->
      <div class="col-sm-4">
      <div class="form-group">
      <?php echo Form::label('customer_name', 'Name', array('class' => 'col-md-4 control-label'));?>        
        <div class="col-md-8">
    <?php echo Form::text('customer_name', '', array('class' => 'form-control input-md','required'=>'required','maxlength'=>'100'));?>          
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group">
      <?php echo Form::label('email', 'Email ID', array('class' => 'col-md-4 control-label'));?>        
        <div class="col-md-8">          
      <?php echo Form::email('email','', array('class' => 'form-control input-md','required'=>'required','maxlength'=>'100'));?>
        </div>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group">        
    <?php echo Form::label('company_name', 'Company', array('class' => 'col-md-4 control-label'));?>
        <div class="col-md-8">          
      <?php echo Form::text('company_name', '', array('class' => 'form-control input-md','required'=>'required','maxlength'=>'100'));?>
        </div>
      </div>
      
      <div class="form-group">        
    <?php echo Form::label('cust_address', 'Address', array('class' => 'col-md-4 control-label'));?>
        <div class="col-md-8">
    <?php echo Form::textarea('cust_address', '', array('class' => 'form-control input-md','rows'=>'3'));?>
          
        </div>
      </div>
      </div>
      
      <div class="col-sm-4">
      <div class="form-group">
      <?php echo Form::label('cust_country', 'Country', array('class' => 'col-md-4 control-label'));?>        
        <div class="col-md-8">
      <?php
      $valuename=array();
      $valuename['']='Please Choose';
      foreach($country as $country_name)
      {
      $valuename[$country_name->CNT_ID]=$country_name->CNT_NICENAME;
      }
      echo Form::select('cust_country', $valuename, null,array('class' => 'col-md-4 form-control','required'=>'required'));
      ?>
        </div>
      </div>
      <div class="form-group">
    <?php echo Form::label('cust_zip', 'Zip', array('class' => 'col-md-4 control-label'));?>
        <div class="col-md-8">
        <?php echo Form::text('cust_zip', '', array('class' => 'form-control input-md','required'=>'required','maxlength'=>'10','onkeypress'=>'return numbersonly(event)' ));?>
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
<!--            <tr>
              <td><div class="checkbox">
          
            <?php //echo Form::checkbox('checkboxes', 'value', true, array('id'=>'checkboxes-0', 'class'=>'checky'));?>
                      <?php //echo Form::label('checkboxes-0', 'Create New Purchase Order');?>
                </div></td>
            </tr> -->
            <?php $i = 0; $k=1;?>
              @foreach($menu as $value)
                <td>
                  <div class="checkbox">
              <?php echo Form::checkbox('checkboxes[]', $value->MENU_ID, true, array('id'=>'checkboxes-'.$k,'data-size'=>'mini','class'=>'checky'));?>
                        <?php echo Form::label('checkboxes-'.$k, "$value->MENU_NAME");?>
                  </div>
                </td>
                <?php $i++; $k++;?>
                <?php if($i == 3){
            echo '<tr>';
            $i = 0;
          } ?>
              @endforeach
            
          </tbody>
        </table>
        <button aria-label="Left Button" class="btn btn-success btn-sm pull-right" name="button2id" id="button2id" type="submit">Save <span class="glyphicon glyphicon-floppy-disk"></span></button>
         <a href="<?php echo URL::to('forwarder'); ?>"><button aria-label="Left Button" class="btn btn-danger btn-sm pull-right backbutt" id="button2id" type="button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back </button></a>
      </div>
    <?php {{ Form::close(); }}?>
  </div>
  <!-- Row End --> 


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@include('admin.includes.footer')
      <!-- Control Sidebar -->
@include('admin.includes.control-sidebar')
<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
 <!-- jQuery 2.1.4 -->
    <script src="<?php echo URL::to('/'); ?>/backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo URL::to('/'); ?>/backend/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo URL::to('/'); ?>/backend/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo URL::to('/'); ?>/backend/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo URL::to('/'); ?>/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo URL::to('/'); ?>/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo URL::to('/'); ?>/backend/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo URL::to('/'); ?>/backend/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo URL::to('/'); ?>/backend/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo URL::to('/'); ?>/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo URL::to('/'); ?>/backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo URL::to('/'); ?>/backend/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL::to('/'); ?>/backend/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo URL::to('/'); ?>/backend/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo URL::to('/'); ?>/backend/dist/js/demo.js"></script>
    <!-- page script -->
  
  <!-- Bootstrap Core JavaScript --> 
  <!--<script src="<?php echo URL::to('/'); ?>/backend/custom-js/bootstrap.min.js"></script> --?
   <!-- Plugin JavaScript --> 
<script src="<?php echo URL::to('/'); ?>/backend/custom-js/classie.js"></script> 
<!-- Contact Form JavaScript --> 
<script src="<?php echo URL::to('/'); ?>/backend/custom-js/jqBootstrapValidation.js"></script> 
<!-- Custom Theme JavaScript --> 
<script src="<?php echo URL::to('/'); ?>/backend/custom-js/bootstrap-switch.js"></script> 

<script type="text/javascript">
$("[class='checky']").bootstrapSwitch();

function numbersonly(e) {
  var unicode = e.charCode ? e.charCode : e.keyCode
  if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
    if (unicode < 48 || unicode > 57) //if not a number
      return false //disable key press
  }
}
</script>
<style type="text/css">
.backbutt{ margin-right:10px;}
</style>
  </body>
</html>
