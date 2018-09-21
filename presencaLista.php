<?php
 require("includes/arruma_link.php");
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.1.0.46558
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title>Lista de Presença</title>



    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

     <script type="text/javascript" src="includes/micoxAjax.js"></script>
 <script type="text/javascript">    
     function checar(pagina,texto) { if (confirm("CONFIRMA O PAGAMENTO ?")==true) { window.location=pagina; } }
     function checar2(pagina,texto) { if (confirm("CONFIRMA A EXCLUSÃO ?")==true) { window.location=pagina; } }
	 function checar3(pagina,texto) { if (confirm("CONFIRMA A PRESENÇA ?")==true) { window.location=pagina; } }
 </script>  
</head>
<body>
<div id="art-page-background-glare-wrapper">
    <div id="art-page-background-glare"></div>
</div>
<div id="art-main">
    <div class="cleared reset-box"></div>
<div class="art-bar art-nav">
<div class="art-nav-outer">
<div class="art-nav-wrapper">
<div class="art-nav-inner">
	<?php
	 
	 if($_SESSION["nivelid"] == 10)
     		include("menuM.php"); 
		else
		    include("menuS.php");
				
	 ?>
</div>
</div>
</div>
</div>
<div class="cleared reset-box"></div>
<div class="art-box art-sheet">
        <div class="art-box-body art-sheet-body">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
<div class="art-post-inner art-article">
            <!--                    <h2 class="art-postheader">&nbsp;<a href="#">&nbsp;</a>&nbsp;<a class="visited" href="#">&nbsp;</a>&nbsp;<a class="hovered" href="#">&nbsp;</a>
                                </h2>
                                                                <div class="art-postheadericons art-metadata-icons">
                    <span class="art-postdateicon">&nbsp;</span>&nbsp;<span class="art-postauthoricon">&nbsp;</span>&nbsp;<span class="art-postpdficon"></span>&nbsp;<span class="art-postprinticon"></span>&nbsp;<span class="art-postemailicon"></span>&nbsp;<span class="art-postediticon"></span> -->
                </div>
                <div class="art-postcontent">

<br />
<font size="+2" color="#FFFFFF">Relação das presença</font><br />
<font size="+2" color="#FFFFFF"><? echo date('Y');  ?></font>
</div>
<div id="main">
<table align="left" width="100%" border="1">
  <tr align="center" bgcolor="#CCCCCC">
    <td align="center" style="width: 5%"><font color="#333333" size="1"><b>Nº</b></font></td>
    <td align="center" style="width: 10%"><font color="#333333" size="1"><b>ID</b></font></td>
    <td align="center" style="width: 50%"><font color="#333333" size="1"><b>Nome</b></font></td>
    <td align="center" style="width: 35%"><font color="#333333" size="1"><b>Presença</b></font></td>       
  </tr>
</table>

<?php
include "conexao.php";
$ano = date("Y");
$today = date("d/m/Y");

 $con = 1; $contagem = 0;
  $sql = "SELECT * FROM presenca WHERE ano = '$ano'";
     $resultado = mysql_query($sql) or die (mysql_error());
      while ($linha = mysql_fetch_array($resultado)) {
	         $idInsc = $linha['idInscrito'];
			 $data1 =  $linha['data'];
	         $ano1 =  $linha['ano'];
	  while($idInsc == $idInsc2)
	      $contagem = $contagem + 1;				      
			
	$sql2 = "SELECT nome FROM cadCR WHERE idInscrito = '$idInsc'";
     $resultado2 = mysql_query($sql2) or die (mysql_error());
      while ($linha2 = mysql_fetch_array($resultado2)) {
	         $nome1 = $linha2['nome'];
			 		 
	if ($con % 2 == 0)
		 $bgcolor = "bgcolor='#FFFFFF'";
	else
		 $bgcolor = "bgcolor='#FFFFCC'";
	   
	if($idInsc != $idInsc2){
		
?>
<center>
<table align="left" width="100%"  border="1">
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 5%"><font color="#333333" size="1"><b><? echo $con; ?></b></font></td>
    <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $idInsc; ?></b></font></td>
    <td align="left" style="width: 50%"><font <? echo $color; ?> size="1"><b><? echo $nome1; ?></b></font></td>
    <td align="center" style="width: 35%"><font color="#333333" size="1"><b><? echo $contagem; ?></b></font></td> 
  </tr>                                
</table>
</center>
<?
}
$con = $con + 1;
}
$contagem = 0;
$idInsc2 = $idInsc; 			
 }

?>

</div>
<div id="footer">
<table width="100%" border="1">
<tr>
<td align="left" width="10%"><a href="ImprimeLista.php" target="_blank" title="Lista Inscritos Geral"><img src="images/imprimir.jpg" width="90" height="22" align="left" /></a></td>
</tr>
</table>
</div>
</div>
                </div>
                <div class="cleared"></div>
    
            <div class="cleared"></div> 
            <div class="art-footer">
                <div class="art-footer-body">
                    <a href="#" class="art-rss-tag-icon" title="RSS"></a>
                            <div class="art-footer-text">
                                <p><a href="http://www.idbras.com.br" target="_blank">IDBRAS</a></p><p>Copyright &copy; <? echo $ano; ?>. Todos os direitos reservados.</p>
                  </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
  </div>
</div>
<div class="cleared"></div>
    
    <div class="cleared"></div>
</div>

</body>
</html>