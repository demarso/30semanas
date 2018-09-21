<?php
 require("includes/arruma_link.php");
 header("Content-Type: text/html; charset=ISO-8859-1",true);
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

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
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

//valida o CPF digitado
function ValidarCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g;
        cpf = cpf.toString().replace( exp, "" ); 
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;
        
        for(i=0;i<9;i++){
                soma1+=eval(cpf.charAt(i)*(vlr-1));
                soma2+=eval(cpf.charAt(i)*vlr);
                vlr--;
        }       
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);
        
        var digitoGerado=(soma1*10)+soma2;
        if(digitoGerado!=digitoDigitado){        
                alert('CPF Invalido!');
				document.form1.cpf.focus();
		}
		return false;         
}

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
<font size="3" color="#FFFFFF"><b>30 SEMANAS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo date('Y');  ?></b></font>
<br />
<? 
  $data = date('d/m/Y');
  $hoje = date('d/m/Y H,i,s');
  
 
	  echo "<br /><br /><br /><center><font size='15' color='#FFFFS'>PARA INSCRIÇÕES NO CICLO 2018,</font></center><br />";
    echo "<br /><br /><br /><center><font size='15' color='#FFFFS'>ADQUIRA O CADERNO DO 30 SEMANAS</font></center><br />";
    echo "<br /><br /><br /><center><font size='15' color='#FFFFS'>NA SECRETARIA DA IBRN!!!</font></center><br /><br /><br />";
  
?>
 <!--
  <form action="cadCROK.php" method="post" name="form1" enctype="multipart/form-data" onSubmit="return ValidaSemPreenchimento(this)" >
 <fieldset id="descr" style="background-color:#E9E9E9">
         
      		<table>
		  <tr align="left">
		<td><label for="datacad"><b>Data da Inscri&ccedil;&atilde;o:</b></label></td>
		<td style="border-color:transparent"><input type="text" name="datacad" id="datacad" tabindex="-1" value="<? echo $data; ?>"  size="14" maxlength="10" onKeyPress="MascaraData(form1.nascimento)"  title="Data do cadastro"/></td>
        </tr>
      <tr align="left">
        <td> <label for="nome"><b>Nome:</b></label></td>
		<td style="border-color:transparent">
        <input type="text" name="nome" id="nome"  size="60" tabindex="1" obrigatorio="1" onBlur="ajaxGet('processConsultaNome.php?nom='+this.value,document.getElementById('inscrito'),true);" title="Informe o nome"/>&nbsp;&nbsp;
        <input type="text" name="inscrito" id="inscrito" size="10" style="visibility:hidden" ></td>
        </tr>
        
        <tr align="left">
 		<td><label for="nascimento"><b>Data de Nascimento:</b></label></td>
		<td style="border-color:transparent"><input type="text" name="nascimento" id="nascimento" onKeyPress="MascaraData(form1.nascimento)" tabindex="2"  size="14" maxlength="10" obrigatorio="1" title="Informe a data do nascimento"/>&nbsp;&nbsp;&nbsp;Formato: 00/00/0000 - Somente n&uacute;meros</td>
        </tr>
         <tr align="left">
        <td><label for="sexo"><b>Sexo:</b></label></td>
        <td style="border-color:transparent">
        <select name="sexo" id="sexo"  tabindex="3"  title="Informe se você é Evangélico">
			<option value=""> - - -</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
       	</select> 
        </td>
        </tr>
  <!--      <tr align="left">
		<td><label for="cpf"><b>CPF:</b></label></td>
		<td style="border-color:transparent"><input type="text" name="cpf" id="cpf" tabindex="4" onBlur="ajaxGet('processConsultaCPF.php?cp='+this.value,document.getElementById('cpfcad'),true);" size="18"  align="left" maxlength="14" onKeyPress="MascaraCPF(form1.cpf);"  title="Informe o CPF"/>&nbsp;&nbsp;Somente n&uacute;meros<input type="text" name="cpfcad" id="cpfcad" size="15" style="visibility:hidden" ></td>
        </tr> 
        <tr align="left">
		<td><label for="rg"><b>RG:</b></label></td>
		<td style="border-color:transparent"><input type="text" name="rg" id="rg" tabindex="5"  size="17"  align="left" maxlength=18  title="Informe o RG"/>
		<label for="orgrg"><b>&nbsp;&nbsp;&nbsp;&nbsp;&Oacute;rg&atilde;o Emissor:</b></label>
		<input type="text" name="orgrg" id="orgrg" tabindex="6"  size="10"  align="left" maxlength="10"  title="Informe o Órgão Emissor"/></td>
        </tr> 
         <tr align="left">
       <td> <label for="cep"><b>CEP:</b></label></td>
		<td style="border-color:transparent"><input type="text" name="cep" id="cep" size="10"  tabindex="7" maxlength="9"  onBlur="getEndereco()" onKeyPress="MascaraCep(form1.cep)" title="Informe o CEP"  />&nbsp;&nbsp;Endere&ccedil;o autom&aacute;tico. Acrescente apenas o n&uacute;mero e aguarde o preenchimento abaixo.</td>
        </tr>
        <tr align="left">
        <td><label for="end"><b>Endere&ccedil;o:</b></label></td>
		<td style="border-color:transparent"><input type="text" name="end" id="end" size="50"  tabindex="8" title="Seu endereço" /></td>
        </tr>
               
         <tr align="left">
        <td><label for="bairro"><b>Bairro:</b></label></td>
		<td style="border-color:transparent"><input type="text" name="bairro" id="bairro" size="30"  tabindex="-1" onkeypress="return Onlychars(event)" title="Seu bairro" /></td>
        </tr>
        
         <tr align="left">
		<td><label for="cidade"><b>Cidade:</b></label></td>
      <td style="border-color:transparent"><input type="text" name="cidade"  id="cidade" size="30" tabindex="-1" onkeypress="return Onlychars(event)" title="Sua cidade" /></td>
      </tr>
      
      
      <tr align="left">
		<td><label for="estado"><b>Estado</b></label></td>
      <td style="border-color:transparent"><input type="text" name="estado"  id="estado" size="10" tabindex="-1" onkeypress="return Onlychars(event)" title="Seu Estado" /></td>
      </tr>
     
         <tr align="left">
        <td><label for="tel"><b>Telefone Res.:</b></label></td>
		<td style="border-color:transparent"><input type="text" name="tel" id="tel"  onKeyPress="MascaraTelefone(form1.tel)"  tabindex="9"  maxlength="14"   title="Informe o telefone Residencial" />&nbsp;&nbsp;&nbsp;&nbsp;Formato: (00) 0000-0000 - Somente n&uacute;meros
		  </td>
        </tr>
        
         <tr align="left">
        <td><label for="cel"><b>Celular:</b></label></td>
		<td style="border-color:transparent"><input type="text" name="cel" id="cel" onKeyPress="MascaraCelular(form1.cel)"  tabindex="10"  maxlength="15"   title="Informe o seu celular" />&nbsp;&nbsp;&nbsp;&nbsp;Formato: (00) 00000-0000 - Somente n&uacute;meros</td>
        </tr>
         
         <tr align="left">
        <td><label for="email"><b>Email:</b></label></td>
		<<td style="border-color:transparent"><input type="text" name="email" id="email" size="50" tabindex="11" onBlur="ValidEmail(this.value);" title="Informe um email válido" />
      </tr>
