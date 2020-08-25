

<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php 
    include('firebase/includes/dbconfig.php');
    include('application/views/search.php');
    $contact=$d[0]->Contact;
    $tdate=date("Y-m-d");

    
    $var=$contact.'/'.$date.'/'.'spo2';
    $var1=$contact.'/'.$date.'/'.'ECG';
    $var2=$contact.'/'.$date.'/'.'BP';
    
            
    
    $fetchdata=$database->getReference($var)->getValue();
    $fetchdata1=$database->getReference($var1)->getValue();
    $fetchdata2=$database->getReference($var2)->getValue();
    
      $dataPoints2 = array(); 
      $dataPoints = array();
      $dataPoints1 = array();
      $dataPoints3 = array();
      $dataPoints5 = array();
      $dataPoints6 = array();

      $i=0;
      
        $shouldAlert = false;
        $shouldAlert1 = false;
        $shouldAlert2 = false;
        $shouldAlert3 = false;
        $shouldAlert4 = false;
        $shouldAlert5 = false;

      foreach ($fetchdata as $key => $value) {  
        $param = preg_split ("/\,/", $value);
        $time = (time() + 10*$i )*1000;
        
        $p1=(int)$param[0];
        $p3=(int)$param[1];
        $p2=(float)$param[2];
        array_push($dataPoints, array("x" => $time, "y" => $p1));
        array_push($dataPoints1, array("x" => $time, "y" => $p2));
        array_push($dataPoints3, array("x" => $time, "y" => $p3));
        if($p1 > 100) 
        $shouldAlert = true;
        if($p3> 100) 
        $shouldAlert1 = true;
        if($p2 > 99) 
        $shouldAlert2 = true;
        if($p1 < 60) 
        $shouldAlert3 = true;
        if($p3 < 95) 
        $shouldAlert4 = true;
        if($p2 < 97) 
        $shouldAlert5 = true;
        $i++;
        if($i==20)
          break;
}
if ($shouldAlert) 
 {
     $notice='Pulse Count is exceeding normal range.';
            
 }
 if ($shouldAlert1) 
 {
     $notice1='SpO2 level is exceeding normal range.';
            
 }
 if ($shouldAlert2) 
 {
     $notice2='Body Temperature is exceeding normal range.';
            
 }
 if ($shouldAlert3) 
 {
     $notice3='Pulse Count is lowering below normal range.';
            
 }
 if ($shouldAlert4) 
 {
     $notice4='SpO2 level is lowering below normal range.';
            
 }
 if ($shouldAlert5) 
 {
     $notice5='Body Temperature is lowering below normal range.';
            
 }
foreach ($fetchdata2 as $key => $value) {  
        $param2 = preg_split ("/\,/", $value);
        $time = (time() + 10*$i )*1000;
        $p4 =(int)$param1[0];
        $p5=(int)$param1[1];
        array_push($dataPoints5, array("x" => $time, "y" => $p4));
        array_push($dataPoints6, array("x" => $time, "y" => $p5));
        $i++;
        if($i==20)
          break;
}
array_push($dataPoints2, array("x" => $time, "y" => $y));
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="<?= base_url("admin/assets/css/material-dashboard.css") ?>">
   
  
  <title>
    Patient Management System
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?=base_url("admin/assets/css/material-dashboard.css?v=2.1.2")?>" rel="stylesheet" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
      <link rel="stylesheet" href="style.css">

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->



      <div class="logo"><img src="<?php echo base_url('images/sdn1.png'); ?>" /> 
        <a href="http://www.sensordropsnetworks.com/" class="simple-text logo-normal">
          SensorDrops <br> Networks 
        </a>
        
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboard.html">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url("Dashboard/userdashboard") ?>">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./tables.html">
              <i class="material-icons">content_paste</i>
              <p>One Day</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./typography.html">
              <i class="material-icons">library_books</i>
              <p>One Week</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url() ?>">
              <i class="material-icons">bubble_chart</i>
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
 
            <h1>Welcome 
            
            <?php echo $d[0]->Name; ?>

               </h1>

                <div class="date">
                    <?php echo '<br>';
                echo date("l, jS \ F, Y ");

                    ?> 
        </div>
            
          </div>
                   
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                
                  <div class="ripple-container"></div>
                
                
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                
                 <button class="btn btn-primary btn-fill" onclick='swal({ html: "<?php echo $notice.'<br>'.$notice1.'<br>'.$notice2;?>",buttonsStyling: false, confirmButtonClass: "btn btn-danger"})'><i class="material-icons">notifications</i></button>
                
              </li>
            
            
              <li class="nav-item dropdown">
              
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  
              </li>
            </ul>
          </div>
        </div>
      </nav>
     
      <!-- End Navbar -->
  
  <!--   Core JS Files   -->
  <script src="<?=base_url("admin/assets/js/core/jquery.min.js")?>"></script>
  <script src="<?= base_url("admin/assets/css/sweetalert.min.js") ?>"></script>
  <script src="<?= base_url("admin/assets/css/sweetalert.js") ?>"></script>
  <script src="<?=base_url("admin/assets/js/core/popper.min.js")?>"></script>
  <script src="<?=base_url("admin/assets/js/core/bootstrap-material-design.min.js")?>"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?=base_url("admin/assets/js/plugins/perfect-scrollbar.jquery.min.js")?>"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?=base_url("admin/assets/js/plugins/moment.min.js")?>"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?=base_url("admin/assets/js/plugins/sweetalert2.js")?>"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?=base_url("admin/assets/js/plugins/jquery.validate.min.js")?>"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?=base_url("admin/assets/js/plugins/jquery.bootstrap-wizard.js")?>"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?=base_url("admin/assets/js/plugins/bootstrap-selectpicker.js")?>"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="<?=base_url("admin/assets/js/plugins/arrive.min.js")?>"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="<?=base_url("admin/assets/js/plugins/chartist.min.js")?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?=base_url("admin/assets/js/plugins/bootstrap-notify.js")?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url("admin/assets/js/material-dashboard.js?v=2.1.2")?>" type="text/javascript"></script>



  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <div class="chart">
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script src="<?=base_url("admin/assets/js/plugins/sweetalert2.js")?>"></script>

  <div id="chartContainer" style="height: 300px; width: 90%; margin-top:150px;
    margin-left: 50px; margin-bottom: 50px;"></div>

    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="max-width: 40%; margin-left: 30%">
  <strong>Alert !</strong> <?php echo $notice.$notice3;?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> 
   

   
  <div id="chartContainer1" style="height: 300px; width: 90%; 
    margin-left: 50px; margin-bottom: 50px;"></div>

    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="max-width: 40%; margin-left: 30%" >
  <strong>Alert !</strong> <?php echo $notice2.$notice5;?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> 
   
    
  <div id="chartContainer2" style="height: 300px; width: 90%; 
    margin-left: 50px; margin-bottom: 50px;"></div>

    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="max-width: 40%; margin-left: 30%">
  <strong>Alert !</strong> <?php echo $notice1.$notice4;?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> 
   
  <div id="chartContainer3" style="height: 300px; width: 90%; 
    margin-left: 50px; margin-bottom: 50px;"></div>

    
    
    <div id="chartContainer4" style="height: 300px; width: 90%; 
    margin-left: 50px; margin-bottom: 50px;"></div>
    
  
