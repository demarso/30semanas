<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title></title>
</head>

<body>
<center>
<?
	  $cont = 0;
	  $ano = date("Y");
	  include ("conexao.php");
	  $sql = "SELECT idInscrito FROM cadCR WHERE ano = '$ano'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
	     	$idInsc = $linha['idInscrito'];
	        $cont = $cont + 1;
	  }
      ?>
      
      <font size="+2" color="#CC3333">Estamos com <? echo "<font color='#FFCC33' size='+3'>".$cont."</font>"; ?> Inscritos! Mas as inscriçoes de 2017 foram encerradas!</font>
<p>Desenvolvedor:&nbsp;&nbsp;<a href="http://www.idbras.com.br" target="_blank"><font color="#00FFFF">Denilson Soares</font></a>
<font color="#FFFFFF">&nbsp;&nbsp;-&nbsp;&nbsp;Copyright &copy; 2012 - <? echo $ano; ?>. Todos os direitos reservados.</font></p>
</center>
<br />
<div align=center><a href='http://www.counter12.com'><img src='http://www.counter12.com/img-wDy8Z3a7-40.gif' border='0' alt='web counter free'></a><script type='text/javascript' src='http://www.counter12.com/ad.js?id=wDy8Z3a7'></script></div>
</body>
</html>
