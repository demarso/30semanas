<?php
include "conexao.php";
$ano = date("Y");
$today = date("d/m/Y");

$sql = "SELECT idInscrito, nome FROM cadCR WHERE ano='$ano' ORDER BY nome";
$resultado = mysql_query($sql) or die (mysql_error());
while ($linha = mysql_fetch_array($resultado)) {
	$id = $linha['idInscrito'];
     		 
	$sql2 = "SELECT idInscrito,data FROM presenca WHERE idInscrito = '$id' and ano='$ano'";
	$resultado2 = mysql_query($sql2) or die (mysql_error());
  while ($linha2 = mysql_fetch_array($resultado2)) {
	$id2 = $linha2['idInscrito'];
    $data = $linha2['data'];
    if($data == '2017-03-07')
      $up = @mysql_query("UPDATE CRLicao SET L1=1 Where idInscrito='$id2'");
    if($data == '2017-03-14')
      $up = @mysql_query("UPDATE CRLicao SET L2=1 Where idInscrito='$id2'");
  if($data == '2017-03-21')
      $up = @mysql_query("UPDATE CRLicao SET L3=1 Where idInscrito='$id2'");
  if($data == '2017-03-28')
      $up = @mysql_query("UPDATE CRLicao SET L4=1 Where idInscrito='$id2'");
  if($data == '2017-04-04')
      $up = @mysql_query("UPDATE CRLicao SET L5=1 Where idInscrito='$id2'");
  if($data == '2017-04-11')
      $up = @mysql_query("UPDATE CRLicao SET L6=1 Where idInscrito='$id2'");
  if($data == '2017-04-18')
      $up = @mysql_query("UPDATE CRLicao SET L7=1 Where idInscrito='$id2'");
  if($data == '2017-04-25')
      $up = @mysql_query("UPDATE CRLicao SET L8=1 Where idInscrito='$id2'");
  if($data == '2017-05-02')
      $up = @mysql_query("UPDATE CRLicao SET L9=1 Where idInscrito='$id2'");
  if($data == '2017-05-09')
      $up = @mysql_query("UPDATE CRLicao SET L10=1 Where idInscrito='$id2'");
  if($data == '2017-05-16')
      $up = @mysql_query("UPDATE CRLicao SET L11=1 Where idInscrito='$id2'");
  if($data == '2017-05-23')
      $up = @mysql_query("UPDATE CRLicao SET L12=1 Where idInscrito='$id2'");
  if($data == '2017-05-30')
      $up = @mysql_query("UPDATE CRLicao SET L13=1 Where idInscrito='$id2'");
  if($data == '2017-06-06')
      $up = @mysql_query("UPDATE CRLicao SET L14=1 Where idInscrito='$id2'");
  if($data == '2017-06-13')
      $up = @mysql_query("UPDATE CRLicao SET L15=1 Where idInscrito='$id2'");
  if($data == '2017-06-20')
      $up = @mysql_query("UPDATE CRLicao SET L16=1 Where idInscrito='$id2'");
  if($data == '2017-06-27')
      $up = @mysql_query("UPDATE CRLicao SET L17=1 Where idInscrito='$id2'");
  if($data == '2017-07-04')
      $up = @mysql_query("UPDATE CRLicao SET L18=1 Where idInscrito='$id2'");
  if($data == '2017-07-11')
      $up = @mysql_query("UPDATE CRLicao SET L19=1 Where idInscrito='$id2'");
  if($data == '2017-07-18')
      $up = @mysql_query("UPDATE CRLicao SET L20=1 Where idInscrito='$id2'");
  if($data == '2017-07-25')
      $up = @mysql_query("UPDATE CRLicao SET L21=1 Where idInscrito='$id2'");
  if($data == '2017-08-01')
      $up = @mysql_query("UPDATE CRLicao SET L22=1 Where idInscrito='$id2'");
  if($data == '2017-08-08')
      $up = @mysql_query("UPDATE CRLicao SET L23=1 Where idInscrito='$id2'");
  if($data == '2017-08-12')
      $up = @mysql_query("UPDATE CRLicao SET Inv=1 Where idInscrito='$id2'");
  if($data == '2017-08-15')
      $up = @mysql_query("UPDATE CRLicao SET L24=1 Where idInscrito='$id2'");
  if($data == '2017-08-22')
      $up = @mysql_query("UPDATE CRLicao SET L25=1 Where idInscrito='$id2'");
  if($data == '2017-08-29')
      $up = @mysql_query("UPDATE CRLicao SET L26=1 Where idInscrito='$id2'");
  if($data == '2017-09-05')
      $up = @mysql_query("UPDATE CRLicao SET L27=1 Where idInscrito='$id2'");
  if($data == '2017-09-05')
      $up = @mysql_query("UPDATE CRLicao SET L28=1 Where idInscrito='$id2'");
  if($data == '2017-09-05')
      $up = @mysql_query("UPDATE CRLicao SET L29=1 Where idInscrito='$id2'");
  if($data == '2017-09-26')
      $up = @mysql_query("UPDATE CRLicao SET L30=1 Where idInscrito='$id2'");
 }}
 if(mysql_affected_rows() > 0){
  		echo "Sucesso: Atualizado corretamente!";
	}else{
  		echo "Aviso: N&atilde;o foi atualizado!";
	}
	mysql_close($conexao);
 ?>