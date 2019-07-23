@include('admin.includes.header')
<body id="page-top" class="index">
<!-- Navigation -->
@include('admin.includes.navbar')

<!-- Header -->
<header>
<div class="container">
  <div class="row">
      <div class="col-lg-12">

        <ul class="top-menu">
          <li class="active"><a href="<?php echo URL::to('qc-agent'); ?>">QC Agent Overview</a></li>
          <li><a href="<?php echo URL::to('new-qc-agent'); ?>">New QC Agent</a></li>
          
        </ul>
      </div>
    </div>
    </div>
</header>
<!-- Portfolio Grid Section -->

  <div class="container min-height-maintainer">
    
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
    
  </div>


<!-- Footer -->
@include('admin.includes.footer')



<script>
 
  });
</script>
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
<script src="<?php echo URL::to('/'); ?>/admin/js/custom.js"></script>
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
