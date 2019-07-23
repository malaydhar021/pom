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
           Warehouse
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Warehouse</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class='content'>
                <div class="row">
        
        <div class="col-lg-12">
      <div class="status-menu-box">
        <ul class="status-menu">
          <li>STATUS</li>
          <li class="all active"><a href="#" onclick="return showall('all');">All</a><div class="badge bg-danger">120</div></li>
          <li class="po-added"><a href="#" onclick="return showall('po-added');">Suspended A/C</a><div class="badge bg-danger">05</div></li>
        </ul>
        <div class="clearfix"></div>
        
      </div>
      <div class="spacer"></div>
    
    </div>
   

    <form class="form-inline" role="form">
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
            <input type="text" class="form-control" id="">
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <label for="usr">Email:</label>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
            <input type="text" class="form-control" id="">
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
            
            <th>Customer Name</th>
            <th>Customer Email ID</th>
            <th>Warehouse Name</th>
            <th>Country</th>
            <th>Created On</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
             
              <td>demo name</td>
              <td>demodata@gmail.com</td>
              <td>Warehouse1</td>
              <td>China</td>
              <td>02/01/2016</td>
              <td><button class="btn-xs btn-success btn" onClick="window.location.href ='view-warehouse'">View</button>
                <button class="btn-xs btn-primary btn" onClick="window.location.href ='edit-warehouse'">Edit</button>
                  <button class="btn-xs btn-danger btn">Suspend</button>
                </td>
            </tr>
            <tr>
             
              <td>shipping pvt. ltd.</td>
              <td>demodata@gmail.com</td>  
                             <td>Warehouse1</td>
              <td>China</td>
              <td>02/01/2016</td>
              <td>
                <button class="btn-xs btn-success btn" onClick="window.location.href ='view-warehouse'">View</button>
                <button class="btn-xs btn-primary btn" onClick="window.location.href ='edit-warehouse'">Edit</button>
               <button class="btn-xs btn-danger btn">Suspend</button>
             </td> 
            </tr>
            <tr>
             
              <td>xyz pvt.ltd.</td>
              <td>demodata@ymail.com</td>
                            <td>Warehouse1</td>
              <td>China</td>
              <td>02/01/2016</td>
              <td>
                <button class="btn-xs btn-success btn" onClick="window.location.href ='view-warehouse'">View</button>
                <button class="btn-xs btn-primary btn" onClick="window.location.href ='edit-warehouse'">Edit</button>
               <button class="btn-xs btn-danger btn">Suspend</button> 
              </td>
            </tr>
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
  </body>
</html>
