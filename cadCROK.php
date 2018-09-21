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
	// Recupera os dados dos campos
	$datacad = $_POST['datacad'];
	//$nome = $_POST['nome'];
	$nome = strtolower($_POST['nome']);
	$nome = ucwords($_POST['nome']);
/*	if(empty($nome)) {echo "<script>alert('O Nome deve ser preenchido!!/n/n ** RETORNANDO PÁGINA **'); history.back(-1);</script>"; exit;}
	$nome = Trim($nome);*/
	$nascimento = $_POST['nascimento'];
/*	if(empty($nascimento)) {echo "<script>alert('A data de nascimento deve ser preenchida!!  ** RETORNANDO PÁGINA **'); history.back(-1);</script>"; exit;}*/
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
	$email = strtolower($_POST['email']);
	$civil = $_POST['civil'];
	$evang = $_POST['evang'];
	$memb = $_POST['memb'];
	$aigreja = strtoupper($_POST['aigreja']);
	$deseja1 = $_POST['deseja1'];
/*	if(empty($deseja1)) {echo "<script>alert('Pelo menos um motivo da recuperação deve ser preenchido!!  ** RETORNANDO PÁGINA **'); history.back(-1);</script>"; exit;}*/
	$deseja2 = $_POST['deseja2'];
	$deseja3 = $_POST['deseja3'];
	$deseja4 = $_POST['deseja4'];
	$deseja5 = $_POST['deseja5'];
	$outro = $_POST['outro'];
	$_SESSION[nome] = $nome;

/*	$_SESSION[cpf] = $cpf;
	$_SESSION[ende] = $end;
	$_SESSION[cidade] = $cidade;
	$_SESSION[estado] = $estado;
	$_SESSION[cep] = $cep;
	$_SESSION[nome] = $nome;  */
		 
	 	
	$sql = "INSERT INTO cadCR( datacad,
								nome,
								nascimento,
								sexo,
								cpf,
								rg,
								orgrg,
								cep,
								end,
								bairro,
								cidade,
								estado,
								tel,
								cel,
								email,
								civil,
								evang,
								memb,
								igreja,
								deseja1,
								deseja2,
								deseja3,
								deseja4,
								deseja5,
								outro,
								ano)								
								VALUES(	STR_TO_DATE('$datacad','%d/%m/%Y'),
								        '$nome',
										STR_TO_DATE('$nascimento','%d/%m/%Y'),
										'$sexo',
										'$cpf',
										'$rg',
										'$orgrg',
										'$cep',
										'$end',
										'$bairro',
										'$cidade',
										'$estado',
										'$tel',
										'$cel',
										'$email',
										'$civil',
										'$evang',
										'$memb',
										'$aigreja',
										'$deseja1',
										'$deseja2',
										'$deseja3',
										'$deseja4',
										'$deseja5',
										'$outro',
										'$ano')";
 
 $result = mysql_query($sql,$conexao) or die ("Cadastro no CR não realizada.");
 
       echo "<br /><br />";
      echo "<font size='4' color='#0033FF' style=\"text-align:\'center'\">Seu cadastro foi realizado com sucesso!!</font>";
	  echo "<br /><br /><br /><br />";
	 echo "<script type = 'text/javascript'> location.href = 'inscr.php'</script>"; 
     
	/* echo "<script language='javascript'>window.open('itau-boleto/boletos.php', '_blank');</script>"; */
    
     
?>
 
</body>
</html>