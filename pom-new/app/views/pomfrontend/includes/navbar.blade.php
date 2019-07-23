<nav class="navbar navbar-default navbar-fixed-top navbar-border">
   
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
        <div class="container">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<?php echo URL::to('/');?>/pom-dashboard">POM</a> 
      <div class="pull-right" style="margin-right:15px;">
           <div class="dropdown">
               <button class="btn dropdown-toggle" type="button" style="width:150px; background: transparent; color: #1a242f;" data-toggle="dropdown" >
      <?php $user_name=\Session::get('user_data');$user_name_print=$user_name[0]->USER_NAME;?>
      {{$user_name_print}}
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
      <li><a data-toggle="tooltip" title="Logout" href="<?php echo URL::to('/');?>/"><small><i class="fa fa-key"></i> Change Password</small></a></li>
      <li><a data-toggle="tooltip" title="Logout" href="<?php echo URL::to('/');?>/index"><small><i class="fa fa-sign-out fa-lg"></i> Logout</small></a></li>
   
  </ul>
</div>
      </div>
      </div>
    </div>
   
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background-color: #eee;padding-top: 5px;">
      <div class="container">
        <ul class="nav navbar-nav navbar-left">
        <?php $acc_type = \Session::get('account_type'); //user account type get from the session 
        $account_type_id=$acc_type[0]->ACCOUNT_TYPE_ID; ?>
          <li class="page-scroll <?php if($page_name == 'home') echo 'active'; ?>"> <a href="<?php echo URL::to('/');?>/pom-dashboard" class="home-page">Home</a> </li>
        <li class="page-scroll <?php if($page_name == 'po-overview' || $page_name == 'booking-po' || $page_name == 'shipments') echo 'active'; ?>"> <a href="<?php echo URL::to('/');?>/po-overview">Follow-up</a> </li>
<!--        <li class="page-scroll <?php if($page_name == 'booking-po') echo 'active'; ?>"> <a href="<?php echo URL::to('/');?>/booking-po">Bookings</a> </li>
        @if($account_type_id == 2)
        <li class="page-scroll <?php if($page_name == 'shipments') echo 'active'; ?>"> <a href="<?php echo URL::to('/');?>/shipments">Shipments</a> </li>
        @endif-->
        <li class="page-scroll"> <a href="#">Reporting</a> </li>
        <li class="page-scroll"> <a href="#">Settings</a> </li>
        <li class="page-scroll"> <a href="#">Admin</a> </li>
        <li class="page-scroll"> <a href="#">Help</a>  </li>
        
       
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid -->
</nav>