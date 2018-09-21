<?php
  header("Content-Type: text/html;  charset=ISO-8859-1",true);
require_once("conexao.php");
// session_start();
   $nome2 = $_GET["nome"];
   $ano = date("Y");
	$sql = "SELECT nome, cpf FROM cadCR WHERE nome = '$nome2' and ano = '$ano'";
	$results = mysql_query($sql) or die (mysql_error());
	while ( $row = mysql_fetch_array($results )) {
			echo $row['cpf'];
		}
	
 
?>