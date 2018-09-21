<?php
  header("Content-Type: text/html; charset=ISO-8859-1",true);
  require_once("conexao.php");
  session_start();
    $nom =  ucwords($_GET["nom"]);
    $ano = date('Y');
	$sql = "SELECT nome FROM cadCR WHERE nome = '$nom' AND ano = '$ano'";
	$results = mysql_query($sql) or die (mysql_error());
	  while ( $row = mysql_fetch_array($results )) {
		if(!empty($row["nome"])){
		   echo $row["nome"].'        ';
		   echo "<script>alert('Esta pessoa ja esta inscrita!!'); location.reload(true);</script>";}
	       exit; 
      }

?>