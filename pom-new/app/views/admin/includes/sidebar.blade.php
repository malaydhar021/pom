<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!--<div class="user-panel">
            <div class="pull-left image">
              <img src="" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p></p>
              
            </div>
          </div>-->
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($page_name == 'dashboard') echo 'active'; ?> treeview">
              <a href="<?php echo URL::to('dashboard');?>">
                <i class="fa fa-dashboard"></i>
                 <span>Dashboard</span>
              </a>
              <!--<ul class="treeview-menu">
                <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>-->
            </li>
            <li class="treeview <?php if($page_name == 'forwarder' || $page_name == 'view-forwarder' || $page_name == 'new-forwarder' || $page_name == 'edit-forwarder') echo 'active'; ?>">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Forwarder</span><i class="fa fa-angle-left pull-right"></i>
                <span class="label label-primary pull-right"></span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($page_name == 'forwarder') echo 'active';?>"><a href="<?php echo URL::to('forwarder'); ?>"><i class="fa fa-circle-o"></i> Forwarder Overview</a></li>
                <li class="<?php if($page_name == 'new-forwarder') echo 'active';?>"><a href="<?php echo URL::to('new-forwarder'); ?>"><i class="fa fa-circle-o"></i> New Forwarder</a></li>
                
              </ul>
            </li>
            <li class="treeview <?php if($page_name == 'customer' || $page_name == 'view-customer' || $page_name == 'new-customer' || $page_name == 'edit-customer') echo 'active'; ?>">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Customer</span><i class="fa fa-angle-left pull-right"></i>
                <span class="label label-primary pull-right"></span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($page_name == 'customer') echo 'active';?>"><a href="<?php echo URL::to('customer'); ?>"><i class="fa fa-circle-o"></i> Customer Overview</a></li>
                <li class="<?php if($page_name == 'new-customer') echo 'active';?>"><a href="<?php echo URL::to('new-customer'); ?>"><i class="fa fa-circle-o"></i> New Customer</a></li>
                
              </ul>
            </li>
            <li class="treeview <?php if($page_name == 'qc-agent' || $page_name == 'view-qc-agent' || $page_name == 'new-qc-agent' || $page_name == 'edit-qc-agent') echo 'active'; ?>">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Qc Agent</span><i class="fa fa-angle-left pull-right"></i>
                <span class="label label-primary pull-right"></span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($page_name == 'qc-agent') echo 'active';?>"><a href="<?php echo URL::to('qc-agent'); ?>"><i class="fa fa-circle-o"></i> Qc Agent Overview</a></li>
                <li class="<?php if($page_name == 'new-qc-agent') echo 'active';?>"><a href="<?php echo URL::to('new-qc-agent'); ?>"><i class="fa fa-circle-o"></i> New Qc Agent</a></li>
                
              </ul>
            </li>
            <li class="treeview <?php if($page_name == 'warehouse-list') echo 'active'; ?>">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Warehouse</span><i class="fa fa-angle-left pull-right"></i>
                <span class="label label-primary pull-right"></span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($page_name == 'warehouse-list') echo 'active';?>"><a href="<?php echo URL::to('warehouse'); ?>"><i class="fa fa-circle-o"></i> Warehouse Overview</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> New Warehouse</a></li>
                
              </ul>
            </li>
            <li class="treeview <?php if($page_name == 'Supplier' || $page_name == 'view-supplier' || $page_name == 'new-supplier' || $page_name == 'edit-supplier') echo 'active'; ?>">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Supplier</span><i class="fa fa-angle-left pull-right"></i>
                <span class="label label-primary pull-right"></span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($page_name == 'Supplier') echo 'active';?>"><a href="<?php echo URL::to('supplier'); ?>"><i class="fa fa-circle-o"></i> Supplier Overview</a></li>
                <li class="<?php if($page_name == 'new-supplier') echo 'active';?>"><a href="<?php echo URL::to('new-supplier'); ?>"><i class="fa fa-circle-o"></i> New Supplier</a></li>
                
              </ul>
            </li>
            <li class="treeview <?php if($page_name == 'settings'||$page_name =='holiday'||$page_name=='site-configuration') echo 'active'; ?>">
              <a href="<?php echo URL::to('settings'); ?>">
                <i class="fa fa-files-o"></i>
                <span>Settings</span><i class="fa fa-angle-left pull-right"></i>
                <span class="label label-primary pull-right"></span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($page_name == 'holiday') echo 'active';?>"><a href="<?php echo URL::to('holiday'); ?>"><i class="fa fa-circle-o"></i> Holiday</a></li>
                <li class="<?php if($page_name == 'site-configuration') echo 'active';?>"><a href="<?php echo URL::to('site-configuration'); ?>"><i class="fa fa-circle-o"></i> Site Configuration</a></li>
                
              </ul>
            </li>
            <li class="treeview <?php if($page_name == 'news') echo 'active'; ?>">
              <a href="<?php echo URL::to('news'); ?>">
                <i class="fa fa-files-o"></i>
                <span>News</span>
                <span class="label label-primary pull-right"></span>
              </a>
              <!--<ul class="treeview-menu">
                <li><a href="<?php echo URL::to('holiday'); ?>"><i class="fa fa-circle-o"></i> Holiday</a></li>
                <li><a href="<?php echo URL::to('site-configuration'); ?>"><i class="fa fa-circle-o"></i> Site Configuration</a></li>
                
              </ul>-->
            </li>
            <li class="treeview <?php if($page_name == 'ticket') echo 'active'; ?>">
              <a href="<?php echo URL::to('ticket'); ?>">
                <i class="fa fa-files-o"></i>
                <span>Ticket</span>
                <span class="label label-primary pull-right"></span>
              </a>
              <!--<ul class="treeview-menu">
                <li><a href="<?php echo URL::to('holiday'); ?>"><i class="fa fa-circle-o"></i> Holiday</a></li>
                <li><a href="<?php echo URL::to('site-configuration'); ?>"><i class="fa fa-circle-o"></i> Site Configuration</a></li>
                
              </ul>-->
            </li>
            <!--<li>
              <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Charts</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul>
            </li>
            <li>
              <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
	  <style type="text/css">
	  .row {
		  width:98%;
		  margin:auto;
	  }
	  .status-menu-box {
	border-bottom:solid #dcdbdb 1px;
}
.status-menu {
	list-style:none;
	padding:0px;
	margin:0px;
}
.status-menu li{
	float:left;
	line-height:45px;
	color:#44a12b;
}
.status-menu li a{
	padding:0px 17px 13px 17px;
	color:#a5a5a5;
	text-decoration:none;
}
.status-menu  li.active a ,.status-menu  li:hover a {
	color:#44a12b;
	border-bottom:#44a12b solid 1px;
}
.searchboxex  input.form-control{ height:25px !important; width:100% !important; border-radius:unset !important; padding:2px;}
.searchboxex div.col-lg-1{ padding-left:0px; padding-right:10px;}
.spacer{ margin-top:15px;}
.with-border{ border-bottom:1px solid #C3C3C3;}
.searchboxex div.col-lg-1 div.form-group label{ font-size:12px;}
#hiddensec{ height:80px;}
	  </style>