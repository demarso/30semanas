<? 
session_start();
/*$da = date('D');
$semana = array("Sun" => "Domingo", "Mon" => "Segunda-Feira", "Tue" => "Terca-Feira", 
"Wed" => "Quarta-Feira", "Thu" => "Quinta-Feira", "Sat" => "Sabado");
if($semana["$da"] != 'Terca-Feira')
    echo "<script>alert('Dia da Semana não permitido!');history.back(-1);</script>";
	exit;*/
?>
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
   $ano = date("Y");
   $data = date('d/m/Y');
   $id = $_GET['idInscrito'];
	 	
	//echo $data."  /  ".$id;
	
	$sql2 = "SELECT DATE_FORMAT(max(data),'%d/%m/%Y') as dat FROM presenca WHERE idInscrito = '$id'";
	$resultado2 = mysql_query($sql2) or die (mysql_error());
    while ($linha2 = mysql_fetch_array($resultado2)) {
	//$idInsc = $linha2['idInscrito'];
	$dat = $linha2['dat'];
	}
	if($dat == $data)
	  echo "<script>alert(\"Presença já lançada!\");history.back(-1);</script>";
	else{  
	$sql = "INSERT INTO presenca( idInscrito, data, ano)								
								VALUES(	'$id', STR_TO_DATE('$data','%d/%m/%Y'),'$ano')";
 
    $result = mysql_query($sql,$conexao) or die ("Registro da presença não realizado.");
	
       echo "<br /><br />";
      echo "<font size='4' color='#0033FF' style=\"text-align:\'center'\">A presença foi registrada com sucesso!!</font>";
	  echo "<br /><br /><br /><br />";
	 echo "<script type = 'text/javascript'> location.href = 'CRLista.php'</script>"; 
	}
	/* echo "<script language='javascript'>window.open('itau-boleto/boletos.php', '_blank');</script>"; */
    
     
?>
 
</body>
</html>