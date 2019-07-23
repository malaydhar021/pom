@include('pomfrontend.includes.header')
</head>
<body id="page-top" class="index">
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index">Purchase Order Management Tool</a> </div>
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
    
    <div class="col-md-4">
      @if(Session::has('error')) <br>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4> <i class="icon fa fa-check"></i> Error</h4>
{{ Session::get('error') }} </div>
@endif
      <section class="login-form">
        <form method="post" action="" role="login">
          <img src="<?php echo URL::to('/');?>/frontend/img/qc-agent.png" class="img-responsive" alt="" />
          <input type="text" name="user_name" placeholder="Email" required class="form-control input-lg"/>
          
          <input type="password" name='password' class="form-control" id="password" placeholder="Password" required/>
          <button type="submit" name="qc_submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
          <div>
            <!--<a href="#">Create account</a> or --><a href="#">Reset password</a>
          </div>
          
        </form>
        
        
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

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
<script src="<?php echo URL::to('/');?>/frontend/js/classie.js"></script>
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
