<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>Cosulta de Membros</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="micoxAjax.js"></script>
<style type="text/css">
<!--
.style1 {
	font-size: 36px
}
-->
</style>
</head>

<body>
<div style="width:700px">
<?php
 include ("conexao.php");
	
	$id = $_GET['idInscrito'];
	
	
			
 $query = mysql_query($sql = "DELETE FROM cadCR WHERE idInscrito = '$id'") or die(mysql_error());


echo "<script type = 'text/javascript'> location.href = 'CRLista.php'</script>";											


 mysql_close($conexao); 
?>

 </div>

</body>
</html>
