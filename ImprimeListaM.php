<?php
include "conexao.php";
$cont = 0;
$ano = date('Y');
include ('class.ezpdf.php');
$pdf = new Cezpdf();
$pdf->selectFont('fonts/Helvetica.afm');
$pdf->ezStartPageNumbers(570,10,10,'','',1);
$pdf = new Cezpdf('a4','landscape');
$pdf -> ezSetMargins(10,30,50,50);

//$pdf->addJpegFromFile('img/Conferência Viva Banner.jpg',220,740,150,60);

//$cols = array('formulario'=>"Formulário",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descrição','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusão','observacao'=>'Obs');

$pdf->ezText("<b>30 SEMANAS</b>",14,array('justification'=>'center'));// Define o texto do seu pdf, e o tamanho da fonte;
$pdf->ezText("IBRN - $ano",11,array('justification'=>'center'));
$pdf->ezText("\n");

			include "conexao.php";
			$cont = 1;
			
	$today = date("d/m/Y");
	
$saldo = 0;  $pag = 0; $cont = 1;
$sql = "SELECT *,DATE_FORMAT(datacad,'%d/%m/%Y') as idatacad, DATE_FORMAT(nascimento,'%d/%m/%Y') as inasc FROM cadCR WHERE ano = '$ano' and sexo = 'Masculino' ORDER BY nome";

$resultado = mysql_query($sql) or die (mysql_error());

while ($linha = mysql_fetch_array($resultado)) {
	
	$idInsc = $linha['idInscrito'];
	$datacad = $linha['idatacad'];
	$nome = $linha['nome'];
	$nasc = $linha['inasc'];
	$tel = $linha['tel'];
	$cel = $linha['cel'];
	$email = $linha['email'];
	$memb = $linha['memb'];
	$deseja = $linha['deseja1'];
	$outro = $linha['outro'];
	 if($deseja == "Outro")
	     $deseja = "Outro - ".$outro;
	
	
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

$dados[] = array('<b>Nº</b>'=>$cont,'<b>Nome</b>'=>$nome,'<b>Nascimento</b>'=>$nasc,'<b>Idade</b>'=>$old,'<b>Telefone</b>'=>$tel,'<b>Celular</b>'=>$cel,'<b>Email</b>'=>$email,'<b>Deseja</b>'=>$deseja,'<b>IBRN?</b>'=>$memb);
$cont = $cont + 1;
}
$pdf->ezTable($dados,'','',array('xPos'=>50,'xOrientation'=>'right','fontSize' => 8,'width'=>750,'cols'=>array('Nº'=>array('width'=>50),'Nome'=>array('width'=>50),'Nascimento'=>array('width'=>50),'Idade'=>array('width'=>50),'Telefone'=>array('width'=>50),'Celular'=>array('width'=>50),'Email'=>array('width'=>50),'Deseja'=>array('width'=>50),'IBRN?'=>array('width'=>50))));

	
$pdf->ezStream();

?>
