 <?php $global_data = status_count(); ?>
<?php
if(!isset($page_filter)){
        $page_filter = "all";
    } 
       $acc_type = \Session::get('account_type'); //user account type get from the session 
        $account_type_id=$acc_type[0]->ACCOUNT_TYPE_ID;
?>
<div class="side-menu">
    
    <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <div class="brand-wrapper">
            <!-- Hamburger -->
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

           
           
        </div>

    </div>

    <!-- Main Menu -->
    <div class="side-menu-container">
        <ul class="nav navbar-nav">
            <li><a href="<?php echo URL::to('/');?>/pom-dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>
            <li ><a data-toggle="collapse" href="#dropdown-po"><i class="fa fa-chevron-down"></i> Purchase Orders</a>
            <div id="dropdown-po" class="panel-collapse collapse <?php if($page_name == 'po-overview') echo 'in'; ?>">
                    <div class="panel-body" style="padding: 0px 5px 5px 15px; ">
                        <ul class="nav navbar-nav">
                            <?php 
          $all = '';
          foreach($global_data['fw_status_count'] as $data) { 
        $all = $all + $data->PO_COUNT;

}
          ?>
          <li class="all <?php if($page_filter == 'all') echo 'active'; ?>">
              <a href="#" data-type='all' data-page='po' class="ajaxcall"><span class="check-gap"></span> All</a></li>
          <?php 
          foreach($global_data['fw_status_count'] as $data) { ?>
          <li class="<?php if($page_filter == $data->STATUS_NAME) echo 'active'; ?>">
              <?php if($data->SHOW_CHECKBOX == 1) {?>
              
                  <input type="checkbox" name="po_check" <?php if(strpos($page_filter,$data->STATUS_NAME)>0) echo 'checked'; ?> value="{{$data->STATUS_NAME}}">
              
                      <?php } ?> <a href="#" data-type="'{{$data->STATUS_NAME}}'" data-page='po' class="ajaxcall"><span class="check-gap"></span> {{$data->STATUS_NAME}}</a></li>
         <?php } ?>
                           
                        </ul>
                    </div>
                </div>
            </li>
            <li ><a data-toggle="collapse" href="#dropdown-lvl1"><i class="fa fa-chevron-down"></i> Bookings</a>
            <div id="dropdown-lvl1" class="panel-collapse collapse <?php if($page_name == 'booking-po') echo 'in'; ?>">
                <div class="panel-body" style="padding: 0px 5px 5px 15px; ">
                        <ul class="nav navbar-nav">
                           
        	
                 
        
        <?php 
          $all = '';
          foreach($global_data['count_booking_data'] as $data) { 
        $all = $all + $data->BOOKING_COUNT;
        }?>       
        
        <li class="all <?php if($page_filter == 'all'){echo 'active';} ?>"> 
            <a href="#"  data-type="all" data-page='booking' class="ajaxcall"><span class="check-gap"></span> All</a></li></li>
         @foreach($global_data['count_booking_data'] as $data)
           <li class="<?php if($page_filter == $data->STATUS_NAME){ echo 'active'; }?>">
               <a href="#" data-page='booking' data-type="{{$data->STATUS_NAME}}" class="ajaxcall"><span class="check-gap"></span> {{$data->STATUS_NAME}}</a></li>
          @endforeach 
        
                           
                        </ul>
                    </div>
                </div>
            </li>
            <?php if($account_type_id == 2){ ?>
            <li ><a data-toggle="collapse" href="#dropdown-lvl2"><i class="fa fa-chevron-down"></i> Shipments</a>
            <div id="dropdown-lvl2" class="panel-collapse collapse <?php if($page_name == 'shipments') echo 'in'; ?>">
                    <div class="panel-body" style="padding: 0px 5px 5px 15px; ">
                        <ul class="nav navbar-nav">
                    <?php 
                   $all = '';
                   foreach($global_data['count_shipping_data'] as $data) { 
                 $all = $all + $data->BOOKING_COUNT;
                 }?>

            <li class="all <?php if($page_filter == 'all')echo 'active'; ?>">
                <a href="#"  data-page='ship' data-type="all" class="ajaxcall"><span class="check-gap"></span> All</a></li>
            <?php foreach($global_data['count_shipping_data'] as $data_count) { ?>
            <li class="all <?php if($page_filter == $data_count->STATUS_ID) { echo 'active';} ?>">
                <a href="#" data-page='ship' data-type="{{$data_count->STATUS_ID}}" class="ajaxcall"><span class="check-gap"></span> {{$data_count->STATUS_NAME}}</a></li>
            <?php } ?>
                      
                        </ul>
                    </div>
                </div>
            </li>
            <?php } ?>

        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
    
    </div>
