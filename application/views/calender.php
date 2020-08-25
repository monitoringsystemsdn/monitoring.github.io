
<html>
<head>
      <title> search </title>
</head>
<body>
<form method ="GET">
<input type="text" name="date">
<button>SUBMIT</button>
</form>
<? php
$date = $_GET['date'];
echo $date;
?>

</body>
</html>