</div>
 
 <script>

var chart = new CanvasJS.Chart("chartContainer", {
  title: {
    text: '<?php echo "ECG".'   '.$date ?>'
  },

  data: [{
    type: "line",
    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>


  }]
});

chart.render();

var chart= new CanvasJS.Chart("chartContainer1", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: '<?php echo "Pulse Rate".'   '.$date ?>'

  },
  axisY: {
    title: "Pulse Count"
  },
   axisX: {
    title: "Time"
  },
  data: [{
    type: "column",
    name: "Pulse Count",
    indexLabel: "{y}",
  
    color: "#008080",
    xValueType: "dateTime",
    xValueFormatString: "hh:mm:ss TT",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});

chart.render();

var chart = new CanvasJS.Chart("chartContainer2", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: '<?php echo "Body Temperature".'   '.$date ?>'
  },
  axisY: {
    title: "Temperature (°F)"
  },
   axisX: {
    title: "Time"
  },
  data: [{
    type: "column",
    name: "Body temperature",
    indexLabel: "{y}",
  
    color: "#008080",
    xValueType: "dateTime",
    xValueFormatString: " hh:mm:ss TT",
    dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
  }]
});


chart.render();

var chart = new CanvasJS.Chart("chartContainer3", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: '<?php echo "SpO2".'   '.$date ?>'
  },
  axisY: {
    title: "SpO2(%)"
  },
   axisX: {
    title: "Time"
  },
  data: [{
    type: "column",
    name: "spo2",
    indexLabel: "{y}",
   
    color: "#008080",
    xValueType: "dateTime",
    xValueFormatString: "hh:mm:ss TT",
    dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer4", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: '<?php echo "Blood Pressure".'   '.$date ?>'
  },
  legend:{
    cursor: "pointer",
    verticalAlign: "center",
    horizontalAlign: "right",
    itemclick: toggleDataSeries
  },
  axisX: {
    title: "Time"
  },
  axisY: {
    title: "Pressure (mm-Hg)"
  },
  data: [{
    type: "column",
    name: "Systolic Pressure",
    indexLabel: "{y}",
    color: "teal",
    showInLegend: true,
    xValueType: "dateTime",
    xValueFormatString: "hh:mm:ss TT",
    dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
  },{
    type: "column",
    name: "Diastolic Pressure",
    indexLabel: "{y}",
    showInLegend: true,
    xValueType: "dateTime",
    xValueFormatString: "hh:mm:ss TT",
    dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?> 
  }]
});
showDefaultText(chart, "No Data available");
chart.render();
function showDefaultText(chart, text){
    
   var isEmpty = ( chart.options.data[0].dataPoints== null);
  
   if(!chart.options.subtitles)
    (chart.options.subtitles = []);
   
   if(isEmpty)
    chart.options.subtitles.push({
     text : text,
     verticalAlign : 'center',
   });
   else
    (chart.options.subtitles = []);
 }

 
function toggleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  }
  else{
    e.dataSeries.visible = true;
  }
  chart.render();
}



</script>


<style type="text/css">
  

.date{
  margin-top: 80px;
  margin-left: -300px;
  color: black;
}


.logo img{
  margin-left:100px;
  margin-top: 10px;
  
}
h1{
  color:black;
  margin-top: -40px;
}

</style>

</body>

</html>