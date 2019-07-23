@include('admin.includes.header')
<body id="page-top" class="index">
<!-- Navigation -->
@include('admin.includes.navbar')
<!-- Navigation Ends-->

<!-- Header -->
<!-- Header -->
<header>

</header>
<!-- Portfolio Grid Section -->

  <div class="container" style="min-height:500px;">
    <div class="col-lg-12 righty text-center"><h1 style="font-size:50px;margin-top:150px; opacity:.5;">Pending</h1> </div>
    
    <!--<div class="row">
      <div class="col-lg-6">
        <h4>ACTIONS</h4>
        <table class="table">
          <tr>
            <td colspan="5">PO waiting for approval</td>
          </tr>
          <tr>
            <td class="green-bg">Status</td>
            <td class="blue-bg">PO Creation Date</td>
            <td class="blue-bg">Customer</td>
            <td class="blue-bg">Shipper</td>
            <td class="blue-bg">PO N°</td>
          </tr>
          <tr>
            <td>PO added</td>
            <td>2015-11-05</td>
            <td>Electrocorp</td>
            <td>Zhengji</td>
            <td>40001236</td>
          </tr>
          <tr>
            <td>PO added</td>
            <td>2015-11-05</td>
            <td>Electrocorp</td>
            <td>Zhengji</td>
            <td>40001237</td>
          </tr>
          <tr>
            <td>PO added</td>
            <td>2015-11-05</td>
            <td>Electrocorp</td>
            <td>Tianjung</td>
            <td>10005666</td>
          </tr>
        </table>
        <table>
          <tr>
            <td colspan="5">Bookings waiting for approval</td>
          </tr>
        </table>
      </div>
      <div class="col-lg-6">
        <h4>DASHBOARD</h4>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script> 
        <script type="text/javascript">
      google.load("visualization","1",{packages:["corechart"]});google.setOnLoadCallback(drawChart);
function drawChart()
{
var data = google.visualization.arrayToDataTable([['Dinosaur','Length'],
['Acrocanthosaurus (top-spined lizard)',12.2],
['Albertosaurus (Alberta lizard)',9.1],
['Allosaurus (other lizard)',12.2],
['Apatosaurus (deceptive lizard)',22.9],
['Archaeopteryx (ancient wing)',0.9],
['Argentinosaurus (Argentina lizard)',36.6],
['Baryonyx (heavy claws)',9.1],
['Brachiosaurus (arm lizard)',30.5],
['Ceratosaurus (horned lizard)',6.1],
['Coelophysis (hollow form)',2.7],
['Compsognathus (elegant jaw)',0.9],
['Deinonychus (terrible claw)',2.7],
['Diplodocus (double beam)',27.1],
['Dromicelomimus (emu mimic)',3.4],
['Gallimimus (fowl mimic)',5.5],
['Mamenchisaurus (Mamenchi lizard)',21.0],
['Megalosaurus (big lizard)',7.9],
['Microvenator (small hunter)',1.2],
['Ornithomimus (bird mimic)',4.6],
['Oviraptor (egg robber)',1.5],
['Plateosaurus (flat lizard)',7.9],
['Sauronithoides (narrow-clawed lizard)',2.0],
['Seismosaurus (tremor lizard)',45.7],       
['Spinosaurus (spiny lizard)',12.2],       
['Supersaurus (super lizard)',30.5],       
['Tyrannosaurus (tyrant lizard)',15.2],
['Ultrasaurus (ultra lizard)',30.5],        
['Velociraptor (swift robber)',1.8]]);

var options ={title:'Order Management, in number',legend:{position:'none'},colors: ['green'],  
};

var chart =new google.visualization.Histogram(document.getElementById('chart_div'));
        chart.draw(data, options);
}
</script>
        <div id="chart_div" style="width:100%; border:1px solid #7D7A7A; height:300px;"></div>
        <div class="spacer"></div>
      </div>
    </div> -->
    
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
</body>
</html>
