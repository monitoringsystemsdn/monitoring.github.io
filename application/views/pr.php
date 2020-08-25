

<?php 
    include('firebase/includes/dbconfig.php');
    $contact=$d[0]->Contact;
    $var=$contact.'/'.'spo2';
    
    $fetchdata=$database->getReference($var)->getValue();
    
    		
			$dataPoints = array();
      $dataPoints1 = array();
			$i=0;
			
			
			foreach ($fetchdata as $key => $value) {	
    		$param = preg_split ("/\,/", $value);
    		$time = (time() + 10*$i )*1000;
		   	$p1 =(int)$param[0];
        $p2=(float)$param[2];
		    array_push($dataPoints, array("x" => $time, "y" => $p1));
        array_push($dataPoints1, array("x" => $time, "y" => $p2));
		    $i++;
}

      
?>

<?php echo '<br>';
echo date("l, jS \ F, Y ");

?>

 <div class="chart">
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <div id="chartContainer1" style="height: 400px; width: 90%;"></div>
  <div id="chartContainer2" style="height: 400px; width: 90%;"></div>
</div>
 

 
 <script>
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


</script>

<style type="text/css">
  .chart{
    margin-top:100px;
    margin-left: 50px;
  }

</style>
 




