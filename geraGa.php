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
    <title>CR - IBRN</title>



    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
    
<script type="text/javascript" src="/cr/includes/script.js"></script>
<script type="text/javascript" src="/cr/includes/jquery.js"></script>
<script type="text/javascript" src="/cr/includes/jquery-1.3.2.js"></script>
<script type="text/javascript" src="/cr/includes/jquery-1.6.1.min.js"></script>  
<script type="text/javascript" src="/cr/includes/maskedinput-1.1.2.pack.js"></script>
<script type="text/javascript" src="/cr/includes/jquery.maskedinput.js"/></script>
<script type="text/javascript" src="/cr/includes/micoxAjax.js"></script>

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
                      <div class="art-layout-wrapper">
                        <div class="art-content-layout">
                          <div class="art-content-layout-row">
                            <div class="art-layout-cell art-content">
                              <div class="art-box art-post">
                                <div class="art-box-body art-post-body">
                                  <div class="art-post-inner art-article"> <br />
                                    <br />
                                    <form action="geraGaOK.php" method="post" name="form1" >
                                      <center>
                                        <table>
                                        <tr>
                                        <td bgcolor="#CCFF66">G�nero:</td>
                                        <td>
                                        <select name="genero" id="genero" >
			                              <option value=""> - - -</option>
                                          <option value="Masculino">Masculino</option>
                                          <option value="Feminino">Feminino</option>
                                    	</select>
                                        </td></tr>
                                          <tr>
                                            <td bgcolor="#CCFF66">Motivo:&nbsp;&nbsp;</td>
                                            <td><input type="text" name="motivo" id="motivo"  size="50"/></td>
                                          </tr>
                                          <tr>
                                            <td bgcolor="#CCFF66">Lider:</td>
                                            <td><select name="lider" id="lider">
                                              <option value="">Selecione</option>
                                              <?php
						$ano = date('Y');
			            //Busco os estados
						require_once("conexao.php");
						$sql3 = "SELECT nome FROM cadCR WHERE ano = '$ano' ORDER BY nome";
						$results3 = mysql_query($sql3);
						while ( $row = mysql_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
                                            </select></td>
                                          </tr>
                                          <tr>
                                            <td bgcolor="#CCFF66">CoLider:</td>
                                            <td><select name="colider" id="colider">
                                              <option value="">Selecione</option>
                                              <?php
						$ano = date('Y');
			            //Busco os estados
						require_once("conexao.php");
						$sql3 = "SELECT nome FROM cadCR WHERE ano = '$ano' ORDER BY nome";
						$results3 = mysql_query($sql3);
						while ( $row = mysql_fetch_array($results3) ) {
							echo "<option value='".$row[0]."'>".$row[0]."</option>";
						}
					    ?>
                                            </select></td>
                                          </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
 <tr>
 <td colspan="2" align="center" valign="middle"><input type="submit"  value="Gera Grupo de Apoio"/></td>
</tr>
  </table>
                                      </center>
                                    </form>
                                    <br />
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
                            <div class="art-footer-body"> <a href="#" class="art-rss-tag-icon" title="RSS"></a>
                              <div class="art-footer-text">
                                <p><a href="www.idbras.com.br">IDBRAS</a></p>
                                <p>Copyright &copy; 2014. Todos os direitos reservados.</p>
                              </div>
                              <div class="cleared"></div>
                            </div>
                          </div>
                          <div class="cleared"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cleared"></div>
    <p class="art-page-footer"></p>
    <div class="cleared"></div>
</div>
</div>

</body>
</html>