<!--    <tr align="left">
      <td><label for="civil"><b>Estado Civil:</b></label></td>
      <td style="border-color:transparent">
        <select name="civil" id="civil"  tabindex="12" title="Informe o Estado Civil">
			<option value=""> - - -</option>
            <option value="SOLTEIRO">SOLTEIRO(a)</option>
            <option value="CASADO">CASADO(a)</option>
            <option value="VIUVO">VIUVO(a)</option>
            <option value="DIVORCIADO">DIVORCIADO(a)</option>
            <option value="OUTRO">OUTRO</option>
		</select></td>
        </tr> 
        <tr align="left">
        <td><label for="evang"><b>Voc&ecirc; &eacute; Evang&eacute;lico?</b></label></td>
        <td style="border-color:transparent">
        <select name="evang" id="evang"  tabindex="13"  title="Informe se você é Evangélico">
			<option value=""> - - -</option>
            <option value="SIM">SIM</option>
            <option value="NÃO">N&Atilde;O</option>
       	</select> 
        </td>
        </tr>
       <tr align="left">
        <td><label for="memb"><b>Voc&ecirc; &eacute; Membro da IBRN?</b></label></td>
        <td style="border-color:transparent">
        <select name="memb" id="memb"  tabindex="14" onChange="igreja()" title="Informe se você é membro da IBRN">
			<option value=""> - - -</option>
            <option value="SIM">SIM</option>
            <option value="NÃO">N&Atilde;O</option>
       	</select> 
        &nbsp;&nbsp;Se respondeu N&Atilde;O, preencha abaixo a sua igreja.</td>
        </tr>
        <tr align="left">
        <td> <label for="aigreja"><b>Sua Igreja:</b></label></td>
		<td style="border-color:transparent"><input type="text" name="aigreja" id="aigreja"  size="80" tabindex="15" style="text-transform:uppercase;" title="Informe o nome da sua Igreja"/></td>
        </tr>
        <tr>
         <td colspan="2" align="center"><font size="4">Classifique seus motivos de recuperação, abaixo, em prioridades:</font>
         </td>
        </tr>
        <tr align="left">
        <td><label for="deseja1"><b>Prioridade 1:</b></label></td>
        <td style="border-color:transparent">
        <select name="deseja1" id="deseja1"  tabindex="16"  title="Informe do que deseja se recuperar">
			<option value=""> - - -</option>
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
        <td><label for="deseja2"><b>Prioridade 2:</b></label></td>
        <td style="border-color:transparent">
        <select name="deseja2" id="deseja2"  tabindex="17"  title="Informe do que deseja se recuperar">
			<option value=""> - - -</option>
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
        <td><label for="deseja3"><b>Prioridade 3:</b></label></td>
        <td style="border-color:transparent">
        <select name="deseja3" id="deseja3"  tabindex="18"  title="Informe do que deseja se recuperar">
			<option value=""> - - -</option>
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
        <td><label for="deseja4"><b>Prioridade 4:</b></label></td>
        <td style="border-color:transparent">
        <select name="deseja4" id="deseja4"  tabindex="19"  title="Informe do que deseja se recuperar">
			<option value=""> - - -</option>
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
        <td><label for="deseja5"><b>Prioridade 5:</b></label></td>
        <td style="border-color:transparent">
        <select name="deseja5" id="deseja5"  tabindex="20"  title="Informe do que deseja se recuperar">
			<option value=""> - - -</option>
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
        <td> <label for="outro"><b>Outro Motivo:</b></label></td>
		<td style="border-color:transparent"><input type="text" name="outro" id="outro"  size="80" tabindex="21"  title="Informe o motivo de seua recuperação"/></td>
        </tr>
    
</table>
<table width="70%">
<tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
<td align="center"><input type="submit" name="cadastrar"  value="Efetuar Cadastro"  /></td>
</tr>
</table>        
	</fieldset>
</form>-->
<? // } ?>


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
