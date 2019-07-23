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
          <li class="active"><a href="#">Supplier Overview</a></li>
          <!--<li><a href="forwarder-at-origin.html">Forwarder at origin</a></li>-->
          
        </ul>
      </div>
    </div>
    </div>
</header>
<!-- Portfolio Grid Section -->

  <div class="container min-height-maintainer">
    
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
            
            <th>Supplier Name</th>
            <th>Supplier Email ID</th>
            <th>Company Name</th>
            <th>Country</th>
            <th>Created On</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
             
              <td>demo name</td>
              <td>demodata@gmail.com</td>
              <td>Bansard</td>
              <td>China</td>
              <td>02/01/2016</td>
              <td><button class="btn-xs btn-success btn" onClick="window.location.href ='view-supplier'">View</button>
                <button class="btn-xs btn-primary btn" onClick="window.location.href ='edit-supplier'">Edit</button>
                  <button class="btn-xs btn-danger btn">Suspend</button>
                </td>
            </tr>
            <tr>
             
              <td>shipping pvt. ltd.</td>
              <td>demodata@gmail.com</td>  
               <td>Bansard</td>
              <td>China</td>
              <td>02/01/2016</td>
              <td>
                <button class="btn-xs btn-success btn" onClick="window.location.href ='view-supplier'">View</button>
                <button class="btn-xs btn-primary btn" onClick="window.location.href ='edit-supplier'">Edit</button>
               <button class="btn-xs btn-danger btn">Suspend</button>
             </td> 
            </tr>
            <tr>
             
              <td>xyz pvt.ltd.</td>
              <td>demodata@ymail.com</td>
              <td>Bansard</td>
              <td>China</td>
              <td>02/01/2016</td>
              <td>
                <button class="btn-xs btn-success btn" onClick="window.location.href ='view-supplier'">View</button>
                <button class="btn-xs btn-primary btn" onClick="window.location.href ='edit-supplier'">Edit</button>
               <button class="btn-xs btn-danger btn">Suspend</button> 
              </td>
            </tr>
          </tbody>
          
          </table>
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
<script src="<?php echo URL::to('/'); ?>/admin/js/custom.js"></script>
</body>
</html>
