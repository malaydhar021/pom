<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="dashboard">POM</a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
        <li class="page-scroll <?php if($page_name == 'dashboard') echo 'active'; ?>"> <a href="<?php echo URL::to('dashboard');?>">Dashboard</a></li>
        <li class="page-scroll <?php if($page_name == 'forwarder' || $page_name == 'view-forwarder' || $page_name == 'new-forwarder' || $page_name == 'edit-forwarder') echo 'active'; ?>"> <a href="<?php echo URL::to('forwarder'); ?>">Forwarder</a> </li>
        <li class="page-scroll <?php if($page_name == 'customer' || $page_name == 'view-customer' || $page_name == 'new-customer' || $page_name == 'edit-customer') echo 'active'; ?>"> <a href="<?php echo URL::to('customer'); ?>">Customer</a> </li>
        <li class="page-scroll <?php if($page_name == 'qc-agent' || $page_name == 'view-qc-agent' || $page_name == 'new-qc-agent' || $page_name == 'edit-qc-agent') echo 'active'; ?>"> <a href="<?php echo URL::to('qc-agent'); ?>">QC Agent</a> </li>
        <li class="page-scroll <?php if($page_name == 'warehouse-list') echo 'active'; ?>"> <a href="<?php echo URL::to('warehouse'); ?>">Warehouse</a> </li>
        <li class="page-scroll <?php if($page_name == 'Supplier' || $page_name == 'view-supplier' || $page_name == 'new-supplier' || $page_name == 'edit-supplier') echo 'active'; ?>"> <a href="<?php echo URL::to('supplier'); ?>">Supplier</a> </li>
        <li class="page-scroll <?php if($page_name == 'settings') echo 'active'; ?>"> <a href="<?php echo URL::to('settings'); ?>">Settings</a> </li>
        <li class="page-scroll <?php if($page_name == 'news') echo 'active'; ?>"> <a href="<?php echo URL::to('news'); ?>">News</a> </li>
        <li class="page-scroll <?php if($page_name == 'ticket') echo 'active'; ?>"> <a href="<?php echo URL::to('ticket'); ?>">Ticket</a> </li>
		<?php if (\Session::has('user_data'))
		{ 
		?><li class="page-scroll"> <a href="<?php echo URL::to('/');?>/logout">Log Out</a> </li><?php
		}
		?>
        
        
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>