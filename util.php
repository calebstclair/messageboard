<?php

function connnectToDataBase(){
  $mysqli = new mysqli("localhost", "cstclair", "H01680642", "cstclair");

  return $mysqli;
}

function displayAllMessages($database){
  return $database->query("SELECT * FROM message ORDER BY posted DESC");
}
 ?>
