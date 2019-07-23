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
            Forwarder
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Forwarder</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class='content'>
         <div class="row">
    <div class="col-lg-12">
      <div> @if (Session::has('success'))
        <div class="alert alert-success fade in"> <a href="#" class="close" data-dismiss="alert">&times;</a> <strong>Success!</strong> {{ Session::get('success') }}. </div>
        @endif </div>
      <div class="status-menu-box">
        <ul class="status-menu">
          <li>STATUS</li>
          <li class="all <?php if($acct_type!='suspended') { echo 'active'; } ?>"><a href="javascript:void(0);" onclick="return showall('all');">All</a>
            <div class="badge bg-danger"><?php echo $all_user_count[0]->all_user; ?></div>
          </li>
          <li class="po-added <?php if($acct_type=='suspended') { echo 'active'; } ?>"><a href="javascript:void(0);" onclick="return showall('suspended');">Suspended A/C</a>
            <div class="badge bg-danger"><?php echo $sus_user_count[0]->sus_user; ?></div>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="spacer"></div>
    </div>
    <form class="form-inline" role="form" method="post" id="sercherformm" >
      <div class="extendsearch col-lg-1">
        <p style="color:#CE7243; line-height:20px;"><a href="javascript:void(0);" style="color:#CE7243; font-size:16px;"> <strong>Filters :</strong> </a> </p>
      </div>
      <input type="hidden" name="viewaccttype" id="viewaccttype" value="<?php echo $acct_type; ?>" >
      <div class="col-lg-11 searchboxex">
      
        <div class="col-lg-1">
          <div class="form-group">
            <label for="usr">Name:</label>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
            <input type="text" name="name_search" value="{{$namesearch}}" class="form-control" id="name_search" >
          </div>
        </div>
        <div class="col-lg-1">
          <div class="form-group">
            <label for="usr">Email:</label>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
            <input type="email" name="email_search" value="{{$emailsearch}}" class="form-control" id="email_search">
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
          <button type="submit" class="btn-xs btn-success btn" name="searchthis">Search</button>
          
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
          <th>Forwarder Name</th>
          <th>Forwarder Email ID</th>
          <th>Company Name</th>
          <th>Country</th>
          <th>Created On</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php if(!empty($forwarder)) { ?>
      @foreach($forwarder as $data)
      <tr>
        <td>{{$data->FWDR_NAME}}</td>
        <td>{{$data->FWDR_EMAIL}}</td>
        <td>{{$data->FWDR_COMPANY_NAME}}</td>
        <td>{{$data->CNT_NICENAME}}</td>
        <td><?php echo date("Y-m-d",strtotime($data->CREATED_AT)); ?></td>
        <td><button class="btn-xs btn-success btn" onClick="window.location.href ='<?php echo URL::to('view-forwarder'); ?>/{{$data->FWDR_ID}}'">View</button>
          <button class="btn-xs btn-primary btn" onClick="calltheshoweredit(<?php echo $data->FWDR_ID;?>);" >Edit</button>
          @if($data->IS_ACTIVE == 1)
          <button class="btn-xs btn-danger btn" id="suspend" onClick="calltheshower(<?php echo $data->FWDR_ID;?>);" >Suspend </button>
          @elseif($data->IS_ACTIVE == 0)
          <button class="btn-xs btn-success btn activatorbutt" id="suspend" onClick="calltheshower(<?php echo $data->FWDR_ID;?>);">Active</button>
          @endif </td>
      </tr>
      @endforeach
      <?php } else {?>
      <tr>
      <td colspan="6">No Data Found!</td>
      </tr>
      <?php } ?>
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
    <!--page script-->
    <style type="text/css">
.activatorbutt{ padding-left:13px; padding-right:13px; padding-top:2px; padding-bottom:2px;}
</style>
<script type="text/javascript">
function ConfirmDelete(url)
{
  var x = confirm("Are you sure you want to Suspend?");
  if (x)
      window.location.href = url;
  else
    return false;
}

function showall(vall)
{
  $('#viewaccttype').val(vall);
  $('#email_search').val('');
  $('#name_search').val('');  
  $('#sercherformm').submit();
}
 
function calltheshower(dataurlid)
 {
   if (confirm("Are you sure to do this ?")) {
        window.location.href ='<?php echo URL::to('suspend-forwarder'); ?>/'+dataurlid;
    }
    return false;
 }
 
function calltheshoweredit(dataurlid)
 {
   if (confirm("Are you sure to do this ?")) {
        window.location.href ='<?php echo URL::to('edit-forwarder'); ?>/'+dataurlid;
    }
    return false;
 }
 
 
</script> 
  </body>
</html>
