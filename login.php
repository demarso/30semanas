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

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="includes/script.js"></script>
<script type="text/javascript" src="includes/jquery.js"></script>
<script type="text/javascript" src="includes/jquery-1.3.2.js"></script>
<script type="text/javascript" src="includes/jquery-1.6.1.min.js"></script>  
<script type="text/javascript" src="includes/maskedinput-1.1.2.pack.js"></script>
<script type="text/javascript" src="includes/jquery.maskedinput.js"/></script>
<script type="text/javascript" src="includes/micoxAjax.js"></script>
<script type="text/javascript">
/* $(document).ready(function(){
		$("#tel").mask("(99)9999-9999");
		$("#cel").mask("(99)9999-9999");
		$("#cep").mask("99999-999");
		$("#nascimento").mask("99/99/9999");
		$("#cpf").mask("999.999.999-99");
}); */
	
	function getEndereco() {
			// Se o campo CEP não estiver vazio
			if($.trim($("#cep").val()) != ""){
				/* 
					Para conectar no serviço e executar o json, precisamos usar a função
					getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
					dataTypes não possibilitam esta interação entre domínios diferentes
					Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
					http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
				*/
				$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
					// o getScript dá um eval no script, então é só ler!
					//Se o resultado for igual a 1
			  		if(resultadoCEP["resultado"]){
						// troca o valor dos elementos
						$("#end").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"])+", ");
						$("#bairro").val(unescape(resultadoCEP["bairro"]));
						$("#cidade").val(unescape(resultadoCEP["cidade"]));
						$("#estado").val(unescape(resultadoCEP["uf"]));
					}else{
						alert("Endereço não encontrado");
					}
				});				
			}			
	}
//adiciona mascara de cep
function MascaraCep(cep){
                if(mascaraInteiro(cep)==false){
                event.returnValue = false;
        }       
        return formataCampo(cep, '00000-000', event);
}

//adiciona mascara de data
function MascaraData(data){
        if(mascaraInteiro(data)==false){
                event.returnValue = false;
        }       
        return formataCampo(data, '00/00/0000', event);
}

//adiciona mascara ao telefone
function MascaraTelefone(tel){  
        if(mascaraInteiro(tel)==false){
                event.returnValue = false;
        }       
        return formataCampo(tel, '(00) 0000-0000', event);
}

function MascaraLetra(comp){  
        if(mascaraLetra(comp)==false){
                event.returnValue = false;
        }       
        return formataCampo(comp, 'A', event);
}

//adiciona mascara ao CPF
function MascaraCPF(cpf){
        if(mascaraInteiro(cpf)==false){
                event.returnValue = false;
        }       
        return formataCampo(cpf, '000.000.000-00', event);
}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
        var boleanoMascara; 
        
        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g;
        campoSoNumeros = campo.value.toString().replace( exp, "" ); 
   
        var posicaoCampo = 0;    
        var NovoValorCampo="";
        var TamanhoMascara = campoSoNumeros.length;; 
        
        if (Digitato != 8) { // backspace 
                for(i=0; i<= TamanhoMascara; i++) { 
                        boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                                || (Mascara.charAt(i) == "/")); 
                        boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")); 
                        if (boleanoMascara) { 
                                NovoValorCampo += Mascara.charAt(i); 
                                  TamanhoMascara++;
                        }else { 
                                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                                posicaoCampo++; 
                          }              
                  }      
                campo.value = NovoValorCampo;
                  return true; 
        }else { 
                return true; 
        }
}	

function ValidEmail(email)
{
   var email = email;
   var pattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
   var obj = eval("document.form1.email");
	
   if (pattern.test(email)) {
      return true;
   } else {
    alert('Email incorreto');
	obj.value ="";
	obj.focus();
   }
}
/*
function ValidEmail()
{
  var obj = eval("document.form1.emailMemb");
  var txt = obj.value;
  if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 7)))
  {
    alert('Email incorreto');
	obj.value ="";
	obj.focus();
  }
} */

function igreja(){
 var I = document.getElementById('memb').value;
 if( I == "SIM" || I == "Sim")
 document.getElementById('aigreja').value = "Igreja Batista de Rancho Novo";
 else
 document.getElementById('aigreja').value = "";
}


function ValidaSemPreenchimento(form){
for (i=0;i<form.length;i++){
var obg = form[i].obrigatorio;
if (obg==1){
if (form[i].value == ""){
var nome = form[i].name
alert("O campo " + nome + " é obrigatório.\n\n OBRIGADO")
form[i].focus();
return false
}
}
}
return true
} 

var ieBlink = (document.all)?true:false;
function doBlink(){
	if(ieBlink){
		obj = document.getElementsByTagName('BLINK');
		for(i=0;i<obj.length;i++){
			tag=obj[i];
			tag.style.visibility=(tag.style.visibility=='hidden')?'visible':'hidden';
		}
	}
}

function showT(c,f){
 if(c.checked){
	f.txtcort.style.visibility="visible"
	f.cortesia.style.visibility="visible"
 }
 else{
	f.txtcort.style.visibility="hidden"
	f.cortesia.style.visibility="hidden"
 }
}

function showF(c,f){
 if(c.checked){
	f.txtcort.style.visibility="hidden"
	f.cortesia.style.visibility="hidden"
 }
}


</script>


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
        <br />
               <div><font size="6" color="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGIN</font>
               </div>
       </div>
    
    <div>
<center> 
 <form action="testar.php" method="post" name="formulario">
<font class="font3"><br />
<?php
 if (isset($_GET['errologin'])){
  echo "\n";
  echo "<font size='3' color='#FFFF00'><b>&nbsp;&nbsp&nbsp&nbsp*** Senha inválida! ***</b></font>";
  echo "\n";
  }
 if (isset($_GET['erro'])){
  echo "\n";
  echo "<font size='3' color='#FF0000'><b>*** Coloque o Login e senha válidos primeiro! ***</b></font>";
  echo "\n";
  } 
?>
</font>


<table>
<tr>
 <td><font color="#FFFFFF" >Login:</font></td>
 <td><input type="text" name="login" size="30
 "  align="left" maxlength=18 ></td>
</tr>
<tr><td colspan="2" align="center">&nbsp;</td></tr>
 <tr>
   <td><font color="#FFFFFF">Senha:</font></td>
   <td><input type="password" name="senha" size="30
   " class="formulario"></td>
 </tr>
 <tr><td colspan="2" align="center">&nbsp;</td></tr>
 <tr>
  <td colspan="2" align="center"><input type="submit" value="LOGAR" class="formulario"></td>
  </tr>
</table>
     
</form>
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
