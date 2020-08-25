<?php

$limit = 10;
$y = 80;
$dataPoints = array();
$shouldAlert = false;
for($i = 0; $i < $limit; $i++)
{
  $y += rand(0, 10); 
  $time = (time() + 3600*$i )*1000;
  array_push($dataPoints, array("x" => $time, "y" => $y)); 
  if($y < 95 || $y > 100)
    $shouldAlert = true;

}
if ($shouldAlert) 
 {
     echo '
         <!DOCTYPE html>
        <html>
        <head>
        <div id="chartContainer" style="height: 300px; width: 90%; margin-top:150px;
      margin-left: 50px; margin-bottom: 50px;"></div>
     <div class="alert alert-danger" role="alert" style="width: 400px; margin-left: 200px; ">
    <strong>Alert!</strong> Crossing thresholding limits.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
        
        </head>
        <body>
        </body>
        </html>';
 }

?>

 <div class="chart">
  <script src="../assets/demo/demo.js"></script>
  <div id="chartContainer" style="height: 400px; width: 90%;"></div>
  <br />
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></div>
 
 <script>
var chart = new CanvasJS.Chart("chartContainer", {
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
  legend:{
    horizontalAlign:"left"
  },
  data: [{
    type: "column",
    name: "spo2",
    indexLabel: "{y}",
   
    color: "#008080",
    xValueType: "dateTime",
    xValueFormatString: "DD MMM YYYY hh:mm:ss TT",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();


</script>

<style type="text/css">
  .chart{
    margin-top:100px;
    margin-left: 50px;
  }

</style>