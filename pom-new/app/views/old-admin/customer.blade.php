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
          <li class="active"><a href="<?php echo URL::to('customer'); ?>">Customer Overview</a></li>
          <li><a href="<?php echo URL::to('new-customer'); ?>">New Customer</a></li>
        </ul>
      </div>
    </div>
    </div>
</header>
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
          <li class="all <?php if($acct_type!='suspended') { echo 'active'; } ?> ">
          <a href="javascript:void(0);" onclick="return showall('all');">All</a><div class="badge bg-danger"><?php echo $all_user_count[0]->all_user; ?></div>
          </li>
          <li class="po-added <?php if($acct_type=='suspended') { echo 'active'; } ?>"><a href="javascript:void(0);" onclick="return showall('suspended');">Suspended A/C</a><div class="badge bg-danger"><?php echo $sus_user_count[0]->sus_user; ?></div></li>
        </ul>
        <div class="clearfix"></div>
        
      </div>
      <div class="spacer"></div>
    
    </div>
   

    <form class="form-inline" role="form" method="post" id="sercherformm" >
      <div class="extendsearch col-lg-1">
<p style="color:#CE7243; line-height:20px;"><a href="javascript:void(0);" style="color:#CE7243; font-size:16px;">
          <strong>Filters :</strong>
          </a>
           </p>
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
            
            <th>Customer Name</th>
            <th>Customer Email ID</th>
            <th>Company Name</th>
            <th>Country</th>
            <th>Created On</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php if(!empty($customer)) { ?>
            @foreach($customer as $value)
	            <tr>
	              <td>{{ $value->CUSTOMER_NAME }}</td>
	              <td>{{ $value->CUSTOMER_EMAIL }}</td>
	              <td>{{ $value->CUSTOMER_COMPANY_NAME }}</td>
	              <td>{{ $value->CNT_NICENAME }}</td>
	              <td>{{ date("d/m/Y",strtotime($value->CREATED_AT)) }}</td>
	              <td>
                          @if($value->IS_ACTIVE ==0 )
                          <button class="btn-xs btn-success btn" onClick="window.location.href ='<?php echo URl::to('view-customer'); ?>/{{$value->CUSTOMER_ID}}'" >View</button>
	                <button class="btn-xs btn-primary btn"   onClick="calltheshoweredit(<?php echo $value->CUSTOMER_ID;?>);">Edit</button>
	                  <button class="btn-xs btn-success btn activatorbutt"   onClick="calltheshower(<?php echo $value->CUSTOMER_ID;?>);">Active</button>
                             @endif
                             @if($value->IS_ACTIVE ==1 )
                          <button class="btn-xs btn-success btn" onClick="window.location.href ='<?php echo URl::to('view-customer'); ?>/{{$value->CUSTOMER_ID}}'">View</button>
	                <button class="btn-xs btn-primary btn" onClick="calltheshoweredit(<?php echo $value->CUSTOMER_ID;?>);" >Edit</button>
	                  <button class="btn-xs btn-danger btn" onClick="return ConfirmDelete('<?php echo URl::to('customer-suspend');?>/{{$value->CUSTOMER_ID}}');">Suspend</button>
                             @endif
                      </td>
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

function calltheshower(dataurlid)
 {
	 if (confirm("Are you sure to do this ?")) {
        window.location.href ='<?php echo URL::to('customer-suspend'); ?>/'+dataurlid;
    }
    return false;
 }
 
function calltheshoweredit(dataurlid)
 {
	 if (confirm("Are you sure to do this ?")) {
        window.location.href ='<?php echo URL::to('edit-customer'); ?>/'+dataurlid;
    }
    return false;
 }
function showall(vall)
{
	$('#viewaccttype').val(vall);
	$('#email_search').val('');
	$('#name_search').val('');	
	$('#sercherformm').submit();
}
</script>
</body>
</html>
