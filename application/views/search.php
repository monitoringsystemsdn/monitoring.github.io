
<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<!Doctype html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
      
</head>
<body>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<form class="example" method ="GET" action="welcome">
<input type="text" name="date" placeholder="Search date (yyyy-mm-dd)">
<button type="submit"><i class="fa fa-search"></i></button>
</form>
<?php

$date = $_GET['date'];
?>
 

</body>
</html>
<style type="text/css">

* {
  box-sizing: border-box;
}

/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  max-width: 18%;
  background: #f1f1f1;
  margin-left: 50%;
  margin-top: 20px;
  
}

/* Style the submit button */
form.example button {
  float: left;
  max-width: 5%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
  margin-top: 20px;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
body{
  background-image: url('../images/111.jpg');
  
}

</style>