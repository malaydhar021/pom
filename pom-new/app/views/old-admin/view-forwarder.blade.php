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
          <li class="active"><a href="<?php echo URL::to('forwarder'); ?>">Forwarder Overview</a></li>
          <li><a href="<?php echo URL::to('new-forwarder'); ?>">New Forwarder</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Portfolio Grid Section -->

<div class="container" >
  <div class="row">
    <form class="form-horizontal">
      <!-- Text input-->
      <div class="col-sm-4">
      <div class="form-group firstnamer">
        <label class="col-md-4 control-label" for="customer_name">Forwarder Name :</label>
        <div class="col-md-8">
          <span class="valler">{{ $forwarder_detail[0]->FWDR_NAME}}</span>
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="email">Email ID :</label>
        <div class="col-md-8">
        <span class="valler">{{ $forwarder_detail[0]->FWDR_EMAIL}}</span>
          
        </div>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group">
        <label class="col-md-4 control-label" for="cname">Company Name </label>
        <div class="col-md-8">
          <span class="valler">{{ $forwarder_detail[0]->FWDR_COMPANY_NAME}}</span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="Address">Address </label>
        <div class="col-md-8">
          <span class="valler">
          <div style="line-height:20px;">{{$forwarder_detail[0]->FWDR_ADDRESS}}</div></span>
        </div>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group">
        <label class="col-md-4 control-label" for="Country">Country </label>
        <div class="col-md-8">
          <span class="valler">{{ $forwarder_detail[0]->CNT_NICENAME}}</span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="Zip">Zip </label>
        <div class="col-md-8">
         <span class="valler">{{ $forwarder_detail[0]->FWDR_ZIP}}</span>
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
            <?php $i = 0; $k=1;?>
              @foreach($menu as $value)
	              <td>
	                <div class="checkbox">
                            
                            <?php 
                            $val = '';
                            foreach($for_menu_items as $items) {
                                
                                if($items->MENU_ID == $value->MENU_ID) 
                                    $val = '<span class="label label-nwprimary">Yes</span>'; 
                                
                            }
                            if($val != '') 
                              echo $val;
                            else 
                              echo '<span class="label label-danger">No</span>';
                            $val = '';
                                ?> 
                            
                            
					  	<?php //echo Form::checkbox('checkboxes[]', 'value', true, array('id'=>'checkboxes-'.$k, 'class'=>'checky','value' => $value->MENU_ID ));?>
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
<div class="form-group">
  <div class="text-right col-sm-10 pull-right">
    <div id="button1idGroup" class="btn-group" role="group" aria-label="Button Group">
      <a href="<?php echo URL::to('/forwarder');?>"><button type="button" id="button1id" name="button1id" class="btn btn-danger btn-sm bacckky" aria-label="Left Button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button></a>
   
      
      <a href="<?php echo URL::to('/edit-forwarder');?>/{{ $forwarder_detail[0]->FWDR_ID}}"><button type="button" id="button2id" name="button2id" class="btn btn-success btn-sm" aria-label="Left Button" >Edit <span class="glyphicon glyphicon-pencil"></span></button></a>
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
