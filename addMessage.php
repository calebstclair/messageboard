<?php
//Get the submitted data from $_POST
//Create a prepared statement to insert into message table

//Execute the prep statement
session_start();
include 'util.php';
header("Location: index.php");
$mysqli = connnectToDataBase();
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
$sql = "insert into message(username, text, posted) values( ?, ?, NOW())";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $_SESSION['username'], $message);
$stmt->execute();

 ?>
