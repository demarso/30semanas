<?php
 session_start();
 require("includes/arruma_link.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title>Lista do CR</title>
     <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
     <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script> 
     <script type="text/javascript" src="includes/script.js"></script>
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
	 
	 if($_SESSION["nivel"] == 10)
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
<font size="+2" color="#FFFFFF">Relação dos participantes do 30SEMANAS</font>
<font size="+2" color="#FFFFFF"><? echo "  -  ".date('Y');  ?></font>
</div>
<div id="main">
<table id="tabela" align="left" width="100%" border="1">
  <thead>
  <tr align="center" bgcolor="#CCCCCC">
    <th align="center" style="width: 3%"><font color="#333333" size="1"><b>Del</b></font></th>
    <th align="center" style="width: 4%"><font color="#333333" size="1"><b>P</b></font></th>
    <th align="center" style="width: 4%"><font color="#333333" size="1"><b>Nº</b></font></th>
    <th align="center" style="width: 21%"><font color="#333333" size="1"><b>Nome</b></font></th>
    <th align="center" style="width: 7%"><font color="#333333" size="1"><b>Nascimento</b></font></th> 
	<th align="center" style="width: 7%"><font color="#333333" size="1"><b>Telefone</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Celular</b></font></th>
    <th align="center" style="width: 19%"><font color="#333333" size="1"><b>Email</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Area</b></font></th>
    <th align="center" style="width: 4%"><font color="#333333" size="1"><b>Idade</b></font></th>
    <th align="center" style="width: 4%"><font color="#333333" size="1"><b>Pres.</b></font></th>
	<th align="center" style="width: 4%"><font color="#333333" size="1"><b>Faltas</b></font></th>          
  </tr>
  <tr align="center" bgcolor="#CCCCCC">
    <th align="center" style="width: 3%"><input type="text" id="txtColuna1" readonly="true" size="3%"/></th> 
    <th align="center" style="width: 4%"><input type="text" id="txtColuna2" readonly="true" size="4%"/></th>
    <th align="center" style="width: 4%"><input type="text" id="txtColuna3" readonly="true" size="4%"/></th>
    <th align="center" style="width: 21%"><input type="text" id="txtColuna4" size="21%"/></th>
    <th align="center" style="width: 7%"><input type="text" id="txtColuna5" size="7%"/></th>
    <th align="center" style="width: 7%"><input type="text" id="txtColuna6" size="7%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna7" size="10%"/></font></th>
    <th align="center" style="width: 19%"><input type="text" id="txtColuna8" size="19%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna9" size="10%"/></th>
    <th align="center" style="width: 4%"><input type="text" id="txtColuna10" size="4%"/></th>
    <th align="center" style="width: 4%"><input type="text" id="txtColuna11" size="4%"/></th>
    <th align="center" style="width: 4%"><input type="text" id="txtColuna12" size="4%"/></th>
 </tr>
 </thead>
</table>

<?php
include "conexao.php";
$ano = date("Y");
$today = date("d/m/Y");

$saldo = 0;  $pag = 0; $con = 1;
$sql = "SELECT *,DATE_FORMAT(datacad,'%d/%m/%Y') as idatacad, DATE_FORMAT(nascimento,'%d/%m/%Y') as inasc FROM 30Semanas WHERE Ano = '$ano' ORDER BY nome,deseja1,memb";

$resultado = mysqli_query($conn,$sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($resultado)) {
	
	$idInsc = $linha['idInscrito'];
	$datacad = $linha['idatacad'];
	$nome = $linha['nome'];
	$nasc = $linha['inasc'];
	$telMemb = $linha['tel'];
	$celMemb = $linha['cel'];
	$emailMemb = $linha['email'];
	$memb = $linha['memb'];
	$deseja1 = $linha['deseja1'];
	$outro = $linha['outro'];
	 if($deseja1 =="Outro")
	     $deseja1 = "Outro - ".$outro;
	if ($con % 2 == 0)
		 $bgcolor = "bgcolor='#FFFFFF'";
	else
		 $bgcolor = "bgcolor='#FFFFCC'";
	
	if ($memb <> "SIM")
		 $color = "color='red'";
	else
		 $color = "color='black'"; 	  
	
	if($today < '08/03/2017')
	   {$min = 1;}
	if($today >= '07/03/2017')
	   {$min = 1;}
	if($today >= '15/03/2017')
	   {$min = 2;}
	if($today >= '22/03/2017')
	   {$min = 3;}
	if($today >= '29/03/2017')
	   {$min = 4;}
	if($today >= '05/04/2017')
	   {$min = 5;}
	if($today >= '12/04/2017')
	   {$min = 6;}
	if($today >= '19/04/2017')
	   {$min = 7;}
	if($today >= '26/04/2017')
	   {$min = 8;}
	if($today >= '03/05/2017')
	   {$min = 9;}
	if($today >= '10/05/2017')
	   {$min = 10;}
	if($today >= '17/05/2017')
	   {$min = 11;}
	if($today >= '24/05/2017')
	   {$min = 12;}
	if($today >= '31/05/2017')
	   {$min = 13;}
	if($today >= '08/06/2017')
	   {$min = 14;}
	if($today >= '21/06/2017')
	   {$min = 15;}
	if($today >= '28/06/2017')
	   {$min = 16;}
	if($today >= '05/07/2017')
	   {$min = 17;}
    if($today >= '12/07/2017')
       {$min = 18;}
    if($today >= '19/07/2017')
       {$min = 19;}
    if($today >= '26/07/2017')
       {$min = 20;}
    if($today >= '02/08/2017')
       {$min = 21;}
    if($today >= '09/08/2017')
       {$min = 22;}
    if($today >= '13/08/2017')
       {$min = 23;}
   if($today >= '16/08/2017')
       {$min = 24;}
   if($today >= '23/08/2017')
       {$min = 25;}
     if($today >= '30/08/2017')
       {$min = 26;}
    if($today >= '06/09/2017')
       {$min = 27;}
    if($today >= '13/09/2017')
        {$min = 28;}
    if($today >= '20/09/2017')
        {$min = 29;}
    if($today >= '27/09/2017')
        {$min = 30;}
	
	$partes_nascimento = explode('/',$nasc);
    $data_nascimento = $partes_nascimento[2].'/'.$partes_nascimento[1].'/'.$partes_nascimento[0];
    $partes_today = explode('/',$today);
    $data_today = $partes_today[2].'/'.$partes_today[1].'/'.$partes_today[0];

    //echo $data_nascimento."  ".$data_today."<br />";
 $diff = abs(strtotime($data_today) - strtotime($data_nascimento)); $years = floor($diff / (365*60*60*24)); $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
 
   if($years == 1)
    $old = $years." ano";
   else
    $old = $years." anos";
   if($years > 100)
    $old = "";
	$colort = "color='black'";
   if ($old < 20 && $old > "12")
		 $color = "color='green'";	
		 
	$sql2 = "SELECT COUNT( idInscrito ) as cont FROM presenca WHERE ano = '$ano' and idInscrito = '$idInsc'";
	$resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
    while ($linha2 = mysqli_fetch_array($resultado2)) {
	//$idInsc = $linha2['idInscrito'];
	$cont = $linha2['cont'];
    }
    $sql3 = "SELECT data FROM presenca WHERE ano = '$ano' and idInscrito = '$idInsc'";
    $resultado3 = mysqli_query($conn,$sql3) or die (mysql_error());
    while ($linha3 = mysqli_fetch_array($resultado3)) {
      $datai = $linha3['data'];
    
    if ($datai  == '2017-08-12')
         $colort = "color='red'";
        else
         $colort = "color='black'"; 
    }
    $fal = $min-$cont;

    $query = mysqli_query($conn,$sql = "update cadCR set presenca = '$cont', faltas = '$fal' where idInscrito = '$idInsc' and Ano = '$ano'") or die(mysql_error());
?>
<table id="tabela" align="left" width="100%" border="1">
 <tbody>
  <tr align="center" <? echo $bgcolor; ?>>
  <td align="center" style="width: 3%">
	   <?
	   echo "<a href=\"javascript:checar2('delete.php?idInscrito=".$idInsc."');\"><img src=\"images/menos_ico.png\" border=\"0\" alt=\"Click para deletar o Inscrito.\" title=\"Click para deletar o Inscrito.\"></a>";
	   ?>
	   </td>
       <td align="center" style="width: 4%">
	   <?
	   echo "<a href=\"javascript:checar3('presenca.php?idInscrito=".$idInsc."');\"><img src=\"images/P_ico.png\" border=\"0\" alt=\"Click para marcar presença.\" title=\"Click para marcar presença.\"></a>";
	   ?>
	   </td>
    <td align="center" style="width: 4%"><font color="#333333" size="1"><b><? echo $con; ?></b></font></td>
    <td align="left" style="width: 21%"><font <? echo $colort; ?> size="1"><b><? echo $nome."<br /><font color='red'>".$adotante."</font>"; ?></b></font></td>
    <td align="center" style="width: 7%"><font color="#333333" size="1"><b><? echo $nasc; ?></b></font></td> 
    <td align="center" style="width: 7%"><font color="#333333" size="1"><b><? echo $telMemb; ?></b></font></td>
    <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $celMemb; ?></b></font></td>
    <td align="center" style="width: 19%"><font color="#333333" size="1"><b><a href="mailto:<? echo $emailMemb; ?>"><? echo $emailMemb; ?></a></b></font></td>
    <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $deseja1; ?></b></font></td>
    <td align="center" style="width: 4%"><font color="#333333" size="1"><b><? echo $old; ?></b></font></td>
    <td align="center" style="width: 4%"><font color="blue"  size="2"><b><? echo $cont; ?></b></font></td>
	<td align="center" style="width: 4%"><font color="blue"  size="2"><b><? echo $fal; ?></b></font></td>
  </tr>
 </tbody>
</table>
 

<?
$con = $con + 1;
}
//echo $today." - ".$min." - ".$cont;

$con = $con - 1;
$saldo = number_format(round($saldo * 2 )/ 2,2);
?>

</div>
<div id="footer">
<table width="100%" border="1">
<tr>
<td align="left" width="10%"><a href="ImprimeLista.php" target="_blank" title="Lista Inscritos Geral"><img src="images/imprimir.jpg" width="90" height="22" align="left" /></a></td>
<td align="left"><font color="#FFFF00"><b>Inscritos para este ano:&nbsp;<? echo $con; ?></b></font></td>
</tr>
</table>
</div>
</div>
                </div>
                <div class="cleared"></div>
    <!--                            <div class="art-postfootericons art-metadata-icons">
                    <span class="art-postcategoryicon">Category: <span class="art-post-metadata-category-name"><a href="#">News</a></span></span>
                </div>
                </div>

		<div class="cleared"></div>
    </div>
</div>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
<div class="art-post-inner art-article">
                                <h2 class="art-postheader">Community Portal
                                </h2>
                                                                <div class="art-postheadericons art-metadata-icons">
                    <span class="art-postdateicon">Wednesday, 17 September 2008 12:00</span> | <span class="art-postauthoricon"> Written by Administrator</span> | <span class="art-postpdficon"></span> | <span class="art-postprinticon"></span> | <span class="art-postemailicon"></span> | <span class="art-postediticon"></span>
                </div>
                <div class="art-postcontent">

<h1>Heading 1</h1>
    <h2>Heading 2</h2>
    <h3>Heading 3</h3>
    <h4>Heading 4</h4>
    <h5>Heading 5</h5>
    <h6>Heading 6</h6>
    <p>Lorem <sup>superscript</sup> dolor <sub>subscript</sub> amet, consectetuer adipiscing
        elit, <a href="#" title="test link">test link</a>. Nullam dignissim convallis est.
        Quisque aliquam. <cite>cite</cite>. Nunc iaculis suscipit dui. Nam sit amet sem.
        Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent
        mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim
        diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla
        nonummy. <acronym title="National Basketball Association">NBA</acronym> Mauris a
        ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi
        imperdiet augue quis tellus.
        <abbr title="Avenue">
            AVE</abbr></p>
    <h3>List</h3>
    <ul>
        <li>List Item 1</li>
        <li>List Item 2</li>
        <li>List Item 3</li>
    </ul>
    <h3>Quote</h3>
    <blockquote>
        <p>
            “This stylesheet is going to help so freaking much.”
            <br />
            -Blockquote
        </p>
    </blockquote>
    <h3>Table</h3>
    <table class="art-article" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <th>Header</th>
    <th>Header</th>
    <th>Header</th>
    </tr>
    <tr>
    <td>Data</td>
    <td>Data</td>
    <td>Data</td>
    </tr>
    <tr class="even">
    <td>Data</td>
    <td>Data</td>
    <td>Data</td>
    </tr>
    <tr>
    <td>Data</td>
    <td>Data</td>
    <td>Data</td>
    </tr>
    </tbody></table>
    <p>
		<span class="art-button-wrapper">
			<span class="art-button-l"> </span>
			<span class="art-button-r"> </span>
			<a class="readon art-button" href="javascript:void(0)">Read more...</a>
		</span>
    </p>

                </div>
                <div class="cleared"></div>
                                <div class="art-postfootericons art-metadata-icons">
                    <span class="art-postcategoryicon">Category: <span class="art-post-metadata-category-name"><a href="#">News</a></span></span>
                </div>
                </div>

		<div class="cleared"></div>
    </div>
</div>

                          <div class="cleared"></div>
                  </div>
              </div>
          </div>
    </div> -->
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