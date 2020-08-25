<?php error_reporting (E_ALL ^ E_NOTICE); 
error_reporting(E_ERROR | E_PARSE);?>


<?php
 
$limit = 500;
$y = 100;
$dataPoints2 = array();
for($i = 0; $i < $limit; $i++){
  $y += rand(0, 10) - 5; 
  array_push($dataPoints2, array("x" => $i, "y" => $y));

}
?>
<?php
 
$limit = 10;
$y = 140;
$dataPoints5 = array();
for($i = 0; $i < $limit; $i++){
  $y += rand(0, 10); 
  $time = (time() + 120*$i )*1000;
  array_push($dataPoints5, array("x" => $time, "y" => $y));
}

$limit = 10;
$y = 90;
$dataPoints6 = array();
for($i = 0; $i < $limit; $i++){
  $y += rand(0, 10); 
  $time = (time() + 120*$i )*1000;
  array_push($dataPoints6, array("x" => $time, "y" => $y));
}

?>

<?php 
    include('firebase/includes/dbconfig.php');
    $contact=$d[0]->Contact;
    $tdate=date("Y-m-d");
    $var=$contact.'/'.'2020-08-03'.'/'.'spo2';
    
            
    
    $fetchdata=$database->getReference($var)->getValue();
    
        
      $dataPoints = array();
      $dataPoints1 = array();
      $dataPoints3 = array();
      $i=0;
      
      
      foreach ($fetchdata as $key => $value) {  
        $param = preg_split ("/\,/", $value);
        $time = (time() + 10*$i )*1000;
        
        $p1 =(int)$param[0];
        $p3=(int)$param[1];
        $p2=(float)$param[2];
        array_push($dataPoints, array("x" => $time, "y" => $p1));
        array_push($dataPoints1, array("x" => $time, "y" => $p2));
        array_push($dataPoints3, array("x" => $time, "y" => $p3));
        $i++;
}

      
?>

<div class="chart">
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <div id="chartContainer" style="height: 300px; width: 90%; margin-top:150px;
    margin-left: 50px; margin-bottom: 50px;"></div>
  <div id="chartContainer1" style="height: 300px; width: 90%; 
    margin-left: 50px; margin-bottom: 50px;"></div>
  <div id="chartContainer2" style="height: 300px; width: 90%; 
    margin-left: 50px; margin-bottom: 50px;"></div>
  <div id="chartContainer3" style="height: 300px; width: 90%; 
    margin-left: 50px; margin-bottom: 50px;"></div>
    <div id="chartContainer4" style="height: 300px; width: 90%; 
    margin-left: 50px; margin-bottom: 50px;"></div>
  
</div>
 
 <script>

var chart = new CanvasJS.Chart("chartContainer", {
  title: {
    text: "ECG"
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
    text: "Pulse Rate"
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
    xValueFormatString: "DD MMM YYYY hh:mm:ss TT",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});

chart.render();

var chart = new CanvasJS.Chart("chartContainer2", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Body Temperature"
  },
  axisY: {
    title: "Temperature (°C)"
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
    xValueFormatString: "DD MMM YYYY hh:mm:ss TT",
    dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
  }]
});


chart.render();

var chart = new CanvasJS.Chart("chartContainer3", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "SPO2"
  },
  axisY: {
    title: "SPO2(%)"
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
    xValueFormatString: "DD MMM YYYY hh:mm:ss TT",
    dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer4", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Blood Pressure"
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
    xValueFormatString: "DD MMM YYYY hh:mm:ss TT",
    dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
  },{
    type: "column",
    name: "Diastolic Pressure",
    indexLabel: "{y}",
    showInLegend: true,
    xValueType: "dateTime",
    xValueFormatString: "DD MMM YYYY hh:mm:ss TT",
    dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
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