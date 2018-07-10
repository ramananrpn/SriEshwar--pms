<?php
  include("db-connection.php");
$obj = json_decode($_GET["x"], false);
mysqli_query($conn,"SET NAMES utf8;"); 
$data=array();
$fetch=mysqli_query($conn,"SELECT * from project_details where id= ".$obj->proj_id);
$data=mysqli_fetch_assoc($fetch);
     echo json_encode($data);
     exit;
//echo $p_id;

?>