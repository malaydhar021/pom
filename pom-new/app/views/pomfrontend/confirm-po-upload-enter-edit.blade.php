<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>PO Management :: Bansard</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" class="index">
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="dashboard.html">POM</a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="page-scroll"> <a href="dashboard.html">Home</a> </li>
        <li class="page-scroll active"> <a href="po-overview.html">Purchase Orders</a> </li>
        <li class="page-scroll"> <a href="booking.html">Bookings</a> </li>
        <li class="page-scroll"> <a href="shipments.html">Shipments</a> </li>
        <li class="page-scroll"> <a href="reporting.html">Reporting</a> </li>
        <li class="page-scroll"> <a href="settings.html">Settings</a> </li>
        <li class="page-scroll"> <a href="admin.html">Admin</a> </li>
        <li class="page-scroll"> <a href="help.html">Help</a> </li>
        <li class="page-scroll"> <a href="index.html">Log Out</a> </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid -->
</nav>
<!-- Header -->
<header>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="top-menu">
          <li><a href="po-overview.html">PO Overview</a></li>
          <li  class="active"><a href="create-purchase-order.html">Add a PO</a></li>
          <li><a href="create-booking.html">Create a Booking</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Portfolio Grid Section -->
<div class="container dashboard-page" style="min-height:500px;">
<div class="row">

<div class="spacer"></div>

    <div class="over-flow-scroll">
      <p>Please enter PO details</p>
      <table id="po" class="table">
        <tbody><tr class="all">
          <td class="blue-bg">PO Creation Date</td>
          <td class="blue-bg">Customer</td>
          <td class="blue-cyan-bg">Shipper</td>
          <td class="blue-cyan-bg">PO N°</td>
          <td class="blue-cyan-bg">PO Date</td>
          <td class="blue-cyan-bg">Product PN</td>
          <td class="blue-cyan-bg">Product&nbsp;Name</td>
          <td class="blue-cyan-bg">Product Type ?</td>
          <td class="blue-cyan-bg">Product Qty</td>
          <td class="blue-cyan-bg">Product Value</td>
          <td class="blue-cyan-bg">Value Currency</td>
          <td class="cyan-bg">Gross Wt (kgs)</td>
          <td class="cyan-bg">Volume (cbm)</td>
          <td class="cyan-bg">Packing Type 1</td>
          <td class="cyan-bg">Nbr of  1</td>
          <td class="cyan-bg">Packing Type 2</td>
          <td class="cyan-bg">Nbr of 2</td>
        </tr>
        <tr>
          <td><input type="text" class="datepicker" value="2015-11-05" style="width:80px;"></td>
          <td><input type="text" value="Electrocorp" style="width:80px;"></td>
          <td><select><option selected>Zhengji</option><option>Tianjung</option></select></td>
          <td><input type="text" value="40001236" style="width:70px;"></td>
          <td><input type="text" class="datepicker" value="2015-11-08" style="width:80px;"></td>
          <td><input type="text" value="10101225"></td>
          <td><input type="text" value="Red Front Cover C56"></td>
          <td><input type="text" value="Plastic Part"></td>
          <td><input type="text" value="1 000"></td>
          <td><input type="text" value="1 500"></td>
          <td>USD</td>
          <td><input type="text" value="120"></td>
          <td><input type="text" value="0,7"></td>
          <td><select><option >-</option><option selected value="Boxes">Boxes</option></select></td>
          <td><input type="text" value="8"></td>
          <td><select><option selected>-</option><option  value="Boxes">Boxes</option></select></td>
          <td><input type="text" value="-"></td>
        </tr>
        <tr>
          <td><input type="text" class="datepicker" value="2015-11-05"></td>
          <td><input type="text" value="Electrocorp"></td>
          <td><select><option selected>Zhengji</option><option>Tianjung</option></select></td>
          <td><input type="text" value="40001237"></td>
          <td><input type="text" class="datepicker" value="2015-11-08"></td>
          <td><input type="text" value="10101225"></td>
          <td><input type="text" value="Led Display B089"></td>
          <td><input type="text" value="Plastic Part"></td>
          <td><input type="text" value="1 000"></td>
          <td><input type="text" value="1 500"></td>
          <td>USD</td>
          <td><input type="text" value="120"></td>
          <td><input type="text" value="0,7"></td>
          <td><select><option >-</option><option selected value="Boxes">Boxes</option></select></td>
          <td><input type="text" value="8"></td>
          <td><select><option selected>-</option><option  value="Boxes">Boxes</option></select></td>
          <td><input type="text" value="-"></td>
        </tr>
        <tr>
          <td><input type="text" class="datepicker" value="2015-11-05"></td>
          <td><input type="text" value="Electrocorp"></td>
          <td><select><option>Zhengji</option><option selected>Tianjung</option></select></td>
          <td><input type="text" value="10005666"></td>
          <td><input type="text" class="datepicker" value="2015-11-08"></td>
          <td><input type="text" value="10101225"></td>
          <td><input type="text" value="PCB Module 232443A"></td>
          <td><input type="text" value="Plastic Part"></td>
          <td><input type="text" value="1 000"></td>
          <td><input type="text" value="1 500"></td>
          <td>USD</td>
          <td><input type="text" value="120"></td>
          <td><input type="text" value="0,7"></td>
          <td><select><option >-</option><option selected value="Boxes">Boxes</option></select></td>
          <td><input type="text" value="8"></td>
          <td><select><option selected>-</option><option  value="Boxes">Boxes</option></select></td>
          <td><input type="text" value="-"></td>
        </tr>
      
      </tbody></table></div><br>
      <div class="text-right">
      <a href="confirm-po-upload-enter.html" class="btn btn-warning">Cancel Changes</a>
        <a href="po-enter-successfully.html" class="btn btn-success">Save Changes</a>
      </div><br>
    
      
      
    </div>
  
</div>
<!-- Footer -->
<footer class="text-center">
  <div class="footer-below">
    <div class="container">
      <div class="row">
        <div class="col-lg-12"> Copyright &copy; PO Management 2016 </div>
      </div>
    </div>
  </div>
</footer>
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm"> <a class="btn btn-primary" href="#page-top"> <i class="fa fa-chevron-up"></i> </a> </div>
<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>
<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/freelancer.js"></script>

<link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
    <script>
  $(function() {
    $( ".datepicker" ).datepicker({"dateFormat":"yy-mm-dd"});
  });
  </script>
</body>
</html>
