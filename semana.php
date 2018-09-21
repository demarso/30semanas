<?php
$data = date('D');
$mes = date('M');
$dia = date('d');
$ano = date('Y');

$semana = array("Sun" => "Domingo", "Mon" => "Segunda-Feira", "Tue" => "Terca-Feira", 
"Wed" => "Quarta-Feira", "Thu" => "Quinta-Feira", "Sat" => "Sabado");

$mess = array("Jan" => "Janeiro", "Feb" => "Fevereiro", "Mar" => "Marco", "Apr" => "Abril", "May" => "Maio", "Jun" => "Junho", "Jul" => "Julho", "Aug" => "Agosto", "Nov" => "Novembro", "Sep" => "Setembro", "Oct" => "Outubro", "Dec" => "Dezembro");
echo $semana["$data"];
echo ", $dia de ";
echo $mess["$mes"];
echo " de $ano";
?>