<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
    }
 echo exec('upCRLicao.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Lista do CR</title>
     <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
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
<div class="art-post-inner art-article"></div>
<div class="art-postcontent">
<br />
<font size="+2" color="#FFFFFF">Rela&ccedil;&atilde;o da presen&ccedil;a dos participantes do 30SEMANAS</font>
<font size="+2" color="#FFFFFF"><? echo "  -  ".date('Y');  ?></font>
</div>
<div id="main">
<table align="left" width="100%" border="1">
  <tr align="center" bgcolor="#CCCCCC">
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>Num</b></font></td>
    <td align="center" style="width: 10%"><font color="#333333" size="1"><b>Nome</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L1</b></font></td> 
	<td align="center" style="width: 4"><font color="#333333" size="1"><b>L2</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L3</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L4</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L5</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L6</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L7</b></font></td>
	<td align="center" style="width: 4"><font color="#333333" size="1"><b>L8</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L9</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L10</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L11</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L12</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L13</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L14</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L15</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L16</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L17</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L18</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L19</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L20</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L21</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L22</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L23</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>Inv</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L24</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L25</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L26</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L27</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L28</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L29</b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b>L30</b></font></td>          
  </tr>
</table>

<?php
include "conexao.php";
$ano = date("Y");
$today = date("d/m/Y");

$saldo = 0;  $pag = 0; $con = 1;

$sql = "SELECT idInscrito, nome FROM cadCR WHERE ano='$ano' ORDER BY nome";
$resultado = mysql_query($sql) or die (mysql_error());
while ($linha = mysql_fetch_array($resultado)) {
     $id = $linha['idInscrito'];
     $nome = $linha['nome'];

$sql2 = "SELECT * FROM CRLicao WHERE idInscrito = '$id' and ano='$ano'";
    $resultado2 = mysql_query($sql2) or die (mysql_error());
    while ($linha2 = mysql_fetch_array($resultado2)) {
    $id = $linha2['idInscrito'];
    $L1 = $linha2['L1'];
    $L2 = $linha2['L2'];
    $L3 = $linha2['L3'];
    $L4 = $linha2['L4'];
    $L5 = $linha2['L5'];
    $L6 = $linha2['L6'];
    $L7 = $linha2['L7'];
    $L8 = $linha2['L8'];
    $L9 = $linha2['L9'];
    $L10 = $linha2['L10'];
    $L11 = $linha2['L11'];
    $L12 = $linha2['L12'];
    $L13 = $linha2['L13'];
    $L14 = $linha2['L14'];
    $L15 = $linha2['L15'];
    $L16 = $linha2['L16'];
    $L17 = $linha2['L17'];
    $L18 = $linha2['L18'];
    $L19 = $linha2['L19'];
    $L20 = $linha2['L20'];
    $L21 = $linha2['L21'];
    $L22 = $linha2['L22'];
    $L23 = $linha2['L23'];
    $LI = $linha2['Inv'];
    $L24 = $linha2['L24'];
    $L25 = $linha2['L25'];
    $L26 = $linha2['L26'];
    $L27 = $linha2['L27'];
    $L28 = $linha2['L28'];
    $L29 = $linha2['L29'];
    $L30 = $linha2['L30'];
 
 
    if ($con % 2 == 0)
         $bgcolor = "bgcolor='#FFFFFF'";
    else
         $bgcolor = "bgcolor='#FFFFCC'";
?>
<center>
<table align="left" width="100%"  border="1">
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $con; ?></b></font></td>
    <td align="left" style="width: 10%"><font color="333333" size="1"><b><? echo $nome; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L1; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L2; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L3; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L4; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L5; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L6; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L7; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L8; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L9; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L10; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L11; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L12; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L13; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L14; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo "F"; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L16; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L17; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L18; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L19; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L20; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L21; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L22; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L23; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $LI; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L24; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L25; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L26; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L27; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L28; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L29; ?></b></font></td>
    <td align="center" style="width: 4"><font color="#333333" size="1"><b><? echo $L30; ?></b></font></td>

   
  </tr>                                
</table>
 
</center>
<?
$con = $con + 1;
}
}

$con = $con - 1;

?>

</div>
<div id="footer">
<table width="100%" border="1">
<tr>
<td align="left" width="10%"><a href="#" target="_blank" title="Lista Presença Geral"><img src="images/imprimir.jpg" width="90" height="22" align="left" /></a></td>

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
                               <? include("footer2.php"); ?>
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