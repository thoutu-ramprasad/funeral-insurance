<?php 
session_start();
$json = $_POST['json_data'];
$_SESSION['json_data_array'] = $json;
//$jsondata = $_SESSION['json_data'] = $_POST['json_data'];
//echo json_encode($jsondata,true);
?>