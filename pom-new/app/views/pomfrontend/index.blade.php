@include('pomfrontend.includes.header')
<body id="page-top" class="index" style="background-image:url(<?php echo URL::to('/');?>/frontend/img/background-map4.jpg); background-repeat:no-repeat; background-position:center; background-size:cover;">
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index">Purchase Order Management Tool</a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
        <li class="page-scroll active"> <a href="dashboard.html">Home</a> </li>
        <li class="page-scroll"> <a href="purchase-orders.html">Purchase Orders</a> </li>
        <li class="page-scroll"> <a href="booking.html">Bookings</a> </li>
        <li class="page-scroll"> <a href="shipments.html">Shipments</a> </li>
        <li class="page-scroll"> <a href="#">Reporting</a> </li>
        <li class="page-scroll"> <a href="#">Settings</a> </li>
        <li class="page-scroll"> <a href="#">Admin</a> </li>
        <li class="page-scroll"> <a href="#">Help</a> </li>
        <li class="page-scroll"> <a href="#">Log Out</a> </li>
      </ul>
    </div>-->
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<!-- Header -->
<header>
  <div class="container">
    <div class="row"> </div>
  </div>
</header>
<!-- Portfolio Grid Section -->

  <div class="container" style="min-height:500px;">
  
  <div class="row" id="pwd-container">
  <div class="col-md-3"></div>
    <div class="col-md-3">
    <section class="login-form" style="padding-bottom:10px;">
        <form method="post" action="#" role="login">
          <img src="<?php echo URL::to('/');?>/frontend/img/RcmcLv4.png" class="img-responsive" alt="" />
          <button type="button" name="go" class="btn btn-lg btn-primary btn-block" onClick="window.location.href='forwarder-login'">Go</button>
        </form>
      </section>
    </div>
    
    <div class="col-md-3">
      <section class="login-form" style="padding-bottom:10px;">
        <form method="post" action="#" role="login">
          <img src="<?php echo URL::to('/');?>/frontend/img/customer.png" class="img-responsive" alt="" />
          <button type="button" name="go" class="btn btn-lg btn-primary btn-block" onClick="window.location.href='customer-login'">Go</button>
        </form>
      </section>  
      </div>
      <div class="col-md-3"></div>
      </div>
      <div class="row" id="pwd-container">
      <div class="col-md-3"></div>
      <div class="col-md-3">
      <section class="login-form">
        <form method="post" action="#" role="login">
          <img src="<?php echo URL::to('/');?>/frontend/img/supplier.png" class="img-responsive" alt="" />
          <button type="button" name="go" class="btn btn-lg btn-primary btn-block" onClick="window.location.href='supplier-login'">Go</button>
        </form>
      </section>
      </div>
      <div class="col-md-3">
      <section class="login-form">
        <form method="post" action="#" role="login">
          <img src="<?php echo URL::to('/');?>/frontend/img/qc-agent.png" class="img-responsive" alt="" />
          <button type="button" name="go" class="btn btn-lg btn-primary btn-block" onClick="window.location.href='qc-login'">Go</button>
        </form>
      </section>
      </div>
<div class="col-md-3"></div>
  </div>
  
      
  
  
</div>

<!-- Footer -->
@include('pomfrontend.includes.footer')
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm"> <a class="btn btn-primary" href="#page-top"> <i class="fa fa-chevron-up"></i> </a> </div>
<!-- jQuery -->
<script src="<?php echo URL::to('/');?>/frontend/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo URL::to('/');?>/frontend/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo URL::to('/');?>/frontend/fjs/classie.js"></script>
<script src="<?php echo URL::to('/');?>/frontend/js/cbpAnimatedHeader.js"></script>
<!-- Contact Form JavaScript -->
<script src="<?php echo URL::to('/');?>/frontend/js/jqBootstrapValidation.js"></script>
<script src="<?php echo URL::to('/');?>/frontend/js/contact_me.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo URL::to('/');?>/frontend/js/freelancer.js"></script>
<style>

/*
over-ride "Weak" message, show font in dark grey
*/

.progress-bar {
    color: #333;
} 

/*
Reference:
http://www.bootstrapzen.com/item/135/simple-login-form-logo/
*/

* {
    -webkit-box-sizing: border-box;
	   -moz-box-sizing: border-box;
	        box-sizing: border-box;
	outline: none;
}

    .form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		

		&:focus {
		  z-index: 2;
		}
	}




form[role=login] {
	color: #5d5d5d;
	background: #f2f2f2;
	padding: 26px;
	border-radius: 10px;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	-webkit-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);
box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);
}
	form[role=login] img {
		display: block;
		margin: 0 auto;
		margin-bottom: 35px;
	}
	form[role=login] input,
	form[role=login] button {
		font-size: 18px;
		margin: 16px 0;
	}
	form[role=login] > div {
		text-align: center;
	}
	
.form-links {
	text-align: center;
	margin-top: 1em;
	margin-bottom: 50px;
}
	.form-links a {
		color: #fff;
	}
</style>
</body>
</html>
