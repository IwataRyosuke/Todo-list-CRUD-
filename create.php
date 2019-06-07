<!DOCTYPE html>
<html>
<head>
	<title>Create todo List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<a href="index.php"><h1>Create todo List</h1></a>
	<form method="post" action="create.php">
		<p>Todo title:</p>
		<input type="text" name="todoTitle">
		<p>Todo description:</p>
		<input type="text" name="todoDescription">
		<br><br>
		<input id="submit" type="submit" name="submit" value="submit">
	</form>
</body>
</html>

<?php
require_once("db_connect.php");
if(isset($_POST['submit'])){
	$title = $_POST['todoTitle'];
	$description = $_POST['todoDescription'];
	//connect to database
	db();
	global $link;
	$query = "INSERT INTO todo(todoTitle, todoDescription, date)VALUES ('$title', '$description', now() )";
	$insertTodo = mysqli_query($link, $query);
	if($insertTodo){
		echo '<p>successfully</p>';
	} else{
		echo mysqli_error($link);
	}
	mysqli_close($link);
}



 ?>

