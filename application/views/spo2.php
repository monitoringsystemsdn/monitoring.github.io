

<?php 
    include('firebase/includes/dbconfig.php');
    $contact=$d[0]->Contact;
    $var=$contact.'/'.'spo2';
    
    $fetchdata=$database->getReference($var)->getValue();
    
        
      $dataPoints = array();
      $i=0;
      
      
      foreach ($fetchdata as $key => $value) {  
        $param = preg_split ("/\,/", $value);
        $time = (time() + 10*$i )*1000;
        
        $p=(int)$param[1];
        
        array_push($dataPoints, array("x" => $time, "y" => $p));
        $i++;
}

?>
<?php echo '<br>';
echo date("l, jS \ F, Y ");

?>

 <div class="chart">
  <script src="../assets/demo/demo.js"></script>
  <div id="chartContainer" style="height: 400px; width: 90%;"></div>
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