<form id='submit_id_po' action="<?php echo URL::to('po-overview'); ?>" method='POST'>
        <input type='hidden' id='hid_po_status' name="hid_po_status">
      </form>
<form id='submit_id_booking' action="<?php echo URL::to('booking-po'); ?>" method='POST'>
        <input type='hidden' id='hid_po_status_b' name="hid_po_status">
      </form>
 <form id='submit_id_ship' action="<?php echo URL::to('shipments'); ?>" method='POST'>
        <input type='hidden' id='hid_po_status_ship' name="hid_po_status">
      </form>
<!--<script src="http://sea-scanner.net/pom/beta/admin/js/bootstrap-switch.js"></script>
  <script type="text/javascript">
//$("[class='checky']").bootstrapSwitch();
</script>-->
<style type="text/css">
    .side-menu ul li{
        position: relative; 
    }
    input[name="po_check"] {
        margin-right: 5px;
        position: absolute;
        top: 2px;
        left: 2px;
        z-index: 500;
    }
    .check-gap {
        display: inline-block;
        width: 17px;
    }
:focus {
  outline: none;
}
.row {
  margin-right: 0;
  margin-left: 0;
}
.side-menu {
  position: absolute;
  width: 220px;
  min-height: 100%;
  background-color: #f8f8f8;
  border-right: 1px solid #e7e7e7;
  top:90px;
  float: left;
}
.side-menu .navbar {
  border: none;
}
.side-menu .navbar-header {
  width: 100%;
  border-bottom: 1px solid #e7e7e7;
}
.side-menu .navbar-nav .active a {
 /* background-color: transparent;*/
  margin-right: -1px;
  border-right: 5px solid #e7e7e7;
}
.side-menu .navbar-nav li {
  display: block;
  width: 100%;
 /* border-bottom: 1px solid #e7e7e7;*/
}
.side-menu .navbar-nav li a {
  padding: 7px;
}
.side-menu .navbar-nav li a .glyphicon {
  padding-right: 10px;
}
.side-menu #dropdown {
  border: 0;
  margin-bottom: 0;
  border-radius: 0;
  background-color: transparent;
  box-shadow: none;
}
.side-menu #dropdown .caret {
  float: right;
  margin: 9px 5px 0;
}
.side-menu #dropdown .indicator {
  float: right;
}
.side-menu #dropdown > a {
  border-bottom: 1px solid #e7e7e7;
}
.side-menu #dropdown .panel-body {
  padding: 0;
  background-color: #f3f3f3;
}
.side-menu #dropdown .panel-body .navbar-nav {
  width: 100%;
}
.side-menu #dropdown .panel-body .navbar-nav li {
  padding-left: 15px;
  border-bottom: 1px solid #e7e7e7;
}
.side-menu #dropdown .panel-body .navbar-nav li:last-child {
  border-bottom: none;
}
.side-menu #dropdown .panel-body .panel > a {
  margin-left: -20px;
  padding-left: 35px;
}
.side-menu #dropdown .panel-body .panel-body {
  margin-left: -15px;
}
.side-menu #dropdown .panel-body .panel-body li {
  padding-left: 30px;
}
.side-menu #dropdown .panel-body .panel-body li:last-child {
  border-bottom: 1px solid #e7e7e7;
}
.side-menu #search-trigger {
  background-color: #f3f3f3;
  border: 0;
  border-radius: 0;
  position: absolute;
  top: 0;
  right: 0;
  padding: 15px 18px;
}
.side-menu .brand-name-wrapper {
  min-height: 50px;
}
.side-menu .brand-name-wrapper .navbar-brand {
  display: block;
}
.side-menu #search {
  position: relative;
  z-index: 1000;
}
.side-menu #search .panel-body {
  padding: 0;
}
.side-menu #search .panel-body .navbar-form {
  padding: 0;
  padding-right: 50px;
  width: 100%;
  margin: 0;
  position: relative;
  border-top: 1px solid #e7e7e7;
}
.side-menu #search .panel-body .navbar-form .form-group {
  width: 100%;
  position: relative;
}
.side-menu #search .panel-body .navbar-form input {
  border: 0;
  border-radius: 0;
  box-shadow: none;
  width: 100%;
  height: 50px;
}
.side-menu #search .panel-body .navbar-form .btn {
  position: absolute;
  right: 0;
  top: 0;
  border: 0;
  border-radius: 0;
  background-color: #f3f3f3;
  padding: 15px 18px;
}
/* Main body section */
.side-body {
  margin-left: 200px;
}
/* small screen */
@media (max-width: 768px) {
  .side-menu {
    position: relative;
    width: 100%;
    height: 0;
    border-right: 0;
    border-bottom: 1px solid #e7e7e7;
  }
  .side-menu .brand-name-wrapper .navbar-brand {
    display: inline-block;
  }
  /* Slide in animation */
  @-moz-keyframes slidein {
    0% {
      left: -300px;
    }
    100% {
      left: 10px;
    }
  }
  @-webkit-keyframes slidein {
    0% {
      left: -300px;
    }
    100% {
      left: 10px;
    }
  }
  @keyframes slidein {
    0% {
      left: -300px;
    }
    100% {
      left: 10px;
    }
  }
  @-moz-keyframes slideout {
    0% {
      left: 0;
    }
    100% {
      left: -300px;
    }
  }
  @-webkit-keyframes slideout {
    0% {
      left: 0;
    }
    100% {
      left: -300px;
    }
  }
  @keyframes slideout {
    0% {
      left: 0;
    }
    100% {
      left: -300px;
    }
  }
  /* Slide side menu*/
  /* Add .absolute-wrapper.slide-in for scrollable menu -> see top comment */
  .side-menu-container > .navbar-nav.slide-in {
    -moz-animation: slidein 300ms forwards;
    -o-animation: slidein 300ms forwards;
    -webkit-animation: slidein 300ms forwards;
    animation: slidein 300ms forwards;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
  }
  .side-menu-container > .navbar-nav {
    /* Add position:absolute for scrollable menu -> see top comment */
    position: fixed;
    left: -300px;
    width: 300px;
    top: 43px;
    height: 100%;
    border-right: 1px solid #e7e7e7;
    background-color: #f8f8f8;
    -moz-animation: slideout 300ms forwards;
    -o-animation: slideout 300ms forwards;
    -webkit-animation: slideout 300ms forwards;
    animation: slideout 300ms forwards;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
  }
  /* Uncomment for scrollable menu -> see top comment */
  /*.absolute-wrapper{
        width:285px;
        -moz-animation: slideout 300ms forwards;
        -o-animation: slideout 300ms forwards;
        -webkit-animation: slideout 300ms forwards;
        animation: slideout 300ms forwards;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }*/
  @-moz-keyframes bodyslidein {
    0% {
      left: 0;
    }
    100% {
      left: 300px;
    }
  }
  @-webkit-keyframes bodyslidein {
    0% {
      left: 0;
    }
    100% {
      left: 300px;
    }
  }
  @keyframes bodyslidein {
    0% {
      left: 0;
    }
    100% {
      left: 300px;
    }
  }
  @-moz-keyframes bodyslideout {
    0% {
      left: 300px;
    }
    100% {
      left: 0;
    }
  }
  @-webkit-keyframes bodyslideout {
    0% {
      left: 300px;
    }
    100% {
      left: 0;
    }
  }
  @keyframes bodyslideout {
    0% {
      left: 300px;
    }
    100% {
      left: 0;
    }
  }
  /* Slide side body*/
  .side-body {
    margin-left: 5px;
    margin-top: 70px;
    position: relative;
    -moz-animation: bodyslideout 300ms forwards;
    -o-animation: bodyslideout 300ms forwards;
    -webkit-animation: bodyslideout 300ms forwards;
    animation: bodyslideout 300ms forwards;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
  }
  .body-slide-in {
    -moz-animation: bodyslidein 300ms forwards;
    -o-animation: bodyslidein 300ms forwards;
    -webkit-animation: bodyslidein 300ms forwards;
    animation: bodyslidein 300ms forwards;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
  }
  /* Hamburger */
  .navbar-toggle {
    border: 0;
    float: left;
    padding: 18px;
    margin: 0;
    border-radius: 0;
    background-color: #f3f3f3;
  }
  /* Search */
  #search .panel-body .navbar-form {
    border-bottom: 0;
  }
  #search .panel-body .navbar-form .form-group {
    margin: 0;
  }
  .navbar-header {
    /* this is probably redundant */
    position: fixed;
    z-index: 3;
    background-color: #f8f8f8;
  }
  /* Dropdown tweek */
  #dropdown .panel-body .navbar-nav {
    margin: 0;
  }
}
</style>