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
    <title>Cadastro Desperta</title>



    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

</head>
<body>
<div id="art-page-background-middle-texture">
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
<?php

     include("conexao.php");
     $ano = date('Y');
	 $nome2 = $_SESSION[nome];
	 $sql = "SELECT *,DATE_FORMAT(datacad,'%d/%m/%Y') as idatacad, DATE_FORMAT(nascimento,'%d/%m/%Y') as inasc FROM cadCR WHERE Ano = '$ano' AND nome = '$nome2'";

$resultado = mysql_query($sql) or die (mysql_error());

while ($linha = mysql_fetch_array($resultado)) {
	
	$idInsc = $linha['idInscrito'];
	$datacad = $linha['idatacad'];
	$nome = $linha['nome'];
	$nasc = $linha['inasc'];
	$tel = $linha['tel'];
	$cel = $linha['cel'];
	$email = $linha['email'];
	
}
  echo "<font size='4' color='#0033FF' style=\"text-align:\'center'\">Seu cadastro foi realizado com sucesso!!</font>";
  echo "<br /><br />";
  echo "<font size='3' color='#FFFF00'>";
  echo "Veja os seus dados cadastrados"; echo "<br /><br />";
  echo "ID: ".$idInsc;echo "<br />";
  echo "Nome: ".$nome;echo "<br />";
  echo "Nascimento: ".$nasc;echo "<br />";
  echo "Telefone: ".$tel;echo "<br />";
  echo "Celular: ".$cel;echo "<br />";
  echo "E-mail: ".$email;echo "<br />";
  echo "</font>";
  
  ?>
  <br /><br /><br />
  <a href="cadCR.php"><font size="3" color='#FFFF00'>Nova Inscri&ccedil;&atilde;o</font></a>
     
  
		<div class="cleared"></div>
    </div>
</div>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
<div class="art-post-inner art-article">
                                
		<div class="cleared"></div>
    </div>
</div>

                          <div class="cleared"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            <div class="art-footer">
                <div class="art-footer-body">
                    <a href="#" class="art-rss-tag-icon" title="RSS"></a>
                            <div class="art-footer-text">
                                <? include ("footer.php"); ?>
                            </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <p class="art-page-footer"></p>
    <div class="cleared"></div>
</div>
</div>

</body>
</html>
