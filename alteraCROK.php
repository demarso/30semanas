<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="script.js"></script>
</head>

<body  background="img/bg_grey.gif"> 

<?php

include("conexao.php");

	$ano = date('Y');
	$idInscrito = $_POST['idInscrito'];
	$datacad = $_POST['datacad'];
	$nome = $_POST['nome'];
	$nascimento = $_POST['nascimento'];
	$sexo = $_POST['sexo'];
	$cpf = $_POST['cpf'];
	$rg = $_POST['rg'];
	$orgrg = $_POST['orgrg'];
	$cep = $_POST['cep'];
	$end = $_POST['end'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$tel = $_POST['tel'];
	$cel = $_POST['cel'];
	$email = $_POST['email'];
	$civil = $_POST['civil'];
	$memb = $_POST['memb'];
	$aigreja = $_POST['aigreja'];
	$deseja1 = $_POST['deseja1'];
	$deseja2 = $_POST['deseja2'];
	$deseja3 = $_POST['deseja3'];
	$deseja4 = $_POST['deseja4'];
	$deseja5 = $_POST['deseja5'];
	$outro = $_POST['outro'];
	$_SESSION[nome] = $nome;
		 
	 
	$query = mysql_query($sql = "UPDATE cadCR
								SET datacad=STR_TO_DATE('$datacad','%d/%m/%Y'),
								nome='$nome',
								nascimento=STR_TO_DATE('$nascimento','%d/%m/%Y'),
								sexo='$sexo',
								cpf='$cpf',
								rg='$rg',
								orgrg='$orgrg',
								cep='$cep',
								end='$end',
								bairro='$bairro',
								cidade='$cidade',
								estado='$estado',
								tel='$tel',
								cel='$cel',
								email='$email',
								civil='$civil',
								memb='$memb',
								igreja='$aigreja',
                                deseja1='$deseja1',
								deseja2='$deseja2',
								deseja3='$deseja3',
								deseja4='$deseja4',
								deseja5='$deseja5',
								outro = '$outro'
								WHERE idInscrito = '$idInscrito'") or die(mysql_error()); 
	
	 
 echo "<font size='3' color='#0033FF'>A alteração foi realizado com sucesso!!</font>";
  echo "<script type = 'text/javascript'> location.href = 'alteraCR.php'</script>";	
/*  echo "<script type = 'text/javascript' >  window.open('index.php');</script>"; */
?>
</body>
</html>