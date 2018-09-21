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

function MascaraCelular(cel){  
        if(mascaraInteiro(cel)==false){
                event.returnValue = false;
        }       
        return formataCampo(cel, '(00) 00000-0000', event);
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
<div class="art-post-inner art-article">
<br />
<font size="3" color="#FFFF00"><b>CONGRESSO "DERPERTA"-&nbsp;&nbsp;&nbsp;2014</b></font>
<br /><br />
<?
$data = date('d/m/Y');
$nome2 = $_POST['nome'];
$cpf = $_POST['cpf']; 
$ano = date("Y");
include("conexao.php");

$sql = "SELECT *, DATE_FORMAT(nascimento,'%d/%m/%Y') as iNasc, DATE_FORMAT(datacad,'%d/%m/%Y') as idatacad FROM cadCR WHERE nome  = '$nome2' and cpf ='$cpf' and ano ='$ano'";
	$results = mysql_query($sql) or die (mysql_error());
			
	while ( $linha = mysql_fetch_array($results )) {
	
	$idInscrito = $linha['idInscrito'];
	$datacad = $linha['idatacad'];
	$nome = $linha['nome'];
	$nascimento = $linha['iNasc'];
	$sexo = $linha['sexo'];
	$cpf = $linha['cpf'];
	$rg = $linha['rg'];
	$orgrg = $linha['orgrg'];
	$cep = $linha['cep'];
	$end = $linha['end'];
	$bairro = $linha['bairro'];
	$cidade = $linha['cidade'];
	$estado = $linha['estado'];
	$tel = $linha['tel'];
	$cel = $linha['cel'];
	$email = $linha['email'];
	$civil = $linha['civil'];
	$evang = $linha['evang'];
	$memb = $linha['memb'];
	$aigreja = $linha['igreja'];
	$deseja1 = $linha['deseja1'];
	$deseja2 = $linha['deseja2'];
	$deseja3 = $linha['deseja3'];
	$deseja4 = $linha['deseja4'];
	$deseja5 = $linha['deseja5'];
	$outro = $linha['outro'];
	
	 ?>
 
  <form action="alteraCROK.php" method="post" name="form1" enctype="multipart/form-data" onSubmit="return ValidaSemPreenchimento(this)" >
  <fieldset id="forms" style="background-color:transparent">
  <br />
    <br />
		<legend style="font-size:20px; color:#FFF" align="center">Altera&ccedil;&atilde;o dos dados do inscrito no Desperta <? echo $ano; ?></legend>
		<table>
		<tr align="left">
		<td><label for="idInscrito"><b><font color="#FFFFFF">Id:</font></b></label></td>
		<td style="border-color:transparent"><input type="text" name="idInscrito" id="idInscrito" tabindex="-1" value="<? echo $idInscrito; ?>"  size="5" readonly maxlength="10" title="Data do cadastro"/></td>
        </tr>
         <tr align="left">
		<td><label for="datacad"><b><font color="#FFFFFF">Data do Cadastro:</font></b></label></td>
		<td style="border-color:transparent"><input type="text" name="datacad" id="datacad" tabindex="-1" value="<? echo $datacad; ?>"  size="14"  maxlength="10" onKeyPress="MascaraData(form1.datacad)" title="Data do cadastro"/></td>
        </tr>
       
        <tr align="left">
        <td> <label for="nome"><b><font color="#FFFFFF">Nome:</font></b></label></td>
		<td style="border-color:transparent">
        <input type="text" name="nome" id="nome"  size="60" tabindex="1" obrigatorio="1" value="<? echo $nome; ?>" title="Informe o nome"/>&nbsp;&nbsp;
        <input type="text" name="inscrito" id="inscrito" size="10" style="visibility:hidden" ></td>
        </tr>
        
        <tr align="left">
 		<td><label for="nascimento"><b><font color="#FFFFFF">Data de Nascimento:</font></b></label></td>
		<td style="border-color:transparent"><input type="text" name="nascimento" id="nascimento" onKeyPress="MascaraData(form1.nascimento)" tabindex="2"  size="14" maxlength="10" obrigatorio="1" value="<? echo $nascimento; ?>" title="Informe a data do nascimento"/></td>
        </tr>
          <tr align="left">
        <td><label for="sexo"><b><font color="#FFFFFF">Sexo:</font></b></label></td>
        <td style="border-color:transparent">
        <select name="sexo" id="sexo"  tabindex="3"  title="Informe se Sexo">
			<option value="<? echo $sexo; ?>"><? echo $sexo; ?></option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
       	</select> 
        </td>
        </tr>
        <tr align="left">
		<td><label for="cpf"><b><font color="#FFFFFF">CPF:</font></b></label></td>
		<td style="border-color:transparent"><input type="text" name="cpf" id="cpf" tabindex="4" onBlur="ValidarCPF(form1.cpf)" size="18"  align="left" maxlength="14" onKeyPress="MascaraCPF(form1.cpf);" value="<? echo $cpf; ?>" title="Informe o CPF"/>&nbsp;&nbsp;Somente n&uacute;meros</td>
        </tr>
        <tr align="left">
		<td><label for="rg"><b><font color="#FFFFFF">RG:</font></b></label></td>
		<td style="border-color:transparent"><input type="text" name="rg" id="rg" tabindex="5"  size="17"  align="left" maxlength=18 value="<? echo $rg; ?>" title="Informe o RG"/>
		<label for="orgrg"><b><font color="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&Oacute;rg&atilde;o Emissor:</b></label>
		<input type="text" name="orgrg" id="orgrg" tabindex="6"  size="10"  align="left" maxlength="10" value="<? echo $orgrg; ?>"  title="Informe o Órgão Emissor"/></td>
        </tr>
         <tr align="left">
       <td> <label for="cep"><b><font color="#FFFFFF">CEP:</font></b></label></td>
		<td style="border-color:transparent"><input type="text" name="cep" id="cep" size="10"  tabindex="7" maxlength="9"  onBlur="getEndereco()" onKeyPress="MascaraCep(form1.cep)" value="<? echo $cep; ?>" title="Informe o CEP"  />&nbsp;&nbsp;Endere&ccedil;o autom&aacute;tico. Acrescente apenas o n&uacute;mero.</td>
        </tr>
        <tr align="left">
        <td><label for="end"><b><font color="#FFFFFF">Endere&ccedil;o:</font></b></label></td>
		<td style="border-color:transparent"><input type="text" name="end" readonly id="end" size="60"  tabindex="8" onkeypress="return Onlychars(event)" value="<? echo $end; ?>" title="Seu endereço" /></td>
        </tr>
               
         <tr align="left">
        <td><label for="bairro"><b><font color="#FFFFFF">Bairro:</b></label></td>
		<td style="border-color:transparent"><input type="text" name="bairro" readonly id="bairro" size="30"  tabindex="-1" onkeypress="return Onlychars(event)" value="<? echo $bairro; ?>" title="Seu bairro" /></td>
        </tr>
        
         <tr align="left">
		<td><label for="cidade"><b><font color="#FFFFFF">Cidade:</font></b></label></td>
      <td style="border-color:transparent"><input type="text" name="cidade" readonly id="cidade" size="30" tabindex="-1" onkeypress="return Onlychars(event)" value="<? echo $cidade; ?>"  title="Sua cidade" /></td>
      </tr>
      
      <tr align="left">
        <td><label for="estado"><b><font color="#FFFFFF">Estado:</font></b></label></td>
       <td style="border-color:transparent"> <input name="estado" id="estado" readonly size="3" tabindex="-1" value="<? echo $estado; ?>"  title="Seu Estado">
       </tr>
     
         <tr align="left">
        <td><label for="tel"><b><font color="#FFFFFF">Telefone Res.:</font></b></label></td>
		<td style="border-color:transparent"><input type="text" name="tel" id="tel" obrigatorio="1" onKeyPress="MascaraTelefone(form1.tel)" value="<? echo $tel; ?>"   tabindex="9"  maxlength="14"   title="Informe o telefone Residencial" /></td>
        </tr>
        
         <tr align="left">
        <td><label for="cel"><b><font color="#FFFFFF">Telefone Celular.:</font></b></label></td>
		<td style="border-color:transparent"><input type="text" name="cel" id="cel" onKeyPress="MascaraCelular(form1.cel)"  tabindex="10"  maxlength="15" value="<? echo $cel; ?>"  title="Informe o seu celular" /></td>
        </tr>
         
         <tr align="left">
        <td><label for="email"><b><font color="#FFFFFF">Email:</font></b></label></td>
		<td style="border-color:transparent"><input type="text" name="email" id="email" size="50" tabindex="11" onBlur="ValidEmail();" value="<? echo $email; ?>" title="Informe um email válido" />
		</td>
      </tr>
     <tr align="left">
      <td><label for="civil"><b><font color="#FFFFFF">Estado Civil:</font></b></label></td>
      <td style="border-color:transparent">
        <select name="civil" id="civil"  tabindex="12" title="Informe o Estado Civil">
			<option value="<? echo $civil; ?>"><? echo $civil; ?></option>
            <option value="SOLTEIRO">SOLTEIRO(a)</option>
            <option value="CASADO">CASADO(a)</option>
            <option value="VIUVO">VIUVO(a)</option>
            <option value="DIVORCIADO">DIVORCIADO(a)</option>
            <option value="OUTRO">OUTRO</option>
		</select></td>
        </tr>
        </tr>
        <tr align="left">
        <td><label for="evang"><b><font color="#FFFFFF">Voc&ecirc; &eacute; Evang&eacute;lico?</font></b></label></td>
        <td style="border-color:transparent">
        <select name="evang" id="evang"  tabindex="13"  title="Informe se você é Evangélico">
			<option value="<? echo $evang; ?>"><? echo $evang; ?></option>
            <option value="SIM">SIM</option>
            <option value="NÃO">N&Atilde;O</option>
       	</select> 
        </td>
        </tr>     
        <tr align="left">
        <td><label for="memb"><b><font color="#FFFFFF">Voc&ecirc; &eacute; Membro da IBRN?</font></b></label></td>
        <td style="border-color:transparent">
        <select name="memb" id="memb"  tabindex="14" onChange="igreja()" title="Informe se você é membro da IBRN">
			<option value="<? echo $memb; ?>"><? echo $memb; ?></option>
            <option value="SIM">SIM</option>
            <option value="NÃO">N&Atilde;O</option>
       	</select> 
       <font color="#FFFFFF">&nbsp;&nbsp;Se respondeu N&Atilde;O, preencha abaixo a sua igreja.</font></td>
        </tr>
        <tr align="left">
        <td height="25"> <label for="aigreja"><b><font color="#FFFFFF">Sua Igreja:</font></b></label></td>
		<td style="border-color:transparent"><input type="text" name="aigreja" id="aigreja"  size="80" tabindex="15" style="text-transform:uppercase;" value="<? echo $aigreja; ?>" title="Informe o nome da sua Igreja"/></td>
        </tr>
         </tr>
        <tr>
         <td colspan="2" align="center"><font size="4" color="#FFFFFF">Classifique seus motivos de recuperação, abaixo, em prioridades:</font>
         </td>
        </tr>
        <tr align="left">
        <td><label for="deseja1"><b><font color="#FFFFFF">Prioridade 1:</font></b></label></td>
        <td style="border-color:transparent">
        <select name="deseja1" id="deseja1"  tabindex="16"  title="Informe do que deseja se recuperar">
			<option value="<? echo $deseja1; ?>"><? echo $deseja1; ?></option>
            <option value="Ansiedade">Ansiedade</option>
            <option value="Baixa Auto-Estima">Baixa Auto-Estima</option>
            <option value="Codependência">Codepend&ecirc;ncia</option>
            <option value="Conpulsão Alimentar ou Financeira">Conpuls&atilde;o Alimentar ou Financeira</option>
            <option value="Dificuladde de Relacionamento">Dificuladde de Relacionamento</option>
            <option value="Ira">Ira</option>
            <option value="Luto">Luto</option>
            <option value="Mágoa">M&aacute;goa</option>
            <option value="Medo">Medo</option>
            <option value="Orgulho ou Inveja">Orgulho ou Inveja</option>
            <option value="Rejeição">Rejei&ccedil;&atilde;o</option>
            <option value="Religiosidade">Religiosidade</option>
            <option value="Sexualiade">Sexualiade</option>
            <option value="Vícios">V&iacute;cios - Dep. Química</option>
            <option value="Outro">Outro</option>
       	</select> 
        </td>
        </tr>
        <tr align="left">
        <td><label for="deseja2"><b><font color="#FFFFFF">Prioridade 2:</font></b></label></td>
        <td style="border-color:transparent">
        <select name="deseja2" id="deseja2"  tabindex="17"  title="Informe do que deseja se recuperar">
			<option value="<? echo $deseja2; ?>"><? echo $deseja2; ?></option>
            <option value="Ansiedade">Ansiedade</option>
            <option value="Baixa Auto-Estima">Baixa Auto-Estima</option>
            <option value="Codependência">Codepend&ecirc;ncia</option>
            <option value="Conpulsão Alimentar ou Financeira">Conpuls&atilde;o Alimentar ou Financeira</option>
            <option value="Dificuladde de Relacionamento">Dificuladde de Relacionamento</option>
            <option value="Ira">Ira</option>
            <option value="Luto">Luto</option>
            <option value="Mágoa">M&aacute;goa</option>
            <option value="Medo">Medo</option>
            <option value="Orgulho ou Inveja">Orgulho ou Inveja</option>
            <option value="Rejeição">Rejei&ccedil;&atilde;o</option>
            <option value="Religiosidade">Religiosidade</option>
            <option value="Sexualiade">Sexualiade</option>
            <option value="Vícios">V&iacute;cios - Dep. Química</option>
            <option value="Outro">Outro</option>
       	</select> 
        </td>
        </tr>
        <tr align="left">
        <td><label for="deseja3"><b><font color="#FFFFFF">Prioridade 3:</font></b></label></td>
        <td style="border-color:transparent">
        <select name="deseja3" id="deseja3"  tabindex="18"  title="Informe do que deseja se recuperar">
			<option value="<? echo $deseja3; ?>"><? echo $deseja3; ?></option>
            <option value="Ansiedade">Ansiedade</option>
            <option value="Baixa Auto-Estima">Baixa Auto-Estima</option>
            <option value="Codependência">Codepend&ecirc;ncia</option>
            <option value="Conpulsão Alimentar ou Financeira">Conpuls&atilde;o Alimentar ou Financeira</option>
            <option value="Dificuladde de Relacionamento">Dificuladde de Relacionamento</option>
            <option value="Ira">Ira</option>
            <option value="Luto">Luto</option>
            <option value="Mágoa">M&aacute;goa</option>
            <option value="Medo">Medo</option>
            <option value="Orgulho ou Inveja">Orgulho ou Inveja</option>
            <option value="Rejeição">Rejei&ccedil;&atilde;o</option>
            <option value="Religiosidade">Religiosidade</option>
            <option value="Sexualiade">Sexualiade</option>
            <option value="Vícios">V&iacute;cios - Dep. Química</option>
            <option value="Outro">Outro</option>
       	</select> 
        </td>
        </tr>
        <tr align="left">
        <td><label for="deseja4"><b><font color="#FFFFFF">Prioridade 4:</font></b></label></td>
        <td style="border-color:transparent">
        <select name="deseja4" id="deseja4"  tabindex="19"  title="Informe do que deseja se recuperar">
			<option value="<? echo $deseja4; ?>"><? echo $deseja4; ?></option>
            <option value="Ansiedade">Ansiedade</option>
            <option value="Baixa Auto-Estima">Baixa Auto-Estima</option>
            <option value="Codependência">Codepend&ecirc;ncia</option>
            <option value="Conpulsão Alimentar ou Financeira">Conpuls&atilde;o Alimentar ou Financeira</option>
            <option value="Dificuladde de Relacionamento">Dificuladde de Relacionamento</option>
            <option value="Ira">Ira</option>
            <option value="Luto">Luto</option>
            <option value="Mágoa">M&aacute;goa</option>
            <option value="Medo">Medo</option>
            <option value="Orgulho ou Inveja">Orgulho ou Inveja</option>
            <option value="Rejeição">Rejei&ccedil;&atilde;o</option>
            <option value="Religiosidade">Religiosidade</option>
            <option value="Sexualiade">Sexualiade</option>
            <option value="Vícios">V&iacute;cios - Dep. Química</option>
            <option value="Outro">Outro</option>
       	</select> 
        </td>
        </tr>
        <tr align="left">
        <td><label for="deseja5"><b><font color="#FFFFFF">Prioridade 5:</font></b></label></td>
        <td style="border-color:transparent">
        <select name="deseja5" id="deseja5"  tabindex="20"  title="Informe do que deseja se recuperar">
			<option value="<? echo $deseja5; ?>"><? echo $deseja5; ?></option>
            <option value="Ansiedade">Ansiedade</option>
            <option value="Baixa Auto-Estima">Baixa Auto-Estima</option>
            <option value="Codependência">Codepend&ecirc;ncia</option>
            <option value="Conpulsão Alimentar ou Financeira">Conpuls&atilde;o Alimentar ou Financeira</option>
            <option value="Dificuladde de Relacionamento">Dificuladde de Relacionamento</option>
            <option value="Ira">Ira</option>
            <option value="Luto">Luto</option>
            <option value="Mágoa">M&aacute;goa</option>
            <option value="Medo">Medo</option>
            <option value="Orgulho ou Inveja">Orgulho ou Inveja</option>
            <option value="Rejeição">Rejei&ccedil;&atilde;o</option>
            <option value="Religiosidade">Religiosidade</option>
            <option value="Sexualiade">Sexualiade</option>
            <option value="Vícios">V&iacute;cios - Dep. Química</option>
            <option value="Outro">Outro</option>
       	</select> 
        </td>
        </tr>
      <tr align="left">
        <td> <label for="outro"><b><font color="#FFFFFF">Outro Motivo:</font></b></label></td>
		<td style="border-color:transparent"><input type="text" name="outro" id="outro"  size="80" tabindex="21" value="<? echo $outro; ?>" title="Informe o motivo de seua recuperação"/></td>
        </tr>
        
        
 <? }  ?>    
    
</table>
<br /><br />
<table width="70%">
<tr>
<td align="center"><input type="submit" name="cadastrar"  value="Efetuar Alteração"  /></td>
</tr>
</table>        
	</fieldset>
</form>

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
                                <p><a href="www.idbras.com.br">IDBRAS</a></p><p>Copyright &copy; 2014. Todos os direitos reservados.</p>
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
<span style="border-color:transparent">
<input type="text" name="end" id="end" size="50"  tabindex="4" onkeypress="return Onlychars(event)" value="<? echo $end; ?>" title="Seu endereço" />
</span>
</body>
</html>
