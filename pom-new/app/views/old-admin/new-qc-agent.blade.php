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
         <li><a href="<?php echo URL::to('qc-agent'); ?>">QC Agent Overview</a></li>
          <li class="active"><a href="<?php echo URl::to('new-qc-agent'); ?>">New QC Agent</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Portfolio Grid Section -->

<div class="container min-height-maintainer">
  <div class="row">   
    @if (Session::has('error'))
{{ Session::get('error') }}
@endif
      {{Form::open(array('role'=>'form','id'=>'customer_regs_form','class'=>'form-horizontal','method'=>'POST','route'=>'new-qc-create','files' => 'false'))}}
  <?php //echo Form::open(array('action' => '','id'=>'customer_regs_form','class'=>'form-horizontal'));?>
      <!-- Text input-->
      <div class="col-sm-4">
      <div class="form-group">
      <?php echo Form::label('customer_name', 'QC Agent Name', array('class' => 'col-md-4 control-label'));?>        
        <div class="col-md-8">
    <?php echo Form::text('customer_name', '', array('class' => 'form-control input-md','required'=>'required'));?>          
        </div>
      </div>
      
      <!-- Text input-->
      <div class="form-group">
      <?php echo Form::label('email', 'Email ID', array('class' => 'col-md-4 control-label'));?>        
        <div class="col-md-8">          
      <?php echo Form::email('email','', array('class' => 'form-control input-md','required'=>'required'));?>
        </div>
      </div>
      </div>
      <div class="col-sm-4">
      <div class="form-group">        
    <?php echo Form::label('company_name', 'Company Name', array('class' => 'col-md-4 control-label'));?>
        <div class="col-md-8">          
      <?php echo Form::text('company_name', '', array('class' => 'form-control input-md','required'=>'required'));?>
        </div>
      </div>
      
      
      <div class="form-group">        
    <?php echo Form::label('qc_address', 'Address', array('class' => 'col-md-4 control-label'));?>
        <div class="col-md-8">
    <?php echo Form::textarea('qc_address', '', array('class' => 'form-control input-md','rows'=>'3'));?>
          
        </div>
      </div>
      </div>
      
      <div class="col-sm-4">
      <div class="form-group">
      <?php echo Form::label('qc_country', 'Country', array('class' => 'col-md-4 control-label'));?>        
        <div class="col-md-8">
            <select class='col-md-4 form-control' name='qc_country' required>
              <option value="">Please Select </option>
                @foreach($country as $country_name)
                <option value='{{$country_name->CNT_ID}}'>{{$country_name->CNT_NICENAME}}</option>
                @endforeach
            </select>
    
        </div>
      </div>
      <div class="form-group">
    <?php echo Form::label('qc_zip', 'Zip', array('class' => 'col-md-4 control-label'));?>
        <div class="col-md-8">
    <?php echo Form::text('qc_zip', '', array('class' => 'form-control input-md','required'=>'required','maxlength'=>'10','onkeypress'=>'return numbersonly(event)'));?>
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
                            <input type="checkbox" name="checkboxes[]" class="checky" checked data-size="mini" id="checkboxes-<?php echo $k; ?>" value="<?php echo $value->MENU_ID; ?>">
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
        <button aria-label="Left Button" class="btn btn-success btn-sm pull-right" name="button2id" id="button2id" type="submit">Save <span class="glyphicon glyphicon-floppy-disk"></span></button>
      </div>
    <?php {{ Form::close(); }}?>
  </div>
  <!-- Row End --> 
  
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