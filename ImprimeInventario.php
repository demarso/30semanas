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
$pdf->ezText("Lista das pessoas que fizeram a escrita das memorias",11,array('justification'=>'center'));

$pdf->ezText("\n");

			include "conexao.php";
			$cont = 1;
			
	$today = date("d/m/Y");
	
$saldo = 0;  $pag = 0; $cont = 1;

$sql1 = "SELECT 
         pre.idInscrito AS id,
         cad.nome AS nome
         FROM presenca AS pre
         INNER JOIN cadCR AS cad
         WHERE cad.idInscrito = pre.idInscrito and pre.data = '2017/08/12'
         ORDER BY nome";

$resultado1 = mysql_query($sql1) or die (mysql_error());

while ($linha1 = mysql_fetch_array($resultado1)) {
	
    $idInsc = $linha1['id'];
	$nome = $linha1['nome'];
	
	
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
/*
$sql2 = "SELECT data FROM presenca WHERE ano = '$ano' and idInscrito = '$idInsc'";
	$resultado2 = mysql_query($sql2) or die (mysql_error());
    while ($linha2 = mysql_fetch_array($resultado2)) {
	$datai = $linha2['data'];
	}

	if ($datai  == '2107-08-12')
		 $colort = "red";
		else
		$colort = "black";	*/

$dados[] = array('<b>Nun</b>'=>$cont,'<b>Nome</b>'=>$nome);
$cont = $cont + 1;
}
$pdf->ezTable($dados,'','',array('xPos'=>150,'xOrientation'=>'right','fontSize' => 8,'width'=>500,'cols'=>array('Nun'=>array('width'=>5),'Nome'=>array('width'=>100))));

	
$pdf->ezStream();

?>