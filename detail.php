

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
require_once("db_connect.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];
	db();
	global $link;
	$query = "SELECT todoTitle, todoDescription, date FROM todo WHERE id = '$id'";
	$result = mysqli_query($link, $query);
	if(mysqli_num_rows($result)==1){
		$row = mysqli_fetch_array($result);
		if($row){
			$title = $row['todoTitle'];
			$description = $row['todoDescription'];
			$date = $row['date'];


			echo "
			<h2>$title</h2>
			<h3>description</h3>
			<p>$description</p>
			<small>$date</small>
			<br>
			<a href='index.php'>GO back</a>
			";
		}
	}else{
		echo 'no todo';
	}

}

?>

</body>
</html>