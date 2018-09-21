<?php
  header("Content-Type: text/html; charset=ISO-8859-1",true);
  require_once("conexao.php");
  session_start();
    $cp =  $_GET["cp"];
    $ano = date('Y');
	$sql = "SELECT cpf FROM cadCR WHERE cpf = '$cp' AND ano = '$ano'";
	$results = mysql_query($sql) or die (mysql_error());
	  while ( $row = mysql_fetch_array($results )) {
		if(!empty($row["cpf"]) && $row["cpf"]<>"000.000.000-00" ){
		   echo $row["cpf"].'        ';
		   echo "<script>alert('Este CPF ja esta inscrito!!'); location.reload(true);</script>";}
	       exit; 
      }

?>