<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
include "conexao.php";

	if (empty($_POST['senha']) || empty($_POST['login']))
        {
		echo "<script>alert(\"Preencha corretamente!\");history.back(-1);</script>";
		exit;
	}
	$senha = addslashes($_POST['senha']);
    $login = addslashes($_POST['login']);
	
	$confu1 = "L2xB3Sbia";
	$confu2 = "Dawi748v2";
	$senha1 = $senha;
	$senha1 = $confu1.$senha1.$confu2;
	$senha1 = hash( 'SHA256',$senha1);
	
	  	
	$sql = "SELECT * FROM usucr WHERE senha = '$senha1' and login = '$login'";
	$tabela = mysqli_query($conn,$sql) or die(mysql_error());
	$registro = mysqli_num_rows($tabela);
	//echo $registro; 
	if ($registro == 0)
        {
	     header('Location: index.php?errologin=1');
         exit;
	    }
    else
        {
        	$reg = $tabela->fetch_array(MYSQLI_ASSOC);
			
			$_SESSION['id'] = $reg['IDUsuario'];
			$_SESSION['nome'] = $reg['Nome'];
			$_SESSION['nivel'] = $reg['nivel'];
			$_SESSION['login'] = $reg['login'];
			
			
			header('Location: index.php');

		}
?>