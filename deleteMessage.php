<?php
include 'util.php';
header("Location: index.php");
$mysqli = connnectToDataBase();
$sql = "DELETE FROM message WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();

?>