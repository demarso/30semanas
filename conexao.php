<?php

$conn = mysqli_connect('bdhost0066.servidorwebfacil.com', 'ibrnorg', 'Dms120429','ibrnorg_30semanas');
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_query($conn,'SET character_set_connection=utf8');
mysqli_query($conn,'SET character_set_client=utf8');
mysqli_query($conn,'SET character_set_results=utf8');
mysqli_set_charset($conn,"utf8");

//if ($conn->connect_errno ) echo $conn->connect_errno, ' ', $conn->connect_error;

if (!$conn) {
   die('N&atilde;o conseguiu conectar: ' . mysqli_error());
}

?>