<? session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../includes/script.js"></script>
<script language="JavaScript">
function Trim(str){
	return str.replace(/^\s+|\s+$/g,"");
}
</script>
</head>
<body background="img/bg_grey.gif" onLoad="visitor_in()" onUnLoad="visitor_out()"> 

<?php

include("conexao.php");

	$ano = date('Y');
	$genero = $_POST['genero'];
	$motivo = $_POST['motivo'];
	$lider = $_POST['lider'];
	$colider = $_POST['colider'];
	
	 	
	$sql = "INSERT INTO gaCR(   genero,
	                            motivo,
								lider,
								colider,
								ano)								
								VALUES(	'$genero',
								        '$motivo',
										'$lider',
										'$colider',
										'$ano')";
 
 $result = mysql_query($sql,$conexao) or die ("Geração no Grupo de Apoio não realizada.");
 
       echo "<br /><br />";
      echo "<font size='4' color='#0033FF' style=\"text-align:\'center'\">Grupo de apoio gerado com sucesso!!</font>";
	  echo "<br /><br /><br /><br />";
	 echo "<script type = 'text/javascript'> location.href = 'geraGa.php'</script>"; 
     
	/* echo "<script language='javascript'>window.open('itau-boleto/boletos.php', '_blank');</script>"; */
    
     
?>
 
</body>
</html>