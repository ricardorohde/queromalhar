<?php
function diasemana($data) {
	$ano =  substr("$data", 6, 4);
	$mes =  substr("$data",3,2);
	$dia =  substr("$data",0,2);
	$diasemana = date("w",mktime(0,0,0,$mes,$dia,$ano));
	switch($diasemana) {
		case"0": $diasemana = "Domingo";       break;
		case"1": $diasemana = "Segunda-Feira"; break;
		case"2": $diasemana = "Terça-Feira";   break;
		case"3": $diasemana = "Quarta-Feira";  break;
		case"4": $diasemana = "Quinta-Feira";  break;
		case"5": $diasemana = "Sexta-Feira";   break;
		case"6": $diasemana = "Sábado";        break;
	}
	return $diasemana;
}
?>
