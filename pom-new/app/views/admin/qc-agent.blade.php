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
         QC Agent
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">QC Agent</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class='content'>
            <div class="row">
        
        <div class="col-lg-12">
            <div>
                @if (Session::has('success'))
                    <div class="alert alert-success fade in">

        <a href="#" class="close" data-dismiss="alert">&times;</a>

        <strong>Success!</strong> {{ Session::get('success') }}.

    </div>
                
                @endif
                
            </div>
            <?php 
            $sus = "suspend";
            ?>
      <div class="status-menu-box">
        <ul class="status-menu">
          <li>STATUS</li>
          <li class="all @if($filter == 'all'){{'active'}}@endif"><a href="<?php echo URL::to('qc-agent'); ?>" onclick="return showall('all');">All</a><div class="badge bg-danger"><?php echo $all_user_count[0]->all_user; ?></div></li>
          <li class="po-added @if($filter == 'suspend'){{'active'}}@endif"><a href="<?php echo URL::to('qc-agent'); ?>/{{$sus}}" onclick="return showall('po-added');">Suspended A/C</a><div class="badge bg-danger"><?php echo $sus_user_count[0]->sus_user; ?></div></li>
        </ul>
        <div class="clearfix"></div>
        
      </div>
      <div class="spacer"></div>
    
    </div>
   

    <form class="form-inline" role="form" method="post" action="">
      <div class="extendsearch col-lg-1">
        <p style="color:#CE7243; line-height:20px;"><a href="javascript:void(0);" style="color:#CE7243; font-size:16px;">
          <strong>Filters :</strong>
          </a>
           </p>
      </div>
      <div class="col-lg-11 searchboxex">
        <div class="col-lg-1">
          <div class="form-group">
            <label for="usr">Name:</label>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
              <input type="text" name="name" value="" class="form-control" id="">
              <input type='hidden' value='{{$filter}}' name='page_filter'>
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <label for="usr">Email:</label>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
              <input type="text" name="email" value="" class="form-control" id="">
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
              <input type="submit" name="search" value="Search" class="btn-xs btn-success btn">
          </div>
        </div>
        
        </div>
        <div class="clearfix"></div>
      <div class="clearfix"></div>
      <div class="col-lg-12 with-border"></div>
    </form>




        <table class="table table-bordered table-striped table-responsive">
          <thead>
            <tr class="tr-col">
            
            <th>QC Agent Name</th>
            <th>QC Agent Email ID</th>
            <th>Company Name</th>
            <th>Country</th>
            <th>Created On</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if(empty($qcagent))
            <tr>
             <td colspan="6">No Data Found!</td>
            </tr>
            @endif
            @foreach($qcagent as $data)
              <tr>
              <td>{{$data->QCAGENT_NAME}}</td>
              <td>{{$data->QCAGENT_EMAIL}}</td>
              <td>{{$data->QCAGENT_COMPANY_NAME}}</td>
              <td>{{$data->CNT_NICENAME}}</td>
              <td><?php echo date("Y-m-d",strtotime($data->CREATED_AT)); ?></td>
              <td><button class="btn-xs btn-success btn" onClick="window.location.href ='<?php echo URL::to('view-qc-agent'); ?>/{{$data->QCAGENT_ID}}'">View</button>
                <button class="btn-xs btn-primary btn"  onClick="calltheshoweredit(<?php echo $data->QCAGENT_ID;?>);">Edit</button>
                  @if($data->IS_ACTIVE == 1)
                  <button class="btn-xs btn-danger btn" id="suspend" onClick="calltheshower(<?php echo $data->QCAGENT_ID;?>);">Suspend  </button>

                  @elseif($data->IS_ACTIVE == 0)
                  <button class="btn-xs btn-success btn" id="suspend" onClick="calltheshower(<?php echo $data->QCAGENT_ID;?>);">Active</button>
                  @endif
                </td>
            </tr>
            @endforeach
            
          </tbody>
          
          </table>
      </div>
    


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
    <!--page script -->
    <!-- Bootstrap Core JavaScript --> 
<!--<script src="<?php echo URL::to('/'); ?>/backend/custom-js/bootstrap.min.js"></script> -->
<!-- Plugin JavaScript --> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> 
<script src="<?php echo URL::to('/'); ?>/backend/custom-js/classie.js"></script> 
<script src="<?php echo URL::to('/'); ?>/backend/custom-js/cbpAnimatedHeader.js"></script> 
<!-- Contact Form JavaScript --> 
<script src="<?php echo URL::to('/'); ?>/backend/custom-js/jqBootstrapValidation.js"></script> 
<script src="<?php echo URL::to('/'); ?>/backend/custom-js/contact_me.js"></script> 
<!-- Custom Theme JavaScript --> 
<script src="<?php echo URL::to('/'); ?>/backend/custom-js/freelancer.js"></script>
<script src="<?php echo URL::to('/'); ?>/backend/custom-js/custom.js"></script>
<script>
function calltheshoweredit(dataurlid)
 {
   if (confirm("Are you sure to do this ?")) {
        window.location.href ='<?php echo URL::to('edit-qc-agent'); ?>/'+dataurlid;
    }
    return false;
 }
</script>

<script>
function calltheshower(dataurlid)
 {
   if (confirm("Are you sure to do this ?")) {
        window.location.href ='<?php echo URL::to('suspend-qc'); ?>/'+dataurlid;
    }
    return false;
 }
 </script>

  </body>
</html>
