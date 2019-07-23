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
          <li class="active"><a href="<?php echo URL::to('qc-agent'); ?>">QC Agent Overview</a></li>
          <li><a href="<?php echo URL::to('new-qc-agent'); ?>">New QC Agent</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Portfolio Grid Section -->

<div class="container min-height-maintainer">
<div>
<!--Validation-->
 @if(Session::has('error')) <br>
<div class="alert alert-danger alert-dismissible fade in" id='alert-massage'>
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong>{{ Session::get('error') }} </strong>
</div>
@endif

  </div>

  <div class="row">
@foreach($for_info as $data)
<form class="form-horizontal" method="POST">
      <!-- Text input-->
      <div class="col-sm-4">
      <div class="form-group">
        <label class="col-md-4 control-label" for="customer_name">Qc Agent Name</label>
        <div class="col-md-8">
          <input id="customer_name" name="customer_name" type="text" placeholder="Forwarder Name" class="form-control input-md" value="{{$data->QCAGENT_NAME}}">
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="email">Email ID </label>
        <div class="col-md-8">
          <input id="email" name="email" disabled type="text" placeholder="Email ID" class="form-control input-md" value="{{$data->QCAGENT_EMAIL}}">
          <input id="email" name="email" type="hidden" value="{{$data->QCAGENT_EMAIL}}">
        </div>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group">
        <label class="col-md-4 control-label" for="cname">Company Name </label>
        <div class="col-md-8">
          <input id="cname" name="company_name" type="text" placeholder="Company Name" value="{{$data->QCAGENT_COMPANY_NAME}}" class="form-control input-md">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="Address">Address </label>
        <div class="col-md-8">
          <textarea id="Address" name="qc_address" placeholder="Address" class="form-control input-md">{{$data->QCAGENT_ADDRESS}}</textarea>
        </div>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group">
        <label class="col-md-4 control-label" for="Country">Country </label>
        <div class="col-md-8">
          <select class="form-control input-md" name="qc_country" id="Country">
           <option value="">Please Select </option>
           @foreach($country as $country_name)
              
              <option value='{{$country_name->CNT_ID}}' <?php if($country_name->CNT_ID == $data->QCAGENT_COUNTRY) echo 'selected';?> >{{$country_name->CNT_NICENAME}}</option>
              
             
              @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="Zip">Zip </label>
        <div class="col-md-8">
          <input id="Zip" name="qc_zip" type="text" placeholder="Zip" value="{{$data->QCAGENT_ZIP}}" class="form-control input-md" maxlength='10' onkeypress='return numbersonly(event)'>
        </div>
      </div>
      </div>
      @endforeach
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
                            <input type="checkbox" name="checkboxes[]" class="checky" <?php foreach($for_menu_items as $items) if($items->MENU_ID == $value->MENU_ID) echo 'checked' ?> data-size="mini" id="checkboxes-<?php echo $k; ?>" value="<?php echo $value->MENU_ID; ?>">
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
      <a href="<?php echo URL::to('/qc-agent');?>"><button type="button" id="button1id" name="button1id" class="btn btn-danger btn-sm bacckky" aria-label="Left Button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button></a>
      
      <button type="submit" id="button2id" name="button2id" class="btn btn-success btn-sm" aria-label="Left Button">Save <span class="glyphicon glyphicon-floppy-disk"></span></button>
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


<!--Custom Alert -->
<script>
$("#alert-massage").fadeTo(2000, 500).slideUp(500, function(){
    $("#alert-massage").alert('close');
});
</script>


<style type="text/css">
.bacckky{ margin-right:5px; float:left;}
</style>

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
