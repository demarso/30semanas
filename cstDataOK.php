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
    <title>Lista do CR</title>



    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

     <script type="text/javascript" src="includes/micoxAjax.js"></script>
    
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
<font size="+2" color="#FFFFFF">Relação dos participantes do Celebrando a Recuperação</font><br />
<font size="+2" color="#FFFFFF"><? echo date('Y');  ?></font>
</div>
<div id="main">
<table align="left" width="100%" border="1">
  <tr align="center" bgcolor="#CCCCCC">
    <td align="center" style="width: 4%"><font color="#333333" size="1"><b>Nº</b></font></td>
    <td align="center" style="width: 25%"><font color="#333333" size="1"><b>Nome</b></font></td>
    <td align="center" style="width: 8%"><font color="#333333" size="1"><b>Nascimento</b></font></td> 
	<td align="center" style="width: 8%"><font color="#333333" size="1"><b>Telefone</b></font></td>
    <td align="center" style="width: 10%"><font color="#333333" size="1"><b>Celular</b></font></td>
    <td align="center" style="width: 25%"><font color="#333333" size="1"><b>Email</b></font></td>
    <td align="center" style="width: 10%"><font color="#333333" size="1"><b>Area</b></font></td>
    <td align="center" style="width: 5%"><font color="#333333" size="1"><b>Idade</b></font></td>
    <td align="center" style="width: 5%"><font color="#333333" size="1"><b>IBRN</b></font></td>         
  </tr>
</table>

<?php
include "conexao.php";
$ano = date("Y");
$today = date("d/m/Y");
$data1 = $_POST["data1"];
$data2 = $_POST["data2"];

$saldo = 0;  $pag = 0; $con = 1;
$sql = "SELECT 
         pre.idInscrito AS id,
         cad.nome AS nome
         FROM presenca AS pre
         INNER JOIN cadCR AS cad
         WHERE cad.idInscrito = pre.idInscrito and pre.data = DATE_FORMAT('$data1','%Y-%m-%d')
         ORDER BY nome";

$resultado = mysql_query($sql) or die (mysql_error());

while ($linha = mysql_fetch_array($resultado)) {
    
    $idInsc = $linha['id'];
    //$idInsc = $linha['idInscrito'];
	//$datacad = $linha['idatacad'];
	$nome = $linha['nome'];
	//$nasc = $linha['inasc'];
	//$telMemb = $linha['tel'];
	//$celMemb = $linha['cel'];
	//$emailMemb = $linha['email'];
	//$memb = $linha['memb'];
	//$deseja1 = $linha['deseja1'];
	//$outro = $linha['outro'];
	// if($deseja1 =="Outro")
	//     $deseja1 = "Outro - ".$outro;
	if ($con % 2 == 0)
		 $bgcolor = "bgcolor='#FFFFFF'";
	else
		 $bgcolor = "bgcolor='#FFFFCC'";
	
	if ($memb <> "SIM")
		 $color = "color='red'";
	else
		 $color = "color='black'"; 	  
	
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
	
   if ($old < 20 && $old > "12")
		 $color = "color='green'";	
  
 // echo $data1."  ". $data2;		 
?>
<center>
<? if ($datacad >= $data1 && $datacad <= $data2) {?>
<table align="left" width="100%"  border="1">
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 4%"><font color="#333333" size="1"><b><? echo $con; ?></b></font></td>
    <td align="left" style="width: 25%"><font <? echo $color; ?> size="1"><b><? echo $nome."<br /><font color='red'>".$adotante."</font>"; ?></b></font></td>
   <td align="center" style="width: 8%"><font color="#333333" size="1"><b><? echo $nasc; ?></b></font></td> 
   <td align="center" style="width: 8%"><font color="#333333" size="1"><b><? echo $telMemb; ?></b></font></td>
    <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $celMemb; ?></b></font></td>
    <td align="center" style="width: 25%"><font color="#333333" size="1"><b><a href="mailto:<? echo $emailMemb; ?>"><? echo $emailMemb; ?></a></b></font></td>
    <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $deseja1; ?></b></font></td>
    <td align="center" style="width: 5%"><font color="#333333" size="1"><b><? echo $old; ?></b></font></td>
    <td align="center" style="width: 5%"><font <? echo $color; ?>  size="1"><b><? echo $memb; ?></b></font></td>
  </tr>                                
</table>
<? $con = $con + 1; } ?>
</center>
<?

}


$con = $con - 1;
$saldo = number_format(round($saldo * 2 )/ 2,2);
?>

</div>
<div id="footer">
<table width="100%" border="1">
<tr>
<td align="left" width="10%"><a href="#" target="_blank" title="Lista Inscritos Geral"><img src="images/imprimir.jpg" width="90" height="22" align="left" /></a></td>
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
                                <p><a href="http://www.idbras.com.br" target="_blank">IDBRAS</a></p><p>Copyright &copy; 2014. Todos os direitos reservados.</p>
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
