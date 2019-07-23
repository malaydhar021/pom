@include('admin.includes.header-one')
<body id="page-top" class="index">
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<?php echo URL::to('/');?>/index">Purchase Order Management Tool</a> </div>
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

<div class="container">
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    <div class="col-md-4"> @if(Session::has('success')) 
      {{ Session::get('success') }}
      @endif 
      
      @if(Session::has('error'))
      {{ Session::get('error') }} 
      @endif
      <section class="login-form">
        <form method="post" role="login">
          <img src="<?php echo URL::to('/'); ?>/backend/images/RcmcLv4.png" class="img-responsive" alt="" />
          <input type="text" name="username" placeholder="Username" required class="form-control input-lg"/>
          <input type="password" class="form-control input-lg" name='password' id="password" placeholder="Password" required/>
          
          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
          <div> 
            <!--<a href="#">Create account</a> or --><a href="#">Reset password</a> </div>
        </form>
      </section>
    </div>
    <div class="col-md-4"></div>
  </div>
</div>

<!-- Footer --> 
@include('admin.includes.footer-one') 
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm"> <a class="btn btn-primary" href="#page-top"> <i class="fa fa-chevron-up"></i> </a> </div>
<!-- jQuery --> 
<script src="<?php echo URL::to('/'); ?>/backend/custom-js/jquery.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="<?php echo URL::to('/'); ?>/backend/custom-js/bootstrap.min.js"></script> 
<!-- Plugin JavaScript --> 
<!-- Contact Form JavaScript --> 
<script src="<?php echo URL::to('/'); ?>/backend/custom-js/jqBootstrapValidation.js"></script> 
<!-- Custom Theme JavaScript --> 
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

 {
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