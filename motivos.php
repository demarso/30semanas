<?php
 require("includes/arruma_link.php");
session_start();
$ano = date("Y");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.1.0.46558
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
    
       <div class="art-post-inner art-article"><div>
        <br /><center> 
               <div><font size="6" color="#FFFF00">GRUPOS DE APOIO</font>
               </div>
               </center>
       </div>
    
    <div>
<center> 
<font color="#000000">
 <table bgcolor="#CCCCCC">
  <tr>
    <td width="350" align="center"><b>GRUPO DE PRIMEIRA VEZ</b></td><td rowspan="2">&nbsp;&nbsp;</td><td width="350" align="center"><b>RELIGIOSIDADE</b></td>
  </tr>
  <tr>
    <td width="350">Para todos que estão no CR pela primeira vez e querem conhecer um pouco mais do que se trata o programa.</td>
    <td width="350">Para homens e mulheres feridos com a igreja e/ou a liderança, que lutam contra a autojustiça, orgulho. São presas a práticas ou ritos acima de tudo. Produzem uma espiritualidade superficial.</td>
  </tr>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <tr>
    <td width="350" align="center"><b>BAIXA AUTO-ESTIMA</b></td><td rowspan="2">&nbsp;&nbsp;</td><td width="350" align="center"><b>IRA</b></td>
  </tr>
  <tr>
    <td width="350">Para homens e mulheres que enfrentam problemas com a auto-estima e apresentam insegurança. São indecisos, buscam aprovação das pessoas compulsivamente e desprezam seus sentimentos.</td>
    <td width="350">Para homens e mulheres que usam a ira com tendências de inflexibilidade, descontrole emocional e racionalizam muito. Dificuldade em lidar com conflitos e expor seus sentimentos adequadamente.</td>
  </tr>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
 <tr>
    <td width="350" align="center"><b>SEXUALIDADE</b></td><td rowspan="2">&nbsp;&nbsp;</td><td width="350" align="center"><b>LUTO</b></td>
  </tr>
  <tr>
    <td width="350">Para homens e mulheres que apresentam problemas relacionados à compulsão sexual, maus hábitos referentes ao sexo, pornografia, devassidão, obscenidade, homossexualismo  e adultério.</td>
    <td width="350">Para pessoas em luto, resultando em privação e ansiedade, cujo comportamento e emoção estão frágeis e influindo nos relacionamentos e também na espiritualidade.</td>
  </tr>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <tr>
    <td width="350" align="center"><b>COMPULSÃO FINANCEIRA</b></td><td rowspan="2">&nbsp;&nbsp;</td><td width="350" align="center"><b>COMPULSÃO ALIMENTAR</b></td>
  </tr>
  <tr>
    <td width="350">Pessoas que gastam descontroladamente para aumentar a auto-estima e para remediar outros defeitos percebidos, com a tendência de comprar produtos além do necessário e de recursos pessoais.</td>
    <td width="350">Pessoas que apresentam distúrbio alimentar compulsivo. Distúrbios que contemplam tanto a compulsão por comer muito, quanto a abstinência de alimento.</td>
  </tr>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <tr>
    <td width="350" align="center"><b>DEPENDÊNCIA QUÍMICA</b></td><td rowspan="2">&nbsp;&nbsp;</td><td width="350" align="center"><b>PÂNICO, MEDO E DEPRESSÃO</b></td>
  </tr>
  <tr>
    <td width="350">Para homens e mulheres que apresentam dependência química o/ou álcool. Pessoas que honestamente desejam parar, mas que entendem que sozinhas não conseguem.</td>
    <td width="350">Para homens e mulheres que apresentam depressão, síndrome do pânico e medo, que se sentem incapazes de lidar com os problemas e circunstâncias da vida.</td>
  </tr>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <tr><td colspan="3"><b>CODEPENDÊNCIA</b></td></tr>
  <tr><td colspan="3">
  - Meus sentimentos positivos de quem sou vem de ser amado por você.<p>
  - Meus sentimentos sobre quem sou variam de acordo com a sua aprovação.<p>
  - Sua luta afeta minha serenidade. Concentro-me em resolver seus problemas e aliviar a sua dor.<p>
  - Vejo-me concentrado em lhe agradar.<p>
  - Vejo-me concentrado em como lhe proteger.<p>
  - Minha auto-estima cresce quando resolvo seus problemas.<p>
  - Minha auto-estima cresce quando consigo aliviar a sua dor.<p>
  - Meus lazer e coisas do meu interesse são postos de lado, em detrimento do seu interesse e lazer.<p>
  - Suas roupas e aparência pessoal são ditadas por meus desejos pois sinto que você é um reflexo de mim.<p>
  - Seu comportamento é controlado por mim, pois sinto que você é um reflexo de mim.<p>
  - Não sei como me sinto. Só sei como você se sente.<p>
  - Não sei o que quero, pois só me interessa o que você quer. Não pergunto, pressuponho.<p>
  - Os sonhos que tenho para o futuro são ligados a você.<p>
  - Meu medo de rejeição determina o que digo ou faço.<p>
  - Meu medo de sua raiva determina o que digo ou faço.<p>
  - O ato de dar ou presentear é usado por mim como uma maneira de sentir-me seguro em nosso relacionamento.<p>
  - Meu círculo social diminui a medida que me envolvo com você.<p>
  - Ponho meus valores de lado para ligar-me a você.<p>
  - Valorizo sua opinião e sua maneira de fazer as coisas mais do que as minhas.<p>
  - Minha qualidade de vida está diretamente relacionada à sua.
   </td></tr>
    <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
 </table>   
 </font>
 
 
</center>
</div>
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
                                <? include("footer2.php"); ?>
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
